-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 02 مايو 2023 الساعة 21:47
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
(576531930, 'أرض زيكولا', 'عمرو عبد الحميد', 'https://drive.google.com/file/d/19GVjhqV1sWLN5AzY79qoicTBcyyIsAmM', 'https://drive.google.com/thumbnail?id=19GVjhqV1sWLN5AzY79qoicTBcyyIsAmM', 'من هيا مني', 'اين هيا قرية البهو فريك', 'ما إسم طبيبة أرض زيكولا', 'زميلة خالد', 'أم خالد', 'زوجة خالد', 'في الرياض', 'في القاهرة', 'في المنصورة', 'مني', 'شفا', 'أسيل', '3', 'egyand', 'egyhost3', '2023-05-02 16:18:13'),
(564346915, 'صرع', 'نبيل فاروق', 'https://drive.google.com/file/d/10kAj6DMq7zH_v0dwRhVhfsURX3hRFcS8', 'https://drive.google.com/thumbnail?id=10kAj6DMq7zH_v0dwRhVhfsURX3hRFcS8', 'من هي شيماء', 'من أين أتت الروبوتات', 'من الذي أرسل الروبوتات', 'معلمة', 'طبيبة', 'مريضة', 'من الماضي', 'من الحاضر', 'من المستقبل', 'رجل دولة', 'الدكتور طارق', 'ابن شيماء', '2', 'egyand', 'egyhost2', '2023-05-02 16:32:55'),
(579930542, 'أماريتا', 'عمرو عبد الحميد', 'https://drive.google.com/file/d/1nU3x3QaAGexuzRAKuAh_t1I4qnFicOOt', 'https://drive.google.com/thumbnail?id=1nU3x3QaAGexuzRAKuAh_t1I4qnFicOOt', 'ما هو البحر الذي عبرته أسيل', 'هل ذهب خالد الي أرض زيكولا ثانية ؟', 'من يعلم خبايا بحر أكما', 'البحر الأحمر', 'بحر العجائب', 'بحر أكما', 'لا', 'لم يذهب ولاكن حلم بها', 'نعم', 'المفطرون', 'الشحاتون', 'البحارون ', '1', 'egyand', 'egyhost1', '2023-05-02 19:15:02'),
(803782167, 'قصة الحروب الصليبية', 'راغب السرجاني', 'https://drive.google.com/file/d/1w4HbUs_V3fE7qvb3ItNRmuj5Z6b5RnR_', 'https://drive.google.com/thumbnail?id=1w4HbUs_V3fE7qvb3ItNRmuj5Z6b5RnR_', 'من الذي ارسل الحملة الصليبية الأولي', 'كم إمارة صليبية تم تاسيسها في أول حملة', 'كم مملكة صليبية تم تاسيسها في أول حملة', 'البابا اوربان الأول', 'البابا نتاشيا', 'البابا اوربان الثاني', 'أربع', 'إثنان', 'ثلاث', 'إثنان', 'أربع', 'واحدة', '1', 'ksaand', 'ksahost1', '2023-05-02 19:22:05'),
(378051803, 'الغرفة 207', 'أحمد خالد توفيق', 'https://drive.google.com/file/d/1h-A4s-b7NDRASAULODcXUE07HLrVsIlZ', 'https://drive.google.com/thumbnail?id=1h-A4s-b7NDRASAULODcXUE07HLrVsIlZ', 'اين توجد الغرفة 207', 'من اين يخرج الجن الي الغرفة', 'هل تم كشف سر الغرفة', 'في بيت', 'في مستشفي', 'في فندق', 'من الجدار', 'من الأرض', 'من مرآة', 'في جزء آخر', 'لا', 'نعم', '2', 'ksaand', 'ksahost2', '2023-05-02 20:30:31'),
(180796799, 'يوتيوبا', 'أحمد خالد توفيق', 'https://drive.google.com/file/d/11-jo2f7QlhZbr-ksxjRnhXY57j3Gzz1E', 'https://drive.google.com/thumbnail?id=11-jo2f7QlhZbr-ksxjRnhXY57j3Gzz1E', 'من يسكن يوتيوبا', 'هل يجوز تعاطي الحشيش في يوتيوبا', 'بكم الدولار في زمن يوتيوبا', 'الطبقة المتوسطة', 'الطبقة الفقيرة', 'الطبقة الغنية', 'نعم ولاكن الشبو والككاين فقط', 'لا', 'نعم', '126 جنيه', '15 جنيه', '30 جنيه', '3', 'ksaand', 'ksahost3', '2023-05-02 20:53:49');

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
('entand', 'مدارس الأندلس الدبلومة', 'imgentand.jpg'),
('code', '<?php include \'../../config.php\';?>\r\n\r\n<!DOCTYPE html> <html lang=\'ar\'> <head> <script src=\'https://code.jquery.com/jquery-3.6.0.min.js\'></script> <?php ob_start(); ?> <meta charset=\'UTF-8\'> <meta http-equiv=\'X-UA-Compatible\' content=\'IE=edge\'> <meta name=\'viewport\' content=\'width=device-width, initial-scale=1.0\'> <title>الصفح الرئيسية - صفحة الطالب</title> <!-- font awesome cdn link --> <link rel=\'stylesheet\' href=\'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css\'> <style>.side-bar{ position: fixed; top: 0; left: 0; width: 30rem; background-color: var(--white); height: 100vh; border-right: var(--border); z-index: 1200; overflow-y: auto; /* add this line */ } .footer { /* existing styles */ position: fixed; bottom: 0; } .footer { /* existing styles */ opacity: 0; animation: fade-in 0.5s ease forwards; }\r\n@keyframes fade-in {\r\nto {\r\nopacity: 1;\r\ntransform: translateY(20px);\r\n}\r\nfrom {\r\nopacity: 0;\r\ntransform: translateY(0);\r\n}\r\n}\r\n.footer {\r\nposition: fixed;\r\nbottom: 0;\r\nz-index: 9999;\r\n}\r\n</style> </head> <body> <!-- Loading screen --> <div id=\'loading-screen\'> <img src=\'../../img/loading.gif\' alt=\'Loading...\'> </div> <?php if(s != 1){ echo\'<header class=\'header\'> <section class=\'flex\'> <h2 style=\'color: var(--black);\'>مدارس الأندلس الأهلية</h2> <div class=\'icons\'> <div id=\'menu-btn\' class=\'fas fa-bars\'></div> <div id=\'user-btn\' class=\'fas fa-user\'></div> <div id=\'toggle-btn\' class=\'fas fa-sun\'></div> </div> <div class=\'profile\'> <img src=\'../../img/users_img/\'.img.\'\' class=\'image\' alt=\'\'> <h3 class=\'name\'>\'.name.\'</h3> <p class=\'role\'>طالب</p> <a href=\'../profile_user.php?user=\'.titlecompleter.\'&school_code=\'.code.\'&pass=\'.password.\'&stage=\'.stage.\'\' class=\'btn\'>مشاهدة الحساب</a> <div class=\'flex-btn\'> <a href=\'../login.php\' class=\'option-btn\'>تسجيل خروج</a> </div> </div> </section> </header> <div class=\'side-bar\'> <div id=\'close-btn\'> <i class=\'fas fa-times\'></i> </div> <div class=\'profile\'> <img src=\'../img/users_img/\'.img.\'\' class=\'image', 'code'),
('code', '<?php include \'../config.php\';?>\r\n\r\n<!DOCTYPE html> <html lang=\'ar\'> <head> <script src=\'https://code.jquery.com/jquery-3.6.0.min.js\'></script> <?php ob_start(); ?> <meta charset=\'UTF-8\'> <meta http-equiv=\'X-UA-Compatible\' content=\'IE=edge\'> <meta name=\'viewport\' content=\'width=device-width, initial-scale=1.0\'> <title>الصفح الرئيسية - صفحة الطالب</title> <!-- font awesome cdn link --> <link rel=\'stylesheet\' href=\'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css\'> <style>.side-bar{ position: fixed; top: 0; left: 0; width: 30rem; background-color: var(--white); height: 100vh; border-right: var(--border); z-index: 1200; overflow-y: auto; /* add this line */ } .footer { /* existing styles */ position: fixed; bottom: 0; } .footer { /* existing styles */ opacity: 0; animation: fade-in 0.5s ease forwards; }\r\n@keyframes fade-in {\r\nto {\r\nopacity: 1;\r\ntransform: translateY(20px);\r\n}\r\nfrom {\r\nopacity: 0;\r\ntransform: translateY(0);\r\n}\r\n}\r\n.footer {\r\nposition: fixed;\r\nbottom: 0;\r\nz-index: 9999;\r\n}\r\n</style> </head> <body>          require_once \'../connect.php\';\r\n<!-- Loading screen --> <div id=\'loading-screen\'> <img src=\'../img/loading.gif\' alt=\'Loading...\'> </div> <?php if(s != 1){ echo\'<header class=\'header\'> <section class=\'flex\'> <h2 style=\'color: var(--black);\'>مدارس الأندلس الأهلية</h2> <div class=\'icons\'> <div id=\'menu-btn\' class=\'fas fa-bars\'></div> <div id=\'user-btn\' class=\'fas fa-user\'></div> <div id=\'toggle-btn\' class=\'fas fa-sun\'></div> </div> <div class=\'profile\'> <img src=\'../../img/users_img/\'.img.\'\' class=\'image\' alt=\'\'> <h3 class=\'name\'>\'.name.\'</h3> <p class=\'role\'>طالب</p> <a href=\'../profile_user.php?user=\'.titlecompleter.\'&school_code=\'.code.\'&pass=\'.password.\'&stage=\'.stage.\'\' class=\'btn\'>مشاهدة الحساب</a> <div class=\'flex-btn\'> <a href=\'../login.php\' class=\'option-btn\'>تسجيل خروج</a> </div> </div> </section> </header> <div class=\'side-bar\'> <div id=\'close-btn\'> <i class=\'fas fa-times\'></i> </div> <div class=\'profile\'> <img src=\'../', 'code');

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
('egy1', 123456, 'DALL·E 2023-04-16 22.49.51.png', 1, 10, 2, 'اياد', '[{\"id\":\"579930542\",\"q1\":\"بحر أكما\",\"q2\":\"نعم\",\"q3\":\"المفطرون\"},{\"id\":\"803782167\",\"q1\":\"البابا اوربان الأول\",\"q2\":\"إثنان\",\"q3\":\"واحدة\"}]', 'egyand', 'user'),
('egy2', 123456, 'b6faf656-4eea-4e1a-862a-aca6044be2cd.png', 2, 10, 1, 'zad', '[{\"id\":\"564346915\",\"q1\":\"طبيبة\",\"q2\":\"من الحاضر\",\"q3\":\"ابن شيماء\"}]', 'egyand', 'user'),
('egy3', 123456, 'img.png', 3, 30, 1, 'عكاشة', '[{\"id\":\"180796799\",\"q1\":\"الطبقة الغنية\",\"q2\":\"نعم\",\"q3\":\"30 جنيه\"}]', 'egyand', 'user'),
('egyhost3', 123456, 'z123.png', 3, 30, 1, 'بدر', '576531930,', 'egyand', 'host'),
('egyhost2', 123456, 'Flag_of_Egypt(Moving).gif', 2, 30, 1, 'محمد بكر', '564346915,', 'egyand', 'host'),
('egyhost1', 123456, 'download.jpeg', 1, 30, 1, 'محمد جمال', '579930542,', 'egyand', 'host'),
('ksa1', 123456, 'DALL·E 2023-04-16 22.37.29.png', 1, 20, 1, 'سلمان', '[{\"id\":\"579930542\",\"q1\":\"بحر أكما\",\"q2\":\"لا\",\"q3\":\"البحارون \"}]', 'ksaand', 'user'),
('ksa2', 123456, '23.jpg', 2, 20, 2, 'عزيز', '[{\"id\":\"564346915\",\"q1\":\"معلمة\",\"q2\":\"من المستقبل\",\"q3\":\"ابن شيماء\"},{\"id\":\"378051803\",\"q1\":\"في مستشفي\",\"q2\":\"من مرآة\",\"q3\":\"نعم\"}]', 'ksaand', 'user'),
('ksa3', 123456, 'DALL·E 2023-04-23 23.06.24.png', 3, 20, 1, 'وجيه', '[{\"id\":\"576531930\",\"q1\":\"زوجة خالد\",\"q2\":\"في القاهرة\",\"q3\":\"أسيل\"}]', 'ksaand', 'user'),
('ksahost1', 123456, '11112.gif', 1, 30, 1, 'فيصل', '803782167,', 'ksaand', 'host'),
('ksahost2', 123456, '1234512.png', 2, 30, 1, 'مكرم', '378051803,', 'ksaand', 'host'),
('ksahost3', 123456, 'ew.webp', 3, 30, 1, 'محمد', '180796799,', 'ksaand', 'host');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
