<?php
session_start();
unset($_SESSION['usuario']);
unset($_SESSION['login_invalido']);
header("location:../index.php");
?>