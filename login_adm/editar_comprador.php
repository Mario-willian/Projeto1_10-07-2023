<?php
//Puxando Info do Usuário
require_once "../inc/inicio_php_adm.php";

//Puxando variavel de conexão
require_once "../inc/conexao.php";

//Puxando o CPF
$cpf_comprador = $_GET["cpf"];

//Impressao do historico de compras
$result_comprador = "SELECT * FROM cliente WHERE cpf = '$cpf_comprador';";
$resultado_comprador = mysqli_query($conn, $result_comprador);
$row_comprador = mysqli_fetch_assoc($resultado_comprador);

//Recuperar arquivo da classe
require_once "../classe/ContaClasse.php";
//Criar um objeto do tipo Editar Produto
$editar = new Conta();

if (isset($_GET['alterar'])){
    $editar->alterar_cliente();
    header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Agronomig | Vendedores
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/now-ui-dashboard.css?v=1.3.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="yellow">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">

        <a href="" class="simple-text logo-normal">
          <center>Agronomig</center>
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="./index.php">
              <i class="now-ui-icons design_app"></i>
              <p>Painel de Controle</p>
            </a>
          </li>
         
          <li>
            <a href="./inserir.php">
              <i class="now-ui-icons users_single-02"></i>
              <p>Inserir</p>
            </a>
          </li>
          <li>
            <a href="./vendedores.php">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Lista de Vendedores</p>
            </a>
          </li>
          <li  class="active ">
            <a href="./compradores.php">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Lista de Compradores</p>
            </a>
          </li>
          <li>
            <a href="./comentarios.php">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Lista de Comentários</p>
            </a>
          </li>
           <li class="active-pro" id="txt">
            <a href="" onclick="imprime()">
              <i class="now-ui-icons arrows-1_cloud-download-93"></i>
              <script type="text/javascript" language="javascript">
      function imprime(text){
        text=document
        print(text)
      }
    </script>
    <form>
    <p>IMPRIMIR DADOS</p>
    </form>

            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#agronomig"> Lista de Compradores</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
            
            </form>
            <ul class="navbar-nav">
              
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Mais Ações</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="../inc/sair.php">Sair</a>

                </div>
              </li>
              
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Editar</h4>
                <form action="editar_comprador.php" method="get">
                <div class="row">
                  <div class="col-md-2"></div>
                    <div class="col-md-8">
                      <div class="form-group">
                        <center><h4 class="card-title">Nome Completo:</h4></center>
                        <input type="text" name="nome" maxlength="80" value="<?php echo $row_comprador['nome']; ?>" class="form-control text-center" required="" >
                      </div>
                    </div>
                </div>

                <div class="row">
                  <div class="col-md-2"></div>
                    <div class="col-md-8">
                      <div class="form-group">
                        <input type="text" name="cpf" maxlength="80" style="display:none" value="<?php echo $row_comprador['cpf']; ?>" class="form-control text-center" required="" >
                      </div>
                    </div>
                </div>

                <div class="row">
                  <div class="col-md-2"></div>
                    <div class="col-md-8">
                      <div class="form-group">
                        <center><h4 class="card-title">Cartao:</h4></center>
                        <input type="text" maxlength='30' name="pagamento" value="<?php echo $row_comprador['pagamento']; ?>" class="form-control text-center" required=""  >
                      </div>
                    </div>
                </div>

                <div class="row">
                  <div class="col-md-2"></div>
                    <div class="col-md-8">
                      <div class="form-group">
                        <center><h4 class="card-title">Telefone:</h4></center>
                        <input type="text" name="telefone" value="<?php echo $row_comprador['telefone']; ?>" maxlength="15" OnKeyPress="formatar('##-#####-####', this)"  class="form-control text-center" required="" >
                      </div>
                    </div>
                </div>

                <div class="row">
                  <div class="col-md-2"></div>
                    <div class="col-md-8">
                      <div class="form-group">
                        <center><h4 class="card-title">Endereço:</h4></center>
                        <input type="text" name="endereco" value="<?php echo $row_comprador['endereco']; ?> "maxlength="120" class="form-control text-center" required=""  >
                      </div>
                    </div>
                </div>

                <div class="row">
                  <div class="col-md-2"></div>
                    <div class="col-md-8">
                      <div class="form-group">
                        <center><h4 class="card-title">Estado:</h4></center>
                        <input type="text" name="estado" value="<?php echo $row_comprador['estado']; ?>" maxlength="2" class="form-control text-center" required=""  >
                      </div>
                    </div>
                </div>
                  
                <div class="row">
                  <div class="col-md-2"></div>
                    <div class="col-md-8">
                      <div class="form-group">
                        <center><h4 class="card-title">E-mail:</h4></center>
                        <input type="text" name="email" value="<?php echo $row_comprador['email']; ?>" maxlength="80" class="form-control text-center" required=""  >
                      </div>
                    </div>
                </div>

                <div class="row">
                  <div class="col-md-2"></div>
                    <div class="col-md-8">
                      <div class="form-group">
                        <center><h4 class="card-title">Senha:</h4></center>
                        <input type="text" name="senha" value="<?php echo $row_comprador['senha']; ?>" maxlength="80" class="form-control text-center" required=""  >
                      </div>
                    </div>
                </div>

                <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                  <div class="form-group">
                <button style="width: 100%;" type="submit" name="alterar" class="btn btn-success ">Salvar Alteração</button>
                </div>
              </div>
              </div>
              </form>

                    
<script>
function formatar(mascara, documento){
  var i = documento.value.length;
  var saida = mascara.substring(0,1);
  var texto = mascara.substring(i)
  
  if (texto.substring(0,1) != saida){
            documento.value += texto.substring(0,1);
  }
  
}
</script>

                	









              </div>
            
              </div>
            </div>
          </div>
        </div>
      <footer class="footer">
        <div class="container-fluid">
         
          
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/now-ui-dashboard.min.js?v=1.3.0" type="text/javascript"></script>
  <!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="assets/demo/demo.js"></script>
</body>

</html>