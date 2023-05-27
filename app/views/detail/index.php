<?php

// var_dump($data);
?>

<h2 class="judul-halaman">Data Detail Pemesanan</h2>

<a href="Tambah" class="btn">Tambah Detail Pemesanan</a>

<table>
    <tr>
        <th>NO</th>
        <th>ORDER</th>
        <th>NAMA PRODUK</th>
        <th>HARGA (Rp)</th>
        <th>JUMLAH</th>
        <th>DELETE</th>
    </tr>
    <?php 
    $no = 1;
    foreach ($data['dataDetail'] as $row) { 
    ?>
    <tr>
        <td class="text-center"><?= $no; ?></td>
        <td><?= $row['order_kode'] . ' - ' . $row['order_tgl']; ?></td>
        <td><?= $row['produk_nama']; ?></td>
        <td class="text-center"><?= $row['detail_harga']; ?></td>
        <td class="text-center"><?= $row['detail_jml']; ?></td>
        <td class="text-center" style="width: 20px;">
            <a class="btn-delete" href="Delete/<?= $row['detail_id_order']; ?>-<?= $row['detail_id_produk']; ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                </svg>
            </a>
        </td>
    </tr>
    <?php
        $no++; 
    } 
    ?>
</table>