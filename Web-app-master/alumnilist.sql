-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2021 at 02:54 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alumnilist`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `diachi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`diachi`) VALUES
('An Giang'),
('Bà Rịa - Vũng Tàu'),
('Bắc Giang'),
('Bắc Kạn'),
('Bạc Liêu'),
('Bắc Ninh'),
('Bến Tre'),
('Bình Dương'),
('Bình Phước'),
('Bình Thuận'),
('Bình Định'),
('Cà Mau'),
('Cần Thơ'),
('Cao Bằng'),
('Gia Lai'),
('Hà Giang'),
('Hà Nam'),
('Hà Nội'),
('Hà Tĩnh'),
('Hải Dương'),
('Hải Phòng'),
('Hậu Giang'),
('Hòa Bình'),
('Hưng Yên'),
('Khánh Hòa'),
('Kiên Giang'),
('Kon Tum'),
('Lai Châu'),
('Lâm Đồng'),
('Lạng Sơn'),
('Lào Cai'),
('Long An'),
('Nam Định'),
('Nghệ An'),
('Ninh Bình'),
('Ninh Thuận'),
('Phú Thọ'),
('Phú Yên'),
('Quảng Bình'),
('Quảng Nam'),
('Quảng Ngãi'),
('Quảng Ninh'),
('Quảng Trị'),
('Sóc Trăng'),
('Sơn La'),
('Tây Ninh'),
('Thái Bình'),
('Thanh Hóa'),
('Thành phố Hồ Chí Minh'),
('Thừa Thiên Huế'),
('Tiền Giang'),
('Trà Vinh'),
('Tuyên Quang'),
('Vĩnh Long'),
('Vĩnh Phúc'),
('Yên Bái'),
('Đà Nẵng'),
('Đắk Lắk'),
('Đắk Nông'),
('Điện Biên'),
('Đồng Nai'),
('Đồng Tháp');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `classname` varchar(20) NOT NULL,
  `namegiaovien` varchar(100) NOT NULL,
  `gioitinh` varchar(10) DEFAULT NULL,
  `tel` int(20) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`classname`, `namegiaovien`, `gioitinh`, `tel`, `email`) VALUES
('K66C-CLC', 'Ths. Hồ Đắc Phương', 'Nam', 988613986, 'phuonghd@vnu.edu.vn'),
('K66CA-CLC1', 'TS. Võ Đình Hiếu', 'Nam', 948466848, 'hieuvd@vnu.edu.vn'),
('K66CA-CLC2', 'PGS.TS. Nguyễn Hoài Sơn', 'Nam', 906369388, 'sonnh@vnu.edu.vn'),
('K66CA-CLC3', 'PGS.TS. Phạm Ngọc Hùng', 'Nam', 948810242, 'hungpn@vnu.edu.vn'),
('K66CB', 'TS. Ma Thị Châu', 'Nữ', 947150309, 'chaumt@vnu.edu.vn'),
('K66CC', 'TS. Ngô Thị Duyên', 'Nữ', 986898948, 'duyennt@vnu.edu.vn'),
('K66CD', 'TS. Lê Quang Hiếu', 'Nam', 364716351, 'hieulq@vnu.edu.vn'),
('K66J', 'TS. Dương Lê Minh', 'Nam', 913507435, 'minhdl@vnu.edu.vn'),
('K66N-CLC', 'TS. Trần Trúc Mai', 'Nữ', 903404959, 'mai.tran@vnu.edu.vn'),
('K66T-CLC', 'TS. Trần Trọng Hiếu', 'Nam', 945893663, 'hieutt@vnu.edu.vn');

-- --------------------------------------------------------

--
-- Table structure for table `gioitinh`
--

