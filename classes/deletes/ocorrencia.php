<?php

//Puxando Elementos inicias da classe
include_once "../../complements/inicio_classe.php";

//Recebendo os campos do formulário
$ocorrencia_id = $_POST['ocorrencia_id'];

//Recebendo a data Atual
$data_criacao = date('Y-m-d H:i:s');

//Excluir Arquivos da Ocorrencia
$excluir_arquivo_ocorrencia = "DELETE FROM arquivos_ocorrencias WHERE ocorrencias_id = ".$ocorrencia_id.";";
$enviar_exclusao_arquivo_ocorrencia = mysqli_query($conn, $excluir_arquivo_ocorrencia);

//Excluir Ocorrencia
$excluir_ocorrencia = "DELETE FROM ocorrencias WHERE id = ".$ocorrencia_id.";";
$enviar_exclusao_ocorrencia = mysqli_query($conn, $excluir_ocorrencia);

//Loop para identificar se deu de Sucesso ou Falha na operação, e emitir mensagem nas notificacoes
if($enviar_exclusao_ocorrencia == 1){

    //Inserir LOG para gerar a Notificação
    $criar_log = "insert into `logs` (`id`, `tabela_alterada`, `tarefa_executada`, `cor`, `icone`, `status`, `data_criacao`, `usuarios_id`) VALUES
    (NULL, 'ocorrencias', 'O determinado registro de um ocorrencia foi excluido com sucesso!', 'warning', 'fa fa-info-circle faa-shake', 'ativo', '".$data_criacao."', ".$_SESSION["id_usuario_login"]['id'].");";
    $enviar_log = mysqli_query($conn, $criar_log);
}else{

    //Inserir LOG para gerar a Notificação
    $criar_log = "insert into `logs` (`id`, `tabela_alterada`, `tarefa_executada`, `cor`, `icone`, `status`, `data_criacao`, `usuarios_id`) VALUES
    (NULL, 'ocorrencias', 'Falha ao tentar excluir o determinado registro de uma ocorrencia.', 'danger', 'fa fa-exclamation-triangle faa-flash', 'ativo', '".$data_criacao."', ".$_SESSION["id_usuario_login"]['id'].");";
    $enviar_log = mysqli_query($conn, $criar_log);
}

header("location:../../painel/ocorrencias.php");
?>