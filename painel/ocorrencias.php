<?php
/*
//Puxando Info do Usuário
require_once "../inc/inicio_php_adm.php";

//Puxando variavel de conexão
require_once "../inc/conexao.php";

//Selecionar os vendedor a serem apresentado na página
$result_visu_vendedor = "SELECT * FROM vendedor where ativo = 1";
$resultado_visu_vendedor = mysqli_query($conn, $result_visu_vendedor);
$total_visu_vendedor = mysqli_num_rows ($resultado_visu_vendedor);

//Recuperar arquivo da classe
require_once "../classe/ContaClasse.php";

//Criar um objeto
$excluir = new Conta();

//Excluindo a notificação no visual do usuário, passando o codigo escolhido pelo usuario.
if (isset($_GET["excluir"])) {
    $excluir->excluir_vendedor($_GET["cpf"]);
    header("location:vendedores.php");
}
*/
?>

<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../img/logo.png">
  <link rel="icon" type="image/png" href="../img/logo.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    SUPERMERCADOS PARANAIBA | Ocorrências
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

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="orange">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">

        <a href="" class="simple-text logo-normal">
          <center><b>SUPERMERCADOS PARANAIBA</b></center>
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="./painel_de_controle.php">
              <i class="now-ui-icons tech_tv"></i>
              <p><b>Painel de Controle</p>
            </a>
          </li>
          <li>
            <a href="./inserir.php">
              <i class="fa fa-plus"></i>
              <p>Cadastrar</p>
            </a>
          </li>
          <li class="active ">
            <a href="./ocorrencias.php">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Ocorrências</p>
            </a>
          </li>
          <li>
            <a href="./rescisoes.php">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Rescisões</p>
            </a>
          </li>
          <li>
            <a href="./ferias.php">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Férias</p>
            </a>
          </li>
          <li>
            <a href="./cadastros.php">
              <i class="fa fa-group"></i>
              <p>Cadastros</p>
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
            <a class="navbar-brand" href="#agronomig"> Lista de Ocorrências</a>
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
                  <a class="dropdown-item" href="../classes/retira_login.php">Sair</a>

                </div>
              </li>
              
            </ul>
          </div>
        </div>
      </nav>
<script>
function myFunction() {
    alert("Conta excluida com sucesso!");
}
</script>
      <!-- End Navbar -->
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Lista de Ocorrências</h4>
                <h6><i class="fa fa-sliders"></i> Filtro</h6>
                <div class="row">
                    <div class="col-md-2 pr-1">
                      <div class="form-group">
                        <label>Data</label>
                        <input type="date" name="data" class="form-control" >
                      </div>
                    </div>
                    <div class="col-md-2 pl-1">
                      <div class="form-group">
                        <label>Selecionar Loja</label>
                        <select name="" class="form-control">
                          <option value="">puxar do banco as empresas que o adm administra</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-2 pl-1">
                      <div class="form-group">
                        <label>Selecionar Funcionário</label>
                        <select name="" class="form-control">
                          <option value="">puxar do banco os funcionarios da empresa selecionada</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-2 pl-1">
                      <div class="form-group">
                        <label>Motivo</label>
                        <select name="" class="form-control">
                          <option value="">Advertência</option>
                          <option value="">Atestado</option>
                          <option value="">Atestado de Óbito</option>
                          <option value="">Erro Operacional</option>
                          <option value="">Falta Injustificada</option>
                          <option value="">Reembolso</option>
                          <option value="">Hora Extra</option>
                          <option value="">Afastamento INSS</option>
                          <option value="">Licença Maternidade</option>
                          <option value="">Licença Paternidade</option>
                          <option value="">Meta</option>
                          <option value="">Quebra de Caixa</option>
                          <option value="">Segunda Via Cartão</option>
                          <option value="">Vale Avulso</option>
                          <option value="">Atestado de Comparecimento</option>
                          <option value="">Feriado</option>
                        </select>
                      </div>
                    </div>

                  <div class="col-md-2">
                      <div class="form-group"><br>
                        <button type="submit" name="filtrar" class="btn btn-outline-success" style="width: 100%;"><b><i class="fa fa-search"></i> Buscar</b></button><br>
                      </div>
                    </div>

             </div>
          </div>


              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        CPF
                      </th>
                      <th>
                        Nome
                      </th>
                      <th>
                        Estado
                      </th>
                      <th>
                        E-mail
                      </th>
                      <th>
                        Telefone
                      </th>
                      <th>
                        Avaliação
                      </th>
                      <th>
                        
                      </th>
                      <th>
                        
                      </th>
                    </thead>
                    <tbody>
                      <?php /* while ($rows_visu_vendedor = mysqli_fetch_assoc($resultado_visu_vendedor)){ ?>
                      <tr>
                        <td>
                          <?php echo $rows_visu_vendedor['cpf'];?>
                        </td>
                        <td>
                          <?php echo $rows_visu_vendedor['nome'];?>
                        </td>
                        <td>
                          <?php echo $rows_visu_vendedor['estado'];?>
                        </td>
                        <td>
                          <?php echo $rows_visu_vendedor['email'];?>
                        </td>
                        <td>
                          <?php echo $rows_visu_vendedor['telefone'];?>
                        </td>
                        <td>
                          <?php echo $rows_visu_vendedor['avaliacao'];?>
                        </td>
                        <td>
                          <form action="vendedores.php" method="get">
                            <button style="width: 60%;"  name="excluir" onclick="myFunction()" class="btn btn-danger btn-sm">X</button>
                            <input type="text" style="display:none" value="<?php echo $rows_visu_vendedor['cpf'];?>" name="cpf">
                        </form>
                        </td>
                        <td>
                          <form action="editar_vendedor.php">
                            <button class="btn btn-primary btn-sm" title="Editar Vendedor"><i class=" fa fa-edit"></i></button>
                          <input class="w3-input w3-border" name="cpf" style="display:none" type="text" value="<?php echo $rows_visu_vendedor['cpf'];?>" >
                        </form>
                        </td>
                      </tr>
                    <?php }*/ ?>
                    </tbody>
                  </table>
                </div>
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