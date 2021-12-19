/*
Navicat MySQL Data Transfer

Source Server         : web
Source Server Version : 50155
Source Host           : localhost:3306
Source Database       : 管理员

Target Server Type    : MYSQL
Target Server Version : 50155
File Encoding         : 65001

Date: 2020-12-24 19:51:38
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for 订单
-- ----------------------------
DROP TABLE IF EXISTS `订单`;
CREATE TABLE `订单` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `bookname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `number` varchar(16) NOT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `subscribers` varchar(255) DEFAULT NULL,
  `telphone` varchar(255) DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `date` date DEFAULT NULL,
  `condition` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of 订单
-- ----------------------------
INSERT INTO `订单` VALUES ('1', '撒野', '45', '45', 'ann', '1236666666', '钢厂', '2020-12-24', '0');
INSERT INTO `订单` VALUES ('2', '陪孩子终身成长', '25', '59', 'ben', '1562222236', '翟家街道', '2020-12-24', '0');
INSERT INTO `订单` VALUES ('3', '答案之书', '46', '38', 'David', '1886663222', '象牙山', '2020-12-24', '1');
INSERT INTO `订单` VALUES ('4', 'labuladong的算法小抄', '79', '99', 'eva', '1302258966', '象牙山', '2020-12-24', '0');
INSERT INTO `订单` VALUES ('5', '郭论', '63', '50', 'cindy', '1594444444', '王家堡', '2020-12-24', '1');
