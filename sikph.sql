-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 16, 2020 at 02:22 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.0.15

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
-- Table structure for table `tbl_about_klinik`
--

CREATE TABLE `tbl_about_klinik` (
  `id_about_klinik` int(11) NOT NULL,
  `nama_klinik` varchar(256) NOT NULL,
  `ketrangan_klinik` varchar(256) NOT NULL,
  `jam_buka_kninik` time NOT NULL,
  `jam_tutup_kninik` time NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_antrian_pasien`
--

CREATE TABLE `tbl_antrian_pasien` (
  `id_antrian_pasien` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `nomor_antian_pasien` varchar(128) NOT NULL,
  `status_antrian_pasien` enum('sudah','mulai','belum') NOT NULL,
  `time_create_antrian` datetime NOT NULL,
  `time_update_antrian` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bokign_steril`
--

CREATE TABLE `tbl_bokign_steril` (
  `id_boking_steril` int(11) NOT NULL,
  `id_users_pet` int(11) NOT NULL,
  `nama_hewan_steril` varchar(256) NOT NULL,
  `id_paket_sterill` int(11) NOT NULL,
  `keterangan_tambahan_steril` varchar(256) NOT NULL,
  `time_create_boking_steril` datetime NOT NULL,
  `total_harga_steril` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_boking_groming`
--

CREATE TABLE `tbl_boking_groming` (
  `id_boking_groming` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `nama_hewan_groming` varchar(128) NOT NULL,
  `id_paket_groming` int(11) NOT NULL,
  `tempat_groming` enum('id_petshop','id_rumah') NOT NULL,
  `dijemput` enum('ya','tidak') NOT NULL,
  `keterangan_tambahan_groming` varchar(128) NOT NULL,
  `time_create_boking_groming` datetime NOT NULL,
  `total_harga_groming` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_boking_penitipan`
--

CREATE TABLE `tbl_boking_penitipan` (
  `id_boking_penitipan` int(11) NOT NULL,
  `id_users_pet` int(11) NOT NULL,
  `nama_hewan_penitipan` varchar(256) NOT NULL,
  `jumlah_hari_penitipan` varchar(128) NOT NULL,
  `id_paket_penitipan` int(11) NOT NULL,
  `keterangan_tambahan_steril` varchar(128) NOT NULL,
  `time_create_boking_steril` datetime NOT NULL,
  `total_harga_penitipan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_boking_vaksin`
--

CREATE TABLE `tbl_boking_vaksin` (
  `id_boking_vaksin` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `nama_hewan_vaksin` varchar(256) NOT NULL,
  `id_paket_vaksin` int(11) NOT NULL,
  `keterangan_tambahan_vaksin` varchar(256) NOT NULL,
  `time_create_boking_vaksin` datetime NOT NULL,
  `total_harga_vaksin` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jadwal_dokter`
--

CREATE TABLE `tbl_jadwal_dokter` (
  `id_jadwal` int(11) NOT NULL,
  `hari` varchar(128) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `id_dokter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_paket_groming`
--

CREATE TABLE `tbl_paket_groming` (
  `id_paket_groming` int(11) NOT NULL,
  `nama_paket_groming` varchar(128) NOT NULL,
  `keterangan_paket_groming` varchar(128) NOT NULL,
  `harga_paket_groming` varchar(128) NOT NULL,
  `gambar_paket_groming` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_paket_penitpan`
--

CREATE TABLE `tbl_paket_penitpan` (
  `id_paket_penitipan` int(11) NOT NULL,
  `nama_paket_penitipan` varchar(256) NOT NULL,
  `keterangan_paket_penitipan` varchar(256) NOT NULL,
  `harga_paket_penitipan` varchar(256) NOT NULL,
  `gambar_paket_penitipan` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_paket_steril`
--

CREATE TABLE `tbl_paket_steril` (
  `id_paket_steril` int(11) NOT NULL,
  `nama_paket_steril` varchar(256) NOT NULL,
  `keterangan_paket_steril` varchar(256) NOT NULL,
  `harga_paket_steril` varchar(256) NOT NULL,
  `gambar_paket_steril` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_paket_vaksin`
--

CREATE TABLE `tbl_paket_vaksin` (
  `id_paket_vaksin` int(11) NOT NULL,
  `nama_paket_vaksin` varchar(256) NOT NULL,
  `keterangan_paket_vaksin` varchar(256) NOT NULL,
  `harga_paket_vaksin` varchar(128) NOT NULL,
  `gambar_paket_vaksin` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id_users` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `level` enum('admin','dokter','pasien') NOT NULL,
  `time_login_users` datetime NOT NULL,
  `time_logout_users` datetime NOT NULL,
  `alamat_users` varchar(256) NOT NULL,
  `gambar_users` varchar(256) NOT NULL,
  `time_create_users` datetime NOT NULL,
  `time_update_users` datetime NOT NULL,
  `facebook_users` varchar(128) NOT NULL,
  `youtube_users` varchar(128) NOT NULL,
  `twitter_users` varchar(128) NOT NULL,
  `instagram_users` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_about_klinik`
--
ALTER TABLE `tbl_about_klinik`
  ADD PRIMARY KEY (`id_about_klinik`);

--
-- Indexes for table `tbl_antrian_pasien`
--
ALTER TABLE `tbl_antrian_pasien`
  ADD PRIMARY KEY (`id_antrian_pasien`);

--
-- Indexes for table `tbl_bokign_steril`
--
ALTER TABLE `tbl_bokign_steril`
  ADD PRIMARY KEY (`id_boking_steril`);

--
-- Indexes for table `tbl_boking_groming`
--
ALTER TABLE `tbl_boking_groming`
  ADD PRIMARY KEY (`id_boking_groming`);

--
-- Indexes for table `tbl_boking_penitipan`
--
ALTER TABLE `tbl_boking_penitipan`
  ADD PRIMARY KEY (`id_boking_penitipan`);

--
-- Indexes for table `tbl_boking_vaksin`
--
ALTER TABLE `tbl_boking_vaksin`
  ADD PRIMARY KEY (`id_boking_vaksin`);

--
-- Indexes for table `tbl_jadwal_dokter`
--
ALTER TABLE `tbl_jadwal_dokter`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `tbl_paket_groming`
--
ALTER TABLE `tbl_paket_groming`
  ADD PRIMARY KEY (`id_paket_groming`);

--
-- Indexes for table `tbl_paket_penitpan`
--
ALTER TABLE `tbl_paket_penitpan`
  ADD PRIMARY KEY (`id_paket_penitipan`);

--
-- Indexes for table `tbl_paket_steril`
--
ALTER TABLE `tbl_paket_steril`
  ADD PRIMARY KEY (`id_paket_steril`);

--
-- Indexes for table `tbl_paket_vaksin`
--
ALTER TABLE `tbl_paket_vaksin`
  ADD PRIMARY KEY (`id_paket_vaksin`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_about_klinik`
--
ALTER TABLE `tbl_about_klinik`
  MODIFY `id_about_klinik` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_antrian_pasien`
--
ALTER TABLE `tbl_antrian_pasien`
  MODIFY `id_antrian_pasien` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_bokign_steril`
--
ALTER TABLE `tbl_bokign_steril`
  MODIFY `id_boking_steril` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_boking_groming`
--
ALTER TABLE `tbl_boking_groming`
  MODIFY `id_boking_groming` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_boking_penitipan`
--
ALTER TABLE `tbl_boking_penitipan`
  MODIFY `id_boking_penitipan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_boking_vaksin`
--
ALTER TABLE `tbl_boking_vaksin`
  MODIFY `id_boking_vaksin` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_jadwal_dokter`
--
ALTER TABLE `tbl_jadwal_dokter`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_paket_groming`
--
ALTER TABLE `tbl_paket_groming`
  MODIFY `id_paket_groming` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_paket_penitpan`
--
ALTER TABLE `tbl_paket_penitpan`
  MODIFY `id_paket_penitipan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_paket_steril`
--
ALTER TABLE `tbl_paket_steril`
  MODIFY `id_paket_steril` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_paket_vaksin`
--
ALTER TABLE `tbl_paket_vaksin`
  MODIFY `id_paket_vaksin` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
