-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2022 at 05:57 PM
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
-- Table structure for table `tb_anak_sub_bab_sop`
--

CREATE TABLE `tb_anak_sub_bab_sop` (
  `id_anak_sub_bab_sop` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `id_bab_utama_sop` int(11) NOT NULL,
  `id_sub_bab_sop` int(11) NOT NULL,
  `urutan_anak_sub_bab` varchar(10) NOT NULL,
  `judul_anak_sub_bab` varchar(300) NOT NULL,
  `tanggal_pembuatan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_anak_sub_bab_sop`
--

INSERT INTO `tb_anak_sub_bab_sop` (`id_anak_sub_bab_sop`, `id`, `id_bab_utama_sop`, `id_sub_bab_sop`, `urutan_anak_sub_bab`, `judul_anak_sub_bab`, `tanggal_pembuatan`) VALUES
(1, 7, 4, 1, 'a', 'Blokir', '2022-03-20 04:50:57'),
(3, 7, 2, 2, 'c', 'aaaaaa', '2022-03-20 05:12:31'),
(4, 7, 4, 1, 'b', 'Sita', '2022-03-20 05:28:55'),
(5, 7, 4, 1, 'c', 'Pengangkatan Sita', '2022-03-20 05:34:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_anak_sub_bab_sop_tanpa_sub_bab`
--

CREATE TABLE `tb_anak_sub_bab_sop_tanpa_sub_bab` (
  `id_anak_sub_bab_sop_tanpa_sub_bab` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `id_bab_utama_sop` int(11) NOT NULL,
  `id_sub_bab_sop` int(11) NOT NULL,
  `id_anak_sub_bab_sop` int(11) NOT NULL,
  `dasar_hukum` varchar(3000) NOT NULL,
  `persyaratan` varchar(3000) NOT NULL,
  `biaya` varchar(3000) NOT NULL,
  `waktu` varchar(3000) NOT NULL,
  `keterangan` varchar(3000) NOT NULL,
  `tanggal_pembuatan` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_anak_sub_bab_sop_tanpa_sub_bab`
--

INSERT INTO `tb_anak_sub_bab_sop_tanpa_sub_bab` (`id_anak_sub_bab_sop_tanpa_sub_bab`, `id`, `id_bab_utama_sop`, `id_sub_bab_sop`, `id_anak_sub_bab_sop`, `dasar_hukum`, `persyaratan`, `biaya`, `waktu`, `keterangan`, `tanggal_pembuatan`) VALUES
(1, 0, 0, 0, 0, '<p>AAAAA</p>\r\n', '<p>BBBBBB</p>\r\n', '<p>CCCCCCCCC</p>\r\n', '<p>DDDDDDDDDD</p>\r\n', '<p>EEEEEEEEE</p>\r\n', '2022-03-20 16:40:55');

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
-- Table structure for table `tb_bab_utama_sop`
--

CREATE TABLE `tb_bab_utama_sop` (
  `id_bab_utama_sop` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `urutan_bab_utama_sop` varchar(10) NOT NULL,
  `judul_bab_utama_sop` varchar(300) NOT NULL,
  `tanggal_pembuatan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_bab_utama_sop`
--

INSERT INTO `tb_bab_utama_sop` (`id_bab_utama_sop`, `id`, `urutan_bab_utama_sop`, `judul_bab_utama_sop`, `tanggal_pembuatan`) VALUES
(1, 7, 'I', 'Pelayanan Pendaftaran Tanah Pertama Kali', '2022-03-13 15:21:51'),
(2, 7, 'II', 'Pelayanan Pemeliharaan Data Pendaftaran Tanah', '2022-03-14 14:43:11'),
(4, 7, 'III', 'Pelayanan Pencatatan Dan Informasi Pertanahan', '2022-03-14 14:46:35'),
(5, 7, 'VI', 'Pengelola Aduan', '2022-03-18 13:16:03'),
(7, 7, 'V', 'Pelayanan Pengaturan Dan Penataan Pertanahan', '2022-03-18 13:23:07'),
(8, 7, 'IV', 'Pelayanan Pengukuran Bidang Tanah', '2022-03-18 13:28:26');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bab_utama_sop_tanpa_sub_bab`
--

CREATE TABLE `tb_bab_utama_sop_tanpa_sub_bab` (
  `id_bab_utama_sop_tanpa_sub_bab` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `id_bab_utama_sop` int(11) NOT NULL,
  `dasar_hukum` varchar(3000) NOT NULL,
  `persyaratan` varchar(3000) NOT NULL,
  `biaya` varchar(3000) NOT NULL,
  `waktu` varchar(3000) NOT NULL,
  `keterangan` varchar(3000) NOT NULL,
  `tanggal_pembuatan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_bab_utama_sop_tanpa_sub_bab`
--

INSERT INTO `tb_bab_utama_sop_tanpa_sub_bab` (`id_bab_utama_sop_tanpa_sub_bab`, `id`, `id_bab_utama_sop`, `dasar_hukum`, `persyaratan`, `biaya`, `waktu`, `keterangan`, `tanggal_pembuatan`) VALUES
(2, 7, 5, '<ol>\r\n	<li>UU No. 5/1960</li>\r\n	<li>UU No. 25/2009</li>\r\n</ol>\r\n', '<p>Pengaduan secara tertulis baik yang disampaikan melalui loket, kotak pengaduan, website</p>\r\n', '<p>Rp. 0,-</p>\r\n', '<p>5(lima) hari</p>\r\n', '<p>Jika penyelesaian pengaduan membutuhkan waktu lebih dari 5 (lima) hari, maka unit kerja terkait berkewajiban memberikan tanggapan atau jawaban terhadap pengaduan yang disampaikan.</p>\r\n', '2022-03-18 16:20:25'),
(3, 0, 0, '<ol>\r\n	<li>UU No 1 / 2022</li>\r\n	<li>UU No. 4 / 2021</li>\r\n</ol>\r\n', '<p>Membawa Berkas Berkasi pernikahan</p>\r\n', '<p>Rp. 0,-</p>\r\n', '<p>5 (lima) hari</p>\r\n', '<p>Jika tidak ada pembahasan, maka cari pembahasan lain</p>\r\n', '2022-03-20 06:27:06'),
(4, 0, 0, '<ol>\r\n	<li>UU No 1 / 2022</li>\r\n	<li>UU No. 4 / 2021</li>\r\n</ol>\r\n', '<p>Membawa Berkas Berkasi pernikahan</p>\r\n', '<p>Rp. 0,-</p>\r\n', '<p>5 (lima) hari</p>\r\n', '<p>Jika tidak ada pembahasan, maka cari pembahasan lain</p>\r\n', '2022-03-20 06:28:30'),
(5, 0, 0, '<p>aaaaaaaaaaaa</p>\r\n', '<p>bbbbbbbbbbbbbbbbb</p>\r\n', '<p>ccccccccccccccccc</p>\r\n', '<p>dddddddddddddd</p>\r\n', '<p>eeeeeeeeeeeeeeeeee</p>\r\n', '2022-03-20 08:43:53'),
(6, 0, 0, '<p>aaaaaaaaaaaa</p>\r\n', '<p>bbbbbbbbbbbbbbbbb</p>\r\n', '<p>ccccccccccccccccc</p>\r\n', '<p>dddddddddddddd</p>\r\n', '<p>eeeeeeeeeeeeeeeeee</p>\r\n', '2022-03-20 08:44:50'),
(7, 0, 0, '<p>aaaaaaaaaa</p>\r\n', '<p>bbbbbbbbbbbbb</p>\r\n', '<p>cccccccccccccc</p>\r\n', '<p>dddddddddddd</p>\r\n', '<p>eeeeeeeeeeeee</p>\r\n', '2022-03-20 09:30:54'),
(8, 0, 0, '<p>aaaaaaaaaa</p>\r\n', '<p>bbbbbbbbbbbbb</p>\r\n', '<p>cccccccccccccc</p>\r\n', '<p>dddddddddddd</p>\r\n', '<p>eeeeeeeeeeeee</p>\r\n', '2022-03-20 09:32:12'),
(9, 0, 0, '<p>aaaaaaaaaa</p>\r\n', '<p>bbbbbbbbbbbbb</p>\r\n', '<p>cccccccccccccc</p>\r\n', '<p>dddddddddddd</p>\r\n', '<p>eeeeeeeeeeeee</p>\r\n', '2022-03-20 09:42:40'),
(10, 0, 0, '<p>aaaaaaaaaa</p>\r\n', '<p>bbbbbbbbbbbbb</p>\r\n', '<p>cccccccccccccc</p>\r\n', '<p>dddddddddddd</p>\r\n', '<p>eeeeeeeeeeeee</p>\r\n', '2022-03-20 09:46:04'),
(11, 7, 4, '<p>aaa</p>\r\n', '<p>bbbbbbbbb</p>\r\n', '<p>cccccc</p>\r\n', '<p>ddddddd</p>\r\n', '<p>eeeeeeee</p>\r\n', '2022-03-20 11:19:32'),
(12, 7, 4, '<p>aaa</p>\r\n', '<p>bbbbbbbbb</p>\r\n', '<p>cccccc</p>\r\n', '<p>ddddddd</p>\r\n', '<p>eeeeeeee</p>\r\n', '2022-03-20 11:20:07'),
(13, 7, 4, '<p>Ada Apa&nbsp;</p>\r\n', '<p>Denganmu</p>\r\n', '<p>Ku Tanya</p>\r\n', '<p>Malam</p>\r\n', '<p>Dapat kah kau lihat</p>\r\n', '2022-03-20 11:20:57');

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
(3, 'PERATURAN KEPALA BADAN PERTANAHAN NASIONAL REPUBLIK INDONESIA NOMOR 1 TAHUN 2010 TENTANG STANDAR PELAYANAN DAN PENGATURAN PERTANAHAN', '2022-02-20 14:08:29'),
(5, 'sampel undang undang 2', '2022-03-03 06:19:34'),
(6, 'sampel undang undang 3', '2022-03-03 06:20:24'),
(7, 'sampel undang undang 4', '2022-03-03 06:28:37');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pasal`
--

CREATE TABLE `tb_pasal` (
  `id_pasal` int(10) NOT NULL,
  `nomor_bab` varchar(50) NOT NULL,
  `judul_bab` varchar(100) NOT NULL,
  `nomor_urut_pasal` int(3) NOT NULL,
  `isi_pasal` varchar(2000) NOT NULL,
  `nama_uu_pasal` varchar(300) NOT NULL,
  `tanggal_pembuatan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pasal`
--

INSERT INTO `tb_pasal` (`id_pasal`, `nomor_bab`, `judul_bab`, `nomor_urut_pasal`, `isi_pasal`, `nama_uu_pasal`, `tanggal_pembuatan`) VALUES
(1, 'BAB I', 'Umum', 1, '<ol>\r\n	<li>asda</li>\r\n	<li>sdafkgna</li>\r\n	<li>dfgerng</li>\r\n	<li>glkerng</li>\r\n	<li>eglerkng</li>\r\n</ol>\r\n', 'sampel undang undang 4', '2022-03-06 07:43:12'),
(2, 'BAB I', 'Adat', 2, '<ul>\r\n	<li>sfbasdf</li>\r\n	<li>aflknrg</li>\r\n	<li>sdvl rv</li>\r\n	<li>avas vas</li>\r\n	<li>va r</li>\r\n</ul>\r\n', 'sampel undang undang 4', '2022-03-06 07:46:40'),
(3, 'BAB II', 'Peraturan', 3, '<p>asdfafgyawef wefgagcawf</p>\r\n\r\n<p>awe faegfa wef</p>\r\n\r\n<p>aeifhacfhaegfyag fhabba;-fwj fa wf</p>\r\n\r\n<p>awefb agctrwjrn;oef awg</p>\r\n\r\n<p>aefa icsnfaisegm</p>\r\n', 'sampel undang undang 4', '2022-03-06 07:48:49'),
(4, 'BAB II', 'Peraturan', 3, '<p>asdfafgyawef wefgagcawf</p>\r\n\r\n<p>awe faegfa wef</p>\r\n\r\n<p>aeifhacfhaegfyag fhabba;-fwj fa wf</p>\r\n\r\n<p>awefb agctrwjrn;oef awg</p>\r\n\r\n<p>aefa icsnfaisegm</p>\r\n', 'sampel undang undang 4', '2022-03-06 08:11:45'),
(5, 'BAB III', 'h', 3, '<p>asfefw</p>\r\n', 'sampel undang undang 4', '2022-03-06 08:12:26'),
(6, 'BAB III', 'h', 3, '<p>asfefw</p>\r\n', 'sampel undang undang 4', '2022-03-06 08:12:49'),
(7, 'BAB VII', 'hgh', 1, '<p>kg</p>\r\n', 'sampel undang undang 3', '2022-03-06 13:44:01'),
(8, 'BAB II', 'jaja', 8, '<p>nkm;l</p>\r\n', 'sampel undang undang 4', '2022-03-07 13:50:15');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sk_pra_bab_pasal`
--

CREATE TABLE `tb_sk_pra_bab_pasal` (
  `id_sk_pra_bab` int(4) NOT NULL,
  `nama_uu_bab` varchar(500) NOT NULL,
  `kepala_lembaga_instansi` varchar(200) DEFAULT NULL,
  `nama_pejabat_lembaga_instansi` varchar(100) DEFAULT NULL,
  `lokasi_pengesahan` varchar(20) DEFAULT NULL,
  `tanggal_pengesahan` date DEFAULT NULL,
  `menimbang` varchar(3000) DEFAULT NULL,
  `mengingat` varchar(3000) DEFAULT NULL,
  `menetapkan` varchar(3000) DEFAULT NULL,
  `tanggal_pembuatan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_sk_pra_bab_pasal`
--

INSERT INTO `tb_sk_pra_bab_pasal` (`id_sk_pra_bab`, `nama_uu_bab`, `kepala_lembaga_instansi`, `nama_pejabat_lembaga_instansi`, `lokasi_pengesahan`, `tanggal_pengesahan`, `menimbang`, `mengingat`, `menetapkan`, `tanggal_pembuatan`) VALUES
(1, 'PERATURAN KEPALA BADAN PERTANAHAN NASIONAL REPUBLIK INDONESIA NOMOR 1 TAHUN 2010 TENTANG STANDAR PELAYANAN DAN PENGATURAN PERTANAHAN', 'KEPALA BADAN PERTANAHAN NASIONAL REPUBLIK INDONESIA,', 'JOYO WINOTO, Ph.D.', 'Jakarta', '2010-01-25', '<p>a. bahwa untuk melaksanakan Undang-undang Nomor 25 Tahun<br />\r\n2009 tentang Pelayanan Publik dan dalam rangka menyesuaikan<br />\r\nperkembangan dan tuntutan kebutuhan pelayanan masyarakat<br />\r\ndi bidang pertanahan perlu penyempurnaan Keputusan Kepala<br />\r\nBadan Pertanahan Nasional Nomor 1 Tahun 2005 tentang<br />\r\nStandar Prosedur Operasi Pengaturan dan Pelayanan di<br />\r\nLingkungan Badan Pertanahan Nasional jo. Peraturan Kepala<br />\r\nBadan Pertanahan Nasional Republik Indonesia Nomor 6 Tahun<br />\r\n2008 tentang Penyederhanaan dan Percepatan Standar Prosedur<br />\r\nOperasi Pengaturan dan Pelayanan Pertanahan Untuk Jenis<br />\r\nPelayanan Tertentu;<br />\r\nb. bahwa berdasarkan pertimbangan sebagaimana dimaksud pada<br />\r\nhuruf a perlu ditetapkan Peraturan Kepala Badan Pertanahan<br />\r\nNasional Republik Indonesia tentang Standar Pelayanan dan<br />\r\nPengaturan Pertanahan;</p>\r\n', '<ol>\r\n	<li>Undang-undang Nomor 5 Tahun 1960 tentang Peraturan Dasar<br />\r\n	Pokok-pokok Agraria (Lembaran Negara Republik Indonesia<br />\r\n	Tahun 1960 Nomor 104, Tambahan Lembaran Negara Republik<br />\r\n	Indonesia Nomor 2043);</li>\r\n	<li>Undang-undang Nomor 25 Tahun 2009 tentang Pelayanan<br />\r\n	Publik (Lembaran Negara Republik Indonesia Tahun 2009 Nomor<br />\r\n	112, Tambahan Lembaran Negara Republik Indonesia Nomor<br />\r\n	5038);</li>\r\n	<li>Peraturan Presiden Nomor 10 Tahun 2006 tentang Badan<br />\r\n	Pertanahan Nasional;</li>\r\n	<li>Peraturan Kepala Badan Pertanahan Nasional Republik<br />\r\n	Indonesia Nomor 3 Tahun 2006 tentang Organisasi dan Tata<br />\r\n	Kerja Badan Pertanahan Nasional Republik Indonesia;</li>\r\n	<li>eraturan Kepala Badan Pertanahan Nasional Republik<br />\r\n	Indonesia Nomor 4 Tahun 2006 tentang Organisasi dan Tata<br />\r\n	Kerja Kantor Wilayah Badan Pertanahan Nasional dan Kantor<br />\r\n	Pertanahan.</li>\r\n</ol>\r\n', '<p>PERATURAN KEPALA BADAN PERTANAHAN NASIONAL TENTANG<br />\r\nSTANDAR PELAYANAN DAN PENGATURAN PERTANAHAN.</p>\r\n', '2022-02-23 13:53:06'),
(2, 'Nomor 12 Tahun 2021 tentang Kriteria Pelayanan Sosial', 'a', 'b', 'c', '2022-03-03', '<p>dddddddddddddddd</p>\r\n', '<p>eeeeeeeeeeeeeeeee</p>\r\n', '<p>ffffffffffffff</p>\r\n', '2022-03-03 05:42:39'),
(3, 'sampel undang undang 2', 'null', 'null', 'null', '2022-01-01', '<p> </p>', '<p> </p>', '<p> </p>', '2022-03-03 06:19:34'),
(4, 'sampel undang undang 3', 'null', 'null', 'null', '0000-00-00', 'null', 'null', 'null', '2022-03-03 06:20:24'),
(5, 'sampel undang undang 4', '', '', '', '0000-00-00', '', '', '', '2022-03-03 06:28:37');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sub_anak_sub_bab_sop`
--

CREATE TABLE `tb_sub_anak_sub_bab_sop` (
  `id_sub_anak_sub_bab_sop` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `id_bab_utama_sop` int(11) NOT NULL,
  `id_sub_bab_sop` int(11) NOT NULL,
  `id_anak_sub_bab_sop` int(11) NOT NULL,
  `urutan_sub_anak_sub_bab` varchar(10) NOT NULL,
  `judul_sub_anak_sub_bab` varchar(300) NOT NULL,
  `tanggal_pembuatan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_sub_bab_sop`
--

CREATE TABLE `tb_sub_bab_sop` (
  `id_sub_bab_sop` int(11) NOT NULL,
  `id_bab_utama_sop` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `urutan_sub_bab` varchar(10) NOT NULL,
  `judul_sub_bab` varchar(300) NOT NULL,
  `tanggal_pembuatan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_sub_bab_sop`
--

INSERT INTO `tb_sub_bab_sop` (`id_sub_bab_sop`, `id_bab_utama_sop`, `id`, `urutan_sub_bab`, `judul_sub_bab`, `tanggal_pembuatan`) VALUES
(1, 4, 7, '1', 'Pencatatan', '2022-03-16 14:22:37'),
(2, 4, 7, '2', 'Informasi Pertanahan', '2022-03-18 13:09:30');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sub_bab_sop_tanpa_sub_bab`
--

CREATE TABLE `tb_sub_bab_sop_tanpa_sub_bab` (
  `id_sub_bab_sop_tanpa_sub_bab` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `id_bab_utama_sop` int(11) NOT NULL,
  `id_sub_bab_sop` int(11) NOT NULL,
  `dasar_hukum` varchar(3000) NOT NULL,
  `persyaratan` varchar(3000) NOT NULL,
  `biaya` varchar(3000) NOT NULL,
  `waktu` varchar(3000) NOT NULL,
  `keterangan` varchar(3000) NOT NULL,
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
-- Indexes for table `tb_anak_sub_bab_sop`
--
ALTER TABLE `tb_anak_sub_bab_sop`
  ADD PRIMARY KEY (`id_anak_sub_bab_sop`);

--
-- Indexes for table `tb_anak_sub_bab_sop_tanpa_sub_bab`
--
ALTER TABLE `tb_anak_sub_bab_sop_tanpa_sub_bab`
  ADD PRIMARY KEY (`id_anak_sub_bab_sop_tanpa_sub_bab`);

--
-- Indexes for table `tb_bab`
--
ALTER TABLE `tb_bab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_bab_utama_sop`
--
ALTER TABLE `tb_bab_utama_sop`
  ADD PRIMARY KEY (`id_bab_utama_sop`);

--
-- Indexes for table `tb_bab_utama_sop_tanpa_sub_bab`
--
ALTER TABLE `tb_bab_utama_sop_tanpa_sub_bab`
  ADD PRIMARY KEY (`id_bab_utama_sop_tanpa_sub_bab`);

--
-- Indexes for table `tb_nama_uu`
--
ALTER TABLE `tb_nama_uu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pasal`
--
ALTER TABLE `tb_pasal`
  ADD PRIMARY KEY (`id_pasal`);

--
-- Indexes for table `tb_sk_pra_bab_pasal`
--
ALTER TABLE `tb_sk_pra_bab_pasal`
  ADD PRIMARY KEY (`id_sk_pra_bab`);

--
-- Indexes for table `tb_sub_anak_sub_bab_sop`
--
ALTER TABLE `tb_sub_anak_sub_bab_sop`
  ADD PRIMARY KEY (`id_sub_anak_sub_bab_sop`);

--
-- Indexes for table `tb_sub_bab_sop`
--
ALTER TABLE `tb_sub_bab_sop`
  ADD PRIMARY KEY (`id_sub_bab_sop`);

--
-- Indexes for table `tb_sub_bab_sop_tanpa_sub_bab`
--
ALTER TABLE `tb_sub_bab_sop_tanpa_sub_bab`
  ADD PRIMARY KEY (`id_sub_bab_sop_tanpa_sub_bab`);

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
-- AUTO_INCREMENT for table `tb_anak_sub_bab_sop`
--
ALTER TABLE `tb_anak_sub_bab_sop`
  MODIFY `id_anak_sub_bab_sop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_anak_sub_bab_sop_tanpa_sub_bab`
--
ALTER TABLE `tb_anak_sub_bab_sop_tanpa_sub_bab`
  MODIFY `id_anak_sub_bab_sop_tanpa_sub_bab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_bab`
--
ALTER TABLE `tb_bab`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_bab_utama_sop`
--
ALTER TABLE `tb_bab_utama_sop`
  MODIFY `id_bab_utama_sop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_bab_utama_sop_tanpa_sub_bab`
--
ALTER TABLE `tb_bab_utama_sop_tanpa_sub_bab`
  MODIFY `id_bab_utama_sop_tanpa_sub_bab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_nama_uu`
--
ALTER TABLE `tb_nama_uu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_pasal`
--
ALTER TABLE `tb_pasal`
  MODIFY `id_pasal` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_sk_pra_bab_pasal`
--
ALTER TABLE `tb_sk_pra_bab_pasal`
  MODIFY `id_sk_pra_bab` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_sub_anak_sub_bab_sop`
--
ALTER TABLE `tb_sub_anak_sub_bab_sop`
  MODIFY `id_sub_anak_sub_bab_sop` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_sub_bab_sop`
--
ALTER TABLE `tb_sub_bab_sop`
  MODIFY `id_sub_bab_sop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_sub_bab_sop_tanpa_sub_bab`
--
ALTER TABLE `tb_sub_bab_sop_tanpa_sub_bab`
  MODIFY `id_sub_bab_sop_tanpa_sub_bab` int(11) NOT NULL AUTO_INCREMENT;

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
