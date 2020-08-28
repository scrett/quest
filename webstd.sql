-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Авг 28 2020 г., 09:58
-- Версия сервера: 10.3.22-MariaDB-1ubuntu1
-- Версия PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `webstd`
--

-- --------------------------------------------------------

--
-- Структура таблицы `quest`
--

CREATE TABLE `quest` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `quest`
--

INSERT INTO `quest` (`id`, `title`, `description`) VALUES
(1, 'Квест 1. Начало!', 'Добро пожаловать, Путник! '),
(2, 'Квест 2. Выбирайте!', 'Можна пойти на право ,а можна и на лево)'),
(3, 'Квест 3. Желаю удачи!', 'У тебя есть три пути!'),
(4, 'Квест 4. Так держать!', 'Вы на правильном пути!'),
(5, 'Квест 5. Тупик 1!', 'В следующий раз повезет!'),
(6, 'Квест 6. Тупик 2!', 'В следующий раз повезет!'),
(7, 'Квест 7. Ловушка!', 'Вам не повезло вы попали в ловушку шанс был 50%'),
(8, 'Квест 8. Стой!', 'Это дальше тупик возвращайся!!!'),
(9, 'Квест 9. Тупик 3!', 'В следующий раз повезет!'),
(10, 'Квест 10. Ура!', 'Вы выиграли!');

-- --------------------------------------------------------

--
-- Структура таблицы `way`
--

CREATE TABLE `way` (
  `id` int(11) NOT NULL,
  `actId` int(11) NOT NULL,
  `nextId` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trap` int(11) NOT NULL,
  `trapId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `way`
--

INSERT INTO `way` (`id`, `actId`, `nextId`, `description`, `trap`, `trapId`) VALUES
(1, 1, 2, 'Начать приключение!', 0, 0),
(2, 2, 3, 'На право!', 0, 0),
(3, 2, 4, 'На лево!', 0, 0),
(4, 3, 5, 'Путь 1', 0, 0),
(5, 3, 8, 'Путь 2', 0, 0),
(6, 3, 9, 'Путь 3', 0, 0),
(7, 4, 6, 'Испытать удачу!', 50, 7),
(8, 7, 2, 'Вернутся к второму квесту!', 0, 0),
(13, 8, 10, 'Тут опасно!', 0, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `quest`
--
ALTER TABLE `quest`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `way`
--
ALTER TABLE `way`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `quest`
--
ALTER TABLE `quest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `way`
--
ALTER TABLE `way`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
