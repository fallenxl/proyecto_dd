-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-04-2023 a las 22:57:21
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ddigital`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `advertisement`
--

CREATE TABLE `advertisement` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `advertisement`
--

INSERT INTO `advertisement` (`id`, `title`, `description`, `price`, `user_id`, `category_id`) VALUES
(62, ' Manzanas rojas', 'Paquete de 12 manzanas rojas frescas de la región.', '200.00', 39, 6),
(63, 'Filete de salmón', ' Un filete de salmón fresco de 8 oz. Con piel.', '240.00', 39, 6),
(64, 'Botella de aceite de oliva', 'Botella de 500 ml de aceite de oliva virgen extra prensado en frío.', '735.00', 39, 6),
(65, 'Juego de toallas de baño', 'Juego de 4 toallas de baño de algodón egipcio suave y absorbente.', '700.00', 39, 5),
(66, 'Juego de sábanas de cama', 'uego de sábanas de algodón de 300 hilos para cama tamaño queen en color blanco.', '1240.00', 40, 5),
(67, 'Cubiertos de acero inoxidable', 'Juego de 20 piezas de cubiertos de acero inoxidable de alta calidad.', '820.00', 40, 5),
(68, ' El Gran Gatsby', ' La novela clásica de F. Scott Fitzgerald sobre la era del jazz en los años 20.', '240.00', 40, 3),
(69, ' La odisea', ' La épica griega clásica de Homero sobre el regreso de Odiseo a casa después de la Guerra de Troya.', '320.00', 40, 3),
(70, 'Los juegos del hambre', 'La exitosa serie de ciencia ficción y aventuras de Suzanne Collins sobre la lucha por la supervivencia en un futuro distópico.', '400.00', 41, 3),
(71, 'Reloj inteligente', ' Reloj inteligente con pantalla táctil y seguimiento de actividad física.', '3200.00', 41, 1),
(72, 'Gafas de sol polarizadas', ' Gafas de sol polarizadas de alta calidad con protección UV 400.', '1200.00', 41, 4),
(73, 'Bolsa de viaje', 'Bolsa de viaje de cuero genuino con correa de hombro ajustable.', '2400.00', 41, 4),
(74, 'Toyota Camry 2022', 'Automóvil sedán de tamaño mediano con un interior espacioso y un motor eficiente de 4 cilindros.', '500000.00', 41, 2),
(75, ' Bicicleta de montaña', ' Bicicleta de montaña de alta calidad con suspensión delantera y frenos de disco.', '20000.00', 41, 2),
(76, 'Patineta eléctrica', 'Patineta eléctrica de alta velocidad con motor de 500W y batería de larga duración.', '14000.00', 42, 2),
(77, 'Teléfono inteligente Samsung Galaxy S21', 'Teléfono inteligente de alta gama con pantalla AMOLED de 6.2 pulgadas, procesador Snapdragon 888 y cámara trasera de 64 MP.', '15000.00', 42, 1),
(78, ' Laptop Dell XPS 13', 'Laptop ultradelgada y liviana con procesador Intel Core i7 de 11ª generación, 16 GB de RAM y disco duro de estado sólido de 512 GB.', '30000.00', 42, 1),
(79, 'Altavoz inteligente Amazon Echo Dot', ' Altavoz inteligente con asistente de voz Alexa integrado, perfecto para controlar los dispositivos del hogar y reproducir música.', '1200.00', 42, 1),
(80, 'Bolsa de café molido', ' Bolsa de 1 libra de café molido orgánico de comercio justo.', '200.00', 42, 6),
(82, 'Cartera de cuero', ' Cartera de cuero genuino para hombres con múltiples ranuras para tarjetas y un compartimento para billetes.', '1100.00', 42, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(4, 'Accesorios'),
(6, 'Comida'),
(5, 'Hogar'),
(3, 'Libros'),
(1, 'Tecnologia'),
(2, 'Vehiculos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`) VALUES
(39, 'axl_0720@hotmail.com', 'Fallencio', 'santos'),
(40, 'santos@santos.com', 'Axl', 'santos'),
(41, 'sam@gmail.com', 'Sam', 'santos'),
(42, 'manuel@gmail.com', 'Manuel', 'santos');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `advertisement`
--
ALTER TABLE `advertisement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category` (`name`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `advertisement`
--
ALTER TABLE `advertisement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `advertisement`
--
ALTER TABLE `advertisement`
  ADD CONSTRAINT `advertisement_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `advertisement_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
