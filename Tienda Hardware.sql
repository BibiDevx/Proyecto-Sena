-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-02-2025 a las 18:34:50
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `idAdmin` int(11) NOT NULL COMMENT 'numero con el que se identificara al administrativo',
  `idUsuario` int(11) NOT NULL COMMENT 'numero con el que se identificara el usuario que es',
  `nombreAdmin` varchar(25) NOT NULL COMMENT 'cadena de caracteres que identificara el nombre del administrativo',
  `correoAdmin` varchar(25) NOT NULL COMMENT 'cadena de caracteres que identificara el correo del administrativo ',
  `claveAdmin` varchar(10) NOT NULL,
  `telefonoAdmin` bigint(12) NOT NULL COMMENT 'numero con el que se identificara el telefono del administrativo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`idAdmin`, `idUsuario`, `nombreAdmin`, `correoAdmin`, `claveAdmin`, `telefonoAdmin`) VALUES
(1, 2, 'miguel a', 'miguela@gmail.com', '', 3216546544),
(2, 2, 'miguel b', 'miguelb@gmail.com', '123', 3216546556);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL COMMENT 'numero con el que se identificara la categoria',
  `nombreCategoria` varchar(25) NOT NULL COMMENT 'cadena de caracteres que identificara el nombre de la categoria'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `nombreCategoria`) VALUES
