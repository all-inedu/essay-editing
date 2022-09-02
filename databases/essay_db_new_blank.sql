-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 16, 2019 at 04:18 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `essay_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admins`
--

CREATE TABLE `tbl_admins` (
  `id_admin` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `role` varchar(10) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0:not active, 1:active, 2:deleted',
  `password` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admins`
--

INSERT INTO `tbl_admins` (`id_admin`, `full_name`, `email`, `address`, `role`, `status`, `password`, `created_at`, `update_at`) VALUES
(1, 'Admin', 'essay@all-inedu.com', 'Jl Panjang N0 36 Jakarta Barat', 'admins', 1, '$2y$10$//ILaDn3rYDWlWnLydW47Ok1FDF3w7VRe/PbHs8CgZJlEa4p9DDiK', '2019-08-23 07:09:48', '0000-00-00 00:00:00'),
(2, 'Hafidz Annur Fanany', 'hafidz.bdt@gmail.com', '', 'admins', 1, '$2y$10$//ILaDn3rYDWlWnLydW47Ok1FDF3w7VRe/PbHs8CgZJlEa4p9DDiK', '2019-08-23 07:09:53', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `id_category` int(2) NOT NULL,
  `category_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`id_category`, `category_name`) VALUES
(1, 'Essay'),
(2, 'Resume'),
(3, 'Cover Letter');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_clients`
--

CREATE TABLE `tbl_clients` (
  `id_clients` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `birthdate` date NOT NULL,
  `country` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `postal_code` varchar(6) NOT NULL,
  `address` text NOT NULL,
  `id_mentor` int(11) NOT NULL,
  `current_school` varchar(50) NOT NULL,
  `school_name` varchar(250) NOT NULL,
  `curriculum` varchar(50) NOT NULL,
  `year` int(4) NOT NULL,
  `image` varchar(250) NOT NULL,
  `activity` varchar(250) NOT NULL,
  `resume` varchar(250) NOT NULL,
  `quisioner` varchar(250) NOT NULL,
  `role` varchar(10) NOT NULL,
  `status` int(2) NOT NULL COMMENT '1:active, 2:deleted',
  `password` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_clients`
--

