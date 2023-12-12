<?php

$exame_demissional = array("Selecionar...","Sim", "Não"); 

//lista todos e seleciona apenas o que está no banco
foreach ($exame_demissional as $value) {

        if($value == $row_recisao['exame_demissional']){
            echo "<option selected value='".$row_recisao['exame_demissional']."'>".$row_recisao['exame_demissional']."</option>";
        }else{
            echo "<option value='".$value."'>".$value."</option>";
        }

    }

?>