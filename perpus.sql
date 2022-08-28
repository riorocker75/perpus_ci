-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2022 at 10:43 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nis` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` datetime DEFAULT NULL,
  `tempat_lahir` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tingkatan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_masuk` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `penulis` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penerbit` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_terbit` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lokasi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '1=buku sekolah, 2=buku cerita',
  `tanggal` datetime DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dah_options`
--

CREATE TABLE `dah_options` (
  `option_id` int(11) NOT NULL,
  `option_name` text NOT NULL,
  `option_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dah_options`
--

INSERT INTO `dah_options` (`option_id`, `option_name`, `option_value`) VALUES
(1, 'blog_name', 'Sistem Kepegawaian PT.Indah Cargo Cabang Binjai'),
(2, 'blog_description', 'Sebuah app');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `buku_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anggota_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_pinjam` datetime DEFAULT NULL,
  `tanggal_kembali` datetime DEFAULT NULL,
  `ket` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_login` text NOT NULL,
  `user_name` text NOT NULL,
  `user_pass` text NOT NULL,
  `user_lvl` text NOT NULL,
  `user_email` text NOT NULL,
  `user_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_login`, `user_name`, `user_pass`, `user_lvl`, `user_email`, `user_status`) VALUES
(1, 'admin', 'Risma', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'risma@gmail.com', '1'),
(2, 'root', 'sumantri', '63a9f0ea7bb98050796b649e85481845', 'admin', '', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dah_options`
--
ALTER TABLE `dah_options`
  ADD PRIMARY KEY (`option_id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dah_options`
--
ALTER TABLE `dah_options`
  MODIFY `option_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
