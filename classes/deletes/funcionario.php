<?php

//Puxando Elementos inicias da classe
include_once "../../complements/inicio_classe.php";

//Recebendo os campos do formulário
$funcionario_id = $_POST['funcionario_id'];

//Excluir Funcionário
$excluir_funcionario = "DELETE FROM funcionarios WHERE id = ".$funcionario_id.";";
$enviar_exclusao_funcionario = mysqli_query($conn, $excluir_funcionario);

//Excluir Vales Transportes do funcionario excluido
$excluir_vale_transporte = "DELETE FROM vale_transportes WHERE funcionarios_id = ".$funcionario_id.";";
$enviar_exclusao_vale_transporte = mysqli_query($conn, $excluir_vale_transporte);

header("location:../../painel/cadastros.php");
?>