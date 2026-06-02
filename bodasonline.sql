-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 02-06-2026 a las 13:53:31
-- Versión del servidor: 8.4.3
-- Versión de PHP: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bodasonline`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoriastb`
--

CREATE TABLE `categoriastb` (
  `idCategoria` int NOT NULL,
  `nombreCategoria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `categoriastb`
--

INSERT INTO `categoriastb` (`idCategoria`, `nombreCategoria`) VALUES
(1, 'Fotógrafos'),
(2, 'Coches de Boda'),
(3, 'Música'),
(4, 'Autobuses'),
(5, 'Animación'),
(6, 'Banquetes'),
(7, 'Belleza'),
(8, 'Lugares'),
(9, 'Restaurantes'),
(10, 'Floristería'),
(11, 'Mobiliario'),
(12, 'Food truck'),
(13, 'Mesas de Dulces'),
(14, 'Joyas'),
(15, 'Luna de Miel'),
(16, 'Decoración');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedorestb`
--

CREATE TABLE `proveedorestb` (
  `idProveedor` int NOT NULL,
  `nombreProveedor` varchar(150) NOT NULL,
  `idCategoria` int NOT NULL,
  `imgProveedorP` varchar(255) DEFAULT 'default.jpg',
  `descripcionProveedor` text,
  `telefonoProveedor` varchar(50) DEFAULT NULL,
  `precioDesde` int DEFAULT NULL,
  `seoKeywords` text,
  `visible` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `proveedorestb`
--

INSERT INTO `proveedorestb` (`idProveedor`, `nombreProveedor`, `idCategoria`, `imgProveedorP`, `descripcionProveedor`, `telefonoProveedor`, `precioDesde`, `seoKeywords`, `visible`) VALUES
(1, 'Salón de Belleza', 7, 'https://images.pexels.com/photos/3997391/pexels-photo-3997391.jpeg?auto=compress&cs=tinysrgb&w=600', 'Ofrecemos los mejores servicios de belleza, peluquería, maquillaje y spa para novias e invitadas. Tratamientos personalizados para que brilles en tu gran día en la zona de Armilla.', '600 111 222', 120, 'belleza, Armilla, maquillaje novias, peluquería, estética', 1),
(2, 'Rent Cars', 2, 'https://images.pexels.com/photos/170811/pexels-photo-170811.jpeg?auto=compress&cs=tinysrgb&w=600', 'Alquiler de vehículos de lujo y clásicos con conductor para bodas y eventos especiales en Granada y alrededores de Plaza de Toro. Puntualidad, elegancia y máximo confort para tu entrada triunfal.', '600 222 333', 350, 'coches boda, Plaza de Toro, alquiler coche clásico, lujo, conductor', 1),
(3, 'Palace Hotel', 8, 'https://images.pexels.com/photos/258154/pexels-photo-258154.jpeg?auto=compress&cs=tinysrgb&w=600', 'Un hotel de ensueño frente a la Caleta para celebrar tu banquete de bodas. Salones espectaculares de gran capacidad, catering de primer nivel, vistas hermosas y una suite de cortesía para los novios.', '958 333 444', 1800, 'hotel bodas, Caleta, banquetes, salón de bodas, celebración', 1),
(4, 'Fotógrafo Rafa', 1, 'https://images.pexels.com/photos/1264210/pexels-photo-1264210.jpeg?auto=compress&cs=tinysrgb&w=600', 'Capturamos los momentos más emotivos y naturales de tu boda en Granada. Reportajes de fotografía de autor, tomas espontáneas llenas de sentimiento y cobertura completa de toda la boda.', '611 444 555', 850, 'fotógrafo granada, reportaje de fotos, boda, álbum de fotos, video', 1),
(5, 'Restaurante Gourmet', 9, 'https://images.pexels.com/photos/931177/pexels-photo-931177.jpeg?auto=compress&cs=tinysrgb&w=600', 'Exquisitos menús para bodas elaborados por chefs con estrella. Fusión de gastronomía tradicional andaluza y toques de autor contemporáneos en pleno centro histórico de Granada.', '958 555 666', 95, 'restaurante centro, banquete gourmet, menú bodas, catering, comida', 1),
(6, 'Spa & Wellness', 7, 'https://images.pexels.com/photos/1024960/pexels-photo-1024960.jpeg?auto=compress&cs=tinysrgb&w=600', 'El complemento perfecto de relajación antes o después de la boda en Sierra Nevada. Circuitos termales y masajes especializados para novios e invitadas en un entorno de paz absoluta.', '958 666 777', 80, 'spa sierra nevada, relajación novios, masajes, termas, bienestar', 1),
(7, 'Wedding Planner', 5, 'https://images.pexels.com/photos/169190/pexels-photo-169190.jpeg?auto=compress&cs=tinysrgb&w=600', 'Planificamos tu boda ideal de la A a la Z en Realejo y toda la provincia. Gestión de proveedores, diseño decorativo integral, logística y coordinación en directo de toda la jornada.', '600 777 888', 1500, 'organizador de bodas, Realejo, coordinación, logística bodas', 1),
(8, 'Joyas Reales', 14, 'https://images.pexels.com/photos/1036623/pexels-photo-1036623.jpeg?auto=compress&cs=tinysrgb&w=600', 'Especialistas en alianzas y sortijas de compromiso en Alcaicería. Oro blanco, platino, diamantes y gemas selectas con grabado personalizado sin cargo para que vuestro amor dure para siempre.', '958 888 999', 400, 'joyería alcaicería, alianzas de boda, anillos compromiso, diamantes', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rutastb`
--

CREATE TABLE `rutastb` (
  `idRuta` int NOT NULL,
  `nombreRuta` varchar(100) NOT NULL,
  `imgRuta` varchar(255) NOT NULL,
  `descripcionRuta` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `rutastb`
--

INSERT INTO `rutastb` (`idRuta`, `nombreRuta`, `imgRuta`, `descripcionRuta`) VALUES
(1, 'Ruta Generalife', 'img/generalife.jpg', 'Pasea de la mano de tu pareja por los hermosos jardines del Generalife en la Alhambra, disfrutando del susurro del agua, los patios andalusíes y el aroma de las flores de época en el entorno de la fortaleza roja.'),
(2, 'Ruta por el Sacromonte', 'img/sacromonte.jpg', 'Explora las singulares cuevas excavadas del Sacromonte, cuna del flamenco granadino. Asiste a una zambra flamenca pura y admira las vistas panorámicas de la Alhambra bajo las estrellas.'),
(3, 'Catedral de Granada', 'img/catedral.jpg', 'Descubre la gran obra del Renacimiento español en el centro de la ciudad y pasea por las callejuelas históricas de la Alcaicería, reviviendo el antiguo zoco árabe con magia en cada rincón.'),
(4, 'Mirador San Nicolás', 'img/sanicolas.jpg', 'El mirador más célebre de Granada. Contempla el atardecer dorado reflejado en los muros de la Alhambra con el telón de fondo de Sierra Nevada, acompañado por el arte de las guitarras callejeras.'),
(5, 'Jardines del Triunfo', 'img/triunfo.jpg', 'Un espacioso e histórico parque urbano con amplios senderos ajardinados y una monumental fuente de agua iluminada con juegos de colores por las noches. Un rincón ideal para paseos nocturnos románticos.'),
(6, 'Carmen de los Mártires', 'img/martires.jpg', 'Un espectacular carmen romántico en lo alto de la colina de la Alhambra. Cuenta con paseos sombreados, pavos reales paseando libremente, un estanque con un pequeño embarcadero y miradores románticos.'),
(7, 'Carrera del Darro', 'img/carrera.jpg', 'Una de las calles más bonitas del planeta. Camina junto al murmullo del río Darro, bajo históricos puentes de piedra y fachadas centenarias, sintiendo el aroma del Albayzín y la majestuosa Alhambra arriba.'),
(8, 'Sierra Nevada', 'img/sierra.jpg', 'El punto más alto de Andalucía a solo unos kilómetros de la costa y la ciudad. Disfruta de una escapada activa en pareja practicando deportes de nieve en invierno o haciendo senderismo de alta montaña en verano.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trajestb`
--

CREATE TABLE `trajestb` (
  `idTraje` int NOT NULL,
  `nombreTraje` varchar(100) NOT NULL,
  `imgTraje` varchar(255) NOT NULL,
  `tipoTraje` varchar(50) NOT NULL,
  `descripcionTraje` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `trajestb`
--

INSERT INTO `trajestb` (`idTraje`, `nombreTraje`, `imgTraje`, `tipoTraje`, `descripcionTraje`) VALUES
(1, 'Traje de Novio', 'img/trajenovio.jpg', 'novio', 'Encuentra el corte y el estilo ideales para dar el \'sí, quiero\'. Ofrecemos chaqués clásicos, elegantes esmóquines, levitas modernas y trajes de sastre de tres piezas confeccionados con las lanas e hilos más distinguidos del mercado para que luzcas impecable.'),
(2, 'Traje de Novia', 'img/trajenovia.jpg', 'novia', 'Colecciones exclusivas de vestidos de novia procedentes de las pasarelas de alta costura más prestigiosas del mundo. Modelos de corte princesa románticos, siluetas sirena elegantes, vestidos bohemios desenfadados y velos bordados a mano que te harán brillar.'),
(3, 'Traje de Invitados', 'img/trajes.jpg', 'invitados', 'Viste a tu corte de honor y a tus seres queridos con la máxima elegancia. Amplia gama de vestidos de cóctel de seda, trajes formales de noche para padrinos, vestidos largos vaporosos y conjuntos de diseño exclusivo con paletas de colores de tendencia.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `fecha_boda` date DEFAULT NULL,
  `presupuesto_estimado` decimal(10,2) DEFAULT NULL,
  `token_recuperacion` varchar(100) DEFAULT NULL,
  `creado_en` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `actualizado_en` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoriastb`
--
ALTER TABLE `categoriastb`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `proveedorestb`
--
ALTER TABLE `proveedorestb`
  ADD PRIMARY KEY (`idProveedor`),
  ADD KEY `idCategoria` (`idCategoria`);

--
-- Indices de la tabla `rutastb`
--
ALTER TABLE `rutastb`
  ADD PRIMARY KEY (`idRuta`);

--
-- Indices de la tabla `trajestb`
--
ALTER TABLE `trajestb`
  ADD PRIMARY KEY (`idTraje`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoriastb`
--
ALTER TABLE `categoriastb`
  MODIFY `idCategoria` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `proveedorestb`
--
ALTER TABLE `proveedorestb`
  MODIFY `idProveedor` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `rutastb`
--
ALTER TABLE `rutastb`
  MODIFY `idRuta` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `trajestb`
--
ALTER TABLE `trajestb`
  MODIFY `idTraje` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `proveedorestb`
--
ALTER TABLE `proveedorestb`
  ADD CONSTRAINT `proveedorestb_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `categoriastb` (`idCategoria`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
