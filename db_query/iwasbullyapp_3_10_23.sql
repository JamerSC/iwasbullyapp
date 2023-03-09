-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 09, 2023 at 05:22 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iwasbullyapp_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `Appointment`
--

CREATE TABLE `Appointment` (
  `AppointmentID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `ReportID` int(11) NOT NULL,
  `ComplainantName` varchar(50) DEFAULT NULL,
  `RespondentName` varchar(50) DEFAULT NULL,
  `AppointmentDate` date DEFAULT NULL,
  `AppointmentDay` enum('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday') NOT NULL,
  `StartTime` time NOT NULL,
  `EndTime` time NOT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT current_timestamp(),
  `ModifiedBy` int(11) DEFAULT NULL,
  `ModifiedDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `AppointmentStatus` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `img_id` int(11) NOT NULL,
  `image` text DEFAULT NULL,
  `post` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`img_id`, `image`, `post`) VALUES
(4, 'uploads/Screen Shot 2022-10-25 at 9.12.02 PM.png', 'IMAGE 4'),
(5, 'uploads/1. LOGIN.png', 'IMAGE 5'),
(7, 'uploads/Screen Shot 2022-10-25 at 9.13.11 PM.png', 'Screenshot of my signature'),
(10, 'IMG-64056959ebd5e5.00817194.png', 'Student userlist'),
(12, 'uploads/IMG-64056c3ac7e899.91933740.png', 'My name is NAME and im trying to write my name in the text area so that it will display in my view.php.'),
(13, 'uploads/IMG-64056f70ec5454.21436634.png', ''),
(14, 'uploads/9. ADMIN - DELETE ACCOUNT.png', NULL),
(15, 'uploads/9. ADMIN - DELETE ACCOUNT.png', NULL),
(16, 'uploads/Screen Shot 2022-10-25 at 9.13.11 PM.png', NULL),
(23, 'IMG-6405ff12937a85.50524481.JPG,IMG-6405ff1293d7f5.68216265.JPG', NULL),
(24, 'IMG-640606490a52b9.16712328.JPG,IMG-640606490b06c7.18587896.png', NULL),
(25, 'IMG-6406bebac0c6f9.04978892.png,IMG-6406bebac17ed7.11262906.png', NULL),
(26, 'Jamer ID 2.png', NULL),
(27, 'PUSH COMMIT TO GITHUB.png', NULL),
(28, 'Jamer ID 2.png', NULL),
(29, 'PUSH COMMIT TO GITHUB.png', NULL),
(50, '10. ADMIN-TEACHER DATA TABLE.png', 'IWAS BULLY ADMIN USER TABLE PAGE'),
(51, '9. ADMIN - DELETE ACCOUNT.png', 'IWAS BULLY ADMIN DELETE PAGE'),
(52, '10. ADMIN-TEACHER DATA TABLE.png', NULL),
(54, '1. LOGIN.png', NULL),
(55, '2. SIGNUP.png', NULL),
(56, '3. ADMIN-DASHBOARD.png', NULL),
(57, '5. ADMIN-STUDENT DATA TABLE.png', NULL),
(58, '6. VIEW USER ACCOUNT.png', NULL),
(59, '7. UPDATE USER ACCOUNT.png', NULL),
(60, 'Screen Shot 2023-02-02 at 7.17.22 PM.png', NULL),
(61, 'Blank diagram (1).png', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Report`
--

CREATE TABLE `Report` (
  `ReportID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `C_Firstname` varchar(50) NOT NULL,
  `C_Lastname` varchar(50) NOT NULL,
  `C_SchoolIDNumber` varchar(20) NOT NULL,
  `C_UserRole` enum('Junior','Senior','Teacher','Guidance Office') NOT NULL,
  `C_Email` varchar(50) NOT NULL,
  `C_ContactNumber` varchar(20) NOT NULL,
  `R_Firstname` varchar(50) NOT NULL,
  `R_Lastname` varchar(50) NOT NULL,
  `R_SchoolIDNumber` varchar(20) NOT NULL,
  `R_UserRole` enum('Junior','Senior','Teacher') NOT NULL,
  `R_Email` varchar(50) NOT NULL,
  `R_ContactNumber` varchar(20) NOT NULL,
  `TypeOfBullying` enum('Verbal','Physical','Social','Cyberbullying') NOT NULL,
  `ImageProof` text DEFAULT NULL,
  `VideoLink` text DEFAULT NULL,
  `Remarks` text DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT current_timestamp(),
  `ModifiedBy` int(11) DEFAULT NULL,
  `ModifiedDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ReportStatus` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Report`
--

INSERT INTO `Report` (`ReportID`, `UserID`, `C_Firstname`, `C_Lastname`, `C_SchoolIDNumber`, `C_UserRole`, `C_Email`, `C_ContactNumber`, `R_Firstname`, `R_Lastname`, `R_SchoolIDNumber`, `R_UserRole`, `R_Email`, `R_ContactNumber`, `TypeOfBullying`, `ImageProof`, `VideoLink`, `Remarks`, `CreatedBy`, `CreatedDate`, `ModifiedBy`, `ModifiedDate`, `ReportStatus`) VALUES
(1, 1, 'test', 'test', '123', 'Senior', 'test@yahoo.com', '123', 'test', 'test', '23', 'Senior', 'test@yahoo.com', '123', 'Physical', NULL, '', 'testing only', 1, '2023-03-09 00:33:37', NULL, '2023-03-08 16:33:37', 1),
(2, 1, 'Juan', 'Ponce', '20220001', 'Junior', 'juan@yahoo.com', '123', 'Pedro', 'Parker', '20210004', 'Senior', 'pedro@yahoo.com', '123', 'Social', NULL, '', 'Respondent group member:\r\n\r\nStudent1\r\nStudent2\r\nStudent3', 1, '2023-03-09 19:01:38', NULL, '2023-03-09 11:01:38', 1),
(3, 1, 'Maria', 'Clara', '123', 'Junior', 'maria@gmail.com', '0000000', 'Lee min', 'Ho', '123', 'Senior', 'leeminho@gmail.com', '123', 'Social', NULL, 'https://www.google.com/search?q=boolean+how+many+value&sxsrf=AJOqlzV1GOPTA7WH5Y0GVGoJsVgDLOXMig%3A1678354775955&source=hp&ei=V6kJZOz4N83e-QaEiZvoBQ&iflsig=AK50M_UAAAAAZAm3Zw0254Dd5vJKH3jNzhUYY5DGcJEO&ved=0ahUKEwisgOfhxs79AhVNb94KHYTEBl0Q4dUDCAg&uact=5&oq=boolean+how+many+value&gs_lcp=Cgdnd3Mtd2l6EAMyBggAEBYQHjIGCAAQFhAeMgUIABCGAzIFCAAQhgMyBQgAEIYDMgUIABCGAzoECCMQJzoLCC4QgAQQsQMQgwE6CwgAEIAEELEDEIMBOggIABCxAxCDAToICC4QsQMQgwE6CAgAEIAEELEDOg4ILhCABBCxAxCDARDUAjoICC4QgAQQ1AI6CAguEIAEELEDOgUIABCABDoFCC4QgAQ6DgguEIAEEMcBENEDENQCOg0ILhCABBDHARDRAxAKOgcILhCABBAKOgoILhCABBCxAxAKOgcIABCABBAKOgoIABCABBCxAxAKOg0ILhCABBCxAxCDARAKOg0IABCABBCxAxCDARAKOgcIIxDqAhAnOgUIABCxAzoHCCMQsQIQJzoFCC4QsQM6DgguEIAEELEDEMcBENEDOhEILhCABBCxAxCDARDHARDRAzoKCAAQgAQQRhD5AToICAAQFhAeEA86CQgAEBYQHhDxBDoLCAAQFhAeEPEEEAo6BQghEKABOgQIIRAVOggIIRAWEB4QHToICAAQHhANEA9QAFiO-URgmftEaBRwAHgAgAHWAYgB5R6SAQYzMy43LjGYAQCgAQGwAQo&sclient=gws-wiz', 'The greatest glory in living lies not in never falling, but in rising every time we fall. -Nelson Mandela\r\nThe way to get started is to quit talking and begin doing. -Walt Disney\r\nYour time is limited, so don\'t waste it living someone else\'s life. Don\'t be trapped by dogma – which is living with the results of other people\'s thinking. -Steve Jobs', 1, '2023-03-10 00:03:11', NULL, '2023-03-09 16:03:11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `status`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `remarks` text NOT NULL,
  `image` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `date`, `time`, `remarks`, `image`) VALUES
(5, '2023-03-06', '12:00:00', 'Testing only for todays night!', ''),
(12, '2023-02-28', '20:25:00', 'kkkk', 0x555345525f524f4c452e6a7067),
(13, '2023-02-28', '20:25:00', 'kkkk', 0x555345525f524f4c452e6a7067),
(14, '2023-03-30', '13:32:00', 'testing again and again', 0x555345525f524f4c452e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `UserID` int(11) NOT NULL,
  `UserRole` enum('Councilor','Staff','Intern','Student','Teacher') NOT NULL,
  `Firstname` varchar(50) NOT NULL,
  `Lastname` varchar(50) NOT NULL,
  `SchoolIDNumber` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT current_timestamp(),
  `ModifiedBy` int(11) DEFAULT NULL,
  `ModifiedDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `UserStatus` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`UserID`, `UserRole`, `Firstname`, `Lastname`, `SchoolIDNumber`, `Email`, `Username`, `Password`, `CreatedBy`, `CreatedDate`, `ModifiedBy`, `ModifiedDate`, `UserStatus`) VALUES
