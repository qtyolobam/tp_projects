-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2021 at 08:58 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mithibai_kshitij`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `userid` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`userid`, `password`) VALUES
('Mithibaikshitij', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `bets`
--

CREATE TABLE `bets` (
  `betid` int(11) NOT NULL,
  `ccid` varchar(20) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `event_type` varchar(20) NOT NULL,
  `bet_point` int(10) NOT NULL,
  `result` varchar(255) NOT NULL DEFAULT 'Result Awaited'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cceventregi`
--

CREATE TABLE `cceventregi` (
  `sr` int(11) NOT NULL,
  `ccid` varchar(11) NOT NULL,
  `college_name` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `dept_name` varchar(225) NOT NULL,
  `event_name` varchar(225) NOT NULL,
  `participant_name` text NOT NULL,
  `phone_number` text NOT NULL,
  `idproof` text NOT NULL,
  `govt_id` text NOT NULL,
  `attachment` varchar(225) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending',
  `timeofregistration` datetime NOT NULL,
  `update_count` int(2) NOT NULL DEFAULT 0,
  `result` varchar(255) NOT NULL DEFAULT 'Not Announced Yet'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `cceventregi`
--
DELIMITER $$
CREATE TRIGGER `addEvent` AFTER INSERT ON `cceventregi` FOR EACH ROW insert into cc_regi_point (ccid,event_name,points) values (new.ccid, new.event_name,0)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `cclogin`
--

CREATE TABLE `cclogin` (
  `id` int(8) NOT NULL,
  `userid` varchar(20) NOT NULL,
  `collegename` varchar(255) NOT NULL,
  `email` varchar(225) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cclogin`
--

INSERT INTO `cclogin` (`id`, `userid`, `collegename`, `email`, `phone`, `password`) VALUES
(1, 'CC1', 'Mithibai College', 'madhukaraman02@gmail.com', '9323560995', '12345');

--
-- Triggers `cclogin`
--
DELIMITER $$
CREATE TRIGGER `addCC` AFTER INSERT ON `cclogin` FOR EACH ROW insert into leaderboard (college_name,college_code,points) values
(NEW.collegename,NEW.userid,0)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `cc_regi_point`
--

CREATE TABLE `cc_regi_point` (
  `sr` int(11) NOT NULL,
  `ccid` varchar(255) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `points` int(10) NOT NULL,
  `result` varchar(255) NOT NULL DEFAULT 'Result Awaited'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `dept_id` int(10) NOT NULL,
  `dept_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`dept_id`, `dept_name`) VALUES
(1, 'Performing Arts'),
(2, 'Literary Arts'),
(3, 'Creatives & Fine Arts '),
(4, 'Photography'),
(5, 'Mass Media Events'),
(6, 'Informals '),
(7, 'Gaming & Sports'),
(8, 'Business Events');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `sr` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `event_type` varchar(50) NOT NULL,
  `group_event` int(2) NOT NULL DEFAULT 0,
  `event_date` datetime DEFAULT NULL,
  `end_date` datetime NOT NULL,
  `regi_points` int(10) NOT NULL,
  `qualification` int(11) NOT NULL,
  `npr` int(11) NOT NULL,
  `npq` int(11) NOT NULL,
  `podium_1` int(11) NOT NULL,
  `podium_2` int(11) NOT NULL,
  `podium_3` int(11) NOT NULL,
  `loss` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`sr`, `event_id`, `dept_id`, `event_name`, `event_type`, `group_event`, `event_date`, `end_date`, `regi_points`, `qualification`, `npr`, `npq`, `podium_1`, `podium_2`, `podium_3`, `loss`) VALUES
