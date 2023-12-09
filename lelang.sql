-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2023 at 06:17 AM
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
-- Database: `lelang`
--

-- --------------------------------------------------------

--
-- Table structure for table `history_lelang`
--

CREATE TABLE `history_lelang` (
  `id_history` int(11) NOT NULL,
  `id_lelang` int(11) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `penawaran_harga` int(20) DEFAULT NULL,
  `status_lelang` varchar(15) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `history_lelang`
--

INSERT INTO `history_lelang` (`id_history`, `id_lelang`, `id_barang`, `id_user`, `penawaran_harga`, `status_lelang`) VALUES
(6, 8, 6, 2, 3000000, 'terpilih'),
(7, 7, 5, 2, 3000000, 'tidak terpilih'),
(8, 8, 6, 3, 250000, 'tidak terpilih'),
(9, 7, 5, 3, 2500000, 'terpilih'),
(10, 9, 7, 2, 340000000, 'terpilih'),
(11, 9, 7, 3, 3600000, 'tidak terpilih'),
(12, 11, 8, 2, 10000000, 'terpilih'),
(13, 10, 9, 2, 2000000, 'tidak terpilih'),
(14, 11, 8, 3, 2000000, 'tidak terpilih'),
(15, 10, 9, 3, 3000000, 'terpilih');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `harga_awal` int(20) DEFAULT NULL,
  `deskripsi_barang` text DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `status_barang` varchar(25) NOT NULL DEFAULT 'belum dilelang'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `nama_barang`, `tgl`, `harga_awal`, `deskripsi_barang`, `gambar`, `status_barang`) VALUES
(5, 'Jaket', '2023-12-08', 2000000, 'cccccccccccccccc', 'download_(2)2.jpg', 'dilelang'),
(6, 'Kemeja', '2023-12-08', 214748, 'dddddddddddddddd', 'Earth_Saturn_Planet_PNG_-_Free_Download.jpg', 'dilelang'),
(7, 'buku', '2023-12-09', 300000, 'adsfghgfdsas', 'Whale_cartoon_clip_art_image_-_Clipartix.jpeg', 'dilelang'),
(8, 'asasa', '2023-12-09', 1000000, 'asdfghjkhgfds', 'LONGBIDA_Men’s_Denim_Jacket_Coat_Classic_Fit_Trucker_Jacket_Casual_Jean_Top_with_Pockets1.jpg', 'dilelang'),
(9, 'axaxaxa', '2023-12-09', 100000, 'axassxxa', 'Hiro_Souma.jpeg', 'dilelang');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lelang`
--

CREATE TABLE `tb_lelang` (
  `id_lelang` int(11) NOT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `tgl_lelang` date DEFAULT NULL,
  `harga_akhir` int(20) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_petugas` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_lelang`
--

INSERT INTO `tb_lelang` (`id_lelang`, `id_barang`, `tgl_lelang`, `harga_akhir`, `id_user`, `id_petugas`, `status`) VALUES
(7, 5, '2023-12-09', 2500000, 3, 1, 'ditutup'),
(8, 6, '2023-12-09', 3000000, 2, 1, 'ditutup'),
(9, 7, '2023-12-09', 340000000, 2, 1, 'ditutup'),
(10, 9, '2023-12-09', 3000000, 3, 1, 'ditutup'),
(11, 8, '2023-12-09', 10000000, 2, 1, 'ditutup');

-- --------------------------------------------------------

--
-- Table structure for table `tb_masyarakat`
--

CREATE TABLE `tb_masyarakat` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `telp` varchar(15) DEFAULT NULL,
  `level` varchar(20) DEFAULT 'masyarakat'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_masyarakat`
--

INSERT INTO `tb_masyarakat` (`id_user`, `nama_lengkap`, `username`, `password`, `telp`, `level`) VALUES
(1, 'user', 'aa', '123', '0986543', ''),
(2, 'Masyarakat', 'masyarakat', '12', '0828338283', 'masyarakat'),
(3, 'Masyarakat2', 'masyarakat2', '12', '0986543456', 'masyarakat');

-- --------------------------------------------------------

--
-- Table structure for table `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(255) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `level` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_petugas`
--

INSERT INTO `tb_petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `level`) VALUES
(1, 'Admin', 'admin', '123', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `history_lelang`
--
ALTER TABLE `history_lelang`
  ADD PRIMARY KEY (`id_history`),
  ADD KEY `id_lelang` (`id_lelang`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tb_lelang`
--
ALTER TABLE `tb_lelang`
  ADD PRIMARY KEY (`id_lelang`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- Indexes for table `tb_masyarakat`
--
ALTER TABLE `tb_masyarakat`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `history_lelang`
--
ALTER TABLE `history_lelang`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_lelang`
--
ALTER TABLE `tb_lelang`
  MODIFY `id_lelang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_masyarakat`
--
ALTER TABLE `tb_masyarakat`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `history_lelang`
--
ALTER TABLE `history_lelang`
  ADD CONSTRAINT `history_lelang_ibfk_1` FOREIGN KEY (`id_lelang`) REFERENCES `tb_lelang` (`id_lelang`),
  ADD CONSTRAINT `history_lelang_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`),
  ADD CONSTRAINT `history_lelang_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `tb_masyarakat` (`id_user`);

--
-- Constraints for table `tb_lelang`
--
ALTER TABLE `tb_lelang`
  ADD CONSTRAINT `tb_lelang_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`),
  ADD CONSTRAINT `tb_lelang_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tb_masyarakat` (`id_user`),
  ADD CONSTRAINT `tb_lelang_ibfk_3` FOREIGN KEY (`id_petugas`) REFERENCES `tb_petugas` (`id_petugas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
