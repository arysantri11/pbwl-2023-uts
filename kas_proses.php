<?php

use App\Kas as Kas;

$kas = new Kas();

if (isset($_POST['btn_simpan'])) {
    $kas->simpan();
    echo "<script>alert('Data kas berhasil ditambahkan!');window.location = 'index.php?hal=kas_tampil';</script>";
    // header("location:index.php?hal=kas_tampil");
}

if (isset($_POST['btn_update'])) {
    $kas->update();
    echo "<script>alert('Data kas berhasil diubah!');window.location = 'index.php?hal=kas_tampil';</script>";
    // header("location:index.php?hal=kas_tampil");
}

if (isset($_POST['btn_search'])) {
    $id = $_POST['search'];
    $dataKategori = $kat->edit($id);

    header("location:index.php?hal=jadwal_tampil&id=" . $dataKategori['kat_id']);
}