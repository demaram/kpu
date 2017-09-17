-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2017 at 11:27 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.0.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `office`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL,
  `id_histori` int(11) NOT NULL,
  `vendor` varchar(255) NOT NULL,
  `no_pk` varchar(8) NOT NULL,
  `no_spk` varchar(8) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `mulai` date NOT NULL,
  `akhir` date NOT NULL,
  `jumlah_personil` int(11) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `id_histori`, `vendor`, `no_pk`, `no_spk`, `lokasi`, `mulai`, `akhir`, `jumlah_personil`, `pic`, `keterangan`) VALUES
(1, 1, 'Vendor', '01851084', '5123512', 'Jakarta', '2017-06-01', '2017-06-29', 55, 'Dennis', 'adfasd'),
(2, 1, 'aaa', '0', '11414', 'aaaa', '2017-06-01', '2017-06-22', 111, 'Yoga', 'afasf'),
(3, 3, 'aaaa', '09123495', '415123', 'lokasi', '2017-06-02', '2017-06-30', 55, 'Test PIC', '1efaf'),
(4, 1, 'AAJI', '0', '512354', 'lokasi', '2017-06-01', '2017-06-30', 55, '', '11'),
(5, 5, 'Dennis', '95129349', '95192499', 'Jakart', '2017-06-09', '2017-06-30', 151234, 'Mutya', 'adfasdf'),
(6, 6, 'PGN Mas ', '170700', '075900', 'Admin Representatif Area', '2017-06-14', '2017-10-31', 1, 'Kiki', 'aaa');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pk`
--

CREATE TABLE `pk` (
  `id_pk` int(11) NOT NULL,
  `no_pk_vendor` varchar(255) NOT NULL,
  `no_kpu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pk`
--

INSERT INTO `pk` (`id_pk`, `no_pk_vendor`, `no_kpu`) VALUES
(2, '170700.PK/UT/HK.02/2015 ', '006.AMD/KPU/VIII/2015'),
(3, '003000.PK/UT/HK.00/2014', '001.PK/KPU/IX/2014'),
(4, '170700.PK/UT/HK.00/2015', '006.PK/KPU/IX/2015'),
(5, '131300.PK/UT/HK.02/2016', '0005.PK/KPU/VII/2016'),
(6, 'TEST DATA PK', 'Test data PK 111 '),
(7, '131300.PK/UT/HK.02/2010', '006.AMD/KPU/VIII/2015');

-- --------------------------------------------------------

--
-- Table structure for table `spk`
--

CREATE TABLE `spk` (
  `id_spk` int(11) NOT NULL,
  `id_histori` int(11) NOT NULL,
  `id_pk` int(11) NOT NULL,
  `perihal` varchar(255) NOT NULL,
  `no_spk` varchar(255) NOT NULL,
  `vendor` varchar(255) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `penempatan` varchar(255) NOT NULL,
  `jumlah_personil` int(11) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spk`
--

