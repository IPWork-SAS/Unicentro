<?php
    include 'db/db.class.php';

    class Locaciones extends Orm {
        protected static
            $database = 'portal_oxo_hotel',
            $table = 'ciudades',
            $pk = 'id';
    }