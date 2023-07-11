<?php
session_start();
unset($_SESSION['usuario']);
unset($_SESSION['login_invalido']);
unset($_SESSION['conclusao']);
unset($_SESSION['carrinho']);
header("location:../index.php");
?>