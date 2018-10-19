<?php
  include_once 'header.php';
  require_once '../conexion/congraphic.php';
  include_once '../model/instructor.class.php';
?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Estadisticas Individual</title>
    <?php
      $nombres = Instructor::getInstancia()->getNombre($_GET['idInstructor']);
      foreach ($nombres as $nombre) {
      $nombre['nombreCompleto'];
      }
    ?>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<style type="text/css">
${demo.css}
		</style>
		<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        title: {
            text: 'Estadistica Final de Avances',
            x: -20 //center
        },
        subtitle: {
            text: 'Evaluacion del Profesor:<?php echo $nombre['nombreCompleto']?>',
            x: -20
        },
        xAxis: {
            categories: ['Desarrollo de la Clase', 'Comunicacion Asertiva', 'Equidad', 'Limpieza e Higiene', 'Motivacion', 'Evaluacion del Aprendizaje',
                'Dominio del Tema', 'Retroalimentacion', 'Valores', 'Recursos Didacticos']
        },
        yAxis: {
            title: {
                text: 'Puntuaciones'
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
            name: 'Bimestre 1',
            data: [<?php
                $resultados = Instructor::getInstancia()->getResultados1($_GET['idInstructor']);
               foreach ($resultados as $resultado) {
                 if ($resultado['idOpcionesEvaluacion'] == 1){
                   echo "20";
                 }elseif ($resultado['idOpcionesEvaluacion'] == 2) {
                   echo "40";
                 }elseif ($resultado['idOpcionesEvaluacion'] == 3) {
                   echo "60";
                 }elseif ($resultado['idOpcionesEvaluacion'] == 4) {
                   echo "80";
                 }else{
                   echo "100";
                 }
                 echo ",";
             }
            ?>]
        }, {
            name: 'Bimestre 2',
            data: [<?php
                $resultados = Instructor::getInstancia()->getResultados2($_GET['idInstructor']);
               foreach ($resultados as $resultado) {
                 if ($resultado['idOpcionesEvaluacion'] == 1){
                   echo "20";
                 }elseif ($resultado['idOpcionesEvaluacion'] == 2) {
                   echo "40";
                 }elseif ($resultado['idOpcionesEvaluacion'] == 3) {
                   echo "60";
                 }elseif ($resultado['idOpcionesEvaluacion'] == 4) {
                   echo "80";
                 }else{
                   echo "100";
                 }
                 echo ",";
             }
            ?>]
        }, {
            name: 'Bimestre 3',
            data: [<?php
                $resultados = Instructor::getInstancia()->getResultados3($_GET['idInstructor']);
               foreach ($resultados as $resultado) {
                 if ($resultado['idOpcionesEvaluacion'] == 1){
                   echo "20";
                 }elseif ($resultado['idOpcionesEvaluacion'] == 2) {
                   echo "40";
                 }elseif ($resultado['idOpcionesEvaluacion'] == 3) {
                   echo "60";
                 }elseif ($resultado['idOpcionesEvaluacion'] == 4) {
                   echo "80";
                 }else{
                   echo "100";
                 }
                 echo ",";
             }
            ?>]
        }, {
            name: 'Bimestre 4',
            data: [<?php
                $resultados = Instructor::getInstancia()->getResultados4($_GET['idInstructor']);
               foreach ($resultados as $resultado) {
                 if ($resultado['idOpcionesEvaluacion'] == 1){
                   echo "20";
                 }elseif ($resultado['idOpcionesEvaluacion'] == 2) {
                   echo "40";
                 }elseif ($resultado['idOpcionesEvaluacion'] == 3) {
                   echo "60";
                 }elseif ($resultado['idOpcionesEvaluacion'] == 4) {
                   echo "80";
                 }else{
                   echo "100";
                 }
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
