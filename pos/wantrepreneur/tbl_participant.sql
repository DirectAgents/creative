-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 25, 2016 at 03:12 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

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
-- Table structure for table `tbl_participant`
--

CREATE TABLE IF NOT EXISTS `tbl_participant` (
  `userID` int(11) NOT NULL,
  `google_id` decimal(21,0) NOT NULL,
  `google_givenName` varchar(60) NOT NULL,
  `google_familyName` varchar(60) NOT NULL,
  `google_email` varchar(60) NOT NULL,
  `google_link` varchar(60) NOT NULL,
  `google_picture_link` varchar(200) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `userPass` varchar(100) NOT NULL,
  `EmailNotifications` varchar(255) NOT NULL,
  `Meetupchoice` varchar(255) NOT NULL,
  `CountryCode` varchar(255) NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `Age` varchar(255) NOT NULL,
  `Gender` varchar(25) NOT NULL,
  `Height` varchar(25) NOT NULL,
  `Status` varchar(25) NOT NULL,
  `Ethnicity` varchar(25) NOT NULL,
  `Smoke` varchar(25) NOT NULL,
  `Drink` varchar(25) NOT NULL,
  `Diet` varchar(25) NOT NULL,
  `Religion` varchar(255) NOT NULL,
  `Education` varchar(255) NOT NULL,
  `Job` varchar(255) NOT NULL,
  `Industry_Interest` longtext NOT NULL,
  `Languages` longtext NOT NULL,
  `Street` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL,
  `State` varchar(25) NOT NULL,
  `Zip` varchar(255) NOT NULL,
  `Country` varchar(255) NOT NULL,
  `Timezone` varchar(255) NOT NULL,
  `Bio` longtext NOT NULL,
  `Date_Availability_Option1` date DEFAULT NULL,
  `From_Time_Option1` varchar(255) NOT NULL,
  `To_Time_Option1` varchar(255) NOT NULL,
  `Location_Option1` varchar(255) NOT NULL,
  `Date_Availability_Option2` date DEFAULT NULL,
  `From_Time_Option2` varchar(22) NOT NULL,
  `To_Time_Option2` varchar(255) NOT NULL,
  `Location_Option2` varchar(255) NOT NULL,
  `Date_Availability_Option3` date DEFAULT NULL,
  `From_Time_Option3` varchar(255) NOT NULL,
  `To_Time_Option3` varchar(255) NOT NULL,
  `Location_Option3` varchar(255) NOT NULL,
  `Monday_From` varchar(255) NOT NULL,
  `Monday_To` varchar(255) NOT NULL,
  `Tuesday_From` varchar(255) NOT NULL,
  `Tuesday_To` varchar(255) NOT NULL,
  `Wednesday_From` varchar(255) NOT NULL,
  `Wednesday_To` varchar(255) NOT NULL,
  `Thursday_From` varchar(255) NOT NULL,
  `Thursday_To` varchar(255) NOT NULL,
  `Friday_From` varchar(255) NOT NULL,
  `Friday_To` varchar(255) NOT NULL,
  `Saturday_From` varchar(255) NOT NULL,
  `Saturday_To` varchar(255) NOT NULL,
  `Sunday_From` varchar(255) NOT NULL,
  `Sunday_To` varchar(255) NOT NULL,
  `Monday_Location` varchar(255) NOT NULL,
  `Tuesday_Location` varchar(255) NOT NULL,
  `Wednesday_Location` varchar(255) NOT NULL,
  `Thursday_Location` varchar(255) NOT NULL,
  `Friday_Location` varchar(255) NOT NULL,
  `Saturday_Location` varchar(255) NOT NULL,
  `Sunday_Location` varchar(255) NOT NULL,
  `userStatus` enum('Y','N') NOT NULL DEFAULT 'N',
  `tokenCode` varchar(100) NOT NULL,
  `profile_image` varchar(255) NOT NULL,
  `account_verified` varchar(255) NOT NULL,
  `account_id` varchar(255) NOT NULL,
  `owner_user_id` varchar(255) NOT NULL,
  `access_token` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `Date_Created` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_participant`
--

INSERT INTO `tbl_participant` (`userID`, `google_id`, `google_givenName`, `google_familyName`, `google_email`, `google_link`, `google_picture_link`, `FirstName`, `LastName`, `userEmail`, `userPass`, `EmailNotifications`, `Meetupchoice`, `CountryCode`, `Phone`, `Age`, `Gender`, `Height`, `Status`, `Ethnicity`, `Smoke`, `Drink`, `Diet`, `Religion`, `Education`, `Job`, `Industry_Interest`, `Languages`, `Street`, `City`, `State`, `Zip`, `Country`, `Timezone`, `Bio`, `Date_Availability_Option1`, `From_Time_Option1`, `To_Time_Option1`, `Location_Option1`, `Date_Availability_Option2`, `From_Time_Option2`, `To_Time_Option2`, `Location_Option2`, `Date_Availability_Option3`, `From_Time_Option3`, `To_Time_Option3`, `Location_Option3`, `Monday_From`, `Monday_To`, `Tuesday_From`, `Tuesday_To`, `Wednesday_From`, `Wednesday_To`, `Thursday_From`, `Thursday_To`, `Friday_From`, `Friday_To`, `Saturday_From`, `Saturday_To`, `Sunday_From`, `Sunday_To`, `Monday_Location`, `Tuesday_Location`, `Wednesday_Location`, `Thursday_Location`, `Friday_Location`, `Saturday_Location`, `Sunday_Location`, `userStatus`, `tokenCode`, `profile_image`, `account_verified`, `account_id`, `owner_user_id`, `access_token`, `code`, `Date_Created`) VALUES
(2, '0', '', '', '', '', '', 'Franz', 'Peter', 'peter@yahoo.com', 'c4ca4238a0b923820dcc509a6f75849b', '', 'In Person', '1', '9172872872', '18', 'Male', '', 'Divorced', 'White', '', '', '', '', '', '', '', '', '', 'New York, New York', 'NY', '', '', 'Eastern Time (US & Canada)', 'I am the king', '0000-00-00', '', '', '', '0000-00-00', '0', '', '', '0000-00-00', '', '', '', '06:00pm', '08:00pm', '07:00am', '09:00pm', '11:00am ', '01:00pm', '11:15am ', '12:45pm', '', '', '', '', '', '', '745 5th Avenue, New York, NY, United States', '2315 Broadway, New York, NY, United States', '110 East 42nd Street, New York, NY, United States', '110 East 42nd Street, New York, NY, United States', '', '', '', 'Y', '35db263e7c9c68ab37cb9d83cca37df7', '', '', '', '', '', '', '0000-00-00'),
(3, '0', '', '', '', '', '', 'Hanelore', 'Peterson', 'hanne@yahoo.com', 'c4ca4238a0b923820dcc509a6f75849b', '', 'In Person', '1', '9172872872', '19', 'Male', '', 'Divorced', 'White', '', '', '', '', '', '', '', '', '', 'New York, New York', 'NY', '', '', '', 'Yo', '0000-00-00', '', '', '', '0000-00-00', '0', '', '', '0000-00-00', '', '', '', '5:30pm', '07:00pm', '', '', '', '', '', '', '', '', '', '', '', '', '745 5th Avenue, New York, NY, United States', '', '', '', '', '', '', 'Y', '35db263e7c9c68ab37cb9d83cca37df7', '', '', '', '', '', '', '0000-00-00'),
(4, '0', '', '', '', '', '', 'Mike', 'Peter', 'franz@yahoo.com', 'c4ca4238a0b923820dcc509a6f75849b', '', 'In Person', '', '', '15', 'Female', '55', '', 'Asian', '', '', '', '', '', '', '', '', '', 'New York, New York', 'NY', '', '', '', '', '0000-00-00', '', '', '', '0000-00-00', '0', '', '', '0000-00-00', '', '', '', '06:00pm', '09:00pm', '', '', '', '', '', '', '', '', '', '', '', '', '745 5th Avenue, New York, NY, United States', '', '', '', '', '', '', 'Y', '', '', '', '712591703', '225647674', 'STAGE_5029820579b8aa43cea05c37ed7d4bde8bc86d51613086e502807e52ca66ede2', '', '0000-00-00'),
(5, '0', '', '', '', '', '', 'ASDF', 'SADFSA', '', '', '', 'In Person', '', '', '18', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '0000-00-00', '0', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'N', '', '', '', '', '', '', '', '0000-00-00'),
(6, '0', '', '', '', '', '', 'Franco', 'Banco', 'ald183s@gmail.com1111', 'c4ca4238a0b923820dcc509a6f75849b', 'When you qualify for new projects', 'In Person', '', '9173737382', '15', 'Female', '50', 'Single', 'Asian', 'Trying to quit', 'Very Often', 'Vegetarian', 'Agnostic', 'University', 'Education', 'Arts and Entertainment,Business and Career,Communities and Lifestyles,Internet and Technology,Parenting and Family,Pets and Animals,Science,Social,Sports and Recreation', '', '1111', 'New York', 'AL', '1111', 'AD', '', '', '2016-09-28', '11:00am', '07:00pm', 'Starbucks, Astoria, Queens, NY, United States', '2016-09-28', '06:00am', '06:00pm', '212 Broadway, Brooklyn, NY, United States', '2016-09-25', '08:00pm', '10:00pm', '212 Broadway, Brooklyn, NY, United States', '', '', '11:00am', '05:00pm', '08:00am', '12:00pm', '12:00pm', '08:00pm', '09:00am', '05:00pm', '12:00pm', '05:00pm', '01:00pm', '05:00pm', '212 Broadway, Brooklyn, NY, United States', '431 Broome Street, New York, NY, United States', '32 Lexington Avenue, Passaic, NJ, United States', '232 Lexington Avenue, Malverne, NY, United States', '112 Lexington Ave, Jersey City, NJ, United States', '123 Lexington Avenue, Dumont, NJ, United States', '1225 Broadway, Brooklyn, NY, United States', 'Y', '959199756aeb2470fc73d9a8d5a61a66', '6_13522563_10153780777487992_30567582_n.jpg', '1', '248767831', '258160103', 'STAGE_02c2e023e9cedede9dd4ba4507b2d3ca9d2f65100b2bbdc503d86ed555456848', 'a3ecbf3b9cbc4f11b196d6362a644ef4d355207df8a6590a9d', '0000-00-00'),
(26, '0', '', '', '', '', '', 'flu', 'blue', 'asdfasdf@lakjdsf.com', 'b8150db267de096dd2573e6d91882778', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '0000-00-00', '0', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'N', '28b09f4ce821632955e35c6d6d12d261', '', '', '', '', '', '', '2016-07-19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_participant`
--
ALTER TABLE `tbl_participant`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_participant`
--
ALTER TABLE `tbl_participant`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
