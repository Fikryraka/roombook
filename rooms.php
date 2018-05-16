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
                <h1>Rooms</h1>
                <a href="roomsform.php" class="btn btn-success">Add Room</a>
                <hr>
                <?php
                if(isset($_GET['id'])){
                    $get = $db->query("SELECT * FROM ruangan WHERE idruangan = '".$_GET['id']."'")->fetch_array();
                    //hapus file foto
                    unlink("upload/images/".$get['foto']);

                    $sql = $db->query("DELETE FROM ruangan WHERE idruangan = '".$_GET['id']."'");
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
                        <th>Foto</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Status</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $jml = $db->query("SELECT * FROM ruangan")->fetch_array();
                        if(count($jml) > 0){

                            $sql = $db->query("SELECT * FROM ruangan ORDER BY idruangan DESC");
                            $n=0;
                            while($ruang = $sql->fetch_array()){ $n++;
                                echo "<tr>";

                                echo "<td>".$n."</td>";
                                echo "<td><img src='upload/images/".$ruang['foto']."' class='img-responsive' width='200px' /></td>";
                                echo "<td>".$ruang['kode']."</td>";
                                echo "<td>".$ruang['nama']."</td>";
                                echo "<td>".(($ruang['status'] == 'A') ? "Available":"Booking")."</td>";

                                echo "<td>";
                                echo "<a href='roomsform.php?id=".$ruang['idruangan']."' class='btn btn-primary'>edit</a> ";
                                echo "<a href='rooms.php?id=".$ruang['idruangan']."' class='btn btn-danger'>Hapus</a>";
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
