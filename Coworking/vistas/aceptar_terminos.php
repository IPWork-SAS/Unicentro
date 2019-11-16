<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link 
            rel="stylesheet" 
            href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" 
            integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" 
            crossorigin="anonymous"
        >
        <link rel="shortcut icon" type="image/png" href="../img/favicon.ico"/>
        <link rel="stylesheet" href="../css/aceptar_terminos.css">
        <link rel="stylesheet" href="../css/terminos_condiciones.css">
        <title>Portal Cautivo Unicentro</title>
        
    </head>
    <body>
        <div class="background"></div> 
        <div class="container-main">
            <div class="container-logo-portal">
                <img src="../img/logo-uc.png" alt="">
                <h3>Conéctate y disfruta de nuestra red WIFI Gratis.</h3>
            </div>  
            <div class="container-form">
                <form class="form-registro" action="./register.php" method="post">
                    <div class="input-group-check">
                        <input type="checkbox" class="input-control-check" required>
                        <a href="#popup">Terminos y condiciones.</a>
                    </div>

                    <div class="field-btn-conectar">
                        <button class="btn-conectar" type="submit">Aceptar</button>
                    </div>
                </form>                     
            </div>       
        </div>
        <div class="popup" id="popup">
            <div class="popup-inner">
                <div class="popup__text">
                    <div id="incluirTerminosCondiciones" class="container_terminos"></div>
                </div>
                <a class="popup__close" href="#">X</a>
            </div>
        </div>  
        <script type="text/javascript" src="../js/terminos_condiciones.js"></script>             
    </body>
</html>