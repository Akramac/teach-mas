-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2023 at 12:52 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yahia_mas_2`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `date_created`) VALUES
(1, 'maths', '1929816016board-g.png', '2023-01-15 11:15:01'),
(2, 'Physics', '838345172math-g.jpg', '2023-01-15 11:15:01'),
(3, 'Arabe', NULL, '2023-01-15 11:20:16'),
(4, 'history', NULL, '2023-01-19 15:17:33'),
(5, 'Geography', NULL, '2023-01-19 15:18:16'),
(6, 'english', NULL, '2023-01-19 15:27:46');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` int(121) NOT NULL,
  `title_exam` varchar(255) DEFAULT NULL,
  `duration_exam` varchar(255) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `categorie_id` int(11) DEFAULT NULL,
  `allow_screen_record` tinyint(4) DEFAULT NULL,
  `allow_camera_record` tinyint(4) DEFAULT NULL,
  `random_questions` tinyint(4) DEFAULT NULL,
  `no_remake_exam` tinyint(4) DEFAULT NULL,
  `show_results` tinyint(4) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `title_exam`, `duration_exam`, `teacher_id`, `categorie_id`, `allow_screen_record`, `allow_camera_record`, `random_questions`, `no_remake_exam`, `show_results`, `date_created`) VALUES
