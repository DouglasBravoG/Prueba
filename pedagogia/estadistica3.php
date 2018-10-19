<?php
include 'header.php';
//require_once '../conexion/conexion.class.php';
require_once '../conexion/congraphic.php';
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Estadisticas Bim III</title>
	<h1><strong>Tercer Bimestre</strong></h1>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<style type="text/css">
			${demo.css}
	</style>
<script type="text/javascript">
//Esta es la Estadistica del tipo de metodologia de Enseñanza-----------------------------------
$(function () {
    $(document).ready(function () {
        // Build the chart
        $('#containerMetodologia').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: 'Estadistica de Metodologia'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                type: 'pie',
                name: 'Resultado Final',
                data: [
					<?php
						$query = 'SELECT idOpcionesEvaluacion, COUNT(idOpcionesEvaluacion) AS totalOpcionMet
						FROM resultadoInstructor WHERE numeroPregunta = 1 AND idEnvio = 3
						GROUP BY idOpcionesEvaluacion';
						$resultado = mysqli_query($conn, $query) or die ('Consulta fallida'.mysql_error());
						while ($line = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
					?>
					['<?php if ($line ['idOpcionesEvaluacion'] == 6){
						echo 'Pasivo';
					}elseif ($line ['idOpcionesEvaluacion'] == 7){
						echo 'Activo';
					}elseif($line ['idOpcionesEvaluacion'] == 8){
						echo 'Combinado';
					} ?>', <?php echo $line ['totalOpcionMet'];?>],
					<?php
						}
					 ?>
                ]
            }]
        });
    });

});
//---------------------------------------------------------Grafica 1-------------------------------------------
$(function () {
$(document).ready(function () {
    // Build the chart
    $('#container1').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'Estadistica Desarrollo de la Clase'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        series: [{
            type: 'pie',
            name: 'Resultado Final',
            data: [
				<?php
					$query = 'SELECT idOpcionesEvaluacion, COUNT(idOpcionesEvaluacion) AS totalOpcion1
          FROM resultadoInstructor WHERE numeroPregunta = 14 AND idEnvio = 3
          GROUP BY idOpcionesEvaluacion';
					$resultado = mysqli_query($conn, $query) or die ('Consulta fallida'.mysql_error());
					while ($line = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
				?>
				['<?php if ($line ['idOpcionesEvaluacion'] == 1){
					echo 'Falta Mucho';
				}elseif ($line ['idOpcionesEvaluacion'] == 2){
					echo 'Se Puede Mejorar';
				}elseif($line ['idOpcionesEvaluacion'] == 3){
					echo 'Esta Bien';
				}elseif($line ['idOpcionesEvaluacion'] == 4){
					echo 'Bastante Bien';
				}else{
					echo'Muy Bien';
				} ?>', <?php echo $line ['totalOpcion1'];?>],
				<?php
					}
				 ?>
            ]
        }]
    });
});
});
//---------------------------------------------------------Grafica 2-------------------------------------------
$(function () {
$(document).ready(function () {
    // Build the chart
    $('#container2').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'Estadistica Comunicacion Asertiva'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        series: [{
            type: 'pie',
            name: 'Resultado Final',
            data: [
				<?php
					$query = 'SELECT idOpcionesEvaluacion, COUNT(idOpcionesEvaluacion) AS totalOpcion2
          FROM resultadoInstructor WHERE numeroPregunta = 15 AND idEnvio = 3
          GROUP BY idOpcionesEvaluacion';
					$resultado = mysqli_query($conn, $query) or die ('Consulta fallida'.mysql_error());
					while ($line = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
				?>
				['<?php if ($line ['idOpcionesEvaluacion'] == 1){
					echo 'Falta Mucho';
				}elseif ($line ['idOpcionesEvaluacion'] == 2){
					echo 'Se Puede Mejorar';
				}elseif($line ['idOpcionesEvaluacion'] == 3){
					echo 'Esta Bien';
				}elseif($line ['idOpcionesEvaluacion'] == 4){
					echo 'Bastante Bien';
				}else{
					echo'Muy Bien';
				} ?>', <?php echo $line ['totalOpcion2'];?>],
				<?php
					}
				 ?>
            ]
        }]
    });
});
});
//---------------------------------------------------------Grafica 3-------------------------------------------
$(function () {
$(document).ready(function () {
    // Build the chart
    $('#container3').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'Estadistica Equidad'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        series: [{
            type: 'pie',
            name: 'Resultado Final',
            data: [
				<?php
					$query = 'SELECT idOpcionesEvaluacion, COUNT(idOpcionesEvaluacion) AS totalOpcion3
          FROM resultadoInstructor WHERE numeroPregunta = 16 AND idEnvio = 3
          GROUP BY idOpcionesEvaluacion';
					$resultado = mysqli_query($conn, $query) or die ('Consulta fallida'.mysql_error());
					while ($line = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
				?>
				['<?php if ($line ['idOpcionesEvaluacion'] == 1){
					echo 'Falta Mucho';
				}elseif ($line ['idOpcionesEvaluacion'] == 2){
					echo 'Se Puede Mejorar';
				}elseif($line ['idOpcionesEvaluacion'] == 3){
					echo 'Esta Bien';
				}elseif($line ['idOpcionesEvaluacion'] == 4){
					echo 'Bastante Bien';
				}else{
					echo'Muy Bien';
				} ?>', <?php echo $line ['totalOpcion3'];?>],
				<?php
					}
				 ?>
            ]
        }]
    });
});
});
//---------------------------------------------------------Grafica 4-------------------------------------------
$(function () {
$(document).ready(function () {
    // Build the chart
    $('#container4').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'Estadistica Limpieza e Higiene'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        series: [{
            type: 'pie',
            name: 'Resultado Final',
            data: [
				<?php
					$query = 'SELECT idOpcionesEvaluacion, COUNT(idOpcionesEvaluacion) AS totalOpcion4
          FROM resultadoInstructor WHERE numeroPregunta = 17 AND idEnvio = 3
          GROUP BY idOpcionesEvaluacion';
					$resultado = mysqli_query($conn, $query) or die ('Consulta fallida'.mysql_error());
					while ($line = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
				?>
				['<?php if ($line ['idOpcionesEvaluacion'] == 1){
					echo 'Falta Mucho';
				}elseif ($line ['idOpcionesEvaluacion'] == 2){
					echo 'Se Puede Mejorar';
				}elseif($line ['idOpcionesEvaluacion'] == 3){
					echo 'Esta Bien';
				}elseif($line ['idOpcionesEvaluacion'] == 4){
					echo 'Bastante Bien';
				}else{
					echo'Muy Bien';
				} ?>', <?php echo $line ['totalOpcion4'];?>],
				<?php
					}
				 ?>
            ]
        }]
    });
});
});
//---------------------------------------------------------Grafica 5-------------------------------------------
$(function () {
$(document).ready(function () {
    // Build the chart
    $('#container5').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'Estadistica Motivacion'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        series: [{
            type: 'pie',
            name: 'Resultado Final',
            data: [
				<?php
					$query = 'SELECT idOpcionesEvaluacion, COUNT(idOpcionesEvaluacion) AS totalOpcion5
          FROM resultadoInstructor WHERE numeroPregunta = 18 AND idEnvio = 3
          GROUP BY idOpcionesEvaluacion';
					$resultado = mysqli_query($conn, $query) or die ('Consulta fallida'.mysql_error());
					while ($line = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
				?>
				['<?php if ($line ['idOpcionesEvaluacion'] == 1){
					echo 'Falta Mucho';
				}elseif ($line ['idOpcionesEvaluacion'] == 2){
					echo 'Se Puede Mejorar';
				}elseif($line ['idOpcionesEvaluacion'] == 3){
					echo 'Esta Bien';
				}elseif($line ['idOpcionesEvaluacion'] == 4){
					echo 'Bastante Bien';
				}else{
					echo'Muy Bien';
				} ?>', <?php echo $line ['totalOpcion5'];?>],
				<?php
					}
				 ?>
            ]
        }]
    });
});
});
//---------------------------------------------------------Grafica 6-------------------------------------------
$(function () {
$(document).ready(function () {
    // Build the chart
    $('#container6').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'Estadistica Evaluacion del Aprendizaje'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        series: [{
            type: 'pie',
            name: 'Resultado Final',
            data: [
				<?php
					$query = 'SELECT idOpcionesEvaluacion, COUNT(idOpcionesEvaluacion) AS totalOpcion6
          FROM resultadoInstructor WHERE numeroPregunta = 18 AND idEnvio = 3
          GROUP BY idOpcionesEvaluacion';
					$resultado = mysqli_query($conn, $query) or die ('Consulta fallida'.mysql_error());
					while ($line = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
				?>
				['<?php if ($line ['idOpcionesEvaluacion'] == 1){
					echo 'Falta Mucho';
				}elseif ($line ['idOpcionesEvaluacion'] == 2){
					echo 'Se Puede Mejorar';
				}elseif($line ['idOpcionesEvaluacion'] == 3){
					echo 'Esta Bien';
				}elseif($line ['idOpcionesEvaluacion'] == 4){
					echo 'Bastante Bien';
				}else{
					echo'Muy Bien';
				} ?>', <?php echo $line ['totalOpcion6'];?>],
				<?php
					}
				 ?>
            ]
        }]
    });
});
});
//---------------------------------------------------------Grafica 7-------------------------------------------
$(function () {
$(document).ready(function () {
    // Build the chart
    $('#container7').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'Estadistica Dominio del Tema'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        series: [{
            type: 'pie',
            name: 'Resultado Final',
            data: [
				<?php
					$query = 'SELECT idOpcionesEvaluacion, COUNT(idOpcionesEvaluacion) AS totalOpcion7
          FROM resultadoInstructor WHERE numeroPregunta = 20 AND idEnvio = 3
          GROUP BY idOpcionesEvaluacion';
					$resultado = mysqli_query($conn, $query) or die ('Consulta fallida'.mysql_error());
					while ($line = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
				?>
				['<?php if ($line ['idOpcionesEvaluacion'] == 1){
					echo 'Falta Mucho';
				}elseif ($line ['idOpcionesEvaluacion'] == 2){
					echo 'Se Puede Mejorar';
				}elseif($line ['idOpcionesEvaluacion'] == 3){
					echo 'Esta Bien';
				}elseif($line ['idOpcionesEvaluacion'] == 4){
					echo 'Bastante Bien';
				}else{
					echo'Muy Bien';
				} ?>', <?php echo $line ['totalOpcion7'];?>],
				<?php
					}
				 ?>
            ]
        }]
    });
});
});
//---------------------------------------------------------Grafica 8-------------------------------------------
$(function () {
$(document).ready(function () {
    // Build the chart
    $('#container8').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'Estadistica Retroalimentacion'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        series: [{
            type: 'pie',
            name: 'Resultado Final',
            data: [
				<?php
					$query = 'SELECT idOpcionesEvaluacion, COUNT(idOpcionesEvaluacion) AS totalOpcion8
          FROM resultadoInstructor WHERE numeroPregunta = 21 AND idEnvio = 3
          GROUP BY idOpcionesEvaluacion';
					$resultado = mysqli_query($conn, $query) or die ('Consulta fallida'.mysql_error());
					while ($line = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
				?>
				['<?php if ($line ['idOpcionesEvaluacion'] == 1){
					echo 'Falta Mucho';
				}elseif ($line ['idOpcionesEvaluacion'] == 2){
					echo 'Se Puede Mejorar';
				}elseif($line ['idOpcionesEvaluacion'] == 3){
					echo 'Esta Bien';
				}elseif($line ['idOpcionesEvaluacion'] == 4){
					echo 'Bastante Bien';
				}else{
					echo'Muy Bien';
				} ?>', <?php echo $line ['totalOpcion8'];?>],
				<?php
					}
				 ?>
            ]
        }]
    });
});
});
//---------------------------------------------------------Grafica 9-------------------------------------------
$(function () {
$(document).ready(function () {
    // Build the chart
    $('#container9').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'Estadistica Valores'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        series: [{
            type: 'pie',
            name: 'Resultado Final',
            data: [
				<?php
					$query = 'SELECT idOpcionesEvaluacion, COUNT(idOpcionesEvaluacion) AS totalOpcion9
          FROM resultadoInstructor WHERE numeroPregunta = 22 AND idEnvio = 3
          GROUP BY idOpcionesEvaluacion';
					$resultado = mysqli_query($conn, $query) or die ('Consulta fallida'.mysql_error());
					while ($line = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
				?>
				['<?php if ($line ['idOpcionesEvaluacion'] == 1){
					echo 'Falta Mucho';
				}elseif ($line ['idOpcionesEvaluacion'] == 2){
					echo 'Se Puede Mejorar';
				}elseif($line ['idOpcionesEvaluacion'] == 3){
					echo 'Esta Bien';
				}elseif($line ['idOpcionesEvaluacion'] == 4){
					echo 'Bastante Bien';
				}else{
					echo'Muy Bien';
				} ?>', <?php echo $line ['totalOpcion9'];?>],
				<?php
					}
				 ?>
            ]
        }]
    });
});
});
//---------------------------------------------------------Grafica 10-------------------------------------------
$(function () {
$(document).ready(function () {
    // Build the chart
    $('#container10').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'Estadistica Recursos Didacticos'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        series: [{
            type: 'pie',
            name: 'Resultado Final',
            data: [
				<?php
					$query = 'SELECT idOpcionesEvaluacion, COUNT(idOpcionesEvaluacion) AS totalOpcion10
          FROM resultadoInstructor WHERE numeroPregunta = 23 AND idEnvio = 3
          GROUP BY idOpcionesEvaluacion';
					$resultado = mysqli_query($conn, $query) or die ('Consulta fallida'.mysql_error());
					while ($line = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
				?>
				['<?php if ($line ['idOpcionesEvaluacion'] == 1){
					echo 'Falta Mucho';
				}elseif ($line ['idOpcionesEvaluacion'] == 2){
					echo 'Se Puede Mejorar';
				}elseif($line ['idOpcionesEvaluacion'] == 3){
					echo 'Esta Bien';
				}elseif($line ['idOpcionesEvaluacion'] == 4){
					echo 'Bastante Bien';
				}else{
					echo'Muy Bien';
				} ?>', <?php echo $line ['totalOpcion10'];?>],
				<?php
					}
				 ?>
            ]
        }]
    });
});
});
</script>
</head>

