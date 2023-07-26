<?php

//Puxando Elementos inicias da classe
include_once "../../complements/inicio_classe.php";

//Recebendo os campos do formulário
$lembrete_cor = $_POST['lembrete_cor'];
$lembrete_data_prazo = $_POST['lembrete_data_prazo'];
$lembrete_data_prazo = Date($lembrete_data_prazo." H:i:s");
$lembrete_anotacao = $_POST['lembrete_anotacao'];
$lembrete_usuario_id = $_SESSION["id_usuario_login"]['id'];
$status = "Ativo";

//Recebendo a data Atual
$data_criacao = date('Y-m-d H:i:s');

//Texto da Interação do chamado e 'ADDSLASHER' para nao conflitar as aspas com o banco
$lembrete_anotacao = addslashes($lembrete_anotacao);

//Inserir Lembrete
$inserir_lembrete = "insert into lembretes(id, anotacao, cor, data_desativada, status, data_criacao, usuarios_id) values (NULL, '".$lembrete_anotacao."', '".$lembrete_cor."', '".$lembrete_data_prazo."', '".$status."', '".$data_criacao."', ".$lembrete_usuario_id.");";
$enviar_lembrete = mysqli_query($conn, $inserir_lembrete);

//Mensagem de Sucesso ou Falha na operação
if($enviar_lembrete == 1){
    $_SESSION['mensagem'] = "Lembrete cadastrado com sucesso!";
}else{
    $_SESSION['mensagem'] = "Erro ao cadastrar o Lembrete!";
}

header('location:../../painel/inserir.php');

?>
