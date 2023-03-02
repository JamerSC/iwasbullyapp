-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 02, 2023 at 03:49 PM
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `role` enum('councilor','student','teacher','staff','intern') NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `sch_id_no` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `modified_by` varchar(255) NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `role`, `username`, `password`, `firstname`, `lastname`, `sch_id_no`, `email`, `created_date`, `modified_date`, `created_by`, `modified_by`, `status`) VALUES
(1, 'councilor', 'admin@yahoo.com', '123', 'Jamer', 'Catalla', 20210009, 'mr.catalla28@gmail.com', '2023-02-26 17:53:58', '2023-03-02 14:30:23', NULL, 'councilor', 1),
(2, 'student', 'jdelacruz@yahoo.com', 'JuanDL@123', 'Juan', 'Dela Cruz', 20230001, 'jdelacruz@gmail.com', '2023-02-26 18:05:12', '2023-03-02 13:35:09', NULL, 'councilor', 1),
(3, 'teacher', 'jdoe@yahoo.com', 'John@2023', 'John', 'Doe', 20220001, 'doe@gmail.com', '2023-02-26 18:06:13', '2023-03-02 13:35:29', NULL, 'councilor', 1),
(4, 'teacher', 'gto_onizuka@yahoo.com', '123', 'Eikichi', 'Onizuka', 20220002, 'onizuka@yahoo.com', '2023-02-26 23:39:14', '2023-03-02 13:35:42', NULL, '', 1),
(5, 'student', 'maria@yahoo.com', 'Maria@2023', 'Maria', 'Clara', 20230002, 'mclara@gmail.com', '2023-02-27 01:18:08', '2023-03-02 13:35:16', NULL, 'councilor', 1),
(6, 'student', 'khaleesi@yahoo.com', '123', 'Emillia', 'Clarke', 20230003, 'emilia@gmail.com', '2023-02-27 14:46:06', '2023-03-02 13:35:58', NULL, '', 1),
(7, 'student', 'test@testing.com', 'Test@123', 'test', 'test', 123, 'test@yahoo.com', '2023-02-27 17:22:05', '2023-03-02 14:30:48', NULL, 'councilor', 0),
(8, 'teacher', 'rizal@yahoo.com', '123', 'Jose', 'Rizal', 20220003, 'jose@gmail.com', '2023-02-27 17:26:52', '2023-03-02 14:47:06', NULL, 'councilor', 1),
(9, 'student', 'try', '123', 'try', 'try', 123, 'try@yahoo.com', '2023-02-27 17:47:43', '2023-03-02 14:30:28', 'councilor', '', 0),
(10, 'student', 'pepito@student.com', 'Pepito@2023', 'Pepito', 'Manaloto', 20230004, 'pepito@yahoo.com', '2023-03-01 01:04:16', '2023-03-02 14:28:42', 'councilor', 'councilor', 1),
(11, 'student', 'ippo', '123', 'Ippo', 'Makunochi', 20230004, 'ippo@yahoo.com', '2023-03-01 19:47:13', '2023-03-02 13:38:22', 'councilor', '', 1),
(12, 'student', 'jane@yahoo.com', 'Janed@23', 'Jane', 'Doe', 20230005, 'jane@gmail.com', '2023-03-01 21:07:39', '2023-03-02 13:38:33', NULL, '', 1),
(13, 'teacher', 'luna@yahoo.com', 'Luna@2023', 'Juan', 'Luna', 20220004, 'juanluna@gmail.com', '2023-03-01 21:42:28', '2023-03-02 13:38:45', 'councilor', '', 1),
(14, 'staff', 'lala@yahoo.com', 'Lala@123', 'Lala', 'Dela Cruz', 20220005, 'lala@gmail.com', '2023-03-02 00:15:58', '2023-03-02 14:35:21', 'councilor', 'councilor', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
