-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for pro1014
CREATE DATABASE IF NOT EXISTS `pro1014` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `pro1014`;

-- Dumping structure for table pro1014.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  `username` int(11) NOT NULL,
  `password` int(11) NOT NULL,
  `rank` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table pro1014.admin: ~0 rows (approximately)
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Dumping structure for table pro1014.brand
CREATE TABLE IF NOT EXISTS `brand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  `update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Dumping data for table pro1014.brand: ~8 rows (approximately)
/*!40000 ALTER TABLE `brand` DISABLE KEYS */;
INSERT IGNORE INTO `brand` (`id`, `name`, `update`) VALUES
	(1, 'Nike', '2020-11-04 18:16:39'),
	(2, 'Jordan', '2020-11-04 18:16:39'),
	(3, 'Adidas', '2020-11-04 18:16:39'),
	(4, 'Converse', '2020-11-04 18:16:39'),
	(5, 'Puma', '2020-11-04 18:16:39'),
	(6, 'Vans', '2020-11-04 18:16:39'),
	(7, 'Reebok', '2020-11-04 18:16:39'),
	(8, 'New Balance', '2020-11-04 18:16:39');
/*!40000 ALTER TABLE `brand` ENABLE KEYS */;

-- Dumping structure for table pro1014.brand_of_product
CREATE TABLE IF NOT EXISTS `brand_of_product` (
  `brand_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  KEY `FK_brand_of_product_brand` (`brand_id`),
  KEY `FK_brand_of_product_product` (`product_id`),
  CONSTRAINT `FK_brand_of_product_brand` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_brand_of_product_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table pro1014.brand_of_product: ~0 rows (approximately)
/*!40000 ALTER TABLE `brand_of_product` DISABLE KEYS */;
/*!40000 ALTER TABLE `brand_of_product` ENABLE KEYS */;

-- Dumping structure for table pro1014.color
CREATE TABLE IF NOT EXISTS `color` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext COMMENT 'Tên màu',
  `colorCode` tinytext COMMENT 'Mã HEX color',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Dumping data for table pro1014.color: ~10 rows (approximately)
/*!40000 ALTER TABLE `color` DISABLE KEYS */;
INSERT IGNORE INTO `color` (`id`, `name`, `colorCode`) VALUES
	(1, 'Black', '#000000'),
	(2, 'Silver', '#c0c0c0'),
	(3, 'Gray', '#808080'),
	(4, 'Brown', '#a52a2a'),
	(5, 'Raw', '#d68a59'),
	(6, 'Maroon', '#800000'),
	(7, 'Cream', '#fffdd0'),
	(8, 'Linen', '#faf0e6'),
	(9, 'Yellow', '#ffff00'),
	(10, 'White', '#fffffff');
/*!40000 ALTER TABLE `color` ENABLE KEYS */;

-- Dumping structure for table pro1014.color_of_product
CREATE TABLE IF NOT EXISTS `color_of_product` (
  `productID` int(11) NOT NULL COMMENT 'Mã sản phẩm',
  `colorID` int(11) NOT NULL COMMENT 'Mã màu',
  KEY `FK__color` (`colorID`),
  KEY `FK__product` (`productID`),
  CONSTRAINT `FK__color` FOREIGN KEY (`colorID`) REFERENCES `color` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK__product` FOREIGN KEY (`productID`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table pro1014.color_of_product: ~6 rows (approximately)
/*!40000 ALTER TABLE `color_of_product` DISABLE KEYS */;
INSERT IGNORE INTO `color_of_product` (`productID`, `colorID`) VALUES
	(1, 1),
	(1, 2),
	(1, 3),
	(2, 4),
	(2, 5),
	(2, 6);
/*!40000 ALTER TABLE `color_of_product` ENABLE KEYS */;

-- Dumping structure for table pro1014.comment
CREATE TABLE IF NOT EXISTS `comment` (
  `productID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `content` text NOT NULL,
  KEY `FK_comment_product` (`productID`),
  KEY `FK_comment_user` (`userID`),
  CONSTRAINT `FK_comment_product` FOREIGN KEY (`productID`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_comment_user` FOREIGN KEY (`userID`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table pro1014.comment: ~0 rows (approximately)
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;

-- Dumping structure for table pro1014.hot_deal
CREATE TABLE IF NOT EXISTS `hot_deal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `end_time` datetime NOT NULL,
  `quantity` int(11) NOT NULL,
  `start_time` datetime NOT NULL,
  `deal_price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='Bản khuyến mãi, khuyến mãi sẽ bắt đầu từ start_time, đến hết end_time, trong thời gian khuyến mãi, sản phẩm sẽ được bán với giá deal_price với số lượng quantity.';

-- Dumping data for table pro1014.hot_deal: ~1 rows (approximately)
/*!40000 ALTER TABLE `hot_deal` DISABLE KEYS */;
INSERT IGNORE INTO `hot_deal` (`id`, `end_time`, `quantity`, `start_time`, `deal_price`) VALUES
	(1, '2020-11-06 22:32:25', 100, '2020-11-03 22:32:30', 100);
/*!40000 ALTER TABLE `hot_deal` ENABLE KEYS */;

-- Dumping structure for table pro1014.order
CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT 'Huỷ(0), mới(1), đang giao(2), đã hoàn thành (3),',
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table pro1014.order: ~0 rows (approximately)
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
/*!40000 ALTER TABLE `order` ENABLE KEYS */;

-- Dumping structure for table pro1014.order_detail
CREATE TABLE IF NOT EXISTS `order_detail` (
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL COMMENT 'Giá sản phẩm lúc đặt hàng',
  KEY `FK_order_detail_product` (`order_id`),
  KEY `FK_order_detail_product_2` (`product_id`),
  CONSTRAINT `FK_order_detail_product` FOREIGN KEY (`order_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_order_detail_product_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table pro1014.order_detail: ~0 rows (approximately)
/*!40000 ALTER TABLE `order_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_detail` ENABLE KEYS */;

-- Dumping structure for table pro1014.product
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã sản phẩm',
  `name` text COMMENT 'Tên sản phẩm',
  `price` float DEFAULT NULL COMMENT 'Giá bán ra, đã giảm giá',
  `description` text COMMENT 'Mô tả sản phẩm',
  `thumb` text COMMENT 'Ảnh bìa sản phẩm, không nền, .PNG, ít nhất 2 hình',
  `images` text COMMENT 'Hình ảnh thực tế của sản phẩm',
  `update` datetime DEFAULT NULL COMMENT 'Thời gian update mới nhất',
  `cost` float DEFAULT NULL COMMENT 'Giá gốc chưa giảm',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- Dumping data for table pro1014.product: ~18 rows (approximately)
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT IGNORE INTO `product` (`id`, `name`, `price`, `description`, `thumb`, `images`, `update`, `cost`) VALUES
	(1, 'Adidas Gazelle Star Wars The Mandalorian Darksaber', 100, 'Dropping as part of ‘The Mandalorian’ collection, the Star Wars x adidas Gazelle ‘Darksaber’ takes inspiration from the black-bladed lightsaber wielded by the Imperial warlord known as Moff Gideon. The sneaker makes use of a black suede upper, accented with metallic silver detailing on the three-stripes and heel tab. Those components are embellished with an electric crackle print and a reflective coating for enhanced visibility in low-light conditions. A durable grey rubber cupsole anchors the low-top.', 'assets/img/product/1/1.jpg', 'array("assets/img/product/1/2.jpg", "assets/img/product/1/3.jpg", "assets/img/product/1/4.jpg", "assets/img/product/1/5.jpg", "assets/img/product/1/6.jpg", "assets/img/product/1/7.jpg"); ', '2020-11-04 00:00:00', 122),
	(2, 'Adidas Nizza Star Wars The Mandalorian Beskar Steel', 70, 'Releasing as part of ‘The Mandalorian’ collection, the Star Wars x adidas women’s Nizza ‘Beskar Steel’ pays tribute to the Armorer, the mysterious character tasked with maintaining vital elements of the Mandalorian culture. This fashion-forward take on the vintage silhouette makes use of a brown leather upper inspired by the Armorer’s garb, mounted atop a platform midsole in contrasting white leather. The character’s helmeted likeness adorns a metallic gold tag atop the burgundy leather tongue.', 'assets/img/product/2/1.jpg', 'array("assets/img/product/2/2.jpg", "assets/img/product/2/3.jpg", "assets/img/product/2/4.jpg", "assets/img/product/2/5.jpg"); ', '2020-11-04 00:00:00', 200),
	(3, 'Adidas Top Ten Hi Star Wars The Mandalorian The Child', 90, 'Drawn from ‘The Mandalorian’ collection, the Star Wars x adidas Top Ten High ‘The Child’ gives the classic hoops shoe a design makeover that pays homage to the character commonly known as Baby Yoda. The foundling’s likeness is reproduced on the tongue tag, captioned with text that reads ‘The Force Is Strong With This Little One.’ The shoe itself features a brown and tan leather upper build, accented with Linen Green detailing on the textile collar and suede eyestay.', 'assets/img/product/3/1.jpg', 'array("assets/img/product/2/2.jpg", "assets/img/product/2/3.jpg", "assets/img/product/2/4.jpg", "assets/img/product/2/5.jpg", "assets/img/product/2/6.jpg"); ', '2020-11-04 00:00:00', 122),
	(4, 'Adidas Superstar Star Wars The Mandalorian The Child', 90, 'Launching as part of ‘The Mandalorian’ collection, the Star Wars x adidas Superstar ‘The Child’ draws inspiration from the character colloquially known as Baby Yoda. Linen Green coloring is executed on the sneaker’s leather upper, accented with contrasting black three-stripes and a ‘The Child’ graphic on the lateral heel. Atop the tongue, printed text in Star Wars’ Aurebesh alphabet denotes the 50th anniversary of the Superstar silhouette.', 'assets/img/product/4/1.jpg', 'array("assets/img/product/4/2.jpg", "assets/img/product/4/3.jpg", "assets/img/product/4/4.jpg", "assets/img/product/4/5.jpg", "assets/img/product/4/6.jpg"); ', '2020-11-04 00:00:00', 150),
	(5, 'Adidas Gazelle Star Wars The Mandalorian Darksaber', 100, 'Dropping as part of ‘The Mandalorian’ collection, the Star Wars x adidas Gazelle ‘Darksaber’ takes inspiration from the black-bladed lightsaber wielded by the Imperial warlord known as Moff Gideon. The sneaker makes use of a black suede upper, accented with metallic silver detailing on the three-stripes and heel tab. Those components are embellished with an electric crackle print and a reflective coating for enhanced visibility in low-light conditions. A durable grey rubber cupsole anchors the low-top.', 'assets/img/product/1/1.jpg', 'array("assets/img/product/1/2.jpg", "assets/img/product/1/3.jpg", "assets/img/product/1/4.jpg", "assets/img/product/1/5.jpg", "assets/img/product/1/6.jpg", "assets/img/product/1/7.jpg"); ', '2020-11-04 00:00:00', 122),
	(6, 'Adidas Nizza Star Wars The Mandalorian Beskar Steel', 70, 'Releasing as part of ‘The Mandalorian’ collection, the Star Wars x adidas women’s Nizza ‘Beskar Steel’ pays tribute to the Armorer, the mysterious character tasked with maintaining vital elements of the Mandalorian culture. This fashion-forward take on the vintage silhouette makes use of a brown leather upper inspired by the Armorer’s garb, mounted atop a platform midsole in contrasting white leather. The character’s helmeted likeness adorns a metallic gold tag atop the burgundy leather tongue.', 'assets/img/product/2/1.jpg', 'array("assets/img/product/2/2.jpg", "assets/img/product/2/3.jpg", "assets/img/product/2/4.jpg", "assets/img/product/2/5.jpg"); ', '2020-11-04 00:00:00', 200),
	(7, 'Adidas Top Ten Hi Star Wars The Mandalorian The Child', 90, 'Drawn from ‘The Mandalorian’ collection, the Star Wars x adidas Top Ten High ‘The Child’ gives the classic hoops shoe a design makeover that pays homage to the character commonly known as Baby Yoda. The foundling’s likeness is reproduced on the tongue tag, captioned with text that reads ‘The Force Is Strong With This Little One.’ The shoe itself features a brown and tan leather upper build, accented with Linen Green detailing on the textile collar and suede eyestay.', 'assets/img/product/3/1.jpg', 'array("assets/img/product/2/2.jpg", "assets/img/product/2/3.jpg", "assets/img/product/2/4.jpg", "assets/img/product/2/5.jpg", "assets/img/product/2/6.jpg"); ', '2020-11-04 00:00:00', 122),
	(8, 'Adidas Superstar Star Wars The Mandalorian The Child', 90, 'Launching as part of ‘The Mandalorian’ collection, the Star Wars x adidas Superstar ‘The Child’ draws inspiration from the character colloquially known as Baby Yoda. Linen Green coloring is executed on the sneaker’s leather upper, accented with contrasting black three-stripes and a ‘The Child’ graphic on the lateral heel. Atop the tongue, printed text in Star Wars’ Aurebesh alphabet denotes the 50th anniversary of the Superstar silhouette.', 'assets/img/product/4/1.jpg', 'array("assets/img/product/4/2.jpg", "assets/img/product/4/3.jpg", "assets/img/product/4/4.jpg", "assets/img/product/4/5.jpg", "assets/img/product/4/6.jpg"); ', '2020-11-04 00:00:00', 150),
	(9, 'Ultraboost OG Shoes', 200, 'Built for impact. These adidas x IVY PARK Ultraboost Shoes take a celebrated adidas style and injects it with utilitarian swag and a touch of attitude. Energy-returning cushioning creates a sense of fluid motion for a smooth ride. A hook on the heel clips to your gym bag, showing off the bold style even when they\'re not on.', 'assets/img/product/9/1.jpg', 'array("assets/img/product/9/2.jpg", "assets/img/product/9/3.jpg", "assets/img/product/9/4.jpg", "assets/img/product/9/5.jpg", "assets/img/product/9/6.jpg"); ', '2020-11-04 20:00:52', 250),
	(10, 'Forum Low Shoes', 130, 'If we\'re talking legends, you know the adidas Forum is driving the conversation. The basketball game changer dominated the court in the \'80s, and brings that energy to today\'s moves. These adidas x IVY PARK sneakers capture the distinct elements that left their mark back in the day. Ankle straps. X details. A layered upper. They\'re all there, just with a fresh splash of color.', 'assets/img/product/10/1.jpg', 'array("assets/img/product/10/2.jpg", "assets/img/product/10/3.jpg", "assets/img/product/10/4.jpg", "assets/img/product/10/5.jpg", "assets/img/product/10/6.jpg"); ', '2020-11-04 20:01:53', 150),
	(11, 'Ultraboost OG Shoes', 200, 'Built for impact. These adidas x IVY PARK Ultraboost Shoes take a celebrated adidas style and injects it with utilitarian swag and a touch of attitude. Energy-returning cushioning creates a sense of fluid motion for a smooth ride. A hook on the heel clips to your gym bag, showing off the bold style even when they\'re not on.', 'assets/img/product/9/1.jpg', 'array("assets/img/product/9/2.jpg", "assets/img/product/9/3.jpg", "assets/img/product/9/4.jpg", "assets/img/product/9/5.jpg", "assets/img/product/9/6.jpg"); ', '2020-11-04 20:00:52', 250),
	(12, 'Forum Low Shoes', 130, 'If we\'re talking legends, you know the adidas Forum is driving the conversation. The basketball game changer dominated the court in the \'80s, and brings that energy to today\'s moves. These adidas x IVY PARK sneakers capture the distinct elements that left their mark back in the day. Ankle straps. X details. A layered upper. They\'re all there, just with a fresh splash of color.', 'assets/img/product/10/1.jpg', 'array("assets/img/product/10/2.jpg", "assets/img/product/10/3.jpg", "assets/img/product/10/4.jpg", "assets/img/product/10/5.jpg", "assets/img/product/10/6.jpg"); ', '2020-11-04 20:01:53', 150),
	(13, 'Ultraboost OG Shoes', 200, 'Built for impact. These adidas x IVY PARK Ultraboost Shoes take a celebrated adidas style and injects it with utilitarian swag and a touch of attitude. Energy-returning cushioning creates a sense of fluid motion for a smooth ride. A hook on the heel clips to your gym bag, showing off the bold style even when they\'re not on.', 'assets/img/product/9/1.jpg', 'array("assets/img/product/9/2.jpg", "assets/img/product/9/3.jpg", "assets/img/product/9/4.jpg", "assets/img/product/9/5.jpg", "assets/img/product/9/6.jpg"); ', '2020-11-04 20:00:52', 250),
	(14, 'Forum Low Shoes', 130, 'If we\'re talking legends, you know the adidas Forum is driving the conversation. The basketball game changer dominated the court in the \'80s, and brings that energy to today\'s moves. These adidas x IVY PARK sneakers capture the distinct elements that left their mark back in the day. Ankle straps. X details. A layered upper. They\'re all there, just with a fresh splash of color.', 'assets/img/product/10/1.jpg', 'array("assets/img/product/10/2.jpg", "assets/img/product/10/3.jpg", "assets/img/product/10/4.jpg", "assets/img/product/10/5.jpg", "assets/img/product/10/6.jpg"); ', '2020-11-04 20:01:53', 150),
	(15, 'Adidas Gazelle Star Wars The Mandalorian Darksaber', 100, 'Dropping as part of ‘The Mandalorian’ collection, the Star Wars x adidas Gazelle ‘Darksaber’ takes inspiration from the black-bladed lightsaber wielded by the Imperial warlord known as Moff Gideon. The sneaker makes use of a black suede upper, accented with metallic silver detailing on the three-stripes and heel tab. Those components are embellished with an electric crackle print and a reflective coating for enhanced visibility in low-light conditions. A durable grey rubber cupsole anchors the low-top.', 'assets/img/product/1/1.jpg', 'array("assets/img/product/1/2.jpg", "assets/img/product/1/3.jpg", "assets/img/product/1/4.jpg", "assets/img/product/1/5.jpg", "assets/img/product/1/6.jpg", "assets/img/product/1/7.jpg"); ', '2020-11-04 00:00:00', 122),
	(16, 'Adidas Top Ten Hi Star Wars The Mandalorian The Child', 90, 'Drawn from ‘The Mandalorian’ collection, the Star Wars x adidas Top Ten High ‘The Child’ gives the classic hoops shoe a design makeover that pays homage to the character commonly known as Baby Yoda. The foundling’s likeness is reproduced on the tongue tag, captioned with text that reads ‘The Force Is Strong With This Little One.’ The shoe itself features a brown and tan leather upper build, accented with Linen Green detailing on the textile collar and suede eyestay.', 'assets/img/product/3/1.jpg', 'array("assets/img/product/2/2.jpg", "assets/img/product/2/3.jpg", "assets/img/product/2/4.jpg", "assets/img/product/2/5.jpg", "assets/img/product/2/6.jpg"); ', '2020-11-04 00:00:00', 122),
	(17, 'Adidas Nizza Star Wars The Mandalorian Beskar Steel', 70, 'Releasing as part of ‘The Mandalorian’ collection, the Star Wars x adidas women’s Nizza ‘Beskar Steel’ pays tribute to the Armorer, the mysterious character tasked with maintaining vital elements of the Mandalorian culture. This fashion-forward take on the vintage silhouette makes use of a brown leather upper inspired by the Armorer’s garb, mounted atop a platform midsole in contrasting white leather. The character’s helmeted likeness adorns a metallic gold tag atop the burgundy leather tongue.', 'assets/img/product/2/1.jpg', 'array("assets/img/product/2/2.jpg", "assets/img/product/2/3.jpg", "assets/img/product/2/4.jpg", "assets/img/product/2/5.jpg"); ', '2020-11-04 00:00:00', 200),
	(18, 'Jordan "Why Not?" Zer0.3', 96.97, 'One of the game\'s fiercest competitors, triple-double dynamo Russell Westbrook has the motor, muscle and mentality to match his fearlessness—with the stats to back it up. The Jordan "Why Not?" Zer0.3 is tuned for Russ\' on-court chaos, featuring a midfoot strap to secure the fit and a large cushioning unit to help drive him hard and fast toward the basket.', 'assets/img/product/11/1.jpg', 'array("assets/img/product/11/2.jpg", "assets/img/product/11/3.jpg", "assets/img/product/11/4.jpg", "assets/img/product/11/5.jpg", "assets/img/product/11/6.jpg"); ', '2020-11-05 15:58:52', 130);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;

-- Dumping structure for table pro1014.size
CREATE TABLE IF NOT EXISTS `size` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `size` int(11) NOT NULL COMMENT 'Size giày',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

-- Dumping data for table pro1014.size: ~14 rows (approximately)
/*!40000 ALTER TABLE `size` DISABLE KEYS */;
INSERT IGNORE INTO `size` (`id`, `size`) VALUES
	(35, 35),
	(36, 36),
	(37, 36),
	(38, 37),
	(39, 38),
	(40, 39),
	(41, 40),
	(42, 41),
	(43, 42),
	(44, 43),
	(45, 44),
	(46, 45),
	(47, 46),
	(48, 47);
/*!40000 ALTER TABLE `size` ENABLE KEYS */;

-- Dumping structure for table pro1014.size_of_product
CREATE TABLE IF NOT EXISTS `size_of_product` (
  `productID` int(11) NOT NULL,
  `sizeID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  KEY `FK__size` (`sizeID`),
  KEY `FK_size_of_product_product` (`productID`),
  CONSTRAINT `FK__size` FOREIGN KEY (`sizeID`) REFERENCES `size` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_size_of_product_product` FOREIGN KEY (`productID`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table pro1014.size_of_product: ~24 rows (approximately)
/*!40000 ALTER TABLE `size_of_product` DISABLE KEYS */;
INSERT IGNORE INTO `size_of_product` (`productID`, `sizeID`, `quantity`) VALUES
	(1, 39, 10),
	(1, 40, 10),
	(1, 41, 10),
	(1, 42, 10),
	(1, 43, 10),
	(1, 44, 10),
	(1, 38, 10),
	(2, 38, 15),
	(2, 39, 15),
	(2, 40, 15),
	(2, 41, 15),
	(2, 42, 15),
	(2, 43, 15),
	(2, 44, 15),
	(2, 37, 15),
	(3, 38, 15),
	(3, 39, 15),
	(3, 40, 15),
	(3, 41, 15),
	(3, 42, 15),
	(3, 43, 15),
	(3, 44, 15),
	(3, 36, 15),
	(3, 37, 15);
/*!40000 ALTER TABLE `size_of_product` ENABLE KEYS */;

-- Dumping structure for table pro1014.slider
CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `order` int(11) NOT NULL COMMENT 'Thứ tự slider',
  `description` text NOT NULL,
  `title` text NOT NULL,
  `img` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_slider_product` (`product_id`),
  CONSTRAINT `FK_slider_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table pro1014.slider: ~0 rows (approximately)
/*!40000 ALTER TABLE `slider` DISABLE KEYS */;
INSERT IGNORE INTO `slider` (`id`, `product_id`, `order`, `description`, `title`, `img`) VALUES
	(1, 18, 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et', 'Jordan <br> "Why Not?"', 'assets/img/product/11/slider.png'),
	(2, 18, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et', 'Nike New <br>Collection!', 'assets/img/banner/banner-img.png');
/*!40000 ALTER TABLE `slider` ENABLE KEYS */;

-- Dumping structure for table pro1014.tag
CREATE TABLE IF NOT EXISTS `tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL COMMENT 'Tên danh mục',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Dumping data for table pro1014.tag: ~11 rows (approximately)
/*!40000 ALTER TABLE `tag` DISABLE KEYS */;
INSERT IGNORE INTO `tag` (`id`, `name`) VALUES
	(1, 'Superstar Shoes'),
	(2, 'NMD'),
	(3, 'Athletic & Sneakers'),
	(4, 'Ultraboost'),
	(5, 'Stan Smith'),
	(6, 'Men'),
	(7, 'Women'),
	(8, 'Child'),
	(9, 'Infant'),
	(10, 'Unisex'),
	(11, 'Youth');
/*!40000 ALTER TABLE `tag` ENABLE KEYS */;

-- Dumping structure for table pro1014.tag_of_product
CREATE TABLE IF NOT EXISTS `tag_of_product` (
  `product_id` int(11) DEFAULT NULL,
  `tag_id` int(11) DEFAULT NULL,
  KEY `FK_tag_of_product_product` (`product_id`),
  KEY `FK_tag_of_product_tag` (`tag_id`),
  CONSTRAINT `FK_tag_of_product_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_tag_of_product_tag` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table pro1014.tag_of_product: ~3 rows (approximately)
/*!40000 ALTER TABLE `tag_of_product` DISABLE KEYS */;
INSERT IGNORE INTO `tag_of_product` (`product_id`, `tag_id`) VALUES
	(1, 6),
	(2, 7),
	(3, 6);
/*!40000 ALTER TABLE `tag_of_product` ENABLE KEYS */;

-- Dumping structure for table pro1014.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` tinytext NOT NULL,
  `password` tinytext NOT NULL,
  `email` tinytext,
  `phone` tinytext,
  `created` tinytext,
  `birthday` datetime DEFAULT NULL,
  `fullname` tinytext,
  `avartar` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table pro1014.user: ~0 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
