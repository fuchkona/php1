-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 28 2018 г., 15:38
-- Версия сервера: 5.6.38
-- Версия PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `geekbrains`
--
CREATE DATABASE IF NOT EXISTS `geekbrains` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `geekbrains`;

-- --------------------------------------------------------

--
-- Структура таблицы `gallery_images`
--

CREATE TABLE `gallery_images` (
  `i_id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `size` int(10) UNSIGNED NOT NULL,
  `file_name` varchar(300) NOT NULL,
  `views` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `description` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `gallery_images`
--

INSERT INTO `gallery_images` (`i_id`, `name`, `size`, `file_name`, `views`, `description`) VALUES
(7, 'motivation-for-7-day-diet.jpg', 261873, '1517143008_eaa5b15f7feb3426b4d6093e9b956758.jpg', 2, NULL),
(8, '3026089-poster-p-1-ask-the-experts-how-do-i-find-the-motivation-to-get-to-the-next-stage-of-my.jpg', 867738, '1517143011_c9dc3a6b49fe7b4ca3573634c6a0b81c.jpg', 4, NULL),
(9, 'Chrysanthemum.jpg', 879394, '1517143014_453859528b76397a5a12a9d2f36ba702.jpg', 0, NULL),
(10, 'Penguins.jpg', 777835, '1517143017_571e32a9497bc9ce85a05dda04543fd6.jpg', 1, NULL),
(11, 'Koala.jpg', 780831, '1517143020_06d3bc740e8ba0c8f64427649f537269.jpg', 3, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `gallery_images`
--
ALTER TABLE `gallery_images`
  ADD PRIMARY KEY (`i_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `gallery_images`
--
ALTER TABLE `gallery_images`
  MODIFY `i_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
