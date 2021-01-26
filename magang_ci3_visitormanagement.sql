-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2021 at 01:18 PM
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
  `role_id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `verified` varchar(1) NOT NULL,
  `is_active` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_staff`
--

INSERT INTO `tabel_staff` (`staff_id`, `role_id`, `username`, `password`, `nama`, `verified`, `is_active`) VALUES
('STF2021012419200100000001', 1, 'bayu', 'qwerty', 'bayu kartiko', '1', '0');

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
('VSTR202101261121110000001', 'EVNT202001210000001', 'asd dsa', 'asd', 'asd', 'reger@htrh.rthr', 'asd@asd.asd', '123', '123', 'asd', 'VSTR202101261121110000001.png', '2021-01-26 11:21:11', '2021-01-26 11:21:11', '0000-00-00 00:00:00', 'logged in'),
('VSTR202101261823410000002', 'EVNT202001210000001', 'asd asd', 'asd', 'asd', 'asd@asd.asd', 'asd@asd.asd', '213', '123', 'asd', 'VSTR202101261823410000002.png', '2021-01-26 18:23:41', '2021-01-26 18:23:41', '0000-00-00 00:00:00', 'logged in'),
('VSTR202101261825140000003', 'EVNT202001210000001', 'asd dsa', 'asd', 'asdaa', 'asd@asd.asd', 'asd@asd.asd', '123', '123', 'assd', 'VSTR202101261825140000003.png', '2021-01-26 18:25:14', '2021-01-26 18:25:14', '0000-00-00 00:00:00', 'logged in'),
('VSTR202101261826220000004', 'EVNT202001210000001', 'sd asd', 'asdada', 'asdas', 'asd@asd.asd', 'asd@asd.asd', '2123', '123', 'sad', 'VSTR202101261826220000004.png', '2021-01-26 18:26:22', '2021-01-26 18:26:22', '0000-00-00 00:00:00', 'logged in'),
('VSTR202101261832270000005', 'EVNT202001210000001', 'asd asd', 'asd', 'asd', 'asd@asd.asd', 'sad@wefe.weff', '123', '213', 'asda', 'VSTR202101261832270000005.png', '2021-01-26 18:32:27', '2021-01-26 18:32:27', '0000-00-00 00:00:00', 'logged in');

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
-- Indexes for table `tabel_role`
--
ALTER TABLE `tabel_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tabel_staff`
--
ALTER TABLE `tabel_staff`
  ADD PRIMARY KEY (`staff_id`),
  ADD KEY `role_id` (`role_id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_role`
--
ALTER TABLE `tabel_role`
  MODIFY `role_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tabel_area`
--
ALTER TABLE `tabel_area`
  ADD CONSTRAINT `tabel_area_ibfk_1` FOREIGN KEY (`id_event`) REFERENCES `tabel_event` (`id_event`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tabel_staff`
--
ALTER TABLE `tabel_staff`
  ADD CONSTRAINT `tabel_staff_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `tabel_role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
