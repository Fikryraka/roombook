<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Formulir Pengembalian Ruangan</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="new/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

   <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/navbar-fixed-top.css" rel="stylesheet">
    <script src="js/modernizr.js"></script>
    <script src="js/ie-emulation-modes-warning.js"></script>
  </head>

  <body>

    <div id="bodyku" class="container">
    <br>
      <h2 class="text-center" style="text-decoration: underline;">Form Pengembalian Ruang</h2>
      <br>
      <form class="form-horizontal" method="post" action="prosessimpan.php" enctype="multipart/form-data">    
        
        <div class="form-group">
          <label class="control-label col-sm-2" for="email">NRP</label>
          <div class="col-sm-7">
            <input type="hidden" name="idcalon">
            <input name="nrp" placeholder="nrp" type="text" class="form-control" id="email">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="email">Nama Peminjam</label>
          <div class="col-sm-7">
            <input type="hidden" name="idcalon">
            <input name="namapeminjam" placeholder="nama anda" type="text" class="form-control" id="email">
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label col-sm-2" for="pwd">Tanggal Peminjaman</label>
          <div class="col-sm-6"> 
            <input type="hidden" name="idcalon">
            <input name="tglpinjam" placeholder="tglpinjam" type="text" class="form-control" id="email">
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="pwd">Jam Peminjaman</label>
          <div class="col-sm-6"> 
            <input type="hidden" name="idcalon">
            <input name="jampinjam" placeholder="jampinjam" type="text" class="form-control" id="email">
        </div>        

        <div class="form-group">
          <label class="control-label col-sm-2" for="pwd">Kegiatan</label>
          <div class="col-sm-6"> 
            <input name="kegiatan" placeholder="kegiatan" type="text" class="form-control" id="pwd">
          </div>
        </div>

      <hr>
       <div class="form-group">
          <label class="control-label col-sm-2" for="pwd">Kritik</label>
          <div class="col-sm-5"> 
             <input name="kritik" placeholder="kritik" type="text" class="form-control" id="pwd">
          </div>
      </div>

      <div class="form-group">
          <label class="control-label col-sm-2" for="pwd">Saran</label>
          <div class="col-sm-5"> 
             <input name="Saran" placeholder="saran" type="text" class="form-control" id="pwd">
          </div>
      </div>

      <div class="form-group">
          <label class="control-label col-sm-2" for="pwd">Foto Ruangan</label>
          <div class="col-sm-5"> 
             <input type="file" name="gambar">
          </div>
      </div>

        
        <div class="form-group"> 
          <div class="col-sm-offset-2 col-sm-10">
            <button name="btnsubmit" type="submit" class="btn btn-success" value="upload">Submit</button>
          </div>
        </div>
      </form>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/vendor/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/vendor/jspdf.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
