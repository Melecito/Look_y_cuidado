-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Apr 26, 2023 at 02:18 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
-- 

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

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
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`IdCliente`, `Nombre`, `Documento`, `email`, `Telefono`, `Direccion`, `Fecha_nacimiento`, `Ultima_compra`, `Compras`, `Fecha`) VALUES
(2, 'Jaime Samora', 741263281, 'Cardenas@gmail.com', '(321) 988-7732', 'Calle 45 # 42 - 98', '1978-02-12', '2023-04-24 14:34:14', 12, '2023-04-24 19:34:14'),
(5, 'Hemel Zambrano', 9547125, 'hemel@gmail.com', '(300) 125-4478', 'Cra 34 # 45- 67', '1974-05-30', '2023-04-23 23:39:09', 4, '2023-04-23 21:39:09'),
(6, 'Juan peralta', 748512564, 'juan@gmail.com', '(446) 546-4846', 'Calle 23 # 13 - 23', '1975-12-31', '2023-04-25 17:29:12', 1, '2023-04-25 22:29:41'),
(7, 'Sandra Mendez', 33458745, 'sandra@hotmail.com', '(231) 548-7966', 'cra 23 # 45- 85', '1985-04-25', '0000-00-00 00:00:00', 0, '2023-04-25 22:28:04');

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

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
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`IdProduc`, `IdCat`, `Codigo`, `Descripcion`, `Imagen`, `Stock`, `PrecioCompra`, `PrecioVenta`, `Ventas`, `Fecha`) VALUES
(1, 1, '101', 'Rascadera Beige con Forma de Gato.', 'vistas/img/productos/101/895.png', 34, 56000, 78400, 9, '2023-04-25 22:24:30'),
(2, 1, '102', 'Pelota rellenable para gatos 2 Unds', 'vistas/img/productos/102/365.png', 17, 8392, 13986, 3, '2023-04-24 19:34:14'),
(4, 1, '104', 'Trixie Gimnasio para gato Poste Felicitas Alt 190 cm Café 47001', 'vistas/img/productos/104/141.png', 32, 1418180, 1985440, 3, '2023-04-24 19:34:14'),
(5, 1, '105', 'Juguete de zorro en peluche para gatos incluye catnip.', 'vistas/img/productos/monello.jpeg', 14, 17107, 28511, 1, '2023-04-23 21:39:09'),
(6, 1, '106', 'GoodBite Juguete Masticable Perros.', 'vistas/img/productos/monello.jpeg', 99, 17168, 28613, 1, '2023-04-24 20:12:58'),
(7, 1, '107', 'Juguete Yo-Yo para lanzar 5 cm para perros Pet-7486FS', 'vistas/img/productos/monello.jpeg', 98, 7919, 13199, 2, '2023-04-23 21:28:40'),
(8, 1, '108', 'Juguete Frisbee 17.5 cm para perros Pet-7407FS', 'vistas/img/productos/monello.jpeg', 99, 19499, 32498, 1, '2023-04-25 22:29:11'),
(9, 1, '109', 'Hueso con sonido pequeño para perros', 'vistas/img/productos/109/835.jpg', 61, 7000, 9800, 1, '2023-04-22 22:32:07'),
(10, 1, '110', 'Juguete Tri-Bumper Perros Talla M', 'vistas/img/productos/monello.jpeg', 100, 34105, 56841, 0, '2023-04-25 22:26:54'),
(11, 2, '201', 'Barrera de Protección para Perro Gato', 'vistas/img/productos/monello.jpeg', 29, 288864, 481440, 1, '2023-04-25 22:26:54'),
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
(36, 4, '406', 'Canada litter arena 18 kg', 'vistas/img/productos/monello.jpeg', 29, 72299, 120499, 1, '2023-04-22 22:52:45'),
(37, 4, '407', 'Arena Michiko 5 Kg', 'vistas/img/productos/monello.jpeg', 30, 14666, 24444, 0, '2022-08-06 15:46:45'),
(38, 4, '408', 'Arena para Gato. Freemiau. 4.5 Kg.', 'vistas/img/productos/monello.jpeg', 49, 20170, 33617, 1, '2023-04-22 22:52:45'),
(39, 4, '409', 'Comfort Kat Arena para Gatos 4 Kg', 'vistas/img/productos/monello.jpeg', 50, 16835, 28058, 0, '2022-08-06 15:46:45'),
(40, 4, '410', 'Tidy Cats Arena para Gatos. Instant Action. 6.3 Kg.', 'vistas/img/productos/monello.jpeg', 49, 38626, 64377, 1, '2023-04-22 22:52:45'),
(41, 5, '501', 'Guacal Puerta Metal 48.6 L Fucsia T101', 'vistas/img/productos/monello.jpeg', 10, 56605, 94341, 0, '2022-08-06 15:46:45'),
(42, 5, '502', 'Atlas Guacal Mascotas. 10 EL.', 'vistas/img/productos/monello.jpeg', 10, 52016, 86694, 0, '2022-08-06 15:46:45'),
(43, 5, '503', 'Guacal Mascotas Vari Kennel. Talla M.', 'vistas/img/productos/monello.jpeg', 10, 211373, 352288, 0, '2022-08-06 15:46:45'),
(44, 5, '504', 'Maletín para mascotas Bijoux 82296099', 'vistas/img/productos/monello.jpeg', 29, 64798, 107997, 1, '2023-04-22 22:50:23'),
(45, 5, '505', 'MALETIN KANGOO S/M 37X16X36,5A GRIS 85748121', 'vistas/img/productos/monello.jpeg', 29, 108288, 180480, 1, '2023-04-22 22:50:23'),
(46, 5, '506', 'GUACAL CARRIER JET 10 73043099', 'vistas/img/productos/monello.jpeg', 29, 43946, 73243, 1, '2023-04-22 22:50:23'),
(47, 5, '507', 'Guacal Skudo Talla S 40x39x60 Cm', 'vistas/img/productos/monello.jpeg', 10, 121604, 202674, 0, '2022-08-06 15:46:45'),
(48, 5, '508', 'Adaptil Calmante en Spray para perros 60ml', 'vistas/img/productos/monello.jpeg', 50, 46088, 76814, 0, '2022-08-06 15:46:45'),
(49, 5, '509', 'Cargador Mascota Alea 30x20x16 cm Azul Petrol 28858', 'vistas/img/productos/monello.jpeg', 30, 56903, 94838, 0, '2022-08-06 15:46:45'),
(50, 5, '510', 'Arnes de Seguridad para Carro XS 20-50cm/15mm 1288', 'vistas/img/productos/monello.jpeg', 50, 18536, 30894, 0, '2022-08-06 15:46:45'),
(51, 6, '601', 'Max Cat gatos adultos pollo y arroz 10.1 Kg', 'vistas/img/productos/monello.jpeg', 20, 88800, 148000, 0, '2022-08-06 15:46:45'),
(52, 6, '602', 'Hills Science Diet Gatos Adultos Optimal Care 16 Lb', 'vistas/img/productos/monello.jpeg', 19, 179359, 298931, 1, '2023-04-22 22:32:07'),
(53, 6, '603', 'Hills Prescription Diet Gatos Digestive Care i/d Lata 5.5 Oz', 'vistas/img/productos/monello.jpeg', 30, 8129, 13549, 0, '2022-08-06 15:46:45'),
(54, 6, '604', 'Equilíbrio Concentrado Gatos Filhote 8.25 Kg', 'vistas/img/productos/monello.jpeg', 10, 134569, 224281, 0, '2022-08-06 15:46:45'),
(55, 6, '605', 'Cat Chow Gatos Adultos Hogareños 8 Kg', 'vistas/img/productos/monello.jpeg', 50, 65962, 109937, 0, '2022-08-06 15:46:45'),
(56, 6, '606', 'Max Premium Especial Perros Adultos Carne 15 Kg', 'vistas/img/productos/monello.jpeg', 100, 116245, 193742, 0, '2022-08-06 15:46:45'),
(57, 6, '607', 'Dog Chow Perros Adultos Razas Medianas y Grandes Vida Sana 22.7 Kg', 'vistas/img/productos/monello.jpeg', 30, 117728, 196214, 0, '2022-08-06 15:46:45'),
(58, 6, '608', 'Agility Gold Perros Adultos Razas Grandes Sin Granos 15 Kg', 'vistas/img/productos/monello.jpeg', 30, 149512, 249187, 0, '2022-08-06 15:46:45'),
(59, 6, '609', 'Hills Prescription Diet Perros Kidney Care k/d 8.5 Lb', 'vistas/img/productos/monello.jpeg', 20, 108347, 180578, 0, '2022-08-06 15:46:45'),
(60, 6, '610', 'Max Professional Line Perros Senior Pollo y Arroz 2 Kg', 'vistas/img/productos/monello.jpeg', 25, 19705, 32841, 0, '2022-08-06 15:46:45'),
(61, 21, '2101', 'Peine', 'vistas/img/productos/monello.jpeg', 31, 5000, 7000, 0, '2023-04-25 22:16:48'),
(62, 2, '211', 'Rascador Especial', 'vistas/img/productos/211/821.png', 18, 120000, 168000, 2, '2023-04-23 20:23:48'),
(63, 1, '111', 'Raton ', 'vistas/img/productos/monello.jpeg', 28, 1500.5, 2100.7, 3, '2023-04-25 22:29:40'),
(70, 6, '602', 'Corvatin', 'vistas/img/productos/602/192.png', 38, 3000, 4200, 3, '2023-04-25 22:16:48'),
(71, 0, '001', 'Perrito blanco', 'vistas/img/productos/001/679.png', 20, 50000, 70000, 0, '2023-04-26 00:04:12');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `perfil`, `foto`, `estado`, `ultimo_login`, `fecha`) VALUES
(11, 'Liliana Diaz', 'liliD', '$2a$07$usesomesillystringforemVnaGTCxgHkYewdsGlWFgUGKQ9SlWNO', 'Vendedor', 'vistas/img/usuarios/liliD/221.jpeg', 1, '2023-04-25 11:05:37', '2023-04-25 16:05:37'),
(16, 'Ahimelec Chia', 'AhimelecC', '$2a$07$usesomesillystringforedMOZHPqRNFjPO9LfnlQwyElWnSbAU2.', 'Administrador', 'vistas/img/usuarios/AhimelecC/207.jpg', 1, '2023-04-25 18:26:44', '2023-04-25 23:26:44'),
(18, 'Maria Pineda Zamora', 'MariaP', '$2a$07$usesomesillystringforeRdJnT.KzzVs6J8YSr1Ru.wJ8M5InoJa', 'MedicoVet', 'vistas/img/usuarios/MariaP/854.jpg', 1, '0000-00-00 00:00:00', '2023-04-25 23:29:41');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ventas`
--

INSERT INTO `ventas` (`idVenta`, `codigo`, `idCliente`, `id_vendedor`, `productos`, `impuesto`, `neto`, `total`, `metodo_pago`, `fecha`) VALUES
(15, 10004, 5, 11, '[{\"IdProduc\":\"5\",\"Descripcion\":\"Juguete de zorro en peluche para gatos incluye catnip.\",\"Cantidad\":\"1\",\"Stock\":\"14\",\"precio\":\"28511\",\"total\":\"28511\"}]', 5417.09, 28511, 33928.1, 'TD-5647', '2023-04-23 21:39:09'),
(22, 10006, 6, 17, '[{\"IdProduc\":\"8\",\"Descripcion\":\"Juguete Frisbee 17.5 cm para perros Pet-7407FS\",\"Cantidad\":\"1\",\"Stock\":\"99\",\"precio\":\"32498\",\"total\":\"32498\"}]', 6174.62, 32498, 38672.6, 'Efectivo', '2023-04-25 22:29:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`IdCat`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`IdCliente`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`IdProduc`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`idVenta`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `IdCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `IdProduc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `ventas`
--
ALTER TABLE `ventas`
  MODIFY `idVenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
