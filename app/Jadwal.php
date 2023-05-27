<?php

namespace App;

use Inc\Koneksi;
use App\User as User;

class Jadwal extends Koneksi {
    
    public function tampil()
    {
        // Instansiasi class User
        $user = new User;
        $dataUser = $user->tampil();

        $sql = "SELECT * FROM tb_petugasshalat as petugas INNER JOIN tb_kategori as kategori ON petugas.ps_id_kategori=kategori.kat_id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        $data = [];
        $tugas = ["imam", "khatib", "muadzin", "bilal"];

        while ($rows = $stmt->fetch()) {
            
            $i = 2;
            foreach ($tugas as $rowPetugas) {
                
                foreach ($dataUser as $rowUser) {
                    if ($rows[$i] == $rowUser['user_id']) {
                        $dataPetugas[$rowPetugas] = $rowUser['user_nama'];
                    }
                }
                $i++;
            }
            $data[] =  array_merge($rows, $dataPetugas);
        }

        return $data;
    }

    public function simpan()
    {
        $ps_date = $_POST['ps_tanggal'];
        $ps_id_kategori = $_POST['ps_kategori'];
        $ps_id_imam = $_POST['ps_imam'];
        $ps_id_khatib = $_POST['ps_khatib'];
        $ps_id_muadzin = $_POST['ps_muadzin'];
        $ps_id_bilal = $_POST['ps_bilal'];
        $ps_text = $_POST['ps_text'];

        $sql = "INSERT INTO tb_petugasshalat (ps_date, ps_id_kategori, ps_id_imam, ps_id_khatib, ps_id_muadzin, ps_id_bilal, ps_text) VALUES (:ps_date, :ps_id_kategori, :ps_id_imam, :ps_id_khatib, :ps_id_muadzin, :ps_id_bilal, :ps_text)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":ps_date", $ps_date);
        $stmt->bindParam(":ps_id_kategori", $ps_id_kategori);
        $stmt->bindParam(":ps_id_imam", $ps_id_imam);
        $stmt->bindParam(":ps_id_khatib", $ps_id_khatib);
        $stmt->bindParam(":ps_id_muadzin", $ps_id_muadzin);
        $stmt->bindParam(":ps_id_bilal", $ps_id_bilal);
        $stmt->bindParam(":ps_text", $ps_text);
        $stmt->execute();

    }

    public function edit($id)
    {
        // Instansiasi class User
        $user = new User;
        $dataUser = $user->tampil();

        $sql = "SELECT * FROM tb_petugasshalat as petugas INNER JOIN tb_kategori as kategori ON petugas.ps_id_kategori=kategori.kat_id WHERE petugas.ps_id=:ps_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":ps_id", $id);
        $stmt->execute();
        $rows = $stmt->fetch();

        $data = [];
        $tugas = ["imam", "khatib", "muadzin", "bilal"];
            
        $i = 2;
        foreach ($tugas as $rowPetugas) {
                
            foreach ($dataUser as $rowUser) {
                if ($rows[$i] == $rowUser['user_id']) {
                    $dataPetugas[$rowPetugas . '_id'] = $rowUser['user_id'];
                    $dataPetugas[$rowPetugas . '_nama'] = $rowUser['user_nama'];
                }
            }
            $i++;
        }
        $data =  array_merge($rows, $dataPetugas);

        return $data;
    }

    public function allByIdKat($id)
    {

        // Instansiasi class User
        $user = new User;
        $dataUser = $user->tampil();

        $sql = "SELECT * FROM tb_petugasshalat as petugas INNER JOIN tb_kategori as kategori ON petugas.ps_id_kategori=kategori.kat_id WHERE petugas.ps_id_kategori=:ps_id_kategori";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":ps_id_kategori", $id);
        $stmt->execute();
        $error = $stmt->fetch();

        if ($error != false) {
            $data = [];
            $tugas = ["imam", "khatib", "muadzin", "bilal"];
            
            $stmt->execute();
            while ($rows = $stmt->fetch()) {
                $i = 2;
                foreach ($tugas as $rowPetugas) {
                    
                    foreach ($dataUser as $rowUser) {
                        if ($rows[$i] == $rowUser['user_id']) {
                            $dataPetugas[$rowPetugas] = $rowUser['user_nama'];
                        }
                    }
                    $i++;
                }
                $data[] =  array_merge($rows, $dataPetugas);
            }

            return $data;
        } else {
            $dataText['error'] = "<p class='text-center'>Jadwal tidak ditemukan</p>";
            return $data[] = $dataText;
        }
    }

    public function update()
    {
        $ps_date = $_POST['ps_tanggal'];
        $ps_id_kategori = $_POST['ps_kategori'];
        $ps_id_imam = $_POST['ps_imam'];
        $ps_id_khatib = $_POST['ps_khatib'];
        $ps_id_muadzin = $_POST['ps_muadzin'];
        $ps_id_bilal = $_POST['ps_bilal'];
        $ps_text = $_POST['ps_text'];
        $ps_id = $_POST['ps_id'];

        $sql = "UPDATE tb_petugasshalat SET ps_date=:ps_date, ps_id_kategori=:ps_id_kategori, ps_id_imam=:ps_id_imam, ps_id_khatib=:ps_id_khatib, ps_id_muadzin=:ps_id_muadzin, ps_id_bilal=:ps_id_bilal, ps_text=:ps_text WHERE ps_id=:ps_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":ps_date", $ps_date);
        $stmt->bindParam(":ps_id_kategori", $ps_id_kategori);
        $stmt->bindParam(":ps_id_imam", $ps_id_imam);
        $stmt->bindParam(":ps_id_khatib", $ps_id_khatib);
        $stmt->bindParam(":ps_id_muadzin", $ps_id_muadzin);
        $stmt->bindParam(":ps_id_bilal", $ps_id_bilal);
        $stmt->bindParam(":ps_text", $ps_text);
        $stmt->bindParam(":ps_id", $ps_id);
        $stmt->execute();

    }

    public function delete($id)
    {
        $sql = "DELETE FROM tb_petugasshalat WHERE ps_id=:ps_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":ps_id", $id);
        $stmt->execute();
    }
}