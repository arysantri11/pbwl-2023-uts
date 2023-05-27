<?php

namespace App\Models;

use App\Core\Model as Model;

class Produk extends Model {
    public function getAll()
    {
        $sql = "SELECT * FROM tb_produk as produk JOIN tb_kategori as kategori ON produk.produk_id_kat=kategori.kat_id JOIN tb_users as users ON produk.produk_id_user=users.user_id ORDER BY produk.produk_kode ASC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        $data = [];

        while ($rows = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $data[] = $rows;
        }

        return $data;
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM tb_produk as produk JOIN tb_kategori as kategori ON produk.produk_id_kat=kategori.kat_id JOIN tb_users as users ON produk.produk_id_user=users.user_id WHERE produk_id=:produk_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":produk_id", $id);
        $stmt->execute();

        $row = $stmt->fetch(\PDO::FETCH_ASSOC);

        return $row;
    }

    public function tambah($data = [])
	{
		$produk_id_kat = $data['produk_id_kat'];
		$produk_id_user = $data['produk_id_user'];
		$produk_kode = $data['produk_kode'];
		$produk_nama = $data['produk_nama'];
		$produk_hrg = $data['produk_hrg'];
		$produk_keterangan = $data['produk_keterangan'];
		$produk_stock = $data['produk_stock'];
		$produk_photo = $data['produk_photo'];

		$sql = "INSERT INTO tb_produk 
                (produk_id_kat, produk_id_user, produk_kode, produk_nama, produk_hrg, produk_keterangan, produk_stock, produk_photo) VALUES 
                (:produk_id_kat, :produk_id_user, :produk_kode, :produk_nama, :produk_hrg, :produk_keterangan, :produk_stock, :produk_photo)";

		$stmt = $this->db->prepare($sql);
		$stmt->bindParam(":produk_id_kat", $produk_id_kat);
		$stmt->bindParam(":produk_id_user", $produk_id_user);
		$stmt->bindParam(":produk_kode", $produk_kode);
		$stmt->bindParam(":produk_nama", $produk_nama);
		$stmt->bindParam(":produk_hrg", $produk_hrg);
		$stmt->bindParam(":produk_keterangan", $produk_keterangan);
		$stmt->bindParam(":produk_stock", $produk_stock);
		$stmt->bindParam(":produk_photo", $produk_photo);
		$stmt->execute();
		
	}

    public function ubah($data = [])
    {
        $produk_id_kat = $data['produk_id_kat'];
		$produk_id_user = $data['produk_id_user'];
		$produk_kode = $data['produk_kode'];
		$produk_nama = $data['produk_nama'];
		$produk_hrg = $data['produk_hrg'];
		$produk_keterangan = $data['produk_keterangan'];
		$produk_stock = $data['produk_stock'];
		$produk_photo = $data['produk_photo'];
        $produk_id = $data['produk_id'];

        $sql = "UPDATE tb_produk SET 
                produk_id_kat=:produk_id_kat, 
                produk_id_user=:produk_id_user, 
                produk_kode=:produk_kode, 
                produk_nama=:produk_nama, 
                produk_hrg=:produk_hrg, 
                produk_keterangan=:produk_keterangan, 
                produk_stock=:produk_stock, 
                produk_photo=:produk_photo
                WHERE produk_id=:produk_id";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":produk_id_kat", $produk_id_kat);
		$stmt->bindParam(":produk_id_user", $produk_id_user);
		$stmt->bindParam(":produk_kode", $produk_kode);
		$stmt->bindParam(":produk_nama", $produk_nama);
		$stmt->bindParam(":produk_hrg", $produk_hrg);
		$stmt->bindParam(":produk_keterangan", $produk_keterangan);
		$stmt->bindParam(":produk_stock", $produk_stock);
		$stmt->bindParam(":produk_photo", $produk_photo);
        $stmt->bindParam(":produk_id", $produk_id);
        $stmt->execute();
    }

    public function hapus($data = [])
    {
        $produk_id = $data['produk_id'];

        $sql = "DELETE FROM tb_produk WHERE produk_id=:produk_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":produk_id", $produk_id);
        $stmt->execute();
    }

    public function setStokTambah($id, $jmlTambah)
    {
        // mengambil data produk berdasarkan id
        $dataProduk = $this->getById($id);

        // menambah stok produk
        $hasil = $dataProduk['produk_stock'] + $jmlTambah;

        // mengubah data stok produk
        $sql = "UPDATE tb_produk SET 
                produk_stock=:produk_stock
                WHERE produk_id=:produk_id";
        
        $stmt = $this->db->prepare($sql);
		$stmt->bindParam(":produk_stock",$hasil);
        $stmt->bindParam(":produk_id", $id);
        $stmt->execute();
    }

    public function setStokKurang($id, $jmlKurang)
    {
        // mengambil data produk berdasarkan id
        $dataProduk = $this->getById($id);

        // mengurangi stok produk
        $hasil = $dataProduk['produk_stock'] - $jmlKurang;

        if ($hasil < 0) {
            return "gagal";
        } else {
            // mengubah data stok produk
            $sql = "UPDATE tb_produk SET 
                    produk_stock=:produk_stock
                    WHERE produk_id=:produk_id";
            
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":produk_stock",$hasil);
            $stmt->bindParam(":produk_id", $id);
            $stmt->execute();

            return "berhasil";
        }
    }
}