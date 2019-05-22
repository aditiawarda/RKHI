-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2019 at 11:00 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rkhi`
--

-- --------------------------------------------------------

--
-- Table structure for table `kirim_email`
--

CREATE TABLE `kirim_email` (
  `id_email` int(11) NOT NULL,
  `nama_depan` varchar(60) NOT NULL,
  `nama_belakang` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `pesan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kirim_email`
--

INSERT INTO `kirim_email` (`id_email`, `nama_depan`, `nama_belakang`, `email`, `subject`, `pesan`) VALUES
(1, 'rizki', 'aditia', 'aditia20.riz@gmail.com', 'ww', 'jhjhjhug'),
(2, 'Banni ', 'Ferbiansyah', 'banniferbiansyah@gmail.com', 'Bantuan', 'Tolong bantu kami dalam masalah dagang'),
(3, 'dwdw', 'aditia', 'cahyagita2@gmail.com', 'Promo akhir tahun', 'khhjghj');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kirim_email`
--
ALTER TABLE `kirim_email`
  ADD PRIMARY KEY (`id_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kirim_email`
--
ALTER TABLE `kirim_email`
  MODIFY `id_email` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
