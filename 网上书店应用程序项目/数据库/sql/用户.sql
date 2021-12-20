/*
Navicat MySQL Data Transfer

Source Server         : web
Source Server Version : 50155
Source Host           : localhost:3306
Source Database       : 管理员

Target Server Type    : MYSQL
Target Server Version : 50155
File Encoding         : 65001

Date: 2020-12-24 19:52:21
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for 用户
-- ----------------------------
DROP TABLE IF EXISTS `用户`;
CREATE TABLE `用户` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(16) NOT NULL,
  `realname` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `telphone` int(11) DEFAULT NULL,
  `sex` char(255) CHARACTER SET utf8 DEFAULT NULL,
  `condition` int(255) DEFAULT '0',
  `birthdate` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of 用户
-- ----------------------------
INSERT INTO `用户` VALUES ('1', 'ann', '1234567', '张三', '1236666666', '0', '0', '2020-12-03');
INSERT INTO `用户` VALUES ('2', 'ben', '1234568', '李四', '1562222236', '1', '1', '2020-11-30');
INSERT INTO `用户` VALUES ('3', 'cindy', '1234569', '王狗', '1594444444', '1', '0', '2019-02-21');
INSERT INTO `用户` VALUES ('4', 'David', '1345678', '刘能', '1886663222', '0', '1', '2009-10-21');
INSERT INTO `用户` VALUES ('5', 'eva', '1345679', '谢广坤', '1302258966', '0', '0', '1994-12-01');
