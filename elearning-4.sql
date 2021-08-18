-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 20, 2020 lúc 10:04 AM
-- Phiên bản máy phục vụ: 10.1.40-MariaDB
-- Phiên bản PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `elearning`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `batch_exercises`
--

CREATE TABLE `batch_exercises` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `content` text COLLATE utf8_vietnamese_ci NOT NULL,
  `number_topic` int(11) NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deadline` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `end_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `file_id` bigint(20) DEFAULT NULL,
  `classroom_id` int(11) NOT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` bigint(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_by` bigint(20) DEFAULT NULL,
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `batch_exercises`
--

INSERT INTO `batch_exercises` (`id`, `name`, `content`, `number_topic`, `start_date`, `deadline`, `end_date`, `status`, `type`, `file_id`, `classroom_id`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES
(1, 'btk', '', 1, '2020-10-20 05:35:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 1, NULL, '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00'),
(3, 'test1', '', 1, '2020-10-20 07:02:09', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 2, 1, NULL, '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00'),
(5, 't', '', 1, '2020-10-20 07:14:29', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 2, 1, NULL, '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00'),
(7, 'test3', '', 1, '2020-10-20 07:44:57', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 5, 2, NULL, '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `classroom_units`
--

CREATE TABLE `classroom_units` (
  `id` bigint(20) NOT NULL,
  `unit_name` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `learn_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `classrooom_id` bigint(20) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `class_rooms`
--

CREATE TABLE `class_rooms` (
  `id` bigint(20) NOT NULL,
  `class_name` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `number_student` int(11) DEFAULT NULL,
  `number_week` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` bigint(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_by` bigint(20) DEFAULT NULL,
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `class_rooms`
--

INSERT INTO `class_rooms` (`id`, `class_name`, `number_student`, `number_week`, `start_date`, `end_date`, `user_id`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES
(1, 'PTTKHT', 100, 0, '2020-10-01', '2020-10-30', 9, NULL, 9, '2020-10-19 19:49:27', NULL, '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00'),
(2, 'TTCSCN', 100, 0, '2020-09-01', '2020-10-31', 2, NULL, 2, '2020-10-20 02:40:22', NULL, '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `files`
--

CREATE TABLE `files` (
  `id` bigint(20) NOT NULL,
  `file_name` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `file_url` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `size` bigint(20) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `upload_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `files`
--

INSERT INTO `files` (`id`, `file_name`, `file_url`, `size`, `type`, `upload_time`) VALUES
(0, 'nam.docx', 'uploads/nam.docx', 13731, 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '2020-10-19 19:21:34'),
(2, 'JavaTungAnh.docx', 'uploads/JavaTungAnh.docx', 14898, 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '2020-10-20 02:44:29'),
(4, 'classroom_units.php', 'uploads/classroom_units.php', 4257, 'application/octet-stream', '2020-10-20 03:20:36'),
(5, 'elearning (3).sql', 'uploads/elearning (3).sql', 15267, 'application/octet-stream', '2020-10-20 05:17:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `students`
--

CREATE TABLE `students` (
  `id` bigint(20) NOT NULL,
  `code` varchar(25) COLLATE utf8_vietnamese_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `birthday` date NOT NULL,
  `gender` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_vietnamese_ci NOT NULL,
  `image_url` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` bigint(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_by` bigint(20) DEFAULT NULL,
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `students`
--

INSERT INTO `students` (`id`, `code`, `password`, `name`, `birthday`, `gender`, `address`, `email`, `phone`, `image_url`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES
(1, 'nta', '$2y$10$7Rx9KRyEw/hBB.RRdbnlNuDBKgS9bjzJi0iluhkrJLbQ0bJU6bwKK', 'Nguyễn Tùng Anh', '1993-11-22', 1, 'Hà Nội', 'anhh@gmail.com', '123456789', NULL, NULL, '2020-10-19 20:05:53', NULL, '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00'),
(2, 'htg', '$2y$10$2BkoZncGoHYWXlUFfRuS7eALbUvBvSNVV99FED0sePKaKRaRCLU6u', 'Hoàng Thị Giấy', '0000-00-00', 0, 'Yên Bái', 'giay@gmail.com', '987654321', NULL, NULL, '2020-10-20 07:58:05', NULL, '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `student_attendances`
--

CREATE TABLE `student_attendances` (
  `id` bigint(20) NOT NULL,
  `classroom_unit_id` bigint(20) NOT NULL,
  `student_code` varchar(25) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `time_attendance` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `student_classrooms`
--

CREATE TABLE `student_classrooms` (
  `id` bigint(20) NOT NULL,
  `classroom_id` varchar(25) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `student_code` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` bigint(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_by` bigint(20) DEFAULT NULL,
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `student_classrooms`
--

INSERT INTO `student_classrooms` (`id`, `classroom_id`, `student_code`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES
(1, '1', '1', 'Studying', 2, '2020-10-20 02:39:51', NULL, '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00'),
(2, '2', '2', '1', 2, '2020-10-20 07:58:22', NULL, '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `student_exercises_submissions`
--

CREATE TABLE `student_exercises_submissions` (
  `id` bigint(20) NOT NULL,
  `student_code` varchar(25) COLLATE utf8_vietnamese_ci NOT NULL,
  `content` text COLLATE utf8_vietnamese_ci NOT NULL,
  `score` decimal(11,2) DEFAULT NULL,
  `mark_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `mark_user` bigint(20) DEFAULT NULL,
  `time_submission` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `file_id` bigint(20) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `batch_exercise_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `student_register_topics`
--

CREATE TABLE `student_register_topics` (
  `id` bigint(20) NOT NULL,
  `topic_exercises_id` bigint(20) NOT NULL,
  `student_code` varchar(25) COLLATE utf8_vietnamese_ci NOT NULL,
  `enroll_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `topic_exercises`
--

CREATE TABLE `topic_exercises` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `description` text COLLATE utf8_vietnamese_ci,
  `file_id` bigint(20) NOT NULL,
  `batch_exercise_id` int(11) NOT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` bigint(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_by` bigint(20) DEFAULT NULL,
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_`
--

CREATE TABLE `user_` (
  `id` bigint(20) NOT NULL,
  `login` varchar(20) COLLATE utf8_vietnamese_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `password_hash` varchar(60) COLLATE utf8_vietnamese_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `image_url` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `type` bit(1) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` bigint(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_by` bigint(20) DEFAULT NULL,
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `user_`
--

INSERT INTO `user_` (`id`, `login`, `email`, `password_hash`, `name`, `image_url`, `phone`, `type`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES
(2, 'nta2', 'anhh@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'Nguyễn Tùng Anh', NULL, '987654321', NULL, 1, '2020-10-20 02:35:03', NULL, '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00'),
(3, 'nta3', 'nta@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'Nguyễn Tùng Anh', NULL, '999777666', NULL, 2, '2020-10-20 03:19:25', NULL, '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `batch_exercises`
--
ALTER TABLE `batch_exercises`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `classroom_units`
--
ALTER TABLE `classroom_units`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `class_rooms`
--
ALTER TABLE `class_rooms`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `student_attendances`
--
ALTER TABLE `student_attendances`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `student_classrooms`
--
ALTER TABLE `student_classrooms`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `student_exercises_submissions`
--
ALTER TABLE `student_exercises_submissions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `student_register_topics`
--
ALTER TABLE `student_register_topics`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `topic_exercises`
--
ALTER TABLE `topic_exercises`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user_`
--
ALTER TABLE `user_`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `batch_exercises`
--
ALTER TABLE `batch_exercises`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `classroom_units`
--
ALTER TABLE `classroom_units`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `class_rooms`
--
ALTER TABLE `class_rooms`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `files`
--
ALTER TABLE `files`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `student_attendances`
--
ALTER TABLE `student_attendances`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `student_classrooms`
--
ALTER TABLE `student_classrooms`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `student_exercises_submissions`
--
ALTER TABLE `student_exercises_submissions`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `student_register_topics`
--
ALTER TABLE `student_register_topics`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `topic_exercises`
--
ALTER TABLE `topic_exercises`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `user_`
--
ALTER TABLE `user_`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
