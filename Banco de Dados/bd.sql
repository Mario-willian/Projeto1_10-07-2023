-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 26-Set-2019 às 10:07
-- Versão do servidor: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
Create database bd;
use bd;
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `adm`
--

CREATE TABLE `adm` (
  `id` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `login` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `adm` (`id`, `nome`, `login`, `senha`) VALUES
(1, 'Italo Almeida', 'italo', '123');

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `cpf` char(14) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `senha` varchar(80) NOT NULL,
  `endereco` varchar(120) NOT NULL,
  `estado` char(2) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `email` varchar(80) NOT NULL,
  `pagamento` varchar(45) NOT NULL,
  `ativo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Stand-in structure for view `compra_dia`
-- (See below for the actual view)
--
CREATE TABLE `compra_dia` (
`dia` int(2)
,`Quantidade` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `compra_mes`
-- (See below for the actual view)
--
CREATE TABLE `compra_mes` (
`mes` int(2)
,`Quantidade` bigint(21)
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `compra_venda`
--

CREATE TABLE `compra_venda` (
  `id` int(11) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `valor` double NOT NULL,
  `tp_pagamento` varchar(45) NOT NULL,
  `vendedor_cpf` char(14) NOT NULL,
  `cliente_cpf` char(14) NOT NULL,
  `entregador_cpf` char(14) NOT NULL,
  `status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Extraindo dados da tabela `compra_venda`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `entregador`
--

CREATE TABLE `entregador` (
  `cpf` char(14) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `placa` char(7) NOT NULL,
  `cnh` char(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque`
--

CREATE TABLE `estoque` (
  `id` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `produto_id` int(11) NOT NULL,
  `vendedor_cpf` char(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--


-- --------------------------------------------------------

--
-- Stand-in structure for view `estoque_produto`
-- (See below for the actual view)
--
CREATE TABLE `estoque_produto` (
`codigo_estoque` int(11)
,`codigo_produto` int(11)
,`nome` varchar(80)
,`quantidade` int(11)
,`valor` double
,`foto` varchar(100)
,`vendedor_cpf` char(14)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `estoque_vendedor`
-- (See below for the actual view)
--
CREATE TABLE `estoque_vendedor` (
`codigo_produto` int(11)
,`produto` varchar(80)
,`quantidade` int(11)
,`valor` double
,`vendedor` varchar(80)
,`cpf` char(14)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `historico_de_compras`
-- (See below for the actual view)
--
CREATE TABLE `historico_de_compras` (
`codigo_produto` int(11)
,`produto` varchar(80)
,`quantidade` int(11)
,`valor` double
,`cpf` char(14)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `historico_de_vendas`
-- (See below for the actual view)
--
CREATE TABLE `historico_de_vendas` (
`codigo_produto` int(11)
,`produto` varchar(80)
,`quantidade` int(11)
,`valor` double
,`vendedor` varchar(80)
,`cpf` char(14)
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `item_venda`
--

CREATE TABLE `item_venda` (
  `id` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `produto_id` int(11) NOT NULL,
  `compra_venda_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `compra_venda`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `maior_venda`
-- (See below for the actual view)
--
CREATE TABLE `maior_venda` (
`Valor` double
,`cliente` varchar(80)
,`vendedor` varchar(80)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `melhores_compradores`
-- (See below for the actual view)
--
CREATE TABLE `melhores_compradores` (
`total` double
,`quantidade_compras` bigint(21)
,`nome` varchar(80)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `melhores_vendedores`
-- (See below for the actual view)
--
CREATE TABLE `melhores_vendedores` (
`total` double
,`quantidade_vendas` bigint(21)
,`nome` varchar(80)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `melhor_mes`
-- (See below for the actual view)
--
CREATE TABLE `melhor_mes` (
`Mês` int(2)
,`Quantidade` bigint(21)
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `notificacao`
--

CREATE TABLE `notificacao` (
  `codigo` int(11) NOT NULL,
  `titulo` varchar(20) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `cor` varchar(20) NOT NULL,
  `ativa` tinyint(1) NOT NULL,
  `vendedor_cpf` char(14) DEFAULT NULL,
  `cliente_cpf` char(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `valor` double NOT NULL,
  `vendedor_cpf` char(14) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



-- --------------------------------------------------------

--
-- Stand-in structure for view `produtos_mais_vendidos`
-- (See below for the actual view)
--
CREATE TABLE `produtos_mais_vendidos` (
`quantidade` decimal(32,0)
,`nome` varchar(80)
,`valor` double
,`foto` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `quantidade_vendas`
-- (See below for the actual view)
--
CREATE TABLE `quantidade_vendas` (
`vendas_concluidas` bigint(21)
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendedor`
--

CREATE TABLE `vendedor` (
  `cpf` char(14) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `senha` varchar(80) NOT NULL,
  `endereco` varchar(120) NOT NULL,
  `estado` char(2) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `email` varchar(80) NOT NULL,
  `banco` varchar(30) NOT NULL,
  `agencia` char(6) NOT NULL,
  `conta` char(7) NOT NULL,
  `avaliacao` double NOT NULL,
  `ativo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao`
--

CREATE TABLE `avaliacao` (
  `id` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `vendedor_cpf` char(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure for view `compra_dia`
--
DROP TABLE IF EXISTS `compra_dia`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `compra_dia`  AS  select dayofmonth(`compra_venda`.`data`) AS `dia`,count(0) AS `Quantidade` from `compra_venda` group by dayofmonth(`compra_venda`.`data`) ;

-- --------------------------------------------------------

--
-- Structure for view `compra_mes`
--
DROP TABLE IF EXISTS `compra_mes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `compra_mes`  AS  select month(`compra_venda`.`data`) AS `mes`,count(0) AS `Quantidade` from `compra_venda` group by month(`compra_venda`.`data`) ;

-- --------------------------------------------------------

--
-- Structure for view `estoque_produto`
--
DROP TABLE IF EXISTS `estoque_produto`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `estoque_produto`  AS  select `estoque`.`id` AS `codigo_estoque`,`produto`.`id` AS `codigo_produto`,`produto`.`nome` AS `nome`,`produto`.`tipo` AS `tipo`,`estoque`.`quantidade` AS `quantidade`,`produto`.`valor` AS `valor`,`produto`.`foto` AS `foto`,`estoque`.`vendedor_cpf` AS `vendedor_cpf` from (`produto` join `estoque` on((`produto`.`id` = `estoque`.`produto_id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `estoque_vendedor`
--
DROP TABLE IF EXISTS `estoque_vendedor`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `estoque_vendedor`  AS  select `estoque`.`produto_id` AS `codigo_produto`,`produto`.`nome` AS `produto`,`estoque`.`quantidade` AS `quantidade`,`produto`.`valor` AS `valor`,`vendedor`.`nome` AS `vendedor`,`vendedor`.`cpf` AS `cpf` from ((`estoque` join `produto` on((`estoque`.`produto_id` = `produto`.`id`))) join `vendedor` on((`estoque`.`vendedor_cpf` = `vendedor`.`cpf`))) ;

-- --------------------------------------------------------

--
-- Structure for view `historico_de_compras`
--
DROP TABLE IF EXISTS `historico_de_compras`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `historico_de_compras`  AS  select `produto`.`id` AS `codigo_produto`, `compra_venda`.`id` AS `id_compra_venda`, `produto`.`nome` AS `produto`,`item_venda`.`quantidade` AS `quantidade`,`compra_venda`.`valor` AS `valor`,`cliente`.`cpf` AS `cpf`, `compra_venda`.`vendedor_cpf` AS `vendedor_cpf`, `compra_venda`.`status` as `status` from (((`item_venda` join `produto` on((`produto`.`id` = `item_venda`.`produto_id`))) join `compra_venda` on((`compra_venda`.`id` = `item_venda`.`compra_venda_id`))) join `cliente` on((`cliente`.`cpf` = `compra_venda`.`cliente_cpf`))) ;

-- --------------------------------------------------------

--
-- Structure for view `historico_de_vendas`
--
DROP TABLE IF EXISTS `historico_de_vendas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `historico_de_vendas`  AS  select `produto`.`id` AS `codigo_produto`,`compra_venda`.`id` AS `id_compra_venda`,`produto`.`nome` AS `produto`, `compra_venda`.`data` AS `data`,`item_venda`.`quantidade` AS `quantidade`,`compra_venda`.`valor` AS `valor`,`vendedor`.`nome` AS `vendedor`,`vendedor`.`cpf` AS `vendedor_cpf`, `compra_venda`.`cliente_cpf` AS `cliente_cpf`, `compra_venda`.`status` as `status` from (((`item_venda` join `produto` on((`produto`.`id` = `item_venda`.`produto_id`))) join `compra_venda` on((`compra_venda`.`id` = `item_venda`.`compra_venda_id`))) join `vendedor` on((`compra_venda`.`vendedor_cpf` = `vendedor`.`cpf`))) ;

-- --------------------------------------------------------

--
-- Structure for view `estoque_pacote`
--
DROP TABLE IF EXISTS `estoque_pacotes`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `estoque_pacotes`  AS  select `estoque`.`id` AS `codigo_estoque`,`produto`.`id` AS `codigo_produto`,`produto`.`nome` AS `nome`,`estoque`.`quantidade` AS `quantidade`,`produto`.`valor` AS `valor`,`produto`.`foto` AS `foto`,`estoque`.`vendedor_cpf` AS `vendedor_cpf` from (`produto` join `estoque` on((`produto`.`id` = `estoque`.`produto_id`))) where produto.tipo = "Pacote Promocional";

-- --------------------------------------------------------
--
-- Structure for view `maior_venda`
--
DROP TABLE IF EXISTS `maior_venda`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `maior_venda`  AS  select `compra_venda`.`valor` AS `Valor`,`cliente`.`nome` AS `cliente`,`vendedor`.`nome` AS `vendedor` from ((`compra_venda` join `cliente` on((`cliente`.`cpf` = `compra_venda`.`cliente_cpf`))) join `vendedor` on((`vendedor`.`cpf` = `compra_venda`.`vendedor_cpf`))) order by `compra_venda`.`valor` desc limit 1 ;

-- --------------------------------------------------------

--
-- Structure for view `melhores_compradores`
--
DROP TABLE IF EXISTS `melhores_compradores`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `melhores_compradores`  AS  select sum(`compra_venda`.`valor`) AS `total`,count(0) AS `quantidade_compras`,`cliente`.`nome` AS `nome` from (`compra_venda` join `cliente` on((`compra_venda`.`cliente_cpf` = `cliente`.`cpf`))) group by `compra_venda`.`cliente_cpf` order by sum(`compra_venda`.`valor`) desc limit 3 ;

-- --------------------------------------------------------

--
-- Structure for view `melhores_vendedores`
--
DROP TABLE IF EXISTS `melhores_vendedores`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `melhores_vendedores`  AS  select sum(`compra_venda`.`valor`) AS `total`,count(0) AS `quantidade_vendas`,`vendedor`.`nome` AS `nome` from (`compra_venda` join `vendedor` on((`compra_venda`.`vendedor_cpf` = `vendedor`.`cpf`))) group by `compra_venda`.`vendedor_cpf` order by sum(`compra_venda`.`valor`) desc limit 3 ;

-- --------------------------------------------------------

--
-- Structure for view `melhor_mes`
--
DROP TABLE IF EXISTS `melhor_mes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `melhor_mes`  AS  select `compra_mes`.`mes` AS `Mês`,max(`compra_mes`.`Quantidade`) AS `Quantidade` from `compra_mes` group by `compra_mes`.`mes` limit 1 ;

-- --------------------------------------------------------

--
-- Structure for view `produtos_mais_vendidos`
--
DROP TABLE IF EXISTS `produtos_mais_vendidos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `produtos_mais_vendidos`  AS  select sum(`item_venda`.`quantidade`) AS `quantidade`,`produto`.`nome` AS `nome`,`produto`.`valor` AS `valor`,`produto`.`foto` AS `foto` from (`item_venda` join `produto` on((`item_venda`.`produto_id` = `produto`.`id`))) group by `produto`.`nome` order by sum(`item_venda`.`quantidade`) desc limit 3 ;
-- --------------------------------------------------------

--
-- Structure for view `quantidade_vendas`
--
DROP TABLE IF EXISTS `quantidade_vendas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `quantidade_vendas`  AS  select count(0) AS `vendas_concluidas` from `compra_venda` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adm`
--
ALTER TABLE `adm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cpf`);

--
-- Indexes for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compra_venda`
--
ALTER TABLE `compra_venda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_cpf` (`cliente_cpf`),
  ADD KEY `entregador_cpf` (`entregador_cpf`),
  ADD KEY `vendedor_cpf` (`vendedor_cpf`) USING BTREE;

--
-- Indexes for table `entregador`
--
ALTER TABLE `entregador`
  ADD PRIMARY KEY (`cpf`);

--
-- Indexes for table `estoque`
--
ALTER TABLE `estoque`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendedor_cpf` (`vendedor_cpf`),
  ADD KEY `produto_id` (`produto_id`);

--
-- Indexes for table `item_venda`
--
ALTER TABLE `item_venda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produto_id` (`produto_id`),
  ADD KEY `compra_venda_id` (`compra_venda_id`);

--
-- Indexes for table `notificacao`
--
ALTER TABLE `notificacao`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `vendedor_cpf` (`vendedor_cpf`),
  ADD KEY `cliente_cpf` (`cliente_cpf`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendedor_cpf` (`vendedor_cpf`);

--
-- Indexes for table `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendedor` (`vendedor_cpf`),
  ADD KEY `vendedor_cpf` (`vendedor_cpf`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `avaliacao`
--
ALTER TABLE `avaliacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Indexes for table `vendedor`
--
ALTER TABLE `vendedor`
  ADD PRIMARY KEY (`cpf`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adm`
--
ALTER TABLE `adm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `compra_venda`
--
ALTER TABLE `compra_venda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `estoque`
--
ALTER TABLE `estoque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notificacao`
--
ALTER TABLE `notificacao`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `item_venda`
--
ALTER TABLE `item_venda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `compra_venda`
--
ALTER TABLE `compra_venda`
  ADD CONSTRAINT `cliente_cpf` FOREIGN KEY (`cliente_cpf`) REFERENCES `cliente` (`cpf`) ON UPDATE CASCADE,
  ADD CONSTRAINT `entregador_cpf` FOREIGN KEY (`entregador_cpf`) REFERENCES `entregador` (`cpf`) ON UPDATE CASCADE,
  ADD CONSTRAINT `vendedor_cpf` FOREIGN KEY (`vendedor_cpf`) REFERENCES `vendedor` (`cpf`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `estoque`
--
ALTER TABLE `estoque`
  ADD CONSTRAINT `produto_id` FOREIGN KEY (`produto_id`) REFERENCES `produto` (`id`),
  ADD CONSTRAINT `vendedor_cpf3` FOREIGN KEY (`vendedor_cpf`) REFERENCES `vendedor` (`cpf`);

--
-- Limitadores para a tabela `item_venda`
--
ALTER TABLE `item_venda`
  ADD CONSTRAINT `compra_venda_id` FOREIGN KEY (`compra_venda_id`) REFERENCES `compra_venda` (`id`),
  ADD CONSTRAINT `produto_id2` FOREIGN KEY (`produto_id`) REFERENCES `produto` (`id`);

--
-- Limitadores para a tabela `notificacao`
--
ALTER TABLE `notificacao`
  ADD CONSTRAINT `cliente_cpf2` FOREIGN KEY (`cliente_cpf`) REFERENCES `cliente` (`cpf`),
  ADD CONSTRAINT `vendedor_cpf2` FOREIGN KEY (`vendedor_cpf`) REFERENCES `vendedor` (`cpf`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `vendedor_cpf1` FOREIGN KEY (`vendedor_cpf`) REFERENCES `vendedor` (`cpf`);

--
-- Limitadores para a tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD CONSTRAINT `vendedor5` FOREIGN KEY (`vendedor_cpf`) REFERENCES `vendedor` (`cpf`);


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
