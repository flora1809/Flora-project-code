/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : web

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2021-01-03 09:58:33
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `books`
-- ----------------------------
DROP TABLE IF EXISTS `books`;
CREATE TABLE `books` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `bookname` varchar(255) NOT NULL,
  `writer` varchar(255) DEFAULT NULL,
  `chubanshe` varchar(255) DEFAULT NULL,
  `ISBN` varchar(13) CHARACTER SET latin1 DEFAULT NULL,
  `price` double(10,2) NOT NULL DEFAULT '0.00',
  `picture` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `reserve` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `addtime` date DEFAULT NULL,
  `details` varchar(255) DEFAULT NULL,
  `state` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of books
-- ----------------------------
INSERT INTO `books` VALUES ('1', '撒野', '巫哲', '北京联合出版有限公司', '9787559620187', '44.00', 'image1.png', '526', '2021-01-02', '开 本：16开纸 张：胶版纸包 装：平装-胶订', '0');
INSERT INTO `books` VALUES ('2', '破云', '淮上', '江苏凤凰文艺出版社', '9787559436399', '49.80', 'image2.png', '356', '2020-12-03', '开 本：32开\r\n纸 张：胶版纸\r\n包 装：平装-胶订', '0');
INSERT INTO `books` VALUES ('3', '默读', 'Prist', '百花洲文艺出版社', '9787550025103', '45.00', 'image3.png', '426', '2020-12-01', '开 本：16开纸 张：胶版纸包 装：平装-胶订', '1');
INSERT INTO `books` VALUES ('4', '郭论', '郭德纲', '湖南文艺出版社', '9787540487850', '49.80', 'image4.png', '354', '2020-01-15', '开 本：16开纸 张：胶版纸包 装：平装-胶订', '1');
INSERT INTO `books` VALUES ('5', '邓小平时代', '(美) 傅高义著', '生活.读书.新知三联书店', '9787108041531', '88.00', 'image5.png', '143', '2020-07-29', '开 本：16开纸 张：胶版纸包 装：平装-胶订', '1');
INSERT INTO `books` VALUES ('6', '在野之学', '贺雪峰', '北京大学出版社', '9787301316221', '58.00', 'image6.png', '527', '2020-05-17', '开 本：32开纸 张：胶版纸包 装：平装-胶订', '2');
INSERT INTO `books` VALUES ('7', '陪孩子终身成长', '樊登', '中国友谊出版公司', '9787505748736', '59.00', 'image7.png', '542', '2020-09-24', '开 本：128开纸 张：胶版纸包 装：精装', '0');
INSERT INTO `books` VALUES ('8', '幸福的婚姻', '[美] 约翰戈特曼（John Gottman） 娜恩西尔弗（Nan Silver）', '浙江人民出版社', '9787213058417', '49.90', 'image8.png', '412', '2020-12-07', '开 本：16开纸 张：胶版纸包 装：平装-胶订', '0');
INSERT INTO `books` VALUES ('9', '答案之书', '保罗，酷威文化', '百花洲文艺出版社', '9787550017719', '38.00', 'image9.png', '284', '2020-07-03', '开 本：40开纸 张：轻型纸包 装：精装', '1');
INSERT INTO `books` VALUES ('10', '世界建筑大师图鉴', '[日] 大井隆弘 [日]市川纮司 [日] 吉本宪生 [日] 和田隆介，郝皓 译；凤凰空间', '江苏凤凰科学技术出版社', '9787571315054', '49.80', 'image10.png', '354', '2020-11-30', '开 本：32开纸 张：轻型纸包 装：平装-锁线胶订', '0');
INSERT INTO `books` VALUES ('11', 'labuladong的算法小抄', '付东来（@labuladong）', '电子工业出版社', '9787121399336', '99.00', 'image11.png', '157', '2020-12-01', '开 本：16开纸 张：胶版纸包 装：平装-胶订', '2');
INSERT INTO `books` VALUES ('31', '小王子', '威廉', '人民日报出版社', '9787559135257', '13.00', '16091431919520.jpg', '4634', '2020-12-28', '回到广东佛山市v半导体行业天河一号月台', '1');

