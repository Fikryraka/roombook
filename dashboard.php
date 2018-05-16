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
    <!-- <link href="vendor/datepicker/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper" class="toggled">

        <?php include("layout/menu.php");?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            
            <?php
                $sql = $db->query("SELECT * FROM ruangan");
                while ($dd = $sql->fetch_array()) { ?>
                    <div class="columns">
                      <ul class="price">

                        <?php 
                        if($dd['status'] == 'A'){ 
                            $dd1 = "available"; $st = "Available"; 
                        }else { 
                            $dd1 = "booking"; $st = "Booking";
                        }?>
                        <li class="<?php echo $dd1;?>"><?php echo $dd['kode'];?></li>
                        <li class="grey">
                            <img src="upload/images/<?php echo $dd['foto'];?>" width="300px" class="img-responsive" />
                        </li>
                        <li><?php echo $dd['nama'];?></li>
                        <li><?php echo $st;?></li>
                        <li class="grey">
                            <a href="detail.php?id=<?php echo $dd['idruangan'];?> " class="btn btn-primary">Detail</a>
                            <a href="transactionsform.php?id=<?php echo $dd['idruangan'];?>" class="btn btn-success">Pinjam</a>
                        </li>
                      </ul>
                    </div>
            <?php } ?>

        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 style="color:red;"><span class="glyphicon glyphicon-lock"></span> Login</h4>
        </div>
        <div class="modal-body">
          <form role="form">
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
              <input type="text" class="form-control" id="usrname" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="text" class="form-control" id="psw" placeholder="Enter password">
            </div>
            <div class="checkbox">
              <label><input type="checkbox" value="" checked>Remember me</label>
            </div>
            <button type="submit" class="btn btn-default btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
          </form>
        </div>
        <div class="modal-footer">
          <p>Not a member? <a href="#">Sign Up</a></p>
        </div>
      </div>
    </div>
  </div>

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

	$("#modal").click(function(e){
		e.preventDefault();
		$("#myModal").modal("show");
	});
    </script>

</body>

</html>