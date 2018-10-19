<?php
error_reporting(0);
    echo "<title>Home</title>";
    include_once 'navbarU.php';
    $totalFormularios= dashboardU::getInstancia()->getTotalFormularios();
?>

<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="homeU.php">Home</a> 
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="homeU.php">Dashboard </a></li>
</ul>

<div class=" col-lg-12 card card-block alert" >
    <b><h2><center>Bienvenido "<?php echo $_SESSION['nombre']; ?>"</center></h2></b>
</div>
<div class="row-fluid">
    <a class="quick-button metro red span2" href="../lista_formulariosU.php">
        <i class="icon-list-alt"></i>
        <p>Formularios</p>
        <span class="badge"></span>
    </a>
</div><!--/row-->

<?php
include_once 'footerU.php';
?>

