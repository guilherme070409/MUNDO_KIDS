-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03/11/2025 às 11:38
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `mundo_kids`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria`
--

CREATE TABLE `categoria` (
  `ID` int(11) NOT NULL,
  `fk_faixa_etaria` int(11) DEFAULT NULL,
  `nome_da_categoria` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `categoria`
--

INSERT INTO `categoria` (`ID`, `fk_faixa_etaria`, `nome_da_categoria`) VALUES
(1, NULL, 'animacoes'),
(2, NULL, 'filmes infantis'),
(3, NULL, 'aventuras'),
(4, NULL, 'comedia e humor'),
(5, NULL, 'mundo da imaginacao'),
(29, NULL, '2'),
(30, NULL, '3');

-- --------------------------------------------------------

--
-- Estrutura para tabela `codigos`
--

CREATE TABLE `codigos` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `codigo` varchar(10) NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `faixa_etaria`
--

CREATE TABLE `faixa_etaria` (
  `ID` int(11) NOT NULL,
  `limitacao` int(11) NOT NULL,
  `idade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `faixa_etaria`
--

INSERT INTO `faixa_etaria` (`ID`, `limitacao`, `idade`) VALUES
(1, 120, 0),
(2, 11, 10);

-- --------------------------------------------------------

--
-- Estrutura para tabela `id_videos_id_playlist`
--

