-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2021 at 10:41 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mind_life`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `log_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `causer_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `subject_id`, `causer_type`, `causer_id`, `properties`, `created_at`, `updated_at`) VALUES
(1, 'Login History', 'This History Model has been created', 'App\\Models\\LoginHistory', 31, 'App\\User', 2, '[]', '2021-05-18 11:52:02', '2021-05-18 11:52:02'),
(2, 'Article', 'This Ip Address   has been created', 'App\\Models\\Article', 6, 'App\\User', 2, '{\"attributes\":{\"id\":6,\"user_id\":2,\"category_id\":1,\"title\":\"werew\",\"description\":null,\"total_like\":null,\"total_bookmark\":null,\"total_share\":null,\"total_view\":null,\"post_date\":\"2021-05-26\",\"image_path\":\"public\\/article\\/ar_60a3fed29b658n7PUr3dnpV.png\",\"status\":1,\"created_at\":\"2021-05-18T17:52:18.000000Z\",\"updated_at\":\"2021-05-18T17:52:18.000000Z\"}}', '2021-05-18 11:52:18', '2021-05-18 11:52:18'),
(3, 'Article Tag', 'Article Tag   has been created', 'App\\Models\\ArticleTag', 10, 'App\\User', 2, '{\"attributes\":{\"id\":10,\"article_id\":6,\"video_id\":null,\"tag_name\":\"werew\",\"status\":1,\"created_at\":\"2021-05-18T17:52:18.000000Z\",\"updated_at\":\"2021-05-18T17:52:18.000000Z\"}}', '2021-05-18 11:52:19', '2021-05-18 11:52:19'),
(4, 'Article', 'This Ip Address   has been created', 'App\\Models\\Article', 7, 'App\\User', 2, '{\"attributes\":{\"id\":7,\"user_id\":2,\"category_id\":1,\"title\":\"werwerewr\",\"description\":null,\"total_like\":null,\"total_bookmark\":null,\"total_share\":null,\"total_view\":null,\"post_date\":\"2021-05-03\",\"image_path\":\"public\\/article\\/ar_60a3fee19c63aaK0xm53r8v.jpg\",\"status\":1,\"created_at\":\"2021-05-18T17:52:33.000000Z\",\"updated_at\":\"2021-05-18T17:52:33.000000Z\"}}', '2021-05-18 11:52:33', '2021-05-18 11:52:33'),
(5, 'Article Tag', 'Article Tag   has been created', 'App\\Models\\ArticleTag', 11, 'App\\User', 2, '{\"attributes\":{\"id\":11,\"article_id\":7,\"video_id\":null,\"tag_name\":\"werwer\",\"status\":1,\"created_at\":\"2021-05-18T17:52:33.000000Z\",\"updated_at\":\"2021-05-18T17:52:33.000000Z\"}}', '2021-05-18 11:52:33', '2021-05-18 11:52:33'),
(6, 'Article', 'This Ip Address   has been created', 'App\\Models\\Article', 8, 'App\\User', 2, '{\"attributes\":{\"id\":8,\"user_id\":1,\"category_id\":5,\"title\":\"erter\",\"description\":null,\"total_like\":null,\"total_bookmark\":null,\"total_share\":null,\"total_view\":null,\"post_date\":\"2021-05-05\",\"image_path\":\"public\\/article\\/ar_60a3fefca64657yCVXVhjqD.png\",\"status\":1,\"created_at\":\"2021-05-18T17:53:00.000000Z\",\"updated_at\":\"2021-05-18T17:53:00.000000Z\"}}', '2021-05-18 11:53:00', '2021-05-18 11:53:00'),
(7, 'Article Tag', 'Article Tag   has been created', 'App\\Models\\ArticleTag', 12, 'App\\User', 2, '{\"attributes\":{\"id\":12,\"article_id\":8,\"video_id\":null,\"tag_name\":\"erter\",\"status\":1,\"created_at\":\"2021-05-18T17:53:00.000000Z\",\"updated_at\":\"2021-05-18T17:53:00.000000Z\"}}', '2021-05-18 11:53:00', '2021-05-18 11:53:00'),
(8, 'Article Tag', 'Article Tag   has been created', 'App\\Models\\ArticleTag', 13, 'App\\User', 2, '{\"attributes\":{\"id\":13,\"article_id\":8,\"video_id\":null,\"tag_name\":\"ertert\",\"status\":1,\"created_at\":\"2021-05-18T17:53:00.000000Z\",\"updated_at\":\"2021-05-18T17:53:00.000000Z\"}}', '2021-05-18 11:53:00', '2021-05-18 11:53:00'),
(9, 'Article Tag', 'Article Tag   has been created', 'App\\Models\\ArticleTag', 14, 'App\\User', 2, '{\"attributes\":{\"id\":14,\"article_id\":8,\"video_id\":null,\"tag_name\":\"ertertre\",\"status\":1,\"created_at\":\"2021-05-18T17:53:00.000000Z\",\"updated_at\":\"2021-05-18T17:53:00.000000Z\"}}', '2021-05-18 11:53:00', '2021-05-18 11:53:00'),
(10, 'Article', 'This Ip Address   has been created', 'App\\Models\\Article', 9, 'App\\User', 2, '{\"attributes\":{\"id\":9,\"user_id\":2,\"category_id\":3,\"title\":\"werwer\",\"description\":null,\"total_like\":null,\"total_bookmark\":null,\"total_share\":null,\"total_view\":null,\"post_date\":\"2021-05-21\",\"image_path\":\"public\\/article\\/ar_60a3ff1c447f9GYNz4x2iu1.png\",\"status\":1,\"created_at\":\"2021-05-18T17:53:32.000000Z\",\"updated_at\":\"2021-05-18T17:53:32.000000Z\"}}', '2021-05-18 11:53:32', '2021-05-18 11:53:32'),
(11, 'Article Tag', 'Article Tag   has been created', 'App\\Models\\ArticleTag', 15, 'App\\User', 2, '{\"attributes\":{\"id\":15,\"article_id\":9,\"video_id\":null,\"tag_name\":\"werwer\",\"status\":1,\"created_at\":\"2021-05-18T17:53:32.000000Z\",\"updated_at\":\"2021-05-18T17:53:32.000000Z\"}}', '2021-05-18 11:53:32', '2021-05-18 11:53:32'),
(12, 'Article', 'This Ip Address   has been created', 'App\\Models\\Article', 10, 'App\\User', 2, '{\"attributes\":{\"id\":10,\"user_id\":1,\"category_id\":5,\"title\":\"rtytr\",\"description\":\"<p>werwer<\\/p>\",\"total_like\":null,\"total_bookmark\":null,\"total_share\":null,\"total_view\":null,\"post_date\":\"2021-05-25\",\"image_path\":\"public\\/article\\/ar_60a409da90a8803myZ0EE1A.png\",\"status\":1,\"created_at\":\"2021-05-18T18:39:22.000000Z\",\"updated_at\":\"2021-05-18T18:39:22.000000Z\"}}', '2021-05-18 12:39:22', '2021-05-18 12:39:22'),
(13, 'Article Tag', 'Article Tag   has been created', 'App\\Models\\ArticleTag', 16, 'App\\User', 2, '{\"attributes\":{\"id\":16,\"article_id\":10,\"video_id\":null,\"tag_name\":\"rtytr\",\"status\":1,\"created_at\":\"2021-05-18T18:39:22.000000Z\",\"updated_at\":\"2021-05-18T18:39:22.000000Z\"}}', '2021-05-18 12:39:22', '2021-05-18 12:39:22'),
(14, 'Article', 'This Ip Address   has been created', 'App\\Models\\Article', 11, 'App\\User', 2, '{\"attributes\":{\"id\":11,\"user_id\":1,\"category_id\":6,\"title\":\"werew\",\"description\":\"<p>ewrwer werewrewr<br \\/>asedasdsadasd<\\/p>\\r\\n<p><br \\/>sdsdsds<\\/p>\",\"total_like\":null,\"total_bookmark\":null,\"total_share\":null,\"total_view\":null,\"post_date\":\"2021-05-18\",\"image_path\":\"public\\/article\\/ar_60a40a762af9frt5UJNEaKC.png\",\"status\":1,\"created_at\":\"2021-05-18T18:41:58.000000Z\",\"updated_at\":\"2021-05-18T18:41:58.000000Z\"}}', '2021-05-18 12:41:58', '2021-05-18 12:41:58'),
(15, 'Article Tag', 'Article Tag   has been created', 'App\\Models\\ArticleTag', 17, 'App\\User', 2, '{\"attributes\":{\"id\":17,\"article_id\":11,\"video_id\":null,\"tag_name\":\"werwe\",\"status\":1,\"created_at\":\"2021-05-18T18:41:58.000000Z\",\"updated_at\":\"2021-05-18T18:41:58.000000Z\"}}', '2021-05-18 12:41:58', '2021-05-18 12:41:58'),
(16, 'Article', 'This Ip Address   has been created', 'App\\Models\\Article', 12, 'App\\User', 2, '{\"attributes\":{\"id\":12,\"user_id\":2,\"category_id\":5,\"title\":\"werwer\",\"description\":\"<p>wer werwer werw erew<\\/p>\",\"total_like\":null,\"total_bookmark\":null,\"total_share\":null,\"total_view\":null,\"post_date\":\"2021-05-20\",\"image_path\":\"public\\/article\\/ar_60a40ab7b416136dgfvpqnI.png\",\"status\":1,\"created_at\":\"2021-05-18T18:43:03.000000Z\",\"updated_at\":\"2021-05-18T18:43:03.000000Z\"}}', '2021-05-18 12:43:03', '2021-05-18 12:43:03'),
(17, 'Article Tag', 'Article Tag   has been created', 'App\\Models\\ArticleTag', 18, 'App\\User', 2, '{\"attributes\":{\"id\":18,\"article_id\":12,\"video_id\":null,\"tag_name\":\"werwerewr\",\"status\":1,\"created_at\":\"2021-05-18T18:43:03.000000Z\",\"updated_at\":\"2021-05-18T18:43:03.000000Z\"}}', '2021-05-18 12:43:03', '2021-05-18 12:43:03'),
(18, 'Article Tag', 'Article Tag   has been created', 'App\\Models\\ArticleTag', 19, 'App\\User', 2, '{\"attributes\":{\"id\":19,\"article_id\":12,\"video_id\":null,\"tag_name\":\"werwere\",\"status\":1,\"created_at\":\"2021-05-18T18:43:03.000000Z\",\"updated_at\":\"2021-05-18T18:43:03.000000Z\"}}', '2021-05-18 12:43:03', '2021-05-18 12:43:03'),
(19, 'Article Tag', 'Article Tag   has been created', 'App\\Models\\ArticleTag', 20, 'App\\User', 2, '{\"attributes\":{\"id\":20,\"article_id\":12,\"video_id\":null,\"tag_name\":\"ww\",\"status\":1,\"created_at\":\"2021-05-18T18:43:03.000000Z\",\"updated_at\":\"2021-05-18T18:43:03.000000Z\"}}', '2021-05-18 12:43:04', '2021-05-18 12:43:04'),
(20, 'Login History', 'This History Model has been created', 'App\\Models\\LoginHistory', 32, 'App\\User', 2, '[]', '2021-05-22 12:13:53', '2021-05-22 12:13:53'),
(21, 'Login History', 'This History Model has been created', 'App\\Models\\LoginHistory', 33, 'App\\User', 2, '[]', '2021-05-22 13:03:07', '2021-05-22 13:03:07'),
(22, 'Login History', 'This History Model has been created', 'App\\Models\\LoginHistory', 34, 'App\\User', 2, '[]', '2021-05-23 09:24:20', '2021-05-23 09:24:20'),
(23, 'Advertisement', 'This Ip Address   has been created', 'App\\Models\\Advertisement', 17, 'App\\User', 2, '{\"attributes\":{\"id\":17,\"is_google\":1,\"add_sense_link\":\"http:\\/\\/localhost\\/hongkong\\/public\\/advertisement\\/cp_signature_608bef218fb79RyfYKDrTlU.jpg\",\"ad_image_path\":null,\"total_clicks\":null,\"website_link\":null,\"status\":1,\"created_at\":\"2021-05-23T15:24:47.000000Z\",\"updated_at\":\"2021-05-23T15:24:47.000000Z\"}}', '2021-05-23 09:24:47', '2021-05-23 09:24:47'),
(24, 'Advertisement', 'This Ip Address   has been created', 'App\\Models\\Advertisement', 18, 'App\\User', 2, '{\"attributes\":{\"id\":18,\"is_google\":0,\"add_sense_link\":null,\"ad_image_path\":\"public\\/advertisement\\/ad_60aa73ca4f1daSMWn9KnB3W.png\",\"total_clicks\":null,\"website_link\":\"https:\\/\\/app.tvpfundhk.com\\/admin\\/login\",\"status\":1,\"created_at\":\"2021-05-23T15:24:58.000000Z\",\"updated_at\":\"2021-05-23T15:24:58.000000Z\"}}', '2021-05-23 09:24:58', '2021-05-23 09:24:58'),
(25, 'Advertisement', 'This Ip Address   has been created', 'App\\Models\\Advertisement', 19, 'App\\User', 2, '{\"attributes\":{\"id\":19,\"is_google\":0,\"add_sense_link\":null,\"ad_image_path\":\"public\\/advertisement\\/ad_60aa73d407bd1WeNpGIOTq5.png\",\"total_clicks\":null,\"website_link\":\"https:\\/\\/www.google.com\\/\",\"status\":1,\"created_at\":\"2021-05-23T15:25:08.000000Z\",\"updated_at\":\"2021-05-23T15:25:08.000000Z\"}}', '2021-05-23 09:25:08', '2021-05-23 09:25:08'),
(26, 'Login History', 'This History Model has been created', 'App\\Models\\LoginHistory', 35, 'App\\User', 2, '[]', '2021-05-23 11:18:42', '2021-05-23 11:18:42'),
(27, 'Login History', 'This History Model has been created', 'App\\Models\\LoginHistory', 36, 'App\\User', 2, '[]', '2021-05-23 12:02:23', '2021-05-23 12:02:23'),
(28, 'Article', 'This Article  has been created', 'App\\Models\\Video', 3, 'App\\User', 2, '{\"attributes\":{\"id\":3,\"user_id\":1,\"category_id\":11,\"title\":\"ertre\",\"type\":\"link\",\"video_path\":null,\"youtube_link\":\"https:\\/\\/www.youtube.com\\/watch?v=G2fnlWaJNFE&list=PLFZAa7EupbB4OPoiMcFVY6KaNsJA8CY_B\",\"total_like\":null,\"total_bookmark\":null,\"total_download\":null,\"total_share\":null,\"total_view\":null,\"post_date\":\"2021-05-26\",\"status\":1,\"created_at\":\"2021-05-23T18:51:28.000000Z\",\"updated_at\":\"2021-05-23T18:51:28.000000Z\"}}', '2021-05-23 12:51:28', '2021-05-23 12:51:28'),
(29, 'Article Tag', 'Article Tag   has been created', 'App\\Models\\ArticleTag', 21, 'App\\User', 2, '{\"attributes\":{\"id\":21,\"article_id\":3,\"video_id\":null,\"tag_name\":\"ert ertert ert\",\"status\":1,\"created_at\":\"2021-05-23T18:51:28.000000Z\",\"updated_at\":\"2021-05-23T18:51:28.000000Z\"}}', '2021-05-23 12:51:28', '2021-05-23 12:51:28'),
(30, 'Article', 'This Article  has been created', 'App\\Models\\Video', 4, 'App\\User', 2, '{\"attributes\":{\"id\":4,\"user_id\":1,\"category_id\":11,\"title\":\"ertert\",\"type\":\"directly\",\"video_path\":\"article\\/ar_60aaa4ed5669daRUKAi75t6.mp4\",\"youtube_link\":null,\"total_like\":null,\"total_bookmark\":null,\"total_download\":null,\"total_share\":null,\"total_view\":null,\"post_date\":\"2021-05-18\",\"status\":1,\"created_at\":\"2021-05-23T18:54:37.000000Z\",\"updated_at\":\"2021-05-23T18:54:37.000000Z\"}}', '2021-05-23 12:54:37', '2021-05-23 12:54:37'),
(31, 'Article Tag', 'Article Tag   has been created', 'App\\Models\\ArticleTag', 22, 'App\\User', 2, '{\"attributes\":{\"id\":22,\"article_id\":4,\"video_id\":null,\"tag_name\":\"ertret\",\"status\":1,\"created_at\":\"2021-05-23T18:54:37.000000Z\",\"updated_at\":\"2021-05-23T18:54:37.000000Z\"}}', '2021-05-23 12:54:37', '2021-05-23 12:54:37'),
(32, 'Article', 'This Article  has been created', 'App\\Models\\Video', 5, 'App\\User', 2, '{\"attributes\":{\"id\":5,\"user_id\":2,\"category_id\":12,\"title\":\"ert\",\"type\":\"directly\",\"video_path\":\"public\\/article\\/ar_60aaa52179652aI1GfGDtgP.mp4\",\"youtube_link\":null,\"total_like\":null,\"total_bookmark\":null,\"total_download\":null,\"total_share\":null,\"total_view\":null,\"post_date\":\"2021-05-19\",\"status\":1,\"created_at\":\"2021-05-23T18:55:29.000000Z\",\"updated_at\":\"2021-05-23T18:55:29.000000Z\"}}', '2021-05-23 12:55:29', '2021-05-23 12:55:29'),
(33, 'Article Tag', 'Article Tag   has been created', 'App\\Models\\ArticleTag', 23, 'App\\User', 2, '{\"attributes\":{\"id\":23,\"article_id\":5,\"video_id\":null,\"tag_name\":\"ertre\",\"status\":1,\"created_at\":\"2021-05-23T18:55:29.000000Z\",\"updated_at\":\"2021-05-23T18:55:29.000000Z\"}}', '2021-05-23 12:55:29', '2021-05-23 12:55:29'),
(34, 'Login History', 'This History Model has been created', 'App\\Models\\LoginHistory', 37, 'App\\User', 2, '[]', '2021-05-23 18:59:57', '2021-05-23 18:59:57'),
(35, 'Article', 'This Article  has been created', 'App\\Models\\Video', 6, 'App\\User', 2, '{\"attributes\":{\"id\":6,\"user_id\":1,\"category_id\":11,\"title\":\"sdfds\",\"type\":\"directly\",\"video_path\":\"public\\/article\\/ar_60aafab8e064aKLd5q4wKGt.mp4\",\"youtube_link\":null,\"total_like\":null,\"total_bookmark\":null,\"total_download\":null,\"total_share\":null,\"total_view\":null,\"post_date\":\"2021-05-11\",\"status\":1,\"created_at\":\"2021-05-24T01:00:40.000000Z\",\"updated_at\":\"2021-05-24T01:00:40.000000Z\"}}', '2021-05-23 19:00:41', '2021-05-23 19:00:41'),
(36, 'Article', 'This Article  has been created', 'App\\Models\\Video', 7, 'App\\User', 2, '{\"attributes\":{\"id\":7,\"user_id\":1,\"category_id\":11,\"title\":\"sdfds\",\"type\":\"directly\",\"video_path\":\"public\\/article\\/ar_60aafb4186d3dPoryVlabJ3.mp4\",\"youtube_link\":null,\"total_like\":null,\"total_bookmark\":null,\"total_download\":null,\"total_share\":null,\"total_view\":null,\"post_date\":\"2021-05-11\",\"status\":1,\"created_at\":\"2021-05-24T01:02:57.000000Z\",\"updated_at\":\"2021-05-24T01:02:57.000000Z\"}}', '2021-05-23 19:02:57', '2021-05-23 19:02:57'),
(37, 'Article Tag', 'Article Tag   has been created', 'App\\Models\\ArticleTag', 24, 'App\\User', 2, '{\"attributes\":{\"id\":24,\"article_id\":null,\"video_id\":7,\"tag_name\":\"video tag\",\"status\":1,\"created_at\":\"2021-05-24T01:02:57.000000Z\",\"updated_at\":\"2021-05-24T01:02:57.000000Z\"}}', '2021-05-23 19:02:57', '2021-05-23 19:02:57'),
(38, 'Article Tag', 'Article Tag   has been created', 'App\\Models\\ArticleTag', 25, 'App\\User', 2, '{\"attributes\":{\"id\":25,\"article_id\":null,\"video_id\":7,\"tag_name\":\"video tag 2\",\"status\":1,\"created_at\":\"2021-05-24T01:02:57.000000Z\",\"updated_at\":\"2021-05-24T01:02:57.000000Z\"}}', '2021-05-23 19:02:57', '2021-05-23 19:02:57'),
(39, 'Login History', 'This History Model has been created', 'App\\Models\\LoginHistory', 38, 'App\\User', 2, '[]', '2021-05-23 19:10:58', '2021-05-23 19:10:58'),
(40, 'Advertisement', 'This Ip Address   has been created', 'App\\Models\\Advertisement', 20, 'App\\User', 2, '{\"attributes\":{\"id\":20,\"is_google\":0,\"add_sense_link\":null,\"ad_image_path\":\"public\\/advertisement\\/ad_60aafd2f6bc64NOuJ74jJF5.jpeg\",\"total_clicks\":null,\"website_link\":\"asdsadsad\",\"status\":1,\"created_at\":\"2021-05-24T01:11:11.000000Z\",\"updated_at\":\"2021-05-24T01:11:11.000000Z\"}}', '2021-05-23 19:11:11', '2021-05-23 19:11:11'),
(41, 'Login History', 'This History Model has been created', 'App\\Models\\LoginHistory', 39, 'App\\User', 2, '[]', '2021-05-24 12:44:31', '2021-05-24 12:44:31'),
(42, 'Article', 'This Article  has been created', 'App\\Models\\Video', 8, 'App\\User', 2, '{\"attributes\":{\"id\":8,\"user_id\":1,\"category_id\":11,\"title\":\"asds\",\"type\":\"directly\",\"video_path\":\"public\\/article\\/ar_60abf447672e1m7vcLluXGh.mp4\",\"youtube_link\":null,\"total_like\":null,\"total_bookmark\":null,\"total_download\":null,\"total_share\":null,\"total_view\":null,\"post_date\":\"2021-05-18\",\"status\":1,\"created_at\":\"2021-05-24T18:45:27.000000Z\",\"updated_at\":\"2021-05-24T18:45:27.000000Z\"}}', '2021-05-24 12:45:27', '2021-05-24 12:45:27'),
(43, 'Article Tag', 'Article Tag   has been created', 'App\\Models\\ArticleTag', 26, 'App\\User', 2, '{\"attributes\":{\"id\":26,\"article_id\":null,\"video_id\":8,\"tag_name\":\"werewr\",\"status\":1,\"created_at\":\"2021-05-24T18:45:27.000000Z\",\"updated_at\":\"2021-05-24T18:45:27.000000Z\"}}', '2021-05-24 12:45:27', '2021-05-24 12:45:27'),
(44, 'Article Tag', 'Article Tag   has been created', 'App\\Models\\ArticleTag', 27, 'App\\User', 2, '{\"attributes\":{\"id\":27,\"article_id\":null,\"video_id\":8,\"tag_name\":\"werew\",\"status\":1,\"created_at\":\"2021-05-24T18:45:27.000000Z\",\"updated_at\":\"2021-05-24T18:45:27.000000Z\"}}', '2021-05-24 12:45:27', '2021-05-24 12:45:27'),
(45, 'Article Tag', 'Article Tag   has been created', 'App\\Models\\ArticleTag', 28, 'App\\User', 2, '{\"attributes\":{\"id\":28,\"article_id\":null,\"video_id\":8,\"tag_name\":\"werwerewr\",\"status\":1,\"created_at\":\"2021-05-24T18:45:27.000000Z\",\"updated_at\":\"2021-05-24T18:45:27.000000Z\"}}', '2021-05-24 12:45:27', '2021-05-24 12:45:27'),
(46, 'Login History', 'This History Model has been created', 'App\\Models\\LoginHistory', 40, 'App\\User', 2, '[]', '2021-05-26 13:51:09', '2021-05-26 13:51:09'),
(47, 'Coupon', 'This Coupon has been created', 'App\\Models\\Coupon', 1, 'App\\User', 2, '{\"attributes\":{\"id\":1,\"category_id\":5,\"heading\":\"werwer\",\"image_path\":\"public\\/coupon\\/ar_60aeab4d05d5fWCMO7cGDhz.jpeg\",\"description\":\"<p>23432<\\/p>\",\"offer_brand\":\"etr\",\"expire_date\":\"2021-05-11\",\"download_limit\":231,\"total_download\":234324,\"price\":2323,\"term_condition\":\"4234324\",\"created_at\":\"2021-05-26T20:10:53.000000Z\",\"updated_at\":\"2021-05-26T20:10:53.000000Z\"}}', '2021-05-26 14:10:53', '2021-05-26 14:10:53'),
(48, 'Login History', 'This History Model has been created', 'App\\Models\\LoginHistory', 41, 'App\\User', 2, '[]', '2021-05-26 14:14:58', '2021-05-26 14:14:58'),
(49, 'Login History', 'This History Model has been created', 'App\\Models\\LoginHistory', 42, 'App\\User', 2, '[]', '2021-05-26 14:15:13', '2021-05-26 14:15:13'),
(50, 'Login History', 'This History Model has been created', 'App\\Models\\LoginHistory', 43, 'App\\User', 2, '[]', '2021-05-28 05:51:51', '2021-05-28 05:51:51'),
(51, 'Login History', 'This History Model has been created', 'App\\Models\\LoginHistory', 44, 'App\\User', 2, '[]', '2021-05-28 10:05:51', '2021-05-28 10:05:51'),
(52, 'Login History', 'This History Model has been created', 'App\\Models\\LoginHistory', 45, 'App\\User', 2, '[]', '2021-05-28 10:50:29', '2021-05-28 10:50:29'),
(53, 'Login History', 'This History Model has been created', 'App\\Models\\LoginHistory', 46, 'App\\User', 2, '[]', '2021-05-28 11:34:25', '2021-05-28 11:34:25'),
(54, 'Login History', 'This History Model has been created', 'App\\Models\\LoginHistory', 47, 'App\\User', 2, '[]', '2021-05-28 11:35:57', '2021-05-28 11:35:57'),
(55, 'Category', 'This Ip Address   has been created', 'App\\Models\\Category', 13, 'App\\User', 2, '{\"attributes\":{\"id\":13,\"name\":\"abc\",\"image_path\":null,\"type\":\"video\",\"status\":1,\"created_at\":\"2021-05-28T17:41:44.000000Z\",\"updated_at\":\"2021-05-28T17:41:44.000000Z\"}}', '2021-05-28 11:41:44', '2021-05-28 11:41:44'),
(56, 'Category', 'This Ip Address   has been updated', 'App\\Models\\Category', 2, 'App\\User', 2, '{\"attributes\":{\"id\":2,\"name\":\"video category\",\"image_path\":null,\"type\":\"video\",\"status\":1,\"created_at\":\"2021-05-04T12:13:31.000000Z\",\"updated_at\":\"2021-05-28T17:50:13.000000Z\"},\"old\":{\"id\":2,\"name\":\"video category\",\"image_path\":null,\"type\":\"video\",\"status\":0,\"created_at\":\"2021-05-04T12:13:31.000000Z\",\"updated_at\":\"2021-05-10T21:25:35.000000Z\"}}', '2021-05-28 11:50:13', '2021-05-28 11:50:13'),
(57, 'Category', 'This Ip Address   has been updated', 'App\\Models\\Category', 2, 'App\\User', 2, '{\"attributes\":{\"id\":2,\"name\":\"video category\",\"image_path\":null,\"type\":\"video\",\"status\":0,\"created_at\":\"2021-05-04T12:13:31.000000Z\",\"updated_at\":\"2021-05-28T17:50:23.000000Z\"},\"old\":{\"id\":2,\"name\":\"video category\",\"image_path\":null,\"type\":\"video\",\"status\":1,\"created_at\":\"2021-05-04T12:13:31.000000Z\",\"updated_at\":\"2021-05-28T17:50:13.000000Z\"}}', '2021-05-28 11:50:23', '2021-05-28 11:50:23'),
(58, 'Login History', 'This History Model has been created', 'App\\Models\\LoginHistory', 48, 'App\\User', 2, '[]', '2021-05-28 22:48:53', '2021-05-28 22:48:53'),
(59, 'Login History', 'This History Model has been created', 'App\\Models\\LoginHistory', 49, 'App\\User', 2, '[]', '2021-05-29 10:17:25', '2021-05-29 10:17:25'),
(60, 'Login History', 'This History Model has been created', 'App\\Models\\LoginHistory', 50, 'App\\User', 2, '[]', '2021-05-31 10:17:19', '2021-05-31 10:17:19'),
(61, 'Login History', 'This History Model has been created', 'App\\Models\\LoginHistory', 51, 'App\\User', 2, '[]', '2021-05-31 23:41:34', '2021-05-31 23:41:34');

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `is_google` tinyint(4) NOT NULL DEFAULT 0,
  `add_sense_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ad_image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_clicks` int(11) DEFAULT NULL,
  `website_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advertisements`
--

INSERT INTO `advertisements` (`id`, `is_google`, `add_sense_link`, `ad_image_path`, `total_clicks`, `website_link`, `status`, `created_at`, `updated_at`) VALUES
(11, 0, 'http://localhost/hongkong/public/advertisement/cp_signature_608bef218fb79RyfYKDrTlU.jpg', 'public/advertisement/ad_608fc9f6bded5fj6jNTpH9l.jpeg', 25, 'সাদসদাসদাস', 1, '2021-05-01 01:20:58', '2021-05-04 01:36:04'),
(13, 1, 'http://localhost/hongkong/public/advertisement/cp_signature_608bef218fb79RyfYKDrTlU.jpg', '', NULL, '', 1, '2021-05-01 23:01:44', '2021-05-03 07:06:12'),
(20, 0, NULL, 'public/advertisement/ad_60aafd2f6bc64NOuJ74jJF5.jpeg', NULL, 'asdsadsad', 1, '2021-05-23 19:11:11', '2021-05-23 19:11:11');

-- --------------------------------------------------------

--
-- Table structure for table `advertisement_logs`
--

CREATE TABLE `advertisement_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `advertisement_id` bigint(20) NOT NULL,
  `user_click` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advertisement_logs`
--

INSERT INTO `advertisement_logs` (`id`, `user_id`, `advertisement_id`, `user_click`, `created_at`, `updated_at`) VALUES
(9, 1, 11, 4, '2021-05-04 01:36:04', '2021-05-04 17:05:49');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_like` int(11) DEFAULT NULL,
  `total_bookmark` int(11) DEFAULT NULL,
  `total_share` int(11) DEFAULT NULL,
  `total_view` int(11) DEFAULT NULL,
  `post_date` date NOT NULL,
  `image_path` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `user_id`, `category_id`, `title`, `description`, `total_like`, `total_bookmark`, `total_share`, `total_view`, `post_date`, `image_path`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'This is Rain article that has category 2', NULL, 0, 0, NULL, NULL, '2021-05-24', 'public/article/ar_60998fc6d238fWxEy42jAF9.png', 1, '2021-05-10 12:32:04', '2021-05-18 04:44:48'),
