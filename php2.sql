-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 08 2019 г., 19:15
-- Версия сервера: 5.7.16-log
-- Версия PHP: 7.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `php2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `content`) VALUES
(1, 'Microsoft признал Россию лидером по внедрению искусственного интеллекта', 'Российские компании оказались лидерами по внедрению искусственного интеллекта. К такому выводу пришли эксперты из Microsoft в исследовании «Бизнес-лидеры в эпоху ИИ», опубликованном на сайте корпорации.\r\n\r\nУтверждается, что 30 процентов российских руководителей активно внедряют ИИ. В среднем по миру этот показатель равен 22,3 процента, а в частности, во Франции — всего 10 процентов.'),
(2, 'Второй человек в мире избавился от ВИЧ', 'Ученые из Великобритании провели пересадку стволовых клеток мужчине, известному как «лондонский пациент» и зараженному ВИЧ, в результате чего больной избавился от смертельно опасной инфекции — в его организме вирусы больше не обнаруживаются. Об этом сообщает издание Science.\r\n\r\nМужчину изначально лечили от прогрессирующей лимфомы, которая свойственна для зараженных ВИЧ. Врачи провели трансплантацию гемопоэтических (кроветворных) стволовых клеток от донора, который имел мутацию в гене, кодирующем белок адгезии CCR5. Это соединение находится на поверхности белых кровяных телец — Т-клеток — и связывается со специфическими молекулами, посылая сигналы внутрь клетки. Мутации в CCR5 предотвращает прикрепление к мембране ВИЧ, делая невозможным проникновение вируса в тельца.'),
(3, 'Названа польза сна в борьбе с раком и старением', 'Ученые Университета имени Бар-Илана в Израиле выяснили, что сон способствует восстановлению ДНК в клетках, что препятствует преждевременному старению и развитию рака. Об этом сообщается в пресс-релизе на MedicalXpress.'),
(4, 'В Млечном Пути нашли миллиарды опасных планет', 'Ученые Лейденского университета в Нидерландах выяснили, что в Млечном Пути могут находиться миллиарды планет-странников — небесных тел, которые обладают большой массой, имеют шарообразную форму, но не привязаны гравитационно к какой-либо звезде. Такие объекты свободно летят в космическом пространстве и могут столкнуться с другими планетами, включая Землю. Об этом сообщает издание Science Alert.');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(1024) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 'test@test.com', '123456'),
(2, 'app@a.ru', 'qwerty'),
(3, 'execute@test.com', 'executeTest'),
(24, 'exete@test.com', 'executeTest'),
(25, '1@test.com', 'exe1uteTest'),
(26, 'execu767@test.com', 'execut676eTest'),
(28, 'execu67@test.com', 'eecut676eTest'),
(31, 'excu67@test.com', 'eect676eTest'),
(33, 'ecu67@test.com', 'ect676eTest'),
(51, 'ecu7@test.com', 'ect66eTest'),
(53, 'a@am.com', 'hhh'),
(55, 'a@am.co', 'hh'),
(59, 'a@am.cob', 'hbh'),
(61, 'a@am.cjob', 'hbjh'),
(64, 'a@am.chob', 'jh'),
(66, 'a@am.chaaob', 'jaah'),
(68, 'a@am.chasaob', 'jaash'),
(70, 'a@am.chasgaob', 'jagash'),
(72, 'a@am.chassdgaob', 'jagadsdsh'),
(74, 'a@am.chadssdgaob', 'jagadsddsh');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
