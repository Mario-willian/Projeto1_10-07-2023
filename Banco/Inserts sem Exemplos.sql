USE `supermercados_paranaiba`;

create view acessos_empresas as SELECT empr.id as id, empr.cnpj as cnpj, empr.nome_loja as nome_loja, empr.razao_social as razao_social, empr.status as status, empr.data_criacao as data_criacao, aces.usuarios_id as usuarios_id
FROM empresas empr 
inner join acessos aces on empr.id = aces.empresas_id;

create view acessos_ocorrencias as SELECT ocor.id as id, arqu.arquivo as arquivo, ocor.motivo as motivo, ocor.faltas as faltas, ocor.valor as valor, ocor.observacao as observacao, ocor.status as status, func.status as status_funcionario, ocor.data_criacao as data_criacao, ocor.funcionarios_id as funcionarios_id, func.nome_completo as funcionario_nome_completo, ocor.empresas_id as empresas_id, empr.nome_loja as empresa_nome_loja, empr.razao_social as empresa_razao_social, aces.usuarios_id as usuarios_id
FROM ocorrencias ocor 
inner join acessos aces on ocor.empresas_id = aces.empresas_id
inner join funcionarios func on ocor.funcionarios_id = func.id
inner join empresas empr on ocor.empresas_id = empr.id
inner join arquivos_ocorrencias arqu on arqu.ocorrencias_id = ocor.id;

create view acessos_ferias as SELECT feri.id as id, feri.data_inicio as data_inicio, feri.data_fim as data_fim, feri.observacao as observacao, feri.data_criacao as data_criacao, feri.funcionarios_id as funcionarios_id, func.nome_completo as funcionario_nome_completo, func.status as status_funcionario, feri.empresas_id as empresas_id, empr.nome_loja as empresa_nome_loja, empr.razao_social as empresa_razao_social, aces.usuarios_id as usuarios_id
FROM ferias feri 
inner join acessos aces on feri.empresas_id = aces.empresas_id
inner join funcionarios func on feri.funcionarios_id = func.id
inner join empresas empr on feri.empresas_id = empr.id;

create view acessos_recisoes as SELECT resi.id as id, resi.motivo as motivo, resi.data_criacao as data_criacao, resi.tipo as tipo, resi.exame_demissional as exame_demissional, resi.data_inicio_aviso as data_inicio_aviso, resi.data_fim_aviso as data_fim_aviso, resi.data_prazo_pagamento as data_prazo_pagamento, resi.status as status, func.status as status_funcionario, resi.observacao as observacao, resi.funcionarios_id as funcionarios_id, func.nome_completo as funcionario_nome_completo, resi.empresas_id as empresas_id, empr.nome_loja as empresa_nome_loja, empr.razao_social as empresa_razao_social, aces.usuarios_id as usuarios_id
FROM recisoes resi 
inner join acessos aces on resi.empresas_id = aces.empresas_id
inner join funcionarios func on resi.funcionarios_id = func.id
inner join empresas empr on resi.empresas_id = empr.id;

create view acessos_usuarios as SELECT usua.id as id_usuario, usua.nome_completo as nome_completo, empr.nome_loja as nome_loja, empr.razao_social as razao_social
FROM usuarios usua 
inner join acessos aces on usua.id = aces.usuarios_id
inner join empresas empr on aces.empresas_id = empr.id;

create view acessos_funcionarios as SELECT func.id as id_funcionarios, func.nome_completo as nome_completo, func.cpf as cpf, func.data_nascimento as data_nascimento, func.status as status, empr.id as empresas_id, empr.nome_loja as nome_loja, empr.razao_social as razao_social, func.setor as setor, func.funcao as funcao, func.data_inicio as data_inicio, vale.id as id_vale_transporte, vale.tipo as tipo_vale_transporte, vale.valor as valor_vale_transporte, func.salario as salario, func.nome_pai as nome_pai, func.nome_mae as nome_mae, func.observacao as observacao
FROM funcionarios func 
inner join vale_transportes vale on func.id = vale.funcionarios_id
inner join empresas empr on func.empresas_id = empr.id;

