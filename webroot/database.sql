-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Mar 20, 2017 at 10:42 PM
-- Server version: 5.6.33-cll-lve
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `poetsphp_gr`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`) VALUES
(1, 'Department 1'),
(2, 'Department 2');

-- --------------------------------------------------------

--
-- Table structure for table `grievances`
--

CREATE TABLE IF NOT EXISTS `grievances` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `department_id` int(11) NOT NULL,
  `current_status` varchar(100) NOT NULL,
  `login_id` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `grievances`
--

INSERT INTO `grievances` (`id`, `subject`, `description`, `department_id`, `current_status`, `login_id`, `created_on`, `user_id`) VALUES
(3, 'subject', 'description', 1, '', 1, '2017-03-21 04:24:28', 1),
(4, 'subject subject', 'description description', 1, '', 1, '2017-03-21 04:24:30', 1),
(5, 'sfsd', 'sdffsdf', 1, '', 1, '2017-03-21 04:24:33', 1),
(6, 'subject', 'description', 1, 'open', 1, '2017-03-21 04:24:35', 1),
(7, 'sfsd', 'sdffsdf', 1, 'open', 1, '2017-03-21 04:24:37', 1),
(8, 'hello', 'Department 1', 0, 'open', 1, '2017-03-21 04:24:39', 1),
(9, 'hello', 'Department 1', 0, 'open', 1, '2017-03-21 04:24:43', 1),
(10, 'hello', 'Department 1', 0, 'open', 1, '2017-03-21 04:24:45', 1),
(11, 'gvhx', 'Department 1', 0, 'open', 1, '2017-03-21 04:24:47', 1),
(12, 'sfsd', 'sdffsdf', 1, 'open', 1, '2017-03-21 00:01:12', 0),
(13, 'sfsd', 'sdffsdf', 0, 'open', 1, '2017-03-21 00:01:12', 0),
(14, 'sfsd', 'sdffsdf', 1, 'open', 1, '2017-03-21 00:01:12', 0),
(15, 'jfc', 'hfjgj', 1, 'open', 1, '2017-03-21 00:01:12', 0),
(16, 'gdh', 'hdchc', 1, 'open', 1, '2017-03-21 00:01:12', 0),
(17, 'sfsd', 'sdffsdf', 1, 'open', 12, '2017-03-21 02:03:13', 0),
(18, 'demo grievance', 'test demo', 1, 'open', 12, '2017-03-21 03:33:49', 3),
(19, 'demo grievance', 'test demo', 1, 'open', 12, '2017-03-21 03:33:51', 3),
(20, 'test', 'test', 1, 'open', 12, '2017-03-21 03:43:32', 3),
(21, 'test', 'test', 1, 'open', 12, '2017-03-21 03:46:15', 3);

-- --------------------------------------------------------

--
-- Table structure for table `grievance_attachments`
--

CREATE TABLE IF NOT EXISTS `grievance_attachments` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `grievance_attachments`
--

INSERT INTO `grievance_attachments` (`id`, `name`) VALUES
(1, '58d053ddcdbb2.png'),
(2, '58d0560d2e051.png'),
(3, '58d06610b7a62.jpg'),
(4, '58d09f223c729.jpg'),
(5, '58d09f230d6d9.jpg'),
(6, '58d0a169135a7.jpg'),
(7, '58d0a20c928be.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `grievance_histories`
--

CREATE TABLE IF NOT EXISTS `grievance_histories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grievance_id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `description` text NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `grievance_histories`
--

