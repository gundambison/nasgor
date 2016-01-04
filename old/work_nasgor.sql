-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 16, 2013 at 10:35 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `work_nasgor`
--

-- --------------------------------------------------------

--
-- Table structure for table `kurs`
--

CREATE TABLE IF NOT EXISTS `kurs` (
  `k_id` int(11) NOT NULL AUTO_INCREMENT,
  `k_code` varchar(30) NOT NULL,
  `k_name` varchar(30) NOT NULL,
  `k_date` date NOT NULL,
  `k_detail` text NOT NULL,
  PRIMARY KEY (`k_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `kurs`
--

INSERT INTO `kurs` (`k_id`, `k_code`, `k_name`, `k_date`, `k_detail`) VALUES
(1, 'USD', 'US DOLLAR', '2013-11-16', '{"buy":"11450","sale":"11750"}'),
(2, 'JPY', 'JEPANG YEN', '2013-11-16', '{"buy":"113.71","sale":"117.65"}'),
(3, 'HKD', 'HONGKONG DOLAR', '2013-11-16', '{"buy":"1512.00","sale":"1480.10"}');

-- --------------------------------------------------------

--
-- Table structure for table `kurs_log`
--

CREATE TABLE IF NOT EXISTS `kurs_log` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `log_detail` text NOT NULL,
  `log_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
