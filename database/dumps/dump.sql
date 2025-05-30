-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2025 at 02:54 PM
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
(1, 'Tecnologia', 'tecnologia', 'Celulares, computadores, tablets y accesorios', NULL, 1, '2025-05-22 12:50:54', '2025-05-22 12:50:54'),
(2, 'Electrodomesticos', 'electrodomesticos', 'Neveras, lavadoras, hornos, televisores, etc.', NULL, 1, '2025-05-22 12:50:54', '2025-05-22 12:50:54'),
(3, 'Hogar y Muebles', 'hogar-muebles', 'Articulos para el hogar y muebles', NULL, 1, '2025-05-22 12:50:54', '2025-05-22 12:50:54'),
(4, 'Ropa y Accesorios', 'ropa-accesorios', 'Ropa para hombre, mujer y niños', NULL, 1, '2025-05-22 12:50:54', '2025-05-22 12:50:54'),
(5, 'Vehiculos', 'vehiculos', 'Carros, motos y accesorios automotrices', NULL, 1, '2025-05-22 12:50:54', '2025-05-22 12:50:54'),
(6, 'Deportes', 'deportes', 'Articulos deportivos y de entrenamiento', NULL, 1, '2025-05-22 12:50:54', '2025-05-22 12:50:54'),
(7, 'Juguetes y Niños', 'juguetes-ninos', 'Juguetes, juegos y articulos infantiles', NULL, 1, '2025-05-22 12:50:54', '2025-05-22 12:50:54'),
(8, 'Salud y Belleza', 'salud-belleza', 'Cosmeticos, cuidado personal y suplementos', NULL, 1, '2025-05-22 12:50:54', '2025-05-22 12:50:54'),
(9, 'Mascotas', 'mascotas', 'Productos para perros, gatos y otros animales', NULL, 1, '2025-05-22 12:50:54', '2025-05-22 12:50:54'),
(10, 'Libros y Papeleria', 'libros-papeleria', 'Libros, utiles escolares y oficina', NULL, 1, '2025-05-22 12:50:54', '2025-05-22 12:50:54');

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
(1, 'Bogota', 1, '2025-05-22 12:42:29', '2025-05-22 12:42:29'),
(2, 'Medellin', 1, '2025-05-22 12:42:29', '2025-05-22 12:42:29'),
(3, 'Cali', 1, '2025-05-22 12:42:29', '2025-05-22 12:42:29'),
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
  `usuario_id` bigint(20) UNSIGNED NOT NULL,
  `producto_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comentarios`
--

