<?php

//Puxando Elementos inicias da classe
include_once "../../complements/inicio_classe.php";

//Recebendo os campos do formulário
$recisao_loja = $dados['recisao_loja'];
$recisao_funcionario = $dados['recisao_funcionario'];
$recisao_motivo = $dados['recisao_motivo'];
$recisao_tipo = $dados['recisao_tipo'];
$recisao_exame_demissional = $dados['recisao_exame_demissional'];
$recisao_data_inicio_aviso = $dados['recisao_data_inicio_aviso']; $recisao_data_inicio_aviso = Date($recisao_data_inicio_aviso);
$recisao_data_final_aviso = $dados['recisao_data_final_aviso']; $recisao_data_final_aviso = Date($recisao_data_final_aviso);
$recisao_data_prazo_pagamento = $dados['recisao_data_prazo_pagamento']; $recisao_data_prazo_pagamento = Date($recisao_data_prazo_pagamento);
$recisao_status = $dados['recisao_status'];
$recisao_observacao = "";
$recisao_observacao = $dados['recisao_observacao'];

//'ADDSLASHER' para nao conflitar as aspas com o banco
$recisao_observacao = addslashes($recisao_observacao);

//Recebendo a data Atual
$data_criacao = date('Y-m-d H:i:s');


//Inserir Recisao
$inserir_recisao = "insert into recisoes(id, exame_demissional, tipo, data_inicio_aviso, data_fim_aviso, data_prazo_pagamento, motivo, observacao, status, data_criacao, funcionarios_id, empresas_id) values (NULL, '".$recisao_exame_demissional."', '".$recisao_tipo."', '".$recisao_data_inicio_aviso."', '".$recisao_data_final_aviso."', '".$recisao_data_prazo_pagamento."', '".$recisao_motivo."', '".$recisao_observacao."', '".$recisao_status."','".$data_criacao."',  '".$recisao_funcionario."', '".$recisao_loja."');";
$enviar_recisao = mysqli_query($conn, $inserir_recisao);

//Mensagem de Sucesso ou Falha na operação
if($enviar_recisao == 1){
    // Criar o array com status e a mensagem de sucesso
    $retorna = ['status' => true, 'msg' => "Rescisão Cadastrado com Sucesso!"];

    //Inserir LOG para gerar a Notificação
    $criar_log = "insert into `logs` (`id`, `tabela_alterada`, `tarefa_executada`, `cor`, `icone`, `status`, `data_criacao`, `usuarios_id`) VALUES
    (NULL, 'recisoes', 'A rescisão foi cadastrada com sucesso!', 'success', 'far fa-check-circle faa-tada', 'ativo', '".$data_criacao."', ".$_SESSION["id_usuario_login"]['id'].");";
    $enviar_log = mysqli_query($conn, $criar_log);
}else{
    // Criar o array com status e a mensagem de erro
    $retorna = ['status' => false, 'msg' => "Erro ao Cadastrar a Recisão!"];

    //Inserir LOG para gerar a Notificação
    $criar_log = "insert into `logs` (`id`, `tabela_alterada`, `tarefa_executada`, `cor`, `icone`, `status`, `data_criacao`, `usuarios_id`) VALUES
    (NULL, 'recisoes', 'Falha ao tentar cadastrar a recisão.', 'danger', 'fa fa-exclamation-triangle faa-flash', 'ativo', '".$data_criacao."', ".$_SESSION["id_usuario_login"]['id'].");";
    $enviar_log = mysqli_query($conn, $criar_log);
}
// Converter o array em objeto e retornar para o JavaScript
echo json_encode($retorna);

?>