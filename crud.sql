-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2017 at 04:49 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `addstudent`
--

CREATE TABLE `addstudent` (
  `id` int(11) NOT NULL,
  `userId` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `deleted_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addstudent`
--

INSERT INTO `addstudent` (`id`, `userId`, `name`, `email`, `website`, `country`, `subject`, `gender`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, '591e81a40f35f', 'Bidhan Sutradhar', 'bidhansd@gmail.com', 'http://www.facebook.com', 'India', 'Bangla,English,Mathematic,Physic,Computer', 'Male', '79e5e33b98.jpg', '2017-06-12', '0000-00-00', '0000-00-00'),
(4, '591e81a40f35f', 'Bidhan', 'bidhansd@gmail.com', 'http://www.facebook.com', 'canada', 'Bangla', 'Male', 'f0975616be.jpg', '2017-06-12', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `userId` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_role` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `active` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `deleted_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userId`, `name`, `username`, `email`, `password`, `user_role`, `token`, `active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, '591e81a40f35f', 'Bidhan', 'vkbidhan', 'bidhanvk@gmail.com', '$2y$10$xy4qSQz0g0RbtQorc5Ajqe1ROdRBB9V/jVJdHxshqDS0RYyJSWGOm', 1, '2e9b203e2c8617092921cf7c5ece25d84f6e2c7d', 1, '2017-05-19', '0000-00-00', '0000-00-00'),
(7, '591fc5c714c85', 'Razu', 'vkrazu', 'razu@gmail.com', '$2y$10$/i0s7Il04leFMsMTPLb4puBa5oL77ek0mCbsQCReLlAvr5T8r8e0S', 1, '5c0c82e71822e9da5c6248bcfd5636137d6351e8', 1, '2017-05-20', '0000-00-00', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addstudent`
--
ALTER TABLE `addstudent`
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
-- AUTO_INCREMENT for table `addstudent`
--
ALTER TABLE `addstudent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
