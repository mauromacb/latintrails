/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : latintrailsf

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-07-02 08:36:52
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
-- Records of archivo
-- ----------------------------

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
-- Records of calendario_itinerario
-- ----------------------------

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
-- Records of categoria_itinerario
-- ----------------------------
INSERT INTO `categoria_itinerario` VALUES ('1', 'Galapagos Sea Star Journey Cruise', '1', '1');
INSERT INTO `categoria_itinerario` VALUES ('2', 'Galapagos Seaman Journey Cruise', '1', '1');

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
-- Records of comment_card
-- ----------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of dia_itinerario
-- ----------------------------
INSERT INTO `dia_itinerario` VALUES ('1', '2', 'DAY 1 – SUNDAY', '<p><img class=\"size-full wp-image-7448 alignleft\" src=\"http://latintrails.com/wp-content/uploads/2016/04/Dragon-hill.jpg\" sizes=\"(max-width: 320px) 100vw, 320px\" srcset=\"http://latintrails.com/wp-content/uploads/2016/04/Dragon-hill.jpg 320w, http://latintrails.com/wp-content/uploads/2016/04/Dragon-hill-300x141.jpg 300w\" alt=\"Sea Star journey b itinerary -galapagos islands cruises ecuador\" width=\"320\" height=\"150\" />Sea Star journey &ldquo;B&rdquo; itinerary: Upon arrival at Baltra Airport, travelers pass through an airport inspection point to insure that no foreign plants or animals are introduced to the islands, as well as to pay the park entrance fee of $100 (unless it has been prepaid). A guide will meet you, help you collect your luggage, and escort you on a short&nbsp;bus ride to the harbor and then on board M/Y&nbsp;<a href=\"http://latintrails.com/galapagos-sea-star-journey/\">Galapagos Sea Star Journey</a></p>\r\n<h2><strong>PM: DRAGON HILL, SANTA CRUZ ISLAND</strong></h2>\r\n<p>The visitor site at Dragon Hill has been open for visits on 1993. This site is located in northwestern Santa Cruz Island and consists of a trail that lead to a hyper-saline lagoon behind the beach, frequented by flamingos, pintail ducks and other species of birds. This site has been re populated with land iguanas from Seymour, Isabela and Santa Cruz islands. There is a short walk to the Hill, which offers a beautiful view of the bay.</p>', null);
INSERT INTO `dia_itinerario` VALUES ('2', '1', 'dia 1', '<p>dsadsa</p>', null);
INSERT INTO `dia_itinerario` VALUES ('3', '3', 'Day by day Itinerary Map DAY 1: FRIDAY LAND – GALAPAGOS – SANTA CRUZUZ', '<p>dsadsada</p>', null);

