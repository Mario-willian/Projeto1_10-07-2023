<?php
		
		$servidor = "localhost";
		$usuario = "root";
		$senha = "";
		$dbname = "bd";


		//Criar a conexão
		$con = mysqli_connect($servidor, $usuario, $senha, $dbname);
		//Resolvendo problema com acentuação!!!
		$con->query("SET NAMES utf8");

?>
