-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Июн 06 2016 г., 07:46
-- Версия сервера: 5.6.21
-- Версия PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `diplom`
--

-- --------------------------------------------------------

--
-- Структура таблицы `group`
--

CREATE TABLE IF NOT EXISTS `group` (
`id_group` int(11) NOT NULL,
  `cipher` int(11) NOT NULL,
  `date_receipt` date NOT NULL,
  `group` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `group`
--

INSERT INTO `group` (`id_group`, `cipher`, `date_receipt`, `group`) VALUES
(0, 230115, '2012-09-01', 2901);

-- --------------------------------------------------------

--
-- Структура таблицы `manager`
--

CREATE TABLE IF NOT EXISTS `manager` (
`id_manager` int(11) NOT NULL,
  `full_name` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `manager`
--

INSERT INTO `manager` (`id_manager`, `full_name`) VALUES
(0, 'Сазонова Наталья Владимеровна');

-- --------------------------------------------------------

--
-- Структура таблицы `possible_topics`
--

CREATE TABLE IF NOT EXISTS `possible_topics` (
`id_theme` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `view` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `progress`
--

CREATE TABLE IF NOT EXISTS `progress` (
  `id_projects` int(11) NOT NULL,
  `id_task` int(11) NOT NULL,
  `progress` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `progress`
--

INSERT INTO `progress` (`id_projects`, `id_task`, `progress`) VALUES
(0, 1, 0),
(0, 2, 0),
(0, 4, 0),
(0, 3, 0),
(0, 5, 0),
(0, 6, 0),
(0, 7, 0),
(0, 8, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
`id_projects` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `document` varchar(50) NOT NULL,
  `finished` tinyint(1) NOT NULL,
  `date_add` datetime NOT NULL,
  `subject` varchar(50) NOT NULL,
  `view` int(11) NOT NULL,
  `manager` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `projects`
--

INSERT INTO `projects` (`id_projects`, `title`, `description`, `document`, `finished`, `date_add`, `subject`, `view`, `manager`, `id_user`) VALUES
(0, 'Учет проектов конструкторского бюро', '', '', 0, '2016-05-14 00:00:00', '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `specialty`
--

CREATE TABLE IF NOT EXISTS `specialty` (
  `cipher` int(11) NOT NULL,
  `title_spec` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `specialty`
--

INSERT INTO `specialty` (`cipher`, `title_spec`) VALUES
(220110, 'Компьютерные сети и комплексы'),
(230115, 'Программирование в компьютерных системах');

-- --------------------------------------------------------

--
-- Структура таблицы `task`
--

CREATE TABLE IF NOT EXISTS `task` (
`id_task` int(11) NOT NULL,
  `view` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `task`
--

INSERT INTO `task` (`id_task`, `view`, `text`) VALUES
(1, 0, 'Введение'),
(2, 0, 'Основная теоретическая часть'),
(3, 0, 'Специальная часть'),
(4, 0, 'Экономическая часть'),
(5, 0, 'Заключение'),
(6, 0, 'Приложение'),
(7, 0, 'Презентация'),
(8, 0, 'Программный продукт');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id_user` int(11) NOT NULL,
  `id_group` int(11) NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `password` varchar(50) NOT NULL,
  `e-mail` varchar(50) NOT NULL,
  `active` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id_user`, `id_group`, `full_name`, `password`, `e-mail`, `active`) VALUES
(0, 0, 'Михайлов Олег Александрович', '', 'olegmixa@mail.ru', 1),
(7, 0, 'Иванов Виталйий', 'ec6a6536ca304edf844d1d248a4f08dc', 'odjedje@ofjk.ru', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `view`
--

CREATE TABLE IF NOT EXISTS `view` (
`id_view` int(11) NOT NULL,
  `view` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `view`
--

INSERT INTO `view` (`id_view`, `view`) VALUES
(0, 'Диплом'),
(1, 'Реферат'),
(2, 'Курсовая');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `group`
--
ALTER TABLE `group`
 ADD PRIMARY KEY (`id_group`), ADD KEY `cipher` (`cipher`);

--
-- Индексы таблицы `manager`
--
ALTER TABLE `manager`
 ADD PRIMARY KEY (`id_manager`);

--
-- Индексы таблицы `possible_topics`
--
ALTER TABLE `possible_topics`
 ADD PRIMARY KEY (`id_theme`), ADD KEY `view` (`view`);

--
-- Индексы таблицы `progress`
--
ALTER TABLE `progress`
 ADD KEY `id_projects` (`id_projects`), ADD KEY `id_task` (`id_task`);

--
-- Индексы таблицы `projects`
--
ALTER TABLE `projects`
 ADD PRIMARY KEY (`id_projects`), ADD KEY `id_user` (`id_user`), ADD KEY `manager` (`manager`), ADD KEY `view` (`view`);

--
-- Индексы таблицы `specialty`
--
ALTER TABLE `specialty`
 ADD PRIMARY KEY (`cipher`);

--
-- Индексы таблицы `task`
--
ALTER TABLE `task`
 ADD PRIMARY KEY (`id_task`), ADD KEY `view` (`view`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id_user`), ADD KEY `id_group` (`id_group`);

--
-- Индексы таблицы `view`
--
ALTER TABLE `view`
 ADD PRIMARY KEY (`id_view`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `group`
--
ALTER TABLE `group`
MODIFY `id_group` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `manager`
--
ALTER TABLE `manager`
MODIFY `id_manager` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `possible_topics`
--
ALTER TABLE `possible_topics`
MODIFY `id_theme` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `projects`
--
ALTER TABLE `projects`
MODIFY `id_projects` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `task`
--
ALTER TABLE `task`
MODIFY `id_task` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `view`
--
ALTER TABLE `view`
MODIFY `id_view` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `group`
--
ALTER TABLE `group`
ADD CONSTRAINT `group_ibfk_1` FOREIGN KEY (`cipher`) REFERENCES `specialty` (`cipher`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `possible_topics`
--
ALTER TABLE `possible_topics`
ADD CONSTRAINT `possible_topics_ibfk_1` FOREIGN KEY (`view`) REFERENCES `view` (`id_view`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `progress`
--
ALTER TABLE `progress`
ADD CONSTRAINT `progress_ibfk_1` FOREIGN KEY (`id_task`) REFERENCES `task` (`id_task`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `progress_ibfk_2` FOREIGN KEY (`id_projects`) REFERENCES `projects` (`id_projects`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `projects`
--
ALTER TABLE `projects`
ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `projects_ibfk_2` FOREIGN KEY (`manager`) REFERENCES `manager` (`id_manager`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `projects_ibfk_3` FOREIGN KEY (`view`) REFERENCES `view` (`id_view`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `task`
--
ALTER TABLE `task`
ADD CONSTRAINT `task_ibfk_1` FOREIGN KEY (`view`) REFERENCES `view` (`id_view`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `user`
--
ALTER TABLE `user`
ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_group`) REFERENCES `group` (`id_group`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
