<?php
		
		$servidor = "localhost";
		$usuario = "root";
		$senha = "2909icac";
		$dbname = "bd";


		//Criar a conexão
		$con = mysqli_connect($servidor, $usuario, $senha, $dbname);
		//Resolvendo problema com acentuação!!!
		$con->query("SET NAMES utf8");

?>
