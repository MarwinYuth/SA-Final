-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 30, 2023 at 01:58 PM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sa-final`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `password`) VALUES
(1, 'Admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_book`
--

DROP TABLE IF EXISTS `tbl_book`;
CREATE TABLE IF NOT EXISTS `tbl_book` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `category` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  `publish` date NOT NULL,
  `detail` text NOT NULL,
  `ordernum` int NOT NULL,
  `active` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_book`
--

INSERT INTO `tbl_book` (`id`, `title`, `author`, `category`, `img`, `publish`, `detail`, `ordernum`, `active`) VALUES
(30, 'Naruto', 'Masashi Kishimoto', 'manga', '9781591163596_p0_v2_s1200x630.jpg', '2023-01-04', 'Naruto Naruto is one of the best-selling manga series in history having 250 million copies in circulation worldwide in 47 countries and regions, with 153 million copies in Japan alone and remaining 97 million copies elsewhere. It has become one of Viz Media\'s best-selling manga series; their English translations of the volumes have appeared on USA Today and The New York Times bestseller list several times, and the seventh volume won a Quill Award in 2006. Reviewers praised the manga\'s character development, strong storylines, and well-executed fight scenes, though some felt the fight scenes slowed the story down. Critics noted that the manga, which has a coming-of-age theme, makes use of cultural references from Japanese mythology and Confucianism.\n', 9, '1'),
(28, 'Attack On Titan', 'Isayama', 'manga', '1674664116011.jpg', '2023-01-01', 'Attack on Titan  It is set in a world where humanity is forced to live in cities surrounded by three enormous walls that protect them from gigantic man-eating humanoids referred to as Titans; the story follows Eren Yeager, who vows to exterminate the Titans after they bring about the destruction of his hometown and the death of his mother. ', 7, '1'),
(27, 'Demon Slayer ', 'Koyoharu Gotouge', 'manga', '1674663917401.jpg', '2023-01-02', 'Demon Slayer: Kimetsu no Yaiba  Hepburn: Shūkan Shōnen Janpu, stylized in English as WEEKLY JUMP) is a weekly shōnen manga anthology published in Japan by Shueisha under the Jump line of magazines. The manga series within the magazine consist of many action scenes and a fair amount of comedy. The chapters of the series that run in Weekly Shōnen Jump are collected and published in tankōbon volumes under the Jump Comics imprint every two to three months. It is one of the longest-running manga magazines, with the first issue being released with a cover date of August 1, 1968.', 6, '1'),
(37, 'ផ្ទះកណ្តាលបឹង', 'Manith', 'novel', 'bB9GZopTDjDd2yLwvbSzBMIqDpOh3Ukx6TTWMyV3.jpeg', '2022-12-31', 'សេរីភាព​គ្មានសម្រាប់​ មនុស្សកុហកឡេីយ...  ព្រោះតែអំណាចស្នេហា​ ទេីបធ្វេីអោយមិត្តសម្លាញ់ពីរនាក់ប្រែក្លាយជាសត្រូវ... ការគំរាមដាក់ទោសបានធ្វេីទៅយ៉ាងជ្រុលហួសហេតុដែលបណ្តាលអោយពួកគេធ្វេីដំណេីរទៅដល់វិមានបុរាណដ៏អាថ៍កំបាំងមួយ​ ដែលតែងតែប្តូររូបរាងនៅរៀងរាល់ម៉ោង​ ១:១៥នាទី។  អ្នកទាំងអស់គ្នាប្រាកដជាធ្លាប់បានអាន​ ផ្ទះកណ្តាលបឹង​ វគ្គមុនរួចមកហេីយ​ ហេីយប្រាកដជាស្គាល់លោកម្ចាស់​ ព្រហ្ម​ អាទិត្យ និងបានដឹងថាលោកម្ចាស់សាហាវឃោឃៅប៉ុណ្ណា...', 10, '1'),
(45, 'ផ្ទះកណ្តាលបឹង 2', 'Manith', 'novel', '297998627-605205360961620-1503590801339764031-n.jpg', '2023-01-16', 'ខ្ញុំសម្លឹងលោកសាន់ដោយមិនយល់ចិត្តគេទាល់តែសោះ។ គ្រានោះលោកភូក៏បង្ហាញវត្តមានឡើងជាមួយនឹងដំណើរតក់ក្រហល់ រួចហុចអាយផេតមួយមកឱ្យខ្ញុំ។ ខ្ញុំទទួលយកវាមកមើលទាំងឆ្ងល់ៗ តែពេលដែលខ្ញុំបានឃើញអត្ថបទមួយបង្ហាញនៅក្នុងនោះ ខ្ញុំក៏បើកភ្នែកធំៗឡើង ហាក់មិនចង់ជឿនូវអ្វីដែលបានឃើញ។ វិមាន ព្រហ្ម អាទិត្យ ប្រកាសដាក់លក់ជាបន្ទាន់! ខ្ញុំមិនបានដាក់លក់ផ្ទះរបស់ខ្ញុំទេ! នរណាជាអ្នកធ្វើរឿងនេះ?', 11, '1'),
(63, 'កំណត់ហេតុពណ៌ស្វាយ', 'ម៉ៅ ចាន់រស្មី', 'novel', '1674637497657.jpg', '2023-01-25', '#កំណត់ហេតុពណ៌ស្វាយ💜 បានក្លាយជាសៀវភៅដែលលក់ដាច់ប្រចាំហាងសៀវភៅជាច្រើនកន្លែងផងដែរ! ដែលធ្វើឱ្យសៀវភៅបោះពុម្ពលើកទីមួយជិតអស់ពីស្តុកទៅហើយ។\r\nដំបូងឡើយ គោលបំណងរបស់ខ្ញុំគឺ គ្រាន់តែចង់និពន្ធ កំណត់ហេតុពណ៌ស្វាយឡើងដោយផ្អែកលើក្តីស្រលាញ់ និងមនោសញ្ចេតនាដ៏ជ្រាលជ្រៅរបស់ខ្ញុំដែលមានចំពោះសាច់រឿងនេះ តែខ្ញុំពិតជាមិននឹកស្មានទេថា នឹងមានអ្នកអានជាច្រើនពេញចិត្តស្នេហានៅក្នុងកំណត់ហេតុនៃអតីតកាលនេះដូចជាខ្ញុំដែរ រឹតតែមិននឹកស្មានថានឹងទទួលបានសារលើកទឹកចិត្តដ៏រាប់មិនអស់ជាបន្តបន្ទាប់។', 12, '1'),
(65, 'កូនអុកសម្ងាត់', 'ម៉ុង ម៉ូលីនណា & រ៉េត​ សុដាវណ្ណ', 'novel', '1674733180995.jpg', '2023-01-26', 'អៃដា​ គឺជាក្មេងស្រីម្នាក់នៅក្នុងចំណោមមនុស្សជាច្រេីន​ ដែលមានសំណាងបានទទួលអាហារូបករណ៍ពី​ វិទ្យាល័យ​ចត្រង្គ​ ដែលជាសាលារៀនដ៏ល្បីល្បាញ​ និងបានជួយក្មេងៗជាច្រេីននាក់​ ឲ្យបានរៀនសូត្រដោយឥតគិតថ្លៃ។\r\n\r\nប៉ុន្តែច្បាប់វិន័យចម្លែកៗ​ រួមទាំងអាថ៌កំបាំងនៃការបាត់ខ្លួន​របស់មនុស្សជាច្រើន បានធ្វេីឲ្យអៃដាយល់ថា​ ទីនេះមិនមែនជាសាលាធម្មតានោះទេ ហើយក៏ប្រហែលជាសាលានេះបង្កើតឡើងដើម្បីគ្រាន់តែបំបាត់ភាពឯការបស់មនុស្សម្នាក់ផងក៏មិនដឹង….\r\n\r\nសាលាទូទៅចូលរៀនដោយបង់ប្រាក់ សាលាមួយនេះចូលរៀនដោយបង់ជីវិត។', 13, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bookaway`
--

