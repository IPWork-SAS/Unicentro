<?php

class UserSession{

    public function __construct(){
        session_start();
    }

    public function setCurrentUser($user){
        $_SESSION['user'] = $user;
        $_SESSION['last_time'] = time();
    }

    public function getCurrentUser(){
        return $_SESSION['user'];
    }

    public function closeSession(){
        session_regenerate_id(true);  
        session_unset();
        session_destroy();
    }
}

?>