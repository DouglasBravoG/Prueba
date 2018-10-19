<?php
include 'header.php';
require_once '../conexion/congraphicAdmin.php';
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Graficas de Admision</title>
        <br>    
        <center><strong><font size = 6>Resultados Generales de Admisi&oacute;n 2018</strong></center>
        <div style="width: 330px; margin: 0 auto;">
            <a data-rel='tooltip' title='Ver Detalle Usuario' class='btn btn-warning' href='resultado_admision_fecha_2018.php'>
                <i class='halflings-icon white search'></i>Ver Resultados Por Fecha de Evaluacion                                            
            </a>
        </div>
        <hr>
         <center>
            <font size=5 color="gray">
                <?php
                    $query1="SELECT COUNT(noExpediente) AS totalAlumnos FROM resultado_clave WHERE noExpediente LIKE '%E2019%' AND idClave = 10";
                    $resultado1 = mysqli_query($conn, $query1) or die ('Consulta fallida'.mysql_error());
                    $line1 = mysqli_fetch_array($resultado1, MYSQLI_ASSOC);
                    $query2="SELECT COUNT(noExpediente) AS totalAlumnosMayor FROM resultado_clave WHERE noExpediente LIKE '%E2019%' AND idClave = 10 AND nota >= 60";
                    $resultado2 = mysqli_query($conn, $query2) or die ('Consulta fallida'.mysql_error());
                    $line2 = mysqli_fetch_array($resultado2, MYSQLI_ASSOC);
                    $query3="SELECT COUNT(noExpediente) AS totalAlumnosMenor FROM resultado_clave WHERE noExpediente LIKE '%E2019%' AND idClave = 10 AND nota < 60";
                    $resultado3 = mysqli_query($conn, $query3) or die ('Consulta fallida'.mysql_error());
                    $line3 = mysqli_fetch_array($resultado3, MYSQLI_ASSOC);
                ?>
                Total de Alumnos Evaluados: <strong><font size=5 color="black"><?php echo $line1['totalAlumnos'];?></font></strong>
                Alumnos Con Nota Mayor a 60: <strong><font size=5 color="blue"><?php echo $line2['totalAlumnosMayor'];?></font></strong>
                Alumnos Con Nota Menor a 60: <strong><font size=5 color="red"><?php echo $line3['totalAlumnosMenor'];?></font></strong>
            </font>
        </center>
        <hr>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <style type="text/css">
${demo.css}
        </style>
        <script type="text/javascript">
$(function () {
     // Radialize the colors
    Highcharts.getOptions().colors = Highcharts.map(Highcharts.getOptions().colors, function (color) {
        return {
            radialGradient: { cx: 0.5, cy: 0.3, r: 0.7 },
            stops: [
                [0, color],
                [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
            ]
        };
    });
    $('#container1').highcharts({
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45,
                beta: 0
            }
        },
        title: {
            text: ' Resultados de Aritmetica '
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
            name: 'Porcentaje de Respuestas',
            data: [
                <?php 
                    $query = 'SELECT  a.noExpediente,a.idClave, b.numeroPregunta, b.respuesta, COUNT(b.resultado) as total, b.resultado,c.idCategoria 
                    FROM resultado_clave a INNER JOIN detalle_resultado_clave b ON a.idResultado = b.idResultado INNER JOIN respuesta_clave c ON b.numeroPregunta = c.numeroPregunta 
                    WHERE a.idClave = 10 AND SUBSTRING(noExpediente,5,1) = 9 AND c.idCategoria = 2 GROUP BY resultado ';
                    $resultado = mysqli_query($conn, $query) or die ('Consulta fallida'.mysql_error());
                    while ($line = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
                ?>
                ['<?php if($line ['resultado'] == "Buena"){
                    echo "% Buenas";
                }else{
                    echo "% Malas";
                }?>',   <?php echo $line ['total'];?>],
                
               <?php
                }
              ?>
            ]
        }]
    });
});

