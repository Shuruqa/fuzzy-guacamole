-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2019 at 02:46 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat_message`
--

CREATE TABLE `chat_message` (
  `chat_message_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `chat_message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `company_details`
--

CREATE TABLE `company_details` (
  `ID` int(11) NOT NULL,
  `CO_NAME` varchar(255) COLLATE utf8_bin NOT NULL,
  `CONTACT_PER` varchar(255) COLLATE utf8_bin NOT NULL,
  `ADDRESS` varchar(255) COLLATE utf8_bin NOT NULL,
  `COUNTRY` varchar(255) COLLATE utf8_bin NOT NULL,
  `CITY` varchar(255) COLLATE utf8_bin NOT NULL,
  `STATE` varchar(255) COLLATE utf8_bin NOT NULL,
  `POSTAL_CODE` varchar(255) COLLATE utf8_bin NOT NULL,
  `EMAIL` varchar(255) COLLATE utf8_bin NOT NULL,
  `PHONE` varchar(255) COLLATE utf8_bin NOT NULL,
  `WEBSITE` varchar(2083) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `company_details`
--

INSERT INTO `company_details` (`ID`, `CO_NAME`, `CONTACT_PER`, `ADDRESS`, `COUNTRY`, `CITY`, `STATE`, `POSTAL_CODE`, `EMAIL`, `PHONE`, `WEBSITE`) VALUES
(0, 'Sendan Technologies', 'Shuruq Alyami', '3864 Lorem Ipsum Lane, Ipsum Lane, Lorem , 91403', 'Saudi Arabia', 'Jubail', 'Eastren Province', '23456', 'shuruq.alyami@sendan.com.sa', '000-000-0000', 'http://ipsum.com');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `DEP_ID` int(10) NOT NULL,
  `DEP_NAME` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`DEP_ID`, `DEP_NAME`) VALUES
(1, 'Web Development'),
(2, 'Application Development'),
(5, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `employeeproject`
--

CREATE TABLE `employeeproject` (
  `ID` int(11) NOT NULL,
  `EMP_ID` int(11) DEFAULT NULL,
  `PROJECT_ID` int(11) DEFAULT NULL,
  `ASSIGNED_DATE` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `employeeproject`
--

INSERT INTO `employeeproject` (`ID`, `EMP_ID`, `PROJECT_ID`, `ASSIGNED_DATE`) VALUES
(1, 106069, 231, NULL),
(2, 104746, 231, NULL),
(3, 104958, 231, NULL),
(4, 106064, 123, NULL),
(5, 106069, 123, '2019-03-11'),
(6, 333345, 445, '2019-03-11'),
(7, 106069, 445, '2019-03-11'),
(8, 333345, 231, '2019-03-19'),
(9, 104746, 445, '2019-03-11'),
(10, 106064, 445, '2019-03-11'),
(11, 106069, 299, '2019-05-07'),
(13, 333345, 123, '2019-05-22');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `EMP_ID` int(11) NOT NULL,
  `FULL_NAME` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `FIRST_NAME` varchar(255) COLLATE utf8_bin NOT NULL,
  `LAST_NAME` varchar(255) COLLATE utf8_bin NOT NULL,
  `DESIGNATION` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `CREATED_BY` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `EMAIL` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `JOINING_DATE` date DEFAULT NULL,
  `S_DATE` date DEFAULT NULL,
  `C_DATE` date DEFAULT NULL,
  `PHONE` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `GENDER` varchar(255) COLLATE utf8_bin NOT NULL,
  `ADDRESS` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `COMPANY` varchar(255) COLLATE utf8_bin NOT NULL,
  `COLLEGE_NAME` varchar(255) COLLATE utf8_bin NOT NULL,
  `MAJOR_NAME` varchar(255) COLLATE utf8_bin NOT NULL,
  `PRE_EMPLOYER` varchar(255) COLLATE utf8_bin NOT NULL,
  `PRE_POSITION` varchar(255) COLLATE utf8_bin NOT NULL,
  `SKILL` varchar(255) COLLATE utf8_bin NOT NULL,
  `BIRTH_DATE` date DEFAULT NULL,
  `STATE` varchar(255) COLLATE utf8_bin NOT NULL,
  `COUNTRY` varchar(255) COLLATE utf8_bin NOT NULL,
  `PIN_CODE` varchar(11) COLLATE utf8_bin NOT NULL,
  `DEGREE_NAME` varchar(255) COLLATE utf8_bin NOT NULL,
  `GRADE` varchar(11) COLLATE utf8_bin NOT NULL,
  `PRE_LOCATION` varchar(255) COLLATE utf8_bin NOT NULL,
  `F_PERIOD` date DEFAULT NULL,
  `T_PERIOD` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`EMP_ID`, `FULL_NAME`, `FIRST_NAME`, `LAST_NAME`, `DESIGNATION`, `CREATED_BY`, `EMAIL`, `JOINING_DATE`, `S_DATE`, `C_DATE`, `PHONE`, `GENDER`, `ADDRESS`, `COMPANY`, `COLLEGE_NAME`, `MAJOR_NAME`, `PRE_EMPLOYER`, `PRE_POSITION`, `SKILL`, `BIRTH_DATE`, `STATE`, `COUNTRY`, `PIN_CODE`, `DEGREE_NAME`, `GRADE`, `PRE_LOCATION`, `F_PERIOD`, `T_PERIOD`) VALUES
(104746, 'Gaurav Singh', '', '', 'Web Designer', 'Shuruq Alyami', 'gaurav@sendan.com.sa', '2019-10-02', '0000-00-00', '0000-00-00', '0585756335', 'Male', NULL, 'Sendan Company', 'International College of Science', 'Computer Science ', 'Crebritech Company', 'Web Programmer ', 'Android,HTML,CSS,Codignitor,PHP', '0000-00-00', '', '', '', '', '', '', '0000-00-00', '0000-00-00'),
(104958, 'Rakesh', '', '', 'Web Designer', 'Shuruq Alyami', 'rakesh@sendan.com.sa', '2019-06-03', '0000-00-00', '0000-00-00', '0587463762', 'Male', NULL, 'Sendan Company', 'International College of Science', 'Computer Science ', 'Crebritech Company', 'Web Designer ', 'HTML,CSS', '0000-00-00', '', '', '', '', '', '', '0000-00-00', '0000-00-00'),
(105749, 'IMRAN ISMAIL KHAN', '', '', 'Web Developer', 'Shuruq Alyami', 'IMRAN.KHAN@sendan.com.sa', '2019-09-10', '0000-00-00', '0000-00-00', '0543778654', 'Male', NULL, 'Sendan Company', 'Jubail University College', 'Computer Science ', 'Royal Commission  ', 'Web Developer ', 'PHP', '0000-00-00', '', '', '', '', '', '', '0000-00-00', '0000-00-00'),
(106064, 'Doha Bin hailal', '', '', 'Web Designer', 'Shuruq Alyami', 'doha@sendan.com.sa', '2016-06-10', '0000-00-00', '0000-00-00', '0547578795', 'Female', NULL, 'Sendan Company', 'Jubail University College', 'Management Information System', 'Education College', 'Teaching Asistant', 'Android,CSS,Codignitor', '0000-00-00', '', '', '', '', '', '', '0000-00-00', '0000-00-00'),
(106069, 'Shuruq Alyami', 'Shuruq', 'Alyami', 'Web Developer', 'Shuruq Alyami', 'shuruq.alyami@sendan.com.sa', '2019-01-07', '2019-01-10', '2019-01-10', '0547578794', 'Female', 'First Industrial Support Area ', 'Sendan Company', 'Jubail University College', 'Management Information System', 'Royal Commission Hospital', 'IT Trainee ', 'HTML,CSS,Codignitor,PHP', '2019-01-10', 'Eastern Province  ', 'Saudi Arabia', '19345', 'Bachelor of Science ', '3.24', 'Jubail', '2019-01-10', '2019-01-10'),
(106661, 'Fatima Ali', '', '', 'Web Designer', 'Shuruq Alyami', 'alali@sendan.com.sa', '2019-11-06', '0000-00-00', '0000-00-00', '0547563542', 'Female', NULL, 'Sendan Company', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '0000-00-00', '0000-00-00'),
(107069, 'Aysha Albuainain', '', '', 'SEO Analyst', '', 'Ayshah@sendan.com.sa', '2017-01-11', '0000-00-00', '0000-00-00', '0546765873', 'Female', NULL, 'Sendan Company', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '0000-00-00', '0000-00-00'),
(190909, 'Sara Alsubaih', '', '', 'SEO Analyst', '', 'sara@gmail.com', '2019-03-01', '0000-00-00', '0000-00-00', '0595876743', 'Female', NULL, 'Sendan Company', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '0000-00-00', '0000-00-00'),
(333345, 'Eman AlGamdi', '', '', 'Web Designer', 'Shuruq Alyami', 'test@gmail.com', '2018-01-09', '0000-00-00', '0000-00-00', '0000000000', 'Female', NULL, 'Sendan Company', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `emp_attendance`
--

CREATE TABLE `emp_attendance` (
  `ENROLL_ID` int(10) NOT NULL,
  `EMP_ID` int(11) DEFAULT NULL,
  `ATTEND_DATE` date DEFAULT NULL,
  `FULL_NAME` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `HALF_DAY` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `emp_attendance`
--

INSERT INTO `emp_attendance` (`ENROLL_ID`, `EMP_ID`, `ATTEND_DATE`, `FULL_NAME`, `HALF_DAY`) VALUES
(1, 106069, '2019-02-25', 'Shuruq Alyami', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `emp_leave`
--

CREATE TABLE `emp_leave` (
  `LEAVE_ID` int(10) NOT NULL,
  `LEAVE_TYPE` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `START_DATE` date DEFAULT NULL,
  `END_DATE` date DEFAULT NULL,
  `EMP_ID` int(10) DEFAULT NULL,
  `USER_NAME` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `LEAVE_STATUS` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `NO_OF_DAYS` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `LEAVE_REASON` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `LEAVE_REMAIN` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `FULL_NAME` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `emp_leave`
--

INSERT INTO `emp_leave` (`LEAVE_ID`, `LEAVE_TYPE`, `START_DATE`, `END_DATE`, `EMP_ID`, `USER_NAME`, `LEAVE_STATUS`, `NO_OF_DAYS`, `LEAVE_REASON`, `LEAVE_REMAIN`, `FULL_NAME`) VALUES
(1, 'Medical Leave', '2019-02-01', '2019-02-07', 106069, 'ADMIN', NULL, '6', 'Medical leave ', '12', ''),
(2, 'Loss of Pay', '2019-02-01', '2019-02-08', 106069, 'ADMIN', NULL, '7', 'n/a', '23', ''),
(3, 'Casual Leave 12 Days', '2019-02-01', '2019-02-14', 106069, 'ADMIN', NULL, '13', 'null', '17', '');

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE `holidays` (
  `HOLIDAY_ID` int(11) NOT NULL,
  `HOLIDAY_NAME` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `HOLIDAY_DAY` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `HOLIDAY_DATE` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `holidays`
--

INSERT INTO `holidays` (`HOLIDAY_ID`, `HOLIDAY_NAME`, `HOLIDAY_DAY`, `HOLIDAY_DATE`) VALUES
(1, 'New Year', 'Sat', '2019-01-01'),
(12, 'International Worker Day', 'Sat', '2019-01-05');

-- --------------------------------------------------------

--
-- Table structure for table `milestone`
--

CREATE TABLE `milestone` (
  `MILESTONE_ID` int(11) NOT NULL,
  `MILESTONE_FLAG` varchar(255) COLLATE utf8_bin NOT NULL,
  `EMP_ID` int(11) NOT NULL,
  `PROJECT_ID` int(11) NOT NULL,
  `START_DATE` date NOT NULL,
  `END_DATE` date NOT NULL,
  `MILESTONE_DES` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `milestone`
--

INSERT INTO `milestone` (`MILESTONE_ID`, `MILESTONE_FLAG`, `EMP_ID`, `PROJECT_ID`, `START_DATE`, `END_DATE`, `MILESTONE_DES`) VALUES
(9, 'Internal', 106069, 299, '2019-08-01', '2019-08-10', 'Quarter One - Targets'),
(11, 'Internal', 104746, 231, '2019-08-01', '2019-08-31', 'Contracts And Agreement ');

-- --------------------------------------------------------

--
-- Table structure for table `organisation`
--

CREATE TABLE `organisation` (
  `DES_ID` int(10) NOT NULL,
  `DES_NAME` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `DEP_NAME` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `USER_NAME` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `organisation`
--

INSERT INTO `organisation` (`DES_ID`, `DES_NAME`, `DEP_NAME`, `USER_NAME`) VALUES
(1, 'Web Designer', 'Web Development', '106064'),
(2, 'Web Developer', 'Web Development', 'ADMIN'),
(3, 'Android Developer', 'Application Development', 'ADMIN'),
(4, 'IOS Developer', 'Application Development', 'ADMIN'),
(5, 'UI Designer', 'Application Development', 'ADMIN'),
(6, 'UX Designer', 'Application Development', 'ADMIN'),
(7, 'IT Technician', 'Application Development', 'ADMIN'),
(23, NULL, 'Web Development1', '106069');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `PROJECT_ID` int(11) NOT NULL,
  `PROJ_NAME` varchar(225) COLLATE utf8_bin DEFAULT NULL,
  `CREATION_DATE` date DEFAULT NULL,
  `PROJECT_TYPE` varchar(225) COLLATE utf8_bin DEFAULT NULL,
  `PROJECT_STATUS_CODE` varchar(225) COLLATE utf8_bin DEFAULT NULL,
  `DESCRIPTION` varchar(225) COLLATE utf8_bin DEFAULT NULL,
  `START_DATE` date DEFAULT NULL,
  `COMPLETION_DATE` date DEFAULT NULL,
  `CLOSED_DATE` date DEFAULT NULL,
  `CLIENT_NAME` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `PRIORITY` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `USER_NAME` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `CREATED_BY` varchar(225) COLLATE utf8_bin DEFAULT NULL,
  `PROJ_LOCATION` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`PROJECT_ID`, `PROJ_NAME`, `CREATION_DATE`, `PROJECT_TYPE`, `PROJECT_STATUS_CODE`, `DESCRIPTION`, `START_DATE`, `COMPLETION_DATE`, `CLOSED_DATE`, `CLIENT_NAME`, `PRIORITY`, `USER_NAME`, `CREATED_BY`, `PROJ_LOCATION`) VALUES
(123, 'biometrics', '2019-05-22', '1', 'Pending', '', '2019-01-19', '2019-05-31', '2019-01-22', '', 'High', 'Shuruq Alyami', '106069', 'SAUDI ARABIA'),
(231, 'pms', '2019-03-19', '3', 'Under Progress', 'N/A', '2019-01-22', '2019-01-24', '2019-01-30', '', 'Low', 'Shuruq Alyami', '106069', 'SAUDI ARABIA'),
(299, 'Timekeeping System', '2019-05-01', '2', 'Under Progress', 'to develop a system for timekeeping department ', '2019-05-01', '2019-06-01', '2019-10-01', '1', 'High', 'Shuruq Alyami', '106069', NULL),
(445, 'Fynoo', '2019-03-11', '2', 'Under Progress', 'N/A', '2019-02-14', '2019-02-14', '2019-02-01', '1', 'Medium', 'Shuruq Alyami', '106069', 'SAUDI ARABIA');

-- --------------------------------------------------------

--
-- Table structure for table `project_tasks`
--

CREATE TABLE `project_tasks` (
  `ID` int(11) NOT NULL,
  `EMP_ID` int(11) NOT NULL,
  `TASK_ID` int(15) NOT NULL,
  `PROJECT_ID` int(11) NOT NULL,
  `SUBMITTED_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `project_tasks`
