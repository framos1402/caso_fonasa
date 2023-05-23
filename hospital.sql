/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50524
Source Host           : localhost:3306
Source Database       : hospital

Target Server Type    : MYSQL
Target Server Version : 50524
File Encoding         : 65001

Date: 2023-05-23 10:38:25
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `acceso`
-- ----------------------------
DROP TABLE IF EXISTS `acceso`;
CREATE TABLE `acceso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(20) DEFAULT NULL,
  `pass` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of acceso
-- ----------------------------
INSERT INTO `acceso` VALUES ('1', 'framos', 'framos');

-- ----------------------------
-- Table structure for `consulta`
-- ----------------------------
DROP TABLE IF EXISTS `consulta`;
CREATE TABLE `consulta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cantPacientes` int(11) DEFAULT NULL,
  `nombreEspecialista` varchar(255) DEFAULT NULL,
  `tipoConsulta` varchar(50) DEFAULT NULL,
  `estado` tinyint(4) DEFAULT NULL,
  `id_hospital` int(11) DEFAULT NULL,
  `id_paciente` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_hospital` (`id_hospital`),
  CONSTRAINT `consulta_ibfk_1` FOREIGN KEY (`id_hospital`) REFERENCES `hospital` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of consulta
-- ----------------------------
INSERT INTO `consulta` VALUES ('1', '0', 'Dr Martin', 'PEDIATRIA', '0', '1', '0');
INSERT INTO `consulta` VALUES ('2', '0', 'Dr Luis', 'CGI', '0', '1', '0');
INSERT INTO `consulta` VALUES ('3', '0', 'Dra Fernanda', 'URGENCIA', '0', '1', '0');
INSERT INTO `consulta` VALUES ('4', '0', 'Dr Enrique', 'PEDIATRIA', '0', '2', '0');
INSERT INTO `consulta` VALUES ('5', '0', 'Dra Andrea', 'CGI', '0', '2', '0');
INSERT INTO `consulta` VALUES ('6', '0', 'Dra Cecilia', 'URGENCIA', '0', '2', '0');
INSERT INTO `consulta` VALUES ('7', '0', 'Dr Fabian', 'PEDIATRIA', '0', '3', '0');
INSERT INTO `consulta` VALUES ('8', '0', 'Dra Francisca', 'CGI', '0', '3', '0');
INSERT INTO `consulta` VALUES ('9', '0', 'Dr Emerson', 'URGENCIA', '0', '3', '0');

