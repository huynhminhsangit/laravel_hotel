-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 25, 2020 at 08:52 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proj_news`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publish_at` date DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `category_id`, `name`, `content`, `status`, `thumb`, `created`, `created_by`, `modified`, `modified_by`, `publish_at`, `type`, `meta_keyword`, `meta_description`) VALUES
(4, 8, 'Liverpool chỉ được nâng Cup phiên bản nếu vô địch hôm nay', '<p>Đội b&oacute;ng th&agrave;nh phố cảng sẽ kh&ocirc;ng n&acirc;ng Cup nguy&ecirc;n bản nếu vượt mặt Man City ở v&ograve;ng cuối Ngoại hạng Anh.</p>\r\n\r\n<p>Liverpool k&eacute;m Man City một điểm trước khi tiếp Wolverhampton tr&ecirc;n s&acirc;n nh&agrave; Anfield v&agrave;o ng&agrave;y Chủ Nhật. Ở trận đấu c&ugrave;ng giờ, Man City sẽ l&agrave;m kh&aacute;ch tới s&acirc;n Brighton v&agrave; biết một chiến thắng sẽ gi&uacute;p họ bảo vệ th&agrave;nh c&ocirc;ng ng&ocirc;i v&ocirc; địch. Kể từ khi c&aacute;c trận v&ograve;ng cuối Ngoại hạng Anh sẽ chơi đồng loạt c&ugrave;ng l&uacute;c, ban tổ chức phải đặt một chiếc cup phi&ecirc;n bản giống thật tại Anfield ph&ograve;ng trường hợp Liverpool v&ocirc; địch. Chiếc cup giả n&agrave;y thường được d&ugrave;ng trong c&aacute;c sự kiện quảng b&aacute; của Ngoại hạng Anh.&nbsp;</p>', 'active', 'L3Yuzln8II.png', '2019-05-04 00:00:00', 'hailan', '2019-05-17 00:00:00', 'hailan', '2019-04-29', 'featured', NULL, NULL),
(5, 7, 'Bottas giành pole chặng thứ ba liên tiếp', '<p>Tay đua Phần Lan đ&aacute;nh bại đồng đội Lewis Hamilton ở v&ograve;ng ph&acirc;n hạng GP T&acirc;y Ban Nha h&ocirc;m 11/5.</p>\r\n\r\n<p>Valtteri Bottas nhanh hơn Hamilton 0,634 gi&acirc;y v&agrave; nhanh hơn người về thứ ba&nbsp;Sebastian Vettel 0,866 gi&acirc;y. Tay đua của Red Bull&nbsp;Max Verstappen nhanh thứ tư, trong khi&nbsp;Charles Leclerc về thứ năm.</p>', 'active', 'iQ1RXPioFZ.jpeg', '2019-05-04 00:00:00', 'hailan', '2019-05-17 00:00:00', 'hailan', '2019-04-28', 'featured', NULL, NULL),
(6, 8, 'HLV Cardiff: \'Man Utd sẽ không vô địch trong 10 năm tới\'', '<p>Neil Warnock tỏ ra nghi ngờ về tương lai của Man Utd dưới thời HLV Solskjaer.</p>\r\n\r\n<p>&quot;Một số người nghĩ Man Utd cần từ hai đến ba kỳ chuyển nhượng nữa để gi&agrave;nh danh hiệu&quot;, HLV Neil Warnock chia sẻ. &quot;T&ocirc;i th&igrave; nghĩ c&oacute; thể l&agrave; 10 năm. T&ocirc;i kh&ocirc;ng thấy học&oacute; khả năng bắt kịp hai CLB h&agrave;ng đầu trong khoảng bốn hay năm năm tới&quot;.</p>\r\n\r\n<p>Lần cuối Man Utd v&ocirc; địch l&agrave; m&ugrave;a 2012-2013 dưới thời HLV Sir Alex Ferguson. Kể từ đ&oacute; đến nay, &quot;Quỷ đỏ&quot; kh&ocirc;ng c&ograve;n duy tr&igrave; được vị thế ứng cử vi&ecirc;n v&ocirc; địch h&agrave;ng đầu.&nbsp;</p>', 'active', 'ReChSfB95C.jpeg', '2019-05-04 00:00:00', 'hailan', '2019-05-17 00:00:00', 'hailan', '2019-05-30', 'featured', NULL, NULL),
(7, 2, 'Đại học Anh đưa khóa học hạnh phúc vào chương trình giảng dạy', '<p>Kh&oacute;a học diễn ra trong 12 tuần, sinh vi&ecirc;n năm nhất Đại học Bristol sẽ được kh&aacute;m ph&aacute; hạnh ph&uacute;c l&agrave; g&igrave; v&agrave; l&agrave;m thế n&agrave;o để đạt được n&oacute;.</p>\r\n\r\n<p>Đại học Bristol (Anh) quyết định đưa kh&oacute;a học hạnh ph&uacute;c v&agrave;o giảng dạy từ th&aacute;ng 9 năm nay nhằm giảm thiểu t&igrave;nh trạng tự tử ở sinh vi&ecirc;n, sau khi 12 sinh vi&ecirc;n ở một trường kh&aacute;c quy&ecirc;n sinh trong ba năm qua. Gi&aacute;o sư Bruce Hood, nh&agrave; t&acirc;m l&yacute; học chuy&ecirc;n nghi&ecirc;n cứu về c&aacute;ch thức hoạt động của bộ n&atilde;o v&agrave; con người, sẽ giảng dạy m&ocirc;n học mới n&agrave;y.</p>', 'active', 'hoyOyXJrzx.png', '2019-05-04 00:00:00', 'hailan', '2019-05-17 00:00:00', 'hailan', '2019-05-05', 'featured', NULL, NULL),
(8, 5, '11 cách đơn giản dạy trẻ quản lý thời gian', '<p>Phụ huynh h&atilde;y tạo cảm gi&aacute;c vui vẻ, hướng dẫn trẻ thiết lập những ưu ti&ecirc;n h&agrave;ng ng&agrave;y để ch&uacute;ng c&oacute; thể tự quản l&yacute; thời gian hiệu quả.</p>\r\n\r\n<p>&quot;Nhanh l&ecirc;n&quot;, &quot;Con c&oacute; biết mấy giờ rồi kh&ocirc;ng&quot;, &quot;Điều g&igrave; l&agrave;m con mất nhiều thời gian như vậy&quot;..., l&agrave; những c&acirc;u n&oacute;i quen thuộc của phụ huynh để nhắc nhở con về kh&aacute;i niệm thời gian. Thay v&igrave; n&oacute;i những c&acirc;u tr&ecirc;n, phụ huynh c&oacute; thể dạy con c&aacute;ch quản l&yacute; giờ giấc ngay từ khi ch&uacute;ng c&ograve;n nhỏ.</p>', 'active', 'Phe2pSOC5Q.jpeg', '2019-05-04 00:00:00', 'hailan', '2019-05-17 00:00:00', 'hailan', '2019-07-30', 'normal', NULL, NULL),
(9, 3, 'Vì sao không hút thuốc vẫn bị ung thư phổi?', '<p>D&ugrave; kh&ocirc;ng h&uacute;t thuốc, bạn vẫn c&oacute; nguy cơ ung thư phổi do h&iacute;t phải kh&oacute;i thuốc, tiếp x&uacute;c với kh&iacute; radon hoặc sống trong m&ocirc;i trường &ocirc; nhiễm.&nbsp;</p>\r\n\r\n<p>Người kh&ocirc;ng h&uacute;t thuốc vẫn c&oacute; thể bị ung thư phổi.&nbsp;Tr&ecirc;n&nbsp;<em>Journal of the Royal Society of Medicine</em>,&nbsp;c&aacute;c nh&agrave; khoa học từ&nbsp;Hiệp hội Ung thư Mỹ cho biết 20% bệnh nh&acirc;n ung thư phổi kh&ocirc;ng bao giờ h&uacute;t thuốc.&nbsp;Nghi&ecirc;n cứu 30 năm tr&ecirc;n 1,2 triệu người của tổ chức n&agrave;y cũng chỉ ra số người kh&ocirc;ng h&uacute;t thuốc bị ung thư phổi đang gia tăng. Hầu hết bệnh nh&acirc;n chỉ được chẩn đo&aacute;n khi đ&atilde; bước sang giai đoạn nghi&ecirc;m trọng kh&ocirc;ng thể điều trị.&nbsp;</p>', 'active', 'tPa7bgOesm.png', '2019-05-04 00:00:00', 'hailan', '2019-05-17 00:00:00', 'hailan', '2019-08-30', 'normal', NULL, NULL),
(10, 4, '10 hãng hàng không  tốt nhất thế giới năm 2019', '<p>Qatar l&agrave; quốc gia duy nhất tr&ecirc;n thế giới c&oacute; h&atilde;ng h&agrave;ng kh&ocirc;ng v&agrave; s&acirc;n bay tốt nhất năm 2019.</p>\r\n\r\n<p>C&aacute;c s&acirc;n bay được đ&aacute;nh gi&aacute; dựa tr&ecirc;n 3 yếu tố: hiệu suất đ&uacute;ng giờ, chất lượng dịch vụ, thực phẩm v&agrave; lựa chọn mua sắm. Yếu tố đầu ti&ecirc;n chiếm 60% số điểm, hai ti&ecirc;u ch&iacute; c&ograve;n lại chiếm 20%. Dữ liệu của AirHelp được dựa tr&ecirc;n thống k&ecirc; từ nhiều nh&agrave; cung cấp thương mại, c&ugrave;ng cơ sở dữ liệu đ&aacute;nh gi&aacute; ri&ecirc;ng v&agrave; 40.000 khảo s&aacute;t h&agrave;nh kh&aacute;ch được thu thập từ hơn 40 quốc gia trong năm 2018.</p>', 'active', '8GlYE3KYtZ.png', '2019-05-04 00:00:00', 'hailan', '2019-05-17 00:00:00', 'hailan', '2019-09-30', 'normal', NULL, NULL),
(11, 5, 'Phát hiện bụt mọc cổ thụ hơn 2.600 tuổi ở Mỹ', '<p>Ph&aacute;t hiện mới gi&uacute;p bụt mọc trở th&agrave;nh một trong những c&acirc;y sinh sản hữu t&iacute;nh gi&agrave; nhất thế giới, vượt xa ước t&iacute;nh trước đ&acirc;y của c&aacute;c chuy&ecirc;n gia.</p>\r\n\r\n<p>C&aacute;c nh&agrave; khoa học ph&aacute;t hiện một c&acirc;y bụt mọc &iacute;t nhất đ&atilde; 2.624 tuổi ở v&ugrave;ng đầm lầy s&ocirc;ng Black, bang Bắc Carolina, Mỹ, theo nghi&ecirc;n cứu đăng tr&ecirc;n tạp ch&iacute;&nbsp;<em>Environmental Research Communications</em>&nbsp;h&ocirc;m 9/5.&nbsp;</p>\r\n\r\n<p>Nh&oacute;m nghi&ecirc;n cứu bắt gặp bụt mọc cổ thụ n&agrave;y trong l&uacute;c nghi&ecirc;n cứu v&ograve;ng tuổi của c&acirc;y để t&igrave;m hiểu về lịch sử kh&iacute; hậu tại miền đ&ocirc;ng nước Mỹ. Ngo&agrave;i thể hiện tuổi thọ, độ rộng v&agrave; m&agrave;u sắc của v&ograve;ng tuổi tr&ecirc;n th&acirc;n c&acirc;y c&ograve;n cho biết mức độ ẩm ướt hay kh&ocirc; hạn của năm tương ứng.</p>', 'active', 'a09zB7BiwV.jpeg', '2019-05-12 00:00:00', 'hailan', '2019-05-17 00:00:00', 'hailan', '2019-05-12', 'normal', NULL, NULL),
(12, 6, 'Apple có thể không nâng cấp iOS 13 cho iPhone SE, 6', '<p>Những mẫu iPhone ra mắt từ 2014 v&agrave; iPhone SE c&oacute; thể kh&ocirc;ng được l&ecirc;n đời hệ điều h&agrave;nh iOS 13 ra mắt th&aacute;ng 6 tới.</p>\r\n\r\n<p>Theo&nbsp;<em>Phone Arena</em>, hệ điều h&agrave;nh iOS 13 sắp tr&igrave;nh l&agrave;ng tại hội nghị WWDC 2019 sẽ kh&ocirc;ng hỗ trợ một loạt iPhone đời cũ của Apple. Trong đ&oacute;, đ&aacute;ng ch&uacute; &yacute; l&agrave; c&aacute;c mẫu iPhone vẫn c&ograve;n được nhiều người d&ugrave;ng sử dụng như iPhone 6, 6s Plus hay SE.&nbsp;</p>', 'active', '9jOZGc7BJK.png', '2019-05-12 00:00:00', 'hailan', '2019-05-17 00:00:00', 'hailan', '2019-05-10', 'normal', NULL, NULL),
(13, 7, 'Hình dung về Honda Jazz thế hệ mới', '<p>Thế hệ thứ tư của mẫu hatchback Honda tiết chế bớt những đường n&eacute;t g&acirc;n guốc, thể thao để thay bằng n&eacute;t trung t&iacute;nh, hợp mắt người d&ugrave;ng hơn.&nbsp;</p>\r\n\r\n<p>Những h&igrave;nh ảnh đầu ti&ecirc;n về Honda Jazz (Fit tại Nhật Bản) thế hệ mới bắt đầu xuất hiện tr&ecirc;n đường thử. D&ugrave; chưa phải thiết kế ho&agrave;n chỉnh, thay đổi của mẫu hatchback cỡ B cho thấy những đường n&eacute;t trung t&iacute;nh m&agrave; xe sắp sở hữu. Điều n&agrave;y tr&aacute;i ngược với tạo h&igrave;nh g&acirc;n guốc, thể thao ở thế hệ thứ ba hiện tại của Jazz.&nbsp;</p>', 'active', 'g2c7mYXBPW.png', '2019-05-12 00:00:00', 'hailan', '2019-05-17 00:00:00', 'hailan', '2019-05-12', 'normal', NULL, NULL),
(14, 1, 'Hà Nội vào vòng knock-out AFC Cup', '<p>ĐKVĐ V-League đ&aacute;nh bại&nbsp;Tampines Rovers 2-0 v&agrave;o chiều 15/5 để đứng đầu bảng F.</p>\r\n\r\n<p>Tiếp đối thủ đến từ Singapore trong t&igrave;nh thế buộc phải thắng để tự quyết v&eacute; đi tiếp, H&agrave; Nội đ&atilde; c&oacute; trận đấu dễ d&agrave;ng. C&oacute; thể n&oacute;i, kết quả của trận đấu được định đoạt trong hiệp một khi Oseni v&agrave; Th&agrave;nh Chung lần lượt ghi b&agrave;n cho đội chủ nh&agrave;. Trong khi đ&oacute;, Tampines Rovers phải trả gi&aacute; cho lối chơi th&ocirc; bạo khi Yasir Hanapi nhận thẻ v&agrave;ng thứ hai rời s&acirc;n. Tiền vệ n&agrave;y bị trừng phạt bởi pha đ&aacute;nh nguội với Th&agrave;nh Chung ở đầu trận, sau đ&oacute; l&agrave; t&igrave;nh huống phạm lỗi &aacute;c &yacute; với Đ&igrave;nh Trọng.</p>', 'active', 'e7YyFZJCc8.jpeg', '2019-05-15 00:00:00', 'hailan', '2019-05-17 00:00:00', 'hailan', '2019-05-10', 'featured', NULL, NULL),
(15, 1, 'Man City vẫn dự Champions League mùa 2019-2020', '<p>Việc điều tra vi phạm luật c&ocirc;ng bằng t&agrave;i ch&iacute;nh của chủ s&acirc;n Etihad chưa thể ho&agrave;n th&agrave;nh trong v&ograve;ng một năm tới.</p>\r\n\r\n<p><em>Sports Mail</em>&nbsp;(Anh)&nbsp;cho biết, &aacute;n phạt cấm tham dự Champions League một m&ugrave;a với Man City, do vi phạm luật c&ocirc;ng bằng t&agrave;i ch&iacute;nh (FFP), chỉ được đưa ra sớm nhất v&agrave;o m&ugrave;a 2020-2021.</p>\r\n\r\n<p>Trong bức thư ngỏ gửi tới truyền th&ocirc;ng Anh, Man City viết: &quot;Ch&uacute;ng t&ocirc;i hợp t&aacute;c một c&aacute;ch thiện ch&iacute; với Tiểu ban kiểm so&aacute;t t&agrave;i ch&iacute;nh c&aacute;c CLB của UEFA (CFCB). CLB tin tưởng v&agrave;o sự độc lập v&agrave; cam kết của CFCB h&ocirc;m 7/3, rằng sẽ kh&ocirc;ng kết luận g&igrave; trong thời gian điều tra&quot;.</p>', 'active', 'exzJEG4WDU.jpeg', '2019-05-15 00:00:00', 'hailan', '2019-05-17 00:00:00', 'hailan', '2019-05-10', 'featured', NULL, NULL),
(16, 1, 'Những câu đố giúp rèn luyện trí não', '<p>Bạn cần quan s&aacute;t, suy luận logic v&agrave; c&oacute; vốn từ vựng tiếng Anh để giải quyết những c&acirc;u đố dưới đ&acirc;y.</p>\r\n\r\n<p>C&acirc;u 1:&nbsp;Mike đến một buổi phỏng vấn xin việc. Anh đ&atilde; g&acirc;y ấn tượng với gi&aacute;m đốc về những kỹ năng v&agrave; kinh nghiệm của m&igrave;nh. Tuy nhi&ecirc;n, để quyết định c&oacute; nhận Mike hay kh&ocirc;ng, nữ gi&aacute;m đốc đưa ra một c&acirc;u đố h&oacute;c b&uacute;a v&agrave; y&ecirc;u cầu Mike trả lời trong 30 gi&acirc;y.</p>\r\n\r\n<p>Nội dung c&acirc;u đố: H&atilde;y đưa ra 30 từ tiếng Anh kh&ocirc;ng c&oacute; chữ &quot;a&quot; xuất hiện trong đ&oacute;?&nbsp;</p>\r\n\r\n<p>Mike dễ d&agrave;ng giải quyết c&acirc;u đố. Theo bạn anh ấy n&oacute;i những từ tiếng Anh n&agrave;o để kịp trả lời trong 30 gi&acirc;y?</p>', 'active', 'TpcocqUjob.png', '2019-05-15 00:00:00', 'hailan', '2019-05-17 00:00:00', 'hailan', '2019-05-10', 'featured', NULL, NULL),
(17, 3, 'Cách nhận biết mật ong nguyên chất và pha trộn', '<p>Mật ong nguy&ecirc;n chất sẽ kh&ocirc;ng thấm qua tờ giấy, lắng xuống đ&aacute;y ly nước v&agrave; bị kiến ăn, kh&aacute;c với mật ong bị pha trộn tạp chất.</p>\r\n\r\n<p>Dược sĩ V&otilde; H&ugrave;ng Mạnh, Trưởng khoa Dược Bệnh viện Y học d&acirc;n tộc cổ truyền B&igrave;nh Định, cho biết thị trường c&oacute; nhiều loại mật ong bị pha trộn, chỉ nh&igrave;n bề ngo&agrave;i hay ngửi m&ugrave;i chưa chắc ph&acirc;n biệt được.</p>\r\n\r\n<p>Theo dược sĩ H&ugrave;ng, một c&aacute;ch ph&acirc;n biệt thật giả l&agrave; lấy cọng h&agrave;nh tươi nh&uacute;ng v&agrave;o lọ mật ong, lấy ra chừng v&agrave;i ph&uacute;t. Cọng l&aacute; h&agrave;nh sẽ chuyển từ m&agrave;u xanh l&aacute; sang sậm nếu mật ong thật. Ngo&agrave;i ra, c&oacute; thể nhỏ giọt mật v&agrave;o nơi c&oacute; kiến, nếu kiến kh&ocirc;ng bu giọt mật th&igrave; cũng l&agrave; mật ong thật.</p>\r\n\r\n<p>Ng&agrave;y nay, nhiều người đặt mật ong v&agrave;o ngăn đ&aacute; tủ lạnh, sau 24 giờ m&agrave; kh&ocirc;ng c&oacute; hiện tượng đ&ocirc;ng đ&aacute; th&igrave; l&agrave; mật thật.</p>', 'active', 'xvEqmF5uyJ.png', '2019-05-15 00:00:00', 'hailan', '2019-05-17 00:00:00', 'hailan', '2019-05-10', 'normal', NULL, NULL),
(18, 4, 'Nhiều tour mùa hè giảm giá hàng chục triệu đồng', '<p>C&aacute;c tour trong v&agrave; ngo&agrave;i nước đều được giảm gi&aacute; mạnh để k&iacute;ch cầu du lịch trong dịp h&egrave;, nhiều chương tr&igrave;nh khuyến m&atilde;i l&ecirc;n đến h&agrave;ng chục triệu đồng.</p>\r\n\r\n<p>Sau khi so s&aacute;nh tiền v&eacute; m&aacute;y bay, ph&ograve;ng kh&aacute;ch sạn ở Bali để chuẩn bị cho kỳ nghỉ h&egrave; của gia đ&igrave;nh, anh Sơn (ngụ quận 2, TP HCM) quyết định chuyển sang mua tour trọn g&oacute;i v&igrave; tiết kiệm hơn.</p>', 'active', 'd2ABCeBzoR.jpeg', '2019-05-15 00:00:00', 'hailan', '2019-05-17 00:00:00', 'hailan', '2019-05-15', 'featured', NULL, NULL),
(19, 7, 'BMW i8 Roadster - xe mui trần dẫn đường ở Formula E', '<p>Dịp cuối tuần qua, BMW giới thiệu chiếc xe dẫn đường, l&agrave;m nhiệm vụ đảm bảo an to&agrave;n tại giải đua xe Formula E. Giải đua tương tự giải F1, nhưng to&agrave;n bộ xe đua sử dụng động cơ điện.</p>\r\n\r\n<p>i8 Roadster Safety Car dựa tr&ecirc;n chiếc i8 Roadster ti&ecirc;u chuẩn, nhưng c&oacute; những thay đổi để trở th&agrave;nh chiếc xe dẫn đường chuy&ecirc;n dụng. Ngoại h&igrave;nh c&oacute; một số đặc điểm ấn tượng hơn so với nguy&ecirc;n bản. K&iacute;nh chắn gi&oacute; kiểu d&agrave;nh cho xe đua, trọng t&acirc;m hạ thấp 15 mm.</p>', 'active', '9fbeUKTBpU.png', '2019-05-15 00:00:00', 'hailan', '2019-05-17 00:00:00', 'hailan', '2019-05-10', 'normal', NULL, NULL),
(20, 3, 'Tia cực tím tại Hà Nội ở mức \'nguy hiểm\'', '<p>Chỉ số tia UV tại H&agrave; Nội ng&agrave;y 18-19/5 l&ecirc;n tới 11, mức được đ&aacute;nh gi&aacute; l&agrave; &quot;nguy hiểm&quot; dễ khiến da, mắt bị bỏng nhiệt.</p>\r\n\r\n<p>H&agrave; Nội đang trải qua đợt nắng n&oacute;ng gay gắt. Theo Trung t&acirc;m Dự b&aacute;o Kh&iacute; tượng Thủy văn Quốc gia, nhiệt độ cao nhất ở H&agrave; Nội ng&agrave;y 18/5 dao động trong khoảng 37 đến 39 độ C, c&oacute; nơi tr&ecirc;n 39 độ.&nbsp;Trang&nbsp;<em>World Weather Online</em>&nbsp;của Anh dự b&aacute;o chỉ số tia cực t&iacute;m tại H&agrave; Nội hai ng&agrave;y 18-19/5 đạt mức 11.&nbsp;</p>', 'active', 'C4DtP4ico8.png', '2019-05-17 00:00:00', 'hailan', '2019-05-17 00:00:00', 'hailan', '2019-05-16', 'normal', NULL, NULL),
(21, 2, 'Blockchain và trí tuệ nhân tạo AI làm thay đổi giáo dục trực tuyến', '<p>Blockchain khiến dữ liệu trở n&ecirc;n c&ocirc;ng khai, minh bạch với người học, AI gi&uacute;p cải thiện khả năng tương t&aacute;c v&agrave; giảng dạy với từng c&aacute; nh&acirc;n.</p>\r\n\r\n<p>Sự b&ugrave;ng nổ của Internet v&agrave; những c&ocirc;ng nghệ mới như chuỗi khối (Blockchain) v&agrave; tr&iacute; tuệ nh&acirc;n tạo (AI) đ&atilde; g&oacute;p phần l&agrave;m thay đổi nền gi&aacute;o dục tr&ecirc;n to&agrave;n thế giới, h&igrave;nh th&agrave;nh những nền tảng Online Learning với nhiều ưu thế.</p>\r\n\r\n<p><strong>Mobile Learning dự b&aacute;o l&agrave; &quot;Cuộc c&aacute;ch mạng tiếp theo&quot; của gi&aacute;o dục trực tuyến</strong></p>\r\n\r\n<p>Theo nghi&ecirc;n cứu của Global Market Insights, thị trường gi&aacute;o dục trực tuyến to&agrave;n cầu đang c&oacute; tốc độ ph&aacute;t triển nhanh chưa từng thấy khi nền tảng hạ tầng Internet ng&agrave;y c&agrave;ng ho&agrave;n thiện v&agrave; phủ s&oacute;ng rộng khắp. Gi&aacute; trị c&aacute;c start-up về EdTech (C&ocirc;ng ty c&ocirc;ng nghệ chuy&ecirc;n về gi&aacute;o dục) to&agrave;n cầu được ước t&iacute;nh hơn 190 tỷ USD v&agrave;o năm 2018 v&agrave; dự kiến vượt hơn 300 tỷ USD v&agrave;o năm 2025.</p>', 'active', 'gCPGos7mhY.png', '2019-05-17 00:00:00', 'hailan', '2019-05-17 00:00:00', 'hailan', '2019-05-16', 'featured', NULL, NULL),
(22, 6, 'Huawei nói lệnh cấm sẽ khiến Mỹ tụt hậu về 5G', '<p>Huawei khẳng định sắc lệnh mới của Mỹ sẽ chỉ c&agrave;ng khiến qu&aacute; tr&igrave;nh triển khai c&ocirc;ng nghệ 5G ở nước n&agrave;y th&ecirc;m chậm chạp v&agrave; đắt đỏ.</p>\r\n\r\n<p>H&atilde;ng c&ocirc;ng nghệ Trung Quốc tự nhận l&agrave; &quot;người dẫn đầu kh&ocirc;ng ai s&aacute;nh kịp về c&ocirc;ng nghệ 5G&quot;, n&ecirc;n việc bị hạn chế kinh doanh ở Mỹ chỉ dẫn đến kết cục l&agrave; Mỹ sẽ bị &quot;tụt lại ph&iacute;a sau&quot; trong việc triển khai c&ocirc;ng nghệ kết nối di động thế hệ mới</p>', 'active', 'nt1QxhKUXM.jpeg', '2019-05-17 00:00:00', 'hailan', NULL, NULL, '2019-05-16', 'featured', NULL, NULL),
(23, 11, 'Asus ra mắt Zenfone 6 với camera lật tự động 123', '<p><strong>Với thiết kế m&agrave;n h&igrave;nh tr&agrave;n viền ho&agrave;n to&agrave;n kh&ocirc;ng tai thỏ</strong>, camera ch&iacute;nh 48 megapixel tr&ecirc;n Zenfone 6 c&oacute; thể lật từ sau ra trước biến th&agrave;nh camera selfie.</p>\r\n\r\n<p>Zenfone 6 l&agrave; một trong những smartphone c&oacute; viền m&agrave;n h&igrave;nh mỏng nhất tr&ecirc;n thị trường với tỷ lệ m&agrave;n h&igrave;nh hiển thị chiếm tới 92% diện t&iacute;ch mặt trước. M&aacute;y c&oacute; m&agrave;n h&igrave;nh 6,4 inch tr&agrave;n viền ra cả bốn cạnh, kh&ocirc;ng tai thỏ như một số mẫu Zenfone trước v&agrave; cũng kh&ocirc;ng d&ugrave;ng thiết kế đục lỗ như Galaxy S10, S10+</p>', 'active', 'V5omuv36Ty.png', '2019-05-17 00:00:00', 'hailan', '2020-11-18 00:00:00', 'hailan', '2019-05-16', 'featured', 'meta keyword', 'meta description'),
(24, 2, 'aaaaaaaaaaaa', '<p>aaaaaaaaaaaaaaaaaaaaa</p>', 'active', 'KoyeU30rN6.jpeg', '2020-11-18 00:00:00', 'hailan', NULL, NULL, NULL, NULL, NULL, NULL),
(25, 12, 'test test', '<p>insert into `article` as `a` (`name`, `content`, `status`, `category_id`, `meta_keyword`, `meta_description`, `id`, `thumb`, `created_by`, `created`) values (aaaaaaaaaaaa,</p>\r\n\r\n<p>aaaaaaaaaaaaaaaaaaaaa</p>\r\n\r\n<p>, active, 2, ?, ?, ?, OaNiXUllOV.jpeg, hailan, 2020-11-18)</p>\r\n\r\n<p>&nbsp;</p>', 'active', 'XRqIVkDcgH.jpeg', '2020-11-18 00:00:00', 'hailan', '2020-11-18 00:00:00', 'hailan', NULL, NULL, 'meta keyword', 'description');

