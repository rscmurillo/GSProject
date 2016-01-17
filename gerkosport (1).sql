-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-01-2016 a las 20:13:46
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `gerkosport`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alerta`
--

CREATE TABLE IF NOT EXISTS `alerta` (
  `ale_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `ped_codigo` int(11) NOT NULL,
  `map_codigo` int(11) NOT NULL,
  `ale_falta` int(11) NOT NULL,
  `ale_existe` int(11) NOT NULL,
  `ale_total` int(11) NOT NULL,
  PRIMARY KEY (`ale_codigo`),
  KEY `ped_codigo` (`ped_codigo`),
  KEY `map_codigo` (`map_codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `alerta`
--

INSERT INTO `alerta` (`ale_codigo`, `ped_codigo`, `map_codigo`, `ale_falta`, `ale_existe`, `ale_total`) VALUES
(1, 16, 17, 411, 111, 522),
(2, 16, 15, 236, 196, 432);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacen_materia`
--

CREATE TABLE IF NOT EXISTS `almacen_materia` (
  `almm_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `almm_cantidad` int(11) NOT NULL,
  `map_codigo` int(11) NOT NULL,
  PRIMARY KEY (`almm_codigo`),
  KEY `map_codigo` (`map_codigo`),
  KEY `map_codigo_2` (`map_codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `almacen_materia`
--

INSERT INTO `almacen_materia` (`almm_codigo`, `almm_cantidad`, `map_codigo`) VALUES
(12, 188, 12),
(13, 242, 13),
(14, 500, 14),
(15, 0, 15),
(16, 171, 16),
(17, 0, 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `cat_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `cat_nombre` varchar(100) NOT NULL,
  `cat_descripcion` varchar(300) NOT NULL,
  PRIMARY KEY (`cat_codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`cat_codigo`, `cat_nombre`, `cat_descripcion`) VALUES
(7, 'cat1', 'des1'),
(8, 'cat2', 'des2'),
(9, 'cat3', 'des3'),
(10, 'cat4', 'des4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `cli_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `cli_nombre` varchar(100) NOT NULL,
  `cli_nit` int(11) NOT NULL,
  `cli_telefono` int(11) NOT NULL,
  PRIMARY KEY (`cli_codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`cli_codigo`, `cli_nombre`, `cli_nit`, `cli_telefono`) VALUES
(7, 'Cliente1', 5184736, 77458745),
(8, 'Cliente2', 2147483647, 95854525);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedido`
--

CREATE TABLE IF NOT EXISTS `detalle_pedido` (
  `detp_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `ped_codigo` int(11) NOT NULL,
  `pro_codigo` int(11) NOT NULL,
  `detp_cantidad` int(11) NOT NULL,
  PRIMARY KEY (`detp_codigo`),
  KEY `pro_codigo` (`pro_codigo`),
  KEY `ped_codigo` (`ped_codigo`),
  KEY `ped_codigo_2` (`ped_codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Volcado de datos para la tabla `detalle_pedido`
--

INSERT INTO `detalle_pedido` (`detp_codigo`, `ped_codigo`, `pro_codigo`, `detp_cantidad`) VALUES
(30, 14, 13, 2),
(31, 14, 14, 3),
(32, 15, 13, 32),
(33, 15, 14, 48),
(34, 16, 13, 72),
(35, 16, 14, 78);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_salida_mp`
--

CREATE TABLE IF NOT EXISTS `detalle_salida_mp` (
  `dsmp_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `dsmp_cantidad` int(11) NOT NULL,
  `smp-codigo` int(11) NOT NULL,
  `map_codigo` int(11) NOT NULL,
  PRIMARY KEY (`dsmp_codigo`),
  KEY `smp-codigo` (`smp-codigo`),
  KEY `map_codigo` (`map_codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=145 ;

--
-- Volcado de datos para la tabla `detalle_salida_mp`
--

INSERT INTO `detalle_salida_mp` (`dsmp_codigo`, `dsmp_cantidad`, `smp-codigo`, `map_codigo`) VALUES
(130, 17, 37, 17),
(131, 6, 37, 13),
(132, 3, 37, 16),
(133, 12, 37, 15),
(134, 4, 37, 12),
(135, 272, 38, 17),
(136, 96, 38, 13),
(137, 48, 38, 16),
(138, 192, 38, 15),
(139, 64, 38, 12),
(140, 522, 39, 17),
(141, 156, 39, 13),
(142, 78, 39, 16),
(143, 432, 39, 15),
(144, 144, 39, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso_materia_prima`
--

CREATE TABLE IF NOT EXISTS `ingreso_materia_prima` (
  `imap_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `map_codigo` int(11) NOT NULL,
  `imap_cantidad` int(11) NOT NULL,
  `imap_cant_bolsa` int(11) NOT NULL,
  `imap_fecha_ingreso` varchar(20) NOT NULL,
  PRIMARY KEY (`imap_codigo`),
  KEY `map_codigo` (`map_codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `ingreso_materia_prima`
--

INSERT INTO `ingreso_materia_prima` (`imap_codigo`, `map_codigo`, `imap_cantidad`, `imap_cant_bolsa`, `imap_fecha_ingreso`) VALUES
(14, 17, 4, 100, '9/1/2016'),
(16, 16, 3, 100, '9/1/2016'),
(17, 15, 4, 100, '9/1/2016'),
(18, 14, 5, 100, '9/1/2016'),
(19, 13, 5, 100, '9/1/2016'),
(20, 12, 4, 100, '9/1/2016');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia_prima`
--

CREATE TABLE IF NOT EXISTS `materia_prima` (
  `map_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `cat_codigo` int(11) NOT NULL,
  `prov_codigo` int(11) NOT NULL,
  `map_nombre` varchar(100) NOT NULL,
  `map_precio` float NOT NULL,
  `map_un_medida` varchar(20) NOT NULL,
  PRIMARY KEY (`map_codigo`),
  KEY `cat_codigo` (`cat_codigo`),
  KEY `prov_codigo` (`prov_codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `materia_prima`
--

INSERT INTO `materia_prima` (`map_codigo`, `cat_codigo`, `prov_codigo`, `map_nombre`, `map_precio`, `map_un_medida`) VALUES
(12, 7, 10, 'mp1', 50, 'Metros'),
(13, 9, 10, 'mp2', 60, 'Unidades'),
(14, 8, 11, 'mp3', 45, 'Metros'),
(15, 8, 10, 'mp4', 65, 'Unidades'),
(16, 7, 11, 'mp5', 90, 'Metros'),
(17, 10, 11, 'mp6', 80, 'Unidades');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE IF NOT EXISTS `pedido` (
  `ped_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `cli_codigo` int(11) NOT NULL,
  `ped_prec_total` float NOT NULL,
  `ped_cant_total` int(11) NOT NULL,
  `ped_fecha` varchar(20) NOT NULL,
  `ped_estado` varchar(20) NOT NULL,
  `ped_fecha_entrega` varchar(20) NOT NULL,
  PRIMARY KEY (`ped_codigo`),
  KEY `cli_codigo` (`cli_codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`ped_codigo`, `cli_codigo`, `ped_prec_total`, `ped_cant_total`, `ped_fecha`, `ped_estado`, `ped_fecha_entrega`) VALUES
(14, 8, 795, 5, '2016-01-09', 'PRODUCCION', '2016-01-15'),
(15, 7, 12720, 80, '2016-01-17', 'PRODUCCION', '2016-01-22'),
(16, 8, 23670, 150, '2016-01-17', 'FALTA MATERIAL', '2016-01-30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `pro_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `pro_nombre` varchar(200) NOT NULL,
  `pro_precio` int(11) NOT NULL,
  `pro_descripcion` varchar(200) NOT NULL,
  PRIMARY KEY (`pro_codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`pro_codigo`, `pro_nombre`, `pro_precio`, `pro_descripcion`) VALUES
(13, 'producto1', 150, 'descripcion1'),
(14, 'producto2', 165, '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_materia`
--

CREATE TABLE IF NOT EXISTS `producto_materia` (
  `prm_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `pro_codigo` int(11) NOT NULL,
  `map_codigo` int(11) NOT NULL,
  `prm_cantidad` int(11) NOT NULL,
  PRIMARY KEY (`prm_codigo`),
  KEY `pro-codigo` (`pro_codigo`),
  KEY `map_codigo` (`map_codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Volcado de datos para la tabla `producto_materia`
--

INSERT INTO `producto_materia` (`prm_codigo`, `pro_codigo`, `map_codigo`, `prm_cantidad`) VALUES
(18, 13, 12, 2),
(19, 13, 15, 6),
(20, 13, 17, 4),
(21, 14, 16, 1),
(22, 14, 13, 2),
(23, 14, 17, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE IF NOT EXISTS `proveedor` (
  `prov_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `prov_nombre` varchar(100) NOT NULL,
  `prov_pais` varchar(50) NOT NULL,
  `prov_descripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`prov_codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`prov_codigo`, `prov_nombre`, `prov_pais`, `prov_descripcion`) VALUES
(10, 'proveedor1', 'pais1', 'descripcion1'),
(11, 'proveedor2', 'pais2', 'descripcion2'),
(12, 'proveedor3', 'pais3', 'descripcion3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salida_materia_prima`
--

CREATE TABLE IF NOT EXISTS `salida_materia_prima` (
  `smp_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `smp_fecha_salida` varchar(20) NOT NULL,
  `ped_codigo` int(11) NOT NULL,
  PRIMARY KEY (`smp_codigo`),
  KEY `detp_codigo` (`ped_codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Volcado de datos para la tabla `salida_materia_prima`
--

INSERT INTO `salida_materia_prima` (`smp_codigo`, `smp_fecha_salida`, `ped_codigo`) VALUES
(37, '2016-1-9', 14),
(38, '2016-1-17', 15),
(39, '2016-1-17', 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `usu_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `usu_nombre` varchar(100) NOT NULL,
  `usu_apellido` varchar(100) NOT NULL,
  `usu_telefono` int(11) NOT NULL,
  `usu_direccion` varchar(100) NOT NULL,
  `usu_login` varchar(20) NOT NULL,
  `usu_password` varchar(20) NOT NULL,
  `usu_cargo` varchar(30) NOT NULL,
  PRIMARY KEY (`usu_codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usu_codigo`, `usu_nombre`, `usu_apellido`, `usu_telefono`, `usu_direccion`, `usu_login`, `usu_password`, `usu_cargo`) VALUES
(1, 'Vladimir ', 'Copa Barreto', 4577889, 'Av. Petrolera', 'admin', 'admin', 'Administrador'),
(2, 'Jhoselin', 'Torrico Moya', 4577654, 'C/ Lanza #234', 'jhotito', 'jhoto34', 'Encargado de Produccion');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alerta`
--
ALTER TABLE `alerta`
  ADD CONSTRAINT `alerta_ibfk_1` FOREIGN KEY (`ped_codigo`) REFERENCES `pedido` (`ped_codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alerta_ibfk_2` FOREIGN KEY (`map_codigo`) REFERENCES `materia_prima` (`map_codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `almacen_materia`
--
ALTER TABLE `almacen_materia`
  ADD CONSTRAINT `almacen_materia_ibfk_1` FOREIGN KEY (`map_codigo`) REFERENCES `materia_prima` (`map_codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD CONSTRAINT `detalle_pedido_ibfk_1` FOREIGN KEY (`pro_codigo`) REFERENCES `producto` (`pro_codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_pedido_ibfk_2` FOREIGN KEY (`ped_codigo`) REFERENCES `pedido` (`ped_codigo`);

--
-- Filtros para la tabla `detalle_salida_mp`
--
ALTER TABLE `detalle_salida_mp`
  ADD CONSTRAINT `detalle_salida_mp_ibfk_1` FOREIGN KEY (`smp-codigo`) REFERENCES `salida_materia_prima` (`smp_codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_salida_mp_ibfk_2` FOREIGN KEY (`map_codigo`) REFERENCES `materia_prima` (`map_codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `ingreso_materia_prima`
--
ALTER TABLE `ingreso_materia_prima`
  ADD CONSTRAINT `ingreso_materia_prima_ibfk_1` FOREIGN KEY (`map_codigo`) REFERENCES `materia_prima` (`map_codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `materia_prima`
--
ALTER TABLE `materia_prima`
  ADD CONSTRAINT `materia_prima_ibfk_1` FOREIGN KEY (`cat_codigo`) REFERENCES `categoria` (`cat_codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `materia_prima_ibfk_2` FOREIGN KEY (`prov_codigo`) REFERENCES `proveedor` (`prov_codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`cli_codigo`) REFERENCES `cliente` (`cli_codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto_materia`
--
ALTER TABLE `producto_materia`
  ADD CONSTRAINT `producto_materia_ibfk_2` FOREIGN KEY (`map_codigo`) REFERENCES `materia_prima` (`map_codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_materia_ibfk_3` FOREIGN KEY (`pro_codigo`) REFERENCES `producto` (`pro_codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `salida_materia_prima`
--
ALTER TABLE `salida_materia_prima`
  ADD CONSTRAINT `salida_materia_prima_ibfk_1` FOREIGN KEY (`ped_codigo`) REFERENCES `pedido` (`ped_codigo`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
