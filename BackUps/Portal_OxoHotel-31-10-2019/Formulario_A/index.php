<?php 
    session_start();
    // Se Obtiene la IP del AP de Ruckus
    if (isset($_GET['sip'])) {
        $_SESSION['ip_ap'] = $_GET['sip'];
    }
    if (isset($_GET['mac'])) {
        $_SESSION['mac_ap'] = $_GET['mac'];
    }
    if (isset($_GET['client_mac'])) {
        $_SESSION['mac_cliente'] = $_GET['client_mac'];
    }
    if (isset($_GET['uip'])) {
        $_SESSION['ip_cliente'] = $_GET['uip'];
    }
    if (isset($_GET['ssid'])) {
        $_SESSION['ssid'] = $_GET['ssid'];
    }

    header( 'Location: vistas/formulario.php');

?>