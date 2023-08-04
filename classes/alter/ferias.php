<?php

//Puxando Elementos inicias da classe
include_once "../../complements/inicio_classe.php";

//Recebendo os campos do formulário
$ferias_loja = $_POST['ferias_loja'];
$ferias_funcionario = $_POST['ferias_funcionario'];
$ferias_data_inicio = $_POST['ferias_data_inicio']; $ferias_data_inicio = Date($ferias_data_inicio);
$ferias_data_final = $_POST['ferias_data_final']; $ferias_data_final = Date($ferias_data_final);
$ferias_observacao = "";
$ferias_observacao = $_POST['ferias_observacao'];
$ferias_acao = $_POST['ferias_acao'];

//Recebendo a data Atual
$data_criacao = date('Y-m-d H:i:s');

//ADDSLASHER' para nao conflitar as aspas com o banco
$ferias_observacao = addslashes($ferias_observacao);

    //Recebendo ID das Ferias
    $ferias_id = $_POST['ferias_id'];
    
    //Inserir Ferias
    $atualizar_ferias = "UPDATE ferias SET data_inicio = '".$ferias_data_inicio."', data_fim = '".$ferias_data_final."', observacao = '".$ferias_observacao."', funcionarios_id = ".$ferias_funcionario.", empresas_id = ".$ferias_loja." WHERE id = ".$ferias_id."";
    $enviar_ferias = mysqli_query($conn, $atualizar_ferias);

    //Loop para identificar se deu de Sucesso ou Falha na operação, e emitir mensagem nas notificacoes
    if($enviar_ferias == 1){

        //Inserir LOG para gerar a Notificação
        $criar_log = "insert into `logs` (`id`, `tabela_alterada`, `tarefa_executada`, `cor`, `icone`, `status`, `data_criacao`, `usuarios_id`) VALUES
        (NULL, 'ferias', 'O determinado registro férias foi editado com sucesso!', 'primary', 'fa fa-edit faa-tada', 'ativo', '".$data_criacao."', ".$_SESSION["id_usuario_login"]['id'].");";
        $enviar_log = mysqli_query($conn, $criar_log);
    }else{

        //Inserir LOG para gerar a Notificação
        $criar_log = "insert into `logs` (`id`, `tabela_alterada`, `tarefa_executada`, `cor`, `icone`, `status`, `data_criacao`, `usuarios_id`) VALUES
        (NULL, 'ferias', 'Falha ao tentar editar o determinado registro férias.', 'danger', 'fa fa-exclamation-triangle faa-flash', 'ativo', '".$data_criacao."', ".$_SESSION["id_usuario_login"]['id'].");";
        $enviar_log = mysqli_query($conn, $criar_log);
    }

    header("location:../../painel/ferias.php");
?>