-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2024 at 10:37 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'admin',
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `role`, `image`, `created_at`, `updated_at`) VALUES
(2, 'Super Admin', 'admin@example.com', '$2y$10$3IeHwULP2PMmi6R2C0G//OkEwHopt/vBNHZZEowIT3mVC5oOtrGE.', 'admin', '1729225015.png', '2024-10-17 22:29:24', '2024-10-17 22:31:55');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `id` int(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `total_amount_per_product` decimal(10,2) GENERATED ALWAYS AS (`quantity` * `price`) STORED,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_details`
--

INSERT INTO `cart_details` (`id`, `user_id`, `product_id`, `name`, `product_name`, `price`, `quantity`, `image`, `created_at`, `updated_at`) VALUES
(42, 3, 2, 'Jillian Molina', 'Elegant Summer Dress', '2499.00', 5, '1727315742-66f4bf1eed983.jpg', '2024-09-28 23:05:07', '2024-09-30 01:41:19'),
(43, 3, 3, 'Jillian Molina', 'Stylish Printed T-Shirt', '899.00', 3, '1727315771-66f4bf3bbf2c1.jpg', '2024-09-28 23:15:02', '2024-09-28 23:16:36');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_no` varchar(20) DEFAULT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `contact_no`, `message`, `created_at`, `updated_at`) VALUES
(2, 'Uta Bowen', 'nutasuguhy@mailinator.com', 'Est laboriosam ipsu', 'Ipsum minima nihil a', '2024-09-28 08:25:28', '2024-09-28 08:25:28'),
(3, 'Jamal Benjamin', 'zyvudyxap@mailinator.com', 'Voluptates amet cul', 'Autem rerum deserunt', '2024-09-28 21:45:29', '2024-09-28 21:45:29'),
(4, 'Nelle Hahn', 'tafyv@mailinator.com', 'Tempora velit volup', 'Esse alias libero il', '2024-09-28 21:46:02', '2024-09-28 21:46:02'),
(5, 'Tamara Wilkins', 'deso@mailinator.com', 'Nemo sint culpa rep', 'Aliquid placeat nem', '2024-09-28 22:49:58', '2024-09-28 22:49:58'),
(6, 'Ann Nichols', 'jypapusumi@mailinator.com', 'Ducimus deserunt qu', 'contact me soon', '2024-10-17 22:44:48', '2024-10-17 22:44:48'),
(7, 'Ann Nichols', 'jypapusumi@mailinator.com', 'Ducimus deserunt qu', 'contact me soon', '2024-10-17 22:44:49', '2024-10-17 22:44:49'),
(8, 'Alvin Green', 'zele@mailinator.com', 'Commodi est mollit e', 'heello', '2024-10-17 22:48:45', '2024-10-17 22:48:45'),
(9, 'Willa Jensen', 'resy@mailinator.com', 'Hic aliquid nisi lab', 'daassss', '2024-10-17 23:02:32', '2024-10-17 23:02:32'),
(10, 'Willa Jensen', 'resy@mailinator.com', 'Hic aliquid nisi lab', 'daassss', '2024-10-17 23:04:36', '2024-10-17 23:04:36'),
(12, 'Yoshi Case', 'susejuh@mailinator.com', 'Excepturi nulla veli', 'Maiores aliquam id d', '2024-10-17 23:09:16', '2024-10-17 23:09:16'),
(13, 'Karen Carter', 'rudo@mailinator.com', 'Eum nostrum magnam N', 'nooooooooooooooooooooooooooooooooo', '2024-10-17 23:10:22', '2024-10-17 23:10:22'),
(14, 'Declan Vang', 'juzy@mailinator.com', 'Error ea et sint pos', 'Dolorem illum liber', '2024-10-17 23:11:51', '2024-10-17 23:11:51'),
(15, 'Patricia Conway', 'difoxug@mailinator.com', 'Sit omnis necessitat', 'Cupiditate qui ad ve', '2024-10-17 23:18:04', '2024-10-17 23:18:04'),
(17, 'Jack Dunn', 'dowi@mailinator.com', 'A aliqua Sed accusa', 'dooooooooooooo', '2024-10-17 23:29:56', '2024-10-17 23:29:56');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(20) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_amount_per_product` decimal(10,2) DEFAULT NULL,
  `order_id` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `user_id`, `product_id`, `price`, `name`, `product_name`, `quantity`, `total_amount_per_product`, `order_id`, `image`, `created_at`, `updated_at`) VALUES
(46, 3, 2, '2499.00', 'Jillian Molina', 'Elegant Summer Dress', 10, '24990.00', 'ORDER_66F8D988D4B6C', '1727315742-66f4bf1eed983.jpg', '2024-09-28 22:52:28', '2024-09-28 22:52:28');

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(20) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `payment_status` enum('pending','completed','failed','refunded') NOT NULL,
  `order_status` enum('pending','processed','shipped','delivered','canceled') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `order_id`, `payment_status`, `order_status`, `created_at`, `updated_at`) VALUES
(9, 'ORDER_66F8D988D4B6C', 'completed', 'delivered', '2024-09-28 22:52:28', '2024-09-28 22:53:58');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `sku`, `category`, `price`, `qty`, `image`, `description`, `created_at`, `updated_at`) VALUES
(2, 'Elegant Summer Dress', 'SKU001', 'Girls/Womens', '2499.00', 10, '1729224924-6711e0dc4bfed.jpg', 'Perfect for sunny days, this elegant summer dress will make you shine!', '2024-09-25 15:15:51', '2024-10-17 22:30:24'),
(3, 'Stylish Printed T-Shirt', 'SKU002', 'Boys/Adults', '899.00', 15, '1729224988-6711e11c61169.jpg', 'Comfortable and trendy, this printed T-shirt is a wardrobe essential.', '2024-09-25 15:15:51', '2024-10-17 22:31:28'),
(4, 'Chic Leather Handbag', 'SKU003', 'Accessories', '599.00', 5, '1729225058-6711e1626f1f3.jpg', 'This chic leather handbag complements any outfit and is perfect for daily use.', '2024-09-25 15:15:51', '2024-10-17 22:32:38'),
(5, 'Floral Maxi Skirt', 'SKU004', 'Girls/Womens', '699.00', 12, '1729225082-6711e17a44ddd.jpg', 'Step out in style with this beautiful floral maxi skirt, perfect for any occasion.', '2024-09-25 15:15:51', '2024-10-17 22:33:02'),
(6, 'Casual Chinos', 'SKU005', 'Boys/Adults', '1499.00', 8, '1727315851-66f4bf8b59bd7.jpg', 'These chinos offer a perfect blend of comfort and style for everyday wear.', '2024-09-25 15:15:51', '2024-09-25 20:12:31'),
(7, 'Luxury Analog Watch', 'SKU006', 'Accessories', '5999.00', 3, '1727315878-66f4bfa6a2010.jpg', 'Elevate your style with this luxury analog watch that features a classic design.', '2024-09-25 15:15:51', '2024-09-25 20:12:58'),
(8, 'Trendy Off-Shoulder Top', 'SKU007', 'Girls/Womens', '1299.00', 20, '1727315894-66f4bfb663b5a.jpg', 'Make a statement with this trendy off-shoulder top, great for night outs.', '2024-09-25 15:15:51', '2024-09-25 20:13:14'),
(9, 'Sporty Running Shoes', 'SKU008', 'Boys/Adults', '3499.00', 10, '1727315907-66f4bfc315e10.jpg', 'These sporty running shoes provide excellent support for all your adventures.', '2024-09-25 15:15:51', '2024-09-25 20:13:27'),
(10, 'Elegant Evening Gown', 'SKU009', 'Girls/Womens', '4999.00', 5, '1727315922-66f4bfd2ad136.jpg', 'Dazzle at any event with this elegant evening gown, designed to impress.', '2024-09-25 15:15:51', '2024-09-25 20:13:42'),
(11, 'Formal Slim Fit Shirt', 'SKU010', 'Boys/Adults', '1899.00', 10, '1727315939-66f4bfe3b3722.jpg', 'Look sharp and sophisticated with this formal slim fit shirt, perfect for occasions.', '2024-09-25 15:15:51', '2024-09-25 20:13:59'),
(12, 'Stylish Crossbody Bag', 'SKU011', 'Accessories', '2499.00', 7, '1727316036-66f4c044d2c83.jpg', 'This stylish crossbody bag is functional and chic, ideal for daily outings.', '2024-09-25 15:15:51', '2024-09-25 20:15:36'),
(13, 'Classic Denim Skirt', 'SKU012', 'Girls/Womens', '1399.00', 15, '1727316059-66f4c05b59be8.jpg', 'This classic denim skirt is versatile and timeless, a must-have in your wardrobe.', '2024-09-25 15:15:51', '2024-09-25 20:15:59'),
(14, 'Comfortable Jogger Pants', 'SKU013', 'Boys/Adults', '1299.00', 8, '1727316094-66f4c07ed8aa6.jpg', 'These comfortable jogger pants are perfect for lounging or casual outings.', '2024-09-25 15:15:51', '2024-09-25 20:16:34'),
(15, 'Sleek Sports Watch', 'SKU014', 'Accessories', '1999.00', 6, '1727316146-66f4c0b2507a2.jpg', 'Keep track of time with this sleek sports watch, perfect for active lifestyles.', '2024-09-25 15:15:51', '2024-09-25 20:17:26'),
(16, 'Casual Cotton Top', 'SKU015', 'Girls/Womens', '899.00', 18, '1727316188-66f4c0dc991cd.jpg', 'Stay cool and stylish with this casual cotton top, ideal for warm days.', '2024-09-25 15:15:51', '2024-09-25 20:18:08'),
(17, 'Versatile Casual Sneakers', 'SKU016', 'Boys/Adults', '2499.00', 12, '1727316210-66f4c0f29f870.jpg', 'These versatile sneakers are perfect for everyday wear and outdoor activities.', '2024-09-25 15:15:51', '2024-09-25 20:18:30'),
(18, 'Stunning Cocktail Dress', 'SKU017', 'Girls/Womens', '3499.00', 9, '1727316235-66f4c10b1599b.jpg', 'Turn heads with this stunning cocktail dress, perfect for parties and gatherings.', '2024-09-25 15:15:51', '2024-09-25 20:18:55'),
(19, 'Graphic Print T-Shirt', 'SKU018', 'Boys/Adults', '999.00', 20, '1729225736-6711e408ebb7f.png', 'Express yourself with this graphic print T-shirt, a fun addition to any outfit.', '2024-09-25 15:15:51', '2024-10-17 22:43:56'),
(20, 'Stylish Backpack', 'SKU019', 'Accessories', '1599.00', 11, '1727316290-66f4c142062a8.jpg', 'This stylish backpack is perfect for school, work, or casual outings.', '2024-09-25 15:15:51', '2024-09-25 20:19:50'),
(21, 'Pleated Midi Skirt', 'SKU020', 'Girls/Womens', '2499.00', 14, '1727316308-66f4c15404317.jpg', 'Elevate your style with this pleated midi skirt, great for both casual and formal looks.', '2024-09-25 15:15:51', '2024-09-25 20:20:08'),
(22, 'Classic Blue Jeans', 'SKU021', 'Boys/Adults', '1999.00', 10, '1727316372-66f4c194790b3.jpg', 'These classic blue jeans are a staple piece for any wardrobe.', '2024-09-25 15:15:51', '2024-09-25 20:21:12'),
(23, 'Digital Fitness Watch', 'SKU022', 'Accessories', '2999.00', 5, '1727316404-66f4c1b42034f.png', 'Stay fit and motivated with this digital fitness watch, perfect for tracking workouts.', '2024-09-25 15:15:51', '2024-09-25 20:21:44'),
(24, 'Fashionable Sleeveless Top', 'SKU023', 'Girls/Womens', '1199.00', 16, '1727316470-66f4c1f62bfaa.jpg', 'Stay stylish in this fashionable sleeveless top, great for layering.', '2024-09-25 15:15:51', '2024-09-25 20:22:50'),
(25, 'Casual Slip-On Shoes', 'SKU024', 'Boys/Adults', '1799.00', 8, '1727316488-66f4c208677d4.png', 'These casual slip-on shoes are comfortable and perfect for everyday use.', '2024-09-25 15:15:51', '2024-09-25 20:23:08');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_details`
--