-- --------------------------------------------------------

--
-- Table structure for table `attribute`
--

DROP TABLE IF EXISTS `attribute`;
CREATE TABLE IF NOT EXISTS `attribute` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `change_price` varchar(5) NOT NULL,
  `status` varchar(10) NOT NULL,
  `created` date NOT NULL,
  `created_by` varchar(10) NOT NULL,
  `modified` date DEFAULT NULL,
  `modified_by` varchar(10) DEFAULT NULL,
  `group_attribute_id` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attribute`
--

INSERT INTO `attribute` (`id`, `name`, `change_price`, `status`, `created`, `created_by`, `modified`, `modified_by`, `group_attribute_id`) VALUES
(1, 'Màu', 'no', 'active', '2020-10-31', 'admin', '2020-11-07', 'hailan', '[\"2\",\"1\",\"4\"]'),
(2, 'Slogan', 'no', 'active', '2020-10-31', 'admin', '2020-11-07', 'hailan', '[\"2\",\"1\"]'),
(3, 'Size', 'yes', 'active', '2020-10-21', 'admin', '2020-11-23', 'hailan', '[\"2\",\"1\",\"3\"]'),
(5, 'Hệ điều hành', 'no', 'active', '2020-11-01', 'hailan', '2020-11-07', 'hailan', '[\"4\"]');

-- --------------------------------------------------------

--
-- Table structure for table `category_faq`
--

DROP TABLE IF EXISTS `category_faq`;
CREATE TABLE IF NOT EXISTS `category_faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `status` text NOT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(45) DEFAULT NULL,
  `is_home` varchar(5) DEFAULT NULL,
  `display` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `category_faq`
