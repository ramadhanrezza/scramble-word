-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 16, 2016 at 11:37 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `scramble-word`
--

-- --------------------------------------------------------

--
-- Table structure for table `sw_admin`
--

CREATE TABLE IF NOT EXISTS `sw_admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `sw_admin`
--


-- --------------------------------------------------------

--
-- Table structure for table `sw_category`
--

CREATE TABLE IF NOT EXISTS `sw_category` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `sw_category`
--

INSERT INTO `sw_category` (`id`, `name`, `created`) VALUES
(1, 'animals', '2016-04-15 19:49:28'),
(2, 'fruits', '2016-04-15 19:49:35'),
(3, 'vegetables', '2016-04-15 19:49:43');

-- --------------------------------------------------------

--
-- Table structure for table `sw_words`
--

CREATE TABLE IF NOT EXISTS `sw_words` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `category_id` int(10) DEFAULT NULL,
  `word` varchar(250) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `sw_words`
--

INSERT INTO `sw_words` (`id`, `category_id`, `word`, `created`) VALUES
(1, 1, 'jerapah', '2016-04-15 20:07:01'),
(2, 1, 'harimau', '2016-04-15 20:07:11'),
(3, 1, 'kucing', '2016-04-15 20:07:25'),
(4, 1, 'kambing', '2016-04-15 20:07:37'),
(5, 1, 'kerbau', '2016-04-15 20:07:48'),
(6, 2, 'pepaya', '2016-04-16 13:58:09'),
(7, 2, 'durian', '2016-04-16 13:58:28'),
(8, 2, 'kelengkeng', '2016-04-16 13:58:53'),
(9, 2, 'mangga', '2016-04-16 13:59:05');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
