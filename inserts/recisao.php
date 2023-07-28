<?php

//Puxando Elementos inicias da classe
include_once "../../complements/inicio_classe.php";

//Recebendo os campos do formulário
$recisao_data = $dados['recisao_data']; $recisao_data = Date($recisao_data);
$recisao_loja = $dados['recisao_loja'];
$recisao_funcionario = $dados['recisao_funcionario'];
$recisao_motivo = $dados['recisao_motivo'];
$recisao_tipo = $dados['recisao_tipo'];
$recisao_exame_demissional = $dados['recisao_exame_demissional'];
$recisao_dias_de_aviso = $dados['recisao_dias_de_aviso'];
$recisao_status = $dados['recisao_status'];
$recisao_observacao = "";
$recisao_observacao = $dados['recisao_observacao'];

//Recebendo a data Atual
$data_criacao = date('Y-m-d H:i:s');

//Recebendo data de recisao + dias de aviso
$recisao_data_fim = date('Y-m-d', strtotime("+{$recisao_dias_de_aviso} days",strtotime($recisao_data)));

//'ADDSLASHER' para nao conflitar as aspas com o banco
$recisao_observacao = addslashes($recisao_observacao);

//Inserir Recisao
$inserir_recisao = "insert into recisoes(id, exame_demissional, tipo, data_inicio_aviso, data_fim_aviso, motivo, observacao, status, data_criacao, funcionarios_id, empresas_id) values (NULL, '".$recisao_exame_demissional."', '".$recisao_tipo."', '".$recisao_data."', '".$recisao_data_fim."', '".$recisao_motivo."', '".$recisao_observacao."', '".$recisao_status."','".$data_criacao."',  '".$recisao_funcionario."', '".$recisao_loja."');";
$enviar_recisao = mysqli_query($conn, $inserir_recisao);

//Mensagem de Sucesso ou Falha na operação
if($enviar_recisao == 1){
    // Criar o array com status e a mensagem de sucesso
    $retorna = ['status' => true, 'msg' => "Recisão Cadastrado com Sucesso!"];
}else{
    // Criar o array com status e a mensagem de erro
    $retorna = ['status' => false, 'msg' => "Erro ao Cadastrar a Recisão!"];
}

// Converter o array em objeto e retornar para o JavaScript
echo json_encode($retorna);

?>