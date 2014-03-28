-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 26, 2014 at 09:13 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `siswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `rpl1`
--

CREATE TABLE IF NOT EXISTS `rpl1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) NOT NULL,
  `gender` varchar(45) NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `rpl1`
--

INSERT INTO `rpl1` (`id`, `nama`, `gender`, `alamat`, `foto`) VALUES
(23, 'Abdul Avif', 'Laki-laki', 'Bojonggede', 'Abdul Avif'),
(24, 'Shandy', 'Laki-laki', 'Gg. Nyamuk', 'Shandy'),
(25, 'Sistiandy ', 'Laki-laki', 'Kp. Kelapa Rt. 03/20', 'Sistiandy syahbana nugraha');

-- --------------------------------------------------------

--
-- Table structure for table `rpl2`
--

CREATE TABLE IF NOT EXISTS `rpl2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) NOT NULL,
  `gender` varchar(45) NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `rpl2`
--

INSERT INTO `rpl2` (`id`, `nama`, `gender`, `alamat`, `foto`) VALUES
(2, 'Rio Suwardian', 'Laki-laki', 'Gg. Nyamuk 23', 'rio1'),
(3, 'krisna panji', 'Laki-laki', 'Gg. Nyamuk', 'krisna panji');

-- --------------------------------------------------------

--
-- Table structure for table `rpl3`
--

CREATE TABLE IF NOT EXISTS `rpl3` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) NOT NULL,
  `gender` varchar(45) NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `rpl3`
--

INSERT INTO `rpl3` (`id`, `nama`, `gender`, `alamat`, `foto`) VALUES
(7, 'Sistiandy', 'Laki-laki', 'Kp. Kelapa Rt. 03/20', 'Sistiandy sn');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'sistiandy', '827ccb0eea8a706c4c34a16891f84e7b');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
