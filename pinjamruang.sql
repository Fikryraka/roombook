-- MySQL dump 10.13  Distrib 5.5.47, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: pinjamruang
-- ------------------------------------------------------
-- Server version	5.5.47-0ubuntu0.14.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feedback` (
  `idfeedback` int(11) NOT NULL AUTO_INCREMENT,
  `idtransaksi` int(11) NOT NULL,
  `foto1` varchar(100) NOT NULL,
  `foto2` varchar(100) NOT NULL,
  `kritik` varchar(100) NOT NULL,
  `saran` varchar(100) NOT NULL,
  PRIMARY KEY (`idfeedback`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedback`
--

LOCK TABLES `feedback` WRITE;
/*!40000 ALTER TABLE `feedback` DISABLE KEYS */;
INSERT INTO `feedback` VALUES (1,5,'F120171104063529-WIN_20170619_21_24_14_Pro.jpg','F220171104063529-WIN_20170619_21_24_37_Pro.jpg','ACnya lucak','Diperbaiki ACnya'),(2,6,'F120171113131238-petadunia.jpg','F220171113131238-MAC-Wallpaper-2.jpg','Proyektornya rusak tidak bisa nyala','Segera diperbaiki ke teknisinya'),(3,10,'F120171113151728-7.png','F220171113151728-9.png','tanggal diperbaiki','tanggal diperbaiki\r\n'),(4,11,'F120171126113229-login.png','F220171126113229-login.png','proyektornya mati',' Tolong untuk acnya diperbaiki ya'),(5,13,'F120171202092723-blood.jpg','F220171202092723-edmodo.png','Ruangannya sudah memadai','Tetap jaga kebersihannya'),(6,9,'F120171202100047-ganti--mac.png','F220171202100048-dota-2-heroes-chibi-wallpaper.jpg','AC nya tidak berfungsi','pangil teknisi AC'),(7,7,'F120171202100327-fgm88es7fmghl9tmvcb7.png','F220171202100327-silhouette-of-mosque.jpg','Ruanggannya kurang pendingin','Kalau bisa ditambahin AC nya');
/*!40000 ALTER TABLE `feedback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login` (
  `idlogin` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `jenis` enum('M','P') NOT NULL,
  `password` varchar(150) NOT NULL,
  PRIMARY KEY (`idlogin`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES (1,1,'M','Lina84'),(2,2,'M','terLalu7'),(3,1,'P','Wahyu01'),(4,3,'M','Arinda123'),(5,4,'M','1234'),(6,5,'M','Semangat55');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mahasiswa`
--

DROP TABLE IF EXISTS `mahasiswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mahasiswa` (
  `idmhs` int(11) NOT NULL AUTO_INCREMENT,
  `nim` varchar(15) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `goldar` varchar(5) NOT NULL,
  `tgllahir` date NOT NULL,
  `templahir` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `notlpn` varchar(15) NOT NULL,
  `asalsekolah` varchar(30) NOT NULL,
  `alamatortu` varchar(100) NOT NULL,
  `jalur` varchar(25) NOT NULL,
  PRIMARY KEY (`idmhs`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mahasiswa`
--

LOCK TABLES `mahasiswa` WRITE;
/*!40000 ALTER TABLE `mahasiswa` DISABLE KEYS */;
INSERT INTO `mahasiswa` VALUES (1,'2103151037','Lina Meritha','A','1997-03-31','Kediri','jalan kutisari selatan gang iva no.25','082140492197','SMA DR. SOETOMO SURABAYA','jalan kutisari selatan gang iva no.25 / 60291','PMDK Berprestasi'),(2,'2103151036','Ahmad Ardiansyah','A','1997-01-17','Lumajang','Sememu Ketewel RT 07 RW 06 Pasirian','082334093822','SMKN 1 LUMAJANG','Sememu Ketewel RT 7 RW 6','PMDK Berprestasi'),(3,'2103151033','Arinda Restu Nandatiko','A','1997-05-06','Tulungagung','Jl. Kendangsari Gg.XI No. 22-D Surabaya / 60292','085755828293','SMAN 1 NGUNUT','Jl. Kendangsari Gg.XI No. 22-D Surabaya / 60292','PMDK Berprestasi'),(4,'2103151038','Muhammad Ali Rodhi','A','1995-09-27','Surabaya','Jl Wonosari Kidul 5/34','089671743176','SMKN 5 SURABAYA','Wonosari Kidul 5/34 / 60242','SIMANDIRI'),(5,'2103161052','Bintang Refani Mauludi','A','1998-07-20','Jakarta','DSN Beciro RT 03 RW 02 Kecamatan Wonoayu','083830505150','SMAN 4 SIDOARJO','DSN Beciro RT 03 RW 02 Kecamatan Wonoayu/61261','UMPN');
/*!40000 ALTER TABLE `mahasiswa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pegawai`
--

DROP TABLE IF EXISTS `pegawai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pegawai` (
  `idpegawai` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(25) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tgllahir` date NOT NULL,
  `templahir` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `notlpn` varchar(15) NOT NULL,
  PRIMARY KEY (`idpegawai`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pegawai`
--

LOCK TABLES `pegawai` WRITE;
/*!40000 ALTER TABLE `pegawai` DISABLE KEYS */;
INSERT INTO `pegawai` VALUES (1,'2103151036006','M. Wahyu Izzudin','1997-01-17','Lumajang','Jalan Panggung Nomor 36 Pabean Cantikan, Surabaya','082334093822'),(2,'2103151036007','Dimas Andre D. D.','1998-02-02','Lumajang','Jalan Sememu Ketewel RT07 RW06 Pasirian Lumajang','087757386773');
/*!40000 ALTER TABLE `pegawai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ruangan`
--

DROP TABLE IF EXISTS `ruangan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ruangan` (
  `idruangan` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `status` enum('A','B') NOT NULL COMMENT 'A=aktif, B=booking',
  PRIMARY KEY (`idruangan`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ruangan`
--

LOCK TABLES `ruangan` WRITE;
/*!40000 ALTER TABLE `ruangan` DISABLE KEYS */;
INSERT INTO `ruangan` VALUES (9,'HH-103','IMG-5950-min.JPG','Ruang Kelas','A'),(10,'HH-104','IMG-5948-min.JPG','Ruang Kelas','A'),(11,'HH-105','IMG-5946-min.JPG','Ruang Kelas','A'),(12,'HH-201','IMG-5952-min.JPG','Ruang Kelas','A'),(13,'HH-203','IMG-5954-min.JPG','Ruang Kelas','A'),(14,'HH-106T','IMG-5942-min.JPG','Ruang Kelas ','A'),(15,'HH-106B','IMG-5944-min.JPG','Ruang Kelas ','A'),(18,'HH-204B','IMG-5956-min.JPG','Ruang Kelas','A'),(20,'HH-204T','IMG-5957-min.JPG','Ruang Kelas','A'),(21,'HH-202','bahasa.JPG','Lab Bahasa','A');
/*!40000 ALTER TABLE `ruangan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaksi`
--

DROP TABLE IF EXISTS `transaksi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transaksi` (
  `idtransaksi` int(11) NOT NULL AUTO_INCREMENT,
  `idlogin` int(11) NOT NULL,
  `idruangan` int(11) NOT NULL,
  `tgltransaksi` date NOT NULL,
  `tglpinjam` datetime NOT NULL,
  `tglkembali` datetime NOT NULL,
  `lampiran1` varchar(100) NOT NULL COMMENT 'surjin',
  `lampiran2` varchar(100) NOT NULL COMMENT 'ktm',
  `kegiatan` varchar(300) NOT NULL,
  `status` enum('P','B','S','T') NOT NULL COMMENT 'P=pending, B=booking, S=selesai, T=tolak',
  `keterangan` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`idtransaksi`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaksi`
--

LOCK TABLES `transaksi` WRITE;
/*!40000 ALTER TABLE `transaksi` DISABLE KEYS */;
INSERT INTO `transaksi` VALUES (3,2103151036,10,'2017-10-26','2017-10-27 13:00:15','2017-10-27 21:55:15','KTM-20171026200304yii-bw.png','SURJIN-20171026200304Logo_Yii.png','','T','Deskripsi kegiatan tidak jelas'),(4,2103151037,11,'2017-10-26','2017-10-26 20:15:37','2017-10-27 20:15:37','KTM-20171026201611SELOKAMBANG.jpg','SURJIN-20171026201611tugu-kota-lumajang.jpg','','T','Tidak Berfaedah'),(5,2103151036,9,'2017-11-04','2017-11-04 12:31:35','2017-11-05 11:30:27','KTM-20171104063241Ardi_Merah.jpg','SURJIN-20171104063241watermark-01.png','TM Informatics Cup 2017','S',''),(6,2103151033,11,'2017-11-13','2017-11-14 17:00:00','2017-11-14 23:00:35','KTM-20171113130911Firefox_wallpaper.png','SURJIN-20171113130911bddd.jpg','Temu Alumni Teknik Informatika PENS','S',''),(7,2103151033,14,'2017-11-13','2017-11-14 18:30:52','2017-11-14 23:55:52','KTM-201711131331581465053936187.jpg','SURJIN-20171113133158abstract_background_colorful-1280x720.jpg','Acara Ulang Tahun HIMIT 2017','S',''),(8,2103151033,20,'2017-11-13','2017-11-15 18:35:04','2017-11-15 23:55:04','KTM-20171113133757metal.jpg','SURJIN-20171113133757IMG-20160204-WA0002.jpg','Sosialisasi Sosis','T','batal di acc'),(9,2103151038,9,'2017-11-13','2017-11-13 16:00:31','2017-11-13 20:00:31','KTM-201711131513393.png','SURJIN-201711131513397.png','flooring','S','ali '),(10,2103151038,9,'2017-11-13','2017-11-14 08:45:49','2017-11-13 15:15:09','KTM-201711131515263.png','SURJIN-201711131515264.png','flooring','S',''),(11,2103161052,9,'2017-11-26','2017-11-30 11:20:48','2017-11-30 10:00:48','KTM-20171126112631login.png','SURJIN-20171126112631petadunia.jpg','rapat','S',''),(12,2103161052,14,'2017-11-26','2017-11-27 11:25:13','2017-11-26 11:55:13','KTM-20171126112917login.png','SURJIN-20171126112917login.png','nnnn','T','peminjaman tidak jelas'),(13,2103151036,12,'2017-12-02','2017-12-02 08:40:40','2017-12-03 23:55:31','KTM-20171202084113diky.png','SURJIN-20171202084113crud_pdo.png','RAPAT KOMUNAL HIMIT','S','');
/*!40000 ALTER TABLE `transaksi` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-12-02 10:07:49
