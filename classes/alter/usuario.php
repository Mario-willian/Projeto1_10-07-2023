<?php

//Puxando Elementos inicias da classe
include_once "../../complements/inicio_classe.php";

//Recebendo os campos do formulário
$usuario_id = $_POST['usuario_id'];
$usuario_nome = $_POST['usuario_nome'];
$usuario_email = $_POST['usuario_email']; 
$usuario_senha = $_POST['usuario_senha'];

//Recebendo a data Atual
$data_criacao = date('Y-m-d H:i:s');

    //Atualizar dados do usuário
    $atualizar_usuario = "UPDATE usuarios SET nome_completo = '".$usuario_nome."', email = '".$usuario_email."', senha = '".$usuario_senha."' WHERE id = ".$usuario_id."";
    $enviar_usuario = mysqli_query($conn, $atualizar_usuario);

    //Mensagem de Sucesso ou Falha
    if(empty($enviar_usuario)){
        $_SESSION['mensagem_editar'] = "Erro ao atualizar seus dados";

        //Inserir LOG para gerar a Notificação
        $criar_log = "insert into `logs` (`id`, `tabela_alterada`, `tarefa_executada`, `cor`, `icone`, `status`, `data_criacao`, `usuarios_id`) VALUES
        (NULL, 'usuarios', 'Falha ao tentar editar os dados do seu usuário.', 'danger', 'fa fa-exclamation-triangle faa-flash', 'ativo', '".$data_criacao."', ".$_SESSION["id_usuario_login"]['id'].");";
        $enviar_log = mysqli_query($conn, $criar_log);
    }else{
        $_SESSION['mensagem_editar'] = "Dados atualizados com sucesso!";
        //Armazendo no array id_usuario_login informações ATUALIZADAS do usuário
        $_SESSION["id_usuario_login"]['id'] = $usuario_id;
        $_SESSION["id_usuario_login"]['nome_completo'] = $usuario_nome;
        $_SESSION["id_usuario_login"]['email'] = $usuario_email;
        $_SESSION["id_usuario_login"]['senhamd5'] = $usuario_senha;
        
        //Inserir LOG para gerar a Notificação
        $criar_log = "insert into `logs` (`id`, `tabela_alterada`, `tarefa_executada`, `cor`, `icone`, `status`, `data_criacao`, `usuarios_id`) VALUES
        (NULL, 'usuarios', 'Seus dados foram editados com sucesso!', 'primary', 'fa fa-edit faa-tada', 'ativo', '".$data_criacao."', ".$_SESSION["id_usuario_login"]['id'].");";
        $enviar_log = mysqli_query($conn, $criar_log);
    }

    header("location:../../painel/conta.php");
?>