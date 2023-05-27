<?php

// var_dump($data);
?>

<h2 class="judul-halaman">Edit Pemesanan</h2>

<form action="../Proses" method="post">
    <input type="hidden" name="order_id" value="<?= $data['dataOrder']['order_id'] ?>">
    <table>
        <tr>
            <td>PEMBELI</td>
            <td>
                <select name="order_id_user" required>
                    <option value="<?= $data['dataOrder']['user_id'] ?>"><?= $data['dataOrder']['user_nama'] ?></option>
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
            <td><input type="text" name="order_kode" value="<?= $data['dataOrder']['order_kode'] ?>" required></td>
        </tr>
        <tr>
            <td>TTL</td>
            <td><input type="text" name="order_ttl" value="<?= $data['dataOrder']['order_ttl'] ?>"></td>
        </tr>
        <tr>
            <td>KURIR</td>
            <td><input type="text" name="order_kurir" value="<?= $data['dataOrder']['order_kurir'] ?>"></td>
        </tr>
        <tr>
            <td>ONGKIR</td>
            <td><input type="number" min="0" name="order_ongkir" value="<?= $data['dataOrder']['order_ongkir'] ?>" required></td>
        </tr>
        <tr>
            <td>DEADLINE BAYAR</td>
            <td><input type="date" name="order_byr_deadline" value="<?= $data['dataOrder']['order_byr_deadline'] ?>"></td>
        </tr>
        <tr>
            <td>BATAL</td>
            <td>
                <select name="order_batal" required>
                    <option value="<?= $data['dataOrder']['order_batal'] ?>"><?= $data['dataOrder']['order_batal'] ?></option>
                    <option value="0">0</option>
                    <option value="1">1</option>
                </select>
            </td>
        </tr>

        <tr>
            <td></td>
            <td><input type="submit" class="btn-simpan" name="btn_edit" value="SIMPAN"></td>
        </tr>
    </table>
</form>

<a href="../Index" class="btn">Kembali</a>