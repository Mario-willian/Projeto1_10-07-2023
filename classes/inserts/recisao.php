<?php

//Puxando Elementos inicias da classe
include_once "../../complements/inicio_classe.php";

//Recebendo os campos do formulário
$recisao_data = $_POST['recisao_data']; $recisao_data = Date($recisao_data);
$recisao_loja = $_POST['recisao_loja'];
$recisao_funcionario = $_POST['recisao_funcionario'];
$recisao_motivo = $_POST['recisao_motivo'];
$recisao_tipo = $_POST['recisao_tipo'];
$recisao_exame_demissional = $_POST['recisao_exame_demissional'];
$recisao_dias_de_aviso = $_POST['recisao_dias_de_aviso'];
$recisao_status = $_POST['recisao_status'];
$recisao_observacao = "";
$recisao_observacao = $_POST['recisao_observacao'];

//Recebendo a data Atual
$data_criacao = date('Y-m-d H:i:s');

//Recebendo data de recisao + dias de aviso
$recisao_data_fim = date('Y-m-d', strtotime("+{$recisao_dias_de_aviso} days",strtotime($recisao_data)));

//'ADDSLASHER' para nao conflitar as aspas com o banco
$recisao_observacao = addslashes($recisao_observacao);

//Inserir Recisao
$inserir_recisao = "insert into recisoes(id, exame_demissional, tipo, data_inicio_aviso, data_fim_aviso, motivo, observacao, status, data_criacao, funcionarios_id, empresas_id) values (NULL, '".$recisao_exame_demissional."', '".$recisao_tipo."', '".$recisao_data."', '".$recisao_data_fim."', '".$recisao_motivo."', '".$recisao_observacao."', '".$recisao_status."','".$data_criacao."',  '".$recisao_funcionario."', '".$recisao_loja."');";
$enviar_recisao = mysqli_query($conn, $inserir_recisao);

header('location:../../painel/inserir.php');

?>