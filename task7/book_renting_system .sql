-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2023 at 09:31 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book_renting_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_data`
--

CREATE TABLE `admin_data` (
  `id` int(4) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(35) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `phone_number` text DEFAULT NULL,
  `occupation` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_data`
--

INSERT INTO `admin_data` (`id`, `name`, `email`, `password`, `phone_number`, `occupation`) VALUES
(1, 'Neeraj', '4094.neeraj@gmail.com', '$2y$10$1lHcf3QkwB4gWSOZ.Pv5a.l4mb8wE5gI258bbJTwChSA.ExXEVR9u', '3456789012', 'HR'),
(3, 'Karan', 'karan@gmail.com', '$2y$10$qplXgiNM1FYRSOhUx3ikRe5rI5Sdx1K8UnQhF9F38ojPd5X1GSgFW', '2345678901', 'Owner'),
(4, 'Shekhar', '4048.shekhar@gmail.com', '$2y$10$xEU4IVOjM0WEqKekwU2tlO6K.2oCYak14azQ9OKhoknTBvpRORRjq', '3456789012', 'Employee'),
(5, 'Simran', 'simran@gmail.com', '$2y$10$Uj9yQ.joQWP8E2ZZwotNyupIzmcdMQs5kw8GgcdY9a4MyjZAum026', '6789012345', 'Employee');

-- --------------------------------------------------------

--
-- Table structure for table `books_details`
--

