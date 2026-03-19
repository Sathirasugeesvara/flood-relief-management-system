-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2026 at 04:23 AM
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
-- Database: `floodrelfmansys_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `relief_type` enum('Food','Water','Medicine','Shelter') NOT NULL,
  `district` varchar(100) NOT NULL,
  `divisional_secretariat` varchar(100) NOT NULL,
  `gn_division` varchar(100) NOT NULL,
  `contact_name` varchar(100) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `family_members` int(11) NOT NULL,
  `severity` enum('Low','Medium','High') NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `user_id`, `relief_type`, `district`, `divisional_secretariat`, `gn_division`, `contact_name`, `contact_number`, `address`, `family_members`, `severity`, `description`, `created_at`) VALUES
(1, 3, 'Food', 'Galle', 'Habaraduwa DS', 'Kathaluwa GN', 'Nimal Perera', '0712345671', 'Kathaluwa, Habaraduwa', 5, 'High', 'Family displaced due to flood', '2026-03-18 20:53:13'),
(2, 4, 'Water', 'Matara', 'Matara DS', 'Nupe GN', 'Kamal Silva', '0712345672', 'Nupe, Matara', 4, 'Medium', 'Water sources contaminated', '2026-03-18 20:53:13'),
(3, 5, 'Medicine', 'Kalutara', 'Panadura DS', 'Wadduwa GN', 'Sunil Fernando', '0712345673', 'Wadduwa Area', 3, 'High', 'Children suffering from fever', '2026-03-18 20:53:13'),
(4, 6, 'Shelter', 'Hambantota', 'Tangalle DS', 'Netolpitiya GN', 'Kasuni Madushika', '0712345674', 'Netolpitiya, Tangalle', 6, 'High', 'House damaged by flood', '2026-03-18 20:53:13'),
(5, 3, 'Food', 'Ratnapura', 'Ratnapura DS', 'Mudduwa GN', 'Nimal Perera', '0712345675', 'Mudduwa Area', 5, 'Medium', 'Clothes lost during flood', '2026-03-18 20:53:13'),
(6, 4, 'Food', 'Colombo', 'Kolonnawa DS', 'Kolonnawa GN', 'Kamal Silva', '0712345676', 'Kolonnawa Town', 7, 'High', 'Large family affected', '2026-03-18 20:53:13'),
(7, 5, 'Water', 'Gampaha', 'Kelaniya DS', 'Peliyagoda GN', 'Sunil Fernando', '0712345677', 'Peliyagoda Area', 4, 'Medium', 'Need clean water', '2026-03-18 20:53:13'),
(8, 6, 'Medicine', 'Kegalle', 'Kegalle DS', 'Galigamuwa GN', 'Kasuni Madushika', '0712345678', 'Galigamuwa Area', 3, 'High', 'Medicine for elderly', '2026-03-18 20:53:13'),
(9, 3, 'Shelter', 'Matara', 'Akuressa DS', 'Akuressa GN', 'Nimal Perera', '0712345679', 'Akuressa Town', 5, 'High', 'House flooded completely', '2026-03-18 20:53:13'),
(10, 4, 'Food', 'Galle', 'Baddegama DS', 'Baddegama GN', 'Kamal Silva', '0712345680', 'Baddegama Area', 6, 'High', 'Food shortage after flood', '2026-03-18 20:53:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'Admin Sathira', 'adminsathira@gmail.com', 'adminsathira', 'admin', '2026-03-18 20:53:13'),
(2, 'Admin Hashintha', 'adminhashintha@gmail.com', 'adminhashintha', 'admin', '2026-03-18 20:53:13'),
(3, 'Sathira Sugeesvara', 'sathirasugeesvara@gmail.com', '12345678', 'user', '2026-03-18 20:53:13'),
(4, 'Kamal Silva', 'hashintha@gmail.com', '12345678', 'user', '2026-03-18 20:53:13'),
(5, 'Sunil Fernando', 'sunil@gmail.com', 'sunil123', 'user', '2026-03-18 20:53:13'),
(6, 'Kasuni Madushika', 'kasuni@gmail.com', 'kasuni123', 'user', '2026-03-18 20:53:13'),
(7, 'Ruwan Kumara', 'ruwan@gmail.com', 'ruwan123', 'user', '2026-03-18 20:53:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
