<?php

use App\User as User;
use App\Kategori as Kategori;
use App\Jadwal as Jadwal;

$kat= new Kategori;
$dataKategori = $kat->tampil();

$user = new User;
$dataUser = $user->tampil();

$jad = new Jadwal;
$dataJadwal = $jad->edit($_GET['id']);

// var_dump($dataJadwal);
?>

<h2 class="text-center">Ubah Jadwal</h2>

<form action="index.php?hal=jadwal_proses" method="post" class="form-crud">
    <input type="hidden" name="ps_id" value="<?= $dataJadwal['ps_id']; ?>">
    <table>
        <tr>
            <td>
                <div class="form-input">
                    <label for="ps_tanggal">Tanggal</label>
                    <input type="date" name="ps_tanggal" id="ps_tanggal" style="width: 120px;" value="<?= $dataJadwal['ps_date'] ?>" required>
                </div>
            </td>
            <td>
                <div class="form-input">
                    <label for="ps_kategori">Kategori</label>
                    <select name="ps_kategori" style="width: 200px;" required>
                        <option value="<?= $dataJadwal['kat_id'] ?>"><?= $dataJadwal['kat_nama'] ?></option>
                        <?php foreach ($dataKategori as $row) { ?>
                            <option value="<?= $row['kat_id'] ?>"><?= $row['kat_nama'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="form-input">
                    <label for="ps_imam">Imam</label>
                    <select name="ps_imam" style="width: 200px;" required>
                        <option value="<?= $dataJadwal['imam_id'] ?>"><?= $dataJadwal['imam_nama'] ?></option>
                        <?php foreach ($dataUser as $row) { ?>
                            <option value="<?= $row['user_id'] ?>"><?= $row['user_nama'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </td>
            <td>
                <div class="form-input">
                    <label for="ps_khatib">Khatib</label>
                    <select name="ps_khatib" style="width: 200px;" required>
                        <option value="<?= $dataJadwal['khatib_id'] ?>"><?= $dataJadwal['khatib_nama'] ?></option>
                        <?php foreach ($dataUser as $row) { ?>
                            <option value="<?= $row['user_id'] ?>"><?= $row['user_nama'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="form-input">
                    <label for="ps_muadzin">Muadzin</label>
                    <select name="ps_muadzin" style="width: 200px;" required>
                        <option value="<?= $dataJadwal['muadzin_id'] ?>"><?= $dataJadwal['muadzin_nama'] ?></option>
                        <?php foreach ($dataUser as $row) { ?>
                            <option value="<?= $row['user_id'] ?>"><?= $row['user_nama'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </td>
            <td>
                <div class="form-input">
                    <label for="ps_bilal">Bilal</label>
                    <select name="ps_bilal" style="width: 200px;" required>
                        <option value="<?= $dataJadwal['bilal_id'] ?>"><?= $dataJadwal['bilal_nama'] ?></option>
                        <?php foreach ($dataUser as $row) { ?>
                            <option value="<?= $row['user_id'] ?>"><?= $row['user_nama'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <div class="form-input">
                    <label for="ps_text">Keterangan</label>
                    <textarea name="ps_text" id="ps_text" rows="4" style="width: 420px;"><?= $dataJadwal['ps_text'] ?></textarea>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <div class="form-input">
                    <input class="btn-submit" type="submit" name="btn_update" value="SIMPAN">
                    <input class="btn-reset" type="reset" value="RESET">
                </div>
            </td>
        </tr>
    </table>
</form>

<a href="index.php?hal=jadwal_tampil"><button class="btn-back">Kembali</button></a>