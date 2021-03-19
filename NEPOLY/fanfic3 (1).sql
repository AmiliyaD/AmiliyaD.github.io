-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 19, 2021 at 11:30 AM
-- Server version: 10.4.12-MariaDB-log
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fanfic3`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(255) NOT NULL,
  `post_id` int(255) NOT NULL,
  `commentAuthor` varchar(244) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_text` varchar(333) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `commentAuthor`, `comment_text`, `created_at`, `updated_at`) VALUES
(1, 6, 3, '', 'fgfd', '2021-03-15 01:31:04', '2021-03-15 01:31:04'),
(2, 6, 3, '', 'vfaeg', '2021-03-15 01:34:19', '2021-03-15 01:34:19'),
(3, 6, 3, '', 'etret', '2021-03-15 01:36:46', '2021-03-15 01:36:46'),
(4, 6, 3, 'fvfd', 'werer', '2021-03-15 01:39:10', '2021-03-15 01:39:10'),
(5, 6, 3, 'fvfd', 'rete', '2021-03-15 01:50:28', '2021-03-15 01:50:28'),
(6, 6, 4, 'fvfd', 'rtertert', '2021-03-15 03:40:07', '2021-03-15 03:40:07'),
(7, 6, 1, 'fvfd', 'trr', '2021-03-15 06:01:37', '2021-03-15 06:01:37'),
(9, 6, 2, 'fvfd', 'ertert', '2021-03-15 08:10:45', '2021-03-15 08:10:45'),
(10, 6, 2, 'fvfd', 'eryruryu', '2021-03-15 08:12:17', '2021-03-15 08:12:17'),
(11, 6, 2, 'fvfd', 'ert', '2021-03-15 08:13:04', '2021-03-15 08:13:04'),
(12, 6, 1, 'fvfd', 'turui6i', '2021-03-15 09:39:41', '2021-03-15 09:39:41'),
(13, 6, 1, 'fvfd', 'Я ОСТАВИЛ СВОЙ КОММЕНТ', '2021-03-15 09:39:53', '2021-03-15 09:39:53'),
(14, 14, 2, 'Mekrok Mekrokov', 'Шикарная работа! Как жаль, что уже вышел эпилог :(', '2021-03-15 09:41:22', '2021-03-15 09:41:22'),
(15, 14, 1, 'Mekrok Mekrokov', 'Шикарная работа! Как жаль, что уже вышел эпилог :(', '2021-03-15 09:41:41', '2021-03-15 09:41:41'),
(16, 14, 7, 'Mekrok Mekrokov', 'Шикарная работа! Как жаль, что уже вышел эпилог :(', '2021-03-15 09:42:17', '2021-03-15 09:42:17'),
(17, 14, 4, 'Mekrok Mekrokov', 'нья ха ха хха хахах ах ха хахах', '2021-03-15 09:44:12', '2021-03-15 09:44:12'),
(19, 14, 1, 'Mekrok Mekrokov', 'А ВЫ ЗНАЛИ ЧТО ТАКОЕ МЕКРОК????', '2021-03-15 09:45:37', '2021-03-15 09:45:37'),
(20, 6, 4, 'fvfd', 'Шикарная работа жаль что пизд***', '2021-03-15 10:42:54', '2021-03-15 10:42:54'),
(21, 6, 1, 'fvfd', 'господи мекрок задолбааал', '2021-03-15 15:30:23', '2021-03-15 15:30:23'),
(22, 7, 3, 'dg', 'dgdrheryery', '2021-03-18 01:37:17', '2021-03-18 01:37:17'),
(23, 7, 24, 'dg', 'greger', '2021-03-18 01:41:42', '2021-03-18 01:41:42'),
(26, 6, 24, 'fvfd', 'Шикарная работа! Как жаль, что уже вышел эпилог :(', '2021-03-18 12:09:46', '2021-03-18 12:09:46'),
(27, 6, 24, 'fvfd', 'wer', '2021-03-18 12:10:18', '2021-03-18 12:10:18'),
(28, 6, 24, 'fvfd', 'er4ter', '2021-03-18 12:11:21', '2021-03-18 12:11:21');

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
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `name` varchar(99) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `name`) VALUES
(1, 'Детектив'),
(2, 'Криминал'),
(3, 'Ужасы'),
(4, 'Фэнтези'),
(5, 'Юмор'),
(6, 'Мекрок');

-- --------------------------------------------------------

--
-- Table structure for table `history_pars`
--

