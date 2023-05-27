<?php

use App\Kategori as Kategori;

$kat = new Kategori();

if (isset($_POST['btn_simpan'])) {
    $kat->simpan();
    echo "<script>alert('Data kategori berhasil ditambahkan!');window.location = 'index.php?hal=kat_tampil';</script>";
    // header("location:index.php?hal=kat_tampil");
}

if (isset($_POST['btn_update'])) {
    $kat->update();
    echo "<script>alert('Data kategori berhasil diubah!');window.location = 'index.php?hal=kat_tampil';</script>";
    // header("location:index.php?hal=kat_tampil");
}