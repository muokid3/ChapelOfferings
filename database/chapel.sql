-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2015 at 07:06 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `chapel`
--
CREATE DATABASE IF NOT EXISTS `chapel` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `chapel`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(10) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `name`, `type`, `password`) VALUES
(6, 'alice', 'Alice Kamande', 'user', '6384e2b2184bcbf58eccf10ca7a6563c'),
(7, 'muoki', 'Dennis Muoki', 'admin', 'e7a6d3c2c04b2675046289a91e2de749'),
(8, 'admin', 'Real Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(9, 'munga', 'Martin Munga', 'user', '898ab638277ea47633b8a68f60e10552'),
(10, 'joe', 'Joe Mwangi', 'admin', '8ff32489f92f33416694be8fdc2d4c22'),
(11, 'accountant', 'Chapel Accountant', 'admin', '56f97f482ef25e2f440df4a424e2ab1e');

-- --------------------------------------------------------

--
-- Table structure for table `allocations`
--

CREATE TABLE IF NOT EXISTS `allocations` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `department` varchar(50) NOT NULL,
  `amount` int(20) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=122 ;

--
-- Dumping data for table `allocations`
--

INSERT INTO `allocations` (`id`, `department`, `amount`, `date`) VALUES
(59, 'Sunday Service', 1395, '2015-03-18'),
(60, 'Missions', 1116, '2015-03-18'),
(61, 'All Ministries', 1116, '2015-03-18'),
(62, 'Discipleship', 558, '2015-03-18'),
(63, 'Savings', 558, '2015-03-18'),
(64, 'Charity', 558, '2015-03-18'),
(65, 'Committee/Secretarial', 279, '2015-03-18'),
(66, 'Sunday Service', 2408, '2015-03-18'),
(67, 'Missions', 1926, '2015-03-18'),
(68, 'All Ministries', 1926, '2015-03-18'),
(69, 'Discipleship', 963, '2015-03-18'),
(70, 'Savings', 963, '2015-03-18'),
(71, 'Charity', 963, '2015-03-18'),
(72, 'Committee/Secretarial', 482, '2015-03-18'),
(73, 'Sunday Service', 4334, '2015-03-19'),
(74, 'Missions', 3467, '2015-03-19'),
(75, 'All Ministries', 3467, '2015-03-19'),
(76, 'Discipleship', 1733, '2015-03-19'),
(77, 'Savings', 1733, '2015-03-19'),
(78, 'Charity', 1733, '2015-03-19'),
(79, 'Committee/Secretarial', 867, '2015-03-19'),
(80, 'Sunday Service', 650, '2015-03-19'),
(81, 'Missions', 520, '2015-03-19'),
(82, 'All Ministries', 520, '2015-03-19'),
(83, 'Discipleship', 260, '2015-03-19'),
(84, 'Savings', 260, '2015-03-19'),
(85, 'Charity', 260, '2015-03-19'),
(86, 'Committee/Secretarial', 130, '2015-03-19'),
(87, 'Sunday Service', 125, '2015-04-06'),
(88, 'Missions', 100, '2015-04-06'),
(89, 'All Ministries', 100, '2015-04-06'),
(90, 'Discipleship', 50, '2015-04-06'),
(91, 'Savings', 50, '2015-04-06'),
(92, 'Charity', 50, '2015-04-06'),
(93, 'Committee/Secretarial', 25, '2015-04-06'),
(94, 'Sunday Service', 1838, '2015-04-06'),
(95, 'Missions', 1470, '2015-04-06'),
(96, 'All Ministries', 1470, '2015-04-06'),
(97, 'Discipleship', 735, '2015-04-06'),
(98, 'Savings', 735, '2015-04-06'),
(99, 'Charity', 735, '2015-04-06'),
(100, 'Committee/Secretarial', 368, '2015-04-06'),
(101, 'Sunday Service', 250, '2015-04-12'),
(102, 'Missions', 200, '2015-04-12'),
(103, 'All Ministries', 200, '2015-04-12'),
(104, 'Discipleship', 100, '2015-04-12'),
(105, 'Savings', 100, '2015-04-12'),
(106, 'Charity', 100, '2015-04-12'),
(107, 'Committee/Secretarial', 50, '2015-04-12'),
(108, 'Sunday Service', 1250, '2015-04-12'),
(109, 'Missions', 1000, '2015-04-12'),
(110, 'All Ministries', 1000, '2015-04-12'),
(111, 'Discipleship', 500, '2015-04-12'),
(112, 'Savings', 500, '2015-04-12'),
(113, 'Charity', 500, '2015-04-12'),
(114, 'Committee/Secretarial', 250, '2015-04-12'),
(115, 'Sunday Service', 2500, '2015-04-12'),
(116, 'Missions', 2000, '2015-04-12'),
(117, 'All Ministries', 2000, '2015-04-12'),
(118, 'Discipleship', 1000, '2015-04-12'),
(119, 'Savings', 1000, '2015-04-12'),
(120, 'Charity', 1000, '2015-04-12'),
(121, 'Committee/Secretarial', 500, '2015-04-12');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `department` varchar(50) NOT NULL,
  `percentage` decimal(10,2) NOT NULL,
  `current_total` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department`, `percentage`, `current_total`) VALUES
(1, 'Sunday Service', '0.25', 9750),
(2, 'Missions', '0.20', 10799),
(3, 'All Ministries', '0.20', 11799),
(4, 'Discipleship', '0.10', 5899),
(5, 'Savings', '0.10', 5899),
(6, 'Charity', '0.10', 5899),
(10, 'Committee/Secretarial', '0.05', 2951);

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE IF NOT EXISTS `expenses` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `department` varchar(30) NOT NULL,
  `amount` int(20) NOT NULL,
  `description` varchar(500) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `department`, `amount`, `description`, `date`) VALUES
(4, 'Sunday Service', 500, 'Chapel Biscuits, Tea', '2015-03-18'),
(5, 'Missions', 1000, 'EUCSIPOC', '2015-03-19'),
(6, 'Sunday Service', 500, 'tea', '2015-04-06'),
(7, 'Sunday Service', 4000, 'crusade', '2015-04-06');

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE IF NOT EXISTS `income` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` int(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`id`, `amount`, `description`, `admin_name`) VALUES
(1, 1000, 'leasing keyboard', 'Dennis Muoki'),
(2, 10000, 'fund raiser', 'Martin Munga');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `number` varchar(20) NOT NULL,
  `message` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `number`, `message`) VALUES
