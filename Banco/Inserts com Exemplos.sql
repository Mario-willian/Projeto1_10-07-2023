USE `supermercados_paranaiba`;

create view acessos_empresas as SELECT empr.id as id, empr.cnpj as cnpj, empr.nome_loja as nome_loja, empr.razao_social as razao_social, empr.status as status, empr.data_criacao as data_criacao, aces.usuarios_id as usuarios_id
FROM empresas empr 
inner join acessos aces on empr.id = aces.empresas_id;

create view acessos_ocorrencias as SELECT ocor.id as id, arqu.arquivo as arquivo, ocor.motivo as motivo, ocor.faltas as faltas, ocor.valor as valor, ocor.observacao as observacao, ocor.status as status, ocor.data_criacao as data_criacao, ocor.funcionarios_id as funcionarios_id, func.nome_completo as funcionario_nome_completo, ocor.empresas_id as empresas_id, empr.nome_loja as empresa_nome_loja, empr.razao_social as empresa_razao_social, aces.usuarios_id as usuarios_id
FROM ocorrencias ocor 
inner join acessos aces on ocor.empresas_id = aces.empresas_id
inner join funcionarios func on ocor.funcionarios_id = func.id
inner join empresas empr on ocor.empresas_id = empr.id
inner join arquivos_ocorrencias arqu on arqu.ocorrencias_id = ocor.id;

create view acessos_ferias as SELECT feri.id as id, feri.data_inicio as data_inicio, feri.data_fim as data_fim, feri.observacao as observacao, feri.data_criacao as data_criacao, feri.funcionarios_id as funcionarios_id, func.nome_completo as funcionario_nome_completo, feri.empresas_id as empresas_id, empr.nome_loja as empresa_nome_loja, empr.razao_social as empresa_razao_social, aces.usuarios_id as usuarios_id
FROM ferias feri 
inner join acessos aces on feri.empresas_id = aces.empresas_id
inner join funcionarios func on feri.funcionarios_id = func.id
inner join empresas empr on feri.empresas_id = empr.id;

create view acessos_recisoes as SELECT resi.id as id, resi.motivo as motivo, resi.data_criacao as data_criacao, resi.tipo as tipo, resi.exame_demissional as exame_demissional, resi.data_inicio_aviso as data_inicio_aviso, resi.data_fim_aviso as data_fim_aviso, resi.data_prazo_pagamento as data_prazo_pagamento, resi.status as status, resi.observacao as observacao, resi.funcionarios_id as funcionarios_id, func.nome_completo as funcionario_nome_completo, resi.empresas_id as empresas_id, empr.nome_loja as empresa_nome_loja, empr.razao_social as empresa_razao_social, aces.usuarios_id as usuarios_id
FROM recisoes resi 
inner join acessos aces on resi.empresas_id = aces.empresas_id
inner join funcionarios func on resi.funcionarios_id = func.id
inner join empresas empr on resi.empresas_id = empr.id;

create view acessos_usuarios as SELECT usua.id as id_usuario, usua.nome_completo as nome_completo, empr.nome_loja as nome_loja, empr.razao_social as razao_social
FROM usuarios usua 
inner join acessos aces on usua.id = aces.usuarios_id
inner join empresas empr on aces.empresas_id = empr.id;

create view acessos_funcionarios as SELECT func.id as id_funcionarios, func.nome_completo as nome_completo, func.cpf as cpf, func.data_nascimento as data_nascimento, func.status as status, empr.id as empresas_id, empr.nome_loja as nome_loja, empr.razao_social as razao_social, func.setor as setor, func.funcao as funcao, func.data_inicio as data_inicio, vale.id as id_vale_transporte, vale.tipo as tipo_vale_transporte, vale.valor as valor_vale_transporte, func.salario as salario, func.nome_mae as nome_mae, func.observacao as observacao
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

insert into funcionarios(id, cpf, nome_completo, data_nascimento, salario, nome_mae, setor, funcao, observacao, status, data_inicio, data_criacao, empresas_id) values 
(NULL, '123.456.789-00', 'Funcionario Teste 1', '2023-07-19', '3000.30', 'Mae Teste', 'Hortifruti', 'Motorista', '', 'Ativo', '2023-07-20', '2023-07-19 01:08:48', '1'),
(NULL, '987.654.321-00', 'Funcionario Teste 2', '2001-11-01', '3000.30', 'Mae Teste2', 'Açougue', 'Conferente', '', 'Inativo', '2023-08-10', '2023-07-19 02:30:00', '2'),
(NULL, '123.123.852-10', 'Funcionario Teste 3', '1984-07-30', '3000.30', 'Mae Teste3', 'Padaria', 'Conferente', 'CLT', 'Afastado', '2023-07-24', '2023-07-24 10:08:48', '2'),
(NULL, '123.456.789-00', 'Funcionario Teste 4', '2023-07-19', '3000.30', 'Mae Teste', 'Padaria', 'Operador de Loja', '', 'Ativo', '2023-07-20', '2023-07-19 01:08:48', '3'),
(NULL, '987.654.321-00', 'Funcionario Teste 5', '2001-11-01', '3000.30', 'Mae Teste2', 'Caixa', 'Operador de Loja', '', 'Ativo', '2023-08-10', '2023-07-19 02:30:00', '1');

