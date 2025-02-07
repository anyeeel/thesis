-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2025 at 06:20 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dblatest`
--

-- --------------------------------------------------------

--
-- Table structure for table `buildings`
--

CREATE TABLE `buildings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `building_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_of_floors` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buildings`
--

INSERT INTO `buildings` (`id`, `building_name`, `num_of_floors`, `created_at`, `updated_at`) VALUES
(9, 'College of Computer Studies', 4, '2024-03-20 00:49:24', '2024-04-04 22:20:31'),
(17, 'MICeL', 2, '2024-04-02 08:34:09', '2024-04-02 08:34:09');

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active_quantity` int(11) NOT NULL DEFAULT 0,
  `inactive_quantity` int(11) NOT NULL DEFAULT 0,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `installed_date` date DEFAULT NULL,
  `life_expectancy` int(11) DEFAULT NULL,
  `power` decimal(10,2) NOT NULL,
  `hours_used` decimal(10,2) NOT NULL,
  `energy` decimal(10,2) GENERATED ALWAYS AS (`active_quantity` * `power` * `hours_used` / 1000) VIRTUAL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`id`, `room_id`, `name`, `type`, `active_quantity`, `inactive_quantity`, `brand`, `model`, `installed_date`, `life_expectancy`, `power`, `hours_used`, `created_at`, `updated_at`) VALUES