INSERT INTO `grievance_histories` (`id`, `grievance_id`, `time`, `description`, `from_user_id`, `to_user_id`) VALUES
(1, 1, '2017-03-21 00:07:18', 'description', 0, 3),
(2, 1, '2017-03-21 00:07:21', 'sdffsdf', 0, 3),
(3, 0, '2017-03-20 23:04:16', 'sdffsdf', 0, 3),
(4, 0, '2017-03-20 23:26:57', 'sdffsdf', 0, 3),
(5, 0, '2017-03-20 23:27:31', 'hfjgj', 0, 3),
(6, 17, '2017-03-21 02:03:25', 'hdchc', 0, 3),
(7, 17, '2017-03-21 02:03:22', 'sdffsdf', 0, 3),
(8, 0, '2017-03-21 03:33:49', 'test demo', 0, 3),
(9, 0, '2017-03-21 03:33:51', 'test demo', 0, 3),
(10, 0, '2017-03-21 03:43:32', 'test', 0, 3),
(11, 0, '2017-03-21 03:46:16', 'test', 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `grievance_types`
--

CREATE TABLE IF NOT EXISTS `grievance_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE IF NOT EXISTS `levels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `level_order` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `department_id`, `name`, `level_order`) VALUES
(1, 1, 'level 1', 1),
(2, 1, 'level 2', 2),
(3, 1, 'level 3', 3),
(4, 2, 'level 1', 1),
(5, 2, 'level 2', 2),
(6, 2, 'level 3', 3);

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE IF NOT EXISTS `logins` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `gcm` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `otp` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `logins`
--

INSERT INTO `logins` (`id`, `name`, `password`, `mobile`, `gcm`, `address`, `otp`, `email`) VALUES
(1, 'abhilash', 'abhi', '9636653883', 'qq', '', '', 'abhilashlohar01@gmail.com'),
(2, 'DharamRaj', 'dharam', '999999999', '', '', '', ''),
(3, '', 'password', 'mobile', '', 'address', '', 'email'),
(12, 'dharam', 'qwerty', '9929970571', 'ed9BM5ykPN4:APA91bGD9XvR2uipbN7KInFI-9_EIM_BgjEEpccVxXCcwQxgT1TIfe7WAbPdmlxSduhClJJuq5ktRzvxoepvYI8GG2yLizXdPSAtPlw1oCqcUFVJgblOreRBvQq8E2E9n0UilgoQORPp', 'udaipur', '', 'dharmlabs@gmail.com'),
(14, 'jonty', '123456', '1234567890', 'c4haDmepI4Y:APA91bFTpdoTPJKWIubl2C43oxzzoNlLdH4fsroJ21PwlFaJ8lM0ukaRW8SgSoPyiUTGY-ZeRwkkab-ddwJFhdWMNPzThkdwF9vz9nLIOk8M7VKoL5op6luV6cohsa46fvjf1fQd_5oe', 'wtwfwcwg', '', 'test@taskspotting.com'),
(15, 'vaibhav', '123456', '9352823161', 'dS1dQwEgus8:APA91bEwtjpcaMDyovupjWXjpadcvelgrUBk_m1V1lFt3hW057EUfVeX2eo0CUODHyA3g4YEPEEj3JJjsfSpBAKqR78uo-i6xT22CX9rHv340qZFhEitgtmY9oLYv-WrU24bLzdKnwHG', 'ydyhffh', '', 'vaibhav@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `button_text` varchar(255) NOT NULL,
  `deep_link` varchar(255) NOT NULL,
  `n_type` varchar(100) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `message`, `user_id`, `button_text`, `deep_link`, `n_type`, `time`) VALUES
