-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Tempo de geração: 22/10/2020 às 22:18
-- Versão do servidor: 8.0.21
-- Versão do PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `fullstack-eletro`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` int NOT NULL,
  `nome_cliente` varchar(1000) NOT NULL,
  `endereco_cliente` varchar(1000) NOT NULL,
  `telefone_cliente` varchar(1000) NOT NULL,
  `nome_produto` varchar(1000) NOT NULL,
  `valor_unitario_produto` int NOT NULL,
  `quantidade_produto` int NOT NULL,
  `valor_total_produto` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `pedidos`
--

INSERT INTO `pedidos` (`id_pedido`, `nome_cliente`, `endereco_cliente`, `telefone_cliente`, `nome_produto`, `valor_unitario_produto`, `quantidade_produto`, `valor_total_produto`) VALUES
(1, 'Henrique', 'Rua alguma coisa', '11969711395', 'Computador Porreta', 50, 10, 500),
(2, 'Paulo', 'Rua Coisa Alguma', '67984437779', 'Batedeira Porreta', 50, 10, 500);

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id_produto` int NOT NULL,
  `nome_produto` varchar(1000) NOT NULL,
  `descricao_produto` text NOT NULL,
  `preco_produto` bigint NOT NULL,
  `imagem_produto` varchar(1000) NOT NULL,
  `categoria_produto` varchar(255) NOT NULL,
  `preco_antigo_produto` int NOT NULL,
  `1_imagem_produto` varchar(255) NOT NULL,
  `2_imagem_produto` varchar(255) NOT NULL,
  `3_imagem_produto` varchar(255) NOT NULL,
  `4_imagem_produto` varchar(255) NOT NULL,
  `descricao_completa_produto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id_produto`, `nome_produto`, `descricao_produto`, `preco_produto`, `imagem_produto`, `categoria_produto`, `preco_antigo_produto`, `1_imagem_produto`, `2_imagem_produto`, `3_imagem_produto`, `4_imagem_produto`, `descricao_completa_produto`) VALUES
(1, 'Computador', 'Computadore legal', 10, 'https://dsadwsadsadsaewdsadsadw', 'Computador', 0, 'https://dsadwsadsadsaewdsadsadw', 'https://dsadwsadsadsaewdsadsadw', 'https://dsadwsadsadsaewdsadsadw', 'https://dsadwsadsadsaewdsadsadw', 'dsadsa dsa dsa das dsa das da a sad dsadsa dsa dsa das dsa das da a sad dsadsa dsa dsa das dsa das da a sad dsadsa dsa dsa das dsa das da a sad dsadsa dsa dsa das dsa das da a sad dsadsa dsa dsa das dsa das da a sad dsadsa dsa dsa das dsa das da a sad dsadsa dsa dsa das dsa das da a sad dsadsa dsa dsa das dsa das da a sad dsadsa dsa dsa das dsa das da a sad '),
(2, 'Batedeira', 'Uma batedeira maneira, bate pedra', 400, 'https://cdn.pixabay.com/photo/2016/02/19/11/19/computer-1209641_960_720.jpg', 'Batedeira', 500, 'https://cdn.pixabay.com/photo/2017/09/25/11/55/cyberspace-2784907_960_720.jpg', 'https://cdn.pixabay.com/photo/2015/01/12/17/40/padlock-597495_960_720.jpg', 'https://cdn.pixabay.com/photo/2017/05/05/22/49/phone-2288456_960_720.jpg', 'https://cdn.pixabay.com/photo/2013/01/29/00/47/magnifying-glass-76520_960_720.png', 'Uma batedeira maneira, bate pedraUma batedeira maneira, bate pedraUma batedeira maneira, bate pedraUma batedeira maneira, bate pedraUma batedeira maneira, bate pedraUma batedeira maneira, bate pedraUma batedeira maneira, bate pedraUma batedeira maneira, bate pedraUma batedeira maneira, bate pedra'),
(3, 'Batedeira', 'Uma batedeira maneira, bate pedra', 400, 'https://cdn.pixabay.com/photo/2016/02/19/11/19/computer-1209641_960_720.jpg', 'Batedeira', 500, 'https://cdn.pixabay.com/photo/2017/09/25/11/55/cyberspace-2784907_960_720.jpg', 'https://cdn.pixabay.com/photo/2015/01/12/17/40/padlock-597495_960_720.jpg', 'https://cdn.pixabay.com/photo/2017/05/05/22/49/phone-2288456_960_720.jpg', 'https://cdn.pixabay.com/photo/2013/01/29/00/47/magnifying-glass-76520_960_720.png', 'Uma batedeira maneira, bate pedraUma batedeira maneira, bate pedraUma batedeira maneira, bate pedraUma batedeira maneira, bate pedraUma batedeira maneira, bate pedraUma batedeira maneira, bate pedraUma batedeira maneira, bate pedraUma batedeira maneira, bate pedraUma batedeira maneira, bate pedra'),
(4, 'computador última geração', 'computador última geração dsa da computador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geração', 4000, 'https://cdn.pixabay.com/photo/2015/01/12/17/40/padlock-597495_960_720.jpg', 'Computador', 5000, 'https://cdn.pixabay.com/photo/2013/01/29/00/47/magnifying-glass-76520_960_720.png', 'https://cdn.pixabay.com/photo/2017/05/05/22/49/phone-2288456_960_720.jpg', 'https://cdn.pixabay.com/photo/2013/01/29/00/47/magnifying-glass-76520_960_720.png', 'https://cdn.pixabay.com/photo/2015/01/12/17/40/padlock-597495_960_720.jpg', 'computador última geração dsa da computador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geração dsa da computador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geração dsa da computador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geração dsa da computador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geração dsa da computador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geração dsa da computador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geração dsa da computador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geração dsa da computador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geração dsa da computador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geração dsa da computador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geração dsa da computador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geração dsa da computador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geração dsa da computador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geração dsa da computador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geração dsa da computador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geração dsa da computador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geração dsa da computador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geração dsa da computador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geração dsa da computador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geração dsa da computador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geração dsa da computador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geração dsa da computador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geração dsa da computador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geração dsa da computador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geração'),
(5, 'computador última geração', 'computador última geração dsa da computador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geração', 4000, 'https://cdn.pixabay.com/photo/2015/01/12/17/40/padlock-597495_960_720.jpg', 'Computador', 5000, 'https://cdn.pixabay.com/photo/2013/01/29/00/47/magnifying-glass-76520_960_720.png', 'https://cdn.pixabay.com/photo/2017/05/05/22/49/phone-2288456_960_720.jpg', 'https://cdn.pixabay.com/photo/2013/01/29/00/47/magnifying-glass-76520_960_720.png', 'https://cdn.pixabay.com/photo/2015/01/12/17/40/padlock-597495_960_720.jpg', 'computador última geração dsa da computador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geração dsa da computador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geração dsa da computador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geração dsa da computador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geração dsa da computador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geração dsa da computador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geração dsa da computador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geração dsa da computador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geração dsa da computador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geração dsa da computador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geração dsa da computador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geração dsa da computador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geração dsa da computador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geração dsa da computador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geração dsa da computador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geração dsa da computador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geração dsa da computador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geração dsa da computador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geração dsa da computador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geração dsa da computador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geração dsa da computador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geração dsa da computador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geração dsa da computador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geração dsa da computador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geraçãocomputador última geração');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedido`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_produto`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produto` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
