<?php

$status = array("Ativo", "Afastado", "Demitido", "Inativo", "INSS", "Licença Maternidade", "Justiça", "Transferido"); 

//Select do setor do funcionario
$pesquisa_funcionarios_status = "SELECT status FROM acessos_funcionarios;";
$resultado_funcionarios_status = mysqli_query($conn, $pesquisa_funcionarios_status);
$row_funcionarios_status = mysqli_fetch_assoc($resultado_funcionarios_status);

//lista todos e seleciona apenas o que está no banco
foreach ($status as $value) {

            echo "<option value='".$value."'>".$value."</option>";
    }

?>