(2, 19, 'LED Bulb 3W Cool Light', 'Lighting', 35, 3, 'Firefly', 'EBI103CW', NULL, NULL, '3.00', '84.00', '2024-04-03 01:35:34', '2024-04-04 06:54:18'),
(3, 20, 'LED Bulb 3W Cool Light', 'Lighting', 4, 3, 'Firefly', 'EBI103CW', NULL, NULL, '3.00', '84.00', '2024-04-03 01:59:38', '2024-04-04 06:56:44'),
(4, 21, 'LED Bulb 3W Cool Light', 'Lighting', 18, 0, 'Firefly', 'EBI103CW', NULL, NULL, '3.00', '40.00', '2024-04-03 02:07:00', '2024-04-04 06:58:15'),
(5, 21, 'J-Tech Splitr Con Type Aiditioner Inverter', 'HVAC', 1, 0, 'Sharp', 'AH-X10ZF', NULL, NULL, '320.00', '40.00', '2024-04-03 02:16:39', '2024-04-04 06:58:23'),
(7, 21, 'All-in-One PC', 'Desktop', 4, 0, 'HP', '24-CB0136M', NULL, NULL, '90.00', '40.00', '2024-04-03 03:21:58', '2024-04-04 07:00:08'),
(8, 21, '510-22ISH Windos 10 AIO PC', 'Desktop', 1, 0, 'Lenovo', 'F0CB00MJPH', '2017-09-18', 7, '120.00', '40.00', '2024-04-03 03:35:54', '2024-04-04 07:00:15'),
(9, 21, 'AMD Ryzen AIO PC', 'Desktop', 1, 0, 'Asus', 'M3200', '2023-08-08', 7, '90.00', '40.00', '2024-04-03 03:43:37', '2024-04-04 07:00:24'),
(10, 21, 'EcoTank All-in-One Ink Tank Printer', 'Peripheral', 1, 0, 'Epson', 'L3210', NULL, NULL, '14.00', '40.00', '2024-04-03 03:45:02', '2024-04-04 07:02:06'),
(11, 22, 'LED Bulb 3W Cool Light', 'Lighting', 17, 0, 'Firefly', 'EBI103CW', NULL, NULL, '3.00', '40.00', '2024-04-03 04:01:33', '2024-04-04 07:11:16'),
(12, 22, 'EcoTank All-in-One Ink Tank Printer', 'Peripheral', 1, 0, 'Epson', 'L3210', NULL, NULL, '14.00', '40.00', '2024-04-03 04:02:31', '2024-04-04 07:11:29'),
(13, 22, 'Wall Mounted Split Type Inverter Aircon', 'HVAC', 1, 0, 'Kolin', 'KSM-25CB1INV', NULL, NULL, '160.00', '40.00', '2024-04-03 04:04:01', '2024-04-04 07:11:35'),
(14, 22, 'Free Standing Water Dispenser', 'Appliance', 1, 0, 'Hanabishi', 'HFSWD700', NULL, NULL, '85.00', '40.00', '2024-04-03 04:05:29', '2024-04-30 21:05:22'),
(15, 23, 'LED Bulb 3W Cool Light', 'Lighting', 13, 4, 'Firefly', 'EBI103CW', NULL, NULL, '3.00', '40.00', '2024-04-03 04:41:48', '2024-04-04 07:11:52'),
(16, 23, 'Wall Mounted Split Type Inverter Aircon', 'HVAC', 1, 0, 'Kolin', 'KSM-25CB1INV', NULL, NULL, '160.00', '40.00', '2024-04-03 04:44:36', '2024-04-04 07:11:58'),
(17, 23, 'D-Smart Standard Inverter Aircon', 'HVAC', 1, 0, 'Daikin', 'FTKQ25TVM', NULL, NULL, '810.00', '40.00', '2024-04-03 04:45:48', '2024-04-04 07:12:12'),
(18, 23, 'EcoTank All-in-One Ink Tank Printer', 'Peripheral', 1, 0, 'Epson', 'L3210', NULL, NULL, '14.00', '40.00', '2024-04-03 04:46:28', '2024-04-04 07:12:20'),
(19, 23, 'Free Standing Water Dispenser', 'Appliance', 1, 0, 'Hanabishi', 'HFSWD700', NULL, NULL, '85.00', '40.00', '2024-04-03 04:47:33', '2024-04-30 21:05:52'),
(20, 23, '23.8-in Non-touch All in One Desktop', 'Desktop', 4, 1, 'Acer', 'Aspire C24-760', '2017-01-04', 7, '65.00', '40.00', '2024-04-03 04:56:37', '2024-04-04 07:12:56'),
(21, 23, 'AMD Ryzen AIO PC', 'Desktop', 2, 0, 'Asus', 'M3200', '2023-08-08', 7, '90.00', '40.00', '2024-04-03 04:59:26', '2024-04-04 07:13:06'),
(22, 23, '4K UHD LED TV', 'Desktop', 1, 0, 'Samsung', 'UA55JU6400RXXP', NULL, NULL, '202.00', '40.00', '2024-04-03 05:12:25', '2024-04-04 07:13:11'),
(23, 24, 'LED Bulb 3W Cool Light', 'Lighting', 18, 1, 'Firefly', 'EBI103CW', NULL, NULL, '3.00', '40.00', '2024-04-03 05:23:41', '2024-04-04 07:13:26'),
(24, 24, '4K UHD LED TV', 'Desktop', 1, 0, 'Samsung', 'UA55JU6400RXXP', NULL, NULL, '202.00', '40.00', '2024-04-03 05:24:21', '2024-04-04 07:13:44'),
(25, 24, 'Free Standing Water Dispenser', 'Appliance', 1, 0, 'Hanabishi', 'HFSWD700', NULL, NULL, '85.00', '40.00', '2024-04-03 05:24:56', '2024-04-30 21:06:24'),
(26, 24, 'AMD Ryzen AIO PC', 'Desktop', 3, 0, 'Asus', 'M3200', '2023-08-08', 7, '90.00', '40.00', '2024-04-03 05:26:14', '2024-04-04 07:14:01'),
(27, 24, '23.8-in Non-touch All in One Desktop', 'Desktop', 4, 0, 'Acer', 'Aspire C24-760', '2017-01-04', 7, '65.00', '40.00', '2024-04-03 05:30:16', '2024-04-04 07:14:08'),
(28, 24, 'Two-Door Top Freezer', 'Appliance', 1, 0, 'LG', 'GR-B202SQBB', NULL, NULL, '260.00', '40.00', '2024-04-03 05:32:12', '2024-04-04 07:14:17'),
(29, 24, 'Ink Tank Printer', 'Peripheral', 3, 0, 'Brother', 'DCP-T420W', NULL, NULL, '12.00', '40.00', '2024-04-03 05:38:33', '2024-04-30 21:07:02'),
(30, 24, 'GenesisPro High Wall Inverter', 'HVAC', 1, 1, 'Midea', 'FP-42AST015KEIV-E4', NULL, NULL, '255.00', '40.00', '2024-04-03 05:40:12', '2024-04-04 07:14:36'),
(31, 24, 'D-Smart Standard Inverter Aircon', 'HVAC', 1, 0, 'Daikin', 'FTKQ25TVM', NULL, NULL, '810.00', '40.00', '2024-04-03 05:41:21', '2024-04-04 07:14:45'),
(32, 25, 'LED Bulb 3W Cool Light', 'Lighting', 13, 0, 'Firefly', 'EBI103CW', NULL, NULL, '3.00', '40.00', '2024-04-03 05:50:15', '2024-04-04 07:15:10'),
(33, 25, 'Split Type Wall Mounted Full DC Inverter', 'HVAC', 1, 0, 'Koppel', 'KV09WMARF31D', '2017-02-08', 15, '320.00', '40.00', '2024-04-03 06:11:10', '2024-04-04 07:15:16'),
(34, 21, '4K UHD LED TV', 'Desktop', 1, 0, 'SONY', 'KD-65X85K', NULL, NULL, '296.00', '40.00', '2024-04-03 06:14:32', '2024-04-04 07:02:14'),
(35, 25, 'Wall Mounted Split Type Standard Inverter Aircon', 'HVAC', 1, 0, 'Samsung', 'AR09MVFH', NULL, NULL, '740.00', '40.00', '2024-04-03 06:16:44', '2024-04-30 21:07:34'),
(36, 25, 'IPS Monitor', 'Desktop', 1, 0, 'AOC', 'U32N3C', NULL, NULL, '40.00', '40.00', '2024-04-03 06:20:32', '2024-04-04 07:15:31'),
(37, 25, 'Free Standing Water Dispenser', 'Appliance', 1, 0, 'Hanabishi', 'HFSWD700', NULL, NULL, '85.00', '40.00', '2024-04-03 06:22:56', '2024-04-30 21:07:49'),
(38, 25, 'AMD Ryzen AIO PC', 'Desktop', 6, 0, 'Asus', 'M3200', '2023-08-08', 7, '90.00', '40.00', '2024-04-03 06:23:45', '2024-04-04 07:15:44'),
(39, 25, 'EcoTank All-in-One Ink Tank Printer', 'Peripheral', 1, 0, 'Epson', 'L3210', NULL, NULL, '14.00', '40.00', '2024-04-03 06:35:48', '2024-04-04 07:15:51'),
(40, 25, 'Time travel', 'Peripheral', 2, 0, 'XEROX', 'B225', NULL, NULL, '1.40', '40.00', '2024-04-03 06:40:00', '2024-04-30 21:08:07'),
(41, 26, 'LED Bulb 3W Cool Light', 'Lighting', 5, 1, 'Firefly', 'EBI103CW', NULL, NULL, '3.00', '40.00', '2024-04-03 06:44:02', '2024-04-04 07:16:11'),
(42, 26, 'Split Type Wall Mounted Full DC Inverter', 'HVAC', 1, 0, 'Koppel', 'KV09WMARF31D', '2017-02-08', 15, '320.00', '40.00', '2024-04-03 06:45:30', '2024-04-04 07:16:16'),
(43, 26, 'All-in-One PC', 'Desktop', 1, 0, 'HP', '24-CB0136M', NULL, NULL, '90.00', '40.00', '2024-04-03 06:46:28', '2024-04-04 07:16:29'),
(44, 26, 'AMD Ryzen AIO PC', 'Desktop', 1, 0, 'Asus', 'M3200', '2023-08-08', 7, '90.00', '40.00', '2024-04-03 06:47:15', '2024-04-04 07:16:35'),
(45, 27, 'LED Bulb 3W Cool Light', 'Lighting', 7, 0, 'Firefly', 'EBI103CW', NULL, NULL, '3.00', '40.00', '2024-04-03 06:47:54', '2024-04-04 07:16:47'),
(46, 27, 'Wall Mounted Split Type Standard Inverter Aircon', 'HVAC', 1, 0, 'Samsung', 'AR09MVFH', NULL, NULL, '740.00', '40.00', '2024-04-03 06:48:47', '2024-04-30 21:08:49'),
(47, 28, 'LED Bulb 3W Cool Light', 'Lighting', 18, 4, 'Firefly', 'EBI103CW', NULL, NULL, '3.00', '40.00', '2024-04-03 06:49:21', '2024-04-04 07:17:06'),
(48, 28, 'GenesisPro High Wall Inverter', 'HVAC', 1, 0, 'Midea', 'FP-42AST015KEIV-E4', NULL, NULL, '255.00', '40.00', '2024-04-03 06:51:18', '2024-04-04 07:17:12'),
(49, 28, 'Wall Mounted Split Type Standard Inverter Aircon', 'HVAC', 1, 0, 'Samsung', 'AR09MVFH', NULL, NULL, '740.00', '40.00', '2024-04-03 06:52:02', '2024-04-30 21:17:52'),
(50, 28, '4K UHD LED TV', 'Desktop', 1, 0, 'SONY', 'KD-65X85K', NULL, NULL, '296.00', '40.00', '2024-04-03 06:52:48', '2024-04-04 07:17:23'),
(51, 28, 'Top Mount Refrigerator with moist Fresh Zone', 'Appliance', 1, 0, 'Samsung', 'RT20FARVDSA', NULL, NULL, '100.00', '40.00', '2024-04-03 06:54:01', '2024-04-04 07:17:30'),
(52, 29, 'LED Bulb 3W Cool Light', 'Lighting', 46, 6, 'Firefly', 'EBI103CW', NULL, NULL, '3.00', '84.00', '2024-04-03 06:55:03', '2024-04-04 07:17:57'),
(53, 30, 'LED Bulb 3W Cool Light', 'Lighting', 4, 2, 'Firefly', 'EBI103CW', NULL, NULL, '3.00', '84.00', '2024-04-03 06:55:56', '2024-04-04 07:18:04'),
(54, 31, 'LED Bulb 3W Cool Light', 'Lighting', 16, 7, 'Firefly', 'EBI103CW', NULL, NULL, '3.00', '54.00', '2024-04-03 06:57:16', '2024-04-04 07:18:27'),
(55, 31, 'Wall Mounted Split Type Inverter Aircon', 'HVAC', 1, 0, 'Kolin', 'KSM-25CB1INV', NULL, NULL, '160.00', '54.00', '2024-04-03 07:00:12', '2024-04-03 07:00:12'),
(56, 36, 'LED Bulb 3W Cool Light', 'Lighting', 8, 0, 'Firefly', 'EBI103CW', NULL, NULL, '3.00', '40.00', '2024-04-03 07:01:57', '2024-04-04 07:19:32'),
(57, 36, 'Wall Mounted Split Type Inverter Aircon', 'HVAC', 1, 0, 'Kolin', 'KSM-25CB1INV', NULL, NULL, '160.00', '40.00', '2024-04-03 07:02:32', '2024-04-03 07:02:32'),
(58, 32, 'LED Bulb 3W Cool Light', 'Lighting', 16, 2, 'Firefly', 'EBI103CW', NULL, NULL, '3.00', '42.00', '2024-04-03 07:09:20', '2024-04-03 07:09:20'),
(59, 32, '4K UHD LED TV', 'Desktop', 1, 0, 'Samsung', 'UA55JU6400RXXP', NULL, NULL, '198.00', '42.00', '2024-04-03 07:10:13', '2024-04-03 07:10:13'),
(60, 32, 'Split Type Wall Mounted Full DC Inverter', 'HVAC', 2, 0, 'Koppel', 'KV09WMARF31D', '2017-02-08', 15, '320.00', '42.00', '2024-04-03 07:24:22', '2024-04-03 07:24:22'),
(61, 32, 'Desktop PC Black', 'Desktop', 20, 5, 'Acer', 'Aspire XC-703', '2018-12-25', 5, '100.00', '42.00', '2024-04-03 07:27:22', '2024-04-03 07:27:22'),
(62, 33, 'LED Bulb 3W Cool Light', 'Lighting', 14, 0, 'Firefly', 'EBI103CW', NULL, NULL, '3.00', '45.00', '2024-04-03 07:29:17', '2024-04-03 07:29:17'),
(63, 33, 'Desktop PC Black', 'Desktop', 8, 6, 'Acer', 'Aspire XC-703', '2018-12-25', 5, '100.00', '45.00', '2024-04-03 08:00:30', '2024-04-30 21:31:41'),
(64, 33, 'Interactive Flat Panel TV', 'Desktop', 1, 0, 'ViewSonic', 'IFP6552-1C', NULL, NULL, '233.50', '45.00', '2024-04-03 08:20:29', '2024-04-30 21:31:57'),
(65, 33, '18.5 in LCD Monitor', 'Desktop', 4, 2, 'eMachines', 'E190HQVB', NULL, NULL, '20.20', '45.00', '2024-04-03 08:30:22', '2024-04-30 21:32:16'),
(66, 33, 'Split Type Wall Mounted Full DC Inverter', 'HVAC', 2, 0, 'Koppel', 'KV09WMARF31D', '2017-02-08', 15, '320.00', '45.00', '2024-04-03 08:51:12', '2024-04-03 08:51:12'),
(67, 34, 'LED Bulb 3W Cool Light', 'Lighting', 14, 2, 'Firefly', 'EBI103CW', NULL, NULL, '3.00', '53.00', '2024-04-03 08:58:43', '2024-04-30 21:34:21'),
(68, 34, 'Split Type Wall Mounted Full DC Inverter', 'HVAC', 2, 0, 'Koppel', 'KV09WMARF31D', '2017-02-08', 15, '320.00', '53.00', '2024-04-03 09:00:07', '2024-04-30 21:34:32'),
(69, 34, 'Intel Mac PC', 'Desktop', 21, 0, 'Apple', 'iMac 27-in', '2022-09-29', 5, '84.00', '53.00', '2024-04-03 09:04:26', '2024-04-30 21:34:41'),
(70, 35, 'LED Bulb 3W Cool Light', 'Lighting', 14, 2, 'Firefly', 'EBI103CW', NULL, NULL, '3.00', '66.00', '2024-04-03 09:31:07', '2024-04-30 21:35:14'),
(71, 35, 'AMD Ryzen AIO PC', 'Desktop', 15, 5, 'Asus', 'M3200', '2023-08-09', 7, '90.00', '66.00', '2024-04-03 09:32:08', '2024-04-30 21:35:25'),
(72, 35, '4K UHD LED TV', 'Desktop', 1, 0, 'SONY', 'KD-65X85K', NULL, NULL, '296.00', '66.00', '2024-04-03 09:33:26', '2024-04-30 21:35:54'),
(73, 35, 'Split Type Wall Mounted Full DC Inverter', 'HVAC', 2, 0, 'Koppel', 'KV09WMARF31D', '2017-02-08', 15, '320.00', '66.00', '2024-04-03 09:34:07', '2024-04-30 21:38:10'),
(74, 37, 'LED Bulb 3W Cool Light', 'Lighting', 4, 0, 'Firefly', 'EBI103CW', NULL, NULL, '3.00', '168.00', '2024-04-03 09:34:55', '2024-04-04 07:19:58'),
(75, 37, 'Floor mounted Inverter Aircon', 'HVAC', 1, 0, 'Koppel', 'KV36FM1-ARF21C2', '2020-11-25', 20, '1910.00', '168.00', '2024-04-03 09:39:51', '2024-04-04 07:20:05'),
(76, 37, 'Wall Mounted Split Type Standard Inverter Aircon', 'HVAC', 1, 0, 'Samsung', 'AR09MVFH', NULL, NULL, '740.00', '168.00', '2024-04-03 09:40:44', '2024-04-30 21:39:17'),
(77, 37, 'System Unit', 'Peripheral', 1, 0, 'N/A', 'N/A', NULL, NULL, '750.00', '168.00', '2024-04-03 09:43:28', '2024-04-04 07:20:17'),
(78, 37, 'Rack Server (1)', 'Peripheral', 8, 0, 'Dell EMC', 'PowerEdge R620', '2013-11-19', NULL, '98.00', '168.00', '2024-04-03 09:45:00', '2024-04-30 21:39:40'),
(79, 37, 'Rack Server (2)', 'Peripheral', 7, 0, 'N/A', 'N/A', NULL, NULL, '750.00', '168.00', '2024-04-03 09:45:57', '2024-04-04 07:20:30'),
(80, 37, 'Rack Server (3)', 'Peripheral', 4, 0, 'N/A', 'N/A', NULL, NULL, '650.00', '168.00', '2024-04-03 09:56:24', '2024-04-04 07:20:38'),
(81, 37, 'Rack Server (4)', 'Peripheral', 2, 0, 'N/A', 'N/A', NULL, NULL, '1600.00', '168.00', '2024-04-03 09:57:02', '2024-04-04 07:20:44'),
(82, 37, 'Rack Server (5)', 'Peripheral', 8, 0, 'N/A', 'N/A', NULL, NULL, '1400.00', '168.00', '2024-04-03 09:57:45', '2024-04-04 07:20:51'),
(83, 37, 'Rack Server (6)', 'Peripheral', 2, 0, 'N/A', 'N/A', NULL, NULL, '2000.00', '168.00', '2024-04-03 09:58:13', '2024-04-04 07:21:00'),
(84, 37, 'Server', 'Peripheral', 5, 0, 'EATON', '9PX 11000', NULL, NULL, '10.00', '168.00', '2024-04-03 09:59:22', '2024-04-03 09:59:22'),
(85, 38, 'LED Bulb 3W Cool Light', 'Lighting', 46, 6, 'Firefly', 'EBI103CW', NULL, NULL, '3.00', '168.00', '2024-04-03 10:00:26', '2024-04-04 07:21:15'),
(86, 38, 'AMD Ryzen AIO PC', 'Desktop', 2, 0, 'Asus', 'M3200', '2023-08-09', 7, '90.00', '168.00', '2024-04-03 10:01:21', '2024-04-04 07:21:25'),
(87, 39, 'LED Bulb 3W Cool Light', 'Lighting', 11, 0, 'Firefly', 'EBI103CW', NULL, NULL, '3.00', '168.00', '2024-04-03 10:01:51', '2024-04-04 07:21:38'),
(88, 39, 'AMD Ryzen AIO PC', 'Desktop', 10, 0, 'Asus', 'M3200', '2023-08-09', 7, '90.00', '168.00', '2024-04-03 10:02:20', '2024-04-04 07:21:48'),
(89, 39, 'Floor Mounted Inverter Aircon', 'HVAC', 1, 0, 'Koppel', 'KV09WMARF21D', '2020-08-23', 10, '850.00', '168.00', '2024-04-03 10:05:16', '2024-04-04 07:21:54'),
(90, 40, 'LED Bulb 3W Cool Light', 'Lighting', 7, 0, 'Firefly', 'EBI103CW', NULL, NULL, '3.00', '168.00', '2024-04-03 10:06:39', '2024-04-30 21:42:09'),
(91, 40, 'Free Standing Water Dispenser', 'Appliance', 1, 0, 'Hanabishi', 'HFSWD700', NULL, NULL, '85.00', '168.00', '2024-04-03 10:07:13', '2024-04-30 21:41:38'),
(92, 41, 'LED Bulb 3W Cool Light', 'Lighting', 47, 6, 'Firefly', 'EBI103CW', NULL, NULL, '3.00', '84.00', '2024-04-03 10:20:11', '2024-04-04 07:34:38'),
(93, 42, 'LED Bulb 3W Cool Light', 'Lighting', 4, 3, 'Firefly', 'EBI103CW', NULL, NULL, '3.00', '84.00', '2024-04-03 10:20:38', '2024-04-04 07:34:43'),
(94, 43, 'LED Bulb 3W Cool Light', 'Lighting', 16, 0, 'Firefly', 'EBI103CW', NULL, NULL, '3.00', '48.00', '2024-04-03 10:21:25', '2024-04-30 21:49:42'),
(95, 43, 'GenesisPro High Wall Inverter', 'HVAC', 1, 0, 'Midea', 'FP-42AST015KEIV-E4', NULL, NULL, '355.00', '48.00', '2024-04-03 10:22:38', '2024-04-30 21:53:44'),
(96, 43, '4K UHD LED TV', 'Desktop', 1, 0, 'Samsung', 'AR09MVFH', NULL, NULL, '740.00', '48.00', '2024-04-03 10:23:28', '2024-04-30 21:53:55'),
(97, 43, 'Interactive Flat Panel TV', 'Desktop', 1, 0, 'ViewSonic', 'IFP6552-1C', NULL, NULL, '233.50', '48.00', '2024-04-03 10:24:20', '2024-04-30 21:54:10'),
(98, 43, 'Wall Fan', 'HVAC', 2, 0, 'Astron', 'MEGA WALL FAN 18\"', '2015-08-29', 10, '85.00', '48.00', '2024-04-03 10:28:20', '2024-04-30 21:54:27'),
(99, 44, 'LED Bulb 3W Cool Light', 'Lighting', 16, 2, 'Firefly', 'EBI103CW', NULL, NULL, '3.00', '38.00', '2024-04-03 10:29:25', '2024-04-04 07:40:35'),
(100, 44, 'Interactive Flat Panel TV', 'Desktop', 2, 0, 'ViewSonic', 'IFP6552-1C', NULL, NULL, '233.50', '38.00', '2024-04-03 10:30:03', '2024-04-30 21:55:37'),
(101, 44, 'Wall Fan', 'HVAC', 2, 0, 'Astron', 'MEGA WALL FAN 18\"', '2015-08-29', 10, '85.00', '38.00', '2024-04-03 10:31:00', '2024-04-03 10:31:00'),
(102, 44, 'Split Type Wall Mounted Full DC Inverter', 'HVAC', 1, 0, 'Koppel', 'KV09WMARF31D', '2017-02-08', 15, '320.00', '38.00', '2024-04-03 10:31:52', '2024-04-03 10:31:52'),
(103, 45, 'LED Bulb 3W Cool Light', 'Lighting', 16, 3, 'Firefly', 'EBI103CW', NULL, NULL, '3.00', '38.50', '2024-04-03 10:33:40', '2024-04-30 21:57:18'),
(104, 45, 'Interactive Flat Panel TV', 'Desktop', 1, 0, 'ViewSonic', 'IFP6552-1C', NULL, NULL, '233.50', '38.50', '2024-04-03 10:34:31', '2024-04-30 21:58:45'),
(105, 45, 'Wall Fan', 'HVAC', 2, 0, 'Astron', 'MEGA WALL FAN 18\"', '2015-08-29', 10, '85.00', '38.50', '2024-04-03 10:35:12', '2024-04-30 21:58:29'),
(106, 45, 'Split Type Wall Mounted Full DC Inverter', 'HVAC', 1, 0, 'Koppel', 'KV09WMARF31D', '2017-02-08', 15, '320.00', '38.50', '2024-04-03 10:35:53', '2024-04-30 21:57:46'),
(107, 45, 'Multi-Split Inverter Indoor', 'HVAC', 1, 0, 'Kolin', 'KFS-10BAG1M-I', NULL, NULL, '220.00', '38.50', '2024-04-03 10:38:47', '2024-04-30 21:57:55'),
(108, 46, 'LED Bulb 3W Cool Light', 'Lighting', 14, 0, 'Firefly', 'EBI103CW', NULL, NULL, '3.00', '26.00', '2024-04-03 10:39:23', '2024-04-30 21:59:30'),
(109, 46, 'Wall Fan', 'HVAC', 3, 0, 'Astron', 'MEGA WALL FAN 18\"', '2015-08-29', 10, '85.00', '26.00', '2024-04-03 10:40:11', '2024-04-30 21:59:41'),
(110, 46, 'GenesisPro High Wall Inverter', 'HVAC', 1, 0, 'Midea', 'FP-42AST015KEIV-E4', NULL, NULL, '255.00', '26.00', '2024-04-03 10:41:01', '2024-04-30 21:59:53'),
(111, 46, 'Smart TV', 'Desktop', 1, 0, 'Devant', '43STW101', NULL, NULL, '100.00', '26.00', '2024-04-03 10:42:00', '2024-04-30 22:00:02'),
(112, 48, 'Ecolum Wide Louver Type Luminaire with Aluminum Reflector', 'Lighting', 16, 0, 'Firefly', 'ESLS2X40/0', NULL, NULL, '3.00', '42.00', '2024-04-03 10:43:07', '2024-04-30 22:01:27'),
(113, 48, 'Wall Fan', 'HVAC', 2, 0, 'Astron', 'MEGA WALL FAN 18\"', '2015-08-29', 10, '85.00', '42.00', '2024-04-03 10:46:09', '2024-04-30 22:01:38'),
(114, 48, 'Multi-Split Inverter Indoor', 'HVAC', 1, 0, 'Kolin', 'KFS-10BAG1M-I', NULL, NULL, '220.00', '42.00', '2024-04-03 10:46:50', '2024-04-30 22:01:46'),
(115, 48, 'Interactive Flat Panel TV', 'Desktop', 1, 0, 'ViewSonic', 'IFP6552-1C', NULL, NULL, '233.50', '42.00', '2024-04-03 10:47:21', '2024-04-30 22:02:13'),
(116, 47, 'Ecolum Wide Louver Type Luminaire with Aluminum Reflector', 'Lighting', 3, 0, 'Firefly', 'ESLS2X40/0', NULL, NULL, '40.00', '40.00', '2024-04-03 10:48:23', '2024-04-04 07:42:06'),
(117, 47, 'AMD Ryzen AIO PC', 'Desktop', 10, 8, 'Asus', 'M3200', '2023-08-09', 7, '90.00', '40.00', '2024-04-03 10:49:44', '2024-04-04 07:42:15'),
(118, 47, 'Wall Fan', 'HVAC', 1, 0, 'Astron', 'MEGA WALL FAN 18\"', '2015-08-29', 10, '85.00', '40.00', '2024-04-03 10:50:36', '2024-04-04 07:42:22'),
(119, 47, 'Ceiling Mounted Split Type ACU', 'HVAC', 1, 0, 'Carrier', '1P42XQ-060-30125', NULL, NULL, '400.00', '40.00', '2024-04-03 10:53:49', '2024-04-04 07:42:32'),
(120, 47, 'Wall Mounted TV', 'Desktop', 1, 0, 'Hyundai', '32GS300K', NULL, NULL, '60.00', '40.00', '2024-04-03 10:55:26', '2024-04-04 07:42:38'),
(121, 49, 'Ecolum Wide Louver Type Luminaire with Aluminum Reflector', 'Lighting', 2, 0, 'Firefly', 'ESLS2X40/0', NULL, NULL, '40.00', '40.00', '2024-04-03 10:56:15', '2024-04-04 07:42:57'),
(122, 49, 'Desktop PC Black', 'Desktop', 0, 20, 'Acer', 'Aspire XC-703', NULL, NULL, '220.00', '40.00', '2024-04-03 10:57:26', '2024-04-04 07:43:08'),
(123, 50, 'Ecolum Wide Louver Type Luminaire with Aluminum Reflector', 'Lighting', 2, 0, 'Firefly', 'ESLS2X40/0', NULL, NULL, '40.00', '40.00', '2024-04-03 10:58:18', '2024-04-04 07:43:21'),
(124, 50, 'Free Standing Water Dispenser', 'Appliance', 1, 0, 'Hanabishi', 'HFSWD700', NULL, NULL, '85.00', '40.00', '2024-04-03 10:58:52', '2024-04-30 22:09:39'),
(125, 50, 'Wall Fan', 'HVAC', 1, 0, 'Astron', 'MEGA WALL FAN 18\"', '2015-08-29', 10, '85.00', '40.00', '2024-04-03 11:08:45', '2024-04-04 07:43:36'),
(126, 50, 'Multi-Split Inverter Indoor', 'HVAC', 1, 0, 'Kolin', 'KFS-10BAG1M-I', NULL, NULL, '220.00', '40.00', '2024-04-03 11:09:50', '2024-04-04 07:43:43'),
(127, 52, 'LED Bulb 3W Cool Light', 'Lighting', 20, 7, 'Firefly', 'EBI103CW', NULL, NULL, '3.00', '84.00', '2024-04-03 11:11:58', '2024-04-04 07:44:43'),
(128, 52, 'Ecolum Wide Louver Type Luminaire with Aluminum Reflector', 'Lighting', 19, 0, 'Firefly', 'ESLS2X40/0', NULL, NULL, '40.00', '84.00', '2024-04-03 11:12:37', '2024-04-04 07:44:48'),
(129, 53, 'LED Bulb 3W Cool Light', 'Lighting', 11, 4, 'Firefly', 'EBI103CW', NULL, NULL, '3.00', '84.00', '2024-04-03 11:13:18', '2024-04-04 07:45:07'),
(130, 53, 'Ecolum Wide Louver Type Luminaire with Aluminum Reflector', 'Lighting', 14, 0, 'Firefly', 'ESLS2X40/0', NULL, NULL, '40.00', '84.00', '2024-04-03 11:13:43', '2024-04-04 07:45:13'),
(133, 54, 'LED Bulb 3W Cool Light', 'Lighting', 6, 0, 'Firefly', 'EBI103CW', NULL, NULL, '3.00', '40.00', '2024-04-11 04:56:41', '2024-04-11 07:29:53'),
(134, 55, 'LED Bulb 3W Cool Light', 'Lighting', 1, 1, 'Firefly', 'EBI103CW', NULL, NULL, '3.00', '84.00', '2024-04-11 05:36:25', '2024-04-30 20:45:11'),
(135, 56, 'LED Bulb 3W Cool Light', 'Lighting', 1, 0, 'Firefly', 'EBI103CW', NULL, NULL, '3.00', '84.00', '2024-04-11 06:06:23', '2024-04-11 06:06:23'),
(136, 57, 'LED Bulb 3W Cool Light', 'Lighting', 2, 0, 'Firefly', 'EBI103CW', NULL, NULL, '3.00', '40.00', '2024-04-11 06:39:42', '2024-04-11 06:39:42'),
(137, 57, 'Wall Mounted TV', 'Desktop', 1, 0, 'TCL', '28S305', NULL, NULL, '5.00', '40.00', '2024-04-11 06:42:03', '2024-04-11 06:42:03'),
(138, 57, 'Split Type Wall Mounted Full DC Inverter', 'HVAC', 1, 0, 'Samsung', 'AR09MVFH', NULL, NULL, '740.00', '40.00', '2024-04-11 06:42:43', '2024-04-30 20:47:17'),
(139, 58, 'LED Bulb 3W Cool Light', 'Lighting', 8, 0, 'Firefly', 'EBI103CW', NULL, NULL, '3.00', '40.00', '2024-04-11 06:43:59', '2024-04-11 06:43:59'),
(140, 58, 'Floor Standing Indoor Unit', 'HVAC', 1, 1, 'Sharp', 'GS-X36SCF', NULL, NULL, '320.00', '40.00', '2024-04-11 06:45:22', '2024-04-11 06:45:22'),
(141, 58, 'LaserJet Pro 200 Colors', 'Peripheral', 2, 0, 'HP', 'MFP M276H', NULL, NULL, '13.00', '40.00', '2024-04-11 06:46:58', '2024-04-11 06:46:58'),
(142, 58, 'Wall Mounted TV', 'Desktop', 1, 0, 'Samsung', 'UA55MU6103G', NULL, NULL, '210.00', '40.00', '2024-04-11 06:48:04', '2024-04-11 06:48:04'),
(143, 58, 'Desktop PC Black', 'Desktop', 1, 0, 'Acer', 'Aspire C24-760', '2017-01-04', 7, '65.00', '40.00', '2024-04-11 06:49:06', '2024-04-11 06:49:06'),
(144, 58, 'Intel Mac PC', 'Desktop', 3, 0, 'Apple', 'iMac 27-in.', '2019-09-29', 5, '84.00', '40.00', '2024-04-11 06:50:02', '2024-04-30 20:48:55'),
(145, 59, 'LED Bulb 3W Cool Light', 'Lighting', 8, 0, 'Firefly', 'EBI103CW', NULL, NULL, '3.00', '40.00', '2024-04-11 07:14:33', '2024-04-11 07:14:33'),
(146, 59, 'Floor Standing Indoor Unit', 'HVAC', 1, 0, 'Sharp', 'GS-X36SCF', NULL, NULL, '320.00', '40.00', '2024-04-11 07:16:40', '2024-04-11 07:16:40'),
(147, 59, 'Interactive Flat Panel TV', 'Desktop', 1, 0, 'ViewSonic', 'IFP6552-1C', NULL, NULL, '233.50', '40.00', '2024-04-11 07:18:53', '2024-04-30 20:50:00'),
(148, 59, 'Wall Mounted TV', 'Desktop', 1, 0, 'Samsung', 'UA55MU6103G', NULL, NULL, '210.00', '40.00', '2024-04-11 07:22:35', '2024-04-11 07:22:35'),
(149, 59, 'Desktop PC Black', 'Desktop', 4, 0, 'Acer', 'Aspire C24-760', '2017-01-04', 7, '65.00', '40.00', '2024-04-11 07:23:58', '2024-04-11 07:23:58'),
(150, 59, '4K UHD LED TV', 'Desktop', 1, 0, 'ViewSonic', 'VS17890', NULL, NULL, '85.00', '40.00', '2024-04-11 07:24:58', '2024-04-11 07:24:58'),
(151, 59, 'Air Purifier', 'HVAC', 1, 0, 'Koppel', 'KPT-229ESF1', NULL, NULL, '35.00', '40.00', '2024-04-11 07:25:51', '2024-04-11 07:25:51'),
(152, 59, 'Projector', 'Peripheral', 2, 0, 'Epson', 'EB-685WI', NULL, NULL, '301.00', '40.00', '2024-04-11 07:26:36', '2024-04-11 07:26:36'),
(153, 54, 'Split Type Wall Mounted Full DC Inverter', 'HVAC', 1, 1, 'Samsung', 'AR09MVFH', NULL, NULL, '740.00', '40.00', '2024-04-11 07:30:27', '2024-04-30 20:51:35'),
(154, 54, 'Non-touch Intel Core PC', 'Desktop', 5, 0, 'Acer', 'Aspire C24-760', NULL, NULL, '65.00', '40.00', '2024-04-11 07:32:05', '2024-04-11 07:32:05'),
(155, 54, 'Wall Mounted TV', 'Desktop', 1, 0, 'Samsung', 'UA55MU6103G', NULL, NULL, '210.00', '40.00', '2024-04-11 07:35:15', '2024-04-11 07:35:15'),
(159, 28, 'Free Standing Water Dispenser', 'Appliance', 1, 0, 'Hanabishi', 'HFSWD700', NULL, NULL, '85.00', '40.00', '2024-04-30 21:19:36', '2024-04-30 21:20:06');

-- --------------------------------------------------------

--
-- Table structure for table `energy_computed_consumptions`
--

