-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2022 at 07:05 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movies`
--

-- --------------------------------------------------------

--
-- Table structure for table `hall`
--

CREATE TABLE `hall` (
  `id` int(11) NOT NULL,
  `Name` varchar(250) NOT NULL,
  `Seats` int(11) NOT NULL,
  `columns` int(11) NOT NULL,
  `dateadded` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hall`
--

INSERT INTO `hall` (`id`, `Name`, `Seats`, `columns`, `dateadded`, `deleted`) VALUES
(1, 'DH1', 67, 20, '2022-01-18 20:40:06', 0),
(2, 'DH2', 70, 10, '2022-01-18 20:43:51', 0),
(4, 'HD3', 70, 30, '2010-01-26 17:33:24', 0),
(5, 'HD4', 43, 10, '2022-01-29 20:54:38', 0),
(6, 'HD5', 20, 5, '2022-01-29 20:54:53', 0),
(7, 'JB2', 56, 20, '2022-02-08 14:53:09', 0),
(8, 'K0k', 70, 10, '2022-02-09 10:34:05', 0);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `muid` varchar(50) NOT NULL,
  `mname` varchar(250) NOT NULL,
  `director` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `img` varchar(250) NOT NULL,
  `movie` varchar(250) NOT NULL,
  `dateadded` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `muid`, `mname`, `director`, `description`, `img`, `movie`, `dateadded`, `deleted`) VALUES
(1, 'RA34', 'The Blacklist  ', 'steve', 'The Blacklist is an American crime thriller television series that premiered on NBC on September 23, 2013. The show follows Raymond \"Red\" Reddington (James Spader), a former U.S. Navy officer turned high-profile criminal who voluntarily surrenders to the FBI after eluding capture for decades.', 'images/blacklist.jpg', 'videos/202201171642433936.mp4', '2022-01-17 13:58:33', 0),
(2, 'RO34', 'Money Heist', 'kenya', 'The Blacklist is an American crime thriller television series that premiered on NBC on September 23, 2013. The show follows Raymond \"Red\" Reddington (James Spader), a former U.S. Navy officer turned high-profile criminal who voluntarily surrenders to the FBI after eluding capture for decades.', 'images/money_heist.png', '', '2022-01-17 13:58:33', 0),
(3, 'GA34', 'Thor', 'John cena', 'The Blacklist is an American crime thriller television series that premiered on NBC on September 23, 2013. The show follows Raymond \"Red\" Reddington (James Spader), a former U.S. Navy officer turned high-profile criminal who voluntarily surrenders to the FBI after eluding capture for decades.', 'images/thor.jpg', 'videos/202201171642434376.mp4', '2022-01-17 13:58:33', 0),
(4, 'SU34', 'Rambo', 'john', 'The Blacklist is an American crime thriller television series that premiered on NBC on September 23, 2013. The show follows Raymond \"Red\" Reddington (James Spader), a former U.S. Navy officer turned high-profile criminal who voluntarily surrenders to the FBI after eluding capture for decades.', 'images/rambo.png', '', '2022-01-17 13:58:33', 0),
(5, 'TH34', 'Venom', 'ven', 'The Blacklist is an American crime thriller television series that premiered on NBC on September 23, 2013. The show follows Raymond \"Red\" Reddington (James Spader), a former U.S. Navy officer turned high-profile criminal who voluntarily surrenders to the FBI after eluding capture for decades.', 'images/venom.jpg', '', '2022-01-17 13:58:33', 0),
(6, 'PR34', 'Prison Break', 'mac', 'The Blacklist is an American crime thriller television series that premiered on NBC on September 23, 2013. The show follows Raymond \"Red\" Reddington (James Spader), a former U.S. Navy officer turned high-profile criminal who voluntarily surrenders to the FBI after eluding capture for decades.', 'images/prison_break.jpg', '', '2022-01-17 13:58:33', 0),
(7, 'EX34', 'External', 'lady', 'The Blacklist is an American crime thriller television series that premiered on NBC on September 23, 2013. The show follows Raymond \"Red\" Reddington (James Spader), a former U.S. Navy officer turned high-profile criminal who voluntarily surrenders to the FBI after eluding capture for decades.', 'images/eternal.jpg', '', '2022-01-17 13:58:33', 0),
(8, '56b8ce', 'The Blacklist  ', 'steve', 'The Blacklist is an American crime thriller television series that premiered on NBC on September 23, 2013. The show follows Raymond \"Red\" Reddington (James Spader), a former U.S. Navy officer turned high-profile criminal who voluntarily surrenders to the FBI after eluding capture for decades.', 'images/202201171642433936.jpg ', '', '2022-01-17 18:38:56', 1),
(10, '2ef698', 'The Blacklist  ', 'steve', 'The Blacklist is an American crime thriller television series that premiered on NBC on September 23, 2013. The show follows Raymond \"Red\" Reddington (James Spader), a former U.S. Navy officer turned high-profile criminal who voluntarily surrenders to the FBI after eluding capture for decades.', 'images/202201221642874693.jpg ', 'videos/202201221642874693.mp4', '2022-01-22 21:04:53', 1),
(11, '65ad96', 'The Blacklist  ', 'steve', 'The Blacklist is an American crime thriller television series that premiered on NBC on September 23, 2013. The show follows Raymond \"Red\" Reddington (James Spader), a former U.S. Navy officer turned high-profile criminal who voluntarily surrenders to the FBI after eluding capture for decades.', 'images/202201221642875601.jpg ', 'videos/202201221642875601.mp4', '2022-01-22 21:20:01', 1),
(12, '2407f1', 'Fast and furious         ', 'stevooo', 'steve', 'images/202202081644311053.png', 'videos/202202081644314862.mp4', '2022-02-01 00:02:15', 0);

