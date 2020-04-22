-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Ноя 02 2017 г., 11:41
-- Версия сервера: 5.5.55-0ubuntu0.14.04.1
-- Версия PHP: 5.5.9-1ubuntu4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `armycash`
--

-- --------------------------------------------------------

--
-- Структура таблицы `games`
--

CREATE TABLE IF NOT EXISTS `games` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bet` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `cell_1` int(11) NOT NULL,
  `cell_2` int(11) NOT NULL,
  `cell_3` int(11) NOT NULL,
  `cell_4` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `win` int(11) DEFAULT NULL,
  `may_win` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=78 ;

--
-- Дамп данных таблицы `games`
--

INSERT INTO `games` (`id`, `bet`, `user_id`, `type`, `cell_1`, `cell_2`, `cell_3`, `cell_4`, `status`, `win`, `may_win`, `updated_at`, `created_at`) VALUES
(1, 100, 5, 1, 500, 500, 1000, 200, 1, 10, 10, '2017-10-31 01:23:30', '0000-00-00 00:00:00'),
(2, 100, 5, 1, 500, 500, 500, NULL, 1, 500, NULL, '2017-10-31 01:23:36', '0000-00-00 00:00:00'),
(3, 100, 5, 1, 200, 500, 1000, NULL, 1, 10, NULL, '2017-10-31 01:23:46', '0000-00-00 00:00:00'),
(4, 100, 5, 1, 500, 500, 500, NULL, 1, 500, NULL, '2017-10-31 01:23:52', '0000-00-00 00:00:00'),
(5, 100, 5, 1, 500, 200, 1000, NULL, 1, 10, NULL, '2017-10-31 01:23:59', '0000-00-00 00:00:00'),
(6, 100, 5, 1, 1000, 200, 500, NULL, 1, 10, NULL, '2017-10-31 01:24:12', '0000-00-00 00:00:00'),
(7, 100, 5, 1, 200, 500, 1000, NULL, 1, 10, NULL, '2017-10-31 01:24:21', '0000-00-00 00:00:00'),
(8, 100, 5, 1, 500, 500, 200, 500, 1, 500, 500, '2017-10-31 01:24:31', '0000-00-00 00:00:00'),
(9, 100, 5, 1, 200, 500, 1000, NULL, 1, 10, NULL, '2017-10-31 01:24:37', '0000-00-00 00:00:00'),
(10, 100, 5, 1, 200, 200, 200, NULL, 1, 200, NULL, '2017-10-31 01:24:48', '0000-00-00 00:00:00'),
(11, 100, 5, 1, 500, 200, 200, 200, 1, 200, 200, '2017-10-31 01:24:55', '0000-00-00 00:00:00'),
(12, 100, 5, 1, 200, 1000, 500, NULL, 1, 10, NULL, '2017-10-31 01:25:02', '0000-00-00 00:00:00'),
(13, 100, 5, 1, 500, 200, 200, 200, 1, 200, 200, '2017-10-31 01:25:10', '0000-00-00 00:00:00'),
(14, 100, 5, 1, 1000, 200, 500, NULL, 1, 10, NULL, '2017-10-31 01:25:18', '0000-00-00 00:00:00'),
(15, 100, 5, 1, 500, 500, 500, NULL, 1, 500, NULL, '2017-10-31 01:25:29', '0000-00-00 00:00:00'),
(16, 100, 5, 1, 500, 500, 500, NULL, 1, 500, NULL, '2017-10-31 01:25:36', '0000-00-00 00:00:00'),
(17, 100, 5, 1, 500, 500, 500, NULL, 1, 500, NULL, '2017-10-31 01:25:41', '0000-00-00 00:00:00'),
(18, 100, 5, 1, 1000, 500, 200, NULL, 1, 10, NULL, '2017-10-31 01:25:45', '0000-00-00 00:00:00'),
(19, 100, 5, 1, 500, 200, 1000, NULL, 0, 10, NULL, '2017-10-30 18:25:56', '0000-00-00 00:00:00'),
(20, 100, 5, 1, 200, 200, 200, NULL, 1, 200, NULL, '2017-10-31 01:26:09', '0000-00-00 00:00:00'),
(21, 100, 5, 1, 1000, 500, 200, NULL, 1, 10, NULL, '2017-10-31 01:26:14', '0000-00-00 00:00:00'),
(22, 100, 5, 1, 500, 200, 1000, NULL, 1, 10, NULL, '2017-10-31 01:26:19', '0000-00-00 00:00:00'),
(23, 100, 5, 1, 200, 1000, 500, NULL, 1, 10, NULL, '2017-10-31 01:26:23', '0000-00-00 00:00:00'),
(24, 100, 5, 1, 500, 500, 500, NULL, 1, 500, NULL, '2017-10-31 01:26:28', '0000-00-00 00:00:00'),
(25, 100, 5, 1, 200, 1000, 500, NULL, 1, 10, NULL, '2017-10-31 01:26:39', '0000-00-00 00:00:00'),
(26, 100, 5, 1, 500, 500, 500, NULL, 1, 500, NULL, '2017-10-31 01:26:46', '0000-00-00 00:00:00'),
(27, 100, 5, 1, 200, 500, 1000, NULL, 1, 10, NULL, '2017-10-31 01:26:51', '0000-00-00 00:00:00'),
(28, 100, 5, 1, 1000, 500, 200, NULL, 1, 10, NULL, '2017-10-31 01:26:56', '0000-00-00 00:00:00'),
(29, 100, 5, 1, 1000, 200, 500, NULL, 1, 10, NULL, '2017-10-31 01:27:02', '0000-00-00 00:00:00'),
(30, 100, 5, 1, 500, 1000, 200, NULL, 1, 10, NULL, '2017-10-31 01:27:09', '0000-00-00 00:00:00'),
(31, 100, 5, 1, 200, 1000, 500, NULL, 1, 10, NULL, '2017-10-31 01:27:15', '0000-00-00 00:00:00'),
(32, 100, 5, 1, 500, 1000, 200, NULL, 1, 10, NULL, '2017-10-31 01:27:20', '0000-00-00 00:00:00'),
(33, 100, 5, 1, 500, 1000, 200, NULL, 1, 10, NULL, '2017-10-31 01:27:25', '0000-00-00 00:00:00'),
(34, 100, 5, 1, 200, 200, 1000, 1000, 1, 10, 10, '2017-10-31 01:27:35', '0000-00-00 00:00:00'),
(35, 100, 5, 1, 1000, 200, 500, NULL, 1, 10, NULL, '2017-10-31 01:27:40', '0000-00-00 00:00:00'),
(36, 100, 5, 1, 200, 1000, 500, NULL, 1, 10, NULL, '2017-10-31 01:27:46', '0000-00-00 00:00:00'),
(37, 100, 5, 1, 1000, 200, 500, NULL, 1, 10, NULL, '2017-10-31 01:27:51', '0000-00-00 00:00:00'),
(38, 100, 5, 1, 1000, 200, 500, NULL, 1, 10, NULL, '2017-10-31 01:27:56', '0000-00-00 00:00:00'),
(39, 100, 5, 1, 1000, 500, 200, NULL, 1, 10, NULL, '2017-10-31 01:28:01', '0000-00-00 00:00:00'),
(40, 100, 5, 1, 1000, 500, 200, NULL, 1, 10, NULL, '2017-10-31 01:28:05', '0000-00-00 00:00:00'),
(41, 100, 5, 1, 500, 1000, 200, NULL, 1, 10, NULL, '2017-10-31 01:28:10', '0000-00-00 00:00:00'),
(42, 100, 5, 1, 500, 200, 500, 200, 1, 10, 10, '2017-10-31 01:28:18', '0000-00-00 00:00:00'),
(43, 100, 5, 1, 500, 200, 1000, NULL, 1, 10, NULL, '2017-10-31 01:28:25', '0000-00-00 00:00:00'),
(44, 100, 5, 1, 500, 500, 500, NULL, 1, 500, NULL, '2017-10-31 01:28:32', '0000-00-00 00:00:00'),
(45, 100, 5, 1, 200, 200, 500, 500, 1, 10, 10, '2017-10-31 01:28:41', '0000-00-00 00:00:00'),
(46, 100, 5, 1, 200, 500, 1000, NULL, 1, 10, NULL, '2017-10-31 01:33:32', '0000-00-00 00:00:00'),
(47, 100, 5, 1, 500, 500, 500, NULL, 1, 500, NULL, '2017-10-31 01:33:46', '0000-00-00 00:00:00'),
(48, 100, 5, 1, 200, 200, 200, NULL, 1, 200, NULL, '2017-10-31 01:33:55', '0000-00-00 00:00:00'),
(49, 1000, 2, 1, 2000, 5000, 10000, NULL, 1, 100, NULL, '2017-10-31 02:32:44', '0000-00-00 00:00:00'),
(50, 1000, 2, 1, 5000, 10000, 2000, NULL, 1, 100, NULL, '2017-10-31 02:32:59', '0000-00-00 00:00:00'),
(51, 1000, 2, 1, 2000, 2000, 2000, NULL, 1, 2000, NULL, '2017-10-31 02:33:07', '0000-00-00 00:00:00'),
(52, 1000, 2, 1, 2000, 2000, 2000, NULL, 1, 2000, NULL, '2017-10-31 02:33:12', '0000-00-00 00:00:00'),
(53, 5000, 2, 1, 25000, 10000, 50000, NULL, 1, 500, NULL, '2017-10-31 02:33:20', '0000-00-00 00:00:00'),
(54, 100, 2, 1, 500, 200, 1000, NULL, 1, 10, NULL, '2017-10-31 21:19:48', '0000-00-00 00:00:00'),
(55, 1000, 2, 1, 2000, 5000, 10000, NULL, 1, 100, NULL, '2017-10-31 21:20:42', '0000-00-00 00:00:00'),
(56, 40, 5, 1, 200, 200, 200, NULL, 1, 200, NULL, '2017-11-01 12:02:41', '0000-00-00 00:00:00'),
(57, 40, 5, 1, 400, 80, 80, 200, 1, 4, 4, '2017-11-01 12:02:53', '0000-00-00 00:00:00'),
(58, 21, 5, 1, 105, 105, 105, NULL, 1, 105, NULL, '2017-11-01 12:06:06', '0000-00-00 00:00:00'),
(59, 21, 5, 1, 105, 105, 42, 42, 1, 2, 2, '2017-11-01 12:06:14', '0000-00-00 00:00:00'),
(60, 100, 5, 1, 200, 200, 200, NULL, 1, 200, NULL, '2017-11-01 12:06:30', '0000-00-00 00:00:00'),
(61, 100, 5, 1, 200, 200, 200, NULL, 1, 200, NULL, '2017-11-01 12:06:46', '0000-00-00 00:00:00'),
(62, 100, 5, 1, 1000, 500, 200, NULL, 1, 10, NULL, '2017-11-01 12:06:56', '0000-00-00 00:00:00'),
(63, 100, 5, 1, 1000, 200, 500, NULL, 1, 10, NULL, '2017-11-01 12:27:33', '0000-00-00 00:00:00'),
(64, 100, 5, 1, 200, 200, 500, 1000, 1, 10, 10, '2017-11-01 12:28:37', '0000-00-00 00:00:00'),
(65, 100, 5, 1, 1000, 500, 200, NULL, 1, 10, NULL, '2017-11-01 12:29:19', '0000-00-00 00:00:00'),
(66, 100, 5, 1, 500, 500, 500, NULL, 1, 500, NULL, '2017-11-01 12:30:40', '0000-00-00 00:00:00'),
(67, 100, 5, 1, 200, 500, 500, 200, 1, 10, 10, '2017-11-01 12:33:47', '0000-00-00 00:00:00'),
(68, 100, 5, 1, 500, 200, 500, 200, 1, 10, 10, '2017-11-01 12:35:48', '0000-00-00 00:00:00'),
(69, 100, 5, 1, 200, 200, 200, NULL, 1, 200, NULL, '2017-11-01 12:35:56', '0000-00-00 00:00:00'),
(70, 100, 5, 1, 500, 500, 500, NULL, 1, 500, NULL, '2017-11-01 12:36:03', '0000-00-00 00:00:00'),
(71, 100, 5, 1, 200, 1000, 500, NULL, 1, 10, NULL, '2017-11-01 12:36:12', '0000-00-00 00:00:00'),
(72, 100, 5, 1, 200, 200, 200, NULL, 1, 200, NULL, '2017-11-01 12:36:19', '0000-00-00 00:00:00'),
(73, 100, 5, 1, 200, 500, 1000, NULL, 1, 10, NULL, '2017-11-01 12:45:48', '0000-00-00 00:00:00'),
(74, 100, 5, 1, 500, 500, 1000, 500, 1, 10, 500, '2017-11-01 12:46:28', '0000-00-00 00:00:00'),
(75, 100, 5, 1, 500, 1000, 1000, 500, 1, 10, 10, '2017-11-01 12:47:46', '0000-00-00 00:00:00'),
(76, 100, 5, 1, 1000, 500, 200, NULL, 1, 10, NULL, '2017-11-01 17:47:18', '0000-00-00 00:00:00'),
(77, 100, 5, 1, 500, 200, 1000, NULL, 1, 10, NULL, '2017-11-02 02:37:27', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `payments`
--

INSERT INTO `payments` (`id`, `amount`, `user`, `time`, `timestamp`, `status`, `type`, `created_at`, `updated_at`) VALUES
(1, 100, 5, 1509430589, '0000-00-00 00:00:00', 1, 0, '2017-10-31 06:16:29', '0000-00-00 00:00:00'),
(2, 100, 5, 1509430627, '0000-00-00 00:00:00', 1, 0, '2017-10-31 06:17:07', '0000-00-00 00:00:00'),
(3, 100, 5, 1509430633, '0000-00-00 00:00:00', 0, 0, '2017-10-31 06:17:13', '0000-00-00 00:00:00'),
(4, 100, 5, 1509511283, '0000-00-00 00:00:00', 0, 0, '2017-11-01 04:41:23', '0000-00-00 00:00:00'),
(5, 100, 5, 1509511868, '0000-00-00 00:00:00', 0, 0, '2017-11-01 04:51:08', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `promocodes`
--

CREATE TABLE IF NOT EXISTS `promocodes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(121) CHARACTER SET utf8 NOT NULL,
  `user` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `promocodes`
