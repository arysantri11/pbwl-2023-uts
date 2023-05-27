<?php

use App\Kas as Kas;

$id = $_GET['id'];

$kas = new Kas();
$rows = $kas->delete($id);

echo "<script>alert('Data kas berhasil dihapus!');window.location = 'index.php?hal=kas_tampil';</script>";
?>