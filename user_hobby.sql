-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Ноя 08 2012 г., 21:11
-- Версия сервера: 5.5.25a
-- Версия PHP: 5.2.16

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `userhobby`
--

-- --------------------------------------------------------

--
-- Структура таблицы `hobby`
--

CREATE TABLE `hobby` (
  `id_hobby` int(3) NOT NULL AUTO_INCREMENT,
  `name_hobby` varchar(30) NOT NULL,
  `description_hobby` text NOT NULL,
  PRIMARY KEY (`id_hobby`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `hobby`
--

INSERT INTO `hobby` (`id_hobby`, `name_hobby`, `description_hobby`) VALUES
(1, 'needlework', 'If you like it, you do not have to buy clothes, and you are always beautifully dressed'),
(2, 'sport', 'this kind of hobby expands your social circle and brightens up your time'),
(3, 'cookery', 'people with this kind of hobby, create true culinary masterpieces'),
(4, 'gardening', 'if you have a cottage or your kitchen garden, this hobby can be a very profitable and enjoyable hobby');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id_user` int(5) NOT NULL AUTO_INCREMENT,
  `name_user` varchar(20) NOT NULL,
  `lastname_user` varchar(20) NOT NULL,
  `date_b` date NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `id_hobby` int(3) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=12 ;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id_user`, `name_user`, `lastname_user`, `date_b`, `login`, `password`, `id_hobby`) VALUES
(1, 'Ivan', 'Laletin', '1987-01-25', 'Laletin.Ivan', '123', 2),
(2, 'Maria', 'Platonova', '1989-02-23', 'Maria_Platonova', '123', 2),
(3, 'Tatyana', 'Kolesnikova', '1989-02-23', 'Tanya', '123', 3),
(4, 'Stepanida', 'Nagulnova', '1987-02-23', 'nagulnova87', '123', 3),
(5, 'Blasius', 'Mymlikov', '1987-02-23', 'blas_mymlikov', '123', 3),
(6, 'Vladimir', 'Zarudin', '1987-02-23', 'Vladimir.Zarudin', '123', 4),
(7, 'Lada', 'Dolmatova', '1985-01-01', 'ladyshka', 'Dolmatova', 1),
(8, 'Anna', 'Ahryapova', '1985-01-01', 'Anna_Ahryapova', '546', 1),
(9, 'Xenia', 'Gonohova', '1985-01-01', 'Xenia_Gonohova85', '1985', 1),
(10, 'Leo', 'Vinarov', '1985-01-01', 'Levchik', '1234', 4),
(11, 'Praskovya', 'Myznikova', '1985-01-01', 'praska-ova', 'hello', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
