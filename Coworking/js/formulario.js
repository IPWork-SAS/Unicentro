$(document).ready(function(){
    //Ocultamos bandera por defecto

    //Se setea el navegador al que pertenece
    var OSName="Otro";
    if (navigator.appVersion.indexOf("Win")!=-1){ OSName="Windows" }
    if (navigator.appVersion.indexOf("Mac")!=-1){ OSName="MacOS" }
    if (navigator.appVersion.indexOf("X11")!=-1){ OSName="UNIX" }
    if (navigator.appVersion.indexOf("Linux")!=-1){ OSName="Linux" }
    if (navigator.appVersion.indexOf("Android")!=-1){ OSName="Android" }
    $("#os").val(OSName);

    //Se resetean los campos
    $('select').prop('selectedIndex', 0);
    $('#edad').val("");
});

function maxLengthCheck(object)
{
    if (object.value.length > object.maxLength)
    object.value = object.value.slice(0, object.maxLength)
};

function validate() {
    var element = document.getElementById('nombre');
    element.value = element.value.replace(/[^a-zA-Z0\s]+/, '');
};

