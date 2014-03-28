<h1>Update Profil Siswa RPL 3</h1>
<div class="form-tambah">
    <?php
    echo form_open_multipart('rpl3/update');
    ?>
    <p>Nama Profile</p>
    <?php echo form_error('nama'); ?>
    <input type="hidden" name="id" value="<?php echo $data['id'];?>">
    <input type="hidden" name="foto" value="<?php echo $data['foto'];?>">
    <input type="text" name="nama" class="form-control" value="<?php echo $data['nama'];?>"><br>        
    <p>Jenis Kelamin</p>
    <?php echo form_error('gender'); ?>
    <select name="gender" class="form-control" placeholder="Jenis Kelamin"><option>Laki-laki</option><option>Perempuan</option></select><br>  
    <p>Alamat</p>
    <?php echo form_error('alamat'); ?>
    <input type="text" name="alamat" class="form-control" value="<?php echo $data['alamat'];?>"><br>  
    <p class="help-block"></p>
    <input type="submit" value="Simpan" class="btn btn-primary">
    <a href='<?= site_url('rpl3'); ?>'><input type="button" value="Cancel" class="btn btn-default"></a>
    <button type="Reset" class="btn btn-default">Reset</button>
    <?php
    form_close();
    ?>
</div>