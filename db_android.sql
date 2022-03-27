-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2022 at 05:25 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_android`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(2) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `tanggal_daftar` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `nama`, `email`, `password`, `tanggal_daftar`) VALUES
(1, 'Andi', 'andi@gmail.com', '123456789', '2022-01-23 02:23:38'),
(15, 'rapplllkjl', 'rah@gmail.com', '1', '2022-01-30 13:29:44'),
(17, 'wayyy', 'way@gmail.com', '123', '2022-02-01 03:36:03');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bab`
--

CREATE TABLE `tb_bab` (
  `id` int(3) NOT NULL,
  `nama_uu` varchar(500) NOT NULL,
  `pilihan_bab` varchar(20) NOT NULL,
  `judul_bab` varchar(255) NOT NULL,
  `tanggal_pembuatan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_nama_uu`
--

CREATE TABLE `tb_nama_uu` (
  `id` int(11) NOT NULL,
  `nama_uu` varchar(255) NOT NULL,
  `tanggal_pembuatan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_nama_uu`
--

INSERT INTO `tb_nama_uu` (`id`, `nama_uu`, `tanggal_pembuatan`) VALUES
(1, 'Nomor 3 Tahun 2011 tentang Masalah Populer dalam Masyarakat', '2022-01-30 03:28:46'),
(2, 'Nomor 12 Tahun 2021 tentang Kriteria Pelayanan Sosial', '2022-01-30 03:29:22'),
(3, 'PERATURAN KEPALA BADAN PERTANAHAN NASIONAL REPUBLIK INDONESIA NOMOR 1 TAHUN 2010 TENTANG STANDAR PELAYANAN DAN PENGATURAN PERTANAHAN', '2022-02-20 14:08:29');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sk_pra_bab_pasal`
--

CREATE TABLE `tb_sk_pra_bab_pasal` (
  `id_sk_pra_bab` int(4) NOT NULL,
  `nama_uu` varchar(500) NOT NULL,
  `kepala_lembaga_instansi` varchar(200) NOT NULL,
  `nama_pejabat_lembaga_instansi` varchar(100) NOT NULL,
  `lokasi_pengesahan` varchar(20) NOT NULL,
  `tanggal_pengesahan` date NOT NULL,
  `menimbang` varchar(3000) NOT NULL,
  `mengingat` varchar(3000) NOT NULL,
  `menetapkan` varchar(3000) NOT NULL,
  `tanggal_pembuatan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_test`
--

CREATE TABLE `tb_test` (
  `id` int(2) NOT NULL,
  `textt` varchar(255) NOT NULL,
  `texttt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_test`
--

INSERT INTO `tb_test` (`id`, `textt`, `texttt`) VALUES
(7, '1', '<p>11</p>\r\n'),
(8, '2', '<p>22</p>\r\n'),
(9, '3', '<p>33</p>\r\n'),
(10, '4', '<p>44</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tb_undang`
--

CREATE TABLE `tb_undang` (
  `id` int(3) NOT NULL,
  `nomor_tahun` varchar(8) NOT NULL,
  `keterangan_uu` varchar(255) NOT NULL,
  `tgl_pembuatan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_bab`
--
ALTER TABLE `tb_bab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_nama_uu`
--
ALTER TABLE `tb_nama_uu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_sk_pra_bab_pasal`
--
ALTER TABLE `tb_sk_pra_bab_pasal`
  ADD PRIMARY KEY (`id_sk_pra_bab`);

--
-- Indexes for table `tb_test`
--
ALTER TABLE `tb_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_undang`
--
ALTER TABLE `tb_undang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_bab`
--
ALTER TABLE `tb_bab`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_nama_uu`
--
ALTER TABLE `tb_nama_uu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_sk_pra_bab_pasal`
--
ALTER TABLE `tb_sk_pra_bab_pasal`
  MODIFY `id_sk_pra_bab` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_test`
--
ALTER TABLE `tb_test`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_undang`
--
ALTER TABLE `tb_undang`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