(2, 2, 7, 'Sewing the title for eaxample is given', NULL, NULL, NULL, NULL, NULL, '2021-05-12', 'public/article/ad_60997ea283d63nZ6aQshWuD.jpg', 1, '2021-05-10 12:42:42', '2021-05-10 12:42:42'),
(3, 1, 9, 'This is Exerice example title', NULL, NULL, NULL, NULL, NULL, '2021-05-19', 'public/article/ad_60998415d177a0UeIIBob1m.jpg', 1, '2021-05-10 13:05:57', '2021-05-10 13:05:57'),
(4, 1, 5, 'Rain Example', NULL, 1, 1, 0, NULL, '2021-05-11', 'public/article/ar_6099911eeba6eND1RB8WAeV.png', 1, '2021-05-10 14:01:34', '2021-05-18 11:48:39'),
(5, 2, 1, 'werew', NULL, NULL, NULL, NULL, NULL, '2021-05-26', 'public/article/ar_60a3fed29b658n7PUr3dnpV.png', 1, '2021-05-18 11:52:18', '2021-05-18 11:52:18'),
(6, 2, 1, 'werwerewr', NULL, NULL, NULL, NULL, NULL, '2021-05-03', 'public/article/ar_60a3fee19c63aaK0xm53r8v.jpg', 1, '2021-05-18 11:52:33', '2021-05-18 11:52:33'),
(7, 1, 5, 'erter', NULL, NULL, NULL, NULL, NULL, '2021-05-05', 'public/article/ar_60a3fefca64657yCVXVhjqD.png', 1, '2021-05-18 11:53:00', '2021-05-18 11:53:00'),
(8, 2, 3, 'werwer', NULL, NULL, NULL, NULL, NULL, '2021-05-21', 'public/article/ar_60a3ff1c447f9GYNz4x2iu1.png', 1, '2021-05-18 11:53:32', '2021-05-18 11:53:32'),
(9, 1, 5, 'desc4iotion', '<p>werwer</p>', NULL, NULL, NULL, NULL, '2021-05-25', 'public/article/ar_60a409da90a8803myZ0EE1A.png', 1, '2021-05-18 12:39:22', '2021-05-18 12:39:22'),
(10, 1, 6, 'asdhuaish asudhiuashiduhasiuhduiahs iudhiuas', '<p>ewrwer werewrewr<br />asedasdsadasd</p>\r\n<p><br />sdsdsds</p>', NULL, NULL, NULL, NULL, '2021-05-18', 'public/article/ar_60a40a762af9frt5UJNEaKC.png', 1, '2021-05-18 12:41:58', '2021-05-18 12:41:58'),
(11, 2, 5, 'werwer', '<p>wer werwer werw erew</p>', NULL, NULL, NULL, NULL, '2021-05-20', 'public/article/ar_60a40ab7b416136dgfvpqnI.png', 1, '2021-05-18 12:43:03', '2021-05-18 12:43:03');

