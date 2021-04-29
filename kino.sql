-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2021 at 07:47 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kino`
--

-- --------------------------------------------------------

--
-- Table structure for table `filmy`
--

CREATE TABLE `filmy` (
  `id_filmu` int(11) NOT NULL,
  `nazev_filmu` varchar(45) NOT NULL,
  `delka` int(11) DEFAULT NULL,
  `zanr` varchar(45) NOT NULL,
  `typ` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `filmy`
--

INSERT INTO `filmy` (`id_filmu`, `nazev_filmu`, `delka`, `zanr`, `typ`) VALUES
(1, 'Kmotr', 100, 'Drama', 'Hraný'),
(2, 'Forest Gump', 115, 'Komedie', 'Hraný'),
(8, 'Iron Sky', 93, 'Parodie', 'hraný'),
(9, 'Tenet', 150, 'Sci-fi', 'hraný'),
(10, 'Mission: Impossible - Fallout', 148, 'Akční', 'hraný'),
(11, '22 Jump Street', 112, 'Komedie', 'hraný'),
(12, 'Tomb Raider', 119, 'Dobrodružný', 'hraný'),
(13, 'Pelíšky', 116, 'Drama', 'hraný'),
(14, 'Mlčení jehňátek', 119, 'Horror', 'hraný'),
(15, 'Zastav a nepřežiješ 2 - Vysoké napětí', 96, 'Krimi', 'hraný'),
(16, 'Den poté', 119, 'Katastrofický', 'hraný'),
(17, 'Zootropolis: Město zvířat', 108, 'Rodinný', 'animovaný'),
(21, 'Rychle a zběsile 5', 132, 'Akční', 'hraný');

-- --------------------------------------------------------

--
-- Table structure for table `filmy_tocene_v_zemich`
--

CREATE TABLE `filmy_tocene_v_zemich` (
  `id_zeme` int(11) NOT NULL,
  `id_filmu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `filmy_tocene_v_zemich`
--

