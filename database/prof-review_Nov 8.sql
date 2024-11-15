-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 08, 2024 at 03:06 PM
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
(1, '0900000001', 'edrianetan312@gmail.com', NULL, '$2y$12$r/TpGuD4dfWfIwbaa120ou82HIHzdufE4pZtFKMOWiriTlGNghU.y', NULL, NULL, '2024-11-05 20:00:52', NULL),
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_user_profiles`
--

INSERT INTO `admin_user_profiles` (`id`, `user_id`, `fname`, `mname`, `lname`, `suffix`, `user_type_id`, `created_at`, `updated_at`) VALUES
(1, '0900000001', 'John', 'Birao', 'Tan', 'Jr', '4', NULL, '2024-11-07 23:42:47'),
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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `banner`, `title`, `subtitle`, `book_author`, `genre`, `pages`, `publisher`, `amazon_link`, `barnes_noble_link`, `created_at`, `updated_at`) VALUES
(14, 'banners/Rl4UDxR3eiTAmqhtRYCI1ApXBf7a0UD4Rt7L4SZL.jpg', 'The Attenuating Puritan', NULL, 'Robert McGuiness', 'Fiction, Mystery', '124', 'Robert McGuiness', NULL, NULL, '2024-10-17 20:25:54', '2024-11-08 22:34:54'),
(19, 'banners/bwr6sORhrUOwSvkqc9s3LtF26vhODYWOJtWKthni.jpg', 'Repairman', NULL, 'Jim Platt', 'Non-Fiction, Romance', '88', 'Jim Platt', NULL, NULL, '2024-11-08 21:32:54', '2024-11-08 21:32:54'),
(20, 'banners/2a7ZupLdyyp0cHtgH6J8P5XTA1Rd5Kvv8h2l85jE.jpg', 'You Have Time to Die and Go Broke', NULL, 'Linda Salerno-Forand', 'Non-Fiction, Novel', '108', 'Linda Salerno-Forand', NULL, NULL, '2024-11-08 21:39:15', '2024-11-08 21:39:15'),
(21, 'banners/qy4qWGZRFXVCRjEQFwgET2Y8lc6onU4SR1JdNj9H.jpg', 'Margarita: The Case of the Numbers Kidnapper (2nd Edition)', NULL, 'Michele Wallace Campanelli', 'Biography, Mystery', '129', 'Michele Wallace Campanelli', NULL, NULL, '2024-11-08 21:44:40', '2024-11-08 21:48:14'),
(22, 'banners/dC0xBucDkDxmsKi27t4MwiHG3hbuI2nxQvX5feIv.jpg', 'Hank: An \"Angel Dog\"', NULL, 'David O. Scheiding', 'Non-Fiction, Mystery', '122', 'David O. Scheiding', NULL, NULL, '2024-11-08 21:51:22', '2024-11-08 21:51:22'),
(23, 'banners/Ec9Ooxl3gCfqYFROW8JX1KRXdW8tfoqNUlnGVihd.jpg', 'A Girl with a Bad Reputation', NULL, 'Dave Gioia', 'Fiction, True Crime', '318', 'Dave Gioia', NULL, NULL, '2024-11-08 21:58:55', '2024-11-08 21:58:55');

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
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_tag`
--

