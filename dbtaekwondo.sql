-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2022 at 02:33 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbtaekwondo`
--

-- --------------------------------------------------------

--
-- Table structure for table `anak`
--

CREATE TABLE `anak` (
  `idanak` int(11) NOT NULL,
  `namaanak` varchar(255) NOT NULL,
  `tingkat_sabuk` varchar(255) NOT NULL,
  `perkembangan_latihan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anak`
--

INSERT INTO `anak` (`idanak`, `namaanak`, `tingkat_sabuk`, `perkembangan_latihan`) VALUES
(1, 'Anak 1', 'Biru', 'Perkembangan Anak 1'),
(2, 'Anak 2', 'Merah', 'Perkembangan Anak 2'),
(3, 'Anak 3', 'Hijau', 'Perkembangan Anak 3');

-- --------------------------------------------------------

--
-- Table structure for table `dokumen`
--

CREATE TABLE `dokumen` (
  `id_dokumen` int(11) NOT NULL,
  `dokumen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokumen`
--

INSERT INTO `dokumen` (`id_dokumen`, `dokumen`) VALUES
(1, 'dokumen/16blQmOHXVXzU.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `userid` int(11) NOT NULL,
  `namalengkap` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `role` varchar(7) NOT NULL DEFAULT 'Member'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`userid`, `namalengkap`, `email`, `password`, `role`) VALUES
(1, 'Admin', 'admin', '$2y$10$GJVGd4ji3QE8ikTBzNyA0uLQhiGd6MirZeSJV1O6nUpjSVp1eaKzS', 'Admin'),
(4, 'Renaldi', 'renaldinoviandi0@gmail.com', '$2y$10$qfDSoJq.VXEiYPmUEfJAr..cwW.o2hJAcUPSt9WjqLmefLwb5NutG', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `id_profil` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `berdiri` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `logo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id_profil`, `nama`, `berdiri`, `alamat`, `logo`) VALUES
(1, 'Dojang (Demo)', '2021', 'Contoh Alamat2 (Demo)', 'profil/16tjxbli.1azQ.png');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `idprogram` int(11) NOT NULL,
  `namaprogram` varchar(255) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`idprogram`, `namaprogram`, `gambar`, `deskripsi`) VALUES
(3, 'Program 1', 'program/16eft3cpg0z7M.jpg', 'Deskripsi Program 21'),
(4, 'Program 20', 'program/16hpnKe0Z87ok.jpg', 'Deskripsi Program 20'),
(5, 'Program 5', 'program/16hpnKe0Z87ok.jpg', 'Deskripsi Program 5'),
(6, 'Program 6', 'program/16eft3cpg0z7M.jpg', 'Deskripsi Program 6'),
(7, 'Program 7', 'program/16hpnKe0Z87ok.jpg', 'Deskripsi Program 7'),
(8, 'Program 8', 'program/16hpnKe0Z87ok.jpg', 'Deskripsi Program 8'),
(10, 'Program 10', 'program/16hpnKe0Z87ok.jpg', 'Deskripsi Program 10'),
(11, 'Program 11', 'program/16hpnKe0Z87ok.jpg', 'Deskripsi Program 11'),
(12, 'Program 12', 'program/16hpnKe0Z87ok.jpg', 'Deskripsi Program 12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anak`
--
ALTER TABLE `anak`
  ADD PRIMARY KEY (`idanak`);

--
-- Indexes for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`id_dokumen`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`idprogram`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anak`
--
ALTER TABLE `anak`
  MODIFY `idanak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `idprogram` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
