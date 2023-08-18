<?php
session_start();
unset($_SESSION['ocorrencia_motivo']);
unset($_SESSION['ocorrencia_funcionario']);
unset($_SESSION['ocorrencia_loja']);
header("location:../painel/ocorrencias.php");
?>