<?php
include 'header.php';
require_once '../conexion/congraphicAdmin.php';
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Graficas Comparacion</title>
        <br>    
        <center><strong><font size = 6>Nuestros Alumnos (Basicos) 2017-2018 </strong></center>
       
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <style type="text/css">
${demo.css}
        </style>
        <script type="text/javascript">
        <!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Highcharts Example</title>

        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <style type="text/css">
${demo.css}
        </style>
        <script type="text/javascript">
            $(function () {
                Highcharts.getOptions().colors = Highcharts.map(Highcharts.getOptions().colors, function (color) {
                return {
                radialGradient: { cx: 0.5, cy: 0.3, r: 0.7 },
                stops: [
                [0, color],
                [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
                ]
                };
                });
                $('#container').highcharts({
                    chart: {
                        type: 'bar'
                    },
                    title: {
                        text: 'Alumnos de 3ro. a 4to. Kinal'
                    },
                    subtitle: {
                        text: 'Kinal'
                    },
                    xAxis: {
                        categories: ['2017', '2018'],
                        title: {
                            text: null
                        }
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'Resultados (Reprobados y Aprobados)',
                            align: 'high'
                        },
                        labels: {
                            overflow: 'justify'
                        }
                    },
                    tooltip: {
                        valueSuffix: ' %'
                    },
                    plotOptions: {
                        bar: {
                            dataLabels: {
                                enabled: true
                            }
                        }
                    },
                    legend: {
                        layout: 'vertical',
                        align: 'right',
                        verticalAlign: 'top',
                        x: -40,
                        y: 10,
                        floating: true,
                        borderWidth: 1,
                        backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
                        shadow: true
                    },
                    credits: {
                        enabled: false
                    },
                    series: [{
                        name: 'Aprobados Mayor a 60',
                        data: [<?php 
                            $query3="SELECT a.noExpediente, COUNT(a.noExpediente) as mayor2017, b.idExamenAdmision, b.noExpediente
                            FROM resultado_clave a INNER JOIN examenes_admision_diversificado b ON a.noExpediente = b.noExpediente 
                            WHERE a.noExpediente LIKE '%E2018%' AND a.idClave = 10 AND a.nota >= 60 AND b.idExamenAdmision = 85";
                            $resultado3 = mysqli_query($conn, $query3) or die ('Consulta fallida'.mysql_error());
                            $line3 = mysqli_fetch_array($resultado3, MYSQLI_ASSOC);
                            $aprovado17 = ($line3['mayor2017'] * 100) / 135 ;
                            echo round($aprovado17,2);
                            echo ","; 
                            $query1="SELECT a.noExpediente, COUNT(a.noExpediente) as mayor2018, b.idExamenAdmision, b.noExpediente
                            FROM resultado_clave a INNER JOIN examenes_admision_diversificado b ON a.noExpediente = b.noExpediente 
                            WHERE a.noExpediente LIKE '%E2019%' AND a.idClave = 10 AND a.nota >= 60 AND b.idExamenAdmision = 99";
                            $resultado1 = mysqli_query($conn, $query1) or die ('Consulta fallida'.mysql_error());
                            $line1 = mysqli_fetch_array($resultado1, MYSQLI_ASSOC);
                            $aprovado18 = ($line1['mayor2018'] * 100) / 157 ;
                            echo round($aprovado18,2);
                            echo ",";                             
                        ?>]
                    }, {
                        name: 'Reprobados Menor a 60',
                        data: [<?php 
                            $query3="SELECT a.noExpediente, COUNT(a.noExpediente) as menor2017, b.idExamenAdmision, b.noExpediente
                            FROM resultado_clave a INNER JOIN examenes_admision_diversificado b ON a.noExpediente = b.noExpediente 
                            WHERE a.noExpediente LIKE '%E2018%' AND a.idClave = 10 AND a.nota < 60 AND b.idExamenAdmision = 85";
                            $resultado3 = mysqli_query($conn, $query3) or die ('Consulta fallida'.mysql_error());
                            $line3 = mysqli_fetch_array($resultado3, MYSQLI_ASSOC);
                            $reprovado17 = ($line3['menor2017'] * 100) / 135 ;
                            echo round($reprovado17,2);
                            echo ","; 
                            $query1="SELECT a.noExpediente, COUNT(a.noExpediente) as menor2018, b.idExamenAdmision, b.noExpediente
                            FROM resultado_clave a INNER JOIN examenes_admision_diversificado b ON a.noExpediente = b.noExpediente 
                            WHERE a.noExpediente LIKE '%E2019%' AND a.idClave = 10 AND a.nota < 60 AND b.idExamenAdmision = 99";
                            $resultado1 = mysqli_query($conn, $query1) or die ('Consulta fallida'.mysql_error());
                            $line1 = mysqli_fetch_array($resultado1, MYSQLI_ASSOC);
                            $reprovado18 = ($line1['menor2018'] * 100) / 157 ;
                            echo round($reprovado18,2);
                            echo ",";                             
                        ?>]
                    }]
                });
            });

//-----------------------------------------------------------------------------------------------------------------

$(function () {
    $('#container2').highcharts({
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45,
                beta: 0
            }
        },
        title: {
            text: 'Total de Alumnos del ciclo 2017'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                depth: 35,
                dataLabels: {
                    enabled: true,
                    format: '{point.name}'
                }
            }
        },
        series: [{
                type: 'pie',
                name: 'Browser share',
                data: [
                    
                    ['Aprobados',     207],
                    ['Reprobados',   442]
                ]
            }]
    });
});

//----------------------------------------------------------------------------------------------

$(function () {
    $('#container3').highcharts({
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45,
                beta: 0
            }
        },
        title: {
            text: 'Total de Alumnos del ciclo 2018'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                depth: 35,
                dataLabels: {
                    enabled: true,
                    format: '{point.name}'
                }
            }
        },
        series: [{
                type: 'pie',
                name: 'Browser share',
                data: [
                    
                    ['Aprobados',     73],
                    ['Reprobados',   97]
                ]
            }]
    });
});

//----------------------------------------------------------------------------------------------
        </script>
    </head>
    <body>
<script src="../../js/highcharts.js"></script>
<script src="../../js/modules/exporting.js"></script>

<div id="container" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>

    </body>
</html>

        </script>
    </head>
    <body>

    <script src="js/highcharts.js"></script>
    <script src="js/highcharts-3d.js"></script>
    <script src="js/modules/exporting.js"></script>

    <div id="container1" style="min-width: 400px; position:absolute; top:265px; left:35px; width=400px"></div>
    <div id="container2" style="min-width: 400px; position:absolute; top:580px; left:390px; width=400px"></div> 
    <div id="container3" style="min-width: 400px; position:absolute; top:580px; left:790px; width=400px"></div> 

    </body>
</html>
