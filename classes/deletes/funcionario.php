<?php

//Puxando Elementos inicias da classe
include_once "../../complements/inicio_classe.php";

//Recebendo os campos do formulário
$funcionario_id = $_POST['funcionario_id'];

//Recebendo a data Atual
$data_criacao = date('Y-m-d H:i:s');

//Excluir Funcionário
$excluir_funcionario = "DELETE FROM funcionarios WHERE id = ".$funcionario_id.";";
$enviar_exclusao_funcionario = mysqli_query($conn, $excluir_funcionario);

//Excluir Vales Transportes do funcionario excluido
$excluir_vale_transporte = "DELETE FROM vale_transportes WHERE funcionarios_id = ".$funcionario_id.";";
$enviar_exclusao_vale_transporte = mysqli_query($conn, $excluir_vale_transporte);

//Loop para identificar se deu de Sucesso ou Falha na operação, e emitir mensagem nas notificacoes
if($enviar_exclusao_vale_transporte == 1){

    //Inserir LOG para gerar a Notificação
    $criar_log = "insert into `logs` (`id`, `tabela_alterada`, `tarefa_executada`, `cor`, `icone`, `status`, `data_criacao`, `usuarios_id`) VALUES
    (NULL, 'funcionarios', 'O determinado registro de um funcionário foi excluido com sucesso!', 'warning', 'fa fa-info-circle faa-shake', 'ativo', '".$data_criacao."', ".$_SESSION["id_usuario_login"]['id'].");";
    $enviar_log = mysqli_query($conn, $criar_log);
}else{

    //Inserir LOG para gerar a Notificação
    $criar_log = "insert into `logs` (`id`, `tabela_alterada`, `tarefa_executada`, `cor`, `icone`, `status`, `data_criacao`, `usuarios_id`) VALUES
    (NULL, 'funcionarios', 'Falha ao tentar excluir o determinado registro de um funcionário.', 'danger', 'fa fa-exclamation-triangle faa-flash', 'ativo', '".$data_criacao."', ".$_SESSION["id_usuario_login"]['id'].");";
    $enviar_log = mysqli_query($conn, $criar_log);
}

header("location:../../painel/cadastros.php");
?>