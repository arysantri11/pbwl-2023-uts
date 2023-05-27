<h2 class="judul-halaman">Tambah Keranjang</h2>

<form action="Proses" method="post">
    <table>
        <tr>
            <td>PEMBELI</td>
            <td>
                <select name="ker_id_user" required>
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
            <td><input type="number" min="1" name="ker_jml" required></td>
        </tr>
        
        <tr>
            <td></td>
            <td><input type="submit" class="btn-simpan" name="btn_simpan" value="SIMPAN"></td>
        </tr>
    </table>
</form>

<a href="Index" class="btn">Kembali</a>