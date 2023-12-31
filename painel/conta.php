<?php 
//Puxando Info do Usuário
include_once "../complements/inicio_php.php";

//Carregando o inicio da pagina
require "../complements/begin_page.php";

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
            <a class="navbar-brand"> Conta</a>
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
                <h4 class="card-title"><i class="now-ui-icons users_single-02"></i> Conta</h4>
              </div>
              <div class="card-body">
                <div class="table">
                <form action="" method="POST">
                 <div class="row">
                  <div class="col-md-12">
                 
                    <center>
                    <div class="col-md-8">
                      <div class="form-group">
                        <center><label>Nome</label>
                        <input type="text" name="usuario_nome" value="<?php echo $_SESSION["id_usuario_login"]['nome_completo'] ?>" class="form-control" disabled style="width: 80%;text-align:center;font-size: 16px;">
                      </div>
                       </div>
                      <center>
                    <div class="col-md-8">
                      <div class="form-group">
                        <center><label>E-mail</label>
                        <input type="text" name="usuario_email" value="<?php echo $_SESSION["id_usuario_login"]['email'] ?>" class="form-control" disabled style="width: 80%;text-align:center;font-size: 16px;">
                      </div>
                    </div>
                    <div class="col-md-8">
                      <div class="form-group">
                        <center><label>Senha</label>
                        <input type="password" name="usuario_senha" value="<?php echo $_SESSION["id_usuario_login"]['senhamd5'] ?>" id="myInput" class="form-control" disabled style="width: 80%;text-align:center;font-size: 16px;"></center>

                      </div>
                    </div>

                     
                        <div class="col-md-6 pr-1">
                           <div class="form-group">                                                                                   
                                      <h4>Empresas Administradas</h4>
                                                                     
                                          <ol>
                                          <!-- Inicio de uma codição PHP -->
                                            <?php 

                                            require "../complements/selects/select_empresa_acesso_usuario.php";

                                            ?>
                                          <!-- Fim de uma codição PHP -->
                                        </ol>                                   
                                                                                        
                           </div>
                        </div>
                        <button style="width: 50%" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><i class="fa fa-edit"></i> Editar Dados</button>
                      </form>
                      <div class="text-center p-t-12" style="color: red;"><br>
					            <?php
            			    if(isset($_SESSION["mensagem_login"])):
              		    	echo $_SESSION["mensagem_login"];
              		    	unset($_SESSION["mensagem_login"]);
            			    endif; 
                      ?>
                      </div>
                      <div class="text-center p-t-12" style="color: Green;">
                      <?php
                      if(isset($_SESSION["mensagem_editar"])):
              		    	echo $_SESSION["mensagem_editar"];
              		    	unset($_SESSION["mensagem_editar"]);
            			    endif; 
          			      ?>
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
                     <h3> Procedimento de Verificação<br>
                      <b style="font-size: 18px;">Confirme seu login para continuar</b></h3>
                <form action="../classes/valida_login_editar.php" method="POST">
                    <div class="col-md-8">
                      <div class="form-group">
                        <center><label>E-mail</label>
                        <input type="text" name="email_login" maxlength="80" class="form-control" required>
                      </div>
                    </div>
                    <div class="col-md-8">
                      <div class="form-group">
                        <center><label>Senha</label>
                        <input type="password" name="senha_login" maxlength="18" id="myInput" class="form-control" required></center>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                  <button type="submit" class="btn btn-success">Continuar</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                  </div>

                  
                  </form>
    </div>
      
 </div>
</div>
          
  <!-- End Modal -->
          
      
  <?php
//Carregando o final da pagina
require "../complements/end_page.php";
 ?>