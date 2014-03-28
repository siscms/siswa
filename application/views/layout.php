
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="<?php echo base_url() ?>docs-assets/ico/favicon.png">

        <title>Profil <?php echo isset($title) ? ' | ' . $title : null; ?></title>


        <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url() ?>media/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="<?php echo base_url() ?>media/css/style.css" rel="stylesheet">

    </head>

    <body>
        <div id="wrap">
            <div class="container">
                <div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="<?php echo site_url('login/index') ?> ">App. Profil Siswa</a>
                        </div>
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="<?php echo site_url('login/index') ?> ">Home</a></li> 
                                <li><?php isset($view) ? $this->load->view($view) : null; ?></li>
                                <li><a href="<?php echo site_url('rpl1/galery') ?> ">Gallery</a></li>
                                <li><?php isset($logout) ? $this->load->view($logout) : null; ?></li>
                            </ul>
                        </div><!-- /.nav-collapse -->
                    </div><!-- /.container -->
                </div><!-- /.navbar -->
                <div class="main">
                    <div class="col-kiri">
                        <?php isset($kiri) ? $this->load->view($kiri) : null; ?>
                    </div>
                    <div class="col-kanan">
                        <?php isset($pesan) ? $this->load->view($pesan) : null; ?>
                        <?php isset($page) ? $this->load->view($page) : null; ?>
                    </div>
                </div>

            </div>
        </div>


        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="../../dist/js/bootstrap.min.js"></script>
    </body>
</html>
