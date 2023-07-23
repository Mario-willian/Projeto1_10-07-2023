<?php

//Puxando Elementos inicias da classe
include_once "../../complements/inicio_classe.php";

//Recebendo os campos do formulário
$usuario_nome = $_POST['usuario_nome'];
$usuario_email = $_POST['usuario_email'];
$usuario_senha = $_POST['usuario_senha'];

//Recebendo os campos da Combobox
if (isset($_POST['usuario_acesso_planalto']) && !empty($_POST['usuario_acesso_planalto'])) {
    $usuario_acesso_planalto = $_POST['usuario_acesso_planalto']; 
}
if (isset($_POST['usuario_acesso_rodoviaria']) && !empty($_POST['usuario_acesso_rodoviaria'])) {
    $usuario_acesso_rodoviaria = $_POST['usuario_acesso_rodoviaria']; 
}
if (isset($_POST['usuario_acesso_varzea']) && !empty($_POST['usuario_acesso_varzea'])) {
    $usuario_acesso_varzea = $_POST['usuario_acesso_varzea']; 
}
if (isset($_POST['usuario_acesso_guanabara']) && !empty($_POST['usuario_acesso_guanabara'])) {
    $usuario_acesso_guanabara = $_POST['usuario_acesso_guanabara']; 
}
if (isset($_POST['usuario_acesso_botafogo']) && !empty($_POST['usuario_acesso_botafogo'])) {
    $usuario_acesso_botafogo = $_POST['usuario_acesso_botafogo']; 
}
if (isset($_POST['usuario_acesso_rio_branco']) && !empty($_POST['usuario_acesso_rio_branco'])) {
    $usuario_acesso_rio_branco = $_POST['usuario_acesso_rio_branco']; 
}

//CRIAR FOREACH PARA PUXAR DADOS DO BANCO*****

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

header('location:../../painel/inserir.php');

?>