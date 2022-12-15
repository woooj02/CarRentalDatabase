-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2021 at 08:47 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `harris_kafley_car_rentals`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `Model` char(20) DEFAULT NULL,
  `Make` char(20) DEFAULT NULL,
  `YearofMake` int(4) DEFAULT NULL,
  `Color` char(20) DEFAULT NULL,
  `Num_Seats` int(1) DEFAULT NULL,
  `Has_AWD` char(1) DEFAULT NULL,
  `Has_Truck_Bed` char(1) DEFAULT NULL,
  `Is_Avalible` char(1) DEFAULT NULL,
  `Vehicle_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`Model`, `Make`, `YearofMake`, `Color`, `Num_Seats`, `Has_AWD`, `Has_Truck_Bed`, `Is_Avalible`, `Vehicle_ID`) VALUES
('Rav4', 'Toyota', 2019, 'yellow', 5, 'Y', 'N', 'Y', 1),
('CR-V', 'Honda', 2018, 'black', 5, 'Y', 'N', 'Y', 2),
('Model', 'Make', 0, 'Color', 0, 'Y', 'Y', 'Y', 7),
('Model', 'Make', 0, 'Color', 0, 'N', 'Y', 'N', 8),
('X-3', 'BMW', 2016, 'green', 5, 'N', 'N', 'Y', 9),
('Cr-V', 'Honda', 2018, 'black', 5, 'Y', 'N', 'N', 10),
('Pilot', 'Honda', 2017, 'blue', 8, 'Y', 'N', 'Y', 11),
('Sienna', 'Toyota', 2014, 'grey', 7, 'N', 'Y', 'N', 12),
('Tacoma', 'Toyota', 2014, 'black', 5, 'Y', 'Y', 'Y', 13),
('X-6', 'BMW', 2013, 'black', 8, 'Y', 'N', 'Y', 14),
('Urus', 'Lamborgini', 2013, 'red', 5, 'Y', 'N', 'Y', 15),
('Maybach', 'Mercedes', 2015, 'blue', 2, 'Y', 'N', 'N', 16),
('Express', 'Chevrolet', 2018, 'black', 10, 'Y', 'Y', 'N', 17),
('Equinox', 'Chevrolet', 2018, 'red', 5, 'Y', 'Y', 'Y', 18),
('Dyna', 'Toyota', 2013, 'grey', 10, 'Y', 'N', 'Y', 19),
('Yukon', 'GMC', 2011, 'orange', 8, 'Y', 'N', 'Y', 20),
('A4', 'Audi', 2015, 'white', 2, 'N', 'N', 'N', 21),
('R8', 'Audi', 2018, 'yellow', 5, 'N', 'N', 'N', 22),
('A3', 'Audi', 2019, 'green', 5, 'Y', 'N', 'N', 23),
('Charger', 'Dodge', 2019, 'white', 4, 'N', 'N', 'Y', 24),
('Challenger', 'Dodge', 2017, 'blue', 2, 'N', 'N', 'N', 25),
('MDX', 'Acura', 2016, 'black', 3, 'N', 'N', 'Y', 26),
('ILX', 'Acura', 2015, 'red', 5, 'Y', 'N', 'N', 27),
('TLX', 'Aura', 2015, 'red', 5, 'Y', 'N', 'N', 28),
('rogue', 'nissan', 2018, 'grey', 5, 'Y', 'N', 'Y', 29);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `LastName` char(20) DEFAULT NULL,
  `FirstInt` char(1) DEFAULT NULL,
  `PhoneNum` int(11) DEFAULT NULL,
  `Id_Num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`LastName`, `FirstInt`, `PhoneNum`, `Id_Num`) VALUES
