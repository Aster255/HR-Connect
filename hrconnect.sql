-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2023 at 02:26 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrconnect`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `attendance_id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `attendance_date` date NOT NULL DEFAULT current_timestamp(),
  `location_id` int(11) DEFAULT NULL,
  `in_time` time NOT NULL DEFAULT current_timestamp(),
  `in_status` varchar(40) DEFAULT NULL,
  `out_time` time DEFAULT NULL,
  `out_status` varchar(70) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`attendance_id`, `employee_id`, `attendance_date`, `location_id`, `in_time`, `in_status`, `out_time`, `out_status`, `created_at`) VALUES
(50, 22, '2023-12-29', 1, '20:32:30', 'Early In', '20:48:57', 'Early Out', '2023-12-29 12:48:57'),
(51, 22, '2023-12-29', 1, '20:50:33', 'Early In', '20:50:35', 'Early Out', '2023-12-29 12:50:35');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `department_id` int(11) NOT NULL,
  `department_name` varchar(50) NOT NULL,
  `department_status` enum('Added','Update','Deleted','') NOT NULL,
  `department_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`department_id`, `department_name`, `department_status`, `department_timestamp`) VALUES
(1, 'Human Resource Developement', 'Added', '2023-08-01 16:24:00'),
(2, 'Finance & Accounting', 'Update', '2023-12-26 08:59:23'),
(3, 'Maintenance', 'Added', '2023-12-26 08:54:28'),
(4, 'Sales & Marketing', 'Update', '2023-12-26 08:57:51'),
(5, 'Business Planning', 'Added', '2023-12-26 08:56:01'),
(6, 'Research & Development', 'Added', '2023-12-26 08:56:54'),
(7, 'Operations', 'Added', '2023-12-26 08:57:01');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(11) NOT NULL,
  `position_id` int(11) DEFAULT NULL,
  `department_id` int(5) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `hire_date` date DEFAULT NULL,
  `salary` decimal(10,2) DEFAULT NULL,
  `employee_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `employee_status` enum('Added','Update','Deleted','') DEFAULT NULL,
  `title` varchar(5) DEFAULT NULL,
  `middle_name` varchar(90) DEFAULT NULL,
  `maiden_name` varchar(90) DEFAULT NULL,
  `nick_name` varchar(90) DEFAULT NULL,
  `picture` varchar(200) NOT NULL DEFAULT 'profile.png',
  `schedule_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `position_id`, `department_id`, `first_name`, `last_name`, `hire_date`, `salary`, `employee_timestamp`, `employee_status`, `title`, `middle_name`, `maiden_name`, `nick_name`, `picture`, `schedule_id`) VALUES
(18, 1, 1, 'Do Do', 'Hee', '2023-12-03', 15000.00, '2023-12-29 13:09:04', 'Added', 'Mr', 'Bok', 'maiden', 'Doo', '202312292109000000Am9 Commercial.jpg', 9),
(19, 3, 2, 'Morris', 'Hutalla', '2023-12-25', 25000.00, '2023-12-29 12:55:49', 'Added', 'Mr', 'Crisostomo', NULL, 'Maurisyo', 'profile.png', 9),
(20, 2, 1, 'Marc', NULL, '2023-12-25', 150000.00, '2023-12-29 12:55:44', 'Added', 'Mrs', 'Lowery', NULL, NULL, 'profile.png', 9),
(21, 2, 1, 'Grant', 'Jeffrey', '2023-12-05', 15000.00, '2023-12-27 08:56:44', 'Added', 'Mr', 'Shepherd', NULL, 'Grant', 'profile.png', 9),
(22, 2, 4, 'Am9', 'Guiamel', '2023-12-05', 25200.00, '2023-12-29 12:55:56', 'Added', 'Mrs', 'Commercial', NULL, NULL, 'profile.png', 9);

-- --------------------------------------------------------

--
-- Table structure for table `employee_docs`
--

CREATE TABLE `employee_docs` (
  `employee_id` int(5) NOT NULL,
  `sss` int(20) DEFAULT NULL,
  `tin` int(20) DEFAULT NULL,
  `philhealth` int(20) DEFAULT NULL,
  `hdmf` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_docs`
--

