<?php

//Puxando Info do Usuário
//include_once "../complements/inicio_php.php";

//CORRETO USAR O INCLUIDE DE CIMA
//Puxando variável de conexão
include_once '../conexao_bd.php';
//Startando Sessão
session_start();

//Recebendo os campos do formulário
$lembrete_cor = $_POST['lembrete_cor'];
$lembrete_data_prazo = $_POST['lembrete_data_prazo'];
$lembrete_data_prazo = Date($lembrete_data_prazo." H:i:s");
$lembrete_anotacao = $_POST['lembrete_anotacao'];
$lembrete_usuario_id = $_SESSION["id_usuario_login"]['id'];

//Recebendo a data Atual
$lembrete_data_atual = date('Y-m-d H:i:s');

//Texto da Interação do chamado e 'ADDSLASHER' para nao conflitar as aspas com o banco
$lembrete_anotacao = addslashes($lembrete_anotacao);

//Inserir Lembrete
$inserir_lembrete = "insert into lembretes(id, anotacao, data_inserida, data_desativada, status, usuarios_id) values (NULL, '".$lembrete_anotacao."', '".$lembrete_data_atual."', '".$lembrete_data_prazo."', 'Ativo', ".$lembrete_usuario_id.");";
$enviar_lembrete = mysqli_query($conn, $inserir_lembrete);

header('location:../../painel/inserir.php');

?>