(1, 1, 1, 'Mashup Singing', 'Popular', 0, '2021-12-04 16:00:00', '2021-11-26 23:59:00', 40, 80, -100, -260, 400, 360, 320, 0),
(2, 2, 1, 'Rapping', 'Others', 0, '2021-12-03 16:00:00', '2021-11-26 23:59:00', 30, 70, -80, -210, 300, 260, 220, 0),
(3, 3, 1, 'Classical singing', 'Flagship ', 0, '2021-12-05 09:00:00', '2021-11-26 23:59:00', 50, 90, -120, -310, 500, 460, 420, 0),
(4, 4, 1, 'Western Duet Singing', 'Flagship', 0, '2021-12-05 13:00:00', '2021-11-26 23:59:00', 50, 90, -120, -310, 500, 460, 420, 0),
(5, 5, 1, 'Mono Acting', 'Others', 0, '2021-11-04 13:00:00', '2021-11-26 23:59:00', 30, 70, -80, -210, 300, 260, 220, 0),
(6, 6, 1, 'Solo classical dance', 'Popular', 0, '2021-12-04 12:30:00', '2021-11-26 23:59:00', 40, 80, -100, -260, 400, 360, 320, 0),
(7, 7, 1, 'Western solo dance', 'Popular ', 0, '2021-12-03 12:00:00', '2021-11-26 23:59:00', 40, 80, -100, -260, 400, 360, 320, 0),
(8, 8, 1, 'Short video choreography', 'Others', 0, '2021-12-05 11:00:00', '2021-11-26 23:59:00', 30, 70, -80, -210, 300, 260, 220, 0),
(9, 9, 1, 'Blended', 'USP', 0, '2021-12-05 15:00:00', '2021-11-26 23:59:00', 60, 100, -140, -360, 550, 520, 0, 0),
(10, 10, 1, 'Fashion Styling Event', 'Flagship', 0, '2021-12-04 17:00:00', '2021-11-26 23:59:00', 50, 90, -120, -310, 500, 460, 420, 0),
(11, 11, 1, 'Duo play', 'Flagship ', 0, '0000-00-00 00:00:00', '2021-11-30 23:59:00', 50, 90, -120, -310, 500, 460, 420, 0),
(12, 12, 1, 'Panache', 'USP', 1, '0000-00-00 00:00:00', '2021-11-30 23:59:00', 60, 100, -140, -360, 550, 520, 0, 0),
(13, 13, 1, 'Bollywood solo singing', 'USP', 0, '2021-12-05 16:00:00', '2021-11-30 23:59:00', 60, 100, -140, -360, 550, 520, 0, 0),
(14, 14, 1, 'Hindi band event', 'Flagship', 1, '0000-00-00 00:00:00', '2021-11-30 23:59:00', 50, 90, -120, -310, 500, 460, 420, 0),
(15, 15, 1, 'Street dance', 'USP', 1, '0000-00-00 00:00:00', '2021-11-30 23:59:00', 60, 100, -140, -360, 550, 520, 0, 0),
(16, 16, 1, 'Bollywood Group Dance', 'Flagship ', 1, '0000-00-00 00:00:00', '2021-11-30 23:59:00', 50, 90, -120, -310, 500, 460, 420, 0),
(17, 1, 2, 'Character debate', 'Popular', 0, '2021-12-04 13:30:00', '2021-11-26 23:59:00', 40, 80, -100, -260, 400, 360, 320, 0),
(18, 2, 2, 'Poetry Slam', 'Flagship', 0, '2021-12-03 15:00:00', '2021-11-26 23:59:00', 50, 90, -120, -310, 500, 460, 420, 0),
(19, 3, 2, 'Word Game', 'USP', 0, '2021-12-03 09:00:00', '2021-11-26 23:59:00', 60, 100, -140, -360, 550, 520, 0, 0),
(20, 4, 2, 'Ghost Story Telling', 'Popular', 0, '2021-12-05 12:00:00', '2021-11-26 23:59:00', 40, 80, -100, -260, 400, 360, 320, 0),
(21, 5, 2, 'Just a Minute', 'Others', 0, '0000-00-00 00:00:00', '2021-11-30 23:59:00', 30, 70, -80, -210, 300, 260, 220, 0),
(22, 6, 2, 'Mock Youth Parliment', 'USP', 0, '0000-00-00 00:00:00', '2021-11-30 23:59:00', 60, 100, -140, -360, 550, 520, 0, 0),
(23, 1, 3, 'Fashion Illustration', 'USP', 0, '2021-12-04 09:00:00', '2021-11-26 23:59:00', 60, 100, -140, -360, 550, 520, 0, 0),
(24, 2, 3, 'Anime Comic Strip Making', 'Others', 0, '2021-12-05 13:00:00', '2021-11-26 23:59:00', 30, 70, -80, -210, 300, 260, 220, 0),
(25, 3, 3, 'Mandala + Quilling', 'Popular', 0, '2021-12-03 15:15:00', '2021-11-26 23:59:00', 40, 80, -100, -260, 400, 360, 320, 0),
(26, 4, 3, 'Layering art + Digital art', 'Flagship ', 0, '2021-12-03 14:00:00', '2021-11-26 23:59:00', 50, 90, -120, -310, 500, 460, 420, 0),
(27, 5, 3, 'Break The Painting', 'Flagship ', 0, '0000-00-00 00:00:00', '2021-11-30 23:59:00', 50, 90, -120, -310, 500, 460, 420, 0),
(28, 1, 4, 'Product Photography', 'Others', 0, '2021-12-15 17:30:00', '2021-11-26 23:59:00', 30, 70, -80, -210, 300, 260, 220, 0),
(29, 2, 4, 'Reflection Photography', 'Flagship', 0, '2021-12-05 16:30:00', '2021-11-26 23:59:00', 50, 90, -120, -310, 500, 460, 420, 0),
(30, 3, 4, 'Street Photography', 'USP', 0, '0000-00-00 00:00:00', '2021-11-30 23:59:00', 60, 100, -140, -360, 550, 520, 0, 0),
(31, 4, 4, 'Portrait Photography', 'Popular', 0, '0000-00-00 00:00:00', '2021-11-30 23:59:00', 40, 80, -100, -260, 400, 360, 320, 0),
(32, 1, 5, 'Short Film Making', 'Others ', 1, '2021-12-04 09:00:00', '2021-11-26 23:59:00', 30, 70, -80, -210, 300, 260, 220, 0),
(33, 2, 5, 'Ad Film Making', 'Popular', 1, '2021-12-05 09:00:00', '2021-11-26 23:59:00', 40, 80, -100, -260, 400, 360, 320, 0),
(34, 3, 5, 'Social Media Marketing', 'USP', 0, '2021-12-03 15:00:00', '2021-11-26 23:59:00', 60, 100, -140, -360, 550, 520, 0, 0),
(35, 4, 5, 'Youtube Fest', 'Popular', 0, '2021-12-03 09:00:00', '2021-11-26 23:59:00', 40, 80, -100, -260, 400, 360, 320, 0),
(36, 5, 5, 'News Reporting', 'Flagship', 0, '0000-00-00 00:00:00', '2021-11-30 23:59:00', 50, 90, -120, -310, 500, 460, 420, 0),
(37, 1, 6, 'Rj Hunt', 'Popular', 0, '2021-12-04 09:00:00', '2021-11-26 23:59:00', 40, 80, -100, -260, 400, 360, 320, 0),
(38, 2, 6, 'KBC', 'Others', 0, '2021-12-05 11:15:00', '2021-11-26 23:59:00', 30, 70, -80, -210, 300, 260, 220, 0),
(39, 3, 6, 'Mr. and Ms. Kshitij', 'Flagship', 0, '2021-12-04 14:15:00', '2021-11-26 23:59:00', 50, 90, -120, -310, 500, 460, 420, 0),
(40, 4, 6, 'Treasure Hunt', 'Others', 0, '0000-00-00 00:00:00', '2021-11-30 23:59:00', 30, 70, -80, -210, 300, 260, 220, 0),
(41, 5, 6, 'The Ultimate Challenge', 'USP', 1, '0000-00-00 00:00:00', '2021-11-30 23:59:00', 60, 100, -140, -360, 550, 520, 0, 0),
(42, 1, 7, 'Chess', 'Others', 0, '2021-12-13 09:30:00', '2021-11-26 23:59:00', 30, 70, -80, -210, 300, 260, 220, 0),
(43, 2, 7, 'BGMI', 'Others', 1, '2021-12-03 11:00:00', '2021-11-26 23:59:00', 30, 70, -80, -210, 300, 260, 220, 0),
(44, 3, 7, 'Rocket League', 'Others', 0, '2021-12-13 14:30:00', '2021-11-26 23:59:00', 30, 70, -80, -210, 300, 260, 220, 0),
(45, 4, 7, 'CSGO', 'Others', 1, '2021-12-04 09:00:00', '2021-11-26 23:59:00', 30, 70, -80, -210, 300, 260, 220, 0),
(46, 5, 7, 'Valorant', 'Popular', 1, '2021-12-14 10:30:00', '2021-11-26 23:59:00', 40, 80, -100, -260, 400, 360, 320, 0),
(47, 6, 7, 'CrossFit', 'USP', 0, '2021-12-03 08:00:00', '2021-11-26 23:59:00', 60, 100, -140, -360, 550, 520, 0, 0),
(48, 7, 7, 'FIFA\'22', 'Others', 0, '0000-00-00 00:00:00', '2021-11-30 23:59:00', 30, 70, -80, -210, 300, 260, 220, 0),
(49, 8, 7, 'Cricket', 'Popular', 1, '0000-00-00 00:00:00', '2021-11-30 23:59:00', 40, 80, -100, -260, 400, 360, 320, 0),
(50, 9, 7, 'Football', 'Popular', 1, '0000-00-00 00:00:00', '2021-11-30 23:59:00', 40, 80, -100, -260, 400, 360, 320, 0),
(51, 10, 7, 'Table Tennis', 'Flagship', 0, '0000-00-00 00:00:00', '2021-11-30 23:59:00', 50, 90, -120, -310, 500, 460, 420, 0),
(52, 11, 7, 'Pool', 'USP', 0, '0000-00-00 00:00:00', '2021-11-30 23:59:00', 60, 100, -140, -360, 550, 520, 0, 0),
(53, 12, 7, 'Kabbadi', 'USP', 1, '0000-00-00 00:00:00', '2021-11-30 23:59:00', 60, 100, -140, -360, 550, 520, 0, 0),
(54, 1, 8, 'Mockstock', 'Flagship', 0, '2021-12-03 09:00:00', '2021-11-26 23:59:00', 50, 90, -120, -310, 500, 460, 420, 0),
(55, 2, 8, 'Pitch Your Start Up', 'USP', 0, '0000-00-00 00:00:00', '2021-11-30 23:59:00', 60, 100, -140, -360, 550, 520, 0, 0),
(56, 3, 8, 'IPL Auction', 'Popular', 0, '0000-00-00 00:00:00', '2021-11-30 23:59:00', 40, 80, -100, -260, 400, 360, 320, 0);

