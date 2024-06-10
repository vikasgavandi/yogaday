-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2024 at 01:40 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alcare`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `score` int(11) DEFAULT 0,
  `count` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `score`, `count`, `created_at`) VALUES
(1, 'asdasdasd', 20, 5, '2024-06-09 16:57:26'),
(2, 'vikas gavandi', 60, 20, '2024-06-09 19:26:55'),
(3, '333', 80, 60, '2024-06-09 19:37:31'),
(4, 'vikas ', 10, 40, '2024-06-09 19:43:31'),
(5, 'asd', 90, 80, '2024-06-09 19:49:28'),
(6, 'new game ', 70, 40, '2024-06-09 19:56:06'),
(7, 'cz.se.ahmedabad-1@alembic.co.in', 90, 30, '2024-06-09 19:58:49'),
(8, 'newukasa', 150, 50, '2024-06-09 20:02:27'),
(9, 'adsasd', 40, 10, '2024-06-09 20:04:10'),
(10, 'vikasgavandi', 0, 40, '2024-06-09 20:18:16'),
(11, 'newuser', 0, 70, '2024-06-09 20:18:37'),
(12, 'cccc', 0, 80, '2024-06-09 20:19:02'),
(13, 'Calcium', 0, 90, '2024-06-10 04:30:59'),
(14, 'Narendra Modi', 0, 90, '2024-06-10 04:32:28'),
(15, 'Chaitali Jadhav ', 70, 150, '2024-06-10 08:54:22'),
(16, 'Vikas Gavandi New', 40, 80, '2024-06-10 08:57:16'),
(17, 'Installment', 10, 30, '2024-06-10 08:59:22'),
(18, 'Vikas gavandi collages', 20, 80, '2024-06-10 09:02:30'),
(19, 'nresh gowardhan', 60, 50, '2024-06-10 10:39:31'),
(20, 'Mangesh Naresh Pahune', 20, 60, '2024-06-10 10:40:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
