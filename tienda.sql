-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-04-2025 a las 23:23:36
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
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `idAdmin` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `cedulaAdmin` varchar(45) NOT NULL,
  `nombreAdmin` varchar(45) NOT NULL,
  `apellidoAdmin` varchar(45) NOT NULL,
  `telefonoAdmin` varchar(15) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`idAdmin`, `idUsuario`, `cedulaAdmin`, `nombreAdmin`, `apellidoAdmin`, `telefonoAdmin`, `created_at`, `updated_at`) VALUES
(1, 1, '12345678', 'admin', 'admin', '3123456789', '2025-04-03 23:20:37', '2025-04-19 06:37:04'),
(2, 3, '12346789', 'miniAdmin', 'admin', '3123456789', '2025-04-05 05:18:29', '2025-04-17 09:51:05'),
(3, 4, '111', 'Super', 'Admin', '3123456789', '2025-04-17 09:13:27', '2025-04-17 09:13:27'),
(4, 5, '222', 'master', 'Admin', '3123456789', '2025-04-17 09:15:59', '2025-04-17 09:15:59'),
(5, 6, '333', 'root', 'Admin', '3123456789', '2025-04-17 09:16:15', '2025-04-17 09:16:15'),
(6, 7, '444', 'prueba', 'Admin', '3123456789', '2025-04-17 09:17:27', '2025-04-17 09:17:27'),
(7, 8, '555', 'example', 'Admin', '3123456789', '2025-04-17 09:18:35', '2025-04-17 09:18:35'),
(8, 9, '1000576803', 'Brian', 'Beltran', '3208332507', '2025-04-17 09:19:38', '2025-04-17 09:19:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel_cache_4oWEsM4RR4DRhfeY', 's:7:\"forever\";', 2060382594),
('laravel_cache_7gRUmkz00OPZZKgf', 's:7:\"forever\";', 2059152071),
('laravel_cache_bJwwOZI2tzolxwSW', 's:7:\"forever\";', 2060386365),
('laravel_cache_gOChOq4igLmEwcYj', 's:7:\"forever\";', 2060383641),
('laravel_cache_mWgO1wv9TUuwrfpP', 's:7:\"forever\";', 2060386390),
('laravel_cache_X3mQd056UqagrUOn', 's:7:\"forever\";', 2059151402);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL,
  `nombreCategoria` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `nombreCategoria`, `created_at`, `updated_at`) VALUES
