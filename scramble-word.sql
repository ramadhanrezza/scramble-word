/*
Navicat MySQL Data Transfer

Source Server         : __db_local
Source Server Version : 50627
Source Host           : localhost:3306
Source Database       : scramble-word

Target Server Type    : MYSQL
Target Server Version : 50627
File Encoding         : 65001

Date: 2016-04-15 20:23:09
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `sw_admin`
-- ----------------------------
DROP TABLE IF EXISTS `sw_admin`;
CREATE TABLE `sw_admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sw_admin
-- ----------------------------

-- ----------------------------
-- Table structure for `sw_category`
-- ----------------------------
DROP TABLE IF EXISTS `sw_category`;
CREATE TABLE `sw_category` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sw_category
-- ----------------------------
INSERT INTO `sw_category` VALUES ('1', 'animals', '2016-04-15 19:49:28');
INSERT INTO `sw_category` VALUES ('2', 'fruits', '2016-04-15 19:49:35');
INSERT INTO `sw_category` VALUES ('3', 'vegetables', '2016-04-15 19:49:43');

-- ----------------------------
-- Table structure for `sw_words`
-- ----------------------------
DROP TABLE IF EXISTS `sw_words`;
CREATE TABLE `sw_words` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `category_id` int(10) DEFAULT NULL,
  `word` varchar(250) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sw_words
-- ----------------------------
INSERT INTO `sw_words` VALUES ('1', '1', 'jerapah', '2016-04-15 20:07:01');
INSERT INTO `sw_words` VALUES ('2', '1', 'harimau', '2016-04-15 20:07:11');
INSERT INTO `sw_words` VALUES ('3', '1', 'kucing', '2016-04-15 20:07:25');
INSERT INTO `sw_words` VALUES ('4', '1', 'kambing', '2016-04-15 20:07:37');
INSERT INTO `sw_words` VALUES ('5', '1', 'kerbau', '2016-04-15 20:07:48');