--

INSERT INTO `category_faq` (`id`, `name`, `status`, `created`, `created_by`, `modified`, `modified_by`, `is_home`, `display`) VALUES
(1, 'Thể thao', 'active', '2019-05-04 00:00:00', 'admin', '2019-05-12 00:00:00', 'hailan', 'no', 'list'),
(2, 'Giáo dục', 'active', '2019-05-04 00:00:00', 'admin', '2019-05-12 00:00:00', 'hailan', 'no', 'grid'),
(3, 'Sức khỏe', 'active', '2019-05-04 00:00:00', 'admin', '2019-05-15 15:04:33', 'hailan', 'no', 'list'),
(4, 'Du lịch', 'active', '2019-05-04 00:00:00', 'admin', '2019-05-15 15:04:30', 'hailan', 'yes', 'grid'),
(5, 'Khoa học', 'active', '2019-05-04 00:00:00', 'admin', '2019-05-12 00:00:00', 'hailan', 'yes', 'list'),
(6, 'Số hóa', 'active', '2019-05-04 00:00:00', 'admin', '2019-05-15 15:04:38', 'hailan', 'no', 'grid'),
(7, 'Xe - Ô tô', 'inactive', '2019-05-04 00:00:00', 'admin', '2019-05-15 15:04:36', 'hailan', 'yes', 'list'),
(8, 'Kinh doanh', 'inactive', '2019-05-12 00:00:00', 'hailan', '2020-10-19 00:00:00', 'hailan', 'yes', 'list');

