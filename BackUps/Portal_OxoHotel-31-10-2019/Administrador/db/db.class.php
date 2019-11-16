<?php
    include 'config.php';
    include 'db/orm.class.php';

    $params = BD_PARAMETERS;    

    $conn = new mysqli($params['database']['host'], $params['database']['user'], $params['database']['password']);

    if ($conn->connect_error)
        die(sprintf('No se ha podido realizar la conexion con la base de datos. %s', $conn->connect_error));

    // Tell SimpleOrm to use the connection you just created.
    Orm::useConnection($conn, $params['database']['name']);