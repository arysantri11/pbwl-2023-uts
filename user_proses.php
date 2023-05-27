<?php

use App\User as User;

$user = new User();

if (isset($_POST['btn_simpan'])) {
    $user->simpan();
    echo "<script>alert('Data user berhasil ditambahkan!');window.location = 'index.php?hal=user_tampil';</script>";
    // header("location:index.php?hal=user_tampil");
}

if (isset($_POST['btn_update'])) {
    $user->update();
    echo "<script>alert('Data user berhasil diubah!');window.location = 'index.php?hal=user_tampil';</script>";
    // header("location:index.php?hal=user_tampil");
}