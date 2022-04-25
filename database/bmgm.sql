-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2022 at 09:08 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bmgm`
--

-- --------------------------------------------------------

--
-- Table structure for table `budgets`
--

CREATE TABLE `budgets` (
  `id` int(11) NOT NULL,
  `categoryId` int(10) NOT NULL,
  `amount` float NOT NULL,
  `dateCreated` date NOT NULL,
  `remark` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `budgets`
--

INSERT INTO `budgets` (`id`, `categoryId`, `amount`, `dateCreated`, `remark`) VALUES
(39, 2, 123, '2021-12-15', 'my test'),
(41, 3, 120, '2021-12-06', 'my expense'),
(43, 2, 120000, '2021-12-13', 'my expense'),
(44, 3, 230000, '2021-12-07', 'my expense'),
(45, 5, 123, '2021-12-10', 'my expense'),
(46, 5, 120, '2021-12-29', 'my expense'),
(47, 4, 2000, '2021-12-20', 'my expense...my..'),
(49, 2, 34500, '2021-12-06', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(10) NOT NULL,
  `dateCreated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categoryName`, `description`, `status`, `dateCreated`) VALUES
(1, 'Others', 'Nulla libero urna, sodales id justo sed, feugiat semper neque. Quisque sollicitudin tellus a condimentum sagittis. Nunc aliquet libero nec justo semper, ut condimentum neque mattis. Donec tincidunt, ipsum vel pulvinar pulvinar, leo ante lobortis justo, et ultricies quam sem vitae metus. Aliquam vel sagittis lorem. Curabitur ac sem orci. Nulla nec varius turpis.Pellentesque quis tristique augue. In convallis, ipsum nec pellentesque scelerisque, libero nunc auctor urna, nec hendrerit mauris ante a', 1, '2021-07-30'),
(2, 'Water', 'Praesent dignissim ante id sem semper scelerisque. Maecenas ac lacus egestas, cursus odio quis, tristique diam. Donec maximus congue metus at tincidunt. Suspendisse potenti. Nunc vel quam in metus aliquam placerat sed vitae lectus. Vivamus est nisl, consequat tincidunt blandit feugiat, sagittis sit amet risus. Curabitur congue est in risus mattis, malesuada tincidunt eros sodales. Donec convallis efficitur tincidunt. Etiam tellus nulla, sollicitudin tristique lacus ac, tincidunt placerat sapien.', 1, '2021-07-30'),
(3, 'Electricity', 'ullam sed ipsum ut ligula ullamcorper ornare nec et tortor. Suspendisse dui erat, pulvinar ut sapien et, varius convallis tellus. Nulla facilisi. In ante felis, lacinia a ornare nec, interdum nec enim. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Donec venenatis orci in laoreet consectetur. Sed lobortis at sapien et fermentum. Pellentesque eros turpis, tincidunt id enim eu, lobortis laoreet neque. Quisque ut justo risus.\r\n\r\n', 1, '2021-07-30'),
(4, 'Maintenance', 'Nullam sed ipsum ut ligula ullamcorper ornare nec et tortor. Suspendisse dui erat, pulvinar ut sapien et, varius convallis tellus. Nulla facilisi. In ante felis, lacinia a ornare nec, interdum nec enim. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Donec venenatis orci in laoreet consectetur. Sed lobortis at sapien et fermentum. Pellentesque eros turpis, tincidunt id enim eu, lobortis laoreet neque. Quisque ut justo risus.\r\n\r\nAct', 1, '2021-07-30'),
(5, 'Main Budget', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 1, '2021-07-30');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `categoryId` int(200) NOT NULL,
  `amount` float NOT NULL,
  `dateCreated` date NOT NULL,
  `remark` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `categoryId`, `amount`, `dateCreated`, `remark`) VALUES
(13, 4, 120, '2021-12-06', 'ttt');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `systemName` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `systemName_short` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `system_Logo` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `username`, `password`, `photo`) VALUES
(1, 'test', 'hello', 'my', 'e10adc3949ba59abbe56e057f20f883e', ''),
(40, 'hello', 'my', 'seiha', '202cb962ac59075b964b07152d234b70', '801597688.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `usersnew`
--

CREATE TABLE `usersnew` (
  `id` int(11) NOT NULL,
  `name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `usersnew`
--

INSERT INTO `usersnew` (`id`, `name`, `email`, `created_at`) VALUES
(1, 'seiha', 'choong_org@yahoo.com', '2021-12-25 16:21:26'),
(2, 'phalla', 'choong.ss@yahoo.com', '2021-12-25 16:21:26'),
(3, 'test', '123choong_org@yahoo.com', '2021-12-01 11:44:41'),
(4, 'phalla', 'seiha.ss@gmail.com', '2021-12-08 12:42:08'),
(5, 'phalla test', 'seiha.test@org.com', '2021-12-12 12:42:09'),
(6, 'seiha', 'seiha.ss@rath.com', '2021-12-13 00:00:00'),
(7, 'nokia 7811', 'admin@www.com', '2021-12-08 00:00:00'),
(17, 'nokia 7811', 'adminnew@example.com', '2021-12-06 00:00:00'),
(18, 'rose', 'seiha.ss@yahoo.com', '2021-12-14 00:00:00'),
(19, 'hello', 'saseiha.ss@gmail.com', '2021-11-30 00:00:00'),
(20, 'Cambodia', 'admin@www.com', '2021-12-02 00:00:00'),
(21, 'rose', 'admin@gmail.com', '2021-12-14 00:00:00'),
(22, 'rose', 'seiha.ss@rath.com', '2021-12-27 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `budgets`
--
ALTER TABLE `budgets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usersnew`
--
ALTER TABLE `usersnew`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `budgets`
--
ALTER TABLE `budgets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `usersnew`
--
ALTER TABLE `usersnew`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
