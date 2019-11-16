<?php
    include_once 'db/modelos/usuario.class.php';
    include_once 'includes/user_session.php';

    $userSession = new UserSession();
    
    if(isset($_SESSION['user']) ){
        if(time() - $_SESSION['last_time'] < 900) {
            $usuario = new Usuario;
            $usuario->setUser($userSession->getCurrentUser());
            if(isset($_GET['doc'])) {
                switch ($_GET['doc']) {
                    case "locaciones":
                        include_once 'vistas/locaciones.php';
                        break;
                    case "eventos":                    
                        include_once 'vistas/eventos.php';
                        break;
                    case "datos_campania":                    
                        include_once 'vistas/datos_campania.php';
                        break;
                    case "cvs":                    
                        include_once 'vistas/cvs.php';
                        break;
                }    
            } else {
                include_once 'vistas/home.php';
            }
        } else {
            // echo'<script type="text/javascript">
            //     alert("Ha caducado la sesion");
            // </script>';
            $userSession->closeSession();
            include_once 'vistas/login.php';
        }
    } else if(isset($_POST['username']) && isset($_POST['password'])){
        
        $userForm = $_POST['username'];
        $passForm = $_POST['password'];
        // if (condition) {
        //     # code...
        // }
        $usuario = new Usuario();
        if($usuario->userExists($userForm, $passForm)){
            if($usuario->validateUserLicence($userForm)) {
                //echo "Existe el usuario";
                $userSession->setCurrentUser($userForm);
                $usuario->setUser($userForm);

                include_once 'vistas/home.php';
            } else {
                //echo "No existe el usuario";
                $errorLogin = "La licencia ha caducado";
                include_once 'vistas/login.php';
            }          
        }else{
            //echo "No existe el usuario";
            $errorLogin = "Nombre de usuario y/o contraseña incorrecto";
            include_once 'vistas/login.php';
           
        }
    }else{
        //echo "login";
        include_once 'vistas/login.php';
    }

?>