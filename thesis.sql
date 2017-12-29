-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 29, 2017 at 01:45 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `thesis`
--
CREATE DATABASE `thesis` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `thesis`;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `course` varchar(255) NOT NULL,
  `courseCode` varchar(10) NOT NULL,
  `dateAdded` varchar(255) NOT NULL,
  `dateModefied` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course`, `courseCode`, `dateAdded`, `dateModefied`) VALUES
(1, 'Bachelor Of Science in Computer Science', 'BSCS', '1514510500', '');

-- --------------------------------------------------------

--
-- Table structure for table `rubric_criteria`
--

CREATE TABLE IF NOT EXISTS `rubric_criteria` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rubric_id` varchar(10) NOT NULL,
  `criteria` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `order` varchar(3) NOT NULL,
  `date_added` varchar(255) NOT NULL,
  `date_modified` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `rubric_criteria`
--

INSERT INTO `rubric_criteria` (`id`, `rubric_id`, `criteria`, `description`, `order`, `date_added`, `date_modified`) VALUES
(3, '11', 'Design', 'To be able to understand the design of the system', '1', '1514386048', ''),
(4, '11', 'Coding', 'Checking proper implementation of codes', '1', '1514386048', ''),
(5, '12', 'Temp 2 1st Criteria', 'asdasd', '1', '1514428345', ''),
(6, '12', 'Temp 2 2nd Criteria', 'asdasd', '1', '1514428345', ''),
(7, '13', 'Design', 'asdasd', '1', '1514428507', ''),
(8, '14', '1', '2', '1', '1514428856', ''),
(9, '14', '1', '2', '3', '1514428856', '');

-- --------------------------------------------------------

--
-- Table structure for table `rubrics`
--

CREATE TABLE IF NOT EXISTS `rubrics` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `template_name` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `max_rating` varchar(3) NOT NULL,
  `res_prof_id` varchar(10) NOT NULL,
  `date_added` varchar(255) NOT NULL,
  `date_modified` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `rubrics`
--

INSERT INTO `rubrics` (`id`, `template_name`, `description`, `max_rating`, `res_prof_id`, `date_added`, `date_modified`) VALUES
(11, 'Template', '<p>asdasda</p>', '100', '2', '1514386048', ''),
(12, 'Template 2', '<p>Template 2 Description</p>', '100', '2', '1514428345', ''),
(13, 'Tem 3', '<p>asjdh</p>', '100', '2', '1514428507', ''),
(14, 'Temp 4', '<p>asdad</p>', '100', '2', '1514428856', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(10) NOT NULL,
  `date_added` varchar(255) NOT NULL,
  `date_modified` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `middle_name`, `last_name`, `username`, `password`, `user_type`, `date_added`, `date_modified`) VALUES
(1, 'Admin', 'Admin', 'Admin', 'admin', 'admin', '1', '----', '----'),
(2, 'Franky', 'Seletaria', 'Samaniego', 'fsamaniego', '123456', '2', '1512217334', ''),
(3, 'Wilson', 'Seletaria', 'Samaniego', 'wsamaniego', '123456', '2', '1512217776', ''),
(4, 'Richard', 'R.', 'Colasito', 'richardColasito', 'balasubas', '3', '1512658426', ''),
(5, 'Jenlo', 'B.', 'Diamse', 'jenloDiamse', 'diamse', '4', '1512682139', ''),
(6, 'Jerry ', 'B.', 'Agsunod', 'jerryAgsunod', '0123456', '3', '1512715831', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
