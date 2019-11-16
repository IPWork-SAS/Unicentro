<?php
    include 'db/db.class.php';    

    class Eventos extends Orm {

        protected static    
            $database = 'portal_oxohotel',
            $table = 'eventos',
            $pk = 'id';
    }