INSERT INTO `tbl_clients` (`id_clients`, `first_name`, `last_name`, `phone`, `email`, `birthdate`, `country`, `state`, `city`, `postal_code`, `address`, `id_mentor`, `current_school`, `school_name`, `curriculum`, `year`, `image`, `activity`, `resume`, `quisioner`, `role`, `status`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
(0, 'Essay', 'Students', '081111111111', 'essay-student@all-inedu.com', '1998-06-04', 'Indonesia', '', 'Jakarta Barat', '11530', 'JL Panjang No. 36 Jakarta Barat', 0, 'SMA', 'SMA N 1 Jakarta', '', 0, '', 'Activity(29-08-2019).docx', 'Resume(29-08-2019).docx', 'Quistionnaire(29-08-2019).docx', 'clients', 1, '$2y$10$//ILaDn3rYDWlWnLydW47Ok1FDF3w7VRe/PbHs8CgZJlEa4p9DDiK', '2019-09-09 07:29:45', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_editors`
--

CREATE TABLE `tbl_editors` (
  `id_editors` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `graduated_from` varchar(50) DEFAULT NULL,
  `major` varchar(250) NOT NULL,
  `address` text NOT NULL,
  `position` int(11) NOT NULL COMMENT '1:associate, 2:senior, 3:managing',
  `image` varchar(150) NOT NULL,
  `hours` int(11) NOT NULL,
  `average_rating` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1:active, 2:deleted',
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_editors`
--

INSERT INTO `tbl_editors` (`id_editors`, `first_name`, `last_name`, `phone`, `email`, `graduated_from`, `major`, `address`, `position`, `image`, `hours`, `average_rating`, `status`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Essay Editor', '1', '1234567890', 'essay-editor1@all-inedu.com', 'The University of Chicago', 'Computer Science', 'Jakarta Barat', 3, 'default.png', 0, 0, 1, '$2y$10$s.TucPgWfW4.ROU/rQ3X6OhlvIjyGw5uZXdafx/VKQdz5vUA3kOHm', '2019-08-29 01:59:02', '2019-08-29 01:59:02', '0000-00-00 00:00:00'),
(2, 'Essay Editor', '3', '1234567890', 'essay-editor3@all-inedu.com', 'University of Pennsylvania', 'Business', 'Jakarta Barat', 2, 'default.png', 0, 0, 1, '$2y$10$XmWnYqZ0PrMkHIBiEmMEmeEhz/q0QJ1fCPr0O0T0l/UDPwjWF8jO2', '2019-08-23 07:46:35', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_essay_clients`
--

CREATE TABLE `tbl_essay_clients` (
  `id_essay_clients` int(11) NOT NULL,
  `id_essay_prompt` int(11) DEFAULT '0',
  `id_transaction` int(11) NOT NULL,
  `id_program` int(2) NOT NULL,
  `id_univ` int(11) NOT NULL,
  `other_title` varchar(250) DEFAULT NULL,
  `other_desc` text,
  `email` varchar(50) NOT NULL,
  `mentors_mail` varchar(50) NOT NULL,
  `essay_deadline` datetime NOT NULL,
  `application_deadline` datetime NOT NULL,
  `number_of_words` int(11) NOT NULL,
  `attached_of_clients` varchar(50) NOT NULL,
  `notes_clients` text NOT NULL,
  `essay_rating` decimal(11,1) NOT NULL,
  `status_essay_clients` int(11) NOT NULL,
  `uploaded_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `completed_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_essay_editors`
--

CREATE TABLE `tbl_essay_editors` (
  `id_essay_editors` int(11) NOT NULL,
  `id_essay_clients` int(11) NOT NULL,
  `editors_mail` varchar(50) NOT NULL,
  `attached_of_editors` text NOT NULL,
  `work_duration` int(11) NOT NULL,
  `notes_editors` text NOT NULL,
  `status_essay_editors` int(11) NOT NULL,
  `uploaded_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_essay_feedback`
--

CREATE TABLE `tbl_essay_feedback` (
  `id` int(11) NOT NULL,
  `id_essay_clients` int(11) NOT NULL,
  `option1` int(11) NOT NULL,
  `option2` int(11) NOT NULL,
  `option3` int(11) NOT NULL,
  `option4` int(11) NOT NULL,
  `option5` int(11) NOT NULL,
  `option6` int(11) NOT NULL,
  `add_comments` text NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_essay_prompt`
--

CREATE TABLE `tbl_essay_prompt` (
  `id_essay_prompt` int(11) NOT NULL,
  `id_univ` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `notes` text NOT NULL,
  `status` int(1) NOT NULL COMMENT '1:active, 2:deleted',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_essay_prompt`
--

INSERT INTO `tbl_essay_prompt` (`id_essay_prompt`, `id_univ`, `title`, `description`, `notes`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 0, '', '', '', 0, '2019-09-06 04:14:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 3, 'Penn-specific Essays', 'How did you discover your intellectual and academic interests, and how will you explore them at the University of Pennsylvania? Please respond considering the specific undergraduate school you have selected. (300-450 words)', '', 1, '2019-08-23 08:17:58', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 3, 'Computer & Cognitive Science: Artificial Intelligence', 'Why are you interested in the Computer & Cognitive Science: Artificial Intelligence program at the University of Pennsylvania? (400-650 words)', '', 1, '2019-08-23 08:18:39', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 3, 'Huntsman: The Huntsman Program in International Studies and Business', 'The Huntsman Program supports the development of globally-minded scholars who become engaged citizens, creative innovators, and ethical leaders in the public, private, and non-profit sectors in the United States and internationally. What draws you to a dual-degree program in business and international studies, and how would you use what you learn to make a contribution to a global issue where business and international affairs intersect? (400-650 words)', '', 1, '2019-08-23 08:19:12', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 4, 'UChicago Supplement', 'How does the University of Chicago, as you know it now, satisfy your desire for a particular kind of learning, community, and future? Please address with some specificity your own wishes and how they relate to UChicago.', '', 1, '2019-09-06 04:14:09', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_essay_reject`
--

CREATE TABLE `tbl_essay_reject` (
  `id` int(11) NOT NULL,
  `id_essay_clients` int(11) NOT NULL,
  `editors_mail` varchar(50) NOT NULL,
  `notes` text NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_essay_revise`
--

CREATE TABLE `tbl_essay_revise` (
  `id` int(11) NOT NULL,
  `id_essay_clients` int(11) NOT NULL,
  `editors_mail` varchar(50) NOT NULL,
  `admin_mail` varchar(50) NOT NULL,
  `role` varchar(25) NOT NULL,
  `notes` text NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_essay_status`
--

CREATE TABLE `tbl_essay_status` (
  `id` int(11) NOT NULL,
  `id_essay_clients` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_essay_tags`
--

CREATE TABLE `tbl_essay_tags` (
  `id` int(11) NOT NULL,
  `id_essay_clients` int(11) NOT NULL,
  `id_topic` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mentors`
--

CREATE TABLE `tbl_mentors` (
  `id_mentors` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `graduated_from` varchar(50) DEFAULT NULL,
  `address` text NOT NULL,
  `is_mentor` int(11) NOT NULL COMMENT '0:false, 1:true',
  `status` int(11) NOT NULL COMMENT '1:active, 2:deleted',
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mentors`
--

INSERT INTO `tbl_mentors` (`id_mentors`, `first_name`, `last_name`, `phone`, `email`, `graduated_from`, `address`, `is_mentor`, `status`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
(0, 'Essay', 'Mentors', '', 'essay-mentor@all-inedu.com', NULL, '', 0, 1, '$2y$10$//ILaDn3rYDWlWnLydW47Ok1FDF3w7VRe/PbHs8CgZJlEa4p9DDiK', '2019-08-23 07:49:14', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_position_editors`
--

CREATE TABLE `tbl_position_editors` (
  `id_position` int(11) NOT NULL,
  `position_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_position_editors`
--

INSERT INTO `tbl_position_editors` (`id_position`, `position_name`) VALUES
(1, 'Associate Editor'),
(2, 'Senior Editor'),
(3, 'Managing Editor');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_programs`
--

CREATE TABLE `tbl_programs` (
  `id_program` int(2) NOT NULL,
  `program_name` varchar(255) NOT NULL,
  `id_category` int(2) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `minimum_word` int(11) NOT NULL,
  `maximum_word` int(11) NOT NULL,
  `completed_within` varchar(10) NOT NULL,
  `images` text NOT NULL,
  `status` int(1) NOT NULL COMMENT '1:active, 2:deleted',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_programs`
--

INSERT INTO `tbl_programs` (`id_program`, `program_name`, `id_category`, `description`, `price`, `discount`, `minimum_word`, `maximum_word`, `completed_within`, `images`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Essay Editing', 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, 0, 50, 100, '48', 'default.png', 1, '2019-08-23 08:02:44', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Essay Editing', 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, 0, 100, 300, '72', 'default.png', 1, '2019-08-23 08:03:43', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Essay Editing', 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, 0, 300, 500, '96', 'default.png', 1, '2019-08-23 08:04:32', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Essay Editing', 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, 0, 500, 700, '120', 'default.png', 1, '2019-08-23 08:04:52', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Resume Editing', 2, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, 0, 0, 0, '72', 'default.png', 1, '2019-08-23 08:05:37', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Cover Letter Editing', 3, 'dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, 0, 0, 0, '72', 'default.png', 1, '2019-08-23 08:07:01', '2019-08-23 08:07:01', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE `tbl_status` (
  `id` int(11) NOT NULL,
  `status_title` varchar(150) NOT NULL,
  `status_desc` text NOT NULL,
  `by` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_status`
--

INSERT INTO `tbl_status` (`id`, `status_title`, `status_desc`, `by`) VALUES
(0, 'Uploaded', 'Your essay has been uploaded.', 'Student/Mentor'),
(1, 'Assignment', 'Your essay has been assigned to editors.', 'System'),
(2, 'Processed', 'Your essay has been accepted & processed.', 'Editor'),
(3, 'Uploaded', 'Editor\'s essay has been uploaded.', 'Editor'),
(4, 'Canceled', 'Your essay has been canceled to be assigned to editors.', 'System'),
(5, 'Rejected', 'Your essay has been rejected.', 'Editor'),
(6, 'Revise', 'Editor\'s essay must be corrected.', 'System'),
(7, 'Completed', 'Editor\'s essay has been completed.', 'System'),
(8, 'Revised', 'Editor\'s essay has been revised', 'Editor');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tags`
--

CREATE TABLE `tbl_tags` (
  `id_topic` int(11) NOT NULL,
  `topic_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tags`
--

INSERT INTO `tbl_tags` (`id_topic`, `topic_name`) VALUES
(1, 'Why X School'),
(2, 'Contributions'),
(3, 'Diversity'),
(4, 'Inclusivity'),
(5, 'Talents/Achievements/Awards'),
(6, 'Leadership'),
(7, 'Why X major'),
(8, 'Favorite subject and why'),
(9, 'Research project '),
(10, 'Extracurricular/hobbies'),
(11, 'Challenge/Obstacle'),
(12, 'Overcoming tragedy'),
(13, 'Showing grace under pressure '),
(14, 'Share your story'),
(15, 'The pursuit of happiness'),
(16, 'Travel '),
(17, 'Influential film/exhibit/concert/lecture'),
(18, 'Influential recreational reading'),
(20, 'Responding to a quote'),
(21, 'Learning from obstacles'),
(22, 'Challenging a belief'),
(23, 'Challenging authority '),
(24, 'Solving a problem'),
(25, 'Mediating conflict '),
(26, 'Community service/building'),
(27, 'Important socioal/cultural issues'),
(28, 'Making a difference '),
(29, 'Personal growth'),
(30, 'Advice for the youth'),
(31, 'The role model'),
(32, 'What captivates you?'),
(33, 'Topic of your choice'),
(34, 'Interdisciplinary study ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_token`
--

CREATE TABLE `tbl_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `activated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaction`
--

CREATE TABLE `tbl_transaction` (
  `id` int(11) NOT NULL,
  `transaction_code` varchar(50) NOT NULL,
  `email` varchar(250) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `amount` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `upload_file` text NOT NULL,
  `created_at` datetime NOT NULL,
  `uploaded_at` datetime NOT NULL,
  `verified_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaction_detail`
--

CREATE TABLE `tbl_transaction_detail` (
  `id` int(11) NOT NULL,
  `transaction_code` varchar(50) NOT NULL,
  `id_program` int(2) NOT NULL,
  `qty` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_universities`
--

CREATE TABLE `tbl_universities` (
  `id_univ` int(11) NOT NULL,
  `university_name` varchar(50) NOT NULL,
  `website` varchar(50) NOT NULL,
  `univ_email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `photo` varchar(128) NOT NULL,
  `address` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1:active, 2:deleted',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_universities`
--

INSERT INTO `tbl_universities` (`id_univ`, `university_name`, `website`, `univ_email`, `phone`, `photo`, `address`, `country`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(0, '- Other -', '', '', '', 'default.png', '', '', 2, '2019-08-23 07:50:24', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1, 'New York University', 'https://www.nyu.edu', 'registrar@nyu.edu', '(212) 998-1212', 'nyu.jpg', '70 Washington Square South \r\nNew York, NY, 10012', 'America', 1, '2019-08-23 07:04:39', '2019-07-02 09:02:10', '0000-00-00 00:00:00'),
(2, 'The University of Melbourne', 'https://www.unimelb.edu.au', '', '+(61 3) 9035 5511', 'unimleb.jpg', 'Campus Parkville - Grattan Street, \r\nParkville, Vi', 'Australia', 1, '2019-08-23 07:04:39', '2019-07-02 09:01:51', '0000-00-00 00:00:00'),
(3, 'University of Pennsylvania', 'https://www.upenn.edu', '', '(215) 898-5000', 'penn-logo.png', 'Philadelphia, PA 19104, USA', 'America', 1, '2019-08-23 07:04:39', '2019-07-02 09:01:36', '0000-00-00 00:00:00'),
(4, 'The University of Chicago', 'https://www.uchicago.edu', 'infocenter@uchicago.edu', '773.702.1234', 'uChicago.png', 'Edward H. Levi Hall\r\n5801 South Ellis Avenue\r\nChic', 'USA', 1, '2019-08-23 07:04:39', '2019-07-02 09:02:56', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admins`
--
ALTER TABLE `tbl_admins`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `tbl_clients`
--
ALTER TABLE `tbl_clients`
  ADD PRIMARY KEY (`id_clients`);

--
-- Indexes for table `tbl_editors`
--
ALTER TABLE `tbl_editors`
  ADD PRIMARY KEY (`id_editors`),
  ADD KEY `pos` (`position`);

--
-- Indexes for table `tbl_essay_clients`
--
ALTER TABLE `tbl_essay_clients`
  ADD PRIMARY KEY (`id_essay_clients`);

--
-- Indexes for table `tbl_essay_editors`
--
ALTER TABLE `tbl_essay_editors`
  ADD PRIMARY KEY (`id_essay_editors`),
  ADD KEY `tbl_essay_editors_ibfk_1` (`id_essay_clients`);

--
-- Indexes for table `tbl_essay_feedback`
--
ALTER TABLE `tbl_essay_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_essay_prompt`
--
ALTER TABLE `tbl_essay_prompt`
  ADD PRIMARY KEY (`id_essay_prompt`);

--
-- Indexes for table `tbl_essay_reject`
--
ALTER TABLE `tbl_essay_reject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_essay_revise`
--
ALTER TABLE `tbl_essay_revise`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_essay_status`
--
ALTER TABLE `tbl_essay_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_essay_tags`
--
ALTER TABLE `tbl_essay_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_mentors`
--
ALTER TABLE `tbl_mentors`
  ADD PRIMARY KEY (`id_mentors`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tbl_position_editors`
--
ALTER TABLE `tbl_position_editors`
  ADD PRIMARY KEY (`id_position`);

--
-- Indexes for table `tbl_programs`
--
ALTER TABLE `tbl_programs`
  ADD PRIMARY KEY (`id_program`);

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_tags`
--
ALTER TABLE `tbl_tags`
  ADD PRIMARY KEY (`id_topic`);

--
-- Indexes for table `tbl_token`
--
ALTER TABLE `tbl_token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_transaction_detail`
--
ALTER TABLE `tbl_transaction_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_universities`
--
ALTER TABLE `tbl_universities`
  ADD PRIMARY KEY (`id_univ`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admins`
--
ALTER TABLE `tbl_admins`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `id_category` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_editors`
--
ALTER TABLE `tbl_editors`
  MODIFY `id_editors` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_essay_clients`
--
ALTER TABLE `tbl_essay_clients`
  MODIFY `id_essay_clients` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_essay_editors`
--
ALTER TABLE `tbl_essay_editors`
  MODIFY `id_essay_editors` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_essay_feedback`
--
ALTER TABLE `tbl_essay_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_essay_prompt`
--
ALTER TABLE `tbl_essay_prompt`
  MODIFY `id_essay_prompt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_essay_reject`
--
ALTER TABLE `tbl_essay_reject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_essay_revise`
--
ALTER TABLE `tbl_essay_revise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_essay_status`
--
ALTER TABLE `tbl_essay_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_essay_tags`
--
ALTER TABLE `tbl_essay_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_programs`
--
ALTER TABLE `tbl_programs`
  MODIFY `id_program` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_tags`
--
ALTER TABLE `tbl_tags`
  MODIFY `id_topic` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_token`
--
ALTER TABLE `tbl_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_transaction_detail`
--
ALTER TABLE `tbl_transaction_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_universities`
--
ALTER TABLE `tbl_universities`
  MODIFY `id_univ` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_editors`
--
ALTER TABLE `tbl_editors`
  ADD CONSTRAINT `pos` FOREIGN KEY (`position`) REFERENCES `tbl_position_editors` (`id_position`);

--
-- Constraints for table `tbl_essay_editors`
--
ALTER TABLE `tbl_essay_editors`
  ADD CONSTRAINT `tbl_essay_editors_ibfk_1` FOREIGN KEY (`id_essay_clients`) REFERENCES `tbl_essay_clients` (`id_essay_clients`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
