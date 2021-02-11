-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2021 at 05:10 PM
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
  `status` enum('visitor_telah_masuk_event','visitor_telah_keluar_event','adalah_staff') DEFAULT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `user_id`, `status`, `ip_address`, `timestamp`, `data`) VALUES
('ppnajdo5lnn5vtit10e7v04u100vtloi', NULL, NULL, '::1', 1613059747, 0x736564616e675f62657274756761737c733a313a2231223b69645f74756761737c733a32323a2254475330363032323132313432343130303030303031223b73756b7365737c733a32383a22416e646120737564616820626572686173696c206b656c7561722021223b5f5f63695f766172737c613a313a7b733a363a2273756b736573223b733a333a226f6c64223b7d),
('tt2940ubb0q1mkkhhref2furvr03d491', NULL, NULL, '::1', 1613059740, '');

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
('AR06022121424100000010', 'EVNT0602212142410000002', 'areaA'),
('AR06022121424100000011', 'EVNT0602212142410000002', 'areaB'),
('AR06022121424100000012', 'EVNT0602212142410000002', 'areaC');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_event`
--

CREATE TABLE `tabel_event` (
  `id_event` varchar(255) NOT NULL,
  `nama_event` varchar(255) NOT NULL,
  `tanggal_dibuka` datetime NOT NULL,
  `tanggal_ditutup` datetime NOT NULL,
  `status` enum('active','not_active') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_event`
--

INSERT INTO `tabel_event` (`id_event`, `nama_event`, `tanggal_dibuka`, `tanggal_ditutup`, `status`) VALUES
('EVNT0602212142410000002', 'Gelar Jepang Universitas Indonesia', '2021-02-06 21:42:00', '2021-02-14 21:42:00', 'active'),
('EVNT202001210000001', 'event uji coba', '2021-01-21 12:20:19', '2021-01-24 12:20:19', 'active');

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
('STF202102011946130000002', 2, 'petugas1', '$2y$10$iW628pKXrvgtpjChzkPAmeFmKuEyyv0o8dqnt3Z.aeSLikqywK32e', 'petugas1', 1, 'TGS06022121424100000010', '1', 'offline'),
('STF202102031313020000003', 2, 'petugas2', '$2y$10$Bx4GsO4luPGFu0A0I2JLouaMdYmxeVq.HVp0ayvmDMkYLLGPZ/9qW', 'petugas2', 1, 'TGS06022121424100000011', '1', 'offline'),
('STF202102031313240000004', 2, 'petugas3', '$2y$10$jTti8PnyZp8hNJkYqA3Rgut3eaU5WMv6Yw32xbmy55orhZztllbsq', 'petugas3', 1, 'TGS06022121424100000012', '1', 'offline'),
('STF202102031314180000005', 2, 'petugas4', '$2y$10$KZxAVnfystO.zMGHjrd6CuvzSZM5Owga4K8EZsJlQmHENteprH2Zu', 'petugas4', 0, NULL, '1', 'offline'),
('STF202102031314360000006', 2, 'petugas5', '$2y$10$wuKg4zQ9OdRuprtJ43jalOpGzNjyKQVBbZLRbFX6tA2A6Y5qLUb9m', 'petugas5', 0, NULL, '1', 'offline'),
('STF202102040906150000007', 2, 'petugas6', '$2y$10$5WPE96/MAFuD3Ch5cvxRSeGeqQF6ZAaIp8eQotxyDBBx0ISCQ6Cf6', 'petugas6', 0, NULL, '1', 'offline'),
('STF202102040907200000008', 2, 'petugas7', '$2y$10$j4gky274DsmymOh9/YHYZucn1G2nnWEGTrH4yNtXTPs1Jh1elJ0KG', 'petugas7', 0, NULL, '1', 'offline'),
('STF202102041818440000009', 2, 'petugaspintukeluar1', '$2y$10$HgIAM1vjizSPnfJRBoFLD.tsk0WDPrz321b8klxqkVCUYa9oPbxHy', 'petugaspintukeluar1', 1, 'TGS0602212142410000001', '1', 'offline'),
('STF202102041819060000010', 2, 'petugaspintukeluar2', '$2y$10$qAdsLyZKUlE1eoG1ZjKOfu99QzSesWEe1Yay3ITZVYdQnuYl6jBtq', 'petugaspintukeluar2', 0, NULL, '1', 'offline'),
('STF202102051000500000011', 2, 'petugaspintukeluar3', '$2y$10$IIgYNdVXHYlW5AnO7Ar/YO4hyD66ldzv6c/QaKePPKTvbHiBt/G/.', 'petugaspintukeluar3', 0, NULL, '1', 'offline'),
('STF202102051001110000012', 2, 'petugaspintukeluar4', '$2y$10$Azr4GXo8n2Xqij4wIXhceO2GsyKLBbZ87l2AbhibX7tO3cx7eCJRu', 'petugaspintukeluar4', 0, NULL, '1', 'offline'),
('STF202102051001230000013', 2, 'petugaspintukeluar5', '$2y$10$28jfQMcn9SraZwzaYFjcpu.JQi9AecqeTyRtzzkdB8XGdskq8AVw2', 'petugaspintukeluar5', 0, NULL, '1', 'offline');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_tracking`
--

CREATE TABLE `tabel_tracking` (
  `nomor` int(255) NOT NULL,
  `id_visitor` varchar(255) DEFAULT NULL,
  `id_petugas_pintu_area` varchar(255) DEFAULT NULL,
  `id_area` varchar(255) DEFAULT NULL,
  `time_in_area` datetime NOT NULL,
  `time_out_area` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_tracking`
