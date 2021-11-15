-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 15, 2021 lúc 06:13 AM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_xdpmtmhpl`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `position_id` int(11) DEFAULT NULL,
  `account_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id`, `position_id`, `account_name`, `password`, `status`) VALUES
(1, 2, 'admin', '$2y$04$RAgrqc5BiKDi6L8uxgmTROP8AYAaaADqCIXTOibIorTavU3VWrnMK', 1),
(2, 3, 'qlcuahang1', '$2y$04$/MMZA5/P5aadV8xTSEdsjOn7fmp1S/u1exCHlxW9a0bPGFwoPruaO', 0),
(3, 1, 'khachhang1', '$2y$04$/MMZA5/P5aadV8xTSEdsjOn7fmp1S/u1exCHlxW9a0bPGFwoPruaO', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `card`
--

CREATE TABLE `card` (
  `id` int(11) NOT NULL,
  `title_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `computerchips`
--

CREATE TABLE `computerchips` (
  `id` int(11) NOT NULL,
  `title_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `account_id` int(11) DEFAULT NULL,
  `membership_level_id` int(11) DEFAULT NULL,
  `surname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phonenumber` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `guarantee`
--

CREATE TABLE `guarantee` (
  `id` int(11) NOT NULL,
  `receipt_id` int(11) DEFAULT NULL,
  `start_day` date DEFAULT NULL,
  `end_day` date DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `membership_level`
--

CREATE TABLE `membership_level` (
  `id` int(11) NOT NULL,
  `title_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `endow` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `condition` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `oder`
--

CREATE TABLE `oder` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `total` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dates` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `oder_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permission`
--

CREATE TABLE `permission` (
  `id` int(11) NOT NULL,
  `title_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permission`
--

INSERT INTO `permission` (`id`, `title_name`, `status`) VALUES
(1, 'Thống kê báo cáo', 'fa fa-bar-chart-o'),
(2, 'Quản lý bình luận', 'fa fa-inbox'),
(3, 'Quản lý đặt hàng', 'fa fa-cart-plus'),
(4, 'Quản lý hóa đơn', 'fa fa-th-list'),
(5, 'Quản lý nhân viên', 'fa fa-user'),
(6, 'Quản lý thành viên', 'fa fa-users'),
(7, 'Quản lý sản phẩm', 'fa fa-shopping-basket'),
(8, 'Quản lý nhà cung cấp', 'fa fa-truck'),
(9, 'Quản lý danh mục sản phẩm', 'fa fa-list'),
(10, 'Quản lý bảo hành', 'fa fa-wrench'),
(11, 'Quản lý Khuyến mãi', 'fa fa-cubes'),
(12, 'Quản lý tài khoản', 'fa fa-th-list'),
(13, 'Quản lý phân quyền', 'fa fa-th-list');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `position`
--

CREATE TABLE `position` (
  `id` int(11) NOT NULL,
  `title_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `position`
--

INSERT INTO `position` (`id`, `title_name`, `status`) VALUES
(1, 'KHÁCH HÀNG', 1),
(2, 'ADMIN', 1),
(3, 'QUẢN LÝ', 1),
(4, 'FULL QUYỀN', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `position_permission`
--

CREATE TABLE `position_permission` (
  `permission_id` int(11) DEFAULT NULL,
  `position_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `position_permission`
--

INSERT INTO `position_permission` (`permission_id`, `position_id`) VALUES
(12, 2),
(13, 2),
(1, 3),
(2, 3),
(3, 3),
(4, 3),
(5, 3),
(6, 3),
(7, 3),
(8, 3),
(9, 3),
(10, 3),
(11, 3),
(1, 4),
(2, 4),
(3, 4),
(4, 4),
(5, 4),
(6, 4),
(7, 4),
(8, 4),
(9, 4),
(10, 4),
(11, 4),
(12, 4),
(13, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `producer`
--

CREATE TABLE `producer` (
  `id` int(11) NOT NULL,
  `title_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phonenumber` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `screen_id` int(11) DEFAULT NULL,
  `ram_id` int(11) DEFAULT NULL,
  `card_id` int(11) DEFAULT NULL,
  `computerchips` int(11) DEFAULT NULL,
  `producer_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `importprice` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `saleprice` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dates` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ram`
--

CREATE TABLE `ram` (
  `id` int(11) NOT NULL,
  `title_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `receipt`
--

CREATE TABLE `receipt` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `total` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dates` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `receipt_details`
--

CREATE TABLE `receipt_details` (
  `receipt_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `screen`
--

CREATE TABLE `screen` (
  `id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `size` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `account_id` int(11) DEFAULT NULL,
  `surname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateofbirth` date DEFAULT NULL,
  `phonenumber` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `staff`
--

INSERT INTO `staff` (`id`, `account_id`, `surname`, `firstname`, `dateofbirth`, `phonenumber`, `address`, `email`, `status`) VALUES
(1, 1, 'ADMIN', NULL, NULL, NULL, NULL, NULL, 1),
(2, 2, 'Nguyễn Phong', 'Phú', '2000-02-18', '0367945523', '30/10 Lê Văn Quới', 'phongphunguyen7575@gmail.com', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD KEY `position_id` (`position_id`);

--
-- Chỉ mục cho bảng `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `computerchips`
--
ALTER TABLE `computerchips`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_id` (`account_id`),
  ADD KEY `membership_level_id` (`membership_level_id`);

--
-- Chỉ mục cho bảng `guarantee`
--
ALTER TABLE `guarantee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `receipt_id` (`receipt_id`);

--
-- Chỉ mục cho bảng `membership_level`
--
ALTER TABLE `membership_level`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `oder`
--
ALTER TABLE `oder`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD KEY `oder_id` (`oder_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `position_permission`
--
ALTER TABLE `position_permission`
  ADD KEY `permission_id` (`permission_id`),
  ADD KEY `position_id` (`position_id`);

--
-- Chỉ mục cho bảng `producer`
--
ALTER TABLE `producer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `screen_id` (`screen_id`),
  ADD KEY `ram_id` (`ram_id`),
  ADD KEY `card_id` (`card_id`),
  ADD KEY `computerchips` (`computerchips`),
  ADD KEY `producer_id` (`producer_id`);

--
-- Chỉ mục cho bảng `ram`
--
ALTER TABLE `ram`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Chỉ mục cho bảng `receipt_details`
--
ALTER TABLE `receipt_details`
  ADD KEY `receipt_id` (`receipt_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `screen`
--
ALTER TABLE `screen`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_id` (`account_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `position`
--
ALTER TABLE `position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`position_id`) REFERENCES `position` (`id`);

--
-- Các ràng buộc cho bảng `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`),
  ADD CONSTRAINT `customer_ibfk_2` FOREIGN KEY (`membership_level_id`) REFERENCES `membership_level` (`id`);

--
-- Các ràng buộc cho bảng `guarantee`
--
ALTER TABLE `guarantee`
  ADD CONSTRAINT `guarantee_ibfk_1` FOREIGN KEY (`receipt_id`) REFERENCES `receipt` (`id`);

--
-- Các ràng buộc cho bảng `oder`
--
ALTER TABLE `oder`
  ADD CONSTRAINT `oder_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`oder_id`) REFERENCES `oder` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `position_permission`
--
ALTER TABLE `position_permission`
  ADD CONSTRAINT `position_permission_ibfk_1` FOREIGN KEY (`permission_id`) REFERENCES `permission` (`id`),
  ADD CONSTRAINT `position_permission_ibfk_2` FOREIGN KEY (`position_id`) REFERENCES `position` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`screen_id`) REFERENCES `screen` (`id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`ram_id`) REFERENCES `ram` (`id`),
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`card_id`) REFERENCES `card` (`id`),
  ADD CONSTRAINT `product_ibfk_4` FOREIGN KEY (`computerchips`) REFERENCES `computerchips` (`id`),
  ADD CONSTRAINT `product_ibfk_5` FOREIGN KEY (`producer_id`) REFERENCES `producer` (`id`);

--
-- Các ràng buộc cho bảng `receipt`
--
ALTER TABLE `receipt`
  ADD CONSTRAINT `receipt_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `receipt_ibfk_2` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`);

--
-- Các ràng buộc cho bảng `receipt_details`
--
ALTER TABLE `receipt_details`
  ADD CONSTRAINT `receipt_details_ibfk_1` FOREIGN KEY (`receipt_id`) REFERENCES `receipt` (`id`),
  ADD CONSTRAINT `receipt_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
