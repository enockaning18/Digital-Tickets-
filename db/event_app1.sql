-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 09, 2025 at 09:58 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event_app1`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendee`
--

CREATE TABLE `attendee` (
  `id` int(11) NOT NULL,
  `attendee_name` varchar(200) NOT NULL,
  `attendee_username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `attendee_phone` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendee`
--

INSERT INTO `attendee` (`id`, `attendee_name`, `attendee_username`, `email`, `password`, `attendee_phone`, `created_at`) VALUES
(2769698, 'GUEST-hbJgtQ', 'GUEST-hbJgtQ', 'hbJgtQ@guest.teamevent.com', '', '', '2025-02-01 02:12:08'),
(3524254, 'GUEST-EtdvMC', 'GUEST-EtdvMC', 'EtdvMC@guest.teamevent.com', '', '', '2025-02-01 00:17:15'),
(4052394, 'GUEST-vj47xr', 'GUEST-vj47xr', 'vj47xr@guest.teamevent.com', '', '', '2025-02-07 12:09:49'),
(5747141, 'Okyere', '', 'okyere@mail.com', 'admin123', '0556061647', '2025-02-01 10:56:30'),
(5836762, 'GUEST-eh3kkX', 'GUEST-eh3kkX', 'eh3kkX@guest.teamevent.com', '', '', '2025-02-01 00:46:15'),
(6320001, 'GUEST-6pcBpW', 'GUEST-6pcBpW', '6pcBpW@guest.teamevent.com', '', '', '2025-01-31 09:45:02'),
(7082582, 'GUEST-T1r2BE', 'GUEST-T1r2BE', 'T1r2BE@guest.teamevent.com', '', '', '2025-02-01 02:01:20');

-- --------------------------------------------------------

--
-- Table structure for table `attendee_orders`
--

CREATE TABLE `attendee_orders` (
  `order_id` int(11) NOT NULL,
  `bar_code` varchar(255) NOT NULL,
  `reference` varchar(20) DEFAULT NULL,
  `ticket_id` int(11) NOT NULL,
  `ticket_name` varchar(500) NOT NULL,
  `unit_price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount_payed` float NOT NULL,
  `attendee_id` int(11) NOT NULL,
  `payment_mode` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendee_orders`
--

INSERT INTO `attendee_orders` (`order_id`, `bar_code`, `reference`, `ticket_id`, `ticket_name`, `unit_price`, `quantity`, `amount_payed`, `attendee_id`, `payment_mode`, `created_at`) VALUES
(104, '2959', 'T836743754664326', 7502939, 'General Tikcet ', 100, 1, 100, 5747141, 'Paystack', '2025-02-09 03:17:13'),
(105, '2023', 'T680471218358659', 7502939, 'General Tikcet ', 100, 1, 100, 5747141, 'Paystack', '2025-02-09 03:22:10'),
(106, '2462', 'T687097040325838', 7502939, 'General Tikcet ', 100, 1, 100, 5747141, 'Paystack', '2025-02-09 09:50:50'),
(107, '9608', 'T437994202105560', 7502939, 'General Tikcet ', 100, 1, 100, 5747141, 'Paystack', '2025-02-09 09:57:22'),
(108, '3998', 'T343321781406394', 7502939, 'General Tikcet ', 100, 1, 100, 5747141, 'Paystack', '2025-02-09 09:58:05'),
(109, '8489', NULL, 7502939, 'General Tikcet ', 100, 1, 100, 5747141, 'Paystack', '2025-02-09 10:09:51'),
(110, '6137', 'T881123923376830', 7502939, 'General Tikcet ', 100, 1, 100, 5747141, 'Paystack', '2025-02-09 10:11:42'),
(111, '7670', 'T636782746676260', 7502939, 'General Tikcet ', 100, 1, 100, 5747141, 'Paystack', '2025-02-09 10:15:20'),
(112, '4036', 'T907018764748851', 7502939, 'General Tikcet ', 100, 1, 100, 5747141, 'Paystack', '2025-02-09 10:16:45'),
(113, '8701', 'T301019069959173', 7502939, 'General Tikcet ', 100, 1, 100, 5747141, 'Paystack', '2025-02-09 10:17:47'),
(114, '7712', 'T930004017449313', 7502939, 'General Tikcet ', 100, 1, 100, 5747141, 'Paystack', '2025-02-09 10:18:41'),
(115, '3715', 'T306930800373272', 7502939, 'General Tikcet ', 100, 1, 100, 5747141, 'Paystack', '2025-02-09 10:23:04'),
(116, '8734', 'T062102153732705', 7502939, 'General Tikcet ', 100, 1, 100, 5747141, 'Paystack', '2025-02-09 10:23:56'),
(117, '4012', 'T875789625214078', 7502939, 'General Tikcet ', 100, 1, 100, 5747141, 'Paystack', '2025-02-09 10:26:13'),
(118, '2754', 'T566256030165079', 7502939, 'General Tikcet ', 100, 1, 100, 5747141, 'Paystack', '2025-02-09 10:47:35'),
(119, '9055', 'T418325913920334', 7502939, 'General Tikcet ', 100, 1, 100, 5747141, 'Paystack', '2025-02-09 10:52:09'),
(120, '1221', 'T365004658863234', 7502939, 'General Tikcet ', 100, 1, 100, 5747141, 'Paystack', '2025-02-09 10:58:53'),
(121, '5125', 'T241122026849918', 7502939, 'General Tikcet ', 100, 1, 100, 5747141, 'Paystack', '2025-02-09 11:03:08');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `event_reference_id` varchar(200) NOT NULL,
  `organizer_id` int(11) NOT NULL,
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
  `ticket_quantity` varchar(200) NOT NULL,
  `status` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `event_reference_id`, `organizer_id`, `event_name`, `event_description`, `event_category`, `image`, `event_contact`, `event_email`, `event_date_time_start`, `event_date_time_end`, `event_mode`, `event_venue`, `ticket_name`, `ticket_price`, `ticket_type`, `ticket_quantity`, `status`) VALUES
(2352284, '48a0588b31', 5736336, 'Revival ', 'The Odartey Style and Fashion Awards (OSFAs) 2024 is the ultimate celebration of fashion excellence, creativity, and innovation in Ghana. This prestigious event is set to bring together the brightest stars of the fashion industry. Highlights of the Event: Blackcarpet: Witness the grand arrival of fashion icons, celebrities, and industry leaders in their most stunning ensembles at 6pm ', 'Fashion / Beauty', '6792a6f128d398.64807532.jpeg', '0556061647', 'revivalconcert112@gmail.com', '15/01/2025', '2025-01-15', 'Physical Event', 'Brunie Sports Complex', 'General Ticket ', '200', 'Payed', '2', '1'),
(6196646, '79ddced9f9', 5736336, 'Halloween Concert ', 'Halloween ', 'Cinema / Theatre / Movies', '6792a77a76d384.28086527.png', '0244172839', 'halloweenconcert32@gmail.com', '01/02/2025', '2025-02-01', 'Physical Event', 'Brunie Sports Complex', 'Regular Ticket ', '120', 'Payed', '3', '1'),
(7502939, '6d54867b74', 5736336, 'Text Event ', 'Try Text Event For Software  ', 'Cinema / Theatre / Movies', '679a2bf9e2d847.54478742.jpg', '0556069231', 'tryevent12@mail.com', 'Thu 16 Jan 2025, 8:30 PM ', 'Wed 8 Jan 2025, 8:30 PM ', 'Physical Event', 'Brunie Sports Complex', 'General Tikcet ', '100', 'Payed', '24', '1');

-- --------------------------------------------------------

--
-- Table structure for table `guest_user`
--

CREATE TABLE `guest_user` (
  `id` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `guest_username` varchar(255) NOT NULL,
  `guest_name` varchar(255) DEFAULT NULL,
  `guest_phone` varchar(15) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `guest_hashed_password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guest_user`
--

INSERT INTO `guest_user` (`id`, `email`, `guest_username`, `guest_name`, `guest_phone`, `password`, `guest_hashed_password`, `created_at`) VALUES
('7387203', 'da9eiz@guest.teamevent.com', 'GUEST-da9eiz', '', '', '', NULL, '2025-01-16 17:37:19');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_google_attendee`
--

CREATE TABLE `oauth_google_attendee` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL DEFAULT '',
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `picture` varchar(255) NOT NULL DEFAULT '',
  `verifiedEmail` int(11) NOT NULL DEFAULT 0,
  `token` varchar(255) NOT NULL DEFAULT '',
  `crated_at` varchar(200) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `oauth_google_attendee`
--

INSERT INTO `oauth_google_attendee` (`id`, `email`, `first_name`, `last_name`, `full_name`, `picture`, `verifiedEmail`, `token`, `crated_at`) VALUES
(5010617, 'hackforlife100@gmail.com', 'Hack', 'Forlife', '', 'https://lh3.googleusercontent.com/a/ACg8ocK-0Qu5WpaIHCk1l1tdz7F7QnVt_q4zNOAXFHax85j3Ch6x7A=s96-c', 1, '107399315770831582439', '2025-02-01 00:43:05'),
(5867434, 'enockaning18@gmail.com', 'Mr.', 'Okyere', '', 'https://lh3.googleusercontent.com/a/ACg8ocIuzNv-wkg99nnORwwwAxNMQh2vvuDR1HNfVSVdax3fXv24uXtl=s96-c', 1, '103185969919858299907', '2025-01-10 00:14:44');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_google_users`
--

CREATE TABLE `oauth_google_users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL DEFAULT '',
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `organizer_name` varchar(100) NOT NULL,
  `picture` varchar(255) NOT NULL DEFAULT '',
  `verifiedEmail` int(11) NOT NULL DEFAULT 0,
  `token` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `oauth_google_users`
--

INSERT INTO `oauth_google_users` (`id`, `email`, `first_name`, `last_name`, `organizer_name`, `picture`, `verifiedEmail`, `token`) VALUES
(1015081, 'hackforlife100@gmail.com', 'Hack', 'Forlife', 'Hack Forlife', 'https://lh3.googleusercontent.com/a/ACg8ocK-0Qu5WpaIHCk1l1tdz7F7QnVt_q4zNOAXFHax85j3Ch6x7A=s96-c', 1, '107399315770831582439');

-- --------------------------------------------------------

--
-- Table structure for table `organizer`
--

CREATE TABLE `organizer` (
  `id` int(200) NOT NULL,
  `organizer_reference_id` varchar(200) NOT NULL,
  `organizer_phone` varchar(200) NOT NULL,
  `organizer_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `organizer`
--

INSERT INTO `organizer` (`id`, `organizer_reference_id`, `organizer_phone`, `organizer_name`, `email`, `password`) VALUES
(909193, '337b20f85f', '0244191826', 'KSS Studios ', 'kssstudios@gmail.com', '$2y$10$rxlzMItnxfMtZS/MATwAs.zfaYvzZCXdtGvVWf1uMPQwNmEN8qi.O'),
(5736336, '98c57bbdf3', '0247181822', 'Sandra Events', 'admin@mail.com', '$2y$10$rxlzMItnxfMtZS/MATwAs.zfaYvzZCXdtGvVWf1uMPQwNmEN8qi.O');

-- --------------------------------------------------------

--
-- Table structure for table `payment_info`
--

CREATE TABLE `payment_info` (
  `attendee_id` varchar(200) NOT NULL,
  `attendee_email` varchar(200) NOT NULL,
  `attendee_phone_number` varchar(200) NOT NULL,
  `payment_method` varchar(200) NOT NULL,
  `reference` varchar(20) DEFAULT NULL,
  `created_at` varchar(200) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_info`
--

INSERT INTO `payment_info` (`attendee_id`, `attendee_email`, `attendee_phone_number`, `payment_method`, `reference`, `created_at`) VALUES
('5747141', 'admin@mail.com', '0556062693', 'Paystack', NULL, '2025-02-07 23:44:15'),
('5747141', 'admin@mail.com', '0556062693', 'Paystack', NULL, '2025-02-07 23:52:35'),
('5747141', 'admin@mail.com', '0556062693', 'Paystack', NULL, '2025-02-07 23:55:39'),
('5747141', 'admin@mail.com', '0556062693', 'Paystack', NULL, '2025-02-08 00:12:08'),
('5747141', 'admin@mail.com', '0556062693', 'Paystack', NULL, '2025-02-08 07:33:09'),
('5747141', 'admin@mail.com', '0556062693', 'Paystack', NULL, '2025-02-08 09:04:35'),
('5747141', 'admin@mail.com', '0556062693', 'Paystack', NULL, '2025-02-08 15:26:45'),
('5747141', 'admin@mail.com', '0556062693', 'Paystack', NULL, '2025-02-09 02:10:54'),
('5747141', 'admin@mail.com', '0556062693', 'Paystack', NULL, '2025-02-09 02:53:22'),
('5747141', 'admin@mail.com', '0556062693', 'Paystack', NULL, '2025-02-09 03:02:57'),
('5747141', 'admin@mail.com', '0556062693', 'Paystack', NULL, '2025-02-09 03:12:13'),
('5747141', 'admin@mail.com', '0556062693', 'Paystack', NULL, '2025-02-09 03:17:13'),
('5747141', 'admin@mail.com', '0556062693', 'Paystack', NULL, '2025-02-09 03:22:10'),
('5747141', 'admin@mail.com', '0556062693', 'Paystack', NULL, '2025-02-09 09:50:50'),
('5747141', 'admin@mail.com', '0556062693', 'Paystack', NULL, '2025-02-09 09:57:22'),
('5747141', 'admin@mail.com', '0556062693', 'Paystack', NULL, '2025-02-09 09:58:05'),
('5747141', 'admin@mail.com', '0556062693', 'Paystack', NULL, '2025-02-09 10:09:51'),
('5747141', 'admin@mail.com', '0556062693', 'Paystack', NULL, '2025-02-09 10:11:42'),
('5747141', 'admin@mail.com', '0556062693', 'Paystack', NULL, '2025-02-09 10:15:20'),
('5747141', 'admin@mail.com', '0556062693', 'Paystack', NULL, '2025-02-09 10:16:45'),
('5747141', 'admin@mail.com', '0556062693', 'Paystack', NULL, '2025-02-09 10:17:47'),
('5747141', 'admin@mail.com', '0556062693', 'Paystack', NULL, '2025-02-09 10:18:41'),
('5747141', 'admin@mail.com', '0556062693', 'Paystack', NULL, '2025-02-09 10:23:04'),
('5747141', 'admin@mail.com', '0556062693', 'Paystack', NULL, '2025-02-09 10:23:56'),
('5747141', 'admin@mail.com', '0556062693', 'Paystack', NULL, '2025-02-09 10:26:13'),
('5747141', 'admin@mail.com', '0556062693', 'Paystack', NULL, '2025-02-09 10:47:24'),
('5747141', 'admin@mail.com', '0556062693', 'Paystack', NULL, '2025-02-09 10:47:35'),
('5747141', 'admin@mail.com', '0556062693', 'Paystack', NULL, '2025-02-09 10:52:09'),
('5747141', 'admin@mail.com', '0556062693', 'Paystack', NULL, '2025-02-09 10:58:53'),
('5747141', 'admin@mail.com', '0556062693', 'Paystack', NULL, '2025-02-09 11:03:08');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_payments`
--

CREATE TABLE `ticket_payments` (
  `reference` varchar(250) NOT NULL,
  `email` varchar(200) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `transaction_status` varchar(200) NOT NULL,
  `payment_date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticket_payments`
--

INSERT INTO `ticket_payments` (`reference`, `email`, `amount`, `transaction_status`, `payment_date`) VALUES
('T062102153732705', 'admin@mail.com', 100, 'success', '2025-02-09T10:24:02.000Z'),
('T241122026849918', 'admin@mail.com', 100, 'success', '2025-02-09T11:03:14.000Z'),
('T301019069959173', 'admin@mail.com', 100, 'success', '2025-02-09T10:17:57.000Z'),
('T306930800373272', 'admin@mail.com', 100, 'success', '2025-02-09T10:23:13.000Z'),
('T343321781406394', 'admin@mail.com', 100, 'success', '2025-02-09T09:58:11.000Z'),
('T365004658863234', 'admin@mail.com', 100, 'success', '2025-02-09T10:59:21.000Z'),
('T418325913920334', 'admin@mail.com', 100, 'success', '2025-02-09T10:52:21.000Z'),
('T437994202105560', 'admin@mail.com', 100, 'success', '2025-02-09T09:57:27.000Z'),
('T566256030165079', 'admin@mail.com', 100, 'success', '2025-02-09T10:47:42.000Z'),
('T636782746676260', 'admin@mail.com', 100, 'success', '2025-02-09T10:15:26.000Z'),
('T680471218358659', 'admin@mail.com', 100, 'success', '2025-02-09T03:22:17.000Z'),
('T687097040325838', 'admin@mail.com', 100, 'success', '2025-02-09T09:50:58.000Z'),
('T836743754664326', 'admin@mail.com', 100, 'success', '2025-02-09T03:17:20.000Z'),
('T875789625214078', 'admin@mail.com', 100, 'success', '2025-02-09T10:26:22.000Z'),
('T881123923376830', 'admin@mail.com', 100, 'success', '2025-02-09T10:11:50.000Z'),
('T907018764748851', 'admin@mail.com', 100, 'success', '2025-02-09T10:16:51.000Z'),
('T930004017449313', 'admin@mail.com', 100, 'success', '2025-02-09T10:18:53.000Z');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Indexes for table `attendee_orders`
--
ALTER TABLE `attendee_orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_attendee_id` (`attendee_id`),
  ADD KEY `fk_ticket_id` (`ticket_id`),
  ADD KEY `fk_reference` (`reference`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_organizer_id` (`organizer_id`);

--
-- Indexes for table `guest_user`
--
ALTER TABLE `guest_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `guest_username` (`guest_username`);

--
-- Indexes for table `oauth_google_attendee`
--
ALTER TABLE `oauth_google_attendee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_google_users`
--
ALTER TABLE `oauth_google_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organizer`
--
ALTER TABLE `organizer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_payments`
--
ALTER TABLE `ticket_payments`
  ADD PRIMARY KEY (`reference`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9935990;

--
-- AUTO_INCREMENT for table `attendee_orders`
--
ALTER TABLE `attendee_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7515987;

--
-- AUTO_INCREMENT for table `oauth_google_attendee`
--
ALTER TABLE `oauth_google_attendee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9455610;

--
-- AUTO_INCREMENT for table `oauth_google_users`
--
ALTER TABLE `oauth_google_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9592157;

--
-- AUTO_INCREMENT for table `organizer`
--
ALTER TABLE `organizer`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5736337;

--
-- AUTO_INCREMENT for table `venue`
--
ALTER TABLE `venue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendee_orders`
--
ALTER TABLE `attendee_orders`
  ADD CONSTRAINT `fk_attendee_id` FOREIGN KEY (`attendee_id`) REFERENCES `attendee` (`id`),
  ADD CONSTRAINT `fk_reference` FOREIGN KEY (`reference`) REFERENCES `ticket_payments` (`reference`),
  ADD CONSTRAINT `fk_ticket_id` FOREIGN KEY (`ticket_id`) REFERENCES `event` (`id`);

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `fk_organizer_id` FOREIGN KEY (`organizer_id`) REFERENCES `organizer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
