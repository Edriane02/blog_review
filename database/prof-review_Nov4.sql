-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 04, 2024 at 02:30 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prof-review`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE IF NOT EXISTS `admin_users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `welcome_valid_until` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_users_user_id_unique` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `user_id`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `welcome_valid_until`) VALUES
(1, '0900000001', 'edit_edrianetan312@gmail.com', NULL, '$2y$12$NIf2.rEoAk.UdBSaFGji4OJckqerCmVwvK5uAgrmkkDxB6HLRV6pG', NULL, NULL, '2024-11-04 21:49:05', NULL),
(2, '0900000002', 'simon@gmail.com', NULL, '$2y$12$DayQKnN88apEMePn4OwaE.KrhmA7PiXNOHNECUxZXnFIJHoY3S0D6', NULL, '2024-11-04 19:31:18', '2024-11-04 19:31:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_user_profiles`
--

DROP TABLE IF EXISTS `admin_user_profiles`;
CREATE TABLE IF NOT EXISTS `admin_user_profiles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` varchar(10) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `mname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `suffix` varchar(255) DEFAULT NULL,
  `user_type_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin_user_profiles`
--

INSERT INTO `admin_user_profiles` (`id`, `user_id`, `fname`, `mname`, `lname`, `suffix`, `user_type_id`, `created_at`, `updated_at`) VALUES
(1, '0900000001', 'edit John', 'edit Birao', 'edit Tan', 'edit Jr', '4', NULL, '2024-11-04 21:59:55'),
(2, '0900000002', 'test name', 'test middke', 'dfef', NULL, '1', '2024-11-04 19:31:18', '2024-11-04 19:31:18');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_author` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `genre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pages` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publisher` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amazon_link` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `barnes_noble_link` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `banner`, `title`, `subtitle`, `book_author`, `genre`, `pages`, `publisher`, `amazon_link`, `barnes_noble_link`, `created_at`, `updated_at`) VALUES
(13, 'banners/Qa0hzZc0owWyAEng01xI0mdpMt0tSSzd9ImYY3PP.jpg', 'Test book title', 'The First Editionsd', 'Julies Me', 'Mystery, Fiction', '9999', 'BMA', 'https://www.amazon.com/', 'https://www.barnesandnoble.com/', '2024-10-17 18:59:12', '2024-10-17 18:59:12'),
(14, 'banners/sapANMDQAobegmuU5hcp3xuNxqEEZVT2Z3o8OyBE.jpg', 'The Attenuating Puritan', NULL, 'Robert McGuiness, Simon Jenkins', 'Fiction, Mystery', '124', 'Robert McGuiness', NULL, NULL, '2024-10-17 20:25:54', '2024-11-04 18:56:32'),
(15, 'banners/8vuUgBbBLkKU9FWgD7DbFNn1e1ARylBJVBYULSvt.jpg', 'Repairmanedit', 'The Second Editionedit', 'Mark Merkleyedit', 'Fiction, Mystery, Othersedit', '299edit', 'BMA testedit', 'https://www.amazon.com/#edit', 'https://www.barnesandnoble.com/#edit', '2024-10-18 18:13:55', '2024-10-18 18:31:43'),
(16, 'banners/eAlK54D0uVTrhEHq1JSESInO33aXvJojULjbJQci.jpg', 'Bad Witch', 'The Ninth Edition', 'Royce Adams', 'Fiction, Mystery, Crime', '199999', 'Royce Pubs', 'https://www.amazon.com/Raid-Rairarubia-W-Royce-Adams-ebook/dp/B0DGB169FP?ref_=ast_author_dp&dib=eyJ2IjoiMSJ9.-Hxrq2OOIxp8pfDjOvNnEVPgPU8-qUwj30qTXOEvzvgZedgyr79b9r9niUZ5r1GiBp-lyP2S0ofZn5cbo24FoY_sGKzPPXDDEr0oge0wKnq2_-ZWQtcWyrODaa494a015feprtLFfKpx3-Dh3ZyCNdKkl3rrQqAq58YO5Vrg9RhVr6KCHo2DVXp3sooR1iItUdrPUWr-nc0oOchmK33eC6WWg8C9RxC_dOCzqJLGdN8.D8UUW-eSJbFxobNzNfV-ws4If3pUodRrmeh-2jGTpJk&dib_tag=AUTHOR', 'https://www.amazon.com/Raid-Rairarubia-W-Royce-Adams-ebook/dp/B0DGB169FP?ref_=ast_author_dp&dib=eyJ2IjoiMSJ9.-Hxrq2OOIxp8pfDjOvNnEVPgPU8-qUwj30qTXOEvzvgZedgyr79b9r9niUZ5r1GiBp-lyP2S0ofZn5cbo24FoY_sGKzPPXDDEr0oge0wKnq2_-ZWQtcWyrODaa494a015feprtLFfKpx3-Dh3ZyCNdKkl3rrQqAq58YO5Vrg9RhVr6KCHo2DVXp3sooR1iItUdrPUWr-nc0oOchmK33eC6WWg8C9RxC_dOCzqJLGdN8.D8UUW-eSJbFxobNzNfV-ws4If3pUodRrmeh-2jGTpJk&dib_tag=AUTHOR', '2024-10-18 20:23:15', '2024-10-18 20:23:15'),
(18, 'banners/23dZXuPQA3bk0Vg3Ubv4UMfJOfYmDK5mNwmEd5OT.png', 'Illustrative Imagen', 'The Great edition', 'Mark Testings', 'Mystery, Fiction', '99999', 'Mark Pubs', NULL, NULL, '2024-10-29 19:16:39', '2024-10-29 19:16:39');

