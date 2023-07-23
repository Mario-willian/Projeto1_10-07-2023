<?php

//Puxando Elementos inicias da classe
include_once "../../complements/inicio_classe.php";

//Recebendo os campos do formulário
$funcionario_nome = $_POST['funcionario_nome'];
$funcionario_cpf = $_POST['funcionario_cpf'];
$funcionario_data_nascimento = $_POST['funcionario_data_nascimento']; $funcionario_data_nascimento = Date($funcionario_data_nascimento);
$funcionario_status = $_POST['funcionario_status'];
$funcionario_empresa = $_POST['funcionario_empresa'];
$funcionario_setor = $_POST['funcionario_setor'];
$funcionario_funcao = $_POST['funcionario_funcao'];
$funcionario_data_de_inicio = $_POST['funcionario_data_de_inicio'];
$funcionario_vale_transporte = $_POST['funcionario_vale_transporte'];
$funcionario_valor_vale_transporte = "";
$funcionario_valor_vale_transporte = $_POST['funcionario_valor_vale_transporte'];
$funcionario_salario = $_POST['funcionario_salario'];
$funcionario_nome_pai = "";
$funcionario_nome_pai = $_POST['funcionario_nome_pai'];
$funcionario_nome_mae = $_POST['funcionario_nome_mae'];
$funcionario_observacao = "";
$funcionario_observacao = $_POST['funcionario_observacao'];

//Recebendo a data Atual
$data_criacao = date('Y-m-d H:i:s');

//'ADDSLASHER' para nao conflitar as aspas com o banco
$funcionario_observacao = addslashes($funcionario_observacao);

//Convertendo Valores no padrão do Banco de dados
$format = numfmt_create('pt_BR', NumberFormatter::DECIMAL);
$funcionario_valor_vale_transporte = numfmt_parse($format, $funcionario_valor_vale_transporte);
$funcionario_salario = numfmt_parse($format, $funcionario_salario);

//Inserir Funcionário
$inserir_funcionario = "insert into funcionarios(id, cpf, nome_completo, data_nascimento, salario, nome_pai, nome_mae, observacao, status, data_criacao, empresas_id) values (NULL, '".$funcionario_cpf."', '".$funcionario_nome."', '".$funcionario_data_nascimento."', '".$funcionario_salario."', '".$funcionario_nome_pai."', '".$funcionario_nome_mae."', '".$funcionario_observacao."', '".$funcionario_status."', '".$data_criacao."', '".$funcionario_empresa."');";
$enviar_funcionario = mysqli_query($conn, $inserir_funcionario);

//Pesquisar Funcionário recem criado
$pesquisa_funcionario = "SELECT id FROM funcionarios WHERE cpf = '".$funcionario_cpf."' AND data_criacao = '".$data_criacao."' ORDER BY id DESC LIMIT 1;";
$resultado_funcionario = mysqli_query($conn, $pesquisa_funcionario);
$row_funcionario = mysqli_fetch_assoc($resultado_funcionario);

//ID do Funcionário recem criado
$funcionario_id = $row_funcionario['id'];

//Inserir Setores
$inserir_setores = "insert into setores(id, setor, funcao, data_criacao, funcionarios_id) values (NULL, '".$funcionario_setor."', '".$funcionario_funcao."', '".$data_criacao."', '".$funcionario_id."');";
$enviar_setores = mysqli_query($conn, $inserir_setores);

//Inserir vale transporte
$inserir_vale_transporte = "insert into vale_transportes(id, tipo, valor, data_criacao, funcionarios_id) values (NULL, '".$funcionario_vale_transporte."', '".$funcionario_valor_vale_transporte."', '".$data_criacao."', '".$funcionario_id."');";
$enviar_vale_transporte = mysqli_query($conn, $inserir_vale_transporte);

header('location:../../painel/inserir.php');

?>