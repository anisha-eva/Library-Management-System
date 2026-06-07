-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2026 at 08:23 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pciu_library_advanced`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `Book_ID` int(11) NOT NULL,
  `Book_Name` varchar(150) DEFAULT NULL,
  `Author` varchar(100) DEFAULT NULL,
  `Category` varchar(100) DEFAULT NULL,
  `Edition` varchar(20) DEFAULT NULL,
  `Price` decimal(10,2) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `Status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`Book_ID`, `Book_Name`, `Author`, `Category`, `Edition`, `Price`, `Quantity`, `Status`) VALUES
(1, 'Structural Analysis', 'R.C Hibbeler', 'Engineering', '9', 1000.00, 3, 'Available'),
(2, 'English Literature History', 'M.H.Abrams', 'Humanities', '9', 820.00, 8, 'Available'),
(4, 'Engineering Drawing', 'N.D.Bhatt', 'Engineering', '5', 800.00, 15, 'Available'),
(5, 'physics', 'eva', 'education', '2', 10.00, 4, 'Available'),
(6, 'Management Theory', 'Stephen P. Robbins', 'Business', '11', 850.00, 8, 'Available'),
(7, 'Marketing Management', 'Philip Kotler', 'Business', '16', 1000.00, 7, 'Available'),
(10, 'Human Resource Management', 'Gary Dessler', 'Business', '15', 880.00, 9, 'Available'),
(11, 'Strategic Management', 'Fred R. David', 'Business', '12', 920.00, 5, 'Available'),
(12, 'Entrepreneurship Development', 'Robert Hisrich', 'Business', '10', 800.00, 11, 'Available'),
(13, 'Organizational Behavior', 'Robbins & Judge', 'Business', '18', 870.00, 9, 'Available'),
(15, 'Introduction to Sociology', 'Anthony Giddens', 'Humanities', '7', 800.00, 10, 'Available'),
(16, 'Political Theory', 'Andrew Heywood', 'Humanities', '4', 750.00, 8, 'Available'),
(17, 'World History', 'William McNeill', 'Humanities', '3', 900.00, 6, 'Available'),
(18, 'Psychology Basics', 'David G. Myers', 'Humanities', '11', 850.00, 9, 'Available'),
(19, 'Philosophy: The Basics', 'Nigel Warburton', 'Humanities', '5', 700.00, 7, 'Available'),
(20, 'Cultural Anthropology', 'Conrad Kottak', 'Humanities', '6', 950.00, 5, 'Available'),
(21, 'History of Economic Thought', 'Adam Smith', 'Humanities', '1', 600.00, 12, 'Available'),
(22, 'Modern Political Analysis', 'Robert Dahl', 'Humanities', '2', 780.00, 6, 'Available'),
(23, 'History of English Literature', 'M.H. Abrams', 'Humanities', '9', 820.00, 7, 'Available'),
(24, 'Social Research Methods', 'Alan Bryman', 'Humanities', '4', 880.00, 8, 'Available'),
(25, 'Pride and Prejudice', 'Jane Austen', 'English', '1', 400.00, 10, 'Available'),
(26, 'To Kill a Mockingbird', 'Harper Lee', 'English', '1', 450.00, 8, 'Available'),
(27, 'The Great Gatsby', 'F. Scott Fitzgerald', 'English', '3', 420.00, 7, 'Available'),
(28, '1984', 'George Orwell', 'English', '2', 480.00, 9, 'Available'),
(29, 'The Alchemist', 'Paulo Coelho', 'English', '2', 500.00, 15, 'Available'),
(30, 'Harry Potter and the Sorcerer Stone', 'J.K. Rowling', 'Fantasy', '1', 800.00, 20, 'Available'),
(31, 'The Hobbit', 'J.R.R. Tolkien', 'Fantasy', '1', 700.00, 10, 'Available'),
(32, 'Sherlock Holmes: Complete Stories', 'Arthur Conan Doyle', 'Mystery', '2', 550.00, 9, 'Available'),
(33, 'Animal Farm', 'George Orwell', 'Political Fiction', '2', 420.00, 11, 'Available'),
(34, 'Wuthering Heights', 'Emily Brontë', 'Romance', '1', 500.00, 6, 'Available'),
(35, 'The Da Vinci Code', 'Dan Brown', 'Thriller', '1', 650.00, 14, 'Available'),
(36, 'Rich Dad Poor Dad', 'Robert Kiyosaki', 'Finance', '2', 600.00, 18, 'Available'),
(37, 'Gray’s Anatomy', 'Henry Gray', 'Medical', '39', 1200.00, 5, 'Available'),
(38, 'Guyton Physiology', 'John E. Hall', 'Medical', '14', 1300.00, 6, 'Available'),
(39, 'Robbins Pathology', 'Vinay Kumar', 'Medical', '10', 1100.00, 7, 'Available'),
(40, 'Katzung Pharmacology', 'Bertram Katzung', 'Medical', '13', 1000.00, 8, 'Available'),
(41, 'Harrison Internal Medicine', 'Dennis Kasper', 'Medical', '20', 1500.00, 4, 'Available'),
(42, 'Clinical Microbiology', 'Jawetz', 'Medical', '27', 950.00, 9, 'Available'),
(43, 'Sabiston Surgery', 'Townsend', 'Medical', '21', 1400.00, 5, 'Available'),
(45, 'Netter Atlas of Human Anatomy', 'Frank Netter', 'Medical', '7', 1250.00, 6, 'Available'),
(46, 'Tintinalli Emergency Medicine', 'Tintinalli', 'Medical', '9', 1350.00, 5, 'Available'),
(48, 'Thermodynamics', 'Yunus A. Cengel', 'Engineering', '8', 950.00, 8, 'Available'),
(49, 'Fluid Mechanics', 'Frank M. White', 'Engineering', '7', 980.00, 7, 'Available'),
(58, 'da', 'c', 'Engineering', '5', 250.00, 3, 'Available');

