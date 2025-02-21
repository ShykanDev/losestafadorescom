-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-10-2020 a las 22:54:41
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `losestafadores`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(255) NOT NULL,
  `usuario_id` int(255) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `usuario_id`, `nombre`) VALUES
(13, 10, 'Recomiendo'),
(14, 11, 'No recomiendo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradas`
--

CREATE TABLE `entradas` (
  `id` int(255) NOT NULL,
  `usuario_id` int(255) NOT NULL,
  `categoria_id` int(255) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `fecha_estafa` varchar(255) NOT NULL,
  `direccion_estafa` varchar(255) NOT NULL,
  `tipo_estafa` varchar(255) NOT NULL,
  `other_estafa` varchar(255) DEFAULT NULL,
  `medio_estafa` varchar(255) NOT NULL,
  `demanda` varchar(255) NOT NULL,
  `descripcion` varchar(9999) NOT NULL,
  `producto` varchar(255) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `entradas`
--

INSERT INTO `entradas` (`id`, `usuario_id`, `categoria_id`, `titulo`, `fecha_estafa`, `direccion_estafa`, `tipo_estafa`, `other_estafa`, `medio_estafa`, `demanda`, `descripcion`, `producto`, `imagen`, `fecha`) VALUES
(144, 37, 14, 'Jose Sanchez', '2020-11', 'Lomas Bonitas CDMX', 'Inmuebles', 'Renta', 'Redes Sociales', 'No se realizo proceso legal', 'Conocí a José y su departamento en renta por Facebook, esta persona es un fraude, engaña a la gente diciendo que renta un departamento en Lomas, pide el enganche y por la situación de la pandemia abusa, diciendo que enviará un contrato y esta ya debe ir f', 'Evdencia', 'archivo/blog3.jpg', '2020-10-05'),
(145, 37, 14, 'USB que venden en el metro', '2020-01', 'Metro Indios Verdes', '>Producto', 'USB', 'Venta ambulante', 'No se realizo proceso legal', 'No compren memorias USB del metro. Le compre a un señor una memoria de 64BG por urgencia  del trabajo, honestamente el precio si me sorprendió porque costaba solo 120 pesos de marca D-Link (ya sabía que algo iba a salir mal, pero me arriesgue).\r\n\r\nLlegand', 'Evidencia', 'archivo/usb-chafa.jpg', '2020-10-06'),
(146, 37, 14, 'Leche Nutri Leche', '2020-11', 'General', '>Producto', '', 'Medios Publicitarios', 'No se realizo proceso legal', 'Hace dos semanas visualice una noticia el cual es oficial por la PROFECO, donde menciona que la \"leche\" marca Nutri Leche no es 100% leche de vaca. \r\n\r\nEs un horror que empresas realicen estafas y engañen a la gente solo para vender sus productos mediocres. \r\n\r\n', 'Imagen', 'archivo/nutrileche.jpg', '2020-10-06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradass`
--

CREATE TABLE `entradass` (
  `id` int(11) NOT NULL,
  `respuesta_id` int(255) NOT NULL,
  `confirmar_id` int(255) NOT NULL,
  `usuario_id` int(255) NOT NULL,
  `categoria_id` int(255) DEFAULT NULL,
  `titulo` varchar(255) CHARACTER SET utf8 NOT NULL,
  `descripcion` varchar(255) CHARACTER SET utf8 NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `entradass`
--

INSERT INTO `entradass` (`id`, `respuesta_id`, `confirmar_id`, `usuario_id`, `categoria_id`, `titulo`, `descripcion`, `fecha`) VALUES
(12, 97, 97, 37, 0, ' Xochitl', 'Prueba', '2020-08-11'),
(13, 97, 97, 37, 0, ' Xochitl', 'Prueba2', '2020-08-11'),
(14, 98, 98, 37, 0, ' Saul Soza', 'Prueba', '2020-08-12'),
(15, 98, 98, 37, 0, ' Saul Soza', 'Prueba2', '2020-08-12'),
(16, 98, 98, 37, 0, ' Saul Soza', 'Prueba2', '2020-08-12'),
(17, 98, 98, 37, 0, ' Saul Soza', 'Prueba2', '2020-08-12'),
(18, 98, 98, 37, 0, ' Saul Soza', 'fveverv', '2020-08-12'),
(19, 98, 98, 37, 0, ' Saul Soza', 'fwrefwerfwrf', '2020-08-12'),
(20, 98, 98, 37, 0, ' Saul Soza', 'dwefwef', '2020-08-12'),
(21, 98, 98, 37, 0, ' Saul Soza', '334f2fwefwef', '2020-08-12'),
(22, 98, 98, 37, 0, ' Saul Soza', 'efevearvaervaervv', '2020-08-12'),
(23, 98, 98, 37, 0, ' Saul Soza', 'wedwefe', '2020-08-12'),
(24, 106, 106, 37, 0, ' Teresa Montiel', 'Conozco a la trabajador y es muy buena', '2020-08-31'),
(25, 108, 108, 37, 0, ' Eduardo Robles', 'we', '2020-09-02'),
(26, 108, 108, 37, 0, ' Eduardo Robles', 'uo', '2020-09-02'),
(27, 108, 108, 37, 0, ' Eduardo Robles', 'ascasdcac', '2020-09-02'),
(28, 108, 108, 37, 0, ' Eduardo Robles', 'ascasdcaccqwec', '2020-09-02'),
(29, 109, 109, 37, 0, ' Sasha Neger', 'Muy buen perrito', '2020-09-08'),
(30, 17, 17, 37, 0, ' Saul', 'htbtbytb', '2020-09-11'),
(31, 17, 17, 37, 0, ' Saul', 'feferferf', '2020-09-11'),
(32, 17, 17, 37, 0, ' Saul', 'saulresponde', '2020-09-11'),
(33, 17, 17, 37, 0, ' Saul', 'saulresponde2', '2020-09-11'),
(34, 17, 17, 37, 0, ' Saul', 'saulresponde3', '2020-09-11'),
(35, 143, 143, 37, 0, ' Sal de Uva', 'Prueba', '2020-10-05'),
(36, 143, 143, 37, 0, ' Sal de Uva', 'Prueba2', '2020-10-05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(255) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `pais` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `pais`, `tipo`, `email`, `password`, `fecha`) VALUES
(37, 'Jorge', 'Alberto', 'mexico', 'Empleador', 'jorge@mail.com', '$2y$04$8ODGBe9f1cb9kgbCdpEf6ePUzStX039jkTpn1HASJm1J08dZxTbEq', '2020-08-07'),
(38, 'Alejandra', 'Cortes', 'mexico', 'Empleador', 'ale@mail.com', '$2y$04$SarZPkJhzLOKxBxnHDqmueD2h3A/2KFQHYrYqreBYQq4rV/KLXRrK', '2020-09-07'),
(40, 'Juan', 'Baruch', 'mexico', 'Empleado', 'juan@mail.com', '$2y$04$3EVUuMJJtITQVI/sKFpq6ePddYDlOS41BAJTyLnIT5pfNSuGo3HOq', '2020-09-07'),
(41, 'Lupita', 'Gonzalez', 'mexico', 'Empleador', 'lupe@mail.com', '$2y$04$CdHZNLTpudPL7Paga35TaOCc.CtIWJZL6wAYSRyT4u6c4M9I2JD0e', '2020-09-07'),
(42, 'Mariana', 'Lugo', 'mexico', 'Empleador', 'mariana@mail.com', '$2y$04$LwZ9FAsPHY/B/hddoi947uaQFKX6Yy6m4O1q3qlnxH48PSlZbiOYi', '2020-09-07'),
(43, 'Itzel', 'Mandujano', 'mexico', 'Empleador', 'itzel@mail.com', '$2y$04$SjVeI7qrfebk.F8WUHVeF.fVI/obSDWfPE4cekhxdq5Y171wxP30O', '2020-09-07'),
(44, 'Laura', 'Vaca', 'mexico', 'Empleador', 'laura@mail.com', '$2y$04$TtrvlSh2INCF5MSzIPssFOVKSXl/lcc3fwsqchNIsUj/wTtNO1vni', '2020-09-07'),
(45, 'David', 'García', 'mexico', 'Empleado', 'david@mail.com', '$2y$04$Tz9/mMRGkmNusvLRmX2vjeoQ9zjd353O62zmWqEjFKwH.A4Olkcla', '2020-09-09'),
(46, 'Jimena', 'Sarahí', 'mexico', 'Empleado', 'jimena@mail.com', '$2y$04$KyJv0ifzRyGa5REVMh6Bn.6tX40jyUM.cpMHEEdtiIWooApOKr6Re', '2020-09-09'),
(47, 'Mayra', 'Cassandra', 'mexico', 'Empleador', 'mayra@mail.com', '$2y$04$qhuKsCB0YBQnH7DkbExs8ePSPa/JpWH770mvsHxNow.q0UUGWPKQe', '2020-09-09'),
(48, 'Josefina', 'Ortiz', 'rep-dominicana', 'Empleado', 'josefina@mail.com', '$2y$04$qQ/iU.b7JZ2f3Ii/NgvN9.A.ed6uuhjNsfWw7dXBqAhhBN4GeW20K', '2020-09-30'),
(49, 'aaa', 'aaa', 'peru', 'Empleador', 'aaa@mail.com', '$2y$04$ULRaOwj/oDiRe0vZVT7.PO5mXhZYW/n7QSjntiKDOAOPzrFNft0wq', '2020-09-30'),
(50, 'bbb', 'bbb', 'uruguay', 'Empleador', 'bbb@mail.com', '$2y$04$OBuoiYQuUUkGOqGRnhWateFqF8ADmg9D.HS/NrB2QXyxqRrylsiBe', '2020-09-30'),
(51, 'ccc', 'ccc', 'uruguay', 'Empleador', 'ccc@mail.com', '$2y$04$bdixTcsTRtsAmyURTUGpg.O5mrIQgIuBYcqKAd3NlpuXZ4EVCB6pu', '2020-09-30'),
(52, 'ddd', 'ddd', 'uruguay', 'Empleador', 'ddd@mail.com', '$2y$04$LOfheZ6pdpOwPqyrvDN4NOQCVoJCXF6qh7IOAU5qpICftL.onyaX6', '2020-09-30'),
(54, 'Aldair', 'Erazo', 'rep-dominicana', 'Empleador', 'aldair@mail.com', '$2y$04$n7PNwyYtu0W/K0RcAZOlbeyonIs0Q56zuBO.iQ0WS/QE8qWEBO2M.', '2020-10-02');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_entrada_usuario` (`usuario_id`),
  ADD KEY `fk_entrada_categoria` (`categoria_id`);

--
-- Indices de la tabla `entradass`
--
ALTER TABLE `entradass`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `entradas`
--
ALTER TABLE `entradas`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT de la tabla `entradass`
--
ALTER TABLE `entradass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD CONSTRAINT `fk_entrada_categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `fk_entrada_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
