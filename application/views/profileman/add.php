<h1>Tambah Profil</h1>
<div class="form-tambah">
    <?php
    echo form_open_multipart('profileman/create');
    ?>
    <p>Nama Profil</p>
    <?php echo form_error('nama'); ?>
    <input type="text" name="nama" class="form-control" placeholder="Text input"><br>  
    <p>Alamat</p>
    <?php echo form_error('alamat'); ?>
    <input type="text" name="alamat" class="form-control" placeholder="Text input"><br>  
    <p>Foto Profil</p>
    <?php echo form_error('foto'); ?>
    <input type="file" name="foto">
    <p class="help-block"></p>
    <input type="submit" value="Tambah" class="btn btn-primary">
    <a href='<?= site_url('profileman/index'); ?>'><input type="button" value="Cancel" class="btn btn-default"></a>
    <button type="Reset" class="btn btn-default">Reset</button>
    <?php
    form_close();
    ?>
</div>