-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Apr 2026 pada 15.12
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

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
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking`
--

CREATE TABLE `booking` (
  `id_booking` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `id_kendaraan` char(4) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `lama_sewa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `booking`
--

INSERT INTO `booking` (`id_booking`, `nama`, `email`, `no_hp`, `id_kendaraan`, `tanggal`, `lama_sewa`) VALUES
(4, 'Keonho', 'keonhocakep1@gmail.com', '082267392378', 'K002', '2026-04-28', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id_kendaraan` char(4) NOT NULL,
  `jenis_kendaraan` varchar(50) DEFAULT NULL,
  `harga_sewa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kendaraan`
--

INSERT INTO `kendaraan` (`id_kendaraan`, `jenis_kendaraan`, `harga_sewa`) VALUES
('K001', 'VW', 500000),
('K002', 'Vespa', 160000),
('K003', 'Sepeda', 30000),
('K004', 'Andong', 100000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`),
  ADD KEY `id_kendaraan` (`id_kendaraan`);

--
-- Indeks untuk tabel `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id_kendaraan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `booking`
--
ALTER TABLE `booking`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`id_kendaraan`) REFERENCES `kendaraan` (`id_kendaraan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
