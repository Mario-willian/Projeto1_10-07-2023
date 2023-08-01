<?php

//Puxando Elementos inicias da classe
include_once "../../complements/inicio_classe.php";

//Recebendo os campos do formulário
$ferias_id = $_POST['ferias_id'];

//Excluir Funcionário
$excluir_ferias = "DELETE FROM ferias WHERE id = ".$ferias_id.";";
$enviar_exclusao_ferias = mysqli_query($conn, $excluir_ferias);

header("location:../../painel/ferias.php");

?>