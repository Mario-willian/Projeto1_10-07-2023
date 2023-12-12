<?php

$ocorrencias = array("Selecionar...","Advertencia", "Afastamento INSS", "Atestado", "Atestado de Comparecimento", "Atestado de Óbito", "Aviso", "Dispensa", "Erro Operacional", "Exame Demissional", "Falta Injustificada", "Feriado", "Hora Extra", "Justiça", "Licença Maternidade", "Licença Parternidade", "Meta", "Quebra de Caixa", "Reembolso", "Rescisão", "Segunda Via Cartão", "Suspensão", "Término de Contrato", "Vale Avulso"); 

//lista todos e seleciona apenas o que está no banco
foreach ($ocorrencias as $value) {

        if($value == $row_ocorrencia['motivo']){
            echo "<option selected value='".$row_ocorrencia['motivo']."'>".$row_ocorrencia['motivo']."</option>";
        }else{
            echo "<option value='".$value."'>".$value."</option>";
        }

    }

?>