-- --------------------------------------------------------

--
-- Table structure for table `leaderboard`
--

CREATE TABLE `leaderboard` (
  `sr` int(11) NOT NULL,
  `college_name` varchar(255) NOT NULL,
  `college_code` varchar(11) NOT NULL,
  `points` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leaderboard`
--

INSERT INTO `leaderboard` (`sr`, `college_name`, `college_code`, `points`) VALUES
(20, 'Mithibai College', 'CC1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ncpeventregi`
--

CREATE TABLE `ncpeventregi` (
  `sr` int(7) NOT NULL,
  `ncpid` varchar(20) NOT NULL,
  `dept_name` varchar(255) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `participant_name` text NOT NULL,
  `mobilenum` text NOT NULL,
  `idproof` text NOT NULL,
  `govt_id` text DEFAULT NULL,
  `attachment` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending',
  `timeofregistration` datetime NOT NULL,
  `update_count` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ncpeventregi`
--

INSERT INTO `ncpeventregi` (`sr`, `ncpid`, `dept_name`, `event_name`, `participant_name`, `mobilenum`, `idproof`, `govt_id`, `attachment`, `status`, `timeofregistration`, `update_count`) VALUES
(1, 'NCP1', '1', 'Panache', 'Aman Madhukar \nP2 : Kunal \nP3 : Hussain Shaikh \nP4 : Nikit Soni', '9323560995 \nP2 9323560995 \nP3 9323560995 \nP4 9323560995', '205310809CollegeId.jpg 720334884CollegeId.jpg 1283457801CollegeId.jpg 1864409571CollegeId.jpg', '664143019 1444426236 1510712270 1278195416 619982460 803932162 67459631 543282702 NPA1_126579665 NPA2_1160555787', 'drive.google.com/abc', 'waiting', '2021-11-15 13:15:52', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pi_regi`
--

CREATE TABLE `pi_regi` (
  `id` int(7) NOT NULL,
  `NCPID` varchar(20) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `collegename` text NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `file` text NOT NULL,
  `govt_id` text DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `cpassword` varchar(100) NOT NULL,
  `dt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pi_regi`
--

INSERT INTO `pi_regi` (`id`, `NCPID`, `fname`, `lname`, `collegename`, `email`, `phone`, `dob`, `file`, `govt_id`, `password`, `cpassword`, `dt`) VALUES
(1, 'NCP1', 'Aman', 'Madhukar', 'Mithibai College', 'madhukaraman02@gmail.com', '9323560995', '2001-10-02', '../uploads/12-35-16pm 2021-11-152096728932College Id.jpg', '../uploads/12-35-16pm 2021-11-15540064679College Id.jpg', 'password', 'password', '2021-11-15 12:35:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `bets`
--
ALTER TABLE `bets`
  ADD PRIMARY KEY (`betid`) USING BTREE,
  ADD KEY `ccid_fk3` (`ccid`),
  ADD KEY `event_name_fk3` (`event_name`);

--
-- Indexes for table `cceventregi`
--
ALTER TABLE `cceventregi`
  ADD PRIMARY KEY (`sr`),
  ADD KEY `ccid_fk` (`ccid`),
  ADD KEY `college_name_fk` (`college_name`),
  ADD KEY `event_name_fk2` (`event_name`);

--
-- Indexes for table `cclogin`
--
ALTER TABLE `cclogin`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `userid` (`userid`),
  ADD UNIQUE KEY `collegename` (`collegename`);

--
-- Indexes for table `cc_regi_point`
--
ALTER TABLE `cc_regi_point`
  ADD PRIMARY KEY (`sr`),
  ADD KEY `ccid_fk_cc_regi_point` (`ccid`),
  ADD KEY `event_name_fk_cc_regi_point` (`event_name`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`sr`) USING BTREE,
  ADD UNIQUE KEY `event_name` (`event_name`),
  ADD KEY `test` (`dept_id`);

--
-- Indexes for table `leaderboard`
--
ALTER TABLE `leaderboard`
  ADD PRIMARY KEY (`sr`),
  ADD KEY `ccid_fk2` (`college_code`),
  ADD KEY `college_name_fk2` (`college_name`);

--
-- Indexes for table `ncpeventregi`
--
ALTER TABLE `ncpeventregi`
  ADD PRIMARY KEY (`sr`),
  ADD KEY `event_name_fk` (`event_name`),
  ADD KEY `ncpid_fk` (`ncpid`);

--
-- Indexes for table `pi_regi`
--
ALTER TABLE `pi_regi`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `NCPID` (`NCPID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bets`
--
ALTER TABLE `bets`
  MODIFY `betid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cceventregi`
--
ALTER TABLE `cceventregi`
  MODIFY `sr` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cclogin`
--
ALTER TABLE `cclogin`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cc_regi_point`
--
ALTER TABLE `cc_regi_point`
  MODIFY `sr` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `sr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `leaderboard`
--
ALTER TABLE `leaderboard`
  MODIFY `sr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `ncpeventregi`
--
ALTER TABLE `ncpeventregi`
  MODIFY `sr` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pi_regi`
--
ALTER TABLE `pi_regi`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bets`
--
ALTER TABLE `bets`
  ADD CONSTRAINT `ccid_fk3` FOREIGN KEY (`ccid`) REFERENCES `cceventregi` (`ccid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `event_name_fk3` FOREIGN KEY (`event_name`) REFERENCES `cceventregi` (`event_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cceventregi`
--
ALTER TABLE `cceventregi`
  ADD CONSTRAINT `ccid_fk` FOREIGN KEY (`ccid`) REFERENCES `cclogin` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `college_name_fk` FOREIGN KEY (`college_name`) REFERENCES `cclogin` (`collegename`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `event_name_fk2` FOREIGN KEY (`event_name`) REFERENCES `events` (`event_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cc_regi_point`
--
ALTER TABLE `cc_regi_point`
  ADD CONSTRAINT `ccid_fk_cc_regi_point` FOREIGN KEY (`ccid`) REFERENCES `cclogin` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `event_name_fk_cc_regi_point` FOREIGN KEY (`event_name`) REFERENCES `events` (`event_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `test` FOREIGN KEY (`dept_id`) REFERENCES `departments` (`dept_id`);

--
-- Constraints for table `leaderboard`
--
ALTER TABLE `leaderboard`
  ADD CONSTRAINT `ccid_fk2` FOREIGN KEY (`college_code`) REFERENCES `cclogin` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `college_name_fk2` FOREIGN KEY (`college_name`) REFERENCES `cclogin` (`collegename`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ncpeventregi`
--
ALTER TABLE `ncpeventregi`
  ADD CONSTRAINT `event_name_fk` FOREIGN KEY (`event_name`) REFERENCES `events` (`event_name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ncpid_fk` FOREIGN KEY (`ncpid`) REFERENCES `pi_regi` (`NCPID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
