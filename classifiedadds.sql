-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2016 at 01:48 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `classifiedadds`
--

-- --------------------------------------------------------

--
-- Table structure for table `adds_info`
--

CREATE TABLE `adds_info` (
  `adds_id` int(10) UNSIGNED NOT NULL,
  `adds_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `adds_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adds_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `seller_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seller_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seller_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `premium_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_payment` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `expiry_date` datetime NOT NULL,
  `is_approved` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `adds_info`
--

INSERT INTO `adds_info` (`adds_id`, `adds_title`, `slug`, `adds_description`, `adds_type`, `category_id`, `price`, `seller_name`, `seller_email`, `seller_phone`, `location`, `city`, `premium_type`, `is_payment`, `expiry_date`, `is_approved`, `user_id`, `created_at`, `updated_at`) VALUES
(26, 'Samsung 7262 ', 'Samsung-7262-993', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 'Private', 6, '999.99', 'Raghvendra Pratap Singh', 'codingbrains2@gmail.com', '8574555158', '1', '1', '', '0', '0000-00-00 00:00:00', '1', 0, '2016-07-20 15:32:33', '2016-07-20 15:32:33'),
(27, 'Honda city', 'Honda-city138', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 'Private', 4, '999.99', 'Shubhanshu jaiswal', 'shubhanshu@gmail.com', '7894561230', '1', '1', '', '0', '0000-00-00 00:00:00', '1', 0, '2016-07-20 15:56:26', '2016-07-20 15:56:26'),
(28, 'Test1', 'Test1658', 'dvdf v r', 'Private', 4, '12.00', 'Mustak', 'codingbrains11@gmail.com', '1234567890', 'tesdfgbdf', '3', '', '0', '0000-00-00 00:00:00', '1', 3, '2016-07-22 13:51:28', '2016-07-22 13:51:28');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_icon`, `is_active`, `created_at`, `updated_at`) VALUES
(4, 'Automobiles', 'images/category/1468444331.jpg', 1, '2016-07-13 15:42:11', '2016-07-14 09:51:00'),
(5, 'Laptops', 'images/category/1468444363.jpg', 1, '2016-07-13 15:42:43', '2016-07-13 16:19:26'),
(6, 'Mobiles', 'images/category/1468445487.jpg', 1, '2016-07-13 16:01:27', '2016-07-13 16:19:29'),
(7, 'Electronics', 'images/category/1468445516.jpg', 1, '2016-07-13 16:01:56', '2016-07-13 16:19:30'),
(8, 'Computer Accessories', 'images/category/1468445571.jpg', 1, '2016-07-13 16:02:51', '2016-07-13 16:19:32'),
(9, 'Real Estates', 'images/category/1468445601.jpg', 1, '2016-07-13 16:03:21', '2016-07-13 16:19:34'),
(10, 'Home Appliances', 'images/category/1468445630.jpg', 1, '2016-07-13 16:03:50', '2016-07-13 16:19:39'),
(11, 'Cameras', 'images/category/1468445659.jpg', 1, '2016-07-13 16:04:19', '2016-07-13 16:19:40'),
(12, 'Fashion & Beauty', 'images/category/1468445698.jpg', 1, '2016-07-13 16:04:58', '2016-07-13 16:19:53'),
(13, 'Kids & Baby Products', 'images/category/1468445735.jpg', 1, '2016-07-13 16:05:35', '2016-07-13 16:19:50'),
(14, 'Jobs', 'images/category/1468445750.jpg', 1, '2016-07-13 16:05:50', '2016-07-13 16:19:47'),
(15, 'Home & Furniture', 'images/category/1468445766.jpg', 1, '2016-07-13 16:06:06', '2016-07-13 16:19:43'),
(16, 'Test1', 'images/category/1468446211.jpg', 0, '2016-07-13 16:13:31', '2016-07-18 12:22:51'),
(17, 'Test2', 'images/category/1468509681.jpg', 0, '2016-07-14 09:51:21', '2016-07-18 12:23:06');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `city_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city_name`, `is_active`, `created_at`, `updated_at`) VALUES
(3, 'Test 1', 1, '2016-07-22 13:44:30', '2016-07-22 13:44:47'),
(4, 'Test 2', 1, '2016-07-22 13:44:35', '2016-07-22 13:44:49'),
(5, 'Test 3', 1, '2016-07-22 13:44:43', '2016-07-22 13:44:50');

-- --------------------------------------------------------

--
-- Table structure for table `city_list`
--

