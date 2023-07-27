<?php

//Select para empresas que o usuário tem acesso
$pesquisa_empresas = "SELECT * FROM acessos_empresas WHERE status = 'Ativo' AND usuarios_id =".$_SESSION["id_usuario_login"]['id']." ORDER BY nome_loja;";
$resultado_empresas = mysqli_query($conn, $pesquisa_empresas);

//Variaveis
$i=0;

//Loop para listar em opções as empresas que o usuário tem acesso
while ($row_empresas = mysqli_fetch_assoc($resultado_empresas)){

        echo 
        "<tr>
                <td><input type='checkbox' name='empresa[]' value='".$row_empresas['id']."'></td>
                <td>".$row_empresas['nome_loja']."</td>
        </tr>";

        $i++;
}
?>