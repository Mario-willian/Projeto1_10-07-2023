<?php
session_start();
unset($_SESSION['ferias_loja']);
unset($_SESSION['ferias_funcionario']);
unset($_SESSION['ferias_data_inicio']);
unset($_SESSION['ferias_data_fim']);
unset($_SESSION['ferias_quantidade_itens']);
header("location:../painel/ferias.php");
?>