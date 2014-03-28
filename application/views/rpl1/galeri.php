<body>
    <h1 class="jdl">Profil Siswa RPL 1</h1>
    <hr style="size: 3px">
    <div>
        <div id="table">
            <table class="table table-bordered" align="center">
                <tr class="info">
                    <td class="controls" id="no" align="center">No</td>
                    <td class="controls" id="nama" align="center">Nama</td>
                    <td class="controls" id="gender" align="center">Jenis Kelamin</td>
                    <td class="controls" id="alamat" align="center">Alamat</td>
                    <td class="controls" id="foto" align="center">Foto</td>
                </tr>
                <?php
                if (!empty($data)) {
                    $no = 1;
                    foreach ($data as $row) {
                        ?>
                        <tr class="isi">
                            <td id="no"><?php echo $no; ?></td>
                            <td id="nama"><?php echo $row->nama; ?></td>
                            <td id="gender"><?php echo $row->gender; ?></td>
                            <td id="alamat"><?php echo $row->alamat; ?></td>
                            <td id="foto" style="width: 140px;"><img class="img-rounded" src="<?php echo base_url() ?>/uploads_1/<?php echo $row->foto; ?>.jpg" width="130px" height="auto" style="border-style: solid;border-width: 4px;border-color: black; padding: 5px;"/></td>
                        </tr>
                        <?php
                        $no++;
                    }
                } else {
                    ?>
                <tr id="row">
                    <td colspan="5" align="center">Data Kosong</td>
                </tr>
                <?php
                }
                ?>   
            </table>
        </div>
    </div>
</body>