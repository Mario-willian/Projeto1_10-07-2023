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

//Recebendo a data Atual
$data_criacao = date('Y-m-d H:i:s');

//'ADDSLASHER' para nao conflitar as aspas com o banco
$ocorrencia_observacao = addslashes($ocorrencia_observacao);


    //Recebendo ID das Ferias
    $ocorrencia_id = $_POST['ocorrencia_id'];
    
    //Inserir Ferias
    $atualizar_ocorrencia = "UPDATE ocorrencias SET motivo = '".$ocorrencia_motivo."', data_criacao = '".$ocorrencia_data."', faltas = '".$ocorrencia_quantidade_faltas."', valor = '".$ocorrencia_valor."', observacao = '".$ocorrencia_observacao."', funcionarios_id = ".$ocorrencia_funcionarios.", empresas_id = ".$ocorrencia_loja." WHERE id = ".$ocorrencia_id."";
    $enviar_ocorrencia = mysqli_query($conn, $atualizar_ocorrencia);

    //Loop para identificar se deu de Sucesso ou Falha na operação, e emitir mensagem nas notificacoes
    if($enviar_ocorrencia == 1){

        //Inserir LOG para gerar a Notificação
        $criar_log = "insert into `logs` (`id`, `tabela_alterada`, `tarefa_executada`, `cor`, `icone`, `status`, `data_criacao`, `usuarios_id`) VALUES
        (NULL, 'ocorrencias', 'O determinado registro de uma ocorrencia foi editado com sucesso!', 'primary', 'fa fa-edit faa-tada', 'ativo', '".$data_criacao."', ".$_SESSION["id_usuario_login"]['id'].");";
        $enviar_log = mysqli_query($conn, $criar_log);
    }else{

        //Inserir LOG para gerar a Notificação
        $criar_log = "insert into `logs` (`id`, `tabela_alterada`, `tarefa_executada`, `cor`, `icone`, `status`, `data_criacao`, `usuarios_id`) VALUES
        (NULL, 'ocorrencias', 'Falha ao tentar editar o determinado registro de uma ocorrencia.', 'danger', 'fa fa-exclamation-triangle faa-flash', 'ativo', '".$data_criacao."', ".$_SESSION["id_usuario_login"]['id'].");";
        $enviar_log = mysqli_query($conn, $criar_log);
    }

    header("location:../../painel/ocorrencias.php");

?>