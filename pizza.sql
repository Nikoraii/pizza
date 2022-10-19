-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 20, 2022 at 12:24 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizza`
--

-- --------------------------------------------------------

--
-- Table structure for table `products-pizzas`
--

CREATE TABLE `products-pizzas` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(91) NOT NULL,
  `ingredients` varchar(191) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products-pizzas`
--

INSERT INTO `products-pizzas` (`id`, `name`, `ingredients`, `description`, `image`) VALUES
(1, 'Capricciosa', 'Dough, mozzarella cheese, Italian baked ham, mushroom, artichoke and tomato', 'Pizza capricciosa is a style of pizza in Italian cuisine prepared with mozzarella cheese, Italian baked ham, mushroom, artichoke and tomato. Types of edible mushrooms used may include cremini and others. Some versions may also use prosciutto, marinated artichoke hearts, olive oil, olives, basil leaves, and egg.', 'https://www.italianstylecooking.net/wp-content/uploads/2022/01/Pizza-capricciosa-1200x900.jpg'),
(2, 'Margherita', 'Tomatoes, mozzarella cheese, garlic, fresh basil, and extra-virgin olive oil.', 'Pizza Margherita is a typical Neapolitan pizza, made with San Marzano tomatoes, mozzarella cheese, fresh basil, salt, and extra-virgin olive oil.', 'https://cookieandkate.com/images/2021/07/classic-margherita-pizza.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `products-pizzas-prices`
--

CREATE TABLE `products-pizzas-prices` (
  `id` int(10) UNSIGNED NOT NULL,
  `pizza_id` int(10) UNSIGNED NOT NULL,
  `size` int(11) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products-pizzas-prices`
--

INSERT INTO `products-pizzas-prices` (`id`, `pizza_id`, `size`, `price`) VALUES
(1, 1, 32, 12.99),
(2, 1, 42, 15.5),
(3, 1, 60, 25),
(4, 2, 32, 10.45),
(5, 2, 42, 13.45);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products-pizzas`
--
ALTER TABLE `products-pizzas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products-pizzas-prices`
--
ALTER TABLE `products-pizzas-prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pizza_id` (`pizza_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products-pizzas`
--
ALTER TABLE `products-pizzas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products-pizzas-prices`
--
ALTER TABLE `products-pizzas-prices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products-pizzas-prices`
--
ALTER TABLE `products-pizzas-prices`
  ADD CONSTRAINT `products-pizzas-prices_ibfk_1` FOREIGN KEY (`pizza_id`) REFERENCES `products-pizzas` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
