-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.1.0.6116
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for pro1014
CREATE DATABASE IF NOT EXISTS `pro1014` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `pro1014`;

-- Dumping structure for table pro1014.blog
CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL COMMENT 'ID người viết',
  `title` char(255) NOT NULL DEFAULT '' COMMENT 'Tiêu đề',
  `created` datetime NOT NULL COMMENT 'Ngày giờ đăng bài viết',
  `update` datetime DEFAULT NULL COMMENT 'Ngày giờ cập nhật bài viết',
  `thumb` char(255) DEFAULT NULL COMMENT 'Hình mô tả',
  `description` char(255) DEFAULT NULL COMMENT 'Mô tả',
  `content` varchar(20000) DEFAULT '' COMMENT 'Bài viết',
  `view` int(11) unsigned DEFAULT NULL COMMENT 'Lượt xem',
  `show` bit(1) DEFAULT NULL COMMENT '(0) Ẩn, (1) Hiện',
  `priority` int(10) unsigned DEFAULT NULL COMMENT 'Thứ tự sắp xếp',
  PRIMARY KEY (`id`),
  KEY `FK_blog_user` (`user_id`),
  CONSTRAINT `FK_blog_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table pro1014.blog: ~2 rows (approximately)
/*!40000 ALTER TABLE `blog` DISABLE KEYS */;
REPLACE INTO `blog` (`id`, `user_id`, `title`, `created`, `update`, `thumb`, `description`, `content`, `view`, `show`, `priority`) VALUES
	(1, 1, 'Will VF Corp’s Acquisition of Supreme Impact Sneaker Colabs? Here’s What We Know', '2020-11-01 08:52:06', NULL, 'assets/img/...', 'With reverberations sure to be felt across the entire industry, it has been announced that legendary New York label Supreme has been acquired by VF Corp – the parent company of Vans ­– for a figure reportedly exceeding $2.1 billion.', '<div><p><strong>With reverberations sure to be felt across the entire industry, it has been announced that legendary New York label <a href="/tag/supreme">Supreme</a> has been <a href="/news/supreme-sold-to-vans-parent-company-vf-corp-for-usd2-1-billion">acquired by VF Corp</a> – the parent company of <a href="/tag/vans">Vans</a> ­– for a figure reportedly exceeding $2.1 billion.</strong></p><p><strong>‘We’re proud to join VF, a world-class company that is home to great brands we’ve worked with for years, including The North Face, Vans, and Timberland,’ said Supreme’s founder James Jebbia. ‘This partnership will maintain our unique culture and independence, while allowing us to grow on the same path we’ve been on since 1994.’</strong></p><p><strong>Same path? We’re not so sure about that. </strong></p><p><strong>The news has sneakerheads speculating regarding the future of Supreme’s upcoming footwear collaborations. Could this be the end of the line for Supreme x Nike? And will we be seeing more drops alongside Vans? A lot remains to be seen, but here’s what we know so far.  </strong></p></div><div><h3>Who Are VF Corp?</h3><p>Founded in 1899, VF Corporation has grown to become one of world’s largest apparel, footwear and accessories companies, parenting iconic brands like The North Face, Timberland, Dickies, and the aforementioned Vans – all of whom have produced <a href="/releases/supreme-and-vans-distress-denim-for-their-latest-colab">sought-after collaborations</a> with Supreme.</p><p>Undoubtedly VF’s biggest sneaker coup, Vans was acquired by the company in 2004 in a $396 million deal. Since then, a number of Vans’ executives have moved on to become key members of VF’s management structure, reporting directly to CEO Steve Rendle.</p><p>Regarding the new Supreme acquisition, here’s what Rendle had to say:</p><p>‘We are thrilled to welcome Supreme to the VF family and to build on our decades-long relationship as we create value for all of our stakeholders. VF is the ideal steward to honour the authentic heritage of this cultural lifestyle brand while providing the opportunity to leverage our scale and expertise to enable sustainable long-term growth,’ he said.</p><p>‘The acquisition of the Supreme brand is further validation of our vision and strategy to further evolve our portfolio of brands to align with the total addressable market opportunities we see driving the apparel and footwear sector. The Supreme brand will further accelerate VF’s hyper-digital business model transformation and will be a meaningful driver of VF’s commitment to top quartile total shareholder return and long-term value creation.’</p><p>Outlining a five-year plan, Rendle hopes to see a 10 per cent revenue growth, driven by a large international and direct-to-consumer expansion opportunity.</p><p>‘On a year to date basis, including the impact of COVID-related disruption, Supreme’s revenue has increased in a mid-single digit rate, including more accelerated growth since the launch of the brand’s Fall/Winter season,’ he said. ‘On a full-year basis, we expect Supreme to contribute more than $500 million in revenue.’</p></div><div><h3>What Does This Mean for Future Sneaker Collaborations? </h3><p>With the VF acquisition, sneakerheads can look forward to the prospect of more global brick-and-mortar stores, as well as improvements when it comes to Supreme’s global supply chain, international platforms, and digital capabilities.</p><p>On top of those changes, it’s safe to assume that we can expect to see more projects alongside stablemates Vans, <a href="/releases/supreme-timberland-world-hiker-front-country-boot">Timberland</a>, and <a href="/news/supreme-x-the-north-face-collection">The North Face</a>, but what does this mean for Supreme’s distinguished footwear collaborators outside the VF bubble? Most notably Nike, who they’ve worked with to produce dozens of iconic collaborations over the years.&nbsp;</p><p>Thankfully, at present, early signs point to Supreme continuing their longstanding collaborative strategy.</p><p>‘The collaboration question is an important one,’ Rendle acknowledges. ‘This is a highly well-run business. The management team has a very clear strategy that we will support and enable. The collaborations are an important part of their model, but this is their decision to drive, and ours absolutely to support.’</p><p>While the brand is no stranger to having the ‘sell-out’ tag thrown at them, Supreme remains anchored in East Coast skate culture, continuing to tap into elements of art and music, despite their ‘world famous’ international acclaim. The brand’s ‘unique culture and independence’ has always been close to founder James Jebbia’s heart, and we can’t see them straying too far from that ethos anytime soon.</p><p>‘I would hope, and I think this is true, that the market understands how VF works with our branded portfolio. We do not dictate what our businesses do. We really work to support and enable the strategies that each business has in place. I think this will be very true for Supreme going forward,’ Rendle reiterated. ‘Their collaborations are beyond apparel and footwear. I think you know well that they work with a broad cross section of different sectors and different businesses to enhance their model. We have no intention of changing that.’</p><p>For the ‘Preme fiends out there, we’re hoping they stay true to their word.</p><p>You can read VF Corp’s full acquisition statement <a target="_blank" href="https://www.vfc.com/news/press-release/1738/vf-corporation-announces-definitive-agreement-to-acquire" rel="noopener noreferrer">here</a>.</p></div>', 295, b'1', NULL),
	(2, 1, 'Will VF Corp’s Acquisition of Supreme Impact Sneaker Colabs? Here’s What We Know', '2020-11-01 08:52:06', NULL, 'assets/img/...', 'With reverberations sure to be felt across the entire industry, it has been announced that legendary New York label Supreme has been acquired by VF Corp – the parent company of Vans ­– for a figure reportedly exceeding $2.1 billion.', '<div><p><strong>With reverberations sure to be felt across the entire industry, it has been announced that legendary New York label <a href="/tag/supreme">Supreme</a> has been <a href="/news/supreme-sold-to-vans-parent-company-vf-corp-for-usd2-1-billion">acquired by VF Corp</a> – the parent company of <a href="/tag/vans">Vans</a> ­– for a figure reportedly exceeding $2.1 billion.</strong></p><p><strong>‘We’re proud to join VF, a world-class company that is home to great brands we’ve worked with for years, including The North Face, Vans, and Timberland,’ said Supreme’s founder James Jebbia. ‘This partnership will maintain our unique culture and independence, while allowing us to grow on the same path we’ve been on since 1994.’</strong></p><p><strong>Same path? We’re not so sure about that. </strong></p><p><strong>The news has sneakerheads speculating regarding the future of Supreme’s upcoming footwear collaborations. Could this be the end of the line for Supreme x Nike? And will we be seeing more drops alongside Vans? A lot remains to be seen, but here’s what we know so far.  </strong></p></div><div><h3>Who Are VF Corp?</h3><p>Founded in 1899, VF Corporation has grown to become one of world’s largest apparel, footwear and accessories companies, parenting iconic brands like The North Face, Timberland, Dickies, and the aforementioned Vans – all of whom have produced <a href="/releases/supreme-and-vans-distress-denim-for-their-latest-colab">sought-after collaborations</a> with Supreme.</p><p>Undoubtedly VF’s biggest sneaker coup, Vans was acquired by the company in 2004 in a $396 million deal. Since then, a number of Vans’ executives have moved on to become key members of VF’s management structure, reporting directly to CEO Steve Rendle.</p><p>Regarding the new Supreme acquisition, here’s what Rendle had to say:</p><p>‘We are thrilled to welcome Supreme to the VF family and to build on our decades-long relationship as we create value for all of our stakeholders. VF is the ideal steward to honour the authentic heritage of this cultural lifestyle brand while providing the opportunity to leverage our scale and expertise to enable sustainable long-term growth,’ he said.</p><p>‘The acquisition of the Supreme brand is further validation of our vision and strategy to further evolve our portfolio of brands to align with the total addressable market opportunities we see driving the apparel and footwear sector. The Supreme brand will further accelerate VF’s hyper-digital business model transformation and will be a meaningful driver of VF’s commitment to top quartile total shareholder return and long-term value creation.’</p><p>Outlining a five-year plan, Rendle hopes to see a 10 per cent revenue growth, driven by a large international and direct-to-consumer expansion opportunity.</p><p>‘On a year to date basis, including the impact of COVID-related disruption, Supreme’s revenue has increased in a mid-single digit rate, including more accelerated growth since the launch of the brand’s Fall/Winter season,’ he said. ‘On a full-year basis, we expect Supreme to contribute more than $500 million in revenue.’</p></div><div><h3>What Does This Mean for Future Sneaker Collaborations? </h3><p>With the VF acquisition, sneakerheads can look forward to the prospect of more global brick-and-mortar stores, as well as improvements when it comes to Supreme’s global supply chain, international platforms, and digital capabilities.</p><p>On top of those changes, it’s safe to assume that we can expect to see more projects alongside stablemates Vans, <a href="/releases/supreme-timberland-world-hiker-front-country-boot">Timberland</a>, and <a href="/news/supreme-x-the-north-face-collection">The North Face</a>, but what does this mean for Supreme’s distinguished footwear collaborators outside the VF bubble? Most notably Nike, who they’ve worked with to produce dozens of iconic collaborations over the years.&nbsp;</p><p>Thankfully, at present, early signs point to Supreme continuing their longstanding collaborative strategy.</p><p>‘The collaboration question is an important one,’ Rendle acknowledges. ‘This is a highly well-run business. The management team has a very clear strategy that we will support and enable. The collaborations are an important part of their model, but this is their decision to drive, and ours absolutely to support.’</p><p>While the brand is no stranger to having the ‘sell-out’ tag thrown at them, Supreme remains anchored in East Coast skate culture, continuing to tap into elements of art and music, despite their ‘world famous’ international acclaim. The brand’s ‘unique culture and independence’ has always been close to founder James Jebbia’s heart, and we can’t see them straying too far from that ethos anytime soon.</p><p>‘I would hope, and I think this is true, that the market understands how VF works with our branded portfolio. We do not dictate what our businesses do. We really work to support and enable the strategies that each business has in place. I think this will be very true for Supreme going forward,’ Rendle reiterated. ‘Their collaborations are beyond apparel and footwear. I think you know well that they work with a broad cross section of different sectors and different businesses to enhance their model. We have no intention of changing that.’</p><p>For the ‘Preme fiends out there, we’re hoping they stay true to their word.</p><p>You can read VF Corp’s full acquisition statement <a target="_blank" href="https://www.vfc.com/news/press-release/1738/vf-corporation-announces-definitive-agreement-to-acquire" rel="noopener noreferrer">here</a>.</p></div>', 247, b'1', NULL);
/*!40000 ALTER TABLE `blog` ENABLE KEYS */;

-- Dumping structure for table pro1014.brand
CREATE TABLE IF NOT EXISTS `brand` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT 'Tên hãng giày',
  `show` bit(1) DEFAULT NULL COMMENT '(0) Ẩn, (1) Hiện',
  `priority` int(11) unsigned DEFAULT NULL COMMENT 'thứ tụ sắp xếp',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Dumping data for table pro1014.brand: ~8 rows (approximately)
/*!40000 ALTER TABLE `brand` DISABLE KEYS */;
REPLACE INTO `brand` (`id`, `name`, `show`, `priority`) VALUES
	(1, 'Nike', NULL, NULL),
	(2, 'Jordan', NULL, NULL),
	(3, 'Adidas', NULL, NULL),
	(4, 'Converse', NULL, NULL),
	(5, 'Puma', NULL, NULL),
	(6, 'Vans', NULL, NULL),
	(7, 'Reebok', NULL, NULL),
	(8, 'New Balance', NULL, NULL);
/*!40000 ALTER TABLE `brand` ENABLE KEYS */;

-- Dumping structure for table pro1014.cart
CREATE TABLE IF NOT EXISTS `cart` (
  `user_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `size_id` int(10) unsigned NOT NULL,
  `color_id` int(10) unsigned NOT NULL,
  `quantity` int(10) unsigned NOT NULL,
  KEY `FK_cart_user` (`user_id`),
  KEY `FK_cart_product` (`product_id`),
  KEY `FK_cart_size` (`size_id`),
  KEY `FK_cart_color` (`color_id`),
  CONSTRAINT `FK_cart_color` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_cart_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_cart_size` FOREIGN KEY (`size_id`) REFERENCES `size` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_cart_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table pro1014.cart: ~0 rows (approximately)
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;

-- Dumping structure for table pro1014.color
CREATE TABLE IF NOT EXISTS `color` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(50) DEFAULT NULL COMMENT 'Tên màu',
  `colorCode` char(20) DEFAULT NULL COMMENT 'Mã HEX color',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Dumping data for table pro1014.color: ~10 rows (approximately)
/*!40000 ALTER TABLE `color` DISABLE KEYS */;
REPLACE INTO `color` (`id`, `name`, `colorCode`) VALUES
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
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `content` varchar(1000) NOT NULL DEFAULT '',
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_comment_product` (`product_id`),
  KEY `FK_comment_user` (`user_id`),
  CONSTRAINT `FK_comment_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_comment_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table pro1014.comment: ~4 rows (approximately)
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
REPLACE INTO `comment` (`id`, `product_id`, `user_id`, `content`, `created`) VALUES
	(1, 1, 1, 'This is comment.', NULL),
	(2, 1, 2, 'This is comment.', NULL),
	(3, 2, 3, 'This is comment.', NULL),
	(4, 1, 3, 'This is comment.', NULL);
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;

-- Dumping structure for table pro1014.config
CREATE TABLE IF NOT EXISTS `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `config` json DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table pro1014.config: ~2 rows (approximately)
/*!40000 ALTER TABLE `config` DISABLE KEYS */;
REPLACE INTO `config` (`id`, `name`, `config`) VALUES
	(1, 'default_layout', '{"home": ["layouts/header", "home/banner", "home/features", "home/newProduct", "home/category", "home/product", "home/ExclusiveDeal", "home/brand", "home/RelatedPoduct", "layouts/Footer"], "topmenu": [["Home", "home.php"], ["Shop", "shop.php"], ["Blog", "blog.php"], ["Contact", "contact.php"], ["Login", "account.php"], ["Admin", "admin.php"]]}'),
	(2, 'layout', '{"home": ["layouts/header", "home/banner", "home/features", "home/newProduct", "home/category", "home/product", "home/ExclusiveDeal", "home/brand", "home/RelatedPoduct", "layouts/Footer"], "topmenu": [["Home", "home.php"], ["Shop", "shop.php"], ["Blog", "blog.php"], ["Contact", "contact.php"], ["Login", "account.php"], ["Admin", "admin.php"]]}');
