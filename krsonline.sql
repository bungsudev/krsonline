-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2018 at 06:09 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `krsonline`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbldosen`
--

CREATE TABLE `tbldosen` (
  `iddosen` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `alamat` text NOT NULL,
  `notelephone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbljadwal`
--

CREATE TABLE `tbljadwal` (
  `idjadwal` varchar(10) NOT NULL,
  `idmatakuliah` varchar(10) NOT NULL,
  `iddosen` varchar(10) NOT NULL,
  `kuotakelas` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblkrsmhs`
--

CREATE TABLE `tblkrsmhs` (
  `idkrs` varchar(10) NOT NULL,
  `idjadwal` varchar(10) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `sks` varchar(3) NOT NULL,
  `semester` enum('I','II','III','IV','V','VI','VII','VIII') NOT NULL,
  `komentar` text NOT NULL,
  `status` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblmahasiswa`
--

CREATE TABLE `tblmahasiswa` (
  `nim` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `prodi` enum('ti','si') NOT NULL,
  `kuotasks` int(11) NOT NULL,
  `dpa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblmatakuliah`
--

CREATE TABLE `tblmatakuliah` (
  `idmatakuliah` varchar(10) NOT NULL,
  `namamatakuliah` varchar(100) NOT NULL,
  `sks` varchar(3) NOT NULL,
  `semester` enum('I','II','III','IV','V','VI','VII','VIII') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbldosen`
--
ALTER TABLE `tbldosen`
  ADD PRIMARY KEY (`iddosen`);

--
-- Indexes for table `tbljadwal`
--
ALTER TABLE `tbljadwal`
  ADD PRIMARY KEY (`idjadwal`,`idmatakuliah`,`iddosen`);

--
-- Indexes for table `tblkrsmhs`
--
ALTER TABLE `tblkrsmhs`
  ADD PRIMARY KEY (`idkrs`,`idjadwal`);

--
-- Indexes for table `tblmahasiswa`
--
ALTER TABLE `tblmahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `tblmatakuliah`
--
ALTER TABLE `tblmatakuliah`
  ADD PRIMARY KEY (`idmatakuliah`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
