<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "supermercados_paranaiba";

$conn = mysqli_connect($servidor , $usuario, $senha, $dbname);
mysqli_set_charset($conn, "utf8");

?>