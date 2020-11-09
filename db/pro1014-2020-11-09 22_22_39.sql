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

-- Dumping structure for table pro1014.blog
CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(11) unsigned NOT NULL,
  `title` varchar(256) NOT NULL,
  `description` text CHARACTER SET utf8mb4 NOT NULL,
  `content` text NOT NULL,
  `thumb` text NOT NULL,
  `view` int(255) unsigned NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_blog_user` (`user_id`),
  CONSTRAINT `FK_blog_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table pro1014.blog: ~0 rows (approximately)
DELETE FROM `blog`;
/*!40000 ALTER TABLE `blog` DISABLE KEYS */;
/*!40000 ALTER TABLE `blog` ENABLE KEYS */;

-- Dumping structure for table pro1014.brand
CREATE TABLE IF NOT EXISTS `brand` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  `update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4294967295 DEFAULT CHARSET=utf8;

-- Dumping data for table pro1014.brand: ~8 rows (approximately)
DELETE FROM `brand`;
/*!40000 ALTER TABLE `brand` DISABLE KEYS */;
INSERT INTO `brand` (`id`, `name`, `update`) VALUES
	(1, 'Nike', '2020-11-04 18:16:39'),
	(2, 'Jordan', '2020-11-04 18:16:39'),
	(3, 'Adidas', '2020-11-04 18:16:39'),
	(4, 'Converse', '2020-11-04 18:16:39'),
	(5, 'Puma', '2020-11-04 18:16:39'),
	(6, 'Vans', '2020-11-04 18:16:39'),
	(7, 'Reebok', '2020-11-04 18:16:39'),
	(8, 'New Balance', '2020-11-04 18:16:39');
/*!40000 ALTER TABLE `brand` ENABLE KEYS */;

-- Dumping structure for table pro1014.color
CREATE TABLE IF NOT EXISTS `color` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` tinytext COMMENT 'Tên màu',
  `colorCode` tinytext COMMENT 'Mã HEX color',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Dumping data for table pro1014.color: ~10 rows (approximately)
DELETE FROM `color`;
/*!40000 ALTER TABLE `color` DISABLE KEYS */;
INSERT INTO `color` (`id`, `name`, `colorCode`) VALUES
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

-- Dumping structure for table pro1014.comment
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_comment_product` (`product_id`),
  KEY `FK_comment_user` (`user_id`),
  CONSTRAINT `FK_comment_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_comment_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table pro1014.comment: ~0 rows (approximately)
DELETE FROM `comment`;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;

-- Dumping structure for table pro1014.config
CREATE TABLE IF NOT EXISTS `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `config` json DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table pro1014.config: ~2 rows (approximately)
DELETE FROM `config`;
/*!40000 ALTER TABLE `config` DISABLE KEYS */;
INSERT INTO `config` (`id`, `name`, `config`) VALUES
	(1, 'default_layout', '{"home": ["layouts/header", "home/banner", "home/features", "home/newProduct", "home/category", "home/product", "home/ExclusiveDeal", "home/brand", "home/RelatedPoduct", "layouts/Footer"]}'),
	(2, 'layout', '{"home": ["layouts/header", "home/banner", "home/features", "home/newProduct", "home/category", "home/product", "home/ExclusiveDeal", "home/newProduct", "home/brand", "home/RelatedPoduct", "layouts/Footer"]}');
/*!40000 ALTER TABLE `config` ENABLE KEYS */;

-- Dumping structure for table pro1014.deal
CREATE TABLE IF NOT EXISTS `deal` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `end_time` datetime NOT NULL,
  `start_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='Bản khuyến mãi, khuyến mãi sẽ bắt đầu từ start_time, đến hết end_time, trong thời gian khuyến mãi, sản phẩm sẽ được bán với giá deal_price với số lượng quantity.';

-- Dumping data for table pro1014.deal: ~0 rows (approximately)
DELETE FROM `deal`;
/*!40000 ALTER TABLE `deal` DISABLE KEYS */;
INSERT INTO `deal` (`id`, `end_time`, `start_time`) VALUES
	(1, '2020-11-06 22:32:25', '2020-11-03 22:32:30');
/*!40000 ALTER TABLE `deal` ENABLE KEYS */;

