<?php
error_reporting(0);
echo "<title>Home</title>";
include_once 'navbar.php';

$totalUsuarioClave = dashboard::getInstancia()->getTotalUsuariosClave();
$totalFormularios= dashboard::getInstancia()->getTotalFormularios();
$totalClaves= dashboard::getInstancia()->getTotalClaves();
$totalInstructores= dashboard::getInstancia()->getTotalInstructores();
$totalAsignaturas= dashboard::getInstancia()->getTotalAsignaturas();
?>

<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="home.php">Home</a> 
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="home.php">Dashboard </a></li>
</ul>
<div class=" col-lg-12 card card-block alert" >
    <b><center><h2>Bienvenido "<?php echo $_SESSION['nombre']; ?>"</h2></center></b>
</div>
<div class="row-fluid">

    <a class="quick-button metro blue span2" href="lista_usuariosClave.php">
        <i class="icon-group"></i>
        <p>Usuarios</p>
        <span class="badge"><?=$totalUsuarioClave;?></span>
    </a>
        <a class="quick-button metro red span2" href="lista_formularios.php">
        <i class="icon-list-alt"></i>
        <p>Formularios</p>
        <span class="badge"><?=$totalFormularios;?></span>
    </a>
    <a class="quick-button metro yellow span2" href="lista_claves.php">
        <i class="icon-file-alt"></i>
        <p>Claves</p>
        <span class="badge"><?=$totalClaves;?></span>
    </a>
    <a class="quick-button metro green span2" href="lista_instructores.php">
        <i class="icon-group"></i>
        <p>Instructores</p>
        <span class="badge"><?=$totalInstructores;?></span>
    </a>
    <a class="quick-button metro black span2" href="lista_asignaturas.php">
        <i class="icon-file-alt"></i>
        <p>Asignaturas</p>
        <span class="badge"><?=$totalAsignaturas;?></span>
    </a>
</div><!--/row-->
<div class="row-fluid">

<?php
include_once 'footer.php';
?>

