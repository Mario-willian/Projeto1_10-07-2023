<?php

//Select para empresas que o usuário tem acesso
$pesquisa_empresas = "SELECT * FROM acessos_empresas WHERE status = 'Ativo' AND usuarios_id =".$_SESSION["id_usuario_login"]['id']." ORDER BY nome_loja;";
$resultado_empresas = mysqli_query($conn, $pesquisa_empresas);

//Loop para listar em opções as empresas que o usuário tem acesso
while ($row_empresas = mysqli_fetch_assoc($resultado_empresas)){

        $empresas_id = $row_empresas['id'];
        $nome_loja = "'usuario_acesso_".$row_empresas['nome_loja']."'";

        if (isset($_POST['usuario_acesso_planalto']) && !empty($_POST['usuario_acesso_planalto'])) {
                $usuario_acesso_planalto = $_POST['usuario_acesso_planalto']; 
            }
}

?>