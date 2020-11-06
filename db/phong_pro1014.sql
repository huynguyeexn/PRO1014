-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 05, 2020 at 03:32 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pro1014`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` int(11) NOT NULL,
  `password` int(11) NOT NULL,
  `rank` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(256) NOT NULL,
  `view` int(100) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `id_catalog` int(11) DEFAULT NULL,
  `more_content` text CHARACTER SET utf8mb4 NOT NULL,
  `more_img` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `user_id`, `title`, `content`, `image`, `view`, `created`, `id_catalog`, `more_content`, `more_img`) VALUES
(1, 1, 'adidas Ultra BOOST 2021 sẽ có bộ đệm dày nhất từ trước tới nay', 'Bộ đệm BOOST của adidas vẫn luôn được người dùng phổ thông ca ngợi về độ êm ái và thoải mái khi mang cả ngày, tuy vậy ở đấu trường thể thao chuyên nghiệp trong vài năm trở lại đây, adidas Ultra BOOST đang tỏ ra lép vế khi so với các “siêu chiến binh” bên kia chiến tuyến – những Nike Vaporfly 4%, Vaporfly NEXT% hay Alphafly NEXT% lần lượt xuất hiện trên chân của những VĐV đứng ở bục podium, hay đơn giản là những người chạy bộ giải trí.', '1.jpg', 323, '2020-11-02 00:00:00', 3, '<p>\r\nBộ đệm BOOST của adidas vẫn luôn được người dùng phổ thông ca ngợi về độ êm ái và thoải mái khi mang cả ngày, tuy vậy ở đấu trường thể thao chuyên nghiệp trong vài năm trở lại đây, adidas Ultra BOOST đang tỏ ra lép vế khi so với các “siêu chiến binh” bên kia chiến tuyến – những Nike Vaporfly 4%, Vaporfly NEXT% hay Alphafly NEXT% lần lượt xuất hiện trên chân của những VĐV đứng ở bục podium, hay đơn giản là những người chạy bộ giải trí.\r\n</p>\r\n\r\n<p>\r\nUltra BOOST giờ đang được adidas chia làm hai dòng sản phẩm, một dòng Ultra BOOST DNA dùng để tái bản những mẫu thiết kế cũ từ adidas 1.0 tới 4.0, dòng còn lại là Ultra BOOST đánh số theo năm dành cho những cải tiến mới nhất. Và Ultra BOOST 2021 không làm phụ lòng mong đợi của người hâm mộ, khi sở hữu diện mạo hoàn toàn mới so với bộ đôi 2019 – 2020 vốn không nhận được quá nhiều sự quan tâm.\r\n</p>\r\n\r\n\r\n<p>\r\nSau vài phối màu hé lộ vào khoảng tháng 8/2020, phối màu tiếp theo của Ultra BOOST 2021 được leak ra là “Solar Red”, gợi nhắc về phối màu cùng tên cực kì thành công của Ultra BOOST 1.0. Điểm gây ấn tượng đầu tiên là bộ đế BOOST, bằng mắt thường có thể thấy bộ đệm này dày hơn đáng kể so với thế hệ trước. Và không rõ vì lý do gì, hạt BOOST trên thiết kế này có vẻ không được nén chặt đến biến dạng như những người tiền nhiệm, mang đến ngoại hình hơi kém thẩm mỹ, còn việc ảnh hưởng tích cực hay tiêu cực tới hiệu năng của giày thì phải đợi tới khi thiết kế này ra mắt mới có thể biết được.\r\n</p>\r\n<p>\r\nUpper dệt từ chất liệu Primeknit cũng có sự khác lạ, có vẻ dệt dày mắt hơn khi nhìn như một mảnh vải thun. Phần toe box được dệt thưa hơn một chút, góp phần vào độ thoáng khí cho thiết kế này. Tương tự như những bản Ultra BOOST trước, phần nhựa bảo vệ gót chân và phần lỗ xỏ dây dạng khung kiêm nhiệm bảo vệ cạnh bàn chân cũng được giữ lại, với một chút tinh chỉnh nhẹ\r\n</p>', 'post3.jpg,post4.jpg'),
(2, 2, 'BST Nike “Every Stitch Considered” – khi khoa học và giải phẫu học được ứng dụng vào thời trang', 'Là một trong những gã khổng lồ của ngành công nghiệp thời trang thể thao, Nike dường như đã có đủ những gì người dùng cần khi tìm đến những phụ kiện và quần áo để luyện tập. Tuy vậy, với hàng chục năm nghiên cứu khoa học thể chất và dữ liệu từ vận động viên, Nike luôn ấp ủ một điều gì đó lớn lao hơn.', '2.jpg', 500, '2020-11-01 00:00:00', 2, '<p>Là một trong những gã khổng lồ của ngành công nghiệp thời trang thể thao, Nike dường như đã có đủ những gì người dùng cần khi tìm đến những phụ kiện và quần áo để luyện tập. Tuy vậy, với hàng chục năm nghiên cứu khoa học thể chất và dữ liệu từ vận động viên, Nike luôn ấp ủ một điều gì đó lớn lao hơn.</p>\r\n<p>Cùng chung “hộ khẩu” với những mẫu giày ISPA độc đáo của Nike, Nike “Every Stitch Considered” – “Cân nhắc từng đường chỉ một” – cũng là một phân nhánh nằm dưới sự sáng tạo và chỉ đạo của Nike Design Exploration, một văn phòng của Nike nơi tất cả mọi ý tưởng điên rồ đều được Nike thỏa mãn.</p>\r\n<p>Tụ hội dữ liệu vận động viên và những thiết kế kỹ thuật số, với sự hiểu biết sâu rộng về chuyển động cơ thể kết hợp cùng sự lão luyện trong sản xuất đồ thể thao, Nike “Every Stitch Considered” mang đến những sản phẩm đậm tính thể nghiệm, hầu hết là những thiết kế phi giới tính phù hợp với đa số mọi người. Những mẫu áo khoác bao gồm parka, field jacket và cardigan được bổ trợ bên trong bằng các mẫu tank top, polo dây kéo và áo tay dài. Ở phía dưới, những mẫu quần short baggy, quần đáy rộng và trouser dài ngang mắt cá mang đến vẻ ngoài thể thao cho outfit. Những chi tiết thường thấy ở những mẫu quần áo techwear như dây strap để đeo ngoài cho áo jacket hay công nghệ chống chịu thời tiết cũng xuất hiện trong BST.</p>\r\n\r\n', 'post1.jpg,post2.jpg'),
(3, 3, 'Online Sneaker Store chính thức sở hữu Sole Station', 'Cách đây 4 năm, HNBMG đã có một bài viết bình chọn top 9 cửa hàng sneaker uy tín nhất tại TP.HCM. Bài viết đến từ chính kinh nghiệm “xương máu” của những thành viên trong team HNBMG, những người cũng như các bạn – cũng đắn đo, cũng chắt chiu, cũng săn “deal”, cũng lo giày giả/lừa đảo mỗi khi mua giày. Thấu hiểu những điều đó, bài viết là sự cân nhắc và đánh giá kỹ lưỡng, không chỉ đến từ trải nghiệm cá nhân mà còn của cộng động; để có thể thật sự mang đúng nghĩa “chỗ dựa tinh thần” cho những ai lần đầu “nhúng chàm” bộ môn sneaker.', '3.jpg', 1000, '2020-11-01 00:00:00', 1, '<p>\r\nCách đây 4 năm, HNBMG đã có một bài viết bình chọn top 9 cửa hàng sneaker uy tín nhất tại TP.HCM. Bài viết đến từ chính kinh nghiệm “xương máu” của những thành viên trong team HNBMG, những người cũng như các bạn – cũng đắn đo, cũng chắt chiu, cũng săn “deal”, cũng lo giày giả/lừa đảo mỗi khi mua giày. Thấu hiểu những điều đó, bài viết là sự cân nhắc và đánh giá kỹ lưỡng, không chỉ đến từ trải nghiệm cá nhân mà còn của cộng động; để có thể thật sự mang đúng nghĩa “chỗ dựa tinh thần” cho những ai lần đầu “nhúng chàm” bộ môn sneaker.\r\n</p>\r\n\r\n<p>\r\n2 trong số 9 cái tên xuất hiện trong danh sách đó là Online Sneaker Store và Sole Station. Cả 2 đều đã xuất hiện ngay từ những ngày “bùng cháy” đầu tiên của cộng đồng sneaker Việt Nam; đã đồng hành cùng HNBMG trong nhiều sự kiện cả lớn lẫn nhỏ liên quan đến sneaker và văn hoá đường phố.\r\n</p>\r\n\r\n<p>\r\nMột tin bất ngờ đến với HNBMG vào vài ngày trước, như trên title các bạn cũng đã thấy – Online Sneaker Store đã chính thức sở hữu Sole Station kể từ hôm nay!\r\n\r\nMỗi bên một thế mạnh. Online Sneaker Store bên cạnh giày – vốn đã rất đa dạng từ giày performance chuyên thể thao đến các mẫu giày hiếm – còn có cả quần áo, phụ kiện và rất nhiều BAPE. Còn Sole Station – như cái tên “trạm giày” đã thể hiện – một nơi dành cho tất cả những ai có nhu cầu mua giày: Dù đơn giản là một đôi giày thật êm để mang hàng ngày, một đôi giày thật thời trang để phối outfit, hay đến cả những đôi giày đắt giá và hiếm có.\r\n</p', 'post5.jpg,post6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `blog_catalog`
--

CREATE TABLE `blog_catalog` (
  `id_catalog` int(11) NOT NULL,
  `catalog` varchar(256) NOT NULL,
  `number_post` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog_catalog`
--

INSERT INTO `blog_catalog` (`id_catalog`, `catalog`, `number_post`) VALUES
(1, 'Sneaker', 39),
(2, 'Lifestyle', 13),
(3, 'Fashion', 24),
(4, 'Event', 7),
(5, 'Art', 15);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` tinytext NOT NULL,
  `update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`, `update`) VALUES
(1, 'Nike', '2020-11-04 18:16:39'),
(2, 'Jordan', '2020-11-04 18:16:39'),
(3, 'Adidas', '2020-11-04 18:16:39'),
(4, 'Converse', '2020-11-04 18:16:39'),
(5, 'Puma', '2020-11-04 18:16:39'),
(6, 'Vans', '2020-11-04 18:16:39'),
(7, 'Reebok', '2020-11-04 18:16:39'),
(8, 'New Balance', '2020-11-04 18:16:39');

-- --------------------------------------------------------

--
-- Table structure for table `brand_of_product`
--

CREATE TABLE `brand_of_product` (
  `brand_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `name` tinytext COMMENT 'Tên màu',
  `colorCode` tinytext COMMENT 'Mã HEX color'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `color`
--

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

-- --------------------------------------------------------

--
-- Table structure for table `color_of_product`
--

CREATE TABLE `color_of_product` (
  `productID` int(11) NOT NULL COMMENT 'Mã sản phẩm',
  `colorID` int(11) NOT NULL COMMENT 'Mã màu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `color_of_product`
--

INSERT INTO `color_of_product` (`productID`, `colorID`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 4),
(2, 5),
(2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `productID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT 'Huỷ(0), mới(1), đang giao(2), đã hoàn thành (3),',
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL COMMENT 'Giá sản phẩm lúc đặt hàng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL COMMENT 'Mã sản phẩm',
  `name` text COMMENT 'Tên sản phẩm',
  `price` float DEFAULT NULL COMMENT 'Giá bán ra, đã giảm giá',
  `description` text COMMENT 'Mô tả sản phẩm',
  `thumb` text COMMENT 'Ảnh bìa sản phẩm, không nền, .PNG, ít nhất 2 hình',
  `images` text COMMENT 'Hình ảnh thực tế của sản phẩm',
  `update` datetime DEFAULT NULL COMMENT 'Thời gian update mới nhất',
  `cost` float DEFAULT NULL COMMENT 'Giá gốc chưa giảm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `description`, `thumb`, `images`, `update`, `cost`) VALUES
(1, 'Adidas Gazelle Star Wars The Mandalorian Darksaber', 100, 'Dropping as part of ‘The Mandalorian’ collection, the Star Wars x adidas Gazelle ‘Darksaber’ takes inspiration from the black-bladed lightsaber wielded by the Imperial warlord known as Moff Gideon. The sneaker makes use of a black suede upper, accented with metallic silver detailing on the three-stripes and heel tab. Those components are embellished with an electric crackle print and a reflective coating for enhanced visibility in low-light conditions. A durable grey rubber cupsole anchors the low-top.', 'assets/img/product/1/1.jpg', 'array(\"assets/img/product/1/2.jpg\", \"assets/img/product/1/3.jpg\", \"assets/img/product/1/4.jpg\", \"assets/img/product/1/5.jpg\", \"assets/img/product/1/6.jpg\", \"assets/img/product/1/7.jpg\"); ', '2020-11-04 00:00:00', 122),
(2, 'Adidas Nizza Star Wars The Mandalorian Beskar Steel', 70, 'Releasing as part of ‘The Mandalorian’ collection, the Star Wars x adidas women’s Nizza ‘Beskar Steel’ pays tribute to the Armorer, the mysterious character tasked with maintaining vital elements of the Mandalorian culture. This fashion-forward take on the vintage silhouette makes use of a brown leather upper inspired by the Armorer’s garb, mounted atop a platform midsole in contrasting white leather. The character’s helmeted likeness adorns a metallic gold tag atop the burgundy leather tongue.', 'assets/img/product/2/1.jpg', 'array(\"assets/img/product/2/2.jpg\", \"assets/img/product/2/3.jpg\", \"assets/img/product/2/4.jpg\", \"assets/img/product/2/5.jpg\"); ', '2020-11-04 00:00:00', 200),
(3, 'Adidas Top Ten Hi Star Wars The Mandalorian The Child', 90, 'Drawn from ‘The Mandalorian’ collection, the Star Wars x adidas Top Ten High ‘The Child’ gives the classic hoops shoe a design makeover that pays homage to the character commonly known as Baby Yoda. The foundling’s likeness is reproduced on the tongue tag, captioned with text that reads ‘The Force Is Strong With This Little One.’ The shoe itself features a brown and tan leather upper build, accented with Linen Green detailing on the textile collar and suede eyestay.', 'assets/img/product/3/1.jpg', 'array(\"assets/img/product/2/2.jpg\", \"assets/img/product/2/3.jpg\", \"assets/img/product/2/4.jpg\", \"assets/img/product/2/5.jpg\", \"assets/img/product/2/6.jpg\"); ', '2020-11-04 00:00:00', 122),
(4, 'Adidas Superstar Star Wars The Mandalorian The Child', 90, 'Launching as part of ‘The Mandalorian’ collection, the Star Wars x adidas Superstar ‘The Child’ draws inspiration from the character colloquially known as Baby Yoda. Linen Green coloring is executed on the sneaker’s leather upper, accented with contrasting black three-stripes and a ‘The Child’ graphic on the lateral heel. Atop the tongue, printed text in Star Wars’ Aurebesh alphabet denotes the 50th anniversary of the Superstar silhouette.', 'assets/img/product/4/1.jpg', 'array(\"assets/img/product/4/2.jpg\", \"assets/img/product/4/3.jpg\", \"assets/img/product/4/4.jpg\", \"assets/img/product/4/5.jpg\", \"assets/img/product/4/6.jpg\"); ', '2020-11-04 00:00:00', 150),
(5, 'Adidas Gazelle Star Wars The Mandalorian Darksaber', 100, 'Dropping as part of ‘The Mandalorian’ collection, the Star Wars x adidas Gazelle ‘Darksaber’ takes inspiration from the black-bladed lightsaber wielded by the Imperial warlord known as Moff Gideon. The sneaker makes use of a black suede upper, accented with metallic silver detailing on the three-stripes and heel tab. Those components are embellished with an electric crackle print and a reflective coating for enhanced visibility in low-light conditions. A durable grey rubber cupsole anchors the low-top.', 'assets/img/product/1/1.jpg', 'array(\"assets/img/product/1/2.jpg\", \"assets/img/product/1/3.jpg\", \"assets/img/product/1/4.jpg\", \"assets/img/product/1/5.jpg\", \"assets/img/product/1/6.jpg\", \"assets/img/product/1/7.jpg\"); ', '2020-11-04 00:00:00', 122),
(6, 'Adidas Nizza Star Wars The Mandalorian Beskar Steel', 70, 'Releasing as part of ‘The Mandalorian’ collection, the Star Wars x adidas women’s Nizza ‘Beskar Steel’ pays tribute to the Armorer, the mysterious character tasked with maintaining vital elements of the Mandalorian culture. This fashion-forward take on the vintage silhouette makes use of a brown leather upper inspired by the Armorer’s garb, mounted atop a platform midsole in contrasting white leather. The character’s helmeted likeness adorns a metallic gold tag atop the burgundy leather tongue.', 'assets/img/product/2/1.jpg', 'array(\"assets/img/product/2/2.jpg\", \"assets/img/product/2/3.jpg\", \"assets/img/product/2/4.jpg\", \"assets/img/product/2/5.jpg\"); ', '2020-11-04 00:00:00', 200),
(7, 'Adidas Top Ten Hi Star Wars The Mandalorian The Child', 90, 'Drawn from ‘The Mandalorian’ collection, the Star Wars x adidas Top Ten High ‘The Child’ gives the classic hoops shoe a design makeover that pays homage to the character commonly known as Baby Yoda. The foundling’s likeness is reproduced on the tongue tag, captioned with text that reads ‘The Force Is Strong With This Little One.’ The shoe itself features a brown and tan leather upper build, accented with Linen Green detailing on the textile collar and suede eyestay.', 'assets/img/product/3/1.jpg', 'array(\"assets/img/product/2/2.jpg\", \"assets/img/product/2/3.jpg\", \"assets/img/product/2/4.jpg\", \"assets/img/product/2/5.jpg\", \"assets/img/product/2/6.jpg\"); ', '2020-11-04 00:00:00', 122),
(8, 'Adidas Superstar Star Wars The Mandalorian The Child', 90, 'Launching as part of ‘The Mandalorian’ collection, the Star Wars x adidas Superstar ‘The Child’ draws inspiration from the character colloquially known as Baby Yoda. Linen Green coloring is executed on the sneaker’s leather upper, accented with contrasting black three-stripes and a ‘The Child’ graphic on the lateral heel. Atop the tongue, printed text in Star Wars’ Aurebesh alphabet denotes the 50th anniversary of the Superstar silhouette.', 'assets/img/product/4/1.jpg', 'array(\"assets/img/product/4/2.jpg\", \"assets/img/product/4/3.jpg\", \"assets/img/product/4/4.jpg\", \"assets/img/product/4/5.jpg\", \"assets/img/product/4/6.jpg\"); ', '2020-11-04 00:00:00', 150),
(9, 'Ultraboost OG Shoes', 200, 'Built for impact. These adidas x IVY PARK Ultraboost Shoes take a celebrated adidas style and injects it with utilitarian swag and a touch of attitude. Energy-returning cushioning creates a sense of fluid motion for a smooth ride. A hook on the heel clips to your gym bag, showing off the bold style even when they\'re not on.', 'assets/img/product/9/1.jpg', 'array(\"assets/img/product/9/2.jpg\", \"assets/img/product/9/3.jpg\", \"assets/img/product/9/4.jpg\", \"assets/img/product/9/5.jpg\", \"assets/img/product/9/6.jpg\"); ', '2020-11-04 20:00:52', 250),
(10, 'Forum Low Shoes', 130, 'If we\'re talking legends, you know the adidas Forum is driving the conversation. The basketball game changer dominated the court in the \'80s, and brings that energy to today\'s moves. These adidas x IVY PARK sneakers capture the distinct elements that left their mark back in the day. Ankle straps. X details. A layered upper. They\'re all there, just with a fresh splash of color.', 'assets/img/product/10/1.jpg', 'array(\"assets/img/product/10/2.jpg\", \"assets/img/product/10/3.jpg\", \"assets/img/product/10/4.jpg\", \"assets/img/product/10/5.jpg\", \"assets/img/product/10/6.jpg\"); ', '2020-11-04 20:01:53', 150);

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `id` int(11) NOT NULL,
  `size` int(11) NOT NULL COMMENT 'Size giày'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `size`
--

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

-- --------------------------------------------------------

--
-- Table structure for table `size_of_product`
--

CREATE TABLE `size_of_product` (
  `productID` int(11) NOT NULL,
  `sizeID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `size_of_product`
--

INSERT INTO `size_of_product` (`productID`, `sizeID`, `quantity`) VALUES
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

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `name` tinytext NOT NULL COMMENT 'Tên danh mục'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id`, `name`) VALUES
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

-- --------------------------------------------------------

--
-- Table structure for table `tag_of_product`
--

CREATE TABLE `tag_of_product` (
  `product_id` int(11) DEFAULT NULL,
  `tag_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tag_of_product`
--

INSERT INTO `tag_of_product` (`product_id`, `tag_id`) VALUES
(1, 6),
(2, 7),
(3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` tinytext NOT NULL,
  `password` tinytext NOT NULL,
  `email` tinytext,
  `phone` tinytext,
  `created` tinytext,
  `birthday` datetime DEFAULT NULL,
  `fullname` tinytext,
  `avartar` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `phone`, `created`, `birthday`, `fullname`, `avartar`) VALUES
(1, 'huy', '123', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'dien', '123', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'dung', '123', NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_blog_user` (`user_id`),
  ADD KEY `FK_blog_catalog` (`id_catalog`);

--
-- Indexes for table `blog_catalog`
--
ALTER TABLE `blog_catalog`
  ADD PRIMARY KEY (`id_catalog`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand_of_product`
--
ALTER TABLE `brand_of_product`
  ADD KEY `FK_brand_of_product_brand` (`brand_id`),
  ADD KEY `FK_brand_of_product_product` (`product_id`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `color_of_product`
--
ALTER TABLE `color_of_product`
  ADD KEY `FK__color` (`colorID`),
  ADD KEY `FK__product` (`productID`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD KEY `FK_comment_product` (`productID`),
  ADD KEY `FK_comment_user` (`userID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD KEY `FK_order_detail_product` (`order_id`),
  ADD KEY `FK_order_detail_product_2` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `size_of_product`
--
ALTER TABLE `size_of_product`
  ADD KEY `FK__size` (`sizeID`),
  ADD KEY `FK_size_of_product_product` (`productID`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag_of_product`
--
ALTER TABLE `tag_of_product`
  ADD KEY `FK_tag_of_product_product` (`product_id`),
  ADD KEY `FK_tag_of_product_tag` (`tag_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã sản phẩm', AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `FK_blog_catalog` FOREIGN KEY (`id_catalog`) REFERENCES `blog_catalog` (`id_catalog`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_blog_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `brand_of_product`
--
ALTER TABLE `brand_of_product`
  ADD CONSTRAINT `FK_brand_of_product_brand` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_brand_of_product_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `color_of_product`
--
ALTER TABLE `color_of_product`
  ADD CONSTRAINT `FK__color` FOREIGN KEY (`colorID`) REFERENCES `color` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK__product` FOREIGN KEY (`productID`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_comment_product` FOREIGN KEY (`productID`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_comment_user` FOREIGN KEY (`userID`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `FK_order_detail_product` FOREIGN KEY (`order_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_order_detail_product_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `size_of_product`
--
ALTER TABLE `size_of_product`
  ADD CONSTRAINT `FK__size` FOREIGN KEY (`sizeID`) REFERENCES `size` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_size_of_product_product` FOREIGN KEY (`productID`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tag_of_product`
--
ALTER TABLE `tag_of_product`
  ADD CONSTRAINT `FK_tag_of_product_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tag_of_product_tag` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
