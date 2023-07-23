USE `supermercados_paranaiba`;

INSERT INTO `usuarios` (`id`, `nome_completo`, `email`, `senha`, `status`, `data_criacao`) VALUES
(NULL, 'Mario Willian do Carmo Ribeiro', 'mario@hotmail.com.br', '123', 'Ativo', '2023-07-19 01:08:48'),
(NULL, 'Italo Silva Peixoto', 'italo@hotmail.com.br', '1234', 'Ativo', '2023-07-19 01:08:48'),
(NULL, 'Marcos', 'marcos@hotmail.com.br', '123', 'Inativo', '2023-07-19 01:08:48');

INSERT INTO `empresas` (`id`, `cnpj`, `nome_loja`,  `razao_social`,  `status`, `data_criacao`) VALUES
(NULL, '91.350.337/0001-84', 'Empresa 1', 'EMPRESA SAMAR', 'Ativo', '2023-07-19 01:08:48'),
(NULL, '22.760.537/0001-92', 'Empresa 2', 'EMPRESA SAMAR','Ativo', '2023-07-19 01:08:48'),
(NULL, '55.725.895/0001-13', 'Empresa 3', 'EMPRESA SAMAR','Inativo', '2023-07-19 01:08:48');

INSERT INTO `acessos` (`id`, `data_criacao`, `empresas_id`, `usuarios_id`) VALUES
(NULL, '2023-07-19 01:08:48', '1', '1'),
(NULL, '2023-07-19 01:08:48', '2', '1'),
(NULL, '2023-07-19 01:08:48', '3', '1'),
(NULL, '2023-07-19 01:08:48', '2', '2'),
(NULL, '2023-07-19 01:08:48', '3', '3');

insert into funcionarios(id, cpf, nome_completo, data_nascimento, salario, nome_pai, nome_mae, observacao, status, data_criacao, empresas_id) values 
(NULL, '123.456.789-00', 'Funcionario Teste 1', '2023-07-19', '3000.30', 'Pai Teste', 'Mae Teste', '', 'Ativo', '2023-07-19 01:08:48', '1');