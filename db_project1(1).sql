-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2019 at 08:48 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

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
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `code` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `code`, `name`, `username`, `password`) VALUES
(1, 81501283, 'M Alfi Gufron', 'admin', '$2y$10$L6Np987xOu6VrhdAVmRd5.zs1B5MGPbv6hio75y9vkX35sy4.qota');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id` int(11) NOT NULL,
  `codeuser` int(64) NOT NULL,
  `codegoods` int(64) NOT NULL,
  `goodsname` varchar(64) NOT NULL,
  `lots` int(64) NOT NULL,
  `size` varchar(5) NOT NULL,
  `price` bigint(32) NOT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goods`
--

CREATE TABLE `tbl_goods` (
  `id` int(11) NOT NULL,
  `code_goods` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `picture` text NOT NULL,
  `price` bigint(8) NOT NULL,
  `stock` int(3) NOT NULL,
  `note` text NOT NULL,
  `category` enum('clothes','pants','','') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_goods`
--

INSERT INTO `tbl_goods` (`id`, `code_goods`, `name`, `picture`, `price`, `stock`, `note`, `category`) VALUES
(4, 15164823, 'Barang 1', '5415164823.jpg', 120000, 20, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'clothes'),
(5, 15523495, 'Barang 2', '3715523495.jpg', 200000, 10, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'clothes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `transaction_code` int(15) NOT NULL,
  `user_code` int(10) NOT NULL,
  `goods_code` int(10) NOT NULL,
  `goods_name` varchar(255) NOT NULL,
  `lots` int(3) NOT NULL,
  `price` bigint(8) NOT NULL,
  `note` text NOT NULL,
  `shipping_address` text NOT NULL,
  `proof` text NOT NULL DEFAULT 'Belum ada bukti pembayaran',
  `date_entered` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `transaction_code`, `user_code`, `goods_code`, `goods_name`, `lots`, `price`, `note`, `shipping_address`, `proof`, `date_entered`) VALUES
(1, 2147483647, 99384060, 15164823, 'Barang 1', 2, 240000, 'sadasdasdadasdasdhasjdahsdhadhasdhakshdkjhaskdjhkashdkjashdkhaskdjkjasdasbdhsabdhbasjdhaubdsahbdhbwjhbajsbdjbwjbasbdjabd', 'asjdkhaskdhkahsdkhaksdhkahdkhaskdhkajshdkahskdhkashdkahskdhaskdhasjdkhaskdhkahsdkhaksdhkahdkhaskdhkajshdkahskdhkashdkahskdhaskdh', 'Belum ada bukti pembayaran', '0000-00-00'),
(2, 2147483647, 99384060, 15164823, 'Barang 1', 2, 240000, 'ashdkjasdkagdaksjdhkajhsdkhaksdhkahd', 'asjdkhaskdhkahsdkhaksdhkahdkhaskdhkajshdkahskdhkashdkahskdhaskdhasjdkhaskdhkahsdkhaksdhkahdkhaskdhkajshdkahskdhkashdkahskdhaskdh', 'Belum ada bukti pembayaran', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaction`
--

CREATE TABLE `tbl_transaction` (
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
-- Table structure for table `tbl_user`
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
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `code`, `name`, `username`, `password`, `birth`, `email`, `phone_number`, `address`, `picture`) VALUES
(1, 99384060, 'Muhammad Alfi Gufron', 'admin', '$2y$10$kQkVoirPtF5ZdEwgdcUO2upUg6LurdTU9dMhL1/FI1mV5SYBYheVy', '2019-11-01', 'alfigufron21@gmail.com', '089675247929', 'asjdkhaskdhkahsdkhaksdhkahdkhaskdhkajshdkahskdhkashdkahskdhaskdhasjdkhaskdhkahsdkhaksdhkahdkhaskdhkajshdkahskdhkashdkahskdhaskdh', '13admin.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_goods`
--
ALTER TABLE `tbl_goods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_goods`
--
ALTER TABLE `tbl_goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
