-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2025 at 07:25 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marketplace_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `slug`, `descripcion`, `imagen`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Tecnologia', 'tecnologia', 'Celulares, computadores, tablets y accesorios', '1751408690.jpg', 1, '2025-05-22 12:50:54', '2025-07-01 22:24:50'),
(2, 'Electrodomesticos', 'electrodomesticos', 'Neveras, lavadoras, hornos, televisores, etc.', '1751408634.jpg', 1, '2025-05-22 12:50:54', '2025-07-01 22:23:54'),
(3, 'Hogar y Muebles', 'hogar-muebles', 'Articulos para el hogar y muebles', '1751408643.webp', 1, '2025-05-22 12:50:54', '2025-07-01 22:24:03'),
(4, 'Ropa y Accesorios', 'ropa-accesorios', 'Ropa para hombre, mujer y niños', '1751408673.jpg', 1, '2025-05-22 12:50:54', '2025-07-01 22:24:33'),
(5, 'Vehiculos', 'vehiculos', 'Carros, motos y accesorios automotrices', '1751408584.jpeg', 1, '2025-05-22 12:50:54', '2025-07-01 22:23:04'),
(6, 'Deportes', 'deportes', 'Articulos deportivos y de entrenamiento', '1751408593.jpg', 1, '2025-05-22 12:50:54', '2025-07-01 22:23:13'),
(7, 'Juguetes y Niños', 'juguetes-ninos', 'Juguetes, juegos y articulos infantiles', '1751408650.jpeg', 1, '2025-05-22 12:50:54', '2025-07-01 22:24:10'),
(8, 'Salud y Belleza', 'salud-belleza', 'Cosmeticos, cuidado personal y suplementos', '1751408682.jpg', 1, '2025-05-22 12:50:54', '2025-07-01 22:24:42'),
(9, 'Mascotas', 'mascotas', 'Productos para perros, gatos y otros animales', '1751408664.jpg', 1, '2025-05-22 12:50:54', '2025-07-01 22:24:24'),
(10, 'Libros y Papeleria', 'libros-papeleria', 'Libros, utiles escolares y oficina', '1751408657.jpg', 1, '2025-05-22 12:50:54', '2025-07-01 22:24:17'),
(12, 'nuevo', 'nuevo', 'nueva categoria', '1751642819.jpg', 1, '2025-07-04 15:26:59', '2025-07-04 15:26:59');

-- --------------------------------------------------------

--
-- Table structure for table `ciudades`
--

CREATE TABLE `ciudades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ciudades`
--

