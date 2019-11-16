<?php
    include 'db/db.class.php';

    class Usuario extends Orm {
        protected static
            $database = 'portal_oxohotel',
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
    }