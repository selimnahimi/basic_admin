-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2020 at 07:54 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `hash`, `role`, `last_login`) VALUES
(1, 'Admin', '$2y$13$cmBb7S9uZsdnNHDSzejfWuva.drsg35D.VtCug5aW5I1.ucFEnXCG', 'ROLE_ADMIN', '2020-06-15 19:50:40'),
(2, 'User 1', '$2y$13$JS5TWQcgPbS3s02jjMRlm.dvqILflHgFrU6x6FMHjwbkI3TcA7ID2', 'ROLE_EDITOR;ROLE_USER', '2020-06-15 17:22:46'),
(3, 'User 2', '$2y$13$BAZElRkj/IFKFRhCTPix5uoqh/iZI00iNMpv/3/6jvaNoNfsfVKLS', 'ROLE_EDITOR', '2020-06-15 17:22:54'),
(4, 'User 3', '$2y$13$uGt.b4TVWZRqesjh/T43L.gZPxd9Tt65x4AF5eK0sAmTkjFAZ4322', 'ROLE_USER', '2020-06-15 17:31:07');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;