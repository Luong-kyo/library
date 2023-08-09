-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 25, 2023 lúc 01:53 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `library`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sach_the`
--

CREATE TABLE `sach_the` (
  `id` int(10) NOT NULL,
  `themuon_id` int(10) NOT NULL,
  `sach_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `sach_the`
--

INSERT INTO `sach_the` (`id`, `themuon_id`, `sach_id`) VALUES
(11, 1, 1),
(12, 1, 4),
(13, 1, 20),
(14, 1, 31),
(15, 2, 32),
(16, 2, 33),
(17, 3, 2),
(18, 3, 5),
(19, 3, 24),
(20, 4, 32),
(21, 6, 4),
(22, 6, 7),
(23, 5, 1),
(24, 5, 3),
(25, 5, 7),
(26, 5, 22),
(27, 5, 27),
(28, 5, 31),
(29, 5, 32),
(30, 5, 33),
(31, 6, 3),
(32, 6, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(5) NOT NULL,
  `admin_taikhoan` varchar(50) NOT NULL,
  `admin_matkhau` varchar(50) NOT NULL,
  `admin_ten` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_taikhoan`, `admin_matkhau`, `admin_ten`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'luong'),
(2, 'luong', 'cd67e095aa87a04d2bfb63a3b8f24309', 'Lượng 2');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_author`
--

CREATE TABLE `tbl_author` (
  `author_id` int(10) NOT NULL,
  `author_ten` varchar(50) NOT NULL,
  `author_chitiet` varchar(5000) NOT NULL,
  `author_img` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_author`
--

INSERT INTO `tbl_author` (`author_id`, `author_ten`, `author_chitiet`, `author_img`) VALUES
(1, 'Sái Văn Lượng', 'Đẹp trai', 'businessman.png'),
(2, 'John Green', 'John Michael Green (sinh ngày 24 tháng 8 năm 1977) là một tác giả người Mỹ và người sáng tạo nội dung YouTube . Anh đã giành được Giải thưởng Printz năm 2006 cho cuốn tiểu thuyết đầu tay “Đi Tìm Alaska” và cuốn tiểu thuyết cá nhân thứ tư của an. “The Fault in Our Stars”, ra mắt ở vị trí số một trong danh sách Sách bán chạy nhất của The New York Times vào tháng 1 năm 2012. The Bộ phim chuyển thể năm 2014 mở màn ở vị trí số một tại phòng vé. Năm 2014, Green được tạp chí Time đưa vào danh sách 100 người có ảnh hưởng nhất trên thế giới. Một bộ phim khác dựa trên tiểu thuyết Green, Paper Towns , được phát hành vào ngày 24 tháng 7 năm 2015. Ngoài vai trò là một tiểu thuyết gia, Green còn nổi tiếng với các hoạt động mạo hiểm trên YouTube . Năm 2007, anh ra mắt kênh Vlogbrothers cùng với anh trai của mình, Hank Green . Kể từ đó, John và Hank đã khởi động các sự kiện như Project for Awesome và VidCon và tạo ra tổng cộng 11 loạt phim trực tuyến, bao gồm Crash Course , một kênh giáo dục dạy về văn học, lịch sử, khoa học và các chủ đề khác.', 'john-green-792932.jpg'),
(3, 'Akio Morita', 'Akio Morita (sinh năm 1921), cùng với một số doanh nhân khác, là hiện thân của sự phục hồi và tăng trưởng sau chiến tranh của ngành công nghiệp Nhật Bản. Morita và Tập đoàn Sony, do ông đồng sáng lập với Masaru Ibuka, thách thức các quan niệm thông thường về \"phép màu kinh tế\" của Nhật Bản. Năng lượng và sự sáng tạo của các công ty nhỏ, độc lập như Sony, không phải keiretsu (thỏa thuận tập đoàn công nghiệp) hay Bộ Thương mại và Công nghiệp Quốc tế (MITI), là động lực cho sự phát triển kinh tế của Nhật Bản sau chiến tranh; các sản phẩm công nghệ cao đáng tin cậy của họ đã thay đổi hình ảnh hàng xuất khẩu của Nhật Bản ra nước ngoài. Tuổi thơ Gia đình Morita là một gia đình có truyền thống sản xuất nước tương, miso và sake ở bán đảo Chita, tỉnh Aichi từ năm 1665. Ông là con trai cả trong một gia đình có bốn anh em và ngay từ nhỏ đã được người cha là Kyuzaemon huấn luyện, kì vọng để trở thành người nối tiếp truyền thống của gia đình. Tuy nhiên, Akio lại tìm ra được niềm đam mê của mình, không phải là nước tương, sake hay miso như cha mong đợi, mà đó là niềm đam mê với toán học và vật lí học. Năm 1944, ông đã tốt nghiệp Đại Học Hoàng Gia Osaka với tấm bằng cử nhân Vật Lí trong tay, sau đó, ông gia nhập Hải Quân với quân hàm trung úy trong suốt thời kì Chiến Tranh Thế Giới thứ II. Chính thời điểm này, Morita đã gặp người bạn làm ăn sau này – Masaru Ibuka tại Ủy Ban Nghiên Cứu Hải Quân Thời Chiến.', 'akio-morita-877371.jpg'),
(4, 'Nguyễn Hiến Lê', 'Nguyễn Hiến Lê (ngày 8 tháng 1 năm 1912 – ngày 22 tháng 12 năm 1984) là học giả, nhà văn, dịch giả, nhà ngôn ngữ học, nhà giáo dục và hoạt động văn hóa độc lập Việt Nam, có 120 tác phẩm sáng tác, biên soạn và dịch thuật thuộc nhiều lĩnh vực khác nhau như giáo dục, văn học, ngữ học, triết học, lịch sử, du ký, gương danh nhân, chính trị, kinh tế, v.v.', 'NGUYỄN-HIẾN-LÊ-2.jpg'),
(5, 'Murakami Haruki ', 'Murakami Haruki (村上 春樹 (Thôn Thượng Xuân Thụ)? sinh ngày 12 tháng 1 năm 1949) là một trong những tiểu thuyết gia, dịch giả văn học người Nhật Bản được biết đến nhiều nhất hiện nay cả trong lẫn ngoài nước Nhật. Từ thời điểm nhận giải thưởng Nhà văn mới Gunzo năm 1979 đến nay, hơn một phần tư thế kỷ hoạt động và viết lách, tác phẩm của ông đã được dịch ra khoảng 50 thứ tiếng trên thế giới, đồng thời trong nước ông là người luôn tồn tại ở tiền cảnh sân khấu văn học Nhật Bản. Murakami đã trở thành hiện tượng trong văn học Nhật Bản đương đại với những mĩ danh \"nhà văn được yêu thích\", \"nhà văn bán chạy nhất\", \"nhà văn của giới trẻ\".\r\n\r\n', 'OIP.jpg'),
(6, 'Roland Barthes', 'Roland Barthes, tên đầy đủ là Roland Gérard Barthes, (sinh ngày 12 tháng 11 năm 1915, Cherbourg, Pháp - mất ngày 25 tháng 3 năm 1980, Paris), nhà tiểu luận và nhà phê bình văn học và xã hội người Pháp có các bài viết về ký hiệu học, nghiên cứu chính thức về các ký hiệu và dấu hiệu đi tiên phong bởi Ferdinand de Saussure , đã giúp thiết lập chủ nghĩa cấu trúc và Chủ nghĩa phê bình mới như những phong trào trí thức hàng đầu. Công trình của Barthes mở rộng trên nhiều lĩnh vực và ông đã ảnh hưởng đến sự phát triển của các trường phái lý thuyết bao gồm chủ nghĩa cấu trúc , ký hiệu học, chủ nghĩa hiện sinh , chủ nghĩa Mác và chủ nghĩa hậu cấu trúc . Chủ nghĩa xuyên suốt các tác phẩm của Barthes là chủ nghĩa quân bình cấp tiến. Trong thời kỳ trước đó, theo chủ nghĩa Marx, Barthes đã phê phán điều mà ông coi là ngụy biện của văn hóa tư sản, việc tư bản chiếm đoạt các dấu hiệu để tạo ra ảo tưởng về một ý nghĩa ổn định, cố định.', 'roland-barthes-997042.jpg'),
(18, 'Võ Trung Kiên', '', 'businessman.png'),
(20, 'Trần Văn Hải', '', 'businessman.png'),
(21, 'Nguyễn Chu Nam Phương', '', 'businessman.png'),
(22, 'Đỗ Nhật nam', 'Đỗ Nhật Nam (sinh năm 2001) là một sinh viên người Việt Nam được biết đến như là một người trẻ tài năng, một thần đồng. Ngoài ra, anh cũng là một người viết sách và một dịch giả. Hiện anh có dự định theo đuổi ngành âm nhạc.\r\n\r\nNăm 7 tuổi, Đỗ Nhật Nam được trao kỷ lục dịch giả nhỏ tuổi nhất Việt Nam: anh là dịch giả của hai cuốn sách Nạp điện và Câu chuyện của ngày và đêm. Năm 11 tuổi anh đã viết tự truyện song ngữ Tớ đã học tiếng Anh như thế nào? và là tổng biên tập một tờ báo dành cho tuổi teen. Năm 2014, anh nhận giải Đại sứ truyền cảm hứng của WeChoice Awards. Cùng năm, anh đi du học Hoa Kỳ tại trường St. P,aul The Apostle. Năm 2016, bài thơ anh viết tặng con gái đại tá Trần Quang Khải gây chú ý lớn. Thời điểm đang học lớp 10, anh đã học xong chương trình lớp 11, 12. Cuối năm 2018, anh nhận được một khoản hỗ trợ chi phí học tập trị giá 7 tỷ đồng từ Pomona - một trường đại học tư thục có lịch sử lâu đời nằm cạnh Los Angeles.', 'R.png'),
(23, 'Brian Trancy', 'Brian Tracy (sinh ngày 5 tháng 1 năm 1944) là một người Mỹ gốc Canada. Ông  được sinh ra trong một gia đình bình thường nhưng bằng nỗ lực của mình ông đã nhanh chóng trở thành chủ tịch điều hành công ty của riêng mình là Brian Tracy International, thành lập vào năm 1984 tại Vancouver, British Columbia, Canada. \r\n\r\nĐến năm 2003, Tracy là một trong 135 ứng cử viên sáng giá trong cuộc bầu cử bãi nhiệm chức giám đốc thẩm bang California trên một nền tảng độc lập, với tổng cộng 729 phiếu bầu. Brian Tracy là thành viên được tín nhiệm của Tổ chức Think-Tank The Heritage Foundation từ năm 2003.\r\n\r\nÔng đã du lịch rất nhiều nơi trên thế giới như: Các nước Châu Âu, Đông Nam Á, Thái Bình Dương, Mỹ và Canada. Ông hợp tác và làm việc với hơn 80 quốc gia và có thể dùng đến 4 loại ngôn ngữ để giao tiếp.', 'Brian_Tracy.jpg'),
(24, 'Vũ Trọng Phụng', 'Vũ Trọng Phụng sinh năm 1912, quê tại Hưng Yên nhưng được sinh ra và lớn lên ở Hà Nội. Ông xuất thân trong một gia đình nghèo khó và trải qua một tuổi thơ đầy cơ cực. Năm mười sáu tuổi, ông phải thôi học tìm việc để kiếm tiền mưu sinh. Ông từng là thư ký đánh máy cho hãng buôn Goddard và có khoảng thời gian dài thử việc tại nhà in Viễn Đông, sau khi bị đuổi ông chuyển hẳn sang làm báo rồi bắt đầu con đường viết văn.', 'vu-trong-phung-908594.jpg'),
(25, 'Ngô Tất Tố', 'Nhà văn Ngô Tất Tố (còn có các bút danh khác như Lộc Hà, Phó Chi, Thôn Dân, Khẩu Thiết Nhi, Xứ Tố, Lộc Đình, Thục Điểu, Tuệ Nhỡn, Đạm Hiên, Thuyết Hải, Hy Từ, Xuân Trào...) sinh năm 1894 tại quê gốc là làng Lộc Hà, Tử Sơn, Bắc Ninh (nay là xã Mai Lâm, Đông Anh, Hà Nội). Ông là Đảng viên Đảng Cộng sản Việt Nam. Trước cách mạng, Ngô Tất Tố làm rất nhiều nghề như dạy học, bốc thuốc, làm báo, viết văn; từng cộng tác với nhiều tờ báo như An Nam tạp chí, Đông Pháp thời báo, Thần Chung, Phổ Thông, Đông Dương, Công Dân, Hải Phòng tuần báo, Hà Nội Tân Văn, Thực Nghiệp, Tương Lai, Thời Vụ, Con Ong, Việt Nữ, Tiểu Thuyết Thứ Ba. Cách mạng Tháng Tám, ông tham gia ủy ban Giải phóng xã (Lộc Hà). Năm 1946, Gia nhập Hội Văn hoá Cứu quốc và lên chiến khu Việt Bắc tham gia kháng chiến chống Pháp. Nhà văn từng là Chi hội trưởng Chi hội Văn nghệ Việt Bắc, hoạt động ở Sở thông tin khu XII, tham gia viết các báo như Cứu Quốc Khu XII, Thông Tin Khu XII, Tạp Chí Văn Nghệ Và Báo Cứu Quốc Trung Ương... và viết văn. Ông đã là Ủy viên Ban Chấp hành Hội Văn nghệ Việt Nam (trong Đại hội Văn nghệ Toàn quốc lần thứ I - 1948). Ngô Tất Tố mất ngày 20 tháng 4 năm 1954 (tức 18-3 năm Giáp Ngọ) tại Yên Thế, Bắc Giang.', 'ngo-tat-to-543580.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(10) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(2, 'Tài liệu học tập'),
(3, 'Kinh tế'),
(4, 'Đời sống'),
(5, 'Truyện');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_docgia`
--

CREATE TABLE `tbl_docgia` (
  `docgia_id` int(10) NOT NULL,
  `docgia_ten` varchar(30) NOT NULL,
  `docgia_sdt` int(10) NOT NULL,
  `docgia_ngaysinh` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_docgia`
--

INSERT INTO `tbl_docgia` (`docgia_id`, `docgia_ten`, `docgia_sdt`, `docgia_ngaysinh`) VALUES
(20191234, 'nguyễn văn a', 123456789, '2023-03-01'),
(20198244, 'Sái Văn Lượng', 969274295, '2001-10-06'),
(111111111, 'nguyễn văn b', 987654321, '2000-11-16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sach`
--

CREATE TABLE `tbl_sach` (
  `sach_id` int(10) NOT NULL,
  `category_id` int(10) NOT NULL,
  `sach_name` varchar(50) NOT NULL,
  `author_id` int(10) NOT NULL,
  `sach_chitiet` varchar(5000) NOT NULL,
  `sach_img` varchar(200) NOT NULL,
  `sach_link` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_sach`
--

INSERT INTO `tbl_sach` (`sach_id`, `category_id`, `sach_name`, `author_id`, `sach_chitiet`, `sach_img`, `sach_link`) VALUES
(1, 4, 'Khi Lỗi Thuộc Về Những Vì Sao', 2, 'Hazel (Shailene Woodley) là một cô gái trẻ mắc bệnh ung thư tuyến giáp đã di căn tới phổi đang sống lơ đễnh trong những ngày cuối cùng của cuộc đời. Augustus (Ansel Elgort) mắc chứng bệnh ung thư xương với một bên chân giả và nỗi sợ một ngày nào đó mình sẽ chìm vào quên lãng. Hai người gặp nhau tại một câu lạc bộ dành cho những bệnh nhân ung thư gặp khó khăn trong việc hòa nhập cuộc sống. Họ tranh luận về việc ai rồi một ngày cũng sẽ phải đối diện với cái chết và trở thành bạn của nhau.<br><br>\r\n<br>\r\n\r\n\r\nMặc dù phép màu y học đã giúp thu hẹp khối u và ban thêm vài năm sống cho Hazel nhưng cuộc đời cô bé đang ở vào giai đoạn cuối, từng chương kế tiếp được viết theo kết quả chẩn đoán. Nhưng khi có một nhân vật điển trai tên là Augustus Waters đột nhiên xuất hiện tại Hội Tương Trợ Bệnh Nhi Ung Thư, câu chuyện của Hazel sắp được viết lại hoàn toàn.<br><br>\r\n\r\n\r\nHazel và Augustus không chỉ là những nhân vật trong một bi kịch tình yêu ướt át mà đã trở thành một hiện tượng trong giới trẻ với phương châm sống của những \"Nerdfighter\" (người đấu tranh với số phận), với những \"mật ngữ\" thân thuộc như \"okay\" (có nghĩa là \"always\") hay những quan niệm sống như \"Không có công xưởng sản xuất điều ước nào trên đời\".<br><br><br>\r\n\r\nJohn Green đã chinh phục trái tim khán giả không phải bởi câu chuyện tình yêu nhiều nước mắt mà chính vì những mảnh ghép hết sức đời thường, giản dị của cuộc sống. Không có phép màu, cũng chẳng có một cái kết đẹp như cổ tích. Thậm chí, cuộc đời vẫn nghiệt ngã và phũ phàng đến phút cuối với Hazel. Cuộc gặp gỡ không như mơ với nhà văn thần tượng đã kéo cô về với cuộc đời thực. Ở đó có bóng dáng của thần chết, nhưng cũng có cả Augustus thương yêu.<br><br><br>\r\n\r\nLấy ý tưởng từ một vở kịch của Shakespeare - \"The fault is not in our stars, but in ourselves\" (Lỗi Không Phải Bởi Những Vì sao, Lỗi Thuộc Về Chúng Ta), tác giả John Green đã đặt tên cho cuốn sách của mình với hàm ý lỗi thuộc về những vì sao định mệnh chiếu sai đường, nên những người yêu thương chẳng thể đồng hành cùng nhau.', 'khi-loi-thuoc-ve-nhung-vi-sao-529501.jpg', 'https://file.nhasachmienphi.com/nhasachmienphi-khi-loi-thuoc-ve-nhung-vi-sao.epub'),
(2, 3, 'Chế Tạo Tại Nhật Bản', 3, '\"Chế Tạo Tại Nhật\" cuốn sách do Akio Morita viết về ông và những người sáng lập Sony, cùng một đồng nghiệp khác trong quá trình phát triển Tập đoàn Sony. Made in Japan chính là giấc mơ của những chàng thanh niên Nhật Bản trẻ tuổi (trong số những người sáng lập Sony khi đó, Morita mới 25 tuổi còn Ibuka 36 tuổi).\r\n\r\nTrong cuốn sách của mình, Morita đã trình bày những nguyên tắc cơ bản trong lĩnh vực quản trị để có được thành công trong kinh doanh. Như ông đã khuyên chúng ta, \"Một doanh nhân hay một công ty muốn trở nên hùng mạnh, không chỉ nhằm vào mục tiêu thu lợi nhuận mà còn phải biết đặt ra một sứ mạng cho mình, sứ mạng về giá trị và những gì họ mong muốn mang lại cho cộng đồng\".\r\n\r\nTrong hồi ký của mình, chủ tịch đầu tiên của Sony, đã viết \"Mục tiêu và động lực cao nhất của chúng tôi khi đó là thiết lập một công ty có môi trường tự do, khuyến khích các ý tưởng, một chỗ làm việc ổn định, nơi những kỹ sư có kiến thức chuyên sâu về công nghệ có thể cống hiến hết sức cho lĩnh vực mà họ tâm huyết...\" Không chỉ vậy, Ibuka và Morita còn áp dụng các nét đặc trưng trong văn hóa của dân tộc Nhật Bản vào việc quản lý và thúc đẩy công nghệ mới.', 'ché-tạo-tại-nhạt-bản-961032.jpg', 'https://file.nhasachmienphi.com/nhasachmienphi-made-in-japan-che-tao-tai-nhat-ban.epub'),
(3, 5, 'Rừng Na-Uy', 5, '\"Rừng Na-Uy\" (tiếng Nhật: ノルウェイの森, Noruwei No Mori), là tiểu thuyết của nhà văn Nhật Bản Haruki Murakami, được xuất bản lần đầu vào năm 1987. Với thủ pháp dòng ý thức, cốt truyện diễn tiến trong dòng hồi tưởng của nhân vật chính - chàng sinh viên bình thường Watanabe Tōru. Cậu ta đã trải qua nhiều cuộc tình chớp nhoáng với nhiều cô gái trẻ ưa tự do. Nhưng cũng có vài mối tình sâu nặng, điển hình là với Naoko, người yêu của bạn thân cậu, một cô gái không ổn định về cảm xúc. Hay với Midori, một cô gái thẳng thắn, hoạt bát. Các nhân vật trong truyện hầu hết là những con người cô đơn móc nối với nhau. Có nhân vật đã phải tìm đến cái chết để giải thoát khỏi nỗi đau đớn ấy.\r\n\r\nCâu chuyện xảy ra với bối cảnh tại nước Nhật những năm 1960, khi mà thanh niên Nhật Bản và nhiều nước khác đang đấu tranh chống lại các định kiến tồn tại trong xã hội. Murakami miêu tả những sinh viên cải cách này, như những tên đạo đức giả và thiếu sự kiên định.\r\n\r\nTác phẩm này đã đưa Murakami lên thành một trong những nhà văn hàng đầu của Nhật Bản.\r\n\r\nTên nguyên gốc của tác phẩm là \"Noruwei No Mori\" - cách dịch tiêu chuẩn trong tiếng Nhật cho tựa bài hát \"Norwegian Wood\" được John Lennon viết khi còn trong nhóm The Beatles (và cũng thường được nhắc đến trong cốt truyện).\r\n\r\nTác phẩm được dịch sang tiếng Việt và xuất bản lần đầu tiên vào năm 1997 do Kiều Liên và Hải Thanh thực hiện, Bùi Phụng hiệu đính. Năm 2006 bản dịch mới của Trịnh Lữ được công bố. Cả hai bản đều được dịch từ tiếng Anh.', 'rung-na-uy-454685.jpg', ''),
(4, 5, 'Những huyền thoại', 6, 'Chúng ta luôn lạc lõng giữa đối tượng, vì chúng ta bất lực không thể hiện được tổng thể của nó. Bởi vì, nếu ta thâm nhập đối tượng, giải phóng nhưng phá huỷ đối tượng. Nhưng nếu để mặc nó, chúng ta tôn trọng hay khôi phục thì vẫn bị huyễn hoặc.\r\n\r\nNgay trong \"lời tựa\" Roland Barthes đã khẳng định ý muốn \"tóm tắt sự lạm dụng ý hệ ẩn nấp\", chỉ ra tính chất dối trá của các huyền thoại. Antoine Compagnon, mặc dù khẳng định \"Những huyền thoại\" vẽ lại cả một giai đoạn lịch sử của nước Pháp, nhưng cũng nhấn mạnh là không được quên luận đề đầu tiên của cuốn sách: \"Tố cáo sự tha hoá của người dân thông qua ý hệ\". Đối tượng thực thụ của Những huyền thoại chính là ý hệ của xã hội tư sản.\r\n\r\n\"Những Huyền Thoại\" bao gồm hai phần. Phần đầu lấy tiêu đề trùng với nhan đề của sách tập hợp 53 bài viết từ 1954 đến 1956 về các vấn đề thời sự hàng ngày hết sức đa dạng ông quan sát và nghiền ngẫm trong xã hội Pháp, chất liệu của những bài viết ấy có thể là một bộ phim, một bài báo, một tấm ảnh ở trang bìa tờ tạp chí, một cuộc triển lãm... Phần thứ hai mang tiêu đề \"Huyền thoại, ngày nay...\" (Le mythe, aujourd’hui...) có thể xem như lời hậu bạt dài khép lại cuốn sách.\r\n\r\nSự phê phán xã hội bộc lộ rõ nét trong sách đã được Barthes phê phán cái \"xã hội chúng ta\", \"môi trường ưu đãi của những biểu đạt huyền thoại\", nơi chốn của \"một chế độ tư hữu nhất định\", \"một trật tự nhất định\". Với ông, huyền thoại làm con người mù quáng không thể nhìn nhận rõ điều kiện lịch sử của chính mình, còn nghiên cứu về huyền thoại thì làm người ta nhìn rõ mọi thứ.', 'nhung-huyen-thoai-329283.jpg', ''),
(5, 4, 'Săn Sóc Sự Học Của Con Em', 4, 'Săn sóc sự học của trẻ là một bổn phận của phụ huynh và là một nghệ thuật cần biết một chút ít về tâm lý và môn sư phạm.\r\n\r\nVì thấy từ trước tới nay chưa có ai giúp độc giả hiểu nghệ thuật đó và làm trọn nhiệm vụ đó, nên chúng tôi soạn cuốn này, đem kinh nghiệm của một người cha và một nhà giáo ra góp ý kiến với chư vị.\r\n\r\nChúng tôi ráng viết cho thật giản dị để những bực phụ huynh ít học cũng có thể hiểu và áp dụng ngay được. Những đoạn nào hơi có tính cách chuyên môn, khó hiểu thì chúng tôi cho in chữ nghiêng để độc giả dễ nhận. Những đoạn ấy, hiểu được thì càng hay, không cũng không hại.\r\n\r\nChúng tôi lại ráng viết cho vắn tắt, bỏ phần lý thuyết vu vơ để độc giả khỏi chán. Nếu khảo cứu tỉ mỉ về lý thuyết thì nhiều chương trong cuốn này có thể soạn thành những bộ sách hàng ngàn trang được. Chúng tôi vẫn biết phần đông độc giả đều bận bịu như một bạn đồng nghiệp nọ của chúng tôi; đưa cho anh một cuốn về tân giáo dục dày độ bốn trăm trang, anh xua tay và lắc đầu lia lịa: “Không có thì giờ, không có thì giờ”, nên tự hạn chế, không viết quá trăm rưỡi trang. Song chúng tôi chắc vẫn có một số độc giả chưa được thỏa mãn khi đọc hết cuốn này và muốn tìm hiểu thêm, nên chúng tôi sẽ kể tên những tác phẩm quan trọng để chư vị đó đỡ mất công tìm kiếm.\r\n\r\nTóm lại, chúng tôi chỉ muốn, trong cuốn này, hướng dẫn chư vị một cách thiết thực trong sự săn sóc sự học của trẻ, tuyệt nhiên không có ý nghiên cứu về giáo dục.\r\n\r\nSách tuy mỏng mà có thể đem hạnh phúc vào gia đình chư vị đấy. Mỗi lần vào gia đình nào mà thấy dưới ánh đèn, một đầu hoa râm và một đầu xanh cùng cúi trên một trang sách, thì không cần xét điều gì khác nữa, tôi chắc chắn rằng gia đình ấy đương vui vẻ và sẽ thịnh vượng.', 'san-soc-su-hoc-cua-con-em-580040.jpg', ''),
(6, 2, 'Kim Chỉ Nam Của Học Sinh', 4, 'Tôi viết cuốn này chỉ có mục đích gom góp, sắp đặt lại những điều ấy thành một hệ thống, để nhắc lại các em và hướng dẫn các em trong sự thực hành.\r\n\r\nCác em phải thực hành ngay đi. Biết mà không làm thì không phải là biết. Đã tri được thì hành được; có hành được mới chứng được tri; tri hành không thể chia làm hai. Đó là học thuyết tri hành hợp nhất của Vương Dương Minh, một triết gia Trung Quốc đã được cả dân tộc Nhật Bản tôn sùng và đã làm cho nước Nhật cường thịnh một thời, lấn át cả Âu Mỹ. Mà đó cũng là nguyên tắc giáo khoa của người Mỹ bây giờ.\r\n\r\nMà các em biết không, người Việt chúng ta cũng có một tiếng đủ tóm được học thuyết của họ Vương và phương pháp của người Mỹ, tiếng đó là Học Hành. Học và hành chỉ là một, cho nên học và hành đi liền với nhau thành một tiếng.', 'kim-chi-nam-cua-hoc-sinh-851414.jpg', ''),
(7, 3, 'Bảy Bước Đến Thành Công', 4, 'Đọc cuốn sách này, độc giả sẽ được tác giả cầm tay dắt lần lần lên bảy bực thang để đến cửa thành công. Bảy bực thang đó là: Luyện lòng tự tin và rèn nghị lực, Luyện nhân cách, Đắc nhân tâm, Luyện tập và giữ gìn sức khỏe, Khéo dùng tiếng mẹ đẻ, Luyện trí, Kiếm việc làm và dự để được thăng cấp.', 'bay-buoc-den-thanh-cong-434596.jpg', ''),
(19, 2, '60 Bài Luận Tiếng Anh Thông Dụng', 20, 'Tập sách \"60 Bài Luận Tiếng Anh Thông Dụng\" được biên soạn nhằm giúp các thí sinh làm tốt bài thi môn Viết trong các kỳ thi tiếng Anh, đặc biệt là các kỳ thi chứng chỉ quốc gia cấp độ A, B, C.\r\nSách gồm 60 bài luận thuộc đủ các đề tài thông thường từ dễ đến khó. Các bài viết tiếng Anh sử dụng từ vựng và cú pháp đơn giản, trình độ trung học phổ thông, đồng thời dịch sát nghĩa tiếng Việt ở trang đối diện. Mỗi bài được giới hạn trong khoảng 150 từ như quy định trong các đề luận tiếng Anh. Xin trân trọng giới thiệu cùng các bạn.', '60-bai-luan-tieng-anh-thong-dung-933795.jpg', ''),
(20, 2, 'Chiến Lược IELTS 7.0', 18, 'Có thể bạn đang cần IELTS để phục vụ công việc, học tập. Có thể bạn đang cần IELTS để du học hoặc định cư ở một nước nói tiếng Anh. Hoặc chỉ đơn giản là bạn đang muốn hoàn thiện các kỹ năng Anh ngữ, nghe nói đọc viết, của mình.\r\n\r\nRất nhiều người nghĩ chiến đấu với kỳ thi IELTS chẳng khác nào đánh đố như thi Đại học. Thi Đại học, ngoài chương trình chuẩn, thí sinh còn phải vật lộn với bao đánh đố đủ kiểu, khiến bạn phải học thêm ở ngoài trầy trật mới làm tốt được. Kỳ thi IELTS cũng tương tự như thế. Ngoài khả năng tiếng Anh, thí sinh còn cần hiểu biết rất nhiều kiến thức khác, phải rèn luyện thêm nhiều kỹ năng mới đạt được điểm số tốt.\r\n\r\nThực tế, hoàn toàn không phải vậy. IELTS cũng chỉ là tiếng Anh. Khả năng Anh ngữ của bạn sẽ quyết định 80% điểm số IELTS của bạn.\r\n\r\nCuốn sách này là tổng hợp những tâm huyết, kinh nghiệm và cả sai lầm trong việc học Anh ngữ và thi IELTS của chính tác giả Võ Trung Kiên và những người đi trước. Mục đích khi tác giả viết cuốn sách này là để giúp các bạn đi sau chinh phục được mục tiêu học tiếng Anh của mình một cách nhanh chóng và dễ dàng nhất.\r\n\r\nBằng những phương pháp thiết thực, dễ thực hiện mà tác giả Võ Trung Kiên đưa ra trong cuốn sách này, bạn sẽ rất dễ tiếp nhận và thực hành theo. Nếu luyện tập đúng phương pháp và kiên trì thực hiện, chắc chắn bạn sẽ thành công trong việc học Anh ngữ.', 'chien-luoc-ielts-70-801758.jpg', ''),
(21, 2, '7 Cách Học Tiếng Anh Du Kích', 21, 'Một buổi chiều năm 2010, tôi tình cờ gặp Nam Phương tại một khóa học tư duy tích cực. Lúc đó cậu ấy có biệt danh là Phương Live với tài viết Blog, những thông điệp cuộc sống sâu sắc của Phương đã làm nhiều người trung niên như tôi phải “té ghế” khi biết tác giả chỉ mới 19 tuổi.\r\n\r\nNăm 2011, chúng tôi thành lập Câu lạc bộ Bạn Bè Tốt với gần 2000 thành viên, luôn động viên nhau bằng những bài viết và hành động tích cực. Ngoài ra còn giúp nhau tự học tiếng Anh, rồi offline ba miền thật xúc động. Dù dự án phi lợi nhuận ấy chưa thành công như mong đợi, nhưng chúng tôi đã có những bài học ý nghĩa về tình bạn, sự sẻ chia, và tinh thần vượt khó.\r\n\r\nSau đó, Phương đã đi theo con đường trở thành một chuyên gia đào tạo về phương pháp học tập tăng tốc cho học sinh. Còn tôi thì tập trung vào nghiên cứu giảng dạy tiếng Anh du lịch, kỹ năng giao tiếp thực tiễn cho các giám đốc ngân hàng, rồi dịch một số đầu sách bán chạy về kinh doanh.\r\n\r\nThấm thoắt đã gần 6 năm, dù ít gặp nhau nhưng niềm đam mê giúp đỡ các bạn trẻ đã kéo chúng tôi trở lại và thành lập OuchMaster – một câu lạc bộ giúp làm chủ tiếng Anh qua thuyết trình. Dù Phương không hề thừa nhận mình là một người giảng dạy ngoại ngữ, nhưng tôi xin khẳng định: đây là cẩm nang tự học thực sự độc đáo và cực kỳ hữu ích, chắc chắn sẽ giúp bạn rút ngắn thời gian làm chủ các kỹ năng tiếng Anh của mình một cách hiệu quả.\r\n\r\nNhững “bí kíp” này đã được “thực chứng” trong thời gian chúng tôi cùng nhau giúp đỡ các bạn trẻ, cộng thêm kinh nghiệm thực tế giảng dạy và tư vấn tiếng Anh cho 2500 học viên trong 6 năm qua của tôi.\r\n\r\nMong bạn có những trải nghiệm thật tuyệt với cuốn cẩm nang này.', '7-cach-hoc-tieng-anh-du-kich-628645.jpg', ''),
(22, 2, 'Tớ Đã Học Tiếng Anh Như Thế Nào', 22, 'Tớ đã học tiếng Anh như thế nào? với những ghi chép của chính Đỗ Nhật Nam từ khi em chia tay mẫu giáo, vào lớp một và bắt đầu học tiếng Anh sẽ giúp bạn trả lời câu hỏi đó. Bên cạnh những câu chuyện dí dỏm, những phương pháp học tiếng Anh đặc biệt, cuốn sách còn có 14 bài luận về nhiều chủ đề khác nhau được Nhật Nam viết trong quá trình luyện thi.\r\n\r\nNgày mới mở ra showroom kiêm phòng đọc sách miễn phí tại 119, C5, ngay trên mặt con phố Tô Hiệu, quận Cầu Giấy, đông đúc, trong khu vực dân trí cao, hầu như ngày nào tôi cũng qua đó để pha trà, mời kẹo và giao lưu với bạn đọc, với những ai yêu thích sách. Và hình như niềm vui lớn nhất của người mà sau này được mệnh danh là “tiến sĩ văn hóa đọc” như tôi là được nói chuyện và tâm tình với những ai cũng mê sách như mình, muốn ứng dụng tốt nhất những gì từ sách vào công việc và cuộc sống như mình.\r\n\r\n \r\n\r\nCó nhiều vị khách đặc biệt đã đến với phòng đọc sách miễn phí này và một trong số đó là cậu bé dẫn chương trình “Chúc bé ngủ ngon” trên đài truyền hình Việt Nam với cái tên quen thuộc Đỗ Nhật Nam. Tôi hơi ngạc nhiên vì cậu bé 6 tuổi mà nói tiếng anh khá tốt và thích nói chuyện với tôi bằng tiếng anh. Tôi bất ngờ khi cậu bé trả lời câu hỏi của một đồng nghiệp tại Thái Hà Books “Cháu có biết ai là giám đốc công ty sách Thái Hà” rằng chính là tôi, với lý do rất trẻ con nhưng cũng rất người lớn “Bởi bác ấy biết tiếng anh rất tốt. Giám đốc công ty sách thì phải giỏi ngoại ngữ chứ”. Sau này khi thấy tôi biết 4 ngoại ngữ, Nhật Nam nói “Cháu biết ngay mà!”.\r\n\r\nNhật Nam muốn dịch sách. Vì chiều Nhật Nam và bố mẹ cháu nên chúng tôi đưa cho cu cậu mấy cuốn trong bộ “Cu tý khám phá thế giới” với mong muốn thật lòng “để cháu đọc cho vui”. Bởi chẳng nhẽ lại nói luôn rằng “làm sao mà cháu dịch được!”. Khi đó Nhật Nam mới 6 tuổi. Đưa sách cho Nhật Nam và chúng tôi quên mất chuyện này.\r\n\r\nNgày nhận được bản dịch của cháu, chúng tôi hoàn toàn bất ngờ. Không chỉ bất ngờ ở trình độ tiếng Anh mà là kỹ năng dịch thuật. Tôi bị hút hồn bởi ngôn từ của cháu. Thế là Thái Hà Books dừng ngay việc in bộ sách với bản dịch đã được chọn trước đây của dịch giả Vương Tuấn Anh. Cả Thái Hà Books thừa nhận: Đây mới là giọng dịch đối với một cuốn sách dành cho những cu tý muốn khám phá thế giới.', 'to-da-hoc-tieng-anh-nhu-the-nao-895600.jpg', ''),
(24, 3, '21 Nguyên Tắc Tự Do Tài Chính', 23, 'Triệu phú cũng là người bình thường, nhưng điểm khác biệt ở chỗ họ đã áp dụng 21 nguyên tắc này trong cuộc sống và công việc của mình.', '21-nguyen-tac-tu-do-tai-chinh-394701.jpg', ''),
(25, 3, '12 Tuyệt Kỹ Bán Hàng', 23, 'Trong tương lai, ngày càng nhiều người sẽ kiếm được nhiều tiền hơn và có được những thành công vĩ đại hơn về tài chính trên con đường phát triển sự nghiệp bán hàng của mình, nhiều hơn bất cứ thời điểm nào trước đây. 5% trong số các tỉ phú tự thân là những người bán hàng, những người có xuất phát điểm rất thấp, trở thành chuyên gia trong lĩnh vực của họ, kiếm được rất nhiều tiền và trở nên giàu có. Và những gì mà hàng trăm nghìn người, thậm chí là hàng triệu người khác đã làm, bạn cũng có thể làm được. Bạn chỉ cần phải học cách làm mà thôi.\r\n\r\nDr. Peter Legge, OBC, LL.D., D. Tech. Chủ tịch đồng thời là Giám đốc điều hành, công ty Canada Wide Media Limited đã khuyên rằng: “Cuốn sách mới về nghệ thuật bán hàng của Brian Tracy sẽ giúp bạn định hình tương lai của mình với những thành công không giới hạn trong một công việc thú vị nhất mà bạn có thể lựa chọn và trở nên vượt trội. Đây thực sự là một cuốn sách cần phải có trên giá sách nhà bạn. Hãy mua, đọc, học và ứng dụng những gì đã học được từ cuốn sách. Bạn sẽ cần chúng để có thể đạt được thành công dài hạn trong tương lai.”\r\n\r\nCòn Mark C. Thompson, Tác giả của cuốn sách bán chạy nhất New York - Khen ngợi: 21 cách để nhân đôi giá trị của bạn đã nói: “Brian Tracy đã quật được một cú home run  mới! Đừng cố gắng để thuyết phục khách hàng trước khi đọc cuốn sách này. Hãy đọc và vận dụng những gì đã học được từ từng câu từng chữ trong cuốn sách và doanh số bán hàng của bạn sẽ tăng nhanh đến mức khó tin.\r\n\r\nVà tác giả thì khẳng định: “Con trai của tôi, Michael, và tôi đã cô đọng lại trong cuốn sách này tất cả những gì chúng tôi học được từ kinh nghiệm bán rất nhiều sản phẩm/ dịch vụ của mình với tổng doanh thu nhiều triệu đô la. Mọi phương pháp, công cụ được trình bày trong cuốn sách đều đã được thời gian kiểm chứng, được chứng minh và thực hành, và chúng được thiết kế để giúp bạn có thể bán hàng một cách nhanh chóng và dễ dàng hơn trong bất cứ một thị trường nào. Khi bắt đầu sự nghiệp bán hàng của mình, tôi chẳng có một chút kỹ năng hay công cụ nào mà bạn sắp được học. Tôi chưa tốt nghiệp cấp ba. Tôi làm công việc lao động chân tay trong vài năm. Khi không thể tìm nổi một công việc chân tay nào nữa, tôi chuyển sang nghề môi giới bán hàng và liên tục thực hiện các cuộc gọi ngẫu nhiên hết từ văn phòng này đến văn phòng khác trong giờ làm việc rồi đến các hộ gia đình vào buổi tối.Tôi được tham gia một chương trình đào tạo bán hàng gồm 3 phần, vốn đã rất phổ biến trên thế giới: “Đây là các vi dít của anh, đây là tài liệu dùng để giới thiệu sản phẩm, còn đây là những địa chỉ cần đến.”Nếu không bán được hàng, tôi sẽ chẳng có gì ăn. Sáng nào tôi cũng dậy vào lúc 6 giờ và chờ đợi ở bãi đỗ xe khi mọi người đến làm việc lúc 8 giờ. Kết quả bán hàng của tôi vô cùng tồi tệ. Tôi chỉ kiếm đủ tiền để ăn và để trả tiền thuê một phòng trọ nhỏ. Đôi giầy tôi đi rách nát, ví thì rỗng tuếch và bản thân tôi chẳng có một chút tương lai nào cả.”…', '12-tuyet-ky-ban-hang-356184.jpg', ''),
(26, 3, 'Thuật Marketing', 23, 'Nguyên nhân chính dẫn đến sự thành bại của một doanh nghiệp được xác định bởi sự thăng trầm của nỗ lực marketing. Theo Dun & Bradstreet, 48% thất bại trong kinh doanh là kết quả của sự ì trệ hoặc thiếu hiệu quả trong lĩnh vực marketing hay bán hàng. Trong nền kinh tế cạnh tranh đầy năng động ngày nay, marketing là phần cốt lõi của mọi doanh nghiệp thành công. Cho dù kinh doanh trong lĩnh vực nào đi chăng nữa, bạn vẫn phải cần đến marketing. Trong cuốn sách thực tế và đầy đủ thông tin về marketing này, độc giả sẽ nắm được 21 ý tưởng chính và rất nhiều ý tưởng phụ có thể tận dụng để cải thiện chiến lược marketing của mình – hãy bắt đầu ngay bây giờ. Marketing chiến lược là nghệ thuật, là khoa học trong việc xác định được thị hiếu và nhu cầu của khách hàng hiện tại và tương lai để giúp họ thỏa mãn nhu cầu bằng cách tạo ra và cơ cấu các sản phẩm và dịch vụ của bạn sao cho chúng mang đến sự hài lòng cho khách hàng.\r\n\r\nMục đích của marketing chiến lược là khuyến khích bạn bán nhiều hơn dịch vụ và sản phẩm mà bạn đang cung cấp với giá thành cao hơn trong một khu vực địa lý mở rộng và đạt được vị trí dẫn đầu, sự ổn định và thế mạnh trên thị trường.', 'thuat-marketing-391465.jpg', ''),
(27, 4, 'Tổ Chức Công Việc Gia Đình', 4, 'Sách Tổ Chức Công Việc Gia Đình chủ ý viết cho các bà nội trợ nhưng các bạn trai đã lập gia đình cũng nên đọc nó. Phụ nữ có nhiều đức quý như lòng vị tha, đa cảm, đức kiên nhẫn, tự ti ... nhưng thường theo trực giác mà không chịu luận lý, lại cố chấp, thiếu phương pháp. Vì vậy, nếu các ông chồng hiểu rõ những qui tắc trong cuốn này rồi giúp các bà vợ cùnh nhau tổ chức việc nhà thì kết quả sẽ mau hơn và không khí trong gia đình cũng đầm ấm hơn...', 'to-chuc-cong-viec-gia-dinh-576754.jpg', ''),
(28, 4, 'Tổ Chức Công Việc Theo Khoa Học', 4, 'Hiện nay, sau bao cuộc biến thiên, tình hình so với những năm trước, khác rất xa. Để xúc tiến công cuộc kiến thiết và giảm được phần nào sự đóng góp của quốc dân, chính phủ cần cải tổ các công sở, các cơ quan cho được nhiều hiệu năng; cho nên môn \"Tổ chức công việc\" đã được đem dạy ở vài trường Đại học và hình như đã được áp dụng trong một vài phòng giấy. Để qua được bước khó khăn lúc này mà cạnh tranh nổi với đồ ngoại hoá, các nhà doanh nghiệp cũng cần phải sửa đổi cách làm ăn, không trông cậy ở sự đầu cơ nữa mà chỉ trông cậy ở tài năng của mình. Vì những lẽ đó, môn tổ chức thành một môn học khẩn thiết cho gần đủ các giới.\r\n\r\n\r\nTổ chức công việc theo khoa học là một môn dạy ta tìm kiếm những phương pháp chính xác hợp với khoa học để làm một công việc nào đó, nhỏ hoặc lớn, một cách mau chóng nhất, mà không mệt, để được lợi cho mọi người. Môn học đó, các nước Âu, Mỹ đã áp dụng từ lâu, nhất là Mỹ. Sức sản xuất của nước ta thấp nhất hoàn cầu, cho nên ta phải áp dụng nó ngay vào hết thảy các ngành hoạt động mới mong công việc kiến thiết quốc gia mau có kết quả được.\r\n\r\n\r\nTa thường phàn nàn đời như bóng câu qua cửa, mà công việc thì bề bộn, đến nỗi có người phải than thở: \"kiếp trần thong thả một ngày là tiên\". Vậy sao không áp dụng phương pháp đó, làm mọi việc cho chóng xong (chóng xong chứ không phải là cẩu thả) để hưởng thụ thanh thản, thú tiên trong cõi tục?', 'to-chuc-cong-viec-theo-khoa-hoc-255601.jpg', ''),
(29, 4, 'Sống 365 Ngày Một Năm', 4, 'Cuốn sách này được dùng nhiều tài liệu trong quyển “How to live 365 days a year” của john A.Schindler. Vạch cho bạn một phép dưỡng sinh, và cả một nhân sinh quan. Đem lại lợi ích cho bạn khi bạn áp dụng nó, trong cuộc sống hiện đại.\r\n\r\nMột cuốn sách hay và đáng đọc dành cho những người mang bệnh thể xác đặc biệt là tinh thần .Nhiều người trong chúng ta thường hiểu sai về bệnh. “Bệnh là thứ gì đó tự dưng từ trên trời đổ xuống và cũng chẳng rõ nguyên do từ đâu kéo tới.” Thực ra, tất cả đều có nguyên do của nó cả. Hầu hết các bệnh gây ra đều bắt nguồn nguyên do từ cuộc sống của chúng ta – một thứ bệnh cũ mà mới : bệnh do xúc động. Trong đó, các triệu chứng đặc trưng của bệnh là đầy hơi, trướng bụng, nghẹn ở cuống họng, mỏi mệt rã rượi, chóng mặt, nhức đầu, đau mỏi gáy, bón, nóng, xót đau bao tử, đau bụng…\r\n\r\nTôi đơn cử một ví dụ dí dỏm mà nghe dễ hiểu nhất. Đó là chứng bệnh tương tư chẳng hạn. Bạn bảo cái tên chỉ là mọi người gọi cho vui nhưng đọc cuốn sách này rồi tôi lại nghĩ nó là một cái tên đúng. Bệnh tương tư sẽ tạo ra hai chiều hướng một là chứng xúc động khó chịu, hai là chứng xúc động dễ chịu ....', 'song-365-ngay-mot-nam-702058.png', ''),
(31, 5, 'Dứt tình', 24, 'Vũ Trọng Phụng là một nhà văn, nhà báo, một cây bút phóng sự nổi tiếng ở Việt Nam đầu thế kỉ 20 với nhiều tác phẩm tiêu tiêu biểu đa dạng thể loại từ phóng sự, tiểu thuyết đến kịch truyện ngắn. Năm 1931, vở kịnh Không một tiếng vang ra đời, tên tuổi của ông bắt đầu gây được chú ý đến với bạn đọc.<br><br>\r\n\r\n\"Dứt Tình\" còn có tên gọi khác là Bởi không duyên kiếp là cuốn tiểu thuyết đầu tay của ông được đăng trên tờ Hải Phòng tuần báo lần đầu năm 1934. Tác phẩm là câu chuyện xoay quanh mối quan hệ tình cảm của một người phụ nữ tên Tiết Hằng với ba người đàn ông là Đào Quân, Việt Anh và Huỳnh Đức. Nội dung của “Dứt tình” không có gì mới là và cách tháo thắt nút các tình tiết cũng rất cổ điển. Tình yêu không phải là tất cả, bởi cuộc đời còn có thương, có nghĩa, có bổn phận và hơn hết là trách nhiệm.<br><br>\r\n\r\n\"Dứt tình\" được đánh giá là một cuốn tiểu thuyết mang tư tưởng định mệnh siêu hình, khẳng định lối hành văn khéo léo của ngòi bút tả chân Vũ Trọng Phụng.', 'dut-tinh-199011.jpg', ''),
(32, 5, 'Tắt đèn', 25, 'Ngô Tất Tố được mệnh danh là một cây bút lỗi lạc của văn học hiện thực đương thời. Tác phẩm mang tên \"Tắt Đèn\" của ông viết về tình cảnh khốn khổ mà người nông dân gánh chịu và xã hội Việt Nam trong những ngày sưu thuế.<br><br>\r\n\r\nMở đầu tác phẩm là không khí căng thẳng, ngột ngạt của một vùng quê trong những ngày đến hạn nộp sưu thuế. Cổng làng đóng lại, công việc cày bừa đình đốn, còn bọn lý trưởng cùng trương tuần thì chửi bới, quát tháo om sòm. Mấy tên cai lệ, lính cơ tay thước, roi song, dây thừng đi tróc những ai nộp thiếu. Tiếng trống, mõ, tù và inh ỏi. Tiếng thét lác, đánh đập, kêu khóc thảm thiết vang lên như trong cuộc săn người càng làm nổi gai óc.<br><br>\r\n\r\nNhân vật nổi bật xuyên suốt tác phẩm \"Tắt Đèn\" mà có lẽ không ai xa lạ, đó chính là chị Dậu. Một người phụ nữ chứa đầy nỗi uất hận, số phận đáng thương nhưng vô cùng mạnh mẽ. ', 'tat-den-675980.jpg', ''),
(33, 5, 'Lều chõng', 25, 'Gần một trăm năm nay, \"Khoa Cử Hán Học\" với \"Lều Chõng\" đã vắng bóng trên đất nước ta. Là nhân chứng và cũng là nạn nhân của trận cuồng phong \"giáo dục Hán học đổ nát\", Ngô Tất Tố có \"đủ tư cách, đủ thẩm quyền\" mà ít ai sánh kịp, để thỏa sức viết về học hành, thi cử, về giới nhà Nho của thời xưa.\r\n<br><br>\r\nCuốn sách đã tái hiện một cách sinh động, sắc nét, giúp các thế hệ hậu sinh lội ngược dòng thời gian để khám phá về \"Lều Chõng\" - không gian có ý nghĩa đặc biệt, không chỉ liên quan chuyện văn chương, chữ nghĩa mà còn gắn bó mật thiết đến vận mệnh đại sự quốc gia, đến sự tồn vong, hưng thịnh của đất nước.<br><br>\r\n\r\nNhờ nét chân thật và bút pháp tài tình của Ngô Tất Tố, sự tò mò về ông đã khiến tôi lần mò trên Internet khám phá thêm các tác phẩm viết về xã hội mà cả con người lẫn tư tưởng đều như đã chết. Và vô tình thấy \"Lều \"Chõng\" - một cuốn sách chứa đầy sự thú vị mà tôi nghĩ bạn nên thử đọc một lần. ', 'leu-chong-262238.jpg', ''),
(34, 5, 'Kinh dịch trọn bộ', 25, 'Kinh Dịch trọn bộ là một trước tác kinh điển lâu đời nhất, kết tinh trí tuệ của văn hóa Trung Hoa cổ đại. Kinh Dịch phát hiện tính quy luật và phương pháp nhận thức, dự đoán, xử lý sự vật, và với ý nghí nghĩa phương pháp luận này, nó có ảnh hưởng quan trọng đối với nhiều lĩnh vực như triết học, khoa học xã hội, văn hóa nghệ thuật… của Trung Quốc từ xưa đến nay.\r\n<br>\r\nTrong Kinh Dịch có 384 hào, có nghĩa là có 384 lời khuyên hữu ích.\r\n<br>\r\nLật mở từng trang sách Kinh dịch, bạn sẽ có cảm giác nhẹ nhàng, khoan khoái, bạn hẳn sẽ không nghĩ rằng quản lý trong học thuật truyền thống lại được viết ra gần gũi, dễ hiểu đến thế. Ở đó, bạn không hề thấy bất kỳ hơi thở nào mang âm hưởng nghiên cứu Nho giáo, càng không hề thấy chỗ nào khó hiểu cả. Đáng quý hơn là, bạn sẽ thấy mỗi một điểm trong cuốn sách này đều liên quan mật thiết đến công việc của bản thân mình. Mỗi một quan điểm, mỗi một kiến giải trong đó đều giúp chúng ta thoát ra khỏi khó khăn và cản trở để trưởng thành trong công việc.\r\n<br>\r\nDịch là biến đổi, tức là tùy thời biến đổi để theo Đạo. Nó là thứ sách rộng lớn đầy đủ, hầu để thuận theo lẽ tính mệnh, thông đạt cớ u minh, hiểu hết tình trạng muôn vật mà bảo những cách mở mang các vật, làm thành các việc Thánh nhân lo cho đời sau như thế, có thể gọi là tột bậc.\r\n<br>\r\nDịch có bốn điều thuộc về Đạo của thánh nhân: để Nói thì chuộng Lời, để Hành động thì chuộng sự Biến đổi, để chế Đồ đạc thì chuộng Hình tượng, để Bói toán thì chuộng lời Chiêm đoán của nó. Cái lẽ lành, dữ, tiêu, lớn, cái đạo tiến, lui, còn, mất, có đủ ở Lời. Suy Lời xét Quẻ, có thể biến sự Biến đổi, thì sự Chiêm đoán tự nhiên ngụ ở trong đó.\r\n<br>\r\nQuân tử khi ở yên thì coi Hình tượng và gẫm Lời lẽ của nó, khi hành động thì coi sự Biến đổi mà gẫm lời suy đoán của nó. Hiểu Lời mà không đạt ý của nó thì có, chứ chưa có ai không hiểu Lời mà thông được Ý của nó bao giờ…” (Hà Nam Trình Di Chính Thúc Tự).', 'kinh-dich-tron-bo-709657.jpg', ''),
(37, 5, 'a', 1, 'abc', '', 'http');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_themuon`
--

CREATE TABLE `tbl_themuon` (
  `themuon_id` int(10) NOT NULL,
  `docgia_id` int(10) NOT NULL,
  `ngaymuon` date NOT NULL,
  `ngayhen` date NOT NULL,
  `ngaytra` date DEFAULT NULL,
  `trangthai` tinyint(1) NOT NULL,
  `canhcao` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_themuon`
--

INSERT INTO `tbl_themuon` (`themuon_id`, `docgia_id`, `ngaymuon`, `ngayhen`, `ngaytra`, `trangthai`, `canhcao`) VALUES
(1, 20198244, '2023-03-10', '2023-03-22', '2023-03-20', 1, NULL),
(2, 20191234, '2023-03-20', '2023-03-24', '2023-03-20', 1, NULL),
(3, 20198244, '2023-03-21', '2023-03-26', NULL, 0, NULL),
(4, 20198244, '2023-03-21', '2023-04-08', NULL, 0, NULL),
(5, 111111111, '2023-03-23', '2023-04-01', NULL, 0, NULL),
(6, 20198244, '2023-03-23', '2023-03-31', NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_tintuc`
--

CREATE TABLE `tbl_tintuc` (
  `tintuc_id` int(10) NOT NULL,
  `tintuc_title` varchar(1000) NOT NULL,
  `tintuc_noidung` mediumtext NOT NULL,
  `tintuc_time` date NOT NULL DEFAULT current_timestamp(),
  `tintuc_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_tintuc`
--

INSERT INTO `tbl_tintuc` (`tintuc_id`, `tintuc_title`, `tintuc_noidung`, `tintuc_time`, `tintuc_img`) VALUES
(1, 'Thông báo sử dụng miễn phí công cụ phân tích công nghệ V-COMPAS', '<p>Compas l&agrave; c&ocirc;ng cụ trực tuyến chạy tr&ecirc;n nền tảng dữ liệu lớn (BigData) do KISTI (H&agrave;n Quốc) ph&aacute;t triển. Nền tảng cho ph&eacute;p nhập cơ sở dữ liệu, sử dụng khai th&aacute;c dữ liệu sẵn c&oacute;, hỗ trợ giải quyết c&aacute;c vấn đề trong quản l&yacute; c&ocirc;ng nghệ bằng kinh nghiệm v&agrave; c&ocirc;ng nghệ th&ocirc;ng tin mới nhất của H&agrave;n Quốc. Compas l&agrave; c&ocirc;ng cụ hữu &iacute;ch để ph&acirc;n t&iacute;ch, đ&aacute;nh gi&aacute; hiện trạng v&agrave; đưa ra dự b&aacute;o từ đ&oacute; định hướng c&ocirc;ng nghệ cần ph&aacute;t triển trong c&aacute;c ng&agrave;nh, lĩnh vực. Hệ thống hỗ trợ chuy&ecirc;n gia trong qu&aacute; tr&igrave;nh t&igrave;m kiếm dữ liệu v&agrave; ra quyết định li&ecirc;n quan đến c&ocirc;ng nghệ, th&ocirc;ng qua đ&aacute;nh gi&aacute; c&aacute;c t&agrave;i liệu về s&aacute;ng chế, b&agrave;i b&aacute;o khoa học v&agrave; kết quả nghi&ecirc;n cứu. C&ocirc;ng cụ cũng gi&uacute;p doanh nghiệp tra cứu th&ocirc;ng tin s&aacute;ng chế, thị trường khoa học c&ocirc;ng nghệ, nhận dạng đối thủ cạnh tranh. V-compas l&agrave; sản phẩm tiếng Việt của Compas tại Việt Nam v&agrave; hiện cho ph&eacute;p truy cập v&agrave; sử dụng miễn ph&iacute; tại địa chỉ: Link truy cập: https://compas.vista.gov.vn/index.jsp Thư viện Tạ Quang Bửu giới thiệu tới giảng vi&ecirc;n, nh&agrave; nghi&ecirc;n cứu, sinh vi&ecirc;n biết v&agrave; sử dụng. Hướng dẫn sử dụng: Xem File đ&iacute;nh k&egrave;m Th&ocirc;ng tin hỗ trợ: tvtqb@hust.edu.vn Tr&acirc;n trọng!</p>\r\n', '2022-11-12', 'logo-compas.png'),
(2, 'Thông báo lịch phục vụ ngoài giờ từ ngày 01/11/2022', '<p><strong>Thư viện th&ocirc;ng b&aacute;o lịch phục vụ ngo&agrave;i giờ như sau:</strong></p>\r\n\r\n<p>Từ ng&agrave;y 01/11/2022 (thứ 3): Thư viện phục vụ ngo&agrave;i giờ tại 04 ph&ograve;ng đọc 402, 411, 419, 526.</p>\r\n\r\n<p>Thời gian phục vụ: Thứ 2 đến thứ 6: 08h00 - 21h00 Thứ 7, Chủ nhật: 08h00 - 16h00</p>\r\n\r\n<p>Tr&acirc;n trọng th&ocirc;ng b&aacute;o. THƯ VIỆN</p>\r\n\r\n<p>Từ ng&agrave;y 01/11/2022 (thứ 3): Thư viện phục vụ ngo&agrave;i giờ tại 04 ph&ograve;ng đọc 402, 411, 419, 526.</p>\r\n\r\n<p>Thời gian phục vụ: Thứ 2 đến thứ 6: 08h00 - 21h00 Thứ 7, Chủ nhật: 08h00 - 16h00</p>\r\n\r\n<div class=\"ddict_btn\" style=\"left:317.675px; top:24px\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></div>\r\n', '2022-11-12', 'thong-bao.png'),
(4, 'saaaaaass', '<p><strong>saaaaaadd</strong></p>\r\n\r\n<div class=\"ddict_btn\" style=\"left:84.35px; top:51px\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></div>\r\n', '2022-11-25', 'logo-compas.png'),
(11, 'Thêm nhiều trường đại học phía Bắc chốt lịch nghỉ Tết 2023', '<p>Hiện, nhiều trường đại học ở ph&iacute;a Bắc đ&atilde; c&ocirc;ng bố lịch nghỉ Tết Nguy&ecirc;n đ&aacute;n Qu&yacute; M&atilde;o 2023 cho sinh vi&ecirc;n.</p>\r\n\r\n<p>Dưới đ&acirc;y l&agrave; lịch nghỉ Tết Nguy&ecirc;n đ&aacute;n năm 2023 của sinh vi&ecirc;n c&aacute;c trường đại học, học viện ph&iacute;a Bắc vừa được c&ocirc;ng bố:</p>\r\n\r\n<table border=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>T&Ecirc;N TRƯỜNG</strong></td>\r\n			<td><strong>LỊCH NGHỈ TẾT</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Trường ĐH X&acirc;y dựng H&agrave; Nội&nbsp;</strong></td>\r\n			<td>Sinh vi&ecirc;n nghỉ Tết Nguy&ecirc;n đ&aacute;n 2 tuần, t&iacute;nh từ ng&agrave;y 16/1/2023.</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Học viện T&agrave;i ch&iacute;nh</strong></td>\r\n			<td>Từ ng&agrave;y 16/1 đến hết 5/2/2023 (tức từ ng&agrave;y 25/12 đến hết 15/1 &acirc;m lịch).</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Trường ĐH Luật H&agrave; Nội</strong></td>\r\n			<td>\r\n			<p>Từ tối 13/1 đến hết ng&agrave;y 5/2/2023 (ng&agrave;y 22/12 năm Nh&acirc;m Dần đến 15/1 năm Qu&yacute; M&atilde;o).</p>\r\n\r\n			<p>Đối với sinh vi&ecirc;n học văn bằng 2 ch&iacute;nh quy v&agrave; c&aacute;c lớp vừa l&agrave;m vừa học, nghỉ từ tối 13/1 đến hết ng&agrave;y 3/2/2023 (ng&agrave;y 22/12 đến hết 13/1 &acirc;m lịch).</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Trường ĐH Thủ đ&ocirc; H&agrave; Nội</strong></td>\r\n			<td>Từ 16/1 đến hết 29/1/2023 (ng&agrave;y 25/12 đến hết ng&agrave;y 8/1/2023 &acirc;m lịch).</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Trường ĐH Kiến tr&uacute;c H&agrave; Nội</strong></td>\r\n			<td>Từ 16/1 đến hết 29/1/2023 (ng&agrave;y 25/12 đến hết ng&agrave;y 8/1/2023 &acirc;m lịch).</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Học viện Ng&acirc;n h&agrave;ng</strong></td>\r\n			<td>Từ 16/1 đến hết 5/2/2023 (tức ng&agrave;y 25/12 đến ng&agrave;y 15/1 &acirc;m lịch).</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Học viện C&ocirc;ng nghệ Bưu ch&iacute;nh Viễn th&ocirc;ng</strong></td>\r\n			<td>Từ 16/1 đến hết 29/1/2023 (ng&agrave;y 25/12 đến hết ng&agrave;y 8/1/2023 &acirc;m lịch).</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Trường ĐH Thủy lợi&nbsp;</strong></td>\r\n			<td>Từ 16/1 đến hết 5/2/2023 (ng&agrave;y 25/12 đến hết 15/1 &acirc;m lịch).</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Trước đ&oacute;, một số trường đại học ph&iacute;a Bắc cũng đ&atilde; th&ocirc;ng b&aacute;o lịch nghỉ Tết: ĐH B&aacute;ch khoa, ĐH Ngoại thương, ĐH Sư phạm H&agrave; Nội, ĐH Thương mại, ĐH C&ocirc;ng nghiệp H&agrave; Nội, ĐH Giao th&ocirc;ng vận tải, ĐH Sư phạm H&agrave; Nội 2...</p>\r\n\r\n<p><img src=\"https://static-images.vnncdn.net/files/publish/2022/12/9/lich-nghi-tet-2023-1241.jpg\" /></p>\r\n', '2022-12-09', 'sinh-vien-thu-khoa-2-1137.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(10) NOT NULL,
  `user_ten` varchar(50) NOT NULL,
  `user_mail` varchar(50) NOT NULL,
  `user_phone` int(15) NOT NULL,
  `user_taikhoan` varchar(50) NOT NULL,
  `user_matkhau` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_ten`, `user_mail`, `user_phone`, `user_taikhoan`, `user_matkhau`) VALUES
(1, 'Lượng', 'luongkyo410@gmail.com', 969274295, 'luong', 'luong');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `sach_the`
--
ALTER TABLE `sach_the`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `tbl_author`
--
ALTER TABLE `tbl_author`
  ADD PRIMARY KEY (`author_id`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `tbl_docgia`
--
ALTER TABLE `tbl_docgia`
  ADD PRIMARY KEY (`docgia_id`);

--
-- Chỉ mục cho bảng `tbl_sach`
--
ALTER TABLE `tbl_sach`
  ADD PRIMARY KEY (`sach_id`);

--
-- Chỉ mục cho bảng `tbl_themuon`
--
ALTER TABLE `tbl_themuon`
  ADD PRIMARY KEY (`themuon_id`);

--
-- Chỉ mục cho bảng `tbl_tintuc`
--
ALTER TABLE `tbl_tintuc`
  ADD PRIMARY KEY (`tintuc_id`);

--
-- Chỉ mục cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `sach_the`
--
ALTER TABLE `sach_the`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbl_author`
--
ALTER TABLE `tbl_author`
  MODIFY `author_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `tbl_docgia`
--
ALTER TABLE `tbl_docgia`
  MODIFY `docgia_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111111112;

--
-- AUTO_INCREMENT cho bảng `tbl_sach`
--
ALTER TABLE `tbl_sach`
  MODIFY `sach_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `tbl_themuon`
--
ALTER TABLE `tbl_themuon`
  MODIFY `themuon_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `tbl_tintuc`
--
ALTER TABLE `tbl_tintuc`
  MODIFY `tintuc_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