CREATE TABLE `energy_computed_consumptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `computed_consumption` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `energy_computed_consumptions`
--

INSERT INTO `energy_computed_consumptions` (`id`, `date`, `computed_consumption`, `created_at`, `updated_at`, `time`) VALUES
(169, '2024-02-19', 32.70, NULL, NULL, '01:00:00'),
(170, '2024-02-19', 32.70, NULL, NULL, '02:00:00'),
(171, '2024-02-19', 32.70, NULL, NULL, '03:00:00'),
(172, '2024-02-19', 32.70, NULL, NULL, '04:00:00'),
(173, '2024-02-19', 32.70, NULL, NULL, '05:00:00'),
(174, '2024-02-19', 34.54, NULL, NULL, '06:00:00'),
(175, '2024-02-19', 41.07, NULL, NULL, '07:00:00'),
(176, '2024-02-19', 62.10, NULL, NULL, '08:00:00'),
(177, '2024-02-19', 64.55, NULL, NULL, '09:00:00'),
(178, '2024-02-19', 66.22, NULL, NULL, '10:00:00'),
(179, '2024-02-19', 66.22, NULL, NULL, '11:00:00'),
(180, '2024-02-19', 61.13, NULL, NULL, '12:00:00'),
(181, '2024-02-19', 66.22, NULL, NULL, '13:00:00'),
(182, '2024-02-19', 63.89, NULL, NULL, '14:00:00'),
(183, '2024-02-19', 62.23, NULL, NULL, '15:00:00'),
(184, '2024-02-19', 60.78, NULL, NULL, '16:00:00'),
(185, '2024-02-19', 43.17, NULL, NULL, '17:00:00'),
(186, '2024-02-19', 43.17, NULL, NULL, '18:00:00'),
(187, '2024-02-19', 40.34, NULL, NULL, '19:00:00'),
(188, '2024-02-19', 32.70, NULL, NULL, '20:00:00'),
(189, '2024-02-19', 32.70, NULL, NULL, '21:00:00'),
(190, '2024-02-19', 32.70, NULL, NULL, '22:00:00'),
(191, '2024-02-19', 32.70, NULL, NULL, '23:00:00'),
(192, '2024-02-20', 32.70, NULL, NULL, '00:00:00'),
(193, '2024-02-20', 32.70, NULL, NULL, '01:00:00'),
(194, '2024-02-20', 32.70, NULL, NULL, '02:00:00'),
(195, '2024-02-20', 32.70, NULL, NULL, '03:00:00'),
(196, '2024-02-20', 32.70, NULL, NULL, '04:00:00'),
(197, '2024-02-20', 32.70, NULL, NULL, '05:00:00'),
(198, '2024-02-20', 34.54, NULL, NULL, '06:00:00'),
(199, '2024-02-20', 37.88, NULL, NULL, '07:00:00'),
(200, '2024-02-20', 56.68, NULL, NULL, '08:00:00'),
(201, '2024-02-20', 65.56, NULL, NULL, '09:00:00'),
(202, '2024-02-20', 65.56, NULL, NULL, '10:00:00'),
(203, '2024-02-20', 64.57, NULL, NULL, '11:00:00'),
(204, '2024-02-20', 66.29, NULL, NULL, '12:00:00'),
(205, '2024-02-20', 58.88, NULL, NULL, '13:00:00'),
(206, '2024-02-20', 61.32, NULL, NULL, '14:00:00'),
(207, '2024-02-20', 63.12, NULL, NULL, '15:00:00'),
(208, '2024-02-20', 66.22, NULL, NULL, '16:00:00'),
(209, '2024-02-20', 49.07, NULL, NULL, '17:00:00'),
(210, '2024-02-20', 47.42, NULL, NULL, '18:00:00'),
(211, '2024-02-20', 40.57, NULL, NULL, '19:00:00'),
(212, '2024-02-20', 35.03, NULL, NULL, '20:00:00'),
(213, '2024-02-20', 35.03, NULL, NULL, '21:00:00'),
(214, '2024-02-20', 32.70, NULL, NULL, '22:00:00'),
(215, '2024-02-20', 32.70, NULL, NULL, '23:00:00'),
(216, '2024-02-21', 32.70, NULL, NULL, '00:00:00'),
(217, '2024-02-21', 32.70, NULL, NULL, '01:00:00'),
(218, '2024-02-21', 32.70, NULL, NULL, '02:00:00'),
(219, '2024-02-21', 32.70, NULL, NULL, '03:00:00'),
(220, '2024-02-21', 32.70, NULL, NULL, '04:00:00'),
(221, '2024-02-21', 32.70, NULL, NULL, '05:00:00'),
(222, '2024-02-21', 34.42, NULL, NULL, '06:00:00'),
(223, '2024-02-21', 34.54, NULL, NULL, '07:00:00'),
(224, '2024-02-21', 55.23, NULL, NULL, '08:00:00'),
(225, '2024-02-21', 60.21, NULL, NULL, '09:00:00'),
(226, '2024-02-21', 61.53, NULL, NULL, '10:00:00'),
(227, '2024-02-21', 61.53, NULL, NULL, '11:00:00'),
(228, '2024-02-21', 61.53, NULL, NULL, '12:00:00'),
(229, '2024-02-21', 66.22, NULL, NULL, '13:00:00'),
(230, '2024-02-21', 66.22, NULL, NULL, '14:00:00'),
(231, '2024-02-21', 66.22, NULL, NULL, '15:00:00'),
(232, '2024-02-21', 63.57, NULL, NULL, '16:00:00'),
(233, '2024-02-21', 43.54, NULL, NULL, '17:00:00'),
(234, '2024-02-21', 44.53, NULL, NULL, '18:00:00'),
(235, '2024-02-21', 38.82, NULL, NULL, '19:00:00'),
(236, '2024-02-21', 33.37, NULL, NULL, '20:00:00'),
(237, '2024-02-21', 32.70, NULL, NULL, '21:00:00'),
(238, '2024-02-21', 32.70, NULL, NULL, '22:00:00'),
(239, '2024-02-21', 32.70, NULL, NULL, '23:00:00'),
(240, '2024-02-22', 32.70, NULL, NULL, '00:00:00'),
(241, '2024-02-22', 32.70, NULL, NULL, '01:00:00'),
(242, '2024-02-22', 32.70, NULL, NULL, '02:00:00'),
(243, '2024-02-22', 32.70, NULL, NULL, '03:00:00'),
(244, '2024-02-22', 32.70, NULL, NULL, '04:00:00'),
(245, '2024-02-22', 32.70, NULL, NULL, '05:00:00'),
(246, '2024-02-22', 34.54, NULL, NULL, '06:00:00'),
(247, '2024-02-22', 38.74, NULL, NULL, '07:00:00'),
(248, '2024-02-22', 56.88, NULL, NULL, '08:00:00'),
(249, '2024-02-22', 65.56, NULL, NULL, '09:00:00'),
(250, '2024-02-22', 65.56, NULL, NULL, '10:00:00'),
(251, '2024-02-22', 63.90, NULL, NULL, '11:00:00'),
(252, '2024-02-22', 63.90, NULL, NULL, '12:00:00'),
(253, '2024-02-22', 66.01, NULL, NULL, '13:00:00'),
(254, '2024-02-22', 66.22, NULL, NULL, '14:00:00'),
(255, '2024-02-22', 66.22, NULL, NULL, '15:00:00'),
(256, '2024-02-22', 63.59, NULL, NULL, '16:00:00'),
(257, '2024-02-22', 46.42, NULL, NULL, '17:00:00'),
(258, '2024-02-22', 44.87, NULL, NULL, '18:00:00'),
(259, '2024-02-22', 41.04, NULL, NULL, '19:00:00'),
(260, '2024-02-22', 32.70, NULL, NULL, '20:00:00'),
(261, '2024-02-22', 32.70, NULL, NULL, '21:00:00'),
(262, '2024-02-22', 32.70, NULL, NULL, '22:00:00'),
(263, '2024-02-22', 32.70, NULL, NULL, '23:00:00'),
(264, '2024-02-23', 32.70, NULL, NULL, '00:00:00'),
(265, '2024-02-23', 32.70, NULL, NULL, '01:00:00'),
(266, '2024-02-23', 32.70, NULL, NULL, '02:00:00'),
(267, '2024-02-23', 32.70, NULL, NULL, '03:00:00'),
(268, '2024-02-23', 32.70, NULL, NULL, '04:00:00'),
(269, '2024-02-23', 32.70, NULL, NULL, '05:00:00'),
(270, '2024-02-23', 34.54, NULL, NULL, '06:00:00'),
(271, '2024-02-23', 37.52, NULL, NULL, '07:00:00'),
(272, '2024-02-23', 56.66, NULL, NULL, '08:00:00'),
(273, '2024-02-23', 66.22, NULL, NULL, '09:00:00'),
(274, '2024-02-23', 66.22, NULL, NULL, '10:00:00'),
(275, '2024-02-23', 65.22, NULL, NULL, '11:00:00'),
(276, '2024-02-23', 64.22, NULL, NULL, '12:00:00'),
(277, '2024-02-23', 62.66, NULL, NULL, '13:00:00'),
(278, '2024-02-23', 63.33, NULL, NULL, '14:00:00'),
(279, '2024-02-23', 61.67, NULL, NULL, '15:00:00'),
(280, '2024-02-23', 64.56, NULL, NULL, '16:00:00'),
(281, '2024-02-23', 45.87, NULL, NULL, '17:00:00'),
(282, '2024-02-23', 45.87, NULL, NULL, '18:00:00'),
(283, '2024-02-23', 43.04, NULL, NULL, '19:00:00'),
(284, '2024-02-23', 35.70, NULL, NULL, '20:00:00'),
(285, '2024-02-23', 35.03, NULL, NULL, '21:00:00'),
(286, '2024-02-23', 32.70, NULL, NULL, '22:00:00'),
(287, '2024-02-23', 32.70, NULL, NULL, '23:00:00'),
(288, '2024-02-24', 32.70, NULL, NULL, '00:00:00'),
(289, '2024-02-24', 32.70, NULL, NULL, '01:00:00'),
(290, '2024-02-24', 32.70, NULL, NULL, '02:00:00'),
(291, '2024-02-24', 32.70, NULL, NULL, '03:00:00'),
(292, '2024-02-24', 32.70, NULL, NULL, '04:00:00'),
(293, '2024-02-24', 32.70, NULL, NULL, '05:00:00'),
(294, '2024-02-24', 34.54, NULL, NULL, '06:00:00'),
(295, '2024-02-24', 38.12, NULL, NULL, '07:00:00'),
(296, '2024-02-24', 38.31, NULL, NULL, '08:00:00'),
(297, '2024-02-24', 47.76, NULL, NULL, '09:00:00'),
(298, '2024-02-24', 45.38, NULL, NULL, '10:00:00'),
(299, '2024-02-24', 45.94, NULL, NULL, '11:00:00'),
(300, '2024-02-24', 45.94, NULL, NULL, '12:00:00'),
(301, '2024-02-24', 45.94, NULL, NULL, '13:00:00'),
(302, '2024-02-24', 44.39, NULL, NULL, '14:00:00'),
(303, '2024-02-24', 44.39, NULL, NULL, '15:00:00'),
(304, '2024-02-24', 44.39, NULL, NULL, '16:00:00'),
(305, '2024-02-24', 44.21, NULL, NULL, '17:00:00'),
(306, '2024-02-24', 44.05, NULL, NULL, '18:00:00'),
(307, '2024-02-24', 40.04, NULL, NULL, '19:00:00'),
(308, '2024-02-24', 32.70, NULL, NULL, '20:00:00'),
(309, '2024-02-24', 32.70, NULL, NULL, '21:00:00'),
(310, '2024-02-24', 32.70, NULL, NULL, '22:00:00'),
(311, '2024-02-24', 32.70, NULL, NULL, '23:00:00'),
(312, '2024-02-25', 32.70, NULL, NULL, '00:00:00'),
(313, '2024-02-25', 32.70, NULL, NULL, '01:00:00'),
(314, '2024-02-25', 32.70, NULL, NULL, '02:00:00'),
(315, '2024-02-25', 32.70, NULL, NULL, '03:00:00'),
(316, '2024-02-25', 32.70, NULL, NULL, '04:00:00'),
(317, '2024-02-25', 32.70, NULL, NULL, '05:00:00'),
(318, '2024-02-25', 34.54, NULL, NULL, '06:00:00'),
(319, '2024-02-25', 34.54, NULL, NULL, '07:00:00'),
(320, '2024-02-25', 34.54, NULL, NULL, '08:00:00'),
(321, '2024-02-25', 34.54, NULL, NULL, '09:00:00'),
(322, '2024-02-25', 34.54, NULL, NULL, '10:00:00'),
(323, '2024-02-25', 34.54, NULL, NULL, '11:00:00'),
(324, '2024-02-25', 34.54, NULL, NULL, '12:00:00'),
(325, '2024-02-25', 34.54, NULL, NULL, '13:00:00'),
(326, '2024-02-25', 34.54, NULL, NULL, '14:00:00'),
(327, '2024-02-25', 34.54, NULL, NULL, '15:00:00'),
(328, '2024-02-25', 34.54, NULL, NULL, '16:00:00'),
(329, '2024-02-25', 34.54, NULL, NULL, '17:00:00'),
(330, '2024-02-25', 34.54, NULL, NULL, '18:00:00'),
(331, '2024-02-25', 32.70, NULL, NULL, '19:00:00'),
(332, '2024-02-25', 32.70, NULL, NULL, '20:00:00'),
(333, '2024-02-25', 32.70, NULL, NULL, '21:00:00'),
(334, '2024-02-25', 32.70, NULL, NULL, '22:00:00'),
(335, '2024-02-25', 32.70, NULL, NULL, '23:00:00'),
(336, '2024-02-26', 32.70, NULL, NULL, '00:00:00'),
(337, '2024-02-26', 32.70, NULL, NULL, '01:00:00'),
(338, '2024-02-26', 32.70, NULL, NULL, '02:00:00'),
(339, '2024-02-26', 32.70, NULL, NULL, '03:00:00'),
(340, '2024-02-26', 32.70, NULL, NULL, '04:00:00'),
(341, '2024-02-26', 32.70, NULL, NULL, '05:00:00'),
(342, '2024-02-26', 34.54, NULL, NULL, '06:00:00'),
(343, '2024-02-26', 41.07, NULL, NULL, '07:00:00'),
(344, '2024-02-26', 62.10, NULL, NULL, '08:00:00'),
(345, '2024-02-26', 64.55, NULL, NULL, '09:00:00'),
(346, '2024-02-26', 66.22, NULL, NULL, '10:00:00'),
(347, '2024-02-26', 66.22, NULL, NULL, '11:00:00'),
(348, '2024-02-26', 61.13, NULL, NULL, '12:00:00'),
(349, '2024-02-26', 66.22, NULL, NULL, '13:00:00'),
(350, '2024-02-26', 63.89, NULL, NULL, '14:00:00'),
(351, '2024-02-26', 62.23, NULL, NULL, '15:00:00'),
(352, '2024-02-26', 60.78, NULL, NULL, '16:00:00'),
(353, '2024-02-26', 43.17, NULL, NULL, '17:00:00'),
(354, '2024-02-26', 43.17, NULL, NULL, '18:00:00'),
(355, '2024-02-26', 40.34, NULL, NULL, '19:00:00'),
(356, '2024-02-26', 32.70, NULL, NULL, '20:00:00'),
(357, '2024-02-26', 32.70, NULL, NULL, '21:00:00'),
(358, '2024-02-26', 32.70, NULL, NULL, '22:00:00'),
(359, '2024-02-26', 32.70, NULL, NULL, '23:00:00'),
(360, '2024-02-27', 32.70, NULL, NULL, '00:00:00'),
(361, '2024-02-27', 32.70, NULL, NULL, '01:00:00'),
(362, '2024-02-27', 32.70, NULL, NULL, '02:00:00'),
(363, '2024-02-27', 32.70, NULL, NULL, '03:00:00'),
(364, '2024-02-27', 32.70, NULL, NULL, '04:00:00'),
(365, '2024-02-27', 32.70, NULL, NULL, '05:00:00'),
(366, '2024-02-27', 34.54, NULL, NULL, '06:00:00'),
(367, '2024-02-27', 37.88, NULL, NULL, '07:00:00'),
(368, '2024-02-27', 56.68, NULL, NULL, '08:00:00'),
(369, '2024-02-27', 65.56, NULL, NULL, '09:00:00'),
(370, '2024-02-27', 65.56, NULL, NULL, '10:00:00'),
(371, '2024-02-27', 64.57, NULL, NULL, '11:00:00'),
(372, '2024-02-27', 66.29, NULL, NULL, '12:00:00'),
(373, '2024-02-27', 58.88, NULL, NULL, '13:00:00'),
(374, '2024-02-27', 61.32, NULL, NULL, '14:00:00'),
(375, '2024-02-27', 63.12, NULL, NULL, '15:00:00'),
(376, '2024-02-27', 66.22, NULL, NULL, '16:00:00'),
(377, '2024-02-27', 49.07, NULL, NULL, '17:00:00'),
(378, '2024-02-27', 47.42, NULL, NULL, '18:00:00'),
(379, '2024-02-27', 40.57, NULL, NULL, '19:00:00'),
(380, '2024-02-27', 35.03, NULL, NULL, '20:00:00'),
(381, '2024-02-27', 35.03, NULL, NULL, '21:00:00'),
(382, '2024-02-27', 32.70, NULL, NULL, '22:00:00'),
(383, '2024-02-27', 32.70, NULL, NULL, '23:00:00'),
(384, '2024-02-28', 32.70, NULL, NULL, '00:00:00'),
(385, '2024-02-28', 32.70, NULL, NULL, '01:00:00'),
(386, '2024-02-28', 32.70, NULL, NULL, '02:00:00'),
(387, '2024-02-28', 32.70, NULL, NULL, '03:00:00'),
(388, '2024-02-28', 32.70, NULL, NULL, '04:00:00'),
(389, '2024-02-28', 32.70, NULL, NULL, '05:00:00'),
(390, '2024-02-28', 34.42, NULL, NULL, '06:00:00'),
(391, '2024-02-28', 34.54, NULL, NULL, '07:00:00'),
(392, '2024-02-28', 55.23, NULL, NULL, '08:00:00'),
(393, '2024-02-28', 60.21, NULL, NULL, '09:00:00'),
(394, '2024-02-28', 61.53, NULL, NULL, '10:00:00'),
(395, '2024-02-28', 61.53, NULL, NULL, '11:00:00'),
(396, '2024-02-28', 61.53, NULL, NULL, '12:00:00'),
(397, '2024-02-28', 66.22, NULL, NULL, '13:00:00'),
(398, '2024-02-28', 66.22, NULL, NULL, '14:00:00'),
(399, '2024-02-28', 66.22, NULL, NULL, '15:00:00'),
(400, '2024-02-28', 63.57, NULL, NULL, '16:00:00'),
(401, '2024-02-28', 43.54, NULL, NULL, '17:00:00'),
(402, '2024-02-28', 44.53, NULL, NULL, '18:00:00'),
(403, '2024-02-28', 38.82, NULL, NULL, '19:00:00'),
(404, '2024-02-28', 33.37, NULL, NULL, '20:00:00'),
(405, '2024-02-28', 32.70, NULL, NULL, '21:00:00'),
(406, '2024-02-28', 32.70, NULL, NULL, '22:00:00'),
(407, '2024-02-28', 32.70, NULL, NULL, '23:00:00'),
(408, '2024-02-29', 32.70, NULL, NULL, '00:00:00'),
(409, '2024-02-29', 32.70, NULL, NULL, '01:00:00'),
(410, '2024-02-29', 32.70, NULL, NULL, '02:00:00'),
(411, '2024-02-29', 32.70, NULL, NULL, '03:00:00'),
(412, '2024-02-29', 32.70, NULL, NULL, '04:00:00'),
(413, '2024-02-29', 32.70, NULL, NULL, '05:00:00'),
(414, '2024-02-29', 34.54, NULL, NULL, '06:00:00'),
(415, '2024-02-29', 38.74, NULL, NULL, '07:00:00'),
(416, '2024-02-29', 56.88, NULL, NULL, '08:00:00'),
(417, '2024-02-29', 65.56, NULL, NULL, '09:00:00'),
(418, '2024-02-29', 65.56, NULL, NULL, '10:00:00'),
(419, '2024-02-29', 63.90, NULL, NULL, '11:00:00'),
(420, '2024-02-29', 63.90, NULL, NULL, '12:00:00'),
(421, '2024-02-29', 66.01, NULL, NULL, '13:00:00'),
(422, '2024-02-29', 66.22, NULL, NULL, '14:00:00'),
(423, '2024-02-29', 66.22, NULL, NULL, '15:00:00'),
(424, '2024-02-29', 63.59, NULL, NULL, '16:00:00'),
(425, '2024-02-29', 46.42, NULL, NULL, '17:00:00'),
(426, '2024-02-29', 44.87, NULL, NULL, '18:00:00'),
(427, '2024-02-29', 41.04, NULL, NULL, '19:00:00'),
(428, '2024-02-29', 32.70, NULL, NULL, '20:00:00'),
(429, '2024-02-29', 32.70, NULL, NULL, '21:00:00'),
(430, '2024-02-29', 32.70, NULL, NULL, '22:00:00'),
(431, '2024-02-29', 32.70, NULL, NULL, '23:00:00'),
(432, '2024-03-01', 32.70, NULL, NULL, '00:00:00'),
(433, '2024-03-01', 32.70, NULL, NULL, '01:00:00'),
(434, '2024-03-01', 32.70, NULL, NULL, '02:00:00'),
(435, '2024-03-01', 32.70, NULL, NULL, '03:00:00'),
(436, '2024-03-01', 32.70, NULL, NULL, '04:00:00'),
(437, '2024-03-01', 32.70, NULL, NULL, '05:00:00'),
(438, '2024-03-01', 34.54, NULL, NULL, '06:00:00'),
(439, '2024-03-01', 37.52, NULL, NULL, '07:00:00'),
(440, '2024-03-01', 56.66, NULL, NULL, '08:00:00'),
(441, '2024-03-01', 66.22, NULL, NULL, '09:00:00'),
(442, '2024-03-01', 66.22, NULL, NULL, '10:00:00'),
(443, '2024-03-01', 65.22, NULL, NULL, '11:00:00'),
(444, '2024-03-01', 64.22, NULL, NULL, '12:00:00'),
(445, '2024-03-01', 62.66, NULL, NULL, '13:00:00'),
(446, '2024-03-01', 63.33, NULL, NULL, '14:00:00'),
(447, '2024-03-01', 61.67, NULL, NULL, '15:00:00'),
(448, '2024-03-01', 64.56, NULL, NULL, '16:00:00'),
(449, '2024-03-01', 45.87, NULL, NULL, '17:00:00'),
(450, '2024-03-01', 45.87, NULL, NULL, '18:00:00'),
(451, '2024-03-01', 43.04, NULL, NULL, '19:00:00'),
(452, '2024-03-01', 35.70, NULL, NULL, '20:00:00'),
(453, '2024-03-01', 35.03, NULL, NULL, '21:00:00'),
(454, '2024-03-01', 32.70, NULL, NULL, '22:00:00'),
(455, '2024-03-01', 32.70, NULL, NULL, '23:00:00'),
(456, '2024-03-02', 32.70, NULL, NULL, '00:00:00'),
(457, '2024-03-02', 32.70, NULL, NULL, '01:00:00'),
(458, '2024-03-02', 32.70, NULL, NULL, '02:00:00'),
(459, '2024-03-02', 32.70, NULL, NULL, '03:00:00'),
(460, '2024-03-02', 32.70, NULL, NULL, '04:00:00'),
(461, '2024-03-02', 32.70, NULL, NULL, '05:00:00'),
(462, '2024-03-02', 34.54, NULL, NULL, '06:00:00'),
(463, '2024-03-02', 38.12, NULL, NULL, '07:00:00'),
(464, '2024-03-02', 38.31, NULL, NULL, '08:00:00'),
(465, '2024-03-02', 47.76, NULL, NULL, '09:00:00'),
(466, '2024-03-02', 45.38, NULL, NULL, '10:00:00'),
(467, '2024-03-02', 45.94, NULL, NULL, '11:00:00'),
(468, '2024-03-02', 45.94, NULL, NULL, '12:00:00'),
(469, '2024-03-02', 45.94, NULL, NULL, '13:00:00'),
(470, '2024-03-02', 44.39, NULL, NULL, '14:00:00'),
(471, '2024-03-02', 44.39, NULL, NULL, '15:00:00'),
(472, '2024-03-02', 44.39, NULL, NULL, '16:00:00'),
(473, '2024-03-02', 44.21, NULL, NULL, '17:00:00'),
(474, '2024-03-02', 44.05, NULL, NULL, '18:00:00'),
(475, '2024-03-02', 40.04, NULL, NULL, '19:00:00'),
(476, '2024-03-02', 32.70, NULL, NULL, '20:00:00'),
(477, '2024-03-02', 32.70, NULL, NULL, '21:00:00'),
(478, '2024-03-02', 32.70, NULL, NULL, '22:00:00'),
(479, '2024-03-02', 32.70, NULL, NULL, '23:00:00'),
(480, '2024-03-03', 32.70, NULL, NULL, '00:00:00'),
(481, '2024-03-03', 32.70, NULL, NULL, '01:00:00'),
(482, '2024-03-03', 32.70, NULL, NULL, '02:00:00'),
(483, '2024-03-03', 32.70, NULL, NULL, '03:00:00'),
(484, '2024-03-03', 32.70, NULL, NULL, '04:00:00'),
(485, '2024-03-03', 32.70, NULL, NULL, '05:00:00'),
(486, '2024-03-03', 34.54, NULL, NULL, '06:00:00'),
(487, '2024-03-03', 34.54, NULL, NULL, '07:00:00'),
(488, '2024-03-03', 34.54, NULL, NULL, '08:00:00'),
(489, '2024-03-03', 34.54, NULL, NULL, '09:00:00'),
(490, '2024-03-03', 34.54, NULL, NULL, '10:00:00'),
(491, '2024-03-03', 34.54, NULL, NULL, '11:00:00'),
(492, '2024-03-03', 34.54, NULL, NULL, '12:00:00'),
(493, '2024-03-03', 34.54, NULL, NULL, '13:00:00'),
(494, '2024-03-03', 34.54, NULL, NULL, '14:00:00'),
(495, '2024-03-03', 34.54, NULL, NULL, '15:00:00'),
(496, '2024-03-03', 34.54, NULL, NULL, '16:00:00'),
(497, '2024-03-03', 34.54, NULL, NULL, '17:00:00'),
(498, '2024-03-03', 34.54, NULL, NULL, '18:00:00'),
(499, '2024-03-03', 32.70, NULL, NULL, '19:00:00'),
(500, '2024-03-03', 32.70, NULL, NULL, '20:00:00'),
(501, '2024-03-03', 32.70, NULL, NULL, '21:00:00'),
(502, '2024-03-03', 32.70, NULL, NULL, '22:00:00'),
(503, '2024-03-03', 32.70, NULL, NULL, '23:00:00'),
(504, '2024-03-04', 32.70, NULL, NULL, '00:00:00'),
(505, '2024-03-04', 32.70, NULL, NULL, '01:00:00'),
(506, '2024-03-04', 32.70, NULL, NULL, '02:00:00'),
(507, '2024-03-04', 32.70, NULL, NULL, '03:00:00'),
(508, '2024-03-04', 32.70, NULL, NULL, '04:00:00'),
(509, '2024-03-04', 32.70, NULL, NULL, '05:00:00'),
(510, '2024-03-04', 34.54, NULL, NULL, '06:00:00'),
(511, '2024-03-04', 41.07, NULL, NULL, '07:00:00'),
(512, '2024-03-04', 62.10, NULL, NULL, '08:00:00'),
(513, '2024-03-04', 64.55, NULL, NULL, '09:00:00'),
(514, '2024-03-04', 66.22, NULL, NULL, '10:00:00'),
(515, '2024-03-04', 66.22, NULL, NULL, '11:00:00'),
(516, '2024-03-04', 61.13, NULL, NULL, '12:00:00'),
(517, '2024-03-04', 66.22, NULL, NULL, '13:00:00'),
(518, '2024-03-04', 63.89, NULL, NULL, '14:00:00'),
(519, '2024-03-04', 62.23, NULL, NULL, '15:00:00'),
(520, '2024-03-04', 60.78, NULL, NULL, '16:00:00'),
(521, '2024-03-04', 43.17, NULL, NULL, '17:00:00'),
(522, '2024-03-04', 43.17, NULL, NULL, '18:00:00'),
(523, '2024-03-04', 40.34, NULL, NULL, '19:00:00'),
(524, '2024-03-04', 32.70, NULL, NULL, '20:00:00'),
(525, '2024-03-04', 32.70, NULL, NULL, '21:00:00'),
(526, '2024-03-04', 32.70, NULL, NULL, '22:00:00'),
(527, '2024-03-04', 32.70, NULL, NULL, '23:00:00'),
(528, '2024-03-05', 32.70, NULL, NULL, '00:00:00'),
(529, '2024-03-05', 32.70, NULL, NULL, '01:00:00'),
(530, '2024-03-05', 32.70, NULL, NULL, '02:00:00'),
(531, '2024-03-05', 32.70, NULL, NULL, '03:00:00'),
(532, '2024-03-05', 32.70, NULL, NULL, '04:00:00'),
(533, '2024-03-05', 32.70, NULL, NULL, '05:00:00'),
(534, '2024-03-05', 34.54, NULL, NULL, '06:00:00'),
(535, '2024-03-05', 37.88, NULL, NULL, '07:00:00'),
(536, '2024-03-05', 56.68, NULL, NULL, '08:00:00'),
(537, '2024-03-05', 65.56, NULL, NULL, '09:00:00'),
(538, '2024-03-05', 65.56, NULL, NULL, '10:00:00'),
(539, '2024-03-05', 64.57, NULL, NULL, '11:00:00'),
(540, '2024-03-05', 66.29, NULL, NULL, '12:00:00'),
(541, '2024-03-05', 58.88, NULL, NULL, '13:00:00'),
(542, '2024-03-05', 61.32, NULL, NULL, '14:00:00'),
(543, '2024-03-05', 63.12, NULL, NULL, '15:00:00'),
(544, '2024-03-05', 66.22, NULL, NULL, '16:00:00'),
(545, '2024-03-05', 49.07, NULL, NULL, '17:00:00'),
(546, '2024-03-05', 47.42, NULL, NULL, '18:00:00'),
(547, '2024-03-05', 40.57, NULL, NULL, '19:00:00'),
(548, '2024-03-05', 35.03, NULL, NULL, '20:00:00'),
(549, '2024-03-05', 35.03, NULL, NULL, '21:00:00'),
(550, '2024-03-05', 32.70, NULL, NULL, '22:00:00'),
(551, '2024-03-05', 32.70, NULL, NULL, '23:00:00'),
(552, '2024-03-06', 32.70, NULL, NULL, '00:00:00'),
(553, '2024-03-06', 32.70, NULL, NULL, '01:00:00'),
(554, '2024-03-06', 32.70, NULL, NULL, '02:00:00'),
(555, '2024-03-06', 32.70, NULL, NULL, '03:00:00'),
(556, '2024-03-06', 32.70, NULL, NULL, '04:00:00'),
(557, '2024-03-06', 32.70, NULL, NULL, '05:00:00'),
(558, '2024-03-06', 34.42, NULL, NULL, '06:00:00'),
(559, '2024-03-06', 34.54, NULL, NULL, '07:00:00'),
(560, '2024-03-06', 55.23, NULL, NULL, '08:00:00'),
(561, '2024-03-06', 60.21, NULL, NULL, '09:00:00'),
(562, '2024-03-06', 61.53, NULL, NULL, '10:00:00'),
(563, '2024-03-06', 61.53, NULL, NULL, '11:00:00'),
(564, '2024-03-06', 61.53, NULL, NULL, '12:00:00'),
(565, '2024-03-06', 66.22, NULL, NULL, '13:00:00'),
(566, '2024-03-06', 66.22, NULL, NULL, '14:00:00'),
(567, '2024-03-06', 66.22, NULL, NULL, '15:00:00'),
(568, '2024-03-06', 63.57, NULL, NULL, '16:00:00'),
(569, '2024-03-06', 43.54, NULL, NULL, '17:00:00'),
(570, '2024-03-06', 44.53, NULL, NULL, '18:00:00'),
(571, '2024-03-06', 38.82, NULL, NULL, '19:00:00'),
(572, '2024-03-06', 33.37, NULL, NULL, '20:00:00'),
(573, '2024-03-06', 32.70, NULL, NULL, '21:00:00'),
(574, '2024-03-06', 32.70, NULL, NULL, '22:00:00'),
(575, '2024-03-06', 32.70, NULL, NULL, '23:00:00'),
(576, '2024-03-07', 32.70, NULL, NULL, '00:00:00'),
(577, '2024-03-07', 32.70, NULL, NULL, '01:00:00'),
(578, '2024-03-07', 32.70, NULL, NULL, '02:00:00'),
(579, '2024-03-07', 32.70, NULL, NULL, '03:00:00'),
(580, '2024-03-07', 32.70, NULL, NULL, '04:00:00'),
(581, '2024-03-07', 32.70, NULL, NULL, '05:00:00'),
(582, '2024-03-07', 34.54, NULL, NULL, '06:00:00'),
(583, '2024-03-07', 38.74, NULL, NULL, '07:00:00'),
(584, '2024-03-07', 56.88, NULL, NULL, '08:00:00'),
(585, '2024-03-07', 65.56, NULL, NULL, '09:00:00'),
(586, '2024-03-07', 65.56, NULL, NULL, '10:00:00'),
(587, '2024-03-07', 63.90, NULL, NULL, '11:00:00'),
(588, '2024-03-07', 63.90, NULL, NULL, '12:00:00'),
(589, '2024-03-07', 66.01, NULL, NULL, '13:00:00'),
(590, '2024-03-07', 66.22, NULL, NULL, '14:00:00'),
(591, '2024-03-07', 66.22, NULL, NULL, '15:00:00'),
(592, '2024-03-07', 63.59, NULL, NULL, '16:00:00'),
(593, '2024-03-07', 46.42, NULL, NULL, '17:00:00'),
(594, '2024-03-07', 44.87, NULL, NULL, '18:00:00'),
(595, '2024-03-07', 41.04, NULL, NULL, '19:00:00'),
(596, '2024-03-07', 32.70, NULL, NULL, '20:00:00'),
(597, '2024-03-07', 32.70, NULL, NULL, '21:00:00'),
(598, '2024-03-07', 32.70, NULL, NULL, '22:00:00'),
(599, '2024-03-07', 32.70, NULL, NULL, '23:00:00'),
(600, '2024-03-08', 32.70, NULL, NULL, '00:00:00'),
(601, '2024-03-08', 32.70, NULL, NULL, '01:00:00'),
(602, '2024-03-08', 32.70, NULL, NULL, '02:00:00'),
(603, '2024-03-08', 32.70, NULL, NULL, '03:00:00'),
(604, '2024-03-08', 32.70, NULL, NULL, '04:00:00'),
(605, '2024-03-08', 32.70, NULL, NULL, '05:00:00'),
(606, '2024-03-08', 34.54, NULL, NULL, '06:00:00'),
(607, '2024-03-08', 37.52, NULL, NULL, '07:00:00'),
(608, '2024-03-08', 56.66, NULL, NULL, '08:00:00'),
(609, '2024-03-08', 66.22, NULL, NULL, '09:00:00'),
(610, '2024-03-08', 66.22, NULL, NULL, '10:00:00'),
(611, '2024-03-08', 65.22, NULL, NULL, '11:00:00'),
(612, '2024-03-08', 64.22, NULL, NULL, '12:00:00'),
(613, '2024-03-08', 62.66, NULL, NULL, '13:00:00'),
(614, '2024-03-08', 63.33, NULL, NULL, '14:00:00'),
(615, '2024-03-08', 61.67, NULL, NULL, '15:00:00'),
(616, '2024-03-08', 64.56, NULL, NULL, '16:00:00'),
(617, '2024-03-08', 45.87, NULL, NULL, '17:00:00'),
(618, '2024-03-08', 45.87, NULL, NULL, '18:00:00'),
(619, '2024-03-08', 43.04, NULL, NULL, '19:00:00'),
(620, '2024-03-08', 35.70, NULL, NULL, '20:00:00'),
(621, '2024-03-08', 35.03, NULL, NULL, '21:00:00'),
(622, '2024-03-08', 32.70, NULL, NULL, '22:00:00'),
(623, '2024-03-08', 32.70, NULL, NULL, '23:00:00'),
(624, '2024-03-09', 32.70, NULL, NULL, '00:00:00'),
(625, '2024-03-09', 32.70, NULL, NULL, '01:00:00'),
(626, '2024-03-09', 32.70, NULL, NULL, '02:00:00'),
(627, '2024-03-09', 32.70, NULL, NULL, '03:00:00'),
(628, '2024-03-09', 32.70, NULL, NULL, '04:00:00'),
(629, '2024-03-09', 32.70, NULL, NULL, '05:00:00'),
(630, '2024-03-09', 34.54, NULL, NULL, '06:00:00'),
(631, '2024-03-09', 38.12, NULL, NULL, '07:00:00'),
(632, '2024-03-09', 38.31, NULL, NULL, '08:00:00'),
(633, '2024-03-09', 47.76, NULL, NULL, '09:00:00'),
(634, '2024-03-09', 45.38, NULL, NULL, '10:00:00'),
(635, '2024-03-09', 45.94, NULL, NULL, '11:00:00'),
(636, '2024-03-09', 45.94, NULL, NULL, '12:00:00'),
(637, '2024-03-09', 45.94, NULL, NULL, '13:00:00'),
(638, '2024-03-09', 44.39, NULL, NULL, '14:00:00'),
(639, '2024-03-09', 44.39, NULL, NULL, '15:00:00'),
(640, '2024-03-09', 44.39, NULL, NULL, '16:00:00'),
(641, '2024-03-09', 44.21, NULL, NULL, '17:00:00'),
(642, '2024-03-09', 44.05, NULL, NULL, '18:00:00'),
(643, '2024-03-09', 40.04, NULL, NULL, '19:00:00'),
(644, '2024-03-09', 32.70, NULL, NULL, '20:00:00'),
(645, '2024-03-09', 32.70, NULL, NULL, '21:00:00'),
(646, '2024-03-09', 32.70, NULL, NULL, '22:00:00'),
(647, '2024-03-09', 32.70, NULL, NULL, '23:00:00'),
(648, '2024-03-10', 32.70, NULL, NULL, '00:00:00'),
(649, '2024-03-10', 32.70, NULL, NULL, '01:00:00'),
(650, '2024-03-10', 32.70, NULL, NULL, '02:00:00'),
(651, '2024-03-10', 32.70, NULL, NULL, '03:00:00'),
(652, '2024-03-10', 32.70, NULL, NULL, '04:00:00'),
(653, '2024-03-10', 32.70, NULL, NULL, '05:00:00'),
(654, '2024-03-10', 34.54, NULL, NULL, '06:00:00'),
(655, '2024-03-10', 34.54, NULL, NULL, '07:00:00'),
(656, '2024-03-10', 34.54, NULL, NULL, '08:00:00'),
(657, '2024-03-10', 34.54, NULL, NULL, '09:00:00'),
(658, '2024-03-10', 34.54, NULL, NULL, '10:00:00'),
(659, '2024-03-10', 34.54, NULL, NULL, '11:00:00'),
(660, '2024-03-10', 34.54, NULL, NULL, '12:00:00'),
(661, '2024-03-10', 34.54, NULL, NULL, '13:00:00'),
(662, '2024-03-10', 34.54, NULL, NULL, '14:00:00'),
(663, '2024-03-10', 34.54, NULL, NULL, '15:00:00'),
(664, '2024-03-10', 34.54, NULL, NULL, '16:00:00'),
(665, '2024-03-10', 34.54, NULL, NULL, '17:00:00'),
(666, '2024-03-10', 34.54, NULL, NULL, '18:00:00'),
(667, '2024-03-10', 32.70, NULL, NULL, '19:00:00'),
(668, '2024-03-10', 32.70, NULL, NULL, '20:00:00'),
(669, '2024-03-10', 32.70, NULL, NULL, '21:00:00'),
(670, '2024-03-10', 32.70, NULL, NULL, '22:00:00'),
(671, '2024-03-10', 32.70, NULL, NULL, '23:00:00'),
(672, '2024-03-11', 32.70, NULL, NULL, '00:00:00'),
(673, '2024-03-11', 32.70, NULL, NULL, '01:00:00'),
(674, '2024-03-11', 32.70, NULL, NULL, '02:00:00'),
(675, '2024-03-11', 32.70, NULL, NULL, '03:00:00'),
(676, '2024-03-11', 32.70, NULL, NULL, '04:00:00'),
(677, '2024-03-11', 32.70, NULL, NULL, '05:00:00'),
(678, '2024-03-11', 34.54, NULL, NULL, '06:00:00'),
(679, '2024-03-11', 41.07, NULL, NULL, '07:00:00'),
(680, '2024-03-11', 62.10, NULL, NULL, '08:00:00'),
(681, '2024-03-11', 64.55, NULL, NULL, '09:00:00'),
(682, '2024-03-11', 66.22, NULL, NULL, '10:00:00'),
(683, '2024-03-11', 66.22, NULL, NULL, '11:00:00'),
(684, '2024-03-11', 61.13, NULL, NULL, '12:00:00'),
(685, '2024-03-11', 66.22, NULL, NULL, '13:00:00'),
(686, '2024-03-11', 63.89, NULL, NULL, '14:00:00'),
(687, '2024-03-11', 62.23, NULL, NULL, '15:00:00'),
(688, '2024-03-11', 60.78, NULL, NULL, '16:00:00'),
(689, '2024-03-11', 43.17, NULL, NULL, '17:00:00'),
(690, '2024-03-11', 43.17, NULL, NULL, '18:00:00'),
(691, '2024-03-11', 40.34, NULL, NULL, '19:00:00'),
(692, '2024-03-11', 32.70, NULL, NULL, '20:00:00'),
(693, '2024-03-11', 32.70, NULL, NULL, '21:00:00'),
(694, '2024-03-11', 32.70, NULL, NULL, '22:00:00'),
(695, '2024-03-11', 32.70, NULL, NULL, '23:00:00'),
(696, '2024-03-12', 32.70, NULL, NULL, '00:00:00'),
(697, '2024-03-12', 32.70, NULL, NULL, '01:00:00'),
(698, '2024-03-12', 32.70, NULL, NULL, '02:00:00'),
(699, '2024-03-12', 32.70, NULL, NULL, '03:00:00'),
(700, '2024-03-12', 32.70, NULL, NULL, '04:00:00'),
(701, '2024-03-12', 32.70, NULL, NULL, '05:00:00'),
(702, '2024-03-12', 34.54, NULL, NULL, '06:00:00'),
(703, '2024-03-12', 37.88, NULL, NULL, '07:00:00'),
(704, '2024-03-12', 56.68, NULL, NULL, '08:00:00'),
(705, '2024-03-12', 65.56, NULL, NULL, '09:00:00'),
(706, '2024-03-12', 65.56, NULL, NULL, '10:00:00'),
(707, '2024-03-12', 64.57, NULL, NULL, '11:00:00'),
(708, '2024-03-12', 66.29, NULL, NULL, '12:00:00'),
(709, '2024-03-12', 58.88, NULL, NULL, '13:00:00'),
(710, '2024-03-12', 61.32, NULL, NULL, '14:00:00'),
(711, '2024-03-12', 63.12, NULL, NULL, '15:00:00'),
(712, '2024-03-12', 66.22, NULL, NULL, '16:00:00'),
(713, '2024-03-12', 49.07, NULL, NULL, '17:00:00'),
(714, '2024-03-12', 47.42, NULL, NULL, '18:00:00'),
(715, '2024-03-12', 40.57, NULL, NULL, '19:00:00'),
(716, '2024-03-12', 35.03, NULL, NULL, '20:00:00'),
(717, '2024-03-12', 35.03, NULL, NULL, '21:00:00'),
(718, '2024-03-12', 32.70, NULL, NULL, '22:00:00'),
(719, '2024-03-12', 32.70, NULL, NULL, '23:00:00'),
(720, '2024-03-13', 32.70, NULL, NULL, '00:00:00'),
(721, '2024-03-13', 32.70, NULL, NULL, '01:00:00'),
(722, '2024-03-13', 32.70, NULL, NULL, '02:00:00'),
(723, '2024-03-13', 32.70, NULL, NULL, '03:00:00'),
(724, '2024-03-13', 32.70, NULL, NULL, '04:00:00'),
(725, '2024-03-13', 32.70, NULL, NULL, '05:00:00'),
(726, '2024-03-13', 34.42, NULL, NULL, '06:00:00'),
(727, '2024-03-13', 34.54, NULL, NULL, '07:00:00'),
(728, '2024-03-13', 55.23, NULL, NULL, '08:00:00'),
(729, '2024-03-13', 60.21, NULL, NULL, '09:00:00'),
(730, '2024-03-13', 61.53, NULL, NULL, '10:00:00'),
(731, '2024-03-13', 61.53, NULL, NULL, '11:00:00'),
(732, '2024-03-13', 61.53, NULL, NULL, '12:00:00'),
(733, '2024-03-13', 66.22, NULL, NULL, '13:00:00'),
(734, '2024-03-13', 66.22, NULL, NULL, '14:00:00'),
(735, '2024-03-13', 66.22, NULL, NULL, '15:00:00'),
(736, '2024-03-13', 63.57, NULL, NULL, '16:00:00'),
(737, '2024-03-13', 43.54, NULL, NULL, '17:00:00'),
(738, '2024-03-13', 44.53, NULL, NULL, '18:00:00'),
(739, '2024-03-13', 38.82, NULL, NULL, '19:00:00'),
(740, '2024-03-13', 33.37, NULL, NULL, '20:00:00'),
(741, '2024-03-13', 32.70, NULL, NULL, '21:00:00'),
(742, '2024-03-13', 32.70, NULL, NULL, '22:00:00'),
(743, '2024-03-13', 32.70, NULL, NULL, '23:00:00'),
(744, '2024-03-14', 32.70, NULL, NULL, '00:00:00'),
(745, '2024-03-14', 32.70, NULL, NULL, '01:00:00'),
(746, '2024-03-14', 32.70, NULL, NULL, '02:00:00'),
(747, '2024-03-14', 32.70, NULL, NULL, '03:00:00'),
(748, '2024-03-14', 32.70, NULL, NULL, '04:00:00'),
(749, '2024-03-14', 32.70, NULL, NULL, '05:00:00'),
(750, '2024-03-14', 34.54, NULL, NULL, '06:00:00'),
(751, '2024-03-14', 38.74, NULL, NULL, '07:00:00'),
(752, '2024-03-14', 56.88, NULL, NULL, '08:00:00'),
(753, '2024-03-14', 65.56, NULL, NULL, '09:00:00'),
(754, '2024-03-14', 65.56, NULL, NULL, '10:00:00'),
(755, '2024-03-14', 63.90, NULL, NULL, '11:00:00'),
(756, '2024-03-14', 63.90, NULL, NULL, '12:00:00'),
(757, '2024-03-14', 66.01, NULL, NULL, '13:00:00'),
(758, '2024-03-14', 66.22, NULL, NULL, '14:00:00'),
(759, '2024-03-14', 66.22, NULL, NULL, '15:00:00'),
(760, '2024-03-14', 63.59, NULL, NULL, '16:00:00'),
(761, '2024-03-14', 46.42, NULL, NULL, '17:00:00'),
(762, '2024-03-14', 44.87, NULL, NULL, '18:00:00'),
(763, '2024-03-14', 41.04, NULL, NULL, '19:00:00'),
(764, '2024-03-14', 32.70, NULL, NULL, '20:00:00'),
(765, '2024-03-14', 32.70, NULL, NULL, '21:00:00'),
(766, '2024-03-14', 32.70, NULL, NULL, '22:00:00'),
(767, '2024-03-14', 32.70, NULL, NULL, '23:00:00'),
(768, '2024-03-15', 32.70, NULL, NULL, '00:00:00'),
(769, '2024-03-15', 32.70, NULL, NULL, '01:00:00'),
(770, '2024-03-15', 32.70, NULL, NULL, '02:00:00'),
(771, '2024-03-15', 32.70, NULL, NULL, '03:00:00'),
(772, '2024-03-15', 32.70, NULL, NULL, '04:00:00'),
(773, '2024-03-15', 32.70, NULL, NULL, '05:00:00'),
(774, '2024-03-15', 34.54, NULL, NULL, '06:00:00'),
(775, '2024-03-15', 37.52, NULL, NULL, '07:00:00'),
(776, '2024-03-15', 56.66, NULL, NULL, '08:00:00'),
(777, '2024-03-15', 66.22, NULL, NULL, '09:00:00'),
(778, '2024-03-15', 66.22, NULL, NULL, '10:00:00'),
(779, '2024-03-15', 65.22, NULL, NULL, '11:00:00'),
(780, '2024-03-15', 64.22, NULL, NULL, '12:00:00'),
(781, '2024-03-15', 62.66, NULL, NULL, '13:00:00'),
(782, '2024-03-15', 63.33, NULL, NULL, '14:00:00'),
(783, '2024-03-15', 61.67, NULL, NULL, '15:00:00'),
(784, '2024-03-15', 64.56, NULL, NULL, '16:00:00'),
(785, '2024-03-15', 45.87, NULL, NULL, '17:00:00'),
(786, '2024-03-15', 45.87, NULL, NULL, '18:00:00'),
(787, '2024-03-15', 43.04, NULL, NULL, '19:00:00'),
(788, '2024-03-15', 35.70, NULL, NULL, '20:00:00'),
(789, '2024-03-15', 35.03, NULL, NULL, '21:00:00'),
(790, '2024-03-15', 32.70, NULL, NULL, '22:00:00'),
(791, '2024-03-15', 32.70, NULL, NULL, '23:00:00'),
(792, '2024-03-16', 32.70, NULL, NULL, '00:00:00'),
(793, '2024-03-16', 32.70, NULL, NULL, '01:00:00'),
(794, '2024-03-16', 32.70, NULL, NULL, '02:00:00'),
(795, '2024-03-16', 32.70, NULL, NULL, '03:00:00'),
(796, '2024-03-16', 32.70, NULL, NULL, '04:00:00'),
(797, '2024-03-16', 32.70, NULL, NULL, '05:00:00'),
(798, '2024-03-16', 34.54, NULL, NULL, '06:00:00'),
(799, '2024-03-16', 38.12, NULL, NULL, '07:00:00'),
(800, '2024-03-16', 38.31, NULL, NULL, '08:00:00'),
(801, '2024-03-16', 47.76, NULL, NULL, '09:00:00'),
(802, '2024-03-16', 45.38, NULL, NULL, '10:00:00'),
(803, '2024-03-16', 45.94, NULL, NULL, '11:00:00'),
(804, '2024-03-16', 45.94, NULL, NULL, '12:00:00'),
(805, '2024-03-16', 45.94, NULL, NULL, '13:00:00'),
(806, '2024-03-16', 44.39, NULL, NULL, '14:00:00'),
(807, '2024-03-16', 44.39, NULL, NULL, '15:00:00'),
(808, '2024-03-16', 44.39, NULL, NULL, '16:00:00'),
(809, '2024-03-16', 44.21, NULL, NULL, '17:00:00'),
(810, '2024-03-16', 44.05, NULL, NULL, '18:00:00'),
(811, '2024-03-16', 40.04, NULL, NULL, '19:00:00'),
(812, '2024-03-16', 32.70, NULL, NULL, '20:00:00'),
(813, '2024-03-16', 32.70, NULL, NULL, '21:00:00'),
(814, '2024-03-16', 32.70, NULL, NULL, '22:00:00'),
(815, '2024-03-16', 32.70, NULL, NULL, '23:00:00'),
(816, '2024-03-17', 32.70, NULL, NULL, '00:00:00'),
(817, '2024-03-17', 32.70, NULL, NULL, '01:00:00'),
(818, '2024-03-17', 32.70, NULL, NULL, '02:00:00'),
(819, '2024-03-17', 32.70, NULL, NULL, '03:00:00'),
(820, '2024-03-17', 32.70, NULL, NULL, '04:00:00'),
(821, '2024-03-17', 32.70, NULL, NULL, '05:00:00'),
(822, '2024-03-17', 34.54, NULL, NULL, '06:00:00'),
(823, '2024-03-17', 34.54, NULL, NULL, '07:00:00'),
(824, '2024-03-17', 34.54, NULL, NULL, '08:00:00'),
(825, '2024-03-17', 34.54, NULL, NULL, '09:00:00'),
(826, '2024-03-17', 34.54, NULL, NULL, '10:00:00'),
(827, '2024-03-17', 34.54, NULL, NULL, '11:00:00'),
(828, '2024-03-17', 34.54, NULL, NULL, '12:00:00'),
(829, '2024-03-17', 34.54, NULL, NULL, '13:00:00'),
(830, '2024-03-17', 34.54, NULL, NULL, '14:00:00'),
(831, '2024-03-17', 34.54, NULL, NULL, '15:00:00'),
(832, '2024-03-17', 34.54, NULL, NULL, '16:00:00'),
(833, '2024-03-17', 34.54, NULL, NULL, '17:00:00'),
(834, '2024-03-17', 34.54, NULL, NULL, '18:00:00'),
(835, '2024-03-17', 32.70, NULL, NULL, '19:00:00'),
(836, '2024-03-17', 32.70, NULL, NULL, '20:00:00'),
(837, '2024-03-17', 32.70, NULL, NULL, '21:00:00'),
(838, '2024-03-17', 32.70, NULL, NULL, '22:00:00'),
(839, '2024-03-17', 32.70, NULL, NULL, '23:00:00'),
(840, '2024-03-18', 32.70, NULL, NULL, '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `energy_meter_consumptions`
--

CREATE TABLE `energy_meter_consumptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `consumption` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `energy_meter_consumptions`
--