INSERT INTO `usuarios` (`id`, `nome_completo`, `email`, `senha`, `status`, `data_criacao`) VALUES
(NULL, 'Admin 10envolveu', 'admin@10envolveu.com.br', '10envolveu@2023##', 'Ativo', '2023-08-05 14:40:00'),
(NULL, 'Thiago Furtado de Souza ', 'fsouza.thiago@gmail.com', '@@Paranaiba2004', 'Ativo', '2023-08-05 14:43:00'), 
(NULL, 'Usuário Generico Limitado', 'usuario@hotmail.com', 'Usuario@2023', 'Ativo', '2023-08-05 14:43:00');

INSERT INTO `empresas` (`id`, `cnpj`, `nome_loja`,  `razao_social`,  `status`, `data_criacao`) VALUES
(NULL, '28.036.787/0001-60', 'PLANALTO', 'COMERCIAL PARANAIBA RECRUTAMENTO E REPOSICAO EIRELI', 'Ativo', '2023-08-05 14:40:00'),
(NULL, '28.036.787/0001-60', 'RODOVIARIA', 'PARANAIBA LAGOA SANTA PANIFICAÇÃO LTDA','Ativo', '2023-08-05 14:41:00'),
(NULL, '33.977.670/0001-11', 'VARZEA', 'PARANAIBA LAGOA SANTA VARZEA RECRUTAMENTO E REPOSICAO LTDA','Ativo', '2023-08-05 14:42:00'),
(NULL, '41.931.044/0001-12', 'GUANABARA', 'PARANAIBA GUANABARA DISTRIBUIDORA E TRANSPORTE LTDA','Ativo', '2023-08-05 14:43:00'),
(NULL, '12.123.892/0001-05', 'BOTAFOGO', 'NACIONAL PARANAIBA PANIFICAÇÃO LTDA','Ativo', '2023-08-05 14:44:00'),
(NULL, '29.581.989/0001-56', 'RIO BRANCO', 'PARANAIBA RIO BRANCO PANIFICAÇÃO LTDA','Ativo', '2023-08-05 14:45:00'),
(NULL, '46.759.354/0001-15', 'JUSTINOPOLIS', 'NACIONAL PARANAIBA PADARIA LTDA','Ativo', '2023-08-05 14:46:00'),
(NULL, '39.401.157/0001-64', 'RIBEIRO DE ABREU', 'PARANAIBA RIBEIRO DE ABREU PANIFICACAO','Ativo', '2023-08-05 14:47:00');

INSERT INTO `acessos` (`id`, `data_criacao`, `empresas_id`, `usuarios_id`) VALUES
(NULL, '2023-08-19 14:40:00', '1', '1'),
(NULL, '2023-08-19 14:40:00', '2', '1'),
(NULL, '2023-08-19 14:40:00', '3', '1'),
(NULL, '2023-08-19 14:40:00', '4', '1'),
(NULL, '2023-08-19 14:40:00', '5', '1'),
(NULL, '2023-08-19 14:40:00', '6', '1'),
(NULL, '2023-08-19 14:40:00', '7', '1'),
(NULL, '2023-08-19 14:40:00', '8', '1'),
(NULL, '2023-08-19 14:43:00', '1', '2'),
(NULL, '2023-08-19 14:43:00', '2', '2'),
(NULL, '2023-08-19 14:43:00', '3', '2'),
(NULL, '2023-08-19 14:40:00', '4', '2'),
(NULL, '2023-08-19 14:40:00', '5', '2'),
(NULL, '2023-08-19 14:40:00', '6', '2'),
(NULL, '2023-08-19 14:40:00', '7', '2'),
(NULL, '2023-08-19 14:40:00', '8', '2'),
(NULL, '2023-08-19 14:40:00', '1', '3');