-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2023 at 07:35 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lab`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `ass_id` int(5) NOT NULL,
  `due_date` varchar(24) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `topic` varchar(100) NOT NULL,
  `t_doc` varchar(50) DEFAULT NULL,
  `t_upload_des` varchar(400) DEFAULT NULL,
  `date_assi` varchar(15) DEFAULT NULL,
  `view` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `assistant`
--

CREATE TABLE `assistant` (
  `as_id` int(4) NOT NULL,
  `as_name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pwd` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assistant`
--

INSERT INTO `assistant` (`as_id`, `as_name`, `email`, `pwd`) VALUES
(3, 'Assistant', 'assistant@mcaucc', '123');

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `doc_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `doc_name` varchar(40) NOT NULL,
  `submission_date` varchar(10) NOT NULL,
  `v_status` varchar(25) NOT NULL,
  `ass_id` int(11) DEFAULT NULL,
  `comment` varchar(50) DEFAULT NULL,
  `remarks` varchar(40) DEFAULT NULL,
  `no_of_pages` int(4) NOT NULL,
  `print_status` varchar(20) NOT NULL DEFAULT 'not printed',
  `collect_status` varchar(20) NOT NULL DEFAULT 'not collected',
  `collect_date` varchar(10) DEFAULT NULL,
  `v_date` varchar(10) DEFAULT NULL,
  `col_as_id` int(4) DEFAULT NULL,
  `pay_status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment_fail`
--

CREATE TABLE `payment_fail` (
  `pay_id` int(6) NOT NULL,
  `doc_id` int(6) NOT NULL,
  `step` varchar(30) NOT NULL,
  `reason` varchar(30) NOT NULL,
  `description` varchar(30) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment_success`
--

CREATE TABLE `payment_success` (
  `pay_id` varchar(100) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `pay_date` date NOT NULL,
  `amt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `print_doc`
--

CREATE TABLE `print_doc` (
  `print_id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `print_date` varchar(20) NOT NULL,
  `as_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `s_id` int(4) NOT NULL,
  `s_name` varchar(25) NOT NULL,
  `email` varchar(40) NOT NULL,
  `adm_no` int(5) NOT NULL,
  `mob1` bigint(10) NOT NULL,
  `batch` varchar(7) NOT NULL,
  `yoa` int(4) NOT NULL,
  `pwd` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `sub_id` int(4) NOT NULL,
  `sub_name` varchar(20) NOT NULL,
  `des` varchar(100) NOT NULL,
  `t_id` int(11) NOT NULL,
  `batch` varchar(40) NOT NULL,
  `yoa` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `t_id` int(4) NOT NULL,
  `t_name` varchar(20) NOT NULL,
  `t_email` varchar(30) NOT NULL,
  `t_mob` bigint(10) NOT NULL,
  `pwd` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`t_id`, `t_name`, `t_email`, `t_mob`, `pwd`) VALUES
(7, 'Sherna Mohan', 'hod', 3434, '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`ass_id`);

--
-- Indexes for table `assistant`
--
ALTER TABLE `assistant`
  ADD PRIMARY KEY (`as_id`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `payment_fail`
--
ALTER TABLE `payment_fail`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `payment_success`
--
ALTER TABLE `payment_success`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `print_doc`
--
ALTER TABLE `print_doc`
  ADD PRIMARY KEY (`print_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`t_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `ass_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `assistant`
--
ALTER TABLE `assistant`
  MODIFY `as_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `print_doc`
--
ALTER TABLE `print_doc`
  MODIFY `print_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `s_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7785;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `sub_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `t_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
