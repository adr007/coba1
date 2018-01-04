-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2018 at 02:30 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_karantina`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_ekspedisi`
--

CREATE TABLE IF NOT EXISTS `data_ekspedisi` (
  `id_ekspedisi` int(11) NOT NULL,
  `nama_ekspedisi` varchar(50) NOT NULL,
  `alamat_ekspedisi` text NOT NULL,
  `telepon_ekspedisi` varchar(14) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_ekspedisi`
--

INSERT INTO `data_ekspedisi` (`id_ekspedisi`, `nama_ekspedisi`, `alamat_ekspedisi`, `telepon_ekspedisi`, `keterangan`) VALUES
(1, 'Ekspedisi Penaja', 'Tanjung Pinang', '082166514', ''),
(2, 'Ekspedisi MTA 0231', 'Buana Tanjung', '083662187532', 'Jasa Antar Jemput Komoditi Indonesia');

-- --------------------------------------------------------

--
-- Table structure for table `data_komoditi`
--

CREATE TABLE IF NOT EXISTS `data_komoditi` (
  `id_komoditi` int(11) NOT NULL,
  `nama_umum` varchar(50) NOT NULL,
  `nama_latin` varchar(50) NOT NULL,
  `jenis_periksa` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_komoditi`
--

INSERT INTO `data_komoditi` (`id_komoditi`, `nama_umum`, `nama_latin`, `jenis_periksa`, `tarif`, `keterangan`) VALUES
(1, 'Kurapu', 'Ephinephelus Sp', 'Benih, Bakteri, Kesehatan', 50000, 'Tarif dihitung per ekor'),
(2, 'Tuna Loin', 'Thunus Sp', 'Kesehatan, Benih', 45000, 'Tarif dihitung per ekor'),
(3, 'Ikan Lele', 'Fortivus Sp', 'Bibiit', 30000, 'Tarif dihitung per Kg');

-- --------------------------------------------------------

--
-- Table structure for table `data_permohonan`
--

CREATE TABLE IF NOT EXISTS `data_permohonan` (
  `id_permohonan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_komoditi` int(11) NOT NULL,
  `id_ekspedisi` int(11) NOT NULL,
  `tgl_permohonan` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_permohonan`
--

INSERT INTO `data_permohonan` (`id_permohonan`, `id_user`, `id_komoditi`, `id_ekspedisi`, `tgl_permohonan`, `jumlah`, `total_bayar`, `status`) VALUES
(1, 1, 1, 1, '2016-06-20', 5, 250000, 'Proses'),
(2, 2, 2, 2, '2017-12-12', 10, 450000, 'Selesai'),
(3, 1, 3, 1, '2017-12-10', 50, 2500000, 'Menunggu'),
(4, 1, 1, 1, '2016-11-16', 3, 250000, 'Menunggu'),
(5, 1, 1, 1, '2017-12-12', 12, 600000, 'Selesai'),
(6, 2, 2, 2, '2017-12-13', 12, 540000, 'Selesai'),
(7, 2, 1, 1, '2017-12-12', 4, 540000, 'Selesai'),
(8, 1, 2, 1, '2016-09-27', 11, 495000, 'Menunggu'),
(9, 2, 1, 2, '2016-11-16', 8, 400000, 'Proses'),
(10, 3, 2, 2, '2016-06-20', 3, 135000, 'Proses'),
(11, 3, 3, 1, '2016-11-16', 6, 450000, 'Proses'),
(12, 2, 3, 1, '2018-01-18', 4, 450000, 'Menunggu'),
(13, 1, 1, 2, '2018-01-29', 6, 500000, 'Proses'),
(14, 3, 2, 1, '2018-01-18', 12, 1000000, 'Proses'),
(15, 2, 2, 2, '2018-01-18', 5, 400000, 'Menunggu'),
(16, 3, 2, 2, '2017-11-20', 14, 1850000, 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `data_user`
--

CREATE TABLE IF NOT EXISTS `data_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `alamat_user` text NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `password_user` varchar(70) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_user`
--

INSERT INTO `data_user` (`id_user`, `nama_user`, `alamat_user`, `email_user`, `password_user`) VALUES
(1, 'Rahman Ramadhan', 'Jl. Gatot Subroto RT 01 Rw 02', 'rahman_r@gmail.com', '12345'),
(2, 'Rian Andreas', 'Jl. Jendral Sudirman No 12, Kendari\r\n93141', 'rian221@yahoo.co.id', 'rian221'),
(3, 'Artono Dwi R', 'Jalan Mata Air 1, Kambu Kendari', 'adr@gmail.com', 'adr');

-- --------------------------------------------------------

--
-- Table structure for table `data_waktu`
--

CREATE TABLE IF NOT EXISTS `data_waktu` (
  `id_waktu` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_waktu`
--

INSERT INTO `data_waktu` (`id_waktu`, `tanggal`) VALUES
(9, '2016-06-20'),
(11, '2016-08-04'),
(4, '2016-09-27'),
(10, '2016-09-27'),
(12, '2016-11-16'),
(3, '2017-07-27'),
(2, '2017-11-20'),
(6, '2017-12-04'),
(8, '2017-12-10'),
(1, '2017-12-12'),
(5, '2017-12-12'),
(7, '2017-12-13'),
(13, '2018-01-18'),
(14, '2018-01-29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_ekspedisi`
--
ALTER TABLE `data_ekspedisi`
  ADD PRIMARY KEY (`id_ekspedisi`);

--
-- Indexes for table `data_komoditi`
--
ALTER TABLE `data_komoditi`
  ADD PRIMARY KEY (`id_komoditi`);

--
-- Indexes for table `data_permohonan`
--
ALTER TABLE `data_permohonan`
  ADD PRIMARY KEY (`id_permohonan`);

--
-- Indexes for table `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `data_waktu`
--
ALTER TABLE `data_waktu`
  ADD PRIMARY KEY (`id_waktu`),
  ADD KEY `tanggal` (`tanggal`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_ekspedisi`
--
ALTER TABLE `data_ekspedisi`
  MODIFY `id_ekspedisi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `data_komoditi`
--
ALTER TABLE `data_komoditi`
  MODIFY `id_komoditi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `data_permohonan`
--
ALTER TABLE `data_permohonan`
  MODIFY `id_permohonan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `data_user`
--
ALTER TABLE `data_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `data_waktu`
--
ALTER TABLE `data_waktu`
  MODIFY `id_waktu` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