-- ----------------------------
-- Table structure for `hospital`
-- ----------------------------
DROP TABLE IF EXISTS `hospital`;
CREATE TABLE `hospital` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomHospital` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of hospital
-- ----------------------------
INSERT INTO `hospital` VALUES ('1', 'San jose del maipo');
INSERT INTO `hospital` VALUES ('2', 'San juan de dios');
INSERT INTO `hospital` VALUES ('3', 'San juan del norte');

-- ----------------------------
-- Table structure for `paciente`
-- ----------------------------
DROP TABLE IF EXISTS `paciente`;
CREATE TABLE `paciente` (
  `id_paciente` int(11) NOT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `noHistoriaClinica` int(11) DEFAULT NULL,
  `peso` int(11) DEFAULT NULL,
  `estatura` int(11) DEFAULT NULL,
  `ordenLlegada` datetime DEFAULT NULL,
  `prioridad` double DEFAULT NULL,
  `tipoConsulta` varchar(20) DEFAULT NULL,
  `id_hospital` int(11) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL,
  `id` varchar(30) NOT NULL,
  PRIMARY KEY (`id_paciente`,`id`),
  KEY `paciente_ibfk_1` (`id_hospital`),
  KEY `id_paciente` (`id_paciente`),
  KEY `id` (`id`),
  CONSTRAINT `paciente_ibfk_1` FOREIGN KEY (`id_hospital`) REFERENCES `hospital` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of paciente
-- ----------------------------
INSERT INTO `paciente` VALUES ('1', 'freddy ramos', '36', '1', null, null, '2023-05-22 15:44:36', '2.5', 'CGI', '1', '0', '1');
INSERT INTO `paciente` VALUES ('2', 'Diego gomez', '41', '4', null, null, '2023-05-22 16:00:09', '7.1', 'URGENCIA', '1', '0', '2');
INSERT INTO `paciente` VALUES ('3', 'Pedro pascal', '5', '2', '10', '50', '2023-05-22 16:05:20', '0.6', 'PEDIATRIA', '1', '0', '3');
INSERT INTO `paciente` VALUES ('4', 'Fabiola miranda', '55', '5', null, null, '2023-05-22 16:10:29', '8', 'URGENCIA', '1', '0', '4');
INSERT INTO `paciente` VALUES ('5', 'Ronald roman', '37', '2', null, null, '2023-05-22 16:20:29', '1', 'CGI', '1', '0', '5');
INSERT INTO `paciente` VALUES ('6', 'Gloria Acuña', '70', '7', null, null, '2023-05-22 16:15:29', '10.6', 'URGENCIA', '1', '0', '6');
INSERT INTO `paciente` VALUES ('15694258', 'eliseo matamala', '41', '1', null, null, '2023-05-23 08:59:30', '7.1', 'URGENCIA', '1', '0', '1569425820230523085931');
INSERT INTO `paciente` VALUES ('115460230', 'Maite Orsini', '50', '1', null, null, '2023-05-22 19:03:04', '7.6', 'URGENCIA', '3', '0', '11546023020230522190305');
INSERT INTO `paciente` VALUES ('145675439', 'enrique soto', '65', null, null, null, '2023-05-22 15:06:26', '10', 'URGENCIA', '3', '0', '14567543920230522150627');
INSERT INTO `paciente` VALUES ('154290115', 'francisco riquelme', '15', '1', '65', '155', '2023-05-22 18:39:32', '9.7', 'URGENCIA', '2', '0', '15429011520230522183933');
INSERT INTO `paciente` VALUES ('156543451', 'emanuel razmun', '15', '5', '55', '150', '2023-05-22 18:32:28', '8.2', 'URGENCIA', '2', '0', '15654345120230522183229');
INSERT INTO `paciente` VALUES ('164290115', 'freddy rios', '36', '1', null, null, '2023-05-22 18:27:51', '0.7', 'CGI', '2', '0', '16429011520230522182752');
INSERT INTO `paciente` VALUES ('164290116', 'ignacio roa', '41', '1', null, null, '2023-05-22 18:42:04', '7.1', 'URGENCIA', '2', '0', '16429011620230522184205');
INSERT INTO `paciente` VALUES ('164291110', 'fabian romero', '90', '1', null, null, '2023-05-23 09:03:33', '10.7', 'URGENCIA', '3', '0', '16429111020230523090334');
INSERT INTO `paciente` VALUES ('223586580', 'matias vega', '15', '1', '60', '160', '2023-05-23 09:14:16', '8.9', 'URGENCIA', '3', '0', '22358658020230523091417');
INSERT INTO `paciente` VALUES ('236547890', 'esteban pirinoli', '5', '1', '10', '20', '2023-05-23 10:35:38', '0.6', 'PEDIATRIA', '2', '0', '23654789020230523103539');

-- ----------------------------
-- Table structure for `panciano`
-- ----------------------------
DROP TABLE IF EXISTS `panciano`;
CREATE TABLE `panciano` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tieneDieta` tinyint(1) DEFAULT NULL,
  `id_registro` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_panciano` (`id_registro`),
  CONSTRAINT `fk_id_panciano` FOREIGN KEY (`id_registro`) REFERENCES `paciente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of panciano
-- ----------------------------
INSERT INTO `panciano` VALUES ('1', '1', '2');
INSERT INTO `panciano` VALUES ('2', '1', '4');
INSERT INTO `panciano` VALUES ('3', '1', '6');
INSERT INTO `panciano` VALUES ('10', '1', '14567543920230522150627');
INSERT INTO `panciano` VALUES ('18', '1', '16429011620230522184205');
INSERT INTO `panciano` VALUES ('19', '1', '11546023020230522190305');
INSERT INTO `panciano` VALUES ('37', '1', '1569425820230523085931');
INSERT INTO `panciano` VALUES ('38', '0', '16429111020230523090334');

-- ----------------------------
-- Table structure for `pjoven`
-- ----------------------------
DROP TABLE IF EXISTS `pjoven`;
CREATE TABLE `pjoven` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fumador` tinyint(1) DEFAULT NULL,
  `anos_fumando` int(2) DEFAULT NULL,
  `id_registro` varchar(30) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_id_pjoven` (`id_registro`),
  CONSTRAINT `fk_id_pjoven` FOREIGN KEY (`id_registro`) REFERENCES `paciente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pjoven
-- ----------------------------
INSERT INTO `pjoven` VALUES ('1', '1', '20', '1');
INSERT INTO `pjoven` VALUES ('2', '1', '3', '5');
INSERT INTO `pjoven` VALUES ('4', '1', '0', '16429011520230522182752');

-- ----------------------------
-- Table structure for `pninno`
-- ----------------------------
DROP TABLE IF EXISTS `pninno`;
CREATE TABLE `pninno` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `relacionPesoEstatura` int(11) DEFAULT NULL,
  `id_registro` varchar(30) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `kd_id_pninno` (`id_registro`) USING BTREE,
  CONSTRAINT `fk_id_pninno` FOREIGN KEY (`id_registro`) REFERENCES `paciente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pninno
-- ----------------------------
INSERT INTO `pninno` VALUES ('1', '-3', '3');
INSERT INTO `pninno` VALUES ('3', '-20', '15654345120230522183229');
INSERT INTO `pninno` VALUES ('4', '-85', '15429011520230522183933');
INSERT INTO `pninno` VALUES ('7', '-100', '22358658020230523091417');
INSERT INTO `pninno` VALUES ('8', '-10', '23654789020230523103539');