<body>
	
	<script src="js/highcharts.js"></script>
	<script src="js/modules/exporting.js"></script>

	<div id="containerMetodologia" style="min-width: 705px; position:absolute; top:555px; left:371px; width=500px"></div>

	<div id="container1" style="min-width: 350px; position:absolute; top:150px; left:15px; width=500px"></div>
	<div id="container2" style="min-width: 350px; position:absolute; top:150px; left:371px; width=500px"></div>
	<div id="container3" style="min-width: 350px; position:absolute; top:150px; left:727px; width=500px"></div>
	<div id="container4" style="min-width: 350px; position:absolute; top:150px; left:1083px; width=500px"></div>

	<div id="container5" style="min-width: 350px; position:absolute; top:555px; left:15px; width=500px"></div>
	<div id="container6" style="min-width: 350px; position:absolute; top:555px; left:1083px; width=500px"></div>

	<div id="container7" style="min-width: 350px; position:absolute; top:962px; left:15px; width=500px"></div>
	<div id="container8" style="min-width: 350px; position:absolute; top:962px; left:371px; width=500px"></div>
	<div id="container9" style="min-width: 350px; position:absolute; top:962px; left:727px; width=500px"></div>
	<div id="container10" style="min-width: 350px; position:absolute; top:962px; left:1083px; width=500px"></div>

</body>
</html>