INSERT INTO `book_tag` (`id`, `book_id`, `book_tag`, `created_at`, `updated_at`) VALUES
(73, 19, 'Featured Review', '2024-11-08 21:36:00', '2024-11-08 21:36:00'),
(74, 19, 'Non-Fiction', '2024-11-08 21:36:00', '2024-11-08 21:36:00'),
(75, 19, 'Romance', '2024-11-08 21:36:00', '2024-11-08 21:36:00'),
(76, 20, 'Featured Review', '2024-11-08 21:39:15', '2024-11-08 21:39:15'),
(77, 20, 'Non-Fiction', '2024-11-08 21:39:15', '2024-11-08 21:39:15'),
(78, 20, 'Novel', '2024-11-08 21:39:15', '2024-11-08 21:39:15'),
(87, 21, 'Mystery', '2024-11-08 21:48:14', '2024-11-08 21:48:14'),
(88, 21, 'Biography', '2024-11-08 21:48:14', '2024-11-08 21:48:14'),
(91, 22, 'Mystery', '2024-11-08 21:51:27', '2024-11-08 21:51:27'),
(92, 22, 'Non-Fiction', '2024-11-08 21:51:27', '2024-11-08 21:51:27'),
(93, 23, 'Fiction', '2024-11-08 21:58:55', '2024-11-08 21:58:55'),
(94, 23, 'True Crime', '2024-11-08 21:58:55', '2024-11-08 21:58:55'),
(99, 14, 'Fiction', '2024-11-08 22:34:54', '2024-11-08 22:34:54'),
(100, 14, 'Mystery', '2024-11-08 22:34:54', '2024-11-08 22:34:54'),
(101, 14, 'Featured Review', '2024-11-08 22:34:54', '2024-11-08 22:34:54');

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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `full_name`, `email`, `phone_number`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Simon Jensen', 'simon@google.com', '031903903901', 'Hello test test', '2024-10-24 21:36:13', '2024-10-24 21:36:13'),
(5, 'Billie Eilish', 'billie@umg.com', '012939429046', 'Hello, I am interested in your service, and I would be happy if we can negotiate at the same time i want to learn more about how you guys work. Thanks!', '2024-10-26 19:08:24', '2024-10-26 19:08:24'),
(3, 'johnny', 'example@google.com', '02939293813', 'Lsss', '2024-10-25 20:04:40', '2024-10-25 20:04:40'),
(4, 'anxiety', 'eedefer@example.com', '01983923845902', 'Lorem ipsum odor amet, consectetuer adipiscing elit. Mauris nam dis adipiscing ligula lacus dictum ligula mollis. Sollicitudin egestas curae at sodales accumsan gravida enim morbi cursus. Sapien elit efficitur feugiat fusce nulla. Purus platea eros neque sit egestas risus. Aptent montes congue, aliquet adipiscing eleifend pretium accumsan. Habitasse consectetur curabitur sociosqu duis justo curabitur. Justo enim laoreet enim hendrerit habitant orci. Integer maecenas finibus risus id cursus. Primis justo cras eget parturient, id vivamus maximus.\r\n\r\nPotenti aliquet habitant facilisis finibus quis. Aptent ut fermentum placerat volutpat curabitur. Tempus fusce nam mauris lobortis donec quam. Enim pharetra semper ultricies accumsan fusce lacus. Erat rutrum dui nam massa vestibulum porttitor primis ornare torquent. Morbi senectus turpis at laoreet velit tristique sem. Convallis ullamcorper hac euismod volutpat massa. Mi condimentum sapien vehicula curabitur faucibus rhoncus. Sollicitudin venen', '2024-10-25 20:06:00', '2024-10-25 20:06:00'),
(6, 'rtjefjwerjktg', 'rtrtrttrtrt@eample.com', '030489304584', 'heyy', '2024-10-28 20:42:16', '2024-10-28 20:42:16'),
(7, 'test name', 'namename@mail.com', '012939399824', 'hey! hey!1', '2024-10-28 20:51:32', '2024-10-28 20:51:32'),
(8, 'test name right now', 'now.test@example.com', '9208327238', 'hello worlds!', '2024-11-06 22:05:43', '2024-11-06 22:05:43');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `des_types`
--

