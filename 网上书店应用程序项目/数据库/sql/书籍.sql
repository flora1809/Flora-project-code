/*
Navicat MySQL Data Transfer

Source Server         : web
Source Server Version : 50155
Source Host           : localhost:3306
Source Database       : 管理员

Target Server Type    : MYSQL
Target Server Version : 50155
File Encoding         : 65001

Date: 2020-12-24 19:52:14
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for 书籍
-- ----------------------------
DROP TABLE IF EXISTS `书籍`;
CREATE TABLE `书籍` (
  `id` int(20) NOT NULL,
  `bookname` varchar(255) DEFAULT NULL,
  `writer` varchar(255) DEFAULT NULL,
  `chubanshe` varchar(255) DEFAULT NULL,
  `ISBN` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `price` double(10,2) DEFAULT '0.00',
  `picture` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `reserve` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `addtime` date DEFAULT NULL,
  `details` varchar(255) DEFAULT NULL,
  `condition` varchar(255) CHARACTER SET latin1 DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 书籍
-- ----------------------------
INSERT INTO `书籍` VALUES ('1', '撒野', '巫哲', '北京联合出版有限公司', '9787559620187', '45.00', 'image1', '526', '2020-12-03', '开 本：16开纸 张：胶版纸包 装：平装-胶订', '0');
INSERT INTO `书籍` VALUES ('2', '破云', '淮上', '江苏凤凰文艺出版社', '9787559436399', '49.80', 'image2', '356', '2020-12-03', '开 本：32开\r\n纸 张：胶版纸\r\n包 装：平装-胶订', '0');
INSERT INTO `书籍` VALUES ('3', '默读', 'Prist', '百花洲文艺出版社', '9787550025103', '45.00', 'image3', '426', '2020-12-01', '开 本：16开纸 张：胶版纸包 装：平装-胶订', '1');
INSERT INTO `书籍` VALUES ('4', '郭论', '郭德纲', '湖南文艺出版社', '9787540487850', '49.80', 'image4', '354', '2020-01-15', '开 本：16开纸 张：胶版纸包 装：平装-胶订', '1');
INSERT INTO `书籍` VALUES ('5', '邓小平时代', '(美) 傅高义著', '生活.读书.新知三联书店', '9787108041531', '88.00', 'image5', '143', '2020-07-29', '开 本：16开纸 张：胶版纸包 装：平装-胶订', '1');
INSERT INTO `书籍` VALUES ('6', '在野之学', '贺雪峰', '北京大学出版社', '9787301316221', '58.00', 'image6', '527', '2020-05-17', '开 本：32开纸 张：胶版纸包 装：平装-胶订', '2');
INSERT INTO `书籍` VALUES ('7', '陪孩子终身成长', '樊登', '中国友谊出版公司', '9787505748736', '59.00', 'image7', '542', '2020-09-24', '开 本：128开纸 张：胶版纸包 装：精装', '0');
INSERT INTO `书籍` VALUES ('8', '幸福的婚姻', '[美] 约翰戈特曼（John Gottman） 娜恩西尔弗（Nan Silver）', '浙江人民出版社', '9787213058417', '49.90', 'image8', '412', '2020-12-07', '开 本：16开纸 张：胶版纸包 装：平装-胶订', '0');
INSERT INTO `书籍` VALUES ('9', '答案之书', '保罗，酷威文化', '百花洲文艺出版社', '9787550017719', '38.00', 'image9', '284', '2020-07-03', '开 本：40开纸 张：轻型纸包 装：精装', '1');
INSERT INTO `书籍` VALUES ('10', '世界建筑大师图鉴', '[日] 大井隆弘 [日]市川纮司 [日] 吉本宪生 [日] 和田隆介，郝皓 译；凤凰空间', '江苏凤凰科学技术出版社', '9787571315054', '49.80', 'image10', '354', '2020-11-30', '开 本：32开纸 张：轻型纸包 装：平装-锁线胶订', '0');
INSERT INTO `书籍` VALUES ('11', 'labuladong的算法小抄', '付东来（@labuladong）', '电子工业出版社', '9787121399336', '99.00', 'image11', '157', '2020-12-01', '开 本：16开纸 张：胶版纸包 装：平装-胶订', '2');
INSERT INTO `书籍` VALUES ('12', '骨盆和骶髂关节功能解剖——手法操作指南', '(英) 约翰·吉本斯 (John Gibbons) 著 ; 朱毅, 王雪强, 李 长江主译', '北京科学技术出版社', '9787530497838', '168.00', 'image12', '451', '2020-10-21', '开 本：16开纸 张：铜版纸包 装：平装-胶订', '0');
