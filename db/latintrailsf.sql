/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : latintrailsf

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-07-03 23:00:02
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for archivo
-- ----------------------------
DROP TABLE IF EXISTS `archivo`;
CREATE TABLE `archivo` (
  `id_archivo` int(11) NOT NULL AUTO_INCREMENT,
  `id_paquete_tur` int(11) DEFAULT NULL,
  `archivo` varchar(255) DEFAULT NULL,
  `path` text,
  PRIMARY KEY (`id_archivo`),
  KEY `fk_paquete_turistico_con_archivos` (`id_paquete_tur`),
  CONSTRAINT `fk_paquete_turistico_con_archivos` FOREIGN KEY (`id_paquete_tur`) REFERENCES `paquete_turistico` (`id_paquete_tur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for calendario_itinerario
-- ----------------------------
DROP TABLE IF EXISTS `calendario_itinerario`;
CREATE TABLE `calendario_itinerario` (
  `id_calendario_itinerario` int(11) NOT NULL AUTO_INCREMENT,
  `id_itinerario` int(11) DEFAULT NULL,
  `fecha_incio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_calendario_itinerario`),
  KEY `fk_itinerario_calendario_itinerario` (`id_itinerario`),
  CONSTRAINT `fk_itinerario_calendario_itinerario` FOREIGN KEY (`id_itinerario`) REFERENCES `itinerario` (`id_itinerario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for categoria_itinerario
-- ----------------------------
DROP TABLE IF EXISTS `categoria_itinerario`;
CREATE TABLE `categoria_itinerario` (
  `id_categoria_itinerario` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` text,
  `fecha_fija` tinyint(1) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_categoria_itinerario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for comment_card
-- ----------------------------
DROP TABLE IF EXISTS `comment_card`;
CREATE TABLE `comment_card` (
  `id_comment_card` int(11) NOT NULL AUTO_INCREMENT,
  `id_formulario_comment_card` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_itinerario` int(11) DEFAULT NULL,
  `excelent` tinyint(1) DEFAULT NULL,
  `good` tinyint(1) DEFAULT NULL,
  `average` tinyint(1) DEFAULT NULL,
  `poor` tinyint(1) DEFAULT NULL,
  `commentarios` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_comment_card`),
  KEY `fk_formularios_varios_comment_card` (`id_formulario_comment_card`),
  KEY `fk_itinerario_varios_comment_card` (`id_itinerario`),
  KEY `fk_usuarios_varios_comment_card` (`id_user`),
  CONSTRAINT `fk_formularios_varios_comment_card` FOREIGN KEY (`id_formulario_comment_card`) REFERENCES `formulario_comment_card` (`id_formulario_comment_card`),
  CONSTRAINT `fk_itinerario_varios_comment_card` FOREIGN KEY (`id_itinerario`) REFERENCES `itinerario` (`id_itinerario`),
  CONSTRAINT `fk_usuarios_varios_comment_card` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for dia_itinerario
-- ----------------------------
DROP TABLE IF EXISTS `dia_itinerario`;
CREATE TABLE `dia_itinerario` (
  `id_dia` int(11) NOT NULL AUTO_INCREMENT,
  `id_itinerario` int(11) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `descripcion` text,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_dia`),
  KEY `fk_dia_itinerario` (`id_itinerario`),
  CONSTRAINT `fk_dia_itinerario` FOREIGN KEY (`id_itinerario`) REFERENCES `itinerario` (`id_itinerario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for formulario_comment_card
-- ----------------------------
DROP TABLE IF EXISTS `formulario_comment_card`;
CREATE TABLE `formulario_comment_card` (
  `id_formulario_comment_card` int(11) NOT NULL AUTO_INCREMENT,
  `pregunta` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_formulario_comment_card`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for formulario_contacto
-- ----------------------------
DROP TABLE IF EXISTS `formulario_contacto`;
CREATE TABLE `formulario_contacto` (
  `id_formulario` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `mensaje` text,
  `fecha` datetime DEFAULT NULL,
  `ip` text,
  PRIMARY KEY (`id_formulario`),
  KEY `fk_users_varios_formularios_contacto` (`id_user`),
  CONSTRAINT `fk_users_varios_formularios_contacto` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for guia_itinerario
-- ----------------------------
DROP TABLE IF EXISTS `guia_itinerario`;
CREATE TABLE `guia_itinerario` (
  `id_guia` int(11) NOT NULL AUTO_INCREMENT,
  `id_itinerario` int(11) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `descripcion` text,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_guia`),
  KEY `fk_itinerario_varios_guias` (`id_itinerario`),
  CONSTRAINT `fk_itinerario_varios_guias` FOREIGN KEY (`id_itinerario`) REFERENCES `itinerario` (`id_itinerario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for hoteles
-- ----------------------------
DROP TABLE IF EXISTS `hoteles`;
CREATE TABLE `hoteles` (
  `id_hotel` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `descripcion` text,
  `desayuno` tinyint(1) DEFAULT NULL,
  `almuerzo` tinyint(1) DEFAULT NULL,
  `cena` tinyint(1) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_hotel`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for hoteles_con_itinerarios
-- ----------------------------
DROP TABLE IF EXISTS `hoteles_con_itinerarios`;
CREATE TABLE `hoteles_con_itinerarios` (
  `id_itinerario` int(11) NOT NULL,
  `id_hotel` int(11) NOT NULL,
  PRIMARY KEY (`id_itinerario`,`id_hotel`),
  KEY `fk_hoteles_con_itinerarios2` (`id_hotel`),
  CONSTRAINT `hoteles_con_itinerarios_ibfk_1` FOREIGN KEY (`id_itinerario`) REFERENCES `itinerario` (`id_itinerario`),
  CONSTRAINT `hoteles_con_itinerarios_ibfk_2` FOREIGN KEY (`id_hotel`) REFERENCES `hoteles` (`id_hotel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for imagenes
-- ----------------------------
DROP TABLE IF EXISTS `imagenes`;
CREATE TABLE `imagenes` (
  `id_imagen` int(11) NOT NULL AUTO_INCREMENT,
  `imagen` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_imagen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for itinerario
-- ----------------------------
DROP TABLE IF EXISTS `itinerario`;
CREATE TABLE `itinerario` (
  `id_itinerario` int(11) NOT NULL AUTO_INCREMENT,
  `id_categoria_itinerario` int(11) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `subtitulo` varchar(255) DEFAULT NULL,
  `subtitulo2` varchar(255) DEFAULT NULL,
  `descripcion` text,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_itinerario`),
  KEY `fk_tipo_itinerario_varios_itinerarios` (`id_categoria_itinerario`),
  CONSTRAINT `fk_tipo_itinerario_varios_itinerarios` FOREIGN KEY (`id_categoria_itinerario`) REFERENCES `categoria_itinerario` (`id_categoria_itinerario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for itinerario_con_paquete_turitico
-- ----------------------------
DROP TABLE IF EXISTS `itinerario_con_paquete_turitico`;
CREATE TABLE `itinerario_con_paquete_turitico` (
  `id_itinerario` int(11) NOT NULL,
  `id_paquete_tur` int(11) NOT NULL,
  PRIMARY KEY (`id_itinerario`,`id_paquete_tur`),
  KEY `fk_itinerario_con_paquete_turitico2` (`id_paquete_tur`),
  CONSTRAINT `fk_itinerario_con_paquete_turitico` FOREIGN KEY (`id_itinerario`) REFERENCES `itinerario` (`id_itinerario`),
  CONSTRAINT `fk_itinerario_con_paquete_turitico2` FOREIGN KEY (`id_paquete_tur`) REFERENCES `paquete_turistico` (`id_paquete_tur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for mapas
-- ----------------------------
DROP TABLE IF EXISTS `mapas`;
CREATE TABLE `mapas` (
  `id_mapa` int(11) NOT NULL AUTO_INCREMENT,
  `id_itinerario` int(11) DEFAULT NULL,
  `nombre_mapa` varchar(255) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `path` text,
  `descripcion` text,
  PRIMARY KEY (`id_mapa`),
  KEY `fk_itinerario_varios_mapas` (`id_itinerario`),
  CONSTRAINT `fk_itinerario_varios_mapas` FOREIGN KEY (`id_itinerario`) REFERENCES `itinerario` (`id_itinerario`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for notificaciones
-- ----------------------------
DROP TABLE IF EXISTS `notificaciones`;
CREATE TABLE `notificaciones` (
  `id_notificacion` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `descripcion` text,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_notificacion`),
  KEY `fk_user_varias_notificaciones` (`id_user`),
  CONSTRAINT `fk_user_varias_notificaciones` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for pagina
-- ----------------------------
DROP TABLE IF EXISTS `pagina`;
CREATE TABLE `pagina` (
  `id_pagina` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) DEFAULT NULL,
  `links_interes` text,
  `imagen` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_pagina`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for paquetes_con_imagenes
-- ----------------------------
DROP TABLE IF EXISTS `paquetes_con_imagenes`;
CREATE TABLE `paquetes_con_imagenes` (
  `id_imagen` int(11) NOT NULL,
  `id_paquete_tur` int(11) NOT NULL,
  PRIMARY KEY (`id_imagen`,`id_paquete_tur`),
  KEY `fk_paquetes_con_imagenes2` (`id_paquete_tur`),
  CONSTRAINT `fk_paquetes_con_imagenes` FOREIGN KEY (`id_imagen`) REFERENCES `imagenes` (`id_imagen`),
  CONSTRAINT `fk_paquetes_con_imagenes2` FOREIGN KEY (`id_paquete_tur`) REFERENCES `paquete_turistico` (`id_paquete_tur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for paquete_turistico
-- ----------------------------
DROP TABLE IF EXISTS `paquete_turistico`;
CREATE TABLE `paquete_turistico` (
  `id_paquete_tur` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `subtitulo` varchar(255) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `precio` varchar(9) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_paquete_tur`),
  KEY `fk_user_varios_paquetes_turisticos` (`id_user`),
  CONSTRAINT `fk_user_varios_paquetes_turisticos` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for role_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions` (
  `permission_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `fk_role_has_permissions2` (`role_id`),
  CONSTRAINT `fk_role_has_permissions` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`),
  CONSTRAINT `fk_role_has_permissions2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for scaffoldinterfaces
-- ----------------------------
DROP TABLE IF EXISTS `scaffoldinterfaces`;
CREATE TABLE `scaffoldinterfaces` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `package` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `controller` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `views` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tablename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for user_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `user_has_permissions`;
CREATE TABLE `user_has_permissions` (
  `user_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`permission_id`),
  KEY `fk_user_has_permissions2` (`permission_id`),
  CONSTRAINT `fk_user_has_permissions` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `fk_user_has_permissions2` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for user_has_roles
-- ----------------------------
DROP TABLE IF EXISTS `user_has_roles`;
CREATE TABLE `user_has_roles` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `fk_user_has_roles2` (`role_id`),
  CONSTRAINT `fk_user_has_roles` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `fk_user_has_roles2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
