﻿-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2019 at 01:22 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `actecomm1`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `catid` int(11) NOT NULL,
  `catname` varchar(20) DEFAULT NULL,
  `hassubcat` enum('true','false') DEFAULT 'false',
  `hasparentcat` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`catid`, `catname`, `hassubcat`, `hasparentcat`) VALUES
(1, 'Perfumes', 'false', 'false'),
(2, 'Books', 'false', 'false'),
(3, 'Shoes', 'false', 'false'),
(4, 'Mobiles', 'false', 'false'),
(5, 'consumerelectronics', 'true', 'false'),
(6, 'clothing', 'false', 'false'),
(7, 'audio', 'false', 'true'),
(8, 'laptops', 'false', 'false'),
(9, 'video', 'false', 'true'),
(30, 'mp3players', 'false', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `catmap`
--

CREATE TABLE `catmap` (
  `parentcatid` int(11) DEFAULT NULL,
  `childcatid` int(11) DEFAULT NULL,
  `parentcatname` varchar(20) DEFAULT NULL,
  `childcatname` varchar(20) DEFAULT NULL,
  `rowindex` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catmap`
--

INSERT INTO `catmap` (`parentcatid`, `childcatid`, `parentcatname`, `childcatname`, `rowindex`) VALUES
(5, 7, 'consumerelectronics', 'audio', 1),
(5, 30, 'consumerelectronics', 'mp3players', 3),
(5, 9, 'consumerelectronics', 'video', 4);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` int(11) NOT NULL,
  `pname` varchar(20) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `pdescr` varchar(200) DEFAULT NULL,
  `catid` int(11) DEFAULT NULL,
  `IMGPATH` varchar(100) DEFAULT NULL,
  `URLDETAILS` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `pname`, `price`, `pdescr`, `catid`, `IMGPATH`, `URLDETAILS`) VALUES
(1, 'Brut', 150, 'Good', 1, 'images/FOGG1.png', 'produrls/fogg1.html'),
(2, 'Java Axe', 150, 'Good', 1, 'images/FOGG1.png', '#'),
(3, 'Davidoff', 150, 'Good', 1, 'images/FOGG1.png', '#'),
(4, 'Figaro', 150, 'Good', 1, 'images/FOGG1.png', '#'),
(5, 'Learning CSS', 200, 'Good', 2, 'images/books1.jpg', '#'),
(6, 'Learning jQuery', 200, 'Good', 2, 'images/books1.jpg', '#'),
(7, 'Learning Bootstrap', 200, 'Good', 2, 'images/books1.jpg', '#'),
(8, 'Learning CSS', 200, 'Good', 2, 'images/books1.jpg', '#'),
(9, 'Fogg1', NULL, 'Fogg1', 1, 'images/FOGG1.png', '#'),
(10, 'Euphoria1', NULL, 'Euphoria1', 1, 'images/Euphoria1.jpg', '#'),
(11, 'Eternity1', NULL, 'Eternity1', 1, 'images/Eternity1.jpg', '#'),
(12, 'Wildstone1', NULL, 'Wildstone1', 1, 'images/wildstone1.png', 'produrls/wildstone1.html'),
(13, 'fogg2', NULL, 'perfume', 1, 'images/FOGG1.png', 'produrls/fogg2.html'),
(14, 'wildstone1', NULL, 'wild stone 2\r\nprice:10$;\r\nxyz', 1, 'images/WILDSTONE2.png', 'produrls/wildstone2.html'),
(16, 'sonyled1', NULL, 'Resolution: HD Ready (1366x768p) | Refresh Rate: 5', 7, 'images/sonyled2.jpg', '#'),
(17, 'samsungled1', NULL, 'Resolution: HD Ready (1366x768p)\r\n Display: Story ', 7, 'images/samsungtel1.jpg', '#'),
(18, 'sonyled2', NULL, 'sony led 2', 7, 'images/sonyled2.jpg', 'produrls/sonyled2.html'),
(19, 'sony led tv 3', NULL, 'sony led tv 3\r\nfeature 1\r\nfeature 2:\r\nfeature 3:', 7, 'images/sonytel1.jpg', 'produrls/sony led tv 3.html'),
(20, 'sony led tv4', NULL, 'description', 7, 'images/sonytel1.jpg', 'produrls/sony led tv4.html'),
(23, 'sony led tv7', NULL, 'description 1', 7, 'images/sonytel1.jpg', 'produrls/sony led tv7.html'),
(27, 'sony led tv10', NULL, 'description 1', 7, 'images/sonytel1.jpg', 'produrls/sony led tv10.html'),
(28, 'sony led tv11', NULL, 'sony led tv 11\r\n\r\nfeature 1 \r\nfeature 2', 7, 'images/sonytel1.jpg', 'produrls/sony led tv11.html'),
(40, 'philipsmp3player1', NULL, 'feature 1 \r\nfeature 2', 30, 'images/philipsmp31.jpg', 'produrls/philipsmp3player1.html'),
(41, 'irulump31', NULL, 'iRULU F20 HiFi Lossless Mp3 Player with Bluetooth:', 30, 'images/irulump31.jpg', 'produrls/irulump31.html'),
(42, 'crispystylemp3_1', NULL, 'Hands-free portability & Clip up design\r\nSupports ', 30, 'images/crispystyl1.jpg', 'produrls/crispstylemp3player1.html'),
(43, 'leoiemp3_1', NULL, 'You can enjoy music by pairing with your Bluetooth', 30, 'images/leoiemp31.jpg', 'produrls/leoiemp3__1.html'),
(44, 'lenovo1', NULL, '\r\n    Processor: AMD E2-9000 processor\r\n    Operat', 8, 'images/lenovo1.png', 'produrls/lenovo1.html'),
(45, 'dell1', NULL, 'The compact and slim body of this Dell New Inspiro', 8, 'images/dell1.png', 'produrls/dell1.html'),
(46, 'hplap1', NULL, '\r\n    2.40GHz Intel Core i3-7100U 8th Gen processo', 8, 'images/hplaptop1.png', 'produrls/hplap1.html'),
(47, 'acer1', NULL, 'Acer Switch One Atom Quad Core - (2 GB/32 GB EMMC ', 8, 'images/acer1.png', 'produrls/acer1.html'),
(48, 'acerswift1', NULL, 'As far as specifications go, the Acer Swift 7 has an 8th Gen Intel Core i7-8500Y Amber Lake processor, up to 512GB of SSD storage, and up to 16GB RAM. The base variant has 256GB SSD storage and 8GB RA', 8, 'images/acerswift1.jpg', 'produrls/acerswift1.html'),
(49, 'aceraspire5', NULL, 'The narrow, 7.82mm1 bezel design offers more real estate for amazing images. With a 15.6” FHD IPS display and Acer Color Intelligence™1 crisp, true-to-life colors come alive. Adjust gamma and saturati', 8, 'images/Aspire_5.png', 'produrls/aceraspire5.html'),
(50, 'acer_spin_1', NULL, 'upercharge your laptop for work and play with an 8th Gen Intel® Core™ i5 processor.1 Intel® processors help apps load faster and allow multiple tasks to run simultaneously without lag. And with a batt', 8, 'images/Aspire_5.png', 'produrls/acer_spin_1.html');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(10) DEFAULT NULL,
  `pass` varchar(10) DEFAULT NULL,
  `role` varchar(10) DEFAULT 'normal'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `pass`, `role`) VALUES
('ramesh', 'ramesh', 'admin'),
('surya', 'surya', 'normal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `product_catid_fk` (`catid`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `product_catid_fk` FOREIGN KEY (`catid`) REFERENCES `categories` (`catid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
