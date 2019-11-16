<?php
include 'db.php';

class User extends DB{
    private $nombre;
    private $username;


    public function userExists($user, $pass){
        // $md5pass = md5($pass);
        $md5pass = $pass;
        $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE username = :user AND password = :pass');
        $query->execute(['user' => $user, 'pass' => $md5pass]);

        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    public function setUser($user){
        $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE username = :user');
        $query->execute(['user' => $user]);
        
        foreach ($query as $currentUser) {
            $this->nombre = $currentUser['nombre'];
            $this->usename = $currentUser['username'];
        }
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function validateUserLicence($user) {            
        $query = $this->connect()->prepare('SELECT* from usuarios a inner join licencias_usuario b on a.id = b.id_usuario
        where a.username = :user and :today between b.fecha_inicial and fecha_final;');  

        $query->execute(['user' => $user, 'today' => $this->getDatetimeNow()]);

        if($query->rowCount()){
            return true;
        }else{
            return false;
        }        
    }

    public function test() {
        return $this->nombre;
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