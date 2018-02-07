-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2018 at 10:27 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `judotank`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_address`
--

CREATE TABLE `tb_address` (
  `address_id` int(6) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(20) NOT NULL,
  `postcode` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_address`
--

INSERT INTO `tb_address` (`address_id`, `address`, `city`, `postcode`) VALUES
(1, 'บ้าน', 'นนทร์', '12344'),
(2, 'บ้าน', 'นนทร์', '12344'),
(3, 'บ้าน', 'นนทร์', '12344'),
(4, 'บ้าน', 'นนทร์', '12344'),
(5, 'บ้าน', 'นนทร์', '12344'),
(6, 'บ้าน', 'นนทร์', '12344'),
(7, 'บ้าน', 'นนทร์', '12344'),
(8, 'บ้าน', 'นนทร์', '12344'),
(9, 'บ้าน', 'นนทร์', '12344'),
(10, 'บ้าน', 'นนทร์', '12344'),
(11, 'บ้าน', 'นนทร์', '12344'),
(12, 'บ้าน', 'นนทร์', '12344'),
(13, '154 ศาลาวชิราวุธ แขวงวังใหม่ เขตปทุมวัน กรุงเทพมหานคร', 'กรุงเทพฯ', '12344'),
(14, 'บ้าน', 'นนทร์', '12344'),
(15, 'asdfasdfsadf\r\nasdf\r\nasdfasdfa\r\ndfasdf dfasasdfsadfdsaf adfasdads', 'asdf', '12344'),
(16, 'บ้านนนท์ ซอยบางใหญ่ อ.บางใหญ่ ', 'นนทบุรี', '11120'),
(17, 'บ้าน', 'นนทร์', '12344'),
(18, 'บ้าน', 'นนทร์', '12344'),
(19, 'บ้าน', 'นนทร์', '12344'),
(20, 'asdfasdfsadf\r\nasdf\r\nasdfasdfa\r\ndfasdf dfasasdfsadfdsaf adfasdads', 'asdf', '12344'),
(21, 'asdfasdfsadf\r\nasdf\r\nasdfasdfa\r\ndfasdf dfasasdfsadfdsaf adfasdads', 'asdf', '12344'),
(22, 'asdfasdfsadf\r\nasdf\r\nasdfasdfa\r\ndfasdf dfasasdfsadfdsaf adfasdads', 'asdf', '12344'),
(23, 'asdfasdfsadf\r\nasdf\r\nasdfasdfa\r\ndfasdf dfasasdfsadfdsaf adfasdads', 'asdf', '12344');

-- --------------------------------------------------------

--
-- Table structure for table `tb_assign`
--

