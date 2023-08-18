<?php
session_start();
unset($_SESSION['recisao_motivo']);
unset($_SESSION['recisao_funcionario']);
unset($_SESSION['recisao_loja']);
header("location:../painel/rescisoes.php");
?>