-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 28, 2025 at 08:43 AM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uni_parrot`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--
--  create database uni_parrot;
use uni_parrot;
DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int NOT NULL AUTO_INCREMENT,
  `post_id` int NOT NULL,
  `user_id` int NOT NULL,
  `parent_comment_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `content` text NOT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `post_id` (`post_id`),
  KEY `user_id` (`user_id`),
  KEY `parent_comment_id` (`parent_comment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `post_id`, `user_id`, `parent_comment_id`, `created_at`, `content`) VALUES
(1, 33, 2, NULL, '2025-04-28 05:52:25', 'did we get it?'),
(2, 1, 2, NULL, '2025-04-28 06:12:04', 'making a comment'),
(3, 2, 2, NULL, '2025-04-28 06:18:36', 'hmmm...'),
(4, 34, 2, NULL, '2025-04-28 06:26:21', 'making  acomment, this should work'),
(5, 34, 2, NULL, '2025-04-28 06:27:07', 'this may have worked!'),
(6, 34, 2, NULL, '2025-04-28 06:29:09', 'this is very frustrating'),
(7, 34, 2, NULL, '2025-04-28 06:31:52', 'dsdsad'),
(8, 34, 2, NULL, '2025-04-28 08:05:06', 'asaS'),
(9, 35, 13, NULL, '2025-04-28 08:09:36', 'how are the cats doing?'),
(10, 35, 1, NULL, '2025-04-28 08:10:12', 'not very well');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `subject` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `likes` int NOT NULL DEFAULT '0',
  `dislikes` int NOT NULL DEFAULT '0',
  `shares` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`post_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `created_at`, `subject`, `content`, `likes`, `dislikes`, `shares`) VALUES
