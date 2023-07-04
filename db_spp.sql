-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2023 at 08:53 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spp`
--

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(10) NOT NULL,
  `kompetensi_keahlian` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `kompetensi_keahlian`) VALUES
(1, '10 RPL A', 'Rekayasa Perangkat Lunak'),
(2, '10 RPL B', 'Rekayasa Perangkat Lunak'),
(3, '10 RPL C', 'Rekayasa Perangkat Lunak'),
(4, '10 TKJ A', 'Teknik Komputer Jaringan'),
(5, '10 TKJ B', 'Teknik Komputer Jaringan'),
(6, '10 TKJ C', 'Teknik Komputer Jaringan'),
(7, '10 EIN A', 'Elektronik Industri'),
(8, '10 EIN B', 'Elektronik Industri'),
(9, '10 EIN C', 'Elektronik Industri'),
(10, '10 TP A', 'Teknik Pendingin'),
(11, '10 TP B', 'Teknik Pendingin'),
(12, '10 TP C', 'Teknik Pendingin'),
(13, '11 RPL A', 'Rekayasa Perangkat Lunak'),
(14, '11 RPL B', 'Rekayasa Perangkat Lunak'),
(15, '11 RPL C', 'Rekayasa Perangkat Lunak'),
(16, '11 TKJ A', 'Teknik Komputer Jaringan'),
(17, '11 TKJ B', 'Teknik Komputer Jaringan'),
(18, '11 TKJ C', 'Teknik Komputer Jaringan'),
(19, '11 EIN A', 'Elektronik Industri'),
(20, '11 EIN B', 'Elektronik Industri'),
(21, '11 EIN C', 'Elektronik Industri'),
(22, '11 TP A', 'Teknik Pendingin'),
(23, '11 TP B', 'Teknik Pendingin'),
(24, '11 TP C', 'Teknik Pendingin'),
(25, '12 RPL A', 'Rekayasa Perangkat Lunak'),
(26, '12 RPL B', 'Rekayasa Perangkat Lunak'),
(27, '12 RPL C', 'Rekayasa Perangkat Lunak'),
(28, '12 TKJ A', 'Teknik Komputer Jaringan'),
(29, '12 TKJ B', 'Teknik Komputer Jaringan'),
(30, '12 TKJ C', 'Teknik Komputer Jaringan'),
(31, '12 EIN A', 'Elektronik Industri'),
(32, '12 EIN B', 'Elektronik Industri'),
(33, '12 EIN C', 'Elektronik Industri'),
(34, '12 TP A', 'Teknik Pendingin'),
(35, '12 TP B', 'Teknik Pendingin');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `bulan_dibayar` varchar(8) NOT NULL,
  `tahun_dibayar` varchar(4) NOT NULL,
  `id_spp` int(11) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `ket` text NOT NULL,
  `tempo` varchar(22) DEFAULT NULL,
  `status` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_petugas`, `nisn`, `tgl_bayar`, `bulan_dibayar`, `tahun_dibayar`, `id_spp`, `jumlah_bayar`, `ket`, `tempo`, `status`) VALUES
(34, 0, '0075555101', '2023-07-04', 'Juli  20', '', 2, 0, '', '2023-07-01', 'LUNAS'),
(35, 0, '0075555101', '0000-00-00', 'Agustus ', '', 2, 0, '', '2023-08-01', ''),
(36, 0, '0075555101', '0000-00-00', 'Septembe', '', 2, 0, '', '2023-09-01', ''),
(37, 0, '0075555101', '0000-00-00', 'Oktober ', '', 2, 0, '', '2023-10-01', ''),
(38, 0, '0075555101', '0000-00-00', 'November', '', 2, 0, '', '2023-11-01', ''),
(39, 0, '0075555101', '0000-00-00', 'Desember', '', 2, 0, '', '2023-12-01', ''),
(40, 0, '0075555101', '0000-00-00', 'januari ', '', 2, 0, '', '2024-01-01', ''),
(41, 0, '0075555101', '0000-00-00', 'Februari', '', 2, 0, '', '2024-02-01', ''),
(42, 0, '0075555101', '0000-00-00', 'Maret  2', '', 2, 0, '', '2024-03-01', ''),
(43, 0, '0075555101', '0000-00-00', 'April  2', '', 2, 0, '', '2024-04-01', ''),
(44, 0, '0075555101', '0000-00-00', 'Mei  202', '', 2, 0, '', '2024-05-01', ''),
(45, 0, '0075555101', '0000-00-00', 'Juni  20', '', 2, 0, '', '2024-06-01', '');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama_petugas` varchar(35) NOT NULL,
  `level` enum('admin','petugas','siswa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `username`, `password`, `nama_petugas`, `level`) VALUES
(1, 'admin', '123', 'ajeng', 'admin'),
(2, 'petugas', '456', 'oktavianti', 'petugas');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nisn` char(10) NOT NULL,
  `nis` char(8) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `id_spp` int(11) NOT NULL,
  `tempo` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nisn`, `nis`, `username`, `password`, `nama`, `id_kelas`, `alamat`, `no_telp`, `id_spp`, `tempo`) VALUES
('0075555101', '7555510', 'ajeng', '12345', 'ajeng octaviani', 25, 'cimahi', '08124455567', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE `spp` (
  `id_spp` int(11) NOT NULL,
  `tahunajaran` int(11) NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `spp`
--

INSERT INTO `spp` (`id_spp`, `tahunajaran`, `nominal`) VALUES
(1, 2020, 165000),
(2, 2021, 170000),
(3, 2022, 175000),
(4, 2023, 180000),
(5, 2024, 185000),
(6, 2025, 200000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_bulan`
--

CREATE TABLE `tb_bulan` (
  `id_bulan` int(11) NOT NULL,
  `bulan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_bulan`
--

INSERT INTO `tb_bulan` (`id_bulan`, `bulan`) VALUES
(1, 'Januari'),
(2, 'Februari'),
(3, 'Maret'),
(4, 'April'),
(5, 'Mei'),
(6, 'Juni'),
(7, 'Juli'),
(8, 'Agustus'),
(9, 'September'),
(10, 'Oktober'),
(11, 'November'),
(12, 'Desember');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nisn`);

--
-- Indexes for table `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`id_spp`);

--
-- Indexes for table `tb_bulan`
--
ALTER TABLE `tb_bulan`
  ADD PRIMARY KEY (`id_bulan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `spp`
--
ALTER TABLE `spp`
  MODIFY `id_spp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_bulan`
--
ALTER TABLE `tb_bulan`
  MODIFY `id_bulan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
