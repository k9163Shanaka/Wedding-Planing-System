-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2020 at 05:59 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wps`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(10) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `phone_number` int(15) NOT NULL,
  `details` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `first_name`, `last_name`, `phone_number`, `details`) VALUES
(2, 'test', 'test', 1234567890, 'test1222'),
(5, 'sulakshana', 'geeth', 724893748, 'testing');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `pack_id` int(11) NOT NULL,
  `pack_code` varchar(11) NOT NULL,
  `pack_name` varchar(20) NOT NULL,
  `pack_title` varchar(255) NOT NULL,
  `pack_img` varchar(255) DEFAULT NULL,
  `pack_detail` varchar(255) NOT NULL,
  `pack_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`pack_id`, `pack_code`, `pack_name`, `pack_title`, `pack_img`, `pack_detail`, `pack_price`) VALUES
(1, 'v1', 'venue', 'Garden Wedding Venues', '../images/upload/102.jpg', 'Getting married in the great outdoors practically guarantees a glorious backdrop. Romantic garden party surrounded by blooms, an alfresco affair will never go out of style', 50000),
(2, 'v2', 'venue', 'Lakeside Garden Wedding Venues', '../images/upload/31.jpg', 'The feeling of a tropical breeze, natures at every corner, and the calming view of the lake		will calm your heart and mind as you say sacred vow to your loved one', 70000),
(3, 'v3', 'venue', 'Hotel Wedding Venues', '../images/upload/32.jpg', 'Our four banquet halls – Grand Ballroom, Crown Court, Windsor Ballroom, and LAVO – are the perfect venues to host your wedding. Our chefs will delight your guests with a selection of Western and Asian cuisine', 120000),
(4, 'p1', 'photo', 'Silver Package', '../images/upload/00.jpg', '10 x 24 Album -50 Pages<br>\r\n02 - 16 x 24 Framed Photos<be>\r\n06 - 12 x 18 Enlarged Photos Without Frame<br>\r\nThank You Card Options<br>\r\n100 - 6 x 6 or 6 x 8 Thank You Cards or<br>\r\n150 - 4 x 8 Thank You Cards<br>\r\n8 x 12 Family Album with 100 Photos<br>\r', 40000),
(5, 'p2', 'photo', 'Gold  Package', '../images/upload/02.jpg', '12 x 24 Album-50 Pages<br>\r\n02 - 16 x 24 Framed Photos<br>\r\n06 - 12 x 18 Enlarged Photos Without Frame<br>\r\nThank You Card Options<br>\r\n200 - 6 x 6 Double Side Thank You Cards or<br>\r\n200 - 6 x 8 Single Side Thank You Cards<br>\r\n8x12 Family Album with 100', 70000),
(6, 'p3', 'photo', 'Platinum  Package', '../images/upload/03.jpg', '12 x 30 Album<br>\r\n50 Pages<br>\r\n03 - 16 x 24 Framed Photos<br>\r\n06 - 12 x 18 Enlarged Photos Without Frame<br>\r\nThank You Card Options<br>\r\n200 - 6 x 6 Double Side Thank You Cards or<br>\r\n200 - 6 x 8 Single Side Thank You Cards<br>\r\n8x12 Family Album wit', 120000),
(7, 'f1', 'flower', 'Sweet Dreams Flower Bouquet', '../images/upload/10.jpg', '', 2500),
(9, 'f2', 'flower', 'Cupid Creation Flower Bouquet', '../images/upload/11.jpg', '', 2000),
(10, 'f3', 'flower', 'Multicolored 100 Roses Bouquet', '../images/upload/300.jpg', '', 2300),
(11, 'd1', 'dress', 'Single Breasted 4 Piece Suit', '../images/upload/26.png', '', 15000),
(12, 'd2', 'dress', 'Rolling Collar 5 piece suit', '../images/upload/27.jpg', '', 20000),
(13, 'd3', 'dress', 'Enchantress Wedding Dress', '../images/upload/28.jpg', '', 23000),
(14, 'd4', 'dress', 'Hataway Wedding Dress', '../images/upload/29.jpg', '', 27000),
(15, 'c1', 'car', 'Audi', '../images/upload/05.png', '<br>Model - A4<br>\r\nDoors - 4<br>\r\nSeats - 5<br>\r\nTransmission - Automatic<br>\r\nAir conditioning - Yes<br>\r\n(for 2 Hours & 30kms)<br>', 20000),
(16, 'c2', 'car', 'Mercedes-Benz', '../images/upload/06.jpg', '<br>Model - C200<br>\r\nDoors - 4<br>\r\nSeats - 5<br>\r\nTransmission - Automatic<br>\r\nAir conditioning - Yes<br>\r\n(for 2 Hours & 30kms)<br>', 22000),
(17, 'c3', 'car', 'BMW', '../images/upload/07.jpg', '<br>Model - 523i<br>\r\nDoors - 4<br>\r\nSeats - 5<br>\r\nTransmission - Automatic<br>\r\nAir conditioning - Yes<br>\r\n(for 2 Hours & 30kms)<br>', 25000),
(18, 'c4', 'car', 'BMW', '../images/upload/08.jpg', '<br>Model - i8<br>\r\nDoors - 2<br>\r\nSeats - 2<br>\r\nTransmission - Automatic<br>\r\nAir conditioning - Yes<br>\r\n(for 2 Hours & 30kms)<br>', 27000),
(19, 'e1', 'entertainment', 'Silver Package', '../images/upload/600.jpg', ' White Wedding Starlit DJ Booth<br>\r\nWhite Wedding Sound System<br>\r\nWedding Column Style Light Show<br>\r\nUp To Date Music<br>\r\nCustomer Playlist<br>\r\n+ Inflatable Photo Booth (4hrs)or Magic Selfie Mirror(4hrs)With Guest Book<br>\r\n+ 1 Of The Following<br>', 20000),
(20, 'e2', 'entertainment', 'Gold  Package', '../images/upload/33.jpg', 'White Wedding Starlit DJ Booth<br>\r\nWhite Wedding Sound System<br>\r\nWedding Column Style Light Show<br>\r\nUp To Date Music<br>\r\nCustomer Playlist<br>\r\n+ Inflatable Photo Booth (4hrs)\r\nor Magic Selfie Mirror** With Guest <br>\r\n+ 2 Of The Following<br>\r\nVenu', 30000),
(21, 'e3', 'entertainment', 'Platinum  Package', '../images/upload/04.jpg', 'White Wedding Starlit DJ Booth<br>\r\nWhite Wedding Sound System<br>\r\nWedding Column Style Light Show<br>\r\nUp To Date Music Customer Playlist<br>\r\n+ Inflatable Photo Booth (4hrs) or Magic Selfie Mirror** (4hrs)	With Guest Book<br>\r\n+ 16x16 Starlit Dance Flo', 40000),
(23, 's1', 'setteeback', 'Setteeback-Design 1', '../images/upload/15.png', '', 25000),
(24, 's2', 'setteeback', 'Setteeback-Design 2', '../images/upload/16.png', '', 20000),
(25, 's3', 'setteeback', 'Setteeback-Design 3', '../images/upload/17.png', '', 23000),
(26, 's4', 'setteeback', 'Setteeback-Design 4', '../images/upload/19.png', '', 27000),
(27, 'p1', 'poruwa', 'Poruwa-Design 1', '../images/upload/500.jpg', '', 45000),
(28, 'p2', 'poruwa', 'Poruwa-Design 2', '../images/upload/501.jpg', '', 40000),
(29, 'p3', 'poruwa', 'Poruwa-Design 3', '../images/upload/23.png', '', 43000),
(30, 'p4', 'poruwa', 'Poruwa-Design 4', '../images/upload/24.png', '', 47000);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `order_id` int(11) NOT NULL,
  `customer_name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `service_id` int(5) NOT NULL,
  `service_name` varchar(20) NOT NULL,
  `service_price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`order_id`, `customer_name`, `email`, `service_id`, `service_name`, `service_price`) VALUES
(18, 'sulakshana', 'geeth@gmail.com', 13, 'Enchantress Wedding ', 23000),
(19, 'sulakshana', 'geeth@gmail.com', 28, 'Poruwa-Design 2', 40000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL,
  `street_addres1` varchar(30) NOT NULL,
  `street_addres2` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `phone_number` int(10) NOT NULL,
  `user_type` enum('admin','customer','','') NOT NULL DEFAULT 'customer'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `password`, `street_addres1`, `street_addres2`, `city`, `state`, `phone_number`, `user_type`) VALUES
(21, 'Indrachapa', 'Senanayaka', 'admin@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'a', 'b', 'c', 'd', 468284929, 'admin'),
(22, 'sulakshana', 'geeth', 'geeth@gmail.com', '843cbacc61c8fe45886819ff1516e2e179374496', 'street 1', 'street 2', 'city', 'state', 724573846, 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`pack_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `pack_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
