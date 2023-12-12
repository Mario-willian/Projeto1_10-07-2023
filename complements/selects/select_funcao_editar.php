<?php

$cargos = array("Selecionar...","Açougueiro","Assistente Administrativo", "Assistente Departamento Pessoal","Atendente de Padaria", "Auxiliar Administrativo", "Auxiliar de Açougue", "Auxiliar de Frios","Auxiliar de Hortifruti", "Auxiliar de Padaria", "Auxiliar de Serviços Gerais", "Balconista", "Confeiteiro", "Conferente","Desossador", "Embalador", "Encarregado de Açougue","Encarregado de Depósito", "Encarregado de Frios", "Encarregado de Hortifruti", "Encarregado de Padaria", "Encarregado de Piso Loja", "Frente de Caixa", "Fiscal de Loja", "Gerente", "Motorista", "Operador de Caixa", "Operador de Loja", "Padeiro", "Repositor", "Sub-Gerente", "Supervisor Departamento Pessoal", "Supervisor de Açougue", "Supervisor de Hortifruti", "Supervisor de Padaria", "Supervisor de Frios");

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