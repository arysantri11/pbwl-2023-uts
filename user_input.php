<h2 class="text-center">Tambah User</h2>

<form action="index.php?hal=user_proses" method="post" class="form-crud">
    <table>
        <tr>
            <td>
                <div class="form-input">
                    <label for="user_username">Username</label>
                    <input type="text" name="user_username" id="user_username" autofocus required>
                </div>  
            </td>
            <td>
                <div class="form-input">
                    <label for="user_password">Password</label>
                    <input type="text" name="user_password" id="user_password" required>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="form-input">
                    <label for="user_nama">Nama Lengkap</label>
                    <input type="text" name="user_nama" id="user_nama" required>
                </div>  
            </td>
            <td>
                <div class="form-input">
                    <label for="user_telp">Telp</label>
                    <input type="text" name="user_telp" id="user_telp">
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <div class="form-input">
                    <label for="user_alamat">Alamat</label>
                    <textarea name="user_alamat" id="user_alamat" rows="4"></textarea>
                </div>  
            </td>
            
        </tr>
        <tr>
            <td>
                <div class="form-input">
                    <label for="user_level">Level</label>
                    <select name="user_level" id="user_level">
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
                        <option value="Y">YA</option>
                        <option value="N">TIDAK</option>
                    </select>
                </div>
            </td>
        </tr>
    </table>
    
    
    <div class="form-input">
        <input class="btn-submit" type="submit" name="btn_simpan" value="SIMPAN">
        <input class="btn-reset" type="reset" value="RESET">
    </div>
    
</form>
<a href="index.php?hal=user_tampil"><button class="btn-back">Kembali</button></a>