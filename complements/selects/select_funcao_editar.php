<?php

$cargos = array("Frente de Caixa", "Supervisor de Açougue", "Encarregado de Açougue", "Auxiliar de Açougue", "Supervisor de Padaria", "Encarregado de Padaria", "Padeiro", 
"Confeiteiro", "Auxiliar de Padaria", "Balconista", "Supervisor de Hortifruti", "Encarregado de Hortifruti", "Fiscal de Loja", "Repositor", "Embalador", "Repositor", 
"Auxiliar de Serviços Gerais", "Auxiliar Administrativo", "Assistente Administrativo", "Assistente Departamento Pessoal", "Supervisor Departamento Pessoal", "Gerente", "Sub-Gerente",  
"Encarregado de Piso Loja", "Supervisor de Frios", "Encarregado de Frios", "Auxiliar de Frios", "Motorista", "Conferente", "Operador de Loja"); 

//Select ja está no php select_setor_editar

//lista todos e seleciona apenas o que está no banco
foreach ($cargos as $value) {

        if($value == $row_funcionarios['funcao']){
            echo "<option selected value='".$row_funcionarios['funcao']."'>".$row_funcionarios['funcao']."</option>";
        }else{
            echo "<option value='".$value."'>".$value."</option>";
        }

    }

?>