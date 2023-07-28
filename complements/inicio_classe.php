<?php
//Startando Sessão
session_start();
//Padronização de Horario e linguagem
date_default_timezone_set('America/Sao_Paulo');
header("Content-type: text/html; charset=utf-8");

//Evitar Bugs
//Verificando se está logado
if (!isset($_SESSION["id_usuario_login"])) {
	header("location:../../");
}

//Puxando variável de conexão
include_once '../conexao_bd.php';

//Recebendo na variavel os dados
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);