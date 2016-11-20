-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 11-06-2014 a las 04:59:34
-- Versión del servidor: 5.5.16
-- Versión de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `db_seliemor`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_calif_product`
--

CREATE TABLE IF NOT EXISTS `tb_calif_product` (
  `id_calif_product` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) NOT NULL,
  `cant_calif1` int(11) DEFAULT NULL,
  `cant_calif2` int(11) DEFAULT NULL,
  `cant_calif3` int(11) DEFAULT NULL,
  `cant_calif4` int(11) DEFAULT NULL,
  `cant_calif5` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_calif_product`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `tb_calif_product`
--

INSERT INTO `tb_calif_product` (`id_calif_product`, `id_producto`, `cant_calif1`, `cant_calif2`, `cant_calif3`, `cant_calif4`, `cant_calif5`) VALUES
(1, 1, 0, 0, 0, 0, 1),
(2, 2, 0, 0, 0, 1, 1),
(3, 3, 0, 0, 1, 1, 1),
(4, 4, 0, 0, 0, 0, 0),
(5, 5, 0, 0, 0, 0, 0),
(6, 6, 0, 0, 0, 0, 0),
(7, 7, 0, 0, 0, 0, 0),
(8, 8, 0, 0, 0, 0, 2),
(9, 9, 0, 0, 0, 0, 0),
(10, 10, 0, 0, 0, 0, 1),
(11, 11, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_categoria`
--

CREATE TABLE IF NOT EXISTS `tb_categoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(50) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `tb_categoria`
--

INSERT INTO `tb_categoria` (`id_categoria`, `categoria`) VALUES
(1, 'tecnologia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_comentario`
--

CREATE TABLE IF NOT EXISTS `tb_comentario` (
  `id_comentario` int(11) NOT NULL AUTO_INCREMENT,
  `comentario` varchar(500) NOT NULL,
  `id_producto` int(11) NOT NULL,
  PRIMARY KEY (`id_comentario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `tb_comentario`
--

INSERT INTO `tb_comentario` (`id_comentario`, `comentario`, `id_producto`) VALUES
(1, 'el producto me salio de buena calidad', 1),
(2, 'es bastante barato', 1),
(3, '', 1),
(4, 'el router permite parametros para balanceo de carga, es una buena opcion en cuanto a un precio economico ', 2),
(5, 'se le comio el gato', 4),
(6, 'el teclado trajo la letra Ã‘', 5),
(7, 'Muy buen producto', 2),
(8, 'impresora multifuncional!', 6),
(9, 'my economica', 8),
(10, 'la pantalla tiene buena resolucion', 8),
(11, 'es un disco muy bueno', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_producto`
--

CREATE TABLE IF NOT EXISTS `tb_producto` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `producto` varchar(50) NOT NULL,
  `precio` double(18,2) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_proveedor` int(11) DEFAULT NULL,
  `oferta` int(11) NOT NULL,
  PRIMARY KEY (`id_producto`),
  KEY `id_proveedor` (`id_proveedor`),
  KEY `id_categoria` (`id_categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `tb_producto`
--

INSERT INTO `tb_producto` (`id_producto`, `producto`, `precio`, `descripcion`, `imagen`, `id_categoria`, `id_proveedor`, `oferta`) VALUES
(1, 'Switch  TL-SF1016D ', 3549.00, 'switch con16 puertos RJ-45 Fast Ethernet 10/100 Mbps Capacidad de conmutación 3.2 Gbps', 'switch-1.png', 1, 1, 0),
(2, 'router-1', 3999.00, 'Tecnologia inalámbrica N 300mbps Bandas 2.4 GHz', 'router-1.png', 1, 1, 0),
(3, 'DISCO DURO EXTERNO', 999.00, 'Capacidad de 1TB color plata de 2.5”', 'disco-1.png', 1, 1, 0),
(4, 'Mouse1', 387.00, 'mouse inalámbrico y utiliza tecnología Bluetooth con botón de windows', 'mause-1.png', 1, 1, 1),
(5, 'Teclado1', 499.00, 'Sin periféricos, deslgado e ideal para cualquier mac', 'teclado-1.png', 1, 1, 0),
(6, 'impresora1', 845.00, 'Imprime, copia y escanea', 'impresora-1.png', 1, 1, 0),
(7, 'Escanner', 1385.00, 'No requiere de conectarse a la electricidad, se alimenta vÃ­a USB', 'escaner-1.png', 1, 1, 0),
(8, 'computadora', 4000.00, 'HP Computadora Hp All-in-One AMD Dual Core E4', 'computadora-1.png', 1, 1, 0),
(9, 'Laptop', 7999.00, 'Vostro 3050\nProcesador Core i3<br>', 'laptop-1.png', 1, 1, 0),
(10, 'SWITCH 5PORT', 85.00, 'switch 5 puertos', 'switch-2.png', 1, 1, 0),
(11, 'router2', 1700.00, 'Navega, trabaja y juega sin cables\nEl compacto router Wireless-G Broadband de Linksys combina tres dispositivos en uno - router, switch y punto de acceso. ', 'router-2.png', 1, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_proveedores`
--

CREATE TABLE IF NOT EXISTS `tb_proveedores` (
  `id_proveedor` int(11) NOT NULL AUTO_INCREMENT,
  `Proveedor` varchar(50) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `dir` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id_proveedor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `tb_proveedores`
--

INSERT INTO `tb_proveedores` (`id_proveedor`, `Proveedor`, `tel`, `dir`) VALUES
(1, 'Cisco', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_usuarios`
--

CREATE TABLE IF NOT EXISTS `tb_usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `pw` varchar(50) NOT NULL,
  `nivel` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`id_usuario`, `Nombre`, `correo`, `pw`, `nivel`) VALUES
(1, 'Jose', 'pepe@hotmail.com', '123', 3),
(2, 'jose', 'jose@hotmail.com', '123', 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tb_producto`
--
ALTER TABLE `tb_producto`
  ADD CONSTRAINT `tb_producto_ibfk_1` FOREIGN KEY (`id_proveedor`) REFERENCES `tb_proveedores` (`id_proveedor`),
  ADD CONSTRAINT `tb_producto_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `tb_categoria` (`id_categoria`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
