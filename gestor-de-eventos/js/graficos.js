//VARIÁVEIS--------------------------------------------------------------//

var titulo;
var obj;
var myChart;
var myChart2;
var reseta = 0;
var reseta2 = 0;
var identificador = 0;

//GRÁFICOS---------------------------------------------------------------//

function Graficos() {


    $.ajax({
        url: "http://localhost/Sitecor2/corechart/select_graf2.php?buscagrafico=" + $('#inputbuscar').val(),
        success: function (result) {

            obj = JSON.parse(result);

            var ctx = $("#graficoregiao");

            if (reseta == 0) {
                reseta = reseta + 1;
            } else {
                myChart.destroy();
            }


            myChart = new Chart(ctx, {

                type: 'pie',

                data: {
                    labels: ["Cerejeiras", "Alvinópolis", "Centro", "Colonial", "Imperial", "Tanque", "Maracanã", "Outros"],
                    datasets: [{
                        data: [obj.cerejeiras, obj.alvinopolis, obj.centro, obj.colonial, obj.imperial, obj.tanque, obj.maracana, obj.outros],
                        borderWidth: 0,
                        borderColor: "white",
                        backgroundColor: [
                'rgb(219, 10, 91)',
                'rgb(140, 20, 252)',
                'rgb(77, 19, 209)',
                'rgb(46, 204, 113)',
                'rgb(245, 229, 27)',
                'rgb(211, 84, 0)',
                'rgb(103, 128, 159)',
                'rgb(129, 207, 224)',
                    ],
                        borderColor: [
                'rgba(238, 238, 238, 1)',
                'rgba(238, 238, 238, 1)',
                'rgba(238, 238, 238, 1)',
                'rgba(238, 238, 238, 1)',
                'rgba(238, 238, 238, 1)',

            ],
                        borderWidth: 1
            }]
                },

                options: {

                    maintainAspectRatio: false,

                    tooltips: {
                        mode: 'label',
                        callbacks: {

                            label: function (tooltipItem, data) {
                                var indice = tooltipItem.index;
                                return data.datasets[0].data[indice] + ' Visita(s)';
                            }

                        }
                    },

                    legend: {
                        display: true,
                        fullWidth: false,
                        position: 'left',


                        labels: {
                            fontSize: 17,
                            boxWidth: 25,
                            fontColor: 'white',
                        }
                    },

                    title: {
                        display: true,
                        text: 'Visitas por Região',
                        fontColor: 'white',
                        fontSize: 25,
                    },


                }
            });




        }
    });

    $.ajax({
        url: "http://localhost/Sitecor2/corechart/select_grafidade.php?buscagrafico=" + $('#inputbuscar').val(),
        success: function (result) {

            obj = JSON.parse(result);





            var ctx = $("#grafidade");


            if (reseta2 == 0) {
                reseta2 = reseta2 + 1;
            } else {
                myChart2.destroy();
            }
            myChart2 = new Chart(ctx, {

                type: 'bar',

                data: {
                    labels: ["Crianças", "Adolescentes", "Adultos", "Idosos"],
                    datasets: [{
                        data: [obj.cerejeiras, obj.alvinopolis, obj.centro, obj.colonial],
                        backgroundColor: [
                'rgb(39, 174, 96)',
                'rgb(52, 152, 219)',
                'rgb(231, 76, 60)',
                'rgb(241, 196, 15)',
                    ],
            }]
                },

                options: {
                    legend: {
                        display: false,
                    },

                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                            }
                          }],

                        xAxes: [{
                            barThickness: 50,
                            maxBarThickness: 60,
                          }]
                    },

                    maintainAspectRatio: false,

                    title: {
                        display: true,
                        text: 'Faixa etária',
                        fontColor: 'white',
                        fontSize: 25,
                    },

                }
            });




        }

    });


}



