-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 02, 2016 at 04:16 AM
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
  `google_picture_link` varchar(255) NOT NULL,
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
  `bank_account` varchar(255) NOT NULL,
  `Date_Created` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_participant`
--

INSERT INTO `tbl_participant` (`userID`, `google_id`, `google_picture_link`, `FirstName`, `LastName`, `userEmail`, `userPass`, `EmailNotifications`, `Meetupchoice`, `CountryCode`, `Phone`, `Age`, `Gender`, `Height`, `Status`, `Ethnicity`, `Smoke`, `Drink`, `Diet`, `Religion`, `Education`, `Job`, `Industry_Interest`, `Languages`, `Street`, `City`, `State`, `Zip`, `Country`, `Timezone`, `Bio`, `Date_Availability_Option1`, `From_Time_Option1`, `To_Time_Option1`, `Location_Option1`, `Date_Availability_Option2`, `From_Time_Option2`, `To_Time_Option2`, `Location_Option2`, `Date_Availability_Option3`, `From_Time_Option3`, `To_Time_Option3`, `Location_Option3`, `Monday_From`, `Monday_To`, `Tuesday_From`, `Tuesday_To`, `Wednesday_From`, `Wednesday_To`, `Thursday_From`, `Thursday_To`, `Friday_From`, `Friday_To`, `Saturday_From`, `Saturday_To`, `Sunday_From`, `Sunday_To`, `Monday_Location`, `Tuesday_Location`, `Wednesday_Location`, `Thursday_Location`, `Friday_Location`, `Saturday_Location`, `Sunday_Location`, `userStatus`, `tokenCode`, `profile_image`, `account_verified`, `account_id`, `owner_user_id`, `access_token`, `code`, `bank_account`, `Date_Created`) VALUES
(2, '0', '', 'Franz', 'Peter', 'peter@yahoo.com', 'c4ca4238a0b923820dcc509a6f75849b', '', 'In Person', '1', '9172872872', '18', 'Male', '', 'Divorced', 'White', '', '', '', '', '', '', '', '', '', 'New York, New York', 'NY', '', '', 'Eastern Time (US & Canada)', 'I am the king', '0000-00-00', '', '', '', '0000-00-00', '0', '', '', '0000-00-00', '', '', '', '06:00pm', '08:00pm', '07:00am', '09:00pm', '11:00am ', '01:00pm', '11:15am ', '12:45pm', '', '', '', '', '', '', '745 5th Avenue, New York, NY, United States', '2315 Broadway, New York, NY, United States', '110 East 42nd Street, New York, NY, United States', '110 East 42nd Street, New York, NY, United States', '', '', '', 'Y', '35db263e7c9c68ab37cb9d83cca37df7', '', '', '', '', '', '', '', '0000-00-00'),
(3, '0', '', 'Hanelore', 'Peterson', 'hanne@yahoo.com', 'c4ca4238a0b923820dcc509a6f75849b', '', 'In Person', '1', '9172872872', '19', 'Male', '', 'Divorced', 'White', '', '', '', '', '', '', '', '', '', 'New York, New York', 'NY', '', '', '', 'Yo', '0000-00-00', '', '', '', '0000-00-00', '0', '', '', '0000-00-00', '', '', '', '5:30pm', '07:00pm', '', '', '', '', '', '', '', '', '', '', '', '', '745 5th Avenue, New York, NY, United States', '', '', '', '', '', '', 'Y', '35db263e7c9c68ab37cb9d83cca37df7', '', '', '', '', '', '', '', '0000-00-00'),
(4, '0', '', 'Mike', 'Peter', 'franz@yahoo.com', 'c4ca4238a0b923820dcc509a6f75849b', '', 'In Person', '', '', '15', 'Female', '50', '', 'Asian', '', '', '', '', '', '', '', '', '', 'New York, New York', 'NY', '', '', '', '', '0000-00-00', '', '', '', '0000-00-00', '0', '', '', '0000-00-00', '', '', '', '06:00pm', '09:00pm', '', '', '', '', '', '', '', '', '', '', '', '', '745 5th Avenue, New York, NY, United States', '', '', '', '', '', '', 'Y', '', '', '', '712591703', '225647674', 'STAGE_5029820579b8aa43cea05c37ed7d4bde8bc86d51613086e502807e52ca66ede2', '', '', '0000-00-00'),
(5, '0', '', 'ASDF', 'SADFSA', '', '', '', 'In Person', '', '', '15', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '0000-00-00', '0', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'N', '', '', '', '', '', '', '', '', '0000-00-00'),
(6, '109442174676931086073', 'https://lh6.googleusercontent.com/-WOs5SAUi9zY/AAAAAAAAAAI/AAAAAAAAAjE/DEbWwg-2wJI/photo.jpg', 'Alper', 'D', 'ald183s@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'When you qualify for new projects', 'In Person', '', '9173737382', '15', 'Male', '50', 'Single', 'Asian', 'Trying to quit', 'Very Often', 'Vegetarian', 'Agnostic', 'University', 'Education', 'Arts and Entertainment,Business and Career,Communities and Lifestyles,Internet and Technology,Parenting and Family,Pets and Animals,Science,Social,Sports and Recreation', '', '1111', 'New York', 'AL', '1111', 'AD', '', '', '2016-09-28', '11:00am', '07:00pm', 'Starbucks, Astoria, Queens, NY, United States', '2016-09-28', '06:00am', '06:00pm', '212 Broadway, Brooklyn, NY, United States', '2016-09-25', '08:00pm', '10:00pm', '212 Broadway, Brooklyn, NY, United States', '', '', '11:00am', '05:00pm', '08:00am', '12:00pm', '12:00pm', '08:00pm', '09:00am', '05:00pm', '12:00pm', '05:00pm', '01:00pm', '05:00pm', '212 Broadway, Brooklyn, NY, United States', '431 Broome Street, New York, NY, United States', '32 Lexington Avenue, Passaic, NJ, United States', '232 Lexington Avenue, Malverne, NY, United States', '112 Lexington Ave, Jersey City, NJ, United States', '123 Lexington Avenue, Dumont, NJ, United States', '1225 Broadway, Brooklyn, NY, United States', 'Y', 'be873b2d3acb1125274ca7d737420962', 'thumb_1477588199b3.jpg', '1', '1489540520', '189754692', 'STAGE_dd8cb573ddb535adff60053c82d2371997e30b72b6e4e4d65e450c2453b2377e', '2626d70c001c863721621d881d6396c850674ccae8c11c2d1f', '', '0000-00-00'),
(26, '0', '', 'flu', 'blue', 'asdfasdf@lakjdsf.com', 'b8150db267de096dd2573e6d91882778', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '0000-00-00', '0', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'N', '28b09f4ce821632955e35c6d6d12d261', '', '', '', '', '', '', '', '2016-07-19');

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
(63, 4, 0, 76340, '', '0000-00-00', 'Wednesday', '', '', '12:00 PM', '426 Oxford Street, Bondi Junction, New South Wales, Australia', 'Accepted', '', '', '', '', '', '2016-06-20', '11:47:03 AM'),
(66, 4, 0, 28750, '', '0000-00-00', 'Monday', '', '', '06:00 PM', '320 Oxford Street, Bondi Junction, New South Wales, Australia', 'Accepted', 'Not Qualified Anymore', '', 'Researcher', '', '', '2016-07-13', '12:42:54 PM'),
(108, 6, 32, 2585, '', '2016-09-25', '', '08:00pm', '10:00pm', '', '212 Broadway, Brooklyn, NY, United States', 'Pending', '', 'Waiting for Researcher to Accept or Decline', 'Participant', '', '', '2016-10-10', '01:55:02 PM'),
(109, 6, 32, 69196, '', '2016-09-28', '', '11:00am', '07:00pm', '', 'Starbucks, Astoria, Queens, NY, United States', 'Pending', '', 'Waiting for Researcher to Accept or Decline', 'Participant', '', '', '2016-10-17', '05:27:42 PM');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_researcher`
--

