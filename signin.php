<?php 
session_start();
if(!empty($_SESSION['iduser'])) header('location: home.php'); 
require("library/koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Login Multiuser</title>
  <!-- Bootstrap core CSS-->
  <link href="desain/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="desain/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="desain/css/sb-admin.css" rel="stylesheet">
</head>

<body>
    <!--
    you can substitue the span of reauth email for a input with the email and
    include the remember me checkbox
    -->
    <br><br>
    <body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <?php
            if(isset($_POST['submitsignin'])){
                $getNrp = $_POST['nrp'];
                $getPas = $_POST['pass'];

                $cekmhs = $db->query("SELECT * FROM mahasiswa WHERE nrp = '".$getNrp."'")->num_rows;
                if($cekmhs == 1){
                    //query jika mahasiswa yg login
                    $query = $db->query("SELECT l.* FROM login l JOIN mahasiswa m ON l.iduser = m.idmhs 
                    WHERE m.nrp = '".$getNrp."' AND l.password = '".$getPas."' AND l.jenis = 'M'");
                }else{
                    //query jika pegawai yg login
                    $query = $db->query("SELECT l.* FROM login l JOIN pegawai m ON l.iduser = m.idpegawai 
                    WHERE m.nip = '".$getNrp."' AND l.password = '".$getPas."' AND l.jenis = 'P'");
                }

                $getMhs = $query->fetch_array();
                if($query->num_rows == 1){
                    //session user dimulai
                    session_start();
                    $_SESSION['iduser'] = $getMhs['idlogin'];
                    header('location: dashboard.php');
                } else {
                    echo "<p class='text-center'>Invalid Username or Password.</p>";
                }
            }
            ?>
       <form class="form-signin" method="post" action="signin.php">
                <span id="reauth-email" class="reauth-email"></span>
                <label for="exampleInputEmail1">UserID</label>
                    <input name="nrp" type="text" id="inputEmail" class="form-control" placeholder="UserID" required autofocus>
                <label for="exampleInputPassword1">Password</label>
                    <input name="pass" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button name="submitsignin" class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="register.html"> </a>
          <a class="d-block small" href="forgot-password.html"> </a>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="desain/vendor/jquery/jquery.min.js"></script>
  <script src="desain/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="desain/vendor/jquery-easing/jquery.easing.min.js"></script>
</body>
</html>
