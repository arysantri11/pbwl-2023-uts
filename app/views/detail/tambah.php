<h2 class="judul-halaman">Tambah Detail Pemesanan</h2>

<form action="Proses" method="post">
    <table>
        <tr>
            <td>PEMESANAN</td>
            <td>
                <select name="detail_id_order" required>
                    <?php
                    foreach ($data['dataOrder'] as $row) {
                    ?>
                    <option value="<?= $row['order_id'] ?>"><?= $row['order_kode'] ?> - <?= $row['user_nama'] ?></option>
                    <?php } ?> 
                </select>
            </td>
        </tr>
        <tr>
            <td>PRODUK</td>
            <td>
                <select name="detail_id_produk" required>
                    <?php
                    foreach ($data['dataProduk'] as $row) {
                    ?>
                    <option value="<?= $row['produk_id'] ?>"><?= $row['produk_nama'] ?></option>
                    <?php } ?> 
                </select>
            </td>
        </tr>
        <tr>
            <td>JUMLAH</td>
            <td><input type="number" min="1" name="detail_jml" required></td>
        </tr>

        <tr>
            <td></td>
            <td><input type="submit" class="btn-simpan" name="btn_simpan" value="SIMPAN"></td>
        </tr>
    </table>
</form>

<a href="Index" class="btn">Kembali</a>