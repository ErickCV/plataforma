-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 14, 2020 at 10:45 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `encuestas`
--

-- --------------------------------------------------------

--
-- Table structure for table `encuesta`
--

DROP TABLE IF EXISTS `encuesta`;
CREATE TABLE IF NOT EXISTS `encuesta` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Titulo` char(150) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Descripcion` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Estatus` tinyint(1) NOT NULL,
  `IdUsuario` bigint(20) NOT NULL,
  `IdTipoEncuesta` bigint(20) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `IdUsuario` (`IdUsuario`),
  KEY `IdTipoEncuesta` (`IdTipoEncuesta`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Dumping data for table `encuesta`
--

INSERT INTO `encuesta` (`Id`, `Titulo`, `Descripcion`, `Estatus`, `IdUsuario`, `IdTipoEncuesta`) VALUES
(2, 'Escuesta del dia2', 'eeeeooo', 2, 2, 1),
(11, 'Economia global', 'dinero del mundo', 1, 1, 2),
(12, 'covid-19', 'virus chino', 2, 1, 1),
(13, 'clases virtuales', 'sin descripcion wow :D', 2, 1, 2),
(14, 'titirititiritiri', 'ta da', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pregunta`
--

DROP TABLE IF EXISTS `pregunta`;
CREATE TABLE IF NOT EXISTS `pregunta` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Pregunta` char(150) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Obligatoria` tinyint(1) NOT NULL,
  `IdEncuesta` bigint(20) NOT NULL,
  `IdTipoPregunta` bigint(20) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `IdEncuesta` (`IdEncuesta`),
  KEY `IdTipoPregunta` (`IdTipoPregunta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `respuesta`
--

DROP TABLE IF EXISTS `respuesta`;
CREATE TABLE IF NOT EXISTS `respuesta` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Respuesta` char(150) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `IdPregunta` bigint(20) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `IdPregunta` (`IdPregunta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tipoencuesta`
--

DROP TABLE IF EXISTS `tipoencuesta`;
CREATE TABLE IF NOT EXISTS `tipoencuesta` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Tipo` char(10) COLLATE utf8mb4_spanish2_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Dumping data for table `tipoencuesta`
--

INSERT INTO `tipoencuesta` (`Id`, `Tipo`) VALUES
(1, 'Abierta'),
(2, 'Cerrada'),
(3, 'MedioAbier'),
(4, 'MedioCerra');

-- --------------------------------------------------------

--
-- Table structure for table `tipopregunta`
--

DROP TABLE IF EXISTS `tipopregunta`;
CREATE TABLE IF NOT EXISTS `tipopregunta` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Tipo` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Nombre` char(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Apellidos` char(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Email` char(80) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Password` char(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `FechaUltAcceso` date NOT NULL,
  `Foto` char(5) COLLATE utf8mb4_spanish2_ci NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`Id`, `Nombre`, `Apellidos`, `Email`, `Password`, `FechaUltAcceso`, `Foto`) VALUES
(1, 'Maria', 'Lopez', 'maria@encuestas.com', '*8061C323A725701555411A7E18421F077A840CD7', '2020-10-27', 'png'),
(2, 'Yareli', 'Martinez', 'yarelim@gmail.com', '*F324AFAA5BF7B47A3F38B88AE468419C9CEE61CB', '2020-11-03', ''),
(3, 'Aranza', 'Lopez', 'aranzaL@gmail.com', '*F360D900BBF8D20E5B6C2543C3C6056192813390', '2020-11-02', ''),
(4, 'Juanito', 'Chiquito', 'juanititito@encuestas.com', '*C220E22E545D0688C253934C00400B29D0334AA2', '0000-00-00', ''),
(5, 'juanito2', 'aeiou', 'juanito2@encuestas.com', '*DD39A3CE3BAC1010AB3D0A7EC997E0EC77C3FD64', '0000-00-00', ''),
(6, 'yo', 'mero', '16030835@itcelaya.edu.mx', '*14CE4F27C1758B9E4674A1F203D3C1007BCF8D59', '0000-00-00', ''),
(7, 'usuario', 'aa', 'email@.com', '0', '2020-12-07', '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `encuesta`
--
ALTER TABLE `encuesta`
  ADD CONSTRAINT `esde` FOREIGN KEY (`IdTipoEncuesta`) REFERENCES `tipoencuesta` (`Id`),
  ADD CONSTRAINT `genera` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pregunta`
--
ALTER TABLE `pregunta`
  ADD CONSTRAINT `contiene` FOREIGN KEY (`IdEncuesta`) REFERENCES `encuesta` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `esdetipo` FOREIGN KEY (`IdTipoPregunta`) REFERENCES `tipopregunta` (`Id`);

--
-- Constraints for table `respuesta`
--
ALTER TABLE `respuesta`
  ADD CONSTRAINT `correspondea` FOREIGN KEY (`IdPregunta`) REFERENCES `pregunta` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