CREATE TABLE `city_list` (
  `city_id` int(10) UNSIGNED NOT NULL,
  `city_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `adds_id` int(11) NOT NULL,
  `img_type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `img_path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `adds_id`, `img_type`, `img_path`, `created_at`, `updated_at`) VALUES
(4, 26, '0', 'images/adds/1.png1469048553.png', '2016-07-20 15:32:33', '2016-07-20 15:32:33'),
(5, 26, '0', 'images/adds/2.jpg1469048553.jpg', '2016-07-20 15:32:33', '2016-07-20 15:32:33'),
(6, 26, '0', 'images/adds/3.jpg1469048553.jpg', '2016-07-20 15:32:33', '2016-07-20 15:32:33'),
(7, 26, '0', 'images/adds/4.jpg1469048553.jpg', '2016-07-20 15:32:33', '2016-07-20 15:32:33'),
(8, 27, '0', 'images/adds/camera.jpg1469049986.jpg', '2016-07-20 15:56:26', '2016-07-20 15:56:26'),
(9, 27, '0', 'images/adds/car.jpg1469049986.jpg', '2016-07-20 15:56:26', '2016-07-20 15:56:26'),
(10, 27, '0', 'images/adds/catalog.jpg1469049986.jpg', '2016-07-20 15:56:26', '2016-07-20 15:56:26'),
(11, 27, '0', 'images/adds/hdd.jpg1469049986.jpg', '2016-07-20 15:56:26', '2016-07-20 15:56:26'),
(12, 27, '0', 'images/adds/house.jpg1469049986.jpg', '2016-07-20 15:56:26', '2016-07-20 15:56:26'),
(13, 28, '', 'images/adds/1.jpg1469215288.jpg', '2016-07-22 13:51:28', '2016-07-22 13:51:28');

-- --------------------------------------------------------

--
-- Table structure for table `main_category`
--

CREATE TABLE `main_category` (
  `categoty_id` int(10) UNSIGNED NOT NULL,
  `main_categoty_id` int(11) NOT NULL,
  `categoty_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `categoty_icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `categoty_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_06_28_163736_create_subscriptions_table', 1),
('2016_07_06_131658_create_adds_info_table', 1),
('2016_07_06_131807_create_main_category_table', 1),
('2016_07_06_131942_create_payments_info_table', 1),
('2016_07_06_132019_create_city_list_table', 1),
('2016_07_06_135114_create_state_list_table', 1),
('2016_07_12_224056_categories', 2),
('2016_07_13_163137_sub_categories', 3),
('2016_07_15_152723_locations', 4),
('2016_07_20_152209_create_images_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments_info`
--

CREATE TABLE `payments_info` (
  `payment_id` int(10) UNSIGNED NOT NULL,
  `payment_mode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_date` datetime NOT NULL,
  `payment_amount` decimal(5,2) NOT NULL,
  `payment_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `state_list`
--

CREATE TABLE `state_list` (
  `state_id` int(10) UNSIGNED NOT NULL,
  `state_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stripe_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stripe_plan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `name`, `created_at`, `updated_at`) VALUES
(1, '2', 'Sub Category 2', '2016-07-13 11:28:32', '2016-07-13 13:39:50'),
(2, '1', 'Sub Category 2', '2016-07-13 12:50:45', '2016-07-13 13:38:42'),
(3, '4', 'Honda', '2016-07-13 16:52:45', '2016-07-13 16:52:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `about_me` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zip_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_email_verify` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `is_mobile_verify` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `account_type` enum('0','1') COLLATE utf8_unicode_ci NOT NULL,
  `user_type` enum('0','1','2') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `is_active` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `gender`, `mobile_no`, `about_me`, `address`, `city`, `state`, `zip_code`, `is_email_verify`, `is_mobile_verify`, `account_type`, `user_type`, `is_active`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Mustak', 'khan', 'codingbrains1@gmail.com', '$2y$10$TFd6Raq0Ct9/za3vltROfOrM1SkffhZBv0F6IvBktuGlt8/tUxxoW', 'Male', '1234567890', '', 'LUCKNOW', '', '', '226016', '1', '0', '', '2', '0', 'lqn6kF3qGsnzguXzidOj3THi45GigpZnZASsz3NPOZEGvHcvDtOgAgfDDeLN', '2016-07-11 14:46:49', '2016-07-22 10:25:13'),
(3, 'Raghvendra Pratap', 'singh', 'admin@classified.com', '$2y$10$KZ4mcXdEaQOTowSd69.4q.UXmlybkoD2HPEXNMb/B5e9b.BvpqNOq', 'Male', '1234567890', '', '', '', '', '', '1', '0', '', '0', '0', '9aV3BIiKw2NMOkVFq5uTHMmidOxOK1bpMrE7CMZRGlwvVvqPmQOlR4IRe21p', '2016-07-12 10:02:40', '2016-07-22 13:58:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adds_info`
--
ALTER TABLE `adds_info`
  ADD PRIMARY KEY (`adds_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city_list`
--
ALTER TABLE `city_list`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_category`
--
ALTER TABLE `main_category`
  ADD PRIMARY KEY (`categoty_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `payments_info`
--
ALTER TABLE `payments_info`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `state_list`
--
ALTER TABLE `state_list`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adds_info`
--
ALTER TABLE `adds_info`
  MODIFY `adds_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `city_list`
--
ALTER TABLE `city_list`
  MODIFY `city_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `main_category`
--
ALTER TABLE `main_category`
  MODIFY `categoty_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payments_info`
--
ALTER TABLE `payments_info`
  MODIFY `payment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `state_list`
--
ALTER TABLE `state_list`
  MODIFY `state_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
