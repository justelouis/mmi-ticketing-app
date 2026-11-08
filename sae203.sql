-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 08, 2026 at 03:38 PM
-- Server version: 5.7.24
-- PHP Version: 8.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sae203`
--
CREATE DATABASE IF NOT EXISTS `sae203` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `sae203`;

-- --------------------------------------------------------

--
-- Table structure for table `sae203_admin`
--

CREATE TABLE `sae203_admin` (
  `idAdmin` smallint(5) UNSIGNED NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `motDePasse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sae203_categorie`
--

CREATE TABLE `sae203_categorie` (
  `idCategorie` smallint(5) UNSIGNED NOT NULL,
  `nomCategorie` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sae203_categorie`
--

INSERT INTO `sae203_categorie` (`idCategorie`, `nomCategorie`) VALUES
(1, 'sans categorie'),
(2, 'humour'),
(5, 'Drama'),
(6, 'gravat');

-- --------------------------------------------------------

--
-- Table structure for table `sae203_evenement`
--

CREATE TABLE `sae203_evenement` (
  `idEvenement` smallint(5) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date` datetime NOT NULL,
  `lieu` varchar(255) NOT NULL,
  `placeMax` smallint(5) UNSIGNED NOT NULL,
  `placeDispo` smallint(5) UNSIGNED NOT NULL,
  `idCategorie` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sae203_evenement`
--

INSERT INTO `sae203_evenement` (`idEvenement`, `nom`, `description`, `date`, `lieu`, `placeMax`, `placeDispo`, `idCategorie`) VALUES
(4, '&quot;zafzegt', 'ezgtezgezg', '2025-02-22 19:28:00', 'ezgtesgh', 1000, 900, 5),
(5, 'dnv', 'kendfn', '2025-05-31 19:22:00', 'nefnekdnsqf', 123, 123, 2),
(6, 'dnv', 'kendfn', '2025-05-31 19:22:00', 'nefnekdnsqf', 123, 123, 1),
(10, '&quot;zafzegt', 'ezgtezgezg', '2025-02-22 19:28:00', 'ezgtesgh', 1134, 1134, 5),
(11, 'dnv', 'kendfn', '2025-05-31 19:22:00', 'nefnekdnsqf', 123, 123, 1),
(12, '&quot;zafzegt', 'ezgtezgezg', '2025-02-22 19:28:00', 'ezgtesgh', 1134, 1134, 5),
(13, 'dnv', 'kendfn', '2025-05-31 19:22:00', 'nefnekdnsqf', 123, 123, 1),
(14, '&quot;zafzegt', 'ezgtezgezg', '2025-02-22 19:28:00', 'ezgtesgh', 1134, 1134, 5);

-- --------------------------------------------------------

--
-- Table structure for table `sae203_reservation`
--

CREATE TABLE `sae203_reservation` (
  `idReservation` smallint(5) UNSIGNED NOT NULL,
  `idEvenement` smallint(5) UNSIGNED NOT NULL,
  `idUtilisateur` smallint(5) UNSIGNED NOT NULL,
  `nbrPlacePrise` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sae203_utilisateur`
--

CREATE TABLE `sae203_utilisateur` (
  `idUtilisateur` smallint(5) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `motDePasse` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sae203_admin`
--
ALTER TABLE `sae203_admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indexes for table `sae203_categorie`
--
ALTER TABLE `sae203_categorie`
  ADD PRIMARY KEY (`idCategorie`);

--
-- Indexes for table `sae203_evenement`
--
ALTER TABLE `sae203_evenement`
  ADD PRIMARY KEY (`idEvenement`),
  ADD KEY `idCategorie` (`idCategorie`);

--
-- Indexes for table `sae203_reservation`
--
ALTER TABLE `sae203_reservation`
  ADD PRIMARY KEY (`idReservation`),
  ADD KEY `idEvenement` (`idEvenement`,`idUtilisateur`),
  ADD KEY `idUtilisateur` (`idUtilisateur`);

--
-- Indexes for table `sae203_utilisateur`
--
ALTER TABLE `sae203_utilisateur`
  ADD PRIMARY KEY (`idUtilisateur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sae203_admin`
--
ALTER TABLE `sae203_admin`
  MODIFY `idAdmin` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sae203_categorie`
--
ALTER TABLE `sae203_categorie`
  MODIFY `idCategorie` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sae203_evenement`
--
ALTER TABLE `sae203_evenement`
  MODIFY `idEvenement` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sae203_reservation`
--
ALTER TABLE `sae203_reservation`
  MODIFY `idReservation` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sae203_utilisateur`
--
ALTER TABLE `sae203_utilisateur`
  MODIFY `idUtilisateur` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sae203_evenement`
--
ALTER TABLE `sae203_evenement`
  ADD CONSTRAINT `sae203_evenement_ibfk_1` FOREIGN KEY (`idCategorie`) REFERENCES `sae203_categorie` (`idCategorie`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sae203_reservation`
--
ALTER TABLE `sae203_reservation`
  ADD CONSTRAINT `sae203_reservation_ibfk_1` FOREIGN KEY (`idEvenement`) REFERENCES `sae203_evenement` (`idEvenement`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sae203_reservation_ibfk_2` FOREIGN KEY (`idUtilisateur`) REFERENCES `sae203_utilisateur` (`idUtilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
