<?php

namespace App;

use Inc\Koneksi as Koneksi;

class Kategori extends Koneksi {

    public function tampil()
    {
        $sql = "SELECT * FROM tb_kategori";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        $data = [];

        while ($rows = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $data[] = $rows;
        }

        return $data;
    }

    public function simpan()
    {
        $kat_nama = $_POST['kat_nama'];
        $kat_text = $_POST['kat_text'];

        $sql = "INSERT INTO tb_kategori (kat_nama, kat_text) VALUES (:kat_nama, :kat_text)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":kat_nama", $kat_nama);
        $stmt->bindParam(":kat_text", $kat_text);
        $stmt->execute();

    }

    public function edit($id)
    {

        $sql = "SELECT * FROM tb_kategori WHERE kat_id=:kat_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":kat_id", $id);
        $stmt->execute();

        $row = $stmt->fetch(\PDO::FETCH_ASSOC);

        return $row;
    }

    public function update()
    {
        $kat_nama = $_POST['kat_nama'];
        $kat_text = $_POST['kat_text'];
        $kat_id = $_POST['kat_id'];

        $sql = "UPDATE tb_kategori SET kat_nama=:kat_nama, kat_text=:kat_text WHERE kat_id=:kat_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":kat_nama", $kat_nama);
        $stmt->bindParam(":kat_text", $kat_text);
        $stmt->bindParam(":kat_id", $kat_id);
        $stmt->execute();

    }

    public function delete($id)
    {
        $sql = "DELETE FROM tb_kategori WHERE kat_id=:kat_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":kat_id", $id);
        $stmt->execute();
    }

    public function singleById()
    {
        $rows = $this->tampil();

        if (isset($_GET['kat_id'])) {
            return $this->edit($_GET['kat_id']);
        } else {
            return $this->edit($rows[0]);
        }
        
    }

}