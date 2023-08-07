<?php

//Puxando Elementos inicias da classe
include_once "../../complements/inicio_classe.php";

//Recebendo os campos do formulário
$recisao_loja = $_POST['recisao_loja'];
$recisao_funcionario = $_POST['recisao_funcionario'];
$recisao_motivo = $_POST['recisao_motivo'];
$recisao_tipo = $_POST['recisao_tipo'];
$recisao_exame_demissional = $_POST['recisao_exame_demissional'];
$recisao_data_inicio_aviso = $_POST['recisao_data_inicio_aviso']; $recisao_data_inicio_aviso = Date($recisao_data_inicio_aviso);
$recisao_data_final_aviso = $_POST['recisao_data_final_aviso']; $recisao_data_final_aviso = Date($recisao_data_final_aviso);
$recisao_data_prazo_pagamento = $_POST['recisao_data_prazo_pagamento']; $recisao_data_prazo_pagamento = Date($recisao_data_prazo_pagamento);
$recisao_status = $_POST['recisao_status'];
$recisao_observacao = "";
$recisao_observacao = $_POST['recisao_observacao'];

//Recebendo a data Atual
$data_criacao = date('Y-m-d H:i:s');

//'ADDSLASHER' para nao conflitar as aspas com o banco
$recisao_observacao = addslashes($recisao_observacao);

    //Condição para Atualizar
    //Recebendo ID das Ferias
    $recisao_id = $_POST['recisao_id'];
    
    //Inserir Ferias
    $atualizar_recisao = "UPDATE recisoes SET exame_demissional = '".$recisao_exame_demissional."', tipo = '".$recisao_tipo."', data_inicio_aviso = '".$recisao_data_inicio_aviso."', data_fim_aviso = '".$recisao_data_final_aviso."', data_prazo_pagamento = '".$recisao_data_prazo_pagamento."', motivo = '".$recisao_motivo."', observacao = '".$recisao_observacao."', status = '".$recisao_status."', funcionarios_id = ".$recisao_funcionario.", empresas_id = ".$recisao_loja." WHERE id = ".$recisao_id."";
    $enviar_recisao = mysqli_query($conn, $atualizar_recisao);

    //Loop para identificar se deu de Sucesso ou Falha na operação, e emitir mensagem nas notificacoes
    if($enviar_recisao == 1){

        //Inserir LOG para gerar a Notificação
        $criar_log = "insert into `logs` (`id`, `tabela_alterada`, `tarefa_executada`, `cor`, `icone`, `status`, `data_criacao`, `usuarios_id`) VALUES
        (NULL, 'recisoes', 'O determinado registro de uma rescisão foi editado com sucesso!', 'primary', 'fa fa-edit faa-tada', 'ativo', '".$data_criacao."', ".$_SESSION["id_usuario_login"]['id'].");";
        $enviar_log = mysqli_query($conn, $criar_log);
    }else{

        //Inserir LOG para gerar a Notificação
        $criar_log = "insert into `logs` (`id`, `tabela_alterada`, `tarefa_executada`, `cor`, `icone`, `status`, `data_criacao`, `usuarios_id`) VALUES
        (NULL, 'recisoes', 'Falha ao tentar editar o determinado registro de uma rescisão.', 'danger', 'fa fa-exclamation-triangle faa-flash', 'ativo', '".$data_criacao."', ".$_SESSION["id_usuario_login"]['id'].");";
        $enviar_log = mysqli_query($conn, $criar_log);
    }

    header("location:../../painel/rescisoes.php");

?>