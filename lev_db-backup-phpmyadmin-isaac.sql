-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 22-Out-2017 às 23:57
-- Versão do servidor: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lev_db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alternativa_questao`
--

CREATE TABLE `alternativa_questao` (
  `ID_ALTERNATIVA` int(11) NOT NULL,
  `ID_QUESTAO` int(11) DEFAULT NULL,
  `ALTERNATIVA1` varchar(500) DEFAULT NULL,
  `ALTERNATIVA2` varchar(500) DEFAULT NULL,
  `ALTERNATIVA3` varchar(500) DEFAULT NULL,
  `ALTERNATIVA4` varchar(500) DEFAULT NULL,
  `ALTERNATIVA5` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `alternativa_questao`
--

INSERT INTO `alternativa_questao` (`ID_ALTERNATIVA`, `ID_QUESTAO`, `ALTERNATIVA1`, `ALTERNATIVA2`, `ALTERNATIVA3`, `ALTERNATIVA4`, `ALTERNATIVA5`) VALUES
(1, 3, 'tteste1', 'teste2', 'teste3', 'teste4', 'teste5'),
(2, 11, 'ALTER1', 'ALTER2', 'ALTER3', 'ALTER4', 'ALTER4'),
(3, 12, 'DSAUHAUH12', 'DUSDUSHA12', 'DSADASH12', 'DSIADASH12', 'DSAHU12');

-- --------------------------------------------------------

--
-- Estrutura da tabela `assunto`
--

CREATE TABLE `assunto` (
  `ID_ASSUNTO` int(11) NOT NULL,
  `ID_MATERIA` int(11) DEFAULT NULL,
  `NM_ASSUNTO` varchar(30) DEFAULT NULL,
  `DSCR_ASSUNTO` varchar(150) DEFAULT NULL,
  `STATUS_ASSUNTO` varchar(15) DEFAULT NULL,
  `DATA_CADASTRO` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `assunto`
--

INSERT INTO `assunto` (`ID_ASSUNTO`, `ID_MATERIA`, `NM_ASSUNTO`, `DSCR_ASSUNTO`, `STATUS_ASSUNTO`, `DATA_CADASTRO`) VALUES
(1, 1, 'função', NULL, 'ATIVADO', '2017-10-07 08:35:32'),
(2, 1, 'função', '', 'ATIVADO', '2017-10-07 08:41:13'),
(3, 1, 'função', '', 'ATIVADO', '2017-10-07 08:41:57'),
(4, 1, 'teste', '', 'ATIVADO', '2017-10-07 08:45:50'),
(5, 1, 'teste', 'dadwdw', 'ATIVADO', '2017-10-07 08:46:38'),
(6, NULL, '', '', 'DESATIVADO', '2017-10-09 04:22:45');

-- --------------------------------------------------------

--
-- Estrutura da tabela `caderno`
--

CREATE TABLE `caderno` (
  `ID_CADERNO` int(11) NOT NULL,
  `ID_PESSOA` int(11) DEFAULT NULL,
  `NM_CADERNO` varchar(30) DEFAULT NULL,
  `CRONOMETRO_CADERNO` time DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `caderno_questao`
--

CREATE TABLE `caderno_questao` (
  `ID_CADERNO` int(11) DEFAULT NULL,
  `ID_QUESTAO` int(11) DEFAULT NULL,
  `RESPOSTA_QUESTAO` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentario`
--

