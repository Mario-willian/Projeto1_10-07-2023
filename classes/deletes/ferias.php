<?php

//Puxando Elementos inicias da classe
include_once "../../complements/inicio_classe.php";

//Recebendo os campos do formulário
$ferias_id = $_POST['ferias_id'];

//Recebendo a data Atual
$data_criacao = date('Y-m-d H:i:s');

//Excluir Funcionário
$excluir_ferias = "DELETE FROM ferias WHERE id = ".$ferias_id.";";
$enviar_exclusao_ferias = mysqli_query($conn, $excluir_ferias);

//Loop para identificar se deu de Sucesso ou Falha na operação, e emitir mensagem nas notificacoes
if($enviar_exclusao_ferias == 1){

    //Inserir LOG para gerar a Notificação
    $criar_log = "insert into `logs` (`id`, `tabela_alterada`, `tarefa_executada`, `cor`, `icone`, `status`, `data_criacao`, `usuarios_id`) VALUES
    (NULL, 'ferias', 'O determinado registro férias foi excluido com sucesso!', 'warning', 'fa fa-info-circle faa-shake', 'ativo', '".$data_criacao."', ".$_SESSION["id_usuario_login"]['id'].");";
    $enviar_log = mysqli_query($conn, $criar_log);
}else{

    //Inserir LOG para gerar a Notificação
    $criar_log = "insert into `logs` (`id`, `tabela_alterada`, `tarefa_executada`, `cor`, `icone`, `status`, `data_criacao`, `usuarios_id`) VALUES
    (NULL, 'ferias', 'Falha ao tentar excluir o determinado registro férias.', 'danger', 'fa fa-exclamation-triangle faa-flash', 'ativo', '".$data_criacao."', ".$_SESSION["id_usuario_login"]['id'].");";
    $enviar_log = mysqli_query($conn, $criar_log);
}

header("location:../../painel/ferias.php");

?>