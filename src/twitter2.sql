-- phpMyAdmin SQL Dump
-- version 4.6.4deb1+deb.cihar.com~xenial.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 27, 2016 at 07:09 PM
-- Server version: 5.7.13-0ubuntu0.16.04.2
-- PHP Version: 7.0.8-0ubuntu0.16.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `twitter2`
--

-- --------------------------------------------------------

--
-- Table structure for table `twetty`
--

CREATE TABLE `twetty` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `text` varchar(140) NOT NULL,
  `creation_data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `hashed_password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `hashed_password`) VALUES
(1, 'marek@twitter.pl', 'Marek', '$2y$10$ESgEWygsISaUYtR/1/Viq.0LcBATbU5qRpU.6Hl08vvTayukiGkOW'),
(8, '', '', '$2y$10$0yfz2LUGSo1Ul1jQxhINke8MUiH6xVain07mvMW6M/6NajV5X0YSK'),
(21, 'justyna@twitter.pl', 'Justyna', '$2y$10$n.oXDSfbAz9vJ9DNz4TbguA/k1G5d569s68dpWSapu37tY4M6O5Nu'),
(30, 'robert@twitter.pl', 'Robert', '$2y$10$P8dD2L0vg530AkUodZxem.MAuIgm8r6v5qZsHVdq8H7nXMFezW8Hm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `twetty`
--
ALTER TABLE `twetty`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `twetty`
--
ALTER TABLE `twetty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `twetty`
--
ALTER TABLE `twetty`
  ADD CONSTRAINT `twetty_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