-- --------------------------------------------------------

--
-- Table structure for table `book_tag`
--

DROP TABLE IF EXISTS `book_tag`;
CREATE TABLE IF NOT EXISTS `book_tag` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `book_id` bigint UNSIGNED NOT NULL,
  `book_tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `book_tag_book_id_foreign` (`book_id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_tag`
--

INSERT INTO `book_tag` (`id`, `book_id`, `book_tag`, `created_at`, `updated_at`) VALUES
(34, 15, 'Fiction', '2024-10-18 18:31:43', '2024-10-18 18:31:43'),
(37, 16, 'Mystery', '2024-10-18 20:51:57', '2024-10-18 20:51:57'),
(38, 16, 'Featured Review', '2024-10-18 20:51:57', '2024-10-18 20:51:57'),
(47, 13, 'Featured Review', '2024-10-22 18:20:42', '2024-10-22 18:20:42'),
(48, 18, 'Fiction', '2024-10-29 19:16:39', '2024-10-29 19:16:39'),
(49, 18, 'Mystery', '2024-10-29 19:16:39', '2024-10-29 19:16:39'),
(59, 14, 'Fiction', '2024-11-04 18:56:32', '2024-11-04 18:56:32'),
(60, 14, 'Mystery', '2024-11-04 18:56:32', '2024-11-04 18:56:32'),
(61, 14, 'Featured Review', '2024-11-04 18:56:32', '2024-11-04 18:56:32');

-- --------------------------------------------------------

--
-- Table structure for table `client_users`
--

DROP TABLE IF EXISTS `client_users`;
CREATE TABLE IF NOT EXISTS `client_users` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `welcome_valid_until` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `client_user_profiles`
--

DROP TABLE IF EXISTS `client_user_profiles`;
CREATE TABLE IF NOT EXISTS `client_user_profiles` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `suffix` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

DROP TABLE IF EXISTS `contact_us`;
CREATE TABLE IF NOT EXISTS `contact_us` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `full_name`, `email`, `phone_number`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Simon Jensen', 'simon@google.com', '031903903901', 'Hello test test', '2024-10-24 21:36:13', '2024-10-24 21:36:13'),
(5, 'Billie Eilish', 'billie@umg.com', '012939429046', 'Hello, I am interested in your service, and I would be happy if we can negotiate at the same time i want to learn more about how you guys work. Thanks!', '2024-10-26 19:08:24', '2024-10-26 19:08:24'),
(3, 'johnny', 'example@google.com', '02939293813', 'Lsss', '2024-10-25 20:04:40', '2024-10-25 20:04:40'),
(4, 'anxiety', 'eedefer@example.com', '01983923845902', 'Lorem ipsum odor amet, consectetuer adipiscing elit. Mauris nam dis adipiscing ligula lacus dictum ligula mollis. Sollicitudin egestas curae at sodales accumsan gravida enim morbi cursus. Sapien elit efficitur feugiat fusce nulla. Purus platea eros neque sit egestas risus. Aptent montes congue, aliquet adipiscing eleifend pretium accumsan. Habitasse consectetur curabitur sociosqu duis justo curabitur. Justo enim laoreet enim hendrerit habitant orci. Integer maecenas finibus risus id cursus. Primis justo cras eget parturient, id vivamus maximus.\r\n\r\nPotenti aliquet habitant facilisis finibus quis. Aptent ut fermentum placerat volutpat curabitur. Tempus fusce nam mauris lobortis donec quam. Enim pharetra semper ultricies accumsan fusce lacus. Erat rutrum dui nam massa vestibulum porttitor primis ornare torquent. Morbi senectus turpis at laoreet velit tristique sem. Convallis ullamcorper hac euismod volutpat massa. Mi condimentum sapien vehicula curabitur faucibus rhoncus. Sollicitudin venen', '2024-10-25 20:06:00', '2024-10-25 20:06:00'),
(6, 'rtjefjwerjktg', 'rtrtrttrtrt@eample.com', '030489304584', 'heyy', '2024-10-28 20:42:16', '2024-10-28 20:42:16'),
(7, 'test name', 'namename@mail.com', '012939399824', 'hey! hey!1', '2024-10-28 20:51:32', '2024-10-28 20:51:32');

-- --------------------------------------------------------

--
-- Table structure for table `des_types`
--

DROP TABLE IF EXISTS `des_types`;
CREATE TABLE IF NOT EXISTS `des_types` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `des_types`
--

INSERT INTO `des_types` (`id`, `designation`, `created_at`, `updated_at`) VALUES
(1, 'guest', NULL, NULL),
(2, 'viewer', NULL, NULL),
(3, 'editor', NULL, NULL),
(4, 'admin', NULL, NULL),
(5, 'tryedit', '2024-10-23 20:38:10', '2024-10-23 20:38:17');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(11, '2024_09_25_114221_create_des_types_table', 3),
(18, '2024_09_28_065752_create_reviewer_table', 5),
(24, '2024_09_27_070156_create_tags_table', 8),
(26, '2024_09_27_063019_create_books_table', 9),
(27, '2024_09_27_070035_create_reviews_table', 9),
(28, '2024_10_03_105857_create_book_tag_table', 9),
(29, '2024_10_05_052628_change_reviewer_column_in_reviews_table', 10),
(30, '2024_10_24_114640_create_contact_us_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviewer`
--

