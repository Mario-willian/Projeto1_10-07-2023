<?php 
//Puxando Info do Usuário
include_once "../complements/inicio_php.php";

//Carregando o inicio da pagina
require "../complements/begin_page.php";

//PAGINACAO
$pagina = 1;
if(isset($_GET['pagina'])){
  $pagina = filter_input(INPUT_GET, "pagina", FILTER_VALIDATE_INT);
}
if(!$pagina){
  $pagina = 1;
}
$limite = 10;
$inicio = ($pagina * $limite) - $limite;


//Select para paginacao
$pesquisa_ferias2 = "SELECT count(id) FROM acessos_ferias WHERE usuarios_id =".$_SESSION["id_usuario_login"]['id'];

//Select para Ferias
$pesquisa_ferias = "SELECT * FROM acessos_ferias WHERE usuarios_id =".$_SESSION["id_usuario_login"]['id'];

//Verifica se Filtrou a pesquisa
  $pesquisa_ferias .= " AND (1=1)";
  $pesquisa_ferias2 .= " AND (1=1)";

  //Caso nao exista a sessao receberá o input, caso o input nao seja enviado nao recebe nada
  if(empty($_SESSION['ferias_funcionario'])){
    if(isset($_POST['ferias_funcionario'])){
      $ferias_funcionario = $_POST['ferias_funcionario'];
      $pesquisa_ferias .= " AND funcionarios_id = '".$ferias_funcionario."'";
      $pesquisa_ferias2 .= " AND funcionarios_id = '".$ferias_funcionario."'";
      $_SESSION['ferias_funcionario'] = $_POST['ferias_funcionario'];
    }
  //Existe sessao, mas antes de pegar ela verifica se recebeu algo do input. Prioridade é o input
  }else{
    if(isset($_POST['ferias_funcionario'])){
      $ferias_funcionario = $_POST['ferias_funcionario'];
      $pesquisa_ferias .= " AND funcionarios_id = '".$ferias_funcionario."'";
      $pesquisa_ferias2 .= " AND funcionarios_id = '".$ferias_funcionario."'";
      $_SESSION['ferias_funcionario'] = $_POST['ferias_funcionario'];
    }else{
      $ferias_funcionario = $_SESSION['ferias_funcionario'];
      $pesquisa_ferias .= " AND funcionarios_id = '".$ferias_funcionario."'";
      $pesquisa_ferias2 .= " AND funcionarios_id = '".$ferias_funcionario."'";
    }
  }

  //Caso nao exista a sessao receberá o input, caso o input nao seja enviado nao recebe nada
  if(empty($_SESSION['ferias_loja'])){
    if(isset($_POST['ferias_loja'])){
      $ferias_loja = $_POST['ferias_loja'];
      $pesquisa_ferias .= " AND empresas_id = '".$ferias_loja."'";
      $pesquisa_ferias2 .= " AND empresas_id = '".$ferias_loja."'";
      $_SESSION['ferias_loja'] = $_POST['ferias_loja'];
    }
  //Existe sessao, mas antes de pegar ela verifica se recebeu algo do input. Prioridade é o input
  }else{
    if(isset($_POST['ferias_loja'])){
      $ferias_loja = $_POST['ferias_loja'];
      $pesquisa_ferias .= " AND empresas_id = '".$ferias_loja."'";
      $pesquisa_ferias2 .= " AND empresas_id = '".$ferias_loja."'";
      $_SESSION['ferias_loja'] = $_POST['ferias_loja'];
    }else{
      $ferias_loja = $_SESSION['ferias_loja'];
      $pesquisa_ferias .= " AND empresas_id = '".$ferias_loja."'";
      $pesquisa_ferias2 .= " AND empresas_id = '".$ferias_loja."'";
    }
  }


  /*
  //DATA
  //Caso nao exista a sessao receberá o input, caso o input nao seja enviado nao recebe nada
  if(empty($_SESSION['ferias_data_inicio']) && empty($_SESSION['ferias_data_fim'])){
    if(isset($_POST['ferias_data_inicio']) && $_POST['ferias_data_inicio'] != "" && isset($_POST['ferias_data_fim']) && $_POST['ferias_data_fim'] != ""){
      $ferias_data = $_POST['ferias_data_inicio']; $ferias_data = Date($ferias_data);
      $pesquisa_ferias .= " AND data_inicio BETWEEN '".$ferias_data."'";
      $pesquisa_ferias2 .= " AND data_inicio BETWEEN '".$ferias_data."'";
      $ferias_data_fim = $_POST['ferias_data_fim']; $ferias_data_fim = Date($ferias_data_fim);
      $pesquisa_ferias .= " AND '".$ferias_data_fim."'";
      $pesquisa_ferias2 .= " AND '".$ferias_data_fim."'";
      $_SESSION['ferias_data_inicio'] = $_POST['ferias_data_inicio']; $ferias_data = Date($ferias_data);
      $_SESSION['ferias_data_fim'] = $_POST['ferias_data_fim']; $ferias_data_fim = Date($ferias_data_fim);
    }
  //Existe sessao, mas antes de pegar ela verifica se recebeu algo do input. Prioridade é o input
  }else{
    if(isset($_POST['ferias_data_inicio']) && $_POST['ferias_data_inicio'] != "" && isset($_POST['ferias_data_fim']) && $_POST['ferias_data_fim'] != ""){
      $ferias_data = $_POST['ferias_data_inicio']; $ferias_data = Date($ferias_data);
      $pesquisa_ferias .= " AND data_inicio BETWEEN '".$ferias_data."'";
      $pesquisa_ferias2 .= " AND data_inicio BETWEEN '".$ferias_data."'";
      $ferias_data_fim = $_POST['ferias_data_fim']; $ferias_data_fim = Date($ferias_data_fim);
      $pesquisa_ferias .= " AND '".$ferias_data_fim."'";
      $pesquisa_ferias2 .= " AND '".$ferias_data_fim."'";
      $_SESSION['ferias_data_inicio'] = $_POST['ferias_data_inicio']; $ferias_data = Date($ferias_data);
      $_SESSION['ferias_data_fim'] = $_POST['ferias_data_fim']; $ferias_data_fim = Date($ferias_data_fim);
    }else{
      $ferias_data = $_SESSION['ferias_data_inicio'];
      $ferias_data_fim = $_SESSION['ferias_data_fim'];
      $pesquisa_ferias .= " AND data_inicio BETWEEN '".$ferias_data."'";
      $pesquisa_ferias2 .= " AND data_inicio BETWEEN '".$ferias_data."'";
      $pesquisa_ferias .= " AND '".$ferias_data_fim."'";
      $pesquisa_ferias2 .= " AND '".$ferias_data_fim."'";
    }
  }

  //DATA INICIO
  //Caso nao exista a sessao receberá o input, caso o input nao seja enviado nao recebe nada
  if(empty($_SESSION['ferias_data_inicio'])){
    if(isset($_POST['ferias_data_inicio']) && $_POST['ferias_data_inicio'] != "" && $_POST['ferias_data_fim'] == ""){
      $ferias_data = $_POST['ferias_data_inicio']; $ferias_data = Date($ferias_data);
      $pesquisa_ferias .= " AND data_inicio >= '".$ferias_data."'";
      $pesquisa_ferias2 .= " AND data_inicio >= '".$ferias_data."'";
      $_SESSION['ferias_data_inicio'] = $_POST['ferias_data_inicio']; $ferias_data = Date($ferias_data);
    }
  //Existe sessao, mas antes de pegar ela verifica se recebeu algo do input. Prioridade é o input
  }else{
    if(isset($_POST['ferias_data_inicio']) && $_POST['ferias_data_inicio'] != "" && $_POST['ferias_data_fim'] == ""){
      $ferias_data = $_POST['ferias_data_inicio']; $ferias_data = Date($ferias_data);
      $pesquisa_ferias .= " AND data_inicio >= '".$ferias_data."'";
      $pesquisa_ferias2 .= " AND data_inicio >= '".$ferias_data."'";
      $_SESSION['ferias_data_inicio'] = $_POST['ferias_data_inicio']; $ferias_data = Date($ferias_data);
    }else{
      $ferias_data = $_SESSION['ferias_loja'];
      $pesquisa_ferias .= " AND data_inicio >= '".$ferias_data."'";
      $pesquisa_ferias2 .= " AND data_inicio >= '".$ferias_data."'";
    }
  }


  //DATA FIM
  //Caso nao exista a sessao receberá o input, caso o input nao seja enviado nao recebe nada
  if(empty($_SESSION['ferias_data_fim'])){
    if(isset($_POST['ferias_data_fim']) && $_POST['ferias_data_fim'] != "" && $_POST['ferias_data_inicio'] == ""){
    $ferias_data_fim = $_POST['ferias_data_fim']; $ferias_data_fim = Date($ferias_data_fim);
    $pesquisa_ferias .= " AND data_fim <= '".$ferias_data_fim."'";
    $pesquisa_ferias2 .= " AND data_fim <= '".$ferias_data_fim."'";
    $_SESSION['ferias_data_fim'] = $_POST['ferias_data_fim']; $ferias_data_fim = Date($ferias_data_fim);
    }
  //Existe sessao, mas antes de pegar ela verifica se recebeu algo do input. Prioridade é o input
  }else{
    if(isset($_POST['ferias_data_fim']) && $_POST['ferias_data_fim'] != "" && $_POST['ferias_data_inicio'] == ""){
    $ferias_data_fim = $_POST['ferias_data_fim']; $ferias_data_fim = Date($ferias_data_fim);
    $pesquisa_ferias .= " AND data_fim <= '".$ferias_data_fim."'";
    $pesquisa_ferias2 .= " AND data_fim <= '".$ferias_data_fim."'";
    $_SESSION['ferias_data_fim'] = $_POST['ferias_data_fim']; $ferias_data_fim = Date($ferias_data_fim);
    }else{
    $ferias_data = $_SESSION['ferias_data_fim'];
    $pesquisa_ferias .= " AND data_fim <= '".$ferias_data_fim."'";
    $pesquisa_ferias2 .= " AND data_fim <= '".$ferias_data_fim."'";
    }
  }
*/


  //Verifica se utilizou o filtro DATA Inico e Fim
  if(isset($_POST['ferias_data_inicio']) && $_POST['ferias_data_inicio'] != "" && isset($_POST['ferias_data_fim']) && $_POST['ferias_data_fim'] != ""){
    $ferias_data = $_POST['ferias_data_inicio']; $ferias_data = Date($ferias_data);
    $pesquisa_ferias .= " AND data_inicio BETWEEN '".$ferias_data."'";
    $pesquisa_ferias2 .= " AND data_inicio BETWEEN '".$ferias_data."'";
    $ferias_data_fim = $_POST['ferias_data_fim']; $ferias_data_fim = Date($ferias_data_fim);
    $pesquisa_ferias .= " AND '".$ferias_data_fim."'";
    $pesquisa_ferias2 .= " AND '".$ferias_data_fim."'";
  }
  //Verifica se utilizou o filtro DATA Inico
  if(isset($_POST['ferias_data_inicio']) && $_POST['ferias_data_inicio'] != "" && $_POST['ferias_data_fim'] == ""){
    $ferias_data = $_POST['ferias_data_inicio']; $ferias_data = Date($ferias_data);
    $pesquisa_ferias .= " AND data_inicio >= '".$ferias_data."'";
    $pesquisa_ferias2 .= " AND data_inicio >= '".$ferias_data."'";
  }

  //Verifica se utilizou o filtro DATA Fim
  if(isset($_POST['ferias_data_fim']) && $_POST['ferias_data_fim'] != "" && $_POST['ferias_data_inicio'] == ""){
    $ferias_data_fim = $_POST['ferias_data_fim']; $ferias_data_fim = Date($ferias_data_fim);
    $pesquisa_ferias .= " AND data_fim <= '".$ferias_data_fim."'";
    $pesquisa_ferias2 .= " AND data_fim <= '".$ferias_data_fim."'";
  }