CREATE TABLE `gioitinh` (
  `gioitinh` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gioitinh`
--

INSERT INTO `gioitinh` (`gioitinh`) VALUES
('Nam'),
('Nữ');

-- --------------------------------------------------------

--
-- Table structure for table `hocsinh`
--

CREATE TABLE `hocsinh` (
  `idmsv` int(10) NOT NULL,
  `classname` varchar(20) DEFAULT NULL,
  `namehs` varchar(50) NOT NULL,
  `ngaysinh` date DEFAULT NULL,
  `gioitinh` varchar(10) DEFAULT NULL,
  `diachi` varchar(100) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `emaill` varchar(50) DEFAULT NULL,
  `ghichu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hocsinh`
--

INSERT INTO `hocsinh` (`idmsv`, `classname`, `namehs`, `ngaysinh`, `gioitinh`, `diachi`, `tel`, `emaill`, `ghichu`) VALUES
(21021001, 'K66C-CLC', 'Nguyễn Văn Anh Minh', '2002-01-01', 'Nam', 'Bắc Giang', '123456789', 'a@gmail.com', NULL),
(21021002, 'K66C-CLC', 'Trần Văn Bình', '2002-05-15', 'Nam', 'Hà Nội', '0123456789', 'B@gmail.com', NULL),
(21021003, 'K66C-CLC', 'Phạm Thị Cúc', '2003-11-10', 'Nữ', 'Bắc Ninh', '0922392948', 'C@gmail.com', NULL),
(21021004, 'K66C-CLC', 'Trần Đê Đăng', '2002-06-03', 'Nam', 'Bắc Giang', '01234344389', 'D@gmail.com', NULL),
(21021005, 'K66C-CLC', 'Phạm Thị Kim Oanh', '2003-10-11', 'Nữ', 'Bắc Ninh', '0947934537', 'E@gmail.com', NULL),
(21021007, 'K66CA-CLC1', 'Hoàng Thùy Dung', '2002-05-24', 'Nam', 'Hậu Giang', '095645365', 'Ech@gmail.com', NULL),
(21021008, 'K66CA-CLC1', 'Nguyễn Văn Thái', '2002-10-17', 'Nam', 'Nam Định', '0366677789', 'o@gmail.com', NULL),
(21021009, 'K66CA-CLC1', 'Trần Đăng Khoa', '2003-11-10', 'Nam', 'Hậu Giang', '037326434', 'khoa10@gmail.com', NULL),
(21021010, 'K66CA-CLC1', 'Trương Cao Tiến', '2003-10-23', 'Nam', 'Bắc Ninh', '0321734324', 'tien2310@gmail.com', NULL),
(21021011, 'K66CA-CLC1', 'Phạm Thành Vinh', '2003-06-24', 'Nam', 'Bắc Giang', '0332674623', 'vinhthanh@gmail.com', NULL),
(21021021, 'K66CA-CLC2', 'Phạm Minh Trang', '2003-04-03', 'Nữ', 'Bình Thuận', '035263254', 'trangpham0304@gmail.com', NULL),
(21021022, 'K66CA-CLC2', 'Trần Trung Trọng Thành', '2003-03-06', 'Nam', 'Bình Dương', '0354726422', 'trongthanh21@gmail.com', NULL),
(21021023, 'K66CA-CLC2', 'Công Tôn Sách', '2003-04-17', 'Nam', 'Hà Nội', '036287326', 'sachbankhong@gmail.com', NULL),
(21021024, 'K66CA-CLC2', 'Phèo Văn Chí', '2003-05-07', 'Nam', 'Cao Bằng', '0362747224', 'chioilachi@gmail.com', NULL),
(21021025, 'K66CA-CLC2', 'Hoàng Phi Hồng', '2003-06-23', 'Nam', 'Bình Định', '0372847274', 'hongphi@gmail.com', NULL),
(21021031, 'K66CA-CLC3', 'Nguyễn Huy Hoàng', '2003-06-13', 'Nam', 'Bình Phước', '0352625234', 'hoanghuy13@gmail.com', NULL),
(21021032, 'K66CA-CLC3', 'Nguyễn Thị Anh Vy', '2003-07-16', 'Nữ', 'Bắc Giang', '0346248355', 'anhvy1607@gmail.com', NULL),
(21021033, 'K66CA-CLC3', 'Nguyễn Thị Thu Trang', '2003-05-28', 'Nữ', 'Thừa Thiên Huế', '0936724456', 'trang0528@gmail.com', NULL),
(21021034, 'K66CA-CLC3', 'Trịnh Trọng Trung', '2003-12-31', 'Nam', 'Nghệ An', '0362374954', 'trongtrung3112@gmail.com', NULL),
(21021035, 'K66CA-CLC3', 'Ngô Văn Minh Võ', '2003-06-23', 'Nam', 'Ninh Thuận', '0374758454', 'vanvo@gmail.com', NULL),
(21021041, 'K66CB', 'Ngô Gia Văn Phái', '2003-06-13', 'Nam', 'Quảng Bình', '0373747334', 'vanphai13@gmail.com', NULL),
(21021042, 'K66CB', 'Trần Văn Quang', '2003-07-18', 'Nam', 'Kiên Giang', '0364747544', 'quang18@gmail.com', NULL),
(21021043, 'K66CB', 'Trần Thị Ngát', '2003-07-12', 'Nữ', 'Lào Cai', '036473643', 'ngat1207@gmail.com', NULL),
(21021044, 'K66CB', 'Ngô Bá Khá', '2003-10-22', 'Nam', 'Thành phố Hồ Chí Minh', '036283621', 'khabanh@gmail.com', NULL),
(21021055, 'K66CB', 'Lò Văn Đức', '2003-06-24', 'Nam', 'Vĩnh Phúc', '0362736353', 'duclo@gmail.com', NULL),
(21021061, 'K66CC', 'Lê Thị Quả', '2003-08-21', 'Nữ', 'Hà Tĩnh', '0372826423', 'quale@gmail.com', NULL),
(21021062, 'K66CC', 'Võ Vũ Văn Vương', '2003-09-10', 'Nam', 'Hòa Bình', '0926135243', 'vovuong@gmail.com', NULL),
(21021063, 'K66CC', 'Hồ Xây Nhà', '2003-09-11', 'Nam', 'Hưng Yên', '092637347', 'honha@gmail.com', NULL),
(21021064, 'K66CC', 'Bùi Xuân Hướng', '2003-09-03', 'Nam', 'Yên Bái', '0373747353', 'huanhoahong@gmail.com', NULL),
(21021065, 'K66CC', 'Phan Văn Phụng', '2003-09-14', 'Nam', 'Cà Mau', '037374745', 'phungphan14@gmail.com', NULL),
(21021071, 'K66CD', 'Đỗ Văn Đào', '2003-05-30', 'Nam', 'Lâm Đồng', '0354678959', 'daodo0530@gmail.com', NULL),
(21021072, 'K66CD', 'Dương Danh Liệt', '2003-03-06', 'Nam', 'Phú Thọ', '0382843556', 'lietduong@gmail.com', NULL),
(21021073, 'K66CD', 'Phạm Thế An', '2003-09-11', 'Nam', 'Tiền Giang', '037384946', 'anthe@gmail.com', NULL),
(21021074, 'K66CD', 'Trần Thị Ngọc Anh', '2003-09-03', 'Nữ', 'Quảng Ninh', '037347594', 'anhngoc@gmail.com', NULL),
(21021075, 'K66CD', 'Phạm Ngọc Linh', '2003-09-14', 'Nữ', 'Lâm Đồng', '037483634', 'linhngoc@gmail.com', NULL),
(21021081, 'K66J', 'Phạm Thị Hồng', '2003-06-13', 'Nữ', 'Quảng Nam', '037385654', 'hongpham13@gmail.com', NULL),
(21021082, 'K66J', 'Trần Ngọc Kính', '2003-09-10', 'Nam', 'Yên Bái', '0374874854', 'ngockinh@gmail.com', NULL),
(21021083, 'K66J', 'Phan Hiền An', '2003-11-10', 'Nam', 'Bắc Giang', '037393759', 'anhien@gmail.com', NULL),
(21021084, 'K66J', 'Ngô Thị Diệp', '2003-12-31', 'Nữ', 'Bình Thuận', '0372836483', 'diepngo@gmail.com', NULL),
(21021085, 'K66J', 'Lý Khắc Việt', '2003-06-23', 'Nam', 'Bình Định', '0372833645', 'vietly23@gmail.com', NULL),
(21021101, 'K66N-CLC', 'Trần Huyền My', '2003-04-03', 'Nữ', 'Đắk Lắk', '0328749544', 'huyenmy0304@gmail.com', NULL),
(21021102, 'K66N-CLC', 'Ngô Văn Kiểm', '2003-11-10', 'Nam', 'Quảng Bình', '037294745', 'kiemngo@gmail.com', NULL),
(21021103, 'K66N-CLC', 'Trần Văn Cao Võ', '2003-09-11', 'Nam', 'Cần Thơ', '037848475', 'caovo@gmail.com', NULL),
(21021104, 'K66N-CLC', 'Nguyễn Minh Ngọc', '2003-12-31', 'Nam', 'Nam Định', '0372984745', 'ngocminh@gmail.com', NULL),
(21021105, 'K66N-CLC', 'Nguyễn Trung Hiếu', '2003-09-14', 'Nam', 'Bình Định', '0374974565', 'hieunguyen14@gmail.com', NULL),
(21021111, 'K66T-CLC', 'Trần Văn Quang', '2003-06-13', 'Nam', 'Hậu Giang', '037489476', 'quangt@gmail.com', NULL),
(21021112, 'K66T-CLC', 'Trương Văn Độ', '2003-07-16', 'Nam', 'Lạng Sơn', '0374846556', 'dotruong@gmail.com', NULL),
(21021113, 'K66T-CLC', 'Đào Thị Ngát', '2003-11-10', 'Nữ', 'Quảng Ninh', '037447594', 'ngatdao10@gmail.com', NULL),
(21021114, 'K66T-CLC', 'Nguyễn Văn Kiểm', '2003-10-22', 'Nam', 'Hải Phòng', '096484355', 'kiemnguyen22@gmail.com', NULL),
(21021115, 'K66T-CLC', 'Nguyễn Thị Khánh Linh', '2003-09-14', 'Nữ', 'Gia Lai', '037648645', 'linhkhanh@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `taikhoangv`
--

CREATE TABLE `taikhoangv` (
  `classname` varchar(20) NOT NULL,
  `user` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `img` varbinary(8000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `taikhoangv`
--

INSERT INTO `taikhoangv` (`classname`, `user`, `password`, `img`) VALUES
('K66C-CLC', '0001', 'uet123', NULL),
('K66CA-CLC1', '0002', 'uet123', NULL),
('K66CA-CLC2', '0003', 'uet123', NULL),
('K66CA-CLC3', '0004', 'uet123', NULL),
('K66CB', '0005', 'uet123', NULL),
('K66CC', '0006', 'uet123', NULL),
('K66CD', '0007', 'uet123', NULL),
('K66J', '0008', 'uet123', NULL),
('K66N-CLC', '0009', 'uet123', NULL),
('K66T-CLC', '0010', 'uet123', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `taikhoanhs`
--

CREATE TABLE `taikhoanhs` (
  `idmsv` int(10) NOT NULL,
  `user` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `img` varbinary(8000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `taikhoanhs`
--

INSERT INTO `taikhoanhs` (`idmsv`, `user`, `password`, `img`) VALUES
(21021001, 'nguyenan01', 'uet123', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`diachi`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`classname`),
  ADD KEY `gt_fk` (`gioitinh`);

--
-- Indexes for table `gioitinh`
--
ALTER TABLE `gioitinh`
  ADD PRIMARY KEY (`gioitinh`);

--
-- Indexes for table `hocsinh`
--
ALTER TABLE `hocsinh`
  ADD PRIMARY KEY (`idmsv`),
  ADD KEY `diachi_fk` (`diachi`),
  ADD KEY `class_fk` (`classname`),
  ADD KEY `gths_fk` (`gioitinh`);

--
-- Indexes for table `taikhoangv`
--
ALTER TABLE `taikhoangv`
  ADD PRIMARY KEY (`classname`);

--
-- Indexes for table `taikhoanhs`
--
ALTER TABLE `taikhoanhs`
  ADD PRIMARY KEY (`idmsv`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `gt_fk` FOREIGN KEY (`gioitinh`) REFERENCES `gioitinh` (`gioitinh`) ON UPDATE CASCADE;

--
-- Constraints for table `hocsinh`
--
ALTER TABLE `hocsinh`
  ADD CONSTRAINT `class_fk` FOREIGN KEY (`classname`) REFERENCES `class` (`classname`) ON UPDATE CASCADE,
  ADD CONSTRAINT `diachi_fk` FOREIGN KEY (`diachi`) REFERENCES `address` (`diachi`) ON UPDATE CASCADE,
  ADD CONSTRAINT `gths_fk` FOREIGN KEY (`gioitinh`) REFERENCES `gioitinh` (`gioitinh`) ON UPDATE CASCADE;

--
-- Constraints for table `taikhoangv`
--
ALTER TABLE `taikhoangv`
  ADD CONSTRAINT `accgv_fk` FOREIGN KEY (`classname`) REFERENCES `class` (`classname`) ON UPDATE CASCADE;

--
-- Constraints for table `taikhoanhs`
--
ALTER TABLE `taikhoanhs`
  ADD CONSTRAINT `acc_fk` FOREIGN KEY (`idmsv`) REFERENCES `hocsinh` (`idmsv`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
