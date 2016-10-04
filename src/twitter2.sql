-- phpMyAdmin SQL Dump
-- version 4.6.4deb1+deb.cihar.com~xenial.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 04, 2016 at 09:34 PM
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
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tweet_id` int(11) NOT NULL,
  `creation_date` date NOT NULL,
  `text` varchar(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `tweet_id`, `creation_date`, `text`) VALUES
(1, 42, 52, '2016-10-01', 'dziaÅ‚a czy nie dzaiÅ‚a'),
(2, 42, 54, '2016-10-03', ''),
(3, 42, 54, '2016-10-03', 'PrÃ³bny komentarz'),
(4, 42, 54, '2016-10-03', 'komentarz 2');

-- --------------------------------------------------------

--
-- Table structure for table `twetty`
--

CREATE TABLE `twetty` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `text` varchar(140) NOT NULL,
  `creation_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `twetty`
--

INSERT INTO `twetty` (`id`, `user_id`, `text`, `creation_date`) VALUES
(1, 1, 'blablabla', '2016-09-28'),
(2, 1, 'fdfdadfs', '2016-06-06'),
(3, 1, 'trotorlolololo', '2016-06-15'),
(4, 1, 'trotorlolololo', '2016-06-15'),
(46, 43, 'maybe now\r\n', '2016-09-30'),
(47, 43, 'maybe now\r\n', '2016-09-30'),
(48, 42, 'sddsffd', '2016-10-01'),
(49, 42, 'sddsffd', '2016-10-01'),
(50, 42, 'sddsffd', '2016-10-01'),
(51, 42, 'hadfskjfhda', '2016-10-01'),
(52, 42, 'PrÃ³ba\r\n', '2016-10-01'),
(53, 42, '<b>Bold</b>', '2016-10-03'),
(54, 42, '&lt;b&gt;hfdkjfhsdakjfd&lt;/b&gt;', '2016-10-03');

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
(21, 'dawid@twitter.pl', 'Dawid', '$2y$10$E/K1NfuE/QN21gewJXWzOOEYujbOssvcAIwUv.AnflE6yGX.7N6s2'),
(30, 'robert@twitter.pl', 'Robert', '$2y$10$P8dD2L0vg530AkUodZxem.MAuIgm8r6v5qZsHVdq8H7nXMFezW8Hm'),
(42, 'wera@tlen.pl', 'Wera', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(43, 'justin_b@wp.pl', 'Justyna', 'bae7c6ac76a5e22fd1bbf0d46f58746f379d2027'),
(44, 'filip@gmail.com', 'filip', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `tweet_id` (`tweet_id`);

--
-- Indexes for table `twetty`
--
ALTER TABLE `twetty`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`user_id`);

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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `twetty`
--
ALTER TABLE `twetty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `tweet_id relation` FOREIGN KEY (`tweet_id`) REFERENCES `twetty` (`id`),
  ADD CONSTRAINT `user_id relation` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `twetty`
--
ALTER TABLE `twetty`
  ADD CONSTRAINT `twetty_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
