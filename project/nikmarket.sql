-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 11 2018 г., 17:42
-- Версия сервера: 5.7.19
-- Версия PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `nikmarket`
--
CREATE DATABASE IF NOT EXISTS `nikmarket` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `nikmarket`;

-- --------------------------------------------------------

--
-- Структура таблицы `auth`
--

CREATE TABLE `auth` (
  `a_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `secret` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `agent` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `auth`
--

INSERT INTO `auth` (`a_id`, `u_id`, `secret`, `time`, `agent`) VALUES
(10, 1, '$2y$10$88AalUz1iKHV4YQk2qcgteSHuqb9zGJP7D5PUiwfic9I5hwh8mrk.', '2018-02-11 08:30:51', '$2y$10$qSXSvPi5okrE7rvP4DWROuV5bStEW54S3J7xcxMv/LoJOudqXsCDa'),
(11, 1, '$2y$10$Anq300AvGFtEqXtIuAAgv.NHhjy0ftlkQkqbxQXvmr0fspO5FcFPW', '2018-02-11 12:15:05', '$2y$10$jb7QdrJoeCDNA7RRqZWNu.BoIqiSa2xtbPWB88QblRoPKRUGN1Mki'),
(12, 1, '$2y$10$J5NvAbu3t2AZ.0hzOkfDeebLVdYze3Vx9DI7mWSxggNusZLyRk5J2', '2018-02-11 12:15:49', '$2y$10$0MP/EQzgVWeaVMDO9jBvoeTZYMyIt95O8hK/V.0tAC6Dw8ul4eFEW'),
(13, 1, '$2y$10$riBlTRqKwv3wfbuR.2iEneB5RuMksEtzOhUTkzTJPj.hcaqhzUAIW', '2018-02-11 12:18:49', '$2y$10$BAlJ7Y4lerOl3qb8Qz2GGexYDGqh6l1JP2C4Gnkznz86eRAsvoQn.'),
(14, 1, '$2y$10$AeXdwjRJAxPNv3PVDjoZu.DtZlefwxf23SwbDIe9WRSATBgfvKpwu', '2018-02-11 12:18:53', '$2y$10$JWgXuYqkpgc1mSS5UeAXQOeKhb/CNnwi86Ihy4GkuXuNGRox/6FLi'),
(15, 1, '$2y$10$SQ0q/HU7QCkxv5teTzak4evAqzliIV5bxd4rTPFIo4Yk/EOfzpIuq', '2018-02-11 12:19:39', '$2y$10$1sMeJK1ZiPXueUgRCgWQz.4e17wydpVn9bGINYP4.xEQoIuvhHQ7m'),
(16, 1, '$2y$10$dpyBSa5treFKFppaIZkWgOfCXcpoBW8QRfUcz2OApBRIs9hzuXtVa', '2018-02-11 12:20:20', '$2y$10$n5TFg6dKwFeYT2QYwQ6ycuTPSW8fc6zi7y.pvUSzk2m..cFVH5dIC'),
(17, 1, '$2y$10$4.qdkTCz/87ys4D5pLe6degFn1N5bSgpQ05.LMYEKyWMPEHWOlO2e', '2018-02-11 12:23:11', '$2y$10$bYQxYDlKqJ/Z9X0YApQcfODMmm/h7g4jCS7cHe8JxPqPHv9nT4cgu'),
(18, 1, '$2y$10$t.LQtLmv8jCuz.N/46cQ3.FuAtai5Yua3GSHsh4RFhc9rAulK5tM6', '2018-02-11 12:24:28', '$2y$10$VmLk1nR73sWSbcZFu4HuruxSZ3ukO1Wk5M613Gyt9UlrVZeXMGKAq'),
(19, 1, '$2y$10$fwksmnFGb0W.h7/fHHeGIeKy/.tfSKE26Jtv1TFn.VPiclOgH20Wa', '2018-02-11 12:25:54', '$2y$10$3R1OuLH.F5MsxpU30Nh1JO3OoI0mEwF6UtpKHHNZWyNqPFNHN8PXy'),
(20, 1, '$2y$10$yu8awNyNibSa9RUxe7d2dufrASlqe3APlpn58ufubEN1aI2EObWny', '2018-02-11 12:26:29', '$2y$10$0842oXWlBLwzl.f7N84dAexEqxOec/JG0xLEewfBkZTvFiiF76ZnC'),
(21, 1, '$2y$10$N206EcF.aHZZsojw.PxGP.tEKXM1SdR7iyTyEgonx24X7n58W88l6', '2018-02-11 12:26:45', '$2y$10$BHrc8itmZZiA14hRQZbmbeHROlXlfMkAMaevuSeK3U8oKJoR1y0V.'),
(22, 1, '$2y$10$kNxi2ObyblS7Tft0RfZ8sezXDheL98VpJFlVMUEM62ANzz4NFfhi.', '2018-02-11 12:28:41', '$2y$10$TY5AaGXBMJKjvS5wxF/tQOUJUzLPaGtim.7ah2aNBgYCOrczM7WGu'),
(23, 1, '$2y$10$E9EYOBdjFuc4cc5.Ved/7eAxLk8Dw8.v//E2TpywiGec0yBCNJzuu', '2018-02-11 12:29:37', '$2y$10$EJheDqFZ2xydx8zR985Ku.bZVtVkZTO7rmbk/RjijCPwl5Mpd8ezy'),
(24, 1, '$2y$10$8pu3u.M51AQhXRXXDFLgXe2i3IF6oLM1KmdRWuGbfGyBSZ0TJHzGq', '2018-02-11 12:30:04', '$2y$10$LvaCch7BAhPjyl.O62yBpOBkhjAGy3OHSwT0f3ZnA2w1D0ev5SGDi'),
(25, 1, '$2y$10$vtQQQ.ZfkaTkJZM.sOsequo3B4wik.5QEk3ZJK3C.ZpWf2sG3pO0u', '2018-02-11 12:30:22', '$2y$10$Et30qcJbU3sxLjLJgp.BlukbWXBxhYomdL9nXfYA528/NPe2g.6sS'),
(29, 1, '$2y$10$Mq560iqo8F4TWB0uguvndOxpIMUL1h2734oWjwbFyMke0rZYSknZe', '2018-02-11 12:37:50', '$2y$10$rWnVt2DKsPSn7Xl.sBlIA.2LQBKk65dCyG77hgBBKskpjej5xQszq'),
(31, 1, '$2y$10$SA/Vidlw81Nd7VqnMHfiXOR/mOHtEyV.dSsdvKCds6QJey113/bZW', '2018-02-11 13:25:35', '$2y$10$kMw0.CSUJRI1SUFZP9kxDuTiV2dYaTEEIThohWVtuJCvfpiAgAPD6');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `c_id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `parent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `g_id` int(11) NOT NULL,
  `title` varchar(300) NOT NULL,
  `description` text,
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `visits` int(11) UNSIGNED DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `login` varchar(150) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `role` tinyint(3) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`u_id`, `name`, `login`, `pass`, `role`) VALUES
(1, 'Fuchko Nikita', 'nikita', '$2y$10$VsjG5mseWsy78F4K3UO6tOcWWZVMsQpWFpTQ4SjDyxa5tEeR08SrS', 255),
(2, 'Testerov', 'test1', '$2y$10$j0OA1FOJESbN5cZDygGDhOSsxqDrvw1Vkh3oRdg9qM3izAUyXCQrW', 0),
(3, 'Testerov', 'test2', '$2y$10$VTbaGjMPQRspGWPLMFSZAunOuB.3ozWnhRKS7vblN5IheNHCXlavi', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`a_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`c_id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`g_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `auth`
--
ALTER TABLE `auth`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `g_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `auth`
--
ALTER TABLE `auth`
  ADD CONSTRAINT `u_id` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
