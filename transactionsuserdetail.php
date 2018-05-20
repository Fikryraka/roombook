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
                <h1>Detail Transactions</h1>
                <a href="transactionsuser.php" class="btn btn-primary">kembali</a>

                <?php
                //dapat transaksi
                $gettrasn = $db->query("SELECT t.*, m.*, r.*, m.nama as namapeminjam, r.nama as namaruang
                                FROM (transaksi t JOIN mahasiswa m ON t.idlogin = m.nim )
                                    JOIN ruangan r ON t.idruangan = r.idruangan
                                WHERE idtransaksi = '".$_GET['id']."'")
                    ->fetch_array();
                ?>
                <a href="javascript:;" id="selesaipinjam" class="btn btn-success">Selesai</a>
                <hr>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h3>Informasi Peminjam</h3>
                                <table class="table table-bordered">
                                    <tr>
                                        <td>NIM</td>
                                        <td>:</td>
                                        <td><?php echo $gettrasn['nim'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama</td>
                                        <td>:</td>
                                        <td><?php echo $gettrasn['namapeminjam'];?></td>
                                     </tr>
                                    <tr>
                                        <td>Telepon</td>
                                        <td>:</td>
                                        <td><?php echo $gettrasn['notlpn'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>:</td>
                                        <td><?php echo $gettrasn['alamat'];?></td>
                                    </tr>
                                </table>

                                <h3>Informasi Ruangan</h3>
                                <table class="table table-bordered">
                                    <tr>
                                        <td colspan="3">
                                            <img src="upload/images/<?php echo $gettrasn['foto'];?>" class="img-responsive" width="300px">
                                         </td>
                                    </tr>
                                    <tr>
                                        <td>Kode</td>
                                        <td>:</td>
                                        <td><?php echo $gettrasn['kode'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama</td>
                                        <td>:</td>
                                        <td><?php echo $gettrasn['namaruang'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>:</td>
                                        <td><?php echo ($gettrasn['status'] == 'A') ? '<div class="text-success">Ready</div>':'<div class="text-danger">Booking</div>';?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h3>Informasi Transaksi</h3>
                                <input type="hidden" id="kunciidtransaksi" value="<?php echo $_GET['id'];?>">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>Tanggal Transaksi</td>
                                        <td>:</td>
                                        <td><?php echo $gettrasn['tgltransaksi'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Peminjaman</td>
                                        <td>:</td>
                                        <td><?php echo $gettrasn['tglpinjam'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Kembali</td>
                                        <td>:</td>
                                        <td><?php echo $gettrasn['tglkembali'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Deskripsi Kegiatan</td>
                                        <td>:</td>
                                        <td><?php echo $gettrasn['kegiatan'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Surat Perijinan</td>
                                        <td>:</td>
                                        <td><img src="upload/lampiran/<?php echo $gettrasn['lampiran1'];?>" class="img-responsive" width="350px" /></td>
                                    </tr>
                                    <tr>
                                        <td>KTM</td>
                                        <td>:</td>
                                        <td><img src="upload/lampiran/<?php echo $gettrasn['lampiran2'];?>" class="img-responsive" width="350px" /></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!--modal -->
    <div class="modal fade" id="myModalSelesaiPinjam" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-body">
                <h2>Feedback Peminjaman</h2>
                <hr>
                <form role="form" action="transactionsuser.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="modalidtransaksi" value="<?php echo $_GET['id'];?>">
                    <div class="form-group">
                        <textarea required name="modalkritik" id="modalkritik" class="form-control" placeholder="berikan kritik anda..."></textarea>
                    </div>
                    <div class="form-group">
                        <textarea required name="modalsaran" id="modalsaran" class="form-control" placeholder="berikan saran anda..."></textarea>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Lampiran Foto Ruangan 1</label><br>
                        <input required type="file" name="modalfoto1" placeholder="Lampiran Foto Ruangan 1" />
                    </div>
                    <div class="form-group">
                        <label class="control-label">Lampiran Foto Ruangan 2</label><br>
                        <input required type="file" name="modalfoto2" alt="Lampiran Foto Ruangan 2" />
                    </div>
                    <hr>
                    <div class="form-group">
                        <input type="submit" id="modalbtnsubmit" name="modalbtnsubmit" class="btn btn-success" value="Submit">
                        <input type="button" name="modalbtncancel" class="btn btn-primary" data-dismiss="modal" value="Batal">
                    </div>
                </form>
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

    $("#selesaipinjam").click(function(e){
        e.preventDefault();

        $("#myModalSelesaiPinjam").modal("show");
    });
    </script>

</body>

</html>
