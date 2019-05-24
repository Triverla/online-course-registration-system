-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 19, 2019 at 04:13 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coursereg`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `course_id` varchar(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `unit` varchar(11) NOT NULL,
  `class_level` int(3) NOT NULL,
  `department` varchar(255) NOT NULL,
  `course_lecturer` varchar(255) NOT NULL,
  `semester` varchar(45) NOT NULL,
  `descr` varchar(255) NOT NULL,
  PRIMARY KEY (`course_id`),
  UNIQUE KEY `course_id` (`course_id`),
  KEY `department` (`department`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='course table';

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `title`, `unit`, `class_level`, `department`, `course_lecturer`, `semester`, `descr`) VALUES
('BIO1101', 'GENERAL BIOLOGY I', '3', 100, 'BIO', 'MR. OBETE', 'FIRST', 'GENERAL BIOLOGY I'),
('CHEM1101', 'GENERAL CHEMISTRY I', '3', 100, 'CHEM', 'DR. OLOKO', 'FIRST', 'GENERAL CHEMISTRY I'),
('CSC1101', 'INTRODUCTION TO PROBLEM\r\nSOLVING', '3', 100, 'CSC', 'MISS EKPEZU AKON OBU', 'FIRST', 'INTRODUCTION TO PROBLEM\r\nSOLVING'),
('CSC1201', 'QBASIC', '2', 100, 'CSC', 'MR. OFUT OGAR TUMENAYU', 'SECOND', 'QBASIC'),
('CSC1202', 'PASCAL PROGRAMMING', '2', 100, 'CSC', 'MR. EMMANUEL OYO-ITA', 'SECOND', 'PASCAL PROGRAMMING'),
('CSC1203', 'INTRODUCTION TO INTERNET', '2', 100, 'CSC', 'MR.ANTHONY OTIKO O.', 'SECOND', 'INTRODUCTION TO INTERNET'),
('CSC2101', 'JAVA', '3', 200, 'CSC', 'DR. UMOH ENOIMA ESSIEN', 'FIRST', 'JAVA'),
('CSC2102', 'ASSEMBLY LANGUAGE(AL)', '3', 200, 'CSC', 'MR. EMMANUEL OYO-ITA', 'FIRST', 'ASSEMBLY LANGUAGE(AL)'),
('CSC2103', 'OPERATING SYSTEM I', '2', 200, 'CSC', 'PROF WILLIAMS EDEM E.', 'FIRST', 'OPERATING SYSTEM I'),
('CSC2201', 'PHP', '3', 200, 'CSC', 'DR. FIDELIS .I. ONAH', 'SECOND', 'PHP'),
('CSC2202', 'DATA STRUCTURES', '3', 200, 'CSC', 'MR. OYO-ITA ETIM ESU', 'SECOND', 'DATA STRUCTURES'),
('CSC2203', 'DIGITAL DESIGN', '3', 200, 'CSC', 'MISS EKPEZU AKON OBU', 'SECOND', 'DIGITAL DESIGN'),
('CSC2204', 'SWITCHING ALGEBRA AND\r\nDISCRETE STRUCTURES', '3', 200, 'CSC', 'MR. EMMANUEL OYO-ITA', 'SECOND', 'SWITCHING ALGEBRA AND\r\nDISCRETE STRUCTURES'),
('CSC2205', 'OPERATING SYSTEMS II', '2', 200, 'CSC', 'MR. OKWONG ATTE ENYINIH', 'SECOND', 'OPERATING SYSTEMS II'),
('CSC3101', 'COMPUTER ARCHITECTURES', '3', 300, 'CSC', 'DR. UMOH ENOIMA ESSIEN', 'FIRST', 'COMPUTER ARCHITECTURES'),
('CSC3102', 'SYSTEM ANALYSIS AND DESIGN', '3', 300, 'CSC', 'MR. OKWONG ATTE ENYINIHI', 'FIRST', 'SYSTEM ANALYSIS AND DESIGN'),
('CSC3103', 'NUMERICAL METHODS', '3', 300, 'CSC', 'DR. FIDELIS .I. ONAH', 'FIRST', 'NUMERICAL METHODS'),
('CSC3104', 'COMPILER CONSTRUCTION', '2', 300, 'CSC', 'MR. OBIDINU', 'FIRST', 'COMPILER CONSTRUCTION'),
('CSC3105', 'OBJECT ORIENTED\r\nPROGRAMMING', '3', 300, 'CSC', '\r\nMR. OYO-ITA ETIM ESU', 'FIRST', 'OBJECT ORIENTED\r\nPROGRAMMING'),
('CSC3106', 'ANALYSIS OF ALGORITHM', '2', 300, 'CSC', 'DR. FIDELIS .I. ONAH', 'FIRST', 'ANALYSIS OF ALGORITHM'),
('CSC3107', 'DATABASE DESIGN AND\r\nMANAGEMENT', '3', 300, 'CSC', 'MR. OFUT OGAR TUMENAYU', 'FIRST', 'DATABASE DESIGN AND\r\nMANAGEMENT'),
('CSC3201', 'SIWES(industrial Training)', '6', 300, 'CSC', 'DR. UMOH ENOIMA ESSIEN', 'SECOND', 'SIWES(industrial Training)'),
('CSC4101', 'AUTOMATA THEORY & FORMAL LANGUAGES', '3', 400, 'CSC', 'PROF. LIPCSEY ZSCLT', 'FIRST', 'AUTOMATA THEORY & FORMAL LANGUAGES'),
('CSC4102', 'ARTIFICIAL INTELLIGENCE', '2', 400, 'CSC', 'PROF. OLIVER .E. OSUAGWU', 'FIRST', 'ARTIFICIAL INTELLIGENCE'),
('CSC4103', 'SOFTWARE ENGINEERING', '2', 400, 'CSC', 'DR. ORUOK', 'FIRST', 'SOFTWARE ENGINEERING'),
('CSC4104', 'SYSTEM MODELLING & SIMULATION', '2', 400, 'CSC', ' MR.OBIDINU', 'FIRST', 'SYSTEM MODELLING &SIMULATION'),
('CSC4105', 'COMPUTER NETWORK & COMMUNICATION', '3', 400, 'CSC', 'PROF. CHUKWUGOZIEM .I.', 'FIRST', 'COMPUTER NETWORK & COMMUNICATION'),
('CSC4106', 'SPECIAL TOPICS IN COMPUTER SCIENCE', '2', 400, 'CSC', 'DR. UMOH ENOIMA ESSIEN', 'FIRST', 'SPECIAL TOPICS IN COMPUTER SCIENCE'),
('CSC4107', 'NET-CENTRIC COMPUTING', '3', 400, 'CSC', 'MR. PRINCE ANA', 'FIRST', 'NET-CENTRIC COMPUTING'),
('CSC4200', 'PROJECT', '6', 400, 'CSC', 'DR. UMOH ENOIMA ESSIEN', 'SECOND', 'PROJECT'),
('CSC4201', 'QUEUING SYSTEM', '2', 400, 'CSC', 'DR. ORUOK', 'SECOND', 'QUEUING SYSTEM'),
('CSC4202', 'COMPUTER NETWORKS ADMINISTRATION', '3', 400, 'CSC', 'MR. PRINCE ANA', 'SECOND', 'COMPUTER NETWORKS ADMINISTRATION'),
('CSC4203', 'SOFTWARE PROJECT MANAGEMENT', '2', 400, 'CSC', ' DR. UMOH ENOIMA ESSIEN', 'SECOND', 'SOFTWARE PROJECT MANAGEMENT'),
('CSC4204', 'COMPUTER GRAPHICS AND VISUALIZATION', '3', 400, 'CSC', ' MR.OBIDINU', 'SECOND', 'COMPUTER GRAPHICS AND VISUALIZATION'),
('CSC4205', 'OPERATION RESEARCH', '3', 400, 'CSC', 'DR. FIDELIS .I. ONAH', 'SECOND', 'OPERATION RESEARCH'),
('ENT2101', 'ENTERPRENEURSHIP STUDY I', '2', 200, 'ENT', 'DR. ADEBISI .A. .A', 'FIRST', 'ENTERPRENEURSHIP STUDY I'),
('ENT2201', 'ENTERPRENEURSHIP STUDY II', '2', 200, 'ENT', 'DR. ADEBISI .A. .A.', 'SECOND', 'ENTERPRENEURSHIP STUDY II'),
('GSS1101', 'USE OF ENGLISH AND\r\nCOMMUNICATION SKILL I', '2', 100, 'GSS', 'PROF. ETIEWO', 'FIRST', 'USE OF ENGLISH AND\r\nCOMMUNICATION SKILL I'),
('GSS1102', 'PHILOSOPHY AND LOGIC', '2', 100, 'GSS', 'MR ONYA', 'FIRST', 'PHILOSOPHY AND LOGIC'),
('GSS1103', 'INTRODUCTION TO COMPUTER\r\nSCIENCE', '2', 100, 'GSS', 'MR PRINCE ANA', 'FIRST', 'INTRODUCTION TO COMPUTER\r\nSCIENCE'),
('GSS1201', 'USE OF ENGLISH AND\r\nCOMMUNICATION SKILL II', '2', 100, 'GSS', 'PROF. ETIEWO', 'SECOND', 'USE OF ENGLISH AND\r\nCOMMUNICATION SKILL II'),
('GSS1202', 'NIGERIAN PEOPLE AND\r\nCULTURE', '2', 100, 'GSS', 'DR. OFEM', 'SECOND', 'NIGERIAN PEOPLE AND\r\nCULTURE'),
('GSS1203', 'HISTORY AND PHILOSOPHY OF\r\nSCIENCE', '2', 100, 'GSS', 'MR ONYA', 'SECOND', 'HISTORY AND PHILOSOPHY OF\r\nSCIENCE'),
('GSS2101', 'PEACE AND CONFLICT STUDIES', '2', 200, 'GSS', 'DR. ELOMA', 'FIRST', 'PEACE AND CONFLICT STUDIES'),
('MTH1101', 'GENERAL MATHEMATICS I', '3', 100, 'MTH', 'MR ODOK', 'FIRST', 'GENERAL MATHEMATICS I'),
('MTH1201', 'GENERAL MATHEMATICS II', '3', 100, 'MTH', 'MR. ODOK', 'SECOND', 'GENERAL MATHEMATICS II'),
('MTH1202', 'GENERAL MATHEMATICS III', '3', 100, 'MTH', 'OKOYI JASPER', 'SECOND', 'GENERAL MATHEMATICS III'),
('MTH2103', 'LINEAR ALGEBRA', '3', 200, 'MTH', 'MR. ATSU', 'FIRST', 'LINEAR ALGEBRA'),
('MTH2104', 'MATHEMATICAL METHODS', '3', 200, 'CSC', 'MR. ATSU', 'FIRST', 'MATHEMATICAL METHODS'),
('MTH2201', 'LINEAR ALGEBRA II', '3', 200, 'MTH', 'MR. ATSU', 'SECOND', 'LINEAR ALGEBRA II'),
('PHY1101', 'GENERAL PHYSICS I', '3', 100, 'PHY', 'DR. AKAMPA', 'FIRST', 'GENERAL PHYSICS I'),
('PHY1104', 'PRACTICAL PHYSICS', '1', 100, 'PHY', 'DR. AKAMPA', 'FIRST', 'PRACTICAL PHYSICS'),
('PHY1201', 'GENERAL PHYSICS II', '3', 100, 'PHY', 'DR. AKAMPA', 'SECOND', 'GENERAL PHYSICS II'),
('STA1201', 'STATISTICS', '2', 100, 'STA', 'STATISTICS', 'SECOND', 'STATISTICS');

-- --------------------------------------------------------

--
-- Table structure for table `courses_offered`
--

DROP TABLE IF EXISTS `courses_offered`;
CREATE TABLE IF NOT EXISTS `courses_offered` (
  `course_id` varchar(45) NOT NULL,
  `title` varchar(45) NOT NULL,
  `lecturer_id` varchar(45) NOT NULL,
  `sessionid` varchar(45) NOT NULL DEFAULT '2018/2019',
  `semester` varchar(45) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `students_registered` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`course_id`,`lecturer_id`,`sessionid`,`status`),
  KEY `session_id` (`sessionid`),
  KEY `lecturer_id` (`lecturer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='courses offered per level';

