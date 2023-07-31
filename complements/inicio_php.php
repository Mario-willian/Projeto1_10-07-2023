<?php
//Startando Sessão
session_start();
//Padronização de Horario e linguagem
date_default_timezone_set('America/Sao_Paulo');
header("Content-type: text/html; charset=utf-8");


//Evitar Bugs
//Verificando se está logado
if (!isset($_SESSION["id_usuario_login"])) {
	header("location:../");
}else{
    

//Puxando variável de conexão
include_once '../classes/conexao_bd.php';

//Select para quantidade de Notificações
$pesquisa_notificacao = "SELECT count(id) FROM logs where usuarios_id =".$_SESSION["id_usuario_login"]['id']." AND status = 'Ativo' ORDER BY data_criacao DESC LIMIT 30;";
$resultado_notificacao = mysqli_query($conn, $pesquisa_notificacao);
$row_notificacao = mysqli_fetch_assoc($resultado_notificacao);

}