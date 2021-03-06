-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2020 at 09:19 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `checommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `cate_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cate_name`) VALUES
(3, 'เครื่องใช้ไฟฟ้าภายในบ้าน'),
(4, 'เครื่องปรับอากาศ'),
(5, 'เฟอร์นิเจอร์'),
(6, 'กล้องวงจรปิด'),
(7, 'เครื่องใช้ไฟฟ้าในครัวเรือน');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `group_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `categories_id`, `group_name`) VALUES
(5, 6, 'กล้องวงจรปิด'),
(6, 5, 'ที่นอน'),
(7, 5, 'เตียงเหล็ก'),
(8, 5, 'เตียงไม้'),
(9, 5, 'ตู้กับข้าว'),
(10, 5, 'ตู้เสื้อผ้า'),
(11, 5, 'โต๊ะ'),
(12, 5, 'ราวตากผ้า'),
(13, 5, 'เก้าอี้'),
(14, 4, 'เเอร์'),
(15, 4, 'เครื่องฟองอากาศ'),
(16, 3, 'LED'),
(17, 3, 'เตารีด'),
(18, 3, 'พัดลม'),
(19, 3, 'ทีวี'),
(20, 3, 'เครื่องซักผ้า 1 ถัง'),
(21, 3, 'เครื่องซักผ้า 2 ถัง'),
(22, 3, 'เครื่องซักผ้าฝาหน้า'),
(23, 3, 'เครื่องดูดฝุ่น'),
(24, 3, 'ตู้เย็น 1 ประตู'),
(25, 3, 'ตู้เย็น 2 ประตู'),
(26, 3, 'เครื่องทำน้ำอุ่น'),
(27, 3, 'ตู้เเช่'),
(28, 7, 'เครื่องปั่น'),
(29, 7, 'เตาแก๊ส'),
(30, 7, 'กระทะ'),
(31, 7, 'เตาไฟฟ้า'),
(32, 7, 'เครื่องปิ้ง'),
(33, 7, 'กระทะไฟฟ้า'),
(34, 7, 'กระติกน้ำร้อน'),
(35, 7, 'หม้อ'),
(36, 7, 'เครื่องทำน้ำร้อน-เย็น');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `receive_firstname` varchar(45) NOT NULL,
  `receive_lastname` varchar(45) NOT NULL,
  `receive_email` varchar(45) NOT NULL,
  `receive_phone` varchar(15) NOT NULL,
  `receive_address` varchar(255) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `date_order` date NOT NULL,
  `time_order` time NOT NULL,
  `status` tinyint(1) NOT NULL,
  `tracking_number` varchar(45) NOT NULL,
  `last_update_date` date NOT NULL,
  `last_update_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `users_id`, `receive_firstname`, `receive_lastname`, `receive_email`, `receive_phone`, `receive_address`, `total_price`, `date_order`, `time_order`, `status`, `tracking_number`, `last_update_date`, `last_update_time`) VALUES
(23, 4, 'julalak', 'tammaphet', 'julalak79@gmail.com', '0613428029', '9 ม.13 ต.ชะมวง อ.ควนขนุน จ.พัทลุง 93110', '5810.00', '2563-11-27', '23:44:00', 2, '', '0000-00-00', '00:00:00'),
(24, 4, 'julalak', 'tammaphet', 'julalak79@gmail.com', '0613428029', '9 ม.13 ต.ชะมวง อ.ควนขนุน จ.พัทลุง 93110', '5810.00', '2563-11-28', '00:57:00', 4, 'TMDM000380214\r\n', '2563-11-28', '02:48:00'),
(25, 4, 'julalak', 'tammaphet', 'julalak79@gmail.com', '0613428029', '9 ม.13 ต.ชะมวง อ.ควนขนุน จ.พัทลุง 93110', '5810.00', '2563-11-28', '01:20:00', 1, '', '0000-00-00', '00:00:00'),
(27, 5, 'นิยม', 'ยินดี', 'customer@gmail.com', '0987857856', '199 หมู่1 ถ.วิชิตสงคราม ต.กะทู้ อ.กะทู้ จ.ภูเก็ต 83120', '6010.56', '2563-11-30', '14:42:00', 3, 'TMDM000380215\r\n', '2563-11-30', '16:27:00'),
(28, 5, 'นิยม', 'ยินดี', 'customer@gmail.com', '0987857856', '199 หมู่1 ถ.วิชิตสงคราม ต.กะทู้ อ.กะทู้ จ.ภูเก็ต 83120', '30320.00', '2563-11-30', '20:35:00', 3, '', '2563-11-30', '20:57:00');

-- --------------------------------------------------------

--
-- Table structure for table `orders_detail`
--

CREATE TABLE `orders_detail` (
  `id` int(11) NOT NULL,
  `orders_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `amount` int(5) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `sum_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders_detail`
--

INSERT INTO `orders_detail` (`id`, `orders_id`, `products_id`, `amount`, `price`, `sum_price`) VALUES
(23, 23, 5, 1, '5390.00', '5390.00'),
(24, 24, 4, 1, '5390.00', '5390.00'),
(25, 25, 5, 1, '5390.00', '5390.00'),
(27, 27, 1, 1, '5590.56', '5590.56'),
(28, 28, 10, 1, '29900.00', '29900.00');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `orders_id` int(11) NOT NULL,
  `pay_by` varchar(150) NOT NULL,
  `bank_to` tinyint(1) NOT NULL,
  `bank_from` varchar(45) NOT NULL,
  `bank_branch` varchar(45) NOT NULL,
  `amount_pay` decimal(10,2) NOT NULL,
  `slipt_img` varchar(255) NOT NULL,
  `date_pay` date NOT NULL,
  `time_pay` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `orders_id`, `pay_by`, `bank_to`, `bank_from`, `bank_branch`, `amount_pay`, `slipt_img`, `date_pay`, `time_pay`) VALUES
(10, 23, 'จุฬาลักษณ์ ธรรมเพชร', 1, 'กรุงไทย', 'เซนทรัลเฟติวัล ภูเก็ต', '5810.00', 'ตัวอย่างสลิปกรุงไทย.jpg', '2563-11-28', '00:19:00'),
(11, 24, 'จุฬาลักษณ์ ธรรมเพชร', 1, 'กรุงไทย', 'เซนทรัลเฟติวัล ภูเก็ต', '5720.00', 'ตัวอย่างสลิปกรุงไทย.jpg', '2563-11-28', '01:25:00'),
(13, 27, 'นิยาม ยินดี', 1, 'กสิกรไทย', 'สงขลา', '6011.00', 'pay.jpg', '2563-11-30', '16:09:00'),
(14, 28, 'dddd', 1, 'qwe', 'asd', '123.00', 'เครื่องทำน้ำเย็น FRESHER รุ่น FWC599+ถัง.jpg', '2563-11-30', '20:36:00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `groups_id` int(11) NOT NULL,
  `pro_number` varchar(300) NOT NULL,
  `pro_name` varchar(300) NOT NULL,
  `pro_detail` text NOT NULL,
  `pro_size` varchar(45) NOT NULL,
  `pro_weight` int(5) NOT NULL,
  `qunatity` int(5) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `product_img` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `categories_id`, `groups_id`, `pro_number`, `pro_name`, `pro_detail`, `pro_size`, `pro_weight`, `qunatity`, `price`, `status`, `product_img`) VALUES