/*!40000 ALTER TABLE `config` ENABLE KEYS */;

-- Dumping structure for table pro1014.deal
CREATE TABLE IF NOT EXISTS `deal` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `end_time` datetime NOT NULL,
  `start_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='Bản khuyến mãi, khuyến mãi sẽ bắt đầu từ start_time, đến hết end_time, trong thời gian khuyến mãi, sản phẩm sẽ được bán với giá deal_price với số lượng quantity.';

-- Dumping data for table pro1014.deal: ~0 rows (approximately)
/*!40000 ALTER TABLE `deal` DISABLE KEYS */;
REPLACE INTO `deal` (`id`, `end_time`, `start_time`) VALUES
	(1, '2020-11-06 22:32:25', '2020-11-03 22:32:30');
/*!40000 ALTER TABLE `deal` ENABLE KEYS */;

-- Dumping structure for table pro1014.deal_detail
CREATE TABLE IF NOT EXISTS `deal_detail` (
  `deal_id` int(255) unsigned NOT NULL DEFAULT '0' COMMENT 'Mã đợt khuyến mãi',
  `product_id` int(255) unsigned NOT NULL DEFAULT '0' COMMENT 'Sản phẩm được khuyến mãi',
  `quantity` int(255) unsigned NOT NULL COMMENT 'Số lượng sản phẩm',
  `deal_thumb` text COMMENT 'Hình ảnh khuyến mãi',
  `deal_price` float unsigned DEFAULT NULL COMMENT 'Giá khuyến mãi',
  `sold` int(11) DEFAULT NULL COMMENT 'Số lượng đã bán',
  KEY `FK_product_of_deal_deal` (`deal_id`),
  KEY `FK_product_of_deal_product` (`product_id`),
  CONSTRAINT `FK_product_of_deal_deal` FOREIGN KEY (`deal_id`) REFERENCES `deal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_product_of_deal_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table pro1014.deal_detail: ~2 rows (approximately)
