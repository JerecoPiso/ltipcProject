-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 03, 2020 at 01:49 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `LTIPC`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hint` varchar(150) NOT NULL,
  `photo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`, `hint`, `photo`) VALUES
(30, 'Jereco James Piso', '$2y$10$JYR8Sx65VFQ4xlK/c07RkeKBcznKSz3.fLq9pqtx9aRdFKpZePKIK', 'sad', 'dp.jpg'),
(31, 'jjjjjjjj', '$2y$10$A0TeQlzUBVBz8DzRCtjgBe3hL.JgCFIsurZ1hpGNEDhm31OkThG7W', 'jj', 'Screenshot_from_2019-11-11_12-32-11.png');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `name`) VALUES
(26, '1st District'),
(27, '2nd District'),
(28, '3rd Disrtrict'),
(29, '4th District'),
(30, '5th District');

-- --------------------------------------------------------

--
-- Table structure for table `establishment`
--

CREATE TABLE `establishment` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(200) NOT NULL,
  `rates` varchar(200) NOT NULL,
  `contact` int(20) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `establishment`
--

INSERT INTO `establishment` (`id`, `name`, `location`, `rates`, `contact`, `photo`) VALUES
(29, 'b', 'b', 'b', 6, 'manok1.jpg'),
(30, 'Summit Hotel', 'Marasbaras Tacloban City', '456456', 456, 'sign_up17.png'),
(31, 'ewrwer', 'werwer', '645', 656457, 'manok2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `municipality`
--

CREATE TABLE `municipality` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `district_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `municipality`
--

INSERT INTO `municipality` (`id`, `name`, `district_id`) VALUES
(28, 'Tacloban City', '26'),
(30, 'Sta.Fe', '26'),
(32, 'Palo', '26'),
(33, 'Babatngon', '26'),
(34, 'San Miguel', '26'),
(35, 'Tanuan', '26'),
(36, 'Tolosa', '26'),
(37, 'Barugo', '27'),
(38, 'Burauen', '27'),
(39, 'Capoocan', '27'),
(40, 'Carigara', '27'),
(41, 'Dagami', '27'),
(42, 'Dulag', '27'),
(43, 'Jaro', '27'),
(44, 'Julita', '27'),
(45, 'La Paz', '27'),
(46, 'MacArthur', '27'),
(47, 'Mayorga', '27'),
(48, 'Pastrana', '27'),
(49, 'Tabon Tabon', '27'),
(50, 'Tunga', '27'),
(51, 'Calubian', '28'),
(52, 'Leyte', '28'),
(53, 'San Isidro', '28'),
(54, 'Tabango', '28'),
(55, 'Villaba', '27'),
(56, 'Albuera', '29'),
(57, 'Isabel', '29'),
(58, 'Kananga', '29'),
(59, 'Matag-Ob', '29'),
(60, 'Merida', '29'),
(61, 'Palompon', '29'),
(62, 'Abuyog', '30'),
(63, 'Bato', '30'),
(64, 'Hilongos', '30'),
(65, 'Hindang', '30'),
(66, 'Inopacan', '30'),
(67, 'Javier', '30'),
(68, 'Mahaplag', '30'),
(69, 'Matalom', '30'),
(70, 'Ormoc City', '29'),
(71, 'Maasin City', '26'),
(72, 'Liloan', '27');

-- --------------------------------------------------------

--
-- Table structure for table `spots`
--

CREATE TABLE `spots` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `municipality` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spots`
--

INSERT INTO `spots` (`id`, `name`, `municipality`, `district`, `category`, `photo`) VALUES
(92, 'San Juanico Bridge', 'Tacloban City', '1st District', 'Cruise Tourism', 'san.jpeg'),
(93, 'McArthur Park', 'Palo', '1st District', 'Historical', 'mc2.jpeg'),
(104, 'Kalanggaman Island', 'Palompon ', ' 4th District ', 'Sun and Beach', 'kalang2.jpeg'),
(113, 'Lake Danao', 'Ormoc City ', ' 4th District ', 'Adventure', 'lake_danao.jpeg'),
(114, 'Hindang Cave', 'Hindang ', ' 5th District ', 'Adventure', 'hindang.jpg'),
(115, 'Santo Nino Shrine', 'Tacloban City ', ' 1st District ', 'Religion', 'sto_nino.jpeg'),
(116, 'Alto Peak', 'Ormoc City ', ' 4th District ', 'Adventure', 'alto_peak.jpeg'),
(117, 'Masaba Falls', 'Palompon ', ' 4th District ', 'Cruise Tourism', 'masaba.jpeg'),
(118, 'Monte Cueva Cave', 'Maasin City ', ' 1st District ', 'Cultural', 'monte_cueva.jpg'),
(119, 'Our Lady of the Assumption Shrine', 'Maasin City ', ' 1st District ', 'Religion', 'ou_lady.jpeg'),
(120, 'Molopolo White Beach', 'Liloan ', ' 2nd District ', 'Sun and Beach', 'molopolo.jpeg'),
(121, 'Tagbak Marine Park', 'Liloan ', ' 2nd District ', 'Cruise Tourism', 'tagbak.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `spot_category`
--

CREATE TABLE `spot_category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spot_category`
--

INSERT INTO `spot_category` (`id`, `name`) VALUES
(11, 'Religion'),
(12, 'Sun and Beach'),
(13, 'Historical'),
(14, 'Cruise Tourism'),
(15, ' Cultural'),
(16, 'Adventure');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `establishment`
--
ALTER TABLE `establishment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `municipality`
--
ALTER TABLE `municipality`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spots`
--
ALTER TABLE `spots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spot_category`
--
ALTER TABLE `spot_category`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `establishment`
--
ALTER TABLE `establishment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `municipality`
--
ALTER TABLE `municipality`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `spots`
--
ALTER TABLE `spots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `spot_category`
--
ALTER TABLE `spot_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
