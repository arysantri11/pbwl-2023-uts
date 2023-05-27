<h2 class="judul-halaman">Tambah Pemesanan</h2>

<form action="Proses" method="post">
    <input type="hidden" name="order_batal" value="0">
    <table>
        <tr>
            <td>PEMBELI</td>
            <td>
                <select name="order_id_user" required>
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
            <td><input type="text" name="order_kode" required></td>
        </tr>
        <tr>
            <td>TTL</td>
            <td><input type="text" name="order_ttl"></td>
        </tr>
        <tr>
            <td>KURIR</td>
            <td><input type="text" name="order_kurir"></td>
        </tr>
        <tr>
            <td>ONGKIR</td>
            <td><input type="number" min="0" name="order_ongkir" required></td>
        </tr>
        <tr>
            <td>DEADLINE BAYAR</td>
            <td><input type="date" name="order_byr_deadline"></td>
        </tr>
        
        <tr>
            <td></td>
            <td><input type="submit" class="btn-simpan" name="btn_simpan" value="SIMPAN"></td>
        </tr>
    </table>
</form>

<a href="Index" class="btn">Kembali</a>