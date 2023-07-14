<?php
/*

//Puxando Info do Usuário
require_once "../inc/inicio_php_adm.php";

//Variaveis para validar os campos
$erro_usuario = "";

//Chamar a funcao para inserir a determinada ação
if (isset($_GET['confirmar_notificacao'])){
  //Recuperar arquivo da classe
  require_once "../classe/NotificacaoClasse.php";
  //Criar um objeto do tipo notificacao
  $notificacao = new Notificacao();
  //Chama a função e insere a notificação
  $notificacao->inserir();
}else if(isset($_GET['confirmar_user_adm'])){
    //Variaveis para o critério do select SQL
    $usuarioo = $_GET["login"];

    //Recuperar arquivo da classe
    include_once ("../inc/conexao.php");

    //Select para buscar se já existe o usuario no VENDEDOR
      $result_usuario_vendedor = "SELECT count(usuario) FROM vendedor where usuario = '$usuarioo'";
      $resultado_usuario_vendedor = mysqli_query($conn, $result_usuario_vendedor);
      $row_usuario_vendedor = mysqli_fetch_assoc($resultado_usuario_vendedor);
    //Select para buscar se já existe o usuario no COMPRADOR
      $result_usuario_cliente = "SELECT count(usuario) FROM cliente where usuario = '$usuarioo'";
      $resultado_usuario_cliente = mysqli_query($conn, $result_usuario_cliente);
      $row_usuario_cliente = mysqli_fetch_assoc($resultado_usuario_cliente);
    //Select para buscar se já existe o usuario no ADM
      $result_usuario_adm = "SELECT count(login) FROM adm where login = '$usuarioo'";
      $resultado_usuario_adm = mysqli_query($conn, $result_usuario_adm);
      $row_usuario_adm = mysqli_fetch_assoc($resultado_usuario_adm);

    if($row_usuario_cliente['count(usuario)']>=1 || $row_usuario_vendedor['count(usuario)']>=1 || $row_usuario_adm['count(login)']>=1) {
        $erro_usuario = "Este Usuario já está Cadastrado";
    }else{
        //Recuperar arquivo da classe
        require_once "../classe/AdmClasse.php";
        //Criar um objeto do tipo notificacao
        $user_adm = new Adm();
        //Chama a função e insere o novo user ADM
        $user_adm->inserir_adm();
    }    
        
}

*/
?>
<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../img/logo.png">
  <link rel="icon" type="image/png" href="../img/logo.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
        SUPERMERCADOS PARANAIBA | Cadastro
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/now-ui-dashboard.css?v=1.3.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="user-profile">
  <div class="wrapper ">
    <div class="sidebar" data-color="green">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="" class="simple-text logo-normal">
          <CENTER><b>SUPERMERCADOS PARANAIBA</b></CENTER>
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="./painel_de_controle.php">
              <i class="now-ui-icons tech_tv"></i>
              <p><b>Painel de Controle</p>
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
            <a class="navbar-brand" href="#agronomig">Inserir</a>
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
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Mais Ações</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
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
            <div class="card">
              <div class="card-header"><br><br>
                <center><h5><i class="fa fa-warning "></i> INSERIR OCORRÊNCIA</h5>
              </div>
              <div class="card-body">
                <form action="inserir.php" method="GET">
                  <div class="row">
                    
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Data</label>
                        <input type="date" name="nome" maxlength="100" class="form-control" required="" placeholder="Nome" >
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Selecionar Loja</label>
                        <select name="status" class="form-control">
                          <option value="ativo"></option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Selecionar Funcionário</label>
                        <select name="status" class="form-control">
                          <option value="ativo"></option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Motivo</label>
                           <select name="empresa" class="form-control">
                          <option value="">Advertência</option>
                          <option value="">Atestado</option>
                          <option value="">Atestado de Óbito</option>
                          <option value="">Erro Operacional</option>
                          <option value="">Falta Injustificada</option>
                          <option value="">Reembolso</option>
                          <option value="">Hora Extra</option>
                          <option value="">Afastamento INSS</option>
                          <option value="">Licença Maternidade</option>
                          <option value="">Licença Parternidade</option>
                          <option value="">Meta</option>
                          <option value="">Quebra de Caixa</option>
                          <option value="">Segunda Via Cartão</option>
                          <option value="">Vale Avulso</option>
                          <option value="">Atestado de Comparecimento</option>
                          <option value="">Feriado</option>
                        </select>
                      </div>
                    </div>
                  </div>
                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Arquivo</label>
                           <div class="custom-file">
                           <input type="file" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile"><i class="  fa fa-file fa-lg fa-fw" aria-hidden="true"></i> Este campo não é obrigatório</label>
                          </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Quantidade de Faltas</label>
                       <input type="number" name="datainicio" class="form-control" required="" >
                      </div>
                    </div>
                     <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Valor</label>
                       <input size="10" maxlength="10" onkeydown="FormataMoeda(this,10,event)" onkeypress="return maskKeyPress(event)" type="text" name="datainicio" class="form-control" required="" >
                      </div>
                    </div>
                  </div>

                 <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Observação</label>
                        <input type="text" name="datainicio" class="form-control" required="" >
                      </div>
                    </div>
                  </div>

                   <div class="row">
                    <div class="col-md-12">
                      <div class="form-group"><br>
                        <button type="submit" name="confirmar_notificacao" class="btn btn-outline-success" style="width: 100%;"><b> Cadastrar Ocorrência</b></button><br>
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
                </div><form action="inserir.php" method="GET">
                <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Data</label>
                        <input type="date" name="stat" class="form-control" required="" >
                      </div>
                    </div>
                  
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Selecionar Loja</label>
                        <select name="status" class="form-control">
                          <option value="ativo">1</option>
                        </select>
                      </div>
                    </div>            
                </div>

                  <div class="row">     

                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Selecionar Funcionário</label>
                        <select name="status" class="form-control">
                          <option value="ativo">1</option>
                        </select>
                      </div>
                    </div>              
                    
                     <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Motivo</label>
                        <select name="status" class="form-control">
                          <option value="ativo">Término de Contrato</option>
                          <option value="ativo">Término de Contrato Antecipado</option>
                          <option value="ativo">Aviso</option>
                          <option value="ativo">Dispensa</option>
                          <option value="ativo">Pedido de Demissão</option>
                        </select>
                      </div>
                    </div>         
                  </div>

                  <div class="row">
                       <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Tipo</label>
                        <select name="status" class="form-control">
                          <option value="ativo">Normal</option>
                          <option value="ativo">Acordo</option>
                          <option value="ativo">Justiça</option>
                        </select>
                      </div>
                    </div> 
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                       <label>Exame Demissional</label>
                         <select name="status" class="form-control">
                          <option value="ativo">Não</option>
                           <option value="ativo">Sim</option>
                        </select>
                      </div>
                    </div>
                  </div>

                 <div class="row">                 
                     <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Dias de Aviso</label>
                       <input type="number" name="diasaviso" class="form-control">
                      </div>
                    </div> 
                     <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Prazo</label>
                        <input type="number" name="anotacao" class="form-control">
                      </div>
                    </div> 
                 </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group"> 
                       <label>Status</label>
                        <select name="status" class="form-control">
                          <option value="ativo">Pago</option>
                          <option value="ativo">Pendente</option>
                        </select>
                      </div>
                    </div>
                  </div>

                   <div class="row">
                    <div class="col-md-12">
                      <div class="form-group"> 
                        <label>Observação</label>
                        <input type="number" name="anotacao" class="form-control">
                      </div>
                    </div>
                  </div>

             
                   <div class="row">
                    <div class="col-md-12">
                      <div class="form-group"><br>
                        <button type="submit" name="confirmar_notificacao" class="btn btn-outline-success" style="width: 100%;"><b>Cadastrar Rescisão</b></button><br>
                      </div>
                    </div>
                  </div>
               </div>

              </div>
            </div>



     </div> 
 <!-- FIM DIV -->

 <!-- INICIO DIV -->

      <div class="content">
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header"><br><br>
                <center><h5><i class="fa fa-plane"></i> INSERIR FÉRIAS</h5>
              </div>
              <div class="card-body">
                <form action="inserir.php" method="GET">                 
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Selecionar Loja</label>
                        <select name="status" class="form-control">
                          <option value="ativo">1</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Selecionar Funcionário</label>
                        <select name="status" class="form-control">
                          <option value="ativo">1</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Data Início</label>
                        <input type="date" name="dataferias" class="form-control" required="" >
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Quantidade de dias</label>
                         <input type="number" name="qntdias" class="form-control" required="" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Observação</label>
                        <input type="text" name="obsferias" class="form-control" required="" >
                      </div>
                    </div>
                  </div>
               
                   <div class="row">
                    <div class="col-md-12">
                      <div class="form-group"><br>
                        <button type="submit" name="confirmar_notificacao" class="btn btn-outline-success" style="width: 100%;"><b>Cadastrar Férias</b></button><br>
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
                </div><br>
                <form action="inserir.php" method="GET">
                 <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Status</label>
                        <input type="text" name="stat" class="form-control" required="" >
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Cor</label>
                        <select name="status" class="form-control">
                          <option value="ativo">Azul</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">                
                    <div class="col-md-12 ">
                      <div class="form-group">
                      <label>Prazo</label>
                      <input type="date" name="stat" class="form-control" required="" >
                      </div>
                    </div>
                  </div>
                  <div class="row">                
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label>Anotação</label>
                         <input type="text" name="anotacao" class="form-control" required="" >
                      </div>
                    </div>
                  </div>

             
                   <div class="row">
                    <div class="col-md-12">
                      <div class="form-group"><br>
                        <button type="submit" name="confirmar_notificacao" class="btn btn-outline-success" style="width: 100%;"><b>Cadastrar Lembrete</b></button><br>
                      </div>
                    </div>
                  </div>
                
                   </div>


                 </div>
               </div>
              </div>
            </div>
          </div>  <!-- FIM DIV -->


 <!-- INICIO DIV -->
      <div class="content">
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header"><br><br>
                <center><h5><i class="fa fa-user-plus"></i> CADASTRAR FUNCIONÁRIO</h5>
              </div>
              <div class="card-body">
                <form action="inserir.php" method="GET">
                  <div class="row">
                    
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Nome Completo</label>
                        <input type="text" name="nome" maxlength="100" class="form-control" required="" placeholder="Nome" >
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>CPF</label>
                        <input type="text" name="cpf" maxlength="14" class="form-control" required="" placeholder="CPF" OnKeyPress="formatar('###.###.###-##', this)">
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
                        <input type="date" name="datanascimento" class="form-control" required="" >
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control">
                          <option value="ativo">Ativo</option>
                          <option value="afastado">Afastado</option>
                          <option value="inativo">Inativo</option>
                          <option value="transferido">Transferido</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Empresa</label>
                        <select name="empresa" class="form-control">
                          <option value="">puxar do banco as empresas que o adm administra</option>
                        </select>
                      </div>
                    </div>
                  </div>
                 <div class="row">
                    <div class="col-md-6 pr-1">
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
                    <div class="col-md-6 pl-1">
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
                  </div>

                   <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Data de Início</label>
                        <input type="date" name="datainicio" class="form-control" required="" >
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Vale Transporte</label>
                        <select name="vt" class="form-control">
                          <option value="nenhum">Nenhum</option>
                          <option value="otimo">Ótimo</option>
                          <option value="bhbus">Bhbus</option>
                          <option value="combustivel">Combustível</option>
                          <option value="dinheiro">Dinheiro</option>
                        </select>
                      </div>
                    </div>
                  </div>

                   <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Valor do Vale Transporte</label>
                        <input size="10" maxlength="10" onkeydown="FormataMoeda(this,10,event)" onkeypress="return maskKeyPress(event)" type="text" name="valorvt" class="form-control" required="" placeholder="Valor do Vale Transporte" >
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Salário</label>
                         <input size="10" maxlength="10" onkeydown="FormataMoeda(this,10,event)" onkeypress="return maskKeyPress(event)" type="text" name="salario" class="form-control" required="" placeholder="Salário" >
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Nome Pai</label>
                        <input type="text" name="nomepai" class="form-control" required="" placeholder="Nome do Pai" >
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Nome Mãe</label>
                        <input type="text" name="nomemae" class="form-control" required="" placeholder="Nome da Mãe" >
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Observação</label>
                        <input type="text" name="obs" maxlength="500" class="form-control" required="" placeholder="Observação" >
                      </div>
                    </div>
                  </div>
                   <div class="row">
                    <div class="col-md-12">
                      <div class="form-group"><br>
                        <button type="submit" name="confirmar_notificacao" class="btn btn-outline-success" style="width: 100%;"><b>Cadastrar Funcionário</b></button><br>
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
                  <H5><i class="fa fa-user-secret"></i>  CADASTRAR USUÁRIO ADMINISTRATIVO </H5>
                </div><form action="inserir.php" method="GET">
                 <div class="row"><div class="col-md-12">
                  <!--Caso o usuário já exista-->
                    <center><b style="color: red">
                    <?php /*
                      echo "".$erro_usuario; */
                    ?>
                    </b></center><center>
                    <div class="col-md-8">
                      <div class="form-group">
                        <center><label>Nome</label>
                        <input type="text" name="nome" class="form-control" required="" >
                      </div>
                       </div>
                      <center>
                    <div class="col-md-8">
                      <div class="form-group">
                        <center><label>Usuário</label>
                        <input type="text" name="login" class="form-control" required="" >
                      </div>
                    </div>
                    <div class="col-md-8">
                      <div class="form-group">
                        <center><label>Senha</label>
                        <input type="password" name="senha" id="myInput" class="form-control" required="" ></center>
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
                                        <tr>
                                          <td><input type="checkbox" name="valor1" id="preco" value="1"></td>
                                          <td>PLANALTO</td>
                                        </tr>
                                        <tr>
                                          <td><input type="checkbox" name="valor1" id="preco" value="2"></td>
                                          <td>RODOVIARIA</td>
                                        </tr>
                                        <tr>
                                          <td><input type="checkbox" name="valor1" id="preco" value="2"></td>
                                          <td>VARZEA</td>
                                        </tr>
                                        <tr>
                                          <td><input type="checkbox" name="valor1" id="preco" value="2"></td>
                                          <td>GUANABARA</td>
                                        </tr>
                                        <tr>
                                          <td><input type="checkbox" name="valor1" id="preco" value="2"></td>
                                          <td>BOTAFOGO</td>
                                        </tr>
                                        <tr>
                                          <td><input type="checkbox" name="valor1" id="preco" value="2"></td>
                                          <td>RIO BRANCO</td>
                                        </tr>
                                      </tbody>
                                    </table>

                                </div>
                             </div>
                           </div>
                        </div>


                        <button type="submit" name="confirmar_user_adm" class="btn btn-outline-success" style="width: 100%"><b>Cadastrar Administrador</b></button>
                      </form>
                    </div>
                  </div>
              </div>

              </div>
            </div>
          </div> 
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

  <style type="text/css">
  input[type='radio'] {
  border: 1px solid #fff;
  width: 30px;
  height: 30px;
  display: grid;
  place-content: center;
  border-radius: 50%;
}
input[type='checkbox'] {
  border: 1px solid #fff;
  width: 30px;
  height: 30px;
  display: grid;
  place-content: center;
  border-radius: 50%;
}
/*input[type='text'] {
 font-size: 15px;
}
input[type='number'] {
 font-size: 15px;
}
*/



</style>
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