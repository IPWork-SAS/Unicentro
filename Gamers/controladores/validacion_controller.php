<?php 
    include './db/campania.class.php';

    class Validacion {
        public function getUrlRedirection($mac = '') {
            $campania = new Campania();
            $entries = $campania->validarUser($mac);
            if(empty($entries)) {   
                return 'Location: vistas/formulario.php';
            } else {
                return 'Location: vistas/banner.php';
            }
        }
    }
?>