(1, 'Muoki Dennis', '0713653112', 'Mic check one two'),
(4, 'Alice Kamande', '1234567891', 'cant log in, please reset my password. Thanks\r\n'),
(5, 'Chapel Accountant', '0711111111', 'please register me as an admin so I can be able to maintain the system. Thanks');

-- --------------------------------------------------------

--
-- Table structure for table `offerings`
--

CREATE TABLE IF NOT EXISTS `offerings` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `one_shilling` int(20) NOT NULL,
  `five_shilling` int(20) NOT NULL,
  `ten_shilling` int(20) NOT NULL,
  `twenty_shilling` int(20) NOT NULL,
  `forty_shilling` int(20) NOT NULL,
  `fifty_shilling` int(20) NOT NULL,
  `hundred_shilling` int(20) NOT NULL,
  `two_hundred_shilling` int(20) NOT NULL,
  `five_hundred_shilling` int(20) NOT NULL,
  `thousand_shilling` int(20) NOT NULL,
  `date` date NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `offerings`
--

INSERT INTO `offerings` (`id`, `one_shilling`, `five_shilling`, `ten_shilling`, `twenty_shilling`, `forty_shilling`, `fifty_shilling`, `hundred_shilling`, `two_hundred_shilling`, `five_hundred_shilling`, `thousand_shilling`, `date`, `admin_name`) VALUES
(42, 10, 50, 100, 20, 400, 500, 1000, 2000, 500, 1000, '2015-03-18', 'Dennis Muoki'),
(43, 5, 25, 50, 100, 200, 250, 500, 1000, 2500, 5000, '2015-03-18', 'Alice Kamande'),
(44, 9, 45, 90, 180, 360, 450, 900, 1800, 4500, 9000, '2015-03-19', 'Dennis Muoki'),
(45, 0, 0, 100, 500, 2000, 0, 0, 0, 0, 0, '2015-03-19', 'Martin Munga'),
(46, 0, 0, 100, 0, 200, 0, 200, 0, 0, 0, '2015-04-06', 'Alice Kamande'),
(47, 0, 0, 0, 0, 0, 750, 5400, 200, 1000, 0, '2015-04-06', 'Dennis Muoki'),
(48, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5000, '2015-04-12', 'Dennis Muoki');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
