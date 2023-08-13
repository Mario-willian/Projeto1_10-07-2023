<?php

$id_loja = $_GET['id_loja'];

//Puxando variável de conexão
include_once '../../classes/conexao_bd.php';

//Select para todos funcionários
$pesquisa_funcionarios = "SELECT * FROM funcionarios WHERE empresas_id = ".$id_loja." ORDER BY nome_completo;";
$resultado_funcionarios = mysqli_query($conn, $pesquisa_funcionarios);

//Loop para listar os funcionários
while ($row_funcionarios = mysqli_fetch_assoc($resultado_funcionarios)){

    $opcao = "<option value='".$row_funcionarios['id']."'>".$row_funcionarios['nome_completo']."</option>";

    echo $opcao;
}

?>