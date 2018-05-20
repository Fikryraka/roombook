<?php
session_start();
if(empty($_SESSION['iduser'])) header('location: signin.php');
require("library/koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Aplikasi Pinjam Ruang">
    <meta name="author" content="Ahmad Ardiansyah">

    <title>Aplikasi Pinjam Ruang</title>
    <link rel="icon" type="text/css" href="upload/images/room.png">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper" class="toggled">

        <?php include("layout/menu.php");?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <h1>My Profile</h1>
                <hr>

                <form class="form-vertical">
                    <div class="row">
                    <?php
                    $sql = $db->query("SELECT * FROM login WHERE idlogin = '".$_SESSION['iduser']."'")->fetch_array();
                    if($sql['jenis'] == 'M'){
                        $getmhs = $db->query("SELECT * FROM mahasiswa WHERE idmhs = '".$sql['iduser']."'")->fetch_array(); ?>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">NIM Mahasiswa</label>
                                <input readonly type="text" class="form-control" value="<?php echo $getmhs['nim'];?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Nama Mahasiswa</label>
                                <input readonly type="text" class="form-control" value="<?php echo $getmhs['nama'];?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Tempat, Tanggal Lahir</label>
                                <input readonly type="text" class="form-control" value="<?php echo $getmhs['templahir'].", ".$getmhs['tgllahir'];?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Alamat Mahasiswa</label>
                                <textarea class="form-control" rows="2" readonly><?php echo $getmhs['alamat'];?></textarea>
                            </div>
                            <div class="form-group">
                                <label class="control-label">No. Telepon</label>
                                <input readonly type="text" class="form-control" value="<?php echo $getmhs['notlpn'];?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">Gol. Darah</label>
                                <input readonly type="text" class="form-control" value="<?php echo $getmhs['goldar'];?>">
                        </div>

                    <?php } else{
                        $getmhs = $db->query("SELECT * FROM pegawai WHERE idpegawai = '".$sql['iduser']."'")->fetch_array(); ?>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">NIK Pegawai</label>
                                <input readonly type="text" class="form-control" value="<?php echo $getmhs['nip'];?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Nama Pegawai</label>
                                <input readonly type="text" class="form-control" value="<?php echo $getmhs['nama'];?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Tempat, Tanggal Lahir</label>
                                <input readonly type="text" class="form-control" value="<?php echo $getmhs['templahir'].", ".$getmhs['tgllahir'];?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Alamat Pegawai</label>
                                <textarea class="form-control" rows="2" readonly><?php echo $getmhs['alamat'];?></textarea>
                            </div>
                            <div class="form-group">
                                <label class="control-label">No. Telepon</label>
                                <input readonly type="text" class="form-control" value="<?php echo $getmhs['notlpn'];?>">
                            </div>
                        </div>
                    <?php } ?>
                    </div>
                </form>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>
