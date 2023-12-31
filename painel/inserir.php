<?php 
//Puxando Info do Usuário
include_once "../complements/inicio_php.php";

//Carregando o inicio da pagina
require "../complements/begin_page.php";

?>

<body class="user-profile">
  <div class="wrapper ">
    <div class="sidebar" data-color="green">
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
            <a href="./lembretes.php">
              <i class="fa fa-tags"></i>
              <p>Lembretes</p>
            </a>
          </li>
          <li class="active ">
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
          <div class="col-md-6">
            <div class="card card-user">
            <div class="image">
              </div>
              <div class="card-body">
                <div class="author">
                  <H5><i class="fa fa-warning "></i> INSERIR OCORRÊNCIA</H5>
                </div>
                <form id="cad-ocorrencia-form" enctype="multipart/form-data">
                  
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Data</label>
                        <input type="date" name="ocorrencia_data" maxlength="100" class="form-control" required="" placeholder="Nome" >
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Selecionar Loja</label>
                        <select name="ocorrencia_loja" id="ocorrencia_loja" class="form-control">
                        <option value="0" selected disabled>Selecionar...</option>


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
                        <select name="ocorrencia_funcionarios" id="ocorrencia_funcionarios" class="form-control">
                        <option value="0" selected disabled>Selecionar...</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Motivo</label>
                           <select name="ocorrencia_motivo" class="form-control">
                          <option value="Selecionar...">Selecionar...</option>
                          <option value="Advertencia">Advertência</option>
                          <option value="Afastamento INSS">Afastamento INSS</option>
                          <option value="Atestado">Atestado</option>
                          <option value="Atestado de Comparecimento">Atestado de Comparecimento</option>
                          <option value="Atestado de Óbito">Atestado de Óbito</option>
                          <option value="Aviso">Aviso</option>
                          <option value="Dispensa">Dispensa</option>
                          <option value="Erro Operacional">Erro Operacional</option>
                          <option value="Exame Demissional">Exame Demissional</option>
                          <option value="Falta Injustificada">Falta Injustificada</option>
                          <option value="Feriado">Feriado</option>
                          <option value="Hora Extra">Hora Extra</option>
                          <option value="Justiça">Justiça</option>
                          <option value="Licença Maternidade">Licença Maternidade</option>
                          <option value="Licença Parternidade">Licença Parternidade</option>
                          <option value="Meta">Meta</option>
                          <option value="Quebra de Caixa">Quebra de Caixa</option>
                          <option value="Reembolso">Reembolso</option>
                          <option value="Rescisão">Rescisão</option>
                          <option value="Segunda Via Cartão">Segunda Via Cartão</option>
                          <option value="Suspensão">Suspensão</option>
                          <option value="Término de Contrato">Término de Contrato</option>
                          <option value="Vale Avulso">Vale Avulso</option>
                        </select>
                      </div>
                    </div>
                  </div>
                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Arquivo</label>
                           <div class="custom-file">
                           <input type="file" name="ocorrencia_arquivo[]" class="custom-file-input" id="arquivo" multiple="multiple">
                           <label class="custom-file-label" for="arquivo"><i class="fa fa-file fa-lg fa-fw" aria-hidden="true"></i> Este campo não é obrigatório</label>
                          </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Quantidade de Faltas</label>
                       <input type="number" name="ocorrencia_quantidade_faltas"  maxlength="5" class="form-control" required="" >
                      </div>
                    </div>
                     <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Valor</label>
                       <input size="10" maxlength="10" onkeydown="FormataMoeda(this,10,event)" onkeypress="return maskKeyPress(event)" type="text" name="ocorrencia_valor" class="form-control" required="" >
                      </div>
                    </div>
                  </div>

                 <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Observação</label>
                        <input type="text" name="ocorrencia_observacao"  maxlength="500" class="form-control" >
                      </div>
                    </div>
                  </div>

                   <div class="row">
                    <div class="col-md-12">
                      <div class="form-group"><br>
                        <button type="submit" name="ocorrencia_enviar" id="cad-ocorrencia-btn" value="Cadastrar" class="btn btn-outline-success" style="width: 100%;font-size:15px;"><b> Cadastrar Ocorrência</b></button><br>
                      </div>
                    </div>
                  </div>

                </form>
              </div>
            </div>
          </div>

      <div class="col-md-6">
          <div class="card card-user">
            <div class="image">
              </div>
              <div class="card-body">
                <div class="author">
                  <H5><i class="fa fa-close "></i> INSERIR RESCISÃO</H5>
                </div>
                <form id="cad-recisao-form">
                <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                      <label>Data Inicio de Aviso</label>
                       <input type="date" name="recisao_data_inicio_aviso" required class="form-control">
                      </div>
                    </div>
                  
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Selecionar Loja</label>
                        <select name="recisao_loja" id="recisao_loja" class="form-control">
                        <option value="0" selected disabled>Selecionar...</option>

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
                        <select name="recisao_funcionario" id="recisao_funcionario" class="form-control">
                        <option value="0" selected disabled>Selecionar...</option>
                        </select>
                      </div>
                    </div>              
                    
                     <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Motivo</label>
                        <select name="recisao_motivo" class="form-control">
                        <option value="Selecionar...">Selecionar...</option>
                        <option value="Aviso">Aviso</option>
                        <option value="Dispensa">Dispensa</option>
                        <option value="Justiça">Justiça</option>
                        <option value="Pedido de Demissão">Pedido de Demissão</option>
                        <option value="Término de Contrato">Término de Contrato</option>
                        <option value="Término de Contrato Antecipado">Término de Contrato Antecipado</option>
                        </select>
                      </div>
                    </div>         
                  </div>

                  <div class="row">
                       <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Tipo</label>
                        <select name="recisao_tipo" class="form-control">
                        <option value="Selecionar...">Selecionar...</option>
                          <option value="Acordo">Acordo</option>
                          <option value="Justiça">Justiça</option>
                          <option value="Normal">Normal</option>
                        </select>
                      </div>
                    </div> 
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                       <label>Exame Demissional</label>
                         <select name="recisao_exame_demissional" class="form-control">
                         <option value="Selecionar...">Selecionar...</option>
                          <option value="Não">Não</option>
                           <option value="Sim">Sim</option>
                        </select>
                      </div>
                    </div>
                  </div>

                 <div class="row">                 
                     <div class="col-md-6 pr-1">
                      <div class="form-group">
                      <label>Status</label>
                        <select name="recisao_status" class="form-control">
                        <option value="Selecionar...">Selecionar...</option>
                        <option value="Justiça">Justiça</option>
                          <option value="Pago">Pago</option>
                          <option value="Pendente">Pendente</option>
                        </select>
                      </div>
                    </div> 
                     <div class="col-md-6 pl-1">
                      <div class="form-group">
                       <label>Data Final de Aviso</label>
                       <input type="date" name="recisao_data_final_aviso" required class="form-control">
                      </div>
                    </div> 
                 </div>

                 <div class="row">
                    <div class="col-md-12">
                      <div class="form-group"> 
                       <label>Data Prazo de Pagamento</label>
                       <input type="date" name="recisao_data_prazo_pagamento" required class="form-control">
                      </div>
                    </div>
                  </div>

                 <div class="row">
                    <div class="col-md-12">
                      <div class="form-group"> 
                        <label>Observação</label>
                        <input type="text" name="recisao_observacao"  maxlength="500" class="form-control">
                      </div>
                    </div>
                  </div>

             
                   <div class="row">
                    <div class="col-md-12">
                      <div class="form-group"><br>
                        <button type="submit" name="recisao_enviar" id="cad-recisao-btn" value="Cadastrar" class="btn btn-outline-success" style="width: 100%;font-size:15px;"><b>Cadastrar Rescisão</b></button><br>
                      </div>
                    </div>
                  </div>
               </div>
              </div>
            </div>
      </form>
     </div> 
 <!-- FIM DIV -->

 <!-- INICIO DIV -->

        <div class="row">
          <div class="col-md-6">
            <div class="card card-user">
            <div class="image">
              </div>
              <div class="card-body">
                <div class="author">
                  <H5><i class="fa fa-plane"></i> INSERIR FÉRIAS </H5>
                </div>
                <form id="cad-ferias-form">                 
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Selecionar Loja</label>
                        <select name="ferias_loja" id="ferias_loja" class="form-control">
                        <option value="0" selected disabled>Selecionar...</option>

                        <!-- Inicio de uma codição PHP -->
                        <?php 
                        
                        require "../complements/selects/select_empresa.php";
                        
                        ?>
                        <!-- Fim de uma codição PHP -->


                        </select>
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Selecionar Funcionário</label>
                        <select name="ferias_funcionario" id="ferias_funcionario" class="form-control">
                        <option value="0"  selected disabled>Selecionar...</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  


                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Data Início</label>
                        <input type="date" name="ferias_data_inicio" class="form-control" required="" >
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Data Final</label>
                          <input type="date" name="ferias_data_final" class="form-control" required="" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Observação</label>
                        <input type="text" name="ferias_observacao"  maxlength="500" class="form-control" >
                      </div>
                    </div>
                  </div>
               
                   <div class="row">
                    <div class="col-md-12">
                      <div class="form-group"><br>
                        <input type="text" name="ferias_acao" style="display:none" value="Inserir" style="display:none">
                        <button type="submit" name="ferias_enviar" id="cad-ferias-btn" value="Cadastrar" class="btn btn-outline-success" style="width: 100%;font-size:15px;"><b>Cadastrar Férias</b></button><br>
                      </div>
                    </div>
                  </div>

                </form>
              </div>
            </div>
          </div>


      <div class="col-md-6">
          <div class="card card-user">
            <div class="image">
              </div>
              <div class="card-body">
                <div class="author">
                  <H5><i class="fa fa-tags"></i> INSERIR LEMBRETE </H5>
                </div>
                <form id="cad-lembrete-form">
                 <div class="row">
                    
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Cor</label>
                        <select name="lembrete_cor" class="form-control">
                          <option value="#FFC037">Laranja</option>
                          <option value="#F65E61">Vermelho</option>
                          <option value="Yellow">Amarelo</option>
                          <option value="#9DFF95">Verde</option>
                          <option value="#95CDFF">Azul</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">                
                    <div class="col-md-12 ">
                      <div class="form-group">
                      <label>Prazo</label>
                      <input type="date" id="no-spin"   min=""  name="lembrete_data_prazo" class="form-control data" required="" >
                      <!-- BLOQUEAR DATAS PASSADAS  / impedir de digitar -> onkeypress="return false"-->
                      <script>
                        var today = new Date().toISOString().split('T')[0];
                        document.getElementsByName("lembrete_data_prazo")[0].setAttribute('min', today);                      
                      </script>

                      </div>
                    </div>
                  </div>
                  <div class="row">                
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label>Anotação</label>
                         <input type="text" name="lembrete_anotacao"  maxlength="500" class="form-control" required="" >
                      </div>
                    </div>
                  </div>

             
                   <div class="row">
                    <div class="col-md-12">
                      <div class="form-group"><br>
                        <button type="submit" name="lembrete_enviar" id="cad-lembrete-btn" value="Cadastrar" class="btn btn-outline-success" style="width: 100%;font-size:15px;"><b>Cadastrar Lembrete</b></button><br>
                      </div>
                    </div>
                  </div></form>
                   </div>
                 </div>
               </div>
              </div>
           
          </div>  <!-- FIM DIV -->


 <!-- INICIO DIV -->
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="author"><br><br>
                <center><h5><i class="fa fa-user-plus"></i> CADASTRAR FUNCIONÁRIO</h5>
              </div>
              <div class="card-body">
                
                <form id="cad-funcionario-form">
                  <div class="row">
                    
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Nome Completo</label>
                        <input type="text" name="funcionario_nome" maxlength="80" class="form-control" required="" placeholder="Nome" >
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
                        <option value="Selecionar...">Selecionar...</option>
                          <option value="Ativo">Ativo</option>
                          <option value="Afastado">Afastado</option>
                          <option value="Demitido">Demitido</option>
                          <option value="Inativo">Inativo</option>
                          <option value="INSS">INSS</option>
                          <option value="Justiça">Justiça</option>
                          <option value="Licença Maternidade">Licença Maternidade</option>
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
                        <option value="0" selected disabled>Selecionar...</option>
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
                        <option value="Selecionar...">Selecionar...</option>
                        <option value="Açougue">Açougue</option>
                        <option value="Administrativo">Administrativo</option>
                        <option value="Caixa">Caixa</option>
                        <option value="Depósito">Depósito</option>
                        <option value="Entregas">Entregas</option>
                        <option value="Fiscalização">Fiscalização</option>
                        <option value="Frios">Frios</option>
                        <option value="Gerencia">Gerencia</option>
                        <option value="Hortifruti">Hortifruti</option>
                        <option value="Limpeza">Limpeza</option>
                        <option value="Operação Loja">Operação Loja</option>
                        <option value="Padaria">Padaria</option>
                        <option value="Recebimento Merc.">Recebimento Merc.</option>
                        <option value="Recursos Humanos">Recursos Humanos</option>
                        <option value="Reposição">Reposição</option>
                        <option value="Sub-Gerencia">Sub-Gerencia</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Função</label>
                        <select name="funcionario_funcao" class="form-control">
                        <option value="Selecionar...">Selecionar...</option>
                        <option value="Açougueiro">Açougueiro</option>
                        <option value="Assistente Administrativo">Assistente Administrativo</option>
                        <option value="Assistente Departamento Pessoal">Assistente Departamento Pessoal</option>
                        <option value="Atendente de Padaria">Atendente de Padaria</option>
                        <option value="Auxiliar Administrativo">Auxiliar Administrativo</option>
                        <option value="Auxiliar de Açougue">Auxiliar de Açougue</option>
                        <option value="Auxiliar de Frios">Auxiliar de Frios</option>
                        <option value="Auxiliar de Hortifruti">Auxiliar de Hortifruti</option>
                        <option value="Auxiliar de Padaria">Auxiliar de Padaria</option>
                        <option value="Auxiliar de Serviços Gerais">Auxiliar de Serviços Gerais</option>
                        <option value="Balconista">Balconista</option>
                        <option value="Confeiteiro">Confeiteiro</option>
                        <option value="Conferente">Conferente</option>
                        <option value="Desossador">Desossador</option>
                        <option value="Embalador">Embalador</option>
                        <option value="Encarregado de Açougue">Encarregado de Açougue</option>
                        <option value="Encarregado de Depósito">Encarregado de Depósito</option>
                        <option value="Encarregado de Frios">Encarregado de Frios</option>
                        <option value="Encarregado de Hortifruti">Encarregado de Hortifruti</option>
                        <option value="Encarregado de Padaria">Encarregado de Padaria</option>
                        <option value="Encarregado de Piso Loja">Encarregado de Piso Loja</option>
                        <option value="Frente de Caixa">Frente de Caixa</option>
                        <option value="Fiscal de Loja">Fiscal de Loja</option>
                        <option value="Gerente">Gerente</option>
                        <option value="Motorista">Motorista</option>
                        <option value="Operador de Caixa">Operador de Caixa</option>
                        <option value="Operador de Loja">Operador de Loja</option>
                        <option value="Padeiro">Padeiro</option>
                        <option value="Repositor">Repositor</option>
                        <option value="Sub-Gerente">Sub-Gerente</option>
                        <option value="Supervisor Departamento Pessoal">Supervisor Departamento Pessoal</option>
                        <option value="Supervisor de Açougue">Supervisor de Açougue</option>
                        <option value="Supervisor de Hortifruti">Supervisor de Hortifruti</option>
                        <option value="Supervisor de Padaria">Supervisor de Padaria</option>
                        <option value="Supervisor de Frios">Supervisor de Frios</option>
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
                        <option value="Selecionar...">Selecionar...</option>
                        <option value="Bhbus">Bhbus</option>
                        <option value="Combustível">Combustível</option>
                        <option value="Dinheiro">Dinheiro</option>
                        <option value="Nenhum">Nenhum</option>
                        <option value="Ótimo">Ótimo</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <!--
                     <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Valor do Vale Transporte</label> 
                     <input size="10" maxlength="10" onkeydown="FormataMoeda(this,10,event)" onkeypress="return maskKeyPress(event)" type="text" name="funcionario_valor_vale_transporte" class="form-control" placeholder="Valor do Vale Transporte" > 
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Salário</label> 
                         <input size="10" maxlength="10" onkeydown="FormataMoeda(this,10,event)" onkeypress="return maskKeyPress(event)" type="text" name="funcionario_salario" class="form-control"  placeholder="Salário" >
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Nome Mãe</label> 
                        <input type="text" name="funcionario_nome_mae"  maxlength="80" class="form-control" placeholder="Nome da Mãe" >
                      </div>
                    </div>
                  </div>-->

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
                        <button type="submit" name="funcionario_enviar" id="cad-funcionario-btn" value="Cadastrar" class="btn btn-outline-success" style="width: 100%;font-size:15px;"><b>Cadastrar Funcionário</b></button><br>
                      </div>
                    </div>
                  </div>

                </form>
              </div>
            </div>
          </div>

