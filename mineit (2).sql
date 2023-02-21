-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2022 at 07:51 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mineit`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(15) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `dob` varchar(15) DEFAULT NULL,
  `password` varchar(75) NOT NULL,
  `dp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `gender`, `dob`, `password`, `dp`) VALUES
(1, 'admin', 'admin@admin.com', 'Male', '1995-07-02', '1234', '63a0283845eb19.84569322639f4f912af1d8.65753820pxfuel.com.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dnum` int(255) NOT NULL,
  `dname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dnum`, `dname`) VALUES
(1, 'Mining'),
(2, 'Finance'),
(3, 'Environment'),
(4, 'Sales'),
(5, 'Geology');

-- --------------------------------------------------------

--
-- Table structure for table `elogin`
--

CREATE TABLE `elogin` (
  `eid` int(11) NOT NULL,
  `ename` varchar(30) NOT NULL,
  `email` text NOT NULL,
  `password` varchar(30) NOT NULL,
  `dnum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `elogin`
--

INSERT INTO `elogin` (`eid`, `ename`, `email`, `password`, `dnum`) VALUES
(12, 'Hemanth', 'hemanth@gmail.com', 'hemanth', 1),
(27, 'Partha', 'partha99@gmail.com', 'partha', 2),
(81, 'Achyuta', 'achyuta@yahoo.com', 'achyuta', 3),
(86, 'Ram', 'ram288@gmail.com', 'ram', 5),
(111, 'Amruth', 'amruth@gmail.com', 'amruth', 4);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `eid` int(10) NOT NULL,
  `ename` varchar(40) NOT NULL,
  `email` text NOT NULL,
  `password` varchar(25) NOT NULL,
  `dob` date NOT NULL,
  `hiredate` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `job` varchar(30) NOT NULL,
  `salary` int(10) NOT NULL,
  `dnum` int(10) NOT NULL,
  `addresses` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`eid`, `ename`, `email`, `password`, `dob`, `hiredate`, `gender`, `job`, `salary`, `dnum`, `addresses`) VALUES
(12, 'Hemanth', 'hemanth@gmail.com', 'hemanth', '1965-12-08', '2012-03-12', 'Male', 'General Manager', 220000, 1, '#1034, 3rd main, Vidyanagar, Hosapete'),
(13, 'Lakshman', 'lakshman@gmail.com', 'lakshman', '1989-11-09', '2012-03-06', 'Male', 'Supervisor', 18000, 1, '2nd cross, Rajeev Nagar, Hosapete'),
(21, 'Girish', 'girishsah@yahoo.com', 'girish', '1994-08-25', '2020-10-20', 'Male', 'Operator', 19000, 1, '4th cross, Gandhi Nagar, Hosapete'),
(22, 'Raman', 'raman@yahoo.com', 'raman', '1989-04-15', '2015-03-21', 'Male', 'Supervisor', 18000, 1, '#237, M J Nagar, Hosapete '),
(29, 'Alwin', 'alwin88@gmail.com', 'alwin', '1982-02-26', '2014-09-20', 'Male', 'Blaster', 12000, 1, '#1092, N C Colony, Hosapete'),
(31, 'Raj', 'raj89@gmail.com', 'raj', '1989-04-04', '2016-08-17', 'Male', 'Foreman', 20000, 1, '#243, Bapuji Nagar, Sandur'),
(33, 'Kalyan', 'kalyank@yahoo.com', 'kalayan', '1993-04-15', '2021-10-02', 'Male', 'Operator', 19000, 1, '5th cross, J P Nagar, Hosapete'),
(34, 'Salman', 'mdsalman@gmail.com', 'salman', '1976-03-18', '2015-01-28', 'Male', 'Assistant Mines Manager', 70000, 1, '#1287, J P Nagar, Hosapete'),
(37, 'Neil', 'neilaksh31@gmail.com', 'neil', '1982-01-31', '2015-04-23', 'Male', 'Accountant', 80000, 2, '#2028, Gandhi colony, Hosapete'),
(38, 'Sanjeev', 'sanjeev@yahoo.com', 'sanjeev', '1991-08-12', '2021-07-12', 'Male', 'Operator', 19000, 1, '5th main, M J Nagar, Hosapete'),
(45, 'Krishna', 'krishna98@gmail.com', 'krish', '1983-08-09', '2016-09-23', 'Male', 'Supervisor', 18000, 1, '#897, N C Colony, Hosapete'),
(50, 'Kaleem', 'kaleem211@yahoo.com', '', '1994-06-02', '2021-11-18', 'Male', 'Driver', 18500, 1, '8th main, J P Nagar, Hosapete'),
(52, 'Ambar', 'ambark@gmail.com', '', '1990-11-22', '2015-02-12', 'Male', 'Record Keeper', 60000, 2, '#778, J P Nagar, Hosapete'),
(55, 'harish', 'harisha@gmail.com', '', '1993-09-24', '2019-03-15', 'Male', 'Helper', 10000, 1, '11th main, M J Nagar, Hosapete'),
(58, 'Suresha', 'suresha@gmail.com', '', '1992-11-18', '2018-07-26', 'Male', 'Helper', 10000, 1, '3rd cross, Ashok Nagar, Hosapete'),
(59, 'Shyam', 'shyama@yahoo.com', '', '1996-02-02', '2022-01-18', 'Male', 'Driver', 18500, 1, '5th main, M J Nagar, Hosapete'),
(62, 'Basha', 'basha@gmail.com', '', '1988-03-17', '2017-09-04', 'Male', 'Supervisor', 18000, 1, '#623, M G Road, Sandur'),
(63, 'George', 'george@yahoo.com', '', '1995-10-21', '2020-03-24', 'Male', 'Driver', 18500, 1, '2nd main, M P Prakash Nagar, Hosapete'),
(64, 'Sebastian', 'sebastian@yahoo.com', '', '1995-08-25', '2021-06-30', 'Male', 'Driver', 18500, 1, '2nd main, N C Colony, Hosapete'),
(65, 'Rahul', 'rahul14@gmail.com', '', '1985-03-25', '2019-09-11', 'Male', 'Foreman', 20000, 1, '#651, M G Road, Sandur'),
(66, 'Govinda', 'govinda@gmail.com', '', '1994-07-15', '2018-01-12', 'Male', 'Helper', 10000, 1, '5th main, Lakshmi Nagar, Sandur'),
(69, 'Kavish', 'kavish02@gmail.com', '', '1974-08-24', '2016-07-22', 'Male', 'Mines Manager', 150000, 1, '#2022, 1st cross, M J Nagar, Hosapete'),
(70, 'Bharat', 'bharata@gmail.com', '', '1994-04-19', '2020-03-17', 'Male', 'Helper', 10000, 1, '5th cross, Cowl Bazar, Sandur'),
(74, 'Guru', 'guru907@gmail.com', '', '1992-10-19', '2018-05-31', 'Male', 'Operator', 19000, 1, '#112, 2nd main, Gandhi Nagar, Hosapete'),
(75, 'Madhava', 'madhavakrish@gmail.com', '', '1991-05-24', '2021-08-26', 'Male', 'Operator', 19000, 1, '#7611, J P Nagar, Hosapete'),
(76, 'Rohit', 'rohit243@gmail.com', '', '1992-06-12', '2018-08-13', 'Male', 'Driller', 13000, 1, '#863, 6th cross, Gandhi Nagar, Sandur'),
(79, 'Kamal', 'kamal34@gmail.com', '', '1993-12-18', '2018-06-12', 'Male', 'Driller', 13000, 1, '#863, 1st cross, H B Halli'),
(80, 'Rajesh', 'rajesha12@gmail.com', '', '1988-03-12', '2019-03-19', 'Male', 'Helper', 10000, 1, '#933, 4th cross, N C Colony, Hosapete'),
(81, 'Achyuta', 'achyuta@yahoo.com', '', '1976-08-09', '2015-08-19', 'Male', 'Environment Manager', 85000, 3, '5th cross, Eshwar Nagar, Hosapete'),
(86, 'Ram', 'ram288@gmail.com', '', '1969-08-28', '2014-10-14', 'Male', 'Senior Geologist', 120000, 5, '5th cross, N C Colony, Hosapete'),
(88, 'Ramesha', 'ramesha@gmail.com', '', '1990-06-15', '2015-05-15', 'Male', 'Helper', 10000, 1, '3rd cross, Azad Nagar, Hosapete'),
(91, 'Gopala', 'gopala@yahoo.com', '', '1994-07-23', '2021-07-19', 'Male', 'Driver', 18500, 1, '6th cross, Amaravati, Hosapete'),
(92, 'Akash', 'akash20@gmail.com', '', '1991-12-20', '2016-08-10', 'Male', 'Record Keeper', 60000, 2, '#787, M J Nagar, Hosapete'),
(98, 'Ratan', 'ratan67@gmail.com', '', '1992-07-01', '2022-05-07', 'Male', 'Operator', 19000, 1, '4th cross, Cowl Bazar, Sandur'),
(99, 'Hari', 'hari@yahoo.com', '', '1993-05-30', '2021-09-10', 'Male', 'Driver', 18500, 1, '5th main, M P Prakash Nagar, Hosapete'),
(102, 'Veeresh', 'veeresh@gmail.com', '', '1976-06-08', '2014-10-01', 'Male', 'Sampler', 65000, 5, '4th cross, Akashvani, Hosapete'),
(103, 'Veer', 'veeren@gmail.com', '', '1979-05-18', '2016-12-11', 'Male', 'Chemist', 75000, 5, '4th cross, N C Colony, Hosapete'),
(105, 'Sumanth', 'sumanth@yahoo.com', '', '1994-04-11', '2020-09-15', 'Male', 'Driver', 18500, 1, '3rd main, Eshwar Nagar, Hosapete'),
(108, 'Arjun', 'arjun421@gmail.com', '', '1989-04-21', '2016-07-31', 'Male', 'Supervisor', 25000, 4, '#1333, Patel Nagar, Hosapete'),
(109, 'Satya', 'satya88@yahoo.com', '', '1993-08-26', '2020-09-08', 'Male', 'Driver', 18500, 1, '8th main, Azad Nagar, Hosapete'),
(111, 'Amruth', 'amruth@gmail.com', '', '1981-04-25', '2014-08-05', 'Male', 'Sales Manager', 85000, 4, '#5651, Rajeev Nagar, Hosapete'),
(112, 'Ganesh', 'ganesh@gmail.com', '', '1988-08-08', '2018-12-21', 'Male', 'Surveyor', 60000, 5, '12th cross, Akashvani, Hosapete'),
(116, 'Abhishek', 'abhishek@gmail.com', '', '1989-07-16', '2018-01-20', 'Male', 'Assistant', 60000, 5, '1st cross, Azad Nagar, Hosapete'),
(118, 'Darshan', 'darshh@gmail.com', '', '1982-03-18', '2017-02-21', 'Male', 'Assistant', 60000, 5, '10th cross, Akashvani, Hosapete'),
(119, 'Sita', 'sitaram@yahoo.com', '', '1997-09-10', '2022-04-08', 'Female', 'Worker', 10000, 3, 'Karignoor'),
(121, 'Aditya', 'aditya@yahoo.com', '', '1986-02-19', '2018-04-09', 'Male', 'Supervisor', 20000, 3, '8th cross, Eshwar Nagar, Hosapete'),
(122, 'Gita', 'gitagita@yahoo.com', '', '1996-01-20', '2022-08-18', 'Female', 'Worker', 10000, 3, 'Karignoor'),
(125, 'Savitri', 'savitri@yahoo.com', '', '1994-10-20', '2022-01-12', 'Female', 'Worker', 10000, 3, 'Karignoor'),
(129, 'Aditya', 'aditya11@yahoo.com', '', '1986-02-19', '2018-04-09', 'Male', 'Supervisor', 20000, 3, '8th cross, Eshwar Nagar, Hosapete'),
(132, 'Jagadish', 'jagadish@gmail.com', '', '1988-01-15', '2016-03-15', 'Male', 'Assistant Manager', 75000, 4, '#521, Eshwar Nagar, Hosapete'),
(135, 'Ganga', 'gangamma@yahoo.com', '', '1997-07-30', '2022-06-16', 'Female', 'Worker', 10000, 3, 'Karignoor'),
(138, 'Mayur', 'mayur221@gmail.com', '', '1986-02-25', '2017-01-11', 'Male', 'Supervisor', 25000, 4, '#5111, Eshwar Nagar, Hosapete'),
(141, 'Shiva', 'shiva88@yahoo.com', '', '1994-12-13', '2021-11-13', 'Male', 'Worker', 10000, 3, 'Karignoor'),
(142, 'Ananta', 'ananta@yahoo.com', '', '1993-02-10', '2021-12-12', 'Male', 'Worker', 10000, 3, 'Karignoor'),
(277, 'Parth', 'parth99@gmail.com', 'parthh', '1971-09-10', '2013-08-03', 'male', 'Finance manager', 100000, 2, '#564, Akashvani 4th cross, Hosapete District');

-- --------------------------------------------------------

--
-- Table structure for table `emp_leave`
--

CREATE TABLE `emp_leave` (
  `id` int(11) NOT NULL,
  `reason` varchar(500) NOT NULL,
  `start_date` varchar(24) NOT NULL,
  `last_date` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_leave`
--

INSERT INTO `emp_leave` (`id`, `reason`, `start_date`, `last_date`, `email`, `status`) VALUES
(28, '  I got sick', '2022-12-19', '2022-12-21', 'hemanth@gmail.com', 'Canceled');

-- --------------------------------------------------------

--
-- Table structure for table `environmentdata`
--

CREATE TABLE `environmentdata` (
  `SerialNo` int(11) NOT NULL,
  `Month` varchar(20) NOT NULL,
  `Air (Permissible limit)` varchar(20) NOT NULL,
  `Water (Permissible limit)` varchar(20) NOT NULL,
  `Noise (Permissible limit)` varchar(20) NOT NULL,
  `Plantation count` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `environmentdata`
--

INSERT INTO `environmentdata` (`SerialNo`, `Month`, `Air (Permissible limit)`, `Water (Permissible limit)`, `Noise (Permissible limit)`, `Plantation count`) VALUES
(4, 'Apr 2022', 'No', 'Yes', 'Yes', 20),
(8, 'Aug 2022', 'Yes', 'Yes', 'Yes', 150),
(12, 'Dec 2022', 'Yes', 'Yes', 'Yes', 10),
(2, 'Feb 2022', 'Yes', 'Yes', 'Yes', 25),
(1, 'Jan 2022', 'Yes', 'Yes', 'Yes', 20),
(7, 'Jul 2022', 'Yes', 'No', 'Yes', 200),
(6, 'Jun 2022', 'Yes', 'Yes', 'Yes', 500),
(3, 'Mar 2022', 'Yes', 'Yes', 'Yes', 30),
(5, 'May 2022', 'Yes', 'Yes', 'Yes', 35),
(11, 'Nov 2022', 'Yes', 'Yes', 'Yes', 20),
(10, 'Oct 2022', 'No', 'Yes', 'Yes', 150),
(9, 'Sep 2022', 'Yes', 'Yes', 'Yes', 50);

-- --------------------------------------------------------

--
-- Table structure for table `financedata`
--

CREATE TABLE `financedata` (
  `id` int(11) NOT NULL,
  `Month` varchar(20) NOT NULL,
  `Expenses` int(10) NOT NULL,
  `Revenue` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `financedata`
--

INSERT INTO `financedata` (`id`, `Month`, `Expenses`, `Revenue`) VALUES
(0, '', 0, 0),
(4, 'Apr 2022', 2650000, 81200000),
(8, 'Aug 2022', 2500000, 45000000),
(12, 'Dec 2022', 2800000, 72500000),
(2, 'Feb 2022', 2300000, 45150000),
(1, 'Jan 2022', 2500000, 52500000),
(7, 'Jul 2022', 2200000, 43700000),
(6, 'Jun 2022', 2300000, 50000000),
(3, 'Mar 2022', 2600000, 70000000),
(5, 'May 2022', 2800000, 90000000),
(11, 'Nov 2022', 2400000, 61100000),
(10, 'Oct 2022', 2200000, 48300000),
(9, 'Sep 2022', 2500000, 47300000);

-- --------------------------------------------------------

--
-- Table structure for table `geologydata`
--

CREATE TABLE `geologydata` (
  `SerialNo` int(11) NOT NULL,
  `Month` varchar(20) NOT NULL,
  `Permitted extraction amount (in tonnes)` int(100) NOT NULL,
  `Extracted amount (in tonnes)` int(100) NOT NULL,
  `Remaining amount (in tonnes)` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `geologydata`
--

INSERT INTO `geologydata` (`SerialNo`, `Month`, `Permitted extraction amount (in tonnes)`, `Extracted amount (in tonnes)`, `Remaining amount (in tonnes)`) VALUES
(4, 'Apr 2022', 29000, 29000, 0),
(8, 'Aug 2022', 20000, 20000, 0),
(12, 'Dec 2022', 29000, 29000, 0),
(2, 'Feb 2022', 21000, 21000, 0),
(1, 'Jan 2022', 26000, 25000, 1000),
(7, 'Jul 2022', 22000, 19000, 3000),
(6, 'Jun 2022', 24000, 20000, 4000),
(3, 'Mar 2022', 30000, 28000, 2000),
(5, 'May 2022', 30000, 30000, 0),
(11, 'Nov 2022', 26000, 26000, 0),
(10, 'Oct 2022', 24000, 21000, 3000),
(9, 'Sep 2022', 23000, 22000, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `minesdata`
--

CREATE TABLE `minesdata` (
  `SerialNo` int(10) NOT NULL,
  `Month` varchar(20) NOT NULL,
  `Production (in tonnes)` int(100) NOT NULL,
  `Waste (in tonnes)` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `minesdata`
--

INSERT INTO `minesdata` (`SerialNo`, `Month`, `Production (in tonnes)`, `Waste (in tonnes)`) VALUES
(4, 'Apr 2022', 29000, 18000),
(8, 'Aug 2022', 20000, 16000),
(12, 'Dec 2022', 29000, 20000),
(2, 'Feb 2022', 21000, 18000),
(1, 'Jan 2022', 25000, 20000),
(7, 'Jul 2022', 19000, 14000),
(6, 'Jun 2022', 20000, 15000),
(3, 'Mar 2022', 28000, 19000),
(5, 'May 2022', 30000, 20000),
(11, 'Nov 2022', 26000, 19000),
(10, 'Oct 2022', 21000, 15000),
(9, 'Sep 2022', 22000, 18000);

-- --------------------------------------------------------

--
-- Table structure for table `salesdata`
--

CREATE TABLE `salesdata` (
  `SerialNo` int(11) NOT NULL,
  `Month` varchar(20) NOT NULL,
  `Domestic Market (in tonnes)` int(10) NOT NULL,
  `Export (in tonnes)` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salesdata`
--

INSERT INTO `salesdata` (`SerialNo`, `Month`, `Domestic Market (in tonnes)`, `Export (in tonnes)`) VALUES
(4, 'Apr 2022', 17000, 12000),
(8, 'Aug 2022', 12000, 7500),
(12, 'Dec 2022', 18000, 11000),
(2, 'Feb 2022', 9500, 7500),
(1, 'Jan 2022', 14000, 8000),
(7, 'Jul 2022', 16000, 2500),
(6, 'Jun 2022', 15000, 2000),
(3, 'Mar 2022', 18000, 10000),
(5, 'May 2022', 24000, 6000),
(11, 'Nov 2022', 16000, 10000),
(10, 'Oct 2022', 13000, 6000),
(9, 'Sep 2022', 14000, 6500);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dnum`);

--
-- Indexes for table `elogin`
--
ALTER TABLE `elogin`
  ADD UNIQUE KEY `eid` (`eid`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`eid`),
  ADD UNIQUE KEY `email` (`email`) USING HASH,
  ADD KEY `dnum` (`dnum`);

--
-- Indexes for table `emp_leave`
--
ALTER TABLE `emp_leave`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `environmentdata`
--
ALTER TABLE `environmentdata`
  ADD UNIQUE KEY `Month` (`Month`);

--
-- Indexes for table `geologydata`
--
ALTER TABLE `geologydata`
  ADD UNIQUE KEY `Month` (`Month`);

--
-- Indexes for table `minesdata`
--
ALTER TABLE `minesdata`
  ADD UNIQUE KEY `Month` (`Month`);

--
-- Indexes for table `salesdata`
--
ALTER TABLE `salesdata`
  ADD UNIQUE KEY `Month` (`Month`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dnum` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `emp_leave`
--
ALTER TABLE `emp_leave`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`dnum`) REFERENCES `department` (`dnum`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
