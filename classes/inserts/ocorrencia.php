<?php

//Puxando Elementos inicias da classe
include_once "../../complements/inicio_classe.php";

//Recebendo os campos do formulário
$ocorrencia_data = $dados['ocorrencia_data'];
$ocorrencia_data = Date($ocorrencia_data." H:i:s");
$ocorrencia_data_validacao = Date($ocorrencia_data);
$ocorrencia_loja = $dados['ocorrencia_loja'];
$ocorrencia_funcionarios = $dados['ocorrencia_funcionarios'];
$ocorrencia_motivo = $dados['ocorrencia_motivo'];
$ocorrencia_quantidade_faltas = $dados['ocorrencia_quantidade_faltas'];
$ocorrencia_valor = $dados['ocorrencia_valor'];
$ocorrencia_observacao = $dados['ocorrencia_observacao'];

//Recebendo a data Atual
$data_criacao = date('Y-m-d H:i:s');

//'ADDSLASHER' para nao conflitar as aspas com o banco
$ocorrencia_observacao = addslashes($ocorrencia_observacao);

//Pesquisar Ocorrencia já criada
$pesquisa_ocorrencia_existente = "SELECT id FROM ocorrencias WHERE DATE(data_criacao) = '".$ocorrencia_data_validacao."' AND funcionarios_id = ".$ocorrencia_funcionarios." AND empresas_id = ".$ocorrencia_loja." AND motivo = '".$ocorrencia_motivo."' ORDER BY id LIMIT 1;";
$resultado_ocorrencia_existente = mysqli_query($conn, $pesquisa_ocorrencia_existente);
$row_ocorrencia_existente = mysqli_fetch_assoc($resultado_ocorrencia_existente);

//Nao deixar editar caso já exista o CPF
if(!empty($row_ocorrencia_existente)){

    // Criar o array com status e a mensagem de erro
    $retorna = ['status' => false, 'msg' => "Erro ao Cadastrar a Ocorrência: Já existe um ocorrencia semelhante para esta data (funcionário, motivo e loja)!"];

    //Inserir LOG para gerar a Notificação
    $criar_log = "insert into `logs` (`id`, `tabela_alterada`, `tarefa_executada`, `cor`, `icone`, `status`, `data_criacao`, `usuarios_id`) VALUES
    (NULL, 'funcionarios', 'Falha ao tentar cadastrar o(a) funcionário(a), CPF já cadastrado.', 'danger', 'fa fa-exclamation-triangle faa-flash', 'ativo', '".$data_criacao."', ".$_SESSION["id_usuario_login"]['id'].");";
    $enviar_log = mysqli_query($conn, $criar_log);
}else{

//Inserir Ocorrencia
$inserir_ocorrencia = "insert into ocorrencias(id, motivo, faltas, valor, observacao, status, data_criacao, funcionarios_id, empresas_id) values (NULL, '".$ocorrencia_motivo."', '".$ocorrencia_quantidade_faltas."', '".$ocorrencia_valor."', '".$ocorrencia_observacao."', 'Ativo', '".$ocorrencia_data."', '".$ocorrencia_funcionarios."', ".$ocorrencia_loja.");";
$enviar_ocorrencia = mysqli_query($conn, $inserir_ocorrencia);

//Pesquisar ocorrencia recem criado
$pesquisa_ocorrencia = "SELECT id FROM ocorrencias WHERE motivo = '".$ocorrencia_motivo."' AND data_criacao = '".$ocorrencia_data."' ORDER BY id DESC LIMIT 1;";
$resultado_ocorrencia = mysqli_query($conn, $pesquisa_ocorrencia);
$row_ocorrencia = mysqli_fetch_assoc($resultado_ocorrencia);

//ID da ocorrencia recem criado
$ocorrencia_id = $row_ocorrencia['id'];

//Inserindo arquivo da ocorrencia
if ($_FILES['ocorrencia_arquivo']['error'][0] == 4){

    //Recebe Vazio
    $arquivo = "";
    $nomes_arquivo = "";
    //Inserir Arquivo vazio
    $inserir_arquivo= "insert into arquivos_ocorrencias (id, arquivo, data_criacao, ocorrencias_id) values (NULL, '', '".$data_criacao."', '".$ocorrencia_id."');";
    $enviar_arquivo = mysqli_query($conn, $inserir_arquivo);  
}else{

    //Armazenar os arquivos enviados
    include_once 'special/upload.php';
}

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

}

// Converter o array em objeto e retornar para o JavaScript
echo json_encode($retorna);

?>