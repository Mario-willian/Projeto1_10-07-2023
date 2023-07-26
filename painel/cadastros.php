<?php 
//Puxando Info do Usuário
include_once "../complements/inicio_php.php";

//Carregando o inicio da pagina
require "../complements/begin_page.php";

//Select para Usuarios
$pesquisa_usuario = "SELECT * FROM acessos_usuarios order by id_usuario;";
$resultado_usuario = mysqli_query($conn, $pesquisa_usuario);

//Select para Funcionarios
$pesquisa_funcionario = "SELECT * FROM acessos_funcionarios order by id_funcionarios;";
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
                    <span class="badge badge-light">5</span>
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
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
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
                    <?php  while ($row_usuario = mysqli_fetch_assoc($resultado_usuario)){ ?>
                      <tr>
                        <td>
                          <?php echo $row_usuario['id_usuario'];?>
                        </td>
                        <td>
                          <?php echo $row_usuario['nome_completo'];?>
                        </td>
                        <td>
                          <?php echo $row_usuario['nome_loja'];?>
                        </td>                       
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          
                  
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"><i class="fa fa-id-card-o"></i><b> Seus Funcionários:</b></h4>
                <h6><i class="fa fa-sliders"></i> Filtro</h6>
                <div class="row">
                    <div class="col-md-3 pr-1">
                      <div class="form-group">
                        <label>Nome</label>
                        <input type="text" name="nome" class="form-control" >
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
                        <label>Setor</label>
                        <select name="setor" class="form-control">
                          <option value="acougue">Açougue</option>
                          <option value="padaria">Padaria</option>
                          <option value="hortifruti">Hortifruti</option>
                          <option value="caixa">Caixa</option>
                          <option value="fiscalizacao">Fiscalização</option>
                          <option value="reposicao">Reposição</option>
                          <option value="limpeza">Limpeza</option>
                          <option value="administrativo">Administrativo</option>
                          <option value="gerencia">Gerencia</option>
                          <option value="frios">Frios</option>
                          <option value="subgerencia">Sub-Gerencia</option>
                          <option value="entregas">Entregas</option>
                          <option value="recebimento">Recebimento Merc.</option>
                          <option value="operacaoloja">Operação Loja</option>
                          <option value="rh">Recursos Humanos</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3 pl-1">
                      <div class="form-group">
                        <label>Função</label>
                        <select name="funcao" class="form-control">
                          <option value="operadorcaixa">Operador de Caixa</option>
                          <option value="frentecaixa">Frente de Caixa</option>
                          <option value="supervisoracougue">Supervisor de Açougue</option>
                          <option value="encarregadoacougue">Encarregado de Açougue</option>
                          <option value="auxiliaracougue">Auxiliar de Açougue</option>
                          <option value="supervisorpadaria">Supervisor de Padaria</option>
                          <option value="encarregadopadaria">Encarregado de Padaria</option>
                          <option value="padeiro">Padeiro</option>
                          <option value="confeteiro">Confeiteiro</option>
                          <option value="auxiliarpadaria">Auxiliar de Padaria</option>
                          <option value="balconista">Balconista</option>
                          <option value="supervisorhorti">Supervisor de Hortifruti</option>
                          <option value="encarregadohorti">Encarregado de Hortifruti</option>
                          <option value="fiscalloja">Fiscal de Loja</option>
                          <option value="repositor">Repositor</option>
                          <option value="embalador">Embalador</option>
                          <option value="asg">Auxiliar de Serviços Gerais</option>
                          <option value="auxiliaradm">Auxiliar Administrativo</option>
                          <option value="assistenteadm">Assistente Administrativo</option>
                          <option value="adp">Assistente Departamento Pessoal</option>
                          <option value="sdp">Supervisor Departamento Pessoal</option>
                          <option value="gerente">Gerente</option>
                          <option value="subgerente">Sub-Gerente</option>
                          <option value="epl">Encarregado de Piso Loja</option>
                          <option value="supervisorfrios">Supervisor de Frios</option>
                          <option value="encarregadofrios">Encarregado de Frios</option>
                          <option value="auxiliarfrios">Auxiliar de Frios</option>
                          <option value="motorista">Motorista</option>
                          <option value="conferente">Conferente</option>
                          <option value="operadorloja">Operador de Loja</option>
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
                        Nome Completo
                      </th>
                      <th>
                        Status
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
                      <th>
                        Valor do Vale Transporte
                      </th>
                      <th>
                        Salário
                      </th>
                      <th>
                        Observação
                      </th>

                    </thead>
                    <tbody>
                    <?php  while ($row_funcionario = mysqli_fetch_assoc($resultado_funcionario)){ ?>
                      <tr>
                        <td>
                          <?php echo $row_funcionario['nome_completo'];?>
                        </td>
                        <td>
                          <?php echo $row_funcionario['status'];?>
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
                        <td>
                          R$ <?php echo $row_funcionario['valor_vale_transporte'];?>
                        </td>
                        <td>
                          R$ <?php echo $row_funcionario['salario'];?> 
                        </td>
                        <td>
                          <?php echo $row_funcionario['observacao'];?>
                        </td>
                        
                        <td>
                          <form action="">
                            <button class="btn btn-primary btn-sm" title="Editar Vendedor"><i class=" fa fa-edit"></i></button>
                          <input class="w3-input w3-border" name="cpf" style="display:none" type="text" value="<?php echo $row_funcionario['id_funcionarios'];?>" >
                        </form>
                        </td>
                        <td>
                          <form action="" method="get">
                          <button name="excluir" onclick="myFunction()" class="btn btn-danger btn-sm"><i class=" fa fa-trash"></i></button>
                            <input type="text" style="display:none" value="<?php echo $row_funcionario['id_funcionarios'];?>" name="cpf">
                        </form>
                        </td>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                  <nav aria-label="Navegação de página exemplo">
  <ul class="pagination justify-content-center">
    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1">Anterior</a>
    </li>
    <li class="page-item active"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Próximo</a>
    </li>
  </ul>
</nav>
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