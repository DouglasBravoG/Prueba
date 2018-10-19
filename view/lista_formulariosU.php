<?php
error_reporting(0);
//include_once 'user/navbarU.php';
include_once '../model/formulario.class.php';
include_once 'header.php';
echo "<title>Lista Formularios</title>";
?>
<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="user/homeU.php">Home</a> 
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">Lista de Formularios</a></li>
</ul>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header">
            <h2><i class="halflings-icon align-justify"></i><span class="break"></span>Lista de Formularios</h2>             
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered datatable">
                <thead>
                <tr>
                    <th>No. Formulario</th>
                    <th>Asignatura</th>
                    <th>JET</th>
                    <th>Copias</th>
                    <th>Forma</th>
                    <th>Grado</th> 
                    <th>Bimestre</th>
                    <th>Jornada</th>
                    <th>Bachiller</th> 
                    <th>Fecha</th>
                    <th><center>Opciones<center></th>
                </tr>
                </thead>   
                <tbody>
                <?php
                   $formulario = Formulario::getInstancia()->getListaFormularioU();             
                foreach ($formulario as $formulario) {
                    ?>
                    <tr>
                        <td><?php echo $formulario['idFormulario']; ?></td>
                        <td class="center"><?php echo $formulario['idAsignatura']; ?></td>
                        <td class="center"><?php echo $formulario['instructor']; ?></td>
                        <td class="center"><?php echo $formulario['copias']; ?></td>
                        <td class="center"><?php echo $formulario['forma']; ?></td>
                        <td class="center"><?php echo $formulario['grado']; ?></td>
                        <td class="center"><?php echo $formulario['bimestre']; ?></td>
                        <td class="center"><?php echo $formulario['jornada']; ?></td>
                        <td class="center"><?php echo $formulario['bachiller']; ?></td>
                        <td class="center"><?php echo $formulario['fecha']; ?></td>  
                        <td class="center">
                            <center>
                            <a class="btn btn-primary" 
                                href="lista_clavesU.php?idFormulario=<?=$formulario['idFormulario']?>">
                                Respuestas
                            </a>
                            <a class="btn btn-danger"target='_blank'
                                href="../pdf/index.php?idFormulario=<?=$formulario['idFormulario']?>">
                                Nuevo PDF
                            </a>
                        </center>
                        </td>                           
                    </tr>
                <?php }
                 ?>
                </tbody>
            </table> 
            <div class="form-actions modal-footer">
                <center> <a href="user/homeU.php" class="btn" data-dismiss="modal"><h6>Regresar</h6></a></center>
            </div>
        </div>
    </div><!--/span-->
</div>
<?php include_once 'footerU.php'; ?>