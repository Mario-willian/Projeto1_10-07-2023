<?php
header("Content-Type:Text/html; charset=utf8");
session_start();

//Evitar Bugs
//Verificando se está logado
if (!empty($_SESSION['usuario'])) {
	//Verificando se é Vendedor ou Comprador
	if (!empty($_SESSION['usuario']->conta)) {
		$funcao = "vendedor_cpf";
	}else if(!empty($_SESSION['usuario']->pagamento)){
		$funcao = "cliente_cpf";
	}else{
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
    //var_dump($conn);
	$result_notificacoes = "SELECT count(ativa) FROM notificacao where $funcao = '$cpf_user' and ativa = 1;";
    //var_dump($result_notificacoes);
    $resultado_notificacoes = mysqli_query($conn, $result_notificacoes);
    //var_dump($resultado_notificacoes);
    //die();
    $row_notificacoes = mysqli_fetch_assoc($resultado_notificacoes);