(1, 'Your trasanction status: success.', 1, 'View Transaction', '', 'Payment', '2017-03-21 03:09:49'),
(2, 'Your trasanction status: success.', 1, 'View Transaction', '', 'Payment', '2017-03-21 03:09:49'),
(3, 'Your trasanction status: success.', 1, 'View Transaction', '', 'Payment', '2017-03-21 03:09:49'),
(4, 'Your trasanction status: success.', 1, 'View Transaction', 'emitra%3A%2F%2FtrasanctionDetail%3Fid%3D58d02fbbf2908', 'Payment', '2017-03-21 03:09:49'),
(5, 'Your trasanction status: success.', 1, 'View Transaction', 'emitra://paymentDetail?id=58d030ae9d109', 'Payment', '2017-03-21 03:09:49'),
(6, 'Your trasanction status: success.', 1, 'View Transaction', 'emitra://paymentDetail?id=58d0313c55a92', 'Payment', '2017-03-21 03:09:49'),
(7, 'Your trasanction status: failure.', 1, 'View Transaction', 'emitra://paymentDetail?id=58d031a50ccda', 'Payment', '2017-03-21 03:09:49'),
(8, 'Your trasanction status: success.', 1, 'View Transaction', 'emitra://paymentDetail?id=58d0320652bb5', 'Payment', '2017-03-21 03:09:49'),
(9, 'Your trasanction status: success.', 1, 'View Transaction', 'emitra://paymentDetail?id=58d032a9efe41', 'Payment', '2017-03-21 03:09:49'),
(10, 'Your trasanction status: success.', 1, 'View Transaction', 'emitra://paymentDetail?id=58d032e0c8d2b', 'Payment', '2017-03-21 03:09:49'),
(11, 'Your trasanction status: success.', 1, 'View Transaction', 'emitra://paymentDetail?id=58d0333b09ad4', 'Payment', '2017-03-21 03:09:49'),
(12, 'Your trasanction status: success.', 1, 'View Transaction', 'emitra://paymentDetail?id=58d034298138c', 'Payment', '2017-03-21 03:09:49'),
(13, 'Your trasanction status: success.', 1, 'View Transaction', 'emitra://paymentDetail?id=58d0346dc0d7d', 'Payment', '2017-03-21 03:09:49'),
(14, 'Your trasanction status: success.', 1, 'View Transaction', 'emitra://paymentDetail?id=58d035976f803', 'Payment', '2017-03-21 03:09:49'),
(15, 'Your trasanction status: success.', 1, 'View Transaction', 'emitra://paymentDetail?id=58d035d1e54ee', 'Payment', '2017-03-21 03:09:49'),
(16, 'Your trasanction status: success.', 8, 'View Transaction', 'emitra://paymentDetail?id=58d04b2844457', 'Payment', '2017-03-21 03:09:49'),
(17, 'Your trasanction status: success.', 12, 'View Transaction', 'emitra://paymentDetail?id=58d0557a7d013', 'Payment', '2017-03-21 03:09:49'),
(18, 'Your trasanction status: success.', 12, 'View Transaction', 'emitra://paymentDetail?id=58d0685db114f', 'Payment', '2017-03-21 03:09:49'),
(19, 'Your trasanction status: success.', 12, 'View Transaction', 'emitra://paymentDetail?id=58d069afbcb06', 'Payment', '2017-03-21 03:09:49'),
(20, 'Your trasanction status: success.', 12, 'View Transaction', 'emitra://paymentDetail?id=58d0701aaefd2', 'Payment', '2017-03-21 03:09:49'),
(21, 'Your trasanction status: success.', 13, 'View Transaction', 'emitra://paymentDetail?id=58d0786ea1450', 'Payment', '2017-03-21 03:09:49'),
(22, 'Your trasanction status: success.', 12, 'View Transaction', 'emitra://paymentDetail?id=58d07880e626d', 'Payment', '2017-03-21 03:09:49'),
(23, 'Your trasanction status: success.', 12, 'View Transaction', 'emitra://paymentDetail?id=58d07997a03a3', 'Payment', '2017-03-21 03:09:49'),
(24, 'Your trasanction status: success.', 12, 'View Transaction', 'emitra://paymentDetail?id=58d0852e6839d', 'Payment', '2017-03-21 03:09:49'),
(25, 'Your trasanction status: success.', 12, 'View Transaction', 'emitra://paymentDetail?id=58d08cd09b0dc', 'Payment', '2017-03-21 03:09:49'),
(26, 'Your trasanction status: success.', 12, 'View Transaction', 'emitra://paymentDetail?id=58d09e4cec836', 'Payment', '2017-03-21 03:31:53'),
(27, 'Your trasanction status: success.', 12, 'View Transaction', 'emitra://paymentDetail?id=58d0a4a056e6f', 'Payment', '2017-03-21 03:57:43'),
(28, 'Your trasanction status: success.', 12, 'View Transaction', 'emitra://paymentDetail?id=58d0a4e20d6a8', 'Payment', '2017-03-21 03:58:45');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_hindi` varchar(255) NOT NULL,
  `description_hindi` varchar(255) NOT NULL,
  `name_eng` varchar(255) NOT NULL,
  `description_eng` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sub_departments`
