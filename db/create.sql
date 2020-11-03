CREATE DATABASE IF NOT EXISTS `PRO1014` COLLATE 'utf8_general_ci';


CREATE TABLE IF NOT EXISTS `product` (
	`id` INT NOT NULL AUTO_INCREMENT COMMENT 'Mã sản phẩm',
	`name` TINYTEXT NULL DEFAULT NULL COMMENT 'Tên sản phẩm',
	`price` FLOAT NULL DEFAULT NULL COMMENT 'Giá bán ra, đã giảm giá',
	`description` TEXT NULL DEFAULT NULL COMMENT 'Mô tả sản phẩm',
	`thumb` TEXT NULL DEFAULT NULL COMMENT 'Ảnh bìa sản phẩm, không nền, .PNG, ít nhất 2 hình',
	`images` TEXT NULL DEFAULT NULL COMMENT 'Hình ảnh thực tế của sản phẩm',
	`update` DATETIME NULL DEFAULT NULL COMMENT 'Thời gian update mới nhất',
	`cost` FLOAT NULL DEFAULT NULL COMMENT 'Giá gốc chưa giảm',
	`create_date` DATETIME NOT NULL COMMENT 'Thời gian tạo',
	`update_date` DATETIME NOT NULL COMMENT 'Thời gian update',
	`hide` bit DEFAULT 1 COMMENT 'ẩn(0), hiện(1)',
	`order` bit DEFAULT 1 COMMENT 'Thứ tự hiển thị',
	PRIMARY KEY (`id`)
)
COLLATE 'utf8_general_ci';

CREATE TABLE IF NOT EXISTS `color` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`color_code` TINYTEXT NULL DEFAULT NULL COMMENT 'Mã HEX color',
	`name` TINYTEXT NULL DEFAULT NULL  COMMENT 'Tên màu',
	`create_date` DATETIME NOT NULL COMMENT 'Thời gian tạo',
	`update_date` DATETIME NOT NULL COMMENT 'Thời gian update',
	PRIMARY KEY (`id`)
)
COLLATE='utf8_general_ci';

CREATE TABLE IF NOT EXISTS `size` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`size` INT NOT NULL COMMENT 'Size giày',
	PRIMARY KEY (`id`)
)
COLLATE='utf8_general_ci';

CREATE TABLE IF NOT EXISTS `category` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` INT NOT NULL COMMENT 'Tên danh mục',
	`create_date` DATETIME NOT NULL COMMENT 'Thời gian tạo danh mục',
	`update_date` DATETIME NOT NULL COMMENT 'Thời gian update danh mục',
	`hide` bit DEFAULT 1 COMMENT 'ẩn(0), hiện(1)',
	`order` bit DEFAULT 1 COMMENT 'Thứ tự hiển thị',
	PRIMARY KEY (`id`)
)
COLLATE='utf8_general_ci';

CREATE TABLE IF NOT EXISTS `admin` (
	`id` INT NOT NULL,
	`username` INT NOT NULL,
	`password` INT NOT NULL,
	`rank` INT DEFAULT 0,
	PRIMARY KEY (`id`)
)
COLLATE='utf8_general_ci';


CREATE TABLE IF NOT EXISTS `user` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`username` TINYTEXT NOT NULL,
	`password` TINYTEXT NOT NULL,
	`email` TINYTEXT NULL DEFAULT NULL,
	`phone` TINYTEXT NULL DEFAULT NULL,
	`created` TINYTEXT NULL DEFAULT NULL COMMENT 'Ngày tạo tài khoảng',
	`birthday` DATETIME NULL DEFAULT NULL,
	`fullname` TINYTEXT NULL DEFAULT NULL,
	`avartar` TEXT NULL DEFAULT NULL 'Đường dẫn đến file avartar',
	PRIMARY KEY (`id`)
)
COLLATE='utf8_general_ci';

CREATE TABLE IF NOT EXISTS `order` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`user_id` INT NULL,
	`status` INT NULL COMMENT 'Huỷ(0), mới(1), đang giao(2), đã hoàn thành (3),',
	`created` DATETIME NULL,
	PRIMARY KEY (`id`)
)
COLLATE='utf8_general_ci';

CREATE TABLE IF NOT EXISTS `order_detail` (
	`order_id` INT NULL,
	`product_id` INT NULL,
	`quantity` INT NULL,
	`price` FLOAT NULL DEFAULT NULL COMMENT 'Giá sản phẩm lúc đặt hàng'
)
COLLATE='utf8_general_ci';
ALTER TABLE `order_detail`
	ADD CONSTRAINT `FK_order_detail_product` FOREIGN KEY (`order_id`) REFERENCES `product` (`id`) ON UPDATE CASCADE ON DELETE CASCADE,
	ADD CONSTRAINT `FK_order_detail_product_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON UPDATE CASCADE ON DELETE CASCADE;

CREATE TABLE IF NOT EXISTS `comment` (
	`product_id` INT NOT NULL,
	`user_id` INT NOT NULL,
	`content` TEXT NOT NULLpro1014
)
COLLATE='utf8_general_ci';
ALTER TABLE `comment`
	ADD CONSTRAINT `FK_comment_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON UPDATE CASCADE ON DELETE CASCADE,
	ADD CONSTRAINT `FK_comment_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON UPDATE CASCADE ON DELETE CASCADE;

CREATE TABLE IF NOT EXISTS `size_of_product` (
	`size_id` INT NOT NULL COMMENT 'Mã size của giày',
	`product_id` INT NOT NULL COMMENT 'Mã giày',
	`quantity` INT NOT NULL COMMENT 'Số lượng giày còn size này'
)
COLLATE='utf8_general_ci';
ALTER TABLE `size_of_product`
	ADD CONSTRAINT `FK_size_of_product_size` FOREIGN KEY (`size_id`) REFERENCES `size` (`id`) ON UPDATE CASCADE ON DELETE CASCADE,
	ADD CONSTRAINT `FK_size_of_product_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON UPDATE CASCADE ON DELETE CASCADE
	
CREATE TABLE IF NOT EXISTS `color_of_product` (
	`color_id` INT NOT NULL COMMENT 'Mã màu',
	`product_id` INT NOT NULL COMMENT 'Mã sản phẩm'
)
COLLATE='utf8_general_ci';
ALTER TABLE `color_of_product`
	ADD CONSTRAINT `FK_color_of_product_color` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`) ON UPDATE CASCADE ON DELETE CASCADE,
	ADD CONSTRAINT `FK_color_of_product_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON UPDATE CASCADE ON DELETE CASCADE


