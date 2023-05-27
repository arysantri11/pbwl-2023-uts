<?php

use App\Kategori as Kategori;

$id = $_GET['id'];

$kat = new Kategori();
$rows = $kat->delete($id);

echo "<script>alert('Data kategori berhasil dihapus!');window.location = 'index.php?hal=kat_tampil';</script>";
?>

