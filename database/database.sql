-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Server version: 5.1.30
-- PHP Version: 5.2.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `signup_date` varchar(100) NOT NULL,
  `signup_ip` varchar(100) NOT NULL,
  `banned` enum('0','1') NOT NULL,
  `active` enum('0','1') NOT NULL,
  `is_admin` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `username`, `email`, `password`, `signup_date`, `signup_ip`, `banned`, `active`, `is_admin`) VALUES
(1, 'admin', 'admin@yoursite.com', 'f865b53623b121fd34ee5426c792e5c33af8c227', '1252540298', '87.194.144.74', '0', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `short_urls`
--

CREATE TABLE IF NOT EXISTS `short_urls` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `long_url` longtext NOT NULL,
  `url_id` varchar(100) NOT NULL,
  `url_hits` int(11) NOT NULL,
  `owner` int(11) NOT NULL,
  `screenshot` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `short_urls`
--

