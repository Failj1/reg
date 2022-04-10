-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 10 2022 г., 20:57
-- Версия сервера: 5.7.33
-- Версия PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `reg`
--
CREATE DATABASE IF NOT EXISTS `reg` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `reg`;

-- --------------------------------------------------------

--
-- Структура таблицы `components`
--

CREATE TABLE `components` (
  `id` int(11) NOT NULL,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kind` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `storage` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `typething` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_types` int(13) NOT NULL,
  `product_quantity` mediumint(5) NOT NULL,
  `product_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `components`
--

INSERT INTO `components` (`id`, `name`, `text`, `kind`, `amount`, `storage`, `image`, `typething`, `id_types`, `product_quantity`, `product_status`) VALUES
(1, 'Новая деталь', '', 'Кнопка', '40.00', 'Тут', 'uploads/co', '', 2, 10, '1'),
(2, 'Ыыыыы', '21212', 'Кнопка', '120.00', 'Тут', 'uploads/components/16496103281.jpg', 'components', 2, 10, '1');

-- --------------------------------------------------------

--
-- Структура таблицы `device`
--

CREATE TABLE `device` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kind` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `storage` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `typething` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_types` int(11) NOT NULL,
  `product_quantity` mediumint(5) NOT NULL,
  `product_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `device`
--

INSERT INTO `device` (`id`, `name`, `text`, `kind`, `amount`, `storage`, `image`, `typething`, `id_types`, `product_quantity`, `product_status`) VALUES
(1, 'Деталь 2', '', '', '0.00', '', '', '', 0, 10, '1'),
(4, 'Это не детал', '', '', '12.00', 'Тут', 'uploads/components/1646945066', '', 1, 10, '1');

-- --------------------------------------------------------

--
-- Структура таблицы `kit`
--

CREATE TABLE `kit` (
  `id` int(11) NOT NULL,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `storage` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_list` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `typekit` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_quantity` mediumint(5) NOT NULL,
  `product_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `kit`
--

INSERT INTO `kit` (`id`, `name`, `text`, `storage`, `amount`, `image`, `id_list`, `typekit`, `product_quantity`, `product_status`) VALUES
(1, 'Набор 1', '1212', 'Тут', '40.00', 'uploads/co', '1,4', '', 10, '1'),
(2, 'Детали', '', 'Тут', '1.00', 'uploads/co', '1,4,5', '', 10, '1');

-- --------------------------------------------------------

--
-- Структура таблицы `nulik`
--

CREATE TABLE `nulik` (
  `id` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kind` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `storage` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `typething` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_types` int(13) NOT NULL,
  `product_quantity` mediumint(5) NOT NULL,
  `product_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `nulik`
--

INSERT INTO `nulik` (`id`, `name`, `text`, `kind`, `amount`, `storage`, `image`, `typething`, `id_types`, `product_quantity`, `product_status`) VALUES
('⠀', '⠀', '⠀', '⠀', '⠀', '⠀', '', '⠀', 0, 0, '1');

-- --------------------------------------------------------

--
-- Структура таблицы `types`
--

CREATE TABLE `types` (
  `id_t` int(11) NOT NULL,
  `nametype` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `types`
--

INSERT INTO `types` (`id_t`, `nametype`) VALUES
(1, 'device'),
(2, 'components'),
(3, 'kit');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(355) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `full_name`, `login`, `password`, `avatar`) VALUES
(23, 'Илья Анатольевич Вавилов', 'Failj', '12345', 'uploads/avatar/1638360091'),
(24, 'Ил', 'qwerty', '12345', 'uploads/avatar/1638362257'),
(25, 'Анатолий', 'tyu', 'c4ca4238a0b923820dcc509a6f75849b', 'uploads/avatar/1645722590'),
(26, '', 'f', 'c4ca4238a0b923820dcc509a6f75849b', 'uploads/avatar/1645723866'),
(27, 'Илья Вавилов', 'F4ilji', 'c4ca4238a0b923820dcc509a6f75849b', 'uploads/avatar/164615374512.jpg'),
(28, 'Илья Вавилов', 'tarasik', 'c4ca4238a0b923820dcc509a6f75849b', 'uploads/avatar/16490133103b568aa69c6dfdac7807910d67a31ef0.jpg'),
(29, 'Илья Вавилов', 'F4ilj', '47c19b0a56e0f3814eba8659f94cf301', 'uploads/avatar/1649605641'),
(30, 'John', 'Snusik', '47c19b0a56e0f3814eba8659f94cf301', 'uploads/avatar/16496091523b568aa69c6dfdac7807910d67a31ef0.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `components`
--
ALTER TABLE `components`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_types` (`id_types`);

--
-- Индексы таблицы `device`
--
ALTER TABLE `device`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `kit`
--
ALTER TABLE `kit`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `nulik`
--
ALTER TABLE `nulik`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_types` (`id_types`);

--
-- Индексы таблицы `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id_t`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `components`
--
ALTER TABLE `components`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `device`
--
ALTER TABLE `device`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `kit`
--
ALTER TABLE `kit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `types`
--
ALTER TABLE `types`
  MODIFY `id_t` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `components`
--
ALTER TABLE `components`
  ADD CONSTRAINT `components_ibfk_1` FOREIGN KEY (`id_types`) REFERENCES `types` (`id_t`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
