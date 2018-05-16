<?php 
session_start();
if(!empty($_SESSION['iduser'])) header('location: home.php'); 
require("library/koneksi.php");

if(isset($_POST)){
	$data = $_POST['nrp'];
	$pass = $_POST['password'];
    exec("sed -i '1s/.*/var datanya = \"cari=$data\";/g' crawel.js");
    exec("phantomjs crawel.js", $output);
    $pecah = explode(',', $output[0]);

    //query insert
    $tgllahir 	= explode("-", $pecah[3]);
    $tglall		= $tgllahir[2]."-".$tgllahir[1]."-".$tgllahir[0];
    $mhs 		= $db->query("INSERT INTO mahasiswa VALUES ('', '".$pecah[0]."', '".$pecah[1]."', '".$pecah[2]."', '".$tglall."',
					'".$pecah[4]."', '".$pecah[5]."', '".$pecah[6]."', '".$pecah[7]."', '".$pecah[8]."', '".$pecah[9]."')");
    
    $getmhs 	= $db->query("SELECT idmhs FROM mahasiswa WHERE nrp='".$data."'")->fetch_array();
    $login  	= $db->query("INSERT INTO login VALUES ('','".$getmhs['idmhs']."', 'M', '".$pass."')");
    //end query

    if($mhs && $login){
		header('location: signin.php');
    } else {
    	echo "Database Error.";
    }
}