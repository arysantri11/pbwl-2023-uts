<?php

namespace App;

use Inc\Koneksi as Koneksi;

class User extends Koneksi {

    public function tampil()
    {
        $sql = "SELECT * FROM tb_users ORDER BY user_level DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        $data = [];

        while ($rows = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $data[] = $rows;
        }

        return $data;
    }

    public function userById($id)
    {

        $sql = "SELECT * FROM tb_users WHERE user_id=:user_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":user_id", $id);
        $stmt->execute();

        $row = $stmt->fetch(\PDO::FETCH_ASSOC);

        return $row;
    }

    public function userByUsername($username)
    {

        $sql = "SELECT * FROM tb_users WHERE user_username=:user_username";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":user_username", $username);
        $stmt->execute();

        $row = $stmt->fetch(\PDO::FETCH_ASSOC);

        return $row;
    }

    public static function cekLogin()
    {   
        
        if (!isset($_SESSION['user_login'])) {
            header("Location: logout.php");
        }
    }

    public function simpan()
    {
        $user_username = $_POST['user_username'];
        $user_password = $_POST['user_password'];
        $user_nama = $_POST['user_nama'];
        $user_telp = $_POST['user_telp'];
        $user_alamat = $_POST['user_alamat'];
        $user_level = $_POST['user_level'];
        $user_aktif = $_POST['user_aktif'];

        $sql = "INSERT INTO tb_users (user_username, user_password, user_nama, user_telp, user_alamat, user_level, user_aktif) VALUES (:user_username, :user_password, :user_nama, :user_telp, :user_alamat, :user_level, :user_aktif)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":user_username", $user_username);
        $stmt->bindParam(":user_password", $user_password);
        $stmt->bindParam(":user_nama", $user_nama);
        $stmt->bindParam(":user_telp", $user_telp);
        $stmt->bindParam(":user_alamat", $user_alamat);
        $stmt->bindParam(":user_level", $user_level);
        $stmt->bindParam(":user_aktif", $user_aktif);
        $stmt->execute();

    }

    public function edit($id)
    {

        $sql = "SELECT * FROM tb_users WHERE user_id=:user_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":user_id", $id);
        $stmt->execute();

        $row = $stmt->fetch(\PDO::FETCH_ASSOC);

        return $row;
    }

    public function update()
    {
        $user_username = $_POST['user_username'];
        $user_password = $_POST['user_password'];
        $user_nama = $_POST['user_nama'];
        $user_telp = $_POST['user_telp'];
        $user_alamat = $_POST['user_alamat'];
        $user_level = $_POST['user_level'];
        $user_aktif = $_POST['user_aktif'];
        $user_id = $_POST['user_id'];

        $sql = "UPDATE tb_users SET user_username=:user_username, user_password=:user_password, user_nama=:user_nama, user_telp=:user_telp, user_alamat=:user_alamat, user_level=:user_level, user_aktif=:user_aktif WHERE user_id=:user_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":user_username", $user_username);
        $stmt->bindParam(":user_password", $user_password);
        $stmt->bindParam(":user_nama", $user_nama);
        $stmt->bindParam(":user_telp", $user_telp);
        $stmt->bindParam(":user_alamat", $user_alamat);
        $stmt->bindParam(":user_level", $user_level);
        $stmt->bindParam(":user_aktif", $user_aktif);
        $stmt->bindParam(":user_id", $user_id);
        $stmt->execute();

    }

    public function delete($id)
    {
        $sql = "DELETE FROM tb_users WHERE user_id=:user_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":user_id", $id);
        $stmt->execute();
    }
}