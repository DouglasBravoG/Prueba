<?php
error_reporting(0);
include_once 'navbar.php';
include_once '../model/asignatura.class.php';
echo "<title>Lista Usuario</title>";

?>
<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="home.php">Home</a> 
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">Lista de Asignaturas</a></li>
</ul>
<div class="row-fluid sortable">
<div class="box span12">
    <div class="box-header">
        <h2><i class="halflings-icon align-justify"></i><span class="break"></span>Lista de Asignaturas</h2>
    </div>
    <div class="box-content">
    <table class="table table-striped table-bordered datatable">
        <thead>
            <tr>
                <th>idAsignatura</th>
                <th>Asignatura</th>
        </thead>   
        <tbody>
        <?php
           $asignatura = Asignatura::getInstancia()->getListaAsignatura();
            
        foreach ($asignatura as $asignatura) {
            ?>
            <tr>
                <td class="center"><?php echo $asignatura['idAsignatura']; ?></td>
                <td class="center"><?php echo $asignatura['asignatura']; ?></td>                        
            </tr>
        <?php } ?>
        </tbody>
    </table> 
    </div>
    </div><!--/span-->
<?php include_once 'footer.php'; ?>
