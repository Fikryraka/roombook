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
            <?php
            if(isset($_POST)){
                $data = $_POST['nrp'];
                exec("sed -i '1s/.*/var datanya = \"cari=$data\";/g' crawel.js");
                exec("phantomjs crawel.js", $output);
                $pecah = explode(',', $output[0]);

                if($pecah[0] != "NOT_FOUND"){ ?>

                    <p id="profile-name" class="profile-name-card">Aplikasi Peminjaman Ruang</p>
                    <form class="form-signin" method="post" action="signupproces.php">
                        <span id="reauth-email" class="reauth-email"></span>
                        <input type="text" id="inputEmail" name="nrp" value="<?php echo $pecah[0];?>" class="form-control" placeholder="NRP mahasiswa..." required readonly>
                        <input type="text" id="inputEmail" name="nama" value="<?php echo $pecah[1];?>" class="form-control" placeholder="Nama mahasiswa..." required readonly>
                        <input type="password" name="password" id="inputEmail" class="form-control" placeholder="Password..." required autofocus>
                        <button name="singup" class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign up</button>
                    </form><!-- /form -->

                <?php } else { ?>

                    <p id="profile-name" class="profile-name-card">Anda Bukan Mahasiwa UPJ !!!</p>

                <?php } ?>

            <a href="signin.php" class="forgot-password">Sign in</a>

            <?php } ?>

        </div><!-- /card-container -->
    </div><!-- /container -->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
