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
$limite = 100;

//Declarando Variavel
$recisao_status_funcionario = "";


//Select para paginacao
$pesquisa_recisoes2 = "SELECT count(id) FROM acessos_recisoes WHERE usuarios_id =".$_SESSION["id_usuario_login"]['id'];

//Select para recisões
$pesquisa_recisoes = "SELECT * FROM acessos_recisoes WHERE usuarios_id =".$_SESSION["id_usuario_login"]['id'];

//Verifica se Filtrou a pesquisa
  $pesquisa_recisoes .= " AND (1=1)";
  $pesquisa_recisoes2 .= " AND (1=1)";


  //Verifica se utilizou o filtro MOTIVO
  //Caso nao exista a sessao receberá o input, caso o input nao seja enviado nao recebe nada
  if(empty($_SESSION['recisao_motivo'])){
    if(isset($_POST['recisao_motivo'])){
      $recisao_motivo = $_POST['recisao_motivo'];
      $pesquisa_recisoes .= " AND motivo = '".$recisao_motivo."'";
      $pesquisa_recisoes2 .= " AND motivo = '".$recisao_motivo."'";
      $_SESSION['recisao_motivo'] = $_POST['recisao_motivo'];
    }
  //Existe sessao, mas antes de pegar ela verifica se recebeu algo do input. Prioridade é o input
  }else{
    if(isset($_POST['recisao_motivo'])){
      $recisao_motivo = $_POST['recisao_motivo'];
      $pesquisa_recisoes .= " AND motivo = '".$recisao_motivo."'";
      $pesquisa_recisoes2 .= " AND motivo = '".$recisao_motivo."'";
      $_SESSION['recisao_motivo'] = $_POST['recisao_motivo'];
    }else{
      $recisao_motivo = $_SESSION['recisao_motivo'];
      $pesquisa_recisoes .= " AND motivo = '".$recisao_motivo."'";
      $pesquisa_recisoes2 .= " AND motivo = '".$recisao_motivo."'";
    }
  }

  //Verifica se utilizou o filtro Funcionario
  //Caso nao exista a sessao receberá o input, caso o input nao seja enviado nao recebe nada
  if(empty($_SESSION['recisao_funcionario'])){
    if(isset($_POST['recisao_funcionario'])){
      $recisao_funcionario = $_POST['recisao_funcionario'];
      $pesquisa_recisoes .= " AND funcionarios_id = '".$recisao_funcionario."'";
      $pesquisa_recisoes2 .= " AND funcionarios_id = '".$recisao_funcionario."'";
      $_SESSION['recisao_funcionario'] = $_POST['recisao_funcionario'];
    }
  //Existe sessao, mas antes de pegar ela verifica se recebeu algo do input. Prioridade é o input
  }else{
    if(isset($_POST['recisao_funcionario'])){
      $recisao_funcionario = $_POST['recisao_funcionario'];
      $pesquisa_recisoes .= " AND funcionarios_id = '".$recisao_funcionario."'";
      $pesquisa_recisoes2 .= " AND funcionarios_id = '".$recisao_funcionario."'";
      $_SESSION['recisao_funcionario'] = $_POST['recisao_funcionario'];
    }else{
      $recisao_funcionario = $_SESSION['recisao_funcionario'];
      $pesquisa_recisoes .= " AND funcionarios_id = '".$recisao_funcionario."'";
      $pesquisa_recisoes2 .= " AND funcionarios_id = '".$recisao_funcionario."'";
    }
  }


  //Verifica se utilizou o filtro Empresa
  //Caso nao exista a sessao receberá o input, caso o input nao seja enviado nao recebe nada
  if(empty($_SESSION['recisao_loja'])){
    if(isset($_POST['recisao_loja'])){
      $recisao_loja = $_POST['recisao_loja'];
      $pesquisa_recisoes .= " AND empresas_id = '".$recisao_loja."'";
      $pesquisa_recisoes2 .= " AND empresas_id = '".$recisao_loja."'";
      $_SESSION['recisao_loja'] = $_POST['recisao_loja'];
    }
  //Existe sessao, mas antes de pegar ela verifica se recebeu algo do input. Prioridade é o input
  }else{
    if(isset($_POST['recisao_loja'])){
      $recisao_loja = $_POST['recisao_loja'];
      $pesquisa_recisoes .= " AND empresas_id = '".$recisao_loja."'";
      $pesquisa_recisoes2 .= " AND empresas_id = '".$recisao_loja."'";
      $_SESSION['recisao_loja'] = $_POST['recisao_loja'];
    }else{
      $recisao_loja = $_SESSION['recisao_loja'];
      $pesquisa_recisoes .= " AND empresas_id = '".$recisao_loja."'";
      $pesquisa_recisoes2 .= " AND empresas_id = '".$recisao_loja."'";
    }
  }

    //Caso nao exista a sessao receberá o input, caso o input nao seja enviado nao recebe nada
    if(empty($_SESSION['recisao_status_funcionario'])){
      if(isset($_POST['recisao_status_funcionario'])){
        $recisao_status_funcionario = $_POST['recisao_status_funcionario'];
        $pesquisa_recisoes .= " AND status_funcionario = '".$recisao_status_funcionario."'";
        $pesquisa_recisoes2 .= " AND status_funcionario = '".$recisao_status_funcionario."'";
        $_SESSION['recisao_status_funcionario'] = $_POST['recisao_status_funcionario'];
      }
    //Existe sessao, mas antes de pegar ela verifica se recebeu algo do input. Prioridade é o input
    }else{
      if(isset($_POST['recisao_status_funcionario'])){
        $recisao_status_funcionario = $_POST['recisao_status_funcionario'];
        $pesquisa_recisoes .= " AND status_funcionario = '".$recisao_status_funcionario."'";
        $pesquisa_recisoes2 .= " AND status_funcionario = '".$recisao_status_funcionario."'";
        $_SESSION['recisao_status_funcionario'] = $_POST['recisao_status_funcionario'];
      }else{
        $recisao_status_funcionario = $_SESSION['recisao_status_funcionario'];
        $pesquisa_recisoes .= " AND status_funcionario = '".$recisao_status_funcionario."'";
        $pesquisa_recisoes2 .= " AND status_funcionario = '".$recisao_status_funcionario."'";
      }
    }

    //Caso nao exista a sessao receberá o input, caso o input nao seja enviado nao recebe nada
    if(empty($_SESSION['recisao_quantidade_itens'])){
      if(isset($_POST['recisao_quantidade_itens'])){
        $recisao_quantidade_itens = $_POST['recisao_quantidade_itens'];
        $limite = $recisao_quantidade_itens;
        $_SESSION['recisao_quantidade_itens'] = $_POST['recisao_quantidade_itens'];
      }
    //Existe sessao, mas antes de pegar ela verifica se recebeu algo do input. Prioridade é o input
    }else{
      if(isset($_POST['recisao_quantidade_itens'])){
        $recisao_quantidade_itens = $_POST['recisao_quantidade_itens'];
        $limite = $recisao_quantidade_itens;
        $_SESSION['recisao_quantidade_itens'] = $_POST['recisao_quantidade_itens'];
      }else{
        $recisao_quantidade_itens = $_SESSION['recisao_quantidade_itens'];
        $limite = $recisao_quantidade_itens;
      }
    }


  //Verifica se utilizou o filtro Data INICIO e FIM
    //Caso nao exista a sessao receberá o input, caso o input nao seja enviado nao recebe nada
    if(empty($_SESSION['recisao_data_inicio_do_fim_do_aviso']) && empty($_SESSION['recisao_data_fim_do_fim_do_aviso'])){
      if(isset($_POST['recisao_data_inicio_do_fim_do_aviso']) && $_POST['recisao_data_inicio_do_fim_do_aviso'] != "" && isset($_POST['recisao_data_fim_do_fim_do_aviso']) && $_POST['recisao_data_fim_do_fim_do_aviso'] != ""){
        $recisao_data_inicio_do_fim_do_aviso = $_POST['recisao_data_inicio_do_fim_do_aviso']; $recisao_data_inicio_do_fim_do_aviso = Date($recisao_data_inicio_do_fim_do_aviso);
        $pesquisa_recisoes .= " AND data_prazo_pagamento BETWEEN '".$recisao_data_inicio_do_fim_do_aviso."%'";
        $pesquisa_recisoes2 .= " AND data_prazo_pagamento BETWEEN '".$recisao_data_inicio_do_fim_do_aviso."%'";
        $recisao_data_fim_do_fim_do_aviso = $_POST['recisao_data_fim_do_fim_do_aviso']; $recisao_data_fim_do_fim_do_aviso = Date($recisao_data_fim_do_fim_do_aviso);
        $pesquisa_recisoes .= " AND '".$recisao_data_fim_do_fim_do_aviso."%'";
        $pesquisa_recisoes2 .= " AND '".$recisao_data_fim_do_fim_do_aviso."%'";
        $_SESSION['recisao_data_inicio_do_fim_do_aviso'] = $_POST['recisao_data_inicio_do_fim_do_aviso'];
        $_SESSION['recisao_data_fim_do_fim_do_aviso'] = $_POST['recisao_data_fim_do_fim_do_aviso'];
      }
    //Existe sessao, mas antes de pegar ela verifica se recebeu algo do input. Prioridade é o input
    }else{
      if(isset($_POST['recisao_data_inicio_do_fim_do_aviso']) && $_POST['recisao_data_inicio_do_fim_do_aviso'] != "" && isset($_POST['recisao_data_fim_do_fim_do_aviso']) && $_POST['recisao_data_fim_do_fim_do_aviso'] != ""){
        $recisao_data_inicio_do_fim_do_aviso = $_POST['recisao_data_inicio_do_fim_do_aviso']; $recisao_data_inicio_do_fim_do_aviso = Date($recisao_data_inicio_do_fim_do_aviso);
        $pesquisa_recisoes .= " AND data_prazo_pagamento BETWEEN '".$recisao_data_inicio_do_fim_do_aviso."%'";
        $pesquisa_recisoes2 .= " AND data_prazo_pagamento BETWEEN '".$recisao_data_inicio_do_fim_do_aviso."%'";
        $recisao_data_fim_do_fim_do_aviso = $_POST['recisao_data_fim_do_fim_do_aviso']; $recisao_data_fim_do_fim_do_aviso = Date($recisao_data_fim_do_fim_do_aviso);
        $pesquisa_recisoes .= " AND '".$recisao_data_fim_do_fim_do_aviso."%'";
        $pesquisa_recisoes2 .= " AND '".$recisao_data_fim_do_fim_do_aviso."%'";
        $_SESSION['recisao_data_inicio_do_fim_do_aviso'] = $_POST['recisao_data_inicio_do_fim_do_aviso'];
        $_SESSION['recisao_data_fim_do_fim_do_aviso'] = $_POST['recisao_data_fim_do_fim_do_aviso'];
      }
      else if (!empty($_SESSION['recisao_data_inicio_do_fim_do_aviso']) && !empty($_SESSION['recisao_data_fim_do_fim_do_aviso'])){
        $recisao_data_inicio_do_fim_do_aviso = $_SESSION['recisao_data_inicio_do_fim_do_aviso'];
        $recisao_data_fim_do_fim_do_aviso = $_SESSION['recisao_data_fim_do_fim_do_aviso'];
        $pesquisa_recisoes .= " AND data_prazo_pagamento BETWEEN '".$recisao_data_inicio_do_fim_do_aviso."%'";
        $pesquisa_recisoes2 .= " AND data_prazo_pagamento BETWEEN '".$recisao_data_inicio_do_fim_do_aviso."%'";
        $pesquisa_recisoes .= " AND '".$recisao_data_fim_do_fim_do_aviso."%'";
        $pesquisa_recisoes2 .= " AND '".$recisao_data_fim_do_fim_do_aviso."%'";
      }
    }



    
    
    //Verifica se utilizou o filtro Data INICIO
    //Caso nao exista a sessao receberá o input, caso o input nao seja enviado nao recebe nada
    if(empty($_SESSION['recisao_data_inicio_do_fim_do_aviso'])){
      if(isset($_POST['recisao_data_inicio_do_fim_do_aviso']) && $_POST['recisao_data_inicio_do_fim_do_aviso'] != "" && $_POST['recisao_data_fim_do_fim_do_aviso'] == ""){
        $recisao_data_inicio_do_fim_do_aviso = $_POST['recisao_data_inicio_do_fim_do_aviso'];
        $pesquisa_recisoes .= " AND data_prazo_pagamento >= '".$recisao_data_inicio_do_fim_do_aviso."%'";
        $pesquisa_recisoes2 .= " AND data_prazo_pagamento >= '".$recisao_data_inicio_do_fim_do_aviso."%'";
        $_SESSION['recisao_data_inicio_do_fim_do_aviso'] = $_POST['recisao_data_inicio_do_fim_do_aviso'];
      }
    //Existe sessao, mas antes de pegar ela verifica se recebeu algo do input. Prioridade é o input
    }else{
      if(isset($_POST['recisao_data_inicio_do_fim_do_aviso']) && $_POST['recisao_data_inicio_do_fim_do_aviso'] != "" && $_POST['recisao_data_fim_do_fim_do_aviso'] == ""){
        $recisao_data_inicio_do_fim_do_aviso = $_POST['recisao_data_inicio_do_fim_do_aviso'];
        $pesquisa_recisoes .= " AND data_prazo_pagamento >= '".$recisao_data_inicio_do_fim_do_aviso."%'";
        $pesquisa_recisoes2 .= " AND data_prazo_pagamento >= '".$recisao_data_inicio_do_fim_do_aviso."%'";
        $_SESSION['recisao_data_inicio_do_fim_do_aviso'] = $_POST['recisao_data_inicio_do_fim_do_aviso'];
      }else if(empty($recisao_data_inicio_do_fim_do_aviso)){
        $recisao_data_inicio_do_fim_do_aviso = $_SESSION['recisao_data_inicio_do_fim_do_aviso'];
        $pesquisa_recisoes .= " AND data_prazo_pagamento >= '".$recisao_data_inicio_do_fim_do_aviso."%'";
        $pesquisa_recisoes2 .= " AND data_prazo_pagamento >= '".$recisao_data_inicio_do_fim_do_aviso."%'";
      }
    }




    //Verifica se utilizou o filtro Data FIM
    //Caso nao exista a sessao receberá o input, caso o input nao seja enviado nao recebe nada
    if(empty($_SESSION['recisao_data_fim_do_fim_do_aviso'])){
      if(isset($_POST['recisao_data_fim_do_fim_do_aviso']) && $_POST['recisao_data_fim_do_fim_do_aviso'] != "" && $_POST['recisao_data_inicio_do_fim_do_aviso'] == ""){
        $recisao_data_fim_do_fim_do_aviso = $_POST['recisao_data_fim_do_fim_do_aviso'];
        $pesquisa_recisoes .= " AND data_prazo_pagamento <= '".$recisao_data_fim_do_fim_do_aviso."%'";
        $pesquisa_recisoes2 .= " AND data_prazo_pagamento <= '".$recisao_data_fim_do_fim_do_aviso."%'";
        $_SESSION['recisao_data_fim_do_fim_do_aviso'] = $_POST['recisao_data_fim_do_fim_do_aviso'];
      }
    //Existe sessao, mas antes de pegar ela verifica se recebeu algo do input. Prioridade é o input
    }else{
      if(isset($_POST['recisao_data_fim_do_fim_do_aviso']) && $_POST['recisao_data_fim_do_fim_do_aviso'] != "" && $_POST['recisao_data_inicio_do_fim_do_aviso'] == ""){
        $recisao_data_fim_do_fim_do_aviso = $_POST['recisao_data_fim_do_fim_do_aviso'];
        $pesquisa_recisoes .= " AND data_prazo_pagamento <= '".$recisao_data_fim_do_fim_do_aviso."%'";
        $pesquisa_recisoes2 .= " AND data_prazo_pagamento <= '".$recisao_data_fim_do_fim_do_aviso."%'";
        $_SESSION['recisao_data_fim_do_fim_do_aviso'] = $_POST['recisao_data_fim_do_fim_do_aviso'];
      }else if(empty($recisao_data_fim_do_fim_do_aviso)){
        $recisao_data_fim_do_fim_do_aviso = $_SESSION['recisao_data_fim_do_fim_do_aviso'];
        $pesquisa_recisoes .= " AND data_prazo_pagamento <= '".$recisao_data_fim_do_fim_do_aviso."%'";
        $pesquisa_recisoes2 .= " AND data_prazo_pagamento <= '".$recisao_data_fim_do_fim_do_aviso."%'";
      }
    }


