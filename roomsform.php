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
                <h1>Form Add Rooms</h1>
                <a href="rooms.php" class="btn btn-secondary">Kembali</a>
                <hr>

                <?php
                //get data from ruangan
                if(isset($_GET['id'])){
                    $idruang = $_GET['id'];
                    $dd = $db->query("SELECT * FROM ruangan WHERE idruangan = '".$idruang."'")->fetch_array();
                } else {
                    $dd = ['idruangan'=>'','kode'=>'','foto'=>'','nama'=>'','status'=>''];
                } 
                //end get

                //process submit
                if(isset($_POST['btnaddrooms'])){
                    //cek idruangan jika ada lakukan update else lakukan insert
                    if($_POST['idruangan'] != ''){
                        if($_FILES['foto']['name'] == ''){
                            //foto kosong tidak perlu update foto
                            $sql = $db->query("UPDATE ruangan SET kode='".$_POST['kode']."', nama='".$_POST['nama']."', status='".$_POST['status']."' WHERE idruangan = '".$_POST['idruangan']."'");
                        } else {
                            //update foto
                            $sql = $db->query("UPDATE ruangan SET kode='".$_POST['kode']."', nama='".$_POST['nama']."', status='".$_POST['status']."', foto='".$_FILES['foto']['name']."' WHERE idruangan = '".$_POST['idruangan']."'");
                            move_uploaded_file($_FILES['foto']['tmp_name'], "upload/images/".$_FILES['foto']['name']);
                        }
                    }else{
                        $sql = $db->query("INSERT INTO ruangan VALUES ('','".$_POST['kode']."','".$_FILES['foto']['name']."','".$_POST['nama']."','".$_POST['status']."')"); 
                        move_uploaded_file($_FILES['foto']['tmp_name'], "upload/images/".$_FILES['foto']['name']);
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

                <form class="form-vertical" method="post" action="roomsform.php" enctype="multipart/form-data">
                    <input type="hidden" name="idruangan" value="<?php echo $dd['idruangan'];?>">
                    <div class="form-group">
                        <label class="control-label" for="email">Kode Ruang</label>
                        <input value="<?php echo $dd['kode'];?>" name="kode" placeholder="kode ruang..." type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="email">Nama Ruang</label>
                        <input value="<?php echo $dd['nama'];?>" name="nama" placeholder="nama ruang..." type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="email">Status</label><br>
                        <label><input <?php echo ($dd['status'] == 'A') ? "checked":"";?> name="status" value="A" type="radio" class=""> &nbsp;Available</label><br>
                        <label><input <?php echo ($dd['status'] == 'B') ? "checked":"";?> name="status" value="B" type="radio" class=""> &nbsp;Booking</label>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Foto Ruangan</label>
                        <input type="file" name="foto" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" type="submit" name="btnaddrooms">Save Room</button>
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
