-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql203.epizy.com
-- Generation time: 5/30/2023 at 2:47 PM
-- Server version: 10.4.17-MariaDB
-- PHP version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marvins_pizzeria`
--

-- ------------------------------------------------ --------

--
-- Structure for `crusts` table
--

CREATE TABLE `crusts` (
   `id` int(11) NOT NULL,
   `crust` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data to the `crusts` table
--

INSERT INTO `crusts` (`id`, `crust`) VALUES
(1, 'Pan'),
(2, 'Thin'),
(3, 'Gluten Free');

-- ------------------------------------------------ --------

--
-- Structure for `orders` table
--

CREATE TABLE `orders` (
   `id` int(11) NOT NULL,
   `pizza_id` int(11) NOT NULL,
   `status_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ------------------------------------------------ --------

--
-- Structure for `orders_status` table
--

CREATE TABLE `orders_status` (
   `id` int(11) NOT NULL,
   `status` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data to the `orders_status` table
--

INSERT INTO `orders_status` (`id`, `status`) VALUES
(1, 'Pending'),
(2, 'Preparing'),
(3, 'Completed'),
(4, 'Cancelled');

-- ------------------------------------------------ --------

--
-- Framework for table `pizzas`
--

CREATE TABLE `pizzas` (
   `id` int(11) NOT NULL,
   `size_id` int(11) NOT NULL,
   `crust_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ------------------------------------------------ --------

--
-- Structure for table `pizzas_toppings`
--

CREATE TABLE `pizzas_toppings` (
   `id` int(11) NOT NULL,
   `pizza_id` int(11) NOT NULL,
   `topping_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ------------------------------------------------ --------

--
-- Structure for `sizes` table
--

CREATE TABLE `sizes` (
   `id` int(11) NOT NULL,
   `size` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data to `sizes` table
--

INSERT INTO `sizes` (`id`, `size`) VALUES
(1, 'Small'),
(2, 'Medium'),
(3, 'Large');

-- ------------------------------------------------ --------

--
-- Structure for `toppings` table
--

CREATE TABLE `toppings` (
   `id` int(11) NOT NULL,
   `topping` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data to the `toppings` table
--

INSERT INTO `toppings` (`id`, `topping`) VALUES
(1, 'Pepperoni'),
(2, 'Chicken'),
(3, 'Margherita'),
(4, 'Bacon'),
(5, 'Pineapple'),
(6, 'Mozzarella'),
(7, 'Sausage'),
(8, 'Shrimp'),
(9, 'Spinach'),
(10, 'Mushroom');

--
-- Indexes of deleted tables
--

--
-- `crusts` table indexes
--
ALTER TABLE `crusts`
   ADD PRIMARY KEY(`id`);

--
-- `orders` table indexes
--
ALTER TABLE `orders`
   ADD PRIMARY KEY(`id`),
   ADD KEY `pizza_id` (`pizza_id`),
   ADD KEY `status_id` (`status_id`);

--
-- `orders_status` table indexes
--
ALTER TABLE `orders_status`
   ADD PRIMARY KEY(`id`);

--
-- `pizzas` table indexes
--
ALTER TABLE `pizzas`
   ADD PRIMARY KEY(`id`),
   ADD KEY `size_id` (`size_id`),
   ADD KEY `crust_id` (`crust_id`);

--
-- Table indexes `pizzas_toppings`
--
ALTER TABLE `pizzas_toppings`
   ADD PRIMARY KEY(`id`),
   ADD KEY `pizza_id` (`pizza_id`),
   ADD KEY `topping_id` (`topping_id`);

--
-- `sizes` table indexes
--
ALTER TABLE `sizes`
   ADD PRIMARY KEY(`id`);

--
-- `toppings` table indexes
--
ALTER TABLE `toppings`
   ADD PRIMARY KEY(`id`);

--
-- AUTO_INCREMENT of dropped tables
--

--
-- AUTO_INCREMENT of `crusts` table
--
ALTER TABLE `crusts`
   MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT of `orders` table
--
ALTER TABLE `orders`
   MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT of `orders_status` table
--
ALTER TABLE `orders_status`
   MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT of `pizzas` table
--
ALTER TABLE `pizzas`
   MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT of table `pizzas_toppings`
--
ALTER TABLE `pizzas_toppings`
   MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT of table `sizes`
--
ALTER TABLE `sizes`
   MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT of `toppings` table
--
ALTER TABLE `toppings`
   MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CON
