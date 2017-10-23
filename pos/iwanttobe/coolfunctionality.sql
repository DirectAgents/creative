-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 23, 2017 at 03:44 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coolfunctionality`
--

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE IF NOT EXISTS `photo` (
  `id` int(11) unsigned NOT NULL,
  `userID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `submissionID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `public_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `version` int(11) unsigned DEFAULT NULL,
  `width` int(11) unsigned DEFAULT NULL,
  `height` int(11) unsigned DEFAULT NULL,
  `format` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `resource_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `bytes` int(11) unsigned DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `etag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `secure_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `original_filename` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `moderated` tinyint(3) unsigned DEFAULT NULL,
  `placeholder` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `signature` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `overwritten` set('1') COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`id`, `userID`, `submissionID`, `description`, `public_id`, `version`, `width`, `height`, `format`, `resource_type`, `created_at`, `bytes`, `type`, `etag`, `url`, `secure_url`, `original_filename`, `path`, `moderated`, `placeholder`, `signature`, `overwritten`) VALUES
(116, '', '', '', 's3akgfdhdxau1fg6hzbb', 1508373472, 550, 600, 'jpg', 'image', '2017-10-19 02:37:53', 106445, 'upload', '092c4d57e3c5002cd144bf36e67bcd78', 'http://res.cloudinary.com/dgml9ji66/image/upload/v1508373472/s3akgfdhdxau1fg6hzbb.jpg', 'https://res.cloudinary.com/dgml9ji66/image/upload/v1508373472/s3akgfdhdxau1fg6hzbb.jpg', 'FS-OD1115_REAR', 'v1508373472/s3akgfdhdxau1fg6hzbb.jpg', 0, 'false', NULL, NULL),
(117, '911', '828066', '', 'FS99280-E.jpg', 1508371938, 550, 600, 'jpg', 'image', '2017-10-19 02:43:54', 85842, 'upload', 'ae483d16cccf5009fa3cd399ec4cde1e', 'http://res.cloudinary.com/dgml9ji66/image/upload/v1508371938/FS99280-E.jpg.jpg', 'https://res.cloudinary.com/dgml9ji66/image/upload/v1508371938/FS99280-E.jpg.jpg', 'phpUv13m4', NULL, 0, '0', '177f4c2fb28ff113ad25264917aa3c485ac3263c', '1'),
(118, '911', '912352', '', 'FS99280-E_REAR.jpg', 1508373956, 550, 600, 'jpg', 'image', '2017-10-19 02:45:57', 86647, 'upload', '21b8dd35066b618c9cf4d4cd604be78b', 'http://res.cloudinary.com/dgml9ji66/image/upload/v1508373956/FS99280-E_REAR.jpg.jpg', 'https://res.cloudinary.com/dgml9ji66/image/upload/v1508373956/FS99280-E_REAR.jpg.jpg', 'php0SFybx', NULL, 0, '0', '397474ea4f3d9226d6f29ac9e80f3d1d38e1bcca', NULL),
(119, '911', '194561', '', 'FS99281-EFD_REAR.jpg', 1508374560, 550, 600, 'jpg', 'image', '2017-10-19 02:56:01', 90134, 'upload', 'c168319538e39e43f8d67899c5114fb5', 'http://res.cloudinary.com/dgml9ji66/image/upload/v1508374560/FS99281-EFD_REAR.jpg.jpg', 'https://res.cloudinary.com/dgml9ji66/image/upload/v1508374560/FS99281-EFD_REAR.jpg.jpg', 'phprIOkZe', NULL, 0, '0', '61c4a6519849bd64a5ebcffc199352216bed14d7', NULL),
(120, '911', '710422', '', 'FS-FLEX185.jpg', 1508374832, 550, 600, 'jpg', 'image', '2017-10-19 03:00:32', 98531, 'upload', '83bd2d93d547211cfa9be29c7d8276a7', 'http://res.cloudinary.com/dgml9ji66/image/upload/v1508374832/FS-FLEX185.jpg.jpg', 'https://res.cloudinary.com/dgml9ji66/image/upload/v1508374832/FS-FLEX185.jpg.jpg', 'phpAJqj5p', NULL, 0, '0', '63a4eb1b956c51d3211cc5700a81012d63f6da7a', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `submission`
--

CREATE TABLE IF NOT EXISTS `submission` (
  `id` int(11) NOT NULL,
  `userID` varchar(255) NOT NULL,
  `submissionID` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `Date` date NOT NULL,
  `Time` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `submission`
--

INSERT INTO `submission` (`id`, `userID`, `submissionID`, `name`, `Date`, `Time`) VALUES
(27, '', '859715', '', '0000-00-00', ''),
(28, '', '455266', '', '0000-00-00', ''),
(29, '', '23966', 'blob', '0000-00-00', ''),
(30, '', '25144', 'dsfasdfasfd', '0000-00-00', ''),
(31, '911', '261397', 'rrrr', '0000-00-00', ''),
(32, '911', '977996', 'fdfdfdfdf', '0000-00-00', ''),
(33, '911', '944686', 'dfasdfasdf', '0000-00-00', ''),
(34, '911', '41205', 'asdfasd', '0000-00-00', ''),
(35, '911', '577602', 'sadfasd', '0000-00-00', ''),
(36, '911', '520012', 'dasdfasdf', '0000-00-00', ''),
(37, '911', '273758', '', '0000-00-00', ''),
(38, '911', '559818', '', '0000-00-00', ''),
(39, '911', '714431', '', '0000-00-00', ''),
(40, '911', '260772', '', '0000-00-00', ''),
(41, '911', '828066', '', '0000-00-00', ''),
(42, '911', '912352', '', '0000-00-00', ''),
(43, '911', '194561', '', '0000-00-00', ''),
(44, '911', '710422', '', '0000-00-00', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submission`
--
ALTER TABLE `submission`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=121;
--
-- AUTO_INCREMENT for table `submission`
--
ALTER TABLE `submission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