(1, 'Councilor', 'Jamer', 'Catalla', '20230001', 'mr.catalla28@gmail.com', 'admin@yahoo.com', '123', NULL, '2023-03-08 17:50:59', 1, '2023-03-08 17:05:13', 1),
(2, 'Teacher', 'Eikichi', 'Onizuka', '20230002', 'gto@yahoo.com', 'gto@yahoo.com', 'Eikichi@1234', NULL, '2023-03-08 18:03:21', 1, '2023-03-08 11:02:06', 1),
(3, 'Student', 'John', 'Doe', '20230003', 'johndoe@gmail.com', 'doe@yahoo.com', 'Doe@1234', NULL, '2023-03-08 18:05:30', NULL, '2023-03-08 10:40:22', 1),
(4, 'Staff', 'Maria', 'Clara', '20230004', 'clara@gmail.com', 'maria@yahoo.com', 'Maria@123', 1, '2023-03-08 19:11:53', NULL, '2023-03-08 11:11:53', 1),
(5, 'Student', 'Jane', 'Doe', '20230005', 'jane@gmail.com', 'jane@yahoo.com', 'Jane@123', NULL, '2023-03-09 00:39:00', NULL, '2023-03-08 17:15:03', 1),
(6, 'Student', 'Juan', 'Dela Cruz', '20230006', 'juan@yahoo.com', 'juan@yahoo.com', 'Juan@123', NULL, '2023-03-09 01:01:12', 1, '2023-03-08 17:08:43', 1),
(7, 'Student', 'Peter', 'Parker', '20230007', 'peter@gmail.com', 'peter@yahoo.com', 'Peter@123', NULL, '2023-03-09 01:02:58', NULL, '2023-03-08 17:02:58', 1),
(8, 'Intern', 'Rowan', 'Atkinson', '20230008', 'rowan@gmail.com', 'mrbean@yahoo.com', 'Bean@123', 1, '2023-03-09 17:40:26', NULL, '2023-03-09 09:40:26', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Appointment`
--
ALTER TABLE `Appointment`
  ADD PRIMARY KEY (`AppointmentID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `ReportID` (`ReportID`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `Report`
--
ALTER TABLE `Report`
  ADD PRIMARY KEY (`ReportID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Appointment`
--
ALTER TABLE `Appointment`
  MODIFY `AppointmentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `Report`
--
ALTER TABLE `Report`
  MODIFY `ReportID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Appointment`
--
ALTER TABLE `Appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `Users` (`UserID`),
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`ReportID`) REFERENCES `Report` (`ReportID`);

--
-- Constraints for table `Report`
--
ALTER TABLE `Report`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `Users` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
