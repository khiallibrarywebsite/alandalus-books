-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 24 فبراير 2023 الساعة 18:18
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
  `Name` varchar(100) DEFAULT NULL,
  `writer` varchar(100) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  `q1` varchar(100) DEFAULT NULL,
  `q2` varchar(100) DEFAULT NULL,
  `q3` varchar(100) DEFAULT NULL,
  `q1a1` varchar(100) DEFAULT NULL,
  `q1a2` varchar(100) DEFAULT NULL,
  `q1ak` varchar(100) DEFAULT NULL,
  `q2a1` varchar(100) DEFAULT NULL,
  `q2a2` varchar(100) DEFAULT NULL,
  `q2ak` varchar(100) DEFAULT NULL,
  `q3a1` varchar(100) DEFAULT NULL,
  `q3a2` varchar(100) DEFAULT NULL,
  `q3ak` varchar(100) DEFAULT NULL,
  `stage` int(11) DEFAULT NULL,
  `school` varchar(100) DEFAULT NULL,
  `id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `books`
--

INSERT INTO `books` (`Name`, `writer`, `url`, `img`, `q1`, `q2`, `q3`, `q1a1`, `q1a2`, `q1ak`, `q2a1`, `q2a2`, `q2ak`, `q3a1`, `q3a2`, `q3ak`, `stage`, `school`, `id`) VALUES
('1يسمعون حسيسها ', '1ايمن العتوم ', 'https://drive.google.com/file/d/1B8m0jvypiNelJuG-W5V_QmVx5fX8tAGI/view?usp=share_link', 'https://drive.google.com/thumbnail?id=1B8m0jvypiNelJuG-W5V_QmVx5fX8tAGI', '1-1 من هو ايمن العتوم ', '1-2 من هو ايمن العتوم ', '1-3 من هو ايمن العتوم ', 'كاتب وشاعر1-1', 'شاعر1-1', 'كاتب1-1', 'كاتب1-2', 'كاتب وشاعر1-2', 'شاعر1-2', 'كاتب1-3', 'شاعر1-3', 'كاتب وشاعر1-3', 1, 'egyand', 65757),
('1يسمعون حسيسها ', '2ايمن العتوم ', 'https://drive.google.com/file/d/1B8m0jvypiNelJuG-W5V_QmVx5fX8tAGI/view?usp=share_link', 'https://drive.google.com/thumbnail?id=1B8m0jvypiNelJuG-W5V_QmVx5fX8tAGI', '2-1 من هو ايمن العتوم ', '2-2 من هو ايمن العتوم ', '2-3 من هو ايمن العتوم ', 'كاتب2-1', 'شاعر2-1', 'كاتب وشاعر2-1', 'كاتب2-2', 'شاعر2-2', 'كاتب وشاعر2-2', 'كاتب2-3', 'شاعر2-3', 'كاتب وشاعر2-3', 2, 'egyand', 575776),
('1يسمعون حسيسها ', '3ايمن العتوم ', 'https://drive.google.com/file/d/1B8m0jvypiNelJuG-W5V_QmVx5fX8tAGI/view?usp=share_link', 'https://drive.google.com/thumbnail?id=1B8m0jvypiNelJuG-W5V_QmVx5fX8tAGI', '3-1 من هو ايمن العتوم  ', '3-2 من هو ايمن العتوم  ', '3-3 من هو ايمن العتوم  ', 'كاتب3-1', 'شاعر3-1', 'كاتب وشاعر3-1', 'كاتب3-2', 'شاعر3-2', 'كاتب وشاعر3-2', 'كاتب3-3', 'شاعر3-3', 'كاتب وشاعر3-3', 3, 'egyand', 76565),
('2يسمعون حسيسها ', '1ايمن العتوم ', 'https://drive.google.com/file/d/1B8m0jvypiNelJuG-W5V_QmVx5fX8tAGI/view?usp=share_link', 'https://drive.google.com/thumbnail?id=1B8m0jvypiNelJuG-W5V_QmVx5fX8tAGI', '1-1 من هو ايمن العتوم ', '1-2 من هو ايمن العتوم ', '1-3 من هو ايمن العتوم ', 'كاتب1-1', 'شاعر1-1', 'كاتب وشاعر1-1', 'كاتب1-2', 'شاعر1-2', 'كاتب وشاعر1-2', 'كاتب1-3', 'شاعر1-3', 'كاتب وشاعر1-3', 1, 'ksaand', 674635),
('2يسمعون حسيسها ', '2ايمن العتوم ', 'https://drive.google.com/file/d/1B8m0jvypiNelJuG-W5V_QmVx5fX8tAGI/view?usp=share_link', 'https://drive.google.com/thumbnail?id=1B8m0jvypiNelJuG-W5V_QmVx5fX8tAGI', '2-1 من هو ايمن العتوم ', '2-2 من هو ايمن العتوم ', '2-3 من هو ايمن العتوم ', 'كاتب2-1', 'شاعر2-1', 'كاتب وشاعر2-1', 'كاتب2-2', 'شاعر2-2', 'كاتب وشاعر2-2', 'كاتب2-3', 'شاعر2-3', 'كاتب وشاعر2-3', 2, 'ksaand', 656453),
('2يسمعون حسيسها ', '3ايمن العتوم ', 'https://drive.google.com/file/d/1B8m0jvypiNelJuG-W5V_QmVx5fX8tAGI/view?usp=share_link', 'https://drive.google.com/thumbnail?id=1B8m0jvypiNelJuG-W5V_QmVx5fX8tAGI', '3-1 من هو ايمن العتوم  ', '3-2 من هو ايمن العتوم  ', '3-3 من هو ايمن العتوم  ', 'كاتب3-1', 'شاعر3-1', 'كاتب وشاعر3-1', 'كاتب3-2', 'شاعر3-2', 'كاتب وشاعر3-2', 'كاتب3-3', 'شاعر3-3', 'كاتب وشاعر3-3', 3, 'ksaad', 76543),
('3يسمعون حسيسها ', '1ايمن العتوم ', 'https://drive.google.com/file/d/1B8m0jvypiNelJuG-W5V_QmVx5fX8tAGI/view?usp=share_link', 'https://drive.google.com/thumbnail?id=1B8m0jvypiNelJuG-W5V_QmVx5fX8tAGI', '1-1 من هو ايمن العتوم ', '1-2 من هو ايمن العتوم ', '1-3 من هو ايمن العتوم ', 'كاتب1-1', 'شاعر1-1', 'كاتب وشاعر1-1', 'كاتب1-2', 'شاعر1-2', 'كاتب وشاعر1-2', 'كاتب1-3', 'شاعر1-3', 'كاتب وشاعر1-3', 1, 'entand', 4567456),
('3يسمعون حسيسها ', '2ايمن العتوم ', 'https://drive.google.com/file/d/1B8m0jvypiNelJuG-W5V_QmVx5fX8tAGI/view?usp=share_link', 'https://drive.google.com/thumbnail?id=1B8m0jvypiNelJuG-W5V_QmVx5fX8tAGI', '2-1 من هو ايمن العتوم ', '2-2 من هو ايمن العتوم ', '2-3 من هو ايمن العتوم ', 'كاتب2-1', 'شاعر2-1', 'كاتب وشاعر2-1', 'كاتب2-2', 'شاعر2-2', 'كاتب وشاعر2-2', 'كاتب2-3', 'شاعر2-3', 'كاتب وشاعر2-3', 2, 'entand', 23456789),
('3يسمعون حسيسها ', '3ايمن العتوم ', 'https://drive.google.com/file/d/1B8m0jvypiNelJuG-W5V_QmVx5fX8tAGI/view?usp=share_link', 'https://drive.google.com/thumbnail?id=1B8m0jvypiNelJuG-W5V_QmVx5fX8tAGI', '3-1 من هو ايمن العتوم  ', '3-2 من هو ايمن العتوم  ', '3-3 من هو ايمن العتوم  ', 'كاتب3-1', 'شاعر3-1', 'كاتب وشاعر3-1', 'كاتب3-2', 'شاعر3-2', 'كاتب وشاعر3-2', 'كاتب3-3', 'شاعر3-3', 'كاتب وشاعر3-3', 3, 'entand', 67894567),
('', '', '', 'https://drive.google.com/thumbnail?id=1939579489ر8ى548955948ررر', 'من هو ابليس', 'من هو زياد خيال ', 'من هو خيال', 'حيوان', 'جن', 'شيطان', 'كاتب', 'طالب', 'شاعر', 'ابو زياد', 'ابو متولي', 'جد محمد', 1, 'egyand', 381469065);

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
  `password` int(11) DEFAULT NULL,
  `stage` int(11) DEFAULT NULL,
  `scoore` int(11) DEFAULT NULL,
  `readedbooks` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `id_readed_added_books` varchar(100) DEFAULT NULL,
  `school` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`username`, `password`, `stage`, `scoore`, `readedbooks`, `name`, `id_readed_added_books`, `school`, `type`) VALUES
('egy1', 123456, 1, 0, 0, 'اياد', ',', 'egyand', 'user'),
('egy2', 123456, 2, 0, 0, 'محمد خالد', ',', 'egyand', 'user'),
('egy3', 123456, 3, 0, 0, 'عكاشة', ',', 'egyand', 'user'),
('egyhost3', 123456, 3, 0, 0, 'بدر', ',', 'egyand', 'host'),
('egyhost2', 123456, 2, 0, 0, 'محمد بكر', ',', 'egyand', 'host'),
('egyhost1', 123456, 1, 0, 0, 'محمد جمال', ',', 'egyand', 'host'),
('ksa1', 123456, 1, 0, 0, 'سلمان', ',', 'ksaand', 'user'),
('ksa2', 123456, 2, 0, 0, 'عزيز', ',', 'ksaand', 'user'),
('ksa3', 123456, 3, 0, 0, 'وجيه', ',', 'ksaand', 'user'),
('ksahost1', 123456, 1, 0, 0, 'فيصل', ',', 'ksaand', 'host'),
('ksahost2', 123456, 2, 0, 0, 'مكرم', ',', 'ksaand', 'host'),
('ksahost3', 123456, 3, 0, 0, 'محمد', ',', 'ksaand', 'host'),
('ent3', 123456, 3, 0, 0, 'ahmed', ',', 'entand', 'user'),
('ent2', 123456, 2, 0, 0, 'metwaly', ',', 'entand', 'user'),
('ent1', 123456, 1, 0, 0, 'mohamed', ',', 'entand', 'user'),
('enthost1', 123456, 1, 0, 0, 'kalem', ',', 'entand', 'host'),
('enthost2', 123456, 2, 0, 0, 'malked', ',', 'entand', 'host'),
('enthost3', 123456, 3, 0, 0, 'waled', ',', 'entand', 'host'),
('egysupervisor', 654321, 1, 1, 1, 'طعمية', '1', 'egyand', 'supervisor'),
('ksasupervisor', 654321, 1, 1, 1, 'تركي', '1', 'ksaand', 'supervisor'),
('entsupervisor', 654321, 1, 1, 1, 'ajnabi', '1', 'entand', 'supervisor');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
