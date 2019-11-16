<?php
    session_start();
    $username = 'prueba';
    $password = 'prueba';
    $port = '9998';
    $url = 'https://'.$_SESSION['ip_ap'].':'.$port.'/login';
?>

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
        <link rel="stylesheet" href="../css/banner.css">
        <!-- Agregamos el Slick -->
        <link rel="stylesheet" type="text/css" href="../vendor/slick/slick.css"/>
        <!-- // Add the new slick-theme.css if you want the default styling -->
        <link rel="stylesheet" type="text/css" href="../vendor/slick/slick-theme.css"/>   
        <title>Portal Cautivo AC Hotel</title>
    </head>
    <body>
        <div class="background"></div> 
        <div class="container-main">
            <div class="container-logo-portal">
                <img src="../img/logo.jpg" alt="">
                <!-- <h3>Conéctate y disfruta de nuestra red WIFI Gratis.</h3> -->
            </div>  
            <div class="container-form">
                <div class="slider carrousel">
                    <div class="banner-img"><img src="../img/banner_0.jpg" alt=""></div>
                    <div class="banner-img"><img src="../img/banner_1.jpg" alt=""></div>
                    <div class="banner-img"><img src="../img/banner_2.jpg" alt=""></div>
                </div>
                
                <form class="field-btn-conectar" action="<?= $url?>" method="POST">
                    <input type="hidden" name="username" value="<?= $username?>">
                    <input type="hidden" name="password" value="<?= $password?>">
                    <button class="btn-conectar" type="submit">Conectar</button>
                </form>
            </div>  
        </div>       

        <script type="text/javascript" src="../vendor/jquery/jquery-3.2.1.min.js"></script> 
        <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script type="text/javascript" src="../vendor/slick/slick.min.js"></script>
        <script>
            $(document).ready(function(){

                $('.carrousel').slick({
                    arrows: true
                });

            });
        </script>             
    </body>
</html>