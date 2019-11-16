<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Portal Administrativo</title>
    <link rel="stylesheet" href="css/main.css">
</head>
    <body>
        <div class="background"></div>
        
        <div class="container-main">
            <div class="container-logo">
                <img src="img/Logo_IPwork.png" alt="">
                <h3>ADMINISTRADOR DE PORTALES</h3>
            </div>
            <div class="container-form">
                <form action="" method="POST">
                    
                    <h2>Iniciar sesión</h2>
                    <?php
                        if(isset($errorLogin)){
                            ?><h3 style="color:red;"><?php echo $errorLogin?></h3><?php                
                        }
                    ?>
                    
                    <div class="field-usuario">                        
                        <input type="text" name="username" placeholder="Usuario" autocomplete="off" required>                        
                    </div>
                    <div class="field-password">                     
                        <input type="password" name="password" placeholder="Contraseña" autocomplete="off" required> 
                    </div>
                    <div class="field-button">
                        <input type="submit" value="Iniciar Sesión">    
                    </div>
                </form>
            </div>
            
        </div>        
    </body>
</html>