INSERT INTO `energy_meter_consumptions` (`id`, `date`, `consumption`, `created_at`, `updated_at`, `time`) VALUES
(1, '2024-02-19', 16.11, NULL, NULL, '01:00:42'),
(2, '2024-02-19', 16.15, NULL, NULL, '02:00:42'),
(3, '2024-02-19', 15.65, NULL, NULL, '03:00:42'),
(4, '2024-02-19', 16.02, NULL, NULL, '04:00:42'),
(5, '2024-02-19', 17.88, NULL, NULL, '05:00:41'),
(6, '2024-02-19', 23.92, NULL, NULL, '06:00:41'),
(7, '2024-02-19', 20.73, NULL, NULL, '07:00:41'),
(8, '2024-02-19', 34.98, NULL, NULL, '08:00:41'),
(9, '2024-02-19', 66.73, NULL, NULL, '09:00:41'),
(10, '2024-02-19', 112.88, NULL, NULL, '10:00:41'),
(11, '2024-02-19', 114.57, NULL, NULL, '11:00:41'),
(12, '2024-02-19', 112.72, NULL, NULL, '12:00:41'),
(13, '2024-02-19', 109.95, NULL, NULL, '13:00:41'),
(14, '2024-02-19', 120.33, NULL, NULL, '14:00:41'),
(15, '2024-02-19', 116.58, NULL, NULL, '15:00:41'),
(16, '2024-02-19', 117.52, NULL, NULL, '16:00:41'),
(17, '2024-02-19', 95.33, NULL, NULL, '17:00:41'),
(18, '2024-02-19', 55.96, NULL, NULL, '18:00:41'),
(19, '2024-02-19', 44.58, NULL, NULL, '19:00:40'),
(20, '2024-02-19', 33.17, NULL, NULL, '20:00:40'),
(21, '2024-02-19', 23.24, NULL, NULL, '21:00:40'),
(22, '2024-02-19', 17.78, NULL, NULL, '22:00:40'),
(23, '2024-02-19', 16.88, NULL, NULL, '23:00:40'),
(24, '2024-02-20', 17.29, NULL, NULL, '00:00:40'),
(25, '2024-02-20', 16.70, NULL, NULL, '01:00:40'),
(26, '2024-02-20', 16.82, NULL, NULL, '02:00:40'),
(27, '2024-02-20', 16.62, NULL, NULL, '03:00:40'),
(28, '2024-02-20', 16.18, NULL, NULL, '04:00:40'),
(29, '2024-02-20', 18.75, NULL, NULL, '05:00:40'),
(30, '2024-02-20', 22.41, NULL, NULL, '06:00:40'),
(31, '2024-02-20', 23.02, NULL, NULL, '07:00:40'),
(32, '2024-02-20', 26.59, NULL, NULL, '08:00:40'),
(33, '2024-02-20', 73.42, NULL, NULL, '09:00:39'),
(34, '2024-02-20', 120.99, NULL, NULL, '10:00:39'),
(35, '2024-02-20', 129.03, NULL, NULL, '11:00:39'),
(36, '2024-02-20', 117.88, NULL, NULL, '12:00:39'),
(37, '2024-02-20', 109.26, NULL, NULL, '13:00:39'),
(38, '2024-02-20', 119.01, NULL, NULL, '14:00:39'),
(39, '2024-02-20', 128.70, NULL, NULL, '15:00:39'),
(40, '2024-02-20', 114.13, NULL, NULL, '16:00:39'),
(41, '2024-02-20', 90.67, NULL, NULL, '17:00:39'),
(42, '2024-02-20', 61.25, NULL, NULL, '18:00:39'),
(43, '2024-02-20', 47.20, NULL, NULL, '19:00:39'),
(44, '2024-02-20', 31.66, NULL, NULL, '20:00:39'),
(45, '2024-02-20', 23.93, NULL, NULL, '21:00:39'),
(46, '2024-02-20', 18.12, NULL, NULL, '22:00:39'),
(47, '2024-02-20', 17.72, NULL, NULL, '23:00:39'),
(48, '2024-02-21', 17.75, NULL, NULL, '00:00:38'),
(49, '2024-02-21', 17.90, NULL, NULL, '01:00:38'),
(50, '2024-02-21', 17.77, NULL, NULL, '02:00:38'),
(51, '2024-02-21', 17.96, NULL, NULL, '03:00:38'),
(52, '2024-02-21', 17.51, NULL, NULL, '04:00:38'),
(53, '2024-02-21', 20.16, NULL, NULL, '05:00:38'),
(54, '2024-02-21', 26.59, NULL, NULL, '06:00:38'),
(55, '2024-02-21', 25.35, NULL, NULL, '07:00:38'),
(56, '2024-02-21', 33.52, NULL, NULL, '08:00:38'),
(57, '2024-02-21', 61.54, NULL, NULL, '09:00:38'),
(58, '2024-02-21', 108.83, NULL, NULL, '10:00:38'),
(59, '2024-02-21', 121.47, NULL, NULL, '11:00:38'),
(60, '2024-02-21', 120.61, NULL, NULL, '12:00:38'),
(61, '2024-02-21', 109.67, NULL, NULL, '13:00:38'),
(62, '2024-02-21', 101.29, NULL, NULL, '14:00:38'),
(63, '2024-02-21', 105.52, NULL, NULL, '15:00:37'),
(64, '2024-02-21', 103.28, NULL, NULL, '16:00:37'),
(65, '2024-02-21', 82.86, NULL, NULL, '17:00:37'),
(66, '2024-02-21', 57.28, NULL, NULL, '18:00:37'),
(67, '2024-02-21', 42.69, NULL, NULL, '19:00:37'),
(68, '2024-02-21', 30.61, NULL, NULL, '20:00:37'),
(69, '2024-02-21', 25.12, NULL, NULL, '21:00:37'),
(70, '2024-02-21', 18.75, NULL, NULL, '22:00:37'),
(71, '2024-02-21', 17.73, NULL, NULL, '23:00:37'),
(72, '2024-02-22', 17.79, NULL, NULL, '00:00:37'),
(73, '2024-02-22', 17.55, NULL, NULL, '01:00:37'),
(74, '2024-02-22', 17.37, NULL, NULL, '02:00:37'),
(75, '2024-02-22', 17.32, NULL, NULL, '03:00:37'),
(76, '2024-02-22', 17.57, NULL, NULL, '04:00:37'),
(77, '2024-02-22', 19.19, NULL, NULL, '05:00:37'),
(78, '2024-02-22', 26.46, NULL, NULL, '06:00:37'),
(79, '2024-02-22', 23.42, NULL, NULL, '07:00:37'),
(80, '2024-02-22', 36.50, NULL, NULL, '08:00:36'),
(81, '2024-02-22', 67.05, NULL, NULL, '09:00:36'),
(82, '2024-02-22', 108.56, NULL, NULL, '10:00:36'),
(83, '2024-02-22', 119.77, NULL, NULL, '11:00:36'),
(84, '2024-02-22', 117.72, NULL, NULL, '12:00:36'),
(85, '2024-02-22', 107.62, NULL, NULL, '13:00:36'),
(86, '2024-02-22', 110.59, NULL, NULL, '14:00:36'),
(87, '2024-02-22', 104.68, NULL, NULL, '15:00:36'),
(88, '2024-02-22', 103.02, NULL, NULL, '16:00:36'),
(89, '2024-02-22', 82.03, NULL, NULL, '17:00:36'),
(90, '2024-02-22', 64.38, NULL, NULL, '18:00:36'),
(91, '2024-02-22', 41.47, NULL, NULL, '19:00:36'),
(92, '2024-02-22', 29.34, NULL, NULL, '20:00:36'),
(93, '2024-02-22', 23.14, NULL, NULL, '21:00:36'),
(94, '2024-02-22', 18.38, NULL, NULL, '22:00:36'),
(95, '2024-02-22', 17.37, NULL, NULL, '23:00:36'),
(96, '2024-02-23', 17.17, NULL, NULL, '00:00:36'),
(97, '2024-02-23', 17.21, NULL, NULL, '01:00:36'),
(98, '2024-02-23', 17.23, NULL, NULL, '02:00:36'),
(99, '2024-02-23', 17.03, NULL, NULL, '03:00:36'),
(100, '2024-02-23', 16.98, NULL, NULL, '04:00:35'),
(101, '2024-02-23', 19.13, NULL, NULL, '05:00:35'),
(102, '2024-02-23', 26.18, NULL, NULL, '06:00:35'),
(103, '2024-02-23', 22.07, NULL, NULL, '07:00:35'),
(104, '2024-02-23', 32.68, NULL, NULL, '08:00:35'),
(105, '2024-02-23', 59.88, NULL, NULL, '09:00:35'),
(106, '2024-02-23', 109.28, NULL, NULL, '10:00:35'),
(107, '2024-02-23', 112.34, NULL, NULL, '11:00:35'),
(108, '2024-02-23', 106.61, NULL, NULL, '12:00:35'),
(109, '2024-02-23', 100.54, NULL, NULL, '13:00:35'),
(110, '2024-02-23', 91.09, NULL, NULL, '14:00:35'),
(111, '2024-02-23', 82.83, NULL, NULL, '15:00:35'),
(112, '2024-02-23', 76.12, NULL, NULL, '16:00:35'),
(113, '2024-02-23', 65.58, NULL, NULL, '17:00:35'),
(114, '2024-02-23', 53.69, NULL, NULL, '18:02:51'),
(115, '2024-02-23', 33.94, NULL, NULL, '19:02:51'),
(116, '2024-02-23', 25.02, NULL, NULL, '20:02:51'),
(117, '2024-02-23', 20.32, NULL, NULL, '21:02:51'),
(118, '2024-02-23', 18.58, NULL, NULL, '22:02:51'),
(119, '2024-02-23', 17.58, NULL, NULL, '23:02:51'),
(120, '2024-02-24', 17.38, NULL, NULL, '00:02:51'),
(121, '2024-02-24', 17.25, NULL, NULL, '01:02:51'),
(122, '2024-02-24', 17.07, NULL, NULL, '02:02:51'),
(123, '2024-02-24', 16.96, NULL, NULL, '03:02:51'),
(124, '2024-02-24', 17.27, NULL, NULL, '04:02:50'),
(125, '2024-02-24', 17.16, NULL, NULL, '05:02:50'),
(126, '2024-02-24', 19.62, NULL, NULL, '06:02:50'),
(127, '2024-02-24', 18.02, NULL, NULL, '07:02:50'),
(128, '2024-02-24', 15.89, NULL, NULL, '08:02:50'),
(129, '2024-02-24', 17.43, NULL, NULL, '09:02:50'),
(130, '2024-02-24', 6.45, NULL, NULL, '10:02:50'),
(131, '2024-02-24', 8.38, NULL, NULL, '11:02:50'),
(132, '2024-02-24', 13.74, NULL, NULL, '12:02:50'),
(133, '2024-02-24', 15.93, NULL, NULL, '13:02:50'),
(134, '2024-02-24', 20.79, NULL, NULL, '14:02:50'),
(135, '2024-02-24', 31.09, NULL, NULL, '15:02:50'),
(136, '2024-02-24', 31.31, NULL, NULL, '16:02:50'),
(137, '2024-02-24', 31.38, NULL, NULL, '17:02:50'),
(138, '2024-02-24', 28.14, NULL, NULL, '18:02:50'),
(139, '2024-02-24', 22.68, NULL, NULL, '19:02:49'),
(140, '2024-02-24', 18.04, NULL, NULL, '20:02:49'),
(141, '2024-02-24', 17.52, NULL, NULL, '21:02:49'),
(142, '2024-02-24', 17.04, NULL, NULL, '22:02:49'),
(143, '2024-02-24', 17.00, NULL, NULL, '23:02:49'),
(144, '2024-02-25', 16.86, NULL, NULL, '00:02:49'),
(145, '2024-02-25', 16.91, NULL, NULL, '01:02:49'),
(146, '2024-02-25', 17.00, NULL, NULL, '02:02:49'),
(147, '2024-02-25', 17.19, NULL, NULL, '03:02:49'),
(148, '2024-02-25', 17.57, NULL, NULL, '04:02:49'),
(149, '2024-02-25', 17.94, NULL, NULL, '05:02:49'),
(150, '2024-02-25', 26.93, NULL, NULL, '06:02:49'),
(151, '2024-02-25', 31.34, NULL, NULL, '07:02:49'),
(152, '2024-02-25', 27.07, NULL, NULL, '08:02:49'),
(153, '2024-02-25', 22.47, NULL, NULL, '09:02:49'),
(154, '2024-02-25', 14.68, NULL, NULL, '10:02:48'),
(155, '2024-02-25', 11.08, NULL, NULL, '11:02:48'),
(156, '2024-02-25', 9.94, NULL, NULL, '12:02:48'),
(157, '2024-02-25', 15.68, NULL, NULL, '13:02:48'),
(158, '2024-02-25', 17.76, NULL, NULL, '14:02:48'),
(159, '2024-02-25', 20.02, NULL, NULL, '15:02:48'),
(160, '2024-02-25', 27.30, NULL, NULL, '16:02:48'),
(161, '2024-02-25', 30.35, NULL, NULL, '17:02:48'),
(162, '2024-02-25', 27.80, NULL, NULL, '18:02:48'),
(163, '2024-02-25', 25.93, NULL, NULL, '19:02:48'),
(164, '2024-02-25', 19.47, NULL, NULL, '20:02:48'),
(165, '2024-02-25', 16.93, NULL, NULL, '21:02:48'),
(166, '2024-02-25', 16.97, NULL, NULL, '22:02:48'),
(167, '2024-02-25', 16.87, NULL, NULL, '23:02:48'),
(168, '2024-02-26', 16.87, NULL, NULL, '00:02:47'),
(169, '2024-02-26', 16.22, NULL, NULL, '01:02:47'),
(170, '2024-02-26', 16.99, NULL, NULL, '02:02:47'),
(171, '2024-02-26', 16.52, NULL, NULL, '03:02:47'),
(172, '2024-02-26', 16.93, NULL, NULL, '04:02:47'),
(173, '2024-02-26', 20.62, NULL, NULL, '05:02:47'),
(174, '2024-02-26', 24.93, NULL, NULL, '06:02:47'),
(175, '2024-02-26', 22.77, NULL, NULL, '07:02:47'),
(176, '2024-02-26', 33.66, NULL, NULL, '08:02:47'),
(177, '2024-02-26', 82.32, NULL, NULL, '09:02:47'),
(178, '2024-02-26', 110.67, NULL, NULL, '10:02:47'),
(179, '2024-02-26', 112.62, NULL, NULL, '11:02:47'),
(180, '2024-02-26', 118.37, NULL, NULL, '12:02:47'),
(181, '2024-02-26', 115.85, NULL, NULL, '13:02:47'),
(182, '2024-02-26', 123.27, NULL, NULL, '14:02:47'),
(183, '2024-02-26', 130.56, NULL, NULL, '15:02:46'),
(184, '2024-02-26', 118.09, NULL, NULL, '16:02:46'),
(185, '2024-02-26', 92.28, NULL, NULL, '17:02:46'),
(186, '2024-02-26', 65.26, NULL, NULL, '18:02:46'),
(187, '2024-02-26', 45.32, NULL, NULL, '19:02:46'),
(188, '2024-02-26', 31.62, NULL, NULL, '20:02:46'),
(189, '2024-02-26', 21.64, NULL, NULL, '21:02:46'),
(190, '2024-02-26', 17.70, NULL, NULL, '22:02:46'),
(191, '2024-02-26', 17.39, NULL, NULL, '23:02:46'),
(192, '2024-02-27', 17.57, NULL, NULL, '00:02:46'),
(193, '2024-02-27', 17.36, NULL, NULL, '01:02:46'),
(194, '2024-02-27', 17.12, NULL, NULL, '02:02:46'),
(195, '2024-02-27', 17.00, NULL, NULL, '03:02:46'),
(196, '2024-02-27', 16.86, NULL, NULL, '04:02:45'),
(197, '2024-02-27', 18.84, NULL, NULL, '05:02:45'),
(198, '2024-02-27', 25.61, NULL, NULL, '06:02:45'),
(199, '2024-02-27', 19.77, NULL, NULL, '07:02:45'),
(200, '2024-02-27', 31.92, NULL, NULL, '08:02:45'),
(201, '2024-02-27', 73.98, NULL, NULL, '09:02:45'),
(202, '2024-02-27', 110.76, NULL, NULL, '10:02:45'),
(203, '2024-02-27', 113.03, NULL, NULL, '11:02:45'),
(204, '2024-02-27', 121.48, NULL, NULL, '12:02:45'),
(205, '2024-02-27', 114.67, NULL, NULL, '13:02:45'),
(206, '2024-02-27', 101.17, NULL, NULL, '14:02:45'),
(207, '2024-02-27', 109.46, NULL, NULL, '15:02:45'),
(208, '2024-02-27', 116.54, NULL, NULL, '16:02:45'),
(209, '2024-02-27', 90.72, NULL, NULL, '17:02:45'),
(210, '2024-02-27', 62.33, NULL, NULL, '18:02:44'),
(211, '2024-02-27', 39.62, NULL, NULL, '19:02:44'),
(212, '2024-02-27', 29.54, NULL, NULL, '20:02:44'),
(213, '2024-02-27', 22.35, NULL, NULL, '21:02:44'),
(214, '2024-02-27', 17.16, NULL, NULL, '22:02:44'),
(215, '2024-02-27', 16.76, NULL, NULL, '23:02:44'),
(216, '2024-02-28', 16.88, NULL, NULL, '00:02:44'),
(217, '2024-02-28', 16.81, NULL, NULL, '01:02:44'),
(218, '2024-02-28', 16.75, NULL, NULL, '02:02:44'),
(219, '2024-02-28', 16.68, NULL, NULL, '03:02:44'),
(220, '2024-02-28', 16.13, NULL, NULL, '04:02:44'),
(221, '2024-02-28', 19.12, NULL, NULL, '05:02:44'),
(222, '2024-02-28', 24.38, NULL, NULL, '06:02:44'),
(223, '2024-02-28', 20.81, NULL, NULL, '07:02:44'),
(224, '2024-02-28', 29.48, NULL, NULL, '08:02:43'),
(225, '2024-02-28', 57.63, NULL, NULL, '09:02:43'),
(226, '2024-02-28', 94.24, NULL, NULL, '10:02:43'),
(227, '2024-02-28', 104.12, NULL, NULL, '11:02:43'),
(228, '2024-02-28', 110.58, NULL, NULL, '12:02:43'),
(229, '2024-02-28', 107.16, NULL, NULL, '13:02:43'),
(230, '2024-02-28', 119.82, NULL, NULL, '14:02:43'),
(231, '2024-02-28', 120.06, NULL, NULL, '15:02:43'),
(232, '2024-02-28', 110.03, NULL, NULL, '16:02:43'),
(233, '2024-02-28', 90.65, NULL, NULL, '17:02:43'),
(234, '2024-02-28', 55.18, NULL, NULL, '18:02:43'),
(235, '2024-02-28', 38.48, NULL, NULL, '19:02:43'),
(236, '2024-02-28', 27.22, NULL, NULL, '20:02:43'),
(237, '2024-02-28', 24.27, NULL, NULL, '21:02:43'),
(238, '2024-02-28', 17.58, NULL, NULL, '22:02:42'),
(239, '2024-02-28', 17.57, NULL, NULL, '23:02:42'),
(240, '2024-02-29', 17.14, NULL, NULL, '00:02:42'),
(241, '2024-02-29', 17.53, NULL, NULL, '01:02:42'),
(242, '2024-02-29', 16.79, NULL, NULL, '02:02:42'),
(243, '2024-02-29', 17.60, NULL, NULL, '03:02:42'),
(244, '2024-02-29', 16.82, NULL, NULL, '04:02:42'),
(245, '2024-02-29', 19.75, NULL, NULL, '05:02:42'),
(246, '2024-02-29', 24.53, NULL, NULL, '06:02:42'),
(247, '2024-02-29', 21.57, NULL, NULL, '07:02:42'),
(248, '2024-02-29', 33.41, NULL, NULL, '08:02:42'),
(249, '2024-02-29', 74.59, NULL, NULL, '09:02:42'),
(250, '2024-02-29', 115.92, NULL, NULL, '10:02:41'),
(251, '2024-02-29', 118.79, NULL, NULL, '11:02:41'),
(252, '2024-02-29', 113.53, NULL, NULL, '12:02:41'),
(253, '2024-02-29', 121.81, NULL, NULL, '13:02:41'),
(254, '2024-02-29', 126.17, NULL, NULL, '14:02:41'),
(255, '2024-02-29', 134.94, NULL, NULL, '15:02:41'),
(256, '2024-02-29', 134.92, NULL, NULL, '16:02:41'),
(257, '2024-02-29', 101.33, NULL, NULL, '17:02:41'),
(258, '2024-02-29', 57.09, NULL, NULL, '18:02:41'),
(259, '2024-02-29', 40.28, NULL, NULL, '19:02:41'),
(260, '2024-02-29', 27.82, NULL, NULL, '20:02:41'),
(261, '2024-02-29', 23.63, NULL, NULL, '21:02:41'),
(262, '2024-02-29', 18.16, NULL, NULL, '22:02:41'),
(263, '2024-02-29', 18.03, NULL, NULL, '23:02:40'),
(264, '2024-03-01', 17.23, NULL, NULL, '00:02:40'),
(265, '2024-03-01', 17.38, NULL, NULL, '01:02:40'),
(266, '2024-03-01', 17.34, NULL, NULL, '02:02:40'),
(267, '2024-03-01', 17.12, NULL, NULL, '03:02:40'),
(268, '2024-03-01', 16.83, NULL, NULL, '04:02:40'),
(269, '2024-03-01', 19.12, NULL, NULL, '05:02:40'),
(270, '2024-03-01', 25.06, NULL, NULL, '06:02:40'),
(271, '2024-03-01', 21.03, NULL, NULL, '07:02:40'),
(272, '2024-03-01', 32.02, NULL, NULL, '08:02:40'),
(273, '2024-03-01', 70.47, NULL, NULL, '09:02:40'),
(274, '2024-03-01', 116.36, NULL, NULL, '10:02:40'),
(275, '2024-03-01', 125.60, NULL, NULL, '11:02:40'),
(276, '2024-03-01', 123.19, NULL, NULL, '12:02:40'),
(277, '2024-03-01', 121.64, NULL, NULL, '13:02:39'),
(278, '2024-03-01', 130.78, NULL, NULL, '14:02:39'),
(279, '2024-03-01', 120.08, NULL, NULL, '15:02:39'),
(280, '2024-03-01', 113.67, NULL, NULL, '16:02:39'),
(281, '2024-03-01', 84.73, NULL, NULL, '17:02:39'),
(282, '2024-03-01', 59.60, NULL, NULL, '18:02:39'),
(283, '2024-03-01', 33.58, NULL, NULL, '19:02:39'),
(284, '2024-03-01', 28.04, NULL, NULL, '20:02:39'),
(285, '2024-03-01', 23.60, NULL, NULL, '21:02:39'),
(286, '2024-03-01', 17.94, NULL, NULL, '22:02:39'),
(287, '2024-03-01', 17.80, NULL, NULL, '23:02:39'),
(288, '2024-03-02', 17.74, NULL, NULL, '00:02:39'),
(289, '2024-03-02', 17.61, NULL, NULL, '01:02:39'),
(290, '2024-03-02', 17.31, NULL, NULL, '02:02:38'),
(291, '2024-03-02', 17.50, NULL, NULL, '03:02:38'),
(292, '2024-03-02', 17.57, NULL, NULL, '04:02:38'),
(293, '2024-03-02', 17.59, NULL, NULL, '05:02:38'),
(294, '2024-03-02', 18.73, NULL, NULL, '06:02:38'),
(295, '2024-03-02', 17.03, NULL, NULL, '07:02:38'),
(296, '2024-03-02', 16.77, NULL, NULL, '08:02:38'),
(297, '2024-03-02', 20.51, NULL, NULL, '09:02:38'),
(298, '2024-03-02', 25.37, NULL, NULL, '10:02:38'),
(299, '2024-03-02', 31.27, NULL, NULL, '11:02:38'),
(300, '2024-03-02', 18.95, NULL, NULL, '12:02:38'),
(301, '2024-03-02', 19.64, NULL, NULL, '13:02:38'),
(302, '2024-03-02', 23.63, NULL, NULL, '14:02:38'),
(303, '2024-03-02', 31.78, NULL, NULL, '15:02:38'),
(304, '2024-03-02', 35.30, NULL, NULL, '16:02:37'),
(305, '2024-03-02', 46.60, NULL, NULL, '17:02:37'),
(306, '2024-03-02', 43.12, NULL, NULL, '18:02:37'),
(307, '2024-03-02', 26.08, NULL, NULL, '19:02:37'),
(308, '2024-03-02', 19.62, NULL, NULL, '20:02:37'),
(309, '2024-03-02', 17.48, NULL, NULL, '21:02:37'),
(310, '2024-03-02', 16.76, NULL, NULL, '22:02:37'),
(311, '2024-03-02', 16.71, NULL, NULL, '23:02:37'),
(312, '2024-03-03', 16.91, NULL, NULL, '00:02:37'),
(313, '2024-03-03', 17.08, NULL, NULL, '01:02:37'),
(314, '2024-03-03', 17.20, NULL, NULL, '02:02:37'),
(315, '2024-03-03', 17.07, NULL, NULL, '03:02:37'),
(316, '2024-03-03', 16.73, NULL, NULL, '04:02:37'),
(317, '2024-03-03', 16.87, NULL, NULL, '05:02:36'),
(318, '2024-03-03', 20.02, NULL, NULL, '06:02:36'),
(319, '2024-03-03', 20.62, NULL, NULL, '07:02:36'),
(320, '2024-03-03', 13.88, NULL, NULL, '08:02:36'),
(321, '2024-03-03', 9.64, NULL, NULL, '09:02:36'),
(322, '2024-03-03', 4.84, NULL, NULL, '10:02:36'),
(323, '2024-03-03', 2.92, NULL, NULL, '11:02:36'),
(324, '2024-03-03', 6.03, NULL, NULL, '12:02:36'),
(325, '2024-03-03', 5.94, NULL, NULL, '13:02:36'),
(326, '2024-03-03', 11.38, NULL, NULL, '14:02:36'),
(327, '2024-03-03', 15.48, NULL, NULL, '15:02:36'),
(328, '2024-03-03', 22.68, NULL, NULL, '16:02:36'),
(329, '2024-03-03', 27.77, NULL, NULL, '17:02:35'),
(330, '2024-03-03', 24.38, NULL, NULL, '18:02:35'),
(331, '2024-03-03', 21.18, NULL, NULL, '19:02:35'),
(332, '2024-03-03', 17.22, NULL, NULL, '20:02:35'),
(333, '2024-03-03', 17.25, NULL, NULL, '21:02:35'),
(334, '2024-03-03', 17.02, NULL, NULL, '22:02:35'),
(335, '2024-03-03', 16.72, NULL, NULL, '23:02:35'),
(336, '2024-03-04', 16.52, NULL, NULL, '00:02:35'),
(337, '2024-03-04', 16.32, NULL, NULL, '01:02:35'),
(338, '2024-03-04', 16.26, NULL, NULL, '02:02:35'),
(339, '2024-03-04', 16.39, NULL, NULL, '03:02:35'),
(340, '2024-03-04', 15.76, NULL, NULL, '04:02:35'),
(341, '2024-03-04', 18.15, NULL, NULL, '05:02:35'),
(342, '2024-03-04', 24.94, NULL, NULL, '06:02:34'),
(343, '2024-03-04', 22.23, NULL, NULL, '07:02:34'),
(344, '2024-03-04', 25.34, NULL, NULL, '08:02:34'),
(345, '2024-03-04', 64.61, NULL, NULL, '09:02:34'),
(346, '2024-03-04', 91.89, NULL, NULL, '10:02:34'),
(347, '2024-03-04', 89.97, NULL, NULL, '11:02:34'),
(348, '2024-03-04', 92.36, NULL, NULL, '12:02:34'),
(349, '2024-03-04', 89.50, NULL, NULL, '13:02:34'),
(350, '2024-03-04', 92.75, NULL, NULL, '14:02:34'),
(351, '2024-03-04', 99.17, NULL, NULL, '15:02:34'),
(352, '2024-03-04', 97.48, NULL, NULL, '16:02:34'),
(353, '2024-03-04', 74.62, NULL, NULL, '17:02:34'),
(354, '2024-03-04', 48.83, NULL, NULL, '18:02:34'),
(355, '2024-03-04', 39.33, NULL, NULL, '19:02:33'),
(356, '2024-03-04', 33.94, NULL, NULL, '20:02:33'),
(357, '2024-03-04', 25.99, NULL, NULL, '21:02:33'),
(358, '2024-03-04', 18.38, NULL, NULL, '22:02:33'),
(359, '2024-03-04', 17.35, NULL, NULL, '23:02:33'),
(360, '2024-03-05', 17.52, NULL, NULL, '00:02:33'),
(361, '2024-03-05', 17.52, NULL, NULL, '01:02:33'),
(362, '2024-03-05', 17.69, NULL, NULL, '02:02:33'),
(363, '2024-03-05', 17.34, NULL, NULL, '03:02:33'),
(364, '2024-03-05', 17.40, NULL, NULL, '04:02:33'),
(365, '2024-03-05', 19.19, NULL, NULL, '05:02:33'),
(366, '2024-03-05', 22.88, NULL, NULL, '06:02:33'),
(367, '2024-03-05', 21.92, NULL, NULL, '07:02:33'),
(368, '2024-03-05', 34.47, NULL, NULL, '08:02:32'),
(369, '2024-03-05', 76.64, NULL, NULL, '09:02:32'),
(370, '2024-03-05', 102.22, NULL, NULL, '10:02:32'),
(371, '2024-03-05', 102.98, NULL, NULL, '11:02:32'),
(372, '2024-03-05', 106.40, NULL, NULL, '12:02:32'),
(373, '2024-03-05', 106.75, NULL, NULL, '13:02:32'),
(374, '2024-03-05', 116.67, NULL, NULL, '14:02:32'),
(375, '2024-03-05', 111.57, NULL, NULL, '15:02:32'),
(376, '2024-03-05', 114.58, NULL, NULL, '16:02:32'),
(377, '2024-03-05', 94.03, NULL, NULL, '17:02:32'),
(378, '2024-03-05', 48.98, NULL, NULL, '18:02:32'),
(379, '2024-03-05', 36.53, NULL, NULL, '19:02:32'),
(380, '2024-03-05', 29.77, NULL, NULL, '20:02:32'),
(381, '2024-03-05', 24.50, NULL, NULL, '21:02:32'),
(382, '2024-03-05', 19.48, NULL, NULL, '22:02:31'),
(383, '2024-03-05', 19.14, NULL, NULL, '23:02:31'),
(384, '2024-03-06', 18.87, NULL, NULL, '00:02:31'),
(385, '2024-03-06', 18.72, NULL, NULL, '01:02:31'),
(386, '2024-03-06', 18.69, NULL, NULL, '02:02:31'),
(387, '2024-03-06', 18.90, NULL, NULL, '03:02:31'),
(388, '2024-03-06', 18.96, NULL, NULL, '04:02:31'),
(389, '2024-03-06', 20.43, NULL, NULL, '05:02:31'),
(390, '2024-03-06', 27.57, NULL, NULL, '06:02:31'),
(391, '2024-03-06', 24.38, NULL, NULL, '07:02:31'),
(392, '2024-03-06', 33.69, NULL, NULL, '08:02:31'),
(393, '2024-03-06', 74.88, NULL, NULL, '09:02:31'),
(394, '2024-03-06', 107.58, NULL, NULL, '10:02:31'),
(395, '2024-03-06', 117.28, NULL, NULL, '11:02:30'),
(396, '2024-03-06', 110.28, NULL, NULL, '12:02:30'),
(397, '2024-03-06', 108.92, NULL, NULL, '13:02:30'),
(398, '2024-03-06', 114.53, NULL, NULL, '14:02:30'),
(399, '2024-03-06', 117.67, NULL, NULL, '15:02:30'),
(400, '2024-03-06', 109.80, NULL, NULL, '16:02:30'),
(401, '2024-03-06', 85.45, NULL, NULL, '17:02:30'),
(402, '2024-03-06', 47.69, NULL, NULL, '18:02:30'),
(403, '2024-03-06', 37.39, NULL, NULL, '19:02:30'),
(404, '2024-03-06', 24.84, NULL, NULL, '20:02:30'),
(405, '2024-03-06', 23.23, NULL, NULL, '21:02:30'),
(406, '2024-03-06', 17.82, NULL, NULL, '22:02:30'),
(407, '2024-03-06', 17.13, NULL, NULL, '23:02:29'),
(408, '2024-03-07', 17.37, NULL, NULL, '00:02:29'),
(409, '2024-03-07', 17.20, NULL, NULL, '01:02:29'),
(410, '2024-03-07', 16.87, NULL, NULL, '02:02:29'),
(411, '2024-03-07', 16.76, NULL, NULL, '03:02:29'),
(412, '2024-03-07', 17.03, NULL, NULL, '04:02:29'),
(413, '2024-03-07', 19.27, NULL, NULL, '05:02:29'),
(414, '2024-03-07', 25.42, NULL, NULL, '06:02:29'),
(415, '2024-03-07', 21.58, NULL, NULL, '07:02:29'),
(416, '2024-03-07', 25.97, NULL, NULL, '08:02:29'),
(417, '2024-03-07', 62.67, NULL, NULL, '09:02:29'),
(418, '2024-03-07', 101.14, NULL, NULL, '10:02:29'),
(419, '2024-03-07', 98.06, NULL, NULL, '11:02:29'),
(420, '2024-03-07', 101.11, NULL, NULL, '12:02:28'),
(421, '2024-03-07', 104.86, NULL, NULL, '13:02:28'),
(422, '2024-03-07', 106.25, NULL, NULL, '14:02:28'),
(423, '2024-03-07', 93.16, NULL, NULL, '15:02:28'),
(424, '2024-03-07', 100.62, NULL, NULL, '16:02:28'),
(425, '2024-03-07', 80.95, NULL, NULL, '17:02:28'),
(426, '2024-03-07', 48.70, NULL, NULL, '18:02:28'),
(427, '2024-03-07', 33.07, NULL, NULL, '19:02:28'),
(428, '2024-03-07', 27.37, NULL, NULL, '20:02:28'),
(429, '2024-03-07', 22.52, NULL, NULL, '21:02:28'),
(430, '2024-03-07', 18.38, NULL, NULL, '22:02:28'),
(431, '2024-03-07', 18.11, NULL, NULL, '23:02:28'),
(432, '2024-03-08', 18.00, NULL, NULL, '00:02:28'),
(433, '2024-03-08', 17.95, NULL, NULL, '01:02:27'),
(434, '2024-03-08', 17.93, NULL, NULL, '02:02:27'),
(435, '2024-03-08', 17.93, NULL, NULL, '03:02:27'),
(436, '2024-03-08', 18.02, NULL, NULL, '04:02:27'),
(437, '2024-03-08', 19.18, NULL, NULL, '05:02:27'),
(438, '2024-03-08', 23.66, NULL, NULL, '06:02:27'),
(439, '2024-03-08', 22.98, NULL, NULL, '07:02:27'),
(440, '2024-03-08', 29.57, NULL, NULL, '08:02:27'),
(441, '2024-03-08', 61.87, NULL, NULL, '09:02:27'),
(442, '2024-03-08', 108.28, NULL, NULL, '10:02:27'),
(443, '2024-03-08', 105.99, NULL, NULL, '11:02:27'),
(444, '2024-03-08', 100.08, NULL, NULL, '12:02:27'),
(445, '2024-03-08', 95.31, NULL, NULL, '13:02:27'),
(446, '2024-03-08', 105.14, NULL, NULL, '14:02:26'),
(447, '2024-03-08', 108.62, NULL, NULL, '15:02:26'),
(448, '2024-03-08', 113.85, NULL, NULL, '16:02:26'),
(449, '2024-03-08', 81.81, NULL, NULL, '17:02:26'),
(450, '2024-03-08', 52.58, NULL, NULL, '18:02:08'),
(451, '2024-03-08', 39.94, NULL, NULL, '19:02:08'),
(452, '2024-03-08', 29.68, NULL, NULL, '20:02:08'),
(453, '2024-03-08', 25.31, NULL, NULL, '21:02:08'),
(454, '2024-03-08', 18.68, NULL, NULL, '22:02:08'),
(455, '2024-03-08', 17.99, NULL, NULL, '23:02:08'),
(456, '2024-03-09', 17.77, NULL, NULL, '00:02:08'),
(457, '2024-03-09', 17.82, NULL, NULL, '01:02:08'),
(458, '2024-03-09', 17.55, NULL, NULL, '02:02:08'),
(459, '2024-03-09', 17.73, NULL, NULL, '03:02:08'),
(460, '2024-03-09', 17.77, NULL, NULL, '04:02:08'),
(461, '2024-03-09', 17.65, NULL, NULL, '05:02:08'),
(462, '2024-03-09', 20.44, NULL, NULL, '06:02:08'),
(463, '2024-03-09', 19.98, NULL, NULL, '07:02:07'),
(464, '2024-03-09', 16.68, NULL, NULL, '08:02:07'),
(465, '2024-03-09', 16.22, NULL, NULL, '09:02:07'),
(466, '2024-03-09', 9.72, NULL, NULL, '10:02:07'),
(467, '2024-03-09', 13.45, NULL, NULL, '11:02:07'),
(468, '2024-03-09', 14.15, NULL, NULL, '12:02:07'),
(469, '2024-03-09', 13.29, NULL, NULL, '13:02:07'),
(470, '2024-03-09', 11.13, NULL, NULL, '14:02:07'),
(471, '2024-03-09', 21.52, NULL, NULL, '15:02:07'),
(472, '2024-03-09', 21.76, NULL, NULL, '16:02:07'),
(473, '2024-03-09', 19.41, NULL, NULL, '17:02:07'),
(474, '2024-03-09', 21.46, NULL, NULL, '18:02:07'),
(475, '2024-03-09', 18.91, NULL, NULL, '19:02:07'),
(476, '2024-03-09', 18.16, NULL, NULL, '20:02:06'),
(477, '2024-03-09', 18.07, NULL, NULL, '21:02:06'),
(478, '2024-03-09', 17.76, NULL, NULL, '22:02:06'),
(479, '2024-03-09', 17.84, NULL, NULL, '23:02:06'),
(480, '2024-03-10', 17.64, NULL, NULL, '00:02:06'),
(481, '2024-03-10', 17.78, NULL, NULL, '01:02:06'),
(482, '2024-03-10', 17.77, NULL, NULL, '02:02:06'),
(483, '2024-03-10', 17.68, NULL, NULL, '03:02:06'),
(484, '2024-03-10', 17.68, NULL, NULL, '04:02:06'),
(485, '2024-03-10', 17.07, NULL, NULL, '05:02:06'),
(486, '2024-03-10', 17.02, NULL, NULL, '06:02:06'),
(487, '2024-03-10', 15.04, NULL, NULL, '07:02:06'),
(488, '2024-03-10', 7.93, NULL, NULL, '08:02:06'),
(489, '2024-03-10', 7.96, NULL, NULL, '09:02:05'),
(490, '2024-03-10', 6.28, NULL, NULL, '10:02:05'),
(491, '2024-03-10', 9.43, NULL, NULL, '11:02:05'),
(492, '2024-03-10', 10.38, NULL, NULL, '12:02:05'),
(493, '2024-03-10', 7.62, NULL, NULL, '13:02:05'),
(494, '2024-03-10', 5.79, NULL, NULL, '14:02:05'),
(495, '2024-03-10', 1.62, NULL, NULL, '15:02:05'),
(496, '2024-03-10', 8.74, NULL, NULL, '16:02:05'),
(497, '2024-03-10', 14.93, NULL, NULL, '17:02:05'),
(498, '2024-03-10', 16.67, NULL, NULL, '18:02:05'),
(499, '2024-03-10', 17.50, NULL, NULL, '19:02:05'),
(500, '2024-03-10', 17.45, NULL, NULL, '20:02:05'),
(501, '2024-03-10', 17.51, NULL, NULL, '21:02:05'),
(502, '2024-03-10', 17.78, NULL, NULL, '22:02:04'),
(503, '2024-03-10', 17.55, NULL, NULL, '23:02:04'),
(504, '2024-03-11', 17.34, NULL, NULL, '00:02:04'),
(505, '2024-03-11', 17.78, NULL, NULL, '01:02:04'),
(506, '2024-03-11', 17.78, NULL, NULL, '02:02:04'),
(507, '2024-03-11', 17.02, NULL, NULL, '03:02:04'),
(508, '2024-03-11', 17.08, NULL, NULL, '04:02:04'),
(509, '2024-03-11', 20.47, NULL, NULL, '05:02:04'),
(510, '2024-03-11', 25.27, NULL, NULL, '06:02:04'),
(511, '2024-03-11', 26.54, NULL, NULL, '07:02:04'),
(512, '2024-03-11', 52.26, NULL, NULL, '08:02:04'),
(513, '2024-03-11', 90.51, NULL, NULL, '09:02:04'),
(514, '2024-03-11', 133.36, NULL, NULL, '10:02:04'),
(515, '2024-03-11', 136.87, NULL, NULL, '11:02:03'),
(516, '2024-03-11', 139.38, NULL, NULL, '12:02:03'),
(517, '2024-03-11', 134.39, NULL, NULL, '13:02:03'),
(518, '2024-03-11', 135.89, NULL, NULL, '14:02:03'),
(519, '2024-03-11', 145.37, NULL, NULL, '15:02:03'),
(520, '2024-03-11', 139.03, NULL, NULL, '16:02:03'),
(521, '2024-03-11', 100.83, NULL, NULL, '17:02:03'),
(522, '2024-03-11', 63.40, NULL, NULL, '18:02:03'),
(523, '2024-03-11', 46.42, NULL, NULL, '19:02:03'),
(524, '2024-03-11', 34.58, NULL, NULL, '20:02:03'),
(525, '2024-03-11', 26.01, NULL, NULL, '21:02:03'),
(526, '2024-03-11', 19.05, NULL, NULL, '22:02:03'),
(527, '2024-03-11', 18.53, NULL, NULL, '23:02:03'),
(528, '2024-03-12', 18.35, NULL, NULL, '00:02:02'),
(529, '2024-03-12', 18.43, NULL, NULL, '01:02:02'),
(530, '2024-03-12', 18.38, NULL, NULL, '02:02:02'),
(531, '2024-03-12', 18.30, NULL, NULL, '03:02:02'),
(532, '2024-03-12', 18.27, NULL, NULL, '04:02:02'),
(533, '2024-03-12', 21.10, NULL, NULL, '05:02:02'),
(534, '2024-03-12', 25.82, NULL, NULL, '06:02:02'),
(535, '2024-03-12', 21.63, NULL, NULL, '07:02:02'),
(536, '2024-03-12', 41.97, NULL, NULL, '08:02:02'),
(537, '2024-03-12', 83.18, NULL, NULL, '09:02:02'),
(538, '2024-03-12', 126.47, NULL, NULL, '10:02:02'),
(539, '2024-03-12', 122.46, NULL, NULL, '11:02:02'),
(540, '2024-03-12', 121.78, NULL, NULL, '12:02:02'),
(541, '2024-03-12', 121.59, NULL, NULL, '13:02:01'),
(542, '2024-03-12', 122.05, NULL, NULL, '14:02:01'),
(543, '2024-03-12', 132.07, NULL, NULL, '15:02:01'),
(544, '2024-03-12', 130.30, NULL, NULL, '16:02:01'),
(545, '2024-03-12', 86.15, NULL, NULL, '17:02:01'),
(546, '2024-03-12', 66.76, NULL, NULL, '18:02:01'),
(547, '2024-03-12', 46.52, NULL, NULL, '19:02:01'),
(548, '2024-03-12', 35.38, NULL, NULL, '20:02:01'),
(549, '2024-03-12', 26.54, NULL, NULL, '21:02:01'),
(550, '2024-03-12', 21.83, NULL, NULL, '22:02:01'),
(551, '2024-03-12', 21.13, NULL, NULL, '23:02:01'),
(552, '2024-03-13', 20.18, NULL, NULL, '00:02:02'),
(553, '2024-03-13', 20.88, NULL, NULL, '01:02:02'),
(554, '2024-03-13', 20.74, NULL, NULL, '02:02:02'),
(555, '2024-03-13', 20.44, NULL, NULL, '03:02:02'),
(556, '2024-03-13', 20.31, NULL, NULL, '04:02:02'),
(557, '2024-03-13', 21.82, NULL, NULL, '05:02:02'),
(558, '2024-03-13', 28.13, NULL, NULL, '06:02:02'),
(559, '2024-03-13', 22.59, NULL, NULL, '07:02:02'),
(560, '2024-03-13', 44.77, NULL, NULL, '08:02:02'),
(561, '2024-03-13', 80.97, NULL, NULL, '09:02:02'),
(562, '2024-03-13', 135.68, NULL, NULL, '10:02:02'),
(563, '2024-03-13', 126.68, NULL, NULL, '11:02:02'),
(564, '2024-03-13', 118.13, NULL, NULL, '12:02:02'),
(565, '2024-03-13', 122.27, NULL, NULL, '13:02:01'),
(566, '2024-03-13', 126.01, NULL, NULL, '14:02:01'),
(567, '2024-03-13', 131.39, NULL, NULL, '15:02:01'),
(568, '2024-03-13', 126.78, NULL, NULL, '16:02:01'),
(569, '2024-03-13', 80.60, NULL, NULL, '17:02:01'),
(570, '2024-03-13', 50.39, NULL, NULL, '18:02:01'),
(571, '2024-03-13', 38.34, NULL, NULL, '19:02:01'),
(572, '2024-03-13', 28.44, NULL, NULL, '20:02:01'),
(573, '2024-03-13', 23.10, NULL, NULL, '21:02:01'),
(574, '2024-03-13', 17.90, NULL, NULL, '22:02:01'),
(575, '2024-03-13', 17.77, NULL, NULL, '23:02:01'),
(576, '2024-03-14', 17.70, NULL, NULL, '00:02:02'),
(577, '2024-03-14', 17.47, NULL, NULL, '01:02:02'),
(578, '2024-03-14', 17.88, NULL, NULL, '02:02:02'),
(579, '2024-03-14', 18.11, NULL, NULL, '03:02:02'),
(580, '2024-03-14', 18.12, NULL, NULL, '04:02:02'),
(581, '2024-03-14', 20.02, NULL, NULL, '05:02:02'),
(582, '2024-03-14', 26.06, NULL, NULL, '06:02:02'),
(583, '2024-03-14', 19.32, NULL, NULL, '07:02:02'),
(584, '2024-03-14', 47.93, NULL, NULL, '08:02:02'),
(585, '2024-03-14', 91.22, NULL, NULL, '09:02:02'),
(586, '2024-03-14', 121.75, NULL, NULL, '10:02:02'),
(587, '2024-03-14', 118.07, NULL, NULL, '11:02:02'),
(588, '2024-03-14', 130.41, NULL, NULL, '12:02:02'),
(589, '2024-03-14', 136.98, NULL, NULL, '13:02:01'),
(590, '2024-03-14', 147.88, NULL, NULL, '14:02:01'),
(591, '2024-03-14', 152.83, NULL, NULL, '15:02:01'),
(592, '2024-03-14', 142.12, NULL, NULL, '16:02:01'),
(593, '2024-03-14', 105.90, NULL, NULL, '17:02:01'),
(594, '2024-03-14', 68.65, NULL, NULL, '18:02:01'),
(595, '2024-03-14', 47.23, NULL, NULL, '19:02:01'),
(596, '2024-03-14', 34.67, NULL, NULL, '20:02:01'),
(597, '2024-03-14', 25.97, NULL, NULL, '21:02:01'),
(598, '2024-03-14', 19.41, NULL, NULL, '22:02:01'),
(599, '2024-03-14', 19.62, NULL, NULL, '23:02:01'),
(600, '2024-03-15', 19.07, NULL, NULL, '00:02:02'),
(601, '2024-03-15', 18.90, NULL, NULL, '01:02:02'),
(602, '2024-03-15', 18.98, NULL, NULL, '02:02:02'),
(603, '2024-03-15', 18.93, NULL, NULL, '03:02:02'),
(604, '2024-03-15', 18.90, NULL, NULL, '04:02:02'),
(605, '2024-03-15', 19.57, NULL, NULL, '05:02:02'),
(606, '2024-03-15', 28.73, NULL, NULL, '06:02:02'),
(607, '2024-03-15', 22.45, NULL, NULL, '07:02:02'),
(608, '2024-03-15', 37.20, NULL, NULL, '08:02:02'),
(609, '2024-03-15', 78.52, NULL, NULL, '09:02:02'),
(610, '2024-03-15', 133.38, NULL, NULL, '10:02:02'),
(611, '2024-03-15', 131.69, NULL, NULL, '11:02:02'),
(612, '2024-03-15', 136.22, NULL, NULL, '12:02:02'),
(613, '2024-03-15', 133.96, NULL, NULL, '13:02:01'),
(614, '2024-03-15', 143.27, NULL, NULL, '14:02:01'),
(615, '2024-03-15', 142.52, NULL, NULL, '15:02:01'),
(616, '2024-03-15', 136.03, NULL, NULL, '16:02:01'),
(617, '2024-03-15', 97.74, NULL, NULL, '17:02:01'),
(618, '2024-03-15', 67.12, NULL, NULL, '18:02:01'),
(619, '2024-03-15', 53.10, NULL, NULL, '19:02:01'),
(620, '2024-03-15', 34.84, NULL, NULL, '20:02:01'),
(621, '2024-03-15', 25.39, NULL, NULL, '21:02:01'),
(622, '2024-03-15', 19.50, NULL, NULL, '22:02:01'),
(623, '2024-03-15', 19.18, NULL, NULL, '23:02:01'),
(624, '2024-03-16', 18.74, NULL, NULL, '00:02:02'),
(625, '2024-03-16', 18.49, NULL, NULL, '01:02:02'),
(626, '2024-03-16', 18.69, NULL, NULL, '02:02:02'),
(627, '2024-03-16', 18.40, NULL, NULL, '03:02:02'),
(628, '2024-03-16', 18.41, NULL, NULL, '04:02:02'),
(629, '2024-03-16', 18.02, NULL, NULL, '05:02:02'),
(630, '2024-03-16', 21.65, NULL, NULL, '06:02:02'),
(631, '2024-03-16', 19.65, NULL, NULL, '07:02:02'),
(632, '2024-03-16', 21.54, NULL, NULL, '08:02:02'),
(633, '2024-03-16', 23.52, NULL, NULL, '09:02:02'),
(634, '2024-03-16', 26.84, NULL, NULL, '10:02:02'),
(635, '2024-03-16', 19.99, NULL, NULL, '11:02:02'),
(636, '2024-03-16', 32.81, NULL, NULL, '12:02:02'),
(637, '2024-03-16', 34.35, NULL, NULL, '13:02:01'),
(638, '2024-03-16', 40.46, NULL, NULL, '14:02:01'),
(639, '2024-03-16', 41.28, NULL, NULL, '15:02:01'),
(640, '2024-03-16', 31.15, NULL, NULL, '16:02:01'),
(641, '2024-03-16', 26.94, NULL, NULL, '17:02:01'),
(642, '2024-03-16', 26.77, NULL, NULL, '18:02:01'),
(643, '2024-03-16', 24.62, NULL, NULL, '19:02:01'),
(644, '2024-03-16', 20.61, NULL, NULL, '20:02:01'),
(645, '2024-03-16', 19.71, NULL, NULL, '21:02:01'),
(646, '2024-03-16', 17.95, NULL, NULL, '22:02:01'),
(647, '2024-03-16', 17.77, NULL, NULL, '23:02:01'),
(648, '2024-03-17', 17.96, NULL, NULL, '00:02:02'),
(649, '2024-03-17', 17.71, NULL, NULL, '01:02:02'),
(650, '2024-03-17', 17.61, NULL, NULL, '02:02:02'),
(651, '2024-03-17', 17.07, NULL, NULL, '03:02:02'),
(652, '2024-03-17', 17.24, NULL, NULL, '04:02:02'),
(653, '2024-03-17', 17.15, NULL, NULL, '05:02:02'),
(654, '2024-03-17', 16.37, NULL, NULL, '06:02:02'),
(655, '2024-03-17', 11.40, NULL, NULL, '07:02:02'),
(656, '2024-03-17', 5.60, NULL, NULL, '08:02:02'),
(657, '2024-03-17', 10.77, NULL, NULL, '09:02:02'),
(658, '2024-03-17', 28.52, NULL, NULL, '10:02:02'),
(659, '2024-03-17', 27.21, NULL, NULL, '11:02:02'),
(660, '2024-03-17', 28.00, NULL, NULL, '12:02:02'),
(661, '2024-03-17', 40.08, NULL, NULL, '13:02:01'),
(662, '2024-03-17', 42.79, NULL, NULL, '14:02:01'),
(663, '2024-03-17', 42.79, NULL, NULL, '15:02:01'),
(664, '2024-03-17', 49.77, NULL, NULL, '16:02:01'),
(665, '2024-03-17', 54.77, NULL, NULL, '17:02:01'),
(666, '2024-03-17', 51.54, NULL, NULL, '18:02:01'),
(667, '2024-03-17', 33.52, NULL, NULL, '19:02:01'),
(668, '2024-03-17', 33.27, NULL, NULL, '20:02:01'),
(669, '2024-03-17', 28.78, NULL, NULL, '21:02:01'),
(670, '2024-03-17', 26.61, NULL, NULL, '22:02:01'),
(671, '2024-03-17', 24.56, NULL, NULL, '23:02:01'),
(672, '2024-03-18', 20.72, NULL, NULL, '00:02:02');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `floors`
--