--

INSERT INTO `tabel_tracking` (`nomor`, `id_visitor`, `id_petugas_pintu_area`, `id_area`, `time_in_area`, `time_out_area`) VALUES
(31, 'VSTR2102095708120000007', 'STF202102011946130000002', 'AR06022121424100000010', '2021-02-09 13:33:03', '2021-02-09 13:33:14'),
(32, 'VSTR2102095708120000007', 'STF202102011946130000002', 'AR06022121424100000010', '2021-02-09 13:33:17', '2021-02-09 13:33:48'),
(33, 'VSTR2102095708120000007', 'STF202102031313020000003', 'AR06022121424100000011', '2021-02-09 13:33:48', '2021-02-09 13:34:55'),
(34, 'VSTR2102094490430000008', 'STF202102011946130000002', 'AR06022121424100000010', '2021-02-09 22:54:33', '2021-02-09 22:55:23'),
(35, 'VSTR2102094490430000008', 'STF202102011946130000002', 'AR06022121424100000010', '2021-02-09 22:55:52', '2021-02-09 22:56:00'),
(36, 'VSTR2102094490430000008', 'STF202102011946130000002', 'AR06022121424100000010', '2021-02-09 22:57:18', '2021-02-09 22:57:23'),
(37, 'VSTR2102094490430000008', 'STF202102011946130000002', 'AR06022121424100000010', '2021-02-09 22:58:14', '2021-02-09 22:58:30'),
(38, 'VSTR2102094490430000008', 'STF202102011946130000002', 'AR06022121424100000010', '2021-02-09 23:01:25', '2021-02-09 23:08:26'),
(39, 'VSTR2102100205820000009', 'STF202102011946130000002', 'AR06022121424100000010', '2021-02-10 10:14:13', '2021-02-10 10:47:21'),
(40, 'VSTR2102100205820000009', 'STF202102011946130000002', 'AR06022121424100000010', '2021-02-10 10:47:30', '2021-02-10 10:56:56'),
(41, 'VSTR2102100205820000009', 'STF202102011946130000002', 'AR06022121424100000010', '2021-02-10 10:57:02', '2021-02-10 10:57:19'),
(42, 'VSTR2102100205820000009', 'STF202102031313020000003', 'AR06022121424100000011', '2021-02-10 10:57:19', '2021-02-10 10:57:34'),
(43, 'VSTR2102100205820000009', 'STF202102031313020000003', 'AR06022121424100000011', '2021-02-10 10:59:30', '2021-02-10 11:00:02'),
(44, 'VSTR2102106372810000010', 'STF202102011946130000002', 'AR06022121424100000010', '2021-02-10 11:13:37', '2021-02-10 11:14:00'),
(45, 'VSTR2102106423900000011', 'STF202102011946130000002', 'AR06022121424100000010', '2021-02-10 13:29:27', '2021-02-10 13:29:40'),
(46, 'VSTR2102106423900000011', 'STF202102011946130000002', 'AR06022121424100000010', '2021-02-10 13:30:31', '2021-02-10 13:30:48'),
(47, 'VSTR2102106423900000011', 'STF202102031313020000003', 'AR06022121424100000011', '2021-02-10 13:30:48', '2021-02-10 13:31:36'),
(48, 'VSTR2102101822250000012', 'STF202102011946130000002', 'AR06022121424100000010', '2021-02-10 13:47:09', '2021-02-10 13:47:24'),
(49, 'VSTR2102101822250000012', 'STF202102011946130000002', 'AR06022121424100000010', '2021-02-10 13:47:35', '2021-02-10 13:48:02'),
(50, 'VSTR2102101822250000012', 'STF202102031313020000003', 'AR06022121424100000011', '2021-02-10 13:48:02', '2021-02-10 13:52:14'),
(51, 'VSTR2102105834470000013', 'STF202102011946130000002', 'AR06022121424100000010', '2021-02-10 22:26:54', '2021-02-10 22:50:41'),
(52, 'VSTR2102118361420000019', 'STF202102011946130000002', 'AR06022121424100000010', '2021-02-11 22:14:41', '2021-02-11 22:21:18'),
(53, 'VSTR2102116876140000021', 'STF202102011946130000002', 'AR06022121424100000010', '2021-02-11 22:52:52', '2021-02-11 22:55:06');

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
('TGS0602212142410000001', 'STF202102041818440000009', 1, 0, 'EVNT0602212142410000002', NULL),
('TGS06022121424100000010', 'STF202102011946130000002', 0, 1, 'EVNT0602212142410000002', 'AR06022121424100000010'),
('TGS06022121424100000011', 'STF202102031313020000003', 0, 1, 'EVNT0602212142410000002', 'AR06022121424100000011'),
('TGS06022121424100000012', 'STF202102031313240000004', 0, 1, 'EVNT0602212142410000002', 'AR06022121424100000012');

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
  `time_out_event` datetime NOT NULL,
  `status` enum('dalam_antrian_masuk_event','telah_masuk_event','didalam_area','telah_keluar_event') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_visitor`
--

INSERT INTO `tabel_visitor` (`id_visitor`, `id_event`, `nama_visitor`, `perusahaan_visitor`, `jabatan_visitor`, `email_visitor`, `email_perusahaan`, `tlp_visitor`, `tlp_perusahaan`, `alasan_ikut`, `gambar_qrcode`, `registered_at`, `id_petugas_pintu_area`, `id_petugas_pintu_keluar`, `time_in_event`, `time_out_event`, `status`) VALUES
('VSTR2102082758210000004', 'EVNT202001210000001', 'rty rty', 'rty', 'rty', 'asd@asd.asd', 'asd@asd.asd', '123', '123', 'asd', 'VSTR2102082758210000004.png', '2021-02-08 17:00:30', NULL, 'STF202102041818440000009', '2021-02-08 17:00:30', '2021-02-08 21:45:01', 'telah_keluar_event'),
('VSTR2102086184680000002', 'EVNT202001210000001', 'qwe ewq', 'qwe', 'qwe', 'asd@asd.asd', 'asd@asd.asd', '123', '123', 'asd', 'VSTR2102086184680000002.png', '2021-02-08 13:48:24', NULL, 'STF202102041818440000009', '2021-02-08 13:48:24', '2021-02-08 13:48:59', 'telah_keluar_event'),
('VSTR2102088847000000003', 'EVNT202001210000001', 'bayu ka', 'asd', 'asd', 'asd@asd.asd', 'asd@asd.asd', '123', '123', 'asd', 'VSTR2102088847000000003.png', '2021-02-08 16:30:29', NULL, 'STF202102041818440000009', '2021-02-08 16:30:29', '2021-02-08 16:50:49', 'telah_keluar_event'),
('VSTR2102089144450000005', 'EVNT202001210000001', 'jkl lkj', 'asd', 'asd', 'asd@asd.asd', 'asd@asd.asd', '123', '123', 'asd', 'VSTR2102089144450000005.png', '2021-02-08 21:47:15', NULL, 'STF202102041818440000009', '2021-02-08 21:47:15', '2021-02-08 22:49:00', 'telah_keluar_event'),
('VSTR2102089985770000001', 'EVNT202001210000001', 'asd dsa', 'asd', 'asd', 'asd@asd.asd', 'asd@asd.asd', '123', '123', 'asd', 'VSTR2102089985770000001.png', '2021-02-08 13:44:44', NULL, 'STF202102041818440000009', '2021-02-08 13:44:44', '2021-02-08 13:46:21', 'telah_keluar_event'),
('VSTR2102090103040000006', 'EVNT202001210000001', 'zxc cxz', 'asd', 'asd', 'asd@asd.asd', 'asd@asd.asd', '123', '123', 'zxc', 'VSTR2102090103040000006.png', '2021-02-09 11:11:35', NULL, 'STF202102041818440000009', '2021-02-09 11:11:35', '2021-02-09 11:21:16', 'telah_keluar_event'),
('VSTR2102094490430000008', 'EVNT202001210000001', 'asd asd', 'asd', 'asd', 'asd@asd.asd', 'asd@asd.asd', '123', '123', 'asd', 'VSTR2102094490430000008.png', '2021-02-09 22:54:13', NULL, 'STF202102041818440000009', '2021-02-09 22:54:13', '2021-02-09 23:08:26', 'telah_keluar_event'),
('VSTR2102095708120000007', 'EVNT202001210000001', 'rty rty', 'rty', 'rty', 'asd@asd.asd', 'asd@asd.asd', '123', '123', 'rty', 'VSTR2102095708120000007.png', '2021-02-09 13:25:00', NULL, 'STF202102041818440000009', '2021-02-09 13:25:00', '2021-02-09 13:34:55', 'telah_keluar_event'),
('VSTR2102100205820000009', 'EVNT202001210000001', 'bayu k', 'asd', 'asd', 'asd@asd.asd', 'asd@asd.asd', '123', '123', 'asd', 'VSTR2102100205820000009.png', '2021-02-10 08:45:05', NULL, 'STF202102041818440000009', '2021-02-10 08:45:05', '2021-02-10 11:00:02', 'telah_keluar_event'),
('VSTR2102101822250000012', 'EVNT202001210000001', '123 321', 'asd', 'asd', 'asd@asd.asd', 'asd@asd.asd', '123', '123', 'asd', 'VSTR2102101822250000012.png', '2021-02-10 13:46:15', NULL, 'STF202102041818440000009', '2021-02-10 13:46:15', '2021-02-10 20:33:27', 'telah_keluar_event'),
('VSTR2102105834470000013', 'EVNT202001210000001', 'bayu kar', NULL, NULL, 'asd@asd.asd', NULL, '123', NULL, NULL, 'VSTR2102105834470000013.png', '2021-02-10 22:00:49', NULL, 'STF202102041818440000009', '2021-02-10 22:00:49', '2021-02-10 22:53:04', 'telah_keluar_event'),
('VSTR2102106372810000010', 'EVNT202001210000001', '123 321', 'asd', 'asd', 'asd@asd.asd', 'asd@asd.asd', '123', '123', 'asd', 'VSTR2102106372810000010.png', '2021-02-10 11:03:48', NULL, 'STF202102041818440000009', '2021-02-10 11:03:48', '2021-02-10 11:14:00', 'telah_keluar_event'),
('VSTR2102106423900000011', 'EVNT202001210000001', 'qwe ewq', 'asd', 'asd', 'asd@asd.asd', 'asd@asd.asd', '123', '123', 'asd', 'VSTR2102106423900000011.png', '2021-02-10 13:28:56', NULL, 'STF202102041818440000009', '2021-02-10 13:28:56', '2021-02-10 13:31:37', 'telah_keluar_event'),
('VSTR2102110125400000017', 'EVNT202001210000001', 'asd asd', '', '', 'asd@asd.asd', '', '123', '', '', 'VSTR2102110125400000017.png', '2021-02-11 13:59:52', NULL, 'STF202102041818440000009', '2021-02-11 13:59:52', '2021-02-11 14:23:37', 'telah_keluar_event'),
('VSTR2102111741050000014', 'EVNT202001210000001', 'qwe ewq', 'qwe', 'qwe', 'qwe@qwe.qwe', NULL, '123', '123', '123', 'VSTR2102111741050000014.png', '2021-02-11 11:31:59', NULL, 'STF202102041818440000009', '2021-02-11 11:31:59', '2021-02-11 11:33:28', 'telah_keluar_event'),
('VSTR2102112611890000022', 'EVNT202001210000001', 'asd qwe', '', '', 'asd@asd.asd', 'asd@asd.asd', '123', '', '', 'VSTR2102112611890000022.png', '2021-02-11 23:07:34', NULL, 'STF202102041818440000009', '2021-02-11 23:07:34', '2021-02-11 23:08:25', 'telah_keluar_event'),
('VSTR2102114799760000020', 'EVNT202001210000001', 'asda sd', '', '', 'asd@asd.asd', 'asd@asd.asd', '123', '', '', 'VSTR2102114799760000020.png', '2021-02-11 22:46:33', NULL, 'STF202102041818440000009', '2021-02-11 22:46:33', '2021-02-11 22:47:20', 'telah_keluar_event'),
('VSTR2102114845040000016', 'EVNT202001210000001', 'QWE QWE', '', '', 'qwe@qwe.qwe', '', '123', '', '', 'VSTR2102114845040000016.png', '2021-02-11 13:24:56', NULL, 'STF202102041818440000009', '2021-02-11 13:24:56', '2021-02-11 13:25:34', 'telah_keluar_event'),
('VSTR2102114913890000015', 'EVNT202001210000001', 'asd asd', '', '', 'asd@asd.asd', '', '123', '', '', 'VSTR2102114913890000015.png', '2021-02-11 13:11:26', NULL, 'STF202102041818440000009', '2021-02-11 13:11:26', '2021-02-11 13:24:26', 'telah_keluar_event'),
('VSTR2102115902240000018', 'EVNT202001210000001', 'asd asd', '', '', 'asd@asd.asd', '', '123', '', '', 'VSTR2102115902240000018.png', '2021-02-11 14:38:55', NULL, 'STF202102041818440000009', '2021-02-11 14:38:55', '2021-02-11 14:39:55', 'telah_keluar_event'),
('VSTR2102116876140000021', 'EVNT202001210000001', 'as s', '', '', 'asd@asd.asd', 'asd@asd.asd', '123', '', '', 'VSTR2102116876140000021.png', '2021-02-11 22:47:45', NULL, 'STF202102041818440000009', '2021-02-11 22:47:45', '2021-02-11 23:07:02', 'telah_keluar_event'),
('VSTR2102118361420000019', 'EVNT202001210000001', 'asd dsa', '', '', 'asd@asd.asd', '', '123', '', '', 'VSTR2102118361420000019.png', '2021-02-11 22:14:19', NULL, 'STF202102041818440000009', '2021-02-11 22:14:19', '2021-02-11 22:44:55', 'telah_keluar_event');

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
  ADD KEY `id_event` (`id_petugas_pintu_area`);

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
  MODIFY `nomor` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

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
  ADD CONSTRAINT `tabel_tracking_ibfk_3` FOREIGN KEY (`id_petugas_pintu_area`) REFERENCES `tabel_staff` (`staff_id`) ON DELETE SET NULL ON UPDATE SET NULL;

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
