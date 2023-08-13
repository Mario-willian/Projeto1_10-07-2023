<?php 
//Puxando Info do Usuário
include_once "../complements/inicio_php.php";

//Carregando o inicio da pagina
require "../complements/begin_page.php";

//Verificando se tem o item selecionado
if ($_POST['id_item_selecionado'] == "") {
	header("location:ferias.php");
}

//Recebendo Informacoes do item selecionado
$id_item_selecionado = $_POST['id_item_selecionado'];
$id_funcionario_selecionado = $_POST['id_funcionario_selecionado'];
$id_empresa_selecionado = $_POST['id_empresa_selecionado'];

//Select das ferias escolhidas
$pesquisa_ferias = "SELECT * FROM acessos_ferias WHERE id =".$id_item_selecionado.";";
$resultado_ferias = mysqli_query($conn, $pesquisa_ferias);
$row_ferias = mysqli_fetch_assoc($resultado_ferias);

//parte valida a data para inserir no input type="date" YYYY-MM-DD
$data_inicio = substr($row_ferias['data_inicio'],0,10);
$data_fim = substr($row_ferias['data_fim'],0,10);


?>

<body class="user-profile">
  <div class="wrapper ">
    <div class="sidebar" data-color="yellow">
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
          <li class="active">
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
            <a class="navbar-brand">Inserir</a><br>
            
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

      

  

 

 <!-- INICIO DIV -->

      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header"><br><br>
                <center><h5><i class="fa fa-edit"></i> EDITAR FÉRIAS</h5>
              </div>
              <div class="card-body">
                <form method="POST" action="../classes/alter/ferias.php">              
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Selecionar Loja</label>
                        <select name="ferias_loja" id="ferias_loja" class="form-control">


                        <!-- Inicio de uma codição PHP -->
                        <?php 
                        
                        require "../complements/selects/select_empresa_editar.php";
                        
                        ?>
                        <!-- Fim de uma codição PHP -->


                        </select>
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Selecionar Funcionário</label>
                        <select name="ferias_funcionario" id="ferias_funcionario" class="form-control">
                          

                        <!-- Inicio de uma codição PHP -->
                        <?php 
                        
                        require "../complements/selects/select_funcionario_editar.php";
                        
                        ?>
                        <!-- Fim de uma codição PHP -->


                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Data Início</label>
                        <input type="date" name="ferias_data_inicio" value="<?php echo $data_inicio; ?>" class="form-control" required="" >
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Data Final</label>
                        <input type="date" name="ferias_data_final" value="<?php echo $data_fim; ?>" class="form-control" required="" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Observação</label>
                        <input type="text" name="ferias_observacao" value="<?php echo $row_ferias['observacao']; ?>" class="form-control" >
                      </div>
                    </div>
                  </div>

                  
               
                   <div class="row">
                    <div class="col-md-12">
                      <div class="form-group"><br>
                      <input type="text" name="ferias_id" style="display:none" value="<?php echo $row_ferias['id'];?>">
                        <button type="submit" name="ferias_enviar" id="cad-ferias-btn" value="Cadastrar" class="btn btn-success" style="width: 100%;"><b>Confirmar Alterações</b></button><br>
                      </form>
                          <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-outline-danger btn-sm"><b><i class="fa fa-trash"></i> Excluir</b></button>
                      </div>
                    </div>
                  </div>

              </div>
            </div>
          </div>

  <!-- Modal -->
  <div  class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
    
      <!-- Modal content-->
      <div  class="modal-content">
        <div  class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
                      <center>
                     <h3> Tem certeza que deseja excluir?<br>
                      <b style="font-size: 18px;"><i class="fa fa-warning"></i> Ao confirmar não será possível recuperar os dados.</b></h3>
              
                    <div class="col-md-8">
                      <div class="form-group">
                      <form method="POST" action="../classes/deletes/ferias.php">
                          <button type="submit" id="cad-ferias-delete-btn" name="excluir_ferias_enviar" value="Excluir" class="btn btn-danger btn-sm"><b><i class="fa fa-trash"></i> Confirmar Exclusão</b></button>
                          <input type="text" name="ferias_id" style="display:none" value="<?php echo $row_ferias['id'];?>">
                        </form>
                      </div>
                    </div>
        </div>
                  <div class="modal-footer">
                      
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                  </div>
               
    </div>
      
 </div>
