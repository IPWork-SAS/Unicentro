<?php
    include 'db/db.class.php';

    class RolesUsuarios extends Orm {
        protected static
            $database = 'portal_oxohotel',
            $table = 'roles_usuarios',
            $pk = 'id';
    }