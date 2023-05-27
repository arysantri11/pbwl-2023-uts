<?php

// var_dump($_SESSION['user']['user_id']);
?>

<h2 class="text-center">Tambah Kas</h2>

<form action="index.php?hal=kas_proses" method="post" class="form-crud">
    <input type="hidden" name="kas_id_user" id="kas_id_user" value="<?= $_SESSION['user']['user_id'] ?>">    
    <table>
        <tr>
            <td>
                <div class="form-input">
                    <label for="kas_date">Tanggal</label>
                    <input type="date" name="kas_date" id="kas_date" style="width: 120px;" required>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="form-input">
                    <label for="kas_masuk">Masuk</label>
                    <input type="number" name="kas_masuk" id="kas_masuk" min="0" style="width: 200px;" required>
                </div>
            </td>
            <td>
                <div class="form-input">
                    <label for="kas_keluar">Keluar</label>
                    <input type="number" name="kas_keluar" id="kas_keluar" min="0" style="width: 200px;" required>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <div class="form-input">
                    <label for="kas_text">Keterangan</label>
                    <textarea name="kas_text" id="kas_text" rows="4" style="width: 440px;"></textarea>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <div class="form-input">
                    <input class="btn-submit" type="submit" name="btn_simpan" value="SIMPAN">
                    <input class="btn-reset" type="reset" value="RESET">
                </div>
            </td>
        </tr>
    </table>
</form>

<a href="index.php?hal=kas_tampil"><button class="btn-back">Kembali</button></a>