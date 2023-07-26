<?php
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

    //Juntar somente em uma váriavel o nome de todos os arquivos
    if($cont == 0){
        $nomes_arquivo .= $novo_nome_arquivo;
    }
    else if(count($arquivo['name']) > 1){
        $nomes_arquivo .= " / ".$novo_nome_arquivo;
    }    

}

?>