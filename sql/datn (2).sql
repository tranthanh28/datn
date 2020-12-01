-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2020 at 12:15 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datn`
--

-- --------------------------------------------------------

--
-- Table structure for table `baigiang`
--

CREATE TABLE `baigiang` (
  `id` int(11) NOT NULL,
  `TenBaiGiang` varchar(200) NOT NULL,
  `idChuDe` int(11) NOT NULL,
  `DiaChi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `baigiang`
--

INSERT INTO `baigiang` (`id`, `TenBaiGiang`, `idChuDe`, `DiaChi`) VALUES
(1, 'Bất phương trình có dấu giá trị tuyệt đối', 1, './video/lop10/toan10/1.mp4'),
(2, 'Bất phương trình bậc 2', 1, ''),
(3, 'Bất đẳng thức Cosin', 1, ''),
(4, 'Hệ phương trình đồng bậc', 1, ''),
(5, 'Phương trình bậc nhất', 1, ''),
(6, 'Phương trình bậc 2', 1, ''),
(7, 'Đại cương về phương trình', 1, ''),
(8, 'Hệ thức lượng trong tam giác', 1, ''),
(9, 'Động học chất điểm ', 2, './video/lop10/ly10/1.mp4'),
(10, 'Động lực học chất điểm', 2, './video/lop10/ly10/2.mp4'),
(11, 'Cân bằng và chuyển động của vật rắn', 2, ''),
(12, 'Các định luật bảo toàn ', 2, ''),
(13, 'Cấu tạo nguyên tử', 3, ''),
(14, 'Bảng tuần hoàn', 3, ''),
(15, 'Liên kết hóa học', 3, ''),
(16, 'Phản ứng hóa học', 3, ''),
(17, 'Tốc độ phản ứng và cân bằng hóa học', 3, ''),
(18, 'Thành phần hóa học của tế bào', 4, './video/lop10/sinh10/1.mp4'),
(19, 'Cấu trúc tế bào', 4, ''),
(20, 'Phân bào', 4, ''),
(21, 'Sinh trưởng và phát triển của vi sinh vật', 4, ''),
(22, 'Virut và bệnh truyền nhiễm', 4, ''),
(23, 'Từ vựng', 5, ''),
(24, 'Ngữ pháp', 5, ''),
(27, '', 5, ''),
(28, '', 5, '');

-- --------------------------------------------------------

--
-- Table structure for table `chude`
--

