-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 01, 2016 at 11:38 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `circl`
--

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `language` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `language`) VALUES
(1, 'German'),
(2, 'Turkish'),
(3, 'Spanish'),
(4, 'French'),
(5, 'Italian'),
(6, 'Chinese'),
(7, 'Tagalog'),
(8, 'Korean'),
(9, 'Vietnamese'),
(10, 'Portugese'),
(11, 'Japanese'),
(12, 'Greek'),
(13, 'Arabic'),
(14, 'Hindi'),
(15, 'Russian'),
(16, 'Yiddish'),
(17, 'Thai'),
(18, 'Persian'),
(19, 'Armenian'),
(20, 'Navaho'),
(21, 'Hungarian'),
(22, 'Hebrew'),
(23, 'Dutch'),
(24, 'Mon-khmer'),
(25, 'Gujarathi'),
(26, 'Ukrainian'),
(27, 'Czech'),
(28, 'Miao'),
(29, 'Norwegian'),
(30, 'Slovak'),
(31, 'Swedish'),
(32, 'Serbocroatian'),
(33, 'Kru'),
(34, 'Rumanian'),
(35, 'Lithuanian'),
(36, 'Finnish'),
(37, 'Panjabi'),
(38, 'Formosan'),
(39, 'Croatian'),
(40, 'Ilocano'),
(41, 'Bengali'),
(42, 'Danish'),
(43, 'Syriac'),
(44, 'Samoan'),
(45, 'Malayalam'),
(46, 'Cajun'),
(47, 'Amharic');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
