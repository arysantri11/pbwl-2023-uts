<?php

namespace App\Models;

use App\Core\Model as Model;
use App\Models\Produk as ProdukModels;

class Detail extends Model {

	private object $produk;

    public function getAll()
    {
        $sql = "SELECT * FROM tb_order_detail as detail JOIN tb_order as pemesanan ON detail.detail_id_order=pemesanan.order_id JOIN tb_produk as produk ON detail.detail_id_produk=produk.produk_id ORDER BY detail.detail_id_order ASC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        $data = [];

        while ($rows = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $data[] = $rows;
        }

        return $data;
    }

    public function getByIdOrder($id)
    {
        $sql = "SELECT * FROM tb_order_detail as detail JOIN tb_order as pemesanan ON detail.detail_id_order=pemesanan.order_id JOIN tb_produk as produk ON detail.detail_id_produk=produk.produk_id WHERE detail.detail_id_order=:detail_id_order";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":detail_id_order", $id);
        $stmt->execute();

        $data = [];

        while ($rows = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $data[] = $rows;
        }

        return $data;
    }

    public function getByIdOrderProduk($idOrder, $idProduk)
    {
        $this->produk = new ProdukModels;

        // mengambil data order pada detail order
        $dataOrder = $this->getByIdOrder($idOrder);

        $data = [];

        // mengambil data detail order berdasarkan id produk
        foreach ($dataOrder as $row) {
            if ($row['detail_id_produk'] == $idProduk) {
                $data = $row;
            }
        }

        return $data;
    }

    public function tambah($data = [])
	{
        $detail_id_order = $data['detail_id_order'];
		$detail_id_produk = $data['detail_id_produk'];
		$detail_jml = $data['detail_jml'];
		$detail_harga = $this->getJmlHarga($detail_id_produk, $detail_jml);

        // mengurangi stok produk
        $this->produk = new ProdukModels;
        $validasiStok = $this->produk->setStokKurang($detail_id_produk, $detail_jml);

        if ($validasiStok == 'berhasil') {
            $sql = "INSERT INTO tb_order_detail 
                    (detail_id_order, detail_id_produk, detail_harga, detail_jml) VALUES 
                    (:detail_id_order, :detail_id_produk, :detail_harga, :detail_jml)";

            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":detail_id_order", $detail_id_order);
            $stmt->bindParam(":detail_id_produk", $detail_id_produk);
            $stmt->bindParam(":detail_harga", $detail_harga);
            $stmt->bindParam(":detail_jml", $detail_jml);
            $stmt->execute();

            return "<script>alert('Data detail berhasil ditambahkan!');window.location = 'Index';</script>";
        } else {
            return "<script>alert('Data detail gagal ditambahkan, stok produk tidak mencukupi!');window.location = 'Index';</script>";
        }
		
		
		
        

        
	}

    public function hapus($data = [])
    {
        $detail_id_order = $data['detail_id_order'];
        $detail_id_produk = $data['detail_id_produk'];
        $detail_jml = $data['detail_jml'];

        $sql = "DELETE FROM tb_order_detail WHERE detail_id_order=:detail_id_order AND detail_id_produk=:detail_id_produk";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":detail_id_order", $detail_id_order);
        $stmt->bindParam(":detail_id_produk", $detail_id_produk);
        $stmt->execute();

        // menambah stok produk
        $this->produk = new ProdukModels;
        $this->produk->setStokTambah($detail_id_produk, $detail_jml);
    }

    public function getJmlHarga($id, $jml)
    {
        $this->produk = new ProdukModels;

        // mengambil data produk yang dipilih
        $dataProduk = $this->produk->getById($id);
        // mengambil harga pada produk
        $harga = $dataProduk['produk_hrg'];

        // menjumlahkan total harga produk
        $total = $harga * $jml;

        return $total;
    }

}