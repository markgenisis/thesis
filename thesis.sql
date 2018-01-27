-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2018 at 07:16 AM
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
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `course` varchar(255) NOT NULL,
  `courseCode` varchar(10) NOT NULL,
  `dateAdded` varchar(255) NOT NULL,
  `dateModefied` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course`, `courseCode`, `dateAdded`, `dateModefied`) VALUES
(1, 'Bachelor Of Science in Computer Science', 'BSCS', '1514510500', '');

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
(2, 'NHSD');

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
(21, '6', '3', '8'),
(20, '6', '3', '7'),
(19, '4', '3', '7'),
(18, '4', '4', '7'),
(22, '6', '4', '10'),
(23, '6', '3', '10'),
(24, '4', '3', '10');

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
(16, '7', 'Doctor Doctor'),
(15, '7', 'Jerry B. Agsunod'),
(14, '7', 'Richard Colasito'),
(17, '10', 'Gen');

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
(9, 'asdasd', 'asdas', '4', '3', '2017-2018'),
(7, 'AROS', '<ul><li>asdhgaks djasd</li><li>asd</li><li>a</li><li>sd</li><li>as</li><li>da</li><li>sd</li></ul>', '1', '5', '2017-2018'),
(8, 'asda s', 'asd asd', '4', '5', '2017-2018'),
(10, 'Multi Events', '<p>asada', '1', '5', '2017-2018');

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
(11, 'Template', '<p>asdasda</p>', '100', '2', '1514386048', ''),
(12, 'Template 2', '<p>Template 2 Description</p>', '100', '2', '1514428345', ''),
(13, 'Tem 3', '<p>asjdh</p>', '100', '2', '1514428507', ''),
(14, 'Temp 4', '<p>asdad</p>', '100', '2', '1514428856', '');

-- --------------------------------------------------------

--
-- Table structure for table `rubric_criteria`
--

CREATE TABLE `rubric_criteria` (
  `id` int(10) UNSIGNED NOT NULL,
  `rubric_id` varchar(10) NOT NULL,
  `criteria` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `order` varchar(3) NOT NULL,
  `date_added` varchar(255) NOT NULL,
  `date_modified` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
(1, '7', '', '2', '', 'January 21, 2018 10:30 AM', '', ''),
(2, '8', '', '2', '', 'January 24, 2018 2:00 PM', '', ''),
(3, '10', 'CESD', '2', '12', '01/26/2018 1:07 PM', '1516939656', '0');

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
  `date_added` varchar(255) NOT NULL,
  `date_modified` varchar(255) NOT NULL,
  `deptID` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `middle_name`, `last_name`, `username`, `password`, `user_type`, `date_added`, `date_modified`, `deptID`) VALUES
(1, 'Admin', 'Admin', 'Admin', 'admin', 'admin', '1', '----', '----', 1),
(2, 'Franky', 'Seletaria', 'Samaniego', 'fsamaniego', '123456', '2', '1512217334', '', 1),
(3, 'Wilson', 'Seletaria', 'Samaniego', 'wsamaniego', '123456', '2', '1512217776', '', 1),
(4, 'Richard', 'R.', 'Colasito', 'richardColasito', 'balasubas', '3', '1512658426', '', 1),
(5, 'Jenlo', 'B.', 'Diamse', 'jenloDiamse', 'diamse', '4', '1512682139', '', 1),
(6, 'Jerry ', 'B.', 'Agsunod', 'jerryAgsunod', '0123456', '3', '1512715831', '', 1),
(11, 'Mark Genisis', 'Sanorjo', 'Sabilla', 'markgenz', 'sabilla', '2', '1517029583', '', 1),
(13, 'Mark', '', 'Sabilla', 'genz', 'sabilla', '3', '1517029744', '', 1),
(14, 'Super', '', 'Admin', 'sAdmin', 'sAdmin', '0', '', '', 1),
(17, 'asdasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', '3', '1517033499', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activeyear`
--
ALTER TABLE `activeyear`
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
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `panels`
--
ALTER TABLE `panels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `proponents`
--
ALTER TABLE `proponents`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `researches`
--
ALTER TABLE `researches`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `rubrics`
--
ALTER TABLE `rubrics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `rubric_criteria`
--
ALTER TABLE `rubric_criteria`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
