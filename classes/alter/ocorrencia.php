<?php

//Puxando Elementos inicias da classe
include_once "../../complements/inicio_classe.php";

//Recebendo os campos do formulário
$ocorrencia_data = $_POST['ocorrencia_data'];
$ocorrencia_data = Date($ocorrencia_data." H:i:s");
$ocorrencia_loja = $_POST['ocorrencia_loja'];
$ocorrencia_funcionarios = $_POST['ocorrencia_funcionarios'];
$ocorrencia_motivo = $_POST['ocorrencia_motivo'];
$ocorrencia_quantidade_faltas = $_POST['ocorrencia_quantidade_faltas'];
$ocorrencia_valor = $_POST['ocorrencia_valor'];
$ocorrencia_observacao = $_POST['ocorrencia_observacao'];

//'ADDSLASHER' para nao conflitar as aspas com o banco
$ocorrencia_observacao = addslashes($ocorrencia_observacao);


    //Recebendo ID das Ferias
    $ocorrencia_id = $_POST['ocorrencia_id'];
    
    //Inserir Ferias
    $atualizar_ocorrencia = "UPDATE ocorrencias SET motivo = '".$ocorrencia_motivo."', faltas = '".$ocorrencia_quantidade_faltas."', valor = '".$ocorrencia_valor."', observacao = '".$ocorrencia_observacao."', funcionarios_id = ".$ocorrencia_funcionarios.", empresas_id = ".$ocorrencia_loja." WHERE id = ".$ocorrencia_id."";
    $enviar_ocorrencia = mysqli_query($conn, $atualizar_ocorrencia);

    header("location:../../painel/ocorrencias.php");

?>