('Kafley', 'A', 2147483647, 1),
('John', 'J', 291839412, 42082),
('Harris', 'I', 7200000, 42083),
('Kafley', 'A', 3031231, 42084),
('Michael', 'W', 842917284, 42085),
('Richard', 'J', 942930538, 42086),
('Thomas', 'T', 215849510, 42087),
('Chris', 'H', 593203530, 42088),
('Javi', 'G', 431946489, 42089),
('Redford', 'M', 942945459, 42090),
('Dzouza', 'K', 132404249, 42091),
('Lara', 'B', 313523974, 42092),
('Spacey', 'K', 213412981, 42093),
('Oliery', 'B', 123124323, 42094),
('Hensworth', 'C', 124428573, 42095),
('Evans', 'C', 853432482, 42096),
('Khan', 'S', 234785398, 42097),
('Mohammad', 'Y', 234132847, 42098),
('Garcia', 'R', 544358523, 42099),
('Donald', 'N', 541395830, 42100),
('Sobers', 'G', 234354909, 42101),
('Harris', 'K', 720044328, 42102);

-- --------------------------------------------------------

--
-- Table structure for table `rental_rate`
--

CREATE TABLE `rental_rate` (
  `Daily_Rate` int(11) NOT NULL,
  `Weekly_Rate` int(11) NOT NULL,
  `Is_Daily` char(1) NOT NULL,
  `Is_Weekly` char(1) NOT NULL,
  `rate_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rental_rate`
--

INSERT INTO `rental_rate` (`Daily_Rate`, `Weekly_Rate`, `Is_Daily`, `Is_Weekly`, `rate_ID`) VALUES
(250, 70, 'Y', 'N', 1),
(300, 180, 'N', 'Y', 2);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `Due_Date` date NOT NULL,
  `Start_Date` date NOT NULL,
  `Trans_Start` date NOT NULL DEFAULT current_timestamp(),
  `Return_Date` date DEFAULT NULL,
  `Total_Rental_Cost` float DEFAULT NULL,
  `Vehicle_ID` int(11) DEFAULT NULL,
  `Id_Num` int(11) DEFAULT NULL,
  `RentalLen` int(11) DEFAULT NULL,
  `Is_Returned` char(2) DEFAULT NULL,
  `Tran_ID` int(11) NOT NULL,
  `rate_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`Due_Date`, `Start_Date`, `Trans_Start`, `Return_Date`, `Total_Rental_Cost`, `Vehicle_ID`, `Id_Num`, `RentalLen`, `Is_Returned`, `Tran_ID`, `rate_ID`) VALUES
('2021-04-06', '2021-03-05', '2021-04-30', '2021-04-04', 25250, 2, 1, 101, 'Y', 1, 1),
('2021-05-08', '2021-05-02', '2021-05-10', '2021-05-04', 20, 2, 1, 2, 'Y', 10, 1),
('2021-05-08', '2021-05-02', '2021-05-02', '2021-05-22', 120, 1, 1, 20, NULL, 11, 2),
('2021-05-06', '2021-05-04', '2021-05-06', '2021-05-06', 51.4286, 1, 1, 2, 'Y', 13, 2),
('2021-05-06', '2021-05-01', '2021-05-06', '2021-05-06', 128.571, 11, 42082, 5, 'Y', 14, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`Vehicle_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Id_Num`);

--
-- Indexes for table `rental_rate`
--
ALTER TABLE `rental_rate`
  ADD PRIMARY KEY (`rate_ID`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`Tran_ID`),
  ADD KEY `FK_RateID` (`rate_ID`),
  ADD KEY `FK_VehicleID` (`Vehicle_ID`),
  ADD KEY `FK_Person_ID` (`Id_Num`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `Vehicle_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Id_Num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42103;

--
-- AUTO_INCREMENT for table `rental_rate`
--
ALTER TABLE `rental_rate`
  MODIFY `rate_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `Tran_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `FK_Person_ID` FOREIGN KEY (`Id_Num`) REFERENCES `customer` (`Id_Num`),
  ADD CONSTRAINT `FK_RateID` FOREIGN KEY (`rate_ID`) REFERENCES `rental_rate` (`rate_ID`),
  ADD CONSTRAINT `FK_VehicleID` FOREIGN KEY (`Vehicle_ID`) REFERENCES `cars` (`Vehicle_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
