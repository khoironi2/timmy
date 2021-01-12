-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 03, 2021 at 11:07 PM
-- Server version: 5.7.24-log
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
  `nomor_antrian_pasien` varchar(128) NOT NULL,
  `status_antrian_pasien` enum('sudah','mulai','belum','waiting','selesai_administrasi','giliran_anda') NOT NULL,
  `time_create_antrian` datetime NOT NULL,
  `time_update_antrian` datetime NOT NULL,
  `id_status_antrian` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_antrian_pasien`
--

INSERT INTO `tbl_antrian_pasien` (`id_antrian_pasien`, `id_pasien`, `id_dokter`, `nomor_antrian_pasien`, `status_antrian_pasien`, `time_create_antrian`, `time_update_antrian`, `id_status_antrian`) VALUES
(1, 5, 4, '', 'selesai_administrasi', '2020-11-28 23:13:03', '2020-11-29 00:12:05', 3),
(2, 5, 4, '', 'selesai_administrasi', '2020-12-09 10:41:30', '2020-12-09 10:44:34', 5),
(3, 9, 4, '', 'belum', '2020-12-29 14:12:22', '2020-12-29 14:12:22', 6),
(4, 9, 6, '', 'belum', '2020-12-29 14:12:27', '2020-12-29 14:12:27', 7),
(5, 9, 4, '', 'belum', '2020-12-29 14:13:53', '2020-12-29 14:13:53', 7),
(6, 9, 6, '', 'belum', '2020-12-29 14:14:06', '2020-12-29 14:14:06', 10),
(7, 12, 4, '', 'belum', '2020-12-29 15:06:25', '2020-12-29 15:06:25', 9),
(8, 13, 6, '', 'belum', '2020-12-30 17:22:55', '2020-12-30 17:22:55', 10),
(9, 13, 4, '', 'belum', '2020-12-30 17:23:28', '2020-12-30 17:23:28', 12),
(10, 10, 6, '', 'belum', '2020-12-30 21:50:05', '2020-12-30 21:50:05', 4),
(11, 10, 6, '', 'belum', '2020-12-30 21:50:10', '2020-12-30 21:50:10', 5),
(12, 10, 4, '', 'belum', '2020-12-30 21:50:23', '2020-12-30 21:50:23', 6);

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
  `total_harga_groming` varchar(128) NOT NULL,
  `date_groming` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_boking_groming`
--

INSERT INTO `tbl_boking_groming` (`id_boking_groming`, `id_pasien`, `nama_hewan_groming`, `id_paket_groming`, `tempat_groming`, `dijemput`, `keterangan_tambahan_groming`, `time_create_boking_groming`, `total_harga_groming`, `date_groming`) VALUES
(1, 5, 'Qui est aut amet ei', 0, 'id_petshop', 'ya', 'Enim qui ut rerum re', '2020-11-28 15:40:55', '', NULL),
(2, 3, 'asas', 1, 'id_petshop', 'ya', 'sas', '2020-11-28 15:48:08', 'Officia minus earum ', NULL),
(3, 5, 'kucing', 2, 'id_petshop', 'ya', 'jalan gunpati timur rt 1 rw 3 , maoskidul 085826363186', '2020-12-21 22:22:48', '25000', NULL),
(4, 10, 'kucing panda', 3, 'id_petshop', 'tidak', 'sehat dan sudah vaksin', '2020-12-28 17:34:46', '35000', '2020-12-28'),
(5, 9, 'timi', 4, 'id_petshop', 'tidak', '-', '2020-12-29 14:14:47', '35000', '2020-12-29'),
(6, 9, 'mini', 5, 'id_petshop', 'ya', 'sehat', '2020-12-29 14:16:48', '50000', '2020-12-29'),
(7, 9, 'nanas', 4, 'id_petshop', 'ya', 'sehat sudah vaksin', '2020-12-29 14:17:09', '35000', '2020-12-29'),
(8, 9, 'nanas', 6, 'id_petshop', 'tidak', 'sehat banget', '2020-12-29 14:17:51', '10000', '2020-12-29'),
(9, 12, 'moi', 2, 'id_petshop', 'ya', 'sehat', '2020-12-29 15:14:07', '25000', '2020-12-29'),
(10, 13, 'popi', 3, 'id_petshop', 'tidak', 'sehat', '2020-12-30 17:24:12', '35000', '2020-12-30');

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
  `keterangan_tambahan_penitipan` varchar(128) NOT NULL,
  `time_create_boking_penitipan` datetime NOT NULL,
  `total_harga_penitipan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_boking_penitipan`