INSERT INTO `comentarios` (`id`, `descripcion`, `valoracion`, `estado`, `usuario_id`, `producto_id`, `created_at`, `updated_at`) VALUES
(1, 'Excelente calidad de imagen y muy fácil de configurar. ¡Totalmente satisfecho con la compra!', 5, '1', 3, 1, '2025-05-22 13:32:27', '2025-05-22 13:32:27');

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
(1, 'Smart TV Ultra HD 55\"', 'smart-tv-ultra-hd-55-inch', 'Televisor inteligente 4K de 55 pulgadas con funciones avanzadas y sonido envolvente.', 1500.00, 'smart_tv_55.jpg', 'nuevo', 1, 2, 1, 1, '2025-05-22 13:32:11', '2025-05-22 13:32:11');

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
('A0cCBaqHFszyXT5Sh0EOHUVJErbDFJdKg9TYxzaH', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36 Edg/136.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidmZxdGROSzRXdWRKRjFhWXdBSlVxZDJSTVpPU3pFMlYwVll1N1RWTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91c3VhcmlvcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1747950336),
('qblpOzPW19ZVPjyJD8ZI6pdNLQBwgk7CRSIQdYrr', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36 Edg/136.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN1FpdjFSVlRNQk5SeWhoekpqRGdKdmRYc2puY1JtaXZab1VnRVNMcSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jYXRlZ29yaWFzP3RoZW1lPWxpZ2h0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1748003965);

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `movil` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` enum('admin','vendedor') NOT NULL DEFAULT 'vendedor',
  `ciudad_id` bigint(20) UNSIGNED NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `movil`, `email`, `password`, `rol`, `ciudad_id`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Juan Perez', '3001234567', 'juan.perez@gmail.com', '$2y$12$wRzD4qOyt0V2GZXY0tKx8OW6mEYV5kMb0aT.vZ7b7REdvZjDQFejC', 'vendedor', 1, 1, '2025-05-22 12:42:43', '2025-05-22 12:42:43'),
(2, 'Maria Rodriguez', '3012345678', 'maria.rodriguez@gmail.com', '$2y$12$wRzD4qOyt0V2GZXY0tKx8OW6mEYV5kMb0aT.vZ7b7REdvZjDQFejC', 'vendedor', 2, 1, '2025-05-22 12:42:43', '2025-05-22 12:42:43'),
(3, 'Carlos Sanchez', '3023456789', 'carlos.sanchez@hotmail.com', '$2y$12$wRzD4qOyt0V2GZXY0tKx8OW6mEYV5kMb0aT.vZ7b7REdvZjDQFejC', 'vendedor', 3, 1, '2025-05-22 12:42:43', '2025-05-22 12:42:43'),
(4, 'Ana Gomez', '3034567890', 'ana.gomez@yahoo.com', '$2y$12$wRzD4qOyt0V2GZXY0tKx8OW6mEYV5kMb0aT.vZ7b7REdvZjDQFejC', 'vendedor', 4, 1, '2025-05-22 12:42:43', '2025-05-22 12:42:43'),
(5, 'Luis Torres', '3045678901', 'luis.torres@gmail.com', '$2y$12$wRzD4qOyt0V2GZXY0tKx8OW6mEYV5kMb0aT.vZ7b7REdvZjDQFejC', 'vendedor', 5, 1, '2025-05-22 12:42:43', '2025-05-22 12:42:43'),
(6, 'Camila Ramirez', '3056789012', 'camila.ramirez@hotmail.com', '$2y$12$wRzD4qOyt0V2GZXY0tKx8OW6mEYV5kMb0aT.vZ7b7REdvZjDQFejC', 'vendedor', 6, 1, '2025-05-22 12:42:43', '2025-05-22 12:42:43'),
(7, 'Andres Herrera', '3067890123', 'andres.herrera@gmail.com', '$2y$12$wRzD4qOyt0V2GZXY0tKx8OW6mEYV5kMb0aT.vZ7b7REdvZjDQFejC', 'vendedor', 7, 1, '2025-05-22 12:42:43', '2025-05-22 12:42:43'),
(8, 'Laura Jimenez', '3078901234', 'laura.jimenez@yahoo.com', '$2y$12$wRzD4qOyt0V2GZXY0tKx8OW6mEYV5kMb0aT.vZ7b7REdvZjDQFejC', 'vendedor', 8, 1, '2025-05-22 12:42:43', '2025-05-22 12:42:43'),
(9, 'Mateo Ruiz', '3089012345', 'mateo.ruiz@gmail.com', '$2y$12$wRzD4qOyt0V2GZXY0tKx8OW6mEYV5kMb0aT.vZ7b7REdvZjDQFejC', 'vendedor', 9, 1, '2025-05-22 12:42:43', '2025-05-22 12:42:43'),
(10, 'Daniela Martinez', '3090123456', 'daniela.martinez@hotmail.com', '$2y$12$wRzD4qOyt0V2GZXY0tKx8OW6mEYV5kMb0aT.vZ7b7REdvZjDQFejC', 'vendedor', 10, 1, '2025-05-22 12:42:43', '2025-05-22 12:42:43'),
(11, 'Alejandro Cuellar', '3177166103', 'alejo29.c@gmail.com', '$2y$12$wRzD4qOyt0V2GZXY0tKx8OW6mEYV5kMb0aT.vZ7b7REdvZjDQFejC', 'admin', 3, 1, '2025-05-22 12:49:00', '2025-05-22 12:49:00');

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ciudades`
--
ALTER TABLE `ciudades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