INSERT INTO `ocorrencias` (`id`, `motivo`, `faltas`, `valor`, `observacao`, `status`, `data_criacao`, `funcionarios_id`, `empresas_id`) VALUES 
(NULL, 'Atestado', 10, '150.00', 'Teste1', 'Ativo', '2023-07-24 01:22:37.000000', '1', '1'), 
(NULL, 'Meta', 1, '562.00', 'teste2', 'Ativo', '2023-07-25 01:22:37.000000', '1', '1'),
(NULL, 'Feriado', 1, '0.00', 'teste3', 'Ativo', '2023-07-26 01:22:37.000000', '1', '1'),
(NULL, 'Meta', 3, '10.00', 'teste4', 'Ativo', '2023-07-27 01:22:37.000000', '4', '3'),
(NULL, 'Feriado', 4, '5.00', 'teste5', 'Ativo', '2023-07-28 01:22:37.000000', '5', '1');

INSERT INTO `arquivos_ocorrencias` (`id`, `arquivo`, `data_criacao`, `ocorrencias_id`) VALUES 
(NULL, 'teste1.png', '2023-07-25 01:22:37.000000', '1'), 
(NULL, 'teste1.png', '2023-07-25 01:22:37.000000', '2'),
(NULL, 'teste1.png', '2023-07-25 01:22:37.000000', '3'),
(NULL, 'teste1.png', '2023-07-25 01:22:37.000000', '4'),
(NULL, 'teste1.png', '2023-07-25 01:22:37.000000', '5');

INSERT INTO `ferias` (`id`, `data_inicio`, `data_fim`, `observacao`, `data_criacao`, `funcionarios_id`, `empresas_id`) VALUES
(NULL, '2023-07-25', '2023-07-31', 'teste1', '2023-07-25 02:06:52.000000', '1', '1'),
(NULL, '2023-06-25', '2023-06-29', 'teste2', '2023-07-25 02:06:52.000000', '2', '2'),
(NULL, '2023-04-25', '2023-05-31', 'teste3', '2023-07-25 02:06:52.000000', '3', '2'),
(NULL, '2020-03-25', '2020-04-20', 'teste4', '2023-07-25 02:06:52.000000', '5', '1');

insert into recisoes(id, exame_demissional, tipo, data_inicio_aviso, data_fim_aviso, data_prazo_pagamento, motivo, observacao, status, data_criacao, funcionarios_id, empresas_id) values 
(NULL, 'Sim', 'Normal', '2023-07-25', '2023-08-04', '2023-08-04', 'Término de Contrato', 'teste1', 'Pago','2023-07-24 23:22:27', '1', '1'),
(NULL, 'Sim', 'Acordo', '2023-06-25', '2023-08-04', '2023-08-04', 'Término de Contrato', 'teste2', 'Pago','2023-07-24 23:22:27', '2', '2'),
(NULL, 'Não', 'Justiça', '2023-05-25', '2023-05-26', '2023-05-26', 'Aviso', 'teste3', 'Pendente','2023-07-24 23:22:27', '3', '2'),
(NULL, 'Não', 'Normal', '2023-07-20', '2023-08-01', '2023-08-01', 'Aviso', 'teste4', 'Pendente','2023-07-24 23:22:27', '5', '1');

INSERT INTO `vale_transportes` (`id`, `tipo`, `valor`, `data_criacao`, `funcionarios_id`) VALUES
(NULL, 'Otimo', '400.00', '2023-07-25 02:06:52.000000', '1'),
(NULL, 'Otimo', '130.00', '2023-07-25 02:06:52.000000', '2'),
(NULL, 'BHBUS', '800.75', '2023-07-25 02:06:52.000000', '3'),
(NULL, 'BHBUS', '800.75', '2023-07-25 02:06:52.000000', '4'),
(NULL, 'Otimo', '120.33', '2023-07-25 02:06:52.000000', '5');