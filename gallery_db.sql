-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2018 at 12:25 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gallery_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `filename` varchar(255) NOT NULL,
  `alternate_text` varchar(285) NOT NULL,
  `type` varchar(255) NOT NULL,
  `size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `title`, `caption`, `description`, `filename`, `alternate_text`, `type`, `size`) VALUES
(11, 'brandnew style', 'winners', 'i came nerver came into the beach ', 'Image+1.jpg', 'dream come true', 'image/jpeg', 20600),
(16, 'But here I am', 'A dream come true', 'We are just like the waves that flow back and forth', 'Image+1.jpg', 'And I wanna thank you with all of my heart', 'image/jpeg', 20600),
(19, 'image8', 'Next to you', 'Is it supposed to be this hot all summer long?', 'Image+8.jpg', 'The sky is more blue', 'image/jpeg', 21872),
(20, 'image2', 'this total co-ordination united', 'this total co-ordination united\r\nthe movements of my body', 'Image+2.jpg', 'the movements of my body', 'image/jpeg', 20488);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`) VALUES
(1, 'dhanushka', '123456', 'dsklfjkdsjf', 'williamsss'),
(2, 'dhanushka', '50403010', 'edwin', 'diaz'),
(3, 'dhanushka', '789456142', 'steve', 'jobs'),
(4, 'dhanushka', 'Exaple_password', 'dhanushka', 'gayan'),
(16, 'dhanushka', '23656', 'jhone', 'google'),
(17, 'dhanushka', 'sdfsdf', 'sdfsdf', 'sdfsdf'),
(20, 'dhanushka', '123456', 'hansadi', 'dhanushh'),
(21, 'dhanushka', '121193483', 'haloja', 'lastword'),
(22, 'dhanushka', '121193483', 'haloja', 'lastword'),
(23, 'dhanushka', '5555555', 'haloja', 'lastword'),
(24, 'dhanushka', '5555555', 'haloja', 'lastword'),
(25, 'dhanushka', '5555555', 'haloja', 'lastword'),
(26, 'dhanushka', '5555555', 'haloja', 'lastword'),
(27, 'dhanushka', '5555555', 'haloja', 'lastword'),
(28, 'dhanushka', '5555555', 'haloja', 'lastword');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
