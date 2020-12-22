-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 17, 2020 at 08:08 PM
-- Server version: 5.7.30
-- PHP Version: 7.3.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sanghuynh_hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumb` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publish_at` date DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `tags_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `category_id`, `name`, `content`, `status`, `thumb`, `created`, `created_by`, `modified`, `modified_by`, `publish_at`, `type`, `meta_keyword`, `meta_description`, `tags_id`) VALUES
(27, 3, 'Bãi tắm Hoàng Hậu', '<p>Sở dĩ n&oacute; c&oacute; c&aacute;i t&ecirc;n b&atilde;i tắm Ho&agrave;ng Hậu l&agrave; v&igrave; đ&acirc;y đ&atilde; từng l&agrave; nơi nghỉ dưỡng ri&ecirc;ng của vua Bảo Đại v&agrave; vị ho&agrave;ng hậu Nam Phương. Ho&agrave;ng hậu đ&atilde; bị vẻ đẹp của cảnh vật, thi&ecirc;n nhi&ecirc;n ở đ&acirc;y hấp dẫn n&ecirc;n đ&atilde; chọn nơi n&agrave;y để dừng ch&acirc;n, nghỉ dưỡng. C&aacute;c kh&aacute;ch sạn ở b&atilde;i tắm Ho&agrave;ng Hậu l&agrave; một lựa chọn tuyệt vời để bạn c&oacute; thể đến đ&acirc;y nghỉ dưỡng v&agrave; gần với biển trời B&igrave;nh Định rồi c&ograve;n g&igrave;!</p>', 'active', 'VcPe76RDhT.jpeg', '2020-12-08 00:00:00', 'admin123', NULL, NULL, NULL, NULL, 'Bãi tắm Hoàng Hậu', 'Không gian hoang sơ ở bãi tắm Hoàng Hậu', '[13]'),
(28, 3, 'Tháp Dương Long', '<p>Đ&acirc;y l&agrave; một trong những di t&iacute;ch th&aacute;p Chăm cổ c&ograve;n s&oacute;t lại ở B&igrave;nh Định. Nơi n&agrave;y gồm c&oacute; 3 t&ograve;a th&aacute;p được x&acirc;y dựng cạnh nhau tạo th&agrave;nh một khối kiến tr&uacute;c mang nhiều tầng &nbsp;&yacute; nghĩa. Cũng giống như c&aacute;c th&aacute;p Chăm kh&aacute;c, 3 ngọn th&aacute;p n&agrave;y cũng sở hữu những n&eacute;t tinh xảo trong nghệ thuật đi&ecirc;u khắc, tạo h&igrave;nh của người Chăm. Tuy nhi&ecirc;n nhiều nh&agrave; nghi&ecirc;n cứu cho rằng n&oacute; đ&atilde; mang một ch&uacute;t g&igrave; đ&oacute; theo hơi hướng của người Kh&rsquo;mer.</p>', 'active', 'DOVBbB1UvL.jpeg', '2020-12-08 00:00:00', 'admin123', NULL, NULL, NULL, NULL, 'Tháp Dương Long', 'Đây là một trong những di tích tháp Chăm cổ còn sót lại ở Bình Định.', '[14]'),
(29, 3, 'Ghềnh Ráng Tiên Sa', '<p>Một c&aacute;i t&ecirc;n đẹp mỹ miều Ghềnh R&aacute;ng l&agrave; một trong những b&atilde;i đ&aacute; nối tiếp nhau uốn lượn theo đường cong của eo n&uacute;i Xu&acirc;n V&acirc;n. Một điểm đến check in kh&ocirc;ng thể bỏ qua d&agrave;nh cho c&aacute;c bạn trẻ Ghềnh R&aacute;ng Ti&ecirc;n Sa c&aacute;ch trung t&acirc;m th&agrave;nh phố 3km về ph&iacute;a Đ&ocirc;ng Nam thuộc phường Ghềnh R&aacute;ng, th&agrave;nh phố Quy Nhơn. Đến đ&acirc;y, bạn n&ecirc;n thu&ecirc; cho m&igrave;nh một kh&aacute;ch sạn tại Ghềnh R&aacute;ng, để c&oacute; thể chi&ecirc;m ngưỡng được chọn vẹn cảnh sắc nơi n&agrave;y.<br />\r\nKhung cảnh thi&ecirc;n nhi&ecirc;n nơi đ&acirc;y thơ mộng, đẹp huyền ảo, huyễn hoặc l&ograve;ng người khiến những ai đ&atilde; từng đặt ch&acirc;n đến đều c&oacute; ấn tượng kh&oacute; phai.</p>\r\n\r\n<p>Đặc biệt đến đ&acirc;y du kh&aacute;ch được đến thăm nơi y&ecirc;n nghỉ của nh&agrave; thơ t&agrave;i hoa nhưng bạc mệnh H&agrave;n Mặc Tử mắc căn bệnh phong qu&aacute;i &aacute;c. Những vẫn thơ y&ecirc;u đương đến ch&aacute;y bỏng, kh&aacute;t khao y&ecirc;u v&agrave; được y&ecirc;u, c&ugrave;ng với phong cảnh thi&ecirc;n nhi&ecirc;n hữu t&igrave;nh đ&atilde; l&agrave;m n&ecirc;n những &aacute;ng văn thơ bất hủ.</p>', 'active', 'uPXKOM5hIR.jpeg', '2020-12-08 00:00:00', 'admin123', NULL, NULL, NULL, NULL, 'Ghềnh Ráng Tiên Sa', 'Một cái tên đẹp mỹ miều Ghềnh Ráng là một trong những bãi đá nối tiếp nhau uốn lượn theo đường cong của eo núi Xuân Vân.', '[15]'),
(30, 3, 'Tháp Bánh Ít', '<p>Địa điểm du lịch B&igrave;nh Định n&agrave;y c&oacute; kiến tr&uacute;c của th&aacute;p c&oacute; phần đặc biệt v&agrave; lạ mắt từ xa nh&igrave;n về hướng quần thể 4 ngọn th&aacute;p giống chiếc b&aacute;nh &iacute;t n&ecirc;n th&aacute;p c&ograve;n c&oacute; t&ecirc;n gọi Th&aacute;p B&aacute;nh &Iacute;t. Th&aacute;p thuộc x&atilde; Phước Hiệp, Tuy Phước, B&igrave;nh Định.<br />\r\n4 ngọn th&aacute;p c&oacute; sự gắn kết mật thiết với nhau, ngọn th&aacute;p ch&iacute;nh cao 22m v&agrave; bao quanh l&agrave; c&aacute;c ngọn th&aacute;p phụ nhỏ hơn v&agrave; c&oacute; kiến tr&uacute;c t&aacute;ch biệt kh&ocirc;ng giống nhau, mang gi&aacute; trị nghệ thuật cao.</p>', 'active', 'Pxt03JO2nV.jpeg', '2020-12-08 00:00:00', 'admin123', NULL, NULL, NULL, NULL, 'Tháp Bánh Ít', 'Tháp thuộc xã Phước Hiệp, Tuy Phước, Bình Định.', '[16]'),
(31, 3, 'Bảo tàng vua Quang Trung', '<p>B&igrave;nh Định vốn l&agrave; v&ugrave;ng đất gắn liền với t&ecirc;n tuổi của vị vua Quang Trung ng&agrave;y n&agrave;o. Bởi vậy, khi tới đ&acirc;y bạn h&atilde;y d&agrave;nh ra ch&uacute;t thời gian để gh&eacute; thăm bảo t&agrave;ng vua Quang Trung để c&oacute; thể hiểu biết th&ecirc;m về lịch sử v&agrave; vị anh h&ugrave;ng n&agrave;y nh&eacute;!</p>', 'active', 'DDPLAHDef6.jpeg', '2020-12-08 00:00:00', 'admin123', NULL, NULL, NULL, NULL, 'Bảo tàng Quang Trung', 'Bình Định vốn là vùng đất gắn liền với tên tuổi của vị vua Quang Trung ngày nào.', '[17]'),
(32, 3, 'Đàn tế trời Tây Sơn', '<p>Nơi n&agrave;y hay c&ograve;n biết đến với t&ecirc;n gọi kh&aacute;c l&agrave; Từ đỉnh Ấn Sơn. Nơi n&agrave;y được x&acirc;y dựng n&ecirc;n để thể hiện sự tr&acirc;n trọng, biết ơn với triều đại T&acirc;y Sơn xưa kia đ&atilde; gi&agrave;nh được nhiều chiến c&ocirc;ng vẻ vang trong lịch sử.</p>', 'active', 'ElU9QMJmrZ.jpeg', '2020-12-08 00:00:00', 'admin123', NULL, NULL, NULL, NULL, 'Đàn tế trời Tây Sơn', 'Nơi này hay còn biết đến với tên gọi khác là Từ đỉnh Ấn Sơn.', '[18]'),
(33, 3, 'Eo Gió', '<p>Một khu du lịch B&igrave;nh Định mới kh&aacute; hấp dẫn kh&aacute;ch du lịch tọa lạc tr&ecirc;n tại x&atilde; Nhơn L&yacute; c&aacute;ch th&agrave;nh phố Quy Nhơn 20km. Eo Gi&oacute; bắt nguồn từ h&igrave;nh d&aacute;ng địa l&yacute; bởi từ tr&ecirc;n cao nh&igrave;n xuống ta sẽ thấy eo biển được bao bọc bởi d&atilde;y n&uacute;i như chen chắn v&agrave; &ocirc;m trọng b&atilde;i biển tuyệt đẹp. Vậy c&ograve;n g&igrave; chần chờ g&igrave; m&agrave; kh&ocirc;ng đặt ngay kh&aacute;ch sạn Eo Gi&oacute; view đẹp để gần thi&ecirc;n nhi&ecirc;n, biển trời sau những &aacute;p lực mệt mỏi của cuộc sống chứ?</p>', 'active', 'n6ZLDZOq9v.jpeg', '2020-12-08 00:00:00', 'admin123', NULL, NULL, NULL, NULL, 'Eo Gió', 'Eo Gió bắt nguồn từ hình dáng địa lý bởi từ trên cao nhìn xuống ta sẽ thấy eo biển được bao bọc bởi dãy núi như chen chắn và ôm trọng bãi biển tuyệt đẹp.', '[19]'),
(34, 3, 'Kỳ Co', '<p>Kh&ocirc;ng phải một địa điểm du lịch ở B&igrave;nh Định được nhiều người biết đến nhưng kh&ocirc;ng v&igrave; thế m&agrave; Kỳ Co k&eacute;m hấp dẫn hơn. C&aacute;ch th&agrave;nh phố 25km thuộc đảo Nhơn L&yacute;. B&atilde;i tắm tại Kỳ Co lặng s&oacute;ng, biển n&ocirc;ng n&ecirc;n du kh&aacute;ch c&oacute; thể thỏa thức tắm m&agrave; kh&ocirc; lo sợ s&oacute;ng biển. B&atilde;i c&aacute;t trắng nguy&ecirc;n sơ những ngọn n&uacute;i hi&ecirc;n ngang kỳ vĩ bao quanh c&agrave;ng l&agrave;m cho vẻ đẹp của Kỳ Co th&ecirc;m phần th&uacute; vị.</p>', 'active', 'YajmbPC8Pi.jpeg', '2020-12-08 00:00:00', 'admin123', NULL, NULL, NULL, NULL, 'Kỳ Co', 'Bãi tắm tại Kỳ Co lặng sóng, biển nông nên du khách có thể thỏa thức tắm mà khô lo sợ sóng biển.', '[20]'),
(35, 3, 'Khu dã ngoại Trung Lương', '<p>Đ&acirc;y l&agrave; một khu d&atilde; ngoại ven biển mới mở nhưng lại kh&aacute; thu h&uacute;t kh&aacute;ch ở Quy Nhơn. Ở đ&acirc;y sở hữu một b&atilde;i cỏ xanh ngắt để cắm trại. V&agrave; điều đặc biệt l&agrave; n&oacute; nằm lọt thỏm giữa những d&atilde;y n&uacute;i đ&aacute; nhấp nh&ocirc; v&agrave; c&oacute; mặt quay ra biển v&ocirc; c&ugrave;ng l&atilde;ng mạn. Bởi vậy m&agrave; phong cảnh nơi đ&acirc;y đ&atilde; hấp dẫn kh&ocirc;ng &iacute;t c&aacute;c bạn trẻ từ nơi xa đến để tận hưởng những chuyến picnic, cắm trại l&atilde;ng mạn như tr&ecirc;n c&aacute;c bộ phim H&agrave;n Quốc.</p>', 'active', 'gTKxMdKRLa.jpeg', '2020-12-08 00:00:00', 'admin123', NULL, NULL, NULL, NULL, 'Trung Lương', 'Khu dã ngoại Trung Lương', '[21]'),
(36, 3, 'FLC Zoo Safari Park - khám phá thế giới hoang dã', '<p>FLC Zoo Safari Park kh&aacute;nh th&agrave;nh v&agrave;o 25/03/2017 v&agrave; nhanh ch&oacute;ng trở th&agrave;nh khu vui chơi giải tr&iacute; ở Quy Nhơn si&ecirc;u &ldquo;hot&rdquo; của c&aacute;c du kh&aacute;ch tr&ecirc;n mọi miền đất nước. Với tổng diện t&iacute;ch 129,1 ha, được thiết kế theo m&ocirc; h&igrave;nh Safari chuẩn thế giới. Đ&acirc;y l&agrave; nơi bảo tồn của gần 1000 c&aacute; thể động vật &nbsp;như: Hổ Đ&ocirc;ng Dương, Sư tử trắng, C&aacute; sấu, Gấu, Voi, C&ocirc;ng Đ&ocirc;ng Dương, Thi&ecirc;n nga, Uy&ecirc;n ương, Khỉ mặt đỏ,...</p>\r\n\r\n<p>Tất cả &yacute; tưởng thiết kế trong c&ocirc;ng vi&ecirc;n đều tạo n&ecirc;n một c&aacute;ch tối đa nhất để mang đến một kh&ocirc;ng gian h&ograve;a hợp với thi&ecirc;n nhi&ecirc;n, đem lại cảm gi&aacute;c gần gũi v&agrave; quen thuộc cho c&aacute;c loại động vật nơi đ&acirc;y. Bởi vậy, mỗi khi bạn tới Zoo Safari Park ở Quy Nhơn, dường như bạn sẽ cảm thấy m&igrave;nh lạc v&agrave;o trong một khu rừng thu nhỏ thực sự. Zoo Safari Park l&agrave; m&ocirc;i trường tuyệt vời gia đ&igrave;nh c&oacute; c&aacute;c bạn nhỏ để trải nghiệm những gi&acirc;y ph&uacute;t tuyệt vời từ tham quan v&agrave; t&igrave;m hiểu c&aacute;c lo&agrave;i động vật cho đến tham gia c&aacute;c tr&ograve; chơi bổ &iacute;ch, chắc chắn sẽ l&agrave; những kỷ niệm kh&ocirc;ng bao giờ qu&ecirc;n.</p>\r\n\r\n<p>&ecirc;n cạnh đ&oacute;, Zoo Safari Park c&ograve;n c&oacute; những hoạt động kh&aacute;c để du kh&aacute;ch c&oacute; thể lựa chọn như: tham quan bằng xe điện buggy/xe ngựa, cắm trại d&atilde; ngoại, đạp xe đạp đ&ocirc;i, ch&egrave;o thuyền Kayak...với gi&aacute; v&eacute; chỉ từ 30.000đ - 50.000đ/ lượt chơi.</p>\r\n\r\n<p>Th&ocirc;ng tin chung:</p>\r\n\r\n<p>Địa chỉ: X&atilde; Nhơn L&yacute;, th&agrave;nh phố Quy Nhơn, tỉnh B&igrave;nh Định.</p>\r\n\r\n<p>Thời gian hoạt động: 8h00 - 17h30</p>\r\n\r\n<p>Gi&aacute; v&eacute;: Người lớn 80.000đ/lượt, trẻ em 60.000đ/lượt</p>', 'active', 'OXGnpNkZi7.jpeg', '2020-12-08 00:00:00', 'admin123', NULL, NULL, NULL, NULL, 'FLC Zoo Safari Park', 'FLC Zoo Safari Park - khám phá thế giới hoang dã', '[22]'),
(37, 2, 'Lễ hội Đống Đa - Tây Sơn Bình Định', '<p>Đ&acirc;y l&agrave; lễ hội được tổ chức thường ni&ecirc;n v&agrave;o dịp đầu xu&acirc;n từ ng&agrave;y m&ugrave;ng 4 - 5 &acirc;m lịch, tại Bảo t&agrave;ng Quang Trung thuộc th&ocirc;n Ki&ecirc;n Mỹ, thị trấn Ph&uacute; Phong, huyện T&acirc;y Sơn, B&igrave;nh Định. Lễ hội Đống Đa - T&acirc;y Sơn mang nhiều &yacute; nghĩa, kh&ocirc;ng chỉ để tưởng nhớ đến c&ocirc;ng lao to lớn của vua Quang Trung &ndash; Nguyễn Huệ với trận Ngọc Hồi Đống Đa lừng lẫy một thời, m&agrave; lễ hội c&ograve;n c&oacute; &yacute; nghĩa g&igrave;n giữ n&eacute;t đẹp truyền thống cho thế hệ nay v&agrave; mai sau để th&ecirc;m y&ecirc;u qu&yacute; v&agrave; tự h&agrave;o về qu&ecirc; hương, đất nước m&igrave;nh.</p>\r\n\r\n<p>Lễ hội n&agrave;y kh&ocirc;ng chỉ thu h&uacute;t đ&ocirc;ng đảo người d&acirc;n trong cả nước tham gia m&agrave; c&ograve;n hấp dẫn nhiều du kh&aacute;ch nước ngo&agrave;i du lịch ở Quy Nhơn dịp n&agrave;y. Lễ hội được diễn ra với nhiều nghi thức truyền thống v&agrave; c&aacute;c tr&ograve; chơi d&acirc;n gian hấp dẫn. Phần lễ tế được tổ chức trang trọng ở ch&iacute;nh điện T&acirc;y Sơn với nghi thức đọc sớ tế, d&acirc;ng hương hoa c&ugrave;ng d&agrave;n k&egrave;n trống &acirc;m vang, h&agrave;o h&ugrave;ng, tạo n&ecirc;n một kh&ocirc;ng kh&iacute; lễ hội rất s&ocirc;i động v&agrave; hấp dẫn.</p>\r\n\r\n<p>Sau phần lễ tế l&agrave; phần hội, người d&acirc;n v&agrave; du kh&aacute;ch khi đến đ&acirc;y sẽ được chứng kiến những m&agrave;n m&uacute;a nhạc v&otilde; T&acirc;y Sơn ho&agrave;nh tr&aacute;ng, những tiết mục v&otilde; thuật v&ocirc; c&ugrave;ng đặc sắc được biểu diễn bởi c&aacute;c v&otilde; sư, v&otilde; sĩ, nghệ nh&acirc;n c&oacute; t&ecirc;n tuổi h&agrave;ng đầu của đất v&otilde; B&igrave;nh Định. Bảo t&agrave;ng Quang Trung sẽ l&agrave; một trong những điểm du lịch ở Quy Nhơn m&agrave; bạn kh&ocirc;ng n&ecirc;n bỏ qua đặc biệt khi đi du lịch v&agrave;o dịp lễ hội n&agrave;y.</p>', 'active', 'TAN2XjZHUu.jpeg', '2020-12-08 00:00:00', 'admin123', NULL, NULL, NULL, NULL, 'Lễ hội Đống Đa', 'Lễ hội Đống Đa - Tây Sơn Bình Định', '[23]'),
(38, 2, 'Lễ hội Cầu Ngư', '<p><br />\r\nCầu ngư l&agrave; một lễ hội d&acirc;n gian truyền thống, gắn liền với đời sống ngư d&acirc;n v&ugrave;ng biển. Cũng giống như nhiều lễ hội cầu ngư của người d&acirc;n ở c&aacute;c tỉnh ven biển kh&aacute;c, lễ hội cầu ngư ở B&igrave;nh Định mang &yacute; nghĩa tỏ l&ograve;ng biết ơn đối với vị thần Nam Hải hay c&ograve;n gọi l&agrave; c&aacute; &Ocirc;ng (c&aacute; Voi) v&agrave; cầu cho mưa thuận gi&oacute; h&ograve;a, s&oacute;ng y&ecirc;n biển lặng, được m&ugrave;a t&ocirc;m c&aacute;. Lễ hội n&agrave;y được tổ chức từ ng&agrave;y 11-15/2 &acirc;m lịch h&agrave;ng năm, tại x&atilde; Nhơn Hải, TP. Quy Nhơn.&nbsp;</p>\r\n\r\n<p>Lễ hội Cầu Ngư B&igrave;nh Định được diễn ra với 2 phần nghi thức ch&iacute;nh l&agrave; phần lễ v&agrave; phần hội. Phần lễ sẽ diễn ra với c&aacute;c nghi thức trang trọng như: Nghinh thần Nam Hải (Cung nghinh thủy lục rước c&aacute; &Ocirc;ng) nhập điện, lễ tế thần Nam Hải (c&oacute; m&uacute;a gươm hầu thần), lễ tế cầu quốc th&aacute;i d&acirc;n an, mưa thuận gi&oacute; h&ograve;a; lễ ra qu&acirc;n đ&aacute;nh bắt hải sản. C&ograve;n phần hội được tổ chức với c&aacute;c hoạt động v&ocirc; c&ugrave;ng s&ocirc;i động như: K&eacute;o co, bơi th&uacute;ng đ&ocirc;i nam, lắc th&uacute;ng, ngo&aacute;y th&uacute;ng. V&agrave; c&aacute;c chương tr&igrave;nh m&uacute;a h&aacute;t tuồng tại Lăng &Ocirc;ng Nam Hải để phục vụ nh&acirc;n d&acirc;n địa phương v&agrave; du kh&aacute;ch.</p>', 'active', 'jNmGfgyZOb.jpeg', '2020-12-08 00:00:00', 'admin123', '2020-12-09 00:00:00', 'admin123', NULL, NULL, 'Lễ hội Cầu Ngư', 'Lễ hội Cầu Ngư', '[24]'),
(39, 2, 'Lễ hội Chợ Gò', '<p>H&agrave;ng năm v&agrave;o đ&uacute;ng ng&agrave;y m&ugrave;ng 1 tết &acirc;m lịch, tại th&ocirc;n Phong Thạnh, thị trấn Tuy Phước, tỉnh B&igrave;nh Định sẽ diễn ra lễ hội Chợ G&ograve; - một trong những lễ hội B&igrave;nh Định nổi tiếng. Đ&acirc;y l&agrave; phi&ecirc;n chợ mang đậm n&eacute;t văn h&oacute;a của người d&acirc;n miền đất v&otilde; B&igrave;nh Định.&nbsp;</p>\r\n\r\n<p>Tham quan Chợ G&ograve; v&agrave;o dịp lễ n&agrave;y, bạn sẽ mua được những sản vật của địa phương như trầu cau, v&ocirc;i Trường &Uacute;c, c&aacute; t&ocirc;m tươi được đ&aacute;nh bắt tr&ecirc;n đầm Thị Nại, b&aacute;nh &iacute;t l&aacute; gai, nem chợ Huyện, rượu nếp v&agrave; rượu gạo Trường &Uacute;c&hellip;Lễ hội Chợ G&ograve; B&igrave;nh Định với sự độc đ&aacute;o, mang đậm n&eacute;t văn h&oacute;a cổ truyền d&acirc;n tộc đ&atilde; được Trung t&acirc;m s&aacute;ch kỷ lục Việt Nam xếp trong &ldquo;100 phi&ecirc;n chợ độc đ&aacute;o nhất Việt Nam&rdquo;. Đ&acirc;y cũng l&agrave; một trong c&aacute;c địa điểm du lịch ở Quy Nhơn hấp dẫn m&agrave; bạn kh&ocirc;ng n&ecirc;n bỏ qua.</p>', 'active', '98UyHOZkkT.jpeg', '2020-12-08 00:00:00', 'admin123', NULL, NULL, NULL, NULL, 'Chợ Gò', 'Lễ hội Chợ Gò', '[25]'),
(40, 3, 'Lễ hội Chùa Ông Núi', '<p>Lễ hội Ch&ugrave;a &Ocirc;ng N&uacute;i l&agrave; lễ hội được tổ chức h&agrave;ng năm v&agrave;o ng&agrave;y 24 - 25 th&aacute;ng gi&ecirc;ng, tại ch&ugrave;a &Ocirc;ng N&uacute;i, thuộc x&atilde; C&aacute;t Tiến, huyện Ph&ugrave; C&aacute;t, B&igrave;nh Định. Ng&ocirc;i ch&ugrave;a n&agrave;y l&agrave; một trong những ng&ocirc;i ch&ugrave;a cổ đẹp v&agrave; nổi tiếng ở B&igrave;nh Định, tọa lạc ngay lưng chừng đỉnh Ch&oacute;p Vung - đỉnh cao nhất của d&atilde;y n&uacute;i B&agrave;. H&agrave;ng năm cứ v&agrave;o ng&agrave;y n&agrave;y, người d&acirc;n v&agrave; du kh&aacute;ch thập phương lại chen ch&uacute;c nhau đến đ&acirc;y để đi lễ, cầu t&agrave;i lộc, b&igrave;nh an v&agrave; c&ugrave;ng nhau trẩy hội.&nbsp;</p>\r\n\r\n<p>Lễ hội n&agrave;y cũng ch&iacute;nh l&agrave; ng&agrave;y giỗ của h&ograve;a thượng Th&iacute;ch Trừng Tịnh, người đ&atilde; c&oacute; nhiều c&ocirc;ng lao đ&oacute;ng g&oacute;p cho sự ph&aacute;t triển của ch&ugrave;a. Du kh&aacute;ch đến với lễ hội sẽ c&oacute; cơ hội tham quan, l&agrave;m lễ tại ch&ugrave;a, đặc biệt nhất l&agrave; được tận mắt chi&ecirc;m ngưỡng bức tượng Phật cao 69m - một trong những tượng Phật lớn nhất Đ&ocirc;ng Nam &Aacute;.</p>', 'active', 'U3cQV51R6G.jpeg', '2020-12-08 00:00:00', 'admin123', '2020-12-09 00:00:00', 'admin123', NULL, NULL, 'Chùa Ông Núi', 'Lễ hội Chùa Ông Núi', '[26]'),
(41, 2, 'Lễ hội đua ghe', '<p>Du lịch Quy Nhơn bạn c&oacute; thể gh&eacute; tới tại th&ocirc;n T&ugrave;ng Giản, x&atilde; Phước H&ograve;a, Huyện Tuy Phước, B&igrave;nh Định v&agrave; m&ugrave;ng 2 tết &acirc;m lịch h&agrave;ng năm để kh&aacute;m ph&aacute; lễ hội đua thuyền truyền thống tr&ecirc;n d&ograve;ng s&ocirc;ng G&ograve; Bồi. Lễ hội n&agrave;y được tổ chức nhằm thể hiện sức mạnh của những ngư d&acirc;n v&ugrave;ng s&ocirc;ng nước, đem lại niềm vui, x&oacute;a đi bao nỗi nhọc nhằn của một năm lao động vất vả. Đồng thời, đ&acirc;y cũng l&agrave; lễ hội để cầu ước một năm mưa thuận gi&oacute; h&ograve;a, con người b&igrave;nh an, cuộc sống no đủ.</p>\r\n\r\n<p>Lễ hội diễn ra với một khung cảnh rất s&ocirc;i động, hai b&ecirc;n đường cột cổng ch&agrave;o được trang tr&iacute; lộng lẫy với đủ m&agrave;u sắc c&ugrave;ng h&agrave;ng cờ phướn tung bay. C&ograve;n dưới d&ograve;ng s&ocirc;ng xanh, những chiếc s&otilde;ng c&acirc;u, thuyền lớn những vật dụng d&ugrave;ng để mưu sinh h&agrave;ng ng&agrave;y của b&agrave; con ngư d&acirc;n nay đ&atilde; được trang tr&iacute; sặc sỡ với nhiều h&igrave;nh tượng, như: Thần t&agrave;i, thổ địa v&agrave; rồng... l&agrave;m rực rỡ cả kh&uacute;c s&ocirc;ng. Ngo&agrave;i ra, trước thời gian diễn ra đua thuyền, Trung t&acirc;m Văn h&oacute;a - Th&ocirc;ng tin v&agrave; Thể thao huyện c&ograve;n tổ chức biểu diễn văn nghệ tr&ecirc;n thuyền c&agrave;ng tạo th&ecirc;m sự s&ocirc;i động v&agrave; hấp dẫn cho lễ hội.</p>', 'active', '9EHta5ay0I.jpeg', '2020-12-08 00:00:00', 'admin123', '2020-12-09 00:00:00', 'admin123', NULL, NULL, 'đua ghe', 'Lễ hội đua ghe', '[27]'),
(42, 2, 'Festival võ thuật Bình Định', '<p>B&igrave;nh Định nổi tiếng với t&ecirc;n gọi l&agrave; miền đất v&otilde;, nơi lưu giữ những m&ocirc;n v&otilde; cổ truyền nổi tiếng Việt Nam - một di sản văn h&oacute;a qu&yacute; b&aacute;u, c&oacute; sức lan toả mạnh mẽ đến nhiều quốc gia. Ch&iacute;nh v&igrave; vậy, cứ 2 năm một lần, tại B&igrave;nh Định Li&ecirc;n hoan Quốc tế V&otilde; cổ truyền Việt Nam được tổ chức. Đ&acirc;y l&agrave; dịp để c&aacute;c m&ocirc;n ph&aacute;i v&otilde; cổ truyền Việt Nam trong nước v&agrave; quốc tế tụ hội về thi đấu, biểu diễn, giao lưu, trao đổi kinh nghiệm, g&oacute;p phần g&igrave;n giữ, ph&aacute;t huy, t&ocirc;n vinh v&otilde; cổ truyền Việt Nam trong nước v&agrave; tr&ecirc;n thế giới.&nbsp;</p>\r\n\r\n<p>Lễ hội diễn ra với rất nhiều hoạt động như: Lễ d&acirc;ng hương d&acirc;ng hoa tại Bảo t&agrave;ng Quang Trung v&agrave; Đ&agrave;n tế Trời đất nhằm tưởng nhớ c&ocirc;ng đức của Ho&agrave;ng đế Quang Trung v&agrave; c&aacute;c văn thần, v&otilde; tướng của phong tr&agrave;o T&acirc;y Sơn h&agrave;o h&ugrave;ng trong lịch sử đấu tranh chống giặc ngoại x&acirc;m của d&acirc;n tộc; lễ khai mạc với nhiều tiết mục phong ph&uacute; như nghi lễ t&ocirc;n vinh Tổ nghiệp; v&agrave; nhiều h&igrave;nh thức diễu h&agrave;nh kết hợp với biểu diễn nghệ thuật đường phố như: Biểu diễn quyền thuật; b&agrave;i ch&ograve;i; t&aacute;i hiện c&aacute;c t&iacute;ch tr&ograve;, c&aacute;c giai thoại lịch sử; tr&igrave;nh diễn trang phục, nhạc v&otilde; B&igrave;nh Định&hellip;, lễ hội đ&atilde; thu h&uacute;t sự quan t&acirc;m của đ&ocirc;ng đảo nh&acirc;n d&acirc;n v&agrave; du kh&aacute;ch.</p>\r\n\r\n<p>Hy vọng rằng qua b&agrave;i chia sẻ về những lễ hội nổi tiếng ở B&igrave;nh Định n&agrave;y c&aacute;c bạn đ&atilde; c&oacute; th&ecirc;m nhiều th&ocirc;ng tin hữu &iacute;ch, th&ecirc;m hiểu hơn về những n&eacute;t đẹp văn h&oacute;a của v&ugrave;ng đất n&agrave;y.</p>\r\n\r\n<p>Nhanh tay đặt ngay cho m&igrave;nh những tấm v&eacute; m&aacute;y bay đi Quy Nhơn v&agrave; ph&ograve;ng kh&aacute;ch sạn Quy Nhơn để c&oacute; thể gh&eacute; thăm miền đất v&otilde; n&agrave;y nh&eacute;.</p>', 'active', '3O9zR0PKeG.jpeg', '2020-12-08 00:00:00', 'admin123', NULL, NULL, NULL, NULL, 'Festival võ thuật', 'Festival võ thuật Bình Định', '[28]');

-- --------------------------------------------------------

--
-- Table structure for table `attribute`
--

CREATE TABLE `attribute` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `change_price` varchar(5) NOT NULL,
  `status` varchar(10) NOT NULL,
  `created` date NOT NULL,
  `created_by` varchar(10) NOT NULL,
  `modified` date DEFAULT NULL,
  `modified_by` varchar(10) DEFAULT NULL,
  `group_attribute_id` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attribute`