--

INSERT INTO `project_tasks` (`ID`, `EMP_ID`, `TASK_ID`, `PROJECT_ID`, `SUBMITTED_DATE`) VALUES
(1, 106069, 2, 123, '2019-04-07'),
(2, 106064, 2, 123, '2019-04-07'),
(3, 106064, 4, 123, '0000-00-00'),
(4, 104958, 9, 123, '0000-00-00'),
(5, 104746, 11, 123, '0000-00-00'),
(6, 104958, 12, 231, '2019-04-11'),
(7, 104746, 1, 231, '2019-04-21'),
(8, 104958, 1, 231, '2019-04-30'),
(9, 106064, 20, 231, '2019-05-01'),
(10, 333345, 2, 123, '2019-05-31'),
(13, 106069, 29, 123, '2019-06-26'),
(14, 104746, 31, 445, '2019-06-01'),
(17, 106069, 31, 445, '2019-06-26'),
(18, 106069, 32, 445, '2019-07-03');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `ID` int(11) NOT NULL,
  `SKILL_CODE` int(11) NOT NULL,
  `SKILL_NAME` int(255) NOT NULL,
  `EMP_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `TASK_ID` int(15) NOT NULL,
  `TASK_NAME` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `TASK_STATUS` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `TASK_DES` varchar(255) COLLATE utf8_bin NOT NULL,
  `START_DATE` date DEFAULT NULL,
  `COMPLETION_DATE` date DEFAULT NULL,
  `PROJECT_ID` int(11) DEFAULT NULL,
  `USER_NAME` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `CREATED_BY` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `TASK_HRS` varchar(4) COLLATE utf8_bin NOT NULL,
  `TASK_MODULE` varchar(11) COLLATE utf8_bin NOT NULL,
  `TASK_PURPOSE` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`TASK_ID`, `TASK_NAME`, `TASK_STATUS`, `TASK_DES`, `START_DATE`, `COMPLETION_DATE`, `PROJECT_ID`, `USER_NAME`, `CREATED_BY`, `TASK_HRS`, `TASK_MODULE`, `TASK_PURPOSE`) VALUES
(1, 'test task first', 'Expired', 'validate all insertion in task module', '2019-03-01', '2019-06-08', 231, 'Shuruq Alyami', '106069', '1', 'PROJECT', 'Development'),
(2, 'insertion task', 'Under Progress', 'This is for inserting function of all modules', '2019-03-01', '2019-11-01', 123, 'Shuruq Alyami', '106069', '1', 'HRMS', 'Development'),
(4, 'Modifying Excel Report', 'Under Progress', 'This is to implement the code on Live', '2019-03-01', '2019-11-01', 123, 'Shuruq Alyami', '106069', '1.50', 'HRMS', 'Development'),
(9, 'Validation Task', 'Under Progress', 'Task is completed with all validations', '2019-03-01', '2019-11-01', 123, 'Shuruq Alyami', '106069', '2.50', 'PROJECT', 'Development'),
(11, 'testing', 'Under Progress', 'testing', '2019-04-03', '2019-11-01', 123, 'Shuruq Alyami', '106069', '2.50', 'PROJECT', 'Development'),
(12, 'The authentication ', 'Under Progress', 'identifying the user username and password in security systems', '2019-04-11', '2019-11-01', 231, 'Shuruq Alyami', '106069', '1', 'PROJECT', 'Development'),
(13, 'Re-test the functions', 'Under Progress', 'all functions should be test in employees module', '2019-04-01', '2019-11-01', 445, 'Shuruq Alyami', '106069', '1', 'HRMS', 'Development'),
(20, 'PMS form validation', 'Under Progress', 'Do PMS date validation and check status while task.', '2019-05-05', '2019-11-01', 231, 'Shuruq Alyami', '106069', '1', 'HRMS', 'Development'),
(21, 'UI/UX design', 'Expired', 'working on the front-end codes ', '2019-05-31', '2019-08-01', 299, 'Gaurav Singh', '104746', '3', 'HRMS', 'Development'),
(22, 'Notification System', 'Under Progress', 'writing a code to notify each user their expired tasks', '2019-05-05', '2019-11-01', 445, 'Shuruq Alyami', '106069', '1.50', 'PROJECT', 'Development'),
(24, 'Testing Functionality ', 'Expired', 'testing the functionality of the projects modules', '2019-05-15', '2019-06-01', 299, 'Gaurav Singh', '104746', '0.50', 'PROJECT', 'Development'),
(29, 'Back-End Task', 'Under Progress', 'Writing a codes to solve task solution', '2019-05-27', '2019-11-01', 123, 'Shuruq Alyami', '106069', '2', 'PROJECT', 'Development'),
(30, 'Template Design', 'Under Progress', 'Modify The Template Design', '2019-06-25', '2019-11-01', 231, 'Shuruq Alyami', '106069', '2', 'HRMS', 'Development'),
(31, 'Working on CSS codes', 'Under Progress', 'For all Modules', '2019-06-26', '2019-11-01', 445, 'Shuruq Alyami', '106069', '2', 'HRMS', 'Development'),
(32, 'Python', 'Under Progress', 'installing Python environment', '2019-07-03', '2019-11-01', 445, 'Shuruq Alyami', '106069', '1', 'HRMS', 'Development'),
(33, 'Room Category Master', 'Expired', 'doing the documentation process of room master category', '2019-07-15', '2019-08-01', 299, 'Shuruq Alyami', '106069', '1', 'ACCOMMODATI', 'Process Documentation');

-- --------------------------------------------------------

--
-- Table structure for table `task_progress`
--

CREATE TABLE `task_progress` (
  `ID` int(11) NOT NULL,
  `EMP_ID` int(11) NOT NULL,
  `TASK_ID` int(15) NOT NULL,
  `PROJECT_ID` int(11) NOT NULL,
  `TASK_COM` varchar(255) COLLATE utf8_bin NOT NULL,
  `TASK_PROG` varchar(255) COLLATE utf8_bin NOT NULL,
  `SUBMITTED_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `task_progress`