CREATE TABLE `history_pars` (
  `id` int(11) NOT NULL,
  `autor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(180) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'В процессе',
  `genre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `genre_id` int(44) DEFAULT NULL,
  `likes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `created` date DEFAULT current_timestamp(),
  `comments` int(33) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `history_pars`
--

INSERT INTO `history_pars` (`id`, `autor`, `user_id`, `title`, `text`, `status`, `genre`, `genre_id`, `likes`, `created`, `comments`) VALUES
(1, 'sa', 1, 'kjkjlkk', 'njbkjbkbkhvbhkv', 'В процессе', 'Детектив', 1, NULL, '2021-03-03', 0),
(2, 'sa', 2, 'sfsf', 'dsfsdf', 'Завершен', 'Фэнтези', 1, NULL, '2020-10-23', 0),
(3, 'sa', 1, 'afeaff', 'sdfdssdf', 'Завершен', 'Фэнтези', 2, NULL, '2020-10-23', 0),
(4, 'sssdsa', 1, 'asdasd', 'saddas', 'Завершен', 'Фэнтези', 2, NULL, '2020-10-23', 0),
(7, 'sssdsa', 1, 'asdasd', 'saddas', 'Завершен', 'Фэнтези', 1, NULL, '2020-10-23', 0),
(8, 'sssdsa', 1, 'asdasd', 'saddas', 'Завершен', 'Фэнтези', 2, NULL, '2020-10-23', 0),
(9, 'sssdsa', 1, 'asdasd', 'saddas', 'В процессе', 'Фэнтези', 1, NULL, '2020-10-23', 0),
(15, NULL, 12, 'NEW WORK', 'aaaaaaaaaaaaaaaa', 'В процессе', NULL, 1, '0', '2021-03-01', 0),
(16, NULL, 13, 'dfg', 'fdg', 'В процессе', NULL, 1, '0', '2021-03-01', 0),
(22, NULL, 7, 'уке', 'куеукеуке', 'В процессе', NULL, 4, '0', '2021-03-12', 0),
(23, NULL, 6, 'asd', 'WReryeryetyet', 'Завершен', NULL, 3, '0', '2021-03-15', 0),
(24, NULL, 7, 'ertertert', 'fgrgdrg', 'В процессе', NULL, 1, '0', '2021-03-18', 0),
(28, NULL, 6, 'dfgdfg', 'dfg', 'Завершен', NULL, 1, '0', '2021-03-18', 0),
(29, NULL, 6, 'вап', 'вапвап', 'Завершен', NULL, 1, '0', '2021-03-18', 0),
(30, NULL, 6, 'uae5ue5u', 'eryeueayue', 'Завершен', NULL, 5, '0', '2021-03-18', 0),
(31, NULL, 6, 'Мекрок', 'МЕКРОК', 'В процессе', NULL, 6, '0', '2021-03-18', 0),
(32, NULL, 6, 'dfgdfgdf', 'f', 'Завершен', NULL, 3, '0', '2021-03-18', 0);

-- --------------------------------------------------------

--
-- Table structure for table `history_texts`
--

CREATE TABLE `history_texts` (
  `id` int(10) UNSIGNED NOT NULL,
  `history_title` varchar(34) COLLATE utf8mb4_unicode_ci NOT NULL,
  `history_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `history_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `history_texts`
--

INSERT INTO `history_texts` (`id`, `history_title`, `history_text`, `history_id`, `created_at`, `updated_at`) VALUES
(12, 'МЕКРОК', 'МЕКРОК', 31, NULL, NULL),
(13, 'fgeyeryreyye', 'ghfghrtyrty', 23, NULL, NULL),
(14, 'yery', 'ter', 32, NULL, NULL);

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
(4, '2020_10_14_144831_history2', 1),
(5, '2020_10_22_092227_create_comments_table', 1),
(6, '2020_10_22_144041_create_history_texts_table', 1);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

INSERT INTO `users` (`id`, `name`, `login`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'sa', NULL, 'amiliaaya@gmail.com', NULL, '$2y$10$f//4syYWmv8gSBeZr05jZOw.RMSd/NcnvPrOmi1i7NALKjJB8xRte', NULL, '2020-10-23 08:21:57', '2020-10-23 08:21:57'),
(2, 'adaaf', 'sdad', 'amilisaaya@gmail.com', NULL, '$2y$10$U51R23w5c3JAP7fmNGQL0uNiLhCS59rm99.g1HRftICVUUYNikQFC', NULL, '2020-10-23 08:22:55', '2020-10-23 08:22:55'),
(3, 'Амилия', 'Жидкова', 'amailiaaya@gmail.com', NULL, '$2y$10$wlMBMdKmIawKoru09To6he6zR5LhMXUauki5tskVWoMVDONkT5uZC', NULL, '2020-10-23 08:26:08', '2020-10-23 08:26:08'),
(4, 'sssdsa', 'asdsad', 'amiliya@gmail.com', NULL, '$2y$10$usp0w.dxZAJ5Z8670bFOcOIO4DDKzZ096xBUvQMGNaemJ7NAf60Yu', NULL, '2020-10-23 08:40:10', '2020-10-23 08:40:10'),
(5, 'ffdgfdgdfgdfg', NULL, 'amiliyaaaaaaaa@mail.ru', NULL, '$2y$10$8UNuydhSYwRVi.TtEF.yTuVXiEFEFp38QDi5Tou081HdmW5q6imEq', NULL, '2021-02-27 02:00:46', '2021-02-27 02:00:46'),
(6, 'fvfd', NULL, 'demo1@worldskills.org', NULL, '$2y$10$jCmg7PdnuYC7jM4c21yhxOaR0Ma.wkfq9jk5onEqTw/cJDLRcEFsO', NULL, '2021-02-28 11:44:06', '2021-02-28 11:44:06'),
(7, 'dg', NULL, 'hyakovich0@va.gov', NULL, '$2y$10$yB37MMqlD0MxRcvYL1z8k.VQ6PU38v67omGg4Ww.rQp2472SqhNNm', NULL, '2021-02-28 11:48:08', '2021-02-28 11:48:08'),
(8, 'naaaaaa', NULL, 'sadsd@mail.ru', NULL, '$2y$10$hoxrk5Wy2DkfeQB29n3nBuFuLvZR66F6rkE7PX1r39AcGwkShtPdu', NULL, '2021-02-28 11:51:58', '2021-02-28 11:51:58'),
(9, 'fdfdgdfgdfg', 'fffffdfgfghgfdffff', 'amiliya@mail.ru', NULL, '$2y$10$a7oAppkmIn2QnCrxH1W.0uf3q3AF0kO1.FkG8uU8qq771hxWL93re', NULL, '2021-02-28 11:53:07', '2021-02-28 11:53:07'),
(10, 'fdhrgaerhh', 'dfgdfhfd', 'asdasd@mail.ru', NULL, '$2y$10$L2N4.pu5uDkPbmts9HOlAuzl6oivFiPbhDyWs409Iu0JBUU3FbJc2', NULL, '2021-02-28 11:57:42', '2021-02-28 11:57:42'),
(11, 'dfgd', 'dfg', 'hyarrkovich0@va.gov', NULL, '$2y$10$Mup/YUpn7QxzLYjgqI5.ouxBdEVTFhhN679saBsodnDGc1bx2eM/u', NULL, '2021-03-01 01:46:14', '2021-03-01 01:46:14'),
(12, 'React Cong 2021', 'amiliya', 'aaamiliya@mail.ru', NULL, '$2y$10$Blo/ldYolMIgVs7tIutNn.WCqLLxS1Kpa1wFtWtWJWvf7dzJ9mHo.', NULL, '2021-03-01 10:26:49', '2021-03-01 10:26:49'),
(13, 'rh', 'dfgdh', 'aaaaaaaaaaaaaa@mail.ru', NULL, '$2y$10$9CEldgD3LzpoEAHDZZFvRuupHLH6xiAZvk5euD8.1VITjB67so52G', NULL, '2021-03-01 10:41:35', '2021-03-01 10:41:35'),
(14, 'Mekrok Mekrokov', 'Mekrok', 'mekrooooook@gmail.com', NULL, '$2y$10$iANcpU5DTV37MALc8n/lUul4H12NimRqminZ35jBxUtdlAUReE63i', NULL, '2021-03-15 09:41:06', '2021-03-15 09:41:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history_pars`
--
ALTER TABLE `history_pars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `genre_id` (`genre_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `history_texts`
--
ALTER TABLE `history_texts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `history_id` (`history_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `history_pars`
--
ALTER TABLE `history_pars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `history_texts`
--
ALTER TABLE `history_texts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `history_pars` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `history_pars`
--
ALTER TABLE `history_pars`
  ADD CONSTRAINT `history_pars_ibfk_1` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`),
  ADD CONSTRAINT `history_pars_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `history_texts`
--
ALTER TABLE `history_texts`
  ADD CONSTRAINT `history_texts_ibfk_1` FOREIGN KEY (`history_id`) REFERENCES `history_pars` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
