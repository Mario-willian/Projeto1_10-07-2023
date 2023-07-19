<?php

//Puxando Info do Usuário
//include_once "../complements/inicio_php.php";

//CORRETO USAR O INCLUIDE DE CIMA
//Puxando variável de conexão
include_once '../conexao_bd.php';
//Startando Sessão
session_start();

//Recebendo os campos do formulário
$ferias_loja = $_POST['ferias_loja'];
$ferias_funcionario = $_POST['ferias_funcionario'];
$ferias_data_inicio = $_POST['ferias_data_inicio']; $ferias_data_inicio = Date($ferias_data_inicio);
$ferias_quantidade_dias = $_POST['ferias_quantidade_dias'];
$ferias_quantidade_dias = "'".$ferias_quantidade_dias." days'";
$ferias_observacao = "";
$ferias_observacao = $_POST['ferias_observacao'];

//Recebendo a data Atual
$data_criacao = date('Y-m-d');
//Recebendo data atual + tempo de ferias e Converter a variavel para o formato Unix timestamp
$ferias_data_fim = strtotime($ferias_data_inicio, strtotime($ferias_quantidade_dias));
// Voltando a data para o padrão correto
$ferias_data_fim = date("Y-m-d", $ferias_data_fim);

//ADDSLASHER' para nao conflitar as aspas com o banco
$ferias_observacao = addslashes($ferias_observacao);

//Inserir Ferias
$inserir_ferias = "insert into ferias(id, data_inicio, data_fim, observacao, data_criacao, funcionarios_id, empresas_id) values (NULL, '".$ferias_data_inicio."', '".$ferias_data_fim."', '".$ferias_observacao."', '".$data_criacao."', '".$ferias_funcionario."', '".$ferias_loja."');";
$enviar_ferias = mysqli_query($conn, $inserir_ferias);

header('location:../../painel/inserir.php');

?>