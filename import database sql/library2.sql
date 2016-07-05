-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2016 at 01:48 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `library2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `aid` char(10) NOT NULL,
  `password` char(45) DEFAULT NULL,
  `aname` char(45) DEFAULT NULL,
  `phone` char(11) DEFAULT NULL COMMENT 'Flex Library Application by JihadDocker',
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `password`, `aname`, `phone`) VALUES
('admin', 'admin', 'Jii Saaduddin', '09099514740');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `bid` char(10) NOT NULL COMMENT 'Flex Library Application by JihadDocker',
  `category` char(15) DEFAULT NULL COMMENT 'Flex Library Application by JihadDocker',
  `bname` char(45) DEFAULT NULL COMMENT 'Flex Library Application by JihadDocker',
  `publisher` char(45) DEFAULT NULL COMMENT 'Flex Library Application by JihadDocker',
  `year` char(4) DEFAULT NULL COMMENT 'Flex Library Application by JihadDocker',
  `author` char(45) DEFAULT NULL COMMENT 'Flex Library Application by JihadDocker',
  `price` decimal(10,2) DEFAULT NULL COMMENT 'Flex Library Application by JihadDocker',
  `total` int(11) DEFAULT NULL COMMENT 'Flex Library Application by JihadDocker',
  `stock` int(11) DEFAULT NULL COMMENT 'Flex Library Application by JihadDocker',
  `lastreturn` timestamp NULL DEFAULT NULL COMMENT 'Flex Library Application by JihadDocker',
  PRIMARY KEY (`bid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`bid`, `category`, `bname`, `publisher`, `year`, `author`, `price`, `total`, `stock`, `lastreturn`) VALUES
('00005', 'History', 'Humans of New York', 'St Martins Press', '2014', 'waldiex', '186.00', 1, 1, '2016-06-12 01:12:34'),
('00011', 'Mathematics', 'Linear Algebra Fundamentals', 'Princeton Review', '1997', 'Jam', '425.11', 3, 2, '2016-06-12 01:12:34');

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE IF NOT EXISTS `card` (
  `cid` char(10) NOT NULL COMMENT 'Flex Library Application by JihadDocker',
  `cname` char(45) DEFAULT NULL COMMENT 'Flex Library Application by JihadDocker',
  `department` char(45) DEFAULT NULL COMMENT 'Flex Library Application by JihadDocker',
  `type` char(10) DEFAULT NULL COMMENT 'Flex Library Application by JihadDocker',
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`cid`, `cname`, `department`, `type`) VALUES
('3130000054', 'Dex', 'IT Department', 'Student'),
('3130000055', 'Dexter', 'IT Department', 'Student'),
('3130000056', 'Dexter2', 'IT Department', 'Student'),
('3130000057', 'Jii', 'IT Department', 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE IF NOT EXISTS `record` (
  `bid` char(10) NOT NULL COMMENT 'Flex Library Application by JihadDocker',
  `cid` char(10) NOT NULL COMMENT 'Flex Library Application by JihadDocker',
  `aid` char(10) NOT NULL COMMENT 'Flex Library Application by JihadDocker',
  `bdate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Flex Library Application by JihadDocker',
  `due` timestamp NULL DEFAULT NULL COMMENT 'Flex Library Application by JihadDocker',
  PRIMARY KEY (`bid`,`cid`,`aid`,`bdate`),
  KEY `f1_idx` (`aid`),
  KEY `f3_idx` (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `record`
--
ALTER TABLE `record`
  ADD CONSTRAINT `f1` FOREIGN KEY (`aid`) REFERENCES `admin` (`aid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `f2` FOREIGN KEY (`bid`) REFERENCES `book` (`bid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `f3` FOREIGN KEY (`cid`) REFERENCES `card` (`cid`) ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
