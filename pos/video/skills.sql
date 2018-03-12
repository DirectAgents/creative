-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2018 at 09:38 PM
-- Server version: 5.6.31
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `video`
--

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE IF NOT EXISTS `skills` (
  `id` int(11) NOT NULL,
  `skill` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=189 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `skill`) VALUES
(1, 'Product Management'),
(2, 'Strategy'),
(3, 'User Experience'),
(4, 'Design'),
(5, 'Recruiting'),
(7, 'Sales'),
(8, 'Legal'),
(9, 'Marketing'),
(10, 'Growth'),
(13, 'Business Development'),
(14, 'Fundraising'),
(15, 'Software Development'),
(16, 'Entrepreneur'),
(17, 'Innovation Development'),
(18, 'Machine Learning'),
(19, 'Technological Innovation'),
(20, 'Innovation'),
(21, 'Programming'),
(22, 'Public Relations'),
(23, 'Operations'),
(24, 'Branding & Identity'),
(25, 'Fashion Writing'),
(29, 'Fashion Design'),
(30, 'Fashion Consulting'),
(31, 'Fashion Blogging'),
(32, 'Strategy'),
(33, 'U.S Food and Drug Administration (FDA)'),
(34, 'Project Management'),
(35, 'Augmented Reality'),
(36, 'Market Testing'),
(37, 'Business Development'),
(38, 'Emerging Technologies'),
(39, 'Quality of Service (QoS)'),
(40, 'Environmental Applications'),
(41, 'Leadership in Energy and Environmental Design (LEED)'),
(42, 'Energy Engineering'),
(43, 'Sustainable Engineering'),
(44, 'Technological Innovation'),
(45, 'Research'),
(46, 'Analytics'),
(47, 'Front-End Web Development'),
(48, 'Back-End Web Development'),
(49, 'Machine Learning'),
(50, 'Laravel'),
(51, 'PHP development'),
(52, 'RESTful WebServices'),
(53, 'Java APIs'),
(54, 'Java'),
(55, 'C++'),
(56, 'Advertising'),
(57, 'Operations'),
(58, 'African Americans'),
(59, 'Back-end Programming'),
(60, 'Front End Developer'),
(61, 'Full Stack'),
(62, 'Cryptocurrency'),
(63, 'Excel'),
(64, 'SQL'),
(65, 'Crypto'),
(66, 'Finance'),
(67, 'FinTech'),
(68, 'Customer Retention'),
(69, 'Customer Management'),
(70, 'Partnership Management'),
(71, 'Partner Relations'),
(72, 'Partner Relationship Management'),
(73, 'Operations'),
(74, 'SEM'),
(75, 'SEO'),
(76, 'Data Science'),
(77, 'NLP'),
(78, 'SAS/SQL'),
(79, 'Base SAS Certified'),
(80, 'SAS Programming'),
(81, 'SAS Certified Base Programmer'),
(82, 'SAS'),
(83, 'Python'),
(84, 'Developer'),
(85, 'CTO'),
(86, 'Software Engineering'),
(87, 'Application Programming Interfaces'),
(88, 'Programming Languages'),
(89, 'Software Coding'),
(90, 'Software Business'),
(91, 'Software Architectural Design'),
(92, 'Software as a Service (SaaS)'),
(93, 'Software Build'),
(94, 'Business Process'),
(95, 'Business Strategy'),
(96, 'Software Architectural Design'),
(97, 'Capitalk Markets'),
(98, 'Branding & Identity'),
(99, 'Customer Satisfaction'),
(100, 'Merchandising'),
(101, 'Brand Activation'),
(102, 'Campaign Development'),
(103, 'Project Management'),
(104, 'React.js'),
(105, 'Mean Stack'),
(106, 'Web & Mobile'),
(107, 'Building Strong Relationships'),
(108, 'Advertising'),
(109, 'Account Management'),
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=189;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
