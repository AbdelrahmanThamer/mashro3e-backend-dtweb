-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2022 at 04:27 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dtweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `app`
--

CREATE TABLE `app` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `app_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_default` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `app`
--

INSERT INTO `app` (`id`, `app_key`, `app_name`, `app_icon`, `is_default`, `created_at`, `updated_at`) VALUES
(1, 'Ww4eqHKkhpxs3hKK', 'DTWeb', 'images/12568246621658318906.png', '1', '2022-07-20 12:04:04', '2022-07-20 14:24:27');

-- --------------------------------------------------------

--
-- Table structure for table `app_configrations`
--

CREATE TABLE `app_configrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `app_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_screen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `side_drawer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bottom_navigation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `base_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `primary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `primary_dark` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pull_to_refresh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `introduction_screen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `floating_menu_screen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `app_configrations`
--

INSERT INTO `app_configrations` (`id`, `app_id`, `app_name`, `app_logo`, `full_screen`, `side_drawer`, `bottom_navigation`, `base_url`, `primary`, `primary_dark`, `accent`, `pull_to_refresh`, `introduction_screen`, `floating_menu_screen`, `created_at`, `updated_at`) VALUES
(1, 'Ww4eqHKkhpxs3hKK', 'DTWeb', 'images/2789852821658320058.png', '', 'Side Drawer', 'Bottom Navigation', 'https://codecanyon.net/', '#0074e4', '#1d262c', '#ffffff', '1', '1', '1', '2022-07-20 12:04:05', '2022-07-20 12:04:05');

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
-- Table structure for table `floating_menu`
--

CREATE TABLE `floating_menu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `app_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `floating_menu`
--

INSERT INTO `floating_menu` (`id`, `app_id`, `name`, `link`, `status`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Ww4eqHKkhpxs3hKK', 'Home', 'https://codecanyon.net/', '1', 'images/9358614521658318310.png', '2022-07-20 12:04:05', '2022-07-20 14:24:28'),
(2, 'Ww4eqHKkhpxs3hKK', 'Contact Us', 'https://www.divinetechs.com/', '1', 'images/7504989871658318223.png', '2022-07-20 12:04:05', '2022-07-20 14:24:28'),
(3, 'Ww4eqHKkhpxs3hKK', 'About Us', 'https://themeforest.net/', '1', 'images/7621523211658318164.png', '2022-07-20 12:04:05', '2022-07-20 14:24:28'),
(4, 'Ww4eqHKkhpxs3hKK', 'Settings', 'https://www.divinetechs.com/contact-us/', '1', 'images/13460080701658318208.png', '2022-07-20 12:04:05', '2022-07-20 14:24:28'),
(5, 'Ww4eqHKkhpxs3hKK', '', '', '0', '', '2022-07-20 12:04:05', '2022-07-20 14:24:28');

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `app_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `settings_key` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `settings_value` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `app_id`, `settings_key`, `settings_value`, `created_at`, `updated_at`) VALUES
(1, 'Ww4eqHKkhpxs3hKK', 'banner_ad', '1', '2022-07-20 12:04:05', '2022-07-20 14:24:29'),
(2, 'Ww4eqHKkhpxs3hKK', 'interstital_ad', '1', '2022-07-20 12:04:05', '2022-07-20 14:24:29'),
(3, 'Ww4eqHKkhpxs3hKK', 'reward_ad', '1', '2022-07-20 12:04:05', '2022-07-20 14:24:29'),
(4, 'Ww4eqHKkhpxs3hKK', 'banner_adid', '1', '2022-07-20 12:04:05', '2022-07-20 14:25:21'),
(5, 'Ww4eqHKkhpxs3hKK', 'interstital_adid', '1', '2022-07-20 12:04:05', '2022-07-20 14:25:23'),
(6, 'Ww4eqHKkhpxs3hKK', 'reward_adid', '1', '2022-07-20 12:04:05', '2022-07-20 14:25:24'),
(7, 'Ww4eqHKkhpxs3hKK', 'interstital_adclick', '1', '2022-07-20 12:04:05', '2022-07-20 14:24:29'),
(8, 'Ww4eqHKkhpxs3hKK', 'reward_adclick', '1', '2022-07-20 12:04:05', '2022-07-20 14:24:29'),
(9, 'Ww4eqHKkhpxs3hKK', 'ios_banner_ad', '1', '2022-07-20 12:04:05', '2022-07-20 14:24:29'),
(10, 'Ww4eqHKkhpxs3hKK', 'ios_interstital_ad', '1', '2022-07-20 12:04:05', '2022-07-20 14:24:29'),
(11, 'Ww4eqHKkhpxs3hKK', 'ios_reward_ad', '1', '2022-07-20 12:04:05', '2022-07-20 14:24:29'),
(12, 'Ww4eqHKkhpxs3hKK', 'ios_banner_adid', '1', '2022-07-20 12:04:05', '2022-07-20 14:25:26'),
(13, 'Ww4eqHKkhpxs3hKK', 'ios_interstital_adid', '1', '2022-07-20 12:04:05', '2022-07-20 14:25:27'),
(14, 'Ww4eqHKkhpxs3hKK', 'ios_interstital_adclick', '1', '2022-07-20 12:04:05', '2022-07-20 14:24:29'),
(15, 'Ww4eqHKkhpxs3hKK', 'ios_reward_adclick', '1', '2022-07-20 12:04:05', '2022-07-20 14:24:29'),
(16, 'Ww4eqHKkhpxs3hKK', 'ios_reward_adid', '1', '2022-07-20 12:04:05', '2022-07-20 14:25:29');

