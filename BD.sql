/*
SQLyog Ultimate v9.63 
MySQL - 5.5.32 : Database - feria
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`feria` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */;

USE `feria`;

/*Table structure for table `estudiantes` */

DROP TABLE IF EXISTS `estudiantes`;

CREATE TABLE `estudiantes` (
  `consecutivo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(240) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellido` varchar(240) COLLATE utf8_spanish_ci DEFAULT NULL,
  `documento` varchar(240) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipodoc` varchar(240) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` varchar(241) COLLATE utf8_spanish_ci DEFAULT NULL,
  `celular` varchar(241) COLLATE utf8_spanish_ci DEFAULT NULL,
  `correo` varchar(241) COLLATE utf8_spanish_ci DEFAULT NULL,
  `otrocorreo` varchar(241) COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion` varchar(241) COLLATE utf8_spanish_ci DEFAULT NULL,
  `barrio` varchar(241) COLLATE utf8_spanish_ci DEFAULT NULL,
  `grado` varchar(241) COLLATE utf8_spanish_ci DEFAULT NULL,
  `colegio` varchar(241) COLLATE utf8_spanish_ci DEFAULT NULL,
  `recursos` varchar(241) COLLATE utf8_spanish_ci DEFAULT NULL,
  `medio` varchar(241) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apoyo` varchar(241) COLLATE utf8_spanish_ci DEFAULT NULL,
  `napoyo` varchar(241) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telapoyo` varchar(241) COLLATE utf8_spanish_ci DEFAULT NULL,
  `correoapoyo` varchar(241) COLLATE utf8_spanish_ci DEFAULT NULL,
  `programa1` varchar(241) COLLATE utf8_spanish_ci DEFAULT NULL,
  `programa2` varchar(241) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fortaleza1` varchar(241) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fortaleza2` varchar(241) COLLATE utf8_spanish_ci DEFAULT NULL,
  `icfes` varchar(241) COLLATE utf8_spanish_ci DEFAULT NULL,
  `puesto` varchar(241) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`consecutivo`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