CREATE TABLE `tb_assign` (
  `assign_id` int(6) NOT NULL,
  `worker_team_id` int(6) DEFAULT NULL,
  `order_id` int(6) UNSIGNED ZEROFILL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_blog`
--

CREATE TABLE `tb_blog` (
  `blog_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `blog_title` varchar(50) DEFAULT NULL,
  `blog_body` text,
  `blog_pic` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_blog`
--

INSERT INTO `tb_blog` (`blog_id`, `blog_title`, `blog_body`, `blog_pic`) VALUES
(000001, 'ขั้นตอนการติดตั้งถังบำบัด', '1. ขุดดินให้ได้ความลึกเหมาะสมกับขนาดถัง และตอกเสาเข็มคอนกรีตเสริมเหล็กหกเหลี่ยม หรือเสาเข็มไม้ที่ก้นหลุมเพื่อป้องกันการทรุดตัวของถัง ปรับก้นหลุมด้วยทรายหยาบ และเทพื้นคอนกรีตเสริมเหล็ก (จำนวนเสาเข็มขึ้นอยู่กับขนาดความจุของถังและพื้นที่ติดตั้งด้วย) \r\n\r\n2. วางถังลงพื้นคอนกรีตเสริมเหล็กแล้ว เติมน้ำให้ถึงระดับท่อน้ำทิ้ง เพื่อป้องไม่ให้ถังบำบัดเกิดการลอยตัวและการยุบตัวของถังจากแรงดันดินและน้ำจากภายนอก \r\n\r\n3. ต่อท่ออ่อน (ท่อ FLEX) เข้าที่ปลายท่อน้ำเข้าและท่อน้ำทิ้งของถังบำบัดและยึดด้วยสายรัดให้แน่น \r\n\r\n4. กลบด้วยดินหรือทรายหยาบ *หมายเหตุ ไม่ควรใช้ดินผสมกรวด อิฐหัก เศษไม้ หรือวัสดุหยาบ เป็นวัสดุที่ใช้ในการกลบทำให้ถังเกิดความเสียหายได้ \r\n\r\n5. เทพื้นคอนกรีตเสริมเหล็กรอบปากถัง เพื่อฝังวงแหวนยึดฝาถังไว้กับพื้นคอนกรีตเสริมเหล็กเพื่อเสิรมความแข็งแรงในขณะ ปิด-เปิดฝาถัง (ในกรณ๊ที่ไม่ใช้ฝาเหล็กหรือฝาก ABS ไม่ต้องเทคอนกรีตรอบปากถัง) \r\n\r\n6. ทั้งนี้จะต้องต่อท่อระบายอากาศเพื่อการถ่ายเทอากาศที่เกิดขึ้นภายในถังได้อย่างสะดวงและกลิ่งไม่ย้อนกลับไปภายในอาคาร \r\n\r\n\r\n*หมายเหตุ รูปร่างของถังและขนาดอาจแตกต่างจากรุปภาพ \r\n\r\nหากมีปัญหาเกี่ยวกับการติดตั้งหรือคุณภาพของผลิตภัณฑ์กรุณาติดต่อแผนกควบคุมคุณภาพ\r\nโทร. 02-8071044 ต่อ 424 \r\n\r\nบริษัทฯ ขอสงวนสิทธิ์ในการรับผิดชอบความเสียหาย อันเนื่องมาจากการไม่ปฎิบัติตามวิธีการติดตั้ง', '1.jpg'),
(000002, 'ขั้นตอนการติดตั้งถังเก็บน้ำสแตนเลส', '1. ข้อต่อทางน้ำเข้า/ออกไม่ควรเป็นโลหะ (ป้องกันการเกิดสนิม) \r\n\r\n2. พื้นที่ตั้งถังต้องไม่เอียง \r\n\r\n3. ควรตรวจสอบเช็ควาวล์ (ต้องใส่ให้ถูกด้าน) \r\n\r\n4. ไม่ตั้งถังใกล้โลหะที่เป็นสนิม (เช่นรั้วบ้านที่เป็นโลหะ) \r\n\r\n5. การตั้งระดับลูกลอยต้องต่ำกว่าทางน้ำเข้า (ป้องกันน้ำล้นถัง) \r\n\r\n6. น้ำที่ใช้ควรเป็นน้ำประปา มาตรฐานน้ำประปา ความกระด้าง 120 พีพีเอ็ม คลอไรด์ 30 พีพีเอ็ม แร่ธาตุรวม 140 พีพีเอ็ม สนิมเหล็ก 0.02 พีพีเอ็ม ความกระด้าง 70 พีพีเอ็ม \r\n\r\n7. ห้ามใช้บรรจุน้ำบาดาล, น้ำกร่อยและน้ำเค็ม \r\n\r\nหากมีปัญหาเกี่ยวกับการติดตั้งหรือคุณภาพของผลิตภัณฑ์กรุณาติดต่อแผนกควบคุมคุณภาพ \r\nโทร 02-8071044 ต่อ 424 \r\n\r\nบริษัทฯ ขอสงวนสิทธิ์ในการรับผิดชอบความเสียหาย อันเนื่องมาจากการไม่ปฎิบัติตามวิธีการติดตั้ง', '2.jpg'),
(000003, 'ขั้นตอนการติดตั้งถังเก็บน้ำบนดิน', '1. พื้นรองก้นถังต้องเรียบและไม่เอียง สามารถรับน้ำหนักถังได้เต็มก้น \r\n\r\n2. ไม่มีเศษหินหรือของแข็งติดพื้นรองก้นถังก่อนทำการติดตั้ง \r\n\r\n3. การต่อท่อน้ำออก ต้องยืดท่อหรือมีหมอนรองให้ท่ออยู่ในระดับเดียวกับหน้าแปลนต่อท่อน้ำออก \r\n\r\n*หมายเหตุ รูปร่างของถังและขนาดอาจแตกต่างจากรุปภาพ \r\n\r\nหากมีปัญหาเกี่ยวกับการติดตั้งหรือคุณภาพของผลิตภัณฑ์กรุณาติดต่อแผนกควบคุมคุณภาพ \r\nโทร 02-8071044 ต่อ 424 \r\n\r\nบริษัทฯ ขอสงวนสิทธิ์ในการรับผิดชอบความเสียหาย อันเนื่องมาจากการไม่ปฎิบัติตามวิธีการติดตั้ง', '3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_create`
--

CREATE TABLE `tb_create` (
  `create_id` int(6) NOT NULL,
  `user_id` int(6) NOT NULL,
  `product_type` varchar(2) NOT NULL,
  `size_from` int(1) NOT NULL COMMENT 'วัดขนาดจาก',
  `size` int(6) NOT NULL COMMENT 'ขนาด',
  `capacity` int(6) NOT NULL COMMENT 'ความจุ',
  `detail` text COMMENT 'รายละเอียด',
  `price` int(8) DEFAULT NULL,
  `transport_id` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_list`
--

CREATE TABLE `tb_list` (
  `list_id` int(6) NOT NULL,
  `color` varchar(30) NOT NULL,
  `capacity` varchar(10) NOT NULL,
  `center` varchar(10) NOT NULL,
  `height` varchar(10) NOT NULL,
  `inlet` varchar(10) NOT NULL,
  `waterout` varchar(10) NOT NULL,
  `stand` varchar(10) NOT NULL,
  `waterdie` varchar(10) NOT NULL,
  `price` int(6) UNSIGNED NOT NULL,
  `product_id` int(6) UNSIGNED ZEROFILL DEFAULT NULL,
  `stock` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_list`
--

INSERT INTO `tb_list` (`list_id`, `color`, `capacity`, `center`, `height`, `inlet`, `waterout`, `stand`, `waterdie`, `price`, `product_id`, `stock`) VALUES
(1, '', '550', '0.88', '1.20', '3/4', '1', '0.35', '', 123, 000003, 10),
(2, '', '650', '0.88', '1.40', '3/4', '1', '0.35', '', 13200, 000003, 10),
(3, '', '750', '0.88', '1.60', '3/4', '1', '0.35', '', 13500, 000003, 10),
(4, '', '1000', '1.08', '1.40', '3/4', '1', '0.35', '', 15800, 000003, 10),
(6, '', '1250', '1.08', '1.60', '3/4', '1', '0.35', '', 17300, 000003, 10),
(7, '', '1600', '1.36', '1.40', '3/4', '2', '0.35', '', 21600, 000003, 10),
(8, '', '2000', '1.36', '1.60', '3/4', '2', '0.35', '', 26100, 000003, 10),
(9, '', '2500', '1.36', '2.20', '3/4', '2', '0.35', '', 32200, 000003, 10),
(10, '', '3000', '1.36', '2.40', '3/4', '2', '0.35', '', 38400, 000003, 10),
(11, '', '4000', '1.36', '3.00', '3/4', '2', '0.35', '', 47900, 000003, 10),
(12, '', '200', '0.56', '1.05', '3/4', '1', '0.35', '', 8100, 000001, 8),
(13, '', '300', '0.56', '1.37', '3/4', '1', '0.35', '', 9200, 000001, 10),
(14, '', '400', '0.66', '1.38', '3/4', '1', '0.35', '', 10600, 000001, 10),
(15, '', '550', '0.76', '1.38', '3/4', '1', '0.35', '', 12600, 000001, 10),
(16, '', '750', '0.90', '1.41', '3/4', '1', '0.35', '', 13500, 000001, 10),
(17, '', '1100', '1.08', '1.41', '3/4', '1', '0.35', '', 16600, 000001, 10),
(18, '', '1600', '1.30', '1.46', '3/4', '2', '0.35', '', 21200, 000001, 10),
(19, '', '2000', '1.45', '1.46', '3/4', '2', '0.35', '', 26100, 000001, 10),
(20, '', '2500', '1.60', '1.46', '3/4', '2', '0.35', '', 32200, 000001, 10),
(21, '', '3000', '1.45', '2.1', '3/4', '2', '0.35', '', 38300, 000001, 10),
(22, '', '4000', '1.45', '2.6', '3/4', '2', '0.35', '', 48200, 000001, 10),
(23, '', '5000', '1.60', '2.6', '3/4', '2', '0.35', '', 59200, 000001, 10),
(24, '', '6000', '1.60', '3.20', '3/4', '2', '0.35', '', 69000, 000001, 10),
(25, '', '550', '0.70', '1.45', '3/4', '1', '0.35', '1', 12600, 000002, 10),
(26, '', '750', '0.70', '1.95', '3/4', '1', '0.35', '1', 13500, 000002, 10),
(27, '', '1600', '1.08', '1.90', '3/4', '2', '0.35', '1', 21600, 000002, 10),
(28, '', '2000', '1.08', '2.30', '3/4', '2', '0.35', '1', 26100, 000002, 10),
(29, 'หินขัด/แดง/เขียว/ครีม', '550', '0.75', '1.55', '1', '1', '', '1', 9000, 000013, 10),
(30, 'หินขัด/แดง/เขียว/ครีม', '750', '0.75', '2.00', '1', '1', '', '1', 10250, 000013, 10),
(31, 'หินขัด/แดง/เขียว/ครีม', '1100', '0.97', '1.91', '1', '1', '', '1', 11500, 000013, 10),
(32, 'หินขัด/แดง/เขียว/ครีม', '2000', '1.22', '1.98', '1', '2', '', '1', 17500, 000013, 10),
(33, 'หินขัด/แดง/เขียว/ครีม', '1100', '0.97', '1.84', '1', '1', '', '1', 1150, 000014, 10),
(34, 'หินขัด/แดง/เขียว/ครีม', '350', '0.66', '1.23', '1', '1', '', '1', 7875, 000009, 10),
(35, 'หินขัด/แดง/เขียว/ครีม', '550', '0.75', '1.60', '1', '1', '', '1', 8750, 000009, 10),
(36, 'หินขัด/แดง/เขียว/ครีม', '750', '0.75', '2.05', '1', '1', '', '1', 10000, 000009, 10),
(37, 'หินขัด/แดง/เขียว/ครีม', '1000', '1.00', '1.70', '1', '1', '', '1', 11250, 000009, 10),
(38, 'หินขัด/แดง/เขียว/ครีม', '1500', '1.05', '2.10', '1', '1', '', '1', 16250, 000009, 10),
(39, 'หินขัด/แดง/เขียว/ครีม', '2000', '1.20', '2.20', '1', '2', '', '1', 18750, 000009, 10),
(40, 'หินขัด/แดง/เขียว/ครีม', '1000', '1.11', '1.42', '1', '1', '', '1', 201, 000010, 10),
(41, 'หินขัด/แดง/เขียว/ครีม', '1500', '1.35', '1.53', '1', '2', '', '1', 201, 000010, 10),
(42, 'หินขัด/แดง/เขียว/ครีม', '2000', '1.35', '1.80', '1', '2', '', '1', 201, 000010, 10),
(43, 'หินขัด/แดง/เขียว/ครีม', '3000', '1.35', '2.52', '1', '2', '', '1', 201, 000010, 10),
(44, 'แดง/เขียว/ครีม', '6000', '2.15', '2.15', '2', '2', '', '2', 101, 000011, 10),
(45, 'แดง/เขียว/ครีม', '8000', '2.27', '2.35', '2', '2', '', '2', 101, 000011, 9),
(46, 'แดง/เขียว/ครีม', '10000', '2.43', '2.65', '2', '2', '', '2', 101, 000011, 10),
(47, 'หินขัด', '550', '0.75', '1.60', '1', '1', '', '1', 1, 000012, 10),
(48, 'หินขัด', '750', '0.75', '2.05', '1', '1', '', '1', 1, 000012, 10),
(49, 'หินขัด', '1000', '1.00', '1.70', '1', '1', '', '1', 1, 000012, 10),
(50, 'หินขัด', '2000', '1.20', '2.20', '1', '2', '', '1', 1, 000012, 10),
(51, 'หินขัด/แดง/เขียว/ครีม', '550', '0.75', '1.55', '1', '1', '', '1', 7500, 000006, 10),
(52, 'หินขัด/แดง/เขียว/ครีม', '750', '0.75', '2.05', '1', '1', '', '1', 8750, 000006, 10),
(53, 'หินขัด/แดง/เขียว/ครีม', '1000', '1.00', '1.80', '1', '1', '', '1', 10000, 000006, 10),
(54, 'หินขัด/แดง/เขียว/ครีม', '1500', '1.05', '2.05', '1', '1', '', '1', 13500, 000006, 10),
(55, 'หินขัด/แดง/เขียว/ครีม', '2000', '1.20', '2.30', '1', '2', '', '1', 18750, 000006, 10),
(56, 'หินขัด/แดง/เขียว/ครี', ' 350', '0.66', '1.23', '1', '1', '', '1', 10, 000007, 10),
(57, 'หินขัด/แดง/เขียว/ครีม', '1000', '1.11', '1.42', '1', '1', '', '1', 10000, 000008, 10),
(58, 'หินขัด/แดง/เขียว/ครีม', '1500', '1.35', '1.53', '1', '2', '', '1', 12500, 000008, 10),
(59, 'หินขัด/แดง/เขียว/ครีม', '2000', '1.35', '1.80', '1', '2', '', '1', 15000, 000008, 10),
(60, 'หินขัด/แดง/เขียว/ครีม', '3000', '1.35', '2.52', '1', '2', '', '1', 23750, 000008, 10),
(61, '', '6000', '1.80', '3.15', '2', '2', '', '2', 39000, 000004, 9),
(62, '', '1000', '1.11', '1.42', '1', '1', '', '1', 8800, 000005, 10),
(63, '', '1500', '1.35', '1.53', '1', '2', '', '1', 11500, 000005, 10),
(64, '', '2000', '1.35', '1.80', '1', '2', '', '1', 14000, 000005, 10),
(65, '', '3000', '1.35', '2.52', '1', '2', '', '1', 26000, 000005, 10),
(66, '', '8000', '2.27', '2.35', '2', '2', '', '2', 60000, 000019, 10),
(67, '', '10000', '2.43', '2.65', '2', '2', '', '2', 80000, 000019, 10),
(68, '', '1100', '0.88', '1.90', '3/6', '2', '0.35', '1', 16600, 000002, 10),
(73, '', '550', '0.75', '1.55', '1', '1', '', '1', 80, 000020, 10),
(74, '', '750', '0.75', '2.05', '1', '1', '', '1', 80, 000020, 10),
(75, '', '1000', '1.00', '1.80', '1', '1', '', '1', 80, 000020, 10),
(76, '', '1500', '1.05', '2.05', '1', '1', '', '1', 80, 000020, 10),
(77, '', '2000', '1.25', '2.3', '1', '2', '', '1', 80, 000020, 10),
(78, '', '2500', '1.54', '1.88', '1', '2', '', '1', 80, 000020, 10),
(79, '', '4000', '1.74', '2.10', '1', '2', '', '2', 80, 000020, 10),
(80, '', '5000', '1.80', '2.50', '1', '2', '', '2', 80, 000020, 10),
(81, '', '8000', '2.12', '2.85', '2', '2', '', '2', 80, 000020, 10),
(82, '', '10000', '2.12', '3.68', '2', '2', '', '2', 80, 000020, 10),
(83, 'น้ำเงิน', '650', '1.00', '1.25', '1', '1', '', '1', 70, 000015, 10),
(84, 'น้ำเงิน', '850', '1.15', '1.30', '1', '1', '', '1', 7, 000015, 10),
(85, 'น้ำเงิน', '1000', '1.20', '1.35', '1', '1', '', '1', 70, 000015, 10),
(86, 'น้ำเงิน', '1200', '1.30', '1.40', '1', '1', '', '1', 70, 000015, 10),
(87, 'น้ำเงิน', '1800', '1.45', '1.70', '1', '1', '', '1', 70, 000015, 10),
(88, 'น้ำเงิน', '2200', '1.45', '1.90', '1', '1', '', '1', 70, 000015, 10),
(89, 'น้ำเงิน', '3300', '1.70', '2.05', '1', '1', '', '1', 70, 000015, 10),
(90, 'น้ำเงิน', '10000', '1.80', '4.85', '2', '2', '', '1', 70, 000015, 9),
(91, 'น้ำเงิน', '1600', '1.45', '1.50', '1', '1', '', '1', 800, 000016, 9),
(92, 'น้ำเงิน', '2000', '1.65', '1.65', '1', '1', '', '1', 800, 000016, 9),
(93, '', '', '', '', '', '', '', '', 2000, 000023, 8),
(95, '', '850', '1.45', '1.50', '4', '4', '', '', 7000, 000017, 10),
(96, '', '1600', '1.45', '1.50', '4', '4', '', '', 10800, 000018, 0),
(97, '', '10000', '1.80', '4.85', '6', '6', '', '', 105000, 000021, 0),
(98, '', '1600', '1.45', '1.50', '4', '4', '', '', 12000, 000022, 10),
(99, '', '2000', '1.65', '1.65', '4', '4', '', '', 14000, 000022, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `order_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `order_date` datetime NOT NULL,
  `user_id` int(6) UNSIGNED NOT NULL,
  `totalprice` int(8) NOT NULL,
  `address_id` int(6) NOT NULL,
  `transport_id` int(1) DEFAULT NULL,
  `comment` text,
  `with_setup` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`order_id`, `order_date`, `user_id`, `totalprice`, `address_id`, `transport_id`, `comment`, `with_setup`) VALUES
(000001, '2018-01-10 16:28:58', 2, 50, 13, 2, NULL, NULL),
(000002, '2018-01-10 16:34:05', 2, 50, 14, 2, NULL, NULL),
(000003, '2018-01-10 16:35:57', 2, 50, 14, 2, NULL, NULL),
(000004, '2018-01-10 17:17:17', 2, 300, 14, 1, NULL, NULL),
(000005, '2018-01-10 17:19:11', 2, 300, 14, 1, NULL, NULL),
(000006, '2018-01-10 17:20:00', 2, 300, 14, 1, NULL, NULL),
(000007, '2018-01-10 17:22:10', 2, 300, 14, 1, NULL, NULL),
(000008, '2018-01-10 17:23:53', 2, 300, 14, 1, NULL, NULL),
(000009, '2018-01-10 17:25:18', 2, 300, 14, 1, NULL, NULL),
(000010, '2018-01-10 17:25:37', 2, 300, 14, 1, NULL, NULL),
(000011, '2018-01-10 17:25:48', 2, 300, 14, 1, NULL, NULL),
(000012, '2018-01-10 17:25:59', 2, 300, 14, 1, NULL, NULL),
(000013, '2018-01-10 17:27:36', 2, 106, 14, 1, NULL, NULL),
(000014, '2018-01-14 16:53:34', 1, 1670, 15, 1, NULL, NULL),
(000015, '2018-01-15 05:55:49', 34, 1900, 16, 1, NULL, NULL),
(000016, '2018-01-22 05:17:10', 2, 39000, 17, 1, NULL, NULL),
(000019, '2018-01-30 05:00:07', 1, 8100, 21, NULL, 'ทดสอบ', 2),
(000020, '2018-02-07 09:56:20', 1, 10100, 22, NULL, 'aaaaa', 2),
(000021, '2018-02-07 10:00:59', 1, 2101, 23, 1, 'aaaaa', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_orderdetail`
--

CREATE TABLE `tb_orderdetail` (
  `detail_id` int(6) NOT NULL,
  `order_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `list_id` int(6) NOT NULL,
  `qty` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_orderdetail`
--

INSERT INTO `tb_orderdetail` (`detail_id`, `order_id`, `list_id`, `qty`) VALUES
(1, 000001, 1, 3),
(2, 000001, 1, 3),
(3, 000002, 12, 1),
(4, 000003, 12, 1),
(5, 000012, 25, 1),
(6, 000013, 12, 1),
(7, 000013, 61, 1),
(8, 000014, 90, 1),
(9, 000014, 92, 2),
(10, 000015, 25, 1),
(11, 000015, 91, 2),
(12, 000016, 61, 1),
(13, 000019, 12, 1),
(14, 000020, 12, 1),
(15, 000020, 93, 1),
(16, 000021, 45, 1),
(17, 000021, 93, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_owner`
--

CREATE TABLE `tb_owner` (
  `product_owner` varchar(6) NOT NULL,
  `owner_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_owner`
--

INSERT INTO `tb_owner` (`product_owner`, `owner_name`) VALUES
('000001', 'หจก. ยูโดแท้งค์ จำกัด'),
('000002', 'เกรียงไทยวัฒนากรุ๊ป');

-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
--

CREATE TABLE `tb_product` (
  `product_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `product_name` varchar(60) NOT NULL,
  `product_type` int(2) NOT NULL,
  `product_owner` varchar(6) DEFAULT NULL,
  `description` text,
  `picture` varchar(50) DEFAULT NULL,
  `product_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_product`
--

INSERT INTO `tb_product` (`product_id`, `product_name`, `product_type`, `product_owner`, `description`, `picture`, `product_date`) VALUES
(000001, 'STL รุ่นก้นเรียบ', 1, '000001', '', '1.jpg', NULL),
(000002, 'STL รุ่นก้นนูนทรงสูง', 1, '000001', '', '2.jpg', NULL),
(000003, 'STL รุ่นก้นนูน', 1, '000001', '', '3.jpg', '2018-01-19 08:01:15'),
(000004, 'Clean สีเรียบ/น้ำเงิน CR', 2, '000001', '', '4.jpg', NULL),
(000005, 'Clean สีเรียบ/น้ำเงิน CRL', 2, '000001', '', '5.jpg', NULL),
(000006, 'Magma (CCR)', 2, '000001', '', '6.jpg', NULL),
(000007, 'Magma (CEM)', 2, '000001', '', '7.jpg', NULL),
(000008, 'Magma (CCRL)', 2, '000001', '', '8.jpg', NULL),
(000009, 'Cylic (CE)', 2, '000001', '', '9.jpg', NULL),
(000010, 'Cylic (CREL)', 2, '000001', '', '10.jpg', NULL),
(000011, 'Cylic (CLLE)', 2, '000001', '', '11.jpg', NULL),
(000012, 'Marine (PEO)', 2, '000001', '', '12.jpg', NULL),
(000013, 'Butterfly (BF)', 2, '000001', '', '13.jpg', NULL),
(000014, 'Wistaria (WT)', 2, '000001', '', '14.jpg', NULL),
(000015, 'Clean (CW)', 3, '000001', '', '15.jpg', NULL),
(000016, 'Clean (CWR)', 3, '000001', '', '16.jpg', NULL),
(000017, 'Saard (PCS)', 4, '000001', '', '17.jpg', NULL),
(000018, 'Saard (PCSR)', 4, '000001', '', '18.jpg', NULL),
(000019, 'Clean สีเรียบ/น้ำเงิน CLL', 2, '000001', '', '19.jpg', NULL),
(000020, 'Clean สีเรียบ/น้ำเงิน CRRN', 2, '000001', '', '20.jpg', NULL),
(000021, 'Clean (CS)', 4, '000001', '', '21.jpg', NULL),
(000022, 'Clean (CSR)', 4, '000001', '', '22.jpg', NULL),
(000023, 'PL-AUTO-250D ปั๊มAUTO 250W+เจ็ทเดี่ยว', 5, '000002', 'เครื่องสูบน้ำอัตโนมัติ ขนาด 130W 220V 50HZ ใช้งานง่าย\r\nประสิทธิภาพการทำงานสูง มีอายุการใช้งานยาวนาน', '23.jpg', '2018-02-07 10:02:30');

-- --------------------------------------------------------

--
-- Table structure for table `tb_producttype`
--

CREATE TABLE `tb_producttype` (
  `product_type` int(2) NOT NULL,
  `type_name` varchar(20) NOT NULL,
  `type_pic` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_producttype`
--

INSERT INTO `tb_producttype` (`product_type`, `type_name`, `type_pic`) VALUES
(1, 'ถังเก็บน้ำสแตนเลส', '1.png'),
(2, 'ถังเก็บน้ำบนดิน', '2.png'),
(3, 'ถังเก็บน้ำฝั่งดิน', '3.png'),
(4, 'ถังบำบัดน้ำเสีย', '4.png'),
(5, 'ผลิตภัณฑ์อื่นๆ', '5.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rate`
--

CREATE TABLE `tb_rate` (
  `rate_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `user_id` int(6) UNSIGNED ZEROFILL DEFAULT NULL,
  `worker_team_id` int(6) DEFAULT NULL,
  `rate_score_p` varchar(2) DEFAULT NULL,
  `rate_score_t` varchar(2) DEFAULT NULL,
  `rate_review` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_report`
--

CREATE TABLE `tb_report` (
  `report_id` int(6) NOT NULL,
  `user_id` int(6) NOT NULL,
  `report` text NOT NULL,
  `report_status` int(1) NOT NULL DEFAULT '1',
  `report_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_report`
--

INSERT INTO `tb_report` (`report_id`, `user_id`, `report`, `report_status`, `report_date`) VALUES
(1, 1, 'ทดสอบ', 1, '0000-00-00 00:00:00'),
(2, 1, 'ทดสอบ2', 1, '0000-00-00 00:00:00'),
(3, 1, 'ทดสอบ 3', 1, '0000-00-00 00:00:00'),
(4, 1, 'ทดสอบ 4', 1, '2018-02-07 10:41:42'),
(5, 1, 'ทดสอบ 5', 1, '2018-02-07 04:42:38'),
(6, 1, 'ทดสอบ 5', 1, '2018-02-07 10:44:19');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sex`
--

CREATE TABLE `tb_sex` (
  `sex_id` varchar(1) NOT NULL,
  `sexname` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_sex`
--

INSERT INTO `tb_sex` (`sex_id`, `sexname`) VALUES
('1', 'ชาย'),
('2', 'หญิง');

-- --------------------------------------------------------

--
-- Table structure for table `tb_status`
--

CREATE TABLE `tb_status` (
  `status_id` varchar(1) NOT NULL,
  `statusname` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_status`
--

INSERT INTO `tb_status` (`status_id`, `statusname`) VALUES
('1', 'USER'),
('2', 'ADMIN');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transport`
--

CREATE TABLE `tb_transport` (
  `transport_id` int(1) NOT NULL,
  `transport_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_transport`
--

INSERT INTO `tb_transport` (`transport_id`, `transport_name`) VALUES
(1, 'ยังไม่ได้ชำระเงิน'),
(2, 'ชำระเงินแล้ว'),
(3, 'กำลังเตรียมการ'),
(4, 'กำลังจัดส่ง'),
(5, 'จัดส่งเรียบร้อย'),
(6, 'พบข้อผิดพลาด');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(16) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `sex_id` varchar(1) DEFAULT NULL,
  `tel` varchar(12) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `status_id` varchar(1) NOT NULL DEFAULT '1',
  `address_id` int(6) DEFAULT NULL,
  `reg_date` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `username`, `password`, `fullname`, `sex_id`, `tel`, `email`, `status_id`, `address_id`, `reg_date`) VALUES
(000001, 'user', 'user', 'user', '1', '0123456789', 'a@b', '1', 23, '0000-00-00 00:00:00'),
(000002, 'user1', '1234', 'user1 user', '1', '12-3467-89', 'user1@user', '1', 19, '22-August-2017'),
(000003, 'user2', '1234', 'user1 user', '1', '01-2345-6789', 'user1@user', '1', NULL, '22-August-2017'),
(000006, 'admin', 'admin', 'admin admin', '2', '00-000-0000', 'admin@a', '2', NULL, 'first'),
(000007, 'ทดสอบ1', '123456789', 'ทดสอบ 111', NULL, NULL, NULL, '1', NULL, NULL),
(000008, 'ทดสอบ2', '123456789', 'ทดสอบ 222', '2', '12-3456-7890', 'test2@test', '1', NULL, ''),
(000009, 'ทดสอบ3', '123456789', 'ทดสอบ 333', '2', '12-3456-7890', 'test3@test', '1', NULL, '15-November-2017'),
(000010, '12', '12121212', '12', '1', '12-3456-7890', 'test1@test', '1', NULL, '16-November-2017'),
(000011, 'ทดสอบ1', '12345689', 'ทดสอบ 111', '1', '12-3456-7890', 'test1@test', '1', NULL, '16-November-2017'),
(000012, 'ทดสอบ1', '12345689', 'ทดสอบ 111', '1', '12-3456-7890', 'test1@test', '1', NULL, '16-November-2017'),
(000013, 'ทดสอบ3', '123456789', 'ทดสอบ 333', '1', '33-3333-3333', 'test3@test', '1', NULL, '16-November-2017'),
(000014, 'ทดสอบ4', '123456789', 'ทดสอบ 444', '1', '44-4444-4444', 'test4@test', '1', NULL, '16-November-2017'),
(000015, 'ทดสอบ5', '123456789', 'ทดสอบ 555', '1', '55-5555-5555', 'test5@test', '1', NULL, '16-November-2017'),
(000016, '', '', '', '1', '', '', '1', NULL, '16-November-2017'),
(000017, '1', '12', '1', '1', '1', '1@1', '1', NULL, '16-November-2017'),
(000018, '2', '12', '1', '1', '1', '1@1', '1', NULL, '16-November-2017'),
(000019, '3', '12', '1', '1', '1', '1@1', '1', NULL, '16-November-2017'),
(000020, '3', '12', '1', '1', '1', '1@1', '1', NULL, '16-November-2017'),
(000021, '3', '12', '1', '1', '1', '1@1', '1', NULL, '16-November-2017'),
(000022, '4', '12', '1', '1', '1', '1@1', '1', NULL, '16-November-2017'),
(000023, '5', '12', '1', '1', '1', '1@1', '1', NULL, '16-November-2017'),
(000024, '6', '12345678', '1', '1', '12-3456-7890', '1@1', '1', NULL, '16-November-2017'),
(000025, '7', '12345678', '1', '1', '12-3456-7890', '1@1', '1', NULL, '16-November-2017'),
(000026, '8', '12345678', '1', '1', '12-3456-7890', '1@1', '1', NULL, '16-November-2017'),
(000027, '9', '12345678', '1', '1', '12-3456-7890', '1@1', '1', NULL, '16-November-2017'),
(000028, '10', '123456789', 'ทดสอบ 111', '1', '12-3456-7890', 'test1@test', '1', NULL, '16-November-2017'),
(000029, '11', '123456789', 'ทดสอบ 111', '1', '12-3456-7890', 'test1@test', '1', NULL, '16-November-2017'),
(000030, '13', '123456789', 'ทดสอบ 111', '1', '12-3456-7890', 'test1@test', '1', NULL, '16-November-2017'),
(000031, '14', '123456789', 'ทดสอบ 111', '1', '12-3456-7890', 'test1@test', '1', NULL, '16-November-2017'),
(000032, '16', '123456789', 'ทดสอบ 111', '1', '12-3456-7890', 'test1@test', '1', NULL, '16-November-2017'),
(000033, '17', '123456789', 'ทดสอบ 111', '1', '12-3456-7890', 'test1@test', '1', NULL, '16-November-2017'),
(000034, 'shinetong', '12345678', 'ninie tong', '1', '12-3456-78', 'tong@hotmail.com', '1', 16, '15-January-2018');

-- --------------------------------------------------------

--
-- Table structure for table `tb_worker`
--

CREATE TABLE `tb_worker` (
  `worker_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `worker_name` varchar(30) DEFAULT NULL,
  `worker_pic` varchar(20) DEFAULT NULL,
  `worker_add` varchar(50) DEFAULT NULL,
  `worker_tel` varchar(12) DEFAULT NULL,
  `worker_team_id` int(6) DEFAULT NULL,
  `worker_login` varchar(50) DEFAULT NULL,
  `worker_pass` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_worker`
--

INSERT INTO `tb_worker` (`worker_id`, `worker_name`, `worker_pic`, `worker_add`, `worker_tel`, `worker_team_id`, `worker_login`, `worker_pass`) VALUES
(000001, 'ทดสอบ ปิ๊วปิ๊ว', NULL, NULL, '', 1, NULL, NULL),
(000002, 'นวโรจน์ พงพัฒน์', NULL, '19-01-2018', '064331224', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_worker_team`
--

CREATE TABLE `tb_worker_team` (
  `worker_team_id` int(6) NOT NULL,
  `worker_team_name` varchar(30) DEFAULT NULL,
  `worker_team_tel` varchar(12) DEFAULT NULL,
  `worker_team_area` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_worker_team`
--

INSERT INTO `tb_worker_team` (`worker_team_id`, `worker_team_name`, `worker_team_tel`, `worker_team_area`) VALUES
(1, 'พนักงานติดตั้งภายในเขตกรุงเทพฯ', '0875542156', 'กรุงเทพฯ และปริมณฑล');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_address`
--
ALTER TABLE `tb_address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `tb_assign`
--
ALTER TABLE `tb_assign`
  ADD PRIMARY KEY (`assign_id`),
  ADD KEY `bk_wk` (`worker_team_id`),
  ADD KEY `bk_od` (`order_id`);

--
-- Indexes for table `tb_blog`
--
ALTER TABLE `tb_blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `tb_create`
--
ALTER TABLE `tb_create`
  ADD PRIMARY KEY (`create_id`);

--
-- Indexes for table `tb_list`
--
ALTER TABLE `tb_list`
  ADD PRIMARY KEY (`list_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tb_orderdetail`
--
ALTER TABLE `tb_orderdetail`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `listorder` (`list_id`);

--
-- Indexes for table `tb_owner`
--
ALTER TABLE `tb_owner`
  ADD PRIMARY KEY (`product_owner`);

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_type_f` (`product_type`),
  ADD KEY `product_owner_f` (`product_owner`);

--
-- Indexes for table `tb_producttype`
--
ALTER TABLE `tb_producttype`
  ADD PRIMARY KEY (`product_type`);

--
-- Indexes for table `tb_rate`
--
ALTER TABLE `tb_rate`
  ADD PRIMARY KEY (`rate_id`),
  ADD KEY `rate_wk` (`worker_team_id`),
  ADD KEY `rate_us` (`user_id`);

--
-- Indexes for table `tb_report`
--
ALTER TABLE `tb_report`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `tb_sex`
--
ALTER TABLE `tb_sex`
  ADD PRIMARY KEY (`sex_id`);

--
-- Indexes for table `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `tb_transport`
--
ALTER TABLE `tb_transport`
  ADD PRIMARY KEY (`transport_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_address` (`address_id`),
  ADD KEY `user_sex` (`sex_id`),
  ADD KEY `user_status` (`status_id`);

--
-- Indexes for table `tb_worker`
--
ALTER TABLE `tb_worker`
  ADD PRIMARY KEY (`worker_id`),
  ADD KEY `wk_wkt` (`worker_team_id`);

--
-- Indexes for table `tb_worker_team`
--
ALTER TABLE `tb_worker_team`
  ADD PRIMARY KEY (`worker_team_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_address`
--
ALTER TABLE `tb_address`
  MODIFY `address_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `tb_assign`
--
ALTER TABLE `tb_assign`
  MODIFY `assign_id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_blog`
--
ALTER TABLE `tb_blog`
  MODIFY `blog_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_create`
--
ALTER TABLE `tb_create`
  MODIFY `create_id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_list`
--
ALTER TABLE `tb_list`
  MODIFY `list_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `order_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tb_orderdetail`
--
ALTER TABLE `tb_orderdetail`
  MODIFY `detail_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `product_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `tb_producttype`
--
ALTER TABLE `tb_producttype`
  MODIFY `product_type` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_rate`
--
ALTER TABLE `tb_rate`
  MODIFY `rate_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_report`
--
ALTER TABLE `tb_report`
  MODIFY `report_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `tb_worker`
--
ALTER TABLE `tb_worker`
  MODIFY `worker_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_assign`
--
ALTER TABLE `tb_assign`
  ADD CONSTRAINT `bk_od` FOREIGN KEY (`order_id`) REFERENCES `tb_order` (`order_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `bk_wk` FOREIGN KEY (`worker_team_id`) REFERENCES `tb_worker_team` (`worker_team_id`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_list`
--
ALTER TABLE `tb_list`
  ADD CONSTRAINT `product_list` FOREIGN KEY (`product_id`) REFERENCES `tb_product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD CONSTRAINT `ordertouser` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_orderdetail`
--
ALTER TABLE `tb_orderdetail`
  ADD CONSTRAINT `listorder` FOREIGN KEY (`list_id`) REFERENCES `tb_list` (`list_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `orderdetailtoorder` FOREIGN KEY (`order_id`) REFERENCES `tb_order` (`order_id`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD CONSTRAINT `p_type` FOREIGN KEY (`product_type`) REFERENCES `tb_producttype` (`product_type`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `product_owner_f` FOREIGN KEY (`product_owner`) REFERENCES `tb_owner` (`product_owner`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_rate`
--
ALTER TABLE `tb_rate`
  ADD CONSTRAINT `rate_us` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`user_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `rate_wk` FOREIGN KEY (`worker_team_id`) REFERENCES `tb_worker_team` (`worker_team_id`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `user_address` FOREIGN KEY (`address_id`) REFERENCES `tb_address` (`address_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `user_sex` FOREIGN KEY (`sex_id`) REFERENCES `tb_sex` (`sex_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `user_status` FOREIGN KEY (`status_id`) REFERENCES `tb_status` (`status_id`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_worker`
--
ALTER TABLE `tb_worker`
  ADD CONSTRAINT `wk_wkt` FOREIGN KEY (`worker_team_id`) REFERENCES `tb_worker_team` (`worker_team_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
