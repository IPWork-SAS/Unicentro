<?php
    include 'db/db.class.php';

    class Usuario extends Orm {
        protected static
            $database = 'unicentro',
            $table = 'usuarios',
            $pk = 'id';

        public 
            $nombre,
            $username;
        
        public function setUser($user){
            $usuario = $this::retrieveByUsername($user, Orm::FETCH_ONE);
            $this->nombre = $usuario->nombre;
            $this->username = $usuario->username;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function userExists($user, $pass){
            // $md5pass = md5($pass);
            $md5pass = $pass;            
            $sql = "SELECT * FROM :table where username = '".$user."' and password = '".$pass."'";
            $usuario = $this::sql($sql, Orm::FETCH_ONE);
            if(isset($usuario)) {
                return true;
            } else {
                return false;
            }
        }

        public function validateUserLicence($user) { 
    
            $sql = "SELECT* from usuarios a inner join licencias_usuario b on a.id = b.id_usuario
            where a.username = '".$user."' and '".$this->getDatetimeNow()."' between b.fecha_inicial and fecha_final"; 
    
            $query = $this::sql($sql, Orm::FETCH_ONE);
    
            if(isset($query)){
                return true;
            }else{
                return false;
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