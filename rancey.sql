-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2026 at 08:35 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rancey`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `full_name`, `email`, `phone`, `created_at`) VALUES
(1, 'Juan Dela Cruz', 'juan@example.com', '09171234567', '2026-10-02 20:52:10'),
(2, 'Maria Santos', 'maria@example.com', '09181234567', '2026-10-02 20:52:10'),
(3, 'Carlo Reyes', 'carlo@example.com', '09191234567', '2026-10-02 20:52:10'),
(4, 'Angela Garcia', 'angela@example.com', '09201234567', '2026-10-02 20:52:10'),
(5, 'Mark Mendoza', 'mark@example.com', '09211234567', '2026-10-02 20:52:10');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  `task_date` date NOT NULL,
  `is_archived` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `status`, `task_date`, `is_archived`, `created_at`) VALUES
(1, 'Complete CodeIgniter setup', 'completed', '2026-10-09', 0, '2026-10-09 14:23:39'),
(2, 'Review database migrations', 'pending', '2026-10-09', 0, '2026-10-09 14:23:39'),
(3, 'Test task filtering query', 'pending', '2026-10-09', 0, '2026-10-09 14:23:39'),
(4, 'Prepare project documentation', 'pending', '2026-10-10', 0, '2026-10-09 14:23:39'),
(5, 'Deploy application to hosting', 'pending', '2026-10-11', 0, '2026-10-09 14:23:39'),
(6, 'Check git repository status', 'completed', '2026-10-08', 0, '2026-10-09 14:23:39'),
(7, 'Initial project planning', 'completed', '2026-10-07', 0, '2026-10-09 14:23:39'),
(8, 'Database schema design', 'completed', '2026-10-06', 0, '2026-10-09 14:23:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `full_name` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `full_name`, `created_at`, `email`) VALUES
(1, 'admin01', '$2y$12$EtHHp1dGVU89dhlEworcc.h6K.NC7TA2zTDXwZiXKo5TxSyS9Q1xq', 'John Admin', '2026-10-02 20:52:10', ''),
(2, 'cashier01', NULL, 'Anna Cruz', '2026-10-02 20:52:10', ''),
(3, 'cashier02', NULL, 'Michael Santos', '2026-10-02 20:52:10', ''),
(4, 'staff01', NULL, 'Sarah Reyes', '2026-10-02 20:52:10', ''),
(5, 'manager01', NULL, 'David Garcia', '2026-10-02 20:52:10', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
