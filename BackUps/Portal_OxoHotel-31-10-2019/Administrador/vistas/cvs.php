<?php
    include_once 'includes/datos_campania.php';
    include_once 'includes/cvs.class.php';
    include_once 'includes/datos_campania.php';

    $id_evento = $_GET['id'];
    $nombre_campania = $_GET['nc'];

    $campania = new DatosCampania();
    $datos_campania = $campania->getDatosCampaniaArray($nombre_campania, $id_evento);
    $nombre_base_datos = $campania->getDatabaseName($nombre_campania);
    $campos_tabla = $campania->getCamposTabla($nombre_campania, $nombre_base_datos);

    $csv = new CSV();
    $csv->generarCVS($nombre_campania, $datos_campania, $nombre_base_datos, $campos_tabla);
?>