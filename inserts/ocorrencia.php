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

//'ADDSLASHER' para nao conflitar as aspas com o banco
$ocorrencia_observacao = addslashes($ocorrencia_observacao);

//Inserir Lembrete
$inserir_ocorrencia = "insert into ocorrencias(id, arquivo, motivo, faltas, valor, observacao, status, data_criacao, funcionarios_id, empresas_id) values (NULL, '".$nomes_arquivo."', '".$ocorrencia_motivo."', '".$ocorrencia_quantidade_faltas."', '".$ocorrencia_valor."', '".$ocorrencia_observacao."', 'Ativo', '".$data_criacao."', '".$ocorrencia_funcionarios."', ".$ocorrencia_loja.");";
$enviar_ocorrencia = mysqli_query($conn, $inserir_ocorrencia);

//Mensagem de Sucesso ou Falha na operação
if($enviar_ocorrencia == 1){
    // Criar o array com status e a mensagem de sucesso
    $retorna = ['status' => true, 'msg' => "Ocorrencia Cadastrado com Sucesso!"];
}else{
    // Criar o array com status e a mensagem de erro
    $retorna = ['status' => false, 'msg' => "Erro ao Cadastrar a Ocorrencia!"];
}

// Converter o array em objeto e retornar para o JavaScript
echo json_encode($retorna);

?>