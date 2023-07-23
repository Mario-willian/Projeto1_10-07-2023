<?php

//Puxando Elementos inicias da classe
include_once "../../complements/inicio_classe.php";

//Recebendo os campos do formulário
$lembrete_cor = $_POST['lembrete_cor'];
$lembrete_data_prazo = $_POST['lembrete_data_prazo'];
$lembrete_data_prazo = Date($lembrete_data_prazo." H:i:s");
$lembrete_anotacao = "";
$lembrete_anotacao = $_POST['lembrete_anotacao'];
$lembrete_usuario_id = $_SESSION["id_usuario_login"]['id'];

//Recebendo a data Atual
$data_criacao = date('Y-m-d H:i:s');

//Texto da Interação do chamado e 'ADDSLASHER' para nao conflitar as aspas com o banco
$lembrete_anotacao = addslashes($lembrete_anotacao);

//Inserir Lembrete
$inserir_lembrete = "insert into lembretes(id, anotacao, data_desativada, status, data_criacao, usuarios_id) values (NULL, '".$lembrete_anotacao."', '".$lembrete_data_prazo."', 'Ativo', '".$data_criacao."', ".$lembrete_usuario_id.");";
$enviar_lembrete = mysqli_query($conn, $inserir_lembrete);

header('location:../../painel/inserir.php');

?>
