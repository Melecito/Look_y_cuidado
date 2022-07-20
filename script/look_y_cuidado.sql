-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-07-2022 a las 17:08:09
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

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

CREATE TABLE `categorias` (
  `IdCat` int(11) NOT NULL,
  `categoria` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`IdCat`, `categoria`, `fecha`) VALUES
(1, 'Juguetería', '2022-06-27 20:31:05'),
(2, 'Hogar', '2022-06-27 20:32:43'),
(3, 'Salud', '2022-06-27 20:32:50'),
(4, 'Arenas', '2022-06-28 17:17:21'),
(5, 'Viajes', '2022-06-28 23:30:36'),
(6, 'Comida', '2022-07-12 02:24:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `IdCitas` int(11) NOT NULL,
  `CitaFecha` date DEFAULT NULL,
  `Color` varchar(50) NOT NULL,
  `CitHora` time DEFAULT NULL,
  `IdMedicoV` int(11) NOT NULL,
  `IdCliente` int(11) NOT NULL,
  `IdMascota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `IdCliente` int(11) NOT NULL,
  `Cedula` varchar(15) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Edad` int(11) NOT NULL,
  `Celular` varchar(20) NOT NULL,
  `Genero` enum('m','f') NOT NULL,
  `Correo` varchar(50) NOT NULL,
  `IdMedicoV` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `IdCompra` int(11) NOT NULL,
  `FechaComp` date DEFAULT NULL,
  `IdCliente` int(11) NOT NULL,
  `CodProduc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascotas`
--

CREATE TABLE `mascotas` (
  `IdMascota` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Color` varchar(50) NOT NULL,
  `Edad` int(11) NOT NULL,
  `Raza` varchar(20) NOT NULL,
  `Genero` enum('m','f') NOT NULL,
  `IdMedicoV` int(11) NOT NULL,
  `IdCliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicoveterinario`
--

CREATE TABLE `medicoveterinario` (
  `IdMedicoV` int(11) NOT NULL,
  `Celular` varchar(20) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Especialidad` varchar(50) NOT NULL,
  `Consultorio` char(3) NOT NULL,
  `Genero` enum('m','f') NOT NULL,
  `Correo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `IdCat` int(11) NOT NULL,
  `Codigo` text NOT NULL,
  `Descripcion` text CHARACTER SET utf8 NOT NULL,
  `Imagen` text NOT NULL,
  `Stock` int(11) NOT NULL,
  `PrecioCompra` float NOT NULL,
  `PrecioVenta` float NOT NULL,
  `Ventas` int(11) NOT NULL,
  `Fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `IdCat`, `Codigo`, `Descripcion`, `Imagen`, `Stock`, `PrecioCompra`, `PrecioVenta`, `Ventas`, `Fecha`) VALUES
(2, 1, '102', 'Pelota rellenable para gatos 2 Unds.', 'vistas/img/productos/002.png', 50, 8392, 13986, 0, '2022-07-13 01:58:06'),
(3, 1, '103', 'Rascadera Junior para gatos 38x18x6 cm Gris Claro 48011', 'vistas/img/productos/003.png', 30, 18648, 31080, 0, '2022-07-13 01:58:06'),
(4, 1, '104', 'Trixie Gimnasio para gato Poste Felicitas Alt 190 cm CafÃ© 47001', 'vistas/img/productos/004.png', 20, 1418170, 2363610, 0, '2022-07-13 01:58:06'),
(5, 1, '105', 'Juguete de zorro en peluche para gatos incluye catnip.', 'vistas/img/productos/005.png', 50, 17107, 28511, 0, '2022-07-13 01:58:06'),
(6, 1, '106', 'GoodBite Juguete Masticable Perros.', 'vistas/img/productos/006.png', 100, 17168, 28613, 0, '2022-07-13 01:58:06'),
(7, 1, '107', 'Juguete Yo-Yo para lanzar 5 cm para perros Pet-7486FS', 'vistas/img/productos/monello.jpeg', 100, 7919, 13199, 0, '2022-07-13 01:58:06'),
(8, 1, '108', 'Juguete Frisbee 17.5 cm para perros Pet-7407FS', 'vistas/img/productos/monello.jpeg', 100, 19499, 32498, 0, '2022-07-13 01:58:06'),
(9, 1, '109', 'Hueso con sonido pequeÃ±o para perros', 'vistas/img/productos/monello.jpeg', 200, 6717, 11195, 0, '2022-07-13 01:58:06'),
(10, 1, '110', 'Juguete Tri-Bumper Perros Talla M', 'vistas/img/productos/monello.jpeg', 100, 34105, 56841, 0, '2022-07-13 01:58:06'),
(11, 2, '201', 'Barrera de ProtecciÃ³n para Perro/Gato', 'vistas/img/productos/monello.jpeg', 30, 288864, 481440, 0, '2022-07-13 01:58:06'),
(12, 2, '202', 'Rascadera CartÃ³n Fat Cat Big Mamas 610241', 'vistas/img/productos/monello.jpeg', 40, 30996, 51660, 0, '2022-07-13 01:58:06'),
(13, 2, '203', 'Trixie Gimnasio para gato Mica Alt 46 cm Gris Claro 44418', 'vistas/img/productos/monello.jpeg', 14, 91974, 153290, 0, '2022-07-14 14:38:58'),
(14, 2, '204', 'Cama Gato Cueva Malu 47x41x27 cm CafÃ© 36356', 'vistas/img/productos/monello.jpeg', 20, 96815, 161359, 0, '2022-07-13 01:58:06'),
(15, 2, '205', 'Cama Rogz para gato Oslo Igloo color Azul Oscuro y Gris CPOI/M-P', 'vistas/img/productos/monello.jpeg', 10, 141465, 235775, 0, '2022-07-13 01:58:06'),
(16, 2, '206', 'CojÃ­n 3D Perro Snoozy Friendz Koala 7261', 'vistas/img/productos/monello.jpeg', 30, 78091, 130151, 0, '2022-07-13 01:58:06'),
(17, 2, '207', 'Fuente de Agua para Mascotas. Deluxe Fresh', 'vistas/img/productos/monello.jpeg', 30, 92569, 154282, 0, '2022-07-13 01:58:06'),
(18, 2, '208', 'Comedero Antideslizante 735 Ml Azul Oscuro', 'vistas/img/productos/monello.jpeg', 50, 8035, 13391, 0, '2022-07-13 01:58:06'),
(19, 2, '209', 'Cuchara Medidora de Comida para Perro Talla L', 'vistas/img/productos/monello.jpeg', 100, 6863, 11438, 0, '2022-07-13 01:58:06'),
(20, 2, '210', 'Bebedero Fuente fresh flow Rain Fountai 2.2 Lt', 'vistas/img/productos/monello.jpeg', 20, 111530, 185883, 0, '2022-07-13 01:58:06'),
(21, 3, '301', 'Antiparasitario Drontal para gatos.', 'vistas/img/productos/monello.jpeg', 100, 11549, 19249, 0, '2022-07-13 01:58:06'),
(22, 3, '302', 'Advocate Antiparasitario para gatos (hasta 8 Kg)', 'vistas/img/productos/monello.jpeg', 100, 22177, 36962, 0, '2022-07-13 01:58:06'),
(23, 3, '303', 'Advocate Antiparasitario para gatos (hasta 4 Kg)', 'vistas/img/productos/monello.jpeg', 100, 20429, 34048, 0, '2022-07-13 01:58:06'),
(24, 3, '304', 'Revolution Plus en Caja 3 Tubos por 0.5 ml para gatos (Hasta 2.5 - 5 Kg)', 'vistas/img/productos/monello.jpeg', 100, 80558, 134264, 0, '2022-07-13 01:58:06'),
(25, 3, '305', 'Fiprostar Antiparasitario para Gatos.', 'vistas/img/productos/monello.jpeg', 100, 7358, 12264, 0, '2022-07-13 01:58:06'),
(26, 3, '306', 'Artri-Vet Suplemento Alimenticio para Perros y Gatos x 60 tabletas', 'vistas/img/productos/monello.jpeg', 100, 46612, 77687, 0, '2022-07-13 01:58:06'),
(27, 3, '307', 'Mirrapel Suplemento Nutricional para Perros y Gatos Polvo 300g', 'vistas/img/productos/monello.jpeg', 200, 14317, 23862, 0, '2022-07-13 01:58:06'),
(28, 3, '308', 'NutraForz DigestForz. Suplemento Perros y Gatos. 30 Tabletas.', 'vistas/img/productos/monello.jpeg', 200, 37315, 62192, 0, '2022-07-13 01:58:06'),
(29, 3, '309', 'Lactovet C Suplemento alimenticio Perros y Gatos. 750 g.', 'vistas/img/productos/monello.jpeg', 100, 28550, 47583, 0, '2022-07-13 01:58:06'),
(30, 3, '310', 'Suplemento Vitaminico Perritos Enzimas Digestivas + Probioticos por 60 tabletas', 'vistas/img/productos/monello.jpeg', 200, 35561, 59269, 0, '2022-07-13 01:58:06'),
(31, 4, '401', 'Arena Fresh Step para Gatos con Frebeze por 14 Lb', 'vistas/img/productos/monello.jpeg', 20, 28739, 47899, 0, '2022-07-13 01:58:06'),
(32, 4, '402', 'Arena Mirringo para gatos por 10 Kg', 'vistas/img/productos/monello.jpeg', 30, 36061, 60102, 0, '2022-07-13 01:58:06'),
(33, 4, '403', 'Purina Arena tidy cats scoopable bolsa 9 kg', 'vistas/img/productos/monello.jpeg', 30, 34400, 57334, 0, '2022-07-13 01:58:06'),
(34, 4, '404', 'Arena para Gatos. Foficat. Manzana. 10 Kg.', 'vistas/img/productos/monello.jpeg', 30, 32000, 53333, 0, '2022-07-13 01:58:06'),
(35, 4, '405', 'OdourLock Arena para gatos por 12 Kg Aroma a Lavanda', 'vistas/img/productos/monello.jpeg', 30, 59339, 98899, 0, '2022-07-13 01:58:06'),
(36, 4, '406', 'Canada litter arena 18 kg', 'vistas/img/productos/monello.jpeg', 30, 72299, 120499, 0, '2022-07-13 01:58:06'),
(37, 4, '407', 'Arena Michiko 5 Kg', 'vistas/img/productos/monello.jpeg', 30, 14666, 24444, 0, '2022-07-13 01:58:06'),
(38, 4, '408', 'Arena para Gato. Freemiau. 4.5 Kg.', 'vistas/img/productos/monello.jpeg', 50, 20170, 33617, 0, '2022-07-13 01:58:06'),
(39, 4, '409', 'Comfort Kat Arena para Gatos 4 Kg', 'vistas/img/productos/monello.jpeg', 50, 16835, 28058, 0, '2022-07-13 01:58:06'),
(40, 4, '410', 'Tidy Cats Arena para Gatos. Instant Action. 6.3 Kg.', 'vistas/img/productos/monello.jpeg', 50, 38626, 64377, 0, '2022-07-13 01:58:06'),
(41, 5, '501', 'Guacal Puerta Metal 48.6 L Fucsia T101', 'vistas/img/productos/monello.jpeg', 10, 56605, 94341, 0, '2022-07-13 01:58:06'),
(42, 5, '502', 'Atlas Guacal Mascotas. 10 EL.', 'vistas/img/productos/monello.jpeg', 10, 52016, 86694, 0, '2022-07-13 01:58:06'),
(43, 5, '503', 'Guacal Mascotas Vari Kennel. Talla M.', 'vistas/img/productos/monello.jpeg', 10, 211373, 352288, 0, '2022-07-13 01:58:06'),
(44, 5, '504', 'MaletÃ­n para mascotas Bijoux 82296099', 'vistas/img/productos/monello.jpeg', 30, 64798, 107997, 0, '2022-07-13 01:58:06'),
(45, 5, '505', 'MALETIN KANGOO S/M 37X16X36,5A GRIS 85748121', 'vistas/img/productos/monello.jpeg', 30, 108288, 180480, 0, '2022-07-13 01:58:06'),
(46, 5, '506', 'GUACAL CARRIER JET 10 73043099', 'vistas/img/productos/monello.jpeg', 30, 43946, 73243, 0, '2022-07-13 01:58:06'),
(47, 5, '507', 'Guacal Skudo Talla S 40x39x60 Cm', 'vistas/img/productos/monello.jpeg', 10, 121604, 202674, 0, '2022-07-13 01:58:06'),
(48, 5, '508', 'Adaptil Calmante en Spray para perros 60ml', 'vistas/img/productos/monello.jpeg', 50, 46088, 76814, 0, '2022-07-13 01:58:06'),
(49, 5, '509', 'Cargador Mascota Alea 30x20x16 cm Azul Petrol 28858', 'vistas/img/productos/monello.jpeg', 30, 56903, 94838, 0, '2022-07-13 01:58:06'),
(50, 5, '510', 'Arnes de Seguridad para Carro XS 20-50cm/15mm 1288', 'vistas/img/productos/monello.jpeg', 50, 18536, 30894, 0, '2022-07-13 01:58:06'),
(51, 6, '601', 'Max Cat gatos adultos pollo y arroz 10.1 Kg', 'vistas/img/productos/monello.jpeg', 20, 88800, 148000, 0, '2022-07-13 01:58:06'),
(52, 6, '602', 'Hills Science Diet Gatos Adultos Optimal Care 16 Lb', 'vistas/img/productos/monello.jpeg', 20, 179359, 298931, 0, '2022-07-13 01:58:06'),
(53, 6, '603', 'Hills Prescription Diet Gatos Digestive Care i/d Lata 5.5 Oz', 'vistas/img/productos/monello.jpeg', 30, 8129, 13549, 0, '2022-07-13 01:58:06'),
(54, 6, '604', 'EquilÃ­brio Concentrado Gatos Filhote 8.25 Kg', 'vistas/img/productos/monello.jpeg', 10, 134569, 224281, 0, '2022-07-13 01:58:06'),
(55, 6, '605', 'Cat Chow Gatos Adultos HogareÃ±os 8 Kg', 'vistas/img/productos/monello.jpeg', 50, 65962, 109937, 0, '2022-07-13 01:58:06'),
(56, 6, '606', 'Max Premium Especial Perros Adultos Carne 15 Kg', 'vistas/img/productos/monello.jpeg', 100, 116245, 193742, 0, '2022-07-13 01:58:06'),
(57, 6, '607', 'Dog Chow Perros Adultos Razas Medianas y Grandes Vida Sana 22.7 Kg', 'vistas/img/productos/monello.jpeg', 30, 117728, 196214, 0, '2022-07-13 01:58:06'),
(58, 6, '608', 'Agility Gold Perros Adultos Razas Grandes Sin Granos 15 Kg', 'vistas/img/productos/monello.jpeg', 30, 149512, 249187, 0, '2022-07-13 01:58:06'),
(59, 6, '609', 'Hills Prescription Diet Perros Kidney Care k/d 8.5 Lb', 'vistas/img/productos/monello.jpeg', 20, 108347, 180578, 0, '2022-07-13 01:58:06'),
(60, 6, '610', 'Max Professional Line Perros Senior Pollo y Arroz 2 Kg', 'vistas/img/productos/monello.jpeg', 25, 19705, 32841, 0, '2022-07-13 01:58:06'),
(66, 1, '101', 'Rascadera Beige con Forma de Gato.', 'vistas/img/productos/001.png', 40, 55945, 93242, 0, '2022-07-13 01:58:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `perfil`, `foto`, `estado`, `ultimo_login`, `fecha`) VALUES
(11, 'Liliana Diaz', 'liliD', '$2a$07$usesomesillystringforemVnaGTCxgHkYewdsGlWFgUGKQ9SlWNO', 'Administrador', 'vistas/img/usuarios/liliD/221.jpeg', 1, '2022-07-20 08:55:41', '2022-07-20 13:55:41'),
(12, 'Jorge Miranda', 'JorgeO', '$2a$07$usesomesillystringforeBrAObg1v2Mrkbobvqx763.gj3Kdetda', 'Almacenista', 'vistas/img/usuarios/JorgeO/833.png', 1, '2022-05-17 20:21:04', '2022-06-20 16:02:23'),
(15, 'Milena Cuevas Rojas', 'Milena', '$2a$07$usesomesillystringfore0dGYTL8I5/vZY9H5lnOy9MXcuvdrsXi', 'Vendedor', 'vistas/img/usuarios/Milena/276.png', 1, '2022-06-20 11:02:47', '2022-06-26 20:56:20');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`IdCat`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IdCat` (`IdCat`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `IdCat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
