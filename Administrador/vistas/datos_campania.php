<?php
    include_once 'includes/datos_campania.php';
    include_once 'includes/utilities.class.php';

    $id_evento = $_GET['id'];
    $nombre_campania = $_GET['nc'];
    date_default_timezone_set('America/Bogota');
  
    $campania = new DatosCampania();
    
    $fecha_inicial = date('Y-m-d');
    $hora_inicial = "00:00";
    $fecha_final = date('Y-m-d');
    $hora_final = date('H:i');
    $fecha_inicial_total = $fecha_inicial." ".$hora_inicial.":00";
    $fecha_final_total = $fecha_final." ".$hora_final.":00";

    $columnasCampania = $campania->getCamposTabla($nombre_campania);
    $columnasTabla = $campania->getCamposTabla($nombre_campania);
    $columnasSeleccionadas = "";

    for($i=2; $i < count($columnasCampania); $i++){
        $columnasSeleccionadas .= $columnasCampania[$i].", ";
    }
    
    $utilities = new Utilities();
    
    if(isset($_POST['submitFiltro'])){
        $columnas = array();
        $columnasSeleccionadas = "";

        $fecha_inicial = $_POST['fecha_inicial'];
        $hora_inicial = $_POST['hora_inicial'];
        $fecha_final = $_POST['fecha_final'];
        $hora_final = $_POST['hora_final'];
        $fecha_inicial_total = $fecha_inicial." ".$hora_inicial.":00";
        $fecha_final_total = $fecha_final." ".$hora_final.":00";

        for($i=0; $i < count($columnasCampania); $i++){
            $columnas[$i] = $columnasCampania[$i];
        }

        $columnasCampania = array();
        for($i=2; $i < count($columnas); $i++){
            if(isset($_POST[$columnas[$i]]) && $_POST[$columnas[$i]] == 'on'){
                $columnasCampania[$i] = $columnas[$i];
                $columnasSeleccionadas .= $columnas[$i].", ";
            }
        }
    }
    $columnasSeleccionadas =  substr($columnasSeleccionadas, 0 , -2);
    $campanias = $campania->getDatosCampania($nombre_campania, $id_evento, $columnasSeleccionadas, $fecha_inicial_total, $fecha_final_total);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Administrador de Portales</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.php">Administrador de Portales</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <!-- <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div> -->
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Cerrar Sesión</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link">
          <span>Menu</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?doc=eventos&id=1">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Eventos</span></a>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="index.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Datos de la Campaña</li>
        </ol>
        <div class="card mb-3">
          <div class="card-header-boton">
            <div class="enunciado_tabla">
                <i class="fas fa-filter"></i>
                Filtro
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <form action="" method="POST" class="col-lg-12 col-md-12 col-sm-12" id="filtro">
                  <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                      <div class="col-lg-12 col-md-12 col-sm-12">
                        <label for="fecha_inicial">Fecha Inicial</label>
                      </div>
                      <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <input type="date" class="form-control" id="fecha_inicial" required name="fecha_inicial" value="<?php echo $fecha_inicial;?>">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <input type="time" class="form-control" id="hora_inicial" required name="hora_inicial" value="<?php echo $hora_inicial;?>">
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                      <div class="col-lg-12 col-md-12 col-sm-12">
                        <label for="fecha_final">Fecha Final</label>
                      </div>
                      <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <input type="date" class="form-control" id="fecha_final" required name="fecha_final" value="<?php echo $fecha_final;?>">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <input type="time" class="form-control" id="hora_final" required name="hora_final" value="<?php echo $hora_final;?>">
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <a class="btn btn-primary offset-md-5 offset-lg-5" id="btn_columns" role="button" onclick="ShowColumn();">
                            <i class="fas fa-columns"></i>
                            Ver Coulumnas
                        </a>
                        <div class="row" id="div_columns" style="overflow: hidden; height: 60px;">
                        <?php for($i = 0; $i < count($columnasTabla); $i++):?>
                            <?php if($columnasTabla[$i] != 'id' && $columnasTabla[$i] != 'id_evento'): ?>
                            <?php $columnaUtilities = $utilities->getCorrectNameFromColumn($columnasTabla[$i]);?> 
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <div class="col-lg-12 col-md-12-col-sm-12">
                                    <label for=""><?php echo $columnaUtilities;?></label>
                                </div>
                                <div class="col-lg-12 col-md-12-col-sm-12">
                                    <input type="checkbox" name="<?php echo $columnasTabla[$i];?>" <?php if (isset($columnasCampania[$i])){if($columnasTabla[$i] == $columnasCampania[$i]){echo 'checked';}}; ?>>
                                </div>
                            </div>
                            <?php endif;?>
                        <?php endfor;?>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 form-group offset-md-5 offset-lg-5" style="padding-top: 30px;">
                      <input type="submit" form="filtro" name="submitFiltro" class="btn btn-primary" value="Filtrar">
                    </div>
                  </div>
              </form>
            </div>
          </div>
        </div>
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header-boton">
                <div class="enunciado_tabla">
                    <i class="fas fa-table"></i>
                    Lista de los datos de la campaña
                </div>
                <div class="button-card-header">
                    <a class="btn btn-primary" href="index.php?doc=cvs&id=<?=$id_evento."&nc=".$nombre_campania."&col_sel=".$columnasSeleccionadas."&fecha_inicial=".$fecha_inicial_total."&fecha_final=".$fecha_final_total?>">Descargar CVS</a>
                </div>                
            </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>                  
                  <tr>
                    <?php 
                      foreach ($columnasCampania as $columna) {
                          if($columna != 'id' && $columna != 'id_evento') {
                            echo '<th>'.$utilities->getCorrectNameFromColumn($columna).'</th>'; 
                          }
                      }
                    ?>
                  </tr>
                </thead>
                <tfoot>
                  <tr>                  
                  <?php 
                      foreach ($columnasCampania as $columna) {
                        if($columna != 'id' && $columna != 'id_evento') {
                          echo '<th>'.$utilities->getCorrectNameFromColumn($columna).'</th>'; 
                        }
                      }
                    ?>
                  </tr>
                </tfoot>
                <tbody> 
                  <?php  foreach($campanias as $row): ?>
                        <tr>
                          <?php 
                            foreach ($columnasCampania as $columna) {
                              if($columna != 'id' && $columna != 'id_evento') {
                                echo '<td>'.$row[$columna].'</td>';
                              }
                            }
                          ?>
                        </tr>
                  <?php endforeach;?>                 
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Ultima actualizacion: <?=$campania->getFechaUltimaEntrada($nombre_campania, $id_evento)?></div>
        </div>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © IPwork S.A.S. 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">¿Listo para salir?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Se dispone a cerrar la sesión, ¿está listo para finalizar su sesión actual?.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-primary" href="includes/logout.php">Aceptar</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>
  <script>
    //   $(document).ready(function(){
        function ShowColumn(){
            $("#btn_columns").empty();
            if($("#div_columns").css('height') == '60px'){
                $("#btn_columns").append(`
                    <i class="fas fa-columns"></i>
                    Ocultar Coulumnas
                `);
                $("#div_columns").css('height', 'initial');
            }
            else{
                $("#btn_columns").append(`
                    <i class="fas fa-columns"></i>
                    Ver Coulumnas
                `);
                $("#div_columns").css('height', '60px')
            }
        }
    //   });
  </script>
</body>

</html>
