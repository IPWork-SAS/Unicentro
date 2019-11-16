<?php
    include 'db/db.class.php';

    class RolesUsuarios extends Orm {
        protected static
            $database = 'unicentro',
            $table = 'roles_usuarios',
            $pk = 'id';
    }