-- --------------------------------------------------------

--
-- Table structure for table `article_tags`
--

CREATE TABLE `article_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `article_id` bigint(20) DEFAULT NULL,
  `video_id` int(11) DEFAULT NULL,
  `tag_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `article_tags`
--

INSERT INTO `article_tags` (`id`, `article_id`, `video_id`, `tag_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'Health tag', 1, '2021-05-10 12:31:09', '2021-05-10 12:31:09'),
(2, 2, NULL, 'Rain', 1, '2021-05-10 12:32:04', '2021-05-10 12:32:04'),
(3, 2, NULL, 'Water', 1, '2021-05-10 12:32:04', '2021-05-10 12:32:04'),
(4, 3, NULL, 'Sewing', 1, '2021-05-10 12:42:42', '2021-05-10 12:42:42'),
(5, 3, NULL, 'Sewing 2', 1, '2021-05-10 12:42:42', '2021-05-10 12:42:42'),
(6, 4, NULL, 'Exercise', 1, '2021-05-10 13:05:57', '2021-05-10 13:05:57'),
(7, 5, NULL, 'test tag', 1, '2021-05-10 14:01:35', '2021-05-10 14:01:35'),
(8, 5, NULL, 'test2 tag', 1, '2021-05-10 14:01:35', '2021-05-10 14:01:35'),
(9, 5, NULL, 'more test3', 1, '2021-05-10 14:01:35', '2021-05-10 14:01:35'),
(10, 6, NULL, 'werew', 1, '2021-05-18 11:52:18', '2021-05-18 11:52:18'),
(11, 7, NULL, 'werwer', 1, '2021-05-18 11:52:33', '2021-05-18 11:52:33'),
(12, 8, NULL, 'erter', 1, '2021-05-18 11:53:00', '2021-05-18 11:53:00'),
(13, 8, NULL, 'ertert', 1, '2021-05-18 11:53:00', '2021-05-18 11:53:00'),
(14, 8, NULL, 'ertertre', 1, '2021-05-18 11:53:00', '2021-05-18 11:53:00'),
(15, 9, NULL, 'werwer', 1, '2021-05-18 11:53:32', '2021-05-18 11:53:32'),
(16, 10, NULL, 'rtytr', 1, '2021-05-18 12:39:22', '2021-05-18 12:39:22'),
(24, NULL, 7, 'video tag', 1, '2021-05-23 19:02:57', '2021-05-23 19:02:57'),
(25, NULL, 7, 'video tag 2', 1, '2021-05-23 19:02:57', '2021-05-23 19:02:57'),
(26, NULL, 8, 'werewr', 1, '2021-05-24 12:45:27', '2021-05-24 12:45:27'),
(27, NULL, 8, 'werew', 1, '2021-05-24 12:45:27', '2021-05-24 12:45:27'),
(28, NULL, 8, 'werwerewr', 1, '2021-05-24 12:45:27', '2021-05-24 12:45:27');

-- --------------------------------------------------------

--
-- Table structure for table `article_users`
--

CREATE TABLE `article_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `article_id` bigint(20) DEFAULT NULL,
  `video_id` int(11) DEFAULT NULL,
  `user_like` int(11) DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT NULL,
  `user_bookmark` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `article_users`
--

INSERT INTO `article_users` (`id`, `user_id`, `article_id`, `video_id`, `user_like`, `is_read`, `user_bookmark`, `created_at`, `updated_at`) VALUES
(9, 2, 5, NULL, 1, NULL, 1, '2021-05-18 11:48:14', '2021-05-18 11:48:39'),
(11, 1, NULL, 1, NULL, NULL, NULL, '2021-05-25 08:28:03', '2021-05-25 08:28:30');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'article,video',
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image_path`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'article category', 'public/category/File_20210526-222544.jpg', 'article', 1, '2021-05-18 06:13:26', '2021-05-06 22:29:58'),
(2, 'video category', NULL, 'video', 0, '2021-05-04 06:13:31', '2021-05-28 11:50:23'),
(3, 'Heath\r\n', 'public/category/work alamin vai.png', 'article', 1, '2021-05-18 06:13:26', '2021-05-11 06:13:28'),
(4, 'sleep\r\n', NULL, 'artile', 1, '2021-05-18 06:13:26', '2021-05-11 06:13:28'),
(5, 'rain\r\n', NULL, 'article', 1, '2021-05-18 06:13:26', '2021-05-11 06:13:28'),
(6, 'Hair\r\n', NULL, 'article', 1, '2021-05-18 06:13:26', '2021-05-11 06:13:28'),
(7, 'Sewing ', NULL, 'article', 1, '2021-05-18 06:13:26', '2021-05-11 06:13:28'),
(8, 'bed', NULL, 'article', 1, '2021-05-18 06:13:26', '2021-05-11 06:13:28'),
(9, 'exercise ', NULL, 'article', 1, '2021-05-18 06:13:26', '2021-05-11 06:13:28'),
(10, 'Book', NULL, 'article', 1, '2021-05-10 13:04:05', '2021-05-10 13:04:14'),
(11, 'Video Category 2', NULL, 'video', 1, '2021-05-10 15:25:03', '2021-05-10 15:25:03'),
(12, 'Test video', NULL, 'video', 1, '2021-05-10 22:46:42', '2021-05-10 22:46:42');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `heading` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `offer_brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expire_date` date NOT NULL,
  `download_limit` int(11) DEFAULT NULL,
  `total_download` int(11) NOT NULL,
  `price` double(8,2) NOT NULL,
  `term_condition` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `category_id`, `heading`, `image_path`, `description`, `offer_brand`, `expire_date`, `download_limit`, `total_download`, `price`, `term_condition`, `created_at`, `updated_at`) VALUES
(1, 5, 'werwer', 'public/coupon/ar_60aeab4d05d5fWCMO7cGDhz.jpeg', '<p>23432</p>', 'etr', '2021-05-11', 231, 234324, 2323.00, '4234324', '2021-05-26 14:10:53', '2021-05-26 14:10:53');

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
-- Table structure for table `industries`
--

CREATE TABLE `industries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `industries`
--

INSERT INTO `industries` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'doctor', 1, '2021-04-20 17:17:29', '2021-04-20 17:21:54'),
(2, 'Eng inner ', 1, '2021-04-20 17:17:29', '2021-04-20 17:21:54');

