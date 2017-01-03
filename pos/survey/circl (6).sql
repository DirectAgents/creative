-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 03, 2017 at 04:26 AM
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
  `startup_id` int(11) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `c5t_setting`
--

CREATE TABLE IF NOT EXISTS `c5t_setting` (
  `id` int(11) NOT NULL,
  `setting_name` varchar(250) NOT NULL,
  `setting_value` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `c5t_setting`
--

INSERT INTO `c5t_setting` (`id`, `setting_name`, `setting_value`) VALUES
(1, 'administration_login', 'a:3:{s:5:"login";s:5:"admin";s:5:"email";s:17:"ald183s@gmail.com";s:8:"password";s:32:"202cb962ac59075b964b07152d234b70";}'),
(2, 'script_url', '/survey/snippets/comment/'),
(3, 'database_version', '2.1.2'),
(4, 'sequence_identifier', '45'),
(5, 'sequence_comment', '110'),
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
-- Table structure for table `days`
--

CREATE TABLE IF NOT EXISTS `days` (
  `id` int(11) NOT NULL,
  `day` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `days`
--

INSERT INTO `days` (`id`, `day`) VALUES
(1, 'Monday'),
(2, 'Tuesday'),
(3, 'Wednesday'),
(4, 'Thursday'),
(5, 'Friday'),
(6, 'Saturday'),
(7, 'Sunday');

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
) ENGINE=InnoDB AUTO_INCREMENT=189 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `interests`
--

INSERT INTO `interests` (`id`, `interest`) VALUES
(1, 'Entrepreneur Networking'),
(2, 'Startups'),
(3, 'Social Media Marketing'),
(4, 'Social-Media'),
(5, 'Fiction'),
(7, 'Dancing'),
(8, 'Public Speaking'),
(9, 'Internet Professionals'),
(10, 'Investing'),
(13, 'Sci-Fi/Fantasy'),
(14, 'Product Management'),
(15, 'Movie Nights'),
(16, 'Salsa'),
(17, 'Lean Startup'),
(18, 'Marketing'),
(19, 'Photography Classes'),
(20, 'Music'),
(21, 'Online Marketing'),
(22, 'Live Music'),
(23, 'Latin Dance'),
(24, 'Writing'),
(25, 'Professional Networking'),
(29, 'Public Speaking'),
(30, 'Real Estate'),
(31, 'Musicians'),
(32, 'Theater'),
(33, 'Real Estate Investing'),
(34, 'Business Referral Networking'),
(35, 'Photography'),
(36, 'Portrait Photography'),
(37, 'Writing'),
(38, 'Watching Movies'),
(39, 'Entrepreneurship'),
(40, 'Photography'),
(41, 'Sci-Fi and Games'),
(42, 'Book Club'),
(43, 'Art'),
(44, 'Literature'),
(45, 'Pets'),
(46, 'Painting'),
(47, 'Social'),
(48, 'Film'),
(49, 'Small Business'),
(50, 'Small Business Marketing'),
(51, 'Small Business Owners'),
(52, 'Software Development'),
(53, 'Startup Businesses'),
(54, 'Women''s Business Networking'),
(55, 'Woman Entrepreneurs'),
(56, 'Young Professionals'),
(57, 'Adventure Travel'),
(58, 'African Americans'),
(59, 'Baby Bloomers'),
(60, 'Black Women'),
(61, 'Community Organizations'),
(62, 'Creative Circle'),
(63, 'Ethics'),
(64, 'Farmers Market'),
(65, 'Gay'),
(66, 'Gay Couples'),
(67, 'Gay Men'),
(68, 'Geeks and Nerds'),
(69, 'International and Exchange'),
(70, 'Lesbian'),
(71, 'New Urbanism'),
(72, 'Permaculture'),
(73, 'Philanthropy'),
(74, 'Seniors'),
(75, 'Vegan'),
(76, 'Vegetarian'),
(77, 'Bilingual Spanish/English'),
(78, 'English as a Second Language'),
(79, 'English Language'),
(80, 'Expat'),
(81, 'Expat French'),
(82, 'French Culture'),
(83, 'French Language'),
(84, 'Geek Culture'),
(85, 'Languages'),
(86, 'Depression'),
(87, 'Divorce Support'),
(88, 'Energy Healing'),
(89, 'Fitness'),
(90, 'Group Fitness Training'),
(91, 'Guided Meditation'),
(92, 'Healing'),
(93, 'Healthy Eating'),
(94, 'Holistic Health'),
(95, 'Life Transformation'),
(96, 'Meditation'),
(97, 'Natural Health'),
(98, 'Nutrition'),
(99, 'Reiki'),
(100, 'Self-Improvement'),
(101, 'Weight Loss'),
(102, 'Weight Loss Support'),
(103, 'Wellness'),
(104, 'Whole Food Nutrition'),
(105, 'Yoga'),
(106, 'Beer'),
(107, 'Board Games'),
(108, 'Card Games'),
(109, 'Cashflow'),
(110, 'Coffee'),
(111, 'Crafts'),
(112, 'Creative Writing'),
(113, 'Dining Out'),
(114, 'Drinking'),
(115, 'Foodie'),
(116, 'Games'),
(117, 'Gaming'),
(118, 'International Travel'),
(119, 'Reading'),
(120, 'Strategy Games'),
(121, 'Travel'),
(122, 'Wine'),
(123, 'Wine and Food Pairing'),
(124, 'Wine Tasting'),
(125, 'Agile Project Management'),
(126, 'Android Development'),
(127, 'Business Intelligence'),
(128, 'Cloud Computing'),
(129, 'Digital Photography'),
(130, 'Hacking'),
(133, 'Linux'),
(134, 'Mobile Development'),
(135, 'Mobile Technology'),
(136, 'New Technology'),
(137, 'Online Marketing'),
(138, 'Open Source'),
(139, 'Programming Languages'),
(140, 'Social Media'),
(141, 'Social Media Marketing'),
(142, 'Web Design'),
(143, 'Web Development'),
(144, 'Web Technology'),
(145, 'Babies'),
(146, 'Dads'),
(147, 'Divorced Parents'),
(148, 'Family Friendly'),
(149, 'First-Time Pregnant Moms'),
(150, 'Kids'),
(151, 'Married Couples'),
(152, 'Moms'),
(153, 'New Moms'),
(154, 'Parents'),
(155, 'Single Dads'),
(156, 'Single Moms'),
(157, 'Stay-at-Home Moms'),
(158, 'Stay at Home Parents'),
(159, 'Toddlers'),
(160, 'Working Moms'),
(161, 'Dogs'),
(162, 'Cats'),
(163, 'Birds'),
(164, 'Horses'),
(165, 'Puppies'),
(166, 'Toys'),
(167, 'Animal Rights'),
(168, 'Animal Welfare'),
(169, 'Environment'),
(170, 'Human Rights'),
(171, 'Social Movements'),
(172, 'Volunteering'),
(173, 'Women in Technology'),
(174, 'Religion'),
(175, 'Spiritualism'),
(176, 'Biology'),
(177, 'Economics'),
(178, 'Physic'),
(179, 'Artificial Intelligence'),
(180, 'Data Analytics'),
(181, 'Environmental Awareness'),
(182, 'Couples'),
(183, 'Dating and Relationships'),
(184, 'Nightlife'),
(185, 'Single Professionals'),
(186, 'Social Dancing'),
(187, 'Financial Education'),
(188, 'Education');

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
(107, 2, 'thumb_148166158407-snow-mountain-sunset.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `participant_rating`
--

CREATE TABLE IF NOT EXISTS `participant_rating` (
  `rating_id` int(11) NOT NULL,
  `startup_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `rating_number` int(11) NOT NULL,
  `total_points` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = Block, 0 = Unblock'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nda_draft`
--

CREATE TABLE IF NOT EXISTS `tbl_nda_draft` (
  `id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `userID` varchar(255) NOT NULL,
  `startupID` varchar(255) NOT NULL,
  `participant_name` varchar(255) NOT NULL,
  `startup_name` varchar(255) NOT NULL,
  `nda_purpose` longtext NOT NULL,
  `ProjectID` varchar(255) NOT NULL,
  `State` varchar(255) NOT NULL,
  `startup_signature` longtext NOT NULL,
  `startup_sig_name` varchar(255) NOT NULL,
  `startup_sig_company` varchar(255) NOT NULL,
  `startup_sig_title` varchar(255) NOT NULL,
  `startup_sig_date` date NOT NULL,
  `participant_signature` longtext NOT NULL,
  `participant_sig_name` varchar(255) NOT NULL,
  `participant_sig_company` varchar(255) NOT NULL,
  `participant_sig_title` varchar(255) NOT NULL,
  `participant_sig_date` date NOT NULL,
  `Updated` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_nda_draft`
--

INSERT INTO `tbl_nda_draft` (`id`, `status`, `userID`, `startupID`, `participant_name`, `startup_name`, `nda_purpose`, `ProjectID`, `State`, `startup_signature`, `startup_sig_name`, `startup_sig_company`, `startup_sig_title`, `startup_sig_date`, `participant_signature`, `participant_sig_name`, `participant_sig_company`, `participant_sig_title`, `participant_sig_date`, `Updated`) VALUES
(1, 'draft', '', '47', '', 'Franz Peter11', '', '60597', 'NY', '231675.png', 'Franz Peter222', 'n/a', 'Mr.', '2016-12-31', '', '', '', '', '0000-00-00', '2016-12-29');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nda_pending`
--

CREATE TABLE IF NOT EXISTS `tbl_nda_pending` (
  `id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `userID` varchar(255) NOT NULL,
  `startupID` varchar(255) NOT NULL,
  `participant_name` varchar(255) NOT NULL,
  `startup_name` varchar(255) NOT NULL,
  `nda_purpose` longtext NOT NULL,
  `ProjectID` varchar(255) NOT NULL,
  `startup_signature` longtext NOT NULL,
  `startup_sig_name` varchar(255) NOT NULL,
  `startup_sig_company` varchar(255) NOT NULL,
  `startup_sig_title` varchar(255) NOT NULL,
  `startup_sig_date` date NOT NULL,
  `participant_signature` longtext NOT NULL,
  `participant_sig_name` varchar(255) NOT NULL,
  `participant_sig_company` varchar(255) NOT NULL,
  `participant_sig_title` varchar(255) NOT NULL,
  `participant_sig_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nda_signed`
--

CREATE TABLE IF NOT EXISTS `tbl_nda_signed` (
  `id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `userID` varchar(255) NOT NULL,
  `startupID` varchar(255) NOT NULL,
  `participant_name` varchar(255) NOT NULL,
  `startup_name` varchar(255) NOT NULL,
  `nda_purpose` longtext NOT NULL,
  `ProjectID` varchar(255) NOT NULL,
  `startup_signature` longtext NOT NULL,
  `startup_sig_name` varchar(255) NOT NULL,
  `startup_sig_company` varchar(255) NOT NULL,
  `startup_sig_title` varchar(255) NOT NULL,
  `startup_sig_date` date NOT NULL,
  `participant_signature` longtext NOT NULL,
  `participant_sig_name` varchar(255) NOT NULL,
  `participant_sig_company` varchar(255) NOT NULL,
  `participant_sig_title` varchar(255) NOT NULL,
  `participant_sig_date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_nda_signed`
--

INSERT INTO `tbl_nda_signed` (`id`, `status`, `userID`, `startupID`, `participant_name`, `startup_name`, `nda_purpose`, `ProjectID`, `startup_signature`, `startup_sig_name`, `startup_sig_company`, `startup_sig_title`, `startup_sig_date`, `participant_signature`, `participant_sig_name`, `participant_sig_company`, `participant_sig_title`, `participant_sig_date`) VALUES
(32, 'signed', '28', '46', 'Franz Peterle111', 'fasdasdf1114446666', 'asdfasdf', '86935', '3140665.png', 'asdfasdf5555', 'Inc.', 'Mr. Chef', '2016-11-23', '8707788.png', 'Franco Perle555', '', '', '2016-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_participant`
--

CREATE TABLE IF NOT EXISTS `tbl_participant` (
  `userID` int(11) NOT NULL,
  `facebook_id` decimal(21,0) NOT NULL,
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
  `Interest` longtext NOT NULL,
  `Languages` longtext NOT NULL,
  `Street` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL,
  `State` varchar(25) NOT NULL,
  `Zip` varchar(255) NOT NULL,
  `Country` varchar(255) NOT NULL,
  `Timezone` varchar(255) NOT NULL,
  `Bio` longtext NOT NULL,
  `Days_Availability_Option1` varchar(255) DEFAULT NULL,
  `From_Time_Option1` varchar(255) NOT NULL,
  `To_Time_Option1` varchar(255) NOT NULL,
  `Location_Option1` varchar(255) NOT NULL,
  `Days_Availability_Option2` varchar(255) DEFAULT NULL,
  `From_Time_Option2` varchar(22) NOT NULL,
  `To_Time_Option2` varchar(255) NOT NULL,
  `Location_Option2` varchar(255) NOT NULL,
  `Days_Availability_Option3` varchar(255) DEFAULT NULL,
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
  `account_id` varchar(255) NOT NULL,
  `owner_user_id` varchar(255) NOT NULL,
  `access_token` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `bank_account` varchar(255) NOT NULL,
  `Date_Created` date NOT NULL,
  `account_verified` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_participant`
--

INSERT INTO `tbl_participant` (`userID`, `facebook_id`, `google_id`, `google_picture_link`, `FirstName`, `LastName`, `userEmail`, `userPass`, `EmailNotifications`, `Meetupchoice`, `CountryCode`, `Phone`, `Age`, `Gender`, `Height`, `Status`, `Ethnicity`, `Smoke`, `Drink`, `Diet`, `Religion`, `Education`, `Job`, `Interest`, `Languages`, `Street`, `City`, `State`, `Zip`, `Country`, `Timezone`, `Bio`, `Days_Availability_Option1`, `From_Time_Option1`, `To_Time_Option1`, `Location_Option1`, `Days_Availability_Option2`, `From_Time_Option2`, `To_Time_Option2`, `Location_Option2`, `Days_Availability_Option3`, `From_Time_Option3`, `To_Time_Option3`, `Location_Option3`, `Monday_From`, `Monday_To`, `Tuesday_From`, `Tuesday_To`, `Wednesday_From`, `Wednesday_To`, `Thursday_From`, `Thursday_To`, `Friday_From`, `Friday_To`, `Saturday_From`, `Saturday_To`, `Sunday_From`, `Sunday_To`, `Monday_Location`, `Tuesday_Location`, `Wednesday_Location`, `Thursday_Location`, `Friday_Location`, `Saturday_Location`, `Sunday_Location`, `userStatus`, `tokenCode`, `profile_image`, `account_id`, `owner_user_id`, `access_token`, `code`, `bank_account`, `Date_Created`, `account_verified`) VALUES
(28, '10157632974310062', '0', '', 'Alper', 'Dilmen', 'ald183s@gmail.com', '', 'NULL', '', '', '61114444', '20', 'Female', '53', 'Married', 'Black', 'Sometimes', 'Very Often', 'Kosher', 'Atheist', 'High School', 'Banking / Finance', 'Dancing', '', '', 'New York', 'AL', '', '', '', '', '2016-11-27', '04:00pm', '10:00pm', 'Amsterdam Avenue, New York, NY, United States', '2016-11-27', '03:00pm', '10:00pm', '312 U.S. 1, Orange, CT, United States', '2016-11-27', '09:00pm', '12:00am', 'Amsterdam Avenue, New York, NY, United States', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'N', '', '', '613513821', '189754692', 'STAGE_af0287ec6ba197eb317a59bd62d51628cc9e47e8ac08fc7f6749a9007f36dc1b', '3e196f284d389d7160cc423b1872d2938185f468e1643c843a', '', '2016-11-18', '1'),
(30, '0', '0', '', 'Lola', 'Bora', 'wepaystage2@hotmail.com', 'b8150db267de096dd2573e6d91882778', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', NULL, '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Y', '1a88a05615fc3a2647d33746e69deb02', '', '1320903211', '189754692', 'STAGE_9b005dbacb9b7f86bf66f976c44e8cebde30be47b8d3c66a7ee0a1b6f257e8fe', '67bb20271c17f113866b706a6b166fa26fc84e13d1354228e7', '', '2016-12-09', ''),
(31, '0', '116585564878133212506', 'https://lh5.googleusercontent.com/-gEtROnijSjk/AAAAAAAAAAI/AAAAAAAAAAs/9GAC4wQDn0U/photo.jpg', 'Franz', 'Peter', 'wepaystage@gmail.com', 'b8150db267de096dd2573e6d91882778', '', '', '', '', '20', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', NULL, '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Y', '9bc6fd67e357180da31c4f70205e8289', '', '1812989742', '167070014', 'STAGE_3157a9551b8c9c076f9a3631d1af99785eeafaa1674ff9cebbe0ca8887846d69', '13af4b196b1ab193735c8c74a190140c80df84eabdc4d5e774', '', '2016-12-10', '1'),
(32, '0', '0', '', 'Mike', 'Jackson', 'wepay.participant.stage4@gmail.com', 'b8150db267de096dd2573e6d91882778', 'NULL', '', '', '', '18', '', '', '', '', '', '', '', '', '', '', 'Dancing', '', '', 'New York', 'AL', '', '', '', 'I am like this', 'Monday,Tuesday,Wednesday', '04:00pm', '10:00pm', 'Avenue of the Americas, New York, NY, United States', 'Saturday,Sunday', '09:00am', '03:00pm', 'SoHo, New York, NY, United States', 'Wednesday,Thursday', '08:00am', '10:00am', 'Secaucus, NJ, United States', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Y', 'b51fc221a72763e12d703b396ed963c6', 'thumb_148190933007-snow-mountain-sunset.jpg', '829457049', '27005031', 'STAGE_5dbb95faae50a159844a43d0c8a29ab25aa8ac429194999aad03799195ac536d', '111ea5148ca4c007ac0fea6e44117f4695af51a95a004c2afd', '', '2016-12-11', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_participant_interests`
--

CREATE TABLE IF NOT EXISTS `tbl_participant_interests` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `Interests` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_participant_interests`
--

INSERT INTO `tbl_participant_interests` (`id`, `userID`, `Interests`) VALUES
(74, 3, 'Sport'),
(76, 0, 'Adventure Travel'),
(77, 0, 'Adventure Travel'),
(78, 0, 'Animal Rights'),
(79, 0, 'African Americans'),
(80, 0, 'Animal Rights'),
(94, 32, 'Social Media'),
(96, 32, 'Birds');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_participant_languages`
--

CREATE TABLE IF NOT EXISTS `tbl_participant_languages` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `Languages` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_participant_languages`
--

INSERT INTO `tbl_participant_languages` (`id`, `userID`, `Languages`) VALUES
(15, 32, 'Arabic'),
(20, 32, 'Cajun');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_participant_potentialanswer`
--

CREATE TABLE IF NOT EXISTS `tbl_participant_potentialanswer` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `ProjectID` int(11) NOT NULL,
  `PotentialAnswerGiven` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_participant_potentialanswer`
--

INSERT INTO `tbl_participant_potentialanswer` (`id`, `userID`, `ProjectID`, `PotentialAnswerGiven`) VALUES
(4, 32, 60597, 'Potential Answer 1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_project_request`
--

CREATE TABLE IF NOT EXISTS `tbl_project_request` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `startupID` int(11) NOT NULL,
  `ProjectID` int(11) NOT NULL,
  `Meetupchoice` varchar(255) NOT NULL,
  `Meeting_Status` varchar(255) NOT NULL,
  `Viewed_by_Startup` varchar(255) NOT NULL DEFAULT 'No',
  `Viewed_by_Participant` varchar(255) NOT NULL DEFAULT 'No',
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
  `Rated_Participant` varchar(255) NOT NULL,
  `Comment_Participant` varchar(255) NOT NULL,
  `Potential_Answer_Given` varchar(255) NOT NULL,
  `Date_Posted` date NOT NULL,
  `Time_Posted` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_project_request`
--

INSERT INTO `tbl_project_request` (`id`, `userID`, `startupID`, `ProjectID`, `Meetupchoice`, `Meeting_Status`, `Viewed_by_Startup`, `Viewed_by_Participant`, `Date_of_Meeting`, `Day`, `From_Time`, `To_Time`, `Final_Time`, `Location`, `Accepted_to_Participate`, `Not_Qualified_Anymore`, `Status`, `Requested_By`, `Met`, `Payment`, `Rated_Participant`, `Comment_Participant`, `Potential_Answer_Given`, `Date_Posted`, `Time_Posted`) VALUES
(26, 32, 47, 60597, '', 'Upcoming Meetings', 'No', 'No', '2017-01-15', 'Sunday', '', '', '09:00am', 'SoHo, New York, NY, United States', 'Accepted', '', 'Meeting Set', 'Startup', '', '', '', '', '', '2017-01-02', '02:09:59 PM');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_startup`
--

CREATE TABLE IF NOT EXISTS `tbl_startup` (
  `userID` int(11) NOT NULL,
  `facebook_id` decimal(21,0) NOT NULL,
  `google_id` decimal(21,0) NOT NULL,
  `google_picture_link` varchar(200) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `Age` varchar(255) NOT NULL,
  `Gender` varchar(255) NOT NULL,
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
  `Date_Created` date NOT NULL,
  `account_verified` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_startup`
--

INSERT INTO `tbl_startup` (`userID`, `facebook_id`, `google_id`, `google_picture_link`, `FirstName`, `LastName`, `userEmail`, `Phone`, `Age`, `Gender`, `City`, `State`, `Timezone`, `Bio`, `Linkedin`, `Twitter`, `Facebook`, `EmailNotifications`, `profile_image`, `userPass`, `userStatus`, `tokenCode`, `account_id`, `owner_user_id`, `access_token`, `code`, `billing_address_one`, `billing_address_two`, `billing_city`, `billing_state`, `billing_zip`, `billing_country`, `credit_card_id`, `cc_last_four`, `cc_name`, `Date_Created`, `account_verified`) VALUES
(46, '10157632974310062', '0', '', 'Alper', 'Dilmen', 'ald183s@gmail.com', '', '', 'Male', '', '', '', '', '', '', '', '', '', '', 'Y', '', '1287756994', '226769035', 'STAGE_76b2521e20ca875586e8c10f64294f9675fd7aac02102c03baaece2821dc62f3', 'd915eae7de1723ae37f06128887cd6e9a34e5bafa0ae2f99c7', '123 Street', '', 'Queens', 'NY', '10001', 'US', '3093590278', '4018', 'Visa xxxxxx4018', '2016-11-18', '1'),
(47, '0', '0', '', 'Bobby', 'Lobby', 'wepaystage3@hotmail.com', '917-267-1767', '', '', 'Chicago', 'AL', '', 'this is me2222', 'http://www.thelinkedin.com', 'http://www.thetwitter.com', 'http://www.thefacebook.com', 'New participant requests to participate', 'thumb_1482788301_146751013008_10153819353100062_7688309_n.jpg', 'b8150db267de096dd2573e6d91882778', 'Y', 'b8c89fa7a4152220002c5fcdf5a36348', '', '', '', '', '11448 Doral Ave', '', 'Northridge', 'Alabama', '91326', 'US', '2815301230', '4769', 'MasterCard xxxxxx4769', '2016-12-09', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_startup_interests`
--

CREATE TABLE IF NOT EXISTS `tbl_startup_interests` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `ProjectID` int(11) NOT NULL,
  `Interests` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=169 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_startup_interests`
--

INSERT INTO `tbl_startup_interests` (`id`, `userID`, `ProjectID`, `Interests`) VALUES
(141, 39, 14425, 'Sci-Fi and Games'),
(151, 39, 14425, 'Family'),
(153, 47, 19897, 'a'),
(154, 47, 19897, 'a'),
(155, 47, 19897, 'Entre'),
(156, 47, 19897, 'Entre'),
(157, 47, 83757, 'Adventure Travel'),
(158, 47, 86935, 'Agile Project Management'),
(159, 47, 99488, 'Entrepreneur Networking, Startups'),
(160, 47, 99488, 'Animal Welfare'),
(161, 47, 99488, 'Android Development'),
(164, 47, 47476, 'Birds'),
(165, 47, 47476, 'Animal Rights'),
(166, 47, 47476, 'Adventure Travel'),
(167, 47, 47476, 'African Americans'),
(168, 47, 47476, 'Agile Project Management');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_startup_project`
--

CREATE TABLE IF NOT EXISTS `tbl_startup_project` (
  `id` int(11) NOT NULL,
  `ProjectID` int(11) NOT NULL,
  `Stage` varchar(255) NOT NULL,
  `Category` varchar(255) NOT NULL,
  `startupID` int(11) NOT NULL,
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
  `Interest` longtext NOT NULL,
  `Languages` varchar(255) NOT NULL,
  `Details` longtext NOT NULL,
  `Agenda_One` varchar(255) NOT NULL,
  `Agenda_Two` varchar(255) NOT NULL,
  `Agenda_Three` varchar(255) NOT NULL,
  `project_image` varchar(255) NOT NULL,
  `ProjectStatus` varchar(25) NOT NULL,
  `FinishedProcess` enum('Y','N') NOT NULL DEFAULT 'N',
  `NDA` varchar(255) NOT NULL,
  `Date_Created` date NOT NULL,
  `Date_Updated` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_startup_project`
--

INSERT INTO `tbl_startup_project` (`id`, `ProjectID`, `Stage`, `Category`, `startupID`, `Name`, `Pay`, `Minutes`, `MinReq`, `Meetupchoice`, `Age`, `Gender`, `MinHeight`, `MaxHeight`, `Street`, `City`, `State`, `Zip`, `Country`, `Status`, `Ethnicity`, `Smoke`, `Drink`, `Diet`, `Religion`, `Education`, `Job`, `Interest`, `Languages`, `Details`, `Agenda_One`, `Agenda_Two`, `Agenda_Three`, `project_image`, `ProjectStatus`, `FinishedProcess`, `NDA`, `Date_Created`, `Date_Updated`) VALUES
(1, 60597, 'About to launch', 'social', 47, 'Idea 1', '23.00', '55', 'Age,Interest', '', '18,19,20,21,22,23,24', 'NULL', 'NULL', 'NULL', '', '', '', '', '', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'Dancing', 'French', 'This is this idea etc....', 'Get feedback about my idea....', '', '', 'thumb_148279053207-snow-mountain-sunset.jpg', 'Private', 'Y', 'Yes', '2016-12-30', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_startup_screening`
--

CREATE TABLE IF NOT EXISTS `tbl_startup_screening` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `ProjectID` int(11) NOT NULL,
  `Answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_startup_screeningquestion`
--

CREATE TABLE IF NOT EXISTS `tbl_startup_screeningquestion` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `ProjectID` int(11) NOT NULL,
  `ScreeningQuestion` longtext NOT NULL,
  `PotentialAnswer1` varchar(255) NOT NULL,
  `PotentialAnswer2` varchar(255) NOT NULL,
  `PotentialAnswer3` varchar(255) NOT NULL,
  `Accepted` varchar(255) NOT NULL,
  `EnabledorDisabled` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_startup_screeningquestion`
--

INSERT INTO `tbl_startup_screeningquestion` (`id`, `userID`, `ProjectID`, `ScreeningQuestion`, `PotentialAnswer1`, `PotentialAnswer2`, `PotentialAnswer3`, `Accepted`, `EnabledorDisabled`) VALUES
(1, 47, 60597, 'Can you do this?', 'Yes', 'No', 'NULL', 'Potential Answer 1', 'Enabled');

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
  `startup_id` varchar(255) NOT NULL,
  `participant_id` varchar(255) NOT NULL,
  `order_by` int(11) NOT NULL,
  `account_id` varchar(255) NOT NULL,
  `checkout_id` varchar(255) NOT NULL,
  `checkout_find_date` varchar(255) NOT NULL,
  `checkout_find_amount` varchar(255) NOT NULL,
  `fees` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `refundrequest` varchar(255) NOT NULL,
  `refundreason` longtext NOT NULL,
  `refunded` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wepay`
--

INSERT INTO `wepay` (`id`, `ProjectID`, `startup_id`, `participant_id`, `order_by`, `account_id`, `checkout_id`, `checkout_find_date`, `checkout_find_amount`, `fees`, `total`, `refundrequest`, `refundreason`, `refunded`) VALUES
(20, '86935', '47', '28', 12, '613513821', '651690922', 'December 2016', '1.32', '0.32', '1.32', '', '', ''),
(21, '86935', '47', '28', 12, '613513821', '936158616', 'December 2016', '2.35', '0.35', '2.35', '', '', ''),
(22, '86935', '47', '28', 12, '613513821', '108237395', 'December 2016', '2.35', '0.35', '2.35', '', '', ''),
(23, '86935', '47', '30', 12, '1320903211', '202368879', 'December 2016', '2.35', '0.35', '2.35', '', '', ''),
(24, '86935', '47', '30', 12, '1320903211', '1624886903', 'December 2016', '3.77', '0.39', '3.77', '', '', ''),
(25, '86935', '47', '30', 12, '1812989742', '252750906', 'December 2016', '5.77', '0.45', '5.77', '', '', ''),
(26, '86935', '47', '30', 12, '1812989742', '1037760108', 'December 2016', '5.44', '0.44', '5.44', '', '', ''),
(27, '86935', '47', '30', 12, '1812989742', '426917113', 'December 2016', '1.32', '0.32', '1.32', '', '', ''),
(28, '86935', '47', '30', 12, '1812989742', '211502069', 'December 2016', '1.32', '0.32', '1.32', '', '', ''),
(29, '86935', '47', '30', 12, '1812989742', '1063090120', 'December 2016', '1.32', '0.32', '1.32', '', '', ''),
(30, '86935', '47', '30', 12, '1812989742', '15268416', 'December 2016', '1.32', '0.32', '1.32', '', '', ''),
(31, '86935', '47', '30', 12, '1320903211', '1633807015', 'December 2016', '6.47', '0.47', '6.47', '', '', ''),
(32, '86935', '47', '30', 1, '', '', 'January 1970', '', '', '', '', '', ''),
(33, '86935', '47', '30', 1, '', '', 'January 1970', '', '', '', '', '', ''),
(34, '86935', '47', '30', 12, '1812989742', '1601738383', 'December 2016', '1.32', '0.32', '1.32', '', '', ''),
(35, '86935', '47', '30', 12, '1812989742', '694966760', 'December 2016', '1.53', '0.33', '1.53', '', '', ''),
(36, '86935', '47', '30', 12, '1812989742', '1714779725', 'December 2016', '1.53', '0.33', '1.53', '', '', ''),
(37, '86935', '47', '30', 12, '1812989742', '1497006163', 'December 2016', '1.53', '0.33', '1.53', '', '', ''),
(38, '86935', '47', '30', 12, '1812989742', '1901453909', 'December 2016', '1.53', '0.33', '1.53', '', '', ''),
(39, '86935', '47', '30', 12, '1320903211', '1997228661', 'December 2016', '8.53', '0.53', '8.53', '', '', ''),
(40, '86935', '47', '30', 12, '1320903211', '2073202318', 'December 2016', '8', '0.53', '8.53', '', '', ''),
(41, '86935', '47', '30', 12, '1320903211', '696253313', 'December 2016', '8', '0.53', '8.53', '', '', ''),
(42, '86935', '47', '30', 12, '1320903211', '462970525', 'December 2016', '8', '0.53', '8.53', '', '', ''),
(43, '86935', '47', '32', 12, '829457049', '1681749008', 'December 2016', '8', '0.53', '8.53', '', 'yo need the money back', 'yes'),
(44, '86935', '47', '32', 12, '829457049', '484155685', 'December 2016', '8', '0.53', '8.53', '', '', ''),
(45, '86935', '47', '32', 12, '829457049', '841701877', 'December 2016', '8', '0.53', '8.53', '', 'yo gotta need the money back', 'yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `c5t_comment`
--
ALTER TABLE `c5t_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `c5t_identifier`
--
ALTER TABLE `c5t_identifier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `c5t_setting`
--
ALTER TABLE `c5t_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tbl_nda_draft`
--
ALTER TABLE `tbl_nda_draft`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_nda_pending`
--
ALTER TABLE `tbl_nda_pending`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_nda_signed`
--
ALTER TABLE `tbl_nda_signed`
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
-- Indexes for table `tbl_participant_languages`
--
ALTER TABLE `tbl_participant_languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_participant_potentialanswer`
--
ALTER TABLE `tbl_participant_potentialanswer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_project_request`
--
ALTER TABLE `tbl_project_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_startup`
--
ALTER TABLE `tbl_startup`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- Indexes for table `tbl_startup_interests`
--
ALTER TABLE `tbl_startup_interests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_startup_project`
--
ALTER TABLE `tbl_startup_project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_startup_screening`
--
ALTER TABLE `tbl_startup_screening`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_startup_screeningquestion`
--
ALTER TABLE `tbl_startup_screeningquestion`
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
-- AUTO_INCREMENT for table `days`
--
ALTER TABLE `days`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `interests`
--
ALTER TABLE `interests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=189;
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
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_nda_draft`
--
ALTER TABLE `tbl_nda_draft`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_nda_pending`
--
ALTER TABLE `tbl_nda_pending`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_nda_signed`
--
ALTER TABLE `tbl_nda_signed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `tbl_participant`
--
ALTER TABLE `tbl_participant`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `tbl_participant_interests`
--
ALTER TABLE `tbl_participant_interests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=97;
--
-- AUTO_INCREMENT for table `tbl_participant_languages`
--
ALTER TABLE `tbl_participant_languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tbl_participant_potentialanswer`
--
ALTER TABLE `tbl_participant_potentialanswer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_project_request`
--
ALTER TABLE `tbl_project_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `tbl_startup`
--
ALTER TABLE `tbl_startup`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `tbl_startup_interests`
--
ALTER TABLE `tbl_startup_interests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=169;
--
-- AUTO_INCREMENT for table `tbl_startup_project`
--
ALTER TABLE `tbl_startup_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_startup_screening`
--
ALTER TABLE `tbl_startup_screening`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_startup_screeningquestion`
--
ALTER TABLE `tbl_startup_screeningquestion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
