-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Nov 2019 pada 03.58
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_project1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id` int(11) NOT NULL,
  `code_user` int(3) NOT NULL,
  `code_goods` int(3) NOT NULL,
  `goods_name` varchar(64) NOT NULL,
  `lots` int(3) NOT NULL,
  `price` bigint(8) NOT NULL,
  `note` text NOT NULL,
  `date_entered` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_goods`
--

CREATE TABLE `tbl_goods` (
  `id` int(11) NOT NULL,
  `code_goods` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` bigint(8) NOT NULL,
  `stock` int(3) NOT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_purchase`
--

CREATE TABLE `tbl_purchase` (
  `id` int(11) NOT NULL,
  `transaction_code` int(10) NOT NULL,
  `user_code` int(10) NOT NULL,
  `goods_code` int(10) NOT NULL,
  `goods_name` varchar(255) NOT NULL,
  `lots` int(3) NOT NULL,
  `price` bigint(8) NOT NULL,
  `note` text NOT NULL,
  `shipping_address` text NOT NULL,
  `transaction_date` date NOT NULL,
  `purchase_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_transaction`
--

CREATE TABLE `tbl_transaction` (
  `id` int(11) NOT NULL,
  `code` int(10) NOT NULL,
  `user_code` int(10) NOT NULL,
  `goods_code` int(10) NOT NULL,
  `goods_name` varchar(255) NOT NULL,
  `lots` int(3) NOT NULL,
  `price` bigint(8) NOT NULL,
  `note` text NOT NULL,
  `shipping_address` text NOT NULL,
  `proof` text NOT NULL,
  `date_entered` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `code` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `birth` date NOT NULL,
  `email` varchar(64) NOT NULL,
  `phone_number` varchar(14) NOT NULL,
  `address` text NOT NULL,
  `picture` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `code`, `name`, `username`, `password`, `birth`, `email`, `phone_number`, `address`, `picture`) VALUES
(4, 2147483647, 'M Alfi Gufron', 'user', '$2y$10$C/MWgjfybchmoSgYsfVjh..QqQz84mij6XCLQw4SKJG5mWHANifRa', '2019-11-01', 'alfigufron21@gmail.com', '089675247929', 'Bogor', '26user.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_goods`
--
ALTER TABLE `tbl_goods`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_purchase`
--
ALTER TABLE `tbl_purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_goods`
--
ALTER TABLE `tbl_goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_purchase`
--
ALTER TABLE `tbl_purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
