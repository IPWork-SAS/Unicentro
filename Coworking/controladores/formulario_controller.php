<?php 
    //Se llaman las librerias y clases necesarias
    include_once "../db/campania.class.php";

    //Datos de que suministra el AP
    session_start();
    
    $ip_ap = isset($_SESSION['ip_ap']) ? trim($_SESSION['ip_ap']) : "";  
    $mac_ap = isset($_SESSION['mac_ap']) ? trim($_SESSION['mac_ap']) : "";  
    $mac_cliente = isset($_SESSION['mac_cliente']) ? trim($_SESSION['mac_cliente']) : "";  
    $ip_cliente = isset($_SESSION['ip_cliente']) ? trim($_SESSION['ip_cliente']) : "";  
    $ssid = isset($_SESSION['ssid']) ? trim($_SESSION['ssid']) : "";

     

    // Some of these attributes come from hidden fields.
	$nombre = isset($_POST['nombre']) ? removeAccents(trim($_POST['nombre'])) : "";
    $_SESSION['nombre']=$_POST['nombre'];
	$email = isset($_REQUEST['email']) ? removeAccents(trim($_REQUEST['email'])) : "";
	$edad = isset($_REQUEST['edad']) ? trim($_REQUEST['edad']) : "";
	$telefono = isset($_REQUEST['telefono']) ? trim($_REQUEST['telefono']) : "";
    $genero = isset($_REQUEST['genero']) ? trim($_REQUEST['genero']) : "";
    $os = isset($_REQUEST['os']) ? trim($_REQUEST['os']) : "";
    $id_pais = isset($_REQUEST['id_pais']) ? trim($_REQUEST['id_pais']) : "";
    
    $campania = new Campania;
    $campania->nombre = $nombre;
    $campania->id_evento = 1;
    $_SESSION['fecha_creacion'] = getDatetimeNow();
    $campania->fecha_creacion = $_SESSION['fecha_creacion'];
    $campania->email = $email;
    $campania->edad = $edad;
    $campania->telefono = $telefono;
    $campania->genero = $genero;
    $campania->ssid = $ssid;
    $campania->os = $os;
    $campania->mac_cliente = $mac_cliente;
    $campania->ip_cliente = $ip_cliente;
    $campania->mac_ap = $mac_ap;
    $campania->ip_ap = $ip_ap;
    $campania->id_pais = $id_pais;
    
    $campania->save();

    //construimos la url de habilitacion de internet
    // $redirection = AEROHIVE_RUTA.'?username='.AEROHIVE_USERNAME.'&password='.AEROHIVE_PASSWORD.'&autherr=0';
	header( 'Location: ../vistas/banner.php');
    exit;
    

    function getDatetimeNow() {
        $tz_object = new DateTimeZone('America/Bogota');
        //date_default_timezone_set('Brazil/East');
    
        $datetime = new DateTime();
        $datetime->setTimezone($tz_object);
        return $datetime->format('Y\-m\-d\ h:i:s');
    }

    function removeAccents($str) {
        $unwanted_array = array(    'Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
                            'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
                            'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
                            'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
                            'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y' );
        $string = strtr( $str, $unwanted_array );
        return $string;
    }
?>