--

INSERT INTO `task_progress` (`ID`, `EMP_ID`, `TASK_ID`, `PROJECT_ID`, `TASK_COM`, `TASK_PROG`, `SUBMITTED_DATE`) VALUES
(1, 106069, 2, 123, 'i have done the validation codes', 'Completed', '2019-04-07'),
(2, 106069, 2, 123, 'i have done the insertion function', 'Completed', '2019-04-07'),
(4, 106064, 2, 123, 'i have done the code in live', 'Under Progress', '2019-04-08'),
(5, 106064, 4, 123, 'i have done the design ', 'Completed', '2019-04-08'),
(6, 106069, 2, 123, 'i have done the design of the portal', 'Completed', '2019-04-09'),
(7, 104958, 9, 123, 'i do the code for today', 'Completed', '2019-04-10'),
(8, 104958, 9, 123, 'i do the design of task module', 'Completed', '2019-04-10'),
(11, 104958, 9, 123, 'i did the code', 'Completed', '2019-04-21'),
(13, 104958, 1, 231, 'i do this in live ', 'Completed', '2019-05-21'),
(14, 106064, 2, 123, 'i do the front-end design ', 'Under Progress', '2019-05-22'),
(15, 333345, 2, 123, 'i do the back-end codes', 'Under Progress', '2019-05-28'),
(16, 104958, 12, 231, 'testing the authentication step', 'Under Progress', '2019-06-24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(10) NOT NULL,
  `USER_NAME` varchar(255) COLLATE utf8_bin NOT NULL,
  `EMP_ID` int(11) DEFAULT NULL,
  `PASSWORD` varchar(255) COLLATE utf8_bin NOT NULL,
  `USER_TYPE` int(10) NOT NULL,
  `COMPANY` varchar(255) COLLATE utf8_bin NOT NULL,
  `ROLE` varchar(255) COLLATE utf8_bin NOT NULL,
  `DESCRIPTION` varchar(255) COLLATE utf8_bin NOT NULL,
  `FULL_NAME` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `COUNTRY` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `CREATED_DATE` date DEFAULT NULL,
  `FIRST_NAME` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `LAST_NAME` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `CONFIRM_PASSWORD` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `PHONE_NUMBER` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `USER_NAME`, `EMP_ID`, `PASSWORD`, `USER_TYPE`, `COMPANY`, `ROLE`, `DESCRIPTION`, `FULL_NAME`, `COUNTRY`, `CREATED_DATE`, `FIRST_NAME`, `LAST_NAME`, `CONFIRM_PASSWORD`, `PHONE_NUMBER`) VALUES
