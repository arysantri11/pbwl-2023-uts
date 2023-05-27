<?php

// var_dump($data);
?>

<h2 class="judul-halaman">Edit Produk</h2>

<form action="../Proses" method="post">
    <input type="hidden" name="produk_id" value="<?= $data['dataProduk']['produk_id'] ?>">
    <table>
        <tr>
            <td>KATEGORI</td>
            <td>
                <select name="produk_id_kat" required>
                    <option value="<?= $data['dataProduk']['kat_id'] ?>"><?= $data['dataProduk']['kat_nama'] ?></option>
                    <?php
                    foreach ($data['dataKategori'] as $row) {
                    ?>
                    <option value="<?= $row['kat_id'] ?>"><?= $row['kat_nama'] ?></option>
                    <?php } ?> 
                </select>
            </td>
        </tr>
        <tr>
            <td>PENJUAL</td>
            <td>
                <select name="produk_id_user" required>
                    <option value="<?= $data['dataProduk']['user_id'] ?>"><?= $data['dataProduk']['user_nama'] ?></option>
                    <?php
                    foreach ($data['dataUser'] as $row) {
                    ?>
                    <option value="<?= $row['user_id'] ?>"><?= $row['user_nama'] ?></option>
                    <?php } ?> 
                </select>
            </td>
        </tr>
        <tr>
            <td>KODE</td>
            <td><input type="text" name="produk_kode" value="<?= $data['dataProduk']['produk_kode'] ?>" required></td>
        </tr>
        <tr>
            <td>NAMA PRODUK</td>
            <td><input type="text" name="produk_nama" value="<?= $data['dataProduk']['produk_nama'] ?>" required></td>
        </tr>
        <tr>
            <td>HARGA (Rp)</td>
            <td><input type="number" min="0" name="produk_hrg" value="<?= $data['dataProduk']['produk_hrg'] ?>" required></td>
        </tr>
        <tr>
            <td>KETERANGAN</td>
            <td><textarea name="produk_keterangan" id="" cols="30" rows="10"><?= $data['dataProduk']['produk_keterangan'] ?></textarea></td>
        </tr>
        <tr>
            <td>STOK</td>
            <td><input type="number" min="0" name="produk_stock" value="<?= $data['dataProduk']['produk_stock'] ?>" required></td>
        </tr>
        <tr>
            <td>FOTO</td>
            <td><input type="text" name="produk_photo" value="<?= $data['dataProduk']['produk_photo'] ?>" required></td>
        </tr>

        <tr>
            <td></td>
            <td><input type="submit" class="btn-simpan" name="btn_edit" value="SIMPAN"></td>
        </tr>
    </table>
</form>

<a href="../Index" class="btn">Kembali</a>