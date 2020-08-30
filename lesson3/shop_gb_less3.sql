-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 30 2020 г., 19:05
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
-- База данных: `shop_gb_less3`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sort_order` mediumint(8) UNSIGNED NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `sort_order`, `status`) VALUES
(1, 'Пылесосы', 1, 1),
(2, 'Роботы-пылесосы', 2, 1),
(3, 'Холодильники', 3, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `price` float UNSIGNED NOT NULL,
  `availability` tinyint(3) UNSIGNED NOT NULL,
  `brand` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `is_new` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `is_recommended` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name`, `category_id`, `code`, `price`, `availability`, `brand`, `image`, `description`, `is_new`, `is_recommended`, `status`) VALUES
(1, 'Робот-пылесос Mi Robot Vacuum-Mop SKV4093GL', 2, 56576, 18990, 1, 'Mi', 'product1.jpg', 'Робот-пылесос Mi Robot Vacuum-Mop SKV4093GL способен очистить квартиру площадью до 180 квадратных метров на одном заряде аккумулятора. Высокая мощность позволяет ему собирать мусор даже на коврах с коротким ворсом и на рельефных поверхностях с глубокими щелями. \r\n\r\nИНТЕЛЛЕКТУАЛЬНАЯ СИСТЕМА НАВИГАЦИИ\r\nЛазерный сенсор строит карту помещения при включении. Благодаря этому робот выбирает оптимальный маршрут движения, ускоряя процесс уборки и предотвращая столкновения с мебелью. \r\n\r\nМАКСИМАЛЬНО УДОБНО\r\nЗапустив мобильное приложение, вы можете направить пылесос в определённое место или ограничить его передвижение по дому. Оно также позволяет составить расписание, выбрав оптимальное время для включения устройства в каждый день недели.\r\n\r\nДВА В ОДНОМ\r\nНаполните резервуар и закрепите снизу мягкую тряпочку, чтобы активировать функцию влажной уборки. Насос с электронным управлением медленно подаёт воду, не оставляя капель на паркете и других чувствительных покрытиях. ', 0, 0, 1),
(2, 'Робот-пылесос Tefal Explorer Serie 20 RG6871WH', 2, 44443, 14990, 1, 'Tefal', 'img2.jpg', 'Робот-пылесос Tefal Explorer Serie 20 RG6871WH возьмёт на себя ежедневную уборку. Его можно запрограммировать на выполнение задач каждый день с помощью таймера. По приходу с работы или прогулки дома вас будет встречать чистота.\r\n\r\nУНИВЕРСАЛЬНЫЙ\r\nПрибор легко очищает от пыли и грязи ламинат, линолеум, ковры, паласы и другие покрытия, выполняет сухую и влажную уборку, умеет двигаться зигзагом, вдоль стены и хаотично. Вы сможете выбрать нужный режим, чтобы добиться максимального порядка. Пылесос ориентируется в пространстве с помощью инфракрасного луча и определяет препятствия и ступеньки. \r\n\r\nДОЛГО И НЕЗАМЕТНО\r\nПылесос работает от литий-ионного аккумулятора. Полного заряда батареи хватает на 2,5 часа непрерывной чистки полов. В комплекте есть база, на которой робот восстанавливает энергию от обычной электросети. Во время движения прибор почти не шумит. Благодаря компактным размерам (высота всего 8 см) он может забираться даже под мебель.', 1, 1, 1),
(3, 'Робот-пылесос Tefal Smart Force Explorer RG6825WH\r\n', 2, 43124, 10990, 1, 'Tefal', 'img3.jpg', 'Робот-пылесос Tefal Smart Force Explorer RG6825WH очистит любые твёрдые полы. Его боковые щётки выметут мусор из углов и других труднодоступных мест, а центральная соберёт грязь во вместительный контейнер. После окончания работы вам останется только вытряхнуть и слегка ополоснуть ёмкость. \r\n\r\nУЛУЧШЕННАЯ НАВИГАЦИЯ\r\nМногочисленные датчики позволяют устройству выбирать оптимальный маршрут движения в каждой комнате. Робот аккуратно объезжает препятствия и останавливается перед ступеньками. Вы можете выбирать три режима движения: от углов, в произвольном порядке или интенсивную очистку отдельной зоны. \r\n\r\nВПЕЧАТЛЯЮЩАЯ ВЫНОСЛИВОСТЬ\r\nПылесос справится с уборкой трёхкомнатной квартиры – его аккумулятор рассчитан на два с половиной часа непрерывной работы. \r\n\r\nУДОБНОЕ УПРАВЛЕНИЕ\r\nПульт с ЖК-дисплеем поможет безошибочно выбрать подходящий режим уборки и создать расписание на каждый день недели. ', 0, 0, 1),
(4, 'Робот-пылесос Philips FC8796/01', 2, 78555, 11990, 1, 'Philips', 'img4.jpg', 'Устали постоянно ходить по квартире с пылесосом и шваброй? А если в доме есть аллергики, то делать это приходится часто! Робот-пылесос Philips FC8796/01 сильно сэкономит ваше время и силы. Этот малыш подойдёт даже для мытья полов, а вам останется только периодически делать большую уборку, не занимаясь рутинным поддержанием чистоты.\r\n\r\nПОЛНОЦЕННАЯ УБОРКА\r\nДевайс наведёт чистоту в вашем доме в три приёма. Длинные боковые щётки выметут пыль и небольшой сор даже из углов, мощный мотор всосёт грязь внутрь. А влажная насадка из микрофибры завершит уборку, протерев полы. И всё это за один проход пылесоса!\r\n\r\n«УМНАЯ» ТРАЕКТОРИЯ\r\n23 сенсора и встроенный акселерометр помогают пылесосу выбрать оптимальную траекторию движения. Вам не придётся постоянно возвращать на свободное место застрявший прибор. Режим движения выбирается автоматически в зависимости от помещения.\r\n\r\nКОМПАКТНОСТЬ\r\nКорпус пылесоса толщиной всего 5,8 см отлично подходит для уборки под мебелью. Ни одного пропущенного участка!\r\n\r\nПРОСТОЙ УХОД\r\nВытряхивайте контейнер, не прикасаясь к загрязнённым частям. Эргономичная конструкция пылесоса позволяет это делать легко и быстро.', 0, 1, 1),
(5, 'Робот-пылесос LG CordZero VR6670LVMP', 2, 878787, 29990, 1, 'LG', 'img5.jpg', 'Робот-пылесос LG CordZero VR6670LVMP будет экономить ваше время и силы, взяв на себя ежедневное поддержание чистоты. Прибором можно управлять как с сенсорной панели, расположенной на корпусе, так и по Wi-Fi, установив на смартфон приложение SmartThinQ.\r\n\r\nНИЧЕГО НЕ ПРОПУСТИТ \r\nМусор собирается в контейнер объёмом 0,6 литра, обычно этого достаточно для уборки двух-трёхкомнатной квартиры. Резервуар легко вынимается для очистки. Благодаря квадратной форме и щёточкам увеличенной длины (7 см) эта модель тщательно собирает пыль даже в труднодоступных местах: в углах, вокруг мебельных ножек, вдоль стен. В комплект входит насадка из микрофибры, предназначенная для протирки полов.\r\n\r\nУВЕРЕННАЯ НАВИГАЦИЯ\r\nОриентироваться в пространстве, контролировать пройдённый маршрут и «видеть» в тёмном помещении прибору помогает камера II-Slam. Многочисленные датчики и ультразвуковые сенсоры отвечают за отслеживание изменения рельефа поверхности, защищают от падения с высоты, позволяют распознавать даже стеклянные элементы интерьера и предотвращают столкновения. \r\n\r\nДЕЙСТВУЕТ ПО СИТУАЦИИ\r\nПоддерживается несколько режимов движения: «Зигзаг», «Клетка за клеткой», «Пятно», «Моё место». Вы сможете подобрать оптимальный вариант в зависимости от количества препятствий в помещении и серьёзности загрязнения. В особенно сложных случаях поможет режим «Турбо» (увеличенная мощность всасывания). Пылесос эффективно очищает как гладкие покрытия, так и ворсовые (высотой до 1,5 см). Он сам определяет смену типа покрытия и автоматически переключается в режим «Смарт Турбо», разработанный специально для тщательной обработки ковров.\r\n\r\nХОРОШО ПРИДУМАНО \r\nРобот-пылесос LG CordZero VR6670LVMP оснащён литий-ионным аккумулятором ёмкостью 2200 мАч. Батарея полностью восполняет свой ресурс за три часа, причём прибор сам становится на зарядное устройство. ', 0, 0, 1),
(6, 'Робот-пылесос iRobot Roomba e5', 1, 90998, 24990, 1, 'iRobot', 'img6.jpg', 'Робот-пылесос iRobot Roomba e5 возьмёт на себя ежедневное поддержание порядка в вашем доме. Благодаря современной вакуумной системе прибор всасывает и крупный, и мелкий мусор, эффективно чистит не только гладкие покрытия, но и ковры с густым ворсом (высотой до 2 см).\r\n\r\nБЕЗОПАСНЫЙ МАРШРУТ\r\nВстроенная система навигации помогает устройству ориентироваться в пространстве. Оно не упадёт со ступеней, будет аккуратно обходить мебель и другие препятствия, не задевая и не повреждая их. Технология Dirt Detect позволяет аппарату распознавать сильно загрязнённые места и очищать их особенно тщательно.\r\n\r\nНИЧЕГО НЕ ПРОПУСТИТ\r\nРобот собирает пыль при помощи двух резиновых валиков с рельефной поверхностью и боковой щётки, которая захватывает пыль из углов и пространства вдоль стен. Контейнер-мусоросборник снимается, так что вы легко его очистите. При необходимости ёмкость можно помыть.\r\n\r\nУДОБНОЕ РЕШЕНИЕ\r\nИспользуйте в качестве пульта дистанционного управления ваш смартфон (совместимы мобильные устройства на ОС Android и iOS). Это возможно благодаря поддержке Wi-Fi. Установите на телефон приложение iRobot Home и запускайте уборку, даже не находясь дома. К вашему возвращению с работы будет порядок! ', 0, 1, 1),
(7, 'Холодильник LG DoorCooling+ GA-B459SEQZ', 3, 60004, 36990, 1, 'LG', 'product7.jpg', 'С холодильником LG DoorCooling+ GA-B459SEQZ вы сможете легко сделать много запасов на зиму и сохранить свежесть продуктов надолго. Благодаря стильному дизайну прибор удачно впишется в интерьер вашей кухни и станет его гармоничным дополнением.\r\n\r\nКАК С ГРЯДКИ\r\nМоментальное равномерное охлаждение и технология Linear Cooling, предотвращающая колебания температур, помогут продлить свежесть овощей и фруктов максимально долго. С быстрой заморозкой, при которой внутри продуктов не успевают появляться крупные кристаллы льда, вы сможете сохранить максимум полезных веществ и витаминов.\r\n\r\nНЕ ДЕРЖИТЕ В ГОЛОВЕ\r\nВаша жизнь станет проще с функцией No Frost, которая избавит вас от необходимости периодической разморозки холодильника. С помощью принудительного обдува холодным воздухом в камерах не будет образовываться наледь. \r\n\r\nЭКОНОМИЯ И СПОКОЙСТВИЕ\r\nВместо стандартных ламп накаливания в приборе установлена экономичная LED-подсветка. Линейный инверторный компрессор отличается низким уровнем шума в сравнении с другими моделями и потребляет меньше энергии.\r\n\r\nБОЛЬШЕ ПРЕИМУЩЕСТВ\r\nОбщий полезный объём холодильника составляет 374 л, из которых целых 247 приходятся на холодильный отсек. Управляйте прибором наглядно с помощью LED-дисплея. Кроме того, установив на свой смартфон приложение LG SmartThinQ, вы сможете задать нужное значение температуры, даже находясь на работе или по пути к дому. ', 0, 1, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;