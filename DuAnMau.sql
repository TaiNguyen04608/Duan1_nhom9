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
(9, 'WATER CALLIGRAPHY - BY KILIAN', 100, 0.4, 'pngegg (2).png', '2022-10-08', '????y l?? d??ng n?????c hoa By Kilian n??y c?? ????? l??u h????ng t???m ???n - 3 gi??? ?????n 6 gi???. v?? ????? t???a h????ng thu???c d???ng g???n - to??? h????ng trong v??ng m???t c??nh tay. Perfumista.vn khuy???n c??o Water Calligraphy ph?? h???p ????? s??? d???ng trong c??? ng??y l???n ????m v??o m??a xu??n, h???.\n????y l?? d??ng n?????c hoa By Kilian thu???c nh??m Floral Aquatic (H????ng hoa c??? bi???n). Calice Becker ch??nh l?? nh?? pha ch??? ra lo???i n?????c hoa n??y. B??n c???nh ????, Hoa s??ng v?? Hoa m???c lan l?? hai h????ng b???n c?? th??? d??? d??ng c???m nh???n ???????c nh???t khi s??? d???ng n?????c hoa n??y.', 0, 87, 4),
(10, 'Gi??y Nike', 160, 0.2, 'nike-air-force-1-para-noise-2-1.jpg', '2022-10-11', '???????c l??m t??? v???t li???u t??i ch??? ??t nh???t 20% t??nh theo tr???ng l?????ng.\nB???t c??? khi n??o b???n nh??n th???y Nike Sunburst ho???c c??i t??n Next Nature (NN), b???n s??? th???y th??m m???t b?????c n???a tr??n h??nh tr??nh h?????ng t???i kh??ng kh?? carbon v?? kh??ng ch???t th???i c???a ch??ng t??i.\nS??? d???ng v???t li???u t???ng h???p, thi???t k??? c?? ch???t li???u gi???ng gi??y b??ng r??? gi???a nh???ng n??m 1980.\nC??? ??o c?? ?????m, c???t th???p tr??ng b??ng b???y v?? t???o c???m gi??c tuy???t v???i trong khi c??c l??? ?????c ??? m??i gi??y v?? hai b??n t???o th??m s??? tho???i m??i v?? d??? th???.\nK???t c???u b???ng kim lo???i k???t h???p ????? ngo??i v???i ????? gi???a ????? t???o ra m???t c??i nh??n h???p l??, b???n v?? tho???i m??i.', 1, 69, 3),
(12, 'CHHC', 150, 0.3, 'pngegg.png', '2022-10-12', 'N?????c hoa CHHC Carolina Herrera ???????c nh?? s???n xu???t cho ra ?????i n??m 2015.\r\nThu???c nh??m h????ng da thu???c.\r\nN?????c hoa mang ?????n m???t phong c??ch nam t??nh, m???nh m??? cho ph??i m???nh.\r\nN?????c hoa CHHC Carolina Herrera l?? v????ng quy???n trong gi???i n?????c hoa. C??? ??i???n v?? ch??n ch???n nh??ng c??ng l???i ???n gi???u s??? quy???n r?? ch???t ng?????i. H????ng th??m m?? t??? s??? trang nh??, sang tr???ng v?? ??am m??.', 0, 20, 4),
(13, 'Kilian Black Phantom', 240, 0.5, 'pngegg6.png', '2022-10-10', '\r\nKilian Black Phantom ??? Memento Mori l?? m???t trong nh???ng chai n?????c hoa r???t ???????c s??n ????n, nh???t l?? ng?????i h??m m??? th????ng hi???u cao c???p By Kilian. S???n ph???m t??? thi???t k??? ?????n m??i h????ng ?????u g??y ???n t?????ng v?? c??ng ?????c bi???t. H????ng vani ph????ng ????ng th??m ng???t ng??o v?? m???nh m??? ??i c??ng th??nh ng??? ???Memento Mori??? c??ng khi???n chai n?????c hoa th??m b?? ???n v?? l??i cu???n.', 0, 30, 4),
(14, '??o GUCCI x MICKEY', 300, 0.3, 'gucci_t-shirt.jpg', '2022-10-12', 'Chi???c ??o ph??ng si??u ?????p, m???i toanh Gucci h???p t??c v???i h??ng Disney . Ch???t cotton 4c cao c???p, m???m m???n, ko x?? l??ng, th???m h??t t???t v?? b???n.\r\n\r\nThi???t k??? sang ch???nh,  cu???n h??t v???i graphic chu???t Mickey to b???n ??i k??m ho??? ti???t monogram ?????y ?????ng c???p nh?? Gucci.\r\n\r\nNam n??? m???c couple si??u d??? th????ng????', 0, 4, 1),
(15, '??o NIke', 120, 0.2, 'Nike-t-shirt.jpeg', '2022-10-13', 'M???t phi??n b???n ??o Tee thu???c d??ng MUST HAVE - Logo c??? ??i???n\r\n\r\nChi???c ??o v???i form slim ??m nh??? nh??ng d??? mix&match ????? c?? 1 outfit th??? thao ????n gi???n nh??ng ko k??m ph???n n??ng ?????ng\r\n\r\nS??? d???ng ch???t li???u cotton cao c???p co gi??n v???i tr???ng l?????ng si??u nh???, si??u m???m v?? kh??? n??ng th???m h??t m??? h??i t???t.', 0, 2, 1),
(18, '??o Nike NSW CLUB Men???s Long Sleeve Hooded', 65, 0.1, 'main-square.png', '2022-10-22', 'S??? l?? r???t ti???c n???u b???n b??? l??? c?? h???i s??? h???u cho m??nh nh???ng chi???c ??o Nike NSW CLUB Men???s Long Sleeve Hooded ?????y c?? t??nh ????? l??m phong ph?? t??? ????? c???a m??nh trong h??m nay. H??y nhanh ch??ng l???a ch???n cho m??nh m???t thi???t k??? ??o Nike ??ng ?? nh???t t???i YE shop nh??!', 0, 1, 1),
(19, '??o Jordan Dri-FIT Zion DF Shooting ???Black???', 70, 0.2, 'Jordan-shirt.png', '2022-10-22', 'S??? l?? r???t ti???c n???u b???n b??? l??? c?? h???i s??? h???u cho m??nh chi???c ??o Nike Jordan Dri-FIT Zion DF Shooting ???Black??? ?????y c?? t??nh ????? l??m phong ph?? t??? ????? c???a m??nh trong h??m nay. H??y nhanh ch??ng l???a ch???n cho m??nh m???t thi???t k??? ??o Nike ??ng ?? nh???t t???i YE shop nh??!', 0, 0, 1),
(20, 'Gi??y Nike Dunk Low Coast', 250, 0.1, 'nike-dunk-low.png', '2022-10-22', 'Thi???t k??? Nike Dunk ?????u ti??n ???????c gi???i thi???u l???n ?????u v??o n??m 1985 v?? ???????c thi???t k??? b???i Peter Moore, m???t trong nh???ng nh?? thi???t k??? c?? ???nh h?????ng nh???t trong l???ch s??? c???a th????ng hi???u. Mang nh???ng ??i???m t????ng ?????ng v???i Jordan 1 v?? Terminator ??? hai thi???t k??? ?????u ???????c gi???i thi???u c??ng n??m v?? ???????c thi???t k??? b???i c??ng m???t ?????i nh??m ??? Nike Dunk t??? h??o v??? c??ng ngh??? v?? c???u tr??c t????ng t??? nh?? nh???ng ng?????i anh em c???a n??. Tuy nhi??n, ??i???u l??m cho Dunk tr??? n??n ?????c bi???t l?? c??c ???????ng m??u v?? t???n ???? tr??? th??nh m???t ?????c ??i???m x??c ?????nh ?????c tr??ng c???a ????i gi??y.\r\n\r\nDunk Low Coast l?? m???t ?????i di???n kinh ??i???n cho d??ng gi??y n??y minh ch???ng s???c h??t kh??ng ?????i trong th???p k??? m???i.', 0, 0, 3),
(21, 'Gi??y Nike Cortez White Red', 120, 0.2, 'Nike-cortez.png', '2022-10-22', 'Ch??o m???ng ?????n v???i th??? gi???i th???i trang thu nh??? c??ng Nike Cortez White Red! ???????c ph??t h??nh l???n ?????u ti??n c??ch ????y g???n 5 th???p k??? v??o n??m 1972, thi???t k??? n??y l?? ????i gi??y ch???y b??? ???hi???n ?????i??? ?????u ti??n ???????c thi???t k??? b???i hu???n luy???n vi??n ??i???n kinh Olympic v?? ?????ng s??ng l???p Nike ??? Bill Bowerman. ???????c h???i sinh trong b???ng m??u c??? ??i???n c???a n??, cho d?? b???n c?? ph???i l?? ng?????i ??am m?? gi??y th??? thao hay kh??ng, Sneaker Daily kh???ng ?????nh r???ng b???n ???? nh??n th???y ph???i m??u ?????c bi???t n??y ??t nh???t m???t l???n trong ?????i v?? ????y l?? nh???ng ??i???u b???n c???n bi???t!\r\n\r\nL?? m???t bi???u t?????ng v??n h??a, Cortez White Red c?? c???u t???o b???ng da v?? da t???ng h???p ????? t??ng ????? b???n. ???????c s??n v???i t??ng m??u ch??? ?????o l?? tr???ng, c??c ??i???m nh???n m??u ????? v?? xanh lam c??ng t???o n??n v??? th???m m??? c??? ??i???n ?????c nh???t ?????n gi??? v???n th???nh h??nh. ??? ph???n d?????i, d??? d??ng nh??n th???y m???t ????? x???p ?????m nh??? nh??ng ??? thi???t k??? gi???ng h???t nh?? phi??n b???n t???ng ph??t h??nh v??o ?????u nh???ng n??m 70 ??? v?? ph???n n??y ???????c l??t b???ng ????? ngo??i cao su (gum) c?? h???a ti???t x????ng c?? ????? t???o l???c k??o theo m???i b?????c di chuy???n. ????? l??m tr??n t???t c???, th????ng hi???u ???Nike??? t???o n??n s??? quy???n r?? cho l?????i g?? v?? tab sau g??t ch??n, ho??n thi???n thi???t k??? c???a ki???t t??c v?????t th???i gian n??y.', 0, 9, 3),
(22, 'DG Intenso Pourhome', 100, 0.2, 'pngegg (10).png', '2022-10-22', 'D??ng n?????c hoa Valentino Uomo ???????c l???y c???m h???ng t??? nh???ng ng?????i ????n ??ng tr??? tu???i ???????c k??? th???a gia nghi???p gi??u c?? t??? gia ????nh c???a m??nh t???i ?????t n?????c Italia, ???????c mi??u t??? v???i c???t c??ch c???a m???t ng?????i th?????ng l??u, sang tr???ng, l???ch l??m v?? cu???n h??t.\r\n\r\n???Phi??n b???n m???i c???a d??ng n?????c hoa Valentino Uomo l?? Valentino Uomo Intense, ra m???t v??o m??a xu??n n??m 2016, ???????c h??ng c??ng b??? l?? phi??n b???n m???nh m???, l??i cu???n v?? nam t??nh h??n ng?????i anh ??i tr?????c. ???????c ?????nh ngh??a t??? l??c sinh ra ???? l?? m???t ng?????i gi??u c??, ch??ng trai Valentino Uomo Intense c??n s??? v??? b??? ngo??i ?????p t??? m???i g??c nh??n, s??? l???ch s???, sang tr???ng k???t h???p h??i h??a v???i s??? s??nh ??i???u v?? th???i th?????ng, vi???c g??y th????ng nh??? cho c??c c?? g??i t??? c??i ch???m m???t ?????u ti??n l?? ??i???u kh??ng th??? tr??nh kh???i.', 0, 40, 4);

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
('Haonguyen16', '0941295047', 'Nguy???n H??o', 0, 'ruoes3ozcaagk9gerwti.0.jpeg', 'haon57722@gmail.com', 0),
('Tai', '123456', 'T??i Nguy???n', 1, 'crop.jpeg', 'taintpc04608@fpt.edu.vn', 1),
('Tainguyen1', '123456789', 'nguy???n T??i 1', 0, 'crop.jpeg', 'thaitainguyen336@gmail.com', 0),
('Trung', 'trungnguyen', 'Nguy???n Trung', 1, 'crop.jpeg', 'trungml213@gmail.com', 1);

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
(1, '??o'),
(3, 'Gi??y'),
(4, 'N?????c Hoa');

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
