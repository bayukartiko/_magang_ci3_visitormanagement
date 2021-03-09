-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2021 at 10:20 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magang_ci3_visitormanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `user_id` varchar(128) DEFAULT NULL,
  `id_event` varchar(255) DEFAULT NULL,
  `status` enum('visitor_telah_masuk_event','visitor_telah_keluar_event','adalah_staff') DEFAULT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `user_id`, `id_event`, `status`, `ip_address`, `timestamp`, `data`) VALUES
('f93lv6o9gb9dgk7ijumm8niltgju2vpj', NULL, NULL, NULL, '::1', 1615194611, 0x73756b7365737c733a32383a22416e646120737564616820626572686173696c206b656c7561722021223b5f5f63695f766172737c613a313a7b733a363a2273756b736573223b733a333a226e6577223b7d),
('g9937bsa45epgou2jh6b57ds47n89gav', NULL, NULL, NULL, '::1', 1614570423, ''),
('hm2st0blkkem6bl55cf5pje5q6ph6s34', NULL, NULL, NULL, '::1', 1615281619, 0x73756b7365737c733a32383a22416e646120737564616820626572686173696c206b656c7561722021223b5f5f63695f766172737c613a313a7b733a363a2273756b736573223b733a333a226f6c64223b7d),
('inchflpnd3hnif6urcufdk5ge3l67nl6', NULL, NULL, NULL, '::1', 1615219328, ''),
('jvsr52qgaav01vs28f6abql95psegbj8', NULL, NULL, NULL, '::1', 1615184323, ''),
('kd3oh1nhijvk7asg01sd69ook9cas646', NULL, NULL, NULL, '::1', 1614903998, ''),
('vedapqhborpfb9f9cutqv47foe0gvb4b', NULL, NULL, NULL, '::1', 1615264570, '');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_area`
--

CREATE TABLE `tabel_area` (
  `id_area` varchar(255) NOT NULL,
  `id_event` varchar(255) DEFAULT NULL,
  `nama_area` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_area`
--

INSERT INTO `tabel_area` (`id_area`, `id_event`, `nama_area`) VALUES
('AR21021468164400000010', 'EVNT2102146814270000001', 'areaA'),
('AR21021468164400000011', 'EVNT2102146814270000001', 'areaB'),
('AR21021468164400000012', 'EVNT2102146814270000001', 'areaC');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_event`
--

CREATE TABLE `tabel_event` (
  `id_event` varchar(255) NOT NULL,
  `nama_event` varchar(255) NOT NULL,
  `custom_url` varchar(255) NOT NULL,
  `gambar_qrcode` varchar(255) NOT NULL,
  `tanggal_dibuka` date NOT NULL,
  `tanggal_ditutup` date NOT NULL,
  `jam_dibuka` time NOT NULL,
  `jam_ditutup` time NOT NULL,
  `status` enum('active','not_active') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_event`
--

