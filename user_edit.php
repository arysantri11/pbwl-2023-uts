<?php

use App\User as User;

$user = new User;
$dataUser = $user->edit($_GET['id']);

// var_dump($dataKas);
?>

<h2 class="text-center">Ubah User</h2>

<form action="index.php?hal=user_proses" method="post" class="form-crud">
    <input type="hidden" name="user_id" value="<?= $dataUser['user_id'] ?>">
    <table>
        <tr>
            <td>
                <div class="form-input">
                    <label for="user_username">Username</label>
                    <input type="text" name="user_username" id="user_username" value="<?= $dataUser['user_username'] ?>" required>
                </div>  
            </td>
            <td>
                <div class="form-input">
                    <label for="user_password">Password</label>
                    <input type="text" name="user_password" id="user_password" value="<?= $dataUser['user_password'] ?>"  required>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="form-input">
                    <label for="user_nama">Nama Lengkap</label>
                    <input type="text" name="user_nama" id="user_nama" value="<?= $dataUser['user_nama'] ?>"  required>
                </div>  
            </td>
            <td>
                <div class="form-input">
                    <label for="user_telp">Telp</label>
                    <input type="text" name="user_telp" id="user_telp" value="<?= $dataUser['user_telp'] ?>" >
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <div class="form-input">
                    <label for="user_alamat">Alamat</label>
                    <textarea name="user_alamat" id="user_alamat" rows="4"><?= $dataUser['user_alamat'] ?> </textarea>
                </div>  
            </td>
            
        </tr>
        <tr>
            <td>
                <div class="form-input">
                    <label for="user_level">Level</label>
                    <select name="user_level" id="user_level">
                        <option value="<?= $dataUser['user_level'] ?>"><?= $dataUser['user_level'] ?></option>
                        <option value="USER">USER</option>
                        <option value="ADMIN">ADMIN</option>
                        <option value="KETUA">KETUA</option>
                        <option value="SEKRETARIS">SEKRETARIS</option>
                        <option value="BENDAHARA">BENDAHARA</option>
                        <option value="PEMBINA">PEMBINA</option>
                    </select>
                </div>
            </td>
            <td>
                <div class="form-input">
                    <label for="user_aktif">Aktif</label>
                    <select name="user_aktif" id="user_aktif">
                        <option value="<?= $dataUser['user_aktif'] ?>"><?= $dataUser['user_aktif'] ?></option>
                        <option value="Y">YA</option>
                        <option value="N">TIDAK</option>
                    </select>
                </div>
            </td>
        </tr>
    </table>
    
    
    <div class="form-input">
        <input class="btn-submit" type="submit" name="btn_update" value="SIMPAN">
        <input class="btn-reset" type="reset" value="RESET">
    </div>
    
</form>
<a href="index.php?hal=user_tampil"><button class="btn-back">Kembali</button></a>