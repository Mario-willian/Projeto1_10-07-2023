<?php

//Puxando Elementos inicias da classe
include_once "../../complements/inicio_classe.php";

//Recebendo os campos do formulário
$empresa_cnpj = $dados['empresa_cnpj'];
$empresa_nome_loja = $dados['empresa_nome_loja'];
$empresa_razao_social = $dados['empresa_razao_social'];
$enviar_empresa = "";

//Recebendo Checkbox - Usuarios que terão acesso a empresa
$usuario_acessos = null;
if(isset($dados['usuario'])){
    $usuario_acessos = $dados['usuario'];
}

//Recebendo a data Atual
$data_criacao = date('Y-m-d H:i:s');

//Verificando se o usuário já existe
$pesquisa_empresa_existente = "SELECT cnpj FROM empresas WHERE cnpj = '".$empresa_cnpj."';";
$resultado_empresa_existente = mysqli_query($conn, $pesquisa_empresa_existente);
$row_empresa_existente = mysqli_fetch_assoc($resultado_empresa_existente);

if($row_empresa_existente !== NULL){

    // Caso existe, enviará mensagem de erro
    $retorna = ['status' => false, 'msg' => "Erro ao Cadastrar a Empresa! CNPJ Já Cadastrado"];

    // Converter o array em objeto e retornar para o JavaScript
    echo json_encode($retorna);
    exit;

}else{

    //Caso nao exista, seguirá o cadastro.
    //Inserir Empresa
    $inserir_empresa = "insert into empresas(id, cnpj, nome_loja, razao_social, status, data_criacao) values (NULL, '".$empresa_cnpj."', '".$empresa_nome_loja."', '".$empresa_razao_social."', 'Ativo', '".$data_criacao."');";
    $enviar_empresa = mysqli_query($conn, $inserir_empresa);

    //Pesquisar Empresa recem criado
    $pesquisa_empresa = "SELECT id FROM empresas WHERE CNPJ = '".$empresa_cnpj."' AND data_criacao = '".$data_criacao."' ORDER BY id DESC LIMIT 1;";
    $resultado_empresa = mysqli_query($conn, $pesquisa_empresa);
    $row_empresa = mysqli_fetch_assoc($resultado_empresa);

    //Select pra puxar o empresa recem criado para inserir o acesso dele
    $id_empresa_recem_criado = $row_empresa['id']; 

    //Loop para inserir acessos do usuário
    if($usuario_acessos !== null){
        for($i=0; $i < count($usuario_acessos); $i++){
            //Inserir Acesso
            $inserir_acesso = "insert into acessos(id, data_criacao, empresas_id, usuarios_id) values (NULL, '".$data_criacao."', '".$id_empresa_recem_criado."', '".$usuario_acessos[$i]."');";
            $enviar_acesso = mysqli_query($conn, $inserir_acesso);
        }
    }

}

    

//Mensagem de Sucesso ou Falha na operação
if($enviar_empresa == 1){
    // Criar o array com status e a mensagem de sucesso
    $retorna = ['status' => true, 'msg' => "Empresa Cadastrado com Sucesso!"];
}else{
    // Criar o array com status e a mensagem de erro
    $retorna = ['status' => false, 'msg' => "Erro ao Cadastrar a Empresa! Verifique os Dados Inseridos"];
}

// Converter o array em objeto e retornar para o JavaScript
echo json_encode($retorna);

?>