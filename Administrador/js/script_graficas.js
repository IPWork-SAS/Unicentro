function CambioEnvento(fecha_inicial, hora_inicial, fecha_final, hora_final){
    var id = $("#evento").val();
    if(id !== ''){
        ConsultaGraficas(id, fecha_inicial, hora_inicial, fecha_final, hora_final);
    }
}

function ConsultaGraficas(id, fecha_inicial, hora_inicial, fecha_final, hora_final){
    var fechaInicial = fecha_inicial+hora_inicial+":00";
    var fechaFinal = fecha_final+hora_final+":00";
    var data = {"id" : id, "fecha_inicial" : fechaInicial, "fecha_final": fechaFinal};
    $.ajax({
        url: "includes/consulta_graficas.php",
        type: "POST",
        data: data,
        beforeSend: function(){
            $("#graficas").empty();
        },
        success: function (Data) {
            Data = JSON.parse(Data);
            $("#graficas").append(html_Graficas);
            Graficas(Data);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            $("#graficas").empty();
        }
    });
}

function Personas_Genero(Data){
    var personas_genero = $("#personas_genero");
    var Generos = [];
    var Datos = [];
    var BackgroundColor = [];
    for(i = 0; i < Data.length; i++){
        Datos[i] = [];
        BackgroundColor[i] = [];
        Generos[i] = Data[i]['genero'];
        var color = Math.floor((Math.random() * 255))+","+Math.floor((Math.random() * 255))+","+Math.floor((Math.random() * 255));
        Datos[i] = Data[i]['personas'];
        BackgroundColor[i] = "rgba("+color+", 1)";
    }
    var Personas_Genero = new Chart(personas_genero, {
        type: "pie", 
        data: {
            labels: Generos, 
            datasets: [{
                data: Datos,
                backgroundColor: BackgroundColor,
                borderColor: BackgroundColor,
                borderWidth: 1,
            }]
        },
        options: {
            responsive: true,
            legend: {
                display: true,
                labels: {
                    fontSize: 10
                }
            }
        }
    });
} 

