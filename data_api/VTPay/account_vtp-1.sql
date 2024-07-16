-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 13, 2022 lúc 10:56 AM
-- Phiên bản máy phục vụ: 10.4.20-MariaDB
-- Phiên bản PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `viettelpay`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account_vtp`
--

CREATE TABLE `account_vtp` (
  `id` int(11) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `password` varchar(6) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `accountId` varchar(200) DEFAULT NULL,
  `accNo` varchar(100) DEFAULT NULL,
  `balance` int(100) DEFAULT NULL,
  `imei` varchar(100) DEFAULT NULL,
  `authorization` varchar(2000) DEFAULT NULL,
  `session_id` text DEFAULT NULL,
  `client_private_key` varchar(5000) DEFAULT NULL,
  `viettel_public_key` varchar(4000) DEFAULT NULL,
  `token_notification` varchar(1000) DEFAULT NULL,
  `refreshToken` varchar(2000) DEFAULT NULL,
  `requestId` varchar(100) DEFAULT NULL,
  `DataSend` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '[]' CHECK (json_valid(`DataSend`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `account_vtp`
--

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account_vtp`
--
ALTER TABLE `account_vtp`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account_vtp`
--
ALTER TABLE `account_vtp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
