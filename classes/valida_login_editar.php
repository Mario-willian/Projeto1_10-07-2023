<?php

//Validação do Login
if(!empty($_POST['email_login'] AND !empty($_POST['senha_login']))){

    //Iniciando a Sessão
    session_start();
    //Conexão ao Banco
    require_once 'conexao_bd.php';

    //Recebendo Valores
    $email_login = $_POST['email_login'];
    $senha_login = $_POST['senha_login'];

    //Consulta usuário
    $pesquisa_login_editar = "SELECT * FROM usuarios WHERE email = '$email_login' AND senha = '$senha_login' AND ID = ".$_SESSION["id_usuario_login"]['id'].";";
    $resultado_login_editar = mysqli_query($conn, $pesquisa_login_editar);
    $row_login_editar = mysqli_fetch_assoc($resultado_login_editar);
    
    //Verifica se o login está incorreto
    if(empty($row_login_editar)){

        $_SESSION['mensagem_login'] = "O usuário ou senha está incorreto!";
        header("location:../painel/conta.php");

    //Tudo certo, faz o login
    }else{
        //Armazendo no array id_usuario_login informações do usuário
        $_SESSION["id_usuario_login_editar"]['id'] = $row_login_editar['id'];
        $_SESSION["id_usuario_login_editar"]['nome_completo'] = $row_login_editar['nome_completo'];
        $_SESSION["id_usuario_login_editar"]['email'] = $row_login_editar['email'];
        $_SESSION["id_usuario_login_editar"]['senhamd5'] = $row_login_editar['senha'];

        header('location:../painel/editar-conta.php');

    }

    
    
}else{

    header("location:../painel/conta.php");

}
?>