//----------------------------------------------------------------------------------
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
            text: 'Resultados de Logica'
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
            name: 'Porcentaje de Respuestas',
            data: [
                <?php 
                    $query = 'SELECT  a.noExpediente,a.idClave, b.numeroPregunta, b.respuesta, COUNT(b.resultado) as total, b.resultado,c.idCategoria 
                    FROM resultado_clave a INNER JOIN detalle_resultado_clave b ON a.idResultado = b.idResultado INNER JOIN respuesta_clave c ON b.numeroPregunta = c.numeroPregunta 
                    WHERE a.idClave = 10 AND SUBSTRING(noExpediente,5,1) = 9 AND c.idCategoria = 3 GROUP BY resultado ';
                    $resultado = mysqli_query($conn, $query) or die ('Consulta fallida'.mysql_error());
                    while ($line = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
                ?>
                ['<?php if($line ['resultado'] == "Buena"){
                    echo "% Buenas";
                }else{
                    echo "% Malas";
                }?>',   <?php echo $line ['total'];?>],
                
                   <?php
                    }
                  ?>
            ]
        }]
    });
});

//-----------------------------------------------------------------------------------------------------------------

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
            text: 'Resultados de Algebra'
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
            name: 'Porcentaje de Respuestas',
            data: [
                <?php 
                    $query = 'SELECT  a.noExpediente,a.idClave, b.numeroPregunta, b.respuesta, COUNT(b.resultado) as total, b.resultado,c.idCategoria 
                    FROM resultado_clave a INNER JOIN detalle_resultado_clave b ON a.idResultado = b.idResultado INNER JOIN respuesta_clave c ON b.numeroPregunta = c.numeroPregunta 
                    WHERE a.idClave = 10 AND SUBSTRING(noExpediente,5,1) = 9 AND c.idCategoria = 4 GROUP BY resultado ';
                    $resultado = mysqli_query($conn, $query) or die ('Consulta fallida'.mysql_error());
                    while ($line = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
                ?>
                ['<?php if($line ['resultado'] == "Buena"){
                    echo "% Buenas";
                }else{
                    echo "% Malas";
                }?>',   <?php echo $line ['total'];?>],
                
               <?php
                }
              ?>
            ]
        }]
    });
});

