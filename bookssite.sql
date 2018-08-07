-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Авг 01 2018 г., 16:11
-- Версия сервера: 10.1.30-MariaDB
-- Версия PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `bookssite`
--

-- --------------------------------------------------------

--
-- Структура таблицы `authors`
--

CREATE TABLE `authors` (
  `author` varchar(32) NOT NULL,
  `author_url` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `authors`
--

INSERT INTO `authors` (`author`, `author_url`) VALUES
('Александр Пушкин', 'aleksandr-pushkin'),
('Анатолій Дімаров', 'anatoliy-dimarov'),
('Коля Пяточкин', 'kolya-pyatochkin'),
('Серхей есенин', 'serhey-esenin');

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL,
  `book_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`id`, `title`, `description`, `price`, `book_url`) VALUES
(1, 'БЛАКИТНА ДИТИНА', '«Блакитна дитина» Анатолія Дімарова – сповнена яскравого гумору повість про різноманітні пригоди хлопчика-школяра***. На сторінках цієї книги читачу відкривається неповторний світ дитинства, коли довкілля здається фантастичним, а кожний день несе нову радість. Твір є обов’язковою частиною шкільної програми. Найвідомішими творами автора є «Його сім’я», «Ідол», «Шляхами життя», «І будуть люди» , «Біль і гнів», «Син капітана», «Вершини», «Прожити й розповісти», «На коні й під конем», «Друга планета». Анатолій Дімаров – український письменник, майстер соціально-психологічної прози, автор кількох захопливих книжок для дітей.', 99, 'blakitna-ditina'),
(20, 'фываыфvcxbxuycvbваыва', 'ыфваывxcvbcxvbcvфаывфа', 213, 'fyvayfvcxbxuycvbvayva'),
(25, 'баба яга', 'баба ёжка', 2, 'baba-yaga'),
(27, 'залупа', 'залупа конская', 4, 'zalupa'),
(28, '55555', 'sdfsadfasdf', 55555, '55555'),
(29, 'выапваып', 'выапвыамиуцкпвыапыв', 4, 'vyapvayp'),
(30, '1111111', '1', 1, '1111111'),
(31, '54645rtdhdfh', 'rtyfdhfh', 435, '54645rtdhdfh'),
(33, 'Первая книга', 'Lorem Ipsum - это текст-&#34;рыба&#34;, часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной &#34;рыбой&#34; для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн. Его популяризации в новое время послужили публикация листов Letraset с образцами Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной вёрстки типа Aldus PageMaker, в шаблонах которых используется Lorem Ipsum.', 50, 'pervaya-kniga');

-- --------------------------------------------------------

--
-- Структура таблицы `booksbyauthors`
--

CREATE TABLE `booksbyauthors` (
  `id_books` int(11) NOT NULL,
  `author_book` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `booksbyauthors`
--

INSERT INTO `booksbyauthors` (`id_books`, `author_book`) VALUES
(1, 'Александр Пушкин'),
(20, 'Александр Пушкин'),
(25, 'Александр Пушкин'),
(27, 'Александр Пушкин'),
(28, 'Александр Пушкин'),
(28, 'Анатолій Дімаров'),
(28, 'Коля Пяточкин'),
(29, 'Александр Пушкин'),
(30, 'Александр Пушкин'),
(31, 'Александр Пушкин'),
(33, 'Анатолій Дімаров'),
(33, 'Коля Пяточкин');

-- --------------------------------------------------------

--
-- Структура таблицы `booksbygenres`
--

CREATE TABLE `booksbygenres` (
  `id_books` int(11) NOT NULL,
  `genre_book` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `booksbygenres`
--

INSERT INTO `booksbygenres` (`id_books`, `genre_book`) VALUES
(1, 'Балады'),
(20, 'Балады'),
(25, 'Балады'),
(27, 'Балады'),
(28, 'Боевики'),
(28, 'Детские книги'),
(28, 'Романы'),
(28, 'Стихи'),
(29, 'Балады'),
(30, 'Балады'),
(31, 'Балады'),
(33, 'Боевики'),
(33, 'Детские книги');

-- --------------------------------------------------------

--
-- Структура таблицы `genres`
--

CREATE TABLE `genres` (
  `genre` varchar(32) NOT NULL,
  `genre_url` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `genres`
--

INSERT INTO `genres` (`genre`, `genre_url`) VALUES
('Балады', 'balady'),
('Боевики', 'boeviki'),
('Детские книги', 'detskie-knigi'),
('Романы', 'romany'),
('Стихи', 'stihi');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `authors`
--
ALTER TABLE `authors`
  ADD UNIQUE KEY `author` (`author`);

--
-- Индексы таблицы `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `booksbyauthors`
--
ALTER TABLE `booksbyauthors`
  ADD PRIMARY KEY (`id_books`,`author_book`),
  ADD KEY `author_book` (`author_book`);

--
-- Индексы таблицы `booksbygenres`
--
ALTER TABLE `booksbygenres`
  ADD PRIMARY KEY (`id_books`,`genre_book`),
  ADD KEY `booksbygenres_ibfk_1` (`genre_book`);

--
-- Индексы таблицы `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`genre`),
  ADD KEY `genre` (`genre`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `booksbyauthors`
--
ALTER TABLE `booksbyauthors`
  ADD CONSTRAINT `booksbyauthors_ibfk_2` FOREIGN KEY (`id_books`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booksbyauthors_ibfk_3` FOREIGN KEY (`author_book`) REFERENCES `authors` (`author`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `booksbygenres`
--
ALTER TABLE `booksbygenres`
  ADD CONSTRAINT `booksbygenres_ibfk_1` FOREIGN KEY (`genre_book`) REFERENCES `genres` (`genre`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booksbygenres_ibfk_2` FOREIGN KEY (`id_books`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
