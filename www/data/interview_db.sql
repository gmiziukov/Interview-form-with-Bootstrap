-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 23 2016 г., 17:32
-- Версия сервера: 5.5.48
-- Версия PHP: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `interview.db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Answers`
--

CREATE TABLE IF NOT EXISTS `Answers` (
  `IdAnswer` int(11) NOT NULL,
  `AnswerName` varchar(255) NOT NULL,
  `GroupAnswer` varchar(50) NOT NULL,
  `TypeAnswer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `Hit`
--

CREATE TABLE IF NOT EXISTS `Hit` (
  `IdHit` int(11) NOT NULL,
  `IdAnswerFK` int(11) NOT NULL,
  `Hit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `HitTxtField`
--

CREATE TABLE IF NOT EXISTS `HitTxtField` (
  `IdHit` int(11) NOT NULL,
  `IdAnswerFK` int(11) NOT NULL,
  `Hit` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `Interviews`
--

CREATE TABLE IF NOT EXISTS `Interviews` (
  `IdInterview` int(11) NOT NULL,
  `InterviewName` varchar(255) NOT NULL,
  `DateCreate` date NOT NULL,
  `DateTo` date NOT NULL,
  `DateFrom` date NOT NULL,
  `IsActive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `MiddleIQ`
--

CREATE TABLE IF NOT EXISTS `MiddleIQ` (
  `IdMiddleIQ` int(11) NOT NULL,
  `IdInterviewFK` int(11) NOT NULL,
  `IdQuestionFK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `MiddleOI`
--

CREATE TABLE IF NOT EXISTS `MiddleOI` (
  `IdMiddleIO` int(11) NOT NULL,
  `IdOrganisationFK` int(11) NOT NULL,
  `IdInterviewFK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `MiddleQA`
--

CREATE TABLE IF NOT EXISTS `MiddleQA` (
  `IdMiddleQA` int(11) NOT NULL,
  `IdQuestionFK` int(11) NOT NULL,
  `IdAnswerFK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `Organisations`
--

CREATE TABLE IF NOT EXISTS `Organisations` (
  `IdOrganisation` int(11) NOT NULL,
  `OrganisationName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `Questions`
--

CREATE TABLE IF NOT EXISTS `Questions` (
  `IdQuestion` int(11) NOT NULL,
  `QuestionName` varchar(255) NOT NULL,
  `OrderView` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `IdUser` int(11) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Users`
--

INSERT INTO `Users` (`IdUser`, `UserName`, `Password`) VALUES
(1, 'root', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Answers`
--
ALTER TABLE `Answers`
  ADD PRIMARY KEY (`IdAnswer`);

--
-- Индексы таблицы `Hit`
--
ALTER TABLE `Hit`
  ADD PRIMARY KEY (`IdHit`);

--
-- Индексы таблицы `HitTxtField`
--
ALTER TABLE `HitTxtField`
  ADD PRIMARY KEY (`IdHit`);

--
-- Индексы таблицы `Interviews`
--
ALTER TABLE `Interviews`
  ADD PRIMARY KEY (`IdInterview`);

--
-- Индексы таблицы `MiddleIQ`
--
ALTER TABLE `MiddleIQ`
  ADD PRIMARY KEY (`IdMiddleIQ`);

--
-- Индексы таблицы `MiddleOI`
--
ALTER TABLE `MiddleOI`
  ADD PRIMARY KEY (`IdMiddleIO`);

--
-- Индексы таблицы `MiddleQA`
--
ALTER TABLE `MiddleQA`
  ADD PRIMARY KEY (`IdMiddleQA`);

--
-- Индексы таблицы `Organisations`
--
ALTER TABLE `Organisations`
  ADD PRIMARY KEY (`IdOrganisation`);

--
-- Индексы таблицы `Questions`
--
ALTER TABLE `Questions`
  ADD PRIMARY KEY (`IdQuestion`);

--
-- Индексы таблицы `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`IdUser`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Answers`
--
ALTER TABLE `Answers`
  MODIFY `IdAnswer` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `Hit`
--
ALTER TABLE `Hit`
  MODIFY `IdHit` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `HitTxtField`
--
ALTER TABLE `HitTxtField`
  MODIFY `IdHit` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `Interviews`
--
ALTER TABLE `Interviews`
  MODIFY `IdInterview` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `MiddleIQ`
--
ALTER TABLE `MiddleIQ`
  MODIFY `IdMiddleIQ` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `MiddleOI`
--
ALTER TABLE `MiddleOI`
  MODIFY `IdMiddleIO` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `MiddleQA`
--
ALTER TABLE `MiddleQA`
  MODIFY `IdMiddleQA` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `Organisations`
--
ALTER TABLE `Organisations`
  MODIFY `IdOrganisation` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `Questions`
--
ALTER TABLE `Questions`
  MODIFY `IdQuestion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `Users`
--
ALTER TABLE `Users`
  MODIFY `IdUser` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
