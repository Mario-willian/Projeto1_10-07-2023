<?php

$vale_transporte = array("Selecionar...","BHBUS", "Combustivel", "Dinheiro", "Nenhum", "Otimo"); 

//lista todos e seleciona apenas o que está no banco
foreach ($vale_transporte as $value) {

        if($value == $row_funcionarios2['tipo_vale_transporte']){
            echo "<option selected value='".$row_funcionarios2['tipo_vale_transporte']."'>".$row_funcionarios2['tipo_vale_transporte']."</option>";
        }else{
            echo "<option value='".$value."'>".$value."</option>";
        }

    }

?>