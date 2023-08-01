<?php

$status = array("Ativo", "Afastado", "Inativo", "Transferido"); 

//Select do setor do funcionario
$pesquisa_funcionarios2 = "SELECT * FROM acessos_funcionarios where id_funcionarios = ".$id_item_selecionado.";";
$resultado_funcionarios2 = mysqli_query($conn, $pesquisa_funcionarios2);
$row_funcionarios2 = mysqli_fetch_assoc($resultado_funcionarios2);

//lista todos e seleciona apenas o que está no banco
foreach ($status as $value) {

        if($value == $row_funcionarios2['status']){
            echo "<option selected value='".$row_funcionarios2['status']."'>".$row_funcionarios2['status']."</option>";
        }else{
            echo "<option value='".$value."'>".$value."</option>";
        }

    }

?>