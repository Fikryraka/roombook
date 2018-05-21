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

    <title>Aplikasi Pinjam Ruang</title>
    <link rel="icon" type="text/css" href="upload/images/room.png">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">

        <?php include("layout/menu.php");?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <h1 class="text-center" >Welcome to Aplikasi Peminjaman Ruangan</h1>
                <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Toggle Menu</a>
                <br><br><br>
                <?php
                $lantai2 = $db->query("SELECT * FROM ruangan WHERE kode like '%.60%' ORDER BY kode DESC");
                $lantai1 = $db->query("SELECT * FROM ruangan WHERE kode like '%.50%' ORDER BY kode DESC");
                ?>
                <table class="table table-bordered">
                    <tr>
                        <?php while ($dd = $lantai2->fetch_array()) { 
                            if($dd['status'] == 'A') $st = "<p class='text-success'>Available</p>"; else $st = "<p class='text-danger'>Booking</p>";
                            ?>
                            <td align="center">
                                <img src="upload/images/<?php echo $dd['foto'];?>" width="200px" class="img-responsive" /><br>
                                <?php echo $dd['kode'];?><br><?php echo $dd['nama'];?><br>
                                <?php echo $st;?>
                            </td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <?php while ($dd = $lantai1->fetch_array()) { 
                            if($dd['status'] == 'A') $st = "<p class='text-success'>Available</p>"; else $st = "<p class='text-danger'>Booking</p>";
                            ?>
                            <td align="center">
                                <img src="upload/images/<?php echo $dd['foto'];?>" width="200px" class="img-responsive" /><br>
                                <?php echo $dd['kode'];?><br><?php echo $dd['nama'];?><br>
                                <?php echo $st;?>
                            </td>
                        <?php } ?>
                    </tr>
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