/*!40000 ALTER TABLE `deal_detail` DISABLE KEYS */;
REPLACE INTO `deal_detail` (`deal_id`, `product_id`, `quantity`, `deal_thumb`, `deal_price`, `sold`) VALUES
	(1, 1, 100, 'assets/img/product/1/1.jpg', 75, 13),
	(1, 5, 100, 'assets/img/product/2/1.jpg', 80, 27);
/*!40000 ALTER TABLE `deal_detail` ENABLE KEYS */;

-- Dumping structure for table pro1014.order
CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `status` tinyint(1) unsigned DEFAULT NULL COMMENT 'Mới(0), đang giao(1), đã hoàn thành (2), Hủy(3)',
  `created` datetime DEFAULT NULL,
  `name` char(100) DEFAULT NULL,
  `address` char(255) DEFAULT NULL,
  `phone` char(20) DEFAULT NULL,
  `email` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_order_user` (`user_id`),
  CONSTRAINT `FK_order_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table pro1014.order: ~7 rows (approximately)
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
REPLACE INTO `order` (`id`, `user_id`, `status`, `created`, `name`, `address`, `phone`, `email`) VALUES
	(1, 1, 0, '2020-11-10 18:40:53', NULL, NULL, NULL, NULL),
	(2, 3, 1, '2020-10-27 18:40:53', NULL, NULL, NULL, NULL),
	(3, 1, 3, '2020-11-20 12:36:53', NULL, NULL, NULL, NULL),
	(4, 2, 1, '2020-11-06 23:33:53', NULL, NULL, NULL, NULL),
	(5, 2, 0, '2020-11-07 16:02:53', NULL, NULL, NULL, NULL),
	(6, 2, 3, '2020-11-13 11:33:30', NULL, NULL, NULL, NULL),
	(7, 2, 2, '2020-11-13 11:33:47', NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `order` ENABLE KEYS */;

-- Dumping structure for table pro1014.order_detail
CREATE TABLE IF NOT EXISTS `order_detail` (
  `order_id` int(11) unsigned NOT NULL,
  `product_id` int(11) unsigned NOT NULL,
  `color_id` int(11) unsigned NOT NULL,
  `size_id` int(11) unsigned NOT NULL,
  `quantity` int(11) unsigned DEFAULT NULL COMMENT 'Số lượng',
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

-- Dumping data for table pro1014.order_detail: ~3 rows (approximately)
/*!40000 ALTER TABLE `order_detail` DISABLE KEYS */;
REPLACE INTO `order_detail` (`order_id`, `product_id`, `color_id`, `size_id`, `quantity`, `price`) VALUES
	(1, 1, 2, 38, 1, 75),
	(1, 5, 1, 42, 1, 100),
	(1, 5, 7, 42, 1, 100);
/*!40000 ALTER TABLE `order_detail` ENABLE KEYS */;

-- Dumping structure for table pro1014.product
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Mã sản phẩm',
  `name` char(255) NOT NULL DEFAULT '' COMMENT 'Tên sản phẩm',
  `cost` float unsigned NOT NULL COMMENT 'Giá gốc chưa giảm',
  `price` float unsigned DEFAULT NULL COMMENT 'Giá bán ra, đã giảm giá',
  `description` varchar(20000) DEFAULT '' COMMENT 'Mô tả sản phẩm',
  `thumb` char(255) DEFAULT '' COMMENT 'Ảnh bìa sản phẩm, không nền, .PNG, ít nhất 2 hình',
  `images` char(255) DEFAULT '' COMMENT 'Hình ảnh thực tế của sản phẩm',
  `update` datetime NOT NULL COMMENT 'Thời gian update mới nhất',
  `show` bit(1) DEFAULT NULL COMMENT '(0) Ẩn, (1) Hiện',
  `priority` int(10) unsigned DEFAULT NULL COMMENT 'Thứ tự sắp xếp',
  `brand_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_product_brand` (`brand_id`),
  CONSTRAINT `FK_product_brand` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- Dumping data for table pro1014.product: ~18 rows (approximately)
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
REPLACE INTO `product` (`id`, `name`, `cost`, `price`, `description`, `thumb`, `images`, `update`, `show`, `priority`, `brand_id`) VALUES
	(1, 'Adidas Gazelle Star Wars The Mandalorian Darksaber', 122, 100, 'Dropping as part of ‘The Mandalorian’ collection, the Star Wars x adidas Gazelle ‘Darksaber’ takes inspiration from the black-bladed lightsaber wielded by the Imperial warlord known as Moff Gideon. The sneaker makes use of a black suede upper, accented with metallic silver detailing on the three-stripes and heel tab. Those components are embellished with an electric crackle print and a reflective coating for enhanced visibility in low-light conditions. A durable grey rubber cupsole anchors the low-top.', 'assets/img/product/1/1.jpg', '["assets\\/img\\/product\\/1\\/2.jpg","assets\\/img\\/product\\/1\\/3.jpg","assets\\/img\\/product\\/1\\/4.jpg","assets\\/img\\/product\\/1\\/5.jpg","assets\\/img\\/product\\/1\\/6.jpg","assets\\/img\\/product\\/1\\/7.jpg"]', '2020-11-04 00:00:00', NULL, NULL, 3),
	(2, 'Adidas Nizza Star Wars The Mandalorian Beskar Steel', 200, 70, 'Releasing as part of ‘The Mandalorian’ collection, the Star Wars x adidas women’s Nizza ‘Beskar Steel’ pays tribute to the Armorer, the mysterious character tasked with maintaining vital elements of the Mandalorian culture. This fashion-forward take on the vintage silhouette makes use of a brown leather upper inspired by the Armorer’s garb, mounted atop a platform midsole in contrasting white leather. The character’s helmeted likeness adorns a metallic gold tag atop the burgundy leather tongue.', 'assets/img/product/2/1.jpg', '["assets\\/img\\/product\\/2\\/2.jpg","assets\\/img\\/product\\/2\\/3.jpg","assets\\/img\\/product\\/2\\/4.jpg","assets\\/img\\/product\\/2\\/5.jpg"]', '2020-11-04 00:00:00', NULL, NULL, 2),
	(3, 'Adidas Top Ten Hi Star Wars The Mandalorian The Child', 122, 90, 'Drawn from ‘The Mandalorian’ collection, the Star Wars x adidas Top Ten High ‘The Child’ gives the classic hoops shoe a design makeover that pays homage to the character commonly known as Baby Yoda. The foundling’s likeness is reproduced on the tongue tag, captioned with text that reads ‘The Force Is Strong With This Little One.’ The shoe itself features a brown and tan leather upper build, accented with Linen Green detailing on the textile collar and suede eyestay.', 'assets/img/product/3/1.jpg', '["assets\\/img\\/product\\/2\\/2.jpg","assets\\/img\\/product\\/2\\/3.jpg","assets\\/img\\/product\\/2\\/4.jpg","assets\\/img\\/product\\/2\\/5.jpg","assets\\/img\\/product\\/2\\/6.jpg"]', '2020-11-04 00:00:00', NULL, NULL, 1),
	(4, 'Adidas Superstar Star Wars The Mandalorian The Child', 150, 90, 'Launching as part of ‘The Mandalorian’ collection, the Star Wars x adidas Superstar ‘The Child’ draws inspiration from the character colloquially known as Baby Yoda. Linen Green coloring is executed on the sneaker’s leather upper, accented with contrasting black three-stripes and a ‘The Child’ graphic on the lateral heel. Atop the tongue, printed text in Star Wars’ Aurebesh alphabet denotes the 50th anniversary of the Superstar silhouette.', 'assets/img/product/4/1.jpg', '["assets\\/img\\/product\\/4\\/2.jpg","assets\\/img\\/product\\/4\\/3.jpg","assets\\/img\\/product\\/4\\/4.jpg","assets\\/img\\/product\\/4\\/5.jpg","assets\\/img\\/product\\/4\\/6.jpg"]', '2020-11-04 00:00:00', NULL, NULL, 7),
	(5, 'Adidas Gazelle Star Wars The Mandalorian Darksaber', 122, 100, 'Dropping as part of ‘The Mandalorian’ collection, the Star Wars x adidas Gazelle ‘Darksaber’ takes inspiration from the black-bladed lightsaber wielded by the Imperial warlord known as Moff Gideon. The sneaker makes use of a black suede upper, accented with metallic silver detailing on the three-stripes and heel tab. Those components are embellished with an electric crackle print and a reflective coating for enhanced visibility in low-light conditions. A durable grey rubber cupsole anchors the low-top.', 'assets/img/product/1/1.jpg', '["assets\\/img\\/product\\/1\\/2.jpg","assets\\/img\\/product\\/1\\/3.jpg","assets\\/img\\/product\\/1\\/4.jpg","assets\\/img\\/product\\/1\\/5.jpg","assets\\/img\\/product\\/1\\/6.jpg","assets\\/img\\/product\\/1\\/7.jpg"]', '2020-11-04 00:00:00', NULL, NULL, 4),
	(6, 'Adidas Nizza Star Wars The Mandalorian Beskar Steel', 200, 70, 'Releasing as part of ‘The Mandalorian’ collection, the Star Wars x adidas women’s Nizza ‘Beskar Steel’ pays tribute to the Armorer, the mysterious character tasked with maintaining vital elements of the Mandalorian culture. This fashion-forward take on the vintage silhouette makes use of a brown leather upper inspired by the Armorer’s garb, mounted atop a platform midsole in contrasting white leather. The character’s helmeted likeness adorns a metallic gold tag atop the burgundy leather tongue.', 'assets/img/product/2/1.jpg', '["assets\\/img\\/product\\/2\\/2.jpg","assets\\/img\\/product\\/2\\/3.jpg","assets\\/img\\/product\\/2\\/4.jpg","assets\\/img\\/product\\/2\\/5.jpg"]', '2020-11-04 00:00:00', NULL, NULL, 3),
	(7, 'Adidas Top Ten Hi Star Wars The Mandalorian The Child', 122, 90, 'Drawn from ‘The Mandalorian’ collection, the Star Wars x adidas Top Ten High ‘The Child’ gives the classic hoops shoe a design makeover that pays homage to the character commonly known as Baby Yoda. The foundling’s likeness is reproduced on the tongue tag, captioned with text that reads ‘The Force Is Strong With This Little One.’ The shoe itself features a brown and tan leather upper build, accented with Linen Green detailing on the textile collar and suede eyestay.', 'assets/img/product/3/1.jpg', '["assets\\/img\\/product\\/2\\/2.jpg","assets\\/img\\/product\\/2\\/3.jpg","assets\\/img\\/product\\/2\\/4.jpg","assets\\/img\\/product\\/2\\/5.jpg","assets\\/img\\/product\\/2\\/6.jpg"]', '2020-11-04 00:00:00', NULL, NULL, 3),
	(8, 'Adidas Superstar Star Wars The Mandalorian The Child', 150, 90, 'Launching as part of ‘The Mandalorian’ collection, the Star Wars x adidas Superstar ‘The Child’ draws inspiration from the character colloquially known as Baby Yoda. Linen Green coloring is executed on the sneaker’s leather upper, accented with contrasting black three-stripes and a ‘The Child’ graphic on the lateral heel. Atop the tongue, printed text in Star Wars’ Aurebesh alphabet denotes the 50th anniversary of the Superstar silhouette.', 'assets/img/product/4/1.jpg', '["assets\\/img\\/product\\/4\\/2.jpg","assets\\/img\\/product\\/4\\/3.jpg","assets\\/img\\/product\\/4\\/4.jpg","assets\\/img\\/product\\/4\\/5.jpg","assets\\/img\\/product\\/4\\/6.jpg"]', '2020-11-04 00:00:00', NULL, NULL, 3),
	(9, 'Ultraboost OG Shoes', 250, 200, 'Built for impact. These adidas x IVY PARK Ultraboost Shoes take a celebrated adidas style and injects it with utilitarian swag and a touch of attitude. Energy-returning cushioning creates a sense of fluid motion for a smooth ride. A hook on the heel clips to your gym bag, showing off the bold style even when they\'re not on.', 'assets/img/product/9/1.jpg', '["assets\\/img\\/product\\/9\\/2.jpg","assets\\/img\\/product\\/9\\/3.jpg","assets\\/img\\/product\\/9\\/4.jpg","assets\\/img\\/product\\/9\\/5.jpg","assets\\/img\\/product\\/9\\/6.jpg"]', '2020-11-04 20:00:52', NULL, NULL, 3),
	(10, 'Forum Low Shoes', 150, 130, 'If we\'re talking legends, you know the adidas Forum is driving the conversation. The basketball game changer dominated the court in the \'80s, and brings that energy to today\'s moves. These adidas x IVY PARK sneakers capture the distinct elements that left their mark back in the day. Ankle straps. X details. A layered upper. They\'re all there, just with a fresh splash of color.', 'assets/img/product/10/1.jpg', 'array("assets/img/product/10/2.jpg", "assets/img/product/10/3.jpg", "assets/img/product/10/4.jpg", "assets/img/product/10/5.jpg", "assets/img/product/10/6.jpg");', '2020-11-04 20:01:53', NULL, NULL, 4),
	(11, 'Ultraboost OG Shoes', 250, 200, 'Built for impact. These adidas x IVY PARK Ultraboost Shoes take a celebrated adidas style and injects it with utilitarian swag and a touch of attitude. Energy-returning cushioning creates a sense of fluid motion for a smooth ride. A hook on the heel clips to your gym bag, showing off the bold style even when they\'re not on.', 'assets/img/product/9/1.jpg', 'array("assets/img/product/9/2.jpg", "assets/img/product/9/3.jpg", "assets/img/product/9/4.jpg", "assets/img/product/9/5.jpg", "assets/img/product/9/6.jpg");', '2020-11-04 20:00:52', NULL, NULL, 3),
	(12, 'Forum Low Shoes', 150, 130, 'If we\'re talking legends, you know the adidas Forum is driving the conversation. The basketball game changer dominated the court in the \'80s, and brings that energy to today\'s moves. These adidas x IVY PARK sneakers capture the distinct elements that left their mark back in the day. Ankle straps. X details. A layered upper. They\'re all there, just with a fresh splash of color.', 'assets/img/product/10/1.jpg', 'array("assets/img/product/10/2.jpg", "assets/img/product/10/3.jpg", "assets/img/product/10/4.jpg", "assets/img/product/10/5.jpg", "assets/img/product/10/6.jpg");', '2020-11-04 20:01:53', NULL, NULL, 3),
	(13, 'Ultraboost OG Shoes', 250, 200, 'Built for impact. These adidas x IVY PARK Ultraboost Shoes take a celebrated adidas style and injects it with utilitarian swag and a touch of attitude. Energy-returning cushioning creates a sense of fluid motion for a smooth ride. A hook on the heel clips to your gym bag, showing off the bold style even when they\'re not on.', 'assets/img/product/9/1.jpg', 'array("assets/img/product/9/2.jpg", "assets/img/product/9/3.jpg", "assets/img/product/9/4.jpg", "assets/img/product/9/5.jpg", "assets/img/product/9/6.jpg");', '2020-11-04 20:00:52', NULL, NULL, 3),
	(14, 'Forum Low Shoes', 150, 130, 'If we\'re talking legends, you know the adidas Forum is driving the conversation. The basketball game changer dominated the court in the \'80s, and brings that energy to today\'s moves. These adidas x IVY PARK sneakers capture the distinct elements that left their mark back in the day. Ankle straps. X details. A layered upper. They\'re all there, just with a fresh splash of color.', 'assets/img/product/10/1.jpg', 'array("assets/img/product/10/2.jpg", "assets/img/product/10/3.jpg", "assets/img/product/10/4.jpg", "assets/img/product/10/5.jpg", "assets/img/product/10/6.jpg");', '2020-11-04 20:01:53', NULL, NULL, 3),
	(15, 'Adidas Gazelle Star Wars The Mandalorian Darksaber', 122, 100, 'Dropping as part of ‘The Mandalorian’ collection, the Star Wars x adidas Gazelle ‘Darksaber’ takes inspiration from the black-bladed lightsaber wielded by the Imperial warlord known as Moff Gideon. The sneaker makes use of a black suede upper, accented with metallic silver detailing on the three-stripes and heel tab. Those components are embellished with an electric crackle print and a reflective coating for enhanced visibility in low-light conditions. A durable grey rubber cupsole anchors the low-top.', 'assets/img/product/1/1.jpg', 'array("assets/img/product/1/2.jpg", "assets/img/product/1/3.jpg", "assets/img/product/1/4.jpg", "assets/img/product/1/5.jpg", "assets/img/product/1/6.jpg", "assets/img/product/1/7.jpg");', '2020-11-04 00:00:00', NULL, NULL, 3),
	(16, 'Adidas Top Ten Hi Star Wars The Mandalorian The Child', 122, 90, 'Drawn from ‘The Mandalorian’ collection, the Star Wars x adidas Top Ten High ‘The Child’ gives the classic hoops shoe a design makeover that pays homage to the character commonly known as Baby Yoda. The foundling’s likeness is reproduced on the tongue tag, captioned with text that reads ‘The Force Is Strong With This Little One.’ The shoe itself features a brown and tan leather upper build, accented with Linen Green detailing on the textile collar and suede eyestay.', 'assets/img/product/3/1.jpg', 'array("assets/img/product/2/2.jpg", "assets/img/product/2/3.jpg", "assets/img/product/2/4.jpg", "assets/img/product/2/5.jpg", "assets/img/product/2/6.jpg");', '2020-11-04 00:00:00', NULL, NULL, 4),
	(17, 'Adidas Nizza Star Wars The Mandalorian Beskar Steel', 200, 70, 'Releasing as part of ‘The Mandalorian’ collection, the Star Wars x adidas women’s Nizza ‘Beskar Steel’ pays tribute to the Armorer, the mysterious character tasked with maintaining vital elements of the Mandalorian culture. This fashion-forward take on the vintage silhouette makes use of a brown leather upper inspired by the Armorer’s garb, mounted atop a platform midsole in contrasting white leather. The character’s helmeted likeness adorns a metallic gold tag atop the burgundy leather tongue.', 'assets/img/product/2/1.jpg', 'array("assets/img/product/2/2.jpg", "assets/img/product/2/3.jpg", "assets/img/product/2/4.jpg", "assets/img/product/2/5.jpg");', '2020-11-04 00:00:00', NULL, NULL, 3),
	(18, 'Jordan "Why Not?" Zer0.3', 130, 96.97, 'One of the game\'s fiercest competitors, triple-double dynamo Russell Westbrook has the motor, muscle and mentality to match his fearlessness—with the stats to back it up. The Jordan "Why Not?" Zer0.3 is tuned for Russ\' on-court chaos, featuring a midfoot strap to secure the fit and a large cushioning unit to help drive him hard and fast toward the basket.', 'assets/img/product/11/1.jpg', 'array("assets/img/product/11/2.jpg", "assets/img/product/11/3.jpg", "assets/img/product/11/4.jpg", "assets/img/product/11/5.jpg", "assets/img/product/11/6.jpg");', '2020-11-05 15:58:52', NULL, NULL, 3);
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
/*!40000 ALTER TABLE `product_detail` DISABLE KEYS */;
REPLACE INTO `product_detail` (`product_id`, `color_id`, `size_id`, `quantity`) VALUES
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
  `review` varchar(1000) DEFAULT NULL,
  `rate` tinyint(1) unsigned DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_review_product` (`product_id`),
  KEY `FK_review_user` (`user_id`),
  CONSTRAINT `FK_review_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_review_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table pro1014.review: ~2 rows (approximately)
/*!40000 ALTER TABLE `review` DISABLE KEYS */;
REPLACE INTO `review` (`id`, `product_id`, `user_id`, `review`, `rate`) VALUES
	(1, 1, 1, 'Nice shoes !!!', 5),
	(2, 1, 2, 'It Beauty !!!', 4);
/*!40000 ALTER TABLE `review` ENABLE KEYS */;

-- Dumping structure for table pro1014.size
CREATE TABLE IF NOT EXISTS `size` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `size` int(11) unsigned NOT NULL COMMENT 'Size giày',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

-- Dumping data for table pro1014.size: ~14 rows (approximately)
/*!40000 ALTER TABLE `size` DISABLE KEYS */;
REPLACE INTO `size` (`id`, `size`) VALUES
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
  `product_id` int(11) unsigned NOT NULL COMMENT 'Sản phẩm của slider',
  `img` text NOT NULL COMMENT 'Đường dẫn hình ảnh',
  `description` text COMMENT 'Mô tả slider',
  `title` text COMMENT 'Tiêu đề slider',
  `show` bit(1) DEFAULT NULL COMMENT '(0) Ẩn,(1) Hiện',
  `priority` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'Thứ tự slider',
  PRIMARY KEY (`id`),
  KEY `FK_slider_product` (`product_id`),
  CONSTRAINT `FK_slider_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table pro1014.slider: ~2 rows (approximately)
/*!40000 ALTER TABLE `slider` DISABLE KEYS */;
REPLACE INTO `slider` (`id`, `product_id`, `img`, `description`, `title`, `show`, `priority`) VALUES
	(1, 18, 'assets/img/product/11/slider.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et', 'Jordan <br> "Why Not?"', NULL, 0),
	(2, 18, 'assets/img/banner/banner-img.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et', 'Nike New <br>Collection!', NULL, 1);
/*!40000 ALTER TABLE `slider` ENABLE KEYS */;

-- Dumping structure for table pro1014.tag_blog
CREATE TABLE IF NOT EXISTS `tag_blog` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(50) NOT NULL DEFAULT '',
  `show` bit(1) DEFAULT NULL,
  `priority` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table pro1014.tag_blog: ~5 rows (approximately)
/*!40000 ALTER TABLE `tag_blog` DISABLE KEYS */;
REPLACE INTO `tag_blog` (`id`, `name`, `show`, `priority`) VALUES
	(1, 'Yeezy', NULL, NULL),
	(2, 'Air Max 98', NULL, NULL),
	(3, 'Air Jordan 11', NULL, NULL),
	(4, 'Air Max 270', NULL, NULL),
	(5, 'Kyrie 4', NULL, NULL);
/*!40000 ALTER TABLE `tag_blog` ENABLE KEYS */;

-- Dumping structure for table pro1014.tag_of_blog
CREATE TABLE IF NOT EXISTS `tag_of_blog` (
  `blog_id` int(11) unsigned NOT NULL,
  `tag_id` int(11) unsigned NOT NULL,
  KEY `FK_tag_of_blog_blog` (`blog_id`),
  KEY `FK_tag_of_blog_tag_blog` (`tag_id`),
  CONSTRAINT `FK_tag_of_blog_blog` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_tag_of_blog_tag_blog` FOREIGN KEY (`tag_id`) REFERENCES `tag_blog` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table pro1014.tag_of_blog: ~2 rows (approximately)
/*!40000 ALTER TABLE `tag_of_blog` DISABLE KEYS */;
REPLACE INTO `tag_of_blog` (`blog_id`, `tag_id`) VALUES
	(1, 1),
	(1, 3);
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
/*!40000 ALTER TABLE `tag_of_product` DISABLE KEYS */;
REPLACE INTO `tag_of_product` (`product_id`, `tag_id`) VALUES
	(1, 6),
	(2, 7),
	(3, 6);
/*!40000 ALTER TABLE `tag_of_product` ENABLE KEYS */;

-- Dumping structure for table pro1014.tag_product
CREATE TABLE IF NOT EXISTS `tag_product` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(50) NOT NULL DEFAULT '' COMMENT 'Tên danh mục',
  `show` bit(1) DEFAULT NULL,
  `priority` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Dumping data for table pro1014.tag_product: ~11 rows (approximately)
/*!40000 ALTER TABLE `tag_product` DISABLE KEYS */;
REPLACE INTO `tag_product` (`id`, `name`, `show`, `priority`) VALUES
	(1, 'Superstar Shoes', NULL, NULL),
	(2, 'NMD', NULL, NULL),
	(3, 'Athletic & Sneakers', NULL, NULL),
	(4, 'Ultraboost', NULL, NULL),
	(5, 'Stan Smith', NULL, NULL),
	(6, 'Men', NULL, NULL),
	(7, 'Women', NULL, NULL),
	(8, 'Child', NULL, NULL),
	(9, 'Infant', NULL, NULL),
	(10, 'Unisex', NULL, NULL),
	(11, 'Youth', NULL, NULL);
/*!40000 ALTER TABLE `tag_product` ENABLE KEYS */;

-- Dumping structure for table pro1014.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(255) NOT NULL DEFAULT '',
  `password` char(50) NOT NULL DEFAULT '',
  `email` char(255) NOT NULL,
  `phone` char(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `birthday` datetime DEFAULT NULL,
  `fullname` char(255) DEFAULT NULL,
  `avartar` char(255) DEFAULT NULL,
  `rank` tinyint(255) unsigned DEFAULT NULL,
  `address` char(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table pro1014.user: ~3 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
REPLACE INTO `user` (`id`, `username`, `password`, `email`, `phone`, `created`, `birthday`, `fullname`, `avartar`, `rank`, `address`) VALUES
	(1, 'huy', '123', 'huy@gmail.com', '09090909', '2020-10-10 05:37:57', '2001-04-21 18:38:23', 'Nguyễn Văn Huy', 'assets/images/user/1.jpg', 10, 'Quận 1, HCMC'),
	(2, 'dien', '123', 'dien@gmail.com', '08080808', '2020-10-11 01:37:58', '2001-05-05 18:38:24', 'Nguyễn Văn Điền', 'assets/images/user/2.jpg', 1, 'Quận 2, HCMC'),
	(3, 'dung', '123', 'dung@gmail.com', '07070707', '2020-10-10 08:37:59', '2001-07-15 18:38:25', 'Nguyễn Văn Dung', 'assets/images/user/4.jpg', 0, 'Quận 3, HCMC');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
