-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 14 مارس 2023 الساعة 20:58
-- إصدار الخادم: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alandalus`
--

-- --------------------------------------------------------

--
-- بنية الجدول `books`
--

CREATE TABLE `books` (
  `id` int(200) DEFAULT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `writer` varchar(100) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  `q1` varchar(230) DEFAULT NULL,
  `q2` varchar(230) DEFAULT NULL,
  `q3` varchar(230) DEFAULT NULL,
  `q1a1` varchar(100) DEFAULT NULL,
  `q1a2` varchar(100) DEFAULT NULL,
  `q1ak` varchar(100) DEFAULT NULL,
  `q2a1` varchar(100) DEFAULT NULL,
  `q2a2` varchar(100) DEFAULT NULL,
  `q2ak` varchar(100) DEFAULT NULL,
  `q3a1` varchar(100) DEFAULT NULL,
  `q3a2` varchar(100) DEFAULT NULL,
  `q3ak` varchar(100) DEFAULT NULL,
  `stage` varchar(100) DEFAULT NULL,
  `school` varchar(100) DEFAULT NULL,
  `book-publisher` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `books`
--

INSERT INTO `books` (`id`, `Name`, `writer`, `url`, `img`, `q1`, `q2`, `q3`, `q1a1`, `q1a2`, `q1ak`, `q2a1`, `q2a2`, `q2ak`, `q3a1`, `q3a2`, `q3ak`, `stage`, `school`, `book-publisher`, `date`) VALUES
(589192664, 'التاريخ علي لسان ابليس', 'زياد خيال', 'https://drive.google.com/file/d/1B8m0jvypiNelJuG-W5V_QmVx5fX8tAGI/view?usp=share_link', 'https://drive.google.com/thumbnail?id=1B8m0jvypiNelJuG-W5V_QmVx5fX8tAGI', 'من هو ابليس', 'من هو زياد خيال ', 'من هو خيال', 'شيطان', 'جن', 'حيوان', 'محل', 'شاعر', 'طالب', 'ابو زياد', 'جد محمد', 'ابو متولي', '1', 'egyand', 'محمد جمال', '2023-03-12 19:26:05'),
(516019511, 'زياد', 'محمد', 'https://drive.google.com/file/d/1B8m0jvypiNelJuG-W5V_QmVx5fX8tAGI/view?usp=sharing', 'https://drive.google.com/thumbnail?id=1B8m0jvypiNelJuG-W5V_QmVx5fX8tAGI', 'من هو زياد', 'jhngbfdsa', 'jhgfdsz', 'شيطان', 'oiyujthgfdsa', 'JHGFDSXA', 'HGFDSA', 'jhgfdxz', 'jhgfdsa', 'jnbvcxz', 'jnhbgvfcdxsa', 'jhgfdsa', '2', 'entand', 'malked', '2023-03-12 19:40:40');

-- --------------------------------------------------------

--
-- بنية الجدول `contact`
--

CREATE TABLE `contact` (
  `name` varchar(100) DEFAULT NULL,
  `message` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `contact`
--

INSERT INTO `contact` (`name`, `message`, `email`, `type`, `date`) VALUES
('ziad', 'ziad mohamed sjkfdlkjnhjgkfdlhngkfldghgfcx', 'zeymohkhi@gmail.com', 'host', '2023-03-12 19:29:10');

-- --------------------------------------------------------

--
-- بنية الجدول `tables_index`
--

CREATE TABLE `tables_index` (
  `id` varchar(100) NOT NULL,
  `name` varchar(2000) DEFAULT NULL,
  `img` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `tables_index`
--

INSERT INTO `tables_index` (`id`, `name`, `img`) VALUES
('egyand', 'مدارس الأندلس المسار المصري', 'imgegyand.jpg'),
('ksaand', 'مدارس الأندلس المسار السعودي', 'imgksaand.jpg'),
('entand', 'مدارس الأندلس الدبلومة', 'imgentand.jpg');

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `username` varchar(100) DEFAULT NULL,
  `password` int(100) DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  `stage` int(100) DEFAULT NULL,
  `scoore` int(200) DEFAULT NULL,
  `readedbooks` int(255) DEFAULT NULL,
  `name` mediumtext DEFAULT NULL,
  `id_readed_added_books` longtext DEFAULT NULL,
  `school` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`username`, `password`, `img`, `stage`, `scoore`, `readedbooks`, `name`, `id_readed_added_books`, `school`, `type`) VALUES
('egy1', 123456, 'img/img.png', 1, 10, 1, 'اياد', '[{\"id\":\"589192664\",\"q1\":\"جن\",\"q2\":\"شاعر\",\"q3\":\"ابو متولي\"}]', 'egyand', 'user'),
('egy2', 123456, 'img/img.png', 2, 0, 0, 'zad', '', 'egyand', 'user'),
('egy3', 123456, 'img/img.png', 3, 0, 0, 'عكاشة', '', 'egyand', 'user'),
('egyhost3', 123456, 'img/img.png', 3, 0, 0, 'بدر', '', 'egyand', 'host'),
('egyhost2', 123456, 'img/img.png', 2, 0, 0, 'محمد بكر', '', 'egyand', 'host'),
('egyhost1', 123456, 'img/img.png', 1, 30, 1, 'محمد جمال', '589192664,', 'egyand', 'host'),
('ksa1', 123456, 'img/img.png', 1, 0, 0, 'سلمان', '', 'ksaand', 'user'),
('ksa2', 123456, 'img/img.png', 2, 0, 0, 'عزيز', '', 'ksaand', 'user'),
('ksa3', 123456, 'img/img.png', 3, 0, 0, 'وجيه', '', 'ksaand', 'user'),
('ksahost1', 123456, 'img/img.png', 1, 0, 0, 'فيصل', '', 'ksaand', 'host'),
('ksahost2', 123456, 'img/img.png', 2, 0, 0, 'مكرم', '', 'ksaand', 'host'),
('ksahost3', 123456, 'img/img.png', 3, 0, 0, 'محمد', '', 'ksaand', 'host'),
('ent3', 123456, 'img/img.png', 3, 0, 0, 'ahmed', '', 'entand', 'user'),
('ent2', 1234, 'imgegy.jpg', 2, 0, 0, 'metwaly', '', 'entand', 'user'),
('ent1', 123456, 'img/img.png', 1, 0, 0, 'mohamed', '', 'entand', 'user'),
('enthost1', 123456, 'img/img.png', 1, 0, 0, 'kalem', '', 'entand', 'host'),
('enthost2', 123456, 'علم-الصرف-في-اللغة-العربية.png', 2, 30, 1, 'malked', '516019511,', 'entand', 'host'),
('enthost3', 123456, 'img/img.png', 3, 0, 0, 'waled', '', 'entand', 'host');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
