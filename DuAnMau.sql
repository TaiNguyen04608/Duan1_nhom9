-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 02, 2022 at 11:02 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `DuAnMau`
--

-- --------------------------------------------------------

--
-- Table structure for table `binh_luan`
--

CREATE TABLE `binh_luan` (
  `ma_bl` int(11) NOT NULL,
  `noi_dung` varchar(255) NOT NULL,
  `ma_kh` varchar(20) NOT NULL,
  `ma_hh` int(11) NOT NULL,
  `ngay_bl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `binh_luan`
--

INSERT INTO `binh_luan` (`ma_bl`, `noi_dung`, `ma_kh`, `ma_hh`, `ngay_bl`) VALUES
(12, 'good stuff', 'Tai', 9, '2022-10-12'),
(14, 'the greatest product ever seen', 'Tai', 9, '2022-10-13'),
(16, 'ugly', 'Trung', 14, '2022-10-14'),
(22, 'good stuff', 'Tai', 10, '2022-10-19'),
(31, 'good stuff', 'Haonguyen16', 12, '2022-10-19');

-- --------------------------------------------------------

--
-- Table structure for table `ct_hd`
--

CREATE TABLE `ct_hd` (
  `ma_ct_hd` int(11) NOT NULL,
  `ma_hh` int(11) NOT NULL,
  `ma_hd` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL DEFAULT 1,
  `gia` float NOT NULL,
  `giam_gia` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hang_hoa`
--

CREATE TABLE `hang_hoa` (
  `ma_hh` int(11) NOT NULL,
  `ten_hh` varchar(50) NOT NULL,
  `don_gia` float NOT NULL,
  `giam_gia` float NOT NULL,
  `hinh` varchar(50) NOT NULL,
  `ngay_nhap` date NOT NULL,
  `mo_ta` varchar(2000) NOT NULL,
  `dac_biet` tinyint(1) NOT NULL DEFAULT 0,
  `so_luot_xem` int(11) NOT NULL DEFAULT 0,
  `ma_loai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hang_hoa`
--

INSERT INTO `hang_hoa` (`ma_hh`, `ten_hh`, `don_gia`, `giam_gia`, `hinh`, `ngay_nhap`, `mo_ta`, `dac_biet`, `so_luot_xem`, `ma_loai`) VALUES
(9, 'WATER CALLIGRAPHY - BY KILIAN', 100, 0.4, 'pngegg (2).png', '2022-10-08', 'Đây là dòng nước hoa By Kilian này có độ lưu hương tạm ổn - 3 giờ đến 6 giờ. và độ tỏa hương thuộc dạng gần - toả hương trong vòng một cánh tay. Perfumista.vn khuyến cáo Water Calligraphy phù hợp để sử dụng trong cả ngày lẫn đêm vào mùa xuân, hạ.\nĐây là dòng nước hoa By Kilian thuộc nhóm Floral Aquatic (Hương hoa cỏ biển). Calice Becker chính là nhà pha chế ra loại nước hoa này. Bên cạnh đó, Hoa súng và Hoa mộc lan là hai hương bạn có thể dễ dàng cảm nhận được nhất khi sử dụng nước hoa này.', 0, 87, 4),
(10, 'Giày Nike', 160, 0.2, 'nike-air-force-1-para-noise-2-1.jpg', '2022-10-11', 'Được làm từ vật liệu tái chế ít nhất 20% tính theo trọng lượng.\nBất cứ khi nào bạn nhìn thấy Nike Sunburst hoặc cái tên Next Nature (NN), bạn sẽ thấy thêm một bước nữa trên hành trình hướng tới không khí carbon và không chất thải của chúng tôi.\nSử dụng vật liệu tổng hợp, thiết kế có chất liệu giống giày bóng rổ giữa những năm 1980.\nCổ áo có đệm, cắt thấp trông bóng bẩy và tạo cảm giác tuyệt vời trong khi các lỗ đục ở mũi giày và hai bên tạo thêm sự thoải mái và dễ thở.\nKết cấu bằng kim loại kết hợp đế ngoài với đế giữa để tạo ra một cái nhìn hợp lý, bền và thoải mái.', 1, 69, 3),
(12, 'CHHC', 150, 0.3, 'pngegg.png', '2022-10-12', 'Nước hoa CHHC Carolina Herrera được nhà sản xuất cho ra đời năm 2015.\r\nThuộc nhóm hương da thuộc.\r\nNước hoa mang đến một phong cách nam tính, mạnh mẽ cho phái mạnh.\r\nNước hoa CHHC Carolina Herrera là vương quyền trong giới nước hoa. Cổ điển và chín chắn nhưng cũng lại ẩn giấu sự quyến rũ chết người. Hương thơm mô tả sự trang nhã, sang trọng và đam mê.', 0, 20, 4),
(13, 'Kilian Black Phantom', 240, 0.5, 'pngegg6.png', '2022-10-10', '\r\nKilian Black Phantom – Memento Mori là một trong những chai nước hoa rất được săn đón, nhất là người hâm mộ thương hiệu cao cấp By Kilian. Sản phẩm từ thiết kế đến mùi hương đều gây ấn tượng vô cùng đặc biệt. Hương vani phương Đông thơm ngọt ngào và mạnh mẽ đi cùng thành ngữ “Memento Mori” càng khiến chai nước hoa thêm bí ẩn và lôi cuốn.', 0, 30, 4),
(14, 'Áo GUCCI x MICKEY', 300, 0.3, 'gucci_t-shirt.jpg', '2022-10-12', 'Chiếc áo phông siêu đẹp, mới toanh Gucci hợp tác với hãng Disney . Chất cotton 4c cao cấp, mềm mịn, ko xù lông, thấm hút tốt và bền.\r\n\r\nThiết kế sang chảnh,  cuốn hút với graphic chuột Mickey to bản đi kèm hoạ tiết monogram đầy đẳng cấp nhà Gucci.\r\n\r\nNam nữ mặc couple siêu dễ thương🤩', 0, 4, 1),
(15, 'Áo NIke', 120, 0.2, 'Nike-t-shirt.jpeg', '2022-10-13', 'Một phiên bản áo Tee thuộc dòng MUST HAVE - Logo cổ điển\r\n\r\nChiếc áo với form slim ôm nhẹ nhưng dễ mix&match để có 1 outfit thể thao đơn giản nhưng ko kém phần năng động\r\n\r\nSử dụng chất liệu cotton cao cấp co giãn với trọng lượng siêu nhẹ, siêu mềm và khả năng thấm hút mồ hôi tốt.', 0, 2, 1),
(18, 'Áo Nike NSW CLUB Men’s Long Sleeve Hooded', 65, 0.1, 'main-square.png', '2022-10-22', 'Sẽ là rất tiếc nếu bạn bỏ lỡ cơ hội sở hữu cho mình những chiếc Áo Nike NSW CLUB Men’s Long Sleeve Hooded đầy cá tính để làm phong phú tủ đồ của mình trong hôm nay. Hãy nhanh chóng lựa chọn cho mình một thiết kế áo Nike ưng ý nhất tại YE shop nhé!', 0, 1, 1),
(19, 'Áo Jordan Dri-FIT Zion DF Shooting ‘Black’', 70, 0.2, 'Jordan-shirt.png', '2022-10-22', 'Sẽ là rất tiếc nếu bạn bỏ lỡ cơ hội sở hữu cho mình chiếc Áo Nike Jordan Dri-FIT Zion DF Shooting ‘Black’ đầy cá tính để làm phong phú tủ đồ của mình trong hôm nay. Hãy nhanh chóng lựa chọn cho mình một thiết kế áo Nike ưng ý nhất tại YE shop nhé!', 0, 0, 1),
(20, 'Giày Nike Dunk Low Coast', 250, 0.1, 'nike-dunk-low.png', '2022-10-22', 'Thiết kế Nike Dunk đầu tiên được giới thiệu lần đầu vào năm 1985 và được thiết kế bởi Peter Moore, một trong những nhà thiết kế có ảnh hưởng nhất trong lịch sử của thương hiệu. Mang những điểm tương đồng với Jordan 1 và Terminator – hai thiết kế đều được giới thiệu cùng năm và được thiết kế bởi cùng một đội nhóm – Nike Dunk tự hào về công nghệ và cấu trúc tương tự như những người anh em của nó. Tuy nhiên, điều làm cho Dunk trở nên đặc biệt là các đường màu vô tận đã trở thành một đặc điểm xác định đặc trưng của đôi giày.\r\n\r\nDunk Low Coast là một đại diện kinh điển cho dòng giày này minh chứng sức hút không đổi trong thập kỷ mới.', 0, 0, 3),
(21, 'Giày Nike Cortez White Red', 120, 0.2, 'Nike-cortez.png', '2022-10-22', 'Chào mừng đến với thế giới thời trang thu nhỏ cùng Nike Cortez White Red! Được phát hành lần đầu tiên cách đây gần 5 thập kỷ vào năm 1972, thiết kế này là đôi giày chạy bộ “hiện đại” đầu tiên được thiết kế bởi huấn luyện viên điền kinh Olympic và đồng sáng lập Nike – Bill Bowerman. Được hồi sinh trong bảng màu cổ điển của nó, cho dù bạn có phải là người đam mê giày thể thao hay không, Sneaker Daily khẳng định rằng bạn đã nhìn thấy phối màu đặc biệt này ít nhất một lần trong đời và đây là những điều bạn cần biết!\r\n\r\nLà một biểu tượng văn hóa, Cortez White Red có cấu tạo bằng da và da tổng hợp để tăng độ bền. Được sơn với tông màu chủ đạo là trắng, các điểm nhấn màu đỏ và xanh lam cũng tạo nên vẻ thẩm mỹ cổ điển độc nhất đến giờ vẫn thịnh hành. Ở phần dưới, dễ dàng nhìn thấy một đế xốp đệm nhẹ nhàng – thiết kế giống hệt như phiên bản từng phát hành vào đầu những năm 70 – và phần này được lót bằng đế ngoài cao su (gum) có họa tiết xương cá để tạo lực kéo theo mỗi bước di chuyển. Để làm tròn tất cả, thương hiệu “Nike” tạo nên sự quyến rũ cho lưỡi gà và tab sau gót chân, hoàn thiện thiết kế của kiệt tác vượt thời gian này.', 0, 9, 3),
(22, 'DG Intenso Pourhome', 100, 0.2, 'pngegg (10).png', '2022-10-22', 'Dòng nước hoa Valentino Uomo được lấy cảm hứng từ những người đàn ông trẻ tuổi được kế thừa gia nghiệp giàu có từ gia đình của mình tại đất nước Italia, được miêu tả với cốt cách của một người thượng lưu, sang trọng, lịch lãm và cuốn hút.\r\n\r\n️Phiên bản mới của dòng nước hoa Valentino Uomo là Valentino Uomo Intense, ra mắt vào mùa xuân năm 2016, được hãng công bố là phiên bản mạnh mẽ, lôi cuốn và nam tính hơn người anh đi trước. Được định nghĩa từ lúc sinh ra đã là một người giàu có, chàng trai Valentino Uomo Intense còn sở vẻ bề ngoài đẹp từ mọi góc nhìn, sự lịch sự, sang trọng kết hợp hài hòa với sự sành điệu và thời thượng, việc gây thương nhớ cho các cô gái từ cái chạm mặt đầu tiên là điều không thể tránh khỏi.', 0, 40, 4);

-- --------------------------------------------------------

--
-- Table structure for table `hoa_don`
--

CREATE TABLE `hoa_don` (
  `ma_hd` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `ten_kh` varchar(50) NOT NULL,
  `sdt` varchar(11) NOT NULL,
  `dia_chi` varchar(100) NOT NULL,
  `tong_tien` float NOT NULL,
  `ngay_mua` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `khach_hang`
--

CREATE TABLE `khach_hang` (
  `ma_kh` varchar(20) NOT NULL,
  `mat_khau` varchar(50) NOT NULL,
  `ho_ten` varchar(50) NOT NULL,
  `kich_hoat` tinyint(1) NOT NULL DEFAULT 0,
  `hinh` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `vai_tro` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `khach_hang`
--

INSERT INTO `khach_hang` (`ma_kh`, `mat_khau`, `ho_ten`, `kich_hoat`, `hinh`, `email`, `vai_tro`) VALUES
('Haonguyen16', '0941295047', 'Nguyễn Hào', 0, 'ruoes3ozcaagk9gerwti.0.jpeg', 'haon57722@gmail.com', 0),
('Tai', '123456', 'Tài Nguyễn', 1, 'crop.jpeg', 'taintpc04608@fpt.edu.vn', 1),
('Tainguyen1', '123456789', 'nguyễn Tài 1', 0, 'crop.jpeg', 'thaitainguyen336@gmail.com', 0),
('Trung', 'trungnguyen', 'Nguyễn Trung', 1, 'crop.jpeg', 'trungml213@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `loai`
--

CREATE TABLE `loai` (
  `ma_loai` int(11) NOT NULL,
  `ten_loai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loai`
--

INSERT INTO `loai` (`ma_loai`, `ten_loai`) VALUES
(1, 'Áo'),
(3, 'Giày'),
(4, 'Nước Hoa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD PRIMARY KEY (`ma_bl`),
  ADD KEY `ma_hh` (`ma_hh`),
  ADD KEY `ma_kh` (`ma_kh`);

--
-- Indexes for table `ct_hd`
--
ALTER TABLE `ct_hd`
  ADD PRIMARY KEY (`ma_ct_hd`),
  ADD KEY `ma_hh` (`ma_hh`),
  ADD KEY `ma_hd` (`ma_hd`);

--
-- Indexes for table `hang_hoa`
--
ALTER TABLE `hang_hoa`
  ADD PRIMARY KEY (`ma_hh`),
  ADD KEY `ma_loai` (`ma_loai`);

--
-- Indexes for table `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD PRIMARY KEY (`ma_hd`);

--
-- Indexes for table `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`ma_kh`);

--
-- Indexes for table `loai`
--
ALTER TABLE `loai`
  ADD PRIMARY KEY (`ma_loai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binh_luan`
--
ALTER TABLE `binh_luan`
  MODIFY `ma_bl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `ct_hd`
--
ALTER TABLE `ct_hd`
  MODIFY `ma_ct_hd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hang_hoa`
--
ALTER TABLE `hang_hoa`
  MODIFY `ma_hh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `hoa_don`
--
ALTER TABLE `hoa_don`
  MODIFY `ma_hd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loai`
--
ALTER TABLE `loai`
  MODIFY `ma_loai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD CONSTRAINT `binh_luan_ibfk_1` FOREIGN KEY (`ma_hh`) REFERENCES `hang_hoa` (`ma_hh`),
  ADD CONSTRAINT `binh_luan_ibfk_2` FOREIGN KEY (`ma_kh`) REFERENCES `khach_hang` (`ma_kh`);

--
-- Constraints for table `ct_hd`
--
ALTER TABLE `ct_hd`
  ADD CONSTRAINT `ct_hd_ibfk_1` FOREIGN KEY (`ma_hh`) REFERENCES `hang_hoa` (`ma_hh`),
  ADD CONSTRAINT `ct_hd_ibfk_2` FOREIGN KEY (`ma_hd`) REFERENCES `hoa_don` (`ma_hd`);

--
-- Constraints for table `hang_hoa`
--
ALTER TABLE `hang_hoa`
  ADD CONSTRAINT `hang_hoa_ibfk_1` FOREIGN KEY (`ma_loai`) REFERENCES `loai` (`ma_loai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