//----------------------------------------------------------------------------------------------
$(function () {
    $('#container4').highcharts({
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45,
                beta: 0
            }
        },
        title: {
            text: 'Resultados de Geometria'
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
            name: 'Porcentaje de Respuestas',
            data: [
                <?php 
                    $query = 'SELECT  a.noExpediente,a.idClave, b.numeroPregunta, b.respuesta, COUNT(b.resultado) as total, b.resultado,c.idCategoria 
                    FROM resultado_clave a INNER JOIN detalle_resultado_clave b ON a.idResultado = b.idResultado INNER JOIN respuesta_clave c ON b.numeroPregunta = c.numeroPregunta 
                    WHERE a.idClave = 10 AND SUBSTRING(noExpediente,5,1) = 9 AND c.idCategoria = 5 GROUP BY resultado';
                    $resultado = mysqli_query($conn, $query) or die ('Consulta fallida'.mysql_error());
                    while ($line = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
                ?>
                ['<?php if($line ['resultado'] == "Buena"){
                    echo "% Buenas";
                }else{
                    echo "% Malas";
                }?>',   <?php echo $line ['total'];?>],
                
               <?php
                }
              ?>
            ]
        }]
    });
});
//----------------------------------------------------------------------------------------------

        $(function () {
            $('#containerPreguntas').highcharts({
                chart: {
                    type: 'bar'
                },
                title: {
                    text: 'Conteo de Respuestas Correctas e Incorrectas'
                },
                subtitle: {
                    text: 'Admision'
                },
                xAxis: {
                    categories: ["1. Series Aritmetica","2. Suma y Resta de Enteros","3. Simplificacion Terminos Semejantes","4. Potenciacion","5. Tecnicas de Conteo","6. Ecuaciones Lineales","7. Proporciones","8. Ecuaciones Lineales","9. Fracciones Equivalentes","10. Ecuaciones Lineales","11. Multiplicacion de Polinomios",
                    "12. Ecuaciones Lineales","13. Perimetro","14. Perimetro Cuadrado","15. Conversion Decimal a Fraccion","16. Suma de Fracciones","17. Patrones Logicos","18. Vision Espacial","19. Porcentaje","20. Despeje de Variables","21. Factorizacion","22. Area Cuadrado","23. Recta Numerica","24. Area del Circulo","25. Jerarquia de Operaciones","26. Vision Espacial","27. Multiplicacion de Polinomios","28. Vision Espacial","29. Area del Triangulo","30. Factorizacion","31. Jerarquia de Operaciones","32. Conversion Fraccion a Decimal","33. Multiplicacion de Polinomios","34. Area del Triangulo","35. Factorizacion"],
                    title: {
                        text: null
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Respuestas',
                        align: 'high'
                    },
                    labels: {
                        overflow: 'justify'
                    }
                },
                tooltip: {
                    valueSuffix: '%'
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
                    x: 15,
                    y: 80,
                    floating: true,
                    borderWidth: 1,
                    backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
                    shadow: true
                },
                credits: {
                    enabled: false
                },
                series: [{
                    name: 'Respuestas Buenas',
                    data: [<?php
                        $query = "SELECT  a.idClave, b.numeroPregunta, b.resultado, COUNT(b.resultado) AS totBuenas
                        FROM resultado_clave a INNER JOIN detalle_resultado_clave b ON a.idResultado = b.idResultado
                        WHERE a.idClave = 10 AND b.resultado = 'Buena' AND SUBSTRING(noExpediente,5,1) = 9 GROUP BY numeroPregunta";
                        $resultado = mysqli_query($conn, $query) or die ('Consulta fallida'.mysql_error());
                        while ($line = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
                        ?>
                        [<?php  $porcen = ($line ['totBuenas'] * 100 ) / $line1['totalAlumnos'];
                             echo round($porcen,2);?>],
                        <?php
                        }
                        ?>]
                }, {
                    name: 'Respuestas Malas',
                    data: [<?php
                        $query = "SELECT  a.idClave, b.numeroPregunta, b.resultado, COUNT(b.resultado) AS totMalas
                        FROM resultado_clave a INNER JOIN detalle_resultado_clave b ON a.idResultado = b.idResultado
                        WHERE a.idClave = 10 AND b.resultado = 'Mala' AND SUBSTRING(noExpediente,5,1) = 9 GROUP BY numeroPregunta";
                        $resultado = mysqli_query($conn, $query) or die ('Consulta fallida'.mysql_error());
                        while ($line = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
                        ?>
                        [<?php $porcen = ($line ['totMalas'] * 100 ) / $line1['totalAlumnos'];
                             echo round($porcen,2);?>],
                        <?php
                        }
                        ?>]
                }]
            });
        });
        </script>
    </head>
    <body>

    <script src="js/highcharts.js"></script>
    <script src="js/highcharts-3d.js"></script>
    <script src="js/modules/exporting.js"></script>

    <div id="container1" style="min-width: 400px; position:absolute; top:265px; left:35px; width=400px"></div>
    <div id="container2" style="min-width: 400px; position:absolute; top:265px; left:460px; width=400px"></div>
    <div id="container3" style="min-width: 400px; position:absolute; top:680px; left:35px; width=400px"></div>
    <div id="container4" style="min-width: 400px; position:absolute; top:680px; left:460px; width=400px"></div>
    <div id="containerPreguntas" style="min-height: 815px; min-width: 700px; position:absolute; top:265px; left:875px;"></div>

    </body>
</html>
