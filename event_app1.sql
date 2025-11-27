-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 27, 2025 at 03:20 PM
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
(248487, 'GUEST-FW9ZJ2', 'GUEST-FW9ZJ2', 'FW9ZJ2@guest.teamevent.com', '', '', '2025-05-07 09:19:44'),
(868864, 'GUEST-9sOO1h', 'GUEST-9sOO1h', '9sOO1h@guest.teamevent.com', '', '', '2025-03-05 16:16:26'),
(934619, 'GUEST-B3gJNp', 'GUEST-B3gJNp', 'B3gJNp@guest.teamevent.com', '', '', '2025-06-29 12:09:33'),
(1375681, 'GUEST-hwEfFZ', 'GUEST-hwEfFZ', 'hwEfFZ@guest.teamevent.com', '', '', '2025-02-10 02:18:24'),
(2139125, 'GUEST-T17uXe', 'GUEST-T17uXe', 'T17uXe@guest.teamevent.com', '', '', '2025-05-07 09:28:57'),
(2647924, 'GUEST-7PZ4M8', 'GUEST-7PZ4M8', '7PZ4M8@guest.teamevent.com', '', '', '2025-05-07 09:26:56'),
(2769698, 'GUEST-hbJgtQ', 'GUEST-hbJgtQ', 'hbJgtQ@guest.teamevent.com', '', '', '2025-02-01 02:12:08'),
(2876038, 'GUEST-ai1jHV', 'GUEST-ai1jHV', 'ai1jHV@guest.teamevent.com', '', '', '2025-02-10 14:11:23'),
(2943954, 'GUEST-9cInCU', 'GUEST-9cInCU', '9cInCU@guest.teamevent.com', '', '', '2025-02-10 14:03:03'),
(3006280, 'GUEST-NNB8EY', 'GUEST-NNB8EY', 'NNB8EY@guest.teamevent.com', '', '', '2025-07-23 15:22:28'),
(3524254, 'GUEST-EtdvMC', 'GUEST-EtdvMC', 'EtdvMC@guest.teamevent.com', '', '', '2025-02-01 00:17:15'),
(3636888, 'GUEST-pr9g4l', 'GUEST-pr9g4l', 'pr9g4l@guest.teamevent.com', '', '', '2025-02-10 15:12:46'),
(3790497, 'GUEST-cVqO5k', 'GUEST-cVqO5k', 'cVqO5k@guest.teamevent.com', '', '', '2025-03-10 17:33:24'),
(3797332, 'GUEST-8AFxZU', 'GUEST-8AFxZU', '8AFxZU@guest.teamevent.com', '', '', '2025-03-10 17:40:56'),
(4024823, 'GUEST-bn6gjJ', 'GUEST-bn6gjJ', 'bn6gjJ@guest.teamevent.com', '', '', '2025-06-27 18:59:24'),
(4052394, 'GUEST-vj47xr', 'GUEST-vj47xr', 'vj47xr@guest.teamevent.com', '', '', '2025-02-07 12:09:49'),
(4581668, 'GUEST-EsgTOt', 'GUEST-EsgTOt', 'EsgTOt@guest.teamevent.com', '', '', '2025-05-07 09:23:48'),
(5139411, 'GUEST-ezxxYL', 'GUEST-ezxxYL', 'ezxxYL@guest.teamevent.com', '', '', '2025-02-10 14:16:18'),
(5256345, 'GUEST-h1mzv7', 'GUEST-h1mzv7', 'h1mzv7@guest.teamevent.com', '', '', '2025-03-05 16:26:30'),
(5747141, 'Okyere', '', 'okyere@mail.com', 'admin123', '0556061647', '2025-02-01 10:56:30'),
(5836762, 'GUEST-eh3kkX', 'GUEST-eh3kkX', 'eh3kkX@guest.teamevent.com', '', '', '2025-02-01 00:46:15'),
(5884422, 'GUEST-7pjJ88', 'GUEST-7pjJ88', '7pjJ88@guest.teamevent.com', '', '', '2025-03-10 17:19:31'),
(6320001, 'GUEST-6pcBpW', 'GUEST-6pcBpW', '6pcBpW@guest.teamevent.com', '', '', '2025-01-31 09:45:02'),
(6872892, 'GUEST-4vUipd', 'GUEST-4vUipd', '4vUipd@guest.teamevent.com', '', '', '2025-02-10 02:20:47'),
(7082582, 'GUEST-T1r2BE', 'GUEST-T1r2BE', 'T1r2BE@guest.teamevent.com', '', '', '2025-02-01 02:01:20'),
(7314210, 'GUEST-Csrj1S', 'GUEST-Csrj1S', 'Csrj1S@guest.teamevent.com', '', '', '2025-06-27 18:46:27'),
(8228747, 'GUEST-3dWl7g', 'GUEST-3dWl7g', '3dWl7g@guest.teamevent.com', '', '', '2025-02-10 13:57:58'),
(8261987, 'GUEST-ILjhVs', 'GUEST-ILjhVs', 'ILjhVs@guest.teamevent.com', '', '', '2025-03-10 17:21:36'),
(8658028, 'GUEST-w7r26U', 'GUEST-w7r26U', 'w7r26U@guest.teamevent.com', '', '', '2025-05-07 09:51:30');