-- --------------------------------------------------------

--
-- Table structure for table `movie_info`
--

CREATE TABLE `movie_info` (
  `id` int(11) NOT NULL,
  `uniqid` varchar(250) NOT NULL,
  `userid` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `serial` varchar(25) NOT NULL,
  `seats` text NOT NULL,
  `dateadded` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf32;

--
-- Dumping data for table `movie_info`
--

INSERT INTO `movie_info` (`id`, `uniqid`, `userid`, `payment_status`, `serial`, `seats`, `dateadded`) VALUES
(27, 'eb93e3', 16, 1, '0', '', '2022-01-22 22:00:17'),
(28, '4ef46c', 16, 1, '22f423', '', '2022-01-23 23:05:45'),
(29, 'e065c9', 16, 2, '94b963', '', '2022-01-30 12:38:07'),
(30, 'e065c9', 16, 2, '1b57dd', '', '2022-01-30 12:48:25'),
(31, 'ef8068', 16, 2, '0f28cb', '', '2022-01-30 13:47:45'),
(33, 'ef8068', 4, 65, '78842d', '', '2022-01-31 19:47:26'),
(34, 'acf4c0', 4, 2, '88b462', '', '2022-01-31 21:28:38'),
(35, '9bc241', 4, 2, '217ca1', '', '2022-02-08 08:41:26'),
(38, '9bc241', 4, 3, '1abda4', 'a:3:{i:0;s:2:\"34\";i:1;s:2:\"32\";i:2;s:2:\"29\";}', '2022-02-08 10:29:53'),
(37, '9bc241', 4, 4, 'a8e76b', '', '2022-02-08 10:03:22'),
(39, '9bc241', 4, 5, '508343', 'a:5:{i:0;s:2:\"10\";i:1;s:1:\"9\";i:2;s:1:\"8\";i:3;s:1:\"7\";i:4;s:1:\"6\";}', '2022-02-08 10:36:55'),
(40, '9bc241', 4, 4, '8ab664', 'a:4:{i:0;s:2:\"60\";i:1;s:2:\"59\";i:2;s:2:\"58\";i:3;s:2:\"63\";}', '2022-02-08 10:38:27'),
(41, '9bc241', 4, 4, '687a21', 'a:4:{i:0;s:2:\"20\";i:1;s:2:\"41\";i:2;s:2:\"61\";i:3;s:2:\"67\";}', '2022-02-08 10:40:17'),
(42, 'bafcee', 16, 5, '72573f', 'a:5:{i:0;s:2:\"41\";i:1;s:2:\"56\";i:2;s:1:\"1\";i:3;s:1:\"2\";i:4;s:1:\"5\";}', '2022-02-08 15:40:54');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `mid` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `Un_id` varchar(250) NOT NULL,
  `datetime` datetime NOT NULL,
  `datetime_out` datetime NOT NULL,
  `seats` int(11) NOT NULL,
  `hallid` int(11) NOT NULL,
  `dateadded` datetime NOT NULL DEFAULT current_timestamp(),
  `price` int(11) NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`mid`, `id`, `Un_id`, `datetime`, `datetime_out`, `seats`, `hallid`, `dateadded`, `price`, `deleted`) VALUES
