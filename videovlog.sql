-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2024 at 04:31 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `videovlog`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`) VALUES
(3, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `c_status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `video_id`, `location`, `user_id`, `username`, `picture`, `comment`, `c_status`) VALUES
(72, 106, '', 0, 'riken', '', 'lovely view of pokhara', '1'),
(73, 112, '', 0, 'riken', '', 'nice view', '1'),
(74, 115, '', 0, 'riken', '', 'nice', '1'),
(81, 115, '', 0, 'riken', '', 'hi', '1'),
(82, 112, '', 0, 'riken', '', 'hi', '1'),
(83, 115, '', 0, 'riken', '', 'heee', '1');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `like_id` int(11) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `video_id` int(11) NOT NULL,
  `like_status` enum('like','unlike') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`like_id`, `UserName`, `video_id`, `like_status`) VALUES
(46, 'rojen', 115, 'like'),
(54, 'riken', 112, 'like'),
(55, 'riken', 112, 'like'),
(56, 'riken', 112, 'like'),
(60, 'riken', 115, 'like'),
(61, 'riken', 115, 'like'),
(62, 'riken', 115, 'like'),
(66, 'riken', 117, 'like'),
(67, 'riken', 117, 'like'),
(68, 'riken', 117, 'like');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `Number` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `profile_picture` varchar(255) NOT NULL,
  `num_likes` int(11) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `UserName`, `fullName`, `Number`, `Email`, `Address`, `Gender`, `profile_picture`, `num_likes`, `password`) VALUES
(61, 'riken', 'riken', '9841193010', 'rikenmaharjan4@gmail.com', 'pulchowk', '', 'Kendrick Lamar - DAMN_ (2017).jfif', 0, '37ecee98ba5775b657cf4014aaa251ffc50fcf7a'),
(62, 'ram', 'ram maharjan', '9841142530', 'ram@gmail.com', 'patan', '', 'Jujutsu Kaisen Sticker _ Jujutsu-kaisen.jfif', 0, '77c7960e890deddebb7ff2e55e340d2ed1708368'),
(64, 'w', 'w', '9841193010', 'w@gmail.com', 'w', '', 'Nike Stickers for Sale.jfif', 0, 'aff024fe4ab0fece4091de044c58c9ae4233383a'),
(65, 'rojen', 'rojen shakya', '9866447837', 'rojen@gmail.com', 'lagankhel', '', 'WIN_20240318_10_23_05_Pro.jpg', 0, '94f6c2741f5ff9c2bac6b012368c4ecb31c0d99e'),
(66, 'sss', 'ss', '9841193010', 'rikenarjan4@gmail.com', 'wsfafdhgashghgwagdh', '', 'sato tower.bmp', 0, 'bf9661defa3daecacfde5bde0214c4a439351d4d');

-- --------------------------------------------------------

--
-- Table structure for table `user_likes`
--

CREATE TABLE `user_likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `video_id` int(11) NOT NULL,
  `video_title` varchar(255) NOT NULL,
  `video_description` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `likes` int(11) DEFAULT 0,
  `unlikes` int(11) DEFAULT 0,
  `like_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`video_id`, `video_title`, `video_description`, `name`, `location`, `status`, `likes`, `unlikes`, `like_count`) VALUES
(112, 'mustang', 'mustang tour', '20231214_110343.mp4', '../videos/20231214_110343.mp4', '1', 2, 0, 0),
(115, 'Mustang', 'The beautiful view of the mustang', '20231213_152801.mp4', '../videos/20231213_152801.mp4', '1', 4, 0, 0),
(117, 'Pokhara', '	The view of Phewa Lake from Tal Barahi Temple, Pokhara. #pokhara #nepal', '', '../videos/video-7ab3ef2ea65af1b3bd84d7067605d1a8-V.mp4', '1', 6, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `video_likes`
--

CREATE TABLE `video_likes` (
  `like_id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `video_likes`
--

INSERT INTO `video_likes` (`like_id`, `video_id`) VALUES
(0, 117);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`like_id`),
  ADD KEY `video_id` (`video_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_likes`
--
ALTER TABLE `user_likes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`video_id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`video_id`);

--
-- Indexes for table `video_likes`
--
ALTER TABLE `video_likes`
  ADD PRIMARY KEY (`like_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `user_likes`
--
ALTER TABLE `user_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `video_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`video_id`) REFERENCES `videos` (`video_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
