<?php
    include 'db.class.php';    

    class Campania extends Orm {

        protected static    
            $database = 'portal_oxohotel',
            $table = 'publicidad_b_2019_campania',
            $pk = 'id';
    }