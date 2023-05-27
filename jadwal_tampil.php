<?php

use App\Jadwal as Jadwal;
use App\Kategori as Kategori;

$kat = new Kategori;
$dataKategori = $kat->tampil();

$jad = new Jadwal;

if (isset($_GET['id'])) {
    $dataJadwal = $jad->allByIdKat($_GET['id']);
    
    $singleKategori = $kat->edit($_GET['id']);
    $judul = "Jadwal Petugas " .  $singleKategori['kat_nama'];
}

// var_dump($dataJadwal);

?>

<form action="index.php?hal=jadwal_proses" method="POST" class="form-search">
    <select name="search" style="width: 200px;">
        <?php if (isset($judul)) {?>
            <option value="<?= $singleKategori['kat_id'] ?>"><?= $singleKategori['kat_nama'] ?></option>
        <?php } ?>
        <?php foreach ($dataKategori as $row) { ?>
            <option value="<?= $row['kat_id'] ?>"><?= $row['kat_nama'] ?></option>
        <?php } ?>
    </select>

    <input class="btn-submit" type="submit" name="btn_search" value="Search">

</form>
<br><hr><br>

<a href="index.php?hal=jadwal_input">
    <button class="btn-tambah">Tambah Jadwal</button>    
</a>

<?php 
if (isset($_GET['id'])) {
    if (isset($dataJadwal['error'])) {
        echo $dataJadwal['error'];
    } else { ?>
    
    <h2 class="text-center"><?= $judul ?></h2>

    <table class="table-crud">
        <tr class="header">
            <td class="text-center">NO</td>
            <td>TANGGAL</td>
            <td>IMAM</td>
            <td>KHATIB</td>
            <td>MUADZIN</td>
            <td>BILAL</td>
            <td>KETERANGAN</td>
            <td class="text-center">EDIT</td>
            <td class="text-center">DELETE</td>
        </tr>

        <?php

        $no = 1;
        foreach ($dataJadwal as $row) { 
        ?>
        <tr class="body">
            <td class="text-center" style="width: 50px;"><?= $no; ?></td>
            <td><?= $row['ps_date']; ?></td>
            <td><?= $row['imam']; ?></td>
            <td><?= $row['khatib']; ?></td>
            <td><?= $row['muadzin']; ?></td>
            <td><?= $row['bilal']; ?></td>
            <td><?= $row['ps_text']; ?></td>
            <td class="text-center" style="width: 20px;">
                <a class="btn-edit" href="index.php?hal=jadwal_edit&id=<?= $row['ps_id']; ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                    </svg>
                </a>
            </td>
            <td class="text-center" style="width: 20px;">
                <a class="btn-delete" href="index.php?hal=jadwal_delete&id=<?= $row['ps_id']; ?>">
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

<?php
    } 
}
?>