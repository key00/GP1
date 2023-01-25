-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2023 at 12:39 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `we-shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `username` varchar(255) NOT NULL,
  `p_id` int(10) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`username`, `p_id`, `quantity`) VALUES
('test', 15, 2),
('test', 9, 2),
('', 16, 1),
('keyna', 7, 2),
('keyna', 10, 2);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`) VALUES
(1, 'Apparel'),
(2, 'Shoes'),
(3, 'Accessories'),
(4, 'Cosmetics');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pro_id` int(11) NOT NULL,
  `pro_name` varchar(255) NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `description` text NOT NULL,
  `price` int(10) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pro_id`, `pro_name`, `product_img1`, `product_img2`, `description`, `price`, `cat_id`, `date`, `keywords`) VALUES
(6, 'HandBag', 'handbag1.jpg', 'handbag1.jpg', '<p>black handbag</p>', 50, 3, '2023-01-16 10:55:27', 'bag,handbag'),
(7, 'earring', 'earring1.jpg', 'earring1.jpg', '<p>gold earring</p>', 10, 3, '2022-12-17 14:02:38', 'earring'),
(8, 'Make-up brushes', 'brushes.jpg', 'brushes.jpg', '<p>a complete set of make-up brushes</p>', 40, 4, '2023-01-15 11:45:37', 'brush,brushes,makeup'),
(9, 'Black Sunglasses', 'sunglass3.jpg', 'sunglass3.jpg', '<p>Cute Black Sunglasses to pair with any of your outfits</p>', 10, 3, '2023-01-15 11:48:53', 'sun, sunglasses'),
(10, 'Hoodie', 'hoodie.jpg', 'hoodie.jpg', '<p>Purple hoodie</p>\r\n<p>Standard Size</p>', 40, 1, '2023-01-15 11:50:16', 'hoodie, sweater, jumper'),
(11, 'Sun dress', 'sundress2.jpg', 'sundress2.jpg', '<p>sundress with floral print</p>', 20, 1, '2023-01-16 10:30:19', 'dress, summer,sundress'),
(12, 'Moisturizer', 'moisturizer.jpg', 'moisturizer.jpg', '<p>La Roche Posay</p>\r\n<p>Double-repair moisturizer</p>', 10, 4, '2023-01-16 10:32:46', 'skincare, moisturizer, la roche posay'),
(13, 'Sneakers', 'shoes4.jpg', 'shoes4.jpg', '<p>White sneakers with colored strokes</p>', 40, 2, '2023-01-16 10:36:56', 'shoes, sneakers'),
(14, 'Jacket', 'jacket.jpg', '', '<p>white puffy jacket</p>', 70, 1, '2023-01-16 10:53:44', 'jacket,winter'),
(15, 'Handbag', 'handbag3.jpg', '', '<p>Brown handbag</p>\r\n<p>complete set 3 in 1</p>', 65, 3, '2023-01-16 10:57:30', 'bag,handbag'),
(16, 'Ripped Jeans', 'jeans1.jpg', '', '<p>Blue denim ripped jeans</p>', 30, 1, '2023-01-16 10:59:08', 'jeans,denim'),
(17, 'Denim jeans', 'jeans2.jpg', '', '<p>Blue denim jeans</p>', 25, 1, '2023-01-16 10:59:50', 'jeans,denim');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` text NOT NULL,
  `country` text NOT NULL,
  `address` varchar(255) NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `username`, `password`, `email`, `phone_number`, `country`, `address`, `register_date`) VALUES
(1, 'test1', 'test1', 'test', '12345678', 'test@gmail.com', '+905338857918', 'Rwanda', 'agaoglu 2, gumus sokak', '2023-01-13 13:59:58'),
(8, '', '', 'admin', 'admin', '', '', '', '', '2023-01-15 11:37:22'),
(10, 'keyna', 'laure', 'keyna', '12345', 'a@gmail.com', '+905338857918', 'burundi', 'agaoglu 2, gumus sokak', '2023-01-17 09:48:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
