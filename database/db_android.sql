-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2022 at 05:04 PM
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
(20, 'Andre', 'andre@gmail.com', '12345678', '2022-07-01 16:51:37'),
(21, 'Fulan', 'fulan1223@gmail.com', 'rahasia', '2022-07-03 07:58:38'),
(22, 'Fulani', 'fulani@gmail.com', 'rahsia', '2022-07-03 08:17:56'),
(23, 'Hendra', 'hendra21@gmail.com', 'rahasia', '2022-07-03 10:39:41');

-- --------------------------------------------------------

--
-- Table structure for table `tb_anak_sub_anak_sub_bab_sop`
--

CREATE TABLE `tb_anak_sub_anak_sub_bab_sop` (
  `id_anak_sub_anak_sub_bab_so` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `id_bab_utama_sop` int(11) NOT NULL,
  `id_sub_bab_sop` int(11) NOT NULL,
  `id_anak_sub_bab_sop` int(11) NOT NULL,
  `id_sub_anak_sub_bab_sop` int(11) NOT NULL,
  `urutan_anak_sub_anak_sub_bab` varchar(10) NOT NULL,
  `judul_anak_sub_anak_sub_bab` varchar(300) NOT NULL,
  `tanggal_pembuatan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_anak_sub_anak_sub_bab_sop_tanpa_sub_bab`
--

CREATE TABLE `tb_anak_sub_anak_sub_bab_sop_tanpa_sub_bab` (
  `id_anak_sub_anak_sub_bab_sop_tanpa_sub_bab` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `id_bab_utama_sop` int(11) NOT NULL,
  `id_sub_bab_sop` int(11) NOT NULL,
  `id_anak_sub_bab_sop` int(11) NOT NULL,
  `id_sub_anak_sub_bab_sop` int(11) NOT NULL,
  `dasar_hukum` varchar(3000) NOT NULL,
  `persyaratan` varchar(3000) NOT NULL,
  `biaya` varchar(3000) NOT NULL,
  `waktu` varchar(3000) NOT NULL,
  `keterangan` varchar(3000) NOT NULL,
  `tanggal_pembuatan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_anak_sub_anak_sub_bab_sop_tanpa_sub_bab`
--

INSERT INTO `tb_anak_sub_anak_sub_bab_sop_tanpa_sub_bab` (`id_anak_sub_anak_sub_bab_sop_tanpa_sub_bab`, `id`, `id_bab_utama_sop`, `id_sub_bab_sop`, `id_anak_sub_bab_sop`, `id_sub_anak_sub_bab_sop`, `dasar_hukum`, `persyaratan`, `biaya`, `waktu`, `keterangan`, `tanggal_pembuatan`) VALUES
(23, 17, 16, 9, 12, 11, '<ol>\r\n	<li>UU No. 5/1960</li>\r\n	<li>UU No. 21/1997 jo.&nbsp;20/2000</li>\r\n	<li>PP No. 48/1994 jo.&nbsp;PP No. 79/1996</li>\r\n	<li>PP No. 24/1997</li>\r\n	<li>PP No. 13/2010</li>\r\n	<li>PMNA/KBPN&nbsp;No. 3/1997</li>\r\n	<li>PMNA/KBPN&nbsp;No. 3/1999</li>\r\n	<li>PMNA/KBPN&nbsp;No. 9/1999</li>\r\n	<li>Peraturan KBPN RI&nbsp;No. 3/2006</li>\r\n	<li>Peraturan KBPN RI&nbsp;No. 4/2006</li>\r\n	<li>Peraturan KBPN&nbsp;No.7/2007</li>\r\n	<li>KMNA/KBPN&nbsp;2/1998</li>\r\n	<li>KMNA/KBPN&nbsp;6/1998</li>\r\n	<li>SE KBPN No. 600-1900 tanggal 31 Juli&nbsp;2003</li>\r\n</ol>\r\n', '<ol>\r\n	<li>Formulir permohonan yang sudah diisi dan ditandatangani pemohon atau kuasanya di atas materai cukup</li>\r\n	<li>Surat Kuasa apabila dikuasakan</li>\r\n	<li>Fotocopy identitas (KTP, KK) pemohon dan kuasa apabila dikuasakan, yang telah dicocokkan dengan aslinya oleh petugas loket</li>\r\n	<li>Asli Bukti perolehan tanah/Alas Hak</li>\r\n	<li>Asli Surat-surat bukti pelepasan hak dan pelunasan tanah dan rumah (Rumah Gol III) atau rumah yang dibeli dari pemerintah</li>\r\n	<li>Foto copy SPPT PBB Tahun berjalan yang telah dicocokkan dengan aslinya oleh petugas loket, penyerahan bukti SSB (BPHTB) dan bukti bayar uang pemasukan (pada saat pendaftaran hak)</li>\r\n	<li>Melampirkan bukti SSP/PPh sesuai dengan ketentuan</li>\r\n</ol>\r\n', '<p>Sesuai ketentuan Peraturan Pemerintah tentang jenis dan tarif atas&nbsp;jenis penerimaan negara bukan pajak yang berlaku pada Badan Pertanahan Nasional Republik Indonesia</p>\r\n', '<p>a. 38 (tiga puluh delapan) hari untuk :</p>\r\n\r\n<ul>\r\n	<li>Tanah pertanian yang luasnya tidak lebih dari 2 Ha</li>\r\n	<li>Tanah non pertanian yang luasnya tidak lebih dari 2.000 m2</li>\r\n</ul>\r\n\r\n<p>b.&nbsp;57 (lima puluh tujuh) hari untuk:</p>\r\n\r\n<ul>\r\n	<li>Tanah pertanian yang luasnya lebih dari 2 Ha</li>\r\n	<li>Tanah non pertanian yang luasnya lebih dari 2.000 m2 s.d. 5.000 m2</li>\r\n</ul>\r\n\r\n<p>c.&nbsp;97 (sembilan puluh tujuh) hari untuk:</p>\r\n\r\n<ul>\r\n	<li>Tanah non pertanian yang luasnya lebih dari 5.000 m2</li>\r\n</ul>\r\n', '<p>Formulir permohonan memuat:</p>\r\n\r\n<ol>\r\n	<li>Identitas diri</li>\r\n	<li>Luas, letak dan pengunaan tanah yang dimohon</li>\r\n	<li>Pernyataan tanah tidak sengketa</li>\r\n	<li>Pernyataan tanah dikuasai secara fisik</li>\r\n	<li>Pernyataan menguasau tanah tidak lebih dari 5 (lima) bidang untuk permohonan rumah tinggal</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Catatan :</p>\r\n\r\n<ol>\r\n	<li>Tidak termasuk tenggang waktu pemenuhan kewajiban pembayaran sesuai SK</li>\r\n	<li>Jangka waktu tidak termasuk waktu yang diperlukan untuk pengiriman berkas/dokumen dari Kantah ke Kanwil dan BPN RI maupun sebaliknya.</li>\r\n</ol>\r\n', '2022-04-07 13:44:55'),
(24, 17, 22, 13, 15, 14, '<p>Tes Dasar Hukum</p>\r\n', '<p>Tes Persyaratan</p>\r\n', '<p>Tes Biaya</p>\r\n', '<p>Tes Waktu</p>\r\n', '<p>Tes Keterangan</p>\r\n', '2022-06-02 03:02:55'),
(25, 17, 26, 16, 17, 15, '<p>sub anak bab</p>\r\n', '<p>sub anak bab</p>\r\n', '<p>sub anak bab</p>\r\n', '<p>sub anak bab</p>\r\n', '<p>sub anak bab</p>\r\n', '2022-06-06 08:11:24'),
(26, 17, 36, 30, 18, 16, '<p>Dasar Hukum Milik Perorrangan</p>\r\n', '<p>Perysaratan Miik Perorangan</p>\r\n', '<p>Biaya Milik Perorangan</p>\r\n', '<p>Waktu Perorangan</p>\r\n', '<p>Keterangan Milik Perorangan</p>\r\n', '2022-06-19 14:45:25'),
(27, 17, 37, 31, 19, 17, '<p>Tes Dasar Hukummmmm</p>\r\n', '<p>Ter Persyaratannnnnnn</p>\r\n', '<p>Tes Biayaaaaaaa</p>\r\n', '<p>TEs Waktuuuuuuu</p>\r\n', '<p>Tes Keterangannnnnnnn</p>\r\n', '2022-06-27 13:59:08'),
(28, 25, 38, 33, 20, 18, '<ol>\r\n	<li>UU No. 5/1960</li>\r\n	<li>UU No. 21/1997 jo. 20/2000</li>\r\n</ol>\r\n', '<ol>\r\n	<li>Formulir permohonan yang sudah diisi dan ditandatangani pemohon atau kuasanya di atas materai cukup</li>\r\n	<li>Surat Kuasa apabila dikuasakan</li>\r\n</ol>\r\n', '<p>Sesuai ketentuan Peraturan Pemerintah tentang jenis dan tarif atas jenis penerimaan negara bukan pajak yang berlaku pada Badan Pertanahan Nasional Republik Indonesia</p>\r\n', '<p>a. 38 (tiga puluh delapan) hari untuk:</p>\r\n\r\n<ul>\r\n	<li>Tanah pertanian yang luasnya tidak lebih dari 2 Ha</li>\r\n	<li>Tanah non pertanian yang luasnya tidak lebih dari 2.000 m2</li>\r\n</ul>\r\n', '<p>Formulir permohonan memuat:</p>\r\n\r\n<ul>\r\n	<li>Identitas diri</li>\r\n	<li>Luas, letak dan penggunaan tanah yang dimohon</li>\r\n</ul>\r\n', '2022-07-03 11:24:54');

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
(12, 17, 16, 9, 'a', 'Hak Milik', '2022-04-07 13:27:04'),
(13, 17, 16, 9, 'b', 'Hak Guna Bangunan', '2022-04-06 15:37:37'),
(14, 20, 19, 11, 'a', 'sampel III', '2022-04-15 09:12:14'),
(15, 17, 22, 13, 'a', 'Hak Guna Bangunan', '2022-06-01 13:44:36'),
(16, 17, 25, 15, 'a', 'Blokir', '2022-06-06 08:08:25'),
(17, 17, 26, 16, 'a', 'Pengukuran Bidang Tanah untuk Keperluan Pengembalian Batas', '2022-06-06 08:10:38'),
(18, 17, 36, 30, 'a', 'Hak Milik', '2022-06-19 14:43:49'),
(19, 17, 37, 31, 'a', 'Anak Sub Bab', '2022-06-27 13:57:59'),
(20, 25, 38, 33, 'a', 'Hak Milik', '2022-07-03 11:20:26');

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
(17, 17, 22, 13, 15, '<p>Dadas</p>\r\n', '<p>Perper</p>\r\n', '<p>Wakwak</p>\r\n', '<p>Bia</p>\r\n', '<p>KetKet</p>\r\n', '2022-06-02 07:08:21'),
(18, 17, 25, 15, 16, '<p>anak sub bab</p>\r\n', '<p>anak sub bab</p>\r\n', '<p>anak sub bab</p>\r\n', '<p>anak sub bab</p>\r\n', '<p>anak sub bab</p>\r\n', '2022-06-06 08:08:49');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bab_utama_sop`
--

CREATE TABLE `tb_bab_utama_sop` (
  `id_bab_utama_sop` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `ada_sub_bab_bab_utama` int(2) NOT NULL,
  `urutan_bab_utama_sop` varchar(10) NOT NULL,
  `judul_bab_utama_sop` varchar(300) NOT NULL,
  `tanggal_pembuatan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_bab_utama_sop`
--

INSERT INTO `tb_bab_utama_sop` (`id_bab_utama_sop`, `id`, `ada_sub_bab_bab_utama`, `urutan_bab_utama_sop`, `judul_bab_utama_sop`, `tanggal_pembuatan`) VALUES
(1, 17, 1, 'I', 'PENGATURAN', '2022-06-16 14:58:19'),
(35, 17, 1, 'II', 'Hak Guna Bangunan', '2022-06-19 09:49:28'),
(36, 17, 1, 'III', 'Pelayanan Pendaftaran Tanah Pertama Kali', '2022-06-19 14:42:54'),
(37, 17, 1, 'IV', 'Bab Utama', '2022-06-27 13:57:25'),
(38, 25, 1, 'I', 'Pelayanan Pendaftaran Tanah Pertama Kali', '2022-07-03 11:17:34'),
(39, 25, 1, 'II', 'Pelayanan Pemeliharaan Data Pendaftaran Tanah', '2022-07-03 11:17:56');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bab_utama_sop_tanpa_sub_bab`
--

CREATE TABLE `tb_bab_utama_sop_tanpa_sub_bab` (
  `id_bab_utama_sop_tanpa_sub_bab` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `id_bab_utama_sop` int(11) NOT NULL,
  `ada_sub_bab_bab_utama_tanpa_sub_bab` varchar(1) NOT NULL,
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

INSERT INTO `tb_bab_utama_sop_tanpa_sub_bab` (`id_bab_utama_sop_tanpa_sub_bab`, `id`, `id_bab_utama_sop`, `ada_sub_bab_bab_utama_tanpa_sub_bab`, `dasar_hukum`, `persyaratan`, `biaya`, `waktu`, `keterangan`, `tanggal_pembuatan`) VALUES
(31, 17, 1, '0', '<p>lagi</p>\r\n', '<p>lagi</p>\r\n', '<p>lagi</p>\r\n', '<p>lagi</p>\r\n', '<p>lagi</p>\r\n', '2022-06-19 09:42:24');

-- --------------------------------------------------------

--
-- Table structure for table `tb_nama_uu`
--

CREATE TABLE `tb_nama_uu` (
  `id` int(11) NOT NULL,
  `nama_uu` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL,
  `tanggal_pembuatan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_nama_uu`
--

INSERT INTO `tb_nama_uu` (`id`, `nama_uu`, `status`, `tanggal_pembuatan`) VALUES
(18, 'sampel undang undang 2', 'Draft', '2022-04-12 13:23:23'),
(20, 'sampel undang undang 10', 'Draft', '2022-04-15 09:10:23'),
(25, 'PERATURAN KEPALA BADAN PERTANAHAN NASIONAL REPUBLIK INDONESIA NOMOR 1 TAHUN 2010 TENTANG STANDAR PELAYANAN DAN PENGATURAN PERTANAHAN', 'Publish', '2022-07-03 10:46:00');

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
(17, 'BAB VII', 'KELOMPOK DAN JENIS PELAYANAN', 5, '<ol>\r\n	<li>Kelompok pelayanan sebagaimana dimaksud pada Pasal 4<br />\r\n	huruf a terdiri dari pelayanan:</li>\r\n</ol>\r\n\r\n<ul>\r\n	<li>Pendaftaran tanah pertama kali</li>\r\n	<li>Pemeliharaan tanah dan Pendaftaran tanah</li>\r\n	<li>Perbaikan</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n', 'PERATURAN KEPALA BADAN PERTANAHAN NASIONAL REPUBLIK INDONESIA NOMOR 1 TAHUN 2010 TENTANG STANDAR PELAYANAN DAN PENGATURAN PERTANAHAN', '2022-07-05 14:45:23'),
(18, 'BAB V', 'Waktu', 8, '<ol>\r\n	<li>&nbsp;Waktu sebagaimana dimaksud dalam Pasal 4 huruf d adalah jangka waktu penyelesaian pelayanan pertanahan terhitung sejak penerimaan berkas lengkap dan telah lunas pembayaran biaya yang ditetapkan.</li>\r\n	<li>Jangka waktu sebagaimana dimaksud pada ayat (1) adalah jangka waktu paling lama untuk penyelesaian masing-masing jenis pelayanan pertanahan yang dihitung berdasar hari kerja.</li>\r\n	<li>Untuk pelaksanaan pelayanan lebih dari satu jenis pelayanan, jangka waktu adalah penjumlahan secara kumulatif waktu yang diperlukan untuk masing-masing jenis pelayanan.</li>\r\n	<li>Jangka waktu sebagaimana dimaksud pada ayat (1) tercantum dalam Lampiran peraturan ini.</li>\r\n	<li>Jangka waktu sebagaimana dimaksud pada ayat (4) tidak berlaku bagi permohonan pelayanan pertanahan yang di dalam prosesnya diketahui terdapat sengketa, konflik, perkara, atau masalah hukum lainnya dan berkasnya dapat dikembalikan kepada pemohon.</li>\r\n	<li>Proses penyelesaian layanan sebagaimana dimaksud pada ayat (5) diselesaikan sesuai dengan ketentuan&nbsp; peraturan perundangundangan.</li>\r\n</ol>\r\n', 'PERATURAN KEPALA BADAN PERTANAHAN NASIONAL REPUBLIK INDONESIA NOMOR 1 TAHUN 2010 TENTANG STANDAR PELAYANAN DAN PENGATURAN PERTANAHAN', '2022-04-30 07:39:32'),
(19, 'BAB II', 'KELOMPOK DAN JENIS PELAYANAN', 5, '<p>(1)Kelompok pelayanan sebagaimana dimaksud pada Pasal 4 huruf a terdiri dari pelayanan:</p>\r\n\r\n<ul>\r\n	<li>Pendaftaran Tanah Pertama Kali;</li>\r\n	<li>Pemeliharaan Data Pendaftaran Tanah;</li>\r\n</ul>\r\n\r\n<p>(2)Jenis pelayanan yang merupakan rincian dari kelompok pelayanan sebagaimana dimaksud pada ayat (1) tercantum dalam Lampiran I peraturan ini.</p>\r\n', 'PERATURAN KEPALA BADAN PERTANAHAN NASIONAL REPUBLIK INDONESIA NOMOR 1 TAHUN 2010 TENTANG STANDAR PELAYANAN DAN PENGATURAN PERTANAHAN', '2022-07-03 11:15:46');

-- --------------------------------------------------------

--
-- Table structure for table `tb_profil_kantor`
--

CREATE TABLE `tb_profil_kantor` (
  `id_profil_kantor` int(11) NOT NULL,
  `gambar_profil_kantor` varchar(255) DEFAULT NULL,
  `judul_profil_kantor` varchar(200) DEFAULT NULL,
  `deskripsi_kantor` varchar(3000) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_profil_kantor`
--

INSERT INTO `tb_profil_kantor` (`id_profil_kantor`, `gambar_profil_kantor`, `judul_profil_kantor`, `deskripsi_kantor`, `created_at`) VALUES
(10, '../gambar/e2fd7815f53f3705f3b1b9de2ca2a46f-save.png', 'Kantah Deli Serdang', '<p>Kantor Pertanahan adalah sebuah instansi pemerintahan yang berada di wilayah Deli Serdang dengan mengedepankan etos kerja yang maksimal</p>\r\n', '2022-04-03 07:56:20');

-- --------------------------------------------------------

--
-- Table structure for table `tb_profil_penulis`
--

CREATE TABLE `tb_profil_penulis` (
  `id_profil_penulis` int(11) NOT NULL,
  `nama_profil_penulis` varchar(100) NOT NULL,
  `deskripsi_penulis` varchar(3000) NOT NULL,
  `gambar_penulis` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_profil_penulis`
--

INSERT INTO `tb_profil_penulis` (`id_profil_penulis`, `nama_profil_penulis`, `deskripsi_penulis`, `gambar_penulis`, `created_at`) VALUES
(1, 'Persenian', '<ol>\r\n	<li>ad</li>\r\n</ol>\r\n', '8bee703eb51c9d80e975b4455a1110cf-org.png', '2022-07-03 07:49:07');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sk_pra_bab_pasal`
--

CREATE TABLE `tb_sk_pra_bab_pasal` (
  `id_sk_pra_bab` int(4) NOT NULL,
  `id` int(11) NOT NULL,
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

INSERT INTO `tb_sk_pra_bab_pasal` (`id_sk_pra_bab`, `id`, `nama_uu_bab`, `kepala_lembaga_instansi`, `nama_pejabat_lembaga_instansi`, `lokasi_pengesahan`, `tanggal_pengesahan`, `menimbang`, `mengingat`, `menetapkan`, `tanggal_pembuatan`) VALUES
(18, 17, 'PERATURAN KEPALA BADAN PERTANAHAN NASIONAL REPUBLIK INDONESIA NOMOR 1 TAHUN 2010 TENTANG STANDAR PELAYANAN DAN PENGATURAN PERTANAHAN', 'KEPALA BADAN PERTANAHAN NASIONAL REPUBLIK INDONESIA', 'JOYO WINOTO, Ph.D.', 'Jakarta', '2010-01-25', '<ul>\r\n	<li>bahwa untuk melaksanakan Undang-undang Nomor 25 Tahun 2009 tentang Pelayanan Publik dan dalam rangka menyesuaikan perkembangan dan tuntutan kebutuhan pelayanan masyarakat di bidang pertanahan perlu penyempurnaan Keputusan Kepala Badan Pertanahan Nasional Nomor 1 Tahun 2005 tentang Standar Prosedur Operasi Pengaturan dan Pelayanan di Lingkungan Badan Pertanahan Nasional jo. Peraturan Kepala Badan Pertanahan Nasional Republik Indonesia Nomor 6 Tahun 2008 tentang Penyederhanaan dan Percepatan Standar Prosedur Operasi Pengaturan</li>\r\n	<li>bahwa berdasarkan pertimbangan sebagaimana dimaksud pada huruf a perlu ditetapkan Peraturan Kepala Badan Pertanahan Nasional Republik Indonesia tentang Standar Pelayanan dan Pengaturan Pertanahan;</li>\r\n</ul>\r\n', '<ol>\r\n	<li>Undang-undang Nomor 5 Tahun 1960 tentang Peraturan Dasar&nbsp;Pokok-pokok Agraria (Lembaran Negara Republik Indonesia&nbsp;Tahun 1960 Nomor 104, Tambahan Lembaran Negara Republik&nbsp;Indonesia Nomor 2043);</li>\r\n	<li>Undang-undang Nomor 25 Tahun 2009 tentang Pelayanan&nbsp;Publik (Lembaran Negara Republik Indonesia Tahun 2009 Nomor&nbsp;112, Tambahan Lembaran Negara Republik Indonesia Nomor&nbsp;5038);</li>\r\n</ol>\r\n', '<p>PERATURAN KEPALA BADAN PERTANAHAN NASIONAL TENTANG STANDAR PELAYANAN DAN PENGATURAN PERTANAHAN.</p>\r\n', '2022-07-03 10:48:46'),
(19, 18, 'sampel undang undang 2', 'KEPALA BADAN PERTANAHAN NASIONAL REPUBLIK INDONESIA', 'JOYO WINOTO, Ph.D.', 'Jakarta', '2010-01-25', '<ul>\r\n	<li>bahwa untuk melaksanakan Undang-undang Nomor 25 Tahun 2009 tentang Pelayanan Publik dan dalam rangka menyesuaikan perkembangan dan tuntutan kebutuhan pelayanan masyarakat di bidang pertanahan perlu penyempurnaan Keputusan Kepala Badan Pertanahan Nasional Nomor 1 Tahun 2005 tentang Standar Prosedur Operasi Pengaturan dan Pelayanan di Lingkungan Badan Pertanahan Nasional jo. Peraturan Kepala Badan Pertanahan Nasional Republik Indonesia Nomor 6 Tahun 2008 tentang Penyederhanaan dan Percepatan Standar Prosedur Operasi Pengaturan</li>\r\n	<li>bahwa berdasarkan pertimbangan sebagaimana dimaksud pada huruf a perlu ditetapkan Peraturan Kepala Badan Pertanahan Nasional Republik Indonesia tentang Standar Pelayanan dan Pengaturan Pertanahan;</li>\r\n</ul>\r\n', '<ol>\r\n	<li>Undang-undang Nomor 5 Tahun 1960 tentang Peraturan Dasar&nbsp;Pokok-pokok Agraria (Lembaran Negara Republik Indonesia&nbsp;Tahun 1960 Nomor 104, Tambahan Lembaran Negara Republik&nbsp;Indonesia Nomor 2043);</li>\r\n	<li>Undang-undang Nomor 25 Tahun 2009 tentang Pelayanan&nbsp;Publik (Lembaran Negara Republik Indonesia Tahun 2009 Nomor&nbsp;112, Tambahan Lembaran Negara Republik Indonesia Nomor&nbsp;5038);</li>\r\n</ol>\r\n', '<p>PERATURAN KEPALA BADAN PERTANAHAN NASIONAL TENTANG STANDAR PELAYANAN DAN PENGATURAN PERTANAHAN.</p>\r\n', '2022-07-03 10:48:46'),
(21, 19, 'sampel undang undang 1', 'KEPALA BADAN PERTANAHAN NASIONAL REPUBLIK INDONESIA', 'JOYO WINOTO, Ph.D.', 'Jakarta', '2010-01-25', '<ul>\r\n	<li>bahwa untuk melaksanakan Undang-undang Nomor 25 Tahun 2009 tentang Pelayanan Publik dan dalam rangka menyesuaikan perkembangan dan tuntutan kebutuhan pelayanan masyarakat di bidang pertanahan perlu penyempurnaan Keputusan Kepala Badan Pertanahan Nasional Nomor 1 Tahun 2005 tentang Standar Prosedur Operasi Pengaturan dan Pelayanan di Lingkungan Badan Pertanahan Nasional jo. Peraturan Kepala Badan Pertanahan Nasional Republik Indonesia Nomor 6 Tahun 2008 tentang Penyederhanaan dan Percepatan Standar Prosedur Operasi Pengaturan</li>\r\n	<li>bahwa berdasarkan pertimbangan sebagaimana dimaksud pada huruf a perlu ditetapkan Peraturan Kepala Badan Pertanahan Nasional Republik Indonesia tentang Standar Pelayanan dan Pengaturan Pertanahan;</li>\r\n</ul>\r\n', '<ol>\r\n	<li>Undang-undang Nomor 5 Tahun 1960 tentang Peraturan Dasar&nbsp;Pokok-pokok Agraria (Lembaran Negara Republik Indonesia&nbsp;Tahun 1960 Nomor 104, Tambahan Lembaran Negara Republik&nbsp;Indonesia Nomor 2043);</li>\r\n	<li>Undang-undang Nomor 25 Tahun 2009 tentang Pelayanan&nbsp;Publik (Lembaran Negara Republik Indonesia Tahun 2009 Nomor&nbsp;112, Tambahan Lembaran Negara Republik Indonesia Nomor&nbsp;5038);</li>\r\n</ol>\r\n', '<p>PERATURAN KEPALA BADAN PERTANAHAN NASIONAL TENTANG STANDAR PELAYANAN DAN PENGATURAN PERTANAHAN.</p>\r\n', '2022-07-03 10:48:46'),
(22, 20, 'sampel undang undang 10', 'KEPALA BADAN PERTANAHAN NASIONAL REPUBLIK INDONESIA', 'JOYO WINOTO, Ph.D.', 'Jakarta', '2010-01-25', '<ul>\r\n	<li>bahwa untuk melaksanakan Undang-undang Nomor 25 Tahun 2009 tentang Pelayanan Publik dan dalam rangka menyesuaikan perkembangan dan tuntutan kebutuhan pelayanan masyarakat di bidang pertanahan perlu penyempurnaan Keputusan Kepala Badan Pertanahan Nasional Nomor 1 Tahun 2005 tentang Standar Prosedur Operasi Pengaturan dan Pelayanan di Lingkungan Badan Pertanahan Nasional jo. Peraturan Kepala Badan Pertanahan Nasional Republik Indonesia Nomor 6 Tahun 2008 tentang Penyederhanaan dan Percepatan Standar Prosedur Operasi Pengaturan</li>\r\n	<li>bahwa berdasarkan pertimbangan sebagaimana dimaksud pada huruf a perlu ditetapkan Peraturan Kepala Badan Pertanahan Nasional Republik Indonesia tentang Standar Pelayanan dan Pengaturan Pertanahan;</li>\r\n</ul>\r\n', '<ol>\r\n	<li>Undang-undang Nomor 5 Tahun 1960 tentang Peraturan Dasar&nbsp;Pokok-pokok Agraria (Lembaran Negara Republik Indonesia&nbsp;Tahun 1960 Nomor 104, Tambahan Lembaran Negara Republik&nbsp;Indonesia Nomor 2043);</li>\r\n	<li>Undang-undang Nomor 25 Tahun 2009 tentang Pelayanan&nbsp;Publik (Lembaran Negara Republik Indonesia Tahun 2009 Nomor&nbsp;112, Tambahan Lembaran Negara Republik Indonesia Nomor&nbsp;5038);</li>\r\n</ol>\r\n', '<p>PERATURAN KEPALA BADAN PERTANAHAN NASIONAL TENTANG STANDAR PELAYANAN DAN PENGATURAN PERTANAHAN.</p>\r\n', '2022-07-03 10:48:46'),
(23, 24, 'PERATURAN KEPALA BADAN PERTANAHAN NASIONAL REPUBLIK INDONESIA NOMOR 1 TAHUN 2010 TENTANG STANDAR PELAYANAN DAN PENGATURAN PERTANAHAN', 'KEPALA BADAN PERTANAHAN NASIONAL REPUBLIK INDONESIA', 'JOYO WINOTO, Ph.D.', 'Jakarta', '2010-01-25', '<ul>\r\n	<li>bahwa untuk melaksanakan Undang-undang Nomor 25 Tahun 2009 tentang Pelayanan Publik dan dalam rangka menyesuaikan perkembangan dan tuntutan kebutuhan pelayanan masyarakat di bidang pertanahan perlu penyempurnaan Keputusan Kepala Badan Pertanahan Nasional Nomor 1 Tahun 2005 tentang Standar Prosedur Operasi Pengaturan dan Pelayanan di Lingkungan Badan Pertanahan Nasional jo. Peraturan Kepala Badan Pertanahan Nasional Republik Indonesia Nomor 6 Tahun 2008 tentang Penyederhanaan dan Percepatan Standar Prosedur Operasi Pengaturan</li>\r\n	<li>bahwa berdasarkan pertimbangan sebagaimana dimaksud pada huruf a perlu ditetapkan Peraturan Kepala Badan Pertanahan Nasional Republik Indonesia tentang Standar Pelayanan dan Pengaturan Pertanahan;</li>\r\n</ul>\r\n', '<ol>\r\n	<li>Undang-undang Nomor 5 Tahun 1960 tentang Peraturan Dasar&nbsp;Pokok-pokok Agraria (Lembaran Negara Republik Indonesia&nbsp;Tahun 1960 Nomor 104, Tambahan Lembaran Negara Republik&nbsp;Indonesia Nomor 2043);</li>\r\n	<li>Undang-undang Nomor 25 Tahun 2009 tentang Pelayanan&nbsp;Publik (Lembaran Negara Republik Indonesia Tahun 2009 Nomor&nbsp;112, Tambahan Lembaran Negara Republik Indonesia Nomor&nbsp;5038);</li>\r\n</ol>\r\n', '<p>PERATURAN KEPALA BADAN PERTANAHAN NASIONAL TENTANG STANDAR PELAYANAN DAN PENGATURAN PERTANAHAN.</p>\r\n', '2022-07-03 10:48:46'),
(24, 25, 'PERATURAN KEPALA BADAN PERTANAHAN NASIONAL REPUBLIK INDONESIA NOMOR 1 TAHUN 2010 TENTANG STANDAR PELAYANAN DAN PENGATURAN PERTANAHAN', 'KEPALA BADAN PERTANAHAN NASIONAL REPUBLIK INDONESIA', 'JOYO WINOTO, Ph.D.', 'Jakarta', '2010-01-25', '<ul>\r\n	<li>bahwa untuk melaksanakan Undang-undang Nomor 25 Tahun 2009 tentang Pelayanan Publik dan dalam rangka menyesuaikan perkembangan dan tuntutan kebutuhan pelayanan masyarakat di bidang pertanahan perlu penyempurnaan Keputusan Kepala Badan Pertanahan Nasional Nomor 1 Tahun 2005 tentang Standar Prosedur Operasi Pengaturan dan Pelayanan di Lingkungan Badan Pertanahan Nasional jo. Peraturan Kepala Badan Pertanahan Nasional Republik Indonesia Nomor 6 Tahun 2008 tentang Penyederhanaan dan Percepatan Standar Prosedur Operasi Pengaturan</li>\r\n	<li>bahwa berdasarkan pertimbangan sebagaimana dimaksud pada huruf a perlu ditetapkan Peraturan Kepala Badan Pertanahan Nasional Republik Indonesia tentang Standar Pelayanan dan Pengaturan Pertanahan;</li>\r\n</ul>\r\n', '<ol>\r\n	<li>Undang-undang Nomor 5 Tahun 1960 tentang Peraturan Dasar&nbsp;Pokok-pokok Agraria (Lembaran Negara Republik Indonesia&nbsp;Tahun 1960 Nomor 104, Tambahan Lembaran Negara Republik&nbsp;Indonesia Nomor 2043);</li>\r\n	<li>Undang-undang Nomor 25 Tahun 2009 tentang Pelayanan&nbsp;Publik (Lembaran Negara Republik Indonesia Tahun 2009 Nomor&nbsp;112, Tambahan Lembaran Negara Republik Indonesia Nomor&nbsp;5038);</li>\r\n</ol>\r\n', '<p>PERATURAN KEPALA BADAN PERTANAHAN NASIONAL TENTANG STANDAR PELAYANAN DAN PENGATURAN PERTANAHAN.</p>\r\n', '2022-07-03 10:48:46');

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

--
-- Dumping data for table `tb_sub_anak_sub_bab_sop`
--

INSERT INTO `tb_sub_anak_sub_bab_sop` (`id_sub_anak_sub_bab_sop`, `id`, `id_bab_utama_sop`, `id_sub_bab_sop`, `id_anak_sub_bab_sop`, `urutan_sub_anak_sub_bab`, `judul_sub_anak_sub_bab`, `tanggal_pembuatan`) VALUES
(11, 17, 16, 9, 12, '1', 'Hak Milik Perorangan', '2022-04-07 13:28:50'),
(12, 17, 16, 9, 12, '2', 'Hak Milik Badan Hukum', '2022-04-07 13:30:51'),
(13, 20, 19, 11, 14, '1', 'sampel IV', '2022-04-15 09:12:33'),
(14, 17, 22, 13, 15, '1', 'Hak Guna Bangunan Perorangan', '2022-06-01 14:07:16'),
(15, 17, 26, 16, 17, '1', 'engukuran dalam rangka Kegiatan Inventarisasi/Pengadaan Tanah', '2022-06-06 08:11:01'),
(16, 17, 36, 30, 18, '1', 'Hak Milik Perorangan ', '2022-06-19 14:44:12'),
(17, 17, 37, 31, 19, '1', 'Sub Anak Sub Bab', '2022-06-27 13:58:20'),
(18, 25, 38, 33, 20, '1', 'Hak Milik ', '2022-07-03 11:20:49');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sub_anak_sub_bab_sop_tanpa_sub_bab`
--

CREATE TABLE `tb_sub_anak_sub_bab_sop_tanpa_sub_bab` (
  `id_sub_anak_sub_bab_sop_tanpa_sub_bab` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `id_bab_utama_sop` int(11) NOT NULL,
  `id_sub_bab_sop` int(11) NOT NULL,
  `id_anak_sub_bab_sop` int(11) NOT NULL,
  `id_sub_anak_sub_bab_sop` int(11) NOT NULL,
  `dasar_hukum` varchar(3000) NOT NULL,
  `persyaratan` varchar(3000) NOT NULL,
  `biaya` varchar(3000) NOT NULL,
  `waktu` varchar(3000) NOT NULL,
  `keterangan` varchar(3000) NOT NULL,
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
  `ada_sub_bab` varchar(2) NOT NULL,
  `tanggal_pembuatan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_sub_bab_sop`
--

INSERT INTO `tb_sub_bab_sop` (`id_sub_bab_sop`, `id_bab_utama_sop`, `id`, `urutan_sub_bab`, `judul_sub_bab`, `ada_sub_bab`, `tanggal_pembuatan`) VALUES
(28, 1, 17, '', '', '0', '2022-06-16 15:19:42'),
(29, 35, 17, '1', 'Hak Pakai di atas Hak Pengelolaan', '1', '2022-06-19 09:50:12'),
(30, 36, 17, '1', 'Konversi, Pengakuan dan Penegasan ', '1', '2022-06-19 14:43:19'),
(31, 37, 17, '1', 'Sub Bab', '1', '2022-06-27 13:57:40'),
(32, 38, 25, '1', 'Konversi, Pengakuan dan Penegasan Hak', '1', '2022-07-03 11:19:29'),
(33, 38, 25, '2', 'Pemberian Hak', '1', '2022-07-03 11:19:52');

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

--
-- Dumping data for table `tb_sub_bab_sop_tanpa_sub_bab`
--

INSERT INTO `tb_sub_bab_sop_tanpa_sub_bab` (`id_sub_bab_sop_tanpa_sub_bab`, `id`, `id_bab_utama_sop`, `id_sub_bab_sop`, `dasar_hukum`, `persyaratan`, `biaya`, `waktu`, `keterangan`, `tanggal_pembuatan`) VALUES
(10, 17, 16, 8, '<p><strong>Dasar Hukum satu</strong></p>\r\n', '<p><strong>Persyaratan dua</strong></p>\r\n', '<p><strong>Biaya tiga</strong></p>\r\n', '<p><strong>Waktu empat</strong></p>\r\n', '<p><strong>Keterangan lima</strong></p>\r\n', '2022-05-22 06:29:41'),
(11, 17, 16, 9, '<p>dasar hukum</p>\r\n', '<p>persyaratan</p>\r\n', '<p>biaya</p>\r\n', '<p>waktu</p>\r\n', '<p>keterangan</p>\r\n', '2022-05-22 07:14:25'),
(12, 17, 16, 10, '<p>DasDas</p>\r\n', '<p>PerPer</p>\r\n', '<p>BiaBia</p>\r\n', '<p>WaktWakt</p>\r\n', '<p>KetKte</p>\r\n', '2022-05-31 07:41:40'),
(13, 17, 24, 14, '<p>sub bab</p>\r\n', '<p>sub bab</p>\r\n', '<p>sub bab</p>\r\n', '<p>v</p>\r\n', '<p>sub bab</p>\r\n', '2022-06-06 08:07:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_anak_sub_anak_sub_bab_sop`
--
ALTER TABLE `tb_anak_sub_anak_sub_bab_sop`
  ADD PRIMARY KEY (`id_anak_sub_anak_sub_bab_so`);

--
-- Indexes for table `tb_anak_sub_anak_sub_bab_sop_tanpa_sub_bab`
--
ALTER TABLE `tb_anak_sub_anak_sub_bab_sop_tanpa_sub_bab`
  ADD PRIMARY KEY (`id_anak_sub_anak_sub_bab_sop_tanpa_sub_bab`);

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
-- Indexes for table `tb_profil_kantor`
--
ALTER TABLE `tb_profil_kantor`
  ADD PRIMARY KEY (`id_profil_kantor`);

--
-- Indexes for table `tb_profil_penulis`
--
ALTER TABLE `tb_profil_penulis`
  ADD PRIMARY KEY (`id_profil_penulis`);

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
-- Indexes for table `tb_sub_anak_sub_bab_sop_tanpa_sub_bab`
--
ALTER TABLE `tb_sub_anak_sub_bab_sop_tanpa_sub_bab`
  ADD PRIMARY KEY (`id_sub_anak_sub_bab_sop_tanpa_sub_bab`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_anak_sub_anak_sub_bab_sop`
--
ALTER TABLE `tb_anak_sub_anak_sub_bab_sop`
  MODIFY `id_anak_sub_anak_sub_bab_so` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_anak_sub_anak_sub_bab_sop_tanpa_sub_bab`
--
ALTER TABLE `tb_anak_sub_anak_sub_bab_sop_tanpa_sub_bab`
  MODIFY `id_anak_sub_anak_sub_bab_sop_tanpa_sub_bab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tb_anak_sub_bab_sop`
--
ALTER TABLE `tb_anak_sub_bab_sop`
  MODIFY `id_anak_sub_bab_sop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_anak_sub_bab_sop_tanpa_sub_bab`
--
ALTER TABLE `tb_anak_sub_bab_sop_tanpa_sub_bab`
  MODIFY `id_anak_sub_bab_sop_tanpa_sub_bab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_bab_utama_sop`
--
ALTER TABLE `tb_bab_utama_sop`
  MODIFY `id_bab_utama_sop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tb_bab_utama_sop_tanpa_sub_bab`
--
ALTER TABLE `tb_bab_utama_sop_tanpa_sub_bab`
  MODIFY `id_bab_utama_sop_tanpa_sub_bab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tb_nama_uu`
--
ALTER TABLE `tb_nama_uu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_pasal`
--
ALTER TABLE `tb_pasal`
  MODIFY `id_pasal` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_profil_kantor`
--
ALTER TABLE `tb_profil_kantor`
  MODIFY `id_profil_kantor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_profil_penulis`
--
ALTER TABLE `tb_profil_penulis`
  MODIFY `id_profil_penulis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_sk_pra_bab_pasal`
--
ALTER TABLE `tb_sk_pra_bab_pasal`
  MODIFY `id_sk_pra_bab` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_sub_anak_sub_bab_sop`
--
ALTER TABLE `tb_sub_anak_sub_bab_sop`
  MODIFY `id_sub_anak_sub_bab_sop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_sub_anak_sub_bab_sop_tanpa_sub_bab`
--
ALTER TABLE `tb_sub_anak_sub_bab_sop_tanpa_sub_bab`
  MODIFY `id_sub_anak_sub_bab_sop_tanpa_sub_bab` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_sub_bab_sop`
--
ALTER TABLE `tb_sub_bab_sop`
  MODIFY `id_sub_bab_sop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tb_sub_bab_sop_tanpa_sub_bab`
--
ALTER TABLE `tb_sub_bab_sop_tanpa_sub_bab`
  MODIFY `id_sub_bab_sop_tanpa_sub_bab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
