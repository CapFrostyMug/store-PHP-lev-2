-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 10 2022 г., 17:13
-- Версия сервера: 8.0.24
-- Версия PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `php_pro`
--

-- --------------------------------------------------------

--
-- Структура таблицы `carts`
--

CREATE TABLE `carts` (
  `id` int NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `good_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `carts`
--

INSERT INTO `carts` (`id`, `session_id`, `good_id`) VALUES
(1, 'bm1cej7fqj8qg41g7n7todaua8kn9ogj', 1),
(2, 'bm1cej7fqj8qg41g7n7todaua8kn9ogj', 2),
(3, 'bm1cej7fqj8qg41g7n7todaua8kn9ogj', 3),
(4, 'u24e9237qje90tvutmpcdvkle24bunqv', 6),
(5, 't8egia1m1noj02blcehp60p9e24vqa3f', 9),
(6, 't8egia1m1noj02blcehp60p9e24vqa3f', 8),
(10, 's09h0611f1bvmff6dn761maipp42k04p', 2),
(11, 's09h0611f1bvmff6dn761maipp42k04p', 3),
(12, 's09h0611f1bvmff6dn761maipp42k04p', 4),
(13, 's09h0611f1bvmff6dn761maipp42k04p', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `name`, `description`, `price`) VALUES
(1, 'Digma EVE 11 C409', 'Ноутбук', 23790),
(2, 'IRBIS NB NB78', 'Ноутбук', 27190),
(3, 'ASUS L210MA-GJ050T', 'Ноутбук', 28990),
(4, 'Acer Aspire 1 A114-32-C5QD', 'Ноутбук', 32790),
(5, 'ARK Jumper EZbook S5', 'Ноутбук', 33290),
(6, 'Lenovo ThinkPad P1 Gen 4', 'Ноутбук', 678690),
(7, 'GIGABYTE Aorus 15P YD-74RU244SH', 'Ноутбук', 493390),
(8, 'ALIENWARE x17 R1', 'Ноутбук', 488490),
(9, 'MSI GS76 Stealth 11UH-265RU', 'Ноутбук', 488390);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `user_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `phone_num` varchar(255) NOT NULL,
  `session_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_name`, `phone_num`, `session_id`) VALUES
(1, 'Эмметт Браун', '+12345678901', 'bm1cej7fqj8qg41g7n7todaua8kn9ogj'),
(2, 'Джон Траволта', '+79199457100', 'u24e9237qje90tvutmpcdvkle24bunqv'),
(3, 'Брюс Уэйн', '+79199450071', 't8egia1m1noj02blcehp60p9e24vqa3f'),
(4, 'Эмили Блант', '+73452513030', 's09h0611f1bvmff6dn761maipp42k04p');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`) VALUES
(1, 'admin', '$2y$10$RYonEsFE82Ok7fAmH3ZSHupcnbwmKFcmOQMoYazwaR2./2G4.666S'),
(2, 'user1', '$2y$10$tw9DajCJyNwnWNYKqleU0uEdb7JdPUXAAK/sMCC3xLUSY/2g5GXCy'),
(3, 'user2', '111');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