(1, 'Shuruq Alyami', 106069, '123', 0, 'Sendan Company', '', '', NULL, NULL, NULL, NULL, NULL, '123', NULL),
(2, 'Gaurav Singh', 104746, '123', 1, 'Sendan Company', '', '', NULL, NULL, NULL, NULL, NULL, '123', NULL),
(3, 'Doha Bin hailal', 106064, '123', 2, 'Sendan Company', '', '', NULL, NULL, NULL, NULL, NULL, '123', NULL),
(4, 'Rakesh', 104958, '123', 3, 'Sendan Company', '', '', NULL, NULL, NULL, NULL, NULL, '123', NULL),
(6, 'Eman AlGamdi', 333345, '123', 3, 'Sendan Company', '', '', NULL, NULL, NULL, NULL, NULL, '123', NULL),
(21, 'Fatima Ali', 106661, '123', 3, 'Sendan Company', '', '', NULL, NULL, NULL, NULL, NULL, '123', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`DEP_ID`);

--
-- Indexes for table `employeeproject`
--
ALTER TABLE `employeeproject`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `EMP_ID` (`EMP_ID`,`PROJECT_ID`),
  ADD KEY `PROJECT_ID` (`PROJECT_ID`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`EMP_ID`);

--
-- Indexes for table `emp_attendance`
--
ALTER TABLE `emp_attendance`
  ADD PRIMARY KEY (`ENROLL_ID`);

