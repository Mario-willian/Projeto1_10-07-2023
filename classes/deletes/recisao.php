<?php

//Puxando Elementos inicias da classe
include_once "../../complements/inicio_classe.php";

//Recebendo os campos do formulário
$recisao_id = $_POST['recisao_id'];

//Recebendo a data Atual
$data_criacao = date('Y-m-d H:i:s');

//Excluir Funcionário
$excluir_recisao = "DELETE FROM recisoes WHERE id = ".$recisao_id.";";
$enviar_exclusao_recisao = mysqli_query($conn, $excluir_recisao);

//Loop para identificar se deu de Sucesso ou Falha na operação, e emitir mensagem nas notificacoes
if($enviar_exclusao_recisao == 1){

    //Inserir LOG para gerar a Notificação
    $criar_log = "insert into `logs` (`id`, `tabela_alterada`, `tarefa_executada`, `cor`, `icone`, `status`, `data_criacao`, `usuarios_id`) VALUES
    (NULL, 'recisoes', 'O determinado registro de uma rescisao foi excluido com sucesso!', 'warning', 'fa fa-info-circle faa-shake', 'ativo', '".$data_criacao."', ".$_SESSION["id_usuario_login"]['id'].");";
    $enviar_log = mysqli_query($conn, $criar_log);
}else{

    //Inserir LOG para gerar a Notificação
    $criar_log = "insert into `logs` (`id`, `tabela_alterada`, `tarefa_executada`, `cor`, `icone`, `status`, `data_criacao`, `usuarios_id`) VALUES
    (NULL, 'recisoes', 'Falha ao tentar excluir o determinado registro de uma rescisao.', 'danger', 'fa fa-exclamation-triangle faa-flash', 'ativo', '".$data_criacao."', ".$_SESSION["id_usuario_login"]['id'].");";
    $enviar_log = mysqli_query($conn, $criar_log);
}

header("location:../../painel/rescisoes.php");
?>