INSERT INTO `tabel_event` (`id_event`, `nama_event`, `custom_url`, `gambar_qrcode`, `tanggal_dibuka`, `tanggal_ditutup`, `jam_dibuka`, `jam_ditutup`, `status`) VALUES
('EVNT2102146814270000001', 'Gelar Jepang Universitas Indonesia', 'gjui', 'EVNT2102146814270000001.png', '2021-02-16', '2021-03-09', '08:00:00', '23:00:00', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_role`
--

CREATE TABLE `tabel_role` (
  `role_id` int(10) NOT NULL,
  `nama_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_role`
--

INSERT INTO `tabel_role` (`role_id`, `nama_role`) VALUES
(1, 'admin'),
(2, 'petugas');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_staff`
--

CREATE TABLE `tabel_staff` (
  `staff_id` varchar(255) NOT NULL,
  `role_id` int(10) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `sedang_bertugas` tinyint(1) NOT NULL,
  `id_tugas` varchar(255) DEFAULT NULL,
  `verified` varchar(1) NOT NULL,
  `is_active` enum('online','offline') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_staff`
--

INSERT INTO `tabel_staff` (`staff_id`, `role_id`, `username`, `password`, `nama`, `sedang_bertugas`, `id_tugas`, `verified`, `is_active`) VALUES
('STF202101300925250000001', 1, 'admin', '$2y$10$giRYQKKvjOVEuGiozcCwVeVWOD2GGvwjLZzeVlPSl9Xv.ICsQ0FUu', 'bayu kartiko', 0, NULL, '1', 'offline'),
('STF202102011946130000002', 2, 'petugas1', '$2y$10$iW628pKXrvgtpjChzkPAmeFmKuEyyv0o8dqnt3Z.aeSLikqywK32e', 'petugas1', 1, 'TGS21021468178000000010', '1', 'offline'),
('STF202102031313020000003', 2, 'petugas2', '$2y$10$Bx4GsO4luPGFu0A0I2JLouaMdYmxeVq.HVp0ayvmDMkYLLGPZ/9qW', 'petugas2', 1, 'TGS21021468178000000011', '1', 'offline'),
('STF202102031313240000004', 2, 'petugas3', '$2y$10$jTti8PnyZp8hNJkYqA3Rgut3eaU5WMv6Yw32xbmy55orhZztllbsq', 'petugas3', 1, 'TGS21021468178000000012', '1', 'offline'),
('STF202102031314180000005', 2, 'petugas4', '$2y$10$KZxAVnfystO.zMGHjrd6CuvzSZM5Owga4K8EZsJlQmHENteprH2Zu', 'petugas4', 0, NULL, '1', 'offline'),
('STF202102031314360000006', 2, 'petugas5', '$2y$10$wuKg4zQ9OdRuprtJ43jalOpGzNjyKQVBbZLRbFX6tA2A6Y5qLUb9m', 'petugas5', 0, NULL, '1', 'offline'),
('STF202102040906150000007', 2, 'petugas6', '$2y$10$5WPE96/MAFuD3Ch5cvxRSeGeqQF6ZAaIp8eQotxyDBBx0ISCQ6Cf6', 'petugas6', 0, NULL, '1', 'offline'),
('STF202102040907200000008', 2, 'petugas7', '$2y$10$j4gky274DsmymOh9/YHYZucn1G2nnWEGTrH4yNtXTPs1Jh1elJ0KG', 'petugas7', 0, NULL, '1', 'offline'),
('STF202102041818440000009', 2, 'petugaspintukeluar1', '$2y$10$HgIAM1vjizSPnfJRBoFLD.tsk0WDPrz321b8klxqkVCUYa9oPbxHy', 'petugaspintukeluar1', 1, 'TGS2102146817800000001', '1', 'offline'),
('STF202102041819060000010', 2, 'petugaspintukeluar2', '$2y$10$qAdsLyZKUlE1eoG1ZjKOfu99QzSesWEe1Yay3ITZVYdQnuYl6jBtq', 'petugaspintukeluar2', 0, NULL, '1', 'offline'),
('STF202102051000500000011', 2, 'petugaspintukeluar3', '$2y$10$IIgYNdVXHYlW5AnO7Ar/YO4hyD66ldzv6c/QaKePPKTvbHiBt/G/.', 'petugaspintukeluar3', 0, NULL, '1', 'offline'),
('STF202102051001110000012', 2, 'petugaspintukeluar4', '$2y$10$Azr4GXo8n2Xqij4wIXhceO2GsyKLBbZ87l2AbhibX7tO3cx7eCJRu', 'petugaspintukeluar4', 0, NULL, '1', 'offline'),
('STF202102051001230000013', 2, 'petugaspintukeluar5', '$2y$10$28jfQMcn9SraZwzaYFjcpu.JQi9AecqeTyRtzzkdB8XGdskq8AVw2', 'petugaspintukeluar5', 0, NULL, '1', 'offline'),
('STF2102232334160000017', 1, 'admin5', '$2y$10$m1CwcRN0A2T1vai8hZUvcei7jz9gwvuKMFR6qu79SYmN1RGYL8tty', 'admin5', 0, NULL, '1', 'offline'),
('STF2102232700380000015', 1, 'admin3', '$2y$10$1B1n8b62xmbl1K9fMzkMUOXRe3kZzlP/PoNpNrJmeNHe/CcsUhORm', 'admin3', 0, NULL, '1', 'offline'),
('STF2102237670860000014', 1, 'admin2', '$2y$10$FOEGkxzl9eMawXlKxmSZ7.0gS3Ey/CRMpoG4MORP.IVWa4D2QhrGG', 'admin2', 0, NULL, '1', 'offline'),
('STF2102238367610000016', 1, 'admin4', '$2y$10$jyLWxMAcOtPcVOn1uGvbLugrQNOMHbeuV56/cDaC.xly2qGlZ2MZ6', 'admin4', 0, NULL, '1', 'offline');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_tracking`
--

CREATE TABLE `tabel_tracking` (
  `nomor` int(255) NOT NULL,
  `id_visitor` varchar(255) DEFAULT NULL,
  `id_event` varchar(255) DEFAULT NULL,
  `id_petugas_pintu_area` varchar(255) DEFAULT NULL,
  `id_area` varchar(255) DEFAULT NULL,
  `time_in_area` datetime NOT NULL,
  `time_out_area` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_tracking`
--

INSERT INTO `tabel_tracking` (`nomor`, `id_visitor`, `id_event`, `id_petugas_pintu_area`, `id_area`, `time_in_area`, `time_out_area`) VALUES
(54, 'VSTR2102160753260000001', 'EVNT2102146814270000001', 'STF202102011946130000002', 'AR21021468164400000010', '2021-02-14 12:53:29', '2021-02-16 09:48:17'),
(55, 'VSTR2102177412020000002', 'EVNT2102146814270000001', 'STF202102011946130000002', 'AR21021468164400000010', '2021-02-17 13:26:38', '2021-02-17 13:29:18'),
(56, 'VSTR2102177412020000002', 'EVNT2102146814270000001', 'STF202102011946130000002', 'AR21021468164400000011', '2021-02-16 13:29:25', '2021-02-17 13:34:06'),
(57, 'VSTR2103010040410000008', 'EVNT2102146814270000001', 'STF202102011946130000002', 'AR21021468164400000010', '2021-03-01 11:01:41', '2021-03-01 11:12:05'),
(58, 'VSTR2103010040410000008', 'EVNT2102146814270000001', 'STF202102011946130000002', 'AR21021468164400000010', '2021-03-01 11:12:13', '2021-03-01 11:53:13'),
(60, 'VSTR2103054091400000010', 'EVNT2102146814270000001', 'STF202102031313240000004', 'AR21021468164400000012', '2021-03-05 21:22:39', '2021-03-05 21:27:47'),
(61, 'VSTR2103054091400000010', 'EVNT2102146814270000001', 'STF202102011946130000002', 'AR21021468164400000010', '2021-03-05 21:29:47', '2021-03-05 21:30:00'),
(62, 'VSTR2103065986960000011', 'EVNT2102146814270000001', 'STF202102011946130000002', 'AR21021468164400000010', '2021-03-06 10:07:33', '2021-03-06 10:08:33'),
(63, 'VSTR2103065986960000011', 'EVNT2102146814270000001', 'STF202102031313020000003', 'AR21021468164400000011', '2021-03-06 10:11:10', '2021-03-06 10:12:44'),
(64, 'VSTR2103085040070000015', 'EVNT2102146814270000001', 'STF202102011946130000002', 'AR21021468164400000010', '2021-03-08 15:50:16', '2021-03-08 16:10:37'),
(67, 'VSTR2103083373440000016', 'EVNT2102146814270000001', 'STF202102031313240000004', 'AR21021468164400000012', '2021-03-08 21:06:01', '2021-03-08 21:23:48'),
(68, 'VSTR2103083373440000016', 'EVNT2102146814270000001', 'STF202102031313020000003', 'AR21021468164400000011', '2021-03-08 21:29:42', '2021-03-08 21:36:57'),
(69, 'VSTR2103083373440000016', 'EVNT2102146814270000001', 'STF202102011946130000002', 'AR21021468164400000010', '2021-03-08 21:36:58', '2021-03-08 22:00:07'),
(70, 'VSTR2103089383530000022', 'EVNT2102146814270000001', 'STF202102011946130000002', 'AR21021468164400000010', '2021-03-08 22:33:12', '2021-03-08 22:33:25');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_tugas_staff_petugas`
--

CREATE TABLE `tabel_tugas_staff_petugas` (
  `id_tugas` varchar(255) NOT NULL,
  `staff_id` varchar(255) DEFAULT NULL,
  `petugas_pintu_keluar` tinyint(1) NOT NULL,
  `petugas_pintu_area` tinyint(1) NOT NULL,
  `id_event` varchar(255) DEFAULT NULL,
  `id_area` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_tugas_staff_petugas`
--

INSERT INTO `tabel_tugas_staff_petugas` (`id_tugas`, `staff_id`, `petugas_pintu_keluar`, `petugas_pintu_area`, `id_event`, `id_area`) VALUES
('TGS2102146817800000001', 'STF202102041818440000009', 1, 0, 'EVNT2102146814270000001', NULL),
('TGS21021468178000000010', 'STF202102011946130000002', 0, 1, 'EVNT2102146814270000001', 'AR21021468164400000010'),
('TGS21021468178000000011', 'STF202102031313020000003', 0, 1, 'EVNT2102146814270000001', 'AR21021468164400000011'),
('TGS21021468178000000012', 'STF202102031313240000004', 0, 1, 'EVNT2102146814270000001', 'AR21021468164400000012');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_visitor`
--

CREATE TABLE `tabel_visitor` (
  `id_visitor` varchar(255) NOT NULL,
  `id_event` varchar(255) DEFAULT NULL,
  `nama_visitor` varchar(255) NOT NULL,
  `perusahaan_visitor` varchar(255) DEFAULT NULL,
  `jabatan_visitor` varchar(255) DEFAULT NULL,
  `email_visitor` varchar(255) NOT NULL,
  `email_perusahaan` varchar(255) DEFAULT NULL,
  `tlp_visitor` varchar(15) NOT NULL,
  `tlp_perusahaan` varchar(15) DEFAULT NULL,
  `alasan_ikut` text DEFAULT NULL,
  `gambar_qrcode` varchar(255) NOT NULL,
  `registered_at` datetime NOT NULL,
  `id_petugas_pintu_area` varchar(255) DEFAULT NULL,
  `id_petugas_pintu_keluar` varchar(255) DEFAULT NULL,
  `time_in_event` datetime NOT NULL,
  `time_out_event` datetime DEFAULT NULL,
  `status` enum('dalam_antrian_masuk_event','telah_masuk_event','didalam_area','telah_keluar_event') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_visitor`
--

INSERT INTO `tabel_visitor` (`id_visitor`, `id_event`, `nama_visitor`, `perusahaan_visitor`, `jabatan_visitor`, `email_visitor`, `email_perusahaan`, `tlp_visitor`, `tlp_perusahaan`, `alasan_ikut`, `gambar_qrcode`, `registered_at`, `id_petugas_pintu_area`, `id_petugas_pintu_keluar`, `time_in_event`, `time_out_event`, `status`) VALUES
('VSTR2102160753260000001', 'EVNT2102146814270000001', 'bayu kartiko', '', '', 'asd@asd.asd', '', '123', '', '', 'VSTR2102160753260000001.png', '2021-02-16 09:42:46', NULL, 'STF202102041818440000009', '2021-02-16 09:42:46', '2021-02-16 09:50:08', 'telah_keluar_event'),
('VSTR2102177412020000002', 'EVNT2102146814270000001', 'asd asd', '', '', 'asd@asd.asd', '', '123', '', '', 'VSTR2102177412020000002.png', '2021-02-17 11:58:00', NULL, 'STF202102041818440000009', '2021-02-17 11:58:00', '2021-02-17 13:34:06', 'telah_keluar_event'),
('VSTR2102185879930000004', 'EVNT2102146814270000001', 'rty ytr', '', '', 'asd@asd.asd', '', '123', '', '', 'VSTR2102185879930000004.png', '2021-02-18 13:49:03', NULL, NULL, '2021-02-18 13:49:03', '2021-02-18 14:00:18', 'telah_keluar_event'),
('VSTR2102186572610000003', 'EVNT2102146814270000001', 'qwe we', '', '', 'asd@asd.asd', '', '123', '', '', 'VSTR2102186572610000003.png', '2021-02-18 11:31:08', NULL, NULL, '2021-02-18 11:31:08', '2021-02-18 11:34:00', 'telah_keluar_event'),
('VSTR2102190326350000006', 'EVNT2102146814270000001', 'nmm m', '', '', 'asd@asd.asd', '', '123', '', '', 'VSTR2102190326350000006.png', '2021-02-19 19:29:27', NULL, NULL, '2021-02-19 19:29:27', '2021-02-19 19:31:01', 'telah_keluar_event'),
('VSTR2102194854600000005', 'EVNT2102146814270000001', 'iop po', '', '', 'asd@asd.asd', '', '123', '', '', 'VSTR2102194854600000005.png', '2021-02-19 19:19:31', NULL, NULL, '2021-02-19 19:19:31', '2021-02-19 19:21:07', 'telah_keluar_event'),
('VSTR2102203756750000007', 'EVNT2102146814270000001', 'fgh h', '', '', 'asd@asd.asd', '', '123', '', '', 'VSTR2102203756750000007.png', '2021-02-20 10:36:06', NULL, 'STF202102041818440000009', '2021-02-20 10:36:06', '2021-02-20 10:36:51', 'telah_keluar_event'),
('VSTR2103010040410000008', 'EVNT2102146814270000001', 'bayu K', '', '', 'asd@asd.asd', 'asd@asd.asd', '123', '', '', 'VSTR2103010040410000008.png', '2021-03-01 10:44:34', NULL, 'STF202102041818440000009', '2021-03-01 10:44:34', '2021-03-01 11:04:11', 'telah_keluar_event'),
('VSTR2103017187430000010', 'EVNT2102146814270000001', 'a s', '', '', 'asd@asd.asd', 'asd@asd.asd', '123', '', '', 'VSTR2103017187430000010.png', '2021-03-01 13:35:31', NULL, NULL, '2021-03-01 13:35:31', '2021-03-01 13:50:07', 'telah_keluar_event'),
('VSTR2103054091400000010', 'EVNT2102146814270000001', 'coba 1', '', '', 'asd@asd.asd', '', '123', '', '', 'VSTR2103054091400000010.png', '2021-03-05 21:01:41', NULL, 'STF202102041818440000009', '2021-03-05 21:01:41', '2021-03-05 21:31:58', 'telah_keluar_event'),
('VSTR2103062754840000012', 'EVNT2102146814270000001', 'q l', '', '', 'asd@asd.asd', '', '123', '', '', 'VSTR2103062754840000012.png', '2021-03-06 13:28:51', NULL, 'STF202102041818440000009', '2021-03-06 13:28:51', '2021-03-06 13:29:49', 'telah_keluar_event'),
('VSTR2103062931970000014', 'EVNT2102146814270000001', 'a d', '', '', 'asd@asd.asd', 'asd@asd.asd', '123', '', '', 'VSTR2103062931970000014.png', '2021-03-06 16:38:39', NULL, 'STF202102041818440000009', '2021-03-06 16:38:39', '2021-03-06 19:34:18', 'telah_keluar_event'),
('VSTR2103065986960000011', 'EVNT2102146814270000001', 'a d', '', '', 'asd@asd.asd', 'asd@asd.asd', '123', '', '', 'VSTR2103065986960000011.png', '2021-03-06 10:06:27', NULL, 'STF202102041818440000009', '2021-03-06 10:06:27', '2021-03-06 10:12:44', 'telah_keluar_event'),
('VSTR2103066412100000013', 'EVNT2102146814270000001', 'coba 2', '', '', 'qwerty@qwerty.qwerty', '', '123', '', '', 'VSTR2103066412100000013.png', '2021-03-06 14:26:41', NULL, 'STF202102041818440000009', '2021-03-06 14:26:41', '2021-03-06 14:27:13', 'telah_keluar_event'),
('VSTR2103080832560000020', 'EVNT2102146814270000001', 'coba 8', '', '', 'asd@asd.asd', '', '123', '', '', 'VSTR2103080832560000020.png', '2021-03-08 22:14:33', NULL, 'STF202102041818440000009', '2021-03-08 22:14:33', '2021-03-08 22:18:01', 'telah_keluar_event'),
('VSTR2103080886990000018', 'EVNT2102146814270000001', 'coba 6', '', '', 'asd@asd.asd', '', '123', '', '', 'VSTR2103080886990000018.png', '2021-03-08 22:09:50', NULL, 'STF202102041818440000009', '2021-03-08 22:09:50', '2021-03-08 22:10:57', 'telah_keluar_event'),
('VSTR2103081243630000024', 'EVNT2102146814270000001', 'coba 12', '', '', 'asd@asd.asd', '', '123', '', '', 'VSTR2103081243630000024.png', '2021-03-08 22:39:53', NULL, 'STF202102041818440000009', '2021-03-08 22:39:53', '2021-03-08 22:40:39', 'telah_keluar_event'),
('VSTR2103081999700000017', 'EVNT2102146814270000001', 'coba 5', '', '', 'asd@asd.asd', '', '123', '', '', 'VSTR2103081999700000017.png', '2021-03-08 22:07:58', NULL, 'STF202102041818440000009', '2021-03-08 22:07:58', '2021-03-08 22:09:06', 'telah_keluar_event'),
('VSTR2103082016620000019', 'EVNT2102146814270000001', 'coba 7', '', '', 'asd@asd.asd', '', '123', '', '', 'VSTR2103082016620000019.png', '2021-03-08 22:11:54', NULL, 'STF202102041818440000009', '2021-03-08 22:11:54', '2021-03-08 22:12:05', 'telah_keluar_event'),
('VSTR2103083373440000016', 'EVNT2102146814270000001', 'coba 4', '', '', 'asd@asd.asd', '', '123', '', '', 'VSTR2103083373440000016.png', '2021-03-08 20:59:39', NULL, NULL, '2021-03-08 20:59:39', '2021-03-08 22:00:08', 'telah_keluar_event'),
('VSTR2103083697740000026', 'EVNT2102146814270000001', 'coba 14', '', '', 'asd@asd.asd', '', '123', '', '', 'VSTR2103083697740000026.png', '2021-03-08 22:42:42', NULL, 'STF202102041818440000009', '2021-03-08 22:42:42', '2021-03-08 22:42:59', 'telah_keluar_event'),
('VSTR2103084396880000027', 'EVNT2102146814270000001', 'coba 15', '', '', 'asd@asd.asd', '', '123', '', '', 'VSTR2103084396880000027.png', '2021-03-08 22:45:20', NULL, 'STF202102041818440000009', '2021-03-08 22:45:20', '2021-03-08 22:45:42', 'telah_keluar_event'),
('VSTR2103084875320000025', 'EVNT2102146814270000001', 'coba 13', '', '', 'asd@asd.asd', '', '123', '', '', 'VSTR2103084875320000025.png', '2021-03-08 22:41:44', NULL, 'STF202102041818440000009', '2021-03-08 22:41:44', '2021-03-08 22:42:04', 'telah_keluar_event'),
('VSTR2103085040070000015', 'EVNT2102146814270000001', 'q w', '', '', 'asd@asd.asd', '', '123', '', '', 'VSTR2103085040070000015.png', '2021-03-08 15:50:00', NULL, 'STF202102041818440000009', '2021-03-08 15:50:00', '2021-03-08 20:44:40', 'telah_keluar_event'),
('VSTR2103088108960000028', 'EVNT2102146814270000001', 'coba 16', '', '', 'asd@asd.asd', '', '123', '', '', 'VSTR2103088108960000028.png', '2021-03-08 22:46:59', NULL, 'STF202102041818440000009', '2021-03-08 22:46:59', '2021-03-08 22:52:53', 'telah_keluar_event'),
('VSTR2103088566150000023', 'EVNT2102146814270000001', 'coba 11', '', '', 'asd@asd.asd', '', '123', '', '', 'VSTR2103088566150000023.png', '2021-03-08 22:39:02', NULL, 'STF202102041818440000009', '2021-03-08 22:39:02', '2021-03-08 22:39:23', 'telah_keluar_event'),
('VSTR2103088964530000021', 'EVNT2102146814270000001', 'coba 9', '', '', 'asd@asd.asd', '', '123', '', '', 'VSTR2103088964530000021.png', '2021-03-08 22:19:47', NULL, 'STF202102041818440000009', '2021-03-08 22:19:47', '2021-03-08 22:20:17', 'telah_keluar_event'),
('VSTR2103089360230000029', 'EVNT2102146814270000001', 'coba 17', '', '', 'jkl@jlkl.jkl', '', '123', '', '', 'VSTR2103089360230000029.png', '2021-03-08 22:56:08', NULL, 'STF202102041818440000009', '2021-03-08 22:56:08', '2021-03-08 22:56:24', 'telah_keluar_event'),
('VSTR2103089383530000022', 'EVNT2102146814270000001', 'coba 10', '', '', 'asd@asd.asd', '', '123', '', '', 'VSTR2103089383530000022.png', '2021-03-08 22:32:37', NULL, 'STF202102041818440000009', '2021-03-08 22:32:37', '2021-03-08 22:33:56', 'telah_keluar_event'),
('VSTR2103093110840000032', 'EVNT2102146814270000001', 'coba 20', '', '', 'asd@asd.asd', '', '123', '', '', 'VSTR2103093110840000032.png', '2021-03-09 11:31:34', NULL, 'STF202102041818440000009', '2021-03-09 11:31:34', '2021-03-09 11:32:00', 'telah_keluar_event'),
('VSTR2103094153990000034', 'EVNT2102146814270000001', 'coba 22', '', '', 'asd@asd.asd', '', '123', '', '', 'VSTR2103094153990000034.png', '2021-03-09 11:34:20', NULL, 'STF202102041818440000009', '2021-03-09 11:34:20', '2021-03-09 11:34:32', 'telah_keluar_event'),
('VSTR2103095732790000031', 'EVNT2102146814270000001', 'coba 19', '', '', 'asd@asd.asd', '', '123', '', '', 'VSTR2103095732790000031.png', '2021-03-09 11:26:24', NULL, 'STF202102041818440000009', '2021-03-09 11:26:24', '2021-03-09 11:26:39', 'telah_keluar_event'),
('VSTR2103097258920000033', 'EVNT2102146814270000001', 'coba 21', '', '', 'asd@asd.asd', '', '123', '', '', 'VSTR2103097258920000033.png', '2021-03-09 11:33:49', NULL, 'STF202102041818440000009', '2021-03-09 11:33:49', '2021-03-09 11:34:00', 'telah_keluar_event'),
('VSTR2103098319350000030', 'EVNT2102146814270000001', 'coba 18', '', '', 'asd@asd.asd', '', '123', '', '', 'VSTR2103098319350000030.png', '2021-03-09 11:24:45', NULL, 'STF202102041818440000009', '2021-03-09 11:24:45', '2021-03-09 11:25:47', 'telah_keluar_event');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `tabel_area`
--
ALTER TABLE `tabel_area`
  ADD PRIMARY KEY (`id_area`),
  ADD KEY `id_event` (`id_event`);

--
-- Indexes for table `tabel_event`
--
ALTER TABLE `tabel_event`
  ADD PRIMARY KEY (`id_event`);

--
-- Indexes for table `tabel_role`
--
ALTER TABLE `tabel_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tabel_staff`
--
ALTER TABLE `tabel_staff`
  ADD PRIMARY KEY (`staff_id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `id_tugas` (`id_tugas`);

--
-- Indexes for table `tabel_tracking`
--
ALTER TABLE `tabel_tracking`
  ADD PRIMARY KEY (`nomor`),
  ADD KEY `id_visitor` (`id_visitor`),
  ADD KEY `id_area` (`id_area`),
  ADD KEY `id_event` (`id_petugas_pintu_area`),
  ADD KEY `id_event_2` (`id_event`);

--
-- Indexes for table `tabel_tugas_staff_petugas`
--
ALTER TABLE `tabel_tugas_staff_petugas`
  ADD PRIMARY KEY (`id_tugas`),
  ADD KEY `staff_id` (`staff_id`),
  ADD KEY `id_event` (`id_event`),
  ADD KEY `id_area` (`id_area`);

--
-- Indexes for table `tabel_visitor`
--
ALTER TABLE `tabel_visitor`
  ADD PRIMARY KEY (`id_visitor`),
  ADD KEY `id_event` (`id_event`),
  ADD KEY `id_petugas_pintu_area` (`id_petugas_pintu_area`),
  ADD KEY `id_petugas_pintu_keluar` (`id_petugas_pintu_keluar`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_role`
--
ALTER TABLE `tabel_role`
  MODIFY `role_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tabel_tracking`
--
ALTER TABLE `tabel_tracking`
  MODIFY `nomor` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tabel_area`
--
ALTER TABLE `tabel_area`
  ADD CONSTRAINT `tabel_area_ibfk_1` FOREIGN KEY (`id_event`) REFERENCES `tabel_event` (`id_event`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `tabel_staff`
--
ALTER TABLE `tabel_staff`
  ADD CONSTRAINT `tabel_staff_ibfk_3` FOREIGN KEY (`role_id`) REFERENCES `tabel_role` (`role_id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `tabel_staff_ibfk_4` FOREIGN KEY (`id_tugas`) REFERENCES `tabel_tugas_staff_petugas` (`id_tugas`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `tabel_tracking`
--
ALTER TABLE `tabel_tracking`
  ADD CONSTRAINT `tabel_tracking_ibfk_1` FOREIGN KEY (`id_area`) REFERENCES `tabel_area` (`id_area`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `tabel_tracking_ibfk_2` FOREIGN KEY (`id_visitor`) REFERENCES `tabel_visitor` (`id_visitor`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `tabel_tracking_ibfk_3` FOREIGN KEY (`id_petugas_pintu_area`) REFERENCES `tabel_staff` (`staff_id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `tabel_tracking_ibfk_4` FOREIGN KEY (`id_event`) REFERENCES `tabel_event` (`id_event`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `tabel_tugas_staff_petugas`
--
ALTER TABLE `tabel_tugas_staff_petugas`
  ADD CONSTRAINT `tabel_tugas_staff_petugas_ibfk_1` FOREIGN KEY (`id_event`) REFERENCES `tabel_event` (`id_event`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `tabel_tugas_staff_petugas_ibfk_2` FOREIGN KEY (`id_area`) REFERENCES `tabel_area` (`id_area`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `tabel_tugas_staff_petugas_ibfk_3` FOREIGN KEY (`staff_id`) REFERENCES `tabel_staff` (`staff_id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `tabel_visitor`
--
ALTER TABLE `tabel_visitor`
  ADD CONSTRAINT `tabel_visitor_ibfk_1` FOREIGN KEY (`id_event`) REFERENCES `tabel_event` (`id_event`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `tabel_visitor_ibfk_2` FOREIGN KEY (`id_petugas_pintu_area`) REFERENCES `tabel_staff` (`staff_id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `tabel_visitor_ibfk_3` FOREIGN KEY (`id_petugas_pintu_keluar`) REFERENCES `tabel_staff` (`staff_id`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
