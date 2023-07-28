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
    <div class="sidebar" data-color="black">
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
          <li >
            <a href="./ferias.php">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Férias</p>
            </a>
          </li>
          <li class="active ">
            <a href="./cadastros.php">
              <i style="color: black;" class="fa fa-group"></i>
              <p style="color: black;">Cadastros</p>
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
                <center><h5><i class="fa fa-edit "></i> EDITAR FUNCIONÁRIO</h5>
              </div>
              <div class="card-body">
                <form id="cad-funcionario-form">
                  <div class="row">
                    
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Nome Completo</label>
                        <input type="text" name="funcionario_nome" maxlength="100" class="form-control" required="" placeholder="Nome" >
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>CPF</label>
                        <input type="text" name="funcionario_cpf" maxlength="14" class="form-control" required="" placeholder="CPF" OnKeyPress="formatar('###.###.###-##', this)">
                      </div>
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
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Data de Nascimento</label>
                        <input type="date" name="funcionario_data_nascimento" class="form-control" required="" >
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Status</label>
                        <select name="funcionario_status" class="form-control">
                          <option value="Ativo">Ativo</option>
                          <option value="Afastado">Afastado</option>
                          <option value="Inativo">Inativo</option>
                          <option value="Transferido">Transferido</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Empresa</label>
                        <select name="funcionario_empresa" class="form-control">
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
                        <label>Setor</label>
                        <select name="funcionario_setor" class="form-control">
                          <option value="Açougue">Açougue</option>
                          <option value="Padaria">Padaria</option>
                          <option value="Hortifruti">Hortifruti</option>
                          <option value="Caixa">Caixa</option>
                          <option value="Fiscalização">Fiscalização</option>
                          <option value="Reposição">Reposição</option>
                          <option value="Limpeza">Limpeza</option>
                          <option value="Administrativo">Administrativo</option>
                          <option value="Gerencia">Gerencia</option>
                          <option value="Frios">Frios</option>
                          <option value="Sub-Gerencia">Sub-Gerencia</option>
                          <option value="Entregas">Entregas</option>
                          <option value="Recebimento Merc.">Recebimento Merc.</option>
                          <option value="Operação Loja">Operação Loja</option>
                          <option value="Recursos Humanos">Recursos Humanos</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Função</label>
                        <select name="funcionario_funcao" class="form-control">
                          <option value="Operador de Caixa">Operador de Caixa</option>
                          <option value="Frente de Caixa">Frente de Caixa</option>
                          <option value="Supervisor de Açougue">Supervisor de Açougue</option>
                          <option value="Encarregado de Açougue">Encarregado de Açougue</option>
                          <option value="Auxiliar de Açougue">Auxiliar de Açougue</option>
                          <option value="Supervisor de Padaria">Supervisor de Padaria</option>
                          <option value="Encarregado de Padaria">Encarregado de Padaria</option>
                          <option value="Padeiro">Padeiro</option>
                          <option value="Confeiteiro">Confeiteiro</option>
                          <option value="Auxiliar de Padaria">Auxiliar de Padaria</option>
                          <option value="Balconista">Balconista</option>
                          <option value="Supervisor de Hortifruti">Supervisor de Hortifruti</option>
                          <option value="ncarregado de Hortifruti">Encarregado de Hortifruti</option>
                          <option value="Fiscal de Loja">Fiscal de Loja</option>
                          <option value="Repositor">Repositor</option>
                          <option value="Embalador">Embalador</option>
                          <option value="Auxiliar de Serviços Gerais">Auxiliar de Serviços Gerais</option>
                          <option value="Auxiliar Administrativo">Auxiliar Administrativo</option>
                          <option value="Assistente Administrativo">Assistente Administrativo</option>
                          <option value="Assistente Departamento Pessoal">Assistente Departamento Pessoal</option>
                          <option value="upervisor Departamento Pessoal">Supervisor Departamento Pessoal</option>
                          <option value="Gerente">Gerente</option>
                          <option value="Sub-Gerente">Sub-Gerente</option>
                          <option value="ncarregado de Piso Loja">Encarregado de Piso Loja</option>
                          <option value="Supervisor de Frios">Supervisor de Frios</option>
                          <option value="Encarregado de Frios">Encarregado de Frios</option>
                          <option value="Auxiliar de Frios">Auxiliar de Frios</option>
                          <option value="Motorista">Motorista</option>
                          <option value="Conferente">Conferente</option>
                          <option value="Operador de Loja">Operador de Loja</option>
                        </select>
                      </div>
                    </div>
                  </div>

                   <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Data de Início</label>
                        <input type="date" name="funcionario_data_de_inicio" class="form-control" required="" >
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Vale Transporte</label>
                        <select name="funcionario_vale_transporte" class="form-control">
                          <option value="Nenhum">Nenhum</option>
                          <option value="Ótimo">Ótimo</option>
                          <option value="Bhbus">Bhbus</option>
                          <option value="Combustível">Combustível</option>
                          <option value="Dinheiro">Dinheiro</option>
                        </select>
                      </div>
                    </div>
                  </div>

                   <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Valor do Vale Transporte</label>
                        <input size="10" maxlength="10" onkeydown="FormataMoeda(this,10,event)" onkeypress="return maskKeyPress(event)" type="text" name="funcionario_valor_vale_transporte" class="form-control" required="" placeholder="Valor do Vale Transporte" >
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Salário</label>
                         <input size="10" maxlength="10" onkeydown="FormataMoeda(this,10,event)" onkeypress="return maskKeyPress(event)" type="text" name="funcionario_salario" class="form-control" required="" placeholder="Salário" >
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Nome Pai</label>
                        <input type="text" name="funcionario_nome_pai" class="form-control" placeholder="Nome do Pai" >
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Nome Mãe</label>
                        <input type="text" name="funcionario_nome_mae" class="form-control" required="" placeholder="Nome da Mãe" >
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Observação</label>
                        <input type="text" name="funcionario_observacao" maxlength="500" class="form-control" placeholder="Observação" >
                      </div>
                    </div>
                  </div>
                   <div class="row">
                    <div class="col-md-12">
                      <div class="form-group"><br>
                        <button type="submit" name="funcionario_enviar" id="cad-funcionario-btn" value="Cadastrar" class="btn btn-outline-success" style="width: 100%;"><b>Confirmar Alterações</b></button><br>
                      </div>
                    </div>
                  </div>

                </form>
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