(1, 'BOARDS', '2025-04-03 18:23:05', '2025-04-17 02:19:44'),
(2, 'MEMORIA RAM', '2025-04-17 02:17:53', '2025-04-17 02:17:53'),
(3, 'ALMACENAMIENTO', '2025-04-17 02:17:53', '2025-04-17 02:17:53'),
(4, 'TARJETA GRAFICA', '2025-04-17 02:17:53', '2025-04-17 02:17:53'),
(5, 'MONITORES', '2025-04-17 02:17:53', '2025-04-17 02:17:53'),
(6, 'PERIFERICOS', '2025-04-17 02:17:53', '2025-04-17 02:17:53'),
(7, 'PROCESADORES', '2025-04-17 02:19:32', '2025-04-17 02:19:32'),
(8, 'FUENTES', '2025-04-17 02:19:32', '2025-04-17 02:19:32'),
(9, 'TECLADOS', '2025-04-17 02:20:42', '2025-04-17 02:20:42'),
(10, 'MOUSE', '2025-04-17 02:20:42', '2025-04-17 02:20:42'),
(11, 'AMD', '2025-04-17 02:23:19', '2025-04-17 02:23:19'),
(12, 'INTEL', '2025-04-17 02:23:19', '2025-04-17 02:23:19'),
(13, 'VENTILADORES', '2025-04-17 02:24:04', '2025-04-17 02:24:04'),
(14, 'DISIPADORES', '2025-04-17 02:24:04', '2025-04-17 02:24:04'),
(15, 'CHASIS', '2025-04-17 02:25:28', '2025-04-17 02:25:28'),
(16, 'DIADEMAS', '2025-04-17 02:25:28', '2025-04-17 02:25:28'),
(17, 'MICROFONOS', '2025-04-17 02:26:43', '2025-04-17 02:26:43'),
(18, 'CAMARAS', '2025-04-17 02:26:43', '2025-04-17 02:26:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoriaproducto`
--

CREATE TABLE `categoriaproducto` (
  `idProducto` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoriaproducto`
--

INSERT INTO `categoriaproducto` (`idProducto`, `idCategoria`) VALUES
(1, 1),
(2, 3),
(3, 8),
(4, 8),
(5, 7),
(5, 12),
(6, 7),
(6, 12),
(7, 6),
(7, 9),
(8, 6),
(8, 10),
(9, 7),
(9, 11),
(10, 7),
(10, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `cedulaCliente` varchar(20) NOT NULL,
  `nombreCliente` varchar(45) NOT NULL,
  `apellidoCliente` varchar(45) NOT NULL,
  `telefonoCliente` varchar(15) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `idUsuario`, `cedulaCliente`, `nombreCliente`, `apellidoCliente`, `telefonoCliente`, `direccion`, `created_at`, `updated_at`) VALUES
(1, 2, '123456789', 'Juana', 'Pérez', '3216549870', 'Calle 123 #45-67', '2025-04-03 23:21:12', '2025-04-19 06:48:10'),
(2, 10, '1000576804', 'Alexander', 'Poveda', '3246150849', 'KR 53 C 128 19', '2025-04-19 05:24:31', '2025-04-19 05:24:31'),
(3, 11, '1032457896', 'Laura', 'Gómez', '3102589631', 'Carrera 45 #12-34', '2025-04-19 05:26:47', '2025-04-19 05:26:47'),
(4, 12, '1098456231', 'Carlos', 'Ramírez', '3117894562', 'Calle 89 #56-78', '2025-04-19 05:27:31', '2025-04-19 05:27:31'),
(5, 13, '1012365478', 'Diana', 'Martínez', '3134567890', 'Avenida 3 #23-90', '2025-04-19 05:27:41', '2025-04-19 05:27:41'),
(6, 14, '1054678921', 'Andrés', 'López', '3001234567', 'Transversal 7 #65-12', '2025-04-19 05:27:47', '2025-04-19 05:27:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `idfactura` int(11) NOT NULL,
  `idPedido` int(11) NOT NULL,
  `fechaFactura` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `idMarca` int(11) NOT NULL,
  `nombreMarca` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`idMarca`, `nombreMarca`, `created_at`, `updated_at`) VALUES
(1, 'ASUS', '2025-04-03 18:24:48', '2025-04-17 02:08:05'),
(2, 'MSI', '2025-04-17 02:07:55', '2025-04-17 02:07:55'),
(3, 'GIGABYTE', '2025-04-17 02:07:55', '2025-04-17 02:07:55'),
(4, 'CORSAIR', '2025-04-17 02:10:15', '2025-04-17 02:10:15'),
(5, 'KINGSTON', '2025-04-17 02:10:15', '2025-04-17 02:10:15'),
(6, 'LG', '2025-04-17 02:11:52', '2025-04-17 02:11:52'),
(7, 'ACER', '2025-04-17 02:11:52', '2025-04-17 02:11:52'),
(8, 'LOGITECH', '2025-04-17 02:13:48', '2025-04-17 02:13:48'),
(9, 'REDRAGON', '2025-04-17 02:13:48', '2025-04-17 02:13:48'),
(10, 'TRUST', '2025-04-17 02:15:12', '2025-04-17 02:15:12'),
(11, 'NVIDIA', '2025-04-17 02:15:12', '2025-04-17 02:15:12'),
(12, 'THERMALTAKE', '2025-04-17 02:16:02', '2025-04-17 02:16:02'),
(13, 'INTEL', '2025-04-17 02:22:29', '2025-04-17 02:22:29'),
(14, 'AMD', '2025-04-17 02:22:29', '2025-04-17 02:22:29'),
(15, 'XPG', '2025-04-17 02:27:34', '2025-04-17 02:27:34'),
(16, 'DELL', '2025-04-17 02:27:34', '2025-04-17 02:27:34'),
(17, 'SanDisk ', '2025-04-17 02:32:46', '2025-04-17 02:32:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_03_26_214850_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `idPedido` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `fechaPedido` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidoproducto`
--

CREATE TABLE `pedidoproducto` (
  `idProducto` int(11) NOT NULL,
  `idPedido` int(11) NOT NULL,
  `cantidadProducto` int(11) NOT NULL,
  `valorTotal` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idProducto` int(11) NOT NULL,
  `nombreProducto` varchar(45) NOT NULL,
  `definicion` text NOT NULL,
  `idMarca` int(11) NOT NULL,
  `valorProducto` int(11) NOT NULL,
  `disponibilidad` tinyint(4) NOT NULL,
  `idProveedor` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProducto`, `nombreProducto`, `definicion`, `idMarca`, `valorProducto`, `disponibilidad`, `idProveedor`, `created_at`, `updated_at`) VALUES
(1, 'BOARD ASUS B550M-A AC WIFI', 'es una board', 1, 542000, 1, 1, '2025-04-03 18:25:16', '2025-04-19 08:13:26'),
(2, 'SanDisk Extreme Portable SSD 1TB', 'Tipo: SSD externo portátil\r\n\r\nInterfaz: USB-C 3.2 Gen 2 (10 Gbps)\r\n\r\nVelocidad de lectura: Hasta 1000 MB/s\r\n\r\nResistencia: Certificación IP65 (resistente al agua y polvo)\r\n\r\nCompatibilidad: PS5, PC, Mac', 17, 600000, 1, 1, '2025-04-17 02:34:18', '2025-04-17 02:34:18'),
(3, 'Thermaltake Smart BX1 650W 80+ Bronze', 'Potencia: 650W\r\n\r\nCertificación: 80 Plus Bronze\r\n\r\nConectores: 24 pines x1, 4+4 pines x1, SATA x6, PCI-E x2, periférico x4, FDD x1\r\n\r\nVentilador: 120mm silencioso', 12, 345000, 1, 1, '2025-04-17 02:41:08', '2025-04-17 02:41:08'),
(4, 'XPG PYLON 650W 80+ Bronze', 'Potencia: 650W\n\nCertificación: 80 Plus Bronze\n\nConectores: SATA x12, PCI-E x4, HDD x12, Floppy x1', 15, 350000, 1, 1, '2025-04-17 02:41:08', '2025-04-19 03:02:03'),
(5, 'Intel Core i5-12400F (12ª Gen)', 'Núcleos/Hilos: 6 núcleos, 12 hilos\n\nFrecuencia base: 2.5 GHz\n\nFrecuencia turbo: Hasta 4.4 GHz\n\nCaché: 18 MB Intel Smart Cache\n\nSocket: LGA 1700\n\nGráficos integrados: No\n\nIncluye disipador: Sí', 13, 590000, 1, 1, '2025-04-17 02:41:08', '2025-04-19 03:02:20'),
(6, 'Intel Core i5-13400 (13ª Gen)', 'Núcleos/Hilos: 10 núcleos (6 Performance + 4 Efficient), 16 hilos\r\n\r\nFrecuencia base: 2.5 GHz\r\n\r\nCaché: 20 MB Intel Smart Cache\r\n\r\nSocket: LGA 1700\r\n\r\nGráficos integrados: Sí', 13, 1060000, 1, 1, '2025-04-17 02:41:08', '2025-04-17 02:41:08'),
(7, 'Teclado Mecánico Redragon Kumara K552', 'Tipo: Mecánico\r\n\r\nSwitches: Outemu Blue (clicky)\r\n\r\nRetroiluminación: LED rojo\r\n\r\nConstrucción: Placa superior metálica\r\n\r\nConectividad: USB', 9, 150000, 1, 1, '2025-04-17 02:41:08', '2025-04-17 02:41:08'),
(8, 'Mouse Logitech G203 Lightsync', 'DPI: Hasta 8,000\r\n\r\nIluminación: RGB personalizable\r\n\r\nBotones programables: 6\r\n\r\nConectividad: USB\r\n\r\n', 8, 120000, 1, 1, '2025-04-17 02:41:08', '2025-04-17 02:41:08'),
(9, 'AMD Ryzen 5 5600X', 'Núcleos / Hilos: 6 núcleos / 12 hilos\r\n\r\nFrecuencia base / turbo: 3.7 GHz / hasta 4.6 GHz\r\n\r\nCaché: 32 MB L3\r\n\r\nSocket: AM4\r\n\r\nTDP: 65W\r\n\r\nGráficos integrados: No\r\n\r\nIncluye disipador: Sí, AMD Wraith Stealth', 14, 700000, 1, 1, '2025-04-17 02:41:08', '2025-04-17 02:41:08'),
(10, 'AMD Ryzen 7 5800X', 'Núcleos / Hilos: 8 núcleos / 16 hilos\r\n\r\nFrecuencia base / turbo: 3.8 GHz / hasta 4.7 GHz\r\n\r\nCaché: 32 MB L3\r\n\r\nSocket: AM4\r\n\r\nTDP: 105W\r\n\r\nGráficos integrados: No\r\n\r\nIncluye disipador: No', 14, 900000, 1, 1, '2025-04-17 02:41:08', '2025-04-17 02:41:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `idProveedor` int(11) NOT NULL,
  `nombreProveedor` varchar(45) NOT NULL,
  `emailProveedor` varchar(45) NOT NULL,
  `telefonoProveedor` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`idProveedor`, `nombreProveedor`, `emailProveedor`, `telefonoProveedor`, `created_at`, `updated_at`) VALUES
(1, 'PC SYSTEMS', 'pcsystems@gmail.com', '43256442', '2025-04-03 18:24:30', '2025-04-03 18:24:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idRol` int(11) NOT NULL,
  `nombreRol` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idRol`, `nombreRol`, `created_at`, `updated_at`) VALUES
(1, 'Cliente', '2025-04-03 23:05:43', '2025-04-03 23:05:43'),
(2, 'Admin', '2025-04-03 23:07:07', '2025-04-03 23:07:07'),
(3, 'SuperAdmin', '2025-04-04 20:22:00', '2025-04-04 20:22:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('tbdpipsDTwD4NwdIyNMFqiea1h6S63gdLqcVkVxD', 1, '127.0.0.1', 'PostmanRuntime/7.43.3', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZjdKNlVLZk1tQUI0dndhSnQ5OXM5OHRCNk1EOWpzYmtCQ3d6dmI1bSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1745030269);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `idRol` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `email`, `password`, `idRol`, `created_at`, `updated_at`) VALUES
(1, 'admin@admin.com', '$2y$12$wfH0WPh15EojpatD1Aw16.ojASF9fxKHvtDkqjxywm65XPmVLtOlG', 3, '2025-04-03 23:20:37', '2025-04-19 01:58:18'),
(2, 'perez@example.com', '$2y$12$rozrV6l6Bwna3DOpqk/JSe6NKh42kLP1jsVmmITzhVrNFyuVsQZG6', 1, '2025-04-03 23:21:12', '2025-04-03 23:21:12'),
(3, 'mini@prueba.com', '$2y$12$lcffKjB0j0L3EresvAfV6eHA9pnZG0c3IY2w1uAbC0jL2m4tHI/xS', 2, '2025-04-05 05:18:29', '2025-04-17 04:30:42'),
(4, 'super@admin.com', '$2y$12$Onsw.X2agETWFQBUqOuf/uP7maqxALWBz4MtjPA7pfY8BZLuV20yG', 3, '2025-04-17 09:13:27', '2025-04-17 09:24:56'),
(5, 'master@admin.com', '$2y$12$tFtTVnt/buBkQZ6hxrw6aOOaXcaKarj2rL0bdzKmbNw5T4MR2R8Jq', 3, '2025-04-17 09:15:59', '2025-04-17 09:25:10'),
(6, 'root@prueba.com', '$2y$12$ZyZqk9dvfQsnYXHZOI3X4Oe9QP1Cb6Ib/O8bhfobUZzTQRxo/PWT6', 2, '2025-04-17 09:16:15', '2025-04-17 04:30:33'),
(7, 'ex@prueba.com', '$2y$12$9pr1ONU0v2u9jT6EDetDn.eYo3rZ5Nm/nVoE2PVMde1YGSwonDmOq', 2, '2025-04-17 09:17:27', '2025-04-19 06:58:22'),
(8, 'example@prueba.com', '$2y$12$sYvQuOqHUX0uev9.93uxPuORj1FCYqUslBh9QlbT3I1.JmOwm5bVi', 2, '2025-04-17 09:18:35', '2025-04-17 09:18:35'),
(9, 'babeltranp@gmail.com', '$2y$12$NDlsswFkKy5D0FO9X7bFTeN4hsGgRQDdcCE9a0qD1EqwY/7j/Yl4i', 3, '2025-04-17 09:19:38', '2025-04-17 09:25:20'),
(10, 'bibi@gmail.com', '$2y$12$H2AOF21UWrf.Vb4lNuzP0Oyy9B.T795Ul6iAd0CCK2PRfTll1TCIu', 1, '2025-04-19 05:24:31', '2025-04-19 05:24:31'),
(11, 'laura.gomez@example.com', '$2y$12$Gf5rU5SEuCiQGxdWJ/7gPueXprxOZayG6ukPtuDAz45FAqKsZ0RC.', 1, '2025-04-19 05:26:47', '2025-04-19 05:26:47'),
(12, 'carlos.ramirez@example.com', '$2y$12$fdBCapflWa4fTGwgzlZnu.vWo6/YMrww.jMs36ObKDqQYrcDBFwIm', 1, '2025-04-19 05:27:31', '2025-04-19 05:27:31'),
(13, 'diana.martinez@example.com', '$2y$12$xTDU7R.MS.PdsxevXJC2je/jdwC.DWGBd/xUAfdOxaPwMxThq0XTm', 1, '2025-04-19 05:27:41', '2025-04-19 05:27:41'),
(14, 'andres.lopez@example.com', '$2y$12$3DbKeAMQrQnJdjGdkkSnUup8VvgAdfbI5vVjJJHfBCchHgppZapxO', 1, '2025-04-19 05:27:47', '2025-04-19 05:27:47');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAdmin`),
  ADD KEY `fk_admin_usuario1_idx` (`idUsuario`);

--
-- Indices de la tabla `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `categoriaproducto`
--
ALTER TABLE `categoriaproducto`
  ADD PRIMARY KEY (`idProducto`,`idCategoria`),
  ADD KEY `fk_producto_tienda_categoria_categoria1_idx` (`idCategoria`),
  ADD KEY `fk_producto_tienda_categoria_producto1_idx` (`idProducto`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`),
  ADD KEY `fk_cliente_usuario1_idx` (`idUsuario`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`idfactura`),
  ADD KEY `fk_factura_pedido1_idx` (`idPedido`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indices de la tabla `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`idMarca`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`idPedido`),
  ADD KEY `fk_pedido_cliente1_idx` (`idCliente`);

--
-- Indices de la tabla `pedidoproducto`
--
ALTER TABLE `pedidoproducto`
  ADD PRIMARY KEY (`idProducto`,`idPedido`),
  ADD KEY `fk_producto_tienda_pedido_pedido1_idx` (`idPedido`),
  ADD KEY `fk_producto_tienda_pedido_producto1_idx` (`idProducto`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idProducto`),
  ADD KEY `fk_producto_marca1_idx` (`idMarca`),
  ADD KEY `fk_producto_proveedor1_idx` (`idProveedor`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`idProveedor`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `fk_usuario_rol1_idx` (`idRol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `idfactura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `idMarca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `idPedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `idProveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `fk_admin_usuario1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `categoriaproducto`
--
ALTER TABLE `categoriaproducto`
  ADD CONSTRAINT `fk_producto_tienda_categoria_categoria1` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`idCategoria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_producto_tienda_categoria_producto1` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fk_cliente_usuario1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `fk_factura_pedido1` FOREIGN KEY (`idPedido`) REFERENCES `pedido` (`idPedido`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_pedido_cliente1` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pedidoproducto`
--
ALTER TABLE `pedidoproducto`
  ADD CONSTRAINT `fk_producto_tienda_pedido_pedido1` FOREIGN KEY (`idPedido`) REFERENCES `pedido` (`idPedido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_producto_tienda_pedido_producto1` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_producto_marca1` FOREIGN KEY (`idMarca`) REFERENCES `marca` (`idMarca`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_producto_proveedor1` FOREIGN KEY (`idProveedor`) REFERENCES `proveedor` (`idProveedor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_rol1` FOREIGN KEY (`idRol`) REFERENCES `rol` (`idRol`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
