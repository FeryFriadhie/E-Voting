-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2022 at 07:00 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-voting-osis`
--

-- --------------------------------------------------------

--
-- Table structure for table `kandidat`
--

CREATE TABLE `kandidat` (
  `id` int(11) NOT NULL,
  `nama_kandidat` varchar(100) NOT NULL,
  `nama_calon` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kandidat`
--

INSERT INTO `kandidat` (`id`, `nama_kandidat`, `nama_calon`, `foto`) VALUES
(1, 'Calon No.1 OSIS', 'Sovi Novitasari  Cahyani XI BDP 1 & Nela Mustika Sari XI OTKP 3', 'c2.png'),
(2, 'Calon No.2 OSIS', 'Fery Friadhie XI RPL & Anisa Sri Syabaniah XI AKL 4', 'c1.png'),
(3, 'Calon No.3 OSIS', 'Ghaza Maulana Rachman XI TB 2 & Sifa Alia XI BDP 2', 'c3.png');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama`) VALUES
(20, 'X AKL 1'),
(32, 'X AKL 2'),
(37, 'X AKL 3'),
(38, 'X AKL 4'),
(39, 'X MPLB 1'),
(40, 'X MPLB 2'),
(41, 'X MPLB 3'),
(42, 'X PM 1'),
(43, 'X PM 2'),
(44, 'X PM 3'),
(45, 'X HTL 1'),
(46, 'X HTL 2'),
(47, 'X KLN 1'),
(48, 'X KLN 2'),
(49, 'X DKV'),
(50, 'X PPLG'),
(51, 'XI AKL 1'),
(52, 'XI AKL 2'),
(53, 'XI AKL 3'),
(54, 'XI AKL 4'),
(55, 'XI MPLB 1'),
(56, 'XI MPLB 2'),
(57, 'XI MPLB 3'),
(58, 'XI PM 1'),
(59, 'XI PM 2'),
(60, 'XI PM 3'),
(61, 'XI HTL 1'),
(62, 'XI HTL 2 '),
(63, 'XI KLN 1'),
(64, 'XI KLN 2'),
(65, 'XI DKV'),
(66, 'XI PPLG');

-- --------------------------------------------------------

--
-- Table structure for table `suara`
--

CREATE TABLE `suara` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_kandidat` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suara`
--

INSERT INTO `suara` (`id`, `id_user`, `nama_kandidat`, `created`) VALUES
(17, 8, 'Calon No.1 OSIS', '2022-06-13 16:39:29');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('admin','siswa') NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `id_kelas`, `nama`, `email`, `password`, `level`, `status`) VALUES
(1, 0, 'Admin Voting', 'admin@gmail.com', '$2y$10$PVP48S2f7nmkrvhBNQSHLOT6ZdAcP5DxOWDboUcZVnX5t49Zsp80K', 'admin', 0),
(7, 66, 'Fery', 'feryfriadhie@gmail.com', '$2y$10$bsoAEGG3scWt7hxshwADueVBgEMUkfLL3zOccUsDdb9UN/gT/PwxW', 'siswa', 0),
(8, 64, 'Ghaza Maulana Rachman', 'ghaza@gmail.com', '$2y$10$rkjSqYCqTwro5YA37KCPEOZ3xDP8s0cXzorfpwzG9MCD9r1kPL3GC', 'siswa', 1),
(9, 20, 'Aldita', 'aldita@gmail.com', '$2y$10$1uzr6WPlnhwCTrj5D9r20OT5m4qKjbsoZbmv72LGpQMwqU1YWaaMq', 'siswa', 0),
(10, 20, 'ii', 'ii@gmail.com', '$2y$10$XTejyiteBETfulcri8WUxu0HvTAz37n5/.kyqKHSEL5NPBVxRfJC6', 'siswa', 0);

-- --------------------------------------------------------

--
-- Table structure for table `visimisi`
--

CREATE TABLE `visimisi` (
  `id` int(11) NOT NULL,
  `id_kandidat` int(11) NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visimisi`
--

INSERT INTO `visimisi` (`id`, `id_kandidat`, `visi`, `misi`) VALUES
(1, 4, '<p>Memajukan pendidikan di sekolah </p>\r\n', '<p>1. Belajar dengan giat</p>\r\n\r\n<p>2. Disiplin </p>\r\n'),
(4, 1, '<p>bisaa</p>\r\n', '<p>yakin</p>\r\n'),
(5, 2, '<p>Menjadikan...</p>\r\n', '<p>1. Taqwa</p>\r\n'),
(6, 3, '<p>NGABRET</p>\r\n', '<p>1. Taqwa kepada Tuhan Yang Maha Esa </p>\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kandidat`
--
ALTER TABLE `kandidat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suara`
--
ALTER TABLE `suara`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `visimisi`
--
ALTER TABLE `visimisi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kandidat`
--
ALTER TABLE `kandidat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `suara`
--
ALTER TABLE `suara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `visimisi`
--
ALTER TABLE `visimisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
