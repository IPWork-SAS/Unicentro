<?php
    include 'db/db.class.php';    

    class Evento extends Orm {

        protected static    
            $database = 'portal_cautivo_medellin',
            $table = 'eventos',
            $pk = 'id';
    }