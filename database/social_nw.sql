-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2015 at 02:50 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `social_nw`
--
CREATE DATABASE IF NOT EXISTS `social_nw` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `social_nw`;

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE IF NOT EXISTS `friends` (
  `req_id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` varchar(30) NOT NULL,
  `receiver` varchar(30) NOT NULL,
  `accept` varchar(10) NOT NULL DEFAULT 'no',
  PRIMARY KEY (`req_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`req_id`, `sender`, `receiver`, `accept`) VALUES
(1, 'sumit', 'biswajit', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `mem_id` int(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `address` varchar(35) NOT NULL,
  `DOB` date NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  PRIMARY KEY (`mem_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`mem_id`, `username`, `password`, `fname`, `lname`, `address`, `DOB`, `email`, `contact`, `gender`) VALUES
(1, 'tanmay', 'tan', 'tanmay', 'sarkar', 'gobardanga', '1993-09-16', 'tanmaykumar@gmail.com', '9647160687', 'male'),
(3, 'sumit', 'sum', 'sumit', 'pal', 'birbhum', '1993-01-10', 'sumitwithyou@gmail.com', '9012458745', 'male'),
(4, 'biswajit', 'bisu', 'biswajit', 'mahato', 'purulia', '1993-01-01', 'biswajit.mahato@gmail.com', '8012479854', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `messageid` int(10) NOT NULL AUTO_INCREMENT,
  `sender` varchar(30) NOT NULL,
  `reciever` varchar(30) NOT NULL,
  `msgbody` varchar(64) NOT NULL,
  `sendingdate` datetime NOT NULL,
  `viewingdate` datetime NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`messageid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`messageid`, `sender`, `reciever`, `msgbody`, `sendingdate`, `viewingdate`, `status`) VALUES
(1, 'biswajit', 'sumit', ' :) ', '2015-06-21 00:00:00', '0000-00-00 00:00:00', '0'),
(2, 'sumit', 'biswajit', ' :X ', '2015-06-21 00:00:00', '0000-00-00 00:00:00', '0'),
(3, 'biswajit', 'sumit', ' :-O ', '2015-06-21 00:00:00', '0000-00-00 00:00:00', '0'),
(4, 'sumit', 'biswajit', ' :(( ', '2015-06-21 00:00:00', '0000-00-00 00:00:00', '0'),
(5, 'sumit', 'biswajit', ' :(| ', '2015-06-21 00:00:00', '0000-00-00 00:00:00', '0'),
(6, 'biswajit', 'sumit', ' :-) ', '2015-06-20 00:00:00', '0000-00-00 00:00:00', '0'),
(7, 'biswajit', 'sumit', 'hi\r\n', '2015-06-20 00:00:00', '0000-00-00 00:00:00', '0'),
(8, 'biswajit', 'sumit', 'yo', '2015-06-20 18:13:27', '0000-00-00 00:00:00', '0');

-- --------------------------------------------------------

--
-- Table structure for table `onlineusers`
--

CREATE TABLE IF NOT EXISTS `onlineusers` (
  `onlineuserid` int(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `logintime` date NOT NULL,
  `logouttime` date NOT NULL,
  `loginstatus` varchar(10) NOT NULL,
  PRIMARY KEY (`onlineuserid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `onlineusers`
--

INSERT INTO `onlineusers` (`onlineuserid`, `username`, `logintime`, `logouttime`, `loginstatus`) VALUES
(1, 'tanmay', '2015-06-21', '0000-00-00', '1'),
(2, 'sumit', '2015-06-21', '2015-06-20', '0'),
(3, 'biswajit', '2015-06-21', '2015-06-20', '1'),
(4, 'sumit', '2015-06-21', '2015-06-20', '1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
