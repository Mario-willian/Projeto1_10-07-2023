<?php 

//Select para todos funcionários
$pesquisa_funcionarios = "SELECT * FROM funcionarios ORDER BY nome_completo;";
$resultado_funcionarios = mysqli_query($conn, $pesquisa_funcionarios);
$resultado_funcionarios_ocorrencia = mysqli_query($conn, $pesquisa_funcionarios);
$resultado_funcionarios_recisao = mysqli_query($conn, $pesquisa_funcionarios);
$resultado_funcionarios_ferias = mysqli_query($conn, $pesquisa_funcionarios);
//$row_funcionarios = mysqli_fetch_assoc($resultado_funcionarios);

//Select para Acessos
$pesquisa_acessos = "SELECT * FROM acessos WHERE usuarios_id = '".$_SESSION["id_usuario_login"]['id']."' ORDER BY id;";
$resultado_acessos = mysqli_query($conn, $pesquisa_acessos);
$row_acessos = mysqli_fetch_assoc($resultado_acessos);

//REALIZAR UMA CONDICAO PRA PUXAR EMPRESAS SOMENTE DO ACESSO DO USUARIO
    //Recebe o número da ID da empresa que o usuário tem acesso
    //$acessos_id_empresa = $row_acessos['empresas_id'];


//Select para Empresas que o usuário tem acesso


?>