function Personas_Ap(Data){
    var personas_ap = $("#personas_ap");
    var Ap = [];
    var Datos = [];
    for(i = 0; i < Data.length; i++){
        Ap[i] = "Ap"+(i+1);
        Datos[i] = [];
        var color = Math.floor((Math.random() * 255))+","+Math.floor((Math.random() * 255))+","+Math.floor((Math.random() * 255));
        Datos[i] = {
            "label": Ap[i],
            "data": [Data[i]['personas']],
            "backgroundColor": ["rgba("+color+", 1)"],
            "borderColor": ["rgba("+color+", 1)"],
            "borderWidth": 1,
        }
    }
    var Personas_Ap = new Chart(personas_ap, {
        type: "bar", 
        data: {
            labels: ["Aps"], 
            datasets: Datos
        },
        options: {
            responsive: true,
            scales: { 
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
            legend: {
                display: true,
                labels: {
                    fontSize: 10
                }
            }
        }
    });
}

function Personas_Pais(Data){
    var personas_pais = $("#personas_pais");
    var Pais = [];
    var Datos = [];
    var BackgroundColor = [];
    for(i = 0; i < Data.length; i++){
        Datos[i] = [];
        BackgroundColor[i] = [];
        Pais[i] = Data[i]['nombre_esp'];
        var color = Math.floor((Math.random() * 255))+","+Math.floor((Math.random() * 255))+","+Math.floor((Math.random() * 255));
        Datos[i] = Data[i]['personas'];
        BackgroundColor[i] = "rgba("+color+", 1)";
    }
    var Personas_Pais = new Chart(personas_pais, {
        type: "polarArea", 
        data: {
            labels: Pais, 
            datasets: [{
                data: Datos,
                backgroundColor: BackgroundColor,
                borderColor: BackgroundColor,
                borderWidth: 1,
            }]
        },
        options: {
            responsive: true,
            legend: {
                display: true,
                labels: {
                    fontSize: 10
                }
            }
        }
    });
}

function Personas_Edad(Data){
    var personas_edad = $("#personas_edad");
    var Edad = [];
    var Datos = [];
    var BackgroundColor = [];
    for(i = 0; i < Data.length; i++){
        Datos[i] = [];
        BackgroundColor[i] = [];
        Edad[i] = Data[i]['edad'];
        var color = Math.floor((Math.random() * 255))+","+Math.floor((Math.random() * 255))+","+Math.floor((Math.random() * 255));
        Datos[i] = Data[i]['personas'];
        BackgroundColor[i] = "rgba("+color+", 1)";
    }
    var Personas_Edad = new Chart(personas_edad, {
        type: "doughnut", 
        data: {
            labels: Edad, 
            datasets: [{
                data: Datos,
                backgroundColor: BackgroundColor,
                borderColor: BackgroundColor,
                borderWidth: 1,
            }]
        },
        options: {
            responsive: true,
            legend: {
                display: true,
                labels: {
                    fontSize: 10
                }
            }
        }
    });
}

function Personas_OS(Data){
    var personas_os = $("#personas_os");
    var Os = [];
    var Datos = [];
    for(i = 0; i < Data.length; i++){
        Os[i] = Data[i]['os'];
        Datos[i] = [];
        var color = Math.floor((Math.random() * 255))+","+Math.floor((Math.random() * 255))+","+Math.floor((Math.random() * 255));
        Datos[i] = {
            "label": Os[i],
            "data": [Data[i]['personas']],
            "backgroundColor": ["rgba("+color+", 1)"],
            "borderColor": ["rgba("+color+", 1)"],
            "borderWidth": 1,
        }
    }
    var Personas_Os = new Chart(personas_os, {
        type: "bar", 
        data: {
            labels: ["Sistemas Operativos"], 
            datasets: Datos
        },
        options: {
            responsive: true,
            scales: { 
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
            legend: {
                display: true,
                labels: {
                    fontSize: 10
                }
            }
        }
    });
}

function Personas_Fecha(Data){
    var personas_Fechas = $("#personas_fecha");
    var Fechas = [];
    var Datos = [];
    var color = Math.floor((Math.random() * 255))+","+Math.floor((Math.random() * 255))+","+Math.floor((Math.random() * 255));
    var colorRgba = [];
    for(i = 0; i < Data.length; i++){
        Datos[i] = [];
        colorRgba[i] = [];
        Fechas[i] = Data[i]['fecha'];
        Datos[i] = Data[i]['personas'];
        colorRgba[i] = "rgba("+color+", 1)";
    }
    var Personas_Fechas = new Chart(personas_Fechas, {
        type: "line", 
        data: {
            labels: Fechas, 
            datasets: [{
                data: Datos,
                backgroundColor: colorRgba,
                borderColor: colorRgba[0],
                fill: false,
                pointRadius: 5,
                pointHoverRadius: 10,
            }]
        },
        options: {
            responsive: true,
            scales: { 
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
            legend: {
                display: false,
                labels: {
                    fontSize: 10
                }
            }
        }
    });
}

function Graficas(Data){
    Personas_Genero(Data[0]);
    Personas_Ap(Data[1]);
    Personas_Pais(Data[2]);
    Personas_Edad(Data[3]);
    Personas_OS(Data[4]);
    Personas_Fecha(Data[5]);
}

var html_Graficas = `<div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="card mb-3">
                            <div class="card-header">
                                <i class="fas fa-chart-bar"></i>
                                <b>Numero de Personas por Género</b>
                            </div>
                            <div class="card-body">
                                <canvas id="personas_genero" width="400" height="400"></canvas>
                            </div>
                            <div class="card-footer small text-muted">Chart.js</div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="card mb-3">
                            <div class="card-header">
                                <i class="fas fa-chart-bar"></i>
                                <b>Numero de Personas por AP</b>
                            </div>
                            <div class="card-body">
                                <canvas id="personas_ap" width="400" height="400"></canvas>
                            </div>
                            <div class="card-footer small text-muted">Chart.js</div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="card mb-3">
                            <div class="card-header">
                                <i class="fas fa-chart-bar"></i>
                                <b>Numero de Personas por País</b>
                            </div>
                            <div class="card-body">
                                <canvas id="personas_pais" width="400" height="400"></canvas>
                            </div>
                            <div class="card-footer small text-muted">Chart.js</div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="card mb-3">
                            <div class="card-header">
                                <i class="fas fa-chart-bar"></i>
                                <b>Numero de Personas por Edad</b>
                            </div>
                            <div class="card-body">
                                <canvas id="personas_edad" width="400" height="400"></canvas>
                            </div>
                            <div class="card-footer small text-muted">Chart.js</div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="card mb-3">
                            <div class="card-header">
                                <i class="fas fa-chart-bar"></i>
                                <b>Numero de Personas por Sistema Operativo</b>
                            </div>
                            <div class="card-body">
                                <canvas id="personas_os" width="400" height="400"></canvas>
                            </div>
                            <div class="card-footer small text-muted">Chart.js</div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="card mb-3">
                            <div class="card-header">
                                <i class="fas fa-chart-bar"></i>
                                <b>Numero de Personas por Fecha</b>
                            </div>
                            <div class="card-body">
                                <canvas id="personas_fecha" width="400" height="400"></canvas>
                            </div>
                            <div class="card-footer small text-muted">Chart.js</div>
                        </div>
                    </div>`;