CREATE TABLE `floors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `building_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `floors`
--

INSERT INTO `floors` (`id`, `building_id`, `name`, `created_at`, `updated_at`) VALUES
(13, 9, 'Floor 1', '2024-03-20 00:49:24', '2024-03-20 00:49:24'),
(14, 9, 'Floor 2', '2024-03-20 00:49:24', '2024-03-20 00:49:24'),
(15, 9, 'Floor 3', '2024-03-20 00:49:24', '2024-03-20 00:49:24'),
(16, 9, 'Floor 4', '2024-03-20 00:49:24', '2024-03-20 00:49:24'),
(36, 17, 'Floor 1', '2024-04-02 08:34:09', '2024-04-02 08:34:09'),
(37, 17, 'Floor 2', '2024-04-02 08:34:09', '2024-04-02 08:34:09');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_10_02_111913_create_products_table', 1),
(7, '2023_11_10_063657_create_permission_tables', 1),
(8, '2024_02_19_083605_add_remember_token_to_users_table', 2),
(10, '2024_02_22_062211_create_rooms_table', 4),
(18, '2024_02_22_015422_create_buildings_table', 5),
(19, '2024_02_22_064153_create_rooms_table', 5),
(20, '2024_02_29_085900_create_floors_table', 5),
(21, '2024_02_29_085928_create_devices_table', 5),
(22, '2024_03_12_020704_create_rooms_table', 6),
(23, '2024_03_12_074814_create_devices_table', 7),
(24, '2024_03_12_140347_create_devices_table', 8),
(25, '2024_03_22_092939_create_devices_table', 9),
(26, '2024_03_22_093911_create_devices_table', 10),
(27, '2024_03_22_141138_create_devices_table', 11),
(28, '2024_03_22_142754_create_devices_table', 12),
(29, '2024_04_02_140202_create_devices_table', 13),
(30, '2024_04_02_154939_create_devices_table', 14),
(31, '2024_04_05_141102_create_energymeterconsumption_table', 15),
(32, '2024_04_05_141116_create_energycomputedconsumption_table', 16),
(33, '2024_04_05_145836_create_energy_meter_consumptions_table', 17),
(34, '2024_04_05_145855_create_energy_computed_consumptions_table', 18);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 7),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 4),
(3, 'App\\Models\\User', 3),
(3, 'App\\Models\\User', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('viviyuuuh94@gmail.com', '$2y$10$Vgol1SBdR9teRzubSccHgO3hqS6OAa6Kk6znQPHDaU6tKF0yiZIfq', '2024-03-07 00:23:07');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'create-role', 'web', '2024-02-04 19:02:26', '2024-02-04 19:02:26'),
(2, 'edit-role', 'web', '2024-02-04 19:02:26', '2024-02-04 19:02:26'),
(3, 'delete-role', 'web', '2024-02-04 19:02:26', '2024-02-04 19:02:26'),
(4, 'create-user', 'web', '2024-02-04 19:02:26', '2024-02-04 19:02:26'),
(5, 'edit-user', 'web', '2024-02-04 19:02:26', '2024-02-04 19:02:26'),
(6, 'delete-user', 'web', '2024-02-04 19:02:26', '2024-02-04 19:02:26'),
(7, 'create-product', 'web', '2024-02-04 19:02:26', '2024-02-04 19:02:26'),
(8, 'edit-product', 'web', '2024-02-04 19:02:26', '2024-02-04 19:02:26'),
(9, 'delete-product', 'web', '2024-02-04 19:02:26', '2024-02-04 19:02:26');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'web', '2024-02-04 19:02:26', '2024-02-04 19:02:26'),
(2, 'Admin', 'web', '2024-02-04 19:02:26', '2024-02-04 19:02:26'),
(3, 'Product Manager', 'web', '2024-02-04 19:02:26', '2024-02-04 19:02:26');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(7, 2),
(7, 3),
(8, 2),
(8, 3),
(9, 2),
(9, 3);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `floor_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `floor_id`, `name`, `created_at`, `updated_at`) VALUES
(19, 13, 'Hallway', '2024-04-02 08:41:22', '2024-04-02 08:41:22'),
(20, 13, 'Female CR', '2024-04-02 08:56:34', '2024-04-02 08:56:34'),
(21, 13, 'IT Department', '2024-04-02 08:56:52', '2024-04-02 08:56:52'),
(22, 13, 'IS Department', '2024-04-02 08:57:04', '2024-04-02 08:57:04'),
(23, 13, 'CS Department', '2024-04-02 08:57:17', '2024-04-02 08:57:17'),
(24, 13, 'CA Department', '2024-04-02 08:57:35', '2024-04-02 08:57:35'),
(25, 13, 'Dean\'s Office', '2024-04-02 08:57:56', '2024-04-02 08:57:56'),
(26, 13, 'Dean\'s Office (Ma\'am Beloy\'s Room)', '2024-04-02 09:02:42', '2024-04-02 09:02:42'),
(27, 13, 'Accreditation Room', '2024-04-02 09:04:46', '2024-04-02 09:04:46'),
(28, 13, 'Faculty Lounge', '2024-04-02 09:05:03', '2024-04-02 09:05:03'),
(29, 14, 'Hallway', '2024-04-02 10:01:22', '2024-04-02 10:01:22'),
(30, 14, 'Male CR', '2024-04-02 10:01:36', '2024-04-02 10:01:36'),
(31, 14, 'Database Lab', '2024-04-02 10:02:20', '2024-04-02 10:02:20'),
(32, 14, 'IoT Lab', '2024-04-02 10:17:45', '2024-04-02 10:17:45'),
(33, 14, 'Network Lab', '2024-04-02 10:18:02', '2024-04-02 10:18:02'),
(34, 14, 'Multimedia Lab', '2024-04-02 10:18:28', '2024-04-02 10:18:28'),
(35, 14, 'CS Lab', '2024-04-02 10:18:43', '2024-04-02 10:18:43'),
(36, 14, 'CCS Guidance Satellite Office', '2024-04-02 10:18:52', '2024-04-02 10:18:52'),
(37, 14, 'ICTC (Server Room)', '2024-04-02 10:19:10', '2024-04-02 10:19:10'),
(38, 14, 'ICTC (Office of the Director)', '2024-04-02 10:19:23', '2024-04-02 10:19:23'),
(39, 14, 'ICTC - CFSS', '2024-04-02 10:19:34', '2024-04-02 10:19:34'),
(40, 14, 'ICTC Kitchen', '2024-04-02 10:19:44', '2024-04-02 10:19:44'),
(41, 15, 'Hallway', '2024-04-02 10:20:47', '2024-04-02 10:20:47'),
(42, 15, 'Female CR', '2024-04-02 10:21:05', '2024-04-02 10:21:05'),
(43, 15, 'ICT3A', '2024-04-02 10:21:16', '2024-04-02 10:21:16'),
(44, 15, 'ICT3B', '2024-04-02 10:21:23', '2024-04-02 10:21:23'),
(45, 15, 'ICT3C', '2024-04-02 10:21:32', '2024-04-02 10:21:32'),
(46, 15, 'ICT3D', '2024-04-02 10:21:44', '2024-04-02 10:21:44'),
(47, 15, 'ICT3G', '2024-04-02 10:21:55', '2024-04-02 10:21:55'),
(48, 15, 'ICT3H', '2024-04-02 10:22:03', '2024-04-02 10:22:03'),
(49, 15, 'ICT 3F (Graduate Research Lab)', '2024-04-02 10:22:31', '2024-04-02 10:22:31'),
(50, 15, 'Research Lab', '2024-04-02 10:22:42', '2024-04-02 10:22:42'),
(52, 16, 'Right Wing', '2024-04-02 22:13:10', '2024-04-02 22:13:10'),
(53, 16, 'Left Wing', '2024-04-02 22:13:29', '2024-04-02 22:13:29'),
(54, 37, 'Office', '2024-04-11 04:55:49', '2024-04-11 04:55:49'),
(55, 36, 'Female CR', '2024-04-11 05:01:25', '2024-04-11 05:01:25'),
(56, 36, 'Male CR', '2024-04-11 05:01:38', '2024-04-11 05:01:38'),
(57, 36, 'Kitchen', '2024-04-11 05:01:51', '2024-04-11 05:01:51'),
(58, 36, 'Main Office', '2024-04-11 05:02:01', '2024-04-11 05:02:01'),
(59, 36, 'Meeting Hall', '2024-04-11 05:02:10', '2024-04-11 05:02:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Javed Ur Rehman', 'javed@allphptricks.com', NULL, '$2y$10$wU9VtKIo8syk4rfQvl5HTeIDdx2X7MsGCvSYoUHD/3XKOVh2wHCFm', NULL, '2024-02-04 19:02:26', '2024-02-04 19:02:26'),
(2, 'Syed Ahsan Kamal', 'ahsan@allphptricks.com', NULL, '$2y$10$/YtCf3/YYdBPoc7i7Rjof.hKNB1hG/.vHCT/qsHoK62XE7xjZcL1m', NULL, '2024-02-04 19:02:26', '2024-02-04 19:02:26'),
(3, 'Abdul Muqeet', 'muqeet@allphptricks.com', NULL, '$2y$10$aG1GciFvpvZXGuEcbxf9QOg7t2x3F/YnYXYItoJL9TfwXZqxx43Pq', NULL, '2024-02-04 19:02:26', '2024-02-04 19:02:26'),
(4, 'Admin', 'admin1@gmail.com', NULL, '$2y$10$qyDslDNh6p./E6zM55JRQegiuro89CffmgU/YAU8.nm13w.otgJxG', NULL, '2024-02-04 19:28:58', '2024-04-24 05:58:58'),
(6, 'User', 'babanto@gmail.com', NULL, '$2y$10$T557vaxwcKFHGKy2h1qMsOhScWFq6fd8lXWlOE2Fen5MeRclsNB8m', NULL, '2024-02-07 01:09:00', '2024-02-07 01:09:00'),
(7, 'Super Admin', 'superadmin@gmail.com', NULL, '$2y$10$U4BnAeW4NZjlbA7l8B9z0.fu2gbgOAV0bDEbfU7DYYPNPOLLzvj/W', NULL, '2024-02-21 17:42:56', '2024-04-24 05:58:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buildings`
--
ALTER TABLE `buildings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `devices_room_id_foreign` (`room_id`);

--
-- Indexes for table `energy_computed_consumptions`
--
ALTER TABLE `energy_computed_consumptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `energy_meter_consumptions`
--
ALTER TABLE `energy_meter_consumptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `floors`
--
ALTER TABLE `floors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `floors_building_id_foreign` (`building_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rooms_floor_id_foreign` (`floor_id`);

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
-- AUTO_INCREMENT for table `buildings`
--
ALTER TABLE `buildings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT for table `energy_computed_consumptions`
--
ALTER TABLE `energy_computed_consumptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=841;

--
-- AUTO_INCREMENT for table `energy_meter_consumptions`
--
ALTER TABLE `energy_meter_consumptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=673;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `floors`
--
ALTER TABLE `floors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `devices`
--
ALTER TABLE `devices`
  ADD CONSTRAINT `devices_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `floors`
--
ALTER TABLE `floors`
  ADD CONSTRAINT `floors_building_id_foreign` FOREIGN KEY (`building_id`) REFERENCES `buildings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_floor_id_foreign` FOREIGN KEY (`floor_id`) REFERENCES `floors` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
