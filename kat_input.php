<h2 class="text-center">Tambah Kategori</h2>

<form action="index.php?hal=kat_proses" method="post" class="form-crud">
    <div class="form-input">
        <label for="kat_nama">Nama</label>
        <input type="text" name="kat_nama" id="kat_nama" autofocus required>
    </div>
    <div class="form-input">
        <label for="kat_text">Keterangan</label>
        <textarea name="kat_text" id="kat_text" rows="4"></textarea>
    </div>
    <div class="form-input">
        <input class="btn-submit" type="submit" name="btn_simpan" value="SIMPAN">
        <input class="btn-reset" type="reset" value="RESET">
    </div>
    
</form>
<a href="index.php?hal=kat_tampil"><button class="btn-back">Kembali</button></a>