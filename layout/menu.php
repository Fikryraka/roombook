<?php
$dptuser = $db->query("SELECT * FROM login WHERE idlogin='".$_SESSION['iduser']."'")->fetch_array();

//user peawai
$hitung1 = $db->query("SELECT * FROM transaksi WHERE status = 'P'")->num_rows;
$kar = $db->query("SELECT * FROM login INNER JOIN pegawai ON login.iduser = pegawai.idpegawai WHERE login.idlogin = '".$_SESSION['iduser']."' ")->fetch_array();
$status = $kar['status'];
//user mahasiswa
$trans = $db->query("SELECT * FROM mahasiswa WHERE idmhs = '".$dptuser['iduser']."'")->fetch_array();
$hitung2 = $db->query("SELECT * FROM transaksi WHERE status = 'B' AND idlogin = '".$trans['nim']."'")->num_rows;
?>
<!-- Sidebar -->
<div id="sidebar-wrapper">
   <ul class="sidebar-nav">
    <?php if($dptuser['jenis'] == 'P') { ?>
        <li class="sidebar-brand"><a href="dashboard.php">PEMINJAMAN RUANG</a></li>
        <li><a href="dashboard.php"><i class="glyphicon glyphicon-dashboard"></i> Dashboard</a></li>
        <li>
            <a href="transactions.php">Transactions
                <span style="float: right; padding-right: 15px"><?php echo $hitung1;?></span>
            </a>
        </li>
    <?php if ($status == 'kar') { ?>
        <li><a href="myprofile.php">My Profile</a></li>
        <li><a href="signout.php">Sign out</a></li>
    <?php } else { ?>       
        <li><a href="rooms.php">Rooms</a></li>
        <li><a href="members.php">Members</a></li>
        <li><a href="pegawai.php">Pegawai</a></li>
        <li><a href="mahasiswa.php">Mahasiswa</a></li>
        <li><a href="myprofile.php">My Profile</a></li>
        <li><a href="signout.php">Sign out</a></li>
   <?php } ?>
    <?php } else { ?>
        <li class="sidebar-brand"><a href="dashboard.php">PEMINJAMAN RUANG</a></li>
        <li><a href="dashboard.php"><i class="glyphicon glyphicon-dashboard"></i> Dashboard</a></li>
        <li>
            <a href="transactionsuser.php">My Transactions
                <span style="float: right; padding-right: 15px"><?php echo $hitung2;?></span>
            </a>
        </li>
        <li><a href="myprofile.php">My Profile</a></li>
        <li><a href="signout.php">Sign out</a></li>
    <?php } ?>
    </ul>
</div>
<!-- /#sidebar-wrapper -->