--
-- Triggers `books`
--
DELIMITER $$
CREATE TRIGGER `update_book_status_before_insert` BEFORE INSERT ON `books` FOR EACH ROW BEGIN
    IF NEW.Quantity < 1 THEN
        SET NEW.Status = 'Unavailable';
    ELSE
        SET NEW.Status = 'Available';
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_book_status_before_update` BEFORE UPDATE ON `books` FOR EACH ROW BEGIN
    IF NEW.Quantity < 1 THEN
        SET NEW.Status = 'Unavailable';
    ELSE
        SET NEW.Status = 'Available';
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `book_requests`
--

CREATE TABLE `book_requests` (
  `request_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `status` varchar(20) DEFAULT 'Pending',
  `request_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book_requests`
--

INSERT INTO `book_requests` (`request_id`, `member_id`, `book_id`, `status`, `request_date`) VALUES
(1, 1, 1, 'Approved', '2026-05-16 07:04:58'),
(4, 1, 2, 'Approved', '2026-05-16 07:24:59'),
(5, 1, 5, 'Approved', '2026-05-18 17:52:18'),
(8, 1, 1, 'Approved', '2026-05-18 18:09:03'),
(9, 1, 5, 'Approved', '2026-05-18 18:10:42'),
(10, 1, 1, 'Approved', '2026-05-18 18:12:13'),
(11, 1, 0, 'Pending', '2026-05-18 18:25:44'),
(12, 2, 1, 'Approved', '2026-04-30 18:53:18'),
(13, 1, 30, 'Approved', '2026-05-18 20:27:41'),
(14, 1, 1, 'Approved', '2026-06-05 18:18:21'),
(15, 1, 28, 'Approved', '2026-06-05 18:18:37'),
(16, 1, 18, 'Approved', '2026-06-05 18:22:47'),
(17, 1, 5, 'Approved', '2026-06-05 18:32:33'),
(18, 1, 28, 'Approved', '2026-06-05 18:42:11'),
(19, 1, 48, 'Pending', '2026-06-05 18:45:58'),
(20, 1, 20, 'Pending', '2026-06-07 17:50:07'),
(21, 1, 55, 'Pending', '2026-06-07 17:50:15'),
(22, 1, 26, 'Pending', '2026-06-07 17:50:23'),
(23, 1, 39, 'Pending', '2026-06-07 17:50:30'),
(24, 1, 13, 'Approved', '2026-06-07 17:53:42'),
(25, 1, 28, 'Approved', '2026-06-07 18:02:53');

-- --------------------------------------------------------

--
-- Table structure for table `buy_requests`
--

