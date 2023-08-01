<?php

$setores = array("Açougue", "Padaria", "Hortifruti", "Caixa", "Fiscalização", "Reposição", "Limpeza", "Administrativo", "Gerencia", "Sub-Gerencia", "Entregas", 
"Recebimento Merc.", "Operação Loja", "Recursos Humanos"); 

//Select do setor do funcionario
$pesquisa_funcionarios = "SELECT * FROM funcionarios where id = ".$id_item_selecionado.";";
$resultado_funcionarios = mysqli_query($conn, $pesquisa_funcionarios);
$row_funcionarios = mysqli_fetch_assoc($resultado_funcionarios);

//lista todos e seleciona apenas o que está no banco
foreach ($setores as $value) {

        if($value == $row_funcionarios['setor']){
            echo "<option selected value='".$row_funcionarios['carsetorgo']."'>".$row_funcionarios['setor']."</option>";
        }else{
            echo "<option value='".$value."'>".$value."</option>";
        }

    }

?>