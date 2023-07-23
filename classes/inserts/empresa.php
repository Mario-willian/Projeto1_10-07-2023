<?php

//Puxando Elementos inicias da classe
include_once "../../complements/inicio_classe.php";

//Recebendo os campos do formulário
$empresa_cnpj = $_POST['empresa_cnpj'];
$empresa_nome_loja = $_POST['empresa_nome_loja'];
$empresa_razao_social = $_POST['empresa_razao_social'];

//Recebendo a data Atual
$data_criacao = date('Y-m-d H:i:s');

//Inserir Ferias
$inserir_empresa = "insert into empresas(id, cnpj, nome_loja, razao_social, status, data_criacao) values (NULL, '".$empresa_cnpj."', '".$empresa_nome_loja."', '".$empresa_razao_social."', 'Ativo', '".$data_criacao."');";
$enviar_empresa = mysqli_query($conn, $inserir_empresa);

header('location:../../painel/inserir.php');

?>