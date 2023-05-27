<?php

namespace App\Models;

use App\Core\Model as Model;
use App\Models\Produk as ProdukModels;

class Keranjang extends Model {

    private object $produk;

    public function getAll()
    {
        $sql = "SELECT * FROM tb_keranjang as keranjang JOIN tb_users as users ON keranjang.ker_id_user=users.user_id JOIN tb_produk as produk ON keranjang.ker_id_produk=produk.produk_id ORDER BY keranjang.ker_id_user ASC";
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
        $sql = "SELECT * FROM tb_keranjang as keranjang JOIN tb_users as users ON keranjang.ker_id_user=users.user_id JOIN tb_produk as produk ON keranjang.ker_id_produk=produk.produk_id WHERE ker_id=:ker_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":ker_id", $id);
        $stmt->execute();

        $row = $stmt->fetch(\PDO::FETCH_ASSOC);

        return $row;
    }

    public function tambah($data = [])
	{
        $ker_id_user = $data['ker_id_user'];
		$ker_id_produk = $data['ker_id_produk'];
		$ker_jml = $data['ker_jml'];
		$ker_harga = $this->getJmlHarga($ker_id_produk, $ker_jml);
		
		$sql = "INSERT INTO tb_keranjang 
                (ker_id_user, ker_id_produk, ker_harga, ker_jml) VALUES 
                (:ker_id_user, :ker_id_produk, :ker_harga, :ker_jml)";

		$stmt = $this->db->prepare($sql);
		$stmt->bindParam(":ker_id_user", $ker_id_user);
		$stmt->bindParam(":ker_id_produk", $ker_id_produk);
		$stmt->bindParam(":ker_harga", $ker_harga);
		$stmt->bindParam(":ker_jml", $ker_jml);
		$stmt->execute();
		
	}

    public function ubah($data = [])
    {
        $ker_id_produk = $data['ker_id_produk'];
		$ker_id_user = $data['ker_id_user'];
		$ker_jml = $data['ker_jml'];
		$ker_harga = $this->getJmlHarga($ker_id_produk, $ker_jml);
        $ker_id = $data['ker_id'];

        $sql = "UPDATE tb_keranjang SET 
                ker_id_produk=:ker_id_produk, 
                ker_id_user=:ker_id_user, 
                ker_harga=:ker_harga, 
                ker_jml=:ker_jml
                WHERE ker_id=:ker_id";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":ker_id_produk", $ker_id_produk);
		$stmt->bindParam(":ker_id_user", $ker_id_user);
		$stmt->bindParam(":ker_harga", $ker_harga);
		$stmt->bindParam(":ker_jml", $ker_jml);
        $stmt->bindParam(":ker_id", $ker_id);
        $stmt->execute();
    }

    public function hapus($data = [])
    {
        $ker_id = $data['ker_id'];

        $sql = "DELETE FROM tb_keranjang WHERE ker_id=:ker_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":ker_id", $ker_id);
        $stmt->execute();
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