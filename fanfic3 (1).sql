-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 16, 2021 at 04:49 PM
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
(33, 7, 42, 'Сергей Беликов', 'Шикарная работа! Как жаль, что уже вышел эпилог :(', '2021-04-05 23:42:30', '2021-04-05 23:42:30'),
(34, 14, 50, 'Mekrok Mekrokov', 'Шикарная работа! Как жаль, что уже вышел эпилог :(', '2021-04-06 00:07:46', '2021-04-06 00:07:46');

-- --------------------------------------------------------

--
-- Table structure for table `comment_pars`
--

CREATE TABLE `comment_pars` (
  `id` int(11) NOT NULL,
  `history_parId` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `commentText` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentAuthor` varchar(88) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `name` varchar(99) COLLATE utf8mb4_unicode_ci NOT NULL,
  `colorBack` varchar(99) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `colorText` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `name`, `colorBack`, `colorText`) VALUES
(1, 'Детектив', NULL, '0'),
(2, 'Криминал', NULL, '0'),
(3, 'Ужасы', NULL, '0'),
(4, 'Фэнтези', NULL, '0'),
(5, 'Юмор', NULL, '0'),
(7, 'Боевик\r\n', NULL, '0'),
(8, 'Драма\r\n', NULL, '0'),
(38, 'Новый жанр', '#ed9b9b', '#000000'),
(39, 'авап', '#ff0000', '#ecfb23');

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
  `likes` int(255) DEFAULT 0,
  `created` date DEFAULT current_timestamp(),
  `comments` int(33) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `history_pars`
--

INSERT INTO `history_pars` (`id`, `autor`, `user_id`, `title`, `text`, `status`, `genre`, `genre_id`, `likes`, `created`, `comments`) VALUES
(42, NULL, 6, 'Украденный свитер', 'Миссис Салли, которая зарабатывала на жизнь, продавая свитеры ручной работы, в холодный ноябрьский вечер с ужасом обнаружила пропажу нового изделия - заказ самой королевы Великобритании!  Обратившись к полиции, женщина не получила никакой помощи. Неудивительно, ведь кража произошла в запертой комнате! Справится ли с этой уму непостижимой задачей наш главный детектив?', 'Завершен', NULL, 8, 36, '2021-03-30', 0),
(44, NULL, 6, 'Виноваты планеты', 'Роза, ничем непривлекательная старшеклассница, влюбляется в самого крутого парня в школе по имени Джек. Не имея никаких надежд, Роза не могла поверить в приглашение Джека на прогулку после занятий! Что ответить девушка? Неужели звезды решили наконец-то сделать ее счастливой? Или в голове парня не совсем благие намерения?', 'Завершен', NULL, 1, 456, '2021-04-01', 0),
(48, NULL, 6, 'Подземная сказка', 'Кароче в Дельтарун есть монстр хай', 'Завершен', NULL, 1, 3, '2021-04-06', 0),
(50, NULL, 14, 'Генри и хрустальный шарикs', 'Подозревал ли Генри, что потерявшись в лесу один, он вдруг попадет в потусторонний мир? А то, что в кармане он найдет таинственный хрустальный шарик, за которым по неизвестным причинам охотится все потустороннее королевство? Перед тем как вернуться назад домой, Генри придется столкнуться с приключениями и опасностями, а также найти новых друзей.', 'В процессе', NULL, 4, 2, '2021-04-06', 0),
(52, NULL, 7, 'gdfggf', 'dfgdf', 'Завершен', NULL, 1, 15, '2021-04-11', 0),
(53, NULL, 6, 'Работа с новым жанром', 'Новый жанр', 'В процессе', NULL, 38, 7, '2021-04-15', 0),
(54, NULL, 7, 'вап', 'вапвп', 'В процессе', NULL, 1, 0, '2021-04-15', 0),
(55, NULL, 6, 'кеу', 'уу', 'В процессе', NULL, 1, 11, '2021-04-15', 0),
(56, NULL, 6, 'впвпа', 'квпк', 'В процессе', NULL, 38, 0, '2021-04-15', 0);

-- --------------------------------------------------------

--
-- Table structure for table `history_texts`
--

CREATE TABLE `history_texts` (
  `id` int(10) NOT NULL,
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
(25, 'Глава 1. Начало', 'Рыба текст', 50, NULL, NULL),
(26, 'ук', 'кууке', 54, NULL, NULL);

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
-- Table structure for table `profileimg`
--

CREATE TABLE `profileimg` (
  `id` int(11) DEFAULT NULL,
  `img` varchar(88) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `roleName` varchar(66) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'User',
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

INSERT INTO `users` (`id`, `roleName`, `name`, `login`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'User', 'Амилия Жидкова', NULL, 'amiliaaya@gmail.com', NULL, '$2y$10$f//4syYWmv8gSBeZr05jZOw.RMSd/NcnvPrOmi1i7NALKjJB8xRte', NULL, '2020-10-23 08:21:57', '2020-10-23 08:21:57'),
(2, 'User', 'Жардемова Коркем', 'sdad', 'amilisaaya@gmail.com', NULL, '$2y$10$U51R23w5c3JAP7fmNGQL0uNiLhCS59rm99.g1HRftICVUUYNikQFC', NULL, '2020-10-23 08:22:55', '2020-10-23 08:22:55'),
(4, 'User', 'Андрей Шварков', 'asdsad', 'amiliya@gmail.com', NULL, '$2y$10$usp0w.dxZAJ5Z8670bFOcOIO4DDKzZ096xBUvQMGNaemJ7NAf60Yu', NULL, '2020-10-23 08:40:10', '2020-10-23 08:40:10'),
(5, 'User', 'Адлер Жидков', NULL, 'amiliyaaaaaaaa@mail.ru', NULL, '$2y$10$8UNuydhSYwRVi.TtEF.yTuVXiEFEFp38QDi5Tou081HdmW5q6imEq', NULL, '2021-02-27 02:00:46', '2021-02-27 02:00:46'),
(6, 'Admin', 'Администратор', 'Бесполое', 'demo1@worldskills.org', NULL, '$2y$10$jCmg7PdnuYC7jM4c21yhxOaR0Ma.wkfq9jk5onEqTw/cJDLRcEFsO', NULL, '2021-02-28 11:44:06', '2021-02-28 11:44:06'),
(7, 'User', 'Сергей Беликов', NULL, 'hyakovich0@va.gov', NULL, '$2y$10$yB37MMqlD0MxRcvYL1z8k.VQ6PU38v67omGg4Ww.rQp2472SqhNNm', NULL, '2021-02-28 11:48:08', '2021-02-28 11:48:08'),
(8, 'User', 'Алексей Минов', NULL, 'sadsd@mail.ru', NULL, '$2y$10$hoxrk5Wy2DkfeQB29n3nBuFuLvZR66F6rkE7PX1r39AcGwkShtPdu', NULL, '2021-02-28 11:51:58', '2021-02-28 11:51:58'),
(9, 'User', 'Саша Далецкая', 'fffffdfgfghgfdffff', 'amiliya@mail.ru', NULL, '$2y$10$a7oAppkmIn2QnCrxH1W.0uf3q3AF0kO1.FkG8uU8qq771hxWL93re', NULL, '2021-02-28 11:53:07', '2021-02-28 11:53:07'),
(11, 'User', 'Даша Малекацая', 'dfg', 'hyarrkovich0@va.gov', NULL, '$2y$10$Mup/YUpn7QxzLYjgqI5.ouxBdEVTFhhN679saBsodnDGc1bx2eM/u', NULL, '2021-03-01 01:46:14', '2021-03-01 01:46:14'),
(12, 'User', 'Карина Марикаов', 'amiliya', 'aaamiliya@mail.ru', NULL, '$2y$10$Blo/ldYolMIgVs7tIutNn.WCqLLxS1Kpa1wFtWtWJWvf7dzJ9mHo.', NULL, '2021-03-01 10:26:49', '2021-03-01 10:26:49'),
(13, 'User', 'Мекрок Мекроков', 'dfgdh', 'aaaaaaaaaaaaaa@mail.ru', NULL, '$2y$10$9CEldgD3LzpoEAHDZZFvRuupHLH6xiAZvk5euD8.1VITjB67so52G', NULL, '2021-03-01 10:41:35', '2021-03-01 10:41:35'),
(14, 'User', 'Mekrok Mekrokov', 'Mekrok', 'mekrooooook@gmail.com', NULL, '$2y$10$iANcpU5DTV37MALc8n/lUul4H12NimRqminZ35jBxUtdlAUReE63i', NULL, '2021-03-15 09:41:06', '2021-03-15 09:41:06');

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
-- Indexes for table `comment_pars`
--
ALTER TABLE `comment_pars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `history_parId` (`history_parId`);

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
-- Indexes for table `profileimg`
--
ALTER TABLE `profileimg`
  ADD KEY `user_id` (`user_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `comment_pars`
--
ALTER TABLE `comment_pars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `history_pars`
--
ALTER TABLE `history_pars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `history_texts`
--
ALTER TABLE `history_texts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

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
-- Constraints for table `comment_pars`
--
ALTER TABLE `comment_pars`
  ADD CONSTRAINT `comment_pars_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comment_pars_ibfk_3` FOREIGN KEY (`history_parId`) REFERENCES `history_texts` (`id`);

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

--
-- Constraints for table `profileimg`
--
ALTER TABLE `profileimg`
  ADD CONSTRAINT `profileimg_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
