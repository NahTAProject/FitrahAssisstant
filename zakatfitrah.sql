-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2023 at 11:10 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zakatfitrah`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `id_akun` varchar(12) NOT NULL,
  `profilePic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`username`, `password`, `email`, `id_akun`, `profilePic`) VALUES
('admin', 'admin', 'admin@admin.com', '277918BX', NULL),
('atuoan', '12345', 'kosam@email.com', '266982WP', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `msput`
--

CREATE TABLE `msput` (
  `id_akunmz` varchar(12) DEFAULT NULL,
  `KKms` varchar(16) DEFAULT NULL,
  `namams` varchar(50) DEFAULT NULL,
  `kategori` varchar(50) DEFAULT NULL,
  `jerim` varchar(50) DEFAULT NULL,
  `jurim` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `muzakki`
--

CREATE TABLE `muzakki` (
  `id_muzakki` varchar(8) NOT NULL,
  `nama_muzakki` varchar(50) DEFAULT NULL,
  `jumlah_tanggungan` int(11) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `muzakki`
--

INSERT INTO `muzakki` (`id_muzakki`, `nama_muzakki`, `jumlah_tanggungan`, `keterangan`) VALUES
('266982WP', 'kosam', NULL, NULL),
('277918BX', 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mzput`
--

CREATE TABLE `mzput` (
  `id_akunmz` varchar(12) DEFAULT NULL,
  `KKmz` varchar(255) DEFAULT NULL,
  `namamz` varchar(255) DEFAULT NULL,
  `Tmz` int(11) DEFAULT NULL,
  `status_mz` varchar(50) DEFAULT NULL,
  `jebayar` varchar(50) DEFAULT NULL,
  `jubayar` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD KEY `idx_id_akun` (`id_akun`);

--
-- Indexes for table `msput`
--
ALTER TABLE `msput`
  ADD KEY `id_akunmz` (`id_akunmz`);

--
-- Indexes for table `muzakki`
--
ALTER TABLE `muzakki`
  ADD PRIMARY KEY (`id_muzakki`);

--
-- Indexes for table `mzput`
--
ALTER TABLE `mzput`
  ADD KEY `id_akunmz` (`id_akunmz`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `msput`
--
ALTER TABLE `msput`
  ADD CONSTRAINT `msput_ibfk_1` FOREIGN KEY (`id_akunmz`) REFERENCES `akun` (`id_akun`);

--
-- Constraints for table `mzput`
--
ALTER TABLE `mzput`
  ADD CONSTRAINT `mzput_ibfk_1` FOREIGN KEY (`id_akunmz`) REFERENCES `akun` (`id_akun`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
