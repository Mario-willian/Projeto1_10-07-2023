<?php

//Puxando Elementos inicias da classe
include_once "../../complements/inicio_classe.php";

//Recebendo os campos do formulário
$ocorrencia_data = $dados['ocorrencia_data'];
$ocorrencia_data = Date($ocorrencia_data." H:i:s");
$ocorrencia_loja = $dados['ocorrencia_loja'];
$ocorrencia_funcionarios = $dados['ocorrencia_funcionarios'];
$ocorrencia_motivo = $dados['ocorrencia_motivo'];
$ocorrencia_quantidade_faltas = $dados['ocorrencia_quantidade_faltas'];
$ocorrencia_valor = $dados['ocorrencia_valor'];
$ocorrencia_observacao = $dados['ocorrencia_observacao'];

//'ADDSLASHER' para nao conflitar as aspas com o banco
$ocorrencia_observacao = addslashes($ocorrencia_observacao);


if (isset($_FILES['ocorrencia_arquivo']) && !empty($_FILES['ocorrencia_arquivo'])) {
    //Armazenar os arquivos enviados
    include_once 'special/upload.php';
}else{
    //Recebe Vazio
    $arquivo = "";
    $nomes_arquivo = "";
}

//Recebendo a data Atual
$data_criacao = date('Y-m-d H:i:s');


//Inserir Lembrete
$inserir_ocorrencia = "insert into ocorrencias(id, arquivo, motivo, faltas, valor, observacao, status, data_criacao, funcionarios_id, empresas_id) values (NULL, '".$nomes_arquivo."', '".$ocorrencia_motivo."', '".$ocorrencia_quantidade_faltas."', '".$ocorrencia_valor."', '".$ocorrencia_observacao."', 'Ativo', '".$data_criacao."', '".$ocorrencia_funcionarios."', ".$ocorrencia_loja.");";
$enviar_ocorrencia = mysqli_query($conn, $inserir_ocorrencia);

//Mensagem de Sucesso ou Falha na operação
if($enviar_ocorrencia == 1){
    // Criar o array com status e a mensagem de sucesso
    $retorna = ['status' => true, 'msg' => "Ocorrencia Cadastrado com Sucesso!"];

    //Inserir LOG para gerar a Notificação
    $criar_log = "insert into `logs` (`id`, `tabela_alterada`, `tarefa_executada`, `cor`, `icone`, `status`, `data_criacao`, `usuarios_id`) VALUES
    (NULL, 'ocorrencias', 'A ocorrencia foi cadastrado com sucesso!', 'success', 'far fa-check-circle faa-tada', 'ativo', '".$data_criacao."', ".$_SESSION["id_usuario_login"]['id'].");";
    $enviar_log = mysqli_query($conn, $criar_log);
}else{
    // Criar o array com status e a mensagem de erro
    $retorna = ['status' => false, 'msg' => "Erro ao Cadastrar a Ocorrencia!"];

    //Inserir LOG para gerar a Notificação
    $criar_log = "insert into `logs` (`id`, `tabela_alterada`, `tarefa_executada`, `cor`, `icone`, `status`, `data_criacao`, `usuarios_id`) VALUES
    (NULL, 'ocorrencias', 'Falha ao tentar cadastrar a ocorrencia.', 'danger', 'fa fa-exclamation-triangle faa-flash', 'ativo', '".$data_criacao."', ".$_SESSION["id_usuario_login"]['id'].");";
    $enviar_log = mysqli_query($conn, $criar_log);
}

// Converter o array em objeto e retornar para o JavaScript
echo json_encode($retorna);

?>