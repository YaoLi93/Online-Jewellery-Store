-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 19, 2019 at 10:17 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jewelry_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_id`) VALUES
(1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Jewelry_id` int(11) NOT NULL,
  `category` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Jewelry_id`, `category`) VALUES
(1, 'Diamond'),
(2, 'Diamond'),
(3, 'Ring'),
(4, 'Ring'),
(5, 'Gold'),
(6, 'Ring'),
(7, 'Silver'),
(8, 'Ring'),
(9, 'Silver'),
(10, 'Chains'),
(11, 'Gold'),
(12, 'Chains'),
(13, 'Gold'),
(14, 'Chains'),
(15, 'Gold'),
(16, 'Gold'),
(17, 'Gold'),
(18, 'Engagement'),
(19, 'Gold'),
(20, 'Engagement'),
(21, ''),
(21, 'Diamond'),
(22, 'Engagement'),
(23, 'Engagement'),
(24, 'Gold'),
(25, 'Gold'),
(27, 'Engagement'),
(28, 'Chains'),
(29, 'Chains'),
(30, 'Gold'),
(31, 'Chains'),
(32, 'Gold'),
(33, 'Engagement'),
(34, 'Engagement'),
(35, 'Gold'),
(36, 'Engagement'),
(37, 'Silver'),
(38, 'Pearl'),
(39, 'Gold');

-- --------------------------------------------------------

--
-- Table structure for table `jewelry`
--

CREATE TABLE `jewelry` (
  `Jewelry_id` int(11) NOT NULL,
  `Jewelry_name` varchar(40) NOT NULL,
  `Jewelry_rating` varchar(10) NOT NULL,
  `year` varchar(5) NOT NULL,
  `price` float(10,2) NOT NULL,
  `isDeleted` int(2) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jewelry`
--

INSERT INTO `jewelry` (`Jewelry_id`, `Jewelry_name`, `Jewelry_rating`, `year`, `price`, `isDeleted`) VALUES
(1, 'Shine', 'P5', '2017', 1499.99, 0),
(2, 'One Promise', 'P5', '2017', 1999.89, 0),
(3, 'Forevermark Swan Bridal', 'P5', '2017', 2999.99, 0),
(4, 'Bond to Love', 'P4', '2017', 949.99, 0),
(5, 'Perfect Love', 'P4', '2016', 1314.99, 0),
(6, '\"Lily\" Pure', 'P3', '2016', 479.99, 0),
(7, 'Endless Love', 'P4', '2017', 999.99, 0),
(8, 'Forever ', 'P4', '2017', 999.99, 0),
(9, 'Fairtale', 'P3', '2017', 888.99, 0),
(10, 'Phoenix ', 'P5', '2016', 1299.99, 0),
(11, 'Dragon', 'P5', '2016', 1399.99, 0),
(12, 'Floral', 'P3', '2017', 799.99, 0),
(13, 'Phoenix Forgotten', 'P4', '2017', 599.99, 0),
(14, 'Golden Resplendence', 'P4', '2016', 1399.99, 0),
(15, 'Piggy Cherub', 'P3', '2016', 399.99, 0),
(16, 'Donut x Bao Bao', 'P3', '2016', 399.99, 0),
(17, 'Bao Bao pls', 'P3', '2016', 399.99, 0),
(18, 'Hydrangea ', 'P3', '2016', 499.99, 0),
(19, 'Star Love', 'P4', '2016', 599.99, 0),
(20, 'Champion Pig', 'P3', '2017', 299.99, 0),
(21, 'Phoenix Earring', 'P2', '2017', 399.99, 0),
(22, 'Mickey Earring', 'P2', '2017', 199.99, 0),
(23, 'Floral Earring', 'P3', '2017', 399.99, 0),
(24, 'Liy Flower', 'P2', '2017', 299.99, 0),
(25, 'Mickey mouse', 'P3', '2017', 399.99, 0),
(26, 'Darth Vader', 'P3', '2017', 399.99, 0),
(27, 'Lantern', 'P2', '2017', 299.99, 0),
(28, 'Lucky pig', 'P2', '2017', 99.99, 0),
(29, 'Pig Bracelet', 'P3', '2017', 399.99, 0),
(30, 'Winnie', 'P3', '2016', 399.99, 0),
(31, 'Heart Chains', 'P2', '2016', 499.99, 0),
(32, 'Lantern Earring ', 'P2', '2017', 299.99, 0),
(33, 'Dragons & Phoneixes', 'P3', '2017', 599.99, 0),
(34, 'Engagement Bangle', 'P4', '2016', 699.99, 0),
(35, 'Engagement Silver Bangle', 'P3', '2016', 799.99, 0),
(36, 'Floral Bracelet', 'P2', '2016', 399.99, 0),
(37, 'Phoenix Bangle', 'P3', '2016', 599.99, 0),
(38, 'Pearl', 'P3', '2017', 499.99, 0),
(39, 'Iron Man', 'P2', '2016', 399.99, 0),
(40, 'Pig King ', 'P3', '2017', 499.99, 0);

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `user_id` int(11) NOT NULL,
  `Jewelry_id` int(11) NOT NULL,
  `check_out` tinyint(1) NOT NULL,
  `date` date NOT NULL,
  `order_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shopping_cart`
--

INSERT INTO `shopping_cart` (`user_id`, `Jewelry_id`, `check_out`, `date`, `order_id`) VALUES
(1, 2, 1, '2019-04-18', 1),
(1, 3, 1, '2019-04-18', 398356643),
(1, 3, 1, '2019-04-18', 753324182),
(1, 4, 0, '2019-04-18', 1420134226),
(1, 6, 1, '2019-04-18', 2),
(1, 15, 1, '2019-04-18', 3),
(1, 24, 0, '2019-04-18', 1631175993),
(1, 24, 0, '2019-04-18', 1695280293),
(1, 35, 1, '2019-04-18', 4),
(1, 40, 1, '2019-04-18', 506112961),
(1, 40, 1, '2019-04-18', 745108816),
(2, 2, 0, '2019-04-18', 5),
(3, 2, 0, '2019-04-19', 6978),
(3, 12, 0, '2019-04-19', 8873),
(3, 16, 1, '2019-04-19', 8190),
(3, 16, 1, '2019-04-19', 8813);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `user_name` varchar(40) NOT NULL,
  `password` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_email`, `user_name`, `password`) VALUES
(1, 'yxz180010@utdallas.edu', '123456', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(2, '123@out.com', 'asasas', '9cfa5c98e83959d50f5b34f9a7c962c74a975416'),
(3, '1234@out.com', 'asasasas', '7c4a8d09ca3762af61e59520943dc26494f8941b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Jewelry_id`,`category`);

--
-- Indexes for table `jewelry`
--
ALTER TABLE `jewelry`
  ADD PRIMARY KEY (`Jewelry_id`),
  ADD UNIQUE KEY `uk_Jewelry` (`Jewelry_name`);

--
-- Indexes for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD PRIMARY KEY (`user_id`,`Jewelry_id`,`order_id`),
  ADD KEY `fk_shopping_cart_Jewelry` (`Jewelry_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `uk_user_email` (`user_email`),
  ADD UNIQUE KEY `uk_user_name` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jewelry`
--
ALTER TABLE `jewelry`
  MODIFY `Jewelry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`Jewelry_id`) REFERENCES `jewelry` (`Jewelry_id`);

--
-- Constraints for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD CONSTRAINT `fk_shopping_cart_Jewelry` FOREIGN KEY (`Jewelry_id`) REFERENCES `jewelry` (`Jewelry_id`),
  ADD CONSTRAINT `fk_shopping_cart_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
