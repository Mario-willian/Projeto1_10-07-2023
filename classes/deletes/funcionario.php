<?php

//Puxando Elementos inicias da classe
include_once "../../complements/inicio_classe.php";

//Recebendo os campos do formulário
$funcionario_id = $_POST['funcionario_id'];

//Recebendo a data Atual
$data_criacao = date('Y-m-d H:i:s');

//Select das ferias escolhidas
$pesquisa_ferias = "SELECT * FROM acessos_ferias WHERE funcionarios_id =".$funcionario_id." LIMIT 1;";
$resultado_ferias = mysqli_query($conn, $pesquisa_ferias);
$row_ferias = mysqli_fetch_assoc($resultado_ferias);

//Select das Ocorrencias escolhidas
$pesquisa_ocorrencias = "SELECT * FROM acessos_ocorrencias WHERE funcionarios_id =".$funcionario_id." LIMIT 1;";
$resultado_ocorrencias = mysqli_query($conn, $pesquisa_ocorrencias);
$row_ocorrencias = mysqli_fetch_assoc($resultado_ocorrencias);

//Select das Recisoes escolhidas
$pesquisa_recisoes = "SELECT * FROM acessos_recisoes WHERE funcionarios_id =".$funcionario_id." LIMIT 1;";
$resultado_recisoes = mysqli_query($conn, $pesquisa_recisoes);
$row_recisoes = mysqli_fetch_assoc($resultado_recisoes);

//Se houver registros vinculados ao funcionario retornará um erro e não excluirá ele
if(!empty($row_ferias) || !empty($row_ocorrencias) || !empty($row_recisoes)){

    //Inserir LOG para gerar a Notificação
    $criar_log = "insert into `logs` (`id`, `tabela_alterada`, `tarefa_executada`, `cor`, `icone`, `status`, `data_criacao`, `usuarios_id`) VALUES
    (NULL, 'funcionarios', 'Falha ao tentar excluir o determinado registro de um funcionário. Certifique que o funcionário não tenha algum registro vinculado a ele', 'danger', 'fa fa-exclamation-triangle faa-flash', 'ativo', '".$data_criacao."', ".$_SESSION["id_usuario_login"]['id'].");";
    $enviar_log = mysqli_query($conn, $criar_log);

    //Enviar sessao para emitir mensagem de erro e voltar a pagina principal
    $_SESSION['mensagem_funcionario'] = "O Funcionário selecionado possui algum registro vinculado a ele. Verifique antes de tentar exclui-lo novamente!";
    header("location:../../painel/cadastros.php");
}else{

//Excluir Vales Transportes do funcionario a excluir
$excluir_vale_transporte = "DELETE FROM vale_transportes WHERE funcionarios_id = ".$funcionario_id.";";
$enviar_exclusao_vale_transporte = mysqli_query($conn, $excluir_vale_transporte);

//Excluir Funcionário
$excluir_funcionario = "DELETE FROM funcionarios WHERE id = ".$funcionario_id.";";
$enviar_exclusao_funcionario = mysqli_query($conn, $excluir_funcionario);

//Loop para identificar se deu de Sucesso ou Falha na operação, e emitir mensagem nas notificacoes
if($enviar_exclusao_funcionario == 1){

    //Inserir LOG para gerar a Notificação
    $criar_log = "insert into `logs` (`id`, `tabela_alterada`, `tarefa_executada`, `cor`, `icone`, `status`, `data_criacao`, `usuarios_id`) VALUES
    (NULL, 'funcionarios', 'O determinado registro de um funcionário foi excluido com sucesso!', 'warning', 'fa fa-info-circle faa-shake', 'ativo', '".$data_criacao."', ".$_SESSION["id_usuario_login"]['id'].");";
    $enviar_log = mysqli_query($conn, $criar_log);
}else{

    //Inserir LOG para gerar a Notificação
    $criar_log = "insert into `logs` (`id`, `tabela_alterada`, `tarefa_executada`, `cor`, `icone`, `status`, `data_criacao`, `usuarios_id`) VALUES
    (NULL, 'funcionarios', 'Falha ao tentar excluir o determinado registro de um funcionário. Certifique que o funcionário não tenha algum registro vinculado a ele', 'danger', 'fa fa-exclamation-triangle faa-flash', 'ativo', '".$data_criacao."', ".$_SESSION["id_usuario_login"]['id'].");";
    $enviar_log = mysqli_query($conn, $criar_log);
}

header("location:../../painel/cadastros.php");
}
?>