-- --------------------------------------------------------

--
-- Table structure for table `ipaddresses`
--

CREATE TABLE `ipaddresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ipaddresses`
--

INSERT INTO `ipaddresses` (`id`, `user_id`, `ip_address`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, '21321312', 1, '2021-04-30 06:00:03', '2021-04-30 06:00:03'),
(2, 5, 'sdfsdf', 0, '2021-04-30 06:01:02', '2021-04-30 06:01:02');

-- --------------------------------------------------------

--
-- Table structure for table `linked_social_accounts`
--

CREATE TABLE `linked_social_accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `linked_social_accounts`
--

INSERT INTO `linked_social_accounts` (`id`, `provider_id`, `provider_name`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '110670449965507761832', 'google', 1, '2021-04-21 00:07:29', '2021-04-21 00:07:29');

-- --------------------------------------------------------

--
-- Table structure for table `login_histories`
--

CREATE TABLE `login_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `login_time` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `login_histories`
--

INSERT INTO `login_histories` (`id`, `user_id`, `ip_address`, `status`, `login_time`, `created_at`, `updated_at`) VALUES
(1, 2, '127.0.0.1', 1, '2021-04-22 11:32:12', '2021-04-22 05:32:12', '2021-04-22 05:32:12'),
(2, 2, '127.0.0.1', 1, '2021-04-23 17:06:41', '2021-04-23 11:06:41', '2021-04-23 11:06:41'),
(3, 2, '127.0.0.1', 1, '2021-04-24 16:19:46', '2021-04-24 10:19:46', '2021-04-24 10:19:46'),
(4, 2, '127.0.0.1', 1, '2021-04-25 16:44:28', '2021-04-25 10:44:28', '2021-04-25 10:44:28'),
(5, 2, '127.0.0.1', 4, '2021-04-25 17:05:45', '2021-04-25 11:05:45', '2021-04-25 11:05:45'),
(6, 2, '127.0.0.1', 1, '2021-04-25 18:10:14', '2021-04-25 12:10:14', '2021-04-25 12:10:14'),
(7, 2, '127.0.0.1', 1, '2021-04-26 05:27:35', '2021-04-25 23:27:35', '2021-04-25 23:27:35'),
(8, 2, '127.0.0.1', 1, '2021-04-26 20:57:34', '2021-04-26 14:57:34', '2021-04-26 14:57:34'),
(9, 2, '::1', 1, '2021-04-26 21:09:26', '2021-04-26 15:09:26', '2021-04-26 15:09:26'),
(10, 2, '127.0.0.1', 1, '2021-04-27 15:15:26', '2021-04-27 09:15:26', '2021-04-27 09:15:26'),
(11, 2, '127.0.0.1', 1, '2021-04-28 06:30:06', '2021-04-28 00:30:06', '2021-04-28 00:30:06'),
(12, 2, '127.0.0.1', 1, '2021-04-28 08:55:37', '2021-04-28 02:55:37', '2021-04-28 02:55:37'),
(13, 2, '127.0.0.1', 1, '2021-04-30 06:04:39', '2021-04-30 00:04:39', '2021-04-30 00:04:39'),
(14, 2, '127.0.0.1', 1, '2021-04-30 09:04:09', '2021-04-30 03:04:09', '2021-04-30 03:04:09'),
(15, 2, '127.0.0.1', 1, '2021-04-30 11:16:16', '2021-04-30 05:16:16', '2021-04-30 05:16:16'),
(16, 2, '127.0.0.1', 1, '2021-04-30 18:02:45', '2021-04-30 12:02:45', '2021-04-30 12:02:45'),
(17, 2, '127.0.0.1', 1, '2021-05-01 06:07:22', '2021-05-01 00:07:22', '2021-05-01 00:07:22'),
(18, 2, '127.0.0.1', 1, '2021-05-02 04:17:22', '2021-05-01 22:17:22', '2021-05-01 22:17:22'),
(19, 2, '127.0.0.1', 1, '2021-05-03 06:00:48', '2021-05-03 00:00:48', '2021-05-03 00:00:48'),
(20, 2, '127.0.0.1', 1, '2021-05-03 13:05:42', '2021-05-03 07:05:42', '2021-05-03 07:05:42'),
(21, 2, '127.0.0.1', 1, '2021-05-07 03:56:26', '2021-05-06 21:56:26', '2021-05-06 21:56:26'),
(22, 2, '127.0.0.1', 1, '2021-05-07 17:53:00', '2021-05-07 11:53:00', '2021-05-07 11:53:00'),
(23, 2, '127.0.0.1', 1, '2021-05-09 10:06:08', '2021-05-09 04:06:08', '2021-05-09 04:06:08'),
(24, 2, '127.0.0.1', 1, '2021-05-10 05:23:40', '2021-05-09 23:23:40', '2021-05-09 23:23:40'),
(25, 2, '127.0.0.1', 1, '2021-05-10 16:30:43', '2021-05-10 10:30:43', '2021-05-10 10:30:43'),
(26, 2, '127.0.0.1', 1, '2021-05-11 04:44:24', '2021-05-10 22:44:24', '2021-05-10 22:44:24'),
(27, 2, '127.0.0.1', 1, '2021-05-11 08:07:01', '2021-05-11 02:07:01', '2021-05-11 02:07:01'),
(28, 2, '127.0.0.1', 1, '2021-05-17 19:25:12', '2021-05-17 13:25:12', '2021-05-17 13:25:12'),
(29, 2, '127.0.0.1', 1, '2021-05-18 02:59:40', '2021-05-17 20:59:40', '2021-05-17 20:59:40'),
(30, 2, '127.0.0.1', 1, '2021-05-18 09:40:30', '2021-05-18 03:40:30', '2021-05-18 03:40:30'),
(31, 2, '127.0.0.1', 1, '2021-05-18 17:52:02', '2021-05-18 11:52:02', '2021-05-18 11:52:02'),
(32, 2, '127.0.0.1', 1, '2021-05-22 18:13:53', '2021-05-22 12:13:53', '2021-05-22 12:13:53'),
(33, 2, '::1', 1, '2021-05-22 19:03:07', '2021-05-22 13:03:07', '2021-05-22 13:03:07'),
(34, 2, '127.0.0.1', 1, '2021-05-23 15:24:20', '2021-05-23 09:24:20', '2021-05-23 09:24:20'),
(35, 2, '::1', 1, '2021-05-23 17:18:42', '2021-05-23 11:18:42', '2021-05-23 11:18:42'),
(36, 2, '127.0.0.1', 1, '2021-05-23 18:02:23', '2021-05-23 12:02:23', '2021-05-23 12:02:23'),
(37, 2, '127.0.0.1', 1, '2021-05-24 00:59:57', '2021-05-23 18:59:57', '2021-05-23 18:59:57'),
(38, 2, '::1', 1, '2021-05-24 01:10:58', '2021-05-23 19:10:58', '2021-05-23 19:10:58'),
(39, 2, '127.0.0.1', 1, '2021-05-24 18:44:31', '2021-05-24 12:44:31', '2021-05-24 12:44:31'),
(40, 2, '127.0.0.1', 1, '2021-05-26 19:51:09', '2021-05-26 13:51:09', '2021-05-26 13:51:09'),
(41, 2, '127.0.0.1', 4, '2021-05-26 20:14:58', '2021-05-26 14:14:58', '2021-05-26 14:14:58'),
(42, 2, '127.0.0.1', 1, '2021-05-26 20:15:13', '2021-05-26 14:15:13', '2021-05-26 14:15:13'),
(43, 2, '127.0.0.1', 1, '2021-05-28 11:51:51', '2021-05-28 05:51:51', '2021-05-28 05:51:51'),
(44, 2, '127.0.0.1', 1, '2021-05-28 16:05:51', '2021-05-28 10:05:51', '2021-05-28 10:05:51'),
(45, 2, '::1', 1, '2021-05-28 16:50:29', '2021-05-28 10:50:29', '2021-05-28 10:50:29'),
(46, 2, '::1', 4, '2021-05-28 17:34:25', '2021-05-28 11:34:25', '2021-05-28 11:34:25'),
(47, 2, '::1', 1, '2021-05-28 17:35:57', '2021-05-28 11:35:57', '2021-05-28 11:35:57'),
(48, 2, '::1', 1, '2021-05-29 04:48:53', '2021-05-28 22:48:53', '2021-05-28 22:48:53'),
(49, 2, '::1', 1, '2021-05-29 16:17:25', '2021-05-29 10:17:25', '2021-05-29 10:17:25'),
(50, 2, '::1', 1, '2021-05-31 16:17:19', '2021-05-31 10:17:19', '2021-05-31 10:17:19'),
(51, 2, '::1', 1, '2021-06-01 05:41:34', '2021-05-31 23:41:34', '2021-05-31 23:41:34');

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
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2021_01_24_072356_create_states_table', 1),
(10, '2021_01_24_081410_create_reports_table', 1),
(11, '2021_04_13_215307_create_salaries_table', 1),
(12, '2021_04_14_025000_create_industries_table', 1),
(13, '2021_04_18_042158_create_linked_social_accounts_table', 1),
(14, ' \'2021_03_14_140609_create_permission_tables\',', 1),
(15, '2021_01_24_072124_create_countries_table', 2),
(16, '2021_03_04_153255_create_ipaddresses_table', 3),
(17, '2021_03_09_135403_create_login_histories_table', 4),
(18, '2021_03_14_140609_create_permission_tables', 1),
(19, '2021_03_16_060009_create_projects_table', 5),
(20, '2021_03_16_060025_create_clients_table', 5),
(21, '2021_03_31_071404_create_invoices_table', 6),
(22, '2021_04_21_223406_add_user_type_to_users_table', 6),
(27, '2021_04_22_072530_create_articles_table', 8),
(28, '2021_04_22_072953_create_article_tags_table', 8),
(31, '2021_04_26_131136_create_article_users_table', 10),
(32, '2021_04_28_074528_create_videos_table', 11),
(34, '2021_04_26_090321_create_advertisements_table', 12),
(37, '2021_04_22_064600_create_categories_table', 13),
(38, '2021_05_04_063527_create_advertisement_logs_table', 14),
(40, '2021_05_26_155952_create_coupons_table', 15),
(41, '2021_05_26_161239_create_models_user_coupon_relations_table', 15),
(42, '2021_05_26_161250_create_user_coupon_relations_table', 15),
(43, '2021_05_28_165657_create_quiz_types_table', 16),
(44, '2021_05_28_183609_create_quizes_table', 17),
(45, '2021_05_28_193350_create_quizzes_table', 18),
(46, '2021_05_29_050639_create_quiz_questions_table', 19),
(47, '2021_05_29_052931_create_quiz_options_table', 20);

