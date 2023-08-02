<?php 
//Puxando Info do Usuário
include_once "../complements/inicio_php.php";

//Carregando o inicio da pagina
require "../complements/begin_page.php";

//Select para Ferias
$pesquisa_lembrete = "SELECT * FROM lembretes WHERE usuarios_id = ".$_SESSION["id_usuario_login"]['id']." AND data_desativada >= '".date('Y-m-d')."' order by data_criacao DESC;";
$resultado_lembrete = mysqli_query($conn, $pesquisa_lembrete);

//Select para recisões
$pesquisa_recisoes = "SELECT * FROM acessos_recisoes WHERE usuarios_id =".$_SESSION["id_usuario_login"]['id']." AND data_fim_aviso >= '".date('Y-m-d')."' order by data_fim_aviso limit 5;";
$resultado_recisoes = mysqli_query($conn, $pesquisa_recisoes);

?>

<body class="user-profile">
  <div class="wrapper ">
    <div class="sidebar" data-color="blue">
      <!--
         data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="" class="simple-text logo-normal">
          <CENTER><b>SUPERMERCADOS PARANAIBA</b></CENTER>
        </a>
      </div><b>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          
          
          <li class="active">
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
            <a class="navbar-brand">Painel de Controle</a>
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
                  <i class="fa fa-bell-o"></i>
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
        <div class="row"><div class="col-lg-2"></div>
          <div class="col-lg-8">
            <div class="card card-chart"><center>
              <div class="card-header">
                <h5 class="card-category"><i class="fa fa-user-secret"></i> Administrador</h5>
                <h4 class="card-title">Olá,  <?php echo $_SESSION["id_usuario_login"]['nome_completo'] ?></h4>
                <div class="chart" id="graficoProdutosAnual"></div>
              </div>
              <div class="card-footer ">
                <div class="stats">
                  <p>Hoje é <?php echo date("d/m/Y"); ?> </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">

          <div class="col-lg-4">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category"><i class="fa fa-exclamation-triangle"></i> Aviso</h5>
                <h4 class="card-title">Prazo de Rescisões Próximas</h4>
                
                <div class="chart" id="graficoVendedor">

                <?php  while ($row_recisoes = mysqli_fetch_assoc($resultado_recisoes)){ ?>
                  <?php echo $row_recisoes['id']." - ".date("d/m/Y", strtotime($row_recisoes['data_fim_aviso']))." - ".$row_recisoes['funcionario_nome_completo']." - ".$row_recisoes['empresa_nome_loja'];?> -  <br>
                <?php } ?>

                </div>
                
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="now-ui-icons loader_refresh spin"></i> Atualizando
                </div>
              </div>
            </div>
          </div>

      <?php  while ($row_lembrete = mysqli_fetch_assoc($resultado_lembrete)){ ?>

        <div class="col-lg-4">
          <div class="w3-display-container" >
            <div class="card card-chart" style="background-color:<?php echo $row_lembrete['cor'];?>;">
            
            <a href="teste.php" style="text-decoration: none;"><span class="w3-display-topright xlembrete" >&times; </span></a>
              <div style="margin-top: -30px;" class="card-header">
                <h5 style="color:black;" class="card-category"><i class="fa fa-tags"></i> Lembrete</h5>
                <h4 class="card-title"><?php echo $row_lembrete['anotacao'];?></h4>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats" style="color:black;">
                <input type="text" name="lembrete_id" style="display:none" value="<?php echo $row_lembrete['id'];?>">
                  <i  class="now-ui-icons ui-1_calendar-60"></i> <?php echo date("d/m/Y", strtotime($row_lembrete['data_criacao']));?> - 
                  <i  class="now-ui-icons ui-1_calendar-60"></i> <?php echo date("d/m/Y", strtotime($row_lembrete['data_desativada']));?>
                </div>
              </div>
            </div>
          </div>
        </div>

      <?php } ?>

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
  
</body>

<script src="assets/lib/jquery.min.js"></script>
<script src="assets/lib/bootstrap.min.js"></script>
<script src="assets/lib/raphael.min.js"></script>
<script src="assets/lib/morris.min.js"></script>

<script>
    $(function () {
        var data4 = {};

        $.ajax({
            url: "../inc/dados_grafico_vendedor.php",
            async: false,
            dataType: 'json',
            success: function(data) {
                data4 = data;
            }
        });

        var bar = new Morris.Bar({
            element: 'bar-chart',
            resize: true,
            data: data4,
            barColors: ['#5F9EA0', '#cd5c5c', '#778899', '#ff4500', '8b4513'],
            xkey: 'eixoX',
            ykeys: ['a', 'b','c','d','e'],
            labels: ['a)', 'b)', 'c)', 'd)', 'e)'],
            hideHover: 'auto'
        });

    });
</script>

</html>