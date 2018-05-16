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
                <h1>Transactions</h1>
                <a href="transactionsform.php" class="btn btn-primary">Add Transaction</a>

                <a style="color: white" href="transactions.php?status=P" class="btn btn-warning">Pending</a>
                <a href="transactions.php?status=B" class="btn btn-success">Acc</a>
                <a href="transactions.php?status=S" class="btn btn-info">Selesai</a>
                <a href="transactions.php?status=T" class="btn btn-danger">Tolak</a>

                <hr>

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th rowspan="2">No</th>
                            <th rowspan="2" class="text-center">Peminjam</th>
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
                        if($_GET['status'] == 'B'){
                            $jml = $db->query("SELECT * FROM transaksi WHERE status = 'B'")->fetch_array();
                            $sql = $db->query("SELECT * FROM transaksi WHERE status = 'B' ORDER BY idtransaksi DESC"); 
                        } elseif ($_GET['status'] == 'S') {
                            $jml = $db->query("SELECT * FROM transaksi WHERE status = 'S'")->fetch_array();
                            $sql = $db->query("SELECT * FROM transaksi WHERE status = 'S' ORDER BY idtransaksi DESC"); 
                        } elseif ($_GET['status'] == 'T') {
                            $jml = $db->query("SELECT * FROM transaksi WHERE status = 'T'")->fetch_array();
                            $sql = $db->query("SELECT * FROM transaksi WHERE status = 'T' ORDER BY idtransaksi DESC"); 
                        }elseif ($_GET['status'] == 'P') {
                            $jml = $db->query("SELECT * FROM transaksi WHERE status = 'P'")->fetch_array();
                            $sql = $db->query("SELECT * FROM transaksi WHERE status = 'P' ORDER BY idtransaksi DESC"); 
                        } else {
                            $jml = $db->query("SELECT * FROM transaksi WHERE status = 'P'")->fetch_array();
                            $sql = $db->query("SELECT * FROM transaksi WHERE status = 'P' ORDER BY idtransaksi DESC"); 
                        }
                        if(count($jml) > 0){
                            $n=0;
                            while($dd = $sql->fetch_array()){ $n++; 
                                $nmruang = $db->query("SELECT * FROM ruangan WHERE idruangan = '".$dd['idruangan']."'")->fetch_array();
                                if($dd['status'] == 'P') 
                                    $st = "<a href='javascript:;' class='text-warning pendingnya'>PENDING</a>";
                                elseif($dd['status'] == 'B') 
                                    $st = "<a href='transactionsdetail.php?id=".$dd['idtransaksi']."' class='text-success'>ACC</a>";
                                elseif($dd['status'] == 'S') 
                                    $st = "<a href='transactionsfeedback.php?id=".$dd['idtransaksi']."' class='text-primary'>SELESAI</a>";
                                else 
                                    $st = "<a href='transactionsdetail.php?id=".$dd['idtransaksi']."' class='text-danger'>DITOLAK</a>";
                                ?>
                            <tr>
                                <td><?php echo $n;?></td>
                                <td>
                                    <?php echo $dd['idlogin'];?> <br>
                                    <?php if($dd['status'] == 'P'){ ?>
                                        <a href="transactionsdetail.php?id=<?php echo $dd['idtransaksi'];?>" class="btn btn-primary">proses</a>
                                    <?php } ?>
                                </td>
                                <td><?php echo $nmruang['kode'];?></td>
                                <td><?php echo $dd['tgltransaksi'];?></td>
                                <td><?php echo $dd['tglpinjam'];?></td>
                                <td><?php echo $dd['tglkembali'];?></td>
                                <td><?php echo $st;?></td>
                            </tr>
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

    <div class="modal fade" id="myModalPendingKonfirmasi" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-body">
              <form role="form">
                <h2>Konfirmasi</h2>
                <hr>
                <p>
                    Silahkan proses peminjaman ini dengan klik tombol proses.
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

    $(".pendingnya").click(function(){
        $("#myModalPendingKonfirmasi").modal('show');
    })
    </script>

</body>

</html>
