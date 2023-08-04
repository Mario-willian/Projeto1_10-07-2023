<?php

//Puxando Elementos inicias da classe
include_once "../../complements/inicio_classe.php";

//Recebendo os campos do formulário
$ocorrencia_data = $_post['ocorrencia_data'];
$ocorrencia_data = Date($ocorrencia_data." H:i:s");
$ocorrencia_loja = $_post['ocorrencia_loja'];
$ocorrencia_funcionarios = $_post['ocorrencia_funcionarios'];
$ocorrencia_motivo = $_post['ocorrencia_motivo'];
$ocorrencia_quantidade_faltas = $_post['ocorrencia_quantidade_faltas'];
$ocorrencia_valor = $_post['ocorrencia_valor'];
$ocorrencia_observacao = $_post['ocorrencia_observacao'];

//Recebendo a data Atual
$data_criacao = date('Y-m-d H:i:s');

//'ADDSLASHER' para nao conflitar as aspas com o banco
$ocorrencia_observacao = addslashes($ocorrencia_observacao);

//Inserir Ocorrencia
$inserir_ocorrencia = "insert into ocorrencias(id, motivo, faltas, valor, observacao, status, data_criacao, funcionarios_id, empresas_id) values (NULL, '".$ocorrencia_motivo."', '".$ocorrencia_quantidade_faltas."', '".$ocorrencia_valor."', '".$ocorrencia_observacao."', 'Ativo', '".$data_criacao."', '".$ocorrencia_funcionarios."', ".$ocorrencia_loja.");";
$enviar_ocorrencia = mysqli_query($conn, $inserir_ocorrencia);

//Pesquisar ocorrencia recem criado
$pesquisa_ocorrencia = "SELECT id FROM ocorrencias WHERE motivo = '".$ocorrencia_motivo."' AND data_criacao = '".$data_criacao."' ORDER BY id DESC LIMIT 1;";
$resultado_ocorrencia = mysqli_query($conn, $pesquisa_ocorrencia);
$row_ocorrencia = mysqli_fetch_assoc($resultado_ocorrencia);

//ID da ocorrencia recem criado
$ocorrencia_id = $row_ocorrencia['id'];


//Inserindo arquivo da ocorrencia
if (isset($_FILES['ocorrencia_arquivo']) && !empty($_FILES['ocorrencia_arquivo'])) {
    //Armazenar os arquivos enviados


//Receber dados da input Arquivo
$arquivo = $_FILES['ocorrencia_arquivo'];
//Local que será salvo os arquivos
$destino = "../../upload/ocorrencia/";
//Instanciando a Variavel
$nomes_arquivo = "";

//Repetição para a quantidade de imagens inseridas na input (variavel $Arquivo)
for ($cont = 0; $cont < count($arquivo['name']); $cont++) {

    //Pegar a extensao do arquivo
    $extensao = strtolower(substr($arquivo['name'][$cont], -4)); 

    //Codição para adicionar um . no inicio da extensão para extensões que não entregam com o .
    $validar = strpos($extensao, '.');
    if($validar === false){
        $extensao = ".".$extensao; 
    }

        //definir o nome do arquivo com o MD5 da data
        $novo_nome_arquivo = md5(date('Y-m-d H:i:s')).$cont.$extensao; 

    // Mover o arquivo com o nome da variavel acima
    move_uploaded_file($arquivo['tmp_name'][$cont], $destino.$novo_nome_arquivo);

    //Inserir Arquivo
    $inserir_arquivo= "insert into arquivos_ocorrencias (id, arquivo, data_criacao, ocorrencias_id) values (NULL, '".$novo_nome_arquivo."', '".$data_criacao."', '".$ocorrencia_id."');";
    $enviar_arquivo = mysqli_query($conn, $inserir_arquivo);  
}

//Recebe Vazio se nao tiver arquivos
if($extensao == "."){
    $nomes_arquivo = "";
}



}else{
    //Recebe Vazio
    $arquivo = "";
    $nomes_arquivo = "";
    //Inserir Arquivo vazio
    $inserir_arquivo= "insert into arquivos_ocorrencias (id, arquivo, data_criacao, ocorrencias_id) values (NULL, '', '".$data_criacao."', '".$ocorrencia_id."');";
    $enviar_arquivo = mysqli_query($conn, $inserir_arquivo);  
}

//Mensagem de Sucesso ou Falha na operação
if($enviar_ocorrencia == 1){
    // Criar o array com status e a mensagem de sucesso
    $retorna = ['status' => true, 'msg' => "Ocorrencia Cadastrado com Sucesso!"];
}else{
    // Criar o array com status e a mensagem de erro
    $retorna = ['status' => false, 'msg' => "Erro ao Cadastrar a Ocorrencia!"];
}

// Converter o array em objeto e retornar para o JavaScript
echo json_encode($retorna);

?>