-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2015 at 06:18 PM
-- Server version: 5.5.28
-- PHP Version: 5.5.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `loja`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`id`, `nome`) VALUES
(1, 'esporte'),
(2, 'escolar'),
(3, 'mobilidade');

-- --------------------------------------------------------

--
-- Table structure for table `produtos`
--

CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `preco` decimal(10,2) DEFAULT NULL,
  `descricao` text,
  `categoria_id` int(11) DEFAULT NULL,
  `usado` bit(1) DEFAULT b'0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `preco`, `descricao`, `categoria_id`, `usado`) VALUES
(1, 'Carro Alterado OO', '1500.00', 'uma descriÃ§Ã£o com OO', 3, b'1'),
(2, 'Motocicleta', '10000.00', 'Super hiper mega irada', 1, b'0'),
(3, 'Bicicleta', '350.00', NULL, NULL, b'0'),
(4, 'Lapis', '100.00', NULL, NULL, b'0'),
(11, 'CarrÃ£o', '250.00', 'Vejamos se essa descriÃ§Ã£o vai ser muito grande ou se vai ficar mais resumida. Ai depende de sua necessidade :D abraÃ§o.', NULL, b'0'),
(12, 'Teclado mega irado', '1500.00', 'Mega teclado irado que lÃª pensamentos', NULL, b'0'),
(13, 'Mais uma com cat', '500.00', 'no desc', 2, b'0'),
(14, 'pudim de doce de leit', '308.00', ';alkdsjf', 1, b'0'),
(15, 'CupCake', '12.00', 'Melhor e mais verdadeiro de todos', 2, b'0'),
(17, 'Carro Audi A4', '16000.00', 'Batido e acabado', 3, b'1'),
(18, 'Carro Audi A4 - 2', '35000.00', 'Melhor acabado', 2, b'1'),
(19, 'Inserindo Bicicleta', '500.00', 'sem desc', 2, b'0'),
(20, 'Produto OO', '11.00', 'descricao', 1, b'0'),
(21, 'Prod DAO', '14.00', 'DAo teste', 2, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(45) NOT NULL,
  `senha` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `login`, `senha`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