-- --------------------------------------------------------

--
-- Table structure for table `introducation_screens`
--

CREATE TABLE `introducation_screens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `app_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `introducation_screens`
--

INSERT INTO `introducation_screens` (`id`, `app_id`, `title`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Ww4eqHKkhpxs3hKK', 'Enjoy your shopping', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry`s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', 'images/262884021658319794.png', 1, '2022-07-20 12:04:05', '2022-07-20 12:04:05'),
(2, 'Ww4eqHKkhpxs3hKK', 'Online Learning', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry`s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', 'images/1063654241658319870.png', 1, '2022-07-20 12:04:05', '2022-07-20 12:04:05'),
(3, 'Ww4eqHKkhpxs3hKK', 'Best video app ever!', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry`s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', 'images/8805180571658319833.png', 1, '2022-07-20 12:04:05', '2022-07-20 12:04:05');

-- --------------------------------------------------------

--
-- Table structure for table `login_screens`
--

CREATE TABLE `login_screens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `app_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '255',
  `login_with_mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `login_with_gmail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `login_with_facebook` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `login_screens`
--

INSERT INTO `login_screens` (`id`, `app_id`, `is_login`, `login_with_mobile`, `login_with_gmail`, `login_with_facebook`, `created_at`, `updated_at`) VALUES
(1, 'Ww4eqHKkhpxs3hKK', 'On', 'On', 'On', 'On', '2022-07-20 12:04:05', '2022-07-20 12:04:05');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `app_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `app_id`, `title`, `url`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Ww4eqHKkhpxs3hKK', 'Home', 'https://codecanyon.net/', 'images/9358614521658318310.png', 1, '2022-07-20 12:04:05', '2022-07-20 12:04:05'),
(2, 'Ww4eqHKkhpxs3hKK', 'Contact Us', 'https://www.divinetechs.com/', 'images/7504989871658318223.png', 1, '2022-07-20 12:04:05', '2022-07-20 12:04:05'),
(3, 'Ww4eqHKkhpxs3hKK', 'About Us', 'https://themeforest.net/', 'images/7621523211658318164.png', 1, '2022-07-20 12:04:05', '2022-07-20 12:04:05'),
(4, 'Ww4eqHKkhpxs3hKK', 'Settings', 'https://www.divinetechs.com/contact-us/', 'images/13460080701658318208.png', 1, '2022-07-20 12:04:05', '2022-07-20 12:04:05');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `app_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `app_id`, `title`, `message`, `image`, `url`, `created_at`, `updated_at`) VALUES
(1, 'Ww4eqHKkhpxs3hKK', 'Application launch', 'DTWeb application launch version v1', '', '', '2022-07-20 12:04:05', '2022-07-20 12:04:05');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_02_05_061801_create_app_configrations_table', 1),
(6, '2022_02_05_061832_create_login_screens_table', 1),
(7, '2022_02_05_061903_create_splash_screens_table', 1),
(8, '2022_02_05_061918_create_menus_table', 1),
(9, '2022_02_05_061945_create_introducation_screens_table', 1),
(10, '2022_02_12_103449_alter_table_login_screens_change_login_with_mobile', 1),
(11, '2022_02_12_110320_alter_table_splash_screens_change_required_splash_screen', 1),
(12, '2022_02_12_111012_add_type_to_users', 1),
(13, '2022_04_30_122728_create_messages_table', 1),
(14, '2022_04_30_134244_create_notification_settings_table', 1),
(15, '2022_05_14_092553_create_general_settings_table', 2),
(16, '2022_05_23_071825_create_social_share_table', 2),
(17, '2022_05_23_131628_create_floating_menu_table', 2),
(18, '2022_05_26_072848_create_app_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notification_settings`
--

CREATE TABLE `notification_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `app_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notification_app_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notification_settings`
--

INSERT INTO `notification_settings` (`id`, `app_id`, `notification_app_id`, `app_key`, `created_at`, `updated_at`) VALUES
(1, 'Ww4eqHKkhpxs3hKK', '1', '1', '2022-07-20 12:04:05', '2022-07-20 12:04:05');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `smtp_setting`
--

CREATE TABLE `smtp_setting` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `app_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `protocol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `host` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `port` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `social_share`
--

CREATE TABLE `social_share` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `app_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `splash_screens`
--

CREATE TABLE `splash_screens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `app_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required_splash_screen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `splash_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `splash_image_or_color` tinyint(4) NOT NULL COMMENT '1=Image,2=Color',
  `splash_background` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `splash_screens`
--

INSERT INTO `splash_screens` (`id`, `app_id`, `required_splash_screen`, `title`, `title_color`, `splash_logo`, `splash_image_or_color`, `splash_background`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Ww4eqHKkhpxs3hKK', '1', 'DTWeb', '#0074e4', 'images/10538683541658318559.png', 1, 'images/7151113931658318559.png', '1', '2022-07-20 12:04:05', '2022-07-20 12:04:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `app_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '1- Mobile, 2- Facebook, 3- Gmail, 4- Apple',
  `role` int(11) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `app_id`, `username`, `email`, `mobile`, `type`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '0', '2', 'admin@admin.com', '1234567890', NULL, 1, NULL, '$2y$10$TiPWXGHgw0txVkj07fY5DOy1Dde1uTgA0W9OZhzKiIue.UNJXC6.q', NULL, '2022-07-20 05:15:32', '2022-07-20 05:15:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app`
--
ALTER TABLE `app`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `app_app_key_unique` (`app_key`);

--
-- Indexes for table `app_configrations`
--
ALTER TABLE `app_configrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `floating_menu`
--
ALTER TABLE `floating_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `introducation_screens`
--
ALTER TABLE `introducation_screens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_screens`
--
ALTER TABLE `login_screens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification_settings`
--
ALTER TABLE `notification_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `smtp_setting`
--
ALTER TABLE `smtp_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_share`
--
ALTER TABLE `social_share`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `splash_screens`
--
ALTER TABLE `splash_screens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `app`
--
ALTER TABLE `app`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `app_configrations`
--
ALTER TABLE `app_configrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `floating_menu`
--
ALTER TABLE `floating_menu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `introducation_screens`
--
ALTER TABLE `introducation_screens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login_screens`
--
ALTER TABLE `login_screens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `notification_settings`
--
ALTER TABLE `notification_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `smtp_setting`
--
ALTER TABLE `smtp_setting`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `social_share`
--
ALTER TABLE `social_share`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `splash_screens`
--
ALTER TABLE `splash_screens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
