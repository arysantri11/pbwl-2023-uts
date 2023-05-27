<h2 class="judul-halaman">Tambah Produk</h2>

<form action="Proses" method="post">
    <table>
        <tr>
            <td>KATEGORI</td>
            <td>
                <select name="produk_id_kat" required>
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
            <td><input type="text" name="produk_kode" required></td>
        </tr>
        <tr>
            <td>NAMA PRODUK</td>
            <td><input type="text" name="produk_nama" required></td>
        </tr>
        <tr>
            <td>HARGA (Rp)</td>
            <td><input type="number" min="0" name="produk_hrg" required></td>
        </tr>
        <tr>
            <td>KETERANGAN</td>
            <td><textarea name="produk_keterangan" id="" cols="30" rows="10"></textarea></td>
        </tr>
        <tr>
            <td>STOK</td>
            <td><input type="number" min="0" name="produk_stock" required></td>
        </tr>
        <tr>
            <td>FOTO</td>
            <td><input type="text" name="produk_photo" required></td>
        </tr>

        <tr>
            <td></td>
            <td><input type="submit" class="btn-simpan" name="btn_simpan" value="SIMPAN"></td>
        </tr>
    </table>
</form>

<a href="Index" class="btn">Kembali</a>