--
-- Indexes for table `emp_leave`
--
ALTER TABLE `emp_leave`
  ADD PRIMARY KEY (`LEAVE_ID`);

--
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`HOLIDAY_ID`);

--
-- Indexes for table `milestone`
--
ALTER TABLE `milestone`
  ADD PRIMARY KEY (`MILESTONE_ID`),
  ADD KEY `EMP_ID` (`EMP_ID`,`PROJECT_ID`),
  ADD KEY `PROJECT_ID` (`PROJECT_ID`);

--
-- Indexes for table `organisation`
--
ALTER TABLE `organisation`
  ADD PRIMARY KEY (`DES_ID`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`PROJECT_ID`);

--
-- Indexes for table `project_tasks`
--
ALTER TABLE `project_tasks`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `TASK_ID` (`TASK_ID`,`PROJECT_ID`),
  ADD KEY `PROJECT_ID` (`PROJECT_ID`),
  ADD KEY `EMP_ID` (`EMP_ID`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`TASK_ID`);

--
-- Indexes for table `task_progress`
--
ALTER TABLE `task_progress`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `EMP_ID` (`EMP_ID`),
  ADD KEY `TASK_ID` (`TASK_ID`),
  ADD KEY `PROJECT_ID` (`PROJECT_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `EMP_ID` (`EMP_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `DEP_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employeeproject`
--
ALTER TABLE `employeeproject`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `emp_leave`
--
ALTER TABLE `emp_leave`
  MODIFY `LEAVE_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `HOLIDAY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `milestone`
--
ALTER TABLE `milestone`
  MODIFY `MILESTONE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `organisation`
--
ALTER TABLE `organisation`
  MODIFY `DES_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `project_tasks`
--
ALTER TABLE `project_tasks`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `TASK_ID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `task_progress`
--
ALTER TABLE `task_progress`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employeeproject`
--
ALTER TABLE `employeeproject`
  ADD CONSTRAINT `employeeproject_ibfk_1` FOREIGN KEY (`EMP_ID`) REFERENCES `employees` (`EMP_ID`),
  ADD CONSTRAINT `employeeproject_ibfk_2` FOREIGN KEY (`PROJECT_ID`) REFERENCES `projects` (`PROJECT_ID`);

--
-- Constraints for table `milestone`
--
ALTER TABLE `milestone`
  ADD CONSTRAINT `milestone_ibfk_1` FOREIGN KEY (`EMP_ID`) REFERENCES `employees` (`EMP_ID`),
  ADD CONSTRAINT `milestone_ibfk_2` FOREIGN KEY (`PROJECT_ID`) REFERENCES `projects` (`PROJECT_ID`);

--
-- Constraints for table `project_tasks`
--
ALTER TABLE `project_tasks`
  ADD CONSTRAINT `project_tasks_ibfk_1` FOREIGN KEY (`TASK_ID`) REFERENCES `tasks` (`TASK_ID`),
  ADD CONSTRAINT `project_tasks_ibfk_2` FOREIGN KEY (`PROJECT_ID`) REFERENCES `projects` (`PROJECT_ID`),
  ADD CONSTRAINT `project_tasks_ibfk_3` FOREIGN KEY (`EMP_ID`) REFERENCES `employees` (`EMP_ID`);

--
-- Constraints for table `task_progress`
--
ALTER TABLE `task_progress`
  ADD CONSTRAINT `task_progress_ibfk_1` FOREIGN KEY (`TASK_ID`) REFERENCES `tasks` (`TASK_ID`),
  ADD CONSTRAINT `task_progress_ibfk_2` FOREIGN KEY (`PROJECT_ID`) REFERENCES `projects` (`PROJECT_ID`),
  ADD CONSTRAINT `task_progress_ibfk_3` FOREIGN KEY (`EMP_ID`) REFERENCES `employees` (`EMP_ID`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`EMP_ID`) REFERENCES `employees` (`EMP_ID`) ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
