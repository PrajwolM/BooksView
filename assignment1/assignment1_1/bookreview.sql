-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2024 at 06:32 AM
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
-- Database: `bookreview`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `authorId` varchar(10) NOT NULL,
  `authorName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`authorId`, `authorName`) VALUES
('A001', 'John Lewis'),
('A002', 'William Loftus'),
('A003', 'Paul Deitel'),
('A004', 'David'),
('A005', 'Jessica'),
('A006', 'Chris');

-- --------------------------------------------------------

--
-- Table structure for table `authorship`
--

CREATE TABLE `authorship` (
  `bookId` varchar(10) NOT NULL,
  `authorId` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `authorship`
--

INSERT INTO `authorship` (`bookId`, `authorId`) VALUES
('B001', 'A001'),
('B001', 'A002'),
('B002', 'A003'),
('B003', 'A004'),
('B003', 'A005'),
('B003', 'A006');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `bookId` varchar(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `imageLocation` varchar(100) NOT NULL,
  `year` int(4) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`bookId`, `title`, `imageLocation`, `year`, `description`) VALUES
('B001', 'Java Software Solutions', './img/JavaSoftwareSolutions.jpg', 2017, 'All you need to know about Java Development Basics.'),
('B002', 'Internet and World Wide Web', './img/InternetWWW.jpg', 1945, 'Introduction to Internet and World wide web'),
('B003', 'Mathematics', './img/mathematics.jpg', 2015, 'Basic Mathematics knowledge like Algebra and Trigonometry.');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `bookId` varchar(10) NOT NULL,
  `reviewerId` varchar(10) NOT NULL,
  `rating` int(11) DEFAULT 1,
  `reviewDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`bookId`, `reviewerId`, `rating`, `reviewDate`) VALUES
('B001', 'R001', 5, '2024-06-21 11:11:59'),
('B001', 'R003', 4, '2024-09-24 11:11:59'),
('B001', 'R004', 4, '2024-08-16 01:24:19'),
('B001', 'R005', 3, '2024-08-18 02:42:23'),
('B001', 'R006', 3, '2024-08-18 06:17:49'),
('B002', 'R002', 4, '2024-07-22 12:11:59'),
('B002', 'R003', 5, '2024-10-25 12:11:59'),
('B002', 'R004', 4, '2024-08-16 01:26:57'),
('B002', 'R005', 3, '2024-08-18 03:06:16'),
('B003', 'R003', 3, '2024-08-23 13:11:59'),
('B003', 'R004', 4, '2024-08-16 01:27:54'),
('B003', 'R005', 3, '2024-08-18 03:07:21');

-- --------------------------------------------------------

--
-- Table structure for table `reviewer`
--

CREATE TABLE `reviewer` (
  `reviewerId` varchar(10) NOT NULL,
  `reviewerName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviewer`
--

INSERT INTO `reviewer` (`reviewerId`, `reviewerName`) VALUES
('R001', 'Donald'),
('R002', 'Vladimir'),
('R003', 'Theresa'),
('R004', 'Prajwol'),
('R005', 'regex'),
('R006', 'Pratima');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`authorId`);

--
-- Indexes for table `authorship`
--
ALTER TABLE `authorship`
  ADD PRIMARY KEY (`bookId`,`authorId`),
  ADD KEY `authorId` (`authorId`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`bookId`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`bookId`,`reviewerId`),
  ADD KEY `reviewerId` (`reviewerId`);

--
-- Indexes for table `reviewer`
--
ALTER TABLE `reviewer`
  ADD PRIMARY KEY (`reviewerId`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `authorship`
--
ALTER TABLE `authorship`
  ADD CONSTRAINT `authorship_ibfk_1` FOREIGN KEY (`bookId`) REFERENCES `book` (`bookId`),
  ADD CONSTRAINT `authorship_ibfk_2` FOREIGN KEY (`authorId`) REFERENCES `author` (`authorId`);

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`bookId`) REFERENCES `book` (`bookId`),
  ADD CONSTRAINT `report_ibfk_2` FOREIGN KEY (`reviewerId`) REFERENCES `reviewer` (`reviewerId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
