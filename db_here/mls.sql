-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2022 at 03:25 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mls`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(20) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `mname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `position` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `fname`, `mname`, `lname`, `position`) VALUES
(1, 'admin', '$2y$10$37pjHhCnoWw5HxG0bXjruOxCLSGcPtasYk6COa3./xOGrNWGFxjjC', 'Admin', '', '', 'Admin'),
(8, '123123', '$2y$10$6AIU9zjgnR2j1QOfNumU9ua7nMODrdovIAsMDNQpMtcpF7suJcQuy', '123123', '123123', '123123', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `analytic`
--

CREATE TABLE `analytic` (
  `analytic_id` int(20) NOT NULL,
  `analytic_info` varchar(200) NOT NULL,
  `analytic_user` varchar(200) NOT NULL,
  `analytic_date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `analytic`
--

INSERT INTO `analytic` (`analytic_id`, `analytic_info`, `analytic_user`, `analytic_date`) VALUES
(3, 'Student Login', '29', 'July 19,2021 12:09:07 PM'),
(12, 'View Topic: try lang po 1111', '29', 'July 19,2021 12:17:07 PM'),
(19, 'Student Comment at try lang po 1111', '29', 'July 19,2021 12:23:07 PM'),
(20, 'Student Deleted a Comment at try lang po 1111', '29', 'July 19,2021 12:23:07 PM'),
(24, 'Student Update a Comment at try lang po 1111', '29', 'July 19,2021 12:30:07 PM'),
(25, 'Student Deleted a Comment at try lang po 1111', '29', 'July 19,2021 12:31:07 PM'),
(26, 'Student Deleted a Comment at try lang po 1111', '29', 'July 19,2021 12:31:07 PM'),
(27, 'Student Logout', '29', 'July 19,2021 06:43:07 AM'),
(28, 'Student Login', '29', 'July 19,2021 01:20:07 PM'),
(29, 'Student Logout', '29', 'July 19,2021 09:07:07 AM'),
(30, 'Student Login', '29', 'July 21,2021 06:52:07 PM'),
(31, 'View Topic: try lang po 1111', '29', 'July 21,2021 06:55:07 PM'),
(32, 'View Topic: try lang po 1111', '29', 'July 21,2021 07:00:07 PM'),
(33, 'Student Delete Question at try lang po 1111', '29', 'July 21,2021 07:09:07 PM'),
(34, 'Student Ask A Question at try lang po 1111', '29', 'July 21,2021 07:10:07 PM'),
(35, 'Student Update a Question at try lang po 1111', '29', 'July 21,2021 07:16:07 PM'),
(36, 'Student Ask A Question at try lang po 1111', '29', 'July 21,2021 07:16:07 PM'),
(37, 'Student Delete Question at try lang po 1111', '29', 'July 21,2021 07:16:07 PM'),
(38, 'Student Update a Question at try lang po 1111', '29', 'July 21,2021 07:17:07 PM'),
(39, 'View Topic: try lang po 1111', '30', 'July 21,2021 07:20:07 PM'),
(40, 'View Topic: try lang po 1111', '30', 'July 21,2021 07:21:07 PM'),
(41, 'View Topic: try lang po 1111', '30', 'July 21,2021 07:21:07 PM'),
(42, 'View Topic: try lang po 1111', '30', 'July 21,2021 07:42:07 PM'),
(43, 'View Topic: try lang po 1111', '29', 'July 21,2021 07:42:07 PM'),
(44, 'Student Ask A Question at try lang po 1111', '29', 'July 21,2021 07:44:07 PM'),
(45, 'Student Delete Question at try lang po 1111', '29', 'July 21,2021 07:51:07 PM'),
(46, 'Student Logout', '29', 'July 21,2021 01:52:07 PM'),
(47, 'View Topic: try lang po 1111', '31', 'July 30,2021 06:53:07 PM'),
(48, 'Student Login', '32', 'July 30,2021 07:20:07 PM'),
(49, 'Student Logout', '32', 'July 30,2021 01:20:07 PM'),
(50, 'Student Login', '33', 'July 30,2021 07:58:07 PM'),
(51, 'View Topic: 312312312', '33', 'July 30,2021 07:59:07 PM'),
(52, 'View Topic: 312312312', '33', 'July 30,2021 07:59:07 PM'),
(53, 'View Topic: 312312312', '33', 'July 30,2021 07:59:07 PM'),
(54, 'Student Post A New Comment at 312312312', '33', 'July 30,2021 08:03:07 PM'),
(55, 'Student Logout', '33', 'July 30,2021 02:03:07 PM'),
(56, 'Student Login', '32', 'July 30,2021 08:03:07 PM'),
(57, 'View Topic: try lang po 1111', '32', 'July 30,2021 08:03:07 PM'),
(58, 'View Topic: 312312312', '32', 'July 30,2021 08:09:07 PM'),
(59, 'Student Ask A Question at 312312312', '32', 'July 30,2021 08:15:07 PM'),
(60, 'View Topic: try lang po 1111', '32', 'July 30,2021 08:19:07 PM'),
(61, 'View Topic: try lang po 1111', '32', 'July 30,2021 08:19:07 PM'),
(62, 'View Topic: 312312312', '32', 'July 30,2021 08:27:07 PM'),
(63, 'View Topic: try lang po 1111', '32', 'July 30,2021 08:43:07 PM'),
(64, 'Student Logout', '32', 'July 30,2021 03:03:07 PM'),
(65, 'Student Login', '32', 'July 30,2021 09:46:07 PM'),
(66, 'View Topic: 1231231', '32', 'July 30,2021 09:46:07 PM'),
(67, 'Student Logout', '32', 'July 30,2021 05:10:07 PM'),
(68, 'Student Login', '32', 'August 01,2021 11:41:08 AM'),
(69, 'View Topic: asdsad', '32', 'August 01,2021 11:47:08 AM'),
(70, 'View Topic: 312312312', '32', 'August 01,2021 11:47:08 AM'),
(71, 'Student Ask A Question at 312312312', '32', 'August 01,2021 11:47:08 AM'),
(72, 'Student Ask A Question at 312312312', '32', 'August 01,2021 11:49:08 AM'),
(73, 'Student Delete Question at 312312312', '32', 'August 01,2021 11:50:08 AM'),
(74, 'Student Delete Question at 312312312', '32', 'August 01,2021 11:50:08 AM'),
(75, 'Student Ask A Question at 312312312', '32', 'August 01,2021 11:50:08 AM'),
(76, 'Student Ask A Question at 312312312', '32', 'August 01,2021 11:51:08 AM'),
(77, 'Student Delete Question at 312312312', '32', 'August 01,2021 11:51:08 AM'),
(78, 'Student Ask A Question at 312312312', '32', 'August 01,2021 12:22:08 PM'),
(79, 'Student Delete Question at 312312312', '32', 'August 01,2021 12:22:08 PM'),
(80, 'Student Delete Question at 312312312', '32', 'August 01,2021 12:22:08 PM'),
(81, 'Student Delete Question at 312312312', '32', 'August 01,2021 12:22:08 PM'),
(82, 'Student Ask A Question at 312312312', '32', 'August 01,2021 12:30:08 PM'),
(83, 'Student Ask A Question at 312312312', '32', 'August 01,2021 12:30:08 PM'),
(84, 'Student Delete Question at 312312312', '32', 'August 01,2021 12:31:08 PM'),
(85, 'Student Delete Question at 312312312', '32', 'August 01,2021 12:31:08 PM'),
(86, 'Student Ask A Question at 312312312', '32', 'August 01,2021 12:31:08 PM'),
(87, 'Student Ask A Question at 312312312', '32', 'August 01,2021 12:34:08 PM'),
(88, 'Student Ask A Question at 312312312', '32', 'August 01,2021 12:34:08 PM'),
(89, 'Student Login', '32', 'August 01,2021 03:23:08 PM'),
(90, 'View Topic: try', '32', 'August 01,2021 03:23:08 PM'),
(91, 'View Topic: try', '32', 'August 01,2021 03:23:08 PM'),
(92, 'Student Logout', '32', 'August 01,2021 09:24:08 AM'),
(93, 'Student Login', '32', 'August 01,2021 03:44:08 PM'),
(94, 'View Topic: 1231231', '32', 'August 01,2021 03:44:08 PM'),
(95, 'View Topic: 1231231', '32', 'August 01,2021 04:00:08 PM'),
(96, 'View Topic: 312312312', '32', 'August 01,2021 04:00:08 PM'),
(97, 'View Topic: try', '32', 'August 01,2021 04:00:08 PM'),
(98, 'View Topic: 1231231', '32', 'August 01,2021 04:23:08 PM'),
(99, 'View Topic: ', '32', 'August 01,2021 04:34:08 PM'),
(100, 'View Topic: 1231231', '32', 'August 01,2021 04:44:08 PM'),
(101, 'View Topic: 1231231', '32', 'August 01,2021 04:46:08 PM'),
(102, 'View Topic: 1231231', '32', 'August 01,2021 04:46:08 PM'),
(103, 'View Topic: 1231231', '32', 'August 01,2021 06:27:08 PM'),
(104, 'View Topic: 1231231', '32', 'August 01,2021 06:27:08 PM'),
(105, 'View Topic: 1231231', '32', 'August 01,2021 06:30:08 PM'),
(106, 'View Topic: try', '32', 'August 01,2021 06:30:08 PM'),
(107, 'View Topic: 1231231', '32', 'August 01,2021 06:30:08 PM'),
(108, 'View Topic: 1231231', '32', 'August 01,2021 06:30:08 PM'),
(109, 'Student Login', '32', 'September 07,2021 09:04:09 PM'),
(110, 'View Topic: 1231231', '32', 'September 07,2021 09:05:09 PM'),
(111, 'Student Post A New Comment at 1231231', '32', 'September 07,2021 09:05:09 PM'),
(112, 'View Topic: 1231231', '32', 'September 07,2021 09:07:09 PM'),
(113, 'Student Login', '33', 'September 28,2021 10:54:09 PM'),
(114, 'View Topic: 12312', '33', 'September 28,2021 10:55:09 PM'),
(115, 'Student Logout', '33', 'September 28,2021 10:56:09 PM'),
(116, 'Student Login', '33', 'September 28,2021 11:01:09 PM'),
(117, 'View Topic: 12312', '33', 'September 28,2021 11:02:09 PM'),
(118, 'View Topic: 12312', '33', 'September 28,2021 11:02:09 PM'),
(119, 'View Topic: 12312', '33', 'September 28,2021 11:03:09 PM'),
(120, 'Student Logout', '33', 'September 28,2021 11:04:09 PM'),
(121, 'Student Login', '33', 'October 01,2021 08:55:10 PM'),
(122, 'View Topic: 12312', '33', 'October 01,2021 09:00:10 PM'),
(123, 'Student Logout', '33', 'October 01,2021 09:05:10 PM'),
(124, 'Student Login', '32', 'October 01,2021 09:09:10 PM'),
(125, 'Student Logout', '32', 'October 01,2021 09:10:10 PM'),
(126, 'Student Login', '33', 'October 05,2021 08:45:10 PM');

-- --------------------------------------------------------

--
-- Table structure for table `assestment`
--

CREATE TABLE `assestment` (
  `assestment_id` int(20) NOT NULL,
  `assestment_u_id` varchar(200) NOT NULL,
  `assestment_text` longtext NOT NULL,
  `assestment_lab` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assestment`
--

INSERT INTO `assestment` (`assestment_id`, `assestment_u_id`, `assestment_text`, `assestment_lab`) VALUES
(3, '39', 'asdasdasdsa', '1'),
(7, '27', 'sadasdasdas', '1');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `chat_id` int(20) NOT NULL,
  `chat_user` varchar(200) NOT NULL,
  `chat_reps_u_id` varchar(200) NOT NULL,
  `chat_user_id` varchar(200) NOT NULL,
  `chat_message` longtext NOT NULL,
  `chat_time` varchar(200) NOT NULL,
  `chat_to` varchar(200) NOT NULL,
  `view` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`chat_id`, `chat_user`, `chat_reps_u_id`, `chat_user_id`, `chat_message`, `chat_time`, `chat_to`, `view`) VALUES
(130, '98', '1', '98', 'hello', '03/02/2022 10:22:59 pm', '81', '1');

-- --------------------------------------------------------

--
-- Table structure for table `enable_history`
--

CREATE TABLE `enable_history` (
  `enable_history` int(20) NOT NULL,
  `enable_history_id` varchar(200) NOT NULL,
  `enable_history_fac` varchar(200) NOT NULL,
  `enable_history_section` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enable_history`
--

INSERT INTO `enable_history` (`enable_history`, `enable_history_id`, `enable_history_fac`, `enable_history_section`) VALUES
(30, '3', '48', '10'),
(31, '3', '48', '10'),
(40, '1', '48', '7'),
(41, '1', '48', '7'),
(47, '1', '46', '12'),
(48, '1', '46', '12'),
(54, '1', '51', '7'),
(55, '1', '51', '7'),
(100, '2', '66', '12'),
(105, '1', '81', '18');

-- --------------------------------------------------------

--
-- Table structure for table `enable_history_lab`
--

CREATE TABLE `enable_history_lab` (
  `enable_history_lab_id` int(20) NOT NULL,
  `enable_history_id` varchar(200) NOT NULL,
  `enable_history_fac` varchar(200) NOT NULL,
  `enable_history_sec` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enable_history_lab`
--

INSERT INTO `enable_history_lab` (`enable_history_lab_id`, `enable_history_id`, `enable_history_fac`, `enable_history_sec`) VALUES
(62, '1', '46', '12'),
(63, '1', '46', '12'),
(91, '1', '51', '12'),
(92, '1', '51', '12'),
(93, '2', '51', '12'),
(94, '2', '51', '7'),
(100, '1', '66', '12'),
(101, '2', '66', '12'),
(102, '3', '66', '12'),
(103, '1', '81', '18');

-- --------------------------------------------------------

--
-- Table structure for table `laboratories`
--

CREATE TABLE `laboratories` (
  `lab_id` int(20) NOT NULL,
  `lab_title` varchar(200) NOT NULL,
  `lab_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laboratories`
--

INSERT INTO `laboratories` (`lab_id`, `lab_title`, `lab_status`) VALUES
(1, 'Week 1', '1'),
(2, 'Week 2', '0'),
(3, 'Week 3', '0'),
(4, 'Week 4', '0'),
(5, 'Week 5', '0'),
(6, 'Week 6', '0'),
(7, 'Week 7', '0'),
(8, 'Week 8', '0'),
(9, 'Week 9', '0'),
(10, 'Week 10', '0'),
(11, 'Week 11', '0'),
(12, 'Week 12', '0'),
(13, 'Week 13', '0'),
(14, 'Week 14', '0');

-- --------------------------------------------------------

--
-- Table structure for table `miniquiz`
--

CREATE TABLE `miniquiz` (
  `miniquiz_id` int(20) NOT NULL,
  `miniquiz_question` varchar(200) NOT NULL,
  `miniquiz_essay` varchar(200) NOT NULL,
  `miniquiz_student_id` varchar(200) NOT NULL,
  `miniquiz_lab_id` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mini_quiz_items`
--

CREATE TABLE `mini_quiz_items` (
  `mini_option_id` int(20) NOT NULL,
  `mini_option_date` varchar(200) NOT NULL,
  `mini_option_user` varchar(200) NOT NULL,
  `mini_option_week` varchar(200) NOT NULL,
  `mini_option_a1` varchar(200) NOT NULL,
  `mini_option_a2` varchar(200) NOT NULL,
  `mini_option_a3` varchar(200) NOT NULL,
  `mini_option_a4` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mini_quiz_items`
--

INSERT INTO `mini_quiz_items` (`mini_option_id`, `mini_option_date`, `mini_option_user`, `mini_option_week`, `mini_option_a1`, `mini_option_a2`, `mini_option_a3`, `mini_option_a4`) VALUES
(4, 'December 04,2021 - 05:09:52 PM', '27', '1', '1', '1', '0', '1');

-- --------------------------------------------------------

--
-- Table structure for table `multiple_file`
--

CREATE TABLE `multiple_file` (
  `multiple_file_id` int(20) NOT NULL,
  `multiple_file_week` varchar(200) NOT NULL,
  `multiple_file_u_id` varchar(200) NOT NULL,
  `multiple_file_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `multiple_file`
--

INSERT INTO `multiple_file` (`multiple_file_id`, `multiple_file_week`, `multiple_file_u_id`, `multiple_file_name`) VALUES
(61, '1', '53', 'Laboratory1 Control System-Dela Rosa-Herdie.docx'),
(64, '1', '105', 'Laboratory-Work-No.-1-Actuators-and-Drivers (1).docx'),
(65, '1', '105', 'Introduction to TinkerCAD Circuits.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `question_id` int(20) NOT NULL,
  `question_topic` varchar(200) NOT NULL,
  `question_stu_id` varchar(200) NOT NULL,
  `question_desc` longtext NOT NULL,
  `question_date` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_id`, `question_topic`, `question_stu_id`, `question_desc`, `question_date`, `status`) VALUES
(16, 'try', '32', 'try', '08 01,21 04:33:25 PM', '1'),
(17, '123123', '32', '12312312', '08 01,2021 04:40:19 PM', '1'),
(18, '12312', '32', '312313', '08 01,2021 06:30:48 PM', '5');

-- --------------------------------------------------------

--
-- Table structure for table `question_answer`
--

CREATE TABLE `question_answer` (
  `answer_id` int(20) NOT NULL,
  `answer_topic` varchar(200) NOT NULL,
  `answer_user` varchar(200) NOT NULL,
  `answer_desc` longtext NOT NULL,
  `answer_date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question_answer`
--

INSERT INTO `question_answer` (`answer_id`, `answer_topic`, `answer_user`, `answer_desc`, `answer_date`) VALUES
(35, '18', '31', '1123123', '08 01,2021 06:45:59 PM'),
(36, '17', '31', '1', '08 01,2021 06:46:04 PM'),
(37, '16', '31', '1', '08 01,2021 06:46:10 PM'),
(38, '18', '31', '2313', '09 07,2021 09:14:13 PM'),
(39, '18', '31', '', '09 07,2021 09:30:57 PM'),
(40, '18', '31', '', '09 07,2021 09:31:06 PM'),
(41, '18', '31', '', '09 07,2021 09:31:58 PM');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `section_id` int(20) NOT NULL,
  `section_name` varchar(200) NOT NULL,
  `section_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`section_id`, `section_name`, `section_status`) VALUES
(7, '1A-SEP', '1'),
(8, '2A-SEP', '1'),
(10, '3A-SEP', '1'),
(11, '4A-SEP', '1'),
(16, '1A-LEP', '1'),
(17, '2A-LEP', '1'),
(18, '3A-LEP', '1'),
(19, '1A-BETELXT', '1'),
(20, '2A-BETELXT', '0'),
(21, '3A-BETELXT', '0'),
(22, '1A-BETELXT-STEM', '0');

-- --------------------------------------------------------

--
-- Table structure for table `section_adviser`
--

CREATE TABLE `section_adviser` (
  `section_adviser_id` int(20) NOT NULL,
  `section_adviser_u_id` varchar(200) NOT NULL,
  `section_adviser_s_id` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `section_adviser`
--

INSERT INTO `section_adviser` (`section_adviser_id`, `section_adviser_u_id`, `section_adviser_s_id`) VALUES
(28, '7', '81'),
(29, '18', '81'),
(30, '8', '74'),
(31, '10', '74'),
(32, '11', '76'),
(33, '16', '76'),
(34, '17', '77'),
(35, '19', '77');

-- --------------------------------------------------------

--
-- Table structure for table `section_info`
--

CREATE TABLE `section_info` (
  `section_list_id` int(20) NOT NULL,
  `section_id` varchar(200) NOT NULL,
  `section_list_name` varchar(200) NOT NULL,
  `section_list_birthdate` varchar(200) NOT NULL,
  `section_list_gender` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_file`
--

CREATE TABLE `student_file` (
  `student_file_id` int(20) NOT NULL,
  `student_file_user` varchar(200) NOT NULL,
  `student_file_name` varchar(200) NOT NULL,
  `student_file` varchar(200) NOT NULL,
  `student_lab_num` varchar(200) NOT NULL,
  `student_lab_date` varchar(200) NOT NULL,
  `student_lab_score` varchar(200) NOT NULL,
  `student_lab_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_file`
--

INSERT INTO `student_file` (`student_file_id`, `student_file_user`, `student_file_name`, `student_file`, `student_lab_num`, `student_lab_date`, `student_lab_score`, `student_lab_status`) VALUES
(70, '53', '', '', '1', 'December 08,2021 - 10:35:03 AM', '87', 'Check'),
(73, '105', '', '', '1', 'December 11,2021 - 02:43:25 AM', '100', 'Check');

-- --------------------------------------------------------

--
-- Table structure for table `supplementary`
--

CREATE TABLE `supplementary` (
  `id` int(20) NOT NULL,
  `fac_id` varchar(200) NOT NULL,
  `sec_id` varchar(200) NOT NULL,
  `topic_name` varchar(200) NOT NULL,
  `topic_content` longtext NOT NULL,
  `video_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `table_example`
--

CREATE TABLE `table_example` (
  `table_example_id` int(20) NOT NULL,
  `table_example_name` varchar(200) NOT NULL,
  `table_example_desc` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Int, Varchar, Longtext,';

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `topics_id` int(20) NOT NULL,
  `topics_name` varchar(200) NOT NULL,
  `topics_under` varchar(200) NOT NULL,
  `topics_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`topics_id`, `topics_name`, `topics_under`, `topics_status`) VALUES
(1, 'Topic 1', '1', '1'),
(2, 'Topic 2', '1', '1'),
(3, 'Topic 3', '1', '1'),
(4, 'Topic 4', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `topic_content`
--

CREATE TABLE `topic_content` (
  `topic_content_id` int(20) NOT NULL,
  `topic_content_sub` varchar(200) NOT NULL,
  `topic_content_topics` longtext NOT NULL,
  `topic_content_video` varchar(200) NOT NULL,
  `topic_content_ref` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topic_content`
--

INSERT INTO `topic_content` (`topic_content_id`, `topic_content_sub`, `topic_content_topics`, `topic_content_video`, `topic_content_ref`) VALUES
(3, 'introduction of HTML', 'aaaaa', 'TUP231021-VIDEO-26210.mp4', '102321120404'),
(4, 'introduction of CSS', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vitae lobortis ipsum. Morbi euismod turpis imperdiet, egestas elit ac, pretium nunc. Donec at nisi interdum, convallis erat ac, vestibulum orci. Praesent pulvinar libero dolor, in posuere quam laoreet eget. Donec nec purus ut tellus dapibus bibendum. Sed nisi dui, posuere eu convallis quis, bibendum vitae neque. Aenean et semper orci, eget ultricies nunc. Maecenas accumsan porttitor vehicula. Vivamus ornare varius ullamcorper. Nam ut interdum sem. Donec nisl felis, ultricies ultricies ultricies ut, tristique eget lorem. Vestibulum id eros non urna vestibulum efficitur. Nunc et cursus mauris. Integer accumsan quam id tempus sodales. Suspendisse potenti. Cras posuere nunc enim, nec vulputate sapien ultrices in.\n\nPhasellus in pharetra erat. Pellentesque varius ex magna, nec iaculis lacus ornare nec. Nam et laoreet dui. Donec at turpis dui. Fusce tincidunt lacus vel nibh pulvinar congue. Aliquam dolor dolor, vehicula ultricies posuere ac, placerat id neque. Quisque in luctus dolor. Nunc posuere semper ex, a egestas libero molestie non.\n\nFusce malesuada cursus nisi sit amet ullamcorper. Praesent dignissim non nulla ut sagittis. Ut neque ex, tincidunt id aliquam at, convallis quis diam. Praesent convallis vehicula ante in sollicitudin. Ut feugiat tristique diam, ac gravida mi luctus a. Donec ut dolor suscipit, faucibus magna maximus, eleifend nunc. Aliquam tempor maximus justo. Etiam porttitor mauris sit amet arcu sagittis, auctor iaculis nibh porta. Aenean luctus purus lectus, eu imperdiet justo faucibus in. Pellentesque vulputate dolor nulla, vitae elementum metus blandit et.\n\nDonec imperdiet ligula vehicula, finibus nunc in, mollis magna. Vivamus maximus lacus eu justo malesuada, id pharetra velit hendrerit. Sed ipsum elit, finibus quis ex sit amet, posuere sodales enim. Etiam eget neque non tellus maximus sollicitudin. Morbi in fringilla nisi, at lobortis nibh. Donec pretium non urna vitae commodo. Integer rutrum velit ut dui laoreet fermentum.\n\nPellentesque diam purus, tempus vel pellentesque at, laoreet at mauris. Maecenas consectetur auctor urna vel vehicula. Aliquam tincidunt id felis id feugiat. Nam in fringilla libero, sed vehicula urna. Pellentesque eros nulla, dictum sit amet faucibus eu, semper et sem. Maecenas dignissim ante sit amet faucibus vestibulum. Pellentesque varius leo vitae augue ornare, nec rutrum lectus venenatis. Nunc nec libero commodo, lacinia odio egestas, malesuada ex. Fusce augue urna, dapibus non tristique eu, malesuada non neque. Quisque consequat nibh sed nulla bibendum, non maximus diam rhoncus. Sed quis ligula orci. Integer non dignissim ex, at porttitor massa. Praesent sagittis porttitor diam nec vehicula. Sed mattis lacinia massa non rutrum. Donec consequat mi nec dolor varius commodo. In suscipit purus et leo fermentum commodo id finibus tortor.\n\nAenean fermentum augue et lectus molestie, in dapibus urna dictum. Proin feugiat ipsum enim, in congue justo scelerisque lacinia. Pellentesque nibh leo, dignissim id leo et, tempus dapibus nisi. Ut commodo vehicula ante vel finibus. Proin egestas mi vel interdum condimentum. Duis tincidunt diam at lorem condimentum, nec feugiat sem feugiat. Maecenas commodo nisl nec lorem cursus pretium. Aenean at nisi vel urna finibus mattis at vel neque. Donec molestie lorem id hendrerit dictum. Vivamus vitae dolor ullamcorper, egestas arcu eget, sagittis justo. Vivamus finibus finibus ligula quis posuere. Vivamus a laoreet quam, vitae dignissim dui. Aenean ac feugiat justo, ac aliquet magna.\n\nDonec auctor diam cursus, ornare sapien eget, ultrices tortor. Nunc libero lorem, convallis rhoncus nibh sodales, pellentesque dapibus turpis. Aenean sit amet odio ut mi sagittis fermentum. Praesent orci orci, tincidunt ut odio nec, congue rutrum justo. Praesent sed lacus eget nunc mollis iaculis. Mauris nec lorem sed nisl maximus lacinia. Sed tincidunt neque blandit imperdiet laoreet. Maecenas sed pellentesque sapien. In semper pharetra cursus. Ut volutpat posuere justo quis convallis. Mauris egestas eros nulla, at egestas nisi accumsan quis. Praesent nulla tortor, fermentum ullamcorper viverra quis, sollicitudin a tellus. Mauris aliquam, lacus ut placerat finibus, nibh neque mattis erat, in sodales augue velit in odio. Suspendisse sit amet erat tempus, finibus magna quis, semper diam.\n\nEtiam bibendum ornare turpis eget ultricies. Aliquam urna magna, mattis eget malesuada nec, pretium eu eros. Phasellus vestibulum metus quis nulla maximus accumsan. Ut vitae elementum orci. In in diam posuere, lacinia ligula non, volutpat nunc. Donec cursus dictum dui et auctor. Nulla malesuada maximus lacus lobortis aliquam. Donec aliquam, eros vel sagittis sodales, mauris urna mattis eros, ut posuere turpis nulla id nunc. Donec ex dui, gravida sed odio eget, aliquam euismod sapien. Curabitur fringilla lacus a odio sagittis auctor. Cras rhoncus mauris quis luctus viverra. Curabitur vestibulum pellentesque facilisis. Sed ullamcorper tellus tortor, sed pretium odio vehicula id. Fusce sodales tempus lacus at posuere. Sed posuere, risus ac ultricies ultricies, mi felis convallis arcu, id venenatis libero arcu non sapien.\n\nVestibulum eget consectetur nibh. Integer dui odio, condimentum id turpis et, iaculis rhoncus orci. Vivamus pretium urna at lectus posuere ornare. Aenean neque nisl, elementum ac interdum vitae, molestie in risus. Nulla bibendum sit amet erat quis congue. Etiam eget pharetra nibh, non semper sem. Integer commodo sit amet dolor a tincidunt. Sed elementum, turpis in mollis pharetra, tellus magna aliquam quam, non maximus eros sem vitae ex. Mauris rutrum pretium ante, lacinia porttitor neque porta sit amet. Aenean congue interdum lorem quis pretium. Sed eget ante lacus. Vestibulum consequat interdum urna, vel blandit lorem auctor a.\n\nMaecenas quam sem, malesuada vel lacus non, accumsan porttitor arcu. Sed hendrerit id sapien in commodo. Donec et tempus diam, quis volutpat lacus. Donec faucibus est rhoncus nunc tincidunt laoreet. Donec libero sem, imperdiet nec dictum in, lobortis id eros. Suspendisse placerat tortor ut felis mollis, aliquet pharetra tellus aliquam. Sed nec mauris id purus malesuada elementum eget id magna. Donec ac dapibus nibh. Donec sit amet libero vehicula, gravida orci eget, semper nisl. Suspendisse eu ante lectus. Duis sit amet tristique erat, quis vestibulum lacus. Nam sodales pulvinar viverra.', 'TUP231021-VIDEO-5488.mp4', '102321190406'),
(5, 'asd', 'pdf ito', 'TUP231021-VIDEO-57070.vnd.ms-powerpoint.presentation.macroEnabled.12', '102321580441');

-- --------------------------------------------------------

--
-- Table structure for table `topic_number`
--

CREATE TABLE `topic_number` (
  `topic_id` int(20) NOT NULL,
  `topic_title` varchar(200) NOT NULL,
  `topic_date` varchar(200) NOT NULL,
  `topic_create_by` varchar(200) NOT NULL,
  `tipic_ref` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topic_number`
--

INSERT INTO `topic_number` (`topic_id`, `topic_title`, `topic_date`, `topic_create_by`, `tipic_ref`) VALUES
(6, 'Topic 1', 'October 23,2021', 'Teacher Account Ito', '102321120404'),
(7, 'Topic 2', 'October 23,2021', 'Teacher Account Ito', '102321190406'),
(8, 'asd', 'October 23,2021', 'Teacher Account Ito', '102321580441');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `u_id` int(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `mname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `suffix` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `position` varchar(200) NOT NULL,
  `user_id_number` varchar(200) NOT NULL,
  `student_section` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `status_1` varchar(200) NOT NULL,
  `status_2` varchar(200) NOT NULL,
  `profile` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`u_id`, `email`, `fname`, `mname`, `lname`, `suffix`, `password`, `position`, `user_id_number`, `student_section`, `status`, `status_1`, `status_2`, `profile`) VALUES
(3, 'admin@gmail.com', 'Admin', 'Po', 'Ako', '', '$2y$10$.9C/e0myoNB1tl0x.OJJgeEabxW.viys.g1MnAE5W3geJ0A1nMbwG', 'Admin', '', '', '', '', '', ''),
(56, 'harvey.delarosa@tup.edu.ph', 'Harvey', 'Alfelor', 'Dela Rosa', '', '$2y$10$mZMyCNCxaqZSMapLxZfhT.FTH7cOYNI5il6IsCOO1Ckobc6C0cymq', 'Student', 'TUPT-19-1041', '7', 'Decline', 'Pending', 'For Approval', 'face28.jpg'),
(74, 'mary_garcia@tup.edu.ph', 'Mary', 'C.', 'Garcia', '', '$2y$10$jdUHMLf846scgv1oBFSy8OmUPDGH4LJA1RmefKQscnc264Cro2Vp.', 'Teacher', '002', 'Teacher', 'Decline', 'Pending', '', 'face28.jpg'),
(76, 'hanna_clemente@tup.edu.ph', 'Hanna', 'R.', 'Clemente', '', '$2y$10$zDNYXPbWQayRBCD/US3ff.jgox3KZ1SbIoDSzpiXaLv1v2xtUWhN.', 'Teacher', '003', 'Teacher', 'Decline', 'Pending', '', 'face28.jpg'),
(77, 'remedios_victorio@tup.edu.ph', 'Remedios', 'A.', 'Victorio', '', '$2y$10$Iy44U/OkEJQi1K.u3KLbA.QurfgG5TxoeQ8/WNTNy4xmXErHyAt6e', 'Teacher', '004', 'Teacher', 'Decline', 'Pending', '', 'face28.jpg'),
(78, 'jean_antonio@tup.edu.ph', 'Jean', 'S.', 'Antonio', '', '$2y$10$ObI.yk9fS4kMbYNjYcoc..QICJNAWJDNKHbcrCEFjsFPcpnZ5vUgi', 'Teacher', '005', 'Teacher', 'Decline', 'Pending', '', 'face28.jpg'),
(81, 'carlo_dominguez@tup.edu.ph', 'Carlo', 'C.', 'Dominguez', '', '$2y$10$YfE6ADVTN6y7e3ve.Zbrp.wDjhr/cuqNIurrH/FsRO/SaU61VPLPK', 'Teacher', '001', 'Teacher', 'Decline', 'Pending', '', 'Dominguez81-faculty.jpg'),
(82, 'herdie.delarosa@tup.edu.ph', 'Herdie', 'Alfelor', 'Dela Rosa', '', '$2y$10$KpRyZaQO.Zh5dWVZ./d.5.XQe6ZmqZAaRLJwjd.C/p5epvL8ywe9m', 'Student', 'TUPT-19-1039', '18', 'Decline', 'Pending', 'For Approval', 'face28.jpg'),
(83, 'maricel_obrique@tup.edu.ph', 'Maricel', 'Binamera', 'Obrique', '', '$2y$10$YKSviReoMFu1ug2uhRSbJ.QOdy9byDnWJZ4s33w5QLbjyssY8sCoq', 'Student', 'TUPT-19-1040', '18', 'Decline', 'Pending', 'For Approval', 'face28.jpg'),
(85, 'markjoseph.cruz@tup.edu.ph', 'Mark Joseph', 'Castro', 'Cruz', '', '$2y$10$gTdKaxl42b.r1joXmCxpV.8IzUXpKH3S4kYafVn/8e.nSLOkvLEym', 'Student', 'TUPT-19-1041', '18', 'Decline', 'Offline', 'Accept', 'face28.jpg'),
(86, 'johnarthur.coralde@tup.edu.ph', 'John Arthur', 'Diaz', 'Coralde', '', '$2y$10$.005guyCF3IsJhQA6UfAr.FKwRzEKvnn/4mXxp2okm3TeesNqVfl6', 'Student', 'TUPT-19-1042', '18', 'Decline', 'Pending', 'For Approval', 'face28.jpg'),
(87, 'johnjimpaul.dunes@tup.edu.ph', 'John Jim Paul', 'Carlos', 'Dunes', '', '$2y$10$EfbkfAYxdQuW8CzVHBuN9OcZ1lgwbg9RkRj2t2zE4lUUxzldOAuL2', 'Student', 'TUPT-19-1043', '18', 'Decline', 'Pending', 'For Approval', 'face28.jpg'),
(89, 'norhaynie.bongcarawan@tup.edu.ph', 'Norhaynie', 'Santos', ' Bongcarawan', '', '$2y$10$O6SrWJkr1H7cxQ5HsDaUGOJwjoBg1BQmN.5WX9LBx7vvR2H8IbWHe', 'Student', 'TUPT-19-1045', '18', 'Decline', 'Pending', 'For Approval', 'face28.jpg'),
(90, 'pauleneerica.figuracion@tup.edu.ph', 'Paulene Erica', 'Santos', 'Figuracion', '', '$2y$10$i1a/t.yxaSkmRel.sXvF4u2ZxxnKuxVIU2JulbvfHt.EPeOJx0NIK', 'Student', 'TUPT-19-1046', '18', 'Decline', 'Pending', 'For Approval', 'face28.jpg'),
(91, 'ricamae.alvarez@tup.edu.ph', 'Ricamae', 'Alvarez', 'Obiena', '', '$2y$10$zpz1IC8BhS2pKKwAyeqlOOYEBTgfyXn5i7TrxbQP8HjDoPYH3AXyC', 'Student', 'TUPT-19-1047', '18', 'Decline', 'Pending', 'For Approval', 'face28.jpg'),
(92, 'joshuaivan.yray@tup.edu.ph', 'Joshua Ivan', 'Recto', 'Yray', '', '$2y$10$yO2UWanxhjOuLDNjZdsJye2QKHqOgRfi4VKqd/rkFca9wvBUA2Aye', 'Student', 'TUPT-19-1048', '18', 'Decline', 'Pending', 'For Approval', 'face28.jpg'),
(93, 'michelle.ortega@tup.edu.ph', 'Michelle', 'Balindan', 'Ortega', '', '$2y$10$q38j2v7SxnhCEaXFbe9qXeerlwK1WTADeLg9oz3I4bae4dm9bpOA2', 'Student', 'TUPT-19-1050', '18', 'Decline', 'Pending', 'For Approval', 'face28.jpg'),
(94, 'mikejohn.maulion@tup.edu.ph', 'Mike John', 'Zedric', 'Maulion', '', '$2y$10$5/kH6k.R0Neq.q4LkDEGYOjknxNPSccs6vgONc2tovmWQNy25rRo6', 'Student', 'TUPT-19-1051', '18', 'Decline', 'Pending', 'For Approval', 'face28.jpg'),
(95, 'bryan.cabug@tup.edu.ph', 'Bryan', 'Combis', 'Cabug', '', '$2y$10$6Wlbik7.nmb4FXueEHM2NevzGqreRZFzAmThN.6IjRwyPwzDXF5/6', 'Student', 'TUPT-19-1052', '18', 'Decline', 'Pending', 'For Approval', 'face28.jpg'),
(96, 'jhonna.perez@tup.edu.ph', 'Jhonna', 'Patricia', 'Perez', '', '$2y$10$wLL2qda8elEppp7DDCRFu.bX4v0NYT/Nl4IwhoqzpBn6rlYhhE82K', 'Student', 'TUPT-19-1053', '18', 'Decline', 'Pending', 'For Approval', 'face28.jpg'),
(98, 'wallen.balictar@tup.edu.ph', 'Wallen', 'Desuloc', 'Balictar', '', '$2y$10$iNBK/NbyOsst15MbkOsYPeMP5DCR6scmVkzXjYvl75LJ/ElPUVvAe', 'Student', 'TUPT-19-1038', '18', 'Decline', 'Offline', 'Accept', 'Balictar-TUPT-19-1038.jpg'),
(99, 'maita.limbo@tup.edu.ph', 'Maita', 'Tomas', 'Limbo', '', '$2y$10$hkXBysqCxprWMlmbPdh9j.bcPnEKgvL7WiihhmPBoRziCF7.dQrcO', 'Student', 'TUTP-19-1055', '18', 'Decline', 'Pending', 'For Approval', 'face28.jpg'),
(100, 'johnlee.mendeja@tup.edu.ph', 'Johnlee', 'Marquez', 'Mendeja', '', '$2y$10$mCcGJQ79A45xP6LzBrqJ2.MBC.H8J6BiJRkdhFyJ8gqCMlRg.5eCe', 'Student', 'TUPT-19-1056', '18', 'Decline', 'Pending', 'For Approval', 'face28.jpg'),
(101, 'crisalyn.medianna@tup.edu.ph', 'Crisalyn', 'Quinto', 'Medianna', '', '$2y$10$nbA8EgY6b5CT3LT2xMkjyeS7ZN0JjnYMOSSXh8KqCXZQz3OVUuNuO', 'Student', 'TUPT-19-1057', '18', 'Decline', 'Pending', 'For Approval', 'face28.jpg'),
(102, 'regine.baconaua@tup.edu.ph', 'Regine', 'carlos', 'Baconaua', '', '$2y$10$ACU.PdkknBCQPGYn2q7OK.4Ulalyf7PROHjvRibrEkh3zcblXkTsm', 'Student', 'TUPT-19-1058', '18', 'Decline', 'Pending', 'For Approval', 'face28.jpg'),
(103, 'cedrick.mayo@tup.edu.ph', 'Cedrick', 'Canilang', 'Mayo', '', '$2y$10$.SBEDAWFLL6afCLY7Kykj.NY0r10xJxwtl5yqTIdr59Oh8TqLiNzS', 'Student', 'TUPT-19-1060', '18', 'Decline', 'Pending', 'For Approval', 'face28.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `weeks`
--

CREATE TABLE `weeks` (
  `weeks_id` int(20) NOT NULL,
  `weeks_name` varchar(200) NOT NULL,
  `weeks_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `weeks`
--

INSERT INTO `weeks` (`weeks_id`, `weeks_name`, `weeks_status`) VALUES
(1, 'Week 1', '1'),
(2, 'Week 2', '0'),
(3, 'Week 3', '0'),
(4, 'Week 4', '0'),
(5, 'Week 5', '0'),
(6, 'Week 6', '0'),
(7, 'Week 7', '0'),
(8, 'Week 8', '0'),
(9, 'Week 9', '0'),
(10, 'Week 10 - Week 14', '0');

-- --------------------------------------------------------

--
-- Table structure for table `youtube`
--

CREATE TABLE `youtube` (
  `youtube_id` int(20) NOT NULL,
  `youtube_title` varchar(200) NOT NULL,
  `youtube_grade` varchar(200) NOT NULL,
  `youtube_desc` varchar(200) NOT NULL,
  `youtube_google` longtext NOT NULL,
  `youtube_link_a` longtext NOT NULL,
  `youtube_link` longtext NOT NULL,
  `youtube_year` varchar(200) NOT NULL,
  `youtube_strand` varchar(200) NOT NULL,
  `youtube_sec` varchar(200) NOT NULL,
  `youtube_user` varchar(200) NOT NULL,
  `youtube_lastname` varchar(200) NOT NULL,
  `youtube_date_up` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `youtube`
--

INSERT INTO `youtube` (`youtube_id`, `youtube_title`, `youtube_grade`, `youtube_desc`, `youtube_google`, `youtube_link_a`, `youtube_link`, `youtube_year`, `youtube_strand`, `youtube_sec`, `youtube_user`, `youtube_lastname`, `youtube_date_up`) VALUES
(6, '312312312', 'G11', '1231231231', '123123123', '', '1231231221', '2021', 'ICT', '7', '31', '', 'September 11,2021'),
(7, '1231231', 'G11', '3123123', 'tl', 'ml', '<iframe width=\"853\" height=\"480\" src=\"https://www.youtube.com/embed/snPjPokfM5o\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '202138', 'ICT', '7', '3', '', 'September 11,2021'),
(8, 'asdsad', 'G11', 'ysad', 'tl', 'ml', 'yt', '202109', 'ICT', '7', '31', '', 'September 11,2021'),
(9, 'try', 'G12', 'asd', 'https://www.youtube.com/watch?v=CEw-7cMnBDY&list=RDCEw-7cMnBDY&start_radio=1', 'https://www.youtube.com/watch?v=CEw-7cMnBDY&list=RDCEw-7cMnBDY&start_radio=1', '<iframe width=\"1254\" height=\"759\" src=\"https://www.youtube.com/embed/CEw-7cMnBDY?list=RDCEw-7cMnBDY\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '202138', 'ICT', '7', '3', '', 'September 11,2021'),
(12, '12312', 'G11', '1231231', '312312', '312312', '312312312', '202116', 'ABM', '7', '33', 'Enore', 'September 11,2021');

-- --------------------------------------------------------

--
-- Table structure for table `youtube_comment`
--

CREATE TABLE `youtube_comment` (
  `youtube_comment_id` int(20) NOT NULL,
  `youtube_id` varchar(200) NOT NULL,
  `youtube_user` varchar(200) NOT NULL,
  `youtube_comment` longtext NOT NULL,
  `youtube_date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `youtube_comment`
--

INSERT INTO `youtube_comment` (`youtube_comment_id`, `youtube_id`, `youtube_user`, `youtube_comment`, `youtube_date`) VALUES
(15, '6', '33', '1231231', 'July 30,2021 08:03:07 PM'),
(16, '7', '32', '12312', 'September 07,2021 09:05:09 PM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `analytic`
--
ALTER TABLE `analytic`
  ADD PRIMARY KEY (`analytic_id`);

--
-- Indexes for table `assestment`
--
ALTER TABLE `assestment`
  ADD PRIMARY KEY (`assestment_id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `enable_history`
--
ALTER TABLE `enable_history`
  ADD PRIMARY KEY (`enable_history`);

--
-- Indexes for table `enable_history_lab`
--
ALTER TABLE `enable_history_lab`
  ADD PRIMARY KEY (`enable_history_lab_id`);

--
-- Indexes for table `laboratories`
--
ALTER TABLE `laboratories`
  ADD PRIMARY KEY (`lab_id`);

--
-- Indexes for table `miniquiz`
--
ALTER TABLE `miniquiz`
  ADD PRIMARY KEY (`miniquiz_id`);

--
-- Indexes for table `multiple_file`
--
ALTER TABLE `multiple_file`
  ADD PRIMARY KEY (`multiple_file_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `question_answer`
--
ALTER TABLE `question_answer`
  ADD PRIMARY KEY (`answer_id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`section_id`);

--
-- Indexes for table `section_adviser`
--
ALTER TABLE `section_adviser`
  ADD PRIMARY KEY (`section_adviser_id`);

--
-- Indexes for table `section_info`
--
ALTER TABLE `section_info`
  ADD PRIMARY KEY (`section_list_id`);

--
-- Indexes for table `student_file`
--
ALTER TABLE `student_file`
  ADD PRIMARY KEY (`student_file_id`);

--
-- Indexes for table `supplementary`
--
ALTER TABLE `supplementary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_example`
--
ALTER TABLE `table_example`
  ADD PRIMARY KEY (`table_example_id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`topics_id`);

--
-- Indexes for table `topic_content`
--
ALTER TABLE `topic_content`
  ADD PRIMARY KEY (`topic_content_id`);

--
-- Indexes for table `topic_number`
--
ALTER TABLE `topic_number`
  ADD PRIMARY KEY (`topic_id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `weeks`
--
ALTER TABLE `weeks`
  ADD PRIMARY KEY (`weeks_id`);

--
-- Indexes for table `youtube`
--
ALTER TABLE `youtube`
  ADD PRIMARY KEY (`youtube_id`);

--
-- Indexes for table `youtube_comment`
--
ALTER TABLE `youtube_comment`
  ADD PRIMARY KEY (`youtube_comment_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `analytic`
--
ALTER TABLE `analytic`
  MODIFY `analytic_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `assestment`
--
ALTER TABLE `assestment`
  MODIFY `assestment_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `chat_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `enable_history`
--
ALTER TABLE `enable_history`
  MODIFY `enable_history` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `enable_history_lab`
--
ALTER TABLE `enable_history_lab`
  MODIFY `enable_history_lab_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `laboratories`
--
ALTER TABLE `laboratories`
  MODIFY `lab_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `miniquiz`
--
ALTER TABLE `miniquiz`
  MODIFY `miniquiz_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `multiple_file`
--
ALTER TABLE `multiple_file`
  MODIFY `multiple_file_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `question_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `question_answer`
--
ALTER TABLE `question_answer`
  MODIFY `answer_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `section_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `section_adviser`
--
ALTER TABLE `section_adviser`
  MODIFY `section_adviser_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `section_info`
--
ALTER TABLE `section_info`
  MODIFY `section_list_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `student_file`
--
ALTER TABLE `student_file`
  MODIFY `student_file_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `supplementary`
--
ALTER TABLE `supplementary`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `table_example`
--
ALTER TABLE `table_example`
  MODIFY `table_example_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `topics_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `topic_content`
--
ALTER TABLE `topic_content`
  MODIFY `topic_content_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `topic_number`
--
ALTER TABLE `topic_number`
  MODIFY `topic_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `u_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `weeks`
--
ALTER TABLE `weeks`
  MODIFY `weeks_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `youtube`
--
ALTER TABLE `youtube`
  MODIFY `youtube_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `youtube_comment`
--
ALTER TABLE `youtube_comment`
  MODIFY `youtube_comment_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
