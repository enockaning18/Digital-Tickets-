-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 14, 2024 at 07:37 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendee`
--

CREATE TABLE `attendee` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `birthdate` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendee`
--

INSERT INTO `attendee` (`id`, `name`, `username`, `email`, `password`, `birthdate`, `phone`, `image`) VALUES
(1, 'Frank Osei', 'asadsdad', 'frankagyei2@gmail.com', 'OPassw34', '2024-12-12', '0556061647', '67519e9fba23d4.55788977.png'),
(2, 'Frank Osei', 'asadsdad', 'frankagyei2@gmail.com', 'OPassw34', '2024-12-12', '0556061647', '6751bd9e062926.88690070.png'),
(3, 'Frank Osei', 'asadsdad', 'frankagyei2@gmail.com', 'OPassw34', '2024-12-12', '0556061647', '6751be0dccb0d4.44538333.png'),
(4, 'Frank Osei', 'asadsdad', 'frankagyei2@gmail.com', 'OPassw34', '2024-12-06', '0556061647', '6751c0410b1d58.66671073.jpg'),
(5, 'Frank Osei', 'asadsdad', 'frankagyei2@gmail.com', 'OPassw34', '2024-12-06', '0556061647', '6751c04a4272d6.58282322.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `event_name` varchar(200) NOT NULL,
  `event_description` varchar(1000) NOT NULL,
  `event_category` varchar(200) NOT NULL,
  `image` varchar(200) DEFAULT NULL,
  `event_contact` varchar(15) NOT NULL,
  `event_email` varchar(200) NOT NULL,
  `event_date_time_start` varchar(200) NOT NULL,
  `event_date_time_end` varchar(200) NOT NULL,
  `event_mode` varchar(200) NOT NULL,
  `event_venue` varchar(200) NOT NULL,
  `ticket_name` varchar(200) NOT NULL,
  `ticket_price` varchar(200) NOT NULL,
  `ticket_type` varchar(200) NOT NULL,
  `ticket_quantity` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `event_name`, `event_description`, `event_category`, `image`, `event_contact`, `event_email`, `event_date_time_start`, `event_date_time_end`, `event_mode`, `event_venue`, `ticket_name`, `ticket_price`, `ticket_type`, `ticket_quantity`) VALUES
(3, 'Melbourne Cup', ' The Odartey Style and Fashion Awards (OSFAs) 2024 is the ultimate celebration of fashion excellence, creativity, and innovation in Ghana. This prestigious event is set to bring together the brightest stars of the fashion industry.\r\n\r\n\r\nHighlights of the Event:\r\nBlackcarpet: Witness the grand arrival of fashion icons, celebrities, and industry leaders in their most stunning ensembles at 6pm    ', 'Other', '6752af02341897.42076602.jpeg', '0556061723', 'melbournecup122@gmail.com', 'Sun 8 Dec 2024, 8:30 PM ', 'Sun 8 Dec 2024, 9:20 PM ', 'Virtual Event', 'Brunie Sports Complex', 'General Ticket ', '200', 'Payed', '100'),
(4, 'Halloween', ' The Odartey Style and Fashion Awards (OSFAs) 2024 is the ultimate celebration of fashion excellence, creativity, and innovation in Ghana. This prestigious event is set to bring together the brightest stars of the fashion industry. Highlights of the Event: Blackcarpet: Witness the grand arrival of fashion icons, celebrities, and industry leaders in their most stunning ensembles at 6pm   ', 'Other', '6753675822ffd5.94420123.png', '0556061723', 'melbournecup122@gmail.com', 'Wed 25 Dec 2024, 12:00 AM ', 'Thu 26 Dec 2024, 9:10 PM ', 'Physical Event', 'Basement Bar and Loudge', 'VIP TICKET', '500', 'Payed', '10'),
(5, 'The Car Washhhhh', ' The Odartey Style and Fashion Awards (OSFAs) 2024 is the ultimate celebration of fashion excellence, creativity, and innovation in Ghana. This prestigious event is set to bring together the brightest stars of the fashion industry. Highlights of the Event: Blackcarpet: Witness the grand arrival of fashion icons, celebrities, and industry leaders in their most stunning ensembles at 6pm                                    ', 'Other', '67541c00f3a9d8.85765142.png', '0554944071', 'susorosemaryasd@gmail.com', 'Tue 10 Dec 2024, 8:30 PM ', 'Wed 18 Dec 2024, 8:30 PM ', 'Physical Event', 'Brunie Sports Complex', 'VIP TICKET', '300', 'Payed', '100');

