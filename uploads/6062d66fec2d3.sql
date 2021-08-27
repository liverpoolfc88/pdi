-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 26 2021 г., 14:16
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `savdo-tizim`
--

-- --------------------------------------------------------

--
-- Структура таблицы `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', 2, 1616732142),
('theCreator', 1, 1616733904);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, 'Administrator of this application', NULL, NULL, 1608701029, 1608701029),
('employee', 1, 'Employee of this site/company who has lower rights than admin', NULL, NULL, 1608701029, 1608701029),
('manageUsers', 2, 'Allows admin+ roles to manage users', NULL, NULL, 1608701029, 1608701029),
('member', 1, 'Authenticated user, equal to \"@\"', NULL, NULL, 1608701029, 1608701029),
('premium', 1, 'Premium users. Authenticated users with extra powers', NULL, NULL, 1608701029, 1608701029),
('theCreator', 1, 'You!', NULL, NULL, 1608701029, 1608701029),
('usePremiumContent', 2, 'Allows premium+ roles to use premium content', NULL, NULL, 1608701029, 1608701029);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('admin', 'employee'),
('admin', 'manageUsers'),
('employee', 'premium'),
('premium', 'member'),
('premium', 'usePremiumContent'),
('theCreator', 'admin');

-- --------------------------------------------------------

--
-- Структура таблицы `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_rule`
--

INSERT INTO `auth_rule` (`name`, `data`, `created_at`, `updated_at`) VALUES
('isAuthor', 'O:25:\"app\\rbac\\rules\\AuthorRule\":3:{s:4:\"name\";s:8:\"isAuthor\";s:9:\"createdAt\";i:1608701029;s:9:\"updatedAt\";i:1608701029;}', 1608701029, 1608701029);

-- --------------------------------------------------------

--
-- Структура таблицы `district`
--

CREATE TABLE `district` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `region_id` int(11) NOT NULL,
  `create_at` varchar(255) DEFAULT NULL,
  `update_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `in_menu_item`
--

CREATE TABLE `in_menu_item` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `photo` varchar(128) DEFAULT NULL,
  `short` varchar(255) DEFAULT NULL,
  `text` text DEFAULT NULL,
  `slug` varchar(128) NOT NULL,
  `views` int(11) DEFAULT NULL,
  `status` int(2) NOT NULL DEFAULT 1,
  `new` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `sale` int(11) DEFAULT NULL,
  `pieces` int(255) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_date` varchar(128) DEFAULT NULL,
  `updated_date` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `in_menu_item`
--

INSERT INTO `in_menu_item` (`id`, `menu_id`, `title`, `photo`, `short`, `text`, `slug`, `views`, `status`, `new`, `price`, `sale`, `pieces`, `status_id`, `user_id`, `created_date`, `updated_date`) VALUES
(1, 6, 'Qozoq un', 'uploads/605209b11b574.jpg', 'kazak un', 'asdasd', '929991508', 1, 1, 1, 120000, 12, 1, 1, 1, '2021-03-17 16:52:49', '123'),
(2, 7, 'Paxta yogi', 'uploads/60520a733959b.jpg', 'Paxta yogi', 'Paxta yogiPaxta yogiPaxta yogiPaxta yogi', '351596607', NULL, 1, 1, 120000, NULL, NULL, 1, 1, '2021-03-17 16:56:03', NULL),
(3, 8, 'Unlar', 'uploads/6058397ca4616.jpg', '', '', '507715913', NULL, 1, NULL, 120000, NULL, NULL, NULL, 1, '2021-03-22 09:30:20', NULL),
(4, 6, 'qqozzzoq unlarning zo\'ri', 'uploads/605ca69e95259.jpg', '', '', '1600959174', NULL, 1, 1, 120000, NULL, NULL, NULL, 1, '2021-03-25 18:05:02', NULL),
(5, 6, 'Kazakskaya tavar', 'uploads/605ca6fdb0a30.jpg', 'Kazakskaya tavar', '', '1240404479', NULL, 1, NULL, 150000, NULL, NULL, NULL, 1, '2021-03-25 18:06:37', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `template_id` int(3) DEFAULT NULL,
  `tree` int(3) NOT NULL DEFAULT 1,
  `child` int(4) DEFAULT NULL,
  `status` int(3) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` varchar(128) DEFAULT NULL,
  `updated_at` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id`, `title`, `slug`, `template_id`, `tree`, `child`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Oziq-ovqatlar', '49884348', 1, 1, 0, 1, 1, '2021-02-01 12:07:27', '2021-02-02 14:25:39'),
(2, 'Kiyim kechak', '1281092490', 2, 1, 0, 1, 1, '2021-02-02 14:24:23', NULL),
(3, 'Unlar', '1073193996', 1, 2, 1, 1, 1, '2021-02-02 14:25:24', NULL),
(4, 'istemol yog\'i', '1178271532', 1, 2, 1, 1, 1, '2021-02-02 14:26:18', NULL),
(5, 'Erkaklar', '1083350005', 2, 2, 2, 1, 1, '2021-02-03 14:31:10', NULL),
(6, 'Qozoq un', '300835424', 1, 3, 3, 1, 1, '2021-03-16 18:31:12', NULL),
(7, 'Paxta yog`i', '1397041765', 1, 3, 4, 1, 1, '2021-03-17 16:54:22', NULL),
(8, 'Anjan un', '792323769', 1, 3, 3, 1, 1, '2021-03-22 09:09:18', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `mfy`
--

CREATE TABLE `mfy` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `district_id` varchar(255) NOT NULL,
  `create_at` varchar(255) DEFAULT NULL,
  `update_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1608701011),
('m141022_115823_create_user_table', 1608701019),
('m141022_115912_create_rbac_tables', 1608701019);

-- --------------------------------------------------------

--
-- Структура таблицы `region`
--

CREATE TABLE `region` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `create_at` varchar(255) DEFAULT NULL,
  `update_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `ite_id` int(11) NOT NULL,
  `created_at` varchar(25) DEFAULT NULL,
  `updated_at` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(13) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `account_activation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `phone`, `photo`, `password_hash`, `status`, `auth_key`, `password_reset_token`, `account_activation_token`, `created_at`, `updated_at`) VALUES
(1, 'Sardor', 'sardor88.88@mail.ru', '+998979933632', 'users/f126df5sd45.jpg', '$2y$13$h/rTFVLTUo6tZG2QtwCNj.BOcCGVFK0nuILLrhrltqc0KVnbHQDmW', 10, '5ILdJHWYBP89HutstAfDwEQSeSe0ZqTH', NULL, NULL, 1608701156, 1616733904),
(2, 'SHaxlo', 'sh@sh.uz', '+998976549898', 'users/605d6edb69429.png', '$2y$13$7LLstWWAUzUweu/fH.XV0e5K4nPknSKKq2aUGRAO3WrhQt2SD3azC', 10, 'gc_vuKemGf2YRikodpQAk_--kY5vETQp', NULL, NULL, 1616732142, 1616735963);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Индексы таблицы `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Индексы таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Индексы таблицы `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Индексы таблицы `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `in_menu_item`
--
ALTER TABLE `in_menu_item`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `mfy`
--
ALTER TABLE `mfy`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`),
  ADD UNIQUE KEY `account_activation_token` (`account_activation_token`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `district`
--
ALTER TABLE `district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `in_menu_item`
--
ALTER TABLE `in_menu_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `mfy`
--
ALTER TABLE `mfy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `region`
--
ALTER TABLE `region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
