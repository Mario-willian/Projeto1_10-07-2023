<?php
session_start();
  //Para conectar-se com o Banco de Dados
  require_once "../inc/config.php";

    //Conexão com o banco de dados
    $pdo = new PDO(server,usuario,senha);

        //Criar o comando sql        
        $sql = $pdo->prepare("SELECT * FROM cliente WHERE usuario=? AND senha=? AND ativo=1");
        $sql->execute( array($_POST['usuario'], $_POST['senha'] ) );
        $row = $sql->fetchObject();  // devolve um único registro

        $sql = $pdo->prepare("SELECT * FROM vendedor WHERE usuario=? AND senha=? AND ativo=1");
        $sql->execute( array($_POST['usuario'], $_POST['senha'] ) );
        $row2 = $sql->fetchObject();  // devolve um único registro

        $sql = $pdo->prepare("SELECT * FROM adm WHERE login=? AND senha=?");
        $sql->execute( array($_POST['usuario'], $_POST['senha'] ) );
        $row3 = $sql->fetchObject();  // devolve um único registro

        //Verificando o tipo de usuário
        if ($row) { 
            //Caso o usuário seja cliente
            $_SESSION['usuario'] = $row;
            header("location:../login/loja_login.php");
        }else if($row2){
            //Caso o usuário seja vendedor
            $_SESSION['usuario'] = $row2;
            header("location:../login/vender.php");
        }else if($row3){
            //Caso o usuário seja adm
            $_SESSION['usuario'] = $row3;
            header("location:../login_adm/index.php");
        }else{
            //Avisar quando errar
            $_SESSION["login_invalido"] = "<div class='alert alert-danger text-center'>USUARIO OU SENHA INCORRETOS!</div>";
            header("location:../");
        }
?>