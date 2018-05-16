<?php 
session_start();
if(!empty($_SESSION['iduser'])) header('location: home.php'); 
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
    <link href="css/login.css" rel="stylesheet">

</head>

<body>
    <!--
    you can substitue the span of reauth email for a input with the email and
    include the remember me checkbox
    -->
    <br><br>
    <div class="container">
        <div class="card card-container">
            <img class="profile-img-card" src="upload/images/room.png" alt="" />
            <p id="profile-name" class="profile-name-card">Aplikasi Peminjaman Ruang</p>

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
                    header('location: home.php');
                } else {
                    echo "<p class='text-center'>Invalid Username or Password.</p>";
                }
            }
            ?>
            
            <form class="form-signin" method="post" action="signin.php">
                <span id="reauth-email" class="reauth-email"></span>
                <input name="nrp" type="text" id="inputEmail" class="form-control" placeholder="NRP / NIP ..." required autofocus>
                <input name="pass" type="password" id="inputPassword" class="form-control" placeholder="Password..." required>
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button name="submitsignin" class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
            </form><!-- /form -->
            <a href="signupnrp.php" class="forgot-password">Sign up</a>
        </div><!-- /card-container -->
    </div><!-- /container -->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
