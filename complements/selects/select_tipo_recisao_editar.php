<?php

$tipo_recisao = array("Selecionar...","Acordo", "Justiça", "Normal"); 

//lista todos e seleciona apenas o que está no banco
foreach ($tipo_recisao as $value) {

        if($value == $row_recisao['tipo']){
            echo "<option selected value='".$row_recisao['tipo']."'>".$row_recisao['tipo']."</option>";
        }else{
            echo "<option value='".$value."'>".$value."</option>";
        }

    }

?>