--

INSERT INTO `tbl_boking_penitipan` (`id_boking_penitipan`, `id_users_pet`, `nama_hewan_penitipan`, `jumlah_hari_penitipan`, `id_paket_penitipan`, `keterangan_tambahan_penitipan`, `time_create_boking_penitipan`, `total_harga_penitipan`) VALUES
(1, 5, 'Animi incididunt qu', '3', 0, 'sas', '2020-11-28 15:41:23', 'NaN'),
(2, 8, 'Aliquam iusto molest', '53', 0, 'Aut ea rerum consequ', '2020-11-28 15:46:48', 'Dolore voluptate des'),
(3, 8, 'asas', '3', 4, 'asas', '2020-11-28 15:47:02', 'NaN'),
(4, 5, 'andre', '1', 4, 'oke', '2020-11-29 10:38:26', 'NaN'),
(5, 5, 'Cio', '2', 5, '-', '2020-12-09 10:36:40', '40000'),
(6, 10, 'panda', '3', 6, 'bawa pakan sendiri', '2020-12-22 10:24:22', '75000'),
(7, 10, 'boni', '4', 5, 'bawa pakan sendiri', '2020-12-22 10:24:56', '80000'),
(8, 11, 'coco', '5', 6, 'sudah vaksin', '2020-12-22 10:59:19', '125000'),
(9, 10, 'ciko', '7', 6, 'sehat', '2020-12-23 08:08:15', '175000'),
(10, 9, 'cici', '5', 6, 'bawa makan sendiri', '2020-12-29 14:18:29', '125000'),
(11, 9, 'boni', '3', 6, 'sehat', '2020-12-29 14:19:01', '75000'),
(12, 9, 'mowi', '8', 5, 'sehat', '2020-12-29 14:19:22', '160000'),
(13, 13, 'popi', '5', 6, 'sehat', '2020-12-30 17:24:48', '125000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_boking_steril`
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
-- Dumping data for table `tbl_boking_steril`
--

INSERT INTO `tbl_boking_steril` (`id_boking_steril`, `id_users_pet`, `nama_hewan_steril`, `id_paket_steril`, `keterangan_tambahan_steril`, `time_create_boking_steril`, `total_harga_steril`, `id_dokter_steril`, `status_boking_steril`) VALUES
(1, 8, 'Pemeliharaan 1', 1, '', '2020-11-28 15:46:10', 'Aut officiis dolorib', 4, 'belum'),
(2, 8, 'Pemeliharaan 2', 1, '', '2020-11-28 15:46:18', 'Aut officiis dolorib', 6, 'belum'),
(3, 5, 'andre', 1, 'Sudah di steril dan sedang dilakuakn perawatan hingga kucng benar\" fit dan siap dibawa pulang', '2020-11-28 23:04:14', 'Aut officiis dolorib', 4, 'selesai_administrasi'),
(4, 5, 'manul', 1, '', '2020-11-29 00:30:22', 'Aut officiis dolorib', 4, 'visit'),
(5, 5, 'cio', 2, 'sudah di steril dan kondisi sehat', '2020-12-09 10:41:09', '150000', 4, 'selesai_administrasi'),
(6, 10, 'bobon', 2, '', '2020-12-23 08:07:24', '250000', 4, 'antri'),
(7, 9, 'coi', 3, '', '2020-12-29 14:13:00', '250000', 4, 'antri'),
(8, 9, 'bimbim', 2, '', '2020-12-29 14:13:13', '250000', 4, 'visit'),
(9, 9, 'nanas', 2, '', '2020-12-29 14:13:27', '250000', 6, 'visit'),
(10, 9, 'timi', 2, '', '2020-12-29 14:13:40', '250000', 6, 'antri'),
(11, 9, 'mimi', 2, '', '2020-12-29 14:14:18', '250000', 4, 'belum'),
(12, 13, 'mimi', 3, '', '2020-12-30 17:23:23', '250000', 4, 'antri');

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
  `total_harga_vaksin` varchar(128) NOT NULL,
  `id_dokter_vaksin` int(11) DEFAULT NULL,
  `status_boking_vaksin` enum('sudah','antri','belum','visit','visit_selesai','menuju','ditangani','waiting','giliran_anda','mulai','selesai_administrasi') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_boking_vaksin`
--

INSERT INTO `tbl_boking_vaksin` (`id_boking_vaksin`, `id_pasien`, `nama_hewan_vaksin`, `id_paket_vaksin`, `keterangan_tambahan_vaksin`, `time_create_boking_vaksin`, `total_harga_vaksin`, `id_dokter_vaksin`, `status_boking_vaksin`) VALUES
(1, 8, 'Kucing 1', 1, '', '2020-11-28 15:45:32', 'Perferendis cillum v', 6, 'belum'),
(2, 8, 'Kucing 2', 1, '', '2020-11-28 15:45:48', 'Perferendis cillum v', 6, 'belum'),
(3, 11, 'coco', 0, '', '2020-12-22 10:57:43', '', 4, 'belum'),
(4, 10, 'Bobon', 2, '', '2020-12-23 08:05:45', '200000', 6, 'antri'),
(5, 10, 'Ciko', 1, '', '2020-12-23 08:06:07', '200000', 6, 'antri'),
(6, 9, 'boni', 1, '', '2020-12-29 14:11:40', '200000', 4, 'antri'),
(7, 9, 'mowi', 1, '', '2020-12-29 14:11:58', '200000', 6, 'antri'),
(8, 9, 'cimoi', 2, '', '2020-12-29 14:12:15', '200000', 4, 'visit'),
(9, 12, 'koi', 1, '', '2020-12-29 15:04:35', '200000', 4, 'antri'),
(10, 13, 'nini', 1, '', '2020-12-30 17:22:43', '200000', 6, 'antri'),
(11, 10, 'bleki', 2, '', '2020-12-31 16:43:52', '200000', 4, 'visit');

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

--
-- Dumping data for table `tbl_jadwal_dokter`
--

INSERT INTO `tbl_jadwal_dokter` (`id_jadwal`, `hari`, `jam_mulai`, `jam_selesai`, `id_dokter`) VALUES
(1, 'senin', '22:52:00', '21:52:00', 4),
(2, 'selasa', '22:20:00', '14:00:00', 4),
(3, 'rabu', '09:41:00', '00:44:00', 6),
(4, 'jumat', '09:41:00', '11:41:00', 6),
(5, 'rabu', '09:00:00', '13:56:00', 4),
(6, 'rabu', '14:00:00', '16:57:00', 6),
(7, 'kamis', '09:00:00', '13:57:00', 4),
(8, 'kamis', '13:58:00', '16:58:00', 6),
(9, 'jumat', '09:00:00', '11:50:00', 4),
(10, 'jumat', '13:59:00', '17:00:00', 6),
(11, 'kamis', '09:20:00', '16:00:00', 4);

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

--
-- Dumping data for table `tbl_paket_groming`
--

INSERT INTO `tbl_paket_groming` (`id_paket_groming`, `nama_paket_groming`, `keterangan_paket_groming`, `harga_paket_groming`, `gambar_paket_groming`) VALUES
(2, 'Kucing Kitten BB< 2,5 Kg', '-', '25000', 'WhatsApp_Image_2020-12-02_at_11_27_27.jpeg'),
(3, 'Kucing Dewasa BB >2,5 Kg', '-', '35000', ''),
(4, 'Kucing Dewasa Short Hair', '-', '35000', ''),
(5, 'Kucing dewasa long hair', '-', '50000', ''),
(6, 'Terapi Kutu', '-', '10000', ''),
(7, 'Terapi jamur', '-', '10000', ''),
(8, 'Potong / rapikan rambut kucing', '-', '10000', ''),
(9, 'Bersih  telinga / kaki', '-', '15000', '');

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

--
-- Dumping data for table `tbl_paket_penitpan`
--

INSERT INTO `tbl_paket_penitpan` (`id_paket_penitipan`, `nama_paket_penitipan`, `keterangan_paket_penitipan`, `harga_paket_penitipan`, `gambar_paket_penitipan`) VALUES
(5, 'KUCING ANAKAN', 'Kucing  sehat tidak kutuan, jamuran, dan sudah vaksinasi diutamakan. Harga belum dengan biaya pakan dari TIMMY-VETCARE. Penitipan lebih dari 6 hari gratis grooming sehat 1x', '20000', 'WhatsApp_Image_2020-12-02_at_11_27_27.jpeg'),
(6, 'KUCING DEWASA', 'Kucing sehat tidak kutuan, jamuran, dan sudah vaksinasi diutamakan. Harga belum dengan biaya pakan dari TIMMY-VETCARE. Penitipan lebih dari 6 hari gratis grooming sehat 1x', '25000', 'WhatsApp_Image_2020-12-02_at_11_27_271.jpeg');

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

--
-- Dumping data for table `tbl_paket_steril`
--

INSERT INTO `tbl_paket_steril` (`id_paket_steril`, `nama_paket_steril`, `keterangan_paket_steril`, `harga_paket_steril`, `gambar_paket_steril`) VALUES
(2, 'Steril Kucing jantan', '.Kebiri/steril dilakukan dengan cara operasi yang tentunya harus dilakukan oleh profesional yaitu dokter hewan. Hasilnya, kucing tersebut menjadi steril sehingga tidak bisa menghasilkan keturunan dan juga mengurangi atau menghilangkan dari hasrat kawin si ', '250000', 'WhatsApp_Image_2020-07-10_at_23_08_12.jpeg'),
(3, 'Steril Kucing Betina', 'Sterilisasi merupakan langkah mengambil organ reproduksi kucing betina.', '250000', '');

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

--
-- Dumping data for table `tbl_paket_vaksin`
--

INSERT INTO `tbl_paket_vaksin` (`id_paket_vaksin`, `nama_paket_vaksin`, `keterangan_paket_vaksin`, `harga_paket_vaksin`, `gambar_paket_vaksin`) VALUES
(1, 'Vaksin F3', 'Vaksin Felocel 3 (F3) diberikan pada kucing di rentang usia 3 sampai 12 bulan untuk mencegah penyakit rhinotracheitis (gangguan saluran pernapasan), calicivirus (membuat mulut kucing berdarah-darah), dan panleukopenia (menyerang organ vital', '200000', ''),
(2, 'Vaksin F4', 'Vaksin Felocell 4 merupakan vaksin lanjutan yang diberikan satu bulan setelah pemberian vaksin F3. Tujuannya adalah untuk memberikan perlindungan pada kesehatan kucing dari ancaman penyakit chlamidiosis yang disebabkan oleh bakteri Chlamidia psittaci', '200000', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rekan_medis`
--

CREATE TABLE `tbl_rekan_medis` (
  `id` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `nama_pemilik` varchar(128) NOT NULL,
  `nama_pemeliharaan` varchar(128) NOT NULL,
  `catatan` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_rekan_medis`
--

INSERT INTO `tbl_rekan_medis` (`id`, `id_dokter`, `nama_pemilik`, `nama_pemeliharaan`, `catatan`, `created_at`) VALUES
(2, 1, 'Coba saja', 'Coba saja', 'Coba saja', '0000-00-00 00:00:00'),
(3, 1, 'Et aspernatur quasi ', 'Voluptatem laudantiu', 'Nihil ea et magni et', '0000-00-00 00:00:00'),
(4, 1, 'Reprehenderit volup', 'Quis atque id esse a', 'Nihil error dolor te', '2020-12-28 20:21:25');

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
  `telepon_users` varchar(128) NOT NULL,
  `facebook_users` varchar(128) NOT NULL,
  `youtube_users` varchar(128) NOT NULL,
  `twitter_users` varchar(128) NOT NULL,
  `instagram_users` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id_users`, `name`, `email`, `password`, `level`, `time_login_users`, `time_logout_users`, `alamat_users`, `gambar_users`, `time_create_users`, `time_update_users`, `telepon_users`, `facebook_users`, `youtube_users`, `twitter_users`, `instagram_users`) VALUES
(1, 'Shoshana Montgomery', 'hi@abdulrosyid.com', '$2y$10$G5mZon.6n199BZF8Xp0lK.CCZRzPFaqBapbNLd1OE20v.Lht7Rq4q', 'admin', '2020-11-28 15:47:29', '2020-11-28 15:44:41', 'Nisi debitis vero no', '35526165.png', '2020-11-16 09:35:24', '0000-00-00 00:00:00', '081548576555', 'Abdul Rosyid', 'Quis voluptatem qui ', 'Aut commodi ut repre', 'Ut nemo aspernatur q'),
(2, 'putri', 'putri@gmail.com', '$2y$10$3bbhpuNkyc3c/96L4Lu/du4W1n0hQXVLK1ZlxG5ezHaw.A25Jg3si', 'admin', '2020-12-31 14:29:59', '2020-12-31 14:34:45', 'Jl. Jambu Batua', 'foto_bung_hatta.jpg', '2020-11-16 21:26:17', '0000-00-00 00:00:00', '08512387434', 'oks', 'dzs', 'dss', 'dsse'),
(3, 'dory', 'dory@gmail.com', '$2y$10$A3WDMSj3Pn7bgH9BElmTsOQmba9M4eqA3OXkGIWycf3G02s21BrqO', 'pasien', '2020-11-20 18:05:15', '2020-11-20 18:06:56', 'Jl. Jambu Batu', 'admin1.png', '2020-11-16 21:35:05', '0000-00-00 00:00:00', '08512387434', 'ok', 'd', 'd', 'd'),
(4, 'dokter.putri', 'dokter.putri@gmail.com', '$2y$10$57Tu2ib7rFVpEzAbZNXCHuoHPYkmh6Am6LgDTc6rbFOGSsXDteISe', 'dokter', '2020-12-31 14:36:20', '2020-12-30 23:23:22', 'Jl. Jambu Batu', '088421900_1588036966-aj.jpg', '2020-11-16 21:53:14', '0000-00-00 00:00:00', '08512387434', 'ok', 'dz', 'd', 'd'),
(5, 'cio', 'cio@gmail.com', '$2y$10$3eDEyI.nU.Hy0PsHb4qu8evWKBLASJ17DpG.KOStEpckG7WsSb/ii', 'pasien', '2020-12-31 00:40:26', '2020-12-31 00:41:25', '', '', '2020-11-17 12:42:28', '0000-00-00 00:00:00', '', '', '', '', ''),
(6, 'arka dokter', 'dokter.arka@gmail.com', '$2y$10$BY2S/r7llncrGNOZTGZL0.nmnBrhTpHV5FS8BkyvLaiUCBAkSHzr.', 'dokter', '2020-12-29 14:25:06', '2020-12-29 14:29:49', 'Jl. Jambu Batu', '350x230-img-36097-hyun-bin.jpg', '2020-11-18 10:25:43', '0000-00-00 00:00:00', '08512387434', 'ok', 'd', 'd', 'd'),
(7, 'indah harni', 'indah@gmail.com', '$2y$10$OM5HlPGuWWnOK5ufvy7Ds.EACX5cjsvyjjJMKkadi2VxK1qb1VXRm', 'pasien', '2020-11-24 17:36:32', '0000-00-00 00:00:00', '', '', '2020-11-24 17:36:12', '0000-00-00 00:00:00', '', '', '', '', ''),
(8, 'Abdul Rosyid', 'ab.rosyid98@gmail.com', '$2y$10$5YQqbyCk/h0wuBqFo060o.4hZa5ZXaqwLUqXxEb.WHNdOpXPY.el.', 'pasien', '2020-11-28 15:45:08', '2020-11-28 15:47:16', '', '', '2020-11-28 15:44:59', '0000-00-00 00:00:00', '', '', '', '', ''),
(9, 'fitria', 'fitria@gmail.com', '$2y$10$9nNTRk5Ou/OAUGJL0kJIsONTHI6/V6GKmV9fVuWGhSIiO.x.C8uQ2', 'pasien', '2020-12-29 14:11:12', '2020-12-29 14:20:37', '', '', '2020-12-21 21:20:45', '0000-00-00 00:00:00', '', '', '', '', ''),
(10, 'qonita', 'qonita@gmail.com', '$2y$10$P490TTMrlICqkATIT1CJQuEW9SN0Q5XLwB7fc4CYl6aSTd9erah0O', 'pasien', '2020-12-31 16:42:52', '2020-12-31 00:40:10', '', '', '2020-12-22 10:14:00', '0000-00-00 00:00:00', '', '', '', '', ''),
(11, 'agus', 'gitoe.agus@gmail.com', '$2y$10$mpPYdsSdwrGhgtBVgZqUX.UDdbAAh6J4HoWoeL.c/HJKA.TonuQ26', 'pasien', '2020-12-22 10:56:20', '2020-12-22 11:03:26', '', '', '2020-12-22 10:56:02', '0000-00-00 00:00:00', '', '', '', '', ''),
(12, 'ajeng', 'ajeng@gmail.com', '$2y$10$s9gnQhjQ2APA5oCMyjLCtuGiXYvrMKWfeJb6WSwb7qCPpQ8lDlEK.', 'pasien', '2020-12-29 14:58:46', '0000-00-00 00:00:00', '', '', '2020-12-29 14:57:15', '0000-00-00 00:00:00', '', '', '', '', ''),
(13, 'timi', 'timi@gmail.com', '$2y$10$2najJaj3QE9.zcLZzDIeBOULKiUge6YhT8/o8va8mqSHSlnx3KMwm', 'pasien', '2020-12-30 17:21:53', '2020-12-30 17:25:40', '', '', '2020-12-30 17:21:32', '0000-00-00 00:00:00', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_visit_pasien`
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
-- Dumping data for table `tbl_visit_pasien`
--

INSERT INTO `tbl_visit_pasien` (`id_visit_pasien`, `id_pasien`, `id_dokter`, `status_visit_pasien`, `time_create_visit`, `time_update_visit`, `id_status_visit`) VALUES
(1, 5, 4, 'waiting', '2020-11-29 00:30:26', '2020-11-29 00:30:26', 4),
(2, 9, 4, 'waiting', '2020-12-29 14:12:31', '2020-12-29 14:12:31', 8),
(3, 9, 4, 'waiting', '2020-12-29 14:13:58', '2020-12-29 14:13:58', 8),
(4, 9, 6, 'waiting', '2020-12-29 14:14:02', '2020-12-29 14:14:02', 9),
(5, 10, 4, 'waiting', '2020-12-31 16:43:59', '2020-12-31 16:43:59', 11);

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
-- Indexes for table `tbl_boking_steril`
--
ALTER TABLE `tbl_boking_steril`
  ADD PRIMARY KEY (`id_boking_steril`);

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
-- Indexes for table `tbl_rekan_medis`
--
ALTER TABLE `tbl_rekan_medis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id_users`);

--
-- Indexes for table `tbl_visit_pasien`
--
ALTER TABLE `tbl_visit_pasien`
  ADD PRIMARY KEY (`id_visit_pasien`);

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
  MODIFY `id_antrian_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_boking_groming`
--
ALTER TABLE `tbl_boking_groming`
  MODIFY `id_boking_groming` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_boking_penitipan`
--
ALTER TABLE `tbl_boking_penitipan`
  MODIFY `id_boking_penitipan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_boking_steril`
--
ALTER TABLE `tbl_boking_steril`
  MODIFY `id_boking_steril` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_boking_vaksin`
--
ALTER TABLE `tbl_boking_vaksin`
  MODIFY `id_boking_vaksin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_jadwal_dokter`
--
ALTER TABLE `tbl_jadwal_dokter`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_paket_groming`
--
ALTER TABLE `tbl_paket_groming`
  MODIFY `id_paket_groming` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_paket_penitpan`
--
ALTER TABLE `tbl_paket_penitpan`
  MODIFY `id_paket_penitipan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_paket_steril`
--
ALTER TABLE `tbl_paket_steril`
  MODIFY `id_paket_steril` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_paket_vaksin`
--
ALTER TABLE `tbl_paket_vaksin`
  MODIFY `id_paket_vaksin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_rekan_medis`
--
ALTER TABLE `tbl_rekan_medis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_visit_pasien`
--
ALTER TABLE `tbl_visit_pasien`
  MODIFY `id_visit_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
