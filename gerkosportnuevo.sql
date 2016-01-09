-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-11-2015 a las 11:22:16
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `gerkosportnuevo`
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
  `ale_estado` varchar(20) NOT NULL,
  PRIMARY KEY (`ale_codigo`),
  KEY `ped_codigo` (`ped_codigo`),
  KEY `map_codigo` (`map_codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `alerta`
--

INSERT INTO `alerta` (`ale_codigo`, `ped_codigo`, `map_codigo`, `ale_falta`, `ale_existe`, `ale_total`, `ale_estado`) VALUES
(7, 2, 34, 60, 0, 60, 'Habilitado'),
(8, 2, 31, 120, 0, 120, 'Habilitado'),
(9, 2, 33, 120, 0, 120, 'Habilitado'),
(10, 2, 16, 30, 30, 60, 'Habilitado'),
(11, 2, 34, 60, 0, 60, 'Habilitado'),
(12, 2, 31, 120, 0, 120, 'Habilitado'),
(13, 2, 33, 120, 0, 120, 'Habilitado'),
(14, 2, 16, 60, 0, 60, 'Habilitado'),
(15, 3, 34, 120, 0, 120, 'Habilitado'),
(16, 3, 30, 360, 0, 360, 'Habilitado'),
(17, 3, 28, 280, 320, 600, 'Habilitado');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Volcado de datos para la tabla `almacen_materia`
--

INSERT INTO `almacen_materia` (`almm_codigo`, `almm_cantidad`, `map_codigo`) VALUES
(12, 205, 12),
(13, 390, 13),
(14, 150, 14),
(15, 150, 15),
(16, 0, 16),
(17, 150, 17),
(18, 0, 18),
(19, 320, 19),
(20, 20, 20),
(21, 300, 21),
(22, 350, 22),
(23, 40, 23),
(24, 270, 24),
(25, 30, 25),
(26, 570, 26),
(27, 260, 27),
(28, 0, 28),
(29, 300, 29),
(30, 0, 30),
(31, 0, 31),
(32, 0, 32),
(33, 0, 33),
(34, 300, 34);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `cat_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `cat_nombre` varchar(100) NOT NULL,
  `cat_descripcion` varchar(300) NOT NULL,
  PRIMARY KEY (`cat_codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`cat_codigo`, `cat_nombre`, `cat_descripcion`) VALUES
(7, 'Tela cuadriculado menudo ', 'material para morrales, mochilas y maletines'),
(8, 'Tela cuadriculado grande ', 'material para morrales, mochilas y maletines'),
(9, 'Tela Kaki primera', 'material para morrales y mochilas'),
(10, 'Tela Kaki segunda', 'material para morrales y mochilas'),
(11, 'Lenguetas', 'accesorios para toda clase de productos'),
(12, 'Regulador', 'accesorios para toda clase de productos'),
(13, 'Cierre', 'accesorios para toda clase de productos'),
(14, 'Llaves', 'accesorios para toda clase de productos'),
(15, 'Correa', 'accesorios para toda clase de productos'),
(16, 'Forro', 'accesorios para toda clase de productos');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`cli_codigo`, `cli_nombre`, `cli_nit`, `cli_telefono`) VALUES
(1, 'Maria Terrazas', 123456789, 4214356),
(2, 'Omar Agular', 54321678, 4365789),
(3, 'Miriam Ayala', 98765123, 79764532);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `detalle_pedido`
--

INSERT INTO `detalle_pedido` (`detp_codigo`, `ped_codigo`, `pro_codigo`, `detp_cantidad`) VALUES
(4, 2, 13, 60),
(5, 2, 14, 60),
(6, 3, 17, 120),
(7, 4, 15, 60),
(8, 4, 14, 60);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Volcado de datos para la tabla `detalle_salida_mp`
--

INSERT INTO `detalle_salida_mp` (`dsmp_codigo`, `dsmp_cantidad`, `smp-codigo`, `map_codigo`) VALUES
(15, 60, 2, 34),
(16, 120, 2, 31),
(17, 120, 2, 28),
(18, 60, 2, 25),
(19, 120, 2, 23),
(20, 60, 2, 12),
(21, 120, 2, 33),
(22, 180, 2, 29),
(23, 60, 2, 27),
(24, 120, 2, 26),
(25, 120, 2, 20),
(26, 60, 2, 16),
(27, 60, 3, 34),
(28, 120, 3, 31),
(29, 120, 3, 28),
(30, 60, 3, 25),
(31, 120, 3, 23),
(32, 60, 3, 12),
(33, 120, 3, 33),
(34, 180, 3, 29),
(35, 60, 3, 27),
(36, 120, 3, 26),
(37, 120, 3, 20),
(38, 60, 3, 16),
(39, 120, 4, 34),
(40, 360, 4, 30),
(41, 600, 4, 28),
(42, 360, 4, 25),
(43, 360, 4, 23),
(44, 120, 4, 18);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Volcado de datos para la tabla `ingreso_materia_prima`
--

INSERT INTO `ingreso_materia_prima` (`imap_codigo`, `map_codigo`, `imap_cantidad`, `imap_cant_bolsa`, `imap_fecha_ingreso`) VALUES
(13, 12, 1, 65, '2/11/2015'),
(14, 13, 1, 65, '2/11/2015'),
(15, 14, 1, 150, '2/11/2015'),
(16, 15, 1, 150, '2/11/2015'),
(17, 16, 1, 150, '2/11/2015'),
(18, 17, 1, 150, '2/11/2015'),
(19, 18, 2, 60, '2/11/2015'),
(20, 19, 2, 60, '2/11/2015'),
(21, 20, 1, 500, '2/11/2015'),
(22, 21, 1, 300, '2/11/2015'),
(23, 22, 1, 350, '2/11/2015'),
(24, 23, 1, 500, '2/11/2015'),
(25, 24, 3, 90, '2/11/2015'),
(26, 25, 2, 90, '2/11/2015'),
(27, 26, 3, 90, '2/11/2015'),
(28, 27, 1, 500, '2/11/2015'),
(29, 28, 2, 400, '2/11/2015'),
(30, 29, 3, 400, '2/11/2015'),
(31, 12, 5, 65, '4/11/2015'),
(32, 13, 5, 65, '4/11/2015'),
(33, 25, 5, 90, '4/11/2015'),
(34, 26, 9, 90, '4/11/2015'),
(35, 23, 1, 500, '4/11/2015'),
(36, 19, 4, 65, '4/11/2015'),
(37, 34, 3, 100, '4/11/2015');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Volcado de datos para la tabla `materia_prima`
--

INSERT INTO `materia_prima` (`map_codigo`, `cat_codigo`, `prov_codigo`, `map_nombre`, `map_precio`, `map_un_medida`) VALUES
(12, 7, 10, 'cuadriculado m negro', 760, 'Metros'),
(13, 7, 10, 'cuadriculado m plomo', 760, 'Metros'),
(14, 9, 12, 'Kaki primera negro', 1800, 'Metros'),
(15, 10, 12, 'Kaki segunda cafe', 1500, 'Metros'),
(16, 10, 12, 'Kaki segunda negro', 1500, 'Metros'),
(17, 10, 12, 'Kaki segunda fuxia', 1500, 'Metros'),
(18, 8, 10, 'cuadriculado g negro', 820, 'Metros'),
(19, 8, 10, 'cuadriculado g azul', 820, 'Metros'),
(20, 11, 11, 'lengueta N2', 54, 'Unidades'),
(21, 11, 11, 'lengueta N4', 65, 'Unidades'),
(22, 12, 12, 'regulador n2', 65, 'Unidades'),
(23, 12, 12, 'regulador n4', 75, 'Unidades'),
(24, 13, 10, 'cierre n5', 60, 'Metros'),
(25, 13, 10, 'cierre n8', 60, 'metros'),
(26, 13, 10, 'cierre n10', 85, 'Metros'),
(27, 14, 11, 'llave n5', 150, 'Unidades'),
(28, 14, 11, 'llave n8', 180, 'Unidades'),
(29, 14, 11, 'llave n10', 200, 'Unidades'),
(30, 15, 10, 'correa n4 negro', 55, 'Metros'),
(31, 15, 10, 'correa n4 plomo', 55, 'Metros'),
(32, 15, 10, 'correa n2 negro', 45, 'Metros'),
(33, 15, 10, 'correa n2 plomo', 50, 'Metros'),
(34, 16, 12, 'forro antonio', 480, 'Metros');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`ped_codigo`, `cli_codigo`, `ped_prec_total`, `ped_cant_total`, `ped_fecha`, `ped_estado`, `ped_fecha_entrega`) VALUES
(2, 3, 5100, 120, '2015-11-04', 'FALTA MATERIAL', '2015-11-18'),
(3, 2, 7200, 120, '2015-11-04', 'FALTA MATERIAL', '2015-11-25'),
(4, 1, 5100, 120, '2015-11-06', 'PENDIENTE', '2015-12-03');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`pro_codigo`, `pro_nombre`, `pro_precio`, `pro_descripcion`) VALUES
(13, 'mochila nike', 45, 'mochila grande tamaño archivador estampado grande'),
(14, 'Cartera duko bags', 40, 'cartera para mujer mediano, tamaño carta'),
(15, 'Cartera Sofia', 45, 'cartera escolar para niñas, mediana tamaño carta'),
(16, 'Mochila addidas', 55, 'mochila grande, tamaño archivador y estampado grande'),
(17, 'Maletin Totto', 60, 'maletin deportivo mediano');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Volcado de datos para la tabla `producto_materia`
--

INSERT INTO `producto_materia` (`prm_codigo`, `pro_codigo`, `map_codigo`, `prm_cantidad`) VALUES
(18, 13, 16, 1),
(19, 13, 20, 2),
(20, 13, 26, 2),
(21, 13, 27, 1),
(22, 13, 29, 3),
(23, 13, 33, 2),
(24, 14, 12, 1),
(25, 14, 23, 2),
(26, 14, 25, 1),
(27, 14, 28, 2),
(28, 14, 31, 2),
(29, 14, 34, 1),
(30, 15, 19, 1),
(31, 15, 23, 2),
(32, 15, 26, 1),
(33, 15, 29, 3),
(34, 15, 30, 2),
(35, 15, 34, 1),
(36, 16, 14, 1),
(37, 16, 20, 2),
(38, 16, 26, 2),
(39, 16, 29, 3),
(40, 16, 32, 2),
(41, 16, 34, 1),
(42, 17, 18, 1),
(43, 17, 23, 3),
(44, 17, 25, 3),
(45, 17, 28, 5),
(46, 17, 30, 3),
(47, 17, 34, 1);

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
(10, 'Ninatex', 'Chino', 'materiales de baja calidad y de menor precio'),
(11, 'Rex', 'Peruano', 'material de buena calidad y mayor precio'),
(12, 'Elva', 'Peruano y Chino', 'materiales de diferente calidade y diferentes precios');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `salida_materia_prima`
--

INSERT INTO `salida_materia_prima` (`smp_codigo`, `smp_fecha_salida`, `ped_codigo`) VALUES
(2, '2015-11-4', 2),
(3, '2015-11-4', 2),
(4, '2015-11-4', 3);

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
(1, 'Vladimir ', 'Copa Barreto', 4577889, 'Av. Petrolera Km 7', 'admin', 'admin', 'Administrador'),
(2, 'Abran', 'Torrico Moya', 4577654, 'C/ Lanza #234', 'jhotito', 'jhoto34', 'Encargado de Produccion');

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
