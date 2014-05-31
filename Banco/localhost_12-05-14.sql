-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 12-Maio-2014 às 12:44
-- Versão do servidor: 5.6.12-log
-- versão do PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `bd_site`
--
CREATE DATABASE IF NOT EXISTS `bd_site` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bd_site`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `banners`
--

CREATE TABLE IF NOT EXISTS `banners` (
  `ban_id` int(11) NOT NULL AUTO_INCREMENT,
  `ban_foto` varchar(20) NOT NULL,
  `ban_descricao` varchar(50) NOT NULL,
  `ban_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`ban_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `banners`
--

INSERT INTO `banners` (`ban_id`, `ban_foto`, `ban_descricao`, `ban_status`) VALUES
(1, '1banner.jpg', 'TESTE werwrwrwerwe', 1),
(2, '2banner.jpg', 'TESTE 2', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `eventos`
--

CREATE TABLE IF NOT EXISTS `eventos` (
  `eve_id` int(11) NOT NULL AUTO_INCREMENT,
  `eve_titulo` varchar(80) NOT NULL,
  `eve_descricao` longtext NOT NULL,
  `eve_foto` varchar(20) DEFAULT NULL,
  `eve_data` date NOT NULL,
  PRIMARY KEY (`eve_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `eventos`
--

INSERT INTO `eventos` (`eve_id`, `eve_titulo`, `eve_descricao`, `eve_foto`, `eve_data`) VALUES
(1, 'Acampamento de Férias', 'O acampamento de férias ....', NULL, '2014-04-30'),
(2, 'Missa de Páscoa', 'Missa de Páscoa ....', NULL, '2014-04-20'),
(3, 'kkkkkkkkkkkkkkk', '<p><strong><em>asdasdasd kkkkkkk</em></strong></p>', '3evento.jpg', '2016-01-01');

-- --------------------------------------------------------

--
-- Estrutura da tabela `instituicao`
--

CREATE TABLE IF NOT EXISTS `instituicao` (
  `inst_id` int(11) NOT NULL AUTO_INCREMENT,
  `inst_nome` varchar(100) NOT NULL,
  `inst_rua` varchar(100) NOT NULL,
  `inst_numero` int(11) NOT NULL,
  `inst_bairro` varchar(100) NOT NULL,
  `inst_cidade` varchar(100) NOT NULL,
  `inst_cep` varchar(9) DEFAULT NULL,
  `inst_site` varchar(100) DEFAULT NULL,
  `inst_email` varchar(100) DEFAULT NULL,
  `inst_facebook` varchar(100) DEFAULT NULL,
  `inst_youtube` varchar(100) DEFAULT NULL,
  `inst_twitter` varchar(100) DEFAULT NULL,
  `inst_fone1` varchar(15) DEFAULT NULL,
  `inst_fone2` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`inst_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `instituicao`
--

INSERT INTO `instituicao` (`inst_id`, `inst_nome`, `inst_rua`, `inst_numero`, `inst_bairro`, `inst_cidade`, `inst_cep`, `inst_site`, `inst_email`, `inst_facebook`, `inst_youtube`, `inst_twitter`, `inst_fone1`, `inst_fone2`) VALUES
(1, 'Igreja São Francisco de Paula', 'Rua A', 111, 'Baixo A', 'Narandiba', '11111-111', 'www.igrejasfp.com.br0', 'contato@igrejasfp.com.br', 'www.facebook.com/pages/Igreja-S%C3%A3o-Francisco-de-Paula-Narandiba/441085622673734?fref=ts', 'www.youtube.com/', 'wwww.twitter.com/', '(018)1111-1111', '(018)2222-2222');

-- --------------------------------------------------------

--
-- Estrutura da tabela `nossa_instituicao`
--

CREATE TABLE IF NOT EXISTS `nossa_instituicao` (
  `ni_id` int(11) NOT NULL AUTO_INCREMENT,
  `ni_titulo` varchar(20) NOT NULL,
  `ni_descricao` longtext NOT NULL,
  `ni_foto` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ni_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `nossa_instituicao`
--

INSERT INTO `nossa_instituicao` (`ni_id`, `ni_titulo`, `ni_descricao`, `ni_foto`) VALUES
(2, 'Padre', 'O padre Edcarlos....', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticias`
--

CREATE TABLE IF NOT EXISTS `noticias` (
  `not_id` int(11) NOT NULL AUTO_INCREMENT,
  `not_titulo` varchar(80) NOT NULL,
  `not_subtitulo` varchar(100) NOT NULL,
  `not_descricao` longtext NOT NULL,
  `not_foto` varchar(20) DEFAULT NULL,
  `not_data` date NOT NULL,
  PRIMARY KEY (`not_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `noticias`
--

INSERT INTO `noticias` (`not_id`, `not_titulo`, `not_subtitulo`, `not_descricao`, `not_foto`, `not_data`) VALUES
(3, 'teste', 'teste', '<p>teste</p>', '3noticia.png', '2014-04-11'),
(4, 'asdad', 'adasd', '<p>adasdad</p>', NULL, '2014-04-11');

-- --------------------------------------------------------

--
-- Estrutura da tabela `padroeiro`
--

CREATE TABLE IF NOT EXISTS `padroeiro` (
  `pad_id` int(11) NOT NULL AUTO_INCREMENT,
  `pad_titulo` varchar(100) NOT NULL,
  `pad_descricao` longtext NOT NULL,
  `pad_foto` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`pad_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `padroeiro`
--

INSERT INTO `padroeiro` (`pad_id`, `pad_titulo`, `pad_descricao`, `pad_foto`) VALUES
(1, 'História', '<p>S&atilde;o Francisco de Paula</p>', '1padroeiro.jpg'),
(2, 'Orações', 'Orações xxxxxx', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `recados`
--

CREATE TABLE IF NOT EXISTS `recados` (
  `rec_id` int(11) NOT NULL AUTO_INCREMENT,
  `rec_titulo` varchar(100) NOT NULL,
  `rec_descricao` longtext NOT NULL,
  `rec_data` date NOT NULL,
  PRIMARY KEY (`rec_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `recados`
--

INSERT INTO `recados` (`rec_id`, `rec_titulo`, `rec_descricao`, `rec_data`) VALUES
(1, 'Missa', '<p>Misa</p>', '2014-04-12'),
(2, 'Grupo de oração', 'Grupo de oração', '2014-04-17'),
(4, 'teste', '<p>teste</p>', '2014-04-12');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_nome` varchar(100) NOT NULL,
  `user_login` varchar(40) NOT NULL,
  `user_senha` varchar(12) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`user_id`, `user_nome`, `user_login`, `user_senha`) VALUES
(1, 'Tiago Furini', 'tiago', 'admin123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `vid_id` int(11) NOT NULL AUTO_INCREMENT,
  `vid_titulo` varchar(100) NOT NULL,
  `vid_url` varchar(100) NOT NULL,
  `vid_data` date NOT NULL,
  PRIMARY KEY (`vid_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `videos`
--

INSERT INTO `videos` (`vid_id`, `vid_titulo`, `vid_url`, `vid_data`) VALUES
(5, 'Bruno Mars - Just The Way You Are [OFFICIAL VIDEO]', 'LjhCEhWiKXk', '2014-04-15'),
(6, 'Charlie Brown Jr.dias luta dias gloria', 'pceB9dykZbQ', '2014-04-02'),
(8, 'Força e vitóriaeste', 'yil6Pvhhyeg', '2014-04-15'),
(9, 'asdad', 'asdas', '2014-04-15');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
