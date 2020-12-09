-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 03 Des 2020 pada 21.59
-- Versi server: 10.3.25-MariaDB-log-cll-lve
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `khoiron1_sikph`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_about_klinik`
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
-- Struktur dari tabel `tbl_antrian_pasien`
--

CREATE TABLE `tbl_antrian_pasien` (
  `id_antrian_pasien` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `nomor_antrian_pasien` varchar(128) NOT NULL,
  `status_antrian_pasien` enum('sudah','mulai','belum','waiting','selesai_administrasi','giliran_anda') NOT NULL,
  `time_create_antrian` datetime NOT NULL,
  `time_update_antrian` datetime NOT NULL,
  `id_status_antrian` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_antrian_pasien`
--

INSERT INTO `tbl_antrian_pasien` (`id_antrian_pasien`, `id_pasien`, `id_dokter`, `nomor_antrian_pasien`, `status_antrian_pasien`, `time_create_antrian`, `time_update_antrian`, `id_status_antrian`) VALUES
(1, 5, 4, '', 'selesai_administrasi', '2020-11-28 23:13:03', '2020-11-29 00:12:05', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_boking_groming`
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
  `total_harga_groming` varchar(128) NOT NULL,
  `date_groming` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_boking_groming`
--

INSERT INTO `tbl_boking_groming` (`id_boking_groming`, `id_pasien`, `nama_hewan_groming`, `id_paket_groming`, `tempat_groming`, `dijemput`, `keterangan_tambahan_groming`, `time_create_boking_groming`, `total_harga_groming`, `date_groming`) VALUES
(1, 5, 'Qui est aut amet ei', 0, 'id_petshop', 'ya', 'Enim qui ut rerum re', '2020-11-28 15:40:55', '', NULL),
(2, 3, 'asas', 1, 'id_petshop', 'ya', 'sas', '2020-11-28 15:48:08', 'Officia minus earum ', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_boking_penitipan`
--

CREATE TABLE `tbl_boking_penitipan` (
  `id_boking_penitipan` int(11) NOT NULL,
  `id_users_pet` int(11) NOT NULL,
  `nama_hewan_penitipan` varchar(256) NOT NULL,
  `jumlah_hari_penitipan` varchar(128) NOT NULL,
  `id_paket_penitipan` int(11) NOT NULL,
  `keterangan_tambahan_penitipan` varchar(128) NOT NULL,
  `time_create_boking_penitipan` datetime NOT NULL,
  `total_harga_penitipan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_boking_penitipan`
--

INSERT INTO `tbl_boking_penitipan` (`id_boking_penitipan`, `id_users_pet`, `nama_hewan_penitipan`, `jumlah_hari_penitipan`, `id_paket_penitipan`, `keterangan_tambahan_penitipan`, `time_create_boking_penitipan`, `total_harga_penitipan`) VALUES
(1, 5, 'Animi incididunt qu', '3', 0, 'sas', '2020-11-28 15:41:23', 'NaN'),
(2, 8, 'Aliquam iusto molest', '53', 0, 'Aut ea rerum consequ', '2020-11-28 15:46:48', 'Dolore voluptate des'),
(3, 8, 'asas', '3', 4, 'asas', '2020-11-28 15:47:02', 'NaN'),
(4, 5, 'andre', '1', 4, 'oke', '2020-11-29 10:38:26', 'NaN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_boking_steril`
--

CREATE TABLE `tbl_boking_steril` (
  `id_boking_steril` int(11) NOT NULL,
  `id_users_pet` int(11) NOT NULL,
  `nama_hewan_steril` varchar(256) NOT NULL,
  `id_paket_steril` int(11) NOT NULL,
  `keterangan_tambahan_steril` varchar(256) NOT NULL,
  `time_create_boking_steril` datetime NOT NULL,
  `total_harga_steril` varchar(128) NOT NULL,
  `id_dokter_steril` int(11) DEFAULT NULL,
  `status_boking_steril` enum('sudah','antri','belum','visit','visit_selesai','menuju','ditangani','waiting','giliran_anda','mulai','selesai_administrasi') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_boking_steril`
--

INSERT INTO `tbl_boking_steril` (`id_boking_steril`, `id_users_pet`, `nama_hewan_steril`, `id_paket_steril`, `keterangan_tambahan_steril`, `time_create_boking_steril`, `total_harga_steril`, `id_dokter_steril`, `status_boking_steril`) VALUES
(1, 8, 'Pemeliharaan 1', 1, '', '2020-11-28 15:46:10', 'Aut officiis dolorib', 4, 'belum'),
(2, 8, 'Pemeliharaan 2', 1, '', '2020-11-28 15:46:18', 'Aut officiis dolorib', 6, 'belum'),
(3, 5, 'andre', 1, 'Sudah di steril dan sedang dilakuakn perawatan hingga kucng benar\" fit dan siap dibawa pulang', '2020-11-28 23:04:14', 'Aut officiis dolorib', 4, 'selesai_administrasi'),
(4, 5, 'manul', 1, '', '2020-11-29 00:30:22', 'Aut officiis dolorib', 4, 'visit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_boking_vaksin`
--

CREATE TABLE `tbl_boking_vaksin` (
  `id_boking_vaksin` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `nama_hewan_vaksin` varchar(256) NOT NULL,
  `id_paket_vaksin` int(11) NOT NULL,
  `keterangan_tambahan_vaksin` varchar(256) NOT NULL,
  `time_create_boking_vaksin` datetime NOT NULL,
  `total_harga_vaksin` varchar(128) NOT NULL,
  `id_dokter_vaksin` int(11) DEFAULT NULL,
  `status_boking_vaksin` enum('sudah','antri','belum','visit','visit_selesai','menuju','ditangani','waiting','giliran_anda','mulai','selesai_administrasi') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_boking_vaksin`
--

INSERT INTO `tbl_boking_vaksin` (`id_boking_vaksin`, `id_pasien`, `nama_hewan_vaksin`, `id_paket_vaksin`, `keterangan_tambahan_vaksin`, `time_create_boking_vaksin`, `total_harga_vaksin`, `id_dokter_vaksin`, `status_boking_vaksin`) VALUES
(1, 8, 'Kucing 1', 1, '', '2020-11-28 15:45:32', 'Perferendis cillum v', 6, 'belum'),
(2, 8, 'Kucing 2', 1, '', '2020-11-28 15:45:48', 'Perferendis cillum v', 6, 'belum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jadwal_dokter`
--

CREATE TABLE `tbl_jadwal_dokter` (
  `id_jadwal` int(11) NOT NULL,
  `hari` varchar(128) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `id_dokter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_jadwal_dokter`
--

INSERT INTO `tbl_jadwal_dokter` (`id_jadwal`, `hari`, `jam_mulai`, `jam_selesai`, `id_dokter`) VALUES
(1, 'senin', '22:52:00', '21:52:00', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_paket_groming`
--

CREATE TABLE `tbl_paket_groming` (
  `id_paket_groming` int(11) NOT NULL,
  `nama_paket_groming` varchar(128) NOT NULL,
  `keterangan_paket_groming` varchar(128) NOT NULL,
  `harga_paket_groming` varchar(128) NOT NULL,
  `gambar_paket_groming` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_paket_groming`
--

INSERT INTO `tbl_paket_groming` (`id_paket_groming`, `nama_paket_groming`, `keterangan_paket_groming`, `harga_paket_groming`, `gambar_paket_groming`) VALUES
(2, 'KUCING KITTEN BB< 2,5 Kg', '-', '25000', 'WhatsApp_Image_2020-12-02_at_11_27_27.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_paket_penitpan`
--

CREATE TABLE `tbl_paket_penitpan` (
  `id_paket_penitipan` int(11) NOT NULL,
  `nama_paket_penitipan` varchar(256) NOT NULL,
  `keterangan_paket_penitipan` varchar(256) NOT NULL,
  `harga_paket_penitipan` varchar(256) NOT NULL,
  `gambar_paket_penitipan` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_paket_penitpan`
--

INSERT INTO `tbl_paket_penitpan` (`id_paket_penitipan`, `nama_paket_penitipan`, `keterangan_paket_penitipan`, `harga_paket_penitipan`, `gambar_paket_penitipan`) VALUES
(5, 'KUCING ANAKAN', 'Kucing  sehat tidak kutuan, jamuran, dan sudah vaksinasi diutamakan. Harga belum dengan biaya pakan dari TIMMY-VETCARE. Penitipan lebih dari 6 hari gratis grooming sehat 1x', '20000', 'WhatsApp_Image_2020-12-02_at_11_27_27.jpeg'),
(6, 'KUCING DEWASA', 'Kucing sehat tidak kutuan, jamuran, dan sudah vaksinasi diutamakan. Harga belum dengan biaya pakan dari TIMMY-VETCARE. Penitipan lebih dari 6 hari gratis grooming sehat 1x', '25000', 'WhatsApp_Image_2020-12-02_at_11_27_271.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_paket_steril`
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
-- Struktur dari tabel `tbl_paket_vaksin`
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
-- Struktur dari tabel `tbl_users`
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
  `telepon_users` varchar(128) NOT NULL,
  `facebook_users` varchar(128) NOT NULL,
  `youtube_users` varchar(128) NOT NULL,
  `twitter_users` varchar(128) NOT NULL,
  `instagram_users` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_users`
--

INSERT INTO `tbl_users` (`id_users`, `name`, `email`, `password`, `level`, `time_login_users`, `time_logout_users`, `alamat_users`, `gambar_users`, `time_create_users`, `time_update_users`, `telepon_users`, `facebook_users`, `youtube_users`, `twitter_users`, `instagram_users`) VALUES
(1, 'Shoshana Montgomery', 'hi@abdulrosyid.com', '$2y$10$G5mZon.6n199BZF8Xp0lK.CCZRzPFaqBapbNLd1OE20v.Lht7Rq4q', 'admin', '2020-11-28 15:47:29', '2020-11-28 15:44:41', 'Nisi debitis vero no', '35526165.png', '2020-11-16 09:35:24', '0000-00-00 00:00:00', '081548576555', 'Abdul Rosyid', 'Quis voluptatem qui ', 'Aut commodi ut repre', 'Ut nemo aspernatur q'),
(2, 'putri', 'putri@gmail.com', '$2y$10$3bbhpuNkyc3c/96L4Lu/du4W1n0hQXVLK1ZlxG5ezHaw.A25Jg3si', 'admin', '2020-12-02 11:22:24', '2020-12-01 14:15:46', 'Jl. Jambu Batua', 'foto_bung_hatta.jpg', '2020-11-16 21:26:17', '0000-00-00 00:00:00', '08512387434', 'oks', 'dzs', 'dss', 'dsse'),
(3, 'dory', 'dory@gmail.com', '$2y$10$A3WDMSj3Pn7bgH9BElmTsOQmba9M4eqA3OXkGIWycf3G02s21BrqO', 'pasien', '2020-11-20 18:05:15', '2020-11-20 18:06:56', 'Jl. Jambu Batu', 'admin1.png', '2020-11-16 21:35:05', '0000-00-00 00:00:00', '08512387434', 'ok', 'd', 'd', 'd'),
(4, 'dokter.putri', 'dokter.putri@gmail.com', '$2y$10$57Tu2ib7rFVpEzAbZNXCHuoHPYkmh6Am6LgDTc6rbFOGSsXDteISe', 'dokter', '2020-11-29 10:27:40', '2020-11-29 10:32:43', 'Jl. Jambu Batu', '088421900_1588036966-aj.jpg', '2020-11-16 21:53:14', '0000-00-00 00:00:00', '08512387434', 'ok', 'dz', 'd', 'd'),
(5, 'cio', 'cio@gmail.com', '$2y$10$3eDEyI.nU.Hy0PsHb4qu8evWKBLASJ17DpG.KOStEpckG7WsSb/ii', 'pasien', '2020-11-29 10:42:10', '2020-11-29 11:04:54', '', '', '2020-11-17 12:42:28', '0000-00-00 00:00:00', '', '', '', '', ''),
(6, 'arka dokter', 'dokter.arka@gmail.com', '$2y$10$BY2S/r7llncrGNOZTGZL0.nmnBrhTpHV5FS8BkyvLaiUCBAkSHzr.', 'dokter', '2020-11-20 13:37:08', '2020-11-20 13:38:52', 'Jl. Jambu Batu', '350x230-img-36097-hyun-bin.jpg', '2020-11-18 10:25:43', '0000-00-00 00:00:00', '08512387434', 'ok', 'd', 'd', 'd'),
(7, 'indah harni', 'indah@gmail.com', '$2y$10$OM5HlPGuWWnOK5ufvy7Ds.EACX5cjsvyjjJMKkadi2VxK1qb1VXRm', 'pasien', '2020-11-24 17:36:32', '0000-00-00 00:00:00', '', '', '2020-11-24 17:36:12', '0000-00-00 00:00:00', '', '', '', '', ''),
(8, 'Abdul Rosyid', 'ab.rosyid98@gmail.com', '$2y$10$5YQqbyCk/h0wuBqFo060o.4hZa5ZXaqwLUqXxEb.WHNdOpXPY.el.', 'pasien', '2020-11-28 15:45:08', '2020-11-28 15:47:16', '', '', '2020-11-28 15:44:59', '0000-00-00 00:00:00', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_visit_pasien`
--

CREATE TABLE `tbl_visit_pasien` (
  `id_visit_pasien` int(11) NOT NULL,
  `id_pasien` int(11) DEFAULT NULL,
  `id_dokter` int(11) DEFAULT NULL,
  `status_visit_pasien` enum('sudah','waiting','menuju','ditangani') DEFAULT NULL,
  `time_create_visit` datetime DEFAULT NULL,
  `time_update_visit` datetime DEFAULT NULL,
  `id_status_visit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_visit_pasien`
--

INSERT INTO `tbl_visit_pasien` (`id_visit_pasien`, `id_pasien`, `id_dokter`, `status_visit_pasien`, `time_create_visit`, `time_update_visit`, `id_status_visit`) VALUES
(1, 5, 4, 'waiting', '2020-11-29 00:30:26', '2020-11-29 00:30:26', 4);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_about_klinik`
--
ALTER TABLE `tbl_about_klinik`
  ADD PRIMARY KEY (`id_about_klinik`);

--
-- Indeks untuk tabel `tbl_antrian_pasien`
--
ALTER TABLE `tbl_antrian_pasien`
  ADD PRIMARY KEY (`id_antrian_pasien`);

--
-- Indeks untuk tabel `tbl_boking_groming`
--
ALTER TABLE `tbl_boking_groming`
  ADD PRIMARY KEY (`id_boking_groming`);

--
-- Indeks untuk tabel `tbl_boking_penitipan`
--
ALTER TABLE `tbl_boking_penitipan`
  ADD PRIMARY KEY (`id_boking_penitipan`);

--
-- Indeks untuk tabel `tbl_boking_steril`
--
ALTER TABLE `tbl_boking_steril`
  ADD PRIMARY KEY (`id_boking_steril`);

--
-- Indeks untuk tabel `tbl_boking_vaksin`
--
ALTER TABLE `tbl_boking_vaksin`
  ADD PRIMARY KEY (`id_boking_vaksin`);

--
-- Indeks untuk tabel `tbl_jadwal_dokter`
--
ALTER TABLE `tbl_jadwal_dokter`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indeks untuk tabel `tbl_paket_groming`
--
ALTER TABLE `tbl_paket_groming`
  ADD PRIMARY KEY (`id_paket_groming`);

--
-- Indeks untuk tabel `tbl_paket_penitpan`
--
ALTER TABLE `tbl_paket_penitpan`
  ADD PRIMARY KEY (`id_paket_penitipan`);

--
-- Indeks untuk tabel `tbl_paket_steril`
--
ALTER TABLE `tbl_paket_steril`
  ADD PRIMARY KEY (`id_paket_steril`);

--
-- Indeks untuk tabel `tbl_paket_vaksin`
--
ALTER TABLE `tbl_paket_vaksin`
  ADD PRIMARY KEY (`id_paket_vaksin`);

--
-- Indeks untuk tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id_users`);

--
-- Indeks untuk tabel `tbl_visit_pasien`
--
ALTER TABLE `tbl_visit_pasien`
  ADD PRIMARY KEY (`id_visit_pasien`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_about_klinik`
--
ALTER TABLE `tbl_about_klinik`
  MODIFY `id_about_klinik` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_antrian_pasien`
--
ALTER TABLE `tbl_antrian_pasien`
  MODIFY `id_antrian_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_boking_groming`
--
ALTER TABLE `tbl_boking_groming`
  MODIFY `id_boking_groming` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_boking_penitipan`
--
ALTER TABLE `tbl_boking_penitipan`
  MODIFY `id_boking_penitipan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_boking_steril`
--
ALTER TABLE `tbl_boking_steril`
  MODIFY `id_boking_steril` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_boking_vaksin`
--
ALTER TABLE `tbl_boking_vaksin`
  MODIFY `id_boking_vaksin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_jadwal_dokter`
--
ALTER TABLE `tbl_jadwal_dokter`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_paket_groming`
--
ALTER TABLE `tbl_paket_groming`
  MODIFY `id_paket_groming` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_paket_penitpan`
--
ALTER TABLE `tbl_paket_penitpan`
  MODIFY `id_paket_penitipan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_paket_steril`
--
ALTER TABLE `tbl_paket_steril`
  MODIFY `id_paket_steril` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_paket_vaksin`
--
ALTER TABLE `tbl_paket_vaksin`
  MODIFY `id_paket_vaksin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_visit_pasien`
--
ALTER TABLE `tbl_visit_pasien`
  MODIFY `id_visit_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
