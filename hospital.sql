-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Generation Time: Apr 02, 2019 at 01:14 PM
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `admitted`
--

CREATE TABLE IF NOT EXISTS `admitted` (
  `ipno` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `contno` bigint(20) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `addr1` varchar(50) NOT NULL,
  `addr2` varchar(30) NOT NULL,
  `city` varchar(20) NOT NULL,
  `district` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `refdoc` varchar(30) NOT NULL,
  `category` varchar(30) NOT NULL,
  `admdate` date NOT NULL,
  `roomno` int(11) NOT NULL,
  PRIMARY KEY (`ipno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `discharged`
--

CREATE TABLE IF NOT EXISTS `discharged` (
  `ipno` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `contno` bigint(20) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `addr1` varchar(50) NOT NULL,
  `addr2` varchar(30) NOT NULL,
  `city` varchar(20) NOT NULL,
  `district` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `refdoc` varchar(30) NOT NULL,
  `category` varchar(30) NOT NULL,
  `admdate` date NOT NULL,
  `roomno` int(11) NOT NULL,
  `disdate` date NOT NULL,
  UNIQUE KEY `ipno` (`ipno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE IF NOT EXISTS `doctor` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
