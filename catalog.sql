-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 12 2020 г., 21:06
-- Версия сервера: 8.0.19
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `catalog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `login` varchar(80) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `admin`
--

INSERT INTO `admin` (`id`, `login`, `password`) VALUES
(1, 'admin', '$2y$10$10oTfR1kiqEYnj4hgFLDguQ2AAxloWomRC3oeXbr6g1I4vPVLmnxq');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'cookies'),
(2, 'chocolate'),
(5, 'waffles'),
(7, 'marshmallow'),
(9, 'cakes');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text NOT NULL,
  `vendor_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `vendor_code`, `image_name`, `category_id`) VALUES
(1, 'Молочный шоколад Kinder Chocolate с молочной начинкой 100 г', '45.00', 'Страна-производитель товара Германия\r\nСрок хранения 365 дней\r\nВес 100 г', '40084701', 'kinder_chocolate.png', 2),
(2, 'Шоколад Milka с какао и печеньем Oreo 100 г', '37.00', 'Вес 100 г\r\nСрок хранения 275 дней\r\nСодержание какао 25% ', '7622210578266', 'milka_oreo_chocolate.jpg', 2),
(3, 'Молочный шоколад Ritter Sport с орехом макадамия Nut Selection 100 г', '46.00', 'Вес 100 г\r\nСрок хранения 304 дня\r\nСтрана-производитель товара Германия', '4000417705006', 'ritter_sport_chocolate.jpg', 2),
(4, 'Печенье Belvita с мульти-злаками 225 г', '37.00', 'Срок хранения 275 дней\r\nВес 225 г\r\nСтрана-производитель товара Украина', '7622210899286', 'belvita_cookies.jpg', 1),
(5, 'Печенье Oreo Двойная начинка 170 г ', '45.00', 'Вес 170 г\r\nСрок хранения 365 дней\r\nСтрана-производитель товара Испания', '7622210873736', 'oreo_cookies.jpg', 1),
(6, 'Крекер Crich цельнозерновой 250 г', '48.00', 'Вес 250 г\r\nСрок хранения 16 месяцев\r\nСтрана-производитель товара Италия', '8008620009337', 'crich_cookies.jpg', 1),
(7, 'Вафли Loacker Tortina Choco Noir 125 г', '155.00', 'Добавки С шоколадом\r\nВес 125 г\r\nСтрана-производитель товара Италия', '8000380005598', 'loacker_waffles.png', 5),
(8, 'Вафли Crich с какао 250 г', '75.00', 'Вес 250 г\r\nСрок хранения 16 месяцев\r\nСтрана-производитель товара Италия', '8008620052609', 'crich_waffles.jpg', 5),
(9, 'Упаковка вафель Roshen Wafers Шоколад 22 х 72 г', '190.00', 'Дополнительно С начинкой\r\nСрок хранения 365 дней\r\nСтрана-производитель товара Украина', '4823077621703_4823077621642', 'roshen_waffles.jpg', 5),
(10, 'Маршмеллоу Rocky Mountain Classic Mini 150 г', '78.00', 'Вес 150 г\r\nСрок хранения 12 месяцев\r\nСтрана-производитель товара США', '54300091510', 'rocky_mountain_marshmallow.jpg', 7),
(11, 'Маршмеллоу Millennium Барбекю Гриль 225 г', '41.00', 'Вес 225 г\r\nСрок хранения 425 дней\r\nСтрана-производитель товара Бельгия', '5902574390066', 'millenium_marshmallow.jpg', 7),
(12, 'Зефир Корисна Кондитерська в шоколаде со стевией 180 г', '96.00', 'Вес 180 г\r\nСрок хранения 3 месяца\r\nСтрана-производитель товара Украина', '4820035540311', 'korysna_kondyterska_marshmallow.jpg', 7),
(13, 'Торт Перша Цукерня Слобожанщини \"Пинчер\" 1100г', '410.00', 'Вес 1.1 кг\r\nУсловия хранения В холодильнике\r\nСтрана-производитель товара Украина', '237428905', 'pincher_cake.jpg', 9),
(14, 'Чізкейк Meal Time з манго 1.560 кг заморожений\r\n', '369.00', 'ОсобенностиБез ГМО \r\nВес 1.56 кг\r\nТип Чизкейк', '151097031', 'meal_time_cake.jpg', 9),
(15, 'Торт Перша Цукерня Слобожанщини \"Красный бархат\" 1300г\r\n', '690.00', 'Вес 1.3 кг\r\nУсловия хранения В холодильнике\r\nСтрана-производитель товара Украина', '237428839', 'red_velvet_cake.jpg', 9);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `image_name` (`image_name`),
  ADD UNIQUE KEY `vendor_code` (`vendor_code`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
