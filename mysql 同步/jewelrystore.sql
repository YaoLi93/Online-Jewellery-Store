-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 28, 2019 at 10:31 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jewelrystore`
--

-- --------------------------------------------------------

--
-- Table structure for table `CART`
--

CREATE TABLE `CART` (
  `ID` bigint(20) NOT NULL COMMENT 'primary',
  `UID` bigint(20) NOT NULL COMMENT 'USER ID',
  `PID` bigint(20) NOT NULL COMMENT 'PRODUCT ID',
  `SELECT` tinyint(1) NOT NULL COMMENT 'is selectde?',
  `QUANTITY` int(11) DEFAULT NULL COMMENT 'product quantity'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='cart';

-- --------------------------------------------------------

--
-- Table structure for table `HISTORY`
--

CREATE TABLE `HISTORY` (
  `ID` bigint(20) NOT NULL COMMENT 'primary',
  `PID` bigint(20) NOT NULL COMMENT 'PID',
  `UID` bigint(20) NOT NULL COMMENT 'UID',
  `QUANTITY` int(11) NOT NULL COMMENT 'NUMBER',
  `CREATE_DATE` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'time'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='history';

-- --------------------------------------------------------

--
-- Table structure for table `PRODUCT`
--

CREATE TABLE `PRODUCT` (
  `ID` bigint(20) NOT NULL COMMENT 'primary',
  `PRODUCT_NAME` varchar(100) DEFAULT NULL COMMENT 'product_name',
  `PRICE` float DEFAULT NULL COMMENT 'price',
  `QUANTITY` bigint(20) DEFAULT NULL COMMENT 'number of product',
  `DETAIL` varchar(500) DEFAULT NULL COMMENT 'description',
  `IS_DELETE` tinyint(1) DEFAULT NULL COMMENT 'is deleted?'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='product';

-- --------------------------------------------------------

--
-- Table structure for table `PRODUCT_CATEGORY`
--

CREATE TABLE `PRODUCT_CATEGORY` (
  `ID` bigint(20) NOT NULL COMMENT 'primary',
  `PID` bigint(20) DEFAULT NULL COMMENT 'product id',
  `CATEGORY` varchar(100) DEFAULT NULL COMMENT 'CATEGORY'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='product CATEGORY';

-- --------------------------------------------------------

--
-- Table structure for table `PRODUCT_IMAGE`
--

CREATE TABLE `PRODUCT_IMAGE` (
  `ID` bigint(20) NOT NULL COMMENT 'primary',
  `URL1` varchar(100) DEFAULT NULL COMMENT 'product_image 1',
  `URL2` varchar(100) DEFAULT NULL COMMENT 'product_image 2',
  `URL3` varchar(100) DEFAULT NULL COMMENT 'product_image 3'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='product_image';

-- --------------------------------------------------------

--
-- Table structure for table `UC_USER`
--

CREATE TABLE `UC_USER` (
  `ID` bigint(20) NOT NULL COMMENT 'primary',
  `USER_NAME` varchar(100) DEFAULT NULL COMMENT 'user_name',
  `USER_PWD` varchar(200) DEFAULT NULL COMMENT 'passwd',
  `BIRTHDAY` datetime DEFAULT NULL COMMENT 'birthday',
  `NAME` varchar(200) DEFAULT NULL COMMENT 'name',
  `USER_ICON` varchar(500) DEFAULT NULL COMMENT 'avatar',
  `SEX` char(1) DEFAULT NULL COMMENT 'sex, 1:male，2:female，3：secret',
  `STAT` varchar(10) DEFAULT NULL COMMENT 'state，01:normal，02:admin',
  `USER_MALL` bigint(20) DEFAULT NULL COMMENT '当前所属MALL',
  `LAST_LOGIN_DATE` datetime DEFAULT NULL COMMENT 'last login',
  `EMAIL` varchar(200) DEFAULT NULL COMMENT 'email',
  `MOBILE` varchar(50) DEFAULT NULL COMMENT 'phone',
  `IS_DEL` char(1) DEFAULT '0' COMMENT 'is delete?',
  `IS_EMAIL_CONFIRMED` char(1) DEFAULT '0' COMMENT 'have email?',
  `CREATE_DATE` datetime DEFAULT CURRENT_TIMESTAMP COMMENT '注册时间',
  `UPDATE_DATE` datetime DEFAULT CURRENT_TIMESTAMP COMMENT '修改日期',
  `PWD_INTENSITY` char(1) DEFAULT NULL COMMENT 'password strong?',
  `MAC` char(64) DEFAULT NULL COMMENT 'mac地址'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='user';

--
-- Dumping data for table `UC_USER`
--

INSERT INTO `UC_USER` (`ID`, `USER_NAME`, `USER_PWD`, `BIRTHDAY`, `NAME`, `USER_ICON`, `SEX`, `STAT`, `USER_MALL`, `LAST_LOGIN_DATE`, `EMAIL`, `MOBILE`, `IS_DEL`, `IS_EMAIL_CONFIRMED`, `CREATE_DATE`, `UPDATE_DATE`, `PWD_INTENSITY`, `MAC`) VALUES
(7122681, 'f7d37937773d41291d66c9539fef59fb', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'zzh', NULL, '1', '1', 1, '2019-11-10 00:00:00', 'zxz180009@utdallas.edu', NULL, '0', '1', '2019-11-10 18:06:52', '2019-11-10 18:06:52', '2', NULL),
(7122683, 'edd1fb0c252d966d5deef76ec5cedae6', '4297f44b13955235245b2497399d7a93', NULL, 'zehong zooey', NULL, NULL, '1', NULL, NULL, NULL, NULL, '0', '0', '2019-11-28 00:39:06', '2019-11-27 18:39:06', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `WISH_LIST`
--

CREATE TABLE `WISH_LIST` (
  `ID` bigint(20) NOT NULL COMMENT 'primary',
  `UID` bigint(20) NOT NULL COMMENT 'primary',
  `PID` bigint(20) NOT NULL COMMENT 'primary'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='WISH_LIST';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `CART`
--
ALTER TABLE `CART`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `PRODUCT`
--
ALTER TABLE `PRODUCT`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `PRODUCT_CATEGORY`
--
ALTER TABLE `PRODUCT_CATEGORY`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `PRODUCT_IMAGE`
--
ALTER TABLE `PRODUCT_IMAGE`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `UC_USER`
--
ALTER TABLE `UC_USER`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `USER_NAME` (`USER_NAME`),
  ADD KEY `MOBILE` (`MOBILE`),
  ADD KEY `IDX_EMAIL` (`EMAIL`,`ID`),
  ADD KEY `IDX_CREATE_DATE` (`CREATE_DATE`,`ID`);

--
-- Indexes for table `WISH_LIST`
--
ALTER TABLE `WISH_LIST`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `CART`
--
ALTER TABLE `CART`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'primary';

--
-- AUTO_INCREMENT for table `PRODUCT`
--
ALTER TABLE `PRODUCT`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'primary';

--
-- AUTO_INCREMENT for table `PRODUCT_CATEGORY`
--
ALTER TABLE `PRODUCT_CATEGORY`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'primary';

--
-- AUTO_INCREMENT for table `PRODUCT_IMAGE`
--
ALTER TABLE `PRODUCT_IMAGE`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'primary';

--
-- AUTO_INCREMENT for table `UC_USER`
--
ALTER TABLE `UC_USER`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'primary', AUTO_INCREMENT=7122684;

--
-- AUTO_INCREMENT for table `WISH_LIST`
--
ALTER TABLE `WISH_LIST`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'primary';

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
