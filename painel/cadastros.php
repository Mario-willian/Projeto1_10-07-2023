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
$funcionario_status = "";

//Select para Funcionarios
$pesquisa_funcionario = "SELECT * FROM acessos_funcionarios";

//Verifica se Filtrou a pesquisa
  $pesquisa_funcionario .= " WHERE (1=1)";

  //Verifica se utilizou o filtro Funcionario
  //Caso nao exista a sessao receberá o input, caso o input nao seja enviado nao recebe nada
  if(empty($_SESSION['funcionario_nome'])){
    if(isset($_POST['funcionario_nome'])){
      $funcionario_nome = $_POST['funcionario_nome'];
      $pesquisa_funcionario .= " AND nome_completo LIKE '%".$funcionario_nome."%'";
      $_SESSION['funcionario_nome'] = $_POST['funcionario_nome'];
    }
  //Existe sessao, mas antes de pegar ela verifica se recebeu algo do input. Prioridade é o input
  }else{
    if(isset($_POST['funcionario_nome'])){
      $funcionario_nome = $_POST['funcionario_nome'];
      $pesquisa_funcionario .= " AND nome_completo LIKE '%".$funcionario_nome."%'";
      $_SESSION['funcionario_nome'] = $_POST['funcionario_nome'];
    }else{
      $funcionario_nome = $_SESSION['funcionario_nome'];
      $pesquisa_funcionario .= " AND nome_completo LIKE '%".$funcionario_nome."%'";
    }
  }


  //Verifica se utilizou o filtro Setor
  //Caso nao exista a sessao receberá o input, caso o input nao seja enviado nao recebe nada
  if(empty($_SESSION['funcionario_setor'])){
    if(isset($_POST['funcionario_setor'])){
      $funcionario_setor = $_POST['funcionario_setor'];
      $pesquisa_funcionario .= " AND setor = '".$funcionario_setor."'";
      $_SESSION['funcionario_setor'] = $_POST['funcionario_setor'];
    }
  //Existe sessao, mas antes de pegar ela verifica se recebeu algo do input. Prioridade é o input
  }else{
    if(isset($_POST['funcionario_setor'])){
      $funcionario_setor = $_POST['funcionario_setor'];
      $pesquisa_funcionario .= " AND setor = '".$funcionario_setor."'";
      $_SESSION['funcionario_setor'] = $_POST['funcionario_setor'];
    }else{
      $funcionario_setor = $_SESSION['funcionario_setor'];
      $pesquisa_funcionario .= " AND setor = '".$funcionario_setor."'";
    }
  }


  //Verifica se utilizou o filtro Funcao
  //Caso nao exista a sessao receberá o input, caso o input nao seja enviado nao recebe nada
  if(empty($_SESSION['funcionario_funcao'])){
    if(isset($_POST['funcionario_funcao'])){
      $funcionario_funcao = $_POST['funcionario_funcao'];
      $pesquisa_funcionario .= " AND funcao = '".$funcionario_funcao."'";
      $_SESSION['funcionario_funcao'] = $_POST['funcionario_funcao'];
    }
  //Existe sessao, mas antes de pegar ela verifica se recebeu algo do input. Prioridade é o input
  }else{
    if(isset($_POST['funcionario_funcao'])){
      $funcionario_funcao = $_POST['funcionario_funcao'];
      $pesquisa_funcionario .= " AND funcao = '".$funcionario_funcao."'";
      $_SESSION['funcionario_funcao'] = $_POST['funcionario_funcao'];
    }else{
      $funcionario_funcao = $_SESSION['funcionario_funcao'];
      $pesquisa_funcionario .= " AND funcao = '".$funcionario_funcao."'";
    }
  }

  //Verifica se utilizou o filtro Empresa
  //Caso nao exista a sessao receberá o input, caso o input nao seja enviado nao recebe nada
  if(empty($_SESSION['funcionario_empresa'])){
    if(isset($_POST['funcionario_empresa'])){
      $funcionario_empresa = $_POST['funcionario_empresa'];
      $pesquisa_funcionario .= " AND empresas_id = '".$funcionario_empresa."'";
      $_SESSION['funcionario_empresa'] = $_POST['funcionario_empresa'];
    }
  //Existe sessao, mas antes de pegar ela verifica se recebeu algo do input. Prioridade é o input
  }else{
    if(isset($_POST['funcionario_empresa'])){
      $funcionario_empresa = $_POST['funcionario_empresa'];
      $pesquisa_funcionario .= " AND empresas_id = '".$funcionario_empresa."'";
      $_SESSION['funcionario_empresa'] = $_POST['funcionario_empresa'];
    }else{
      $funcionario_empresa = $_SESSION['funcionario_empresa'];
      $pesquisa_funcionario .= " AND empresas_id = '".$funcionario_empresa."'";
    }
  }


  //Verifica se utilizou o filtro Status
  //Caso nao exista a sessao receberá o input, caso o input nao seja enviado nao recebe nada
  if(empty($_SESSION['funcionario_status'])){
    if(isset($_POST['funcionario_status'])){
      $funcionario_status = $_POST['funcionario_status'];
      $pesquisa_funcionario .= " AND status = '".$funcionario_status."'";
      $_SESSION['funcionario_status'] = $_POST['funcionario_status'];
    }
  //Existe sessao, mas antes de pegar ela verifica se recebeu algo do input. Prioridade é o input
  }else{
    if(isset($_POST['funcionario_status'])){
      $funcionario_status = $_POST['funcionario_status'];
      $pesquisa_funcionario .= " AND status = '".$funcionario_status."'";
      $_SESSION['funcionario_status'] = $_POST['funcionario_status'];
    }else{
      $funcionario_status = $_SESSION['funcionario_status'];
      $pesquisa_funcionario .= " AND status = '".$funcionario_status."'";
    }
  }


  //Caso nao exista a sessao receberá o input, caso o input nao seja enviado nao recebe nada
  if(empty($_SESSION['funcionario_quantidade_itens'])){
    if(isset($_POST['funcionario_quantidade_itens'])){
      $funcionario_quantidade_itens = $_POST['funcionario_quantidade_itens'];
      $limite = $funcionario_quantidade_itens;
      $_SESSION['funcionario_quantidade_itens'] = $_POST['funcionario_quantidade_itens'];
    }
  //Existe sessao, mas antes de pegar ela verifica se recebeu algo do input. Prioridade é o input
  }else{
    if(isset($_POST['funcionario_quantidade_itens'])){
      $funcionario_quantidade_itens = $_POST['funcionario_quantidade_itens'];
      $limite = $funcionario_quantidade_itens;
      $_SESSION['funcionario_quantidade_itens'] = $_POST['funcionario_quantidade_itens'];
    }else{
      $funcionario_quantidade_itens = $_SESSION['funcionario_quantidade_itens'];
      $limite = $funcionario_quantidade_itens;
    }
  }

