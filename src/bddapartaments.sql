-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-11-2023 a las 16:12:07
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bddapartaments`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apartment`
--

CREATE TABLE `apartment` (
  `id_apartment` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `postal_address` varchar(255) NOT NULL,
  `length` decimal(10,6) DEFAULT NULL,
  `latitude` decimal(10,6) DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `square_metres` decimal(10,2) DEFAULT NULL,
  `number_rooms` int(11) DEFAULT NULL,
  `services_extra` text DEFAULT NULL,
  `price_day_low_season` decimal(10,2) DEFAULT NULL,
  `price_day_high_season` decimal(10,2) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `main_image_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `apartment`
--

INSERT INTO `apartment` (`id_apartment`, `title`, `postal_address`, `length`, `latitude`, `short_description`, `square_metres`, `number_rooms`, `services_extra`, `price_day_low_season`, `price_day_high_season`, `start_date`, `end_date`, `main_image_id`) VALUES
(1, 'Apartament 1', '123 Carrer Principal', 60.000000, 40.123400, 'Bell apartament al centre de la ciutat\n', 100.00, 2, 'Wi-Fi, Piscina', 20.00, 40.00, '2023-06-22', '2023-08-16', 1),
(2, 'Apartament 2', '456 Avinguda Secundaria', 70.000000, 40.567800, 'Ampli apartament amb vistes al mar\n', 120.00, 3, 'Wi-Fi, Aparcament\n', 30.00, 40.00, '2023-11-05', '2023-11-10', 4),
(3, 'Apartament 3', '789 Carrer Tranquil', 50.000000, 40.901200, 'Tranquil apartament a zona residencial', 80.00, 1, 'Jardí, Mascotes permeses', 45.00, 60.00, '2023-11-02', '2023-11-05', 7),
(4, 'Apartament 4', '1011 Carrer Cèntric', 80.000000, 40.345600, 'Cèntric apartament a prop de botigues i restaurants', 110.00, 2, 'Wi-Fi, Gimnàs', 25.00, 50.00, NULL, NULL, 10),
(5, 'Apartament 5', '1213 Avinguda Principal', 65.000000, 40.789000, 'Lluminós apartament amb balcó', 90.00, 2, 'Wi-Fi, Aire condicionat', 35.00, 45.00, NULL, NULL, 13),
(6, 'Apartament 6', '123 Carrer Principal', 60.000000, 40.123400, 'Bell apartament al centre de la ciutat', 100.00, 2, 'Wi-Fi, Piscina', 50.00, 60.00, NULL, NULL, 16),
(7, 'Apartament 7', '456 Avinguda Secundaria', 70.000000, 40.567800, 'Ampli apartament amb vistes al mar', 120.00, 3, 'Wi-Fi, Aparcament', 45.00, 60.00, NULL, NULL, 19),
(8, 'Apartament 8', '789 Carrer Tranquil', 50.000000, 40.901200, 'Tranquil apartament a zona residencial', 80.00, 1, 'Jardí, Mascotes permeses', 60.00, 75.00, NULL, NULL, 22),
(9, 'Apartament 9', '1011 Carrer Cèntric', 80.000000, 40.345600, 'Tranquil apartament a zona residencial', 110.00, 2, 'Wi-Fi, Gimnàs', 50.00, 60.00, NULL, NULL, 25),
(10, 'Apartament 10', '1213 Avinguda Principal', 65.000000, 40.789000, 'Lluminós apartament amb balcó', 90.00, 2, 'Wi-Fi, Aire condicionat', 40.00, 50.00, NULL, NULL, 28);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `closing_period`
--

CREATE TABLE `closing_period` (
  `id_closed` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `reason` varchar(255) NOT NULL,
  `id_apartment` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contact_requests`
--

CREATE TABLE `contact_requests` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `contact_requests`
--

INSERT INTO `contact_requests` (`id`, `name`, `email`, `message`) VALUES
(1, 'Adrián', 'adria@gmail.com', 'Hola\r\n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `img_apartments`
--

CREATE TABLE `img_apartments` (
  `id_image` int(11) NOT NULL,
  `id_apartment` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `img_apartments`
--

INSERT INTO `img_apartments` (`id_image`, `id_apartment`, `image_path`) VALUES
(1, 1, '/img/imgApartments/house.jpg'),
(2, 1, '/img/imgApartments/room1.jpg'),
(3, 1, '/img/imgApartments/room2.jpg'),
(4, 2, '/img/imgApartments/house2.jpg'),
(5, 2, '/img/imgApartments/room1.jpg'),
(6, 2, '/img/imgApartments/room3.jpg'),
(7, 3, '/img/imgApartments/house3.jpg'),
(8, 3, '/img/imgApartments/room2.jpg'),
(9, 3, '/img/imgApartments/room3.jpg'),
(10, 4, '/img/imgApartments/house4.jpg'),
(11, 4, '/img/imgApartments/room1.jpg'),
(12, 4, '/img/imgApartments/room2.jpg'),
(13, 5, '/img/imgApartments/house2.jpg'),
(14, 5, '/img/imgApartments/room3.jpg'),
(15, 5, '/img/imgApartments/room1.jpg'),
(16, 6, '/img/imgApartments/house4.jpg'),
(17, 6, '/img/imgApartments/room3.jpg'),
(18, 6, '/img/imgApartments/room2.jpg'),
(19, 7, '/img/imgApartments/house.jpg'),
(20, 7, '/img/imgApartments/room1.jpg'),
(21, 7, '/img/imgApartments/room3.jpg'),
(22, 8, '/img/imgApartments/house4.jpg'),
(23, 8, '/img/imgApartments/room2.jpg'),
(24, 8, '/img/imgApartments/room1.jpg'),
(25, 9, '/img/imgApartments/house2.jpg'),
(26, 9, '/img/imgApartments/room2.jpg'),
(27, 9, '/img/imgApartments/room1.jpg'),
(28, 10, '/img/imgApartments/house3.jpg'),
(29, 10, '/img/imgApartments/room1.jpg'),
(30, 10, '/img/imgApartments/room2.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservation`
--

CREATE TABLE `reservation` (
  `id_reserved` int(11) NOT NULL,
  `entry_date` date NOT NULL,
  `output_date` date NOT NULL,
  `state` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_apartment` int(11) DEFAULT NULL,
  `id_season` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reservation`
--

INSERT INTO `reservation` (`id_reserved`, `entry_date`, `output_date`, `state`, `price`, `id_user`, `id_apartment`, `id_season`) VALUES
(10, '2023-11-01', '2023-11-04', 'Confirmed', 0.00, 11, 1, 2),
(11, '2023-11-05', '2023-11-10', 'Pending', 1080.00, 11, 2, 2),
(12, '2023-11-02', '2023-11-04', 'Pending', 360.00, 11, 3, 2),
(13, '2023-11-01', '2023-11-04', 'Confirmed', 600.00, 11, 1, 2),
(14, '2023-11-10', '2023-11-23', 'Pending', 560.00, 11, 1, 2),
(15, '2023-03-03', '2023-04-01', 'Pending', 0.00, 11, 1, 1),
(16, '2023-04-01', '2023-04-02', 'Pending', 40.00, 11, 1, 1),
(17, '2023-03-01', '2023-03-17', 'Pending', 340.00, 11, 1, 1),
(18, '2023-06-22', '2023-08-16', 'Pending', 2240.00, 11, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_role` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_role`, `name`) VALUES
(1, 'Client'),
(2, 'Gestor'),
(3, 'Admin\r\n                         ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `season`
--

CREATE TABLE `season` (
  `id_season` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `season`
--

INSERT INTO `season` (`id_season`, `name`, `start_date`, `end_date`) VALUES
(1, 'Temporada Baixa', '2023-01-01', '2023-06-30'),
(2, 'Temporada Alta', '2023-07-01', '2023-12-31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `card_number` varchar(16) DEFAULT NULL,
  `id_role` int(11) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `name`, `last_name`, `telephone`, `email`, `card_number`, `id_role`, `password`) VALUES
(11, 'Adrián', 'Poncelas Juncarol', '987654321', 'adria@gmail.com', '123456789', 2, '1234'),
(14, 'Joel', 'Poncelas Juncarol', '987654321', 'joel@gmail.com', NULL, 3, '1234'),
(15, 'Roman', 'Mysyura', '123456789', 'rmysyura@cendrassos.net', NULL, 3, '1234');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `apartment`
--
ALTER TABLE `apartment`
  ADD PRIMARY KEY (`id_apartment`),
  ADD KEY `main_image_id` (`main_image_id`);

--
-- Indices de la tabla `closing_period`
--
ALTER TABLE `closing_period`
  ADD PRIMARY KEY (`id_closed`),
  ADD KEY `FK_ClosingPeriod_Apartment` (`id_apartment`);

--
-- Indices de la tabla `contact_requests`
--
ALTER TABLE `contact_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `img_apartments`
--
ALTER TABLE `img_apartments`
  ADD PRIMARY KEY (`id_image`),
  ADD KEY `id_apartment` (`id_apartment`);

--
-- Indices de la tabla `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id_reserved`),
  ADD KEY `FK_Reservation_User` (`id_user`),
  ADD KEY `FK_Reservation_Apartment` (`id_apartment`),
  ADD KEY `FK_Reservation_Season` (`id_season`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`);

--
-- Indices de la tabla `season`
--
ALTER TABLE `season`
  ADD PRIMARY KEY (`id_season`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `FK_User_Roles` (`id_role`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `apartment`
--
ALTER TABLE `apartment`
  MODIFY `id_apartment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `closing_period`
--
ALTER TABLE `closing_period`
  MODIFY `id_closed` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contact_requests`
--
ALTER TABLE `contact_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `img_apartments`
--
ALTER TABLE `img_apartments`
  MODIFY `id_image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id_reserved` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `season`
--
ALTER TABLE `season`
  MODIFY `id_season` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `apartment`
--
ALTER TABLE `apartment`
  ADD CONSTRAINT `apartment_ibfk_1` FOREIGN KEY (`main_image_id`) REFERENCES `img_apartments` (`id_image`);

--
-- Filtros para la tabla `closing_period`
--
ALTER TABLE `closing_period`
  ADD CONSTRAINT `FK_ClosingPeriod_Apartment` FOREIGN KEY (`id_apartment`) REFERENCES `apartment` (`id_apartment`),
  ADD CONSTRAINT `closing_period_ibfk_1` FOREIGN KEY (`id_apartment`) REFERENCES `apartment` (`id_apartment`);

--
-- Filtros para la tabla `img_apartments`
--
ALTER TABLE `img_apartments`
  ADD CONSTRAINT `img_apartments_ibfk_1` FOREIGN KEY (`id_apartment`) REFERENCES `apartment` (`id_apartment`);

--
-- Filtros para la tabla `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `FK_Reservation_Apartment` FOREIGN KEY (`id_apartment`) REFERENCES `apartment` (`id_apartment`),
  ADD CONSTRAINT `FK_Reservation_Season` FOREIGN KEY (`id_season`) REFERENCES `season` (`id_season`),
  ADD CONSTRAINT `FK_Reservation_User` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`id_apartment`) REFERENCES `apartment` (`id_apartment`),
  ADD CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`id_season`) REFERENCES `season` (`id_season`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_User_Roles` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id_role`),
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
