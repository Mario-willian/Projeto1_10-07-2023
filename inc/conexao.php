<?php
		
		$servidor = "localhost";
		$usuario = "root";
		$senha = "";
		$dbname = "bd";


		//Criar a conexão
		$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
		//Resolvendo problema com acentuação!!!
		$conn->query("SET NAMES utf8");

?>
