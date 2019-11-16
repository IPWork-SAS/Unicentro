<?php 
    session_start();
    include_once('../db/paises.class.php');

    if(isset($_REQUEST['i'])) {
        $_SESSION['i'] = $_REQUEST['i'];
        $lang = $_REQUEST['i'];
    } else {
        $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
        $acceptLang = ['es', 'en']; 
        $lang = in_array($lang, $acceptLang) ? $lang : 'en';
        $_SESSION['i'] = $lang;
    }

    include_once("../lang/{$lang}.php"); 

    $paises = Paises::all();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Portal Cautivo Unicentro</title>   
    <link rel="stylesheet" href="../vendor/flag-icon/flag-icon.css"> 
    <link rel="stylesheet" href="../vendor/flag-icon/flag-icon.min.css"> 
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/formulario.css">
    <link rel="stylesheet" href="../css/terminos_condiciones.css">
    <link 
        rel="stylesheet" 
        href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" 
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" 
        crossorigin="anonymous"
    >
    <script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
</head>
<body>
    <div class="selector-idioma">
        <?php if ($lang['lang'] == 'es'){ ?>
            <div class="icono-idioma">
                <a href="../vistas/formulario.php?i=en"><img src="../vendor/flag-icon/flags/4x3/us.svg" alt=""></a>
                <span>EN</span>
            </div>
        <?php } else { ?>
            <div class="icono-idioma">
                <a href="../vistas/formulario.php?i=es"><img src="../vendor/flag-icon/flags/4x3/es.svg" alt=""></a>
                <span>ES</span>
            </div>
        <?php } ?>
       
    </div>

    <div class="container">
        <div class="row h-100">
            <div class="col-sm-12 my-auto">
                <div class="card"> 
                    <div class="logo">
                        <img src="../img/logo-uc.png" alt="">
                        <p><?= $lang['titulo_form'];?></p>
                    </div>
                    <form class="formulario" action="../controladores/formulario_controller.php" method="post">
                        <input type="hidden" name="os" id="os">     
                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <input type="nombre" autocomplete="off" required onkeyup="validate();" class="form-control form-control-sm" id="nombre" name="nombre" placeholder="<?= $lang['nombre_form'];?>">
                            </div>
                            <div class="form-group col-md-6">
                            <input type="apellidos"  autocomplete="off" required onkeyup="validate();" class="form-control form-control-sm" id="apellidos" name="apellidos" placeholder="<?= $lang['apellidos_form'];?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="email"  autocomplete="off" required class="form-control form-control-sm" id="email" name="email" placeholder="<?= $lang['email_form'];?>">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-4">
                                <select id="id_pais" name="id_pais" class="form-control form-control-sm" required>
                                    <option selected value=""><?= $lang['indicativo_form'];?></option>
                                    <?php 
                                        foreach ($paises as $pais) {
                                            if( $lang["lang"] == 'es') {
                                                echo '<option value="'.$pais->id.'">'.$pais->nombre_esp.' (+'.$pais->indicativo.')</option>';
                                            } else if ($lang['lang'] == 'en') {
                                                echo '<option value="'.$pais->id.'">'.$pais->nombre_en.' (+'.$pais->indicativo.')</option>';
                                            } else {
                                                echo '<option value="'.$pais->id.'">'.$pais->nombre_esp.' (+'.$pais->indicativo.')</option>';
                                            }                                        
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-8">
                                <input type="tel" oninvalid="this.setCustomValidity('<?= $lang['validacion_celular_form'];?>')"  autocomplete="off" oninput="this.setCustomValidity('')"  class="form-control form-control-sm" id="telefono" name="telefono" placeholder="<?= $lang['celular_form'];?>" minlength="10" maxlength="40" required>
                            </div>                                
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="number" class="form-control form-control-sm" id="edad" name="edad" placeholder="<?= $lang['edad_form'];?>" oninput="maxLengthCheck(this)" maxlength = "2" min="18" required>
                            </div>
                            <div class="form-group col-md-6">
                            <select id="genero"  name="genero" class="form-control form-control-sm" required>
                                <option selected value=""><?= $lang['seleccion_genero_form'];?></option>
                                <option value="Hombre"><?= $lang['masculino_genero_form'];?></option>
                                <option value="Mujer"><?= $lang['femenino_genero_form'];?></option>
                                <option value="Otro"><?= $lang['otro_genero_form'];?></option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group check-terminos">
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck" required>
                            <label class="form-check-label" for="gridCheck">
                                <a href="#popup"><?= $lang['terminos_link'];?></a>
                            </label>
                            </div>
                        </div>
                        <div class="form-btn">
                            <button type="submit" class="btn btn-conect"><?= $lang['btn_continuar'];?></button>
                        </div>                           
                    </form>
                </div>
            </div>
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
 
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../js/formulario.js"></script>
    <script src="../js/terminos_condiciones.js"></script>  
</body>
</html>