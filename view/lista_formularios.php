<?php
error_reporting(0);
include_once 'navbar.php';
include_once '../model/formulario.class.php';

echo "<title>Lista Formularios</title>";
?>
<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="home.php">Home</a> 
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
        <th>Opciones</th>
    </tr>
</thead>   
<tbody>

    <?php
       $formulario = Formulario::getInstancia()->getListaFormulario();
        
    foreach ($formulario as $formulario) {
        ?>
        <tr>
            <td><?php echo $formulario['idFormulario']; ?></td>
            <td class="center"><?php echo $formulario['idAsignatura']; ?></td>
            <td class="center"><?php echo $formulario['instructor']; ?></td>
            <td class="center"><?php echo $formulario['copias']; ?></td>
            <td class="center"><?php echo $formulario['forma']; ?></td>
            <td class="center"><?php echo $formulario['grado']; ?></td>
            <td class="center"><?php if ($formulario['bimestre']==1){
                echo "Uno";
            }elseif($formulario['bimestre']==2){
                echo "Dos";
            }else if($formulario['bimestre']==3){
                echo "Tres";
            }else if($formulario['bimestre']==4){
                echo "Cuatro";
            }else{
                echo "Seis";
            }
            ?></td>
            <td class="center"><?php echo $formulario['jornada']; ?></td>
            <td class="center"><?php echo $formulario['bachiller']; ?></td>
            <td class="center"><?php echo $formulario['fecha']; ?></td>
            <td class="center">
                <a class="btn btn-primary" 
                   href="lista_claves.php?idFormulario=<?=$formulario['idFormulario']?>">
                    Respuestas
                </a>
                <a class="btn btn-danger" onclick="eliminarActividad(<?=$formulario['idFormulario']?>);">
                    <i class="halflings-icon white trash"></i> Eliminar
                </a>
                
            </td>    
        </tr>
    <?php }
     ?>
</tbody>
</table> 
</div>
</div><!--/span-->

<div class="modal hide fade" id="modalFormularioEliminar">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h3>Eliminar Formulario.</h3>
    </div>
    <div class="box-content">
        <form class="form-horizontal" action="../controller/Instancia_formulario.php?func=delete" 
        method="post">
            <fieldset>
                <label>Esta Seguro que desea eliminar el Formulario?</label>
                <input  id="idFormulario" type="hidden" name="idFormulario">
                <input id="idFormulario_disabled" type="text" disabled="">
                <div class="form-actions modal-footer">
                    <button type="submit" class="btn btn-primary">Si</button>
                    <button class="btn" data-dismiss="modal">No</button>
                </div>
            </fieldset>
        </form>
    </div>
</div>
<?php include_once 'footer.php'; ?>
<script type="text/javascript">
    function eliminarActividad(id) {
        $('#modalFormularioEliminar').modal('show');
        $("#idFormulario").val(id);
        $("#idFormulario_disabled").val(id);
    } 
</script>
<?php include_once 'footer.php'; ?>
