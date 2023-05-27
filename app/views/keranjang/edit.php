<?php

// var_dump($data);
?>

<h2 class="judul-halaman">Edit Keranjang</h2>

<form action="../Proses" method="post">
    <input type="hidden" name="ker_id" value="<?= $data['dataKeranjang']['ker_id'] ?>">
    <table>
        <tr>
            <td>PEMBELI</td>
            <td>
                <select name="ker_id_user" required>
                    <option value="<?= $data['dataKeranjang']['user_id'] ?>"><?= $data['dataKeranjang']['user_nama'] ?></option>
                    <?php
                    foreach ($data['dataUser'] as $row) {
                    ?>
                    <option value="<?= $row['user_id'] ?>"><?= $row['user_nama'] ?></option>
                    <?php } ?> 
                </select>
            </td>
        </tr>
        <tr>
            <td>PRODUK</td>
            <td>
                <select name="ker_id_produk" required>
                    <option value="<?= $data['dataKeranjang']['produk_id'] ?>"><?= $data['dataKeranjang']['produk_nama'] ?> - Rp<?= $data['dataKeranjang']['produk_hrg'] ?></option>
                    <?php
                    foreach ($data['dataProduk'] as $row) {
                    ?>
                    <option value="<?= $row['produk_id'] ?>"><?= $row['produk_nama'] ?> - Rp<?= $row['produk_hrg'] ?></option>
                    <?php } ?> 
                </select>
            </td>
        </tr>
        <tr>
            <td>JUMLAH</td>
            <td><input type="number" min="1" name="ker_jml" value="<?= $data['dataKeranjang']['ker_jml'] ?>" required></td>
        </tr>

        <tr>
            <td></td>
            <td><input type="submit" class="btn-simpan" name="btn_edit" value="SIMPAN"></td>
        </tr>
    </table>
</form>

<a href="../Index" class="btn">Kembali</a>