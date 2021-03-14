-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Мар 14 2021 г., 13:10
-- Версия сервера: 5.7.21-20-beget-5.7.21-20-1-log
-- Версия PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `m92080o1_voxys`
--

-- --------------------------------------------------------

--
-- Структура таблицы `status_user`
--
-- Создание: Мар 10 2021 г., 21:35
--

DROP TABLE IF EXISTS `status_user`;
CREATE TABLE `status_user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `status_user`
--

INSERT INTO `status_user` (`id`, `name`) VALUES
(1, 'первый'),
(2, 'второй'),
(3, 'третий');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--
-- Создание: Мар 10 2021 г., 21:38
-- Последнее обновление: Мар 14 2021 г., 10:08
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `full_name`, `status_id`) VALUES
(1, 'Кириллов Алексей Константинович', 1),
(2, 'Кузина Ярослава Станиславовна', 2),
(3, 'Петрова Елизавета Никитична', 2),
(4, 'Власова Мария Кирилловна', 2),
(5, 'Лукьянчикова Анастасия Александровна', 3),
(6, 'Иванова Александра Константиновна', 1),
(7, 'Калашников Захар Иванович', 1),
(8, 'Козлова Екатерина Георгиевна', 1),
(9, 'Комаров Игорь Артёмович', 1),
(10, 'Кондратьева София Марковна', 1),
(11, 'Кондрашов Михаил Даниилович', 1),
(12, 'Королева Лилия Глебовна', 1),
(13, 'Кочеткова Анастасия Андреевна', 1),
(14, 'Кочеткова Анастасия Андреевна', 1),
(15, 'Леонтьева Ксения Максимовна', 1),
(16, 'Королев Евгений Петрович', 1),
(17, 'Королев', 1),
(18, 'Широков Дмитрий Максимович', 1),
(19, 'Цветкова Алина Кирилловна', 1),
(20, 'Цветкова Алина Кирилловна', 1),
(21, 'Терентьев Илья Робертович', 1),
(22, 'Фомина Кира Ильинична', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `status_user`
--
ALTER TABLE `status_user`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status_id` (`status_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `status_user`
--
ALTER TABLE `status_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `status_user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