CREATE TABLE `id_videos_id_playlist` (
  `ID` int(11) NOT NULL,
  `fk_videos` int(11) NOT NULL,
  `fk_playlist` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `likes`
--

CREATE TABLE `likes` (
  `ID` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `videos_id` int(11) DEFAULT NULL,
  `curtido` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `id` int(11) NOT NULL,
  `nome_pai` varchar(100) NOT NULL,
  `nome_mae` varchar(100) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `data_nascimento` date DEFAULT NULL,
  `nome` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pessoa`
--

INSERT INTO `pessoa` (`id`, `nome_pai`, `nome_mae`, `telefone`, `data_nascimento`, `nome`) VALUES
(32, 'Guilherme Moura', 'Guilherme Moura', 'guigatomoura@gmail.c', '0000-00-00', 0),
(35, 'sg', 'gd', '(00) 05205-5050', '0000-00-00', 0),
(36, 'sg', 'gd', '(00) 05205-5050', '5050-06-05', 0),
(37, 'Guilherme Moura', 'Guilherme Moura', '(44) 99975-9681', '3525-10-02', 0),
(38, 'ngn', 'ngn', '(05) 10660-0160', '4040-01-01', 0),
(39, 'Guilherme Moura', 'Guilherme Moura', '(44) 99975-9681', '0405-04-04', 0),
(40, 'Guilherme Moura', 'Guilherme Moura', '(44) 99975-9681', '0000-00-00', 0),
(41, 'Guilherme Moura', 'Guilherme Moura', '(44) 99975-9681', '0100-01-01', 0),
(42, 'Luiz Marcelo', 'Priscila', '(00) 52050-5050', '2009-06-01', 0),
(43, 'victor', 'manzoli', '(05) 10606-0004', '0404-06-01', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `playlist`
--

CREATE TABLE `playlist` (
  `ID` int(11) NOT NULL,
  `fk_videos` int(11) NOT NULL,
  `nome_playlist` varchar(200) NOT NULL,
  `tipo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `fk_pessoa` int(11) DEFAULT NULL,
  `ID` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(110) NOT NULL,
  `is_adm` varchar(200) NOT NULL DEFAULT 'usuario',
  `nome_de_usuario` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`fk_pessoa`, `ID`, `email`, `senha`, `is_adm`, `nome_de_usuario`) VALUES
(NULL, 9, '31@gmail', '$2y$10$3v2A7kVhqcJOnlnNOJH7R.cWuSgsANQSyF29.TzAf3TMBonrzunj.', '0', 'gui'),
(NULL, 10, '310@gmail', '$2y$10$PY.mBuDGv1rLh.r9L.QEtuERP5aP6Tw3e4gmZ8LJlQGh1w1IU3ugq', '0', 'gui'),
(NULL, 11, '123@gmail.com', '$2y$10$H5fYRF3fyIadpweA61trWeiv8g8lA.edR4QORoEVILpSrHFrwZ.j6', '0', 'Guilherme Moura'),
(NULL, 12, '10@gmail.com', '$2y$10$PrZf6WJ5WtVmYuno1jQtwuYVM0t1o584RD6rXkHD.Tx.XXCTY5LHe', '0', 'nd'),
(NULL, 13, '1023@gmail.com', '$2y$10$/SDZmBOyngm4S4ihpGMq..irs9sM3PswjZp8Ap6l.j8m96bEYbnOW', '0', 'Guilherme Moura'),
(NULL, 14, 'dd123@gmail.com', '$2y$10$iCtEOrv.PMK/ZpvX/wu.4OlkY8oWUWCSKXaeXYoA29TMnFdKC9P5K', '2', 'gjmowpspmgroim'),
(NULL, 15, 'do@gmail.com', '$2y$10$AURWMm2xmfbkEgKwK7bhS.HENy.T5DWXcP..VwXvDeNkYmshe529y', '2', 'Guilherme Moura'),
(NULL, 16, 'guigatomoura@gmail.com', '$2y$10$dgTMHQI6G0YQOxM7fz02ZOBqsInF0YJ7kU9x69qFlwLkINimcJ8Ya', 'CEO', 'Fulaninho'),
(NULL, 17, 'kayo@gmail.com', '$2y$10$1pSCC.Is7WA5yMyXz0gfb.lqZCAwUKESf2nAF.IHr272J4FA.vAA6', 'usuario', 'Big Big');

-- --------------------------------------------------------

--
-- Estrutura para tabela `videos`
--

CREATE TABLE `videos` (
  `ID` int(11) NOT NULL,
  `fk_categoria` int(11) NOT NULL,
  `fk_playlist` int(11) DEFAULT NULL,
  `titulo` varchar(200) NOT NULL,
  `url` varchar(200) NOT NULL,
  `salvar` tinyint(4) DEFAULT 0,
  `assistir_mais_tarde` tinyint(4) DEFAULT 0,
  `descricao` varchar(200) NOT NULL,
  `thumbnail` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `videos`
--

INSERT INTO `videos` (`ID`, `fk_categoria`, `fk_playlist`, `titulo`, `url`, `salvar`, `assistir_mais_tarde`, `descricao`, `thumbnail`) VALUES
(29, 2, NULL, 'gr', '', 0, 0, '', ''),
(30, 4, NULL, 'E', '', 0, 0, '', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_faixa_etaria` (`fk_faixa_etaria`);

--
-- Índices de tabela `codigos`
--
ALTER TABLE `codigos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `faixa_etaria`
--
ALTER TABLE `faixa_etaria`
  ADD PRIMARY KEY (`ID`);

--
-- Índices de tabela `id_videos_id_playlist`
--
ALTER TABLE `id_videos_id_playlist`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_videos` (`fk_videos`),
  ADD KEY `fk_playlist` (`fk_playlist`);

--
-- Índices de tabela `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_likes_usuario_id` (`usuario_id`),
  ADD KEY `fk_likes_videos_id` (`videos_id`);

--
-- Índices de tabela `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_videos2` (`fk_videos`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_pessoa` (`fk_pessoa`);

--
-- Índices de tabela `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_categoria_ID_videos` (`fk_categoria`),
  ADD KEY `fk_playlist2` (`fk_playlist`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `codigos`
--
ALTER TABLE `codigos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `faixa_etaria`
--
ALTER TABLE `faixa_etaria`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `id_videos_id_playlist`
--
ALTER TABLE `id_videos_id_playlist`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `likes`
--
ALTER TABLE `likes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de tabela `playlist`
--
ALTER TABLE `playlist`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `videos`
--
ALTER TABLE `videos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `categoria`
--
ALTER TABLE `categoria`
  ADD CONSTRAINT `fk_faixa_etaria` FOREIGN KEY (`fk_faixa_etaria`) REFERENCES `faixa_etaria` (`ID`);

--
-- Restrições para tabelas `id_videos_id_playlist`
--
ALTER TABLE `id_videos_id_playlist`
  ADD CONSTRAINT `id_videos_id_playlist_ibfk_1` FOREIGN KEY (`fk_videos`) REFERENCES `playlist` (`fk_videos`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_videos_id_playlist_ibfk_2` FOREIGN KEY (`fk_playlist`) REFERENCES `videos` (`fk_playlist`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `fk_likes_usuario_id` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`ID`),
  ADD CONSTRAINT `fk_likes_videos_id` FOREIGN KEY (`videos_id`) REFERENCES `videos` (`ID`);

--
-- Restrições para tabelas `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_pessoa` FOREIGN KEY (`fk_pessoa`) REFERENCES `pessoa` (`id`);

--
-- Restrições para tabelas `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_ibfk_1` FOREIGN KEY (`fk_categoria`) REFERENCES `categoria` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
