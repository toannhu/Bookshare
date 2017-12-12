-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2017 at 10:47 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pdf_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `author` varchar(50) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `view` int(11) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `url` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `genre`, `view`, `description`, `url`, `image`) VALUES
(1, 'Hat giong tam hon', 'Nguyen Khanh Cong', 'Truyen', 100, NULL, 'https://drive.google.com/file/d/1eH7a0loUKDM24d3DyHWYKlrDc9lAlNMr/preview', 'https://imgur.com/C797aUk.png'),
(2, 'Chua te nhung chiec nhan', 'Nhu Dinh Toan', 'Truyen', 200, NULL, 'https://drive.google.com/file/d/1B07i1IdUz_8dESmfB3JbyH2agqfYQw-d/preview', 'https://imgur.com/gfLUE65.png'),
(3, 'Chicken Soup', 'Nguyen Khanh Cong', 'Springer', 10, NULL, 'https://drive.google.com/file/d/1ajD9I-twx-0QDSV8VxLSxXQ-rP7jLpmY/preview', 'https://i.imgur.com/a9tcOV1.jpg'),
(4, 'Editor Handbook', 'Nhu Dinh Toan', 'Springer', 100, NULL, 'https://drive.google.com/file/d/1b2Zp-eYx3NGgUJGwLd5wslwNsVveBVLZ/preview', 'https://i.imgur.com/f8syneQ.png'),
(5, 'Cam nang tu hoc ielts', 'Nguyen Khanh Cong', 'Springer', 150, NULL, 'https://drive.google.com/file/d/1jurRBzB-E50prpl9ggXeU8JDSoCUfw5z/preview', 'https://i.imgur.com/o8ljlht.png'),
(6, 'Doan duong de nho', 'Nhu Dinh Toan', 'Truyen', 40, NULL, 'https://drive.google.com/file/d/1nRl4-1kSQds3QU4hf7Wi2-DNNk3piwlu/preview', 'https://i.imgur.com/1oGYEiu.pngs'),
(7, 'Harry Poter', 'Nguyen Pham Anh Nguyen', 'Truyen', 23, NULL, 'https://drive.google.com/file/d/11WR8V1fkqSYelDtju2UhR7q9ZqwZqAum/preview', 'https://i.imgur.com/dTfoBBF.png'),
(8, 'Dau pha thuong khung', 'Nguyen Khanh Cong', 'Truyen', 68, NULL, 'https://drive.google.com/file/d/15PIdZdNkUw45Iru4hZb2GrFHQr8ZD_eb/preview', 'https://i.imgur.com/dxce4bH.png'),
(9, 'JDBC', 'Nguyen Pham Anh Nguyen', 'Springer', 30, NULL, 'https://drive.google.com/file/d/1Lc6-IVuF_0WMIyQ5lMYXEGiKHGaW2G0c/preview', 'https://i.imgur.com/OhskWNc.png'),
(10, 'HTML can ban', 'Nguyen Pham Anh Nguyen', 'Springer', 10, 'HTML ', 'https://drive.google.com/file/d/1EVctJbyctScT3pE6mT6E9dJoja87BSor/preview', 'https://i.imgur.com/MLy3lIZ.png'),
(11, 'Alibaba va 40 ten cuop', 'Nguyen Pham Anh Nguyen', 'Co tich', 10, NULL, 'https://drive.google.com/file/d/12vMdAf1pZlCuP--HkIc5RKPjucfEq0ta/preview', 'https://i.imgur.com/SknToJc.png');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `idcomment` int(11) NOT NULL,
  `username` varchar(50) NOT NULL DEFAULT '',
  `idbook` int(11) NOT NULL,
  `content` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `commenttime` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`idcomment`, `username`, `idbook`, `content`, `commenttime`) VALUES
(5, 'Toan', 1, 'Truyen hay qua', '2017-12-03'),
(6, 'Nguyen', 2, 'Bai viet hay', '2017-12-02'),
(7, 'Cong', 1, 'Dich nhieu loi', '2017-12-01'),
(8, 'Thien', 2, ':((((((', '2017-12-09'),
(9, 'Long', 3, 'Bun ngu qua', '2017-12-10'),
(10, 'Tuan', 5, 'Dich nhieu loi', '2017-12-08'),
(11, 'Nguyen', 2, 'Bai viet hay', '2017-12-02'),
(12, 'Cong', 4, 'Dich nhieu loi', '2017-12-01'),
(13, 'Thien', 6, ':((((((', '2017-12-09'),
(14, 'Long', 8, 'Bun ngu qua', '2017-12-10'),
(15, 'Tuan', 12, 'Dich nhieu loi', '2017-12-08');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `name`) VALUES
(1, 'Springer'),
(2, 'Co tich'),
(3, 'Khoa hoc'),
(4, 'Van hoc'),
(5, 'Giao duc'),
(6, 'Novel'),
(7, 'Truyen'),
(8, 'Tap chi');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(250) NOT NULL DEFAULT '',
  `password` varchar(200) NOT NULL DEFAULT '',
  `fullname` varchar(50) NOT NULL DEFAULT '',
  `phone_number` varchar(15) NOT NULL DEFAULT '',
  `role` int(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `fullname`, `phone_number`, `role`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$1ARTdo9CoZPDqRfV.AKYAekGEHh8yNPVU2VHBenFFw2BhC5pWFZ72', 'ADMIN', '012345789', 3),
(2, 'thien123', 'thien123@gmail.com', 'thien123', 'Thien', '012345789', 1),
(3, 'toan123', 'toan123@gmail.com', 'toan123', 'Toan', '012345789', 2),
(4, 'cong123', 'cong123@gmail.com', 'cong123', 'COng chua', '012345789', 1),
(5, 'Nguyen123', 'Nguyen123@gmail.com', 'Nguyen123', 'Nguyen', '012345789', 1),
(6, 'thu123', 'thu123@gmail.com', 'thu123', 'Thu Vo', '012345789', 2),
(7, 'toan', 'toan@gmail.com', '$2y$10$1ARTdo9CoZPDqRfV.AKYAekGEHh8yNPVU2VHBenFFw2BhC5pWFZ72', 'Toan', '0986450023', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`idcomment`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `idcomment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
