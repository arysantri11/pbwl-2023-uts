<?php

// var_dump($data);
?>

<h2 class="judul-halaman">Hapus Keranjang</h2>

<form action="../Proses" method="post">
<input type="hidden" name="order_id" value="<?= $data['dataOrder']['order_id'] ?>">
    <table>
        <tr>
            <td>PEMBELI</td>
            <td>
                <select name="order_id_user" disabled>
                    <option value="<?= $data['dataOrder']['user_id'] ?>"><?= $data['dataOrder']['user_nama'] ?></option>
                </select>
            </td>
        </tr>
        <tr>
            <td>TANGGAL</td>
            <td><input type="text" name="order_tgl" value="<?= $data['dataOrder']['order_tgl'] ?>" disabled></td>
        </tr>
        <tr>
            <td>KODE</td>
            <td><input type="text" name="order_kode" value="<?= $data['dataOrder']['order_kode'] ?>" disabled></td>
        </tr>
        <tr>
            <td>TTL</td>
            <td><input type="text" name="order_ttl" value="<?= $data['dataOrder']['order_ttl'] ?>" disabled></td>
        </tr>
        <tr>
            <td>KURIR</td>
            <td><input type="text" name="order_kurir" value="<?= $data['dataOrder']['order_kurir'] ?>" disabled></td>
        </tr>
        <tr>
            <td>ONGKIR</td>
            <td><input type="number" min="0" name="order_ongkir" value="<?= $data['dataOrder']['order_ongkir'] ?>" disabled></td>
        </tr>
        <tr>
            <td>DEADLINE BAYAR</td>
            <td><input type="text" name="order_byr_deadline" value="<?= $data['dataOrder']['order_byr_deadline'] ?>" disabled></td>
        </tr>
        <tr>
            <td>BATAL</td>
            <td>
                <select name="order_batal" disabled>
                    <option value="<?= $data['dataOrder']['order_batal'] ?>"><?= $data['dataOrder']['order_batal'] ?></option>
                </select>
            </td>
        </tr>

        <tr>
            <td></td>
            <td><input type="submit" name="btn_delete" value="HAPUS" class="btn-delete"></td>
        </tr>
    </table>
</form>

<a href="../Index" class="btn">Kembali</a>