-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 23, 2018 at 05:11 PM
-- Server version: 5.5.58-cll
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beru2685_monitoring`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `id_pemilik` int(11) NOT NULL,
  `warna` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `id_pemilik`, `warna`) VALUES
(11640, 2, 'Biru'),
(11641, 2, 'Biru'),
(11642, 2, 'Biru'),
(11643, 1, 'Merah'),
(11644, 1, 'Merah'),
(11645, 3, 'Hijau'),
(11646, 3, 'Hijau'),
(11647, 3, 'Hijau'),
(11648, 3, 'Hijau');

--
-- Triggers `barang`
--
DELIMITER $$
CREATE TRIGGER `hasil` AFTER INSERT ON `barang` FOR EACH ROW BEGIN
    INSERT INTO lokasi_barang (lokasi_id, barang_id, tanggal) VALUE ((SELECT id FROM lokasi WHERE warna=NEW.warna),NEW.id,CURDATE());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id` int(11) NOT NULL,
  `no_lokasi` varchar(50) NOT NULL,
  `warna` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id`, `no_lokasi`, `warna`) VALUES
(1, 'LK_01', 'Hijau'),
(2, 'LK_02', 'Merah'),
(3, 'LK_03', 'Biru');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi_barang`
--

CREATE TABLE `lokasi_barang` (
  `id` int(11) NOT NULL,
  `lokasi_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lokasi_barang`
--

INSERT INTO `lokasi_barang` (`id`, `lokasi_id`, `barang_id`, `tanggal`, `id_user`) VALUES
(1, 2, 11643, '2018-01-20', 1),
(2, 3, 11641, '2018-01-20', 1),
(3, 3, 11642, '2018-01-20', 1),
(4, 2, 11643, '2018-01-20', 1),
(5, 2, 11644, '2018-01-20', 1),
(6, 1, 11645, '2018-01-20', 1),
(7, 1, 11646, '2018-01-20', 1),
(8, 1, 11647, '2018-01-20', 1),
(9, 1, 11648, '2018-01-20', 1),
(10, 2, 11643, '2018-01-21', 1),
(11, 3, 11641, '2018-01-21', 1),
(12, 3, 11642, '2018-01-21', 1),
(13, 2, 11643, '2018-01-21', 1),
(14, 2, 11644, '2018-01-21', 1),
(15, 1, 11645, '2018-01-21', 1),
(16, 1, 11646, '2018-01-21', 1),
(17, 1, 11647, '2018-01-21', 1),
(18, 1, 11648, '2018-01-21', 1),
(19, 1, 11640, '2018-01-22', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pemilik`
--

CREATE TABLE `pemilik` (
  `id_pemilik` int(50) NOT NULL,
  `nm_pemilik` varchar(100) NOT NULL,
  `alamat_pemilik` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemilik`
--

INSERT INTO `pemilik` (`id_pemilik`, `nm_pemilik`, `alamat_pemilik`) VALUES
(1, 'PT.ABC', 'Alamat PT.ABC'),
(2, 'PT.XYZ', 'Alamat PT.XYZ'),
(3, 'PT.PQR', 'Alamat PT.PQR');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`, `email`, `role`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'admin@admin.com', 'admin'),
(2, 'frans', '31cf2b3561b2aed60bf8c02414cc955a', 'Fransiscus', 'Sinaga@gmail.com', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lokasi_barang`
--
ALTER TABLE `lokasi_barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barang_id` (`barang_id`),
  ADD KEY `lokasi_id` (`lokasi_id`);

--
-- Indexes for table `pemilik`
--
ALTER TABLE `pemilik`
  ADD PRIMARY KEY (`id_pemilik`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11649;
--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `lokasi_barang`
--
ALTER TABLE `lokasi_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `pemilik`
--
ALTER TABLE `pemilik`
  MODIFY `id_pemilik` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `lokasi_barang`
--
ALTER TABLE `lokasi_barang`
  ADD CONSTRAINT `lokasi_barang_ibfk_1` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lokasi_barang_ibfk_2` FOREIGN KEY (`lokasi_id`) REFERENCES `lokasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
