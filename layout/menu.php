<?php
$dptuser = $db->query("SELECT * FROM login WHERE idlogin='".$_SESSION['iduser']."'")->fetch_array();

//user peawai
$hitung1 = $db->query("SELECT * FROM transaksi WHERE status = 'P'")->num_rows;

//user mahasiswa
$trans = $db->query("SELECT * FROM mahasiswa WHERE idmhs = '".$dptuser['iduser']."'")->fetch_array();
$hitung2 = $db->query("SELECT * FROM transaksi WHERE status = 'B' AND idlogin = '".$trans['nrp']."'")->num_rows;
?>
<!-- Sidebar -->

<html dir="ltr" lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Login Admin</title>
  <!-- Bootstrap core CSS-->
  <link href="desain/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="desain/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="desain/css/sb-admin.css" rel="stylesheet">

  <link href="desain/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
</head>
<body class="fixed-nav sticky-footer" id="page-top">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="dashboard.php">Peminjaman Ruangan</a>
    
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span></button>

<div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
    <?php if($dptuser['jenis'] == 'P') { ?>
    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="dashboard.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
    </li>
    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="transactions.php">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text">Transactions<span style="float: right; padding-right: 15px">
                 <?php echo $hitung1;?></span></span>
            
          </a>
    </li>
    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="rooms.php">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Rooms</span>
          </a>
    </li>
    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link" href="members.php"> 
            <i class="fa fa-fw fa-sitemap"></i>
            <span class="nav-link-text">Members</span>
          </a>
    </li>
     <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link" href="pegawai.php"> 
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Pegawai</span>
          </a>
    </li>
    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link" href="mahasiswa.php"> 
            <i class="fa fa-fw fa-sitemap"></i>
            <span class="nav-link-text">Mahasiswa</span>
          </a>
    </li>
    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link" href="myprofile.php"> 
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">My Profile</span>
          </a>
    </li>


    <?php } else { ?>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="dashboard.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="transactionsuser.php">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text">Transactions<span style="float: right; padding-right: 15px">
                 <?php echo $hitung2;?></span></span>
            
          </a>
    </li>
    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link" href="myprofile.php"> 
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">My Profile</span>
          </a>
    </li>
    <?php } ?>

    </ul>
    <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="signout.php"> 
            <i class="fa fa-fw fa-sign-out"></i>
            <span class="nav-link-text">Sign out</span>
            </a>
        </li>
      </ul>
</div>
</nav>
<script src="desain/vendor/jquery/jquery.min.js"></script>
    <script src="desain/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="desain/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="desain/vendor/chart.js/Chart.min.js"></script>
    <script src="desain/vendor/datatables/jquery.dataTables.js"></script>
    <script src="desain/vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="desain/js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="desain/js/sb-admin-datatables.min.js"></script>
    <script src="desain/js/sb-admin-charts.min.js"></script>
</body>

</html>
<!-- /#sidebar-wrapper -->