(1, 3, 24, 'PD0001', 'ตู้เย็น SAMSUNG รุ่น RA19PT2', 'มีพื้นที่ใช้สอยที่มากขึ้น พร้อมดีไซน์ทันสมัย เพิ่มพื้นทีใช้สอยข้างประตู สามารถบรรจุขวดน้ำได้เต็มประสิทธิภาพ ถาดวางไข่และกระป๋องเครื่องดื่มดีไซน์สไลด์ง่ายต่อการหยิบใช้สอย มีช่องเก็บผักผลไม้ สามารถเก็บแตงโมได้ทั้งผลโดยไม่ต้องผ่าครึ่ง คงความสดได้ยาวนานกว่า มีโครงสร้างแข็งแกร่ง สามารถรองรับน้ำหนักได้เหนือกว่า รักษาประสิทธิภาพความเย็นดีกว่า และรักษาความสดของอาหารได้ยาวนานกว่าตู้เย็นทั่วไปถึง4เท่า ด้วยอุณหภูมิต่ำสุดถึง -12 องศา มีระบบกระจายความเย็นอย่างทั่วถึงในทุกชั้นวาง', '50.5×103.5', 36, 1, '5590.56', 0, 'ตู้เย็น SAMSUNG รุ่น RA19PT2.jpg'),
(2, 3, 24, 'PD0002', 'ตู้เย็น TOSHIBA รุ่น GRB175Z', 'มีกำลังไฟฟ้าของสินค้า 70 วัตต์ แรงดันไฟฟ้า AC 220V /50Hz  ช่องแช่แข็ง : 31 ลิตร\" ช่องแช่เย็น 139 ลิตร มีการทำความเย็น ซูเปอร์ไดเรค คูล  การควบคุมอุณภูมิแบบอัตโนมัติ ระบบละลายน้ำแข็งแบบกึ่งอัตโนมัติ ประหยัดไฟฟ้าเบอร์ 5 และมีขาตั้งตู้เย็นยึดติดกับตู้', '231.5', 32, 1, '5290.00', 0, 'ตู้เย็น TOSHIBA รุ่น GRB175Z.jpg'),
(3, 3, 24, 'PD0003', 'ตู้เย็น TOSHIBA รุ่น GRA706CI (ตู้เย็นมินิบาร์)', 'มีสวยงามกลมกลืน ขนาดกะทัดรัด เหมาะกับห้องทุกสไตล์ ทั้งห้องส่วนตัว ห้องพักโรงแรม หรือคอนโดมิเนียม ความสวยงามและสะดวกด้วยมือจับแบบฝัง พร้อมหลอดไฟเพื่อความสว่าง มีระบบละลายน้ำแข็งแบบธรรมดา พร้อมถาดรองน้ำทิ้ง   ประหยัดไฟเบอร์ 5 และรับประกันสินค้า 1 ปี รับประกันคอมเพรสเซอร์ 5 ปี', '47.5 x 50 x 49.5', 20, 4, '4590.00', 0, 'ตู้เย็น TOSHIBA รุ่น GRA706CI.jpg'),
(4, 3, 24, 'PD0004', 'ตู้เย็น Haier รุ่น HR-CEQ18 1ประตู', 'ประหยัดพลังงานด้วยน้ำยา R600 เป็นมิตรกับธรรมชาติ และชั้นวางกระจก แข็งแรง รับน้ำหนักถึง 120KG', '54.6 x 57.5 x 105.7', 29, 1, '5390.00', 0, 'ตู้เย็น Haier รุ่น HR-CEQ18 1ประตู.jpg'),
(5, 3, 24, 'PD0005', 'ตู้เย็น Haier รุ่น HR-DMB18 1 ประตู', 'มีระบบทำความเย็น:R600A และระบบกระจายความเย็น:DIRECT COOL', '119.70 x 54.60 x 57.50', 33, 1, '5390.00', 0, 'ตู้เย็น Haier รุ่น HR-DMB18 1 ประตู.jpg'),
(6, 3, 25, 'PD0006', 'ตู้เย็น HITACHI รุ่น RV450PZ', 'มีระบบทำความเย็น : Dual fan cooling และระบบกระจายความเย็น : Dual fan cooling ', '85.5 x 176.0 x 74.0 ', 86, 1, '21990.00', 0, 'ตู้เย็น HITACHI รุ่น RV450PZ.jpg'),
(7, 3, 25, 'PD0007', 'ตู้เย็น HITACHI รุ่น RVG380PZ', 'มีระบบทำความเย็น : DUAL FAN COOLING กระจายความเย็น : DUAL FAN COOLING และกำจัดกลิ่น : NANO TITANIUM', '68.00 x 177.00 x 72.00', 69, 1, '18990.00', 0, 'ตู้เย็น HITACHI รุ่น RVG380PZ.jpg'),
(8, 3, 25, 'PD0008', 'ตู้เย็น HITACHI รุ่น RS600GP2TH', 'มีระบบทำความเย็น : DUAL FAN COOLING ระบบกระจายความเย็น : DUALFAN COOLING และระบบกำจัดกลิ่น : NANO TITANIUM', '92.00 x 177.50 x 76.50', 116, 4, '49990.00', 0, 'ตู้เย็น HITACHI รุ่น RS600GP2TH.jpg'),
(9, 3, 25, 'PD0009', 'ตู้เย็น TOSHIBA รุ่น GR-TG41KDZ', 'มีประตู/ขนาด : 2ประตู/12.8คิว/363.2 ลิตร  ระบบทำความเย็น : กระจายด้วยพัดลม FAN COOL NO FROST ระบบกระจายความเย็น : DEODOZRIZER และระบบกำจัดกลิ่น : LED HYBIRD', '172.5x80.3x73.9', 78, 1, '14990.00', 0, 'ตู้เย็น TOSHIBA รุ่น GR-TG41KDZ.jpg'),
(10, 3, 25, 'PD00010', 'ตู้เย็น HITACHI รุ่น RVG550PZ', 'มีประตู/ ขนาด: 2 ประตู/ 19.9 คิว/ 562 ลิตร ระบบทำความเย็น: NO FROST TYPE และระบบกระจายความเย็น: DUAL FAN COOLING', '85.5 x 74 x 183.5', 96, 1, '29900.00', 0, 'ตู้เย็น HITACHI รุ่น RVG550PZ.jpg'),
(11, 3, 27, 'PD00011', 'ตู้แช่  THE COOL รุ่น Alex-2P PROMOTION 25 Q', 'ช่วงอุณหภูมิ : 2 to 8 °C หลอดไฟส่องสว่าง  :  LED น้ำยาทำความเย็น : R-134 (NON CFC) กำลังการกินไฟ : 385 Watt ระบบควบคุมความเย็น : Digital มีล้อ และชั้นวางปรับระดับ : 5 x 2 ชั้น', '110 x 65 x 200', 125, 2, '21900.00', 0, 'ตู้เเช่  THE COOL รุ่น Alex-2P PROMOTION 25 Q.PNG'),
(12, 3, 27, 'PD00012', 'ตู้แช่  THE COOL รุ่น SARAH 5.3 Q ฝาทึบ', 'มีช่วงอุณหภูมิ : ≤-18 °C น้ำยาทำความเย็น : R134a  กำลังไฟฟ้า: 97 วัตต์ การแสดงผลอุณหภูมิ:Analog มีล้อ : 4 ล้อ กุญแจล็อค และตะกร้า :1 ใบ', '735 x 575 x 826 ม.ม.', 34, 1, '5990.00', 0, 'ตู้เเช่  THE COOL รุ่น SARAH 5.3 Q ฝาทึบ.jpg'),
(13, 3, 27, 'PD00013', 'ตู้แช่  THE COOL รุ่น Ivy BW280 9.8 Q', 'มีน้ำยาทำความเย็น R-134a กำลังไฟ 107 วัตต์ และระบบไฟฟ้า 220 โวลล์/50Hz', '108 x 60 x 83.5', 52, 1, '15990.00', 0, 'ตู้เเช่  THE COOL รุ่น Ivy BW280 9.8 Q.jpeg'),
(14, 3, 27, 'PD00014', 'ตู้แช่  FRESHER รุ่น FC288 ขนาด 10.2 Q แช่เย็น', 'สามารถทำความเย็นได้ 2-19 องศา กระจายความเย็นได้รวดเร็วและสม่ำเสมอ และคอมเพรสเซอร์รับประกัน 5 ปี', '555 x 605 x 1936', 55, 4, '15990.00', 0, 'ตู้เเช่  FRESHER รุ่น FC288 ขนาด 10.2 Q แช่เย็น.png'),
(15, 7, 36, 'PD00015', 'เครื่องทำน้ำร้อน-น้ำเย็น JTL รุ่น DP03F', 'สามารถทำน้ำเย็นและมีน้ำธรรมดาให้ดื่มได้ และรับประกันสินค้า 1 ปี', '46 x 46 x 115', 0, 1, '3990.00', 0, 'เครื่องทำน้ำร้อน-น้ำเย็น JTL รุ่น DP03F.gif'),
(16, 7, 36, 'PD00016', 'เครื่องทำน้ำอุ่น  HITACHI รุ่น HES48VD', 'มีกำลังไฟฟ้า 4800W  แรงดันไฟฟ้า 220V, 50Hz ปลอดภัยด้วยระบบ ELCB สามารถOn-Off Switch สามารถอาบน้ำฝักบัวได้โดยไม่ต้องเปิดเครื่อง ประหยัดไฟยิ่งกว่า ผ่านมาตรฐานประหยัดไฟเบอร์ 5 ตัวเครื่องได้รับมาตรฐานอุตสาหกรรม มอก. 1693-2547 ,2066-2555 และรับประกันสินค้า 1 ปี', '21.5 x 10.5 x 37.7', 3, 1, '5390.00', 0, 'เครื่องทำน้ำอุ่น  HITACHI รุ่น HES48VD.jpg'),
(17, 7, 36, 'PD00017', 'เครื่องทำน้ำร้อน-น้ำเย็น MAZUMA รุ่น DP745C', 'มีตู้น้ำแบบคว่ำถังด้านล่างมีชั้นเก็บของ ตัวเครื่องทำจากวัสดุสังเคราะห์ ทำจากพลาสติก(ABS)ทนแรงกระแทก ทนความร้อน และปลอดภัยต่อสิ่งแวดล้อมด้วยน้ำยา R134A (NON CFC)', '36.0 X 32.0 X 94.0', 0, 1, '8190.00', 0, 'เครื่องทำน้ำร้อน-น้ำเย็น MAZUMA รุ่น DP745C.jpg'),
(18, 7, 36, 'PD00018', 'เครื่องทำน้ำร้อน-น้ำเย็น  MAZUMA รุ่น DP871UV', 'มีระบบการกรอง 5 ขั้นตอน ประเภทสินค้า พลาสติก มีระบบกรอง UV', '31 × 35 × 104', 19, 2, '17900.00', 0, 'เครื่องทำน้ำร้อน-น้ำเย็น  MAZUMA รุ่น DP871UV.jpg'),
(19, 7, 36, 'PD00019', 'เครื่องทำน้ำเย็น FRESHER รุ่น FWC599+ถัง', 'ตู้ทำน้ำเย็น 1 หัวก๊อก ระบบทำความเย็นอัตโนมัติ  ถังบรรจุน้ำเย็น 3 ลิตร ทำความเย็นต่ำสุด 3 องศา น้ำยา R134A  กำลังไฟ 220 วัตต์ : 50 เฮิร์ต การกินไฟ ความเย็น : 79 วัตต์ คอมเพรสเซอร์รับประกัน 5 ปี', '310 x 310 x 970', 0, 1, '3590.00', 0, 'เครื่องทำน้ำเย็น FRESHER รุ่น FWC599+ถัง.jpg'),
(20, 3, 21, 'PD00020', 'เครื่องซักผ้า SHARP รุ่น ES-TT70T', 'ประเภทเครื่องซักผ้า 2 ถัง  ปริมาณการใช้น้ำมาตราฐาน (ลิตร)50 จำนวนโปรแกรมการซักอัตโนมัติ 2   โปรแกรมการซักอัตโนมัติ ซักผ้าทั่วไป,ซักผ้าเนื้อบาง  ขนาด(กว้างxสูงxลืก) 759x941x440  น้ำหนักตัวเครื่อง (กก.) 20 แรงดันไฟฟ้า (โวล์ท/เฮิร์ต) 220-240/50 รับประกันมอเตอร์ 5 ปี  สีตัวเครื่อง ขาว', '759 x 941 x 440', 20, 1, '4390.00', 0, 'เครื่องซักผ้า SHARP รุ่น ES-TT70T ขนาด 7กก.jpg'),
(21, 3, 20, 'PD00021', 'WHIRLPOOL เครื่องซักผ้าฝาหน้า รุ่น WFRB10542AJW TH', 'ประเภท เครื่องอบผ้าโดยระบบลม  ขนาด 108x68.6x74.5  ความจุ 10.5 kg  คุณสมบัติ  ปรับอุณหภูมิการอบผ้า 3 ระดับ', '108 x 68.6 x 74.5', 0, 1, '27902.77', 0, 'เครื่องซักผ้าฝาหน้า  Whirlpool รุ่น 3XWTW5705SW.PNG'),
(22, 3, 20, 'PD00022', 'เครื่องซักผ้าอัตโนมัติ TOSHIBA รุ่นAW DE1100GT INVERTER', 'ความจุ 12 กก. | ถังซักสแตนเลส   S-DD Inverter นวัตกรรมใหม่แห่งเทคโนโลยี Motor ที่ออกแบบให้มีความแข็งแรง ทนทาน และใช้งานได้นานยิ่งขึ้น พร้อมเสริมแม่เหล็กชนิดพิเศษ Neodymium Magnet 48ขั้ว ช่วยเพิ่มพลังซัก ประหยัดพลังงาน ลดการสั่นสะเทือนและทำงานเงียบ ไร้เสียงรบกวน', '65.0 x 67.0 x103.', 10, 1, '10990.00', 0, 'เครื่องซักผ้าอัตโนมัติ  TOSHIBA รุ่น AWDE1100GT INVERTER.PNG'),
(23, 3, 22, 'PD00023', 'เครื่องซักผ้าฝาหน้า  HITACHI รุ่น BD-W80XWV', 'ระบบทำความสะอาดถังซักอัตโนมัติ (Auto Self Clean)   มอเตอร์อินเวอร์เตอร์สมรรถนะสูง (Smart Drive Inverter)       ถังซักขนาดใหญ่ กว้างถึง 510 มม. ซักผ้าสะอาดยิ่งขึ้น  โปรแกรมการซัก 16 โปรแกรมอัตโนมัติ  ขนาดรวมติดตั้ง (กxลxส) : 606 x 627 x 853 มม.', '606 x 627 x 853', 0, 1, '26900.00', 0, 'เครื่องซักผ้าฝาหน้า  HITACHI รุ่น BD-W80XWV.jpg'),
(24, 7, 34, 'PD00024', 'กระติกน้ำร้อน SHARP รุ่น KPB16S', 'ขนาด 1.6ลิตร\"  กำลังไฟฟ้าเข้า610 วัตต์  ขนาดสินค้า: (ก x ย x ส) 20.2 x 25.8 x 30.1 ซม. น้ำหนัก: 1.6 กก.  การรับประกัน: 1 ปี (รับประกันชุดทำความร้อน 3 ปี)', '20.2 x 25.8 x 30.1', 2, 5, '700.00', 0, 'กระติกน้ำร้อน SHARP รุ่น KPB16S.jpg'),
(25, 7, 34, 'PD00025', 'กระติกน้ำร้อน AJ รุ่น TP930ขนาด 2.8ลิตร', 'แรงดันไฟฟ้า 220V/50Hz  กำลังไฟฟ้า 750 W  ความจุ 2.8 ลิตร  สีของสินค้า  ขาว  Packaging Dimension (กxยxส) 24x28x37 ซ.ม.  Weight Detail 2.9ก.ก.', '24 x 28 x 37', 3, 6, '750.00', 0, 'กระติกน้ำร้อน AJ รุ่น TP930ขนาด 2.8ลิตร.jpg'),
(26, 7, 34, 'PD00026', 'กระติก MITSUSHITA รุ่น KP2421', 'ความจุ 3.2 ลิตร 650W ', '29.0 x 22 x 41.8 ', 2, 1, '579.00', 0, 'กระติก MITSUSHITA รุ่น KP2421.PNG'),
(27, 7, 34, 'PD00027', 'กระติกน้ำร้อน KITTY รุ่น KT282ขนาด 2.5 ลิตร', 'ขนาดคามจุ 2.5 ลิตร', '21.5 x 30 x 33', 2, 12, '690.00', 0, 'กระติกน้ำร้อน KITTY รุ่น KT282ขนาด 2.5 ลิตร.jpg'),
(28, 7, 34, 'PD00028', 'กระติกน้ำ DORAAEMON รุ่น KT-283ขนาด 2.5 ลิตร', 'สามารถใช้งานง่าย สะดวก และประหยัดเวลาในการต้มน้ำได้เป็นอย่างดี  สามารถใช้งานง่ายและสะดวก  สามารถให้น้ำในปริมาณมากเพียงกดเบาๆ  ระบบต้มน้ำและรักษาความร้อนอัตโนมัติ  วัสดุภายในกระติกผลิตจากสแตนเลส ทนทาน ไม่เป็นสนิมมีสเกล บอกระดับน้ำ  ขนาดความจุ 2.5 ลิตร  ทำความสะอาดง่าย  ลิขสิทธิ์แท้ 100%  ดีไซน์สวยงาม  รับประกันสินค้า  รับประกันสินค้า 1 ปี', '24 X 24 X 35', 2, 1, '690.00', 0, 'กระติกน้ำ DORAAEMON รุ่น KT-283ขนาด 2.5 ลิตร.jpg'),
(29, 7, 34, 'PD00029', 'กระติกน้ำร้อน HABARA รุ่น NHP289', 'กระติกน้ำสีขาว สกรีนลายดอกไม้สีสันสดใส   แบบกดน้ำออก เพียงปลายนิ้วสัมผัส  เก็บอุณหภูมิความร้อนได้ดี ทำให้ต้มน้ำได้อย่างรวดเร็ว  ต้มน้ำให้เดือดภายใน 5 นาที ที่จุดเดือด 100 องศาเซลเซียส  ฝาด้านในประกอบด้วยขอบยางกันน้ำซึม \r\nฝากระติกถอดออกได้ง่าย เพื่อความสะดวกในการทำความสะอาดภายใน  สุดด้วยฐานกระติกแบบหมุนได้ 360 องศา\r\n', '', 0, 2, '499.00', 0, 'กระติกน้ำร้อน HABARA รุ่น NHP289.PNG'),
(30, 7, 35, 'PD00030', 'หม้อ FAMILY รุ่น BC018P', 'กำลังไฟ : 600  วัตต์  แรงดันไฟฟ้า  220 โวลต์  50  เฮิรตซ์   ตัวหม้อสีขาว  ขนาดความจุ  1.8  ลิตร  ขนาดสินค้า  270x330x270 มม  สายไฟยาว  1.10  เซนติเมตร', '', 0, 2, '599.00', 0, 'หม้อ  FAMILY รุ่น BC018P.jpg'),
(31, 7, 35, 'PD00031', 'หม้อ LOVE STAR รุ่น DSR20', 'รูปทรงทันสมัย ลวดลายสวยงาม  หม้อในผลิตจากอลูมิเนียม คุณภาพดี  มีระบบอุ่นอัตโนมัติ จุ 1 ลิตร แรงดันไฟฟ้า 220V 50Hz  กำลังไฟฟ้า 400W ', '', 0, 1, '499.00', 0, 'หม้อ  LOVE STAR รุ่น DSR20.jpg'),
(32, 7, 35, 'PD00032', 'หม้อ SHARP รุ่น KSHD15', 'ขนาดความจุ(ลิตร) : 1.5  ระบบการทำงาน : อนุอัตโนมัติ   เคลือบหม้อด้านในด้วย : อลูมิเนียมอัลลอย เคลือบอโนไดซ์ป้องกันสนิม กำลังไฟฟ้า(วัตต์) : 530   รับประกัน(ปี) : 3   ', '30.8x24.9x25.7', 0, 11, '690.00', 0, 'หม้อ  SHARP รุ่น KSHD15.jpg'),
(33, 7, 35, 'PD00033', 'หม้อ KASHIWA รุ่น RC180', 'ผลิตจากวัสดุคุณภาพดี ขนาด 1.8 ลิตร พร้อมซึ้งนึ่ง   แรงดันไฟฟ้า 220 โวลต์  ความถี่ไฟฟ้า 50 เฮิร์ต กำลังไฟฟ้า 650 วัตต์', '', 0, 10, '399.00', 0, 'หม้อ  KASHIWA รุ่น RC180.jpg'),
(34, 7, 35, 'PD00034', 'หม้อ SHARP รุ่น KSHD55', 'ระบบการทำงาน : อุ่นอัตโนมัติ  หม้อด้านในด้วย : อลูมิเนียมอัลลอย เคลือบอโนไดซ์ป้องกันสนิมดี  แผ่นความร้อนขนาดใหญ่ที่ออกแบบมาเฉพาะมีเทอร์โมสตัทและฟิวส์ควบคุมอุณหภูมิ กำลังไฟฟ้า : 1,550 W. รับประกัน 3 ปี', '43. x 40.0 x 32.5', 7, 1, '2450.00', 0, 'หม้อ  SHARP รุ่น KSHD55.jpg'),
(35, 7, 28, 'PD00035', 'เครื่องปั่น NATIONAL รุ่น MXT110PN', 'ปริมาณความจุโถปั่น (ลิตร):1  วัสดุโถปั่น:พลาสติก โถปั่นแห้ง:มี  กำลังมอเตอร์(วัตต์):450', '', 0, 1, '699.00', 0, 'เครื่องปั่น NATIONAL รุ่น MXT110PN.PNG'),
(36, 7, 28, 'PD00036', 'เครื่องปั่น SHARP รุ่น EMSMART4', 'ใบมีดสแตนเลสฟันปลา 4 แฉก ไม่เป็นสนิม ปรับความเร็วได้ 2 ระดับ พร้อมปุ่ม PULSE  ระบบนิรภัยพิเศษ 2 ระบบ  MOTER SAFETY ป้องกันมอเตอร์ไหม้ เครื่องจะหยุดทำงาน  SAFETY LOCK เครื่องจะไม่ทำงาน หากวางโถปั่นไม่เข้าที่  ปุ่ม Reset ใต้ฐานเครื่อง  มอเตอร์ทรงพลัง 450 วัตต์  ฟิลเตอร์กรองกาก สะดวก ใช้งานง่าย', '202 x 401 x 194', 1, 4, '1040.00', 0, 'เครื่องปั่น SHARP รุ่น EMSMART4.jpg'),
(37, 7, 28, 'PD00037', 'เครื่องปั่น AJ รุ่น BL002 350W ขนาด 1.5 ลิตร', 'แรงดันไฟฟ้า 220-240 โวลท์  กำลังไฟฟ้า 350 วัตต์ ครบในเครื่องเดียวด้วยเครื่องปั่นอเนกประสงค์ทรงพลัง ความจุ 1.5 ลิตร    ตัวเครื่องผลิตจากพลาสติกคุณภาพดีและมีประสิทธิภาพในการทำงานสูง สามารถถอดล้างและทำความสะอาดได้ง่าย พร้อมด้ามจับที่กระชับมือ  ใบมีด 4 แฉกผลิตจากสแตนเลสไร้สนิม แข็งแรง ทนทานต่อการใช้งาน สายไฟยาว 120 ซม. มีฐานกันลื่น  มีอุปกรณ์เสริมแถมโถบดอเนกประสงค์แบบแห้งวัสดุทำจากพลาสติกอีก 1 ชุดแบบใบมีด 2 แฉก ขนาด 11.5x11.5x12ซม. สำหรับบดและสับส่วนผสมแข็งและอ่อน  สินค้ารับประกัน 1 ปี', '16.5 x 16.5 x 37.5', 2, 1, '790.00', 0, 'เครื่องปั่น AJ รุ่น BL002 350W ขนาด 1.5 ลิตร.jpg'),
(38, 7, 28, 'PD00038', 'เครื่องปั่น OTTO รุ่น BE127', 'ใช้ปั่นน้ำผัก และผลไม้ ทำมิลล์เชค หรือผสมอาหารได้ทั้งร้อนและเย็น   โถปั่นความจุ 2 ลิตร (70 ออนซ์) ทำจากพลาสติก ABS อย่างดี  ใบมีดสเเตนเลสมี 6 แฉก สามารถปั่นได้ทั้งอาหารแห้งและเปียก  สามารถปั่นน้ำแข็ง , ของแห้ง , เมล็ดถั่ว , เมล็ดกาแฟ , เนื้อสัตว์ , ผักและผลไม้ ฯลฯ  ปุ่มปรับความเร็วได้ หลายระดับ MIN-MAX  มีปุ่ม Pulse สำหรับหยุดชั่วคราว และช่วยในการบดน้ำแข็ง  สามารถทนความร้อนได้สูงสุดถึง 100 องศาเซียส  มีระบบ Safety Locks ผลิตภัณฑ์จะไม่ทำงาน หากโถผสมอาหารไม่อยู่ในตำแหน่งที่ถูกต้อง กำลังไฟฟ้า 1200 วัตต์  รับประกันสินค้า 1 ปี  ความจุ 2 ลิตร สีขาว - แดง', '', 0, 1, '1490.00', 0, 'เครื่องปั่น OTTO รุ่น BE127_1490.PNG'),
(39, 7, 28, 'PD00039', 'เครื่องปั่น SHARP รุ่น EMICEPOWER', 'ใช้ปั่นน้ำผัก และผลไม้ ทำมิลล์เชค หรือผสมอาหารได้ทั้งร้อนและเย็น โถปั่นความจุ 2 ลิตร (70 ออนซ์) ทำจากพลาสติก ABS อย่างดี  ใบมีดสเตนเลสมี 6 แฉก สามารถปั่นได้ทั้งอาหารแห้งและเปียก  สามารถปั่นน้ำแข็ง , ของแห้ง , เมล็ดถั่ว , เมล็ดกาแฟ , เนื้อสัตว์ , ผักและผลไม้ ฯลฯ สามารถทนความร้อนได้สูงสุดถึง 100 องศาเซียส  มีระบบ Safety Locks ผลิตภัณฑ์จะไม่ทำงาน หากโถผสมอาหารไม่อยู่ในตำแหน่งที่ถูกต้อง  กำลังไฟฟ้า 1200 วัตต์  รับประกันสินค้า 1 ปี  ความจุ 2 ลิตร สีขาว - ดำ', '21.6 × 43.6 × 20.7', 4, 5, '1240.00', 0, 'NoImage.gif'),
(40, 3, 16, 'PD00040', 'LED Skyworth รุ่น 14E57', 'Type of TV : LED   TVModel : 14E57  Size : 14นิ้ว', '', 0, 1, '2990.30', 0, 'LED Skyworth รุ่น 14E57.jpg'),
(41, 3, 16, 'PD00041', 'LED TOSHIBA รุ่น 23PB200T', 'ความละเอียดหน้าจอ 1920x1080  Full HD  3มิติ  LED Backlight Contrast Ratio 30,000:1  สว่าง 250cd/m2 อัตราความเร็วในการตอบสนองภาพ 14 ms  548 x 423 x 135 mm. with stand, 548 x 396 x 46 mm. without stand 4.4 kg with stand, 3.9kg w/o stand', '', 4, 1, '5290.00', 0, 'LED TOSHIBA รุ่น 23PB200T.PNG'),
(42, 3, 16, 'PD00042', 'LED ACONATIC 24 นิ้ว รุ่น 24HD513AN', 'ระบบภาพ:HD  RESOLUTION(PIXELS):1366 x 768  ลักษณะจอ:FLAT  FEATURES:DIGITAL TV  HDR:NO ช่องต่อ(ช่อง):PC INPUT 1, USB 2, HDMI 1, COMPONENT 1, COMPOSITE 1  ขนาดเครื่อง(ซม.): 33.10 X 52.80 X 6.00  CONTRAST RATIO:1000:1  BRIGHTNESS(CD/M):200  RESPONSETIME(MS):14  มุมมองภาพ(องศา):178/178  น้ำหนัก(กิโลกรัม):2.2 ขนาดจอ(นิ้ว):24  การรับประกัน(ปี):3   ช่องต่อหูฟัง(ช่อง):1   ขนาดเครื่องรวมขาตั้ง:37.10 X 52.80 X 18.10', '6.7x54.9x32.7', 2, 5, '2790.00', 0, 'LED ACONATIC 24 รุ่น 24HD513AN.jpg'),
(43, 3, 16, 'PD00043', 'LED ACONATIC 43 นิ้ว รุ่น AN43DF800SM Smart TV', 'ความละเอียด 1920 x 1080 พิกเซล  ความสว่าง 250cd/㎡ (TYP)   Contrast 1000:1 มุมมองจอภาพกว้างถึง 178/178 การตอบสนอง 8ms  อัตราส่วนภาพ 16:9  ลำโพงสเตอริโอ 10 วัตต์ 1 คู่  พอร์ตเชื่อมต่อ   HDMI: 2 ช่อง, USB: 2 ช่อง,AV Input: 1 ช่อง, Component input: 1 ช่อง,Headphone Output: 1 ช่อง  การใช้พลังงาน   Power Supply : 100-240V 50/60Hz', '98 x 65 x 25', 10, 1, '109000.00', 0, 'LED ACONATIC 43รุ่น AN43DF800SM Smart TV.PNG'),
(44, 3, 16, 'PD00044', 'LED PRISMAPRO 32 นิ้ว รุ่น KML32H8', 'ขนาดจอ 32 นิ้ว ความละเอียด Resolution 1920x1080(FULL HD )  Aspect Ratio 16:9  Contrast Ratio 10,000:1  ความสว่าง 450 cd/m2   รองรับการเชื่อมต่อครบครันทั้ง HDMI, AV, YPbPr, VGA และ RF รองรับสัญญาณทีวีทั้ง Analog TV และ Digital TV (ไม่ต้องต่อกล่องSET TOP BOX)  รองรับระบบ PVR  อัดรายการจากช่องดิจิตอลทีวีได้ผ่านUSB สามารถเล่นไฟล์ เพลง วิดิโอ ภาพ และ ข้อความ ผ่าน USB Multimedia OS : Android 4.4.4  Ram : 1GB  Rom : 4GB Connection - Ethernet (RJ45), Wifi (Built-in) Store : Google Playstore', '', 0, 1, '7990.00', 0, 'NoImage.gif'),
(45, 7, 29, 'PD00045', 'เตาแก๊ส HANABISHI รุ่น RY144', 'หัวเตาเป็นแบบหัวธรรมดา ตัวโครงทำจากแสตนเลสทั้งตัว  ไม่เป็นสนิม ทำความสะอาดง่าย ลูกบิดทำด้วยวัสดุแบล๊คไลท์ทนความร้อนสูงไม่เป็นสื่อนำความร้อน ', '290 x 420 x 145 ', 3, 1, '499.05', 0, 'เตาแก๊ส HANABISHI รุ่น RY144.png'),
(46, 7, 29, 'PD00046', 'เตาแก๊ส JTL รุ่น GI118', 'หน้าสเตนเลสข้างเคลือบสี ทำความสะอาดง่าย แข็งแรง เงางาม หัวเตาทองเหลือง ทนความร้อนสูง แข็งแรงทนทาน  ปรับระดับความร้อนได้ ระดับ แรง -ปานกลาง- ไฟอ่อน-ไฟหรี่  ขารองภาชนะเคลือบอีนาเมล ทนความร้อนสูง  ระบบวาล์ว (Safety Valve) ปลอดภัยเรื่องแก๊สรั่ว', '', 0, 1, '549.05', 0, 'เตาแก๊ส JTL รุ่น GI118.jpg'),
(47, 7, 29, 'PD00047', 'เตาแก๊ส Lucky Flema รุ่น AT502', '\"รุ่น AT-502  แบรนด์ Lucky Flame  เตาแก๊สแบบ 2 ชั้น จำนวน 1 หัวเตา หัวเตาเหล็กหล่อ หนาขนาด 5นิ้ว', '43.5 x 56.5 x 82', 20, 15, '1790.00', 0, 'เตาแก๊ส Lucky Flema รุ่น AT502.jpg'),
(48, 7, 29, 'PD00048', 'เตาแก๊ส ไดน่าเฟรม หนาแสตนเลสเดี่ยวรุ่นLK112', 'ขนาด 430 x 530 x 770 มม เตาแก๊สตู้สแตนเลส  แบบตั้งพื้นหัวเตา  เหล็กหล่อขนาด 130 mm.   1 หัวเตา\"', '30 x 530 x 770', 8, 4, '899.00', 0, 'เตาแก๊ส ไดน่าเฟรม หนาแสตนเลสเดี๋ยวรุ่นLK112.jpg'),
(49, 7, 29, 'PD00049', 'เตาแก๊ส Lucky Flema รุ่น AT402', 'ชนิดหัวเตา หัวเตาธรรมดา  วัสดุหัวเตา เหล็กหล่อ  จำนวนหัวเตา 2 หัวเตา ระดับการปรับไฟ 4 ระดับ ด้านหน้าเตาแก๊ส STL #430 BA Full Body ระบบจุดประกายไฟ จุดประกายไฟอัตโนมัติ (Piezoelectric)  มีฉลากประสิทธิภาพสูง  ข้อมูลจำเพาะผลิตภัณฑ์  ตราสินค้า ลัคกี้เฟลม รับประกันวาล์วเปิด-ปิด 5 ปี  หน้ากว้าง (mm) 815 ความลึก (mm) 565 ความสูง (mm) 820 ', '81.50 x 56.50 x 82', 17, 1, '3390.34', 0, 'เตาแก๊ส Lucky Flema รุ่น AT402.jpg'),
(50, 7, 33, 'PD00050', 'กระทะไฟฟ้า IN HOUSE รุ่น EP-1002', 'กระทะไฟฟ้า 12นิ้ว My Home EP-1002  แรงดันไฟฟ้า : 220 โวลต์  50 เฮิรตช์  กำลังไฟฟ้าที่ใช้ 1300วัตต์(W)', '32 x 38 x 24', 3, 3, '690.00', 0, 'กระทะไฟฟ้า IN HOUSE รุ่น EP-1002.jpg'),
(51, 7, 33, 'PD00051', 'กระทะไฟฟ้า MITSUMARU รุ่น ACP-142L', 'สามารถปรับอุณหภูมิได้สูงสุด 200 องศา ควบคุมอุณหภูมิกระทะด้วยเทอร์โมสตัท  หูจับกระทะเป็นพลาสติก ABS ทนความร้อนได้ดีไม่ร้อนมือ   สินค้ารับประกัน 1 ปี  กำลังไฟฟ้า 1,000 วัตต์ แรงดัน 220 โวลท์ 50 เฮิรตซ์  ', '33x33x20', 1, 14, '599.00', 0, 'กระทะไฟฟ้า MITSUMARU รุ่น ACP-142L.PNG'),
(52, 7, 33, 'PD00052', 'กระทะไฟฟ้า HANABISHI รุ่น HEP1900S', 'กำลังไฟ 1,000 วัตต์  ทันสมัย สวยเฉียบ เล็กกระทัดรัด สามารถประกอบอาหารได้หลายรูปแบบ', '', 2, 1, '659.00', 0, 'กระทะไฟฟ้า HANABISHI รุ่น HEP1900S.jpg'),
(53, 7, 33, 'PD00053', 'กระทะไฟฟ้า HANABISHI รุ่น HEP190', 'ขนาด 12 นิ้ว  ความจุ 2.5ลิตร  กำลังไฟฟ้า 1000 วัตต์  แรงดันไฟฟ้า/ความถี่ 220V./50Hz.  ความยาวสายไฟ 1.20 เมตร\" กระทะไฟฟ้า HANABISHI รุ่น HEP10\"  ความจุ(ลิตร):1.5\"  กระทะหน้ากว้าง(นิ้ว):10\" ฟังก์ชั่นการทำงาน:ทอด ผัด แกง ต้ม  กำลังไฟฟ้า(วัตต์) : 750', '32 x 32.5 x 15', 2, 1, '569.00', 0, 'กระทะไฟฟ้า HANABISHI รุ่น HEP190.jpg'),
(54, 7, 33, 'PD00054', 'กระทะไฟฟ้า HANABISHI รุ่น HEP10', 'สามารถเลือกระดับความร้อนได้ตามความต้องการ ด้วยลูกบิดปรับอุณหภูมิ ปลอดภัยด้วยระบบตัดต่อการทำงานของ Thermostat  สายปลั๊กสามารถถอดแยกออกจากตัวเครื่องได้ ขนาดกะทัดรัด สามารถใช้งานได้แม้ในพื้นที่จำกัด', '0.5 x 17.5 x 27.7', 1, 1, '499.00', 0, 'กระทะไฟฟ้า HANABISHI รุ่น HEP10.jpg'),
(55, 7, 30, 'PD00055', 'กระทะ Tefal รุ่น C1846414', 'กระทะทรงลึกแบบมีขอบหยัก เส้นผ่าศูนย์กลาง 24 ซม. ลึก 8ซม.', '49 x 30 x 12', 1, 2, '690.00', 0, 'กระทะ Tefal รุ่น C1846414.jpg'),
(56, 7, 30, 'PD00056', 'กระทะ Tefal รุ่น C1849624', 'แบรนด์ TEFAL รุ่น C1849624   ขนาดเส้นผ่านศูนย์กลาง 32 ซม.  รูปทรงกลม สีดำ วัสดุ เคลือบ Non Stick 5 ชั้น  ความหนาของกระทะ 2.5 มม.  ใช้ได้กับหัวเตาทุกประเภท   มีเทอร์โมสปอต และฝาปิด', '', 0, 4, '1390.00', 0, 'กระทะ Tefal รุ่น C1849624.jpg'),
(57, 7, 30, 'PD00057', 'กระทะ Tefal รุ่น C1849824', 'ผิวเคลือบ Non Stick 5 ชั้น กระทะหนา 2.5 มม. อาหารไม่ติดกระทะ ใช้น้ำมันน้อย  มีจุดแดงคือ จุดเทอร์โมสปอต ทำให้อาหารไม่อมน้ำมัน  ใช้ได้กับเตาแก๊ส เตาฮาโดรเจน และเตาไฟฟ้า  มีฝาปิดแก้ว   ขนาดเส้นผ่าศูนย์กลาง 34 ซม.  สีดำ', '', 0, 5, '1590.00', 0, 'กระทะ Tefal รุ่น C1849824.jpg'),
(58, 7, 30, 'PD00058', 'กระทะ Tefal รุ่น C6150414', 'แบรนด์ TEFAL  รุ่น C6150414  ขนาดเส้นผ่านศูนย์กลาง 24 ซม.  รูปทรงแบน  สีแดง  วัสดุ เคลือบ Non Stick 5 ชั้น', '', 0, 5, '1090.00', 0, 'กระทะ Tefal รุ่น C6150414.jpg'),
(59, 7, 30, 'PD00059', 'กระทะ Tefal รุ่น C6150514', 'แบรนด์ TEFAL  รุ่น C6150514  ขนาดเส้นผ่านศูนย์กลาง 26 ซม.  รูปทรงแบน สีแดง  วัสดุ เคลือบ Non Stick 5 ชั้น', '', 0, 5, '1190.00', 0, 'กระทะ Tefal รุ่น C6150514.jpg'),
(60, 3, 17, 'PD00060', 'เตารีด INTER NATIONAL CB95', 'เตารีด inter รุ่น CB-95  น้ำหนัก 3.5 ปอนด์  แรงดันไฟฟ้า AC 220V/ 50 Hz  กำลังไฟฟ้า 1000 วัตต์ หน้าเตารีดอลูมิเนียมขัดเงา  ไฟแสดงสถานการณ์ทำงาน  ตัดไฟอัตโนมัติป้องกันการลัดวงจรด้วยเทอร์โมสแตด  ด้ามจับถนัดมือและเตารีดร้อนเร็วภายใน 2 นาที  ระดับความร้อนสามารถปรับได้ 6 ระดับเพื่อง่ายต่อ การรีดผ้าแต่ละประเภท  สีดำ, เขียว,น้ำเงิน', '11 x 27.2 x 12.5', 1, 4, '359.00', 0, 'เตารีด INTER NATIONAL CB95.jpg'),
(61, 3, 17, 'PD00061', 'เตารีด NATIONAL รุ่น NI21A 4.5 ปอนด์', 'เตารีดNationalกล่องแดงตัวหนักขนาด4.5P  ขนาดตัวใหญ่', '', 0, 9, '499.00', 0, 'เตารีด NATIONAL รุ่น NI21A 4.5 ปอนด์.jpg'),
(62, 3, 17, 'PD00062', 'เตารีด Tefal รุ่น FV1320TO', 'กำลังไฟ 1400 วัตต์ แผ่นทำความร้อนเตารีดแบบ Ultragliss Diffusion  พลังไอน้ำพิเศษ 50 กรัมต่อนาที รีดแนวตั้ง แท้งค์จุน้ำ ได้มาตรฐาน มอก 366/2547  สายไฟยาว 1.8 เมตร  แท่งดักจับตะกรัน SELF CLEANING  ช่องกระจายไอน้ำ 21 ช่อง', '', 0, 11, '599.00', 0, 'เตารีด Tefal รุ่น FV1320TO.jpg'),
(63, 3, 17, 'PD00063', 'เตารีด Tefal รุ่น FS2525TO', 'กำลังไฟ 2000 วัตต์  พลังไอน้ำออกต่อเนื่อง 25 กรัม/นาที เพิ่มพลังไอน้ำ 90กรัม/นาที  การตั้งค่าพลังไอน้ำและอุณหภูมิสามารถตั้งค่าด้วยตนเอง', '', 0, 1, '490.00', 0, 'เตารีด Tefal รุ่น FS2525TO.jpg'),
(64, 3, 17, 'PD00064', 'เตารีด SHARP AMP565T', 'ด้ามจับ ออกแบบใหม่ 2-Tones สวยงาม จับถนัดมือยิ่งขึ้น  ปรับระดับความร้อนตามชนิดของเนื้อผ้าได้ถึง 4 ระดับ ให้ความร้อนสม่ำเสมอ รีดผ้าเรียบได้ทุกเนื้อผ้า เตารีดเคลือบโพลีฟลอน (POLY-FLON) กว้าง 109 มม. สูง 129 มม. ลึก 247 มม.  กำลังไฟฟ้าเข้า 1,000 วัตต์\"', '', 0, 4, '660.00', 0, 'เตารีด SHARP AMP565T.jpg'),
(65, 3, 23, 'PD00065', 'เครื่องดูดฝุ่น HITACHI รุ่น CVSC22V', 'เทคโนโลยี POWER BOOST CYCLONE  กำลังมอเตอร์ 2,200 วัตต์  กำลังดูด 460 วัตต์  ระบบ CYCLONE', '35.5 x 42 x 59', 6, 3, '13900.00', 0, 'เครื่องดูดฝุ่น HITACHI รุ่น CVSC22V.jpg'),
(66, 3, 23, 'PD00066', 'เครื่องดูดฝุ่น HITACHI รุ่น CV940Y', 'พลังมอเตอร์ 1,600 วัตต์ / พลังดูด 320 วัตต์   ที่เก็บอุปกรณ์ในตัวเครื่อง ถังขนาดใหญ่ จุฝุ่นได้มากถึง 15 ลิตร  หัวแปรงดูดแบบ 2 จังหวะ เพื่อสภาพพื้นผิวที่แตกต่างกัน  สายดูดปรับหมุนได้รอบทิศทาง ดูดฝุ่นได้อย่างอิสระ ตัวเครื่องสามารถใช้เป็นที่เป่าลมได้  มีหัวดูดขนแปรงกับหัวดูดตามซอก สินค้า (กว้าง x ลึก x สูง) : 335 x 397 x 500 มม.', '	397 x 335 x 500', 5, 1, '3290.00', 0, 'เครื่องดูดฝุ่น HITACHI รุ่น CV940Y.jpg'),
(67, 3, 23, 'PD00067', 'เครื่องดูดฝุ่น HITACHI รุ่น PvXA100แบบแบตเตอรี่', 'หัวแปรงมอเตอร์หมุนอัตโนมัติ (Auto Drive Head) ประหยัดแรงในการดูดฝุ่น  กล่องเก็บฝุ่นไซโคลน บีบอัดฝุ่นเป็นก้อน ทิ้งฝุ่นง่าย ไม่ฟุ้งกระจาย  แบตเตอรี่ Ni-MH 14.4 โวลต์ ดูดฝุ่นต่อเนื่องได้ 30 นาที  2 in 1 ดีไซน์ แบบด้ามจับ (Handstick) และแบบมือถือ (Handheld)  พับครึ่งเก็บได้เมื่อไม่ใช้งาน ประหยัดพื้นที่  หลอดไฟ LED 6 ดวงที่หัวแปรง เพิ่มความสว่าง ง่ายต่อการมองเห็นแม้ในซอกหลืบหรือใต้เฟอร์นิเจอร์', '170 x 270 x 1,100', 3, 4, '8490.00', 0, 'เครื่องดูดฝุ่น HITACHI รุ่น PvXA100แบบแบตเตอรี่.jpg'),
(68, 3, 23, 'PD00068', 'เครื่องดูดฝุ่น MD รุ่น V-1703', 'เครื่องดูดฝุ่น แบบมือจับ พกพาสะดวก ใช้ได้ทั้งในบ้านและในรถ รุ่น V-1703 สามารถใช้ดูดพื้นบ้าน พรม ภายในรถยนต์ บนเฟอร์นิเจอร์ต่างๆ รวมทั้งคีย์บอร์ด น้ำหนักเบา เพียง 1 กิโลกรัม สะดวก กระทัดรัด  สามารถแขวนเก็บ หรือตั้งเก็บได้โดยไม่เกะกะ  กล่องเก็บฝุ่นสามารถถอดล้างได้  กำลังไฟ ขนาด 400W  แรงดันไฟฟ้า 220 V 50H  ความดังของเสียง < 78 เดซิเบล  ความจุถังเก็บฝุ่น 1.2 ลิตร  กำลังดูด > 15 กิโลพาสคาล   ขนาดของผลิตภัณฑ์ 113 * 15 * 17 ซม.  น้ำหนักสุทธิ 1.3 ก.ก. รวมกล่อง 15 ก.ก.  ท่อเหล็กมือจับ  สวิทซ์ เปิด / ปิด  ปุ่มสำหรับเปิดถังเก็บฝุ่น  ใส้กรอง HEPA  ถังเก็บฝุ่น  หัวแปรงดูดฝุ่น (สำหรับดูดพื้น และ ดูดมู่ลี่ เข้าซอกเข้ามุม)  หูจับสำหรับเก็บสายไฟ', '113 * 15 * 17', 1, 8, '2990.00', 0, 'เครื่องดูดฝุ่น MD รุ่น V-1703.jpg'),
(69, 3, 23, 'PD00069', 'เครื่องดูดฝุ่น DAEWOO รุ่น RCC230', 'กำลังไฟ 1250w  ความสามารถดูดและเป่า ได้ทั้งแบบแห้งและเปียก', '', 0, 1, '2390.00', 0, 'เครื่องดูดฝุ่น DAEWOO รุ่น RCC230.jpg'),
(70, 3, 18, 'PD00070', 'พัดลม VNP รุ่น V-Hitech 16', 'ใบพัดขนาด 16 นิ้ว', '', 0, 40, '499.00', 0, 'no photo.gif'),
(71, 3, 18, 'PD00071', 'พัดลม TOSHIBA รุ่น F234', 'ขนาดใบพัด 16 นิ้ว ควบคุมการทำงานด้วยรีโมทคอนโทรลไร้สาย ระบบ Rhythm ให้สายลมแรงสลับเบาดุจธรรมชาติ  แผงสวิทซ์ ระบบสัมผัสพร้อมตั้งเวลาอัตโนมัติได้ 1 2 4 และ 8 ชั่วโมง  มอเตอร์ทนทานด้วย', '', 0, 3, '2190.00', 0, 'no photo.gif'),
(72, 3, 18, 'PD00072', 'พัดลมไอน้ำ MASTERKOOL รุ่น 07EX', 'ขนาดตัวเครื่อง 31 x 31 x 62.5 ซม.  ขนาดช่องลม 12x12 ซม. ของใบพัด โพรงกระรอก  ขนาดใบพัด 7.8 นิ้ว  ปริมาณลม 700m³/hr  ปรับระดับ 3 ระดับ  ครอบคลุมพื้นที่ 12 ตรม.  ค่าไฟฟ้า 26 สตางค์/ชั่วโมง  กำลังไฟฟ้า 88 วัตต์ แหล่งจ่ายไฟฟ้า 220 v/50Hz  เติมน้ำ 8 ลิตร ใช้งานต่อเนื่อง 8 - 12 ชั่วโมง น้ำหนักสุทธิ(ก่อนเติมน้ำ) 6.5 กิโลกรัม น้ำหนักขณะทำงาน 14.5 กิโลกรัม อัตราการใช้น้ำ 0.5 ลิตร/ชั่วโมง ระดับเสียง 55 เดซิเบล ระบบสัมผัสหน้าจอ ควบคุมด้วยรีโมทคอนโทรล แผ่นกระดาษทำความเย็น มี 4 ด้าน วัสดุพลาสติก ABS รับประกันสินค้า 1 ปี  รับประกันมอเตอร์พัดลม 3 ปี', '31 x 31 x 62.5', 7, 2, '3190.00', 0, 'พัดลมไอน้ำ MASTERKOOL รุ่น 07EX.jpg'),
(73, 3, 18, 'PD00073', 'พัดลม ACCORD รุ่น 18HC', 'พัดลมอุตสาหกรรม ใบพัดพลาสติก ABS ตะแกรงและฐานวางเหล็กชุบโครเมี่ยม ระดับแรงลมได้ 3 ระดับ ทิศทางและองศาหน้าพัดลมได้  ให้แรงลมแรง พร้อมยางรองขาป้องกันการเคลื่อนที่ เหมาะใช้งานหรือตั้งวางในพื้นที่จำกัดและต้องการลมพัดระดับขา ', '', 5, 1, '1190.00', 0, 'พัดลม ACCORD รุ่น 18HC.jpg'),
(74, 4, 15, 'PD00074', 'แอร์ Midea รุ่น MSAEB-12CRN8 ขนาด12,000BTU', 'ครื่องปรับอากาศติดผนัง ขนาด 12,000 BTU  เหมาะสำหรับขนาดห้อง 18 ตร.ม. และท่อแอร์มีความยาวไม่เกิน 4 เมตร', '', 10, 1, '12900.00', 0, 'NoImage.gif'),
(75, 3, 19, 'PD00075', 'TV 14 นิ้ว SAMSUNG รุ่น KI14SS', 'ยี่ห้อ SANSUNG  รุ่น KI14SS  ขนาดจอ 14 นิ้ว', '', 0, 2, '1790.00', 0, 'TV 14นิ้วSANSUNG รุ่น KI14SS.gif'),
(76, 3, 26, 'PD00076', 'เครื่องทำน้ำอุ่น HITACHI รุ่น HES35V', 'อาบอุ่น มั่นใจ ด้วยระบบนิรภัยถึง 12 จุด  หัวและสายฝักบัวผลิตจากวัสดุชนิดพิเศษ  On-Off Switch สามารถอาบน้ำฝักบัวได้โดยไม่ต้องเปิดเครื่อง  หัวฝักบัวดีไซน์ทันสมัย ปรับการกระจายสายน้ำได้ 5 รูปแบบ  ตัวเครื่องทำจากวัสดุพิเศษ สวยงาม แข็งแรง ทนทาน และไม่ติดไฟ  ปลอดภัยด้วยระบบ ELCB', '21.5 x 10.5 x 37.7', 3, 2, '3690.00', 0, 'เครื่องทำน้ำอุ่น HITACHI รุ่น HES35V.jpg'),
(77, 7, 32, 'PD00077', 'เครื่องทำขนมปัง KITTY รุ่น YT2001', 'เครื่องปิ้งขนมปัง KITTY YT2001 2PC  กว้าง 23.0 ซม.  ชมพู  น้ำหนัก 0.76 กก. สูง 15.5 ซม.  ลึก 12.0 ซม.   ช่องใส่ขนมปัง 2 ช่อง สามารถปรับความร้อนได้ และถาดรองเศษขนมปัง', '', 1, 1, '499.00', 0, 'เครื่องทำขนมปัง KITTY รุ่น YT2001.jpg'),
(78, 7, 31, 'PD00078', 'เตาอบไฟฟ้า OXYGEN รุ่น 70L', 'ถาดรองเศษอาหาร ออกแบบพิเศษ ง่ายต่อการทำความสะอาด ลดปัญหาเศษอาหารหมักหมม  ปรับรูปแบบการให้ความร้อนได้ ทั้ง ไฟบน ไฟล่าง หรือพร้อมกันทั้งบนและล่าง  ปรับรูปแบบการให้ความร้อนได้ ทั้ง ไฟบน ไฟล่าง หรือพร้อมกันทั้งบนและล่าง  ปรับระดับอุณหภูมิได้ตั้งแต่ 100-250 องศาเซลเซียส  ตั้งเวลาการทำงานได้สูงสุด 60 นาที พร้อมสัญญาณเตือนเมื่อครบเวลา ตัวเลือกการสลับความร้อน 4 ขั้นตอน  ความร้อนสแตนเลส 4 องค์ประกอบ มีอุปกรณ์เสริม ถาดรอง ตะแกรง และที่เสียบของย่าง กำลังไฟฟ้า 2500W  ความจุ 70 ลิตร ขนาดถาดรอง 43 x 33 cm  ขนาด 62 x 38 x 41.5 cm', '62 x 38 x 41.5', 0, 1, '3990.00', 0, 'เตาอบไฟฟ้า OXYGEN รุ่น 70L.jpg'),
(79, 4, 15, 'PD00079', 'เครื่องฟอกอากาศ HITACHI รุ่น EPA3000', 'สีขาว  จ่ายกำลังไฟ AC 220-240V 50-60Hz  พื้นที่ใช้สอย (ตารางเมตร)*1 22/25  โหมดฟอกกลิ่น, เกสรดอกไม้ PM 2.5 เซนเซอร์  ดูดซึมกลินสัตว์เลี้ยง, บุหรี่, อาหาร, ห้องน้ำ, น้ำเสีย  ระงับสาร แบคทีเรีย, ไวรัส, ฝุ่น, รา   ขนาดปริมาณลมแรงมาก, แรง, กลาง, เงียบ  ชนิดของแผ่นกรอง แผ่นกรองลดกลิ่น  แผ่นกรองชำระล้างได้   ตั้งเวลาปิด 2 ชั่วโมง  เซนเซอร์กลิ่น  ความยาวของสายไฟ (เมตร) 1.8 ขนาด (สูง x กว้าง x ลึก) (มิลลิเมตร) 424 x 400 x 133  น้ำหนัก 4.0 กิโลกรัม', '42.4x40.0x13.3', 4, 1, '4490.00', 0, 'เครื่องฟอกอากาศ HITACHI รุ่น EPA3000.jpg'),
(80, 6, 5, 'PD00080', 'กล้องอินฟาเรด LEOTECH รุ่น BL700V1-00', 'PARD NV007 200 m Digital การล่าสัตว์ Night Vision ขอบเขต Wifi Optical 5 W IR อินฟราเรด Night Vision Riflescope APP  รุ่น NV007แถมฟรีเมมโมรี 8 GB   แขนขนาด < 48 มม.  แว่นขยาย 1x-3.5x   ความละเอียดวิดีโอ 1920*1080  ความละเอียด 2680*1944   สายตายาวความละเอียด 800*600    วิธีส่ง WiFi  โฟกัส 3cm-00IR power 5 w   ประเภทการจัดเก็บ การ์ด TF   ความยาวคลื่น 850nm ประเภทเอาต์พุต AVIIR  ส่องสว่างระยะทาง 200 m  แบตเตอรี่ แบตเตอรี่ 18650x1  แรงดันไฟฟ้า 3.7 V  อายุการใช้งานแบตเตอรี่ > 8 hFrame rate 30fps  ขนาด 106*97*47  น้ำหนัก 250g', '', 0, 38, '2000.00', 0, 'กล้องอินฟาเรด LEOTECH รุ่น BL700V1-00.gif'),
(81, 5, 6, 'PD00081', 'ที่นอน DUNLOPILLO ขนาด 6 ฟุต ที่นอนสปริงออร์คิตพลัส', 'แบรนด์ DUNLOPPILLO   รูปแบบที่นอน ที่นอนสปริงออร์คิตพลัส  ขนาด 6 ฟุต', '183 x 198 x 25', 20, 1, '8590.00', 0, 'ที่นอน DUNLOPPILLO ขนาด 6 ฟุต ที่นอนสปริงออร์คิตพลัส.jpg'),
(82, 5, 9, 'PD00082', 'ตู้กับข้าวโอทู ขาต่ำ สีขาว (กระเบื้อง)', 'ขาต่ำ สีขาว พื้นโต๊ะเป็นกระเบื้อง', ' 80 x 45 x 84', 0, 1, '2490.00', 0, 'ตู้กับข้าวโอทู ขาต่ำ สีขาว (กระเบื้อง).jpg'),
(83, 5, 7, 'PD00083', 'เตียงเหล็ก ขนาด 5 ฟุต เสา3 ระแนง ทอง,สีระเบิดเงิน', 'ขนาด 5 ฟุต เสา 3 นิ้ว เป็นไม้ระแนงทอง มีสีระเบิดเงิน', '', 0, 2, '2590.00', 0, 'เตียงเหล็ก ขนาด 5 ฟุต เสา3นิ้ว ระแนง ทอง,สีระเบิดเงิน.jpg'),
(84, 5, 8, 'PD00084', 'เตียงนอน ZEN 6 ฟุต เทาเข็ม,ดำ', 'ขนาด 6 ฟุต  มีสีเทาเข้ม ดำ', '', 0, 3, '6590.00', 0, 'เตียงนอน ZEN 6 ฟุต เทาเข็ม,ดำ.jpg'),
(85, 5, 10, 'PD00085', 'ตู้เสื้อผ้า 80 ซม. รุ่น ลายการ์ตูนสีเขียวGM-80', 'สีสันสวย สดใสน่ารัก ใช้ได้ทั้งเด็กและผู้ใหญ่ ใส่เสื้อผ้าได้เยอะทั้งแขวนและพับได้สะดวกสบายคุ้มจริง ไม่มีการประกัน', '80x52x131', 0, 2, '1390.00', 0, 'ตู้เสื้อผ้า 80 ซม. รุ่น ลายการ์ตูนสีเขียวGM-80-.jpg'),
(86, 5, 11, 'PD00086', 'โต๊ะรีดผ้า 6 ระดับ 3017-4', 'มีน้ำหนัก4.5กก.โยกยาก รีดผ้าเรียบ สวยงาม รวดเร็ว ใช้รองรีดผ้ากับเตารีดผ้าไอน้ำได้ทุกรุ่น มีทีวางเตารีด สามารถทนความร้อนได้อย่างดี ขาตั้งแข็งแรง ทนทาน ไม่โยกคลอน พับเก็บง่าย ไม่เปลืองเนื้อที่ในการจัดเก็บ', '', 5, 2, '220.00', 0, 'โต๊ะรีดผ้า 6 ระดับ 3017-4.jpg'),
(87, 5, 12, 'PD00087', 'ราวผ้า ราวตะกร้า 407 5001-9', 'ผลิตจากวัสดุคุณภาพดี ป้องกันสนิมได้อย่างมีประสิทธิภาพ ไม่ต้องกังวลว่าจะผุกร่อนง่าย เพราะด้วยวัสดุที่แน่นหนาทำให้ราวตากผ้านี้มีความแข็งแรง ทนทาน และยังช่วยคุณประหยัดพื้นที่ รับน้ำหนักได้ดี มีล้อเลื่อนเคลื่อนย้ายง่าย มีตะกร้าไว้ใส่ของได้มากขึ้น', '45x82x182', 0, 2, '520.00', 0, 'ราวผ้า ราวตะกร้า 407 5001-9.jpg'),
(88, 5, 13, 'PD00088', 'เก้าอี้ผักผ่อน 062-C21-8035', '', '', 0, 1, '1990.00', 0, 'เก้าอี้ผักผ่อน 062-C21-8035.gif');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(45) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `firstname`, `lastname`, `address`, `phone`, `email`, `status`) VALUES
(1, 'warakorn', 'warakorn_ch', 'วรากร', 'ชูเชื้อ', '', '0815872971', '', 2),
(2, 'tichakorn', 'tichakorn_ch', 'ทิชากร', 'ชูเชื้อ', '', '0887911189', '', 2),
(3, 'panithan', 'panithan_ch', 'ปณิธาณ', 'ชูเชื้อ', '', '0611989495', '', 2),
(4, 'kaejulalak', 'kaejulalak', 'julalak', 'tammaphet', '9 ม.13 ต.ชะมวง อ.ควนขนุน จ.พัทลุง 93110', '0613428029', 'julalak79@gmail.com', 1),
(5, 'customer', 'customer', 'นิยม', 'ยินดี', '199 หมู่1 ถ.วิชิตสงคราม ต.กะทู้ อ.กะทู้ จ.ภูเก็ต 83120', '0987857856', 'customer@gmail.com', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
