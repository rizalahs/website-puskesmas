-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 26, 2025 at 04:43 AM
-- Server version: 8.2.0
-- PHP Version: 8.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `single_event_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `accommodations`
--

CREATE TABLE `accommodations` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accommodations`
--

INSERT INTO `accommodations` (`id`, `name`, `description`, `photo`, `address`, `email`, `phone`, `website`, `created_at`, `updated_at`) VALUES
(1, 'North Block Hotel', 'North Block Hotel Yountville, California, United States ratings, photos, prices, expert advice, traveler reviews and tips, and more information from Condé Nast Traveler.', 'accommodation_1736826028.jpg', '6757 Washington St., Yountville, California 94599, United States', 'contact@northblock.hotel', '(707) 944-8080', 'https://northblock.hotel/', '2025-01-13 20:30:53', '2025-01-13 21:40:49'),
(2, 'The Pearl Hotel', 'Lifted straight out of our Emerald Coast beach town dreams.', 'accommodation_1736826081.jpg', '63 Main St., Rosemary Beach, Florida 32461, United States', 'contact@thepearl.hotel', '(850) 588-2881', 'https://thepearl.hotel/', '2025-01-13 21:41:21', '2025-01-13 21:41:21');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `photo`, `password`, `token`, `created_at`, `updated_at`) VALUES
(1, 'Morshedul Arefin', 'admin@gmail.com', 'admin_1717493029.jpg', '$2y$12$I2/lLC6jmIfpQ7P0UkkeS.BINvTlik66YGNa76bkz0Zs.N1/FKfEm', '', '2024-06-04 01:49:48', '2024-06-04 03:23:49');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_page_items`
--

CREATE TABLE `contact_page_items` (
  `id` bigint UNSIGNED NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `phone` text COLLATE utf8mb4_unicode_ci,
  `email` text COLLATE utf8mb4_unicode_ci,
  `map` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_page_items`
--

INSERT INTO `contact_page_items` (`id`, `address`, `phone`, `email`, `map`, `created_at`, `updated_at`) VALUES
(1, '43, Park Street, NYC, USA', '234-423-1266', 'contact@example.com', '<iframe style=\"height:500px;\" src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d117658.93068361234!2d89.4498633485917!3d22.845349749389367!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ff9071cb47152f%3A0xf04b212290718952!2z4KaW4KeB4Kay4Kao4Ka-!5e0!3m2!1sbn!2sbd!4v1737621644433!5m2!1sbn!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', NULL, '2025-01-23 03:39:12');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(1, 'How do I register for an event or conference on your website?', '<p><span id=\"line117\">To register for an event or conference, simply navigate to the event\'s page and click the \"Register\" button. Fill out the required information and complete the payment process, if applicable. You will receive a confirmation email with your registration details.</span></p>', '2025-01-14 00:34:40', '2025-01-14 00:34:40'),
(2, 'Can I get a refund if I am unable to attend an event?', '<p><span id=\"line132\">Refund policies vary depending on the event. Please refer to the specific event page for details on refunds and cancellations. If you have any questions or need assistance, you can contact our support team through the \"Contact Us\" page.</span></p>', '2025-01-14 00:35:09', '2025-01-14 00:35:09'),
(3, 'How can I become a sponsor for an event?', '<p><span id=\"line148\">To become a sponsor, visit our \"Sponsorship Opportunities\" page where you will find detailed information on sponsorship packages and benefits. Fill out the sponsorship application form, and our team will get in touch with you to discuss further steps and how we can collaborate.</span></p>', '2025-01-14 00:35:29', '2025-01-14 00:35:29');

-- --------------------------------------------------------

--
-- Table structure for table `home_banners`
--

