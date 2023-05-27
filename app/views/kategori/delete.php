<?php

// var_dump($data);
?>

<h2 class="judul-halaman">Hapus Kategori</h2>

<form action="../Proses" method="post">
    <input type="hidden" name="kat_id" value="<?= $data['dataKategori']['kat_id'] ?>">
    <table>
        <tr>
            <td>NAMA</td>
            <td><input type="text" name="kat_nama" value="<?= $data['dataKategori']['kat_nama'] ?>" disabled></td>
        </tr>
        <tr>
            <td>KETERANGAN</td>
            <td><textarea name="kat_keterangan" id="" cols="30" rows="10"  disabled><?= $data['dataKategori']['kat_keterangan'] ?></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="btn_delete" value="HAPUS" class="btn-delete"></td>
        </tr>
    </table>
</form>

<a href="../Index" class="btn">Kembali</a>