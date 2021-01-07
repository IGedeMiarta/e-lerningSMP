-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2021 at 01:22 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smart_students`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `role_id`) VALUES
(5, 'info.smpn2mlati@gmail.com', '$2y$10$p3G.vt3oyUdKGyClosR3NuM2DG7YVnTo3/PM5RsZ1RyZ0L3AhaysW', 1);

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` int(11) NOT NULL,
  `no_regis` int(11) NOT NULL,
  `nama` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(256) NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `role_id` int(1) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `no_regis`, `nama`, `email`, `password`, `gambar`, `role_id`, `is_active`) VALUES
(2, 19079100, 'Rohimah', 'rohimah@gmail.com', '$2y$10$YOpxtraNWj.Aiscsr4D.lO1d8A1V.cYk6wbs7du/59uKmOIu88q8K', 'default.png', 2, 1),
(3, 19079101, 'Basuki Cahya U.', 'basuki@gmail.com', '$2y$10$INvCqsvxHwAYYHVAtGnTbuaT6TY9RuuRQM25e5fkzJJzvqIbR051W', 'default.png', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `guru-kelas`
--

CREATE TABLE `guru-kelas` (
  `id` int(11) NOT NULL,
  `no_regis` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `kelas` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `guru-kelas`
--

INSERT INTO `guru-kelas` (`id`, `no_regis`, `kelas_id`, `kelas`) VALUES
(2, 19079100, 27, 'VII A'),
(3, 19079100, 29, 'VII C'),
(4, 19079101, 27, 'VII A'),
(7, 19079101, 30, 'VIII A');

-- --------------------------------------------------------

--
-- Table structure for table `guru-mapel`
--

CREATE TABLE `guru-mapel` (
  `id` int(11) NOT NULL,
  `no_regis` int(11) NOT NULL,
  `mapel_id` int(11) NOT NULL,
  `mapel` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `guru-mapel`
--

INSERT INTO `guru-mapel` (`id`, `no_regis`, `mapel_id`, `mapel`) VALUES
(2, 19079100, 16, 'Bahasa Indonesia'),
(3, 19079101, 16, 'Bahasa Indonesia'),
(4, 19079101, 17, 'Ilmu Pengetahuan Alam');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `nama_kelas` varchar(128) NOT NULL,
  `class_code` varchar(255) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`, `class_code`, `is_active`) VALUES
(27, 'VII A', 'VDbzLh3T1dE6tTgz', 1),
(28, 'VII B', 'OjtOLb57LkrnPihO', 1),
(29, 'VII C', 'aFAkshiGrJGVjfrt', 1),
(30, 'VIII A', 'IDZhIl4JpMzfBGdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komen` int(11) NOT NULL,
  `id_materi` varchar(120) NOT NULL,
  `email` varchar(128) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `pesan` text DEFAULT NULL,
  `gambar_chat` varchar(255) NOT NULL,
  `date_send` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komen`, `id_materi`, `email`, `nama`, `pesan`, `gambar_chat`, `date_send`) VALUES
(9, '6', 'rohimah@gmail.com', 'Rohimah', 'silahkan lihat dan cermati', 'default.png', '2021-01-07 09:33:32'),
(10, '6', 'miartayasa10@gmail.com', 'I Gede Miarta Yasa', 'baik bu', 'default.png', '2021-01-07 09:36:14');

-- --------------------------------------------------------

--
-- Table structure for table `komen_tugas`
--

CREATE TABLE `komen_tugas` (
  `id_komen` int(11) NOT NULL,
  `id_tugas` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `pesan` longtext DEFAULT NULL,
  `gambar_chat` varchar(255) NOT NULL,
  `date_send` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `komen_tugas`
--

INSERT INTO `komen_tugas` (`id_komen`, `id_tugas`, `email`, `nama`, `pesan`, `gambar_chat`, `date_send`) VALUES
(4, 6, 'meidiana516@gmail.com', 'Mei Diana', 'kumpul kapan?', 'default.png', '2021-01-07 12:00:35');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id` int(11) NOT NULL,
  `nama_mapel` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id`, `nama_mapel`, `is_active`) VALUES
(16, 'Bahasa Indonesia', 1),
(17, 'Ilmu Pengetahuan Alam', 1);

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id_materi` int(11) NOT NULL,
  `nama_materi` varchar(128) NOT NULL,
  `guru` int(11) NOT NULL,
  `mapel` int(11) NOT NULL,
  `kelas` int(11) NOT NULL,
  `catatan` longtext DEFAULT NULL,
  `unggah_materi` varchar(255) DEFAULT NULL,
  `bikin_manual` longtext DEFAULT NULL,
  `unggah_materi2` varchar(255) DEFAULT NULL,
  `date_created` int(11) DEFAULT NULL,
  `dilihat` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id_materi`, `nama_materi`, `guru`, `mapel`, `kelas`, `catatan`, `unggah_materi`, `bikin_manual`, `unggah_materi2`, `date_created`, `dilihat`) VALUES
(6, 'Pantun', 19079100, 16, 27, NULL, NULL, '<p><b style=\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px;\">Pantun</b><span style=\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px;\">&nbsp;merupakan salah satu jenis&nbsp;</span><a href=\"https://id.wikipedia.org/wiki/Puisi\" title=\"Puisi\" style=\"color: rgb(11, 0, 128); background: none rgb(255, 255, 255); font-family: sans-serif; font-size: 14px;\">puisi</a><span style=\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px;\">&nbsp;lama yang sangat luas dikenal di&nbsp;</span><a href=\"https://id.wikipedia.org/wiki/Nusantara\" title=\"Nusantara\" style=\"color: rgb(11, 0, 128); background: none rgb(255, 255, 255); font-family: sans-serif; font-size: 14px;\">Nusantara</a><span style=\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px;\">. Kata \"Pantun\" berasal dari kata&nbsp;</span><i style=\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px;\">patuntun</i><span style=\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px;\">&nbsp;dalam&nbsp;</span><a href=\"https://id.wikipedia.org/wiki/Bahasa_Minangkabau\" title=\"Bahasa Minangkabau\" style=\"color: rgb(11, 0, 128); background: none rgb(255, 255, 255); font-family: sans-serif; font-size: 14px;\">Bahasa Minangkabau</a><span style=\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px;\">&nbsp;yang memiliki arti \"penuntun\".</span><span style=\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px;\">Pantun memiliki nama lain dalam bahasa-bahasa daerah, dalam&nbsp;</span><a href=\"https://id.wikipedia.org/wiki/Bahasa_Jawa\" title=\"Bahasa Jawa\" style=\"color: rgb(11, 0, 128); background: none rgb(255, 255, 255); font-family: sans-serif; font-size: 14px;\">bahasa Jawa</a><span style=\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px;\">, pantun dikenal dengan&nbsp;</span><a href=\"https://id.wikipedia.org/wiki/Parikan\" title=\"Parikan\" style=\"color: rgb(11, 0, 128); background: none rgb(255, 255, 255); font-family: sans-serif; font-size: 14px;\">parikan</a><span style=\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px;\">&nbsp;dalam&nbsp;</span><a href=\"https://id.wikipedia.org/wiki/Bahasa_Sunda\" title=\"Bahasa Sunda\" style=\"color: rgb(11, 0, 128); background: none rgb(255, 255, 255); font-family: sans-serif; font-size: 14px;\">bahasa Sunda</a><span style=\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px;\">&nbsp;pantun disebut&nbsp;</span><a href=\"https://id.wikipedia.org/wiki/Paparikan\" title=\"Paparikan\" style=\"color: rgb(11, 0, 128); background: none rgb(255, 255, 255); font-family: sans-serif; font-size: 14px;\">paparikan</a><span style=\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px;\">&nbsp;dan dalam&nbsp;</span><a href=\"https://id.wikipedia.org/wiki/Bahasa_Batak\" class=\"mw-disambig\" title=\"Bahasa Batak\" style=\"color: rgb(11, 0, 128); background: none rgb(255, 255, 255); font-family: sans-serif; font-size: 14px;\">bahasa Batak</a><span style=\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px;\">, pantun dikenal dengan sebutan&nbsp;</span><a href=\"https://id.wikipedia.org/wiki/Umpasa\" title=\"Umpasa\" style=\"color: rgb(11, 0, 128); background: none rgb(255, 255, 255); font-family: sans-serif; font-size: 14px;\">umpasa</a><span style=\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px;\">.</span><span style=\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px;\">Lazimnya, pantun terdiri atas empat larik (atau empat baris bila dituliskan), tiap larik terdiri atas 8-12 suku kata, ber</span><a href=\"https://id.wikipedia.org/wiki/Sajak\" class=\"mw-redirect\" title=\"Sajak\" style=\"color: rgb(11, 0, 128); background: none rgb(255, 255, 255); font-family: sans-serif; font-size: 14px;\">sajak</a><span style=\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px;\">&nbsp;akhir dengan pola a-b-a-b ataupun a-a-a-a (tidak boleh a-a-b-b atau a-b-b-a).</span><span style=\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px;\">&nbsp;Pantun merupakan salah satu bentuk puisi lama.</span><img src=\"http://localhost/smart-students/materi/img-uploads/pantun.png\" style=\"width: 450px; float: left;\" class=\"note-float-left\"><span style=\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px;\">&nbsp;Pantun pada mulanya merupakan sastra lisan, tapi sekarang dijumpai juga pantun yang tertulis. Ciri lain dari sebuah pantun adalah pantun tidak memberi nama penggubahnya. Hal ini dikarenakan penyebaran pantun dilakukan secara lisan.</span><br></p>', NULL, 1610011844, 1),
(7, 'Data Guru', 19079100, 16, 27, '<p>Silahkan Lihat Dan Analisis Data berikut</p>', 'data-guru.pdf', NULL, NULL, 1610011907, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pemberitahuan`
--

CREATE TABLE `pemberitahuan` (
  `id` int(11) NOT NULL,
  `email_guru` varchar(255) NOT NULL,
  `pemberitahuan` text DEFAULT NULL,
  `id_kelas` int(11) NOT NULL,
  `is_tugas` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'guru'),
(3, 'siswa');

-- --------------------------------------------------------

--
-- Table structure for table `room_chat`
--

CREATE TABLE `room_chat` (
  `id_room` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `pesan` longtext NOT NULL,
  `date_send` timestamp NOT NULL DEFAULT current_timestamp(),
  `gambar_rm` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_chat`
--

INSERT INTO `room_chat` (`id_room`, `id_kelas`, `email`, `nama`, `pesan`, `date_send`, `gambar_rm`) VALUES
(3, 27, 'miartayasa10@gmail.com', 'I Gede Miarta Yasa', 'hello', '2021-01-07 09:41:44', 'default.png'),
(4, 27, 'meidiana516@gmail.com', 'Mei Diana', 'hello world', '2021-01-07 12:19:15', 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `no_regis` int(11) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `id_kelas` int(1) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(256) NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `role_id` int(1) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nama_siswa`, `no_regis`, `jenis_kelamin`, `id_kelas`, `email`, `password`, `gambar`, `role_id`, `is_active`) VALUES
(10, 'I Gede Miarta Yasa', 18078100, 'Laki - Laki', 27, 'miartayasa10@gmail.com', '$2y$10$Uu9zAddSDtk7a5kWS/lIZe0nl4W0oOAg1WWNSkYTpcRtI2bzATaOq', 'default.png', 3, 1),
(11, 'Mei Diana', 18078101, 'Laki - Laki', 27, 'meidiana516@gmail.com', '$2y$10$FSaMx3oDhijg6uqL39ywe..rdU8MnlEFHFGzpjmHc1mOKzY72xJd6', 'default.png', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `id_tugas` int(11) NOT NULL,
  `nama_tugas` varchar(255) NOT NULL,
  `guru` int(11) NOT NULL,
  `kelas` int(11) NOT NULL,
  `mapel` int(11) NOT NULL,
  `pesan` longtext DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `is_essay` int(1) DEFAULT NULL,
  `date_created` int(11) DEFAULT NULL,
  `due_date` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tugas`
--

INSERT INTO `tugas` (`id_tugas`, `nama_tugas`, `guru`, `kelas`, `mapel`, `pesan`, `file`, `is_essay`, `date_created`, `due_date`) VALUES
(6, 'Pantun ', 19079100, 27, 16, '<p>Buat Satu Pantun 4 kerat Bersajak ABAB<br></p>', NULL, 1, 1610012322, '2021-01-08 23:59');

-- --------------------------------------------------------

--
-- Table structure for table `tugas_siswa`
--

CREATE TABLE `tugas_siswa` (
  `id` int(11) NOT NULL,
  `no_regis_guru` int(11) NOT NULL,
  `no_regis_siswa` int(11) NOT NULL,
  `tugas_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `mapel_id` int(11) NOT NULL,
  `essay` longtext DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `nilai` int(3) DEFAULT NULL,
  `telat` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tugas_siswa`
--

INSERT INTO `tugas_siswa` (`id`, `no_regis_guru`, `no_regis_siswa`, `tugas_id`, `kelas_id`, `mapel_id`, `essay`, `file`, `nilai`, `telat`) VALUES
(7, 19079100, 18078100, 6, 27, 16, '<p>buah nangka&nbsp;&nbsp;&nbsp;&nbsp;</p><p>buah kedondong</p><p>gak nyangka</p><p>kamu gondrong</p>', NULL, 100, 0),
(8, 19079100, 18078101, 6, 27, 16, '<p>ksasb</p><p>jcnskc</p><p>jncks</p><p>jndj</p>', NULL, 90, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(256) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guru-kelas`
--
ALTER TABLE `guru-kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guru-mapel`
--
ALTER TABLE `guru-mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komen`);

--
-- Indexes for table `komen_tugas`
--
ALTER TABLE `komen_tugas`
  ADD PRIMARY KEY (`id_komen`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`);

--
-- Indexes for table `pemberitahuan`
--
ALTER TABLE `pemberitahuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_chat`
--
ALTER TABLE `room_chat`
  ADD PRIMARY KEY (`id_room`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id_tugas`);

--
-- Indexes for table `tugas_siswa`
--
ALTER TABLE `tugas_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `guru-kelas`
--
ALTER TABLE `guru-kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `guru-mapel`
--
ALTER TABLE `guru-mapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `komen_tugas`
--
ALTER TABLE `komen_tugas`
  MODIFY `id_komen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pemberitahuan`
--
ALTER TABLE `pemberitahuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `room_chat`
--
ALTER TABLE `room_chat`
  MODIFY `id_room` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id_tugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tugas_siswa`
--
ALTER TABLE `tugas_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
