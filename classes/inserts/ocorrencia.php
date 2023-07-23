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

//Armazenar os arquivos enviados
include_once 'special/upload.php';

//Recebendo a data Atual
$data_criacao = date('Y-m-d H:i:s');

//'ADDSLASHER' para nao conflitar as aspas com o banco
$ocorrencia_observacao = addslashes($ocorrencia_observacao);

//Inserir Lembrete
$inserir_ocorrencia = "insert into ocorrencias(id, arquivo, motivo, valor, observacao, status, data_criacao, funcionarios_id, empresas_id) values (NULL, '".$ocorrencia_data."', '".$caminho_arquivo."', '".$ocorrencia_motivo."', '".$ocorrencia_valor."', '".$ocorrencia_observacao."', 'Ativo', '".$data_criacao."', '".$ocorrencia_funcionarios."', ".$ocorrencia_loja.");";
$enviar_ocorrencia = mysqli_query($conn, $inserir_ocorrencia);

echo $inserir_ocorrencia;
exit;

header('location:../../painel/inserir.php');

?>