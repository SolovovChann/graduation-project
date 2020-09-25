-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 25 2020 г., 22:58
-- Версия сервера: 5.6.37
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
-- База данных: `students`
--

-- --------------------------------------------------------

--
-- Структура таблицы `auth`
--

CREATE TABLE `auth` (
  `AId` int(11) NOT NULL COMMENT 'Ид. админа ',
  `ALogin` varchar(255) NOT NULL COMMENT 'Логин',
  `APassword` varchar(255) NOT NULL COMMENT 'Пароль'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `auth`
--

INSERT INTO `auth` (`AId`, `ALogin`, `APassword`) VALUES
(1, 'admin', 'admin'),
(2, 'user', 'user');

-- --------------------------------------------------------

--
-- Структура таблицы `classes`
--

CREATE TABLE `classes` (
  `CId` int(11) NOT NULL COMMENT 'Ид. класса ',
  `CLevel` int(4) NOT NULL COMMENT 'год обучения',
  `Cletter` varchar(1) NOT NULL COMMENT 'буква класса'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `classes`
--

INSERT INTO `classes` (`CId`, `CLevel`, `Cletter`) VALUES
(1, 2010, 'А'),
(2, 2010, 'Б'),
(3, 2010, 'В'),
(4, 2011, 'А'),
(5, 2011, 'Б'),
(6, 2014, 'А'),
(7, 2015, 'В'),
(8, 2017, 'Б'),
(9, 2019, 'Б'),
(10, 2018, 'А'),
(11, 2018, 'Б');

-- --------------------------------------------------------

--
-- Структура таблицы `students`
--

CREATE TABLE `students` (
  `SId` int(11) NOT NULL,
  `SLastName` varchar(255) NOT NULL,
  `SFirstName` varchar(255) NOT NULL,
  `SMidName` varchar(255) NOT NULL,
  `SBirthDate` date NOT NULL,
  `CId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `students`
--

INSERT INTO `students` (`SId`, `SLastName`, `SFirstName`, `SMidName`, `SBirthDate`, `CId`) VALUES
(1, 'Иванов', 'Иван', 'Иванович', '2014-12-10', 5),
(5, 'Менякова', 'Ольга', 'Сергеевна', '2010-02-20', 3),
(6, 'Пугачёва', 'Алла', 'Борисовна', '2014-10-18', 7),
(7, 'Миронов', 'Орест', 'Леонидович', '2013-12-07', 10),
(8, 'Достоевский', 'Фёдор', 'Михайлович', '2014-07-24', 10),
(9, 'Миронов', 'Фёдор', 'Леонидович', '2012-05-12', 10),
(10, 'Носков', 'Иисак', 'Дмитриевич', '2013-07-10', 9),
(11, 'Михалков', 'Никита', 'Сергеевич', '2013-09-18', 9),
(12, 'Тетерев', 'Александр', 'Валерьевич', '2013-07-13', 9),
(14, 'Тестовый', 'Тест', 'Тестович', '2001-04-05', 8),
(15, 'Евсеев', 'Владислав', 'Германович', '2001-03-23', 1),
(16, 'Зыков', 'Рубен', 'Давидович', '2009-07-08', 1),
(17, 'Евсеев', 'Мартин', 'Неллиович', '2011-02-06', 1),
(18, 'Чернов', 'Иван', 'Николаович', '2009-08-18', 11),
(19, 'Колобов', 'Владимир', 'Григорийович', '2001-05-08', 6),
(20, 'Иванков', 'Нелли', 'Богданович', '2005-07-03', 9),
(21, 'Волков', 'Руслан', 'Владимирович', '2007-08-23', 2),
(22, 'Мельников', 'Онисим', 'Иисакович', '2006-08-06', 5),
(23, 'Сергеев', 'Созон', 'Филатович', '2004-02-23', 1),
(24, 'Кириллов', 'Богдан', 'Онисимович', '2007-12-07', 2),
(25, 'Гурьев', 'Аскольд', 'Арсенович', '2003-05-11', 9),
(26, 'Морозов', 'Григорий', 'Брониславович', '2001-11-02', 6),
(27, 'Брагин', 'Орест', 'Владимирович', '2001-03-27', 3),
(28, 'Кулагин', 'Людвиг', 'Иванович', '2002-11-25', 1),
(29, 'Борисов', 'Сергей', 'Сергейович', '2013-09-04', 1),
(30, 'Кириллов', 'Мартин', 'Альбертович', '2002-12-22', 5),
(31, 'Соболев', 'Альберт', 'Альбертович', '2009-11-16', 1),
(32, 'Гурьев', 'Аскольд', 'Иринеович', '2013-09-08', 10),
(33, 'Ермаков', 'Феликс', 'Орестович', '2005-10-22', 8),
(34, 'Галкин', 'Максимилиан', 'Демьянович', '2007-09-09', 7),
(35, 'Брагин', 'Артем', 'Платонович', '2006-09-18', 4),
(36, 'Громов', 'Юстиниан', 'Вячеславович', '2010-09-30', 7),
(37, 'Стрелков', 'Модест', 'Тимурович', '2009-03-25', 4);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`AId`);

--
-- Индексы таблицы `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`CId`);

--
-- Индексы таблицы `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`SId`),
  ADD KEY `CId` (`CId`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `auth`
--
ALTER TABLE `auth`
  MODIFY `AId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Ид. админа ', AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `classes`
--
ALTER TABLE `classes`
  MODIFY `CId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Ид. класса ', AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблицы `students`
--
ALTER TABLE `students`
  MODIFY `SId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`CId`) REFERENCES `classes` (`CId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
