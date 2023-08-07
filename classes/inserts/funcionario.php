<?php

//Puxando Elementos inicias da classe
include_once "../../complements/inicio_classe.php";

//Recebendo os campos do formulário
$funcionario_nome = $dados['funcionario_nome'];
$funcionario_cpf = $dados['funcionario_cpf'];
$funcionario_data_nascimento = $dados['funcionario_data_nascimento']; $funcionario_data_nascimento = Date($funcionario_data_nascimento);
$funcionario_status = $dados['funcionario_status'];
$funcionario_empresa = $dados['funcionario_empresa'];
$funcionario_setor = $dados['funcionario_setor'];
$funcionario_funcao = $dados['funcionario_funcao'];
$funcionario_data_de_inicio = $dados['funcionario_data_de_inicio']; $funcionario_data_de_inicio = Date($funcionario_data_de_inicio);
$funcionario_vale_transporte = $dados['funcionario_vale_transporte'];
$funcionario_valor_vale_transporte = "";
$funcionario_valor_vale_transporte = $dados['funcionario_valor_vale_transporte'];
$funcionario_salario = $dados['funcionario_salario'];
$funcionario_nome_mae = $dados['funcionario_nome_mae'];
$funcionario_observacao = "";
$funcionario_observacao = $dados['funcionario_observacao'];

//'ADDSLASHER' para nao conflitar as aspas com o banco
$funcionario_observacao = addslashes($funcionario_observacao);


//Recebendo a data Atual
$data_criacao = date('Y-m-d H:i:s');

$format = numfmt_create('pt_BR', NumberFormatter::DECIMAL);
$funcionario_salario = numfmt_parse($format, $funcionario_salario);
$funcionario_valor_vale_transporte = numfmt_parse($format, $funcionario_valor_vale_transporte);

//Inserir Funcionário
$inserir_funcionario = "insert into funcionarios(id, cpf, nome_completo, data_nascimento, salario, nome_mae, setor, funcao, observacao, status, data_inicio, data_criacao, empresas_id) values (NULL, '".$funcionario_cpf."', '".$funcionario_nome."', '".$funcionario_data_nascimento."', '".$funcionario_salario."', '".$funcionario_nome_mae."', '".$funcionario_setor."', '".$funcionario_funcao."','".$funcionario_observacao."', '".$funcionario_status."', '".$funcionario_data_de_inicio."', '".$data_criacao."', '".$funcionario_empresa."');";
$enviar_funcionario = mysqli_query($conn, $inserir_funcionario);

//Pesquisar Funcionário recem criado
$pesquisa_funcionario = "SELECT id FROM funcionarios WHERE cpf = '".$funcionario_cpf."' AND data_criacao = '".$data_criacao."' ORDER BY id DESC LIMIT 1;";
$resultado_funcionario = mysqli_query($conn, $pesquisa_funcionario);
$row_funcionario = mysqli_fetch_assoc($resultado_funcionario);

//ID do Funcionário recem criado
$funcionario_id = $row_funcionario['id'];

//Inserir vale transporte
$inserir_vale_transporte = "insert into vale_transportes(id, tipo, valor, data_criacao, funcionarios_id) values (NULL, '".$funcionario_vale_transporte."', '".$funcionario_valor_vale_transporte."', '".$data_criacao."', '".$funcionario_id."');";
$enviar_vale_transporte = mysqli_query($conn, $inserir_vale_transporte);

//Mensagem de Sucesso ou Falha na operação
if($enviar_funcionario == 1){
    // Criar o array com status e a mensagem de sucesso
    $retorna = ['status' => true, 'msg' => "Funcionário Cadastrado com Sucesso!"];

    //Inserir LOG para gerar a Notificação
    $criar_log = "insert into `logs` (`id`, `tabela_alterada`, `tarefa_executada`, `cor`, `icone`, `status`, `data_criacao`, `usuarios_id`) VALUES
    (NULL, 'funcionarios', 'O funcionario foi cadastrado com sucesso!', 'success', 'far fa-check-circle faa-tada', 'ativo', '".$data_criacao."', ".$_SESSION["id_usuario_login"]['id'].");";
    $enviar_log = mysqli_query($conn, $criar_log);
}else{
    // Criar o array com status e a mensagem de erro
    $retorna = ['status' => false, 'msg' => "Erro ao Cadastrar o(a) Funcionário(a)!"];

    //Inserir LOG para gerar a Notificação
    $criar_log = "insert into `logs` (`id`, `tabela_alterada`, `tarefa_executada`, `cor`, `icone`, `status`, `data_criacao`, `usuarios_id`) VALUES
    (NULL, 'funcionarios', 'Falha ao tentar cadastrar o(a) funcionário(A).', 'danger', 'fa fa-exclamation-triangle faa-flash', 'ativo', '".$data_criacao."', ".$_SESSION["id_usuario_login"]['id'].");";
    $enviar_log = mysqli_query($conn, $criar_log);
}

// Converter o array em objeto e retornar para o JavaScript
echo json_encode($retorna);

?>