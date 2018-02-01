-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2018 at 06:31 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reserve`
--

-- --------------------------------------------------------

--
-- Table structure for table `availability`
--

CREATE TABLE `availability` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `availability`
--

INSERT INTO `availability` (`id`, `room_id`, `checkin`, `checkout`, `qty`) VALUES
(1, 1, '2018-02-05', '2018-02-06', 9),
(2, 2, '2018-02-05', '2018-02-06', 4),
(3, 8, '2018-02-05', '2018-02-06', 3),
(4, 1, '2018-02-07', '2018-02-08', 13),
(5, 2, '2018-02-07', '2018-02-08', 8),
(6, 3, '2018-02-05', '2018-02-06', 2);

-- --------------------------------------------------------

--
-- Table structure for table `bankaccount`
--

CREATE TABLE `bankaccount` (
  `id` int(11) NOT NULL,
  `accountname` varchar(250) NOT NULL,
  `accountnumber` bigint(11) NOT NULL,
  `bankname` varchar(250) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bankaccount`
--

INSERT INTO `bankaccount` (`id`, `accountname`, `accountnumber`, `bankname`, `status`) VALUES
(1, 'Goso Savings BDO', 112312312, 'BDO', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Standard'),
(2, 'Family'),
(3, 'Suite');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reserveid` int(11) NOT NULL,
  `reservationcode` varchar(250) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `balance` decimal(10,0) NOT NULL,
  `dp` decimal(10,0) NOT NULL,
  `paymentstatus` int(11) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `reservationdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reserveid`, `reservationcode`, `user_id`, `total`, `balance`, `dp`, `paymentstatus`, `checkin`, `checkout`, `reservationdate`) VALUES
(1, 'GGWP-49C0823', 2, '3500', '0', '1750', 2, '2018-02-05', '2018-02-06', '2018-02-02'),
(2, 'GGWP-416791C', 2, '1500', '1500', '750', 0, '2018-02-05', '2018-02-06', '2018-02-02'),
(3, 'GGWP-0C67138', 4, '3500', '3500', '1750', 0, '2018-02-07', '2018-02-08', '2018-02-02'),
(4, 'GGWP-3109AD4', 166, '3000', '3000', '1500', 5, '2018-02-05', '2018-02-06', '2018-02-02');

-- --------------------------------------------------------

--
-- Table structure for table `reservationdetails`
--

CREATE TABLE `reservationdetails` (
  `id` int(11) NOT NULL,
  `reservationcode` varchar(250) NOT NULL,
  `user` varchar(250) NOT NULL,
  `room_id` int(11) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `qty` int(11) NOT NULL,
  `totalprice` decimal(10,0) NOT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservationdetails`
--

INSERT INTO `reservationdetails` (`id`, `reservationcode`, `user`, `room_id`, `checkin`, `checkout`, `qty`, `totalprice`, `status`) VALUES
(1, 'GGWP-49C0823', '2', 1, '2018-02-05', '2018-02-06', 1, '3500', ''),
(2, 'GGWP-49C0823', '2', 2, '2018-02-05', '2018-02-06', 1, '3500', ''),
(3, 'GGWP-416791C', '2', 8, '2018-02-05', '2018-02-06', 1, '1500', ''),
(4, 'GGWP-0C67138', '4', 1, '2018-02-07', '2018-02-08', 1, '3500', ''),
(5, 'GGWP-0C67138', '4', 2, '2018-02-07', '2018-02-08', 1, '3500', ''),
(6, 'GGWP-3109AD4', '166', 3, '2018-02-05', '2018-02-06', 1, '3000', '');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `pax` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(65,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `description`, `pax`, `qty`, `price`, `image`, `category_id`, `status`) VALUES
(1, 'Cabanana', 'aw', 2, 10, '1000.00', 'assets/images/aps.png', 1, 0),
(2, 'Oh', 'nana', 5, 5, '2500.00', 'assets/images/cps.png', 2, 0),
(3, 'Nana', 'aw', 2, 3, '3000.00', 'assets/images/rs.png', 3, 0),
(8, 'asd', 'dsa', 1500, 3, '1500.00', 'assets/images/maggs.png', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `reserveCode` varchar(250) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `referencenumber` bigint(20) NOT NULL,
  `bankname` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  `statuspay` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `reserveCode`, `user_id`, `date`, `amount`, `referencenumber`, `bankname`, `image`, `statuspay`) VALUES
(1, 'GGWP-49C0823', 2, '2018-02-01', '2500', 12312, 'Goso', 'assets/receipts/jjbanner.jpg', 2),
(2, 'GGWP-0C67138', 4, '2018-02-01', '1231231', 1321323, 'Goso', 'assets/receipts/maggs.png', 3),
(3, 'GGWP-3109AD4', 166, '2018-02-01', '1212', 0, 'Goso', 'assets/receipts/aps.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `number` varchar(250) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `user_type` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `address`, `number`, `username`, `password`, `user_type`, `status`) VALUES
(2, 'user', 'user', 'user@yahoo.com', 'qc', '123213213', 'user', '12dea96fec20593566ab75692c9949596833adc9', 2, 1),
(3, 'admin', 'admin', 'admin@yahoo.com', 'admin', '123', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 1),
(4, 'kris', 'sobere', 'toffer113@yahoo.com', 'qc', '0912321312321', 'kris', '5386c1e7bd9c410d07ffcc88fc2ceb29deafe180', 2, 1),
(162, 'lbj', 'lbj', 'lbj', 'lbj', '432423', 'lbj', '1ec5b2852e338370d49ca2102e491b2a14b7608c', 2, 1),
(163, 'cams', 'cams', 'cams', 'cams', '12313', 'cams', '2899fc386b5d1db34c33cd9200b107d23e738cf9', 2, 1),
(164, 'sad', 'asd', 'asd@yahoo.com', 'asd', '324', 'asd', 'f10e2821bbbea527ea02200352313bc059445190', 2, 1),
(165, 'asd', 'asd', 'asd', 'asd', '324', 'asd', 'f10e2821bbbea527ea02200352313bc059445190', 2, 1),
(166, 'kobe', 'kobe', 'kobe@yahoo.com', 'kobe', '12121', 'kobe', '0e88297596f1dcdfe98416954fbad2a1bb0d12b8', 2, 1),
(167, 'lbj', 'lbj', 'lbj@yahoo.com', 'lbj', '123213', 'lbj', '1ec5b2852e338370d49ca2102e491b2a14b7608c', 2, 1),
(168, 'kobe', 'kobe', 'kobe@yahoo.com', 'kobe', '639566721273', 'kobe', '0e88297596f1dcdfe98416954fbad2a1bb0d12b8', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `privilege` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `name`, `privilege`, `status`) VALUES
(1, 'admin', 3, 1),
(2, 'user', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `availability`
--
ALTER TABLE `availability`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `bankaccount`
--
ALTER TABLE `bankaccount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reserveid`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `reservationdetails`
--
ALTER TABLE `reservationdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_type` (`user_type`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `availability`
--
ALTER TABLE `availability`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `bankaccount`
--
ALTER TABLE `bankaccount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reserveid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `reservationdetails`
--
ALTER TABLE `reservationdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;
--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `availability`
--
ALTER TABLE `availability`
  ADD CONSTRAINT `availability_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_type`) REFERENCES `user_types` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
