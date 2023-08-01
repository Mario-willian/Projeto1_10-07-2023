<?php

//Puxando Elementos inicias da classe
include_once "../../complements/inicio_classe.php";

//Recebendo os campos do formulário
$funcionario_nome = $_POST['funcionario_nome'];
$funcionario_cpf = $_POST['funcionario_cpf'];
$funcionario_data_nascimento = $_POST['funcionario_data_nascimento']; $funcionario_data_nascimento = Date($funcionario_data_nascimento);
$funcionario_status = $_POST['funcionario_status'];
$funcionario_empresa = $_POST['funcionario_empresa'];
$funcionario_setor = $_POST['funcionario_setor'];
$funcionario_funcao = $_POST['funcionario_funcao'];
$funcionario_data_de_inicio = $_POST['funcionario_data_de_inicio']; $funcionario_data_de_inicio = Date($funcionario_data_de_inicio);
$funcionario_vale_transporte = $_POST['funcionario_vale_transporte'];
$funcionario_valor_vale_transporte = "";
$funcionario_valor_vale_transporte = $_POST['funcionario_valor_vale_transporte'];
$funcionario_salario = $_POST['funcionario_salario'];
$funcionario_nome_pai = "";
$funcionario_nome_pai = $_POST['funcionario_nome_pai'];
$funcionario_nome_mae = $_POST['funcionario_nome_mae'];
$funcionario_observacao = "";
$funcionario_observacao = $_POST['funcionario_observacao'];

//'ADDSLASHER' para nao conflitar as aspas com o banco
$funcionario_observacao = addslashes($funcionario_observacao);

    //Condição para Atualizar
    //Recebendo ID do Funcionario e Vale
    $funcionario_id = $_POST['funcionario_id'];
    $vale_transporte_id = $_POST['vale_transporte_id'];
    
    //Inserir Ferias
    $atualizar_funcionario = "UPDATE funcionarios SET cpf = '".$funcionario_cpf."', nome_completo = '".$funcionario_nome."', data_nascimento = '".$funcionario_data_nascimento."', salario = '".$funcionario_salario."', 
    nome_pai = '".$funcionario_nome_pai."', nome_mae = '".$funcionario_nome_mae."', setor = '".$funcionario_setor."', funcao = '".$funcionario_funcao."', observacao = '".$funcionario_observacao."', 
    status = '".$funcionario_status."', empresas_id = '".$funcionario_empresa."' WHERE id = ".$funcionario_id.";";
    $enviar_funcionario = mysqli_query($conn, $atualizar_funcionario);

    //Inserir Ferias
    $atualizar_vale_transporte = "UPDATE vale_transportes SET tipo = '".$funcionario_vale_transporte."', valor = '".$funcionario_valor_vale_transporte."', funcionarios_id = ".$funcionario_id." WHERE id = ".$vale_transporte_id."";
    $enviar_vale_transporte = mysqli_query($conn, $atualizar_vale_transporte);


    header("location:../../painel/cadastros.php");
?>