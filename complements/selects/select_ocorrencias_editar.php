<?php

$ocorrencias = array("Atestado", "TAtestado de Óbito", "Erro Operacional", "Falta Injustificada", "Reembolso", "Hora Extra", "Afastamento INSS", "Licença Maternidade", 
"Licença Parternidade", "Meta", "Quebra de Caixa", "Segunda Via Cartão", "Vale Avulso", "Atestado de Comparecimento", "Feriado"); 

//lista todos e seleciona apenas o que está no banco
foreach ($ocorrencias as $value) {

        if($value == $row_ocorrencia['motivo']){
            echo "<option selected value='".$row_ocorrencia['motivo']."'>".$row_ocorrencia['motivo']."</option>";
        }else{
            echo "<option value='".$value."'>".$value."</option>";
        }

    }

?>