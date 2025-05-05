-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27/04/2025 às 01:28
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
-- Banco de dados: `projetointegrador_maxfibra`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `contratacoes`
--

CREATE TABLE `contratacoes` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `plano_id` int(11) DEFAULT NULL,
  `data_contratacao` datetime DEFAULT current_timestamp(),
  `observacao` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `faturas`
--

CREATE TABLE `faturas` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `nome_arquivo` varchar(255) DEFAULT NULL,
  `data_emissao` date DEFAULT NULL,
  `vencimento` date DEFAULT NULL,
  `valor` decimal(10,2) DEFAULT NULL,
  `status` enum('Paga','Em Aberto') DEFAULT 'Em Aberto'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `faturas`
--

INSERT INTO `faturas` (`id`, `usuario_id`, `nome_arquivo`, `data_emissao`, `vencimento`, `valor`, `status`) VALUES
(1, 1, 'fatura_joao.pdf', '2025-04-01', '2025-04-10', 120.50, 'Paga'),
(2, 2, 'fatura_maria.pdf', '2025-04-01', '2025-04-25', 89.99, ''),
(3, 3, 'fatura_carlos.pdf', '2025-03-01', '2025-03-10', 150.75, ''),
(4, 4, 'fatura_ana.pdf', '2025-04-01', '2025-04-20', 99.99, 'Paga'),
(5, 5, 'fatura_bruno.pdf', '2025-04-01', '2025-04-30', 75.00, 'Em Aberto');

-- --------------------------------------------------------

--
-- Estrutura para tabela `planos`
--

CREATE TABLE `planos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `velocidade` varchar(20) DEFAULT NULL,
  `preco` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `planos`
--

INSERT INTO `planos` (`id`, `nome`, `velocidade`, `preco`) VALUES
(1, 'Plano Básico', '100 Mbps', 99.90),
(2, 'Plano Intermediário', '200 Mbps', 129.90),
(3, 'Plano Avançado', '300 Mbps', 159.90),
(4, 'Plano Premium', '500 Mbps', 199.90);

-- --------------------------------------------------------

--
-- Estrutura para tabela `suporte`
--

CREATE TABLE `suporte` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `mensagem` text DEFAULT NULL,
  `data_solicitacao` datetime DEFAULT current_timestamp(),
  `status` enum('Aberto','Em andamento','Resolvido') DEFAULT 'Aberto'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `suporte`
--

INSERT INTO `suporte` (`id`, `usuario_id`, `email`, `nome`, `mensagem`, `data_solicitacao`, `status`) VALUES
(1, NULL, 'rs.coelho@gmail', 'Roberto', 'ee', '2025-04-26 20:24:07', 'Aberto');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `plano_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `telefone`, `endereco`, `plano_id`) VALUES
(1, 'João Silva', 'joao@email.com', '123456', '11999999999', 'Rua A', 1),
(2, 'Maria Souza', 'maria@email.com', '123456', '11888888888', 'Rua B', 2),
(3, 'Carlos Lima', 'carlos@email.com', '123456', '11777777777', 'Rua C', 3),
(4, 'Ana Paula', 'ana@email.com', '123456', '11666666666', 'Rua D', NULL),
(5, 'Bruno Rocha', 'bruno@email.com', '123456', '11555555555', 'Rua E', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `contratacoes`
--
ALTER TABLE `contratacoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `plano_id` (`plano_id`);

--
-- Índices de tabela `faturas`
--
ALTER TABLE `faturas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Índices de tabela `planos`
--
ALTER TABLE `planos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `suporte`
--
ALTER TABLE `suporte`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `plano_id` (`plano_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `contratacoes`
--
ALTER TABLE `contratacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `faturas`
--
ALTER TABLE `faturas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `planos`
--
ALTER TABLE `planos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `suporte`
--
ALTER TABLE `suporte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `contratacoes`
--
ALTER TABLE `contratacoes`
  ADD CONSTRAINT `contratacoes_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `contratacoes_ibfk_2` FOREIGN KEY (`plano_id`) REFERENCES `planos` (`id`);

--
-- Restrições para tabelas `faturas`
--
ALTER TABLE `faturas`
  ADD CONSTRAINT `faturas_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Restrições para tabelas `suporte`
--
ALTER TABLE `suporte`
  ADD CONSTRAINT `suporte_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Restrições para tabelas `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`plano_id`) REFERENCES `planos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
