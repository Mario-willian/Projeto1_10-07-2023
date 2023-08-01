<?php

//Puxando Elementos inicias da classe
include_once "../../complements/inicio_classe.php";

//Recebendo os campos do formulário
$recisao_id = $_POST['recisao_id'];

//Excluir Funcionário
$excluir_recisao = "DELETE FROM recisoes WHERE id = ".$recisao_id.";";
$enviar_exclusao_recisao = mysqli_query($conn, $excluir_recisao);

header("location:../../painel/rescisoes.php");
?>