<?php
    include 'db/db.class.php';    

    class Campania extends Orm {

        protected static    
            $database = 'unicentro',
            $table = 'publicidad_a_2019_campania',
            $pk = 'id';
    }