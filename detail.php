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
                <h1>Detail Ruangan</h1>
                <a href="dashboard.php" class="btn btn-secondary">Kembali</a>
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
                <div class="row">
                    <div class="col-sm-6">
                     <img src="upload/images/<?php echo $dd['foto'];?>" width="450px" class="img-responsive" />
                    </div>
                    <div class="col-sm-6">
                        <form class="form-vertical" method="post" action="roomsform.php" enctype="multipart/form-data">
                            <input type="hidden" name="idruangan" value="<?php echo $dd['idruangan'];?>">
                            <div class="form-group">
                                <label class="control-label" for="email">Kode Ruang</label>
                                <input value="<?php echo $dd['kode'];?>" name="kode" type="text" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="email">Nama Ruang</label>
                                <input value="<?php echo $dd['nama'];?>" name="nama" type="text" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="email">Status</label><br>
                                <?php
                                 if ($dd['status']== 'A') {
                                     echo "<input value='Available' class='form-control' readonly>";
                                 }else{
                                    echo "<input value='Booking' class='form-control' readonly>";
                                 }

                                 ?>
                                <?php  ?>
                            </div>
                        </form><!-- /form -->
                    </div>
                </div>
                <br>
                <div class="row">
                    <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th rowspan="2">No</th>
                                    <th rowspan="2" class="text-center">Peminjam</th>
                                    <th rowspan="2" class="text-center">Ruangan</th>
                                    <th colspan="3" class="text-center">Tanggal</th>
                                    <th rowspan="2" class="text-center">Status</th>
                                </tr>
                                <tr>
                                    <th class="text-center">Transaksi</th>
                                    <th class="text-center">Pinjam</th>
                                    <th class="text-center">Kembali</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $jml = $db->query("SELECT * FROM transaksi WHERE idruangan='".$_GET['id']."'")->fetch_array();
                                if(count($jml) > 0){
                                    $sql = $db->query("SELECT * FROM transaksi WHERE idruangan='".$_GET['id']."' ORDER BY idtransaksi DESC"); $n=0;
                                    while($dd = $sql->fetch_array()){ $n++;
                                        $nama = $db->query("SELECT * FROM mahasiswa WHERE nim='".$dd['idlogin']."'")->fetch_array(); 
                                        $nmruang = $db->query("SELECT * FROM ruangan WHERE idruangan = '".$dd['idruangan']."'")->fetch_array();

                                        if($dd['status'] == 'P')
                                            $st = "<a href='javascript:;' class='text-warning'>PENDING</a>";
                                        elseif($dd['status'] == 'B')
                                            $st = "<a href='javascript:;' class='text-success'>ACC</a>";
                                        elseif($dd['status'] == 'S')
                                            $st = "<a href='javascript:;' class='text-primary'>SELESAI</a>";
                                        else
                                            $st = "<a href='javascript:;' class='text-danger'>DITOLAK</a>";
                                        ?>
                                    <tr>
                                        <td><?php echo $n;?></td>
                                        <td><?php echo $nama['nama'];?></td>
                                        <td><?php echo $nmruang['kode'];?></td>
                                        <td><?php echo $dd['tgltransaksi'];?></td>
                                        <td><?php echo $dd['tglpinjam'];?></td>
                                        <td><?php echo $dd['tglkembali'];?></td>
                                        <td><?php echo $st;?></td>
                                    </tr>
                                    <?php }
                                }else{
                                    echo "<tr><td colspan='8' class='text-center'>nothing data found.</td></tr>";
                                } ?>
                            </tbody>
                        </table>
                </div>
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
