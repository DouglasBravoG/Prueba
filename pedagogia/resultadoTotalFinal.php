<?php
  include_once 'header.php';
  require_once '../conexion/congraphic.php';
  include_once '../model/instructor.class.php';
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Estadistica Total</title>

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<style type="text/css">
${demo.css}
		</style>
		<script type="text/javascript">
$(function () {
    $('#container').highcharts({
      title: {
          text: 'Estadistica Final de Avances Generales',
          x: -20 //center
      },
      subtitle: {
          text: 'Total de Evaluaciones',
          x: -20
      },
        xAxis: {
          categories: ['Desarrollo de la Clase', 'Comunicacion Asertiva', 'Equidad', 'Limpieza e Higiene', 'Motivacion', 'Evaluacion del Aprendizaje',
              'Dominio del Tema', 'Retroalimentacion', 'Valores', 'Recursos Didacticos']
        },
        yAxis: {
            title: {
                text: 'Puntuaciones %'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: '%'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'Bimestre I',
            data: [<?php
                $totalPreguntas = Instructor::getInstancia()->getTotalPreguntas1();
                foreach ($totalPreguntas as $totalPregunta) {
                }
                $total100 = $totalPregunta['COUNT(numeroPregunta)'] * 5;

                $totalPunteos = Instructor::getInstancia()->getTotalPunteos1();
                foreach ($totalPunteos as $totalPunteo) {
                $totalPunteo['SUM(idOpcionesEvaluacion)'];
                $punteoObtenido = ($totalPunteo['SUM(idOpcionesEvaluacion)'] * 100) / $total100;
                echo $punteoObtenido;
                echo ",";
                }
            ?>]
        }, {
            name: 'Bimestre II',
            data: [<?php
                $totalPreguntas = Instructor::getInstancia()->getTotalPreguntas2();
                foreach ($totalPreguntas as $totalPregunta) {
                }
                $total100 = $totalPregunta['COUNT(numeroPregunta)'] * 5;

                $totalPunteos = Instructor::getInstancia()->getTotalPunteos2();
                foreach ($totalPunteos as $totalPunteo) {
                $totalPunteo['SUM(idOpcionesEvaluacion)'];
                $punteoObtenido = ($totalPunteo['SUM(idOpcionesEvaluacion)'] * 100) / $total100;
                echo $punteoObtenido;
                echo ",";
                }
            ?>]
        }, {
            name: 'Bimestre III',
            data: [<?php
                $totalPreguntas = Instructor::getInstancia()->getTotalPreguntas3();
                foreach ($totalPreguntas as $totalPregunta) {
                }
                $total100 = $totalPregunta['COUNT(numeroPregunta)'] * 5;

                $totalPunteos = Instructor::getInstancia()->getTotalPunteos3();
                foreach ($totalPunteos as $totalPunteo) {
                $totalPunteo['SUM(idOpcionesEvaluacion)'];
                $punteoObtenido = ($totalPunteo['SUM(idOpcionesEvaluacion)'] * 100) / $total100;
                echo $punteoObtenido;
                echo ",";
                }
            ?>]
        }, {
            name: 'Bimestre IV',
            data: [<?php
                $totalPreguntas = Instructor::getInstancia()->getTotalPreguntas4();
                foreach ($totalPreguntas as $totalPregunta) {
                }
                $total100 = $totalPregunta['COUNT(numeroPregunta)'] * 5;

                $totalPunteos = Instructor::getInstancia()->getTotalPunteos4();
                foreach ($totalPunteos as $totalPunteo) {
                $totalPunteo['SUM(idOpcionesEvaluacion)'];
                $punteoObtenido = ($totalPunteo['SUM(idOpcionesEvaluacion)'] * 100) / $total100;
                echo $punteoObtenido;
                echo ",";
                }
            ?>]
        }]
    });
});
		</script>
	</head>
	<body>
<script src="js/highcharts.js"></script>
<script src="js/modules/exporting.js"></script>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

	</body>
</html>