(1, 'PERIFERICOS'),
(2, 'MONITORES'),
(3, 'PROCESADORES'),
(4, 'VENTILADORES'),
(5, 'TARJETAS DE VIDEO'),
(6, 'ALMACENAMIENTO'),
(7, 'BOARDS'),
(8, 'CHASIS'),
(9, 'FUENTES'),
(10, 'MEMORIA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoriaproducto`
--

CREATE TABLE `categoriaproducto` (
  `idCategoria` int(11) NOT NULL COMMENT 'numero con el que se identificara la categoria',
  `idProducto` int(11) NOT NULL COMMENT 'numero con el que se identificara el producto'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoriaproducto`
--

INSERT INTO `categoriaproducto` (`idCategoria`, `idProducto`) VALUES
(7, 1),
(7, 2),
(7, 3),
(7, 4),
(7, 5),
(7, 6),
(7, 7),
(10, 10),
(10, 11),
(5, 12),
(9, 9),
(9, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL COMMENT 'numero con el que se identificara el cliente',
  `idUsuario` int(11) NOT NULL COMMENT 'numero con el que se identificara para saber que tipo de usuario es',
  `nombreCliente` varchar(25) NOT NULL COMMENT 'cadena de caracteres que identificara el nombre del cliente',
  `apellidoCliente` varchar(20) NOT NULL COMMENT 'apellido del cliente',
  `cedulaCliente` varchar(20) NOT NULL COMMENT 'numero de identidad',
  `correoCliente` varchar(50) NOT NULL COMMENT 'cadena de caracteres que identificara el correo del cliente ',
  `passwordCliente` varchar(120) NOT NULL COMMENT 'cadena de caracteres que identificara la clave para el ingreso del cliente ',
  `telefonoCliente` varchar(20) NOT NULL COMMENT 'numero con el que se identificara el numero telefonico',
  `direccionCliente` varchar(25) NOT NULL COMMENT 'cadena de caracteres que identificara la direccion del cliente '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `idUsuario`, `nombreCliente`, `apellidoCliente`, `cedulaCliente`, `correoCliente`, `passwordCliente`, `telefonoCliente`, `direccionCliente`) VALUES
(2, 3, 'prueba20', 'test0', '1234', 'pruebashow@gmail.com', '$2y$10$35ooJ1G7klcbFHfIcQlz8uoxSY6ky4Eb1vIEFqHqLWCKRCfS86BdO', '123456788', 'pruebA'),
(19, 3, 'Marx', 'Lopez', '1000254806', 'marxlop@gmail.com', '$2y$10$iapSN/RjJHW6cxiwFeIrNuZVPJR5pJhTHHlPhBsGbWnUPMwGHM0ou', '3162568899', 'CL 21 56 48'),
(20, 3, 'prueba', 'test', '1000578963', 'testpru@gmail.com', '$2y$10$vAjc5pUfI3mJpsAQEIU4UOgI762PvBLGgBQi1Q0Ud/cObMO/qF/ne', '321568974', 'CR 58 189 19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `idFactura` int(11) NOT NULL COMMENT 'numero con el que se identificara la factura',
  `idPedido` int(11) NOT NULL COMMENT 'numero con el que se identificara el pedido',
  `fechaFactura` date NOT NULL COMMENT 'fecha en la que fue hecha la factura'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`idFactura`, `idPedido`, `fechaFactura`) VALUES
(2, 3, '2025-02-12'),
(3, 4, '2025-02-12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `idPedido` int(11) NOT NULL COMMENT 'numero con el que se identificara el pedido',
  `idCliente` int(11) NOT NULL COMMENT 'numero con el que se identificara el usuario cliente',
  `fechaPedido` date NOT NULL COMMENT 'fecha de cuando fue hecho el pedido '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`idPedido`, `idCliente`, `fechaPedido`) VALUES
(3, 20, '2025-02-11'),
(4, 2, '2025-02-05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidoproducto`
--

CREATE TABLE `pedidoproducto` (
  `idProducto` int(11) NOT NULL COMMENT 'numero con el que se identificara el producto',
  `idPedido` int(11) NOT NULL COMMENT 'numero con el que se identificara el pedido',
  `cantidadProducto` int(11) NOT NULL COMMENT 'numero que determinara cuantos productos son',
  `valorTotal` int(11) NOT NULL COMMENT 'numero con el que determinara el valor del pedido'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidoproducto`
--

INSERT INTO `pedidoproducto` (`idProducto`, `idPedido`, `cantidadProducto`, `valorTotal`) VALUES
(1, 3, 4, 2168000),
(8, 4, 2, 578000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idProducto` int(11) NOT NULL COMMENT 'numero con el que se identificara el producto',
  `nombreProducto` varchar(100) NOT NULL COMMENT 'cadena de caracteres que identificara el nombre del producto',
  `definicionProducto` text NOT NULL COMMENT 'caja de texto que proporcionara informacion sobre el producto',
  `valorProducto` int(11) NOT NULL COMMENT 'numero con el que se proporciona el valor del producto',
  `idProveedor` int(11) DEFAULT NULL COMMENT 'numero con el que se identificara el proveedor',
  `disponibilidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProducto`, `nombreProducto`, `definicionProducto`, `valorProducto`, `idProveedor`, `disponibilidad`) VALUES
(1, 'BOARD ASUS B550M-A AC WIFI', '<br>\r\n<li>Socket AMD AM4: Listo para procesadores Ryzen™ de escritorio Series 5000, 4000G y 3000.</li>\r\n<li>Refrigeración completa: Disipador de VRM, disipador de PCH y Fan Xpert 2+.</li>\r\n<li>Conectividad ultrarrápida: Dual M.2, PCIe 4.0, Wi-Fi 802.11ac, USB 3.2 Gen 2 tipo A.</li>\r\n<li>Aura Sync RGB: Efectos LED sincronizables en una amplia gama de equipos de PC compatibles, incluidas tiras RGB direccionables.</li>\r\n</br>', 542000, 1, 1),
(2, 'BOARD ASUS B650M-A WIFI', '<br>\r\n<li>Socket AMD AM5: Listo para procesadores de escritorio AMD Ryzen™.\r\nConectividad ultrarrápida: Wi-Fi 6, M.2 PCIe 5.0, Realtek 2.5Gb Ethernet, puertos USB 3.2 Gen 2, USB 3.2 Gen 1 Type-C® frontal .</li>\r\n<li>ASUS OptiMem II: Enrutamiento cuidadoso de trazas y vías, además de optimizaciones de la capa base para preservar la integridad de la señal para mejorar el overclocking de la memoria.</li>\r\n<li>Enfriamiento completo: Disipador de calor VRM, disipador de calor PCH, puertos de ventilador híbrido y Fan Xpert 2+.</li>\r\n<li>Iluminación Aura Sync RGB: Puertos direccionables Gen 2 integrados y puerto Aura RGB para tiras de LED RGB, sincronízalos fácilmente con hardware compatible con Aura Sync.</li>\r\n</br>', 875000, 1, 1),
(3, 'BOARD ASUS H510M-K', '<br>\r\n<li>Socket Intel® LGA 1200: Listo para procesadores Intel® 11a y 10a Gen.</li>\r\n<li>Conectividad ultrarrápida: PCIe 4.0, puerto M.2 de 32 Gbps, Intel® Ethernet de 1 Gb y USB 3.2 Gen 1.</li>\r\n<li>Refrigeración completa: Disipador de calor PCH y Fan Xpert.</li>\r\n<li>5X Protection III: Múltiples protecciones de hardware para una protección completa.</li>\r\n</br>', 402000, 1, 1),
(4, 'BOARD GIGABYTE A520M-K V2', '', 329000, 1, 1),
(5, 'BOARD GIGABYTE B550M DS3H', '', 525000, 1, 1),
(6, 'BOARD MSI A520M-A PRO', '', 329000, 1, 1),
(7, 'BOARD MSI PRO B550M VDH WIFI', '', 483000, 1, 1),
(8, 'FUENTE CORSAIR CV 650W 80', '', 289000, 1, 1),
(9, 'FUENTE CORSAIR CV 750W 80', '', 329000, 1, 1),
(10, 'MEMORIA RAM DDR4 8GB 3600MHz CORSAIR VENGEANCE LPX', '', 112000, 1, 1),
(11, 'MEMORIA RAM PORTATIL DDR4 16GB 3200MHz CORSAIR VENGEANCE', '', 178000, 1, 1),
(12, 'tarjetaDeVideo', '', 1000, 1, 1),
(13, 'Monitor Led Lg 24″ Ips Fhd 1ms-180Hz-G-Sync 24gs65f-B Pivot', '', 729000, 3, 1),
(14, 'Monitor Led Lg 32″ Va Full Hd Curvo 100hz 32mr50c-B', '', 789000, 2, 1),
(15, 'Monitor Led Lg 24″ Ips Fhd 1ms-180Hz-G-Sync 24gs65f-B Pivot', '', 729000, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `idProveedor` int(11) NOT NULL COMMENT 'numero con el que se identificara el proveedor',
  `nombreProveedor` varchar(25) NOT NULL COMMENT 'cadena de caracteres que identificara el nombre del proveedor',
  `correoProveedor` varchar(50) NOT NULL COMMENT 'adena de caracteres que identificara el correo del proveedor ',
  `telefonoProveedor` bigint(12) NOT NULL COMMENT 'numero con el que se identificara el telefono del proveedor'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`idProveedor`, `nombreProveedor`, `correoProveedor`, `telefonoProveedor`) VALUES
(1, 'compSAS', 'sas@gmail.com', 3123456975),
(2, 'DMI Computer', 'dmicomputer@gmail.com', 321456556),
(3, 'PC SYSTEMS', 'pcsystems@gmail.com', 43256442);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL COMMENT 'numero con el que se identificara el tipo de usuario que es',
  `rolUsuario` varchar(20) NOT NULL COMMENT 'cadena de caracteres que identificara el nombre del usuario que es'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `rolUsuario`) VALUES
(1, 'Administrador'),
(2, 'Administrativo'),
(3, 'Cliente');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAdmin`),
  ADD KEY `FKidUser` (`idUsuario`) USING BTREE;

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `categoriaproducto`
--
ALTER TABLE `categoriaproducto`
  ADD KEY `idCategoria` (`idCategoria`),
  ADD KEY `idProducto` (`idProducto`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`) USING BTREE,
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `FKidUser` (`idUsuario`) USING BTREE;

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`idFactura`),
  ADD UNIQUE KEY `FKpedido` (`idPedido`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`idPedido`),
  ADD UNIQUE KEY `FKidCliente` (`idCliente`);

