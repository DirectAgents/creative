-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 17, 2017 at 05:24 AM
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
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`id`, `userID`, `submissionID`, `description`, `public_id`, `version`, `width`, `height`, `format`, `resource_type`, `created_at`, `bytes`, `type`, `etag`, `url`, `secure_url`, `original_filename`, `path`, `moderated`, `placeholder`, `signature`, `overwritten`) VALUES
(104, '911', '41205', '', 'Screen Shot 2017-10-05 at 1.00.13 PM.png', 1508103747, 298, 394, 'png', 'image', '2017-10-17 04:24:01', 92836, 'upload', '0156af55394450f727ad0c362fd96967', 'http://res.cloudinary.com/dgml9ji66/image/upload/v1508103747/Screen%20Shot%202017-10-05%20at%201.00.13%20PM.png.png', 'https://res.cloudinary.com/dgml9ji66/image/upload/v1508103747/Screen%20Shot%202017-10-05%20at%201.00.13%20PM.png.png', 'phpp5ptYg', NULL, 0, '0', '166a81b34799d8bd0347ec0351cb4eb6e079ac4c', '1'),
(105, '911', '41205', '', 'Screen Shot 2017-10-05 at 12.52.44 PM.png', 1508104715, 1228, 632, 'png', 'image', '2017-10-17 04:24:01', 77550, 'upload', '49311f0c5343e95fb806a519ce529501', 'http://res.cloudinary.com/dgml9ji66/image/upload/v1508104715/Screen%20Shot%202017-10-05%20at%2012.52.44%20PM.png.png', 'https://res.cloudinary.com/dgml9ji66/image/upload/v1508104715/Screen%20Shot%202017-10-05%20at%2012.52.44%20PM.png.png', 'phpuIjiZL', NULL, 0, '0', '3cd929648ca7c187e458a280d6ea295a7ade0b99', '1'),
(106, '911', '577602', '', 'FS-FLEX253-Rear.jpg', 1508209130, 550, 600, 'jpg', 'image', '2017-10-17 04:58:51', 96610, 'upload', '5fe7bb1cc3d7b8ebeff8e4cb43fe0194', 'http://res.cloudinary.com/dgml9ji66/image/upload/v1508209130/FS-FLEX253-Rear.jpg.jpg', 'https://res.cloudinary.com/dgml9ji66/image/upload/v1508209130/FS-FLEX253-Rear.jpg.jpg', 'php0h7bBD', NULL, 0, '0', 'cf00364dad56cedb0ce752e7f5bf7cec4b7c0cf6', NULL),
(107, '911', '577602', '', 'FS-FLEX253-Profile.jpg', 1508110586, 550, 600, 'jpg', 'image', '2017-10-17 04:58:51', 98181, 'upload', '9eee77d88e70eb1ce854b15220397f77', 'http://res.cloudinary.com/dgml9ji66/image/upload/v1508110586/FS-FLEX253-Profile.jpg.jpg', 'https://res.cloudinary.com/dgml9ji66/image/upload/v1508110586/FS-FLEX253-Profile.jpg.jpg', 'phpretCkP', NULL, 0, '0', '571c6736d8fcdb5cc9c2e2fcd369160c588abf3d', '1'),
(108, '911', '520012', '', 'Screen Shot 2017-06-18 at 9.34.04 PM.png', 1508209555, 950, 495, 'png', 'image', '2017-10-17 05:05:56', 297619, 'upload', 'cb43925b1c4788371eaeaf696e67201b', 'http://res.cloudinary.com/dgml9ji66/image/upload/v1508209555/Screen%20Shot%202017-06-18%20at%209.34.04%20PM.png.png', 'https://res.cloudinary.com/dgml9ji66/image/upload/v1508209555/Screen%20Shot%202017-06-18%20at%209.34.04%20PM.png.png', 'phpo2Pfju', NULL, 0, '0', '2abb63ed3f7392b0e90004c143d6983b549af2b8', NULL),
(109, '911', '520012', '', 'Screen Shot 2017-06-18 at 9.31.43 PM.png', 1508209556, 535, 490, 'png', 'image', '2017-10-17 05:05:56', 58252, 'upload', '35638e1fcbc8d0d200b4f02623a09483', 'http://res.cloudinary.com/dgml9ji66/image/upload/v1508209556/Screen%20Shot%202017-06-18%20at%209.31.43%20PM.png.png', 'https://res.cloudinary.com/dgml9ji66/image/upload/v1508209556/Screen%20Shot%202017-06-18%20at%209.31.43%20PM.png.png', 'phpULWAMV', NULL, 0, '0', '603b6d654ae1e989c5660ab42532322f570d0d41', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

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
(36, '911', '520012', 'dasdfasdf', '0000-00-00', '');

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
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=110;
--
-- AUTO_INCREMENT for table `submission`
--
ALTER TABLE `submission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
