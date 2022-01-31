-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2022 at 11:16 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_brand`
--

CREATE TABLE `tb_brand` (
  `brand_id` int(10) NOT NULL COMMENT 'รหัสแบรนด์',
  `brand_name` varchar(255) DEFAULT NULL COMMENT 'ชื่อแบรนด์'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='ข้อมูลแบรนด์';

-- --------------------------------------------------------

--
-- Table structure for table `tb_category`
--

CREATE TABLE `tb_category` (
  `category_id` int(10) NOT NULL COMMENT 'รหัสประเภท',
  `category_name` varchar(255) DEFAULT NULL COMMENT 'ชื่อประเภท'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='ข้อมูลประเภท';

--
-- Dumping data for table `tb_category`
--

INSERT INTO `tb_category` (`category_id`, `category_name`) VALUES
(1, 'กระเป๋าที่มีสายสะพายข้ามตัว'),
(2, 'กระเป๋าทรงขนมจีบ'),
(3, 'เด็ก');

-- --------------------------------------------------------

--
-- Table structure for table `tb_contact`
--

CREATE TABLE `tb_contact` (
  `contact_id` int(11) NOT NULL COMMENT 'รหัสการติดต่อ',
  `contact_member` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '' COMMENT 'ชื่อ',
  `contact_email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '' COMMENT 'อีเมล',
  `contact_comment` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'แสดงความเห็น',
  `contact_datetime` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'วันที่'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_contact`
--

INSERT INTO `tb_contact` (`contact_id`, `contact_member`, `contact_email`, `contact_comment`, `contact_datetime`) VALUES
(18, 'อริสา', 'emmyreah3941@hotmail.com', 'aaaaaa', '2021-04-16 14:27:53'),
(19, 'ngtest', 'noomnook4g@hotmail.com', 'aa', '2021-04-16 14:36:15'),
(20, 'aaa', 'aaa', 'aaaa', '2021-04-16 14:36:20'),
(21, 'เทส', 'เทส', 'เเทส', '2021-05-13 14:16:42'),
(22, 'ทรงพล', 'beersongphon2010@gmail.com', 'test', '2022-01-08 23:00:42');

-- --------------------------------------------------------

--
-- Table structure for table `tb_img_product`
--

CREATE TABLE `tb_img_product` (
  `img_pro_id` int(10) NOT NULL COMMENT 'รหัสรูปภาพสินค้า',
  `img_product` varchar(150) DEFAULT NULL COMMENT 'รูปภาพสินค้า',
  `product_id` int(10) DEFAULT NULL COMMENT 'รหัสสินค้า'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='ข้อมูลรูปภาพสินค้า';

--
-- Dumping data for table `tb_img_product`
--

INSERT INTO `tb_img_product` (`img_pro_id`, `img_product`, `product_id`) VALUES
(4, '1649104113product-4.jpg', 2),
(5, '1651008419product-5.jpg', 2),
(6, '1642741599product-6.jpg', 2),
(7, '1649158935product-6.jpg', 3),
(8, '1642903393product-16.jpg', 6),
(12, '1643322273product-1.jpg', 1),
(13, '1648899248product-3.jpg', 1),
(14, '1643016162product-2.jpg', 1),
(16, '1652512439product-17.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `order_id` int(2) NOT NULL COMMENT 'รหัสการสั่งซื้อ',
  `user_id` int(2) DEFAULT NULL COMMENT 'รหัสผู้ใช้งาน',
  `order_address` text DEFAULT NULL COMMENT 'ที่อยู่',
  `order_tel` varchar(10) DEFAULT NULL COMMENT 'เบอร์โทรศัพท์',
  `order_email` varchar(30) DEFAULT NULL COMMENT 'อีเมล',
  `order_date` date DEFAULT NULL COMMENT 'วันที่',
  `order_total` varchar(50) DEFAULT NULL COMMENT 'ราคารวม',
  `status_id` int(10) DEFAULT NULL COMMENT 'รหัสสถานะ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='ข้อมูลการสั่งซื้อ';

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`order_id`, `user_id`, `order_address`, `order_tel`, `order_email`, `order_date`, `order_total`, `status_id`) VALUES
(1, 2, '185/8 ถ.สุทธิวาตวิถี', '0827183510', 'beersongphon2010@gmail.com', '2022-01-15', '1220', 1),
(2, 2, '185/8 ถ.สุทธิวาตวิถี', '0827183510', 'beersongphon2010@gmail.com', '2022-01-15', '1220', 1),
(3, 2, '185/8 ถ.สุทธิวาตวิถี', '0827183510', 'beersongphon2010@gmail.com', '2022-01-15', '1220', 1),
(4, 2, '185/8 ถ.สุทธิวาตวิถี', '0827183510', 'beersongphon2010@gmail.com', '2022-01-15', '1220', 1),
(5, 2, '185/8 ถ.สุทธิวาตวิถี', '0827183510', 'beersongphon2010@gmail.com', '2022-01-15', '4029', 1),
(6, 2, NULL, NULL, NULL, '2022-01-15', '5250', 1),
(7, 2, NULL, NULL, NULL, '2022-01-15', '5250', 1),
(8, 2, NULL, '0827183510', 'beersongphon2010@gmail.com', '2022-01-15', '122', 1),
(9, 2, '185/8 ถ.สุทธิวาตวิถี', '0827183510', 'beersongphon2010@gmail.com', '2022-01-15', '122', 1),
(10, 2, '185/8 ถ.สุทธิวาตวิถี', '0827183510', 'beersongphon2010@gmail.com', '2022-01-15', '122', 1),
(11, 2, '185/8 ถ.สุทธิวาตวิถี', '0827183510', 'beersongphon2010@gmail.com', '2022-01-15', '122', 1),
(12, 2, '185/8 ถ.สุทธิวาตวิถี', '0827183510', 'beersongphon2010@gmail.com', '2022-01-15', '122', 1),
(13, 2, '185/8 ถ.สุทธิวาตวิถี', '0827183510', 'beersongphon2010@gmail.com', '2022-01-15', '4029', 1),
(14, 2, '185/8 ถ.สุทธิวาตวิถี', '0827183510', 'beersongphon2010@gmail.com', '2022-01-15', '1221', 1),
(15, 2, '185/8 ถ.สุทธิวาตวิถี', '0827183510', 'beersongphon2010@gmail.com', '2022-01-16', '1343', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_order_detail`
--

