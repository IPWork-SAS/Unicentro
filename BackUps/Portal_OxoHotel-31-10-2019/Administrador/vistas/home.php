<?php
  include_once 'includes/locacion.php';

  $eventos = "eventos";
  
  $locacion = new Locacion();
  $locaciones = $locacion->getLocaciones();

  $dataPoints = array();
  $dataPoints1 = array();
  //Best practice is to create a separate file for handling connection to database
  try{
      // Creating a new connection.
      // Replace your-hostname, your-db, your-username, your-password according to your database
      $link = new \PDO(   'mysql:host=localhost;dbname=portal_oxohotel;charset=utf8mb4', //'mysql:host=localhost;dbname=canvasjs_db;charset=utf8mb4',
                          'root', //'root',
                          'IPwork2019.', //'',
                          array(
                              \PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                              \PDO::ATTR_PERSISTENT => false
                          )
                      );
    
      $handle = $link->prepare('select count(edad) numPersonas, edad 
                                  from portal_oxohotel.publicidad_a_2019_campania
                                  group by edad
                                  order by edad asc'); 
      $handle->execute(); 
      $result = $handle->fetchAll(\PDO::FETCH_OBJ);

      $handle1 = $link->prepare('select fecha_creacion, day(fecha_creacion) as dia, count(*) as numPersonas
                                  from publicidad_a_2019_campania
                                  group by fecha_creacion
                                  order by fecha_creacion asc'); 
      $handle1->execute(); 
      $result1 = $handle1->fetchAll(\PDO::FETCH_OBJ);
      
      foreach($result as $row){
          array_push($dataPoints, array("x"=> $row->edad, "y"=> $row->numPersonas));
      }

      foreach($result1 as $row){
        array_push($dataPoints1, array("x"=> $row->dia, "y"=> $row->numPersonas));
      }

      $link = null;
  }
  catch(\PDOException $ex){
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

  <script>
    window.onload = function () {

      
    
    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        exportEnabled: true,
        theme: "light1", // "light1", "light2", "dark1", "dark2"
        title:{
            text: "Numero de Personas por Edad",
            fontFamily: "tahoma",
        },
        zoomEnabled: true,
        axisX: {
            title: "Edad",
            interval: 4
        },
        axisY: {
            title: "Numero Personas"            
        },
        data: [{
            type: "column", //change type to bar, line, area, pie, etc  
            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
        }]
    });
    chart.render(); 

    CanvasJS.addColorSet("greenShades",
                [//colorSet Array

                "#2F4F4F",
                "#008080",
                "#2E8B57",
                "#3CB371",
                "#90EE90"                
                ]);


    var chart1 = new CanvasJS.Chart("chartContainer1", {
        animationEnabled: true,
        exportEnabled: true,
        theme: "light1", // "light1", "light2", "dark1", "dark2"
        title:{
            text: "Numero de Personas por Fecha",
            fontFamily: "tahoma",
        },
        zoomEnabled: true,
        axisX: {
            title: "Dia"
        },
        axisY: {
            title: "Numero Personas",
            interval: 1            
        },
        data: [{
          type: "bar",              
          dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
        }]
    });
    chart1.render();
}
</script>

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
        <a class="nav-link" href="index.php">
          <span>Menu</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Locaciones</span></a>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Administrador</a>
          </li>
          <li class="breadcrumb-item active">Locaciones</li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Lista de locaciones</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Fecha Creacion</th>
                    <th>Descripcion</th>
                    <th>Eventos</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>                  
                    <th>Nombre</th>
                    <th>Fecha Creacion</th>
                    <th>Descripcion</th>
                    <th>Eventos</th>
                  </tr>
                </tfoot>
                <tbody> 
                  <?php  foreach($locaciones as $row): ?>
                        <tr>
                            <td><?=$row['nombre'];?></td>
                            <td><?=$row['fecha_creacion'];?></td>
                            <td><?=$row['descripcion'];?></td>
                            <td><a href="index.php?doc=<?=$eventos."&id=".$row['id'];?>">Ver</a></td>
                        </tr>
                  <?php endforeach;?>                 
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Ultima actualizacion: <?=$locacion->getFechaUltimaEntrada()?></div>
        </div>

        <!-- Area Chart Example-->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>
            Eventos
          </div>
          <div class="card-body">            
              <div class="card-header">
                <i class="fas fa-chart-area"></i>
                Publicidad_A
              </div>
              <div class="card-body">               
                <div class="row">
                  <div class="col-lg-6">
                    <div class="card mb-3">
                      <div class="card-header">
                        <i class="fas fa-chart-bar"></i>
                        Numero de Personas por Edad</div>
                      <div class="card-body">
                      <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                      </div>
                      <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="card mb-3">
                      <div class="card-header">
                        <i class="fas fa-chart-pie"></i>
                        Numero de Personas por Dia</div>
                      <div class="card-body">
                        <div id="chartContainer1" style="height: 390px; width: 100%;"></div>
                      </div>
                      <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                    </div>
                  </div>
                </div>
              </div>
              </div>               
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
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
  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>

</html>
