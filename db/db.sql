-- phpMyAdmin SQL Dump
-- version 4.3.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2015 m. Kov 26 d. 14:02
-- Server version: 5.5.41-0+wheezy1
-- PHP Version: 5.4.39-0+deb7u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `ID` int(12) DEFAULT NULL,
  `rank` int(12) DEFAULT NULL,
  `content` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(12) DEFAULT NULL,
  `rank` int(12) DEFAULT NULL,
  `nick` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `votes`
--

CREATE TABLE IF NOT EXISTS `votes` (
  `IDuser` int(12) NOT NULL,
  `IDpost` int(12) NOT NULL,
  `vote` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD KEY `ID` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
