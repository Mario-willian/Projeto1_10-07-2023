<?php
header("Content-Type:Text/html; charset=utf8");
session_start();

//Evitar Bugs
//Verificando se está logado
if (!empty($_SESSION['usuario'])) {
	//Verificando se é Vendedor/Comprador/ADM
	if(!empty($_SESSION['usuario']->conta)){
		header("location:../login/vender.php");
	}else if (!empty($_SESSION['usuario']->pagamento)) {
		header("location:../login/loja_login.php");
	}
}
else{
  header("location:../index.php");
}

//Puxando CPF do usuário
$cpf_user = $_SESSION['usuario']->login;