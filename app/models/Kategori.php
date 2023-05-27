<?php

namespace App\Models;

use App\Core\Model as Model;

class Kategori extends Model {
    public function getAll()
    {
        $sql = "SELECT * FROM tb_kategori ORDER BY kat_nama ASC";
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

        $sql = "SELECT * FROM tb_kategori WHERE kat_id=:kat_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":kat_id", $id);
        $stmt->execute();

        $row = $stmt->fetch(\PDO::FETCH_ASSOC);

        return $row;
    }

    public function tambah($data = [])
	{
		$kat_nama = $data['kat_nama'];
		$kat_keterangan = $data['kat_keterangan'];

		$sql = "INSERT INTO tb_kategori (kat_nama, kat_keterangan) VALUES (:kat_nama, :kat_keterangan)";
		$stmt = $this->db->prepare($sql);
		$stmt->bindParam(":kat_nama", $kat_nama);
		$stmt->bindParam(":kat_keterangan", $kat_keterangan);
		$stmt->execute();
		
	}

    public function ubah($data = [])
    {
        $kat_nama = $data['kat_nama'];
        $kat_keterangan = $data['kat_keterangan'];
        $kat_id = $data['kat_id'];

        $sql = "UPDATE tb_kategori SET kat_nama=:kat_nama, kat_keterangan=:kat_keterangan WHERE kat_id=:kat_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":kat_nama", $kat_nama);
        $stmt->bindParam(":kat_keterangan", $kat_keterangan);
        $stmt->bindParam(":kat_id", $kat_id);
        $stmt->execute();

    }

    public function hapus($data = [])
    {
        $kat_id = $data['kat_id'];

        $sql = "DELETE FROM tb_kategori WHERE kat_id=:kat_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":kat_id", $kat_id);
        $stmt->execute();
    }
}