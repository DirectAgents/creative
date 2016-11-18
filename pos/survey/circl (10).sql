-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 25, 2016 at 03:01 AM
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
-- Table structure for table `c5t_comment`
--

CREATE TABLE IF NOT EXISTS `c5t_comment` (
  `id` int(11) NOT NULL,
  `researcher_id` int(11) NOT NULL,
  `comment_id` int(12) NOT NULL,
  `comment_identifier_id` int(12) NOT NULL,
  `comment_identifier` text,
  `comment_identifier_hash` varchar(32) DEFAULT NULL,
  `comment_author_name` text,
  `comment_author_email` text,
  `comment_author_homepage` text,
  `comment_author_ip` varchar(20) DEFAULT NULL,
  `comment_author_host` varchar(250) DEFAULT NULL,
  `comment_author_user_agent` text,
  `comment_title` text,
  `comment_text` text,
  `comment_timestamp` int(10) NOT NULL,
  `comment_status` int(3) NOT NULL DEFAULT '0',
  `comment_rating` int(12) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `c5t_identifier`
--

CREATE TABLE IF NOT EXISTS `c5t_identifier` (
  `id` int(11) NOT NULL,
  `identifier_id` int(12) NOT NULL,
  `identifier_value` text,
  `identifier_hash` varchar(32) DEFAULT NULL,
  `identifier_name` text,
  `identifier_url` text,
  `identifier_status` int(3) NOT NULL DEFAULT '0',
  `identifier_allow_comment` char(1) NOT NULL DEFAULT 'Y',
  `identifier_moderate_comment` char(1) NOT NULL DEFAULT 'N',
  `identifier_rating_value` int(12) NOT NULL DEFAULT '0',
  `identifier_rating_number` int(12) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `c5t_identifier`
--

INSERT INTO `c5t_identifier` (`id`, `identifier_id`, `identifier_value`, `identifier_hash`, `identifier_name`, `identifier_url`, `identifier_status`, `identifier_allow_comment`, `identifier_moderate_comment`, `identifier_rating_value`, `identifier_rating_number`) VALUES
(36, 6, '/survey/profile/participant/rating/?id=6', 'dc0c35a687534261b654d1933f645111', NULL, 'http://localhost/survey/profile/participant/rating/?id=6', 0, 'Y', 'N', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `c5t_setting`
--

CREATE TABLE IF NOT EXISTS `c5t_setting` (
  `id` int(11) NOT NULL,
  `setting_name` varchar(250) NOT NULL,
  `setting_value` text
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `c5t_setting`
--

INSERT INTO `c5t_setting` (`id`, `setting_name`, `setting_value`) VALUES
(1, 'administration_login', 'a:3:{s:5:"login";s:5:"admin";s:5:"email";s:17:"ald183s@gmail.com";s:8:"password";s:32:"202cb962ac59075b964b07152d234b70";}'),
(2, 'script_url', '/survey/snippets/comment/'),
(3, 'database_version', '2.1.2'),
(4, 'sequence_identifier', '36'),
(5, 'sequence_comment', '101'),
(6, 'installed_modules', 'a:7:{i:0;s:25:"gentlesource_module_dummy";i:1;s:25:"gentlesource_module_nl2br";i:2;s:36:"gentlesource_module_flood_protection";i:3;s:26:"gentlesource_module_smiley";i:4;s:25:"gentlesource_module_surbl";i:5;s:35:"gentlesource_module_content_replace";i:6;s:27:"gentlesource_module_captcha";}'),
(7, 'module_flood_protection_mode', 'off'),
(8, 'module_content_replace_active', 'Y'),
(9, 'module_content_replace_item_title-10000', 'test'),
(10, 'module_content_replace_item_content-10000', 'testing'),
(11, 'module_captcha_active', 'Y'),
(12, 'module_captcha_font_size', '20'),
(13, 'module_captcha_image_width', '150'),
(14, 'module_captcha_image_height', '60'),
(15, 'module_captcha_alternative', 'Y'),
(16, 'module_captcha_garbage_collector_active', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `google_users`
--

CREATE TABLE IF NOT EXISTS `google_users` (
  `google_id` decimal(21,0) NOT NULL,
  `google_name` varchar(60) NOT NULL,
  `google_email` varchar(60) NOT NULL,
  `google_link` varchar(60) NOT NULL,
  `google_picture_link` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `google_users`
--

INSERT INTO `google_users` (`google_id`, `google_name`, `google_email`, `google_link`, `google_picture_link`) VALUES
('109442174676931086073', 'Alper', 'ald183s@gmail.com', 'https://plus.google.com/109442174676931086073', 'https://lh6.googleusercontent.com/-WOs5SAUi9zY/AAAAAAAAAAI/AAAAAAAAAjE/DEbWwg-2wJI/photo.jpg');

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
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
-- Table structure for table `participant_rating`
--

CREATE TABLE IF NOT EXISTS `participant_rating` (
  `rating_id` int(11) NOT NULL,
  `researcher_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `rating_number` int(11) NOT NULL,
  `total_points` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = Block, 0 = Unblock'
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `participant_rating`
--

INSERT INTO `participant_rating` (`rating_id`, `researcher_id`, `post_id`, `rating_number`, `total_points`, `created`, `modified`, `status`) VALUES
(20, 32, 6, 1, 4, '2016-08-30 04:13:39', '2016-08-30 04:13:39', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_participant`
--

CREATE TABLE IF NOT EXISTS `tbl_participant` (
  `userID` int(11) NOT NULL,
  `google_id` decimal(21,0) NOT NULL,
  `google_givenName` varchar(60) NOT NULL,
  `google_familyName` varchar(60) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_participant`
--

INSERT INTO `tbl_participant` (`userID`, `google_id`, `google_givenName`, `google_familyName`, `google_link`, `google_picture_link`, `FirstName`, `LastName`, `userEmail`, `userPass`, `EmailNotifications`, `Meetupchoice`, `CountryCode`, `Phone`, `Age`, `Gender`, `Height`, `Status`, `Ethnicity`, `Smoke`, `Drink`, `Diet`, `Religion`, `Education`, `Job`, `Industry_Interest`, `Languages`, `Street`, `City`, `State`, `Zip`, `Country`, `Timezone`, `Bio`, `Date_Availability_Option1`, `From_Time_Option1`, `To_Time_Option1`, `Location_Option1`, `Date_Availability_Option2`, `From_Time_Option2`, `To_Time_Option2`, `Location_Option2`, `Date_Availability_Option3`, `From_Time_Option3`, `To_Time_Option3`, `Location_Option3`, `Monday_From`, `Monday_To`, `Tuesday_From`, `Tuesday_To`, `Wednesday_From`, `Wednesday_To`, `Thursday_From`, `Thursday_To`, `Friday_From`, `Friday_To`, `Saturday_From`, `Saturday_To`, `Sunday_From`, `Sunday_To`, `Monday_Location`, `Tuesday_Location`, `Wednesday_Location`, `Thursday_Location`, `Friday_Location`, `Saturday_Location`, `Sunday_Location`, `userStatus`, `tokenCode`, `profile_image`, `account_verified`, `account_id`, `owner_user_id`, `access_token`, `code`, `Date_Created`) VALUES
(2, '0', '', '', '', '', 'Franz', 'Peter', 'peter@yahoo.com', 'c4ca4238a0b923820dcc509a6f75849b', '', 'In Person', '1', '9172872872', '18', 'Male', '', 'Divorced', 'White', '', '', '', '', '', '', '', '', '', 'New York, New York', 'NY', '', '', 'Eastern Time (US & Canada)', 'I am the king', '0000-00-00', '', '', '', '0000-00-00', '0', '', '', '0000-00-00', '', '', '', '06:00pm', '08:00pm', '07:00am', '09:00pm', '11:00am ', '01:00pm', '11:15am ', '12:45pm', '', '', '', '', '', '', '745 5th Avenue, New York, NY, United States', '2315 Broadway, New York, NY, United States', '110 East 42nd Street, New York, NY, United States', '110 East 42nd Street, New York, NY, United States', '', '', '', 'Y', '35db263e7c9c68ab37cb9d83cca37df7', '', '', '', '', '', '', '0000-00-00'),
(3, '0', '', '', '', '', 'Hanelore', 'Peterson', 'hanne@yahoo.com', 'c4ca4238a0b923820dcc509a6f75849b', '', 'In Person', '1', '9172872872', '19', 'Male', '', 'Divorced', 'White', '', '', '', '', '', '', '', '', '', 'New York, New York', 'NY', '', '', '', 'Yo', '0000-00-00', '', '', '', '0000-00-00', '0', '', '', '0000-00-00', '', '', '', '5:30pm', '07:00pm', '', '', '', '', '', '', '', '', '', '', '', '', '745 5th Avenue, New York, NY, United States', '', '', '', '', '', '', 'Y', '35db263e7c9c68ab37cb9d83cca37df7', '', '', '', '', '', '', '0000-00-00'),
(4, '0', '', '', '', '', 'Mike', 'Peter', 'franz@yahoo.com', 'c4ca4238a0b923820dcc509a6f75849b', '', 'In Person', '', '', '15', 'Female', '55', '', 'Asian', '', '', '', '', '', '', '', '', '', 'New York, New York', 'NY', '', '', '', '', '0000-00-00', '', '', '', '0000-00-00', '0', '', '', '0000-00-00', '', '', '', '06:00pm', '09:00pm', '', '', '', '', '', '', '', '', '', '', '', '', '745 5th Avenue, New York, NY, United States', '', '', '', '', '', '', 'Y', '', '', '', '712591703', '225647674', 'STAGE_5029820579b8aa43cea05c37ed7d4bde8bc86d51613086e502807e52ca66ede2', '', '0000-00-00'),
(5, '0', '', '', '', '', 'ASDF', 'SADFSA', '', '', '', 'In Person', '', '', '18', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '0000-00-00', '0', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'N', '', '', '', '', '', '', '', '0000-00-00'),
(6, '0', '', '', '', '', 'Franco', 'Banco', 'ald183s@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'When you qualify for new projects', 'In Person', '', '9173737382', '15', 'Female', '50', 'Single', 'Asian', 'Trying to quit', 'Very Often', 'Vegetarian', 'Agnostic', 'University', 'Education', 'Arts and Entertainment,Business and Career,Communities and Lifestyles,Internet and Technology,Parenting and Family,Pets and Animals,Science,Social,Sports and Recreation', '', '1111', 'New York', 'AL', '1111', 'AD', '', '', '2016-09-28', '11:00am', '07:00pm', 'Starbucks, Astoria, Queens, NY, United States', '2016-09-28', '06:00am', '06:00pm', '212 Broadway, Brooklyn, NY, United States', '2016-09-25', '08:00pm', '10:00pm', '212 Broadway, Brooklyn, NY, United States', '', '', '11:00am', '05:00pm', '08:00am', '12:00pm', '12:00pm', '08:00pm', '09:00am', '05:00pm', '12:00pm', '05:00pm', '01:00pm', '05:00pm', '212 Broadway, Brooklyn, NY, United States', '431 Broome Street, New York, NY, United States', '32 Lexington Avenue, Passaic, NJ, United States', '232 Lexington Avenue, Malverne, NY, United States', '112 Lexington Ave, Jersey City, NJ, United States', '123 Lexington Avenue, Dumont, NJ, United States', '1225 Broadway, Brooklyn, NY, United States', 'Y', '959199756aeb2470fc73d9a8d5a61a66', '6_13522563_10153780777487992_30567582_n.jpg', '1', '248767831', '258160103', 'STAGE_02c2e023e9cedede9dd4ba4507b2d3ca9d2f65100b2bbdc503d86ed555456848', 'a3ecbf3b9cbc4f11b196d6362a644ef4d355207df8a6590a9d', '0000-00-00'),
(26, '0', '', '', '', '', 'flu', 'blue', 'asdfasdf@lakjdsf.com', 'b8150db267de096dd2573e6d91882778', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '0000-00-00', '0', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'N', '28b09f4ce821632955e35c6d6d12d261', '', '', '', '', '', '', '2016-07-19');

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
-- Table structure for table `tbl_participant_languages`
--

CREATE TABLE IF NOT EXISTS `tbl_participant_languages` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `Languages` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_participant_languages`
--

INSERT INTO `tbl_participant_languages` (`id`, `userID`, `Languages`) VALUES
(10, 6, 'German'),
(11, 6, 'Arabic');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_project_request`
--

CREATE TABLE IF NOT EXISTS `tbl_project_request` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `researcherID` int(11) NOT NULL,
  `ProjectID` int(11) NOT NULL,
  `Meetupchoice` varchar(255) NOT NULL,
  `Date_of_Meeting` date NOT NULL,
  `Day` varchar(255) NOT NULL,
  `From_Time` varchar(255) NOT NULL,
  `To_Time` varchar(255) NOT NULL,
  `Final_Time` varchar(255) NOT NULL,
  `Location` varchar(255) NOT NULL,
  `Accepted_to_Participate` varchar(255) NOT NULL,
  `Not_Qualified_Anymore` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `Requested_By` varchar(255) NOT NULL,
  `Met` varchar(255) NOT NULL,
  `Payment` varchar(255) NOT NULL,
  `Date_Posted` date NOT NULL,
  `Time_Posted` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_project_request`
--

INSERT INTO `tbl_project_request` (`id`, `userID`, `researcherID`, `ProjectID`, `Meetupchoice`, `Date_of_Meeting`, `Day`, `From_Time`, `To_Time`, `Final_Time`, `Location`, `Accepted_to_Participate`, `Not_Qualified_Anymore`, `Status`, `Requested_By`, `Met`, `Payment`, `Date_Posted`, `Time_Posted`) VALUES
(53, 6, 32111, 167741111, '', '2016-08-28', 'Monday', '', '', '06:00 PM', '32 George Street, Greenwich, New South Wales, Australia', 'Accepted', '', '', '', 'Yes', '', '2016-05-20', ''),
(55, 666, 321111, 167741111, '', '2016-08-23', 'Tuesday', '', '', '08:00 PM', '736 Madison Ave, Albany, NY, United States', 'Accepted', '', 'Cancelled_by_Researcher', '', 'Yes', '', '2016-05-25', ''),
(60, 3, 0, 0, '', '0000-00-00', 'Monday', '', '', '06:30 PM', '32 Walker Street, North Sydney, New South Wales, Australia', 'Accepted', '', 'Cancelled_by_Researcher', '', '', '', '2016-06-15', '05:36:23 PM'),
(61, 5, 0, 28750, '', '0000-00-00', 'Monday', '', '', '06:00 PM', '136 Pitt Street, Sydney, New South Wales, Australia', 'Accepted', '', '', '', '', '', '2016-06-20', '11:26:47 AM'),
(63, 4, 0, 76340, '', '0000-00-00', 'Wednesday', '', '', '12:00 PM', '426 Oxford Street, Bondi Junction, New South Wales, Australia', 'Accepted', '', '', '', '', '', '2016-06-20', '11:47:03 AM'),
(66, 4, 0, 28750, '', '0000-00-00', 'Monday', '', '', '06:00 PM', '320 Oxford Street, Bondi Junction, New South Wales, Australia', 'Accepted', 'Not Qualified Anymore', '', 'Researcher', '', '', '2016-07-13', '12:42:54 PM'),
(68, 666, 0, 28750, '', '0000-00-00', 'Monday', '', '', '06:00 AM', '54 Pitt Street, Sydney, New South Wales, Australia', 'Accepted', '', '', 'Researcher', '', '', '2016-07-14', '11:06:03 PM'),
(69, 6, 32, 16774, '', '2016-10-02', 'Monday', '12:00pm', '1:30pm', '2:00pm', 'Starbucks, Astor Place, New York, NY, United States', 'Accepted', '', 'Meeting Set', 'Participant', 'Yes', '', '2016-09-09', '03:49:54 PM'),
(104, 6, 32, 76340, '', '2016-09-28', '', '11:00am', '07:00pm', '6:00 PM', '312 Lexington Avenue, New York, NY, United States', 'Pending', '', 'Canceled_by_Participant', 'Participant', '', '', '2016-09-25', '02:29:16 PM'),
(107, 6, 32, 28750, '', '2016-10-11', '', '11:00am', '07:00pm', '02:00pm', '312 Lexington Avenue, New York, NY, United States', 'Accepted', '', 'Meeting Set', 'Participant', 'Yes', '', '2016-10-10', '11:54:00 AM'),
(108, 6, 32, 2585, '', '2016-09-25', '', '08:00pm', '10:00pm', '', '212 Broadway, Brooklyn, NY, United States', 'Pending', '', 'Waiting for Researcher to Accept or Decline', 'Participant', '', '', '2016-10-10', '01:55:02 PM'),
(109, 6, 32, 69196, '', '2016-09-28', '', '11:00am', '07:00pm', '', 'Starbucks, Astoria, Queens, NY, United States', 'Pending', '', 'Waiting for Researcher to Accept or Decline', 'Participant', '', '', '2016-10-17', '05:27:42 PM');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_researcher`
--

CREATE TABLE IF NOT EXISTS `tbl_researcher` (
  `userID` int(11) NOT NULL,
  `google_id` decimal(21,0) NOT NULL,
  `google_givenName` varchar(60) NOT NULL,
  `google_familyName` varchar(60) NOT NULL,
  `google_link` varchar(60) NOT NULL,
  `google_picture_link` varchar(200) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `Age` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL,
  `State` varchar(255) NOT NULL,
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
  `billing_address_one` varchar(255) NOT NULL,
  `billing_address_two` varchar(255) NOT NULL,
  `billing_city` varchar(255) NOT NULL,
  `billing_state` varchar(255) NOT NULL,
  `billing_zip` varchar(255) NOT NULL,
  `billing_country` varchar(255) NOT NULL,
  `credit_card_id` varchar(255) NOT NULL,
  `cc_last_four` varchar(255) NOT NULL,
  `cc_name` varchar(255) NOT NULL,
  `Date_Created` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_researcher`
--

INSERT INTO `tbl_researcher` (`userID`, `google_id`, `google_givenName`, `google_familyName`, `google_link`, `google_picture_link`, `FirstName`, `LastName`, `userEmail`, `Phone`, `Age`, `City`, `State`, `Timezone`, `Bio`, `Linkedin`, `Twitter`, `Facebook`, `EmailNotifications`, `profile_image`, `userPass`, `userStatus`, `tokenCode`, `billing_address_one`, `billing_address_two`, `billing_city`, `billing_state`, `billing_zip`, `billing_country`, `credit_card_id`, `cc_last_four`, `cc_name`, `Date_Created`) VALUES
(31, '0', '', '', '', '', 'Franz', 'Bauer', 'ald183s@gmail.com11111', '', '', '', '', '', '', '', '', '', '', '', '202cb962ac59075b964b07152d234b70', 'Y', 'ac630a9a4960ecb3a71ceee10939219c', '', '', '', '', '', '', '', '', '', '0000-00-00'),
(32, '0', '', '', '', '', 'Mona', 'Bubby', 'ald183s@gmail.com', '123', '30', 'New York', 'NY', 'Eastern Time (US & Canada)', 'I am like this...', 'adasdfs', 'wwww', 'dfffffff', 'New participant requests to participate', 'thumb_146751013008_10153819353100062_7688309_n.jpg', '202cb962ac59075b964b07152d234b70', 'Y', 'ad050eb4c27811a06895ead0bbd433f4', 'dddd', '3Lfdsfasdfsad', 'New York11111', 'NY', '11103', 'US', '3805118309', '4018', 'Visa xxxxxx4018', '0000-00-00'),
(35, '0', '', '', '', '', 'Lola', 'Bola', 'lola@test.com', '', '', '', '', '', '', '', '', '', '', '', 'b8150db267de096dd2573e6d91882778', 'N', '605d5acf2edaca205c15407ba6bfaac7', '', '', '', '', '', '', '', '', '', '2016-07-19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_researcher_interests`
--

CREATE TABLE IF NOT EXISTS `tbl_researcher_interests` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `ProjectID` int(11) NOT NULL,
  `Interests` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_researcher_interests`
--

INSERT INTO `tbl_researcher_interests` (`id`, `userID`, `ProjectID`, `Interests`) VALUES
(88, 32, 62684, 'ActionScript'),
(94, 32, 62684, 'a'),
(95, 32, 62684, 'a'),
(96, 32, 62684, 'a'),
(97, 32, 62684, 'Web Design'),
(103, 32, 0, 'a'),
(105, 0, 0, 'Business Strategy'),
(106, 0, 0, 'a'),
(107, 0, 0, 'Social Media');

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
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;

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
(51, 32, 28750, 'NULL', ' ', ' ', ' ', '', '', ''),
(52, 32, 18785, 'NULL', ' ', ' ', ' ', '', '', ''),
(53, 32, 75590, 'NULL', ' ', ' ', ' ', '', '', ''),
(54, 32, 3771, 'NULL', ' ', ' ', ' ', '', '', ''),
(55, 32, 49896, 'NULL', ' ', ' ', ' ', '', '', ''),
(56, 32, 88576, 'NULL', ' ', ' ', ' ', '', '', ''),
(57, 32, 58572, 'NULL', ' ', ' ', ' ', '', '', ''),
(58, 32, 53100, 'NULL', ' ', ' ', ' ', '', '', ''),
(59, 32, 37365, 'NULL', ' ', ' ', ' ', '', '', ''),
(60, 32, 36966, 'NULL', ' ', ' ', ' ', '', '', ''),
(61, 32, 16774, 'NULL', '                 ', '                 ', '                 ', '', '', 'NULL'),
(62, 32, 71492, 'NULL', ' ', ' ', ' ', '', '', ''),
(63, 32, 20643, 'NULL', ' ', ' ', ' ', '', '', ''),
(64, 32, 31154, 'NULL', ' ', ' ', ' ', '', '', ''),
(65, 32, 98365, 'NULL', ' ', ' ', ' ', '', '', ''),
(66, 32, 79078, 'NULL', ' ', ' ', ' ', '', '', ''),
(67, 32, 87848, 'NULL', ' ', ' ', ' ', '', '', ''),
(68, 32, 65743, 'NULL', ' ', ' ', ' ', '', '', ''),
(69, 32, 66751, 'NULL', ' ', ' ', ' ', '', '', ''),
(70, 32, 47435, 'NULL', ' ', ' ', ' ', '', '', ''),
(71, 32, 75434, 'NULL', 'NULL', 'NULL', 'NULL', '', '', ''),
(72, 32, 31862, 'NULL', ' ', ' ', ' ', '', '', ''),
(73, 32, 22050, 'NULL', ' ', ' ', ' ', '', '', ''),
(74, 32, 14882, 'NULL', ' ', ' ', ' ', '', '', ''),
(75, 32, 96437, 'NULL', ' ', ' ', ' ', '', '', ''),
(76, 32, 29722, 'NULL', ' ', ' ', ' ', '', '', ''),
(77, 32, 21369, 'NULL', ' ', ' ', ' ', '', '', ''),
(78, 32, 7783, 'NULL', 'NULL                   ', 'NULL                   ', 'NULL                   ', '', '', 'NULL'),
(79, 32, 17363, 'NULL', 'NULL                    ', 'NULL                    ', 'NULL                    ', '', '', ''),
(80, 32, 63593, 'NULL', 'NULL                     ', 'NULL                     ', 'NULL                     ', '', '', ''),
(81, 32, 17909, 'NULL', 'NULL                      ', 'NULL                      ', 'NULL                      ', '', '', ''),
(82, 32, 47211, 'NULL', 'NULL                       ', 'NULL                       ', 'NULL                       ', '', '', ''),
(83, 32, 1866, 'NULL', 'NULL                        ', 'NULL                        ', 'NULL                        ', '', '', ''),
(84, 32, 79437, 'NULL', 'NULL                         ', 'NULL                         ', 'NULL                         ', '', '', ''),
(85, 32, 20412, 'NULL', 'NULL                          ', 'NULL                          ', 'NULL                          ', '', '', ''),
(86, 32, 36661, 'NULL', 'NULL                           ', 'NULL                           ', 'NULL                           ', '', '', ''),
(87, 32, 49727, 'NULL', 'NULL                            ', 'NULL                            ', 'NULL                            ', '', '', ''),
(88, 32, 67977, 'NULL', 'NULL                             ', 'NULL                             ', 'NULL                             ', '', '', ''),
(89, 32, 50021, 'NULL', 'NULL                              ', 'NULL                              ', 'NULL                              ', '', '', ''),
(90, 32, 13588, 'NULL', 'NULL                               ', 'NULL                               ', 'NULL                               ', '', '', ''),
(91, 32, 6742, 'NULL', 'NULL                                ', 'NULL                                ', 'NULL                                ', '', '', ''),
(92, 32, 62781, 'NULL', 'NULL                                 ', 'NULL                                 ', 'NULL                                 ', '', '', ''),
(93, 32, 55369, 'NULL', 'NULL                                  ', 'NULL                                  ', 'NULL                                  ', '', '', ''),
(94, 32, 1406, 'NULL', 'NULL                                   ', 'NULL                                   ', 'NULL                                   ', '', '', 'NULL'),
(95, 32, 9677, 'NULL', 'NULL                                    ', 'NULL                                    ', 'NULL                                    ', '', '', ''),
(96, 32, 26156, 'NULL', 'NULL                                     ', 'NULL                                     ', 'NULL                                     ', '', '', ''),
(97, 32, 25614, 'NULL', 'NULL                                      ', 'NULL                                      ', 'NULL                                      ', '', '', ''),
(98, 32, 59679, 'NULL', 'NULL                                       ', 'NULL                                       ', 'NULL                                       ', '', '', ''),
(99, 32, 2585, 'NULL', 'NULL                                               ', 'NULL                                               ', 'NULL                                               ', '', '', 'NULL'),
(100, 32, 69196, 'NULL', '                 ', '                 ', '                 ', '', '', 'NULL');

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
  `Pay` varchar(255) NOT NULL,
  `Minutes` varchar(255) NOT NULL,
  `MinReq` longtext NOT NULL,
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
  `Stage` varchar(255) NOT NULL,
  `Headline` varchar(255) NOT NULL,
  `Summary` longtext NOT NULL,
  `Agenda_One` varchar(255) NOT NULL,
  `Agenda_Two` varchar(255) NOT NULL,
  `Agenda_Three` varchar(255) NOT NULL,
  `project_image` varchar(255) NOT NULL,
  `Date_Created` date NOT NULL,
  `Date_Updated` date NOT NULL,
  `ProjectStatus` varchar(25) NOT NULL,
  `Confirmed` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB AUTO_INCREMENT=188 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_researcher_project`
--

INSERT INTO `tbl_researcher_project` (`id`, `ProjectID`, `Category`, `researcherID`, `Name`, `Pay`, `Minutes`, `MinReq`, `Meetupchoice`, `Age`, `Gender`, `MinHeight`, `MaxHeight`, `Street`, `City`, `State`, `Zip`, `Country`, `Status`, `Ethnicity`, `Smoke`, `Drink`, `Diet`, `Religion`, `Education`, `Job`, `Industry_Interest`, `Languages`, `Stage`, `Headline`, `Summary`, `Agenda_One`, `Agenda_Two`, `Agenda_Three`, `project_image`, `Date_Created`, `Date_Updated`, `ProjectStatus`, `Confirmed`) VALUES
(134, 76340, 'technology', 32, 'Project 1', '', '', 'Age', 'In Person', '1511', 'Female', '50', '60', 'NULL', 'New York', 'NULL', 'NULL', 'NULL', 'Single', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '', '', '', 'Yo', 'asdfasdfa', '', '', '', '77218_Screen_Shot_2016-03-18_at_11.09.45_AM.png', '2016-07-01', '0000-00-00', 'Public', 'Y'),
(138, 28750, 'technology', 32, 'Project 2', '5.00', '10', 'Age', 'In Person', '15', 'Female', '50', '60', 'NULL', 'New York', 'NULL', 'NULL', 'NULL', 'Single', 'Asian', 'Yes', 'Very Often', 'Vegetarian', 'Agnostic', 'High School', 'Technology', 'accounting,advertising', 'EN,DE', '', 'Yo', 'asdfasdfasdfasdf', '', '', '', '', '2016-07-06', '0000-00-00', 'Public', 'N'),
(152, 16774, 'games', 32, 'Project 3', '', '', 'Age', 'In Person', '15', 'Male', '50', '60', 'NULL', 'New York', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'Education', '', '', '', 'Yo man', 'aha', 'We will discuss this...', '', '', '', '2016-06-13', '0000-00-00', 'Private', 'N'),
(184, 2585, 'accounting', 32, 'Project 4', '', '', 'Status', '', '15', 'Female', 'NULL', 'NULL', '', 'fasdfasdf', '', '', '', 'aasdfasdf', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '', '', '', 'the headline', 'aha', '', '', '', '', '2016-10-05', '0000-00-00', 'Public', 'N'),
(187, 69196, 'employment', 32, 'Project 5', '18.00', '45', 'Age,Gender,Height', '', '14,15,16,17', 'Female', '50', 'NULL', '', '', '', '', '', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '', '', 'Prototype', 'yo was ', 'was geht1111', 'adsfasdfasdf', '', '', '', '2016-10-17', '2016-10-19', 'Private', 'Y');

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
-- Table structure for table `time`
--

CREATE TABLE IF NOT EXISTS `time` (
  `id` int(11) NOT NULL,
  `TheTime` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time`
--

INSERT INTO `time` (`id`, `TheTime`) VALUES
(1, '12:00am'),
(2, '12:30am'),
(3, '01:00am'),
(4, '01:30am'),
(5, '02:00am'),
(6, '02:30am'),
(7, '03:00am'),
(8, '03:30am'),
(9, '04:00am'),
(10, '04:30am'),
(11, '05:00am'),
(12, '05:30am'),
(13, '06:00am'),
(14, '06:30am'),
(15, '07:00am'),
(16, '07:30am'),
(17, '08:00am'),
(18, '08:30am'),
(19, '09:00am'),
(20, '09:30am'),
(21, '10:00am'),
(22, '10:30am'),
(23, '11:00am'),
(24, '11:30am'),
(25, '12:00pm'),
(26, '12:30pm'),
(27, '01:00pm'),
(28, '01:30pm'),
(29, '02:00pm'),
(30, '02:30pm'),
(31, '03:00pm'),
(32, '03:30pm'),
(33, '04:00pm'),
(34, '04:30pm'),
(35, '05:00pm'),
(36, '05:30pm'),
(37, '06:00pm'),
(38, '06:30pm'),
(39, '07:00pm'),
(40, '07:30pm'),
(41, '08:00pm'),
(42, '08:30pm'),
(43, '09:00pm'),
(44, '09:30pm'),
(45, '10:00pm'),
(46, '10:30pm'),
(47, '11:00pm'),
(48, '11:30pm');

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
  `researcher_id` varchar(255) NOT NULL,
  `participant_id` varchar(255) NOT NULL,
  `order_by` varchar(255) NOT NULL,
  `account_id` varchar(255) NOT NULL,
  `checkout_id` varchar(255) NOT NULL,
  `checkout_find_date` varchar(255) NOT NULL,
  `checkout_find_amount` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wepay`
--

INSERT INTO `wepay` (`id`, `researcher_id`, `participant_id`, `order_by`, `account_id`, `checkout_id`, `checkout_find_date`, `checkout_find_amount`) VALUES
(2, '32', '6', '8', '1490191444', '183068358', 'August 2016', '14.95'),
(3, '32', '6', '7', '1490191444', '1299143166', 'July 2016', '24.95'),
(4, '32', '', '8', '1490191444', '1866252430', 'August 2016', '12.95'),
(5, '32', '', '7', '1490191444', '2059755413', 'July 2016', '33.95'),
(6, '32', '', '6', '1490191444', '1694458848', 'June 2016', '24.95'),
(7, '32', '', '8', '1490191444', '156043897', 'August 2016', '24.95'),
(8, '32', '', '8', '1490191444', '2122404319', 'August 2016', '24.95'),
(9, '32', '', '8', '1490191444', '516179214', 'August 2016', '24.95'),
(10, '32', '', '1', '1490191444', '', 'January 1970', '24.95'),
(11, '32', '', '8', '1490191444', '1662134707', 'August 2016', '24.95'),
(12, '32', '', '8', '1490191444', '1636351447', 'August 2016', '24.95'),
(13, '32', '', '8', '1490191444', '1826718173', 'August 2016', '24.95'),
(14, '32', '', '8', '1490191444', '1552642749', 'August 2016', '24.95'),
(15, '32', '', '8', '1490191444', '970355956', 'August 2016', '21.95'),
(16, '32', '', '8', '1490191444', '1726354022', 'August 2016', '4.95');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `c5t_comment`
--
ALTER TABLE `c5t_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_id` (`comment_id`),
  ADD KEY `comment_identifier_id` (`comment_identifier_id`);

--
-- Indexes for table `c5t_identifier`
--
ALTER TABLE `c5t_identifier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `identifier_id` (`identifier_id`),
  ADD KEY `identifier_hash` (`identifier_hash`);

--
-- Indexes for table `c5t_setting`
--
ALTER TABLE `c5t_setting`
  ADD PRIMARY KEY (`id`),
  ADD KEY `setting_name` (`setting_name`);

--
-- Indexes for table `google_users`
--
ALTER TABLE `google_users`
  ADD PRIMARY KEY (`google_id`);

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
-- Indexes for table `participant_rating`
--
ALTER TABLE `participant_rating`
  ADD PRIMARY KEY (`rating_id`);

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
-- Indexes for table `tbl_participant_languages`
--
ALTER TABLE `tbl_participant_languages`
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
-- Indexes for table `time`
--
ALTER TABLE `time`
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
-- AUTO_INCREMENT for table `c5t_comment`
--
ALTER TABLE `c5t_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `c5t_identifier`
--
ALTER TABLE `c5t_identifier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `c5t_setting`
--
ALTER TABLE `c5t_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `participant_profile_images`
--
ALTER TABLE `participant_profile_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=108;
--
-- AUTO_INCREMENT for table `participant_rating`
--
ALTER TABLE `participant_rating`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
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
-- AUTO_INCREMENT for table `tbl_participant_languages`
--
ALTER TABLE `tbl_participant_languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_project_request`
--
ALTER TABLE `tbl_project_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=110;
--
-- AUTO_INCREMENT for table `tbl_researcher`
--
ALTER TABLE `tbl_researcher`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `tbl_researcher_interests`
--
ALTER TABLE `tbl_researcher_interests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=108;
--
-- AUTO_INCREMENT for table `tbl_researcher_potentialanswers`
--
ALTER TABLE `tbl_researcher_potentialanswers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `tbl_researcher_project`
--
ALTER TABLE `tbl_researcher_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=188;
--
-- AUTO_INCREMENT for table `tbl_researcher_screening`
--
ALTER TABLE `tbl_researcher_screening`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `time`
--
ALTER TABLE `time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `wepay`
--
ALTER TABLE `wepay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