-- --------------------------------------------------------

--
-- Table structure for table `attendee_orders`
--

CREATE TABLE `attendee_orders` (
  `order_id` int(11) NOT NULL,
  `bar_code` varchar(255) NOT NULL,
  `reference` varchar(20) DEFAULT NULL,
  `ticket_id` int(11) DEFAULT NULL,
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
(104, '2959', 'T836743754664326', NULL, 'General Tikcet ', 100, 1, 100, 5747141, 'Paystack', '2025-02-09 03:17:13'),
(105, '2023', 'T680471218358659', NULL, 'General Tikcet ', 100, 1, 100, 5747141, 'Paystack', '2025-02-09 03:22:10'),
(106, '2462', 'T687097040325838', NULL, 'General Tikcet ', 100, 1, 100, 5747141, 'Paystack', '2025-02-09 09:50:50'),
(107, '9608', 'T437994202105560', NULL, 'General Tikcet ', 100, 1, 100, 5747141, 'Paystack', '2025-02-09 09:57:22'),
(108, '3998', 'T343321781406394', NULL, 'General Tikcet ', 100, 1, 100, 5747141, 'Paystack', '2025-02-09 09:58:05'),
(109, '8489', NULL, NULL, 'General Tikcet ', 100, 1, 100, 5747141, 'Paystack', '2025-02-09 10:09:51'),
(110, '6137', 'T881123923376830', NULL, 'General Tikcet ', 100, 1, 100, 5747141, 'Paystack', '2025-02-09 10:11:42'),
(111, '7670', 'T636782746676260', NULL, 'General Tikcet ', 100, 1, 100, 5747141, 'Paystack', '2025-02-09 10:15:20'),
(112, '4036', 'T907018764748851', NULL, 'General Tikcet ', 100, 1, 100, 5747141, 'Paystack', '2025-02-09 10:16:45'),
(113, '8701', 'T301019069959173', NULL, 'General Tikcet ', 100, 1, 100, 5747141, 'Paystack', '2025-02-09 10:17:47'),
(114, '7712', 'T930004017449313', NULL, 'General Tikcet ', 100, 1, 100, 5747141, 'Paystack', '2025-02-09 10:18:41'),
(115, '3715', 'T306930800373272', NULL, 'General Tikcet ', 100, 1, 100, 5747141, 'Paystack', '2025-02-09 10:23:04'),
(116, '8734', 'T062102153732705', NULL, 'General Tikcet ', 100, 1, 100, 5747141, 'Paystack', '2025-02-09 10:23:56'),
(117, '4012', 'T875789625214078', NULL, 'General Tikcet ', 100, 1, 100, 5747141, 'Paystack', '2025-02-09 10:26:13'),
(118, '2754', 'T566256030165079', NULL, 'General Tikcet ', 100, 1, 100, 5747141, 'Paystack', '2025-02-09 10:47:35'),
(119, '9055', 'T418325913920334', NULL, 'General Tikcet ', 100, 1, 100, 5747141, 'Paystack', '2025-02-09 10:52:09'),
(120, '1221', 'T365004658863234', NULL, 'General Tikcet ', 100, 1, 100, 5747141, 'Paystack', '2025-02-09 10:58:53'),
(121, '5125', 'T241122026849918', NULL, 'General Tikcet ', 100, 1, 100, 5747141, 'Paystack', '2025-02-09 11:03:08'),
(122, '3961', NULL, NULL, 'General Tikcet ', 100, 1, 100, 5747141, 'Paystack', '2025-02-09 21:09:21'),
(123, '8244', NULL, NULL, 'General Tikcet ', 100, 1, 100, 5747141, 'Paystack', '2025-02-09 21:12:26'),
(124, '5474', NULL, NULL, 'General Tikcet ', 100, 1, 100, 5747141, 'Paystack', '2025-02-09 21:36:05'),
(125, '1998', 'T326779728503504', NULL, 'General Tikcet ', 100, 1, 100, 5747141, 'Paystack', '2025-02-09 21:45:56'),
(126, '9826', 'T531407700224176', NULL, 'General Tikcet ', 100, 1, 100, 5747141, 'Paystack', '2025-02-09 21:50:11'),
(127, '9667', 'T364605920092392', NULL, 'General Tikcet ', 100, 1, 100, 5747141, 'Paystack', '2025-02-10 00:05:16'),
(128, '4869', 'T774822596534647', NULL, 'General Tikcet ', 100, 1, 100, 5747141, 'Paystack', '2025-02-10 00:07:27'),
(129, '5370', 'T758776054095479', NULL, 'General Tikcet ', 100, 1, 100, 5747141, 'Paystack', '2025-02-10 01:01:33'),
(130, '1667', 'T198508795201258', NULL, 'General Tikcet ', 100, 1, 100, 5747141, 'Paystack', '2025-02-10 01:07:08'),
(131, '8876', 'T743710795260827', NULL, 'General Tikcet ', 100, 1, 100, 5747141, 'Paystack', '2025-02-10 01:08:51'),
(132, '8759', 'T331809863834819', NULL, 'General Tikcet ', 100, 1, 100, 5747141, 'Paystack', '2025-02-10 01:13:02'),
(133, '3350', 'T249185899829535', NULL, 'General Tikcet ', 100, 1, 100, 5747141, 'Paystack', '2025-02-10 01:18:34'),
(134, '9833', 'T533351816773801', NULL, 'General Tikcet ', 100, 1, 100, 5747141, 'Paystack', '2025-02-10 01:19:41'),
(135, '2438', 'T179971540638143', NULL, 'General Tikcet ', 100, 1, 100, 5747141, 'Paystack', '2025-02-10 01:21:53'),
(136, '5214', 'T243318270776763', NULL, 'General Tikcet ', 100, 1, 100, 5747141, 'Paystack', '2025-02-10 01:28:05'),
(137, '2782', 'T992781662122455', NULL, 'General Tikcet ', 100, 1, 100, 1375681, 'Paystack', '2025-02-10 02:18:54'),
(138, '8308', 'T641563062641598', NULL, 'General Tikcet ', 100, 1, 100, 6872892, 'Paystack', '2025-02-10 02:21:00'),
(139, '2485', NULL, NULL, 'General Tikcet ', 100, 1, 100, 2943954, 'Paystack', '2025-02-10 14:03:17'),
(140, '5775', 'T668368070601028', NULL, 'General Tikcet ', 100, 1, 100, 2943954, 'Paystack', '2025-02-10 14:04:12'),
(141, '3748', 'T892874713330626', NULL, 'General Tikcet ', 100, 1, 100, 2876038, 'Paystack', '2025-02-10 14:12:17'),
(142, '2637', NULL, NULL, 'General Tikcet ', 100, 1, 100, 5139411, 'Paystack', '2025-02-10 14:16:45'),
(143, '1227', 'T515843356921523', NULL, 'General Tikcet ', 100, 1, 100, 5139411, 'Paystack', '2025-02-10 14:17:15'),
(144, '8194', 'T000286900832481', NULL, 'General Tikcet ', 100, 1, 100, 3636888, 'Paystack', '2025-02-10 15:13:09'),
(145, '3817', 'T630259472118932', NULL, 'General Tikcet ', 100, 1, 100, 3636888, 'Paystack', '2025-02-11 00:00:28'),
(146, '9943', NULL, NULL, 'General Tikcet ', 100, 1, 100, 3636888, 'Paystack', '2025-02-11 01:08:40'),
(147, '7853', 'T568447550488023', NULL, 'General Tikcet ', 100, 1, 100, 3636888, 'Paystack', '2025-02-11 01:12:25'),
(148, '4838', NULL, NULL, 'Early Bird,', 300, 2, 600, 868864, 'Paystack', '2025-03-05 16:22:26'),
(149, '4855', NULL, NULL, 'Early Bird,', 300, 2, 600, 868864, 'Paystack', '2025-03-05 16:24:57'),
(150, '9847', NULL, NULL, 'Early Bird,', 300, 2, 600, 868864, 'Paystack', '2025-03-05 16:25:40'),
(151, '7781', 'T526244936704534', NULL, 'Early Bird,', 300, 1, 300, 5256345, 'Paystack', '2025-03-05 16:26:50'),
(152, '2013', 'T388008330913429', NULL, 'Early Bird,', 300, 1, 300, 5256345, 'Paystack', '2025-03-05 16:29:09'),
(153, '3711', NULL, NULL, 'Early Bird', 300, 2, 600, 5747141, 'Paystack', '2025-03-08 10:32:05'),
(154, '7462', NULL, NULL, 'Early Bird', 300, 2, 600, 5747141, 'Paystack', '2025-03-08 10:35:16'),
(155, '5028', NULL, NULL, 'Early Bird', 300, 2, 600, 5747141, 'Paystack', '2025-03-08 10:35:50'),
(156, '9212', NULL, NULL, 'Early Bird', 300, 2, 600, 5747141, 'Paystack', '2025-03-08 10:36:06'),
(157, '4792', NULL, NULL, 'Early Bird', 300, 2, 600, 5747141, 'Paystack', '2025-03-08 10:37:11'),
(158, '7234', NULL, NULL, 'Early Bird', 300, 2, 600, 5747141, 'Paystack', '2025-03-08 10:42:32'),
(159, '1427', NULL, NULL, 'Early Bird', 300, 2, 600, 5747141, 'Paystack', '2025-03-08 10:48:14'),
(160, '4756', 'T051891862630387', NULL, 'Early Bird', 300, 2, 600, 5747141, 'Paystack', '2025-03-08 10:49:33'),
(161, '7804', NULL, NULL, 'Early Bird', 300, 1, 300, 8261987, 'Paystack', '2025-03-10 17:22:19'),
(162, '3098', NULL, NULL, 'Early Bird', 300, 1, 300, 8261987, 'Paystack', '2025-03-10 17:23:05'),
(163, '8530', NULL, NULL, 'Early Bird', 300, 1, 300, 8261987, 'Paystack', '2025-03-10 17:23:09'),
(164, '4853', NULL, NULL, 'Early Bird', 300, 1, 300, 8261987, 'Paystack', '2025-03-10 17:24:04'),
(165, '5230', 'T195778093522006', NULL, 'Early Bird', 300, 1, 300, 8261987, 'Paystack', '2025-03-10 17:24:17'),
(166, '1102', NULL, NULL, 'General Tikcet ', 100, 1, 100, 3790497, 'Paystack', '2025-03-10 17:34:43'),
(167, '2870', NULL, NULL, 'General Tikcet ', 100, 1, 100, 3790497, 'Paystack', '2025-03-10 17:35:43'),
(168, '9737', NULL, NULL, 'General Tikcet ', 100, 1, 100, 3790497, 'Paystack', '2025-03-10 17:36:03'),
(169, '7163', NULL, NULL, 'General Tikcet ', 100, 1, 100, 3790497, 'Paystack', '2025-03-10 17:36:37'),
(170, '8520', 'T664929123760580', NULL, 'General Tikcet ', 100, 1, 100, 3797332, 'Paystack', '2025-03-10 17:41:33'),
(171, '3090', 'T099973294775257', NULL, 'asas', 11, 1, 11, 248487, 'Paystack', '2025-05-07 09:20:01'),
(172, '4770', 'T776022145455760', NULL, 'asas', 11, 1, 11, 4581668, 'Paystack', '2025-05-07 09:24:05'),
(173, '6423', 'T613835353027660', NULL, 'asas', 11, 7, 77, 4581668, 'Paystack', '2025-05-07 09:25:14'),
(174, '1998', 'T326779728503504', NULL, 'asas', 11, 1, 11, 2647924, 'Paystack', '2025-05-07 09:27:09'),
(175, '4020', 'T697012065666769', NULL, 'asas', 11, 1, 11, 2139125, 'Paystack', '2025-05-07 09:30:09'),
(176, '5595', 'T617708084236448', NULL, 'Try Ticket', 100, 1, 100, 8658028, 'Paystack', '2025-05-07 09:51:44'),
(177, '3699', NULL, NULL, 'Early Bird', 300, 1, 300, 7314210, 'Paystack', '2025-06-27 18:46:31'),
(178, '3697', 'T345222553889137', NULL, 'Early Bird', 300, 1, 300, 4024823, 'Paystack', '2025-06-27 18:59:36'),
(179, '4764', NULL, NULL, 'Early Bird', 300, 1, 300, 934619, 'Paystack', '2025-06-29 12:09:38'),
(180, '9714', NULL, NULL, 'Early Bird', 300, 1, 300, 934619, 'Paystack', '2025-06-29 12:10:20'),
(181, '9167', NULL, NULL, 'Early Bird', 300, 1, 300, 934619, 'Paystack', '2025-06-29 12:23:31'),
(182, '6918', NULL, NULL, 'Early Bird', 300, 1, 300, 934619, 'Paystack', '2025-06-29 12:25:33'),
(183, '3316', NULL, NULL, 'Early Bird', 300, 1, 300, 934619, 'Paystack', '2025-06-29 12:25:45'),
(184, '2289', NULL, NULL, 'Early Bird', 300, 1, 300, 934619, 'Paystack', '2025-06-29 12:27:15'),
(185, '1011', NULL, NULL, 'Early Bird', 300, 2, 600, 934619, 'Paystack', '2025-06-29 12:27:29'),
(186, '2290', NULL, NULL, 'Early Bird', 300, 2, 600, 934619, 'Paystack', '2025-06-29 12:27:47'),
(187, '4075', NULL, NULL, 'Early Bird', 300, 2, 600, 934619, 'Paystack', '2025-06-29 12:28:07'),
(188, '1124', NULL, NULL, 'Early Bird', 300, 2, 600, 934619, 'Paystack', '2025-06-29 12:28:55'),
(189, '4038', NULL, NULL, 'Early Bird', 300, 2, 600, 934619, 'Paystack', '2025-06-29 12:29:06'),
(190, '9181', NULL, NULL, 'Early Bird', 300, 1, 300, 4024823, 'Paystack', '2025-06-29 12:34:35'),
(191, '5258', 'T416662618357262', NULL, 'Early Bird', 300, 1, 300, 4024823, 'Paystack', '2025-06-29 12:35:36'),
(192, '9336', 'T371210487309381', 3883290, 'Early Bird ', 200, 1, 200, 3006280, 'Paystack', '2025-07-23 15:22:43'),
(193, '9660', 'T128699895098410', 3883290, 'Early Bird ', 200, 2, 400, 3006280, 'Paystack', '2025-07-23 15:25:37');

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
  `total_tickets` varchar(200) NOT NULL,
  `ticket_quantity` varchar(200) NOT NULL,
  `status` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `event_reference_id`, `organizer_id`, `event_name`, `event_description`, `event_category`, `image`, `event_contact`, `event_email`, `event_date_time_start`, `event_date_time_end`, `event_mode`, `event_venue`, `ticket_name`, `ticket_price`, `ticket_type`, `total_tickets`, `ticket_quantity`, `status`) VALUES
