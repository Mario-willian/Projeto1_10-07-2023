<?php

//Select para todos funcionários
$pesquisa_funcionarios = "SELECT * FROM funcionarios ORDER BY nome_completo;";
$resultado_funcionarios = mysqli_query($conn, $pesquisa_funcionarios);

//Loop para listar os funcionários
while ($row_funcionarios = mysqli_fetch_assoc($resultado_funcionarios)){

    echo "<option value='".$row_funcionarios['id']."'>".$row_funcionarios['nome_completo']."</option>";

}

?>