function Eventografico() {
    // conecta ao servidor
    var xmlhttp = new XMLHttpRequest();
    var url = "http://localhost/Sitecor2/corechart/eventoparagrafico.php";
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            ConectaServidor(xmlhttp.responseText);
        }
    }
    xmlhttp.open("GET", url, true);
    xmlhttp.send();

    function ConectaServidor(response) {
        var dados = JSON.parse(response); //faz a conversão do texto da WEB para JSON
        var i;
        var conteudo = "";


        for (i = 0; i < dados.length; i++) //dados.length retorna o tamanho do vetor.
        {

            conteudo += '<ul data-num-item="' + i + '" onclick="titulo = $(\'#numerodados' + i + ' .collapsible-header p\').text(); identificador=' + i + '; Graficosestati();" class="collapsible animated bounceInDown" style=" z-index: 0 !important; border:none !important; border-radius:7px !important;" id="numerodados' + i + '">' +
                '<li>' +
                '<div class="collapsible-header" style="text-transform: uppercase; background:#3f597c;; color: white; font-size: 200%; letter-spacing:4px;">' +
                '<i class="material-icons" style="margin-top: 1%;">bar_chart' + '</i><p>' + dados[i].tb1_nomeevento +
                '</p></div>' +
                ' <div class="collapsible-body" style=" background:#7f8fa5  !important;; border:none !important; border-bottom-left-radius: 7px !important; border-bottom-right-radius: 7px !important;">' +
                '<div class="row">' +
                '<div id="numerovisitas' + i + '">' +
                '</div>' +
                '</div>' +
                '<div class="row">' +
                '<div class="col l4 s12">' +
                '<canvas class="graficoregiao" style="height:390px;">' +
                '</canvas>' +
                '</div>' +

                '<div class="col l4 s12">' +
                '<canvas class="graficoidade" style="height:390px;">' +
                '</canvas>' +
                '</div>' +

                '<div class="col l4 s12">' +
                '<canvas class="graficomotivo" style="height:390px;">' +
                '</canvas>' +
                '</div>' +

                '</div>' +

                '</div>' +
                '</li>' +
                '</ul><br><br>';
        

        }
        document.getElementById("eventoparagrafico").innerHTML = conteudo;
        $("#nomedados").click(function () {
            alert("evento");
        });
    }
}


