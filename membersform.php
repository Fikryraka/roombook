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
                <h1>Form Add Members</h1>
                <a href="members.php" class="btn btn-secondary">Kembali</a>
                <hr>

                <?php
                //get data from ruangan
                if(isset($_GET['id'])){
                    $idruang = $_GET['id'];
                    $dd = $db->query("SELECT * FROM login WHERE idlogin = '".$idruang."'")->fetch_array();
                } else {
                    $dd = [
                        'idlogin'=>'','iduser'=>'','jenis'=>'','password'=>''
                    ];
                } 
                //end get

                //process submit
                if(isset($_POST['btnaddmembers'])){
                    //cek idpegawai jika ada lakukan update else lakukan insert
                    if($_POST['idlogin'] != ''){
                        //query update
                        $sql = $db->query("UPDATE login SET iduser='".$_POST['iduser']."', jenis='".$_POST['jenis']."', password='".$_POST['password']."' WHERE idlogin='".$_POST['idlogin']."'");
                    }else{
                        //query insert
                        $sql = $db->query("INSERT INTO login VALUES ('','".$_POST['iduser']."','".$_POST['jenis']."','".$_POST['password']."')"); 
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

                <form class="form-vertical" method="post" action="" enctype="multipart/form-data">
                    <input type="hidden" name="idlogin" value="<?php echo $dd['idlogin'];?>">
                    
                    <div class="form-group">
                        <label class="control-label" for="email">Jenis</label><br>
                        <label><input <?php echo (isset($_GET['id'])) ? "readonly":"";?> <?php echo ($dd['jenis'] == 'P') ? "checked":"";?> value="P" name="jenis" type="radio" > &nbsp;Pegawai</label><br>
                        <label><input <?php echo (isset($_GET['id'])) ? "readonly":"";?> <?php echo ($dd['jenis'] == 'M') ? "checked":"";?> value="M" name="jenis" type="radio" > &nbsp;Mahasiswa</label>
                    </div>

                    <?php 
                    if(isset($_GET['id'])) {
                        $jenisnya = $db->query("SELECT * FROM login WHERE idlogin = '".$_GET['id']."'")->fetch_array();

                        // kondisi jika update jenis pegawai
                        if ($dd['jenis'] == 'P') { ?>
                            <div class="form-group">
                                <label class="control-label" for="email">ID User</label>
                                <select class="form-control" name="iduser">
                                    <option value="">-pilih-</option>
                                    <?php
                                    $cari = $db->query("SELECT * FROM pegawai");
                                    while($dd1 = $cari->fetch_array()){ ?>
                                        <option <?php echo ($dd1['idpegawai'] == $dd['iduser']) ? "selected":"";?> value="<?php echo $dd1['idpegawai'];?>"><?php echo $dd1['nip']." - ".$dd1['nama'];?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        <?php 
                        // kondisi jika update jenis mahasiswa
                        } else { ?>
                            <div class="form-group">
                                <label class="control-label" for="email">ID User</label>
                                <select class="form-control" name="iduser">
                                    <option value="">-pilih-</option>
                                    <?php
                                    $cari = $db->query("SELECT * FROM mahasiswa");
                                    while($dd1 = $cari->fetch_array()){ ?>
                                        <option <?php echo ($dd1['idmhs'] == $dd['iduser']) ? "selected":"";?> value="<?php echo $dd1['idmhs'];?>"><?php echo $dd1['nrp']." - ".$dd1['nama'];?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        <?php }
                    }
                    
                    //kondisi jika insert
                    else { ?>
                        <div class="form-group" id="choosePegawai">
                            <label class="control-label" for="email">ID User</label>
                            <select class="form-control" name="iduser">
                                <option value="">-pilih-</option>
                                <?php
                                $cari = $db->query("SELECT * FROM pegawai");
                                while($dd1 = $cari->fetch_array()){ ?>
                                    <option value="<?php echo $dd1['idpegawai'];?>"><?php echo $dd1['nip']." - ".$dd1['nama'];?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group" id="chooseMahasiswa">
                            <label class="control-label" for="email">ID User</label>
                            <select class="form-control" name="iduser">
                                <option value="">-pilih-</option>
                                <?php
                                $cari = $db->query("SELECT * FROM mahasiswa");
                                while($dd1 = $cari->fetch_array()){ ?>
                                    <option value="<?php echo $dd1['idmhs'];?>"><?php echo $dd1['nrp']." - ".$dd1['nama'];?></option>
                                <?php } ?>
                            </select>
                        </div>
                    <?php } ?>
                    
                    <div class="form-group">
                        <label class="control-label" for="email">Password</label>
                        <input value="<?php echo $dd['password'];?>" name="password" placeholder="password ..." type="text" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <button class="btn btn-success" type="submit" name="btnaddmembers">Save Members</button>
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
        $("#choosePegawai").hide();
        $("#chooseMahasiswa").hide();

        $("input[name=jenis]").change(function(e){
            e.preventDefault();

            if($(this).val() == 'P'){
                $("#choosePegawai").show();
                $("#chooseMahasiswa").hide();
            }

            if($(this).val() == 'M'){
                $("#choosePegawai").hide();
                $("#chooseMahasiswa").show();
            }
        });

        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>

</body>

</html>
