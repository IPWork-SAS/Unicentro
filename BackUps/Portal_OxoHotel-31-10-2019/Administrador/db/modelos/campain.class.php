<?php
    include 'db/db.class.php';    

    class Campania extends Orm {

        protected static    
            $database = 'portal_oxohotel',
            $table = 'publicidad_a_2019_campania',
            $pk = 'id';
    }