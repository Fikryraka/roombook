<?php
session_start();
if(empty($_SESSION['iduser'])) header('location: signin.php');
require("library/koneksi.php");
$sql = $db->query("SELECT * FROM login WHERE idlogin = '".$_SESSION['iduser']."'")->fetch_array();
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

    <!-- <link href="vendor/datepicker/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper" class="toggled">

        <?php include("layout/menu.php");?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <h1>Add Transactions</h1>
                <?php if($sql['jenis'] == 'P'){ ?>
                    <a href="transactions.php" class="btn btn-secondary">Kembali</a>
                <?php } else { ?>
                    <a href="dashboard.php" class="btn btn-secondary">Kembali</a>
                <?php } ?>
                <hr>

                <?php
                if(isset($_POST['btnaddtransaction'])){
                    $renamektm      = "KTM-".date("YmdHis").$_FILES['ktm']['name'];
                    $renamesurjin   = "SURJIN-".date("YmdHis").$_FILES['surjin']['name'];

                    $sql = $db->query("INSERT INTO transaksi VALUES ('','".$_POST['nim']."','".$_POST['koderuang']."','".date('Y-m-d H:i:s')."','".$_POST['tglpinjam']."','".$_POST['tglkembali']."','".$renamektm."','".$renamesurjin."','".$_POST['kegiatan']."','P','')");

                    move_uploaded_file($_FILES['ktm']['tmp_name'], "upload/lampiran/".$renamektm);
                    move_uploaded_file($_FILES['surjin']['tmp_name'], "upload/lampiran/".$renamesurjin);

                    if($sql){
                        echo "<div class='alert alert-success'>Modify Succeded.</div>";
                        if($sql['jenis'] == 'P'){
                            header("location: transactions.php");
                        } else {
                            header("location: transactionsuser.php");
                        }
                    }else{
                        echo "<div class='alert alert-danger'>Modify Failed.</div>";
                    }
                }
                ?>
                <?php
                    if($sql['jenis'] == 'M'){
                        $getmhs = $db->query("SELECT * FROM mahasiswa WHERE idmhs = '".$sql['iduser']."'")->fetch_array();
                        $idpeminjam = $getmhs['nim'];
                        $readonly = "readonly";
                    }else{
                        $idpeminjam = "";
                        $readonly = "";
                    }
                ?>
                <form class="form-vertical" method="post" action="transactionsform.php" enctype="multipart/form-data">
                    <input type="hidden" name="idtransaksi" value="">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label" for="email">NIM Mahasiswa</label>
                                <input <?php echo $readonly;?> name="nim" value="<?php echo $idpeminjam;?>" placeholder="nim" type="text" class="form-control" required>

                            </div>

                            <div class="form-group">
                                <label class="control-label" for="email">Kode Ruang</label>
                                <select <?php echo $readonly;?> required class="form-control" name="koderuang">
                                    <?php
                                    if (isset($_GET["id"])) {
                                        $ruan = $db->query("SELECT * FROM ruangan WHERE idruangan='".$_GET['id']."'")->fetch_array();
                                        echo "<option value='".$_GET['id']."'>".$ruan['nama']." - ".$ruan['kode']."</option>";
                                    }else{
                                        echo "<option value=''>-pilih-</option>";
                                    }

                                    $ruan = $db->query("SELECT * FROM ruangan");
                                    while($dd = $ruan->fetch_array()){?>
                                    <option value="<?php echo $dd['idruangan'];?>"><?php echo $dd['nama']." - ".$dd['kode'];?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="pwd">Deskripsi Kegiatan</label>
                                <textarea rows="5" name="kegiatan" class="form-control" placeholder="jelaskan kegiatannya" required></textarea>
                            </div>


                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label" for="pwd">Tanggal Peminjaman</label>
                                <input name="tglpinjam" placeholder="tanggal peminjaman" type="text" class="form-control form_datetime" required>
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="pwd">Tanggal Kembali</label>
                                <input name="tglkembali" placeholder="tanggal kembali" type="text" class="form-control form_datetime" required>
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="pwd">Scan KTM</label>
                                <input type="file" name="ktm" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="pwd">Scan Surat Perijinan</label>
                                <input type="file" name="surjin" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-success" type="submit" name="btnaddtransaction">Save Transaction</button>
                            </div>
                            <?php // } ?>
                        </div>
                    </div>

                  </form>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <div class="modal fade" id="myModalPeringatanTanggal" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-body">
              <form role="form">
                <h2>Peringatan !</h2>
                <hr>
                <p>
                    Tanggal kembali tidak boleh sebelum tanggal peminjaman.<br>
                    Silahkan atur kembali tanggal kembalinya!.
                </p>
              </form>
            </div>
            <div class="modal-footer">
                  <input type="button" name="submit" class="btn btn-primary" data-dismiss="modal" value="Atur Ulang">
            </div>
          </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <script src="js/bootstrap-datetimepicker.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $(".form_datetime").datetimepicker({
        format: 'yyyy-mm-dd hh:ii:ss',
        startDate: new Date(),
        autoclose: true,
        todayBtn: true,
    });

    $("input[name=tglkembali]").change(function(){
        var tglawal     = $("input[name=tglpinjam]").val();
        var tglkembali  = $(this).val();

        if(tglawal > tglkembali){
            $("#myModalPeringatanTanggal").modal('show');
            $(this).val('');
        }
    });

    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>
