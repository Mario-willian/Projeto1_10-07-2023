<?php

//Select para empresas que o usuário tem acesso
$pesquisa_empresas = "SELECT * FROM empresas WHERE status = 'Ativo' ORDER BY nome_loja;";
$resultado_empresas = mysqli_query($conn, $pesquisa_empresas);

//Loop para listar em opções as empresas que o usuário tem acesso
while ($row_empresas = mysqli_fetch_assoc($resultado_empresas)){

    //declarando Variavel
    $selecao_empresa = "";

    if($id_empresa_selecionado == $row_empresas['id']){
        $selecao_empresa = "selected";
    }

    $opcao = "<option ".$selecao_empresa." value='".$row_empresas['id']."'>".$row_empresas['nome_loja']."</option>";

    echo $opcao;
        
}

?>