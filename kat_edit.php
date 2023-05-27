<?php

use App\Kategori as Kategori;

$id = $_GET['id'];

$kat = new Kategori();
$row = $kat->edit($id);
?>

<h2 class="text-center">Ubah Kategori</h2>

<form action="index.php?hal=kat_proses" method="post" class="form-crud">
    <input type="hidden" name="kat_id" value="<?= $row['kat_id']; ?>">
    <div class="form-input">
        <label for="kat_nama">Nama</label>
        <input type="text" name="kat_nama" id="kat_nama" value="<?= $row['kat_nama']; ?>" required></td>
    </div>
    <div class="form-input">
        <label for="kat_text">Keterangan</label>
        <textarea name="kat_text" id="kat_text" rows="4"><?= $row['kat_text']; ?></textarea>
    </div>
    <div class="form-input">
        <input class="btn-submit" type="submit" name="btn_update" value="UPDATE">
        <input class="btn-reset" type="reset" value="RESET">
    </div>
</form>
<br>
<a href="index.php?hal=kat_tampil"><button class="btn-back">Kembali</button></a>