-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 11 2016 г., 12:30
-- Версия сервера: 5.5.45
-- Версия PHP: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `articles_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id_article` int(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id_article`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id_article`, `title`, `content`, `date`) VALUES
(4, '7-й кавалерийский корпус', ' оперативное войсковое объединение в составе ВС СССР.', '2016-08-01 00:00:00'),
(5, '152 км бла бла бла', ' остановочный пункт Витебского направления Октябрьской железной дороги.\r\n\r\nРасположен к востоку от деревни Велеши, на перегоне Батецкая — Бахарево, в Батецом районе Новгородской области. Имеется[источник не указан 377 дней] одна платформа, расположенная с правой стороны пути[источник не указан 377 дней]. На платформе[источник не указан 377 дней] имеют остановку все проходящие через неё пригородные поезда. Кассы отсутствуют.\r\n\r\nбла бла бла', '2016-07-29 00:00:00'),
(24, 'Хорошая статья', 'текст хорошей статьи', '2016-08-09 00:39:46'),
(25, 'Ураааа', 'заработало', '2016-08-09 10:12:08'),
(26, 'как здорово', 'нехер меня заебыввать))', '2016-08-09 10:12:35'),
(27, 'какая чудесная статья', 'а это ее содержимое', '2016-08-09 10:12:58'),
(28, 'вот так то))', 'ибо нехуй))', '2016-08-09 10:13:32');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id_comment` int(11) NOT NULL AUTO_INCREMENT,
  `id_article` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `comment` text CHARACTER SET utf8 NOT NULL,
  `date_comment` datetime NOT NULL,
  PRIMARY KEY (`id_comment`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
