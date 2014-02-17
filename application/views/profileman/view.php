<body>
    <h1 class="jdl">Profil Divisi Manager</h1>
    <hr style="size: 3px">
    <div>
        <div class="tombol-tambah">
            <a href='<?= site_url('profileman/create'); ?>'><img src="<?php echo base_url() ?>/media/images/add.png "></a>
        </div>
        <div id="table">
            <table class="table table-bordered" align="center">
                <tr class="info">
                    <td class="controls" id="no" align="center">No</td>
                    <td class="controls" id="nama" align="center">Nama</td>
                    <td class="controls" id="alamat" align="center">Alamat</td>
                    <td class="controls" id="foto" align="center">Foto</td>
                    <td class="controls" id="aksi" align="center">Aksi</td>
                </tr>
                <?php
                if (!empty($data)) {
                    $no = 1;
                    foreach ($data as $row) {
                        ?>
                        <tr class="isi">
                            <td id="no"><?php echo $no; ?></td>
                            <td id="nama"><?php echo $row->nama; ?></td>
                            <td id="alamat"><?php echo $row->alamat; ?></td>
                            <td id="foto" style="width: 140px;"><img src="<?php echo base_url() ?>/uploads_manager/<?php echo $row->nama; ?>.jpg" width="130px" height="auto" style="border-style: solid;border-width: 4px;border-color: black; padding: 5px;"/></td>
                            <td id="action" style="width: 140px;"> <a href="<?= site_url('profileman/update/' . $row->id); ?>"><button type="button" class="btn btn-primary" style="padding: 2px 5px;">update</button> | <a href="<?php echo site_url('profileman/delete/' . $row->id); ?>" onclick="return confirm('Apakah Anda Yakin?');"><button type="button" class="btn btn-danger" style="padding: 2px 5px;">delete</button></td>
                        </tr>
                        <?php
                        $no++;
                    }
                } else {
                    ?>
                <tr id="row">
                    <td colspan="6" align="center">Data Kosong</td>
                </tr>
                <?
                }
                ?>   
            </table>
        </div>
    </div>
</body>