<?php
    include 'db.class.php';  

    class Locacion extends Orm {

        protected static    
            $database = 'portal_cautivo_medellin',
            $table = 'locaciones',
            $pk = 'id';
    }