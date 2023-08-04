<?php

//Puxando Elementos inicias da classe
include_once "../../complements/inicio_classe.php";

//Recebendo os campos do formulário
$lembrete_cor = $dados['lembrete_cor'];
$lembrete_data_prazo = $dados['lembrete_data_prazo'];
$lembrete_data_prazo = Date($lembrete_data_prazo." H:i:s");
$lembrete_anotacao = $dados['lembrete_anotacao'];
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
    // Criar o array com status e a mensagem de sucesso
    $retorna = ['status' => true, 'msg' => "Lembrete Cadastrado com Sucesso!"];

    //Inserir LOG para gerar a Notificação
    $criar_log = "insert into `logs` (`id`, `tabela_alterada`, `tarefa_executada`, `cor`, `icone`, `status`, `data_criacao`, `usuarios_id`) VALUES
    (NULL, 'lembretes', 'O lembrete foi cadastrado com sucesso!', 'success', 'far fa-check-circle faa-tada', 'ativo', '".$data_criacao."', ".$_SESSION["id_usuario_login"]['id'].");";
    $enviar_log = mysqli_query($conn, $criar_log);
}else{
    // Criar o array com status e a mensagem de erro
    $retorna = ['status' => false, 'msg' => "Erro ao Cadastrar o Lembrete!"];

    //Inserir LOG para gerar a Notificação
    $criar_log = "insert into `logs` (`id`, `tabela_alterada`, `tarefa_executada`, `cor`, `icone`, `status`, `data_criacao`, `usuarios_id`) VALUES
    (NULL, 'lembretes', 'Falha ao tentar cadastrar o lembrete.', 'danger', 'fa fa-exclamation-triangle faa-flash', 'ativo', '".$data_criacao."', ".$_SESSION["id_usuario_login"]['id'].");";
    $enviar_log = mysqli_query($conn, $criar_log);
}

// Converter o array em objeto e retornar para o JavaScript
echo json_encode($retorna);
?>
