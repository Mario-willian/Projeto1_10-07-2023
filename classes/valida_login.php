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
    $pesquisa_login = "SELECT * FROM usuarios WHERE email = '$email_login' AND senha = '$senha_login'";
    $resultado_login = mysqli_query($conn, $pesquisa_login);
    $row_login = mysqli_fetch_assoc($resultado_login);
    
    //Verifica se o login está incorreto
    if(empty($row_login)){

        echo "NAO EXISTE";
        exit;
        $_SESSION["login_invalido"] = "Invalido";

    //Verificar se o usuários está ativo
    }else if ($row_login['status'] != "Ativo"){

        echo "Inativo";
        exit;
        $_SESSION["login_invalido"] = "Inativo";
    
    //Tudo certo, faz o login
    }else{
        //Armazendo no array id_usuario_login informações do usuário
        $_SESSION["id_usuario_login"]['id'] = $row_login['id'];
        $_SESSION["id_usuario_login"]['nome_completo'] = $row_login['nome_completo'];
        $_SESSION["id_usuario_login"]['email'] = $row_login['email'];

        //Startando Variavel
        $i=1;
        //Puxando informações do usuário
        $id_usuario = $_SESSION['id_usuario_login']['id'];

        //Verifica acessos do usuários
        $pesquisa_acessos = "SELECT empresas_id FROM acessos WHERE usuarios_id = $id_usuario";
        $resultado_acessos = mysqli_query($conn, $pesquisa_acessos);
        while($row_acessos = mysqli_fetch_assoc($resultado_acessos)){
            $_SESSION["acessos_login"][$i] = $row_acessos['empresas_id'];
            $i++;
           }

    }

    header('location:../painel/painel_de_controle.php');
    
}else{

    header("location:../");

}
?>