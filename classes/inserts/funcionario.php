<?php

//Puxando Info do Usuário
//include_once "../complements/inicio_php.php";

//CORRETO USAR O INCLUIDE DE CIMA
//Puxando variável de conexão
include_once '../conexao_bd.php';
//Startando Sessão
session_start();

//Recebendo os campos do formulário
$funcionario_nome = $_POST['funcionario_nome'];
$funcionario_cpf = $_POST['funcionario_cpf'];
$funcionario_data_nascimento = $_POST['funcionario_data_nascimento']; $funcionario_data_nascimento = Date($funcionario_data_nascimento." H:i:s");
$funcionario_status = $_POST['funcionario_status'];
$funcionario_empresa = $_POST['funcionario_empresa'];
$funcionario_setor = $_POST['funcionario_setor'];
$funcionario_funcao = $_POST['funcionario_funcao'];
$funcionario_data_de_inicio = $_POST['funcionario_data_de_inicio'];
$funcionario_vale_transporte = $_POST['funcionario_vale_transporte'];
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

//Inserir Funcionário
$inserir_funcionario = "insert into funcionarios(id, cpf, nome_completo, data_nascimento, setor, funcao, salario, nome_pai, nome_mae, observacao, status, data_criacao, empresas_id) values (NULL, '".$funcionario_cpf."', '".$funcionario_nome."', '".$funcionario_data_nascimento."', '".$funcionario_setor."', '".$funcionario_funcao."', '".$funcionario_salario."', '".$funcionario_nome_pai."', '".$funcionario_nome_mae."', '".$funcionario_observacao."' '".$funcionario_status."', '".$data_criacao."', '".$funcionario_empresa."');";
$enviar_funcionario = mysqli_query($conn, $inserir_funcionario);

//Inserir vale transporte

echo $inserir_funcionario;
exit;

header('location:../../painel/inserir.php');

?>