--
-- Dumping data for table `courses_offered`
--

INSERT INTO `courses_offered` (`course_id`, `title`, `lecturer_id`, `sessionid`, `semester`, `status`, `students_registered`) VALUES
('BIO1101', 'GENERAL BIOLOGY I', 'MR. OBETE', '2018/2019', 'FIRST', 1, 2),
('CHEM1101', 'GENERAL CHEMISTRY I', 'DR. OLOKO', '2018/2019', 'FIRST', 1, 2),
('CMP101', 'INTRO', 'MR PAUL', '2018/2019', 'FIRST', 1, 0),
('CSC1101', 'INTRODUCTION TO PROBLEM\r\nSOLVING', 'MISS EKPEZU AKON OBU', '2018/2019', 'FIRST', 1, 2),
('CSC2101', 'JAVA', 'DR. UMOH ENOIMA ESSIEN', '2018/2019', 'FIRST', 1, 2),
('CSC2102', 'ASSEMBLY LANGUAGE(AL)', 'MR. EMMANUEL OYO-ITA', '2018/2019', 'FIRST', 1, 2),
('CSC2103', 'OPERATING SYSTEM I', 'PROF WILLIAMS EDEM E.', '2018/2019', 'FIRST', 1, 2),
('CSC3101', 'COMPUTER ARCHITECTURES', 'DR. UMOH ENOIMA ESSIEN', '2018/2019', 'FIRST', 1, 2),
('CSC3102', 'SYSTEM ANALYSIS AND DESIGN', 'MR. OKWONG ATTE ENYINIHI', '2018/2019', 'FIRST', 1, 2),
('CSC3103', 'NUMERICAL METHODS', 'DR. FIDELIS .I. ONAH', '2018/2019', 'FIRST', 1, 2),
('CSC3104', 'COMPILER CONSTRUCTION', 'MR. OBIDINU', '2018/2019', 'FIRST', 1, 2),
('CSC3105', 'OBJECT ORIENTED\r\nPROGRAMMING', '\r\nMR. OYO-ITA ETIM ESU', '2018/2019', 'FIRST', 1, 2),
('CSC3106', 'ANALYSIS OF ALGORITHM', 'DR. FIDELIS .I. ONAH', '2018/2019', 'FIRST', 1, 2),
('CSC3107', 'DATABASE DESIGN AND\r\nMANAGEMENT', 'MR. OFUT OGAR TUMENAYU', '2018/2019', 'FIRST', 1, 2),
('CSC4101', 'AUTOMATA THEORY & FORMAL LANGUAGES', 'PROF. LIPCSEY ZSCLT', '2018/2019', 'FIRST', 1, 1),
('CSC4102', 'ARTIFICIAL INTELLIGENCE', 'PROF. OLIVER .E. OSUAGWU', '2018/2019', 'FIRST', 1, 1),
('CSC4103', 'SOFTWARE ENGINEERING', 'DR. ORUOK', '2018/2019', 'FIRST', 1, 0),
('CSC4104', 'SYSTEM MODELLING & SIMULATION', ' MR.OBIDINU', '2018/2019', 'FIRST', 1, 0),
('CSC4105', 'COMPUTER NETWORK & COMMUNICATION', 'PROF. CHUKWUGOZIEM .I.', '2018/2019', 'FIRST', 1, 0),
('CSC4106', 'SPECIAL TOPICS IN COMPUTER SCIENCE', 'DR. UMOH ENOIMA ESSIEN', '2018/2019', 'FIRST', 1, 0),
('CSC4107', 'NET-CENTRIC COMPUTING', 'MR. PRINCE ANA', '2018/2019', 'FIRST', 1, 0),
('ENT2101', 'ENTERPRENEURSHIP STUDY I', 'DR. ADEBISI .A. .A', '2018/2019', 'FIRST', 1, 2),
('GSS1101', 'USE OF ENGLISH AND\r\nCOMMUNICATION SKILL I', 'PROF. ETIEWO', '2018/2019', 'FIRST', 1, 1),
('GSS1102', 'PHILOSOPHY AND LOGIC', 'MR ONYA', '2018/2019', 'FIRST', 1, 1),
('GSS1103', 'INTRODUCTION TO COMPUTER\r\nSCIENCE', 'MR PRINCE ANA', '2018/2019', 'FIRST', 1, 1),
('GSS2101', 'PEACE AND CONFLICT STUDIES', 'DR. ELOMA', '2018/2019', 'FIRST', 1, 2),
('MTH1101', 'GENERAL MATHEMATICS I', 'MR ODOK', '2018/2019', 'FIRST', 1, 4),
('MTH2103', 'LINEAR ALGEBRA', 'MR. ATSU', '2018/2019', 'FIRST', 1, 2),
('MTH2104', 'MATHEMATICAL METHODS', 'MR. ATSU', '2018/2019', 'FIRST', 1, 2),
('PHY1101', 'GENERAL PHYSICS I', 'DR. AKAMPA', '2018/2019', 'FIRST', 1, 2),
('PHY1104', 'PRACTICAL PHYSICS', 'DR. AKAMPA', '2018/2019', 'FIRST', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `course_lecturer`
--

DROP TABLE IF EXISTS `course_lecturer`;
CREATE TABLE IF NOT EXISTS `course_lecturer` (
  `lecturer_name` varchar(45) NOT NULL,
  `course_id` varchar(45) NOT NULL,
  `registered_students` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_lecturer`
--

INSERT INTO `course_lecturer` (`lecturer_name`, `course_id`, `registered_students`) VALUES
('MR PAUL', 'CMP101', 0),
('PROF. LIPCSEY ZSCLT', 'CSC4101', 0),
('PROF. OLIVER .E. OSUAGWU', 'CSC4102', 0),
('DR. ORUOK', 'CSC4103', 0),
(' MR.OBIDINU', 'CSC4104', 0),
('PROF. CHUKWUGOZIEM .I.', 'CSC4105', 0),
('DR. UMOH ENOIMA ESSIEN', 'CSC4106', 0),
('MR. PRINCE ANA', 'CSC4107', 0),
('DR. UMOH ENOIMA ESSIEN', 'CSC4200', 0),
('DR. ORUOK', 'CSC4201', 0),
('MR. PRINCE ANA', 'CSC4202', 0),
(' DR. UMOH ENOIMA ESSIEN', 'CSC4203', 0),
(' MR.OBIDINU', 'CSC4204', 0),
('DR. FIDELIS .I. ONAH', 'CSC4205', 0);

-- --------------------------------------------------------

--
-- Table structure for table `course_registered`
--

DROP TABLE IF EXISTS `course_registered`;
CREATE TABLE IF NOT EXISTS `course_registered` (
  `sid` varchar(100) NOT NULL,
  `course_id` varchar(255) NOT NULL,
  `sessionid` varchar(45) NOT NULL,
  `type` varchar(45) NOT NULL,
  `status` tinyint(45) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_registered`
--

INSERT INTO `course_registered` (`sid`, `course_id`, `sessionid`, `type`, `status`) VALUES
('csc184321', 'CSC2101', '2018/2019', 'CORE', 1),
('csc184321', 'CSC2102', '2018/2019', 'CORE', 1),
('csc184321', 'CSC2103', '2018/2019', 'CORE', 1),
('csc184321', 'ENT2101', '2018/2019', 'CORE', 1),
('csc184321', 'GSS2101', '2018/2019', 'CORE', 1),
('csc184321', 'MTH2103', '2018/2019', 'CORE', 1),
('csc184321', 'MTH2104', '2018/2019', 'CORE', 1),
('csc171234', 'CSC3101', '2018/2019', 'CORE', 1),
('csc171234', 'CSC3102', '2018/2019', 'CORE', 1),
('csc171234', 'CSC3103', '2018/2019', 'CORE', 1),
('csc171234', 'CSC3104', '2018/2019', 'CORE', 1),
('csc171234', 'CSC3105', '2018/2019', 'CORE', 1),
('csc171234', 'CSC3106', '2018/2019', 'CORE', 1),
('csc171234', 'CSC3107', '2018/2019', 'CORE', 1),
('csc171234', 'BIO1101', '2018/2019', 'CO', 1),
('csc171234', 'CSC1101', '2018/2019', 'CO', 1),
('csc171234', 'MTH1101', '2018/2019', 'CO', 1),
('csc171234', 'PHY1104', '2018/2019', 'CO', 1),
('csc141234', 'CSC4101', '2018/2019', 'CORE', 1),
('csc141234', 'CSC4102', '2018/2019', 'CORE', 1),
('csc141234', 'CSC4103', '2018/2019', 'CORE', 1),
('csc141234', 'CSC4104', '2018/2019', 'CORE', 1),
('csc141234', 'CSC4105', '2018/2019', 'CORE', 1),
('csc141234', 'CSC4106', '2018/2019', 'CORE', 1),
('csc141234', 'CSC4107', '2018/2019', 'CORE', 1),
('JOY101', 'CSC3101', '2018/2019', 'CORE', 1),
('JOY101', 'CSC3102', '2018/2019', 'CORE', 1),
('JOY101', 'CSC3103', '2018/2019', 'CORE', 1),
('JOY101', 'CSC3104', '2018/2019', 'CORE', 1),
('JOY101', 'CSC3105', '2018/2019', 'CORE', 1),
('JOY101', 'CSC3106', '2018/2019', 'CORE', 1),
('JOY101', 'CSC3107', '2018/2019', 'CORE', 1),
('JOY101', 'MTH1101', '2018/2019', 'CO', 1),
('csc181234', 'BIO1101', '2018/2019', 'CORE', 1),
('csc181234', 'CHEM1101', '2018/2019', 'CORE', 1),
('csc181234', 'CSC1101', '2018/2019', 'CORE', 1),
('csc181234', 'GSS1101', '2018/2019', 'CORE', 1),
('csc181234', 'GSS1102', '2018/2019', 'CORE', 1),
('csc181234', 'GSS1103', '2018/2019', 'CORE', 1),
('csc181234', 'MTH1101', '2018/2019', 'CORE', 1),
('csc181234', 'PHY1101', '2018/2019', 'CORE', 1),
('csc181234', 'PHY1104', '2018/2019', 'CORE', 1),
('csc185678', 'CHEM1101', '2018/2019', 'CO', 1),
('csc185678', 'PHY1104', '2018/2019', 'CO', 1),
('csc185678', 'CSC2101', '2018/2019', 'CORE', 1),
('csc185678', 'CSC2102', '2018/2019', 'CORE', 1),
('csc185678', 'CSC2103', '2018/2019', 'CORE', 1),
('csc185678', 'ENT2101', '2018/2019', 'CORE', 1),
('csc185678', 'GSS2101', '2018/2019', 'CORE', 1),
('csc185678', 'MTH2103', '2018/2019', 'CORE', 1),
('csc185678', 'MTH2104', '2018/2019', 'CORE', 1),
('csc185678', 'MTH1101', '2018/2019', 'CO', 1),
('csc185678', 'PHY1101', '2018/2019', 'CO', 1);

-- --------------------------------------------------------

--
-- Table structure for table `credit_limit`
--

DROP TABLE IF EXISTS `credit_limit`;
CREATE TABLE IF NOT EXISTS `credit_limit` (
  `class_level` varchar(45) NOT NULL,
  `min_credit` int(11) NOT NULL,
  `max_credit` int(11) NOT NULL,
  `residency` varchar(45) NOT NULL,
  PRIMARY KEY (`class_level`,`residency`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE IF NOT EXISTS `department` (
  `dept_id` varchar(45) NOT NULL,
  `dept_name` varchar(45) NOT NULL,
  PRIMARY KEY (`dept_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_name`) VALUES
('BIO', 'BIOLOGY'),
('CHEM', 'CHEMISTRY'),
('CSC', 'COMPUTER SCIENCE'),
('ENT', 'ENTREPRENEURSHIP STUDIES'),
('GSS', 'GENERAL STUDIES'),
('MTH', 'MATHEMATICS'),
('PHY', 'PHYSICS'),
('STA', 'STATISTICS');

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

DROP TABLE IF EXISTS `lecturer`;
CREATE TABLE IF NOT EXISTS `lecturer` (
  `lecturer_id` varchar(45) NOT NULL,
  `lecturer_name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `course_id` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  PRIMARY KEY (`lecturer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `sessionid` varchar(45) NOT NULL,
  `semester` varchar(45) NOT NULL DEFAULT 'FIRST',
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sessionid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='session dates';

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`sessionid`, `semester`, `start_date`, `end_date`, `status`) VALUES
('2018/2019', 'FIRST', '2018-01-02', '2018-12-22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `password`, `email`) VALUES
('', '', '', ''),
('ADM101', 'cranium', 'qwerty', 'cranium@crutech.edu.ng'),
('qw101', 'qwerty', 'qwert', 'qwert@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_students`
--

DROP TABLE IF EXISTS `tbl_students`;
CREATE TABLE IF NOT EXISTS `tbl_students` (
  `sid` varchar(45) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `department` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `gpa` varchar(45) NOT NULL,
  `tce` int(3) NOT NULL,
  `level` int(3) NOT NULL,
  `dob` date NOT NULL,
  `phone` varchar(15) NOT NULL,
  `courseofstudy` varchar(100) NOT NULL,
  `entryyr` int(4) NOT NULL,
  `gradyr` int(4) NOT NULL,
  `profileimg` varchar(45) NOT NULL DEFAULT 'avatar.png',
  `lastlogin` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_students`
--

INSERT INTO `tbl_students` (`sid`, `first_name`, `last_name`, `password`, `department`, `email`, `gpa`, `tce`, `level`, `dob`, `phone`, `courseofstudy`, `entryyr`, `gradyr`, `profileimg`, `lastlogin`) VALUES
('csc141234', 'johnnie', 'Fortune', 'moses', 'Computer Science', 'jf@crutech.edu.ng', '2', 98, 400, '2018-11-30', '08123456789', 'BSC. COMPUTER SCIENCE', 2015, 2018, 'avatar.png', '2018-11-10 18:00:30'),
('csc171234', 'Tessy', 'Hendrick', 'tessy', 'COMPUTER SCIENCE', 'tessyH@crutech.edu.ng', '4', 120, 300, '2018-11-14', '08059977990', 'BSC. COMPUTER SCIENCE', 2017, 2020, 'avatar.png', '2018-11-07 15:10:45'),
('csc180001', 'john', 'peter', 'john', 'CSC', 'john@crutech.edu.ng', '3', 100, 200, '2018-10-24', '0801234567', 'BSC. COMPUTER SCIENCE', 2018, 2022, '1IH_b1HLLZEFF9g1Um7JZRQ.jpg', '2018-10-31 16:20:30'),
('csc181234', 'john', 'terry', 'john', 'CSC', 'johnterry@crutech.edu.ng', '3', 122, 100, '2018-10-18', '345678567', 'BSC. COMPUTER SCIENCE', 2018, 2022, 'social_media_github.68ee6d7a.png', '2018-11-25 16:51:43'),
('csc184321', 'Benaiah', 'Yusuf', 'cranium', 'CSC', 'yusufben@gmail.com', '4', 100, 200, '1997-10-29', '81234569', 'BSC. COMPUTER SCIENCE', 2018, 2021, '02.jpg', '2019-03-06 20:01:34'),
('csc185678', 'Gbenge', 'Aondoakula', 'zxcvb', 'MATHEMATICS', 'softcare@crutech.edu.ng', '0', 0, 200, '1997-10-18', '812345678', 'BSC. MATHEMATICS', 2018, 2021, '1mdmYp9MOOqQ3xnu1l6zI1w.jpg', '2018-11-27 21:03:40'),
('JOY101', 'JOY', 'ONOJAH', 'joy101', 'Computer Science', 'joy@gmail.com', '4', 109, 300, '2018-11-23', '08162345789', 'BSC. COMPUTER SCIENCE', 2015, 2019, 'avatar.png', '2018-11-25 14:01:12');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