</div>
      
  <!-- End Modal -->    
 



                  <!-- FIM -->
               </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      </div>
    </div>
  </div>


<!-- SWEETALERTS dos cadastros-->
  <script src="../js/sweetalert2.js"></script>
  <script src="../js/custom_ferias_edit.js"></script>
  <script src="../js/custom_ferias_delete.js"></script>


<!-- MASCARA DE DINHEIRO -->
   <script type="text/javascript">

        function BlockKeybord()
        {
            if(window.event) // IE
            {
                if((event.keyCode < 48) || (event.keyCode > 57))
                {
                    event.returnValue = false;
                }
            }
            else if(e.which) // Netscape/Firefox/Opera
            {
                if((event.which < 48) || (event.which > 57))
                {
                    event.returnValue = false;
                }
            }


        }

        function troca(str,strsai,strentra)
        {
            while(str.indexOf(strsai)>-1)
            {
                str = str.replace(strsai,strentra);
            }
            return str;
        }

        function FormataMoeda(campo,tammax,teclapres,caracter)
        {
            if(teclapres == null || teclapres == "undefined")
            {
                var tecla = -1;
            }
            else
            {
                var tecla = teclapres.keyCode;
            }

            if(caracter == null || caracter == "undefined")
            {
                caracter = ".";
            }

            vr = campo.value;
            if(caracter != "")
            {
                vr = troca(vr,caracter,"");
            }
            vr = troca(vr,"/","");
            vr = troca(vr,",","");
            vr = troca(vr,".","");

            tam = vr.length;
            if(tecla > 0)
            {
                if(tam < tammax && tecla != 8)
                {
                    tam = vr.length + 1;
                }

                if(tecla == 8)
                {
                    tam = tam - 1;
                }
            }
            if(tecla == -1 || tecla == 8 || tecla >= 48 && tecla <= 57 || tecla >= 96 && tecla <= 105)
            {
                if(tam <= 2)
                {
                    campo.value = vr;
                }
                if((tam > 2) && (tam <= 5))
                {
                    campo.value = vr.substr(0, tam - 2) + ',' + vr.substr(tam - 2, tam);
                }
                if((tam >= 6) && (tam <= 8))
                {
                    campo.value = vr.substr(0, tam - 5) + caracter + vr.substr(tam - 5, 3) + ',' + vr.substr(tam - 2, tam);
                }
                if((tam >= 9) && (tam <= 11))
                {
                    campo.value = vr.substr(0, tam - 8) + caracter + vr.substr(tam - 8, 3) + caracter + vr.substr(tam - 5, 3) + ',' + vr.substr(tam - 2, tam);
                }
                if((tam >= 12) && (tam <= 14))
                {
                    campo.value = vr.substr(0, tam - 11) + caracter + vr.substr(tam - 11, 3) + caracter + vr.substr(tam - 8, 3) + caracter + vr.substr(tam - 5, 3) + ',' + vr.substr(tam - 2, tam);
                }
                if((tam >= 15) && (tam <= 17))
                {
                    campo.value = vr.substr(0, tam - 14) + caracter + vr.substr(tam - 14, 3) + caracter + vr.substr(tam - 11, 3) + caracter + vr.substr(tam - 8, 3) + caracter + vr.substr(tam - 5, 3) + ',' + vr.substr(tam - 2, tam);
                }
            }
        }

        function maskKeyPress(objEvent)
        {
            var iKeyCode;

            if(window.event) // IE
            {
                iKeyCode = objEvent.keyCode;
                if(iKeyCode>=48 && iKeyCode<=57) return true;
                return false;
            }
            else if(e.which) // Netscape/Firefox/Opera
            {
                iKeyCode = objEvent.which;
                if(iKeyCode>=48 && iKeyCode<=57) return true;
                return false;
            }
        }
    </script>

<!--Selecionando Funcionarios de acordo a empresa selecionada-->
  <script src="../js/ferias_editar.js"></script>


  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
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