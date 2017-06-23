-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 23 2017 г., 15:02
-- Версия сервера: 5.5.53
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `game`
--
CREATE DATABASE IF NOT EXISTS `game` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `game`;

-- --------------------------------------------------------

--
-- Структура таблицы `craft`
--

CREATE TABLE `craft` (
  `id` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `id_factory` int(11) NOT NULL,
  `gold` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `text` varchar(500) NOT NULL,
  `hp_colus` int(11) NOT NULL,
  `id_drop1` int(11) DEFAULT NULL,
  `id_westeland` int(11) DEFAULT NULL,
  `lvl` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `factory`
--

CREATE TABLE `factory` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `text` varchar(500) NOT NULL,
  `src` varchar(250) NOT NULL,
  `gold` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `string` varchar(500) NOT NULL,
  `gold_cost` int(11) NOT NULL,
  `lvl` int(11) NOT NULL,
  `event_colus` int(11) NOT NULL,
  `drop_colus` int(11) NOT NULL,
  `id_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `item_type`
--

CREATE TABLE `item_type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `transact_result`
--

CREATE TABLE `transact_result` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `trnsachon`
--

CREATE TABLE `trnsachon` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_items` int(11) NOT NULL,
  `prise` int(11) NOT NULL,
  `id_compite` int(11) NOT NULL,
  `id_user_b` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gold` int(11) NOT NULL DEFAULT '0',
  `hp` int(11) NOT NULL DEFAULT '10'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `user_factory`
--

CREATE TABLE `user_factory` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_factory` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `user_items`
--

CREATE TABLE `user_items` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_items` int(11) NOT NULL,
  `lvl` int(11) NOT NULL,
  `dressed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `wasteland`
--

CREATE TABLE `wasteland` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `text` varchar(500) NOT NULL,
  `src` varchar(250) NOT NULL,
  `event_chense` int(11) NOT NULL,
  `drop_chense` int(11) NOT NULL,
  `event_lvl` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `craft`
--
ALTER TABLE `craft`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_item` (`id_item`),
  ADD KEY `id_factory` (`id_factory`);

--
-- Индексы таблицы `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_drop1` (`id_drop1`),
  ADD KEY `id_westeland` (`id_westeland`);

--
-- Индексы таблицы `factory`
--
ALTER TABLE `factory`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_type` (`id_type`);

--
-- Индексы таблицы `item_type`
--
ALTER TABLE `item_type`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `transact_result`
--
ALTER TABLE `transact_result`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `trnsachon`
--
ALTER TABLE `trnsachon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_items` (`id_items`),
  ADD KEY `trnsachon_ibfk_3` (`id_compite`),
  ADD KEY `id_user_b` (`id_user_b`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user_factory`
--
ALTER TABLE `user_factory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_factory` (`id_factory`);

--
-- Индексы таблицы `user_items`
--
ALTER TABLE `user_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_items` (`id_items`);

--
-- Индексы таблицы `wasteland`
--
ALTER TABLE `wasteland`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `craft`
--
ALTER TABLE `craft`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `factory`
--
ALTER TABLE `factory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `item_type`
--
ALTER TABLE `item_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `transact_result`
--
ALTER TABLE `transact_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `trnsachon`
--
ALTER TABLE `trnsachon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `user_factory`
--
ALTER TABLE `user_factory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `user_items`
--
ALTER TABLE `user_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `wasteland`
--
ALTER TABLE `wasteland`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `craft`
--
ALTER TABLE `craft`
  ADD CONSTRAINT `craft_ibfk_1` FOREIGN KEY (`id_item`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `craft_ibfk_2` FOREIGN KEY (`id_factory`) REFERENCES `factory` (`id`);

--
-- Ограничения внешнего ключа таблицы `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_2` FOREIGN KEY (`id_westeland`) REFERENCES `wasteland` (`id`),
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`id_drop1`) REFERENCES `items` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Ограничения внешнего ключа таблицы `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`id_type`) REFERENCES `item_type` (`id`);

--
-- Ограничения внешнего ключа таблицы `trnsachon`
--
ALTER TABLE `trnsachon`
  ADD CONSTRAINT `trnsachon_ibfk_4` FOREIGN KEY (`id_user_b`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `trnsachon_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `trnsachon_ibfk_2` FOREIGN KEY (`id_items`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `trnsachon_ibfk_3` FOREIGN KEY (`id_compite`) REFERENCES `transact_result` (`id`);

--
-- Ограничения внешнего ключа таблицы `user_factory`
--
ALTER TABLE `user_factory`
  ADD CONSTRAINT `user_factory_ibfk_2` FOREIGN KEY (`id_factory`) REFERENCES `factory` (`id`),
  ADD CONSTRAINT `user_factory_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `user_items`
--
ALTER TABLE `user_items`
  ADD CONSTRAINT `user_items_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_items_ibfk_2` FOREIGN KEY (`id_items`) REFERENCES `items` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