INSERT INTO `ciudades` (`id`, `nombre`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Bogota', 1, '2025-05-22 12:42:29', '2025-06-25 15:56:42'),
(2, 'Medellin', 1, '2025-05-22 12:42:29', '2025-06-25 15:57:43'),
(3, 'Cali', 1, '2025-05-22 12:42:29', '2025-06-25 15:57:49'),
(4, 'Barranquilla', 1, '2025-05-22 12:42:29', '2025-05-22 12:42:29'),
(5, 'Cartagena', 1, '2025-05-22 12:42:29', '2025-05-22 12:42:29'),
(6, 'Bucaramanga', 1, '2025-05-22 12:42:29', '2025-05-22 12:42:29'),
(7, 'Pereira', 1, '2025-05-22 12:42:29', '2025-05-22 12:42:29'),
(8, 'Manizales', 1, '2025-05-22 12:42:29', '2025-05-22 12:42:29'),
(9, 'Santa Marta', 1, '2025-05-22 12:42:29', '2025-05-22 12:42:29'),
(10, 'Villavicencio', 1, '2025-05-22 12:42:29', '2025-05-22 12:42:29');

-- --------------------------------------------------------

--
-- Table structure for table `comentarios`
--

CREATE TABLE `comentarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` text NOT NULL,
  `valoracion` int(11) NOT NULL,
  `estado` varchar(255) NOT NULL DEFAULT '1',
  `usuario_id` bigint(20) UNSIGNED DEFAULT NULL,
  `producto_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comentarios`
--

INSERT INTO `comentarios` (`id`, `descripcion`, `valoracion`, `estado`, `usuario_id`, `producto_id`, `created_at`, `updated_at`) VALUES
(256, 'La cancelación de ruido es increíble, perfectos para viajes', 5, '1', 2, 1, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(257, 'Batería dura menos de lo esperado', 3, '1', 3, 1, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(258, 'Muy cómodos para uso prolongado', 4, '1', 4, 1, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(259, 'El sonido es cristalino, valen cada peso', 5, '1', 5, 1, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(260, 'La app de configuración podría ser mejor', 4, '1', 6, 1, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(261, 'Pantalla AMOLED es espectacular', 5, '1', 1, 2, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(262, 'Demasiado grande para llevarla cómodamente', 3, '1', 3, 2, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(263, 'Perfecta para tomar notas y ver películas', 5, '1', 7, 2, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(264, 'El S Pen debería venir incluido', 2, '1', 8, 2, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(265, 'Rendimiento excelente para multitarea', 5, '1', 10, 2, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(266, 'Monitor cardiaco muy preciso', 5, '1', 1, 3, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(267, 'Batería dura solo un día con uso intensivo', 3, '1', 4, 3, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(268, 'Perfecto para entrenamientos', 4, '1', 6, 3, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(269, 'Demasiado caro para lo que ofrece', 2, '1', 9, 3, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(270, 'La integración con iPhone es perfecta', 5, '1', 2, 3, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(271, 'Cámara 4K es impresionante', 5, '1', 3, 4, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(272, 'Tiempo de vuelo real es menor al anunciado', 4, '1', 5, 4, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(273, 'Muy estable incluso con viento', 5, '1', 7, 4, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(274, 'Aplicación móvil es complicada de usar', 3, '1', 10, 4, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(275, 'Vale la pena la inversión', 5, '1', 1, 4, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(276, 'Pantalla ultrawide es perfecta para productividad', 5, '1', 2, 5, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(277, 'Llegó con un pixel muerto', 1, '1', 4, 5, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(279, 'Los colores son muy precisos', 4, '1', 8, 5, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(280, 'Base ocupa mucho espacio', 3, '1', 10, 5, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(281, 'Switches mecánicos son muy satisfactorios', 5, '1', 1, 6, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(282, 'RGB es muy personalizable', 4, '1', 3, 6, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(283, 'Demasiado ruidoso para oficina', 2, '1', 7, 6, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(284, 'Construcción muy sólida', 5, '1', 9, 6, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(285, 'Cable no es desmontable', 3, '1', 2, 6, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(286, 'Funciona perfecto en Mac y PC', 5, '1', 3, 7, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(287, 'Velocidades de transferencia como anuncian', 4, '1', 5, 7, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(288, 'Ligero y portátil', 5, '1', 7, 7, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(289, 'Cable USB incluido es muy corto', 3, '1', 10, 7, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(290, 'Buena relación capacidad/precio', 4, '1', 1, 7, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(291, 'Cobertura WiFi excelente en toda la casa', 5, '1', 2, 8, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(292, 'Configuración inicial complicada', 3, '1', 4, 8, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(293, 'Velocidades consistentes', 4, '1', 6, 8, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(294, 'Se calienta bastante', 3, '1', 8, 8, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(295, 'Muy estable, no requiere reinicios', 5, '1', 10, 8, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(296, 'Calidad de imagen profesional', 5, '1', 1, 9, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(297, 'Enfoque automático es rápido y preciso', 5, '1', 3, 9, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(298, 'Batería dura poco en video 4K', 4, '1', 7, 9, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(299, 'Menú complejo para principiantes', 3, '1', 9, 9, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(300, 'Cuerpo bien construido y ergonómico', 5, '1', 2, 9, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(301, 'Imprime rápido y con buena calidad', 4, '1', 3, 10, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(302, 'Los cartuchos originales son caros', 2, '1', 5, 10, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(303, 'WiFi funciona perfectamente', 5, '1', 7, 10, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(304, 'Ruidosa cuando imprime a doble cara', 3, '1', 10, 10, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(305, 'Perfecta para oficina pequeña', 4, '1', 1, 10, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(306, 'Mantiene muy bien la temperatura', 5, '1', 2, 11, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(307, 'El dispensador de agua gotea', 3, '1', 4, 11, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(308, 'Espaciosa y bien organizada', 4, '1', 6, 11, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(309, 'Consumo energético eficiente', 5, '1', 8, 11, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(310, 'Congelador es más pequeño de lo esperado', 3, '1', 10, 11, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(311, 'EcoBubble lava muy bien con agua fría', 5, '1', 1, 12, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(312, 'Silenciosa en ciclos normales', 4, '1', 3, 12, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(313, 'Centrifugado podría ser más potente', 3, '1', 7, 12, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(314, 'App para control remoto es útil', 5, '1', 9, 12, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(315, 'Instalación complicada', 2, '1', 2, 12, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(316, 'Grill funciona perfectamente', 4, '1', 3, 13, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(317, 'Fácil de limpiar', 5, '1', 5, 13, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(318, 'Botones podrían ser más intuitivos', 3, '1', 7, 13, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(319, 'Calienta uniformemente', 5, '1', 10, 13, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(320, 'Temporizador preciso', 4, '1', 1, 13, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(321, 'Mapeo láser es increíblemente preciso', 5, '1', 2, 14, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(322, 'Atrapa en esquinas podría mejorar', 4, '1', 4, 14, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(323, 'App es muy completa', 5, '1', 6, 14, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(324, 'Ruido es menor que otras aspiradoras', 4, '1', 8, 14, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(325, 'Batería dura menos en modo máximo', 3, '1', 10, 14, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(326, 'Muy silencioso en velocidad baja', 5, '1', 1, 15, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(327, 'Control remoto es práctico', 4, '1', 3, 15, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(328, 'Base podría ser más estable', 3, '1', 7, 15, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(329, 'Flujo de aire potente', 5, '1', 9, 15, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(330, 'Diseño moderno y compacto', 4, '1', 2, 15, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(331, 'Vapor continuo funciona muy bien', 5, '1', 3, 16, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(332, 'Anti-cal previene daños a la ropa', 4, '1', 5, 16, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(333, 'Cable podría ser más largo', 3, '1', 7, 16, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(334, 'Calienta muy rápido', 5, '1', 10, 16, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(335, 'Peso bien balanceado', 4, '1', 1, 16, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(336, 'Tritura hielo sin problemas', 5, '1', 2, 17, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(337, 'Vaso de vidrio es muy resistente', 4, '1', 4, 17, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(338, 'Ruido es elevado en máxima potencia', 3, '1', 6, 17, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(339, 'Base estable durante el uso', 5, '1', 8, 17, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(340, 'Fácil de limpiar', 4, '1', 10, 17, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(341, 'Café tiene buen sabor', 4, '1', 1, 18, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(342, 'Compacta y fácil de usar', 5, '1', 3, 18, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(343, 'Cápsulas son caras a largo plazo', 2, '1', 7, 18, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(344, 'Calienta rápido', 4, '1', 9, 18, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(345, 'Depósito de agua pequeño', 3, '1', 2, 18, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(346, 'Cómodo como sofá y como cama', 5, '1', 3, 19, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(347, 'Mecanismo de conversión es sencillo', 4, '1', 5, 19, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(348, 'Tela se mancha fácilmente', 3, '1', 7, 19, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(349, 'Perfecto para visitas inesperadas', 5, '1', 10, 19, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(350, 'Cojines pierden forma con el tiempo', 3, '1', 1, 19, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(351, 'Madera maciza de buena calidad', 5, '1', 2, 20, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(352, 'Sillas son cómodas', 4, '1', 4, 20, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(353, 'Acabado podría ser mejor', 3, '1', 6, 20, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(354, 'Tamaño perfecto para 6 personas', 5, '1', 8, 20, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(355, 'Peso hace difícil moverla', 3, '1', 10, 20, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(356, 'Box spring es muy cómodo', 5, '1', 1, 21, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(357, 'Cabecera en cuero es elegante', 4, '1', 3, 21, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(358, 'Ensamblaje fue complicado', 2, '1', 7, 21, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(359, 'Soporta peso sin problemas', 5, '1', 9, 21, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(360, 'Precio elevado pero vale la pena', 4, '1', 2, 21, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(361, 'Amplio espacio para trabajar', 5, '1', 3, 22, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(362, 'Cajonera funciona suavemente', 4, '1', 5, 22, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(363, 'Madera tiene pequeñas imperfecciones', 3, '1', 7, 22, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(364, 'Estante para PC es práctico', 5, '1', 10, 22, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(365, 'Peso lo hace muy estable', 4, '1', 1, 22, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(366, 'Diseño moderno y elegante', 5, '1', 2, 23, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(367, 'Piel sintética fácil de limpiar', 4, '1', 4, 23, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(368, 'Puffs son un poco bajos', 3, '1', 6, 23, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(369, 'Color negro combina con todo', 5, '1', 8, 23, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(370, 'Precio accesible para la calidad', 4, '1', 10, 23, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(371, 'Espejo corredizo funciona bien', 4, '1', 1, 24, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(372, 'Cajones organizadores son útiles', 5, '1', 3, 24, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(373, 'Ensamblaje tomó mucho tiempo', 2, '1', 7, 24, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(374, 'Capacidad amplia', 5, '1', 9, 24, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(375, 'Acabado podría ser mejor', 3, '1', 2, 24, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(376, 'Soporte lumbar alivia dolores de espalda', 5, '1', 3, 25, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(377, 'Reposacabezas ajustable es cómodo', 4, '1', 5, 25, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(378, 'Material transpira poco', 3, '1', 7, 25, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(379, 'Ruedas funcionan bien en pisos duros', 5, '1', 10, 25, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(380, 'Buen relación calidad-precio', 4, '1', 1, 25, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(381, 'Cuero genuino de alta calidad', 5, '1', 2, 26, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(382, 'Forro interior es cálido', 4, '1', 4, 26, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(383, 'Tallas vienen grandes', 3, '1', 6, 26, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(384, 'Estilo atemporal', 5, '1', 8, 26, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(385, 'Precio elevado pero duradero', 4, '1', 10, 26, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(386, 'Cae muy bien y es elegante', 5, '1', 1, 27, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(387, 'Tela es cómoda y no arruga', 4, '1', 3, 27, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(388, 'Color difiere un poco de la foto', 3, '1', 7, 27, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(389, 'Perfecto para eventos formales', 5, '1', 9, 27, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(390, 'Buen precio para la calidad', 4, '1', 2, 27, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(391, 'Piel italiana es muy suave', 5, '1', 3, 28, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(392, 'Suela es cómoda para caminar', 4, '1', 5, 28, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(393, 'Requieren tiempo para ajustarse', 3, '1', 7, 28, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(394, 'Acabado impecable', 1, '1', 10, 28, '2025-06-30 16:20:30', '2025-07-01 23:14:21'),
(395, 'Buenos para uso diario', 4, '1', 1, 28, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(396, 'Cuero sintético se ve como real', 4, '1', 2, 29, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(397, 'Espacio interior bien organizado', 5, '1', 4, 29, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(398, 'Correa podría ser más resistente', 3, '1', 6, 29, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(399, 'Color negro combina con todo', 5, '1', 8, 29, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(400, 'Precio accesible para la marca', 4, '1', 10, 29, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(401, 'Correa de acero es ajustable', 5, '1', 1, 30, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(402, 'Cronógrafo funciona perfectamente', 4, '1', 3, 30, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(403, 'Pesa más de lo esperado', 3, '1', 7, 30, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(404, 'Diseño clásico y elegante', 5, '1', 9, 30, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(405, 'Batería dura años', 4, '1', 2, 30, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(406, 'Lentes polarizadas funcionan bien', 5, '1', 3, 31, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(407, 'Modelo aviador es clásico', 4, '1', 5, 31, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(408, 'Precio elevado pero valen la pena', 5, '1', 7, 31, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(409, 'Ligeras y cómodas', 5, '1', 10, 31, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(410, 'Estuche incluido es de buena calidad', 4, '1', 1, 31, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(411, 'Motor suave y potente', 5, '1', 2, 32, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(412, 'Consumo de combustible eficiente', 4, '1', 4, 32, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(413, 'Asiento es duro para viajes largos', 3, '1', 6, 32, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(414, 'Perfecta para ciudad y carretera', 5, '1', 8, 32, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(415, 'Repuestos son caros', 3, '1', 10, 32, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(416, 'Suspensión cómoda en carretera', 5, '1', 1, 33, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(417, 'Transmisión automática suave', 4, '1', 3, 33, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(418, 'Consumo en ciudad es alto', 3, '1', 7, 33, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(419, 'Espacio interior amplio', 5, '1', 9, 33, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(420, 'Mantenimiento accesible', 4, '1', 2, 33, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(421, 'Suspensión delantera funciona bien', 5, '1', 3, 34, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(422, 'Poco uso pero en excelente estado', 4, '1', 5, 34, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(423, 'Frenos podrían ser más potentes', 3, '1', 7, 34, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(424, 'Ligera y ágil', 5, '1', 10, 34, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(425, 'Buena relación calidad-precio', 4, '1', 1, 34, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(426, 'Rines de aleación son ligeros', 5, '1', 2, 35, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(427, 'Acabado impecable', 1, '1', 4, 35, '2025-06-30 16:20:30', '2025-07-01 23:14:27'),
(428, 'Instalación requiere herramientas especiales', 3, '1', 6, 35, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(429, 'Mejoraron el aspecto del auto', 5, '1', 8, 35, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(430, 'Precio accesible para la calidad', 4, '1', 10, 35, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(431, 'Pantalla es clara y legible', 5, '1', 1, 36, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(432, 'Actualizaciones frecuentes de mapas', 4, '1', 3, 36, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(433, 'Interfaz podría ser más intuitiva', 3, '1', 7, 36, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(434, 'Batería dura mucho tiempo', 5, '1', 9, 36, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(435, 'Soporte para tráfico en tiempo real', 4, '1', 2, 36, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(436, 'Inclinación eléctrica es útil', 5, '1', 3, 37, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(437, 'Programas de entrenamiento variados', 4, '1', 5, 37, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(438, 'Ruido es elevado en velocidades altas', 3, '1', 7, 37, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(439, 'Soporta bien peso hasta 100kg', 5, '1', 10, 37, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(440, 'Plegable y fácil de guardar', 4, '1', 1, 37, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(441, 'Peso perfecto para jugadores intermedios', 1, '1', 2, 38, '2025-06-30 16:20:30', '2025-07-01 23:14:50'),
(442, 'Grip cómodo y absorbente', 1, '1', 4, 38, '2025-06-30 16:20:30', '2025-07-01 23:14:43'),
(443, 'Cuerdas podrían ser de mejor calidad', 1, '1', 6, 38, '2025-06-30 16:20:30', '2025-07-01 23:14:35'),
(444, 'Potencia y control balanceados', 5, '1', 8, 38, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(445, 'Buen precio para raqueta profesional', 1, '1', 10, 38, '2025-06-30 16:20:30', '2025-07-01 23:14:17'),
(446, 'Textura ayuda al control', 5, '1', 1, 39, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(447, 'Duradero incluso en superficies duras', 4, '1', 3, 39, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(448, 'Peso es perfecto según reglamento', 5, '1', 7, 39, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(449, 'Costuras bien hechas', 5, '1', 9, 39, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(450, 'Buena relación calidad-precio', 4, '1', 2, 39, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(451, 'Resistencia magnética es silenciosa', 5, '1', 3, 40, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(452, 'Monitor muestra datos útiles', 4, '1', 5, 40, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(453, 'Asiento es incómodo para sesiones largas', 3, '1', 7, 40, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(454, 'Construcción sólida y estable', 5, '1', 10, 40, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(455, 'Buena opción para entrenar en casa', 4, '1', 1, 40, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(456, 'Sistema de ajuste funciona bien', 5, '1', 2, 41, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(457, 'Ahorran espacio comparado con juego fijo', 4, '1', 4, 41, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(458, 'Peso máximo es suficiente para mayoría', 5, '1', 6, 41, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(459, 'Agarre cómodo', 5, '1', 8, 41, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(460, 'Buen precio para la versatilidad', 4, '1', 10, 41, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(461, 'Piezas de alta calidad', 5, '1', 1, 42, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(462, 'Manual de instrucciones claro', 4, '1', 3, 42, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(463, 'Faltaban 2 piezas en el set', 3, '1', 7, 42, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(464, 'Horas de diversión para mi hijo', 5, '1', 9, 42, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(465, 'Diseño detallado y fiel a la película', 5, '1', 2, 42, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(466, 'Plegado es fácil y compacto', 5, '1', 3, 43, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(467, 'Ruedas se adaptan a diferentes terrenos', 4, '1', 5, 43, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(468, 'Capota podría ofrecer más protección solar', 3, '1', 7, 43, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(469, 'Fácil de limpiar', 5, '1', 10, 43, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(470, 'Buen estado a pesar de ser usado', 4, '1', 1, 43, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(471, 'Fácil de inflar', 5, '1', 2, 44, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(472, 'Tamaño perfecto para familia', 4, '1', 4, 44, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(473, 'Material resistente', 5, '1', 6, 44, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(474, 'Incluye parches para reparaciones', 5, '1', 8, 44, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(475, 'Buena relación calidad-precio', 4, '1', 10, 44, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(476, 'Accesorios son detallados', 5, '1', 1, 45, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(477, 'Casa tiene muchos detalles', 4, '1', 3, 45, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(478, 'Algunas piezas pequeñas pueden perderse', 3, '1', 7, 45, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(479, 'A mi hija le encantó', 5, '1', 9, 45, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(480, 'Buena calidad por el precio', 4, '1', 2, 45, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(481, 'Resultados visibles después de 4 sesiones', 5, '1', 3, 46, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(482, 'Menos dolorosa que otros métodos', 4, '1', 5, 46, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(483, 'No funciona igual en pieles oscuras', 2, '1', 7, 46, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(484, 'Ahorra dinero a largo plazo', 5, '1', 10, 46, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(485, 'Fácil de usar en casa', 4, '1', 1, 46, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(486, 'Sombras muy pigmentadas', 5, '1', 2, 47, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(487, 'Brochas son de buena calidad', 4, '1', 4, 47, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(488, 'Maletín podría ser más resistente', 3, '1', 6, 47, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(489, 'Variedad de colores es excelente', 5, '1', 8, 47, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(490, 'Buen precio para la cantidad de productos', 4, '1', 10, 47, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(491, 'Corte preciso y parejo', 5, '1', 1, 48, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(492, 'Inalámbrica es muy conveniente', 4, '1', 3, 48, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(493, 'Batería dura menos de lo esperado', 3, '1', 7, 48, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(494, 'Incluye varios peines guía', 5, '1', 9, 48, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(495, 'Fácil de limpiar', 4, '1', 2, 48, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(496, 'Tamaño perfecto para mi labrador', 5, '1', 3, 49, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(497, 'Tejado protege bien de la lluvia', 4, '1', 5, 49, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(498, 'Requiere tratamiento impermeabilizante', 3, '1', 7, 49, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(499, 'Fácil de armar', 5, '1', 10, 49, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(500, 'Madera es de buena calidad', 4, '1', 1, 49, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(501, 'Edición de lujo con ilustraciones', 5, '1', 2, 50, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(502, 'Papel de alta calidad', 4, '1', 4, 50, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(503, 'Un libro llegó con página doblada', 3, '1', 6, 50, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(504, 'Perfecto para fans de la saga', 5, '1', 8, 50, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(505, 'Caja de colección es elegante', 4, '1', 10, 50, '2025-06-30 16:20:30', '2025-06-30 16:20:30'),
(506, 'Nombre: andres\r\nEmail: jlopez@gmail.com\r\nComentario: buenisimo espectacular', 2, '1', NULL, 1, '2025-07-01 16:26:26', '2025-07-01 16:27:09'),
(508, 'Nombre: andres\nEmail: aaaaaaa@gmail.com\nComentario: increible me encanto', 4, '1', NULL, 1, '2025-07-01 16:33:24', '2025-07-01 16:33:24'),
(510, 'Nombre: maria del mar\r\nEmail: mar@gmail.com\r\nComentario: una mierda de balon', 1, '1', NULL, 39, '2025-07-02 16:11:51', '2025-07-02 16:12:15');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `imagenes`
--

CREATE TABLE `imagenes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `producto_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
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
-- Table structure for table `job_batches`
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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_05_09_081238_create_categorias_table', 1),
(5, '2025_05_09_081244_create_ciudades_table', 1),
(6, '2025_05_09_081251_create_usuarios_table', 1),
(7, '2025_05_09_081255_create_productos_table', 1),
(8, '2025_05_09_081302_create_imagenes_table', 1),
(9, '2025_05_09_081319_create_comentarios_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `valor` decimal(10,2) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `estado_producto` enum('nuevo','poco uso','usado') NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `categoria_id` bigint(20) UNSIGNED NOT NULL,
  `usuario_id` bigint(20) UNSIGNED NOT NULL,
  `ciudad_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id`, `titulo`, `slug`, `descripcion`, `valor`, `imagen`, `estado_producto`, `estado`, `categoria_id`, `usuario_id`, `ciudad_id`, `created_at`, `updated_at`) VALUES
(1, 'Audífonos Bluetooth Sony WH-1000XM4', 'audifonos-bluetooth-sony', 'Audífonos inalámbricos con cancelación de ruido y 30 horas de batería.', 1200000.00, '1751307254.jpg', 'nuevo', 1, 1, 1, 1, '2025-06-30 16:08:11', '2025-06-30 18:14:14'),
(2, 'Tablet Samsung Galaxy Tab S8', 'tablet-samsung-galaxy', 'Tablet con pantalla AMOLED de 11\", 8GB RAM y 256GB almacenamiento.', 2500000.00, '1751394313.webp', 'nuevo', 1, 1, 2, 2, '2025-06-30 16:08:11', '2025-07-01 18:25:13'),
(3, 'Smartwatch Apple Watch Series 8', 'smartwatch-apple-series8', 'Reloj inteligente con GPS, monitor cardiaco y resistencia al agua.', 1800000.00, '1751394357.webp', 'nuevo', 1, 1, 3, 3, '2025-06-30 16:08:11', '2025-07-01 18:25:57'),
(4, 'Drone DJI Mavic Air 2', 'drone-dji-mavic-air', 'Drone con cámara 4K, 34 minutos de vuelo y sensor de 1/2\".', 3200000.00, '1751393345.webp', 'nuevo', 1, 1, 4, 4, '2025-06-30 16:08:11', '2025-07-01 18:09:05'),
(5, 'Monitor LG UltraWide 34\"', 'monitor-lg-ultrawide', 'Monitor curvo 3440x1440, 144Hz, ideal para trabajo y gaming.', 1800000.00, '1751394246.webp', 'nuevo', 1, 1, 5, 5, '2025-06-30 16:08:11', '2025-07-01 18:24:06'),
(6, 'Teclado Mecánico Razer BlackWidow', 'teclado-mecanico-razer', 'Teclado gaming con switches verdes y retroiluminación RGB.', 450000.00, '1751394301.webp', 'nuevo', 1, 1, 6, 6, '2025-06-30 16:08:11', '2025-07-01 18:25:01'),
(7, 'Disco Duro Externo Seagate 2TB', 'disco-duro-seagate', 'Disco duro portátil USB 3.0, compatible con PC y Mac.', 350000.00, '1751393365.webp', 'nuevo', 1, 1, 7, 7, '2025-06-30 16:08:11', '2025-07-01 18:09:25'),
(8, 'Router WiFi 6 TP-Link Archer AX50', 'router-wifi6-tplink', 'Router dual band con velocidades hasta 3Gbps y 4 antenas.', 600000.00, '1751394147.webp', 'nuevo', 1, 1, 8, 8, '2025-06-30 16:08:11', '2025-07-01 18:22:27'),
(9, 'Cámara Canon EOS R6', 'camara-canon-eos-r6', 'Cámara mirrorless full frame con sensor de 20MP y 4K.', 7500000.00, '1751393036.webp', 'nuevo', 1, 1, 9, 9, '2025-06-30 16:08:11', '2025-07-01 18:03:56'),
(10, 'Impresora Multifuncional HP', 'impresora-hp-multifuncional', 'Impresora láser con escáner y copiadora, WiFi y duplex.', 800000.00, '1751394122.webp', 'nuevo', 1, 1, 10, 10, '2025-06-30 16:08:11', '2025-07-01 18:22:02'),
(11, 'Nevera Haceb No Frost 500L', 'nevera-haceb-nofrost', 'Nevera de dos puertas con dispensador de agua y hielo.', 2800000.00, '1751394215.webp', 'nuevo', 1, 2, 1, 1, '2025-06-30 16:08:11', '2025-07-01 18:23:35'),
(12, 'Lavadora Samsung 18Kg', 'lavadora-samsung-18kg', 'Lavadora carga frontal con tecnología EcoBubble.', 2200000.00, '1751394073.webp', 'nuevo', 1, 2, 2, 2, '2025-06-30 16:08:11', '2025-07-01 18:21:13'),
(13, 'Horno Microondas LG Grill', 'horno-microondas-lg', 'Microondas con función grill y 30L de capacidad.', 700000.00, '1751394138.webp', 'nuevo', 1, 2, 3, 3, '2025-06-30 16:08:11', '2025-07-01 18:22:18'),
(14, 'Aspiradora Robot Xiaomi', 'aspiradora-robot-xiaomi', 'Aspiradora inteligente con mapeo láser y app control.', 1500000.00, '1751392697.jpg', 'nuevo', 1, 2, 4, 4, '2025-06-30 16:08:11', '2025-07-01 17:58:17'),
(15, 'Ventilador de Torre Oster', 'ventilador-torre-oster', 'Ventilador silencioso con 3 velocidades y control remoto.', 350000.00, '1751394275.webp', 'nuevo', 1, 2, 5, 5, '2025-06-30 16:08:11', '2025-07-01 18:24:35'),
(16, 'Plancha a Vapor Philips', 'plancha-vapor-philips', 'Plancha con sistema anti-cal y vapor continuo 2000W.', 250000.00, '1751394189.webp', 'nuevo', 1, 2, 6, 6, '2025-06-30 16:08:11', '2025-07-01 18:23:09'),
(17, 'Licuadora Oster Pro 1200', 'licuadora-oster-pro', 'Licuadora profesional con vaso de vidrio y 1200W.', 400000.00, '1751394062.webp', 'nuevo', 1, 2, 7, 7, '2025-06-30 16:08:11', '2025-07-01 18:21:02'),
(18, 'Cafetera Nespresso Essenza', 'cafetera-nespresso', 'Cafetera de cápsulas compacta con 19 bares de presión.', 600000.00, '1751393020.webp', 'nuevo', 1, 2, 8, 8, '2025-06-30 16:08:11', '2025-07-01 18:03:40'),
(19, 'Sofá Cama 3 Plazas', 'sofa-cama-3plazas', 'Sofá convertible en cama, tela resistente y cómodo.', 1200000.00, '1751394327.webp', 'nuevo', 1, 3, 1, 1, '2025-06-30 16:08:11', '2025-07-01 18:25:27'),
(20, 'Mesa de Comedor 6 Sillas', 'mesa-comedor-6sillas', 'Mesa de madera maciza con 6 sillas tapizadas.', 1800000.00, '1751393996.webp', 'nuevo', 1, 3, 2, 2, '2025-06-30 16:08:11', '2025-07-01 18:19:56'),
(21, 'Cama King Size Box Spring', 'cama-king-boxspring', 'Cama matrimonial con box spring y cabecera en cuero.', 2500000.00, '1751393027.png', 'nuevo', 1, 3, 3, 3, '2025-06-30 16:08:11', '2025-07-01 18:03:47'),
(22, 'Escritorio Ejecutivo en Roble', 'escritorio-ejecutivo-roble', 'Escritorio amplio con cajonera y estante para PC.', 800000.00, '1751393334.webp', 'nuevo', 1, 3, 4, 4, '2025-06-30 16:08:11', '2025-07-01 18:08:54'),
(23, 'Juego de Sala Moderno', 'juego-sala-moderno', '2 Sofás y 2 puff en piel sintética, color negro.', 1500000.00, '1751394111.webp', 'nuevo', 1, 3, 5, 5, '2025-06-30 16:08:11', '2025-07-01 18:21:51'),
(24, 'Ropero 6 Puertas Espejo', 'ropero-6puertas-espejo', 'Ropero con espejo corredizo y cajones organizadores.', 900000.00, '1751394159.webp', 'nuevo', 1, 3, 6, 6, '2025-06-30 16:08:11', '2025-07-01 18:22:39'),
(25, 'Silla de Oficina Ergonómica', 'silla-oficina-ergonomica', 'Silla con soporte lumbar y reposacabezas ajustable.', 500000.00, '1751394339.webp', 'nuevo', 1, 3, 7, 7, '2025-06-30 16:08:11', '2025-07-01 18:25:39'),
(26, 'Chaqueta de Cuero Genuino', 'chaqueta-cuero-genuino', 'Chaqueta de cuero para hombre, tallas S a XL.', 600000.00, '1751393284.webp', 'nuevo', 1, 4, 1, 1, '2025-06-30 16:08:11', '2025-07-01 18:08:04'),
(27, 'Vestido de Noche Elegante', 'vestido-noche-elegante', 'Vestido largo para ocasiones especiales, varios colores.', 450000.00, '1751394264.webp', 'nuevo', 1, 4, 2, 2, '2025-06-30 16:08:11', '2025-07-01 18:24:24'),
(28, 'Zapatos Formales Hombre', 'zapatos-formales-hombre', 'Zapatos de vestir en piel italiana, tallas 38-44.', 350000.00, '1751394255.webp', 'nuevo', 1, 4, 3, 3, '2025-06-30 16:08:11', '2025-07-01 18:24:15'),
(29, 'Bolso Michael Kors', 'bolso-michael-kors', 'Bolso de mujer en cuero sintético, color negro.', 800000.00, '1751393010.webp', 'nuevo', 1, 4, 4, 4, '2025-06-30 16:08:11', '2025-07-01 18:03:30'),
(30, 'Reloj Fossil Chronograph', 'reloj-fossil-chronograph', 'Reloj analógico para hombre con correa de acero.', 700000.00, '1751394170.webp', 'nuevo', 1, 4, 5, 5, '2025-06-30 16:08:11', '2025-07-01 18:22:50'),
(31, 'Gafas de Sol Ray-Ban', 'gafas-sol-rayban', 'Gafas aviador con lentes polarizadas, modelo clásico.', 400000.00, '1751393324.webp', 'nuevo', 1, 4, 6, 6, '2025-06-30 16:08:11', '2025-07-01 18:08:44'),
(32, 'Moto Honda CB 500F', 'moto-honda-cb500', 'Moto naked 500cc, modelo 2023, 8000km.', 18000000.00, '1751394236.webp', 'nuevo', 1, 5, 1, 1, '2025-06-30 16:08:11', '2025-07-01 18:23:56'),
(33, 'Carro Renault Duster', 'carro-renault-duster', 'SUV 2019, 4x2, 60.000km, automático.', 45000000.00, '1751393046.jpg', 'nuevo', 1, 5, 2, 2, '2025-06-30 16:08:11', '2025-07-01 18:04:06'),
(34, 'Bicicleta Specialized Rockhopper', 'bicicleta-specialized', 'Bicicleta montañera, aluminio, suspensión delantera.', 2500000.00, '1751392792.jpeg', 'nuevo', 1, 5, 3, 3, '2025-06-30 16:08:11', '2025-07-01 17:59:52'),
(35, 'Llantas Rines 17\" Aleación', 'llantas-rines-17', 'Juego de 4 llantas con rines de aleación, 5 tornillos.', 1200000.00, '1751394034.webp', 'nuevo', 1, 5, 4, 4, '2025-06-30 16:08:11', '2025-07-01 18:20:34'),
(36, 'GPS Garmin Drive 52', 'gps-garmin-drive', 'Navegador para carro con pantalla 5\" y actualizaciones.', 600000.00, '1751393314.webp', 'nuevo', 1, 5, 5, 5, '2025-06-30 16:08:11', '2025-07-01 18:08:34'),
(37, 'Treadmill ProForm 505 CST', 'treadmill-proform', 'Caminadora eléctrica con 12 programas e inclinación.', 2500000.00, '1751394291.webp', 'nuevo', 1, 6, 1, 1, '2025-06-30 16:08:11', '2025-07-01 18:24:51'),
(38, 'Raqueta Tenis Wilson Pro Staff', 'raqueta-tenis-wilson', 'Raqueta profesional 300g, grip 4 3/8.', 800000.00, '1751394179.webp', 'nuevo', 1, 6, 2, 2, '2025-06-30 16:08:11', '2025-07-01 18:22:59'),
(39, 'Balón Fútbol Adidas Champions', 'balon-adidas-champions', 'Balón oficial de la Champions League, tamaño 5.', 250000.00, '1751392784.webp', 'nuevo', 1, 6, 3, 3, '2025-06-30 16:08:11', '2025-07-01 17:59:44'),
(40, 'Bicicleta Spinning BH', 'bicicleta-spinning-bh', 'Bicicleta estática con resistencia magnética y monitor.', 1200000.00, '1751393002.webp', 'nuevo', 1, 6, 4, 4, '2025-06-30 16:08:11', '2025-07-01 18:03:22'),
(41, 'Mancuernas Ajustables 20kg', 'mancuernas-ajustables', 'Par de mancuernas ajustables de 2 a 20kg.', 400000.00, '1751394045.webp', 'nuevo', 1, 6, 5, 5, '2025-06-30 16:08:11', '2025-07-01 18:20:45'),
(42, 'Set Lego Star Wars', 'lego-star-wars', 'Set de 1500 piezas, modelo Estrella de la Muerte.', 600000.00, '1751393985.webp', 'nuevo', 1, 7, 1, 1, '2025-06-30 16:08:11', '2025-07-01 18:19:45'),
(43, 'Cochecito Baby Jogger', 'cochecito-baby-jogger', 'Cochecito para bebé, plegable, 3 ruedas.', 900000.00, '1751393294.webp', 'nuevo', 1, 7, 2, 2, '2025-06-30 16:08:11', '2025-07-01 18:08:14'),
(44, 'Piscina Inflable Intex', 'piscina-inflable-intex', 'Piscina familiar 3m diámetro, 80cm altura.', 350000.00, '1751394201.webp', 'nuevo', 1, 7, 3, 3, '2025-06-30 16:08:11', '2025-07-01 18:23:21'),
(45, 'Muñeca Barbie Dreamhouse', 'muneca-barbie-dreamhouse', 'Casa de muñecas con 3 pisos y accesorios.', 500000.00, '1751394225.webp', 'nuevo', 1, 7, 4, 4, '2025-06-30 16:08:11', '2025-07-01 18:23:45'),
(46, 'Depiladora Láser Philips', 'depiladora-laser-philips', 'Depiladora láser para uso en casa, 5 niveles.', 1500000.00, '1751393355.webp', 'nuevo', 1, 8, 1, 1, '2025-06-30 16:08:11', '2025-07-01 18:09:15'),
(47, 'Kit Maquillaje Profesional', 'kit-maquillaje-profesional', 'Maletín con 50 sombras, brochas y bases.', 700000.00, '1751394090.webp', 'nuevo', 1, 8, 2, 2, '2025-06-30 16:08:11', '2025-07-01 18:21:30'),
(48, 'Máquina Cortar Cabello Wahl', 'maquina-cortar-wahl', 'Cortadora profesional para barbería, inalámbrica.', 400000.00, '1751394023.webp', 'nuevo', 1, 8, 3, 3, '2025-06-30 16:08:11', '2025-07-01 18:20:23'),
(49, 'Casa para Perro Grande', 'casa-perro-grande', 'Casa de madera para perros hasta 40kg, tejado.', 500000.00, '1751393257.webp', 'nuevo', 1, 9, 1, 1, '2025-06-30 16:08:11', '2025-07-01 18:07:37'),
(50, 'Colección Harry Potter', 'coleccion-harry-potter', 'Los 7 libros de la saga en edición de lujo.', 450000.00, '1751393304.webp', 'nuevo', 1, 10, 1, 1, '2025-06-30 16:08:11', '2025-07-01 18:08:24'),
(51, 'nuevo producto', 'nuevo-producto', 'nuevoooooooooooooooooooo', 1300000.00, '1751642862.jpg', 'nuevo', 1, 12, 1, 1, '2025-07-04 15:27:42', '2025-07-04 15:27:42');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
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
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('1mNDysgmXDlhx5OwE77PBQ8VgGzX1asTFcrw4Ezh', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36 Edg/138.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVWpOOG1yRUxWc0RSQ3pUVzVCWE5sYVlVaXJnWk80Q3MxaDZsMzBGOSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tYXJrZXQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1752770094),
('9suNgDYmVMuN5Hs8iB3CfocBNqaDlzy5OkyomAlh', 19, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36 Edg/138.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNUwxaDh3czJqa2hqZ29OcW1oNWdHWnFSWGwxeGt5eFNQWXBheEh2eCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9ob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTk7fQ==', 1752772730),
('sODlqzRU9pKQeWO9Gwd6S5e3T84E6q9qIqJ1n7sC', 23, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36 Edg/138.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicXZWM1hyZ2VXOGhoMEpTZzNSNnZkV2xoMDZOT2VpbkJ2aWhENnhrbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjIzO30=', 1752772432),
('URAB4i7iNgCfvWZhV7GGodGBnXNxzXtr5aYMCXQ6', 19, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36 Edg/138.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSnJ3TkdEajJFU3BNYlM0azViSk56NDVhWEdFRlE2T2hmN0ZqWGhzWCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9kdWN0b3MiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxOTt9', 1752071804);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) NOT NULL,
  `movil` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` enum('admin','vendedor') NOT NULL DEFAULT 'vendedor',
  `ciudad_id` bigint(20) UNSIGNED DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `imagen`, `nombre`, `movil`, `email`, `password`, `rol`, `ciudad_id`, `estado`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Juan Perez', '3001234567', 'juan.perez@gmail.com', '$2y$12$HimbB4soiUGo1FMS/KDofOjL3UY0XNsRK5/CQ8vaKGvwsukb5ChRm', 'vendedor', 2, 1, '2025-05-22 12:42:43', '2025-06-18 16:29:34'),
(2, NULL, 'Maria Rodriguez', '3012345678', 'maria.rodriguez@gmail.com', '$2y$12$wRzD4qOyt0V2GZXY0tKx8OW6mEYV5kMb0aT.vZ7b7REdvZjDQFejC', 'vendedor', 2, 1, '2025-05-22 12:42:43', '2025-06-18 16:25:35'),
(3, NULL, 'Carlos Sanchez', '3023456789', 'carlos.sanchez@hotmail.com', '$2y$12$wRzD4qOyt0V2GZXY0tKx8OW6mEYV5kMb0aT.vZ7b7REdvZjDQFejC', 'vendedor', 3, 1, '2025-05-22 12:42:43', '2025-05-22 12:42:43'),
(4, '1751389859.jpg', 'Ana Gomez', '3034567890', 'ana.gomez@yahoo.com', '$2y$12$HfPV44NiPCcrM139hll0u.gUq2TrAvwCoV13wHH0arFnmK1j7/h/i', 'vendedor', 4, 1, '2025-05-22 12:42:43', '2025-07-02 13:31:47'),
(5, NULL, 'Luis Torres', '3045678901', 'luis.torres@gmail.com', '$2y$12$wRzD4qOyt0V2GZXY0tKx8OW6mEYV5kMb0aT.vZ7b7REdvZjDQFejC', 'vendedor', 5, 1, '2025-05-22 12:42:43', '2025-05-22 12:42:43'),
(6, NULL, 'Camila Ramirez', '3056789012', 'camila.ramirez@hotmail.com', '$2y$12$wRzD4qOyt0V2GZXY0tKx8OW6mEYV5kMb0aT.vZ7b7REdvZjDQFejC', 'vendedor', 6, 1, '2025-05-22 12:42:43', '2025-06-25 16:13:42'),
(7, NULL, 'Andres Herrera', '3067890123', 'andres.herrera@gmail.com', '$2y$12$wRzD4qOyt0V2GZXY0tKx8OW6mEYV5kMb0aT.vZ7b7REdvZjDQFejC', 'vendedor', 7, 1, '2025-05-22 12:42:43', '2025-05-22 12:42:43'),
(8, NULL, 'Laura Jimenez', '3078901234', 'laura.jimenez@yahoo.com', '$2y$12$wRzD4qOyt0V2GZXY0tKx8OW6mEYV5kMb0aT.vZ7b7REdvZjDQFejC', 'vendedor', 8, 1, '2025-05-22 12:42:43', '2025-05-22 12:42:43'),
(9, NULL, 'Mateo Ruiz', '3089012345', 'mateo.ruiz@gmail.com', '$2y$12$wRzD4qOyt0V2GZXY0tKx8OW6mEYV5kMb0aT.vZ7b7REdvZjDQFejC', 'vendedor', 9, 1, '2025-05-22 12:42:43', '2025-05-22 12:42:43'),
(10, NULL, 'Daniela Martinez', '3090123456', 'daniela.martinez@hotmail.com', '$2y$12$wRzD4qOyt0V2GZXY0tKx8OW6mEYV5kMb0aT.vZ7b7REdvZjDQFejC', 'vendedor', 10, 1, '2025-05-22 12:42:43', '2025-05-22 12:42:43'),
(12, NULL, 'lina maria soto', '3137097845', 'lina@gmail.com', '$2y$12$DMYZcF2ymFTegwvPIgDsPuhh.9oPkHkDAua2kgPA20i8Yfe/.KBi.', 'vendedor', 3, 1, '2025-06-08 23:24:19', '2025-06-08 23:24:19'),
(13, NULL, 'juan lopez', NULL, 'jlopez@gmail.com', '$2y$12$/MmDYQ2zegnxg.244knJIeuCZekwSDAah4rpmUEBKWPz5EsmdmLxe', 'vendedor', NULL, 1, '2025-06-11 14:31:19', '2025-07-01 22:25:34'),
(14, NULL, 'gerardine tribaldo', '3177267388', 'gtribal@gmail.com', '$2y$12$q.JfPJtcDIzYRTUNo4hNEOx2rpLDeQq.k80p81wBchkg1Drx51m4S', 'vendedor', 3, 1, '2025-06-11 16:06:46', '2025-06-11 16:06:46'),
(19, '1751462569.jpg', 'alejandro cuellar trochez', '3177166103', 'alejo29.c@gmail.com', '$2y$12$srzF7qjiIqtOvKCEXLoVVe2yyr7pC/OkNCon/YvshsnvNPyexLLOW', 'vendedor', 3, 1, '2025-07-01 22:53:07', '2025-07-02 13:22:49'),
(23, 'static/avatars/avatar.jpg', 'Luis Fernando Beltran', NULL, 'luis@gmail.com', '$2y$12$Yxo.AWt8ClWjRQgnp4v1/exUAiffCfe1iTTciIpP13GuOuFYNXXvq', 'vendedor', NULL, 1, '2025-07-02 14:03:11', '2025-07-02 14:03:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categorias_nombre_unique` (`nombre`),
  ADD UNIQUE KEY `categorias_slug_unique` (`slug`);

--
-- Indexes for table `ciudades`
--
ALTER TABLE `ciudades`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ciudades_nombre_unique` (`nombre`);

--
-- Indexes for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comentarios_usuario_id_foreign` (`usuario_id`),
  ADD KEY `comentarios_producto_id_foreign` (`producto_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `imagenes_producto_id_foreign` (`producto_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `productos_nombre_unique` (`titulo`),
  ADD UNIQUE KEY `productos_slug_unique` (`slug`),
  ADD KEY `productos_categoria_id_foreign` (`categoria_id`),
  ADD KEY `productos_usuario_id_foreign` (`usuario_id`),
  ADD KEY `productos_ciudad_id_foreign` (`ciudad_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuarios_email_unique` (`email`),
  ADD KEY `usuarios_ciudad_id_foreign` (`ciudad_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `ciudades`
--
ALTER TABLE `ciudades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=511;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`),
  ADD CONSTRAINT `comentarios_usuario_id_foreign` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Constraints for table `imagenes`
--
ALTER TABLE `imagenes`
  ADD CONSTRAINT `imagenes_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`);

--
-- Constraints for table `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`),
  ADD CONSTRAINT `productos_ciudad_id_foreign` FOREIGN KEY (`ciudad_id`) REFERENCES `ciudades` (`id`),
  ADD CONSTRAINT `productos_usuario_id_foreign` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ciudad_id_foreign` FOREIGN KEY (`ciudad_id`) REFERENCES `ciudades` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