CREATE TABLE `tb_order_detail` (
  `order_detail_id` int(2) NOT NULL COMMENT 'รหัสรายละเอียดการสั่งซื้อ',
  `order_id` int(2) DEFAULT NULL COMMENT 'รหัสการสั่งซื้อ',
  `product_id` int(10) DEFAULT NULL COMMENT 'รหัสสินค้า',
  `order_price` varchar(30) DEFAULT '' COMMENT 'ราคา',
  `order_quantity` varchar(30) DEFAULT '' COMMENT 'จำนวน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='ข้อมูลรายละเอียดการสั่งซื้อ';

--
-- Dumping data for table `tb_order_detail`
--

INSERT INTO `tb_order_detail` (`order_detail_id`, `order_id`, `product_id`, `order_price`, `order_quantity`) VALUES
(1, 4, 1, '122', '10'),
(2, 10, 1, '122', '1'),
(3, 11, 1, '122', '1'),
(4, 12, 1, '122', '1'),
(5, 13, 1, '122', '3'),
(6, 13, 2, '1221', '3'),
(7, 14, 2, '1221', '1'),
(8, 15, 1, '122', '1'),
(9, 15, 2, '1221', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_permission`
--

CREATE TABLE `tb_permission` (
  `permission_id` int(10) NOT NULL COMMENT 'รหัสสิทธิ์การใช้งาน',
  `permission_name` varchar(50) NOT NULL COMMENT 'ชื่อสิทธิ์การใช้งาน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='ข้อมูลสิทธิ์การใช้งาน';

--
-- Dumping data for table `tb_permission`
--

INSERT INTO `tb_permission` (`permission_id`, `permission_name`) VALUES
(1, 'A'),
(2, 'S'),
(3, 'U');

-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
--

CREATE TABLE `tb_product` (
  `product_id` int(10) NOT NULL COMMENT 'รหัสสินค้า',
  `product_name` varchar(255) DEFAULT NULL COMMENT 'ชื่อสินค้า',
  `brand_id` int(10) DEFAULT NULL COMMENT 'รหัสแบรนด์',
  `category_id` int(10) DEFAULT NULL COMMENT 'รหัสประเภท',
  `product_qty` int(10) DEFAULT NULL COMMENT 'จำนวน',
  `product_price` int(10) DEFAULT NULL COMMENT 'ราคา',
  `product_description` text DEFAULT NULL COMMENT 'รายละเอียด'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='ข้อมูลสินค้า';

--
-- Dumping data for table `tb_product`
--

INSERT INTO `tb_product` (`product_id`, `product_name`, `brand_id`, `category_id`, `product_qty`, `product_price`, `product_description`) VALUES
(1, 'ทรงพล', NULL, NULL, 10, 122, '12214545454'),
(2, 'win', NULL, NULL, 10, 1221, '12214545454'),
(3, 'ทรงพล', NULL, NULL, 10, 1221, '12214545454'),
(4, 'ทรงพล', NULL, NULL, 0, 120, '12214545454'),
(5, 'ทรงพล', NULL, NULL, 0, 1221, '12214545454'),
(6, 'ท', NULL, NULL, 212, 100, '1221211');

-- --------------------------------------------------------

--
-- Table structure for table `tb_status`
--

CREATE TABLE `tb_status` (
  `status_id` int(11) NOT NULL COMMENT 'รหัสสถานะ',
  `status` varchar(255) NOT NULL COMMENT 'สถานะ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='ข้อมูลสถานะ';

--
-- Dumping data for table `tb_status`
--

INSERT INTO `tb_status` (`status_id`, `status`) VALUES
(1, 'ยังไม่ชำระ'),
(2, 'ชำระแล้ว');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(11) NOT NULL COMMENT 'รหัสผู้ใช้งาน',
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
  `user_datetime` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'วันที่'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='ข้อมูลผู้ใช้งาน';

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `user_firstname`, `user_lastname`, `user_address`, `user_tel`, `user_email`, `user_sex`, `user_username`, `user_password`, `user_time_progress`, `permission_id`, `user_datetime`) VALUES
(1, 'Administrator', 'Administrator', '1234567890', '0999999999', NULL, 1, 'admin', 'e807f1fcf82d132f9bb018ca6738a19f', 0, 1, '2021-03-09 18:37:11'),
(2, 'ทรงพล', 'คุ้มคำ', '1749900588454', '0827183510', NULL, 1, 'beer', 'e807f1fcf82d132f9bb018ca6738a19f', 0, 3, '2021-12-27 18:18:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_brand`
--
ALTER TABLE `tb_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tb_contact`
--
ALTER TABLE `tb_contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `tb_img_product`
--
ALTER TABLE `tb_img_product`
  ADD PRIMARY KEY (`img_pro_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `status_id` (`status_id`);

--
-- Indexes for table `tb_order_detail`
--
ALTER TABLE `tb_order_detail`
  ADD PRIMARY KEY (`order_detail_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `tb_permission`
--
ALTER TABLE `tb_permission`
  ADD PRIMARY KEY (`permission_id`);

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `permission_id` (`permission_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_brand`
--
ALTER TABLE `tb_brand`
  MODIFY `brand_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสแบรนด์', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสประเภท', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_contact`
--
ALTER TABLE `tb_contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสการติดต่อ', AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_img_product`
--
ALTER TABLE `tb_img_product`
  MODIFY `img_pro_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสรูปภาพสินค้า', AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `order_id` int(2) NOT NULL AUTO_INCREMENT COMMENT 'รหัสการสั่งซื้อ', AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_order_detail`
--
ALTER TABLE `tb_order_detail`
  MODIFY `order_detail_id` int(2) NOT NULL AUTO_INCREMENT COMMENT 'รหัสรายละเอียดการสั่งซื้อ', AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_permission`
--
ALTER TABLE `tb_permission`
  MODIFY `permission_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสสิทธิ์การใช้งาน', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสสินค้า', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_status`
--
ALTER TABLE `tb_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสสถานะ', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสผู้ใช้งาน', AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_img_product`
--
ALTER TABLE `tb_img_product`
  ADD CONSTRAINT `tb_img_product_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `tb_product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD CONSTRAINT `tb_order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tb_order_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `tb_status` (`status_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_order_detail`
--
ALTER TABLE `tb_order_detail`
  ADD CONSTRAINT `tb_order_detail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `tb_order` (`order_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tb_order_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `tb_product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD CONSTRAINT `tb_product_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `tb_brand` (`brand_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tb_product_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `tb_category` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`permission_id`) REFERENCES `tb_permission` (`permission_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
