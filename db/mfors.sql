-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2019 at 01:36 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mfors`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admine10adc3949ba59abbe56e057f20f883e'),
(2, 'ben', '881be630f9de92378a920844ea076448');

-- --------------------------------------------------------

--
-- Table structure for table `basket`
--

CREATE TABLE `basket` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_made` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `basket`
--

INSERT INTO `basket` (`id`, `customer_name`, `contact_number`, `address`, `email`, `total`, `status`, `date_made`) VALUES
(13, 'Wada', '08065463632', 'Wadagailcom', 'gg@gmail.com', '700', 'pending', '2016-12-31 15:50:21'),
(14, 'Amr Abdullah', '09077665544', 'Address', 'amr13@yahoo.com', '50', 'pending', '2017-11-27 06:39:47'),
(15, 'shantanu bahuguna', '9012356288', 'UK', 'shan@gmail.com', '340', 'pending', '2019-05-02 00:03:07'),
(16, 'Biren Sharma', '9929841024', 'NIIT', 'biren962@gmail.com', '70', 'pending', '2019-05-02 14:40:40');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int(11) NOT NULL,
  `food_name` varchar(255) NOT NULL,
  `food_category` varchar(255) NOT NULL,
  `food_price` varchar(255) NOT NULL,
  `food_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `food_name`, `food_category`, `food_price`, `food_description`) VALUES
(12, 'Apple Pie', 'crust', '70', 'Freshly served apple pie'),
(13, 'Banana Pie', 'cream', '100', 'Tasty banana pie with served cream'),
(14, 'Berry Pie', 'crust', '170', 'Black berry pie with no added sugar'),
(15, 'Fruit Pie', 'cream', '150', 'Mix fruit pie '),
(16, 'Coconut Pie', 'cream', '340', 'Coconut pie made from fresh  coconut'),
(18, 'Chess Pie', 'crust', '238', 'Made with love'),
(19, 'Cream pie', 'cream', '135', 'Best seller pie'),
(20, 'Chocolate Pie', 'fillings', '230', 'Chocolate pie '),
(21, 'Marshmallow Pie', 'special', '490', 'Tasty Pie with marshmallow'),
(22, 'Vanilla pie', 'special', '549', 'Vanilla pie '),
(23, 'Pineapple Pie', 'fillings', '60', 'Tastes best with some olive oil'),
(24, 'Jelly Pie', 'special', '210', 'Jelly pie'),
(25, 'Sweet potato pie', 'fillings', '189', 'Sweet potato pie');

-- --------------------------------------------------------

--
-- Table structure for table `globals`
--

CREATE TABLE `globals` (
  `global_id` int(11) NOT NULL,
  `global_amt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `globals`
--

INSERT INTO `globals` (`global_id`, `global_amt`) VALUES
(1, '2');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `food` varchar(100) NOT NULL,
  `qty` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `order_id`, `food`, `qty`) VALUES
(1, '13', 'pizza', '2'),
(2, '14', 'salad', '1'),
(3, '15', 'Coconut Pie', '1'),
(4, '16', 'Apple Pie', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `globals`
--
ALTER TABLE `globals`
  ADD PRIMARY KEY (`global_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `globals`
--
ALTER TABLE `globals`
  MODIFY `global_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