-- --------------------------------------------------------

--
-- Table structure for table `models_user_coupon_relations`
--

CREATE TABLE `models_user_coupon_relations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'App\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('260fe24830228d79d4edbb52fd06e50c41bd21a0a0924e2f8b8cd7817de8d1da2767167bf278f8aa', 2, 3, 'Personal Access Token', '[]', 0, '2021-05-25 08:19:41', '2021-05-25 08:19:41', '2021-05-26 14:19:40'),
('27711b0be67a30162f8fb364f177ba85d5d01bdf7a63c5eed4dcd64db54a6ed83dd8b84e5013b386', 2, 3, 'Personal Access Token', '[]', 0, '2021-05-07 03:53:06', '2021-05-07 03:53:06', '2021-05-08 09:53:06'),
('2e6ef40fffb8f8ed53d5d7ecb8c605124fe42067b075d481fc0209968b498aaa7326da50be4beaec', 2, 3, 'Personal Access Token', '[]', 0, '2021-05-10 03:11:48', '2021-05-10 03:11:48', '2021-05-11 09:11:47'),
('3a384dc26d6549fa05120ddb4c67f8a0878d1e20ef06a0739097a3cc0f0066a3222d69072e0c5f4d', 2, 3, 'Personal Access Token', '[]', 0, '2021-05-18 10:27:27', '2021-05-18 10:27:27', '2021-05-19 16:27:26'),
('a763b0b522b49da26e8b17f71b0fce7546e699ad252d1bee9902b8f35e03b14582e8b8e90702c509', 2, 3, 'Personal Access Token', '[]', 0, '2021-05-10 06:27:51', '2021-05-10 06:27:51', '2021-05-11 12:27:51'),
('b4f565e5b3167169558413608472fb966e3cc8f6abdca1d82e676da9c818449903220a4380f2710c', 2, 3, 'Personal Access Token', '[]', 0, '2021-05-11 01:33:59', '2021-05-11 01:33:59', '2021-05-12 07:33:58'),
('ef679dc77999b8b65aba2ca6ba3b234dab336d6c6493d5f5cf28689cd2e5c6d2c17ce56a96265d6c', 2, 3, 'Personal Access Token', '[]', 0, '2021-05-18 04:40:52', '2021-05-18 04:40:52', '2021-05-19 10:40:51');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'V7gaJhtnMsf8rQ93Z2b6CdHJgyw82d2yDbnKo41m', NULL, 'http://localhost', 1, 0, 0, '2021-04-18 11:11:35', '2021-04-18 11:11:35'),
(2, NULL, 'Laravel Password Grant Client', 'aql6aszXGNtt1acOaK6eW3fGaiumfx49HdqUBnOs', 'users', 'http://localhost', 0, 1, 0, '2021-04-18 11:11:35', '2021-04-18 11:11:35'),
(3, NULL, 'Laravel Personal Access Client', 'HwPpDIudcAJR9yXCfLpWi6ga8H78xVhEMg8ljIyE', NULL, 'http://localhost', 1, 0, 0, '2021-04-22 05:04:45', '2021-04-22 05:04:45'),
(4, NULL, 'Laravel Password Grant Client', 'e0Okd1CNwam3uRwXeMhIuhGVmi8KWcBoir9DuJXm', 'users', 'http://localhost', 0, 1, 0, '2021-04-22 05:04:45', '2021-04-22 05:04:45');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(2, 3, '2021-04-22 05:04:45', '2021-04-22 05:04:45');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_refresh_tokens`
--

