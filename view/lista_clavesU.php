<?php
error_reporting(0);
include_once 'header.php';
include_once '../model/clave.class.php';

echo "<title>Lista Claves</title>";
?>
<ul class="breadcrumb">
<li>
    <i class="icon-home"></i>
    <a href="user/homeU.php">Home</a> 
    <i class="icon-angle-right"></i>
</li>
<li><a href="#">Lista de Claves</a></li>
</ul>

<div class="row-fluid sortable">
<div class="box span12">
<div class="box-header">
    <h2><i class="halflings-icon align-justify"></i><span class="break"></span>Lista de Claves</h2>
</div>
    <div class="box-content">
    <table class="table table-striped table-bordered datatable">
        <thead>
        <tr>
            <th>Clave</th>
            <th>Numero De Preguntas</th>
            <th>Punteo</th>
            <th>Respuestas</th>
            <th>TipoPregunta</th>
        </tr>
        </thead>   
        <tbody>
            <?php
                if(isset($_GET['idFormulario'])) {
                    $claves = Clave::getInstancia()->getListaClavesF($_GET['idFormulario']);
                } else {
                    $claves = Clave::getInstancia()->getListaClave();     
                }
                
            foreach ($claves as $clave) {
                ?>
                <tr>
                    <td class="center"><?php echo $clave['idFormulario']; ?></td>
                    <td class="center"><?php echo $clave['numeroPregunta']; ?></td>
                    <td class="center"><?php echo $clave['valor']; ?></td>
                    <td class="center"><?php echo $clave['respuesta']; ?></td>
                    <td class="center"><?php echo $clave['tipoPregunta']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table> 
    <div class="form-actions modal-footer">
        <center> <a href="lista_formulariosU.php" class="btn" data-dismiss="modal"><h6>Regresar</h6></a></center>
    </div>
    </div>
</div><!--/span-->
<?php include_once 'user/footerU.php'; ?>