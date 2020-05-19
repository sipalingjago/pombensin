-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2020 at 09:05 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pertamina`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `id_lokasi_pom` int(11) NOT NULL,
  `id_jadwal_shift` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `foto` varchar(300) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `hak_akses` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `id_lokasi_pom`, `id_jadwal_shift`, `nama`, `foto`, `email`, `password`, `hak_akses`, `status`) VALUES
(2, 0, 0, 'Administrator', NULL, 'admin@pertaminasumbawa.com', '25ed1bcb423b0b7200f485fc5ff71c8e', 0, '1'),
(6, 2, 1, 'Erwin Mardinata, S.Kom', NULL, 'admin@sumbawakab.go.id', '25ed1bcb423b0b7200f485fc5ff71c8e', 2, '1'),
(7, 2, 2, 'ahmad', NULL, 'ahmad@gmail.com', '25ed1bcb423b0b7200f485fc5ff71c8e', 2, '1'),
(8, 2, 3, 'fajar', NULL, 'fajar@gmail.com', '4124bc0a9335c27f086f24ba207a4912', 2, '1');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_shift`
--

CREATE TABLE `jadwal_shift` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_shift`
--

INSERT INTO `jadwal_shift` (`id`, `nama`) VALUES
(1, '08.00-15.00'),
(2, '15.00-21.00'),
(3, '21.00-08.00');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_bbm`
--

CREATE TABLE `jenis_bbm` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_bbm`
--

INSERT INTO `jenis_bbm` (`id`, `nama`) VALUES
(2, 'Premium'),
(3, 'Pertalite'),
(4, 'Pertamax'),
(5, 'Solar');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi_pom`
--

CREATE TABLE `lokasi_pom` (
  `id` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `alamat` text NOT NULL,
  `kontak` varchar(20) NOT NULL,
  `lat` varchar(50) NOT NULL,
  `long` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lokasi_pom`
--

INSERT INTO `lokasi_pom` (`id`, `nama`, `alamat`, `kontak`, `lat`, `long`) VALUES
(2, 'POM Atas', '-', '087863577415', '1234567890', '0987654321');

-- --------------------------------------------------------

--
-- Table structure for table `nozzel`
--

CREATE TABLE `nozzel` (
  `id` int(11) NOT NULL,
  `id_tangki` int(11) NOT NULL,
  `id_jadwal_shift` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `teller_akhir` int(11) NOT NULL,
  `teller_awal` int(11) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nozzel`
--

INSERT INTO `nozzel` (`id`, `id_tangki`, `id_jadwal_shift`, `nama`, `teller_akhir`, `teller_awal`, `tanggal`) VALUES
(3, 3, 3, 'nozzel 1', 500000, 1000000, '2020-05-19 14:44:47'),
(4, 3, 2, 'nozzel 2', 909128, 1029310, '2020-05-19 14:54:24');

-- --------------------------------------------------------

--
-- Table structure for table `tangki`
--

CREATE TABLE `tangki` (
  `id` int(11) NOT NULL,
  `id_jenis_bbm` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tangki`
--

INSERT INTO `tangki` (`id`, `id_jenis_bbm`, `nama`) VALUES
(3, 4, 'pertamax 1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal_shift`
--
ALTER TABLE `jadwal_shift`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jadwal_shift`
--
ALTER TABLE `jadwal_shift`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jenis_bbm`
--
ALTER TABLE `jenis_bbm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lokasi_pom`
--
ALTER TABLE `lokasi_pom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nozzel`
--
ALTER TABLE `nozzel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tangki`
--
ALTER TABLE `tangki`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