DROP TABLE IF EXISTS `tbl_bookaway`;
CREATE TABLE IF NOT EXISTS `tbl_bookaway` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_borrower`
--

DROP TABLE IF EXISTS `tbl_borrower`;
CREATE TABLE IF NOT EXISTS `tbl_borrower` (
  `id` int NOT NULL AUTO_INCREMENT,
  `img` varchar(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_borrower`
--

INSERT INTO `tbl_borrower` (`id`, `img`, `title`, `author`, `category`, `username`, `date`, `time`) VALUES
(72, 'bB9GZopTDjDd2yLwvbSzBMIqDpOh3Ukx6TTWMyV3.jpeg', 'ផ្ទះកណ្តាលបឹង', 'Manith', 'novel', 'Yuth Marwin', '2023-01-26', '18:41:14'),
(62, '297998627-605205360961620-1503590801339764031-n.jpg', 'ផ្ទះកណ្តាលបឹងវគ្គ២', 'Manith', 'novel', 'Yuth Marwin', '2023-01-15', '12:47:00'),
(70, 'demon.jpg', 'Demon Slayer ', 'Koyoharu Gotouge', 'manga', 'Levi', '2023-01-24', '22:42:35'),
(73, '1674733180995.jpg', 'កូនអុកសម្ងាត់', 'ម៉ុង ម៉ូលីនណា & រ៉េត​ សុដាវណ្ណ', 'novel', 'Yuth Marwin', '2023-01-26', '18:41:22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

DROP TABLE IF EXISTS `tbl_feedback`;
CREATE TABLE IF NOT EXISTS `tbl_feedback` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `feedback` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`id`, `email`, `username`, `feedback`, `date`, `time`) VALUES
(19, 'Vin@gmail.com', 'Yuth Marwin', 'Hello Admin', '2023-01-13', '14:01:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

DROP TABLE IF EXISTS `tbl_member`;
CREATE TABLE IF NOT EXISTS `tbl_member` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `Contact` varchar(255) NOT NULL,
  `img` varchar(100) NOT NULL,
  `ordernum` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`id`, `name`, `position`, `address`, `Contact`, `img`, `ordernum`) VALUES
(19, 'Tek Vitu', 'Font-End & UX/UI (Register-Page)', 'Phnom Penh', 'Facebook,Telegram', 'Tu.jpg', 8),
(11, 'Yuth Marwin ', 'Font-End & Back-End (Overall)', 'Phnom Penh', 'Facebook,Telegram,Instagram', '1674711677162.jpg', 5),
(13, 'Prom Pheaktra', 'Font-End (Login-Page)', 'sihanoukville', 'Facebook,Telegram', 'Tra.jpg', 6),
(14, 'Krech Sokmean', 'Font-End (dashboard)', 'Kompot', 'Facebook', 'Sokmean.jpg', 7),
(23, 'Lar Tekmeng', 'Font-End', 'Phnom Penh', 'Facebook', '1675087060176.jpg', 9);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `email`, `username`, `password`) VALUES
(1, 'Vin@gmail.com', 'Yuth Marwin', '12345'),
(2, 'Levi@gmail.com', 'Levi', '54321');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
