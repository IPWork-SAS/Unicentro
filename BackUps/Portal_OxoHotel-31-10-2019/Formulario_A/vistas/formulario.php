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
        <link rel="stylesheet" href="../css/formulario.css">
        <link rel="stylesheet" href="../css/terminos_condiciones.css">
        <title>Portal Cautivo AC Hotel</title>
        <script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
    </head>
    <body>
        <div class="background"></div> 
        <div class="container-main">
            <div class="container-logo-portal">
                <img src="../img/logo.jpg" alt="">
                <h3>Conéctate y disfruta de nuestra red WIFI Gratis.</h3>
            </div>  
            <div class="container-form">
                <form class="form-registro" action="../controladores/formulario_controller.php" method="post">                  

                    <div class="field-name">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Nombre y Apellido" autocomplete="off" id="nombre" name="nombre" required onkeyup="validate();">                        
                    </div>
                    <div class="field-email">
                        <i class="fas fa-envelope"></i>
                        <input type="email" placeholder="Email" autocomplete="off" id="email" name="email" required>                        
                    </div>
                    <div class="field-edad">
                        <i class="far fa-calendar-alt"></i>
                        <input type="number" placeholder="Edad" autocomplete="off" id="edad" name="edad" oninput="maxLengthCheck(this)" maxlength = "2" required>                        
                    </div>
                    <div class="field-telefono">
                        <i class="fas fa-phone"></i>
                        <input  oninvalid="this.setCustomValidity('Ingrese un número de telefono celular valido.')"  oninput="this.setCustomValidity('')" type="tel" placeholder="Celular" autocomplete="off" id="telefono" name="telefono" minlength="10" maxlength="40" required>                        
                    </div>

                    <div class="input-group-check">
                        <input type="checkbox" class="input-control-check" required>
                        <a href="#popup">Terminos y condiciones.</a>
                    </div>

                    <div class="field-btn-conectar">
                        <button class="btn-conectar" type="submit">Conéctate</button>
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
        <script src="../js/formulario.js"></script>    
        <script src="../js/terminos_condiciones.js"></script>          
    </body>
</html>