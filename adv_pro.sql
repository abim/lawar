-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2013 at 11:32 PM
-- Server version: 5.5.29
-- PHP Version: 5.3.15

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `adv_pro`
--

-- --------------------------------------------------------

--
-- Table structure for table `codebank`
--

CREATE TABLE IF NOT EXISTS `codebank` (
  `id_hash` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  `node` varchar(50) NOT NULL,
  PRIMARY KEY (`id_hash`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `id_company` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `detail` text NOT NULL,
  PRIMARY KEY (`id_company`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gadget_brand`
--

CREATE TABLE IF NOT EXISTS `gadget_brand` (
  `id_brand` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `logo` tinyint(1) unsigned NOT NULL,
  `hit` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id_brand`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gadget_product`
--

CREATE TABLE IF NOT EXISTS `gadget_product` (
  `id_product` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  `seri` varchar(50) NOT NULL,
  `id_brand` bigint(20) unsigned NOT NULL,
  `name` varchar(200) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `desc` text NOT NULL,
  `release` date NOT NULL,
  `itemfamily` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id_product`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gadget_seri`
--

CREATE TABLE IF NOT EXISTS `gadget_seri` (
  `id_seri` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `id_brand` bigint(20) unsigned NOT NULL,
  `id_family` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_seri`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gadget_taxonomy`
--

CREATE TABLE IF NOT EXISTS `gadget_taxonomy` (
  `id_taxonomy` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `desc` text NOT NULL,
  `option` varchar(255) NOT NULL,
  `count` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id_taxonomy`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` mediumint(5) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `userpass` varchar(50) NOT NULL,
  `usernick` varchar(100) NOT NULL,
  `session` varchar(32) NOT NULL,
  `email` varchar(100) NOT NULL,
  `lastlog` int(10) unsigned NOT NULL,
  `nowlog` int(10) unsigned NOT NULL,
  `ip` varchar(100) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL,
  `hit` int(10) unsigned NOT NULL,
  `level` varchar(50) NOT NULL,
  `pwchange` int(10) unsigned NOT NULL,
  `created` int(10) unsigned NOT NULL,
  `option` text NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `userpass`, `usernick`, `session`, `email`, `lastlog`, `nowlog`, `ip`, `status`, `hit`, `level`, `pwchange`, `created`, `option`) VALUES
(1, 'admin', '28c8edde3d61a0411511d3b1866f0636', 'Bima', '', 'bima@abimanyu.net', 1364534961, 1364538736, '127.0.0.1', 1, 1, 'admin', 1332965491, 1323005144, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
