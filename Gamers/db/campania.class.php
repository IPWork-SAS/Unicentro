<?php
    include_once 'db.class.php';    

    class Campania extends Orm {

        protected static    
            $database = 'unicentro',
            $table = 'publicidad_b_2019_campania',
            $pk = 'id';

        public function validarMac($mac = '') {
            return $this::retrieveBymac_cliente($mac, Orm::FETCH_ONE);
        }
        public function validarUser($mac = ''){
            $mac = '34e12d43a922';
            $User = $this::retrieveBymac_cliente($mac, Orm::FETCH_ONE);
            if (!empty($User)) {
                return true;
                
            }else{
                return false;
            }
            

        }

    }