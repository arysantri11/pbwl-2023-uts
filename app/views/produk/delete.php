<?php

// var_dump($data);
?>

<h2 class="judul-halaman">Hapus Produk</h2>

<form action="../Proses" method="post">
    <input type="hidden" name="produk_id" value="<?= $data['dataProduk']['produk_id'] ?>">
    <table>
        <tr>
            <td>KATEGORI</td>
            <td>
                <select name="produk_id_kat" disabled>
                    <option value="<?= $data['dataProduk']['kat_id'] ?>"><?= $data['dataProduk']['kat_nama'] ?></option>
                </select>
            </td>
        </tr>
        <tr>
            <td>PENJUAL</td>
            <td>
                <select name="produk_id_user" disabled>
                    <option value="<?= $data['dataProduk']['user_id'] ?>"><?= $data['dataProduk']['user_nama'] ?></option>
                </select>
            </td>
        </tr>
        <tr>
            <td>KODE</td>
            <td><input type="text" name="produk_kode" value="<?= $data['dataProduk']['produk_kode'] ?>" disabled></td>
        </tr>
        <tr>
            <td>NAMA PRODUK</td>
            <td><input type="text" name="produk_nama" value="<?= $data['dataProduk']['produk_nama'] ?>" disabled></td>
        </tr>
        <tr>
            <td>HARGA (Rp)</td>
            <td><input type="number" min="0" name="produk_hrg" value="<?= $data['dataProduk']['produk_hrg'] ?>" disabled></td>
        </tr>
        <tr>
            <td>KETERANGAN</td>
            <td><textarea name="produk_keterangan" id="" cols="30" rows="10" disabled><?= $data['dataProduk']['produk_keterangan'] ?></textarea></td>
        </tr>
        <tr>
            <td>STOK</td>
            <td><input type="number" min="0" name="produk_stock" value="<?= $data['dataProduk']['produk_stock'] ?>" disabled></td>
        </tr>
        <tr>
            <td>FOTO</td>
            <td><input type="text" name="produk_photo" value="<?= $data['dataProduk']['produk_photo'] ?>" disabled></td>
        </tr>

        <tr>
            <td></td>
            <td><input type="submit" name="btn_delete" value="HAPUS" class="btn-delete"></td>
        </tr>
    </table>
</form>

<a href="../Index" class="btn">Kembali</a>