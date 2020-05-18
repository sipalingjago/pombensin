-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2020 at 08:26 AM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pertamina`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jadwal_shift` varchar(20) NOT NULL,
  `foto` varchar(300) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `hak_akses` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `jadwal_shift`, `foto`, `email`, `password`, `hak_akses`, `status`) VALUES
(2, 'Administrator', '', NULL, 'admin@pertaminasumbawa.com', '25ed1bcb423b0b7200f485fc5ff71c8e', 0, '1'),
(6, 'Erwin Mardinata, S.Kom', '21.00-23.00', NULL, 'admin@sumbawakab.go.id', '25ed1bcb423b0b7200f485fc5ff71c8e', 2, '1');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_bbm`
--

CREATE TABLE IF NOT EXISTS `jenis_bbm` (
`id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lokasi_pom`
--

CREATE TABLE IF NOT EXISTS `lokasi_pom` (
`id` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `alamat` text NOT NULL,
  `kontak` varchar(20) NOT NULL,
  `lat` varchar(50) NOT NULL,
  `long` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lokasi_pom`
--

INSERT INTO `lokasi_pom` (`id`, `nama`, `alamat`, `kontak`, `lat`, `long`) VALUES
(2, 'POM Atas', '-', '087863577415', '1234567890', '0987654321');

-- --------------------------------------------------------

--
-- Table structure for table `nozzel`
--

CREATE TABLE IF NOT EXISTS `nozzel` (
`id` int(11) NOT NULL,
  `id_tangki` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `teller_akhir` int(11) NOT NULL,
  `teller_awal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tangki`
--

CREATE TABLE IF NOT EXISTS `tangki` (
`id` int(11) NOT NULL,
  `id_jenis_bbm` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_bbm`
--
ALTER TABLE `jenis_bbm`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lokasi_pom`
--
ALTER TABLE `lokasi_pom`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nozzel`
--
ALTER TABLE `nozzel`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tangki`
--
ALTER TABLE `tangki`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `jenis_bbm`
--
ALTER TABLE `jenis_bbm`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lokasi_pom`
--
ALTER TABLE `lokasi_pom`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `nozzel`
--
ALTER TABLE `nozzel`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tangki`
--
ALTER TABLE `tangki`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
