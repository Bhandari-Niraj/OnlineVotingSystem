-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2016 at 04:22 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_election`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `Admin_Id` int(11) NOT NULL,
  `Name` varchar(60) NOT NULL,
  `Staff_Id` varchar(12) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Mobile_No` varchar(15) NOT NULL,
  `Status` tinyint(1) DEFAULT '0',
  `Password` varchar(32) NOT NULL,
  `Last_Login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`Admin_Id`, `Name`, `Staff_Id`, `Email`, `Mobile_No`, `Status`, `Password`, `Last_Login`) VALUES
(1, 'Niraj Bhandari', '12JAN001', 'niraj@gmail.com', '9846466261', 1, '0192023a7bbd73250516f069df18b500', '2016-12-01 16:18:34');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_candidate`
--

CREATE TABLE `tbl_candidate` (
  `Candidate_Id` int(11) NOT NULL,
  `Name` varchar(60) NOT NULL,
  `Election_Id` int(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Detail` text,
  `Photo` varchar(255) NOT NULL,
  `Parent_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_candidate`
--

INSERT INTO `tbl_candidate` (`Candidate_Id`, `Name`, `Election_Id`, `Email`, `Detail`, `Photo`, `Parent_Id`) VALUES
(2, 'Akash Shrestha', 4, 'akash@gmail.com', '<p>Name: Akash Shrestha</p>\r\n\r\n<p>Joined : Decemeber 2012</p>\r\n\r\n<p>Staff Type: Senior</p>\r\n\r\n<p>Education: Msc It</p>\r\n\r\n<p>Award: Staff of the year 2013</p>\r\n', '583fc0165fd51_akash.jpg', 1),
(3, 'Biren Tamang', 4, 'bire@gmail.com', '<p>Name: Birendra Tamange</p>\r\n\r\n<p>Joined : January 2014</p>\r\n\r\n<p>Staff Type: Senior</p>\r\n\r\n<p>email: bire@gmail.com</p>\r\n\r\n<p>Education: Msc It</p>\r\n\r\n<p>Award: Staff of the year 2014</p>\r\n', '583fcb9ca75a7_bire.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_election`
--

CREATE TABLE `tbl_election` (
  `Election_Id` int(11) NOT NULL,
  `Position` varchar(60) NOT NULL,
  `Detail` text,
  `Date` date NOT NULL,
  `Parent_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_election`
--

INSERT INTO `tbl_election` (`Election_Id`, `Position`, `Detail`, `Date`, `Parent_Id`) VALUES
(4, 'CEO', '', '2016-12-01', 1),
(5, 'Managing Director', '', '2016-12-02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_election_name`
--

CREATE TABLE `tbl_election_name` (
  `Id` int(11) NOT NULL,
  `Name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_election_name`
--

INSERT INTO `tbl_election_name` (`Id`, `Name`) VALUES
(1, 'Board election 2016');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff`
--

CREATE TABLE `tbl_staff` (
  `Staff_Id` varchar(12) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Staff_Type_Id` int(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Mobile_No` varchar(15) NOT NULL,
  `Status` tinyint(1) DEFAULT '0',
  `Password` varchar(32) NOT NULL,
  `Last_Login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_staff`
--

INSERT INTO `tbl_staff` (`Staff_Id`, `Name`, `Staff_Type_Id`, `Email`, `Mobile_No`, `Status`, `Password`, `Last_Login`) VALUES
('12DEC002', 'Akash Shrestha', 1, 'akash@gmail.com', '9804163662', 1, '94754d0abb89e4cf0a7f1c494dbb9d2c', NULL),
('12JAN001', 'Niraj Bhandari', 2, 'niraj@gmail.com', '9846466261', 1, 'e1d655c1c671b30b9be1cd8e06b4bcd6', NULL),
('13JUN003', 'Hari Bahadur Shrestha', 4, 'me_hari@gmail.com', '9876587654', 0, 'a9bcf1e4d7b95a22e2975c812d938889', NULL),
('13SEP004', 'Biren Tamang', 1, 'bire@gmail.com', '9876545654', 1, '111c416128f9b74ac0a73c7629f7caf1', NULL),
('14NOV006', 'Rupesh Shrestha', 1, 'rupesh_09@gmail.com', '987654321', 1, 'ffa617bcca60f1705f808544edd945f1', NULL),
('14OCT005', 'Nabin Gautam', 1, 'nabin@outlook.com', '9772654156', 1, '40f0d13d4c1864a6f9ac470794889354', NULL),
('16APR013', 'Shiva Dhakal', 3, 'shivaya@yahoo.com', '98762355367', 1, '69f404925df883e0e5579d65b7768e7c', NULL),
('16FEB011', 'Bimesh Adhikari', 3, 'bimesh@gmail.com', '98765433321', 1, '833c1f3d93f0dad77d9bc42c9a8410b7', NULL),
('16MAR012', 'Kismat Gurung', 3, 'haude@yahoo.com', '9876567651', 1, '96c84fdad49346e6640846b91c661a06', NULL),
('16NOV015', 'Kismat Bista', 3, 'kismat_me@gmail.com', '932482374', 1, '96c84fdad49346e6640846b91c661a06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff_type`
--

CREATE TABLE `tbl_staff_type` (
  `Staff_Type_Id` int(11) NOT NULL,
  `Staff_Type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_staff_type`
--

INSERT INTO `tbl_staff_type` (`Staff_Type_Id`, `Staff_Type`) VALUES
(2, 'Executive Level'),
(3, 'Junior Level'),
(4, 'Non-Technical Level'),
(1, 'Senior Level');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vote_count`
--

CREATE TABLE `tbl_vote_count` (
  `Vote_Id` int(11) NOT NULL,
  `Election_Id` int(11) NOT NULL,
  `Candidate_Id` int(11) NOT NULL,
  `Staff_Id` varchar(12) NOT NULL,
  `Parent_Id` int(11) NOT NULL,
  `VoteCount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_vote_count`
--

INSERT INTO `tbl_vote_count` (`Vote_Id`, `Election_Id`, `Candidate_Id`, `Staff_Id`, `Parent_Id`, `VoteCount`) VALUES
(3, 4, 2, '12DEC002', 1, 1),
(4, 4, 3, '13SEP004', 1, 1),
(5, 4, 3, '16FEB011', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`Admin_Id`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Mobile_No` (`Mobile_No`),
  ADD KEY `Staff_Id` (`Staff_Id`);

--
-- Indexes for table `tbl_candidate`
--
ALTER TABLE `tbl_candidate`
  ADD PRIMARY KEY (`Candidate_Id`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `Election_Id` (`Election_Id`),
  ADD KEY `Parent_Id` (`Parent_Id`);

--
-- Indexes for table `tbl_election`
--
ALTER TABLE `tbl_election`
  ADD PRIMARY KEY (`Election_Id`),
  ADD UNIQUE KEY `Position` (`Position`),
  ADD KEY `Parent_Id` (`Parent_Id`);

--
-- Indexes for table `tbl_election_name`
--
ALTER TABLE `tbl_election_name`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  ADD PRIMARY KEY (`Staff_Id`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Mobile_No` (`Mobile_No`),
  ADD KEY `Staff_Type_Id` (`Staff_Type_Id`);

--
-- Indexes for table `tbl_staff_type`
--
ALTER TABLE `tbl_staff_type`
  ADD PRIMARY KEY (`Staff_Type_Id`),
  ADD UNIQUE KEY `Staff_Type` (`Staff_Type`);

--
-- Indexes for table `tbl_vote_count`
--
ALTER TABLE `tbl_vote_count`
  ADD PRIMARY KEY (`Vote_Id`),
  ADD KEY `Election_Id` (`Election_Id`),
  ADD KEY `Candidate_Id` (`Candidate_Id`),
  ADD KEY `Staff_Id` (`Staff_Id`),
  ADD KEY `Parent_Id` (`Parent_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `Admin_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_candidate`
--
ALTER TABLE `tbl_candidate`
  MODIFY `Candidate_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_election`
--
ALTER TABLE `tbl_election`
  MODIFY `Election_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_election_name`
--
ALTER TABLE `tbl_election_name`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_staff_type`
--
ALTER TABLE `tbl_staff_type`
  MODIFY `Staff_Type_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_vote_count`
--
ALTER TABLE `tbl_vote_count`
  MODIFY `Vote_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD CONSTRAINT `tbl_admin_ibfk_1` FOREIGN KEY (`Staff_Id`) REFERENCES `tbl_staff` (`Staff_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_candidate`
--
ALTER TABLE `tbl_candidate`
  ADD CONSTRAINT `tbl_candidate_ibfk_1` FOREIGN KEY (`Election_Id`) REFERENCES `tbl_election` (`Election_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_candidate_ibfk_2` FOREIGN KEY (`Parent_Id`) REFERENCES `tbl_election_name` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_election`
--
ALTER TABLE `tbl_election`
  ADD CONSTRAINT `tbl_election_ibfk_1` FOREIGN KEY (`Parent_Id`) REFERENCES `tbl_election_name` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  ADD CONSTRAINT `tbl_staff_ibfk_1` FOREIGN KEY (`Staff_Type_Id`) REFERENCES `tbl_staff_type` (`Staff_Type_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_vote_count`
--
ALTER TABLE `tbl_vote_count`
  ADD CONSTRAINT `tbl_vote_count_ibfk_1` FOREIGN KEY (`Election_Id`) REFERENCES `tbl_election` (`Election_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_vote_count_ibfk_2` FOREIGN KEY (`Candidate_Id`) REFERENCES `tbl_candidate` (`Candidate_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_vote_count_ibfk_3` FOREIGN KEY (`Staff_Id`) REFERENCES `tbl_staff` (`Staff_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_vote_count_ibfk_4` FOREIGN KEY (`Parent_Id`) REFERENCES `tbl_election_name` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