INSERT INTO `filmy_tocene_v_zemich` (`id_zeme`, `id_filmu`) VALUES
(1, 1),
(1, 2),
(2, 2),
(4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `herci`
--

CREATE TABLE `herci` (
  `idherci` int(11) NOT NULL,
  `jmeno` varchar(45) DEFAULT NULL,
  `prijmeni` varchar(45) DEFAULT NULL,
  `datum_narozeni` date DEFAULT NULL,
  `stvarnena_postava` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `herci`
--

INSERT INTO `herci` (`idherci`, `jmeno`, `prijmeni`, `datum_narozeni`, `stvarnena_postava`) VALUES
(1, 'Mamoudou', ' Athie', '1988-07-04', 'Nolan'),
(2, 'Phylicia', 'Rashād', '1948-06-19', 'Lillian'),
(3, 'Ben', 'Affleck', '1972-08-15', 'Treat Morrison'),
(4, 'Kaya', 'Scodelario', '1992-03-13', 'Teresa'),
(5, 'Will', 'Oulter', '1993-01-28', 'Gally');

-- --------------------------------------------------------

--
-- Table structure for table `herci_ve_filmu`
--

CREATE TABLE `herci_ve_filmu` (
  `id_herce` int(11) NOT NULL,
  `id_filmu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `herci_ve_filmu`
--

INSERT INTO `herci_ve_filmu` (`id_herce`, `id_filmu`) VALUES
(1, 1),
(2, 1),
(3, 2),
(4, 4),
(5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nazev`
--

CREATE TABLE `nazev` (
  `id_jazyk` int(11) NOT NULL,
  `nazev` varchar(45) DEFAULT NULL,
  `jazyk` varchar(45) DEFAULT NULL,
  `originalni` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nazev`
--

INSERT INTO `nazev` (`id_jazyk`, `nazev`, `jazyk`, `originalni`) VALUES
(1, 'Black box', 'angličtina', 1),
(2, 'The Last Thing He Wanted', 'anličtina', 1),
(3, 'To poslední, co chtěl', 'čeština', 0),
(4, 'Tom & Jerry', 'angličtina', 1),
(5, 'The Maze Runner', 'angličtina', 1),
(6, 'Labyrint: Útěk', 'čeština', 0),
(7, 'Labyrint: Útek', 'slovenština', 0),
(8, 'Coco', 'angličtina', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nazev_filmu`
--

CREATE TABLE `nazev_filmu` (
  `id_jazyku` int(11) NOT NULL,
  `id_filmu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nazev_filmu`
--

INSERT INTO `nazev_filmu` (`id_jazyku`, `id_filmu`) VALUES
(1, 1),
(2, 2),
(3, 2),
(4, 3),
(5, 4),
(6, 4),
(7, 4),
(8, 5);

-- --------------------------------------------------------

--
-- Table structure for table `promitani`
--

CREATE TABLE `promitani` (
  `id_promitani` int(11) NOT NULL,
  `datum` date DEFAULT NULL,
  `cas` time DEFAULT NULL,
  `id_sal` int(11) NOT NULL,
  `id_filmy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `promitani`
--

INSERT INTO `promitani` (`id_promitani`, `datum`, `cas`, `id_sal`, `id_filmy`) VALUES
(1, '2021-06-16', '49:29:06', 2, 5),
(2, '2021-06-22', '56:29:32', 3, 1),
(3, '2021-06-11', '11:11:11', 1, 1),
(4, '2021-05-19', '13:54:54', 2, 4),
(5, '2021-05-28', '00:00:00', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `sal`
--

CREATE TABLE `sal` (
  `id_sal` int(11) NOT NULL,
  `nazev` varchar(45) DEFAULT NULL,
  `kapacita` int(11) DEFAULT NULL,
  `je3D` varchar(10) DEFAULT NULL,
  `prostorovy_zvuk` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sal`
--

INSERT INTO `sal` (`id_sal`, `nazev`, `kapacita`, `je3D`, `prostorovy_zvuk`) VALUES
(2, 'B', 100, 'NE', 'ANO'),
(3, 'C', 120, 'ANO', 'ANO'),
(9, 'A', 50, 'NE', 'NE');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$12$pbI9aea8venrQajEHx7HbOYMTd0CECRJNnNaQlujVu1AwmVA3265e', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1619710835, 1, 'Admin', 'istrator', 'ADMIN', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `vstupenky`
--

CREATE TABLE `vstupenky` (
  `id_vstupenky` int(11) NOT NULL,
  `druh` varchar(45) DEFAULT NULL,
  `cena` int(11) DEFAULT NULL,
  `cas_prodeje` time DEFAULT NULL,
  `sedadlo` int(11) DEFAULT NULL,
  `id_promitani` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vstupenky`
--

INSERT INTO `vstupenky` (`id_vstupenky`, `druh`, `cena`, `cas_prodeje`, `sedadlo`, `id_promitani`) VALUES
(1, 'dospělí', 250, '12:12:12', 115, 3),
(2, 'dospělí', 250, '34:40:20', 116, 1),
(3, 'dospělí', 250, '13:13:13', 215, 2),
(4, 'dítě', 200, '13:13:16', 114, 2),
(5, 'důchodce', 200, '24:55:35', 220, 4);

-- --------------------------------------------------------

--
-- Table structure for table `zeme`
--

CREATE TABLE `zeme` (
  `id_zeme` int(11) NOT NULL,
  `zeme` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zeme`
--

INSERT INTO `zeme` (`id_zeme`, `zeme`) VALUES
(1, 'USA'),
(2, 'Puerto Rico');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `filmy`
--
ALTER TABLE `filmy`
  ADD PRIMARY KEY (`id_filmu`);

--
-- Indexes for table `filmy_tocene_v_zemich`
--
ALTER TABLE `filmy_tocene_v_zemich`
  ADD PRIMARY KEY (`id_zeme`,`id_filmu`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `herci`
--
ALTER TABLE `herci`
  ADD PRIMARY KEY (`idherci`);

--
-- Indexes for table `herci_ve_filmu`
--
ALTER TABLE `herci_ve_filmu`
  ADD PRIMARY KEY (`id_herce`,`id_filmu`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nazev`
--
ALTER TABLE `nazev`
  ADD PRIMARY KEY (`id_jazyk`);

--
-- Indexes for table `nazev_filmu`
--
ALTER TABLE `nazev_filmu`
  ADD PRIMARY KEY (`id_jazyku`,`id_filmu`);

--
-- Indexes for table `promitani`
--
ALTER TABLE `promitani`
  ADD PRIMARY KEY (`id_promitani`);

--
-- Indexes for table `sal`
--
ALTER TABLE `sal`
  ADD PRIMARY KEY (`id_sal`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indexes for table `vstupenky`
--
ALTER TABLE `vstupenky`
  ADD PRIMARY KEY (`id_vstupenky`);

--
-- Indexes for table `zeme`
--
ALTER TABLE `zeme`
  ADD PRIMARY KEY (`id_zeme`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `filmy`
--
ALTER TABLE `filmy`
  MODIFY `id_filmu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `herci`
--
ALTER TABLE `herci`
  MODIFY `idherci` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sal`
--
ALTER TABLE `sal`
  MODIFY `id_sal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
