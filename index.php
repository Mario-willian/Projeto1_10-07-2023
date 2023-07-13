<!DOCTYPE html>
<html lang="en">
<head>
	<title>SUPERMERCADOS PARANAIBA</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	  <!-- Favicons -->
  <link href="img/logo.png" rel="icon">
  <link href="img/logo.png" rel="apple-touch-icon">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->

</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="img/lg.jpg" alt="IMG">
				</div>

				<form action="login_adm/index.php" method="POST" class="login100-form validate-form">
					<span class="login100-form-title">
						Acessar Conta
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Usuário inválido">
						<input class="input100" name="usuario" type="text" required="" placeholder="Usuário">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Senha inválida">
						<input class="input100" name="senha" type="password" placeholder="Senha" required="">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button name="salvar" class="login100-form-btn">
							Entrar
						</button>
					</div>

					<div class="text-center p-t-12">
			<?php 
				      //Verificando se existe o acesso invalido
				    if (isset($_SESSION['login_invalido'])){
				        echo $_SESSION['login_invalido'];
				        unset($_SESSION['login_invalido']);
				    }
       ?>
					</div>

					<div class="text-center p-t-136">
						<p>Desenvolvido por <a target="_blank" href="https://10envolveu.com.br/index.php"><b>10envolveu</b></a></p>
					</div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->	
	<script  src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>