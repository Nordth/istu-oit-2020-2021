-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 22 2019 г., 16:01
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `data`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id_articles` int(11) NOT NULL,
  `title_articles` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_articles` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_articles` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id_articles`, `title_articles`, `text_articles`, `img_articles`) VALUES
(1, 'Shellinian Test Page', '<p align=\"justify\">\r\n				Здравствуй, дорогой посетитель нашего сайта! Мы - paintedfriend, независимый музыкальный лейбл, автор и творческое\r\n				объединение. Наша команда состоит из множества дружелюбных и талантивых людей, которые стараются производить оригинальный\r\n				и качественный контент. Мы искренне надеемся, что наше творчество приходится тебе по душе.\r\n			</p>\r\n			\r\n			\r\n			<ol>Среди наших работ вы можете найти:\r\n				<li> Рисунки/картины</li>\r\n				<li> Музыку </li>\r\n				<li> Фотографии и видео</li>\r\n			</ol>\r\n			\r\n			<table color=\"black\" border=\"3\" align=\"right\">\r\n				<tr>\r\n					<td> Пожалуйста, посетите наш оффициальный сайт:</td>\r\n				</tr>\r\n				<tr>\r\n					<td align=\"center\"> <a href=\"https://paintedfriend.life\"> paintedfriend.life </a> </td>\r\n				</tr>\r\n			</table>\r\n			\r\n			<ul>Предлагаем вам ознакомиться с нашим творчеством на:\r\n				<li> <a href=\"https://soundcloud.com/ukuwis\">Soundcloud</a></li>\r\n				<li> <a href=\"https://instagram.com/paintedfriend\">Instagram</a></li>\r\n			</ul>\r\n			<p align=\"justify\">\r\n				На данный момент мы активно ищем лучший вариант текстильной фабрики для сотрудничества,\r\n				чтобы производить для вас продукцию отличного качества без завышенных цен. Если вас это заинтересовало и вы хотите\r\n				помочь нам с производством - свяжитесь с нами, написав на нашу почту: <a href=\"mailto:info@paintedfriend.life\">\r\n				info@paintedfriend.life</a>\r\n			</p>\r\n			</section>\r\n			\r\n			<section>\r\n			<p align=\"center\"> Ниже вы можете увидеть фотографии некоторых участников нашей дружной компании:</p>\r\n			<div id=\"gallery\">\r\n				<div class=\"photos\">\r\n					<img src=\"https://paintedfriend.life/assets/images/paintedfriend-560x560.jpg\" class=\"showed\">\r\n					<img src=\"https://paintedfriend.life/assets/images/bolshe-560x560.jpg\">\r\n					<img src=\"https://paintedfriend.life/assets/images/alex-560x560.jpg\">\r\n				</div>\r\n				<div class=\"buttons\">\r\n					<input type=\"button\" value=\"<\" class=\"prev\">\r\n					<input type=\"button\" value=\">\" class=\"next\">\r\n				</div>\r\n			</div>\r\n			</section>\r\n			\r\n			<article>\r\n				Также у нас в планах сотрудничество с крупным лейблом под названием bitbird, а именно - совместный\r\n				трек с музыкантом Analogue Dear. Цель bitbird - поддержать хорошую, душевную музыку всех направлений,\r\n				независимо от жанров. Также они верят в то, что, давая художнику правильную систематическую поддержку,\r\n				он сможет в полной мере выразить своё творчество, с чем мы полностью солидарны.\r\n			</article>\r\n<article>\r\n				<p align=\"center\"> Наш последний релиз:</p>\r\n				<div id=\"vk_post_-123230299_157\"></div>\r\n				<script type=\"text/javascript\">\r\n				(function(d, s, id){ \r\n					var js, fjs = d.getElementsByTagName(s)[0]; \r\n					if (d.getElementById(id))\r\n						return; js = d.createElement(s);\r\n					js.id = id; js.src = \"https://vk.com/js/api/openapi.js?162\";\r\n					fjs.parentNode.insertBefore(js, fjs);\r\n				}\r\n				(document, \'script\', \'vk_openapi_js\'));\r\n				(function() {\r\n					if (!window.VK || !VK.Widgets || !VK.Widgets.Post ||\r\n					!VK.Widgets.Post(\'vk_post_-123230299_157\', -123230299, 157, \'kW4KtOaUWJRj8F7PDoTiWB33DRc\'))\r\n					setTimeout(arguments.callee, 50);\r\n				}());\r\n				</script>\r\n			</article>\r\n\r\n			<script>\r\n				var btn_prev = document.querySelector(\'#gallery .buttons .prev\');\r\n				var btn_next = document.querySelector(\'#gallery .buttons .next\');\r\n				var images = document.querySelectorAll(\'#gallery .photos img\');\r\n				var i = 0;\r\n				\r\n				btn_prev.onclick = function (){\r\n					images[i].className = \'\';\r\n					i= i-1;\r\n					if (i < 0){\r\n						i = images.length - 1;\r\n					}\r\n					images[i].className = \'showed\';\r\n				}\r\n				\r\n				btn_next.onclick = function(){\r\n					images[i].className = \'\';\r\n					i= i+1;\r\n					if (i >= images.length){\r\n						i = 0;\r\n					}\r\n					images[i].className = \'showed\';\r\n				}\r\n				\r\n			</script>\r\n			\r\n		</div>', 'sources/yare.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id_articles`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id_articles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
