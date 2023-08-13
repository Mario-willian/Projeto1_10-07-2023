<?php

//Select para todos funcionários
$pesquisa_funcionarios = "SELECT * FROM funcionarios WHERE empresas_id = ".$id_empresa_selecionado." ORDER BY nome_completo;";
$resultado_funcionarios = mysqli_query($conn, $pesquisa_funcionarios);

//Loop para listar os funcionários
while ($row_funcionarios = mysqli_fetch_assoc($resultado_funcionarios)){

    //declarando Variavel
    $selecao_funcionario = "";

    if($id_funcionario_selecionado == $row_funcionarios['id']){
        $selecao_funcionario = "selected";
    }

    $opcao = "<option ".$selecao_funcionario." value='".$row_funcionarios['id']."'>".$row_funcionarios['nome_completo']."</option>";

    echo $opcao;
}

?>