DROP TABLE IF EXISTS `reviewer`;
CREATE TABLE IF NOT EXISTS `reviewer` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reviewer_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviewer`
--

INSERT INTO `reviewer` (`id`, `photo`, `reviewer_name`, `bio`, `created_at`, `updated_at`) VALUES
(15, 'reviewers/pQk4GFeUbuoDAf4oKFLE4kU0gggGG4KMnk7NMTud.jpg', 'Simon Reviews', 'I\'m simon and this is my bio.', '2024-09-28 05:28:36', '2024-10-17 18:57:00'),
(17, 'reviewers/ZYWwR2tgLw9T76tBXXPsQNVPGPu1zkcdbEwpKeMD.jpg', 'John Doe', NULL, '2024-10-17 18:54:42', '2024-10-17 19:26:00'),
(18, 'reviewers/OMK85SzoWJOGyVrnY0jvUOdFvxzmmo0PeoropDVy.jpg', 'Happy', NULL, '2024-10-17 20:03:21', '2024-10-17 20:03:21'),
(19, 'reviewers/6ipX5RHqkmBub7NIoWBvMA9Jpx0cKYQNTve1KQh4.jpg', 'Faustine Sinclair', 'I love reading.', '2024-10-17 20:18:10', '2024-10-17 20:18:10'),
(20, NULL, 'Test blank photogggg', NULL, '2024-10-18 20:51:46', '2024-10-18 20:57:37'),
(21, NULL, 'More one', NULL, '2024-10-18 21:07:30', '2024-10-18 21:07:36');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `book_id` bigint UNSIGNED DEFAULT NULL,
  `reviewer` bigint UNSIGNED NOT NULL,
  `review_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reviews_book_id_foreign` (`book_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `book_id`, `reviewer`, `review_title`, `review`, `created_at`, `updated_at`) VALUES
