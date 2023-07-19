<?php

//Puxando Info do Usuário
//include_once "../complements/inicio_php.php";

//CORRETO USAR O INCLUIDE DE CIMA
//Puxando variável de conexão
include_once '../conexao_bd.php';
//Startando Sessão
session_start();

//Recebendo os campos do formulário
$recisao_data = $_POST['recisao_data']; $recisao_data = Date($recisao_data." H:i:s");
$recisao_loja = $_POST['recisao_loja'];
$recisao_funcionario = $_POST['recisao_funcionario'];
$recisao_motivo = $_POST['recisao_motivo'];
$recisao_tipo = $_POST['recisao_tipo'];
$recisao_exame_demissional = $_POST['recisao_exame_demissional'];
$recisao_inicio_dias_de_aviso = $_POST['recisao_inicio_dias_de_aviso']; $recisao_inicio_dias_de_aviso = Date($recisao_inicio_dias_de_aviso." Y-m-d");
$recisao_prazo_dias_de_aviso = $_POST['recisao_prazo_dias_de_aviso']; $recisao_prazo_dias_de_aviso = Date($recisao_prazo_dias_de_aviso." Y-m-d");
$recisao_status = $_POST['recisao_status'];
$recisao_observacao = "";
$recisao_observacao = $_POST['recisao_observacao'];

//Recebendo a data Atual
$data_criacao = date('Y-m-d H:i:s');

//'ADDSLASHER' para nao conflitar as aspas com o banco
$recisao_observacao = addslashes($recisao_observacao);

//Inserir Recisao
$inserir_recisao = "insert into recisoes(id, exame_demissional, tipo, data_inicio_aviso, data_fim_aviso, motivo, observacao, status, data_criacao, funcionarios_id, empresas_id) values (NULL, '".$recisao_exame_demissional."', '".$recisao_tipo."', '".$recisao_inicio_dias_de_aviso."', '".$recisao_prazo_dias_de_aviso."', '".$recisao_motivo."', '".$recisao_observacao."', '".$recisao_status."','".$data_criacao."',  '".$recisao_funcionario."', '".$recisao_loja."');";
$enviar_recisao = mysqli_query($conn, $inserir_recisao);

echo $inserir_recisao;
exit;

header('location:../../painel/inserir.php');

?>