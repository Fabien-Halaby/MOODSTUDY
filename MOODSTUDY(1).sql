-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 09, 2024 at 07:41 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `MOODSTUDY`
--

-- --------------------------------------------------------

--
-- Table structure for table `EDT`
--

CREATE TABLE `EDT` (
  `id` int(11) NOT NULL,
  `humeur` int(11) NOT NULL,
  `energie` int(11) NOT NULL,
  `matiere` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `EDT`
--

INSERT INTO `EDT` (`id`, `humeur`, `energie`, `matiere`) VALUES
(26, 1, 1, 'Regarder un film relaxant'),
(27, 1, 2, 'Écouter de la musique douce'),
(28, 1, 3, 'Lire un livre inspirant'),
(29, 1, 4, 'Faire une petite promenade'),
(30, 1, 5, 'Participer à une discussion légère'),
(31, 2, 1, 'Méditer pendant quelques minutes'),
(32, 2, 2, 'Pratiquer des exercices de respiration'),
(33, 2, 3, 'Écrire dans un journal personnel'),
(34, 2, 4, 'Cuisiner un plat simple'),
(35, 2, 5, 'Organiser ses affaires'),
(36, 3, 1, 'Faire une sieste'),
(37, 3, 2, 'Boire une boisson chaude'),
(38, 3, 3, 'Discuter avec un(e) ami(e) proche'),
(39, 3, 4, 'Faire des étirements'),
(40, 3, 5, 'Apprendre un sujet léger'),
(41, 4, 1, 'Regarder des vidéos humoristiques'),
(42, 4, 2, 'Jouer à un jeu simple'),
(43, 4, 3, 'Planifier la semaine'),
(44, 4, 4, 'Lire des articles intéressants'),
(45, 4, 5, 'Faire une activité créative (dessin, etc.)'),
(46, 5, 1, 'Écouter un podcast inspirant'),
(47, 5, 2, 'Prendre des notes sur un projet personnel'),
(48, 5, 3, 'Réviser des concepts déjà connus'),
(49, 5, 4, 'Faire une activité physique modérée'),
(50, 5, 5, 'Travailler sur un projet ambitieux');

-- --------------------------------------------------------

--
-- Table structure for table `Humeur`
--

CREATE TABLE `Humeur` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `humeur` int(11) NOT NULL,
  `energie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Humeur`
--

INSERT INTO `Humeur` (`id`, `email`, `humeur`, `energie`) VALUES
(1, 'fabienhalaby13@gmail.com', 3, 5),
(2, 'fabienhalaby13@gmail.com', 5, 3),
(3, 'safidialonso@gmail.com', 1, 5),
(4, 'fabienhalaby13@gmail.com', 1, 5),
(5, 'fabienhalaby13@gmail.com', 5, 5),
(6, 'fabienhalaby13@gmail.com', 5, 5),
(7, 'fabienhalaby13@gmail.com', 5, 5),
(8, 'fabienhalaby13@gmail.com', 5, 5),
(9, 'fabienhalaby13@gmail.com', 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `Matieres`
--

CREATE TABLE `Matieres` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `matiere` varchar(255) NOT NULL,
  `coefficient` int(11) NOT NULL,
  `connaissance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Matieres`
--

INSERT INTO `Matieres` (`id`, `email`, `matiere`, `coefficient`, `connaissance`) VALUES
(1, 'fabienhalaby13@gmail.com', 'Mathématiques', 5, 50),
(3, 'fabienhalaby13@gmail.com', 'Langage C', 6, 100),
(6, 'fabienhalaby13@gmail.com', 'Python', 6, 50),
(11, 'fabienhalaby13@gmail.com', 'Anglais', 3, 50),
(12, 'fabienhalaby13@gmail.com', 'Java', 6, 20),
(13, 'manitrachristian@gmail.com', 'Analyse', 5, 50),
(14, 'manitrachristian@gmail.com', 'Anglais', 5, 47),
(15, 'rakoto@gmail.com', 'Java', 4, 43);

-- --------------------------------------------------------

--
-- Table structure for table `Temps-Libre`
--

CREATE TABLE `Temps-Libre` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `jour` varchar(20) NOT NULL,
  `debut` time NOT NULL,
  `fin` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Temps-Libre`
--

INSERT INTO `Temps-Libre` (`id`, `email`, `jour`, `debut`, `fin`) VALUES
(1, 'fabienhalaby13@gmail.com', 'dimanche', '10:20:00', '13:00:00'),
(2, 'manitrachristian@gmail.com', 'samedi', '10:00:00', '12:00:00'),
(3, 'rakoto@gmail.com', 'samedi', '02:00:00', '05:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`id`, `name`, `email`, `password`) VALUES
(1, 'Fabien', 'fabienhalaby13@gmail.com', 'descartes'),
(9, 'Fabien', 'bifa@gmail.com', 'qwerty'),
(10, 'Manitra', 'manitrachristian@gmail.com', 'azerty'),
(11, 'Safidi', 'safidialonso@gmail.com', 'aaa'),
(12, 'Rakoto', 'rakoto@gmail.com', 'mmm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `EDT`
--
ALTER TABLE `EDT`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Humeur`
--
ALTER TABLE `Humeur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Matieres`
--
ALTER TABLE `Matieres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Temps-Libre`
--
ALTER TABLE `Temps-Libre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `EDT`
--
ALTER TABLE `EDT`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `Humeur`
--
ALTER TABLE `Humeur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `Matieres`
--
ALTER TABLE `Matieres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `Temps-Libre`
--
ALTER TABLE `Temps-Libre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
