-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-11-2021 a las 03:31:35
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tpe`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `categorias` varchar(45) NOT NULL,
  `categoria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`categorias`, `categoria_id`) VALUES
('Almacen', 1),
('bebidas', 0),
('Celiacos', 3),
('Lacteos', 5),
('Panificados', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentario` int(11) NOT NULL,
  `comentario` varchar(500) NOT NULL,
  `puntuacion` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `categoria` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `producto_id` int(11) NOT NULL,
  `producto` varchar(45) NOT NULL,
  `categoria` varchar(45) NOT NULL,
  `precio` varchar(45) NOT NULL,
  `descripcion` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`producto_id`, `producto`, `categoria`, `precio`, `descripcion`) VALUES
(10, 'Leche-Sancor', 'Lacteos', '90', 'Leche abundante en calorias y grasas consumidoras fatales'),
(11, 'Yogurt-Serenisima', 'Lacteos', '105', 'Yogurt rico en cremosidad alegre'),
(12, 'Yogurt-Sancor', 'Lacteos', '95', 'Yogurt firme de buen porte en vitaminas'),
(13, 'Salsa-Noel', 'Almacen', '112', 'salsa q acompaniara tus comidas'),
(14, 'Spaghetti-Matarazzo', 'Almacen', '90', 'Faciles de cocinar y rico sabor'),
(16, 'Harina 000-Blancaflor', 'Almacen', '55', 'La harina 000 Blancaflor es ideal para hacer pizzas o masas que precisen de levadura, dado que cuenta con ungran contenido de gluten y además retienen más gas, por lo que tienen mayor estructura. La harina 0000 es la más refinada de todas porque no tiene mucho gluten y siempre se utiliza para hacer '),
(41, 'coca cola', 'bebidas', '3', 'rica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_data`
--

CREATE TABLE `users_data` (
  `user_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `rol` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users_data`
--

INSERT INTO `users_data` (`user_id`, `email`, `password`, `rol`) VALUES
(1, 'benja@gmail.com', '$2y$10$WL.y2RqiptY2gpAsGfNhUOp1w.bJIpl/CEBayL0WTpCcds9JzrMqa', 'No-admin'),
(2, 'adminB@gmail.com', '$2y$10$pAXj4EzVlUpDQSEjTcW7W.m0uRyhihwRsmFIT3zPbYmGIkSN6FmL.', 'admin'),
(3, 'lukitasroman22@gmail.com', '$2y$10$V9qdmtdjI3Zn0eg4fm21kuinv0JqC6iZoJxjW74b5UuYdVPub8boS', 'admin'),
(4, 'jorgitolopez@hotmail.com', '$2y$10$N4Czgff3c5zO4tq9AlYpWeSRr.pVy4DZn0tJ3i7w5AC/60rgrU0vW', 'No-admin'),
(8, 'aaaa@gmail.com', '$2y$10$R7WhDr/TXW1CUUQL6BkFZuJ0SC9HbBnJ4qHMcD08uCnUB52JJIM3e', ''),
(9, 'ab@gmail.com', '$2y$10$xNJfaUBaIFatudVITbVD.u3mkouW64mSvlkNY2NYwoTBkkoxj4MS.', ''),
(10, 'aaav@gmail.com', '$2y$10$GNeriCnUFAev3rgr8wMFGeVd2CQiUOVEy3Vfr3n/6m1CrpZuZs7nO', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`categorias`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`producto_id`),
  ADD KEY `categoria` (`categoria`);

--
-- Indices de la tabla `users_data`
--
ALTER TABLE `users_data`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `producto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `users_data`
--
ALTER TABLE `users_data`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users_data` (`user_id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`categoria`) REFERENCES `categorias` (`categorias`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