(1, 19, 'eb93e3', '2022-01-22 19:09:00', '2022-01-22 22:09:00', 63, 1, '2022-01-22 19:10:02', 300, 0),
(1, 20, '4ef46c', '2022-01-23 21:41:00', '2022-01-23 14:41:00', 63, 1, '2022-01-23 21:42:18', 3500, 0),
(1, 21, '37bea0', '2010-01-26 21:37:00', '2010-01-26 14:37:00', 67, 1, '2010-01-26 21:37:56', 400, 0),
(10, 22, '1a0b17', '2010-01-26 21:39:00', '2010-01-26 13:39:00', 70, 4, '2010-01-26 21:39:35', 600, 0),
(4, 23, 'e065c9', '2022-01-30 22:15:00', '2022-01-30 13:15:00', 18, 6, '2022-01-29 22:15:28', 500, 0),
(1, 24, 'ef8068', '2022-01-31 13:44:00', '2022-01-31 17:44:00', 0, 1, '2022-01-30 13:44:54', 600, 0),
(5, 25, 'acf4c0', '2022-02-01 21:24:00', '2022-02-01 13:24:00', 41, 5, '2022-01-31 21:24:42', 400, 0),
(1, 26, '9bc241', '2022-02-23 10:33:00', '2022-02-02 01:33:00', 67, 1, '2022-02-02 10:33:20', 500, 0),
(12, 27, 'bafcee', '2022-02-08 15:33:00', '2022-02-08 15:33:00', 56, 7, '2022-02-08 15:33:47', 300, 0),
(1, 28, '370a71', '2022-02-23 10:34:00', '2022-02-23 02:34:00', 70, 8, '2022-02-09 10:35:05', 500, 0);

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `id` int(11) NOT NULL,
  `uniqid` varchar(50) NOT NULL,
  `number` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`id`, `uniqid`, `number`) VALUES
(53, '2', 'a:5:{i:0;s:2:\"65\";i:1;s:2:\"60\";i:2;s:2:\"11\";i:3;s:2:\"17\";i:4;s:2:\"44\";}'),
(54, '2', 'a:4:{i:0;s:2:\"36\";i:1;s:2:\"55\";i:2;s:2:\"29\";i:3;s:2:\"50\";}'),
(55, '2', 'a:4:{i:0;s:3:\"100\";i:1;s:1:\"7\";i:2;s:1:\"4\";i:3;s:2:\"95\";}'),
(56, '2', 'a:21:{i:0;s:2:\"23\";i:1;s:2:\"22\";i:2;s:2:\"21\";i:3;s:2:\"20\";i:4;s:2:\"19\";i:5;s:2:\"18\";i:6;s:2:\"16\";i:7;s:2:\"15\";i:8;s:2:\"14\";i:9;s:2:\"13\";i:10;s:2:\"12\";i:11;s:2:\"10\";i:12;s:1:\"9\";i:13;s:1:\"8\";i:14;s:1:\"6\";i:15;s:1:\"5\";i:16;s:1:\"3\";i:17;s:1:\"2\";i:18;s:1:\"1\";i:19;s:2:\"81\";i:20;s:2:\"79\";}'),
(57, '2', 'a:4:{i:0;s:2:\"33\";i:1;s:2:\"32\";i:2;s:2:\"61\";i:3;s:2:\"67\";}'),
(58, '2', 'a:2:{i:0;s:2:\"38\";i:1;s:2:\"52\";}');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `Name`, `value`) VALUES
(2, 'secretKey', 'sk_test_51KKNH8LTMjTVSXPx1qTYKxBx9vje0tV7en4oO4uhknaV1vu7sM6RPFpU8BIFxUq4OK0JsF0j4d48ZaciI0Vs3X4q00zCwbQHou'),
(3, 'publishableKey', 'pk_test_51KKNH8LTMjTVSXPxogruLpAH7xe8RJxbwQhTBqLtyrSu33Dv1vEnqvPPBMIK8hSgVSswBrQ6IHgdAzakUUXixRYd009Kgb5Nu9');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(250) NOT NULL,
  `type` int(11) NOT NULL COMMENT '0=admin,1=user',
  `password` text NOT NULL,
  `dateadded` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `phone`, `address`, `type`, `password`, `dateadded`, `deleted`) VALUES
