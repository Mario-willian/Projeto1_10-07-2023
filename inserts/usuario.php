<?php

//Puxando Elementos inicias da classe
include_once "../../complements/inicio_classe.php";

//Recebendo os campos do formulário
$usuario_nome = $dados['usuario_nome'];
$usuario_email = $dados['usuario_email'];
$usuario_senha = $dados['usuario_senha'];
$enviar_usuario = "";

//Recebendo Checkbox - Empresas que o Usuário tem acesso
$usuario_acessos = null;
if(isset($dados['empresa'])){
    $usuario_acessos = $dados['empresa'];
}

//Recebendo a data Atual
$data_criacao = date('Y-m-d H:i:s');

//Verificando se o usuário já existe
$pesquisa_usuario_existente = "SELECT id FROM usuarios WHERE email = '".$usuario_email."';";
$resultado_usuario_existente = mysqli_query($conn, $pesquisa_usuario_existente);
$row_usuario_existente = mysqli_fetch_assoc($resultado_usuario_existente);

if($row_usuario_existente !== NULL){

    // Caso existe, enviará mensagem de erro
    $retorna = ['status' => false, 'msg' => "Erro ao Cadastrar o Usuário! E-mail Já Cadastrado"];

    // Converter o array em objeto e retornar para o JavaScript
    echo json_encode($retorna);
    exit;

}else{

    //Caso nao exista, seguirá o cadastro.
    //Inserir Usuario
    $inserir_usuario = "insert into usuarios(id, nome_completo, email, senha, status, data_criacao) values (NULL, '".$usuario_nome."', '".$usuario_email."', '".$usuario_senha."', 'Ativo', '".$data_criacao."');";
    $enviar_usuario = mysqli_query($conn, $inserir_usuario);

    //Pesquisar Funcionário recem criado
    $pesquisa_usuario = "SELECT id FROM usuarios WHERE email = '".$usuario_email."' AND data_criacao = '".$data_criacao."' ORDER BY id DESC LIMIT 1;";
    $resultado_usuario = mysqli_query($conn, $pesquisa_usuario);
    $row_usuario = mysqli_fetch_assoc($resultado_usuario);

    //Select pra puxar o usuario recem criado para inserir o acesso dele
    $id_usuario_recem_criado = $row_usuario['id']; 

    //Loop para inserir acessos do usuário
    if($usuario_acessos !== null){
        for($i=0; $i < count($usuario_acessos); $i++){
            //Inserir Acesso
            $inserir_acesso = "insert into acessos(id, data_criacao, empresas_id, usuarios_id) values (NULL, '".$data_criacao."', '".$usuario_acessos[$i]."', '".$id_usuario_recem_criado."');";
            $enviar_acesso = mysqli_query($conn, $inserir_acesso);
        }
    }

}

//Mensagem de Sucesso ou Falha na operação
if($enviar_usuario == 1){
    // Criar o array com status e a mensagem de sucesso
    $retorna = ['status' => true, 'msg' => "Usuário Cadastrado com Sucesso!"];
}else{
    // Criar o array com status e a mensagem de erro
    $retorna = ['status' => false, 'msg' => "Erro ao Cadastrar o Usuário! Verifique os Dados Inseridos"];
}

// Converter o array em objeto e retornar para o JavaScript
echo json_encode($retorna);

?>