--

CREATE TABLE IF NOT EXISTS `sub_departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `department_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `sub_departments`
--

INSERT INTO `sub_departments` (`id`, `name`, `department_id`) VALUES
(1, 'Sub-Department 1.1', 1),
(2, 'Sub-Department 1.2', 1),
(3, 'Sub-Department 2.1', 2),
(4, 'Sub-Department 2.2', 2);

-- --------------------------------------------------------

--
-- Table structure for table `trasanctions`
--

CREATE TABLE IF NOT EXISTS `trasanctions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `prn` varchar(255) NOT NULL,
  `rpptxnid` varchar(255) NOT NULL,
  `responce` text NOT NULL,
  `payment_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `amount` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `trasanctions`
--

INSERT INTO `trasanctions` (`id`, `user_id`, `prn`, `rpptxnid`, `responce`, `payment_time`, `amount`) VALUES
(2, 13, '58d0786ea1450', '223066', 'Your trasanction status: success.', '2017-03-21 04:18:16', '931.00'),
(3, 12, '58d07880e626d', '223067', 'Your trasanction status: success.', '2017-03-21 04:18:19', '931.00'),
(4, 12, '58d07997a03a3', '223071', 'Your trasanction status: success.', '2017-03-21 04:18:21', '931.00'),
(5, 12, '58d0852e6839d', '223094', 'Your trasanction status: success.', '2017-03-21 04:18:23', '931.00'),
(6, 12, '58d08cd09b0dc', '223111', 'Your trasanction status: success.', '2017-03-21 04:18:24', '931.00'),
(7, 12, '58d09e4cec836', '223160', 'Your trasanction status: success.', '2017-03-21 04:18:26', '931.00'),
(8, 12, '58d0a4a056e6f', '223185', 'Your trasanction status: success.', '2017-03-21 04:18:29', '931.00'),
(9, 12, '58d0a4e20d6a8', '223187', 'Your trasanction status: success.', '2017-03-21 03:58:45', '931.00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL,
  `level_id` int(10) NOT NULL,
  `department_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `status`, `level_id`, `department_id`) VALUES
(1, 'Department-1 level-1', 'admin', '$2y$10$crvudmgJTW9D7b.vrHPNlOOdKck7oBw99jYQkVBBCUHWys5kFNtWS', 'Active', 1, 1),
(2, 'Department-1 level-2', 'd1level2', '$2y$10$h9lo/yCU8e3fh5Xg9OePX.YjkLLn1hg1ekEc2utFup4YcO9jME0Ay', 'Active', 2, 1),
(3, 'd1level3', 'd1level3', '$2y$10$orfVtWsM9dP0MtzRnsXR2emFwydFHQ3V91ezb2bmFBc9V.wA.3chu', 'Active', 3, 1),
(5, 'd2level1', 'd2level1', '$2y$10$crvudmgJTW9D7b.vrHPNlOOdKck7oBw99jYQkVBBCUHWys5kFNtWS', 'Active', 4, 2),
(6, 'd2level2', 'd2level2', '$2y$10$h9lo/yCU8e3fh5Xg9OePX.YjkLLn1hg1ekEc2utFup4YcO9jME0Ay', 'Active', 5, 2),
(7, 'd2level3', 'd2level3', '$2y$10$orfVtWsM9dP0MtzRnsXR2emFwydFHQ3V91ezb2bmFBc9V.wA.3chu', 'Active', 6, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
