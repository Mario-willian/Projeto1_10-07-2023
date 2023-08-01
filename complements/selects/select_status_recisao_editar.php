<?php

$status = array("Pago", "Pendente"); 

//lista todos e seleciona apenas o que está no banco
foreach ($status as $value) {

        if($value == $row_recisao['status']){
            echo "<option selected value='".$row_recisao['status']."'>".$row_recisao['status']."</option>";
        }else{
            echo "<option value='".$value."'>".$value."</option>";
        }

    }

?>