INSERT INTO `oauth_refresh_tokens` (`id`, `access_token_id`, `revoked`, `expires_at`) VALUES
('02409a39e2a7779dae270b043a3ee1575a7282d655a05583fd9b6c552e60c74d8e7cf1e39e7c030b', 'a26af4111c80516c0e8bca3be7ce6e544f2037f567f23ce58c51885828de7bd2843c1316874e8164', 0, '2021-05-21 20:15:14'),
('02975adc0b3624f35a73d1631161434eb1760872acb8c7dc9ad1a898e3138bc3b46d4d3f8562d2b5', 'e4d094705bca02b54418e7fdff8d7bab0aa6896638c410e28e6e2ea3e8760ff89c8d9236abed3111', 0, '2021-05-21 20:25:53'),
('1e8fc5b017825083d20f4377d94db93763f87043e86026554a241967d18e6d19bf387989812e5dd3', 'f873635269762dceba8dd4224d855a6ce7d9f8a96a173f3b8520bcc02b1378f04a807c35e08a6b86', 0, '2021-05-21 06:16:02'),
('389f42c4efbf60e4c6ef887b832608d2041e6ef1ab7b1564fd0e3113bdd5a1e5f0e53777f0fb6195', '0c76310d0f17e09357720114ff1d28b623de5e81be23b4082df8274ac9377f7ece43c29bc156dfe2', 0, '2021-05-21 20:38:08'),
('3ce02150d51e3105b7153745cab63f48bcf96cf2e4532eb89303e26f62a2732a53f520a2d8257402', 'a9efeb8d23118c507f2dd4ca7f4f15f626197b91e979adc3240224650eb7ec5c541c688b39f89587', 0, '2021-05-21 20:40:04'),
('603050f45b2369844d1cd135712bd5f483ea49714d24a725f1e87346a7cf5ca0e6359e24d5010f49', '9a9c48c345913cf4d4e3e0759c1afbaf991cfde60af056d610b7005b60f77e9a17fe61358949722d', 0, '2021-05-21 06:07:29'),
('6e21aa362544335524b582d98c16b08827a0f4e0c5be65dd7002e53acd21131e35d4fcbf9b1b946e', 'd97e2b02a0a15b5e4353df89f4ffea86b21ebfdc4ff75cf0831bd403d224c7eeb91225980c7cf6b0', 0, '2021-05-21 06:16:41'),
('746f189b25314b3caa7c65d2811d855dbd453a6419f8f9fad0f067986a0c8384e6bfd04b17bcc777', 'dd67b64c473744f958a7c8ec4b026a1b14fa319c8637b2b5a5b1183876a72f51798d9b5df835f10f', 0, '2021-05-21 20:37:04'),
('7a30db4e30984ae8643a1dafd6123b390da38de8b9586905bced18615ca4cf1ab459f6675eee7a07', '4ddee9455c919a84ca01755b2013e7e6a530ba5b8e96e9af985ef339de9e5857ad365a51822c7e2d', 0, '2021-05-21 20:37:29'),
('80321b0219363f07fe8861994a861c43a01017c0b7799fce2a585058fba88b65894d1bb4f87ce906', '85c0e4ad1b4fa45a17e2626fbb2a268b6626e613b344abf5826d9c4d8767bfd363f4ce82eed4ff76', 0, '2021-05-21 20:39:20'),
('8654296d3f9f9f76a39c4b29db92ac02eb61318898f17139d6df42e8fe17ea6edd9c95d3453c4965', '900883b51589db8c2781965eba6c6418bbd7abb563265eefcfd8d1652e734bc7900818077565f1a6', 0, '2021-05-21 20:32:26'),
('88539e6f7a7dcc0fa50b191d1b813be57bdfbe3c903c65598e8749d1aad9ff7e931bfbc62eda571b', '24520890d55a50e5e9cfe3ab3ce37c562cb9b4b680a78be671e46f4593169b8f6c95c00a82b4e986', 0, '2021-05-21 06:17:27'),
('92c17051eaa6e7b2bf004b62c1342a0058c9d50d75b8001fc72caa63059776e81be805479ed3b410', 'd407d7df3a6cd64e288a83c14a8f948f6cf785c925965a4297a88aa86ebba68159c8b2b3e1e001ef', 0, '2021-05-21 05:55:08'),
('a44d86118200f4377d306415ee483e70cc327b47b1dfd5130162c0132cc790bec49becf294cebee1', '81166ca51a4fc94b9045e5459d97d867fd39484086ccd40b239cd007d9833496c3709781a120284d', 0, '2021-05-21 05:51:08'),
('a664d89d621c3470bdd1ae8cb4b0165bf7e51a8e95db9498c7311a42f998983f88ecc47176e87232', 'cfbd230edabab3bfe464aaa9882645949530eec8c2ebd6c93dcf2f6b0a382c9725c49326fab0e127', 0, '2021-05-21 05:50:23'),
('aea2b2055fe3250996b089f09a76a7ed49603ddb5f09413290ccde1fc8d9f395951dd32c426e450a', 'db583017417342654ba74c359eb125285668de166f524bf1bfa507788cd3301f8e196d240cbcb703', 0, '2021-05-21 06:15:59'),
('be942c9c7af3aac9a18b90d3ae27b7a78b84c56bef1f04a52416e1182c5e25f9af9357b634100217', '7e33349918c5f558f07a1460a0fbdf0f00a2710540067f1023682cbbccb706792e16826c3a35cf66', 0, '2021-05-21 05:52:56'),
('c95e2c816f5e5b0413d588e707417c60b21c2cd0ab76e930875a57892a87db47ce70034d9b2d1b24', '18ec460d40ca3f74a34a708b21e1273a57f7068987091bf8286e5bd217eed842aec743cf2948787d', 0, '2021-05-21 20:08:29'),
('d798d52ea9493c377abe7881a1ffe90a5279da8e84fdc6c797883bf38ae0cc5960ada985a32e57bc', '8e06321e7775f43a3b48627998ae467918ff93c76615e71b19c9541ebf2c500a2397b7809e572084', 0, '2021-05-21 20:37:27'),
('dd607a0bcc53f247c7317605ccbfe6bbc17bb83718932edb4a3551f7b0d6b6dcbfea820d491d036c', '79464962e42d546f29408bccd4f2574100450d10d3d6d0a5373a1ba39c6a60f929409bb1961cfb9c', 0, '2021-05-21 05:58:26'),
('fbcbcd977fc7920fccda0edc3837de7f2a3da5967e5e6dacbbd8b8221ca53e2bc78b5ed9e6ed95a1', '7fa8bf6bdc5eef798e653b44bc151bf21d6b7485dae2970d576789cba7a725925d1ef29455acdc71', 0, '2021-05-21 20:37:47');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('alamin209209@gmail.com', '$2y$10$EqAjPkrxG6QFLYuT5cpxj.QqNm5Dhvgq2bycDPE/nbnQJ/jhruqIu', '2021-05-05 06:18:11');

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
(1, 'role-list', 'web', '2021-03-29 01:58:46', '2021-03-29 01:58:46'),
(2, 'role-create', 'web', '2021-03-29 01:58:46', '2021-03-29 01:58:46'),
(3, 'role-edit', 'web', '2021-03-29 01:58:46', '2021-03-29 01:58:46'),
(4, 'role-delete', 'web', '2021-03-29 01:58:46', '2021-03-29 01:58:46'),
(5, 'ipaddress-list', 'web', '2021-03-29 01:58:46', '2021-03-29 01:58:46'),
(6, 'ipaddress-create', 'web', '2021-03-29 01:58:46', '2021-03-29 01:58:46'),
(7, 'ipaddress-edit', 'web', '2021-03-29 01:58:46', '2021-03-29 01:58:46'),
(8, 'ipaddress-delete', 'web', '2021-03-29 01:58:46', '2021-03-29 01:58:46');

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quiz_type_id` bigint(20) NOT NULL,
  `heading` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_view` int(11) DEFAULT NULL,
  `tota_share` int(11) DEFAULT NULL,
  `total_download` int(11) DEFAULT NULL,
  `total_point` int(11) DEFAULT NULL,
  `total_question` int(11) DEFAULT NULL,
  `total_min` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `question_ready` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `quiz_type_id`, `heading`, `description`, `image_path`, `total_view`, `tota_share`, `total_download`, `total_point`, `total_question`, `total_min`, `status`, `question_ready`, `created_at`, `updated_at`) VALUES
