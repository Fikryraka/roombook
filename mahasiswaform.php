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
    <meta name="author" content="Fikry Raka">

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
                            alamatortu='".$_POST['alamatortu']."',
                            jalur='".$_POST['jalur']."' WHERE idmhs = '".$_POST['idmhs']."'");
                    }else{
                        $sql = $db->query("INSERT INTO mahasiswa VALUES ('','".$_POST['nim']."','".$_POST['nama']."','".$_POST['goldar']."','".$_POST['tgllahir']."','".$_POST['templahir']."','".$_POST['alamat']."','".$_POST['notlpn']."','".$_POST['asalsekolah']."','".$_POST['alamatortu']."','".$_POST['jalur']."')");
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
                        <label class="control-label" >NIM</label>
                        <input required value="<?php echo $dd['nim'];?>" name="nim" placeholder="Enter nim" type="number" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="control-label" >Nama</label>
                        <input required value="<?php echo $dd['nama'];?>" name="nama" placeholder="Enter nama" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="control-label" >Golongan Darah</label>
                        <input required value="<?php echo $dd['goldar'];?>" name="goldar" placeholder="Enter golongan darah" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="control-label" >Tempat Lahir</label>
                        <input required value="<?php echo $dd['templahir'];?>" name="templahir" placeholder="Enter tempat lahir" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="control-label" >Tanggal Lahir</label>
                        <input required value="<?php echo $dd['tgllahir'];?>" name="tgllahir" placeholder="Enter tanggal lahir" type="date" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="control-label" >Alamat</label>
                        <input required value="<?php echo $dd['alamat'];?>" name="alamat" placeholder="Enter alamat" type="text" class="form-control">
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
