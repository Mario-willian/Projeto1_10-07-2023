<?php

//Puxando Elementos inicias da classe
include_once "../../complements/inicio_classe.php";

//Recebendo os campos do formulário
$ferias_loja = $_POST['ferias_loja'];
$ferias_funcionario = $_POST['ferias_funcionario'];
$ferias_data_inicio = $_POST['ferias_data_inicio']; $ferias_data_inicio = Date($ferias_data_inicio);
$ferias_data_final = $_POST['ferias_data_final']; $ferias_data_final = Date($ferias_data_final);
$ferias_observacao = "";
$ferias_observacao = $_POST['ferias_observacao'];
$ferias_acao = $_POST['ferias_acao'];

//ADDSLASHER' para nao conflitar as aspas com o banco
$ferias_observacao = addslashes($ferias_observacao);

    //Recebendo ID das Ferias
    $ferias_id = $_POST['ferias_id'];
    
    //Inserir Ferias
    $atualizar_ferias = "UPDATE ferias SET data_inicio = '".$ferias_data_inicio."', data_fim = '".$ferias_data_final."', observacao = '".$ferias_observacao."', funcionarios_id = ".$ferias_funcionario.", empresas_id = ".$ferias_loja." WHERE id = ".$ferias_id."";
    $enviar_ferias = mysqli_query($conn, $atualizar_ferias);

    header("location:../../painel/ferias.php");
?>