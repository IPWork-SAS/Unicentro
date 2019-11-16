<?php
    try {
        $link = new \PDO(
            'mysql:host=localhost;dbname=portal_oxohotel;charset=utf8mb4', //'mysql:host=localhost;dbname=canvasjs_db;charset=utf8mb4',
            'root', 
            // 'IPwork2019.',
            '',
            array(
                \PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_PERSISTENT => false
                )
            );
    }catch (\PDOException $ex) {
        print($ex->getMessage());
    }
    $eventos[0] = array();
    $eventos[1] = array();
    $eventos[2] = array();
    $eventos[3] = array();
    $eventos[4] = array();
    $eventos[5] = array();
    if(isset($_POST['id']) && $_POST['id'] <> null){
        $fecha_inicial = date('Y-m-d h:i:s', strtotime ($_POST['fecha_inicial']));
        $fecha_final = date('Y-m-d h:i:s', strtotime ($_POST['fecha_final']));
        /* Consulta de la tabla del evento */
        $handle = $link->prepare("select campania from eventos where id = ".$_POST['id']);
        $handle->execute();
        $tabla = $handle->fetchAll(\PDO::FETCH_OBJ);
        $tabla = $tabla[0]->campania;

        /* Consulta de las personas por género */
        $handle = $link->prepare('SELECT genero, COUNT(*) AS personas FROM '.$tabla.' WHERE fecha_creacion BETWEEN "'. $fecha_inicial .'" AND "'. $fecha_final .'" GROUP BY genero');
        $handle->execute();
        $genero = $handle->fetchAll(\PDO::FETCH_OBJ);
        foreach ($genero as $row) {
            array_push($eventos[0], array("genero" => $row->genero, "personas" => $row->personas));
        } 
        /* Consulta de las personas por ap */
        $handle = $link->prepare('SELECT ip_ap, COUNT(*) AS personas FROM '.$tabla.' WHERE fecha_creacion BETWEEN "'. $fecha_inicial .'" AND "'. $fecha_final .'" GROUP BY ip_ap');
        $handle->execute();
        $ap = $handle->fetchAll(\PDO::FETCH_OBJ);
        foreach ($ap as $row) {
            array_push($eventos[1], array("personas" => $row->personas));
        }
        
        /* Consulta de las personas por páis */
        $handle = $link->prepare('SELECT paises.nombre_esp, pac.id_pais, COUNT(*) AS personas FROM '.$tabla.' AS pac INNER JOIN paises ON pac.id_pais = paises.id WHERE pac.fecha_creacion BETWEEN "'. $fecha_inicial .'" AND "'. $fecha_final .'" GROUP BY pac.id_pais, paises.nombre_esp');
        $handle->execute();
        $pais = $handle->fetchAll(\PDO::FETCH_OBJ);
        foreach ($pais as $row) {
            array_push($eventos[2], array("nombre_esp" => $row->nombre_esp, "personas" => $row->personas));
        }

        /* Consulta de las personas por edad */
        $handle = $link->prepare('SELECT edad, COUNT(*) AS personas FROM '.$tabla.' WHERE fecha_creacion BETWEEN "'. $fecha_inicial .'" AND "'. $fecha_final .'" GROUP BY edad');
        $handle->execute();
        $edad = $handle->fetchAll(\PDO::FETCH_OBJ);
        foreach ($edad as $row) {
            array_push($eventos[3], array("edad" => $row->edad, "personas" => $row->personas));
        }

        /* Consulta de las personas por sistema operativo */
        $handle = $link->prepare('SELECT os, COUNT(*) AS personas FROM '.$tabla.' WHERE fecha_creacion BETWEEN "'. $fecha_inicial .'" AND "'. $fecha_final .'" GROUP BY os');
        $handle->execute();
        $os = $handle->fetchAll(\PDO::FETCH_OBJ);
        foreach ($os as $row) {
            array_push($eventos[4], array("os" => $row->os, "personas" => $row->personas));
        }

        /* Consulta de las personas por fecha*/
        $handle = $link->prepare('SELECT date(fecha_creacion) as fecha, COUNT(*) AS personas FROM publicidad_a_2019_campania WHERE fecha_creacion BETWEEN "'. $fecha_inicial .'" AND "'. $fecha_final .'" GROUP BY date(fecha_creacion)');
        $handle->execute();
        $fecha = $handle->fetchAll(\PDO::FETCH_OBJ);
        foreach ($fecha as $row) {
            array_push($eventos[5], array("fecha" => $row->fecha, "personas" => $row->personas));
        }

        echo json_encode($eventos);
    }
?>