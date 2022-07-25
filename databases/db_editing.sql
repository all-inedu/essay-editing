-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2022 at 07:34 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u5794939_editing`
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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `birthdate` date NOT NULL,
  `country` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `postal_code` varchar(6) NOT NULL,
  `address` text NOT NULL,
  `id_mentor` char(7) NOT NULL,
  `current_school` varchar(50) NOT NULL,
  `school_name` varchar(250) NOT NULL,
  `curriculum` varchar(50) NOT NULL,
  `year` int(4) NOT NULL,
  `image` varchar(250) NOT NULL,
  `personal_brand` text NOT NULL,
  `interests` text NOT NULL,
  `personalities` text NOT NULL,
  `resume` varchar(250) NOT NULL,
  `questionnaire` varchar(250) NOT NULL,
  `others` varchar(250) NOT NULL,
  `role` varchar(10) NOT NULL,
  `status` int(2) NOT NULL COMMENT '1:active, 2:deleted',
  `password` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_clients`
--

INSERT INTO `tbl_clients` (`id_clients`, `first_name`, `last_name`, `phone`, `email`, `birthdate`, `country`, `state`, `city`, `postal_code`, `address`, `id_mentor`, `current_school`, `school_name`, `curriculum`, `year`, `image`, `personal_brand`, `interests`, `personalities`, `resume`, `questionnaire`, `others`, `role`, `status`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
(0, 'Student', 'Dummy', '123456789', 'student.dummy@example.com', '2000-01-31', 'Indonesia', 'DKI Jakarta', 'Jakarta', '11630', 'Jl Jeruk kembar blok Q9 no. 15', 'MT-0001', '', '', '', 0, '', '', '', '', '', '', '', '', 1, '$2y$10$W/aX9r0YpzH/3IkJTjEuy.WV6eTeIkuBtX9fRd71f7WCcEqBJtIXC', '2022-07-25 05:28:39', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_editors`
--

CREATE TABLE `tbl_editors` (
  `id_editors` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `graduated_from` varchar(50) DEFAULT NULL,
  `major` varchar(250) NOT NULL,
  `address` text NOT NULL,
  `about_me` text NOT NULL,
  `position` int(11) NOT NULL COMMENT '1:associate, 2:senior, 3:managing',
  `image` varchar(150) NOT NULL,
  `hours` int(11) NOT NULL,
  `average_rating` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1:active, 2:deleted',
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_editors`
--

INSERT INTO `tbl_editors` (`id_editors`, `first_name`, `last_name`, `phone`, `email`, `graduated_from`, `major`, `address`, `about_me`, `position`, `image`, `hours`, `average_rating`, `status`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Editor', 'Dummy', '12345678', 'editor.dummy@example.com', 'BA, UC Berkeley', 'Space Travel', 'Jl Jeruk Kembar Blok Q9 no. 15', 'Hello', 3, 'default.png', 0, 0, 1, '$2y$10$W/aX9r0YpzH/3IkJTjEuy.WV6eTeIkuBtX9fRd71f7WCcEqBJtIXC', '2022-07-25 04:59:08', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_essay_clients`
--

CREATE TABLE `tbl_essay_clients` (
  `id_essay_clients` int(11) NOT NULL,
  `id_transaction` int(11) NOT NULL,
  `id_program` int(2) NOT NULL,
  `id_univ` int(11) NOT NULL,
  `id_editors` int(11) DEFAULT NULL,
  `essay_title` varchar(250) DEFAULT NULL,
  `essay_prompt` text NOT NULL,
  `id_clients` int(11) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `mentors_mail` varchar(50) NOT NULL,
  `essay_deadline` datetime NOT NULL,
  `application_deadline` datetime NOT NULL,
  `number_of_words` int(11) NOT NULL,
  `attached_of_clients` text NOT NULL,
  `notes_clients` text NOT NULL,
  `essay_rating` decimal(11,1) NOT NULL,
  `status_essay_clients` int(11) NOT NULL,
  `status_read` int(11) NOT NULL,
  `status_read_editor` int(11) NOT NULL,
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
  `managing_file` text NOT NULL,
  `work_duration` int(11) NOT NULL,
  `notes_editors` text NOT NULL,
  `status_essay_editors` int(11) NOT NULL,
  `read` int(11) NOT NULL,
  `uploaded_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `file` varchar(50) NOT NULL,
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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  `id_mentors` char(7) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `graduated_from` varchar(50) DEFAULT NULL,
  `address` text NOT NULL,
  `is_mentor` int(11) NOT NULL COMMENT '0:false, 1:true',
  `status` int(11) NOT NULL COMMENT '1:active, 2:deleted',
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mentors`
--

INSERT INTO `tbl_mentors` (`id_mentors`, `first_name`, `last_name`, `phone`, `email`, `graduated_from`, `address`, `is_mentor`, `status`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
('MT-0001', 'Mentor', 'Dummy', '12345678', 'mentor.dummy@example.com', NULL, 'Jl Kebon Jeruk Blok Q9 no. 15', 0, 1, '$2y$10$W/aX9r0YpzH/3IkJTjEuy.WV6eTeIkuBtX9fRd71f7WCcEqBJtIXC', '2022-07-25 04:41:29', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_programs`
--

INSERT INTO `tbl_programs` (`id_program`, `program_name`, `id_category`, `description`, `price`, `discount`, `minimum_word`, `maximum_word`, `completed_within`, `images`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Essay Editing', 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, 0, 50, 100, '48', 'default.png', 1, '2019-08-23 08:02:44', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Resume Editing', 2, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, 0, 0, 0, '72', 'default.png', 1, '2022-07-25 05:33:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Cover Letter Editing', 3, 'dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, 0, 0, 0, '72', 'default.png', 1, '2022-07-25 05:33:19', '2019-08-23 08:07:01', '0000-00-00 00:00:00');

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
(1, 'Assigned', 'Your essay has been assigned to editors.', 'System'),
(2, 'Ongoing', 'Your essay has been accepted & processed.', 'Editor'),
(3, 'Submitted', 'Editor\'s essay has been uploaded.', 'Editor'),
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
  `university_name` varchar(100) NOT NULL,
  `website` varchar(50) NOT NULL,
  `univ_email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `photo` varchar(128) NOT NULL,
  `address` text NOT NULL,
  `country` varchar(50) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1:active, 2:deleted',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_universities`
--

INSERT INTO `tbl_universities` (`id_univ`, `university_name`, `website`, `univ_email`, `phone`, `photo`, `address`, `country`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Arizona State University', '', '', '', 'default.png', 'Tempe, AZ', 'US', 1, '2010-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Auburn University', '', '', '', 'default.png', 'Auburn, AL', 'US', 1, '2010-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Bard College', '', '', '', 'default.png', 'Annandale-on-Hudson, NY', 'US', 1, '2010-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Baylor University', '', '', '', 'default.png', 'Waco, TX', 'US', 1, '2010-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Bentley University', '', '', '', 'default.png', 'Waltham, MA', 'US', 1, '2010-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Boston University', '', '', '', 'default.png', 'Boston, MA', 'US', 1, '2010-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Brandeis University', '', '', '', 'default.png', 'Waltham, MA', 'US', 1, '2010-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Brown University', '', '', '', 'default.png', 'Providence, RI', 'US', 1, '2010-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'California Institute of Technology', 'https://www.caltech.edu', '', '+1 626-395-6811', 'caltech.png', 'Pasadena, CA', 'US', 1, '2010-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Carnegie Mellon University', '', '', '', 'default.png', 'Pittsburg,PA', 'US', 1, '2010-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Colorado School of Mines', '', '', '', 'default.png', 'Golden, CA', 'US', 1, '2010-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Columbia University', 'https://www.columbia.edu', '', '+1 212-854-1754', 'colombia.png', 'New York, NY', 'US', 1, '2010-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'Cornell University', 'https://www.cornell.edu', '', '+1 607-254-4636', 'cornell.png', 'Ithaca, NY', 'US', 1, '2010-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'Drexel University', '', '', '', 'default.png', 'Philadelphia, PA', 'US', 1, '2010-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'Duke University', '', '', '', 'default.png', 'Durham, NC', 'US', 1, '2010-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'Emory University', '', '', '', 'default.png', 'Atlanta, GA', 'US', 1, '2010-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'Florida State University', '', '', '', 'default.png', 'Tallahassee, FL', 'US', 1, '2010-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'Fordham University', '', '', '', 'default.png', 'New York, NY', 'US', 1, '2010-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'Georgia State University', '', '', '', 'default.png', 'Atlanta, GA', 'US', 1, '2010-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'Harvard University', 'https://www.harvard.edu', '', '+1 617-495-1000', 'harvard.png', 'Cambridge, MA', 'US', 1, '2010-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'Indiana University - Bloomington', '', '', '', 'default.png', 'Bloomington, IN', 'US', 1, '2010-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'Iowa State University', '', '', '', 'default.png', 'Ames, IA', 'US', 1, '2010-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'Johns Hopkins University', '', '', '', 'default.png', 'Baltimore, MD', 'US', 1, '2010-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 'Massachusetts Institute of Technology ', 'http://web.mit.edu', '', '+1 617-253-1000', 'mit.jpg', 'Cambridge, MA', 'US', 1, '2010-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 'Michigan State University', '', '', '', 'default.png', 'East Lansing, MI', 'US', 1, '2010-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 'Northwestern University', '', '', '', 'default.png', 'Evanstone, IL', 'US', 1, '2010-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 'Northwestern University', '', '', '', 'default.png', 'Evanstone, IL', 'US', 2, '2019-10-22 04:05:19', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 'NYU (New York University)', 'https://www.nyu.edu', '', '+1 212-998-1212', 'nyu.png', 'New York, NY', 'US', 1, '2010-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 'Ohio State University', '', '', '', 'default.png', 'Columbus, OH', 'US', 1, '2010-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 'Oregon State University', '', '', '', 'default.png', 'Corvallis,OR', 'US', 1, '2010-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 'Pennsylvania State University', '', '', '', 'default.png', 'University park, PA', 'US', 1, '2010-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 'Pratt Institute', '', '', '', 'default.png', 'Brooklyn, NY', 'US', 1, '2010-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 'Princeton University', 'https://www.princeton.edu', '', '+1 609-258-3000', 'pricenton.png', 'Princeton, NJ', 'US', 1, '2010-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 'Purdue University - West Lafayette', 'https://www.purdue.edu', '', '+1 765-494-4600', 'purdue.png', 'West Lafayette, IN', 'US', 1, '2010-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 'Rice University', '', '', '', 'default.png', 'Houston TX', 'US', 1, '2010-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 'Stanford University', 'https://www.stanford.edu', '', '+1 650-723-2300', 'stanford.png', 'Stanford, CA', 'US', 1, '2010-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 'Temple University', '', '', '', 'default.png', 'Philadelphia, PA', 'US', 1, '2010-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 'Tufts University', '', '', '', 'default.png', 'Medford, MA', 'US', 1, '2010-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 'UC Berkeley', 'https://www.berkeley.edu', '', '+1 510-642-6000', 'ucberkeley.png', 'Berkeley, CA', 'US', 1, '2010-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 'UC Davis', '', '', '', 'default.png', 'Davis, CA', 'US', 1, '2010-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 'UC Irvine', '', '', '', 'default.png', 'Irvine, CA', 'US', 1, '2010-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 'UC San Diego', 'https://www.ucsd.edu', '', '+1 858-534-2230', 'ucsd.png', 'La Jolla, CA', 'US', 1, '2010-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 'UC Santa Barbara', '', '', '', 'default.png', 'Santa Barbara, CA', 'US', 1, '2010-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 'UCLA (University of California - Los Angeles)', 'http://www.ucla.edu', '', '+1 310-825-4321', 'ucla1.png', 'LA, CA', 'US', 1, '2010-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 'UIUC (University of illinois - Urbana Champaign)', 'https://illinois.edu', '', '+1 217-333-1000', 'illinois.png', 'Champaign, IL', 'US', 1, '2010-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 'UNC - Chapel Hill', '', '', '', 'default.png', 'Chapel Hill, NC', 'US', 1, '2010-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 'University of Arizona', '', '', '', 'default.png', 'Tucson, AZ', 'US', 1, '2010-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 'University of Chicago', 'https://www.uchicago.edu', 'infocenter@uchicago.edu', '+1 773-702-1234', 'chicago.png', 'Edward H. Levi Hall 5801 South Ellis Avenue Chi', 'US', 1, '2010-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 'University of Colorado - Boulder', '', '', '', 'default.png', 'Boulder, CO', 'US', 1, '2010-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 'University of Florida', '', '', '', 'default.png', 'Gainesville, FL', 'US', 1, '2010-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 'University of Miami', '', '', '', 'default.png', 'Coral Gables, FL', 'US', 1, '2010-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, 'University of Michigan - Ann Arbor', 'https://umich.edu', '', '+1 734-764-1817', 'michiganlogo.jpg', 'Ann Arbor, MI', 'US', 1, '2010-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 'University of Minnesota - Twin cities', '', '', '', 'default.png', 'Minneapolis, MN', 'US', 1, '2010-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, 'University of Notre Dame', '', '', '', 'default.png', 'Notre Dame, IN', 'US', 1, '2010-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, 'University of Oklahoma', '', '', '', 'default.png', 'Norman, OK', 'US', 1, '2010-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, 'University of Oregon', '', '', '', 'default.png', 'Eugene, OR', 'US', 1, '2010-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, 'University of Pennsylvania', 'https://www.upenn.edu', '', '+1 215-898-5000', 'penn-logo.png', 'Philadelphia, PA', 'US', 1, '2010-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, 'University of San Diego', '', '', '', 'default.png', 'San Diego, CA', 'US', 1, '2010-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, 'University of San Francisco', '', '', '', 'default.png', 'San Francisco, CA', 'US', 1, '2010-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, 'University of Texas - Austin (UT Austin)', 'https://www.utexas.edu', '', '+1 512-471-3434', 'utexas.png', 'Austin,TX', 'US', 1, '2010-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, 'University of Virginia', '', '', '', 'default.png', 'Charlottesville, VA', 'US', 1, '2010-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, 'University of Washington', 'https://www.washington.edu ', '', '', 'washington.png', 'Seattle, WA', 'US', 1, '2010-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, 'University of Wisconsin Madison', 'https://www.wisc.edu', '', '+1 608-263-2400', 'wisc.png', 'Madison, WI', 'US', 1, '2010-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, 'USC (University of Southern California)', '', '', '', 'default.png', 'LA, CA', 'US', 1, '2010-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, 'Virginia Tech', '', '', '', 'default.png', 'Blacksburg,VA', 'US', 1, '2010-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, 'Washington State University', '', '', '', 'default.png', 'Pullman, WA', 'US', 1, '2010-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(67, 'Yale University', 'https://www.yale.edu', '', '+1 203-432-4771', 'yale.png', 'New Haven, CT', 'US', 1, '2010-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, 'University of Oxford', '', '', '', 'default.png', 'Oxford', 'UK', 1, '2011-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, 'University of Cambridge', '', '', '', 'default.png', 'Cambridge', 'UK', 1, '2011-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, 'Imperial College London', '', '', '', 'default.png', 'London', 'UK', 1, '2012-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, 'University College London', '', '', '', 'default.png', 'London', 'UK', 1, '2012-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, 'University of Edinburgh', '', '', '', 'default.png', 'Edinburgh, Scotland', 'UK', 1, '2013-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(73, 'King\'s College London', '', '', '', 'default.png', 'London', 'UK', 1, '2013-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(74, 'University of Manchester', '', '', '', 'default.png', 'Manchester', 'UK', 1, '2014-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, 'University of Bristol', '', '', '', 'default.png', 'Bristol', 'UK', 1, '2014-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, 'University of Southampton', '', '', '', 'default.png', 'Southampton', 'UK', 1, '2015-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, 'University of Glasgow', '', '', '', 'default.png', 'Glasgow, Scotland', 'UK', 1, '2015-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(78, 'University of Birmingham', '', '', '', 'default.png', 'Birmingham', 'UK', 1, '2016-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(79, 'Queen Mary, University of London', '', '', '', 'default.png', 'London', 'UK', 1, '2016-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(80, 'University of Liverpool', '', '', '', 'default.png', 'Liverpool', 'UK', 1, '2017-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(81, 'University of Sheffield', '', '', '', 'default.png', 'Sheffield', 'UK', 1, '2017-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(82, 'University of Warwick', '', '', '', 'default.png', 'Conventry', 'UK', 1, '2018-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(83, 'University of Nottingham', '', '', '', 'default.png', 'Nottingham', 'UK', 1, '2018-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(84, 'University of Leeds', '', '', '', 'default.png', 'Leeds', 'UK', 1, '2019-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(85, 'University of Exeter', '', '', '', 'default.png', 'Exeter, Devon', 'UK', 1, '2019-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(86, 'Cardiff University', '', '', '', 'default.png', 'Cardiff, Wales', 'UK', 1, '2020-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(87, 'University of Sussex', '', '', '', 'default.png', 'Brighton', 'UK', 1, '2020-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(88, 'École Polytechnique Federale of Lausanne', '', '', '', 'default.png', 'Lausanne', 'Switzerland', 2, '2019-10-08 05:29:26', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(89, 'Swiss Federal Institute of Technology Zurich', '', '', '', 'default.png', 'Zurich', 'Switzerland', 2, '2019-10-08 05:29:26', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(90, 'University of Basel', '', '', '', 'default.png', 'Basel', 'Switzerland', 2, '2019-10-08 05:29:26', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(91, 'University of Bern', '', '', '', 'default.png', 'Bern', 'Switzerland', 2, '2019-10-08 05:29:26', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(92, 'University of Fribourg', '', '', '', 'default.png', 'Fribourg', 'Switzerland', 2, '2019-10-08 05:29:26', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(93, 'University of Geneva', '', '', '', 'default.png', 'Geneva', 'Switzerland', 2, '2019-10-08 05:29:26', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(94, 'University of Lausanne', '', '', '', 'default.png', 'Lausanne', 'Switzerland', 2, '2019-10-08 05:29:26', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(95, 'University of Neuchatel', '', '', '', 'default.png', 'Neuchatel', 'Switzerland', 2, '2019-10-08 05:29:26', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(96, 'University of St Gallen', '', '', '', 'default.png', 'St Gallen', 'Switzerland', 2, '2019-10-08 05:29:26', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(97, 'University of Zurich', '', '', '', 'default.png', 'Zurich', 'Switzerland', 2, '2019-10-08 05:29:26', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(98, 'Chalmers University of Technology', '', '', '', 'default.png', 'Gothenburg', 'Sweden', 2, '2019-10-08 05:29:38', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(99, 'Karolinska Institute', '', '', '', 'default.png', 'Stockholm', 'Sweden', 2, '2019-10-08 05:29:38', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(100, 'Linköping University', '', '', '', 'default.png', 'Linköping', 'Sweden', 2, '2019-10-08 05:29:38', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(101, 'Lund University', '', '', '', 'default.png', 'Lund', 'Sweden', 2, '2019-10-08 05:29:38', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(102, 'Royal Institute of Technology', '', '', '', 'default.png', 'Stockholm', 'Sweden', 2, '2019-10-08 05:29:38', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(103, 'Stockholm University', '', '', '', 'default.png', 'Stockholm', 'Sweden', 2, '2019-10-08 05:29:38', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(104, 'Swedish University of Agricultural Sciences', '', '', '', 'default.png', 'Uppsala', 'Sweden', 2, '2019-10-08 05:29:38', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(105, 'Umeå University', '', '', '', 'default.png', 'Umeå', 'Sweden', 2, '2019-10-08 05:29:38', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(106, 'University of Gothenburg', '', '', '', 'default.png', 'Gothenburg', 'Sweden', 2, '2019-10-08 05:29:38', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(107, 'Uppsala University', '', '', '', 'default.png', 'Uppsala', 'Sweden', 2, '2019-10-08 05:29:38', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(108, 'NTU (Nanyang Technological University)', '', '', '', 'default.png', 'Singapore', 'Singapore', 1, '2010-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(109, 'NUS (National University of Singapore)', '', '', '', 'default.png', 'Singapore', 'Singapore', 1, '2010-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(110, 'Hanyang University', '', '', '', 'default.png', 'Seoul', 'Korea', 1, '2019-10-08 07:44:28', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(111, 'Korea Advanced Institute of Science and Technology', '', '', '', 'default.png', 'Daejeon', 'Korea', 1, '2019-10-08 07:44:28', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(112, 'Korea University', '', '', '', 'default.png', 'Seoul', 'Korea', 1, '2019-10-08 07:44:28', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(113, 'Kyung Hee University', '', '', '', 'default.png', 'Seoul', 'Korea', 1, '2019-10-08 07:44:28', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(114, 'Kyungpook National University', '', '', '', 'default.png', 'Daegu', 'Korea', 1, '2019-10-08 07:44:28', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(115, 'Pohang University of Science and Technology', '', '', '', 'default.png', 'Pohang, Gyeongbuk', 'Korea', 1, '2019-10-08 07:44:28', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(116, 'Seoul National University', '', '', '', 'default.png', 'Seoul', 'Korea', 1, '2019-10-08 07:44:28', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(117, 'Sungkyunkwan University', '', '', '', 'default.png', 'Seoul', 'Korea', 1, '2019-10-08 07:44:28', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(118, 'Ulsan National Institute of Science & Technology', '', '', '', 'default.png', 'Ulsan', 'Korea', 1, '2019-10-08 07:44:28', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(119, 'Yonsei University', '', '', '', 'default.png', 'Seoul', 'Korea', 1, '2019-10-08 07:44:28', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(120, 'Hokkaido University', '', '', '', 'default.png', 'Sapporo, Hokkaido', 'Japan', 2, '2019-10-08 05:26:12', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(121, 'Kyoto University', '', '', '', 'default.png', 'Kyoto', 'Japan', 2, '2019-10-08 05:26:12', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(122, 'Kyushu University', '', '', '', 'default.png', 'Fukuoka', 'Japan', 2, '2019-10-08 05:26:12', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(123, 'Nagoya University', '', '', '', 'default.png', 'Nagoya, Aichi', 'Japan', 2, '2019-10-08 05:26:12', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(124, 'Osaka University', '', '', '', 'default.png', 'Osaka', 'Japan', 2, '2019-10-08 05:26:12', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(125, 'Tohoku University', '', '', '', 'default.png', 'Sendai, Miyagi', 'Japan', 2, '2019-10-08 05:26:12', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(126, 'Tokyo Institute of Technology', '', '', '', 'default.png', 'Tokyo', 'Japan', 2, '2019-10-08 05:26:12', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(127, 'University of Tokyo', '', '', '', 'default.png', 'Tokyo', 'Japan', 2, '2019-10-08 05:26:12', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(128, 'University of Tsukuba', '', '', '', 'default.png', 'Tsukuba, Ibaraki', 'Japan', 2, '2019-10-08 05:26:12', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(129, 'Waseda University', '', '', '', 'default.png', 'Tokyo', 'Japan', 2, '2019-10-08 05:26:12', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(130, 'Chinese University Hong Kong', '', '', '', 'default.png', 'Shatin, New Territories', 'Hong Kong', 1, '2019-10-08 06:24:03', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(131, 'City University Hong Kong', '', '', '', 'default.png', 'Kowloon, Hong Kong', 'Hong Kong', 1, '2019-10-08 06:24:03', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(132, 'HKUST', '', '', '', 'default.png', 'Hong Kong', 'Hong Kong', 1, '2019-10-08 06:24:03', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(133, 'Hong Kong Polytechnic University', '', '', '', 'default.png', 'Kowloon, Hong Kong', 'Hong Kong', 1, '2019-10-08 06:24:03', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(134, 'Hong Kong University', '', '', '', 'default.png', 'Pok Fu Lam, Hong Kong', 'Hong Kong', 1, '2019-10-08 06:24:03', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(135, 'University of Munich', '', '', '', 'default.png', 'Munich', 'Germany', 2, '2019-10-08 05:28:19', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(136, 'Heidelberg University', '', '', '', 'default.png', 'Heidelberg', 'Germany', 2, '2019-10-08 05:28:19', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(137, 'Technical University of Munich', '', '', '', 'default.png', 'Munich', 'Germany', 2, '2019-10-08 05:28:19', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(138, 'Humboldt-Universität zu Berlin', '', '', '', 'default.png', 'Berlin', 'Germany', 2, '2019-10-08 05:28:19', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(139, 'Unversity of Bonn', '', '', '', 'default.png', 'Bonn', 'Germany', 2, '2019-10-08 05:28:19', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(140, 'Freie Universität Berlin', '', '', '', 'default.png', 'Berlin', 'Germany', 2, '2019-10-08 05:28:19', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(141, 'University of Göttingen', '', '', '', 'default.png', 'Göttingen', 'Germany', 2, '2019-10-08 05:28:19', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(142, 'University of Hamburg', '', '', '', 'default.png', 'Hamburg', 'Germany', 2, '2019-10-08 05:28:19', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(143, 'Eberhard Karls University, Tübingen', '', '', '', 'default.png', 'Tübingen', 'Germany', 2, '2019-10-08 05:28:19', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(144, 'University of Freiburg', '', '', '', 'default.png', 'Freiburg', 'Germany', 2, '2019-10-08 05:28:19', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(145, 'Universite Paris Saclay', '', '', '', 'default.png', 'Saint-Aubin', 'France', 2, '2019-10-08 05:28:04', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(146, 'Universite Sorbonne Paris Cite', '', '', '', 'default.png', 'Paris', 'France', 2, '2019-10-08 05:28:04', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(147, 'PSL Research University Paris ', '', '', '', 'default.png', 'Paris', 'France', 2, '2019-10-08 05:28:04', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(148, 'Communaute Universite Grenoble Alpes', '', '', '', 'default.png', 'Saint-Martin-d\'Heres', 'France', 2, '2019-10-08 05:28:04', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(149, 'Universite de Lyon', '', '', '', 'default.png', 'Lyon', 'France', 2, '2019-10-08 05:28:04', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(150, 'University of Aix-Marseille', '', '', '', 'default.png', 'Marseille', 'France', 2, '2019-10-08 05:28:04', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(151, 'Universite Federale Toulouse Midi-Pyrenees', '', '', '', 'default.png', 'Toulouse', 'France', 2, '2019-10-08 05:28:04', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(152, 'University of Strasbourg', '', '', '', 'default.png', 'Strasbourg', 'France', 2, '2019-10-08 05:28:04', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(153, 'Communaute d\'Universites et Etablissements d\'Aquitaine ', '', '', '', 'default.png', 'Bordeaux', 'France', 2, '2019-10-08 05:28:04', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(154, 'Languedoc-Roussillon Universites ', '', '', '', 'default.png', 'Montpellier', 'France', 2, '2019-10-08 05:28:04', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(155, 'Fudan University', '', '', '', 'default.png', 'Shanghai', 'China', 1, '2019-10-08 07:44:39', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(156, 'Harbin Institute of Technology', '', '', '', 'default.png', 'Harbin, Heilongjiang', 'China', 1, '2019-10-08 07:44:39', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(157, 'Huazhong University of Science and Technology', '', '', '', 'default.png', 'Wuhan, Hubei', 'China', 1, '2019-10-08 07:44:39', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(158, 'Nanjing University', '', '', '', 'default.png', 'Nanjing, Jiangsu', 'China', 1, '2019-10-08 07:44:39', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(159, 'Peking University', '', '', '', 'default.png', 'Beijing', 'China', 1, '2019-10-08 07:44:39', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(160, 'Shanghai Jiao Tong University', '', '', '', 'default.png', 'Shanghai', 'China', 1, '2019-10-08 07:44:39', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(161, 'Sun Yat-sen University', '', '', '', 'default.png', 'Guangzhou, Guangdong', 'China', 1, '2019-10-08 07:44:39', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(162, 'Tsinghua University', '', '', '', 'default.png', 'Beijing', 'China', 1, '2019-10-08 07:44:39', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(163, 'University of Science and Technology of China', '', '', '', 'default.png', 'Hefei, Anhui', 'China', 1, '2019-10-08 07:44:39', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(164, 'Zhejiang University', '', '', '', 'default.png', 'Hangzhou, Zhejiang', 'China', 1, '2019-10-08 07:44:39', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(165, 'University of Toronto', '', '', '', 'default.png', 'Toronto, Ontario', 'Canada', 1, '2021-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(166, 'University of British Columbia', '', '', '', 'default.png', 'Vancouver, British Columbia', 'Canada', 1, '2021-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(167, 'McGill University', '', '', '', 'default.png', 'Montréal, Québec', 'Canada', 1, '2022-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(168, 'McMaster University ', '', '', '', 'default.png', 'Hamilton, Ontario', 'Canada', 1, '2022-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(169, 'University of Montreal ', '', '', '', 'default.png', 'Montréal, Québec', 'Canada', 1, '2023-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(170, 'Unversity of Alberta', '', '', '', 'default.png', 'Edmonton, Alberta', 'Canada', 1, '2023-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(171, 'Unviersity of Calgary', '', '', '', 'default.png', 'Calgary, Alberta', 'Canada', 1, '2024-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(172, 'University of Ottawa', '', '', '', 'default.png', 'Ottawa Ontario', 'Canada', 1, '2024-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(173, 'University of Waterloo', '', '', '', 'default.png', 'Waterloo, Ontario', 'Canada', 1, '2025-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(174, 'University of Victoria', '', '', '', 'default.png', 'Victoria, British Columbia', 'Canada', 1, '2025-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(175, 'Western University', '', '', '', 'default.png', 'London, Ontario', 'Canada', 1, '2026-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(176, 'Simon Fraser University', '', '', '', 'default.png', 'Burnaby, British Columbia', 'Canada', 2, '2020-12-14 10:53:28', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(177, 'Laval University', '', '', '', 'default.png', 'Québec City, Québec', 'Canada', 1, '2027-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(178, 'Dalhousie University', '', '', '', 'default.png', 'Halifax, Nova Scotia', 'Canada', 1, '2027-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(179, 'Queen\'s University', '', '', '', 'default.png', 'Kingston, Ontario', 'Canada', 1, '2028-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(180, 'University of Manitoba', '', '', '', 'default.png', 'Winnipeg, Manitoba', 'Canada', 1, '2028-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(181, 'York University', '', '', '', 'default.png', 'Toronto, Ontario', 'Canada', 1, '2029-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(182, 'University of Guelph', '', '', '', 'default.png', 'Guelph, Ontario', 'Canada', 1, '2029-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(183, 'Carleton University', '', '', '', 'default.png', 'Ottawa Ontario', 'Canada', 1, '2030-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(184, 'Université du Québec à Montréal', '', '', '', 'default.png', 'Montréal, Québec', 'Canada', 1, '2030-07-19 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(185, 'Case Western Reserve University', 'Case.edu', '', '', 'default.png', '<p>Euclid Ave, Cleveland</p>', 'US', 1, '2019-10-13 03:20:25', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(186, 'London Business School', '', '', '', 'default.png', '<p>Regent&#39;s Park London</p>', 'UK', 1, '2019-10-20 11:34:47', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(187, 'Adelphi University', '', '', '', 'default.png', 'Nashville, TN', 'US', 1, '2019-10-22 04:54:48', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(188, 'American University', '', '', '', 'default.png', 'Waco, TX', 'US', 1, '2019-10-22 04:54:48', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(189, 'Ball State University', '', '', '', 'default.png', 'Dallas, PA', 'US', 1, '2019-10-22 04:54:48', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(190, 'Bellarmine University', '', '', '', 'default.png', 'St. Paul, MN', 'US', 1, '2019-10-22 04:54:48', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(191, 'Belmont University', '', '', '', 'default.png', 'Fort Collins, CO', 'US', 1, '2019-10-22 04:54:48', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(192, 'Bethel University', '', '', '', 'default.png', 'Normal, IL', 'US', 1, '2019-10-22 04:54:48', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(193, 'Binghamton University - SUNY', '', '', '', 'default.png', 'Bloomington, IN', 'US', 1, '2019-10-22 04:54:48', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(194, 'Biola University', '', '', '', 'default.png', 'Pittsburgh, PA', 'US', 1, '2019-10-22 04:54:48', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(195, 'Boston College', '', '', '', 'default.png', 'Chestnut Hill, MA', 'US', 1, '2019-10-22 04:54:48', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(196, 'Brigham Young University – Provo', '', '', '', 'default.png', 'Binghamton, NY', 'US', 1, '2019-10-22 04:54:49', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(197, 'Case Western Reserve University', '', '', '', 'default.png', 'Cleveland, OH', 'US', 1, '2019-10-22 04:54:49', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(198, 'Chapman University', '', '', '', 'default.png', 'Chicago, IL', 'US', 1, '2019-10-22 04:54:49', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(199, 'Chatham University', '', '', '', 'default.png', 'Athens, OH', 'US', 1, '2019-10-22 04:54:49', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(200, 'Clark University', '', '', '', 'default.png', 'Oxford, OH', 'US', 1, '2019-10-22 04:54:49', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(201, 'Clarkson University', '', '', '', 'default.png', 'Chicago, IL', 'US', 1, '2019-10-22 04:54:49', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(202, 'Clemson University', '', '', '', 'default.png', 'College Station, TX', 'US', 1, '2019-10-22 04:54:49', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(203, 'College of William and Mary', '', '', '', 'default.png', 'Williamsburg, VA', 'US', 1, '2019-10-22 04:54:49', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(204, 'College Park, MD', '', '', '', 'default.png', 'Worcester, MA', 'US', 1, '2019-10-22 04:54:49', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(205, 'College Station, TX', '', '', '', 'default.png', 'Hoboken, NJ', 'US', 1, '2019-10-22 04:54:50', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(206, 'Colorado State University', '', '', '', 'default.png', 'Montclair, NJ', 'US', 1, '2019-10-22 04:54:50', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(207, 'Creighton University', '', '', '', 'default.png', 'Washington, DC', 'US', 1, '2019-10-22 04:54:50', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(208, 'Dartmouth College', '', '', '', 'default.png', 'Hanover, NH', 'US', 1, '2019-10-22 04:54:50', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(209, 'DePaul University', '', '', '', 'default.png', 'Boston, MA', 'US', 1, '2019-10-22 04:54:50', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(210, 'Drake University', '', '', '', 'default.png', 'Lawrence, KS', 'US', 1, '2019-10-22 04:54:50', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(211, 'Duquesne University', '', '', '', 'default.png', 'Newark, NJ', 'US', 1, '2019-10-22 04:54:50', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(212, 'Elon University', '', '', '', 'default.png', 'Milwaukee, WI', 'US', 1, '2019-10-22 04:54:50', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(213, 'Gallaudet University', '', '', '', 'default.png', 'Rolla, MO', 'US', 1, '2019-10-22 04:54:50', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(214, 'George Mason University', '', '', '', 'default.png', 'Baton Rouge, LA', 'US', 1, '2019-10-22 04:54:51', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(215, 'George Washington University', '', '', '', 'default.png', 'Minneapolis, MN', 'US', 1, '2019-10-22 04:54:51', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(216, 'Georgetown University', '', '', '', 'default.png', 'Washington, DC', 'US', 1, '2019-10-22 04:54:51', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(217, 'Georgia Institute of Technology', '', '', '', 'default.png', 'Atlanta, GA', 'US', 1, '2019-10-22 04:54:51', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(218, 'Gonzaga University', '', '', '', 'default.png', 'Buffalo, NY', 'US', 1, '2019-10-22 04:54:51', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(219, 'Hofstra University', '', '', '', 'default.png', 'Hempstead, NY', 'US', 1, '2019-10-22 04:54:51', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(220, 'Howard University', '', '', '', 'default.png', 'Chicago, IL', 'US', 1, '2019-10-22 04:54:51', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(221, 'Illinois Institute of Technology', '', '', '', 'default.png', 'Tucson, AZ', 'US', 1, '2019-10-22 04:54:51', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(222, 'Illinois State University', '', '', '', 'default.png', 'New Orleans, LA', 'US', 1, '2019-10-22 04:54:51', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(223, 'Kansas State University', '', '', '', 'default.png', 'Manhattan, KS', 'US', 1, '2019-10-22 04:54:52', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(224, 'Lehigh University', '', '', '', 'default.png', 'Bethlehem, PA', 'US', 1, '2019-10-22 04:54:52', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(225, 'Louisiana State University – Baton Rouge', '', '', '', 'default.png', 'Macon, GA', 'US', 1, '2019-10-22 04:54:52', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(226, 'Loyola Marymount University', '', '', '', 'default.png', 'Dallas, TX', 'US', 1, '2019-10-22 04:54:52', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(227, 'Loyola University Chicago', '', '', '', 'default.png', 'Rochester, NY', 'US', 1, '2019-10-22 04:54:52', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(228, 'Marquette University', '', '', '', 'default.png', 'East Lansing, MI', 'US', 1, '2019-10-22 04:54:52', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(229, 'Mercer University', '', '', '', 'default.png', 'New York, NY', 'US', 1, '2019-10-22 04:54:52', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(230, 'Miami University – Oxford', '', '', '', 'default.png', 'Stony Brook, NY', 'US', 1, '2019-10-22 04:54:52', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(231, 'Michigan Technological University', '', '', '', 'default.png', 'Birmingham, AL', 'US', 1, '2019-10-22 04:54:52', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(232, 'Misericordia University', '', '', '', 'default.png', 'Stillwater, OK', 'US', 1, '2019-10-22 04:54:53', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(233, 'Missouri University of Science and Technology', '', '', '', 'default.png', 'Queens, NY', 'US', 1, '2019-10-22 04:54:53', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(234, 'Montclair State University', '', '', '', 'default.png', 'Glassboro, NJ', 'US', 1, '2019-10-22 04:54:53', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(235, 'New Jersey Institute of Technology', '', '', '', 'default.png', 'St. Louis, MO', 'US', 1, '2019-10-22 04:54:53', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(236, 'North Carolina State University--Raleigh', '', '', '', 'default.png', 'Santa Cruz, CA', 'US', 1, '2019-10-22 04:54:53', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(237, 'Northeastern University', '', '', '', 'default.png', 'Boston, MA', 'US', 1, '2019-10-22 04:54:53', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(238, 'Ohio University', '', '', '', 'default.png', 'Forest Grove, OR', 'US', 1, '2019-10-22 04:54:53', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(239, 'Oklahoma State University', '', '', '', 'default.png', 'Seattle, WA', 'US', 1, '2019-10-22 04:54:53', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(240, 'Pacific University', '', '', '', 'default.png', 'Jackson, TN', 'US', 1, '2019-10-22 04:54:53', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(241, 'Pepperdine University', '', '', '', 'default.png', 'Malibu, CA', 'US', 1, '2019-10-22 04:54:54', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(242, 'Quinnipiac University', '', '', '', 'default.png', 'Hamden, CT', 'US', 1, '2019-10-22 04:54:54', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(243, 'Rensselaer Polytechnic Institute', '', '', '', 'default.png', 'Troy, NY', 'US', 1, '2019-10-22 04:54:54', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(244, 'Rochester Institute of Technology', '', '', '', 'default.png', 'Philadelphia, PA', 'US', 1, '2019-10-22 04:54:54', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(245, 'Rowan University', '', '', '', 'default.png', 'Camden, NJ', 'US', 1, '2019-10-22 04:54:54', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(246, 'Rutgers University – Camden', '', '', '', 'default.png', 'Rochester, NY', 'US', 1, '2019-10-22 04:54:54', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(247, 'Rutgers University – New Brunswick', '', '', '', 'default.png', 'Seattle, WA', 'US', 1, '2019-10-22 04:54:54', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(248, 'Rutgers University--Newark', '', '', '', 'default.png', 'Dayton, OH', 'US', 1, '2019-10-22 04:54:54', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(249, 'Saint Louis University', '', '', '', 'default.png', 'Fort Worth, TX', 'US', 1, '2019-10-22 04:54:54', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(250, 'Samford University', '', '', '', 'default.png', 'San Diego, CA', 'US', 1, '2019-10-22 04:54:55', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(251, 'San Diego State University', '', '', '', 'default.png', 'Albany, NY', 'US', 1, '2019-10-22 04:54:55', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(252, 'Santa Clara University', '', '', '', 'default.png', 'Santa Clara, CA', 'US', 1, '2019-10-22 04:54:55', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(253, 'Seattle Pacific University', '', '', '', 'default.png', 'Louisville, KY', 'US', 1, '2019-10-22 04:54:55', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(254, 'Seattle University', '', '', '', 'default.png', 'South Orange, NJ', 'US', 1, '2019-10-22 04:54:55', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(255, 'Seton Hall University', '', '', '', 'default.png', 'Cincinnati, OH', 'US', 1, '2019-10-22 04:54:55', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(256, 'Simmons University', '', '', '', 'default.png', 'Durham, NH', 'US', 1, '2019-10-22 04:54:55', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(257, 'Southern Methodist University', '', '', '', 'default.png', 'Storrs, CT', 'US', 1, '2019-10-22 04:54:55', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(258, 'St. John Fisher College', '', '', '', 'default.png', 'Birmingham, AL', 'US', 1, '2019-10-22 04:54:55', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(259, 'St. John\'s University', '', '', '', 'default.png', 'Detroit, MI', 'US', 1, '2019-10-22 04:54:56', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(260, 'Stevens Institute of Technology', '', '', '', 'default.png', 'Provo, UT', 'US', 1, '2019-10-22 04:54:56', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(261, 'Stony Brook University – SUNY', '', '', '', 'default.png', 'Riverside, CA', 'US', 1, '2019-10-22 04:54:56', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(262, 'SUNY College of Environmental Science and Forestry', '', '', '', 'default.png', 'Tulsa, OK', 'US', 1, '2019-10-22 04:54:56', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(263, 'Syracuse University', '', '', '', 'default.png', 'Syracuse, NY', 'US', 1, '2019-10-22 04:54:56', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(264, 'Temple University', '', '', '', 'default.png', 'Merced, CA', 'US', 1, '2019-10-22 04:54:56', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(265, 'Texas A&M University – College Station', '', '', '', 'default.png', 'New York, NY', 'US', 1, '2019-10-22 04:54:56', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(266, 'Texas Christian University', '', '', '', 'default.png', 'Denver, CO', 'US', 1, '2019-10-22 04:54:56', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(267, 'The Catholic University of America', '', '', '', 'default.png', 'Corvallis, OR', 'US', 1, '2019-10-22 04:54:56', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(268, 'Thomas Jefferson University', '', '', '', 'default.png', 'Philadelphia, PA', 'US', 1, '2019-10-22 04:54:57', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(269, 'Tulane University', '', '', '', 'default.png', 'New Orleans, LA', 'US', 1, '2019-10-22 04:54:57', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(270, 'Union University', '', '', '', 'default.png', 'Houston, TX', 'US', 1, '2019-10-22 04:54:57', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(271, 'University at Albany – SUNY', '', '', '', 'default.png', 'West Hartford, CT', 'US', 1, '2019-10-22 04:54:57', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(272, 'University at Buffalo – SUNY', '', '', '', 'default.png', 'Elon, NC', 'US', 1, '2019-10-22 04:54:57', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(273, 'University of Alabama', '', '', '', 'default.png', 'Tuscaloosa, AL', 'US', 1, '2019-10-22 04:54:57', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(274, 'University of Alabama – Birmingham', '', '', '', 'default.png', 'Orlando, FL', 'US', 1, '2019-10-22 04:54:57', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(275, 'University of Arkansas', '', '', '', 'default.png', 'Fayetteville, AR', 'US', 1, '2019-10-22 04:54:57', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(276, 'University of California – Merced', '', '', '', 'default.png', 'Boulder, CO', 'US', 1, '2019-10-22 04:54:57', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(277, 'University of California – Riverside', '', '', '', 'default.png', 'Newark, DE', 'US', 1, '2019-10-22 04:54:58', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(278, 'University of California – Santa Cruz', '', '', '', 'default.png', 'Iowa City, IA', 'US', 1, '2019-10-22 04:54:58', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(279, 'University of Central Florida', '', '', '', 'default.png', 'Honolulu, HI', 'US', 1, '2019-10-22 04:54:58', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(280, 'University of Cincinnati', '', '', '', 'default.png', 'Columbia, MO', 'US', 1, '2019-10-22 04:54:58', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(281, 'University of Colorado – Boulder', '', '', '', 'default.png', 'Eugene, OR', 'US', 1, '2019-10-22 04:54:58', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(282, 'University of Connecticut', '', '', '', 'default.png', 'College Park, MD', 'US', 1, '2019-10-22 04:54:58', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(283, 'University of Dayton', '', '', '', 'default.png', 'Chicago, IL', 'US', 1, '2019-10-22 04:54:58', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(284, 'University of Delaware', '', '', '', 'default.png', 'San Diego, CA', 'US', 1, '2019-10-22 04:54:58', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(285, 'University of Denver', '', '', '', 'default.png', 'San Francisco, CA', 'US', 1, '2019-10-22 04:54:58', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(286, 'University of Detroit Mercy', '', '', '', 'default.png', 'Moscow, ID', 'US', 1, '2019-10-22 04:54:59', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(287, 'University of Georgia', '', '', '', 'default.png', 'Athens, GA', 'US', 1, '2019-10-22 04:54:59', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(288, 'University of Hawaii – Manoa', '', '', '', 'default.png', 'Baltimore, MD', 'US', 1, '2019-10-22 04:54:59', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(289, 'University of Houston', '', '', '', 'default.png', 'Wilmington, NC', 'US', 1, '2019-10-22 04:54:59', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(290, 'University of Idaho', '', '', '', 'default.png', 'Lowell, MA', 'US', 1, '2019-10-22 04:54:59', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(291, 'University of Illinois – Chicago', '', '', '', 'default.png', 'Lexington, KY', 'US', 1, '2019-10-22 04:54:59', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(292, 'University of Iowa', '', '', '', 'default.png', 'Worcester, MA', 'US', 1, '2019-10-22 04:54:59', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(293, 'University of Kansas', '', '', '', 'default.png', 'Pittsburgh, PA', 'US', 1, '2019-10-22 04:54:59', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(294, 'University of Kentucky', '', '', '', 'default.png', 'La Verne, CA', 'US', 1, '2019-10-22 04:54:59', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(295, 'University of La Verne', '', '', '', 'default.png', 'Norman, OK', 'US', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(296, 'University of Louisville', '', '', '', 'default.png', 'Louisville, KY', 'US', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(297, 'University of Maryland – Baltimore County', '', '', '', 'default.png', 'Kingston, RI', 'US', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(298, 'University of Maryland – College Park', '', '', '', 'default.png', 'Amherst, MA', 'US', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(299, 'University of Massachusetts – Amherst', '', '', '', 'default.png', 'Clemson, SC', 'US', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(300, 'University of Massachusetts – Lowell', '', '', '', 'default.png', 'La Mirada, CA', 'US', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(301, 'University of Mississippi', '', '', '', 'default.png', 'University, MS', 'US', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(302, 'University of Missouri', '', '', '', 'default.png', 'Lincoln, NE', 'US', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(303, 'University of Nebraska – Lincoln', '', '', '', 'default.png', 'St. Paul, MN', 'US', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(304, 'University of New Hampshire', '', '', '', 'default.png', 'Stockton, CA', 'US', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(305, 'University of North Carolina – Chapel Hill', '', '', '', 'default.png', 'Chapel Hill, NC', 'US', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(306, 'University of North Carolina – Wilmington', '', '', '', 'default.png', 'Muncie, IN', 'US', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(307, 'University of Pittsburgh', '', '', '', 'default.png', 'Piscataway, NJ', 'US', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(308, 'University of Rhode Island', '', '', '', 'default.png', 'Pullman, WA', 'US', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(309, 'University of Rochester', '', '', '', 'default.png', 'Rochester, NY', 'US', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(310, 'University of South Carolina', '', '', '', 'default.png', 'Tampa, FL', 'US', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(311, 'University of South Florida', '', '', '', 'default.png', 'Knoxville, TN', 'US', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(312, 'University of St. Joseph', '', '', '', 'default.png', 'Richardson, TX', 'US', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(313, 'University of St. Thomas', '', '', '', 'default.png', 'Houghton, MI', 'US', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(314, 'University of Tennessee', '', '', '', 'default.png', 'Salt Lake City, UT', 'US', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(315, 'University of Texas--Dallas', '', '', '', 'default.png', 'Fairfax, VA', 'US', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(316, 'University of the Pacific', '', '', '', 'default.png', 'Des Moines, IA', 'US', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `tbl_universities` (`id_univ`, `university_name`, `website`, `univ_email`, `phone`, `photo`, `address`, `country`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(317, 'University of Tulsa', '', '', '', 'default.png', 'Burlington, VT', 'US', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(318, 'University of Utah', '', '', '', 'default.png', 'Tempe, AZ', 'US', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(319, 'University of Vermont', '', '', '', 'default.png', 'Orange, CA', 'US', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(320, 'University Park, PA', '', '', '', 'default.png', 'West Lafayette, IN', 'US', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(321, 'University, MS', '', '', '', 'default.png', 'Richmond, VA', 'US', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(322, 'Valparaiso University', '', '', '', 'default.png', 'Valparaiso, IN', 'US', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(323, 'Vanderbilt University', '', '', '', 'default.png', 'Nashville, TN', 'US', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(324, 'Villanova University', '', '', '', 'default.png', 'Villanova, PA', 'US', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(325, 'Virginia Commonwealth University', '', '', '', 'default.png', 'Garden City, NY', 'US', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(326, 'Wake Forest University', '', '', '', 'default.png', 'Winston-Salem, NC', 'US', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(327, 'Washington University in St. Louis', '', '', '', 'default.png', 'St. Louis, MO', 'US', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(328, 'Worcester Polytechnic Institute', '', '', '', 'default.png', 'Washington, DC', 'US', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(329, 'Yeshiva University', '', '', '', 'default.png', 'Auburn, AL', 'US', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(330, 'Simon Fraser University', 'sfu.ca', '', '', 'default.png', '<p>8888 University Dr, Burnaby, BC V5A 1S6</p>', 'Canada', 1, '2020-12-14 10:49:41', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(331, 'Babson College', 'www.babson.edu', '', '', 'default.png', '<p>Wellesley, Massachusetts</p>', 'US', 1, '2021-12-24 06:33:15', '2021-12-24 06:33:15', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_work_duration`
--

CREATE TABLE `tbl_work_duration` (
  `id` int(11) NOT NULL,
  `id_essay_editors` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `duration` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
-- Indexes for table `tbl_work_duration`
--
ALTER TABLE `tbl_work_duration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admins`
--
ALTER TABLE `tbl_admins`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `id_category` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_editors`
--
ALTER TABLE `tbl_editors`
  MODIFY `id_editors` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_essay_prompt`
--
ALTER TABLE `tbl_essay_prompt`
  MODIFY `id_essay_prompt` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id_program` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id_univ` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=332;

--
-- AUTO_INCREMENT for table `tbl_work_duration`
--
ALTER TABLE `tbl_work_duration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
