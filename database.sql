-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Okt 2021 pada 12.13
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk-pembagian-project`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alternative_criteria`
--

CREATE TABLE `alternative_criteria` (
  `id` int(4) NOT NULL,
  `criteria_id` int(4) NOT NULL,
  `weight` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `alternative_data`
--

CREATE TABLE `alternative_data` (
  `id` int(4) NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `criteria`
--

CREATE TABLE `criteria` (
  `id` int(4) NOT NULL,
  `name` varchar(60) NOT NULL,
  `weight` double NOT NULL,
  `attribute` enum('cost','benefit') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `email_confirm`
--

CREATE TABLE `email_confirm` (
  `id` int(11) NOT NULL,
  `type` varchar(40) NOT NULL,
  `user_uid` varchar(40) NOT NULL,
  `confirm_code` int(6) NOT NULL,
  `expire_date` datetime NOT NULL,
  `status` enum('unconfirmed','confirmed') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `project`
--

CREATE TABLE `project` (
  `id` int(4) NOT NULL,
  `name` varchar(40) NOT NULL,
  `category` int(4) NOT NULL,
  `area` varchar(20) DEFAULT NULL,
  `budget` double NOT NULL,
  `deadline` date DEFAULT NULL,
  `status` enum('in-progress','not-completed','finished') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `project_category`
--

CREATE TABLE `project_category` (
  `id` int(4) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(2) NOT NULL,
  `role` enum('admin','studio','freelancer') NOT NULL,
  `email` varchar(40) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `full_name` varchar(40) NOT NULL,
  `photo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `role`, `email`, `username`, `password`, `full_name`, `photo`) VALUES
(1, 'admin', 'agungmasda29@gmail.com', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Administrator', 'user-profile-1.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alternative_criteria`
--
ALTER TABLE `alternative_criteria`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `alternative_data`
--
ALTER TABLE `alternative_data`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `criteria`
--
ALTER TABLE `criteria`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `email_confirm`
--
ALTER TABLE `email_confirm`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `project_category`
--
ALTER TABLE `project_category`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alternative_criteria`
--
ALTER TABLE `alternative_criteria`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `alternative_data`
--
ALTER TABLE `alternative_data`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `criteria`
--
ALTER TABLE `criteria`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `email_confirm`
--
ALTER TABLE `email_confirm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `project`
--
ALTER TABLE `project`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `project_category`
--
ALTER TABLE `project_category`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
