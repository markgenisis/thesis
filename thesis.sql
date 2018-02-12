-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2018 at 01:23 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thesis`
--

-- --------------------------------------------------------

--
-- Table structure for table `activeyear`
--

CREATE TABLE `activeyear` (
  `id` int(10) UNSIGNED NOT NULL,
  `yearRange` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activeyear`
--

INSERT INTO `activeyear` (`id`, `yearRange`) VALUES
(1, '2017-2018');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(3) NOT NULL,
  `paneld` int(3) NOT NULL,
  `researchId` int(3) NOT NULL,
  `comment` text NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `course` varchar(255) NOT NULL,
  `courseCode` varchar(10) NOT NULL,
  `descipline` int(3) NOT NULL,
  `dateAdded` varchar(255) NOT NULL,
  `dateModefied` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course`, `courseCode`, `descipline`, `dateAdded`, `dateModefied`) VALUES
(1, 'Information Technology', 'BSIT', 1, '1518063372', ''),
(2, 'Computer Engineering', 'BSCpE', 2, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(3) NOT NULL,
  `deptName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `deptName`) VALUES
(1, 'CESD'),
(2, 'NHSD'),
(3, 'TeEd'),
(4, 'Ted');

-- --------------------------------------------------------

--
-- Table structure for table `descipline`
--