(19, 15, 18, 'headline here 19', '<p>hey hey heyedit</p>', '2024-10-18 18:31:43', '2024-10-18 18:31:43'),
(21, 16, 20, 'headline here 21', '<p>Lorem ipsume dolor sit amet</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Test bold</strong></p>\r\n<p><em>Test italic</em></p>', '2024-10-18 20:51:57', '2024-10-18 20:51:57'),
(26, 13, 18, 'headline here 26', '<p>Test review body</p>', '2024-10-22 18:20:42', '2024-10-22 18:20:42'),
(27, 18, 17, 'Headline test', '<p>review test nmewe</p>', '2024-10-29 19:16:39', '2024-10-29 19:16:39'),
(31, 14, 19, 'A Profound Journey of Faith, Resilience, and the Pursuit of Purity in a Modern World', '<p>Robert McGuiness&rsquo; The Attenuating Puritan is a profound exploration of faith, resilience, and the human condition, presented through the lens of an altruistic hero whose journey is as much spiritual as it is physical. This novel is not merely a story but a contemplative experience that invites readers to reflect on their own beliefs and values as they accompany the protagonist on his quest for purity and redemption.<br /><br />The narrative is rich in symbolism and allegory, portraying the hero as a modern-day pilgrim, burdened by the impurities of the world yet unyielding in his pursuit of a return to Edenic splendor. McGuiness paints a vivid picture of a man who embodies purity in both word and deed, yet is constantly aware of the ancestral toxins that threaten to taint his soul. The protagonist\'s unwavering conviction and dedication to his noble quest are both inspiring and humbling, reminding us of the importance of perseverance in the face of adversity.<br /><br />One of the most compelling aspects of The Attenuating Puritan is its exploration of the concept of attenuation. Each breath, each action, and each sacrifice made by the protagonist is a step towards a higher, more divine state of being. McGuiness masterfully weaves this theme throughout the narrative, creating a sense of progression that is both subtle and powerful. The hero&rsquo;s journey is not just about overcoming external obstacles but also about mastering the mind and body, emerging as a symbol of triumph and resilience.<br /><br />The novel also delves into contemporary issues, subtly addressing the dangers of environmental degradation and the loss of innocence in a world increasingly tainted by industrial pollutants and chemicals. Through the protagonist&rsquo;s crusade against these modern evils, McGuiness raises important questions about the future of humanity and the role of purity in a world that often seems beyond redemption.<br /><br />In conclusion, The Attenuating Puritan is a thought-provoking and spiritually enriching novel that challenges readers to confront their own reflections and consider the state of their own souls. McGuiness&rsquo; writing is both poetic and profound, offering a tale that is as much about the journey within as it is about the journey through the world. This book is a must-read for those who seek not just entertainment, but also enlightenment and a deeper understanding of the human experience.</p>', '2024-11-04 18:56:32', '2024-11-04 18:56:32');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `tag`, `created_at`, `updated_at`) VALUES
(1, 'Fiction', '2024-10-03 03:42:48', '2024-10-16 21:25:42'),
(2, 'Mystery', '2024-10-04 17:44:07', '2024-10-16 21:25:48'),
(3, 'Featured Review', '2024-10-07 13:01:48', '2024-10-07 13:01:48'),
(6, 'Test tag', '2024-10-19 19:33:23', '2024-10-19 19:33:23');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book_tag`
--
ALTER TABLE `book_tag`
  ADD CONSTRAINT `book_tag_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