-- --------------------------------------------------------

--
-- Table structure for table `event_copy`
--

CREATE TABLE `event_copy` (
  `id` int(11) NOT NULL,
  `event_name` varchar(200) DEFAULT NULL,
  `event_description` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_copy`
--

INSERT INTO `event_copy` (`id`, `event_name`, `event_description`) VALUES
(1, 'Car Wash ', ' aaa'),
(2, 'Car Show', ' All cars'),
(3, 'Car Show', 'dad '),
(4, 'Car Wash ', ' ssdsas'),
(5, 'Car Wash ', ' ssdsas'),
(6, 'Car Wash ', ' hj'),
(7, 'Car Wash ', 'awdwad '),
(8, 'Car Wash ', 'wqw '),
(9, 'Car Wash ', ' sads');

-- --------------------------------------------------------

--
-- Table structure for table `organizer`
--

CREATE TABLE `organizer` (
  `organizer_id` int(11) NOT NULL,
  `organizer_phone` varchar(200) NOT NULL,
  `organizer_name` varchar(200) NOT NULL,
  `organizer_email` varchar(200) NOT NULL,
  `organizer_password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `organizer`
--

INSERT INTO `organizer` (`organizer_id`, `organizer_phone`, `organizer_name`, `organizer_email`, `organizer_password`) VALUES
(1, '0556061647', 'Okyere', 'okyere@gmail.com', '$2y$10$5FKlk5tYM0FyEj6fUQrEF.HRzpE4IxyqpLfy2OvzrXVdF64PUA.a.'),
(2, '0556061647', 'Okyere', 'okyere@gmail.com', '$2y$10$P5aishoAQ33AoWGLh8uAz.YeulD7uV0pOdTzkIXMXBPuS.z4MUMTG'),
(3, '121', 'adawd', 'enock@gmail.com', '$2y$10$XPl/h5Ow.nBTI2a4a.t39ei8FBQ41gkawqoBAw7JKCDIlMn2fyXjS'),
(4, '', '', '', '$2y$10$giaGhKFUOAxp6tdMMZtbuOzME8dK5hwCEeDIQ6UPVkfro06e7BO6u');

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

CREATE TABLE `venue` (
  `id` int(11) NOT NULL,
  `venue_name` varchar(200) NOT NULL,
  `venue_address` varchar(200) NOT NULL,
  `latitude` varchar(200) NOT NULL,
  `longitude` varchar(200) NOT NULL,
  `venue_city` varchar(200) NOT NULL,
  `venue_region` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `venue`
--

INSERT INTO `venue` (`id`, `venue_name`, `venue_address`, `latitude`, `longitude`, `venue_city`, `venue_region`) VALUES
(1, 'Brunie Sports Complex', '6.6893623422429, 1.644285145655187', '6.689697255865689 ', '-1.6448422741386837', 'Kumasi', 'Ashanti Region');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendee`
--
ALTER TABLE `attendee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_copy`
--
ALTER TABLE `event_copy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organizer`
--
ALTER TABLE `organizer`
  ADD PRIMARY KEY (`organizer_id`);

--
-- Indexes for table `venue`
--
ALTER TABLE `venue`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendee`
--
ALTER TABLE `attendee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `event_copy`
--
ALTER TABLE `event_copy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `organizer`
--
ALTER TABLE `organizer`
  MODIFY `organizer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `venue`
--
ALTER TABLE `venue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