CREATE TABLE `home_banners` (
  `id` bigint UNSIGNED NOT NULL,
  `heading` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subheading` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci,
  `background` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_banners`
--

INSERT INTO `home_banners` (`id`, `heading`, `subheading`, `text`, `background`, `event_date`, `event_time`, `created_at`, `updated_at`) VALUES
(1, 'Event and Conference Website', 'September 20-24, 2024, California', 'Join us at our next networking event and conference! Connect with industry professionals, engage in insightful discussions, and attend hands-on workshops. Learn from experts, collaborate on innovative ideas, and build lasting relationships.', 'home_banner_1723539103.jpg', '02/10/2025', '10:20:00', '2024-08-13 00:20:02', '2025-01-11 22:36:44');

-- --------------------------------------------------------

--
-- Table structure for table `home_blogs`
--

CREATE TABLE `home_blogs` (
  `id` bigint UNSIGNED NOT NULL,
  `heading` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `how_many` int NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_blogs`
--

INSERT INTO `home_blogs` (`id`, `heading`, `description`, `how_many`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Latest News', 'All the latest news and updates about our event and conference are available here. Stay informed and don\'t miss any important information!', 3, 'Show', NULL, '2025-01-23 00:57:11');

-- --------------------------------------------------------

--
-- Table structure for table `home_counters`
--

CREATE TABLE `home_counters` (
  `id` bigint UNSIGNED NOT NULL,
  `item1_icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item1_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item1_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item2_icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item2_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item2_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item3_icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item3_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item3_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item4_icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item4_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item4_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `background` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_counters`
--

INSERT INTO `home_counters` (`id`, `item1_icon`, `item1_number`, `item1_title`, `item2_icon`, `item2_number`, `item2_title`, `item3_icon`, `item3_number`, `item3_title`, `item4_icon`, `item4_number`, `item4_title`, `background`, `status`, `created_at`, `updated_at`) VALUES
(1, 'fa fa-calendar', '7', 'Days', 'fa fa-user', '20', 'Speakers', 'fa fa-users', '50', 'Attendees', 'fa fa-th-list', '15', 'Sponsors', 'home_counter_1724045539.jpg', 'Show', '2024-08-18 23:09:02', '2024-08-18 23:32:19');

-- --------------------------------------------------------

--
-- Table structure for table `home_pricings`
--

CREATE TABLE `home_pricings` (
  `id` bigint UNSIGNED NOT NULL,
  `heading` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `how_many` int NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_pricings`
--

INSERT INTO `home_pricings` (`id`, `heading`, `description`, `how_many`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Pricing', 'You will find below the different pricing options for our event. Choose the one that suits you best and register now! You will have access to all sessions, unlimited coffee and food, and the opportunity to meet with your favorite speakers.', 3, 'Show', NULL, '2025-01-23 00:38:21');

-- --------------------------------------------------------

--
-- Table structure for table `home_speakers`
--

CREATE TABLE `home_speakers` (
  `id` bigint UNSIGNED NOT NULL,
  `heading` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `how_many` int NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_speakers`
--

INSERT INTO `home_speakers` (`id`, `heading`, `description`, `how_many`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Speakers', 'You will find below the list of our valuable speakers. They are all experts in their field and will share their knowledge with you.', 4, 'Show', NULL, '2025-01-23 00:07:48');

-- --------------------------------------------------------

--
-- Table structure for table `home_sponsors`
--

CREATE TABLE `home_sponsors` (
  `id` bigint UNSIGNED NOT NULL,
  `heading` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `how_many` int NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_sponsors`
--

INSERT INTO `home_sponsors` (`id`, `heading`, `description`, `how_many`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Our Sponsors', 'If you want to become a sponsor, please contact us. We offer different sponsorship packages that will help you promote your brand and reach a wider audience.', 5, 'Show', NULL, '2025-01-23 00:58:48');

-- --------------------------------------------------------

--
-- Table structure for table `home_welcomes`
--

CREATE TABLE `home_welcomes` (
  `id` bigint UNSIGNED NOT NULL,
  `heading` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `button_text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_welcomes`
--

INSERT INTO `home_welcomes` (`id`, `heading`, `description`, `photo`, `button_text`, `button_link`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Welcome To Our Website', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s stan when an unknown printer took a galley of type and scramble. Lorem Ipsum is simply dummy text of the printing and typesetting industry.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s stan when an unknown printer took a galley of type and scramble. Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'home_welcome_1723550451.jpg', 'Read More', '#', 'Show', '2024-08-13 05:51:56', '2024-08-13 06:19:46');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `admin_id` int DEFAULT '0',
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `admin_id`, `message`, `created_at`, `updated_at`) VALUES
(2, 1, 0, 'Hello, please tell me when you are free?', '2025-01-22 21:41:38', '2025-01-22 21:41:38'),
(3, 1, 1, 'You can call me at night time.', '2025-01-22 21:41:38', '2025-01-22 21:41:38'),
(4, 1, 0, 'Thank you for your reply.', '2025-01-22 22:17:02', '2025-01-22 22:17:02'),
(5, 2, 0, 'Hello, are you there?', '2025-01-22 22:34:31', '2025-01-22 22:34:31'),
(7, 1, 1, 'Welcome', '2025-01-22 22:51:29', '2025-01-22 22:51:29'),
(8, 1, 1, 'You are most welcome. Call me any time.', '2025-01-22 22:54:16', '2025-01-22 22:54:16'),
(9, 1, 0, 'Wow! You are answering very fast. I love it.', '2025-01-22 22:56:37', '2025-01-22 22:56:37'),
(10, 2, 0, 'Please reply me. I am waiting.', '2025-01-22 22:57:36', '2025-01-22 22:57:36');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_06_03_094105_create_admins_table', 1),
(5, '2024_08_13_060653_create_home_banners_table', 2),
(7, '2024_08_13_114831_create_home_welcomes_table', 3),
(8, '2024_08_19_050433_create_home_counters_table', 4),
(9, '2024_08_19_060211_create_speakers_table', 5),
(10, '2024_08_19_102601_create_schedule_days_table', 6),
(11, '2024_08_19_110337_create_schedules_table', 7),
(12, '2024_12_09_091810_create_schedule_speaker_table', 8),
(13, '2025_01_12_064732_create_sponsor_categories_table', 9),
(14, '2025_01_12_111952_create_sponsors_table', 10),
(15, '2025_01_13_174218_create_organisers_table', 11),
(16, '2025_01_14_021449_create_accommodations_table', 12),
(17, '2025_01_14_041026_create_photos_table', 13),
(18, '2025_01_14_050215_create_videos_table', 14),
(19, '2025_01_14_062857_create_faqs_table', 15),
(20, '2025_01_14_082635_create_testimonials_table', 16),
(21, '2025_01_15_021524_create_posts_table', 17),
(22, '2025_01_15_130503_create_packages_table', 18),
(23, '2025_01_16_113334_create_package_facilities_table', 19),
(24, '2025_01_18_020735_create_tickets_table', 20),
(27, '2025_01_23_031702_create_messages_table', 21),
(29, '2025_01_23_055435_create_home_speakers_table', 22),
(30, '2025_01_23_063110_create_home_pricings_table', 23),
(31, '2025_01_23_064648_create_home_blogs_table', 24),
(32, '2025_01_23_064656_create_home_sponsors_table', 24),
(33, '2025_01_23_084744_create_contact_page_items_table', 25),
(35, '2025_01_23_104815_create_term_page_items_table', 26),
(36, '2025_01_23_110337_create_privacy_page_items_table', 27),
(37, '2025_01_23_112009_create_subscribers_table', 28),
(38, '2025_01_24_062748_create_settings_table', 29);

-- --------------------------------------------------------

--
-- Table structure for table `organisers`
--

CREATE TABLE `organisers` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `biography` text COLLATE utf8mb4_unicode_ci,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `organisers`
--

INSERT INTO `organisers` (`id`, `name`, `slug`, `designation`, `photo`, `email`, `phone`, `biography`, `address`, `facebook`, `twitter`, `linkedin`, `instagram`, `created_at`, `updated_at`) VALUES
(1, 'Joseph Lynch', 'joseph-lynch', 'Web Developer, Hugh Woods', 'organiser_1736790907.jpg', 'contact@example.com', '123-322-1248', 'Joseph Lynch is a seasoned web developer with over a decade of experience in the tech industry. Specializing in front-end and back-end development, Joseph has honed his skills in languages such as HTML, CSS, JavaScript, and PHP, alongside a deep proficiency in frameworks like Laravel and React. His portfolio boasts a diverse array of projects, from sleek, responsive websites for small businesses to complex web applications for large corporations.\r\n\r\nBeyond his technical prowess, Joseph is known for his excellent communication and project management abilities. He has a knack for understanding client needs and translating them into functional, aesthetically pleasing digital experiences. Whether working as part of a team or independently, Joseph approaches each project with a meticulous attention to detail and a passion for innovation.', '43, Park Street, NYC, USA', '#', '#', '#', '#', '2025-01-13 11:55:07', '2025-01-13 11:55:07'),
(2, 'John Sword', 'john-sword', 'Web Designer', 'organiser_1736790965.jpg', 'john@gmail.com', '111-222-3333', 'Joseph Lynch is a seasoned web developer with over a decade of experience in the tech industry. Specializing in front-end and back-end development, Joseph has honed his skills in languages such as HTML, CSS, JavaScript, and PHP, alongside a deep proficiency in frameworks like Laravel and React. His portfolio boasts a diverse array of projects, from sleek, responsive websites for small businesses to complex web applications for large corporations.\r\n\r\nBeyond his technical prowess, Joseph is known for his excellent communication and project management abilities. He has a knack for understanding client needs and translating them into functional, aesthetically pleasing digital experiences. Whether working as part of a team or independently, Joseph approaches each project with a meticulous attention to detail and a passion for innovation.', '43, Park Street, NYC, USA', '#', '#', '#', '#', '2025-01-13 11:56:05', '2025-01-13 11:56:05'),
(3, 'Steven Gragg', 'steven-gragg', 'Graphic Designer', 'organiser_1736791051.jpg', 'steven@gmail.com', '111-222-1212', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '43, Park Street, NYC, USA', '#', '#', '#', '#', '2025-01-13 11:57:31', '2025-01-13 11:57:31'),
(4, 'Jordan Parker', 'jordan', 'SEO Expert', 'organiser_1736791094.jpg', 'jordan@gmail.com', '111-111-1111', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '43, Park Street, NYC, USA', '#', '#', '#', '#', '2025-01-13 11:58:14', '2025-01-13 11:58:14');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `maximum_tickets` int NOT NULL,
  `item_order` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `price`, `maximum_tickets`, `item_order`, `created_at`, `updated_at`) VALUES
(1, 'Standard', 9, 30, 1, '2025-01-15 17:31:49', '2025-01-16 22:34:40'),
(2, 'Gold', 29, 5, 2, '2025-01-15 17:32:18', '2025-01-25 20:40:46'),
(3, 'Premium', 49, 10, 3, '2025-01-15 17:32:35', '2025-01-15 17:32:35');

-- --------------------------------------------------------

--
-- Table structure for table `package_facilities`
--

CREATE TABLE `package_facilities` (
  `id` bigint UNSIGNED NOT NULL,
  `package_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_order` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_facilities`
--

INSERT INTO `package_facilities` (`id`, `package_id`, `name`, `status`, `item_order`, `created_at`, `updated_at`) VALUES
(11, 1, 'Access to all sessions', 'Yes', 1, '2025-01-16 22:34:40', '2025-01-16 23:16:00'),
(12, 1, 'Unlimited Drinks & Coffee', 'Yes', 2, '2025-01-16 22:34:40', '2025-01-16 23:15:54'),
(13, 1, 'Lunch Facility', 'No', 3, '2025-01-16 22:34:40', '2025-01-16 22:34:40'),
(14, 1, 'Meet with Speakers', 'No', 4, '2025-01-16 22:34:40', '2025-01-16 22:34:40'),
(15, 2, 'Access to all sessions', 'Yes', 1, '2025-01-16 22:35:35', '2025-01-16 23:13:52'),
(16, 2, 'Unlimited Drinks & Coffee', 'Yes', 2, '2025-01-16 22:35:35', '2025-01-16 22:35:35'),
(17, 2, 'Lunch Facility', 'Yes', 3, '2025-01-16 22:35:35', '2025-01-16 22:35:35'),
(18, 2, 'Meet with Speakers', 'No', 4, '2025-01-16 22:35:35', '2025-01-16 22:35:35'),
(19, 3, 'Access to all sessions', 'Yes', 1, '2025-01-16 22:36:09', '2025-01-16 23:13:56'),
(20, 3, 'Unlimited Drinks & Coffee', 'Yes', 2, '2025-01-16 22:36:09', '2025-01-16 22:36:09'),
(21, 3, 'Lunch Facility', 'Yes', 3, '2025-01-16 22:36:09', '2025-01-16 22:36:09'),
(22, 3, 'Meet with Speakers', 'Yes', 4, '2025-01-16 22:36:09', '2025-01-16 22:36:09');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` bigint UNSIGNED NOT NULL,
  `caption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `caption`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Caption 1', 'photo_1736828271.jpg', '2025-01-13 22:17:51', '2025-01-13 22:17:51'),
(2, 'Caption 2', 'photo_1736828288.jpg', '2025-01-13 22:18:08', '2025-01-13 22:18:08'),
(3, 'Caption 3', 'photo_1736828298.jpg', '2025-01-13 22:18:18', '2025-01-13 22:18:18'),
(6, 'Caption 4', 'photo_1736829144.jpg', '2025-01-13 22:32:24', '2025-01-13 22:32:24'),
(7, 'Caption 5', 'photo_1736829154.jpg', '2025-01-13 22:32:34', '2025-01-13 22:32:34'),
(8, 'Caption 6', 'photo_1736829162.jpg', '2025-01-13 22:32:42', '2025-01-13 22:32:42');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `short_description`, `description`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Essential Tips for a Successful Virtual Conference', 'essential-tips-successful-virtual-conference', 'Organizing a virtual conference can be challenging. Focus on engaging content, interactive sessions, & reliable technology to ensure a successful event.', '<div class=\"post-details awt-track\">\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse feugiat fringilla odio vel gravida. Phasellus nisl nisl, vestibulum at blandit quis, tincidunt sed est. Nulla ligula odio, imperdiet a accumsan ut, mattis nec mi. Donec hendrerit magna posuere nisl viverra rhoncus. Quisque laoreet urna nunc, a efficitur lorem auctor ac. Suspendisse vel pulvinar orci. Nunc tincidunt quam vitae orci feugiat venenatis. Morbi in ullamcorper eros. Aenean ut lorem nisi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ultrices feugiat metus, in finibus urna. Donec vel velit pulvinar, tincidunt libero facilisis, commodo nisl.</p>\r\n<p>Vestibulum pretium elit erat, eget euismod odio commodo euismod. Curabitur euismod risus turpis, vitae consectetur arcu accumsan at. Donec sit amet ligula feugiat, congue lectus ut, eleifend risus. Aenean odio purus, convallis eu ipsum sit amet, ornare condimentum mauris. Morbi a purus et nibh sollicitudin euismod. Nullam scelerisque dolor volutpat quam pharetra interdum. Suspendisse arcu odio, pretium a eros sit amet, scelerisque mollis odio. Ut vestibulum mauris a nulla dignissim fermentum. Aliquam diam massa, elementum blandit eleifend semper, ultrices vel libero. Mauris bibendum et enim in lobortis. Curabitur nec consequat purus. Donec eros turpis, pulvinar vitae luctus nec, venenatis sed felis.</p>\r\n</div>\r\n<p>&nbsp;</p>', 'post_1736907962.jpg', '2025-01-14 20:26:02', '2025-01-14 20:26:02'),
(2, 'Maximizing Your Networking Opportunities at Events', 'maximizing-networking-opportunities', 'Networking at events requires strategic planning. Attend relevant sessions, participate in discussions, and utilize apps to connect with professionals.', '<div class=\"post-details awt-track\">\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse feugiat fringilla odio vel gravida. Phasellus nisl nisl, vestibulum at blandit quis, tincidunt sed est. Nulla ligula odio, imperdiet a accumsan ut, mattis nec mi. Donec hendrerit magna posuere nisl viverra rhoncus. Quisque laoreet urna nunc, a efficitur lorem auctor ac. Suspendisse vel pulvinar orci. Nunc tincidunt quam vitae orci feugiat venenatis. Morbi in ullamcorper eros. Aenean ut lorem nisi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ultrices feugiat metus, in finibus urna. Donec vel velit pulvinar, tincidunt libero facilisis, commodo nisl.</p>\r\n<p>Vestibulum pretium elit erat, eget euismod odio commodo euismod. Curabitur euismod risus turpis, vitae consectetur arcu accumsan at. Donec sit amet ligula feugiat, congue lectus ut, eleifend risus. Aenean odio purus, convallis eu ipsum sit amet, ornare condimentum mauris. Morbi a purus et nibh sollicitudin euismod. Nullam scelerisque dolor volutpat quam pharetra interdum. Suspendisse arcu odio, pretium a eros sit amet, scelerisque mollis odio. Ut vestibulum mauris a nulla dignissim fermentum. Aliquam diam massa, elementum blandit eleifend semper, ultrices vel libero. Mauris bibendum et enim in lobortis. Curabitur nec consequat purus. Donec eros turpis, pulvinar vitae luctus nec, venenatis sed felis.</p>\r\n</div>\r\n<p>&nbsp;</p>', 'post_1736908017.jpg', '2025-01-14 20:26:57', '2025-01-14 20:26:57'),
(3, 'How to Choose the Perfect Venue for Your Conference', 'choose-perfect-venue-conference', 'Selecting the ideal venue involves considering location, capacity, and amenities. Ensure it aligns with your goals, and fits within your budget.', '<div class=\"post-details awt-track\">\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse feugiat fringilla odio vel gravida. Phasellus nisl nisl, vestibulum at blandit quis, tincidunt sed est. Nulla ligula odio, imperdiet a accumsan ut, mattis nec mi. Donec hendrerit magna posuere nisl viverra rhoncus. Quisque laoreet urna nunc, a efficitur lorem auctor ac. Suspendisse vel pulvinar orci. Nunc tincidunt quam vitae orci feugiat venenatis. Morbi in ullamcorper eros. Aenean ut lorem nisi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ultrices feugiat metus, in finibus urna. Donec vel velit pulvinar, tincidunt libero facilisis, commodo nisl.</p>\r\n<p>Vestibulum pretium elit erat, eget euismod odio commodo euismod. Curabitur euismod risus turpis, vitae consectetur arcu accumsan at. Donec sit amet ligula feugiat, congue lectus ut, eleifend risus. Aenean odio purus, convallis eu ipsum sit amet, ornare condimentum mauris. Morbi a purus et nibh sollicitudin euismod. Nullam scelerisque dolor volutpat quam pharetra interdum. Suspendisse arcu odio, pretium a eros sit amet, scelerisque mollis odio. Ut vestibulum mauris a nulla dignissim fermentum. Aliquam diam massa, elementum blandit eleifend semper, ultrices vel libero. Mauris bibendum et enim in lobortis. Curabitur nec consequat purus. Donec eros turpis, pulvinar vitae luctus nec, venenatis sed felis.</p>\r\n</div>\r\n<p>&nbsp;</p>', 'post_1736908060.jpg', '2025-01-14 20:27:40', '2025-01-14 20:27:40');

-- --------------------------------------------------------

--
-- Table structure for table `privacy_page_items`
--

CREATE TABLE `privacy_page_items` (
  `id` bigint UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `privacy_page_items`
--

INSERT INTO `privacy_page_items` (`id`, `content`, `created_at`, `updated_at`) VALUES
(1, '<div class=\"black-page pt_50 pb_50 gray\">\r\n<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"col-lg-12 col-md-12\">\r\n<h1>Heading 1</h1>\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic similique voluptas debitis animi ducimus veritatis totam minima doloremque, ratione incidunt unde excepturi necessitatibus! Laborum tempore architecto voluptate, quos vero totam.</p>\r\n<h2>Heading 2</h2>\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic similique voluptas debitis animi ducimus veritatis totam minima doloremque, ratione incidunt unde excepturi necessitatibus! Laborum tempore architecto voluptate, quos vero totam.</p>\r\n<h3>Heading 3</h3>\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic similique voluptas debitis animi ducimus veritatis totam minima doloremque, ratione incidunt unde excepturi necessitatibus! Laborum tempore architecto voluptate, quos vero totam.</p>\r\n<h4>Heading 4</h4>\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic similique voluptas debitis animi ducimus veritatis totam minima doloremque, ratione incidunt unde excepturi necessitatibus! Laborum tempore architecto voluptate, quos vero totam.</p>\r\n<h5>Heading 5</h5>\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic similique voluptas debitis animi ducimus veritatis totam minima doloremque, ratione incidunt unde excepturi necessitatibus! Laborum tempore architecto voluptate, quos vero totam.</p>\r\n<h6>Heading 6</h6>\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic similique voluptas debitis animi ducimus veritatis totam minima doloremque, ratione incidunt unde excepturi necessitatibus! Laborum tempore architecto voluptate, quos vero totam.</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', NULL, '2025-01-23 05:07:13');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint UNSIGNED NOT NULL,
  `schedule_day_id` bigint NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_order` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `schedule_day_id`, `name`, `title`, `description`, `location`, `time`, `photo`, `item_order`, `created_at`, `updated_at`) VALUES
(1, 1, 'Session 1', 'Introduction to PHP and Laravel', 'Join our experts, John Smith and Pat Flynn, as they guide you through the fundamentals of PHP and how it integrates with Laravel to build robust web applications. Perfect for beginners and those looking to enhance their web development skills.', 'Tim Center (3rd Floor), 34, Park Street, NYC, USA', '09:00 AM - 09:45 AM', 'schedule_1724066515.jpg', 1, '2024-08-19 05:21:55', '2024-08-19 07:43:03'),
(2, 1, 'Session 2', 'Advanced SEO Technique', 'Discover advanced SEO strategies with Robin Hood, a seasoned SEO expert, to improve your website\'s visibility and ranking on search engines. This session is ideal for professionals looking to stay ahead in the competitive digital landscape.', 'Tim Center (3rd Floor), 34, Park Street, NYC, USA', '10:00 AM - 10:30 AM', 'schedule_1724066730.jpg', 2, '2024-08-19 05:25:30', '2024-08-19 05:25:30'),
(3, 2, 'Session 1', 'Introduction to Artificial Intelligence', 'Dive into the world of AI with Dr. Paul Smith, a leading researcher in the field. This session will cover the basics of artificial intelligence, its applications, and the future potential of AI technologies.', 'Rokman Hall (5th Floor), 76 Park Street, NYC, USA', '10:00 AM - 10:45 AM', 'schedule_1724066787.jpg', 1, '2024-08-19 05:26:27', '2024-08-19 05:26:27'),
(4, 2, 'Session 2', 'Machine Learning for Beginners', 'Join Alex Johnson, a machine learning expert, as he simplifies the concepts of machine learning. This session is perfect for those new to the field, providing an overview of algorithms, models, and real-world applications.', 'Rokman Hall (5th Floor), 76 Park Street, NYC, USA', '11:00 AM - 11:30 AM', 'schedule_1724066849.jpg', 2, '2024-08-19 05:27:29', '2024-08-19 05:27:29');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_days`
--

CREATE TABLE `schedule_days` (
  `id` bigint UNSIGNED NOT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedule_days`
--

INSERT INTO `schedule_days` (`id`, `day`, `date1`, `order1`, `created_at`, `updated_at`) VALUES
(1, 'Day 1', 'Sep 20, 2024', '1', '2024-08-19 04:37:55', '2024-08-19 04:47:14'),
(2, 'Day 2', 'Sep 21, 2024', '2', '2024-08-19 04:38:49', '2024-08-19 04:38:49');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_speaker`
--

CREATE TABLE `schedule_speaker` (
  `id` bigint UNSIGNED NOT NULL,
  `schedule_id` bigint UNSIGNED NOT NULL,
  `speaker_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedule_speaker`
--

INSERT INTO `schedule_speaker` (`id`, `schedule_id`, `speaker_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, NULL, NULL),
(3, 1, 3, NULL, NULL),
(5, 3, 4, NULL, NULL),
(6, 4, 3, NULL, NULL),
(9, 2, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('2PEMYFhlay5J6CSZgpIrSfQPvXoWOXI7u9d0sOQD', 1, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:134.0) Gecko/20100101 Firefox/134.0', 'YToxOTp7czo2OiJfdG9rZW4iO3M6NDA6IlJPU2w3aUhuazdJeDJrNUNyTkRnQUhQNGlSZGhKT2g1OHA2M3ZuVHIiO3M6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjIxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUyOiJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjEwOiJwYWNrYWdlX2lkIjtzOjE6IjIiO3M6MTI6InBhY2thZ2VfbmFtZSI7czo0OiJHb2xkIjtzOjg6InF1YW50aXR5IjtzOjE6IjQiO3M6MTA6InVuaXRfcHJpY2UiO3M6MjoiMjkiO3M6NToicHJpY2UiO2k6MTE2O3M6MTI6ImJpbGxpbmdfbmFtZSI7czoxMjoiR3JhaGFtIFNtaXRoIjtzOjEzOiJiaWxsaW5nX2VtYWlsIjtzOjE1OiJzbWl0aEBnbWFpbC5jb20iO3M6MTM6ImJpbGxpbmdfcGhvbmUiO3M6MTI6IjEyMy0zMzMtMjIzMiI7czoxNToiYmlsbGluZ19hZGRyZXNzIjtzOjE0OiIyMyBTdHJlZXQgUm9hZCI7czoxNToiYmlsbGluZ19jb3VudHJ5IjtzOjM6IlVTQSI7czoxMzoiYmlsbGluZ19zdGF0ZSI7czozOiJOWUMiO3M6MTI6ImJpbGxpbmdfY2l0eSI7czozOiJOWUMiO3M6MTE6ImJpbGxpbmdfemlwIjtzOjU6IjgyMzQyIjtzOjEyOiJiaWxsaW5nX25vdGUiO047fQ==', 1737859568),
('chWGMB9A2fAPOKvI7x74XCIMtUfU4fOLwqvxL6Lg', 1, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:134.0) Gecko/20100101 Firefox/134.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiODV6clpqUHl5WDRDamlEa0F4dXVQMVFxaFJpbGRBa3VtNnhXUGlSayI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hdHRlbmRlZS9idXkvdGlja2V0LzEiO31zOjUyOiJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1737811855),
('mxHS4Nh8xpDPvFAWeaJzj14DgyXU8BoyivyLoffF', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:134.0) Gecko/20100101 Firefox/134.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiazkwcUdqcHd2ZUNTeUlkNkE0TzdReTYyNlI5UHVXUDhwbm9TTEFtSiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcmljaW5nIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1737823174),
('NPjnnmuwr67pw5gCpI3paMbjRxhMH88DUczJcl8s', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:134.0) Gecko/20100101 Firefox/134.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTVQ3V2xIc0dDUFFZSENBMlhxNFZaMkY5bWRMZHo3VjhNazh2WWpjciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1737803243),
('xCEOgrExhXXPEyKuF3U1b089ctFdLno3UZxbeU16', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:134.0) Gecko/20100101 Firefox/134.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaGNDaHE2cjJnODBnWmhyaXhrTzZ2dThlZG9tajZ0SkoxYnJRNFYzQiI7czo1OiJlcnJvciI7czoyMzoiWW91IGFyZSBub3QgYXV0aG9yaXplZCEiO3M6NjoiX2ZsYXNoIjthOjI6e3M6MzoibmV3IjthOjA6e31zOjM6Im9sZCI7YToxOntpOjA7czo1OiJlcnJvciI7fX1zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo0MzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2F0dGVuZGVlL2J1eS90aWNrZXQvMSI7fX0=', 1737803243);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `favicon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticket_purchase_expire_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `theme_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `copyright` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `logo`, `favicon`, `banner`, `ticket_purchase_expire_date`, `theme_color`, `copyright`, `footer_address`, `footer_email`, `footer_phone`, `footer_facebook`, `footer_twitter`, `footer_linkedin`, `footer_instagram`, `created_at`, `updated_at`) VALUES
(1, 'logo_1737701405.png', 'favicon_1737774329.png', 'banner_1737775281.jpg', '2025-02-05', '4CB52E', 'Copyright 2025, SingleEvent. All Rights Reserved.', '34, Park Street, NYC, USA', 'contact@example.com', '123-322-1248', '#', '#', '#', '#', NULL, '2025-01-24 23:11:38');

-- --------------------------------------------------------

--
-- Table structure for table `speakers`
--

CREATE TABLE `speakers` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `biography` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `speakers`
--

INSERT INTO `speakers` (`id`, `name`, `slug`, `designation`, `photo`, `email`, `phone`, `biography`, `address`, `website`, `facebook`, `twitter`, `linkedin`, `instagram`, `created_at`, `updated_at`) VALUES
(2, 'John Sword', 'john-sword', 'Founder, BB Company', 'speaker_1724056096.jpg', 'john@example.com', '123-322-1248', 'He is a renowned User Experience (UX) designer with over 15 years of experience in the field. He holds a Master\'s degree in Human-Computer Interaction from Carnegie Mellon University. Throughout his career, John has worked with top-tier tech companies, including Google and Apple, where he led teams in designing user-friendly interfaces for a range of digital products. His expertise lies in creating seamless and engaging user experiences that not only meet but exceed user expectations.\r\n\r\nIn addition to his professional accomplishments, John is a sought-after speaker and educator. He regularly conducts workshops and seminars at major design conferences worldwide, sharing his insights and knowledge with aspiring designers and industry veterans alike.', '43, Park Street, NYC, USA', 'https://www.example.com', '#', '#', '#', '#', '2024-08-19 00:50:33', '2024-08-19 02:28:16'),
(3, 'Danny Allen', 'danny-allen', 'Founder, AA Company', 'speaker_1724055270.jpg', 'danny@example.com', '111-222-3333', 'He is a renowned User Experience (UX) designer with over 15 years of experience in the field. He holds a Master\'s degree in Human-Computer Interaction from Carnegie Mellon University. Throughout his career, John has worked with top-tier tech companies, including Google and Apple, where he led teams in designing user-friendly interfaces for a range of digital products. His expertise lies in creating seamless and engaging user experiences that not only meet but exceed user expectations.\r\n\r\nIn addition to his professional accomplishments, John is a sought-after speaker and educator. He regularly conducts workshops and seminars at major design conferences worldwide, sharing his insights and knowledge with aspiring designers and industry veterans alike.', '43, Park Street, NYC, USA', 'https://www.example.com', '#', '#', '#', '#', '2024-08-19 02:14:30', '2024-08-19 02:26:37'),
(4, 'Steven Gragg', 'steven-gragg', 'Founder, CC Company', 'speaker_1724056075.jpg', 'steven@example.com', '111-222-3322', 'He is a renowned User Experience (UX) designer with over 15 years of experience in the field. He holds a Master\'s degree in Human-Computer Interaction from Carnegie Mellon University. Throughout his career, John has worked with top-tier tech companies, including Google and Apple, where he led teams in designing user-friendly interfaces for a range of digital products. His expertise lies in creating seamless and engaging user experiences that not only meet but exceed user expectations.\r\n\r\nIn addition to his professional accomplishments, John is a sought-after speaker and educator. He regularly conducts workshops and seminars at major design conferences worldwide, sharing his insights and knowledge with aspiring designers and industry veterans alike.', '43, Park Street, NYC, USA', 'https://www.example.com', '#', '#', '#', '#', '2024-08-19 02:27:55', '2024-08-19 02:27:55'),
(5, 'Jordan Parker', 'jordan-parker', 'Founder, DD Company', 'speaker_1724056154.jpg', 'jordan@example.com', '111-222-1122', 'He is a renowned User Experience (UX) designer with over 15 years of experience in the field. He holds a Master\'s degree in Human-Computer Interaction from Carnegie Mellon University. Throughout his career, John has worked with top-tier tech companies, including Google and Apple, where he led teams in designing user-friendly interfaces for a range of digital products. His expertise lies in creating seamless and engaging user experiences that not only meet but exceed user expectations.\r\n\r\nIn addition to his professional accomplishments, John is a sought-after speaker and educator. He regularly conducts workshops and seminars at major design conferences worldwide, sharing his insights and knowledge with aspiring designers and industry veterans alike.', '43, Park Street, NYC, USA', 'https://www.example.com', '#', '#', '#', '#', '2024-08-19 02:29:14', '2024-08-19 03:31:02');

-- --------------------------------------------------------

--
-- Table structure for table `sponsors`
--

CREATE TABLE `sponsors` (
  `id` bigint UNSIGNED NOT NULL,
  `sponsor_category_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tagline` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sponsors`
--

INSERT INTO `sponsors` (`id`, `sponsor_category_id`, `name`, `slug`, `tagline`, `description`, `logo`, `featured_photo`, `address`, `email`, `phone`, `website`, `facebook`, `twitter`, `linkedin`, `instagram`, `map`, `created_at`, `updated_at`) VALUES
(1, 1, 'Yoshio Crosby', 'yoshio-crosby', 'Dolor voluptate et c', 'Autem quos dolore al Autem quos dolore al Autem quos dolore al Autem quos dolore al Autem quos dolore al Autem quos dolore al Autem quos dolore al Autem quos dolore al Autem quos dolore al Autem quos dolore al Autem quos dolore al Autem quos dolore al Autem quos dolore al Autem quos dolore al Autem quos dolore al Autem quos dolore al', 'sponsor_logo_1736686566.png', 'sponsor_featured_photo_1736767347.jpg', 'Proident corrupti', 'nubaluka@mailinator.com', '+1 (902) 368-7564', 'https://www.nuripocy.info', '#', '#', '#', '#', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d29420.936652586348!2d89.55506034999999!3d22.8166484!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sbn!2sbd!4v1736767431917!5m2!1sbn!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '2025-01-12 06:56:06', '2025-01-13 05:23:58'),
(2, 1, 'Sage Butler', 'sage-butler', 'Fugiat enim accusamu', 'Velit excepturi fuga', 'sponsor_logo_1736747064.png', 'sponsor_featured_photo_1736767362.jpg', 'Ipsum beatae rem do', 'luxyvubu@mailinator.com', NULL, 'https://www.wyjiqumuqe.org', NULL, NULL, NULL, NULL, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d29420.936652586348!2d89.55506034999999!3d22.8166484!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sbn!2sbd!4v1736767431917!5m2!1sbn!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '2025-01-12 06:57:27', '2025-01-13 05:24:18'),
(5, 1, 'Ruth Mcpherson', 'ruth-mcpherson', 'Quaerat consequuntur', 'Ex consectetur quod Ex consectetur quod Ex consectetur quod Ex consectetur quod Ex consectetur quod Ex consectetur quod Ex consectetur quod Ex consectetur quod Ex consectetur quod Ex consectetur quod Ex consectetur quod Ex consectetur quod Ex consectetur quod Ex consectetur quod Ex consectetur quod Ex consectetur quod Ex consectetur quod Ex consectetur quod Ex consectetur quod Ex consectetur quod', 'sponsor_logo_1736767338.png', 'sponsor_featured_photo_1736767338.jpg', 'Tempora nemo ex sunt', 'mowi@mailinator.com', '+1 (297) 817-7818', 'https://www.burocetexid.org', NULL, NULL, NULL, NULL, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d29420.936652586348!2d89.55506034999999!3d22.8166484!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sbn!2sbd!4v1736767431917!5m2!1sbn!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '2025-01-13 05:22:18', '2025-01-13 05:24:05'),
(6, 1, 'Katell Reynolds', 'katell-reynolds', 'Veniam labore dolor', 'Et magnam architecto Et magnam architecto Et magnam architecto Et magnam architecto Et magnam architecto Et magnam architecto Et magnam architecto Et magnam architecto Et magnam architecto Et magnam architecto Et magnam architecto Et magnam architecto Et magnam architecto Et magnam architecto Et magnam architecto Et magnam architecto Et magnam architecto Et magnam architecto Et magnam architecto', 'sponsor_logo_1736767500.png', 'sponsor_featured_photo_1736767500.jpg', 'Quisquam temporibus', 'lepe@mailinator.com', '+1 (379) 325-4267', 'https://www.roqu.com.au', '#', '#', '#', '#', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d29420.936652586348!2d89.55506034999999!3d22.8166484!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sbn!2sbd!4v1736767431917!5m2!1sbn!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '2025-01-13 05:25:00', '2025-01-13 05:25:07'),
(7, 2, 'Alice Potter', 'alice-potter', 'Asperiores obcaecati', 'Et debitis id amet', 'sponsor_logo_1736767564.png', 'sponsor_featured_photo_1736767564.jpg', 'Rerum cupidatat arch', 'qorinahy@mailinator.com', '+1 (878) 504-7661', 'https://www.wilicewaxu.mobi', '#', '#', '#', '#', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d29420.936652586348!2d89.55506034999999!3d22.8166484!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sbn!2sbd!4v1736767431917!5m2!1sbn!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '2025-01-13 05:26:04', '2025-01-13 05:26:04'),
(8, 2, 'Justina Kane', 'justina-kane', 'A commodi dolore con', 'Autem nostrud est om Autem nostrud est om Autem nostrud est om Autem nostrud est om Autem nostrud est om Autem nostrud est om Autem nostrud est om Autem nostrud est om Autem nostrud est om Autem nostrud est om Autem nostrud est om Autem nostrud est om Autem nostrud est om Autem nostrud est om Autem nostrud est om Autem nostrud est om Autem nostrud est om Autem nostrud est om Autem nostrud est om Autem nostrud est om', 'sponsor_logo_1736767606.png', 'sponsor_featured_photo_1736767606.jpg', 'Cupidatat expedita o', 'fuhal@mailinator.com', '+1 (327) 356-6963', 'https://www.regy.ws', '#', '#', '#', '#', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d29420.936652586348!2d89.55506034999999!3d22.8166484!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sbn!2sbd!4v1736767431917!5m2!1sbn!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '2025-01-13 05:26:46', '2025-01-13 05:26:52'),
(9, 2, 'Cara Nolan', 'cara-nolan', 'Aut consequat Dolor', 'Veniam mollit nemo Veniam mollit nemo Veniam mollit nemo Veniam mollit nemo Veniam mollit nemo Veniam mollit nemo Veniam mollit nemo Veniam mollit nemo Veniam mollit nemo Veniam mollit nemo Veniam mollit nemo Veniam mollit nemo', 'sponsor_logo_1736767651.png', 'sponsor_featured_photo_1736767651.jpg', 'Aliquam voluptatum o', 'wigexeb@mailinator.com', '+1 (138) 597-7703', 'https://www.wazowocupiw.net', '#', '#', '#', '#', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d29420.936652586348!2d89.55506034999999!3d22.8166484!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sbn!2sbd!4v1736767431917!5m2!1sbn!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '2025-01-13 05:27:31', '2025-01-13 05:28:44'),
(10, 2, 'Rosalyn Barnett', 'rosalyn-barnett', 'Aut mollit explicabo', 'Porro inventore rem Porro inventore rem Porro inventore rem Porro inventore rem Porro inventore rem Porro inventore rem Porro inventore rem Porro inventore rem Porro inventore rem Porro inventore rem Porro inventore rem Porro inventore rem Porro inventore rem Porro inventore rem Porro inventore rem Porro inventore rem Porro inventore rem Porro inventore rem Porro inventore rem Porro inventore rem', 'sponsor_logo_1736767861.png', 'sponsor_featured_photo_1736767861.jpg', 'Nulla anim ea mollit', 'camyzetisu@mailinator.com', '+1 (114) 957-5223', 'https://www.wyhikyjalitev.net', '#', '#', '#', '#', NULL, '2025-01-13 05:31:01', '2025-01-13 05:32:21');

-- --------------------------------------------------------

--
-- Table structure for table `sponsor_categories`
--

CREATE TABLE `sponsor_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sponsor_categories`
--

INSERT INTO `sponsor_categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Gold Sponsers', 'All the gold sponsors of the event are listed here. If you are interested in becoming a gold sponsor, please contact us.', '2025-01-12 03:12:14', '2025-01-12 03:12:14'),
(2, 'Platinum Sponsers', 'All the platinum sponsors of the event are listed here. If you are interested in becoming a platinum sponsor, please contact us.', '2025-01-12 03:13:26', '2025-01-12 03:13:26');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` text COLLATE utf8mb4_unicode_ci,
  `status` enum('active','pending') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `token`, `status`, `created_at`, `updated_at`) VALUES
(1, 'test1@gmail.com', '', 'active', '2025-01-23 05:27:36', '2025-01-23 05:28:28'),
(2, 'test2@gmail.com', '', 'active', '2025-01-23 05:29:08', '2025-01-23 05:29:21'),
(3, 'test3@gmail.com', '7f0f2336e7b157c67a48cc2c646676d298fdd7534c432f2c00c1fb0f716b2efd', 'pending', '2025-01-23 05:29:32', '2025-01-23 05:29:32');

-- --------------------------------------------------------

--
-- Table structure for table `term_page_items`
--

CREATE TABLE `term_page_items` (
  `id` bigint UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `term_page_items`
--

INSERT INTO `term_page_items` (`id`, `content`, `created_at`, `updated_at`) VALUES
(1, '<div class=\"black-page pt_50 pb_50 gray\">\r\n<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"col-lg-12 col-md-12\">\r\n<h1>Heading 1</h1>\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic similique voluptas debitis animi ducimus veritatis totam minima doloremque, ratione incidunt unde excepturi necessitatibus! Laborum tempore architecto voluptate, quos vero totam.</p>\r\n<h2>Heading 2</h2>\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic similique voluptas debitis animi ducimus veritatis totam minima doloremque, ratione incidunt unde excepturi necessitatibus! Laborum tempore architecto voluptate, quos vero totam.</p>\r\n<h3>Heading 3</h3>\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic similique voluptas debitis animi ducimus veritatis totam minima doloremque, ratione incidunt unde excepturi necessitatibus! Laborum tempore architecto voluptate, quos vero totam.</p>\r\n<h4>Heading 4</h4>\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic similique voluptas debitis animi ducimus veritatis totam minima doloremque, ratione incidunt unde excepturi necessitatibus! Laborum tempore architecto voluptate, quos vero totam.</p>\r\n<h5>Heading 5</h5>\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic similique voluptas debitis animi ducimus veritatis totam minima doloremque, ratione incidunt unde excepturi necessitatibus! Laborum tempore architecto voluptate, quos vero totam.</p>\r\n<h6>Heading 6</h6>\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic similique voluptas debitis animi ducimus veritatis totam minima doloremque, ratione incidunt unde excepturi necessitatibus! Laborum tempore architecto voluptate, quos vero totam.</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<p>&nbsp;</p>', NULL, '2025-01-23 04:58:24');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `designation`, `photo`, `comment`, `created_at`, `updated_at`) VALUES
(1, 'John Doe', 'CEO of Tech Innovators Inc.', 'testimonial_1736843657.jpg', 'Attending the Annual Innovation Summit was a game-changer for our company. The networking opportunities were unparalleled, and the insights we gained from the keynote speakers were invaluable. We left inspired and equipped with actionable strategies to drive our business forward. Can\'t wait for next year\'s event', '2025-01-14 02:34:17', '2025-01-14 02:34:17'),
(2, 'Jame Smith', 'Marketing Director at Creative Solutions', 'testimonial_1736843692.jpg', 'The Digital Marketing Conference exceeded all my expectations. From the engaging workshops to the panel discussions featuring industry leaders, every aspect was meticulously organized. The event provided a perfect blend of learning and networking. I\'ve already implemented several ideas I picked up, and the results are impressive.', '2025-01-14 02:34:52', '2025-01-14 02:34:52'),
(3, 'Michael Brown', 'Freelance Graphic Designer', 'testimonial_1736843722.jpg', 'As a freelance professional, the Design Expo was an incredible opportunity to connect with peers and potential clients. The variety of sessions, from hands-on workshops to trend analysis, was fantastic. The inspiration and knowledge I gained have significantly impacted my work. This event is a must-attend for anyone in the creative industry.', '2025-01-14 02:35:22', '2025-01-14 02:35:22');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `package_id` bigint UNSIGNED NOT NULL,
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `package_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_zip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_note` text COLLATE utf8mb4_unicode_ci,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_transaction_info` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `per_ticket_price` int NOT NULL,
  `total_tickets` int NOT NULL,
  `total_price` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `user_id`, `package_id`, `payment_id`, `package_name`, `billing_name`, `billing_email`, `billing_phone`, `billing_address`, `billing_country`, `billing_state`, `billing_city`, `billing_zip`, `billing_note`, `payment_method`, `payment_currency`, `payment_status`, `transaction_id`, `bank_transaction_info`, `per_ticket_price`, `total_tickets`, `total_price`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '17373496184001', 'Standard', 'Smith', 'smith@gmail.com', '123-333-2232', '23 Street Road', 'USA', 'NYC', 'NYC', '82342', NULL, 'PayPal', 'USD', 'Completed', '8JU105919G6957927', '', 9, 3, 27, '2025-01-17 21:15:35', '2025-01-20 07:07:24'),
(2, 1, 1, '17373496184002', 'Standard', 'Smith', 'smith@gmail.com', '123-333-2232', '23 Street Road', 'USA', 'NYC', 'NYC', '82342', NULL, 'Stripe', 'usd', 'Completed', 'cs_test_a1R4BX21KOHbmpZAH5WPSwE7VbhHoscsFFSX8HkguvIbQcIO02adFH3MCV', '', 9, 4, 36, '2025-01-17 22:07:23', '2025-01-17 22:07:23'),
(3, 1, 2, '17373496184003', 'Gold', 'Smith', 'smith@gmail.com', '123-333-2232', '23 Street Road', 'USA', 'NYC', 'NYC', '82342', 'This is a sample text.', 'Stripe', 'usd', 'Completed', 'cs_test_a1fXNIPc1g1pFZzPLuj1vGl1yr99xntl6LO7ug70wMywDwVC57cKH5dvrg', '', 29, 2, 58, '2025-01-17 22:09:15', '2025-01-17 22:09:15'),
(6, 1, 2, '17373496184287', 'Gold', 'Smith', 'smith@gmail.com', '123-333-2232', '23 Street Road', 'USA', 'NYC', 'NYC', '82342', NULL, 'Bank', 'USD', 'Completed', '', 'Sample information', 29, 2, 58, '2025-01-19 23:06:58', '2025-01-20 07:06:46'),
(9, 4, 1, '17375451326648', 'Standard', 'Patrick Henderson', 'patrick@gmail.com', '123-333-2222', '43, Park Street, NYC, USA', 'USA', 'CA', 'NYC', '12832', NULL, 'Bank', 'USD', 'Completed', '', 'Sample info.', 9, 4, 36, '2025-01-22 05:25:32', '2025-01-22 05:52:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0=pending, 1=active, 2=suspended',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `photo`, `password`, `phone`, `country`, `address`, `state`, `city`, `zip`, `token`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Graham Smith', 'smith@gmail.com', 'user_1737605773.jpg', '$2y$12$e.oxYabhjXHBrwnI95qePO1Nut9rGApP3J4xq.Pi5aEFXueVNrOge', '123-333-2232', 'USA', '23 Street Road', 'NYC', 'NYC', '82342', '', '1', '2024-07-28 19:13:27', '2025-01-22 22:16:29'),
(2, 'David', 'david@gmail.com', NULL, '$2y$12$FxClW126x1wE27/5cyiM0ufCIB25UeKhU2xczofudIYUbPFWKvnia', NULL, NULL, NULL, NULL, NULL, NULL, '', '1', '2024-07-29 04:14:56', '2024-07-29 04:16:04'),
(4, 'Patrick Henderson', 'patrick@gmail.com', 'attendee_1737529373.jpg', '$2y$12$3THl6gppFU8Xa7cY3Wt6auq/ayrTB2xirXB/zHIAydUkI/srHVfvi', '123-333-2222', 'USA', '43, Park Street, NYC, USA', 'CA', 'NYC', '12832', '', '1', '2025-01-22 01:00:39', '2025-01-22 01:03:44');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint UNSIGNED NOT NULL,
  `caption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `caption`, `video`, `created_at`, `updated_at`) VALUES
(1, 'Cybersecurity Tutorial for Beginners', 'agnDpN961xU', '2025-01-13 23:11:34', '2025-01-13 23:11:34'),
(2, 'What Is Artificial Intelligence?', 'oV74Najm6Nc', '2025-01-13 23:12:07', '2025-01-13 23:58:42'),
(3, NULL, 'njPY7pQTRWg', '2025-01-13 23:12:44', '2025-01-13 23:12:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accommodations`
--
ALTER TABLE `accommodations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `contact_page_items`
--
ALTER TABLE `contact_page_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_banners`
--
ALTER TABLE `home_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_blogs`
--
ALTER TABLE `home_blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_counters`
--
ALTER TABLE `home_counters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_pricings`
--
ALTER TABLE `home_pricings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_speakers`
--
ALTER TABLE `home_speakers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_sponsors`
--
ALTER TABLE `home_sponsors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_welcomes`
--
ALTER TABLE `home_welcomes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organisers`
--
ALTER TABLE `organisers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_facilities`
--
ALTER TABLE `package_facilities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `package_facilities_package_id_foreign` (`package_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Indexes for table `privacy_page_items`
--
ALTER TABLE `privacy_page_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule_days`
--
ALTER TABLE `schedule_days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule_speaker`
--
ALTER TABLE `schedule_speaker`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schedule_speaker_schedule_id_foreign` (`schedule_id`),
  ADD KEY `schedule_speaker_speaker_id_foreign` (`speaker_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `speakers`
--
ALTER TABLE `speakers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `speakers_email_unique` (`email`);

--
-- Indexes for table `sponsors`
--
ALTER TABLE `sponsors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sponsors_slug_unique` (`slug`),
  ADD KEY `sponsors_sponsor_category_id_foreign` (`sponsor_category_id`);

--
-- Indexes for table `sponsor_categories`
--
ALTER TABLE `sponsor_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscribers_email_unique` (`email`);

--
-- Indexes for table `term_page_items`
--
ALTER TABLE `term_page_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_user_id_foreign` (`user_id`),
  ADD KEY `tickets_package_id_foreign` (`package_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accommodations`
--
ALTER TABLE `accommodations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_page_items`
--
ALTER TABLE `contact_page_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `home_banners`
--
ALTER TABLE `home_banners`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home_blogs`
--
ALTER TABLE `home_blogs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home_counters`
--
ALTER TABLE `home_counters`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home_pricings`
--
ALTER TABLE `home_pricings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home_speakers`
--
ALTER TABLE `home_speakers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home_sponsors`
--
ALTER TABLE `home_sponsors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home_welcomes`
--
ALTER TABLE `home_welcomes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `organisers`
--
ALTER TABLE `organisers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `package_facilities`
--
ALTER TABLE `package_facilities`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `privacy_page_items`
--
ALTER TABLE `privacy_page_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `schedule_days`
--
ALTER TABLE `schedule_days`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `schedule_speaker`
--
ALTER TABLE `schedule_speaker`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `speakers`
--
ALTER TABLE `speakers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sponsors`
--
ALTER TABLE `sponsors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sponsor_categories`
--
ALTER TABLE `sponsor_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `term_page_items`
--
ALTER TABLE `term_page_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `package_facilities`
--
ALTER TABLE `package_facilities`
  ADD CONSTRAINT `package_facilities_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `schedule_speaker`
--
ALTER TABLE `schedule_speaker`
  ADD CONSTRAINT `schedule_speaker_schedule_id_foreign` FOREIGN KEY (`schedule_id`) REFERENCES `schedules` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `schedule_speaker_speaker_id_foreign` FOREIGN KEY (`speaker_id`) REFERENCES `speakers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sponsors`
--
ALTER TABLE `sponsors`
  ADD CONSTRAINT `sponsors_sponsor_category_id_foreign` FOREIGN KEY (`sponsor_category_id`) REFERENCES `sponsor_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tickets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
