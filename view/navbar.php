<?php
include_once 'header.php';
require_once '../model/usuarioClave.class.php';
require_once '../model/dashboard.class.php';

$totalUsuariosClave = dashboard::getInstancia()->getTotalUsuariosClave();
$totalFormularios = dashboard:: getInstancia()->getTotalFormularios();
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
 <img border="0"  src="img/kinalLogo.png" width="40" height="40" />
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
                    <span>ID USUARIO: <?php echo $_SESSION['nombre']; ?></span>
                </li>
                <li><a href="ver_perfil.php"><i class="halflings-icon user"></i> Mi perfil</a></li>
                <li><a href="../session/logout.php"><i class="halflings-icon off"></i> Cerrar Sesion</a></li>
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
            <li><a href="home.php"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Dashboard</span></a></li>                                                
            <li>
                <a class="dropmenu" href="#"><i class="halflings-icon white user"></i><span class="hidden-tablet"> Usuarios <span class="label label-important"> ... </span></span></a>
                <ul>
                    <li><a class="submenu" href="lista_usuariosClave.php"><i class="halflings-icon white user"></i><span class="hidden-tablet"> Usuarios Registrados <span class="label"> <?=$totalUsuariosClave;?> </span></span></a></li>
                    <li><a class="submenu btn-form-usuario" href="#"><i class="icon-edit"></i><span class="hidden-tablet"> Registrar Usuario</span></a></li>
                </ul>   
            </li>
            <li>
                <a class="dropmenu" href="#"><i class="icon-list-alt"></i><span class="hidden-tablet"> Formularios <span class="label label-important"> + </span></span></a>
                <ul>
                 <li><a class="submenu" href="nuevo_formulario.php"><i class="halflings-icon white plus"></i><span class="hidden-tablet"> Nuevo Formulario</span></a></li>
                 <li><a class="submenu" href="lista_formularios.php"><i class="icon-align-justify"></i><span class="hidden-tablet"> Lista de Formularios <span class="label"> <?=$totalFormularios;?> </span></span></a></li>
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
    
<!-- Usuario -->
<!-- Registrar -->
<div class="modal hide fade" id="myFormUsuario">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h3>Formulario Registrar Usuario</h3>
    </div>
    <div class="box-content">
    <form class="form-horizontal" action="../controller/Instancia_usuarioClave.php?func=insert" method="post">
        <fieldset>
        <div class="control-group">
            <label class="control-label" for="focusedInput">Nick</label>
            <div class="controls">
                <input class="input-xlarge focused" id="focusedInput" required="true" type="text" name="nick">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="focusedInput">Contrase&ntilde;a</label>
            <div class="controls">
                <input class="input-xlarge focused" required="true" id="focusedInput" type="text" name="contrasena">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="focusedInput">Correo</label>
            <div class="controls">
                <input class="input-xlarge focused" id="focusedInput" required="true" type="email" name="correo" value="@kinal.org.gt"  pattern=".+@[kK][iI][nN][aA][lL][.][oO][rR][gG][.][gG][tT]">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="focusedInput">Nombre Completo</label>
            <div class="controls">
                <input class="input-xlarge focused" id="focusedInput" required="true" type="text" name="nombre">
            </div>
        </div>
         <div class="control-group">
            <label class="control-label" for="focusedInput">Rol</label>
            <div class="controls">
            <select id="selectError3" name="idRol" selected="seleccionar">
               <?php
               $roles = UsuarioClave::getInstancia()->getListaRoles();
               foreach ($roles as $rol) {
                   print '<option value="' . $rol['idRol'] . '">';
                   print $rol['nombreRol'];
                   print '</option>';
               };
               ?>
           </select>
            </div>
        </div>
        <div class="form-actions modal-footer">
            <button type="submit" class="btn btn-primary">Registrar Usuario</button>
            <button onclick="formReset()" class="btn" data-dismiss="modal">Cancelar</button>
        </div>
        </fieldset>
    </form>
    </div>
</div>
