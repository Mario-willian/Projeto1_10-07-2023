<?php

//Puxando Elementos inicias da classe
include_once "../../complements/inicio_classe.php";

//Recebendo os campos do formulário
$funcionario_id = $dados['funcionario_id'];

//Excluir Funcionário
$excluir_funcionario = "DELETE FROM funcionarios WHERE id = ".$funcionario_id.";";
$enviar_exclusao_funcionario = mysqli_query($conn, $excluir_funcionario);

//Excluir Vales Transportes do funcionario excluido
$excluir_vale_transporte = "DELETE FROM vale_transportes WHERE funcionarios_id = ".$funcionario_id.";";
$enviar_exclusao_vale_transporte = mysqli_query($conn, $excluir_vale_transporte);

//Mensagem de Sucesso ou Falha na operação
if($enviar_exclusao_vale_transporte == 1){
    // Criar o array com status e a mensagem de sucesso
    $retorna = ['status' => true, 'msg' => "Funcionário Cadastrado com Sucesso!"];
}else{
    // Criar o array com status e a mensagem de erro
    $retorna = ['status' => false, 'msg' => "Erro ao Cadastrar o(a) Funcionário(a)!"];
}

// Converter o array em objeto e retornar para o JavaScript
echo json_encode($retorna);

?>