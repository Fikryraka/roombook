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
                <h1>Form Add Pegawai</h1>
                <a href="pegawai.php" class="btn btn-secondary">Kembali</a>
                <hr>

                <?php
                //get data from ruangan
                if(isset($_GET['id'])){
                    $idruang = $_GET['id'];
                    $dd = $db->query("SELECT * FROM pegawai WHERE idpegawai = '".$idruang."'")->fetch_array();
                } else {
                    $dd = [
                        'idpegawai'=>'','nip'=>'','nama'=>'','tgllahir'=>'',
                        'templahir'=>'','alamat'=>'','notlpn'=>'','status'=>''
                    ];
                }
                //end get

                //process submit
                if(isset($_POST['btnaddpegawai'])){
                    //cek idpegawai jika ada lakukan update else lakukan insert
                    if($_POST['idpegawai'] != ''){
                        //query update
                        $sql = $db->query("UPDATE pegawai SET nip='".$_POST['nip']."', nama='".$_POST['nama']."', tgllahir='".$_POST['tgllahir']."', templahir='".$_POST['templahir']."', alamat='".$_POST['alamat']."', notlpn='".$_POST['notlpn']."', status='".$_POST['status']."' WHERE idpegawai = '".$_POST['idpegawai']."'");
                    }else{
                        //query insert
                        $sql = $db->query("INSERT INTO pegawai VALUES ('','".$_POST['nip']."','".$_POST['nama']."','".$_POST['tgllahir']."','".$_POST['templahir']."', '".$_POST['alamat']."', '".$_POST['notlpn']."', '".$_POST['status']."')");
                    }

                    //cek jika berhasil
                    if($sql){
                        echo "<div class='alert alert-success'>Modify Succeded.</div>";
                    }else{
                        echo "<div class='alert alert-danger'>Modify Failed.</div>";
                    }
                }
                //end proses
                ?>

                <form class="form-vertical" method="post" action="pegawaiform.php" enctype="multipart/form-data">
                    <input type="hidden" name="idpegawai" value="<?php echo $dd['idpegawai'];?>">
                    <div class="form-group">
                        <label class="control-label" >NIK Pegawai</label>
                        <input required value="<?php echo $dd['nip'];?>" name="nip" placeholder="nik pegawai..." type="number" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="control-label" >Nama Pegawai</label>
                        <input required value="<?php echo $dd['nama'];?>" name="nama" placeholder="nama pegawai..." type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="control-label" >Jabatan Pegawai</label>
                        <select name="status" class="form-control">
                            <option value="satpam">Satpam</option>
                            <option value="bap">BAP</option>
                            <option value="kaprodi">Kaprodi</option>
                            <option value="bagumum">Bagian Umum</option>
                            <option value="admin">ADMINISTRATOR</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label" >Tempat Lahir</label>
                        <input required value="<?php echo $dd['templahir'];?>" name="templahir" placeholder="tempat lahir..." type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="control-label" >Tanggal Lahir</label>
                        <input required value="<?php echo $dd['tgllahir'];?>" name="tgllahir" placeholder="tanggal lahir..." type="date" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="control-label" >No. Telepon</label>
                        <input required value="<?php echo $dd['notlpn'];?>" name="notlpn" placeholder="nomor telepon..." type="number" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="control-label" >Alamat Lengkap</label>
                        <textarea required class="form-control" name="alamat" placeholder="alamat lengkap..."><?php echo $dd['alamat'];?></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" type="submit" name="btnaddpegawai">Save Pegawai</button>
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
