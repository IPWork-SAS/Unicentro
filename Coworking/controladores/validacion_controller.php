<?php 
    include './db/campania.class.php';

    class Validacion {
        public function getUrlRedirection($mac = '') {
            $campania = new Campania();
            $entries = $campania->validarMac($mac);
            if(empty($entries)) {   
                return 'Location: vistas/formulario.php';
            } else {
                return 'Location: vistas/banner.php';
            }
        }

        public function getUrlRedirectionByDay($mac = '') {
            $campania = new Campania();
            $usuario = $campania->getUserByMac($mac);

            if(isset($usuario)) {
                $fecha_creacion = $usuario->fecha_creacion;
                //Instanciamos como datetime la fecha de hoy
                $now = new DateTime($this->getDatetimeNow());
                //Instanciamos como datetime la fecha de creacion del registro
                $otherDate = new DateTime($fecha_creacion);
                //Reseteamos el tiempo de ambos datetimes
                $now->setTime( 0, 0, 0 );
                $otherDate->setTime( 0, 0, 0 );

                //Verificamos la diferencia
                if($now->diff($otherDate)->days === 0) {
                    return 'Location: vistas/banner.php';     
                } else  {
                    return 'Location: vistas/formulario.php';  
                }
            } else {
                return 'Location: vistas/formulario.php';
            }
        }

        function getDatetimeNow() {
            $tz_object = new DateTimeZone('America/Bogota');
            //date_default_timezone_set('Brazil/East');
        
            $datetime = new DateTime();
            $datetime->setTimezone($tz_object);
            return $datetime->format('Y\-m\-d\ h:i:s');
        }
    }
?>