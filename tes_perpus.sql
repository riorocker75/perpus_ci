-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Apr 2022 pada 16.21
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_pegawai`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dah_options`
--

CREATE TABLE `dah_options` (
  `option_id` int(11) NOT NULL,
  `option_name` text NOT NULL,
  `option_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dah_options`
--

INSERT INTO `dah_options` (`option_id`, `option_name`, `option_value`) VALUES
(1, 'blog_name', 'Sistem Kepegawaian PT.Indah Cargo Cabang Binjai'),
(2, 'blog_description', 'Sebuah app');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mitra`
--

CREATE TABLE `mitra` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `pemilik` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `tanggal` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mitra`
--

INSERT INTO `mitra` (`id`, `nama`, `pemilik`, `alamat`, `email`, `no_hp`, `status`, `tanggal`) VALUES
(1, 'Jne Brahrangs', 'Poi Acui', 'binjai selatan', 'po@gmail.com', '997882772', '', '2022-25-04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_hp` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `lampiran` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `bidang` varchar(100) NOT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `perusahaan`
--

INSERT INTO `perusahaan` (`id`, `nama`, `alamat`, `bidang`, `tanggal`) VALUES
(1, 'Jne Kota', 'jdahhah', 'ahhsdhhashd', '2022-04-25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
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
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `user_login`, `user_name`, `user_pass`, `user_lvl`, `user_email`, `user_status`) VALUES
(1, 'admin', 'Shanaz', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'shanaz@gmail.com', '1'),
(2, 'root', 'sumantri', '63a9f0ea7bb98050796b649e85481845', 'admin', '', '1');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dah_options`
--
ALTER TABLE `dah_options`
  ADD PRIMARY KEY (`option_id`);

--
-- Indeks untuk tabel `mitra`
--
ALTER TABLE `mitra`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dah_options`
--
ALTER TABLE `dah_options`
  MODIFY `option_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `mitra`
--
ALTER TABLE `mitra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;