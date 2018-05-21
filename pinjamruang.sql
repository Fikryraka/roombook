-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2018 at 12:42 PM
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
(7, 6, 'M', 'kenjay'),
(8, 9, 'P', 'ziudith123'),
(9, 10, 'P', '1234'),
(10, 11, 'P', '1234');

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
(6, '2016081009', 'Kenjay Ithabasay', '0', '0000-00-00', 'Japan', 'NIPPON', '021002211', 'NIPPON PAINT', 'Laksamana Maeda');

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
(9, '2016081014', 'Russel ZIu', '2018-05-18', 'Medan', 'medan jalan medan', '0214556256552', 'admin'),
(10, '123456789', 'satpam', '2222-02-22', 'upj', 'upj', '021021021', 'satpam'),
(11, '101022', 'KAPRODI', '0011-11-11', 'jakarta', 'adwads', '1234', 'kaprodi');

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
(23, 'R.503', 'IMG_20180520_153058.jpg', 'Laboratorium Observasi', 'A'),
(24, 'R.506', 'IMG_20180520_153121.jpg', 'Laboratorium Komputerisasi', 'A'),
(25, 'R.505', 'IMG_20180520_153133.jpg', 'Studio Gambar', 'B'),
(26, 'R.504', 'IMG_20180520_153150.jpg', 'Lab Riset Sistem Informasi', 'A'),
(27, 'R.507', 'IMG_20180520_153522.jpg', 'Laboratorium Produksi Visual', 'B'),
(28, 'R.508', 'IMG_20180520_153557.jpg', 'Laboratorium Robotika', 'A'),
(29, 'R.602', 'IMG_20180520_153216.jpg', 'Pascal', 'A'),
(30, 'R.610', 'IMG_20180520_153043.jpg', 'Volta', 'A'),
(31, 'R.611', 'IMG_20180520_153031.jpg', 'G.Bell', 'A'),
(32, 'R.609', 'IMG_20180520_153011.jpg', 'Galileo', 'A'),
(33, 'R.601', 'IMG_20180520_152959.jpg', 'Einstein', 'A'),
(34, 'R.603', 'IMG_20180520_152933.jpg', 'Newton', 'A');

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
  `status` enum('P','B','S','T','P1') NOT NULL COMMENT 'P=pending, B=booking, S=selesai, T=tolak',
  `keterangan` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`idtransaksi`, `idlogin`, `idruangan`, `tgltransaksi`, `tglpinjam`, `tglkembali`, `lampiran1`, `lampiran2`, `kegiatan`, `status`, `keterangan`) VALUES
(16, 2016081009, 25, '2018-05-21', '2018-05-21 15:26:02', '2018-05-21 23:55:45', 'KTM-20180521102625activity diagram (9).png', 'SURJIN-20180521102625activity diagram (2).png', 'Rapat Hima', 'B', ''),
(17, 2016081009, 27, '2018-05-21', '2018-05-21 15:30:31', '2018-05-21 23:30:28', 'KTM-20180521103053activity diagram (3).png', 'SURJIN-20180521103053activity diagram (4).png', 'bakisul', 'B', '');

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
  MODIFY `idlogin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `idmhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `idpegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `idruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `idtransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
