<?php 
//Puxando Info do Usuário
include_once "../complements/inicio_php.php";

//Carregando o inicio da pagina
require "../complements/begin_page.php";

//carregando o menu
require "../complements/navbar.php";

?>


      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row"><div class="col-lg-2"></div>
          <div class="col-lg-8">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category"><i class="fa fa-user-secret"></i> Administrador</h5>
                <h4 class="card-title">Olá,  <?php echo $_SESSION["id_usuario_login"]['nome_completo'] ?></h4>
                <div class="chart" id="graficoProdutosAnual"></div>
              </div>
              <div class="card-footer ">
                <div class="stats">
                  <i class="now-ui-icons ui-1_calendar-60"></i> <?php echo date("d/m/Y"); ?> 
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">

          <div class="col-lg-4">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category"><i class="fa fa-exclamation-triangle"></i> Aviso</h5>
                <h4 class="card-title">Prazo de Rescisões Próximas</h4>
                <div class="chart" id="graficoVendedor"></div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="now-ui-icons loader_refresh spin"></i> Atualizando
                </div>
              </div>
            </div>
          </div>

           <div class="col-lg-4">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category"><i class="fa fa-tags"></i> Lembrete</h5>
                <h4 class="card-title">status Lembrete</h4>
                <h5>anotação</h5>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="now-ui-icons ui-1_calendar-60"></i> Data
                </div>
              </div>
            </div>
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
  
</body>

<script src="assets/lib/jquery.min.js"></script>
<script src="assets/lib/bootstrap.min.js"></script>
<script src="assets/lib/raphael.min.js"></script>
<script src="assets/lib/morris.min.js"></script>

<script>
    $(function () {
        var data4 = {};

        $.ajax({
            url: "../inc/dados_grafico_vendedor.php",
            async: false,
            dataType: 'json',
            success: function(data) {
                data4 = data;
            }
        });

        var bar = new Morris.Bar({
            element: 'bar-chart',
            resize: true,
            data: data4,
            barColors: ['#5F9EA0', '#cd5c5c', '#778899', '#ff4500', '8b4513'],
            xkey: 'eixoX',
            ykeys: ['a', 'b','c','d','e'],
            labels: ['a)', 'b)', 'c)', 'd)', 'e)'],
            hideHover: 'auto'
        });

    });
</script>

</html>