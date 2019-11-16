<?php
    include 'db/db.class.php';

    class Locaciones extends Orm {
        protected static
            $database = 'unicentro',
            $table = 'locaciones',
            $pk = 'id';
    }