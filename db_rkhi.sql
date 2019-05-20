-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Bulan Mei 2019 pada 18.01
-- Versi server: 10.1.30-MariaDB
-- Versi PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rkhi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `status` enum('daftar','unggulan','belum unggulan') NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `id_client`, `status`, `total`) VALUES
(39, 2, 'unggulan', 5),
(40, 1, 'unggulan', 4),
(41, 3, 'unggulan', 3),
(42, 4, 'unggulan', 2),
(52, 5, 'unggulan', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `alternatif_nilai`
--

CREATE TABLE `alternatif_nilai` (
  `id_alternatif_nilai` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `id_subkriteria` int(11) NOT NULL,
  `id_nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `alternatif_nilai`
--

INSERT INTO `alternatif_nilai` (`id_alternatif_nilai`, `id_alternatif`, `id_kriteria`, `id_subkriteria`, `id_nilai`) VALUES
(196, 39, 13, 45, 45),
(197, 39, 14, 50, 50),
(198, 39, 16, 60, 60),
(199, 39, 17, 65, 65),
(200, 39, 20, 80, 80),
(201, 40, 13, 46, 46),
(202, 40, 14, 51, 51),
(203, 40, 16, 61, 61),
(204, 40, 17, 66, 66),
(205, 40, 20, 81, 81),
(206, 41, 13, 47, 47),
(207, 41, 14, 52, 52),
(208, 41, 16, 62, 62),
(209, 41, 17, 67, 67),
(210, 41, 20, 82, 82),
(211, 42, 13, 48, 48),
(212, 42, 14, 53, 53),
(213, 42, 16, 63, 63),
(214, 42, 17, 68, 68),
(215, 42, 20, 83, 83),
(226, 51, 13, 46, 46),
(227, 51, 14, 51, 51),
(228, 51, 16, 60, 60),
(229, 51, 17, 66, 66),
(230, 51, 20, 82, 82),
(231, 52, 13, 49, 49),
(232, 52, 14, 54, 54),
(233, 52, 16, 64, 64),
(234, 52, 17, 69, 69),
(235, 52, 20, 84, 84);

-- --------------------------------------------------------

--
-- Struktur dari tabel `chat`
--

CREATE TABLE `chat` (
  `id_chat` int(11) NOT NULL,
  `id_konten` int(11) NOT NULL,
  `isi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `chat`
--

INSERT INTO `chat` (`id_chat`, `id_konten`, `isi`) VALUES
(1, 1, 'hgghg'),
(2, 1, 'awdawdawdadwaw'),
(3, 1, 'wdad');

-- --------------------------------------------------------

--
-- Struktur dari tabel `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `nama_client` varchar(40) NOT NULL,
  `alamat_client` text NOT NULL,
  `no_telpon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `client`
--

INSERT INTO `client` (`id_client`, `nama_client`, `alamat_client`, `no_telpon`) VALUES
(1, 'Ajie', 'Bekasi', '081296977701'),
(2, 'Reza Rhman', 'Bandung', '081288977703'),
(3, 'Nanda Pratama', 'Bogor', '081295777111'),
(4, 'Firman', 'Bogor', '081296977704'),
(5, 'Nanda Putri', 'Bogor', '081296977111'),
(7, 'Alvienas', 'Cipadung', '081296977711');

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE `galeri` (
  `id_galeri` int(11) NOT NULL,
  `id_tujuan` int(11) NOT NULL,
  `judul` varchar(30) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konten_diskusi`
--

CREATE TABLE `konten_diskusi` (
  `id_konten` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `judul_konten` varchar(255) NOT NULL,
  `isi_konten` varchar(255) NOT NULL,
  `date_created_konten` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konten_diskusi`
--

INSERT INTO `konten_diskusi` (`id_konten`, `id_user`, `judul_konten`, `isi_konten`, `date_created_konten`) VALUES
(3, 0, 'ada', 'adad', '2019-05-19 08:40:53'),
(4, 0, 'ad', 'adad', '2019-05-19 08:41:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`) VALUES
(13, 'Batasan Aurat Wanita Muslimah Di Hadapan Wanita Non-Muslim'),
(14, 'Hukum Menggauli Istri Di Siang Hari Bulan Ramadhan Karena Belum Tahu Hukumnya'),
(16, 'Bagian Warisan Istri, Anak Laki-Laki, Dan Anak Perempuan'),
(17, 'Tidak Puasa Ramadhan Dua Kali Karena Sedang Hamil Dan Menyusui'),
(20, 'Diskon Riba Pada Jual Beli Rumah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria_nilai`
--

CREATE TABLE `kriteria_nilai` (
  `id_kriteria_nilai` int(11) NOT NULL,
  `kriteria_id_dari` int(11) NOT NULL,
  `kriteria_id_tujuan` int(11) NOT NULL,
  `nilai` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kriteria_nilai`
--

INSERT INTO `kriteria_nilai` (`id_kriteria_nilai`, `kriteria_id_dari`, `kriteria_id_tujuan`, `nilai`) VALUES
(641, 13, 14, 1),
(642, 13, 16, 1),
(643, 13, 17, 1),
(644, 13, 20, 1),
(645, 14, 16, 1),
(646, 14, 17, 1),
(647, 14, 20, 1),
(648, 16, 17, 1),
(649, 16, 20, 1),
(650, 17, 20, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_kategori`
--

CREATE TABLE `nilai_kategori` (
  `id_nilai` int(11) NOT NULL,
  `nama_nilai` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai_kategori`
--

INSERT INTO `nilai_kategori` (`id_nilai`, `nama_nilai`) VALUES
(1, 'Sangat Baik'),
(2, 'Baik'),
(3, 'Cukup'),
(4, 'Kurang'),
(5, 'Sangat Kurang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL,
  `nama_depan` varchar(30) NOT NULL,
  `nama_belakang` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `subjek` varchar(30) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `subkriteria`
--

CREATE TABLE `subkriteria` (
  `id_subkriteria` int(11) NOT NULL,
  `nama_subkriteria` varchar(50) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `tipe` enum('teks','nilai') NOT NULL,
  `nilai_minimum` double DEFAULT NULL,
  `nilai_maksimum` double DEFAULT NULL,
  `op_min` varchar(4) DEFAULT NULL,
  `op_max` varchar(4) DEFAULT NULL,
  `id_nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `subkriteria`
--

INSERT INTO `subkriteria` (`id_subkriteria`, `nama_subkriteria`, `id_kriteria`, `tipe`, `nilai_minimum`, `nilai_maksimum`, `op_min`, `op_max`, `id_nilai`) VALUES
(45, '=> 91 <= 100', 13, 'nilai', 91, 100, '=>', '<=', 1),
(46, '=> 81 <= 90', 13, 'nilai', 81, 90, '=>', '<=', 2),
(47, '=> 71 <= 80', 13, 'nilai', 71, 80, '=>', '<=', 3),
(48, '=> 61 <= 70', 13, 'nilai', 61, 70, '=>', '<=', 4),
(49, '=> 0 < 60', 13, 'nilai', 0, 60, '=>', '<', 5),
(50, '=> 91 <= 100', 14, 'nilai', 91, 100, '=>', '<=', 1),
(51, '=> 81 <= 90', 14, 'nilai', 81, 90, '=>', '<=', 2),
(52, '=> 71 <= 80', 14, 'nilai', 71, 80, '=>', '<=', 3),
(53, '=> 61 <= 70', 14, 'nilai', 61, 70, '=>', '<=', 4),
(54, '=> 0 <= 60', 14, 'nilai', 0, 60, '=>', '<=', 5),
(55, '=> 91 <= 100', 15, 'nilai', 91, 100, '=>', '<=', 1),
(56, '=> 81 <= 90', 15, 'nilai', 81, 90, '=>', '<=', 2),
(57, '=> 71 <= 80', 15, 'nilai', 71, 80, '=>', '<=', 3),
(58, '=> 61 <= 70', 15, 'nilai', 61, 70, '=>', '<=', 4),
(59, '=> 0 <= 60', 15, 'nilai', 0, 60, '=>', '<=', 5),
(70, '100% menggunakan buku teks', 18, 'teks', NULL, NULL, NULL, NULL, 1),
(71, '95%-99% menggunakan buku teks', 18, 'teks', NULL, NULL, NULL, NULL, 2),
(72, '90%-94% menggunakan buku teks', 18, 'teks', NULL, NULL, NULL, NULL, 3),
(73, '85%-89% menggunakan buku teks', 18, 'teks', NULL, NULL, NULL, NULL, 4),
(74, 'Kurang dari 85% menggunakan buku teks', 18, 'teks', NULL, NULL, NULL, NULL, 5),
(75, '20% atau lebih berpendidikan S2 dan/atau S3, seleb', 19, 'teks', NULL, NULL, NULL, NULL, 1),
(76, '100% berpendidikan S1/D4', 19, 'teks', NULL, NULL, NULL, NULL, 2),
(77, '91%-99% berpendidikan S1/D4', 19, 'teks', NULL, NULL, NULL, NULL, 3),
(78, '81%-90% berpendidikan S1/D4', 19, 'teks', NULL, NULL, NULL, NULL, 4),
(79, 'Kurang dari 81% berpendidikan S1/D4', 19, 'teks', NULL, NULL, NULL, NULL, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `subkriteria_hasil`
--

CREATE TABLE `subkriteria_hasil` (
  `id_subkriteria_hasil` int(11) NOT NULL,
  `id_subkriteria` int(11) NOT NULL,
  `prioritas` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `subkriteria_hasil`
--

INSERT INTO `subkriteria_hasil` (`id_subkriteria_hasil`, `id_subkriteria`, `prioritas`) VALUES
(83, 45, 1),
(84, 46, 0.5296070795769015),
(85, 47, 0.1515404539051346),
(86, 48, 0.1282407399951657),
(87, 49, 0.11669121673644427),
(88, 50, 1),
(89, 51, 0.21178188314887259),
(90, 52, 0.18580955091954202),
(91, 53, 0.174678551392686),
(92, 54, 0.1684946627666549),
(93, 60, 1),
(94, 61, 0.21178188314887259),
(95, 62, 0.18580955091954202),
(96, 63, 0.174678551392686),
(97, 64, 0.1684946627666549),
(98, 65, 1),
(99, 66, 0.21178188314887259),
(100, 67, 0.18580955091954202),
(101, 68, 0.174678551392686),
(102, 69, 0.1684946627666549),
(103, 80, 1),
(104, 81, 0.21178188314887259),
(105, 82, 0.18580955091954202),
(106, 83, 0.174678551392686),
(107, 84, 0.1684946627666549);

-- --------------------------------------------------------

--
-- Struktur dari tabel `subkriteria_nilai`
--

CREATE TABLE `subkriteria_nilai` (
  `id_subkriteria_nilai` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `subkriteria_id_dari` int(11) NOT NULL,
  `subkriteria_id_tujuan` int(11) NOT NULL,
  `nilai` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `subkriteria_nilai`
--

INSERT INTO `subkriteria_nilai` (`id_subkriteria_nilai`, `id_kriteria`, `subkriteria_id_dari`, `subkriteria_id_tujuan`, `nilai`) VALUES
(565, 13, 45, 46, 3),
(566, 13, 45, 47, 5),
(567, 13, 45, 48, 7),
(568, 13, 45, 49, 9),
(569, 13, 46, 47, 3),
(570, 13, 46, 48, 5),
(571, 13, 46, 49, 7),
(572, 13, 47, 48, 1),
(573, 13, 47, 49, 1),
(574, 13, 48, 49, 1),
(575, 14, 50, 51, 3),
(576, 14, 50, 52, 5),
(577, 14, 50, 53, 7),
(578, 14, 50, 54, 9),
(579, 14, 51, 52, 1),
(580, 14, 51, 53, 1),
(581, 14, 51, 54, 1),
(582, 14, 52, 53, 1),
(583, 14, 52, 54, 1),
(584, 14, 53, 54, 1),
(585, 16, 60, 61, 3),
(586, 16, 60, 62, 5),
(587, 16, 60, 63, 7),
(588, 16, 60, 64, 9),
(589, 16, 61, 62, 1),
(590, 16, 61, 63, 1),
(591, 16, 61, 64, 1),
(592, 16, 62, 63, 1),
(593, 16, 62, 64, 1),
(594, 16, 63, 64, 1),
(595, 17, 65, 66, 3),
(596, 17, 65, 67, 5),
(597, 17, 65, 68, 7),
(598, 17, 65, 69, 9),
(599, 17, 66, 67, 1),
(600, 17, 66, 68, 1),
(601, 17, 66, 69, 1),
(602, 17, 67, 68, 1),
(603, 17, 67, 69, 1),
(604, 17, 68, 69, 1),
(605, 20, 80, 81, 3),
(606, 20, 80, 82, 5),
(607, 20, 80, 83, 7),
(608, 20, 80, 84, 9),
(609, 20, 81, 82, 1),
(610, 20, 81, 83, 1),
(611, 20, 81, 84, 1),
(612, 20, 82, 83, 1),
(613, 20, 82, 84, 1),
(614, 20, 83, 84, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', 'suPo-mllp0t.uEXFBxuWeu01206297e748015fbf', 1501472329, 'ct7pXg3o0mL4spmQnYiVn.', 1268889823, 1558276110, 1, 'Banni', 'Pebriansyah', 'ADMIN', '081296977703');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(7, 1, 1),
(8, 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `video_content`
--

CREATE TABLE `video_content` (
  `id` int(11) NOT NULL,
  `judul` varchar(254) NOT NULL,
  `file_type` varchar(8) NOT NULL,
  `kategori` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `video_kategori`
--

CREATE TABLE `video_kategori` (
  `id` int(11) NOT NULL,
  `kategori_video` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `video_kategori`
--

INSERT INTO `video_kategori` (`id`, `kategori_video`) VALUES
(1, 'HUKUM KELUARGA'),
(2, 'KEUANGAN SYARIAH'),
(3, 'PIDANA ISLAM'),
(4, 'FIQIH IBADAH'),
(5, 'AL-QUR\'AN & HADIST');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indeks untuk tabel `alternatif_nilai`
--
ALTER TABLE `alternatif_nilai`
  ADD PRIMARY KEY (`id_alternatif_nilai`);

--
-- Indeks untuk tabel `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id_chat`);

--
-- Indeks untuk tabel `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Indeks untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indeks untuk tabel `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `konten_diskusi`
--
ALTER TABLE `konten_diskusi`
  ADD PRIMARY KEY (`id_konten`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indeks untuk tabel `kriteria_nilai`
--
ALTER TABLE `kriteria_nilai`
  ADD PRIMARY KEY (`id_kriteria_nilai`);

--
-- Indeks untuk tabel `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nilai_kategori`
--
ALTER TABLE `nilai_kategori`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indeks untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indeks untuk tabel `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD PRIMARY KEY (`id_subkriteria`);

--
-- Indeks untuk tabel `subkriteria_hasil`
--
ALTER TABLE `subkriteria_hasil`
  ADD PRIMARY KEY (`id_subkriteria_hasil`);

--
-- Indeks untuk tabel `subkriteria_nilai`
--
ALTER TABLE `subkriteria_nilai`
  ADD PRIMARY KEY (`id_subkriteria_nilai`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indeks untuk tabel `video_content`
--
ALTER TABLE `video_content`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `video_kategori`
--
ALTER TABLE `video_kategori`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT untuk tabel `alternatif_nilai`
--
ALTER TABLE `alternatif_nilai`
  MODIFY `id_alternatif_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=236;

--
-- AUTO_INCREMENT untuk tabel `chat`
--
ALTER TABLE `chat`
  MODIFY `id_chat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `konten_diskusi`
--
ALTER TABLE `konten_diskusi`
  MODIFY `id_konten` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `kriteria_nilai`
--
ALTER TABLE `kriteria_nilai`
  MODIFY `id_kriteria_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=651;

--
-- AUTO_INCREMENT untuk tabel `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `nilai_kategori`
--
ALTER TABLE `nilai_kategori`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `subkriteria`
--
ALTER TABLE `subkriteria`
  MODIFY `id_subkriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT untuk tabel `subkriteria_hasil`
--
ALTER TABLE `subkriteria_hasil`
  MODIFY `id_subkriteria_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT untuk tabel `subkriteria_nilai`
--
ALTER TABLE `subkriteria_nilai`
  MODIFY `id_subkriteria_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=615;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `video_content`
--
ALTER TABLE `video_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `video_kategori`
--
ALTER TABLE `video_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
