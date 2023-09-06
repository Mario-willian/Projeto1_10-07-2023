<?php

//Select da Ocorrencia escolhidas
$pesquisa_arquivo_ocorrencia = "SELECT * FROM arquivos_ocorrencias WHERE ocorrencias_id =".$id_item_selecionado.";";
$resultado_arquivo_ocorrencia = mysqli_query($conn, $pesquisa_arquivo_ocorrencia);

//Variavel
$i=1;

//Loop para listar em opções as empresas que o usuário tem acesso
while ($row_arquivo_ocorrencia = mysqli_fetch_assoc($resultado_arquivo_ocorrencia)){

        if(!empty($row_arquivo_ocorrencia['arquivo'])){
                echo "<u><a target='_blank' href='../upload/ocorrencia/".$row_arquivo_ocorrencia['arquivo']."'>Documento ".$i."</a></u><br>";
        }
        $i++;
}

?>