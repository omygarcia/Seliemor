-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 18-07-2014 a las 07:02:25
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
(2, 2, 0, 0, 0, 1, 5),
(3, 3, 0, 0, 1, 1, 1),
(4, 4, 0, 0, 0, 1, 1),
(5, 5, 0, 0, 0, 0, 0),
(6, 6, 0, 0, 0, 0, 0),
(7, 7, 0, 0, 0, 0, 1),
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
  `fecha_publicacion` date NOT NULL,
  `tipo_comentario` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `mareli` int(11) NOT NULL,
  PRIMARY KEY (`id_comentario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Volcado de datos para la tabla `tb_comentario`
--

INSERT INTO `tb_comentario` (`id_comentario`, `comentario`, `fecha_publicacion`, `tipo_comentario`, `id_producto`, `mareli`) VALUES
(1, 'el producto me salio de buena calidad', '2014-05-08', 1, 1, 0),
(2, 'es bastante barato', '2014-05-08', 1, 1, 0),
(3, '', '2014-05-08', 1, 1, 0),
(4, 'el router permite parametros para balanceo de carga, es una buena opcion en cuanto a un precio economico ', '2014-05-08', 1, 2, 0),
(5, 'se le comio el gato', '2014-05-08', 1, 4, 0),
(6, 'el teclado trajo la letra Ã‘', '2014-05-08', 1, 5, 0),
(7, 'Muy buen producto', '2014-05-08', 1, 2, 0),
(8, 'impresora multifuncional!', '2014-05-08', 1, 6, 0),
(9, 'my economica', '2014-05-08', 1, 8, 0),
(10, 'la pantalla tiene buena resolucion', '2014-05-08', 1, 8, 0),
(11, 'es un disco muy bueno', '2014-05-08', 1, 3, 0),
(12, 'es pequeÃ±o', '2014-05-08', 1, 4, 0),
(13, 'es rapido al escanear\n', '2014-05-08', 1, 7, 0),
(14, 'tiene buena resolucion', '2014-05-08', 1, 8, 0),
(15, 'sip', '2014-06-27', 2, 2, 0),
(16, 'tiene buena calidad y es barato', '0000-00-00', 1, 2, 0),
(17, 'sip', '2014-06-27', 2, 2, 0),
(18, 'poppo', '2014-07-01', 2, 2, 0),
(19, 'hola', '2014-07-01', 2, 2, 0),
(20, 'tiene buena calidad', '0000-00-00', 0, 2, 0),
(21, 'es un producto de buena calidad', '2014-07-02', 1, 2, 0),
(22, 'sip', '2014-07-02', 2, 2, 0),
(23, 'ok', '2014-07-02', 2, 2, 0),
(24, 'fff', '2014-07-02', 2, 2, 0),
(25, 'erer', '2014-07-02', 2, 2, 0),
(26, 'SIP', '2014-07-02', 2, 2, 0),
(27, 'Buenas noches , necesito 8 ratones 		  	', '2014-07-18', 3, 1, 1),
(28, '					  	Hola, buenas noches necesito 3 ratones', '2014-07-18', 3, 1, 1),
(29, '					  	Hola , necesitava comprar mas laptos necesito 3', '2014-07-18', 3, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_comentario_respuesta`
--

CREATE TABLE IF NOT EXISTS `tb_comentario_respuesta` (
  `id_comentario_respuesta` int(11) NOT NULL AUTO_INCREMENT,
  `id_comentario` int(11) NOT NULL,
  `id_comentario_r` int(11) NOT NULL,
  PRIMARY KEY (`id_comentario_respuesta`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `tb_comentario_respuesta`
--

INSERT INTO `tb_comentario_respuesta` (`id_comentario_respuesta`, `id_comentario`, `id_comentario_r`) VALUES
(1, 7, 15),
(2, 16, 17),
(3, 0, 0),
(4, 0, 0),
(5, 0, 22),
(6, 0, 23),
(7, 0, 24),
(8, 21, 25),
(9, 7, 26);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_detalle_pedido`
--

CREATE TABLE IF NOT EXISTS `tb_detalle_pedido` (
  `id_detalle_pedido` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  PRIMARY KEY (`id_detalle_pedido`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Volcado de datos para la tabla `tb_detalle_pedido`
--

INSERT INTO `tb_detalle_pedido` (`id_detalle_pedido`, `id_producto`, `cantidad`, `id_pedido`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 1),
(3, 1, 3, 2),
(4, 2, 4, 2),
(5, 1, 3, 3),
(6, 2, 2, 3),
(7, 3, 3, 3),
(8, 4, 2, 3),
(9, 5, 3, 3),
(10, 6, 3, 3),
(11, 7, 3, 3),
(12, 8, 3, 3),
(13, 9, 3, 3),
(14, 10, 3, 3),
(15, 11, 3, 3),
(16, 1, 1, 4),
(17, 2, 1, 4),
(18, 3, 1, 4),
(19, 4, 1, 4),
(20, 5, 1, 4),
(21, 6, 1, 4),
(22, 7, 1, 4),
(23, 8, 1, 4),
(24, 9, 1, 4),
(25, 10, 1, 4),
(26, 11, 1, 4),
(27, 1, 1, 5),
(28, 2, 1, 5),
(29, 3, 1, 5),
(30, 4, 1, 5),
(31, 5, 1, 5),
(32, 6, 1, 5),
(33, 7, 1, 5),
(34, 8, 1, 5),
(35, 9, 1, 5),
(36, 10, 1, 5),
(37, 11, 1, 5),
(38, 1, 1, 6),
(39, 2, 1, 6),
(40, 3, 1, 6),
(41, 4, 1, 6),
(42, 5, 1, 6),
(43, 6, 1, 6),
(44, 1, 1, 7),
(45, 2, 1, 7),
(46, 3, 1, 7),
(47, 4, 1, 7),
(48, 5, 1, 7),
(49, 6, 1, 7),
(50, 7, 3, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_detalle_venta`
--

CREATE TABLE IF NOT EXISTS `tb_detalle_venta` (
  `id_detalle_venta` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) NOT NULL,
  `cant` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  PRIMARY KEY (`id_detalle_venta`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Volcado de datos para la tabla `tb_detalle_venta`
--

INSERT INTO `tb_detalle_venta` (`id_detalle_venta`, `id_producto`, `cant`, `precio`, `id_venta`) VALUES
(16, 4, 1, 387, 15),
(17, 10, 1, 85, 15),
(18, 4, 1, 387, 16),
(19, 10, 1, 85, 16),
(20, 4, 1, 387, 17),
(21, 10, 2, 85, 17),
(22, 10, 4, 85, 18),
(23, 10, 1, 85, 19),
(24, 10, 9, 85, 20),
(25, 10, 9, 85, 21),
(26, 1, 1, 3549, 22),
(27, 2, 1, 3999, 22),
(28, 1, 1, 3549, 23),
(29, 2, 1, 3999, 23);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_factura`
--

CREATE TABLE IF NOT EXISTS `tb_factura` (
  `id_factura` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_expedicion` date NOT NULL,
  `hora_expedicion` time NOT NULL,
  `id_forma_pago` int(11) NOT NULL,
  `id_lugar_expedicion` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  PRIMARY KEY (`id_factura`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `tb_factura`
--

INSERT INTO `tb_factura` (`id_factura`, `fecha_expedicion`, `hora_expedicion`, `id_forma_pago`, `id_lugar_expedicion`, `id_venta`) VALUES
(1, '2014-06-26', '21:09:00', 1, 1, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_forma_pago`
--

CREATE TABLE IF NOT EXISTS `tb_forma_pago` (
  `id_forma_pago` int(11) NOT NULL AUTO_INCREMENT,
  `forma_pago` varchar(50) NOT NULL,
  PRIMARY KEY (`id_forma_pago`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tb_forma_pago`
--

INSERT INTO `tb_forma_pago` (`id_forma_pago`, `forma_pago`) VALUES
(1, 'via electronica'),
(2, 'bancario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_lugar_expedicion`
--

CREATE TABLE IF NOT EXISTS `tb_lugar_expedicion` (
  `id_lugar_expedicion` int(11) NOT NULL AUTO_INCREMENT,
  `lugar_expedicion` varchar(50) NOT NULL,
  PRIMARY KEY (`id_lugar_expedicion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `tb_lugar_expedicion`
--

INSERT INTO `tb_lugar_expedicion` (`id_lugar_expedicion`, `lugar_expedicion`) VALUES
(1, 'sucursal puebla 1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_pedido`
--

CREATE TABLE IF NOT EXISTS `tb_pedido` (
  `id_pedido` int(11) NOT NULL AUTO_INCREMENT,
  `id_proveedor` int(11) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id_pedido`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `tb_pedido`
--

INSERT INTO `tb_pedido` (`id_pedido`, `id_proveedor`, `fecha`) VALUES
(1, 1, '2014-07-17'),
(2, 1, '2014-07-17'),
(3, 1, '2014-07-18'),
(4, 1, '2014-07-18'),
(5, 1, '2014-07-18'),
(6, 1, '2014-07-18'),
(7, 1, '2014-07-18');

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
  `cant_existente` int(11) NOT NULL,
  PRIMARY KEY (`id_producto`),
  KEY `id_proveedor` (`id_proveedor`),
  KEY `id_categoria` (`id_categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `tb_producto`
--

INSERT INTO `tb_producto` (`id_producto`, `producto`, `precio`, `descripcion`, `imagen`, `id_categoria`, `id_proveedor`, `oferta`, `cant_existente`) VALUES
(1, 'Switch  TL-SF1016D ', 3549.00, 'switch con16 puertos RJ-45 Fast Ethernet 10/100 Mbps Capacidad de conmutación 3.2 Gbps', 'switch-1.png', 1, 1, 0, 8),
(2, 'router-1', 3999.00, 'Tecnologia inalámbrica N 300mbps Bandas 2.4 GHz', 'router-1.png', 1, 1, 0, 8),
(3, 'DISCO DURO EXTERNO', 999.00, 'Capacidad de 1TB color plata de 2.5”', 'disco-1.png', 1, 1, 0, 9),
(4, 'Mouse1', 387.00, 'mouse inalámbrico y utiliza tecnología Bluetooth con botón de windows', 'mause-1.png', 1, 1, 1, 14),
(5, 'Teclado1', 499.00, 'Sin periféricos, deslgado e ideal para cualquier mac', 'teclado-1.png', 1, 1, 0, 8),
(6, 'impresora1', 845.00, 'Imprime, copia y escanea', 'impresora-1.png', 1, 1, 0, 8),
(7, 'Escanner', 1385.00, 'No requiere de conectarse a la electricidad, se alimenta vÃ­a USB', 'escaner-1.png', 1, 1, 0, 8),
(8, 'computadora', 4000.00, 'HP Computadora Hp All-in-One AMD Dual Core E4', 'computadora-1.png', 1, 1, 0, 8),
(9, 'Laptop', 7999.00, 'Vostro 3050\nProcesador Core i3<br>', 'laptop-1.png', 1, 1, 0, 8),
(10, 'SWITCH 5PORT', 85.00, 'switch 5 puertos', 'switch-2.png', 1, 1, 0, 8),
(11, 'router2', 1700.00, 'Navega, trabaja y juega sin cables\nEl compacto router Wireless-G Broadband de Linksys combina tres dispositivos en uno - router, switch y punto de acceso. ', 'router-2.png', 1, 1, 0, 8);

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
(1, 'Cisco', '8950693', '15 norte 1522');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_usuarios`
--

CREATE TABLE IF NOT EXISTS `tb_usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  `Apellidos` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `rfc` varchar(50) NOT NULL,
  `cp` varchar(50) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `pw` varchar(50) NOT NULL,
  `nivel` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`id_usuario`, `Nombre`, `Apellidos`, `direccion`, `rfc`, `cp`, `tel`, `correo`, `pw`, `nivel`) VALUES
(1, 'Jose', '', '', '', '', '', 'pepe@hotmail.com', '123', 3),
(2, 'jose', '', '', '', '', '', 'jose@hotmail.com', '123', 1),
(3, '', '', '', '', '', '', '', '', 1),
(4, 'Jose ', 'Mendosa', '15 norte 1024', 'jomz988565ss4', '72563', '8950697', 'jose2@hotmail.com', '123', 1),
(5, 'admin', '', '', 'admin789944', '89562', '8956325', 'admin@hotmail.com', '123', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_venta`
--

CREATE TABLE IF NOT EXISTS `tb_venta` (
  `id_venta` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `id_cliente` int(11) NOT NULL,
  PRIMARY KEY (`id_venta`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Volcado de datos para la tabla `tb_venta`
--

INSERT INTO `tb_venta` (`id_venta`, `fecha`, `id_cliente`) VALUES
(15, '2014-06-27', 4),
(16, '2014-06-27', 4),
(17, '2014-06-27', 4),
(18, '2014-06-27', 4),
(19, '2014-06-27', 4),
(20, '2014-06-27', 4),
(21, '2014-06-27', 4),
(22, '2014-06-27', 4),
(23, '2014-06-27', 4);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_comentarios_admon`
--
CREATE TABLE IF NOT EXISTS `vw_comentarios_admon` (
`id_comentario` int(11)
,`comentario` varchar(500)
,`fecha_publicacion` date
,`tipo_comentario` int(11)
,`id_producto` int(11)
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_datos_factura`
--
CREATE TABLE IF NOT EXISTS `vw_datos_factura` (
`id_factura` int(11)
,`fecha_expedicion` date
,`hora_expedicion` time
,`id_usuario` int(11)
,`Nombre` varchar(50)
,`Apellidos` varchar(50)
,`direccion` varchar(50)
,`rfc` varchar(50)
,`cp` varchar(50)
,`tel` varchar(50)
,`forma_pago` varchar(50)
,`lugar_expedicion` varchar(50)
,`id_venta` int(11)
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_datos_orden`
--
CREATE TABLE IF NOT EXISTS `vw_datos_orden` (
`id_venta` int(11)
,`fecha` date
,`Nombre` varchar(50)
,`Apellidos` varchar(50)
,`rfc` varchar(50)
,`cp` varchar(50)
,`tel` varchar(50)
,`correo` varchar(50)
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_datos_proveedor`
--
CREATE TABLE IF NOT EXISTS `vw_datos_proveedor` (
`id_pedido` int(11)
,`fecha` date
,`Proveedor` varchar(50)
,`tel` varchar(20)
,`dir` varchar(250)
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_detalle_pedido`
--
CREATE TABLE IF NOT EXISTS `vw_detalle_pedido` (
`id_pedido` int(11)
,`fecha` date
,`Proveedor` varchar(50)
,`id_producto` int(11)
,`producto` varchar(50)
,`cantidad` int(11)
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_detalle_venta`
--
CREATE TABLE IF NOT EXISTS `vw_detalle_venta` (
`id_venta` int(11)
,`fecha` date
,`cliente` varchar(50)
,`producto` varchar(50)
,`descripcion` varchar(250)
,`cant` int(11)
,`precio` int(11)
,`Importe` bigint(21)
,`id_producto` int(11)
);
-- --------------------------------------------------------

--
-- Estructura para la vista `vw_comentarios_admon`
--
DROP TABLE IF EXISTS `vw_comentarios_admon`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_comentarios_admon` AS select `tb_comentario`.`id_comentario` AS `id_comentario`,`tb_comentario`.`comentario` AS `comentario`,`tb_comentario`.`fecha_publicacion` AS `fecha_publicacion`,`tb_comentario`.`tipo_comentario` AS `tipo_comentario`,`tb_comentario`.`id_producto` AS `id_producto` from `tb_comentario` where ((`tb_comentario`.`tipo_comentario` = 3) and (`tb_comentario`.`mareli` = 1));

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_datos_factura`
--
DROP TABLE IF EXISTS `vw_datos_factura`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_datos_factura` AS select `x1`.`id_factura` AS `id_factura`,`x1`.`fecha_expedicion` AS `fecha_expedicion`,`x1`.`hora_expedicion` AS `hora_expedicion`,`x3`.`id_usuario` AS `id_usuario`,`x3`.`Nombre` AS `Nombre`,`x3`.`Apellidos` AS `Apellidos`,`x3`.`direccion` AS `direccion`,`x3`.`rfc` AS `rfc`,`x3`.`cp` AS `cp`,`x3`.`tel` AS `tel`,`x4`.`forma_pago` AS `forma_pago`,`x5`.`lugar_expedicion` AS `lugar_expedicion`,`x2`.`id_venta` AS `id_venta` from ((((`tb_factura` `x1` left join `tb_venta` `x2` on((`x1`.`id_venta` = `x2`.`id_venta`))) left join `tb_usuarios` `x3` on((`x2`.`id_cliente` = `x3`.`id_usuario`))) left join `tb_forma_pago` `x4` on((`x1`.`id_forma_pago` = `x4`.`id_forma_pago`))) left join `tb_lugar_expedicion` `x5` on((`x1`.`id_lugar_expedicion` = `x5`.`id_lugar_expedicion`)));

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_datos_orden`
--
DROP TABLE IF EXISTS `vw_datos_orden`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_datos_orden` AS select `x1`.`id_venta` AS `id_venta`,`x1`.`fecha` AS `fecha`,`x2`.`Nombre` AS `Nombre`,`x2`.`Apellidos` AS `Apellidos`,`x2`.`rfc` AS `rfc`,`x2`.`cp` AS `cp`,`x2`.`tel` AS `tel`,`x2`.`correo` AS `correo` from (`tb_venta` `x1` left join `tb_usuarios` `x2` on((`x1`.`id_cliente` = `x2`.`id_usuario`)));

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_datos_proveedor`
--
DROP TABLE IF EXISTS `vw_datos_proveedor`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_datos_proveedor` AS select `x1`.`id_pedido` AS `id_pedido`,`x1`.`fecha` AS `fecha`,`x2`.`Proveedor` AS `Proveedor`,`x2`.`tel` AS `tel`,`x2`.`dir` AS `dir` from (`tb_pedido` `x1` left join `tb_proveedores` `x2` on((`x1`.`id_proveedor` = `x2`.`id_proveedor`)));

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_detalle_pedido`
--
DROP TABLE IF EXISTS `vw_detalle_pedido`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_detalle_pedido` AS select `x1`.`id_pedido` AS `id_pedido`,`x1`.`fecha` AS `fecha`,`x3`.`Proveedor` AS `Proveedor`,`x4`.`id_producto` AS `id_producto`,`x4`.`producto` AS `producto`,`x2`.`cantidad` AS `cantidad` from (((`tb_pedido` `x1` left join `tb_detalle_pedido` `x2` on((`x1`.`id_pedido` = `x2`.`id_pedido`))) left join `tb_proveedores` `x3` on((`x1`.`id_proveedor` = `x3`.`id_proveedor`))) left join `tb_producto` `x4` on((`x2`.`id_producto` = `x4`.`id_producto`)));

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_detalle_venta`
--
DROP TABLE IF EXISTS `vw_detalle_venta`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_detalle_venta` AS select `x1`.`id_venta` AS `id_venta`,`x1`.`fecha` AS `fecha`,`x4`.`Nombre` AS `cliente`,`x3`.`producto` AS `producto`,`x3`.`descripcion` AS `descripcion`,`x2`.`cant` AS `cant`,`x2`.`precio` AS `precio`,(`x2`.`cant` * `x2`.`precio`) AS `Importe`,`x3`.`id_producto` AS `id_producto` from (((`tb_venta` `x1` left join `tb_detalle_venta` `x2` on((`x1`.`id_venta` = `x2`.`id_venta`))) left join `tb_producto` `x3` on((`x2`.`id_producto` = `x3`.`id_producto`))) left join `tb_usuarios` `x4` on((`x1`.`id_cliente` = `x4`.`id_usuario`)));

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
