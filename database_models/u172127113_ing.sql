
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 07-06-2014 a las 03:33:48
-- Versión del servidor: 5.1.69
-- Versión de PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `u172127113_ing`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`u172127113_dante`@`localhost` PROCEDURE `Sample`()
SELECT * FROM usuarios$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores`
--

CREATE TABLE IF NOT EXISTS `autores` (
  `idAutor` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(64) DEFAULT NULL,
  `DNI` int(11) NOT NULL,
  PRIMARY KEY (`idAutor`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `autores`
--

INSERT INTO `autores` (`idAutor`, `nombre`, `DNI`) VALUES
(1, 'Pablo Carrera', 31222313),
(3, 'Juan Carlos Gomez ', 2221158),
(4, 'Dario Gelabert', 12314441),
(5, 'Carlos Perez', 12234),
(6, 'Marcelo Toledo', 225895),
(7, 'Marcelo Alvear Gomez', 13414122),
(8, 'Alberto Gomez', 291331);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE IF NOT EXISTS `compras` (
  `idCompra` int(11) NOT NULL AUTO_INCREMENT,
  `precio` decimal(4,2) NOT NULL,
  `fecha` datetime NOT NULL,
  `envio` varchar(64) NOT NULL,
  `estado` varchar(32) NOT NULL,
  PRIMARY KEY (`idCompra`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras_has_libros`
--

CREATE TABLE IF NOT EXISTS `compras_has_libros` (
  `Compras_idCompra` int(11) NOT NULL,
  `Libros_ISBN` int(11) NOT NULL,
  PRIMARY KEY (`Compras_idCompra`,`Libros_ISBN`),
  KEY `fk_Compras_has_Libros_Libros1_idx` (`Libros_ISBN`),
  KEY `fk_Compras_has_Libros_Compras1_idx` (`Compras_idCompra`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion`
--

CREATE TABLE IF NOT EXISTS `direccion` (
  `idDireccion` int(11) NOT NULL,
  `calle` varchar(64) DEFAULT NULL,
  `localidad` varchar(64) DEFAULT NULL,
  `numero` int(10) unsigned DEFAULT NULL,
  `provincia` varchar(45) DEFAULT NULL,
  `departamento` tinyint(1) DEFAULT NULL,
  `numDpto` varchar(8) DEFAULT NULL,
  `Usuarios_DNI` int(10) unsigned NOT NULL,
  `Usuarios_username` varchar(50) NOT NULL,
  PRIMARY KEY (`idDireccion`),
  KEY `fk_Direcciones_Usuarios1_idx` (`Usuarios_DNI`,`Usuarios_username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editoriales`
--

CREATE TABLE IF NOT EXISTS `editoriales` (
  `idEditorial` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idEditorial`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `editoriales`
--

INSERT INTO `editoriales` (`idEditorial`, `nombre`) VALUES
(1, 'Palacio'),
(3, 'anda');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiquetas`
--

CREATE TABLE IF NOT EXISTS `etiquetas` (
  `idEtiqueta` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(15) NOT NULL,
  PRIMARY KEY (`idEtiqueta`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `etiquetas`
--

INSERT INTO `etiquetas` (`idEtiqueta`, `nombre`) VALUES
(3, 'Postres'),
(2, 'Manzana'),
(4, 'Comidas picante'),
(5, 'Aperitivos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiquetas_has_libros`
--

CREATE TABLE IF NOT EXISTS `etiquetas_has_libros` (
  `Etiquetas_idEtiquetas` varchar(16) NOT NULL,
  `Libros_ISBN` int(11) NOT NULL,
  PRIMARY KEY (`Etiquetas_idEtiquetas`,`Libros_ISBN`),
  KEY `fk_Etiquetas_has_Libros_Libros1_idx` (`Libros_ISBN`),
  KEY `fk_Etiquetas_has_Libros_Etiquetas1_idx` (`Etiquetas_idEtiquetas`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE IF NOT EXISTS `libros` (
  `ISBN` int(11) NOT NULL,
  `titulo` varchar(128) NOT NULL,
  `paginas` int(11) DEFAULT NULL,
  `precio` decimal(4,2) DEFAULT NULL,
  `idioma` varchar(45) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`ISBN`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros_has_autores`
--

CREATE TABLE IF NOT EXISTS `libros_has_autores` (
  `Libros_ISBN` int(11) NOT NULL,
  `Autores_idAutor` int(11) NOT NULL,
  PRIMARY KEY (`Libros_ISBN`,`Autores_idAutor`),
  KEY `fk_Libros_has_Autores_Autores1_idx` (`Autores_idAutor`),
  KEY `fk_Libros_has_Autores_Libros1_idx` (`Libros_ISBN`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros_has_editoriales`
--

CREATE TABLE IF NOT EXISTS `libros_has_editoriales` (
  `Libros_ISBN` int(11) NOT NULL,
  `Editoriales_idEditorial` int(11) NOT NULL,
  PRIMARY KEY (`Libros_ISBN`,`Editoriales_idEditorial`),
  KEY `fk_Libros_has_Editoriales_Editoriales1_idx` (`Editoriales_idEditorial`),
  KEY `fk_Libros_has_Editoriales_Libros1_idx` (`Libros_ISBN`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjetascredito`
--

CREATE TABLE IF NOT EXISTS `tarjetascredito` (
  `numero` int(11) NOT NULL,
  `titular` varchar(45) DEFAULT NULL,
  `Compras_idCompra` int(11) NOT NULL,
  PRIMARY KEY (`numero`),
  KEY `fk_TarjetasCredito_Compras1_idx` (`Compras_idCompra`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `DNI` int(10) unsigned NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL,
  `tel_fijo` int(11) DEFAULT NULL,
  `tel_cel` int(11) DEFAULT NULL,
  `genero` varchar(1) DEFAULT NULL,
  `fecha_nac` datetime DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  PRIMARY KEY (`DNI`,`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`DNI`, `username`, `password`, `tel_fijo`, `tel_cel`, `genero`, `fecha_nac`, `email`, `isAdmin`) VALUES
(38201222, 'admin', 'admin', 4902222, 4241414, 'M', '2014-06-18 00:00:00', 'admin@admin.com', 1),
(32313222, 'usuario', 'usuario', 4902222, 4241444, 'F', '2014-06-01 00:00:00', 'usuario@usuario.com.ar', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_has_compras`
--

CREATE TABLE IF NOT EXISTS `usuarios_has_compras` (
  `Usuarios_DNI` int(10) unsigned NOT NULL,
  `Usuarios_username` varchar(50) NOT NULL,
  `Compras_idCompra` int(11) NOT NULL,
  PRIMARY KEY (`Usuarios_DNI`,`Usuarios_username`,`Compras_idCompra`),
  KEY `fk_Usuarios_has_Compras_Compras1_idx` (`Compras_idCompra`),
  KEY `fk_Usuarios_has_Compras_Usuarios1_idx` (`Usuarios_DNI`,`Usuarios_username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