--

INSERT INTO `attribute` (`id`, `name`, `change_price`, `status`, `created`, `created_by`, `modified`, `modified_by`, `group_attribute_id`) VALUES
(1, 'Màu', 'no', 'active', '2020-10-31', 'admin', '2020-11-07', 'hailan', '[\"2\",\"1\",\"4\"]'),
(2, 'Slogan', 'no', 'active', '2020-10-31', 'admin', '2020-11-07', 'hailan', '[\"2\",\"1\"]'),
(3, 'Size', 'yes', 'active', '2020-10-21', 'admin', '2020-11-23', 'hailan', '[\"2\",\"1\",\"3\"]'),
(5, 'Hệ điều hành', 'no', 'active', '2020-11-01', 'hailan', '2020-11-07', 'hailan', '[\"4\"]'),
(6, 'Tiện ích', 'yes', 'active', '2020-11-25', 'hailan', '2020-11-25', 'hailan', '[\"5\"]'),
(7, 'Diện tích', 'yes', 'active', '2020-11-25', 'hailan', NULL, NULL, '[\"5\"]'),
(8, 'Bữa ăn', 'yes', 'active', '2020-11-25', 'hailan', NULL, NULL, '[\"5\"]');

-- --------------------------------------------------------

--
-- Table structure for table `category_article`
--

