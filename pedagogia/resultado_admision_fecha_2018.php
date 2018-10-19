<?php
    include 'header.php';
    require_once '../conexion/congraphicAdmin.php';
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Estadisticas</title>

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
        $('#container1').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Resultados Estadisticos De Admision Fecha 1'
            },
            subtitle: {
                text: 'Diversificado'
            },
            xAxis: {
                categories: [
                    <?php 
                    $query = 'SELECT * FROM fecha_examen WHERE anioAsignacion = 2019 AND idFechaExamen = 99';
                    $resultado = mysqli_query($conn, $query) or die ('Consulta fallida'.mysql_error());
                    while ($line = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
                        ?>
                       '<?php echo $line['dia'], " " , $line['diaFecha'] , "/" , $line['mes'] , "/" , $line['anio'];?>', 
                    <?php
                    }               
                ?>
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Cantidad de Buenas'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.f} total</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [  
            <?php
             $query = "SELECT  DISTINCT a.noExpediente, b.resultado, COUNT(b.resultado) AS total ,c.idCategoria,d.idExamenAdmision 
                    FROM resultado_clave a INNER JOIN detalle_resultado_clave b ON a.idResultado = b.idResultado INNER JOIN respuesta_clave c ON b.numeroPregunta = c.numeroPregunta INNER JOIN examenes_admision_diversificado d ON  a.noExpediente = d.noExpediente 
                    WHERE a.idClave = 10 AND SUBSTRING(a.noExpediente,5,1) = 9 AND c.idCategoria > 1 AND c.idCategoria < 6  AND SUBSTRING(d.Time_Stamp,4,1) = 8 AND d.idExamenAdmision = 99 GROUP BY c.idCategoria,b.resultado,d.idExamenAdmision ORDER BY d.`idExamenAdmision`,c.`idCategoria`,b.`resultado`";
                $resultado = mysqli_query($conn, $query) or die ("Consulta fallida".mysql_error());
                while ($line = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
            ?>
            {
                name: '<?php if($line['idCategoria']==2 && $line['resultado']=="Buena"){                     
                    echo "Aritmetica Buenas";
                }else{
                    if ($line['idCategoria']==2 && $line['resultado']=="Mala") {
                        echo "Aritmetica Malas";
                    }else{
                        if($line['idCategoria']==3 && $line['resultado']=="Buena"){
                          echo "Logica Buenas";  
                        }else{
                           if ($line['idCategoria']==3 && $line['resultado']=="Mala") {
                            echo "Logica Malas";
                           }else{
                                if ($line['idCategoria']==4 && $line['resultado']=="Buena") {
                                    echo "Algebra Buenas";
                                }else{
                                    if ($line['idCategoria']==4 && $line['resultado']=="Mala") {
                                        echo "Algebra Malas";
                                    }else{
                                        if ($line['idCategoria']==5 && $line['resultado']=="Buena") {
                                            echo "Geometria Buenas";
                                        }else{
                                            echo "Geometria Malas";
                                        }
                                    }
                                }
                            } 
                        }
                    }
                }  ?>',
                data: [<?php echo $line['total'];?>],
            },
            <?php
            }
            ?>
            ],
        });
    });

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 $(function () {
        $('#container2').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Resultados Estadisticos De Admision Fecha 2'
            },
            subtitle: {
                text: 'Diversificado'
            },
            xAxis: {
                categories: [
                    <?php 
                    $query = 'SELECT * FROM fecha_examen WHERE anioAsignacion = 2019 AND idFechaExamen = 104';
                    $resultado = mysqli_query($conn, $query) or die ('Consulta fallida'.mysql_error());
                    while ($line = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
                        ?>
                       '<?php echo $line['dia'], " " , $line['diaFecha'] , "/" , $line['mes'] , "/" , $line['anio'];?>', 
                    <?php
                    }               
                ?>
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Cantidad de Buenas'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.f} total</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [  
            <?php
             $query = "SELECT  DISTINCT a.noExpediente, b.resultado, COUNT(b.resultado) AS total ,c.idCategoria,d.idExamenAdmision 
                    FROM resultado_clave a INNER JOIN detalle_resultado_clave b ON a.idResultado = b.idResultado INNER JOIN respuesta_clave c ON b.numeroPregunta = c.numeroPregunta INNER JOIN examenes_admision_diversificado d ON  a.noExpediente = d.noExpediente 
                    WHERE a.idClave = 10 AND SUBSTRING(a.noExpediente,5,1) = 9 AND c.idCategoria > 1 AND c.idCategoria < 6 AND SUBSTRING(d.Time_Stamp,4,1) = 8 AND d.idExamenAdmision = 104 GROUP BY c.idCategoria,b.resultado,d.idExamenAdmision ORDER BY d.`idExamenAdmision`,c.`idCategoria`,b.`resultado`";
                $resultado = mysqli_query($conn, $query) or die ("Consulta fallida".mysql_error());
                while ($line = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
            ?>
            {
                name: '<?php if($line['idCategoria']==2 && $line['resultado']=="Buena"){
                    echo "Aritmetica Buenas";
                }else{
                    if ($line['idCategoria']==2 && $line['resultado']=="Mala") {
                        echo "Aritmetica Malas";
                    }else{
                        if($line['idCategoria']==3 && $line['resultado']=="Buena"){
                          echo "Logica Buenas";  
                        }else{
                           if ($line['idCategoria']==3 && $line['resultado']=="Mala") {
                            echo "Logica Malas";
                           }else{
                                if ($line['idCategoria']==4 && $line['resultado']=="Buena") {
                                    echo "Algebra Buenas";
                                }else{
                                    if ($line['idCategoria']==4 && $line['resultado']=="Mala") {
                                        echo "Algebra Malas";
                                    }else{
                                        if ($line['idCategoria']==5 && $line['resultado']=="Buena") {
                                            echo "Geometria Buenas";
                                        }else{
                                            echo "Geometria Malas";
                                        }
                                    }
                                }
                            } 
                        }
                    }
                }  ?>',
                data: [<?php echo $line['total'];?>],
            },
            <?php
            }
            ?>
            ],
        });
    });

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 $(function () {
        $('#container3').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Resultados Estadisticos De Admision Fecha 3'
            },
            subtitle: {
                text: 'Diversificado'
            },
            xAxis: {
                categories: [
                    <?php 
                    $query = 'SELECT * FROM fecha_examen WHERE anioAsignacion = 2019 AND idFechaExamen = 105';
                    $resultado = mysqli_query($conn, $query) or die ('Consulta fallida'.mysql_error());
                    while ($line = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
                        ?>
                       '<?php echo $line['dia'], " " , $line['diaFecha'] , "/" , $line['mes'] , "/" , $line['anio'];?>', 
                    <?php
                    }               
                ?>
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Cantidad de Buenas'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.f} total</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [  
            <?php
             $query = "SELECT  DISTINCT a.noExpediente, b.resultado, COUNT(b.resultado) AS total ,c.idCategoria,d.idExamenAdmision 
                    FROM resultado_clave a INNER JOIN detalle_resultado_clave b ON a.idResultado = b.idResultado INNER JOIN respuesta_clave c ON b.numeroPregunta = c.numeroPregunta INNER JOIN examenes_admision_diversificado d ON  a.noExpediente = d.noExpediente 
                    WHERE a.idClave = 10 AND SUBSTRING(a.noExpediente,5,1) = 9 AND c.idCategoria > 1 AND c.idCategoria < 6 AND SUBSTRING(d.Time_Stamp,4,1) = 8 AND d.idExamenAdmision = 105 GROUP BY c.idCategoria,b.resultado,d.idExamenAdmision ORDER BY d.`idExamenAdmision`,c.`idCategoria`,b.`resultado`";
                $resultado = mysqli_query($conn, $query) or die ("Consulta fallida".mysql_error());
                while ($line = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
            ?>
            {
                name: '<?php if($line['idCategoria']==2 && $line['resultado']=="Buena"){
                    echo "Aritmetica Buenas";
                }else{
                    if ($line['idCategoria']==2 && $line['resultado']=="Mala") {
                        echo "Aritmetica Malas";
                    }else{
                        if($line['idCategoria']==3 && $line['resultado']=="Buena"){
                          echo "Logica Buenas";  
                        }else{
                           if ($line['idCategoria']==3 && $line['resultado']=="Mala") {
                            echo "Logica Malas";
                           }else{
                                if ($line['idCategoria']==4 && $line['resultado']=="Buena") {
                                    echo "Algebra Buenas";
                                }else{
                                    if ($line['idCategoria']==4 && $line['resultado']=="Mala") {
                                        echo "Algebra Malas";
                                    }else{
                                        if ($line['idCategoria']==5 && $line['resultado']=="Buena") {
                                            echo "Geometria Buenas";
                                        }else{
                                            echo "Geometria Malas";
                                        }
                                    }
                                }
                            } 
                        }
                    }
                }  ?>',
                data: [<?php echo $line['total'];?>],
            },
            <?php
            }
            ?>
            ],
        });
    });
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

 $(function () {
        $('#container4').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Resultados Estadisticos De Admision Fecha 4'
            },
            subtitle: {
                text: 'Diversificado'
            },
            xAxis: {
                categories: [
                    <?php 
                    $query = 'SELECT * FROM fecha_examen WHERE anioAsignacion = 2019 AND idFechaExamen = 106';
                    $resultado = mysqli_query($conn, $query) or die ('Consulta fallida'.mysql_error());
                    while ($line = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
                        ?>
                       '<?php echo $line['dia'], " " , $line['diaFecha'] , "/" , $line['mes'] , "/" , $line['anio'];?>', 
                    <?php
                    }               
                ?>
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Cantidad de Buenas'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.f} total</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [  
            <?php
             $query = "SELECT  DISTINCT a.noExpediente, b.resultado, COUNT(b.resultado) AS total ,c.idCategoria,d.idExamenAdmision 
                    FROM resultado_clave a INNER JOIN detalle_resultado_clave b ON a.idResultado = b.idResultado INNER JOIN respuesta_clave c ON b.numeroPregunta = c.numeroPregunta INNER JOIN examenes_admision_diversificado d ON  a.noExpediente = d.noExpediente 
                    WHERE a.idClave = 10 AND SUBSTRING(a.noExpediente,5,1) = 9 AND c.idCategoria > 1 AND c.idCategoria < 6 AND SUBSTRING(d.Time_Stamp,4,1) = 8 AND d.idExamenAdmision = 106 GROUP BY c.idCategoria,b.resultado,d.idExamenAdmision ORDER BY d.`idExamenAdmision`,c.`idCategoria`,b.`resultado`";
                $resultado = mysqli_query($conn, $query) or die ("Consulta fallida".mysql_error());
                while ($line = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
            ?>
            {
                name: '<?php if($line['idCategoria']==2 && $line['resultado']=="Buena"){
                    echo "Aritmetica Buenas";
                }else{
                    if ($line['idCategoria']==2 && $line['resultado']=="Mala") {
                        echo "Aritmetica Malas";
                    }else{
                        if($line['idCategoria']==3 && $line['resultado']=="Buena"){
                          echo "Logica Buenas";  
                        }else{
                           if ($line['idCategoria']==3 && $line['resultado']=="Mala") {
                            echo "Logica Malas";
                           }else{
                                if ($line['idCategoria']==4 && $line['resultado']=="Buena") {
                                    echo "Algebra Buenas";
                                }else{
                                    if ($line['idCategoria']==4 && $line['resultado']=="Mala") {
                                        echo "Algebra Malas";
                                    }else{
                                        if ($line['idCategoria']==5 && $line['resultado']=="Buena") {
                                            echo "Geometria Buenas";
                                        }else{
                                            echo "Geometria Malas";
                                        }
                                    }
                                }
                            } 
                        }
                    }
                }  ?>',
                data: [<?php echo $line['total'];?>],
            },
            <?php
            }
            ?>
            ],
        });
    });
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

     $(function () {
        $('#container5').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Resultados Estadisticos De Admision Fecha 5'
            },
            subtitle: {
                text: 'Diversificado'
            },
            xAxis: {
                categories: [
                    <?php 
                    $query = 'SELECT * FROM fecha_examen WHERE anioAsignacion = 2019 AND idFechaExamen = 107';
                    $resultado = mysqli_query($conn, $query) or die ('Consulta fallida'.mysql_error());
                    while ($line = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
                        ?>
                       '<?php echo $line['dia'], " " , $line['diaFecha'] , "/" , $line['mes'] , "/" , $line['anio'];?>', 
                    <?php
                    }               
                ?>
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Cantidad de Buenas'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.f} total</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [  
            <?php
             $query = "SELECT  DISTINCT a.noExpediente, b.resultado, COUNT(b.resultado) AS total ,c.idCategoria,d.idExamenAdmision 
                    FROM resultado_clave a INNER JOIN detalle_resultado_clave b ON a.idResultado = b.idResultado INNER JOIN respuesta_clave c ON b.numeroPregunta = c.numeroPregunta INNER JOIN examenes_admision_diversificado d ON  a.noExpediente = d.noExpediente 
                    WHERE a.idClave = 10 AND SUBSTRING(a.noExpediente,5,1) = 9 AND c.idCategoria > 1 AND c.idCategoria < 6 AND SUBSTRING(d.Time_Stamp,4,1) = 8 AND d.idExamenAdmision = 107 GROUP BY c.idCategoria,b.resultado,d.idExamenAdmision ORDER BY d.`idExamenAdmision`,c.`idCategoria`,b.`resultado`";
                $resultado = mysqli_query($conn, $query) or die ("Consulta fallida".mysql_error());
                while ($line = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
            ?>
            {
                name: '<?php if($line['idCategoria']==2 && $line['resultado']=="Buena"){
                    echo "Aritmetica Buenas";
                }else{
                    if ($line['idCategoria']==2 && $line['resultado']=="Mala") {
                        echo "Aritmetica Malas";
                    }else{
                        if($line['idCategoria']==3 && $line['resultado']=="Buena"){
                          echo "Logica Buenas";  
                        }else{
                           if ($line['idCategoria']==3 && $line['resultado']=="Mala") {
                            echo "Logica Malas";
                           }else{
                                if ($line['idCategoria']==4 && $line['resultado']=="Buena") {
                                    echo "Algebra Buenas";
                                }else{
                                    if ($line['idCategoria']==4 && $line['resultado']=="Mala") {
                                        echo "Algebra Malas";
                                    }else{
                                        if ($line['idCategoria']==5 && $line['resultado']=="Buena") {
                                            echo "Geometria Buenas";
                                        }else{
                                            echo "Geometria Malas";
                                        }
                                    }
                                }
                            } 
                        }
                    }
                }  ?>',
                data: [<?php echo $line['total'];?>],
            },
            <?php
            }
            ?>
            ],
        });
    });
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 $(function () {
        $('#container6').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Resultados Estadisticos De Admision Fecha 6'
            },
            subtitle: {
                text: 'Diversificado'
            },
            xAxis: {
                categories: [
                    <?php 
                    $query = 'SELECT * FROM fecha_examen WHERE anioAsignacion = 2019 AND idFechaExamen = 108';
                    $resultado = mysqli_query($conn, $query) or die ('Consulta fallida'.mysql_error());
                    while ($line = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
                        ?>
                       '<?php echo $line['dia'], " " , $line['diaFecha'] , "/" , $line['mes'] , "/" , $line['anio'];?>', 
                    <?php
                    }               
                ?>
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Cantidad de Buenas'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.f} total</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [  
            <?php
             $query = "SELECT  DISTINCT a.noExpediente, b.resultado, COUNT(b.resultado) AS total ,c.idCategoria,d.idExamenAdmision 
                    FROM resultado_clave a INNER JOIN detalle_resultado_clave b ON a.idResultado = b.idResultado INNER JOIN respuesta_clave c ON b.numeroPregunta = c.numeroPregunta INNER JOIN examenes_admision_diversificado d ON  a.noExpediente = d.noExpediente 
                    WHERE a.idClave = 10 AND SUBSTRING(a.noExpediente,5,1) = 9 AND c.idCategoria > 1 AND c.idCategoria < 6 AND SUBSTRING(d.Time_Stamp,4,1) = 8 AND d.idExamenAdmision = 108 GROUP BY c.idCategoria,b.resultado,d.idExamenAdmision ORDER BY d.`idExamenAdmision`,c.`idCategoria`,b.`resultado`";
                $resultado = mysqli_query($conn, $query) or die ("Consulta fallida".mysql_error());
                while ($line = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
            ?>
            {
                name: '<?php if($line['idCategoria']==2 && $line['resultado']=="Buena"){
                    echo "Aritmetica Buenas";
                }else{
                    if ($line['idCategoria']==2 && $line['resultado']=="Mala") {
                        echo "Aritmetica Malas";
                    }else{
                        if($line['idCategoria']==3 && $line['resultado']=="Buena"){
                          echo "Logica Buenas";  
                        }else{
                           if ($line['idCategoria']==3 && $line['resultado']=="Mala") {
                            echo "Logica Malas";
                           }else{
                                if ($line['idCategoria']==4 && $line['resultado']=="Buena") {
                                    echo "Algebra Buenas";
                                }else{
                                    if ($line['idCategoria']==4 && $line['resultado']=="Mala") {
                                        echo "Algebra Malas";
                                    }else{
                                        if ($line['idCategoria']==5 && $line['resultado']=="Buena") {
                                            echo "Geometria Buenas";
                                        }else{
                                            echo "Geometria Malas";
                                        }
                                    }
                                }
                            } 
                        }
                    }
                }  ?>',
                data: [<?php echo $line['total'];?>],
            },
            <?php
            }
            ?>
            ],
        });
    });
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 $(function () {
        $('#container7').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Resultados Estadisticos De Admision Fecha 7'
            },
            subtitle: {
                text: 'Diversificado'
            },
            xAxis: {
                categories: [
                    <?php 
                    $query = 'SELECT * FROM fecha_examen WHERE anioAsignacion = 2019 AND idFechaExamen = 110';
                    $resultado = mysqli_query($conn, $query) or die ('Consulta fallida'.mysql_error());
                    while ($line = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
                        ?>
                       '<?php echo $line['dia'], " " , $line['diaFecha'] , "/" , $line['mes'] , "/" , $line['anio'];?>', 
                    <?php
                    }               
                ?>
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Cantidad de Buenas'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.f} total</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [  
            <?php
             $query = "SELECT  DISTINCT a.noExpediente, b.resultado, COUNT(b.resultado) AS total ,c.idCategoria,d.idExamenAdmision 
                    FROM resultado_clave a INNER JOIN detalle_resultado_clave b ON a.idResultado = b.idResultado INNER JOIN respuesta_clave c ON b.numeroPregunta = c.numeroPregunta INNER JOIN examenes_admision_diversificado d ON  a.noExpediente = d.noExpediente 
                    WHERE a.idClave = 10 AND SUBSTRING(a.noExpediente,5,1) = 9 AND c.idCategoria > 1 AND c.idCategoria < 6 AND SUBSTRING(d.Time_Stamp,4,1) = 8 AND d.idExamenAdmision = 110 GROUP BY c.idCategoria,b.resultado,d.idExamenAdmision ORDER BY d.`idExamenAdmision`,c.`idCategoria`,b.`resultado`";
                $resultado = mysqli_query($conn, $query) or die ("Consulta fallida".mysql_error());
                while ($line = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
            ?>
            {
                name: '<?php if($line['idCategoria']==2 && $line['resultado']=="Buena"){
                    echo "Aritmetica Buenas";
                }else{
                    if ($line['idCategoria']==2 && $line['resultado']=="Mala") {
                        echo "Aritmetica Malas";
                    }else{
                        if($line['idCategoria']==3 && $line['resultado']=="Buena"){
                          echo "Logica Buenas";  
                        }else{
                           if ($line['idCategoria']==3 && $line['resultado']=="Mala") {
                            echo "Logica Malas";
                           }else{
                                if ($line['idCategoria']==4 && $line['resultado']=="Buena") {
                                    echo "Algebra Buenas";
                                }else{
                                    if ($line['idCategoria']==4 && $line['resultado']=="Mala") {
                                        echo "Algebra Malas";
                                    }else{
                                        if ($line['idCategoria']==5 && $line['resultado']=="Buena") {
                                            echo "Geometria Buenas";
                                        }else{
                                            echo "Geometria Malas";
                                        }
                                    }
                                }
                            } 
                        }
                    }
                }  ?>',
                data: [<?php echo $line['total'];?>],
            },
            <?php
            }
            ?>
            ],
        });
    });
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

 $(function () {
        $('#container8').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Resultados Estadisticos De Admision Fecha 8'
            },
            subtitle: {
                text: 'Diversificado'
            },
            xAxis: {
                categories: [
                    <?php 
                    $query = 'SELECT * FROM fecha_examen WHERE anioAsignacion = 2019 AND idFechaExamen = 112';
                    $resultado = mysqli_query($conn, $query) or die ('Consulta fallida'.mysql_error());
                    while ($line = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
                        ?>
                       '<?php echo $line['dia'], " " , $line['diaFecha'] , "/" , $line['mes'] , "/" , $line['anio'];?>', 
                    <?php
                    }               
                ?>
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Cantidad de Buenas'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.f} total</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [  
            <?php
             $query = "SELECT  DISTINCT a.noExpediente, b.resultado, COUNT(b.resultado) AS total ,c.idCategoria,d.idExamenAdmision 
                    FROM resultado_clave a INNER JOIN detalle_resultado_clave b ON a.idResultado = b.idResultado INNER JOIN respuesta_clave c ON b.numeroPregunta = c.numeroPregunta INNER JOIN examenes_admision_diversificado d ON  a.noExpediente = d.noExpediente 
                    WHERE a.idClave = 10 AND SUBSTRING(a.noExpediente,5,1) = 9 AND c.idCategoria > 1 AND c.idCategoria < 6 AND SUBSTRING(d.Time_Stamp,4,1) = 8 AND d.idExamenAdmision = 112 GROUP BY c.idCategoria,b.resultado,d.idExamenAdmision ORDER BY d.`idExamenAdmision`,c.`idCategoria`,b.`resultado`";
                $resultado = mysqli_query($conn, $query) or die ("Consulta fallida".mysql_error());
                while ($line = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
            ?>
            {
                name: '<?php if($line['idCategoria']==2 && $line['resultado']=="Buena"){
                    echo "Aritmetica Buenas";
                }else{
                    if ($line['idCategoria']==2 && $line['resultado']=="Mala") {
                        echo "Aritmetica Malas";
                    }else{
                        if($line['idCategoria']==3 && $line['resultado']=="Buena"){
                          echo "Logica Buenas";  
                        }else{
                           if ($line['idCategoria']==3 && $line['resultado']=="Mala") {
                            echo "Logica Malas";
                           }else{
                                if ($line['idCategoria']==4 && $line['resultado']=="Buena") {
                                    echo "Algebra Buenas";
                                }else{
                                    if ($line['idCategoria']==4 && $line['resultado']=="Mala") {
                                        echo "Algebra Malas";
                                    }else{
                                        if ($line['idCategoria']==5 && $line['resultado']=="Buena") {
                                            echo "Geometria Buenas";
                                        }else{
                                            echo "Geometria Malas";
                                        }
                                    }
                                }
                            } 
                        }
                    }
                }  ?>',
                data: [<?php echo $line['total'];?>],
            },
            <?php
            }
            ?>
            ],
        });
    });
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

</script>
    </head>
    <body>
        <script src="js/highcharts.js"></script>
        <script src="js/modules/exporting.js"></script>
        <div id="container1" style="min-width: 700px; position:absolute; top:150px; left:50px; width=500px"></div>
        <div id="container2" style="min-width: 700px; position:absolute; top:150px; left:825px; width=500px"></div>
        <div id="container3" style="min-width: 700px; position:absolute; top:560px; left:50px; width=500px"></div>
        <div id="container4" style="min-width: 700px; position:absolute; top:560px; left:825px; width=500px"></div>
        <div id="container5" style="min-width: 700px; position:absolute; top:980px; left:50px; width=500px"></div>
        <div id="container6" style="min-width: 700px; position:absolute; top:980px; left:825px; width=500px"></div>
        <div id="container7" style="min-width: 700px; position:absolute; top:1390px; left:50px; width=500px"></div>
        <div id="container8" style="min-width: 700px; position:absolute; top:1390px; left:825px; width=500px"></div>
        <div id="container9" style="min-width: 700px; position:absolute; top:1800px; left:50px; width=500px"></div>
    </body>
</html>
