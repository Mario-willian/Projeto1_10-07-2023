<?php

//Puxando Elementos inicias da classe
include_once "../../complements/inicio_classe.php";

//Recebendo os campos do formulário
$ocorrencia_id = $_POST['ocorrencia_id'];

//Excluir Funcionário
$excluir_ocorrencia = "DELETE FROM ocorrencias WHERE id = ".$ocorrencia_id.";";
$enviar_exclusao_ocorrencia = mysqli_query($conn, $excluir_ocorrencia);

header("location:../../painel/ocorrencias.php");
?>