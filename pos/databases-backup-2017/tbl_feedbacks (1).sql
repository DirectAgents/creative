-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 05, 2017 at 03:57 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mrpao`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedbacks`
--

CREATE TABLE IF NOT EXISTS `tbl_feedbacks` (
  `id` int(11) NOT NULL,
  `userID` varchar(255) NOT NULL,
  `startupID` varchar(255) NOT NULL,
  `ProjectID` varchar(255) NOT NULL,
  `Answer` varchar(255) NOT NULL,
  `ScreeningQuestion` varchar(255) NOT NULL,
  `Payload` longtext,
  `videoID_Answer1_Question1` varchar(255) DEFAULT NULL,
  `videoIDPipe_Answer1_Question1` varchar(255) DEFAULT NULL,
  `videoID_Answer1_Question2` varchar(255) DEFAULT NULL,
  `videoIDPipe_Answer1_Question2` varchar(255) DEFAULT NULL,
  `videoID_Answer1_Question3` varchar(255) DEFAULT NULL,
  `videoIDPipe_Answer1_Question3` varchar(255) DEFAULT NULL,
  `videoID_Answer1_Question4` varchar(255) DEFAULT NULL,
  `videoIDPipe_Answer1_Question4` varchar(255) DEFAULT NULL,
  `videoID_Answer2_Question1` varchar(255) DEFAULT NULL,
  `videoIDPipe_Answer2_Question1` varchar(255) DEFAULT NULL,
  `videoID_Answer2_Question2` varchar(255) DEFAULT NULL,
  `videoIDPipe_Answer2_Question2` varchar(255) DEFAULT NULL,
  `videoID_Answer2_Question3` varchar(255) DEFAULT NULL,
  `videoIDPipe_Answer2_Question3` varchar(255) DEFAULT NULL,
  `videoID_Answer2_Question4` varchar(255) DEFAULT NULL,
  `videoIDPipe_Answer2_Question4` varchar(255) DEFAULT NULL,
  `videoID_Answer3_Question1` varchar(255) DEFAULT NULL,
  `videoIDPipe_Answer3_Question1` varchar(255) DEFAULT NULL,
  `videoID_Answer3_Question2` varchar(255) DEFAULT NULL,
  `videoIDPipe_Answer3_Question2` varchar(255) DEFAULT NULL,
  `videoID_Answer3_Question3` varchar(255) DEFAULT NULL,
  `videoIDPipe_Answer3_Question3` varchar(255) DEFAULT NULL,
  `videoID_Answer3_Question4` varchar(255) DEFAULT NULL,
  `videoIDPipe_Answer3_Question4` varchar(255) DEFAULT NULL,
  `videoID_Answer4_Question1` varchar(255) DEFAULT NULL,
  `videoIDPipe_Answer4_Question1` varchar(255) DEFAULT NULL,
  `videoID_Answer4_Question2` varchar(255) DEFAULT NULL,
  `videoIDPipe_Answer4_Question2` varchar(255) DEFAULT NULL,
  `videoID_Answer4_Question3` varchar(255) DEFAULT NULL,
  `videoIDPipe_Answer4_Question3` varchar(255) DEFAULT NULL,
  `videoID_Answer4_Question4` varchar(255) DEFAULT NULL,
  `videoIDPipe_Answer4_Question4` varchar(255) DEFAULT NULL,
  `Date` date NOT NULL,
  `Time` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_feedbacks`
--

INSERT INTO `tbl_feedbacks` (`id`, `userID`, `startupID`, `ProjectID`, `Answer`, `ScreeningQuestion`, `Payload`, `videoID_Answer1_Question1`, `videoIDPipe_Answer1_Question1`, `videoID_Answer1_Question2`, `videoIDPipe_Answer1_Question2`, `videoID_Answer1_Question3`, `videoIDPipe_Answer1_Question3`, `videoID_Answer1_Question4`, `videoIDPipe_Answer1_Question4`, `videoID_Answer2_Question1`, `videoIDPipe_Answer2_Question1`, `videoID_Answer2_Question2`, `videoIDPipe_Answer2_Question2`, `videoID_Answer2_Question3`, `videoIDPipe_Answer2_Question3`, `videoID_Answer2_Question4`, `videoIDPipe_Answer2_Question4`, `videoID_Answer3_Question1`, `videoIDPipe_Answer3_Question1`, `videoID_Answer3_Question2`, `videoIDPipe_Answer3_Question2`, `videoID_Answer3_Question3`, `videoIDPipe_Answer3_Question3`, `videoID_Answer3_Question4`, `videoIDPipe_Answer3_Question4`, `videoID_Answer4_Question1`, `videoIDPipe_Answer4_Question1`, `videoID_Answer4_Question2`, `videoIDPipe_Answer4_Question2`, `videoID_Answer4_Question3`, `videoIDPipe_Answer4_Question3`, `videoID_Answer4_Question4`, `videoIDPipe_Answer4_Question4`, `Date`, `Time`) VALUES
(4, '8111', '17', '50134', 'No, I don''t have that problem', 'Not required', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-09-24', '02:10:44 PM'),
(29, '8', '17', '50134', 'Yes, I have that problem', 'Not required', NULL, 'vs1506291863641_82', '542281', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-09-24', '06:17:16 PM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_feedbacks`
--
ALTER TABLE `tbl_feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_feedbacks`
--
ALTER TABLE `tbl_feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