//Acrescimos ao select
$pesquisa_ferias .= " order by data_criacao DESC LIMIT ".$inicio.", ".$limite;
//Executa o Select
$resultado_ferias = mysqli_query($conn, $pesquisa_ferias);

//Select para paginacao
$resultado_ferias2 = mysqli_query($conn, $pesquisa_ferias2);
$row_ferias2 = mysqli_fetch_assoc($resultado_ferias2);
//PAGINACAO
$paginas = ceil($row_ferias2['count(id)'] / $limite);



?>
<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="yellow">
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
          <li class="active ">
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
            <a class="navbar-brand"> Férias</a>
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
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header"><center>
              <form action="ferias.php" method="POST">
                <h4 class="card-title"> <i class="fa fa-list"></i><b> Listagem de Férias</b></h4></center>
                <h6><i class="fa fa-sliders"></i> Filtro</h6>
                <div class="row">
                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Data Inicial</label>
                        <input type="date" name="ferias_data_inicio" class="form-control" >
                      </div>
                    </div>

                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Data Final</label>
                        <input type="date" name="ferias_data_fim" class="form-control" >
                      </div>
                    </div>
                
                    <div class="col-md-2 ">
                      <div class="form-group">
                        <label>Selecionar Loja</label>
                        <select name="ferias_loja" id="ferias_loja" class="form-control">
                        <option value="" data-default disabled selected></option>
                        <!-- Inicio de uma codição PHP -->
                        <?php 
                        $id_funcionario_selecionado = 0;
                        require "../complements/selects/select_empresa_editar.php";
                        
                        ?>
                        <!-- Fim de uma codição PHP -->
                        </select>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Selecionar Funcionário</label>
                        <select name="ferias_funcionario" id="ferias_funcionario" class="form-control">
                        <option value="0"  selected disabled>Antes selecione a loja...</option>
                        </select>
                      </div>
                    </div>
                   

                  <div class="col-md-2">
                      <div class="form-group"><br>
                        <button type="submit" name="filtrar" class="btn btn-outline-info" style="width: 100%;"><b><i class="fa fa-search"></i> Buscar</b></button>
                      </div>
                  </div>
                               
                  <div class="col-md-2">
                      <div class="form-group"><br>
                        <button title="Exportar Tabela para Arquivo Excel" type="submit" id="btnExcel" name="filtrar" class="btn btn-success" style="width: 100%;"><b><i class="fa fa-download"></i> Excel</b></button>
                      </div>
                  </div>
                  
                  <div class="col-md-2">
                      <div class="form-group"><br>
                        <button title="Exportar Tabela para Arquivo PDF" type="submit" id="btnPdf" name="filtrar" class="btn btn-danger" style="width: 100%;"><b><i class="fa fa-download"></i> PDF</b></button>
                      </div>
                  </div>
                  </form>
                  <form action="../classes/limpa_filtro_ferias.php" method="post">
                      <div class="form-group"><br>
                        <button act type="submit" name="limpar_filtro" class="btn btn-outline-info" style="width: 100%;"><b><i class="fa fa-search"></i> Limpar Filtro</b></button>
                      </div>
                  </form>     
              </div>
              <div class="card-body">
                <div id="divTabela" class="table-responsive">
                  <table id="Tab" class="table">
                    <thead class=" text-primary">
                      <th>
                        Funcionário
                      </th>
                      <th>
                        Loja
                      </th>
                      <th>
                        Data de Início
                      </th>
                      <th>
                        Data Final
                      </th>
                      <th>
                        Observação
                      </th>
                      <th>
                        Editar
                      </th>
                    </thead>
                    <tbody>
                    <?php  while ($row_ferias = mysqli_fetch_assoc($resultado_ferias)){ ?>
                      <tr>
                        <td>
                          <?php echo $row_ferias['funcionario_nome_completo'];?>
                        </td>
                        <td>
                          <?php echo $row_ferias['empresa_nome_loja'];?>
                        </td>
                        <td>
                          <?php echo date("d/m/Y", strtotime($row_ferias['data_inicio']));?>
                        </td>
                        <td>
                          <?php echo date("d/m/Y", strtotime($row_ferias['data_fim']));?>
                        </td>
                        <td>
                          <?php echo $row_ferias['observacao'];?>
                        </td>
                        
                        <td>
                          <form action="editar-ferias.php" method="POST">
                            <button class="btn btn-primary btn-sm" title="Editar"><i class=" fa fa-edit"></i></button>
                            <input type="text" name="id_item_selecionado" style="display:none" value="<?php echo $row_ferias['id'];?>">
                            <input type="text" name="id_funcionario_selecionado" style="display:none" value="<?php echo $row_ferias['funcionarios_id'];?>">
                            <input type="text" name="id_empresa_selecionado" style="display:none" value="<?php echo $row_ferias['empresas_id'];?>">
                          </form>
                        </td>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>                 
                      
                </div><br>
                <nav aria-label="Navegação de página exemplo">
                    <ul class="pagination justify-content-center">
                      <li class="page-item">
                      <a class="page-link" href="?pagina=1" tabindex="-1">Primeira</a>
                      </li>
                      <li class="page-item"> 
                        <?php if($pagina>1): ?>
                        <a class="page-link" href="?pagina=<?=$pagina-1?>"><<</a>
                         <?php endif; ?></li>
                      <li class="page-item active"><a class="page-link"> <?=$pagina?></a></li>
                      <li class="page-item">
                      <?php if($pagina<$paginas): ?>
                        <a class="page-link" href="?pagina=<?=$pagina+1?>">>></a>
                      <?php endif; ?>
                      </li>
                      <li class="page-item">
                      <a class="page-link" href="?pagina=<?=$paginas?>">Última</a>
                      </li>
                    </ul>
                  </nav> 
              </div>
            </div>
          </div>
        </div>
      </div>
   <!-- excel -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

      <script>
                          
             $(document).ready(function(){

              $("#btnExcel").click(function(e){
              /*preventDefault Serve para evitar abrir o link em uma nova página*/ 
               e.preventDefault();

                var DivTabela = document.getElementById("divTabela");
                /*\ufeff serve para ter um arquivo utf-8 sem problemas de acentuação*/
                var Arquivo = new Blob(["\ufeff" + DivTabela.outerHTML],{type:"application/vnd.ms-excel"});

                var url = window.URL.createObjectURL(Arquivo);

                  var a = document.createElement("a");
 
                    a.href = url; 

                    a.download = "Dados da Tabela Férias";

                     a.click();

                      });

                 });

       </script>

      <script>
        document.getElementById("btnPdf").addEventListener("click", GerarPdf);

        function GerarPdf(){
          

            var DivTabela = document.getElementById("divTabela").innerHTML;

            var style = "<style>";
            style = style + "table {width: 100%; font: 12px Calibri;}";
            style = style + "table, th, td {border: solid 1px #DDD; border-collapse: collapse;}";
            style = style + "padding: 2px 3px; text-align: left;";
            style = style + "</style>";   

            var win = window.open("","","height=700,width=900");

            win.document.write("<html><head>");
            win.document.write("<title>Listagem de Férias</title>");
            win.document.write(style);
            win.document.write("</head>");

            win.document.write("<body>");
            win.document.write(DivTabela);
            win.document.write("</body></html>");

            win.document.close();

            win.print();

          }
       </script>

<!--Selecionando Funcionarios de acordo a empresa selecionada-->
<script src="../js/ferias.js"></script>

<?php
//Carregando o final da pagina
require "../complements/end_page.php";
 ?>
      