CREATE TABLE `chude` (
  `id` int(11) NOT NULL,
  `TenChuDe` varchar(200) NOT NULL,
  `IdKhoaHoc` int(11) NOT NULL,
  `IdGiaoVien` int(11) NOT NULL,
  `HocPhi` int(11) NOT NULL,
  `DcHinhAnh` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chude`
--

INSERT INTO `chude` (`id`, `TenChuDe`, `IdKhoaHoc`, `IdGiaoVien`, `HocPhi`, `DcHinhAnh`) VALUES
(1, 'Toán Lớp 10', 1, 1, 500000, './anh/lop10/toanhoc10.jpg'),
(2, 'Vật Lý Lớp 10', 1, 4, 500000, './anh/lop10/ly10.jpg'),
(3, 'Hóa Hoc Lớp 10', 1, 2, 500000, './anh/lop10/hoahoc10.jpg'),
(4, 'Sinh Học Lớp 10', 1, 5, 500000, './anh/lop10/sinh10.jpg'),
(5, 'Tieng Anh Lớp 10', 1, 2, 500000, './anh/lop10/anh10.jpg'),
(6, 'Toán Lớp 11', 2, 6, 500000, './anh/lop11/toan11.jpg'),
(7, 'Vật Lý Lớp 11', 2, 8, 500000, './anh/lop11/vl11.jpg'),
(8, 'Hóa Học Lớp 11', 2, 5, 500000, './anh/lop11/hh11.jpg'),
(9, 'Sinh Học Lớp 11', 2, 10, 500000, './anh/lop11/sh11.jpg'),
(10, 'Tiếng Anh Lớp 11', 2, 9, 500000, './anh/lop11/ta11.jpg'),
(11, 'Toán Lớp 12', 3, 11, 500000, './anh/lop12/toan12.jpg'),
(12, 'Vật Lý Lớp 12', 3, 1, 500000, './anh/lop12/vl12.jpg'),
(13, 'Hóa Học Lớp 12', 3, 7, 500000, './anh/lop12/hh12.jpg'),
(14, 'Sinh Học Lớp 12', 3, 8, 500000, './anh/lop12/sh12.jpg'),
(15, 'Tiếng Anh Lớp 12', 3, 9, 500000, './anh/lop12/ta12.jpg'),
(16, 'Khóa Công Phá Ngữ Pháp', 4, 12, 500000, './anh/tienganh/np.png'),
(17, 'Tiếng Anh Cho Người Mới Bắt Đầu', 4, 10, 500000, './anh/tienganh/bd.png'),
(18, 'Luyện Thi TOEIC 450+', 4, 2, 500000, './anh/tienganh/TOEIC.jpg'),
(19, 'Tiếng Anh Giao Tiếp', 4, 12, 500000, './anh/tienganh/gt.png');

-- --------------------------------------------------------

--
-- Table structure for table `giaovien`
--

CREATE TABLE `giaovien` (
  `id` int(11) NOT NULL,
  `TenGiaoVien` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `giaovien`
--

INSERT INTO `giaovien` (`id`, `TenGiaoVien`) VALUES
(1, 'Thầy Đặng Việt Hùng'),
(2, 'Cô Huyền Diệu'),
(3, 'Thầy Lại Đắc Hợp'),
(4, 'Thầy Phan Văn Nghệ'),
(5, 'Thầy Phan Anh Tuấn'),
(6, 'Thầy Lê Anh Tuấn'),
(7, 'Thầy Phan Thế Duy'),
(8, 'Thầy Phạm Hùng Vương'),
(9, 'Cô Nguyễn Quỳnh Trang'),
(10, 'Cô Phan Điệu'),
(11, 'Thầy Trần Mạnh Tuấn'),
(12, 'Cô Nguyễn Thị Nhung');

-- --------------------------------------------------------

--
-- Table structure for table `khoahoc`
--

CREATE TABLE `khoahoc` (
  `id` int(11) NOT NULL,
  `TenKhoaHoc` varchar(200) NOT NULL,
  `ThongTin` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `khoahoc`
--

INSERT INTO `khoahoc` (`id`, `TenKhoaHoc`, `ThongTin`) VALUES
(1, 'Khóa lớp 10', 'Hệ thống bài giảng từ Cơ bản đến Chuyên sâu được chia thành các chương (chuyên đề) theo sách giáo khoa.'),
(2, 'Khóa Lớp 11', 'Hệ thống bài giảng từ Cơ bản đến Chuyên sâu được chia thành các chương (chuyên đề) theo sách giáo khoa.'),
(3, 'Khóa lớp 12', 'Hệ thống bài giảng từ Cơ bản đến Chuyên sâu được chia thành các chương (chuyên đề) theo sách giáo khoa.'),
(4, 'Khóa Tiếng Anh', 'Hệ thống bài giảng từ Cơ bản đến Chuyên sâu được chia thành các chương (chuyên đề) theo sách giáo khoa.');

-- --------------------------------------------------------

--
-- Table structure for table `nguoidung`
--

CREATE TABLE `nguoidung` (
  `id` int(11) NOT NULL,
  `TenNguoiDung` varchar(30) NOT NULL,
  `SoTien` int(12) NOT NULL,
  `DiaChi` varchar(200) NOT NULL,
  `MatKhau` varchar(20) NOT NULL,
  `SoDienThoai` int(15) NOT NULL,
  `HoTen` varchar(30) NOT NULL,
  `NgayThamGia` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nguoidung`
--

INSERT INTO `nguoidung` (`id`, `TenNguoiDung`, `SoTien`, `DiaChi`, `MatKhau`, `SoDienThoai`, `HoTen`, `NgayThamGia`) VALUES
(1, 'hoang', 400000, 'Nghệ An', '123456', 983647724, 'Nguyễn Văn Hoàn', '2020-11-11'),
(2, 'nhung', 3500000, 'Hà Nội', '123456', 123434241, 'Trần Thị Nhung', '2020-11-03'),
(3, 'huy', 100000, 'Thái Nguyên', '123456', 1232232313, 'Đỗ Ngọc Huy', '2020-11-02');

-- --------------------------------------------------------

--
-- Table structure for table `tg`
--

CREATE TABLE `tg` (
  `id` int(11) NOT NULL,
  `idNguoiDung` int(11) NOT NULL,
  `idChuDe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tg`
--

INSERT INTO `tg` (`id`, `idNguoiDung`, `idChuDe`) VALUES
(2, 1, 2),
(4, 2, 3),
(5, 2, 1),
(10, 1, 16),
(14, 1, 5),
(19, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `baigiang`
--
ALTER TABLE `baigiang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idChuDe` (`idChuDe`);

--
-- Indexes for table `chude`
--
ALTER TABLE `chude`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IdGiaoVien` (`IdGiaoVien`),
  ADD KEY `IdKhoaHoc` (`IdKhoaHoc`);

--
-- Indexes for table `giaovien`
--
ALTER TABLE `giaovien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `khoahoc`
--
ALTER TABLE `khoahoc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tg`
--
ALTER TABLE `tg`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aaa` (`idChuDe`),
  ADD KEY `bbb` (`idNguoiDung`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `baigiang`
--
ALTER TABLE `baigiang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `chude`
--
ALTER TABLE `chude`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `giaovien`
--
ALTER TABLE `giaovien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `khoahoc`
--
ALTER TABLE `khoahoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tg`
--
ALTER TABLE `tg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `baigiang`
--
ALTER TABLE `baigiang`
  ADD CONSTRAINT `baigiang_ibfk_1` FOREIGN KEY (`idChuDe`) REFERENCES `chude` (`id`);

--
-- Constraints for table `chude`
--
ALTER TABLE `chude`
  ADD CONSTRAINT `chude_ibfk_1` FOREIGN KEY (`IdGiaoVien`) REFERENCES `giaovien` (`id`),
  ADD CONSTRAINT `chude_ibfk_2` FOREIGN KEY (`IdKhoaHoc`) REFERENCES `khoahoc` (`id`);

--
-- Constraints for table `tg`
--
ALTER TABLE `tg`
  ADD CONSTRAINT `aaa` FOREIGN KEY (`idChuDe`) REFERENCES `chude` (`id`),
  ADD CONSTRAINT `bbb` FOREIGN KEY (`idNguoiDung`) REFERENCES `nguoidung` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
