<?php

//Puxando Elementos inicias da classe
include_once "../../complements/inicio_classe.php";

//Recebendo os campos do formulário
$usuario_nome = $dados['usuario_nome'];
$usuario_email = $dados['usuario_email'];
$usuario_senha = $dados['usuario_senha'];

//Recebendo os campos da Combobox
$empresas = implode(',', $_POST['op']);

//Inserir cada item em uma variavel
//trabalhando com checkbox em array no php

//Recebendo a data Atual
$data_criacao = date('Y-m-d H:i:s');

//Inserir Usuario
$inserir_usuario = "insert into usuarios(id, nome_completo, email, senha, status, data_criacao) values (NULL, '".$nome_completo."', '".$usuario_email."', '".$usuario_senha."', 'Ativo', '".$data_criacao."');";
$enviar_usuario = mysqli_query($conn, $inserir_usuario);

//Select pra puxar o usuario recem criado para inserir o acesso dele
$id_usuario_recem_criado = ""; 

//Fazer loop para inserir todos acesso do usuario
//Inserir Acesso
$inserir_acesso = "insert into acessos(id, data_criacao, empresas_id, usuarios_id) values (NULL, '".$data_criacao."', '".$usuario_acesso."', '".$id_usuario_recem_criado."');";
$enviar_acesso = mysqli_query($conn, $inserir_acesso);

echo $inserir_acesso;
exit;

//Mensagem de Sucesso ou Falha na operação
if($enviar_usuario == 1){
    // Criar o array com status e a mensagem de sucesso
    $retorna = ['status' => true, 'msg' => "Usuário Cadastrado com Sucesso!"];
}else{
    // Criar o array com status e a mensagem de erro
    $retorna = ['status' => false, 'msg' => "Erro ao Cadastrar o Usuário!"];
}

// Converter o array em objeto e retornar para o JavaScript
echo json_encode($retorna);

?>