(1, ' test 033', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2023-01-15 11:21:28'),
(2, ' test 032', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2023-01-15 11:26:37'),
(3, ' test 031', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2023-01-15 11:33:08'),
(4, ' test 030', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2023-01-15 11:36:48'),
(5, ' test 03', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2023-01-15 11:38:45'),
(6, ' test 029', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2023-01-15 11:41:07'),
(7, ' test 028', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2023-01-15 11:41:27'),
(8, ' test 027', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2023-01-15 11:46:26'),
(9, ' test 025', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2023-01-15 11:46:48'),
(10, ' test  26', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2023-01-15 11:48:19'),
(11, ' test 025', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2023-01-15 11:49:29'),
(12, ' test 024', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2023-01-15 11:51:13'),
(13, ' test 021', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2023-01-15 11:56:16'),
(14, ' test 023', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2023-01-15 11:57:40'),
(15, ' test 044', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2023-01-15 11:58:38'),
(16, ' test 079', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2023-01-15 12:00:07'),
(17, ' test 080', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2023-01-15 12:04:46'),
(18, ' test 081', '00:00:00', NULL, 1, NULL, NULL, NULL, NULL, NULL, '2023-01-15 12:07:13'),
(19, ' test 082', NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, '2023-01-15 12:16:39'),
(20, ' test 083', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, '2023-01-15 17:15:28'),
(21, ' test 084', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, '2023-01-18 10:15:06'),
(22, ' test 085', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, '2023-01-18 13:22:48'),
(23, ' test 086', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, '2023-01-19 09:39:38'),
(24, ' test 087', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, '2023-01-19 09:40:51'),
(25, ' test 088', NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, '2023-01-19 09:43:02'),
(26, ' test 089', NULL, 2, 2, NULL, NULL, NULL, NULL, NULL, '2023-01-19 11:30:36'),
(27, ' test 090', NULL, 2, 2, NULL, NULL, NULL, NULL, NULL, '2023-01-19 14:27:17'),
(28, 'test 091', NULL, 2, 2, NULL, NULL, NULL, NULL, NULL, '2023-01-19 14:43:28'),
(29, 'tdsts', NULL, 2, 2, NULL, NULL, NULL, NULL, NULL, '2023-01-19 16:06:02'),
(30, 'eaze', NULL, 2, 4, NULL, NULL, NULL, NULL, NULL, '2023-01-19 16:11:05'),
(31, 'test remove add', NULL, 2, 2, NULL, NULL, NULL, NULL, NULL, '2023-01-20 10:19:20'),
(32, 'test 2 remove add ', NULL, 2, 2, NULL, NULL, NULL, NULL, NULL, '2023-01-20 10:20:55'),
(33, 'test multi', NULL, 2, 2, NULL, NULL, NULL, NULL, NULL, '2023-01-20 11:00:26'),
(34, 'test tawsil', NULL, 2, 2, NULL, NULL, NULL, NULL, NULL, '2023-01-20 11:29:29'),
(35, 'tes t10', NULL, 2, 2, NULL, NULL, NULL, NULL, NULL, '2023-01-20 11:37:48'),
(36, 'test tartib', NULL, 2, 3, NULL, NULL, NULL, NULL, NULL, '2023-01-20 14:57:35'),
(37, 'ets tdeux', NULL, 2, 3, NULL, NULL, NULL, NULL, NULL, '2023-01-20 15:28:33'),
(38, 'test points', NULL, 2, 3, NULL, NULL, NULL, NULL, NULL, '2023-01-22 13:38:32'),
(39, 'quesuqsdu', NULL, 2, 3, NULL, NULL, NULL, NULL, NULL, '2023-01-22 13:40:28'),
(40, 'test points', NULL, 2, 4, NULL, NULL, NULL, NULL, NULL, '2023-01-22 13:41:20'),
(41, 'azetygd', NULL, 2, 3, NULL, NULL, NULL, NULL, NULL, '2023-01-22 13:44:19'),
(42, 'AZEAZE', NULL, 2, 3, NULL, NULL, NULL, NULL, NULL, '2023-01-22 13:45:07'),
(43, 'BV', NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, '2023-01-22 13:46:55'),
(44, 'excam 2', NULL, 2, 4, NULL, NULL, NULL, NULL, NULL, '2023-01-22 14:02:06'),
(45, 'exal pooa', '00:00:00', 2, 2, NULL, NULL, 1, NULL, NULL, '2023-01-22 14:49:33'),
(46, 'test correction', NULL, 2, 3, NULL, NULL, NULL, NULL, NULL, '2023-01-23 09:20:40'),
(47, 'etst notes', NULL, 2, 2, NULL, NULL, NULL, NULL, NULL, '2023-01-23 11:18:46'),
(48, 'etst order points', NULL, 2, 4, NULL, NULL, NULL, NULL, NULL, '2023-01-23 11:39:53'),
(49, 'exam 2', NULL, 2, 3, NULL, NULL, NULL, NULL, NULL, '2023-01-23 18:58:54'),
(50, 'zaee', NULL, 2, 2, NULL, NULL, NULL, NULL, NULL, '2023-01-23 19:01:08'),
(51, 'aze', NULL, 3, 2, NULL, NULL, NULL, NULL, NULL, '2023-01-23 23:10:07'),
(52, 'test video', '00:15:00', 3, 2, NULL, NULL, NULL, NULL, NULL, '2023-01-24 11:22:08'),
(53, 'exam duration', '00:00:00', 3, 2, NULL, NULL, NULL, NULL, NULL, '2023-01-24 11:56:03'),
(54, 'test time', '00:00:00', 3, 3, NULL, NULL, NULL, NULL, NULL, '2023-01-24 15:17:43'),
(55, 'etst iframe', '00:00:00', 3, 3, NULL, NULL, NULL, NULL, NULL, '2023-01-25 18:44:47'),
(56, 'tesstst', '00:15:00', 3, 2, NULL, NULL, NULL, NULL, NULL, '2023-01-26 14:27:06'),
(57, 'fsd', '00:00:00', 3, 2, NULL, NULL, NULL, NULL, NULL, '2023-01-26 14:28:31'),
(58, 'test spanan', '00:15:00', 3, 2, NULL, NULL, NULL, NULL, NULL, '2023-01-26 14:49:17'),
(59, 'test drag words', '00:15:00', 3, 1, NULL, NULL, NULL, NULL, NULL, '2023-01-27 11:04:32'),
(60, 'test drag words', '00:15:00', 3, 2, NULL, NULL, NULL, NULL, NULL, '2023-01-27 11:06:52'),
(61, 'test ddrag', '00:15:00', 3, 2, NULL, NULL, NULL, NULL, NULL, '2023-01-27 11:11:30'),
(62, 'teste wwword drag', '00:15:00', 3, 3, NULL, NULL, NULL, NULL, NULL, '2023-01-27 11:14:52'),
(63, 'test math', '00:15:00', 3, 1, NULL, NULL, NULL, NULL, NULL, '2023-01-27 15:50:39'),
(64, 'test maths equa', '00:15:00', 3, 1, NULL, NULL, NULL, NULL, NULL, '2023-01-27 21:16:17'),
(65, 'test words', '00:15:00', 3, 2, NULL, 1, NULL, NULL, NULL, '2023-01-27 21:28:43'),
(66, 'test random', '00:15:00', 3, 1, 1, 0, 1, NULL, NULL, '2023-01-30 11:03:31'),
(67, 'eaze', '00:15:00', 3, 3, 1, 0, 1, NULL, NULL, '2023-01-30 11:04:41'),
(68, 'fdsf', '00:15:00', 3, 2, 1, 0, 0, NULL, NULL, '2023-01-30 11:09:29'),
(69, 'شسي', '00:15:00', 3, 2, 1, 0, 1, NULL, NULL, '2023-01-30 14:18:24'),
(70, 'aze', '00:15:00', 3, 3, 1, 0, 0, NULL, NULL, '2023-01-30 14:23:28'),
(71, 'aze', '00:15:00', 3, 3, 1, 0, 0, NULL, NULL, '2023-01-30 14:23:43'),
(72, 'aze', '00:15:00', 3, 3, 1, 0, 0, NULL, NULL, '2023-01-30 14:54:54'),
(73, 'aze', '00:15:00', 3, 3, 1, 0, 0, NULL, NULL, '2023-01-30 14:54:58'),
(74, 'test arabica', '00:15:00', 3, 3, 1, 0, 0, NULL, NULL, '2023-01-30 15:01:36'),
(75, 'test arabica', '00:15:00', 3, 3, 1, 0, 0, NULL, NULL, '2023-01-30 15:01:57'),
(76, 'etst arabicaaa', '00:15:00', 3, 3, 0, 0, 0, NULL, NULL, '2023-01-30 17:00:47'),
(77, 'test araboic', '00:15:00', 3, 3, 0, 0, 0, NULL, NULL, '2023-01-30 18:23:07'),
(78, 'tesst arc', '00:15:00', 3, 3, 0, 0, 0, NULL, 1, '2023-01-30 18:27:48'),
(79, 'test retake exam', '00:15:00', 3, 2, 1, 0, 0, 1, NULL, '2023-01-31 09:56:01'),
(80, 'test hash', '00:14:00', 3, 2, 1, 0, 0, 0, NULL, '2023-01-31 13:05:57'),
(81, ' test 081', '00:00:00', 3, 1, 1, 0, 1, 0, NULL, '2023-02-03 16:26:50'),
(82, ' test 081', '00:00:00', 3, 1, 0, 0, 0, 0, NULL, '2023-02-03 16:33:27'),
(83, ' test 081', '00:00:00', 3, 1, 1, 0, 1, 0, NULL, '2023-02-03 16:38:58'),
(84, ' test 081', '00:00:00', 3, 1, 1, 0, 1, 0, NULL, '2023-02-03 16:57:51'),
(85, 'test time picker', '00:15:00', 3, 4, 0, 0, 1, 0, NULL, '2023-02-04 13:21:12'),
(86, 'test time', '00:09:18', 3, 4, 0, 0, 1, 0, NULL, '2023-02-04 13:23:08'),
(87, 'etststs', '03:15:00', 3, 1, 0, 0, 1, 0, NULL, '2023-02-04 13:26:55'),
(88, 'test Minutes each', '00:00:00', 3, 1, 0, 0, 1, 0, NULL, '2023-02-04 13:29:31'),
(89, 'tes studen t id', '00:05:06', 3, 2, 0, 0, 1, 0, NULL, '2023-02-04 13:54:51'),
(90, 'test upload', '00:15:00', 3, 2, 0, 0, 0, 0, NULL, '2023-02-07 14:54:56'),
(91, 'tes no specific to db', '00:00:00', 3, 2, 0, 0, 1, 0, NULL, '2023-02-08 14:52:20'),
(92, 'test specific time no', '00:00:00', 3, 2, 0, 0, 1, 0, NULL, '2023-02-08 14:54:13'),
(93, 'test no specific time', '00:00:00', 3, 3, 0, 0, 1, 0, NULL, '2023-02-08 14:55:46'),
(94, 'test no specification', '00:00:00', 3, 3, 0, 0, 0, 0, NULL, '2023-02-08 16:44:40'),
(95, 'test bug', '00:00:00', 3, 2, 0, 0, 1, 0, NULL, '2023-02-14 14:45:14'),
(96, 'test no retake', '00:02:00', 3, 1, 0, 0, 0, 1, NULL, '2023-02-17 15:18:36'),
(97, 'test edit', '00:15:00', 3, 2, 0, 0, 1, 0, NULL, '2023-02-20 16:10:02'),
(98, 'test canva', '00:15:00', 3, 1, 0, 0, 0, 0, NULL, '2023-02-23 10:27:09'),
(99, 'test canava 2', '00:15:00', 3, 1, 0, 0, 0, 0, NULL, '2023-02-23 11:16:36'),
(100, 'test 3 draw canva', '00:15:00', 3, 1, 0, 0, 0, 0, NULL, '2023-02-23 11:50:04');

-- --------------------------------------------------------

--
-- Table structure for table `exams_teachers_junction`
--

CREATE TABLE `exams_teachers_junction` (
  `teacher_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exams_teachers_junction`
--

INSERT INTO `exams_teachers_junction` (`teacher_id`, `exam_id`) VALUES
(2, 7),
(1, 20),
(2, 20),
(1, 26),
(2, 26),
(2, 27),
(2, 28),
(2, 29),
(2, 30),
(2, 31),
(2, 32),
(2, 33),
(2, 34),
(2, 35),
(2, 36),
(2, 37),
(2, 38),
(2, 39),
(2, 40),
(2, 41),
(2, 42),
(2, 43),
(2, 44),
(2, 45),
(2, 46),
(2, 47),
(2, 48),
(2, 49),
(2, 50),
(3, 51),
(3, 52),
(3, 53),
(3, 54),
(3, 55),
(3, 56),
(3, 57),
(3, 58),
(3, 59),
(3, 60),
(3, 61),
(3, 62),
(3, 63),
(3, 64),
(3, 65),
(3, 66),
(3, 67),
(3, 68),
(3, 69),
(3, 70),
(3, 71),
(3, 72),
(3, 73),
(3, 74),
(3, 75),
(3, 76),
(3, 77),
(3, 78),
(3, 79),
(3, 80),
(3, 81),
(3, 82),
(3, 83),
(3, 84),
(3, 85),
(3, 86),
(3, 87),
(3, 88),
(3, 89),
(3, 90),
(3, 91),
(3, 92),
(3, 93),
(3, 94),
(3, 95),
(3, 96),
(3, 97),
(3, 98),
(3, 99),
(3, 100);

-- --------------------------------------------------------

--
-- Table structure for table `exam_quest_long_text_junction`
--

CREATE TABLE `exam_quest_long_text_junction` (
  `exam_id` int(11) NOT NULL,
  `quest_long_text_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_quest_long_text_junction`
--

INSERT INTO `exam_quest_long_text_junction` (`exam_id`, `quest_long_text_id`) VALUES
(5, 6),
(17, 7),
(18, 8),
(20, 9),
(21, 10),
(38, 11),
(40, 12),
(42, 13),
(42, 14),
(43, 15),
(43, 16),
(44, 17),
(44, 18),
(45, 19),
(49, 20),
(53, 21),
(54, 22),
(81, 23),
(81, 24),
(91, 25),
(94, 26),
(94, 27),
(96, 28);

-- --------------------------------------------------------

--
-- Table structure for table `exam_quest_multi_junction`
--

CREATE TABLE `exam_quest_multi_junction` (
  `exam_id` int(11) NOT NULL,
  `quest_multi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_quest_multi_junction`
--

INSERT INTO `exam_quest_multi_junction` (`exam_id`, `quest_multi_id`) VALUES
(2, 26),
(3, 27),
(4, 28),
(6, 29),
(6, 30),
(7, 31),
(7, 32),
(8, 33),
(8, 34),
(9, 35),
(10, 36),
(10, 37),
(11, 38),
(11, 39),
(12, 40),
(12, 41),
(17, 46),
(18, 47),
(19, 48),
(19, 49),
(20, 50),
(21, 51),
(22, 52),
(24, 53),
(25, 54),
(26, 55),
(27, 56),
(28, 57),
(29, 58),
(29, 59),
(30, 60),
(31, 61),
(32, 62),
(33, 63),
(33, 64),
(35, 65),
(36, 66),
(38, 67),
(40, 69),
(41, 70),
(42, 71),
(43, 72),
(44, 73),
(44, 74),
(45, 68),
(46, 75),
(46, 76),
(49, 77),
(50, 78),
(51, 79),
(52, 80),
(53, 81),
(54, 82),
(54, 83),
(55, 84),
(56, 85),
(63, 86),
(64, 87),
(66, 88),
(67, 89),
(68, 90),
(79, 91),
(80, 92),
(81, 93),
(81, 97),
(82, 94),
(83, 95),
(84, 96),
(85, 98),
(86, 99),
(87, 100),
(88, 101),
(89, 102),
(90, 103),
(91, 104),
(94, 105),
(98, 106),
(99, 107),
(100, 108);

-- --------------------------------------------------------

--
-- Table structure for table `exam_quest_span_junction`
--

CREATE TABLE `exam_quest_span_junction` (
  `exam_id` int(11) NOT NULL,
  `quest_span_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_quest_span_junction`
--

INSERT INTO `exam_quest_span_junction` (`exam_id`, `quest_span_id`) VALUES
(56, 1),
(57, 2),
(58, 3),
(59, 4),
(60, 5),
(61, 6),
(62, 7),
(65, 8),
(69, 9),
(76, 11),
(77, 12),
(78, 13),
(81, 14),
(81, 18),
(82, 15),
(83, 16),
(84, 17),
(95, 19),
(97, 20);

-- --------------------------------------------------------

--
-- Table structure for table `exam_quest_tartib_junction`
--

CREATE TABLE `exam_quest_tartib_junction` (
  `exam_id` int(11) NOT NULL,
  `quest_tartib_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_quest_tartib_junction`
--

INSERT INTO `exam_quest_tartib_junction` (`exam_id`, `quest_tartib_id`) VALUES
(18, 4),
(19, 5),
(21, 6),
(35, 7),
(36, 8),
(37, 9),
(37, 10),
(38, 11),
(48, 12),
(48, 13),
(50, 14),
(51, 15),
(54, 16),
(81, 17),
(81, 21),
(81, 22),
(82, 18),
(83, 19),
(84, 20),
(94, 23);

-- --------------------------------------------------------

--
-- Table structure for table `exam_quest_tawsil_junction`
--

CREATE TABLE `exam_quest_tawsil_junction` (
  `exam_id` int(11) NOT NULL,
  `quest_tawsil_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_quest_tawsil_junction`
--

INSERT INTO `exam_quest_tawsil_junction` (`exam_id`, `quest_tawsil_id`) VALUES
(17, 18),
(18, 19),
(19, 20),
(21, 21),
(28, 22),
(34, 23),
(35, 24),
(38, 25),
(47, 26),
(47, 27),
(49, 28),
(54, 29),
(81, 30),
(82, 31),
(83, 32),
(84, 33);

-- --------------------------------------------------------

--
-- Table structure for table `footer`
--

CREATE TABLE `footer` (
  `id` int(11) NOT NULL,
  `title_1` varchar(255) DEFAULT NULL,
  `title_2` varchar(255) DEFAULT NULL,
  `title_3` varchar(255) DEFAULT NULL,
  `title_4` varchar(255) DEFAULT NULL,
  `sub_1_title_1` varchar(255) DEFAULT NULL,
  `sub_1_title_2` varchar(255) DEFAULT NULL,
  `sub_1_title_3` varchar(255) DEFAULT NULL,
  `sub_2_title_1` varchar(255) DEFAULT NULL,
  `sub_2_title_2` varchar(255) DEFAULT NULL,
  `sub_2_title_3` varchar(255) DEFAULT NULL,
  `sub_3_title_1` varchar(255) DEFAULT NULL,
  `sub_3_title_2` varchar(255) DEFAULT NULL,
  `sub_3_title_3` varchar(255) DEFAULT NULL,
  `sub_4_title_1` varchar(255) DEFAULT NULL,
  `sub_4_title_2` varchar(255) DEFAULT NULL,
  `sub_4_title_3` varchar(255) DEFAULT NULL,
  `url_1_title_1` varchar(255) DEFAULT NULL,
  `url_1_title_2` varchar(255) DEFAULT NULL,
  `url_1_title_3` varchar(255) DEFAULT NULL,
  `url_2_title_1` varchar(255) DEFAULT NULL,
  `url_2_title_2` varchar(255) DEFAULT NULL,
  `url_2_title_3` varchar(255) DEFAULT NULL,
  `url_3_title_1` varchar(255) DEFAULT NULL,
  `url_3_title_2` varchar(255) DEFAULT NULL,
  `url_3_title_3` varchar(255) DEFAULT NULL,
  `url_4_title_1` varchar(255) DEFAULT NULL,
  `url_4_title_2` varchar(255) DEFAULT NULL,
  `url_4_title_3` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `footer`
--

INSERT INTO `footer` (`id`, `title_1`, `title_2`, `title_3`, `title_4`, `sub_1_title_1`, `sub_1_title_2`, `sub_1_title_3`, `sub_2_title_1`, `sub_2_title_2`, `sub_2_title_3`, `sub_3_title_1`, `sub_3_title_2`, `sub_3_title_3`, `sub_4_title_1`, `sub_4_title_2`, `sub_4_title_3`, `url_1_title_1`, `url_1_title_2`, `url_1_title_3`, `url_2_title_1`, `url_2_title_2`, `url_2_title_3`, `url_3_title_1`, `url_3_title_2`, `url_3_title_3`, `url_4_title_1`, `url_4_title_2`, `url_4_title_3`) VALUES
(1, 'Browse by', 'Quick links', 'Infos', 'Customer service', 'Exam', 'Teacher', 'Year', 'site', 'Location', 'FAQ', 'FAQ', 'History', '', 'Support', 'Help Center', 'Contact us', '', '', '', '', '', '', '', '', '', '/blog', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `hash_url_exam`
--

CREATE TABLE `hash_url_exam` (
  `id` int(121) NOT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `exam_id` int(11) DEFAULT NULL,
  `student_id` varchar(255) DEFAULT NULL,
  `hash` varchar(255) DEFAULT NULL,
  `used_once_by_student` tinyint(4) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hash_url_exam`
--

INSERT INTO `hash_url_exam` (`id`, `teacher_id`, `exam_id`, `student_id`, `hash`, `used_once_by_student`, `date_created`) VALUES
(1, 3, 80, NULL, '276304430', 1, '2023-01-31 13:05:57'),
(2, 3, 81, NULL, '2070031713', NULL, '2023-02-03 16:26:51'),
(3, 3, 82, NULL, '672486520', NULL, '2023-02-03 16:33:27'),
(4, 3, 83, NULL, '1945676718', 1, '2023-02-03 16:38:58'),
(5, 3, 84, NULL, '155965971', NULL, '2023-02-03 16:57:51'),
(6, 3, 81, NULL, '844676597', 1, '2023-02-03 16:59:50'),
(7, 3, 81, NULL, '382603119', 1, '2023-02-03 17:02:57'),
(8, 3, 81, NULL, '1967590201', 1, '2023-02-03 17:12:35'),
(9, 3, 81, NULL, '882140231', 1, '2023-02-03 17:15:39'),
(10, 3, 81, NULL, '64622994', 1, '2023-02-03 17:34:51'),
(11, 3, 81, NULL, '1486404502', NULL, '2023-02-03 17:43:05'),
(12, 3, 81, NULL, '984973237', NULL, '2023-02-03 17:48:49'),
(13, 3, 81, NULL, '803265971', NULL, '2023-02-03 17:53:34'),
(14, 3, 81, NULL, '515988224', NULL, '2023-02-04 12:36:04'),
(15, 3, 81, NULL, '536188382', NULL, '2023-02-04 12:44:16'),
(16, 3, 85, NULL, '1356329205', NULL, '2023-02-04 13:21:12'),
(17, 3, 86, NULL, '465675979', NULL, '2023-02-04 13:23:08'),
(18, 3, 87, NULL, '552421674', NULL, '2023-02-04 13:26:55'),
(19, 3, 88, NULL, '728552121', NULL, '2023-02-04 13:29:31'),
(20, 3, 88, NULL, '1800854882', NULL, '2023-02-04 13:29:50'),
(21, 3, 88, NULL, '1175711945', NULL, '2023-02-04 13:35:48'),
(22, 3, 89, '3;2', '1759207268', 1, '2023-02-04 13:54:51'),
(23, 3, 89, '2;2', '1866501553', 1, '2023-02-04 13:59:37'),
(24, 3, 90, NULL, '1102453141', NULL, '2023-02-07 14:54:56'),
(25, 3, 90, NULL, '1593053213', NULL, '2023-02-07 15:15:20'),
(26, 3, 90, NULL, '1152889207', NULL, '2023-02-07 15:16:19'),
(27, 3, 90, NULL, '1920089866', NULL, '2023-02-07 15:20:05'),
(28, 3, 90, '3', '1694054948', 1, '2023-02-07 15:21:57'),
(29, 3, 90, NULL, '1716401232', NULL, '2023-02-07 15:53:30'),
(30, 3, 90, NULL, '989697044', NULL, '2023-02-07 15:56:15'),
(31, 3, 90, NULL, '936857824', NULL, '2023-02-07 15:57:16'),
(32, 3, 90, NULL, '613466670', NULL, '2023-02-07 15:58:04'),
(33, 3, 90, NULL, '1406822694', NULL, '2023-02-07 16:00:50'),
(34, 3, 90, NULL, '1107189950', NULL, '2023-02-07 16:03:03'),
(35, 3, 90, NULL, '2141430537', NULL, '2023-02-07 16:03:32'),
(36, 3, 90, NULL, '233930502', NULL, '2023-02-07 16:05:34'),
(37, 3, 90, NULL, '1976779172', NULL, '2023-02-07 16:06:32'),
(38, 3, 90, NULL, '1643547816', NULL, '2023-02-07 16:07:06'),
(39, 3, 90, NULL, '436719860', NULL, '2023-02-07 16:07:52'),
(40, 3, 90, NULL, '667451650', NULL, '2023-02-07 16:11:27'),
(41, 3, 90, NULL, '422891396', NULL, '2023-02-07 16:13:13'),
(42, 3, 90, NULL, '805899864', NULL, '2023-02-07 16:14:10'),
(43, 3, 90, NULL, '326343316', NULL, '2023-02-07 16:15:36'),
(44, 3, 90, NULL, '621558121', NULL, '2023-02-07 16:16:13'),
(45, 3, 91, NULL, '537133961', NULL, '2023-02-08 14:52:20'),
(46, 3, 94, NULL, '1817036851', NULL, '2023-02-08 16:44:41'),
(47, 3, 94, NULL, '2023681548', NULL, '2023-02-08 16:45:54'),
(48, 3, 94, NULL, '1079458371', NULL, '2023-02-08 16:47:57'),
(49, 3, 94, NULL, '745341351', NULL, '2023-02-08 16:50:33'),
(50, 3, 94, NULL, '1194456815', NULL, '2023-02-08 16:52:13'),
(51, 3, 94, '3', '1439648627', 1, '2023-02-08 17:17:20'),
(52, 3, 94, NULL, '152025458', NULL, '2023-02-08 17:23:11'),
(53, 3, 94, NULL, '1357453907', NULL, '2023-02-08 17:32:16'),
(54, 3, 94, NULL, '208685310', NULL, '2023-02-08 17:39:08'),
(55, 3, 94, '2', '928815351', 1, '2023-02-09 13:21:54'),
(56, 3, 94, NULL, '829408015', NULL, '2023-02-10 12:22:38'),
(57, 3, 94, NULL, '1744376279', NULL, '2023-02-10 12:23:58'),
(58, 3, 94, NULL, '1293077010', NULL, '2023-02-10 12:24:44'),
(59, 3, 94, NULL, '1317245296', NULL, '2023-02-10 12:25:21'),
(60, 3, 94, NULL, '599232140', NULL, '2023-02-10 12:26:02'),
(61, 3, 95, '3', '830091766', 1, '2023-02-14 14:45:14'),
(62, 3, 95, NULL, '1063386682', NULL, '2023-02-14 14:46:08'),
(63, 3, 96, '3', '1437708834', 1, '2023-02-17 15:18:36'),
(64, 3, 97, '3', '933405722', 1, '2023-02-20 16:10:02'),
(65, 3, 97, NULL, '1516160748', NULL, '2023-02-20 16:33:28'),
(66, 3, 97, NULL, '1344925899', NULL, '2023-02-20 16:52:06'),
(67, 3, 97, NULL, '691564070', NULL, '2023-02-20 17:06:16'),
(68, 3, 97, NULL, '1031368709', NULL, '2023-02-20 17:53:52'),
(69, 3, 97, NULL, '536719789', NULL, '2023-02-20 17:56:52'),
(70, 3, 97, NULL, '1183446520', NULL, '2023-02-20 17:57:33'),
(71, 3, 97, NULL, '1247690553', NULL, '2023-02-20 17:58:10'),
(72, 3, 97, NULL, '1111427895', NULL, '2023-02-20 17:59:59'),
(73, 3, 97, NULL, '1105513447', NULL, '2023-02-20 18:02:45'),
(74, 3, 97, NULL, '1707888097', NULL, '2023-02-21 10:08:29'),
(75, 3, 97, NULL, '543469366', NULL, '2023-02-21 10:54:08'),
(76, 3, 97, NULL, '1600020109', NULL, '2023-02-21 11:45:02'),
(77, 3, 97, NULL, '1376243193', NULL, '2023-02-21 11:46:08'),
(78, 3, 97, NULL, '220626899', NULL, '2023-02-21 12:28:31'),
(79, 3, 97, NULL, '424247412', NULL, '2023-02-21 12:31:19'),
(80, 3, 97, NULL, '1349953376', NULL, '2023-02-21 12:40:29'),
(81, 3, 97, NULL, '1276302887', NULL, '2023-02-22 11:52:31'),
(82, 3, 98, NULL, '561717079', NULL, '2023-02-23 10:27:09'),
(83, 3, 99, '3', '1479874938', 1, '2023-02-23 11:16:36'),
(84, 3, 100, '3', '796937717', 1, '2023-02-23 11:50:04');

-- --------------------------------------------------------

--
-- Table structure for table `home_page`
--

CREATE TABLE `home_page` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image_1` varchar(255) DEFAULT NULL,
  `image_2` varchar(255) DEFAULT NULL,
  `image_3` varchar(255) DEFAULT NULL,
  `image_4` varchar(255) DEFAULT NULL,
  `image_5` varchar(255) DEFAULT NULL,
  `image_6` varchar(255) DEFAULT NULL,
  `image_7` varchar(255) DEFAULT NULL,
  `image_8` varchar(255) DEFAULT NULL,
  `image_9` varchar(255) DEFAULT NULL,
  `image_10` varchar(255) DEFAULT NULL,
  `image_11` varchar(255) DEFAULT NULL,
  `image_12` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `home_page`
--

INSERT INTO `home_page` (`id`, `title`, `image_1`, `image_2`, `image_3`, `image_4`, `image_5`, `image_6`, `image_7`, `image_8`, `image_9`, `image_10`, `image_11`, `image_12`, `url`, `created_at`) VALUES
(1, 'insta', '1541058319board-g.png', NULL, NULL, '316333552data-upload-t.jpg', NULL, '744760891math-g.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-14 11:28:26');

-- --------------------------------------------------------

--
-- Table structure for table `question_long_text`
--

CREATE TABLE `question_long_text` (
  `id` int(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `no_specific_time` tinyint(4) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `correct_long_text` varchar(255) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `file_url` varchar(255) DEFAULT NULL,
  `points` int(20) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question_long_text`
--

INSERT INTO `question_long_text` (`id`, `user_id`, `no_specific_time`, `title`, `correct_long_text`, `duration`, `file_url`, `points`, `image`, `date_created`) VALUES
(1, 6, NULL, 'eaze', NULL, '00:28', 'assesment.png', NULL, NULL, '2023-01-13 19:25:31'),
(2, 6, NULL, 'azeaze', NULL, '05:03', '58_Admin.jpg', NULL, NULL, '2023-01-14 12:03:18'),
(3, 6, NULL, 'zae', NULL, '02:18', '5-stars.png', NULL, NULL, '2023-01-14 12:18:37'),
(4, 6, NULL, 'aaa', NULL, '21:48', 'earnS_missFortune.png', NULL, NULL, '2023-01-14 17:49:11'),
(5, 6, NULL, 'bbbb', NULL, '21:49', 'ftp.png', NULL, NULL, '2023-01-14 17:49:11'),
(6, 6, NULL, 'aaaa', NULL, '02:38', 'ftp.png', NULL, NULL, '2023-01-15 11:38:45'),
(7, 6, NULL, 'zaeaz', NULL, '05:03', '', NULL, NULL, '2023-01-15 12:04:46'),
(8, 6, NULL, 'aze', 'correct an', '05:06', 'fisher type of game.PNG', 4, NULL, '2023-01-15 12:07:13'),
(9, 6, NULL, 'tartib', NULL, '00:16', 'data-upload-t.jpg', NULL, NULL, '2023-01-15 12:16:39'),
(10, 6, NULL, 'tartiba', NULL, '06:14', '', NULL, NULL, '2023-01-18 10:15:06'),
(11, 19, NULL, 'quest 4', NULL, '00:05:00', '', 7, NULL, '2023-01-22 13:38:35'),
(12, 19, NULL, 'qsd', NULL, '00:05:00', '', 2, NULL, '2023-01-22 13:41:20'),
(13, 19, NULL, 'DFSSDF', NULL, '00:05:00', '', 8, NULL, '2023-01-22 13:45:08'),
(14, 19, NULL, 'SUEE 23', NULL, '00:05:00', '', 5, NULL, '2023-01-22 13:45:08'),
(15, 19, NULL, 'FDSFS', NULL, '00:05:00', '', 4, NULL, '2023-01-22 13:46:56'),
(16, 19, NULL, 'VCXV', NULL, '00:05:00', '', 1, NULL, '2023-01-22 13:46:56'),
(17, 19, NULL, 'quest 2', NULL, '00:05:00', 'Allure box.PNG', 2, NULL, '2023-01-22 14:02:09'),
(18, 19, NULL, 'quest 3', 'correct by teacher', '00:05:00', 'hzdith.PNG', 3, NULL, '2023-01-22 14:02:09'),
(19, 19, NULL, 'quest long 1', 'corect by teacher', '00:10:00', 'hzdith.PNG', 20, NULL, '2023-01-22 14:49:33'),
(20, 19, NULL, 'qsdqs', 'corect by teacher', '00:00:00', '', 12, NULL, '2023-01-23 18:58:54'),
(21, 20, NULL, 'quest 22', 'corect by teacher', '00:19:00', '', 5, NULL, '2023-01-24 11:56:03'),
(22, 20, NULL, 'qus 3', 'zer', '00:01:00', '', 5, NULL, '2023-01-24 15:17:44'),
(23, 20, NULL, 'quest 6 poi 6', 'corrrectly', '00:17:00', NULL, 4, NULL, '2023-02-03 17:34:51'),
(24, 20, NULL, 'quest 9 poi 11', 'test correct', '00:03:00', '', 3, NULL, '2023-02-03 17:53:34'),
(25, 20, NULL, 'quest 2', 'corect by teacher', '00:05:00', 'data-upload-t.jpg', 5, NULL, '2023-02-08 14:52:20'),
(26, 4, 1, 'quest 2', 'corect by teacher', '00:02:02', NULL, 5, '27052790Draw.png', '2023-02-08 16:44:40'),
(27, 4, NULL, 'quest 4 long', 'corrct', '00:04:00', NULL, 3, '951094521etagere cuisine phone.jpg', '2023-02-10 12:26:02'),
(28, 20, NULL, 'quest 1', 'corect by teacher', '00:00:00', '', 3, NULL, '2023-02-17 15:18:36');

-- --------------------------------------------------------

--
-- Table structure for table `question_multi_choice`
--

CREATE TABLE `question_multi_choice` (
  `id` int(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `is_single_choice` tinyint(1) DEFAULT NULL,
  `no_specific_time` tinyint(4) DEFAULT NULL,
  `option_1` varchar(255) DEFAULT NULL,
  `correct_option_1` varchar(255) DEFAULT NULL,
  `option_2` varchar(255) DEFAULT NULL,
  `correct_option_2` varchar(255) DEFAULT NULL,
  `option_3` varchar(255) DEFAULT NULL,
  `correct_option_3` varchar(255) DEFAULT NULL,
  `option_4` varchar(255) DEFAULT NULL,
  `correct_option_4` varchar(255) DEFAULT NULL,
  `option_5` varchar(255) DEFAULT NULL,
  `correct_option_5` varchar(255) DEFAULT NULL,
  `option_6` varchar(255) DEFAULT NULL,
  `correct_option_6` varchar(255) DEFAULT NULL,
  `file_url` varchar(255) DEFAULT NULL,
  `points` int(20) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `data_file` longtext DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question_multi_choice`
--

INSERT INTO `question_multi_choice` (`id`, `user_id`, `title`, `duration`, `is_single_choice`, `no_specific_time`, `option_1`, `correct_option_1`, `option_2`, `correct_option_2`, `option_3`, `correct_option_3`, `option_4`, `correct_option_4`, `option_5`, `correct_option_5`, `option_6`, `correct_option_6`, `file_url`, `points`, `image`, `data_file`, `date_created`) VALUES
(3, 6, 'azeae', '00:47', 1, NULL, 'aze', NULL, 'eaz', NULL, 'ea', NULL, 'eza', NULL, NULL, NULL, NULL, NULL, 'assesment.png', NULL, NULL, NULL, '2023-01-13 19:49:19'),
(4, 6, 'rezr', '00:50', 0, NULL, 'erz', NULL, 'zerr', NULL, 'z', NULL, 'rze', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '2023-01-13 19:50:13'),
(5, 6, 'fds', '01:53', 0, NULL, 'fds', NULL, 'fdsf', NULL, 'dsf', NULL, 'fsdf', NULL, NULL, NULL, NULL, NULL, '58_Admin.jpg', NULL, NULL, NULL, '2023-01-13 19:53:14'),
(6, 6, 'azeaze', '05:03', 1, NULL, 'aze', NULL, 'ezae', NULL, 'zaea', NULL, 'zae', NULL, NULL, NULL, NULL, NULL, '58_Admin.jpg', NULL, NULL, NULL, '2023-01-14 12:03:18'),
(7, 6, 'zae', '02:18', 0, NULL, 'aze', NULL, 'eza', NULL, 'eaz', NULL, 'eaz', NULL, NULL, NULL, NULL, NULL, '5-stars.png', NULL, NULL, NULL, '2023-01-14 12:18:37'),
(8, 6, 'ezae', '03:03', 1, NULL, 'azeaez', NULL, 'eaz', NULL, 'eaze', NULL, 'ezae', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '2023-01-14 13:03:31'),
(9, 6, 'azeaze', '08:12', 1, NULL, 'zae', NULL, 'eaz', NULL, 'ezae', NULL, 'eaz', NULL, NULL, NULL, NULL, NULL, 'emec_expo.jpg', NULL, NULL, NULL, '2023-01-14 13:13:02'),
(10, 6, 'zae', '03:14', 1, NULL, 'aea', NULL, 'azeaze', NULL, 'qsd', NULL, 'gfdg', NULL, NULL, NULL, NULL, NULL, 'emec_expo.jpg', NULL, NULL, NULL, '2023-01-14 13:14:54'),
(11, 6, 'fdsf', '19:36', 1, NULL, 'eaze', NULL, 'eaz', NULL, 'eza', NULL, 'ez', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '2023-01-14 16:37:23'),
(12, 6, 'second input ', '07:38', 0, NULL, 'aze', NULL, 'eza', NULL, 'eaz', NULL, 'eaz', NULL, NULL, NULL, NULL, NULL, 'fisher type of game.PNG', NULL, NULL, NULL, '2023-01-14 16:38:42'),
(13, 6, 'second title', '07:43', 0, NULL, 'second ', NULL, 'second ', NULL, 'second ', NULL, 'second ', NULL, NULL, NULL, NULL, NULL, 'fisher type of game.PNG', NULL, NULL, NULL, '2023-01-14 16:43:46'),
(14, 6, 'third', '20:54', 0, NULL, 'third', NULL, 'third', NULL, 'third', NULL, 'third', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '2023-01-14 16:55:00'),
(15, 6, 'third', '20:54', 0, NULL, 'third', NULL, 'third', NULL, 'third', NULL, 'third', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '2023-01-14 16:55:00'),
(16, 6, 'third', '20:54', 0, NULL, 'third', NULL, 'third', NULL, 'third', NULL, 'third', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '2023-01-14 16:55:00'),
(17, 6, 'ezae', '00:19', NULL, NULL, 'aezaze', NULL, 'zae', NULL, 'aze', NULL, 'zae', NULL, NULL, NULL, NULL, NULL, 'fisher type of game.PNG', NULL, NULL, NULL, '2023-01-14 17:20:13'),
(18, 6, 'aezae', '00:28', NULL, NULL, 'eaz', NULL, 'eaz', NULL, 'eaz', NULL, 'eaz', NULL, NULL, NULL, NULL, NULL, 'fisher type of game.PNG', NULL, NULL, NULL, '2023-01-14 17:29:35'),
(19, 6, 'second titlte', '00:30', NULL, NULL, 'second', NULL, 'second', NULL, 'second', NULL, 'second', NULL, NULL, NULL, NULL, NULL, 'emec_expo.jpg', NULL, NULL, NULL, '2023-01-14 17:29:35'),
(20, 6, 'azeae', '00:32', 1, NULL, 'aze', NULL, 'eaz', NULL, 'eaz', NULL, 'eaz', NULL, NULL, NULL, NULL, NULL, 'fisher type of game.PNG', NULL, NULL, NULL, '2023-01-14 17:32:59'),
(21, 6, 'second 2', '00:35', 0, NULL, 'second 2', NULL, 'second 2', NULL, 'second 2', NULL, 'second 2', NULL, NULL, NULL, NULL, NULL, 'emec_expo.jpg', NULL, NULL, NULL, '2023-01-14 17:32:59'),
(22, 6, 'azea', '00:59', 1, NULL, 'aze', NULL, 'aaaaaaaaaaa', NULL, 'eaze', NULL, 'zaeaze', NULL, NULL, NULL, NULL, NULL, 'etagere cuisine phone.jpg', NULL, NULL, NULL, '2023-01-14 18:00:45'),
(23, 6, 'aze', '00:06', 1, NULL, 'eaz', NULL, 'eaz', NULL, 'eaz', NULL, 'eaz', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '2023-01-14 18:07:23'),
(24, 6, 'aze', '00:06', 1, NULL, 'eaz', NULL, 'eaz', NULL, 'eaz', NULL, 'eaz', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '2023-01-14 18:08:11'),
(25, 6, 'aze', '00:19', 1, NULL, 'aze', NULL, 'eaz', NULL, 'eaze', NULL, 'aze', NULL, NULL, NULL, NULL, NULL, 'fisher type of game.PNG', NULL, NULL, NULL, '2023-01-15 11:21:28'),
(26, 6, 'eaze', '02:26', 1, NULL, 'eaze', NULL, 'eza', NULL, 'eaze', NULL, 'aze', NULL, NULL, NULL, NULL, NULL, 'fisher type of game.PNG', NULL, NULL, NULL, '2023-01-15 11:26:37'),
(27, 6, 'eaze', '07:32', 1, NULL, 'aze', NULL, 'eaz', NULL, 'eaze', NULL, 'eaze', NULL, NULL, NULL, NULL, NULL, 'etagere cuisine.jpg', NULL, NULL, NULL, '2023-01-15 11:33:08'),
(28, 6, 'zaea', '05:35', 1, NULL, 'aze', NULL, 'eza', NULL, 'zaesq', NULL, 'dsq', NULL, NULL, NULL, NULL, NULL, 'etagere cuisine.jpg', NULL, NULL, NULL, '2023-01-15 11:36:48'),
(29, 6, 'zeae', '03:40', 0, NULL, 'fsd', NULL, 'fsd', NULL, 'fsd', NULL, 'fds', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '2023-01-15 11:41:07'),
(30, 6, 'azeaze', '05:41', 1, NULL, 'fsd', NULL, 'fsdf', NULL, 'dsf', NULL, 'dsf', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '2023-01-15 11:41:07'),
(31, 6, 'zeae', '03:40', 0, NULL, 'fsd', NULL, 'fsd', NULL, 'fsd', NULL, 'fds', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '2023-01-15 11:41:27'),
(32, 6, 'azeaze', '05:41', 1, NULL, 'fsd', NULL, 'fsdf', NULL, 'dsf', NULL, 'dsf', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '2023-01-15 11:41:27'),
(33, 6, 'zeae', '03:40', 0, NULL, 'fsd', NULL, 'fsd', NULL, 'fsd', NULL, 'fds', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '2023-01-15 11:46:26'),
(34, 6, 'azeaze', '05:41', 1, NULL, 'fsd', NULL, 'fsdf', NULL, 'dsf', NULL, 'dsf', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '2023-01-15 11:46:26'),
(35, 6, 'zeae', '03:40', 0, NULL, 'fsd', NULL, 'fsd', NULL, 'fsd', NULL, 'fds', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '2023-01-15 11:46:48'),
(36, 6, 'zeae', '03:40', 0, NULL, 'fsd', NULL, 'fsd', NULL, 'fsd', NULL, 'fds', NULL, NULL, NULL, NULL, NULL, '', 5, NULL, NULL, '2023-01-15 11:48:19'),
(37, 6, 'azeaze', '05:41', 1, NULL, 'fsd', NULL, 'fsdf', NULL, 'dsf', NULL, 'dsf', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '2023-01-15 11:48:19'),
(38, 6, 'zeae', '03:40', 0, NULL, 'fsd', NULL, 'fsd', NULL, 'fsd', NULL, 'fds', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '2023-01-15 11:49:29'),
(39, 6, 'azeaze', '05:41', 1, NULL, 'fsd', NULL, 'fsdf', NULL, 'dsf', NULL, 'dsf', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '2023-01-15 11:49:29'),
(40, 6, 'a', '02:50', 0, NULL, 'a', NULL, 'a', NULL, 'a', NULL, 'a', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '2023-01-15 11:51:13'),
(41, 6, 'b', '02:50', 1, NULL, 'b', NULL, 'b', NULL, 'b', NULL, 'b', NULL, NULL, NULL, NULL, NULL, 'data-upload-t.jpg', NULL, NULL, NULL, '2023-01-15 11:51:13'),
(42, 6, 'azesqd', '03:55', 0, NULL, 'zea', NULL, 'eaz', NULL, 'ea', NULL, 'eaz', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '2023-01-15 11:56:16'),
(43, 6, 'aaa', '02:57', 1, NULL, 'aze', NULL, 'eza', NULL, 'eaz', NULL, 'eaz', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '2023-01-15 11:57:40'),
(44, 6, 'aaa', '02:57', 1, NULL, 'aze', NULL, 'eza', NULL, 'eaz', NULL, 'eaz', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '2023-01-15 11:58:38'),
(45, 6, 'azeaze', '02:59', 0, NULL, 'aze', NULL, 'aze', NULL, 'aze', NULL, 'aze', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '2023-01-15 12:00:07'),
(46, 6, 'zaeaz', '05:03', 0, NULL, 'eaze', NULL, 'eaz', NULL, 'eaz', NULL, 'eaz', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '2023-01-15 12:04:46'),
(47, 6, 'aze', '05:06', 0, NULL, 'aze', NULL, 'eaz', NULL, 'eaz', NULL, 'eaz', NULL, NULL, NULL, NULL, NULL, 'fisher type of game.PNG', NULL, NULL, NULL, '2023-01-15 12:07:13'),
(48, 6, 'multi', '00:16', 0, NULL, 'aze1', NULL, 'aze2', NULL, 'aze3', NULL, 'aze4', NULL, NULL, NULL, NULL, NULL, 'data-upload-t.jpg', NULL, NULL, NULL, '2023-01-15 12:16:39'),
(49, 6, 'aze', '04:15', 1, NULL, 'fdsf', NULL, 'fdsfdfsdf', NULL, 'fdddd', NULL, 'ffff', NULL, NULL, NULL, NULL, NULL, 'fisher type of game.PNG', NULL, NULL, NULL, '2023-01-15 12:16:39'),
(50, 6, 'eaze', '05:13', 0, NULL, 'eza', NULL, 'eza', NULL, 'eaz', NULL, 'eaz', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '2023-01-15 17:15:28'),
(51, 6, 'tartiba', '06:14', 1, NULL, 'zaeazesdq', NULL, 'dsqddfsd', NULL, 'fdsf', NULL, 'dsfsf', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '2023-01-18 10:15:06'),
(52, 19, 'erzer', '06:22', 0, NULL, 'rez', NULL, 'rez', NULL, 'rze', NULL, 'rze', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '2023-01-18 13:22:48'),
(53, 19, 'test 12', '12:39', 1, NULL, 'eza', NULL, 'eaze', NULL, 'dsqdq', NULL, 'zaea', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '2023-01-19 09:40:51'),
(54, 19, 'test 13', '10:42', 1, NULL, 'azee', NULL, 'sqfqs', NULL, 'fsdf', NULL, 'sdfs', NULL, NULL, NULL, NULL, NULL, 'etagere cuisine phone.jpg', NULL, NULL, NULL, '2023-01-19 09:43:02'),
(55, 19, 'test 5', '00:32', 1, NULL, 'azqsdq', NULL, 'fdsd', NULL, 'fds', NULL, 'sdfds', NULL, NULL, NULL, NULL, NULL, 'earnS_missFortune.png', NULL, NULL, NULL, '2023-01-19 11:30:36'),
(56, 19, 'eaze', '16:27', 1, NULL, 'eza', NULL, 'eza', NULL, 'eaz', NULL, 'eza', NULL, NULL, NULL, NULL, NULL, 'fisher type of game.PNG', NULL, NULL, NULL, '2023-01-19 14:27:17'),
(57, 19, 'dsffsdf', '02:43', 1, NULL, 'azeae', NULL, 'azea', NULL, 'aze', NULL, 'eaze', NULL, NULL, NULL, NULL, NULL, 'data-upload-t.jpg', NULL, NULL, NULL, '2023-01-19 14:43:28'),
(58, 19, 'quest 1', '19:05', 1, NULL, 'zezae', NULL, 'azea', NULL, 'eaze', NULL, 'azeaze', NULL, NULL, NULL, NULL, NULL, 'earnS_missFortune.png', NULL, NULL, NULL, '2023-01-19 16:06:02'),
(59, 19, 'quest é', '22:05', 0, NULL, 'eazeaze', NULL, 'eaze', NULL, 'eaze', NULL, 'zaeaz', NULL, NULL, NULL, NULL, NULL, 'data-upload-t.jpg', NULL, NULL, NULL, '2023-01-19 16:06:02'),
(60, 19, 'azeaz', '00:08:00', 1, NULL, 'azeae', NULL, 'eazaze', NULL, 'zaeaz', NULL, 'aze', NULL, NULL, NULL, NULL, NULL, 'Draw.png', NULL, NULL, NULL, '2023-01-19 16:11:05'),
(61, 19, 'test add remove', '00:05:00', 1, NULL, 'are', 'correct', 'qfd', 'correct', 'ds', '', 'dssd', '', '5', NULL, 'null', NULL, 'design1.PNG', NULL, NULL, NULL, '2023-01-20 10:19:20'),
(62, 19, 'eaze', '00:05:00', 0, NULL, 'eaze', '', 'eaze', 'correct', 'eazeaaaa', '', 'azeazdddd', '', 'dfsf', NULL, '', NULL, 'design1.PNG', NULL, NULL, NULL, '2023-01-20 10:20:55'),
(63, 19, 'quest 1', '00:05:00', 0, NULL, 'azea', 'correct', 'aaa', 'correct', 'zzz', '', 'eee', '', 'qqq', NULL, 'ddd', NULL, 'earnS_missFortune.png', NULL, NULL, NULL, '2023-01-20 11:00:26'),
(64, 19, 'quest 2', '00:05:00', 0, NULL, 'aaa', 'correct', 'eeee', 'correct', 'qqqq', '', 'dddd', '', NULL, NULL, NULL, NULL, 'data-upload-t.jpg', NULL, NULL, NULL, '2023-01-20 11:00:26'),
(65, 19, 'quest 1', '00:05:00', 1, NULL, 'aaa', 'correct', 'zzea', '', 'sdfs', '', 'fsdf', '', 'ezae', NULL, '', NULL, NULL, NULL, NULL, NULL, '2023-01-20 11:37:48'),
(66, 19, 'quest 2', '00:05:00', 0, NULL, 'aa', 'correct', 'zz', 'correct', 'ss', 'correct', 'dd', '', '', NULL, 'sqdq', NULL, 'data-upload-t.jpg', NULL, NULL, NULL, '2023-01-20 14:57:35'),
(67, 19, 'quest 4', '00:05:00', 1, NULL, 'rze', 'correct', 'ezr', '', 'rez', '', '', '', '', NULL, '', NULL, '', 7, NULL, NULL, '2023-01-22 13:38:34'),
(68, 19, 'quest 1', '00:05:00', 0, NULL, 'rezr', 'correct', 'rez', 'correct', 'rze', '', 'rez', '', '', NULL, '', NULL, '', 5, NULL, NULL, '2023-01-22 13:40:29'),
(69, 19, 'qsd', '00:05:00', 0, NULL, 'aze', 'correct', 'eaze', 'correct', 'dsfsg', '', 'aze', 'correct', '', NULL, '', NULL, '', 2, NULL, NULL, '2023-01-22 13:41:20'),
(70, 19, 'USTE 1', '00:05:00', 0, NULL, 'EAZ', 'correct', 'EAZ', 'correct', 'AZE', '', 'EAZE', '', '', NULL, '', NULL, '', 8, NULL, NULL, '2023-01-22 13:44:20'),
(71, 19, 'DFSSDF', '00:05:00', 0, NULL, 'FDS', 'correct', 'FDS', 'correct', '', '', 'FDS', 'correct', '', NULL, '', NULL, '', 8, NULL, NULL, '2023-01-22 13:45:08'),
(72, 19, 'FDSFS', '00:05:00', 0, NULL, 'DSF', 'correct', 'FDS', 'correct', '', '', 'FSD', 'correct', '', NULL, '', NULL, '', 4, NULL, NULL, '2023-01-22 13:46:56'),
(73, 19, 'quest 1', '00:05:00', 0, NULL, 'dsfs', 'correct', 'fdsf', '', 'dfs', 'correct', 'sdfs', '', '', NULL, '', NULL, 'aisance.PNG', 1, NULL, NULL, '2023-01-22 14:02:09'),
(74, 19, 'quets 4', '00:05:00', 1, NULL, 'fdgd', 'correct', 'gfdg', '', 'dfgd', '', 'dfg', '', '', NULL, '', NULL, NULL, 4, NULL, NULL, '2023-01-22 14:02:09'),
(75, 19, 'quet1', '00:05:00', 0, NULL, 'aze', 'correct', 'eaze', '', 'qsfq', 'correct', 'aze', '', '', NULL, '', NULL, '', 5, NULL, NULL, '2023-01-23 09:20:40'),
(76, 19, 'quest 2', '00:05:00', 1, NULL, 'zae', '', 'azea', 'correct', 'fdsf', '', 'sdfsd', '', '', NULL, '', NULL, '', 9, NULL, NULL, '2023-01-23 09:20:40'),
(77, 19, 'aze', '00:00:00', 1, NULL, 'zae', '', 'zae', 'correct', 'eaze', '', 'zaeze', 'correct', '', NULL, '', NULL, '', 1, NULL, NULL, '2023-01-23 18:58:54'),
(78, 19, 'aze', '00:04:00', 1, NULL, 'dsq', 'correct', 'dqsd', '', 'dqsd', '', 'dqs', '', '', NULL, '', NULL, '', 2, NULL, NULL, '2023-01-23 19:01:08'),
(79, 20, 'aze', '00:11:00', 1, NULL, 'ezae', 'correct', 'eaze', '', 'ezae', '', '', '', '', NULL, '', NULL, '', 12, NULL, NULL, '2023-01-23 23:10:07'),
(80, 20, 'quest 1', '00:00:00', 0, NULL, 'eaze', 'correct', 'eaze', 'correct', 'eaze', '', 'eaze', '', '', NULL, '', NULL, '', 3, NULL, NULL, '2023-01-24 11:22:08'),
(81, 20, 'quest 11', '00:10:00', 1, NULL, 'earze', '', 'rzer', 'correct', 'zet', '', 'zrtr', '', '', NULL, '', NULL, '', 6, NULL, NULL, '2023-01-24 11:56:03'),
(82, 20, 'uqets 1', '00:00:30', 1, NULL, 'aze', 'correct', 'azeaz', 'correct', 'eaze', '', 'zae', '', '', NULL, '', NULL, '', 3, NULL, NULL, '2023-01-24 15:17:43'),
(83, 20, 'quest  2  ', '00:00:40', 1, NULL, 'fsg', '', 'dfg', 'correct', 'dgfgfd', '', 'fdg', '', '', NULL, '', NULL, '', 1, NULL, NULL, '2023-01-24 15:17:43'),
(84, 20, 'dsqd', '00:05:00', 1, NULL, 'zae', 'correct', 'aze', '', 'aze', '', 'azeaze', '', '', NULL, '', NULL, '', 12, NULL, NULL, '2023-01-25 18:44:47'),
(85, 20, 'quest 1', '00:00:00', 1, NULL, 'aze', '', 'eaz', 'correct', '', '', '', '', '', NULL, '', NULL, '', 4, NULL, NULL, '2023-01-26 14:27:06'),
(86, 20, '<math xmlns=\"http://www.w3.org/1998/Math/MathML\"><mn>21</mn><msqrt><mn>2</mn></msqrt></math> + <math xmlns=\"http://www.w3.org/1998/Math/MathML\"><mfrac bevelled=\"true\"><mn>2</mn><mn>3</mn></mfrac></math> = ? ', '00:00:00', 1, NULL, '1', '', '2', 'correct', '3', '', '5', '', '', NULL, '', NULL, '', 3, NULL, NULL, '2023-01-27 15:50:39'),
(87, 20, 'المقال    44≠  34+ 32 ', '00:00:00', 1, NULL, '≤ 4', 'correct', '≤ 7', '', '≤ 12', '', '', '', '', NULL, '', NULL, '', 4, NULL, NULL, '2023-01-27 21:16:17'),
(88, 20, 'zea', '00:00:00', 1, NULL, 'aze', '', 'eaze', 'correct', 'eaz', '', 'eaze', '', '', NULL, '', NULL, '', 3, NULL, NULL, '2023-01-30 11:03:31'),
(89, 20, 'fdsf', '00:00:00', 1, NULL, 'fzer', '', 'zerz', 'correct', 'rzer', '', 'zer', '', '', NULL, '', NULL, '', 4, NULL, NULL, '2023-01-30 11:04:41'),
(90, 20, 'dfsdf', '00:00:00', 1, NULL, 'sdf', '', 'fs', '', 'fsdf', 'correct', '', '', '', NULL, '', NULL, '', 4, NULL, NULL, '2023-01-30 11:09:29'),
(91, 20, 'quest 1', '00:00:00', 1, NULL, 'eaze', '', 'aez', 'correct', 'eaz', '', 'eaze', '', '', NULL, '', NULL, '', 4, NULL, NULL, '2023-01-31 09:56:01'),
(92, 20, 'quest 1', '00:00:00', 1, NULL, 'zaeaz', '', 'eaze', 'correct', 'azeaz', '', 'eaze', '', '', NULL, '', NULL, '', 4, NULL, NULL, '2023-01-31 13:05:57'),
(93, 20, 'aze poi', '00:05:00', 0, NULL, 'aze', '', 'eaz', '', 'eaz', '', 'eaz', '', '', NULL, '', NULL, '', 2, NULL, NULL, '2023-02-03 16:26:50'),
(94, 20, 'aze', '00:05:00', 0, NULL, 'aze', '', 'eaz', '', 'eaz', '', 'eaz', '', '', NULL, '', NULL, '', 2, NULL, NULL, '2023-02-03 16:33:27'),
(95, 20, 'aze', '00:05:00', 0, NULL, 'aze', '', 'eaz', '', 'eaz', '', 'eaz', '', '', NULL, '', NULL, '', 2, NULL, NULL, '2023-02-03 16:38:58'),
(96, 20, 'aze 4', '00:10:00', 0, NULL, 'aze', '', 'eaz', '', 'eaz', '', 'eaz', '', '', NULL, '', NULL, '', 2, NULL, NULL, '2023-02-03 16:57:51'),
(97, 20, 'quest 8 poi 10', '00:09:00', 0, NULL, 'eaze', '', 'aze', 'correct', 'eaze', '', 'azefdf', 'correct', '', NULL, '', NULL, NULL, 7, '488382216ftp.png', NULL, '2023-02-03 17:53:34'),
(98, 20, 'quest 1', '00:00:00', 0, NULL, 'sdff', '', 'fsdf', 'correct', 'fsfg', '', 'gdfg', '', '', NULL, '', NULL, '', 4, NULL, NULL, '2023-02-04 13:21:12'),
(99, 20, 'quest 2', '00:00:00', 1, NULL, 'aeaze', '', 'fsfg', 'correct', 'gdf', '', 'gdfg', '', '', NULL, '', NULL, '', 5, NULL, NULL, '2023-02-04 13:23:08'),
(100, 20, 'quest 3', '00:00:00', 1, NULL, 'fsd', 'correct', 'fsdf', '', 'sdf', '', 'sdfsdf', '', '', NULL, '', NULL, '', 4, NULL, NULL, '2023-02-04 13:26:55'),
(101, 20, 'test minutes', '00:04:10', 1, NULL, 'fsdfs', 'correct', 'fsd', 'correct', 'fs', '', 'sd', '', '', NULL, '', NULL, '', 4, NULL, NULL, '2023-02-04 13:29:31'),
(102, 20, 'quest 1', '00:00:00', 1, NULL, 'gfdg', 'correct', 'gdfgeaz', '', 'gdf', '', 'gdfgd', '', '', NULL, '', NULL, '', 5, NULL, NULL, '2023-02-04 13:54:51'),
(103, 20, 'quest 1', '00:00:00', 1, NULL, 'fsdfaaaa', '', 'fsdf', 'correct', 'fsdf', '', 'sdfs', '', '', NULL, '', NULL, NULL, 4, '1171508101data-upload-t.jpg', NULL, '2023-02-07 14:54:56'),
(104, 20, 'quest 1', '00:00:00', 1, NULL, 'dfsf', '', 'fsdf', 'correct', 'fsdf', '', 'dsfsdf', '', '', NULL, '', NULL, NULL, 4, NULL, NULL, '2023-02-08 14:52:20'),
(105, 4, 'quest 1', '00:00:10', 1, 1, 'fsdf', '', 'fsdf', 'correct', 'sdfs', '', 'dfsdf', '', '', NULL, '', NULL, NULL, 4, NULL, NULL, '2023-02-08 16:44:40'),
(106, 20, 'quest 1', '00:00:00', 1, NULL, 'zer', '', 'rzer', 'correct', '', '', '', '', '', '', '', NULL, NULL, 4, NULL, 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAlgAAAGQCAYAAAByNR6YAAAAAXNSR0IArs4c6QAAIABJREFUeF7t3X2U5GdVJ/D7VE8g6apONIgv7C4YX1YXdAVjV+dFdNLVYwwYzqpwjK6IwU2ABNg1YILAhCQT0GQl7iITDLAJCC54gMVDEAwz1TOCeelqIrguOb4j6CKKZE26ehKS6Xr2NEnYkA1Jd8+vun5P1Sf/cVJ1n3s/9znHr7+qVKfwDwECBAgQIECAQKUCqdJqihEgQIAAAQIECISA5RIQIECAAAECBCoWELAqBlWOAAECBAgQICBguQMECBAgQIAAgYoFBKyKQZUjQIAAAQIECAhY7gABAgQIECBAoGIBAatiUOUIECBAgAABAgKWO0CAAAECBAgQqFhAwKoYVDkCBAgQIECAgIDlDhAgQIAAAQIEKhYQsCoGVY4AAQIECBAgIGC5AwQIECBAgACBigUErIpBlSNAgAABAgQICFjuAAECBAgQIECgYgEBq2JQ5QgQIECAAAECApY7QIAAAQIECBCoWEDAqhhUOQIECBAgQICAgOUOECBAgAABAgQqFhCwKgZVjgABAgQIECAgYLkDBAgQIECAAIGKBQSsikGVI0CAAAECBAgIWO4AAQIECBAgQKBiAQGrYlDlCBAgQIAAAQICljtAgAABAgQIEKhYQMCqGFQ5AgQIECBAgICA5Q4QIECAAAECBCoWELAqBlWOAAECBAgQICBguQMECBAgQIAAgYoFBKyKQZUjQIAAAQIECAhY7gABAgQIECBAoGIBAatiUOUIECBAgAABAgKWO0CAAAECBAgQqFhAwKoYVDkCBAgQIECAgIDlDhAgQIAAAQIEKhYQsCoGVY4AAQIECBAgIGC5AwQIECBAgACBigUErIpBlSNAgAABAgQICFjuAAECBAgQIECgYgEBq2JQ5QgQIECAAAECApY7QIAAAQIECBCoWEDAqhhUOQIECBAgQICAgOUOECBAgAABAgQqFhCwKgZVjgABAgQIECAgYLkDBAgQIECAAIGKBQSsikGVI0CAAAECBAgIWO4AAQIECBAgQKBiAQGrYlDlCBAgQIAAAQICljtAgAABAgQIEKhYQMCqGFQ5AgQIECBAgICA5Q4QIECAAAECBCoWELAqBlWOAAECBAgQICBguQMECBAgQIAAgYoFBKyKQZUjQIAAAQIECAhY7gABAgQIECBAoGIBAatiUOUIE', '2023-02-23 10:27:09'),
(107, 20, 'quest 1', '00:00:00', 1, NULL, 'ezrz', '', 'zer', 'correct', '', '', '', '', '', '', '', NULL, NULL, 4, NULL, 'data:image/png;base64,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', '2023-02-23 11:16:36');
INSERT INTO `question_multi_choice` (`id`, `user_id`, `title`, `duration`, `is_single_choice`, `no_specific_time`, `option_1`, `correct_option_1`, `option_2`, `correct_option_2`, `option_3`, `correct_option_3`, `option_4`, `correct_option_4`, `option_5`, `correct_option_5`, `option_6`, `correct_option_6`, `file_url`, `points`, `image`, `data_file`, `date_created`) VALUES
(108, 20, 'quest 1', '00:00:00', 1, NULL, 'rezr', '', 'rzer', 'correct', 'rzer', '', 'ezr', '', '', '', '', NULL, NULL, 5, NULL, 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAlgAAAGQCAYAAAByNR6YAAAAAXNSR0IArs4c6QAAIABJREFUeF7t3X28JFV95/Hfqb7gcLt6VBYNSXxYUSOvxCSw0NUOYrjT1RNlARMVIkKM0QQhAlEBIerCPBBRDBCMYCQmqFHRBNFExKfp6rksytjVEExisrpGXR/WJUJQpqsvI0zX2dcdLmRAZm4/nKo+p+rDv1T9zu+8f4d+fenbXa2EfxBAAAEEEEAAAQSMCiij1SiGAAIIIIAAAgggIAQsDgECCCCAAAIIIGBYgIBlGJRyCCCAAAIIIIAAAYszgAACCCCAAAIIGBYgYBkGpRwCCCCAAAIIIEDA4gwggAACCCCAAAKGBQhYhkEphwACCCCAAAIIELA4AwgggAACCCCAgGEBApZhUMohgAACCCCAAAIELM4AAggggAACCCBgWICAZRiUcggggAACCCCAAAGLM4AAAggggAACCBgWIGAZBqUcAggggAACCCBAwOIMIIAAAggggAAChgUIWIZBKYcAAggggAACCBCwOAMIIIAAAggggIBhAQKWYVDKIYAAAggggAACBCzOAAIIIIAAAgggYFiAgGUYlHIIIIAAAggggAABizOAAAIIIIAAAggYFiBgGQalHAIIIIAAAgggQMDiDCCAAAIIIIAAAoYFCFiGQSmHAAIIIIAAAggQsDgDCCCAAAIIIICAYQEClmFQyiGAAAIIIIAAAgQszgACCCCAAAIIIGBYgIBlGJRyCCCAAAIIIIAAAYszgAACCCCAAAIIGBYgYBkGpRwCCCCAAAIIIEDA4gwggAACCCCAAAKGBQhYhkEphwACCCCAAAIIELA4AwgggAACCCCAgGEBApZhUMohgAACCCCAAAIELM4AAggggAACCCBgWICAZRiUcggggAACCCCAAAGLM4AAAggggAACCBgWIGAZBqUcAggggAACCCBAwOIMIIAAAggggAAChgUIWIZBKYcAAggggAACCBCwOAMIIIAAAggggIBhAQKWYVDKIYAAAggggAACBCzOAAIIIIAAAgggYFiAgGUYlHIIIIAAAggggAABizOAAAIIIIAAAggYFiBgGQalHAIIIIAAAgggQMDiDCCAAAIIIIAAAoYFCFiGQSmHAAIIIIAAAggQsDgDCCCAAAIIIICAYQEClmFQyiGAAAIIIIAAAgQs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', '2023-02-23 11:50:04');

-- --------------------------------------------------------

--
-- Table structure for table `question_span`
--

CREATE TABLE `question_span` (
  `id` int(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `no_specific_time` tinyint(4) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `span_text` varchar(1255) DEFAULT NULL,
  `words` varchar(255) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `file_url` varchar(255) DEFAULT NULL,
  `points` int(20) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question_span`
--

INSERT INTO `question_span` (`id`, `user_id`, `no_specific_time`, `title`, `span_text`, `words`, `duration`, `file_url`, `points`, `image`, `date_created`) VALUES
(1, 20, NULL, 'quest 2', 'aaaaaaaaaaaaa  bbbbbbbbbbbbb ¤cccc¤ dddddddd', ';cccc', '00:00:00', '', 5, NULL, '2023-01-26 14:27:06'),
(2, 20, NULL, 'quest 1', 'azeazea  zeaz e ', '', '00:09:00', 'screen_affactation.png', 2, NULL, '2023-01-26 14:28:31'),
(3, 20, NULL, 'quest span', 'aaaaaaaaaaaa  bbbbbbbbbbb ¤cccc¤ dddddd ¤gg¤ eeee', ';cccc;gg', '00:00:00', '', 4, NULL, '2023-01-26 14:49:17'),
(4, 20, NULL, 'quest 1', 'Lorem  Ipsum is simply ¤yahia¤ dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,¤akram¤ when an unknown printer took a galley of type and scrambled it to make a type specimen book. ', ';yahia;akram', '00:00:00', '', 4, NULL, '2023-01-27 11:04:32'),
(5, 20, NULL, 'quest 1', 'Lorem  Ipsum is simply dummy text of the printing ¤yahia¤ and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ', ';yahia;akram', '00:00:00', '', 4, NULL, '2023-01-27 11:06:52'),
(6, 20, NULL, 'quest 1', 'Lorem  Ipsum is simply dummy text of the ¤akram¤ printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only ¤ali¤ five centuries', ';akram;ali', '00:00:00', '', 4, NULL, '2023-01-27 11:11:30'),
(7, 20, NULL, 'quest 1', 'Lorem  Ipsum is simply dummy text of the ¤yahia¤ printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only ¤akram¤ five centuries ', ';yahia;akram', '00:00:00', '', 4, NULL, '2023-01-27 11:14:52'),
(8, 20, NULL, 'quest 1', 'Lorem  Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, ¤ali¤ when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the ¤akram¤ leap into electronic typesetting, remaining essentially unchanged', ';ali;akram', '00:00:00', '', 5, NULL, '2023-01-27 21:28:43'),
(9, 20, NULL, 'فائدته', ' تبدو فتجعلها نصي محتوى يوجد هنا نصي، محتوى يوجد ¤ البحث¤ هنا  استخدام عن عوضاً للأحرف ما- حد -إلى طبيعياَ توزيعاَ تعطي لأنها إيبسوم لوريم طريقة استخدام يتم ولذلك يقرأها. التي الصفحة في ¤خارجي¤ الفقرات توضع شكل أو للنص الخارجي الشكل على التركيز عن القارئ سيلهي ما لصفحة المقروء المحتوى أن وهي طويل زمن منذ مثبتة حقيقةهناك ', ';خارجي;البحث', '00:00:00', '', 5, NULL, '2023-01-30 14:18:24'),
(11, 20, NULL, 'quest 1', 'هناك  حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى ¤شكلي¤ حد ما- للأحرف عوضاً عن استخدا هنا ¤أخرى¤ يوجد محتوى نصي، هنا يوجد محتوى نصي فتجعلها تبدو (أي الأحرف)', ';شكلي;أخرى', '00:00:00', '', 4, NULL, '2023-01-30 17:00:47'),
(12, 20, NULL, 'quest 1', 'عشر  عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، ¤حوت¤ لتكوّن كتيّب بمثابة دليل أو مرجع شكلي ¤ظهور¤ لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي ', ';ظهور;حوت', '00:00:00', '', 4, NULL, '2023-01-30 18:23:07'),
(13, 20, NULL, 'quest 1', 'بل  انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. ¤مدى¤ انتشر بشكل كبير ¤قمت¤ في ستينيّات هذا القرن مع إصدار رقائق \"ليتراسيت\"', ';قمت;مدى', '00:00:00', '', 3, NULL, '2023-01-30 18:27:48'),
(14, 20, NULL, 'quets Poi 7', '																													 																													 																													 																													 test     																													 																													 																													 																													      																													 																													 																													 																													 add     																													 																													 																													 																													 ¤must¤     																													 																													 																													 																													 and     																													 																													 																													 																													 edi     																													 																													 																													 																											    																													 																													 																											   																													 																											  																											', '', '00:18:00', NULL, 5, NULL, '2023-02-03 16:26:51'),
(15, 20, NULL, 'test jaax', '																													 ali  																													   																													 est  																													 a  																													 ¤akram¤  																													 cote  																													 de  ¤kan¤ 																													 to  																											', ';kan', '00:07:00', NULL, 4, NULL, '2023-02-03 16:33:27'),
(16, 20, NULL, 'test jaax', '																													 ali   																													   																													 est  																													 a  																													 ¤akram¤  																													 cot																										 de  ¤kan¤ 																													 to  																											', '', '00:07:00', NULL, 4, NULL, '2023-02-03 16:38:58'),
(17, 20, NULL, 'test Ajax', '																													 ali  																													   																													 est  																													 a  																													 ¤akram¤  																													 cote  																													 de  																													 to  																											', '', '00:07:00', NULL, 8, NULL, '2023-02-03 16:57:51'),
(18, 20, NULL, 'quest 7 poi 9', '																													 																													 																													 test    																													 																													 																													 ¤correct¤    																													 																													 																													     																													 																													 																													 number    																													 																													 																													 ro    																													 																													 																											   																													 																											  																											', '', '00:41:00', NULL, 5, NULL, '2023-02-03 17:48:49'),
(19, 20, NULL, 'quest 1', '																													 It  																													   																													 is  																													 a  																													 long  																													 established  																													 fact  																													 that  																													 a  																													 reader  																													 will  																													 be  																													 distracted  																													 by  																													 the  																													 readable  																													 content  																													 of  																													 a  																													 page  																													 when  																													 looking  																													 at  																													 its  																													 layout.  																													 The  																													 point  																													 of  																													 using  																													 Lorem  																													 ¤akram¤  																													 Ipsum  																													 is  																													 that  																												', '', '00:15:00', NULL, 5, NULL, '2023-02-14 14:45:14'),
(20, 20, NULL, 'quest 1', 'There&nbsp; are many variations ¤ali¤ of passages ¤test¤ of Lorem ¤akram¤ but ...', ';akra;ali;madi;cool;akram;test;not;testss;cool;test', '00:00:00', NULL, 5, NULL, '2023-02-20 16:10:02');

-- --------------------------------------------------------

--
-- Table structure for table `question_tartib`
--

CREATE TABLE `question_tartib` (
  `id` int(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `no_specific_time` tinyint(4) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `option_to_order_1` varchar(255) DEFAULT NULL,
  `option_to_order_2` varchar(255) DEFAULT NULL,
  `option_to_order_3` varchar(255) DEFAULT NULL,
  `option_to_order_4` varchar(255) DEFAULT NULL,
  `option_to_order_5` varchar(255) DEFAULT NULL,
  `option_to_order_6` varchar(255) DEFAULT NULL,
  `file_url` varchar(255) DEFAULT NULL,
  `points` int(20) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question_tartib`
--

INSERT INTO `question_tartib` (`id`, `user_id`, `no_specific_time`, `title`, `duration`, `option_to_order_1`, `option_to_order_2`, `option_to_order_3`, `option_to_order_4`, `option_to_order_5`, `option_to_order_6`, `file_url`, `points`, `image`, `date_created`) VALUES
(1, 6, NULL, 'zae', '03:14', 'azea', 'eaze', 'eazea', 'zeaqsdqsdsqd', NULL, NULL, 'emec_expo.jpg', NULL, NULL, '2023-01-14 13:14:54'),
(2, 6, NULL, 'aze', '01:16', 'zae', 'aze', 'zaee', 'aze', NULL, NULL, 'data-upload-t.jpg', NULL, NULL, '2023-01-14 19:16:58'),
(3, 6, NULL, 'ezae', '01:16', 'secondddd', 'secondddd', 'secondddd', 'secondddd', NULL, NULL, 'fisher type of game.PNG', NULL, NULL, '2023-01-14 19:16:58'),
(4, 6, NULL, 'aze', '05:06', '1', '2', '3', '4', NULL, NULL, 'fisher type of game.PNG', 3, NULL, '2023-01-15 12:07:13'),
(5, 6, NULL, 'tartib', '00:16', 'tartib', 'v', 'tartib', 'tartib', NULL, NULL, 'data-upload-t.jpg', NULL, NULL, '2023-01-15 12:16:39'),
(6, 6, NULL, 'tartiba', '06:14', 'zea', 'fdsfdsf', 'fsdf', 'gf', NULL, NULL, '', NULL, NULL, '2023-01-18 10:15:06'),
(7, 19, NULL, 'quest 3', '00:05:00', 'a', 'b', 'c', 'd', 'f', '', 'data-upload-t.jpg', NULL, NULL, '2023-01-20 11:37:48'),
(8, 19, NULL, 'quest 2', '00:05:00', 'az', 'ae', 'ar', 'at', 'ay', '', 'data-upload-t.jpg', NULL, NULL, '2023-01-20 14:57:35'),
(9, 19, NULL, 'quest 1', '00:05:00', 'a', 'c', 'd', 'e', 'f', '', 'earnS_missFortune.png', NULL, NULL, '2023-01-20 15:28:33'),
(10, 19, NULL, 'quest 2', '00:05:00', '1', '2', '3', '4', '5', '6', 'fisher type of game.PNG', NULL, NULL, '2023-01-20 15:28:33'),
(11, 19, NULL, 'quest 4', '00:05:00', 'aze', 'eaze', 'eaze', 'eaez', '', '', '', 7, NULL, '2023-01-22 13:38:35'),
(12, 19, NULL, 'quest 1', '00:05:00', 'a', 'b', 'c', 'd', 'e', '', '', 11, NULL, '2023-01-23 11:39:53'),
(13, 19, NULL, 'quest 2', '00:05:00', '1', '2', '3', '4', '', '', '', 12, NULL, '2023-01-23 11:39:53'),
(14, 19, NULL, 'eaze', '00:07:00', 'aze', 'aze', 'aze', 'aze', '', '', '', 12, NULL, '2023-01-23 19:01:08'),
(15, 20, NULL, 'sqdfdds', '00:20:00', 'azeaze', 'dsf', 'fdsf', 'sdfsd', '', '', '', 12, NULL, '2023-01-23 23:10:07'),
(16, 20, NULL, 'quest 5', '00:01:00', 'zae', 'aze', 'aze', 'aze', '', '', '', 5, NULL, '2023-01-24 15:17:44'),
(17, 20, NULL, 'qy=uest 5 poi 5', '00:12:00', 'az', 'bz', 'cz', 'dz', '', '', NULL, 5, NULL, '2023-02-03 16:26:51'),
(18, 20, NULL, 'aze', '00:03:00', '1', '2', '3', '4', '', '', NULL, 3, NULL, '2023-02-03 16:33:27'),
(19, 20, NULL, 'aze', '00:03:00', '1', '2', '3', '4', '', '', NULL, 3, NULL, '2023-02-03 16:38:58'),
(20, 20, NULL, 'aze 1', '00:21:00', '1', '2', '3', '4', '', '', NULL, 3, NULL, '2023-02-03 16:57:51'),
(21, 20, NULL, 'quest poi 8', '00:19:00', 'fa', 'fb', 'fc', 'fd', '', '', NULL, 8, NULL, '2023-02-03 17:43:05'),
(22, 20, NULL, 'quest 11 poi 13', '00:04:00', 'a', 'b', 'c', 'd', '', '', NULL, 4, NULL, '2023-02-03 17:53:34'),
(23, 4, NULL, 'quest 3', '00:00:20', 'a', 'b', 'c', 'd', '', '', NULL, 5, '1947045557fisher type of game.PNG', '2023-02-08 17:17:20');

-- --------------------------------------------------------

--
-- Table structure for table `question_tawsil`
--

CREATE TABLE `question_tawsil` (
  `id` int(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `no_specific_time` tinyint(4) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `option_1` varchar(255) DEFAULT NULL,
  `link_option_1` varchar(255) DEFAULT NULL,
  `option_2` varchar(255) DEFAULT NULL,
  `link_option_2` varchar(255) DEFAULT NULL,
  `option_3` varchar(255) DEFAULT NULL,
  `link_option_3` varchar(255) DEFAULT NULL,
  `option_4` varchar(255) DEFAULT NULL,
  `link_option_4` varchar(255) DEFAULT NULL,
  `option_5` varchar(255) DEFAULT NULL,
  `link_option_5` varchar(255) DEFAULT NULL,
  `option_6` varchar(255) DEFAULT NULL,
  `link_option_6` varchar(255) DEFAULT NULL,
  `file_url` varchar(255) DEFAULT NULL,
  `points` int(20) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question_tawsil`
--

INSERT INTO `question_tawsil` (`id`, `user_id`, `no_specific_time`, `title`, `duration`, `option_1`, `link_option_1`, `option_2`, `link_option_2`, `option_3`, `link_option_3`, `option_4`, `link_option_4`, `option_5`, `link_option_5`, `option_6`, `link_option_6`, `file_url`, `points`, `image`, `date_created`) VALUES
(1, 6, NULL, 'rezr', '00:50', 'rez', NULL, 'erz', NULL, 'rezr', NULL, 'rzer', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '2023-01-13 19:50:13'),
(2, 6, NULL, 'fds', '01:53', 'fds', 'ezr', 'fdsf', 'rze', 'dsf', 'rzer', 'fsdf', 'rez', NULL, NULL, NULL, NULL, '58_Admin.jpg', NULL, NULL, '2023-01-13 19:53:14'),
(3, 6, NULL, 'azeaze', '05:03', 'aze', 'eaz', 'ezae', 'eza', 'zaea', 'ezae', 'zae', 'zae', NULL, NULL, NULL, NULL, '58_Admin.jpg', NULL, NULL, '2023-01-14 12:03:18'),
(4, 6, NULL, 'zae', '02:18', 'aze', 'eza', 'eza', 'eza', 'eaz', 'eza', 'eaz', 'eazaze', NULL, NULL, NULL, NULL, '5-stars.png', NULL, NULL, '2023-01-14 12:18:37'),
(5, 6, NULL, 'ezae', '03:03', 'azeaez', 'zae', 'eaz', 'eza', 'eaze', 'aze', 'ezae', 'eza', NULL, NULL, NULL, NULL, '', NULL, NULL, '2023-01-14 13:03:31'),
(6, 6, NULL, 'zae', '03:14', 'aea', 'ezae', 'azeaze', 'azeaqs', 'qsd', 'gfds', 'gfdg', 'gfdg', NULL, NULL, NULL, NULL, 'emec_expo.jpg', NULL, NULL, '2023-01-14 13:14:54'),
(7, 6, NULL, 'fdsf', '19:36', 'eaze', 'eza', 'eaz', 'eza', 'eza', 'eza', 'ez', 'eza', NULL, NULL, NULL, NULL, '', NULL, NULL, '2023-01-14 16:37:23'),
(8, 6, NULL, 'tawsil', '00:02', 'aze', 'eaze', 'aze', 'eza', 'eaz', 'eaz', 'ezae', 'aze', NULL, NULL, NULL, NULL, 'earnS_missFortune.png', NULL, NULL, '2023-01-14 18:00:45'),
(9, 6, NULL, 'eaz', '01:06', 'aze', 'eaz', 'eaz', 'eza', 'eaz', 'eeaz', 'eaz', 'eaz', NULL, NULL, NULL, NULL, 'ftp.png', NULL, NULL, '2023-01-14 18:07:23'),
(10, 6, NULL, 'eaz', '01:06', 'aze', 'eaz', 'eaz', 'eza', 'eaz', 'eeaz', 'eaz', 'eaz', NULL, NULL, NULL, NULL, 'ftp.png', NULL, NULL, '2023-01-14 18:08:11'),
(11, 6, NULL, 'aze', '00:01', 'aze', 'zae', '', '', 'eza', 'aze', 'sqd', '', NULL, NULL, NULL, NULL, '', NULL, NULL, '2023-01-14 19:01:52'),
(12, 6, NULL, 'aze', '00:01', 'aze', 'zae', '', '', 'eza', 'aze', 'sqd', '', NULL, NULL, NULL, NULL, '', NULL, NULL, '2023-01-14 19:02:43'),
(13, 6, NULL, 'qsd', '01:01', 'aze', 'eaz', 'eaze', 'eaz', '', '', '', '', NULL, NULL, NULL, NULL, '', NULL, NULL, '2023-01-14 19:02:43'),
(14, 6, NULL, 'aze', '00:03', 'a', 'z', 'a', 'z', 'a', 'z', 'a', 'z', NULL, NULL, NULL, NULL, 'data-upload-t.jpg', NULL, NULL, '2023-01-14 19:03:59'),
(15, 6, NULL, 'second', '00:07', 'cc', 'ff', 'cc', 'ff', 'cc', 'ff', 'cc', 'ff', NULL, NULL, NULL, NULL, 'ftp.png', NULL, NULL, '2023-01-14 19:03:59'),
(16, 6, NULL, 'aze', '00:03', 'a', 'z', 'a', 'z', 'a', 'z', 'a', 'z', NULL, NULL, NULL, NULL, 'data-upload-t.jpg', NULL, NULL, '2023-01-14 19:04:09'),
(17, 6, NULL, 'second', '00:07', 'cc', 'ff', 'cc', 'ff', 'cc', 'ff', 'cc', 'ff', NULL, NULL, NULL, NULL, 'ftp.png', NULL, NULL, '2023-01-14 19:04:09'),
(18, 6, NULL, 'zaeaz', '05:03', 'eaze', NULL, 'eaz', NULL, 'eaz', NULL, 'eaz', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '2023-01-15 12:04:46'),
(19, 6, NULL, 'aze', '05:04', 'aze', '1', 'eaz', '2', 'eaz', '3', 'eaz', '4', NULL, NULL, NULL, NULL, 'fisher type of game.PNG', NULL, NULL, '2023-01-15 12:07:13'),
(20, 6, NULL, 'tartib', '00:16', 'atssil 1', 'atssilatssil1', 'atssil \n 2', 'atssilatssil 2', 'atssil  3', 'atssilatssil 3', 'atssil 4', 'atssilatssil 4', NULL, NULL, NULL, NULL, 'data-upload-t.jpg', NULL, NULL, '2023-01-15 12:16:39'),
(21, 6, NULL, 'tartiba', '06:14', '1', '2', '2', '4', '3', '1', '4', '3', NULL, NULL, NULL, NULL, '', NULL, NULL, '2023-01-18 10:15:06'),
(22, 19, NULL, 'dsffsdf', '02:43', 'fsdf', 'fsdf', 'sdf', 'dsf', 'sdfsd', 'sfd', 'sdfsdf', 'dsfsd', NULL, NULL, NULL, NULL, 'data-upload-t.jpg', NULL, NULL, '2023-01-19 14:43:28'),
(23, 19, NULL, 'quest 1', '00:05:00', 'aa', 'aa', 'zz', 'zz', 'eeee', 'eeee', 'ddd', 'ddd', 'ss', 'ss', '', '', 'etagere cuisine phone.jpg', NULL, NULL, '2023-01-20 11:29:29'),
(24, 19, NULL, 'quest 3', '00:05:00', 'aa', 'aa', 'zz', 'zz', 'ee', 'ee', 'ddd', 'ddd', 'gg', 'gg', '', '', 'data-upload-t.jpg', NULL, NULL, '2023-01-20 11:37:48'),
(25, 19, NULL, 'quest 4', '00:05:00', 'a', 'a', 'd', 'd', 'f', 'f', 'g', 'g', '', '', '', '', '', 7, NULL, '2023-01-22 13:38:35'),
(26, 19, NULL, 'quest 1', '00:05:00', '11', '1', '22', '2', '33', '3', '44', '4', '55', '5', '', '', '', 5, NULL, '2023-01-23 11:18:46'),
(27, 19, NULL, 'QUEST 2', '00:07:00', 'aa', 'a', 'bb', 'b', 'cc', 'c', 'dd', 'dd', '', '', '', '', '', 8, NULL, '2023-01-23 11:18:46'),
(28, 19, NULL, 'sqdfsd', '00:00:00', 'aze', 'fsd', 'aze', 'fsd', 'sqfd', 'sdfsdf', 'sdf', 'fsd', '', '', '', '', '', 12, NULL, '2023-01-23 18:58:54'),
(29, 20, NULL, 'arzer', '00:01:00', 'rze', 'rzer', 'zerzer', 'zer', 'rzer', 'zer', 'rzer', 'zer', '', '', '', '', '', 4, NULL, '2023-01-24 15:17:44'),
(30, 20, NULL, 'aze  poi 2', '00:10:00', 'aze', '1', 'eaz', '2', 'eaz', '3', 'eaz', '4', NULL, '', '', '', NULL, 3, NULL, '2023-02-03 16:26:51'),
(31, 20, NULL, 'aze', '00:09:00', 'aze', '1', 'eaz', '2', 'eaz', '3', 'eaz', '4', NULL, '', '', '', NULL, 3, NULL, '2023-02-03 16:33:27'),
(32, 20, NULL, 'aze', '00:09:00', 'aze', '1', 'eaz', '2', 'eaz', '3', 'eaz', '4', NULL, '', '', '', NULL, 3, NULL, '2023-02-03 16:38:58'),
(33, 20, NULL, 'aze 2', '00:14:00', 'aze', '1', 'eaz', '2', 'eaz', '3', 'eaz', '4', NULL, '', '', '', NULL, 3, NULL, '2023-02-03 16:57:51'),
(34, 20, NULL, 'quest 10 poi 12', '00:12:00', 'aze', 'a', 'azea', 'b', 'fdsf', 'c', 'fdsf', 'd', '', '', '', '', '', 5, NULL, '2023-02-03 17:53:34');

-- --------------------------------------------------------

--
-- Table structure for table `response_exam`
--

CREATE TABLE `response_exam` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `exam_id` int(11) DEFAULT NULL,
  `note_by_teacher` int(255) DEFAULT NULL,
  `show_notes` tinyint(4) DEFAULT NULL,
  `file_screen` varchar(255) DEFAULT NULL,
  `file_video` varchar(255) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `response_exam`
--

INSERT INTO `response_exam` (`id`, `teacher_id`, `student_id`, `exam_id`, `note_by_teacher`, `show_notes`, `file_screen`, `file_video`, `date_created`) VALUES
(2, 2, 2, 45, NULL, NULL, NULL, NULL, '2023-01-22 15:19:31'),
(3, 1, 1, 45, NULL, NULL, NULL, NULL, '2023-01-22 15:52:36'),
(4, 2, 1, 46, NULL, NULL, NULL, NULL, '2023-01-23 09:22:55'),
(5, 2, 1, 46, NULL, NULL, NULL, NULL, '2023-01-23 09:26:54'),
(6, 2, 1, 46, NULL, NULL, NULL, NULL, '2023-01-23 09:49:39'),
(7, 2, 1, 46, NULL, NULL, NULL, NULL, '2023-01-23 09:50:42'),
(8, 2, 1, 47, NULL, NULL, NULL, NULL, '2023-01-23 11:26:55'),
(9, 2, 1, 48, NULL, NULL, NULL, NULL, '2023-01-23 11:41:03'),
(10, 3, 3, 51, NULL, NULL, NULL, NULL, '2023-01-24 09:47:22'),
(11, 3, 3, 52, NULL, NULL, NULL, NULL, '2023-01-24 11:48:28'),
(12, 3, 3, 54, NULL, NULL, NULL, NULL, '2023-01-24 15:22:17'),
(13, 3, 3, 54, NULL, NULL, NULL, NULL, '2023-01-24 16:20:08'),
(14, 3, 3, 54, NULL, NULL, NULL, NULL, '2023-01-24 16:20:43'),
(15, 3, 3, 54, NULL, NULL, NULL, NULL, '2023-01-24 16:23:17'),
(16, 3, 3, 54, NULL, NULL, NULL, NULL, '2023-01-24 16:24:36'),
(17, 3, 3, 54, NULL, NULL, NULL, NULL, '2023-01-24 16:26:53'),
(18, 3, 3, 54, NULL, NULL, NULL, NULL, '2023-01-24 16:28:46'),
(19, 3, 3, 54, NULL, NULL, NULL, NULL, '2023-01-24 16:30:21'),
(20, 3, 3, 54, NULL, NULL, NULL, NULL, '2023-01-25 09:54:15'),
(21, 3, 3, 54, NULL, NULL, '3053232799646355.webm', '', '2023-01-25 10:16:47'),
(22, 3, 3, 54, NULL, NULL, '27966648890778754.webm', '', '2023-01-25 10:21:17'),
(23, 3, 3, 54, NULL, NULL, '7565611598425877.webm', '6469225170903536.webm', '2023-01-25 11:13:26'),
(24, 3, 3, 54, NULL, NULL, '40532806558744585.webm', '30167481440355505.webm', '2023-01-25 12:29:27'),
(25, 3, 3, 54, NULL, NULL, '6998150135314197.webm', '7126474377203458.webm', '2023-01-25 14:29:25'),
(26, 3, 3, 54, NULL, NULL, '8647621824188578.webm', '9209560979193177.webm', '2023-01-25 15:48:57'),
(27, 3, 3, 56, NULL, NULL, '', '', '2023-01-26 14:30:25'),
(28, 3, 3, 56, NULL, NULL, '2614106531255243.webm', '21615900807581134.webm', '2023-01-26 14:34:01'),
(29, 3, 3, 56, NULL, NULL, '730096817163587.webm', '6949483853269592.webm', '2023-01-26 14:38:05'),
(30, 3, 3, 62, NULL, NULL, '6835666242398632.webm', '42049901141624747.webm', '2023-01-27 13:02:18'),
(31, 3, 3, 62, NULL, NULL, '', '36330987743090515.webm', '2023-01-27 13:04:42'),
(32, 3, 3, 62, NULL, NULL, '', '10123125746454886.webm', '2023-01-27 13:05:42'),
(33, 3, 3, 62, NULL, NULL, '', '6321623213740426.webm', '2023-01-27 21:44:25'),
(34, 3, 3, 62, NULL, NULL, '', '13620717623852642.webm', '2023-01-27 21:47:10'),
(35, 3, 3, 65, NULL, NULL, '', '4243502434487154.webm', '2023-01-27 21:50:07'),
(36, 3, 3, 65, NULL, NULL, '', '4610970254819948.webm', '2023-01-30 10:52:18'),
(37, 2, 2, 45, NULL, NULL, '', '', '2023-01-30 12:12:02'),
(38, 2, 2, 45, NULL, NULL, '', '', '2023-01-30 12:13:49'),
(39, 3, 3, 59, NULL, NULL, '', '', '2023-01-30 17:29:37'),
(40, 3, 3, 76, NULL, NULL, '', '', '2023-01-30 18:09:39'),
(41, 3, 3, 78, NULL, NULL, '', '', '2023-01-30 22:23:38'),
(42, 3, 3, 78, NULL, NULL, '', '', '2023-01-30 22:45:20'),
(43, 3, 3, 80, NULL, NULL, '3403744279967915.webm', '', '2023-01-31 13:12:41'),
(44, 3, 3, 83, NULL, NULL, '42584854482283487.webm', '', '2023-02-03 16:50:22'),
(45, 3, 3, 81, NULL, NULL, '6327444651556275.webm', '', '2023-02-03 17:00:52'),
(46, 3, 3, 81, NULL, NULL, '1790814133522296.webm', '', '2023-02-03 17:03:51'),
(47, 3, 3, 81, 12, NULL, '43597615251049416.webm', '', '2023-02-03 17:35:41'),
(48, 3, 3, 94, 11, 1, '', NULL, '2023-02-08 18:06:36'),
(49, 3, 3, 96, NULL, NULL, '', '', '2023-02-17 16:20:03'),
(50, 3, 3, 97, NULL, NULL, '', '', '2023-02-20 16:31:36'),
(51, 3, 3, 97, NULL, NULL, '', '', '2023-02-20 16:48:36'),
(52, 3, 3, 97, 5, NULL, '', '', '2023-02-20 17:07:01'),
(53, 3, 3, 97, NULL, NULL, '', '', '2023-02-21 12:08:01'),
(54, 3, 3, 97, NULL, NULL, '', '', '2023-02-21 12:43:38');

-- --------------------------------------------------------

--
-- Table structure for table `response_question_long_text`
--

CREATE TABLE `response_question_long_text` (
  `id` int(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `question_long_id` int(11) NOT NULL,
  `reponse_long_text` varchar(255) DEFAULT NULL,
  `correct_long_text` varchar(255) DEFAULT NULL,
  `note_by_teacher` int(20) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `response_question_long_text`
--

INSERT INTO `response_question_long_text` (`id`, `user_id`, `teacher_id`, `student_id`, `exam_id`, `question_long_id`, `reponse_long_text`, `correct_long_text`, `note_by_teacher`, `date_created`) VALUES
(1, 11, 1, 1, 20, 9, 'test exam', 'tartib', NULL, '2023-01-18 10:12:20'),
(2, 11, 1, 1, 21, 10, 'reponse tartiba', 'tartiba', NULL, '2023-01-18 10:17:32'),
(3, 11, 1, 1, 21, 10, 'answer', 'tartiba', NULL, '2023-01-20 15:25:48'),
(4, 11, 2, 1, 44, 17, 'dsfs', 'quest 2', NULL, '2023-01-22 14:25:03'),
(5, 11, 2, 1, 44, 18, 'fdgdg', 'quest 3', NULL, '2023-01-22 14:25:03'),
(6, 11, 2, 1, 45, 19, 'answer long 1', 'corect by teacher', NULL, '2023-01-22 14:50:06'),
(7, 11, 2, 1, 45, 19, 'trst passed exam', 'corect by teacher', NULL, '2023-01-22 15:18:05'),
(8, 11, 2, 1, 45, 19, 'test3  exam passe mark', 'corect by teacher', NULL, '2023-01-22 15:19:31'),
(9, 21, 3, 3, 54, 22, 'rzer', 'zer', NULL, '2023-01-24 15:22:17'),
(10, 21, 3, 3, 54, 22, 'fsd', 'zer', NULL, '2023-01-24 16:20:08'),
(11, 21, 3, 3, 54, 22, 'zeaea', 'zer', NULL, '2023-01-24 16:20:42'),
(12, 21, 3, 3, 54, 22, 'dsf', 'zer', NULL, '2023-01-24 16:23:17'),
(13, 21, 3, 3, 54, 22, 'dsf', 'zer', NULL, '2023-01-24 16:24:36'),
(14, 21, 3, 3, 54, 22, 'dsfs', 'zer', NULL, '2023-01-24 16:26:53'),
(15, 21, 3, 3, 54, 22, 'zaeaze', 'zer', NULL, '2023-01-24 16:28:46'),
(16, 21, 3, 3, 54, 22, 'zaeae', 'zer', NULL, '2023-01-24 16:30:21'),
(17, 21, 3, 3, 54, 22, 'sdf', 'zer', NULL, '2023-01-25 09:54:15'),
(18, 21, 3, 3, 54, 22, 'fsd', 'zer', NULL, '2023-01-25 10:07:36'),
(19, 21, 3, 3, 54, 22, 'sdfdsf', 'zer', NULL, '2023-01-25 10:10:12'),
(20, 21, 3, 3, 54, 22, 'dfsd', 'zer', NULL, '2023-01-25 10:10:46'),
(21, 21, 3, 3, 54, 22, 'dfsdfsd', 'zer', NULL, '2023-01-25 10:12:28'),
(22, 21, 3, 3, 54, 22, 'dfsdfsd', 'zer', NULL, '2023-01-25 10:12:47'),
(23, 21, 3, 3, 54, 22, 'dsfsdf', 'zer', NULL, '2023-01-25 10:16:47'),
(24, 21, 3, 3, 54, 22, 'sdfdsf', 'zer', NULL, '2023-01-25 10:21:17'),
(25, 21, 3, 3, 54, 22, 'dsf', 'zer', NULL, '2023-01-25 10:23:45'),
(26, 21, 3, 3, 54, 22, 'dsf', 'zer', NULL, '2023-01-25 10:24:55'),
(27, 21, 3, 3, 54, 22, 'sdf', 'zer', NULL, '2023-01-25 10:27:05'),
(28, 21, 3, 3, 54, 22, 'sdfsf', 'zer', NULL, '2023-01-25 10:37:10'),
(29, 21, 3, 3, 54, 22, 'dfs', 'zer', NULL, '2023-01-25 10:38:25'),
(30, 21, 3, 3, 54, 22, 'fsdf', 'zer', NULL, '2023-01-25 10:39:28'),
(31, 21, 3, 3, 54, 22, 'dsfs', 'zer', NULL, '2023-01-25 10:41:25'),
(32, 21, 3, 3, 54, 22, 'dsfdsf', 'zer', NULL, '2023-01-25 10:42:21'),
(33, 21, 3, 3, 54, 22, 'zaeaz', 'zer', NULL, '2023-01-25 10:51:15'),
(34, 21, 3, 3, 54, 22, 'fdsf', 'zer', NULL, '2023-01-25 10:53:59'),
(35, 21, 3, 3, 54, 22, 'sdf', 'zer', NULL, '2023-01-25 10:56:55'),
(36, 21, 3, 3, 54, 22, 'sdfds', 'zer', NULL, '2023-01-25 10:58:04'),
(37, 21, 3, 3, 54, 22, 'sdf', 'zer', NULL, '2023-01-25 10:59:38'),
(38, 21, 3, 3, 54, 22, 'fdsf', 'zer', NULL, '2023-01-25 11:11:48'),
(39, 21, 3, 3, 54, 22, 'fdsf', 'zer', NULL, '2023-01-25 11:13:26'),
(40, 21, 3, 3, 54, 22, 'fsdf', 'zer', NULL, '2023-01-25 12:29:27'),
(41, 21, 3, 3, 54, 22, 'gfdgd', 'zer', NULL, '2023-01-25 14:29:25'),
(42, 21, 3, 3, 54, 22, 'test', 'zer', NULL, '2023-01-25 15:48:57'),
(43, 18, 2, 2, 45, 19, 'tst order', 'corect by teacher', NULL, '2023-01-30 12:12:02'),
(44, 18, 2, 2, 45, 19, 'test order 2', 'corect by teacher', NULL, '2023-01-30 12:13:49'),
(45, 21, 3, 3, 81, 23, 'aze', 'corrrectly', NULL, '2023-02-03 17:35:41'),
(46, 21, 3, 3, 94, 26, 'sdfs', 'corect by teacher', 7, '2023-02-08 18:06:36'),
(47, 21, 3, 3, 96, 28, 'test retake', 'corect by teacher', NULL, '2023-02-17 16:20:03');

-- --------------------------------------------------------

--
-- Table structure for table `response_question_multi_choice`
--

CREATE TABLE `response_question_multi_choice` (
  `id` int(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `question_multi_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `is_single_choice` tinyint(4) DEFAULT NULL,
  `response_option_1` varchar(255) DEFAULT NULL,
  `response_option_2` varchar(255) DEFAULT NULL,
  `response_option_3` varchar(255) DEFAULT NULL,
  `response_option_4` varchar(255) DEFAULT NULL,
  `response_option_5` varchar(255) DEFAULT NULL,
  `response_option_6` varchar(255) DEFAULT NULL,
  `note_by_teacher` int(20) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `response_question_multi_choice`
--

INSERT INTO `response_question_multi_choice` (`id`, `user_id`, `teacher_id`, `student_id`, `question_multi_id`, `exam_id`, `title`, `is_single_choice`, `response_option_1`, `response_option_2`, `response_option_3`, `response_option_4`, `response_option_5`, `response_option_6`, `note_by_teacher`, `date_created`) VALUES
(1, 11, 2, 1, 48, 19, NULL, NULL, 'aze1', 'aze1', 'aze1', 'aze1', NULL, NULL, NULL, '2023-01-17 15:24:16'),
(4, 11, 2, 1, 48, 19, NULL, NULL, 'aze1', 'aze1', 'aze1', 'aze1', NULL, NULL, NULL, '2023-01-17 15:26:44'),
(5, 11, 2, 1, 48, 19, NULL, NULL, 'aze1', 'aze1', 'aze1', 'aze1', NULL, NULL, NULL, '2023-01-18 09:22:30'),
(6, 11, 2, 1, 49, 19, NULL, NULL, 'fdsfdfsdf', 'fdsfdfsdf', 'fdsfdfsdf', 'fdsfdfsdf', NULL, NULL, NULL, '2023-01-18 09:22:30'),
(7, 11, 2, 1, 48, 19, NULL, NULL, 'aze1', 'aze1', 'aze1', 'aze1', NULL, NULL, NULL, '2023-01-18 09:22:42'),
(8, 11, 2, 1, 49, 19, NULL, NULL, 'fdsfdfsdf', 'fdsfdfsdf', 'fdsfdfsdf', 'fdsfdfsdf', NULL, NULL, NULL, '2023-01-18 09:22:42'),
(9, 11, 2, 1, 48, 19, NULL, NULL, 'aze1', 'aze1', 'aze1', 'aze1', NULL, NULL, NULL, '2023-01-18 09:26:05'),
(10, 11, 2, 1, 49, 19, NULL, NULL, 'fdsfdfsdf', 'fdsfdfsdf', 'fdsfdfsdf', 'fdsfdfsdf', NULL, NULL, NULL, '2023-01-18 09:26:05'),
(11, 11, 2, 1, 48, 19, NULL, NULL, 'aze1', 'aze1', 'aze1', 'aze1', NULL, NULL, NULL, '2023-01-18 09:35:03'),
(12, 11, 2, 1, 49, 19, NULL, NULL, 'fdsfdfsdf', 'fdsfdfsdf', 'fdsfdfsdf', 'fdsfdfsdf', NULL, NULL, NULL, '2023-01-18 09:35:03'),
(13, 11, 2, 1, 48, 19, NULL, NULL, 'aze1', 'aze1', 'aze1', 'aze1', NULL, NULL, NULL, '2023-01-18 09:35:18'),
(14, 11, 2, 1, 49, 19, NULL, NULL, 'fdsfdfsdf', 'fdsfdfsdf', 'fdsfdfsdf', 'fdsfdfsdf', NULL, NULL, NULL, '2023-01-18 09:35:18'),
(15, 11, 2, 1, 48, 19, NULL, NULL, 'aze1', 'aze1', 'aze1', 'aze1', NULL, NULL, NULL, '2023-01-18 09:39:27'),
(16, 11, 2, 1, 49, 19, NULL, NULL, 'fdsfdfsdf', 'fdsfdfsdf', 'fdsfdfsdf', 'fdsfdfsdf', NULL, NULL, NULL, '2023-01-18 09:39:27'),
(17, 11, 2, 1, 48, 19, NULL, NULL, 'aze1', 'aze1', 'aze1', 'aze1', NULL, NULL, NULL, '2023-01-18 09:40:57'),
(18, 11, 2, 1, 49, 19, NULL, NULL, 'fdsfdfsdf', 'fdsfdfsdf', 'fdsfdfsdf', 'fdsfdfsdf', NULL, NULL, NULL, '2023-01-18 09:40:57'),
(19, 11, 2, 1, 48, 19, NULL, NULL, 'aze1', 'aze1', 'aze1', 'aze1', NULL, NULL, NULL, '2023-01-18 09:41:24'),
(20, 11, 2, 1, 49, 19, NULL, NULL, 'fdsfdfsdf', 'fdsfdfsdf', 'fdsfdfsdf', 'fdsfdfsdf', NULL, NULL, NULL, '2023-01-18 09:41:24'),
(21, 11, 2, 1, 48, 19, NULL, NULL, 'aze1', 'aze1', 'aze1', 'aze1', NULL, NULL, NULL, '2023-01-18 09:44:08'),
(22, 11, 2, 1, 49, 19, NULL, NULL, 'fdsfdfsdf', 'fdsfdfsdf', 'fdsfdfsdf', 'fdsfdfsdf', NULL, NULL, NULL, '2023-01-18 09:44:08'),
(23, 11, 2, 1, 48, 19, NULL, NULL, 'aze1', 'aze1', 'aze1', 'aze1', NULL, NULL, NULL, '2023-01-18 09:49:01'),
(24, 11, 2, 1, 49, 19, NULL, NULL, 'fdsfdfsdf', 'fdsfdfsdf', 'fdsfdfsdf', 'fdsfdfsdf', NULL, NULL, NULL, '2023-01-18 09:49:01'),
(25, 11, 2, 1, 48, 19, NULL, NULL, 'aze1', 'aze1', 'aze1', 'aze1', NULL, NULL, NULL, '2023-01-18 09:52:36'),
(26, 11, 2, 1, 49, 19, NULL, NULL, 'fdsfdfsdf', 'fdsfdfsdf', 'fdsfdfsdf', 'fdsfdfsdf', NULL, NULL, NULL, '2023-01-18 09:52:36'),
(27, 11, 2, 1, 48, 19, NULL, NULL, 'aze1', 'aze1', 'aze1', 'aze1', NULL, NULL, NULL, '2023-01-18 09:52:52'),
(28, 11, 2, 1, 49, 19, NULL, NULL, 'fdsfdfsdf', 'fdsfdfsdf', 'fdsfdfsdf', 'fdsfdfsdf', NULL, NULL, NULL, '2023-01-18 09:52:52'),
(29, 11, 2, 1, 48, 19, NULL, NULL, 'aze1', 'aze1', 'aze1', 'aze1', NULL, NULL, NULL, '2023-01-18 10:02:26'),
(30, 11, 2, 1, 49, 19, NULL, NULL, 'fdsfdfsdf', 'fdsfdfsdf', 'fdsfdfsdf', 'fdsfdfsdf', NULL, NULL, NULL, '2023-01-18 10:02:26'),
(31, 11, 2, 1, 48, 19, NULL, NULL, 'aze1', 'aze1', 'aze1', 'aze1', NULL, NULL, NULL, '2023-01-18 10:03:09'),
(32, 11, 2, 1, 49, 19, NULL, NULL, 'fdsfdfsdf', 'fdsfdfsdf', 'fdsfdfsdf', 'fdsfdfsdf', NULL, NULL, NULL, '2023-01-18 10:03:09'),
(33, 11, 1, 1, 50, 20, NULL, NULL, 'eaz', 'eaz', 'eaz', 'eaz', NULL, NULL, NULL, '2023-01-18 10:12:20'),
(34, 11, 1, 1, 51, 21, NULL, NULL, 'zaeazesdq', 'zaeazesdq', 'zaeazesdq', 'zaeazesdq', NULL, NULL, NULL, '2023-01-18 10:17:32'),
(35, 11, 1, 1, 52, 22, NULL, NULL, 'rez', 'rez', 'rez', 'rez', NULL, NULL, NULL, '2023-01-18 15:49:11'),
(36, 11, 2, 1, 63, 33, NULL, NULL, 'zzz', 'eee', NULL, NULL, NULL, NULL, NULL, '2023-01-20 12:17:21'),
(37, 11, 2, 1, 64, 33, NULL, NULL, 'qqqq', 'dddd', NULL, NULL, NULL, NULL, NULL, '2023-01-20 12:17:21'),
(38, 11, 2, 1, 63, 33, NULL, NULL, 'zzz', 'eee', '', '', NULL, '', NULL, '2023-01-20 12:17:29'),
(39, 11, 2, 1, 64, 33, NULL, NULL, 'qqqq', 'dddd', '', '', NULL, '', NULL, '2023-01-20 12:17:29'),
(40, 11, 2, 1, 65, 35, NULL, NULL, 'aaa', 'aaa', 'aaa', 'aaa', 'aaa', 'aaa', NULL, '2023-01-20 12:28:40'),
(41, 11, 2, 1, 65, 35, NULL, NULL, 'aaa', 'aaa', 'aaa', 'aaa', 'aaa', 'aaa', NULL, '2023-01-20 12:30:17'),
(42, 11, 2, 1, 66, 36, NULL, NULL, 'ss', 'dd', '', '', NULL, '', NULL, '2023-01-20 15:01:04'),
(43, 11, 1, 1, 51, 21, NULL, NULL, 'zaeazesdq', 'zaeazesdq', 'zaeazesdq', 'zaeazesdq', 'zaeazesdq', 'zaeazesdq', NULL, '2023-01-20 15:25:48'),
(44, 11, 2, 1, 73, 44, NULL, NULL, 'sdfs', '', '', '', NULL, '', NULL, '2023-01-22 14:25:02'),
(45, 11, 2, 1, 74, 44, NULL, NULL, 'gfdg', 'gfdg', 'gfdg', 'gfdg', 'gfdg', 'gfdg', NULL, '2023-01-22 14:25:03'),
(46, 11, 2, 1, 76, 46, NULL, NULL, 'fdsf', 'fdsf', 'fdsf', 'fdsf', 'fdsf', 'fdsf', NULL, '2023-01-23 09:22:55'),
(47, 11, 2, 1, 76, 46, NULL, NULL, 'zae', 'zae', 'zae', 'zae', 'zae', 'zae', NULL, '2023-01-23 09:26:53'),
(48, 11, 2, 1, 76, 46, NULL, NULL, 'azea', 'azea', 'azea', 'azea', 'azea', 'azea', NULL, '2023-01-23 09:28:32'),
(49, 11, 2, 1, 76, 46, NULL, NULL, 'azea', 'azea', 'azea', 'azea', 'azea', 'azea', NULL, '2023-01-23 09:29:50'),
(50, 11, 2, 1, 76, 46, NULL, NULL, 'azea', 'azea', 'azea', 'azea', 'azea', 'azea', NULL, '2023-01-23 09:30:10'),
(51, 11, 2, 1, 75, 46, NULL, NULL, 'aze', 'aze', '', '', NULL, '', NULL, '2023-01-23 09:49:39'),
(52, 11, 2, 1, 76, 46, NULL, NULL, 'azea', 'azea', 'azea', 'azea', 'azea', 'azea', NULL, '2023-01-23 09:49:39'),
(53, 11, 2, 1, 75, 46, NULL, NULL, 'eaze', 'qsfq', '', '', NULL, '', 0, '2023-01-23 09:50:42'),
(54, 11, 2, 1, 76, 46, NULL, NULL, 'zae', 'zae', 'zae', 'zae', 'zae', 'zae', 0, '2023-01-23 09:50:42'),
(55, 21, 3, 3, 79, 51, NULL, NULL, 'ezae', 'ezae', 'ezae', 'ezae', 'ezae', 'ezae', 12, '2023-01-24 09:47:22'),
(56, 21, 3, 3, 80, 52, NULL, NULL, 'eaze', 'eaze', 'eaze', 'eaze', NULL, '', NULL, '2023-01-24 11:48:28'),
(57, 21, 3, 3, 82, 54, NULL, NULL, 'azeaz', 'azeaz', 'azeaz', 'azeaz', 'azeaz', 'azeaz', NULL, '2023-01-24 15:22:17'),
(58, 21, 3, 3, 82, 54, NULL, NULL, 'aze', 'aze', 'aze', 'aze', 'aze', 'aze', NULL, '2023-01-24 16:20:42'),
(59, 21, 3, 3, 83, 54, NULL, NULL, 'fsg', 'fsg', 'fsg', 'fsg', 'fsg', 'fsg', NULL, '2023-01-24 16:20:42'),
(60, 21, 3, 3, 82, 54, NULL, NULL, 'aze', 'aze', 'aze', 'aze', 'aze', 'aze', NULL, '2023-01-24 16:23:17'),
(61, 21, 3, 3, 83, 54, NULL, NULL, 'dgfgfd', 'dgfgfd', 'dgfgfd', 'dgfgfd', 'dgfgfd', 'dgfgfd', NULL, '2023-01-24 16:23:17'),
(62, 21, 3, 3, 82, 54, NULL, NULL, 'eaze', 'eaze', 'eaze', 'eaze', 'eaze', 'eaze', NULL, '2023-01-24 16:24:36'),
(63, 21, 3, 3, 83, 54, NULL, NULL, 'dfg', 'dfg', 'dfg', 'dfg', 'dfg', 'dfg', NULL, '2023-01-24 16:24:36'),
(64, 21, 3, 3, 82, 54, NULL, NULL, 'zae', 'zae', 'zae', 'zae', 'zae', 'zae', NULL, '2023-01-24 16:26:53'),
(65, 21, 3, 3, 83, 54, NULL, NULL, 'fdg', 'fdg', 'fdg', 'fdg', 'fdg', 'fdg', NULL, '2023-01-24 16:26:53'),
(66, 21, 3, 3, 82, 54, NULL, NULL, 'aze', 'aze', 'aze', 'aze', 'aze', 'aze', NULL, '2023-01-24 16:28:46'),
(67, 21, 3, 3, 83, 54, NULL, NULL, 'dfg', 'dfg', 'dfg', 'dfg', 'dfg', 'dfg', NULL, '2023-01-24 16:28:46'),
(68, 21, 3, 3, 82, 54, NULL, NULL, 'eaze', 'eaze', 'eaze', 'eaze', 'eaze', 'eaze', NULL, '2023-01-24 16:30:21'),
(69, 21, 3, 3, 83, 54, NULL, NULL, 'fdg', 'fdg', 'fdg', 'fdg', 'fdg', 'fdg', NULL, '2023-01-24 16:30:21'),
(70, 21, 3, 3, 82, 54, NULL, NULL, 'eaze', 'eaze', 'eaze', 'eaze', 'eaze', 'eaze', NULL, '2023-01-25 09:54:15'),
(71, 21, 3, 3, 83, 54, NULL, NULL, 'fdg', 'fdg', 'fdg', 'fdg', 'fdg', 'fdg', NULL, '2023-01-25 09:54:15'),
(72, 21, 3, 3, 82, 54, NULL, NULL, 'azeaz', 'azeaz', 'azeaz', 'azeaz', 'azeaz', 'azeaz', NULL, '2023-01-25 10:07:36'),
(73, 21, 3, 3, 83, 54, NULL, NULL, 'dfg', 'dfg', 'dfg', 'dfg', 'dfg', 'dfg', NULL, '2023-01-25 10:07:36'),
(74, 21, 3, 3, 82, 54, NULL, NULL, 'aze', 'aze', 'aze', 'aze', 'aze', 'aze', NULL, '2023-01-25 10:10:12'),
(75, 21, 3, 3, 83, 54, NULL, NULL, 'fdg', 'fdg', 'fdg', 'fdg', 'fdg', 'fdg', NULL, '2023-01-25 10:10:12'),
(76, 21, 3, 3, 82, 54, NULL, NULL, 'azeaz', 'azeaz', 'azeaz', 'azeaz', 'azeaz', 'azeaz', NULL, '2023-01-25 10:10:46'),
(77, 21, 3, 3, 83, 54, NULL, NULL, 'dfg', 'dfg', 'dfg', 'dfg', 'dfg', 'dfg', NULL, '2023-01-25 10:10:46'),
(78, 21, 3, 3, 82, 54, NULL, NULL, 'azeaz', 'azeaz', 'azeaz', 'azeaz', 'azeaz', 'azeaz', NULL, '2023-01-25 10:12:28'),
(79, 21, 3, 3, 83, 54, NULL, NULL, 'fsg', 'fsg', 'fsg', 'fsg', 'fsg', 'fsg', NULL, '2023-01-25 10:12:28'),
(80, 21, 3, 3, 82, 54, NULL, NULL, 'azeaz', 'azeaz', 'azeaz', 'azeaz', 'azeaz', 'azeaz', NULL, '2023-01-25 10:12:47'),
(81, 21, 3, 3, 83, 54, NULL, NULL, 'fsg', 'fsg', 'fsg', 'fsg', 'fsg', 'fsg', NULL, '2023-01-25 10:12:47'),
(82, 21, 3, 3, 82, 54, NULL, NULL, 'aze', 'aze', 'aze', 'aze', 'aze', 'aze', NULL, '2023-01-25 10:16:47'),
(83, 21, 3, 3, 83, 54, NULL, NULL, 'dfg', 'dfg', 'dfg', 'dfg', 'dfg', 'dfg', NULL, '2023-01-25 10:16:47'),
(84, 21, 3, 3, 82, 54, NULL, NULL, 'azeaz', 'azeaz', 'azeaz', 'azeaz', 'azeaz', 'azeaz', NULL, '2023-01-25 10:21:17'),
(85, 21, 3, 3, 83, 54, NULL, NULL, 'dfg', 'dfg', 'dfg', 'dfg', 'dfg', 'dfg', NULL, '2023-01-25 10:21:17'),
(86, 21, 3, 3, 82, 54, NULL, NULL, 'zae', 'zae', 'zae', 'zae', 'zae', 'zae', NULL, '2023-01-25 10:23:45'),
(87, 21, 3, 3, 83, 54, NULL, NULL, 'dfg', 'dfg', 'dfg', 'dfg', 'dfg', 'dfg', NULL, '2023-01-25 10:23:45'),
(88, 21, 3, 3, 82, 54, NULL, NULL, 'zae', 'zae', 'zae', 'zae', 'zae', 'zae', NULL, '2023-01-25 10:24:55'),
(89, 21, 3, 3, 83, 54, NULL, NULL, 'dfg', 'dfg', 'dfg', 'dfg', 'dfg', 'dfg', NULL, '2023-01-25 10:24:55'),
(90, 21, 3, 3, 82, 54, NULL, NULL, 'aze', 'aze', 'aze', 'aze', 'aze', 'aze', NULL, '2023-01-25 10:27:05'),
(91, 21, 3, 3, 83, 54, NULL, NULL, 'dfg', 'dfg', 'dfg', 'dfg', 'dfg', 'dfg', NULL, '2023-01-25 10:27:05'),
(92, 21, 3, 3, 82, 54, NULL, NULL, 'azeaz', 'azeaz', 'azeaz', 'azeaz', 'azeaz', 'azeaz', NULL, '2023-01-25 10:37:10'),
(93, 21, 3, 3, 83, 54, NULL, NULL, 'fdg', 'fdg', 'fdg', 'fdg', 'fdg', 'fdg', NULL, '2023-01-25 10:37:10'),
(94, 21, 3, 3, 82, 54, NULL, NULL, 'azeaz', 'azeaz', 'azeaz', 'azeaz', 'azeaz', 'azeaz', NULL, '2023-01-25 10:38:25'),
(95, 21, 3, 3, 83, 54, NULL, NULL, 'dfg', 'dfg', 'dfg', 'dfg', 'dfg', 'dfg', NULL, '2023-01-25 10:38:25'),
(96, 21, 3, 3, 82, 54, NULL, NULL, 'zae', 'zae', 'zae', 'zae', 'zae', 'zae', NULL, '2023-01-25 10:39:28'),
(97, 21, 3, 3, 82, 54, NULL, NULL, 'azeaz', 'azeaz', 'azeaz', 'azeaz', 'azeaz', 'azeaz', NULL, '2023-01-25 10:41:24'),
(98, 21, 3, 3, 83, 54, NULL, NULL, 'fsg', 'fsg', 'fsg', 'fsg', 'fsg', 'fsg', NULL, '2023-01-25 10:41:25'),
(99, 21, 3, 3, 82, 54, NULL, NULL, 'zae', 'zae', 'zae', 'zae', 'zae', 'zae', NULL, '2023-01-25 10:42:21'),
(100, 21, 3, 3, 83, 54, NULL, NULL, 'fsg', 'fsg', 'fsg', 'fsg', 'fsg', 'fsg', NULL, '2023-01-25 10:42:21'),
(101, 21, 3, 3, 82, 54, NULL, NULL, 'zae', 'zae', 'zae', 'zae', 'zae', 'zae', NULL, '2023-01-25 10:51:15'),
(102, 21, 3, 3, 83, 54, NULL, NULL, 'fdg', 'fdg', 'fdg', 'fdg', 'fdg', 'fdg', NULL, '2023-01-25 10:51:15'),
(103, 21, 3, 3, 82, 54, NULL, NULL, 'aze', 'aze', 'aze', 'aze', 'aze', 'aze', NULL, '2023-01-25 10:53:59'),
(104, 21, 3, 3, 83, 54, NULL, NULL, 'fdg', 'fdg', 'fdg', 'fdg', 'fdg', 'fdg', NULL, '2023-01-25 10:53:59'),
(105, 21, 3, 3, 82, 54, NULL, NULL, 'aze', 'aze', 'aze', 'aze', 'aze', 'aze', NULL, '2023-01-25 10:56:55'),
(106, 21, 3, 3, 83, 54, NULL, NULL, 'fdg', 'fdg', 'fdg', 'fdg', 'fdg', 'fdg', NULL, '2023-01-25 10:56:55'),
(107, 21, 3, 3, 82, 54, NULL, NULL, 'eaze', 'eaze', 'eaze', 'eaze', 'eaze', 'eaze', NULL, '2023-01-25 10:58:04'),
(108, 21, 3, 3, 83, 54, NULL, NULL, 'dgfgfd', 'dgfgfd', 'dgfgfd', 'dgfgfd', 'dgfgfd', 'dgfgfd', NULL, '2023-01-25 10:58:04'),
(109, 21, 3, 3, 82, 54, NULL, NULL, 'aze', 'aze', 'aze', 'aze', 'aze', 'aze', NULL, '2023-01-25 10:59:38'),
(110, 21, 3, 3, 83, 54, NULL, NULL, 'dgfgfd', 'dgfgfd', 'dgfgfd', 'dgfgfd', 'dgfgfd', 'dgfgfd', NULL, '2023-01-25 10:59:38'),
(111, 21, 3, 3, 82, 54, NULL, NULL, 'azeaz', 'azeaz', 'azeaz', 'azeaz', 'azeaz', 'azeaz', NULL, '2023-01-25 11:11:48'),
(112, 21, 3, 3, 83, 54, NULL, NULL, 'fdg', 'fdg', 'fdg', 'fdg', 'fdg', 'fdg', NULL, '2023-01-25 11:11:48'),
(113, 21, 3, 3, 82, 54, NULL, NULL, 'azeaz', 'azeaz', 'azeaz', 'azeaz', 'azeaz', 'azeaz', NULL, '2023-01-25 11:13:26'),
(114, 21, 3, 3, 83, 54, NULL, NULL, 'fdg', 'fdg', 'fdg', 'fdg', 'fdg', 'fdg', NULL, '2023-01-25 11:13:26'),
(115, 21, 3, 3, 82, 54, NULL, NULL, 'aze', 'aze', 'aze', 'aze', 'aze', 'aze', NULL, '2023-01-25 12:29:27'),
(116, 21, 3, 3, 83, 54, NULL, NULL, 'dfg', 'dfg', 'dfg', 'dfg', 'dfg', 'dfg', NULL, '2023-01-25 12:29:27'),
(117, 21, 3, 3, 82, 54, NULL, NULL, 'eaze', 'eaze', 'eaze', 'eaze', 'eaze', 'eaze', 0, '2023-01-25 14:29:25'),
(118, 21, 3, 3, 83, 54, NULL, NULL, 'dfg', 'dfg', 'dfg', 'dfg', 'dfg', 'dfg', 1, '2023-01-25 14:29:25'),
(119, 21, 3, 3, 82, 54, NULL, NULL, 'eaze', 'eaze', 'eaze', 'eaze', 'eaze', 'eaze', 0, '2023-01-25 15:48:57'),
(120, 21, 3, 3, 83, 54, NULL, NULL, 'dfg', 'dfg', 'dfg', 'dfg', 'dfg', 'dfg', 1, '2023-01-25 15:48:57'),
(121, 21, 3, 3, 85, 56, NULL, NULL, 'eaz', 'eaz', 'eaz', 'eaz', 'eaz', 'eaz', NULL, '2023-01-26 14:34:01'),
(122, 21, 3, 3, 85, 56, NULL, NULL, 'eaz', 'eaz', 'eaz', 'eaz', 'eaz', 'eaz', 4, '2023-01-26 14:38:05'),
(123, 18, 2, 2, 68, 45, NULL, NULL, 'rezr', '', '', '', NULL, '', NULL, '2023-01-30 12:12:02'),
(124, 18, 2, 2, 68, 45, NULL, NULL, 'rez', 'rez', '', '', NULL, '', NULL, '2023-01-30 12:13:49'),
(125, 21, 3, 3, 92, 80, NULL, NULL, 'eaze', 'eaze', 'eaze', 'eaze', 'eaze', 'eaze', 4, '2023-01-31 13:12:41'),
(126, 21, 3, 3, 95, 83, NULL, NULL, 'eaz', 'eaz', 'eaz', '', NULL, '', 0, '2023-02-03 16:50:22'),
(127, 21, 3, 3, 93, 81, NULL, NULL, 'aze', 'eaz', 'eaz', 'eaz', NULL, '', 0, '2023-02-03 17:00:52'),
(128, 21, 3, 3, 93, 81, NULL, NULL, 'aze', 'eaz', 'eaz', 'eaz', NULL, '', NULL, '2023-02-03 17:03:51'),
(129, 21, 3, 3, 93, 81, NULL, NULL, 'aze', 'eaz', 'eaz', 'eaz', NULL, '', NULL, '2023-02-03 17:35:41'),
(130, 21, 3, 3, 105, 94, NULL, NULL, 'fsdf', 'fsdf', 'fsdf', 'fsdf', 'fsdf', 'fsdf', 4, '2023-02-08 18:06:36');

-- --------------------------------------------------------

--
-- Table structure for table `response_question_span`
--

CREATE TABLE `response_question_span` (
  `id` int(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `question_span_id` int(11) NOT NULL,
  `reponse_span` varchar(1255) DEFAULT NULL,
  `correct_span` varchar(1255) DEFAULT NULL,
  `note_by_teacher` int(20) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `response_question_span`
--

INSERT INTO `response_question_span` (`id`, `user_id`, `teacher_id`, `student_id`, `exam_id`, `question_span_id`, `reponse_span`, `correct_span`, `note_by_teacher`, `date_created`) VALUES
(1, 21, 3, 3, 62, 7, 'Lorem  Ipsum is simply dummy text of the akram 																												 printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to ', 'Lorem  Ipsum is simply dummy text of the ¤yahia¤ printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ', NULL, '2023-01-27 13:02:18'),
(2, 21, 3, 3, 62, 7, 'Lorem  Ipsum is simply dummy text of the akram 																												 printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to ', 'Lorem  Ipsum is simply dummy text of the ¤yahia¤ printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ', NULL, '2023-01-27 13:04:42'),
(3, 21, 3, 3, 62, 7, 'Lorem  Ipsum is simply dummy text of the yahia 																												 printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to ', 'Lorem  Ipsum is simply dummy text of the ¤yahia¤ printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ', NULL, '2023-01-27 13:05:42'),
(4, 21, 3, 3, 62, 7, 'Lorem  Ipsum is simply dummy text of the yahia 																												 printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to ', 'Lorem  Ipsum is simply dummy text of the ¤yahia¤ printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ', NULL, '2023-01-27 21:44:25'),
(5, 21, 3, 3, 62, 7, 'Lorem  Ipsum is simply dummy text of the yahia 																												 printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to ', 'Lorem  Ipsum is simply dummy text of the ¤yahia¤ printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ', NULL, '2023-01-27 21:47:10'),
(6, 21, 3, 3, 65, 8, 'Lorem  Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, ali 																												 when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the akram 																												 leap into electronic typesetting, remaining essentially unchanged 																											', 'Lorem  Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, ¤ali¤ when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the ¤akram¤ leap into electronic typesetting, remaining essentially unchanged', 5, '2023-01-27 21:50:07'),
(7, 21, 3, 3, 65, 8, 'Lorem  Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, ali 																												 when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the akram 																												 leap into electronic typesetting, remaining essentially unchangedakram 																											', 'Lorem  Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, ¤ali¤ when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the ¤akram¤ leap into electronic typesetting, remaining essentially unchanged', NULL, '2023-01-30 10:52:18'),
(8, 21, 3, 3, 59, 4, 'Lorem Ipsum is simply yahia dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ', 'Lorem  Ipsum is simply ¤yahia¤ dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,¤akram¤ when an unknown printer took a galley of type and scrambled it to make a type specimen book. ', NULL, '2023-01-30 17:29:37'),
(9, 21, 3, 3, 76, 11, 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى أخرى حد ما- للأحرف عوضاً عن استخداهنا يوجد محتوى نصي، هنا يوجد محتوى نصي فتجعلها تبدو (أي الأحرف) ', 'هناك  حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى ¤شكلي¤ حد ما- للأحرف عوضاً عن استخدا هنا ¤أخرى¤ يوجد محتوى نصي، هنا يوجد محتوى نصي فتجعلها تبدو (أي الأحرف)', NULL, '2023-01-30 18:09:39'),
(10, 21, 3, 3, 78, 13, ' array(2){[143]=>string(4)\"mada\"[187]=>string(5)\"koumt\"} string(5)\"====1\" بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. ¤مدى¤ انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق \"ليتراسيت\" ', 'بل  انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. ¤مدى¤ انتشر بشكل كبير ¤قمت¤ في ستينيّات هذا القرن مع إصدار رقائق \"ليتراسيت\"', NULL, '2023-01-30 22:23:38'),
(11, 21, 3, 3, 78, 13, 'بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. قمت انتشر بشكل كبير مدى في ستينيّات هذا القرن مع إصدار رقائق \"ليتراسيت\" ', 'بل  انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. ¤مدى¤ انتشر بشكل كبير ¤قمت¤ في ستينيّات هذا القرن مع إصدار رقائق \"ليتراسيت\"', 0, '2023-01-30 22:45:20'),
(12, 21, 3, 3, 83, 16, ' ali est a ¤akram¤ cot de ¤kan¤ to ', '																													 ali   																													   																													 est  																													 a  																													 ¤akram¤  																													 cot																										 de  ¤kan¤ 																													 to  																											', 0, '2023-02-03 16:50:22'),
(13, 21, 3, 3, 81, 14, ' ali est a ¤akram¤ cote de to ', '																													 ali  																													   																													 est  																													 a  																													 ¤akram¤  																													 cote  																													 de  																													 to  																											', 0, '2023-02-03 17:00:52'),
(14, 21, 3, 3, 81, 14, 'LEs eleeves sont alomoha en class ', 'LEs  eleeves sont ¤alomoha¤ en class', NULL, '2023-02-03 17:03:51'),
(15, 21, 3, 3, 81, 14, ' lorem ipsum is ¤notthat¤ goo ', '																													 lorem  																													   																													 ipsum  																													 is  																													 ¤not that¤  																													 goo  																											', NULL, '2023-02-03 17:35:41'),
(16, 21, 3, 3, 97, 20, 'There are many variations of passages of Lorem Ipsum available, but ', 'There  are many variations  of passages of Lorem ¤akram¤ \n Ipsum available, but', NULL, '2023-02-20 16:31:36'),
(17, 21, 3, 3, 97, 20, ' There are many variations of passages of Lorem ¤akram¤Ipsum available, but ', 'There  are many variations  of passages of Lorem ¤akram¤ but ...', NULL, '2023-02-20 16:48:36'),
(18, 21, 3, 3, 97, 20, 'if youy akra are astudent at ', 'if  youy ¤akra¤ are astudent at', 5, '2023-02-20 17:07:01'),
(19, 21, 3, 3, 97, 20, ' There are ¤test¤ many ¤not¤ variations ¤ali¤ of passages of Lorem ¤akram¤ but it iscool... There are many variations of passages of Lorem but it iscool... but it iscool... ', '  There are ¤test¤ many ¤not¤ variations ¤ali¤ of passages of Lorem ¤akram¤ but it&nbsp;iscool...  ', NULL, '2023-02-21 12:08:01'),
(20, 21, 3, 3, 97, 20, ' string(103)\" There are ¤testss¤ many variations ¤ali¤ of passages of Lorem ¤akram¤ but ... \" There are ¤testss¤ many variations ¤ali¤ of passages of Lorem ¤akram¤ but ... There are many variations of passages of Lorem but ... ', '&nbsp;There are many variations ¤ali¤ of passages of Lorem ¤akram¤ but ... ', NULL, '2023-02-21 12:43:38');

-- --------------------------------------------------------

--
-- Table structure for table `response_question_tartib`
--

CREATE TABLE `response_question_tartib` (
  `id` int(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `question_tartib_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `reponse_option_to_order_1` varchar(255) DEFAULT NULL,
  `correct_order_1` varchar(255) DEFAULT NULL,
  `reponse_option_to_order_2` varchar(255) DEFAULT NULL,
  `correct_order_2` varchar(255) DEFAULT NULL,
  `reponse_option_to_order_3` varchar(255) DEFAULT NULL,
  `correct_order_3` varchar(255) DEFAULT NULL,
  `reponse_option_to_order_4` varchar(255) DEFAULT NULL,
  `correct_order_4` varchar(255) DEFAULT NULL,
  `reponse_option_to_order_5` varchar(255) DEFAULT NULL,
  `correct_order_5` varchar(255) DEFAULT NULL,
  `reponse_option_to_order_6` varchar(255) DEFAULT NULL,
  `correct_order_6` varchar(255) DEFAULT NULL,
  `note_by_teacher` int(20) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `response_question_tartib`
--

INSERT INTO `response_question_tartib` (`id`, `user_id`, `teacher_id`, `student_id`, `question_tartib_id`, `exam_id`, `reponse_option_to_order_1`, `correct_order_1`, `reponse_option_to_order_2`, `correct_order_2`, `reponse_option_to_order_3`, `correct_order_3`, `reponse_option_to_order_4`, `correct_order_4`, `reponse_option_to_order_5`, `correct_order_5`, `reponse_option_to_order_6`, `correct_order_6`, `note_by_teacher`, `date_created`) VALUES
(1, 11, 2, 1, 5, 19, 'v', 'tartib', 'tartib', 'v', 'tartib', 'tartib', 'tartib', 'tartib', NULL, NULL, NULL, NULL, NULL, '2023-01-18 09:52:52'),
(2, 11, 2, 1, 5, 19, 'v', 'tartib', 'tartib', 'v', 'tartib', 'tartib', 'tartib', 'tartib', NULL, NULL, NULL, NULL, NULL, '2023-01-18 10:02:26'),
(3, 11, 2, 1, 5, 19, 'v', 'tartib', 'tartib', 'v', 'tartib', 'tartib', 'tartib', 'tartib', NULL, NULL, NULL, NULL, NULL, '2023-01-18 10:03:09'),
(4, 11, 1, 1, 6, 21, 'fdsfdsf', 'zea', 'fsdf', 'fdsfdsf', 'gf', 'fsdf', 'zea', 'gf', NULL, NULL, NULL, NULL, NULL, '2023-01-18 10:17:32'),
(5, 11, 2, 1, 7, 35, 'b', 'a', 'a', 'b', 'c', 'c', 'd', 'd', NULL, NULL, NULL, NULL, NULL, '2023-01-20 12:30:17'),
(6, 11, 2, 1, 8, 36, 'az', 'az', 'ay', 'ae', 'ae', 'ar', 'ar', 'at', 'at', 'ay', '', '', NULL, '2023-01-20 15:01:04'),
(7, 11, 1, 1, 6, 21, 'gf', 'zea', 'zea', 'fdsfdsf', 'fsdf', 'fsdf', 'fdsfdsf', 'gf', '', NULL, NULL, NULL, NULL, '2023-01-20 15:25:48'),
(8, 11, 2, 1, 9, 37, 'f', 'a', 'a', 'c', 'd', 'd', 'c', 'e', 'e', 'f', '', '', NULL, '2023-01-20 15:51:46'),
(9, 11, 2, 1, 10, 37, '1', '1', '2', '2', '4', '3', '5', '4', '6', '5', '3', '6', NULL, '2023-01-20 15:51:46'),
(10, 11, 2, 1, 12, 48, 'a', 'a', 'b', 'b', 'c', 'c', 'e', 'd', 'd', 'e', '', '', 0, '2023-01-23 11:41:03'),
(11, 11, 2, 1, 13, 48, '1', '1', '2', '2', '3', '3', '4', '4', '', '', NULL, '', 12, '2023-01-23 11:41:03'),
(12, 21, 3, 3, 15, 51, 'dsf', 'azeaze', 'sdfsd', 'dsf', 'azeaze', 'fdsf', 'fdsf', 'sdfsd', '', '', NULL, '', 0, '2023-01-24 09:47:22'),
(13, 21, 3, 3, 16, 54, 'zae', 'zae', 'aze', 'aze', 'aze', 'aze', 'aze', 'aze', '', '', NULL, '', NULL, '2023-01-24 15:22:17'),
(14, 21, 3, 3, 16, 54, 'aze', 'zae', 'zae', 'aze', 'aze', 'aze', 'aze', 'aze', '', '', NULL, '', NULL, '2023-01-24 16:20:08'),
(15, 21, 3, 3, 16, 54, 'aze', 'zae', 'aze', 'aze', 'zae', 'aze', 'aze', 'aze', '', '', NULL, '', NULL, '2023-01-24 16:20:43'),
(16, 21, 3, 3, 16, 54, NULL, 'zae', NULL, 'aze', NULL, 'aze', NULL, 'aze', NULL, '', NULL, '', NULL, '2023-01-24 16:23:17'),
(17, 21, 3, 3, 16, 54, 'aze', 'zae', 'aze', 'aze', 'aze', 'aze', 'zae', 'aze', '', '', NULL, '', NULL, '2023-01-24 16:24:36'),
(18, 21, 3, 3, 16, 54, 'aze', 'zae', 'zae', 'aze', 'aze', 'aze', 'aze', 'aze', '', '', NULL, '', NULL, '2023-01-24 16:26:53'),
(19, 21, 3, 3, 16, 54, 'aze', 'zae', 'aze', 'aze', 'aze', 'aze', 'zae', 'aze', '', '', NULL, '', NULL, '2023-01-24 16:28:46'),
(20, 21, 3, 3, 16, 54, 'zae', 'zae', 'aze', 'aze', 'aze', 'aze', 'aze', 'aze', '', '', NULL, '', NULL, '2023-01-24 16:30:21'),
(21, 21, 3, 3, 16, 54, 'zae', 'zae', 'aze', 'aze', 'aze', 'aze', 'aze', 'aze', '', '', NULL, '', NULL, '2023-01-25 09:54:15'),
(22, 21, 3, 3, 16, 54, 'aze', 'zae', 'zae', 'aze', 'aze', 'aze', 'aze', 'aze', '', '', NULL, '', NULL, '2023-01-25 10:07:36'),
(23, 21, 3, 3, 16, 54, 'aze', 'zae', 'aze', 'aze', 'zae', 'aze', 'aze', 'aze', '', '', NULL, '', NULL, '2023-01-25 10:10:12'),
(24, 21, 3, 3, 16, 54, 'aze', 'zae', 'aze', 'aze', 'aze', 'aze', 'zae', 'aze', '', '', NULL, '', NULL, '2023-01-25 10:10:46'),
(25, 21, 3, 3, 16, 54, 'aze', 'zae', 'aze', 'aze', 'aze', 'aze', 'zae', 'aze', '', '', NULL, '', NULL, '2023-01-25 10:12:28'),
(26, 21, 3, 3, 16, 54, 'aze', 'zae', 'aze', 'aze', 'aze', 'aze', 'zae', 'aze', '', '', NULL, '', NULL, '2023-01-25 10:12:47'),
(27, 21, 3, 3, 16, 54, 'aze', 'zae', 'aze', 'aze', 'aze', 'aze', 'zae', 'aze', '', '', NULL, '', NULL, '2023-01-25 10:16:47'),
(28, 21, 3, 3, 16, 54, 'zae', 'zae', 'aze', 'aze', 'aze', 'aze', 'aze', 'aze', '', '', NULL, '', NULL, '2023-01-25 10:21:17'),
(29, 21, 3, 3, 16, 54, 'aze', 'zae', 'zae', 'aze', 'aze', 'aze', 'aze', 'aze', '', '', NULL, '', NULL, '2023-01-25 10:23:45'),
(30, 21, 3, 3, 16, 54, 'aze', 'zae', 'zae', 'aze', 'aze', 'aze', 'aze', 'aze', '', '', NULL, '', NULL, '2023-01-25 10:24:55'),
(31, 21, 3, 3, 16, 54, 'aze', 'zae', 'aze', 'aze', 'zae', 'aze', 'aze', 'aze', '', '', '', '', NULL, '2023-01-25 10:27:05'),
(32, 21, 3, 3, 16, 54, '2', 'zae', '3', 'aze', '4', 'aze', '5', 'aze', '6', '', '', '', NULL, '2023-01-25 10:37:10'),
(33, 21, 3, 3, 16, 54, 'zae', 'zae', 'aze', 'aze', 'aze', 'aze', 'aze', 'aze', '', '', '', '', NULL, '2023-01-25 10:38:25'),
(34, 21, 3, 3, 16, 54, 'aze', 'zae', 'aze', 'aze', 'zae', 'aze', 'aze', 'aze', '', '', '', '', NULL, '2023-01-25 10:39:28'),
(35, 21, 3, 3, 16, 54, 'aze', 'zae', 'aze', 'aze', 'aze', 'aze', 'zae', 'aze', '', '', '', '', NULL, '2023-01-25 10:41:25'),
(36, 21, 3, 3, 16, 54, 'zae', 'zae', 'aze', 'aze', 'aze', 'aze', 'aze', 'aze', '', '', '', '', NULL, '2023-01-25 10:42:21'),
(37, 21, 3, 3, 16, 54, 'aze', 'zae', 'zae', 'aze', 'aze', 'aze', 'aze', 'aze', '', '', '', '', NULL, '2023-01-25 10:51:15'),
(38, 21, 3, 3, 16, 54, 'aze', 'zae', 'zae', 'aze', 'aze', 'aze', 'aze', 'aze', '', '', '', '', NULL, '2023-01-25 10:53:59'),
(39, 21, 3, 3, 16, 54, 'zae', 'zae', 'aze', 'aze', 'aze', 'aze', 'aze', 'aze', '', '', '', '', NULL, '2023-01-25 10:56:55'),
(40, 21, 3, 3, 16, 54, 'aze', 'zae', 'zae', 'aze', 'aze', 'aze', 'aze', 'aze', '', '', '', '', NULL, '2023-01-25 10:58:04'),
(41, 21, 3, 3, 16, 54, 'aze', 'zae', 'zae', 'aze', 'aze', 'aze', 'aze', 'aze', '', '', '', '', NULL, '2023-01-25 10:59:38'),
(42, 21, 3, 3, 16, 54, 'aze', 'zae', 'zae', 'aze', 'aze', 'aze', 'aze', 'aze', '', '', '', '', NULL, '2023-01-25 11:11:48'),
(43, 21, 3, 3, 16, 54, 'aze', 'zae', 'zae', 'aze', 'aze', 'aze', 'aze', 'aze', '', '', '', '', NULL, '2023-01-25 11:13:26'),
(44, 21, 3, 3, 16, 54, 'zae', 'zae', 'aze', 'aze', 'aze', 'aze', 'aze', 'aze', '', '', '', '', NULL, '2023-01-25 12:29:27'),
(45, 21, 3, 3, 16, 54, 'zae', 'zae', 'aze', 'aze', 'aze', 'aze', 'aze', 'aze', '', '', '', '', 5, '2023-01-25 14:29:25'),
(46, 21, 3, 3, 16, 54, 'zae', 'zae', 'aze', 'aze', 'aze', 'aze', 'aze', 'aze', '', '', '', '', 5, '2023-01-25 15:48:57'),
(47, 21, 3, 3, 19, 83, '1', '1', '2', '2', '3', '3', '4', '4', '', '', '', '', 3, '2023-02-03 16:50:22'),
(48, 21, 3, 3, 17, 81, '1', '1', '2', '2', '3', '3', '4', '4', '', '', '', '', 3, '2023-02-03 17:00:52'),
(49, 21, 3, 3, 17, 81, '1', '1', '2', '2', '3', '3', '4', '4', '', '', '', '', NULL, '2023-02-03 17:03:51'),
(50, 21, 3, 3, 17, 81, 'az', 'az', 'bz', 'bz', 'cz', 'cz', 'dz', 'dz', '', '', '', '', NULL, '2023-02-03 17:35:41'),
(51, 21, 3, 3, 23, 94, 'd', 'a', 'b', 'b', 'c', 'c', 'a', 'd', '', '', '', '', 0, '2023-02-08 18:06:36');

-- --------------------------------------------------------

--
-- Table structure for table `response_question_tawsil`
--

CREATE TABLE `response_question_tawsil` (
  `id` int(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `question_tawsil_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `response_option_1` varchar(255) DEFAULT NULL,
  `correct_option_1` varchar(255) DEFAULT NULL,
  `response_option_2` varchar(255) DEFAULT NULL,
  `correct_option_2` varchar(255) DEFAULT NULL,
  `response_option_3` varchar(255) DEFAULT NULL,
  `correct_option_3` varchar(255) DEFAULT NULL,
  `response_option_4` varchar(255) DEFAULT NULL,
  `correct_option_4` varchar(255) DEFAULT NULL,
  `response_option_5` varchar(255) DEFAULT NULL,
  `correct_option_5` varchar(255) DEFAULT NULL,
  `response_option_6` varchar(255) DEFAULT NULL,
  `correct_option_6` varchar(255) DEFAULT NULL,
  `note_by_teacher` int(20) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `response_question_tawsil`
--

INSERT INTO `response_question_tawsil` (`id`, `user_id`, `teacher_id`, `student_id`, `question_tawsil_id`, `exam_id`, `response_option_1`, `correct_option_1`, `response_option_2`, `correct_option_2`, `response_option_3`, `correct_option_3`, `response_option_4`, `correct_option_4`, `response_option_5`, `correct_option_5`, `response_option_6`, `correct_option_6`, `note_by_teacher`, `date_created`) VALUES
(21, 11, 2, 1, 20, 19, 'atssil 1', 'atssil  2', 'atssil \n 2', 'atssil 1', 'atssil  3', 'atssil  3', 'atssil 4', 'atssil 4', NULL, NULL, NULL, NULL, NULL, '2023-01-18 09:41:24'),
(22, 11, 2, 1, 20, 19, 'atssil  2', 'atssil 1', 'atssil 1', 'atssil \n 2', 'atssil  3', 'atssil  3', 'atssil 4', 'atssil 4', NULL, NULL, NULL, NULL, NULL, '2023-01-18 09:44:08'),
(23, 11, 2, 1, 20, 19, 'atssil  2', 'atssil 1', 'atssil 1', 'atssil \n 2', 'atssil  3', 'atssil  3', 'atssil 4', 'atssil 4', NULL, NULL, NULL, NULL, NULL, '2023-01-18 09:49:01'),
(24, 11, 2, 1, 20, 19, 'atssil  2', 'atssil 1', 'atssil 1', 'atssil \n 2', 'atssil  3', 'atssil  3', 'atssil 4', 'atssil 4', NULL, NULL, NULL, NULL, NULL, '2023-01-18 09:52:36'),
(25, 11, 2, 1, 20, 19, 'atssil  2', 'atssil 1', 'atssil 1', 'atssil \n 2', 'atssil  3', 'atssil  3', 'atssil 4', 'atssil 4', NULL, NULL, NULL, NULL, NULL, '2023-01-18 09:52:52'),
(26, 11, 2, 1, 20, 19, 'atssil  2', 'atssil 1', 'atssil 1', 'atssil \n 2', 'atssil  3', 'atssil  3', 'atssil 4', 'atssil 4', NULL, NULL, NULL, NULL, NULL, '2023-01-18 10:02:26'),
(27, 11, 2, 1, 20, 19, 'atssil  3', 'atssil 1', 'atssil 1', 'atssil \n 2', 'atssil  2', 'atssil  3', 'atssil 4', 'atssil 4', NULL, NULL, NULL, NULL, NULL, '2023-01-18 10:03:09'),
(28, 11, 1, 1, 21, 21, '2', '1', '4', '2', '3', '3', '1', '4', NULL, NULL, NULL, NULL, NULL, '2023-01-18 10:17:32'),
(29, 11, 2, 1, 24, 35, 'ddd', 'aa', 'aa', 'zz', 'gg', 'ee', 'ee', 'ddd', 'zz', 'gg', '', '', NULL, '2023-01-20 12:30:17'),
(30, 11, 1, 1, 21, 21, '2', '1', '3', '2', '1', '3', '4', '4', '', NULL, NULL, NULL, NULL, '2023-01-20 15:25:48'),
(31, 11, 2, 1, 26, 47, '11', '11', '22', '22', '55', '33', '33', '44', '44', '55', '', '', 0, '2023-01-23 11:26:55'),
(32, 11, 2, 1, 27, 47, 'aa', 'aa', 'bb', 'bb', 'cc', 'cc', 'dd', 'dd', '', '', NULL, '', 8, '2023-01-23 11:26:55'),
(33, 21, 3, 3, 29, 54, 'rze', 'rze', 'rzer', 'zerzer', 'rzer', 'rzer', 'zerzer', 'rzer', '', '', NULL, '', NULL, '2023-01-24 15:22:17'),
(34, 21, 3, 3, 29, 54, 'rzer', 'rze', 'zerzer', 'zerzer', 'rze', 'rzer', 'rzer', 'rzer', '', '', NULL, '', NULL, '2023-01-24 16:20:08'),
(35, 21, 3, 3, 29, 54, 'rze', 'rze', 'rzer', 'zerzer', 'zerzer', 'rzer', 'rzer', 'rzer', '', '', NULL, '', NULL, '2023-01-24 16:20:42'),
(36, 21, 3, 3, 29, 54, NULL, 'rze', NULL, 'zerzer', NULL, 'rzer', NULL, 'rzer', NULL, '', NULL, '', NULL, '2023-01-24 16:23:17'),
(37, 21, 3, 3, 29, 54, 'rzer', 'rze', 'zerzer', 'zerzer', 'rzer', 'rzer', 'rze', 'rzer', '', '', NULL, '', NULL, '2023-01-24 16:24:36'),
(38, 21, 3, 3, 29, 54, 'rzer', 'rze', 'rzer', 'zerzer', 'zerzer', 'rzer', 'rze', 'rzer', '', '', NULL, '', NULL, '2023-01-24 16:26:53'),
(39, 21, 3, 3, 29, 54, 'rzer', 'rze', 'rze', 'zerzer', 'rzer', 'rzer', 'zerzer', 'rzer', '', '', NULL, '', NULL, '2023-01-24 16:28:46'),
(40, 21, 3, 3, 29, 54, 'zerzer', 'rze', 'rze', 'zerzer', 'rzer', 'rzer', 'rzer', 'rzer', '', '', NULL, '', NULL, '2023-01-24 16:30:21'),
(41, 21, 3, 3, 29, 54, 'rze', 'rze', 'rzer', 'zerzer', 'zerzer', 'rzer', 'rzer', 'rzer', '', '', NULL, '', NULL, '2023-01-25 09:54:15'),
(42, 21, 3, 3, 29, 54, 'rze', 'rze', 'zerzer', 'zerzer', 'rzer', 'rzer', 'rzer', 'rzer', '', '', NULL, '', NULL, '2023-01-25 10:07:36'),
(43, 21, 3, 3, 29, 54, 'zerzer', 'rze', 'rzer', 'zerzer', 'rzer', 'rzer', 'rze', 'rzer', '', '', NULL, '', NULL, '2023-01-25 10:10:12'),
(44, 21, 3, 3, 29, 54, 'rzer', 'rze', 'rzer', 'zerzer', 'zerzer', 'rzer', 'rze', 'rzer', '', '', NULL, '', NULL, '2023-01-25 10:10:46'),
(45, 21, 3, 3, 29, 54, 'rze', 'rze', 'zerzer', 'zerzer', 'rzer', 'rzer', 'rzer', 'rzer', '', '', NULL, '', NULL, '2023-01-25 10:12:28'),
(46, 21, 3, 3, 29, 54, 'rze', 'rze', 'zerzer', 'zerzer', 'rzer', 'rzer', 'rzer', 'rzer', '', '', NULL, '', NULL, '2023-01-25 10:12:47'),
(47, 21, 3, 3, 29, 54, 'rzer', 'rze', 'zerzer', 'zerzer', 'rzer', 'rzer', 'rze', 'rzer', '', '', NULL, '', NULL, '2023-01-25 10:16:47'),
(48, 21, 3, 3, 29, 54, 'rzer', 'rze', 'zerzer', 'zerzer', 'rzer', 'rzer', 'rze', 'rzer', '', '', NULL, '', NULL, '2023-01-25 10:21:17'),
(49, 21, 3, 3, 29, 54, 'rze', 'rze', 'rzer', 'zerzer', 'zerzer', 'rzer', 'rzer', 'rzer', '', '', NULL, '', NULL, '2023-01-25 10:23:45'),
(50, 21, 3, 3, 29, 54, 'rze', 'rze', 'rzer', 'zerzer', 'zerzer', 'rzer', 'rzer', 'rzer', '', '', NULL, '', NULL, '2023-01-25 10:24:55'),
(51, 21, 3, 3, 29, 54, 'zerzer', 'rze', 'rze', 'zerzer', 'rzer', 'rzer', 'rzer', 'rzer', '', '', '', '', NULL, '2023-01-25 10:27:05'),
(52, 21, 3, 3, 29, 54, 'rzer', 'rze', 'zerzer', 'zerzer', 'rze', 'rzer', 'rzer', 'rzer', '', '', '', '', NULL, '2023-01-25 10:37:10'),
(53, 21, 3, 3, 29, 54, 'rzer', 'rze', 'rze', 'zerzer', 'zerzer', 'rzer', 'rzer', 'rzer', '', '', '', '', NULL, '2023-01-25 10:38:25'),
(54, 21, 3, 3, 29, 54, 'rzer', 'rze', 'rze', 'zerzer', 'zerzer', 'rzer', 'rzer', 'rzer', '', '', '', '', NULL, '2023-01-25 10:39:28'),
(55, 21, 3, 3, 29, 54, 'rzer', 'rze', 'rzer', 'zerzer', 'zerzer', 'rzer', 'rze', 'rzer', '', '', '', '', NULL, '2023-01-25 10:41:25'),
(56, 21, 3, 3, 29, 54, 'zerzer', 'rze', 'rzer', 'zerzer', 'rzer', 'rzer', 'rze', 'rzer', '', '', '', '', NULL, '2023-01-25 10:42:21'),
(57, 21, 3, 3, 29, 54, 'rze', 'rze', 'rzer', 'zerzer', 'zerzer', 'rzer', 'rzer', 'rzer', '', '', '', '', NULL, '2023-01-25 10:51:15'),
(58, 21, 3, 3, 29, 54, 'rzer', 'rze', 'rzer', 'zerzer', 'zerzer', 'rzer', 'rze', 'rzer', '', '', '', '', NULL, '2023-01-25 10:53:59'),
(59, 21, 3, 3, 29, 54, 'rzer', 'rze', 'rzer', 'zerzer', 'zerzer', 'rzer', 'rze', 'rzer', '', '', '', '', NULL, '2023-01-25 10:56:55'),
(60, 21, 3, 3, 29, 54, 'zerzer', 'rze', 'rze', 'zerzer', 'rzer', 'rzer', 'rzer', 'rzer', '', '', '', '', NULL, '2023-01-25 10:58:04'),
(61, 21, 3, 3, 29, 54, 'rzer', 'rze', 'rzer', 'zerzer', 'rze', 'rzer', 'zerzer', 'rzer', '', '', '', '', NULL, '2023-01-25 10:59:38'),
(62, 21, 3, 3, 29, 54, 'rzer', 'rze', 'rze', 'zerzer', 'zerzer', 'rzer', 'rzer', 'rzer', '', '', '', '', NULL, '2023-01-25 11:11:48'),
(63, 21, 3, 3, 29, 54, 'rzer', 'rze', 'rze', 'zerzer', 'zerzer', 'rzer', 'rzer', 'rzer', '', '', '', '', NULL, '2023-01-25 11:13:26'),
(64, 21, 3, 3, 29, 54, 'rzer', 'rze', 'zerzer', 'zerzer', 'rzer', 'rzer', 'rze', 'rzer', '', '', '', '', NULL, '2023-01-25 12:29:27'),
(65, 21, 3, 3, 29, 54, 'rzer', 'rze', 'rzer', 'zerzer', 'zerzer', 'rzer', 'rze', 'rzer', '', '', '', '', 0, '2023-01-25 14:29:25'),
(66, 21, 3, 3, 29, 54, 'rzer', 'rze', 'zerzer', 'zerzer', 'rzer', 'rzer', 'rze', 'rzer', '', '', '', '', 0, '2023-01-25 15:48:57'),
(67, 21, 3, 3, 32, 83, 'eaz', 'aze', 'aze', 'eaz', 'eaz', 'eaz', 'eaz', 'eaz', '', NULL, '', '', 0, '2023-02-03 16:50:22'),
(68, 21, 3, 3, 30, 81, 'aze', 'aze', 'eaz', 'eaz', 'eaz', 'eaz', 'eaz', 'eaz', '', NULL, '', '', 3, '2023-02-03 17:00:52'),
(69, 21, 3, 3, 30, 81, 'aze', 'aze', 'eaz', 'eaz', 'eaz', 'eaz', 'eaz', 'eaz', '', NULL, '', '', NULL, '2023-02-03 17:03:51'),
(70, 21, 3, 3, 30, 81, 'aze', 'aze', 'eaz', 'eaz', 'eaz', 'eaz', 'eaz', 'eaz', '', NULL, '', '', NULL, '2023-02-03 17:35:41');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(121) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `user_id`, `name`, `email`, `updated_at`, `created_at`) VALUES
(1, 11, 'student0aa1', 'student0aa1@gmail.com', '2023-01-15 16:08:23', '2023-01-15 16:08:23'),
(2, 18, 'student01', 'student01@gmail.com', '2023-01-15 16:13:56', '2023-01-15 16:13:56'),
(3, 21, 'student 02', 'student02@gmail.com', '2023-01-24 09:23:13', '2023-01-24 09:23:13');

-- --------------------------------------------------------

--
-- Table structure for table `student_exam_junction`
--

CREATE TABLE `student_exam_junction` (
  `exam_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_exam_junction`
--

INSERT INTO `student_exam_junction` (`exam_id`, `student_id`) VALUES
(1, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(1, 2),
(32, 2),
(45, 2),
(54, 2),
(89, 2),
(94, 2),
(51, 3),
(52, 3),
(53, 3),
(54, 3),
(55, 3),
(56, 3),
(58, 3),
(59, 3),
(60, 3),
(61, 3),
(62, 3),
(65, 3),
(75, 3),
(76, 3),
(77, 3),
(78, 3),
(79, 3),
(80, 3),
(81, 3),
(83, 3),
(89, 3),
(90, 3),
(94, 3),
(95, 3),
(96, 3),
(97, 3),
(99, 3),
(100, 3);

-- --------------------------------------------------------

--
-- Table structure for table `student_teacher_junction`
--

CREATE TABLE `student_teacher_junction` (
  `teacher_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_teacher_junction`
--

INSERT INTO `student_teacher_junction` (`teacher_id`, `student_id`) VALUES
(2, 1),
(1, 2),
(2, 2),
(3, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(121) DEFAULT NULL,
  `approved_by_admin` tinyint(4) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `user_id`, `name`, `email`, `approved_by_admin`, `updated_at`, `created_at`) VALUES
(1, 10, 'teacher02', 'teacher02@gmail.com', 1, '2023-01-15 16:06:37', '2023-01-15 16:06:37'),
(2, 19, 'teacher03', 'teacher03@gmail.com', 0, '2023-01-16 10:15:56', '2023-01-16 10:15:56'),
(3, 20, 'teacher 4', 'teacher04@gmail.com', 1, '2023-01-23 22:21:23', '2023-01-23 22:21:23'),
(4, 22, 'teacher 5', 'teacher05@gmail.com', 1, '2023-02-14 15:02:05', '2023-02-14 15:02:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `verification_key` varchar(255) DEFAULT NULL,
  `is_email_verified` tinyint(4) DEFAULT NULL,
  `user_level` varchar(16) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `first_name`, `last_name`, `email`, `password`, `verification_key`, `is_email_verified`, `user_level`, `image`, `date_added`, `date_updated`) VALUES
(4, 'Yahia', '', '', 'yahiar2012@gmail.com', 'd29b6c24bce8d698e3d8f508e46d2355da7cd8f70f42aa599d3d3ead5ca9f2f2df0d8a719c6221a12a94e66b20cb7fc43a8cb6ae0a8247efa35bee7e186a787cMxKBwhGRc3XN+uzR3pzk4D9H10aBv45K4wYSndR+MqQ=', '78219b6279e24034ab8bd78c62d29fb1', 1, 'ROLE_ADMIN', NULL, '2023-01-10 16:21:58', NULL),
(5, 'akakaramm', '', '', 'aka@gmail.com', 'd29b6c24bce8d698e3d8f508e46d2355da7cd8f70f42aa599d3d3ead5ca9f2f2df0d8a719c6221a12a94e66b20cb7fc43a8cb6ae0a8247efa35bee7e186a787cMxKBwhGRc3XN+uzR3pzk4D9H10aBv45K4wYSndR+MqQ=', '442d8fbc47096674512200eb0c412cff', NULL, 'ROLE_STUDENT', NULL, '2023-01-12 09:45:52', '2023-01-14 00:00:00'),
(6, 'azeae', '', '', 'azeaeaz@gmail.com', '50503d1c28b3fc939bb6b47a391a50d58467002b8d055726f173b2d7998debd430170f2ae6a4047ca2020c1d7344e140b32df185dec6c4d4a8d4033bd7662813qXDKVnmKZT+dzTOOyja8oMjR+J0U8nCXaL1PPWozcm8=', '6b14d9cbd73868cd0d9235cbd76dba14', NULL, 'ROLE_TEACHER', NULL, '2023-01-12 09:48:35', '2023-01-14 00:00:00'),
(7, 'student 1', '', '', 'akram.freelancerrezr2012@gmail.com', '925721db530be5228aab84f612299dcd7fdb62452cd793c04c90b7363f514100488f3b462971598096b04d91fe3cb76cd0156daf8e6b0926f5cae2f3cd75a0e4J7HuGlBXoNpY5uk5iY1m9v0JPboVlYeHF7t37Xyl5sU=', '4a7927f01582804321c8b125b42d0da8', NULL, 'ROLE_TEACHER', NULL, '2023-01-12 10:44:53', NULL),
(8, 'teacher01', '', '', 'teacher@gmail.com', '94a81179f79abeec19a846d72d38f4c3fde4505634510c184e955484d9da06aa0ba3e166da8a4dd90de344078ebbde5fba0849ede189f697439c0a6acb7001bdTt2Mr3WajsMidau6FgQ25wUGi9HyFGRO/OrmSLnNqOI=', '7e95b81f5d08296aa8eea4a237647d25', NULL, 'ROLE_TEACHER', NULL, '2023-01-15 15:55:12', NULL),
(9, 'teacher01', '', '', 'teacher01@gmail.com', 'd015ee8bffe124ff143f4b37128bd318e2d9f8581abdd0050664d7a85f689c8125744bdf3f1a6818e53f8dd390271b422d45bd058b6e8083b45c229c1917d5fd3yb0eK1UldAQ26eoDTD6SiZAx9z4lEPvXvhHQe/B0Ws=', 'd2696b28cf95115a9875ce6cc26e1348', NULL, 'ROLE_TEACHER', NULL, '2023-01-15 16:03:43', NULL),
(10, 'teacher02', '', '', 'teacher02@gmail.com', '50503d1c28b3fc939bb6b47a391a50d58467002b8d055726f173b2d7998debd430170f2ae6a4047ca2020c1d7344e140b32df185dec6c4d4a8d4033bd7662813qXDKVnmKZT+dzTOOyja8oMjR+J0U8nCXaL1PPWozcm8=', '4ae1468e14482ddf16bfb6ce16f336b1', NULL, 'ROLE_TEACHER', NULL, '2023-01-15 16:06:37', NULL),
(11, 'student01', '', '', 'student0aa1@gmail.com', 'dfeb2b22264b9ec848d59507ad384d4e46672cbd73363c2af45d69e6fc6a093e4043c07d8b7e27eb9bfdcfdeb27737208e59e2e86a1f774f6df7e133167629aeMfM2IFnZd+jnfvhTogMmVVNiXYRC04PFm8FAtIz2t2M=', '4caf0ca7714f286bf037dc9ffae2de08', NULL, 'ROLE_STUDENT', NULL, '2023-01-15 16:08:23', NULL),
(18, 'student01', '', '', 'student01@gmail.com', '7acc21f64f43dfb1f507273e4e6bf0e2c24d99e342b1ef3ed699e08cf3138ceb32590296aa2dfa30d540efbaad0347f9a09a1dedd22b27c90fe4f63f2fb14aa3fY/DmKJNipk2aZn6tBXcDEkffjujSoM8P5b8t35PZbk=', 'af816d5bc4cb84543e52c85922ea00c8', NULL, 'ROLE_STUDENT', NULL, '2023-01-15 16:13:56', NULL),
(19, 'teacher03', '', '', 'teacher03@gmail.com', 'cdcf2a33168c41986b1f9e3b23e657b0be90d284fb951ed20105988fc81d2a64a6342915a8b52d0e6830d654d87e8bc85524d5d2ac45513630e7c23b55b68993rG6Wjo28Srj7uw5Z2qw8GUNBZ8GZ+WX+PqDu21ak6gI=', 'c6ed9c220f8b831f1dcf6e7305b868ed', NULL, 'ROLE_TEACHER', NULL, '2023-01-16 10:15:56', NULL),
(20, 'teacher 4', '', '', 'teacher04@gmail.com', '3e6433fe2ff3f923ac9de4f723a9acbf7a50fbeaaf0e960b96191aa1be71f76c48e71e94f60df68591221345db270f478288ee5a16921de12ce58d9f1c8fc670GFO03NzGhKz1p79dw1byO2qQX8jZiYKM62cBW46rUz0=', 'd2fb09949395c4d1697d22e9831cc0a2', NULL, 'ROLE_TEACHER', NULL, '2023-01-23 22:21:23', NULL),
(21, 'student 02', '', '', 'student02@gmail.com', 'e5d62f4257c7ebdbe4b615529f6d9e98b382b234aec9841d354204e044a4f135d58e1921a21c0852345de78385b32615f4ec2180dc8963bf390261a510eb8e70e6hvMPoVyeJKi4uiLn7reyeki148BHFiYmdQNMdTR+I=', '2b35fe13d40918d19c5dc51e61f14c08', NULL, 'ROLE_STUDENT', '981065041teacher4.jpg', '2023-01-24 09:23:13', NULL),
(22, 'teacher 05', '', '', 'teacher05@gmail.com', '6e9e1deaad2ab7d87f809ceea4d374bf38f278ac2510cf800d230835211ce59affb17e9db4514d767c2e1efa05f8b69e7788148d5b2ae64bffc954b6d41b99f4M/wYwmQtGk/9NYRXmzoLCL+eBXBlSKSIGiwGHkXjv3M=', '33fa6d15c6aa2746cdaef203bdbf8156', NULL, 'ROLE_TEACHER', '2076228308Araqi.jpg', '2023-02-14 15:02:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `whatsapp`
--

CREATE TABLE `whatsapp` (
  `id` int(11) NOT NULL,
  `number` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `whatsapp`
--

INSERT INTO `whatsapp` (`id`, `number`) VALUES
(1, '966508227705');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categorie_id` (`categorie_id`),
  ADD KEY `exams_ibfk_2` (`teacher_id`);

--
-- Indexes for table `exams_teachers_junction`
--
ALTER TABLE `exams_teachers_junction`
  ADD PRIMARY KEY (`exam_id`,`teacher_id`),
  ADD UNIQUE KEY `exam_teacher_id` (`exam_id`,`teacher_id`),
  ADD KEY `teacher_junction_ibfk_2` (`teacher_id`);

--
-- Indexes for table `exam_quest_long_text_junction`
--
ALTER TABLE `exam_quest_long_text_junction`
  ADD PRIMARY KEY (`exam_id`,`quest_long_text_id`),
  ADD KEY `quest_long_text_id` (`quest_long_text_id`);

--
-- Indexes for table `exam_quest_multi_junction`
--
ALTER TABLE `exam_quest_multi_junction`
  ADD PRIMARY KEY (`exam_id`,`quest_multi_id`),
  ADD KEY `quest_multi_id` (`quest_multi_id`);

--
-- Indexes for table `exam_quest_span_junction`
--
ALTER TABLE `exam_quest_span_junction`
  ADD PRIMARY KEY (`exam_id`,`quest_span_id`),
  ADD KEY `quest_span_id` (`quest_span_id`);

--
-- Indexes for table `exam_quest_tartib_junction`
--
ALTER TABLE `exam_quest_tartib_junction`
  ADD PRIMARY KEY (`exam_id`,`quest_tartib_id`),
  ADD KEY `quest_tartib_id` (`quest_tartib_id`);

--
-- Indexes for table `exam_quest_tawsil_junction`
--
ALTER TABLE `exam_quest_tawsil_junction`
  ADD PRIMARY KEY (`exam_id`,`quest_tawsil_id`),
  ADD KEY `quest_tawsil_id` (`quest_tawsil_id`);

--
-- Indexes for table `footer`
--
ALTER TABLE `footer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hash_url_exam`
--
ALTER TABLE `hash_url_exam`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_ibefk_1` (`teacher_id`),
  ADD KEY `exams_ibefk_2` (`exam_id`);

--
-- Indexes for table `home_page`
--
ALTER TABLE `home_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_long_text`
--
ALTER TABLE `question_long_text`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `question_multi_choice`
--
ALTER TABLE `question_multi_choice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `question_span`
--
ALTER TABLE `question_span`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `question_tartib`
--
ALTER TABLE `question_tartib`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `question_tawsil`
--
ALTER TABLE `question_tawsil`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `response_exam`
--
ALTER TABLE `response_exam`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_teacher_1` (`teacher_id`),
  ADD KEY `FK_student_1` (`student_id`),
  ADD KEY `FK_exam_1` (`exam_id`);

--
-- Indexes for table `response_question_long_text`
--
ALTER TABLE `response_question_long_text`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `response_question_long_text_ibfk_2` (`teacher_id`),
  ADD KEY `response_question_long_text_ibfk_3` (`student_id`),
  ADD KEY `response_question_long_text_ibfk_4` (`question_long_id`),
  ADD KEY `response_question_long_text_ibfk_5` (`exam_id`);

--
-- Indexes for table `response_question_multi_choice`
--
ALTER TABLE `response_question_multi_choice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `response_question_multi_choice_ibfk_2` (`teacher_id`),
  ADD KEY `response_question_multi_choice_ibfk_3` (`student_id`),
  ADD KEY `response_question_multi_choice_ibfk_4` (`question_multi_id`),
  ADD KEY `response_question_multi_choice_ibfk_5` (`exam_id`);

--
-- Indexes for table `response_question_span`
--
ALTER TABLE `response_question_span`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `response_question_span_ibfk_2` (`teacher_id`),
  ADD KEY `response_question_span_ibfk_3` (`student_id`),
  ADD KEY `response_question_span_ibfk_4` (`question_span_id`),
  ADD KEY `response_question_span_ibfk_5` (`exam_id`);

--
-- Indexes for table `response_question_tartib`
--
ALTER TABLE `response_question_tartib`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `response_question_tartib_ibfk_2` (`teacher_id`),
  ADD KEY `response_question_tartib_ibfk_3` (`student_id`),
  ADD KEY `response_question_tartib_ibfk_4` (`question_tartib_id`),
  ADD KEY `response_question_tartib_ibfk_5` (`exam_id`);

--
-- Indexes for table `response_question_tawsil`
--
ALTER TABLE `response_question_tawsil`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `response_question_tawsil_ibfk_2` (`teacher_id`),
  ADD KEY `response_question_tawsil_ibfk_3` (`student_id`),
  ADD KEY `response_question_tawsil_ibfk_4` (`question_tawsil_id`),
  ADD KEY `response_question_tawsil_ibfk_5` (`exam_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `student_exam_junction`
--
ALTER TABLE `student_exam_junction`
  ADD PRIMARY KEY (`student_id`,`exam_id`),
  ADD UNIQUE KEY `student_exam_id` (`student_id`,`exam_id`),
  ADD KEY `exam_junction_ibfk_6` (`exam_id`);

--
-- Indexes for table `student_teacher_junction`
--
ALTER TABLE `student_teacher_junction`
  ADD PRIMARY KEY (`student_id`,`teacher_id`),
  ADD UNIQUE KEY `student_teacher_id` (`student_id`,`teacher_id`),
  ADD KEY `teacher_junction_ibfk_2` (`teacher_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `whatsapp`
--
ALTER TABLE `whatsapp`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(121) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `footer`
--
ALTER TABLE `footer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hash_url_exam`
--
ALTER TABLE `hash_url_exam`
  MODIFY `id` int(121) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `home_page`
--
ALTER TABLE `home_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `question_long_text`
--
ALTER TABLE `question_long_text`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `question_multi_choice`
--
ALTER TABLE `question_multi_choice`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `question_span`
--
ALTER TABLE `question_span`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `question_tartib`
--
ALTER TABLE `question_tartib`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `question_tawsil`
--
ALTER TABLE `question_tawsil`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `response_exam`
--
ALTER TABLE `response_exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `response_question_long_text`
--
ALTER TABLE `response_question_long_text`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `response_question_multi_choice`
--
ALTER TABLE `response_question_multi_choice`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `response_question_span`
--
ALTER TABLE `response_question_span`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `response_question_tartib`
--
ALTER TABLE `response_question_tartib`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `response_question_tawsil`
--
ALTER TABLE `response_question_tawsil`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `whatsapp`
--
ALTER TABLE `whatsapp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `exams`
--
ALTER TABLE `exams`
  ADD CONSTRAINT `exams_ibfk_1` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `exams_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`);

--
-- Constraints for table `exams_teachers_junction`
--
ALTER TABLE `exams_teachers_junction`
  ADD CONSTRAINT `exam_junction_ibfk_4` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`),
  ADD CONSTRAINT `teacher_junction_ibfk_4` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`);

--
-- Constraints for table `exam_quest_long_text_junction`
--
ALTER TABLE `exam_quest_long_text_junction`
  ADD CONSTRAINT `exam_quest_long_text_junction_ibfk_1` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`),
  ADD CONSTRAINT `exam_quest_long_text_junction_ibfk_2` FOREIGN KEY (`quest_long_text_id`) REFERENCES `question_long_text` (`id`);

--
-- Constraints for table `exam_quest_multi_junction`
--
ALTER TABLE `exam_quest_multi_junction`
  ADD CONSTRAINT `exam_quest_multi_junction_ibfk_1` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`),
  ADD CONSTRAINT `exam_quest_multi_junction_ibfk_2` FOREIGN KEY (`quest_multi_id`) REFERENCES `question_multi_choice` (`id`);

--
-- Constraints for table `exam_quest_span_junction`
--
ALTER TABLE `exam_quest_span_junction`
  ADD CONSTRAINT `exam_quest_span_junction_ibfk_1` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`),
  ADD CONSTRAINT `exam_quest_span_junction_ibfk_2` FOREIGN KEY (`quest_span_id`) REFERENCES `question_span` (`id`);

--
-- Constraints for table `exam_quest_tartib_junction`
--
ALTER TABLE `exam_quest_tartib_junction`
  ADD CONSTRAINT `exam_quest_tartib_junction_ibfk_1` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`),
  ADD CONSTRAINT `exam_quest_tartib_junction_ibfk_2` FOREIGN KEY (`quest_tartib_id`) REFERENCES `question_tartib` (`id`);

--
-- Constraints for table `exam_quest_tawsil_junction`
--
ALTER TABLE `exam_quest_tawsil_junction`
  ADD CONSTRAINT `exam_quest_tawsil_junction_ibfk_1` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`),
  ADD CONSTRAINT `exam_quest_tawsil_junction_ibfk_2` FOREIGN KEY (`quest_tawsil_id`) REFERENCES `question_tawsil` (`id`);

--
-- Constraints for table `hash_url_exam`
--
ALTER TABLE `hash_url_exam`
  ADD CONSTRAINT `exams_ibefk_2` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`),
  ADD CONSTRAINT `teacher_ibefk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`);

--
-- Constraints for table `question_long_text`
--
ALTER TABLE `question_long_text`
  ADD CONSTRAINT `question_long_text_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `question_multi_choice`
--
ALTER TABLE `question_multi_choice`
  ADD CONSTRAINT `question_multi_choice_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `question_multi_choice_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `question_span`
--
ALTER TABLE `question_span`
  ADD CONSTRAINT `question_span_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `question_tartib`
--
ALTER TABLE `question_tartib`
  ADD CONSTRAINT `question_tartib_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `question_tawsil`
--
ALTER TABLE `question_tawsil`
  ADD CONSTRAINT `question_tawsil_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `response_exam`
--
ALTER TABLE `response_exam`
  ADD CONSTRAINT `FK_exam_1` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`),
  ADD CONSTRAINT `FK_student_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `FK_teacher_1` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`);

--
-- Constraints for table `response_question_long_text`
--
ALTER TABLE `response_question_long_text`
  ADD CONSTRAINT `response_question_long_text_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `response_question_long_text_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`),
  ADD CONSTRAINT `response_question_long_text_ibfk_3` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `response_question_long_text_ibfk_4` FOREIGN KEY (`question_long_id`) REFERENCES `question_long_text` (`id`),
  ADD CONSTRAINT `response_question_long_text_ibfk_5` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`);

--
-- Constraints for table `response_question_multi_choice`
--
ALTER TABLE `response_question_multi_choice`
  ADD CONSTRAINT `response_question_multi_choice_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `response_question_multi_choice_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`),
  ADD CONSTRAINT `response_question_multi_choice_ibfk_3` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `response_question_multi_choice_ibfk_4` FOREIGN KEY (`question_multi_id`) REFERENCES `question_multi_choice` (`id`),
  ADD CONSTRAINT `response_question_multi_choice_ibfk_5` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`);

--
-- Constraints for table `response_question_span`
--
ALTER TABLE `response_question_span`
  ADD CONSTRAINT `response_question_span_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `response_question_span_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`),
  ADD CONSTRAINT `response_question_span_ibfk_3` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `response_question_span_ibfk_4` FOREIGN KEY (`question_span_id`) REFERENCES `question_span` (`id`),
  ADD CONSTRAINT `response_question_span_ibfk_5` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`);

--
-- Constraints for table `response_question_tartib`
--
ALTER TABLE `response_question_tartib`
  ADD CONSTRAINT `response_question_tartib_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `response_question_tartib_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`),
  ADD CONSTRAINT `response_question_tartib_ibfk_3` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `response_question_tartib_ibfk_4` FOREIGN KEY (`question_tartib_id`) REFERENCES `question_tartib` (`id`),
  ADD CONSTRAINT `response_question_tartib_ibfk_5` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`);

--
-- Constraints for table `response_question_tawsil`
--
ALTER TABLE `response_question_tawsil`
  ADD CONSTRAINT `response_question_tawsil_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `response_question_tawsil_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`),
  ADD CONSTRAINT `response_question_tawsil_ibfk_3` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `response_question_tawsil_ibfk_4` FOREIGN KEY (`question_tawsil_id`) REFERENCES `question_tawsil` (`id`),
  ADD CONSTRAINT `response_question_tawsil_ibfk_5` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `user_constraint_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `student_exam_junction`
--
ALTER TABLE `student_exam_junction`
  ADD CONSTRAINT `exam_junction_ibfk_6` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`),
  ADD CONSTRAINT `student_junction_ibfk_5` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

--
-- Constraints for table `student_teacher_junction`
--
ALTER TABLE `student_teacher_junction`
  ADD CONSTRAINT `student_junction_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `teacher_junction_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`);

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `user_constraint` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
