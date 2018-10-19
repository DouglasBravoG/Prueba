<?php
  include_once'../session/auth.php';
  require_once '../session/control_sesion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <!-- start: Meta -->
  <meta charset="utf-8">
  <!-- end: Meta -->
  <!-- start: Mobile Specific -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- end: Mobile Specific -->
  <!-- start: CSS -->
  <link id="bootstrap-style" href="../view/assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="../view/assets/css/bootstrap-responsive.min.css" rel="stylesheet">
  <link id="base-style" href="../view/assets/css/style.css" rel="stylesheet">
  <link id="base-style-responsive" href="../view/assets/css/style-responsive.css" rel="stylesheet">
  <link href='../view/assets/css.css' rel='stylesheet' type='text/css'>
  <link id="bootstrap-style" href="../view/assets/css/pedagogia.css" rel="stylesheet">
  <!-- end: CSS -->
  <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <link id="ie-style" href="css/ie.css" rel="stylesheet">
  <![endif]-->
  <!--[if IE 9]>
  <link id="ie9style" href="css/ie9.css" rel="stylesheet">
  <![endif]-->
  <header id="main-header">
    <a id="logo-header" href="home.php">
      <span class="site-name"><img border="0"  src="../view/img/kinalLogo.png" width="35" height="35" /> Centro Educativo Tecnico Laboral KINAL
      </span>
      <center><span class="site-desc"><img border="0"  src="../view/img/Slogan.png" width="200" height="200" /></span></center>
    </a> <!-- / #logo-header -->
    <nav>
      <ul>
        <center>
        <h3><?php echo 'Bienvenido    ',$_SESSION['nombre']; ?></h3>      
        <li><a href="comparacion.php">Comparacion 17/18</a></li>
        <li><a href="listaInstructores.php">Lista Instructores</a></li>
        <li><a href="../session/logout.php"><i class="halflings-icon off"></i> Cerrar Sesion</a></li>
      </center>
      </ul>
    </nav><!-- / nav -->
  </header><!-- / #main-header -->

  <!-- start: Favicon -->
  <link rel="shortcut icon" href="assets/img/favicon.ico">
  <!-- end: Favicon -->
</head>

<link href='../view/assets/css/boton.css' rel='stylesheet' type='text/css'>
<div id="fixed-bottom">
<p><a href="resultadoTotal.php"  style="color:white" >Resultados Profesor</a></p>
</div>
