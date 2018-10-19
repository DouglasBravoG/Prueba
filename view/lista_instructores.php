<?php
error_reporting(0);
include_once 'navbar.php';
include_once '../model/instructor.class.php';
echo "<title>Lista Usuario</title>";

?>
<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="home.php">Home</a> 
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">Lista de Instructores</a></li>
</ul>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header">
            <h2><i class="halflings-icon align-justify"></i><span class="break"></span>Lista de Instructores</h2>
        </div>
    <div class="box-content">
        <table class="table table-striped table-bordered datatable">
            <thead>
            <tr>
                <th>Nombre Completo</th>
                <th>Direccion</th>
                <th>Telefono Casa</th>
                <th>Telefono Celular</th>
                <th>Telefono Trabajo</th>
                 <th>Correo</th>
            </tr>
            </thead>   
            <tbody>
            <?php
               $instructor = Instructor::getInstancia()->getListaInstructor();
                
            foreach ($instructor as $instructor) {
                ?>
                <tr>
                    <td class="center"><?php echo $instructor['nombreCompleto']; ?></td>
                    <td class="center"><?php echo $instructor['direccion']; ?></td>
                    <td class="center"><?php echo $instructor['telefonoCasa']; ?></td>
                    <td class="center"><?php echo $instructor['telefonoCelular']; ?></td>
                    <td class="center"><?php echo $instructor['telefonoTrabajo']; ?></td>
                    <td class="center"><?php echo $instructor['correoElectronico']; ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table> 
    </div>
    </div><!--/span-->
</div>
<?php include_once 'footer.php'; ?>
