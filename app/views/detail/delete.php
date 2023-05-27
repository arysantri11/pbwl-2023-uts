<?php

// var_dump($data);
?>

<h2 class="judul-halaman">Hapus Detail Pemesanan</h2>

<form action="../Proses" method="post">
    <input type="hidden" name="detail_id_order" value="<?= $data['dataDetail']['detail_id_order'] ?>">
    <input type="hidden" name="detail_id_produk" value="<?= $data['dataDetail']['detail_id_produk'] ?>">
    <input type="hidden" name="detail_jml" value="<?= $data['dataDetail']['detail_jml'] ?>">
    <table>
        <tr>
            <td>PEMESANAN</td>
            <td>
                <select name="order" disabled>
                    <option value="<?= $data['dataDetail']['order_id'] ?>"><?= $data['dataDetail']['order_kode'] ?> - <?= $data['dataDetail']['order_tgl'] ?></option>
                </select>
            </td>
        </tr>
        <tr>
            <td>PRODUK</td>
            <td>
                <select name="produk" disabled>
                    <option value="<?= $data['dataDetail']['produk_id'] ?>"><?= $data['dataDetail']['produk_nama'] ?></option>
                </select>
            </td>
        </tr>
        <tr>
            <td>JUMLAH</td>
            <td><input type="number" min="1" name="jml" value="<?= $data['dataDetail']['detail_jml'] ?>" disabled></td>
        </tr>
        <tr>
            <td>HARGA</td>
            <td><input type="number" min="0" name="detail_harga" value="<?= $data['dataDetail']['detail_harga'] ?>" disabled></td>
        </tr>

        <tr>
            <td></td>
            <td><input type="submit" name="btn_delete" value="HAPUS" class="btn-delete"></td>
        </tr>
    </table>
</form>

<a href="../Index" class="btn">Kembali</a>