(2, 7, 'General Quiz', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quas vel architecto unde qui esse similique corporis fuga libero ex, quia quae inventore impedit. Distinctio, suscipit ullam quod, pariatur dolorem delectus.', 'public/quiz/ad_60b26ba5c4beakdTH7wnuN6.jpg', 1, 2, 3, 4, 3, 5, 1, 1, '2021-05-28 23:04:29', '2021-05-29 10:28:21'),
(6, 7, 'Technical Quiz', 'test', 'public/quiz/qtype_60b5eae79325ePFTfwc9SNO.jpg', 1, 1, 1, 1, 1, 1, 1, 1, '2021-06-01 02:08:07', '2021-06-01 02:39:53');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_options`
--

CREATE TABLE `quiz_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quiz_id` bigint(20) DEFAULT NULL,
  `quiz_question_id` bigint(20) NOT NULL,
  `option_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `correct_answer` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz_options`
--

INSERT INTO `quiz_options` (`id`, `quiz_id`, `quiz_question_id`, `option_1`, `option_2`, `option_3`, `option_4`, `correct_answer`, `created_at`, `updated_at`) VALUES
(21, 2, 25, 'largest railway station', 'highest railway station', 'longest railway station', 'None of the above', '[\"largest railway station\"]', '2021-05-29 10:24:08', '2021-05-29 10:29:50'),
(22, 2, 26, 'Behavior of human beings', 'Insects', 'null', 'null', '[\"Insects\"]', '2021-05-29 10:24:08', '2021-06-01 01:04:42'),
(23, 2, 27, 'Asia', 'Africa', 'Europe', 'Australia', '[\"Africa\"]', '2021-05-29 10:24:08', '2021-06-01 01:05:34'),
(43, 6, 47, '1', '2', '3', '4', '[\"1\"]', '2021-06-01 02:39:53', '2021-06-01 02:39:53');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_questions`
--

CREATE TABLE `quiz_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quiz_id` bigint(20) NOT NULL,
  `name` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'multiple,true/false',
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz_questions`
--

INSERT INTO `quiz_questions` (`id`, `quiz_id`, `name`, `type`, `status`, `created_at`, `updated_at`) VALUES
(25, 2, 'Grand Central Terminal, Park Avenue, New York is the world\'s', 'multiple', 1, '2021-05-29 10:24:08', '2021-05-29 10:29:50'),
(26, 2, 'Entomology is the science that studies', 'single', 1, '2021-05-29 10:24:08', '2021-05-29 10:31:04'),
(27, 2, 'Eritrea, which became the 182nd member of the UN in 1993, is in the continent of', 'multiple', 1, '2021-05-29 10:24:08', '2021-05-29 10:32:44'),
(47, 6, 'John Martin', 'multiple', 1, '2021-06-01 02:39:53', '2021-06-01 02:39:53');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_types`
--

CREATE TABLE `quiz_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz_types`
--

INSERT INTO `quiz_types` (`id`, `name`, `image_path`, `status`, `created_at`, `updated_at`) VALUES
(7, 'General', 'public/quiz-type/ad_60b26b38ee8b6bdjx6SIzQl.jpg', 1, '2021-05-28 13:07:26', '2021-05-29 10:26:33');

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
(1, 'Admin', 'web', '2021-03-29 01:58:46', '2021-03-29 01:58:46');

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
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `salary_range` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_pic` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sex` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `industry_id` int(11) DEFAULT NULL,
  `salary_range_id` int(11) DEFAULT NULL,
  `referral_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `profile_pic`, `sex`, `industry_id`, `salary_range_id`, `referral_code`, `email_verified_at`, `status`, `password`, `remember_token`, `created_at`, `updated_at`, `user_type`) VALUES
(1, 'al-amin_hossainmind_life', 'alamin209209@gmail.com', 'https://lh5.googleusercontent.com/-9S33dmSeYgQ/AAAAAAAAAAI/AAAAAAAAAAA/AMZuucnEXYFy3mMQISfBSLntpYIANBF-zw/s96-c/photo.jpg', NULL, NULL, NULL, NULL, '2021-04-01 17:17:42', 1, ' $2y$12$sS8M/387jsQsD.heKGIED.VsigSDL..fS8ZAdgpI0jIUSNChjmea2', NULL, '2021-04-21 00:07:29', '2021-04-21 00:07:29', 'staff'),
(2, 'pennyyau88', 'penny@gmail.com', 'upload/6080fd0fcdd1b_work_alamin_vai.png', 'Male', 1, 1, NULL, NULL, 1, '$2y$10$iXozHroOsAgG3w3BORt6ieQCxLWAD310nO0vj5WgJes4roXizpMv.', NULL, '2021-04-21 22:35:27', '2021-04-21 22:35:27', 'admin'),
(3, 'pennyssyau88', 'pennyss@gmail.com', 'upload/6081c4d4b291f_work_alamin_vai.png', 'Male', 1, 1, NULL, NULL, 1, '$2y$10$XArP6dlvguLm.wFZY5Bpqe8UTmPWHL/sj8UQyK4vKEdfP2PAZy5yG', NULL, '2021-04-22 12:47:48', '2021-04-22 12:47:48', NULL),
(4, 'pennysssdsdsdyau88', 'pennysdsdsdsss@gmail.coms', 'upload/6081c60ca97f4_work_alamin_vai.png', 'Male', 1, 1, NULL, NULL, 1, '$2y$10$yisaAaXJOxG9xN4ZIrvuV.licvBu40GuAmuHdV5/3lqpHoCXCk/7m', NULL, '2021-04-22 12:53:00', '2021-04-22 12:53:00', NULL),
(5, 'pennyssssdsdsdsdsdyau88', 'pennysdsdsdsdsdsss@gmail.coms', 'upload/608bedfb73ba7_work_alamin_vai.png', 'Male', 1, 1, NULL, NULL, 1, '$2y$10$.zWDuV8AvR8DqLfBwG0Kx.heyKdJ1jID0vyojDUEKFL.CvuT1LPfS', NULL, '2021-04-30 05:46:03', '2021-04-30 05:46:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_coupon_relations`
--

CREATE TABLE `user_coupon_relations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `coupon_id` bigint(20) NOT NULL,
  `is_redeemed` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_like` int(11) DEFAULT NULL,
  `total_bookmark` int(11) DEFAULT NULL,
  `total_download` int(11) DEFAULT NULL,
  `total_share` int(11) DEFAULT NULL,
  `total_view` int(11) DEFAULT NULL,
  `post_date` date DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `user_id`, `category_id`, `title`, `type`, `video_path`, `youtube_link`, `total_like`, `total_bookmark`, `total_download`, `total_share`, `total_view`, `post_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, NULL, 'directly', 'public/article/demo_video.mp4', NULL, 0, 0, NULL, 4, 4, NULL, 1, '2021-05-11 05:10:47', '2021-05-25 08:28:30'),
(2, 1, 2, NULL, 'link', 'sdfsdf', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/prJIrUgIN9Y\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>list=PLylMDDjFIp1Dc_dgUY7q3TEG86RzXnR5P&index=14', NULL, 0, NULL, NULL, NULL, NULL, 1, '2021-05-11 05:10:52', '2021-05-05 05:10:54'),
(3, 1, 11, 'ertre', 'link', NULL, 'https://www.youtube.com/watch?v=G2fnlWaJNFE&list=PLFZAa7EupbB4OPoiMcFVY6KaNsJA8CY_B', NULL, NULL, NULL, NULL, NULL, '2021-05-26', 1, '2021-05-23 12:51:28', '2021-05-23 12:51:28'),
(4, 1, 11, 'ertert', 'directly', 'article/ar_60aaa4ed5669daRUKAi75t6.mp4', NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-18', 1, '2021-05-23 12:54:37', '2021-05-23 12:54:37'),
(5, 2, 12, 'ert', 'directly', 'public/article/ar_60aaa52179652aI1GfGDtgP.mp4', NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-19', 1, '2021-05-23 12:55:29', '2021-05-23 12:55:29'),
(6, 1, 11, 'sdfds', 'directly', 'public/article/ar_60aafab8e064aKLd5q4wKGt.mp4', NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-11', 1, '2021-05-23 19:00:40', '2021-05-23 19:00:40'),
(7, 1, 11, 'sdfds', 'directly', 'public/article/ar_60aafb4186d3dPoryVlabJ3.mp4', NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-11', 1, '2021-05-23 19:02:57', '2021-05-23 19:02:57'),
(8, 1, 11, 'asds', 'directly', 'public/article/ar_60abf447672e1m7vcLluXGh.mp4', NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-18', 1, '2021-05-24 12:45:27', '2021-05-24 12:45:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advertisement_logs`
--
ALTER TABLE `advertisement_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article_tags`
--
ALTER TABLE `article_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article_users`
--
ALTER TABLE `article_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `industries`
--
ALTER TABLE `industries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ipaddresses`
--
ALTER TABLE `ipaddresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `linked_social_accounts`
--
ALTER TABLE `linked_social_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `linked_social_accounts_user_id_foreign` (`user_id`);

--
-- Indexes for table `login_histories`
--
ALTER TABLE `login_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `models_user_coupon_relations`
--
ALTER TABLE `models_user_coupon_relations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`),
  ADD KEY `model_id` (`model_id`),
  ADD KEY `model_type` (`model_type`(191)),
  ADD KEY `model_id_2` (`model_id`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_options`
--
ALTER TABLE `quiz_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_types`
--
ALTER TABLE `quiz_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_coupon_relations`
--
ALTER TABLE `user_coupon_relations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `advertisement_logs`
--
ALTER TABLE `advertisement_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `article_tags`
--
ALTER TABLE `article_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `article_users`
--
ALTER TABLE `article_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `industries`
--
ALTER TABLE `industries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ipaddresses`
--
ALTER TABLE `ipaddresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `linked_social_accounts`
--
ALTER TABLE `linked_social_accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login_histories`
--
ALTER TABLE `login_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `models_user_coupon_relations`
--
ALTER TABLE `models_user_coupon_relations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  MODIFY `role_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `quiz_options`
--
ALTER TABLE `quiz_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `quiz_types`
--
ALTER TABLE `quiz_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_coupon_relations`
--
ALTER TABLE `user_coupon_relations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `linked_social_accounts`
--
ALTER TABLE `linked_social_accounts`
  ADD CONSTRAINT `linked_social_accounts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
