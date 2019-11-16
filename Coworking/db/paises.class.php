<?php
    include 'db.class.php';    

    class Paises extends Orm {

        protected static    
            $database = 'unicentro',
            $table = 'paises',
            $pk = 'id';
    }