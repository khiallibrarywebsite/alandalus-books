-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 11 مارس 2023 الساعة 20:40
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

-- --------------------------------------------------------

--
-- بنية الجدول `tables_index`
--

CREATE TABLE `tables_index` (
  `id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `tables_index`
--

INSERT INTO `tables_index` (`id`) VALUES
('egyand'),
('ksaand'),
('entand');

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `username` varchar(100) DEFAULT NULL,
  `password` int(100) DEFAULT NULL,
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

INSERT INTO `users` (`username`, `password`, `stage`, `scoore`, `readedbooks`, `name`, `id_readed_added_books`, `school`, `type`) VALUES
('egy1', 123456, 1, 0, 0, 'اياد', '', 'egyand', 'user'),
('egy2', 123456, 2, 0, 0, 'zad', '', 'egyand', 'user'),
('egy3', 123456, 3, 0, 0, 'عكاشة', '', 'egyand', 'user'),
('egyhost3', 123456, 3, 0, 0, 'بدر', '', 'egyand', 'host'),
('egyhost2', 123456, 2, 0, 0, 'محمد بكر', '', 'egyand', 'host'),
('egyhost1', 123456, 1, 0, 0, 'محمد جمال', '', 'egyand', 'host'),
('ksa1', 123456, 1, 0, 0, 'سلمان', '', 'ksaand', 'user'),
('ksa2', 123456, 2, 0, 0, 'عزيز', '', 'ksaand', 'user'),
('ksa3', 123456, 3, 0, 0, 'وجيه', '', 'ksaand', 'user'),
('ksahost1', 123456, 1, 0, 0, 'فيصل', '', 'ksaand', 'host'),
('ksahost2', 123456, 2, 0, 0, 'مكرم', '', 'ksaand', 'host'),
('ksahost3', 123456, 3, 0, 0, 'محمد', '', 'ksaand', 'host'),
('ent3', 123456, 3, 0, 0, 'ahmed', '', 'entand', 'user'),
('ent2', 123456, 2, 0, 0, 'metwaly', '', 'entand', 'user'),
('ent1', 123456, 1, 0, 0, 'mohamed', '', 'entand', 'user'),
('enthost1', 123456, 1, 0, 0, 'kalem', '', 'entand', 'host'),
('enthost2', 123456, 2, 0, 0, 'malked', '', 'entand', 'host'),
('enthost3', 123456, 3, 0, 0, 'waled', '', 'entand', 'host');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
