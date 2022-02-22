-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2021 at 10:48 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `indorental`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `isi_artikel` text NOT NULL,
  `jenis_artikel` varchar(35) NOT NULL,
  `hashtag` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `judul`, `gambar`, `isi_artikel`, `jenis_artikel`, `hashtag`) VALUES
(1, 'Dewi Cantik', 'Artikel informasi', 'Description\r\n\r\nSessions are wonderful ways to pass variables. All you need to do is start a session by session_start();Then all the variables you store within a $_SESSION, you can access it from anywhere on the server. Here is an example:  ', 'ggg', '60048d097aad0.jpg'),
(2, 'Dewi Cantik', 'Artikel testimoni', 'Description\r\n\r\nSessions are wonderful ways to pass variables. All you need to do is start a session by session_start();Then all the variables you store within a $_SESSION, you can access it from anywhere on the server. Here is an example:  ', 'ggg', '60048d26e60c3.jpg'),
(3, 'Dewi Cantik', 'Artikel testimoni', 'Description\r\n\r\nSessions are wonderful ways to pass variables. All you need to do is start a session by session_start();Then all the variables you store within a $_SESSION, you can access it from anywhere on the server. Here is an example:  ', 'ggg', '60048d3b40120.jpg'),
(4, 'Dewi Cantik', 'Artikel testimoni', 'Description\r\n\r\nSessions are wonderful ways to pass variables. All you need to do is start a session by session_start();Then all the variables you store within a $_SESSION, you can access it from anywhere on the server. Here is an example:  ', 'ggg', '60048d7d3441e.jpg'),
(5, 'Artikel', 'Artikel informasi', 'lorem ipsu,', 'hhhhh, hhhh, ', '60055107315ed.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id_booking` int(11) NOT NULL,
  `id_mobil` int(11) NOT NULL,
  `no_pemesanan` varchar(5) NOT NULL,
  `tgl_pinjam` datetime NOT NULL,
  `tgl_kembali` datetime NOT NULL,
  `pengambilan` text NOT NULL,
  `transisi_matic` varchar(11) NOT NULL,
  `biaya` varchar(10) NOT NULL,
  `no_WA` varchar(13) NOT NULL,
  `validasi_pemesanan` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id_booking`, `id_mobil`, `no_pemesanan`, `tgl_pinjam`, `tgl_kembali`, `pengambilan`, `transisi_matic`, `biaya`, `no_WA`, `validasi_pemesanan`) VALUES
(32, 2, '8440', '2021-01-23 22:24:00', '2021-01-24 22:24:00', 'Antar mobil ke tempat peminjamcatatan : jsanjasg fahjfbsfhja ahajbnahd', '0', 'IDR. 27500', '089636326999', NULL),
(33, 2, '1785', '2021-01-23 22:24:00', '2021-01-24 22:24:00', 'Antar mobil ke tempat peminjam. Catatan : jsanjasg fahjfbsfhja ahajbnahd', '0', 'IDR. 27500', '089636326999', NULL),
(34, 2, '4239', '2021-01-19 18:09:00', '2021-01-20 18:09:00', 'Antar mobil ke tempat peminjam. Catatan : abc def ghj klm nop rst uvw ', '0', 'IDR. 27500', '089636326999', NULL),
(37, 2, '1501', '2021-01-19 18:14:00', '2021-01-21 18:14:00', 'Ambil mobil ke kantor', '0', 'IDR. 52500', '089636326999', NULL),
(38, 2, '6837', '2021-01-19 18:14:00', '2021-01-21 18:14:00', 'Ambil mobil ke kantor', '0', 'IDR. 52500', '089636326999', NULL),
(39, 2, '9171', '2021-01-19 18:14:00', '2021-01-21 18:14:00', 'Ambil mobil ke kantor', 'matic', 'IDR. 52500', '089636326999', NULL),
(40, 2, '3584', '2021-01-19 18:14:00', '2021-01-21 18:14:00', 'Ambil mobil ke kantor', 'matic', 'IDR. 52500', '089636326999', NULL),
(41, 2, '4102', '2021-01-19 18:14:00', '2021-01-21 18:14:00', 'Ambil mobil ke kantor', 'matic', 'IDR. 52500', '089636326999', NULL),
(42, 2, '8448', '2021-01-19 18:14:00', '2021-01-21 18:14:00', 'Ambil mobil ke kantor', 'matic', 'IDR. 52500', '089636326999', NULL),
(43, 2, '4613', '2021-01-19 18:14:00', '2021-01-21 18:14:00', 'Ambil mobil ke kantor', 'matic', 'IDR. 52500', '089636326999', NULL),
(44, 1, '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1', '1', '1', NULL),
(45, 1, '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1', '1', '1', NULL),
(46, 1, '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1', '1', '1', NULL),
(47, 2, '6371', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Ambil mobil ke kantor', 'matic', 'IDR. 27500', '089636326999', NULL),
(48, 2, '1391', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Ambil mobil ke kantor', 'matic', 'IDR. 27500', '089636326999', NULL),
(49, 3, '5039', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Antar mobil ke tempat peminjam. Catatan : ', 'manual', 'IDR. 20000', '', NULL),
(50, 3, '1828', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Antar mobil ke tempat peminjam. Catatan : ', 'manual', 'IDR. 20000', '', NULL),
(51, 3, '5072', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Ambil mobil ke kantor', 'matic', 'IDR. 77500', '089636326999', NULL),
(52, 3, '4808', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Ambil mobil ke kantor', 'matic', 'IDR. 77500', '089636326999', NULL),
(53, 3, '5435', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Ambil mobil ke kantor', 'matic', 'IDR. 77500', '089636326999', NULL),
(54, 3, '2580', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Ambil mobil ke kantor', 'matic', 'IDR. 77500', '089636326999', NULL),
(55, 3, '9806', '2021-01-19 23:32:00', '2021-01-22 23:32:00', 'Ambil mobil ke kantor', 'matic', 'IDR. 77500', '089636326999', NULL),
(56, 1, '6654', '2021-01-18 23:42:00', '2021-01-19 23:42:00', 'Ambil mobil ke kantor', 'matic', 'IDR. 27500', '089636326999', NULL),
(57, 1, '8748', '2021-01-18 23:42:00', '2021-01-19 23:42:00', 'Ambil mobil ke kantor', 'matic', 'IDR. 27500', '089636326999', NULL),
(58, 2, '4729', '1970-01-01 01:00:00', '1970-01-01 01:00:00', '', '', '', '', NULL),
(59, 2, '1394', '1970-01-01 01:00:00', '1970-01-01 01:00:00', '', '', '', '', NULL),
(60, 2, '5795', '1970-01-01 01:00:00', '1970-01-01 01:00:00', '', '', '', '', NULL),
(61, 2, '2261', '1970-01-01 01:00:00', '1970-01-01 01:00:00', 'Ambil ke kantor', 'matic', 'IDR. 27500', '', NULL),
(62, 1, '5216', '2021-01-19 16:08:00', '2021-01-20 16:08:00', 'Ambil mobil ke kantor', 'matic', 'IDR. 27500', '089636326999', NULL),
(63, 1, '6118', '2021-01-19 16:08:00', '2021-01-20 16:08:00', 'Ambil mobil ke kantor', 'matic', 'IDR. 27500', '089636326999', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id_gallery` int(11) NOT NULL,
  `photo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `list_mobil`
--

CREATE TABLE `list_mobil` (
  `id_mobil` int(11) NOT NULL,
  `nama_mobil` varchar(65) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `per12` int(11) DEFAULT NULL,
  `per24` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `list_mobil`
--

INSERT INTO `list_mobil` (`id_mobil`, `nama_mobil`, `jenis`, `deskripsi`, `gambar`, `per12`, `per24`) VALUES
(1, 'Ayla', 'City Car', 'lorem hausius kamu aku bahagia. Pokokmen kita harus bersama, udah gitu aja titikk wkwkwkwkwkwkwkwkwkwk', '60051e1493304.jpg', 200000, 250000),
(2, 'xenia', 'Family car', 'Pagination links are customizable for different circumstances. Use .disabled for links that appear un-clickable and .active to indicate the current page.While the .disabled class uses pointe', '60054f5aa2079.png', 200000, 250000),
(3, 'mobilio', 'VIP', 'Pagination links are customizable for different circumstances. Use .disabled for links that appear un-clickable and .active to indicate the current page.\r\n\r\nWhile the .disabled class uses pointe', 'vvv,jpg', NULL, 160000),
(8, 'Mobilio', 'Family Car', 'Mobil Family car ini memiliki 7 tempat duduk/ seater. Biarpun jumlah seater dalam mobil ini banyak, namun deasinnya tetap trendy dan minimalis. Dilengkapi pilihan untuk Anda yang menginginkan transisi matic', '600558bc05125.png', 200000, 250000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`),
  ADD KEY `id_mobil` (`id_mobil`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id_gallery`);

--
-- Indexes for table `list_mobil`
--
ALTER TABLE `list_mobil`
  ADD PRIMARY KEY (`id_mobil`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id_gallery` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `list_mobil`
--
ALTER TABLE `list_mobil`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `fk_booking` FOREIGN KEY (`id_mobil`) REFERENCES `list_mobil` (`id_mobil`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
