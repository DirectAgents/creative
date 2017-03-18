-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 03, 2016 at 03:35 PM
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
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL,
  `original_image` varchar(250) NOT NULL,
  `thumbnail_image` varchar(250) NOT NULL,
  `ip_address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `interests`
--

CREATE TABLE IF NOT EXISTS `interests` (
  `id` int(11) NOT NULL,
  `interest` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `interests`
--

INSERT INTO `interests` (`id`, `interest`) VALUES
(1, 'Marketing Strategy'),
(2, 'Start-ups'),
(3, 'Social Media Marketing'),
(4, 'Social Media'),
(5, 'Business Strategy'),
(6, 'Business Strategy'),
(7, 'Business Development'),
(8, 'Public Speaking'),
(9, 'New Business Development'),
(10, 'Web Design'),
(11, 'Public Speaking'),
(12, 'New Business Development'),
(13, 'Haskell'),
(14, 'Product Management'),
(15, 'Entrepreneurship'),
(16, 'Fundraising'),
(17, 'Software Development'),
(18, 'User Interface Design'),
(19, 'Financial Modelling'),
(20, 'Facebook'),
(21, 'Online Marketing'),
(22, 'Digital Marketing'),
(23, 'Coaching'),
(24, 'Leadership Development'),
(25, 'Strategic Partnerships');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(11) NOT NULL,
  `language` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `language`) VALUES
(1, 'ActionScript'),
(2, 'AppleScript'),
(3, 'Asp'),
(4, 'BASIC'),
(5, 'C'),
(6, 'C++'),
(7, 'Clojure'),
(8, 'COBOL'),
(9, 'ColdFusion'),
(10, 'Erlang'),
(11, 'Fortran'),
(12, 'Groovy'),
(13, 'Haskell'),
(14, 'Java'),
(15, 'JavaScript'),
(16, 'Lisp'),
(17, 'MySQL'),
(18, 'Oracle'),
(19, 'Perl'),
(20, 'PHP'),
(21, 'Python'),
(22, 'Ruby'),
(23, 'Scala'),
(24, 'Scheme'),
(25, 'SQL');

-- --------------------------------------------------------

--
-- Table structure for table `participant_profile_images`
--

CREATE TABLE IF NOT EXISTS `participant_profile_images` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `thumbnail_image` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `participant_profile_images`
--

INSERT INTO `participant_profile_images` (`id`, `userID`, `thumbnail_image`) VALUES
(107, 2, 'thumb_1465239384783.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_participant`
--

