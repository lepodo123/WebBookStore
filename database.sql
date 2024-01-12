-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 11, 2024 at 07:16 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonhang`
--

DROP TABLE IF EXISTS `chitietdonhang`;
CREATE TABLE IF NOT EXISTS `chitietdonhang` (
  `madonhang` int(11) NOT NULL,
  `soluong` int(11) DEFAULT NULL,
  `dongia` decimal(18,0) DEFAULT NULL,
  PRIMARY KEY (`madonhang`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `chude`
--

DROP TABLE IF EXISTS `chude`;
CREATE TABLE IF NOT EXISTS `chude` (
  `machude` int(11) NOT NULL AUTO_INCREMENT,
  `tenchude` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`machude`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chude`
--

INSERT INTO `chude` (`machude`, `tenchude`) VALUES
(1, 'Hoạt hình '),
(2, 'Văn học '),
(3, 'Kinh tế'),
(4, 'Kỹ năng sống'),
(5, 'Khoa học – Công nghệ'),
(6, 'Nhân sự'),
(7, 'Giáo dục');

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

DROP TABLE IF EXISTS `donhang`;
CREATE TABLE IF NOT EXISTS `donhang` (
  `madonhang` int(11) NOT NULL AUTO_INCREMENT,
  `dathanhtoan` int(11) DEFAULT NULL,
  `tinhTranggiaohang` int(11) DEFAULT NULL,
  `ngaydat` datetime DEFAULT NULL,
  `ngaygiao` datetime DEFAULT NULL,
  `makh` int(11) DEFAULT NULL,
  PRIMARY KEY (`madonhang`),
  KEY `makh` (`makh`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `giohang`
--

DROP TABLE IF EXISTS `giohang`;
CREATE TABLE IF NOT EXISTS `giohang` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `id_khachhang` bigint(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

DROP TABLE IF EXISTS `khachhang`;
CREATE TABLE IF NOT EXISTS `khachhang` (
  `makh` int(11) NOT NULL AUTO_INCREMENT,
  `hoten` varchar(50) DEFAULT NULL,
  `taikhoan` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `matkhau` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `diachi` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `dienthoai` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `ngaysinh` datetime DEFAULT NULL,
  PRIMARY KEY (`makh`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`makh`, `hoten`, `taikhoan`, `matkhau`, `email`, `diachi`, `dienthoai`, `ngaysinh`) VALUES
(1, 'Lễ', 'lepodo', 'lepodo123', 'lepodo32@gmail.com', 'Tp.Hcm', '01213932245', '2013-12-11 20:58:56'),
(2, 'admin', 'admin', 'admin123', 'lepodo@gmail.com', 'Tp.Hcm', '012002330', '2013-12-11 20:58:56'),
(7, 'Le Pham', 'lepodo123', 'lepodo123', 'lepodo32@gmail.com', 'TPhcm', '0793932245', '2002-11-11 00:00:00'),
(9, 'Le Pham', 'lepodo1506', 'lepodo123', 'lepodo32@gmail.com', 'TPhcm', '0793932245', '2002-11-11 00:00:00'),
(8, 'Le Pham', 'lepodo11', 'lepodo123', 'lepodo32@gmail.com', 'TPhcm', '0793932245', '2002-11-11 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `nhaxuatban`
--

DROP TABLE IF EXISTS `nhaxuatban`;
CREATE TABLE IF NOT EXISTS `nhaxuatban` (
  `manxb` int(11) NOT NULL AUTO_INCREMENT,
  `tennxb` varchar(50) DEFAULT NULL,
  `diachi` varchar(200) DEFAULT NULL,
  `dienthoai` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`manxb`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sach`
--

DROP TABLE IF EXISTS `sach`;
CREATE TABLE IF NOT EXISTS `sach` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tensach` varchar(255) NOT NULL,
  `gia` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `img` varchar(30) NOT NULL,
  `ngaycapnhat` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sach`
--

INSERT INTO `sach` (`id`, `tensach`, `gia`, `soluong`, `img`, `ngaycapnhat`) VALUES
(1, ' ', 38000, 999, 'image/img_item/book7.jpg', '2023-12-18 00:00:00'),
(2, 'Vun Đắp Tâm Hồn - Ông Già Noel Và Cuộc Phiêu Lưu Của Đôi Giày Mới', 42500, 250, 'image/img_item/book2.jpg', '2023-12-18 00:00:00'),
(3, 'Nghề Nhân Sự Việt (Tập 2) - Góc Nhìn Từ Bên Trong: Hành Trình Phát Triển Cùng Con Người và Tổ Chức', 160500, 12, 'image/img_item/book3.png', '2023-12-18 03:12:47'),
(4, 'Giáo Dục Giới Tính Và Nhân Cách Dành Cho Bé Gái - Mọi Điều Bé Gái Cần Phải Biết - Tớ Là Cô Bé Tự Lập - Dạy Trẻ Kỹ Năng Tự Giác Hoàn Thành Công', 29500, 100, 'image/img_item/book4.jpg', '2023-12-18 03:14:42'),
(5, 'Năng Lượng Tích Cực, Đánh Thức Bản Thân, Cân Bằng Cảm Xúc\r\n', 143500, 56, 'image/img_item/book5.jpg', '2023-12-18 03:16:42'),
(6, 'Vun Đắp Tâm Hồn - Con Sẽ Nhận Ra Mẹ, Dù Ở Bất Cứ Nơi Đâu', 42500, 100, 'image/img_item/book6.jpg', '2023-12-18 05:49:38'),
(7, 'Tranh Truyện Lịch Sử Việt Nam - Công Nữ Anio', 51000, 212, 'image/img_item/book7.jpg', '2023-12-18 05:50:51'),
(8, 'Bạn Cá Sấu Thân Thiện - Tập 1: Tình Bạn Diệu Kì', 59500, 11, 'image/img_item/book8.jpg', '2023-12-18 00:00:00'),
(9, 'Bạn Cá Sấu Thân Thiện - Tập 2: Những Mẩu Truyện Nho Nhỏ', 59500, 11, 'image/img_item/book9.jpg', '2023-12-18 05:54:06'),
(10, 'Tranh Truyện Dân Gian Việt Nam: Sự Tích Con Khỉ (Tái Bản 2023)', 17000, 78, 'image/img_item/book10.jpg', '2023-12-18 05:55:02'),
(11, 'Hiểu Đúng Về Tiền', 51000, 123, 'image/img_item/book11.jpg', '2023-12-18 12:08:33'),
(14, 'Ối Ối Ối! Bé Lợn Gặp Rắc Rối', 33000, 121, 'image/img_item/book12.png', '2023-12-19 00:00:00'),
(15, 'Overthinking - Kẻ Nghĩ Nhiều', 152000, 12, 'image/img_item/book13.png', '2023-12-17 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sach_chitietdonhang`
--

DROP TABLE IF EXISTS `sach_chitietdonhang`;
CREATE TABLE IF NOT EXISTS `sach_chitietdonhang` (
  `id_sach` int(11) NOT NULL,
  `id_chitietdonhang` int(11) NOT NULL,
  PRIMARY KEY (`id_sach`,`id_chitietdonhang`),
  KEY `id_sach` (`id_sach`) USING BTREE,
  KEY `id_chitietdonhang` (`id_chitietdonhang`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sach_chude`
--

DROP TABLE IF EXISTS `sach_chude`;
CREATE TABLE IF NOT EXISTS `sach_chude` (
  `sach_id` int(11) NOT NULL,
  `chude_id` int(11) NOT NULL,
  KEY `fk_chude` (`chude_id`) USING BTREE,
  KEY `fk_sach` (`sach_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sach_chude`
--

INSERT INTO `sach_chude` (`sach_id`, `chude_id`) VALUES
(1, 5),
(2, 1),
(3, 4),
(3, 6),
(4, 1),
(4, 7),
(5, 2),
(5, 4),
(6, 1),
(6, 1),
(7, 7),
(15, 5),
(15, 3),
(9, 6),
(10, 5),
(10, 1),
(11, 6),
(11, 2),
(1, 2),
(15, 2),
(20, 2),
(20, 5),
(15, 7),
(15, 6),
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sach_giohang`
--

DROP TABLE IF EXISTS `sach_giohang`;
CREATE TABLE IF NOT EXISTS `sach_giohang` (
  `id_sach` bigint(20) NOT NULL,
  `id_giohang` bigint(11) NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
