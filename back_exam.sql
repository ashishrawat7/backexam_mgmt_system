-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jun 11, 2020 at 05:18 AM
-- Server version: 5.7.28
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `back_exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `admitcard_status`
--

DROP TABLE IF EXISTS `admitcard_status`;
CREATE TABLE IF NOT EXISTS `admitcard_status` (
  `exam_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `applications_to_course`
--

DROP TABLE IF EXISTS `applications_to_course`;
CREATE TABLE IF NOT EXISTS `applications_to_course` (
  `exam_application_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL COMMENT '1=repeat, 2=reregsitration',
  `exam` tinyint(4) NOT NULL COMMENT '3=written(enternal,ext.),4=practica and file assignment, 5=project',
  `fee` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applications_to_course`
--

INSERT INTO `applications_to_course` (`exam_application_id`, `course_id`, `type`, `exam`, `fee`) VALUES
(1, 1, 2, 0, 12115),
(1, 2, 1, 3, 300),
(1, 8, 2, 0, 4974),
(1, 10, 1, 4, 300),
(2, 24, 1, 3, 300),
(2, 25, 2, 0, 10500),
(3, 24, 1, 3, 300),
(3, 25, 2, 0, 10500),
(4, 24, 1, 3, 300),
(4, 25, 2, 0, 10500),
(5, 26, 2, 0, 20000),
(5, 27, 1, 3, 300),
(6, 3, 2, 0, 9692),
(6, 3, 1, 3, 300),
(7, 24, 1, 3, 300),
(7, 25, 2, 0, 10500);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_code` varchar(12) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `department_id` int(11) NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_code`, `course_name`, `department_id`) VALUES
(1, 'COMP 712', 'Programming & Problem Solving with C', 1),
(2, 'COMP 714', 'Introduction to Softwares', 1),
(3, 'COMP 715', 'Computer Organization and Architecture', 1),
(4, 'COMP 723', 'Operating System', 1),
(5, 'COMP 724', 'Data Structures using C++', 1),
(6, 'COMP 725', 'Information System Analysis and Design', 1),
(7, 'COMP 726', 'Web Technologies', 1),
(8, 'COMP 731', 'Design & Analysis of Algorithms', 1),
(9, 'COMP 732', 'Computer Networks', 1),
(10, 'COMP 733', 'Database Management Systems', 1),
(11, 'COMP 736', 'Object Modeling Techniques and UML', 1),
(12, 'COMP 837', 'Compiler Design', 1),
(13, 'COMP 842', 'Data Warehousing & Mining', 1),
(14, 'COMP 843', 'Artificial Intelligence and Expert Systems', 1),
(15, 'COMP 852', 'Advanced Java Programming', 1),
(16, 'COMP 799', 'Mini Project', 1),
(17, 'COMP 741', '. NET Framework & C#', 1),
(18, 'COMP 841', 'Software Engineering', 1),
(19, 'COMP 851', 'Network Programming & Security', 1),
(20, 'COMP 856', 'Computer Graphics and Multimedia', 1),
(21, 'COMP 780', 'Seminar on Emerging Trends', 1),
(22, 'COMP 880', 'Seminar', 1),
(23, 'COMP 899', 'Project', 1),
(24, 'DS303', 'Data structure through C language', 2),
(25, 'JA304', 'Java', 2),
(26, 'OML401', 'Object modeling and designing', 2),
(27, 'NN402', 'Nuerel Network', 2);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
CREATE TABLE IF NOT EXISTS `departments` (
  `department_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_code` varchar(12) NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `school_id` int(11) NOT NULL,
  `add_date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`department_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`department_id`, `department_code`, `department_name`, `school_id`, `add_date`, `status`) VALUES
