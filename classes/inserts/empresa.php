<?php

//Puxando Elementos inicias da classe
include_once "../../complements/inicio_classe.php";

//Recebendo os campos do formulário
$empresa_cnpj = $dados['empresa_cnpj'];
$empresa_nome_loja = $dados['empresa_nome_loja'];
$empresa_razao_social = $dados['empresa_razao_social'];

//Recebendo a data Atual
$data_criacao = date('Y-m-d H:i:s');

//Inserir Ferias
$inserir_empresa = "insert into empresas(id, cnpj, nome_loja, razao_social, status, data_criacao) values (NULL, '".$empresa_cnpj."', '".$empresa_nome_loja."', '".$empresa_razao_social."', 'Ativo', '".$data_criacao."');";
$enviar_empresa = mysqli_query($conn, $inserir_empresa);

//Mensagem de Sucesso ou Falha na operação
if($enviar_empresa == 1){
    // Criar o array com status e a mensagem de sucesso
    $retorna = ['status' => true, 'msg' => "Empresa Cadastrado com Sucesso!"];
}else{
    // Criar o array com status e a mensagem de erro
    $retorna = ['status' => false, 'msg' => "Erro ao Cadastrar a Empresa!"];
}

// Converter o array em objeto e retornar para o JavaScript
echo json_encode($retorna);

?>