//Evitar de Filtro Demitido, a nao ser que filtre por ele.
if($recisao_status_funcionario != "Demitido"){
  //Acrescimos ao select
  $pesquisa_recisoes .= " AND status_funcionario != 'demitido'";
  $pesquisa_recisoes2 .= " AND status_funcionario != 'demitido'";
}



//Select para paginacao
$resultado_recisoes2 = mysqli_query($conn, $pesquisa_recisoes2);
$row_recisoes2 = mysqli_fetch_assoc($resultado_recisoes2);
//PAGINACAO
$paginas = ceil($row_recisoes2['count(id)'] / $limite);
//PAGINACAO
$inicio = ($pagina * $limite) - $limite;



//Acrescimos ao select
$pesquisa_recisoes .= " order by data_prazo_pagamento DESC LIMIT ".$inicio.", ".$limite;
//Executa o Select
$resultado_recisoes = mysqli_query($conn, $pesquisa_recisoes);

?>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="red">
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
            <a href="./lembretes.php">
              <i class="fa fa-tags"></i>
              <p>Lembretes</p>
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
          <li class="active ">
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
            <a class="navbar-brand"> Rescisões</a>
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
              <div class="card-header">
              <center>
                <form action="rescisoes.php" method="POST">
                <h4 class="card-title"> <i class="fa fa-list"></i><b> Listagem de Rescisões</b></h4></center>
                <h6><i class="fa fa-sliders"></i> Filtro</h6>
                <div class="row">
                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Data Inicial</label>
                        <input type="date" name="recisao_data_inicio_do_fim_do_aviso" class="form-control" >
                      </div>
                    </div>

                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Data Final</label>
                        <input type="date" name="recisao_data_fim_do_fim_do_aviso" class="form-control" >
                      </div>
                    </div>


                    <div class="col-md-2 ">
                      <div class="form-group">
                        <label>Selecionar Loja</label>
                        <select name="recisao_loja" id="recisao_loja" class="form-control">
                        <option value="" data-default disabled selected></option>
                        <!-- Inicio de uma codição PHP -->
                        <?php 
                        $id_empresa_selecionado = 0;
                        require "../complements/selects/select_empresa_editar.php";
                        
                        ?>
                        <!-- Fim de uma codição PHP -->
                        </select>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Selecionar Funcionário</label>
                        <select name="recisao_funcionario" id="recisao_funcionario" class="form-control">
                        <option value="0"  selected disabled>Antes selecione a loja...</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Motivo</label>
                        <select name="recisao_motivo" class="form-control">
                        <option value="" data-default disabled selected></option>
                          <!-- Inicio de uma codição PHP -->
                        <?php 

                        require "../complements/selects/select_motivo_recisao_editar.php";
                        
                        ?>
                        <!-- Fim de uma codição PHP -->
                        </select>
                      </div>
                    </div>

                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Status Funcionário</label>
                        <select name="recisao_status_funcionario" class="form-control">
                        <option value="" data-default disabled selected></option>
                        <!-- Inicio de uma codição PHP -->
                        <?php 
                        require "../complements/selects/select_status.php";
                        
                        ?>
                        <!-- Fim de uma codição PHP -->
                        </select>
                      </div>
                    </div>

                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Quantidade de Itens</label>
                        <select name="recisao_quantidade_itens" id="recisao_quantidade_itens" class="form-control">
                        <option value="" data-default disabled selected></option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                        <option value="500">500</option>
                        <option value="1000">1.000</option>
                        <option value="5000">5.000</option>
                        <option value="10000">10.000</option>
                        </select>
                      </div>
                    </div>

                  <div class="col-md-2">
                      <div class="form-group"><br>
                        <button type="submit" name="filtrar" class="btn btn-outline-info btn-100"><b><i class="fa fa-search"></i> Buscar</b></button><br>
                      </div>
                  </div>
                  </form>

                  <div class="col-md-2">
                      <form action="../classes/limpa_filtro_recisao.php" method="post">
                          <div class="form-group"><br>
                            <button act type="submit" name="limpar_filtro" class="btn btn-outline-info btn-100" ><b><i class="fa fa-refresh"></i> Limpar Filtro</b></button>
                          </div>
                      </form>  
                  </div>

                    <div class="col-md-2">
                      <div class="form-group"><br>
                        <button title="Exportar Tabela para Arquivo Excel" type="submit" id="btnExcel" name="filtrar" class="btn btn-success btn-100"><b><i class="fa fa-download"></i> Excel</b></button>
                      </div>
                  </div>
                   

             </div>

              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <div id="divTabela" >
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        Funcionário
                      </th>
                      <th>
                        Loja
                      </th>
                      <th>
                        Motivo
                      </th>
                      <th>
                        Data
                      </th>
                      <th>
                        Tipo
                      </th>
                      <th>
                        Exame Demissional
                      </th>
                      <th>
                        Data Prazo de Pagamento
                      </th>
                      <th>
                        Data Inicio de Aviso
                      </th>
                      <th>
                        Data Final de Aviso
                      </th>
                      <th>
                        Status
                      </th>
                      <th>
                        Observação
                      </th>
                      <th>
                       
                      </th>
                    </thead>
                    <tbody>
                    <?php  while ($row_recisoes = mysqli_fetch_assoc($resultado_recisoes)){ ?>
                      <tr>
                        <td>
                          <?php echo $row_recisoes['funcionario_nome_completo'];?>
                        </td>
                        <td>
                          <?php echo $row_recisoes['empresa_nome_loja'];?>
                        </td>
                        <td>
                          <?php echo $row_recisoes['motivo'];?>
                        </td>
                        <td>
                          <?php echo date("d/m/Y", strtotime($row_recisoes['data_criacao']));?>
                        </td>
                        <td>
                          <?php echo $row_recisoes['tipo'];?>
                        </td>
                        <td>
                          <?php echo $row_recisoes['exame_demissional'];?>
                        </td>
                        <td>
                          <?php echo date("d/m/Y", strtotime($row_recisoes['data_prazo_pagamento']));?>
                        </td>
                        <td>
                          <?php echo date("d/m/Y", strtotime($row_recisoes['data_inicio_aviso']));?>
                        </td>
                        <td>
                          <?php echo date("d/m/Y", strtotime($row_recisoes['data_fim_aviso']));?>
                        </td>
                        <td>
                          <?php echo $row_recisoes['status'];?>
                        </td>
                        <td>
                          <?php echo $row_recisoes['observacao'];?>
                        </td>
                    </div>
                        <td>
                        <form action="editar-rescisoes.php" method="POST">
                            <button class="btn btn-primary btn-sm" title="Editar"><i class=" fa fa-edit"></i></button>
                            <input type="text" name="id_item_selecionado" style="display:none" value="<?php echo $row_recisoes['id'];?>">
                            <input type="text" name="id_funcionario_selecionado" style="display:none" value="<?php echo $row_recisoes['funcionarios_id'];?>">
                            <input type="text" name="id_empresa_selecionado" style="display:none" value="<?php echo $row_recisoes['empresas_id'];?>">
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
                        <a class="page-link" href="?pagina=<?=$pagina-1?>"><i class="fa fa-arrow-left"></i></a>
                         <?php endif; ?></li>
                      <li class="page-item active"><a class="page-link"> <?=$pagina?></a></li>
                      <li class="page-item">
                      <?php if($pagina<$paginas): ?>
                        <a class="page-link" href="?pagina=<?=$pagina+1?>"><i class="fa fa-arrow-right"></i></a>
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

              a.download = "Rescisões";

               a.click();

                });

           });

 </script>

<!--Selecionando Funcionarios de acordo a empresa selecionada-->
<script src="../js/recisao.js"></script>

      <?php
//Carregando o final da pagina
require "../complements/end_page.php";
 ?>
      