-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Ноя 26 2017 г., 17:41
-- Версия сервера: 10.1.28-MariaDB
-- Версия PHP: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `project_cms`
--

-- --------------------------------------------------------

--
-- Структура таблицы `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `content` text NOT NULL,
  `publish_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `short_name` varchar(255) NOT NULL,
  `meta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `page`
--

INSERT INTO `page` (`id`, `name`, `time`, `content`, `publish_date`, `short_name`, `meta`) VALUES
(1, 'Русский «большой рывок»: стопами потомков самураев', '2017-11-17 18:40:50', '15 ноября 2017 года, 18:12, Москва, Ленинградский вокзал. До отправления скоростной электрички «Ласточка» на Тверь остается еще целых 20 минут, а все места в ней уже заняты. Появление этих красивых и скоростных поездов буквально за несколько лет сильно изменило жизнь целых городов и районов Подмосковья. А по-другому и быть не могло.\r\n\r\nКлин — Москва и обратно: экономика должна быть экономной\r\n\r\nНачну я свой рассказ с петиции. Жители городов Клина и Солнечногорска Московской области требуют увеличить число скоростных электричек. Они готовы платить за комфорт, лишь бы власти обеспечили им возможность ездить регулярно в Москву…', '2017-11-20 18:20:00', '', ''),
(2, 'Здесь инки не приставали', '2017-11-20 18:51:43', 'Остров Пасхи, или Рапануи, — один из самых уединенных участков суши на планете. Трудно найти на карте более глухое место — больше трех с половиной тысяч километров до американского континента и две с лишним тысячи километров до ближайшей обитаемой суши, крошечного островка Питкерн, населенного потомками горемычных мятежников с «Баунти».\r\n\r\nСегодня остров Пасхи принадлежит Республике Чили и 40% его населения — чилийцы, но 60% — коренные островитяне, рапануйцы, предки которых жили на острове еще с доколумбовых времен.', '2017-11-15 07:21:00', 'Здесь инки не приставали', 'Здесь инки не приставали');

-- --------------------------------------------------------

--
-- Структура таблицы `routes`
--

CREATE TABLE `routes` (
  `id` int(11) NOT NULL,
  `pattern` varchar(255) NOT NULL,
  `controller` varchar(255) NOT NULL,
  `method` enum('GET','POST') NOT NULL,
  `type` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `routes`
--

INSERT INTO `routes` (`id`, `pattern`, `controller`, `method`, `type`) VALUES
(1, '/admin/auth', 'LoginController:authAdmin', 'GET', 'admin');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `password` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `role`, `email`, `time`, `password`, `hash`) VALUES
(1, 'admin', 'administrator', 'admin@admin.com', '2017-11-07 18:08:00', '$2y$10$rKf2h3PSIQI4VlqkW5D9lOyhWOCvubUddonXxr08e5ojRD4mg6qzC', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `routes`
--
ALTER TABLE `routes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