CREATE TABLE IF NOT EXISTS `tbl_researcher` (
  `userID` int(11) NOT NULL,
  `google_id` decimal(21,0) NOT NULL,
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
  `account_id` varchar(255) NOT NULL,
  `owner_user_id` varchar(255) NOT NULL,
  `access_token` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
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

INSERT INTO `tbl_researcher` (`userID`, `google_id`, `google_picture_link`, `FirstName`, `LastName`, `userEmail`, `Phone`, `Age`, `City`, `State`, `Timezone`, `Bio`, `Linkedin`, `Twitter`, `Facebook`, `EmailNotifications`, `profile_image`, `userPass`, `userStatus`, `tokenCode`, `account_id`, `owner_user_id`, `access_token`, `code`, `billing_address_one`, `billing_address_two`, `billing_city`, `billing_state`, `billing_zip`, `billing_country`, `credit_card_id`, `cc_last_four`, `cc_name`, `Date_Created`) VALUES
(31, '0', '', 'Franz', 'Bauer', 'ald183s@gmail.com11111', '', '', '', '', '', '', '', '', '', '', '', '202cb962ac59075b964b07152d234b70', 'Y', 'ac630a9a4960ecb3a71ceee10939219c', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00'),
(32, '0', 'https://lh6.googleusercontent.com/-WOs5SAUi9zY/AAAAAAAAAAI/AAAAAAAAAjE/DEbWwg-2wJI/photo.jpg', 'Mona', 'Bubby', 'ald183s@gmail.com', '123', '30', 'New York', 'NY', 'Eastern Time (US & Canada)', 'I am like this...', 'adasdfs', 'wwww', 'dfffffff', 'New participant requests to participate', 'thumb_146751013008_10153819353100062_7688309_n.jpg', '202cb962ac59075b964b07152d234b70', 'Y', 'ad050eb4c27811a06895ead0bbd433f4', '2029343259', '226769035', 'STAGE_91bfe9c282bc983de99ceac208123835a611cc3c458a3b1c096ce7177a2da362', '5d7dcc495a7d24ce70a55f078ebe2dc6c961aa7d8bab612e61', '123 Street', '', 'New York', 'NC', '10001', 'US', '3587726207', '4018', 'Visa xxxxxx4018', '0000-00-00'),
(35, '0', '', 'Lola', 'Bola', 'lola@test.com', '', '', '', '', '', '', '', '', '', '', '', 'b8150db267de096dd2573e6d91882778', 'N', '605d5acf2edaca205c15407ba6bfaac7', '', '', '', '', '', '', '', '', '', '', '', '', '', '2016-07-19');

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
  `Accepted` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_researcher_potentialanswers`
--

INSERT INTO `tbl_researcher_potentialanswers` (`id`, `userID`, `ProjectID`, `Screening`, `PotentialAnswer1`, `PotentialAnswer2`, `PotentialAnswer3`, `Accepted`) VALUES
(102, 32, 93126, 'adsfasdf', 'test', 'test2', 'test3', 'Potential Answer 3');

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
) ENGINE=InnoDB AUTO_INCREMENT=192 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_researcher_project`
--

INSERT INTO `tbl_researcher_project` (`id`, `ProjectID`, `Category`, `researcherID`, `Name`, `Pay`, `Minutes`, `MinReq`, `Meetupchoice`, `Age`, `Gender`, `MinHeight`, `MaxHeight`, `Street`, `City`, `State`, `Zip`, `Country`, `Status`, `Ethnicity`, `Smoke`, `Drink`, `Diet`, `Religion`, `Education`, `Job`, `Industry_Interest`, `Languages`, `Stage`, `Headline`, `Summary`, `Agenda_One`, `Agenda_Two`, `Agenda_Three`, `project_image`, `Date_Created`, `Date_Updated`, `ProjectStatus`, `Confirmed`) VALUES
(134, 76340, 'technology', 32, 'Project 1', '', '', 'Age', 'In Person', '1511', 'Female', '50', '60', 'NULL', 'New York', 'NULL', 'NULL', 'NULL', 'Single', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '', '', '', 'Yo', 'asdfasdfa', '', '', '', '77218_Screen_Shot_2016-03-18_at_11.09.45_AM.png', '2016-07-01', '0000-00-00', 'Public', 'Y'),
(138, 28750, 'technology', 32, 'Project 2', '5.00', '10', 'Age', 'In Person', '15', 'Female', '50', '60', 'NULL', 'New York', 'NULL', 'NULL', 'NULL', 'Single', 'Asian', 'Yes', 'Very Often', 'Vegetarian', 'Agnostic', 'High School', 'Technology', 'accounting,advertising', 'EN,DE', '', 'Yo', 'asdfasdfasdfasdf', '', '', '', '', '2016-07-06', '0000-00-00', 'Public', 'N'),
(152, 16774, 'games', 32, 'Project 3', '', '', 'Age', 'In Person', '15', 'Male', '50', '60', 'NULL', 'New York', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'Education', '', '', '', 'Yo man', 'aha', 'We will discuss this...', '', '', '', '2016-06-13', '0000-00-00', 'Private', 'N'),
(184, 2585, 'accounting', 32, 'Project 4', '1.00', '20', 'Status', '', '15', 'Female', 'NULL', 'NULL', '', 'fasdfasdf', '', '', '', 'aasdfasdf', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '', '', '', 'the headline', 'aha', '', '', '', '', '2016-10-05', '0000-00-00', 'Public', 'N'),
(187, 69196, 'employment', 32, 'Project 5', '18.00', '45', 'Age,Gender,Height', '', '14,15,16,17', 'Female', '50', 'NULL', '', '', '', '', '', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '', '', 'Prototype', 'yo was ', 'was geht1111', 'adsfasdfasdf', '', '', '', '2016-10-17', '2016-10-19', 'Private', 'Y'),
(191, 93126, 'web-mobile-solutions', 32, 'adsfasdf', '1.00', '5', 'Age,Gender', '', '14,15,16,17,18,19,20,21,22,23,24', 'Male', 'NULL', 'NULL', '', '', '', '', '', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '', '', 'Already launched', 'yo', '', '', '', '', '', '2016-10-28', '2016-10-28', 'Private', 'Y');

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
  `ProjectID` varchar(255) NOT NULL,
  `researcher_id` varchar(255) NOT NULL,
  `participant_id` varchar(255) NOT NULL,
  `order_by` varchar(255) NOT NULL,
  `account_id` varchar(255) NOT NULL,
  `checkout_id` varchar(255) NOT NULL,
  `checkout_find_date` varchar(255) NOT NULL,
  `checkout_find_amount` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wepay`
--

INSERT INTO `wepay` (`id`, `ProjectID`, `researcher_id`, `participant_id`, `order_by`, `account_id`, `checkout_id`, `checkout_find_date`, `checkout_find_amount`) VALUES
(16, '', '32', '6', '8', '148954052011', '263874997', 'August 2016', '4.95'),
(17, '', '32', '6', '', '1489540520', '782543778', 'October 2016', '240'),
(18, '', '32', '6', '10', '1489540520', '1926029951', 'October 2016', '240'),
(19, '', '32', '6', '10', '1489540520', '1988887016', 'October 2016', '240'),
(20, '', '32', '6', '10', '1489540520', '619783611', 'October 2016', '18'),
(21, '', '32', '6', '10', '1489540520', '1121288299', 'October 2016', '18'),
(22, '', '32', '6', '10', '1489540520', '1519207893', 'October 2016', '18'),
(23, '', '32', '6', '10', '1489540520', '1224910230', 'October 2016', '18'),
(24, '', '32', '6', '11', '1489540520', '1194775460', 'November 2016', '18'),
(25, '69196', '32', '6', '11', '1489540520', '15269618', 'November 2016', '18'),
(26, '69196', '32', '6', '11', '1489540520', '82157975', 'November 2016', '18'),
(27, '69196', '32', '6', '11', '1489540520', '262632228', 'November 2016', '18'),
(28, '69196', '32', '6', '11', '1489540520', '491475011', 'November 2016', '18'),
(29, '69196', '32', '6', '11', '1489540520', '1779620371', 'November 2016', '18'),
(30, '69196', '32', '6', '11', '1489540520', '1126112229', 'November 2016', '18'),
(31, '69196', '32', '6', '11', '1489540520', '1109612971', 'November 2016', '18'),
(32, '69196', '32', '6', '11', '1489540520', '1539301358', 'November 2016', '18'),
(33, '69196', '32', '6', '11', '1489540520', '1985363414', 'November 2016', '18'),
(34, '69196', '32', '6', '11', '1489540520', '783324939', 'November 2016', '18'),
(35, '69196', '32', '6', '11', '1489540520', '1759658436', 'November 2016', '18'),
(36, '69196', '32', '6', '11', '1489540520', '1723963443', 'November 2016', '18'),
(37, '69196', '32', '6', '11', '1489540520', '1971949914', 'November 2016', '18'),
(38, '69196', '32', '6', '11', '1489540520', '81584561', 'November 2016', '18'),
(39, '69196', '32', '6', '11', '1489540520', '1188102482', 'November 2016', '18'),
(40, '69196', '32', '6', '11', '1489540520', '588042719', 'November 2016', '18'),
(41, '69196', '32', '6', '11', '1489540520', '197209882', 'November 2016', '18'),
(42, '69196', '32', '6', '11', '1489540520', '1780446313', 'November 2016', '18'),
(43, '69196', '32', '6', '11', '1489540520', '1259013187', 'November 2016', '18'),
(44, '69196', '32', '6', '11', '1489540520', '1570324885', 'November 2016', '18'),
(45, '69196', '32', '6', '11', '1489540520', '527580157', 'November 2016', '18'),
(46, '69196', '32', '6', '11', '1489540520', '1469916568', 'November 2016', '18'),
(47, '69196', '32', '6', '11', '1489540520', '557396037', 'November 2016', '18'),
(48, '69196', '32', '6', '11', '1489540520', '1110731950', 'November 2016', '18'),
(49, '69196', '32', '6', '11', '1489540520', '1583713284', 'November 2016', '18'),
(50, '69196', '32', '6', '11', '1489540520', '584926147', 'November 2016', '18'),
(51, '69196', '32', '6', '11', '1489540520', '1501984719', 'November 2016', '18'),
(52, '69196', '32', '6', '11', '1489540520', '845274024', 'November 2016', '18'),
(53, '69196', '32', '6', '11', '1489540520', '967492153', 'November 2016', '18'),
(54, '69196', '32', '6', '11', '1489540520', '1053377514', 'November 2016', '18'),
(55, '69196', '32', '6', '11', '1489540520', '522082', 'November 2016', '18'),
(56, '69196', '32', '6', '11', '1489540520', '249150123', 'November 2016', '18'),
(57, '69196', '32', '6', '11', '1489540520', '1060632949', 'November 2016', '18'),
(58, '69196', '32', '6', '11', '1489540520', '1023299359', 'November 2016', '18'),
(59, '69196', '32', '6', '11', '1489540520', '1436040768', 'November 2016', '18'),
(60, '69196', '32', '6', '11', '1489540520', '1351869262', 'November 2016', '18'),
(61, '69196', '32', '6', '11', '1489540520', '1337907506', 'November 2016', '18'),
(62, '69196', '32', '6', '11', '1489540520', '817993133', 'November 2016', '18'),
(63, '69196', '32', '6', '11', '1489540520', '1317550281', 'November 2016', '18'),
(64, '69196', '32', '6', '11', '1489540520', '914718444', 'November 2016', '18'),
(65, '69196', '32', '6', '11', '1489540520', '1309377814', 'November 2016', '18'),
(66, '69196', '32', '6', '11', '1489540520', '1466175831', 'November 2016', '18'),
(67, '69196', '32', '6', '11', '1489540520', '126755235', 'November 2016', '18'),
(68, '69196', '32', '6', '11', '1489540520', '1844311278', 'November 2016', '18'),
(69, '69196', '32', '6', '11', '1489540520', '944423047', 'November 2016', '18'),
(70, '69196', '32', '6', '11', '1489540520', '953295176', 'November 2016', '18'),
(71, '69196', '32', '6', '11', '1489540520', '1899393249', 'November 2016', '18'),
(72, '69196', '32', '6', '11', '1489540520', '1534876849', 'November 2016', '18'),
(73, '69196', '32', '6', '11', '1489540520', '1571288941', 'November 2016', '18'),
(74, '69196', '32', '6', '11', '1489540520', '1580046132', 'November 2016', '18'),
(75, '69196', '32', '6', '11', '1489540520', '59392363', 'November 2016', '18'),
(76, '69196', '32', '6', '11', '1489540520', '1677362970', 'November 2016', '18'),
(77, '69196', '32', '6', '11', '1489540520', '1536512448', 'November 2016', '18'),
(78, '69196', '32', '6', '11', '1489540520', '1029149383', 'November 2016', '18'),
(79, '69196', '32', '6', '11', '1489540520', '2020157959', 'November 2016', '18'),
(80, '69196', '32', '6', '11', '1489540520', '454128598', 'November 2016', '18'),
(81, '69196', '32', '6', '11', '1489540520', '1191364935', 'November 2016', '18'),
(82, '69196', '32', '6', '11', '1489540520', '1577750375', 'November 2016', '18'),
(83, '69196', '32', '6', '11', '1489540520', '1315167959', 'November 2016', '18'),
(84, '69196', '32', '6', '11', '1489540520', '1027690306', 'November 2016', '18'),
(85, '69196', '32', '6', '11', '1489540520', '2017701517', 'November 2016', '18'),
(86, '69196', '32', '6', '11', '1489540520', '1250156633', 'November 2016', '18'),
(87, '69196', '32', '6', '11', '1489540520', '2044778010', 'November 2016', '18'),
(88, '69196', '32', '6', '11', '1489540520', '765129989', 'November 2016', '18'),
(89, '69196', '32', '6', '11', '1489540520', '879991998', 'November 2016', '18'),
(90, '69196', '32', '6', '11', '1489540520', '464933863', 'November 2016', '18'),
(91, '69196', '32', '6', '11', '1489540520', '797936781', 'November 2016', '18'),
(92, '69196', '32', '6', '11', '1489540520', '1568809807', 'November 2016', '18'),
(93, '69196', '32', '6', '11', '1489540520', '217866361', 'November 2016', '18'),
(94, '69196', '32', '6', '11', '1489540520', '331738378', 'November 2016', '18'),
(95, '69196', '32', '6', '11', '1489540520', '358003745', 'November 2016', '18'),
(96, '69196', '32', '6', '11', '1489540520', '2027360926', 'November 2016', '18'),
(97, '69196', '32', '6', '11', '1489540520', '1705695331', 'November 2016', '18'),
(98, '69196', '32', '6', '11', '1489540520', '783734306', 'November 2016', '18'),
(99, '69196', '32', '6', '11', '1489540520', '134778410', 'November 2016', '18'),
(100, '69196', '32', '6', '11', '1489540520', '1989188514', 'November 2016', '18'),
(101, '69196', '32', '6', '11', '1489540520', '1286039741', 'November 2016', '18');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT for table `tbl_researcher_project`
--
ALTER TABLE `tbl_researcher_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=192;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=102;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
