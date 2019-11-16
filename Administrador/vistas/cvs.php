<?php
    include_once 'includes/datos_campania.php';
    include_once 'includes/cvs.class.php';

    $id_evento = $_GET['id'];
    $nombre_campania = $_GET['nc'];
    $columnasSeleccionadas = $_GET['col_sel'];
    $fecha_inicial_total = $_GET['fecha_inicial'];
    $fecha_final_total = $_GET['fecha_final'];

    $campania = new DatosCampania();
    $datos_campania = $campania->getDatosCampaniaArray($nombre_campania, $id_evento, $columnasSeleccionadas, $fecha_inicial_total, $fecha_final_total);
    $nombre_base_datos = $campania->getDatabaseName($nombre_campania);
    $campos_tabla = explode(",", $columnasSeleccionadas);

    $csv = new CSV();
    $csv->generarCVS($nombre_campania, $datos_campania, $nombre_base_datos, $campos_tabla);
?>