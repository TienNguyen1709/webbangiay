-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 19, 2021 lúc 02:26 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `datn`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(23, '2014_10_12_000000_create_users_table', 1),
(24, '2014_10_12_100000_create_password_resets_table', 1),
(25, '2019_08_19_000000_create_failed_jobs_table', 1),
(26, '2021_05_02_050437_create_tbl_admin', 1),
(27, '2021_05_09_064511_create_tbl_category', 1),
(28, '2021_05_11_060243_create_tbl_product', 1),
(29, '2021_06_14_155101_create_posts_table', 1),
(30, '2021_06_16_142610_create_tbl_shipping', 1),
(34, '2021_06_19_082015_create_tbl_payment', 2),
(35, '2021_06_19_082140_create_tbl_order', 2),
(36, '2021_06_19_082315_create_tbl_order_details', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `admin_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_email`, `admin_password`, `admin_name`, `admin_phone`, `created_at`, `updated_at`) VALUES
(1, 'minhtien', 'e10adc3949ba59abbe56e057f20f883e', 'Tien', '0123456789', NULL, NULL),
(2, 'tienminh', 'e10adc3949ba59abbe56e057f20f883e', 'Minh', '0987654321', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`, `category_desc`, `category_status`, `created_at`, `updated_at`) VALUES
(1, 'Giày nam', 'Giày nam', 1, NULL, NULL),
(2, 'Giày nữ', 'Giày nữ', 1, NULL, NULL),
(5, 'Giày trẻ em', 'dành cho trẻ em', 1, NULL, NULL),
(6, 'Giày thể thao', 'tập thể thao', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_coupon`
--

CREATE TABLE `tbl_coupon` (
  `coupon_id` int(11) NOT NULL,
  `coupon_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_time` int(50) NOT NULL,
  `coupon_number` int(11) NOT NULL,
  `coupon_condition` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_coupon`
--

INSERT INTO `tbl_coupon` (`coupon_id`, `coupon_name`, `coupon_code`, `coupon_time`, `coupon_number`, `coupon_condition`) VALUES
(2, 'Giảm giá COVID', 'ANTICOVID', 5, 10000, 2),
(3, 'Giảm giá EURO', 'EURO2020', 5, 10, 1),
(4, 'DMCOVID', 'DMCOVID', 99, 25000, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `order_status` int(20) NOT NULL,
  `order_code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_date` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_cancel` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `id`, `shipping_id`, `order_status`, `order_code`, `order_date`, `order_cancel`, `created_at`, `updated_at`) VALUES
(132, 3, 112, 3, '5768f', '2021-11-13', 'asdasd', '2021-11-13 06:08:22', NULL),
(133, 3, 113, 2, '14af6', '2021-11-12', '', '2021-11-13 06:09:28', NULL),
(134, 3, 114, 3, '2151d', '2021-11-13', NULL, '2021-11-13 08:17:42', NULL),
(135, 3, 115, 2, '8ff92', '2021-11-13', NULL, '2021-11-13 10:09:16', NULL),
(136, 3, 116, 3, '2edd7', '2021-11-14', 'ád', '2021-11-14 07:10:51', NULL),
(137, 3, 117, 3, '79d3c', '2021-11-14', NULL, '2021-11-14 07:12:06', NULL),
(138, 3, 118, 3, 'a40c4', '2021-11-14', 'cv', '2021-11-14 07:16:23', NULL),
(139, 3, 119, 1, '5cb7c', '2021-11-14', NULL, '2021-11-14 07:23:03', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order_details`
--

CREATE TABLE `tbl_order_details` (
  `order_details_id` bigint(20) UNSIGNED NOT NULL,
  `order_code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_sales_quantity` int(11) NOT NULL,
  `product_coupon` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_order_details`
--

INSERT INTO `tbl_order_details` (`order_details_id`, `order_code`, `product_id`, `product_name`, `product_price`, `product_sales_quantity`, `product_coupon`, `created_at`, `updated_at`) VALUES
(80, '59025', 8, 'Giày 6', '3000000', 1, 'EURO2020', NULL, NULL),
(81, '59025', 7, 'Giày 5', '5000000', 1, 'EURO2020', NULL, NULL),
(82, '8baf2', 6, 'Giày 4', '4000000', 1, 'ANTICOVID', NULL, NULL),
(83, 'ace88', 1, 'Giày 2', '2000000', 1, 'Ko', NULL, NULL),
(84, 'ace88', 4, 'GIày 1', '1000000', 1, 'Ko', NULL, NULL),
(85, '99277', 8, 'Giày 6', '3000000', 2, 'Ko', NULL, NULL),
(86, '16749', 6, 'Giày 4', '4000000', 1, 'Ko', NULL, NULL),
(87, '28f7a', 1, 'Giày 2', '2000000', 1, 'Ko', NULL, NULL),
(88, '3722f', 7, 'Giày 5', '5000000', 1, 'Ko', NULL, NULL),
(89, '3daeb', 1, 'Giày 2', '2000000', 1, 'Ko', NULL, NULL),
(91, 'd3d8c', 1, 'Giày Converse Chuck Taylor All Star 1970s Enamel Pink - Hi', '5000000', 1, 'Ko', NULL, NULL),
(92, 'efce6', 1, 'Giày Converse Chuck Taylor All Star 1970s Enamel Pink - Hi', '5000000', 2, 'Ko', NULL, NULL),
(93, '851ca', 6, 'Giày 4', '4000000', 1, 'Ko', NULL, NULL),
(94, '851ca', 1, 'Giày Converse Chuck Taylor All Star 1970s Enamel Pink - Hi', '5000000', 1, 'Ko', NULL, NULL),
(98, 'd8b14', 7, 'Giày 5', '5000000', 1, 'Ko', NULL, NULL),
(99, 'f72fe', 1, 'Giày Converse Chuck Taylor All Star 1970s Enamel Pink - Hi', '5000000', 1, 'Ko', NULL, NULL),
(100, '99692', 2, 'Giafy nữ', '5000000', 1, 'Ko', NULL, NULL),
(101, 'bac6f', 15, 'Gioafy', '5000000', 3, 'Ko', NULL, NULL),
(102, 'd5f95', 1, 'Giày Converse Chuck Taylor All Star 1970s Enamel Pink - Hi', '5000000', 1, 'Ko', NULL, NULL),
(103, 'f91ad', 2, 'Giafy nữ', '5000000', 1, 'Ko', NULL, NULL),
(104, 'f91ad', 1, 'Giày Converse Chuck Taylor All Star 1970s Enamel Pink - Hi', '5000000', 1, 'Ko', NULL, NULL),
(105, '3d3b6', 7, 'Giày 5', '5000000', 1, 'Ko', NULL, NULL),
(106, 'ddfc9', 7, 'Giày 5', '5000000', 1, 'Ko', NULL, NULL),
(107, '2d312', 1, 'Giày Converse Chuck Taylor All Star 1970s Enamel Pink - Hi', '5000000', 1, 'Ko', NULL, NULL),
(108, '38340', 1, 'Giày Converse Chuck Taylor All Star 1970s Enamel Pink - Hi', '5000000', 1, 'Ko', NULL, NULL),
(109, '1ce34', 7, 'Giày 5', '5000000', 1, 'Ko', NULL, NULL),
(110, '516e4', 1, 'Giày Converse Chuck Taylor All Star 1970s Enamel Pink - Hi', '5000000', 1, 'Ko', NULL, NULL),
(111, '91e56', 1, 'Giày Converse Chuck Taylor All Star 1970s Enamel Pink - Hi', '5000000', 1, 'Ko', NULL, NULL),
(112, '956cc', 2, 'Giafy nữ', '5000000', 1, 'Ko', NULL, NULL),
(113, 'dd77e', 1, 'Giày Converse Chuck Taylor All Star 1970s Enamel Pink - Hi', '5000000', 1, 'Ko', NULL, NULL),
(114, '9ac73', 2, 'Giafy nữ', '5000000', 1, 'Ko', NULL, NULL),
(115, '5fcfc', 1, 'Giày Converse Chuck Taylor All Star 1970s Enamel Pink - Hi', '5000000', 1, 'Ko', NULL, NULL),
(116, '4138a', 1, 'Giày Converse Chuck Taylor All Star 1970s Enamel Pink - Hi', '5000000', 10, 'Ko', NULL, NULL),
(117, 'dce14', 8, 'Giày', '2000000', 15, 'Ko', NULL, NULL),
(118, 'de31a', 1, 'Giày Converse Chuck Taylor All Star 1970s Enamel Pink - Hi', '5000000', 1, 'Ko', NULL, NULL),
(119, 'f409e', 15, 'Gioafy', '5000000', 1, 'Ko', NULL, NULL),
(120, '18464', 7, 'Giày 5', '5000000', 1, 'DMCOVID', NULL, NULL),
(121, 'd28ca', 2, 'Giafy nữ', '5000000', 1, 'Ko', NULL, NULL),
(122, '5768f', 1, 'Giày Converse Chuck Taylor All Star 1970s Enamel Pink - Hi', '5000000', 1, 'Ko', NULL, NULL),
(123, '14af6', 4, 'Giày 123', '5000000', 1, 'ANTICOVID', NULL, NULL),
(124, '2151d', 1, 'Giày Converse Chuck Taylor All Star 1970s Enamel Pink - Hi', '5000000', 1, 'Ko', NULL, NULL),
(125, '8ff92', 3, 'Giày', '6000000', 1, 'ANTICOVID', NULL, NULL),
(126, '2edd7', 3, 'Giày', '6000000', 1, 'ANTICOVID', NULL, NULL),
(127, '79d3c', 1, 'Giày Converse Chuck Taylor All Star 1970s Enamel Pink - Hi', '5000000', 1, 'Ko', NULL, NULL),
(128, 'a40c4', 1, 'Giày Converse Chuck Taylor All Star 1970s Enamel Pink - Hi', '5000000', 1, 'Ko', NULL, NULL),
(129, '5cb7c', 1, 'Giày Converse Chuck Taylor All Star 1970s Enamel Pink - Hi', '5000000', 1, 'Ko', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `payment_id` bigint(20) UNSIGNED NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_quantity` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_sold` int(11) DEFAULT NULL,
  `product_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_cost` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `category_id`, `product_name`, `product_quantity`, `product_sold`, `product_desc`, `product_content`, `product_price`, `price_cost`, `product_image`, `product_status`, `created_at`, `updated_at`) VALUES
(1, 6, 'Giày Converse Chuck Taylor All Star 1970s Enamel Pink - Hi', '70', 31, 'Converse 1970s là 1 trong những dòng sản phẩm bán chạy nhất của Converse. \r\n\r\nEnamel Red là một trong những phối màu hot nhất của dòng Converse 1970s, rất đẹp và dễ phối đồ, đồng thời có 2 bản là cao cổ và thấp cổ,', 'Giày Converse Chuck Taylor All Star 1970s Enamel Pink - Hi', '5000000', '4500000', '170790Cstandard15.jpg', 1, NULL, NULL),
(2, 2, 'Giafy nữ', '86', 4, 'Converse 1970s là 1 trong những dòng sản phẩm bán chạy nhất của Converse. Enamel Red là một trong những phối màu hot nhất của dòng Converse 1970s, rất đẹp và dễ phối đồ, đồng thời có 2 bản là cao cổ và thấp cổ,', 'Giày nữ', '5000000', '4500000', 'itam78.jpg', 1, NULL, NULL),
(3, 2, 'Giày', '89', 1, 'Converse 1970s là 1 trong những dòng sản phẩm bán chạy nhất của Converse. Enamel Red là một trong những phối màu hot nhất của dòng Converse 1970s, rất đẹp và dễ phối đồ, đồng thời có 2 bản là cao cổ và thấp cổ,', 'ád', '6000000', '5500000', '535.jpg', 1, NULL, NULL),
(4, 6, 'Giày 123', '95', 4, 'Converse 1970s là 1 trong những dòng sản phẩm bán chạy nhất của Converse. Enamel Red là một trong những phối màu hot nhất của dòng Converse 1970s, rất đẹp và dễ phối đồ, đồng thời có 2 bản là cao cổ và thấp cổ,', 'Giày 123', '5000000', '4500000', '171243Cstandard19.jpg', 1, NULL, NULL),
(6, 1, 'Giày 4', '85', 5, 'Converse 1970s là 1 trong những dòng sản phẩm bán chạy nhất của Converse. Enamel Red là một trong những phối màu hot nhất của dòng Converse 1970s, rất đẹp và dễ phối đồ, đồng thời có 2 bản là cao cổ và thấp cổ,', 'Giày nam', '4000000', '3500000', '171242Cstandard66.jpg', 1, NULL, NULL),
(7, 1, 'Giày 5', '88', 2, 'Converse 1970s là 1 trong những dòng sản phẩm bán chạy nhất của Converse. Enamel Red là một trong những phối màu hot nhất của dòng Converse 1970s, rất đẹp và dễ phối đồ, đồng thời có 2 bản là cao cổ và thấp cổ,', 'Giày nam', '5000000', '4500000', '171859Cstandard21.jpg', 1, NULL, NULL),
(8, 6, 'Giày', '69', 50, 'Converse 1970s là 1 trong những dòng sản phẩm bán chạy nhất của Converse. Enamel Red là một trong những phối màu hot nhất của dòng Converse 1970s, rất đẹp và dễ phối đồ, đồng thời có 2 bản là cao cổ và thấp cổ,', 'Giày', '2000000', '1500000', '171860Cstandard97.jpg', 0, NULL, NULL),
(15, 1, 'Gioafy', '93', 6, 'Converse 1970s là 1 trong những dòng sản phẩm bán chạy nhất của Converse. Enamel Red là một trong những phối màu hot nhất của dòng Converse 1970s, rất đẹp và dễ phối đồ, đồng thời có 2 bản là cao cổ và thấp cổ,', 'dsffdsdfs', '5000000', '4500000', '170867Cstandard13.jpg', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_shipping`
--

CREATE TABLE `tbl_shipping` (
  `shipping_id` int(10) UNSIGNED NOT NULL,
  `shipping_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_method` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_shipping`
--

INSERT INTO `tbl_shipping` (`shipping_id`, `shipping_name`, `shipping_address`, `shipping_phone`, `shipping_email`, `shipping_notes`, `shipping_method`, `created_at`, `updated_at`) VALUES
(59, '2', '3', '4', '1', '5', 0, NULL, NULL),
(60, '2', '3', '4', '1', '5', 0, NULL, NULL),
(61, '2', '3', '4', '1', '5', 0, NULL, NULL),
(62, 'Minh Tien', 'Ha Noi', '0123456789', 'minhtien@gmail.com', 'Giao nhanh', 0, NULL, NULL),
(63, 'Tien Minh', 'Ha Noi', '0123456789', 'tienminh@gmail.com', 'Giao nhanh', 0, NULL, NULL),
(64, 'test', 'test', 'test', 'test', 'test', 0, NULL, NULL),
(65, '321', '123', '321', '123', '12345678', 0, NULL, NULL),
(66, '987', '789', '78989', '789', '987567', 0, NULL, NULL),
(67, '741', '147', '741', '147', '174', 0, NULL, NULL),
(68, '987', '789', '987', '789', '97878', 0, NULL, NULL),
(69, 'bnm', 'nmbbnm', 'bnm', 'bnmbnm', 'bnmbnm', 0, NULL, NULL),
(70, 'niet', 'tien', 'niet', 'TIen', 'neit', 0, NULL, NULL),
(71, 'sad', 'sad', 'asd', 'asd', 'asd', 0, NULL, NULL),
(72, 'm,.', 'm,.', ',m.', 'm,.', ',m.', 0, NULL, NULL),
(73, 'fgh', 'fghgfh', 'fgh', 'fghj', 'fgh', 0, NULL, NULL),
(74, 'jkhjhk', 'jkh', 'kjhkj', 'jkhhjk', 'hjkh', 0, NULL, NULL),
(75, 'sdf', 'dsf', 'sfd', 'dfs', 'dfs', 0, NULL, NULL),
(76, '7678', '768678', '768876', '908980908', '678678', 0, NULL, NULL),
(77, 'asd', 'asd', 'asd', 'asd', 'asd', 0, NULL, NULL),
(78, '567756', '576', '75567', '567657', '567', 0, NULL, NULL),
(79, '657', '6756', '56567', '567657', '567567', 0, NULL, NULL),
(80, 'AS', 'asd', 'asd', 'SAD', NULL, 0, NULL, NULL),
(81, '12', '1212', '1', '12', '2', 0, NULL, NULL),
(82, 'asdasd', 'asd', 'asdasd', 'asd', 'sad', 0, NULL, NULL),
(83, 'Tien Khong Ngu', 'Ha NOi', '0123456789', 'minhtien17092000@gmail.com', 'ship luon anh zai oi', 0, NULL, NULL),
(84, 'Tien Khong Ngu', 'Ha noi', '0123456789', 'minhtien17092000@gmail.com', 'Ship luon anh zai oi', 0, NULL, NULL),
(85, 'Tien Khong Ngu', 'Ha Noi', '0123456789', 'minhtien17092000@gmail.com', 'Ship nhanh', 0, NULL, NULL),
(86, 'asd', 'asd', 'sad', 'asd', 'asd', 0, NULL, NULL),
(87, 'sd', 'sd', 'sd', 'sd', 'sd', 0, NULL, NULL),
(88, 'asd', 'asd', 'sad', 'asd', 'asd', 0, NULL, NULL),
(89, 'oip', 'opiiop', 'iop', 'oip', 'iop', 0, NULL, NULL),
(90, 'bhu', 'gyv', '908', 'yutu', 'bg', 0, NULL, NULL),
(91, 'dfg', 'dfg', 'dfg', 'dfg', 'dfg', 0, NULL, NULL),
(92, 'dfg', 'fgd', 'dfgdfg', 'dfg', 'fgd', 0, NULL, NULL),
(93, 'gfh', 'gfh', 'ghf', 'fgh', 'ghf', 0, NULL, NULL),
(94, 'dfg', 'gfddfg', 'fdg', 'fdg', 'dfg', 0, NULL, NULL),
(95, 'fdg', 'fdg', 'dfgdfg', 'dfg', 'fdg', 0, NULL, NULL),
(96, 'gfhfg', 'h', 'ghf', 'gfh', 'ghf', 0, NULL, NULL),
(97, 'fgh', 'fgh', 'gfh', 'fhfg', 'fgh', 0, NULL, NULL),
(98, 'dfg', 'fgd', 'dfg', 'dfg', 'fdg', 0, NULL, NULL),
(99, 'vcb', 'cvb', 'vbc', 'cvb', 'vcb', 0, NULL, NULL),
(100, 'dfg', 'dfg', 'dfgdfg', 'dfg', 'fdg', 0, NULL, NULL),
(101, 'dfg', 'dfg', 'dfgdfg', 'dfg', 'fdg', 0, NULL, NULL),
(102, 'dfg', 'dfg', 'dfgdfg', 'dfg', 'fdg', 0, NULL, NULL),
(103, 'dfg', 'dfg', 'dfgdfg', 'dfg', 'fdg', 0, NULL, NULL),
(104, 'fdg', 'fdg', 'dfg', 'fdg', 'fdg', 0, NULL, NULL),
(105, 'ert', 'ret', 'ret', 'ert', 'ert', 0, NULL, NULL),
(106, '321', '123', '321', '123', '123', 0, NULL, NULL),
(107, 'fgh', 'fgh', 'gfh', 'gfh', 'fgh', 0, NULL, NULL),
(108, 'ghj', 'ghj', 'ghj', 'ghj', 'hgj', 0, NULL, NULL),
(109, '123', '123', '123', '123', '123', 0, NULL, NULL),
(110, 'ghj', 'ghj', 'ghj', 'ytu', 'ghj', 0, NULL, NULL),
(111, 'fg', 'vbn', 'fgh', 'fgh', 'ert', 0, NULL, NULL),
(112, 'Nguyen Minh Tien', 'Ha Noi', '0123456789', 'minhtien17092000@gmail.com', 'ship nhanh', 0, NULL, NULL),
(113, 'Tien Minh Nguyen', 'Ha Noi', '0987654321', 'tienminh17092000@gmail.com', NULL, 0, NULL, NULL),
(114, '789', '789', '789789', '789', '879789', 0, NULL, NULL),
(115, '234324', '423234', '234', '234234', '423234', 0, NULL, NULL),
(116, 'Nguyễn Minh Tiến', 'Hà Nội', '0123456789', 'minhtien17092000@gmail.com', 'ship nhanh', 0, NULL, NULL),
(117, 'Nguyễn Minh Tiến', 'Hà Nội', '0123456789', 'minhtien17092000@gmail.com', 'ship nhanh', 0, NULL, NULL),
(118, 'Nguyễn Minh Tiến', 'Hà Nội', '0123456789', 'minhtien17092000@gmail.com', 'ship nhanh', 0, NULL, NULL),
(119, 'Nguyễn Minh Tiến', 'Hà Nội', '0123456789', 'minhtien17092000@gmail.com', 'ship nhanh', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `slider_id` int(11) NOT NULL,
  `slider_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_status` int(11) NOT NULL,
  `slider_image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_desc` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_slider`
--

INSERT INTO `tbl_slider` (`slider_id`, `slider_name`, `slider_status`, `slider_image`, `slider_desc`) VALUES
(2, 'slide1', 1, 'slide 150.jpg', 'slide1'),
(3, 'slide2', 1, 'slide 280.jpg', 'slide2'),
(4, 'slide3', 1, 'slide 439.jpg', 'slide3'),
(5, 'slide4', 1, 'slide 549.png', 'slide4');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_statistical`
--

CREATE TABLE `tbl_statistical` (
  `id_statistical` int(11) NOT NULL,
  `order_date` varchar(100) NOT NULL,
  `sales` varchar(200) NOT NULL,
  `profit` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_statistical`
--

INSERT INTO `tbl_statistical` (`id_statistical`, `order_date`, `sales`, `profit`, `quantity`, `total_order`) VALUES
(81, '2021-11-12', '10000000', '1000000', 2, 2),
(82, '2021-11-13', '11000000', '1000000', 2, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `created_at`, `updated_at`) VALUES
(3, 'Minh Tien', 'minhtien@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0987564321', NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `tbl_coupon`
--
ALTER TABLE `tbl_coupon`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD PRIMARY KEY (`order_details_id`);

--
-- Chỉ mục cho bảng `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Chỉ mục cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Chỉ mục cho bảng `tbl_statistical`
--
ALTER TABLE `tbl_statistical`
  ADD PRIMARY KEY (`id_statistical`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tbl_coupon`
--
ALTER TABLE `tbl_coupon`
  MODIFY `coupon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT cho bảng `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  MODIFY `order_details_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT cho bảng `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `payment_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  MODIFY `shipping_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tbl_statistical`
--
ALTER TABLE `tbl_statistical`
  MODIFY `id_statistical` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
