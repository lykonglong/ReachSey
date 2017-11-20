/*
Navicat MySQL Data Transfer

Source Server         : Laravel
Source Server Version : 100203
Source Host           : localhost:3306
Source Database       : reachsey

Target Server Type    : MYSQL
Target Server Version : 100203
File Encoding         : 65001

Date: 2017-11-19 21:53:27
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `cat_id` int(20) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES ('1', 'Tutorials');
INSERT INTO `categories` VALUES ('2', 'Software');

-- ----------------------------
-- Table structure for posts
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `post_id` int(20) NOT NULL AUTO_INCREMENT,
  `sub_cat_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_image` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_view` int(255) NOT NULL,
  `post_desc` text NOT NULL,
  `post_tage` varchar(255) NOT NULL,
  `post_link` varchar(255) NOT NULL,
  `post_suggestion` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`post_id`),
  KEY `FK_subcat` (`sub_cat_id`),
  KEY `FK_user` (`user_id`),
  CONSTRAINT `FK_subcat` FOREIGN KEY (`sub_cat_id`) REFERENCES `sub_categories` (`sub_cat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of posts
-- ----------------------------

-- ----------------------------
-- Table structure for post_img
-- ----------------------------
DROP TABLE IF EXISTS `post_img`;
CREATE TABLE `post_img` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of post_img
-- ----------------------------

-- ----------------------------
-- Table structure for sub_categories
-- ----------------------------
DROP TABLE IF EXISTS `sub_categories`;
CREATE TABLE `sub_categories` (
  `sub_cat_id` int(20) NOT NULL AUTO_INCREMENT,
  `cat_id` int(20) NOT NULL,
  `sub_cat_name` varchar(255) NOT NULL,
  PRIMARY KEY (`sub_cat_id`),
  KEY `RK_Cat` (`cat_id`),
  CONSTRAINT `RK_Cat` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`cat_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sub_categories
-- ----------------------------
INSERT INTO `sub_categories` VALUES ('1', '2', 'Design');
INSERT INTO `sub_categories` VALUES ('2', '2', 'Graphic');
INSERT INTO `sub_categories` VALUES ('3', '1', '3D Animation');
INSERT INTO `sub_categories` VALUES ('4', '1', 'Programming');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(20) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
SET FOREIGN_KEY_CHECKS=1;
