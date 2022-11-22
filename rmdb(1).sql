-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2022 at 08:28 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rmdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `idpasien` int(10) NOT NULL,
  `noRM` varchar(10) NOT NULL,
  `namapasien` varchar(40) NOT NULL,
  `tgllahir` date NOT NULL,
  `jnskelamin` enum('Perempuan','Laki-laki','','') NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `notelpon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`idpasien`, `noRM`, `namapasien`, `tgllahir`, `jnskelamin`, `alamat`, `notelpon`) VALUES
(1, 'RM000001', 'Olivia A', '2022-05-10', 'Perempuan', 'Karang Panas No.23', '081225830555'),
(2, 'RM000002', 'Sekar kirana', '2022-05-10', 'Perempuan', 'Karang Bendo Selatan No.5', '08122837696'),
(3, 'RM000003', 'Teddy Alamsyah', '2022-05-10', 'Laki-laki', 'Sanggung Barar No.15', '081223768690');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `idpengguna` int(5) NOT NULL,
  `namapengguna` varchar(50) NOT NULL,
  `telponpengguna` varchar(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `hakakses` varchar(8) NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`idpengguna`, `namapengguna`, `telponpengguna`, `username`, `password`, `hakakses`, `status`) VALUES
(3, 'Naning S', '081', 'Admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'aktif'),
(5, 'Donata Laksmi', '085802229199', 'Dokter', 'ebda37e5e6b69907e7c65fa7b5feb92e', 'Dokter', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `registrasi`
--

CREATE TABLE `registrasi` (
  `idReg` int(10) NOT NULL,
  `koderegistrasi` varchar(10) NOT NULL,
  `tglReg` date NOT NULL,
  `keluhan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`idpasien`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`idpengguna`);

--
-- Indexes for table `registrasi`
--
ALTER TABLE `registrasi`
  ADD PRIMARY KEY (`idReg`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `idpasien` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `registrasi`
--
ALTER TABLE `registrasi`
  MODIFY `idReg` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
