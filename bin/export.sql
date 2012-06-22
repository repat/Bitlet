USE bitlet;
DROP TABLE if exists users, files, purchases;

-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: internal-db.s150773.gridserver.com
-- Generation Time: Jun 22, 2012 at 11:16 AM
-- Server version: 5.1.61-rel13.2
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db150773_bitlet_production`
--

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) unsigned NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `name` tinytext NOT NULL COMMENT 'display name',
  `description` text NOT NULL COMMENT 'file description limited to 500 chars',
  `type` enum('generic','photo','music','digiart','document','video') NOT NULL,
  `param` text NOT NULL COMMENT 'file type parameters that will be parsed via parse_str() in php',
  `size` int(11) NOT NULL DEFAULT '0' COMMENT 'file size in bytes',
  `price` double NOT NULL DEFAULT '2',
  `earned` double NOT NULL DEFAULT '0' COMMENT 'How much money made so far',
  `views` int(11) unsigned NOT NULL DEFAULT '0',
  `shares` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'Number of twitter/fb shares',
  `downloads` int(11) unsigned NOT NULL DEFAULT '0',
  `file_name` tinytext NOT NULL COMMENT 'name of the actual file',
  `url` tinytext NOT NULL,
  `thumb_url` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `uid`, `deleted`, `name`, `description`, `type`, `param`, `size`, `price`, `earned`, `views`, `shares`, `downloads`, `file_name`, `url`, `thumb_url`) VALUES
(1, 1, 0, 'AlbumArt {C17F1693-6843-44DE-BDAB-BBD35142CEBD} Large', '<br>', 'photo', '', 33203, 2, 0, 1, 0, 0, 'AlbumArt_{C17F1693-6843-44DE-BDAB-BBD35142CEBD}_Large.jpg', '', 'data/1/1');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE IF NOT EXISTS `purchases` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fid` int(11) unsigned NOT NULL,
  `uid` int(11) unsigned NOT NULL,
  `amount_paid` double NOT NULL,
  `time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fbid` int(11) unsigned NOT NULL,
  `name` tinytext NOT NULL COMMENT 'display name',
  `email` tinytext NOT NULL,
  `password` text NOT NULL COMMENT 'sh1() hashed',
  `salt` tinytext NOT NULL COMMENT 'for password',
  `session` tinytext NOT NULL COMMENT 'used for autologin',
  `credits` double NOT NULL,
  `new_user` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'every user is new by default',
  `is_affiliate` tinyint(1) NOT NULL DEFAULT '0',
  `phone` tinytext NOT NULL COMMENT 'phone number',
  `email_settings` text NOT NULL COMMENT 'email settings, stored in parse_str format',
  `profile_img` text NOT NULL COMMENT 'URL to profile thumb, should be square image',
  `bio` text NOT NULL COMMENT 'bio of user',
  `website` text NOT NULL COMMENT 'user website',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
