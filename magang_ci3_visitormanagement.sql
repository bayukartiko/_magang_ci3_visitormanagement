-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2021 at 05:52 PM
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
-- Table structure for table `tabel_area`
--

CREATE TABLE `tabel_area` (
  `id_area` varchar(255) NOT NULL,
  `id_event` varchar(255) NOT NULL,
  `nama_area` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_event`
--

CREATE TABLE `tabel_event` (
  `id_event` varchar(255) NOT NULL,
  `nama_event` varchar(255) NOT NULL,
  `tanggal_dibuka` datetime NOT NULL,
  `tanggal_ditutup` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_event`
--

INSERT INTO `tabel_event` (`id_event`, `nama_event`, `tanggal_dibuka`, `tanggal_ditutup`) VALUES
('EVNT202001210000001', 'event uji coba', '2021-01-21 12:20:19', '2021-01-24 12:20:19');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_tracking`
--

CREATE TABLE `tabel_tracking` (
  `id_visitor` varchar(255) NOT NULL,
  `id_area` varchar(255) NOT NULL,
  `time_in_area` datetime NOT NULL,
  `time_out_area` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_visitor`
--

CREATE TABLE `tabel_visitor` (
  `id_visitor` varchar(255) NOT NULL,
  `id_event` varchar(255) NOT NULL,
  `nama_visitor` varchar(255) NOT NULL,
  `perusahaan_visitor` varchar(255) NOT NULL,
  `jabatan_visitor` varchar(255) NOT NULL,
  `email_visitor` varchar(255) NOT NULL,
  `email_perusahaan` varchar(255) NOT NULL,
  `tlp_visitor` varchar(15) NOT NULL,
  `tlp_perusahaan` varchar(15) NOT NULL,
  `alasan_ikut` text NOT NULL,
  `gambar_qrcode` varchar(255) NOT NULL,
  `registered_at` datetime NOT NULL,
  `time_logged_in` datetime NOT NULL,
  `time_logged_out` datetime NOT NULL,
  `status` enum('logged in','logged out') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_visitor`
--

INSERT INTO `tabel_visitor` (`id_visitor`, `id_event`, `nama_visitor`, `perusahaan_visitor`, `jabatan_visitor`, `email_visitor`, `email_perusahaan`, `tlp_visitor`, `tlp_perusahaan`, `alasan_ikut`, `gambar_qrcode`, `registered_at`, `time_logged_in`, `time_logged_out`, `status`) VALUES
('VSTR202101212349420000001', 'EVNT202001210000001', 'asdasasdas', 'sadsa', 'asda', 'asd@asd.sad', 'asdas@adas.sad', '21312', '2131', 'adsa', 'VSTR202101212349420000001.png', '2021-01-21 23:49:42', '2021-01-21 23:49:42', '0000-00-00 00:00:00', 'logged in'),
('VSTR202101212350130000002', 'EVNT202001210000001', 'asdasddasda', 'asda', 'asdas', 'asd@asd.asda', 'asd@adas.sada', '23123', '231', 'ADASD', 'VSTR202101212350130000002.png', '2021-01-21 23:50:13', '2021-01-21 23:50:13', '0000-00-00 00:00:00', 'logged in');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `tabel_tracking`
--
ALTER TABLE `tabel_tracking`
  ADD KEY `id_visitor` (`id_visitor`),
  ADD KEY `id_area` (`id_area`);

--
-- Indexes for table `tabel_visitor`
--
ALTER TABLE `tabel_visitor`
  ADD PRIMARY KEY (`id_visitor`),
  ADD KEY `id_event` (`id_event`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tabel_area`
--
ALTER TABLE `tabel_area`
  ADD CONSTRAINT `tabel_area_ibfk_1` FOREIGN KEY (`id_event`) REFERENCES `tabel_event` (`id_event`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tabel_tracking`
--
ALTER TABLE `tabel_tracking`
  ADD CONSTRAINT `tabel_tracking_ibfk_1` FOREIGN KEY (`id_area`) REFERENCES `tabel_area` (`id_area`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tabel_tracking_ibfk_2` FOREIGN KEY (`id_visitor`) REFERENCES `tabel_visitor` (`id_visitor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tabel_visitor`
--
ALTER TABLE `tabel_visitor`
  ADD CONSTRAINT `tabel_visitor_ibfk_1` FOREIGN KEY (`id_event`) REFERENCES `tabel_event` (`id_event`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
