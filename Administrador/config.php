<?php 
    // Pagina que se encarga de la configuracion general del portal
    // Se extraen los datos de configuracion de BD
    $params = parse_ini_file(sprintf('%s/parameter.ini.dist', __DIR__), true);
    //Se definen las variables globales
    define('BD_PARAMETERS', $params);

    //Mostrar errores en produccion
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
?>