CREATE TABLE `buy_requests` (
  `request_id` int(11) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  `request_date` date DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `issued_books`
--

CREATE TABLE `issued_books` (
  `Issue_ID` int(11) NOT NULL,
  `Member_ID` int(11) DEFAULT NULL,
  `Book_ID` int(11) DEFAULT NULL,
  `Issue_Date` date DEFAULT NULL,
  `Return_Date` date DEFAULT NULL,
  `Status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `issued_books`
--

INSERT INTO `issued_books` (`Issue_ID`, `Member_ID`, `Book_ID`, `Issue_Date`, `Return_Date`, `Status`) VALUES
(1, 1, 1, '2016-05-10', '2026-05-15', 'Returned'),
(8, 1, 1, '2026-05-16', '2026-03-30', 'Returned'),
(9, 1, 2, '2026-05-16', '2026-05-30', 'Returned'),
(10, 1, 5, '2026-05-18', '2026-06-01', 'Returned'),
(11, 1, 5, '2026-05-18', '2026-06-01', 'Returned'),
(12, 1, 5, '2026-05-19', '2026-06-02', 'Returned'),
(13, 1, 1, '2026-05-19', '2026-06-02', 'Returned'),
(14, 1, 5, '2026-05-19', '2026-06-02', 'Returned'),
(15, 1, 1, '2026-05-19', '2026-06-02', 'Returned'),
(16, 2, 1, '2026-05-01', '2026-05-15', 'Returned'),
(17, 1, 30, '2026-05-19', '2026-06-02', 'Returned'),
(18, 1, 1, '2026-06-06', '2026-06-20', 'Returned'),
(19, 1, 28, '2026-06-06', '2026-03-20', 'Issued'),
(20, 1, 18, '2026-06-06', '2026-06-20', 'Returned'),
(21, 1, 28, '2026-06-06', '2026-06-20', 'Issued'),
(22, 1, 5, '2026-06-06', '2026-04-20', 'Returned'),
(23, 1, 13, '2026-06-07', '2026-06-21', 'Issued'),
(24, 1, 28, '2026-06-08', '2026-06-22', 'Issued');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Address` varchar(200) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Phone_number` varchar(20) DEFAULT NULL,
  `Membership_date` date DEFAULT NULL,
  `STATUS` varchar(20) DEFAULT NULL,
  `PASSWORD` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`ID`, `Name`, `Address`, `Email`, `Phone_number`, `Membership_date`, `STATUS`, `PASSWORD`) VALUES
(1, 'Anisa Rahman', 'Chattogram', 'anisa1@gmail.com', '1710000001', '2026-01-10', 'Active', '12345'),
(2, 'Rahim Uddin', 'Dhaka', 'rahim2@gmail.com', '1710000002', '2026-02-05', 'Active', '12346'),
(3, 'Karim Hossain', 'Sylhet', 'karim3@gmail.com', '1710000003', '2026-03-12', 'Active', '12347'),
(4, 'Nusrat Jahan', 'Comilla', 'nusrat4@gmail.com', '1710000004', '2026-01-25', 'Active', '12348'),
(5, 'Shihab Khan', 'Khulna', 'shihab5@gmail.com', '1710000005', '2026-02-18', 'Active', '12349'),
(6, 'Fahim Ahmed', 'Rajshahi', 'fahim6@gmail.com', '1710000006', '2026-03-01', 'Active', '123450'),
(7, 'Mitu Akter', 'Barishal', 'mitu7@gmail.com', '1710000007', '2026-01-15', 'Active', '1234500'),
(8, 'Tanvir Hasan', 'Dhaka', 'tanvir8@gmail.com', '1710000008', '2026-02-22', 'Active', '123405'),
(9, 'Sadia Islam', 'Chattogram', 'sadia9@gmail.com', '1710000009', '2026-03-08', 'Active', '123459'),
(10, 'Imran Hossain', 'Sylhet', 'imran10@gmail.com', '1710000010', '2026-01-30', 'Active', '123475'),
(11, 'eva', 'dhaka', 'eva@gmail.com', '15457879879', '2026-05-15', 'Active', '1212'),
(12, 'sumaiya', 'Agrabad', 'sumaiya@gmail.com', '01578979879', '2026-05-18', 'Active', 'hello'),
(13, 'dd', 'hh', 'dd@gmail.com', '01234567', '2026-06-05', 'Active', 'ttt'),
(14, 'era', 'ss', 'era@gmail.com', '0124', '2026-06-05', 'Active', '1212'),
(15, 'eva', 'ctg', 'eva@gmail.com', '123456', '2026-06-07', 'Active', '222'),
(16, 'era', 'ss', 'era@gmail.com', '0124', '2026-06-07', 'Active', '123');

-- --------------------------------------------------------

--
-- Table structure for table `sell_requests`
--

CREATE TABLE `sell_requests` (
  `request_id` int(11) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `book_name` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `edition` varchar(100) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `request_date` date DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`Book_ID`);

--
-- Indexes for table `book_requests`
--
ALTER TABLE `book_requests`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `buy_requests`
--
ALTER TABLE `buy_requests`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `issued_books`
--
ALTER TABLE `issued_books`
  ADD PRIMARY KEY (`Issue_ID`),
  ADD KEY `Member_ID` (`Member_ID`),
  ADD KEY `Book_ID` (`Book_ID`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sell_requests`
--
ALTER TABLE `sell_requests`
  ADD PRIMARY KEY (`request_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `Book_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `book_requests`
--
ALTER TABLE `book_requests`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `buy_requests`
--
ALTER TABLE `buy_requests`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `issued_books`
--
ALTER TABLE `issued_books`
  MODIFY `Issue_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `sell_requests`
--
ALTER TABLE `sell_requests`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `issued_books`
--
ALTER TABLE `issued_books`
  ADD CONSTRAINT `issued_books_ibfk_1` FOREIGN KEY (`Member_ID`) REFERENCES `member` (`ID`),
  ADD CONSTRAINT `issued_books_ibfk_2` FOREIGN KEY (`Book_ID`) REFERENCES `books` (`Book_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
