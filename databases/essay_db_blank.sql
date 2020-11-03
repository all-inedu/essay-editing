-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 23, 2019 at 10:01 AM
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
(0, 'Essay', 'Students', '', 'essay-student@all-inedu.com', '0000-00-00', '', '', '', '', '', 0, '', '', '', 0, '', '', '', '', 'clients', 1, '$2y$10$//ILaDn3rYDWlWnLydW47Ok1FDF3w7VRe/PbHs8CgZJlEa4p9DDiK', '2019-08-23 07:54:22', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1, 'Graciella', NULL, '081519307310', 'ciellaindria28@gmail.com', '0000-00-00', '', '', '', '', 'Taman Ratu Indah Blok i-1 No.3, Kedoya Selatan, Kebon Jarak', 1, '', '', '', 0, '', '', '', '', '', 1, '$2y$10$QW1HANhzG5U1uh/gyccMEeBleGm7DnWOsmXM7YvR9mx8HS5JptMqC', '2019-08-23 02:18:48', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Carina  Angel', 'Natanael', '087785193555', 'carinangeln@gmail.com', '0000-00-00', '', '', '', '', 'Taman Ratu Indah Blok i-1 No.3, Kedoya Selatan, Jakarta Barat', 1, '', '', '', 0, '', '', '', '', '', 1, '$2y$10$HcqFQ9/8ujJjgasOEzyCru4zIuLtMAMdwZIz596Zu.4kt.VkxWoi6', '2019-08-23 02:18:48', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Jeremy', NULL, '081290908968', 'jpek342@gmail.com', '0000-00-00', '', '', '', '', 'Taman permata buana jalan pulau panjang 7 Blok C15 No. 2', 2, '', '', '', 0, '', '', '', '', '', 1, '$2y$10$LCy3in4sIRr7krU89zuaVuh/OsrXBdH/MfH1hqow4NbiEjWLXGjjq', '2019-08-23 02:18:48', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Aaman', 'Basra', '08119514007', 'rajat.basra@gmail.com', '0000-00-00', '', '', '', '', 'Jl. Casablanca Raya Kav.88 Jakarta Selatan 12870', 1, '', '', '', 0, '', '', '', '', '', 1, '$2y$10$h.o2Np9PYvzB1R3VFCOOcu/dHF9.w/WeJZ.ud7ORMQTUpjppO864q', '2019-08-23 02:18:48', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'Nimas Ulinar', 'Damessa Sinaga', '081310496408', 'gsinaga.loreal@gmail.com', '0000-00-00', '', '', '', '', 'Bukit Golf Riverside Residence Blok 3 C2 No.5 Bojong Nangka', 2, '', '', '', 0, '', '', '', '', '', 1, '$2y$10$hlqD8ERdR8fArk7ORVORUevL4wM4lCz/9x6nvkVJ/YxsBmlCFonmS', '2019-08-23 02:18:48', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'Stefanus Randy', 'Oenardi Raharjo', '081210444849', 'stefanusrandy@gmail.com', '0000-00-00', '', '', '', '', 'Jalan Boulevard Palem Raya No.1853 Lippo Karawaci Tangerang 15811', 1, '', '', '', 0, '', '', '', '', '', 1, '$2y$10$PALzWk7J9VDoglbjOYlKR.gfi3vD/cillIKwRSUI/OvViEKnnYGBC', '2019-08-23 02:18:48', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'Sneha', 'Kumar', '087727303443', 'skumar@mtview.id', '0000-00-00', '', '', '', '', 'Jl. Yudhistira II No.7A, Grogol Baru', 2, '', '', '', 0, '', '', '', '', '', 1, '$2y$10$meZcp2SrcHJ4Wu8UDi.WJe2N/rlHj3FwVUMqLfafcsahxQCONSrii', '2019-08-23 02:18:48', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 'Raisa', 'Hidayat', '0818770063', 'raisa.j.hidayat@gmail.com', '0000-00-00', '', '', '', '', 'Jl. Pengadegan Selatan VII No.67 Pancoran', 1, '', '', '', 0, '', '', '', '', '', 1, '$2y$10$phdGsmOtsHgokbWFv51BRuZKPaR3RW1Ckcfs73XcDGTGKkYBtAt4a', '2019-08-23 02:18:48', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 'Daven', 'Giftian Tejalaksana', '08161922282', 'daven.giftian@gmail.com', '0000-00-00', '', '', '', '', 'Puri Botanical Residences', 1, '', '', '', 0, '', '', '', '', '', 1, '$2y$10$fVDWQKIo6zefCzdST6x8j.RVBQPeF9k/BkVnE4ecpynCwq5jWP5F.', '2019-08-23 02:18:48', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 'Elysa Faith', 'Ng May May', '08170052002', 'indiana_lesmana@yahoo.com', '0000-00-00', '', '', '', '', 'Jl. Tanjung Duren Utara IIIB No.249', 1, '', '', '', 0, '', '', '', '', '', 1, '$2y$10$nD3T50DK9KFweEonPBnkk..a9pRJs2HLL6MMhuiiknyLuPjbVt.JG', '2019-08-23 02:18:48', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 'Nelson', NULL, '081218767374', 'franciscalukman077@gmail.com', '0000-00-00', '', '', '', '', 'JL. Way Besai No.77 Tanjung Duren Selatan', 1, '', '', '', 0, '', '', '', '', '', 1, '$2y$10$vgJhS6Ld1JnnXkjtRWtflOcs1Tc5.3kM4y4ZgQJ0qwPjTB4ax/dMa', '2019-08-23 02:18:48', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 'Felicia', 'Margaretha Gono', '0818662002', 'velika.charlicia@gmail.com', '0000-00-00', '', '', '', '', 'Taman Kebon Permata Buana Jl.Pulau Pantaar 2 Blok N3 No.19', 1, '', '', '', 0, '', '', '', '', '', 1, '$2y$10$sB86hTQMZKX2vxhC9OriZOgu56zhECI5bR3znLHeRFii.fanUrjsW', '2019-08-23 02:18:48', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 'Aaron', 'Louis Tan', '0818333268', 'isabelchen17@yahoo.com', '0000-00-00', '', '', '', '', 'Jalan Raya Fatmawati No: 28D', 1, '', '', '', 0, '', '', '', '', '', 1, '$2y$10$vtsM3Oia9mMSq.hR/cfkY.gEQG5A2k05OmRm9zHrUn.OF/NE1K9KO', '2019-08-23 02:18:48', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 'Rachel', 'Widjajanto Puspawidjaja', '081805057111', 'rachel.widjajanto@gmail.com', '0000-00-00', '', '', '', '', 'Jl. Alamanda Bawah Blok VIII No.12 Graha Candi Golf', 2, '', '', '', 0, '', '', '', '', '', 1, '$2y$10$NRgc1VO5wWdt80P6C5pnPO1Y2jT0ilzsH/P02sBjwJnr5gGtFGvRe', '2019-08-23 02:18:48', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 'Christopher', 'Putra Joe', '0818999399', 'fdchandrra@yahoo.com', '0000-00-00', '', '', '', '', 'Jalan Sisingamangaraja No.7', 2, '', '', '', 0, '', '', '', '', '', 1, '$2y$10$D.YkLVsccZsgjnrefJJWoeeewOKcA4K1LmD9LwGqzXz964t6Mrd2a', '2019-08-23 02:18:48', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 'Romero', 'Roswell Isa', '0857869457', 'romzrobot@gmail.com', '0000-00-00', '', '', '', '', 'Jl. Gunung Kandora No.106 Tanjung Bunga', 6, '', '', '', 0, '', '', '', '', '', 1, '$2y$10$mvMjn7.rYZAnBBvtzErycutxxLNdo.Lfs9yjxQBmXKKv01KkUbmnS', '2019-08-23 02:18:48', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 'Kireyna', 'Aurelia Santoso', '089613267851', 'kirey14123@gmail.com', '0000-00-00', '', '', '', '', 'Taman Bougenville Golf B3 No.5 Golf Estate Bogor Raya', 7, '', '', '', 0, '', '', '', '', '', 1, '$2y$10$xfAAVAGvOvbVYXrXIIy8beeCqbPUW.84xO1L5PDeydP7ESBycwKR2', '2019-08-23 02:18:48', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 'Naufal', 'Aktsa', '081806408291', 'aktsa@mejakita.com', '0000-00-00', '', '', '', '', 'Emerald View Blok H-19 Bintaro Sektor 9', 3, '', '', '', 0, '', '', '', '', '', 1, '$2y$10$m/I6VQpTitHO1e25wM3m/OjZO85cMECfSIBl2weBXpg6mnk0P7dGO', '2019-08-23 02:18:48', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, 'Cassandra', 'Milla Hemasurya', '081390392525', 'Cassie@hemasurya.net', '0000-00-00', '', '', '', '', 'Jl. Dieng No.5B Gajah Mungkur', 3, '', '', '', 0, '', '', '', '', '', 1, '$2y$10$w1K8scc/cywe1jIXeHa6I.gx4TpI2p8DXx27IujjzB97QVSK5iDAW', '2019-08-23 02:18:48', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, 'Ronan', 'Mahtolia', '081546500143', 'rmahtolia@id.indorama.net', '0000-00-00', '', '', '', '', 'Simprug Indah Apartment Jakarta', 6, '', '', '', 0, '', '', '', '', '', 1, '$2y$10$LdxSzC0Pu5XEpXp7EhDNxOEs7r4UJIK2mr8fZLHrJhT4jifyZJa32', '2019-08-23 02:18:48', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(79, 'Audrey', 'Silalahi', '08121094506', 'shelly.silalahi@yahoo.com', '0000-00-00', '', '', '', '', 'Jalan Cipinang Cempedak 2 No.23', 1, '', '', '', 0, '', '', '', '', '', 1, '$2y$10$rQyfxn3VOlDO2boIm6OPROu9gr3xAs5lXbQ9buzrt9teAavsGa3ZS', '2019-08-23 02:18:48', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(83, 'Alyssa', 'Limit', '081290165855', 'alyssalmt28@gmail.com', '0000-00-00', '', '', '', '', 'Jalan Griya Manikam Blok G No.7', 1, '', '', '', 0, '', '', '', '', '', 1, '$2y$10$eXVntU6qsIAWGD1kQn0oQ.TbLgrojWF6Ar9ZtKtu/qjSB7Zc8QPT.', '2019-08-23 02:18:48', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
(1, 'Essay Editor', '1', '1234567890', 'essay-editor1@all-inedu.com', 'The University of Chicago', 'Computer Science', 'Jakarta Barat', 3, 'default.png', 0, 0, 1, '$2y$10$98SlO9JNY.S8ZgecoYCMeeRMnox.c9bVWYSFN4mZVCPQn3/.cTT1y', '2019-08-23 07:43:43', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
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
  `uploaded_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
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
  `notes_editors` text NOT NULL,
  `status_essay_editors` int(11) NOT NULL,
  `uploaded_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `accepted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `verified_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
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
(0, 'Essay', 'Mentors', '', 'essay-mentor@all-inedu.com', NULL, '', 0, 1, '$2y$10$//ILaDn3rYDWlWnLydW47Ok1FDF3w7VRe/PbHs8CgZJlEa4p9DDiK', '2019-08-23 07:49:14', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1, 'Devi', 'Kasih', '08121380178', 'kasih0027@gmail.com', 'University of Pennsylvania', 'Jl. Dr. Kasih No.1, RT.8/RW.1, Kebon Jeruk', 0, 1, '$2y$10$hcNxMuV2CgiH5J3dsY3vl.5/kU5ZVJt/VDPqtgNKRr3XmqDYvoR.K', '2019-08-23 02:20:24', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Nicholas', 'Hendra', '+62 811-1860', 'nicohs@gmail.com', 'Purdue University', 'Taman Kebon Jeruk f1/10', 0, 1, '$2y$10$/nvGmfRomqLK1N1oOr4uN.cl.68PEP6vr7l2eSvBcCUU88DfNYPVi', '2019-08-23 02:20:24', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Paul', 'Edison', '+62 822-3943', 'paul.edison@all-inedu.com', NULL, 'Jl Panjang No. 36 Kebon Jeruk', 0, 1, '$2y$10$SgnRGh9AyLZ7fDdS5Q9qDuosIkQniGgY4dAoIP8iwkYcuzfwJD.vS', '2019-08-23 02:20:24', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Michelle', 'Lee', '+1 (650) 305', 'michelle.lee@all-inedu.com', NULL, 'Jl Panjang No. 36 Kebon Jeruk', 0, 1, '$2y$10$bIa2lK988GqFMMvoy/lmLO/0NdU3MoLAeO/dA.y4C2/m4.L8H.HS6', '2019-08-23 02:20:24', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Indira', 'Pranabudi', '+1 (253) 876', 'indira.pranabudi@all-inedu.com', NULL, 'Jl Panjang No. 36 Kebon Jeruk', 0, 1, '$2y$10$6N3BnKeCSd3r.cV6ASK4teyP99rBArpuvPf66kZ/Nlp82FxdrXLM6', '2019-08-23 02:20:24', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Michael', 'Kurniawan', '+1 (412) 608', 'michael.kurniawan@all-inedu.com', NULL, 'Jl Panjang No. 36 Kebon Jeruk', 0, 1, '$2y$10$2vTjXUshvuaOFKCBWJgvZeyOKpbGpZu5xcPOidArq/.UzixBE73tu', '2019-08-23 02:20:24', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Ivana', 'Rachmawati', '+62 812-1911', 'ivana.rachmawati@all-inedu.com', NULL, 'Jl Panjang No. 36 Kebon Jeruk', 0, 1, '$2y$10$2bJ35Sh0osFkEbzjAhVi8u5FNrtTpmukOEP3urTC2dknHwffepLC2', '2019-08-23 02:20:24', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Nadia', 'Purnama', '+62 811-2769', 'nadia.purnama@all-inedu.com', NULL, 'Jl Panjang No. 36 Kebon Jeruk', 0, 1, '$2y$10$bHIfyb0sf5G54j2ws1u1DeMjYclo8GcbQwdXrUcWEEmQERKaFRa1S', '2019-08-23 02:20:24', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Juniko', 'Widjaja', '+62 812-4125', 'juniko.widjaja@all-inedu.com', NULL, 'Jl Panjang No. 36 Kebon Jeruk', 0, 1, '$2y$10$hLasOWcwPQ14Rt/WuqxJJuo2J6kNLIxrxshzzuV52LgAgfryHHy.O', '2019-08-23 02:20:24', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Novia', 'Purnama', '+62 812-2502', 'novia.purnama@all-inedu.com', NULL, 'Jl Panjang No. 36 Kebon Jeruk', 0, 1, '$2y$10$Hj0/2/5TuBx8LS/im241I.62zZMYtNZwtftZW7Zu0TKKicYuLS7AG', '2019-08-23 02:20:24', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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

--
-- Dumping data for table `tbl_token`
--

INSERT INTO `tbl_token` (`id`, `email`, `token`, `activated_at`) VALUES
(26, 'essay-editor2@all-inedu.com', 'hmbwoss2wXgZGZRLpi4/x0GYYgfrm65zqSn1ccNaUdM=', 1566546285);

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
  MODIFY `id_program` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_tags`
--
ALTER TABLE `tbl_tags`
  MODIFY `id_topic` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_token`
--
ALTER TABLE `tbl_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

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
  MODIFY `id_univ` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
