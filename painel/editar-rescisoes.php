<?php 
//Puxando Info do Usuário
include_once "../complements/inicio_php.php";

//Carregando Consultas SQL da pagina
//require "../complements/inicio_inserir.php";

//Carregando o inicio da pagina
require "../complements/begin_page.php";

?>

<body class="user-profile">
  <div class="wrapper ">
    <div class="sidebar" data-color="red">
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
          <li class="active ">
            <a href="./rescisoes.php">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Rescisões</p>
            </a>
          </li>
          <li >
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
      <!-- End Navbar -->


      <div class="panel-header panel-header-sm">
      </div>

      

  

 

 <!-- INICIO DIV -->

      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header"><br><br>
                <center><h5><i class="fa fa-edit"></i> EDITAR RESCISÕES</h5>
              </div>
              <div class="card-body">
              <form id="cad-recisao-form">
                <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Data</label>
                        <input type="date" name="recisao_data" class="form-control" required="" >
                      </div>
                    </div>
                  
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Selecionar Loja</label>
                        <select name="recisao_loja" class="form-control">


                        <!-- Inicio de uma codição PHP -->
                        <?php 
                        
                        require "../complements/selects/select_empresa.php";
                        
                        ?>
                        <!-- Fim de uma codição PHP -->


                        </select>
                      </div>
                    </div>            
                </div>

                  <div class="row">     

                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Selecionar Funcionário</label>
                        <select name="recisao_funcionario" class="form-control">
                        
                        <!-- Inicio de uma codição PHP -->
                        <?php 
                        
                        require "../complements/selects/select_funcionario.php";
                        
                        ?>
                        <!-- Fim de uma codição PHP -->


                        </select>
                      </div>
                    </div>              
                    
                     <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Motivo</label>
                        <select name="recisao_motivo" class="form-control">
                          <option value="Término de Contrato">Término de Contrato</option>
                          <option value="Término de Contrato Antecipado">Término de Contrato Antecipado</option>
                          <option value="Aviso">Aviso</option>
                          <option value="Dispensa">Dispensa</option>
                          <option value="Pedido de Demissão">Pedido de Demissão</option>
                        </select>
                      </div>
                    </div>         
                  </div>

                  <div class="row">
                       <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Tipo</label>
                        <select name="recisao_tipo" class="form-control">
                          <option value="Normal">Normal</option>
                          <option value="Acordo">Acordo</option>
                          <option value="Justiça">Justiça</option>
                        </select>
                      </div>
                    </div> 
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                       <label>Exame Demissional</label>
                         <select name="recisao_exame_demissional" class="form-control">
                          <option value="Não">Não</option>
                           <option value="Sim">Sim</option>
                        </select>
                      </div>
                    </div>
                  </div>

                 <div class="row">                 
                     <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Dias de Aviso</label>
                       <input type="number" name="recisao_dias_de_aviso" class="form-control">
                      </div>
                    </div> 
                     <div class="col-md-6 pl-1">
                      <div class="form-group">
                      <label>Status</label>
                        <select name="recisao_status" class="form-control">
                          <option value="Pago">Pago</option>
                          <option value="Pendente">Pendente</option>
                        </select>
                      </div>
                    </div> 
                 </div>

                 <div class="row">
                    <div class="col-md-12">
                      <div class="form-group"> 
                        <label>Observação</label>
                        <input type="text" name="recisao_observacao" class="form-control">
                      </div>
                    </div>
                  </div>

             
                   <div class="row">
                    <div class="col-md-12">
                      <div class="form-group"><br>
                        <button type="submit" name="recisao_enviar" id="cad-recisao-btn" value="Cadastrar" class="btn btn-outline-success" style="width: 100%;"><b>Confirmar Alterações</b></button><br>
                      </div>
                    </div>
                  </div>
               </div>
            </div>
          </div>


 



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
  <script src="../js/custom_empresa.js"></script>
  <script src="../js/custom_ferias.js"></script>
  <script src="../js/custom_funcionario.js"></script>
  <script src="../js/custom_lembrete.js"></script>
  <script src="../js/custom_ocorrencia.js"></script>
  <script src="../js/custom_recisao.js"></script>
  <script src="../js/custom_usuario.js"></script>

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