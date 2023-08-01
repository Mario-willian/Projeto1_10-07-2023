<?php

//Puxando Elementos inicias da classe
include_once "../../complements/inicio_classe.php";

//Recebendo os campos do formulário
$lembrete_id = $_POST['lembrete_id'];

//Excluir Funcionário
$excluir_lembrete = "DELETE FROM lembretes WHERE id = ".$lembrete_id.";";
$enviar_exclusao_lembrete = mysqli_query($conn, $excluir_lembrete);

header("location:../../painel/painel_de_controle.php");

?>