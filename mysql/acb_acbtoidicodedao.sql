-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th10 29, 2022 lúc 03:58 AM
-- Phiên bản máy phục vụ: 10.3.37-MariaDB-0ubuntu0.20.04.1
-- Phiên bản PHP: 7.3.33-1+focal

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `acb_acbtoidicodedao`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `acb_tranfer`
--

CREATE TABLE `acb_tranfer` (
  `id` int(11) NOT NULL,
  `username` varchar(300) NOT NULL,
  `OD_REF_NO` varchar(200) NOT NULL,
  `data` text NOT NULL,
  `type` varchar(50) NOT NULL DEFAULT 'local',
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banks`
--

CREATE TABLE `banks` (
  `id` int(255) NOT NULL,
  `accountNumber` text NOT NULL,
  `shortName` varchar(500) NOT NULL DEFAULT 'VCB',
  `cardHolderName` varchar(500) NOT NULL DEFAULT 'Unknown',
  `username` text NOT NULL,
  `password` text NOT NULL,
  `cookies` text DEFAULT NULL,
  `lastLoginInfomation` text DEFAULT NULL,
  `loginStatus` int(11) NOT NULL DEFAULT 0,
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banks`
--

INSERT INTO `banks` (`id`, `accountNumber`, `shortName`, `cardHolderName`, `username`, `password`, `cookies`, `lastLoginInfomation`, `loginStatus`, `update_at`, `create_at`) VALUES
(1, '', 'ACB', 'Unknown', '0921476765', '', '{\"cookies\":[],\"currentUser\":{\"accessToken\":\"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE2Njk2MTU1NjIsIm5iZiI6MTY2OTYxNTU2MiwianRpIjoiYzdiODgwMjItNGU2NS00M2NhLTg1Y2YtM2I1NWNhZmIzMDM5IiwiZXhwIjoxNjY5NjE1ODYyLCJpZGVudGl0eSI6eyJzY2hlbWFzIjpbInVybjppZXRmOnBhcmFtczpzY2ltOnNjaGVtYXM6Y29yZToyLjA6VXNlciJdLCJpZCI6IjhkZDBjODUyLWNiMWYtNDFkYy05MGMzLWIyMDMxZTFiZGNhYiIsInVzZXJOYW1lIjoiMDkyMTQ3Njc2NSIsIm5hbWUiOnsiZ2l2ZW5OYW1lIjoiSE9BTkcgVkFOIiwiZmFtaWx5TmFtZSI6IlNPTiJ9LCJkaXNwbGF5TmFtZSI6IlNPTiBIT0FORyBWQU4iLCJlbWFpbHMiOm51bGwsImFjdGl2ZSI6dHJ1ZSwiZ3JvdXBzIjpbeyJ2YWx1ZSI6IjEiLCIkcmVmIjoiaHR0cHM6Ly9sb2NhbGhvc3Qvc2NpbS9Hcm91cHMvMSIsImRpc3BsYXkiOiJhY2JvIn1dLCJtZXRhIjp7InJlc291cmNlVHlwZSI6IlVzZXIiLCJjcmVhdGVkIjoiMjAyMS0xMS0yMVQwNTo1MzoxOC4zNzErMDA6MDAiLCJsYXN0TW9kaWZpZWQiOiIyMDIxLTExLTIxVDA1OjUzOjE4LjM3MSswMDowMCIsImxvY2F0aW9uIjoiaHR0cHM6Ly9sb2NhbGhvc3Qvc2NpbS9Vc2Vycy84ZGQwYzg1Mi1jYjFmLTQxZGMtOTBjMy1iMjAzMWUxYmRjYWIifSwibGFzdExvZ2luIjoiMjAyMi0xMS0yOFQwNjowNjowMi43MTM5MjgrMDA6MDAiLCJzdGF0dXMiOjAsImFkZHJlc3NlcyI6bnVsbCwicGhvdG9zIjpudWxsLCJwaG9uZU51bWJlcnMiOm51bGwsImV4dGVybmFsSWQiOiIxMDAxOTE0NCIsImNvcnBvcmF0ZSI6bnVsbCwicm9sZSI6bnVsbCwibGFzdENyZWRlbnRpY2FsIjoiMjAyMi0wOS0wNVQwNzo1MzozOC43NjU1NTErMDA6MDAiLCJpYXQiOiIyMDIyLTExLTI4VDA2OjA2OjAyLjc0MDQ4OSswMDowMCIsInBhc3N3b3JkRXhwaXJlSW4iOjI4MS4wNzQ3MjI2MjY4NjM0MywicGFzc3dvcmRFeHBpcmVBbGVydCI6ZmFsc2UsImlzcyI6Iml1U3VIWVZ1ZklVdU5JUkVWMEZCOUVvTG45a0hzRGJtIiwicGVyc19yb2xlIjpbIk5PUk1BTCJdfSwiZnJlc2giOmZhbHNlLCJ0eXBlIjoiYWNjZXNzIiwiaXNzIjoiaXVTdUhZVnVmSVV1TklSRVYwRkI5RW9MbjlrSHNEYm0ifQ.QjZ-MMzH2AgVaAl7RW8R_58hZ9cVMgqbN5V9i1cCYIE\",\"expiresIn\":300,\"identity\":{\"active\":true,\"addresses\":null,\"corporate\":null,\"displayName\":\"SON HOANG VAN\",\"emails\":null,\"externalId\":\"10019144\",\"groups\":[{\"$ref\":\"https://localhost/scim/Groups/1\",\"display\":\"acbo\",\"value\":\"1\"}],\"iat\":\"2022-11-28T06:06:02.740489+00:00\",\"id\":\"8dd0c852-cb1f-41dc-90c3-b2031e1bdcab\",\"iss\":\"iuSuHYVufIUuNIREV0FB9EoLn9kHsDbm\",\"lastCredentical\":\"2022-09-05T07:53:38.765551+00:00\",\"lastLogin\":\"2022-11-28T06:06:02.713928+00:00\",\"meta\":{\"created\":\"2021-11-21T05:53:18.371+00:00\",\"lastModified\":\"2021-11-21T05:53:18.371+00:00\",\"location\":\"https://localhost/scim/Users/8dd0c852-cb1f-41dc-90c3-b2031e1bdcab\",\"resourceType\":\"User\"},\"name\":{\"familyName\":\"SON\",\"givenName\":\"HOANG VAN\"},\"passwordExpireAlert\":false,\"passwordExpireIn\":281.07472262686343,\"pers_role\":[\"NORMAL\"],\"phoneNumbers\":null,\"photos\":null,\"role\":null,\"schemas\":[\"urn:ietf:params:scim:schemas:core:2.0:User\"],\"status\":0,\"userName\":\"0921476765\"},\"refreshToken\":\"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE2Njk2MTU1NjIsIm5iZiI6MTY2OTYxNTU2MiwianRpIjoiYTBiZDdmMmItNWRhMC00MDQ0LWE4YjMtZjc0ODNhZDBhYmRhIiwiZXhwIjoxNjcxNDI5OTYyLCJpZGVudGl0eSI6eyJzY2hlbWFzIjpbInVybjppZXRmOnBhcmFtczpzY2ltOnNjaGVtYXM6Y29yZToyLjA6VXNlciJdLCJpZCI6IjhkZDBjODUyLWNiMWYtNDFkYy05MGMzLWIyMDMxZTFiZGNhYiIsInVzZXJOYW1lIjoiMDkyMTQ3Njc2NSIsIm5hbWUiOnsiZ2l2ZW5OYW1lIjoiSE9BTkcgVkFOIiwiZmFtaWx5TmFtZSI6IlNPTiJ9LCJkaXNwbGF5TmFtZSI6IlNPTiBIT0FORyBWQU4iLCJlbWFpbHMiOm51bGwsImFjdGl2ZSI6dHJ1ZSwiZ3JvdXBzIjpbeyJ2YWx1ZSI6IjEiLCIkcmVmIjoiaHR0cHM6Ly9sb2NhbGhvc3Qvc2NpbS9Hcm91cHMvMSIsImRpc3BsYXkiOiJhY2JvIn1dLCJtZXRhIjp7InJlc291cmNlVHlwZSI6IlVzZXIiLCJjcmVhdGVkIjoiMjAyMS0xMS0yMVQwNTo1MzoxOC4zNzErMDA6MDAiLCJsYXN0TW9kaWZpZWQiOiIyMDIxLTExLTIxVDA1OjUzOjE4LjM3MSswMDowMCIsImxvY2F0aW9uIjoiaHR0cHM6Ly9sb2NhbGhvc3Qvc2NpbS9Vc2Vycy84ZGQwYzg1Mi1jYjFmLTQxZGMtOTBjMy1iMjAzMWUxYmRjYWIifSwibGFzdExvZ2luIjoiMjAyMi0xMS0yOFQwNjowNjowMi43MTM5MjgrMDA6MDAiLCJzdGF0dXMiOjAsImFkZHJlc3NlcyI6bnVsbCwicGhvdG9zIjpudWxsLCJwaG9uZU51bWJlcnMiOm51bGwsImV4dGVybmFsSWQiOiIxMDAxOTE0NCIsImNvcnBvcmF0ZSI6bnVsbCwicm9sZSI6bnVsbCwibGFzdENyZWRlbnRpY2FsIjoiMjAyMi0wOS0wNVQwNzo1MzozOC43NjU1NTErMDA6MDAiLCJpYXQiOiIyMDIyLTExLTI4VDA2OjA2OjAyLjc0MDQ4OSswMDowMCIsInBhc3N3b3JkRXhwaXJlSW4iOjI4MS4wNzQ3MjI2MjY4NjM0MywicGFzc3dvcmRFeHBpcmVBbGVydCI6ZmFsc2UsImlzcyI6Iml1U3VIWVZ1ZklVdU5JUkVWMEZCOUVvTG45a0hzRGJtIiwicGVyc19yb2xlIjpbIk5PUk1BTCJdfSwidHlwZSI6InJlZnJlc2giLCJpc3MiOiJpdVN1SFlWdWZJVXVOSVJFVjBGQjlFb0xuOWtIc0RibSJ9.Iqx0-wESjV5f6Hwu_vSS-6d9Z5TpsGpChcW1--udbuo\"}}', NULL, 0, '2022-11-28 06:06:03', '2022-10-25 06:47:10');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `acb_tranfer`
--
ALTER TABLE `acb_tranfer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `acb_tranfer`
--
ALTER TABLE `acb_tranfer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
