/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : proyectolatintrails

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-06-26 21:51:19
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for actividades
-- ----------------------------
DROP TABLE IF EXISTS `actividades`;
CREATE TABLE `actividades` (
  `id_actividades` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) DEFAULT NULL,
  `descripcion` text,
  PRIMARY KEY (`id_actividades`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of actividades
-- ----------------------------

-- ----------------------------
-- Table structure for actividades_con_reservaciones
-- ----------------------------
DROP TABLE IF EXISTS `actividades_con_reservaciones`;
CREATE TABLE `actividades_con_reservaciones` (
  `id_reservaciones` int(11) NOT NULL,
  `id_actividades` int(11) NOT NULL,
  PRIMARY KEY (`id_reservaciones`,`id_actividades`),
  KEY `fk_actividades_con_reservaciones2` (`id_actividades`),
  CONSTRAINT `fk_actividades_con_reservaciones` FOREIGN KEY (`id_reservaciones`) REFERENCES `reservaciones` (`id_reservaciones`),
  CONSTRAINT `fk_actividades_con_reservaciones2` FOREIGN KEY (`id_actividades`) REFERENCES `actividades` (`id_actividades`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of actividades_con_reservaciones
-- ----------------------------

-- ----------------------------
-- Table structure for archivo
-- ----------------------------
DROP TABLE IF EXISTS `archivo`;
CREATE TABLE `archivo` (
  `id_archivo` int(11) NOT NULL AUTO_INCREMENT,
  `id_paquete_tur` int(11) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `descripcion` text,
  `archivo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_archivo`),
  KEY `fk_paquete_turistico_con_archivos` (`id_paquete_tur`),
  CONSTRAINT `fk_paquete_turistico_con_archivos` FOREIGN KEY (`id_paquete_tur`) REFERENCES `paquete_turistico` (`id_paquete_tur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of archivo
-- ----------------------------

-- ----------------------------
-- Table structure for categorias
-- ----------------------------
DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_categoria` varchar(255) DEFAULT NULL,
  `estado` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of categorias
-- ----------------------------
INSERT INTO `categorias` VALUES ('1', 'Categoria 2', '2');
INSERT INTO `categorias` VALUES ('2', 'Categoria 2', '2');
INSERT INTO `categorias` VALUES ('3', 'Amazon Region', '1');
INSERT INTO `categorias` VALUES ('5', 'dsa', '2');
INSERT INTO `categorias` VALUES ('6', 'The Andes', '2');
INSERT INTO `categorias` VALUES ('7', 'Galapagos', '1');
INSERT INTO `categorias` VALUES ('8', 'City Tour', '1');
INSERT INTO `categorias` VALUES ('9', 'Barco 1', '1');
INSERT INTO `categorias` VALUES ('10', '1 Galapagos Sea Star Journey - fechas fijas', '1');
INSERT INTO `categorias` VALUES ('11', '2 Galapagos Seaman Journey - fechas fijas', '1');
INSERT INTO `categorias` VALUES ('12', '3 Land tours', '1');
INSERT INTO `categorias` VALUES ('13', '4 Island Hopping', '1');

-- ----------------------------
-- Table structure for categoria_itinerarios
-- ----------------------------
DROP TABLE IF EXISTS `categoria_itinerarios`;
CREATE TABLE `categoria_itinerarios` (
  `id_categoria_itinerario` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_categoria_itinerario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of categoria_itinerarios
-- ----------------------------

-- ----------------------------
-- Table structure for commentcard
-- ----------------------------
DROP TABLE IF EXISTS `commentcard`;
CREATE TABLE `commentcard` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pregunta` varchar(255) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `indice_comment_card` (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of commentcard
-- ----------------------------
INSERT INTO `commentcard` VALUES ('1', 'Pregunta 1 ?', '1');
INSERT INTO `commentcard` VALUES ('2', 'Pregunta 2', '1');
INSERT INTO `commentcard` VALUES ('3', 'Pregunta 3 ?', '1');

-- ----------------------------
-- Table structure for como_nos_encontro
-- ----------------------------
DROP TABLE IF EXISTS `como_nos_encontro`;
CREATE TABLE `como_nos_encontro` (
  `id_como_nos_encontro` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_como_nos_encontro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of como_nos_encontro
-- ----------------------------

-- ----------------------------
-- Table structure for destino_interes
-- ----------------------------
DROP TABLE IF EXISTS `destino_interes`;
CREATE TABLE `destino_interes` (
  `id_destino_interes` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` text,
  PRIMARY KEY (`id_destino_interes`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of destino_interes
-- ----------------------------

-- ----------------------------
-- Table structure for destino_interes_conreservaciones
-- ----------------------------
DROP TABLE IF EXISTS `destino_interes_conreservaciones`;
CREATE TABLE `destino_interes_conreservaciones` (
  `id_reservaciones` int(11) NOT NULL,
  `id_destino_interes` int(11) NOT NULL,
  PRIMARY KEY (`id_reservaciones`,`id_destino_interes`),
  KEY `fk_destino_interes_conreservaciones2` (`id_destino_interes`),
  CONSTRAINT `fk_destino_interes_conreservaciones` FOREIGN KEY (`id_reservaciones`) REFERENCES `reservaciones` (`id_reservaciones`),
  CONSTRAINT `fk_destino_interes_conreservaciones2` FOREIGN KEY (`id_destino_interes`) REFERENCES `destino_interes` (`id_destino_interes`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of destino_interes_conreservaciones
-- ----------------------------

-- ----------------------------
-- Table structure for formulario
-- ----------------------------
DROP TABLE IF EXISTS `formulario`;
CREATE TABLE `formulario` (
  `id_formulario` int(11) NOT NULL AUTO_INCREMENT,
  `asunto` varchar(255) DEFAULT NULL,
  `mensaje` text,
  `fecha` datetime DEFAULT NULL,
  `ip` text,
  PRIMARY KEY (`id_formulario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of formulario
-- ----------------------------

-- ----------------------------
-- Table structure for hoteles
-- ----------------------------
DROP TABLE IF EXISTS `hoteles`;
CREATE TABLE `hoteles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `descripcion` text,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `indice_hoteles` (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of hoteles
-- ----------------------------
INSERT INTO `hoteles` VALUES ('1', 'Nombre del hotel', '<p>Descripci&oacute;n del hotel............</p>', '1');

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
  `id_paquete_tur` int(11) DEFAULT NULL,
  `dia` varchar(255) DEFAULT NULL,
  `descripcion` text,
  `id_categoria_itinerario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_itinerario`),
  KEY `fk_usuario_con_paquete_turitico` (`id_paquete_tur`),
  CONSTRAINT `fk_usuario_con_paquete_turitico` FOREIGN KEY (`id_paquete_tur`) REFERENCES `paquete_turistico` (`id_paquete_tur`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of itinerario
-- ----------------------------
INSERT INTO `itinerario` VALUES ('31', '1', 'día uno', 'Descripción día uno', '1');
INSERT INTO `itinerario` VALUES ('32', '1', 'día dos', 'Descripción día dos', '1');
INSERT INTO `itinerario` VALUES ('33', '1', 'dia', 'dsada', '1');
INSERT INTO `itinerario` VALUES ('49', '28', 'Day1: Arrival to Quito', '<p><img src=\"http://latintrails.com/wp-content/uploads/2017/03/mariscal-sucre-quito-airport.jpg\" /></p>\r\n<div class=\"mkdf-accordion-holder clearfix mkdf-toggle mkdf-boxed  accordion ui-accordion ui-accordion-icons ui-widget ui-helper-reset\">\r\n<div class=\"mkdf-accordion-content ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom ui-accordion-content-active\">\r\n<div class=\"mkdf-accordion-content-inner\">\r\n<div class=\"wpb_text_column wpb_content_element \">\r\n<div class=\"wpb_wrapper\">\r\n<p>After the arriving at the airport, our helpful guide will meet you, plus he will serve as a translator, and assist with the private transfer to your hotel.</p>\r\n<p>Overnight: Quito</p>\r\n<p>Meals: -/-/-</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div class=\"mkdf-accordion-holder clearfix mkdf-toggle mkdf-boxed  accordion ui-accordion ui-accordion-icons ui-widget ui-helper-reset\">&nbsp;</div>', '1');
INSERT INTO `itinerario` VALUES ('50', '29', 'Day One The middle of the world, latitud 0\'0\'0', '<p><img class=\"aligncenter wp-image-9022\" style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://latintrails.com/wp-content/uploads/2017/03/teleferico-quito.jpg\" sizes=\"(max-width: 501px) 100vw, 501px\" srcset=\"http://latintrails.com/wp-content/uploads/2017/03/teleferico-quito.jpg 485w, http://latintrails.com/wp-content/uploads/2017/03/teleferico-quito-300x203.jpg 300w\" alt=\"\" width=\"501\" height=\"339\" /></p>\r\n<p>Early in the morning, the tour will depart by car towards the &ldquo;Teleferico&rdquo; which is the highest viewpoint in the city. Y</p>\r\n<p>Around midday, you will go to the &ldquo;Mitad del Mundo&rdquo;, a monument to remember the equator line that passes through our country.</p>\r\n<p><img class=\"aligncenter wp-image-3755\" style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://latintrails.com/wp-content/uploads/2016/04/quito-middle-of-the-world-latintrails.jpg\" sizes=\"(max-width: 503px) 100vw, 503px\" srcset=\"http://latintrails.com/wp-content/uploads/2016/04/quito-middle-of-the-world-latintrails.jpg 500w, http://latintrails.com/wp-content/uploads/2016/04/quito-middle-of-the-world-latintrails-300x180.jpg 300w\" alt=\"middle of the world ecuador\" width=\"503\" height=\"302\" /></p>\r\n<p>You may choose to either visit the Ethnographic or the Inti &Ntilde;an Museums, both located near the monument.&nbsp; Along the way, we will stop for a traditional Ecuadorian lunch (optional and not included). After the tour, you will finally return to your hotel.</p>\r\n<p>Overnight: Quito</p>\r\n<p>Meals: B/-/-</p>', '1');
INSERT INTO `itinerario` VALUES ('51', '29', 'Day Two City Tour', '<p><img class=\"aligncenter wp-image-9161\" style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://latintrails.com/wp-content/uploads/2017/03/quito-six-senses.jpg\" sizes=\"(max-width: 501px) 100vw, 501px\" srcset=\"http://latintrails.com/wp-content/uploads/2017/03/quito-six-senses.jpg 600w, http://latintrails.com/wp-content/uploads/2017/03/quito-six-senses-300x200.jpg 300w\" alt=\"\" width=\"501\" height=\"334\" /></p>\r\n<p>Six Senses Tour Quito is an unique and innovative program made up by psycho-sensory experiences in which every perceptive human sense is involved. The Six Senses Tour was born as an innovative experience program by Latin Trails, which Psychology and sensitive methods are combined; giving to our guests a complete life experience on ancient places and typical meals in the marvelous City of Quito. Enjoy a city tour of Quito the first city tour in Quito to offers more than just postcard pictures in your mind. You can check out the options in&nbsp;<a href=\"http://latintrails.com/quito-six-senses-tour/\">Quito Six Senses Tour&nbsp;</a></p>\r\n<p>Overnight: Quito</p>\r\n<p>Meals: B/L/-</p>', '1');
INSERT INTO `itinerario` VALUES ('52', '30', 'dia uno', '<p>descripcion dia</p>\r\n<p>hhj</p>\r\n<p>&nbsp;</p>\r\n<p>jhj</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', '1');
INSERT INTO `itinerario` VALUES ('53', '31', 'Day 1 Sea Star Journey “A” itinerary', '<div class=\"vc_row wpb_row vc_inner vc_row-fluid mkdf-section mkdf-content-aligment-left\" data-mkdf-parallax-speed=\"1\">\r\n<div class=\"mkdf-full-section-inner\">\r\n<div class=\"wpb_column vc_column_container vc_col-sm-12\">\r\n<div class=\"vc_column-inner \">\r\n<div class=\"wpb_wrapper\">\r\n<div class=\"mkdf-tabs mkdf-horizontal mkdf-tab-text clearfix ui-tabs ui-widget ui-widget-content ui-corner-all\">\r\n<div id=\"tab-day-by-day-705\" class=\"mkdf-tab-container ui-tabs-panel ui-widget-content ui-corner-bottom\" style=\"background: 0px 0px; border-width: 1px 0px 0px; border-image: initial; margin: 0px; padding: 28px 32px 8px 0px; vertical-align: baseline; outline: 0px; top: -1px; position: relative; z-index: 10; border-color: #ebebeb initial initial initial; border-style: solid initial initial initial;\" role=\"tabpanel\" data-icon-pack=\"font_awesome\" data-icon-html=\"&lt;i class=\">\r\n<div class=\"wpb_text_column wpb_content_element \">\r\n<div class=\"wpb_wrapper\">\r\n<p><strong>DAY 1 &ndash; TUESDAY</strong></p>\r\n<h2><strong>CERRO COLORADO, SAN CRIST&Oacute;BAL</strong></h2>\r\n<p><img class=\"size-full wp-image-7441 alignleft\" src=\"http://latintrails.com/wp-content/uploads/2016/04/cerro-colorado.jpg\" sizes=\"(max-width: 320px) 100vw, 320px\" srcset=\"http://latintrails.com/wp-content/uploads/2016/04/cerro-colorado.jpg 320w, http://latintrails.com/wp-content/uploads/2016/04/cerro-colorado-300x141.jpg 300w\" alt=\"Sea Star Journey A itinerary\" width=\"320\" height=\"150\" /><a href=\"http://latintrails.com/galapagos-sea-star-journey/\">Sea Star Journey&nbsp;</a>A itinerary: Upon arrival at San Cristobal Airport, travelers pass through an airport inspection point to insure that no foreign plants or animals are introduced to the islands, as well as to pay the park entrance fee of $100 (unless it has been prepaid). A guide will meet you, help you collect your luggage, and escort you on a short bus ride to the harbor.</p>\r\n<p>Finally, you will be soon in&nbsp;<a href=\"http://latintrails.com/galapagos-sea-star-journey/\">Sea Star Journey Cruise,</a>&nbsp;ready for the adventure.&nbsp;In the afternoon, visit Cerro Colorado Tortoises Protection and Growing Center, located at 40 minutes approx by bus to the southeast of the island. This center takes improves the status of the population of the island tortoises. It&nbsp;includes a large corral, a Visitors center, breeding center and an interpretative trail. Along this trail is possible to see different species of native and endemic plants as well birds as the San Cristobal Mockingbird, Yellow Warblers, and many species of finches and the Galapagos fly catcher.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', '1');
INSERT INTO `itinerario` VALUES ('54', '31', 'DAY 2 – WEDNESDAY', '<h2><strong>DAY 2 &ndash; WEDNESDAY</strong></h2>\r\n<h2><strong>AM: ESPA&Ntilde;OLA ISLAND, GARDNER BAY</strong></h2>\r\n<p><img class=\"size-full wp-image-7442 alignleft\" src=\"http://latintrails.com/wp-content/uploads/2016/04/espa%C3%B1ola-island.jpg\" sizes=\"(max-width: 320px) 100vw, 320px\" srcset=\"http://latintrails.com/wp-content/uploads/2016/04/espa&ntilde;ola-island.jpg 320w, http://latintrails.com/wp-content/uploads/2016/04/espa&ntilde;ola-island-300x141.jpg 300w\" alt=\"Sea Star Journey A itinerary\" width=\"320\" height=\"150\" />Located on the north-eastern coast of Hood, Gardner Bay provides an excellent beach for relaxing, swimming, snorkeling, kayaking, and the opportunity to observe sea lions. Here we can also observe sharks in the crystal clear ocean waters.</p>\r\n<h2><strong>PM: ESPA&Ntilde;OLA ISLAND, PUNTA SUAREZ</strong></h2>\r\n<p>This rocky land spot sustains one of the most impressive and varied colonies of sea birds in the Galapagos. Along with its southern shore, high cliffs rise up from the sea affording the visitor spectacular views of soaring birds and of the blow whole where water spouts up to 50-75 feet into the air according to the intensity of the surf.</p>\r\n<p>&nbsp;</p>', '1');

-- ----------------------------
-- Table structure for mapas
-- ----------------------------
DROP TABLE IF EXISTS `mapas`;
CREATE TABLE `mapas` (
  `id_mapa` int(11) NOT NULL AUTO_INCREMENT,
  `id_paquete_tur` int(11) DEFAULT NULL,
  `descripcion` text,
  `nombre_mapa` varchar(255) DEFAULT NULL,
  `imagen` varchar(200) DEFAULT NULL,
  `thumbnail` varchar(200) DEFAULT NULL,
  `estado` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_mapa`),
  KEY `fk_paquete_turistico_con_mapas` (`id_paquete_tur`),
  CONSTRAINT `fk_paquete_turistico_con_mapas` FOREIGN KEY (`id_paquete_tur`) REFERENCES `paquete_turistico` (`id_paquete_tur`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mapas
-- ----------------------------
INSERT INTO `mapas` VALUES ('5', '29', '<p>Descripci&oacute;n del Mapa Ruta Andes</p>', 'Mapas Ruta Andes', 'Captura.PNG', 'thumb_Captura.PNG', '1');
INSERT INTO `mapas` VALUES ('6', '30', '<p style=\"text-align: center;\"><iframe style=\"border: 0;\" src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15959.067702253305!2d-78.54509321742543!3d-0.29081783786367843!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91d598baa079104b%3A0xf3baf8fda8da72f3!2sAntonio+Jose+de+Sucre+Y+Matilde+Alvarez!5e0!3m2!1ses!2sec!4v1498087942308\" width=\"600\" height=\"450\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\"></iframe></p>', 'nombre -', 'Captura.PNG', 'thumb_Captura.PNG', '1');

-- ----------------------------
-- Table structure for notificaciones
-- ----------------------------
DROP TABLE IF EXISTS `notificaciones`;
CREATE TABLE `notificaciones` (
  `id_notificacion` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` text,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`id_notificacion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of notificaciones
-- ----------------------------

-- ----------------------------
-- Table structure for notificaciones_con_usuarios
-- ----------------------------
DROP TABLE IF EXISTS `notificaciones_con_usuarios`;
CREATE TABLE `notificaciones_con_usuarios` (
  `id` int(11) NOT NULL,
  `id_notificacion` int(11) NOT NULL,
  PRIMARY KEY (`id`,`id_notificacion`),
  KEY `fk_notificaciones_con_usuarios2` (`id_notificacion`),
  CONSTRAINT `fk_notificaciones_con_usuarios` FOREIGN KEY (`id`) REFERENCES `users` (`id`),
  CONSTRAINT `fk_notificaciones_con_usuarios2` FOREIGN KEY (`id_notificacion`) REFERENCES `notificaciones` (`id_notificacion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of notificaciones_con_usuarios
-- ----------------------------

-- ----------------------------
-- Table structure for pagina
-- ----------------------------
DROP TABLE IF EXISTS `pagina`;
CREATE TABLE `pagina` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) DEFAULT NULL,
  `pie` varchar(255) DEFAULT NULL,
  `links_interes` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `indice_pagina` (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pagina
-- ----------------------------
INSERT INTO `pagina` VALUES ('1', 'LatinTrais', '<p><strong>Copyright &copy; 2017 <a href=\"http://latintrails.com\">Latintrails.com</a>.</strong> Creado por <a href=\"http://ups.edu.ec\">Universidad Polit&eacute;cnica Salesiana</a>.</p>', '<p><a href=\"http://www.latintrails.com\">http://www.latintrails.com</a></p>');

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
  `id` int(11) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `descripcion` text,
  `fecha_creacion` datetime DEFAULT NULL,
  `precio` char(10) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_paquete_tur`),
  KEY `fk_categoria_con_paquetes_turisticos` (`id_categoria`),
  KEY `fk_usuario_con_paquete_turistico` (`id`),
  CONSTRAINT `fk_categoria_con_paquetes_turisticos` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`),
  CONSTRAINT `fk_usuario_con_paquete_turistico` FOREIGN KEY (`id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of paquete_turistico
-- ----------------------------
INSERT INTO `paquete_turistico` VALUES ('1', null, '1', 'Titulo uno paquete turistico', '<div style=\"background:#eeeeee; border:1px solid #cccccc; padding:5px 10px\">Aqui la descripci&oacute;n del paquete tur&iacute;stico.</div>\r\n\r\n<p>Ingresamos el cuerpo del paquete Tur&iacute;stico</p>\r\n\r\n<p><strong>Ingresamos el subt&iacute;tulo:</strong> Ingresamos toda la descipcion de ma&ntilde;ana</p>', '2017-06-10 06:06:56', '$26.6', '2');
INSERT INTO `paquete_turistico` VALUES ('2', null, '1', 'Nombre paquete', 'Descripcion paquete turistico', '2017-06-10 06:06:23', '22.63', '2');
INSERT INTO `paquete_turistico` VALUES ('3', null, '1', 'Nombre paquete', 'Descripcion paquete turistico', '2017-06-10 06:06:48', '22.63', '2');
INSERT INTO `paquete_turistico` VALUES ('4', null, '1', 'Nombre paquete', 'Descripcion paquete turistico', '2017-06-10 06:06:24', '22.63', '2');
INSERT INTO `paquete_turistico` VALUES ('5', null, '2', 'nombre 5', 'descripcoon', '2017-06-10 06:06:49', '55', '2');
INSERT INTO `paquete_turistico` VALUES ('6', null, '1', null, 'dsa', '2017-06-11 04:06:05', '22', '2');
INSERT INTO `paquete_turistico` VALUES ('7', null, null, 'dsadsadsa', 'dsa', '2017-06-11 04:06:19', '32', '2');
INSERT INTO `paquete_turistico` VALUES ('8', null, null, 'dsa', 'dsa', '2017-06-11 04:06:03', '32', '2');
INSERT INTO `paquete_turistico` VALUES ('9', null, null, 'dda', 'dsa', '2017-06-11 04:06:54', '2121', '2');
INSERT INTO `paquete_turistico` VALUES ('10', null, null, 'ds', 'dsa', '2017-06-11 04:06:12', '2', '2');
INSERT INTO `paquete_turistico` VALUES ('11', null, null, 'dsa', 'dsa', '2017-06-11 04:06:23', '33', '2');
INSERT INTO `paquete_turistico` VALUES ('12', null, null, 'dsa', 'ds', '2017-06-11 04:06:43', '21', '2');
INSERT INTO `paquete_turistico` VALUES ('13', null, null, 'ew', 'wq', '2017-06-11 04:06:11', 'ewq', '2');
INSERT INTO `paquete_turistico` VALUES ('14', null, null, 'dsa', 'dsa', '2017-06-11 04:06:18', '544', '2');
INSERT INTO `paquete_turistico` VALUES ('15', null, null, 'dsa', 'dsa', '2017-06-11 05:06:06', '22', '2');
INSERT INTO `paquete_turistico` VALUES ('16', null, null, 'dsa', 'dsa', '2017-06-11 05:06:51', 'dsa', '2');
INSERT INTO `paquete_turistico` VALUES ('17', null, null, null, null, '2017-06-11 05:06:04', null, '2');
INSERT INTO `paquete_turistico` VALUES ('18', null, null, null, null, '2017-06-11 05:06:21', null, '2');
INSERT INTO `paquete_turistico` VALUES ('19', null, null, null, null, '2017-06-11 05:06:46', null, '2');
INSERT INTO `paquete_turistico` VALUES ('20', null, null, null, null, '2017-06-11 05:06:57', null, '2');
INSERT INTO `paquete_turistico` VALUES ('21', null, null, null, null, '2017-06-11 05:06:16', null, '2');
INSERT INTO `paquete_turistico` VALUES ('22', null, null, null, null, '2017-06-11 05:06:32', null, '2');
INSERT INTO `paquete_turistico` VALUES ('23', null, null, null, null, '2017-06-11 05:06:50', null, '2');
INSERT INTO `paquete_turistico` VALUES ('24', null, null, null, null, '2017-06-11 05:06:22', null, '2');
INSERT INTO `paquete_turistico` VALUES ('25', null, null, 'dsa', 'dsa', '2017-06-11 05:06:22', '312', '2');
INSERT INTO `paquete_turistico` VALUES ('26', null, '2', 'Paquete 12', '<p>Upon arrival at Quito airport, you will meet your guide, he will transfer you to your hotel.</p>\r\n\r\n<p>Situated in a circle of Andean peaks, Quito is the world&rsquo;s second highest capital, with arguably one of the finest settings in the world.&nbsp; Originally settled by the Quitu tribe in the first millennium, Quito was an important part of the Inca Empire, before being destroyed and re-founded by Spanish conquistador Sebasti&aacute;n de Benalc&aacute;zar in 1534.</p>\r\n\r\n<p>The colonial center &ndash; declared a World Heritage Site by UNESCO in 1978 &ndash; is one of the largest and best preserved in Latin America. It is home to excellent museums, churches and art galleries.</p>\r\n\r\n<p>Overnight: Quito</p>\r\n\r\n<p>Meals: -/-/-</p>', '2017-06-14 02:06:20', '150', '2');
INSERT INTO `paquete_turistico` VALUES ('27', null, null, null, null, null, null, '2');
INSERT INTO `paquete_turistico` VALUES ('28', null, '3', 'Andes & AmazonTour', '<p><strong>14 days &ndash; 13 nights</strong></p>\r\n<p>The best of the Andes region in Ecuador, and the magic of the Amazon in one tour. Visit the snow-capped volcanoes, taste the traditional cuisine, perceive the aromas of the Andean culture, travel in of the most difficult train of the world. And, of course, visit two of the most beautiful colonial cities in the country, Cuenca and Quito.</p>\r\n<div class=\"vc_row wpb_row vc_inner vc_row-fluid mkdf-section mkdf-content-aligment-left\" data-mkdf-parallax-speed=\"1\">\r\n<div class=\"mkdf-full-section-inner\">\r\n<div class=\"wpb_column vc_column_container vc_col-sm-10\">\r\n<div class=\"vc_column-inner \">\r\n<div class=\"wpb_wrapper\">\r\n<div class=\"wpb_text_column wpb_content_element \">\r\n<div class=\"wpb_wrapper\">\r\n<p>Included</p>\r\n<table>\r\n<tbody>\r\n<tr>\r\n<td>1</td>\r\n<td>Privates transportation</td>\r\n</tr>\r\n<tr>\r\n<td>2</td>\r\n<td>Meals detailed in the itinerary</td>\r\n</tr>\r\n<tr>\r\n<td>3</td>\r\n<td>Hotel accommodation</td>\r\n</tr>\r\n<tr>\r\n<td>4</td>\r\n<td>English speaking guide</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n</div>\r\n<div class=\"vc_empty_space\" data-original-height=\"22\">&nbsp;</div>\r\n<div class=\"wpb_text_column wpb_content_element \">\r\n<div class=\"wpb_wrapper\">\r\n<p>Not Included</p>\r\n<table>\r\n<tbody>\r\n<tr>\r\n<td>1</td>\r\n<td>International flights and airport taxes</td>\r\n</tr>\r\n<tr>\r\n<td>2</td>\r\n<td>Additional meals and drinks (soft &amp; alcoholics)</td>\r\n</tr>\r\n<tr>\r\n<td>3</td>\r\n<td>Tips and personal expenses</td>\r\n</tr>\r\n<tr>\r\n<td>4</td>\r\n<td>Travel and medical insurance</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div class=\"wpb_column vc_column_container vc_col-sm-1\">&nbsp;</div>\r\n</div>\r\n</div>', '2017-06-17 06:06:34', '$150', '1');
INSERT INTO `paquete_turistico` VALUES ('29', null, '12', 'The jewel of the Andes tour', '<div class=\"wpb_text_column wpb_content_element \">\r\n<div class=\"wpb_wrapper\">\r\n<h2 style=\"text-align: center;\">The jewel of the Andes tour</h2>\r\n</div>\r\n</div>\r\n<div class=\"wpb_text_column wpb_content_element \">\r\n<div class=\"wpb_wrapper\">\r\n<p style=\"text-align: center;\">10 days &ndash; 9 nights</p>\r\n</div>\r\n</div>\r\n<div class=\"wpb_text_column wpb_content_element \">\r\n<div class=\"wpb_wrapper\">\r\n<p>Visit the snow-capped volcanoes, the highest active in the world, taste the traditional cuisine, sense the andean culture, travel in one of the most difficult trains of the world. And, last but not least, visit two of the most beautiful colonial cities in the country, Quito.</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"../../files/train-ecuador-latintrails3.jpg\" width=\"700\" height=\"500\" /></p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"../../files/ecuador-travel-latintrails5.jpg\" width=\"700\" height=\"500\" /></p>\r\n</div>\r\n</div>', '2017-06-21 04:06:24', null, '1');
INSERT INTO `paquete_turistico` VALUES ('30', null, '8', 'Cartagena de indias', '<p>descripcion</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"../files/ecuador-travel-latintrails5.jpg\" alt=\"\" width=\"700\" height=\"500\" /></p>', '2017-06-21 11:06:11', '$365.00', '1');
INSERT INTO `paquete_turistico` VALUES ('31', null, '7', 'Paquete Galapagos', '<div class=\"wpb_text_column wpb_content_element \">\r\n<div class=\"wpb_wrapper\">\r\n<h2>Andes Tours</h2>\r\n</div>\r\n</div>\r\n<div class=\"wpb_text_column wpb_content_element \">\r\n<div class=\"wpb_wrapper\">\r\n<p>Ever thought of spending an Andes Mountain Vacation? The Andes mountains located in Ecuador offers a diverse array of activities for any adventure seeking tourist. It offers everything from camping and hiking trips, to mountain bike tours. Ecuador promotes active travel vacations throughout all the country.</p>\r\n<p>Ecuador is a particular spot where visitors can engage in a variety of activities regarding the tourism industry. Therefore, there are places available for adventure, naturalism, cultural, ecological and communitarian tourism through all regions nationwide.</p>\r\n<p>Latin Trails, as well as offering the best tourist sites to visit and contemplate, presents our customers the best travel services. Comfort and exclusivity are reflected in all our services provided under request, such as:</p>\r\n<p>Airport transfers, Hotel, lodging and accommodation, Tour leaders and guides, Private van transportation, 4X4 vehicles, Bus transportation for groups, Enchanted Isles trip reservations, Amazon cruise reservations, Rainforest lodges, Community tourism, Rural lodging, Responsible tourism programs, Adventure and soft Adventure travel, Yoga and health travel, Volunteer programs</p>\r\n<p>&nbsp;</p>\r\n<p style=\"text-align: center;\"><img src=\"../files/ecuador-travel-latintrails5.jpg\" alt=\"\" width=\"700\" height=\"500\" /></p>\r\n</div>\r\n</div>', '2017-06-24 10:06:02', '1', '1');
INSERT INTO `paquete_turistico` VALUES ('32', null, '12', 'sa', null, '2017-06-26 01:06:34', null, '1');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------
INSERT INTO `password_resets` VALUES ('mauricio.macb@hotmail.com', 'f5be70715ce263b07fe1ac47f4346630bc8fbd6d55c0394dfbaf8ced85435db3', '2017-02-13 20:01:48');

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES ('1', 'permiso admin', '2017-01-22 13:45:47', '2017-01-22 13:45:47');
INSERT INTO `permissions` VALUES ('3', 'permiso usuario', '2017-01-22 13:45:56', '2017-01-22 13:45:56');
INSERT INTO `permissions` VALUES ('4', 'nuevo permiso', '2017-02-20 21:33:33', '2017-02-20 21:33:33');

-- ----------------------------
-- Table structure for puntos_interes
-- ----------------------------
DROP TABLE IF EXISTS `puntos_interes`;
CREATE TABLE `puntos_interes` (
  `id_punto_interes` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_punto_interes`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of puntos_interes
-- ----------------------------

-- ----------------------------
-- Table structure for puntos_interes_con_reservaciones
-- ----------------------------
DROP TABLE IF EXISTS `puntos_interes_con_reservaciones`;
CREATE TABLE `puntos_interes_con_reservaciones` (
  `id_reservaciones` int(11) NOT NULL,
  `id_punto_interes` int(11) NOT NULL,
  PRIMARY KEY (`id_reservaciones`,`id_punto_interes`),
  KEY `fk_puntos_interes_con_reservaciones2` (`id_punto_interes`),
  CONSTRAINT `fk_puntos_interes_con_reservaciones` FOREIGN KEY (`id_reservaciones`) REFERENCES `reservaciones` (`id_reservaciones`),
  CONSTRAINT `fk_puntos_interes_con_reservaciones2` FOREIGN KEY (`id_punto_interes`) REFERENCES `puntos_interes` (`id_punto_interes`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of puntos_interes_con_reservaciones
-- ----------------------------

-- ----------------------------
-- Table structure for reservaciones
-- ----------------------------
DROP TABLE IF EXISTS `reservaciones`;
CREATE TABLE `reservaciones` (
  `id_reservaciones` int(11) NOT NULL AUTO_INCREMENT,
  `id_como_nos_encontro` int(11) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `descripcion` text,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telefono` varchar(100) DEFAULT NULL,
  `numero_personas` int(11) DEFAULT NULL,
  `presupuesto_persona` varchar(100) DEFAULT NULL,
  `fecha_inicio_viaje` datetime DEFAULT NULL,
  `fecha_fin_viaje` datetime DEFAULT NULL,
  `numero_dias` varchar(10) DEFAULT NULL,
  `ubicacion_inicio_viaje` varchar(255) DEFAULT NULL,
  `ubicacion_termina_viaje` varchar(255) DEFAULT NULL,
  `requerimiento_comidas` text,
  `prioridades` text,
  `sus_vacaciones_pagadas` text,
  `pedidos_especiales` text,
  PRIMARY KEY (`id_reservaciones`),
  KEY `fk_como_nos_encontro_con_reservaciones` (`id_como_nos_encontro`),
  KEY `fk_reservaciones_con_usuarios` (`id`),
  CONSTRAINT `fk_como_nos_encontro_con_reservaciones` FOREIGN KEY (`id_como_nos_encontro`) REFERENCES `como_nos_encontro` (`id_como_nos_encontro`),
  CONSTRAINT `fk_reservaciones_con_usuarios` FOREIGN KEY (`id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of reservaciones
-- ----------------------------

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', 'rol admin', '2017-01-22 13:45:34', '2017-01-22 13:45:34');
INSERT INTO `roles` VALUES ('2', 'rol operador', '2017-01-22 13:45:39', '2017-01-22 13:45:39');
INSERT INTO `roles` VALUES ('3', 'rol supervisor', '2017-06-21 23:40:56', '2017-06-21 23:40:56');

-- ----------------------------
-- Table structure for roles_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `roles_has_permissions`;
CREATE TABLE `roles_has_permissions` (
  `id_permiso` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  PRIMARY KEY (`id_permiso`,`id_rol`),
  KEY `fk_roles_has_permissions2` (`id_rol`),
  CONSTRAINT `fk_roles_has_permissions` FOREIGN KEY (`id_permiso`) REFERENCES `permissions` (`id`),
  CONSTRAINT `fk_roles_has_permissions2` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of roles_has_permissions
-- ----------------------------
INSERT INTO `roles_has_permissions` VALUES ('1', '1');

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
-- Table structure for tipo_alojamiento
-- ----------------------------
DROP TABLE IF EXISTS `tipo_alojamiento`;
CREATE TABLE `tipo_alojamiento` (
  `id_tipo_alojamiento` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) DEFAULT NULL,
  `descripcion` text,
  PRIMARY KEY (`id_tipo_alojamiento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tipo_alojamiento
-- ----------------------------

-- ----------------------------
-- Table structure for tipo_alojamiento_con_reservaciones
-- ----------------------------
DROP TABLE IF EXISTS `tipo_alojamiento_con_reservaciones`;
CREATE TABLE `tipo_alojamiento_con_reservaciones` (
  `id_reservaciones` int(11) NOT NULL,
  `id_tipo_alojamiento` int(11) NOT NULL,
  PRIMARY KEY (`id_reservaciones`,`id_tipo_alojamiento`),
  KEY `fk_tipo_alojamiento_con_reservaciones2` (`id_tipo_alojamiento`),
  CONSTRAINT `fk_tipo_alojamiento_con_reservaciones` FOREIGN KEY (`id_reservaciones`) REFERENCES `reservaciones` (`id_reservaciones`),
  CONSTRAINT `fk_tipo_alojamiento_con_reservaciones2` FOREIGN KEY (`id_tipo_alojamiento`) REFERENCES `tipo_alojamiento` (`id_tipo_alojamiento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tipo_alojamiento_con_reservaciones
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Mauricio Alfredo Cóndor Bayas.', 'mauricio.macb@hotmail.com', '$2y$10$nYCQ28/9PbAlZQEgFF5mj.xixLDdWs2CnGra3pXefIZvtn4cxhJlO', 'QrBbJqr7BffVUuz3DfIOt1McU2d3YNT7bHDI9ZaotzjS9DtQk2Xn465AtbIo', '2017-01-22 13:45:16', '2017-03-14 17:33:16');
INSERT INTO `users` VALUES ('2', 'Mauricio Alfredo Cóndor Bayas', 'mac_bayas@hotmail.com', '$2y$10$Pcy4wk6anj85TEw5cayZWuDAdO5uZYnnXLaAteFza/LeHQUdoBRX6', '6zSBd1ve1MYMeGe5Y4UPqGfO8WSNlwdoJi9w0na0PnMnZM1g4TlbDBVNDZiD', '2017-02-13 20:12:26', '2017-02-20 21:33:42');
INSERT INTO `users` VALUES ('3', 'Mauricio Alfredo Cóndor Bayas', 'mauricio.macb1@gmail.com', '$2y$10$OJtcy2gIZCrjDTLc7r64FO3PvW35BQXo7PUXJtJGVJ2zIlnfMMUl.', null, '2017-02-20 21:34:05', '2017-02-20 21:34:05');
INSERT INTO `users` VALUES ('4', 'Jaqueline', 'jaque@jaque.com', '$2y$10$R6Rc3aRmbz9N0UQJeUhABOCO5298zaDz2Ra4mKruRgS7v3LzMEY6C', null, '2017-06-21 23:39:52', '2017-06-21 23:39:52');
INSERT INTO `users` VALUES ('5', 'cliente', 'cliente@hotmail.com', '$2y$10$bHEQ5We6VAvXlixcHRcTouA0CXjyXS3goF96KhBf79kYUwRCsLcwi', null, '2017-06-24 22:32:21', '2017-06-24 22:32:21');

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
INSERT INTO `user_has_permissions` VALUES ('1', '1');
INSERT INTO `user_has_permissions` VALUES ('3', '4');

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
INSERT INTO `user_has_roles` VALUES ('1', '1');
INSERT INTO `user_has_roles` VALUES ('4', '3');
