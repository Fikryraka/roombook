-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2018 at 12:31 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pinjamruang`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `idfeedback` int(11) NOT NULL,
  `idtransaksi` int(11) NOT NULL,
  `foto1` varchar(100) NOT NULL,
  `foto2` varchar(100) NOT NULL,
  `kritik` varchar(100) NOT NULL,
  `saran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`idfeedback`, `idtransaksi`, `foto1`, `foto2`, `kritik`, `saran`) VALUES
(1, 5, 'F120171104063529-WIN_20170619_21_24_14_Pro.jpg', 'F220171104063529-WIN_20170619_21_24_37_Pro.jpg', 'ACnya lucak', 'Diperbaiki ACnya'),
(2, 6, 'F120171113131238-petadunia.jpg', 'F220171113131238-MAC-Wallpaper-2.jpg', 'Proyektornya rusak tidak bisa nyala', 'Segera diperbaiki ke teknisinya'),
(3, 10, 'F120171113151728-7.png', 'F220171113151728-9.png', 'tanggal diperbaiki', 'tanggal diperbaiki\r\n'),
(4, 11, 'F120171126113229-login.png', 'F220171126113229-login.png', 'proyektornya mati', ' Tolong untuk acnya diperbaiki ya'),
(5, 13, 'F120171202092723-blood.jpg', 'F220171202092723-edmodo.png', 'Ruangannya sudah memadai', 'Tetap jaga kebersihannya'),
(6, 9, 'F120171202100047-ganti--mac.png', 'F220171202100048-dota-2-heroes-chibi-wallpaper.jpg', 'AC nya tidak berfungsi', 'pangil teknisi AC'),
(7, 7, 'F120171202100327-fgm88es7fmghl9tmvcb7.png', 'F220171202100327-silhouette-of-mosque.jpg', 'Ruanggannya kurang pendingin', 'Kalau bisa ditambahin AC nya');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `idlogin` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `jenis` enum('M','P','K','B','U','S') NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`idlogin`, `iduser`, `jenis`, `password`) VALUES
(1, 1, 'M', 'Lina84'),
(2, 2, 'M', 'terLalu7'),
(3, 1, 'P', 'Wahyu01'),
(4, 3, 'M', 'Arinda123'),
(5, 4, 'M', '1234'),
(6, 5, 'M', 'Semangat55'),
(7, 6, 'M', 'kenjay'),
(8, 9, 'P', 'ziudith123');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `idmhs` int(11) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `goldar` varchar(5) NOT NULL,
  `tgllahir` date NOT NULL,
  `templahir` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `notlpn` varchar(15) NOT NULL,
  `asalsekolah` varchar(30) NOT NULL,
  `alamatortu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`idmhs`, `nim`, `nama`, `goldar`, `tgllahir`, `templahir`, `alamat`, `notlpn`, `asalsekolah`, `alamatortu`) VALUES
(1, '2103151037', 'Lina Meritha', 'A', '1997-03-31', 'Kediri', 'jalan kutisari selatan gang iva no.25', '082140492197', 'SMA DR. SOETOMO SURABAYA', 'jalan kutisari selatan gang iva no.25 / 60291'),
(2, '2103151036', 'Ahmad Ardiansyah', 'A', '1997-01-17', 'Lumajang', 'Sememu Ketewel RT 07 RW 06 Pasirian', '082334093822', 'SMKN 1 LUMAJANG', 'Sememu Ketewel RT 7 RW 6'),
(3, '2103151033', 'Arinda Restu Nandatiko', 'A', '1997-05-06', 'Tulungagung', 'Jl. Kendangsari Gg.XI No. 22-D Surabaya / 60292', '085755828293', 'SMAN 1 NGUNUT', 'Jl. Kendangsari Gg.XI No. 22-D Surabaya / 60292'),
(4, '2103151038', 'Muhammad Ali Rodhi', 'A', '1995-09-27', 'Surabaya', 'Jl Wonosari Kidul 5/34', '089671743176', 'SMKN 5 SURABAYA', 'Wonosari Kidul 5/34 / 60242'),
(5, '2103161052', 'Bintang Refani Mauludi', 'A', '1998-07-20', 'Jakarta', 'DSN Beciro RT 03 RW 02 Kecamatan Wonoayu', '083830505150', 'SMAN 4 SIDOARJO', 'DSN Beciro RT 03 RW 02 Kecamatan Wonoayu/61261'),
(6, '2016081009', 'Kenjay Ithabasay', '0', '0000-00-00', 'Japan', 'NIPPON', '021002211', 'NIPPON PAINT', 'Laksamana Maeda'),
(7, '2016081013', 'Fikry Raka', 'O', '0000-00-00', 'Jakarta', 'banten', '085777600648', '87', 'sama');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `idpegawai` int(11) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tgllahir` date NOT NULL,
  `templahir` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `notlpn` varchar(15) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`idpegawai`, `nip`, `nama`, `tgllahir`, `templahir`, `alamat`, `notlpn`, `status`) VALUES
