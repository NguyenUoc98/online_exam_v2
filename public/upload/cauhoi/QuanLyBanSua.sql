-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 16, 2019 lúc 02:54 PM
-- Phiên bản máy phục vụ: 10.1.36-MariaDB
-- Phiên bản PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ql_ban_sua`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ct_hoadon`
--

CREATE TABLE `ct_hoadon` (
  `So_Hoa_Don` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `Ma_Sua` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `So_Luong` int(11) DEFAULT NULL,
  `Don_Gia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hang_sua`
--

CREATE TABLE `hang_sua` (
  `Ma_Hang_Sua` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Ten_Hang_Sua` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Dia_chi` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Dien_Thoai` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hang_sua`
--

INSERT INTO `hang_sua` (`Ma_Hang_Sua`, `Ten_Hang_Sua`, `Dia_chi`, `Dien_Thoai`, `Email`) VALUES
('MHS01', 'Vinamilk', 'Việt Nam', NULL, NULL),
('MHS02', 'Dutch Lady', 'Việt Nam', NULL, NULL),
('MHS03', 'Nutifood', 'Việt Nam', NULL, NULL),
('MHS04', 'Nestle', 'Việt Nam', NULL, NULL),
('MHS05', 'IDP', 'nhà máy Sữa Ba Vì tại Ba Vì - Hà Nộ', NULL, NULL),
('MHS06', 'Mộc châu', 'Thị trấn nông trường Mộc Châu, huyện Mộc Châu, tỉnh Sơn La, nằm bên cạnh quốc lộ 6, cách Hà Nội 194 km về phía Tây Bắc', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoa_don`
--

CREATE TABLE `hoa_don` (
  `So_Hoa_Don` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `Ngay_HD` date NOT NULL,
  `Ma_Khach_Hang` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `Tri_Gia` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
--

CREATE TABLE `khach_hang` (
  `Ma_Khach_Hang` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `Ten_Khach_Hang` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Phai` tinyint(1) NOT NULL,
  `Dia_Chi` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Dien_Thoai` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khach_hang`
--

INSERT INTO `khach_hang` (`Ma_Khach_Hang`, `Ten_Khach_Hang`, `Phai`, `Dia_Chi`, `Dien_Thoai`, `Email`) VALUES
('KH01', 'Dư Phương Thảo', 1, 'Hưng Yên', '0837882068', 'duthao98@gmail.com'),
('Kh02', 'Đỗ Thùy Linh', 1, 'Hưng Yên', '012345678', 'thuylinh@gmail.com'),
('KH03', 'Trương Thị Tường Vi', 1, 'Hưng Yên', '098765432', 'tuongvi@gmail.com'),
('KH04', 'Đoàn Thị Linh', 1, 'Hưng Yên', '098789865', 'doanlinh@gmail.com'),
('KH05', 'Lê Thị Ngọc Thảo', 1, 'Hưng Yên', '098734569', 'ngocthao@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_sua`
--

CREATE TABLE `loai_sua` (
  `Ma_Loai_Sua` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `Ten_Loai` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loai_sua`
--

INSERT INTO `loai_sua` (`Ma_Loai_Sua`, `Ten_Loai`) VALUES
('LS1', 'Sữa Bột'),
('LS2', 'Sữa Tươi'),
('LS3', 'Sữa Chua'),
('LS4', 'Váng Sữa'),
('LS5', 'Sữa bà bầu');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sua`
--

CREATE TABLE `sua` (
  `Ma_Sua` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `Ten_Sua` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Ma_Loai_Sua` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `Ma_Hang_Sua` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Trong_Luong` int(11) DEFAULT NULL,
  `Don_Gia` int(11) DEFAULT NULL,
  `TP_Dinh_Duong` text COLLATE utf8_unicode_ci,
  `Loi_ich` text COLLATE utf8_unicode_ci,
  `Hinh` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sua`
--

INSERT INTO `sua` (`Ma_Sua`, `Ten_Sua`, `Ma_Loai_Sua`, `Ma_Hang_Sua`, `Trong_Luong`, `Don_Gia`, `TP_Dinh_Duong`, `Loi_ich`, `Hinh`) VALUES
('S01', '\r\nSữa bột Vinamilk Optimum Gold 4 - Hộp thiếc 1500g', 'LS1', 'MHS01', 1500, 524068, NULL, NULL, NULL),
('S02', '\r\nSữa bột Vinamilk Sure Prevent - Hộp thiếc 900g', 'LS1', 'MHS01', 900, 456665, NULL, NULL, NULL),
('S03', '\r\n[COMBO 18 HỘP] - Sữa tươi tiệt trùng Vinamilk 100% Ít Đường - Hộp giấy ', 'LS2', 'MHS02', 500, 566082, NULL, NULL, NULL),
('S04', '\r\nSữa tươi tiệt trùng Vinamilk 100% Ít Đường - Lốc 4 Hộp x 180ml', 'LS2', 'MHS03', 180, 29612, NULL, NULL, NULL),
('S05', '\r\nSữa chua uống Probi Việt Quất - Lốc 4 chai x 130ml', 'LS3', 'MHS04', 130, 32648, NULL, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `ct_hoadon`
--
ALTER TABLE `ct_hoadon`
  ADD PRIMARY KEY (`So_Hoa_Don`,`Ma_Sua`),
  ADD KEY `So_Hoa_Don` (`So_Hoa_Don`),
  ADD KEY `Ma_Sua` (`Ma_Sua`);

--
-- Chỉ mục cho bảng `hang_sua`
--
ALTER TABLE `hang_sua`
  ADD PRIMARY KEY (`Ma_Hang_Sua`);

--
-- Chỉ mục cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD PRIMARY KEY (`So_Hoa_Don`),
  ADD KEY `Ma_Khach_Hang` (`Ma_Khach_Hang`);

--
-- Chỉ mục cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`Ma_Khach_Hang`);

--
-- Chỉ mục cho bảng `loai_sua`
--
ALTER TABLE `loai_sua`
  ADD PRIMARY KEY (`Ma_Loai_Sua`);

--
-- Chỉ mục cho bảng `sua`
--
ALTER TABLE `sua`
  ADD PRIMARY KEY (`Ma_Sua`),
  ADD KEY `Ma_Loai_Sua` (`Ma_Loai_Sua`),
  ADD KEY `Ma_Hang_Sua` (`Ma_Hang_Sua`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `ct_hoadon`
--
ALTER TABLE `ct_hoadon`
  ADD CONSTRAINT `ct_hoadon_ibfk_1` FOREIGN KEY (`So_Hoa_Don`) REFERENCES `hoa_don` (`So_Hoa_Don`),
  ADD CONSTRAINT `ct_hoadon_ibfk_2` FOREIGN KEY (`Ma_Sua`) REFERENCES `sua` (`Ma_Sua`);

--
-- Các ràng buộc cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD CONSTRAINT `hoa_don_ibfk_1` FOREIGN KEY (`Ma_Khach_Hang`) REFERENCES `khach_hang` (`Ma_Khach_Hang`);

--
-- Các ràng buộc cho bảng `sua`
--
ALTER TABLE `sua`
  ADD CONSTRAINT `sua_ibfk_1` FOREIGN KEY (`Ma_Loai_Sua`) REFERENCES `loai_sua` (`Ma_Loai_Sua`),
  ADD CONSTRAINT `sua_ibfk_2` FOREIGN KEY (`Ma_Hang_Sua`) REFERENCES `hang_sua` (`Ma_Hang_Sua`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
--bài tập 3: thực hiện các câu lệnh truy vấn làm các công việc sau
--1.Liệt kê ds hãng sữa gồm tên hãng, địa chỉ, điện thoại
select Ten_Hang_Sua, Dia_Chi, Dien_Thoai from hang_sua
--2.Liệt kê ds sữa gồm tên sữa, trọng lượng, đơn giá sắp xếp giảm dần theo đơn giá
select Ten_Sua, Trong_Luong, Don_Gia from sua  order by Don_Gia desc
--3.Liệt kê ds khách hàng gồm các thông tin: tên, địa chỉ, điện thoại, sắp xếp theo thứ tự tên khách
select Ten_Khach_Hang, Dia_Chi, Dien_Thoai from khach_hang order by Ten_Khach_Hang desc
--4
select Ten_Khach_Hang,Phai, Dia_Chi, Dien_Thoai from khach_hang order by Phai desc
--Bài 4:
--1.
select Ten_Sua, Trong_Luong, Don_Gia, TP_Dinh_Duong from sua  where Ten_Sua like 'S%';
--2
select * from sua  where Ten_Sua like '%grow%';
--3
select * from hang_sua  where Ten_Hang_Sua like '%m';
--4
select * from hang_sua  where Ten_Hang_Sua not in ( select Ten_Hang_Sua from hang_sua where Ten_Hang_Sua like '%m%');
--5.
select * from sua  where Trong_Luong=180 or Trong_Luong=200 or Trong_Luong=900;
--6
select Ten_Sua, TP_Dinh_Duong from sua  where TP_Dinh_Duong like '%canxi%' and TP_Dinh_Duong like '%vitamin%';
--7
select * from sua  where Trong_Luong not in (select Trong_Luong from sua where Trong_Luong=400 or Trong_Luong=800 or Trong_Luong=900);
--8
select * from sua  where Don_Gia>100000 and Don_Gia<150000;
--9
--Bài 5
--1
CREATE TABLE bang_tam (
  Ma_Sua varchar(6)  NOT NULL,
  Ten_Sua varchar(100)  NOT NULL,
  Ma_Loai_Sua varchar(3)  NOT NULL,
  Ma_Hang_Sua varchar(20)  NOT NULL,
  Trong_Luong int DEFAULT NULL,
  Don_Gia int DEFAULT NULL,
  TP_Dinh_Duong text ,
  Loi_ich text ,
  Hinh varchar(200)  DEFAULT NULL
) 
--2
INSERT INTO khach_hang (Ma_Khach_Hang, Ten_Khach_Hang, Phai, Dia_Chi, Dien_Thoai, Email) VALUES
('KH007', 'Mai Anh', 1, 'Khoái Châu-Hưng Yên', '8954671', 'khachhangkhoaichau@gmail.com')
--3
INSERT INTO bang_tam(Ma_Sua, Ten_Sua, Ma_Loai_Sua, Ma_Hang_Sua, Trong_Luong, Don_Gia, TP_Dinh_Duong, Loi_ich, Hinh) VALUES
('S01', 'Sữa bột Vinamilk Optimum Gold 4 - Hộp thiếc 1500g', 'LS1', 'MHS01', 1500, 524068, NULL, NULL, NULL),
('S02', 'Sữa bột Vinamilk Sure Prevent - Hộp thiếc 900g', 'LS1', 'MHS01', 900, 456665, NULL, NULL, NULL),
('S03', '[COMBO 18 HỘP] - Sữa tươi tiệt trùng Vinamilk 100% Ít Đường - Hộp giấy ', 'LS2', 'MHS02', 500, 566082, NULL, NULL, NULL),
('S04', 'Sữa tươi tiệt trùng Vinamilk 100% Ít Đường - Lốc 4 Hộp x 180ml', 'LS2', 'MHS03', 180, 29612, NULL, NULL, NULL),
('S05', 'Sữa chua uống Probi Việt Quất - Lốc 4 chai x 130ml', 'LS3', 'MHS04', 130, 32648, NULL, NULL, NULL);
--4