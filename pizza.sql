-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2022 at 08:20 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

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
-- Table structure for table `carts_request`
--

CREATE TABLE `carts_request` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(190) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `size` int(11) NOT NULL,
  `price` double NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carts_request`
--

INSERT INTO `carts_request` (`id`, `name`, `product_id`, `size`, `price`, `user_id`) VALUES
(8, 'Margherita', 2, 42, 13.45, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products_pizzas`
--

CREATE TABLE `products_pizzas` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(91) NOT NULL,
  `ingredients` varchar(191) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products_pizzas`
--

INSERT INTO `products_pizzas` (`id`, `name`, `ingredients`, `description`, `image`) VALUES
(1, 'Capricciosa', 'Dough, mozzarella cheese, Italian baked ham, mushroom, artichoke and tomato', 'Pizza capricciosa is a style of pizza in Italian cuisine prepared with mozzarella cheese, Italian baked ham, mushroom, artichoke and tomato. Types of edible mushrooms used may include cremini and others. Some versions may also use prosciutto, marinated artichoke hearts, olive oil, olives, basil leaves, and egg.', 'https://www.italianstylecooking.net/wp-content/uploads/2022/01/Pizza-capricciosa-1200x900.jpg'),
(2, 'Margherita', 'Tomatoes, mozzarella cheese, garlic, fresh basil, and extra-virgin olive oil.', 'Pizza Margherita is a typical Neapolitan pizza, made with San Marzano tomatoes, mozzarella cheese, fresh basil, salt, and extra-virgin olive oil.', 'https://assets.afcdn.com/recipe/20200206/107152_w1024h1024c1cx176cy267.webp'),
(3, 'Marinara', 'Tomato sauce, extra virgin olive oil, oregano, garlic', 'Pizza marinara, also known as pizza alla marinara, is a style of Neapolitan pizza in Italian cuisine seasoned with only tomato sauce, extra virgin olive oil, oregano and garlic. It is supposedly the most ancient tomato-topped pizza.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/11/Pizza_marinara.jpg/262px-Pizza_marinara.jpg'),
(4, 'Pugliese', 'Tomato, onion, mozzarella, Oregano, olives, and capers', 'Pizza pugliese is a style of pizza in Italian cuisine prepared with tomato, onion, and mozzarella. It is named after the region of Apulia (called in Italian Puglia). It should not be confused with pizza barese, the local Barese variant of preparing the pizza dough, which tends to be thinner and crispier than pizza napoletana.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/4e/Pizza_with_tomato%2C_sun-dried_tomato_and_onion.jpg/220px-Pizza_with_tomato%2C_sun-dried_tomato_and_onion.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `products_pizzas_prices`
--

CREATE TABLE `products_pizzas_prices` (
  `id` int(10) UNSIGNED NOT NULL,
  `pizza_id` int(10) UNSIGNED NOT NULL,
  `size` int(11) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products_pizzas_prices`
--

INSERT INTO `products_pizzas_prices` (`id`, `pizza_id`, `size`, `price`) VALUES
(1, 1, 32, 12.99),
(2, 1, 42, 15.5),
(3, 1, 60, 25),
(4, 2, 32, 10.45),
(5, 2, 42, 13.45),
(6, 3, 32, 11.75),
(7, 4, 32, 14.55);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone_number`, `password`, `adress`, `created_at`) VALUES
(1, 'Mark Smith', 'mark@example.com', '051433577', '3b4f122b181aeef98042c4219b554f4d76934f125c0c183494e9fa909f5f249e0ccfbd626da5851e904d5b8f66e29dbe819d2ba4fd2439f53462caaed4eeee90', 'Robert Robertson 123, Belgrade', '2022-10-27 19:48:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts_request`
--
ALTER TABLE `carts_request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products_pizzas`
--
ALTER TABLE `products_pizzas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_pizzas_prices`
--
ALTER TABLE `products_pizzas_prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pizza_id` (`pizza_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts_request`
--
ALTER TABLE `carts_request`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products_pizzas`
--
ALTER TABLE `products_pizzas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products_pizzas_prices`
--
ALTER TABLE `products_pizzas_prices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts_request`
--
ALTER TABLE `carts_request`
  ADD CONSTRAINT `carts_request_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products_pizzas` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `products_pizzas_prices`
--
ALTER TABLE `products_pizzas_prices`
  ADD CONSTRAINT `products_pizzas_prices_ibfk_1` FOREIGN KEY (`pizza_id`) REFERENCES `products_pizzas` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
