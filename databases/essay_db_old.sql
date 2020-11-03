-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 09, 2019 at 05:18 AM
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
(1, 'Admin', 'hafidzannur@ymail.com', '12345', 'admins', 1, '$2y$10$ly6Llf0yc8hoR3J7VAJTXOsRG1BOzv6AEjeslp6HmBgnts2RnCGbu', '2019-06-11 03:49:51', '0000-00-00 00:00:00'),
(7, 'Hafidz Annur Fanany', 'hafidz.bdt@gmail.com', '', 'admins', 1, '$2y$10$zXkCE2kY.oTXK2QR5KgdhOaX4dYsSP6kXBVgcdajeQu91abMhzQI.', '2019-08-06 07:21:31', '0000-00-00 00:00:00');

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
(0, 'Students', '', '12345678', 'students@essay.com', '1996-06-06', 'Indonesia', '', '', '', 'Test Address', 0, 'Test', 'Test', '', 0, 'Test(09:10:44).png', 'Activity_Test(10-07-2019).docx', 'Resume_Test(10-07-2019)1.docx', 'Quisioner_Test(10-07-2019)1.docx', '', 1, '$2y$10$Yq4JC.Vf9nfu0S1qL27pTO/5OxDcsjqMfmTAFTPwf0xeEkt3rzIoa', '2019-07-18 02:03:53', '2019-07-16 02:12:02', '0000-00-00 00:00:00'),
(1, 'Graciella', NULL, '081519307310', 'ciellaindria28@gmail.com', '0000-00-00', '', '', '', '', 'Taman Ratu Indah Blok i-1 No.3, Kedoya Selatan, Kebon Jarak', 1, '', '', '', 0, '', '', '', '', '', 1, '$2y$10$Yq4JC.Vf9nfu0S1qL27pTO/5OxDcsjqMfmTAFTPwf0xeEkt3rzIoa', '2019-07-05 08:36:55', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Carina  Angel', 'Natanael', '087785193555', 'carinangeln@gmail.com', '0000-00-00', '', '', '', '', 'Taman Ratu Indah Blok i-1 No.3, Kedoya Selatan, Jakarta Barat', 1, '', '', '', 0, '', '', '', '', '', 1, '$2y$10$HcqFQ9/8ujJjgasOEzyCru4zIuLtMAMdwZIz596Zu.4kt.VkxWoi6', '2019-06-20 22:12:50', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Jeremy', NULL, '081290908968', 'jpek342@gmail.com', '0000-00-00', '', '', '', '', 'Taman permata buana jalan pulau panjang 7 Blok C15 No. 2', 2, '', '', '', 0, '', '', '', '', '', 1, '$2y$10$LCy3in4sIRr7krU89zuaVuh/OsrXBdH/MfH1hqow4NbiEjWLXGjjq', '2019-06-20 22:12:50', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'Nimas Ulinar', 'Damessa Sinaga', '081310496408', 'gsinaga.loreal@gmail.com', '0000-00-00', '', '', '', '', 'Bukit Golf Riverside Residence Blok 3 C2 No.5 Bojong Nangka', 2, '', '', '', 0, '', '', '', '', '', 1, '$2y$10$hlqD8ERdR8fArk7ORVORUevL4wM4lCz/9x6nvkVJ/YxsBmlCFonmS', '2019-06-20 22:12:50', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'Stefanus Randy', 'Oenardi Raharjo', '081210444849', 'stefanusrandy@gmail.com', '0000-00-00', '', '', '', '', 'Jalan Boulevard Palem Raya No.1853 Lippo Karawaci Tangerang 15811', 1, '', '', '', 0, '', '', '', '', '', 1, '$2y$10$PALzWk7J9VDoglbjOYlKR.gfi3vD/cillIKwRSUI/OvViEKnnYGBC', '2019-06-20 22:12:50', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'Sneha', 'Kumar', '087727303443', 'skumar@mtview.id', '0000-00-00', '', '', '', '', 'Jl. Yudhistira II No.7A, Grogol Baru', 2, '', '', '', 0, '', '', '', '', '', 1, '$2y$10$meZcp2SrcHJ4Wu8UDi.WJe2N/rlHj3FwVUMqLfafcsahxQCONSrii', '2019-06-20 22:12:50', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 'Test', 'Students', '089653642318', 'ismiyesung@gmail.com', '1996-04-06', 'Singapore', '', '', '', 'Address', 0, 'Hight School', 'School Name', '', 0, 'Test(11:43:57).jpg', '', '', '', 'clients', 1, '$2y$10$5d35kwv0qy9UknsZpfBeVu.yEYLAAH4NvKio3Q5874qpBFllNVZjS', '2019-08-08 03:05:36', '2019-08-08 03:05:35', '0000-00-00 00:00:00'),
(30, 'Graciella', 'Lim', '081519307310', 'tutorialessay@gmail.com', '1996-04-06', 'Singapore', '', '', '', 'Taman Ratu Indah Blok i-1 No.3, Kedoya Selatan, Kebon Jarak', 0, 'SMP', 'SMP N 27', '', 0, 'Graciella(15:33:11).png', '', '', '', 'clients', 1, '$2y$10$jdcLHbKeKrOyh12al6TSvup14v0ipAYtsRDybmI.YVRnPpp8Hg3M.', '2019-08-02 04:07:27', '2019-07-03 20:33:11', '0000-00-00 00:00:00'),
(34, 'Raisa', 'Hidayat', '0818770063', 'raisa.j.hidayat@gmail.com', '0000-00-00', '', '', '', '', 'Jl. Pengadegan Selatan VII No.67 Pancoran', 1, '', '', '', 0, '', '', '', '', '', 1, '$2y$10$phdGsmOtsHgokbWFv51BRuZKPaR3RW1Ckcfs73XcDGTGKkYBtAt4a', '2019-06-20 22:12:50', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 'Daven', 'Giftian Tejalaksana', '08161922282', 'daven.giftian@gmail.com', '0000-00-00', '', '', '', '', 'Puri Botanical Residences', 1, '', '', '', 0, '', '', '', '', '', 1, '$2y$10$fVDWQKIo6zefCzdST6x8j.RVBQPeF9k/BkVnE4ecpynCwq5jWP5F.', '2019-06-20 22:12:50', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 'Elysa Faith', 'Ng May May', '08170052002', 'indiana_lesmana@yahoo.com', '0000-00-00', '', '', '', '', 'Jl. Tanjung Duren Utara IIIB No.249', 1, '', '', '', 0, '', '', '', '', '', 1, '$2y$10$nD3T50DK9KFweEonPBnkk..a9pRJs2HLL6MMhuiiknyLuPjbVt.JG', '2019-06-20 22:12:50', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 'Felicia', 'Margaretha Gono', '0818662002', 'velika.charlicia@gmail.com', '0000-00-00', '', '', '', '', 'Taman Kebon Permata Buana Jl.Pulau Pantaar 2 Blok N3 No.19', 1, '', '', '', 0, '', '', '', '', '', 1, '$2y$10$sB86hTQMZKX2vxhC9OriZOgu56zhECI5bR3znLHeRFii.fanUrjsW', '2019-06-20 22:12:50', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 'Aaron', 'Louis Tan', '0818333268', 'isabelchen17@yahoo.com', '0000-00-00', '', '', '', '', 'Jalan Raya Fatmawati No: 28D', 1, '', '', '', 0, '', '', '', '', '', 1, '$2y$10$vtsM3Oia9mMSq.hR/cfkY.gEQG5A2k05OmRm9zHrUn.OF/NE1K9KO', '2019-06-20 22:12:50', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 'Rachel', 'Widjajanto Puspawidjaja', '081805057111', 'rachel.widjajanto@gmail.com', '0000-00-00', '', '', '', '', 'Jl. Alamanda Bawah Blok VIII No.12 Graha Candi Golf', 2, '', '', '', 0, '', '', '', '', '', 1, '$2y$10$NRgc1VO5wWdt80P6C5pnPO1Y2jT0ilzsH/P02sBjwJnr5gGtFGvRe', '2019-06-20 22:12:50', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 'Christopher', 'Putra Joe', '0818999399', 'fdchandrra@yahoo.com', '0000-00-00', '', '', '', '', 'Jalan Sisingamangaraja No.7', 2, '', '', '', 0, '', '', '', '', '', 1, '$2y$10$D.YkLVsccZsgjnrefJJWoeeewOKcA4K1LmD9LwGqzXz964t6Mrd2a', '2019-06-20 22:12:50', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 'Romero', 'Roswell Isa', '0857869457', 'romzrobot@gmail.com', '0000-00-00', '', '', '', '', 'Jl. Gunung Kandora No.106 Tanjung Bunga', 6, '', '', '', 0, '', '', '', '', '', 1, '$2y$10$mvMjn7.rYZAnBBvtzErycutxxLNdo.Lfs9yjxQBmXKKv01KkUbmnS', '2019-06-20 22:12:50', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 'Kireyna', 'Aurelia Santoso', '089613267851', 'kirey14123@gmail.com', '0000-00-00', '', '', '', '', 'Taman Bougenville Golf B3 No.5 Golf Estate Bogor Raya', 7, '', '', '', 0, '', '', '', '', '', 1, '$2y$10$xfAAVAGvOvbVYXrXIIy8beeCqbPUW.84xO1L5PDeydP7ESBycwKR2', '2019-06-20 22:12:50', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 'Naufal', 'Aktsa', '081806408291', 'aktsa@mejakita.com', '0000-00-00', '', '', '', '', 'Emerald View Blok H-19 Bintaro Sektor 9', 3, '', '', '', 0, '', '', '', '', '', 1, '$2y$10$m/I6VQpTitHO1e25wM3m/OjZO85cMECfSIBl2weBXpg6mnk0P7dGO', '2019-06-20 22:12:50', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, 'Cassandra', 'Milla Hemasurya', '081390392525', 'Cassie@hemasurya.net', '0000-00-00', '', '', '', '', 'Jl. Dieng No.5B Gajah Mungkur', 3, '', '', '', 0, '', '', '', '', '', 1, '$2y$10$w1K8scc/cywe1jIXeHa6I.gx4TpI2p8DXx27IujjzB97QVSK5iDAW', '2019-06-20 22:12:50', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, 'Ronan', 'Mahtolia', '081546500143', 'rmahtolia@id.indorama.net', '0000-00-00', '', '', '', '', 'Simprug Indah Apartment Jakarta', 6, '', '', '', 0, '', '', '', '', '', 1, '$2y$10$LdxSzC0Pu5XEpXp7EhDNxOEs7r4UJIK2mr8fZLHrJhT4jifyZJa32', '2019-06-20 22:12:50', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
(17, 'Editors', '3', '+62 812-1911', 'ivana.rachmawati@all-inedu.com', 'Test', 'Test', 'Jl Panjang No. 36 Kebon Jeruk', 2, 'editors_Editors2.png', 0, 0, 1, '$2y$10$zGT/HqEc0uqIBlz9J1Vp3eimTa3tmQyI0Zwy./UNnpLKWuITnDaJW', '2019-07-22 10:35:18', '2019-07-22 10:35:18', '0000-00-00 00:00:00'),
(18, 'Editors', '2', '+62 812-1911', 'michelle.lee@all-inedu.com', 'Test', 'Test', 'Jl Panjang No. 36 Kebon Jeruk', 1, 'editors_Editors1.png', 0, 0, 1, '$2y$10$ymaPaqIj6iO.x6IXt0GGAOrcopIUYIL3RKImIpFIxi84MaPr7XJT.', '2019-07-22 06:29:37', '2019-07-22 06:29:37', '0000-00-00 00:00:00'),
(19, 'Editors', 'Name', '+62 812-1911', 'editors@essay.com', 'Test Graduated From', 'Test Major', 'Jl Panjang No. 36 Kebon Jeruk', 3, 'editors_Test1.png', 0, 0, 1, '$2y$10$rD58UuzhVsuJq4uZaN.9QeuFBzZlgL3yaEq3DyyBmjHO1W8w.Lmnq', '2019-08-01 06:33:08', '2019-08-01 06:33:08', '0000-00-00 00:00:00'),
(20, 'Editors', '4', '089653642318', 'ismiyesung@gmail.com', 'Test', 'Test', 'Address', 1, 'editors_Editors.png', 0, 0, 1, '$2y$10$7Nwqz2YbkQosMHkm04lxh.RGTWFuwlq9adiZlRly1mD.YyN7yoyFS', '2019-08-02 07:38:48', '2019-07-22 06:27:04', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_essay_clients`
--

CREATE TABLE `tbl_essay_clients` (
  `id_essay_clients` int(11) NOT NULL,
  `id_essay_prompt` int(11) NOT NULL,
  `id_transaction` int(11) NOT NULL,
  `id_program` int(2) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mentors_mail` varchar(50) NOT NULL,
  `number_of_words` int(11) NOT NULL,
  `attached_of_clients` varchar(50) NOT NULL,
  `notes_clients` text NOT NULL,
  `essay_rating` decimal(11,1) NOT NULL,
  `status_essay_clients` int(11) NOT NULL,
  `uploaded_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_essay_clients`
--

INSERT INTO `tbl_essay_clients` (`id_essay_clients`, `id_essay_prompt`, `id_transaction`, `id_program`, `email`, `mentors_mail`, `number_of_words`, `attached_of_clients`, `notes_clients`, `essay_rating`, `status_essay_clients`, `uploaded_at`) VALUES
(1, 15, 65, 8, 'tutorialessay@gmail.com', '', 400, 'Graciellas-Essay(07-02-2019).docx', '', '3.0', 7, '2019-07-04 03:39:56'),
(2, 16, 66, 8, 'ismiyesung@gmail.com', '', 450, 'Ismi_Nurs-Essay(07-03-2019).docx', '', '3.8', 7, '2019-07-04 07:53:37'),
(3, 15, 67, 8, 'ismiyesung@gmail.com', '', 450, 'Ismi_Nurs-Essay(07-03-2019)1.docx', '', '4.5', 7, '2019-07-04 08:07:17'),
(4, 19, 68, 8, 'tutorialessay@gmail.com', '', 350, 'Graciellas-Essay(07-05-2019)1.docx', '', '3.7', 7, '2019-07-05 07:43:57'),
(5, 15, 73, 7, 'students@essay.com', '', 200, 'Tests-Essay(07-08-2019).docx', '', '2.7', 7, '2019-07-08 04:17:09'),
(6, 15, 74, 8, 'students@essay.com', '', 350, 'Tests-Essay(07-08-2019)1.docx', '', '2.7', 7, '2019-07-11 03:19:13'),
(7, 18, 75, 7, 'students@essay.com', '', 134, 'Tests-Essay(07-15-2019).docx', '', '3.5', 7, '2019-07-15 08:41:46'),
(8, 19, 76, 7, 'students@essay.com', '', 150, 'Studentss-Essay(07-22-2019).docx', '', '4.0', 7, '2019-07-22 08:02:03'),
(9, 15, 77, 7, 'ismiyesung@gmail.com', '', 123, 'Tests-Essay(07-22-2019).docx', '', '4.3', 7, '2019-07-22 09:55:29'),
(10, 15, 79, 3, 'students@essay.com', '', 70, 'Studentss-Essay(07-22-2019)1.docx', '', '4.2', 7, '2019-07-22 11:58:56'),
(11, 16, 80, 3, 'ismiyesung@gmail.com', '', 70, 'Tests-Essay(07-28-2019).docx', '', '0.0', 8, '2019-07-29 04:25:17'),
(12, 19, 78, 7, 'students@essay.com', '', 250, 'Studentss-Essay(07-30-2019).docx', '', '4.3', 7, '2019-07-30 08:06:26'),
(13, 16, 0, 7, 'aktsa@mejakita.com', 'paul.edison@all-inedu.com', 0, 'Naufals_Essay_by_Paul(07-31-2019).docx', '', '2.7', 7, '2019-07-31 08:03:38'),
(14, 14, 0, 3, 'aktsa@mejakita.com', 'paul.edison@all-inedu.com', 0, 'Naufals_Essay_by_Paul(07-31-2019)1.docx', '', '0.0', 0, '2019-07-31 00:36:21');

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

--
-- Dumping data for table `tbl_essay_editors`
--

INSERT INTO `tbl_essay_editors` (`id_essay_editors`, `id_essay_clients`, `editors_mail`, `attached_of_editors`, `notes_editors`, `status_essay_editors`, `uploaded_at`, `accepted_at`, `verified_at`) VALUES
(35, 1, 'ivana.rachmawati@all-inedu.com', 'Editing-Graciella-Essay-by-Ivana(02-07-2019).docx', 'Oke', 7, '2019-07-18 02:40:14', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 2, 'ivana.rachmawati@all-inedu.com', 'Editing-Ismi_Nur-Essay-by-Ivana(03-07-2019).docx', 'Oke', 7, '2019-07-03 02:49:39', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 3, 'ivana.rachmawati@all-inedu.com', 'Editing-Ismi_Nur-Essays-by-Ivana(03-07-2019)1.docx', 'Oke', 7, '2019-07-03 09:17:42', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 4, 'michelle.lee@all-inedu.com', 'Editing-Graciella-Essays-by-Michelle(05-07-2019).docx', 'Oke Thanks', 7, '2019-07-05 07:43:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 5, 'michelle.lee@all-inedu.com', 'Editing-Test-Essays-by-Michelle(08-07-2019).docx', 'Notes', 7, '2019-07-08 04:16:05', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 6, 'editors@essay.com', 'Editing-Test-Essays-by-Test(08-07-2019).docx', 'Thanks', 7, '2019-07-11 03:18:04', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 7, 'editors@essay.com', 'Editing-Test-Essay-by-Test(15-07-2019).docx', 'Thanks', 7, '2019-07-18 02:40:58', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 8, 'editors@essay.com', 'Editing-Students-Essay-by-Editors(22-07-2019)1.docx', 'Thankss', 7, '2019-07-22 07:49:43', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 9, 'editors@essay.com', 'Editing-Test-Essay-by-Editors(22-07-2019).docx', 'Thank You', 7, '2019-07-22 09:27:37', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 10, 'editors@essay.com', 'Editing-Students-Essays-by-Editors(22-07-2019)1.docx', 'thanks', 7, '2019-07-22 11:51:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 11, 'editors@essay.com', 'Editing-Test-Essay-by-Editors(29-07-2019).docx', 'Test', 8, '2019-07-29 04:25:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, 12, 'editors@essay.com', 'Editing-Students-Essay-by-Editors(30-07-2019).docx', 'Oke', 7, '2019-07-30 08:05:25', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, 13, 'michelle.lee@all-inedu.com', 'Editing-Naufal-Essays-by-Editors(31-07-2019).docx', 'Thanks', 7, '2019-07-31 07:49:32', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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

--
-- Dumping data for table `tbl_essay_feedback`
--

INSERT INTO `tbl_essay_feedback` (`id`, `id_essay_clients`, `option1`, `option2`, `option3`, `option4`, `option5`, `option6`, `add_comments`, `created_at`) VALUES
(3, 2, 4, 3, 4, 4, 4, 4, '', '2019-07-04 15:03:44'),
(4, 3, 4, 5, 5, 4, 5, 4, 'OKe', '2019-07-04 15:07:17'),
(5, 4, 4, 3, 4, 2, 4, 5, 'Thanks for editing.', '2019-07-05 14:43:57'),
(6, 5, 4, 2, 4, 3, 2, 1, 'Comments', '2019-07-08 11:17:09'),
(7, 6, 4, 2, 2, 3, 4, 1, '', '2019-07-11 10:19:13'),
(8, 7, 4, 3, 3, 4, 3, 4, 'Thank You', '2019-07-15 15:41:46'),
(9, 8, 5, 4, 3, 4, 3, 5, 'Thanks for editing', '2019-07-22 15:02:03'),
(10, 9, 4, 3, 4, 5, 5, 5, '', '2019-07-22 16:55:29'),
(11, 10, 4, 3, 4, 5, 4, 5, '', '2019-07-22 18:58:56'),
(12, 12, 5, 5, 5, 5, 5, 1, 'Editors name is good', '2019-07-30 15:06:26'),
(13, 13, 1, 3, 2, 4, 2, 4, 'Notes', '2019-07-31 15:03:38');

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
(13, 0, 'Personal Statement', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 2, '2019-07-02 03:46:38', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 18, 'Penn Supplement', 'The Admissions Committee would like to learn why you are a good fit for your undergraduate school choice (College of Arts and Sciences, School of Nursing, The Wharton School, or Penn Engineering). Please tell us about specific academic, service, and/or research opportunities at the University of Pennsylvania that resonate with your background, interests, and goals.', '', 1, '2019-07-02 03:49:02', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 17, 'Supplement - Community', 'Which of the academic communities and social communities that now comprise the University of Pennsylvania are most interesting to you and how will you contribute to them and to the larger Penn community?', '', 1, '2019-08-09 02:24:35', '2019-07-28 11:35:44', '0000-00-00 00:00:00'),
(16, 18, 'UPenn Supplement - Business & Technology', 'To be completed only by applicants to the Wharton/Engineering Coordinated Dual-Degree: Jerome Fisher Program in Management and Technology. 2a. Discuss your interest in combining management and technology. How might Penn\'s coordinated dual-degree program in business and engineering help you to meet your goals? Please be sure to address the nature and extent of your interests in both business and engineering.', '', 1, '2019-07-02 03:50:25', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 18, 'Why Penn M&T?', 'M & T: Jerome Fisher Program in Management and Technology\r\nExplain how you will use this program to explore your interest in business, engineering, and the intersection of the two. It is helpful to identify potential engineering and business paths available at Penn.', '', 1, '2019-07-02 03:52:01', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 16, 'NYU Suplemental', 'We would like to know more about your interest in NYU. We are particularly interested in knowing what motivated you to apply to NYU and more specifically, why you have applied or expressed interest in a particular campus, school, college, program, and/or area of study? If you have applied to more than one, please tell us why you are interested in each of the campuses, schools, colleges, or programs to which you have applied. You may be focused or undecided, or simply open to the options within NYU’s global network; regardless, we want to understand – Why NYU?', '', 1, '2019-07-02 04:36:55', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 23, 'UChicago Supplement', 'How does the University of Chicago, as you know it now, satisfy your desire for a particular kind of learning, community, and future? Please address with some specificity your own wishes and how they relate to UChicago.', '', 1, '2019-07-02 04:47:27', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 23, 'All-in Essay Editing', '12345', 'Notes', 2, '2019-07-29 03:43:36', '2019-07-29 03:43:18', '0000-00-00 00:00:00');

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

--
-- Dumping data for table `tbl_essay_status`
--

INSERT INTO `tbl_essay_status` (`id`, `id_essay_clients`, `status`, `created_at`) VALUES
(181, 1, 0, '2019-07-02 07:41:05'),
(182, 1, 1, '2019-07-02 07:42:10'),
(183, 1, 2, '2019-07-02 07:42:18'),
(184, 1, 3, '2019-07-02 07:42:34'),
(185, 1, 6, '2019-07-02 07:44:22'),
(186, 1, 8, '2019-07-02 07:53:06'),
(187, 1, 7, '2019-07-02 07:53:40'),
(188, 2, 0, '2019-07-03 02:37:11'),
(189, 2, 1, '2019-07-03 02:37:44'),
(190, 2, 5, '2019-07-03 02:47:50'),
(191, 2, 1, '2019-07-03 02:48:01'),
(192, 2, 2, '2019-07-03 02:48:11'),
(193, 2, 3, '2019-07-03 02:48:29'),
(194, 2, 6, '2019-07-03 02:49:10'),
(195, 2, 8, '2019-07-03 02:49:28'),
(196, 2, 7, '2019-07-03 02:49:39'),
(197, 3, 0, '2019-07-03 09:15:52'),
(198, 3, 1, '2019-07-03 09:16:05'),
(199, 3, 2, '2019-07-03 09:16:29'),
(200, 3, 3, '2019-07-03 09:17:23'),
(201, 3, 7, '2019-07-03 09:17:42'),
(202, 4, 0, '2019-07-05 07:41:04'),
(203, 4, 1, '2019-07-05 07:41:30'),
(204, 4, 2, '2019-07-05 07:42:16'),
(205, 4, 3, '2019-07-05 07:42:49'),
(206, 4, 7, '2019-07-05 07:43:17'),
(207, 5, 0, '2019-07-08 04:12:55'),
(208, 5, 1, '2019-07-08 04:13:31'),
(209, 5, 2, '2019-07-08 04:14:35'),
(210, 5, 3, '2019-07-08 04:15:20'),
(211, 5, 7, '2019-07-08 04:16:05'),
(212, 6, 0, '2019-07-08 04:21:42'),
(213, 6, 1, '2019-07-08 04:24:00'),
(214, 6, 5, '2019-07-08 04:25:01'),
(215, 6, 1, '2019-07-08 04:25:13'),
(216, 6, 2, '2019-07-08 04:25:26'),
(217, 6, 3, '2019-07-08 04:25:49'),
(218, 6, 7, '2019-07-11 03:18:04'),
(219, 7, 0, '2019-07-15 08:20:03'),
(220, 7, 1, '2019-07-15 08:21:48'),
(221, 7, 2, '2019-07-15 08:23:40'),
(222, 7, 3, '2019-07-15 08:24:24'),
(223, 7, 6, '2019-07-15 08:28:06'),
(224, 7, 8, '2019-07-15 08:28:44'),
(225, 7, 7, '2019-07-15 08:33:48'),
(226, 8, 0, '2019-07-22 06:46:02'),
(227, 8, 1, '2019-07-22 07:20:26'),
(228, 8, 2, '2019-07-22 07:21:53'),
(229, 8, 3, '2019-07-22 07:29:28'),
(230, 8, 6, '2019-07-22 07:34:56'),
(231, 8, 8, '2019-07-22 07:36:02'),
(232, 8, 6, '2019-07-22 07:48:10'),
(233, 8, 8, '2019-07-22 07:48:51'),
(234, 8, 7, '2019-07-22 07:49:43'),
(235, 9, 0, '2019-07-22 08:13:26'),
(236, 9, 1, '2019-07-22 08:14:03'),
(237, 9, 5, '2019-07-22 09:20:25'),
(238, 9, 1, '2019-07-22 09:20:44'),
(239, 9, 2, '2019-07-22 09:21:07'),
(240, 9, 3, '2019-07-22 09:23:32'),
(241, 9, 6, '2019-07-22 09:23:59'),
(242, 9, 8, '2019-07-22 09:27:20'),
(243, 9, 7, '2019-07-22 09:27:37'),
(244, 10, 0, '2019-07-22 11:35:47'),
(245, 10, 1, '2019-07-22 11:41:20'),
(246, 10, 2, '2019-07-22 11:45:12'),
(247, 10, 3, '2019-07-22 11:46:29'),
(248, 10, 7, '2019-07-22 11:51:17'),
(249, 11, 0, '2019-07-25 02:17:31'),
(250, 11, 0, '2019-07-28 12:17:42'),
(251, 11, 1, '2019-07-28 12:25:09'),
(252, 11, 4, '2019-07-28 12:27:10'),
(253, 11, 1, '2019-07-28 12:27:13'),
(254, 11, 4, '2019-07-28 12:28:02'),
(255, 11, 1, '2019-07-28 12:28:06'),
(256, 11, 4, '2019-07-28 13:35:49'),
(257, 11, 1, '2019-07-28 13:35:53'),
(258, 11, 4, '2019-07-28 13:54:17'),
(259, 11, 1, '2019-07-28 13:54:21'),
(260, 11, 4, '2019-07-28 14:08:28'),
(261, 11, 1, '2019-07-28 14:08:33'),
(262, 11, 2, '2019-07-29 02:09:12'),
(263, 11, 3, '2019-07-29 02:17:56'),
(264, 11, 6, '2019-07-29 02:22:01'),
(265, 11, 8, '2019-07-29 02:24:24'),
(266, 11, 7, '2019-07-29 02:29:09'),
(267, 11, 6, '2019-07-29 02:52:11'),
(268, 11, 7, '2019-07-29 02:52:21'),
(269, 11, 6, '2019-07-29 02:52:34'),
(270, 11, 8, '2019-07-29 02:53:22'),
(271, 11, 7, '2019-07-29 02:53:36'),
(272, 11, 6, '2019-07-29 02:54:02'),
(273, 11, 8, '2019-07-29 03:06:25'),
(274, 11, 6, '2019-07-29 03:08:01'),
(275, 11, 8, '2019-07-29 03:08:21'),
(276, 11, 6, '2019-07-29 03:17:51'),
(277, 11, 8, '2019-07-29 03:18:08'),
(278, 11, 6, '2019-07-29 03:20:04'),
(279, 11, 8, '2019-07-29 03:20:30'),
(280, 11, 7, '2019-07-29 03:21:01'),
(281, 11, 6, '2019-07-29 04:07:20'),
(282, 11, 8, '2019-07-29 04:23:39'),
(283, 11, 6, '2019-07-29 04:24:55'),
(284, 11, 8, '2019-07-29 04:25:17'),
(285, 12, 0, '2019-07-29 22:56:59'),
(286, 12, 0, '2019-07-29 22:59:50'),
(287, 13, 0, '2019-07-29 23:02:37'),
(288, 12, 0, '2019-07-30 07:47:55'),
(289, 12, 1, '2019-07-30 07:48:14'),
(290, 12, 2, '2019-07-30 07:49:35'),
(291, 12, 3, '2019-07-30 07:57:31'),
(292, 12, 7, '2019-07-30 07:58:26'),
(293, 12, 6, '2019-07-30 08:00:34'),
(294, 12, 8, '2019-07-30 08:04:44'),
(295, 12, 7, '2019-07-30 08:05:24'),
(296, 13, 0, '2019-07-30 23:32:53'),
(297, 14, 0, '2019-07-31 00:36:21'),
(298, 13, 1, '2019-07-31 07:39:10'),
(299, 13, 2, '2019-07-31 07:48:12'),
(300, 13, 3, '2019-07-31 07:48:57'),
(301, 13, 7, '2019-07-31 07:49:32');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_essay_tags`
--

CREATE TABLE `tbl_essay_tags` (
  `id` int(11) NOT NULL,
  `id_essay_clients` int(11) NOT NULL,
  `id_topic` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_essay_tags`
--

INSERT INTO `tbl_essay_tags` (`id`, `id_essay_clients`, `id_topic`) VALUES
(22, 1, 10),
(23, 1, 9),
(24, 1, 8),
(25, 1, 6),
(28, 2, 10),
(29, 2, 9),
(30, 2, 8),
(31, 2, 7),
(32, 2, 6),
(33, 3, 10),
(34, 3, 9),
(35, 3, 8),
(36, 3, 7),
(37, 4, 34),
(38, 4, 32),
(39, 4, 28),
(40, 4, 23),
(41, 4, 14),
(42, 4, 13),
(43, 4, 12),
(44, 5, 34),
(45, 5, 33),
(46, 5, 32),
(47, 5, 31),
(48, 5, 30),
(49, 5, 29),
(50, 5, 26),
(51, 5, 24),
(52, 5, 22),
(53, 5, 17),
(54, 6, 34),
(55, 6, 33),
(56, 6, 32),
(57, 6, 31),
(58, 6, 30),
(59, 6, 29),
(66, 7, 34),
(67, 7, 33),
(68, 7, 32),
(69, 7, 31),
(70, 7, 30),
(71, 7, 29),
(82, 8, 34),
(83, 8, 33),
(84, 8, 32),
(85, 8, 31),
(86, 8, 30),
(87, 8, 29),
(92, 9, 34),
(93, 9, 32),
(94, 9, 31),
(95, 9, 30),
(96, 9, 29),
(97, 9, 24),
(98, 9, 23),
(99, 9, 22),
(100, 9, 20),
(101, 9, 15),
(102, 9, 14),
(103, 10, 33),
(104, 10, 32),
(105, 10, 30),
(106, 10, 16),
(137, 11, 34),
(138, 11, 33),
(139, 11, 32),
(141, 12, 33),
(142, 12, 31),
(143, 12, 30),
(144, 12, 29),
(145, 13, 34),
(146, 13, 32),
(147, 13, 31),
(148, 13, 30);

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
(1, 'Devi', 'Kasih', '08121380178', 'kasih0027@gmail.com', 'University of Pennsylvania', 'Jl. Dr. Kasih No.1, RT.8/RW.1, Kebon Jeruk', 0, 1, '$2y$10$hcNxMuV2CgiH5J3dsY3vl.5/kU5ZVJt/VDPqtgNKRr3XmqDYvoR.K', '2019-06-20 22:12:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Nicholas', 'Hendra', '+62 811-1860', 'nicohs@gmail.com', 'Purdue University', 'Taman Kebon Jeruk f1/10', 0, 1, '$2y$10$/nvGmfRomqLK1N1oOr4uN.cl.68PEP6vr7l2eSvBcCUU88DfNYPVi', '2019-06-20 22:12:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Paul', 'Edison', '+62 822-3943', 'hafidz.bdt@gmail.com', NULL, 'Jl Panjang No. 36 Kebon Jeruk', 0, 1, '$2y$10$WHuQVnpG6SVunLHEr2PLeuKWL/62qAx2JFqCmbleImk0UdYCKUYR.', '2019-08-06 03:18:14', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Michelle', 'Lee', '+1 (650) 305', 'michelle.lee@all-inedu.com', NULL, 'Jl Panjang No. 36 Kebon Jeruk', 0, 1, '$2y$10$bIa2lK988GqFMMvoy/lmLO/0NdU3MoLAeO/dA.y4C2/m4.L8H.HS6', '2019-06-20 22:12:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Indira', 'Pranabudi', '+1 (253) 876', 'indira.pranabudi@all-inedu.com', NULL, 'Jl Panjang No. 36 Kebon Jeruk', 0, 1, '$2y$10$6N3BnKeCSd3r.cV6ASK4teyP99rBArpuvPf66kZ/Nlp82FxdrXLM6', '2019-06-20 22:12:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Michael', 'Kurniawan', '+1 (412) 608', 'michael.kurniawan@all-inedu.com', NULL, 'Jl Panjang No. 36 Kebon Jeruk', 0, 1, '$2y$10$2vTjXUshvuaOFKCBWJgvZeyOKpbGpZu5xcPOidArq/.UzixBE73tu', '2019-06-20 22:12:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Ivana', 'Rachmawati', '+62 812-1911', 'ivana.rachmawati@all-inedu.com', NULL, 'Jl Panjang No. 36 Kebon Jeruk', 0, 1, '$2y$10$2bJ35Sh0osFkEbzjAhVi8u5FNrtTpmukOEP3urTC2dknHwffepLC2', '2019-06-20 22:12:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Nadia', 'Purnama', '+62 811-2769', 'nadia.purnama@all-inedu.com', NULL, 'Jl Panjang No. 36 Kebon Jeruk', 0, 1, '$2y$10$bHIfyb0sf5G54j2ws1u1DeMjYclo8GcbQwdXrUcWEEmQERKaFRa1S', '2019-06-20 22:12:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Juniko', 'Widjaja', '+62 812-4125', 'juniko.widjaja@all-inedu.com', NULL, 'Jl Panjang No. 36 Kebon Jeruk', 0, 1, '$2y$10$hLasOWcwPQ14Rt/WuqxJJuo2J6kNLIxrxshzzuV52LgAgfryHHy.O', '2019-06-20 22:12:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Novia', 'Purnama', '+62 812-2502', 'novia.purnama@all-inedu.com', NULL, 'Jl Panjang No. 36 Kebon Jeruk', 0, 1, '$2y$10$Hj0/2/5TuBx8LS/im241I.62zZMYtNZwtftZW7Zu0TKKicYuLS7AG', '2019-06-20 22:12:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
(3, 'Essay Editing 1', 1, 'Essay Editing 50 - 100 Words', 0, 0, 50, 100, '72', 'Essay_Editing.png', 1, '2019-07-22 10:30:30', '2019-07-22 10:30:30', '0000-00-00 00:00:00'),
(4, 'Cover Letter Editing', 3, 'Cover Letter Editing', 0, 0, 0, 0, '72', 'Cover_Letter_Editing.png', 1, '2019-07-23 03:12:49', '2019-07-23 03:12:49', '0000-00-00 00:00:00'),
(6, 'Resume Editing', 2, 'Resume Editing', 0, 0, 0, 0, '72', 'Resume_Editing.png', 1, '2019-07-28 11:41:54', '2019-07-28 11:41:54', '0000-00-00 00:00:00'),
(7, 'Essay Editing 2', 1, 'Essay Editing 100 - 300 Words', 0, 0, 100, 300, '72', 'Essay_Editing1.png', 1, '2019-07-22 10:30:41', '2019-07-22 10:30:41', '0000-00-00 00:00:00'),
(8, 'Essay Editing 3', 1, 'Essay Editing 300 - 500 Words', 0, 0, 300, 500, '72', 'Essay_Editing2.png', 1, '2019-07-22 10:30:51', '2019-07-22 10:30:51', '0000-00-00 00:00:00'),
(9, 'Essay Editing', 1, 'Essay Editing', 500000, 30000, 500, 700, '72', 'Essay_Editing3.png', 2, '2019-07-06 11:48:38', '2019-07-02 09:12:04', '0000-00-00 00:00:00');

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
(0, 'Uploaded by Students/Mentors', 'Your essay has been uploaded.', 'You'),
(1, 'Assigned to Editors', 'Your essay has been assigned to editors.', 'System'),
(2, 'Accepted and Ongoing', 'Your essay has been accepted & processed.', 'Editor'),
(3, 'Uploaded by Editors', 'Editor\'s essay has been uploaded.', 'Editor'),
(4, 'Canceled', 'Your essay has been canceled to be assigned to editors.', 'System'),
(5, 'Rejected by Editors', 'Your essay has been rejected.', 'Editor'),
(6, 'Revision', 'Editor\'s essay must be corrected.', 'System'),
(7, 'Finished', 'Editor\'s essay has been verified.', 'System'),
(8, 'Revised by Editors', 'Editor\'s essay has been revised', 'Editor');

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
(6, '25.worldads@gmail.com', 'r5SfM7DNXelR2RQdVm0+QSLtoPIMnSZcHP5NHDVcrCY=', 1563242652),
(7, 'hafidzannur@ymail.com', 'wOr14Umv5UXHSQC8wrgDzEpamLLyKy5P069+mFoBKCs=', 1563420140);

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

--
-- Dumping data for table `tbl_transaction`
--

INSERT INTO `tbl_transaction` (`id`, `transaction_code`, `email`, `full_name`, `amount`, `total`, `status`, `upload_file`, `created_at`, `uploaded_at`, `verified_at`, `deleted_at`) VALUES
(65, 'INV-02072019-SYC60PRQ', 'tutorialessay@gmail.com', 'Graciella ', 1, 450000, 2, 'images.png', '2019-07-02 11:49:17', '2019-07-02 08:09:35', '2019-07-02 13:13:43', '0000-00-00 00:00:00'),
(66, 'INV-03072019-YQOJIDYJ', 'ismiyesung@gmail.com', 'Ismi Nur Aini', 1, 450000, 2, 'Selection_151.png', '2019-07-03 09:15:46', '2019-07-03 09:19:12', '2019-07-03 09:32:18', '0000-00-00 00:00:00'),
(67, 'INV-03072019-DXAGNWBK', 'ismiyesung@gmail.com', 'Ismi Nur Aini', 1, 450000, 2, 'kursus_ionic3.png', '2019-07-03 13:14:41', '2019-07-03 16:14:22', '2019-07-03 16:14:45', '0000-00-00 00:00:00'),
(68, 'INV-05072019-PKIJFA5S', 'tutorialessay@gmail.com', 'Graciella Lim', 1, 450000, 2, 'Selection_128.png', '2019-07-05 14:34:20', '2019-07-05 14:36:36', '2019-07-05 14:36:54', '0000-00-00 00:00:00'),
(70, 'INV-06072019-JOIQREID', 'ismiyesung@gmail.com', 'Ismi Nur Aini', 1, 300000, 2, 'Selection_148.png', '2019-07-06 19:26:59', '2019-07-06 19:30:42', '2019-07-06 19:33:23', '0000-00-00 00:00:00'),
(72, 'INV-06072019-L9TZXIMQ', 'ismiyesung@gmail.com', 'Ismi Nur Aini', 1, 300000, 0, '', '2019-07-06 19:45:38', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(73, 'INV-08072019-X48PAWNO', 'students@essay.com', 'Test Students', 1, 300000, 2, 'Selection_028.png', '2019-07-08 11:10:16', '2019-07-08 11:10:44', '2019-07-08 11:12:18', '0000-00-00 00:00:00'),
(74, 'INV-08072019-VP9ACSOZ', 'students@essay.com', 'Test Students', 1, 450000, 2, 'Selection_152.png', '2019-07-08 11:20:31', '2019-07-08 11:20:55', '2019-07-08 11:21:16', '0000-00-00 00:00:00'),
(75, 'INV-15072019-LUDPXUVZ', 'students@essay.com', 'Test Students', 1, 300000, 2, 'Image_from_iOS.png', '2019-07-15 15:18:38', '2019-07-15 15:19:09', '2019-07-15 15:19:32', '0000-00-00 00:00:00'),
(76, 'INV-22072019-CZ1KHPWM', 'students@essay.com', 'Students ', 1, 300000, 2, 'mbca.jpg', '2019-07-22 13:38:12', '2019-07-22 13:42:39', '2019-07-22 13:43:03', '0000-00-00 00:00:00'),
(77, 'INV-22072019-AOQMGAWG', 'ismiyesung@gmail.com', 'Test Students', 1, 300000, 2, 'mbca1.jpg', '2019-07-22 15:12:19', '2019-07-22 15:12:42', '2019-07-22 15:12:57', '0000-00-00 00:00:00'),
(78, 'INV-22072019-FGWP2ECI', 'students@essay.com', 'Students ', 1, 300000, 2, 'Finance_Database_Planning.jpg', '2019-07-22 17:09:00', '2019-07-30 14:46:41', '2019-07-30 14:47:21', '0000-00-00 00:00:00'),
(79, 'INV-22072019-XSXLHSTP', 'students@essay.com', 'Students ', 1, 0, 2, 'mbca2.jpg', '2019-07-22 18:26:18', '2019-07-22 18:27:16', '2019-07-22 18:27:42', '0000-00-00 00:00:00'),
(80, 'INV-23072019-N68L5B4X', 'ismiyesung@gmail.com', 'Test Students', 1, 0, 2, 'mbca3.jpg', '2019-07-23 10:56:38', '2019-07-25 09:16:01', '2019-07-25 09:16:12', '0000-00-00 00:00:00'),
(90, 'INV-08082019-INDF3YB8', 'ismiyesung@gmail.com', 'Test Students', 1, 0, 1, 'mbca4.jpg', '2019-08-08 10:44:50', '2019-08-08 10:52:35', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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

--
-- Dumping data for table `tbl_transaction_detail`
--

INSERT INTO `tbl_transaction_detail` (`id`, `transaction_code`, `id_program`, `qty`, `sub_total`) VALUES
(76, 'INV-02072019-SYC60PRQ', 8, 1, 450000),
(77, 'INV-03072019-YQOJIDYJ', 8, 1, 450000),
(78, 'INV-03072019-DXAGNWBK', 8, 1, 450000),
(79, 'INV-05072019-PKIJFA5S', 8, 1, 450000),
(81, 'INV-06072019-JOIQREID', 7, 1, 300000),
(83, 'INV-06072019-L9TZXIMQ', 3, 1, 300000),
(84, 'INV-08072019-X48PAWNO', 7, 1, 300000),
(85, 'INV-08072019-VP9ACSOZ', 8, 1, 450000),
(86, 'INV-15072019-LUDPXUVZ', 7, 1, 300000),
(87, 'INV-22072019-CZ1KHPWM', 7, 1, 300000),
(88, 'INV-22072019-AOQMGAWG', 7, 1, 300000),
(89, 'INV-22072019-FGWP2ECI', 7, 1, 300000),
(90, 'INV-22072019-XSXLHSTP', 3, 1, 0),
(91, 'INV-23072019-N68L5B4X', 3, 1, 0),
(101, 'INV-08082019-INDF3YB8', 7, 1, 0);

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
(0, '- Other -', '', '', '', 'default.png', '', '', 1, '2019-07-02 07:52:12', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'New York University', 'https://www.nyu.edu', 'registrar@nyu.edu', '(212) 998-1212', 'nyu.jpg', '70 Washington Square South \r\nNew York, NY, 10012', 'America', 1, '2019-07-02 09:02:10', '2019-07-02 09:02:10', '0000-00-00 00:00:00'),
(17, 'The University of Melbourne', 'https://www.unimelb.edu.au', '', '+(61 3) 9035 5511', 'unimleb.jpg', 'Campus Parkville - Grattan Street, \r\nParkville, Vi', 'Australia', 1, '2019-07-02 09:01:51', '2019-07-02 09:01:51', '0000-00-00 00:00:00'),
(18, 'University of Pennsylvania', 'https://www.upenn.edu', '', '(215) 898-5000', 'penn-logo.png', 'Philadelphia, PA 19104, USA', 'America', 1, '2019-07-02 09:01:36', '2019-07-02 09:01:36', '0000-00-00 00:00:00'),
(23, 'The University of Chicago', 'https://www.uchicago.edu', 'infocenter@uchicago.edu', '773.702.1234', 'uChicago.png', 'Edward H. Levi Hall\r\n5801 South Ellis Avenue\r\nChic', 'USA', 1, '2019-07-02 09:02:56', '2019-07-02 09:02:56', '0000-00-00 00:00:00'),
(24, 'Univ 2', 'https://www.nyu.edu', 'ismiyesung@gmail.com', '', 'monkey.png', '1234', 'Singapore', 2, '2019-07-29 03:40:06', '2019-07-29 03:39:43', '0000-00-00 00:00:00');

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
  ADD PRIMARY KEY (`id_clients`),
  ADD UNIQUE KEY `email` (`email`);

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
  ADD PRIMARY KEY (`id_essay_clients`),
  ADD KEY `prompt` (`id_essay_prompt`),
  ADD KEY `prog` (`id_program`),
  ADD KEY `student` (`email`);

--
-- Indexes for table `tbl_essay_editors`
--
ALTER TABLE `tbl_essay_editors`
  ADD PRIMARY KEY (`id_essay_editors`),
  ADD KEY `editors` (`editors_mail`),
  ADD KEY `essay_of_clients` (`id_essay_clients`);

--
-- Indexes for table `tbl_essay_feedback`
--
ALTER TABLE `tbl_essay_feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_essay_clients` (`id_essay_clients`);

--
-- Indexes for table `tbl_essay_prompt`
--
ALTER TABLE `tbl_essay_prompt`
  ADD PRIMARY KEY (`id_essay_prompt`),
  ADD KEY `univ` (`id_univ`);

--
-- Indexes for table `tbl_essay_status`
--
ALTER TABLE `tbl_essay_status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `essay` (`id_essay_clients`);

--
-- Indexes for table `tbl_essay_tags`
--
ALTER TABLE `tbl_essay_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tags` (`id_topic`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transaction_code` (`transaction_code`);

--
-- Indexes for table `tbl_transaction_detail`
--
ALTER TABLE `tbl_transaction_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trans` (`transaction_code`);

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
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `id_category` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_editors`
--
ALTER TABLE `tbl_editors`
  MODIFY `id_editors` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_essay_clients`
--
ALTER TABLE `tbl_essay_clients`
  MODIFY `id_essay_clients` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_essay_editors`
--
ALTER TABLE `tbl_essay_editors`
  MODIFY `id_essay_editors` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `tbl_essay_feedback`
--
ALTER TABLE `tbl_essay_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_essay_prompt`
--
ALTER TABLE `tbl_essay_prompt`
  MODIFY `id_essay_prompt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_essay_status`
--
ALTER TABLE `tbl_essay_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=302;

--
-- AUTO_INCREMENT for table `tbl_essay_tags`
--
ALTER TABLE `tbl_essay_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `tbl_mentors`
--
ALTER TABLE `tbl_mentors`
  MODIFY `id_mentors` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_programs`
--
ALTER TABLE `tbl_programs`
  MODIFY `id_program` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_tags`
--
ALTER TABLE `tbl_tags`
  MODIFY `id_topic` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_token`
--
ALTER TABLE `tbl_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `tbl_transaction_detail`
--
ALTER TABLE `tbl_transaction_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `tbl_universities`
--
ALTER TABLE `tbl_universities`
  MODIFY `id_univ` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_editors`
--
ALTER TABLE `tbl_editors`
  ADD CONSTRAINT `pos` FOREIGN KEY (`position`) REFERENCES `tbl_position_editors` (`id_position`);

--
-- Constraints for table `tbl_essay_clients`
--
ALTER TABLE `tbl_essay_clients`
  ADD CONSTRAINT `prog` FOREIGN KEY (`id_program`) REFERENCES `tbl_programs` (`id_program`),
  ADD CONSTRAINT `prompt` FOREIGN KEY (`id_essay_prompt`) REFERENCES `tbl_essay_prompt` (`id_essay_prompt`),
  ADD CONSTRAINT `student` FOREIGN KEY (`email`) REFERENCES `tbl_clients` (`email`);

--
-- Constraints for table `tbl_essay_editors`
--
ALTER TABLE `tbl_essay_editors`
  ADD CONSTRAINT `tbl_essay_editors_ibfk_1` FOREIGN KEY (`id_essay_clients`) REFERENCES `tbl_essay_clients` (`id_essay_clients`);

--
-- Constraints for table `tbl_essay_feedback`
--
ALTER TABLE `tbl_essay_feedback`
  ADD CONSTRAINT `tbl_essay_feedback_ibfk_1` FOREIGN KEY (`id_essay_clients`) REFERENCES `tbl_essay_clients` (`id_essay_clients`);

--
-- Constraints for table `tbl_essay_prompt`
--
ALTER TABLE `tbl_essay_prompt`
  ADD CONSTRAINT `tbl_essay_prompt_ibfk_1` FOREIGN KEY (`id_univ`) REFERENCES `tbl_universities` (`id_univ`);

--
-- Constraints for table `tbl_essay_status`
--
ALTER TABLE `tbl_essay_status`
  ADD CONSTRAINT `essay` FOREIGN KEY (`id_essay_clients`) REFERENCES `tbl_essay_clients` (`id_essay_clients`);

--
-- Constraints for table `tbl_essay_tags`
--
ALTER TABLE `tbl_essay_tags`
  ADD CONSTRAINT `tags` FOREIGN KEY (`id_topic`) REFERENCES `tbl_tags` (`id_topic`);

--
-- Constraints for table `tbl_transaction_detail`
--
ALTER TABLE `tbl_transaction_detail`
  ADD CONSTRAINT `trans` FOREIGN KEY (`transaction_code`) REFERENCES `tbl_transaction` (`transaction_code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