INSERT INTO `employee_docs` (`employee_id`, `sss`, `tin`, `philhealth`, `hdmf`) VALUES
(19, NULL, NULL, NULL, NULL),
(20, NULL, NULL, NULL, NULL),
(21, NULL, NULL, NULL, NULL),
(22, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_informations`
--

CREATE TABLE `employee_informations` (
  `employee_id` int(5) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `place_of_birth` varchar(90) DEFAULT NULL,
  `nationality` varchar(90) DEFAULT NULL,
  `civil_status` varchar(90) DEFAULT NULL,
  `mobile_no` varchar(200) DEFAULT NULL,
  `email_address` varchar(90) DEFAULT NULL,
  `zip` varchar(10) DEFAULT NULL,
  `city` varchar(90) DEFAULT NULL,
  `street` varchar(90) DEFAULT NULL,
  `province` varchar(90) DEFAULT NULL,
  `phone_no` varchar(200) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_informations`
--

INSERT INTO `employee_informations` (`employee_id`, `date_of_birth`, `place_of_birth`, `nationality`, `civil_status`, `mobile_no`, `email_address`, `zip`, `city`, `street`, `province`, `phone_no`, `gender`) VALUES
(18, '1999-07-06', 'Philippines', 'Pilipino', 'single', '997355124', 'DooDooHeeMyDemon@yahoo.com', '4120', 'Cavite City', 'Nia Road', 'Cavite', '997355124', 'Female'),
(21, '1998-12-05', 'Imus city', 'Philippines', 'single', '09983551211', 'grantMiddle@yahoo.com', '4103', 'Pasig', 'Francisco', 'Manila', '0465812441', 'female'),
(22, '1987-12-02', 'Pasig', 'Philippines', 'married', '0999788521', 'Am9Commercial@yahoo.com', '4103', 'pasig', 'Pasig', 'Manila', '099785520', 'female');

-- --------------------------------------------------------

--
-- Table structure for table `employee_notifies`
--

CREATE TABLE `employee_notifies` (
  `employee_id` int(5) NOT NULL,
  `name` varchar(90) DEFAULT NULL,
  `relationship` varchar(90) DEFAULT NULL,
  `mobile_no` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_notifies`
--

INSERT INTO `employee_notifies` (`employee_id`, `name`, `relationship`, `mobile_no`, `address`) VALUES
(21, 'Ernest Shepherd', 'Father', '09975884312', '4103 Francisco Pasic Manila'),
(22, 'Saudi Roar', 'Father', '0997844125', 'Pasig Manila');

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `leave_id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` varchar(90) DEFAULT NULL,
  `approve` varchar(90) DEFAULT NULL,
  `leavetype_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`leave_id`, `employee_id`, `start_date`, `end_date`, `status`, `approve`, `leavetype_id`) VALUES
(16, 22, '2023-12-05', '2023-12-10', 'pending', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `leave_types`
--

CREATE TABLE `leave_types` (
  `leavetype_id` int(11) NOT NULL,
  `leave_type_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leave_types`
--

INSERT INTO `leave_types` (`leavetype_id`, `leave_type_name`) VALUES
(1, 'Sick Leave'),
(2, 'Holiday Leave'),
(3, 'Birthday Leave'),
(4, 'Maternity Leave');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `location_id` int(5) NOT NULL,
  `location` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`location_id`, `location`) VALUES
(1, 'Work From Home'),
(2, 'On-Site'),
(3, 'field');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `position_id` int(11) NOT NULL,
  `department_id` int(11) DEFAULT NULL,
  `position_name` varchar(50) NOT NULL,
  `position_status` enum('Added','Update','Deleted','') NOT NULL,
  `position_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`position_id`, `department_id`, `position_name`, `position_status`, `position_timestamp`, `deleted_at`) VALUES
(1, 1, 'Head of HR', 'Added', '2023-08-01 16:24:09', NULL),
(2, 1, 'Human Resource', 'Added', '2023-09-22 14:12:50', NULL),
(3, 2, 'Accounting 2', 'Update', '2023-12-26 07:59:00', NULL),
(4, 4, 'Team Leader', 'Added', '2023-12-26 11:16:43', NULL),
(5, 5, 'Team leader', 'Added', '2023-12-26 11:16:54', NULL),
(6, 7, 'Team Leader', 'Added', '2023-12-26 11:17:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'admin'),
(2, 'employee');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(400) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `role` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `employee_id`, `role`) VALUES
(7, 'User_Am9', '$2y$10$BkHs8GaWHxXvZdMd9yQC7ef9/TwHQfYAHKF8ZLNLqTS/072PLfl/e', 22, 2),
(8, 'Admin', '$2y$10$GDb9yAFBiwMiGvW3cTmanOwATwGl4nKk6SiTAA2M5yOaHNebrE7Ua', 21, 1),
(9, 'User', '$2y$10$l93hRKu6oFJz7VmH/Fdte.2wexC/Y7RtZ.YIRXPwb6QK53IX3402.', 18, 1);

-- --------------------------------------------------------

--
-- Table structure for table `workschedule`
--

CREATE TABLE `workschedule` (
  `schedule_id` int(11) NOT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `workschedule`
--

INSERT INTO `workschedule` (`schedule_id`, `start_time`, `end_time`) VALUES
(9, '08:00:00', '09:00:00'),
(10, '10:00:00', '17:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`attendance_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `fk_employees_position` (`position_id`);

--
-- Indexes for table `employee_docs`
--
ALTER TABLE `employee_docs`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `employee_informations`
--
ALTER TABLE `employee_informations`
  ADD PRIMARY KEY (`employee_id`),
  ADD UNIQUE KEY `mobile_no` (`mobile_no`);

--
-- Indexes for table `employee_notifies`
--
ALTER TABLE `employee_notifies`
  ADD PRIMARY KEY (`employee_id`),
  ADD UNIQUE KEY `mobile_no` (`mobile_no`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`leave_id`);

--
-- Indexes for table `leave_types`
--
ALTER TABLE `leave_types`
  ADD PRIMARY KEY (`leavetype_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`position_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `workschedule`
--
ALTER TABLE `workschedule`
  ADD PRIMARY KEY (`schedule_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `employee_docs`
--
ALTER TABLE `employee_docs`
  MODIFY `employee_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `employee_informations`
--
ALTER TABLE `employee_informations`
  MODIFY `employee_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `employee_notifies`
--
ALTER TABLE `employee_notifies`
  MODIFY `employee_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `leave_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `leave_types`
--
ALTER TABLE `leave_types`
  MODIFY `leavetype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `location_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `workschedule`
--
ALTER TABLE `workschedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `fk_employees_department` FOREIGN KEY (`department_id`) REFERENCES `departments` (`department_id`);

--
-- Constraints for table `positions`
--
ALTER TABLE `positions`
  ADD CONSTRAINT `positions_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `departments` (`department_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
