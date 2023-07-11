<?php
header("Content-Type:Text/html; charset=utf8");
session_start();

//Evitar Bugs
//Verificando se está logado
if (!empty($_SESSION['usuario'])) {
	//Verificando se é Vendedor/Comprador/ADM
	if (!empty($_SESSION['usuario']->conta)) {
		header("location:vender.php");
	}else if(!empty($_SESSION['usuario']->login)){
		header("location:../login_adm/index.php");
	}
}
else{
  header("location:../index.php");
}

//Puxando CPF do usuário
$cpf_user = $_SESSION['usuario']->cpf;

//Puxando variável de conexão
require_once '../inc/conexao.php';

//Quantidade de notificacão
	$result_notificacoes = "SELECT count(ativa) FROM notificacao where cliente_cpf = '$cpf_user' and ativa = 1;";
    $resultado_notificacoes = mysqli_query($conn, $result_notificacoes);
    $row_notificacoes = mysqli_fetch_assoc($resultado_notificacoes);