CREATE TABLE `descipline` (
  `id` int(3) NOT NULL,
  `dept_id` int(3) NOT NULL,
  `descipline` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `descipline`
--

INSERT INTO `descipline` (`id`, `dept_id`, `descipline`) VALUES
(1, 1, 'ITE'),
(2, 1, 'Eng');

-- --------------------------------------------------------

--
-- Table structure for table `panels`
--

CREATE TABLE `panels` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(2) NOT NULL,
  `researchId` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `panels`
--

INSERT INTO `panels` (`id`, `name`, `designation`, `researchId`) VALUES
(1, '22', '4', '1'),
(2, '23', '3', '1'),
(3, '24', '3', '1'),
(4, '26', '4', '2'),
(5, '27', '3', '2'),
(6, '28', '3', '2');

-- --------------------------------------------------------

--
-- Table structure for table `proponents`
--

CREATE TABLE `proponents` (
  `id` int(11) UNSIGNED NOT NULL,
  `researchId` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proponents`
--

INSERT INTO `proponents` (`id`, `researchId`, `name`) VALUES
(1, '1', 'Abby'),
(2, '1', 'Love'),
(3, '1', 'Franky'),
(4, '2', 'Me'),
(5, '2', 'Myself'),
(6, '2', 'I');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) UNSIGNED NOT NULL,
  `researchId` varchar(20) NOT NULL,
  `criteriaId` varchar(20) NOT NULL,
  `rubricId` varchar(20) NOT NULL,
  `panelId` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `rating` varchar(5) NOT NULL,
  `dateOfRating` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `researchId`, `criteriaId`, `rubricId`, `panelId`, `type`, `rating`, `dateOfRating`) VALUES
(1, '2', '3', '2', '25', '1', '80', '1518140828'),
(2, '2', '4', '2', '25', '1', '80', '1518140828');

-- --------------------------------------------------------

--
-- Table structure for table `researches`
--

CREATE TABLE `researches` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `course_id` varchar(10) NOT NULL,
  `adviserId` varchar(20) NOT NULL,
  `schoolYear` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `researches`
--

INSERT INTO `researches` (`id`, `title`, `description`, `course_id`, `adviserId`, `schoolYear`) VALUES
(2, 'AROS', '<p>asdasd</p>', '1', '25', '2017-2018');

-- --------------------------------------------------------

--
-- Table structure for table `rubrics`
--

CREATE TABLE `rubrics` (
  `id` int(10) UNSIGNED NOT NULL,
  `template_name` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `max_rating` varchar(3) NOT NULL,
  `res_prof_id` varchar(10) NOT NULL,
  `date_added` varchar(255) NOT NULL,
  `date_modified` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rubrics`
--

INSERT INTO `rubrics` (`id`, `template_name`, `description`, `max_rating`, `res_prof_id`, `date_added`, `date_modified`) VALUES
(1, 'asdas', '<p>asdasd', '100', '20', '1518096107', ''),
(2, 'Sample Rubs', '<p>asdas', '100', '20', '1518096263', '');

-- --------------------------------------------------------

--
-- Table structure for table `rubric_criteria`
--

CREATE TABLE `rubric_criteria` (
  `id` int(10) UNSIGNED NOT NULL,
  `rubric_id` varchar(10) NOT NULL,
  `criteria` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `percentage` int(30) NOT NULL,
  `order` varchar(3) NOT NULL,
  `date_added` varchar(255) NOT NULL,
  `date_modified` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rubric_criteria`
--

INSERT INTO `rubric_criteria` (`id`, `rubric_id`, `criteria`, `description`, `percentage`, `order`, `date_added`, `date_modified`) VALUES
(3, '2', 'Design', 'asdasd', 40, '1', '1518096263', ''),
(4, '2', 'System', 'sadsa', 60, '2', '1518096263', '');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(10) UNSIGNED NOT NULL,
  `researchId` varchar(20) NOT NULL,
  `venue` varchar(255) NOT NULL,
  `defenseType` varchar(10) NOT NULL,
  `rubricId` varchar(20) NOT NULL,
  `dateSchedule` varchar(50) NOT NULL,
  `dateAdded` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `researchId`, `venue`, `defenseType`, `rubricId`, `dateSchedule`, `dateAdded`, `status`) VALUES
(2, '2', 'CESD', '1', '2', '02/11/2018 9:00 PM', '1518099782', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(10) NOT NULL,
  `descipline` int(3) NOT NULL,
  `date_added` varchar(255) NOT NULL,
  `date_modified` varchar(255) NOT NULL,
  `deptID` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `middle_name`, `last_name`, `username`, `password`, `user_type`, `descipline`, `date_added`, `date_modified`, `deptID`) VALUES
(1, 'Admin', 'Admin', 'Admin', 'admin', 'admin', '1', 0, '----', '----', 1),
(20, 'Romulus', '', 'Callos', 'rCallos', 'rCallos', '2', 1, '1518062451', '', 1),
(14, 'Super', '', 'Admin', 'sAdmin', 'sAdmin', '0', 0, '', '', 1),
(18, 'Jenlo', ' ', 'Diamse', 'cesd', 'cesd', '1', 0, '1518060584', '', 1),
(26, 'Franky', '', 'Samaniego', 'franky', 'samaniego', '', 1, '1518098312', '', 1),
(25, 'Mark Genisis', '', 'Sabilla', 'mark', 'sabilla', '', 1, '1518098078', '', 1),
(27, 'Kiko', '', 'Sabilla', 'kiko', 'sabilla', '', 1, '1518098438', '', 1),
(28, 'Sample', '', 'Sample', 'sample', 'sample', '', 1, '1518099705', '', 1),
(29, 'Richard', '', 'Colasito', 'chard', 'chard', '2', 2, '1518103935', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activeyear`
--
ALTER TABLE `activeyear`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `descipline`
--
ALTER TABLE `descipline`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `panels`
--
ALTER TABLE `panels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proponents`
--
ALTER TABLE `proponents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `researches`
--
ALTER TABLE `researches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rubrics`
--
ALTER TABLE `rubrics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rubric_criteria`
--
ALTER TABLE `rubric_criteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activeyear`
--
ALTER TABLE `activeyear`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `descipline`
--
ALTER TABLE `descipline`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `panels`
--
ALTER TABLE `panels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `proponents`
--
ALTER TABLE `proponents`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `researches`
--
ALTER TABLE `researches`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `rubrics`
--
ALTER TABLE `rubrics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `rubric_criteria`
--
ALTER TABLE `rubric_criteria`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
