-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2022 at 09:31 AM
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
-- Database: `dbrm`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail`
--

CREATE TABLE `detail` (
  `no` int(11) NOT NULL,
  `no_rm` varchar(8) NOT NULL,
  `kd_obat` varchar(8) NOT NULL,
  `dosis` varchar(30) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `diagnosa` varchar(50) DEFAULT NULL,
  `anamnese` varchar(50) DEFAULT NULL,
  `tgl` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail`
--

INSERT INTO `detail` (`no`, `no_rm`, `kd_obat`, `dosis`, `jumlah`, `total`, `diagnosa`, `anamnese`, `tgl`) VALUES
(1, 'RM00002', 'OB00002', '3 x sehari 1 sendok takar', 1, 10500, 'Febris', 'Panas 3 hari, suhu 38\', mual muntah', '2022-08-07'),
(2, 'RM00002', 'OB00004', '3 x sehari 1 sendok takar sebe', 1, 32000, 'Febris', 'Panas 3 hari, suhu 38\', mual muntah', '2022-08-07'),
(9, 'RM00003', 'OB00001', '3 x sehari', 3, 3600, 'Influenza', 'Mual', '2022-08-07'),
(10, 'RM00003', 'OB00001', '3 x sehari', 3, 3600, 'Influenza', 'Mual', '2022-08-07'),
(11, 'RM00003', 'OB00001', '3 x sehari', 3, 3600, 'Influenza', 'Mual', '2022-08-07'),
(12, 'RM00004', 'OB00003', '3 x sehari 1 sendok takar', 3, 3300, 'Gastritis', 'Mual', '2022-08-07'),
(14, 'RM00005', 'OB00009', '1 X 1 setiap pagi setelah maka', 10, 9000, 'Hipertensi', 'pusing , tensi 180/100 , tangan terasa kebas', '2022-08-07'),
(15, 'RM00005', 'OB00010', '1X1 setiap malam sebelum tidur', 10, 11000, 'Hipertensi', 'pusing , tensi 180/100 , tangan terasa kebas', '2022-08-07');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `kd_obat` varchar(8) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `jenisobat` varchar(30) NOT NULL,
  `keterangan` varchar(60) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`kd_obat`, `nama_obat`, `jenisobat`, `keterangan`, `harga`) VALUES
('OB00001', 'Paracetamol 500mg', 'Analgetik antipiretik', '', 1200),
('OB00002', 'Paracetamol syrup 250 mg/5 ml (60ml)', 'Analgetik antipiretik', '0', 10500),
('OB00003', 'Domperidom 10mg', 'Anti mual', '', 1100),
('OB00004', 'Vometa 1mg/ml Syr ', 'Anti mual', '0', 32000),
('OB00005', 'Amixicillin 500mg', 'Antibiotik', '', 800),
('OB00006', 'Cefadroxil 125 mg/5 ml (60 ml)', 'Antibiotik', '', 12500),
('OB00007', 'Flutamol Syrup 60 ml', 'Influenza', '', 19500),
('OB00008', 'Magtral tablet mint', 'Antasida', '', 550),
('OB00009', 'Amlodipin 10 mg ', 'Hipertensi', '0', 900),
('OB00010', 'Simvastatin 10 mg', 'Kolesterol', '', 1100),
('OB00011', 'Paratusin tablet', 'Influenza', '', 1200),
('OB00012', 'Omeprazole 200mg Cap', 'Asam Lambung', '', 1250),
('OB00013', 'OBH Nelcco Spesial 100ml', 'Batuk', '', 25500),
('OB00014', 'Ketoconazole 2% crm', 'Anti Fungi', '', 15500);

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `idpasien` varchar(10) NOT NULL,
  `goldar` varchar(2) NOT NULL,
  `namapasien` varchar(40) NOT NULL,
  `tgllahir` date NOT NULL,
  `jnskelamin` enum('Perempuan','Laki-laki','','') NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `notelpon` varchar(15) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`idpasien`, `goldar`, `namapasien`, `tgllahir`, `jnskelamin`, `alamat`, `notelpon`, `status`) VALUES
('REG00001', 'A', 'Olivia', '2012-07-08', 'Perempuan', 'Karang Panas No.23', '081225830555', 0),
('REG00002', 'AB', 'Sekar kirana', '2001-07-08', 'Perempuan', 'Karang Bendo Selatan No.5', '08122837696', 0),
('REG00003', 'B', 'Teddy Alamsyahs', '2022-07-08', 'Laki-laki', 'Sanggung Barar No.15', '081223768690', 0),
('REG00004', 'B', 'Setyo ', '1970-03-20', 'Laki-laki', 'Karang Rejo Barat No.17 Jatingaleh', '0812234676978', 0),
('REG00005', 'A', 'Ratna Kartika', '1985-10-17', 'Perempuan', 'Karang Panas No.23 RT4 RW01 Ke.Jatingaleh', '08979787367', 0),
('REG00006', 'B', 'Sarinah Kumala Dewi', '1984-05-10', 'Perempuan', 'Tusam Raya II No.34 Banyumanik', '081575743283', 0),
('REG00007', 'AB', 'Nindya Andasari', '1997-04-05', 'Perempuan', 'Kagok 2 No.859 Wonotingal Candisari', '083838040663', 0),
('REG00008', 'A', 'Bagas Saputra', '2000-06-15', 'Laki-laki', 'dr.Wahidin No.86 A Jatingaleh', '085100963218', 0),
('REG00009', 'O', 'Edy Sudrajat', '1976-08-27', 'Laki-laki', 'Karang Panas No.713 RT05 RW01 Jatingaleh', '087729384451', 0),
('REG00010', 'B', 'Ahadi', '1962-09-12', 'Laki-laki', 'Jangli Raya No.58 Jatingaleh', '085725744478', 0);

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
(3, 'Naning', '081', 'Admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'aktif'),
(5, 'Donata Laksmi', '085802229199', 'Dokter', 'd22af4180eee4bd95072eb90f94930e5', 'Dokter', 'aktif'),
(6, 'Apoteker', '-', 'apoteker', '326dd0e9d42a3da01b50028c51cf21fc', 'Apoteker', 'aktif'),
(7, 'perawat', '-', 'perawat', '5d6a514ee02a5fc910dee69cc07017cc', 'Perawat', 'aktif');

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

-- --------------------------------------------------------

--
-- Table structure for table `rm`
--

CREATE TABLE `rm` (
  `no_rm` varchar(8) NOT NULL,
  `no_pasien` varchar(8) NOT NULL,
  `jasa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rm`
--

INSERT INTO `rm` (`no_rm`, `no_pasien`, `jasa`) VALUES
('RM00001', 'REG00002', 30000),
('RM00002', 'REG00001', 30000),
('RM00003', 'REG00004', 30000),
('RM00004', 'REG00003', 30000),
('RM00005', 'REG00010', 30000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `no_trans` varchar(8) NOT NULL,
  `no_pasien` varchar(8) NOT NULL,
  `bayar` int(11) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`no_trans`, `no_pasien`, `bayar`, `tgl`) VALUES
('', '', 40000, '2022-08-07'),
('TR00001', 'REG00001', 555, '2022-07-08'),
('TR00002', '', 50000, '2022-08-07'),
('TR00003', '', 60000, '2022-08-07'),
('TR00004', 'REG00002', 100000, '2022-08-07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`kd_obat`);

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
-- Indexes for table `rm`
--
ALTER TABLE `rm`
  ADD PRIMARY KEY (`no_rm`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`no_trans`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail`
--
ALTER TABLE `detail`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `registrasi`
--
ALTER TABLE `registrasi`
  MODIFY `idReg` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
