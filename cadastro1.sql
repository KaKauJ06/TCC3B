-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Dez-2023 às 01:50
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cadastro1`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `chamada`
--

CREATE TABLE `chamada` (
  `ID` int(11) NOT NULL,
  `aula_id` int(11) NOT NULL,
  `aluno_id` int(11) NOT NULL,
  `Presenca` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `chamada`
--

INSERT INTO `chamada` (`ID`, `aula_id`, `aluno_id`, `Presenca`) VALUES
(4, 0, 94, 1),
(30, 7, 97, 1),
(31, 7, 94, 1),
(34, 13, 97, 1),
(35, 13, 94, 1),
(41, 6, 105, 1),
(42, 6, 106, 1),
(43, 6, 104, 1),
(44, 12, 105, 1),
(45, 12, 106, 1),
(46, 12, 104, 1),
(50, 9, 105, 1),
(51, 9, 106, 1),
(52, 18, 113, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tela_cadastro`
--

CREATE TABLE `tela_cadastro` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(250) NOT NULL,
  `Matricula_aluno` varchar(12) NOT NULL,
  `Idade` int(2) NOT NULL,
  `Senha` varchar(255) NOT NULL,
  `Genero` varchar(10) NOT NULL,
  `Turma` varchar(3) NOT NULL,
  `Modalidadeindividual` varchar(20) NOT NULL,
  `Modalidadeequipe` varchar(20) NOT NULL,
  `Altura` int(3) NOT NULL,
  `Peso` int(3) NOT NULL,
  `tipo_login` int(1) NOT NULL,
  `Nota` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `tela_cadastro`
--

INSERT INTO `tela_cadastro` (`ID`, `NOME`, `Matricula_aluno`, `Idade`, `Senha`, `Genero`, `Turma`, `Modalidadeindividual`, `Modalidadeequipe`, `Altura`, `Peso`, `tipo_login`, `Nota`) VALUES
(110, 'Jao', '123', 15, '$2y$10$qW9YTJENcCutuK6fPEg8v.c.IeGXDUo/gMOHsFMVfeapqTmsAagoW', 'Masculino', '6°B', 'ATLETISMO', 'NENHUMA', 167, 530, 1, '4,0'),
(111, 'Kua', '098', 34, '$2y$10$SKC/A1idlwi3eAf2QOGFK.xhunKFO2OSGv3it3XRHaBFcgVgiC0De', 'Masculino', '9°A', 'ATLETISMO', 'NENHUMA', 156, 63, 2, '6,0'),
(112, 'kleber', '234', 26, '$2y$10$SZS/0/0BOHGww74dDBdxu.y88dNpYtQY8H/N673NMwLu0oakuBG5G', 'Masculino', '7°A', 'BADMINTON', 'HANDEBOL', 543, 53, 1, '5,0'),
(113, 'marcus', '345', 54, '$2y$10$7GMUTw6ZXxH.901k2u5Wu.FwuK/EavAPN3AVm5euRrHMTVwjunQl.', 'Feminino', '8°B', 'ATLETISMO', 'NENHUMA', 533, 235, 1, '7,0'),
(114, 'Jooj', '456', 54, '$2y$10$elmNtP./2a4TqNdacm1gQeSkCZ/Qwm4iThBjLX1.1PFfWkyO3KDAO', 'Feminino', '8°B', 'NENHUMA', 'FUTEBOL_DE_CAMPO', 435, 543, 1, '8,5'),
(115, 'lmao', '678', 54, '$2y$10$fqfILSe0t2OHa5y9ooJvdOCgNU4YPUh1YNfMjYCI5R.ouvVC/xyoK', 'Masculino', '6°B', 'NENHUMA', 'FUTEBOL_DE_CAMPO', 453, 543, 2, '9,3'),
(116, 'hjh', '1234', 65, '$2y$10$.n2WojIYLN4yyR6OgW0EkObfsgpGgtLPuTrIUrCy.8.jkqfL1ujjG', 'Masculino', '7°A', 'BADMINTON', 'FUTEBOL_DE_CAMPO', 5435, 543, 2, '7,9'),
(117, 'KAUA JOEL', '123321', 17, '$2y$10$gnkaIoPL/C8slg38skWurO8Fq.L/Xn48N1NhnbGvgRLLobc3KY6y6', 'Masculino', '8°B', 'JUI-JITSU', 'HANDEBOL', 124, 24, 2, '3,0'),
(118, 'KAUA JOEL', '12345', 16, '$2y$10$SPsxna/ErroTQssXv2zoluzUOrNT6WfCViSgaL9tA8TzR0Cna53Z.', 'Masculino', '7°B', 'TAEKWOND', 'HANDEBOL', 252, 123, 1, '6,0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `treinos`
--

CREATE TABLE `treinos` (
  `ID` int(11) NOT NULL,
  `Aula` varchar(50) NOT NULL,
  `Dia` date NOT NULL,
  `Horario` time NOT NULL,
  `Observacoes` text NOT NULL,
  `Modalidade1` varchar(20) NOT NULL,
  `Modalidade2` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `treinos`
--

INSERT INTO `treinos` (`ID`, `Aula`, `Dia`, `Horario`, `Observacoes`, `Modalidade1`, `Modalidade2`) VALUES
(5, 'Aula de atletismo', '2023-11-17', '15:00:00', 'LEVEM AGUA', 'ATLETISMO', 'NENHUMA'),
(6, 'AULA ESPECIAL', '2023-11-23', '18:00:00', 'LEVAM CAMISA', 'BADMINTON', 'NENHUMA'),
(7, 'AULA DE ATLETISMO', '2299-02-09', '12:33:00', 'QWDQ', 'ATLETISMO', 'NENHUMA'),
(8, 'wdqdwqd', '0000-00-00', '12:12:00', '4112312', 'BADMINTON', 'NENHUMA'),
(16, 'Teste', '2023-09-12', '12:00:00', 'Legal', 'ATLETISMO      ', 'NENHUMA'),
(17, 'Legal', '2023-09-12', '12:30:00', 'Show', 'ATLETISMO      ', 'NENHUMA'),
(18, 'Legallllllllll', '2023-12-20', '12:00:00', 'show', 'ATLETISMO      ', 'NENHUMA'),
(19, 'galo', '2023-12-12', '13:00:00', 'Legal', 'ATLETISMO         ', 'NENHUMA'),
(20, 'galo', '2023-12-12', '13:00:00', 'Legal', 'ATLETISMO         ', 'NENHUMA'),
(21, 'farol', '2023-04-12', '14:14:00', 'jjjjjj', 'ATLETISMO           ', 'NENHUMA');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `chamada`
--
ALTER TABLE `chamada`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `tela_cadastro`
--
ALTER TABLE `tela_cadastro`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `treinos`
--
ALTER TABLE `treinos`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `chamada`
--
ALTER TABLE `chamada`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de tabela `tela_cadastro`
--
ALTER TABLE `tela_cadastro`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT de tabela `treinos`
--
ALTER TABLE `treinos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