-- --------------------------------------------------------

--
-- Table structure for table `category_nested`
--

DROP TABLE IF EXISTS `category_nested`;
CREATE TABLE IF NOT EXISTS `category_nested` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `_lft` int(11) NOT NULL,
  `_rgt` int(11) NOT NULL,
  `created` date DEFAULT NULL,
  `created_by` varchar(10) DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `modified_by` varchar(10) DEFAULT NULL,
  `status` varchar(10) NOT NULL,
  `is_home` varchar(5) DEFAULT NULL,
  `display` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category_nested`
--

INSERT INTO `category_nested` (`id`, `name`, `parent_id`, `_lft`, `_rgt`, `created`, `created_by`, `modified`, `modified_by`, `status`, `is_home`, `display`) VALUES
(1, 'Root', 0, 1, 24, NULL, NULL, NULL, NULL, 'active', 'no', 'grid'),
(2, 'Thể thao', 1, 2, 5, '2020-10-26', 'hailan', NULL, NULL, 'active', 'yes', 'grid'),
(3, 'Giáo dục', 1, 6, 7, '2020-10-26', 'hailan', '2020-10-27', 'hailan', 'active', NULL, 'list'),
(4, 'Sức khỏe', 1, 8, 9, '2020-10-26', 'hailan', NULL, NULL, 'active', NULL, 'grid'),
(5, 'Du lịch', 1, 10, 15, '2020-10-26', 'hailan', NULL, NULL, 'active', NULL, 'list'),
(6, 'Khoa học', 1, 16, 17, '2020-10-26', 'hailan', NULL, NULL, 'active', NULL, 'grid'),
(7, 'Số hóa', 1, 18, 19, '2020-10-26', 'hailan', NULL, NULL, 'active', NULL, 'list'),
(8, 'Xe - Ô tô', 1, 20, 21, '2020-10-26', 'hailan', NULL, NULL, 'active', NULL, 'grid'),
(9, 'Kinh doanh', 1, 22, 23, '2020-10-26', 'hailan', NULL, NULL, 'active', NULL, 'list'),
(10, 'Thế giới', 5, 11, 14, '2020-10-26', 'hailan', NULL, NULL, 'active', NULL, 'list'),
(11, 'Bóng đá', 10, 12, 13, '2020-10-26', 'hailan', NULL, NULL, 'active', NULL, 'grid'),
(12, 'Trong nước', 2, 3, 4, '2020-10-26', 'hailan', NULL, NULL, 'active', NULL, 'list');

-- --------------------------------------------------------

--
-- Table structure for table `category_product`
--

DROP TABLE IF EXISTS `category_product`;
CREATE TABLE IF NOT EXISTS `category_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `display` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category_product`
--

INSERT INTO `category_product` (`id`, `name`, `parent_id`, `_lft`, `_rgt`, `created`, `created_by`, `modified`, `modified_by`, `status`, `is_home`, `display`) VALUES
(1, 'Root', 0, 1, 26, '2020-10-27', 'admin', NULL, NULL, 'active', NULL, NULL),
(2, 'Phòng Superior', 1, 12, 13, '2020-10-27', 'hailan', '2020-11-23', 'hailan', 'active', NULL, NULL),
(3, 'Phòng Deluxe', 1, 20, 21, '2020-10-27', 'hailan', '2020-11-23', 'hailan', 'active', NULL, NULL),
(4, 'Phòng President Suite', 1, 16, 17, '2020-10-27', 'hailan', '2020-11-23', 'hailan', 'active', NULL, NULL),
(5, 'Phòng Family', 1, 14, 15, '2020-10-27', 'hailan', '2020-11-23', 'hailan', 'active', NULL, NULL),
(6, 'Phòng Junior Suite', 1, 22, 23, '2020-10-27', 'hailan', '2020-11-23', 'hailan', 'active', NULL, NULL),
(7, 'Phòng Executive suite', 1, 24, 25, '2020-11-05', 'hailan', '2020-11-23', 'hailan', 'active', NULL, NULL),
(8, 'Phòng Deluxe Sky', 1, 18, 19, '2020-11-17', 'hailan', '2020-11-23', 'hailan', 'active', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `message` text NOT NULL,
  `status` varchar(10) NOT NULL,
  `created` date NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `modified` date DEFAULT NULL,
  `modified_by` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `fullname`, `email`, `phone`, `message`, `status`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(5, 'huỳnh minh sang', 'sang.huynhminhit@gmail.com', '0362302030', 'dvwaydkadadnadwa', 'inactive', '2020-10-17', 'sang.huynhminhit@gmail.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

DROP TABLE IF EXISTS `coupon`;
CREATE TABLE IF NOT EXISTS `coupon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `modified_by` varchar(10) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`id`, `code`, `type`, `value`, `start`, `end`, `total`, `total_use`, `start_price`, `end_price`, `created`, `created_by`, `modified`, `modified_by`, `status`) VALUES
(1, 'zendvn500', 'percent', 10, '2020-11-04', '2020-11-07', 10, 0, 200000, 800000, NULL, NULL, NULL, NULL, NULL),
(2, 'zendvn300', 'direct', 300, '2020-11-04', '2020-11-07', 10, 0, 300000, 1000000, NULL, NULL, NULL, NULL, NULL),
(3, 'zendvn100', 'direct', 100, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-04', 'hailan', NULL, NULL, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

DROP TABLE IF EXISTS `faq`;
CREATE TABLE IF NOT EXISTS `faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ordering` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`, `status`, `ordering`, `created`, `created_by`, `modified`, `modified_by`, `category_id`) VALUES
(1, 'Thời gian nhận trả phòng của khách sạn?', '<p>Mỗi kh&aacute;ch sạn đều đặt ra cho m&igrave;nh những quy định lưu tr&uacute;, quy định nhận trả ph&ograve;ng trong khoảng thời gian nhất định. Nếu vượt khoảng thời gian quy định đ&oacute; đồng nghĩa với việc bạn sẽ chịu th&ecirc;m mức phụ thu ph&iacute;. Để thuận tiện hơn trong qu&aacute; tr&igrave;nh t&iacute;nh to&aacute;n chi ph&iacute;, khi đặt ph&ograve;ng kh&aacute;ch sạn bạn nhất định phải biết quy định về&nbsp;<strong>c&aacute;ch t&iacute;nh giờ check in - check out của&nbsp;kh&aacute;ch sạn</strong>&nbsp;như thế n&agrave;o.</p>', 'active', 1, '2020-11-13 00:00:00', 'hailan', '2020-11-13 00:00:00', 'hailan', 1),
(2, 'Hủy đặt phòng khách sạn thì có bị thu phí hay không?', '<p>Kh&ocirc;ng chỉ kh&aacute;ch sạn trong nước m&agrave; ngay cả c&aacute;c kh&aacute;ch sạn nước ngo&agrave;i cũng c&oacute; rất nhiều quy định ri&ecirc;ng đối với việc hủy/trả ph&ograve;ng. Việc đặt ph&ograve;ng sau đ&oacute; kh&ocirc;ng ở v&agrave; hủy ph&ograve;ng th&ocirc;ng thường sẽ bị thu một khoản ph&iacute; nhất định. Hiện nay, khi bạn đến đặt kh&aacute;ch sạn trực tiếp hay đặt qua c&aacute;c website đặt ph&ograve;ng gi&aacute; rẻ th&igrave; việc hủy/trả ph&ograve;ng đều c&oacute; thể&nbsp;bị t&iacute;nh ph&iacute;. Mức ph&iacute; n&agrave;y sẽ t&ugrave;y thuộc v&agrave;o thời điểm bạn hủy ph&ograve;ng</p>', 'active', 2, '2020-11-13 00:00:00', 'hailan', NULL, NULL, 2),
(3, 'test test', '<p>test testtest testtest testtest testtest testtest testtest testtest test</p>', 'active', 1, '2020-11-17 00:00:00', 'hailan', NULL, NULL, 4),
(4, 'test test test test', '<p>test test&nbsp;test test&nbsp;test test&nbsp;test test&nbsp;test test&nbsp;test test&nbsp;</p>', 'active', 3, '2020-11-17 00:00:00', 'hailan', NULL, NULL, 4);

-- --------------------------------------------------------

--
-- Table structure for table `feeship`
--

DROP TABLE IF EXISTS `feeship`;
CREATE TABLE IF NOT EXISTS `feeship` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `province` varchar(255) NOT NULL,
  `fee` int(11) NOT NULL,
  `created` date DEFAULT NULL,
  `created_by` varchar(10) DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `modified_by` varchar(10) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

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

DROP TABLE IF EXISTS `gallery`;
CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `link`) VALUES
(1, 'https://www.youtube.com/playlist?list=PLv6GftO355AtoSx2yY107nZihfAbKi4SM');

-- --------------------------------------------------------

--
-- Table structure for table `group_attribute`
--

DROP TABLE IF EXISTS `group_attribute`;
CREATE TABLE IF NOT EXISTS `group_attribute` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created` date NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `modified` date DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `group_attribute`
--

INSERT INTO `group_attribute` (`id`, `name`, `created`, `created_by`, `modified`, `modified_by`, `status`) VALUES
(1, 'Bình giữ nhiệt', '2020-10-31', 'admin', NULL, NULL, 'active'),
(2, 'Áo thun', '2020-10-31', 'admin', NULL, NULL, 'active'),
(3, 'Ổ cứng', '2020-10-31', 'hailan', '2020-10-31', 'hailan', 'active'),
(4, 'Điện thoại', '2020-11-01', 'hailan', '2020-11-01', 'hailan', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL,
  `ordering` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `type_menu` varchar(255) NOT NULL,
  `type_open` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `_lft` int(11) NOT NULL,
  `_rgt` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `status`, `ordering`, `link`, `type_menu`, `type_open`, `parent_id`, `_lft`, `_rgt`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'Root', 'active', 0, '#', 'category', 'direct', 0, 1, 16, '2020-11-24 15:57:38', 'admin', NULL, NULL),
(3, 'Trang chủ', 'active', 1, 'http://sky-hotel.xyz/', 'direct', '_blank', 1, 2, 3, '2020-11-24 00:00:00', 'hailan', '2020-11-24 00:00:00', 'hailan'),
(4, 'Về chúng tôi', 'active', 2, 'http://sky-hotel.xyz/ve-chung-toi', 'category', '_blank', 1, 4, 7, '2020-11-24 00:00:00', 'hailan', '2020-11-24 00:00:00', 'hailan1'),
(5, 'Phòng', 'active', 3, 'http://sky-hotel.xyz/phong', 'direct', '_blank', 1, 8, 9, '2020-11-24 00:00:00', 'hailan', '2020-11-24 00:00:00', 'hailan'),
(6, 'Ưu đãi', 'active', 4, 'http://sky-hotel.xyz/uu-dai', 'direct', '_blank', 1, 10, 11, '2020-11-24 00:00:00', 'hailan', NULL, NULL),
(7, 'Liên hệ', 'active', 5, 'http://sky-hotel.xyz/lien-he', 'direct', '_blank', 1, 12, 13, '2020-11-24 00:00:00', 'hailan', NULL, NULL),
(8, 'Đặt phòng', 'active', 6, 'http://sky-hotel.xyz/dat-phong', 'direct', '_blank', 1, 14, 15, '2020-11-24 00:00:00', 'hailan', NULL, NULL),
(9, 'Dịch vụ', 'active', 1, 'http://sky-hotel.xyz/dich-vu', 'direct', '_blank', 4, 5, 6, '2020-11-24 00:00:00', 'hailan', '2020-11-24 00:00:00', 'hailan');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `status` text COLLATE utf8mb4_unicode_ci,
  `thumb` text COLLATE utf8mb4_unicode_ci,
  `created` datetime DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `attribute` text CHARACTER SET utf8,
  `meta` text COLLATE utf8mb4_unicode_ci,
  `group_attribute_id` int(11) DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category_id`, `name`, `slug`, `content`, `status`, `thumb`, `created`, `created_by`, `modified`, `modified_by`, `price`, `attribute`, `meta`, `group_attribute_id`, `meta_keyword`, `meta_description`) VALUES
(18, 8, 'Phòng Deluxe Sky', 'phong-deluxe-sky', '<p>Kh&ocirc;ng gian ph&ograve;ng được ưu &aacute;i ban c&ocirc;ng tho&aacute;ng m&aacute;t với hướng nh&igrave;n to&agrave;n cảnh ra biển gi&uacute;p t&acirc;m hồn bạn được vỗ về, an y&ecirc;n. Th&ecirc;m đ&oacute;, sự kết hợp h&agrave;i h&ograve;a giữa c&aacute;c gam m&agrave;u ghi, v&agrave;ng c&aacute;t c&ugrave;ng sắc xanh l&agrave;m tăng vẻ đẹp hiện đại, tinh tế m&agrave; nhẹ nh&agrave;ng, ấm &aacute;p cho kh&ocirc;ng gian nghỉ ngơi của bạn. Từ đ&oacute;, Deluxe King/ Twin Ocean gi&uacute;p bạn c&oacute; những trải nghiệm trọn vẹn tại Đ&agrave; Nẵng.</p>', 'active', '[{\"imageName\":\"5fbdef562647d_Deluxe-01_.jpg\",\"imageAlt\":\"Deluxe 01\"},{\"imageName\":\"5fbdef562647d_Deluxe-02.jpg\",\"imageAlt\":\"Deluxe 02\"}]', '2020-11-22 00:00:00', 'hailan', '2020-11-25 00:00:00', 'hailan', 30990000, '[{\"name\":\"Ti\\u1ec7n nghi\",\"value\":[\"View bi\\u1ec3n, n\\u00fai\"]},{\"name\":\"Di\\u1ec7n t\\u00edch\",\"value\":[\"37 m2\"]},{\"name\":\"B\\u1ed3n t\\u1eafm\",\"value\":[\"C\\u00f3\"]}]', '{\"title\":null,\"description\":null}', 3, NULL, NULL),
(20, 5, 'Phòng Family', 'phong-family', '<p>Kh&ocirc;ng gian ấm c&uacute;ng được thiết kế đơn giản nhưng tinh tế v&agrave; tiện &iacute;ch đầy đủ th&iacute;ch hợp cho cả gia đ&igrave;nh bạn trong chuyến nghỉ dưỡng đến Đ&agrave; Nẵng.</p>', 'active', '[{\"imageName\":\"5fbdf019d964c_family-01.jpg\",\"imageAlt\":\"family 01\"},{\"imageName\":\"5fbdf01e6ed91_family-02.jpg\",\"imageAlt\":\"family 02\"}]', '2020-11-22 00:00:00', 'hailan', '2020-11-25 00:00:00', 'hailan', 39990000, '[{\"name\":\"Di\\u1ec7n t\\u00edch\",\"value\":[\"62 m2\"]},{\"name\":\"Ti\\u1ec7n \\u00edch\",\"value\":[\"Ban c\\u00f4ng r\\u1ed9ng r\\u00e3i\"]},{\"name\":\"View\",\"value\":[\"View bi\\u1ec3n, n\\u00fai ho\\u1eb7c view th\\u00e0nh ph\\u1ed1\"]}]', '{\"title\":null,\"description\":null}', 4, NULL, NULL),
(21, 2, 'Phòng Superior', 'phong-superior', '<p>Lấy cảm hứng từ lối sống tối giản, c&aacute;c kh&ocirc;ng gian tại Sel de Mer Hotel &amp; Suites được thiết kế tinh tế với c&aacute;c gam m&agrave;u dịu nhẹ kết hợp &aacute;nh s&aacute;ng tự nhi&ecirc;n tạo cảm gi&aacute;c khoan kho&aacute;i v&agrave; thoải m&aacute;i gi&uacute;p bạn nghỉ ngơi trọn vẹn. Đặc biệt hơn, ban c&ocirc;ng lộng gi&oacute; với hướng nh&igrave;n to&agrave;n cảnh th&agrave;nh phố hay biển xanh thơ mộng tại ph&ograve;ng Superior sẽ khiến bạn m&ecirc; đắm ngay lần &ldquo;gặp&rdquo; đầu ti&ecirc;n!</p>', 'active', '[{\"imageName\":\"5fbca0de2c7e4_superior-02.jpg\",\"imageAlt\":null},{\"imageName\":\"5fbca0de2c7f5_superior-01.jpg\",\"imageAlt\":null}]', '2020-11-22 00:00:00', 'hailan', '2020-11-24 00:00:00', 'hailan', 7590000, '[{\"name\":\"Ti\\u1ec7n nghi\",\"value\":[\"View bi\\u1ec3n\",\"Ban c\\u00f4ng r\\u1ed9ng r\\u00e3i\",\"\\u00c1o cho\\u00e0ng t\\u1eafm\",\"M\\u00e1y s\\u1ea5y t\\u00f3c\"]},{\"name\":\"Gi\\u01b0\\u1eddng\",\"value\":[\"King ho\\u1eb7c Twin\"]},{\"name\":\"B\\u1ed3n t\\u1eafm\",\"value\":[\"C\\u00f3\"]},{\"name\":\"Di\\u1ec7n t\\u00edch\",\"value\":[\"32 m2\"]}]', '{\"title\":null,\"description\":null}', 3, NULL, NULL),
(22, 4, 'President suite', 'president-suite', '<p>Tọa lạc tr&ecirc;n tầng 20, Ban c&ocirc;ng lộng gi&oacute; gi&uacute;p Qu&yacute; Kh&aacute;ch c&oacute; thể tận hưởng vẻ đẹp n&ecirc;n thơ của biển trời Đ&agrave; Nẵng xanh m&aacute;t. Sel De Mer Ocean Suite cung cấp 3 ph&ograve;ng ngủ hiện đại, ph&ograve;ng kh&aacute;ch với b&agrave;n ăn. Đ&acirc;y l&agrave; một trong những Ocean Suites cho những kh&aacute;ch muốn sử dụng dịch vụ ri&ecirc;ng biệt đẳng cấp của ch&uacute;ng t&ocirc;i</p>', 'active', '[{\"imageName\":\"5fbd4ec07f3ac_president-02.jpg\",\"imageAlt\":\"president-01\"},{\"imageName\":\"5fbd4ec07f37d_president-01.jpg\",\"imageAlt\":\"president-02\"}]', '2020-11-24 00:00:00', 'hailan', '2020-11-24 00:00:00', 'hailan', 30990000, '[{\"name\":\"M\\u00e0u\",\"value\":[\"Ban cong\",\"b\\u1ed3n t\\u1eafm\"]},{\"name\":\"H\\u1ec7 \\u0111i\\u1ec1u h\\u00e0nh\",\"value\":[\"gi\\u01b0\\u1eddng \\u0111\\u00f4i si\\u00eau l\\u1edbn\"]}]', '{\"title\":null,\"description\":null}', 4, NULL, NULL),
(23, 6, 'Phòng Junior Suite', 'phong-junior-suite', '<p>Junior Suite King Ocean mang lại cho bạn trải nghiệm v&ocirc; c&ugrave;ng thoải m&aacute;i, thư gi&atilde;n. Kh&ocirc;ng gian ph&ograve;ng ngủ được kết nối th&ocirc;ng minh với ph&ograve;ng kh&aacute;ch, thật tiện lợi để bạn vừa nghỉ ngơi vừa xử l&yacute; c&ocirc;ng việc hay đ&oacute;n tiếp kh&aacute;ch gh&eacute; thăm trong thời gian nghỉ dưỡng. Hướng nh&igrave;n từ ban c&ocirc;ng ra b&aacute;n đảo Sơn Tr&agrave; xanh m&aacute;t v&agrave; mộng mơ gi&uacute;p tăng th&ecirc;m b&igrave;nh y&ecirc;n cho chuyến đi của bạn</p>', 'active', '[{\"imageName\":\"5fbdf0a7b1292_junior-02.jpg\",\"imageAlt\":\"junior-01\"},{\"imageName\":\"5fbdf0a7b12a6_junior-01.jpg\",\"imageAlt\":\"junior-02\"}]', '2020-11-25 00:00:00', 'hailan', '2020-11-25 00:00:00', 'hailan', 30990000, '[{\"name\":\"View\",\"value\":[\"View bi\\u1ec3n, n\\u00fai ho\\u1eb7c view th\\u00e0nh ph\\u1ed1\"]},{\"name\":\"Ti\\u1ec7n nghi\",\"value\":[\"Ph\\u00f2ng kh\\u00e1ch v\\u00e0 gh\\u1ebf sofa d\\u00e0i\",\"Ti\\u1ec7n nghi ph\\u00f2ng t\\u1eafm cao c\\u1ea5p\",\"B\\u1ed3n t\\u1eafm cao c\\u1ea5p\"]},{\"name\":\"Di\\u1ec7n t\\u00edch\",\"value\":[\"62 m2\"]}]', '{\"title\":null,\"description\":null}', 3, NULL, NULL),
(24, 7, 'Phòng Executive suite', 'phong-executive-suite', '<p>Tận hưởng kh&ocirc;ng gian thực sự sang trọng, nơi bạn bị ấn tượng bởi cảnh quan to&agrave;n th&agrave;nh phố. Ph&ograve;ng với bể sục được trang bị nội thất độc đ&aacute;o v&agrave; hiện đại với một ph&ograve;ng kh&aacute;ch v&agrave; hai ph&ograve;ng ngủ.</p>', 'active', '[{\"imageName\":\"5fbdf1993ff1c_executive-suite-01.jpg\",\"imageAlt\":\"executive-suite-01\"},{\"imageName\":\"5fbdf19e56733_executive-suite-02.jpg\",\"imageAlt\":\"executive-suite-02\"}]', '2020-11-25 00:00:00', 'hailan', NULL, NULL, 30990000, '[{\"name\":\"View\",\"value\":[\"View to\\u00e0n c\\u1ea3nh th\\u00e0nh ph\\u1ed1\"]},{\"name\":\"Ti\\u1ec7n \\u00edch\",\"value\":[\"Ban c\\u00f4ng l\\u1ed9ng gi\\u00f3\",\"M\\u1ed9t gi\\u01b0\\u1eddng king v\\u00e0 2 ph\\u00f2ng ng\\u1ee7\"]},{\"name\":\"Di\\u1ec7n t\\u00edch\",\"value\":[\"165 m2\"]}]', '{\"title\":null,\"description\":null}', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
CREATE TABLE IF NOT EXISTS `review` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ordering` int(11) DEFAULT NULL,
  `star` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `thumb` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `name`, `content`, `status`, `ordering`, `star`, `created`, `created_by`, `modified`, `modified_by`, `category_id`, `thumb`) VALUES
