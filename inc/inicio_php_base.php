<?php
header("Content-Type:Text/html; charset=utf8");
session_start();

//Verificando se o usuário já está logado
if (!empty($_SESSION['usuario'])) {
  header("location:login/loja_login.php");
}