(2, '2103151036007', 'Dimas Andre D. D.', '1998-02-02', 'Lumajang', 'Jalan Sememu Ketewel RT07 RW06 Pasirian Lumajang', '087757386773', ''),
(9, '2016081014', 'Russel ZIu', '2018-05-18', 'Medan', 'medan jalan medan', '0214556256552', 'kar');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `idruangan` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `status` enum('A','B') NOT NULL COMMENT 'A=aktif, B=booking'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`idruangan`, `kode`, `foto`, `nama`, `status`) VALUES
(9, 'HH-103', 'IMG-5950-min.JPG', 'Ruang Kelas', 'A'),
(10, 'HH-104', 'IMG-5948-min.JPG', 'Ruang Kelas', 'A'),
(11, 'HH-105', 'IMG-5946-min.JPG', 'Ruang Kelas', 'A'),
(12, 'HH-201', 'IMG-5952-min.JPG', 'Ruang Kelas', 'A'),
(13, 'HH-203', 'IMG-5954-min.JPG', 'Ruang Kelas', 'A'),
(14, 'HH-106T', 'IMG-5942-min.JPG', 'Ruang Kelas ', 'A'),
(15, 'HH-106B', 'IMG-5944-min.JPG', 'Ruang Kelas ', 'A'),
(18, 'HH-204B', 'IMG-5956-min.JPG', 'Ruang Kelas', 'A'),
(20, 'HH-204T', 'IMG-5957-min.JPG', 'Ruang Kelas', 'A'),
(21, 'HH-202', 'bahasa.JPG', 'Lab Bahasa', 'A'),
(22, 'R-2013', 'activity diagram.png', 'Ruang Mayat', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `idtransaksi` int(11) NOT NULL,
  `idlogin` int(11) NOT NULL,
  `idruangan` int(11) NOT NULL,
  `tgltransaksi` date NOT NULL,
  `tglpinjam` datetime NOT NULL,
  `tglkembali` datetime NOT NULL,
  `lampiran1` varchar(100) NOT NULL COMMENT 'surjin',
  `lampiran2` varchar(100) NOT NULL COMMENT 'ktm',
  `kegiatan` varchar(300) NOT NULL,
  `status` enum('P','B','S','T') NOT NULL COMMENT 'P=pending, B=booking, S=selesai, T=tolak',
  `keterangan` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`idtransaksi`, `idlogin`, `idruangan`, `tgltransaksi`, `tglpinjam`, `tglkembali`, `lampiran1`, `lampiran2`, `kegiatan`, `status`, `keterangan`) VALUES
(3, 2103151036, 10, '2017-10-26', '2017-10-27 13:00:15', '2017-10-27 21:55:15', 'KTM-20171026200304yii-bw.png', 'SURJIN-20171026200304Logo_Yii.png', '', 'T', 'Deskripsi kegiatan tidak jelas'),
(4, 2103151037, 11, '2017-10-26', '2017-10-26 20:15:37', '2017-10-27 20:15:37', 'KTM-20171026201611SELOKAMBANG.jpg', 'SURJIN-20171026201611tugu-kota-lumajang.jpg', '', 'T', 'Tidak Berfaedah'),
(5, 2103151036, 9, '2017-11-04', '2017-11-04 12:31:35', '2017-11-05 11:30:27', 'KTM-20171104063241Ardi_Merah.jpg', 'SURJIN-20171104063241watermark-01.png', 'TM Informatics Cup 2017', 'S', ''),
(6, 2103151033, 11, '2017-11-13', '2017-11-14 17:00:00', '2017-11-14 23:00:35', 'KTM-20171113130911Firefox_wallpaper.png', 'SURJIN-20171113130911bddd.jpg', 'Temu Alumni Teknik Informatika PENS', 'S', ''),
(7, 2103151033, 14, '2017-11-13', '2017-11-14 18:30:52', '2017-11-14 23:55:52', 'KTM-201711131331581465053936187.jpg', 'SURJIN-20171113133158abstract_background_colorful-1280x720.jpg', 'Acara Ulang Tahun HIMIT 2017', 'S', ''),
(8, 2103151033, 20, '2017-11-13', '2017-11-15 18:35:04', '2017-11-15 23:55:04', 'KTM-20171113133757metal.jpg', 'SURJIN-20171113133757IMG-20160204-WA0002.jpg', 'Sosialisasi Sosis', 'T', 'batal di acc'),
(9, 2103151038, 9, '2017-11-13', '2017-11-13 16:00:31', '2017-11-13 20:00:31', 'KTM-201711131513393.png', 'SURJIN-201711131513397.png', 'flooring', 'S', 'ali '),
(10, 2103151038, 9, '2017-11-13', '2017-11-14 08:45:49', '2017-11-13 15:15:09', 'KTM-201711131515263.png', 'SURJIN-201711131515264.png', 'flooring', 'S', ''),
(11, 2103161052, 9, '2017-11-26', '2017-11-30 11:20:48', '2017-11-30 10:00:48', 'KTM-20171126112631login.png', 'SURJIN-20171126112631petadunia.jpg', 'rapat', 'S', ''),
(12, 2103161052, 14, '2017-11-26', '2017-11-27 11:25:13', '2017-11-26 11:55:13', 'KTM-20171126112917login.png', 'SURJIN-20171126112917login.png', 'nnnn', 'T', 'peminjaman tidak jelas'),
(13, 2103151036, 12, '2017-12-02', '2017-12-02 08:40:40', '2017-12-03 23:55:31', 'KTM-20171202084113diky.png', 'SURJIN-20171202084113crud_pdo.png', 'RAPAT KOMUNAL HIMIT', 'S', ''),
(14, 2103151037, 10, '2018-05-16', '2018-05-16 18:55:07', '2018-05-16 23:55:07', 'KTM-20180516115741activity diagram (3).png', 'SURJIN-20180516115741activity diagram (2).png', 'BPM', 'P', ''),
(15, 0, 22, '2018-05-18', '2018-05-18 16:59:14', '2018-05-19 23:55:41', 'KTM-20180518115948activity diagram (1).png', 'SURJIN-20180518115948activity diagram (2).png', 'Satanis', 'P', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`idfeedback`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`idlogin`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`idmhs`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`idpegawai`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`idruangan`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`idtransaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `idfeedback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `idlogin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `idmhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `idpegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `idruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `idtransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
