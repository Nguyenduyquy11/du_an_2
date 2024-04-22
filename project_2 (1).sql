-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 22, 2024 lúc 05:12 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `project_2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baiviet`
--

CREATE TABLE `baiviet` (
  `id` int(11) NOT NULL,
  `tieu_de` varchar(255) DEFAULT NULL,
  `noi_dung` text DEFAULT NULL,
  `tac_gia_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id` int(11) NOT NULL,
  `ten_nguoi_binh_luan` varchar(100) DEFAULT NULL,
  `noi_dung` text DEFAULT NULL,
  `ngay_binh_luan` date DEFAULT NULL,
  `id_san_pham` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `avt_user` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`id`, `ten_nguoi_binh_luan`, `noi_dung`, `ngay_binh_luan`, `id_san_pham`, `id_user`, `avt_user`) VALUES
(35, 'Hạnh Liên', '???', '2024-04-07', 14, 10, 'app/img/z4692627378610_a96d62f46bb8fae9522e61fa51df6d13.jpg'),
(36, 'Hạnh Liên', 'oce boy', '2024-04-07', 14, 10, 'app/img/z4692627381753_cab1d67f887f367931e617487945517a.jpg'),
(37, 'Hạnh Liên', 'lam sao', '2024-04-07', 14, 10, 'app/img/z4692627381753_cab1d67f887f367931e617487945517a.jpg'),
(38, 'Hạnh Liên', 'Thắm chó', '2024-04-08', 14, 10, 'app/img/z4692627381753_cab1d67f887f367931e617487945517a.jpg'),
(39, 'Quý Nguyễn Duy ', 'I WANT TO SAY \"ĐỊT MẸ TÚ\"', '2024-04-09', 19, 2, 'app/img/anhtao.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chucvu`
--

CREATE TABLE `chucvu` (
  `id` int(11) NOT NULL,
  `ten_chuc_vu` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chucvu`
--

INSERT INTO `chucvu` (`id`, `ten_chuc_vu`) VALUES
(1, 'Admin'),
(2, 'Người dùng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(11) NOT NULL,
  `ten_danh_muc` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `ten_danh_muc`) VALUES
(1, 'Áo'),
(2, 'Quần'),
(3, 'Dép'),
(4, 'Mũ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `id` int(11) NOT NULL,
  `id_nguoi_nhan` int(11) DEFAULT NULL,
  `ten_nguoi_nhan` varchar(255) DEFAULT NULL,
  `sdt_nguoi_nhan` int(11) NOT NULL,
  `dia_chi` varchar(255) NOT NULL,
  `ngay_dat_hang` date DEFAULT NULL,
  `pt_thanh_toan` tinyint(1) NOT NULL,
  `tong_tien` decimal(10,0) DEFAULT NULL,
  `trang_thai` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`id`, `id_nguoi_nhan`, `ten_nguoi_nhan`, `sdt_nguoi_nhan`, `dia_chi`, `ngay_dat_hang`, `pt_thanh_toan`, `tong_tien`, `trang_thai`) VALUES
(23, 10, 'Nguyễn Duy Quý', 379648268, 'Mê Linh 2', '2024-04-06', 0, 350, 4),
(24, 2, 'Hoàng Hằng', 379648268, 'Bắc Vịnh Nam Tây Vực', '2024-04-06', 0, 700, 3),
(26, 10, 'TÚ CHÓ', 123232, 'HỒ CHÍ MINH', '2024-04-22', 0, 350, 4),
(27, 10, 'Thầy an', 338016742, 'NAM ĐỊNH', '2024-04-22', 0, 400, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadonchitiet`
--

CREATE TABLE `hoadonchitiet` (
  `id` int(11) NOT NULL,
  `hoa_don_id` int(11) DEFAULT NULL,
  `san_pham_id` int(11) DEFAULT NULL,
  `ten_san_pham` varchar(255) NOT NULL,
  `anh_sp` varchar(255) NOT NULL,
  `gia_sp` int(11) NOT NULL,
  `so_luong` int(11) DEFAULT NULL,
  `don_gia` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadonchitiet`
--

INSERT INTO `hoadonchitiet` (`id`, `hoa_don_id`, `san_pham_id`, `ten_san_pham`, `anh_sp`, `gia_sp`, `so_luong`, `don_gia`) VALUES
(19, 23, 19, 'Ví', 'app/img/chon-suong.jpg', 350, 1, 350.00),
(20, 24, 20, 'Áo sơ mi', 'app/img/cms.jpg', 700, 1, 700.00),
(21, 25, 21, 'Quần Jean Nam', 'app/img/t2.png', 400, 1, 400.00),
(22, 26, 19, 'Ví', 'app/img/chon-suong.jpg', 350, 1, 350.00),
(23, 27, 21, 'Quần Jean Nam', 'app/img/t2.png', 400, 1, 400.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lienhe`
--

CREATE TABLE `lienhe` (
  `id` int(11) NOT NULL,
  `ten` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `noi_dung` text DEFAULT NULL,
  `trang_thai` varchar(255) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `lienhe`
--

INSERT INTO `lienhe` (`id`, `ten`, `email`, `noi_dung`, `trang_thai`) VALUES
(1, 'Tú', 'quyndph38584@fpt.edu.vn', 'Hưng hải chuyên bom hàng\r\n', '11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `ten_san_pham` varchar(255) DEFAULT NULL,
  `gia` decimal(11,0) DEFAULT NULL,
  `anh_sp` varchar(255) NOT NULL,
  `mo_ta` text DEFAULT NULL,
  `danh_muc_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `ten_san_pham`, `gia`, `anh_sp`, `mo_ta`, `danh_muc_id`) VALUES
(14, 'Quần kaki', 700, 'app/img/555.jpg', 'Quần Kaki rất là đẹp tôn dáng cao giúp anh em có dáng cao hơn', 2),
(15, 'Mũ habat', 950, 'app/img/_MG_8449.JPG', 'Áo dành cho những bạn mà đéo có áo', 4),
(19, 'Ví', 350, 'app/img/chon-suong.jpg', 'Ví xịn siêu xinh nhập khẩu từ bên Trung Quốc về', 1),
(20, 'Áo sơ mi', 700, 'app/img/cms.jpg', 'Áo siêu xinh nhập khẩu từ Hàn Quốc', 1),
(21, 'Quần Jean Nam', 400, 'app/img/t2.png', 'Quần được sản xuất từ Mỹ, hiện đang rất hót ', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int(11) NOT NULL,
  `ho_ten_nguoi_dung` varchar(255) DEFAULT NULL,
  `ten_dang_nhap` varchar(100) DEFAULT NULL,
  `mat_khau` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `sdt` int(11) DEFAULT NULL,
  `chuc_vu_id` int(11) DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `ho_ten_nguoi_dung`, `ten_dang_nhap`, `mat_khau`, `img`, `sdt`, `chuc_vu_id`) VALUES
(2, 'Quý Nguyễn Duy ', 'nguyenduyquy123   ', '123', 'app/img/anhtao.jpg', 379648268, 2),
(10, 'Hạnh Liên', 'admin        ', '1', 'app/img/z4692627381753_cab1d67f887f367931e617487945517a.jpg', 379648268, 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `baiviet`
--
ALTER TABLE `baiviet`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hoadonchitiet`
--
ALTER TABLE `hoadonchitiet`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `lienhe`
--
ALTER TABLE `lienhe`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `baiviet`
--
ALTER TABLE `baiviet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `hoadonchitiet`
--
ALTER TABLE `hoadonchitiet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `lienhe`
--
ALTER TABLE `lienhe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