(1, 2, '2025-04-26 14:00:05', 'first', 'post', 0, 0, 0),
(2, 2, '2025-04-26 14:35:57', 'they tehre ', 'sadsadsad', 0, 0, 0),
(3, 1, '2025-04-26 14:56:27', 'does the log out work', 'hmm maybe?', 0, 0, 0),
(4, 11, '2025-04-26 16:35:57', 'Whats the best Takeaway Near ATU?', 'I like supermacs but im getting sick of it all the time, the canteen is also kinda boring... so where the next best spot', 0, 0, 0),
(5, 11, '2025-04-26 20:03:24', 'Whats the best Takeaway Near ATU?', 'I like supermacs but im getting sick of it all the time, the canteen is also kinda boring... so where the next best spot', 0, 0, 0),
(6, 12, '2025-04-26 20:22:17', 'my car just broke down', 'wheres the nearest bus from barna', 0, 0, 0),
(7, 12, '2025-04-26 20:23:02', 'can we call it quits now with the parking fee', 'some thing about cars', 0, 0, 0),
(8, 12, '2025-04-26 22:27:51', 'this is a post', 'dasdasd', 0, 0, 0),
(9, 12, '2025-04-27 21:47:16', 'Whats the best Takeaway Near ATU?', 'fdfdsfsdcxvx', 0, 0, 0),
(10, 12, '2025-04-27 22:43:03', 'experimenting with this', 'what the hell might as well', 1, 2, 0),
(11, 12, '2025-04-27 22:43:22', 'fsdsd', 'dfsdfsd', 1, 3, 0),
(12, 12, '2025-04-27 22:46:19', 'this should return a post id and message', 'adasdasdfgs', 1, 1, 0),
(13, 12, '2025-04-27 22:47:00', 'post number 13', 'asdasdczxcxzds', 1, 1, 0),
(14, 12, '2025-04-28 00:18:04', 'milk', 'cars are the bes thing since slice bread', 1, 1, 0),
(15, 12, '2025-04-28 00:22:29', 'well tis the season', 'diajdkasjdklaxhcc aldjkasjdkj fdkasjdklas', 1, 1, 0),
(16, 12, '2025-04-28 00:25:11', 'what the le', 'dasdsad', 1, 0, 0),
(17, 12, '2025-04-28 00:30:11', 'sAS', 'AsA', 1, 0, 0),
(18, 12, '2025-04-28 00:31:09', 'DID THEIS WORK', 'SDKDSANC ', 1, 0, 0),
(19, 12, '2025-04-28 00:32:02', 'sdad', 'sdas', 1, 0, 0),
(20, 1, '2025-04-28 00:42:42', 'damin', 'skajdka', 1, 0, 0),
(21, 1, '2025-04-28 00:42:58', 'sadsad', 'sadas', 2, 0, 0),
(22, 1, '2025-04-28 00:47:43', 'MAKE A POST', 'have it work!', 1, 0, 0),
(23, 1, '2025-04-28 00:50:18', 'i am first!', 'dsdadxczxc', 2, 0, 0),
(24, 1, '2025-04-28 00:52:05', 'big smoke', 'sad', 1, 0, 0),
(26, 1, '2025-04-28 03:00:33', 'hfjksdhfk', 'dsfsdfbs', 0, 0, 0),
(27, 1, '2025-04-28 03:39:37', 'troubleshooting', 'this is painfull', 0, 0, 0),
(28, 1, '2025-04-28 04:09:12', 'fsdfsd', 'dsfsdfs', 0, 0, 0),
(29, 1, '2025-04-28 04:21:54', 'does this create a post?', 'asdadasdasd', 0, 0, 0),
(30, 1, '2025-04-28 04:30:24', 'sdasda', 'sadas', 0, 0, 0),
(31, 1, '2025-04-28 04:35:53', 'dskjfhsdf', 'jflksdf', 0, 0, 0),
(32, 2, '2025-04-28 05:09:07', 'that is awesome', 'it worked !\r\nsdasdsakdsk\r\n#sdkasdlakd\r\nsdaskldjsalkjdklas', 0, 0, 0),
(33, 2, '2025-04-28 05:32:51', 'Lad', 'dsjsnfjsngjknsfnjnjfnjdsnf\r\ndsfndsklfndskjnfjdsnjfnjdsknfjknsdjknfjsdf\r\ndfkldsnfklsdnkjfnkdsjnfdsjkfjnsdjknfjkdsnjf\r\nsdfndskfnkdsjnfjknjndjkfjkdsbvbcxv djs vkj ds v', 0, 0, 0),
(34, 2, '2025-04-28 06:25:57', 'gotta fix em all!', 'sassy post; i dont know if htis is gonna get done', 0, 0, 0),
(35, 13, '2025-04-28 08:09:14', 'hey there', 'Spin the Wheel with Zeoob\'s Wheel of Names for random selections. It is a versatile digital tool that allows users to input a list of names, options, or items and spin a virtual wheel to randomly select one. It’s commonly used for tasks like choosing winners for contests, assigning random tasks, or selecting participants in classroom activities. The tool offers customization options, allowing users to change colors, fonts, and themes, making it adaptable to any event or setting. Its ease of use and fun, interactive nature have made it a favorite for both casual and professional use, adding a layer of excitement and fairness to decision-making. Already know how to use? Lets use Wheel of names spinner... ', 0, 0, 0),
(36, 1, '2025-04-28 08:30:35', 'aAa', 'ASAsA', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `user_type` enum('admin','user') NOT NULL,
  `first_name` varchar(32) DEFAULT NULL,
  `last_name` varchar(32) DEFAULT NULL,
  `phone` varchar(16) DEFAULT NULL,
  `email` varchar(96) NOT NULL,
  `acc_age` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `hashed_password` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_type`, `first_name`, `last_name`, `phone`, `email`, `acc_age`, `hashed_password`) VALUES
(1, 'first', 'user', 'oscar', 'healy', '083 803 8985', 'oscar.healy101@gmail.com', '2025-04-01 04:25:51', '$2y$10$X5WOySCBwRGT8r4FVndQpuH0ktN0Ni2lJoAnk9t0WB.Vti/qP.qyi'),
(2, 'test', 'user', 'oscar', 'healy', '083 803 8985', 'o@h.com', '2025-04-26 06:11:56', '$2y$10$9KC42dEwpfqMhe1ehz8mjuIEQajziM7qU2ySyapv7nl76/XgNfRHS'),
(3, 'm23', 'user', 'morgan', 'healy', '087 123 123', 'm@h.com', '2025-04-26 06:51:11', '$2y$10$d9oLxHr4js.ml1d1rfiU0uzCus1nazoMWJUNwgTdgfNePyKM.WHRe'),
(4, 'third', 'user', 'oscar', 'healt', '083 803 8985', 'o@b@gmail.com', '2025-04-26 07:03:13', '$2y$10$Oqmk/CdDMgbR9RYdcPfQKO0BTQlyPbpm94rqtSBW82BZmT.OlMaXS'),
(5, 'morgs', 'user', 'morgan', 'healy', '087 123 123', 'morgs@m.com', '2025-04-26 07:10:58', '$2y$10$ECXdn15SZpm8/LekFwECkeq7sKhKGyV.puyiKv325wWRpJFX9HSgu'),
(6, 'work', 'user', 'did', 'this ', '123 123 1234', 'w@w.com', '2025-04-26 07:11:29', '$2y$10$UwpKibxUoLtblv2Ig4uL2uJOwAYOyWOAA8cPYX2TaQpRwybKfKRui'),
(7, 'firla', 'user', 'fir', 'las', '123 123 1234', 'f@l.com', '2025-04-26 07:13:33', '$2y$10$iFPDG.gx8MmzW3PMwwRI/uD/Avr2Jw0drqD6FweIRSJlI.t6QQ0ZK'),
(8, 'wodrk', 'user', 'did', 'this ', '123 123 1234', 'd@w.com', '2025-04-26 07:15:25', '$2y$10$lAayT7PM6RX9y2TYrDmP9eSB4TPGQWGv/feAoG7qW9RKIBy8SBLLa'),
(9, 'winner', 'user', 'chicken', 'dinner', '123 123 1234', 'w@q.com', '2025-04-26 07:16:07', '$2y$10$GiQQR7F5c9h7wl4U6FiODushYfxnHPkCsF.6maspAqYW49QUQrbGK'),
(10, 'ape', 'user', 'ape', 'monkey', '123 453 2421', 'a@p.com', '2025-04-26 07:19:04', '$2y$10$Pm4TBN1cBc0B9UofqPG9xeNvEjZVDIlh7AZqYxwkvRyBLv6OwZscy'),
(11, 'audge', 'user', 'Audrey', 'Healy', '000 000 0000', 'a@h.com', '2025-04-26 16:34:32', '$2y$10$o5SGmFsFdvH6s8ns11UxpecgAphHGzEoWNOlG7eIjmpt4sFzabpQO'),
(12, 'james', 'user', 'jimmy', 'mc', '492 348 9238', '1@2.com', '2025-04-26 20:19:22', '$2y$10$1IkBxHJF8NkpGpGrkpel9OKeYlvZb0ytpYgVxxuONoRo3UZ4a2IVC'),
(13, 'jim', 'user', 'James', 'mcafee', '083 803 8985', 'james@m.com', '2025-04-28 08:08:17', '$2y$10$uQkIJpD.XvtbN2ZYMV8S9OlcuOeZ9e2bq6Mpam8chSr8LSorwYX.G');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