CREATE TABLE `books_details` (
  `book_id` int(4) NOT NULL,
  `book_name` varchar(255) DEFAULT NULL,
  `book_author` varchar(20) DEFAULT NULL,
  `book_category` varchar(20) DEFAULT NULL,
  `book_copies` int(3) DEFAULT NULL,
  `book_price` tinytext DEFAULT NULL,
  `description` text DEFAULT NULL,
  `book_image_name` varchar(35) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `book_rent_price` int(4) DEFAULT NULL,
  `book_unique_image_name` tinytext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books_details`
--

INSERT INTO `books_details` (`book_id`, `book_name`, `book_author`, `book_category`, `book_copies`, `book_price`, `description`, `book_image_name`, `created_date`, `modified_date`, `book_rent_price`, `book_unique_image_name`) VALUES
(1, 'spiderman :- no way home', 'Stan Lee', 'Marvel Studio', 43, '444', 'Spiderman home coming story', 'Spider4.jpg', '2023-12-26 07:41:17', '2023-12-26 08:23:59', 5, 'Img-658a839dd48c87.66278299.jpg'),
(2, 'spiderman :- home coming', 'Stan Lee', 'Marvel', 41, '322', 'Spiderman home coming from Multiverse', 'Spider1.jpg', '2023-12-26 07:47:14', '2023-12-26 08:10:48', 6, 'Img-658a850229a786.76333544.jpg'),
(4, 'spiderman :- far from home', 'Stan Lee', 'Marvels', 36, '334', 'Spiderman & Dr Strange story', 'Spider4.jpg', '2023-12-26 08:27:51', '2023-12-26 08:27:51', 4, 'Img-658a8e87abc488.93464768.jpg'),
(5, 'the incredible hulk', 'Bob Kane', 'The Avengers', 55, '556', 'Hulk story', 'spiderlogo2.jpg', '2023-12-26 08:28:50', '2023-12-26 08:28:50', 5, 'Img-658a8ec2dfe184.70627877.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `cart_id` int(4) NOT NULL,
  `book_id` int(4) DEFAULT NULL,
  `user_id` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_details`
--

INSERT INTO `cart_details` (`cart_id`, `book_id`, `user_id`) VALUES
(1, 1, 9),
(2, 2, 9),
(3, 3, 9);

-- --------------------------------------------------------

--
-- Table structure for table `category_details`
--

CREATE TABLE `category_details` (
  `category_id` int(4) NOT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `category_image_name` varchar(35) DEFAULT NULL,
  `category_unique_image_name` tinytext DEFAULT NULL,
  `book_quantity` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category_details`
--

INSERT INTO `category_details` (`category_id`, `category_name`, `category_image_name`, `category_unique_image_name`, `book_quantity`) VALUES
(2, 'Marvel', 'Spider4.jpg', 'Img-657d96de536cf4.41126240.jpg', 45),
(7, 'Marvel Studio', 'Spider1.jpg', 'Img-6587fd057837f7.64535772.jpg', 89),
(13, 'The Avengers', 'Spider4.jpg', 'Img-658a5e2825e315.88334295.jpg', 0),
(14, 'Marvels', 'Spiderman.jpg', 'Img-658a8e5c04d4e6.57116428.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rented_book_details`
--

CREATE TABLE `rented_book_details` (
  `rented_id` int(4) NOT NULL,
  `user_id` int(4) DEFAULT NULL,
  `user_address` varchar(50) DEFAULT NULL,
  `user_state` varchar(20) DEFAULT NULL,
  `user_city` varchar(20) DEFAULT NULL,
  `user_pin_code` int(6) DEFAULT NULL,
  `book_id` int(3) DEFAULT NULL,
  `issue_date` date DEFAULT NULL,
  `returned_date` date DEFAULT NULL,
  `renting_charges` int(5) DEFAULT NULL,
  `user_name_on_card` varchar(40) DEFAULT NULL,
  `user_card_number` int(16) DEFAULT NULL,
  `user_card_expiration_date` varchar(35) DEFAULT NULL,
  `user_card_cvc` int(4) DEFAULT NULL,
  `payment_status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rented_book_details`
--

INSERT INTO `rented_book_details` (`rented_id`, `user_id`, `user_address`, `user_state`, `user_city`, `user_pin_code`, `book_id`, `issue_date`, `returned_date`, `renting_charges`, `user_name_on_card`, `user_card_number`, `user_card_expiration_date`, `user_card_cvc`, `payment_status`) VALUES
(2, 9, '#168,Zirakpur', 'Chandigarh', 'Baltana', 140680, 1, '2023-12-26', '2023-12-28', 32, 'Neeraj', 2147483647, '2023-12', 445, 'Success'),
(3, 9, '#168,Zirakpur', 'Chandigarh', 'Zirakpur', 140680, 2, '2023-12-26', '2023-12-27', 20, 'Shagun', 2147483647, '2023-12', 445, 'Success'),
(7, 9, '#168,Zirakpur', 'Chandigarh', 'Chandigarh', 140606, 2, '2023-12-26', '2023-12-28', 22, 'Neeraj', 2147483647, '2023-12', 455, 'Pending'),
(8, 9, '#168,Zirakpur', 'Chandigarh', 'Zirakpur', 140680, 1, '2023-12-26', '2023-12-29', 25, 'Neeraj', 2147483647, '2023-12', 455, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `user_id` int(4) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `phone_no` text DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_id`, `name`, `email`, `password`, `phone_no`, `address`, `gender`, `status`, `created_date`, `modified_date`) VALUES
(1, 'Neeraj Kumar', '4094.neeraj@gmail.com', '$2y$10$SJRWEYiBazILJM.7VrfqgeLvTkN3Et3CnvxXjrzW8M5boypM3DdOW', '1234567890', '#168,Zirakpur', 'Male', 'Active', '2023-12-23 05:35:41', '2023-12-23 05:39:39'),
(2, 'Shekhar', '4048.shekhar@gmail.com', '$2y$10$n/Ljk7NgIcHNyvwiQmgNLOPan4..mlGblcRd1dv04urokIADLOLY.', '2345678901', '$298,Sector-34, Chandigarh', 'Male', 'Active', '2023-12-23 05:40:38', '2023-12-24 13:16:09'),
(3, 'Ankur', '4020.ankur@gmail.com', '$2y$10$.3uhHNNwHWWi9ScbvXuJfOITr7DSlIukgDR2je5ah3Z3pBgxjMhZm', '3456789012', '#168,Zirakpur,Chandigarh', 'Male', 'Active', '2023-12-23 09:14:25', '2023-12-23 09:14:25'),
(5, 'Sajal', 'sajal@gmail.com', '$2y$10$exmUmGaVZ.MCgTFBxYW3/ey3Egjk21w2iT079aeoMdYGgpV01qxPC', '1232987459', '$298,Sector-34, Chandigarh', 'Male', 'Active', '2023-12-23 14:26:29', '2023-12-23 14:26:29'),
(6, 'Param', 'param@gmail.com', '$2y$10$n.fulZiPFA3WD3ut9bJeN.XUD0qPxhYnLzUng0k7OaSgdyeuthtQi', '6789012345', '#88,Manimajra', 'Female', 'Active', '2023-12-23 16:17:53', '2023-12-23 16:17:53'),
(7, 'Sukhpal', 'sukhpal@gmail.com', '$2y$10$w/J2f4bCcwkZzvxQt0BQaOPm3GuaPsysawq00lAm/keUuJgxhWCdy', '3456789012', '#455,Kharar,Chandigarh', 'Male', 'Active', '2023-12-25 18:09:50', '2023-12-25 18:17:34'),
(8, 'Simran', 'simran@gmail.com', '$2y$10$KLRYi2GXrE/11.oZUqkEyO4GSELDBv41e7ts521HimVzRwABk4KUa', '1234567890', '$298,Sector-34, Chandigarh', 'Female', 'Active', '2023-12-25 20:07:24', '2023-12-25 20:07:24'),
(9, 'Shagun', 'shagun@gmail.com', '$2y$10$.8YtWnEzRwkfaTBBVlXPpudVWXXeTbjjUiuAN4A2OoxDYlkZjWl0u', '2345678901', '$298,Sector-34, Chandigarh', 'Male', 'Active', '2023-12-26 05:04:45', '2023-12-26 05:18:01');

-- --------------------------------------------------------

--
-- Table structure for table `user_review_details`
--

CREATE TABLE `user_review_details` (
  `review_id` int(4) NOT NULL,
  `user_id` int(4) DEFAULT NULL,
  `user_review` varchar(100) DEFAULT NULL,
  `user_rating` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_review_details`
--

INSERT INTO `user_review_details` (`review_id`, `user_id`, `user_review`, `user_rating`) VALUES
(1, 1, 'Nice book store bro', 5),
(4, 2, 'Thanks bro for the book', 4),
(7, 3, 'Awesome comic books', 4),
(8, 8, 'Thanks for the magazine. Nice magazine', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_data`
--
ALTER TABLE `admin_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books_details`
--
ALTER TABLE `books_details`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category_details`
--
ALTER TABLE `category_details`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `rented_book_details`
--
ALTER TABLE `rented_book_details`
  ADD PRIMARY KEY (`rented_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_review_details`
--
ALTER TABLE `user_review_details`
  ADD PRIMARY KEY (`review_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_data`
--
ALTER TABLE `admin_data`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `books_details`
--
ALTER TABLE `books_details`
  MODIFY `book_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cart_details`
--
ALTER TABLE `cart_details`
  MODIFY `cart_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category_details`
--
ALTER TABLE `category_details`
  MODIFY `category_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `rented_book_details`
--
ALTER TABLE `rented_book_details`
  MODIFY `rented_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `user_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_review_details`
--
ALTER TABLE `user_review_details`
  MODIFY `review_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
