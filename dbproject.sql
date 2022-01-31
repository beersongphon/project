/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : dbproject

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2022-01-20 16:04:36
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tb_category`
-- ----------------------------
DROP TABLE IF EXISTS `tb_category`;
CREATE TABLE `tb_category` (
  `category_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสประเภท',
  `category_name` varchar(255) NOT NULL COMMENT 'ชื่อประเภท',
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COMMENT='ข้อมูลประเภท';

-- ----------------------------
-- Records of tb_category
-- ----------------------------
INSERT INTO `tb_category` VALUES ('1', 'กระเป๋าที่มีสายสะพายข้ามตัว');
INSERT INTO `tb_category` VALUES ('2', 'กระเป๋าทรงขนมจีบ');
INSERT INTO `tb_category` VALUES ('3', 'เด็ก');

-- ----------------------------
-- Table structure for `tb_contact`
-- ----------------------------
DROP TABLE IF EXISTS `tb_contact`;
CREATE TABLE `tb_contact` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสการติดต่อ',
  `contact_member` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '' COMMENT 'ชื่อ',
  `contact_email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '' COMMENT 'อีเมล',
  `contact_comment` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'แสดงความเห็น',
  `contact_datetime` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'วันที่',
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tb_contact
-- ----------------------------
INSERT INTO `tb_contact` VALUES ('18', 'อริสา', 'emmyreah3941@hotmail.com', 'aaaaaa', '2021-04-16 14:27:53');
INSERT INTO `tb_contact` VALUES ('19', 'ngtest', 'noomnook4g@hotmail.com', 'aa', '2021-04-16 14:36:15');
INSERT INTO `tb_contact` VALUES ('20', 'aaa', 'aaa', 'aaaa', '2021-04-16 14:36:20');
INSERT INTO `tb_contact` VALUES ('21', 'เทส', 'เทส', 'เเทส', '2021-05-13 14:16:42');
INSERT INTO `tb_contact` VALUES ('22', 'ทรงพล', 'beersongphon2010@gmail.com', 'test', '2022-01-08 23:00:42');

-- ----------------------------
-- Table structure for `tb_img_product`
-- ----------------------------
DROP TABLE IF EXISTS `tb_img_product`;
CREATE TABLE `tb_img_product` (
  `img_pro_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสรูปภาพสินค้า',
  `img_product` varchar(150) NOT NULL COMMENT 'รูปภาพสินค้า',
  `product_id` int(10) NOT NULL COMMENT 'รหัสสินค้า',
  PRIMARY KEY (`img_pro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COMMENT='ข้อมูลรูปภาพสินค้า';

-- ----------------------------
-- Records of tb_img_product
-- ----------------------------
INSERT INTO `tb_img_product` VALUES ('4', '1649104113product-4.jpg', '2');
INSERT INTO `tb_img_product` VALUES ('5', '1651008419product-5.jpg', '2');
INSERT INTO `tb_img_product` VALUES ('6', '1642741599product-6.jpg', '2');
INSERT INTO `tb_img_product` VALUES ('7', '1649158935product-6.jpg', '3');
INSERT INTO `tb_img_product` VALUES ('8', '1642903393product-16.jpg', '6');
INSERT INTO `tb_img_product` VALUES ('12', '1643322273product-1.jpg', '1');
INSERT INTO `tb_img_product` VALUES ('13', '1648899248product-3.jpg', '1');
INSERT INTO `tb_img_product` VALUES ('14', '1643016162product-2.jpg', '1');
INSERT INTO `tb_img_product` VALUES ('16', '1652512439product-17.jpg', '4');

-- ----------------------------
-- Table structure for `tb_order`
-- ----------------------------
DROP TABLE IF EXISTS `tb_order`;
CREATE TABLE `tb_order` (
  `order_id` int(2) NOT NULL AUTO_INCREMENT COMMENT 'รหัสการสั่งซื้อ',
  `user_id` int(2) DEFAULT NULL COMMENT 'รหัสผู้ใช้งาน',
  `order_address` text DEFAULT NULL COMMENT 'ที่อยู่',
  `order_tel` varchar(10) NOT NULL COMMENT 'เบอร์โทรศัพท์',
  `order_email` varchar(30) NOT NULL COMMENT 'อีเมล',
  `creation_date` date DEFAULT NULL COMMENT 'วันที่',
  `order_status` varchar(30) DEFAULT '' COMMENT 'สถานะ',
  `order_total` varchar(50) NOT NULL COMMENT 'ราคารวม',
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COMMENT='ข้อมูลการสั่งซื้อ';

-- ----------------------------
-- Records of tb_order
-- ----------------------------
INSERT INTO `tb_order` VALUES ('1', '30', '185/8 ถ.สุทธิวาตวิถี', '0827183510', 'beersongphon2010@gmail.com', '2022-01-15', 'pending', '1220');
INSERT INTO `tb_order` VALUES ('2', '30', '185/8 ถ.สุทธิวาตวิถี', '0827183510', 'beersongphon2010@gmail.com', '2022-01-15', 'pending', '1220');
INSERT INTO `tb_order` VALUES ('3', '30', '185/8 ถ.สุทธิวาตวิถี', '0827183510', 'beersongphon2010@gmail.com', '2022-01-15', 'pending', '1220');
INSERT INTO `tb_order` VALUES ('4', '30', '185/8 ถ.สุทธิวาตวิถี', '0827183510', 'beersongphon2010@gmail.com', '2022-01-15', 'pending', '1220');
INSERT INTO `tb_order` VALUES ('5', '30', '185/8 ถ.สุทธิวาตวิถี', '0827183510', 'beersongphon2010@gmail.com', '2022-01-15', 'pending', '4029');
INSERT INTO `tb_order` VALUES ('6', '30', '', '', '', '2022-01-15', 'pending', '5250');
INSERT INTO `tb_order` VALUES ('7', '30', '', '', '', '2022-01-15', 'pending', '5250');
INSERT INTO `tb_order` VALUES ('8', '30', '', '0827183510', 'beersongphon2010@gmail.com', '2022-01-15', 'pending', '122');
INSERT INTO `tb_order` VALUES ('9', '30', '185/8 ถ.สุทธิวาตวิถี', '0827183510', 'beersongphon2010@gmail.com', '2022-01-15', 'pending', '122');
INSERT INTO `tb_order` VALUES ('10', '30', '185/8 ถ.สุทธิวาตวิถี', '0827183510', 'beersongphon2010@gmail.com', '2022-01-15', 'pending', '122');
INSERT INTO `tb_order` VALUES ('11', '30', '185/8 ถ.สุทธิวาตวิถี', '0827183510', 'beersongphon2010@gmail.com', '2022-01-15', 'pending', '122');
INSERT INTO `tb_order` VALUES ('12', '30', '185/8 ถ.สุทธิวาตวิถี', '0827183510', 'beersongphon2010@gmail.com', '2022-01-15', 'pending', '122');
INSERT INTO `tb_order` VALUES ('13', '30', '185/8 ถ.สุทธิวาตวิถี', '0827183510', 'beersongphon2010@gmail.com', '2022-01-15', 'pending', '4029');
INSERT INTO `tb_order` VALUES ('14', '30', '185/8 ถ.สุทธิวาตวิถี', '0827183510', 'beersongphon2010@gmail.com', '2022-01-15', 'pending', '1221');
INSERT INTO `tb_order` VALUES ('15', '30', '185/8 ถ.สุทธิวาตวิถี', '0827183510', 'beersongphon2010@gmail.com', '2022-01-16', 'pending', '1343');

-- ----------------------------
-- Table structure for `tb_order_detail`
-- ----------------------------
DROP TABLE IF EXISTS `tb_order_detail`;
CREATE TABLE `tb_order_detail` (
  `id` int(2) NOT NULL AUTO_INCREMENT COMMENT 'รหัสรายละเอียดการสั่งซื้อ',
  `order_id` int(2) NOT NULL COMMENT 'รหัสการสั่งซื้อ',
  `product_id` int(10) DEFAULT NULL COMMENT 'รหัสสินค้า',
  `order_price` varchar(30) DEFAULT '' COMMENT 'ราคา',
  `order_quantity` varchar(30) DEFAULT '' COMMENT 'จำนวน',
  PRIMARY KEY (`id`)
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
-- Table structure for `tb_product`
-- ----------------------------
DROP TABLE IF EXISTS `tb_product`;
CREATE TABLE `tb_product` (
  `product_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสสินค้า',
  `product_img` varchar(255) NOT NULL COMMENT 'รูปภาพสินค้า',
  `product_name` varchar(255) NOT NULL COMMENT 'ชื่อสินค้า',
  `product_qty` int(10) NOT NULL COMMENT 'จำนวน',
  `product_price` int(10) NOT NULL COMMENT 'ราคา',
  `product_description` text NOT NULL COMMENT 'รายละเอียด',
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COMMENT='ข้อมูลสินค้า';

-- ----------------------------
-- Records of tb_product
-- ----------------------------
INSERT INTO `tb_product` VALUES ('1', '1649241497product-1.jpg', 'ทรงพล', '10', '122', '12214545454');
INSERT INTO `tb_product` VALUES ('2', '1650185999product-4.jpg', 'win', '10', '1221', '12214545454');
INSERT INTO `tb_product` VALUES ('3', 'product-3.jpg', 'ทรงพล', '10', '1221', '12214545454');
INSERT INTO `tb_product` VALUES ('4', 'product-4.jpg', 'ทรงพล', '0', '120', '12214545454');
INSERT INTO `tb_product` VALUES ('5', 'product-5.jpg', 'ทรงพล', '0', '1221', '12214545454');
INSERT INTO `tb_product` VALUES ('6', '1651009574product-22.jpg', 'ท', '212', '100', '1221211');

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
INSERT INTO `tb_status` VALUES ('1', 'Waiting');
INSERT INTO `tb_status` VALUES ('2', 'Success');

-- ----------------------------
-- Table structure for `tb_user`
-- ----------------------------
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสผู้ใช้งาน',
  `user_username` varchar(100) NOT NULL COMMENT 'ชื่อผู้ใช้งาน',
  `user_password` varchar(100) NOT NULL COMMENT 'รหัสผ่าน',
  `user_firstname` varchar(200) NOT NULL COMMENT 'ชื่อ',
  `user_lastname` varchar(200) NOT NULL COMMENT 'นามสกุล',
  `user_address` varchar(255) NOT NULL COMMENT 'ที่อยู่',
  `user_tel` varchar(20) NOT NULL COMMENT 'เบอร์โทรศัพท์',
  `user_sex` int(11) DEFAULT NULL COMMENT 'เพศ',
  `user_time_progress` int(11) NOT NULL COMMENT 'เวลา',
  `user_permission` varchar(10) NOT NULL COMMENT 'สิทธิ์การใช้งาน',
  `user_datetime` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'วันที่',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COMMENT='ข้อมูลผู้ใช้งาน';

-- ----------------------------
-- Records of tb_user
-- ----------------------------
INSERT INTO `tb_user` VALUES ('1', 'admin', 'e807f1fcf82d132f9bb018ca6738a19f', 'Administrator', 'Administrator', '1234567890', '0999999999', '0', '0', 'A', '2021-03-09 18:37:11');
INSERT INTO `tb_user` VALUES ('10', 'arisa', '81dc9bdb52d04dc20036dbd8313ed055', 'arisa', 'jiemsirikarn', '1660200088770', '0961619918', '0', '4', 'U', '2021-03-28 23:14:10');
INSERT INTO `tb_user` VALUES ('11', 'Fern', 'e807f1fcf82d132f9bb018ca6738a19f\r\n\r\n', 'Preeyanut', 'Wannapruk', '1101500973391', '0902536806', '0', '5', 'S', '2021-03-28 23:14:16');
INSERT INTO `tb_user` VALUES ('12', 'aa', '4124bc0a9335c27f086f24ba207a4912', 'aa', 'Aa', '12345678', '123', '0', '11', 'U', '2021-03-29 01:18:12');
INSERT INTO `tb_user` VALUES ('14', 'Patipan', '76678fbae686feb3c8b48dae792787e1', 'ปฏิภาณ', 'หงษ์ทอง', '1234567890123', '0969821019', '1', '10', 'U', '2021-03-29 14:52:27');
INSERT INTO `tb_user` VALUES ('18', 'Patipan', 'fdd2ff799d38ea5438822de2ebd8fcfc', 'Patipan', 'Hongthong', '1234567890000', '0880973510', '1', '0', 'U', '2021-04-15 22:27:05');
INSERT INTO `tb_user` VALUES ('19', 'Fern1', '827ccb0eea8a706c4c34a16891f84e7b', 'Fern', 'Fernnn', '1111111111111', '0902536806', '0', '0', 'S', '2021-04-15 23:20:22');
INSERT INTO `tb_user` VALUES ('20', 'arisa', '9c1b9c7b90b56b5a3cdbd7fe0b4f9450', 'Arisa', 'Jiemsirikarn', '1660200088771', '0961619919', '0', '0', 'S', '2021-04-16 14:11:56');
INSERT INTO `tb_user` VALUES ('26', 'test.t', '202cb962ac59075b964b07152d234b70', 'กกก', 'กกก', '123', '123', '0', '0', 'S', '2021-04-30 22:15:15');
INSERT INTO `tb_user` VALUES ('27', 'cc', 'e0323a9039add2978bf5b49550572c7c', 'cc', 'cc', '12345', '12345', '0', '0', 'U', '2021-05-07 18:31:04');
INSERT INTO `tb_user` VALUES ('28', 'ww', 'ad57484016654da87125db86f4227ea3', 'ww', 'ww', '1234', '1234', '0', '0', 'S', '2021-05-07 18:43:12');
INSERT INTO `tb_user` VALUES ('29', 'preeyanut', '56daea4cd7cd65c913426631d75b5bbe', 'aaaa', 'aaaaa', '1111111111111', '0902536806', '0', '12', 'U', '2021-05-13 11:17:34');
INSERT INTO `tb_user` VALUES ('30', 'beer', 'e807f1fcf82d132f9bb018ca6738a19f', 'ทรงพล', 'คุ้มคำ', '1749900588454', '0827183510', '1', '0', 'U', '2021-12-27 18:18:15');
INSERT INTO `tb_user` VALUES ('31', 'beersongphon', 'e807f1fcf82d132f9bb018ca6738a19f', 'ทรงพล', 'คุ้มคำ', '1749900588454', '0827183510', '1', '0', 'U', '2021-12-30 23:21:32');
INSERT INTO `tb_user` VALUES ('32', 'beersongphon2010', 'e807f1fcf82d132f9bb018ca6738a19f', 'ทรงพล', 'คุ้มคำ', '185/8', '0827183510', '1', '0', 'U', '2022-01-12 18:16:37');
