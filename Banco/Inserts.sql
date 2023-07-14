USE `supermercados_paranaiba`;

INSERT INTO `usuarios` (`id`, `nome_completo`, `email`, `senha`, `status`) VALUES
(NULL, 'Mario Willian do Carmo Ribeiro', 'mario@hotmail.com.br', '123', 'Ativo'),
(NULL, 'Italo Silva Peixoto', 'italo@hotmail.com.br', '1234', 'Ativo'),
(NULL, 'Marcos', 'marcos@hotmail.com.br', '123', 'Inativo');

INSERT INTO `empresas` (`id`, `cnpj`, `nome`, `status`) VALUES
(NULL, '91.350.337/0001-84', 'Empresa 1', 'Ativo'),
(NULL, '22.760.537/0001-92', 'Empresa 2', 'Ativo'),
(NULL, '55.725.895/0001-13', 'Empresa 3', 'Inativo');

INSERT INTO `acessos` (`id`, `empresas_id`, `usuarios_id`) VALUES
(NULL, '1', '1'),
(NULL, '2', '1'),
(NULL, '3', '1'),
(NULL, '2', '2'),
(NULL, '3', '3');