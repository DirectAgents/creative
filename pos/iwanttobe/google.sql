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
-- Database: `google`
--

-- --------------------------------------------------------

--
-- Table structure for table `i_want_to_be_an_entrepreneur`
--

CREATE TABLE IF NOT EXISTS `i_want_to_be_an_entrepreneur` (
  `id` int(11) NOT NULL,
  `userID` varchar(255) NOT NULL,
  `Book` varchar(255) NOT NULL,
  `Book_Link` longtext NOT NULL,
  `Meetup_Group` varchar(255) NOT NULL,
  `Meetup_Group_Link` varchar(255) NOT NULL,
  `Startuplawyers` varchar(255) NOT NULL,
  `Startuplawyers_Link` varchar(255) NOT NULL,
  `Bootstrap` varchar(255) NOT NULL,
  `Events` varchar(255) NOT NULL,
  `Events_Link` varchar(255) NOT NULL,
  `Bootstrap_Link` varchar(255) NOT NULL,
  `page_order` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=253 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `i_want_to_be_an_entrepreneur`
--

INSERT INTO `i_want_to_be_an_entrepreneur` (`id`, `userID`, `Book`, `Book_Link`, `Meetup_Group`, `Meetup_Group_Link`, `Startuplawyers`, `Startuplawyers_Link`, `Bootstrap`, `Events`, `Events_Link`, `Bootstrap_Link`, `page_order`) VALUES
(172, '1', '', '', 'asdfasf', 'http://asdfasdf', '', '', '', '', '', '', 3),
(174, '1', 'asfd', 'asdf', '', '', '', '', '', '', '', '', 2),
(175, '1', '', '', '1111', 'http://www.alsfj.com', '', '', '', '', '', '', 4),
(176, '1', '333', 'asdf.com', '', '', '', '', '', '', '', '', 3),
(228, '1', '', '', '', '', '5555', '', '', '', '', '', 1),
(232, '1', '', '', '', '', '', '', 'gjhgjh', '', '', '', 1),
(233, '1', '111', '', '', '', '', '', '', '', '', '', 4),
(234, '1', '', '', '', '', '', '', '', '1', '', '', 1),
(235, '1', '', '', '', '', '', '', '', '2', 'http://asdfasdf.com', '', 2),
(236, '1', '', '', '', '', '', '', '', '1', '', '', 3),
(237, '1', '', '', '', '', '', '', '', '2', '', '', 4),
(238, '1', '', '', '', '', '', '', '5555', '', '', '', 2),
(239, '1', '', '', '', '', '', '', '6666', '', '', '', 3),
(240, '1', '3333', '', '', '', '', '', '', '', '', '', 5),
(241, '1', '555', '', '', '', '', '', '', '', '', '', 6),
(242, '1', '666', '', '', '', '', '', '', '', '', '', 7),
(243, '1', '4444', '', '', '', '', '', '', '', '', '', 8),
(244, '1', '5555', '', '', '', '', '', '', '', '', '', 9),
(245, '1', '', '', '', '', '', '', '', 'asdfasdf', '', '', 5),
(246, '1', '', '', '', '', '', '', '', 'adfasdf', '', '', 6),
(247, '1', '', '', '', '', '', '', '', 'asdfasdf', '', '', 7),
(248, '1', '', '', '', '', '', '', '', 'asdfasdf', '', '', 8),
(249, '1', '', '', '', '', '', '', '', 'fasdfads', '', '', 9),
(250, '1', '', '', '', '', '', '', '', 'asdfasdfasdasdf', '', '', 10),
(251, '1', '', '', '', '', '', '', '', 'asdfasdfasdf', '', '', 11),
(252, '1', '', '', '', '', '', '', '', 'adasdfasfd', 'http://asdflkjasdf.com', '', 12);

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `page_id` int(11) NOT NULL,
  `page_title` text NOT NULL,
  `page_url` text NOT NULL,
  `page_order` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`page_id`, `page_title`, `page_url`, `page_order`) VALUES
(1, 'JSON - Dynamic Dependent Dropdown List using Jquery and Ajax', 'json-dynamic-dependent-dropdown-list-using-jquery-and-ajax', 2),
(2, 'Live Table Data Edit Delete using Tabledit Plugin in PHP', 'live-table-data-edit-delete-using-tabledit-plugin-in-php', 1),
(3, 'Create Treeview with Bootstrap Treeview Ajax JQuery in PHP\r\n', 'create-treeview-with-bootstrap-treeview-ajax-jquery-in-php', 0);

-- --------------------------------------------------------

--
-- Table structure for table `professions`
--

CREATE TABLE IF NOT EXISTS `professions` (
  `id` int(11) NOT NULL,
  `Field` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `professions`
--

INSERT INTO `professions` (`id`, `Field`, `Name`) VALUES
(1, 'Accounting', 'Accounts Payable Clerk');

-- --------------------------------------------------------

--
-- Table structure for table `suggested_categories`
--

CREATE TABLE IF NOT EXISTS `suggested_categories` (
  `id` int(11) NOT NULL,
  `userID` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Search_Term` varchar(255) NOT NULL,
  `Date` date NOT NULL,
  `Time` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suggested_categories`
--

INSERT INTO `suggested_categories` (`id`, `userID`, `Name`, `Search_Term`, `Date`, `Time`) VALUES
(1, '1', '111', 'undefined', '2017-10-12', '06:38:33 PM'),
(2, '1', '222', '', '2017-10-12', '06:39:59 PM'),
(3, '1', '333', 'I want to be an entrepreneur', '2017-10-12', '06:41:07 PM'),
(4, '1', '44444', 'I want to be an entrepreneur', '2017-10-12', '06:41:52 PM'),
(5, '1', 'testing', 'I want to be an entrepreneur', '2017-10-12', '07:07:09 PM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `i_want_to_be_an_entrepreneur`
--
ALTER TABLE `i_want_to_be_an_entrepreneur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `professions`
--
ALTER TABLE `professions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suggested_categories`
--
ALTER TABLE `suggested_categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `i_want_to_be_an_entrepreneur`
--
ALTER TABLE `i_want_to_be_an_entrepreneur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=253;
--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `professions`
--
ALTER TABLE `professions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `suggested_categories`
--
ALTER TABLE `suggested_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
