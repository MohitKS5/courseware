-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2017 at 05:38 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codefundo`
--

-- --------------------------------------------------------

--
-- Table structure for table `addedcourses`
--

CREATE TABLE `addedcourses` (
  `userid` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addedcourses`
--

INSERT INTO `addedcourses` (`userid`, `course_id`, `semester`) VALUES
(2, 1, 1),
(2, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(10) NOT NULL,
  `institute_id` int(11) NOT NULL,
  `course_content` varchar(800) NOT NULL,
  `reference` varchar(100) NOT NULL,
  `branch` varchar(10) NOT NULL,
  `semester` int(11) NOT NULL,
  `lectures` int(11) NOT NULL,
  `labs` int(11) NOT NULL,
  `tutorials` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `institute_id`, `course_content`, `reference`, `branch`, `semester`, `lectures`, `labs`, `tutorials`) VALUES
(1, 'ESC101A', 0, 'Something which I dont understand', 'Schaums', 'All', 1, 3, 3, 1),
(2, 'CS201', 0, 'Idont know', 'Ref to that', 'cse', 3, 2, 1, 2),
(3, 'CS202', 0, 'sldjfoas', 'asdfasdf', 'cse', 3, 4, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `institutes`
--

CREATE TABLE `institutes` (
  `instituteid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `website` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `institutes`
--

INSERT INTO `institutes` (`instituteid`, `name`, `website`) VALUES
(0, 'Indian Institute of Technology, Kanpur', 'www.iitk.ac.in');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `instituteid` int(11) NOT NULL,
  `dob` date NOT NULL,
  `currsem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `email`, `instituteid`, `dob`, `currsem`) VALUES
(1, 'mohit', 'mohit', 'mohitks@iitk.ac.in', 0, '0000-00-00', 1),
(2, 'pardhu', '12345678', 'pardhu@iitk.ac.in', 0, '0000-00-00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `institutes`
--
ALTER TABLE `institutes`
  ADD PRIMARY KEY (`instituteid`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `website` (`website`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
