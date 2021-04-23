-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: mysql-mehd1brahimov.alwaysdata.net
-- Generation Time: Apr 23, 2021 at 03:29 PM
-- Server version: 10.5.8-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mehd1brahimov_car`
--

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `price_promo` decimal(11,2) NOT NULL,
  `vat` int(11) NOT NULL,
  `availability` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`id`, `car_id`, `price`, `price_promo`, `vat`, `availability`, `status`) VALUES
(0, 0, '3973.29', '4370.61', 23, 23, 1),
(1, 1, '2682.56', '2950.81', 17, 37, 1),
(2, 2, '2712.83', '2984.11', 23, 23, 1),
(3, 3, '2732.60', '3005.86', 19, 35, 1),
(4, 4, '2754.13', '3029.54', 17, 4, 1),
(5, 5, '1334.15', '1467.56', 23, 33, 1),
(6, 6, '3460.97', '3807.06', 17, 34, 1),
(7, 7, '1351.08', '1486.18', 19, 37, 1),
(8, 8, '2129.07', '2341.97', 17, 5, 1),
(9, 9, '1349.76', '1484.73', 23, 1, 1),
(10, 10, '1921.20', '2113.32', 19, 3, 1),
(11, 11, '3806.57', '4187.22', 17, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `car_attributes`
--

CREATE TABLE `car_attributes` (
  `id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car_attributes`
--

INSERT INTO `car_attributes` (`id`, `car_id`, `name`, `value`) VALUES
(0, 0, 'Skoda', '23'),
(1, 1, 'Fiat', '37'),
(2, 2, 'Peugeot', '23'),
(3, 3, 'Opel', '35'),
(4, 4, 'Opel', '4'),
(5, 5, 'Peugeot', '33'),
(6, 6, 'Audi', '34'),
(7, 7, 'Opel', '37'),
(8, 8, 'Fiat', '5'),
(9, 9, 'Fiat', '1'),
(10, 10, 'Skoda', '3'),
(11, 11, 'Peugeot', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `car_id` (`car_id`);

--
-- Indexes for table `car_attributes`
--
ALTER TABLE `car_attributes`
  ADD PRIMARY KEY (`car_id`,`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
