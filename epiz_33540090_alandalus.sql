-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql301.epizy.com
-- Generation Time: 10 فبراير 2023 الساعة 10:39
-- إصدار الخادم: 10.3.27-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_33540090_alandalus`
--

-- --------------------------------------------------------

--
-- بنية الجدول `egyand_1_books`
--

CREATE TABLE `egyand_1_books` (
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
  `q3ak` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `egyand_1_books`
--

INSERT INTO `egyand_1_books` (`Name`, `writer`, `url`, `img`, `q1`, `q2`, `q3`, `q1a1`, `q1a2`, `q1ak`, `q2a1`, `q2a2`, `q2ak`, `q3a1`, `q3a2`, `q3ak`) VALUES
('1يسمعون حسيسها ', '1ايمن العتوم ', 'https://drive.google.com/file/d/1B8m0jvypiNelJuG-W5V_QmVx5fX8tAGI/view?usp=share_link', 'https://drive.google.com/thumbnail?id=1B8m0jvypiNelJuG-W5V_QmVx5fX8tAGI', '1.1 من هو ايمن العتوم ', '1.2 من هو ايمن العتوم ', '1.3 من هو ايمن العتوم ', 'كاتب1.1', 'شاعر1.1', 'كاتب وشاعر1.1', 'كاتب1.2', 'شاعر1.2', 'كاتب وشاعر1.2', 'كاتب1.3', 'شاعر1.3', 'كاتب وشاعر1.3');

-- --------------------------------------------------------

--
-- بنية الجدول `egyand_2_books`
--

CREATE TABLE `egyand_2_books` (
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
  `q3ak` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `egyand_2_books`
--

INSERT INTO `egyand_2_books` (`Name`, `writer`, `url`, `img`, `q1`, `q2`, `q3`, `q1a1`, `q1a2`, `q1ak`, `q2a1`, `q2a2`, `q2ak`, `q3a1`, `q3a2`, `q3ak`) VALUES
('1يسمعون حسيسها ', '2ايمن العتوم ', 'https://drive.google.com/file/d/1B8m0jvypiNelJuG-W5V_QmVx5fX8tAGI/view?usp=share_link', 'https://drive.google.com/thumbnail?id=1B8m0jvypiNelJuG-W5V_QmVx5fX8tAGI', '2.1 من هو ايمن العتوم ', '2.2 من هو ايمن العتوم ', '2.3 من هو ايمن العتوم ', 'كاتب2.1', 'شاعر2.1', 'كاتب وشاعر2.1', 'كاتب2.2', 'شاعر2.2', 'كاتب وشاعر2.2', 'كاتب2.3', 'شاعر2.3', 'كاتب وشاعر2.3');

-- --------------------------------------------------------

--
-- بنية الجدول `egyand_3_books`
--

CREATE TABLE `egyand_3_books` (
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
  `q3ak` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `egyand_3_books`
--

INSERT INTO `egyand_3_books` (`Name`, `writer`, `url`, `img`, `q1`, `q2`, `q3`, `q1a1`, `q1a2`, `q1ak`, `q2a1`, `q2a2`, `q2ak`, `q3a1`, `q3a2`, `q3ak`) VALUES
('1يسمعون حسيسها ', '3ايمن العتوم ', 'https://drive.google.com/file/d/1B8m0jvypiNelJuG-W5V_QmVx5fX8tAGI/view?usp=share_link', 'https://drive.google.com/thumbnail?id=1B8m0jvypiNelJuG-W5V_QmVx5fX8tAGI', '3.1 من هو ايمن العتوم  ', '3.2 من هو ايمن العتوم  ', '3.3 من هو ايمن العتوم  ', 'كاتب3.1', 'شاعر3.1', 'كاتب وشاعر3.1', 'كاتب3.2', 'شاعر3.2', 'كاتب وشاعر3.2', 'كاتب3.3', 'شاعر3.3', 'كاتب وشاعر3.3');

-- --------------------------------------------------------

--
-- بنية الجدول `entand_1_books`
--

CREATE TABLE `entand_1_books` (
  `Name` varchar(300) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `entand_1_books`
--

INSERT INTO `entand_1_books` (`Name`) VALUES
('rrr'),
('rrrr'),
('rrr');

-- --------------------------------------------------------

--
-- بنية الجدول `entand_2_books`
--

CREATE TABLE `entand_2_books` (
  `Name` varchar(300) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `entand_2_books`
--

INSERT INTO `entand_2_books` (`Name`) VALUES
('rrr'),
('rrrr'),
('rrr');

-- --------------------------------------------------------

--
-- بنية الجدول `entand_3_books`
--

CREATE TABLE `entand_3_books` (
  `Name` varchar(300) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `entand_3_books`
--

INSERT INTO `entand_3_books` (`Name`) VALUES
('rrr'),
('rrrr'),
('rrr');

-- --------------------------------------------------------

--
-- بنية الجدول `host_egyand`
--

CREATE TABLE `host_egyand` (
  `username` varchar(100) DEFAULT NULL,
  `password` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `host_egyand`
--

INSERT INTO `host_egyand` (`username`, `password`, `name`) VALUES
('egy3host.egyand', 123456, 'بدر'),
('egy2host.egyand', 123456, 'محمد بكر'),
('egy1host.egyand', 123456, 'محمد جمال');

-- --------------------------------------------------------

--
-- بنية الجدول `host_entand`
--

CREATE TABLE `host_entand` (
  `username` varchar(100) DEFAULT NULL,
  `password` int(11) DEFAULT NULL,
  `name` varchar(100) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `host_entand`
--

INSERT INTO `host_entand` (`username`, `password`, `name`) VALUES
('ent1host.entand', 123456, 'kalem'),
('ent2host.entand', 123456, 'malked'),
('ent3host.entand', 123456, 'waled');

-- --------------------------------------------------------

--
-- بنية الجدول `host_ksaand`
--

CREATE TABLE `host_ksaand` (
  `username` varchar(100) DEFAULT NULL,
  `password` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `host_ksaand`
--

INSERT INTO `host_ksaand` (`username`, `password`, `name`) VALUES
('ksa1host.ksaand', 123456, 'فيصل'),
('ksa2host.ksaand', 123456, 'مكرم'),
('ksa3host.ksaand', 123456, 'محمد');

-- --------------------------------------------------------

--
-- بنية الجدول `ksaand_1_books`
--

CREATE TABLE `ksaand_1_books` (
  `Name` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `ksaand_1_books`
--

INSERT INTO `ksaand_1_books` (`Name`) VALUES
('rrr'),
('rrrr'),
('rrr');

-- --------------------------------------------------------

--
-- بنية الجدول `ksaand_2_books`
--

CREATE TABLE `ksaand_2_books` (
  `Name` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `ksaand_2_books`
--

INSERT INTO `ksaand_2_books` (`Name`) VALUES
('rrr'),
('rrrr'),
('rrr');

-- --------------------------------------------------------

--
-- بنية الجدول `ksaand_3_books`
--

CREATE TABLE `ksaand_3_books` (
  `Name` varchar(300) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `ksaand_3_books`
--

INSERT INTO `ksaand_3_books` (`Name`) VALUES
('rrr'),
('rrrr'),
('rrr');

-- --------------------------------------------------------

--
-- بنية الجدول `user_egyand`
--

CREATE TABLE `user_egyand` (
  `username` varchar(100) DEFAULT NULL,
  `password` int(11) DEFAULT NULL,
  `scoore` int(11) DEFAULT NULL,
  `readedbooks` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `user_egyand`
--

INSERT INTO `user_egyand` (`username`, `password`, `scoore`, `readedbooks`, `name`) VALUES
('egy10.egyand', 123456, 0, 0, 'زياد خيال'),
('egy9.egyand', 123456, 0, 0, 'حسن'),
('egy8.egyand', 123456, 0, 0, 'محمد'),
('egy7.egyand', 123456, 0, 0, 'متولي'),
('egy6.egyand', 123456, 0, 0, 'اشرف'),
('egy5.egyand', 123456, 0, 0, 'حسين'),
('egy4.egyand', 123456, 0, 0, 'اياد'),
('egy3.egyand', 123456, 0, 0, 'محمد خالد'),
('egy2.egyand', 123456, 0, 0, 'عكاشة'),
('egy1.egyand', 123456, 0, 0, 'مصطفي');

-- --------------------------------------------------------

--
-- بنية الجدول `user_entand`
--

CREATE TABLE `user_entand` (
  `username` varchar(100) DEFAULT NULL,
  `password` int(11) DEFAULT NULL,
  `scoore` int(11) DEFAULT NULL,
  `readedbooks` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `user_entand`
--

INSERT INTO `user_entand` (`username`, `password`, `scoore`, `readedbooks`, `name`) VALUES
('ent4.entand', 123456, 0, 0, 'malek'),
('ent3.entand', 123456, 0, 0, 'ahmed'),
('ent2.entand', 123456, 0, 0, 'metwaly'),
('ent1.entand', 123456, 0, 0, 'mohamed');

-- --------------------------------------------------------

--
-- بنية الجدول `user_ksaand`
--

CREATE TABLE `user_ksaand` (
  `username` varchar(100) DEFAULT NULL,
  `password` int(11) DEFAULT NULL,
  `scoore` int(11) DEFAULT NULL,
  `readedbooks` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `user_ksaand`
--

INSERT INTO `user_ksaand` (`username`, `password`, `scoore`, `readedbooks`, `name`) VALUES
('ksa1.ksaand', 123456, 0, 0, 'سلمان'),
('ksa2.ksaand', 123456, 0, 0, 'عزيز'),
('ksa3.ksaand', 123456, 0, 0, 'وجيه'),
('ksa4.ksaand', 123456, 0, 0, 'خالد '),
('ksa5.ksaand', 123456, 0, 0, 'كمال'),
('ksa6.ksaand', 123456, 0, 0, 'حشمت'),
('ksa7.ksaand', 123456, 0, 0, 'ياسر'),
('ksa8.ksaand', 123456, 0, 0, 'عامر'),
('ksa9.ksaand', 123456, 0, 0, 'عبدالله'),
('ksa10.ksaand', 123456, 0, 0, 'عبدالملك');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
