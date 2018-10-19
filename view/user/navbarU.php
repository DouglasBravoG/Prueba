<?php
    include_once 'headerU.php';
    require_once 'dashboardU.class.php';
    $totalFormularios = dashboardU:: getInstancia()->getTotalFormularios();
?>

<body>
<!-- start: Header -->
<div class="navbar">
<div class="navbar-inner">
<div class="container-fluid">
    <a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </a>
    <center><font face="times new roman,arial,verdana" size=5 color=orange ><b>_________________________________________--Php Keys--___________________________________________</b></font></center> 
     <img border="0"  src="../img/kinalLogo.png" width="40" height="40" />
     <font face="times new roman,arial,verdana"><i>Centro Educativo Tecnico Laboral Kinal</i></font> 
 <!-- start: Header Menu -->
    <ul class="nav pull-right">
        <!-- start: User Dropdown -->
        <li class="dropdown">
            <a data-toggle="dropdown" href="#">
                <i class="halflings-icon white user"></i> <?php echo $_SESSION['nombre']; ?>
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li class="dropdown-menu-title">
                    <span>ID USUARIO: <?php echo $_SESSION['idUsuarioClave']; ?></span>
                </li>
                <li><a href="../../session/logout.php"><i class="halflings-icon off"></i> Cerrar Sesion</a></li>
            </ul>
        </li>
        <!-- end: User Dropdown -->
    </ul>
<!-- end: Header Menu -->
</div>
</div>
</div>
<!-- start: Header -->

<div class="container-fluid-full">
<div class="row-fluid">
    
    <!-- start: Main Menu -->
<div id="sidebar-left" class="span2">
<div class="nav-collapse sidebar-nav">
    <ul class="nav nav-tabs nav-stacked main-menu">
        <li><a href="homeU.php"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Dashboard</span></a></li>                                                
        <li>
            <a class="dropmenu" href="#"><i class="icon-list-alt"></i><span class="hidden-tablet"> Formularios <span class="label label-important"> + </span></span></a>
            <ul>
            <li><a class="submenu" href="nuevo_formularioU.php"><i class="halflings-icon white plus"></i><span class="hidden-tablet"> Nuevo Formulario</span></a></li>
            <li><a class="submenu" href="../lista_formulariosU.php"><i class="icon-align-justify"></i><span class="hidden-tablet"> Lista de Formularios <span class="label"> <?=$totalFormularios;?> </span></span></a></li>  
           </ul>    
        </li>
    </ul>
</div>
</div>
    <!-- end: Main Menu -->

<noscript>
<div class="alert alert-block span10">
<h4 class="alert-heading">Warning!</h4>
<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
</div>
</noscript>

<!-- start: Content -->
<div id="content" class="span10">
