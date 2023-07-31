<?php

//Puxando Elementos inicias da classe
include_once "../../complements/inicio_classe.php";

//Recebendo os campos do formulário
$ferias_loja = $dados['ferias_loja'];
$ferias_funcionario = $dados['ferias_funcionario'];
$ferias_data_inicio = $dados['ferias_data_inicio']; $ferias_data_inicio = Date($ferias_data_inicio);
$ferias_data_final = $dados['ferias_data_final']; $ferias_data_final = Date($ferias_data_final);
$ferias_observacao = "";
$ferias_observacao = $dados['ferias_observacao'];
$ferias_acao = $dados['ferias_acao'];

//ADDSLASHER' para nao conflitar as aspas com o banco
$ferias_observacao = addslashes($ferias_observacao);

//Verificando se está editando ou atualizando
if($ferias_acao == "Editar"){
    //Condição para Atualizar
    //Recebendo ID das Ferias
    $ferias_id = $dados['ferias_id'];
    
    //Inserir Ferias
    $atualizar_ferias = "UPDATE ferias SET data_inicio = '".$ferias_data_inicio."', data_fim = '".$ferias_data_final."', observacao = '".$ferias_observacao."', funcionarios_id = ".$ferias_funcionario.", empresas_id = ".$ferias_loja." WHERE id = ".$ferias_id."";
    $enviar_ferias = mysqli_query($conn, $atualizar_ferias);

    //Mensagem de Sucesso ou Falha na operação
    if($enviar_ferias == 1){
        // Criar o array com status e a mensagem de sucesso
        $retorna = ['status' => true, 'msg' => "Ferias Atualizada com Sucesso!"];
    }else{
        // Criar o array com status e a mensagem de erro
        $retorna = ['status' => false, 'msg' => "Erro ao Atualizar as Férias!"];
    }
    
}else{
    //Codição para inserir
    //Recebendo a data Atual
    $data_criacao = date('Y-m-d H:i:s');

    //Inserir Ferias
    $inserir_ferias = "insert into ferias(id, data_inicio, data_fim, observacao, data_criacao, funcionarios_id, empresas_id) values (NULL, '".$ferias_data_inicio."', '".$ferias_data_final."', '".$ferias_observacao."', '".$data_criacao."', '".$ferias_funcionario."', '".$ferias_loja."');";
    $enviar_ferias = mysqli_query($conn, $inserir_ferias);

    //Mensagem de Sucesso ou Falha na operação
    if($enviar_ferias == 1){
        // Criar o array com status e a mensagem de sucesso
        $retorna = ['status' => true, 'msg' => "Ferias Cadastrada com Sucesso!"];
    }else{
        // Criar o array com status e a mensagem de erro
        $retorna = ['status' => false, 'msg' => "Erro ao cadastrar as Férias!"];
    }
}

// Converter o array em objeto e retornar para o JavaScript
echo json_encode($retorna);

?>