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
                <h1>My Transactions</h1>
                <a style="color: white" href="transactionsuser.php?status=P" class="btn btn-warning">Pending</a>
                <a href="transactionsuser.php?status=B" class="btn btn-success">Acc</a>
                <a href="transactionsuser.php?status=S" class="btn btn-info">Selesai</a>
                <a href="transactionsuser.php?status=T" class="btn btn-danger">Tolak</a>

                <hr>
                <?php
                //aksi untuk feedback
                if(isset($_POST['modalbtnsubmit'])){
                    $idtransaksi    = $_POST['modalidtransaksi'];
                    $kritik         = $_POST['modalkritik'];
                    $saran          = $_POST['modalsaran'];

                    //file foto
                    $renfoto1       = "F1".date("YmdHis")."-".$_FILES['modalfoto1']['name'];
                    $renfoto2       = "F2".date("YmdHis")."-".$_FILES['modalfoto2']['name'];

                    $sql = $db->query("INSERT INTO feedback VALUES ('','".$idtransaksi."','".$renfoto1."','".$renfoto2."','".$kritik."','".$saran."')");

                    move_uploaded_file($_FILES['modalfoto1']['tmp_name'], "upload/feedback/".$renfoto1);
                    move_uploaded_file($_FILES['modalfoto2']['tmp_name'], "upload/feedback/".$renfoto2);

                    //update tabel ruangan jadi aktif
                    $gettransaksi = $db->query("SELECT idruangan FROM transaksi WHERE idtransaksi = '".$idtransaksi."'")->fetch_array();
                    $sql2 = $db->query("UPDATE ruangan SET status = 'A' WHERE idruangan = '".$gettransaksi['idruangan']."'");

                    //update transaksi jadi selesai
                    $sql3 = $db->query("UPDATE transaksi SET status = 'S' WHERE idtransaksi = '".$idtransaksi."'");

                    if($sql && $sql2 && $sql3)
                        echo '<div class="alert alert-success">
                                  <strong>Success!</strong> Terimakasih sudah memerikan feedback.
                                </div>';
                    else
                        echo '<div class="alert alert-danger">
                                  <strong>Failed!</strong> Terjadi kesalahan saat proses data.
                                </div>';
                }
                ?>

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th rowspan="2">No</th>
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
                        $getnim = $db->query("SELECT m.nim FROM login l JOIN mahasiswa m ON l.iduser = m.idmhs WHERE l.idlogin = '".$_SESSION['iduser']."'")->fetch_array();

                        if($_GET['status'] == 'P') {
                            $jml = $db->query("SELECT * FROM transaksi WHERE status = 'P' AND idlogin = '".$getnim['nim']."'")->fetch_array();
                            $sql = $db->query("SELECT * FROM transaksi WHERE status = 'P' AND idlogin = '".$getnim['nim']."' ORDER BY idtransaksi DESC");
                        } elseif ($_GET['status'] == 'B') {
                            $jml = $db->query("SELECT * FROM transaksi WHERE status = 'B' AND idlogin = '".$getnim['nim']."'")->fetch_array();
                            $sql = $db->query("SELECT * FROM transaksi WHERE status = 'B' AND idlogin = '".$getnim['nim']."' ORDER BY idtransaksi DESC");
                        } elseif ($_GET['status'] == 'S') {
                            $jml = $db->query("SELECT * FROM transaksi WHERE status = 'S' AND idlogin = '".$getnim['nim']."'")->fetch_array();
                            $sql = $db->query("SELECT * FROM transaksi WHERE status = 'S' AND idlogin = '".$getnim['nim']."' ORDER BY idtransaksi DESC");
                        } elseif ($_GET['status'] == 'T') {
                            $jml = $db->query("SELECT * FROM transaksi WHERE status = 'T' AND idlogin = '".$getnim['nim']."'")->fetch_array();
                            $sql = $db->query("SELECT * FROM transaksi WHERE status = 'T' AND idlogin = '".$getnim['nim']."' ORDER BY idtransaksi DESC");
                        } else {
                            $jml = $db->query("SELECT * FROM transaksi WHERE status = 'B' AND idlogin = '".$getnim['nim']."'")->fetch_array();
                            $sql = $db->query("SELECT * FROM transaksi WHERE status = 'B' AND idlogin = '".$getnim['nim']."' ORDER BY idtransaksi DESC");
                        }


                        if(count($jml) > 0){
                            $n=0;
                            while($dd = $sql->fetch_array()){ $n++;
                                $nmruang = $db->query("SELECT * FROM ruangan WHERE idruangan = '".$dd['idruangan']."'")->fetch_array();

                                if($dd['status'] == 'P')
                                    $st = "<a href='javascript:;' class='text-warning modalpending'>PENDING</a>";
                                elseif($dd['status'] == 'B')
                                    $st = "<a href='transactionsuserdetail.php?id=".$dd['idtransaksi']."' class='text-success'>ACC</a>";
                                elseif($dd['status'] == 'S')
                                    $st = "<a href='transactionsfeedback.php?id=".$dd['idtransaksi']."' class='text-primary'>SELESAI</a>";
                                else
                                    $st = "<a href='#myModalAlasanTolak".$n."' id='alasantolak' data-toggle='modal'  class='text-danger'>DITOLAK</a>";
                                ?>
                            <tr>
                                <td><?php echo $n;?></td>
                                <td><?php echo $nmruang['kode'];?></td>
                                <td><?php echo $dd['tgltransaksi'];?></td>
                                <td><?php echo $dd['tglpinjam'];?></td>
                                <td><?php echo $dd['tglkembali'];?></td>
                                <td><?php echo $st;?></td>
                            </tr>
                            <div class="modal fade" id="myModalAlasanTolak<?php echo $n;?>" role="dialog">
                                <div class="modal-dialog">
                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-body">
                                      <form role="form">
                                        <h2>Alasan Ditolak</h2>
                                        <hr>

                                            <p><?php echo $dd['keterangan'];?></p>

                                        <hr>
                                        <input type="button" name="submit" class="btn btn-primary" data-dismiss="modal" value="Okay">
                                      </form>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            <?php }
                        }else{
                            echo "<tr><td colspan='8' class='text-center'>nothing data found.</td></tr>";
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
    <div class="modal fade" id="myModalPending" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-body">
              <form role="form">
                <h2>Pending Transaksi</h2>
                <hr>
                <p>
                    Tunggu pihak Manajemen memverifikasi transaksi anda.
                </p>
              </form>
            </div>
            <div class="modal-footer">
                  <input type="button" name="submit" class="btn btn-primary" data-dismiss="modal" value="Mengerti">
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

    $(".modalpending").click(function(){
        $("#myModalPending").modal('show');
    });
    </script>

</body>

</html>
