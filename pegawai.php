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
                <h1>Pegawai</h1>
                <a href="pegawaiform.php" class="btn btn-success">Add Pegawai</a>
                <hr>
                <?php
                if(isset($_GET['id'])){
                    $sql = $db->query("DELETE FROM pegawai WHERE idpegawai = '".$_GET['id']."'");
                    if($sql){
                        echo "<div class='alert alert-success'>Modify Succeded.</div>";
                    }else{
                        echo "<div class='alert alert-danger'>Modify Failed.</div>";
                    }
                }
                ?>

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>No. Telepon</th>
                            <th>Tempat Lahir</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $n=0;
                        $sql = $db->query("SELECT * FROM pegawai ORDER BY idpegawai DESC");
                        while($dd = $sql->fetch_array()){ $n++;
                            ?>
                            <tr>
                                <td><?php echo $n;?></td>
                                <td><?php echo $dd['nip'];?></td>
                                <td><?php echo $dd['nama'];?></td>
                                <td><?php echo $dd['notlpn'];?></td>
                                <td><?php echo $dd['templahir'];?></td>
                                <td>
                                    <a href="pegawaiform.php?id=<?php echo $dd['idpegawai'];?>" class="btn btn-primary">edit</a>
                                    <a href="pegawai.php?id=<?php echo $dd['idpegawai'];?>" class="btn btn-danger">hapus</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
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