--
-- Indices de la tabla `pedidoproducto`
--
ALTER TABLE `pedidoproducto`
  ADD UNIQUE KEY `FKproducto` (`idProducto`),
  ADD UNIQUE KEY `FKpedido` (`idPedido`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idProducto`),
  ADD KEY `FKproveedor` (`idProveedor`) USING BTREE;

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`idProveedor`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT COMMENT 'numero con el que se identificara al administrativo', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT COMMENT 'numero con el que se identificara la categoria', AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT COMMENT 'numero con el que se identificara el cliente', AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `idFactura` int(11) NOT NULL AUTO_INCREMENT COMMENT 'numero con el que se identificara la factura', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `idPedido` int(11) NOT NULL AUTO_INCREMENT COMMENT 'numero con el que se identificara el pedido', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT COMMENT 'numero con el que se identificara el producto', AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `idProveedor` int(11) NOT NULL AUTO_INCREMENT COMMENT 'numero con el que se identificara el proveedor', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT COMMENT 'numero con el que se identificara el tipo de usuario que es', AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `categoriaproducto`
--
ALTER TABLE `categoriaproducto`
  ADD CONSTRAINT `categoriaproducto_ibfk_1` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `categoriaproducto_ibfk_2` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`idCategoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`idPedido`) REFERENCES `pedido` (`idPedido`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedidoproducto`
--
ALTER TABLE `pedidoproducto`
  ADD CONSTRAINT `pedidoproducto_ibfk_1` FOREIGN KEY (`idPedido`) REFERENCES `pedido` (`idPedido`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pedidoproducto_ibfk_2` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`idProveedor`) REFERENCES `proveedor` (`idProveedor`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
