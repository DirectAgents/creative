-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 31, 2017 at 04:13 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `findacto`
--

-- --------------------------------------------------------

--
-- Table structure for table `apps`
--

CREATE TABLE IF NOT EXISTS `apps` (
  `id` int(11) NOT NULL,
  `userID` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `description` longtext NOT NULL
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
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `id` int(11) NOT NULL,
  `Firstname` varchar(255) NOT NULL,
  `Lastname` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `Age` varchar(255) NOT NULL,
  `About` longtext NOT NULL,
  `Skills` longtext NOT NULL,
  `City` varchar(255) NOT NULL,
  `State` varchar(255) NOT NULL,
  `Zip` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `Firstname`, `Lastname`, `Email`, `Phone`, `Age`, `About`, `Skills`, `City`, `State`, `Zip`) VALUES
(1, 'Alper', 'Dilmen', 'qqqqqqqeeee222', 'eeee333', '29', 'dd111', 'Bilingual Spanish/English', 'New York', 'NY', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apps`
--
ALTER TABLE `apps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interests`
--
ALTER TABLE `interests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apps`
--
ALTER TABLE `apps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `interests`
--
ALTER TABLE `interests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=189;
--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
