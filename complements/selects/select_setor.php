<?php

$setores = array("Administrativo", "Caixa", "Entregas", "Fiscalização", "Frios", "Gerencia", "Hortifruti", "Limpeza", "Operação Loja", "Padaria", "Recebimento Merc.", "Recursos Humanos", "Reposição", "Sub-Gerencia"); 

//Select do setor do setor
$pesquisa_funcionarios3 = "SELECT * FROM funcionarios";
$resultado_funcionarios3 = mysqli_query($conn, $pesquisa_funcionarios3);
$row_funcionarios3 = mysqli_fetch_assoc($resultado_funcionarios3);

//lista todos e seleciona apenas o que está no banco
foreach ($setores as $value3) {

            echo "<option value='".$value3."'>".$value3."</option>";
    }

?>