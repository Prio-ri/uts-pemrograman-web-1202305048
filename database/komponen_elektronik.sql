-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2025 at 01:49 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `komponen_elektronik`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_komponen`
--

CREATE TABLE `data_komponen` (
  `id_komponen` int(11) NOT NULL,
  `nama_komponen` varchar(100) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `jumlah_stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_komponen`
--

INSERT INTO `data_komponen` (`id_komponen`, `nama_komponen`, `jenis`, `jumlah_stok`) VALUES
(1, 'RESISTOR 200 OHM 1/2 W', 'RESISTOR 1/2 W ', 200),
(2, 'KAPASITOR 50 VOLT 1600 UF', 'KAPASITOR', 430),
(3, 'RELAY 5 KAKI', 'RELAY 5 KAKI OTOMOTIF', 34);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_komponen`
--
ALTER TABLE `data_komponen`
  ADD PRIMARY KEY (`id_komponen`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_komponen`
--
ALTER TABLE `data_komponen`
  MODIFY `id_komponen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
