-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2020 at 07:40 AM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kemahasiswaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `fsId` smallint(5) UNSIGNED NOT NULL,
  `fsNama` varchar(45) NOT NULL,
  `fsDeskripsi` text,
  `fsFoto` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`fsId`, `fsNama`, `fsDeskripsi`, `fsFoto`) VALUES
(0, 'bb', 'nnnn', 'cv.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `harga_sewa`
--

CREATE TABLE `harga_sewa` (
  `hsFasilitas` smallint(5) UNSIGNED NOT NULL,
  `hsKategori` smallint(5) UNSIGNED NOT NULL,
  `hsHarga` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `harga_sewa`
--

INSERT INTO `harga_sewa` (`hsFasilitas`, `hsKategori`, `hsHarga`) VALUES
(0, 1, 123);

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_peminjaman`
--

CREATE TABLE `riwayat_peminjaman` (
  `rpId` int(10) UNSIGNED NOT NULL,
  `rpFasilitas` smallint(5) UNSIGNED NOT NULL,
  `rpKategoriPeminjaman` smallint(5) UNSIGNED NOT NULL,
  `rpKegiatan` text NOT NULL,
  `rpNamaPeminjam` varchar(250) NOT NULL,
  `rpNoTelepon` varchar(20) DEFAULT NULL,
  `rpEmail` varchar(45) DEFAULT NULL,
  `rpCatatan` text,
  `rpTanggalSewa` datetime NOT NULL,
  `rpTanggalMulai` datetime NOT NULL,
  `rpTanggalSelesai` datetime NOT NULL,
  `rpSuratPeminjaman` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `riwayat_peminjaman`
--

INSERT INTO `riwayat_peminjaman` (`rpId`, `rpFasilitas`, `rpKategoriPeminjaman`, `rpKegiatan`, `rpNamaPeminjam`, `rpNoTelepon`, `rpEmail`, `rpCatatan`, `rpTanggalSewa`, `rpTanggalMulai`, `rpTanggalSelesai`, `rpSuratPeminjaman`) VALUES
(1, 1, 1, 'dhjahdjfjhlkhv', 'uzi', '2425252', 'sgssg', 'rhsnne', '2020-01-17 00:00:00', '2020-01-18 00:00:00', '2020-01-19 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `r_jenis_kegiatan`
--

CREATE TABLE `r_jenis_kegiatan` (
  `trJkId` smallint(5) UNSIGNED NOT NULL,
  `trJkNama` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `r_jenis_kegiatan`
--

INSERT INTO `r_jenis_kegiatan` (`trJkId`, `trJkNama`) VALUES
(1, 'nikah cuyss');

-- --------------------------------------------------------

--
-- Table structure for table `r_kategori_peminjaman`
--

CREATE TABLE `r_kategori_peminjaman` (
  `trKpId` smallint(5) UNSIGNED NOT NULL,
  `trKpNama` varchar(50) NOT NULL,
  `trKpDeskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `r_kategori_peminjaman`
--

INSERT INTO `r_kategori_peminjaman` (`trKpId`, `trKpNama`, `trKpDeskripsi`) VALUES
(1, 'non-komersial', 'deskripsi non komersial'),
(2, 'semi-komersial', 'deskripsi semi-komersial'),
(4, 'komersial', 'deskripsi komersial');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama_depan` varchar(100) NOT NULL,
  `nama_belakang` varchar(100) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama_depan`, `nama_belakang`, `username`, `password`, `foto`) VALUES
(1, 'Admin', 'Website', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `riwayat_peminjaman`
--
ALTER TABLE `riwayat_peminjaman`
  ADD PRIMARY KEY (`rpId`);

--
-- Indexes for table `r_jenis_kegiatan`
--
ALTER TABLE `r_jenis_kegiatan`
  ADD PRIMARY KEY (`trJkId`);

--
-- Indexes for table `r_kategori_peminjaman`
--
ALTER TABLE `r_kategori_peminjaman`
  ADD PRIMARY KEY (`trKpId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `riwayat_peminjaman`
--
ALTER TABLE `riwayat_peminjaman`
  MODIFY `rpId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `r_jenis_kegiatan`
--
ALTER TABLE `r_jenis_kegiatan`
  MODIFY `trJkId` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `r_kategori_peminjaman`
--
ALTER TABLE `r_kategori_peminjaman`
  MODIFY `trKpId` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
