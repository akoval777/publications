-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Окт 24 2016 г., 14:11
-- Версия сервера: 10.1.16-MariaDB
-- Версия PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `publications`
--

-- --------------------------------------------------------

--
-- Структура таблицы `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `headling` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `date_pub` date NOT NULL,
  `date_rel` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `announcements`
--

INSERT INTO `announcements` (`id`, `headling`, `text`, `date_pub`, `date_rel`) VALUES
(1, 'Объявление 1', 'прпарарапрапрапопо', '2016-09-24', '2016-09-27'),
(2, 'Продам гараж', 'Продам гараж в хорошем состоянии', '2016-09-15', '2016-09-23');

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `headling` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `rating` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `headling`, `text`, `rating`) VALUES
(1, 'Статья 1', 'керпрпрокеокео керпрпрокеокеокерпрпрокеокеокерпрпрокеокеокерпрпрокеокео', 3),
(2, 'Историческая перспектива внешней политики России', 'Международные отношения проходят через очень непростой период, и Россия, как уже не раз бывало в истории, оказалась на перекрестке ключевых тенденций, во многом определяющих вектор будущего мирового развития.\r\n\r\nВ этой связи высказываются разные точки зрения, включая сомнения относительно того, достаточно ли трезво мы оцениваем международную ситуацию и собственные позиции в мире. Вновь слышны отголоски извечных для России споров между «западниками» и сторонниками собственного, уникального пути. Есть и те – и внутри страны, и за границей, – кто склонен полагать, что Россия чуть ли не обречена вечно быть отстающей или «догоняющей» страной, вынуждена постоянно подстраиваться под придуманные другими правила игры и поэтому не может в полный голос заявлять о своей роли в мировых делах. Хотелось бы в данном контексте высказать некоторые соображения в увязке с историческими примерами и параллелями.', 2.75);

-- --------------------------------------------------------

--
-- Структура таблицы `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `family` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `id_article` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `authors`
--

INSERT INTO `authors` (`id`, `family`, `name`, `surname`, `id_article`) VALUES
(1, 'Иванов', 'Иван', 'Иванович', 1),
(2, 'Лавров', 'Сергей', 'Сергеевич', 2),
(3, 'Петров', 'Петр', 'Петрович', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `headling` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `date` date NOT NULL,
  `source` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `headling`, `text`, `date`, `source`) VALUES
(1, 'Новость 1', 'lorem ipsum lorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsum', '2016-09-24', 'нет'),
(2, 'В Тихом океане береговой ракетный дивизион "Рубеж" поразил учебные цели', 'Береговой ракетный дивизион "Рубеж" поразил учебные цели в Авачинском заливе в Тихом океане, сообщил в субботу начальник отдела информационного обеспечения пресс-службы ВВО капитан 1-го ранга Роман Мартов.', '2016-09-24', 'РИА новости');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