-- Dumping structure for table pro1014.deal_detail
CREATE TABLE IF NOT EXISTS `deal_detail` (
  `deal_id` int(255) unsigned NOT NULL DEFAULT '0',
  `product_id` int(255) unsigned NOT NULL DEFAULT '0',
  `deal_thumb` text NOT NULL,
  `deal_price` float unsigned NOT NULL,
  `quantity` int(255) unsigned NOT NULL,
  KEY `FK_product_of_deal_deal` (`deal_id`),
  KEY `FK_product_of_deal_product` (`product_id`),
  CONSTRAINT `FK_product_of_deal_deal` FOREIGN KEY (`deal_id`) REFERENCES `deal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_product_of_deal_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table pro1014.deal_detail: ~0 rows (approximately)
DELETE FROM `deal_detail`;
/*!40000 ALTER TABLE `deal_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `deal_detail` ENABLE KEYS */;

-- Dumping structure for table pro1014.order
CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `status` tinyint(1) unsigned DEFAULT NULL COMMENT 'Huỷ(0), mới(1), đang giao(2), đã hoàn thành (3),',
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_order_user` (`user_id`),
  CONSTRAINT `FK_order_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table pro1014.order: ~0 rows (approximately)
DELETE FROM `order`;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
/*!40000 ALTER TABLE `order` ENABLE KEYS */;

-- Dumping structure for table pro1014.order_detail
CREATE TABLE IF NOT EXISTS `order_detail` (
  `order_id` int(11) unsigned NOT NULL,
  `size_id` int(11) unsigned NOT NULL,
  `color_id` int(11) unsigned NOT NULL,
  `product_id` int(11) unsigned NOT NULL,
  `quantity` int(11) unsigned DEFAULT NULL,
  `price` float unsigned DEFAULT NULL COMMENT 'Giá sản phẩm lúc đặt hàng',
  KEY `FK_order_detail_product` (`order_id`),
  KEY `FK_order_detail_product_2` (`product_id`),
  KEY `FK_order_detail_size` (`size_id`),
  KEY `FK_order_detail_color` (`color_id`),
  CONSTRAINT `FK_order_detail_color` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_order_detail_order` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_order_detail_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_order_detail_size` FOREIGN KEY (`size_id`) REFERENCES `size` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table pro1014.order_detail: ~0 rows (approximately)
DELETE FROM `order_detail`;
/*!40000 ALTER TABLE `order_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_detail` ENABLE KEYS */;

-- Dumping structure for table pro1014.product
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Mã sản phẩm',
  `name` tinytext NOT NULL COMMENT 'Tên sản phẩm',
  `price` float unsigned NOT NULL COMMENT 'Giá bán ra, đã giảm giá',
  `description` text NOT NULL COMMENT 'Mô tả sản phẩm',
  `thumb` text NOT NULL COMMENT 'Ảnh bìa sản phẩm, không nền, .PNG, ít nhất 2 hình',
  `images` text NOT NULL COMMENT 'Hình ảnh thực tế của sản phẩm',
  `update` datetime NOT NULL COMMENT 'Thời gian update mới nhất',
  `cost` float unsigned NOT NULL COMMENT 'Giá gốc chưa giảm',
  `brand_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_product_brand` (`brand_id`),
  CONSTRAINT `FK_product_brand` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- Dumping data for table pro1014.product: ~18 rows (approximately)
DELETE FROM `product`;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` (`id`, `name`, `price`, `description`, `thumb`, `images`, `update`, `cost`, `brand_id`) VALUES
	(1, 'Adidas Gazelle Star Wars The Mandalorian Darksaber', 100, 'Dropping as part of ‘The Mandalorian’ collection, the Star Wars x adidas Gazelle ‘Darksaber’ takes inspiration from the black-bladed lightsaber wielded by the Imperial warlord known as Moff Gideon. The sneaker makes use of a black suede upper, accented with metallic silver detailing on the three-stripes and heel tab. Those components are embellished with an electric crackle print and a reflective coating for enhanced visibility in low-light conditions. A durable grey rubber cupsole anchors the low-top.', 'assets/img/product/1/1.jpg', '["assets\\/img\\/product\\/1\\/2.jpg","assets\\/img\\/product\\/1\\/3.jpg","assets\\/img\\/product\\/1\\/4.jpg","assets\\/img\\/product\\/1\\/5.jpg","assets\\/img\\/product\\/1\\/6.jpg","assets\\/img\\/product\\/1\\/7.jpg"]', '2020-11-04 00:00:00', 122, 3),
	(2, 'Adidas Nizza Star Wars The Mandalorian Beskar Steel', 70, 'Releasing as part of ‘The Mandalorian’ collection, the Star Wars x adidas women’s Nizza ‘Beskar Steel’ pays tribute to the Armorer, the mysterious character tasked with maintaining vital elements of the Mandalorian culture. This fashion-forward take on the vintage silhouette makes use of a brown leather upper inspired by the Armorer’s garb, mounted atop a platform midsole in contrasting white leather. The character’s helmeted likeness adorns a metallic gold tag atop the burgundy leather tongue.', 'assets/img/product/2/1.jpg', '["assets\\/img\\/product\\/2\\/2.jpg","assets\\/img\\/product\\/2\\/3.jpg","assets\\/img\\/product\\/2\\/4.jpg","assets\\/img\\/product\\/2\\/5.jpg"]', '2020-11-04 00:00:00', 200, 2),
	(3, 'Adidas Top Ten Hi Star Wars The Mandalorian The Child', 90, 'Drawn from ‘The Mandalorian’ collection, the Star Wars x adidas Top Ten High ‘The Child’ gives the classic hoops shoe a design makeover that pays homage to the character commonly known as Baby Yoda. The foundling’s likeness is reproduced on the tongue tag, captioned with text that reads ‘The Force Is Strong With This Little One.’ The shoe itself features a brown and tan leather upper build, accented with Linen Green detailing on the textile collar and suede eyestay.', 'assets/img/product/3/1.jpg', '["assets\\/img\\/product\\/2\\/2.jpg","assets\\/img\\/product\\/2\\/3.jpg","assets\\/img\\/product\\/2\\/4.jpg","assets\\/img\\/product\\/2\\/5.jpg","assets\\/img\\/product\\/2\\/6.jpg"]', '2020-11-04 00:00:00', 122, 1),
	(4, 'Adidas Superstar Star Wars The Mandalorian The Child', 90, 'Launching as part of ‘The Mandalorian’ collection, the Star Wars x adidas Superstar ‘The Child’ draws inspiration from the character colloquially known as Baby Yoda. Linen Green coloring is executed on the sneaker’s leather upper, accented with contrasting black three-stripes and a ‘The Child’ graphic on the lateral heel. Atop the tongue, printed text in Star Wars’ Aurebesh alphabet denotes the 50th anniversary of the Superstar silhouette.', 'assets/img/product/4/1.jpg', '["assets\\/img\\/product\\/4\\/2.jpg","assets\\/img\\/product\\/4\\/3.jpg","assets\\/img\\/product\\/4\\/4.jpg","assets\\/img\\/product\\/4\\/5.jpg","assets\\/img\\/product\\/4\\/6.jpg"]', '2020-11-04 00:00:00', 150, 7),
	(5, 'Adidas Gazelle Star Wars The Mandalorian Darksaber', 100, 'Dropping as part of ‘The Mandalorian’ collection, the Star Wars x adidas Gazelle ‘Darksaber’ takes inspiration from the black-bladed lightsaber wielded by the Imperial warlord known as Moff Gideon. The sneaker makes use of a black suede upper, accented with metallic silver detailing on the three-stripes and heel tab. Those components are embellished with an electric crackle print and a reflective coating for enhanced visibility in low-light conditions. A durable grey rubber cupsole anchors the low-top.', 'assets/img/product/1/1.jpg', '["assets\\/img\\/product\\/1\\/2.jpg","assets\\/img\\/product\\/1\\/3.jpg","assets\\/img\\/product\\/1\\/4.jpg","assets\\/img\\/product\\/1\\/5.jpg","assets\\/img\\/product\\/1\\/6.jpg","assets\\/img\\/product\\/1\\/7.jpg"]', '2020-11-04 00:00:00', 122, 4),
	(6, 'Adidas Nizza Star Wars The Mandalorian Beskar Steel', 70, 'Releasing as part of ‘The Mandalorian’ collection, the Star Wars x adidas women’s Nizza ‘Beskar Steel’ pays tribute to the Armorer, the mysterious character tasked with maintaining vital elements of the Mandalorian culture. This fashion-forward take on the vintage silhouette makes use of a brown leather upper inspired by the Armorer’s garb, mounted atop a platform midsole in contrasting white leather. The character’s helmeted likeness adorns a metallic gold tag atop the burgundy leather tongue.', 'assets/img/product/2/1.jpg', '["assets\\/img\\/product\\/2\\/2.jpg","assets\\/img\\/product\\/2\\/3.jpg","assets\\/img\\/product\\/2\\/4.jpg","assets\\/img\\/product\\/2\\/5.jpg"]', '2020-11-04 00:00:00', 200, 3),
	(7, 'Adidas Top Ten Hi Star Wars The Mandalorian The Child', 90, 'Drawn from ‘The Mandalorian’ collection, the Star Wars x adidas Top Ten High ‘The Child’ gives the classic hoops shoe a design makeover that pays homage to the character commonly known as Baby Yoda. The foundling’s likeness is reproduced on the tongue tag, captioned with text that reads ‘The Force Is Strong With This Little One.’ The shoe itself features a brown and tan leather upper build, accented with Linen Green detailing on the textile collar and suede eyestay.', 'assets/img/product/3/1.jpg', '["assets\\/img\\/product\\/2\\/2.jpg","assets\\/img\\/product\\/2\\/3.jpg","assets\\/img\\/product\\/2\\/4.jpg","assets\\/img\\/product\\/2\\/5.jpg","assets\\/img\\/product\\/2\\/6.jpg"]', '2020-11-04 00:00:00', 122, 3),
	(8, 'Adidas Superstar Star Wars The Mandalorian The Child', 90, 'Launching as part of ‘The Mandalorian’ collection, the Star Wars x adidas Superstar ‘The Child’ draws inspiration from the character colloquially known as Baby Yoda. Linen Green coloring is executed on the sneaker’s leather upper, accented with contrasting black three-stripes and a ‘The Child’ graphic on the lateral heel. Atop the tongue, printed text in Star Wars’ Aurebesh alphabet denotes the 50th anniversary of the Superstar silhouette.', 'assets/img/product/4/1.jpg', '["assets\\/img\\/product\\/4\\/2.jpg","assets\\/img\\/product\\/4\\/3.jpg","assets\\/img\\/product\\/4\\/4.jpg","assets\\/img\\/product\\/4\\/5.jpg","assets\\/img\\/product\\/4\\/6.jpg"]', '2020-11-04 00:00:00', 150, 3),
	(9, 'Ultraboost OG Shoes', 200, 'Built for impact. These adidas x IVY PARK Ultraboost Shoes take a celebrated adidas style and injects it with utilitarian swag and a touch of attitude. Energy-returning cushioning creates a sense of fluid motion for a smooth ride. A hook on the heel clips to your gym bag, showing off the bold style even when they\'re not on.', 'assets/img/product/9/1.jpg', '["assets\\/img\\/product\\/9\\/2.jpg","assets\\/img\\/product\\/9\\/3.jpg","assets\\/img\\/product\\/9\\/4.jpg","assets\\/img\\/product\\/9\\/5.jpg","assets\\/img\\/product\\/9\\/6.jpg"]', '2020-11-04 20:00:52', 250, 3),
	(10, 'Forum Low Shoes', 130, 'If we\'re talking legends, you know the adidas Forum is driving the conversation. The basketball game changer dominated the court in the \'80s, and brings that energy to today\'s moves. These adidas x IVY PARK sneakers capture the distinct elements that left their mark back in the day. Ankle straps. X details. A layered upper. They\'re all there, just with a fresh splash of color.', 'assets/img/product/10/1.jpg', 'array("assets/img/product/10/2.jpg", "assets/img/product/10/3.jpg", "assets/img/product/10/4.jpg", "assets/img/product/10/5.jpg", "assets/img/product/10/6.jpg"); ', '2020-11-04 20:01:53', 150, 4),
	(11, 'Ultraboost OG Shoes', 200, 'Built for impact. These adidas x IVY PARK Ultraboost Shoes take a celebrated adidas style and injects it with utilitarian swag and a touch of attitude. Energy-returning cushioning creates a sense of fluid motion for a smooth ride. A hook on the heel clips to your gym bag, showing off the bold style even when they\'re not on.', 'assets/img/product/9/1.jpg', 'array("assets/img/product/9/2.jpg", "assets/img/product/9/3.jpg", "assets/img/product/9/4.jpg", "assets/img/product/9/5.jpg", "assets/img/product/9/6.jpg"); ', '2020-11-04 20:00:52', 250, 3),
	(12, 'Forum Low Shoes', 130, 'If we\'re talking legends, you know the adidas Forum is driving the conversation. The basketball game changer dominated the court in the \'80s, and brings that energy to today\'s moves. These adidas x IVY PARK sneakers capture the distinct elements that left their mark back in the day. Ankle straps. X details. A layered upper. They\'re all there, just with a fresh splash of color.', 'assets/img/product/10/1.jpg', 'array("assets/img/product/10/2.jpg", "assets/img/product/10/3.jpg", "assets/img/product/10/4.jpg", "assets/img/product/10/5.jpg", "assets/img/product/10/6.jpg"); ', '2020-11-04 20:01:53', 150, 3),
	(13, 'Ultraboost OG Shoes', 200, 'Built for impact. These adidas x IVY PARK Ultraboost Shoes take a celebrated adidas style and injects it with utilitarian swag and a touch of attitude. Energy-returning cushioning creates a sense of fluid motion for a smooth ride. A hook on the heel clips to your gym bag, showing off the bold style even when they\'re not on.', 'assets/img/product/9/1.jpg', 'array("assets/img/product/9/2.jpg", "assets/img/product/9/3.jpg", "assets/img/product/9/4.jpg", "assets/img/product/9/5.jpg", "assets/img/product/9/6.jpg"); ', '2020-11-04 20:00:52', 250, 3),
	(14, 'Forum Low Shoes', 130, 'If we\'re talking legends, you know the adidas Forum is driving the conversation. The basketball game changer dominated the court in the \'80s, and brings that energy to today\'s moves. These adidas x IVY PARK sneakers capture the distinct elements that left their mark back in the day. Ankle straps. X details. A layered upper. They\'re all there, just with a fresh splash of color.', 'assets/img/product/10/1.jpg', 'array("assets/img/product/10/2.jpg", "assets/img/product/10/3.jpg", "assets/img/product/10/4.jpg", "assets/img/product/10/5.jpg", "assets/img/product/10/6.jpg"); ', '2020-11-04 20:01:53', 150, 3),
	(15, 'Adidas Gazelle Star Wars The Mandalorian Darksaber', 100, 'Dropping as part of ‘The Mandalorian’ collection, the Star Wars x adidas Gazelle ‘Darksaber’ takes inspiration from the black-bladed lightsaber wielded by the Imperial warlord known as Moff Gideon. The sneaker makes use of a black suede upper, accented with metallic silver detailing on the three-stripes and heel tab. Those components are embellished with an electric crackle print and a reflective coating for enhanced visibility in low-light conditions. A durable grey rubber cupsole anchors the low-top.', 'assets/img/product/1/1.jpg', 'array("assets/img/product/1/2.jpg", "assets/img/product/1/3.jpg", "assets/img/product/1/4.jpg", "assets/img/product/1/5.jpg", "assets/img/product/1/6.jpg", "assets/img/product/1/7.jpg"); ', '2020-11-04 00:00:00', 122, 3),
	(16, 'Adidas Top Ten Hi Star Wars The Mandalorian The Child', 90, 'Drawn from ‘The Mandalorian’ collection, the Star Wars x adidas Top Ten High ‘The Child’ gives the classic hoops shoe a design makeover that pays homage to the character commonly known as Baby Yoda. The foundling’s likeness is reproduced on the tongue tag, captioned with text that reads ‘The Force Is Strong With This Little One.’ The shoe itself features a brown and tan leather upper build, accented with Linen Green detailing on the textile collar and suede eyestay.', 'assets/img/product/3/1.jpg', 'array("assets/img/product/2/2.jpg", "assets/img/product/2/3.jpg", "assets/img/product/2/4.jpg", "assets/img/product/2/5.jpg", "assets/img/product/2/6.jpg"); ', '2020-11-04 00:00:00', 122, 4),
	(17, 'Adidas Nizza Star Wars The Mandalorian Beskar Steel', 70, 'Releasing as part of ‘The Mandalorian’ collection, the Star Wars x adidas women’s Nizza ‘Beskar Steel’ pays tribute to the Armorer, the mysterious character tasked with maintaining vital elements of the Mandalorian culture. This fashion-forward take on the vintage silhouette makes use of a brown leather upper inspired by the Armorer’s garb, mounted atop a platform midsole in contrasting white leather. The character’s helmeted likeness adorns a metallic gold tag atop the burgundy leather tongue.', 'assets/img/product/2/1.jpg', 'array("assets/img/product/2/2.jpg", "assets/img/product/2/3.jpg", "assets/img/product/2/4.jpg", "assets/img/product/2/5.jpg"); ', '2020-11-04 00:00:00', 200, 3),
	(18, 'Jordan "Why Not?" Zer0.3', 96.97, 'One of the game\'s fiercest competitors, triple-double dynamo Russell Westbrook has the motor, muscle and mentality to match his fearlessness—with the stats to back it up. The Jordan "Why Not?" Zer0.3 is tuned for Russ\' on-court chaos, featuring a midfoot strap to secure the fit and a large cushioning unit to help drive him hard and fast toward the basket.', 'assets/img/product/11/1.jpg', 'array("assets/img/product/11/2.jpg", "assets/img/product/11/3.jpg", "assets/img/product/11/4.jpg", "assets/img/product/11/5.jpg", "assets/img/product/11/6.jpg"); ', '2020-11-05 15:58:52', 130, 3);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;

-- Dumping structure for table pro1014.product_detail
CREATE TABLE IF NOT EXISTS `product_detail` (
  `product_id` int(10) unsigned NOT NULL COMMENT 'Mã sản phẩm',
  `color_id` int(10) unsigned NOT NULL COMMENT 'Màu sản phẩm',
  `size_id` int(10) unsigned NOT NULL COMMENT 'Size sản phẩm',
  `quantity` int(10) unsigned NOT NULL COMMENT 'Số lượng',
  KEY `FK__product` (`product_id`),
  KEY `FK__color` (`color_id`),
  KEY `FK__size` (`size_id`),
  CONSTRAINT `FK__color` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK__product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK__size` FOREIGN KEY (`size_id`) REFERENCES `size` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table pro1014.product_detail: ~4 rows (approximately)
DELETE FROM `product_detail`;
/*!40000 ALTER TABLE `product_detail` DISABLE KEYS */;
INSERT INTO `product_detail` (`product_id`, `color_id`, `size_id`, `quantity`) VALUES
	(1, 1, 38, 26),
	(1, 10, 38, 50),
	(1, 1, 39, 13),
	(1, 1, 42, 31);
/*!40000 ALTER TABLE `product_detail` ENABLE KEYS */;

-- Dumping structure for table pro1014.review
CREATE TABLE IF NOT EXISTS `review` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `review` text,
  `rate` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_review_product` (`product_id`),
  KEY `FK_review_user` (`user_id`),
  CONSTRAINT `FK_review_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_review_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table pro1014.review: ~0 rows (approximately)
DELETE FROM `review`;
/*!40000 ALTER TABLE `review` DISABLE KEYS */;
/*!40000 ALTER TABLE `review` ENABLE KEYS */;

-- Dumping structure for table pro1014.size
CREATE TABLE IF NOT EXISTS `size` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `size` int(11) unsigned NOT NULL COMMENT 'Size giày',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

-- Dumping data for table pro1014.size: ~14 rows (approximately)
DELETE FROM `size`;
/*!40000 ALTER TABLE `size` DISABLE KEYS */;
INSERT INTO `size` (`id`, `size`) VALUES
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

-- Dumping structure for table pro1014.slider
CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) unsigned NOT NULL,
  `priority` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'Thứ tự slider',
  `description` text NOT NULL,
  `title` text NOT NULL,
  `img` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_slider_product` (`product_id`),
  CONSTRAINT `FK_slider_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table pro1014.slider: ~2 rows (approximately)
DELETE FROM `slider`;
/*!40000 ALTER TABLE `slider` DISABLE KEYS */;
INSERT INTO `slider` (`id`, `product_id`, `priority`, `description`, `title`, `img`) VALUES
	(1, 18, 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et', 'Jordan <br> "Why Not?"', 'assets/img/product/11/slider.png'),
	(2, 18, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et', 'Nike New <br>Collection!', 'assets/img/banner/banner-img.png');
/*!40000 ALTER TABLE `slider` ENABLE KEYS */;

-- Dumping structure for table pro1014.tag_blog
CREATE TABLE IF NOT EXISTS `tag_blog` (
  `id` int(11) unsigned NOT NULL,
  `name` text NOT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table pro1014.tag_blog: ~0 rows (approximately)
DELETE FROM `tag_blog`;
/*!40000 ALTER TABLE `tag_blog` DISABLE KEYS */;
/*!40000 ALTER TABLE `tag_blog` ENABLE KEYS */;

-- Dumping structure for table pro1014.tag_of_blog
CREATE TABLE IF NOT EXISTS `tag_of_blog` (
  `blog_id` int(11) unsigned DEFAULT NULL,
  `tag_id` int(11) unsigned DEFAULT NULL,
  KEY `FK_tag_of_blog_blog` (`blog_id`),
  KEY `FK_tag_of_blog_tag_blog` (`tag_id`),
  CONSTRAINT `FK_tag_of_blog_blog` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_tag_of_blog_tag_blog` FOREIGN KEY (`tag_id`) REFERENCES `tag_blog` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table pro1014.tag_of_blog: ~0 rows (approximately)
DELETE FROM `tag_of_blog`;
/*!40000 ALTER TABLE `tag_of_blog` DISABLE KEYS */;
/*!40000 ALTER TABLE `tag_of_blog` ENABLE KEYS */;

-- Dumping structure for table pro1014.tag_of_product
CREATE TABLE IF NOT EXISTS `tag_of_product` (
  `product_id` int(11) unsigned DEFAULT NULL,
  `tag_id` int(11) unsigned DEFAULT NULL,
  KEY `FK_tag_of_product_product` (`product_id`),
  KEY `FK_tag_of_product_tag` (`tag_id`),
  CONSTRAINT `FK_tag_of_product_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_tag_of_product_tag` FOREIGN KEY (`tag_id`) REFERENCES `tag_product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table pro1014.tag_of_product: ~3 rows (approximately)
DELETE FROM `tag_of_product`;
/*!40000 ALTER TABLE `tag_of_product` DISABLE KEYS */;
INSERT INTO `tag_of_product` (`product_id`, `tag_id`) VALUES
	(1, 6),
	(2, 7),
	(3, 6);
/*!40000 ALTER TABLE `tag_of_product` ENABLE KEYS */;

-- Dumping structure for table pro1014.tag_product
CREATE TABLE IF NOT EXISTS `tag_product` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL COMMENT 'Tên danh mục',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Dumping data for table pro1014.tag_product: ~11 rows (approximately)
DELETE FROM `tag_product`;
/*!40000 ALTER TABLE `tag_product` DISABLE KEYS */;
INSERT INTO `tag_product` (`id`, `name`) VALUES
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
/*!40000 ALTER TABLE `tag_product` ENABLE KEYS */;

-- Dumping structure for table pro1014.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` tinytext NOT NULL,
  `password` tinytext NOT NULL,
  `email` tinytext,
  `phone` tinytext,
  `created` datetime DEFAULT NULL,
  `birthday` datetime DEFAULT NULL,
  `fullname` tinytext,
  `avartar` text,
  `rank` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table pro1014.user: ~3 rows (approximately)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `username`, `password`, `email`, `phone`, `created`, `birthday`, `fullname`, `avartar`, `rank`) VALUES
	(1, 'huy', '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(2, 'dien', '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(3, 'dung', '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
