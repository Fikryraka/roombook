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
                <h1>Mahasiswa</h1>
                <a href="mahasiswaform.php" class="btn btn-success">Add Mahasiswa</a>
                <hr>

                 <?php
                 //UNTUK DELETE
                    if(isset($_GET['id'])){
                        $get = $db->query("SELECT * FROM mahasiswa WHERE idmhs = '".$_GET['id']."'")->fetch_array();

                        $sql = $db->query("DELETE FROM mahasiswa WHERE idmhs = '".$_GET['id']."'");
                        if($sql){
                            echo "<div class='alert alert-success'>Modify Succeded.</div>";
                        }else{
                            echo "<div class='alert alert-danger'>Modify Failed.</div>";
                        }
                    }
                ?>
            
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nrp</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No Telepon</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                       <?php
                       //UNTUK READ
                        $jml = $db->query("SELECT * FROM mahasiswa")->fetch_array();
                        if(count($jml) > 0){

                            $sql = $db->query("SELECT * FROM mahasiswa ORDER BY idmhs DESC");
                            $n=0;
                            while($mahasiswa = $sql->fetch_array()){ $n++;
                                echo "<tr>";

                                echo "<td>".$n."</td>";
                                echo "<td>".$mahasiswa['nrp']."</td>";
                                echo "<td>".$mahasiswa['nama']."</td>";
                                echo "<td>".$mahasiswa['alamat']."</td>";
                                echo "<td>".$mahasiswa['notlpn']."</td>";

                                echo "<td>";
                                echo "<a href='mahasiswaform.php?id=".$mahasiswa['idmhs']."' class='btn btn-primary'>edit</a> ";
                                echo "<a href='mahasiswa.php?id=".$mahasiswa['idmhs']."' class='btn btn-danger'>Hapus</a>";
                                echo "</td>";

                                echo "</tr>";
                            }

                        }else{
                            echo "<tr><td colspan='6' class='text-center'>nothing data found.</td></tr>";
                        }
                        ?>
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
