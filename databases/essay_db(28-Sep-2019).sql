-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 28, 2019 at 12:00 PM
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
  `personal_brand` text NOT NULL,
  `interests` text NOT NULL,
  `personalities` text NOT NULL,
  `resume` varchar(250) NOT NULL,
  `questionnaire` varchar(250) NOT NULL,
  `others` varchar(250) NOT NULL,
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

INSERT INTO `tbl_clients` (`id_clients`, `first_name`, `last_name`, `phone`, `email`, `birthdate`, `country`, `state`, `city`, `postal_code`, `address`, `id_mentor`, `current_school`, `school_name`, `curriculum`, `year`, `image`, `personal_brand`, `interests`, `personalities`, `resume`, `questionnaire`, `others`, `role`, `status`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
(0, 'Students', 'Name', '081111111111', 'essay-student@all-inedu.com', '1998-06-04', 'Indonesia', '', 'Jakarta Barat', '11530', 'JL Panjang No. 36 Jakarta Barat', 0, 'SMA', 'SMA N 1 Jakarta', '', 0, '', '<p><strong>Where does it come from?</strong></p><p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', '<p><strong>Where does it come from?</strong></p><p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', '<p><strong>Where does it come from?</strong></p><p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 'Resume-Students(27-09-2019).docx', 'Questionnaire-Students(27-09-2019).docx', 'Others-Students(27-09-2019).docx', 'clients', 1, '$2y$10$s.TucPgWfW4.ROU/rQ3X6OhlvIjyGw5uZXdafx/VKQdz5vUA3kOHm', '2019-09-27 06:44:06', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1, 'Graciella', NULL, '081519307310', 'ciellaindria28@gmail.com', '0000-00-00', '', '', '', '', 'Taman Ratu Indah Blok i-1 No.3, Kedoya Selatan, Kebon Jarak', 1, '', '', '', 0, '', '', '', '', '', '', '', '', 1, '$2y$10$QW1HANhzG5U1uh/gyccMEeBleGm7DnWOsmXM7YvR9mx8HS5JptMqC', '2019-09-16 04:04:25', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Carina  Angel', 'Natanael', '087785193555', 'carinangeln@gmail.com', '0000-00-00', '', '', '', '', 'Taman Ratu Indah Blok i-1 No.3, Kedoya Selatan, Jakarta Barat', 1, '', '', '', 0, '', '', '', '', '', '', '', '', 1, '$2y$10$HcqFQ9/8ujJjgasOEzyCru4zIuLtMAMdwZIz596Zu.4kt.VkxWoi6', '2019-09-16 04:04:25', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Jeremy', NULL, '081290908968', 'jpek342@gmail.com', '0000-00-00', '', '', '', '', 'Taman permata buana jalan pulau panjang 7 Blok C15 No. 2', 2, '', '', '', 0, '', '', '', '', '', '', '', '', 1, '$2y$10$LCy3in4sIRr7krU89zuaVuh/OsrXBdH/MfH1hqow4NbiEjWLXGjjq', '2019-09-16 04:04:25', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Aaman', 'Basra', '08119514007', 'rajat.basra@gmail.com', '0000-00-00', '', '', '', '', 'Jl. Casablanca Raya Kav.88 Jakarta Selatan 12870', 1, '', '', '', 0, '', '', '', '', '', '', '', '', 1, '$2y$10$h.o2Np9PYvzB1R3VFCOOcu/dHF9.w/WeJZ.ud7ORMQTUpjppO864q', '2019-09-16 04:04:25', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Kenneth', 'Benjamin Sutedjo', '087877733529', 'kennethsutedjo1643@gmail.com', '0000-00-00', '', '', '', '', 'Apartemen Permata Gandaria', 4, '', '', '', 0, '', '', '', '', '', '', '', '', 1, '$2y$10$IH3L9T4HHdMVoGsGhOBjXOfyAJKWN00xCNwWKYYC2GKoN.xYWEQhW', '2019-09-26 03:58:18', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'Nimas Ulinar', 'Damessa Sinaga', '081310496408', 'gsinaga.loreal@gmail.com', '0000-00-00', '', '', '', '', 'Bukit Golf Riverside Residence Blok 3 C2 No.5 Bojong Nangka', 2, '', '', '', 0, '', '', '', '', '', '', '', '', 1, '$2y$10$hlqD8ERdR8fArk7ORVORUevL4wM4lCz/9x6nvkVJ/YxsBmlCFonmS', '2019-09-16 04:04:25', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'Stefanus Randy', 'Oenardi Raharjo', '081210444849', 'stefanusrandy@gmail.com', '0000-00-00', '', '', '', '', 'Jalan Boulevard Palem Raya No.1853 Lippo Karawaci Tangerang 15811', 1, '', '', '', 0, '', '', '', '', '', '', '', '', 1, '$2y$10$PALzWk7J9VDoglbjOYlKR.gfi3vD/cillIKwRSUI/OvViEKnnYGBC', '2019-09-16 04:04:25', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'Sneha', 'Kumar', '087727303443', 'skumar@mtview.id', '0000-00-00', '', '', '', '', 'Jl. Yudhistira II No.7A, Grogol Baru', 2, '', '', '', 0, '', '', '', '', '', '', '', '', 1, '$2y$10$meZcp2SrcHJ4Wu8UDi.WJe2N/rlHj3FwVUMqLfafcsahxQCONSrii', '2019-09-16 04:04:25', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 'Raisa', 'Hidayat', '0818770063', 'raisa.j.hidayat@gmail.com', '0000-00-00', '', '', '', '', 'Jl. Pengadegan Selatan VII No.67 Pancoran', 1, '', '', '', 0, '', '', '', '', '', '', '', '', 1, '$2y$10$phdGsmOtsHgokbWFv51BRuZKPaR3RW1Ckcfs73XcDGTGKkYBtAt4a', '2019-09-16 04:04:25', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 'Daven', 'Giftian Tejalaksana', '08161922282', 'daven.giftian@gmail.com', '0000-00-00', '', '', '', '', 'Puri Botanical Residences', 1, '', '', '', 0, '', '', '', '', '', '', '', '', 1, '$2y$10$fVDWQKIo6zefCzdST6x8j.RVBQPeF9k/BkVnE4ecpynCwq5jWP5F.', '2019-09-16 04:04:25', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 'Elysa Faith', 'Ng May May', '08170052002', 'indiana_lesmana@yahoo.com', '0000-00-00', '', '', '', '', 'Jl. Tanjung Duren Utara IIIB No.249', 1, '', '', '', 0, '', '', '', '', '', '', '', '', 1, '$2y$10$nD3T50DK9KFweEonPBnkk..a9pRJs2HLL6MMhuiiknyLuPjbVt.JG', '2019-09-16 04:04:25', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 'Nelson', NULL, '081218767374', 'franciscalukman077@gmail.com', '0000-00-00', '', '', '', '', 'JL. Way Besai No.77 Tanjung Duren Selatan', 1, '', '', '', 0, '', '', '', '', '', '', '', '', 1, '$2y$10$vgJhS6Ld1JnnXkjtRWtflOcs1Tc5.3kM4y4ZgQJ0qwPjTB4ax/dMa', '2019-09-16 04:04:25', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 'Felicia', 'Margaretha Gono', '0818662002', 'velika.charlicia@gmail.com', '0000-00-00', '', '', '', '', 'Taman Kebon Permata Buana Jl.Pulau Pantaar 2 Blok N3 No.19', 1, '', '', '', 0, '', '', '', '', '', '', '', '', 1, '$2y$10$sB86hTQMZKX2vxhC9OriZOgu56zhECI5bR3znLHeRFii.fanUrjsW', '2019-09-16 04:04:25', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 'Aaron', 'Louis Tan', '0818333268', 'isabelchen17@yahoo.com', '0000-00-00', '', '', '', '', 'Jalan Raya Fatmawati No: 28D', 1, '', '', '', 0, '', '', '', '', '', '', '', '', 1, '$2y$10$vtsM3Oia9mMSq.hR/cfkY.gEQG5A2k05OmRm9zHrUn.OF/NE1K9KO', '2019-09-16 04:04:25', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 'Rachel', 'Widjajanto Puspawidjaja', '081805057111', 'rachel.widjajanto@gmail.com', '0000-00-00', '', '', '', '', 'Jl. Alamanda Bawah Blok VIII No.12 Graha Candi Golf', 2, '', '', '', 0, '', '', '', '', '', '', '', '', 1, '$2y$10$NRgc1VO5wWdt80P6C5pnPO1Y2jT0ilzsH/P02sBjwJnr5gGtFGvRe', '2019-09-16 04:04:25', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 'Christopher', 'Putra Joe', '0818999399', 'fdchandrra@yahoo.com', '0000-00-00', '', '', '', '', 'Jalan Sisingamangaraja No.7', 2, '', '', '', 0, '', '', '', '', '', '', '', '', 1, '$2y$10$D.YkLVsccZsgjnrefJJWoeeewOKcA4K1LmD9LwGqzXz964t6Mrd2a', '2019-09-16 04:04:25', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 'Romero', 'Roswell Isa', '0857869457', 'romzrobot@gmail.com', '0000-00-00', '', '', '', '', 'Jl. Gunung Kandora No.106 Tanjung Bunga', 6, '', '', '', 0, '', '', '', '', '', '', '', '', 1, '$2y$10$mvMjn7.rYZAnBBvtzErycutxxLNdo.Lfs9yjxQBmXKKv01KkUbmnS', '2019-09-16 04:04:25', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 'Kireyna', 'Aurelia Santoso', '089613267851', 'kirey14123@gmail.com', '0000-00-00', '', '', '', '', 'Taman Bougenville Golf B3 No.5 Golf Estate Bogor Raya', 7, '', '', '', 0, '', '', '', '', '', '', '', '', 1, '$2y$10$xfAAVAGvOvbVYXrXIIy8beeCqbPUW.84xO1L5PDeydP7ESBycwKR2', '2019-09-16 04:04:25', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, 'Dwiki', 'Anugrah', '081380130016', 'tari.kshardjo@gmail.com', '0000-00-00', '', '', '', '', 'Jl. Peninggaran Timur I No.44', 2, '', '', '', 0, '', '', '', '', '', '', '', '', 1, '$2y$10$2qq2UwLbysKXZV9eEojTyO2InRH2.Qd2tsTTkzAEQCDeGQHKFIGe6', '2019-09-26 03:58:18', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 'Naufal', 'Aktsa', '081806408291', 'aktsa@mejakita.com', '0000-00-00', '', '', '', '', 'Emerald View Blok H-19 Bintaro Sektor 9', 3, '', '', '', 0, '', '', '', '', '', '', '', '', 1, '$2y$10$m/I6VQpTitHO1e25wM3m/OjZO85cMECfSIBl2weBXpg6mnk0P7dGO', '2019-09-16 04:04:25', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, 'Cassandra', 'Milla Hemasurya', '081390392525', 'Cassie@hemasurya.net', '0000-00-00', '', '', '', '', 'Jl. Dieng No.5B Gajah Mungkur', 3, '', '', '', 0, '', '', '', '', '', '', '', '', 1, '$2y$10$w1K8scc/cywe1jIXeHa6I.gx4TpI2p8DXx27IujjzB97QVSK5iDAW', '2019-09-16 04:04:25', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, 'Ronan', 'Mahtolia', '081546500143', 'rmahtolia@id.indorama.net', '0000-00-00', '', '', '', '', 'Simprug Indah Apartment Jakarta', 6, '', '', '', 0, '', '', '', '', '', '', '', '', 1, '$2y$10$LdxSzC0Pu5XEpXp7EhDNxOEs7r4UJIK2mr8fZLHrJhT4jifyZJa32', '2019-09-16 04:04:25', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, 'Andrea', 'Martiandy', '087822783353', 'vlynnlaurentia@gmail.com', '0000-00-00', '', '', '', '', 'Setraduta lestari F2 No. 20 Bandung', 11, '', '', '', 0, '', '', '', '', '', '', '', '', 1, '$2y$10$cwQm5fopoSvq2fSDadZlneZYtJeh0YANO0RvdtZkzv3L90qrrHlcS', '2019-09-26 04:01:19', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(79, 'Audrey', 'Silalahi', '08121094506', 'shelly.silalahi@yahoo.com', '0000-00-00', '', '', '', '', 'Jalan Cipinang Cempedak 2 No.23', 1, '', '', '', 0, '', '', '', '', '', '', '', '', 1, '$2y$10$rQyfxn3VOlDO2boIm6OPROu9gr3xAs5lXbQ9buzrt9teAavsGa3ZS', '2019-09-16 04:04:25', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(83, 'Alyssa', 'Limit', '081290165855', 'alyssalmt28@gmail.com', '0000-00-00', '', '', '', '', 'Jalan Griya Manikam Blok G No.7', 1, '', '', '', 0, '', '', '', '', '', '', '', '', 1, '$2y$10$eXVntU6qsIAWGD1kQn0oQ.TbLgrojWF6Ar9ZtKtu/qjSB7Zc8QPT.', '2019-09-16 04:04:25', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(85, 'Tiara', 'Soemedi', '08111816688', 'asoemedi@gmail.com', '0000-00-00', '', '', '', '', 'Pluit Putri 2 No.1', 12, '', '', '', 0, '', '', '', '', '', '', '', '', 1, '$2y$10$ja/sYzrXnu9XQ8er7fG0vuEv.wOiYoOtrdYZMM5nI.3MsHeKSM1n6', '2019-09-26 04:00:29', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(89, 'Ian', 'Pratama Ahadi', '08129686688', 'ianpahadi@gmail.com', '0000-00-00', '', '', '', '', 'JL. WR. Supratman No.28 Tangerang Banten 15412', 12, '', '', '', 0, '', '', '', '', '', '', '', '', 1, '$2y$10$8S.XkuE8wfMXQSztbrOOj.eDhCN6Gwmdh9VhYy7LQ5BEwzUB7CnNu', '2019-09-26 04:17:10', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(90, 'Alvino', 'Setiabaharis', '0816894465', 'sbaharis@yahoo.com', '0000-00-00', '', '', '', '', 'Jl. Tirtayasa VII No.9 Kebayoran Baru', 12, '', '', '', 0, '', '', '', '', '', '', '', '', 1, '$2y$10$eUEAS6rD6GldDF4j4S8Mb.JwM5OlaWrtFDnowRnRcm2Olz72rL6AO', '2019-09-26 04:17:10', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(92, 'Kareem', 'Natanegara', '08111200482', 'dmchastity@chevron.com', '0000-00-00', '', '', '', '', 'Janur Hijau 10 Blok TR2 No.8', 2, '', '', '', 0, '', '', '', '', '', '', '', '', 1, '$2y$10$gJ30piZWKsD5NYvKm.jIzuzNBfnXbaPz7mBqPEqs7ki5EEb47SAz.', '2019-09-26 04:17:10', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
(2, 'Essay Editor', '3', '1234567890', 'essay-editor3@all-inedu.com', 'University of Pennsylvania', 'Business', 'Jakarta Barat', 2, 'default.png', 0, 0, 1, '$2y$10$XmWnYqZ0PrMkHIBiEmMEmeEhz/q0QJ1fCPr0O0T0l/UDPwjWF8jO2', '2019-08-23 07:46:35', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Hafidz Annur', 'Fanany', '089653642318', 'hafidz.bdt@gmail.com', 'STMIK Duta Bangsa Surakarta', 'Sistem Informasi', 'Jakarta', 1, 'default.png', 0, 0, 1, '$2y$10$.lMtjUk/8AD/gGVrLc8rSee3G5w6rYTuD5bQvtiYXv7vEZcV.hqIW', '2019-09-26 02:24:03', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_essay_clients`
--

CREATE TABLE `tbl_essay_clients` (
  `id_essay_clients` int(11) NOT NULL,
  `id_transaction` int(11) NOT NULL,
  `id_program` int(2) NOT NULL,
  `id_univ` int(11) NOT NULL,
  `essay_title` varchar(250) DEFAULT NULL,
  `essay_prompt` text,
  `email` varchar(50) NOT NULL,
  `mentors_mail` varchar(50) NOT NULL,
  `essay_deadline` datetime NOT NULL,
  `application_deadline` datetime NOT NULL,
  `number_of_words` int(11) NOT NULL,
  `attached_of_clients` varchar(50) NOT NULL,
  `notes_clients` text NOT NULL,
  `essay_rating` decimal(11,1) NOT NULL,
  `status_essay_clients` int(11) NOT NULL,
  `status_read` int(11) NOT NULL,
  `status_read_editor` int(11) NOT NULL,
  `uploaded_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `completed_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_essay_clients`
--

INSERT INTO `tbl_essay_clients` (`id_essay_clients`, `id_transaction`, `id_program`, `id_univ`, `essay_title`, `essay_prompt`, `email`, `mentors_mail`, `essay_deadline`, `application_deadline`, `number_of_words`, `attached_of_clients`, `notes_clients`, `essay_rating`, `status_essay_clients`, `status_read`, `status_read_editor`, `uploaded_at`, `completed_at`) VALUES
(1, 0, 2, 3, 'UCAS', '<p>What is Lorem Ipsum?</p><p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'essay-student@all-inedu.com', 'essay-mentor@all-inedu.com', '2019-09-30 00:00:00', '2019-10-31 00:00:00', 0, 'Studentss_Essay_by_Essay(09-27-2019)3.docx', '', '0.0', 2, 1, 1, '2019-09-27 07:45:09', '0000-00-00 00:00:00'),
(2, 0, 3, 2, 'Common App', '<p>What is Lorem Ipsum?</p><p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'essay-student@all-inedu.com', 'essay-mentor@all-inedu.com', '2019-10-08 00:00:00', '2019-10-31 00:00:00', 0, 'Studentss_Essay_by_Essay(09-27-2019)4.docx', '', '0.0', 7, 0, 1, '2019-09-27 07:56:47', '2019-09-27 09:25:48'),
(3, 0, 3, 2, 'Supplemental Essay', '<p>Why do we use it?</p><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 'essay-student@all-inedu.com', 'essay-mentor@all-inedu.com', '2019-10-09 00:00:00', '2019-10-31 00:00:00', 0, 'Studentss_Essay_by_Essay(09-27-2019)5.docx', '', '0.0', 5, 1, 1, '2019-09-27 08:22:35', '0000-00-00 00:00:00'),
(4, 0, 2, 3, 'Common App', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'essay-student@all-inedu.com', 'essay-mentor@all-inedu.com', '2019-09-29 00:00:00', '2019-10-24 00:00:00', 0, 'Studentss_Essay_by_Essay(09-27-2019)6.docx', '', '0.0', 7, 0, 1, '2019-09-27 15:04:20', '2019-09-28 01:11:52'),
(5, 0, 3, 3, 'Common App', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'essay-student@all-inedu.com', 'essay-mentor@all-inedu.com', '2019-09-29 00:00:00', '2019-10-24 00:00:00', 0, 'Studentss_Essay_by_Essay(09-27-2019)7.docx', '', '0.0', 7, 0, 1, '2019-09-27 15:06:47', '2019-09-28 01:30:26'),
(6, 0, 3, 2, 'Supplemental Essay', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'essay-student@all-inedu.com', 'essay-mentor@all-inedu.com', '2019-09-30 00:00:00', '2019-10-30 00:00:00', 0, 'Studentss_Essay_by_Essay(09-27-2019)8.docx', '', '0.0', 7, 0, 1, '2019-09-27 15:07:25', '2019-09-28 04:49:53'),
(7, 0, 3, 2, 'Title', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'essay-student@all-inedu.com', 'essay-mentor@all-inedu.com', '2019-10-02 00:00:00', '2019-10-31 00:00:00', 0, 'Studentss_Essay_by_Essay(09-27-2019)9.docx', '', '0.0', 0, 0, 1, '2019-09-27 15:08:01', '0000-00-00 00:00:00');

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
  `read` int(11) NOT NULL,
  `uploaded_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_essay_editors`
--

INSERT INTO `tbl_essay_editors` (`id_essay_editors`, `id_essay_clients`, `editors_mail`, `attached_of_editors`, `work_duration`, `notes_editors`, `status_essay_editors`, `read`, `uploaded_at`) VALUES
(28, 2, 'essay-editor1@all-inedu.com', 'Editing-Students-Essays-by-Essay_Editor(27-09-2019).docx', 45, '', 7, 1, '2019-09-27 09:26:20'),
(30, 1, 'essay-editor1@all-inedu.com', '', 0, '', 2, 1, '2019-09-27 14:39:36'),
(31, 4, 'essay-editor1@all-inedu.com', 'Editing-Students-Essays-by-Essay_Editor(28-09-2019).docx', 45, '', 7, 1, '2019-09-28 01:33:52'),
(32, 5, 'essay-editor3@all-inedu.com', 'Editing-Students-Essay-by-Essay_Editor(28-09-2019).docx', 45, '', 7, 1, '2019-09-28 01:31:44'),
(33, 6, 'essay-editor3@all-inedu.com', 'Editing-Students-Essays-by-Essay_Editor(28-09-2019)1.docx', 45, '', 7, 1, '2019-09-28 04:50:00');

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

--
-- Dumping data for table `tbl_essay_reject`
--

INSERT INTO `tbl_essay_reject` (`id`, `id_essay_clients`, `editors_mail`, `notes`, `created_at`) VALUES
(1, 3, 'essay-editor1@all-inedu.com', '<p>Sorry</p>', '2019-09-27 21:29:00');

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

--
-- Dumping data for table `tbl_essay_revise`
--

INSERT INTO `tbl_essay_revise` (`id`, `id_essay_clients`, `editors_mail`, `admin_mail`, `role`, `notes`, `created_at`) VALUES
(1, 5, 'essay-editor3@all-inedu.com', 'essay-editor1@all-inedu.com', 'managing_editor', '<p>Test</p>', '2019-09-28 08:23:21'),
(2, 5, 'essay-editor3@all-inedu.com', 'essay-editor1@all-inedu.com', 'managing_editor', '<p>Tes Notif</p>', '2019-09-28 08:25:54'),
(3, 5, 'essay-editor3@all-inedu.com', 'essay-editor1@all-inedu.com', 'managing_editor', '<p>Tes Notif</p>', '2019-09-28 08:25:58'),
(4, 6, 'essay-editor3@all-inedu.com', 'hafidz.bdt@gmail.com', 'admin', '<p>Test</p>', '2019-09-28 11:46:50'),
(5, 6, 'essay-editor3@all-inedu.com', 'essay-editor1@all-inedu.com', 'managing_editor', '<p>Test Notif</p>', '2019-09-28 11:47:38');

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
(1, 1, 0, '2019-09-27 07:45:09'),
(2, 2, 0, '2019-09-27 07:56:47'),
(3, 3, 0, '2019-09-27 08:22:35'),
(4, 1, 1, '2019-09-27 08:37:44'),
(5, 1, 4, '2019-09-27 08:39:04'),
(6, 1, 1, '2019-09-27 08:39:18'),
(7, 1, 2, '2019-09-27 08:47:18'),
(8, 2, 1, '2019-09-27 09:19:49'),
(9, 2, 2, '2019-09-27 09:22:10'),
(10, 2, 3, '2019-09-27 09:23:43'),
(11, 2, 7, '2019-09-27 09:25:44'),
(12, 3, 1, '2019-09-27 09:41:57'),
(13, 1, 4, '2019-09-27 09:59:47'),
(14, 3, 5, '2019-09-27 14:29:00'),
(15, 1, 1, '2019-09-27 14:39:10'),
(16, 1, 2, '2019-09-27 14:39:30'),
(17, 4, 0, '2019-09-27 15:04:20'),
(18, 5, 0, '2019-09-27 15:06:47'),
(19, 6, 0, '2019-09-27 15:07:25'),
(20, 7, 0, '2019-09-27 15:08:01'),
(21, 4, 1, '2019-09-27 15:08:30'),
(22, 5, 1, '2019-09-27 15:23:36'),
(23, 4, 2, '2019-09-27 16:09:32'),
(24, 4, 3, '2019-09-28 01:11:24'),
(25, 4, 7, '2019-09-28 01:11:47'),
(26, 5, 2, '2019-09-28 01:21:58'),
(27, 5, 3, '2019-09-28 01:22:45'),
(28, 5, 6, '2019-09-28 01:23:21'),
(29, 5, 6, '2019-09-28 01:25:54'),
(30, 5, 6, '2019-09-28 01:25:58'),
(31, 5, 8, '2019-09-28 01:26:30'),
(32, 5, 7, '2019-09-28 01:30:12'),
(33, 6, 1, '2019-09-28 04:43:41'),
(34, 6, 2, '2019-09-28 04:45:16'),
(35, 6, 3, '2019-09-28 04:46:21'),
(36, 6, 6, '2019-09-28 04:46:50'),
(37, 6, 6, '2019-09-28 04:47:38'),
(38, 6, 7, '2019-09-28 04:49:50');

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
(1, 2, 32),
(2, 2, 31),
(3, 2, 26),
(4, 2, 16),
(5, 4, 32),
(6, 4, 30),
(7, 4, 23),
(8, 4, 15),
(9, 4, 14),
(10, 4, 10),
(14, 5, 31),
(15, 6, 31),
(16, 6, 28);

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
(0, 'Essay', 'Mentors', '', 'essay-mentor@all-inedu.com', NULL, '', 0, 1, '$2y$10$mcOw/bNTPu3ax8Sy4nWzBuPrkzksuspML5kQVhGJvF1BWH9/5WngC', '2019-09-27 08:15:25', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1, 'Devi', 'Kasih', '08121380178', 'kasih0027@gmail.com', 'University of Pennsylvania', 'Jl. Dr. Kasih No.1, RT.8/RW.1, Kebon Jeruk', 0, 1, '$2y$10$hcNxMuV2CgiH5J3dsY3vl.5/kU5ZVJt/VDPqtgNKRr3XmqDYvoR.K', '2019-09-16 04:04:51', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Nicholas', 'Hendra', '+62 811-1860', 'nicohs@gmail.com', 'Purdue University', 'Taman Kebon Jeruk f1/10', 0, 1, '$2y$10$/nvGmfRomqLK1N1oOr4uN.cl.68PEP6vr7l2eSvBcCUU88DfNYPVi', '2019-09-16 04:04:51', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Paul', 'Edison', '+62 822-3943', 'paul.edison@all-inedu.com', NULL, 'Jl Panjang No. 36 Kebon Jeruk', 0, 1, '$2y$10$SgnRGh9AyLZ7fDdS5Q9qDuosIkQniGgY4dAoIP8iwkYcuzfwJD.vS', '2019-09-16 04:04:51', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Michelle', 'Lee', '+1 (650) 305', 'michelle.lee@all-inedu.com', NULL, 'Jl Panjang No. 36 Kebon Jeruk', 0, 1, '$2y$10$bIa2lK988GqFMMvoy/lmLO/0NdU3MoLAeO/dA.y4C2/m4.L8H.HS6', '2019-09-16 04:04:51', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Indira', 'Pranabudi', '+1 (253) 876', 'indira.pranabudi@all-inedu.com', NULL, 'Jl Panjang No. 36 Kebon Jeruk', 0, 1, '$2y$10$6N3BnKeCSd3r.cV6ASK4teyP99rBArpuvPf66kZ/Nlp82FxdrXLM6', '2019-09-16 04:04:51', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Michael', 'Kurniawan', '+1 (412) 608', 'michael.kurniawan@all-inedu.com', NULL, 'Jl Panjang No. 36 Kebon Jeruk', 0, 1, '$2y$10$2vTjXUshvuaOFKCBWJgvZeyOKpbGpZu5xcPOidArq/.UzixBE73tu', '2019-09-16 04:04:51', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Ivana', 'Rachmawati', '+62 812-1911', 'ivana.rachmawati@all-inedu.com', NULL, 'Jl Panjang No. 36 Kebon Jeruk', 0, 1, '$2y$10$2bJ35Sh0osFkEbzjAhVi8u5FNrtTpmukOEP3urTC2dknHwffepLC2', '2019-09-16 04:04:51', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Nadia', 'Purnama', '+62 811-2769', 'nadia.purnama@all-inedu.com', NULL, 'Jl Panjang No. 36 Kebon Jeruk', 0, 1, '$2y$10$bHIfyb0sf5G54j2ws1u1DeMjYclo8GcbQwdXrUcWEEmQERKaFRa1S', '2019-09-16 04:04:51', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Juniko', 'Widjaja', '+62 812-4125', 'juniko.widjaja@all-inedu.com', NULL, 'Jl Panjang No. 36 Kebon Jeruk', 0, 1, '$2y$10$hLasOWcwPQ14Rt/WuqxJJuo2J6kNLIxrxshzzuV52LgAgfryHHy.O', '2019-09-16 04:04:51', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Novia', 'Purnama', '+62 812-2502', 'novia.purnama@all-inedu.com', NULL, 'Jl Panjang No. 36 Kebon Jeruk', 0, 1, '$2y$10$Hj0/2/5TuBx8LS/im241I.62zZMYtNZwtftZW7Zu0TKKicYuLS7AG', '2019-09-16 04:04:51', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Raymond', 'Tjahjono', '08111912803', 'raymond.tjahjono@all-inedu.com', NULL, 'Jalan Panjang', 0, 1, '$2y$10$mfkVR90sp7nRJmYf7zjia.j/7NTbrPIcq9JnAoXkDsBg3MjY4LACi', '2019-09-26 03:59:29', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Vincent', 'Sanjaya', '08112356650', 'vincent.sanjaya@all-inedu.com', NULL, 'Jalan Panjang', 0, 1, '$2y$10$7/0Bnqvc/Q/Nyh7.0ffyW.i/PAoEWwtglwLBfe36dopClzvLaQDJu', '2019-09-26 03:59:29', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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

--
-- Dumping data for table `tbl_transaction`
--

INSERT INTO `tbl_transaction` (`id`, `transaction_code`, `email`, `full_name`, `amount`, `total`, `status`, `upload_file`, `created_at`, `uploaded_at`, `verified_at`, `deleted_at`) VALUES
(1, 'INV-21092019-57FNVKMG', 'essay-student@all-inedu.com', 'Students Name', 1, 0, 0, '', '2019-09-21 18:08:48', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
(1, 'INV-21092019-57FNVKMG', 2, 1, 0);

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
(4, 'The University of Chicago', 'https://www.uchicago.edu', 'infocenter@uchicago.edu', '773.702.1234', 'uChicago.png', 'Edward H. Levi Hall\r\n5801 South Ellis Avenue\r\nChic', 'USA', 1, '2019-08-23 07:04:39', '2019-07-02 09:02:56', '0000-00-00 00:00:00'),
(5, 'Univ 1', 'https://www.uchicago.edu', 'ismiyesung@gmail.com', '1234567890', 'default.png', 'Jakarta', 'Indonesia', 2, '2019-09-23 06:46:27', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Univ 1', 'https://www.uchicago.edu', 'hafidz.bdt@gmail.com', '1234567890', 'default.png', 'Jakarta', 'Indonesia', 2, '2019-09-23 06:48:46', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'TEst', 'univ1.com', 'ismiyesung@gmail.com', '1234567890', 'default.png', 'Jakarta', 'Indonesia', 2, '2019-09-23 06:48:37', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'TEst', 'https://www.uchicago.edu', 'paul.edison@all-inedu.com', '1234567890', 'default.png', 'Jakarta', 'Indonesia', 2, '2019-09-23 06:52:36', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Univ 1', 'univ1.com', 'ismiyesung@gmail.com', '1234567890', 'default.png', 'Jakarta', 'Indonesia', 2, '2019-09-23 06:52:41', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Univ 1', 'univ1.com', 'ismiyesung@gmail.com', '1234567890', 'default.png', 'Jakarta', 'Indonesia', 2, '2019-09-23 07:32:13', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'TEst', 'https://www.uchicago.edu', 'ismiyesung@gmail.com', '089653642318', 'default.png', 'Jakarta', 'Indonesia', 2, '2019-09-23 07:29:34', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'TEst', 'univ1.com', 'ismiyesung@gmail.com', '1234567890', 'default.png', 'Jakarta', 'Indonesia', 2, '2019-09-23 07:32:18', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'asdasd', 'asd', 'ismiyesung@gmail.com', '', 'default.png', 'asd', 'Singapore', 2, '2019-09-23 09:27:12', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'TEst', 'univ1.com', 'ismiyesung@gmail.com', '1234567890', 'default.png', 'Jakarta', 'Indonesia', 2, '2019-09-23 09:28:57', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'Univ 11', 'https://www.nyu.edu', 'ismiyesung@gmail.com', 'asdasd', 'default.png', 'sdfsdf', 'asdasd', 2, '2019-09-23 09:34:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'Univ 11', 'https://www.nyu.edu', 'ismiyesung@gmail.com', 'asdsd', 'default.png', 'asdasdsd', 'asds', 2, '2019-09-23 09:34:13', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'Univ 1', 'https://www.nyu.edu', 'ismiyesung@gmail.com', 'asdasd', 'default.png', 'test', 'Singapore', 2, '2019-09-23 09:42:34', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'test', 'https://www.nyu.edu', 'hafidz.bdt@gmail.com', '089653642318', 'default.png', 'tset', 'asdasd', 2, '2019-09-23 09:42:28', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'Univ 11', 'https://www.nyu.edu', 'ismiyesung@gmail.com', '089653642318', 'default.png', 'Test', 'Singapore', 2, '2019-09-23 10:03:18', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'Univ 1', 'https://www.nyu.edu', 'ismiyesung@gmail.com', '089653642318', 'default.png', 'Test', 'Singapore', 2, '2019-09-23 10:03:13', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'Univ 11', 'https://www.nyu.edu', 'ismiyesung@gmail.com', '089653642318', 'default.png', 'Test', 'Singapore', 2, '2019-09-23 10:03:09', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'New York University', 'https://www.nyu.edu', 'hafidz.bdt@gmail.com', '089653642318', 'default.png', 'Jakarta', 'Singapore', 2, '2019-09-23 10:03:03', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'Univ 1', 'https://www.nyu.edu', 'hafidz.bdt@gmail.com', '089653642318', 'default.png', 'Test', 'Singapore', 2, '2019-09-23 10:02:59', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 'asdasd', 'asd', 'hafidz.bdt@gmail.com', 'asdasd', 'default.png', 'Test', 'Singapore', 2, '2019-09-24 02:22:45', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 'test', 'https://www.nyu.edu', 'hafidz.bdt@gmail.com', '089653642318', 'default.png', 'asdasasf', 'Singapore', 2, '2019-09-24 02:30:34', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 'New York University', 'https://www.nyu.edu', 'hafidz.bdt@gmail.com', '123', 'default.png', '1245', 'Singapore', 2, '2019-09-24 02:30:28', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 'New York University', 'https://www.nyu.edu', 'ismiyesung@gmail.com', '089653642318', 'default.png', 'Test', 'Singapore', 2, '2019-09-24 02:30:24', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
  MODIFY `id_editors` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_essay_clients`
--
ALTER TABLE `tbl_essay_clients`
  MODIFY `id_essay_clients` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_essay_editors`
--
ALTER TABLE `tbl_essay_editors`
  MODIFY `id_essay_editors` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_essay_feedback`
--
ALTER TABLE `tbl_essay_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_essay_prompt`
--
ALTER TABLE `tbl_essay_prompt`
  MODIFY `id_essay_prompt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_essay_reject`
--
ALTER TABLE `tbl_essay_reject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_essay_revise`
--
ALTER TABLE `tbl_essay_revise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_essay_status`
--
ALTER TABLE `tbl_essay_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_essay_tags`
--
ALTER TABLE `tbl_essay_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_transaction_detail`
--
ALTER TABLE `tbl_transaction_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_universities`
--
ALTER TABLE `tbl_universities`
  MODIFY `id_univ` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