function Graficosestati() {

    $.ajax({
        url: "http://localhost/Sitecor2/corechart/estatisticaregiao.php?buscagrafico=" + titulo,
        success: function (result) {

            obj = JSON.parse(result);

            var ctx = $('.graficoregiao').eq(identificador);



            myChart = new Chart(ctx, {

                type: 'pie',

                data: {
                    labels: ["Cerejeiras", "Alvinópolis", "Centro", "Colonial", "Imperial", "Tanque", "Maracanã", "Outros"],
                    datasets: [{
                        data: [obj.cerejeiras, obj.alvinopolis, obj.centro, obj.colonial, obj.imperial, obj.tanque, obj.maracana, obj.outros],
                        borderWidth: 0,
                        borderColor: "white",
                        backgroundColor: [
                'rgb(219, 10, 91)',
                'rgb(140, 20, 252)',
                'rgb(77, 19, 209)',
                'rgb(46, 204, 113)',
                'rgb(245, 229, 27)',
                'rgb(211, 84, 0)',
                'rgb(103, 128, 159)',
                'rgb(129, 207, 224)',

                    ],
                        borderColor: [
                'rgba(238, 238, 238, 1)',
                'rgba(238, 238, 238, 1)',
                'rgba(238, 238, 238, 1)',
                'rgba(238, 238, 238, 1)',
                'rgba(238, 238, 238, 1)',

            ],
                        borderWidth: 1

            }]
                },

                options: {

                    maintainAspectRatio: false,

                    tooltips: {
                        mode: 'label',
                        callbacks: {

                            label: function (tooltipItem, data) {
                                var indice = tooltipItem.index;
                                return data.datasets[0].data[indice] + ' Visita(s)';
                            }

                        }
                    },

                    legend: {
                        display: true,
                        fullWidth: false,
                        position: 'left',


                        labels: {
                            fontSize: 17,
                            boxWidth: 25,
                            fontColor: 'white',
                        }
                    },

                    title: {
                        display: true,
                        text: 'Visitas por Região',
                        fontColor: 'white',
                        fontSize: 25,
                    },


                }
            });




        }
    });

    $.ajax({
        url: "http://localhost/Sitecor2/corechart/estatisticaidade.php?buscagrafico=" + titulo,
        success: function (result) {

            obj = JSON.parse(result);





            var ctx = $('.graficoidade').eq(identificador);
            var visitas = parseInt(obj.cerejeiras) + parseInt(obj.alvinopolis) + parseInt(obj.centro) + parseInt(obj.colonial);


            myChart = new Chart(ctx, {

                type: 'bar',

                data: {
                    labels: ["Crianças", "Adolescentes", "Adultos", "Idosos"],
                    datasets: [{
                        data: [obj.cerejeiras, obj.alvinopolis, obj.centro, obj.colonial],
                        backgroundColor: [
                'rgba(46, 204, 113, 1)',
                'rgba(34, 167, 240, 1)',
                'rgba(228, 120, 51, 1)',
                'rgba(245, 229, 27, 1)',
                    ],
                        borderColor: [
                'rgba(238, 238, 238, 1)',
                'rgba(238, 238, 238, 1)',
                'rgba(238, 238, 238, 1)',
                'rgba(238, 238, 238, 1)',
                'rgba(238, 238, 238, 1)',

            ],
                        borderWidth: 1
            }]
                },

                options: {
                    legend: {
                        display: false,

                        labels: {
                            fontSize: 17,
                            boxWidth: 25,
                            fontColor: 'white',
                        }
                    },

                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                            }
                          }],

                        xAxes: [{
                            barThickness: 50,
                            maxBarThickness: 60,
                          }]
                    },

                    maintainAspectRatio: false,

                    title: {
                        display: true,
                        text: 'Com um total de '+ visitas + ' visitas',
                        fontColor: 'white',
                        fontSize: 25,
                    },

                }
            });




        }

    });

    $.ajax({
        url: "http://localhost/Sitecor2/corechart/estatisticamotivo.php?buscagrafico=" + titulo,
        success: function (result) {

            obj = JSON.parse(result);


            var ctx = $('.graficomotivo').eq(identificador);

            
           


            myChart = new Chart(ctx, {

                type: 'polarArea',

                data: {
                    labels: ["Visitar Familiar", "Conhecer a Instituição", "Assistiram a um aluno", "Redes Sociais", "Acaso"],
                    datasets: [{
                        data: [obj.mot1, obj.mot2, obj.mot3, obj.mot4, obj.mot5],
                        borderWidth: 0,
                        borderColor: "white",
                        backgroundColor: [



                'rgba(255, 121, 121,0.4)',
                'rgba(106, 176, 76,0.4)',
                'rgba(72, 52, 212,0.4)',
                'rgba(19, 15, 64,0.4)',
                'rgba(249, 202, 36,0.4)'
                    ],
                        borderColor: [
                'rgba(255, 121, 121,1)',
                'rgba(106, 176, 76,1)',
                'rgba(72, 52, 212,1)',
                'rgba(19, 15, 64,1)',
                'rgba(249, 202, 36,1)',

            ],
                        borderWidth: 2

            }]
                },

                options: {

                    maintainAspectRatio: false,

                    tooltips: {
                        mode: 'label',
                        callbacks: {

                            label: function (tooltipItem, data) {
                                var indice = tooltipItem.index;
                                return data.datasets[0].data[indice] + ' Visita(s)';
                            }

                        }
                    },

                    legend: {
                        display: true,
                        fullWidth: false,
                        position: 'bottom',


                        labels: {
                            fontSize: 14,
                            boxWidth: 25,
                            fontColor: 'white',
                        }
                    },

                    title: {
                        display: true,
                        text: "Motivo das Visitas",
                        fontColor: 'white',
                        fontSize: 25,
                    },


                }
            });




        }
    });



}
