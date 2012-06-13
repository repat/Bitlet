USE bitlet;
DROP TABLE if exists users, files, purchases;

-- phpMyAdmin SQL Dump
-- version 3.3.10.4
-- http://www.phpmyadmin.net
--
-- Host: mysql.afdadsfdasdfdd.com
-- Generation Time: Jun 12, 2012 at 05:31 PM
-- Server version: 5.1.39
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `betabitlet`
--

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) unsigned NOT NULL,
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `files`
--


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

--
-- Dumping data for table `purchases`
--


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
  `email_settings` enum('none','daily','weekly') NOT NULL COMMENT 'how often we should email them',
  `settings` text NOT NULL COMMENT 'Settings in JSON',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `users`
--