(1, 'thao n', 'Khách sạn đẹp không gian thoáng mát gần trung tâm đi lại thuận tiện. Đồ ăn sáng ngon. Dịch vụ tốt, nhân viên thân thiện. Phòng sạch sẽ đầy đủ tiện nghi. Nếu có dịp sẽ quay lại khách sạn. Cảm ơn khách sạn', 'active', NULL, 5, '2020-11-20 00:00:00', 'hailan', '2020-11-25 00:00:00', 'hailan', 4, 'oKJa4FqLbP.jpeg'),
(2, 'Mr Luan', 'Tôi đã ở lại hotel này nhiều lần và và tôi chắc chắn rằng đã dịch vụ ở đây tốt hơn nhiều so với các khách sạn khác ở TP Đà nẵng\r\nCác bữa ăn sáng buffet và các bữa trưa,tối rất ngon và đa dạng. Nhân viên phục vụ rất nhiệt tình,chu đáo,chuyên nghiệp..Phòng rộng rãi và thoải mái,thoáng mát.Có khuôn viên đi bộ và sân đánh Gofl thật đẹp\r\nTôi cảm ơn các bạn,Hẹn gặp các bạn 1 ngày gần nhất.', 'active', NULL, 5, '2020-11-25 00:00:00', 'hailan', '2020-11-25 00:00:00', 'hailan', 8, 'KxP2vsPVEI.jpeg'),
(3, 'trâm trần', 'cứ mỗi dịp hè là tôi cùng gia đình mình thường đi nghỉ mát cùng nhau, và đà nẵng là nơi lí tưởng mà chúng tôi chọn. Wiss belresort là nơi tôi chọn là điểm dừng chân, thật không thất vọng, quá đẹp nằm giữa thung lũng được bao quanh bởi rừng thông có sân golf, và có xe đưa đón bạn ra trung tâm. Tuy nhiên thực đơn sáng có vẻ hơi đơn điệu, không sao chúng tôi vẫn sẽ quay lại', 'active', NULL, 5, '2020-11-25 00:00:00', 'hailan', '2020-11-25 00:00:00', 'hailan', 6, '841WngJ9g2.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `rss`
--

DROP TABLE IF EXISTS `rss`;
CREATE TABLE IF NOT EXISTS `rss` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL,
  `ordering` int(11) NOT NULL,
  `type_source` varchar(10) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rss`
--

INSERT INTO `rss` (`id`, `name`, `link`, `status`, `ordering`, `type_source`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'Pháp luật VnExpress RSS', 'https://vnexpress.net/rss/phap-luat.rss', 'active', 1, 'vnexpress', '2020-10-10 00:00:00', 'hailan', NULL, NULL),
(2, 'Phong cách Cafebiz Rss', 'https://cafebiz.vn/phong-cach.rss', 'active', 2, 'vnexpress', '2020-10-10 00:00:00', 'hailan', '2020-10-10 00:00:00', 'hailan');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

DROP TABLE IF EXISTS `setting`;
CREATE TABLE IF NOT EXISTS `setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key_value` varchar(255) NOT NULL,
  `value` text,
  `status` varchar(10) DEFAULT NULL,
  `created` date NOT NULL,
  `created_by` varchar(10) NOT NULL,
  `modified` date DEFAULT NULL,
  `modified_by` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `key_value`, `value`, `status`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(2, 'setting_email', '{\"email\":\"huynhminhsangit@gmail.com\",\"password\":\"djvtkgxyiiaitbeg\",\"bcc\":\"huynhminhsangcntp@gmail.com\"}', NULL, '2020-10-13', 'admin', '2020-10-17', 'hailan'),
(1, 'setting_general', '{\"logo\":\"gHdzAq65uk.png\",\"hotline\":\"0362302030, 0383308983\",\"copyright\":\"Copyright © 2020 by Hotel Team. SkyLine Hotel with love\",\"working_date\":\"Thứ 2 đến thứ 7\",\"slogan\":\"ZendVN Code for a better life.\",\"map\":null,\"location\":\"Số 92, Võ Nguyên Giáp, Mân Thái, Sơn Trà, Đà Nẵng, Việt Nam.\",\"introduce\":\"<p>Muối tồn tại ở mọi nơi tr&ecirc;n Tr&aacute;i đất v&agrave; muối từ biển chiếm tỷ lệ lớn nhất. Thương hiệu Skyline được lấy cảm hứng từ những hạt muối biển tinh khiết v&agrave; gi&aacute; trị bất tận của n&oacute; trong bề d&agrave;y lịch sử của nh&acirc;n loại.Từ xưa, muối l&agrave; mặt h&agrave;ng đầu ti&ecirc;n d&ugrave;ng để trao đổi thực phẩm v&agrave; trở th&agrave;nh phương thức tiền tệ quan trọng trong cuộc sống của người d&acirc;n thời đ&oacute;.<br \\/>\\r\\nHầu hết mọi người đều nghĩ rằng muối đơn giản chỉ l&agrave; gia vị trong hầu hết c&aacute;c bữa ăn, nhưng kh&ocirc;ng thể phủ nhận, muối l&agrave; một phần thiết yếu trong cuộc sống kh&ocirc;ng chỉ của con người m&agrave; cả thi&ecirc;n nhi&ecirc;n. Muối được xem l&agrave; một trong những phương ph&aacute;p hiệu quả nhất v&agrave; được sử dụng rộng r&atilde;i để bảo quản thực phẩm, trị liệu spa v&agrave; chăm s&oacute;c sức khỏe. Ng&agrave;y nay, một m&oacute;n qu&agrave; từ muối l&agrave; một biểu tượng của sự may mắn, phong ph&uacute;, ch&acirc;n th&agrave;nh v&agrave; h&agrave;i h&ograve;a.<br \\/>\\r\\nTại Sel de Mer Hotel &amp; Suites, ch&uacute;ng t&ocirc;i như muối trong biển, nhỏ b&eacute; m&agrave; mang vẻ đẹp mặn m&agrave; của biển cả, Sel de Mer cũng kho&aacute;c lớp &aacute;o khi&ecirc;m nhường m&agrave; ẩn chứa v&ocirc; v&agrave;n trải nghiệm gi&agrave;u cảm x&uacute;c bạn đang t&igrave;m kiếm! Với tất cả t&acirc;m huyết của m&igrave;nh, ch&uacute;ng t&ocirc;i mong muốn quan t&acirc;m đến từng khoảnh khắc trải nghiệm của bạn, mong muốn kết nối mọi người với mọi người, mọi người với cộng đồng, mọi người với m&ocirc;i trường v&agrave; cung cấp c&aacute;c dịch vụ tận t&igrave;nh nhất cho Qu&yacute; Kh&aacute;ch cũng như hiểu được cảm x&uacute;c v&agrave; mong đợi của Qu&yacute; Kh&aacute;ch. Sel de Mer Hotel &amp; Suites &ndash; nơi đến để thư gi&atilde;n v&agrave; c&acirc;n bằng cuộc sống.<\\/p>\"}', NULL, '2020-10-13', 'admin', '2020-11-25', 'hailan'),
(3, 'setting_social', '{\"facebook\":\"https:\\/\\/www.facebook.com\\/huynhminhsangit\",\"group\":\"https:\\/\\/www.facebook.com\\/groups\\/ZendVN.Group\",\"fan_page\":\"https:\\/\\/webformatter.com\\/json\",\"youtube\":\"https:\\/\\/www.youtube.com\\/\"}', NULL, '2020-10-13', 'admin', '2020-10-14', 'hailan'),
(33, 'setting_seo', '{\"meta_keyword\":\"meta keyword\",\"meta_description\":\"meta description\"}', NULL, '2020-07-09', 'haideptrai', '2020-11-17', 'hailan'),
(34, 'setting_script', '{\"script_head\":\"http:\\/\\/127.0.0.1:8000\\/admin123\\/setting\",\"script_body\":\"http:\\/\\/127.0.0.1:8000\\/admin123\\/setting\"}', NULL, '2020-06-26', 'HaiDepTrai', '2020-11-17', 'hailan');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

DROP TABLE IF EXISTS `slider`;
CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `link` varchar(200) NOT NULL,
  `thumb` text,
  `created` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `status` text,
  `ordering` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `name`, `description`, `link`, `thumb`, `created`, `created_by`, `modified`, `modified_by`, `status`, `ordering`) VALUES
(1, 'Tham dự sự kiện và lễ hội', 'Thưởng thức và khám phá', 'http://sky-hotel.xyz/', 'dzhyH16xNK.jpeg', '2019-04-15 00:00:00', 'hailan', '2020-11-25 00:00:00', 'hailan', 'active', 1),
(2, 'Tận hưởng trải nghiệm sang trọng', 'trải nghiệm với chúng tôi', 'https://zendvn.com/', 'i7C2pBPey8.jpeg', '2019-04-18 00:00:00', 'hailan', '2020-11-25 00:00:00', 'hailan', 'active', 2),
(3, 'Chào mừng đến với khách sạn SkyLine', 'Dịch vụ đẳng cấp hàng đầu tại Đà Nẵng', 'http://sky-hotel.xyz/', '2fStoNIXVJ.jpeg', '2019-04-24 00:00:00', 'hailan', '2020-11-25 00:00:00', 'hailan', 'active', 3);

-- --------------------------------------------------------

--
-- Table structure for table `subscribe`
--

DROP TABLE IF EXISTS `subscribe`;
CREATE TABLE IF NOT EXISTS `subscribe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribe`
--

INSERT INTO `subscribe` (`id`, `email`, `status`, `created`) VALUES
(1, 'thanhhai3295@gmail.com', 'uncontact', '2020-11-24 00:00:00'),
(2, 'test@gmail.com', 'uncontact', '2020-11-24 14:11:52'),
(3, 'test@gmail.com', 'contact', '2020-11-24 21:11:06');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `status` varchar(10) DEFAULT '0',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `fullname`, `password`, `avatar`, `level`, `created`, `created_by`, `modified`, `modified_by`, `status`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin123456', 'e10adc3949ba59abbe56e057f20f883e', '1ctW8mj8vq.png', 'admin', '2014-12-10 08:55:35', 'admin', '2019-05-04 14:47:14', 'hailan', 'active'),
(2, 'hailan', 'hailan@gmail.com', 'hailan', '7c6f3ef49405d8a330aaa19ca0d0f6af', '1eSGmvZ3gM.jpeg', 'admin', '2014-12-13 07:20:03', 'admin', '2019-05-04 08:47:04', 'hailan', 'active'),
(3, 'user123', 'test@gmail.com', 'user123', 'e10adc3949ba59abbe56e057f20f883e', 'Hb1QSn1CL8.png', 'member', '2019-05-04 00:00:00', 'admin', '2019-05-04 08:47:07', 'hailan', 'active'),
(4, 'user456', 'user456@gmail.com', 'user456', 'e10adc3949ba59abbe56e057f20f883e', 'J1uknUz0T6.png', 'member', '2019-05-04 00:00:00', 'admin', '2020-10-11 00:00:00', 'hailan', 'active'),
(7, 'admin123', 'admin123@gmail.com', 'admin123', 'e10adc3949ba59abbe56e057f20f883e', '3rjIHfyWJU.jpeg', 'admin', '2020-10-11 00:00:00', 'hailan', '2020-10-11 00:00:00', 'hailan', 'active');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
