-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 27 Jan 2021 pada 08.57
-- Versi Server: 10.1.9-MariaDB
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sikph`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_bookings`
--

CREATE TABLE `tbl_bookings` (
  `id_bookings` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `groming_id` int(11) NOT NULL,
  `bookings_name` varchar(128) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` varchar(128) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_bookings`
--

INSERT INTO `tbl_bookings` (`id_bookings`, `invoice_id`, `groming_id`, `bookings_name`, `qty`, `harga`, `created_at`) VALUES
(7, 4, 1, 'Groming 1', 1, '100000', '2021-01-22 15:34:13'),
(8, 4, 2, 'groming 2', 1, '210000', '2021-01-22 15:34:13'),
(9, 4, 3, 'groming 3', 2, '320000', '2021-01-22 15:34:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_invoices`
--

CREATE TABLE `tbl_invoices` (
  `id_invoices` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoices_name` varchar(128) NOT NULL,
  `invoices_tlp` varchar(256) NOT NULL,
  `invoices_address` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_invoices`
--

INSERT INTO `tbl_invoices` (`id_invoices`, `user_id`, `invoices_name`, `invoices_tlp`, `invoices_address`, `created_at`) VALUES
(4, 7, 'Abdul Rosyid', '02937294', 'Bangko', '2021-01-22 15:34:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_bookings`
--
ALTER TABLE `tbl_bookings`
  ADD PRIMARY KEY (`id_bookings`);

--
-- Indexes for table `tbl_invoices`
--
ALTER TABLE `tbl_invoices`
  ADD PRIMARY KEY (`id_invoices`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_bookings`
--
ALTER TABLE `tbl_bookings`
  MODIFY `id_bookings` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_invoices`
--
ALTER TABLE `tbl_invoices`
  MODIFY `id_invoices` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
