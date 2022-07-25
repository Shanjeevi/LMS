-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2022 at 01:37 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `mst_book`
--

create TABLE `mst_book` (
  `mst_book_id` int(10) NOT NULL ,
  `book_name` varchar(20) NOT NULL,
  `book_author` text NOT NULL,
  `genre` text NOT NULL,
  `book_price` float NOT NULL ,
  `is_active` bit not null default 1 ,
  `created_date` datetime  not null default now() ,
  `last_updated_date` datetime ,
  `updated_by` char(15) ,
  PRIMARY KEY (mst_book_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


Select * from mst_book;
-- Table structure for table `trn_user_book`
--
-- --------------------------------------------------------

--
-- Table structure for table `mst_user`
--

Create TABLE `mst_user` (
  `mst_user_id` int(10) NOT NULL auto_increment,
  `user_name` text NOT NULL,
  `email_id` varchar(30) NOT NULL,
  `phone_number` bigint(15) NOT NULL,
  `password` varchar(20) NOT NULL,
  `is_active` bit not null default 1 ,
  `is_admin` bit not null default 1,
  `created_date` datetime  not null default now() ,
  `last_updated_date` datetime ,
  `updated_by` char(15) ,
   PRIMARY KEY (mst_user_id),
   UNIQUE KEY (email_id,phone_number)
   
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
Select * from mst_user;
--


 Create TABLE `trn_user_book` (
  `trn_user_book_id` int(10) NOT NULL auto_increment,
  `mst_user_id` int(10) NOT NULL,
  `mst_book_id` int(10) NOT NULL,
  `issued_date` datetime NOT NULL,
  `returned_date` datetime NOT NULL,
  `is_active` bit not null default 1 ,
  `created_date` datetime not null default now(),
  `last_updated_date` datetime ,
  `updated_by` varchar(15) ,
   PRIMARY KEY (trn_user_book_id),
  Constraint `FK_trn_user_book_mst_user_id` FOREIGN KEY (`mst_user_id`) REFERENCES `mst_user` (`mst_user_id`),
   Constraint `FK_trn_user_book_mst_book_id` FOREIGN KEY (`mst_book_id`) REFERENCES `mst_book` (`mst_book_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;





ALTER TABLE trn_user_book
DROP INDEX FK_trn_user_book_mst_user_id;

-- Indexes for dumped tables
--

--
-- Indexes for table `mst_book`
--

use lms;
ALTER TABLE `mst_book`
  AUTO_INCREMENT FIRST,
  ADD PRIMARY KEY (`mst_book_id`);



--
-- Indexes for table `mst_user`
--
ALTER TABLE `mst_user`
  ADD PRIMARY KEY (`mst_user_id`);

--
-- Indexes for table `trn_user_book`
--
ALTER TABLE `trn_user_book`
  ADD PRIMARY KEY (`trn_user_book_id`);
COMMIT;





/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