//Select para paginacao
$pesquisa_funcionario2 = "SELECT count(id_funcionarios) FROM acessos_funcionarios;";
$resultado_funcionario2 = mysqli_query($conn, $pesquisa_funcionario2);
$row_funcionario2 = mysqli_fetch_assoc($resultado_funcionario2);
//PAGINACAO
$paginas = ceil($row_funcionario2['count(id_funcionarios)'] / $limite);
//PAGINACAO
$inicio = ($pagina * $limite) - $limite;

//Evitar de Filtro Demitido, a nao ser que filtre por ele.
if($funcionario_status != "Demitido"){
  //Acrescimos ao select
  $pesquisa_funcionario .= " AND status != 'demitido' order by nome_completo LIMIT ".$inicio.", ".$limite;
}else{
  //Acrescimos ao select
  $pesquisa_funcionario .= " order by nome_completo LIMIT ".$inicio.", ".$limite;
}

//Executa o Select
$resultado_funcionario = mysqli_query($conn, $pesquisa_funcionario);

?>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="black">
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
          <li class="active">
            <a href="./cadastros.php">
              <i style="color: black;" class="fa fa-group"></i>
              <p style="color: black;">Cadastros</p>
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
            <a class="navbar-brand"> Cadastros</a>
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
          <!--
          <div class="col-md-12">
            <div class="card">
              <div class="card-header"><center>
                <h4 class="card-title"><i class="fa fa-user-secret"></i><b> Usuários Cadastrados:</b></h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        Id
                      </th>
                      <th>
                        Nome
                      </th>
                      <th>
                        Empresas
                      </th>

                    </thead>
                    <tbody>
                    <?php  //while ($row_usuario = mysqli_fetch_assoc($resultado_usuario)){ ?>
                      <tr>
                        <td>
                          <?php //echo $row_usuario['id_usuario'];?>
                        </td>
                        <td>
                          <?php //echo $row_usuario['nome_completo'];?>
                        </td>
                        <td>
                          <?php //echo $row_usuario['nome_loja'];?>
                        </td>                       
                      </tr>
                    <?php //} ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>-->
          </div>
                    
        <form action="cadastros.php" method="POST">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header"><center>
                <h4 class="card-title"><i class="fa fa-id-card-o"></i><b> Seus Funcionários:</b></h4></center>
                <div class="text-center p-t-12">
                  <a style="color: red;">
					      <?php
            			if(isset($_SESSION["mensagem_funcionario"])):
              			echo $_SESSION["mensagem_funcionario"];
              			unset($_SESSION["mensagem_funcionario"]);
            			endif; 
          			?>
                </a>
					      </div>
                <h6><i class="fa fa-sliders"></i> Filtro</h6>
                <div class="row">
                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Nome</label>
                        <input type="text" name="funcionario_nome" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Selecionar Empresa</label>
                        <select name="funcionario_empresa" class="form-control">
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
                        <label>Setor</label>
                        <select name="funcionario_setor" class="form-control">
                        <option value="" data-default disabled selected></option>
                        <!-- Inicio de uma codição PHP -->
                        <?php

                        require "../complements/selects/select_setor.php";

                        ?>
                        <!-- Fim de uma codição PHP -->
                        </select>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Função</label>
                        <select name="funcionario_funcao" class="form-control">
                        <option value="" data-default disabled selected></option>
                        <!-- Inicio de uma codição PHP -->
                        <?php 
                        
                        require "../complements/selects/select_funcao_editar.php";
                        
                        ?>
                        <!-- Fim de uma codição PHP -->
                        </select>
                      </div>
                    </div>

                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Status</label>
                        <select name="funcionario_status" class="form-control">
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
                        <select name="funcionario_quantidade_itens" id="funcionario_quantidade_itens" class="form-control">
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
                      <div class="form-group">
                      </div>
                    </div>

                  <div class="col-md-2">
                      <div class="form-group"><br>
                        <button type="submit" name="filtrar" class="btn btn-outline-info btn-100" ><b><i class="fa fa-search"></i> Buscar</b></button><br>
                      </div>
                    </div>
                    </form>

                    <div class="col-md-2">
                      <form action="../classes/limpa_filtro_funcionario.php" method="post">
                        <div class="form-group"><br>
                          <button act type="submit" name="limpar_filtro" class="btn btn-outline-info btn-100"><b><i class="fa fa-refresh"></i> Limpar Filtro</b></button>
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
                  <div id="divTabela">
                  <table id="Tab" class="table">
                    <thead class=" text-primary">
                      <th>
                        Nome Completo
                      </th>
                      <th>
                        CPF
                      </th>
                      <th>
                        Data de Nascimento
                      </th>
                      <th>
                        Empresa
                      </th>
                      <th>
                        Setor
                      </th>
                      <th>
                        Função
                      </th>
                      <th>
                        Data de Início
                      </th>
                      <th>
                        Vale Transporte
                      </th>
                     <!-- <th>
                        Valor do Vale Transporte
                      </th>
                      <th>
                        Salário
                      </th>-->
                      <th>
                        Observação
                      </th>
                      <th>
                        
                      </th>

                    </thead>
                    <tbody>
                    <?php  while ($row_funcionario = mysqli_fetch_assoc($resultado_funcionario)){ ?>
                      <tr>
                        <td>
                          <?php echo $row_funcionario['nome_completo'];?>
                        </td>
                        <td>
                          <?php echo $row_funcionario['cpf'];?>
                        </td>
                        <td>
                          <?php echo date("d/m/Y", strtotime($row_funcionario['data_nascimento']));?>
                        </td>
                        <td>
                          <?php echo $row_funcionario['nome_loja'];?>
                        </td>
                        <td>
                          <?php echo $row_funcionario['setor'];?>
                        </td>
                        <td>
                          <?php echo $row_funcionario['funcao'];?>
                        </td>
                        <td>
                          <?php echo date("d/m/Y", strtotime($row_funcionario['data_inicio']));?>
                        </td>
                        <td>
                          <?php echo $row_funcionario['tipo_vale_transporte'];?>
                        </td>
                       <!-- <td>
                          R$ <?php echo $row_funcionario['valor_vale_transporte'];?>
                        </td>
                        <td>
                          R$ <?php echo $row_funcionario['salario'];?> 
                        </td>-->
                        <td>
                          <?php echo $row_funcionario['observacao'];?>
                        </td>
                    </div>
                        <td>
                        <form action="editar-funcionarios.php" method="POST">
                            <button class="btn btn-primary btn-sm" title="Editar"><i class=" fa fa-edit"></i></button>
                            <input type="text" name="id_item_selecionado" style="display:none" value="<?php echo $row_funcionario['id_funcionarios'];?>">
                            <input type="text" name="id_empresa_selecionado" style="display:none" value="<?php echo $row_funcionario['empresas_id'];?>">
                        </form>
                        </td>
                        <td>
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

              a.download = "Funcionários";

               a.click();

                });

           });

 </script>
      
      <?php
//Carregando o final da pagina
require "../complements/end_page.php";
 ?>