CREATE TABLE IF NOT EXISTS `tbl_participant` (
  `userID` int(11) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `userPass` varchar(100) NOT NULL,
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
  `Date_Created` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_participant`
--

INSERT INTO `tbl_participant` (`userID`, `FirstName`, `LastName`, `userEmail`, `userPass`, `Meetupchoice`, `CountryCode`, `Phone`, `Age`, `Gender`, `Height`, `Status`, `Ethnicity`, `Smoke`, `Drink`, `Diet`, `Religion`, `Education`, `Job`, `Industry_Interest`, `Languages`, `Street`, `City`, `State`, `Zip`, `Country`, `Timezone`, `Bio`, `Monday_From`, `Monday_To`, `Tuesday_From`, `Tuesday_To`, `Wednesday_From`, `Wednesday_To`, `Thursday_From`, `Thursday_To`, `Friday_From`, `Friday_To`, `Saturday_From`, `Saturday_To`, `Sunday_From`, `Sunday_To`, `Monday_Location`, `Tuesday_Location`, `Wednesday_Location`, `Thursday_Location`, `Friday_Location`, `Saturday_Location`, `Sunday_Location`, `userStatus`, `tokenCode`, `profile_image`, `Date_Created`) VALUES
(2, 'Franz', 'Peter', 'peter@yahoo.com', 'c4ca4238a0b923820dcc509a6f75849b', 'In Person', '1', '9172872872', '18', 'Male', '', 'Divorced', 'White', '', '', '', '', '', '', '', '', '', 'New York, New York', 'NY', '', '', 'Eastern Time (US & Canada)', 'I am the king', '06:00pm', '08:00pm', '04:00pm', '09:00pm', '11:00am ', '01:00pm', '11:15am ', '12:45pm', '', '', '', '', '', '', '745 5th Avenue, New York, NY, United States', '2315 Broadway, New York, NY, United States', '110 East 42nd Street, New York, NY, United States', '110 East 42nd Street, New York, NY, United States', '', '', '', 'Y', '35db263e7c9c68ab37cb9d83cca37df7', '', '0000-00-00'),
(3, 'Hanelore', 'Peterson', 'hanne@yahoo.com', 'c4ca4238a0b923820dcc509a6f75849b', 'In Person', '1', '9172872872', '19', 'Male', '', 'Divorced', 'White', '', '', '', '', '', '', '', '', '', 'New York, New York', 'NY', '', '', '', 'Yo', '5:30pm', '07:00pm', '', '', '', '', '', '', '', '', '', '', '', '', '745 5th Avenue, New York, NY, United States', '', '', '', '', '', '', 'Y', '35db263e7c9c68ab37cb9d83cca37df7', '', '0000-00-00'),
(4, 'Mike', 'Peter', 'franz@yahoo.com', 'c4ca4238a0b923820dcc509a6f75849b', 'In Person', '', '', '15', 'Female', '', 'Single', 'White', '', '', '', '', '', '', '', '', '', 'New York, New York', 'NY', '', '', '', '', '06:00pm', '09:00pm', '', '', '', '', '', '', '', '', '', '', '', '', '745 5th Avenue, New York, NY, United States', '', '', '', '', '', '', 'Y', '', '', '0000-00-00'),
(5, 'ASDF', 'SADFSA', '', '', 'In Person', '', '', '18', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'N', '', '', '0000-00-00'),
(6, 'Franco', 'Banco', 'franco@test.com', 'c4ca4238a0b923820dcc509a6f75849b', 'In Person', '', '', '15', 'Female', '50', 'Sinlge', 'Asian', 'Yes', 'Very Often', 'Vegetarian', 'Agnostic', 'High School', 'Technology', 'accounting,advertising', 'EN,DE', '1111', 'New York', 'asdfasdfas', '1111', 'AD', '', 'helloffff', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Y', '959199756aeb2470fc73d9a8d5a61a66', '6_13522563_10153780777487992_30567582_n.jpg', '0000-00-00'),
(26, 'flu', 'blue', 'asdfasdf@lakjdsf.com', 'b8150db267de096dd2573e6d91882778', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'N', '28b09f4ce821632955e35c6d6d12d261', '', '2016-07-19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_participant_interests`
--

CREATE TABLE IF NOT EXISTS `tbl_participant_interests` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `Interests` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_participant_interests`
--

INSERT INTO `tbl_participant_interests` (`id`, `userID`, `Interests`) VALUES
(1, 2, 'ActionScript'),
(70, 2, 'Haskell'),
(71, 2, 'AppleScript'),
(74, 3, 'Sport');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_project_request`
--

CREATE TABLE IF NOT EXISTS `tbl_project_request` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `ProjectID` int(11) NOT NULL,
  `Meetupchoice` varchar(255) NOT NULL,
  `Date_of_Meeting` date NOT NULL,
  `Day` varchar(255) NOT NULL,
  `Time` varchar(255) NOT NULL,
  `Location` varchar(255) NOT NULL,
  `Accepted_to_Participate` varchar(255) NOT NULL,
  `Not_Qualified_Anymore` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `Requested_By` varchar(255) NOT NULL,
  `Met` varchar(255) NOT NULL,
  `Payment` varchar(255) NOT NULL,
  `Date_Posted` date NOT NULL,
  `Time_Posted` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_project_request`
--

INSERT INTO `tbl_project_request` (`id`, `userID`, `ProjectID`, `Meetupchoice`, `Date_of_Meeting`, `Day`, `Time`, `Location`, `Accepted_to_Participate`, `Not_Qualified_Anymore`, `Status`, `Requested_By`, `Met`, `Payment`, `Date_Posted`, `Time_Posted`) VALUES
(53, 2, 92340, '', '0000-00-00', 'Monday', '06:00 PM', '32 George Street, Greenwich, New South Wales, Australia', 'Pending', '', 'Cancelled_by_Researcher', '', '', '', '2016-05-20', ''),
(55, 4, 92340, '', '0000-00-00', 'Tuesday', '08:00 PM', '736 Madison Ave, Albany, NY, United States', 'Pending', 'Not Qualified Anymore', 'Cancelled_by_Researcher', '', '', '', '2016-05-25', ''),
(60, 3, 0, '', '0000-00-00', 'Monday', '06:30 PM', '32 Walker Street, North Sydney, New South Wales, Australia', 'Accepted', '', 'Cancelled_by_Researcher', '', '', '', '2016-06-15', '05:36:23 PM'),
(61, 5, 28750, '', '0000-00-00', 'Monday', '06:00 PM', '136 Pitt Street, Sydney, New South Wales, Australia', 'Accepted', '', '', '', '', '', '2016-06-20', '11:26:47 AM'),
(63, 4, 76340, '', '0000-00-00', 'Wednesday', '12:00 PM', '426 Oxford Street, Bondi Junction, New South Wales, Australia', 'Accepted', '', '', '', '', '', '2016-06-20', '11:47:03 AM'),
(66, 4, 28750, '', '0000-00-00', 'Monday', '06:00 PM', '320 Oxford Street, Bondi Junction, New South Wales, Australia', 'Accepted', 'Not Qualified Anymore', '', 'Researcher', '', '', '2016-07-13', '12:42:54 PM'),
(68, 6, 28750, '', '0000-00-00', 'Monday', '06:00 AM', '54 Pitt Street, Sydney, New South Wales, Australia', 'Accepted', '', '', 'Researcher', '', '', '2016-07-14', '11:06:03 PM');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_researcher`
--

CREATE TABLE IF NOT EXISTS `tbl_researcher` (
  `userID` int(11) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `Location` varchar(255) NOT NULL,
  `Timezone` varchar(255) NOT NULL,
  `Bio` longtext NOT NULL,
  `Linkedin` varchar(255) NOT NULL,
  `Twitter` varchar(255) NOT NULL,
  `Facebook` varchar(255) NOT NULL,
  `EmailNotifications` varchar(255) NOT NULL,
  `profile_image` varchar(255) NOT NULL,
  `userPass` varchar(100) NOT NULL,
  `userStatus` enum('Y','N') NOT NULL DEFAULT 'N',
  `tokenCode` varchar(100) NOT NULL,
  `credit_card_id` varchar(255) NOT NULL,
  `billing_address_one` varchar(255) NOT NULL,
  `billing_address_two` varchar(255) NOT NULL,
  `billing_city` varchar(255) NOT NULL,
  `billing_state` varchar(255) NOT NULL,
  `billing_zip` varchar(255) NOT NULL,
  `billing_country` varchar(255) NOT NULL,
  `cc_last_four` varchar(255) NOT NULL,
  `cc_name` varchar(255) NOT NULL,
  `Date_Created` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_researcher`
--

INSERT INTO `tbl_researcher` (`userID`, `userName`, `FirstName`, `LastName`, `userEmail`, `Phone`, `Location`, `Timezone`, `Bio`, `Linkedin`, `Twitter`, `Facebook`, `EmailNotifications`, `profile_image`, `userPass`, `userStatus`, `tokenCode`, `credit_card_id`, `billing_address_one`, `billing_address_two`, `billing_city`, `billing_state`, `billing_zip`, `billing_country`, `cc_last_four`, `cc_name`, `Date_Created`) VALUES
(31, '', 'Franz', 'Bauer', 'ald183s@gmail.com', '', '', '', '', '', '', '', '', '', '202cb962ac59075b964b07152d234b70', 'Y', 'ac630a9a4960ecb3a71ceee10939219c', '', '', '', '', '', '', '', '', '', '0000-00-00'),
(32, '', 'Mona', 'Bubby', 'test@test.com', '123', 'New York, New York', 'Eastern Time (US & Canada)', '', 'adasdfs', 'wwww', 'dfffffff', 'New participant requests to participate', 'thumb_146751013008_10153819353100062_7688309_n.jpg', '202cb962ac59075b964b07152d234b70', 'Y', 'ad050eb4c27811a06895ead0bbd433f4', '3951836993', 'dddd', '3Lfdsfasdfsad', 'New York11111', 'NY', '11103', 'US', '1389', 'MasterCard xxxxxx1389', '0000-00-00'),
(35, '', 'Lola', 'Bola', 'lola@test.com', '', '', '', '', '', '', '', '', '', 'b8150db267de096dd2573e6d91882778', 'N', '605d5acf2edaca205c15407ba6bfaac7', '', '', '', '', '', '', '', '', '', '2016-07-19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_researcher_interests`
--

CREATE TABLE IF NOT EXISTS `tbl_researcher_interests` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `ProjectID` int(11) NOT NULL,
  `Interests` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_researcher_interests`
--

INSERT INTO `tbl_researcher_interests` (`id`, `userID`, `ProjectID`, `Interests`) VALUES
(88, 32, 62684, 'ActionScript'),
(94, 32, 62684, 'a'),
(95, 32, 62684, 'a'),
(96, 32, 62684, 'a'),
(97, 32, 62684, 'Web Design');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_researcher_potentialanswers`
--

CREATE TABLE IF NOT EXISTS `tbl_researcher_potentialanswers` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `ProjectID` int(11) NOT NULL,
  `Screening` longtext NOT NULL,
  `PotentialAnswer1` varchar(255) NOT NULL,
  `PotentialAnswer2` varchar(255) NOT NULL,
  `PotentialAnswer3` varchar(255) NOT NULL,
  `PotentialAnswer4` varchar(255) NOT NULL,
  `PotentialAnswer5` varchar(255) NOT NULL,
  `Accepted` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_researcher_potentialanswers`
--

INSERT INTO `tbl_researcher_potentialanswers` (`id`, `userID`, `ProjectID`, `Screening`, `PotentialAnswer1`, `PotentialAnswer2`, `PotentialAnswer3`, `PotentialAnswer4`, `PotentialAnswer5`, `Accepted`) VALUES
(13, 32, 41, '', '          ', '          ', '          ', '', '', ''),
(14, 32, 65, '', '        ', '        ', '        ', '', '', ''),
(15, 32, 66, '', '        ', '        ', '        ', '', '', ''),
(16, 32, 42, '', '           ', '           ', '           ', '', '', ''),
(17, 32, 70, '', '           ', '           ', '           ', '', '', ''),
(18, 32, 72, '', '           ', '           ', '           ', '', '', ''),
(19, 32, 77, '', '           ', '           ', '           ', '', '', 'NULL'),
(22, 32, 92340, 'GGG', 'test            ', 'testb        ', 'testc            ', '', '', 'Potential Answer 3'),
(23, 32, 62684, 'NULL', '                    ', '                    ', '                    ', '', '', 'NULL'),
(24, 32, 70881, 'NULL', '  ', '  ', '  ', '', '', 'NULL'),
(25, 32, 76340, 'asdfasdf', 'Hallo                 ', 'was geht        ', '                 ', '', '', 'Potential Answer 2'),
(26, 32, 2138, 'NULL', '     ', '     ', '     ', '', '', 'NULL'),
(27, 32, 8359, 'NULL', ' ', ' ', ' ', '', '', ''),
(28, 32, 40383, 'NULL', ' ', ' ', ' ', '', '', ''),
(29, 32, 77671, 'NULL', ' ', ' ', ' ', '', '', ''),
(30, 32, 93037, 'NULL', '    ', '    ', '    ', '', '', 'NULL'),
(31, 32, 18549, 'NULL', '  ', '  ', '  ', '', '', 'NULL'),
(32, 32, 92234, 'NULL', '      ', '      ', '      ', '', '', 'NULL'),
(33, 32, 31884, 'NULL', ' ', ' ', ' ', '', '', ''),
(34, 32, 31949, 'NULL', ' ', ' ', ' ', '', '', ''),
(35, 32, 83541, 'NULL', ' ', ' ', ' ', '', '', ''),
(36, 32, 54623, 'NULL', ' ', ' ', ' ', '', '', ''),
(37, 32, 64656, 'NULL', ' ', ' ', ' ', '', '', ''),
(38, 32, 1160, 'NULL', ' ', ' ', ' ', '', '', ''),
(39, 32, 12329, 'NULL', ' ', ' ', ' ', '', '', ''),
(40, 32, 31543, 'NULL', ' ', ' ', ' ', '', '', ''),
(41, 32, 73069, 'NULL', ' ', ' ', ' ', '', '', ''),
(42, 32, 57043, 'NULL', ' ', ' ', ' ', '', '', ''),
(43, 32, 46400, 'NULL', ' ', ' ', ' ', '', '', ''),
(44, 32, 10435, 'NULL', ' ', ' ', ' ', '', '', ''),
(45, 32, 95696, 'NULL', ' ', ' ', ' ', '', '', ''),
(46, 32, 48158, 'NULL', ' ', ' ', ' ', '', '', ''),
(47, 32, 77218, 'NULL', ' ', ' ', ' ', '', '', ''),
(48, 32, 79225, 'NULL', '     ', '     ', '     ', '', '', 'NULL'),
(49, 32, 51386, 'NULL', ' ', ' ', ' ', '', '', ''),
(50, 32, 5669, 'NULL', ' ', ' ', ' ', '', '', 'NULL'),
(51, 32, 28750, 'NULL', ' ', ' ', ' ', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_researcher_project`
--

CREATE TABLE IF NOT EXISTS `tbl_researcher_project` (
  `id` int(11) NOT NULL,
  `ProjectID` int(11) NOT NULL,
  `Category` varchar(255) NOT NULL,
  `researcherID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Meetupchoice` varchar(255) NOT NULL,
  `Age` varchar(255) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `MinHeight` varchar(25) NOT NULL,
  `MaxHeight` varchar(255) NOT NULL,
  `Street` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL,
  `State` varchar(255) NOT NULL,
  `Zip` varchar(255) NOT NULL,
  `Country` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `Ethnicity` varchar(255) NOT NULL,
  `Smoke` varchar(255) NOT NULL,
  `Drink` varchar(255) NOT NULL,
  `Diet` varchar(255) NOT NULL,
  `Religion` varchar(255) NOT NULL,
  `Education` varchar(255) NOT NULL,
  `Job` varchar(255) NOT NULL,
  `Industry_Interest` longtext NOT NULL,
  `Languages` varchar(255) NOT NULL,
  `Headline` varchar(255) NOT NULL,
  `Summary` longtext NOT NULL,
  `project_image` varchar(255) NOT NULL,
  `Date_Created` date NOT NULL,
  `Date_Updated` date NOT NULL,
  `ProjectStatus` varchar(25) NOT NULL,
  `Confirmed` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB AUTO_INCREMENT=139 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_researcher_project`
--

INSERT INTO `tbl_researcher_project` (`id`, `ProjectID`, `Category`, `researcherID`, `Name`, `Meetupchoice`, `Age`, `Gender`, `MinHeight`, `MaxHeight`, `Street`, `City`, `State`, `Zip`, `Country`, `Status`, `Ethnicity`, `Smoke`, `Drink`, `Diet`, `Religion`, `Education`, `Job`, `Industry_Interest`, `Languages`, `Headline`, `Summary`, `project_image`, `Date_Created`, `Date_Updated`, `ProjectStatus`, `Confirmed`) VALUES
(108, 62684, 'games', 32, 'sasdfasf', 'In Person', '14,15,16,17', 'Female', '52', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'High School,2-year college', 'NULL', '', '', '', '', '', '2016-06-13', '0000-00-00', '', 'N'),
(134, 76340, 'tech', 32, 'ttttt', 'In Person', '15', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '', '', 'Yo', 'asdfasdfa', '77218_Screen Shot 2016-03-18 at 11.09.45 AM.png', '2016-07-01', '0000-00-00', '', 'Y'),
(138, 28750, 'tech', 32, 'asdfasf', 'In Person', '15', 'Female', 'NULL', 'NULL', 'NULL', 'New York', 'NULL', 'NULL', 'NULL', 'Sinlge', 'Asian', 'Yes', 'Very Often', 'Vegetarian', 'Agnostic', 'High School', 'Technology', 'accounting,advertising', 'EN,DE', '', '', '', '2016-07-06', '0000-00-00', '', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_researcher_screening`
--

CREATE TABLE IF NOT EXISTS `tbl_researcher_screening` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `ProjectID` int(11) NOT NULL,
  `Answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(6) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `profile_image` varchar(200) DEFAULT NULL,
  `profile_image_small` varchar(200) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `password`, `email`, `profile_image`, `profile_image_small`) VALUES
(2, 'asdf', NULL, NULL, 'thumb_1461198254b3.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wepay`
--

CREATE TABLE IF NOT EXISTS `wepay` (
  `id` int(11) NOT NULL,
  `dasaf` varchar(255) NOT NULL,
  `asfda` varchar(255) NOT NULL,
  `asdfa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interests`
--
ALTER TABLE `interests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `participant_profile_images`
--
ALTER TABLE `participant_profile_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_participant`
--
ALTER TABLE `tbl_participant`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- Indexes for table `tbl_participant_interests`
--
ALTER TABLE `tbl_participant_interests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_project_request`
--
ALTER TABLE `tbl_project_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_researcher`
--
ALTER TABLE `tbl_researcher`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- Indexes for table `tbl_researcher_interests`
--
ALTER TABLE `tbl_researcher_interests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_researcher_potentialanswers`
--
ALTER TABLE `tbl_researcher_potentialanswers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_researcher_project`
--
ALTER TABLE `tbl_researcher_project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_researcher_screening`
--
ALTER TABLE `tbl_researcher_screening`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `wepay`
--
ALTER TABLE `wepay`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `interests`
--
ALTER TABLE `interests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `participant_profile_images`
--
ALTER TABLE `participant_profile_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=108;
--
-- AUTO_INCREMENT for table `tbl_participant`
--
ALTER TABLE `tbl_participant`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `tbl_participant_interests`
--
ALTER TABLE `tbl_participant_interests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `tbl_project_request`
--
ALTER TABLE `tbl_project_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `tbl_researcher`
--
ALTER TABLE `tbl_researcher`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `tbl_researcher_interests`
--
ALTER TABLE `tbl_researcher_interests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=98;
--
-- AUTO_INCREMENT for table `tbl_researcher_potentialanswers`
--
ALTER TABLE `tbl_researcher_potentialanswers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `tbl_researcher_project`
--
ALTER TABLE `tbl_researcher_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=139;
--
-- AUTO_INCREMENT for table `tbl_researcher_screening`
--
ALTER TABLE `tbl_researcher_screening`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `wepay`
--
ALTER TABLE `wepay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