-- ----------------------------
-- Table structure for `managers`
-- ----------------------------
DROP TABLE IF EXISTS `managers`;
CREATE TABLE `managers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of managers
-- ----------------------------
INSERT INTO `managers` VALUES ('1', 'kris', '123456');
INSERT INTO `managers` VALUES ('2', 'luhan', '134567');
INSERT INTO `managers` VALUES ('3', 'tao', '145678');
INSERT INTO `managers` VALUES ('4', 'lay', '156789');
INSERT INTO `managers` VALUES ('5', 'exo', '123457');

-- ----------------------------
-- Table structure for `orders`
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `bookname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `number` varchar(16) NOT NULL,
  `price` float(10,2) DEFAULT NULL,
  `subscribers` varchar(255) DEFAULT NULL,
  `telphone` varchar(255) DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `date` date DEFAULT NULL,
  `state` int(2) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES ('1', '撒野', '4', '44.00', '1', '1236666666', '钢厂', '2021-01-03', '1');
INSERT INTO `orders` VALUES ('2', '陪孩子终身成长', '2', '59.00', '2', '1562222236', '翟家街道', '2020-12-24', '0');
INSERT INTO `orders` VALUES ('3', '答案之书', '4', '38.00', '4', '1886663222', '象牙山', '2020-12-24', '1');
INSERT INTO `orders` VALUES ('4', 'labuladong的算法小抄', '4', '99.00', '5', '1302258966', '象牙山', '2020-12-24', '0');
INSERT INTO `orders` VALUES ('5', '郭论', '3', '50.00', '3', '1594444444', '王家堡', '2020-12-24', '1');
INSERT INTO `orders` VALUES ('6', '破云', '1', '49.80', '1', '1236666666', '钢厂', '2021-01-03', '1');
INSERT INTO `orders` VALUES ('7', '默读', '2', '45.00', '1', '1236666666', '钢厂', '2021-01-02', '1');
INSERT INTO `orders` VALUES ('12', '郭论', '4', '50.00', '1', '1236666666', '钢厂', '2020-12-24', '2');
INSERT INTO `orders` VALUES ('13', '陪孩子终身成长', '3', '59.00', '1', '1236666666', '钢厂', '2020-12-16', '3');
INSERT INTO `orders` VALUES ('14', '郭论', '30', '50.00', '1', '1236666666', '钢厂', '2020-12-09', '4');
INSERT INTO `orders` VALUES ('19', '撒野', '1', '44.00', '1', '1236666666', '钢厂', '2021-01-03', '1');
INSERT INTO `orders` VALUES ('20', '默读', '1', '45.00', '1', '1236666666', '钢厂', '2021-01-03', '1');
INSERT INTO `orders` VALUES ('21', '破云', '1', '49.80', '1', '1236666666', '钢厂', '2021-01-03', '1');
INSERT INTO `orders` VALUES ('22', '撒野', '1', '44.00', '1', '1236666666', null, '2021-01-03', '0');
INSERT INTO `orders` VALUES ('23', '在野之学', '1', '58.00', '1', '1236666666', null, '2021-01-03', '0');
INSERT INTO `orders` VALUES ('24', '撒野', '1', '44.00', '1', '1236666666', null, '2021-01-03', '0');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(16) NOT NULL,
  `realname` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `telphone` int(11) DEFAULT NULL,
  `sex` int(2) DEFAULT NULL,
  `state` int(2) DEFAULT '0',
  `birthdate` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'ann', '1234567', 'ann', '1236666666', '1', '1', '2020-12-03');
INSERT INTO `users` VALUES ('2', 'ben', '1234568', '李四', '1562222236', '1', '1', '2020-11-30');
INSERT INTO `users` VALUES ('3', 'cindy', '1234569', '王狗', '1594444444', '1', '0', '2019-02-21');
INSERT INTO `users` VALUES ('4', 'David', '1345678', '刘能', '1886663222', '0', '1', '2009-10-21');
INSERT INTO `users` VALUES ('5', 'eva', '1345679', '谢广坤', '1302258966', '0', '0', '1994-12-01');
