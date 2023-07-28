<?php

//Select de todos usuarios cadastrados
$pesquisa_usuarios = "SELECT id, nome_completo FROM usuarios WHERE status = 'Ativo' ORDER BY nome_completo;";
$resultado_usuarios = mysqli_query($conn, $pesquisa_usuarios);

//Variaveis
$i=0;

//Loop para listar em opções as usuarios que o usuário tem acesso
while ($row_usuarios = mysqli_fetch_assoc($resultado_usuarios)){

        echo 
        "<tr>
                <td><input type='checkbox' name='usuario[]' value='".$row_usuarios['id']."'></td>
                <td>".$row_usuarios['nome_completo']."</td>
        </tr>";

        $i++;
}
?>