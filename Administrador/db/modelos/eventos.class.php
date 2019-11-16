<?php
    include 'db/db.class.php';    

    class Eventos extends Orm {

        protected static    
            $database = 'unicentro',
            $table = 'eventos',
            $pk = 'id';
    }