(1, 'steveKe', 'admin@admin.com', '011336364', '1040', 0, 'a0c21dbc0d00bc2d661047ee4dcb0701', '2022-01-17 19:07:26', 0),
(3, 'Stephen Mutio', 'jsmithc@sample.com', '0701336364', '90116', 1, '0192023a7bbd73250516f069df18b500', '2022-01-15 09:16:08', 0),
(4, 'kinyanjui', 'kinyanjui@gmail.com', '0701336364', '90000', 1, 'a0c21dbc0d00bc2d661047ee4dcb0701', '2022-01-15 09:16:29', 0),
(5, 'kk', 'kjkkb@gmail.com', '', '', 1, 'a0c21dbc0d00bc2d661047ee4dcb0701', '2022-01-15 09:16:50', 0),
(6, 'mwilliams', 'mwilliams@sample.com', '', '', 1, '0192023a7bbd73250516f069df18b500', '2022-01-15 09:17:31', 0),
(7, 'steve', 'stevemutioo123@gmail.com', '', '', 1, 'a0c21dbc0d00bc2d661047ee4dcb0701', '2022-01-15 09:17:51', 0),
(8, 'mki', 'mki@gmail.com', '', '', 1, 'a0c21dbc0d00bc2d661047ee4dcb0701', '2022-01-16 22:55:23', 0),
(10, 'Enum-softsolutions', 'enum@gmail.com', '', '', 1, '81dc9bdb52d04dc20036dbd8313ed055', '2022-01-17 16:31:51', 0),
(11, 'Jarum', 'jarum@gmail.com', '0701336364', '90115', 1, '81dc9bdb52d04dc20036dbd8313ed055', '2022-01-19 11:07:28', 0),
(15, 'james', 'james@gmail,com', '0701336364', '90115', 1, '81dc9bdb52d04dc20036dbd8313ed055', '2022-01-19 13:13:28', 0),
(16, 'Kipletingz', 'Kipleting@gmail.com', '0701336363', '90119', 1, 'a0c21dbc0d00bc2d661047ee4dcb0701', '2022-01-20 23:43:34', 0),
(38, 'Stephen Mutio', 'steve@gmail.com', '0701336364', '90115', 1, '81dc9bdb52d04dc20036dbd8313ed055', '2022-01-22 01:39:18', 0),
(50, 'Kenyake', 'kenya@gmail.com', '0701336364', '90008', 1, '81dc9bdb52d04dc20036dbd8313ed055', '2022-01-22 09:31:35', 0),
(57, 'Kinyanjui James', 'kinyanjui123@gmail.com', '0701336364', '90115', 1, '81dc9bdb52d04dc20036dbd8313ed055', '2022-01-22 19:30:19', 0),
(59, 'Stephen Mutio', 'james@gmail.com', '0701336364', '90115', 1, '81dc9bdb52d04dc20036dbd8313ed055', '2022-01-22 21:46:29', 0),
(60, 'Stephen Mutio', 'moses@gmail.com', '0701336364', '90115', 1, '81dc9bdb52d04dc20036dbd8313ed055', '2022-01-22 21:46:58', 0),
(62, 'KenyaKenya', 'Kenya@co.com', '0720000000', '1030', 1, '81dc9bdb52d04dc20036dbd8313ed055', '2010-01-27 17:08:47', 0),
(63, 'kilonzo', 'kilonzo@gmail.com', '0701336364', '90115', 1, 'a0c21dbc0d00bc2d661047ee4dcb0701', '2022-01-31 18:09:27', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hall`
--
ALTER TABLE `hall`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `muid` (`muid`);

--
-- Indexes for table `movie_info`
--
ALTER TABLE `movie_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hall`
--
ALTER TABLE `hall`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `movie_info`
--
ALTER TABLE `movie_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `seats`
--
ALTER TABLE `seats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