-- ----------------------------
-- Table structure for formulario_comment_card
-- ----------------------------
DROP TABLE IF EXISTS `formulario_comment_card`;
CREATE TABLE `formulario_comment_card` (
  `id_formulario_comment_card` int(11) NOT NULL AUTO_INCREMENT,
  `pergunta` varchar(255) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `pie` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_formulario_comment_card`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of formulario_comment_card
-- ----------------------------

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
-- Records of formulario_contacto
-- ----------------------------

-- ----------------------------
-- Table structure for guia_itinerario
-- ----------------------------
DROP TABLE IF EXISTS `guia_itinerario`;
CREATE TABLE `guia_itinerario` (
  `id_cat_itinerario3` int(11) NOT NULL AUTO_INCREMENT,
  `id_itinerario` int(11) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `descripcion` text,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_cat_itinerario3`),
  KEY `fk_itinerario_varios_guias` (`id_itinerario`),
  CONSTRAINT `fk_itinerario_varios_guias` FOREIGN KEY (`id_itinerario`) REFERENCES `itinerario` (`id_itinerario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of guia_itinerario
-- ----------------------------

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
-- Records of hoteles
-- ----------------------------
INSERT INTO `hoteles` VALUES ('1', 'Casa Opuntia Galapagos Hotel - 3 estrellas', '<p>dsadsa</p>\r\n<p>dsa</p>\r\n<p>d</p>\r\n<p>sa</p>\r\n<p>dsa</p>', null, null, null, '1');

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
-- Records of imagenes
-- ----------------------------

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
-- Records of itinerario
-- ----------------------------
INSERT INTO `itinerario` VALUES ('1', '1', 'Itinerary A', 'Sea Star Journey “A” itinerary', 'Itinerary A: 6d-5n Tuesday to Sunday', '<div class=\"vc_row wpb_row vc_inner vc_row-fluid mkdf-section mkdf-content-aligment-left\" data-mkdf-parallax-speed=\"1\">\r\n<div class=\"mkdf-full-section-inner\">\r\n<div class=\"wpb_column vc_column_container vc_col-sm-12\">\r\n<div class=\"vc_column-inner \">\r\n<div class=\"wpb_wrapper\">\r\n<div class=\"mkdf-tabs mkdf-horizontal mkdf-tab-text clearfix ui-tabs ui-widget ui-widget-content ui-corner-all\">\r\n<div id=\"tab-itinerary-557\" class=\"mkdf-tab-container ui-tabs-panel ui-widget-content ui-corner-bottom\" style=\"background: 0px 0px; border-width: 1px 0px 0px; border-image: initial; margin: 0px; padding: 28px 32px 8px 0px; vertical-align: baseline; outline: 0px; top: -1px; position: relative; z-index: 10; display: block; border-color: #ebebeb initial initial initial; border-style: solid initial initial initial;\" role=\"tabpanel\" data-icon-pack=\"font_awesome\" data-icon-html=\"&lt;i class=\">\r\n<div class=\"wpb_text_column wpb_content_element \">\r\n<div class=\"wpb_wrapper\">\r\n<p><strong>Itinerary</strong></p>\r\n<table cellspacing=\"15\">\r\n<tbody>\r\n<tr>\r\n<td><img class=\"alignnone wp-image-4263\" src=\"http://latintrails.com/wp-content/uploads/2016/04/numero-1-latintrails.jpg\" alt=\"numero-1-latintrails\" width=\"75\" height=\"76\" /></td>\r\n<td>TUESDAY</td>\r\n<td>AM: Flight to Galapagos.\r\n<p>&nbsp;</p>\r\n<p>PM: San Cristobal Island, Cerro colorado</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td><img class=\"alignnone wp-image-4264\" src=\"http://latintrails.com/wp-content/uploads/2016/04/numero-2-latintrails.jpg\" alt=\"numero-2-latintrails\" width=\"75\" height=\"76\" /></td>\r\n<td>WEDNESDAY</td>\r\n<td>AM: Espa&ntilde;ola Island, Gardner Bay\r\n<p>&nbsp;</p>\r\n<p>PM:&nbsp;Espa&ntilde;ola Island, Punta Suarez</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td><img class=\"alignnone wp-image-4265\" src=\"http://latintrails.com/wp-content/uploads/2016/04/numero-3-latintrails.jpg\" alt=\"numero-3-latintrails\" width=\"75\" height=\"76\" /></td>\r\n<td>THURSDAY</td>\r\n<td>AM:&nbsp;Floreana Island, Punta Cormorant\r\n<p>&nbsp;</p>\r\n<p>PM:&nbsp;Floreana Island, Post Office Bay</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td><img class=\"alignnone wp-image-4266\" src=\"http://latintrails.com/wp-content/uploads/2016/04/numero-4-latintrails.jpg\" alt=\"numero-4-latintrails\" width=\"74\" height=\"74\" /></td>\r\n<td>FRIDAY</td>\r\n<td>AM:&nbsp;Santa fe Island<br />PM: Plazas Island</td>\r\n</tr>\r\n<tr>\r\n<td><img class=\"aligncenter wp-image-4267\" src=\"http://latintrails.com/wp-content/uploads/2016/04/numero-5-latintrails.jpg\" alt=\"\" width=\"75\" height=\"76\" /></td>\r\n<td>SATURDAY</td>\r\n<td>AM: &nbsp;North Seymour Island<br />PM:&nbsp;Santa Cruz Island, Bachas beach</td>\r\n</tr>\r\n<tr>\r\n<td><img class=\"aligncenter wp-image-4268\" src=\"http://latintrails.com/wp-content/uploads/2016/04/numero-6-latintrails.jpg\" alt=\"\" width=\"75\" height=\"76\" /></td>\r\n<td>SUNDAY</td>\r\n<td>AM: &nbsp;Mosquera Islet<br />Transfer to the airport</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', null);
INSERT INTO `itinerario` VALUES ('2', '1', 'Itinerary B', 'Sea Star Journey “B” itinerary', '5d-4n Sunday to Thursday', '<h3><strong>ITINERARY</strong></h3>\r\n<table cellspacing=\"15\">\r\n<tbody>\r\n<tr>\r\n<td><img class=\"alignnone wp-image-4263\" src=\"http://latintrails.com/wp-content/uploads/2016/04/numero-1-latintrails.jpg\" alt=\"numero-1-latintrails\" width=\"75\" height=\"76\" /></td>\r\n<td>SUNDAY</td>\r\n<td>AM &ndash; Flight to&nbsp;Galapagos<br />PM &ndash; Santa Cruz Island, Dragon Hill&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td><img class=\"alignnone wp-image-4264\" src=\"http://latintrails.com/wp-content/uploads/2016/04/numero-2-latintrails.jpg\" alt=\"numero-2-latintrails\" width=\"75\" height=\"76\" /></td>\r\n<td>MONDAY</td>\r\n<td>AM &ndash; Santa Cruz Island, Black Turtle Cove&nbsp;<br />PM &ndash; Chinese Hat&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td><img class=\"alignnone wp-image-4265\" src=\"http://latintrails.com/wp-content/uploads/2016/04/numero-3-latintrails.jpg\" alt=\"numero-3-latintrails\" width=\"75\" height=\"76\" /></td>\r\n<td>TUESDAY</td>\r\n<td>AM &ndash; Genovesa Island, Price Phillip&rsquo;s Steps<br />PM &ndash; Genovesa Island, Darwin Bay&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td><img class=\"alignnone wp-image-4266\" src=\"http://latintrails.com/wp-content/uploads/2016/04/numero-4-latintrails.jpg\" alt=\"numero-4-latintrails\" width=\"75\" height=\"75\" /></td>\r\n<td>WEDMESDAY</td>\r\n<td>AM- Bartolome Island<br />PM &ndash; Santiago,&nbsp;Sullivan Bay</td>\r\n</tr>\r\n<tr>\r\n<td><img class=\"alignnone wp-image-4267\" src=\"http://latintrails.com/wp-content/uploads/2016/04/numero-5-latintrails.jpg\" alt=\"numero-5-latintrails\" width=\"76\" height=\"77\" /></td>\r\n<td>THURSDAY</td>\r\n<td>AM &ndash; Santa Cruz Island, Highlands&nbsp;<br />Transfer to the Airport</td>\r\n</tr>\r\n</tbody>\r\n</table>', null);
INSERT INTO `itinerario` VALUES ('3', '2', 'Itinerary A', 'Seaman Journey A itinerary', 'Itinerary A: 4d-3n Friday to Monday', '<p>Itinerary</p>\r\n<table cellspacing=\"15\">\r\n<tbody>\r\n<tr>\r\n<td><img class=\"alignnone wp-image-4263\" src=\"http://latintrails.com/wp-content/uploads/2016/04/numero-1-latintrails.jpg\" alt=\"numero-1-latintrails\" width=\"75\" height=\"76\" /></td>\r\n<td>FRIDAY</td>\r\n<td>AM: Arrival at Baltra airport. Transfer to the yacht.\r\n<p>&nbsp;</p>\r\n<p>PM: Visit the Island of Seymour</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td><img class=\"alignnone wp-image-4264\" src=\"http://latintrails.com/wp-content/uploads/2016/04/numero-2-latintrails.jpg\" alt=\"numero-2-latintrails\" width=\"75\" height=\"76\" /></td>\r\n<td>SATURDAY</td>\r\n<td>AM: Genovesa El Barranco\r\n<p>&nbsp;</p>\r\n<p>PM: Genovesa B. Darwin</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td><img class=\"alignnone wp-image-4265\" src=\"http://latintrails.com/wp-content/uploads/2016/04/numero-3-latintrails.jpg\" alt=\"numero-3-latintrails\" width=\"75\" height=\"76\" /></td>\r\n<td>SUNDAY</td>\r\n<td>AM: Plazas Sur\r\n<p>&nbsp;</p>\r\n<p>PM: Santa Fe Island</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td><img class=\"alignnone wp-image-4266\" src=\"http://latintrails.com/wp-content/uploads/2016/04/numero-4-latintrails.jpg\" alt=\"numero-4-latintrails\" width=\"75\" height=\"75\" /></td>\r\n<td>MONDAY</td>\r\n<td>AM: San Cristobal &ndash;&nbsp;Jacinto Gordillo Breeding Center<br />Transfer to the airport</td>\r\n</tr>\r\n</tbody>\r\n</table>', null);

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
-- Records of itinerario_con_paquete_turitico
-- ----------------------------

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
  PRIMARY KEY (`id_mapa`),
  KEY `fk_itinerario_varios_mapas` (`id_itinerario`),
  CONSTRAINT `fk_itinerario_varios_mapas` FOREIGN KEY (`id_itinerario`) REFERENCES `itinerario` (`id_itinerario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mapas
-- ----------------------------

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
-- Records of notificaciones
-- ----------------------------

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
-- Records of pagina
-- ----------------------------

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
-- Records of paquetes_con_imagenes
-- ----------------------------

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
-- Records of paquete_turistico
-- ----------------------------

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
-- Records of password_resets
-- ----------------------------

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
-- Records of permissions
-- ----------------------------

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of roles
-- ----------------------------

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
-- Records of role_has_permissions
-- ----------------------------

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
-- Records of scaffoldinterfaces
-- ----------------------------

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
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Mauricio Cóndor', 'mauricio.macb@hotmail.com', '2017-07-01 22:23:38', '$2y$10$TEaMe83w.VNRI7VF1gNrte8ZANWyGyShrgZZmHqs2G/CiiDxeeGR6', null, '2017-07-01 22:23:38', null, null);

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
-- Records of user_has_permissions
-- ----------------------------

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

-- ----------------------------
-- Records of user_has_roles
-- ----------------------------
