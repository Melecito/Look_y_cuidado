-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2022 at 05:44 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `look_y_cuidado`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `IdCat` int(11) NOT NULL,
  `categoria` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`IdCat`, `categoria`, `fecha`) VALUES
(1, 'Juguetería', '2022-06-27 20:31:05'),
(2, 'Hogar', '2022-06-27 20:32:43'),
(3, 'Salud', '2022-06-27 20:32:50'),
(4, 'Arenas', '2022-06-28 17:17:21'),
(5, 'Viajes', '2022-06-28 23:30:36'),
(6, 'Comida', '2022-07-31 20:54:41'),
(21, 'Belleza', '2022-08-07 13:57:32');

-- --------------------------------------------------------

--
-- Table structure for table `citas`
--

CREATE TABLE `citas` (
  `IdCitas` int(11) NOT NULL,
  `CitaFecha` date DEFAULT NULL,
  `CitHora` time DEFAULT NULL,
  `IdMedicoV` int(11) NOT NULL,
  `IdCliente` int(11) NOT NULL,
  `IdMascota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `idCliente` int(11) NOT NULL,
  `nombre` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `documento` int(11) NOT NULL,
  `email` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `telefono` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `direccion` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `compras` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `IdMascolta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `compra`
--

CREATE TABLE `compra` (
  `IdCompra` int(11) NOT NULL,
  `FechaComp` date DEFAULT NULL,
  `idCliente` int(11) NOT NULL,
  `IdProduc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mascotas`
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
-- Table structure for table `medicoveterinario`
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
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `IdProduc` int(11) NOT NULL,
  `IdCat` int(11) NOT NULL,
  `Codigo` text CHARACTER SET utf8 NOT NULL,
  `Descripcion` text CHARACTER SET utf8 NOT NULL,
  `Imagen` text CHARACTER SET utf8 NOT NULL,
  `Stock` int(11) NOT NULL,
  `PrecioCompra` float NOT NULL,
  `PrecioVenta` float NOT NULL,
  `Ventas` int(11) NOT NULL,
  `Fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`IdProduc`, `IdCat`, `Codigo`, `Descripcion`, `Imagen`, `Stock`, `PrecioCompra`, `PrecioVenta`, `Ventas`, `Fecha`) VALUES
(1, 1, '101', 'Rascadera Beige con Forma de Gato.', 'vistas/img/productos/101/895.png', 40, 55945, 93242, 0, '2022-08-08 21:22:49'),
(2, 1, '102', 'Pelota rellenable para gatos 2 Unds', 'vistas/img/productos/102/365.png', 20, 8392, 13986, 0, '2022-08-08 21:23:15'),
(4, 1, '104', 'Trixie Gimnasio para gato Poste Felicitas Alt 190 cm Café 47001', 'vistas/img/productos/104/141.png', 35, 1418180, 1985440, 0, '2022-08-18 15:37:37'),
(5, 1, '105', 'Juguete de zorro en peluche para gatos incluye catnip.', 'vistas/img/productos/monello.jpeg', 15, 17107, 28511, 0, '2022-08-08 21:14:17'),
(6, 1, '106', 'GoodBite Juguete Masticable Perros.', 'vistas/img/productos/monello.jpeg', 100, 17168, 28613, 0, '2022-08-08 21:14:11'),
(7, 1, '107', 'Juguete Yo-Yo para lanzar 5 cm para perros Pet-7486FS', 'vistas/img/productos/monello.jpeg', 100, 7919, 13199, 0, '2022-08-06 15:46:45'),
(8, 1, '108', 'Juguete Frisbee 17.5 cm para perros Pet-7407FS', 'vistas/img/productos/monello.jpeg', 100, 19499, 32498, 0, '2022-08-06 15:46:45'),
(9, 1, '109', 'Hueso con sonido pequeño para perros', 'vistas/img/productos/109/835.jpg', 62, 7000, 9800, 0, '2022-08-08 21:09:16'),
(10, 1, '110', 'Juguete Tri-Bumper Perros Talla M', 'vistas/img/productos/monello.jpeg', 100, 34105, 56841, 0, '2022-08-06 15:46:45'),
(11, 2, '201', 'Barrera de Protección para Perro Gato', 'vistas/img/productos/monello.jpeg', 30, 288864, 481440, 0, '2022-08-18 15:39:05'),
(12, 2, '202', 'Rascadera Cartón Fat Cat Big Mamas 610241', 'vistas/img/productos/monello.jpeg', 40, 30996, 51660, 0, '2022-08-06 15:46:45'),
(13, 2, '203', 'Trixie Gimnasio para gato Mica Alt 46 cm Gris Claro 44418', 'vistas/img/productos/monello.jpeg', 20, 91974, 153290, 0, '2022-08-06 15:46:45'),
(14, 2, '204', 'Cama Gato Cueva Malu 47x41x27 cm Café 36356', 'vistas/img/productos/monello.jpeg', 20, 96815, 161359, 0, '2022-08-06 15:46:45'),
(15, 2, '205', 'Cama Rogz para gato Oslo Igloo color Azul Oscuro y Gris CPOI/M-P', 'vistas/img/productos/monello.jpeg', 10, 141465, 235775, 0, '2022-08-06 15:46:45'),
(16, 2, '206', 'Cojín 3D Perro Snoozy Friendz Koala 7261', 'vistas/img/productos/monello.jpeg', 30, 78091, 130151, 0, '2022-08-06 15:46:45'),
(17, 2, '207', 'Fuente de Agua para Mascotas. Deluxe Fresh', 'vistas/img/productos/monello.jpeg', 30, 92569, 154282, 0, '2022-08-06 15:46:45'),
(18, 2, '208', 'Comedero Antideslizante 735 Ml Azul Oscuro', 'vistas/img/productos/monello.jpeg', 50, 8035, 13391, 0, '2022-08-06 15:46:45'),
(19, 2, '209', 'Cuchara Medidora de Comida para Perro Talla L', 'vistas/img/productos/monello.jpeg', 100, 6863, 11438, 0, '2022-08-06 15:46:45'),
(20, 2, '210', 'Bebedero Fuente fresh flow Rain Fountai 2.2 Lt', 'vistas/img/productos/monello.jpeg', 20, 111530, 185883, 0, '2022-08-06 15:46:45'),
(21, 3, '301', 'Antiparasitario Drontal para gatos.', 'vistas/img/productos/monello.jpeg', 100, 11549, 19249, 0, '2022-08-06 15:46:45'),
(22, 3, '302', 'Advocate Antiparasitario para gatos (hasta 8 Kg)', 'vistas/img/productos/monello.jpeg', 100, 22177, 36962, 0, '2022-08-06 15:46:45'),
(23, 3, '303', 'Advocate Antiparasitario para gatos (hasta 4 Kg)', 'vistas/img/productos/monello.jpeg', 100, 20429, 34048, 0, '2022-08-06 15:46:45'),
(24, 3, '304', 'Revolution Plus en Caja 3 Tubos por 0.5 ml para gatos (Hasta 2.5 - 5 Kg)', 'vistas/img/productos/monello.jpeg', 100, 80558, 134264, 0, '2022-08-06 15:46:45'),
(25, 3, '305', 'Fiprostar Antiparasitario para Gatos.', 'vistas/img/productos/monello.jpeg', 100, 7358, 12264, 0, '2022-08-06 15:46:45'),
(26, 3, '306', 'Artri-Vet Suplemento Alimenticio para Perros y Gatos x 60 tabletas', 'vistas/img/productos/monello.jpeg', 100, 46612, 77687, 0, '2022-08-06 15:46:45'),
(27, 3, '307', 'Mirrapel Suplemento Nutricional para Perros y Gatos Polvo 300g', 'vistas/img/productos/monello.jpeg', 200, 14317, 23862, 0, '2022-08-06 15:46:45'),
(28, 3, '308', 'NutraForz DigestForz. Suplemento Perros y Gatos. 30 Tabletas.', 'vistas/img/productos/monello.jpeg', 200, 37315, 62192, 0, '2022-08-06 15:46:45'),
(29, 3, '309', 'Lactovet C Suplemento alimenticio Perros y Gatos. 750 g.', 'vistas/img/productos/monello.jpeg', 100, 28550, 47583, 0, '2022-08-06 15:46:45'),
(30, 3, '310', 'Suplemento Vitaminico Perritos Enzimas Digestivas + Probioticos por 60 tabletas', 'vistas/img/productos/monello.jpeg', 200, 35561, 59269, 0, '2022-08-06 15:46:45'),
(31, 4, '401', 'Arena Fresh Step para Gatos con Frebeze por 14 Lb', 'vistas/img/productos/monello.jpeg', 20, 28739, 47899, 0, '2022-08-06 15:46:45'),
(32, 4, '402', 'Arena Mirringo para gatos por 10 Kg', 'vistas/img/productos/monello.jpeg', 30, 36061, 60102, 0, '2022-08-06 15:46:45'),
(33, 4, '403', 'Purina Arena tidy cats scoopable bolsa 9 kg', 'vistas/img/productos/monello.jpeg', 30, 34400, 57334, 0, '2022-08-06 15:46:45'),
(34, 4, '404', 'Arena para Gatos. Foficat. Manzana. 10 Kg.', 'vistas/img/productos/monello.jpeg', 30, 32000, 53333, 0, '2022-08-06 15:46:45'),
(35, 4, '405', 'OdourLock Arena para gatos por 12 Kg Aroma a Lavanda', 'vistas/img/productos/monello.jpeg', 30, 59339, 98899, 0, '2022-08-06 15:46:45'),
(36, 4, '406', 'Canada litter arena 18 kg', 'vistas/img/productos/monello.jpeg', 30, 72299, 120499, 0, '2022-08-06 15:46:45'),
(37, 4, '407', 'Arena Michiko 5 Kg', 'vistas/img/productos/monello.jpeg', 30, 14666, 24444, 0, '2022-08-06 15:46:45'),
(38, 4, '408', 'Arena para Gato. Freemiau. 4.5 Kg.', 'vistas/img/productos/monello.jpeg', 50, 20170, 33617, 0, '2022-08-06 15:46:45'),
(39, 4, '409', 'Comfort Kat Arena para Gatos 4 Kg', 'vistas/img/productos/monello.jpeg', 50, 16835, 28058, 0, '2022-08-06 15:46:45'),
(40, 4, '410', 'Tidy Cats Arena para Gatos. Instant Action. 6.3 Kg.', 'vistas/img/productos/monello.jpeg', 50, 38626, 64377, 0, '2022-08-06 15:46:45'),
(41, 5, '501', 'Guacal Puerta Metal 48.6 L Fucsia T101', 'vistas/img/productos/monello.jpeg', 10, 56605, 94341, 0, '2022-08-06 15:46:45'),
(42, 5, '502', 'Atlas Guacal Mascotas. 10 EL.', 'vistas/img/productos/monello.jpeg', 10, 52016, 86694, 0, '2022-08-06 15:46:45'),
(43, 5, '503', 'Guacal Mascotas Vari Kennel. Talla M.', 'vistas/img/productos/monello.jpeg', 10, 211373, 352288, 0, '2022-08-06 15:46:45'),
(44, 5, '504', 'Maletín para mascotas Bijoux 82296099', 'vistas/img/productos/monello.jpeg', 30, 64798, 107997, 0, '2022-08-06 15:46:45'),
(45, 5, '505', 'MALETIN KANGOO S/M 37X16X36,5A GRIS 85748121', 'vistas/img/productos/monello.jpeg', 30, 108288, 180480, 0, '2022-08-06 15:46:45'),
(46, 5, '506', 'GUACAL CARRIER JET 10 73043099', 'vistas/img/productos/monello.jpeg', 30, 43946, 73243, 0, '2022-08-06 15:46:45'),
(47, 5, '507', 'Guacal Skudo Talla S 40x39x60 Cm', 'vistas/img/productos/monello.jpeg', 10, 121604, 202674, 0, '2022-08-06 15:46:45'),
(48, 5, '508', 'Adaptil Calmante en Spray para perros 60ml', 'vistas/img/productos/monello.jpeg', 50, 46088, 76814, 0, '2022-08-06 15:46:45'),
(49, 5, '509', 'Cargador Mascota Alea 30x20x16 cm Azul Petrol 28858', 'vistas/img/productos/monello.jpeg', 30, 56903, 94838, 0, '2022-08-06 15:46:45'),
(50, 5, '510', 'Arnes de Seguridad para Carro XS 20-50cm/15mm 1288', 'vistas/img/productos/monello.jpeg', 50, 18536, 30894, 0, '2022-08-06 15:46:45'),
(51, 6, '601', 'Max Cat gatos adultos pollo y arroz 10.1 Kg', 'vistas/img/productos/monello.jpeg', 20, 88800, 148000, 0, '2022-08-06 15:46:45'),
(52, 6, '602', 'Hills Science Diet Gatos Adultos Optimal Care 16 Lb', 'vistas/img/productos/monello.jpeg', 20, 179359, 298931, 0, '2022-08-06 15:46:45'),
(53, 6, '603', 'Hills Prescription Diet Gatos Digestive Care i/d Lata 5.5 Oz', 'vistas/img/productos/monello.jpeg', 30, 8129, 13549, 0, '2022-08-06 15:46:45'),
(54, 6, '604', 'Equilíbrio Concentrado Gatos Filhote 8.25 Kg', 'vistas/img/productos/monello.jpeg', 10, 134569, 224281, 0, '2022-08-06 15:46:45'),
(55, 6, '605', 'Cat Chow Gatos Adultos Hogareños 8 Kg', 'vistas/img/productos/monello.jpeg', 50, 65962, 109937, 0, '2022-08-06 15:46:45'),
(56, 6, '606', 'Max Premium Especial Perros Adultos Carne 15 Kg', 'vistas/img/productos/monello.jpeg', 100, 116245, 193742, 0, '2022-08-06 15:46:45'),
(57, 6, '607', 'Dog Chow Perros Adultos Razas Medianas y Grandes Vida Sana 22.7 Kg', 'vistas/img/productos/monello.jpeg', 30, 117728, 196214, 0, '2022-08-06 15:46:45'),
(58, 6, '608', 'Agility Gold Perros Adultos Razas Grandes Sin Granos 15 Kg', 'vistas/img/productos/monello.jpeg', 30, 149512, 249187, 0, '2022-08-06 15:46:45'),
(59, 6, '609', 'Hills Prescription Diet Perros Kidney Care k/d 8.5 Lb', 'vistas/img/productos/monello.jpeg', 20, 108347, 180578, 0, '2022-08-06 15:46:45'),
(60, 6, '610', 'Max Professional Line Perros Senior Pollo y Arroz 2 Kg', 'vistas/img/productos/monello.jpeg', 25, 19705, 32841, 0, '2022-08-06 15:46:45'),
(61, 21, '2101', 'Peine', 'vistas/img/productos/monello.jpeg', 30, 5000, 7000, 0, '2022-08-07 15:12:58'),
(62, 2, '211', 'Rascador Especial', 'vistas/img/productos/211/821.png', 20, 120000, 168000, 0, '2022-08-08 21:19:45'),
(63, 1, '111', 'Raton ', 'vistas/img/productos/monello.jpeg', 30, 1500.5, 2100.7, 0, '2022-08-07 15:17:16'),
(70, 6, '602', 'Corvatin', 'vistas/img/productos/602/192.png', 40, 3000, 4200, 0, '2022-08-18 15:04:49');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
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
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `perfil`, `foto`, `estado`, `ultimo_login`, `fecha`) VALUES
(11, 'Liliana Diaz', 'liliD', '$2a$07$usesomesillystringforemVnaGTCxgHkYewdsGlWFgUGKQ9SlWNO', 'Administrador', 'vistas/img/usuarios/liliD/221.jpeg', 1, '2022-08-18 09:27:20', '2022-08-18 14:27:20'),
(12, 'Jorge Miranda', 'JorgeO', '$2a$07$usesomesillystringforeH1lCmDCPcc7UVzXXQj.hlRP50VLi0Qi', 'Almacenista', 'vistas/img/usuarios/JorgeO/833.png', 1, '2022-08-10 07:48:02', '2022-08-10 12:48:02');

-- --------------------------------------------------------

--
-- Table structure for table `ventas`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`IdCat`);

--
-- Indexes for table `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`IdCitas`),
  ADD UNIQUE KEY `IdMedicoV` (`IdMedicoV`),
  ADD UNIQUE KEY `IdCliente` (`IdCliente`),
  ADD UNIQUE KEY `IdMascota` (`IdMascota`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idCliente`),
  ADD UNIQUE KEY `IdMascolta` (`IdMascolta`);

--
-- Indexes for table `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`IdCompra`),
  ADD UNIQUE KEY `idCliente` (`idCliente`),
  ADD UNIQUE KEY `id` (`IdProduc`),
  ADD UNIQUE KEY `idProducto` (`IdProduc`),
  ADD UNIQUE KEY `IdProduc` (`IdProduc`);

--
-- Indexes for table `mascotas`
--
ALTER TABLE `mascotas`
  ADD PRIMARY KEY (`IdMascota`),
  ADD UNIQUE KEY `IdCliente` (`IdCliente`),
  ADD UNIQUE KEY `IdMedicoV` (`IdMedicoV`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`IdProduc`),
  ADD KEY `IdCat` (`IdCat`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`idVenta`),
  ADD UNIQUE KEY `idCliente` (`idCliente`),
  ADD UNIQUE KEY `id_vendedor` (`id_vendedor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `IdCat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `IdProduc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`IdCliente`) REFERENCES `clientes` (`idCliente`);

--
-- Constraints for table `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`IdMascolta`) REFERENCES `mascotas` (`IdMascota`);

--
-- Constraints for table `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`IdProduc`) REFERENCES `productos` (`IdProduc`);

--
-- Constraints for table `mascotas`
--
ALTER TABLE `mascotas`
  ADD CONSTRAINT `mascotas_ibfk_1` FOREIGN KEY (`IdMascota`) REFERENCES `citas` (`IdMascota`);

--
-- Constraints for table `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`IdCat`) REFERENCES `categorias` (`IdCat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