CREATE TABLE `shipping_details` (
  `id` int(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `address_line` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `postcode` varchar(20) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `order_id` varchar(255) DEFAULT NULL,
  `additional_info` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipping_details`
--

INSERT INTO `shipping_details` (`id`, `user_id`, `full_name`, `country`, `address_line`, `city`, `state`, `postcode`, `phone`, `email`, `order_id`, `additional_info`, `created_at`, `updated_at`) VALUES
(6, 3, 'Wang Miles', 'China', 'Aut unde explicabo', 'Ut optio sapiente m', 'Culpa modi officia i', 'Lorem velit laborum', '+1 (416) 334-2009', 'julohysahu@mailinator.com', NULL, 'Provident ea labore', '2024-09-28 22:51:58', '2024-09-28 22:51:58'),
(7, 3, 'Isabella Singleton', 'India', 'Nisi qui nulla commo', 'Et at elit omnis ac', 'Est ut ab cillum dol', 'Aperiam reprehenderi', '+1 (356) 591-4461', 'kaziraw@mailinator.com', NULL, 'Sit sed vitae quisqu', '2024-09-28 23:17:21', '2024-09-28 23:17:21');

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` int(11) NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'logo', 'logos/90tNPf02xvFTJDGOjDEZ8fleIvkmRyI2juosmk7X.png', '2024-09-27 22:11:41', '2024-10-18 23:41:51'),
(2, 'mobile_no', '98111888777', '2024-09-27 22:11:41', '2024-10-18 23:53:47'),
(3, 'copyright', '2024 , All Rights Reserved', '2024-09-27 22:11:41', '2024-10-18 23:53:47'),
(4, 'slogan', 'Fashion for all', '2024-09-27 22:11:41', '2024-10-18 23:53:47'),
(5, 'ourblog_content1', 'Trendy Outfit Inspiration', '2024-10-18 23:47:17', '2024-10-20 02:13:05'),
(6, 'ourblog_content2', 'Seasonal Fashion Trends', '2024-10-18 23:47:17', '2024-10-20 02:13:05'),
(7, 'ourblog_content3', 'Fashion Tips & Tricks', '2024-10-18 23:47:17', '2024-10-20 02:13:05'),
(8, 'ourblog_slogan1', 'Step Out in Style: Your Daily Dose of Fashion Inspiration', '2024-10-18 23:47:17', '2024-10-20 02:13:05'),
(9, 'ourblog_slogan2', 'Embrace the Seasons: Discover What\'s Hot Now', '2024-10-18 23:47:17', '2024-10-20 02:14:27'),
(10, 'ourblog_slogan3', 'Style Made Simple: Tips for Effortless Fashion', '2024-10-18 23:47:17', '2024-10-20 02:13:05'),
(11, 'ourblog_image1', 'logos/rxcb3ZzQ41iPpHNKx0GZJrLEy9XNIVIM5mwPK8uR.jpg', '2024-10-18 23:48:49', '2024-10-18 23:53:47'),
(12, 'ourblog_image2', 'logos/tOSrlEhh0vG0hI6h0sqK9yIv8ee1StVw9YQfGAVV.jpg', '2024-10-18 23:48:49', '2024-10-18 23:53:47'),
(13, 'ourblog_image3', 'logos/9ySc4TlkMTvp0FUtcGoyU1cA65ToRSKw1Q9PxleI.png', '2024-10-18 23:48:49', '2024-10-18 23:53:47'),
(14, 'A-image', 'logos/oSox4WQL303pAL1ByTLL0QoqbuD3O2rqfbrv8WmV.png', '2024-10-19 02:09:23', '2024-10-20 01:48:45'),
(15, 'B-image', 'logos/mc3KtGexu3txTOJ6XJpIJ01qXOjGvFXhNo9nQfHS.png', '2024-10-19 02:09:23', '2024-10-20 01:48:45'),
(16, 'shipping-image1', 'logos/pWpQeTRG8sy7FOq4VRsaVOnscpSPACJbMLeR9cy0.png', '2024-10-19 02:09:23', '2024-10-20 02:02:14'),
(17, 'shipping-image2', 'logos/AkqvlV8VZRAU0eEX2Y6Cm7GmdsbVrijW0WCOMUZD.png', '2024-10-19 02:09:23', '2024-10-20 02:02:14'),
(18, 'shipping-image3', 'logos/cW3FCP9oHDcosLbpICAjYZGxij9bLUABDFijbGeW.png', '2024-10-19 02:09:23', '2024-10-20 02:02:14'),
(19, 'shipping-image4', 'logos/g6oVCuTezfsGyD1evFpljmwbzZ8Pp3mXlkQMc12W.png', '2024-10-19 02:09:23', '2024-10-20 02:02:14'),
(20, 'banner_image1', 'logos/2HY9twqtB7NaCfKn4D5wsJIEJUsNUcvZCOP3wryy.png', '2024-10-19 02:09:23', '2024-10-20 01:23:03'),
(21, 'banner_image2', 'logos/UgrtAkUBL5ueQQ7ZhDVVcHaC3hbfYzUcpwfpcoIy.png', '2024-10-19 02:09:23', '2024-10-20 01:16:58'),
(22, 'banner_image3', 'logos/nKZBjqbkdrQ3kEsLJPUupiJmGBlwRULQPOZEvmI8.png', '2024-10-19 02:09:23', '2024-10-20 01:16:58'),
(27, 'A-content1', 'Trendy Products', '2024-10-19 02:09:23', '2024-10-20 01:48:45'),
(28, 'A-content2', 'Discount', '2024-10-19 02:09:23', '2024-10-20 01:48:45'),
(29, 'A-content3', '2024 Collection', '2024-10-19 02:09:23', '2024-10-20 01:48:45'),
(30, 'B-content1', 'Latest Fashion', '2024-10-19 02:09:23', '2024-10-20 01:48:45'),
(31, 'B-content2', 'Festival Collection', '2024-10-19 02:09:23', '2024-10-20 01:48:45'),
(32, 'B-content3', 'More Discounts', '2024-10-19 02:09:23', '2024-10-20 01:48:45'),
(33, 'shipping_content1', 'Free Shipping', '2024-10-19 02:09:23', '2024-10-20 02:02:14'),
(34, 'shipping_subcontent1', 'Free delivery on almost all Products', '2024-10-19 02:09:23', '2024-10-20 02:07:32'),
(35, 'shipping_content2', 'Support 24/7', '2024-10-19 02:09:23', '2024-10-20 02:02:14'),
(36, 'shipping_subcontent2', 'Customer Support Anytime', '2024-10-19 02:09:23', '2024-10-20 02:02:14'),
(37, 'shipping_content3', 'Return Policy', '2024-10-19 02:09:23', '2024-10-20 02:02:14'),
(38, 'shipping_subcontent3', 'Return Product and get Refund', '2024-10-19 02:09:23', '2024-10-20 02:02:14'),
(39, 'shipping_content4', 'Massive Discount', '2024-10-19 02:09:24', '2024-10-20 02:02:14'),
(40, 'shipping_subcontent4', 'Discount on every Order', '2024-10-19 02:09:24', '2024-10-20 02:02:14'),
(41, 'about_us_title', 'Fashion for You Marketplace Site', '2024-10-19 02:09:24', '2024-10-20 01:08:47'),
(42, 'about_us_subtitle', 'Style That Inspires Confidence', '2024-10-19 02:09:24', '2024-10-20 00:57:03'),
(43, 'about_us_description', 'We bring you stylish, sustainable clothing that blends elegance with modern trends. Our designs are crafted to make you feel confident and comfortable, wherever you go.', '2024-10-19 02:09:24', '2024-10-20 00:57:03'),
(44, 'about_us_breadcrumb_title', 'About Us', '2024-10-19 02:09:24', '2024-10-20 00:50:39'),
(45, 'vision_title', 'Our Vision', '2024-10-19 02:09:24', '2024-10-20 00:57:03'),
(46, 'vision_description', 'To inspire a sustainable fashion future where style and ethics meet.', '2024-10-19 02:09:24', '2024-10-20 00:57:03'),
(47, 'mission_title', 'Our Mission', '2024-10-19 02:09:24', '2024-10-20 00:57:03'),
(48, 'mission_description', 'To create high-quality, fashionable clothing while promoting sustainability and individuality.', '2024-10-19 02:09:24', '2024-10-20 00:57:03'),
(49, 'goal_title', 'Our Goal', '2024-10-19 02:09:24', '2024-10-20 00:57:03'),
(50, 'goal_description', 'To become a leading brand in sustainable, stylish fashion globally.', '2024-10-19 02:09:24', '2024-10-20 00:57:03'),
(51, 'banner_title1', 'Luxury Fashion Display', '2024-10-19 02:09:24', '2024-10-20 01:08:47'),
(52, 'banner_title2', 'Elegant Winterwear Collection', '2024-10-19 02:09:24', '2024-10-20 01:08:47'),
(53, 'banner_title3', 'Exclusive Evening Gowns', '2024-10-19 02:09:24', '2024-10-20 01:08:47'),
(54, 'banner_price1', '674', '2024-10-19 02:09:24', '2024-10-19 02:09:24'),
(55, 'banner_price2', '576', '2024-10-19 02:09:24', '2024-10-19 02:09:24'),
(56, 'banner_price3', '655', '2024-10-19 02:09:24', '2024-10-19 02:09:24');

-- --------------------------------------------------------

--
-- Table structure for table `teammembers`
--

CREATE TABLE `teammembers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teammembers`
--

INSERT INTO `teammembers` (`id`, `name`, `position`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Avishek Das', 'Leader', 'images/team/1729409066-6714b02a1ac44.jpg', '2024-10-19 08:09:21', '2024-10-20 01:39:26'),
(3, 'Krishana Jaysawal', 'Associates', 'images/team/1729409117-6714b05d45d56.jpg', '2024-10-19 08:09:21', '2024-10-20 01:40:17'),
(4, 'Ashok Kumar Pandit', 'Associates', 'images/team/1729405207-6714a117d6e3b.jpg', '2024-10-19 08:09:21', '2024-10-20 00:35:07'),
(5, 'Aaryan Ansari', 'Associates', 'images/team/1729405228-6714a12ce0027.png', '2024-10-19 03:07:25', '2024-10-20 00:35:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(2, 'xukafep', 'Carissa Kent', 'tocyqezuto@mailinator.com', '$2y$10$4Qg/1MWSbZIqBzoIK4QPKuJP4y5CniTo6jHpDdWsfOI.2MzG9J7oq', '2024-09-25 08:35:08', '2024-09-27 23:39:52'),
(3, 'wenexaxi', 'Jillian Molina', 'paru@mailinator.com', '$2y$10$GElYU3qnwsjn85Y9reKWQe7WP5t7ggMvRE2OvwTZVPdutReq0CfxG', '2024-09-28 02:19:18', '2024-09-28 02:19:18'),
(4, 'docivy', 'Ashok Pandit', 'gipydinaxo@mailinator.com', '$2y$10$.ObBWgyqDAWDKV9xtqiEMuidcxxbY/yRp0gjxbr2rTfrnHWAZwPAm', '2024-10-17 22:12:16', '2024-10-17 22:13:56'),
(5, 'hozyqom', 'Samuel Dennis', 'zinymi@mailinator.com', '$2y$10$ATWnkTyKzyN6zTewEZa2xe/lcoudwQzdtsPQAkaQtee9IkaaSRwEq', '2024-10-17 22:25:09', '2024-10-17 22:25:09'),
(6, 'xepita', 'Jessamine Browning', 'wifutaviro@mailinator.com', '$2y$10$KTxSxIjERvmA.h4YGnh4SOVa.ij9mzVIdHvTFKjCydIFTGdF3BHKi', '2024-10-18 22:33:47', '2024-10-18 22:33:47');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(20) NOT NULL,
  `user_id` int(20) UNSIGNED NOT NULL,
  `country` varchar(255) DEFAULT NULL,
  `street_address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `country`, `street_address`, `city`, `state`, `phone`, `image`, `created_at`, `updated_at`) VALUES
(1, 2, 'Similique laborum ex', 'Rem dolor laboris er', 'Ratione velit dicta', 'Hic aspernatur eos', '+1 (754) 179-3211', 'images/gZZ55EtkS1fJb8Xyn7i0mbDciDMISMOEv9qBe1Pu.png', '2024-09-27 23:39:52', '2024-09-27 23:39:52'),
(2, 3, 'china', '95974', 'kalaiya', '7878', '59987784998', 'images/GPQhxpEQ4UfehUc0hoopDbFodyh3HumnrQgVY0Ui.png', '2024-09-28 02:20:10', '2024-09-28 22:56:22'),
(3, 4, 'Nepal', 'kalaiya-5', 'kalaiya', 'Madhesh', '987775555', 'images/EOvUkeOJ4soxr6zSG0nWXO1j9MxASo5FoKx5s3TP.jpg', '2024-10-17 22:13:56', '2024-10-17 22:13:56');

-- --------------------------------------------------------

--
-- Table structure for table `user_totals`
--

CREATE TABLE `user_totals` (
  `id` int(11) NOT NULL,
  `user_id` int(20) UNSIGNED NOT NULL,
  `grand_total` decimal(10,2) DEFAULT 0.00,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_totals`
--

INSERT INTO `user_totals` (`id`, `user_id`, `grand_total`, `created_at`, `updated_at`) VALUES
(5, 3, '12693.00', '2024-09-28 07:29:21', '2024-09-28 23:17:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `idx_order_id` (`order_id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sku` (`sku`);

--
-- Indexes for table `shipping_details`
--
ALTER TABLE `shipping_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `shipping_details_ibfk_2` (`order_id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `key` (`key`);

--
-- Indexes for table `teammembers`
--
ALTER TABLE `teammembers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_totals`
--
ALTER TABLE `user_totals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart_details`
--
ALTER TABLE `cart_details`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `shipping_details`
--
ALTER TABLE `shipping_details`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `teammembers`
--
ALTER TABLE `teammembers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_totals`
--
ALTER TABLE `user_totals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD CONSTRAINT `cart_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_status`
--
ALTER TABLE `order_status`
  ADD CONSTRAINT `order_status_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order_details` (`order_id`) ON DELETE CASCADE;

--
-- Constraints for table `shipping_details`
--
ALTER TABLE `shipping_details`
  ADD CONSTRAINT `shipping_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `shipping_details_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `order_status` (`order_id`) ON DELETE CASCADE;

--
-- Constraints for table `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `user_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_totals`
--
ALTER TABLE `user_totals`
  ADD CONSTRAINT `user_totals_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
