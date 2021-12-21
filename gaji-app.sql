-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2021 at 09:53 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gaji-app`
--

-- --------------------------------------------------------

--
-- Table structure for table `gaji`
--

CREATE TABLE `gaji` (
  `id_gaji` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `gaji_total` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gaji`
--

INSERT INTO `gaji` (`id_gaji`, `id_pegawai`, `tanggal`, `gaji_total`) VALUES
(14, 10, '2021-12-11', '3150000');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(255) NOT NULL,
  `id_perusahaan` int(11) NOT NULL,
  `gaji_pokok` varchar(255) NOT NULL,
  `tj_makan` varchar(255) DEFAULT NULL,
  `tj_transportasi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`, `id_perusahaan`, `gaji_pokok`, `tj_makan`, `tj_transportasi`) VALUES
(4, 'Staff Translator', 4, '2500000', '50000', '100000'),
(5, 'Manajer Produksi', 5, '3000000', '40000', '200000'),
(8, 'Staff Produk', 5, '2500000', '250000', '300000'),
(9, 'Administrator', 5, '2800000', '200000', '150000');

-- --------------------------------------------------------

--
-- Table structure for table `kehadiran`
--

CREATE TABLE `kehadiran` (
  `id_kehadiran` int(1) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `kehadiran` int(1) NOT NULL,
  `report` text DEFAULT NULL,
  `tgl_kehadiran` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kehadiran`
--

INSERT INTO `kehadiran` (`id_kehadiran`, `id_pegawai`, `kehadiran`, `report`, `tgl_kehadiran`) VALUES
(1, 7, 1, 'Membuat Landing Page', '2021-12-09'),
(6, 10, 1, '<ol><li>Tambah Data</li><li><strong>Update Data</strong></li></ol>', '2021-12-14'),
(7, 10, 1, '<ol><li>&nbsp;Mengecek Data</li><li>Mengupdate Data</li><li>Menambah Data</li></ol>', '2021-12-17'),
(8, 10, 1, '<ol><li>Tambah Data</li><li>Hapus Data</li><li>Update Data</li></ol>', '2021-12-21');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_perusahaan` int(11) NOT NULL,
  `nik_pegawai` varchar(255) NOT NULL,
  `nama_pegawai` text NOT NULL,
  `slug_pegawai` varchar(255) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `foto` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `id_jabatan`, `id_perusahaan`, `nik_pegawai`, `nama_pegawai`, `slug_pegawai`, `tgl_masuk`, `foto`, `role_id`) VALUES
(7, 5, 5, '6426362379', 'Muhammad Firdaus', 'muhammad-firdaus', '2021-12-09', 'foto.jpg', 1),
(10, 9, 5, '1883737884', 'Gita Puspita', 'gita-puspita', '2021-11-11', 'default.jpg', 2),
(13, 8, 5, '750843098348224', 'Simon Wijaya', 'simon-wijaya', '2021-12-17', 'default.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id_perusahaan` int(11) NOT NULL,
  `nama_perusahaan` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_pulang` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id_perusahaan`, `nama_perusahaan`, `slug`, `alamat`, `jam_masuk`, `jam_pulang`) VALUES
(4, 'Denpasar Translator', 'denpasar-translator', 'JL Bedugul No 8, Sidakarya, Denpasar-Bali', '08:00:00', '17:00:00'),
(5, 'Benlaris Sahabat Dewata', 'benlaris-sahabat-dewata', 'Jl Bedugul No. 8, Sidakarya, Denpasar-Bali', '10:00:00', '15:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `role_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `id_pegawai`, `foto`, `role_id`) VALUES
(4, 'firdaus', '$2y$10$Qb0HXUv1JXla9uEKfwNlreU6wW4ht3mZH09W5.MwLm5X49SklLMfa', 7, 'foto.jpg', 1),
(7, 'gita', '$2y$10$F0hYf2Db3KCZJbnG5TnJuua6H3J6GA1QzRQfZCX6mS4/J03mKfkNG', 10, 'default.jpg', 2),
(9, 'simon', '$2y$10$E6emXo9Cqv2iQYvPc7/r/.fndnqwg3ql5I0UT4N60CJny8maI4HhC', 13, 'default.jpg', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`id_gaji`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD PRIMARY KEY (`id_kehadiran`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id_perusahaan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gaji`
--
ALTER TABLE `gaji`
  MODIFY `id_gaji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kehadiran`
--
ALTER TABLE `kehadiran`
  MODIFY `id_kehadiran` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id_perusahaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
