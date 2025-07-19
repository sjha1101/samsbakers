-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2023 at 09:35 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `samsbakers`
--
CREATE DATABASE IF NOT EXISTS `samsbakers` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `samsbakers`;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Birthday-Cake'),
(2, 'Wedding-Cake'),
(3, 'custom-cake');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` decimal(10,0) NOT NULL,
  `category` varchar(255) NOT NULL,
  `cake` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `Price` int(255) NOT NULL,
  `pay_status` int(11) NOT NULL,
  `order_status` int(11) NOT NULL DEFAULT 0,
  `order_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `name`, `email`, `contact`, `category`, `cake`, `address`, `Price`, `pay_status`, `order_status`, `order_date`) VALUES
(1, 1, 'sejal', 'sejal@gmail.com', '9873281232', '1', '1', 'janta-fatak,jamnagar', 450, 1, 1, '2023-09-25'),
(2, 1, 'Surbhi', 'surbhi@gmail.com', '9812321211', '1', '9', 'jamnagar', 500, 0, 1, '2023-09-26'),
(3, 1, 'foram', 'f@gmail.com', '6124871221', '2', '14', 'janta fatak,jamnagar', 4500, 1, 0, '2023-09-26'),
(4, 3, 'foram', 'f@gmail.com', '8678687687', '3', '23', 'jamnagar', 600, 0, 0, '2023-09-27');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `uploaded_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_image`, `price`, `category_id`, `uploaded_date`) VALUES
(1, 'chocolate-cake', '../uploads/1.png', 450, 1, '2023-09-27'),
(2, 'White Forest', '../uploads/2.png', 400, 1, '2023-09-17'),
(3, 'Oreo Cake', '../uploads/3.png', 550, 1, '2023-09-21'),
(4, 'Black Forest', '../uploads/4.png', 600, 1, '2023-09-21'),
(5, 'Strawberry-Cake', '../uploads/5.png', 750, 1, '0000-00-00'),
(6, 'White Chocolate Cake', '../uploads/6.png', 700, 1, '2023-09-22'),
(7, 'Dark Chocolate Cake', '../uploads/7.png', 500, 1, '2023-09-22'),
(8, 'Vanilla Cake', '../uploads/8.png', 500, 1, '2023-09-22'),
(9, 'Dark-Chocolate Cake', '../uploads/9.png', 500, 1, '2023-09-22'),
(10, 'Pink & white roses Cake', '../uploads/11.png', 2500, 2, '2023-09-23'),
(11, 'Birde Wedding Cake', '../uploads/12.png', 2000, 2, '2023-09-23'),
(12, 'White Chocolate Cake', '../uploads/13.png', 2550, 2, '2023-09-23'),
(13, 'Strawberry Cake', '../uploads/14.png', 4000, 2, '2023-09-23'),
(14, '3-tier wedding cake', '../uploads/15.png', 4700, 2, '2023-09-23'),
(15, 'Black current cake', '../uploads/17.png', 4500, 2, '2023-09-24'),
(16, 'Couple wedding cake', '../uploads/17.png', 6500, 2, '2023-09-24'),
(17, 'Strawberry Cake7', '../uploads/18.png', 7000, 2, '2023-09-24'),
(18, 'Floral ruffle cake', '../uploads/19.png', 6900, 2, '2023-09-24'),
(19, 'Black Forest Cake', '../uploads/21.png', 450, 3, '2023-09-24'),
(20, 'Chocolate-Cake', '../uploads/22.png', 500, 3, '2023-09-25'),
(21, 'Dark-Chocolate Cake', '../uploads/23.png', 600, 3, '2023-09-25'),
(22, 'graduation cake', '../uploads/24.png', 550, 3, '2023-09-25'),
(23, 'Anniversary Cake', '../uploads/25.png', 600, 3, '2023-09-25'),
(24, 'Strawberry Cake', '../uploads/26.png', 700, 3, '2023-09-25'),
(25, 'Valentine Cake', '../uploads/27.png', 600, 3, '2023-09-25'),
(26, 'Red velvet cake', '../uploads/28.png', 800, 3, '2023-09-25'),
(27, 'Anniversary cake', '../uploads/29.png', 900, 3, '2023-09-27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` decimal(10,0) NOT NULL,
  `password` varchar(20) NOT NULL,
  `is_admin` tinyint(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `contact`, `password`, `is_admin`) VALUES
(1, 'sejal', 'sejal123@gmail.com', '9979887512', 'surbhi', 0),
(2, 'admin', 'admin123@gmail.com', '6354841068', 'admin@21', 1),
(3, 'surbhi', 'surbhi@gmail.com', '9979887512', 'surbhi@123', 0),
(4, 'sejal', 'sejaljha2001@gmail.com', '9788989121', 'sejal', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;
