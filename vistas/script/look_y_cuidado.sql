-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3307
-- Tiempo de generación: 20-03-2026 a las 16:35:48
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `look_y_cuidado`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias` (
  `IdCat` int(11) NOT NULL,
  `categoria` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`IdCat`, `categoria`, `fecha`) VALUES
(0, 'Peluche', '2024-09-20 01:41:56'),
(1, 'Juguetería', '2022-06-27 20:31:05'),
(2, 'Hogar', '2022-06-27 20:32:43'),
(3, 'Salud', '2022-06-27 20:32:50'),
(4, 'Arenas', '2022-06-28 17:17:21'),
(5, 'Viajes', '2022-06-28 23:30:36'),
(6, 'Comida', '2022-07-31 20:54:41'),
(21, 'Belleza', '2022-08-07 13:57:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes` (
  `IdCliente` int(11) NOT NULL,
  `Nombre` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Documento` int(11) NOT NULL,
  `email` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Telefono` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Direccion` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Fecha_nacimiento` date NOT NULL,
  `Ultima_compra` datetime NOT NULL,
  `Compras` int(11) NOT NULL,
  `Fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`IdCliente`, `Nombre`, `Documento`, `email`, `Telefono`, `Direccion`, `Fecha_nacimiento`, `Ultima_compra`, `Compras`, `Fecha`) VALUES
(10, 'Carlos', 5455887, 'carlos@gmail.com', '(313) 565-4786', 'calle 2 # 35-23', '1990-03-23', '2025-02-05 16:20:19', 4, '2025-02-05 21:21:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos` (
  `IdProduc` int(11) NOT NULL,
  `IdCat` int(11) NOT NULL,
  `Codigo` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Descripcion` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Imagen` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Stock` int(11) NOT NULL,
  `PrecioCompra` float NOT NULL,
  `PrecioVenta` float NOT NULL,
  `Ventas` int(11) NOT NULL,
  `Fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`IdProduc`, `IdCat`, `Codigo`, `Descripcion`, `Imagen`, `Stock`, `PrecioCompra`, `PrecioVenta`, `Ventas`, `Fecha`) VALUES
(1, 1, '101', 'Rascadera Beige con Forma de Gato.', 'vistas/img/productos/101/895.png', 33, 56000, 78400, 10, '2023-05-06 22:53:27'),
(2, 1, '102', 'Pelota rellenable para gatos 2 Unds', 'vistas/img/productos/102/365.png', 17, 8392, 13986, 3, '2023-04-24 19:34:14'),
(4, 1, '104', 'Trixie Gimnasio para gato Poste Felicitas Alt 190 cm Café 47001', 'vistas/img/productos/104/141.png', 32, 1418180, 1985440, 3, '2023-05-17 13:27:08'),
(5, 1, '105', 'Juguete de zorro en peluche para gatos incluye catnip.', 'vistas/img/productos/monello.jpeg', 15, 17107, 28511, 0, '2023-05-06 22:52:50'),
(6, 1, '106', 'GoodBite Juguete Masticable Perros.', 'vistas/img/productos/monello.jpeg', 99, 17168, 28613, 1, '2023-05-06 22:52:53'),
(7, 1, '107', 'Juguete Yo-Yo para lanzar 5 cm para perros Pet-7486FS', 'vistas/img/productos/monello.jpeg', 0, 7919, 13199, 3, '2023-05-08 21:49:36'),
(8, 1, '108', 'Juguete Frisbee 17.5 cm para perros Pet-7407FS', 'vistas/img/productos/monello.jpeg', 100, 19499, 32498, 0, '2023-05-06 22:51:23'),
(9, 1, '109', 'Hueso con sonido pequeño para perros', 'vistas/img/productos/109/835.jpg', 60, 7000, 9800, 2, '2023-05-06 22:58:19'),
(10, 1, '110', 'Juguete Tri-Bumper Perros Talla M', 'vistas/img/productos/monello.jpeg', 100, 34105, 56841, 0, '2023-05-06 22:51:13'),
(11, 2, '201', 'Barrera de Protección para Perro Gato', 'vistas/img/productos/monello.jpeg', 29, 288864, 481440, 1, '2023-04-25 22:26:54'),
(12, 2, '202', 'Rascadera Cartón Fat Cat Big Mamas 610241', 'vistas/img/productos/monello.jpeg', 40, 30996, 51660, 0, '2023-05-17 13:27:23'),
(13, 2, '203', 'Trixie Gimnasio para gato Mica Alt 46 cm Gris Claro 44418', 'vistas/img/productos/monello.jpeg', 20, 91974, 153290, 0, '2022-08-06 15:46:45'),
(14, 2, '204', 'Cama Gato Cueva Malu 47x41x27 cm Café 36356', 'vistas/img/productos/monello.jpeg', 20, 96815, 161359, 0, '2022-08-06 15:46:45'),
(15, 2, '205', 'Cama Rogz para gato Oslo Igloo color Azul Oscuro y Gris CPOI/M-P', 'vistas/img/productos/monello.jpeg', 10, 141465, 235775, 0, '2022-08-06 15:46:45'),
(16, 2, '206', 'Cojín 3D Perro Snoozy Friendz Koala 7261', 'vistas/img/productos/monello.jpeg', 30, 78091, 130151, 0, '2022-08-06 15:46:45'),
(17, 2, '207', 'Fuente de Agua para Mascotas. Deluxe Fresh', 'vistas/img/productos/monello.jpeg', 30, 92569, 154282, 0, '2022-08-06 15:46:45'),
(18, 2, '208', 'Comedero Antideslizante 735 Ml Azul Oscuro', 'vistas/img/productos/monello.jpeg', 50, 8035, 13391, 0, '2022-08-06 15:46:45'),
(19, 2, '209', 'Cuchara Medidora de Comida para Perro Talla L', 'vistas/img/productos/monello.jpeg', 100, 6863, 11438, 0, '2022-08-06 15:46:45'),
(20, 2, '210', 'Bebedero Fuente fresh flow Rain Fountai 2.2 Lt', 'vistas/img/productos/monello.jpeg', 20, 111530, 185883, 0, '2022-08-06 15:46:45'),
(21, 3, '301', 'Antiparasitario Drontal para gatos.', 'vistas/img/productos/monello.jpeg', 0, 11549, 19249, 6, '2023-05-13 21:11:52'),
(22, 3, '302', 'Advocate Antiparasitario para gatos (hasta 8 Kg)', 'vistas/img/productos/monello.jpeg', 100, 22177, 36962, 0, '2022-08-06 15:46:45'),
(23, 3, '303', 'Advocate Antiparasitario para gatos (hasta 4 Kg)', 'vistas/img/productos/monello.jpeg', 100, 20429, 34048, 0, '2022-08-06 15:46:45'),
(24, 3, '304', 'Revolution Plus en Caja 3 Tubos por 0.5 ml para gatos (Hasta 2.5 - 5 Kg)', 'vistas/img/productos/monello.jpeg', 100, 80558, 134264, 0, '2022-08-06 15:46:45'),
(25, 3, '305', 'Fiprostar Antiparasitario para Gatos.', 'vistas/img/productos/monello.jpeg', 100, 7358, 12264, 0, '2022-08-06 15:46:45'),
(26, 3, '306', 'Artri-Vet Suplemento Alimenticio para Perros y Gatos x 60 tabletas', 'vistas/img/productos/monello.jpeg', 99, 46612, 77687, 1, '2023-05-06 23:00:27'),
(27, 3, '307', 'Mirrapel Suplemento Nutricional para Perros y Gatos Polvo 300g', 'vistas/img/productos/monello.jpeg', 200, 14317, 23862, 0, '2023-05-17 13:27:17'),
(28, 3, '308', 'NutraForz DigestForz. Suplemento Perros y Gatos. 30 Tabletas.', 'vistas/img/productos/monello.jpeg', 200, 37315, 62192, 0, '2023-05-17 13:27:17'),
(29, 3, '309', 'Lactovet C Suplemento alimenticio Perros y Gatos. 750 g.', 'vistas/img/productos/monello.jpeg', 0, 28550, 47583, 2, '2023-05-08 21:49:36'),
(30, 3, '310', 'Suplemento Vitaminico Perritos Enzimas Digestivas + Probioticos por 60 tabletas', 'vistas/img/productos/monello.jpeg', 200, 35561, 59269, 0, '2023-05-17 13:27:17'),
(31, 4, '401', 'Arena Fresh Step para Gatos con Frebeze por 14 Lb', 'vistas/img/productos/monello.jpeg', 20, 28739, 47899, 0, '2022-08-06 15:46:45'),
(32, 4, '402', 'Arena Mirringo para gatos por 10 Kg', 'vistas/img/productos/monello.jpeg', 30, 36061, 60102, 0, '2022-08-06 15:46:45'),
(33, 4, '403', 'Purina Arena tidy cats scoopable bolsa 9 kg', 'vistas/img/productos/monello.jpeg', 30, 34400, 57334, 0, '2023-05-13 23:18:45'),
(34, 4, '404', 'Arena para Gatos. Foficat. Manzana. 10 Kg.', 'vistas/img/productos/monello.jpeg', 30, 32000, 53333, 0, '2022-08-06 15:46:45'),
(35, 4, '405', 'OdourLock Arena para gatos por 12 Kg Aroma a Lavanda', 'vistas/img/productos/monello.jpeg', 30, 59339, 98899, 0, '2023-05-13 23:18:45'),
(36, 4, '406', 'Canada litter arena 18 kg', 'vistas/img/productos/monello.jpeg', 29, 72299, 120499, 1, '2023-04-22 22:52:45'),
(37, 4, '407', 'Arena Michiko 5 Kg', 'vistas/img/productos/monello.jpeg', 30, 14666, 24444, 0, '2022-08-06 15:46:45'),
(38, 4, '408', 'Arena para Gato. Freemiau. 4.5 Kg.', 'vistas/img/productos/monello.jpeg', 49, 20170, 33617, 1, '2023-04-22 22:52:45'),
(39, 4, '409', 'Comfort Kat Arena para Gatos 4 Kg', 'vistas/img/productos/monello.jpeg', 50, 16835, 28058, 0, '2022-08-06 15:46:45'),
(40, 4, '410', 'Tidy Cats Arena para Gatos. Instant Action. 6.3 Kg.', 'vistas/img/productos/monello.jpeg', 49, 38626, 64377, 1, '2023-04-22 22:52:45'),
(41, 5, '501', 'Guacal Puerta Metal 48.6 L Fucsia T101', 'vistas/img/productos/monello.jpeg', 10, 56605, 94341, 0, '2022-08-06 15:46:45'),
(42, 5, '502', 'Atlas Guacal Mascotas. 10 EL.', 'vistas/img/productos/monello.jpeg', 10, 52016, 86694, 0, '2022-08-06 15:46:45'),
(43, 5, '503', 'Guacal Mascotas Vari Kennel. Talla M.', 'vistas/img/productos/monello.jpeg', 9, 211373, 352288, 1, '2023-05-06 23:00:58'),
(44, 5, '504', 'Maletín para mascotas Bijoux 82296099', 'vistas/img/productos/monello.jpeg', 28, 64798, 107997, 2, '2023-05-06 23:00:58'),
(45, 5, '505', 'MALETIN KANGOO S/M 37X16X36,5A GRIS 85748121', 'vistas/img/productos/monello.jpeg', 28, 108288, 180480, 2, '2023-05-06 23:00:58'),
(46, 5, '506', 'GUACAL CARRIER JET 10 73043099', 'vistas/img/productos/monello.jpeg', 29, 43946, 73243, 1, '2023-04-22 22:50:23'),
(47, 5, '507', 'Guacal Skudo Talla S 40x39x60 Cm', 'vistas/img/productos/monello.jpeg', 10, 121604, 202674, 0, '2022-08-06 15:46:45'),
(48, 5, '508', 'Adaptil Calmante en Spray para perros 60ml', 'vistas/img/productos/monello.jpeg', 50, 46088, 76814, 0, '2022-08-06 15:46:45'),
(49, 5, '509', 'Cargador Mascota Alea 30x20x16 cm Azul Petrol 28858', 'vistas/img/productos/monello.jpeg', 30, 56903, 94838, 0, '2022-08-06 15:46:45'),
(50, 5, '510', 'Arnes de Seguridad para Carro XS 20-50cm/15mm 1288', 'vistas/img/productos/monello.jpeg', 50, 18536, 30894, 0, '2022-08-06 15:46:45'),
(51, 6, '601', 'Max Cat gatos adultos pollo y arroz 10.1 Kg', 'vistas/img/productos/monello.jpeg', 20, 88800, 148000, 0, '2022-08-06 15:46:45'),
(52, 6, '602', 'Corvatin', 'vistas/img/productos/602/420.jpg', 10, 3000, 4200, 1, '2023-05-13 22:36:19'),
(53, 6, '603', 'Hills Prescription Diet Gatos Digestive Care i/d Lata 5.5 Oz', 'vistas/img/productos/monello.jpeg', 30, 8129, 13549, 0, '2022-08-06 15:46:45'),
(54, 6, '604', 'Equilíbrio Concentrado Gatos Filhote 8.25 Kg', 'vistas/img/productos/monello.jpeg', 10, 134569, 224281, 0, '2022-08-06 15:46:45'),
(55, 6, '605', 'Cat Chow Gatos Adultos Hogareños 8 Kg', 'vistas/img/productos/monello.jpeg', 50, 65962, 109937, 0, '2022-08-06 15:46:45'),
(56, 6, '606', 'Max Premium Especial Perros Adultos Carne 15 Kg', 'vistas/img/productos/monello.jpeg', 100, 116245, 193742, 0, '2022-08-06 15:46:45'),
(57, 6, '607', 'Dog Chow Perros Adultos Razas Medianas y Grandes Vida Sana 22.7 Kg', 'vistas/img/productos/monello.jpeg', 30, 117728, 196214, 0, '2024-10-18 01:35:49'),
(58, 6, '608', 'Agility Gold Perros Adultos Razas Grandes Sin Granos 15 Kg', 'vistas/img/productos/monello.jpeg', 29, 149512, 249187, 1, '2025-02-05 21:21:27'),
(59, 6, '609', 'Hills Prescription Diet Perros Kidney Care k/d 8.5 Lb', 'vistas/img/productos/monello.jpeg', 16, 108347, 180578, 4, '2024-10-18 01:35:52'),
(60, 6, '610', 'Max Professional Line Perros Senior Pollo y Arroz 2 Kg', 'vistas/img/productos/monello.jpeg', 24, 19705, 32841, 1, '2025-02-05 21:21:27'),
(61, 21, '2101', 'Peine', 'vistas/img/productos/monello.jpeg', 28, 5050, 7070, 3, '2024-10-18 01:31:03'),
(62, 2, '211', 'Rascador Especial', 'vistas/img/productos/211/821.png', 13, 120000, 168000, 7, '2025-02-05 21:21:27'),
(63, 1, '111', 'Raton ', 'vistas/img/productos/monello.jpeg', 24, 1500.5, 2100.7, 7, '2024-10-17 22:20:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `usuario` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `password` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `perfil` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `foto` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `ultimo_login` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `perfil`, `foto`, `estado`, `ultimo_login`, `fecha`) VALUES
(28, 'Juan Mendez', 'JMendez', '', 'Vendedor', 'vistas/img/usuarios/JMendez/663.png', 1, '2025-01-10 09:32:01', '2025-05-09 16:05:38'),
(29, 'Juan Carlos Peralta', 'JCPeralta', '$2a$07$usesomesillystringforezmF5miNMD2EBXg6C1EmAuW4Ml.KfHTC', 'Administrador', 'vistas/img/usuarios/JCPeralta/524.jpg', 1, '2026-03-19 18:34:39', '2026-03-19 23:34:39'),
(30, 'Ahimelec Chia', 'AChia', '$2a$07$usesomesillystringforedMOZHPqRNFjPO9LfnlQwyElWnSbAU2.', 'Administrador', 'vistas/img/usuarios/AChia/195.jpg', 1, '2025-12-07 11:41:28', '2025-12-07 16:41:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

DROP TABLE IF EXISTS `ventas`;
CREATE TABLE `ventas` (
  `idVenta` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `id_vendedor` int(11) NOT NULL,
  `productos` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `impuesto` float NOT NULL,
  `neto` float NOT NULL,
  `total` float NOT NULL,
  `metodo_pago` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`idVenta`, `codigo`, `idCliente`, `id_vendedor`, `productos`, `impuesto`, `neto`, `total`, `metodo_pago`, `fecha`) VALUES
(51, 10001, 10, 29, '[{\"IdProduc\":\"63\",\"Descripcion\":\"Raton \",\"Cantidad\":\"1\",\"Stock\":\"24\",\"precio\":\"2100.7\",\"total\":\"2100.7\"},{\"IdProduc\":\"61\",\"Descripcion\":\"Peine\",\"Cantidad\":\"1\",\"Stock\":\"28\",\"precio\":\"7070\",\"total\":\"7070\"},{\"IdProduc\":\"59\",\"Descripcion\":\"Hills Prescription Diet Perros Kidney Care k/d 8.5 Lb\",\"Cantidad\":\"1\",\"Stock\":\"16\",\"precio\":\"180578\",\"total\":\"180578\"}]', 36052.3, 189749, 225801, 'Efectivo', '2024-10-17 22:20:04'),
(59, 10004, 10, 29, '[{\"IdProduc\":\"70\",\"Descripcion\":\"Corvatin\",\"Cantidad\":\"1\",\"Stock\":\"7\",\"precio\":\"4200\",\"total\":\"4200\"}]', 84, 4200, 4284, 'Efectivo', '2025-02-05 21:20:19');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`IdCat`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`IdCliente`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`IdProduc`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`idVenta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `IdCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `IdProduc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `idVenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
