-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2022 at 11:10 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emmathesis`
--

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `prof_name` text NOT NULL,
  `credits` int(11) NOT NULL,
  `degree_type` text NOT NULL,
  `badge` text NOT NULL,
  `feedback` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `title`, `prof_name`, `credits`, `degree_type`, `badge`, `feedback`, `user_id`) VALUES
(2, 'Physics', 'John Doe', 10, 'BSc', 'uploads/autumn.jpg', 'A+', 4),
(3, 'Philosophy of Science', 'Jane Doe', 25, 'BSc', '', '', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` text NOT NULL,
  `en_date` date NOT NULL,
  `reg_num` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `username` text NOT NULL,
  `role` text NOT NULL,
  `description` text NOT NULL,
  `skills` text NOT NULL,
  `experience` text NOT NULL,
  `titles` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `en_date`, `reg_num`, `password`, `email`, `username`, `role`, `description`, `skills`, `experience`, `titles`) VALUES
(2, 'hello', '2022-05-15', '', 'admin', 'hello@gmail.com', 'hello@ax.com', 'admin', '', '', '', ''),
(4, 'John Doe', '2022-05-15', '4324334532', 'admin', 'student@gmail.com', 'student@gmail.com', 'student', 'Some description', 'HTML, CSS, JavaScript, PHP, Laravel', 'Microsoft - Software Engineer - 2yrs, Apple - Software Engineer - 2yrs', 'Course 1, Course 2, Course 3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