CREATE TABLE `comentario` (
  `ID_COMENTARIO` int(11) NOT NULL,
  `ID_QUESTAO` int(11) DEFAULT NULL,
  `ID_PESSOA` int(11) DEFAULT NULL,
  `DSCR_COMENTARIO` varchar(2000) DEFAULT NULL,
  `DT_COMENTARIO` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `dificuldade_questao`
--

CREATE TABLE `dificuldade_questao` (
  `ID_DIFICULDADE` int(11) NOT NULL,
  `NM_DIFICULDADE` varchar(30) DEFAULT NULL,
  `STATUS_DIFICULDADE` varchar(15) DEFAULT NULL,
  `DATA_CADASTRO` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `dificuldade_questao`
--

INSERT INTO `dificuldade_questao` (`ID_DIFICULDADE`, `NM_DIFICULDADE`, `STATUS_DIFICULDADE`, `DATA_CADASTRO`) VALUES
(14, 'EXTREMO', 'DESATIVADO', '2017-10-09 01:25:12'),
(13, 'Fácil', 'ATIVADO', '2017-10-08 04:26:10'),
(12, 'Média ', 'ATIVADO', '2017-10-08 04:25:30'),
(11, 'Dificil', 'ATIVADO', '2017-10-08 04:25:23');

-- --------------------------------------------------------

--
-- Estrutura da tabela `materia`
--

CREATE TABLE `materia` (
  `ID_MATERIA` int(11) NOT NULL,
  `NM_MATERIA` varchar(30) DEFAULT NULL,
  `STATUS_MATERIA` varchar(15) DEFAULT NULL,
  `DATA_CADASTRO` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `materia`
--

INSERT INTO `materia` (`ID_MATERIA`, `NM_MATERIA`, `STATUS_MATERIA`, `DATA_CADASTRO`) VALUES
(35, 'matematica', 'ATIVADO', '2017-10-22 23:38:34'),
(36, 'ciao', 'ATIVADO', '2017-10-22 23:38:37'),
(34, 'GEOGRAFICA', 'ATIVADO', '2017-10-22 23:38:20');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `ID_PESSOA` int(11) NOT NULL,
  `NM_PESSOA` varchar(60) DEFAULT NULL,
  `EMAIL_PESSOA` varchar(50) DEFAULT NULL,
  `TEL_PESSOA` varchar(11) DEFAULT NULL,
  `ESCOLARIDADE_PESSOA` varchar(30) DEFAULT NULL,
  `CIDADE_PESSOA` varchar(30) DEFAULT NULL,
  `TIPO_PESSOA` varchar(30) DEFAULT NULL,
  `DATA_CADASTRO` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `questao`
--

CREATE TABLE `questao` (
  `ID_QUESTAO` int(11) NOT NULL,
  `ID_ASSUNTO` int(11) DEFAULT NULL,
  `ID_COMPETENCIA` int(11) DEFAULT NULL,
  `ID_DIFICULDADE` int(11) DEFAULT NULL,
  `ANO_QUESTAO` int(11) DEFAULT NULL,
  `SEMESTRE_QUESTAO` varchar(20) DEFAULT NULL,
  `STATUS_QUESTAO` varchar(15) DEFAULT NULL,
  `PERGUNTA_QUESTAO` varchar(2000) DEFAULT NULL,
  `DATA_CADASTRO` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `questao`
--

INSERT INTO `questao` (`ID_QUESTAO`, `ID_ASSUNTO`, `ID_COMPETENCIA`, `ID_DIFICULDADE`, `ANO_QUESTAO`, `SEMESTRE_QUESTAO`, `STATUS_QUESTAO`, `PERGUNTA_QUESTAO`, `DATA_CADASTRO`) VALUES
(1, 1, 1, 13, 2, '1', NULL, 'TESTE', '2017-10-14 18:30:51'),
(2, 1, 1, 13, 2, '1', NULL, 'TESTE', '2017-10-14 18:34:39'),
(3, 1, 1, 13, 2, '1', NULL, 'TESTE', '2017-10-14 18:35:43'),
(4, 1, 1, 13, 2, '1', NULL, 'RWARW', '2017-10-14 18:37:50'),
(5, 1, 1, 13, 2, '1', 'ATIVADO', 'RWARW', '2017-10-14 18:38:26'),
(6, 1, 1, 13, 2, '1', 'ATIVADO', 'TESTE', '2017-10-14 18:38:40'),
(7, 1, 1, 13, 2, '1', 'ATIVADO', 'teste', '2017-10-15 19:04:58'),
(8, 1, 1, 13, 2, '1', 'ATIVADO', 'pergunta', '2017-10-15 19:07:35'),
(9, 1, 1, 13, 2, '1', 'ATIVADO', 'teste', '2017-10-15 19:34:49'),
(10, 1, 1, 13, 2, '1', 'ATIVADO', 'teste50', '2017-10-15 19:36:00'),
(11, 1, 1, 13, 2, '1', 'ATIVADO', 'TESTE', '2017-10-15 19:38:58'),
(12, 1, 1, 13, 2, '1', 'ATIVADO', 'TEST32103812', '2017-10-15 19:39:19');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_competencia`
--

CREATE TABLE `tipo_competencia` (
  `ID_COMPETENCIA` int(11) NOT NULL,
  `NM_COMPETENCIA` varchar(30) DEFAULT NULL,
  `STATUS_COMPETENCIA` varchar(15) DEFAULT NULL,
  `DATA_CADASTRO` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipo_competencia`
--

INSERT INTO `tipo_competencia` (`ID_COMPETENCIA`, `NM_COMPETENCIA`, `STATUS_COMPETENCIA`, `DATA_CADASTRO`) VALUES
(1, 'C1', 'ATIVADO', '2017-10-07 23:16:42'),
(2, 'C2', 'ATIVADO', '2017-10-07 23:17:45'),
(3, 'C3', 'ATIVADO', '2017-10-09 01:24:45'),
(4, 'C4', 'ATIVADO', '2017-10-09 01:24:48'),
(5, 'C5', 'ATIVADO', '2017-10-09 01:24:53'),
(6, 'B1', 'DESATIVADO', '2017-10-09 01:24:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternativa_questao`
--
ALTER TABLE `alternativa_questao`
  ADD PRIMARY KEY (`ID_ALTERNATIVA`);

--
-- Indexes for table `assunto`
--
ALTER TABLE `assunto`
  ADD PRIMARY KEY (`ID_ASSUNTO`),
  ADD KEY `ID_MATERIA_FK` (`ID_MATERIA`);

--
-- Indexes for table `caderno`
--
ALTER TABLE `caderno`
  ADD PRIMARY KEY (`ID_CADERNO`),
  ADD KEY `ID_PESSOA_FK` (`ID_PESSOA`);

--
-- Indexes for table `caderno_questao`
--
ALTER TABLE `caderno_questao`
  ADD KEY `ID_CADERNO_FK` (`ID_CADERNO`),
  ADD KEY `ID_QUESTAO_FK` (`ID_QUESTAO`);

--
-- Indexes for table `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`ID_COMENTARIO`),
  ADD KEY `ID_FK_QUESTAO` (`ID_QUESTAO`),
  ADD KEY `ID_FK_PESSOA` (`ID_PESSOA`);

--
-- Indexes for table `dificuldade_questao`
--
ALTER TABLE `dificuldade_questao`
  ADD PRIMARY KEY (`ID_DIFICULDADE`);

--
-- Indexes for table `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`ID_MATERIA`);

--
-- Indexes for table `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`ID_PESSOA`);

--
-- Indexes for table `questao`
--
ALTER TABLE `questao`
  ADD PRIMARY KEY (`ID_QUESTAO`);

--
-- Indexes for table `tipo_competencia`
--
ALTER TABLE `tipo_competencia`
  ADD PRIMARY KEY (`ID_COMPETENCIA`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternativa_questao`
--
ALTER TABLE `alternativa_questao`
  MODIFY `ID_ALTERNATIVA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `assunto`
--
ALTER TABLE `assunto`
  MODIFY `ID_ASSUNTO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `caderno`
--
ALTER TABLE `caderno`
  MODIFY `ID_CADERNO` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comentario`
--
ALTER TABLE `comentario`
  MODIFY `ID_COMENTARIO` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dificuldade_questao`
--
ALTER TABLE `dificuldade_questao`
  MODIFY `ID_DIFICULDADE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `materia`
--
ALTER TABLE `materia`
  MODIFY `ID_MATERIA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `ID_PESSOA` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `questao`
--
ALTER TABLE `questao`
  MODIFY `ID_QUESTAO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tipo_competencia`
--
ALTER TABLE `tipo_competencia`
  MODIFY `ID_COMPETENCIA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