INSERT INTO `spk` (`id_spk`, `id_histori`, `id_pk`, `perihal`, `no_spk`, `vendor`, `start`, `end`, `penempatan`, `jumlah_personil`, `pic`, `keterangan`, `status`) VALUES
(31, 0, 2, 'Tenaga Pengemudi', '198000.S/UT/LG.01/2016', 'PGN MAS', '2017-01-01', '2017-12-31', '', 4, 'Rizky', '', 1),
(32, 0, 2, 'Sekertaris', '198200.S/UT/LG.01/2016', 'PGN MAS', '2017-01-01', '2017-12-31', '', 16, 'Rizky', '', 1),
(33, 0, 3, 'Tenaga Pengemudi', '014500.S/UT/KP.00.01/2014', 'PGN MAS', '2014-11-01', '2017-12-11', '', 27, '-', '', 1),
(34, 0, 3, 'Teknisi', '197900.S/UT/LG.01/2016', 'PGN MAS', '2017-01-01', '2017-12-31', '', 1, 'Rizky', '', 1),
(35, 0, 4, 'Administrator', '164200.S/UT/KP.00.01/2016', 'PGN MAS', '2016-11-01', '2017-10-31', '', 1, 'Rizky', '', 1),
(36, 0, 4, 'Office Boy', '132400.S/UT/KP.00.01/2016', 'PGN MAS', '2016-09-01', '2017-08-31', '', 1, 'Rizky', '', 1),
(37, 0, 5, 'Administrator', '026500.S/UT/KP.00/2017', 'PGN MAS', '2017-03-01', '2017-08-31', '', 1, 'Rizky', '', 1),
(38, 0, 5, 'Data Entry', '197200.S/UT/KP.00.01/2016', 'PGN MAS', '2017-01-01', '2017-12-31', '', 1, 'Rizky', '', 1),
(39, 0, 5, 'Office Boy', '197100.S/UT/KP.00.01/2016', 'PGN MAS', '2017-01-01', '2017-12-31', '', 2, 'Rizky', '', 1),
(40, 0, 5, 'OB / OG', '198100.S/UT/LG.01/2016', 'PGN MAS', '2017-01-01', '2017-12-31', '', 1, 'Rizky', '', 1),
(41, 0, 5, 'Cleaning Service', '200800.S/UT/KP.00/2016', 'PGN MAS', '2017-01-01', '2017-12-31', '', 1, 'Yanti', '', 1),
(42, 0, 5, 'OP Telpon & Reseptionis', '025800.SPK/UT/KP.00/2017', 'PGN MAS', '2017-03-01', '2018-02-28', '', 28, 'Rizky', '', 1),
(43, 0, 5, 'Reseptionis', '054800.S/MAS-UT/KP.00/2017', 'PGN MAS', '2017-05-01', '2017-12-31', '', 1, 'Rizky', '', 1),
(44, 0, 5, 'Tenaga Pengemudi', '026700.S/UT/KP.00/2017', 'PGN MAS', '2017-03-01', '2017-08-31', '', 3, 'Raffiudin', '', 1),
(45, 0, 5, 'Tenaga Pengemudi', '041400.SPK/MAS-UT/KP.00/2017', 'PGN MAS', '2017-04-01', '2017-12-31', '', 71, 'Raffiudin', '', 1),
(46, 0, 5, 'Tenaga Pengemudi', '041500.SPK/MAS-UT/KP.00/2017', 'PGN MAS', '2017-04-01', '2017-12-31', '', 2, 'Ari Kusumayadi', '', 1),
(47, 0, 6, 'Test', 'Test Nomor SPK', 'Nama Vendor', '2017-07-01', '2017-09-01', 'Test', 2, 'Mutya', '', 1),
(48, 0, 6, 'Tenaga Pengemudi', 'test spk', 'PGN MAS', '2017-07-01', '2017-07-17', 'Jakarta', 2, 'Mutya', 'Belum Diperpanjang', 0),
(49, 0, 6, 'Jasa ', '075900.S/UT/KP.00.01/2016', 'PGN MAS', '2017-07-01', '2017-08-09', '24123413', 1, 'Rizky', 'Perpanjangan 075900.S/UT/KP.00.01/2016', 1),
(50, 0, 7, 'Tenaga Pengemudi', '075900.S/UT/KP.00.01/2016', 'PGN MAS', '2017-07-01', '2017-08-06', 'Bekasi', 1, 'Mutya', '', 0),
(51, 50, 7, 'Administrator', '075900.S/UT/KP.00.01/2017', 'PGN MAS', '2017-07-01', '2017-08-31', 'Jakarta', 1, 'Ari Kusumayadi', 'Perpanjangan 075900.S/UT/KP.00.01/2016', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `occupation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `photo`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `occupation`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$08$ymuTjFumo25E.iA0eQGu9OfLu6SoanZRVzzeys3oVmvmDrldQ3Bky', '', 'admin@kpu.com', '92images.png', '', NULL, NULL, NULL, 1268889823, 1500621891, 1, 'admin', 'istrator', 'ADMIN', '09129596910', 'Managers');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pk`
--
ALTER TABLE `pk`
  ADD PRIMARY KEY (`id_pk`);

--
-- Indexes for table `spk`
--
ALTER TABLE `spk`
  ADD PRIMARY KEY (`id_spk`),
  ADD KEY `id_pk` (`id_pk`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pk`
--
ALTER TABLE `pk`
  MODIFY `id_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `spk`
--
ALTER TABLE `spk`
  MODIFY `id_spk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `spk`
--
ALTER TABLE `spk`
  ADD CONSTRAINT `spk_ibfk_1` FOREIGN KEY (`id_pk`) REFERENCES `pk` (`id_pk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
