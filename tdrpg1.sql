-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tempo de Geração: 
-- Versão do Servidor: 5.5.27
-- Versão do PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `tdrpg1`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_board`
--

CREATE TABLE IF NOT EXISTS `tb_board` (
  `host_user_id` int(12) NOT NULL,
  `name` varchar(511) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_board`
--

INSERT INTO `tb_board` (`host_user_id`, `name`) VALUES
(11, 'mesa 0dnd1z34'),
(11, 'mesa pcp2cyjk'),
(11, 'mesa fzpcujue');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_dice_rolled`
--

CREATE TABLE IF NOT EXISTS `tb_dice_rolled` (
  `board_id` int(12) NOT NULL,
  `host_user_id` int(12) NOT NULL,
  `type_dice` int(11) NOT NULL,
  `qtd_dice` int(11) NOT NULL,
  `result` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_dice_rolled`
--

INSERT INTO `tb_dice_rolled` (`board_id`, `host_user_id`, `type_dice`, `qtd_dice`, `result`) VALUES
(0, 11, 0, 1, 0),
(0, 11, 0, 1, 0),
(0, 11, 0, 1, 0),
(0, 11, 0, 1, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_members`
--

CREATE TABLE IF NOT EXISTS `tb_members` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `user` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `passwd` varchar(511) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(511) COLLATE utf8_unicode_ci NOT NULL,
  `reg_ip` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `dt_reg` datetime NOT NULL,
  `dt_alt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Extraindo dados da tabela `tb_members`
--

INSERT INTO `tb_members` (`id`, `user`, `passwd`, `email`, `reg_ip`, `dt_reg`, `dt_alt`) VALUES
(4, '1', '356a192b7913b04c54574d18c28d46e6395428ab', '1', '::1', '2013-08-02 10:21:06', '2013-08-02 13:21:06'),
(5, '2', 'da4b9237bacccdf19c0760cab7aec4a8359010b0', '2', '::1', '2013-08-02 10:23:08', '2013-08-02 13:23:08'),
(6, '3', '77de68daecd823babbb58edb1c8e14d7106e83bb', '3', '::1', '2013-08-02 10:24:22', '2013-08-02 13:24:22'),
(7, '5', 'ac3478d69a3c81fa62e60f5c3696165a4e5e6ac4', '5', '::1', '2013-08-02 10:24:28', '2013-08-02 13:24:28'),
(8, '454', 'ebff15c2fb15bdd9c069edf272ef43e738b276aa', '53453443', '::1', '2013-08-02 10:27:31', '2013-08-02 13:27:31'),
(9, '333', '43814346e21444aaf4f70841bf7ed5ae93f55a9d', '333', '::1', '2013-08-02 10:28:42', '2013-08-02 13:28:42'),
(10, '333', '43814346e21444aaf4f70841bf7ed5ae93f55a9d', '333', '::1', '2013-08-02 10:28:58', '2013-08-02 13:28:58'),
(11, '33', 'b6692ea5df920cad691c20319a6fffd7a4a766b8', '33', '::1', '2013-08-02 10:29:05', '2013-08-02 13:29:05');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
