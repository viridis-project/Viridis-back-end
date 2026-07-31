-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11/06/2026 às 12:51
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
-- Banco de dados: `viridisbd`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `certificado`
--

CREATE TABLE `certificado` (
  `id` int(11) NOT NULL,
  `aluno_id` int(11) NOT NULL,
  `codigo_verificacao` varchar(100) NOT NULL,
  `url_pdf` varchar(500) DEFAULT NULL,
  `data_emissao` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cronograma_aluno`
--

CREATE TABLE `cronograma_aluno` (
  `id` int(11) NOT NULL,
  `aluno_id` int(11) NOT NULL,
  `missao_id` int(11) NOT NULL,
  `data_sugerida` datetime DEFAULT NULL,
  `data_limite_personalizada` datetime DEFAULT NULL,
  `status_atividade` varchar(20) DEFAULT 'Pendente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `horta`
--

CREATE TABLE `horta` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `instituicao_id` int(11) NOT NULL,
  `localizacao` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `inspecao_horta`
--

CREATE TABLE `inspecao_horta` (
  `id` int(11) NOT NULL,
  `horta_id` int(11) NOT NULL,
  `responsavel_id` int(11) NOT NULL,
  `qtd_plantas` int(11) DEFAULT NULL,
  `observacoes` text DEFAULT NULL,
  `data_inspecao` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `instituicao`
--

CREATE TABLE `instituicao` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `cnpj` varchar(20) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `missao`
--

CREATE TABLE `missao` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descricao` text DEFAULT NULL,
  `pontos_recompensa` int(11) NOT NULL DEFAULT 10,
  `criador_id` int(11) NOT NULL,
  `data_criacao` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `opcao_quiz`
--

CREATE TABLE `opcao_quiz` (
  `id` int(11) NOT NULL,
  `pergunta_id` int(11) NOT NULL,
  `texto_opcao` varchar(255) NOT NULL,
  `is_correta` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `perfil`
--

CREATE TABLE `perfil` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pergunta_quiz`
--

CREATE TABLE `pergunta_quiz` (
  `id` int(11) NOT NULL,
  `criador_id` int(11) NOT NULL,
  `texto_pergunta` text NOT NULL,
  `pontos_recompensa` int(11) DEFAULT 5
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `progresso_quiz`
--

CREATE TABLE `progresso_quiz` (
  `id` int(11) NOT NULL,
  `aluno_id` int(11) NOT NULL,
  `pergunta_id` int(11) NOT NULL,
  `acertou` tinyint(1) NOT NULL,
  `data_resposta` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `submissao_missao`
--

CREATE TABLE `submissao_missao` (
  `id` int(11) NOT NULL,
  `aluno_id` int(11) NOT NULL,
  `missao_id` int(11) NOT NULL,
  `url_foto` varchar(500) NOT NULL,
  `ia_validada` tinyint(1) DEFAULT NULL,
  `professor_validado` tinyint(1) DEFAULT NULL,
  `data_envio` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `pontos_totais` int(11) DEFAULT 0,
  `perfil_id` int(11) NOT NULL,
  `instituicao_id` int(11) DEFAULT NULL,
  `data_criacao` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `certificado`
--
ALTER TABLE `certificado`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo_verificacao` (`codigo_verificacao`),
  ADD KEY `aluno_id` (`aluno_id`);

--
-- Índices de tabela `cronograma_aluno`
--
ALTER TABLE `cronograma_aluno`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aluno_id` (`aluno_id`),
  ADD KEY `missao_id` (`missao_id`);

--
-- Índices de tabela `horta`
--
ALTER TABLE `horta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `instituicao_id` (`instituicao_id`);

--
-- Índices de tabela `inspecao_horta`
--
ALTER TABLE `inspecao_horta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `horta_id` (`horta_id`),
  ADD KEY `responsavel_id` (`responsavel_id`);

--
-- Índices de tabela `instituicao`
--
ALTER TABLE `instituicao`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cnpj` (`cnpj`);

--
-- Índices de tabela `missao`
--
ALTER TABLE `missao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `criador_id` (`criador_id`);

--
-- Índices de tabela `opcao_quiz`
--
ALTER TABLE `opcao_quiz`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pergunta_id` (`pergunta_id`);

--
-- Índices de tabela `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `pergunta_quiz`
--
ALTER TABLE `pergunta_quiz`
  ADD PRIMARY KEY (`id`),
  ADD KEY `criador_id` (`criador_id`);

--
-- Índices de tabela `progresso_quiz`
--
ALTER TABLE `progresso_quiz`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aluno_id` (`aluno_id`),
  ADD KEY `pergunta_id` (`pergunta_id`);

--
-- Índices de tabela `submissao_missao`
--
ALTER TABLE `submissao_missao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aluno_id` (`aluno_id`),
  ADD KEY `missao_id` (`missao_id`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD KEY `perfil_id` (`perfil_id`),
  ADD KEY `instituicao_id` (`instituicao_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `certificado`
--
ALTER TABLE `certificado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cronograma_aluno`
--
ALTER TABLE `cronograma_aluno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `horta`
--
ALTER TABLE `horta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `inspecao_horta`
--
ALTER TABLE `inspecao_horta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `instituicao`
--
ALTER TABLE `instituicao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `missao`
--
ALTER TABLE `missao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `opcao_quiz`
--
ALTER TABLE `opcao_quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pergunta_quiz`
--
ALTER TABLE `pergunta_quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `progresso_quiz`
--
ALTER TABLE `progresso_quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `submissao_missao`
--
ALTER TABLE `submissao_missao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `certificado`
--
ALTER TABLE `certificado`
  ADD CONSTRAINT `certificado_ibfk_1` FOREIGN KEY (`aluno_id`) REFERENCES `usuario` (`id`);

--
-- Restrições para tabelas `cronograma_aluno`
--
ALTER TABLE `cronograma_aluno`
  ADD CONSTRAINT `cronograma_aluno_ibfk_1` FOREIGN KEY (`aluno_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `cronograma_aluno_ibfk_2` FOREIGN KEY (`missao_id`) REFERENCES `missao` (`id`);

--
-- Restrições para tabelas `horta`
--
ALTER TABLE `horta`
  ADD CONSTRAINT `horta_ibfk_1` FOREIGN KEY (`instituicao_id`) REFERENCES `instituicao` (`id`);

--
-- Restrições para tabelas `inspecao_horta`
--
ALTER TABLE `inspecao_horta`
  ADD CONSTRAINT `inspecao_horta_ibfk_1` FOREIGN KEY (`horta_id`) REFERENCES `horta` (`id`),
  ADD CONSTRAINT `inspecao_horta_ibfk_2` FOREIGN KEY (`responsavel_id`) REFERENCES `usuario` (`id`);

--
-- Restrições para tabelas `missao`
--
ALTER TABLE `missao`
  ADD CONSTRAINT `missao_ibfk_1` FOREIGN KEY (`criador_id`) REFERENCES `usuario` (`id`);

--
-- Restrições para tabelas `opcao_quiz`
--
ALTER TABLE `opcao_quiz`
  ADD CONSTRAINT `opcao_quiz_ibfk_1` FOREIGN KEY (`pergunta_id`) REFERENCES `pergunta_quiz` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `pergunta_quiz`
--
ALTER TABLE `pergunta_quiz`
  ADD CONSTRAINT `pergunta_quiz_ibfk_1` FOREIGN KEY (`criador_id`) REFERENCES `usuario` (`id`);

--
-- Restrições para tabelas `progresso_quiz`
--
ALTER TABLE `progresso_quiz`
  ADD CONSTRAINT `progresso_quiz_ibfk_1` FOREIGN KEY (`aluno_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `progresso_quiz_ibfk_2` FOREIGN KEY (`pergunta_id`) REFERENCES `pergunta_quiz` (`id`);

--
-- Restrições para tabelas `submissao_missao`
--
ALTER TABLE `submissao_missao`
  ADD CONSTRAINT `submissao_missao_ibfk_1` FOREIGN KEY (`aluno_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `submissao_missao_ibfk_2` FOREIGN KEY (`missao_id`) REFERENCES `missao` (`id`);

--
-- Restrições para tabelas `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`perfil_id`) REFERENCES `perfil` (`id`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`instituicao_id`) REFERENCES `instituicao` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