--

INSERT INTO `promocodes` (`id`, `code`, `user`, `created_at`, `updated_at`) VALUES
(1, 'rK8bEd8H94yir', 2, '2017-10-30 11:05:05', '0000-00-00 00:00:00'),
(2, 'YTFY4hnas2edr', 4, '2017-10-30 15:16:03', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chance` int(11) NOT NULL,
  `yt_chance` int(11) NOT NULL,
  `promo_sum` int(11) NOT NULL,
  `promo_percent` int(11) NOT NULL,
  `fk_id` int(11) NOT NULL,
  `fk_secret1` varchar(8) NOT NULL,
  `fk_secret2` varchar(8) NOT NULL,
  `min_bet` int(11) NOT NULL,
  `min_with` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`id`, `chance`, `yt_chance`, `promo_sum`, `promo_percent`, `fk_id`, `fk_secret1`, `fk_secret2`, `min_bet`, `min_with`, `updated_at`, `created_at`) VALUES
(1, 50, 80, 50, 5, 43709, 'zwsruw2n', 'f352i3rq', 20, 40, '2017-11-01 04:59:21', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(256) NOT NULL,
  `avatar` varchar(256) NOT NULL,
  `login` varchar(256) NOT NULL,
  `money` int(255) NOT NULL,
  `is_admin` int(11) NOT NULL,
  `is_yt` int(11) NOT NULL,
  `ref_code` varchar(256) NOT NULL,
  `ref_use` varchar(256) DEFAULT NULL,
  `open_box` int(255) NOT NULL,
  `win` int(255) NOT NULL,
  `remember_token` varchar(100) NOT NULL,
  `login2` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `bonus_time` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '2016-11-08 19:43:23',
  `deposit` int(11) NOT NULL DEFAULT '0',
  `nick` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `ban_support` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '2016-11-08 21:32:40',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `avatar`, `login`, `money`, `is_admin`, `is_yt`, `ref_code`, `ref_use`, `open_box`, `win`, `remember_token`, `login2`, `bonus_time`, `deposit`, `nick`, `level`, `ban_support`, `created_at`, `updated_at`) VALUES
(2, 'Malinovij Ray', 'https://pp.userapi.com/c841225/v841225691/1558e/dd1IJl3ZVuo.jpg', 'id309198988', 27710, 1, 1, 'T334', '', 0, 0, 'tqHSZEXg5cSue0EZ5c7MPAmxiPBsAjEdEF3eCIuBMs0FFHPLaY7TBYjekuuH', '309198988', '2016-11-08 19:43:23', 0, 'azBKnf25', 0, 0, '2017-10-31 18:04:57', '2017-11-01 01:04:57'),
(3, 'Морозов Ваня', 'https://pp.userapi.com/c624830/v624830010/2602a/3-qcSsqsM1Y.jpg', 'id56058010', 0, 0, 0, 'YTFY4hnas2edr', NULL, 0, 0, 'cQkO66DBbXLyEHspya4LuK5SaYHJAB82lKZfhaDHbkfLV7iFVyLgEa6U9guU', '56058010', '2016-11-08 19:43:23', 0, 'ezska6kN', 0, 0, '2017-10-30 15:14:09', '2017-10-30 22:14:09'),
(4, 'Собалева Анастасия', 'https://pp.userapi.com/c628720/v628720232/4491f/lYFvClEHbDU.jpg', 'id344865232', 50, 0, 0, 'HkhGiQdF9n25H', 'YTFY4hnas2edr', 0, 0, 'opKkFcT4PhAN8JqW9otgPQRROUWcFBftAXwo7sIDCfLygnwIRLIQyZmwTG50', '344865232', '2016-11-08 19:43:23', 0, 'R24Hy25e', 0, 0, '2017-10-30 15:16:03', '2017-10-30 22:16:03'),
(5, 'Исаев Иван', 'https://pp.userapi.com/c639122/v639122867/2ed74/sp1eLy4IA1Y.jpg', 'id293841867', 6259, 1, 0, 'TGDM', NULL, 0, 0, 'PFnmyjM71xsXti96EkNkdPjSbuJscWGP7hSwhpI14RpxAnoIJmuA5KosuIvS', '293841867', '2016-11-08 19:43:23', 300, 'BG8ZB3DT', 0, 0, '2017-11-01 19:37:27', '2017-11-02 02:37:27');

-- --------------------------------------------------------

--
-- Структура таблицы `withdraw`
--

CREATE TABLE IF NOT EXISTS `withdraw` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `system` varchar(256) CHARACTER SET utf8 NOT NULL,
  `wallet` varchar(15) CHARACTER SET utf8 NOT NULL,
  `amount` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `withdraw`
--

INSERT INTO `withdraw` (`id`, `user_id`, `system`, `wallet`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(3, 5, '4', '+77027155156', 100, 1, '2017-10-31 17:07:55', '0000-00-00 00:00:00'),
(4, 5, '1', '4111111111', 100, 1, '2017-10-31 17:08:44', '0000-00-00 00:00:00'),
(5, 5, '5', '400', 100, 1, '2017-10-31 17:09:41', '2017-11-01 00:34:59');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
