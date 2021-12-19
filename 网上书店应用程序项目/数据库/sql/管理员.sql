/*
Navicat MySQL Data Transfer

Source Server         : web
Source Server Version : 50155
Source Host           : localhost:3306
Source Database       : 管理员

Target Server Type    : MYSQL
Target Server Version : 50155
File Encoding         : 65001

Date: 2020-12-24 19:52:08
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for 管理员
-- ----------------------------
DROP TABLE IF EXISTS `管理员`;
CREATE TABLE `管理员` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of 管理员
-- ----------------------------
INSERT INTO `管理员` VALUES ('1', 'kris', '123456');
INSERT INTO `管理员` VALUES ('2', 'luhan', '134567');
INSERT INTO `管理员` VALUES ('3', 'tao', '145678');
INSERT INTO `管理员` VALUES ('4', 'lay', '156789');
INSERT INTO `管理员` VALUES ('5', 'exo', '123457');