CREATE TABLE `category_article` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `_lft` int(11) NOT NULL,
  `_rgt` int(11) NOT NULL,
  `created` date DEFAULT NULL,
  `created_by` varchar(10) DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `modified_by` varchar(10) DEFAULT NULL,
  `status` varchar(10) NOT NULL,
  `is_footer` varchar(5) DEFAULT NULL,
  `display` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category_article`
--

INSERT INTO `category_article` (`id`, `name`, `parent_id`, `_lft`, `_rgt`, `created`, `created_by`, `modified`, `modified_by`, `status`, `is_footer`, `display`) VALUES
(1, 'Root', 0, 1, 14, NULL, NULL, NULL, NULL, 'active', 'no', 'grid'),
(2, 'Hoạt động', 1, 2, 3, '2020-10-26', 'hailan', '2020-12-08', 'hailan', 'active', 'yes', 'grid'),
(3, 'Điểm đến', 1, 4, 5, '2020-10-26', 'hailan', '2020-12-08', 'hailan', 'active', 'yes', 'list'),
(5, 'Du lịch', 1, 6, 11, '2020-10-26', 'hailan', NULL, NULL, 'inactive', 'yes', 'list'),
(10, 'Thế giới', 5, 7, 10, '2020-10-26', 'hailan', NULL, NULL, 'inactive', NULL, 'list'),
(11, 'Bóng đá', 10, 8, 9, '2020-10-26', 'hailan', NULL, NULL, 'inactive', 'yes', 'grid'),
(15, 'Bài viết hệ thống', 1, 12, 13, '2020-12-16', 'hailan', '2020-12-16', 'admin123', 'inactive', 'no', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category_faq`
--

CREATE TABLE `category_faq` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `status` text CHARACTER SET latin1 NOT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `is_home` varchar(5) CHARACTER SET latin1 DEFAULT NULL,
  `display` varchar(255) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `category_faq`
--

INSERT INTO `category_faq` (`id`, `name`, `status`, `created`, `created_by`, `modified`, `modified_by`, `is_home`, `display`) VALUES
(1, 'Thể thao', 'active', '2019-05-04 00:00:00', 'admin', '2019-05-12 00:00:00', 'hailan', 'no', 'list'),
(2, 'Giáo dục', 'active', '2019-05-04 00:00:00', 'admin', '2019-05-12 00:00:00', 'hailan', 'no', 'grid'),
(3, 'Sức khỏe', 'active', '2019-05-04 00:00:00', 'admin', '2019-05-15 15:04:33', 'hailan', 'no', 'list'),
(4, 'Du lịch', 'active', '2019-05-04 00:00:00', 'admin', '2019-05-15 15:04:30', 'hailan', 'yes', 'grid'),
(5, 'Khoa học', 'active', '2019-05-04 00:00:00', 'admin', '2019-05-12 00:00:00', 'hailan', 'yes', 'list'),
(6, 'Số hóa', 'active', '2019-05-04 00:00:00', 'admin', '2019-05-15 15:04:38', 'hailan', 'yes', 'grid'),
(7, 'Xe - Ô tô', 'inactive', '2019-05-04 00:00:00', 'admin', '2019-05-15 15:04:36', 'hailan', 'yes', 'list'),
(8, 'Kinh doanh', 'inactive', '2019-05-12 00:00:00', 'hailan', '2020-10-19 00:00:00', 'hailan', 'yes', 'list');

-- --------------------------------------------------------

--
-- Table structure for table `category_product`
--

CREATE TABLE `category_product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `_lft` int(11) NOT NULL,
  `_rgt` int(11) NOT NULL,
  `created` date DEFAULT NULL,
  `created_by` varchar(10) DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `modified_by` varchar(10) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `is_home` varchar(10) DEFAULT NULL,
  `display` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category_product`
--

