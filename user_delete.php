<?php

use App\User as User;

$id = $_GET['id'];

$user = new User();
$rows = $user->delete($id);

echo "<script>alert('Data user berhasil dihapus!');window.location = 'index.php?hal=user_tampil';</script>";
?>

