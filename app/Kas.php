<?php

namespace App;

use Inc\Koneksi;

class Kas extends Koneksi {
    public function tampil()
    {

        $sql = "SELECT * FROM tb_kas as kas INNER JOIN tb_users as users ON kas.kas_id_user=users.user_id ORDER BY kas_id DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        $data = [];

        while ($rows = $stmt->fetch()) {

            $data[] =  $rows;
        }

        return $data;
    }

    public function simpan()
    {
        $kas_id_user = $_POST['kas_id_user'];
        $kas_masuk = $_POST['kas_masuk'];
        $kas_keluar = $_POST['kas_keluar'];
        $kas_date = $_POST['kas_date'];
        $kas_text = $_POST['kas_text'];

        $dataTerbaru = $this->singleByLatest();
        $kas_sebelum = $dataTerbaru['kas_sesudah'];

        // penjumlahan
        $kas_sesudah = $kas_sebelum + ($kas_masuk - $kas_keluar);

        $sql = "INSERT INTO tb_kas (kas_id_user, kas_masuk, kas_keluar, kas_sebelum, kas_sesudah, kas_date, kas_text) VALUES (:kas_id_user, :kas_masuk, :kas_keluar, :kas_sebelum, :kas_sesudah, :kas_date, :kas_text)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":kas_id_user", $kas_id_user);
        $stmt->bindParam(":kas_masuk", $kas_masuk);
        $stmt->bindParam(":kas_keluar", $kas_keluar);
        $stmt->bindParam(":kas_sebelum", $kas_sebelum);
        $stmt->bindParam(":kas_sesudah", $kas_sesudah);
        $stmt->bindParam(":kas_date", $kas_date);
        $stmt->bindParam(":kas_text", $kas_text);
        $stmt->execute();

    }

    public function edit($id)
    {
        $sql = "SELECT * FROM tb_kas WHERE kas_id=:kas_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":kas_id", $id);
        $stmt->execute();

        $row = $stmt->fetch(\PDO::FETCH_ASSOC);

        return $row;
    }

    public function singleByLatest()
    {
        $sql = "SELECT * FROM tb_kas ORDER BY kas_id DESC LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        $data = $stmt->fetch();

        return $data;
    }

    public function update()
    {
        $kas_id_user = $_POST['kas_id_user'];
        $kas_masuk = $_POST['kas_masuk'];
        $kas_keluar = $_POST['kas_keluar'];
        $kas_sebelum = $_POST['kas_sebelum'];
        $kas_sesudah = $_POST['kas_sesudah'];
        $kas_date = $_POST['kas_date'];
        $kas_text = $_POST['kas_text'];
        $kas_id = $_POST['kas_id'];

        // rumus
        $kas_sesudah = $kas_sebelum + ($kas_masuk - $kas_keluar);

        $sql = "UPDATE tb_kas SET kas_id_user=:kas_id_user, kas_masuk=:kas_masuk, kas_keluar=:kas_keluar, kas_sebelum=:kas_sebelum, kas_sesudah=:kas_sesudah, kas_date=:kas_date, kas_text=:kas_text WHERE kas_id=:kas_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":kas_id_user", $kas_id_user);
        $stmt->bindParam(":kas_masuk", $kas_masuk);
        $stmt->bindParam(":kas_keluar", $kas_keluar);
        $stmt->bindParam(":kas_sebelum", $kas_sebelum);
        $stmt->bindParam(":kas_sesudah", $kas_sesudah);
        $stmt->bindParam(":kas_date", $kas_date);
        $stmt->bindParam(":kas_text", $kas_text);
        $stmt->bindParam(":kas_id", $kas_id);
        $stmt->execute();

    }

    public function delete($id)
    {
        $sql = "DELETE FROM tb_kas WHERE kas_id=:kas_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":kas_id", $id);
        $stmt->execute();
    }

}