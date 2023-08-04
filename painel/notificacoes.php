<?php 
//Puxando Info do Usuário
include_once "../complements/inicio_php.php";

//Carregando o inicio da pagina
require "../complements/begin_page.php";

//Select para listar Notificações
$pesquisa_notificacao_resultado = "SELECT * FROM logs where usuarios_id = ".$_SESSION["id_usuario_login"]['id']." AND status = 'Ativo' ORDER BY data_criacao DESC LIMIT 30;";
$resultado_notificacao_resultado = mysqli_query($conn, $pesquisa_notificacao_resultado);

//Exclusao da Notificacao
if(isset($_GET['deletar'])){
  $id_notificacao = $_GET['deletar'];
  $excluir_notificacao = "UPDATE logs SET status = 'Inativo' WHERE id = ".$id_notificacao.";";
  $enviar_exclusao_notificacao = mysqli_query($conn, $excluir_notificacao);
  header("location:notificacoes.php");
}
?>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="blue">
      <!--
        data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">

        <a href="" class="simple-text logo-normal">
          <center><b>SUPERMERCADOS PARANAIBA</b></center>
        </a>
      </div><b>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="./painel_de_controle.php">
              <i class="now-ui-icons tech_tv"></i>
              <p>Painel de Controle</p>
            </a>
          </li>
          <li>
            <a href="./inserir.php">
              <i class="fa fa-plus"></i>
              <p>Cadastrar</p>
            </a>
          </li>
          <li>
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
              <p>IMPRIMIR PÁGINA</p>
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
            <a class="navbar-brand"> Notificações</a>
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
                <a href="notificacoes.php" class="nav-link">
                  <i class="fa fa-bell"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Notificações</span>
                    <span class="badge badge-light"><?php echo $row_notificacao['count(id)']; ?></span>
                  </p>
                </a>
              </li>
              
              <li style="cursor: pointer;" class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Mais Ações</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="conta.php">Minha Conta</a>  
                <a class="dropdown-item" href="../classes/retira_login.php">Sair</a>
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
                <h4 class="card-title"><i class="fa fa-bell-o"></i></h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                      

<section>
  <div class="container">
    <div class="row">


    <!--Loop para listar notifições-->
    <?php  while ($row_notificacao_resultado = mysqli_fetch_assoc($resultado_notificacao_resultado)){ ?>
      
      <div class="col-sm-12">
        <div class="alert fade alert-simple alert-<?php echo $row_notificacao_resultado['cor'] ?> alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show" role="alert" data-brk-library="component__alert">
          <form action="../classes/deletes/notificacao.php" method="POST">
          <a href="?deletar=<?php echo $row_notificacao_resultado["id"]?>" class="close font__size-18">
            <span  aria-hidden="true"><i class="fa fa-times danger"></i></span>
            <span class="sr-only">Fechar</span>
          </a>
          <i class="start-icon <?php echo $row_notificacao_resultado['icone'];?> animated"></i><!-- faa-bounce (animação para cima)-->
          <strong class="font__weight-semibold"><?php echo $row_notificacao_resultado['tarefa_executada'];?></strong>
          </form>
        </div>
      </div>
      
    <?php } ?>


    </div>
  </div>
</section>


                  
                </div>
              </div>
            </div>
          </div>
          

          <?php
//Carregando o final da pagina
require "../complements/end_page.php";
 ?>