INSERT INTO `des_types` (`id`, `designation`, `created_at`, `updated_at`) VALUES
(1, 'guest', NULL, NULL),
(2, 'viewer', NULL, NULL),
(3, 'editor', NULL, NULL),
(4, 'admin', NULL, NULL),
(5, 'tryeditddd', '2024-10-23 20:38:10', '2024-11-06 21:24:00'),
(6, 'try no', '2024-11-06 21:24:07', '2024-11-06 21:24:28');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviewer`
--

INSERT INTO `reviewer` (`id`, `photo`, `reviewer_name`, `bio`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Simon Jenkins', NULL, '2024-11-08 21:23:15', '2024-11-08 21:23:15'),
(2, NULL, 'Jette Greenfield', NULL, '2024-11-08 21:23:24', '2024-11-08 21:23:24'),
(3, NULL, 'Pocari Sweat', NULL, '2024-11-08 22:07:20', '2024-11-08 22:07:20');

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
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `book_id`, `reviewer`, `review_title`, `review`, `created_at`, `updated_at`) VALUES
(37, 19, 2, 'Exploring the Complex Layers of Desire and Discovery', '<p>In Repairman, Jim Platt dives into a world where fantasy intertwines with self-discovery, skillfully blending elements of desire with the journey of personal growth. At the story&rsquo;s core, we follow Jeff, a young repairman whose profession unexpectedly becomes a gateway to exploring the hidden yearnings of the residents in a condominium complex. What might at first appear to be a simple narrative of indulgence gradually unfolds into a nuanced exploration of the human condition, particularly the needs, complexities, and vulnerabilities that each character brings.</p>\r\n<p>Platt introduces Jeff as a man whose luck in intimate encounters sets the stage for more than mere satisfaction; it becomes a medium through which he comes to understand the varied and often unspoken desires of women. In each interaction, Jeff&rsquo;s role shifts from an object of fantasy to something more profound&mdash;a sounding board, a source of comfort, and, perhaps most notably, a mirror through which these women confront their own identities and needs. His encounters are less about conquest and more about connection, subtly emphasizing the depth of emotional longing that can reside behind seemingly casual interactions.</p>\r\n<p>Through his experiences, Jeff learns that desire transcends physical needs, reaching into the realms of companionship, understanding, and emotional support. These encounters unveil the loneliness, frustration, and untapped potential that some of these women harbor, enriching the narrative with layers that feel both raw and relatable. Jeff&rsquo;s journey becomes a quiet meditation on the importance of listening, patience, and vulnerability, underscoring how these qualities can transform even the briefest of connections into meaningful exchanges.</p>\r\n<p>One of the strongest aspects of Platt&rsquo;s writing is his ability to give dimension to each character. The women in Repairman are not mere objects of Jeff&rsquo;s fantasies but are portrayed with their own motivations, struggles, and aspirations. Through their perspectives, we see a reflection of societal expectations, the passage of time, and the desire for fulfillment beyond the roles they occupy in daily life. Platt allows readers to see how Jeff&rsquo;s interactions affect not only his own understanding of intimacy but also, importantly, the self-worth and rediscovered confidence of those around him.</p>\r\n<p>Ultimately, Repairman is more than a story of personal gratification; it&rsquo;s a nuanced portrayal of human connections, the complexities of desire, and the quiet but impactful realizations that often arise from unexpected moments. Jim Platt&rsquo;s storytelling doesn&rsquo;t shy away from sensuality, but it uses it as a lens to explore the deeper yearnings and vulnerabilities that make each encounter uniquely resonant.</p>', '2024-11-08 21:36:00', '2024-11-08 21:36:00'),
(38, 20, 1, 'Finding Strength in the Maze of Modern Healthcare', '<p>In You Have Time to Die and Go Broke, Linda Salerno-Forand takes on the colossal and often intimidating landscape of the healthcare system, demystifying its many layers and revealing its overwhelming impact on individuals facing illness. With a tone that is both compassionate and practical, Salerno-Forand empowers readers to confront the maze of insurance claims, hospital bureaucracy, and endless doctor queues that are now all too common in medical care. The book brings clarity to a complex system, aiming to equip patients with the tools needed to achieve the best possible care&mdash;without incurring financial ruin in the process.</p>\r\n<p>Salerno-Forand&rsquo;s approach is as empathetic as it is empowering. She addresses the fears and frustrations that people experience when facing not only life-altering diagnoses but also the added stress of a system that can feel almost antagonistic in its complexity. Her writing is filled with both firsthand insight and professional understanding, offering guidance that feels personal and grounded. Readers will find themselves navigating the book as if they have a trusted advocate by their side, one who has witnessed the flaws and challenges of the healthcare system and is determined to shed light on the paths forward.</p>\r\n<p>The structure of the book is particularly helpful, organized to guide readers through specific areas of healthcare that can be the most opaque and, often, the most financially draining. From understanding the nuances of health insurance policies to preparing for doctor visits and handling unexpected billing, Salerno-Forand&rsquo;s advice is both actionable and accessible. She provides strategies for negotiating with insurance companies, advocating for necessary treatments, and finding alternative options that may not be immediately apparent in a traditional hospital setting. It&rsquo;s not just a guide&mdash;it&rsquo;s a call to action that encourages readers to become informed and assertive participants in their own care.</p>\r\n<p>Salerno-Forand does not shy away from the harsh realities facing those who encounter serious or terminal illness. The book delves into the very real emotional and psychological toll of being thrust into a medical system that often values efficiency over empathy. Yet she balances this with a message of resilience, encouraging readers to hold on to their dignity, voice, and financial stability in the face of daunting odds. She reminds us that knowledge is power and that, in the labyrinth of healthcare, understanding the rules and resources available can mean the difference between chaos and clarity.</p>\r\n<p>You Have Time to Die and Go Broke is a vital read for anyone navigating or preparing to navigate the healthcare system, whether for themselves or a loved one. Linda Salerno-Forand&rsquo;s work is a testament to the power of informed self-advocacy and a reminder that even in a system as convoluted as healthcare, there are ways to find agency and support. This book stands as both a practical toolkit and a deeply empathetic guide for anyone looking to face healthcare challenges head-on, without losing their sense of self or their financial security.</p>', '2024-11-08 21:39:15', '2024-11-08 21:39:15'),
(43, 21, 1, 'Courage Under Fire: Unmasking Evil and Chasing Dreams', '<p>In Margarita - The Case of the Numbers Kidnapper, Michele Wallace Campanelli weaves a dynamic tale of ambition, suspense, and bravery as high schooler Penny Margarita grapples with her dreams of becoming a quarterback while facing a chilling mystery that engulfs her town. Campanelli deftly intertwines Penny&rsquo;s coming-of-age struggles with a gripping crime story, balancing her personal ambitions with a newfound drive to protect her community. The result is a novel that offers both the heart-pounding excitement of a thriller and the inspiring journey of a young woman pushing against boundaries to realize her dreams.</p>\r\n<p>Penny Margarita is not your typical protagonist. While her heart is set on a sports dream traditionally dominated by boys, her story takes a sharp turn when she encounters a series of strange events involving a kidnapper whose fixation on numbers puts the entire community at risk. Campanelli masterfully paints Penny as a layered character, whose journey is one of both self-discovery and civic responsibility. With each twist in the case, Penny\'s courage grows, revealing her resilience and her refusal to back down in the face of adversity. The mystery element adds a layer of intensity that keeps readers on edge, while her personal struggles offer moments of relatability and warmth.</p>\r\n<p>A unique aspect of Campanelli&rsquo;s storytelling lies in the close relationships Penny maintains with her family and friends. Her brother Dante and her friend Louis are more than sidekicks; they&rsquo;re her confidants, her sounding boards, and her partners in this daring adventure. Together, they form a trio that shows the strength of familial and friendship bonds, particularly in the face of a threat that&rsquo;s both dangerous and deeply unsettling. These relationships add a layer of emotional depth to the narrative, reminding us that courage is often rooted in the love and support of those around us.</p>\r\n<p>Set against the backdrop of Indialantic, Florida, the novel&rsquo;s setting feels palpable, almost a character in its own right. Campanelli&rsquo;s descriptions evoke the small-town feel that amplifies both the warmth of community and the sense of claustrophobia that often accompanies a crime close to home. Readers can feel the stakes, not just for Penny but for the entire town, as they anxiously watch the mystery unfold. The \"Numbers Kidnapper\" is an unusual villain, and the numerical theme adds an eerie layer to the narrative that keeps readers guessing and heightens the suspense with each chapter.</p>\r\n<p>Ultimately, Margarita - The Case of the Numbers Kidnapper is about much more than just solving a crime. It&rsquo;s a testament to young people&rsquo;s resilience, the power of community, and the tenacity needed to pursue one&rsquo;s passions, even when life throws unexpected challenges in the way. Campanelli has crafted a story that resonates on multiple levels: as a mystery that grips, a sports narrative that inspires, and a coming-of-age tale that celebrates courage and ambition. This second edition breathes new life into Penny Margarita&rsquo;s journey, making it a memorable and motivational read for young adults and anyone who believes in the power of grit and determination.</p>', '2024-11-08 21:48:14', '2024-11-08 21:48:14'),
(45, 22, 2, 'A Heart That Heals: A Dog’s Love and Life’s Divine Plan', '<p>In Hank: An \"Angel Dog\", David O. Scheiding captures the unique way that animals, in their simple, boundless love, can transform and heal lives. This story is a moving testament to the special bond between humans and dogs, presenting Hank as a truly angelic figure whose presence feels divinely timed, arriving just when he&rsquo;s needed most. More than just a pet, Hank serves as a guide, a source of comfort, and a companion who brings hope and warmth to the family around him. Scheiding\'s writing brings to life the essence of this &ldquo;angel dog,&rdquo; portraying him as a character whose loyalty and love seem almost otherworldly.</p>\r\n<p>Hank&rsquo;s story is one of purpose and companionship, beginning when he enters the life of Scheiding&rsquo;s father-in-law after an unimaginable loss. As we journey through Hank&rsquo;s time with his new owner, we witness how he provides solace in ways words cannot. For someone reeling from the grief of losing a spouse, Hank&rsquo;s gentle nature and affectionate spirit are grounding. Scheiding skillfully paints the picture of how the dog&rsquo;s daily companionship becomes a balm for his father-in-law\'s sorrow, showing readers that healing can come in the form of a wagging tail and a soft, attentive presence. In this way, Hank becomes a reminder that sometimes, comfort arrives in the simplest of forms.</p>\r\n<p>What is particularly beautiful in Scheiding&rsquo;s portrayal of Hank is the way he emphasizes the divine timing of this animal&rsquo;s appearance. Hank seems almost heaven-sent, stepping into lives exactly when they need him most. When he transitions from his original home to Scheiding&rsquo;s family, the cycle of comfort continues, as Hank brings the same warmth and love to new members who come to adore him. His loyalty is unwavering, and his capacity for affection knows no bounds&mdash;a testament to the profound love animals can provide, often in ways that transcend human understanding.</p>\r\n<p>Through gentle prose and vivid descriptions, Scheiding&rsquo;s writing conveys the joy, healing, and, yes, the sorrow that comes with loving a pet as special as Hank. There is a tear-jerking quality to this story, a reminder of the inevitable losses we face with beloved animals, but Scheiding balances this with moments of joy, laughter, and gratitude. Hank\'s story is one that will resonate with anyone who has felt the comfort of a pet\'s companionship and seen firsthand the miraculous impact they can have on our lives.</p>\r\n<p>Hank: An \"Angel Dog\" is more than just a memoir of a family pet; it&rsquo;s a spiritual journey that reminds readers of the special place animals have in the grander plan of our lives. Hank becomes not only a loyal pet but a messenger of sorts, whose presence brings healing and whose memory leaves an enduring mark. Scheiding&rsquo;s heartfelt tribute to his dog is a must-read for anyone who believes in the healing power of animals and the small miracles that unfold when we open our hearts to the creatures around us. This story is sure to leave readers both heartbroken and hopeful, appreciating the love that our furry companions bring and the ways they help us navigate life&rsquo;s most challenging moments.</p>', '2024-11-08 21:51:27', '2024-11-08 21:51:27'),
(46, 23, 1, 'Strength, Rebellion, and Self-Discovery in a Changing America', '<p>In A Girl with a Bad Reputation, Dave Gioia tells the story of Colleen Hanrahan, a young girl navigating the complexities of identity, family, and social justice in the transformative 1960s. At just fourteen, Colleen is more than the reputation that precedes her&mdash;she&rsquo;s a smart, fiercely independent teen growing up in the gritty, racially tense environment of Newburgh, New York. Gioia&rsquo;s narrative doesn&rsquo;t just depict the challenges of a rebellious teenager; it dives deep into the heart of a young woman&rsquo;s journey toward self-realization amidst the societal upheaval that defined the decade.</p>\r\n<p>Colleen is a character who defies easy categorization. Her &ldquo;bad reputation&rdquo; belies a sense of agency and pride that makes her story both empowering and deeply human. In a time when societal expectations for women were rigid and judgment quick, Colleen refuses to let others&rsquo; perceptions define her. She takes charge of her relationships, navigating them on her own terms and keeping her father&mdash;a successful yet overbearing criminal defense attorney&mdash;at arm&rsquo;s length from the details of her personal life. Gioia does an impressive job of portraying Colleen&rsquo;s struggle with her father&rsquo;s domineering presence, painting him as both a source of protection and repression. Colleen&rsquo;s mother, on the other hand, provides a softer, more understanding refuge, sharing a close bond with Colleen that becomes her emotional support system and her shield against societal judgments.</p>\r\n<p>Set against the racial tensions brewing in Newburgh, the novel explores Colleen&rsquo;s evolving awareness of social issues. As the city grapples with the arrival of impoverished Black families from the South, Colleen begins to see the prejudices and inequalities within her own community. Her burgeoning empathy and identification with the Civil Rights Movement reflect the spirit of a generation seeking change. Inspired by the courage of activists around her, Colleen contemplates a future where she can contribute to justice, dreaming of a career in law or politics. Through her, Gioia captures the restless, questioning nature of youth as well as the unique power of that era&rsquo;s ideals to shape an entire generation&rsquo;s vision of fairness and equality.</p>\r\n<p>Gioia&rsquo;s portrayal of Colleen&rsquo;s personal growth is inseparable from the historical context of the 1960s. The period&rsquo;s events&mdash;from civil rights activism to the cultural shifts challenging traditional values&mdash;are woven seamlessly into her story, shaping her beliefs and ambitions. Through encounters with people who inspire, frustrate, or challenge her, Colleen&rsquo;s perspective matures, and she begins to see her role not just in her family or hometown, but in the larger societal landscape.</p>\r\n<p>In A Girl with a Bad Reputation, Gioia has crafted a character who is as flawed as she is admirable, making Colleen&rsquo;s journey one that resonates beyond the page. This novel doesn&rsquo;t offer easy answers but instead presents an honest portrayal of a young woman growing up on the fringes of social norms, courageously asserting her independence while wrestling with her own aspirations and beliefs. It&rsquo;s a story that reminds readers of the resilience and defiance needed to forge one&rsquo;s own path in a world that is often quick to judge and slow to change. Gioia&rsquo;s work is a thought-provoking, heartfelt tribute to those navigating the rocky path from adolescence to adulthood, set against a backdrop of historic transformation that makes Colleen&rsquo;s story all the more compelling.</p>', '2024-11-08 21:58:55', '2024-11-08 21:58:55'),
(49, 14, 1, 'A Profound Journey of Faith, Resilience, and the Pursuit of Purity in a Modern World', '<p>Robert McGuiness&rsquo; The Attenuating Puritan is a profound exploration of faith, resilience, and the human condition, presented through the lens of an altruistic hero whose journey is as much spiritual as it is physical. This novel is not merely a story but a contemplative experience that invites readers to reflect on their own beliefs and values as they accompany the protagonist on his quest for purity and redemption.<br /><br />The narrative is rich in symbolism and allegory, portraying the hero as a modern-day pilgrim, burdened by the impurities of the world yet unyielding in his pursuit of a return to Edenic splendor. McGuiness paints a vivid picture of a man who embodies purity in both word and deed, yet is constantly aware of the ancestral toxins that threaten to taint his soul. The protagonist\'s unwavering conviction and dedication to his noble quest are both inspiring and humbling, reminding us of the importance of perseverance in the face of adversity.<br /><br />One of the most compelling aspects of The Attenuating Puritan is its exploration of the concept of attenuation. Each breath, each action, and each sacrifice made by the protagonist is a step towards a higher, more divine state of being. McGuiness masterfully weaves this theme throughout the narrative, creating a sense of progression that is both subtle and powerful. The hero&rsquo;s journey is not just about overcoming external obstacles but also about mastering the mind and body, emerging as a symbol of triumph and resilience.<br /><br />The novel also delves into contemporary issues, subtly addressing the dangers of environmental degradation and the loss of innocence in a world increasingly tainted by industrial pollutants and chemicals. Through the protagonist&rsquo;s crusade against these modern evils, McGuiness raises important questions about the future of humanity and the role of purity in a world that often seems beyond redemption.<br /><br />In conclusion, The Attenuating Puritan is a thought-provoking and spiritually enriching novel that challenges readers to confront their own reflections and consider the state of their own souls. McGuiness&rsquo; writing is both poetic and profound, offering a tale that is as much about the journey within as it is about the journey through the world. This book is a must-read for those who seek not just entertainment, but also enlightenment and a deeper understanding of the human experience.</p>', '2024-11-08 22:34:54', '2024-11-08 22:34:54');

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `tag`, `created_at`, `updated_at`) VALUES
(1, 'Fiction', '2024-10-03 03:42:48', '2024-10-16 21:25:42'),
(2, 'Mystery', '2024-10-04 17:44:07', '2024-10-16 21:25:48'),
(3, 'Featured Review', '2024-10-07 13:01:48', '2024-10-07 13:01:48'),
(11, 'Non-Fiction', '2024-11-08 21:30:02', '2024-11-08 21:30:02'),
(12, 'Comedy', '2024-11-08 21:30:20', '2024-11-08 21:30:20'),
(13, 'Novel', '2024-11-08 21:30:32', '2024-11-08 21:30:32'),
(14, 'Biography', '2024-11-08 21:30:50', '2024-11-08 21:30:50'),
(15, 'True Crime', '2024-11-08 21:30:59', '2024-11-08 21:30:59'),
(16, 'Romance', '2024-11-08 21:31:05', '2024-11-08 21:31:05');

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
