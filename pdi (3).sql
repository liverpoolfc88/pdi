-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 01 2021 г., 16:21
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
-- База данных: `pdi`
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
('theCreator', 1, 1608798249);

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
-- Структура таблицы `branch`
--

CREATE TABLE `branch` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `branch`
--

INSERT INTO `branch` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Asaka', NULL, NULL),
(2, 'Angren', NULL, NULL),
(3, 'Xorazm', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `defect_cost`
--

CREATE TABLE `defect_cost` (
  `id` int(11) NOT NULL,
  `model_id` int(11) NOT NULL,
  `level1_id` int(11) NOT NULL,
  `level2_id` int(11) NOT NULL,
  `level3_id` int(11) DEFAULT NULL,
  `defect_id` int(11) NOT NULL,
  `cost` double NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `defect_list`
--

CREATE TABLE `defect_list` (
  `id` int(11) NOT NULL,
  `defect_name` varchar(25) NOT NULL,
  `defect_code` varchar(25) NOT NULL,
  `cost` double NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `defect_list`
--

INSERT INTO `defect_list` (`id`, `defect_name`, `defect_code`, `cost`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, '01 Зазор	', '01', 5467, '2021-02-16 10:06:16', '2021-02-16 15:49:59', NULL, 130, 130, NULL),
(2, '02 Задевание', '02', 4502, '2021-02-16 10:06:49', '2021-02-16 15:50:06', NULL, 130, 130, NULL),
(3, 'Зацепление	', '03', 5467, '2021-02-16 10:50:41', NULL, NULL, 129, NULL, NULL),
(4, 'Отсутствие деталей	', '04', 3538, '2021-02-16 10:52:08', NULL, NULL, 129, NULL, NULL),
(5, 'Волнистность	', '05', 5468, '2021-02-16 10:52:34', NULL, NULL, 129, NULL, NULL),
(6, '06 Загиб	', '06', 3538, '2021-02-16 10:52:54', '2021-02-16 15:50:15', NULL, 129, 130, NULL),
(7, 'Не полное зацепление', '07', 2574, '2021-02-16 10:53:41', NULL, NULL, 129, NULL, NULL),
(8, 'Ненатянутый', '08', 18967, '2021-02-16 10:54:31', NULL, NULL, 129, NULL, NULL),
(9, '09 Неплосткостность', '09', 4502, '2021-02-16 10:55:43', '2021-02-16 15:49:38', NULL, 129, 130, NULL),
(10, 'Брак закрывания', '10', 3538, '2021-02-16 10:56:35', NULL, NULL, 129, NULL, NULL),
(11, 'Не полное закрепления', '11', 3538, '2021-02-16 10:57:46', NULL, NULL, 129, NULL, NULL),
(12, 'Отсутствует отметки', '12', 1609, '2021-02-16 10:58:46', NULL, NULL, 129, NULL, NULL),
(13, 'Выпучивание(опухан)', '13', 3538, '2021-02-16 10:59:55', NULL, NULL, 129, NULL, NULL),
(14, 'Отклеивание', '14', 4502, '2021-02-16 11:00:21', NULL, NULL, 129, NULL, NULL),
(15, 'Неполное заливание', '15', 3538, '2021-02-16 11:00:45', NULL, NULL, 129, NULL, NULL),
(16, 'Заусенец (BURR)', '16', 4502, '2021-02-16 11:01:15', NULL, NULL, 129, NULL, NULL),
(17, 'Брак возвращения устройст', '17', 6431, '2021-02-16 11:02:06', NULL, NULL, 129, NULL, NULL),
(18, 'Брак детали	', '18', 6431, '2021-02-16 11:02:42', NULL, NULL, 129, NULL, NULL),
(19, 'Перекручивание	', '19', 3538, '2021-02-16 11:04:03', NULL, NULL, 129, NULL, NULL),
(20, 'Перекручивание	', '19', 3538, '2021-02-16 11:04:03', '2021-02-16 11:04:15', '2021-02-16 11:04:15', 129, 129, 129),
(21, '20 Брак установки	', '20', 5467, '2021-02-16 11:04:50', '2021-02-16 15:50:28', NULL, 129, 130, NULL),
(22, 'Несоответствие детали	', '21', 5467, '2021-02-16 11:05:26', NULL, NULL, 129, NULL, NULL),
(23, 'Утечка воды/масло	', '22', 33431, '2021-02-16 11:06:00', NULL, NULL, 129, NULL, NULL),
(24, 'Шум	', '23', 24753, '2021-02-16 11:06:26', NULL, NULL, 129, NULL, NULL),
(25, 'Повреждение отделки	', '24', 5467, '2021-02-16 11:06:50', NULL, NULL, 129, NULL, NULL),
(26, 'Сварочные брызги	', '25', 3538, '2021-02-16 11:07:18', NULL, NULL, 129, NULL, NULL),
(27, 'Загрязнения	', '26', 3538, '2021-02-16 11:07:45', NULL, NULL, 129, NULL, NULL),
(28, 'Выемка	', '27', 3538, '2021-02-16 11:08:10', NULL, NULL, 129, NULL, NULL),
(29, 'Брак расположения	', '28', 3538, '2021-02-16 11:09:06', NULL, NULL, 129, NULL, NULL),
(30, 'Свободный ход	', '29', 5467, '2021-02-16 11:09:50', NULL, NULL, 129, NULL, NULL),
(31, 'Тресение	', '30', 10288, '2021-02-16 11:10:19', NULL, NULL, 129, NULL, NULL),
(32, 'Инородный звук	', '31', 24753, '2021-02-16 11:11:41', NULL, NULL, 129, NULL, NULL),
(33, 'Брак функции	', '32', 41467, '2021-02-16 11:12:32', NULL, NULL, 129, NULL, NULL),
(34, 'Брак работоспособности	', '33', 29574, '2021-02-16 11:12:58', NULL, NULL, 129, NULL, NULL),
(35, 'Усилие управления	', '34', 15110, '2021-02-16 11:13:39', NULL, NULL, 129, NULL, NULL),
(36, 'Брак регулировки', '35', 3538, '2021-02-16 11:14:13', NULL, NULL, 129, NULL, NULL),
(37, 'Неправ.показ.стрелки	', '36', 3538, '2021-02-16 11:14:49', NULL, NULL, 129, NULL, NULL),
(38, '37 Вибрация/дрожь	', '37', 12217, '2021-02-16 11:15:13', '2021-02-16 15:50:51', NULL, 129, 130, NULL),
(39, 'Поломка', '38', 5467, '2021-02-16 11:15:38', NULL, NULL, 129, NULL, NULL),
(40, 'Стирание маркировки	', '39', 3538, '2021-02-16 11:16:17', NULL, NULL, 129, NULL, NULL),
(41, 'Пасмурный вид', '40', 2574, '2021-02-16 11:16:42', NULL, NULL, 129, NULL, NULL),
(42, 'Свободный', '41', 3538, '2021-02-16 11:17:59', NULL, NULL, 129, NULL, NULL),
(43, 'Сварочный брак', '42', 3538, '2021-02-16 11:18:27', NULL, NULL, 129, NULL, NULL),
(44, 'Пропуск болта/винта', '43', 5467, '2021-02-16 11:18:48', NULL, NULL, 129, NULL, NULL),
(45, 'Неполное закрепле. болтов', '44', 3538, '2021-02-16 11:19:28', NULL, NULL, 129, NULL, NULL),
(46, 'Повреждение болта/винта', '45', 2574, '2021-02-16 11:20:02', NULL, NULL, 129, NULL, NULL),
(47, 'Не установка детали', '46', 3538, '2021-02-16 11:20:26', NULL, NULL, 129, NULL, NULL),
(48, 'Неувеличение скорости', '47', 19931, '2021-02-16 11:21:05', NULL, NULL, 129, NULL, NULL),
(49, 'Перезаливка', '48', 3538, '2021-02-16 11:21:27', NULL, NULL, 129, NULL, NULL),
(50, 'Задержка движения', '49', 3538, '2021-02-16 11:22:05', NULL, NULL, 129, NULL, NULL),
(51, 'Твёрдость', '50', 3538, '2021-02-16 11:24:18', NULL, NULL, 129, NULL, NULL),
(52, 'Задержка', '51', 3538, '2021-02-16 11:24:37', NULL, NULL, 129, NULL, NULL),
(53, 'Увелич.тормозного пути', '52', 5467, '2021-02-16 11:25:16', NULL, NULL, 129, NULL, NULL),
(54, 'Несоотв.болта и винта', '53', 2574, '2021-02-16 11:25:43', NULL, NULL, 129, NULL, NULL),
(55, 'Брак зажигания', '54', 5467, '2021-02-16 11:26:06', NULL, NULL, 129, NULL, NULL),
(56, 'Боковой снос', '55', 10288, '2021-02-16 11:26:30', NULL, NULL, 129, NULL, NULL),
(57, 'Брак STUD болтов', '56', 3538, '2021-02-16 11:27:03', NULL, NULL, 129, NULL, NULL),
(58, 'Дрожь двигателя', '57', 44682, '2021-02-16 11:27:39', NULL, NULL, 129, NULL, NULL),
(59, 'Ошибка при установке', '58', 3538, '2021-02-16 11:28:24', NULL, NULL, 129, NULL, NULL),
(60, 'Кривое установление', '59', 3538, '2021-02-16 11:28:50', NULL, NULL, 129, NULL, NULL),
(61, 'Брак закрепления', '60', 2574, '2021-02-16 11:29:28', NULL, NULL, 129, NULL, NULL),
(62, 'Не устан.CAP/Grommet', '61', 1609, '2021-02-16 11:29:56', NULL, NULL, 129, NULL, NULL),
(63, 'Брак устан.CAP/Gromm', '62', 1609, '2021-02-16 11:30:22', NULL, NULL, 129, NULL, NULL),
(64, 'Не устан.Clip/Clamp', '63', 1609, '2021-02-16 11:30:42', NULL, NULL, 129, NULL, NULL),
(65, 'Б/закреп.Clip/Clamp', '64', 1609, '2021-02-16 11:31:38', NULL, NULL, 129, NULL, NULL),
(66, 'Брак отверствия', '65', 3538, '2021-02-16 11:32:19', NULL, NULL, 129, NULL, NULL),
(67, 'Мягк-ть педал.торм', '66', 19931, '2021-02-16 11:32:45', NULL, NULL, 129, NULL, NULL),
(68, 'Твёрдость педали тормоза', '67', 19931, '2021-02-16 11:33:15', NULL, NULL, 129, NULL, NULL),
(69, 'Не совпад.пресс линии', '68', 3538, '2021-02-16 11:33:31', NULL, NULL, 129, NULL, NULL),
(70, 'Ржавчина', '69', 3538, '2021-02-16 11:33:54', NULL, NULL, 129, NULL, NULL),
(71, 'Царапина', '70', 3538, '2021-02-16 11:34:19', NULL, NULL, 129, NULL, NULL),
(72, 'Пузырь', '71', 3538, '2021-02-16 11:34:32', NULL, NULL, 129, NULL, NULL),
(73, 'Брак сушки покраски', '72', 3538, '2021-02-16 11:34:50', NULL, NULL, 129, NULL, NULL),
(74, 'След шлифовки', '73', 3538, '2021-02-16 11:35:10', NULL, NULL, 129, NULL, NULL),
(75, 'Сварочная стружка', '74', 3538, '2021-02-16 11:35:22', NULL, NULL, 129, NULL, NULL),
(76, 'Брак гермитизации', '75', 3538, '2021-02-16 11:35:34', NULL, NULL, 129, NULL, NULL),
(77, 'Апельсиновая корка', '76', 3538, '2021-02-16 11:35:49', NULL, NULL, 129, NULL, NULL),
(78, 'Инородное тело', '77', 3538, '2021-02-16 11:36:01', NULL, NULL, 129, NULL, NULL),
(79, 'Другой цвет', '78', 3538, '2021-02-16 11:36:13', NULL, NULL, 129, NULL, NULL),
(80, 'Распыление краски', '79', 3538, '2021-02-16 11:36:28', NULL, NULL, 129, NULL, NULL),
(81, '80 Повреждение краски', '80', 3538, '2021-02-16 11:36:40', '2021-02-16 15:51:08', NULL, 129, 130, NULL),
(82, 'Недостаток краски', '81', 3538, '2021-02-16 11:36:50', NULL, NULL, 129, NULL, NULL),
(83, 'Кратерии', '82', 3538, '2021-02-16 11:37:04', NULL, NULL, 129, NULL, NULL),
(84, 'Трещина покрытия', '83', 3538, '2021-02-16 11:37:24', NULL, NULL, 129, NULL, NULL),
(85, 'След полировки', '84', 3538, '2021-02-16 11:37:41', NULL, NULL, 129, NULL, NULL),
(86, 'Ямочки', '85', 3538, '2021-02-16 11:37:53', NULL, NULL, 129, NULL, NULL),
(87, 'Подтёк краски \\ лака', '86', 3538, '2021-02-16 11:38:04', NULL, NULL, 129, NULL, NULL),
(88, 'Недосушка покраски', '87', 3538, '2021-02-16 11:38:15', NULL, NULL, 129, NULL, NULL),
(89, 'Прочие дефекты', '88', 3538, '2021-02-16 11:38:26', NULL, NULL, 129, NULL, NULL),
(90, 'След маскир. слоя', '89', 3538, '2021-02-16 11:38:48', NULL, NULL, 129, NULL, NULL),
(91, 'Брак при лакировке', '90', 3538, '2021-02-16 11:38:58', NULL, NULL, 129, NULL, NULL),
(92, 'Теч краски \\ лака', '91', 3538, '2021-02-16 11:39:09', NULL, NULL, 129, NULL, NULL),
(93, 'Нет смазки', '92', 3538, '2021-02-16 11:39:28', NULL, NULL, 129, NULL, NULL),
(94, 'Разборка для ремонта', '93', 3538, '2021-02-16 11:39:42', NULL, NULL, 129, NULL, NULL),
(95, 'Недостатока', '94', 3538, '2021-02-16 11:40:04', NULL, NULL, 129, NULL, NULL),
(96, 'Брак Deadaner', '95', 3538, '2021-02-16 11:40:14', NULL, NULL, 129, NULL, NULL),
(97, 'Повреждения CAP', '96', 3538, '2021-02-16 11:40:24', NULL, NULL, 129, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `level_1`
--

CREATE TABLE `level_1` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `level_1`
--

INSERT INTO `level_1` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Body Strukture', '2021-02-06 09:42:53', NULL),
(2, 'A PILLAR', '2021-02-06 09:43:12', NULL),
(3, 'WIND SHIELD GLASS', '2021-02-06 09:43:22', NULL),
(4, 'COWL TOP', '2021-02-06 09:43:37', NULL),
(7, 'OUT SIDE MIRROR	', '2021-02-16 09:15:31', NULL),
(8, 'ROOF PANEL	', '2021-02-16 09:15:45', NULL),
(9, 'FRONT TIRE	', '2021-02-16 09:15:56', NULL),
(10, 'INSTRUMENTAL PANEL	', '2021-02-16 09:16:06', NULL),
(11, 'FRONT DOOR 	', '2021-02-16 09:16:16', NULL),
(12, 'FRONT SEAT 	', '2021-02-16 09:16:27', NULL),
(13, 'FRONT SEAT BELT 	', '2021-02-16 09:16:36', NULL),
(14, 'ROCKER PNL TRIM 	', '2021-02-16 09:16:50', NULL),
(15, 'ROOF HEADLINING	', '2021-02-16 09:17:00', NULL),
(16, 'B PILLAR PANEL (CENTER PNL)	', '2021-02-16 09:17:09', NULL),
(17, 'RR DOOR 	', '2021-02-16 09:17:21', NULL),
(18, 'RR SEAT 	', '2021-02-16 09:17:30', NULL),
(19, 'RR SEAT BELT 	', '2021-02-16 09:17:38', NULL),
(20, 'SIDE BODY/QUARTER PNL	', '2021-02-16 09:17:46', NULL),
(21, 'RR TIRE	', '2021-02-16 09:17:55', NULL),
(22, 'BACK DOOR/TRUNK LID	', '2021-02-16 09:18:03', NULL),
(23, 'RR BUMPER	', '2021-02-16 09:18:12', NULL),
(24, 'FUNCTION1	', '2021-02-16 09:18:40', NULL),
(25, 'FUNCTION 2	', '2021-02-16 09:18:49', NULL),
(26, 'INSTRUMENT PANEL PARTS1	', '2021-02-16 09:19:00', NULL),
(27, 'INSTRUMENT PANEL PARTS 2	', '2021-02-16 09:19:09', NULL),
(28, 'ENGINE ROOM	', '2021-02-16 09:19:18', NULL),
(29, 'СИСТЕМА ОХЛАЖДЕНИЯ	', '2021-02-16 09:19:26', NULL),
(30, 'ЭЛЕКТРИЧЕСКАЯ ЧАСТЬ	', '2021-02-16 09:19:34', NULL),
(31, 'ТОПЛИВНАЯ СИСТЕМА	', '2021-02-16 09:19:42', NULL),
(32, 'ВЫХЛОПНАЯ СИСТЕМА	', '2021-02-16 09:19:50', NULL),
(33, 'TRANSMISSION	', '2021-02-16 09:19:58', NULL),
(34, 'BRAKE SYSTEM	', '2021-02-16 09:20:06', NULL),
(35, 'STEERING SYSTEM	', '2021-02-16 09:20:15', NULL),
(36, 'MOUNTING 	', '2021-02-16 09:20:22', NULL),
(37, 'AIR CONDITION SYSTEM	', '2021-02-16 09:20:29', NULL),
(38, 'EAC / CAC	', '2021-02-16 09:20:37', NULL),
(39, 'CNG SYSTEM	', '2021-02-16 09:20:45', NULL),
(40, 'ПРОЧИЕ ЧАСТИ	', '2021-02-16 09:20:53', NULL),
(41, 'RR PILLAR PNL/SIDE BODY	', '2021-02-16 14:35:30', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `level_2`
--

CREATE TABLE `level_2` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `level1_id` int(11) NOT NULL,
  `side` varchar(1) DEFAULT NULL COMMENT 'R-right, L-Left',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `level_2`
--

INSERT INTO `level_2` (`id`, `name`, `level1_id`, `side`, `created_at`, `updated_at`) VALUES
(1, 'Hood', 1, '', '2021-02-16 09:22:15', NULL),
(2, 'RH FRT DOOR', 1, 'R', '2021-02-16 09:22:39', NULL),
(3, 'LH FRT DOOR', 1, 'L', '2021-02-16 09:22:54', NULL),
(4, 'RH RR DOOR', 1, 'R', '2021-02-16 09:23:14', NULL),
(5, 'LH RR DOOR', 1, 'L', '2021-02-16 09:23:28', NULL),
(6, 'TRUNK LID/BACK DOOR', 1, '', '2021-02-16 09:23:52', NULL),
(7, 'ROOF PANEL', 1, '', '2021-02-16 09:24:04', NULL),
(8, 'QUARTER PANEL', 1, '', '2021-02-16 09:24:25', NULL),
(9, 'FRT BUMPER', 1, '', '2021-02-16 09:24:45', NULL),
(10, 'RR BUMPER', 1, '', '2021-02-16 09:24:56', NULL),
(11, 'COWL TOP', 1, '', '2021-02-16 09:25:09', NULL),
(12, 'A PILLAR*WIND SHIELD GLASS  RH', 2, 'R', '2021-02-16 09:33:00', NULL),
(13, 'A PILLAR*WIND SHIELD GLASS  LH	', 2, 'L', '2021-02-16 09:33:48', NULL),
(14, 'A PILLAR*FRT DOOR  RH', 2, 'R', '2021-02-16 09:34:06', NULL),
(15, 'A PILLAR*FRT DOOR  LH	', 2, 'L', '2021-02-16 09:34:27', NULL),
(16, 'A PILLAR * TRIM  RH', 2, 'R', '2021-02-16 09:37:35', NULL),
(17, 'A PILLAR * TRIM  LH	', 2, 'L', '2021-02-16 09:37:48', NULL),
(18, 'A PILLAR * FRT FENDER  RH', 2, 'R', '2021-02-16 09:38:13', NULL),
(19, 'A PILLAR * FRT FENDER  LH	', 2, 'L', '2021-02-16 09:38:29', NULL),
(20, 'A PILLAR * ROOF HEADLING  RH', 2, 'R', '2021-02-16 09:38:52', NULL),
(21, 'A PILLAR * ROOF HEADLING  LH	', 2, 'L', '2021-02-16 09:39:06', NULL),
(22, 'A PILLAR TRIM * WIND SHIELD GLASS  RH', 2, 'R', '2021-02-16 09:39:20', NULL),
(23, 'A PILLAR TRIM * WIND SHIELD GLASS  LH	', 2, 'L', '2021-02-16 09:39:35', NULL),
(24, 'A PILLAR TRIM * INSTURUMENT PANEL  RH', 2, 'R', '2021-02-16 09:39:50', NULL),
(25, 'A PILLAR TRIM * INSTURUMENT PANEL  LH	', 2, 'L', '2021-02-16 09:40:04', NULL),
(26, 'WIND SHIELD GLASS*SIDE MOLDING  RH', 3, 'R', '2021-02-16 09:41:24', NULL),
(27, 'WIND SHIELD GLASS*SIDE MOLDING  LH	', 3, 'L', '2021-02-16 09:41:38', NULL),
(28, 'WIND SHIELD GLASS*UPPER MOLDING  RH', 3, 'R', '2021-02-16 09:41:53', NULL),
(29, 'WIND SHIELD GLASS*UPPER MOLDING  LH	', 3, 'L', '2021-02-16 09:42:06', NULL),
(30, 'WIND SHIELD GLASS JOINT  RH', 3, 'R', '2021-02-16 09:42:35', NULL),
(31, 'WIND SHIELD GLASS JOINT  LH	', 3, 'L', '2021-02-16 09:42:47', NULL),
(32, 'RH', 2, 'R', '2021-02-16 09:46:35', NULL),
(33, 'LH	', 2, 'L', '2021-02-16 09:46:52', NULL),
(34, 'RH', 3, 'R', '2021-02-16 09:47:09', NULL),
(35, 'LH', 3, 'L', '2021-02-16 09:47:17', NULL),
(36, 'RH', 4, 'R', '2021-02-16 09:47:38', NULL),
(37, 'LH', 4, 'L', '2021-02-16 09:47:48', NULL),
(38, 'COWLTOP WEATHERSTRIP  RH', 4, 'R', '2021-02-16 09:48:59', NULL),
(39, 'COWLTOP WEATHERSTRIP  LH', 4, 'L', '2021-02-16 09:49:19', NULL),
(40, 'COWL TOP CAP (CLIP)  RH', 4, 'R', '2021-02-16 09:49:38', NULL),
(41, 'COWL TOP CAP (CLIP)  LH', 4, 'L', '2021-02-16 09:49:50', NULL),
(42, 'RH', 7, 'R', '2021-02-16 09:50:28', NULL),
(43, 'LH', 7, 'L', '2021-02-16 09:50:39', NULL),
(44, 'OUT SIDE MIRROR GRIP GASKET  RH', 7, 'R', '2021-02-16 09:50:57', NULL),
(45, 'OUT SIDE MIRROR GRIP GASKET  LH', 7, 'L', '2021-02-16 09:51:11', NULL),
(46, 'OUT SIDE MIRROR BASE COVER  RH', 7, 'R', '2021-02-16 09:51:29', NULL),
(47, 'OUT SIDE MIRROR BASE COVER  LH', 7, 'L', '2021-02-16 09:51:39', NULL),
(48, 'OUT SIDE MIRROR HOUSING  RH', 7, 'R', '2021-02-16 09:51:55', NULL),
(49, 'OUT SIDE MIRROR HOUSING  LH', 7, 'L', '2021-02-16 09:52:10', NULL),
(50, 'OUT SIDE MIRROR GRIP  RH', 7, 'R', '2021-02-16 09:52:29', NULL),
(51, 'OUT SIDE MIRROR GRIP  LH', 7, 'L', '2021-02-16 09:52:40', NULL),
(52, 'OUT SIDE MIRROR  GASKET  RH', 7, 'R', '2021-02-16 09:52:56', NULL),
(53, 'OUT SIDE MIRROR  GASKET  LH', 7, 'L', '2021-02-16 09:53:05', '2021-02-16 09:53:34'),
(54, 'SPACER OUT SIDE MIRROR GARNISH (IN)  RH', 7, 'R', '2021-02-16 09:53:50', NULL),
(55, 'SPACER OUT SIDE MIRROR GARNISH (IN)  LH', 7, 'L', '2021-02-16 09:54:02', NULL),
(56, 'SPACER /SIDE MARKER LAMP  RH', 7, 'R', '2021-02-16 09:54:16', NULL),
(57, 'SPACER /SIDE MARKER LAMP  LH', 7, 'L', '2021-02-16 09:54:27', NULL),
(58, 'RH', 8, 'R', '2021-02-16 09:54:53', NULL),
(59, 'LH', 8, 'L', '2021-02-16 09:55:03', NULL),
(60, 'ROOF MOLDING  RH', 8, 'R', '2021-02-16 09:55:14', NULL),
(61, 'ROOF MOLDING  LH', 8, 'L', '2021-02-16 09:55:28', NULL),
(62, 'ROOF MOLDING * WIND SHIELD GLASS W/S  RH', 8, 'R', '2021-02-16 09:55:46', NULL),
(63, 'ROOF MOLDING * WIND SHIELD GLASS W/S  LH', 8, 'L', '2021-02-16 09:55:58', NULL),
(64, 'ROOF MOLDING * BACK GLASS W/S  RH', 8, 'R', '2021-02-16 09:56:17', NULL),
(65, 'ROOF MOLDING * BACK GLASS W/S  LH', 8, 'L', '2021-02-16 09:56:38', NULL),
(66, 'ROOF CARER  RH', 8, 'R', '2021-02-16 09:57:23', NULL),
(67, 'ROOF CARER  LH', 8, 'L', '2021-02-16 09:57:34', NULL),
(68, 'ROOF CARER CAP  RH', 8, 'R', '2021-02-16 09:57:49', NULL),
(69, 'ROOF CARER CAP  LH', 8, 'L', '2021-02-16 09:57:59', NULL),
(70, 'RH', 9, 'R', '2021-02-16 09:58:17', NULL),
(71, 'LH', 9, 'L', '2021-02-16 09:58:26', NULL),
(72, 'FRONT TIRE CTR WHEEL CAP  RH', 9, 'R', '2021-02-16 09:58:43', NULL),
(73, 'FRONT TIRE CTR WHEEL CAP  LH', 9, 'L', '2021-02-16 09:58:53', NULL),
(74, 'FRONT TIRE WHEEL   RH', 9, 'R', '2021-02-16 09:59:11', NULL),
(75, 'FRONT TIRE WHEEL   LH', 9, 'L', '2021-02-16 09:59:20', NULL),
(76, 'FRONT TIRE VALVE CAP  RH', 9, 'R', '2021-02-16 09:59:35', NULL),
(77, 'FRONT TIRE VALVE CAP  LH', 9, 'L', '2021-02-16 09:59:45', NULL),
(78, 'TIRE DISK COVER  RH', 9, 'R', '2021-02-16 09:59:59', NULL),
(79, 'TIRE DISK COVER  LH', 9, 'L', '2021-02-16 10:00:09', NULL),
(80, 'RH', 10, 'R', '2021-02-16 10:00:35', NULL),
(81, 'LH', 10, 'L', '2021-02-16 10:00:43', NULL),
(82, 'INSTRUM PNL*WIND SHIELD GLASS  RH', 10, 'R', '2021-02-16 10:00:52', NULL),
(83, 'INSTRUM PNL*WIND SHIELD GLASS  LH', 10, 'L', '2021-02-16 10:01:03', NULL),
(84, 'INSTRUM PNL*FRONT DOOR OPEN W/S  RH', 10, 'R', '2021-02-16 10:01:23', NULL),
(85, 'INSTRUM PNL*FRONT DOOR OPEN W/S  LH', 10, 'L', '2021-02-16 10:01:35', NULL),
(86, 'INSTRUM PNL CAP  RH', 10, 'R', '2021-02-16 10:01:48', NULL),
(87, 'INSTRUM PNL CAP  LH', 10, 'L', '2021-02-16 10:01:59', NULL),
(88, 'CONSOLE BOX  RH', 10, 'R', '2021-02-16 10:02:14', NULL),
(89, 'CONSOLE BOX  LH', 10, 'L', '2021-02-16 10:02:23', NULL),
(90, 'CONSOLE BOX ASHTRAY  RH', 10, 'R', '2021-02-16 10:02:39', NULL),
(91, 'CONSOLE BOX ASHTRAY  LH', 10, 'L', '2021-02-16 10:02:48', NULL),
(92, 'CNL PNL MOLDING   RH', 10, 'R', '2021-02-16 10:02:59', NULL),
(93, 'CNL PNL MOLDING   LH', 10, 'L', '2021-02-16 10:03:10', NULL),
(94, 'P/BRAKE COVER  RH', 10, 'R', '2021-02-16 10:03:23', NULL),
(95, 'P/BRAKE COVER  LH', 10, 'L', '2021-02-16 10:03:33', NULL),
(96, 'RH', 11, 'R', '2021-02-16 10:11:47', NULL),
(97, 'LH', 11, 'L', '2021-02-16 10:11:55', NULL),
(98, 'FRONT DOOR*SIDE BODY W/S RH', 11, 'R', '2021-02-16 10:12:17', NULL),
(99, 'FRONT DOOR*SIDE BODY W/S LH', 11, 'L', '2021-02-16 10:12:27', NULL),
(100, 'FRONT DOOR*CTR PILLAR  RH', 11, 'R', '2021-02-16 10:12:47', NULL),
(101, 'FRONT DOOR*CTR PILLAR  LH', 11, 'L', '2021-02-16 10:13:11', NULL),
(102, 'FRONT DOOR * FRONT PANEL  RH', 11, 'R', '2021-02-16 10:13:30', NULL),
(103, 'FRONT DOOR * FRONT PANEL  LH', 11, 'L', '2021-02-16 10:13:40', NULL),
(104, 'FRONT DOOR * FRONT FENDER  RH', 11, 'R', '2021-02-16 10:13:56', NULL),
(105, 'FRONT DOOR * FRONT FENDER  LH', 11, 'L', '2021-02-16 10:14:09', NULL),
(106, 'FRONT DOOR GLASS  RH', 11, 'R', '2021-02-16 10:14:32', NULL),
(107, 'FRONT DOOR GLASS  LH', 11, 'L', '2021-02-16 10:14:42', NULL),
(108, 'FRONT DOOR GLASS RUN  RH', 11, 'R', '2021-02-16 10:14:55', NULL),
(109, 'FRONT DOOR GLASS RUN  LH', 11, 'L', '2021-02-16 10:15:07', NULL),
(110, 'FRONT DOOR GLASS RUN INNER  RH', 11, 'R', '2021-02-16 10:16:51', NULL),
(111, 'FRONT DOOR GLASS RUN INNER  LH', 11, 'L', '2021-02-16 10:17:04', NULL),
(112, 'FRONT DOOR DUST SEAL  RH', 11, 'R', '2021-02-16 10:17:20', NULL),
(113, 'FRONT DOOR DUST SEAL  LH', 11, 'L', '2021-02-16 10:17:31', NULL),
(114, 'FRONT DOOR DECAL  RH', 11, 'R', '2021-02-16 10:17:44', NULL),
(115, 'FRONT DOOR DECAL  LH', 11, 'L', '2021-02-16 10:17:57', NULL),
(116, 'FRONT DOOR BAR DIVISION  RH', 11, 'R', '2021-02-16 10:18:13', NULL),
(117, 'FRONT DOOR BAR DIVISION  LH', 11, 'L', '2021-02-16 10:18:23', NULL),
(118, 'FRONT DOOR LATCH  RH', 11, 'R', '2021-02-16 10:18:43', NULL),
(119, 'FRONT DOOR LATCH  LH', 11, 'L', '2021-02-16 10:18:58', NULL),
(120, 'FRONT DOOR LATCH STRIKER  RH', 11, 'R', '2021-02-16 10:19:40', NULL),
(121, 'FRONT DOOR LATCH STRIKER  LH', 11, 'L', '2021-02-16 10:19:50', NULL),
(122, 'FRONT DOOR MOLDING * FRT FENDER  RH', 11, 'R', '2021-02-16 10:20:08', NULL),
(123, 'FRONT DOOR MOLDING * FRT FENDER  LH', 11, 'L', '2021-02-16 10:20:18', NULL),
(124, 'FR DOOR WINDOW REGULATOR  HANDLE  RH', 11, 'R', '2021-02-16 10:20:38', NULL),
(125, 'FR DOOR WINDOW REGULATOR  HANDLE  LH', 11, 'L', '2021-02-16 10:20:48', NULL),
(126, 'FR POWER WINDOW MOTOR  RH', 11, 'R', '2021-02-16 10:21:05', NULL),
(127, 'FR POWER WINDOW MOTOR  LH', 11, 'L', '2021-02-16 10:21:15', NULL),
(128, 'FR DOOR  POWER WINDOW S/W  RH', 11, 'R', '2021-02-16 10:21:31', NULL),
(129, 'FR DOOR  POWER WINDOW S/W  LH', 11, 'L', '2021-02-16 10:21:42', NULL),
(130, 'FRT DOOR  LOCK HANDLE  RH', 11, 'R', '2021-02-16 10:22:06', NULL),
(131, 'FRT DOOR  LOCK HANDLE  LH', 11, 'L', '2021-02-16 10:22:18', NULL),
(132, 'FRT DOOR  ROOM LAMP S/W  RH', 11, 'R', '2021-02-16 10:23:02', NULL),
(133, 'FRT DOOR  ROOM LAMP S/W  LH', 11, 'L', '2021-02-16 10:23:19', NULL),
(134, 'FRT DOOR  MOLDING  RH', 11, 'R', '2021-02-16 10:23:38', NULL),
(135, 'FRT DOOR  MOLDING  LH', 11, 'L', '2021-02-16 10:23:49', NULL),
(136, 'FRT DOOR SASH BRACK OUT GARNISH  RH', 11, 'R', '2021-02-16 10:24:22', NULL),
(137, 'FRT DOOR SASH BRACK OUT GARNISH  LH', 11, 'L', '2021-02-16 10:24:33', NULL),
(138, 'BRACKET INNER GARNISH  RH', 11, 'R', '2021-02-16 10:24:48', NULL),
(139, 'BRACKET INNER GARNISH  LH', 11, 'L', '2021-02-16 10:24:59', NULL),
(140, 'SHIELF CONSOLE  RH', 11, 'R', '2021-02-16 10:25:48', NULL),
(141, 'SHIELF CONSOLE  LH', 11, 'L', '2021-02-16 10:25:59', NULL),
(142, 'FRT DOOR HARNESS(SPEAKER)  RH', 11, 'R', '2021-02-16 10:26:13', NULL),
(143, 'FRT DOOR HARNESS(SPEAKER)  LH', 11, 'L', '2021-02-16 10:26:24', NULL),
(144, 'FRT DOOR SPEAKER LEAD WIRE  RH', 11, 'R', '2021-02-16 10:26:44', NULL),
(145, 'FRT DOOR SPEAKER LEAD WIRE  LH', 11, 'L', '2021-02-16 10:26:54', NULL),
(146, 'FRT DOOR OUT SIDE HANDLE  RH', 11, 'R', '2021-02-16 10:27:28', NULL),
(147, 'FRT DOOR OUT SIDE HANDLE  LH', 11, 'L', '2021-02-16 10:27:39', NULL),
(148, 'OUT CHAN MOLD*FIXED GLASS MOLDING  RH', 11, 'R', '2021-02-16 10:28:07', NULL),
(149, 'OUT CHAN MOLD*FIXED GLASS MOLDING  LH', 11, 'L', '2021-02-16 10:28:18', NULL),
(150, 'OUT CHANNEL MOLDING (OUT W/S)  RH', 11, 'R', '2021-02-16 10:28:34', NULL),
(151, 'OUT CHANNEL MOLDING (OUT W/S)  LH', 11, 'L', '2021-02-16 10:28:43', NULL),
(152, 'DOOR OUT CHANNEL MOLDING *GLASS RUN  RH', 11, 'R', '2021-02-16 10:28:55', NULL),
(153, 'DOOR OUT CHANNEL MOLDING *GLASS RUN  LH', 11, 'L', '2021-02-16 10:29:07', NULL),
(154, 'OUT CHANNEL MOLDING *DIVISION BAR  RH', 11, 'R', '2021-02-16 10:29:24', NULL),
(155, 'OUT CHANNEL MOLDING *DIVISION BAR  LH', 11, 'L', '2021-02-16 10:29:34', NULL),
(156, 'FRT DOOR ARMREEST  RH', 11, 'R', '2021-02-16 10:29:47', NULL),
(157, 'FRT DOOR ARMREEST  LH', 11, 'L', '2021-02-16 10:29:57', NULL),
(158, 'FRT DOOR LOCK KNOB (ABTO)  RH', 11, 'R', '2021-02-16 10:30:17', NULL),
(159, 'FRT DOOR LOCK KNOB (ABTO)  LH', 11, 'L', '2021-02-16 10:30:27', NULL),
(160, 'FRT DOOR OPENING W/S  RH', 11, 'R', '2021-02-16 10:30:41', NULL),
(161, 'FRT DOOR OPENING W/S  LH', 11, 'L', '2021-02-16 10:30:50', NULL),
(162, 'FRT DOOR OPENING STOP(DOOR CHECK)  RH', 11, 'R', '2021-02-16 10:31:02', NULL),
(163, 'FRT DOOR OPENING STOP(DOOR CHECK)  LH', 11, 'L', '2021-02-16 10:31:11', NULL),
(164, 'FRT DOOR OPENING CYLINDER  RH', 11, 'R', '2021-02-16 10:31:23', NULL),
(165, 'FRT DOOR OPENING CYLINDER  LH', 11, 'L', '2021-02-16 10:31:32', NULL),
(166, 'FR D/R INNER W/STRIP  RH', 11, 'R', '2021-02-16 10:31:44', NULL),
(167, 'FR D/R INNER W/STRIP  LH', 11, 'L', '2021-02-16 10:31:53', NULL),
(168, 'FR D/R W/STRIP  RH', 11, 'R', '2021-02-16 10:32:06', NULL),
(169, 'FR D/R W/STRIP  LH', 11, 'L', '2021-02-16 10:32:18', NULL),
(170, 'FTR DOOR SIDE HINGE  RH', 11, 'R', '2021-02-16 10:32:33', NULL),
(171, 'FTR DOOR SIDE HINGE  LH', 11, 'L', '2021-02-16 10:32:43', NULL),
(172, 'FR DOOR TRIM  RH', 11, 'R', '2021-02-16 10:32:56', NULL),
(173, 'FR DOOR TRIM  LH', 11, 'L', '2021-02-16 10:33:05', NULL),
(174, 'FR DOOR IN SIDE HANDLE  RH', 11, 'R', '2021-02-16 10:33:16', NULL),
(175, 'FR DOOR IN SIDE HANDLE  LH', 11, 'L', '2021-02-16 10:33:29', NULL),
(176, 'FR DOOR IN SIDE HANDLE ESCUTCHEON  RH', 11, 'R', '2021-02-16 10:33:48', NULL),
(177, 'FR DOOR IN SIDE HANDLE ESCUTCHEON  LH', 11, 'L', '2021-02-16 10:34:01', NULL),
(178, 'FRT DOOR KEY CYLINDER  RH', 11, 'R', '2021-02-16 10:34:13', NULL),
(179, 'FRT DOOR KEY CYLINDER  LH', 11, 'L', '2021-02-16 10:34:24', NULL),
(180, 'FR DOOR TRIM VINIL  RH', 11, 'R', '2021-02-16 10:34:50', NULL),
(181, 'FR DOOR TRIM VINIL  LH', 11, 'L', '2021-02-16 10:35:00', NULL),
(182, 'FR D/R TRIM UPPER  RH', 11, 'R', '2021-02-16 10:39:59', NULL),
(183, 'FR D/R TRIM UPPER  LH', 11, 'L', '2021-02-16 10:40:16', NULL),
(184, 'FRONT ASSISTANT GRIP  HOOK  RH', 11, 'R', '2021-02-16 10:41:07', NULL),
(185, 'FRONT ASSISTANT GRIP  HOOK  LH', 11, 'L', '2021-02-16 10:41:19', NULL),
(186, 'FRT DOOR * FRT DOOR OUT GARNISH  RH', 11, 'R', '2021-02-16 10:41:49', NULL),
(187, 'FRT DOOR * FRT DOOR OUT GARNISH  LH', 11, 'L', '2021-02-16 10:42:02', NULL),
(188, 'RH', 12, 'R', '2021-02-16 10:43:36', NULL),
(189, 'LH', 12, 'L', '2021-02-16 10:43:50', NULL),
(190, 'RECLINING COVER RH', 12, 'R', '2021-02-16 10:44:15', NULL),
(191, 'RECLINING COVER LH', 12, 'L', '2021-02-16 10:44:27', NULL),
(192, 'FRT DOOR DEPOZIT BOX  RH', 11, 'R', '2021-02-16 10:46:12', NULL),
(193, 'FRT DOOR DEPOZIT BOX  LH', 11, 'L', '2021-02-16 10:46:22', NULL),
(194, 'TIRE PRESS LEBEL  RH', 11, 'R', '2021-02-16 11:45:47', NULL),
(195, 'TIRE PRESS LEBEL  LH', 11, 'L', '2021-02-16 11:46:00', NULL),
(196, 'FRONT DOOR FIXID GLASS  RH', 11, 'R', '2021-02-16 11:46:27', NULL),
(197, 'FRONT DOOR FIXID GLASS  LH', 11, 'L', '2021-02-16 11:46:35', NULL),
(198, 'FRONT DOOR FIXID GLASS MOLDING (IN)  RH', 11, 'R', '2021-02-16 11:46:49', NULL),
(199, 'FRONT DOOR FIXID GLASS MOLDING (IN)  LH', 11, 'L', '2021-02-16 11:46:59', NULL),
(200, 'FRONT DOOR GROMMET  RH', 11, 'R', '2021-02-16 11:47:12', NULL),
(201, 'FRONT DOOR GROMMET  LH', 11, 'L', '2021-02-16 11:47:23', NULL),
(202, 'FRONT DOOR HINGE  RH', 11, 'R', '2021-02-16 11:47:34', NULL),
(203, 'FRONT DOOR HINGE  LH', 11, 'L', '2021-02-16 11:47:45', NULL),
(204, 'FRONT SHROUD SIDE TRIM  RH', 11, 'R', '2021-02-16 11:47:56', NULL),
(205, 'FRONT SHROUD SIDE TRIM  LH', 11, 'L', '2021-02-16 11:48:53', NULL),
(206, 'FRT SEAT SLIDING LEVER  RH', 12, 'R', '2021-02-16 11:49:46', NULL),
(207, 'FRT SEAT SLIDING LEVER  LH', 12, 'L', '2021-02-16 11:49:57', NULL),
(208, 'SEAT LOCK  RH', 12, 'R', '2021-02-16 11:56:50', NULL),
(209, 'SEAT LOCK  LH', 12, 'L', '2021-02-16 11:57:01', NULL),
(210, 'RECLINING LEVER  RH', 12, 'R', '2021-02-16 11:57:14', NULL),
(211, 'RECLINING LEVER  LH', 12, 'L', '2021-02-16 11:57:28', NULL),
(212, 'SLIDING  RH', 12, 'R', '2021-02-16 11:57:54', NULL),
(213, 'SLIDING  LH', 12, 'L', '2021-02-16 12:00:42', NULL),
(214, 'SEAT CUSHION  RH', 9, 'R', '2021-02-16 12:01:00', NULL),
(215, 'SEAT CUSHION  LH', 12, 'L', '2021-02-16 12:01:13', NULL),
(216, 'HEADREST  RH', 12, 'R', '2021-02-16 12:01:25', NULL),
(217, 'HEADREST  LH', 12, 'L', '2021-02-16 12:01:37', NULL),
(218, 'SEAT LOCK COVER  RH', 12, 'R', '2021-02-16 12:01:49', NULL),
(219, 'SEAT LOCK COVER  LH', 12, 'L', '2021-02-16 12:02:00', NULL),
(220, 'E/G ROOM CTR COVER', 40, '', '2021-02-16 12:02:00', NULL),
(221, 'E/G WATER PROTECT', 40, '', '2021-02-16 12:02:12', NULL),
(222, 'SEAT BACK  RH', 12, 'R', '2021-02-16 12:02:20', NULL),
(223, 'HOOD STAY', 40, '', '2021-02-16 12:02:24', NULL),
(224, 'SEAT BACK  LH', 12, 'L', '2021-02-16 12:02:31', NULL),
(225, 'E/G ROOM INSUL', 40, '', '2021-02-16 12:02:39', NULL),
(226, 'SIDE DEKARATION TARE  RH', 12, 'R', '2021-02-16 12:02:43', NULL),
(227, 'DAMPING BLOCK ', 40, '', '2021-02-16 12:02:49', NULL),
(228, 'SIDE DEKARATION TARE  LH', 12, 'L', '2021-02-16 12:02:52', NULL),
(229, 'HOOD CUSION ', 40, '', '2021-02-16 12:03:02', NULL),
(230, 'UNDER BODY FLOOR CAP(FRT/RR)', 40, '', '2021-02-16 12:03:16', NULL),
(231, 'WATER DEFLECTOR', 40, '', '2021-02-16 12:03:32', NULL),
(232, 'ЗАШИТНИК КАРТЕРА', 40, '', '2021-02-16 12:03:47', NULL),
(233, 'HEATER PROTECT', 40, '', '2021-02-16 12:03:59', NULL),
(234, 'RH', 13, 'R', '2021-02-16 12:04:08', NULL),
(235, 'LH', 13, 'L', '2021-02-16 12:04:25', NULL),
(236, 'SEAT BELT RH', 13, 'R', '2021-02-16 12:04:40', NULL),
(237, 'HEATER PROTECT', 40, '', '2021-02-16 12:04:44', NULL),
(238, 'SEAT BELT LH', 13, 'L', '2021-02-16 12:04:50', NULL),
(239, 'HOOD EXP LABEL (IN)', 40, '', '2021-02-16 12:04:56', NULL),
(240, 'FRT SEAT BELT BUCKLE  RH', 13, 'R', '2021-02-16 12:05:03', NULL),
(241, 'BACK DOOR ВНУТРЕННОСТЬ', 40, '', '2021-02-16 12:05:07', NULL),
(242, 'FRT SEAT BELT BUCKLE  LH', 13, 'L', '2021-02-16 12:05:15', NULL),
(243, 'DASH PANEL', 40, '', '2021-02-16 12:05:17', NULL),
(244, 'SEAT BELT REGULATOR  RH', 13, 'R', '2021-02-16 12:05:28', NULL),
(245, 'SEAT BELT REGULATOR  LH', 13, 'L', '2021-02-16 12:05:41', NULL),
(246, 'FRONT DOOR ВНУТРЕННОСТЬ RH', 40, '', '2021-02-16 12:05:51', NULL),
(247, 'SEAT BELT COVER  RH', 13, 'R', '2021-02-16 12:05:52', NULL),
(248, 'FRONT DOOR ВНУТРЕННОСТЬ LH', 40, '', '2021-02-16 12:06:00', NULL),
(249, 'SEAT BELT COVER  LH', 13, 'L', '2021-02-16 12:06:01', NULL),
(250, 'SEAT BELT FILLER ANCHOR PLATE  RH', 13, 'R', '2021-02-16 12:06:12', NULL),
(251, 'REAR DOOR ВНУТРЕННОСТЬ RH', 40, '', '2021-02-16 12:06:17', NULL),
(252, 'SEAT BELT FILLER ANCHOR PLATE  LH', 13, 'L', '2021-02-16 12:06:22', NULL),
(253, 'REAR DOOR ВНУТРЕННОСТЬ LH', 40, '', '2021-02-16 12:06:27', NULL),
(254, 'FRT FLOOR MAT  RH', 13, 'R', '2021-02-16 12:06:32', NULL),
(255, 'FRT FLOOR MAT  LH', 13, 'L', '2021-02-16 12:06:45', NULL),
(256, 'RR FLOOR MAT  RH', 13, 'R', '2021-02-16 12:06:56', NULL),
(257, 'RR FLOOR MAT  LH', 13, 'L', '2021-02-16 12:07:05', NULL),
(258, 'CNG TANK VALVE(MONOMETR)', 39, '', '2021-02-16 12:08:14', NULL),
(259, 'CNG GAS REDUCER', 39, '', '2021-02-16 12:08:31', NULL),
(260, 'RH', 14, 'R', '2021-02-16 12:08:33', NULL),
(261, 'CNG RR STABILIZER', 39, '', '2021-02-16 12:08:44', NULL),
(262, 'LH', 14, 'L', '2021-02-16 12:08:57', NULL),
(263, 'CNG PIPE (HOSE)', 39, '', '2021-02-16 12:09:00', NULL),
(264, 'CNG TANK BAND', 39, '', '2021-02-16 12:09:10', NULL),
(265, 'ROCKER PNL* FR DOOR   RH', 14, 'R', '2021-02-16 12:09:12', NULL),
(266, 'ROCKER PNL* FR DOOR   LH', 14, 'L', '2021-02-16 12:09:23', NULL),
(267, 'CNG TANK MOUNTING', 39, '', '2021-02-16 12:09:23', NULL),
(268, 'CNG FILLING VALVE', 39, '', '2021-02-16 12:09:34', NULL),
(269, 'ROCKER PNL* RR DOOR   RH', 14, 'R', '2021-02-16 12:09:48', NULL),
(270, ' PLASTIC CLAMP', 39, '', '2021-02-16 12:09:54', NULL),
(271, 'ROCKER PNL* RR DOOR   LH', 14, 'L', '2021-02-16 12:09:58', NULL),
(272, 'CNG LANDI SWITCH(INPNL) ', 39, '', '2021-02-16 12:10:05', NULL),
(273, 'CNG FILTR', 39, '', '2021-02-16 12:10:17', NULL),
(274, 'CNG INGEKTOR', 39, '', '2021-02-16 12:10:27', NULL),
(275, 'VENTILATION HOSE  SCREW  CLAMP', 39, '', '2021-02-16 12:10:36', NULL),
(276, 'ФИКСИРУЮЩИЙ ХОМУТ', 39, '', '2021-02-16 12:10:47', NULL),
(277, 'РАМА ДЛЯ  БАЛЛОН', 39, '', '2021-02-16 12:10:57', NULL),
(278, 'ROCKER PNL* B PILLAR TRIM   RH', 14, 'R', '2021-02-16 12:11:02', NULL),
(279, 'ARM POWER UNIT', 38, '', '2021-02-16 12:11:12', NULL),
(280, 'ROCKER PNL* B PILLAR TRIM   LH', 14, 'L', '2021-02-16 12:11:13', NULL),
(281, 'RR ROCKER PAN*SIDE TRIM   RH', 14, 'R', '2021-02-16 12:11:23', NULL),
(282, 'MASTER CYLINDER', 38, '', '2021-02-16 12:11:25', NULL),
(283, 'RR ROCKER PAN*SIDE TRIM   LH', 14, 'L', '2021-02-16 12:11:34', NULL),
(284, 'RESERV TANK HOSE', 38, '', '2021-02-16 12:11:38', NULL),
(285, 'FRT ROCKER PNL* FRT SHROUD SIDE TRIM   RH', 14, 'R', '2021-02-16 12:11:45', NULL),
(286, 'EAC HARNESS', 38, '', '2021-02-16 12:11:48', NULL),
(287, 'FRT ROCKER PNL* FRT SHROUD SIDE TRIM  LH', 14, 'L', '2021-02-16 12:11:57', NULL),
(288, 'INTAKE MANIFOLD', 38, '', '2021-02-16 12:11:58', NULL),
(289, 'RESERV TANK', 38, '', '2021-02-16 12:12:12', NULL),
(290, 'RESERV TANK AXLE', 38, '', '2021-02-16 12:12:22', NULL),
(291, 'SLAVE CYLINDER', 38, '', '2021-02-16 12:12:31', NULL),
(292, 'HOOD CONTROL S/W', 38, '', '2021-02-16 12:12:42', NULL),
(293, 'HOOD CONTROL S/W', 38, '', '2021-02-16 12:13:47', NULL),
(294, 'A/C GAS CAP', 37, '', '2021-02-16 12:14:05', NULL),
(295, 'RECEIVER DRIVER', 37, '', '2021-02-16 12:14:16', NULL),
(296, 'RECEIVER DRIVER INLET/OUTLET JOINT', 37, '', '2021-02-16 12:14:26', NULL),
(297, 'EVA PORATOR INLET /OUTLET JOINT', 37, '', '2021-02-16 12:14:36', NULL),
(298, 'A/C GAS ', 37, '', '2021-02-16 12:14:57', NULL),
(299, 'COMPRESSOR', 37, '', '2021-02-16 12:15:09', NULL),
(300, 'COMPRESSOR DRIVER INLET/OUTLET JOINT', 37, '', '2021-02-16 12:15:22', NULL),
(301, 'A/C RELAY', 37, '', '2021-02-16 12:15:33', NULL),
(302, 'A/C PIPE', 37, '', '2021-02-16 12:15:44', NULL),
(303, 'A/C FAN', 37, '', '2021-02-16 12:15:57', NULL),
(304, 'COOLING UNIT', 37, '', '2021-02-16 12:16:07', NULL),
(305, 'COMPRESSOR BELT', 37, '', '2021-02-16 12:16:17', NULL),
(306, 'CONDENSATOR', 37, '', '2021-02-16 12:16:27', NULL),
(307, 'CONDENSATOR IN HOSE', 37, '', '2021-02-16 12:16:36', NULL),
(308, 'БОРТ КЛИМАТ КОНТРОЛ', 37, '', '2021-02-16 12:16:45', NULL),
(309, 'FRONT STRUT RH', 36, 'R', '2021-02-16 12:49:52', '2021-02-16 12:50:50'),
(310, 'FRONT STRUT LH', 36, 'L', '2021-02-16 12:50:27', NULL),
(311, 'STRUT SIDE NUT RH', 36, 'R', '2021-02-16 12:51:31', NULL),
(312, 'STRUT SIDE NUT LH', 36, 'L', '2021-02-16 12:51:43', NULL),
(313, 'STRUT SPOT CTR NUT', 36, '', '2021-02-16 12:52:01', NULL),
(314, 'REAR SHACKLE PLATE  ', 36, '', '2021-02-16 12:52:37', NULL),
(315, 'REAR SHOCK ABSORBER', 36, '', '2021-02-16 12:52:50', NULL),
(316, 'REAR SPRING U BOLT', 36, '', '2021-02-16 12:53:02', NULL),
(317, 'FRONT SPRING RH', 36, 'R', '2021-02-16 12:53:15', '2021-02-16 12:53:49'),
(318, 'FRONT SPRING LH', 36, 'L', '2021-02-16 12:53:30', NULL),
(319, 'REAR SPRING RH', 36, 'R', '2021-02-16 12:54:05', NULL),
(320, 'REAR SPRING LH', 36, 'L', '2021-02-16 12:54:18', NULL),
(321, 'REAR TRAILING ARM RH', 36, 'R', '2021-02-16 12:54:38', NULL),
(322, 'REAR TRAILING ARM LH', 36, 'L', '2021-02-16 12:54:54', NULL),
(323, 'RH', 15, 'R', '2021-02-16 12:55:38', NULL),
(324, 'LH', 15, 'L', '2021-02-16 12:55:47', NULL),
(325, 'STABILIZER BAR BUSHING /COTTER PIN', 36, '', '2021-02-16 12:55:52', NULL),
(326, 'ROOF FRONT REINF  RH', 15, 'R', '2021-02-16 12:56:02', NULL),
(327, 'STABILIZER BAR MOUNTING BRACKET', 36, '', '2021-02-16 12:56:06', NULL),
(328, 'ROOF FRONT REINF  LH', 15, 'L', '2021-02-16 12:56:18', NULL),
(329, 'ROOF RR IN GARN  RH', 15, 'R', '2021-02-16 12:56:28', NULL),
(330, 'EXTENSION ROD', 36, 'R', '2021-02-16 12:56:29', NULL),
(331, 'ROOF RR IN GARN  LH', 15, 'L', '2021-02-16 12:56:38', NULL),
(332, 'EXTENSION ROD', 36, 'L', '2021-02-16 12:56:43', NULL),
(333, 'ROOF INSIDE MOLDING   RH', 15, 'R', '2021-02-16 12:56:52', NULL),
(334, 'TENSION ROD', 36, '', '2021-02-16 12:56:57', NULL),
(335, 'ROOF INSIDE MOLDING   LH', 15, 'L', '2021-02-16 12:57:02', NULL),
(336, 'ENTERMED ARM', 36, '', '2021-02-16 12:57:08', NULL),
(337, 'TENSION ROD BRACK', 36, '', '2021-02-16 12:57:19', NULL),
(338, 'FRONT SUSPENSION PLAIN', 36, '', '2021-02-16 12:58:12', NULL),
(339, 'FRONT SUSPENSION STRUT', 36, '', '2021-02-16 12:58:25', NULL),
(340, 'FRONT ROOM LAMP  ', 15, '', '2021-02-16 12:58:59', NULL),
(341, 'FRONT SUSPENSION STRUT', 36, '', '2021-02-16 12:59:03', NULL),
(342, 'FRONT SUSPENSION CONTROL ARM', 36, '', '2021-02-16 12:59:13', NULL),
(343, 'REAR AXLE RH', 36, 'R', '2021-02-16 12:59:27', NULL),
(344, 'REAR AXLE LH', 36, 'L', '2021-02-16 12:59:36', NULL),
(345, 'REAR AXLE', 36, '', '2021-02-16 12:59:47', NULL),
(346, 'FRONT SHOCK ABSORBER', 36, '', '2021-02-16 13:00:50', NULL),
(347, 'REAR ROOM LAMP   	', 15, '', '2021-02-16 13:01:48', NULL),
(348, 'TURNING RADIUS WHEEL IN', 35, '', '2021-02-16 13:02:01', NULL),
(349, 'SUNVISOR   RH', 15, 'R', '2021-02-16 13:02:06', NULL),
(350, 'SUNVISOR   LH', 15, 'L', '2021-02-16 13:02:15', NULL),
(351, 'SUNROOF OPEN SWITCH   ', 15, '', '2021-02-16 13:04:31', NULL),
(352, 'SUNROOF W/S   ', 15, '', '2021-02-16 13:04:57', NULL),
(353, 'RH', 16, 'R', '2021-02-16 13:05:38', NULL),
(354, 'LH', 16, 'L', '2021-02-16 13:05:45', NULL),
(355, 'B PILLAR DECAL (CENTER PILLAR) RH', 16, 'R', '2021-02-16 13:06:02', NULL),
(356, 'B PILLAR DECAL (CENTER PILLAR) LH', 16, 'L', '2021-02-16 13:06:13', NULL),
(357, 'B PILLAR TRIM UPPER  RH', 16, 'R', '2021-02-16 13:06:25', NULL),
(358, 'B PILLAR TRIM UPPER  LH', 16, 'L', '2021-02-16 13:06:33', NULL),
(359, 'B PILLAR PANEL (CTR PILLAR TRIM)   RH', 16, 'R', '2021-02-16 13:06:50', NULL),
(360, 'B PILLAR PANEL (CTR PILLAR TRIM)   LH', 16, 'L', '2021-02-16 13:06:58', NULL),
(361, 'B PILLAR TRIM * ROOF HEADLING   RH', 16, 'R', '2021-02-16 13:07:09', NULL),
(362, 'B PILLAR TRIM * ROOF HEADLING   LH', 16, 'L', '2021-02-16 13:07:17', NULL),
(363, 'RR DOOR MOLDING*FR DOOR MOLDING  RH', 16, 'R', '2021-02-16 13:07:37', NULL),
(364, 'RR DOOR MOLDING*FR DOOR MOLDING  LH', 16, 'L', '2021-02-16 13:07:46', NULL),
(365, 'CTR PILLAR OPEN W/S   RH', 16, 'R', '2021-02-16 13:07:57', NULL),
(366, 'CTR PILLAR OPEN W/S   LH', 16, 'L', '2021-02-16 13:08:07', NULL),
(367, 'FRONT ROCKER PNL COVER   RH', 16, 'R', '2021-02-16 13:08:17', NULL),
(368, 'FRONT ROCKER PNL COVER   LH', 16, 'L', '2021-02-16 13:08:25', NULL),
(369, 'RH', 17, 'R', '2021-02-16 13:09:08', NULL),
(370, 'LH', 17, 'L', '2021-02-16 13:09:15', NULL),
(371, 'REAR DOOR *SIDE BODY PANEL  RH', 17, 'R', '2021-02-16 13:09:28', NULL),
(372, 'REAR DOOR *SIDE BODY PANEL  LH', 17, 'L', '2021-02-16 13:09:37', NULL),
(373, 'TURNING RADIUS WHEEL OUT', 35, '', '2021-02-16 13:10:28', NULL),
(374, 'SUNROOF GLOSE   ', 15, '', '2021-02-16 13:10:57', NULL),
(375, 'STEERING WHEEL', 35, '', '2021-02-16 13:11:01', NULL),
(376, 'REAR DOOR *SIDE BODY W/S  RH', 17, 'R', '2021-02-16 13:11:10', NULL),
(377, 'STEERING WHEEL CAP RH', 35, 'R', '2021-02-16 13:11:20', NULL),
(378, 'REAR DOOR *SIDE BODY W/S  LH', 17, 'L', '2021-02-16 13:11:22', NULL),
(379, 'STEERING WHEEL CAP LH', 35, 'L', '2021-02-16 13:11:30', NULL),
(380, 'REAR DOOR * CENTER PILLAR  RH', 17, 'R', '2021-02-16 13:11:37', NULL),
(381, 'STEERING COLUMN', 35, '', '2021-02-16 13:11:42', NULL),
(382, 'REAR DOOR * CENTER PILLAR  LH', 17, 'L', '2021-02-16 13:11:47', NULL),
(383, 'STR COLUMN COWER', 35, '', '2021-02-16 13:11:52', NULL),
(384, 'RR DOOR * FRT DOOR   RH', 17, 'R', '2021-02-16 13:11:56', NULL),
(385, 'RR DOOR * FRT DOOR   LH', 17, 'L', '2021-02-16 13:12:04', NULL),
(386, 'STEERING WHEEL LOCK', 35, '', '2021-02-16 13:12:06', NULL),
(387, 'RR. DOOR GLASS   RH', 17, 'R', '2021-02-16 13:12:16', NULL),
(388, 'STEERING WHEEL EMBLEM', 35, '', '2021-02-16 13:12:16', NULL),
(389, 'RR. DOOR GLASS   LH', 17, 'L', '2021-02-16 13:12:26', NULL),
(390, 'STEERING SHAFT', 35, '', '2021-02-16 13:12:29', NULL),
(391, 'RR. DOOR GLASS RUN   RH', 17, 'R', '2021-02-16 13:12:36', NULL),
(392, 'STEERING OIL PUMP', 35, '', '2021-02-16 13:12:43', NULL),
(393, 'RR. DOOR GLASS RUN   LH', 17, 'L', '2021-02-16 13:12:45', NULL),
(394, 'RR. DOOR W/S INNER   RH', 17, 'R', '2021-02-16 13:12:55', NULL),
(395, 'ЦЕНТРОВКА STEERING WHEEL', 35, '', '2021-02-16 13:12:55', NULL),
(396, 'RR. DOOR W/S INNER   LH', 17, 'L', '2021-02-16 13:13:05', NULL),
(397, 'STEERING SHAFT JOINT', 35, '', '2021-02-16 13:13:09', NULL),
(398, 'RR. DOOR GLASS W/S   RH', 17, 'R', '2021-02-16 13:13:14', NULL),
(399, 'STERING GEAR BOX', 35, '', '2021-02-16 13:13:21', NULL),
(400, 'RR. DOOR GLASS W/S   LH', 17, 'L', '2021-02-16 13:13:24', NULL),
(401, 'STEERING GEAR BOX BOOT', 35, '', '2021-02-16 13:13:31', NULL),
(402, 'RR. DOOR GLASS RUN INNER   RH', 17, 'R', '2021-02-16 13:13:33', NULL),
(403, 'RR. DOOR GLASS RUN INNER   LH', 17, 'L', '2021-02-16 13:13:43', NULL),
(404, 'STEERING TIE ROD END', 35, '', '2021-02-16 13:13:46', NULL),
(405, 'RR. DOOR LATCH   RH', 17, 'R', '2021-02-16 13:13:53', NULL),
(406, 'STEERING RACK SIDE BOOT', 35, '', '2021-02-16 13:13:58', NULL),
(407, 'RR. DOOR LATCH   LH', 17, 'L', '2021-02-16 13:14:02', NULL),
(408, 'RR DOOR HARNESS   RH', 17, 'R', '2021-02-16 13:14:12', NULL),
(409, 'AUDIO REMOCON S/W', 35, '', '2021-02-16 13:14:14', NULL),
(410, 'RR DOOR HARNESS   LH', 17, 'L', '2021-02-16 13:14:21', NULL),
(411, 'STEERING WHEEL SIDE MOUNTING', 35, '', '2021-02-16 13:14:26', NULL),
(412, 'REGULATOR HANDLE   RH', 17, 'R', '2021-02-16 13:14:33', NULL),
(413, 'POWER STERING RESERVUAR TANK', 35, '', '2021-02-16 13:14:41', NULL),
(414, 'REGULATOR HANDLE   LH', 17, 'L', '2021-02-16 13:14:42', NULL),
(415, 'POWER STERING PUMP BELT', 35, '', '2021-02-16 13:14:52', NULL),
(416, 'RR DOOR LOCK    RH', 17, 'R', '2021-02-16 13:14:52', NULL),
(417, 'RR DOOR LOCK    LH', 17, 'L', '2021-02-16 13:15:00', NULL),
(418, 'POWER STERING SENSOR HOSE/PIPE', 35, '', '2021-02-16 13:15:01', NULL),
(419, 'LOCK BUTTON/LOCK KNOB   RH', 17, 'R', '2021-02-16 13:15:10', NULL),
(420, 'STEERING KNUCLE', 35, '', '2021-02-16 13:15:14', NULL),
(421, 'LOCK BUTTON/LOCK KNOB   LH', 17, 'L', '2021-02-16 13:15:18', NULL),
(422, 'ABS WHEEL SENSOR (FRT/RR)', 35, '', '2021-02-16 13:15:24', NULL),
(423, 'RR DOOR FIXID GLASS   RH', 17, 'R', '2021-02-16 13:15:28', NULL),
(424, 'RR DOOR FIXID GLASS   LH', 17, 'L', '2021-02-16 13:15:36', NULL),
(425, 'ABS WHEEL HARNES', 35, '', '2021-02-16 13:15:41', NULL),
(426, 'RR DOOR MOLDING   RH', 17, 'R', '2021-02-16 13:15:45', NULL),
(427, 'RR DOOR MOLDING   LH', 17, 'L', '2021-02-16 13:15:54', NULL),
(428, 'RR DOOR SAFETY LOCK   RH', 17, 'R', '2021-02-16 13:16:19', NULL),
(429, 'BRAKE REZERV.TANK', 34, '', '2021-02-16 13:16:20', NULL),
(430, 'RR DOOR SAFETY LOCK   LH', 17, 'L', '2021-02-16 13:16:29', NULL),
(431, 'BRAKE MASTER CYLIN', 34, '', '2021-02-16 13:16:32', NULL),
(432, 'RR. DOOR POWER WINDOW S/W  RH', 17, 'R', '2021-02-16 13:16:44', NULL),
(433, 'BRAKE BOOSTER', 34, '', '2021-02-16 13:16:45', NULL),
(434, 'RR. DOOR POWER WINDOW S/W  LH', 17, 'L', '2021-02-16 13:16:53', NULL),
(435, 'УРОВЕН BRAKE OIL', 34, '', '2021-02-16 13:16:55', NULL),
(436, 'BRAKE VACUM HOSE', 34, '', '2021-02-16 13:17:06', NULL),
(437, 'RR. DOOR STOP CUSHION   RH', 17, 'R', '2021-02-16 13:17:06', NULL),
(438, 'RR. DOOR STOP CUSHION   LH', 17, 'L', '2021-02-16 13:17:17', NULL),
(439, 'BRAKE JOINT BOLT', 34, '', '2021-02-16 13:17:21', NULL),
(440, 'BRAKE 5 WAY JOINT', 34, '', '2021-02-16 13:17:31', NULL),
(441, 'RR DOOR STRIKER   RH', 17, 'R', '2021-02-16 13:17:31', NULL),
(442, 'RR DOOR STRIKER   LH', 17, 'L', '2021-02-16 13:17:41', NULL),
(443, 'FRT BRAKE FLEXIBLE HOSE RING', 34, 'R', '2021-02-16 13:17:53', NULL),
(444, 'RR DOOR SIDE HINGE   RH', 17, 'R', '2021-02-16 13:17:55', NULL),
(445, 'FRT BRAKE FLEXIBLE HOSE RING', 34, 'L', '2021-02-16 13:18:00', NULL),
(446, 'RR DOOR SIDE HINGE   LH', 17, 'L', '2021-02-16 13:18:03', NULL),
(447, 'RR DOOR OUT SIDE HANDLE   RH', 17, 'R', '2021-02-16 13:18:13', NULL),
(448, 'RR BRAKE FLEXIBLE HOSE RING', 34, 'R', '2021-02-16 13:18:16', NULL),
(449, 'RR DOOR OUT SIDE HANDLE   LH', 17, 'L', '2021-02-16 13:18:21', NULL),
(450, 'RR BRAKE FLEXIBLE HOSE RING', 34, 'L', '2021-02-16 13:18:25', NULL),
(451, 'OUT CHANNEL MOLDING (OUTSIDE W/S)  RH', 17, 'R', '2021-02-16 13:18:32', NULL),
(452, 'OUT CHANNEL MOLDING (OUTSIDE W/S)  LH', 17, 'L', '2021-02-16 13:18:42', NULL),
(453, 'BRAKE DRUM  ', 34, 'R', '2021-02-16 13:19:12', NULL),
(454, 'BRAKE DRUM  ', 34, 'L', '2021-02-16 13:19:21', NULL),
(455, 'BRAKE CALIPER', 34, 'R', '2021-02-16 13:19:35', NULL),
(456, 'BRAKE CALIPER', 34, 'L', '2021-02-16 13:19:43', NULL),
(457, 'BRAKE PIPE COVER FRT', 34, 'R', '2021-02-16 13:20:51', NULL),
(458, 'BRAKE PIPE COVER FRT LH', 34, 'L', '2021-02-16 13:21:06', NULL),
(459, 'OUT SIDE MOLDING * GLASS RUN   RH', 17, 'R', '2021-02-16 13:21:18', NULL),
(460, 'BRAKE PIPE COVER RR RH', 34, 'R', '2021-02-16 13:21:22', NULL),
(461, 'OUT SIDE MOLDING * GLASS RUN   LH', 17, 'L', '2021-02-16 13:21:26', NULL),
(462, 'BRAKE PIPE COVER RR LH', 34, 'L', '2021-02-16 13:21:36', NULL),
(463, 'RR DOOR OUT GARNISH   RH', 17, 'R', '2021-02-16 13:21:41', NULL),
(464, 'FRT BRAKE AIR BLADE SCREW', 34, '', '2021-02-16 13:21:48', NULL),
(465, 'RR DOOR OUT GARNISH   LH', 17, 'L', '2021-02-16 13:21:52', NULL),
(466, 'RR BRAKE AIR BLADE SCREW', 34, '', '2021-02-16 13:22:00', NULL),
(467, 'RR DOOR ARMREST   RH', 17, 'R', '2021-02-16 13:22:01', NULL),
(468, 'RR DOOR ARMREST   LH', 17, 'L', '2021-02-16 13:22:11', NULL),
(469, 'PARKING BRAKE CABLE BAND', 34, '', '2021-02-16 13:22:15', NULL),
(470, 'RR DOOR UPPER ARMREST   RH', 17, 'R', '2021-02-16 13:22:21', NULL),
(471, 'RR DOOR UPPER ARMREST   LH', 17, 'L', '2021-02-16 13:22:29', NULL),
(472, 'PARKING BRAKE CABLE ', 34, '', '2021-02-16 13:22:36', NULL),
(473, 'RR DOOR ASHTRAY   RH', 17, 'R', '2021-02-16 13:22:38', NULL),
(474, 'RR DOOR ASHTRAY   LH', 17, 'L', '2021-02-16 13:22:48', NULL),
(475, 'FRT BRAKE PIPE RH', 34, 'R', '2021-02-16 13:22:50', NULL),
(476, 'RR DOOR OPEN W/S   RH', 17, 'R', '2021-02-16 13:22:57', NULL),
(477, 'RR DOOR OPEN W/S   LH', 17, 'L', '2021-02-16 13:23:06', NULL),
(478, 'FRT BRAKE PIPE LH', 34, 'L', '2021-02-16 13:23:06', NULL),
(479, 'RR DOOR OPEN STOPPER (CHECK)   RH', 17, 'R', '2021-02-16 13:23:17', NULL),
(480, 'RR DOOR OPEN STOPPER (CHECK)   LH', 17, 'L', '2021-02-16 13:23:24', NULL),
(481, 'RR BRAKE PIPE RH', 34, 'R', '2021-02-16 13:23:28', NULL),
(482, 'IN GARNISH   RH', 17, 'R', '2021-02-16 13:23:33', NULL),
(483, 'IN GARNISH   LH', 17, 'L', '2021-02-16 13:23:41', NULL),
(484, 'RR BRAKE PIPE LH', 34, 'L', '2021-02-16 13:23:50', NULL),
(485, 'RR DOOR DECAL   RH', 17, 'R', '2021-02-16 13:23:51', NULL),
(486, 'RR DOOR DECAL   LH', 17, 'L', '2021-02-16 13:23:59', NULL),
(487, 'UNDER BODY BRAKE PIPE', 34, '', '2021-02-16 13:24:02', NULL),
(488, 'RR DOOR OPEN CYLINDER   RH', 17, 'R', '2021-02-16 13:24:08', NULL),
(489, 'BRAKE PIPE/PIPE VALVE', 34, '', '2021-02-16 13:24:12', NULL),
(490, 'RR DOOR OPEN CYLINDER  LH', 17, 'L', '2021-02-16 13:24:19', NULL),
(491, 'RR DOOR TRIM   RH', 17, 'R', '2021-02-16 13:24:29', NULL),
(492, 'RR DOOR TRIM   LH', 17, 'L', '2021-02-16 13:24:38', NULL),
(493, 'RR DOOR  W/S   RH', 17, 'R', '2021-02-16 13:24:46', NULL),
(494, 'RR BRAKE PIPE RH', 34, 'R', '2021-02-16 13:24:47', NULL),
(495, 'RR DOOR  W/S   LH', 17, 'L', '2021-02-16 13:24:54', NULL),
(496, 'RR BRAKE PIPE LH', 34, 'L', '2021-02-16 13:24:58', NULL),
(497, 'RR DOOR * QTR GLASS MOLDING   RH', 17, 'R', '2021-02-16 13:25:02', NULL),
(498, 'RR DOOR * QTR GLASS MOLDING   LH', 17, 'L', '2021-02-16 13:25:10', NULL),
(499, 'FRT BRAKE DUST COVER', 34, 'R', '2021-02-16 13:25:18', NULL),
(500, 'RR DOOR IN SIDE HANDLE   RH', 17, 'R', '2021-02-16 13:25:20', NULL),
(501, 'RR DOOR IN SIDE HANDLE   LH', 17, 'L', '2021-02-16 13:25:29', NULL),
(502, 'FRT BRAKE DUST COVER', 34, 'L', '2021-02-16 13:25:30', NULL),
(503, 'RR DOOR IN SIDE HANDLE SCREW   RH', 17, 'R', '2021-02-16 13:25:38', NULL),
(504, 'RR DOOR IN SIDE HANDLE SCREW   LH', 17, 'L', '2021-02-16 13:25:45', NULL),
(505, 'ABS BRAKE PIPE', 34, '', '2021-02-16 13:25:52', NULL),
(506, 'RR DOOR CHILD PROOF   RH', 17, 'R', '2021-02-16 13:25:53', NULL),
(507, 'RR DOOR CHILD PROOF   LH', 17, 'L', '2021-02-16 13:26:01', NULL),
(508, 'RR DOOR CHILD PROOF LABEL   RH', 17, 'R', '2021-02-16 13:26:09', NULL),
(509, 'GEAR SHIFT SPEED CONTROL SHAFT', 33, '', '2021-02-16 13:26:14', NULL),
(510, 'RR DOOR CHILD PROOF LABEL   LH', 17, 'L', '2021-02-16 13:26:18', NULL),
(511, 'GEAR SHIFT SPEED CONTROL CABLE', 33, '', '2021-02-16 13:26:24', NULL),
(512, 'DOOR TRIM UPPER   RH', 17, 'R', '2021-02-16 13:26:27', NULL),
(513, 'DOOR TRIM UPPER   LH', 17, 'L', '2021-02-16 13:26:35', NULL),
(514, 'T/M OIL BOOT', 33, '', '2021-02-16 13:26:41', NULL),
(515, 'DOOR TRIM VINIL   RH', 17, 'R', '2021-02-16 13:26:43', NULL),
(516, 'T/M OIL LEVEL GAUGE', 33, '', '2021-02-16 13:26:52', NULL),
(517, 'DOOR TRIM VINIL   LH', 17, 'L', '2021-02-16 13:26:53', NULL),
(518, 'RR. DOOR SPEAKER   RH', 17, 'R', '2021-02-16 13:27:03', NULL),
(519, 'T/M UNDER CAP', 33, '', '2021-02-16 13:27:03', NULL),
(520, 'RR. DOOR SPEAKER   LH', 17, 'L', '2021-02-16 13:27:11', NULL),
(521, 'PROPELLER SHAFT', 33, '', '2021-02-16 13:27:15', NULL),
(522, 'RR. DOOR HINGE   RH', 17, 'R', '2021-02-16 13:27:20', NULL),
(523, 'RR. DOOR HINGE   LH', 17, 'L', '2021-02-16 13:27:29', NULL),
(524, 'T/M ASSY', 33, '', '2021-02-16 13:27:31', NULL),
(525, 'REAR ASSISTANT GRIP   RH', 17, 'R', '2021-02-16 13:27:37', NULL),
(526, 'DRAG ROD SPLIT PIN', 33, '', '2021-02-16 13:27:41', NULL),
(527, 'REAR ASSISTANT GRIP   LH', 17, 'L', '2021-02-16 13:27:45', NULL),
(528, 'T/M SIDE MOUNTING ', 33, '', '2021-02-16 13:27:51', NULL),
(529, 'SIDE SEAL PROTECTOR   RH', 17, 'R', '2021-02-16 13:27:55', NULL),
(530, 'SIDE SEAL PROTECTOR   LH', 17, 'L', '2021-02-16 13:28:03', NULL),
(531, 'CONTROL SHAFT BUSH', 33, '', '2021-02-16 13:28:06', NULL),
(532, 'TM MOUNTING BRCT', 33, '', '2021-02-16 13:28:15', NULL),
(533, 'MAССA BATTERY*BODY', 33, '', '2021-02-16 13:28:31', NULL),
(534, 'MAССA BODY*ENG', 33, '', '2021-02-16 13:28:43', NULL),
(535, 'T/M CASE', 33, '', '2021-02-16 13:28:54', NULL),
(536, 'T/M DRAIN PLUG', 33, '', '2021-02-16 13:29:04', NULL),
(537, 'CLUTCH RELEASE ARM', 33, '', '2021-02-16 13:29:14', NULL),
(538, 'FRT DRIVE SHAFT', 33, '', '2021-02-16 13:29:29', NULL),
(539, 'T/M SIDE COVER', 33, '', '2021-02-16 13:29:39', NULL),
(540, 'T/M RR MOUNTING', 33, '', '2021-02-16 13:29:51', NULL),
(541, 'GEAR SHIFT LEVER', 33, '', '2021-02-16 13:30:01', NULL),
(542, 'IDLE T/M', 33, '', '2021-02-16 13:30:12', NULL),
(543, 'MAССA BATTERY*HORN', 33, '', '2021-02-16 13:30:22', NULL),
(544, 'MAССA BODY*H/LAMP', 33, '', '2021-02-16 13:30:32', NULL),
(545, 'RH', 18, 'R', '2021-02-16 13:33:10', NULL),
(546, 'LH', 18, 'L', '2021-02-16 13:33:18', NULL),
(547, 'SEAT LOCK STRIKER  RH', 18, 'R', '2021-02-16 13:33:28', NULL),
(548, 'SEAT LOCK STRIKER  LH', 18, 'L', '2021-02-16 13:33:36', NULL),
(549, 'REGLINING KNOB/COVER   RH', 18, 'R', '2021-02-16 13:33:45', NULL),
(550, 'FRT EXHAUST PIPE', 32, '', '2021-02-16 13:33:58', NULL),
(551, 'FRONT MUFFLER', 32, '', '2021-02-16 13:34:10', NULL),
(552, 'REGLINING KNOB/COVER   LH', 18, 'L', '2021-02-16 13:34:47', NULL),
(553, 'FR/RR MUFFLER SHIELD', 32, '', '2021-02-16 13:35:06', NULL),
(554, 'SEAT BACK  RH', 18, 'R', '2021-02-16 13:35:20', NULL),
(555, 'MUFFLER STAY RUBBER (1/2/3/4)', 32, '', '2021-02-16 13:35:25', NULL),
(556, 'SEAT BACK  LH', 18, 'L', '2021-02-16 13:35:31', NULL),
(557, 'EXIL MANIFOLD', 32, '', '2021-02-16 13:35:38', NULL),
(558, 'SEAT SIDE TRIM  RH', 18, 'R', '2021-02-16 13:35:39', NULL),
(559, 'SEAT SIDE TRIM  LH', 18, 'L', '2021-02-16 13:35:47', NULL),
(560, 'RR EXHAUST PIPE', 32, '', '2021-02-16 13:35:49', NULL),
(561, 'SEAT HEADREST  RH', 18, 'R', '2021-02-16 13:35:56', NULL),
(562, 'RR MUFFLER', 32, '', '2021-02-16 13:36:00', NULL),
(563, 'SEAT HEADREST  LH', 18, 'L', '2021-02-16 13:36:04', NULL),
(564, 'MUFFLER MOUNTING', 32, '', '2021-02-16 13:36:10', NULL),
(565, 'БУСИР РЫЧАГ', 32, '', '2021-02-16 13:36:20', NULL),
(566, 'CATALITIC CONVERT', 32, '', '2021-02-16 13:36:35', NULL),
(567, 'SEAT CUSHION  RH', 18, 'R', '2021-02-16 13:36:44', NULL),
(568, 'SEAT CUSHION  LH', 18, 'L', '2021-02-16 13:36:52', NULL),
(569, 'TUBE FUEL FILLER HOSE', 31, '', '2021-02-16 13:36:58', NULL),
(570, 'SEAT BACK LOCK KNOB   RH', 18, 'R', '2021-02-16 13:37:00', NULL),
(571, 'SEAT BACK LOCK KNOB   LH', 18, 'L', '2021-02-16 13:37:07', NULL),
(572, 'SEAT STOPPER BAND  RH', 18, 'R', '2021-02-16 13:37:17', NULL),
(573, 'TANK BRTHR HOSE', 31, '', '2021-02-16 13:37:24', NULL),
(574, 'SEAT STOPPER BAND  LH', 18, 'L', '2021-02-16 13:37:26', NULL),
(575, 'SEAT HINGE COVER  RH', 18, 'R', '2021-02-16 13:37:35', NULL),
(576, 'SEAT HINGE COVER  LH', 18, 'L', '2021-02-16 13:37:42', NULL),
(577, 'FUEL SEPARATOR', 31, '', '2021-02-16 13:37:43', NULL),
(578, 'SEAT HINGE  RH', 18, 'R', '2021-02-16 13:37:52', NULL),
(579, 'FUEL FILTER', 31, '', '2021-02-16 13:38:00', NULL),
(580, 'SEAT HINGE  LH', 18, 'L', '2021-02-16 13:38:00', NULL),
(581, 'FUEL RETURN HOSE', 31, '', '2021-02-16 13:38:15', NULL),
(582, 'FUEL PUMP', 31, '', '2021-02-16 13:38:26', NULL),
(583, 'RH', 19, 'R', '2021-02-16 13:38:31', NULL),
(584, 'FUEL TANK', 31, '', '2021-02-16 13:38:36', NULL),
(585, 'LH', 19, 'L', '2021-02-16 13:38:40', NULL),
(586, 'FUEL PUMP HARNESS', 31, '', '2021-02-16 13:38:48', NULL),
(587, 'REAR SEAT BELT FILLER  ANCHOR PLATE RH', 19, 'R', '2021-02-16 13:38:53', NULL),
(588, 'REAR SEAT BELT FILLER  ANCHOR PLATE LH', 19, 'L', '2021-02-16 13:39:01', NULL),
(589, 'FUEL PIPE PROTEC COVER (RR /FR)', 31, '', '2021-02-16 13:39:05', NULL),
(590, 'RR SEAT BELT ELECTR  RH', 19, 'R', '2021-02-16 13:39:10', NULL),
(591, 'RR SEAT BELT ELECTR  LH', 19, 'L', '2021-02-16 13:39:18', NULL),
(592, 'FUEL TANK STRAP', 31, '', '2021-02-16 13:39:21', NULL),
(593, 'REAR SEAT BELT BUCKEL   RH', 19, 'R', '2021-02-16 13:39:27', NULL),
(594, 'REAR SEAT BELT BUCKEL   LH', 19, 'L', '2021-02-16 13:39:36', NULL),
(595, 'FUEL PIPE', 31, '', '2021-02-16 13:39:37', NULL),
(596, 'FUEL FILLER ASSY', 31, '', '2021-02-16 13:39:50', NULL),
(598, 'FUEL TANK BAND', 31, '', '2021-02-16 13:40:01', NULL),
(600, ' FLOOR CARPET   RH', 19, 'R', '2021-02-16 13:43:21', NULL),
(601, 'BATTERY', 30, '', '2021-02-16 13:43:32', NULL),
(602, ' FLOOR CARPET   LH', 19, 'L', '2021-02-16 13:43:34', NULL),
(603, 'BATTERY CABLE', 30, '', '2021-02-16 13:43:44', NULL),
(604, 'BATTERY(+)(-) TERMINAL', 30, '', '2021-02-16 13:44:00', NULL),
(605, 'RR ROCK PANEL COVER  RH', 19, 'R', '2021-02-16 13:44:03', NULL),
(606, 'STARTING MOTOR', 30, '', '2021-02-16 13:44:11', NULL),
(607, 'RR ROCK PANEL COVER  LH', 19, 'L', '2021-02-16 13:44:13', NULL),
(608, 'RR FLOOR  RH', 19, 'R', '2021-02-16 13:44:24', NULL),
(609, 'RR FLOOR  LH', 19, 'L', '2021-02-16 13:44:33', NULL),
(610, 'TURN SIGN LAMP HARNS', 30, '', '2021-02-16 13:44:41', NULL),
(611, 'BATTERY CAP', 30, '', '2021-02-16 13:44:56', NULL),
(612, 'BATTERY CASE', 30, '', '2021-02-16 13:45:09', NULL),
(613, 'BACK UP SWITCH', 30, '', '2021-02-16 13:47:21', NULL),
(614, 'WIPER MOTOR HARNESS', 30, '', '2021-02-16 13:47:30', NULL),
(615, 'IGNITION HARNESS', 30, '', '2021-02-16 13:47:40', NULL),
(616, 'POWER ANTEN HARNESS', 30, '', '2021-02-16 13:47:50', NULL),
(617, 'HORN ASSY', 30, '', '2021-02-16 13:48:28', NULL),
(618, 'HEAD LAMP HOUSING', 30, '', '2021-02-16 13:48:38', NULL),
(619, 'MAP SENSOR', 30, '', '2021-02-16 13:48:48', NULL),
(620, 'MAT SENSOR ', 30, '', '2021-02-16 13:49:01', NULL),
(621, 'LICENCE HARNESS', 30, '', '2021-02-16 13:49:14', NULL),
(622, 'HORN HARNESS', 30, '', '2021-02-16 13:49:30', NULL),
(623, 'MAP SENSOR HARNESS', 30, '', '2021-02-16 13:49:42', NULL),
(624, 'MAT SENSOR HARNESS', 30, '', '2021-02-16 13:49:51', NULL),
(625, 'BACK UP LAMP HARNESS', 30, '', '2021-02-16 13:50:02', NULL),
(626, 'FUEL METER HARNESS', 30, '', '2021-02-16 13:50:18', NULL),
(627, 'SURGE TANK', 29, '', '2021-02-16 13:50:55', NULL),
(628, 'OUT/IN HOSE SURGE TANK', 31, '', '2021-02-16 13:51:05', NULL),
(629, 'RADIATOR', 29, '', '2021-02-16 13:51:21', NULL),
(630, 'RADIATOR OYTLET INLET HOSE', 29, '', '2021-02-16 13:51:36', NULL),
(631, 'SNORKEL', 29, '', '2021-02-16 13:51:48', NULL),
(632, 'REZONATOR', 29, '', '2021-02-16 13:52:01', NULL),
(633, 'FAN.SHROUD', 29, '', '2021-02-16 13:52:11', NULL),
(634, 'ENGINE FUEL LAVEL', 29, '', '2021-02-16 13:52:21', NULL),
(635, 'SURGE TANK LABEL', 29, '', '2021-02-16 13:52:30', NULL),
(636, 'RADIATOR TANK CAP', 29, '', '2021-02-16 13:52:43', NULL),
(637, 'RADIATOR SHROUD', 29, '', '2021-02-16 13:52:55', NULL),
(638, 'RADIATOR FAN', 29, '', '2021-02-16 13:53:07', NULL),
(639, 'W/REZERV.TANK.HOSE', 29, '', '2021-02-16 13:53:16', NULL),
(640, 'AIR CLEAN IN HOSE', 29, '', '2021-02-16 13:53:26', NULL),
(641, 'AIR CLEAN FAN/PROTECTOR HOSE', 29, '', '2021-02-16 13:53:36', NULL),
(642, 'ACCEL CABLE', 29, '', '2021-02-16 13:53:55', NULL),
(643, 'TIMING BELT', 29, '', '2021-02-16 13:54:07', NULL),
(644, 'FUEL HOSE', 29, '', '2021-02-16 13:54:30', NULL),
(645, 'AIR CLEANER BRASCET', 29, '', '2021-02-16 13:55:13', NULL),
(646, 'CLUTCH CABLE', 29, '', '2021-02-16 13:55:27', NULL),
(647, 'ENGINE', 28, '', '2021-02-16 14:00:21', NULL),
(648, 'ENGINE OIL PAN', 28, '', '2021-02-16 14:00:40', NULL),
(649, 'RH', 20, 'R', '2021-02-16 14:00:42', NULL),
(650, 'LH', 20, 'L', '2021-02-16 14:00:48', NULL),
(651, 'ENGINE OIL CAP', 28, '', '2021-02-16 14:00:53', NULL),
(652, 'QUATER GLASS  RH', 20, 'R', '2021-02-16 14:01:00', NULL),
(653, 'ENGINE OIL FILTER', 28, '', '2021-02-16 14:01:06', NULL),
(654, 'QUATER GLASS  LH', 20, 'L', '2021-02-16 14:01:12', NULL),
(655, 'ENGINE MOUNTING MEMBER BOLT', 28, '', '2021-02-16 14:01:18', NULL),
(656, 'SIDE BODY W / S   RH', 20, 'R', '2021-02-16 14:01:22', NULL),
(657, 'WATER PUMP', 28, '', '2021-02-16 14:01:29', NULL),
(658, 'SIDE BODY W / S   LH', 20, 'L', '2021-02-16 14:01:35', NULL),
(659, 'INJECTOR', 28, '', '2021-02-16 14:01:38', NULL),
(660, 'QUART OUT GANISH   RH', 20, 'R', '2021-02-16 14:01:45', NULL),
(661, 'QUART OUT GANISH   LH', 20, 'L', '2021-02-16 14:01:53', NULL),
(662, 'ENGINE MOUNTING MEMBER FRONT  REAR', 28, '', '2021-02-16 14:01:58', NULL),
(663, 'QUATER GLASS IN SIDE TRIM   RH', 20, 'R', '2021-02-16 14:02:02', NULL),
(664, 'QUATER GLASS IN SIDE TRIM   LH', 20, 'L', '2021-02-16 14:02:08', NULL),
(665, '   ENG CHECK LAMP', 28, '', '2021-02-16 14:02:11', NULL),
(666, 'QUATER GLASS COVER   RH', 20, 'R', '2021-02-16 14:02:20', NULL),
(667, '   E/G FUEL LEBEL', 28, '', '2021-02-16 14:02:24', NULL),
(668, 'QUATER GLASS COVER   LH', 20, 'L', '2021-02-16 14:02:30', NULL),
(669, 'ENG SIDE MOUNT BRACK', 28, '', '2021-02-16 14:02:40', NULL),
(670, 'OUATER GLASS W/S   RH', 20, 'R', '2021-02-16 14:02:40', NULL),
(671, 'QUATER GLASS W/S   LH', 20, 'L', '2021-02-16 14:02:53', NULL),
(672, 'QUATER PANEL MOLDING   RH', 20, 'R', '2021-02-16 14:03:03', NULL),
(673, 'QUATER PANEL MOLDING   LH', 20, 'L', '2021-02-16 14:03:12', NULL),
(674, 'QUATER PNL TRIM BOOT (IN TRIM)   RH', 20, 'R', '2021-02-16 14:03:21', NULL),
(675, 'QUATER PNL TRIM BOOT (IN TRIM)   LH', 20, 'L', '2021-02-16 14:03:30', NULL),
(676, 'SIDE BODY MOLDING RH', 20, 'R', '2021-02-16 14:03:45', NULL),
(677, 'SIDE BODY MOLDING LH', 20, 'L', '2021-02-16 14:03:52', NULL),
(678, 'HORN PAD ', 27, '', '2021-02-16 14:05:42', NULL),
(679, 'FUEL LID OPEN S/W', 27, '', '2021-02-16 14:05:56', NULL),
(680, 'INSTRUM CUP HOLDER', 27, '', '2021-02-16 14:06:07', NULL),
(681, 'ASHRAY LAMP', 27, '', '2021-02-16 14:06:16', NULL),
(682, 'SIGAR LIGHTER', 27, '', '2021-02-16 14:06:26', NULL),
(683, 'SIGAR LIGHTER LAMP', 27, '', '2021-02-16 14:06:39', NULL),
(684, 'RH', 21, 'R', '2021-02-16 14:07:45', NULL),
(685, 'LH', 21, 'L', '2021-02-16 14:07:52', NULL),
(686, 'RR TIRE CTR WHEEL CAP  RH', 21, 'R', '2021-02-16 14:08:02', NULL),
(687, 'RR TIRE CTR WHEEL CAP  LH', 21, 'L', '2021-02-16 14:08:12', NULL),
(688, 'RR TIRE WHEEL  RH', 21, 'R', '2021-02-16 14:08:21', NULL),
(689, 'RR TIRE WHEEL  LH', 21, 'L', '2021-02-16 14:08:29', NULL),
(690, 'REAR TIRE VALVE CAP  RH', 21, 'R', '2021-02-16 14:08:40', NULL),
(691, 'REAR TIRE VALVE CAP  LH', 21, 'L', '2021-02-16 14:08:48', NULL),
(692, 'TIRE DISK COVER  RH', 21, 'R', '2021-02-16 14:08:57', NULL),
(693, 'TIRE DISK COVER  LH', 21, 'L', '2021-02-16 14:09:05', NULL),
(694, 'RR WIPER', 27, '', '2021-02-16 14:14:55', NULL),
(695, 'RH', 22, 'R', '2021-02-16 14:15:13', NULL),
(696, 'WIPER ARM CAP', 27, '', '2021-02-16 14:15:15', NULL),
(697, 'LH', 22, 'L', '2021-02-16 14:15:21', NULL),
(698, 'WIPER MOTOR', 27, '', '2021-02-16 14:15:26', NULL),
(699, 'FR WIPER WASH SPRAY S/W', 27, '', '2021-02-16 14:15:45', NULL),
(700, 'FRONT NOZZLE', 27, '', '2021-02-16 14:15:56', NULL),
(701, 'WASHER LEVEL', 27, '', '2021-02-16 14:17:45', NULL),
(702, 'WASHER HOSE', 27, '', '2021-02-16 14:17:55', NULL),
(703, 'CD PLAYER MP3', 27, '', '2021-02-16 14:18:05', NULL),
(704, 'RADIO PILOT LAMP', 27, '', '2021-02-16 14:18:14', NULL),
(705, 'RADIO TEMB/BASS/TUN', 27, '', '2021-02-16 14:18:25', NULL),
(706, 'REAR SPEAKER', 27, '', '2021-02-16 14:18:34', NULL),
(707, 'POWER ANTENNA', 27, '', '2021-02-16 14:19:45', NULL),
(708, 'BACK GLASS HEAT S/W', 27, '', '2021-02-16 14:19:55', NULL),
(709, 'GLOVE BOX BELT', 27, '', '2021-02-16 14:20:04', NULL),
(710, 'DEPOZIT BOX', 27, '', '2021-02-16 14:20:28', NULL),
(711, 'FUSE  /  FUSE BOX COVER', 27, '', '2021-02-16 14:20:39', NULL),
(712, 'STR\'G WHEEL ADJUST KNOB', 27, '', '2021-02-16 14:20:49', NULL),
(713, 'TEMPER CONTROL S/W', 27, '', '2021-02-16 14:21:14', NULL),
(714, 'TEMPER CONTROL S/W', 27, '', '2021-02-16 14:21:32', NULL),
(715, 'BLOVER CONTROL LEVER', 27, '', '2021-02-16 14:21:49', NULL),
(716, 'AIR BAG SYSTEM', 27, '', '2021-02-16 14:22:00', NULL),
(717, 'DEFROSTER NOZZLE', 27, '', '2021-02-16 14:22:11', NULL),
(718, 'CENTER  VENTIL NOZZLE', 27, '', '2021-02-16 14:22:20', NULL),
(719, 'SIDE VENTIL DUST', 27, '', '2021-02-16 14:22:31', NULL),
(720, 'SPEDOMETR', 27, '', '2021-02-16 14:22:49', NULL),
(721, 'TRUNK LID EMBLEM  RH', 22, 'R', '2021-02-16 14:22:54', NULL),
(722, 'TAHOMETR', 27, '', '2021-02-16 14:23:00', NULL),
(723, 'TRUNK LID EMBLEM  LH', 22, 'L', '2021-02-16 14:23:05', NULL),
(724, 'DISTANCE RECORDER', 27, '', '2021-02-16 14:23:12', NULL),
(725, 'BACK DOOR * RR PILLAR PNL  RH', 22, 'R', '2021-02-16 14:23:16', NULL),
(726, 'FUEL GAUGE', 27, '', '2021-02-16 14:23:22', NULL),
(727, 'BACK DOOR * RR PILLAR PNL  LH', 22, 'L', '2021-02-16 14:23:27', NULL),
(728, 'AIR CONTROL PNL ILLUMIN', 27, '', '2021-02-16 14:23:31', NULL),
(729, 'BACK DOOR LOW * GLASS  RH', 22, 'R', '2021-02-16 14:23:40', NULL),
(730, 'IN SIDE MIRROR LEVER', 27, '', '2021-02-16 14:23:41', NULL),
(731, 'BACK DOOR LOW * GLASS  LH', 22, 'L', '2021-02-16 14:23:50', NULL),
(732, 'OUT SIDE MIRROR AVTO KNOB', 27, '', '2021-02-16 14:23:51', NULL),
(733, 'BACK DOOR UPPER * GLASS  RH', 22, 'R', '2021-02-16 14:24:00', NULL),
(734, 'BRAKE PEDAL', 27, '', '2021-02-16 14:24:02', NULL),
(735, 'BACK DOOR UPPER * GLASS  LH', 22, 'L', '2021-02-16 14:24:11', NULL),
(736, 'PARKING BRAKE PEDAL', 27, '', '2021-02-16 14:24:12', NULL),
(737, 'BACK DOOR * ROOF PNL  RH', 22, 'R', '2021-02-16 14:24:23', NULL),
(738, 'CLUTCH OIL', 27, '', '2021-02-16 14:24:24', NULL),
(739, 'BACK DOOR * ROOF PNL  LH', 22, 'L', '2021-02-16 14:24:33', NULL),
(740, 'OIL RESERV TANK', 27, '', '2021-02-16 14:24:34', NULL),
(741, 'PIPE E-CLIP', 27, '', '2021-02-16 14:24:44', NULL),
(742, 'BACK DOOR/TRUNK LID * RR BUMPER  RH', 22, 'R', '2021-02-16 14:24:46', NULL),
(743, 'BACK DOOR/TRUNK LID * RR BUMPER  LH', 22, 'L', '2021-02-16 14:24:56', NULL),
(744, 'BACK DOOR/TRUNK LID * SIDE BODY  RH', 22, 'R', '2021-02-16 14:25:07', NULL),
(745, 'BACK DOOR/TRUNK LID * SIDE BODY  LH', 22, 'L', '2021-02-16 14:25:17', NULL),
(746, 'AUTO T/M LEVER', 27, '', '2021-02-16 14:25:23', NULL),
(747, 'BACK DOOR/TRUNK LID * TAIL LAMP  RH', 22, 'R', '2021-02-16 14:25:27', NULL),
(748, 'BODY NUMBER', 27, '', '2021-02-16 14:25:35', NULL),
(749, 'BACK DOOR/TRUNK LID * TAIL LAMP  LH', 22, 'L', '2021-02-16 14:25:37', NULL);
INSERT INTO `level_2` (`id`, `name`, `level1_id`, `side`, `created_at`, `updated_at`) VALUES
(750, 'E/G START LABEL', 27, '', '2021-02-16 14:25:44', NULL),
(751, 'TR/BACK DOOR GLASS SPIRAL (MACCA)  RH', 22, 'R', '2021-02-16 14:25:51', NULL),
(752, 'AIR CLEAN LABEL', 27, '', '2021-02-16 14:25:53', NULL),
(753, 'TR/BACK DOOR GLASS SPIRAL (MACCA)  LH', 22, 'L', '2021-02-16 14:26:01', NULL),
(754, 'RADIATOR LABEL', 27, '', '2021-02-16 14:26:03', NULL),
(755, 'BARCOD LABEL ', 27, '', '2021-02-16 14:26:10', NULL),
(756, 'BACK DOOR BALANCER  RH', 22, 'R', '2021-02-16 14:26:13', NULL),
(757, 'BACK DOOR BALANCER  LH', 22, 'L', '2021-02-16 14:26:23', NULL),
(758, 'HORN        /        HORN S/W', 26, '', '2021-02-16 14:26:28', NULL),
(759, 'BACK DOOR GAS SPRING  RH', 22, 'R', '2021-02-16 14:26:37', NULL),
(760, 'DIGITAL CLOCK', 26, '', '2021-02-16 14:26:38', NULL),
(761, 'BACK DOOR GAS SPRING  LH', 22, 'L', '2021-02-16 14:26:48', NULL),
(762, 'TRUNK LID OPEN S/W', 26, '', '2021-02-16 14:26:54', NULL),
(763, 'BACK LICENSE LAMP  RH', 22, 'R', '2021-02-16 14:27:00', NULL),
(764, 'ASHRAY', 26, '', '2021-02-16 14:27:06', NULL),
(765, 'BACK LICENSE LAMP  LH', 22, 'L', '2021-02-16 14:27:10', NULL),
(766, 'ASHRAY COVER', 26, '', '2021-02-16 14:27:17', NULL),
(767, 'BACK DOOR TRIM   RH', 22, 'R', '2021-02-16 14:27:25', NULL),
(768, 'COIN CASE', 26, '', '2021-02-16 14:27:27', NULL),
(769, 'BACK DOOR TRIM   LH', 22, 'L', '2021-02-16 14:27:39', NULL),
(770, 'FRT WIPER ', 26, '', '2021-02-16 14:27:46', NULL),
(771, 'BACK DOOR/TRUNK LID CUSHION резина  RH', 22, 'R', '2021-02-16 14:27:51', NULL),
(772, 'FRT WIPER S/W', 26, '', '2021-02-16 14:27:55', NULL),
(773, 'BACK DOOR/TRUNK LID CUSHION резина  LH', 22, 'L', '2021-02-16 14:28:01', NULL),
(774, 'RR WIPER S/W', 26, '', '2021-02-16 14:28:05', NULL),
(775, 'B.DOOR/TRUNK HINGE  RH', 22, 'R', '2021-02-16 14:28:11', NULL),
(776, 'RR WIPER WASH SPRAY S/W', 26, '', '2021-02-16 14:28:15', NULL),
(777, 'B.DOOR/TRUNK HINGE  LH', 22, 'L', '2021-02-16 14:28:20', NULL),
(778, 'RR NOZZLE', 26, '', '2021-02-16 14:28:25', NULL),
(779, 'B/DOOR DEADANER  RH', 22, 'R', '2021-02-16 14:28:30', NULL),
(780, 'WASHER TANK', 26, '', '2021-02-16 14:28:35', NULL),
(781, 'B/DOOR DEADANER  LH', 22, 'L', '2021-02-16 14:28:38', NULL),
(782, 'RADIO/CASSETTE', 26, '', '2021-02-16 14:28:47', NULL),
(783, 'B.DOOR MOLDING  RH', 22, 'R', '2021-02-16 14:28:50', NULL),
(784, 'RADIO CHANNEL', 26, '', '2021-02-16 14:28:56', NULL),
(785, 'B.DOOR MOLDING  LH', 22, 'L', '2021-02-16 14:28:59', NULL),
(786, 'FRONT SPEAKER', 26, '', '2021-02-16 14:29:07', NULL),
(787, 'TRUNK LID / BACK DOOR  GROMMET  RH', 22, 'R', '2021-02-16 14:29:09', NULL),
(788, 'ANTENNA', 26, '', '2021-02-16 14:29:15', NULL),
(789, 'TRUNK LID / BACK DOOR  GROMMET  LH', 22, 'L', '2021-02-16 14:29:18', NULL),
(790, 'SUNVISOR', 26, '', '2021-02-16 14:29:27', NULL),
(791, 'BACK DOOR GLASS * SIDE BODY   RH', 22, 'R', '2021-02-16 14:29:29', NULL),
(792, 'BACK DOOR GLASS * SIDE BODY   LH', 22, 'L', '2021-02-16 14:29:37', NULL),
(793, 'GLOVE BOX', 26, '', '2021-02-16 14:29:38', NULL),
(794, 'TRUNK LID IN TRIM COVER  RH', 22, 'R', '2021-02-16 14:29:46', NULL),
(795, 'GLOVE BOX LAMP', 26, '', '2021-02-16 14:29:48', NULL),
(796, 'TRUNK LID IN TRIM COVER  LH', 22, 'L', '2021-02-16 14:29:55', NULL),
(797, 'AVTO DOOR LOOCKING', 26, '', '2021-02-16 14:29:59', NULL),
(798, 'KEY OPEN LOCK S/W', 26, '', '2021-02-16 14:30:07', NULL),
(799, 'AIRCON S/W', 26, '', '2021-02-16 14:30:16', NULL),
(800, 'BLOWER COCONTROL S/W', 26, '', '2021-02-16 14:30:25', NULL),
(801, 'FRESH AIR CONTROL S/W', 26, '', '2021-02-16 14:30:34', NULL),
(802, 'SIDE VINTEL NOZZLE', 26, '', '2021-02-16 14:30:45', NULL),
(803, 'BLOWER VENTILATOR', 26, '', '2021-02-16 14:30:55', NULL),
(804, 'RR HEATER VENTILATOR', 26, '', '2021-02-16 14:31:04', NULL),
(805, 'FLOOR VENTILATOR', 26, '', '2021-02-16 14:31:14', NULL),
(806, 'I/P CLUSTER MASTER', 26, '', '2021-02-16 14:31:22', NULL),
(807, 'ODOMETR', 26, '', '2021-02-16 14:31:35', NULL),
(808, 'ODOMETR KNOB', 26, '', '2021-02-16 14:31:47', NULL),
(809, 'TEMPERATURE GAUGE', 26, '', '2021-02-16 14:31:56', NULL),
(810, 'SPEED ILLUMINATION', 26, '', '2021-02-16 14:32:10', NULL),
(811, 'IN SIDE MIRROR', 26, '', '2021-02-16 14:32:21', NULL),
(812, 'OUT SIDE MIRROR ', 26, '', '2021-02-16 14:32:32', NULL),
(813, 'ACCEL PEDAL', 26, '', '2021-02-16 14:32:46', NULL),
(814, 'CLUTCH PEDAL', 26, '', '2021-02-16 14:32:55', NULL),
(815, 'CL. PEDAL Рабочая состояния', 26, '', '2021-02-16 14:33:09', NULL),
(816, 'ID PLATE', 26, '', '2021-02-16 14:33:23', NULL),
(817, 'OPTION', 26, '', '2021-02-16 14:33:32', NULL),
(818, 'BATTERY LABEL', 26, '', '2021-02-16 14:33:46', NULL),
(819, 'RH', 41, 'R', '2021-02-16 14:35:49', NULL),
(820, 'LH', 41, 'L', '2021-02-16 14:35:57', NULL),
(821, 'RR PARCEL SHELF  RH', 41, 'R', '2021-02-16 14:36:09', NULL),
(822, 'RR PARCEL SHELF  LH', 41, 'L', '2021-02-16 14:36:18', NULL),
(823, 'RR PARCEL STRING  RH', 41, 'R', '2021-02-16 14:36:31', NULL),
(824, 'RR PARCEL STRING  LH', 41, 'L', '2021-02-16 14:36:38', NULL),
(825, 'RR PARCEL SHELF CHILD PROOF SAFETY LOCK  RH', 41, 'R', '2021-02-16 14:36:47', NULL),
(826, 'RR PARCEL SHELF CHILD PROOF SAFETY LOCK  LH', 41, 'L', '2021-02-16 14:36:56', NULL),
(827, 'RR PARCEL SHELF  SPEAKER  RH', 41, 'R', '2021-02-16 14:37:07', NULL),
(828, 'RR PARCEL SHELF  SPEAKER  LH', 41, 'L', '2021-02-16 14:37:18', NULL),
(829, 'RR WHEEL HOUSE TRIM  RH', 41, 'R', '2021-02-16 14:37:27', NULL),
(830, 'RR WHEEL HOUSE TRIM  LH', 41, 'L', '2021-02-16 14:37:37', NULL),
(831, 'RR SPOILER  RH', 41, 'R', '2021-02-16 14:37:47', NULL),
(832, 'RR SPOILER  LH', 41, 'L', '2021-02-16 14:38:01', NULL),
(833, 'RR SPOILER * TAIL LAMP  RH', 41, 'R', '2021-02-16 14:38:13', NULL),
(834, 'RR SPOILER * TAIL LAMP  LH', 41, 'L', '2021-02-16 14:38:24', NULL),
(835, 'RR SPOILER * QUARTER PNL  RH', 41, 'R', '2021-02-16 14:38:35', NULL),
(836, 'RR SPOILER * QUARTER PNL  LH', 41, 'L', '2021-02-16 14:38:43', '2021-02-16 14:39:10'),
(837, 'RR SPOILER * BACK DOOR PNL  RH', 41, 'R', '2021-02-16 14:39:19', NULL),
(838, 'RR SPOILER * BACK DOOR PNL  LH', 41, 'L', '2021-02-16 14:39:28', NULL),
(839, 'RH', 23, 'R', '2021-02-16 14:48:56', NULL),
(840, 'LH', 23, 'L', '2021-02-16 14:49:05', NULL),
(841, 'RR  BUMPER LICENSE LAMP  RH', 23, 'R', '2021-02-16 14:49:25', NULL),
(842, 'RR  BUMPER LICENSE LAMP  LH', 23, 'L', '2021-02-16 14:49:39', NULL),
(843, 'RR BUMPER * RR PILLAR PNL  RH', 23, 'R', '2021-02-16 14:49:48', NULL),
(844, 'RR BUMPER * RR PILLAR PNL  LH', 23, 'L', '2021-02-16 14:49:57', NULL),
(845, 'RR BUMPER * SIDE BODY   RH', 23, 'R', '2021-02-16 14:50:06', NULL),
(846, 'RR BUMPER * SIDE BODY   LH', 23, 'L', '2021-02-16 14:50:16', NULL),
(847, 'RR BUMPER MOLDING  RH', 23, 'R', '2021-02-16 14:50:27', NULL),
(848, 'RR BUMPER MOLDING  LH', 23, 'L', '2021-02-16 14:50:35', NULL),
(849, 'KEYLESS ENTERY SYSTEM', 25, '', '2021-02-16 14:50:40', NULL),
(850, 'RR BUMPER * TRUNK LID  RH', 23, 'R', '2021-02-16 14:50:45', NULL),
(851, 'RR BUMPER * TRUNK LID  LH', 23, 'L', '2021-02-16 14:50:54', NULL),
(852, 'OVER DRIVER IND LAMP', 25, '', '2021-02-16 14:51:05', NULL),
(853, 'AIR BAG IND LAMP', 25, '', '2021-02-16 14:51:16', NULL),
(854, 'DOOR OPEN IND LAMP', 25, '', '2021-02-16 14:51:26', NULL),
(855, 'RR BUMPER * TAIL LAMP  RH', 23, 'R', '2021-02-16 14:51:33', NULL),
(856, 'S/BELT IND LAMP', 25, '', '2021-02-16 14:51:36', NULL),
(857, 'RR BUMPER * TAIL LAMP  LH', 23, 'L', '2021-02-16 14:51:41', NULL),
(858, 'E/G OIL IND. LAMP', 25, '', '2021-02-16 14:51:46', NULL),
(859, 'FRONT MUD FLAP  RH', 23, 'R', '2021-02-16 14:51:50', NULL),
(860, 'FRONT MUD FLAP  LH', 23, 'L', '2021-02-16 14:51:58', NULL),
(861, 'ENG. OIL IND.LAMP', 25, '', '2021-02-16 14:52:04', NULL),
(862, 'REAR MUD FLAP  RH', 23, 'R', '2021-02-16 14:52:10', NULL),
(863, 'REAR MUD FLAP  LH', 23, 'L', '2021-02-16 14:52:19', NULL),
(864, 'HI-BEAM IND/LAMP', 25, '', '2021-02-16 14:52:33', NULL),
(865, 'HOLD S/W', 25, '', '2021-02-16 14:52:42', NULL),
(866, 'TRUNK LID(BACK DR) S/W', 25, '', '2021-02-16 14:52:52', NULL),
(867, 'PASSING S/W', 25, '', '2021-02-16 14:53:03', NULL),
(868, 'ODOMETR KNOB', 25, '', '2021-02-16 14:53:19', NULL),
(869, 'HI BEAM S/W', 25, '', '2021-02-16 14:53:33', NULL),
(870, 'IGNITION KEY', 24, '', '2021-02-16 14:53:34', NULL),
(871, 'IGNITION KEY CILYNDER', 24, '', '2021-02-16 14:53:42', NULL),
(872, 'TURN SIGNAL LAMP S/W', 25, '', '2021-02-16 14:53:42', NULL),
(873, 'ABS IND LAMP', 24, '', '2021-02-16 14:53:51', NULL),
(874, 'HAZARD S/W', 25, '', '2021-02-16 14:53:53', NULL),
(875, 'TURN SIGNAL IND.LAMP', 24, '', '2021-02-16 14:54:03', NULL),
(876, 'SEAT HEATING. S/W', 25, '', '2021-02-16 14:54:03', NULL),
(877, 'BATTERY IND LAMP', 24, '', '2021-02-16 14:54:11', NULL),
(878, 'HEAD LAMP LEVELING ', 25, '', '2021-02-16 14:54:14', NULL),
(879, 'PARK/BRAKE IND. LAMP', 24, '', '2021-02-16 14:54:21', NULL),
(880, 'RR TURNING SIGNAL  LAMP ', 25, '', '2021-02-16 14:54:26', NULL),
(881, 'F/LEVER WARN IND. LAMP', 24, '', '2021-02-16 14:54:30', NULL),
(882, 'FRONT FOG  LAMP ', 25, '', '2021-02-16 14:54:37', NULL),
(883, 'BRAKE I.IQ/LVR IND.LAMP', 24, '', '2021-02-16 14:54:37', NULL),
(884, 'OVER DRIVER KNOB', 24, '', '2021-02-16 14:54:46', NULL),
(885, 'COMBI S/W', 24, '', '2021-02-16 14:54:54', NULL),
(886, 'FRT FOG LAMP S/W', 24, '', '2021-02-16 14:55:07', NULL),
(887, 'RR FOG LAMP S/W', 24, '', '2021-02-16 14:55:17', NULL),
(888, 'BACK GLASS HEATING S/W', 24, '', '2021-02-16 14:55:25', NULL),
(889, 'HEAD LAMP LEVELING S/W', 24, '', '2021-02-16 14:55:35', NULL),
(890, 'WIPER SPEED CONTROL S/W', 24, '', '2021-02-16 14:55:43', NULL),
(891, 'OUT SIDE MIRROR HEAT. S/W', 24, '', '2021-02-16 14:55:51', NULL),
(892, 'FRONT FOG  LAMP  RH', 25, 'R', '2021-02-16 14:55:59', NULL),
(893, 'HEAD LAMP ', 24, '', '2021-02-16 14:56:02', NULL),
(894, 'FRT TURN SIGNAL  LAMP ', 24, '', '2021-02-16 14:56:10', NULL),
(895, 'FRONT FOG  LAMP LH', 25, 'L', '2021-02-16 14:56:13', NULL),
(896, 'SIDE TURN SIGNAL  LAMP ', 24, '', '2021-02-16 14:56:19', NULL),
(897, 'REAR FOG LAMP ', 24, '', '2021-02-16 14:56:30', NULL),
(898, 'PASSING LAMP ', 24, '', '2021-02-16 14:56:38', NULL),
(899, 'BRAKE LAMP ', 24, '', '2021-02-16 14:56:47', NULL),
(900, 'HAZARD LAMP', 24, '', '2021-02-16 14:56:54', NULL),
(901, 'RR PARKING SENSOR ', 24, '', '2021-02-16 14:57:04', NULL),
(902, 'SUNROOF ', 24, '', '2021-02-16 14:57:13', NULL),
(903, 'ROOM LAMP', 24, '', '2021-02-16 14:57:22', NULL),
(904, 'FR.ROOM LAMP DR OPEN S/W', 24, '', '2021-02-16 14:57:30', NULL),
(905, 'DOOR OPEN INDIKATOR LAMP', 24, '', '2021-02-16 14:57:41', NULL),
(906, 'TURN SIGNAL PILOT.LAMP', 24, '', '2021-02-16 14:57:49', NULL),
(907, 'BACK GLASS HEAT PILOT.LAMP', 24, '', '2021-02-16 14:57:59', NULL),
(908, 'FOG LAMP S/W PILOT LAMP', 24, '', '2021-02-16 14:58:08', NULL),
(909, 'TAIL  LAMP RH', 25, 'R', '2021-02-16 14:58:58', NULL),
(910, 'TAIL  LAMP LH', 25, '', '2021-02-16 14:59:08', NULL),
(911, 'STOP(CMCL) LAMP ', 25, '', '2021-02-16 14:59:20', NULL),
(912, 'BACK UP LAMP RH', 25, 'R', '2021-02-16 14:59:34', NULL),
(913, 'BACK UP LAMP LH', 25, 'L', '2021-02-16 14:59:47', NULL),
(914, 'LICENSE LAMP', 25, '', '2021-02-16 15:00:01', NULL),
(915, 'SUNROOF S/W', 25, '', '2021-02-16 15:00:16', NULL),
(916, 'ROOM LAMP S/W', 25, '', '2021-02-16 15:00:30', NULL),
(917, 'RR.ROOM LAMP DR OPEN S/W', 25, '', '2021-02-16 15:00:40', NULL),
(918, 'PASSING PILOT LAMP', 25, '', '2021-02-16 15:00:51', NULL),
(919, 'HAZARD PILOT LAMP', 25, '', '2021-02-16 15:01:05', NULL),
(920, 'A/C PILOT LAMP', 25, '', '2021-02-16 15:01:15', NULL),
(921, 'BACK DOOR GARNISH', 22, '', '2021-02-16 16:11:28', NULL),
(922, 'BACK DOOR HARNESS	', 22, '', '2021-02-16 16:12:08', NULL),
(923, 'BACK DOOR GLASS	', 22, '', '2021-02-16 16:12:24', NULL),
(924, 'BACK GLASS LABEL	', 22, '', '2021-02-16 16:13:03', NULL),
(925, ' BACK DOOR LATCH	', 22, '', '2021-02-16 16:13:25', NULL),
(926, 'B/DOOR STRIKER	', 22, '', '2021-02-16 16:13:41', NULL),
(927, ' BACK DOOR CNG EMBLEM	', 22, '', '2021-02-16 16:14:06', NULL),
(928, 'IN DEADANER', 22, '', '2021-02-16 16:14:39', NULL),
(929, 'RH CENTER PILLAR PANEL', 1, 'R', '2021-02-18 16:53:44', NULL),
(930, 'LH CENTER PILLAR PANEL', 1, 'L', '2021-02-18 16:54:06', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `level_3`
--

CREATE TABLE `level_3` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `level2_id` int(11) NOT NULL,
  `side` varchar(1) DEFAULT NULL COMMENT 'Right-Left',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `level_3`
--

INSERT INTO `level_3` (`id`, `name`, `level2_id`, `side`, `created_at`, `updated_at`) VALUES
(1, 'TO FENDER RH	', 1, 'R', '2021-02-16 15:01:44', NULL),
(2, 'TO FENDER LH', 1, 'L', '2021-02-16 15:01:55', NULL),
(3, 'TO HEAD LAMP RH	', 1, 'R', '2021-02-16 15:10:47', NULL),
(4, 'TO HEAD LAMP LH	', 1, 'L', '2021-02-16 15:11:00', NULL),
(5, 'TO RADIATR GRILL RH', 1, 'R', '2021-02-16 15:11:28', NULL),
(6, 'TO RADIATR GRILL LH	', 1, 'L', '2021-02-16 15:11:37', NULL),
(7, 'TO RADIATR GRILLE 	', 1, '', '2021-02-16 15:12:05', NULL),
(8, 'TO BUMPER	', 1, '', '2021-02-16 15:12:17', NULL),
(9, 'TO RH RR DOOR	', 2, '', '2021-02-16 15:24:49', NULL),
(10, 'TO RH FENDER	', 2, 'R', '2021-02-16 15:25:06', NULL),
(11, 'TO ROCKER PNL	', 2, '', '2021-02-16 15:25:19', NULL),
(12, 'TO SIDE BODY	', 2, 'R', '2021-02-16 15:25:46', NULL),
(13, 'TO A PILLAR	', 2, 'R', '2021-02-16 15:26:02', NULL),
(14, 'TO LH RR DOOR	', 3, 'L', '2021-02-16 15:26:36', NULL),
(15, 'TO FENDER	', 3, 'L', '2021-02-16 15:26:54', NULL),
(16, 'TO ROCKER PNL	', 3, 'L', '2021-02-16 15:27:08', NULL),
(17, 'TO SIDE BODY	', 3, 'L', '2021-02-16 15:27:22', NULL),
(18, 'TO A PILLAR	', 3, 'L', '2021-02-16 15:27:36', NULL),
(19, 'TO FRT DOOR	', 4, 'R', '2021-02-16 15:27:55', NULL),
(20, 'TO SIDE BODY	', 4, 'R', '2021-02-16 15:28:11', NULL),
(21, 'TO QUARTER PNL	', 4, 'R', '2021-02-16 15:28:24', NULL),
(22, 'TO ROCKER PNL	', 4, 'R', '2021-02-16 15:28:36', NULL),
(23, 'TO FRT DOOR	', 5, 'L', '2021-02-16 15:28:51', NULL),
(24, 'TO SIDE BODY	', 5, 'L', '2021-02-16 15:29:05', NULL),
(25, 'TO QUARTER PNL	', 5, 'L', '2021-02-16 15:29:16', NULL),
(26, 'TO ROCKER PNL	', 5, 'L', '2021-02-16 15:29:28', NULL),
(27, 'TO RH SIDE BODY	', 6, 'R', '2021-02-16 15:29:51', NULL),
(28, 'TO LH SIDE BODY	', 6, 'L', '2021-02-16 15:30:07', NULL),
(29, 'TO RR BUMPER	', 6, '', '2021-02-16 15:30:22', NULL),
(30, 'TO RH TAIL LAMP	', 6, 'R', '2021-02-16 15:30:37', NULL),
(31, 'TO LH TAIL LAMP	', 6, 'L', '2021-02-16 15:30:46', NULL),
(32, 'TO ROOF PANEL	', 6, '', '2021-02-16 15:30:58', NULL),
(33, 'TO WIDNSHIELD GLASS	', 7, '', '2021-02-16 15:31:36', NULL),
(34, 'TO BACK GLASS	', 7, '', '2021-02-16 15:31:47', NULL),
(35, 'TO SUNROOF	', 7, '', '2021-02-16 15:32:00', NULL),
(36, 'RR BUMPER RH	', 8, 'R', '2021-02-16 15:32:20', NULL),
(37, 'RR BUMPER LH', 8, 'L', '2021-02-16 15:32:31', NULL),
(38, 'TAIL LAMP RH	', 8, 'R', '2021-02-16 15:32:44', NULL),
(39, 'TAIL LAMP LH', 8, 'L', '2021-02-16 15:32:56', NULL),
(40, 'T/LID. BACK DOOR RH	', 8, 'R', '2021-02-16 15:33:12', NULL),
(41, 'T/LID. BACK DOOR LH', 8, 'L', '2021-02-16 15:33:24', NULL),
(42, 'SIDE BODY GROMMET RH	', 8, 'R', '2021-02-16 15:33:41', NULL),
(43, 'SIDE BODY GROMMET LH', 8, 'L', '2021-02-16 15:33:52', NULL),
(44, 'FUEL LID 	', 8, '', '2021-02-16 15:38:18', NULL),
(45, 'TO HEAD LAMP RH	', 9, 'R', '2021-02-16 15:39:56', NULL),
(46, 'TO HEAD LAMP LH', 9, 'L', '2021-02-16 15:40:09', NULL),
(47, 'TO RADIATOR GRILL RH	', 9, 'R', '2021-02-16 15:40:24', NULL),
(48, 'TO RADIATOR GRILL LH', 9, 'L', '2021-02-16 15:40:38', NULL),
(49, 'TO RADIATOR GRILL	', 9, '', '2021-02-16 15:40:51', NULL),
(50, 'TO FENDER RH	', 9, 'R', '2021-02-16 15:41:49', NULL),
(51, 'TO FENDER LH', 9, 'L', '2021-02-16 15:42:05', NULL),
(52, 'TO HOOD	', 9, '', '2021-02-16 15:42:16', NULL),
(53, 'TO TAIL LAMP RH	', 10, 'R', '2021-02-16 15:42:48', NULL),
(54, 'TO TAIL LAMP LH', 10, 'L', '2021-02-16 15:43:00', NULL),
(55, 'TO T/LID. BACK DOOR	', 10, '', '2021-02-16 15:43:14', NULL),
(56, 'TO FENDER RH	', 11, 'R', '2021-02-16 15:43:32', NULL),
(57, 'TO FENDER LH', 11, 'L', '2021-02-16 15:43:42', NULL),
(58, 'TO WINDSHIELD GLASS RH	', 11, 'R', '2021-02-16 15:44:03', NULL),
(59, 'TO WINDSHIELD GLASS LH', 11, 'L', '2021-02-16 15:44:16', NULL),
(60, 'TO WIPPER RH	', 11, 'R', '2021-02-16 15:44:31', NULL),
(61, 'TO WIPPER LH', 11, 'L', '2021-02-16 15:44:43', NULL),
(62, 'TO HOOD RH	', 11, 'R', '2021-02-16 15:45:07', NULL),
(63, 'TO HOOD LH', 11, 'L', '2021-02-16 15:45:19', NULL),
(64, 'IN', 1, '', '2021-02-17 15:34:06', NULL),
(65, 'OUT', 1, '', '2021-02-17 15:34:15', NULL),
(66, 'IN', 2, '', '2021-02-17 15:39:03', NULL),
(67, 'OUT', 2, '', '2021-02-17 15:39:12', NULL),
(68, 'RH', 9, 'R', '2021-02-18 16:45:48', NULL),
(69, 'LH', 9, 'L', '2021-02-18 16:46:01', NULL),
(70, 'RH', 10, 'R', '2021-02-18 16:46:11', NULL),
(71, 'LH', 10, 'L', '2021-02-18 16:46:21', NULL);

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
-- Структура таблицы `models`
--

CREATE TABLE `models` (
  `id` int(11) NOT NULL,
  `model_code` varchar(5) NOT NULL,
  `model_name` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `models`
--

INSERT INTO `models` (`id`, `model_code`, `model_name`, `created_at`) VALUES
(1, '1JX69', 'COBALT (J1)', '2021-02-16 09:01:14'),
(2, '1TF69', 'NEXIA R3', '2021-02-16 09:07:24'),
(3, '13U19', 'GENTRA (J200)', '2021-02-16 09:08:06'),
(4, '1CR48', 'SPARK 3', '2021-02-16 14:51:09'),
(5, '1JU19', '1JU19', '2021-02-17 17:12:23'),
(6, '1CQ48', 'SPARK 2', '2021-02-18 17:08:48'),
(7, '1CP48', 'SPARK 1 ', '2021-02-18 17:08:48');

-- --------------------------------------------------------

--
-- Структура таблицы `shops`
--

CREATE TABLE `shops` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `shops`
--

INSERT INTO `shops` (`id`, `name`, `created_at`, `updated_at`) VALUES
(3, 'PRESS-1', '2021-02-15 17:41:31', NULL),
(4, 'PRESS-2', '2021-02-15 17:42:13', NULL),
(5, 'WELDING-1', '2021-02-15 17:45:55', NULL),
(6, 'WELDING-2', '2021-02-15 17:46:05', NULL),
(11, 'WELDING-3', '2021-02-16 14:12:01', NULL),
(12, 'PAINT', '2021-02-16 14:12:26', NULL),
(13, 'GA', '2021-02-16 14:12:31', NULL),
(14, 'SQ-1', '2021-02-16 14:12:37', NULL),
(15, 'SQ-2', '2021-02-16 14:12:43', NULL),
(16, 'ME', '2021-02-16 14:12:47', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `account_activation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password_hash`, `status`, `shop_id`, `auth_key`, `password_reset_token`, `account_activation_token`, `created_at`, `updated_at`) VALUES
(1, 'Sardor', 'sardor88.88@mail.ru', '$2y$13$h/rTFVLTUo6tZG2QtwCNj.BOcCGVFK0nuILLrhrltqc0KVnbHQDmW', 10, NULL, '5ILdJHWYBP89HutstAfDwEQSeSe0ZqTH', NULL, NULL, 1608701156, 1608798249);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `can_modify` int(2) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `shop_id`, `branch_id`, `can_modify`, `password`, `role`) VALUES
(111, 'Boybuvayev Tohirjon', 'TB8110', NULL, 1, 1, NULL, 'admin'),
(114, 'Sardorbek Dehqonov', 'SD6566', 13, 1, NULL, NULL, 'admin'),
(128, 'Erkinjon', 'eq6563', NULL, 1, 1, NULL, 'production'),
(129, 'Timur Nasirov', 'tnm450', NULL, 1, NULL, NULL, 'admin'),
(130, 'Nuriddin Karimov', 'nkk079', NULL, 1, NULL, NULL, 'admin'),
(131, 'Rahmiddinov Ibrohimjon', 'ird172', NULL, 1, NULL, NULL, 'defect_creater'),
(132, 'Donyorbek Karimov', '6564', NULL, 1, NULL, NULL, 'admin');

-- --------------------------------------------------------

--
-- Структура таблицы `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(11) NOT NULL,
  `pono` varchar(6) NOT NULL,
  `vin_number` varchar(19) DEFAULT NULL,
  `model_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `vehicles`
--

INSERT INTO `vehicles` (`id`, `pono`, `vin_number`, `model_id`, `created_at`, `updated_at`) VALUES
(1, '0B5312', 'XWBJF69VEMA202912', 1, '2021-02-12 13:40:28', NULL),
(2, '0B5353', 'XWBJF69VEMA202971', 2, '2021-02-14 12:37:21', NULL),
(3, '0C0565', 'XWBJF69VEMA204756', 1, '2021-02-16 09:01:14', NULL),
(4, '0C2002', 'MX1TA69V9MA205442', 2, '2021-02-16 09:07:24', NULL),
(5, '0B6066', 'XWB5V31BVMA602174', 3, '2021-02-16 09:08:06', NULL),
(6, '0A8158', 'XWBTF69V1MA201728', 2, '2021-02-16 10:44:56', NULL),
(7, '0B6226', 'XWB5V31BVMA602334', 3, '2021-02-16 14:34:03', NULL),
(8, 'E81153', 'XWBMA48N1LA566971', 4, '2021-02-16 14:51:09', NULL),
(9, 'A19311', 'XWB5M31BDBA216120', 5, '2021-02-17 17:12:23', NULL),
(10, '0B6357', 'XWB5V31BDMA602465', 3, '2021-02-18 16:44:33', NULL),
(11, '0C2208', 'MX1TA69V9MA205607', 2, '2021-02-18 16:46:58', NULL),
(12, '0B6260', 'XWB5V31BVMA602368', 3, '2021-02-18 16:50:45', NULL),
(13, '0B6315', 'XWB5V31BDMA602423', 3, '2021-02-18 16:52:39', NULL),
(14, '0C2262', 'MX1TF69V9MA205661', 2, '2021-02-18 17:06:33', NULL),
(15, '0B6252', 'XWB5V31BVMA602360', 3, '2021-02-18 17:07:07', NULL),
(16, '0B6890', 'XWBMF48NEMA602998', 6, '2021-02-18 17:08:48', NULL),
(17, '0C1988', 'MX1TA69V9MA205587', 2, '2021-02-18 17:09:43', NULL),
(18, '0C1117', 'XWBJF69VEMA205108', 1, '2021-02-18 17:11:49', NULL),
(19, '0C6129', 'XWBJF69VEMA206873', 1, '2021-02-19 16:47:57', NULL),
(20, '0C6162', 'XWBJF69VEMA206906', 1, '2021-02-19 16:50:17', NULL),
(21, '0B6515', 'XWB5V31BVMA602623', 3, '2021-02-19 16:51:35', NULL),
(22, '0B9923', 'XWBTF69V1MA204505', 2, '2021-02-19 16:53:59', NULL),
(23, '0B9852', 'XWBTF69V1MA204434', 2, '2021-02-19 16:55:02', NULL),
(24, '0C7076', 'XWBTF69V1MA207820', 2, '2021-02-19 16:58:37', NULL),
(25, '0B6461', 'XWB5V312DMA602569', 3, '2021-02-19 16:59:48', NULL),
(26, '0B6585', 'XWB5V31BDMA602693', 3, '2021-02-19 17:00:32', NULL),
(27, '0B5312', 'XWBJF69VEMA202930', 1, '2021-02-22 06:19:40', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `vehicle_defects`
--

CREATE TABLE `vehicle_defects` (
  `id` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `level1_id` int(11) NOT NULL,
  `level2_id` int(11) NOT NULL,
  `level3_id` int(11) DEFAULT NULL,
  `defect_id` int(11) NOT NULL,
  `defect_count` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `comment` text DEFAULT NULL,
  `side` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `vehicle_defects`
--

INSERT INTO `vehicle_defects` (`id`, `vehicle_id`, `shop_id`, `level1_id`, `level2_id`, `level3_id`, `defect_id`, `defect_count`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`, `status`, `comment`, `side`) VALUES
(1, 10, 14, 1, 9, 0, 5, 1, '2021-02-18 16:45:17', NULL, NULL, 114, NULL, NULL, 1, NULL, NULL),
(2, 11, 13, 1, 3, 0, 71, 1, '2021-02-18 16:47:17', NULL, NULL, 130, NULL, NULL, 1, NULL, 1),
(3, 12, 11, 1, 6, 30, 1, 1, '2021-02-18 16:51:54', NULL, NULL, 114, NULL, NULL, 1, NULL, NULL),
(4, 13, 13, 1, 929, 0, 71, 1, '2021-02-18 16:55:02', NULL, NULL, 130, NULL, NULL, 1, NULL, NULL),
(5, 13, 13, 15, 347, 0, 1, 1, '2021-02-18 16:56:34', NULL, NULL, 114, NULL, NULL, 1, NULL, NULL),
(6, 14, 12, 1, 3, 0, 78, 1, '2021-02-18 17:06:51', NULL, NULL, 114, NULL, NULL, 1, NULL, 1),
(7, 15, 13, 17, 451, 0, 1, 1, '2021-02-18 17:08:29', NULL, NULL, 130, NULL, NULL, 1, NULL, NULL),
(8, 16, 14, 1, 10, 0, 79, 1, '2021-02-18 17:09:15', NULL, NULL, 130, NULL, NULL, 1, NULL, NULL),
(9, 17, 13, 20, 649, 0, 5, 1, '2021-02-18 17:10:49', NULL, NULL, 114, NULL, NULL, 1, NULL, 2),
(10, 17, 12, 1, 2, 0, 82, 1, '2021-02-18 17:11:34', NULL, NULL, 114, NULL, NULL, 1, NULL, 2),
(11, 18, 6, 20, 0, NULL, 9, 1, '2021-02-18 17:12:29', NULL, NULL, 128, NULL, NULL, 1, NULL, 1),
(12, 18, 14, 1, 9, 0, 71, 1, '2021-02-18 17:13:09', NULL, NULL, 130, NULL, NULL, 1, NULL, NULL),
(13, 18, 13, 1, 9, 0, 71, 1, '2021-02-18 17:13:46', NULL, NULL, 130, NULL, NULL, 1, NULL, 1),
(14, 19, 5, 1, 1, 2, 1, 1, '2021-02-19 16:48:26', NULL, NULL, 128, NULL, NULL, 1, NULL, NULL),
(15, 20, 13, 1, 10, 0, 27, 1, '2021-02-19 16:50:30', NULL, NULL, 130, NULL, NULL, 1, NULL, NULL),
(16, 21, 5, 1, 8, 44, 9, 1, '2021-02-19 16:52:07', NULL, NULL, 114, NULL, NULL, 1, NULL, NULL),
(17, 22, 13, 1, 930, 0, 81, 1, '2021-02-19 16:54:31', NULL, NULL, 130, NULL, NULL, 1, NULL, NULL),
(18, 23, 12, 20, 650, 0, 5, 1, '2021-02-19 16:56:52', NULL, NULL, 114, NULL, NULL, 1, NULL, NULL),
(19, 24, 14, 1, 10, 0, 79, 1, '2021-02-19 16:58:51', NULL, NULL, 130, NULL, NULL, 1, NULL, NULL),
(20, 25, 11, 1, 5, NULL, 28, 1, '2021-02-19 17:00:03', NULL, NULL, 130, 130, NULL, 1, NULL, NULL),
(21, 26, 13, 14, 271, 0, 21, 1, '2021-02-19 17:01:59', NULL, NULL, 130, NULL, NULL, 1, NULL, NULL),
(22, 1, 5, 1, 1, 3, 1, 1, '2021-02-27 12:30:14', NULL, NULL, 114, NULL, NULL, 1, NULL, 2);

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
-- Индексы таблицы `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `defect_cost`
--
ALTER TABLE `defect_cost`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `defect_list`
--
ALTER TABLE `defect_list`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `level_1`
--
ALTER TABLE `level_1`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `level_2`
--
ALTER TABLE `level_2`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `level_3`
--
ALTER TABLE `level_3`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `shops`
--
ALTER TABLE `shops`
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
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `vehicle_defects`
--
ALTER TABLE `vehicle_defects`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `defect_cost`
--
ALTER TABLE `defect_cost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `defect_list`
--
ALTER TABLE `defect_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT для таблицы `level_1`
--
ALTER TABLE `level_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT для таблицы `level_2`
--
ALTER TABLE `level_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=931;

--
-- AUTO_INCREMENT для таблицы `level_3`
--
ALTER TABLE `level_3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT для таблицы `models`
--
ALTER TABLE `models`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `shops`
--
ALTER TABLE `shops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT для таблицы `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT для таблицы `vehicle_defects`
--
ALTER TABLE `vehicle_defects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
