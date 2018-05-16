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
                <h1>Feedback Transactions</h1>
                <?php if($dptuser['jenis'] == 'P'){ ?>
                    <a href="transactions.php" class="btn btn-primary">kembali</a>
                <?php } else { ?>
                    <a href="transactionsuser.php" class="btn btn-primary">kembali</a>
                <?php } ?>
                <?php
                $gettrasn = $db->query("SELECT t.*, m.*, r.*, m.nama as namapeminjam, r.nama as namaruang 
                                FROM (transaksi t JOIN mahasiswa m ON t.idlogin = m.nrp ) 
                                    JOIN ruangan r ON t.idruangan = r.idruangan 
                                WHERE idtransaksi = '".$_GET['id']."'")
                    ->fetch_array();
                ?>
                <hr>

                <?php $getfeedback = $db->query("SELECT * FROM feedback WHERE idtransaksi = '".$_GET['id']."'")->fetch_array(); ?>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h3>Detail Feedback</h3>
                                <table class="table table-bordered">
                                    <tr>
                                        <td>Kritik</td>
                                        <td>:</td>
                                        <td><?php echo $getfeedback['kritik'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Saran</td>
                                        <td>:</td>
                                        <td><?php echo $getfeedback['saran'];?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h3>Kondisi Ruangan </h3>
                                <table class="table table-bordered">
                                    <tr>
                                        <td>Gambar 1</td>
                                        <td>:</td>
                                        <td><img src="upload/feedback/<?php echo $getfeedback['foto1'];?>" class="img-responsive" width="300px"></td>
                                    </tr>
                                    <tr>
                                        <td>Gambar 2</td>
                                        <td>:</td>
                                        <td><img src="upload/feedback/<?php echo $getfeedback['foto2'];?>" class="img-responsive" width="300px"></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h3>Informasi Peminjam</h3>
                                <table class="table table-bordered">
                                    <tr>
                                        <td>NRP</td>
                                        <td>:</td>
                                        <td><?php echo $gettrasn['nrp'];?></td>
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
                                        <td><?php echo $gettrasn['status'];?></td>
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
                                        <td>KTM</td>
                                        <td>:</td>
                                        <td><img src="upload/lampiran/<?php echo $gettrasn['lampiran1'];?>" class="img-responsive" width="350px" /></td>
                                    </tr>
                                    <tr>
                                        <td>Surat Perijinan</td>
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
    <div class="modal fade" id="myModalTransaksiTolak" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-body">
              <form role="form">
                <input type="hidden" id="idtransaksitolak" />
                <div class="form-group">
                  <textarea name="alasan" id="alasantransaksitolak" class="form-control" placeholder="berikan alasan ditolak..."></textarea>
                </div>
                <div class="form-group">
                  <input type="button" id="btnTolak" name="submit" class="btn btn-success" value="Submit">
                  <input type="button" name="submit" class="btn btn-primary" data-dismiss="modal" value="Batal">
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>

    <div class="modal fade" id="myModalTransaksiTerima" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-body">
              <form role="form">
                <h2>Acc Peminjaman ?</h2>
                <input type="hidden" id="idtransaksiterima" />
                <div class="form-group">
                  <input type="button" id="btnTerima" name="submit" class="btn btn-success" value="Ya">
                  <input type="button" name="submit" class="btn btn-primary" data-dismiss="modal" value="Batal">
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

    $("#terimatransaksi").click(function(e){
        e.preventDefault();
        var kunci = $("#kunciidtransaksi").val();
        $("#idtransaksiterima").val(kunci);
        $("#myModalTransaksiTerima").modal("show");

        $("#btnTerima").click(function(e){
            e.preventDefault();

            var idtrans = $("#idtransaksiterima").val();
            $.ajax({
                type: "POST",
                url: "library/ajaxtransaksi.php?aksi=terima",
                data: "idtransaksi="+idtrans,
                success: function(hasil){
                    if(hasil == 'SUKSES'){
                        location.href = 'transactions.php';
                    } else {
                        alert(hasil);
                    }
                }
            })
        })
    });

    $("#tolaktransaksi").click(function(e){
        e.preventDefault();
        var kunci = $("#kunciidtransaksi").val();
        $("#idtransaksitolak").val(kunci);
        $("#myModalTransaksiTolak").modal("show");

        $("#btnTolak").click(function(e){
            e.preventDefault();

            var idtrans = $("#idtransaksitolak").val();
            var alasan = $("#alasantransaksitolak").val();
            $.ajax({
                type: "POST",
                url: "library/ajaxtransaksi.php?aksi=tolak",
                data: "idtransaksi="+idtrans+"&alasan="+alasan,
                success: function(hasil){
                    if(hasil == 'SUKSES'){
                        location.href = 'transactions.php';
                    } else {
                        alert(hasil);
                    }
                }
            })
        })
    })
    </script>

</body>

</html>
