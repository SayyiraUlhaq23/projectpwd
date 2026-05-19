-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2026 at 05:03 AM
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
-- Database: `velnorajogja_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id_booking` int(11) NOT NULL,
  `id_kendaraan` char(4) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `lama_sewa` int(11) DEFAULT NULL,
  `metode_pembayaran` varchar(50) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `status` varchar(20) DEFAULT 'booking',
  `status_pembayaran` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id_booking`, `id_kendaraan`, `tanggal`, `lama_sewa`, `metode_pembayaran`, `id_user`, `total_harga`, `status`, `status_pembayaran`) VALUES
(7, 'K003', '2026-05-25', 3, 'Transfer', 6, 90000, 'booking', 'Lunas'),
(8, 'K002', '2026-05-19', 1, 'Cash', 7, 160000, 'done', 'Gagal'),
(9, 'K002', '2026-05-11', 2, 'E-Wallet', 2, 320000, 'booking', 'Menunggu Pembayaran'),
(10, 'K001', '2026-05-12', 1, 'Cash', 3, 500000, 'done', 'Lunas'),
(11, 'K003', '2026-05-14', 1, 'E-Wallet', 3, 30000, 'booking', 'Menunggu Pembayaran'),
(13, 'K002', '2026-05-19', 2, 'Cash', 7, 320000, 'done', 'Lunas'),
(14, 'K002', '2026-05-22', 1, 'Transfer', 7, 160000, 'booking', 'Menunggu Pembayaran'),
(16, 'K002', '2025-03-03', 1, 'E-Wallet', 5, 160000, 'booking', 'Menunggu Pembayaran'),
(22, 'K003', '2026-05-22', 3, 'Transfer', 7, 90000, 'booking', 'Menunggu Pembayaran'),
(23, 'K001', '2026-05-23', 2, 'E-Wallet', 7, 1000000, 'booking', 'Menunggu Pembayaran'),
(25, 'K002', '2026-05-26', 2, 'Transfer', 3, 320000, 'booking', 'Menunggu Pembayaran'),
(26, 'K003', '2026-05-20', 1, 'E-Wallet', 5, 30000, 'booking', 'Menunggu Pembayaran');

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id_kendaraan` char(4) NOT NULL,
  `jenis_kendaraan` varchar(50) DEFAULT NULL,
  `harga_sewa` int(11) DEFAULT NULL,
  `gambar` varchar(50) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `stok` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`id_kendaraan`, `jenis_kendaraan`, `harga_sewa`, `gambar`, `deskripsi`, `stok`) VALUES
('K001', 'Mobil VW', 500000, 'mobilvw.png', 'Cocok untuk keluarga & rombongan', 7),
('K002', 'Vespa', 160000, 'vespa.png', 'Stylish untuk jalan keliling jogja', 9),
('K003', 'Sepeda', 30000, 'sepeda.jpeg', 'Santai keliling wisata jogja', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `nama` varchar(50) NOT NULL,
  `no_hp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `email`, `nama`, `no_hp`) VALUES
(2, 'iamcortiez', 'keonho123', 'keonhocakep1@gmail.com', 'Ahn Keonho', '081328086544'),
(3, 'tereek02', 'tere2', 'helloteree@gmail.com', 'Tere Hello', '081234567811'),
(4, 'kaluu_', 'kaluna3', 'kalunajaegar@gmail.com', 'kaluna', '085677890322'),
(5, 'nasaa_4', 'nasa4', 'sadewaa05@gmail.com', 'Nakula Sadewa', '081567890339'),
(6, 'ujicobaa', 'coba0', 'ujicoba1@gmail.com', 'uji coba', '088765432008'),
(7, 'wve_', 'wave11', 'oceann@gmail.com', 'wave ocean', '081657883492');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`),
  ADD KEY `id_kendaraan` (`id_kendaraan`),
  ADD KEY `fk_user_booking` (`id_user`);

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id_kendaraan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`id_kendaraan`) REFERENCES `kendaraan` (`id_kendaraan`),
  ADD CONSTRAINT `fk_user_booking` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