<!--
      <div class="col-md-6">
          <div class="card card-user">
            <div class="image">
              </div>
              <div class="card-body">
                <div class="author">
                  <H5><i class="fa fa-user-secret"></i>  CADASTRAR USUÁRIO ADMINISTRATIVO </H5>
                </div><form id="cad-usuario-form">
                 <div class="row">
                 <div class="col-md-12">
                      <center>
                    <div class="col-md-8">
                      <div class="form-group">
                        <label>Nome</label>
                        <input type="text" name="usuario_nome" class="form-control textcenter"  maxlength="80" required="" >
                      </div>
                      </div>
                      <center>
                    <div class="col-md-8">
                      <div class="form-group">
                        <label>E-mail</label>
                        <input type="text" name="usuario_email" class="form-control textcenter" maxlength="80" required="" >
                      </div>
                    </div>
                    <div class="col-md-8">
                      <div class="form-group">
                        <center><label>Senha</label>
                        <input type="password" name="usuario_senha" id="myInput" class="form-control textcenter"  maxlength="18" required="" ></center>
                        <div class="custom-control custom-checkbox mb-3"><br>
                          <input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
                          <label class="custom-control-label" for="customCheck" onclick="myFunction()">Mostrar senha</label>
                        </div>
                      </div>
                    </div>

                           <script>
                          function myFunction() {
                              var x = document.getElementById("myInput");
                              if (x.type === "password") {
                                  x.type = "text";
                              } else {
                                  x.type = "password";
                              }
                          }
                          </script>
                      <center>
                        <div class="col-md-6 pr-1">
                           <div class="form-group">
                             <div class="tab">   

                                 <div class="row ">
                                    <table class="table table">
                                      <thead>
                                        <tr>
                                          <th></th>
                                          <th>Empresas</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                        -->


                                      <!-- Inicio de uma codição PHP -->
                                      <?php 

                                      //require "../complements/selects/select_empresa2.php";

                                      ?>
                                      <!-- Fim de uma codição PHP -->

                                        <!--
                                      </tbody>
                                    </table>
                                </div>
                             </div>
                           </div>
                        </div>
                        <button type="submit" name="usuario_enviar" id="cad-usuario-btn" value="Cadastrar" class="btn btn-outline-success" style="width: 100%"><b>Cadastrar Usuário Administrativo</b></button>
                      </form>
                    </div>
                  </div>
              </div>

              </div>
            </div>
       
    -->

   
    <!--
        <div class="col-md-6">
          <div class="card card-user">
            <div class="image">
              </div>
              <div class="card-body">
                <div class="author">
                  <H5><i class="fa fa-check"></i> CADASTRAR EMPRESA </H5>
                </div>
                <form id="cad-empresa-form"><center>
       
                    <div class="col-md-8">
                      <div class="form-group">
                        <label>Nome da Loja</label>
                        <input type="text" name="empresa_nome_loja" maxlength="80" class="form-control textcenter" required="" >
                      </div>
                    </div>
             
                    <div class="col-md-8 ">
                      <div class="form-group">
                      <label>Razão Social</label>
                      <input type="text" name="empresa_razao_social" maxlength="80" class="form-control textcenter" required="" >
                      </div>
                    </div>
              
                    <div class="col-md-8 ">
                      <div class="form-group">
                        <label>CNPJ</label>
                         <input type="text" name="empresa_cnpj" id="produto-1-cnpj"  maxlength="18" class="form-control textcenter" required="" >
         -->        
                         <!-- MÁSCARA CNPJ-->
                          <!--
                         <script>
                              document.getElementById('produto-1-cnpj').addEventListener('input', function (e) {
                                var x = e.target.value.replace(/\D/g, '').match(/(\d{0,2})(\d{0,3})(\d{0,3})(\d{0,4})(\d{0,2})/);
                                e.target.value = !x[2] ? x[1] : x[1] + '.' + x[2] + '.' + x[3] + '/' + x[4] + (x[5] ? '-' + x[5] : '');
                              });
                        </script>-->
     <!--                   
                      </div>
                    </div>


                  <center>
                  <div class="col-md-8 pr-1">
                    <div class="form-group">
                      <div class="tab">   
                        <div class="row ">
                          <table class="table table">
                            <thead>
                              <tr>
                                <th></th>
                                <th>Usuário que Terão Acesso</th>
                              </tr>
                            </thead>
                            <tbody>

                           
                     
                            <?php 

                           // require "../complements/selects/select_usuario.php";

                            ?>
                          

                                      
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </center>

             
                   <div class="row">
                    <div class="col-md-12">
                      <div class="form-group"><br>
                        <button type="submit" name="empresa_enviar" id="cad-empresa-btn" value="Cadastrar" class="btn btn-outline-success" style="width: 100%;"><b>Cadastrar Empresa</b></button><br>
                      </div>
                    </div>
                  </div></form>
                   </div>
                 </div>
               </div>
              </div>
            </div>
          </div>  
                            -->
          
          <!-- FIM DIV -->
                            

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

<!-- SWEETALERTS dos cadastros-->
<script src="../js/sweetalert2.js"></script>
  <script src="../js/custom_empresa.js"></script>
  <script src="../js/custom_ferias.js"></script>
  <script src="../js/custom_funcionario.js"></script>
  <script src="../js/custom_lembrete.js"></script>
  <script src="../js/custom_ocorrencia.js"></script>
  <script src="../js/custom_recisao.js"></script>
  <script src="../js/custom_usuario.js"></script>

<!--Selecionando Funcionarios de acordo a empresa selecionada-->
  <script src="../js/ferias.js"></script>
  <script src="../js/ocorrencia.js"></script>
  <script src="../js/recisao.js"></script>
  
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