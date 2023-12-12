<?php

$motivo = array("Selecionar...","Aviso","Dispensa", "Justiça", "Pedido de Demissão", "Término de Contrato", "Término de Contrato Antecipado"); 

//lista todos e seleciona apenas o que está no banco
foreach ($motivo as $value) {

        if($value == $row_recisao['motivo']){
            echo "<option selected value='".$row_recisao['motivo']."'>".$row_recisao['motivo']."</option>";
        }else{
            echo "<option value='".$value."'>".$value."</option>";
        }

    }

?>