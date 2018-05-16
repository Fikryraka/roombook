<?php
require('koneksi.php');

if($_GET['aksi'] == 'terima'){
	$idtransaksi = $_POST['idtransaksi'];
	$transaksi = $db->query("SELECT * FROM transaksi WHERE idtransaksi = '".$idtransaksi."'")->fetch_array();
	//ubah status ruangan jadi B = booking
	$sql1 = $db->query("UPDATE ruangan SET status = 'B' WHERE idruangan = '".$transaksi['idruangan']."'");
	//ubah status transaksi jadi
	$sql2 = $db->query("UPDATE transaksi SET status = 'B' WHERE idtransaksi = '".$transaksi['idtransaksi']."'");

	if($sql1 && $sql2){
		echo "SUKSES";
	} else {
		echo "ERROR_QUERY";
	}
}
else if($_GET['aksi'] == 'tolak'){
	$idtransaksi = $_POST['idtransaksi'];
	$transaksi = $db->query("SELECT * FROM transaksi WHERE idtransaksi = '".$idtransaksi."'")->fetch_array();

	//ubah status ruangan jadi A = available
	$sql1 = $db->query("UPDATE ruangan SET status = 'A' WHERE idruangan = '".$transaksi['idruangan']."'");
	//ubah status transaksi jadi
	$sql2 = $db->query("UPDATE transaksi SET status = 'T', keterangan = '".$_POST['alasan']."' WHERE idtransaksi = '".$transaksi['idtransaksi']."'");

	if($sql2){
		echo "SUKSES";
	} else {
		echo "ERROR_QUERY";
	}
}
else{
	echo "ERROR_ACTION";
}