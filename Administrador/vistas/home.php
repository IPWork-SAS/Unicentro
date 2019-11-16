<?php
include_once 'includes/locacion.php';

$eventos = "eventos";

$locacion = new Locacion();
$locaciones = $locacion->getLocaciones();

$dataPoints = array();
$dataPoints1 = array();
$eventosArray = array();
//Best practice is to create a separate file for handling connection to database
try {
  // Creating a new connection.
  // Replace your-hostname, your-db, your-username, your-password according to your database
  $link = new \PDO(
    'mysql:host=localhost;dbname=portal_oxohotel;charset=utf8mb4', //'mysql:host=localhost;dbname=canvasjs_db;charset=utf8mb4',
    'root', //'root',
    /* 'IPwork2019.', */
    '',
    array(
      \PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      \PDO::ATTR_PERSISTENT => false
    )
  );
  /* Consulta el ultimo evento registrado */
  $handle = $link->prepare("select * from eventos ORDER BY fecha_inicio DESC LIMIT 1");
  $handle->execute();
  $resultEvento = $handle->fetchAll(\PDO::FETCH_OBJ);
  
  $id_evento = $resultEvento[0]->id;
  $fecha_inicial = date('Y-m-d', strtotime ($resultEvento[0]->fecha_inicio));
  $hora_inicial = date('h:i', strtotime ($resultEvento[0]->fecha_inicio));
  $fecha_final = date('Y-m-d', strtotime ($resultEvento[0]->fecha_fin));
  $hora_final = date('h:i', strtotime ($resultEvento[0]->fecha_fin));
  

  /* Pregunta si se ha establecido un filtro de fecha */
  if (isset($_POST['fecha_inicial']) && isset($_POST['fecha_final']) && isset($_POST['hora_inicial']) && isset($_POST['hora_final'])) {
    $fecha_inicial = $_POST["fecha_inicial"];
    $hora_inicial = $_POST['hora_inicial'];
    $fecha_final = $_POST["fecha_final"];
    $hora_final = $_POST['hora_final'];
    $id_evento = 0;
  }

  /* Se hace la consulta de todos los eventos segun fecha otorgada */
  $handle = $link->prepare("select * from eventos where fecha_inicio between '" .$fecha_inicial." ".$hora_inicial. "' AND '" .$fecha_final." ".$hora_final. "'");
  $handle->execute();
  $resultFilter = $handle->fetchAll(\PDO::FETCH_OBJ);

  foreach ($resultFilter as $row) {
    array_push($eventosArray, array("nombre" => $row->nombre, "id" => $row->id));
  }
  
  $handle = $link->prepare('select count(edad) numPersonas, edad 
                                  from portal_oxohotel.publicidad_a_2019_campania
                                  group by edad
                                  order by edad asc');
  $handle->execute();
  $result = $handle->fetchAll(\PDO::FETCH_OBJ);

  $handle1 = $link->prepare('select day(fecha_creacion) as dia, count(*) as numPersonas
                                  from publicidad_a_2019_campania
                                  group by fecha_creacion
                                  order by fecha_creacion asc');
  $handle1->execute();
  $result1 = $handle1->fetchAll(\PDO::FETCH_OBJ);

  foreach ($result as $row) {
    array_push($dataPoints, array("x" => $row->edad, "y" => $row->numPersonas));
  }

  foreach ($result1 as $row) {
    array_push($dataPoints1, array("x" => $row->dia, "y" => $row->numPersonas));
  }

  $link = null;
} catch (\PDOException $ex) {
  print($ex->getMessage());
}
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

  <!-- Styles for library chart.js -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.css">
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
        </ol>

        <!-- Area Chart Example-->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>
            Eventos
          </div>
          <div class="card-body">
            <form action="" method="POST" class="col-lg-12 col-md-12 col-sm-12">
              <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-12 form-group">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <label for="fecha_inicial">Fecha Inicial</label>
                  </div>
                  <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                      <input type="date" class="form-control" id="fecha_inicial" required name="fecha_inicial" value="<?php echo $fecha_inicial; ?>">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                      <input type="time" class="form-control" id="hora_inicial" required name="hora_inicial" value="<?php echo $hora_inicial; ?>">
                    </div>
                  </div>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-12 form-group">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <label for="fecha_final">Fecha Final</label>
                  </div>
                  <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                      <input type="date" class="form-control" id="fecha_final" required name="fecha_final" value="<?php echo $fecha_final; ?>">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                      <input type="time" class="form-control" id="hora_final" required name="hora_final" value="<?php echo $hora_final; ?>">
                    </div>
                  </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-12 form-group" style="padding-top: 30px;">
                  <input type="submit" class="btn btn-primary" value="Filtrar">
                </div>
              </div>
            </form>
            <div class="row">
              <div class="col-md-12 col-lg-12 col-sm-12 form-group">
                <div class="col-md-12 col-lg-12 col-sm-12">
                  <label for="evento">Evento</label>
                </div>
                <div class="col-md-12 col-lg-12 col-sm-12">
                  <select name="evento" id="evento" class="form-control" require onchange="CambioEnvento('<?php echo $fecha_inicial;?>', '<?php echo $hora_inicial;?>', '<?php echo $fecha_final;?>', '<?php echo $hora_final;?>');">
                    <option value="">Seleccione ...</option>
                    <?php foreach ($eventosArray as $evento) : ?>
                      <option value="<?php echo $evento['id']; ?>" <?php echo $id_evento == $evento['id'] ? 'selected' : ''?>><?php echo $evento['nombre']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="row" id="graficas">
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
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
  <script src="js/script_graficas.js"></script>
  <!-- <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
  <script>
      $(document).ready(function(){
        <?php if($id_evento <> 0):?>
          ConsultaGraficas(<?php echo $id_evento;?>, '<?php echo $fecha_inicial;?>', '<?php echo $hora_inicial;?>', '<?php echo $fecha_final;?>', '<?php echo $hora_final;?>');
        <?php endif;?>
		  });
  </script>
</body>

</html>