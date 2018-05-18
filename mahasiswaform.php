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
                <h1>Form Add Mahasiswa</h1>
                <a href="mahasiswa.php" class="btn btn-secondary">Kembali</a>
                <hr>

                <?php
                //get data from mahasiswa
                if(isset($_GET['id'])){
                    $idmhs = $_GET['id'];
                    $dd = $db->query("SELECT * FROM mahasiswa WHERE idmhs = '".$idmhs."'")->fetch_array();
                } else {
                    $dd = ['idmhs'=>'','nim'=>'','nama'=>'','nama'=>'','goldar'=>'','tgllahir'=>'','templahir'=>'','alamat'=>'','notlpn'=>'','asalsekolah'=>'','alamatortu'=>'','jalur'=>''];
                }
                //end get

                // process submit
                if(isset($_POST['btnaddmhs'])){
                    //cek idmahasiswa jika ada lakukan update else lakukan insert
                    if($_POST['idmhs'] != ''){
                        $sql = $db->query("UPDATE mahasiswa SET
                            nim='".$_POST['nim']."',
                            nama='".$_POST['nama']."',
                            goldar='".$_POST['goldar']."',
                            tgllahir='".$_POST['tgllahir']."',
                            templahir='".$_POST['templahir']."',
                            alamat='".$_POST['alamat']."',
                            notlpn='".$_POST['notlpn']."',
                            asalsekolah='".$_POST['asalsekolah']."',
                            alamatortu='".$_POST['alamatortu']."' WHERE idmhs = '".$_POST['idmhs']."'");
                    }else{
                        $sql = $db->query("INSERT INTO mahasiswa VALUES ('','".$_POST['nim']."','".$_POST['nama']."','".$_POST['goldar']."','".$_POST['tgllahir']."','".$_POST['templahir']."','".$_POST['alamat']."','".$_POST['notlpn']."','".$_POST['asalsekolah']."','".$_POST['alamatortu']."')");
                    }

                    //cek jika berhasil
                    if($sql){
                        echo "<div class='alert alert-success'>Modify Succeded.</div>";
                    }else{
                        echo "<div class='alert alert-danger'>Modify Failed.</div>";
                    }
                }
                // end proses
                ?>

                <form class="form-vertical" method="post" action="mahasiswaform.php" enctype="multipart/form-data">

                    <input type="hidden" name="idmhs" value="<?php echo $dd['idmhs'];?>">

                    <div class="form-group">
                        <label class="control-label" for="email">nim</label>
                        <input value="<?php echo $dd['nim'];?>" name="nim" placeholder="Enter nim" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="email">Nama</label>
                        <input value="<?php echo $dd['nama'];?>" name="nama" placeholder="Enter nama" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="email">Golongan Darah</label>
                        <input value="<?php echo $dd['goldar'];?>" name="goldar" placeholder="Enter golongan darah" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="email">Tempat Lahir</label>
                        <input value="<?php echo $dd['templahir'];?>" name="templahir" placeholder="Enter tempat lahir" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="email">Tanggal Lahir</label>
                        <input value="<?php echo $dd['tgllahir'];?>" name="tgllahir" placeholder="Enter tanggal lahir" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="email">Alamat</label>
                        <input value="<?php echo $dd['alamat'];?>" name="alamat" placeholder="Enter alamat" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="email">No Telepon</label>
                        <input value="<?php echo $dd['notlpn'];?>" name="notlpn" placeholder="Enter no telepon" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="email">Asal Sekolah</label>
                        <input value="<?php echo $dd['asalsekolah'];?>" name="asalsekolah" placeholder="Enter asal sekolah" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="email">Alamat Orang Tua</label>
                        <input value="<?php echo $dd['alamatortu'];?>" name="alamatortu" placeholder="Enter alamat orang tua" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" type="submit" name="btnaddmhs">Save Data Mahasiswa</button>
                    </div>
                </form><!-- /form -->

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
