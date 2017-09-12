-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 11-Set-2017 às 23:18
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
-- Estrutura da tabela `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `class` varchar(45) DEFAULT NULL,
  `url` varchar(45) NOT NULL,
  `icone` varchar(45) DEFAULT NULL,
  `pai_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `menu`
--

INSERT INTO `menu` (`id`, `nome`, `class`, `url`, `icone`, `pai_id`) VALUES
(1, 'Dashboard', 'dashboard', '/', 'settings_input_svideo', NULL),
(2, 'Médico', 'medico', '#', 'favorite', NULL),
(3, 'Cadastrar', 'medico', '/medico/cadastrar', NULL, 2),
(4, 'Listar', 'medico', '/medico', NULL, 2),
(5, 'Paciente', 'paciente', '#', 'face', NULL),
(6, 'Cadastrar', 'paciente', '/paciente/cadastrar', NULL, 5),
(7, 'Listar', 'paciente', '/paciente', NULL, 5),
(8, 'Agendamento', 'agendamento', '#', 'access_alarm', NULL),
(9, 'Cadastrar', 'agendamento', '/agendamento/cadastrar', NULL, 8),
(10, 'Listar', 'agendamento', '/agendamento', NULL, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_menu_menu1_idx` (`pai_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `fk_menu_menu1` FOREIGN KEY (`pai_id`) REFERENCES `menu` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
