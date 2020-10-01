-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 02, 2020 at 06:06 AM
-- Server version: 10.3.22-MariaDB-1ubuntu1
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kadalcileungsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id` int(11) NOT NULL,
  `waktu` datetime NOT NULL DEFAULT current_timestamp(),
  `tanggal` date NOT NULL,
  `jenis` int(11) NOT NULL,
  `nama` text NOT NULL,
  `alamat` text NOT NULL,
  `nosa` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id`, `waktu`, `tanggal`, `jenis`, `nama`, `alamat`, `nosa`) VALUES
(1, '2020-10-02 01:27:33', '2020-10-01', 1, 'Baon Cikadap', 'jl asede samalo', 6942069),
(2, '2020-10-02 01:27:33', '2020-09-16', 2, 'Mang Oleh', 'jl sama lu semua', 177013);

-- --------------------------------------------------------

--
-- Table structure for table `sambungan`
--

CREATE TABLE `sambungan` (
  `id` int(11) NOT NULL,
  `waktu` datetime NOT NULL DEFAULT current_timestamp(),
  `no` bigint(20) NOT NULL,
  `tanggal` date NOT NULL,
  `nama` text NOT NULL,
  `alamat` text NOT NULL,
  `peruntukan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `name` text NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `name`, `level`) VALUES
(1, 'baon@cikadap.com', '922facc3f4e6ca73c7d36ad7640bef968e3692864531b1fa2b3adb234667afa7f3f47c42b2bcdb84472ec99a86e8a48e25d0acbe7c13f76e5d3dee0dd926360d', 'Baon Cikadap', 1),
(2, 'henry@nasution.com', 'ae5bc537bb17554c8b3ee7c0786e8bb11fd7d1543d0e300f516f00e9a806c46f818512edd599f654f1597a63e206776b3b10f0ba6c82c5de646be486e01fac25', 'Henry Nasution', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sambungan`
--
ALTER TABLE `sambungan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sambungan`
--
ALTER TABLE `sambungan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
