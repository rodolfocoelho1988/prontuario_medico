-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 11-Set-2017 às 23:49
-- Versão do servidor: 5.6.16-1~exp1
-- PHP Version: 7.1.8-2+ubuntu16.04.1+deb.sury.org+4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sysmedic`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupo_menu`
--

CREATE TABLE `grupo_menu` (
  `grupo_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `grupo_menu`
--

INSERT INTO `grupo_menu` (`grupo_id`, `menu_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(2, 8),
(3, 8),
(2, 9),
(3, 9),
(2, 10),
(3, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grupo_menu`
--
ALTER TABLE `grupo_menu`
  ADD PRIMARY KEY (`grupo_id`,`menu_id`),
  ADD KEY `fk_grupo_has_menu_menu1_idx` (`menu_id`),
  ADD KEY `fk_grupo_has_menu_grupo1_idx` (`grupo_id`);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `grupo_menu`
--
ALTER TABLE `grupo_menu`
  ADD CONSTRAINT `fk_grupo_has_menu_grupo1` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_grupo_has_menu_menu1` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
