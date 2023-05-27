<?php

use App\Jadwal as Jadwal;
use App\Kategori as Kategori;

$kat = new Kategori();
$jad = new Jadwal();

if (isset($_POST['btn_simpan'])) {
    $jad->simpan();
    echo "<script>alert('Data jadwal berhasil ditambahkan!');window.location = 'index.php?hal=jadwal_tampil';</script>";
    // header("location:index.php?hal=jadwal_tampil");
}

if (isset($_POST['btn_update'])) {
    $jad->update();
    echo "<script>alert('Data jadwal berhasil diubah!');window.location = 'index.php?hal=jadwal_tampil';</script>";
    // header("location:index.php?hal=jadwal_tampil");
}

if (isset($_POST['btn_search'])) {
    $id = $_POST['search'];
    $dataKategori = $kat->edit($id);
    // var_dump($dataKategori);
    echo "<script>window.location = 'index.php?hal=jadwal_tampil&id=" . $dataKategori['kat_id']  . "';</script>";
}