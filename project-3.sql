/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : dbproject

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2022-01-29 19:17:21
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tb_brand`
-- ----------------------------
DROP TABLE IF EXISTS `tb_brand`;
CREATE TABLE `tb_brand` (
  `brand_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสแบรนด์',
  `brand_name` varchar(255) DEFAULT NULL COMMENT 'ชื่อแบรนด์',
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COMMENT='ข้อมูลแบรนด์';

-- ----------------------------
-- Records of tb_brand
-- ----------------------------
INSERT INTO `tb_brand` VALUES ('1', 'b');
INSERT INTO `tb_brand` VALUES ('4', 'm');
INSERT INTO `tb_brand` VALUES ('5', 'm');
INSERT INTO `tb_brand` VALUES ('6', 'b');

-- ----------------------------
-- Table structure for `tb_category`
-- ----------------------------
DROP TABLE IF EXISTS `tb_category`;
CREATE TABLE `tb_category` (
  `category_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสประเภท',
  `category_name` varchar(255) DEFAULT NULL COMMENT 'ชื่อประเภท',
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COMMENT='ข้อมูลประเภท';

-- ----------------------------
-- Records of tb_category
-- ----------------------------
INSERT INTO `tb_category` VALUES ('1', 'กระเป๋าที่มีสายสะพายข้ามตัว');
INSERT INTO `tb_category` VALUES ('2', 'กระเป๋าทรงขนมจีบ');
INSERT INTO `tb_category` VALUES ('3', 'เด็ก');
INSERT INTO `tb_category` VALUES ('4', 'sn');

-- ----------------------------
-- Table structure for `tb_contact`
-- ----------------------------
DROP TABLE IF EXISTS `tb_contact`;
CREATE TABLE `tb_contact` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสการติดต่อ',
  `user_id` int(11) DEFAULT NULL COMMENT 'รหัสผู้ใช้งาน',
  `contact_member` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ชื่อ',
  `contact_email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'อีเมล',
  `contact_comment` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'แสดงความเห็น',
  `contact_datetime` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'วันที่',
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tb_contact
-- ----------------------------
INSERT INTO `tb_contact` VALUES ('18', null, 'อริสา', 'emmyreah3941@hotmail.com', 'aaaaaa', '2021-04-16 14:27:53');
INSERT INTO `tb_contact` VALUES ('19', null, 'ngtest', 'noomnook4g@hotmail.com', 'aa', '2021-04-16 14:36:15');
INSERT INTO `tb_contact` VALUES ('20', null, 'aaa', 'aaa', 'aaaa', '2021-04-16 14:36:20');
INSERT INTO `tb_contact` VALUES ('21', null, 'เทส', 'เทส', 'เเทส', '2021-05-13 14:16:42');
INSERT INTO `tb_contact` VALUES ('22', null, 'ทรงพล', 'beersongphon2010@gmail.com', 'test', '2022-01-08 23:00:42');
INSERT INTO `tb_contact` VALUES ('23', '2', 'ทรงพล', 'beersongphon2010@gmail.com', 'test', '2022-01-25 21:14:45');

-- ----------------------------
-- Table structure for `tb_img_product`
-- ----------------------------
DROP TABLE IF EXISTS `tb_img_product`;
CREATE TABLE `tb_img_product` (
  `img_pro_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสรูปภาพสินค้า',
  `img_product` varchar(150) DEFAULT NULL COMMENT 'รูปภาพสินค้า',
  `product_id` int(10) DEFAULT NULL COMMENT 'รหัสสินค้า',
  PRIMARY KEY (`img_pro_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `tb_img_product_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `tb_product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COMMENT='ข้อมูลรูปภาพสินค้า';

-- ----------------------------
-- Records of tb_img_product
-- ----------------------------
INSERT INTO `tb_img_product` VALUES ('7', '1649158935product-6.jpg', '3');
INSERT INTO `tb_img_product` VALUES ('8', '1642903393product-16.jpg', '6');
INSERT INTO `tb_img_product` VALUES ('16', '1652512439product-17.jpg', '4');
INSERT INTO `tb_img_product` VALUES ('19', '1643322273product-1.jpg', '1');
INSERT INTO `tb_img_product` VALUES ('20', '1648899248product-3.jpg', '1');
INSERT INTO `tb_img_product` VALUES ('21', '1643016162product-2.jpg', '1');
INSERT INTO `tb_img_product` VALUES ('28', '1643260664product-49.jpg', '9');
INSERT INTO `tb_img_product` VALUES ('29', '1645097440product-48.jpg', '9');
INSERT INTO `tb_img_product` VALUES ('30', '1650111485product-47.jpg', '9');
INSERT INTO `tb_img_product` VALUES ('31', '1649104113product-4.jpg', '2');
INSERT INTO `tb_img_product` VALUES ('32', '1651008419product-5.jpg', '2');
INSERT INTO `tb_img_product` VALUES ('33', '1642741599product-6.jpg', '2');
INSERT INTO `tb_img_product` VALUES ('40', '1650973349product-44.jpg', '5');
INSERT INTO `tb_img_product` VALUES ('41', '1650913742product-46.jpg', '5');

-- ----------------------------
-- Table structure for `tb_order`
-- ----------------------------
DROP TABLE IF EXISTS `tb_order`;
CREATE TABLE `tb_order` (
  `order_id` int(2) NOT NULL AUTO_INCREMENT COMMENT 'รหัสการสั่งซื้อ',
  `user_id` int(2) DEFAULT NULL COMMENT 'รหัสผู้ใช้งาน',
  `order_address` text DEFAULT NULL COMMENT 'ที่อยู่',
  `order_tel` varchar(10) DEFAULT NULL COMMENT 'เบอร์โทรศัพท์',
  `order_email` varchar(30) DEFAULT NULL COMMENT 'อีเมล',
  `order_date` date DEFAULT NULL COMMENT 'วันที่',
  `order_total` varchar(50) DEFAULT NULL COMMENT 'ราคารวม',
  `status_id` int(10) DEFAULT NULL COMMENT 'รหัสสถานะ',
  PRIMARY KEY (`order_id`),
  KEY `user_id` (`user_id`),
  KEY `status_id` (`status_id`),
  CONSTRAINT `tb_order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tb_order_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `tb_status` (`status_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COMMENT='ข้อมูลการสั่งซื้อ';

-- ----------------------------
-- Records of tb_order
-- ----------------------------
INSERT INTO `tb_order` VALUES ('1', '2', '185/8 ถ.สุทธิวาตวิถี', '0827183510', 'beersongphon2010@gmail.com', '2022-01-14', '1220', '1');
INSERT INTO `tb_order` VALUES ('2', '2', '185/8 ถ.สุทธิวาตวิถี', '0827183510', 'beersongphon2010@gmail.com', '2022-01-15', '1220', '1');
INSERT INTO `tb_order` VALUES ('3', '2', '185/8 ถ.สุทธิวาตวิถี', '0827183510', 'beersongphon2010@gmail.com', '2022-01-15', '1220', '1');
INSERT INTO `tb_order` VALUES ('4', '2', '185/8 ถ.สุทธิวาตวิถี', '0827183510', 'beersongphon2010@gmail.com', '2022-01-15', '1220', '1');
INSERT INTO `tb_order` VALUES ('5', '2', '185/8 ถ.สุทธิวาตวิถี', '0827183510', 'beersongphon2010@gmail.com', '2022-01-15', '4029', '1');
INSERT INTO `tb_order` VALUES ('6', '2', null, null, null, '2022-01-15', '5250', '1');
INSERT INTO `tb_order` VALUES ('7', '2', null, null, null, '2022-01-15', '5250', '1');
INSERT INTO `tb_order` VALUES ('8', '2', null, '0827183510', 'beersongphon2010@gmail.com', '2022-01-15', '122', '1');
INSERT INTO `tb_order` VALUES ('9', '2', '185/8 ถ.สุทธิวาตวิถี', '0827183510', 'beersongphon2010@gmail.com', '2022-01-15', '122', '1');
INSERT INTO `tb_order` VALUES ('10', '2', '185/8 ถ.สุทธิวาตวิถี', '0827183510', 'beersongphon2010@gmail.com', '2022-01-15', '122', '1');
INSERT INTO `tb_order` VALUES ('11', '2', '185/8 ถ.สุทธิวาตวิถี', '0827183510', 'beersongphon2010@gmail.com', '2022-01-15', '122', '1');
INSERT INTO `tb_order` VALUES ('12', '2', '185/8 ถ.สุทธิวาตวิถี', '0827183510', 'beersongphon2010@gmail.com', '2022-01-15', '122', '1');
INSERT INTO `tb_order` VALUES ('13', '2', '185/8 ถ.สุทธิวาตวิถี', '0827183510', 'beersongphon2010@gmail.com', '2022-01-15', '4029', '1');
INSERT INTO `tb_order` VALUES ('14', '2', '185/8 ถ.สุทธิวาตวิถี', '0827183510', 'beersongphon2010@gmail.com', '2022-01-15', '1221', '1');
INSERT INTO `tb_order` VALUES ('15', '2', '185/8 ถ.สุทธิวาตวิถี', '0827183510', 'beersongphon2010@gmail.com', '2022-01-16', '1343', '1');

-- ----------------------------
-- Table structure for `tb_order_detail`
-- ----------------------------
DROP TABLE IF EXISTS `tb_order_detail`;
CREATE TABLE `tb_order_detail` (
  `order_detail_id` int(2) NOT NULL AUTO_INCREMENT COMMENT 'รหัสรายละเอียดการสั่งซื้อ',
  `order_id` int(2) DEFAULT NULL COMMENT 'รหัสการสั่งซื้อ',
  `product_id` int(10) DEFAULT NULL COMMENT 'รหัสสินค้า',
  `order_price` varchar(30) DEFAULT '' COMMENT 'ราคา',
  `order_quantity` varchar(30) DEFAULT '' COMMENT 'จำนวน',
  PRIMARY KEY (`order_detail_id`),
  KEY `order_id` (`order_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `tb_order_detail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `tb_order` (`order_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tb_order_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `tb_product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COMMENT='ข้อมูลรายละเอียดการสั่งซื้อ';

-- ----------------------------
-- Records of tb_order_detail
-- ----------------------------
INSERT INTO `tb_order_detail` VALUES ('1', '4', '1', '122', '10');
INSERT INTO `tb_order_detail` VALUES ('2', '10', '1', '122', '1');
INSERT INTO `tb_order_detail` VALUES ('3', '11', '1', '122', '1');
INSERT INTO `tb_order_detail` VALUES ('4', '12', '1', '122', '1');
INSERT INTO `tb_order_detail` VALUES ('5', '13', '1', '122', '3');
INSERT INTO `tb_order_detail` VALUES ('6', '13', '2', '1221', '3');
INSERT INTO `tb_order_detail` VALUES ('7', '14', '2', '1221', '1');
INSERT INTO `tb_order_detail` VALUES ('8', '15', '1', '122', '1');
INSERT INTO `tb_order_detail` VALUES ('9', '15', '2', '1221', '1');

-- ----------------------------
-- Table structure for `tb_permission`
-- ----------------------------
DROP TABLE IF EXISTS `tb_permission`;
CREATE TABLE `tb_permission` (
  `permission_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสสิทธิ์การใช้งาน',
  `permission_name` varchar(50) NOT NULL COMMENT 'ชื่อสิทธิ์การใช้งาน',
  PRIMARY KEY (`permission_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COMMENT='ข้อมูลสิทธิ์การใช้งาน';

-- ----------------------------
-- Records of tb_permission
-- ----------------------------
INSERT INTO `tb_permission` VALUES ('1', 'A');
INSERT INTO `tb_permission` VALUES ('2', 'S');
INSERT INTO `tb_permission` VALUES ('3', 'U');

-- ----------------------------
-- Table structure for `tb_product`
-- ----------------------------
DROP TABLE IF EXISTS `tb_product`;
CREATE TABLE `tb_product` (
  `product_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสสินค้า',
  `product_name` varchar(255) DEFAULT NULL COMMENT 'ชื่อสินค้า',
  `brand_id` int(10) DEFAULT NULL COMMENT 'รหัสแบรนด์',
  `category_id` int(10) DEFAULT NULL COMMENT 'รหัสประเภท',
  `product_qty` int(10) DEFAULT NULL COMMENT 'จำนวน',
  `product_price` int(10) DEFAULT NULL COMMENT 'ราคา',
  `product_description` text DEFAULT NULL COMMENT 'รายละเอียด',
  PRIMARY KEY (`product_id`),
  KEY `brand_id` (`brand_id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `tb_product_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `tb_brand` (`brand_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tb_product_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `tb_category` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COMMENT='ข้อมูลสินค้า';

-- ----------------------------
-- Records of tb_product
-- ----------------------------
INSERT INTO `tb_product` VALUES ('1', 'ทรงพล', null, null, '10', '122', '12214545454');
INSERT INTO `tb_product` VALUES ('2', 'win', '1', '1', '10', '1221', '12214545454');
INSERT INTO `tb_product` VALUES ('3', 'ทรงพล', null, null, '10', '1221', '12214545454');
INSERT INTO `tb_product` VALUES ('4', 'ทรงพล', null, null, '0', '120', '12214545454');
INSERT INTO `tb_product` VALUES ('5', 'ทรงพล', '1', '1', '5', '1221', '12214545454');
INSERT INTO `tb_product` VALUES ('6', 'ท', null, null, '212', '100', '1221211');
INSERT INTO `tb_product` VALUES ('9', 'ท', '1', '1', '50', '100', '1221211');

-- ----------------------------
-- Table structure for `tb_status`
-- ----------------------------
DROP TABLE IF EXISTS `tb_status`;
CREATE TABLE `tb_status` (
  `status_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสสถานะ',
  `status` varchar(255) NOT NULL COMMENT 'สถานะ',
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COMMENT='ข้อมูลสถานะ';

-- ----------------------------
-- Records of tb_status
-- ----------------------------
INSERT INTO `tb_status` VALUES ('1', 'ยังไม่ชำระ');
INSERT INTO `tb_status` VALUES ('2', 'ชำระแล้ว');

-- ----------------------------
-- Table structure for `tb_user`
-- ----------------------------
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสผู้ใช้งาน',
  `user_firstname` varchar(200) DEFAULT NULL COMMENT 'ชื่อ',
  `user_lastname` varchar(200) DEFAULT NULL COMMENT 'นามสกุล',
  `user_address` varchar(255) DEFAULT NULL COMMENT 'ที่อยู่',
  `user_tel` varchar(20) DEFAULT NULL COMMENT 'เบอร์โทรศัพท์',
  `user_email` varchar(30) DEFAULT NULL COMMENT 'อีเมล',
  `user_sex` int(11) DEFAULT NULL COMMENT 'เพศ',
  `user_username` varchar(100) DEFAULT NULL COMMENT 'ชื่อผู้ใช้งาน',
  `user_password` varchar(100) DEFAULT NULL COMMENT 'รหัสผ่าน',
  `user_time_progress` int(11) DEFAULT NULL COMMENT 'เวลา',
  `permission_id` int(10) DEFAULT NULL COMMENT 'รหัสสิทธิ์การใช้งาน',
  `user_datetime` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'วันที่',
  PRIMARY KEY (`user_id`),
  KEY `permission_id` (`permission_id`),
  CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`permission_id`) REFERENCES `tb_permission` (`permission_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COMMENT='ข้อมูลผู้ใช้งาน';

-- ----------------------------
-- Records of tb_user
-- ----------------------------
INSERT INTO `tb_user` VALUES ('1', 'Administrator', 'Administrator', '1234567890', '0999999999', null, '1', 'admin', 'e807f1fcf82d132f9bb018ca6738a19f', '0', '1', '2021-03-09 18:37:11');
INSERT INTO `tb_user` VALUES ('2', 'ทรงพล', 'คุ้มคำ', '1749900588454', '0827183510', null, '1', 'beer', 'e807f1fcf82d132f9bb018ca6738a19f', '0', '3', '2021-12-27 18:18:15');
INSERT INTO `tb_user` VALUES ('35', 'ทรงพล', 'คุ้มคำ', '185/8', '0827183510', 'beersongphon2010@gmail.com', '0', 'beersongphon', 'e807f1fcf82d132f9bb018ca6738a19f', '0', '2', '2022-01-23 18:05:19');
