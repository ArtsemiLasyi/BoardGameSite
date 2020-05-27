-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Май 08 2020 г., 18:56
-- Версия сервера: 8.0.19
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
-- База данных: `настольные игры`
--

-- --------------------------------------------------------

--
-- Структура таблицы `пользователь`
--

CREATE TABLE `пользователь` (
  `ID_Пользователя` int NOT NULL,
  `Логин` text NOT NULL,
  `Пароль` text NOT NULL,
  `Ранг` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `пользователь`
--

INSERT INTO `пользователь` (`ID_Пользователя`, `Логин`, `Пароль`, `Ранг`) VALUES
(1, 'Artemi', '12345678', 1),
(2, 'Valkk', '1111', 3),
(4, 'Lesnik', '2222', 2),
(5, 'PolkovnikNKVD', '3333', 7);

-- --------------------------------------------------------

--
-- Структура таблицы `настольная игра`
--

CREATE TABLE `настольная игра` (
  `ID Настольной игры` int NOT NULL,
  `Название` text NOT NULL,
  `Максимально количество игроков` int NOT NULL,
  `Время` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `настольная игра`
--

INSERT INTO `настольная игра` (`ID Настольной игры`, `Название`, `Максимально количество игроков`, `Время`) VALUES
(1, 'Кемет', 5, '02:00:00'),
(2, 'Игра Престолов', 6, '04:00:00'),
(3, 'Манчкин', 6, '01:00:00'),
(4, 'Каркассон', 5, '00:45:00'),
(5, 'Война Кольца', 4, '03:00:00'),
(6, 'Страшные сказки', 4, '00:50:00'),
(7, 'Корни', 5, '01:30:00'),
(8, 'Сумерки Империи', 6, '04:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `новость`
--

CREATE TABLE `новость` (
  `ID_Новости` int NOT NULL,
  `Название новости` varchar(100) NOT NULL,
  `Дата публикации` date NOT NULL,
  `Ссылка на статью` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `новость`
--

INSERT INTO `новость` (`ID_Новости`, `Название новости`, `Дата публикации`, `Ссылка на статью`) VALUES
(1, 'Hobby World открыла предзаказы на дополнение «Каркассон: Аббатство и мэр»', '2020-05-08', 'https://hobbygames.ru/karkasson-abbatstvo-i-mjer?utm_source=vk&utm_medium=smm&utm_campaign=vk_hobbygames'),
(2, 'В продаже появилась настольная игра «Гарсон»', '2020-05-06', 'https://www.zvezda.org.ru/catalog/nastolnye_igry/dlya_vsey_semi/garson/'),
(3, 'Days of Wonder анонсировала игру Ticket to Ride: Amsterdam', '2020-05-28', 'https://boardgamegeek.com/blogpost/104092/ticket-ride-heads-back-time-17th-century-amsterdam'),
(4, 'Renegade Game Studios анонсировала и выпустит в сентябре 2020 Atheneum: Mystic Library', '2020-04-23', 'https://www.renegadegamestudios.com/news/2020/4/23/announcing-atheneum-mystic-library');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `пользователь`
--
ALTER TABLE `пользователь`
  ADD PRIMARY KEY (`ID_Пользователя`);

--
-- Индексы таблицы `настольная игра`
--
ALTER TABLE `настольная игра`
  ADD PRIMARY KEY (`ID Настольной игры`);

--
-- Индексы таблицы `новость`
--
ALTER TABLE `новость`
  ADD PRIMARY KEY (`ID_Новости`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `пользователь`
--
ALTER TABLE `пользователь`
  MODIFY `ID_Пользователя` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `настольная игра`
--
ALTER TABLE `настольная игра`
  MODIFY `ID Настольной игры` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `новость`
--
ALTER TABLE `новость`
  MODIFY `ID_Новости` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