INSERT INTO `category_product` (`id`, `name`, `parent_id`, `_lft`, `_rgt`, `created`, `created_by`, `modified`, `modified_by`, `status`, `is_home`, `display`) VALUES
(1, 'Root', 0, 1, 24, '2020-10-27', 'admin', NULL, NULL, 'active', NULL, NULL),
(2, 'Superior', 1, 12, 13, '2020-10-27', 'hailan', '2020-11-26', 'hailan', 'active', 'yes', NULL),
(3, 'Deluxe', 1, 16, 17, '2020-10-27', 'hailan', '2020-11-26', 'hailan', 'active', NULL, NULL),
(4, 'President Suite', 1, 20, 21, '2020-10-27', 'hailan', '2020-11-26', 'hailan', 'active', NULL, NULL),
(6, 'Junior Suite', 1, 22, 23, '2020-10-27', 'hailan', '2020-11-26', 'hailan', 'active', NULL, NULL),
(7, 'Executive suite', 1, 18, 19, '2020-11-05', 'hailan', '2020-11-26', 'hailan', 'active', NULL, NULL),
(8, 'Deluxe Sky', 1, 14, 15, '2020-11-17', 'hailan', '2020-11-26', 'hailan', 'active', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `message` text NOT NULL,
  `status` varchar(10) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `fullname`, `email`, `phone`, `message`, `status`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(5, 'huỳnh minh sang', 'sang.huynhminhit@gmail.com', '0362302030', 'dvwaydkadadnadwa', 'pending', '2020-10-17 00:00:00', 'sang.huynhminhit@gmail.com', NULL, NULL),
(7, 'Nguyễn Đình Duy', 'duy.nd@gmail.com', '0123456789', 'Đặt 1 phòng tân hôn', 'pending', '2020-11-27 23:28:38', 'duy.nd@gmail.com', NULL, NULL),
(8, 'bặdbawkdawd', 'sang.huynhminhit@gmail.com', '0123456789', 'test', 'pending', '2020-11-28 19:11:07', 'sang.huynhminhit@gmail.com', NULL, NULL),
(13, 'Lê Trần Thy Ánh', 'huynhminhsangcntp@gmail.com', '0362302030', 'Lê Trần Thy Ánh 1', 'pending', '2020-12-04 15:52:39', 'huynhminhsangcntp@gmail.com', NULL, NULL),
(14, 'Lê Trần Thy Ánh', 'huynhminhsangcntp@gmail.com', '0362302030', 'Lê Trần Thy Ánh 12', 'pending', '2020-12-04 15:54:10', 'huynhminhsangcntp@gmail.com', NULL, NULL),
(15, 'thanhhai3295@gmail.com', 'thanhhai3295@gmail.com', '0362302030', 'thanhhai3295@gmail.com', 'pending', '2020-12-04 22:01:45', 'thanhhai3295@gmail.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `type` varchar(10) DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `total_use` int(11) DEFAULT NULL,
  `start_price` int(11) DEFAULT NULL,
  `end_price` int(11) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `created_by` varchar(10) DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `modified_by` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`id`, `code`, `type`, `value`, `start`, `end`, `total`, `total_use`, `start_price`, `end_price`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'zendvn500', 'direct', 1000000, '2020-11-04', '2020-11-07', 10, 0, 2000000, 8000000, NULL, NULL, '2020-12-08', 'admin123'),
(2, 'T61MUIlKlz', 'direct', 300000, '2020-11-04', '2020-11-07', 10, 0, 300000, 1000000, NULL, NULL, '2020-12-08', 'admin123'),
(4, '72Al9Oy3X1', 'percent', 10, '2020-12-08', '2020-12-08', 10, 0, 2000000, 5000000, '2020-12-08', 'admin123', NULL, NULL),
(5, 'es7XaGbzkQ', 'percent', 15, '2020-12-08', '2020-12-08', 20, 0, 2000000, 8000000, '2020-12-08', 'admin123', NULL, NULL),
(6, 'GbsEB8CMU9', 'percent', 100, '2020-12-16', '2020-12-16', 10000000, 0, 10000, 10000000, '2020-12-16', 'admin', '2020-12-16', 'admin123'),
(7, 'KWiHyxcH3y', 'direct', 200000, '2020-12-16', '2020-12-16', 10, 0, 1000000, 100000000, '2020-12-16', 'admin123', '2020-12-16', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `position` varchar(255) NOT NULL,
  `phone` text,
  `status` varchar(10) NOT NULL,
  `ordering` int(11) DEFAULT NULL,
  `created` date NOT NULL,
  `created_by` varchar(10) NOT NULL,
  `modified` date DEFAULT NULL,
  `modified_by` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `fullname`, `thumb`, `position`, `phone`, `status`, `ordering`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'Lưu Trường Hải Lân', 'DI9msh2ryp.png', 'Chủ tịch HĐQT', '0362302010', 'active', 1, '2020-12-03', 'admin123', '2020-12-08', 'admin123'),
(2, 'Nguyễn Văn Linh', 'kVWUILuJ6G.png', 'Giám đốc', '0362302011', 'active', 2, '2020-12-03', 'admin123', '2020-12-08', 'admin123'),
(3, 'Huỳnh Minh Sang', 'UWEbJ4GmRN.png', 'Trưởng bộ phận an ninh', '0362302012', 'active', 3, '2020-12-03', 'admin123', '2020-12-08', 'admin123'),
(4, 'Lê Thanh Hải', 'lhQQuPKYHT.png', 'Bếp trưởng', '0362302013', 'active', 4, '2020-12-03', 'admin123', '2020-12-16', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `question` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ordering` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`, `status`, `ordering`, `created`, `created_by`, `modified`, `modified_by`, `category_id`) VALUES
(1, 'Thời gian nhận trả phòng của khách sạn?', '<p>Theo<strong>&nbsp;quy định về giờ check in check out kh&aacute;ch sạn</strong><strong>&nbsp;</strong>đối với một số th&agrave;nh phố lớn trong nước như: Hồ Ch&iacute; Minh, Huế, H&agrave; Nội, Đ&agrave; Nẵng&hellip; th&igrave; thường chọn mốc 12h l&agrave; ng&agrave;y giờ đặt ph&ograve;ng v&agrave; trả ph&ograve;ng. Từ mốc thời gian đ&oacute;, kh&aacute;ch sạn sẽ &aacute;p dụng c&aacute;ch t&iacute;nh ng&agrave;y ở kh&aacute;ch sạn<strong>&nbsp;</strong>cho kh&aacute;ch. Cụ thể giờ nhận ph&ograve;ng kh&aacute;ch sạn khoảng từ 12 giờ trưa đến 14 giờ chiều hoặc hơn v&agrave; giờ trả ph&ograve;ng phải&nbsp;đ&uacute;ng 12 giờ trưa của ng&agrave;y h&ocirc;m sau. V&agrave;o thời điểm đ&oacute;, bạn sẽ được t&iacute;nh ph&iacute; một ng&agrave;y tiền ph&ograve;ng.</p>\r\n\r\n<p>Đối với trường hợp nhận ph&ograve;ng sớm:</p>\r\n\r\n<ul>\r\n	<li>Check in từ 5h00 &ndash; 9h00: T&iacute;nh 50% gi&aacute; ph&oacute;ng.</li>\r\n	<li>Check in từ 9h &ndash; 14h00: T&iacute;nh 30% gi&aacute; ph&ograve;ng.</li>\r\n</ul>\r\n\r\n<p>Trường hợp trả ph&ograve;ng trễ</p>\r\n\r\n<ul>\r\n	<li>Từ 12h &ndash; 15h: Phụ thu 30% gi&aacute; ph&ograve;ng.</li>\r\n	<li>Từ 15h &ndash; 18h: Phụ thụ 50% gi&aacute; ph&ograve;ng.</li>\r\n	<li>Sau 18h00: Phụ thu 100% gi&aacute; ph&ograve;ng.</li>\r\n</ul>', 'active', 1, '2020-11-13 00:00:00', 'hailan', '2020-12-15 00:00:00', 'hailan', 1),
(2, 'Hủy đặt phòng khách sạn thì có bị thu phí hay không?', '<p>T&ugrave;y v&agrave;o từng kh&aacute;ch sạn với những ch&iacute;nh s&aacute;ch hủy kh&aacute;c nhau sẽ c&oacute; mức thu ph&iacute; kh&aacute;c nhau khi hủy ph&ograve;ng. C&oacute; kh&aacute;ch sạn sẽ miễn ph&iacute; việc hủy ph&ograve;ng, c&oacute; kh&aacute;ch sạn sẽ chịu từ 50% - 70% ph&iacute;. Một số kh&aacute;ch sạn kh&aacute;c kh&ocirc;ng cho ph&eacute;p hủy ph&ograve;ng th&igrave; bạn sẽ phải trả ph&iacute; l&agrave; 100% v&agrave; kh&ocirc;ng được ho&agrave;n lại tiền.</p>\r\n\r\n<p>V&iacute; dụ: Nếu như bạn hủy sử dụng ph&ograve;ng trong v&ograve;ng từ 1-7 ng&agrave;y thời điểm nhận ph&ograve;ng bạn sẽ chịu 100% ph&iacute; đặt ph&ograve;ng. &nbsp;Nếu bạn hủy sử dụng ph&ograve;ng từ 7-15 ng&agrave;y bạn sẽ chịu ph&iacute; từ 40% - 75% ph&iacute; đặt ph&ograve;ng. Nhưng nếu bạn hủy đặt ph&ograve;ng từ hơn 15 ng&agrave;y trở l&ecirc;n bạn c&oacute; thể được miễn ph&iacute; hủy ph&ograve;ng.</p>', 'active', 2, '2020-11-13 00:00:00', 'hailan', '2020-12-15 00:00:00', 'hailan', 2),
(5, 'Dưới 18 tuổi muốn thuê khách sạn thì phải làm sao?', '<p>Nếu bạn chưa đủ tuổi&nbsp;nhưng vẫn muốn thu&ecirc; ph&ograve;ng th&igrave; c&aacute;ch thức thu&ecirc; kh&aacute;ch sạn&nbsp;tốt nhất bạn cần l&agrave;m l&agrave; h&atilde;y đi c&ugrave;ng người nh&agrave;&nbsp;đủ tuổi&nbsp;(c&oacute; Chứng minh nh&acirc;n d&acirc;n). Đa số c&aacute;c kh&aacute;ch sạn thường kh&ocirc;ng y&ecirc;u cầu kh&aacute;ch phải xuất tr&igrave;nh hết tất cả c&aacute;c CMND khi đi theo nh&oacute;m hoặc đo&agrave;n, thường chỉ y&ecirc;u cầu xuất tr&igrave;nh 1/2 số CMND trong nh&oacute;m. V&igrave; vậy, bạn n&ecirc;n đi c&ugrave;ng người bảo l&atilde;nh để họ k&yacute; x&aacute;c nhận v&agrave;o&nbsp;giấy bảo l&atilde;nh d&agrave;nh cho kh&aacute;ch sạn để bạn được lưu tr&uacute; lại.</p>', 'active', 1, '2020-12-15 00:00:00', 'hailan', NULL, NULL, 4),
(6, 'Cách Thanh toán khi đặt phòng khách sạn online?', '<p><strong>Đặt ph&ograve;ng kh&aacute;ch sạn online</strong>&nbsp;hay c&ograve;n gọi l&agrave; đặt ph&ograve;ng trực tuyến&nbsp;l&agrave; h&igrave;nh thức book&nbsp;ph&ograve;ng th&ocirc;ng qua c&aacute;c website. Chỉ cần một thiết bị di động, m&aacute;y t&iacute;nh, laptop hoặc Ipad,... c&oacute; kết nối Internet l&agrave; bạn c&oacute; thể book ph&ograve;ng mọi l&uacute;c mọi nơi m&agrave; kh&ocirc;ng cần thực địa hoặc đến trực tiếp kh&aacute;ch sạn.&nbsp;&nbsp;</p>\r\n\r\n<p>Đặt ph&ograve;ng kh&aacute;ch sạn trực tuyến hiện nay l&agrave; một c&ocirc;ng cụ đắc lực cho kh&aacute;ch du lịch tự t&uacute;c bởi lợi thế vừa tiện lợi nhanh ch&oacute;ng, lại vừa dễ d&agrave;ng&nbsp;t&igrave;m kiếm mức gi&aacute; tương đối mềm.&nbsp;Sau khi đặt ph&ograve;ng kh&aacute;ch sạn trực tuyến, để giữ lại ph&ograve;ng th&igrave; thường phải thanh to&aacute;n trước một phần ph&iacute; n&agrave;o đ&oacute;. Hiện nay đặt ph&ograve;ng trực tuyến c&oacute; 2 c&aacute;ch thanh to&aacute;n đ&oacute; l&agrave; Online v&agrave; trực tiếp.</p>\r\n\r\n<p>Đối với thanh to&aacute;n trực tiếp, c&oacute; c&aacute;c c&aacute;ch sau để bạn lựa chọn, đ&oacute; l&agrave; thanh to&aacute;n bằng thẻ Visa/ Mastercard, Internet Banking v&agrave; V&iacute; điện tử.</p>', 'active', 1, '2020-12-15 00:00:00', 'hailan', '2020-12-15 00:00:00', 'hailan', 4),
(7, 'Khách sạn có cho phép mang thú cưng vào không?', '<p>V&igrave; một số yếu tố kh&aacute;ch quan m&agrave; c&aacute;c kh&aacute;ch sạn tại Việt Nam đ&atilde; hạn chế vấn đề cho mang theo th&uacute; nu&ocirc;i v&agrave;o ph&ograve;ng nghỉ.&nbsp;Ng&agrave;y nay, với mức sống hiện đại hơn, nhu cầu cầu ở cạnh nhau&nbsp;giữa &quot;Sen cần Boss&quot; kh&ocirc;ng thể t&aacute;ch rời. Họ xem những th&uacute; cưng l&agrave; một người bạn tri kỉ đ&aacute;ng mến n&ecirc;n muốn đem đến những điều tốt nhất d&agrave;nh cho th&uacute; cưng của m&igrave;nh.</p>', 'active', 1, '2020-12-15 00:00:00', 'hailan', NULL, NULL, 4),
(8, 'Có nên tip cho nhân viên khách sạn hay là không?', '<p>Tiền tip (hay c&ograve;n gọi l&agrave; tiền boa)&nbsp;l&agrave; một th&oacute;i quen rất phổ biến ở c&aacute;c nước phương T&acirc;y, nhưng dường như n&oacute; lại kh&aacute; lạ lẫm đối với người Việt. Tuy nhi&ecirc;n văn h&oacute;a tiền tip lại rất quan trọng, nhất l&agrave; khi bạn đi du lịch v&igrave; n&oacute; ng&agrave;y c&agrave;ng được nhiều nước tr&ecirc;n thế giới tiếp thu.</p>\r\n\r\n<p>Nhiều người quan niệm rằng, sở&nbsp;dĩ việc c&oacute; đưa<strong>&nbsp;tiền tip cho kh&aacute;ch sạn</strong>&nbsp;hay kh&ocirc;ng thường kh&ocirc;ng quan trọng, bởi v&igrave; số tiền phục vụ đ&atilde; được t&iacute;nh v&agrave;o tiền ph&ograve;ng khi họ đ&atilde; chi trả, v&agrave; họ cảm thấy rất tiếc v&igrave; phải trả th&ecirc;m một khoản tiền cho người phục vụ. Nhưng một số quan điểm tr&aacute;i chiều phản biện rằng, tip l&agrave; thể hiện sự văn h&oacute;a, sự cảm ơn d&agrave;nh cho những người đ&atilde; gi&uacute;p m&igrave;nh dọn dẹp lại đống đồ lộn xộn trong ph&ograve;ng, gi&uacute;p m&igrave;nh c&oacute; thể nghỉ ngơi thật thoải m&aacute;i hơn trong suốt thời gian nghỉ ch&acirc;n tại đ&oacute;.</p>', 'active', 1, '2020-12-15 00:00:00', 'hailan', NULL, NULL, 4),
(9, 'phòng nghỉ trong khách sạn có gắn camera hay không?', '<p>Th&ocirc;ng thường việc lắp đặt camera l&agrave; một trong những vấn đề cần thiết để&nbsp;đảm bảo việc an to&agrave;n cho kh&aacute;ch sạn n&oacute;i chung v&agrave; cho kh&aacute;ch thu&ecirc; ph&ograve;ng n&oacute;i ri&ecirc;ng. Đ&acirc;y cũng l&agrave; c&aacute;ch gi&uacute;p ph&ograve;ng tr&aacute;nh những rủi ro c&oacute; thể xảy ra như trộm cướp, mất cắp...&nbsp;Tuy nhi&ecirc;n lắp camera ở đ&acirc;u hợp l&yacute; đ&oacute; l&agrave; việc ch&uacute;ng ta&nbsp;cần phải l&agrave;m r&otilde;.&nbsp;Th&ocirc;ng thường&nbsp;<strong>hệ thống camera của kh&aacute;ch sạn</strong>&nbsp;chỉ được lắp ở những khu vực&nbsp;c&ocirc;ng cộng, khu vực sinh hoạt chung như ph&ograve;ng tiếp t&acirc;n, d&atilde;y h&agrave;nh lang, b&atilde;i đỗ xe, lối ra v&agrave;o&nbsp;để tiện&nbsp;theo d&otilde;i to&agrave;n bộ kh&aacute;ch sạn. V&agrave; tất cả những vị tr&iacute;&nbsp;lắp đặt camera n&agrave;y đều c&oacute; chung mục đ&iacute;ch ch&iacute;nh l&agrave; bảo vệ an ninh, theo d&otilde;i c&aacute;c đối tượng c&oacute; h&agrave;nh vi xấu, c&oacute; khả năng trộm cắp chứ kh&ocirc;ng phải theo d&otilde;i kh&aacute;ch thu&ecirc; ph&ograve;ng.</p>', 'active', 1, '2020-12-15 00:00:00', 'hailan', NULL, NULL, 4);

-- --------------------------------------------------------

--
-- Table structure for table `feeship`
--

CREATE TABLE `feeship` (
  `id` int(11) NOT NULL,
  `province` varchar(255) NOT NULL,
  `fee` int(11) NOT NULL,
  `created` date DEFAULT NULL,
  `created_by` varchar(10) DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `modified_by` varchar(10) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feeship`
--

INSERT INTO `feeship` (`id`, `province`, `fee`, `created`, `created_by`, `modified`, `modified_by`, `status`) VALUES
(1, 'hanoi', 50000, NULL, NULL, NULL, NULL, NULL),
(2, 'hcm', 10000, NULL, NULL, NULL, NULL, NULL),
(3, 'cantho', 40000, '2020-11-04', 'hailan', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created` date DEFAULT NULL,
  `created_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `modified_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `type`, `link`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'media', 'https://www.youtube.com/playlist?list=PL4rzwxMEv_iWn-DW7b6KdS-opOclZvSAW', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `group_attribute`
--

CREATE TABLE `group_attribute` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created` date NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `modified` date DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `group_attribute`
--

INSERT INTO `group_attribute` (`id`, `name`, `created`, `created_by`, `modified`, `modified_by`, `status`) VALUES
(1, 'Bình giữ nhiệt', '2020-10-31', 'admin', NULL, NULL, 'active'),
(2, 'Áo thun', '2020-10-31', 'admin', NULL, NULL, 'active'),
(3, 'Ổ cứng', '2020-10-31', 'hailan', '2020-10-31', 'hailan', 'active'),
(4, 'Điện thoại', '2020-11-01', 'hailan', '2020-11-01', 'hailan', 'active'),
(5, 'Phòng', '2020-11-25', 'hailan', NULL, NULL, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL,
  `ordering` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `type_menu` varchar(255) NOT NULL,
  `type_open` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `_lft` int(11) NOT NULL,
  `_rgt` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `status`, `ordering`, `link`, `type_menu`, `type_open`, `position`, `parent_id`, `_lft`, `_rgt`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'Root', 'active', 0, '#', 'direct', 'direct', '', 0, 1, 26, '2020-11-24 15:57:38', 'admin', NULL, NULL),
(3, 'Trang chủ', 'active', 1, 'http://sanghuynh.zdemo.xyz/', 'direct', '_parent', 'header_menu', 1, 2, 3, '2020-11-24 00:00:00', 'hailan', '2020-12-03 00:00:00', 'hailan1'),
(4, 'Về chúng tôi', 'active', 2, 'http://sanghuynh.zdemo.xyz/ve-chung-toi', 'direct', '_blank', 'header_menu', 1, 4, 13, '2020-11-24 00:00:00', 'hailan', '2020-12-03 00:00:00', 'hailan1'),
(5, 'Phòng nghỉ', 'active', 3, 'http://sanghuynh.zdemo.xyz/phong-nghi', 'product', '_parent', 'header_menu', 1, 14, 15, '2020-11-24 00:00:00', 'hailan', '2020-12-09 00:00:00', 'hailan1'),
(6, 'Tin tức', 'active', 4, 'http://sanghuynh.zdemo.xyz/tin-tuc', 'article', '_parent', 'header_menu', 1, 16, 17, '2020-11-24 00:00:00', 'hailan', '2020-12-08 00:00:00', 'hailan1'),
(7, 'Liên hệ', 'active', 5, 'http://sanghuynh.zdemo.xyz/lien-he', 'direct', '_parent', 'header_menu', 1, 18, 19, '2020-11-24 00:00:00', 'hailan', '2020-12-04 00:00:00', 'hailan1'),
(8, 'Đặt phòng', 'inactive', 6, 'http://sanghuynh.zdemo.xyz/maintenance', 'direct', '_parent', 'header_menu', 1, 22, 23, '2020-11-24 00:00:00', 'hailan', '2020-12-03 00:00:00', 'hailan1'),
(9, 'Dịch vụ', 'active', 1, 'http://sanghuynh.zdemo.xyz/maintenance', 'direct', '_blank', 'header_menu', 4, 5, 8, '2020-11-24 00:00:00', 'hailan', '2020-12-03 00:00:00', 'hailan1'),
(10, 'Ưu đãi', 'active', 10, 'http://sanghuynh.zdemo.xyz/maintenance', 'direct', '_parent', 'header_menu', 1, 20, 21, '2020-12-07 00:00:00', 'hailan', '2020-12-09 00:00:00', 'hailan1'),
(11, 'Thư viện', 'active', 0, 'http://sanghuynh.zdemo.xyz/thu-vien', 'direct', '_parent', '', 4, 9, 10, '2020-12-15 00:00:00', 'hailan', '2020-12-15 00:00:00', 'hailan1'),
(13, 'FAQ', 'active', 0, 'http://sanghuynh.zdemo.xyz/faq', 'direct', '_parent', '', 4, 11, 12, '2020-12-15 00:00:00', 'hailan', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `thumb` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created` datetime DEFAULT NULL,
  `created_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `attribute` text,
  `meta` text,
  `group_attribute_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category_id`, `name`, `slug`, `content`, `status`, `thumb`, `created`, `created_by`, `modified`, `modified_by`, `price`, `attribute`, `meta`, `group_attribute_id`) VALUES
(18, 8, 'Deluxe Sky', 'deluxe-sky', '<p>Kh&ocirc;ng gian ph&ograve;ng được ưu &aacute;i ban c&ocirc;ng tho&aacute;ng m&aacute;t với hướng nh&igrave;n to&agrave;n cảnh ra biển gi&uacute;p t&acirc;m hồn bạn được vỗ về, an y&ecirc;n. Th&ecirc;m đ&oacute;, sự kết hợp h&agrave;i h&ograve;a giữa c&aacute;c gam m&agrave;u ghi, v&agrave;ng c&aacute;t c&ugrave;ng sắc xanh l&agrave;m tăng vẻ đẹp hiện đại, tinh tế m&agrave; nhẹ nh&agrave;ng, ấm &aacute;p cho kh&ocirc;ng gian nghỉ ngơi của bạn. Từ đ&oacute;, Deluxe King/ Twin Ocean gi&uacute;p bạn c&oacute; những trải nghiệm trọn vẹn tại Đ&agrave; Nẵng.</p>', 'active', '[{\"imageName\":\"5fc20f8ed8f4d_Deluxe-03.jpg\",\"imageAlt\":\"Deluxe 03\"},{\"imageName\":\"5fc20f8ed8f65_Deluxe-04.jpg\",\"imageAlt\":\"Deluxe 04\"},{\"imageName\":\"5fc20f8fa09de_Deluxe-06.jpg\",\"imageAlt\":\"Deluxe 05\"},{\"imageName\":\"5fc20f8fb04fb_Deluxe-05.jpg\",\"imageAlt\":\"Deluxe 06\"},{\"imageName\":\"5fc20f902a996_Deluxe-07.jpg\",\"imageAlt\":\"Deluxe 08\"},{\"imageName\":\"5fc662013c942_pexels-photo-237371.jpeg\",\"imageAlt\":\"deluxe 01\"},{\"imageName\":\"5fc662016a4c1_pexels-photo-5875843.jpeg\",\"imageAlt\":\"deluxe 02\"}]', '2020-11-22 00:00:00', 'hailan', '2020-12-01 00:00:00', 'hailan', 5600000, '[{\"name\":\"main\",\"value\":[\"S\\u1ed1 l\\u01b0\\u1ee3ng: 4 ng\\u01b0\\u1eddi\",\"Di\\u1ec7n t\\u00edch: 37m2\",\"H\\u01b0\\u1edbng nh\\u00ecn: m\\u1ed9t ph\\u1ea7n bi\\u1ec3n\",\"Lo\\u1ea1i gi\\u01b0\\u1eddng: Double v\\u00e0 twin\"]},{\"name\":\"special\",\"value\":[\"Gh\\u1ebf t\\u00ecnh y\\u00eau\",\"Free Wifi\",\"Truy\\u1ec1n H\\u00ecnh C\\u00e1p\"]},{\"name\":\"ph\\u00f2ng kh\\u00e1ch\",\"value\":[\"B\\u00e0n l\\u00e0m vi\\u1ec7c\",\"M\\u00e1y s\\u1ea5y t\\u00f3c\",\"B\\u00e0n \\u1ee6i\"]},{\"name\":\"nh\\u00e0 b\\u1ebfp\",\"value\":[\"T\\u1ee7 L\\u1ea1nh\",\"N\\u1ed3i ni\\u00eau xoong ch\\u1ea3o\",\"dao\"]},{\"name\":\"ban c\\u00f4ng\",\"value\":[\"b\\u00e0n gh\\u1ebf\",\"hoa\",\"kh\\u00f4ng kh\\u00ed trong l\\u00e0nh\"]},{\"name\":\"ph\\u00f2ng ng\\u1ee7\",\"value\":[\"tivi\",\"m\\u00e1y l\\u1ea1nh\",\"gh\\u1ebf t\\u00ecnh y\\u00eau\"]},{\"name\":\"ph\\u00f2ng t\\u1eafm\",\"value\":[\"v\\u00f2i sen\",\"b\\u1ed3n t\\u1eafm\",\"c\\u1ed5ng s\\u1ea1c \\u0111t\"]},{\"name\":\"ph\\u00f2ng \\u0103n\",\"value\":[\"ch\\u00e9n\",\"b\\u00e1t\",\"d\\u0129a\",\"\\u0111\\u0169a\",\"th\\u00eca\"]},{\"name\":\"service\",\"value\":[\"spa\",\"fitness\",\"qu\\u1ea7y bar\",\"nh\\u00e0 h\\u00e0ng\"]}]', '{\"title\":\"Ph\\u00f2ng Deluxe Sky\",\"description\":\"Ph\\u00f2ng Deluxe Sky d\\u1ecbch v\\u1ee5 \\u0111\\u1eb3ng c\\u1ea5p, mang \\u0111\\u1ebfn s\\u1ef1 th\\u01b0 gi\\u00e3n cho kh\\u00e1ch h\\u00e0ng, b\\u1ed3n t\\u1eafm r\\u1ed9ng 35 m2\",\"keyword\":[\"Vip 1\",\"Vip 2\",\"President new suite\"]}', 5),
(20, 5, 'Family', 'family', '<p>Kh&ocirc;ng gian ấm c&uacute;ng được thiết kế đơn giản nhưng tinh tế v&agrave; tiện &iacute;ch đầy đủ th&iacute;ch hợp cho cả gia đ&igrave;nh bạn trong chuyến nghỉ dưỡng đến Đ&agrave; Nẵng.</p>', 'active', '[{\"imageName\":\"5fc66094cc5f6_pexels-photo-26139.jpg\",\"imageAlt\":\"family 03\"},{\"imageName\":\"5fc6609509bfa_pexels-photo-189333.jpeg\",\"imageAlt\":\"family 04\"},{\"imageName\":\"5fc66095827d8_pexels-photo-262047.jpeg\",\"imageAlt\":\"family 05\"},{\"imageName\":\"5fc66095b488c_pexels-photo-271618.jpeg\",\"imageAlt\":\"family 06\"},{\"imageName\":\"5fc6609639ec5_pexels-photo-594077.jpeg\",\"imageAlt\":\"family 07\"},{\"imageName\":\"5fc661b7cdc5c_pexels-photo-189333.jpeg\",\"imageAlt\":\"family 01\"},{\"imageName\":\"5fc661b83d299_pexels-photo-460537.jpeg\",\"imageAlt\":\"family 02\"}]', '2020-11-22 00:00:00', 'hailan', '2020-12-01 00:00:00', 'hailan', 4800000, '[{\"name\":\"main\",\"value\":[\"S\\u1ed1 l\\u01b0\\u1ee3ng: 2 ng\\u01b0\\u1eddi l\\u1edbn, 2 tr\\u1ebb em\",\"Di\\u1ec7n t\\u00edch: 35m2\",\"H\\u01b0\\u1edbng nh\\u00ecn: th\\u00e0nh ph\\u1ed1\",\"Lo\\u1ea1i gi\\u01b0\\u1eddng: Double\"]},{\"name\":\"special\",\"value\":[\"free buffet\",\"spa\",\"gym\"]},{\"name\":\"ph\\u00f2ng kh\\u00e1ch\",\"value\":[\"B\\u00e0n L\\u00e0m vi\\u1ec7c\",\"tivi\",\"t\\u1ee7 l\\u1ea1nh\"]},{\"name\":\"nh\\u00e0 b\\u1ebfp\",\"value\":[\"t\\u1ee7 l\\u1ea1nh\",\"n\\u1ed3i ni\\u00eau xoong ch\\u1ea3o\",\"d\\u1ea7u \\u0103n\"]},{\"name\":\"ban c\\u00f4ng\",\"value\":[\"b\\u00e0n gh\\u1ebf\",\"hoa\",\"kh\\u00f4ng kh\\u00ed\"]},{\"name\":\"ph\\u00f2ng ng\\u1ee7\",\"value\":[\"tivi\",\"m\\u00e1y l\\u1ea1nh\",\"t\\u1ee7 l\\u1ea1nh\",\"m\\u00e1y s\\u1ea5y t\\u00f3c\"]},{\"name\":\"ph\\u00f2ng t\\u1eafm\",\"value\":[\"pc\",\"laptop\",\"c\\u1ed5ng s\\u1ea1c \\u0111t\"]},{\"name\":\"ph\\u00f2ng \\u0103n\",\"value\":[\"\\u0111\\u1ed3 \\u0103n\",\"\\u0111\\u1ed3 u\\u1ed1ng\"]},{\"name\":\"service\",\"value\":[\"spa\",\"fitness\",\"qu\\u1ea7y bar\",\"nh\\u00e0 h\\u00e0ng\"]}]', '{\"title\":\"Ph\\u00f2ng President\",\"description\":\"Ph\\u00f2ng President d\\u1ecbch v\\u1ee5 \\u0111\\u1eb3ng c\\u1ea5p, mang \\u0111\\u1ebfn s\\u1ef1 th\\u01b0 gi\\u00e3n cho kh\\u00e1ch h\\u00e0ng\",\"keyword\":[\"Vip 1\",\"Vip 2\",\"President new suite\"]}', 5),
(21, 2, 'Superior', 'superior', '<p>Lấy cảm hứng từ lối sống tối giản, c&aacute;c kh&ocirc;ng gian tại Sel de Mer Hotel &amp; Suites được thiết kế tinh tế với c&aacute;c gam m&agrave;u dịu nhẹ kết hợp &aacute;nh s&aacute;ng tự nhi&ecirc;n tạo cảm gi&aacute;c khoan kho&aacute;i v&agrave; thoải m&aacute;i gi&uacute;p bạn nghỉ ngơi trọn vẹn. Đặc biệt hơn, ban c&ocirc;ng lộng gi&oacute; với hướng nh&igrave;n to&agrave;n cảnh th&agrave;nh phố hay biển xanh thơ mộng tại ph&ograve;ng Superior sẽ khiến bạn m&ecirc; đắm ngay lần &ldquo;gặp&rdquo; đầu ti&ecirc;n!</p>', 'active', '[{\"imageName\":\"5fc65ed1618e6_pexels-photo-271618.jpeg\",\"imageAlt\":\"Superior 2\"},{\"imageName\":\"5fc65ed2129d9_pexels-photo-1134176.jpeg\",\"imageAlt\":\"Superior 4\"},{\"imageName\":\"5fc65ed28c474_pexels-photo-1579253.jpeg\",\"imageAlt\":\"Superior 5\"},{\"imageName\":\"5fc662c5a2f2e_pexels-photo-237371.jpeg\",\"imageAlt\":\"Superior 6\"},{\"imageName\":\"5fc662c5da32c_pexels-photo-2598638.jpeg\",\"imageAlt\":\"Superior 7\"},{\"imageName\":\"5fc662c65aebe_pexels-photo-3144580.jpeg\",\"imageAlt\":\"Superior 8\"},{\"imageName\":\"5fc662c68ddae_pexels-photo-3634741.jpeg\",\"imageAlt\":\"Superior 9\"},{\"imageName\":\"5fc662c7168a8_pexels-photo-5875843.jpeg\",\"imageAlt\":\"Superior 10\"}]', '2020-11-22 00:00:00', 'hailan', '2020-12-01 00:00:00', 'hailan', 2300000, '[{\"name\":\"main\",\"value\":[\"S\\u1ed1 l\\u01b0\\u1ee3ng: 2 ng\\u01b0\\u1eddi l\\u1edbn, 2 tr\\u1ebb em\",\"Di\\u1ec7n t\\u00edch: 29m\\u00b2\",\"H\\u01b0\\u1edbng nh\\u00ecn: tr\\u1ef1c di\\u1ec7n bi\\u1ec3n\",\"Lo\\u1ea1i gi\\u01b0\\u1eddng: Double\"]},{\"name\":\"special\",\"value\":[\"Gh\\u1ebf t\\u00ecnh y\\u00eau\",\"spa\",\"massage\",\"karaoke\"]},{\"name\":\"ph\\u00f2ng kh\\u00e1ch\",\"value\":[\"m\\u00e1y qu\\u1ea1t\",\"tivi\",\"t\\u1ee7 l\\u1ea1nh\"]},{\"name\":\"nh\\u00e0 b\\u1ebfp\",\"value\":[\"b\\u1ebfp ga\",\"t\\u1ee7 l\\u1ea1nh\",\"l\\u00f2 n\\u01b0\\u1edbng\"]},{\"name\":\"ban c\\u00f4ng\",\"value\":[\"b\\u00e0n gh\\u1ebf\",\"hoa\",\"kh\\u00f4ng kh\\u00ed trong l\\u00e0nh\"]},{\"name\":\"ph\\u00f2ng ng\\u1ee7\",\"value\":[\"m\\u00e1y l\\u1ea1nh\",\"free wifi\",\"tivi truy\\u1ec1n h\\u00ecnh c\\u00e1p\"]},{\"name\":\"ph\\u00f2ng t\\u1eafm\",\"value\":[\"b\\u1ed3n r\\u1eeda m\\u1eb7t\",\"b\\u1ed3n t\\u1eafm\"]},{\"name\":\"ph\\u00f2ng \\u0103n\",\"value\":[\"\\u0111\\u1ed3 \\u0103n\",\"n\\u01b0\\u1edbc u\\u1ed1ng\"]},{\"name\":\"service\",\"value\":[\"spa\",\"fitness\",\"qu\\u1ea7y bar\",\"nh\\u00e0 h\\u00e0ng\"]}]', '{\"title\":\"Ph\\u00f2ng President\",\"description\":\"Ph\\u00f2ng President d\\u1ecbch v\\u1ee5 \\u0111\\u1eb3ng c\\u1ea5p, mang \\u0111\\u1ebfn s\\u1ef1 th\\u01b0 gi\\u00e3n cho kh\\u00e1ch h\\u00e0ng\",\"keyword\":[\"Vip 1\",\"Vip 2\",\"President new suite\"]}', 5),
(23, 6, 'Junior Suite', 'junior-suite', '<p>Junior Suite King Ocean mang lại cho bạn trải nghiệm v&ocirc; c&ugrave;ng thoải m&aacute;i, thư gi&atilde;n. Kh&ocirc;ng gian ph&ograve;ng ngủ được kết nối th&ocirc;ng minh với ph&ograve;ng kh&aacute;ch, thật tiện lợi để bạn vừa nghỉ ngơi vừa xử l&yacute; c&ocirc;ng việc hay đ&oacute;n tiếp kh&aacute;ch gh&eacute; thăm trong thời gian nghỉ dưỡng. Hướng nh&igrave;n từ ban c&ocirc;ng ra b&aacute;n đảo Sơn Tr&agrave; xanh m&aacute;t v&agrave; mộng mơ gi&uacute;p tăng th&ecirc;m b&igrave;nh y&ecirc;n cho chuyến đi của bạn</p>', 'active', '[{\"imageName\":\"5fc65d66e9994_pexels-photo-261102.jpeg\",\"imageAlt\":\"junor 02\"},{\"imageName\":\"5fc65d6672a08_pexels-photo-189296.jpeg\",\"imageAlt\":\"junor 01\"},{\"imageName\":\"5fc65d6729d19_pexels-photo-271624.jpeg\",\"imageAlt\":\"junor 03\"},{\"imageName\":\"5fc65d67a62f9_pexels-photo-338504.jpeg\",\"imageAlt\":\"junior 04\"},{\"imageName\":\"5fc8c909aea15_president-01.jpg\",\"imageAlt\":\"junior 05\"},{\"imageName\":\"5fc8c909aea3a_president-03.jpg\",\"imageAlt\":\"junior 06\"},{\"imageName\":\"5fc8c90a295cb_president-02.jpg\",\"imageAlt\":\"junior 07\"}]', '2020-11-25 00:00:00', 'hailan', '2020-12-16 00:00:00', 'admin123', 3400000, '[{\"name\":\"main\",\"value\":[\"S\\u1ed1 l\\u01b0\\u1ee3ng: 4 ng\\u01b0\\u1eddi\",\"Di\\u1ec7n t\\u00edch: 68m2\",\"H\\u01b0\\u1eddng nh\\u00ecn: ra bi\\u1ec3n\",\"Lo\\u1ea1i Gi\\u01b0\\u1eddng: Double or Twin\"]},{\"name\":\"special\",\"value\":[\"free buffet s\\u00e1ng\",\"free wifi\",\"m\\u00e1y l\\u1ea1nh\"]},{\"name\":\"ph\\u00f2ng kh\\u00e1ch\",\"value\":[\"B\\u00e0n \\u1ee7i\",\"m\\u00e1y s\\u1ea5y t\\u00f3c\",\"b\\u00e0n l\\u00e0\"]},{\"name\":\"nh\\u00e0 b\\u1ebfp\",\"value\":[\"dao\",\"t\\u1ee7 l\\u1ea1nh\",\"b\\u1ebfp ga\"]},{\"name\":\"ban c\\u00f4ng\",\"value\":[\"b\\u00e0n gh\\u1ebf\",\"hoa\",\"kh\\u00f4ng kh\\u00ed trong l\\u00e0nh\"]},{\"name\":\"ph\\u00f2ng ng\\u1ee7\",\"value\":[\"tivi\",\"m\\u00e1y l\\u1ea1nh\",\"m\\u00e1y gi\\u1eb7t\"]},{\"name\":\"ph\\u00f2ng t\\u1eafm\",\"value\":[\"c\\u1ed5ng s\\u1ea1c \\u0111t\",\"b\\u1ed3n t\\u1eafm\",\"b\\u1ed3n r\\u1eeda m\\u1eb7t\"]},{\"name\":\"ph\\u00f2ng \\u0103n\",\"value\":[\"ch\\u00e9n\",\"b\\u00e1t\",\"\\u0111\\u0169a\"]},{\"name\":\"service\",\"value\":[\"spa\",\"fitness\",\"qu\\u1ea7y bar\",\"nh\\u00e0 h\\u00e0ng\"]}]', '{\"title\":\"Ph\\u00f2ng President\",\"description\":\"Ph\\u00f2ng President d\\u1ecbch v\\u1ee5 \\u0111\\u1eb3ng c\\u1ea5p, mang \\u0111\\u1ebfn s\\u1ef1 th\\u01b0 gi\\u00e3n cho kh\\u00e1ch h\\u00e0ng\",\"keyword\":[\"Vip 1\",\"Vip 2\",\"President new suite\"]}', 5),
(24, 7, 'Executive Suite', 'executive-suite', '<p>Nằm tr&ecirc;n tầng 28, với diện t&iacute;ch 136 m2, ph&ograve;ng Executive Suite của kh&aacute;ch sạn Sky Luxury Hotel &amp; Resort l&agrave; lựa chọn ho&agrave;n hảo để du kh&aacute;ch c&oacute; thể trải nghiệm c&aacute;c tiện nghi v&agrave; thiết bị cao cấp với nội thất d&aacute;t v&agrave;ng. Ph&ograve;ng Tổng Thống được trang tr&iacute; bởi gam m&agrave;u v&agrave;ng đồng, t&iacute;m v&agrave; be, điểm xuyến bằng c&aacute;c họa tiết trang tr&iacute; phương Đ&ocirc;ng. Khu vực ph&ograve;ng kh&aacute;ch được nối với ph&ograve;ng ăn d&agrave;nh cho 6 người, ph&ugrave; hợp cho những buổi tiệc ri&ecirc;ng tư v&agrave; th&acirc;n mật</p>', 'active', '[{\"imageName\":\"5fc65be81cf7c_pexels-photo-164595.jpeg\",\"imageAlt\":\"Executive suite 1\"},{\"imageName\":\"5fbdf19e56733_executive-suite-02.jpg\",\"imageAlt\":\"Executive suite 2\"},{\"imageName\":\"5fbdf1993ff1c_executive-suite-01.jpg\",\"imageAlt\":\"Executive suite 3\"},{\"imageName\":\"5fc65be85bd18_pexels-photo-258154.jpeg\",\"imageAlt\":\"Executive suite 4\"},{\"imageName\":\"5fc65be8e6dfa_pexels-photo-573552.jpeg\",\"imageAlt\":\"Executive suite 5\"},{\"imageName\":\"5fc65be926a7f_pexels-photo-271639.jpeg\",\"imageAlt\":\"Executive suite 6\"},{\"imageName\":\"5fc65be99e318_pexels-photo-2034335.jpeg\",\"imageAlt\":\"Executive suite 7\"}]', '2020-11-25 00:00:00', 'hailan', '2020-12-09 00:00:00', 'hailan', 4200000, '[{\"name\":\"main\",\"value\":[\"S\\u1ed1 l\\u01b0\\u1ee3ng: 4 ng\\u01b0\\u1eddi\",\"Di\\u1ec7n t\\u00edch: 108m2\",\"H\\u01b0\\u1edbng nh\\u00ecn: Tr\\u1ef1c di\\u1ec7n bi\\u1ec3n\",\"Lo\\u1ea1i Gi\\u01b0\\u1eddng: Double\"]},{\"name\":\"special\",\"value\":[\"fitness\",\"h\\u1ed3 b\\u01a1i\",\"gi\\u1eb7t \\u1ee7i\"]},{\"name\":\"ph\\u00f2ng kh\\u00e1ch\",\"value\":[\"b\\u00e0n l\\u00e0\",\"m\\u00e1y fax\",\"laptop\"]},{\"name\":\"nh\\u00e0 b\\u1ebfp\",\"value\":[\"b\\u1ebfp ga\",\"t\\u1ee7 l\\u1ea1nh\",\"microwave\"]},{\"name\":\"ban c\\u00f4ng\",\"value\":[\"b\\u00e0n gh\\u1ebf\",\"hoa\",\"kh\\u00f4ng kh\\u00ed trong l\\u00e0nh\"]},{\"name\":\"ph\\u00f2ng ng\\u1ee7\",\"value\":[\"gh\\u1ebf t\\u00ecnh y\\u00eau\",\"tivi\",\"t\\u1ee7 l\\u1ea1nh\"]},{\"name\":\"ph\\u00f2ng t\\u1eafm\",\"value\":[\"v\\u00f2i sen\",\"b\\u1ed3n t\\u1eafm\",\"m\\u00e1y n\\u01b0\\u1edbc n\\u00f3ng\"]},{\"name\":\"ph\\u00f2ng \\u0103n\",\"value\":[\"\\u0111\\u1ed3 \\u0103n\",\"ch\\u00e9n\",\"b\\u00e1t\"]},{\"name\":\"service\",\"value\":[\"spa\",\"fitness\",\"qu\\u1ea7y bar\",\"nh\\u00e0 h\\u00e0ng\"]}]', '{\"title\":\"Ph\\u00f2ng President\",\"description\":\"Ph\\u00f2ng President d\\u1ecbch v\\u1ee5 \\u0111\\u1eb3ng c\\u1ea5p, mang \\u0111\\u1ebfn s\\u1ef1 th\\u01b0 gi\\u00e3n cho kh\\u00e1ch h\\u00e0ng\",\"keyword\":[\"D\\u1ecbch v\\u1ee5 \\u0111\\u1eb3ng c\\u1ea5p\",\"Ph\\u00f2ng President b\\u1ed3n t\\u1eafm\"]}', 5),
(25, 4, 'President Suite', 'president-suite', '<p>Nằm tr&ecirc;n tầng 28, với diện t&iacute;ch 136 m2, ph&ograve;ng Executive Suite của kh&aacute;ch sạn Sky Luxury Hotel &amp; Resort l&agrave; lựa chọn ho&agrave;n hảo để du kh&aacute;ch c&oacute; thể trải nghiệm c&aacute;c tiện nghi v&agrave; thiết bị cao cấp với nội thất d&aacute;t v&agrave;ng. Ph&ograve;ng Tổng Thống được trang tr&iacute; bởi gam m&agrave;u v&agrave;ng đồng, t&iacute;m v&agrave; be, điểm xuyến bằng c&aacute;c họa tiết trang tr&iacute; phương Đ&ocirc;ng. Khu vực ph&ograve;ng kh&aacute;ch được nối với ph&ograve;ng ăn d&agrave;nh cho 6 người, ph&ugrave; hợp cho những buổi tiệc ri&ecirc;ng tư v&agrave; th&acirc;n mật</p>', 'active', '[{\"imageName\":\"5fbdf1993ff1c_executive-suite-01.jpg\",\"imageAlt\":\"Executive suite 1\"},{\"imageName\":\"5fbdf19e56733_executive-suite-02.jpg\",\"imageAlt\":\"Executive suite 2\"},{\"imageName\":\"5fc65be81cf7c_pexels-photo-164595.jpeg\",\"imageAlt\":\"Executive suite 3\"},{\"imageName\":\"5fc65be85bd18_pexels-photo-258154.jpeg\",\"imageAlt\":\"Executive suite 4\"},{\"imageName\":\"5fc65be8e6dfa_pexels-photo-573552.jpeg\",\"imageAlt\":\"Executive suite 5\"},{\"imageName\":\"5fc65be926a7f_pexels-photo-271639.jpeg\",\"imageAlt\":\"Executive suite 6\"},{\"imageName\":\"5fc65be99e318_pexels-photo-2034335.jpeg\",\"imageAlt\":\"Executive suite 7\"}]', '2020-11-25 00:00:00', 'hailan', '2020-12-16 00:00:00', 'admin123', 6200000, '[{\"name\":\"main\",\"value\":[\"S\\u1ed1 l\\u01b0\\u1ee3ng: 4 ng\\u01b0\\u1eddi\",\"Di\\u1ec7n t\\u00edch: 108m2\",\"H\\u01b0\\u1edbng nh\\u00ecn: Tr\\u1ef1c di\\u1ec7n bi\\u1ec3n\",\"Lo\\u1ea1i Gi\\u01b0\\u1eddng: Double\"]},{\"name\":\"special\",\"value\":[\"fitness\",\"h\\u1ed3 b\\u01a1i\",\"gi\\u1eb7t \\u1ee7i\"]},{\"name\":\"ph\\u00f2ng kh\\u00e1ch\",\"value\":[\"b\\u00e0n l\\u00e0\",\"m\\u00e1y fax\",\"laptop\"]},{\"name\":\"nh\\u00e0 b\\u1ebfp\",\"value\":[\"b\\u1ebfp ga\",\"t\\u1ee7 l\\u1ea1nh\",\"microwave\"]},{\"name\":\"ban c\\u00f4ng\",\"value\":[\"b\\u00e0n gh\\u1ebf\",\"hoa\",\"kh\\u00f4ng kh\\u00ed trong l\\u00e0nh\"]},{\"name\":\"ph\\u00f2ng ng\\u1ee7\",\"value\":[\"gh\\u1ebf t\\u00ecnh y\\u00eau\",\"tivi\",\"t\\u1ee7 l\\u1ea1nh\"]},{\"name\":\"ph\\u00f2ng t\\u1eafm\",\"value\":[\"v\\u00f2i sen\",\"b\\u1ed3n t\\u1eafm\",\"m\\u00e1y n\\u01b0\\u1edbc n\\u00f3ng\"]},{\"name\":\"ph\\u00f2ng \\u0103n\",\"value\":[\"\\u0111\\u1ed3 \\u0103n\",\"ch\\u00e9n\",\"b\\u00e1t\"]},{\"name\":\"service\",\"value\":[\"spa\",\"fitness\",\"qu\\u1ea7y bar\",\"nh\\u00e0 h\\u00e0ng\"]}]', '{\"title\":\"Ph\\u00f2ng President\",\"description\":\"Ph\\u00f2ng President d\\u1ecbch v\\u1ee5 \\u0111\\u1eb3ng c\\u1ea5p, mang \\u0111\\u1ebfn s\\u1ef1 th\\u01b0 gi\\u00e3n cho kh\\u00e1ch h\\u00e0ng\",\"keyword\":[\"Ph\\u00f2ng President\",\"D\\u1ecbch v\\u1ee5 \\u0111\\u1eb3ng c\\u1ea5p\"]}', 5);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `room_name` varchar(255) NOT NULL,
  `price` int(10) NOT NULL,
  `coupon` varchar(255) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `note` text,
  `created` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `code`, `fullname`, `email`, `phone`, `check_in`, `check_out`, `room_name`, `price`, `coupon`, `status`, `note`, `created`, `created_by`, `modified`, `modified_by`, `room_id`) VALUES
(5, 'anst', 'nguyen dinh duy', 'dinhduy@gmail.com', '0123456789', '2020-12-04', '2020-12-08', 'Executive Suite', 5600000, NULL, 'checkin', NULL, '2020-12-02 16:35:43', NULL, NULL, NULL, 24),
(6, 'qwey', 'huynh minh sang', 'sanghm@gmail.com', '0123456798', '2020-11-28', '2020-11-30', 'Family', 5600000, NULL, 'cancel', NULL, '2020-11-04 18:40:34', NULL, NULL, NULL, 20),
(7, 'aduwkab', 'luu truong hai lan', 'lanlth@gmail.com', '0123456769', '2020-12-10', '2020-12-12', 'Executive Suite', 3400000, NULL, 'booked', NULL, '2020-12-03 18:42:47', NULL, NULL, NULL, 24),
(29, 'tv8FjOBfw6', 'Nguyễn Bùi Hoài Bảo', 'huynhminhsangcntp@gmail.com', '0362302030', '2020-12-15', '2020-12-19', 'Deluxe Sky', 5600000, NULL, 'confirm', 'Đặt 1 chỗ đẹp nhất', '2020-12-05 16:35:58', NULL, NULL, NULL, 18),
(28, '6zvnz8jXlc', 'Huỳnh Minh Sang', 'huynhminhsangcntp@gmail.com', '0362302030', '2020-12-15', '2020-12-18', 'Superior', 2300000, NULL, 'checkin', 'Huỳnh Minh Sang', '2020-12-04 23:44:45', NULL, NULL, NULL, 21),
(30, 'WylWMSJpQx', 'Lê Thanh Hải', 'admin@gmail.com', '0798121502', '2020-12-15', '2020-12-23', ' Family', 4800000, NULL, 'booked', NULL, '2020-12-05 21:44:29', NULL, NULL, NULL, 20),
(31, 'BxPxZFbP1S', 'Phan Kim Ngọc', 'huynhminhsangcntp@gmail.com', '0362302030', '2020-12-17', '2020-12-28', 'Deluxe Sky', 5600000, NULL, 'booked', 'Phan Kim NgọcPhan Kim NgọcPhan Kim NgọcPhan Kim Ngọc', '2020-12-05 23:08:13', NULL, NULL, NULL, 18),
(21, '8ad4wa51', 'Lê Thanh Hải', 'thanhhai3295@gmail.com', '0798121502', '2020-12-02', '2020-12-10', 'Deluxe Sky', 5600000, NULL, 'booked', NULL, '2020-12-04 22:43:14', '(NULL)', NULL, NULL, 18),
(33, 'l7iWOP61xh', 'Lê Thanh Hải', 'thanhhai3295@gmail.com', '1223456789', '2021-01-09', '2021-01-10', 'Deluxe Sky', 5600000, NULL, 'booked', 'abcdefghjkl', '2020-12-07 17:48:17', NULL, NULL, NULL, 18),
(36, 'Jv1zCrLrf7', 'aaa aaa', 'admin@gmail.com', '12345678', '2020-12-22', '2020-12-23', 'President Suite', 5600000, NULL, 'booked', NULL, '2020-12-08 02:06:10', NULL, NULL, NULL, 25),
(35, 'T54dHhT8qN', 'Nguyễn Đình Duy', 'huynhminhsangcntp@gmail.com', '0362302030', '2020-12-15', '2020-12-19', 'President Suite', 5600000, NULL, 'booked', 'Nguyễn Đình DuyNguyễn Đình DuyNguyễn Đình DuyNguyễn Đình Duy', '2020-12-07 21:02:46', NULL, NULL, NULL, 25),
(37, 'LuuOH2vlNn', 'abc', 'huynhminhsangcntp@gmail.com', '0123456789', '2020-12-25', '2020-12-28', 'Executive Suite', 12600000, NULL, 'booked', NULL, '2020-12-16 09:49:57', NULL, NULL, NULL, 24),
(38, 'uzKy5G70sA', 'abc', 'huynhminhsangit@gmail.com', '0123456789', '2020-12-16', '2020-12-17', 'Deluxe Sky', 5600000, NULL, 'booked', NULL, '2020-12-16 20:44:56', NULL, NULL, NULL, 18),
(39, '1K0qyIZfwY', 'abc', 'huynhminhsangit@gmail.com', '0123456789', '2020-12-16', '2020-12-17', 'Deluxe Sky', 5600000, NULL, 'booked', NULL, '2020-12-16 20:45:08', NULL, NULL, NULL, 18),
(40, 'j61fOFXDUI', 'abc', 'huynhminhsangit@gmail.com', '0123456789', '2020-12-16', '2020-12-17', 'Deluxe Sky', 5600000, NULL, 'booked', NULL, '2020-12-16 20:45:08', NULL, NULL, NULL, 18),
(41, 'VQwYteQUZ4', 'abc', 'huynhminhsangit@gmail.com', '0123456789', '2020-12-16', '2020-12-17', 'Deluxe Sky', 5600000, NULL, 'booked', NULL, '2020-12-16 20:45:08', NULL, NULL, NULL, 18),
(42, 'SI46E8hwqc', 'abc', 'huynhminhsangit@gmail.com', '0123456789', '2020-12-16', '2020-12-17', 'Deluxe Sky', 5600000, NULL, 'booked', NULL, '2020-12-16 20:45:08', NULL, NULL, NULL, 18),
(43, 'AFS0Ww9IpN', 'abc', 'huynhminhsangit@gmail.com', '0123456789', '2020-12-16', '2020-12-17', 'Deluxe Sky', 5600000, NULL, 'booked', NULL, '2020-12-16 20:45:09', NULL, NULL, NULL, 24);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ordering` int(11) DEFAULT NULL,
  `star` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `thumb` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `name`, `content`, `status`, `ordering`, `star`, `created`, `created_by`, `modified`, `modified_by`, `product_id`, `thumb`) VALUES
(1, 'thao n', 'Khách sạn đẹp không gian thoáng mát gần trung tâm đi lại thuận tiện. Đồ ăn sáng ngon. Dịch vụ tốt, nhân viên thân thiện. Phòng sạch sẽ đầy đủ tiện nghi. Nếu có dịp sẽ quay lại khách sạn. Cảm ơn khách sạn', 'active', NULL, 5, '2020-11-20 00:00:00', 'hailan', '2020-12-08 00:00:00', 'hailan', 18, 'HVH3anGgKG.png'),
(2, 'Mr Luan', 'Tôi đã ở lại hotel này nhiều lần và và tôi chắc chắn rằng đã dịch vụ ở đây tốt hơn nhiều so với các khách sạn khác ở TP Đà nẵng\r\nCác bữa ăn sáng buffet và các bữa trưa,tối rất ngon và đa dạng. Nhân viên phục vụ rất nhiệt tình,chu đáo,chuyên nghiệp..Phòng rộng rãi và thoải mái,thoáng mát.Có khuôn viên đi bộ và sân đánh Gofl thật đẹp\r\nTôi cảm ơn các bạn,Hẹn gặp các bạn 1 ngày gần nhất.', 'active', NULL, 5, '2020-11-25 00:00:00', 'hailan', '2020-12-08 00:00:00', 'hailan', 18, 't2ehlXYR03.png'),
(3, 'trâm trần', 'cứ mỗi dịp hè là tôi cùng gia đình mình thường đi nghỉ mát cùng nhau, và đà nẵng là nơi lí tưởng mà chúng tôi chọn. Wiss belresort là nơi tôi chọn là điểm dừng chân, thật không thất vọng, quá đẹp nằm giữa thung lũng được bao quanh bởi rừng thông có sân golf, và có xe đưa đón bạn ra trung tâm. Tuy nhiên thực đơn sáng có vẻ hơi đơn điệu, không sao chúng tôi vẫn sẽ quay lại', 'active', NULL, 5, '2020-11-25 00:00:00', 'hailan', '2020-12-11 00:00:00', 'hailan', 18, '02uWsXpfeR.png'),
(4, 'chinhiz', 'Không có hạt sạn nào dù là nhỏ nhất tìm thấy ở các bạn . Sự chu đáo , nhiệt tình và thân thiện như những người thân trong gia đình mang đến một kỳ nghỉ hoàn hảo cho gia đình nhỏ của tôi . Cơ sở vật chất rất tốt , bãi biển đẹp ,view biển từ phòng nghỉ rất thơ mộng . Ăn sáng với phong cách và chất lượng đỉnh cao , nhà hàng Sea Fire Salt rất độc đáo và chu đáo . Cảm ơn các bạn về tất cả', 'active', NULL, 5, '2020-12-08 00:00:00', 'hailan', '2020-12-11 00:00:00', 'hailan', 18, 'sVJA6PohLA.png'),
(5, 'vietcanh89', 'Đây là kỳ nghỉ đầu tiên của gia đình chúng tôi.\r\nKhi mới đến cảm giác thật thoải mái dễ chịu, mặc dù khi nhận phòng có 1 vài điểm nhỏ khiến tôi không hài lòng nhưng thật sự sự tiện nghi, dịch vụ rất tốt.', 'active', NULL, 5, '2020-12-08 00:00:00', 'hailan', NULL, NULL, 18, 'S4Oa4Pgims.png'),
(6, 'kimyen2019', 'nếu cuộc sống của bạn quá nhiều thứ để lo nghĩ, sao không buông hết mà đến đây một lần, tôi bảo đảm sự phục vụ tận tình chu đáo cộng thêm điểm nghỉ dưỡng đẹp hút hồn thì mọi ưu phiền nhọc nhằn của bạn sẽ được tan biến, chúng tôi đã đến nơi này và chúng tôi sẽ quay lại sớm nhất, chúng tôi đánh giá trên mức độ hài lòng cho tổng thể con người và điểm đến nơi đây', 'active', NULL, 3, '2020-12-08 00:00:00', 'hailan', NULL, NULL, 20, 'Gt8KIsIfiX.png'),
(7, 'Duc_trinh', 'Gia đình tôi có kỳ nghỉ tại Anantara 2 bedroom villa.\r\nTrong thời gian này có khá nhiều vấn đề xảy ra tuy nhiên đã được các bạn nhân viên hỗ trợ xử lý.\r\nTuy là resort nhưng sự riêng tư gần như là không có. Hạng phòng cao cấp nhất cần có sự riêng tư, tuy nhiên nhân viên và khách lưu trú tự do đi qua khu vực phòng của bạn. Điều này làm tôi khá bất ngờ khi một resort lại có thiết kế thiếu cẩn trọng như vậy.\r\nDù sao đây cũng là khu nghỉ dưỡng hàng đầu tại Quy nhơn đã khiến tôi thất vọng đặc biệt là một thương hiệu Quốc tế', 'active', NULL, 4, '2020-12-08 00:00:00', 'hailan', NULL, NULL, 20, 'fEj5RddGVy.png'),
(8, 'Alolove Nguyễn', 'Không gian hoang sơ, biển vắng và đồ ăn đảm bảo chất lượng. Đến Quy Nhơn nếu du khách muốn tránh xa sự xô bồ của thành thị, hãy tìm cảm giác yên bình với biển cả tại đây. Người dân ở đây hiếu khách, bãi biển tắm ưa thích của du khách nước ngoài', 'active', NULL, 3, '2020-12-08 00:00:00', 'hailan', NULL, NULL, 20, 'k1EZuVXid9.png'),
(9, 'steverichhudd', 'Một sự chào đón rất thân thiện sau một hành trình dài. Một căn phòng rộng rãi đáng yêu. Giường rất thoải mái. WiFi tốt. Nơi yên tĩnh, trên bãi biển phía trước. Họ đang xây dựng một phần mở rộng bên cạnh, có nghĩa là một số tiếng ồn vào sáng sớm (07:30 sáng). Bữa sáng bao gồm phục vụ ở cửa bên cạnh Big Tree Bistro rất ngon. Yêu những chiếc bánh chuối! ! !', 'active', NULL, 4, '2020-12-08 00:00:00', 'hailan', NULL, NULL, 20, '4oMMFTwxs4.png'),
(10, 'Quyenvie', 'Tôi ở lại Sky Luxury Hotel & Resort Quy Nhơn 5 năm trước, và lần này tôi trở lại nơi này để thư giãn sau cuộc chạy marathon nửa vòng của tôi trong thành phố. Tôi đã có một thời gian phục hồi tuyệt vời ở đó. Tôi ở trong phòng số 4. Căn phòng đơn giản nhưng ấm cúng và thoải mái. Tôi yêu khung cảnh từ căn phòng - đại dương xanh, cây dừa và hoa giấy màu hồng. Nơi này có lò nướng pizza bằng gỗ phục vụ bánh pizza ngon. Và chắc chắn, nơi này là một nơi đặc biệt để ngắm cả bình minh và hoàng hôn tuyệt đẹp.', 'active', NULL, 5, '2020-12-08 00:00:00', 'hailan', NULL, NULL, 20, 'vFf57fouGb.png'),
(11, 'HayesNZ', 'Đây là một nơi tuyệt vời để ở. Thật giản dị và thoải mái - tuy nhiên đừng ở đây nếu bạn muốn nuông chiều 5 sao. các nhân viên rất thân thiện và nhiệt tình. Bầu không khí thân thiện giữa mọi người như mong đợi ngay trên bãi biển.\r\n\r\nNhà hàng có một thực đơn RẤT đẹp và thức ăn tuyệt vời. Không phải giá địa phương siêu rẻ nhưng giá trị rất tốt cho tiền. Mỗi đêm có những người bán hàng địa phương thiết lập quầy hàng hải sản và đồ nướng, và giá cả hợp lý.\r\n\r\nChúng tôi ở lại 3 đêm và ước chúng tôi có thể ở lại lâu hơn. Đó là một nơi tuyệt đẹp để ở.', 'active', NULL, 5, '2020-12-08 00:00:00', 'hailan', NULL, NULL, 25, 'jW5Pqx7Sog.png'),
(12, 'PhilTritton', 'Đây là một nơi tuyệt vời ngay trên một bãi biển cát đáng yêu. Các nhân viên đều rất hữu ích, hiệu quả và thân thiện. Nhà hàng Big Tree của họ là một nơi tuyệt vời để ăn sáng và ăn tối nhìn ra bãi biển, đặc biệt là vào buổi chiều muộn khi những đứa trẻ trong làng đang vui chơi.\r\nMột nơi rất đặc biệt và nổi bật của kỳ nghỉ Việt Nam của chúng tôi. Hãy đến đây sớm trước khi các nhà phát triển chuyển đến và làm hỏng nó! Phòng 4 có ban công nhìn ra bãi biển.', 'active', NULL, 5, '2020-12-08 00:00:00', 'hailan', NULL, NULL, 21, 'L0iu6XI6uT.png'),
(13, 'joisagypsy', 'Ở đây để nghỉ ngơi, thư giãn, và một chút vui vẻ! Ash và nhóm của anh ta sẽ đối xử với anh đúng. Vị trí đẹp, thức ăn và đồ uống tuyệt vời, bạn cần gì hơn. Một chút ra khỏi bit theo dõi bị đánh cũng có giá trị nó. . . sẽ ở lại trong một nhịp tim! !', 'active', NULL, 5, '2020-12-08 00:00:00', 'hailan', '2020-12-08 00:00:00', 'hailan', 21, '0BbXe9kRQk.png'),
(14, 'Thúy X', 'Nhân viên phục vụ tốt, khí hậu tốt, thân thiện, các trang thiết bị trong phòng hiện đại và đầy đủ. Nhân viên thấu rõ những dịch vụ chúng tôi chúng tôi cần và giới thiệu cho chúng tôi .Bãi biễn dài đẹp.Nhà hàng tốt', 'active', NULL, 5, '2020-12-08 00:00:00', 'hailan', '2020-12-08 00:00:00', 'hailan', 21, 'KjWqAjiCfJ.png'),
(15, 'the cong d', 'Khách sạn kiến trúc như một con thuyền lớn rất nhiều phòng và phòng mình rất rộng và đẹp. Hướng biển gió mát và đẹp cực kỳ thoải mái trong một căn phòng đẹp và rộng nhân viên dễ thương. Sẽ quay lại lần sau cảm ơn', 'active', NULL, 5, '2020-12-08 00:00:00', 'hailan', '2020-12-08 00:00:00', 'hailan', 21, 'eRtifY2BdE.png'),
(16, 'Quang Huy V', 'Phòng rộng sạch sẽ, gọn gàng. Được trang trí bố trí rất hơp lý đẹp. Nhân viên dọn phòng lễ phép dọn phòng gọn gàng chu đái.Nhân viên nhà hàng phục vụ món ăn nhanh chóng,quần thể toàn cây xanh rất mát mẻ.sẽ sớm quay lại', 'active', NULL, 5, '2020-12-08 00:00:00', 'hailan', '2020-12-08 00:00:00', 'hailan', 21, 'Uz7W6tx66A.png'),
(17, 'Đỗ Lê Thảo Vy', 'Phục vụ tốt nhân viên thân thiện đồ ăn ngon nội thất trong phòng đầy đủ. Có phòng tập gym karaoke câu lạc bộ cho trẻ em và bể bơi để vui chơi giải trí. Tết có ông đồ viết thư pháp miễn phí cho mọi người', 'active', NULL, 5, '2020-12-08 00:00:00', 'hailan', '2020-12-08 00:00:00', 'hailan', 23, 'pFkRaeHIcE.png'),
(18, 'Lê Hữu Thịnh', 'Chúng tôi từ Tiền Giang đến trãi nghiệm 2 đêm ở Sky Luxury ,mảnh đất miền trung tuyệt vời có Sky Luxury Hotel & Resort ,dịch vụ tốt.Nhân viên hoà nhã chu đáo nhiệt tình mang đậm phong thái miền trung.Hạnh phúc được trải nghiệm dịch vụ tốt ở đây.❤️', 'active', NULL, 5, '2020-12-08 00:00:00', 'hailan', '2020-12-08 00:00:00', 'hailan', 23, 'FBQDm0fvoR.png'),
(19, 'Nam l', 'Quần thể nghĩ dưỡng rất đẹp,phòng sạch sẽ ,hoa viên với nhiều loại hoa đẹp.Hồ bơi trong sạch,thái độ nhân viên phục vụ tận tình vui vẻ.Vượt sự mong đợi của gia đình.Khách sạn có đội ngũ chăm sóc khách hàng rất tốt luôn hỏi thăm và giới thiệu các điểm trong quần thể.Xe điện đúng giờ luôn chu đáo .Chuyến nghỉ dưỡng hoàn hảo vượt sự mong đợi.', 'active', NULL, 5, '2020-12-08 00:00:00', 'hailan', '2020-12-08 00:00:00', 'hailan', 23, 'kJSf1bfA4s.png'),
(20, 'Lý Bá Thắng', 'Nhân viên thân thiện, phòng đẹp, view nhìn ra biển rất đẹp! Phòng tân hôn được trang trí thiên nga và hoa hồng rất đẹp! Ăn sáng tương đối, phục vụ tốt đồ ăn cần đa dạng hơn! Dịch vụ xe đưa đón khách đi thành phố rất đúng giờ!', 'active', NULL, 5, '2020-12-08 00:00:00', 'hailan', '2020-12-08 00:00:00', 'hailan', 23, 'kS43kMizdz.png'),
(21, 'Hồng Nguyễn 704', 'Mình cảm thấy ở đây rất thích, và thoải mái, không gian rộng rãi, phục vụ nhiệt tình và nhân viên rất nhiệt tình. hj vọng sẽ có dịp quay lại cùng gia đình mình cho thoải mái .cảm ơn flc dịch vụ hoàn hảo và tốt', 'active', NULL, 5, '2020-12-08 00:00:00', 'hailan', '2020-12-08 00:00:00', 'hailan', 23, 'nxIBSB3J08.png'),
(22, 'Nguyễn quốc sơn', 'Phòng thoáng mát, sạch sẽ, nhân viên thân thiện, giúp đỡ khách hàng hết mình, đầy đủ dịch vụ, tiện nghi. Khu nghỉ dưỡng nằm gần địa điểm tham quan đẹp như: eo gió, kỳ co. Sân golf nằm trong khu nghỉ dưỡng. Sẽ quuay lại vào dịp gần nhất.', 'active', NULL, 5, '2020-12-08 00:00:00', 'hailan', '2020-12-08 00:00:00', 'hailan', 24, 'YoCWcntznR.png'),
(23, 'NguyenTheDuong', 'Nhân viên tiền sảnh thân thiện, nhân viên lễ tân hỗ trợ khách check in rất nhanh. Đội ngũ dọn phòng chuyên nghiệp. Phòng ốc luôn sạch sẽ và hỗ trợ nhiệt tình mỗi khi chúng tôi cần. Phòng view hướng biển đẹp. Cám ơn đội ngũ nhân viên Sky Luxury', 'active', NULL, 5, '2020-12-08 00:00:00', 'hailan', '2020-12-08 00:00:00', 'hailan', 24, 'fsYJiX16hP.png'),
(24, 'hieppottter', 'Nhân viên: chu đáo, nhiệt tình, tận tâm, vui vẻ, thân thiện, hoà nhã và luôn nở nụ cười trên môi. Mỗi lần đi là 1 trải nghiệm như ban đầu. Hi vọng có dịp gần nhất được cùng gia đình đi du lịch như vậy. Trân trọng', 'active', NULL, 5, '2020-12-08 00:00:00', 'hailan', '2020-12-08 00:00:00', 'hailan', 24, 'bvnvkHENXT.png'),
(25, 'Le Hong', 'Phong cảnh rất đẹp\r\nCác dịch vụ rất tốt\r\nPhòng rộng, thoáng, đẹp\r\nMón ăn ngon\r\nNhân viên lịch sự, thân thiện, nhiệt tình.\r\nVì không có thời gian nên mình chưa thăm quan được hết địa điểm vui chơi tại thành phố Quy Nhơn này. Nếu có dịp quay lại, nhất định mình sẽ ghé.', 'active', NULL, 5, '2020-12-08 00:00:00', 'hailan', '2020-12-08 00:00:00', 'hailan', 24, 'DXE9YbAvLe.png'),
(26, 'Ha Tim', 'Chúng tôi vừa tận hưởng kì nghỉ tuyệt vời tại Sky Luxury Hotel & Resort. Lễ tân thân thiện chào đón chúng tôi nhiệt tình. Các bạn butler đưa chúng tôi về vila bằng xe điện và giới thiệu chi tiết về khu nghỉ dưỡng. Vila đẹp hướng biển thoáng, hoa cỏ xanh tươi, vui mắt.\r\nNgày chúng tôi trả phòng có anh quản lý đến hỏi thăm ân cần về các dịch vụ khách sạn. Chúng tôi rất vui về cách chăm sóc chu đáo này và sẽ quay lại vào dịp sau ❤❤❤', 'active', NULL, 5, '2020-12-08 00:00:00', 'hailan', '2020-12-08 00:00:00', 'hailan', 24, 'F5mjqg35so.png'),
(27, 'Ngoc minh', 'Mình đi Quy Nhơn năm ngoái nhưng đã book để tháng sau quay lại lần thứ hai, rất thích.\r\nĐồ ăn ko quá đắt đỏ, mà biển sạch sẽ, an toàn và rất đẹp.\r\nBể bơi thiết kế hoàn hảo cho trẻ em, rất an toàn, nhiều chỗ chơi khác nữa như phòng chơi, khu cầu trượt', 'active', NULL, 5, '2020-12-08 00:00:00', 'hailan', '2020-12-08 00:00:00', 'hailan', 25, 'll6Qwk5KYO.png'),
(28, 'Liz T', 'Nhân viên lễ tân thân thiện\r\nNhân viên FB cần cười nhiều hơn xíu cho rực rỡ\r\nĐồ ăn buffet ok\r\nSau covid nên có lẽ ks thiếu nhân viên nên nhiều khu vực hơi bừa 1 chút\r\n\r\nMình thích nhất là ngắm bình minh ở đây! Yên bình và tuyệt đẹp!', 'active', NULL, 5, '2020-12-08 00:00:00', 'hailan', '2020-12-08 00:00:00', 'hailan', 25, 'BpElhoDNup.png'),
(29, 'Trang Tran', 'Sky Luxury Hotel & Resort có khung cảnh yên bình, nhẹ nhàng, có view rất đẹp do bãi biển trải dài ngay trước cửa phòng. Nhân viên đều thân thiện, nhiệt tinh. Tuy nội thất phòng ốc có vẻ hơi cũ do resort được đưa vào hoạt động khá lâu nhưng nhìn chung ở Avani mọi thứ đều tốt.', 'active', NULL, 5, '2020-12-08 00:00:00', 'hailan', '2020-12-08 00:00:00', 'hailan', 25, 'rUCDOWS0e6.png'),
(30, 'khuongha1194', 'Nếu nói Sky Luxury không có điểm gì để chê thì thật sự không phải. Nhưng nhìn chung, Sky Luxury đã cho gia đình mình một kỳ nghỉ thoải mái. Mặc dù chăn ga vẫn còn hơi ẩm và hơi có mùi hôi. Muốn ra ban công ngồi ngắm biển thì có muỗi:)) Nhưng nhân viên ở Sky Luxury thân thiện và rất nhiệt thành.', 'active', NULL, 5, '2020-12-08 00:00:00', 'hailan', '2020-12-08 00:00:00', 'hailan', 25, 'LLMBDtpBhQ.png');

-- --------------------------------------------------------

--
-- Table structure for table `rss`
--

CREATE TABLE `rss` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL,
  `ordering` int(11) NOT NULL,
  `type_source` varchar(10) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rss`
--

INSERT INTO `rss` (`id`, `name`, `link`, `status`, `ordering`, `type_source`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'Pháp luật VnExpress RSS', 'https://vnexpress.net/rss/phap-luat.rss', 'active', 0, 'vnexpress', '2020-10-10 00:00:00', 'hailan', NULL, NULL),
(2, 'Phong cách Cafebiz Rss', 'https://cafebiz.vn/phong-cach.rss', 'active', 2, 'cafebiz', '2020-10-10 00:00:00', 'hailan', '2020-10-10 00:00:00', 'hailan');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `key_value` varchar(255) NOT NULL,
  `value` text,
  `status` varchar(10) DEFAULT NULL,
  `created` date NOT NULL,
  `created_by` varchar(10) NOT NULL,
  `modified` date DEFAULT NULL,
  `modified_by` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `key_value`, `value`, `status`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(2, 'setting_email', '{\"email\":\"huynhminhsangit@gmail.com\",\"password\":\"djvtkgxyiiaitbeg\",\"bcc\":\"huynhminhsangcntp@gmail.com\"}', NULL, '2020-10-13', 'admin', '2020-12-07', 'hailan'),
(1, 'setting_general', '{\"logo\":\"{\\\"logo_top\\\":\\\"kqqiIvZwzU.png\\\",\\\"logo_footer\\\":\\\"kYEqcPgXH2.png\\\",\\\"favicon\\\":\\\"BGYU878YH7.png\\\"}\",\"hotline\":\"0362302030, 0383308983\",\"copyright\":\"Copyright © 2020 by Hotel Team. Sky Luxury Hotel & Resort with love\",\"working_date\":\"Thứ 2 đến thứ 7\",\"slogan\":\"Sự hài lòng của khách hàng là niềm vui của chúng tôi.\",\"location\":\"Số 294 Xuân Diệu, Trần Phú, Thành phố Qui Nhơn, Bình Định\",\"introduce\":\"<p>Muối tồn tại ở mọi nơi tr&ecirc;n Tr&aacute;i đất v&agrave; muối từ biển chiếm tỷ lệ lớn nhất. Thương hiệu Sky Luxury Hotel&nbsp;&amp; Resort&nbsp;được lấy cảm hứng từ những hạt muối biển tinh khiết v&agrave; gi&aacute; trị bất tận của n&oacute; trong bề d&agrave;y lịch sử của nh&acirc;n loại.Từ xưa, muối l&agrave; mặt h&agrave;ng đầu ti&ecirc;n d&ugrave;ng để trao đổi thực phẩm v&agrave; trở th&agrave;nh phương thức tiền tệ quan trọng trong cuộc sống của người d&acirc;n thời đ&oacute;.<\\/p>\\r\\n\\r\\n<p>Hầu hết mọi người đều nghĩ rằng muối đơn giản chỉ l&agrave; gia vị trong hầu hết c&aacute;c bữa ăn, nhưng kh&ocirc;ng thể phủ nhận, muối l&agrave; một phần thiết yếu trong cuộc sống kh&ocirc;ng chỉ của con người m&agrave; cả thi&ecirc;n nhi&ecirc;n. Muối được xem l&agrave; một trong những phương ph&aacute;p hiệu quả nhất v&agrave; được sử dụng rộng r&atilde;i để bảo quản thực phẩm, trị liệu spa v&agrave; chăm s&oacute;c sức khỏe. Ng&agrave;y nay, một m&oacute;n qu&agrave; từ muối l&agrave; một biểu tượng của sự may mắn, phong ph&uacute;, ch&acirc;n th&agrave;nh v&agrave; h&agrave;i h&ograve;a.<\\/p>\\r\\n\\r\\n<p>Tại Sky Luxury Hotel&nbsp;&amp; Resort, ch&uacute;ng t&ocirc;i như muối trong biển, nhỏ b&eacute; m&agrave; mang vẻ đẹp mặn m&agrave; của biển cả, Sky Luxury Hotel&nbsp;&amp; Resort cũng kho&aacute;c lớp &aacute;o khi&ecirc;m nhường m&agrave; ẩn chứa v&ocirc; v&agrave;n trải nghiệm gi&agrave;u cảm x&uacute;c bạn đang t&igrave;m kiếm! Với tất cả t&acirc;m huyết của m&igrave;nh, ch&uacute;ng t&ocirc;i mong muốn quan t&acirc;m đến từng khoảnh khắc trải nghiệm của bạn, mong muốn kết nối mọi người với mọi người, mọi người với cộng đồng, mọi người với m&ocirc;i trường v&agrave; cung cấp c&aacute;c dịch vụ tận t&igrave;nh nhất cho Qu&yacute; Kh&aacute;ch cũng như hiểu được cảm x&uacute;c v&agrave; mong đợi của Qu&yacute; Kh&aacute;ch. Sky Luxury Hotel&nbsp;&amp; Resort &ndash; nơi đến để thư gi&atilde;n v&agrave; c&acirc;n bằng cuộc sống.<\\/p>\"}', NULL, '2020-10-13', 'admin', '2020-12-16', 'admin123'),
(3, 'setting_social', '{\"facebook\":\"https:\\/\\/www.facebook.com\\/huynhminhsangit\",\"group\":\"https:\\/\\/www.facebook.com\\/groups\\/ZendVN.Group\",\"fan_page\":\"https:\\/\\/webformatter.com\\/json\",\"youtube\":\"https:\\/\\/www.youtube.com\\/\"}', NULL, '2020-10-13', 'admin', '2020-12-07', 'hailan'),
(4, 'setting_seo', '{\"meta_keyword\":\"Sky Luxury Hotel & Resort\",\"meta_description\":\"Dịch vụ đẳng cấp, tận hưởng không gian nghỉ dưỡng sang trọng, đắng cấp, hàng đầu tại Quy Nhơn Bình Định.\"}', NULL, '2020-07-09', 'haideptrai', '2020-12-07', 'admin123'),
(5, 'setting_script', '{\"script_head\":\"http:\\/\\/127.0.0.1:8000\\/admin123\\/setting1\",\"script_body\":\"http:\\/\\/127.0.0.1:8000\\/admin123\\/setting\",\"map\":\"<iframe src=\\\"https:\\/\\/www.google.com\\/maps\\/embed?pb=!1m18!1m12!1m3!1d3875.206230968952!2d109.22589631483059!3d13.76643339033801!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x316f6c8c4211a003%3A0x3e081cd7024a14df!2zMjk0IFh1w6JuIERp4buHdSwgVHLhuqduIFBow7osIFRow6BuaCBwaOG7kSBRdWkgTmjGoW4sIELDrG5oIMSQ4buLbmg!5e0!3m2!1svi!2s!4v1607187108841!5m2!1svi!2s\\\" height=\\\"470\\\" frameborder=\\\"0\\\" allowfullscreen><\\/iframe>\"}', NULL, '2020-06-26', 'HaiDepTrai', '2020-12-07', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `link` varchar(200) NOT NULL,
  `thumb` text,
  `created` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `status` text,
  `ordering` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `name`, `description`, `link`, `thumb`, `created`, `created_by`, `modified`, `modified_by`, `status`, `ordering`) VALUES
(1, 'Tham dự sự kiện và lễ hội', 'Thưởng thức và khám phá', 'http://sky-hotel.xyz/', 'dzhyH16xNK.jpeg', '2019-04-15 00:00:00', 'hailan', '2020-11-25 00:00:00', 'hailan', 'active', 1),
(2, 'Tận hưởng trải nghiệm sang trọng', 'trải nghiệm với chúng tôi', 'https://zendvn.com/', 'i7C2pBPey8.jpeg', '2019-04-18 00:00:00', 'hailan', '2020-11-25 00:00:00', 'hailan', 'active', 2),
(3, 'Welcome to Sky Luxury Hotel & Resort', 'Dịch vụ đẳng cấp hàng đầu tại Quy Nhơn', 'http://sky-hotel.xyz/', '2fStoNIXVJ.jpeg', '2019-04-24 00:00:00', 'hailan', '2020-12-10 00:00:00', 'hailan', 'active', 3);

-- --------------------------------------------------------

--
-- Table structure for table `subscribe`
--

CREATE TABLE `subscribe` (
  `id` int(11) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subscribe`
--

INSERT INTO `subscribe` (`id`, `email`, `status`, `created`) VALUES
(4, 'huynhminhsangit@gmail.com', 'unfollow', '2020-11-28 13:11:33'),
(5, 'sang.huynhminhit@gmail.com', 'unfollow', '2020-11-28 13:11:32'),
(6, 'huynhminhsangit@gmail.com', 'follow', '2020-11-28 14:11:02'),
(7, 'huynhminhsangit@gmail.com', 'follow', '2020-11-28 14:11:37'),
(8, 'huynhminhsangit@gmail.com', 'follow', '2020-11-28 14:11:41'),
(9, 'thanhhai3295@gmail.com', 'follow', '2020-11-28 15:11:29'),
(10, 'sang.huynhminhit@gmail.com', 'follow', '2020-11-28 15:11:24'),
(11, 'sang.huynhminhit@gmail.com', 'follow', '2020-11-28 19:11:40'),
(12, 'huynhminhsangcntp@gmail.com', 'follow', '2020-12-05 22:12:25'),
(13, 'huynhminhsangcntp@gmail.com', 'follow', '2020-12-09 16:09:19'),
(14, 'huynhminhsangcntp@gmail.com', 'follow', '2020-12-09 16:11:12'),
(15, 'huynhminhsangcntp@gmail.com', 'follow', '2020-12-09 16:12:14'),
(16, 'huynhminhsangcntp@gmail.com', 'follow', '2020-12-09 16:12:43'),
(17, 'huynhminhsangcntp@gmail.com', 'follow', '2020-12-09 16:14:51'),
(18, 'huynhminhsangcntp@gmail.com', 'follow', '2020-12-09 16:20:49'),
(19, 'huynhminhsangcntp@gmail.com', 'follow', '2020-12-09 16:22:33'),
(20, 'huynhminhsangcntp@gmail.com', 'follow', '2020-12-09 16:25:20'),
(21, 'huynhminhsangcntp@gmail.com', 'follow', '2020-12-09 16:27:19'),
(22, 'huynhminhsangcntp@gmail.com', 'follow', '2020-12-09 16:29:03'),
(23, 'huynhminhsangcntp@gmail.com', 'follow', '2020-12-09 16:30:20'),
(24, 'huynhminhsangcntp@gmail.com', 'follow', '2020-12-09 16:31:14'),
(25, 'huynhminhsangcntp@gmail.com', 'follow', '2020-12-09 18:30:51'),
(26, 'huynhminhsangcntp@gmail.com', 'follow', '2020-12-09 18:31:16'),
(27, 'huynhminhsangcntp@gmail.com', 'follow', '2020-12-09 18:32:10'),
(28, 'huynhminhsangcntp@gmail.com', 'follow', '2020-12-09 18:32:38'),
(29, 'huynhminhsangcntp@gmail.com', 'follow', '2020-12-09 18:33:19'),
(30, 'huynhminhsangcntp@gmail.com', 'follow', '2020-12-09 18:33:57'),
(31, 'huynhminhsangcntp@gmail.com', 'follow', '2020-12-09 18:34:12'),
(32, 'huynhminhsangcntp@gmail.com', 'follow', '2020-12-09 18:35:19'),
(33, 'huynhminhsangcntp@gmail.com', 'follow', '2020-12-09 18:36:20'),
(34, 'huynhminhsangcntp@gmail.com', 'follow', '2020-12-09 18:40:58'),
(35, 'huynhminhsangit@gmail.com', 'follow', '2020-12-15 23:48:02'),
(36, 'huynhminhsangit@gmail.com', 'follow', '2020-12-15 23:48:27'),
(37, 'huynhminhsangit@gmail.com', 'follow', '2020-12-15 23:48:34'),
(38, 'huynhminhsangit@gmail.com', 'follow', '2020-12-15 23:48:39'),
(39, 'huynhminhsangit@gmail.com', 'follow', '2020-12-15 23:48:45'),
(40, 'huynhminhsangit@gmail.com', 'follow', '2020-12-15 23:48:50'),
(41, 'huynhminhsangit@gmail.com', 'follow', '2020-12-15 23:48:51'),
(42, 'huynhminhsangit@gmail.com', 'follow', '2020-12-15 23:48:52'),
(43, 'huynhminhsangit@gmail.com', 'follow', '2020-12-15 23:48:53'),
(44, 'huynhminhsangit@gmail.com', 'follow', '2020-12-15 23:48:53'),
(45, 'huynhminhsangit@gmail.com', 'follow', '2020-12-15 23:48:54'),
(46, 'huynhminhsangit@gmail.com', 'follow', '2020-12-15 23:48:55'),
(47, 'huynhminhsangit@gmail.com', 'follow', '2020-12-15 23:48:56'),
(48, 'huynhminhsangcntp@gmail.com', 'follow', '2020-12-15 23:50:04'),
(49, 'huynhminhsangcntp@gmail.com', 'follow', '2020-12-15 23:50:05'),
(50, 'huynhminhsangcntp@gmail.com', 'follow', '2020-12-15 23:50:05'),
(51, 'huynhminhsangcntp@gmail.com', 'follow', '2020-12-15 23:50:05'),
(52, 'huynhminhsangcntp@gmail.com', 'follow', '2020-12-15 23:50:06'),
(53, 'huynhminhsangcntp@gmail.com', 'follow', '2020-12-15 23:50:06'),
(54, 'huynhminhsangcntp@gmail.com', 'follow', '2020-12-15 23:50:08'),
(55, 'huynhminhsangcntp@gmail.com', 'follow', '2020-12-15 23:50:09'),
(56, 'huynhminhsangcntp@gmail.com', 'follow', '2020-12-15 23:50:09'),
(57, 'huynhminhsangcntp@gmail.com', 'follow', '2020-12-15 23:50:09'),
(58, 'huynhminhsangcntp@gmail.com', 'follow', '2020-12-15 23:50:10'),
(59, 'huynhminhsangcntp@gmail.com', 'follow', '2020-12-15 23:50:10'),
(60, 'huynhminhsangcntp@gmail.com', 'follow', '2020-12-15 23:50:11'),
(61, 'huynhminhsangcntp@gmail.com', 'follow', '2020-12-15 23:50:12'),
(62, 'huynhminhsangcntp@gmail.com', 'follow', '2020-12-15 23:50:12'),
(63, 'huynhminhsangcntp@gmail.com', 'follow', '2020-12-15 23:50:13'),
(64, 'huynhminhsangcntp@gmail.com', 'follow', '2020-12-15 23:50:14'),
(65, 'huynhminhsangcntp@gmail.com', 'follow', '2020-12-15 23:50:14'),
(66, 'huynhminhsangcntp@gmail.com', 'follow', '2020-12-15 23:50:15'),
(67, 'huynhminhsangcntp@gmail.com', 'follow', '2020-12-15 23:50:16'),
(68, 'huynhminhsangcntp@gmail.com', 'follow', '2020-12-16 19:34:26');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `status`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(9, 'Tháp đôi', 'abcd', '2020-12-08 00:00:00', 'HaiDepTrai', NULL, NULL),
(10, 'Điểm đến Tháp đôi', 'abcd', '2020-12-08 00:00:00', 'HaiDepTrai', NULL, NULL),
(12, 'Tháp Đôi Quy Nhơn', 'abcd', '2020-12-08 00:00:00', 'HaiDepTrai', NULL, NULL),
(13, 'Bãi tắm Hoàng Hậu', 'abcd', '2020-12-08 00:00:00', 'admin123', NULL, NULL),
(14, 'Tháp Dương Long', 'abcd', '2020-12-08 00:00:00', 'admin123', NULL, NULL),
(15, 'Ghềnh Ráng Tiên Sa', 'abcd', '2020-12-08 00:00:00', 'admin123', NULL, NULL),
(16, 'Tháp Bánh Ít', 'abcd', '2020-12-08 00:00:00', 'admin123', NULL, NULL),
(17, 'Bảo tàng Quang Trung', 'abcd', '2020-12-08 00:00:00', 'admin123', NULL, NULL),
(18, 'Đàn tế trời Tây Sơn', 'abcd', '2020-12-08 00:00:00', 'admin123', NULL, NULL),
(19, 'Eo Gió', 'abcd', '2020-12-08 00:00:00', 'admin123', NULL, NULL),
(20, 'Kỳ Co', 'abcd', '2020-12-08 00:00:00', 'admin123', NULL, NULL),
(21, 'Khu dã ngoại Trung Lương', 'abcd', '2020-12-08 00:00:00', 'admin123', NULL, NULL),
(22, 'FLC Zoo Safari Park', 'abcd', '2020-12-08 00:00:00', 'admin123', NULL, NULL),
(23, 'Lễ hội Đống Đa', 'abcd', '2020-12-08 00:00:00', 'admin123', NULL, NULL),
(24, 'Lễ hội Cầu Ngư', 'abcd', '2020-12-08 00:00:00', 'admin123', NULL, NULL),
(25, 'Lễ hội Chợ Gò', 'abcd', '2020-12-08 00:00:00', 'admin123', NULL, NULL),
(26, 'Chùa Ông Núi', 'abcd', '2020-12-08 00:00:00', 'admin123', NULL, NULL),
(27, 'đua ghe', 'abcd', '2020-12-08 00:00:00', 'admin123', NULL, NULL),
(28, 'võ thuật', 'abcd', '2020-12-08 00:00:00', 'admin123', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `level` varchar(10) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(45) DEFAULT NULL,
  `status` varchar(10) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `fullname`, `password`, `avatar`, `level`, `created`, `created_by`, `modified`, `modified_by`, `status`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin123456', 'e10adc3949ba59abbe56e057f20f883e', '1ctW8mj8vq.png', 'admin', '2014-12-10 08:55:35', 'admin', '2019-05-04 14:47:14', 'hailan', 'active'),
(2, 'hailan', 'hailan@gmail.com', 'hailan', '7c6f3ef49405d8a330aaa19ca0d0f6af', '1eSGmvZ3gM.jpeg', 'admin', '2014-12-13 07:20:03', 'admin', '2019-05-04 08:47:04', 'hailan', 'active'),
(3, 'user123', 'test@gmail.com', 'user123', 'e10adc3949ba59abbe56e057f20f883e', 'Hb1QSn1CL8.png', 'member', '2019-05-04 00:00:00', 'admin', '2019-05-04 08:47:07', 'hailan', 'active'),
(4, 'user456', 'user456@gmail.com', 'user456', 'e10adc3949ba59abbe56e057f20f883e', 'J1uknUz0T6.png', 'member', '2019-05-04 00:00:00', 'admin', '2020-10-11 00:00:00', 'hailan', 'active'),
(7, 'admin123', 'admin123@gmail.com', 'admin123', 'e10adc3949ba59abbe56e057f20f883e', '3rjIHfyWJU.jpeg', 'admin', '2020-10-11 00:00:00', 'hailan', '2020-10-11 00:00:00', 'hailan', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `attribute`
--
ALTER TABLE `attribute`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_article`
--
ALTER TABLE `category_article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_faq`
--
ALTER TABLE `category_faq`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `category_product`
--
ALTER TABLE `category_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feeship`
--
ALTER TABLE `feeship`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_attribute`
--
ALTER TABLE `group_attribute`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rss`
--
ALTER TABLE `rss`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `attribute`
--
ALTER TABLE `attribute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `category_article`
--
ALTER TABLE `category_article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `category_faq`
--
ALTER TABLE `category_faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `category_product`
--
ALTER TABLE `category_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `feeship`
--
ALTER TABLE `feeship`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `group_attribute`
--
ALTER TABLE `group_attribute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `rss`
--
ALTER TABLE `rss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subscribe`
--
ALTER TABLE `subscribe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