(3883290, '3905da82da', 5736336, 'Jams Connect ', 'Are you passionate about photography & Videography?nJoin us to learn: Camera handling, Video and photo editing, Drone Piloting.nnCourse Duration: 3 mothns / 6 months / 1 year.nnRegister now: 024 856 8916nWe offer face to face and online ', 'community-culture', '6880ea168bec05.59122620.jpg', '0556061723', 'jamsconnect112@gmail.com', 'Wed 30 Jul 2025, 8:30 PM ', 'Wed 30 Jul 2025, 11:55 PM ', 'Physical Event', 'Brunie Sports Complex', 'Early Bird ', '200', 'Payed', '20', '17', '1');

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
('5747141', 'admin@mail.com', '0556062693', 'Paystack', NULL, '2025-02-09 11:03:08'),
('5747141', 'admin@mail.com', '0556062693', 'Paystack', NULL, '2025-02-09 21:09:21'),
('5747141', 'admin@mail.com', '0556062693', 'Paystack', NULL, '2025-02-09 21:12:26'),
('5747141', 'enockaning18@gmail.com', '0556878654', 'Paystack', NULL, '2025-02-09 21:36:05'),
('5747141', 'enockaning18@gmail.com', '0556068473', 'Paystack', NULL, '2025-02-09 21:45:56'),
('5747141', 'enockaning18@gmail.com', '0558392823', 'Paystack', NULL, '2025-02-09 21:50:11'),
('5747141', 'hackforlife100@gmail.com', '05560617182', 'Paystack', NULL, '2025-02-10 00:05:16'),
('5747141', 'enockaning18@gmail.com', '0559181723', 'Paystack', NULL, '2025-02-10 00:07:27'),
('5747141', 'enockaning18@gmail.com', '0556171625', 'Paystack', NULL, '2025-02-10 01:01:33'),
('5747141', 'enockaning18@gmail.com', '0556171823', 'Paystack', NULL, '2025-02-10 01:07:08'),
('5747141', 'enockaning18@gmail.com', '0556171823', 'Paystack', NULL, '2025-02-10 01:08:37'),
('5747141', 'enockaning18@gmail.com', '0556068272', 'Paystack', NULL, '2025-02-10 01:08:51'),
('5747141', 'enockaning18@gmail.com', '0556069342', 'Paystack', NULL, '2025-02-10 01:13:02'),
('5747141', 'enockaning18@gmail.com', '03302020323', 'Paystack', NULL, '2025-02-10 01:18:34'),
('5747141', 'enockaning18@gmail.com', '0558292834', 'Paystack', NULL, '2025-02-10 01:19:41'),
('5747141', 'enockaning18@gmail.com', '0559181723', 'Paystack', NULL, '2025-02-10 01:21:53'),
('5747141', 'enockaning18@gmail.com', '1231', 'Paystack', NULL, '2025-02-10 01:28:05'),
('1375681', 'enockaning18@gmail.com', '0556061647', 'Paystack', NULL, '2025-02-10 02:18:54'),
('6872892', 'enockaning18@gmail.com', '0556061647', 'Paystack', NULL, '2025-02-10 02:21:00'),
('2943954', 'derrickakpatsu@gmail.com', '+233508717524', 'Paystack', NULL, '2025-02-10 14:03:17'),
('2943954', 'derrickakpatsu@gmail.com', '+233508717524', 'Paystack', NULL, '2025-02-10 14:04:12'),
('2876038', 'raykenneth055@gmail.com', '0506510434', 'Paystack', NULL, '2025-02-10 14:12:17'),
('5139411', 'derrickakpatsu@gmail.com', '0530427383', 'Paystack', NULL, '2025-02-10 14:16:45'),
('5139411', 'derrickakpatsu@gmail.com', '0530427383', 'Paystack', NULL, '2025-02-10 14:17:15'),
('3636888', 'enockaning18@gmail.com', '0559291912', 'Paystack', NULL, '2025-02-10 15:13:09'),
('3636888', 'enockaning18@gmail.com', '0559282823', 'Paystack', NULL, '2025-02-11 00:00:28'),
('3636888', 'enockaning18@gmail.com', '05569292311', 'Paystack', NULL, '2025-02-11 01:08:40'),
('3636888', 'enockaning18@gmail.com', '05592827341', 'Paystack', NULL, '2025-02-11 01:12:25'),
('868864', 'enockaning18@gmail.com', '0556061647', 'Paystack', NULL, '2025-03-05 16:22:26'),
('868864', 'enockaning18@gmail.com', '0556061647', 'Paystack', NULL, '2025-03-05 16:24:57'),
('868864', 'enockaning18@gmail.com', '0556061647', 'Paystack', NULL, '2025-03-05 16:25:40'),
('5256345', 'enockaning18@gmai.com', '0556069843', 'Paystack', NULL, '2025-03-05 16:26:50'),
('5256345', 'enockaning18@gmail.com', '0556061647', 'Paystack', NULL, '2025-03-05 16:29:09'),
('5747141', 'trymail@mail.com', '0556069203', 'Paystack', NULL, '2025-03-08 10:32:05'),
('5747141', 'trymail@gmail.com', '0556960191', 'Paystack', NULL, '2025-03-08 10:35:16'),
('5747141', 'trymail@gmail.com', '0556960191', 'Paystack', NULL, '2025-03-08 10:35:50'),
('5747141', 'trymail@gmail.com', '0556960191', 'Paystack', NULL, '2025-03-08 10:36:06'),
('5747141', 'trymailer@mail.com', '0556968233', 'Paystack', NULL, '2025-03-08 10:37:11'),
('5747141', 'trymailer@mail.com', '0556968233', 'Paystack', NULL, '2025-03-08 10:42:32'),
('5747141', 'trymailer@mail.com', '0556968233', 'Paystack', NULL, '2025-03-08 10:48:14'),
('5747141', 'trymailer@mail.com', '0556968233', 'Paystack', NULL, '2025-03-08 10:49:33'),
('8261987', 'danielowusuboatengjunior@gmail.com', '0556061637', 'Paystack', NULL, '2025-03-10 17:22:19'),
('8261987', 'danielowusuboatengjunior@gmail.com', '0556061637', 'Paystack', NULL, '2025-03-10 17:23:05'),
('8261987', 'danielowusuboatengjunior@gmail.com', '0556061637', 'Paystack', NULL, '2025-03-10 17:23:09'),
('8261987', 'danielowusuboatengjunior@gmail.com', '0556061637', 'Paystack', NULL, '2025-03-10 17:24:04'),
('8261987', 'danielowusuboatengjunior@gmail.com', '0556061647', 'Paystack', NULL, '2025-03-10 17:24:17'),
('3790497', 'danielowusuboatengjunior@gmail.com', '0556968272', 'Paystack', NULL, '2025-03-10 17:34:43'),
('3790497', 'danielowusuboatengjunior@gmail.com', '0556968272', 'Paystack', NULL, '2025-03-10 17:35:43'),
('3790497', 'danielowusuboatengjunior@gmail.com', '0556968272', 'Paystack', NULL, '2025-03-10 17:36:03'),
('3790497', 'danielowusuboatengjunior@gmail.com', '0556968272', 'Paystack', NULL, '2025-03-10 17:36:37'),
('3797332', 'danielowusuboatengjunior@gmail.com', '0556791256', 'Paystack', NULL, '2025-03-10 17:41:33'),
('3797332', 'danielowusuboatengjunior@gmail.com', '0556791256', 'Paystack', NULL, '2025-03-10 17:48:33'),
('3797332', 'danielowusuboatengjunior@gmail.com', '0556791256', 'Paystack', NULL, '2025-03-10 17:48:33'),
('248487', 'tyr@gmail.com', '0557181726', 'Paystack', NULL, '2025-05-07 09:20:01'),
('4581668', 'hackforlife100@gmail.com', '0556069202', 'Paystack', NULL, '2025-05-07 09:24:05'),
('4581668', 'hackforlife100@gmail.com', '0559591911', 'Paystack', NULL, '2025-05-07 09:25:14'),
('2647924', 'hacc@gmail.com', '0559282912', 'Paystack', NULL, '2025-05-07 09:27:09'),
('2139125', 'hack@gmial.com', '0558172822', 'Paystack', NULL, '2025-05-07 09:30:09'),
('8658028', 'hjhgjz@gmail.com', '0556787534', 'Paystack', NULL, '2025-05-07 09:51:44'),
('7314210', 'enockaning18@gmail.com', '0556061647', 'Paystack', NULL, '2025-06-27 18:46:31'),
('4024823', 'hackforlife100@gmail.com', '0556061647', 'Paystack', NULL, '2025-06-27 18:59:36'),
('934619', 'enockaning18@gmail.com', '0556061647', 'Paystack', NULL, '2025-06-29 12:09:38'),
('934619', 'enockaning18@gmail.com', '0556061647', 'Paystack', NULL, '2025-06-29 12:10:20'),
('934619', 'enockaning18@gmail.com', '0556061647', 'Paystack', NULL, '2025-06-29 12:23:31'),
('934619', 'enockaning18@gmail.com', '0556061647', 'Paystack', NULL, '2025-06-29 12:25:33'),
('934619', 'enockaning18@gmail.com', '0556061647', 'Paystack', NULL, '2025-06-29 12:25:45'),
('934619', 'enockaning18@gmail.com', '0556061647', 'Paystack', NULL, '2025-06-29 12:27:15'),
('934619', 'enockaning18@gmail.com', '0556061647', 'Paystack', NULL, '2025-06-29 12:27:29'),
('934619', 'enockaning18@gmail.com', '0556061647', 'Paystack', NULL, '2025-06-29 12:27:47'),
('934619', 'enockaning18@gmail.com', '0556061647', 'Paystack', NULL, '2025-06-29 12:28:07'),
('934619', 'enockaning18@gmail.com', '0556061647', 'Paystack', NULL, '2025-06-29 12:28:55'),
('934619', 'enockaning18@gmail.com', '0556061647', 'Paystack', NULL, '2025-06-29 12:29:06'),
('4024823', 'hackforlife100@gmail.com', '0255618726', 'Paystack', NULL, '2025-06-29 12:33:59'),
('4024823', 'hackforlife100@gmail.com', '0556171822', 'Paystack', NULL, '2025-06-29 12:34:35'),
('4024823', 'hackforlife100@gmail.com', '0551617872', 'Paystack', NULL, '2025-06-29 12:35:36'),
('3006280', 'hackforlife100@gmail.com', '0556061643', 'Paystack', NULL, '2025-07-23 15:22:43'),
('3006280', 'hackforlife100@gmail.com', '0556061643', 'Paystack', NULL, '2025-07-23 15:25:36');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_payments`
--

CREATE TABLE `ticket_payments` (
  `reference` varchar(250) NOT NULL,
  `email` varchar(200) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `payment_channel` varchar(200) NOT NULL,
  `payment_brand` varchar(50) NOT NULL,
  `transaction_status` varchar(200) NOT NULL,
  `payment_date` varchar(200) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'un-used',
  `scanned_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticket_payments`
--

INSERT INTO `ticket_payments` (`reference`, `email`, `amount`, `payment_channel`, `payment_brand`, `transaction_status`, `payment_date`, `status`, `scanned_at`) VALUES
('T000286900832481', 'enockaning18@gmail.com', 100, '', '', 'success', '2025-02-10T15:13:30.000Z', 'used', '2025-07-21 23:44:44'),
('T051891862630387', 'trymailer@mail.com', 600, 'mobile_money', 'Mtn', 'success', '2025-03-08T10:50:20.000Z', 'used', '2025-07-21 23:45:14'),
('T062102153732705', 'admin@mail.com', 100, '', '', 'success', '2025-02-09T10:24:02.000Z', 'un-used', '0000-00-00 00:00:00'),
('T099973294775257', 'tyr@gmail.com', 11, 'mobile_money', 'Mtn', 'success', '2025-05-07T09:20:15.000Z', 'used', '2025-07-21 23:46:05'),
('T128699895098410', 'hackforlife100@gmail.com', 400, 'mobile_money', 'Mtn', 'success', '2025-07-23T15:25:40.000Z', 'used', '2025-07-23 17:00:10'),
('T179971540638143', 'enockaning18@gmail.com', 100, '', '', 'success', '2025-02-10T01:22:02.000Z', 'used', '2025-07-21 23:46:24'),
('T195778093522006', 'danielowusuboatengjunior@gmail.com', 300, 'mobile_money', 'Mtn', 'success', '2025-03-10T17:25:36.000Z', 'un-used', '0000-00-00 00:00:00'),
('T198508795201258', 'enockaning18@gmail.com', 100, '', '', 'success', '2025-02-10T01:07:22.000Z', 'un-used', '2025-07-23 16:41:45'),
('T241122026849918', 'admin@mail.com', 100, '', '', 'success', '2025-02-09T11:03:14.000Z', 'un-used', '0000-00-00 00:00:00'),
('T243318270776763', 'enockaning18@gmail.com', 100, '', '', 'success', '2025-02-10T01:28:15.000Z', 'un-used', '0000-00-00 00:00:00'),
('T249185899829535', 'enockaning18@gmail.com', 100, '', '', 'success', '2025-02-10T01:18:42.000Z', 'un-used', '0000-00-00 00:00:00'),
('T301019069959173', 'admin@mail.com', 100, '', '', 'success', '2025-02-09T10:17:57.000Z', 'un-used', '0000-00-00 00:00:00'),
('T306930800373272', 'admin@mail.com', 100, '', '', 'success', '2025-02-09T10:23:13.000Z', 'un-used', '0000-00-00 00:00:00'),
('T326779728503504', 'hacc@gmail.com', 11, 'mobile_money', 'Mtn', 'success', '2025-05-07T09:27:15.000Z', 'un-used', '0000-00-00 00:00:00'),
('T331809863834819', 'enockaning18@gmail.com', 100, '', '', 'success', '2025-02-10T01:13:14.000Z', 'used', '2025-07-21 21:44:07'),
('T343321781406394', 'admin@mail.com', 100, '', '', 'success', '2025-02-09T09:58:11.000Z', 'un-used', '0000-00-00 00:00:00'),
('T345222553889137', 'hackforlife100@gmail.com', 300, 'mobile_money', 'Mtn', 'success', '2025-06-27T18:59:48.000Z', 'used', '2025-08-08 12:15:16'),
('T364605920092392', 'hackforlife100@gmail.com', 100, '', '', 'success', '2025-02-10T00:05:31.000Z', 'un-used', '0000-00-00 00:00:00'),
('T365004658863234', 'admin@mail.com', 100, '', '', 'success', '2025-02-09T10:59:21.000Z', 'un-used', '0000-00-00 00:00:00'),
('T371210487309381', 'hackforlife100@gmail.com', 200, 'mobile_money', 'Mtn', 'success', '2025-07-23T15:22:52.000Z', 'used', '2025-07-23 16:59:36'),
('T388008330913429', 'enockaning18@gmail.com', 300, 'mobile_money', 'Mtn', 'success', '2025-03-05T16:29:16.000Z', 'un-used', '0000-00-00 00:00:00'),
('T416662618357262', 'hackforlife100@gmail.com', 300, 'mobile_money', 'Mtn', 'success', '2025-06-29T12:35:42.000Z', 'un-used', '0000-00-00 00:00:00'),
('T418325913920334', 'admin@mail.com', 100, '', '', 'success', '2025-02-09T10:52:21.000Z', 'un-used', '0000-00-00 00:00:00'),
('T437994202105560', 'admin@mail.com', 100, '', '', 'success', '2025-02-09T09:57:27.000Z', 'un-used', '0000-00-00 00:00:00'),
('T515843356921523', 'derrickakpatsu@gmail.com', 100, '', '', 'success', '2025-02-10T14:17:35.000Z', 'un-used', '0000-00-00 00:00:00'),
('T526244936704534', 'enockaning18@gmai.com', 300, 'mobile_money', 'Mtn', 'success', '2025-03-05T16:27:07.000Z', 'un-used', '0000-00-00 00:00:00'),
('T531407700224176', 'enockaning18@gmail.com', 100, '', '', 'success', '2025-02-09T21:50:21.000Z', 'un-used', '0000-00-00 00:00:00'),
('T533351816773801', 'enockaning18@gmail.com', 100, '', '', 'success', '2025-02-10T01:19:54.000Z', 'un-used', '0000-00-00 00:00:00'),
('T566256030165079', 'admin@mail.com', 100, '', '', 'success', '2025-02-09T10:47:42.000Z', 'un-used', '0000-00-00 00:00:00'),
('T568447550488023', 'enockaning18@gmail.com', 100, 'mobile_money', 'Mtn', 'success', '2025-02-11T01:12:33.000Z', 'un-used', '0000-00-00 00:00:00'),
('T613835353027660', 'hackforlife100@gmail.com', 77, 'mobile_money', 'Mtn', 'success', '2025-05-07T09:25:40.000Z', 'un-used', '0000-00-00 00:00:00'),
('T617708084236448', 'hjhgjz@gmail.com', 100, 'mobile_money', 'Mtn', 'success', '2025-05-07T09:51:50.000Z', 'un-used', '0000-00-00 00:00:00'),
('T630259472118932', 'enockaning18@gmail.com', 100, '', '', 'success', '2025-02-11T00:00:50.000Z', 'un-used', '0000-00-00 00:00:00'),
('T636782746676260', 'admin@mail.com', 100, '', '', 'success', '2025-02-09T10:15:26.000Z', 'un-used', '0000-00-00 00:00:00'),
('T641563062641598', 'enockaning18@gmail.com', 100, '', '', 'success', '2025-02-10T02:21:10.000Z', 'un-used', '0000-00-00 00:00:00'),
('T664929123760580', 'danielowusuboatengjunior@gmail.com', 100, 'mobile_money', 'Mtn', 'success', '2025-03-10T17:42:38.000Z', 'un-used', '0000-00-00 00:00:00'),
('T668368070601028', 'derrickakpatsu@gmail.com', 100, '', '', 'success', '2025-02-10T14:04:23.000Z', 'un-used', '0000-00-00 00:00:00'),
('T680471218358659', 'admin@mail.com', 100, '', '', 'success', '2025-02-09T03:22:17.000Z', 'un-used', '0000-00-00 00:00:00'),
('T687097040325838', 'admin@mail.com', 100, '', '', 'success', '2025-02-09T09:50:58.000Z', 'un-used', '0000-00-00 00:00:00'),
('T697012065666769', 'hack@gmial.com', 11, 'mobile_money', 'Mtn', 'success', '2025-05-07T09:30:17.000Z', 'un-used', '0000-00-00 00:00:00'),
('T743710795260827', 'enockaning18@gmail.com', 100, '', '', 'success', '2025-02-10T01:09:04.000Z', 'un-used', '0000-00-00 00:00:00'),
('T758776054095479', 'enockaning18@gmail.com', 100, '', '', 'success', '2025-02-10T01:01:45.000Z', 'un-used', '0000-00-00 00:00:00'),
('T774822596534647', 'enockaning18@gmail.com', 100, '', '', 'success', '2025-02-10T00:07:36.000Z', 'un-used', '0000-00-00 00:00:00'),
('T776022145455760', 'hackforlife100@gmail.com', 11, 'mobile_money', 'Mtn', 'success', '2025-05-07T09:24:11.000Z', 'un-used', '0000-00-00 00:00:00'),
('T836743754664326', 'admin@mail.com', 100, '', '', 'success', '2025-02-09T03:17:20.000Z', 'un-used', '0000-00-00 00:00:00'),
('T875789625214078', 'admin@mail.com', 100, '', '', 'success', '2025-02-09T10:26:22.000Z', 'un-used', '0000-00-00 00:00:00'),
('T881123923376830', 'admin@mail.com', 100, '', '', 'success', '2025-02-09T10:11:50.000Z', 'un-used', '0000-00-00 00:00:00'),
('T892874713330626', 'raykenneth055@gmail.com', 100, '', '', 'success', '2025-02-10T14:13:06.000Z', 'un-used', '0000-00-00 00:00:00'),
('T907018764748851', 'admin@mail.com', 100, '', '', 'success', '2025-02-09T10:16:51.000Z', 'un-used', '0000-00-00 00:00:00'),
('T930004017449313', 'admin@mail.com', 100, '', '', 'success', '2025-02-09T10:18:53.000Z', 'un-used', '0000-00-00 00:00:00'),
('T992781662122455', 'enockaning18@gmail.com', 100, '', '', 'success', '2025-02-10T02:19:08.000Z', 'un-used', '0000-00-00 00:00:00');

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
  ADD KEY `fk_reference` (`reference`),
  ADD KEY `fk_ticket_id` (`ticket_id`);

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
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8951096;

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
  ADD CONSTRAINT `fk_ticket_id` FOREIGN KEY (`ticket_id`) REFERENCES `event` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `fk_organizer_id` FOREIGN KEY (`organizer_id`) REFERENCES `organizer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
