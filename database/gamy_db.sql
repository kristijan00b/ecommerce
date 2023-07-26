-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2023 at 01:07 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gamy_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `gamy_items`
--

CREATE TABLE `gamy_items` (
  `id` int(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` int(30) NOT NULL,
  `description` varchar(200) NOT NULL,
  `images` varchar(200) NOT NULL,
  `images_front` varchar(200) NOT NULL,
  `images_back` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gamy_items`
--

INSERT INTO `gamy_items` (`id`, `name`, `price`, `description`, `images`, `images_front`, `images_back`) VALUES
(1, 'Astro', 1800, 'Sastav: 100% pamuk \r\nZemlja porekla: Srbija', './images/Majice/Astronaut/view.jpg', './images/Majice/Astronaut/front.jpg', './images/Majice/Astronaut/back.jpg'),
(2, 'Gamer Life', 1900, 'Sastav: 100% pamuk \r\nZemlja porekla: Srbija', './images/Majice/Gamer/view.jpg', './images/Majice/Gamer/front.jpg', './images/Majice/Gamer/back.jpg'),
(3, 'Counter Terrorist', 1900, 'Sastav: 100% pamuk\r\nZemlja porekla: Srbija', './images/Majice/CSGO/view.jpg', './images/Majice/CSGO/front.jpg', './images/Majice/CSGO/back.jpg'),
(4, 'Paused Game', 1800, 'Sastav: 100% pamuk  \r\nZemlja porekla: Srbija', './images/Majice/Quote3/view.jpg', './images/Majice/Quote3/front.jpg', './images/Majice/Quote3/back.jpg'),
(5, 'Captain Teemo', 1900, 'Sastav: 100% pamuk \r\nZemlja porekla: Srbija', './images/Majice/Teemo/view.jpg', './images/Majice/Teemo/front.jpg', './images/Majice/Teemo/back.jpg'),
(6, 'OTP Yasuo', 1900, 'Sastav: 100% pamuk \r\nZemlja porekla: Srbija', './images/Majice/Yasuo/view.jpg', './images/Majice/Yasuo/front.jpg', './images/Majice/Yasuo/back.jpg'),
(7, 'Trevor Phillips GTA', 1900, 'Sastav: 100% pamuk \r\nZemlja porekla: Srbija', './images/Majice/GTA/view.jpg', './images/Majice/GTA/front.jpg', './images/Majice/GTA/back.jpg'),
(8, 'Minecraft', 1900, 'Sastav: 100% pamuk \r\nZemlja porekla: Srbija', './images/Majice/Minecraft/view.jpg', './images/Majice/Minecraft/front.jpg', './images/Majice/Minecraft/back.jpg'),
(9, 'WWCD', 1900, 'Sastav: 100% pamuk \r\nZemlja porekla: Srbija', './images/Majice/Pubg/view.jpg', './images/Majice/Pubg/front.jpg', './images/Majice/Pubg/back.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `gamy_orders`
--

CREATE TABLE `gamy_orders` (
  `id` int(30) NOT NULL,
  `item_id` int(30) NOT NULL,
  `item_name` varchar(30) NOT NULL,
  `item_price` int(30) NOT NULL,
  `item_quantity` int(30) NOT NULL,
  `order_date` date NOT NULL,
  `client_name` varchar(30) NOT NULL,
  `client_surname` varchar(30) NOT NULL,
  `client_city` varchar(30) NOT NULL,
  `client_address` varchar(50) NOT NULL,
  `client_phone` varchar(20) NOT NULL,
  `client_mail` varchar(50) NOT NULL,
  `item_size` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gamy_items`
--
ALTER TABLE `gamy_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gamy_orders`
--
ALTER TABLE `gamy_orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gamy_items`
--
ALTER TABLE `gamy_items`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `gamy_orders`
--
ALTER TABLE `gamy_orders`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
