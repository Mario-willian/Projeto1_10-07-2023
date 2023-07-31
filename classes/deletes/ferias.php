<?php

//Puxando Elementos inicias da classe
include_once "../../complements/inicio_classe.php";

//Recebendo os campos do formulário
$ferias_id = $dados['ferias_id'];

//Excluir Funcionário
$excluir_ferias = "DELETE FROM ferias WHERE id = ".$ferias_id.";";
$enviar_exclusao_ferias = mysqli_query($conn, $excluir_ferias);

//Mensagem de Sucesso ou Falha na operação
if($enviar_exclusao_ferias == 1){
    // Criar o array com status e a mensagem de sucesso
    $retorna = ['status' => true, 'msg' => "Funcionário Cadastrado com Sucesso!"];
}else{
    // Criar o array com status e a mensagem de erro
    $retorna = ['status' => false, 'msg' => "Erro ao Cadastrar o(a) Funcionário(a)!"];
}

// Converter o array em objeto e retornar para o JavaScript
echo json_encode($retorna);

?>