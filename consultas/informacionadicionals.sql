/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50723
Source Host           : localhost:3306
Source Database       : tdm

Target Server Type    : MYSQL
Target Server Version : 50723
File Encoding         : 65001

Date: 2019-02-14 02:02:15
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `informacionadicionals`
-- ----------------------------
DROP TABLE IF EXISTS `informacionadicionals`;
CREATE TABLE `informacionadicionals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `item` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `orden` tinyint(3) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of informacionadicionals
-- ----------------------------
INSERT INTO `informacionadicionals` VALUES ('3', 'asdasdas', 'Numero', '2', null, null);