(1, 'DSC', 'this is new department', 5, '2019-10-19', 1),
(2, 'DSC&IT', 'DEPARTMENT OF COMPUTER SCIENCE AND INFORMATION TECHNOLOGY', 5, '2019-10-19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

DROP TABLE IF EXISTS `exams`;
CREATE TABLE IF NOT EXISTS `exams` (
  `exam_id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `exam_date` date NOT NULL,
  `start_admitcard_date` date DEFAULT NULL,
  `end_admitcard_date` date DEFAULT NULL,
  `start_application_date` date DEFAULT NULL,
  `end_application_date` date DEFAULT NULL,
  `application_status` tinyint(2) NOT NULL,
  PRIMARY KEY (`exam_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`exam_id`, `created_at`, `exam_date`, `start_admitcard_date`, `end_admitcard_date`, `start_application_date`, `end_application_date`, `application_status`) VALUES
(8, '2020-04-04 20:10:43', '2015-12-12', '2020-01-01', '2020-08-08', NULL, NULL, 1),
(23, '2020-04-07 13:23:03', '2019-12-11', '2020-05-01', '2020-10-02', NULL, NULL, 1),
(24, '2019-11-12 21:52:07', '2020-12-11', '2020-06-01', '2020-07-01', NULL, NULL, 1),
(25, '2020-06-04 12:13:02', '2020-12-01', '2020-02-21', '2020-10-14', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `exam_applications`
--

DROP TABLE IF EXISTS `exam_applications`;
CREATE TABLE IF NOT EXISTS `exam_applications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `total_fee` int(11) NOT NULL,
  `transaction_ref` varchar(60) NOT NULL,
  `admitcard_status` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_applications`
--

INSERT INTO `exam_applications` (`id`, `user_id`, `exam_id`, `total_fee`, `transaction_ref`, `admitcard_status`, `created_at`) VALUES
(1, 12, 23, 3000, '0', 0, '2020-04-23 21:19:38'),
(2, 13, 8, 3000, '0', 0, '2020-04-27 10:31:37'),
(3, 13, 23, 3000, '0', 0, '2020-04-27 10:33:23'),
(4, 13, 24, 3000, '0', 0, '2020-04-27 10:33:42'),
(5, 14, 24, 3000, '0', 0, '2020-04-27 10:47:11'),
(6, 12, 8, 3000, '0', 0, '2020-05-20 12:44:59'),
(7, 16, 24, 3000, '0', 0, '2020-06-04 11:35:56');

-- --------------------------------------------------------

--
-- Table structure for table `exam_structure`
--

DROP TABLE IF EXISTS `exam_structure`;
CREATE TABLE IF NOT EXISTS `exam_structure` (
  `exam_id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `prog_semester` tinyint(4) NOT NULL,
  KEY `exam_id` (`exam_id`,`program_id`,`prog_semester`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_structure`
--

INSERT INTO `exam_structure` (`exam_id`, `program_id`, `prog_semester`) VALUES
(1, 1, 1),
(1, 1, 3),
(1, 1, 5),
(1, 2, 1),
(1, 2, 2),
(1, 2, 3),
(1, 2, 4),
(1, 2, 5),
(1, 2, 6),
(1, 3, 2),
(1, 3, 4),
(1, 3, 6),
(2, 2, 1),
(2, 2, 2),
(2, 2, 5),
(3, 2, 1),
(3, 2, 2),
(3, 2, 5),
(4, 2, 1),
(4, 2, 2),
(4, 2, 5),
(5, 2, 1),
(5, 2, 2),
(5, 2, 3),
(5, 2, 4),
(5, 3, 1),
(6, 2, 1),
(6, 2, 2),
(6, 2, 3),
(6, 2, 4),
(6, 2, 5),
(6, 2, 6),
(7, 2, 1),
(7, 2, 2),
(7, 2, 3),
(7, 2, 4),
(7, 2, 5),
(7, 2, 6),
(8, 1, 2),
(8, 2, 1),
(8, 2, 2),
(8, 2, 3),
(8, 2, 4),
(8, 2, 5),
(8, 2, 6),
(8, 3, 2),
(8, 3, 3),
(8, 3, 4),
(9, 2, 1),
(10, 2, 1),
(11, 2, 1),
(12, 1, 3),
(12, 1, 4),
(12, 2, 1),
(12, 2, 2),
(12, 2, 3),
(12, 2, 4),
(12, 2, 6),
(12, 3, 1),
(12, 3, 2),
(12, 3, 6),
(13, 1, 3),
(13, 1, 4),
(13, 2, 1),
(13, 2, 2),
(13, 2, 3),
(13, 2, 4),
(13, 2, 6),
(13, 3, 1),
(13, 3, 2),
(13, 3, 6),
(14, 2, 1),
(15, 2, 1),
(16, 1, 2),
(16, 1, 3),
(16, 1, 4),
(16, 1, 5),
(16, 1, 6),
(16, 2, 1),
(16, 2, 2),
(16, 3, 1),
(16, 3, 2),
(20, 1, 1),
(20, 2, 1),
(20, 2, 2),
(20, 2, 3),
(20, 2, 4),
(20, 2, 5),
(21, 2, 1),
(22, 1, 3),
(22, 1, 4),
(22, 2, 1),
(22, 2, 2),
(22, 3, 5),
(22, 3, 6),
(23, 1, 1),
(23, 2, 1),
(23, 2, 3),
(23, 3, 1),
(24, 1, 2),
(24, 2, 2),
(24, 3, 2),
(25, 1, 1),
(25, 1, 2),
(25, 1, 3),
(25, 1, 4),
(25, 2, 1),
(25, 2, 2),
(25, 2, 3),
(25, 2, 4),
(25, 3, 1),
(25, 3, 3),
(25, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `exam_to_course`
--

DROP TABLE IF EXISTS `exam_to_course`;
CREATE TABLE IF NOT EXISTS `exam_to_course` (
  `exam_id` int(6) UNSIGNED NOT NULL,
  `program_id` int(6) UNSIGNED NOT NULL,
  PRIMARY KEY (`exam_id`,`program_id`),
  UNIQUE KEY `exam_id` (`exam_id`,`program_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fee`
--

DROP TABLE IF EXISTS `fee`;
CREATE TABLE IF NOT EXISTS `fee` (
  `fee_id` int(11) NOT NULL AUTO_INCREMENT,
  `recipt_no` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_code` varchar(6) NOT NULL,
  `fee_amount` decimal(7,2) NOT NULL,
  `concession` decimal(7,2) NOT NULL,
  `late_fee` decimal(7,2) NOT NULL,
  `payable_amount` decimal(7,2) NOT NULL,
  `paid_amount` decimal(7,2) NOT NULL,
  `due` decimal(7,2) NOT NULL,
  `month_of` tinyint(2) NOT NULL,
  `month_of_2` tinyint(2) NOT NULL DEFAULT '0',
  `add_date` datetime NOT NULL,
  `session_year` varchar(10) NOT NULL,
  PRIMARY KEY (`fee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fee`
--

INSERT INTO `fee` (`fee_id`, `recipt_no`, `student_id`, `course_code`, `fee_amount`, `concession`, `late_fee`, `payable_amount`, `paid_amount`, `due`, `month_of`, `month_of_2`, `add_date`, `session_year`) VALUES
(11, 1081, 1, 'JNI01', '1800.00', '0.00', '0.00', '1800.00', '1800.00', '0.00', 5, 6, '2017-05-22 15:40:46', ''),
(12, 1082, 2, 'JNI01', '1800.00', '0.00', '0.00', '1800.00', '1800.00', '0.00', 5, 6, '2017-05-22 16:00:51', '');

-- --------------------------------------------------------

--
-- Table structure for table `fee_breakup`
--

DROP TABLE IF EXISTS `fee_breakup`;
CREATE TABLE IF NOT EXISTS `fee_breakup` (
  `fee_breakup_id` int(11) NOT NULL AUTO_INCREMENT,
  `fee_breakup_name` varchar(50) NOT NULL,
  `add_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  PRIMARY KEY (`fee_breakup_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fee_breakup`
--

INSERT INTO `fee_breakup` (`fee_breakup_id`, `fee_breakup_name`, `add_date`, `update_date`) VALUES
(1, 'Term Fee', '2017-04-15 11:03:56', '2017-04-15 11:34:36'),
(2, 'Tution Fee', '2017-04-15 11:35:43', '0000-00-00 00:00:00'),
(3, 'Computer Fee', '2017-04-15 11:35:55', '0000-00-00 00:00:00'),
(4, 'Maintenance', '2017-04-15 11:36:33', '0000-00-00 00:00:00'),
(5, 'Game and Others', '2017-04-15 11:36:59', '0000-00-00 00:00:00'),
(6, 'Diary and Magazine', '2017-04-15 11:37:40', '0000-00-00 00:00:00'),
(7, 'SMS', '2017-04-15 11:38:03', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `fee_structure`
--

DROP TABLE IF EXISTS `fee_structure`;
CREATE TABLE IF NOT EXISTS `fee_structure` (
  `fee_structure_id` int(11) NOT NULL AUTO_INCREMENT,
  `fee_breakup_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `frequency` tinyint(1) NOT NULL COMMENT '1-once,2-two,3-three,6-six,12-every,99-off',
  `fee` decimal(7,2) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `session_year` varchar(10) NOT NULL,
  `add_date` datetime NOT NULL,
  PRIMARY KEY (`fee_structure_id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fee_structure`
--

INSERT INTO `fee_structure` (`fee_structure_id`, `fee_breakup_id`, `course_id`, `frequency`, `fee`, `status`, `session_year`, `add_date`) VALUES
(1, 1, 1, 1, '2800.00', 1, '2017-18', '2017-04-15 12:07:27'),
(2, 2, 1, 12, '600.00', 1, '2017-18', '2017-04-15 12:07:27'),
(3, 3, 1, 12, '100.00', 1, '2017-18', '2017-04-15 12:07:27'),
(4, 4, 1, 12, '200.00', 1, '2017-18', '2017-04-15 12:07:27'),
(5, 5, 1, 1, '200.00', 1, '2017-18', '2017-04-15 12:07:27'),
(6, 6, 1, 1, '300.00', 1, '2017-18', '2017-04-15 12:07:27'),
(7, 7, 1, 1, '400.00', 1, '2017-18', '2017-04-15 12:07:27'),
(47, 1, 2, 1, '1000.00', 1, '2017-18', '2017-04-19 17:26:29'),
(48, 2, 2, 12, '600.00', 1, '2017-18', '2017-04-19 17:26:29'),
(49, 3, 2, 12, '40.00', 1, '2017-18', '2017-04-19 17:26:29'),
(50, 4, 2, 12, '20.00', 1, '2017-18', '2017-04-19 17:26:29'),
(51, 7, 2, 1, '120.00', 1, '2017-18', '2017-04-19 17:26:29'),
(52, 1, 4, 1, '300.00', 1, '2017-18', '2017-04-19 17:29:42'),
(53, 2, 4, 12, '350.00', 1, '2017-18', '2017-04-19 17:29:42'),
(54, 3, 4, 12, '50.00', 1, '2017-18', '2017-04-19 17:29:42'),
(55, 4, 4, 12, '200.00', 1, '2017-18', '2017-04-19 17:29:42'),
(56, 5, 4, 1, '150.00', 1, '2017-18', '2017-04-19 17:29:43'),
(57, 6, 4, 1, '100.00', 1, '2017-18', '2017-04-19 17:29:43'),
(58, 7, 4, 1, '250.00', 1, '2017-18', '2017-04-19 17:29:43');

-- --------------------------------------------------------

--
-- Table structure for table `fee_to_feebreak_up`
--

DROP TABLE IF EXISTS `fee_to_feebreak_up`;
CREATE TABLE IF NOT EXISTS `fee_to_feebreak_up` (
  `fee_id` int(11) NOT NULL,
  `feebreak_up_id` int(11) NOT NULL,
  `fee` decimal(7,2) NOT NULL,
  PRIMARY KEY (`fee_id`,`feebreak_up_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fee_to_feebreak_up`
--

INSERT INTO `fee_to_feebreak_up` (`fee_id`, `feebreak_up_id`, `fee`) VALUES
(1, 1, '100.00'),
(1, 2, '200.00'),
(1, 3, '100.00'),
(1, 4, '100.00'),
(1, 5, '200.00'),
(1, 6, '200.00'),
(1, 7, '100.00'),
(1, 8, '100.00'),
(1, 9, '100.00'),
(1, 10, '100.00'),
(1, 11, '300.00'),
(1, 12, '250.00'),
(1, 13, '400.00'),
(1, 14, '100.00'),
(1, 15, '350.00'),
(1, 16, '1000.00'),
(1, 17, '150.00'),
(1, 18, '350.00'),
(2, 1, '100.00'),
(2, 2, '200.00'),
(2, 3, '0.00'),
(2, 4, '0.00'),
(2, 5, '0.00'),
(2, 6, '200.00'),
(2, 7, '100.00'),
(2, 8, '100.00'),
(2, 9, '0.00'),
(2, 10, '0.00'),
(2, 11, '300.00'),
(2, 12, '0.00'),
(2, 13, '400.00'),
(2, 14, '100.00'),
(2, 15, '0.00'),
(2, 16, '1000.00'),
(2, 17, '150.00'),
(2, 18, '350.00'),
(3, 1, '0.00'),
(3, 2, '0.00'),
(3, 3, '0.00'),
(3, 4, '0.00'),
(3, 5, '0.00'),
(3, 6, '0.00'),
(3, 7, '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(300) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `text`, `created_at`) VALUES
(2, 'back paper registration will start from 4-04-2020', '2020-05-08 10:29:51'),
(3, 'admitcard will be available form the date 06-06-2020.', '2020-05-08 10:29:51'),
(4, 'Due to COVID-19 pandemic all activities regarding exams are postpone till further notification. ', '2020-05-08 10:31:44'),
(16, 'This is dummy notification. and we are testing mode.', '2020-06-04 12:10:08'),
(13, 'Please get attest your admitcard form HOD office of your department before exaams.', '2020-05-08 10:36:04');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

DROP TABLE IF EXISTS `programs`;
CREATE TABLE IF NOT EXISTS `programs` (
  `program_id` int(11) NOT NULL AUTO_INCREMENT,
  `program_code` text NOT NULL,
  `program_name` varchar(50) NOT NULL,
  `no_of_semester` int(11) NOT NULL,
  `fee_per_semester` decimal(7,2) NOT NULL,
  `department_id` int(11) NOT NULL,
  `add_date` date NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`program_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`program_id`, `program_code`, `program_name`, `no_of_semester`, `fee_per_semester`, `department_id`, `add_date`, `status`) VALUES
(1, 'MCA', 'Master of Computer Application', 6, '31500.00', 2, '2019-10-20', 1),
(2, 'BCA', 'Bachelors of Computer Application', 6, '28000.00', 2, '2019-10-21', 1),
(3, 'MSC_CS', 'MSC', 6, '20000.00', 2, '2020-02-08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `program_structure_credit`
--

DROP TABLE IF EXISTS `program_structure_credit`;
CREATE TABLE IF NOT EXISTS `program_structure_credit` (
  `psc_id` int(11) NOT NULL AUTO_INCREMENT,
  `program_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `credit` int(3) NOT NULL,
  `lecture` tinyint(3) NOT NULL DEFAULT '0',
  `tutorial` tinyint(3) NOT NULL DEFAULT '0',
  `practical` tinyint(3) NOT NULL DEFAULT '0',
  `project` tinyint(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`psc_id`),
  UNIQUE KEY `program_id` (`program_id`,`course_id`,`semester`),
  UNIQUE KEY `program_id_2` (`program_id`,`course_id`,`semester`),
  UNIQUE KEY `program_id_3` (`program_id`,`course_id`,`semester`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `program_structure_credit`
--

INSERT INTO `program_structure_credit` (`psc_id`, `program_id`, `course_id`, `semester`, `credit`, `lecture`, `tutorial`, `practical`, `project`) VALUES
(1, 1, 1, 1, 5, 2, 1, 2, 0),
(3, 1, 2, 1, 4, 3, 0, 1, 0),
(4, 1, 3, 1, 4, 3, 1, 0, 0),
(7, 1, 4, 2, 4, 3, 0, 1, 0),
(8, 1, 5, 2, 4, 2, 1, 1, 0),
(9, 1, 6, 2, 3, 2, 1, 0, 0),
(10, 1, 7, 2, 4, 3, 0, 1, 0),
(11, 1, 8, 3, 3, 2, 1, 0, 0),
(12, 1, 9, 3, 4, 2, 1, 1, 0),
(13, 1, 10, 3, 5, 3, 1, 1, 0),
(14, 1, 11, 3, 4, 3, 0, 1, 0),
(15, 1, 12, 3, 3, 2, 1, 0, 0),
(16, 1, 13, 4, 4, 2, 1, 1, 0),
(17, 1, 14, 4, 4, 3, 0, 1, 0),
(18, 1, 15, 4, 4, 2, 0, 2, 0),
(19, 1, 16, 4, 3, 0, 0, 3, 0),
(21, 1, 17, 5, 4, 2, 0, 2, 0),
(22, 1, 18, 5, 3, 2, 1, 0, 0),
(23, 1, 19, 5, 4, 2, 1, 1, 0),
(24, 2, 20, 5, 4, 2, 1, 1, 0),
(25, 1, 21, 5, 3, 0, 1, 2, 0),
(26, 1, 22, 7, 2, 0, 0, 2, 0),
(27, 1, 23, 6, 12, 0, 0, 0, 12),
(28, 2, 24, 1, 5, 3, 1, 1, 0),
(29, 2, 25, 1, 3, 3, 0, 0, 0),
(30, 3, 26, 1, 5, 3, 1, 1, 0),
(31, 3, 27, 2, 3, 3, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

DROP TABLE IF EXISTS `schools`;
CREATE TABLE IF NOT EXISTS `schools` (
  `school_id` int(11) NOT NULL AUTO_INCREMENT,
  `school_code` varchar(12) NOT NULL,
  `school_name` varchar(100) NOT NULL,
  `add_date` date NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`school_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`school_id`, `school_code`, `school_name`, `add_date`, `status`) VALUES
(1, 'DCSIT', 'DEPARTMENT OF IT AND COMPUTER SCIENCE', '2019-10-19', 1),
(2, 'JSBS', 'JCOB MANAGEMENT', '2019-10-19', 1),
(5, 'DDUMY', 'DUMMY DEPARTMENT', '2019-10-19', 1),
(6, 'DDUMY1', 'DUMMY DEPARTMENT', '2019-10-19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `program_id` int(6) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`student_id`),
  UNIQUE KEY `user_id` (`user_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `user_id`, `program_id`, `created_at`, `updated_at`, `status`) VALUES
(1, 3, 7, '2020-03-28 10:52:16', '0000-00-00 00:00:00', 1),
(2, 4, 1, '2020-03-28 21:39:18', '0000-00-00 00:00:00', 0),
(3, 5, 4, '2020-03-28 21:48:01', '0000-00-00 00:00:00', 0),
(4, 6, 1, '2020-03-28 21:54:37', '0000-00-00 00:00:00', 0),
(5, 7, 1, '2020-03-29 10:36:59', '0000-00-00 00:00:00', 0),
(6, 8, 1, '2020-03-29 10:38:54', '0000-00-00 00:00:00', 0),
(7, 9, 1, '2020-03-29 10:39:54', '0000-00-00 00:00:00', 0),
(8, 10, 1, '2020-04-01 20:14:41', '0000-00-00 00:00:00', 0),
(9, 11, 1, '2020-04-01 20:17:06', '0000-00-00 00:00:00', 0),
(10, 12, 2, '2020-04-02 19:23:45', '0000-00-00 00:00:00', 0),
(11, 13, 2, '2020-04-27 10:04:28', '0000-00-00 00:00:00', 0),
(12, 14, 3, '2020-04-27 10:34:40', '0000-00-00 00:00:00', 0),
(14, 16, 2, '2020-06-04 11:31:52', '0000-00-00 00:00:00', 0),
(15, 17, 3, '2020-06-04 12:00:38', '0000-00-00 00:00:00', 0),
(16, 18, 2, '2020-06-09 11:39:48', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_address`
--

DROP TABLE IF EXISTS `student_address`;
CREATE TABLE IF NOT EXISTS `student_address` (
  `address_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `mailing_address` varchar(250) NOT NULL,
  `m_town_village` varchar(100) NOT NULL,
  `m_city` varchar(50) NOT NULL,
  `m_pin` varchar(7) NOT NULL,
  `m_state` varchar(50) NOT NULL,
  `permanent_address` varchar(250) NOT NULL,
  `p_town_village` varchar(100) NOT NULL,
  `p_city` varchar(50) NOT NULL,
  `p_pin` varchar(7) NOT NULL,
  `p_state` varchar(50) NOT NULL,
  PRIMARY KEY (`address_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_address`
--

INSERT INTO `student_address` (`address_id`, `student_id`, `mailing_address`, `m_town_village`, `m_city`, `m_pin`, `m_state`, `permanent_address`, `p_town_village`, `p_city`, `p_pin`, `p_state`) VALUES
(1, 1, 'mail address sssss', 'chhota baghara', 'allahabad', '211002', 'UP', 'mail address sssss', 'chhota baghara', 'Aallahabad', '211002', 'UP'),
(2, 2, 'mailing addresssssss', 'town', 'allahabad', '211002', 'state', 'mailing addresssssss', 'town', 'allahabad', '211002', 'state'),
(3, 3, 'mail address allahabad', 'keetganj', 'allahabad', '211002', 'up', 'mail address allahabad', 'keetganj', 'allahabad', '211002', 'up'),
(4, 4, 'mail address of student', 'town', 'allahabad', '211002', 'state', 'permanet addressss', 'town p', 'allahabad', '211002', 'state'),
(5, 5, 'mail addresss hai', 'town', 'city', '211002', 'state', 'mail addresss hai', 'town', 'city', '211002', 'state'),
(6, 6, 'mail addressssss', 'toen', 'city', '211002', 'state', 'mail addressssss', 'toen', 'city', '211002', 'state'),
(7, 7, 'mail addressssss', 'town', 'allahabad', '211002', 'state', 'mail addressssss', 'town', 'allahabad', '211002', 'state'),
(8, 8, 'mail addressssss', 'village', 'city', '211002', 'state', 'mail addressssss', 'village', 'city', '211002', 'state');

-- --------------------------------------------------------

--
-- Table structure for table `student_marks`
--

DROP TABLE IF EXISTS `student_marks`;
CREATE TABLE IF NOT EXISTS `student_marks` (
  `student_mark_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_mark_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `obtained_marks` tinyint(4) NOT NULL,
  `session_year` varchar(10) NOT NULL,
  PRIMARY KEY (`student_mark_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_marks`
--

INSERT INTO `student_marks` (`student_mark_id`, `subject_mark_id`, `student_id`, `obtained_marks`, `session_year`) VALUES
(1, 1, 1, 45, '2017-18'),
(2, 1, 2, 25, '2017-18'),
(3, 1, 4, 3, '2017-18'),
(4, 1, 5, 6, '2017-18'),
(5, 1, 6, 5, '2017-18'),
(6, 1, 7, 4, '2017-18'),
(7, 1, 8, 8, '2017-18'),
(8, 2, 1, 45, '2017-18'),
(9, 2, 2, 25, '2017-18'),
(10, 2, 4, 48, '2017-18'),
(11, 2, 5, 15, '2017-18'),
(12, 2, 6, 44, '2017-18'),
(13, 2, 7, 45, '2017-18'),
(14, 2, 8, 45, '2017-18'),
(15, 3, 1, 66, '2017-18'),
(16, 3, 2, 36, '2017-18'),
(17, 3, 4, 48, '2017-18'),
(18, 3, 5, 55, '2017-18'),
(19, 3, 6, 56, '2017-18'),
(20, 3, 7, 15, '2017-18'),
(21, 3, 8, 70, '2017-18');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

DROP TABLE IF EXISTS `teachers`;
CREATE TABLE IF NOT EXISTS `teachers` (
  `teacher_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `salt` varchar(10) NOT NULL,
  `user_type` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `last_login` datetime NOT NULL,
  `last_password_change` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`teacher_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacher_id`, `user_id`, `name`, `password`, `salt`, `user_type`, `last_login`, `last_password_change`, `status`) VALUES
(1, 'admin', 'admin', '81dc9bdb52d04dc20036dbd8313ed055', '7110eda4d', 222, '2020-02-28 20:11:06', '2019-10-17 14:37:38', 1);

-- --------------------------------------------------------

--
-- Table structure for table `total_mark_of_subject`
--

DROP TABLE IF EXISTS `total_mark_of_subject`;
CREATE TABLE IF NOT EXISTS `total_mark_of_subject` (
  `subject_mark_id` int(11) NOT NULL,
  `exam_code` varchar(6) NOT NULL,
  `course_code` varchar(6) NOT NULL,
  `subject_code` varchar(6) NOT NULL,
  `total_mark` int(11) NOT NULL,
  `session_year` varchar(10) NOT NULL,
  PRIMARY KEY (`subject_mark_id`),
  UNIQUE KEY `exam_code` (`exam_code`,`course_code`,`subject_code`,`session_year`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `total_mark_of_subject`
--

INSERT INTO `total_mark_of_subject` (`subject_mark_id`, `exam_code`, `course_code`, `subject_code`, `total_mark`, `session_year`) VALUES
(1, 'JEX01', 'JNI01', 'JINS01', 100, '2017-18'),
(2, 'JEX01', 'JNI01', 'JINS02', 50, '2017-18'),
(3, 'JEX01', 'JNI01', 'JINS03', 70, '2017-18'),
(4, 'JEX01', 'JNI01', 'JINS04', 90, '2017-18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` smallint(4) NOT NULL COMMENT '1111=admin, 2222=student, 3333= teacher,4444=others',
  `username` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  `salt` varchar(9) NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `contact_no` varchar(13) NOT NULL,
  `email_id` varchar(191) NOT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 DEFAULT NULL,
  `ip` varchar(40) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `last_pwd_changed` date DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `type`, `username`, `password`, `salt`, `first_name`, `last_name`, `contact_no`, `email_id`, `image`, `ip`, `status`, `created_at`, `updated_at`, `last_login`, `last_pwd_changed`) VALUES
(18, 2222, '17BCA010', '81dc9bdb52d04dc20036dbd8313ed055', '7110eda4d', 'abhishek', 'yadav', '4545344322', 'abh@gmail.com', NULL, '', 1, '2020-06-09 11:39:47', NULL, NULL, NULL),
(16, 2222, '15BCA020', '81dc9bdb52d04dc20036dbd8313ed055', '7110eda4d', 'Gyanendra', 'Singh', '857484837', 'gyan@gmail.com', '161591250585.jpeg', '', 1, '2020-06-04 11:31:52', NULL, '2020-06-10 17:58:19', NULL),
(13, 2222, '17BCA22', '81dc9bdb52d04dc20036dbd8313ed055', '7110eda4d', 'arti', 'yadav', '9785875748', 'arti@gmail.com', '131587962148.jpg', '', 1, '2020-04-27 10:04:28', NULL, '2020-06-09 15:44:23', NULL),
(14, 2222, '17MSC18', '81dc9bdb52d04dc20036dbd8313ed055', '7110eda4d', 'Aman', 'Pal', '9684948499', 'arvind@gmai.com', '141587963961.jpg', '', 1, '2020-04-27 10:34:40', NULL, '2020-04-27 10:36:06', NULL),
(11, 1111, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', '7110eda4d', 'Ikshwaku', 'Pratap pal', '9807484332', 'ashish895352@gmail.com', '1.jpeg', '', 1, '2020-04-01 20:17:06', NULL, '2020-06-11 10:38:17', NULL),
(12, 2222, '17BCA12', '81dc9bdb52d04dc20036dbd8313ed055', '7110eda4d', 'Shubham', 'Singh', '9807484332', 'ashish895352@gmail.com', '121586430399.png', '', 1, '2020-04-02 19:23:45', NULL, '2020-05-23 19:49:54', NULL),
(17, 2222, '18MSC10', '81dc9bdb52d04dc20036dbd8313ed055', '7110eda4d', 'Ankit', 'Pal', '9288282928', 'ankit@gmail.com', '171591252407.jpeg', '', 1, '2020-06-04 12:00:38', NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
