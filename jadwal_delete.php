<?php

use App\Jadwal as Jadwal;

$id = $_GET['id'];

$jadwal = new Jadwal();
$rows = $jadwal->delete($id);

echo "<script>alert('Data jadwal berhasil dihapus!');window.location = 'index.php?hal=jadwal_tampil';</script>";
?>