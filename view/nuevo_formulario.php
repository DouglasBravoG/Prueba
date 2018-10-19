<?php
include_once 'navbar.php';
require_once '../conexion/conexion.class.php';
require_once '../model/formulario.class.php';
echo "<title>Nuevo Formulario</title>";
$time = time();
?>
<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="home.php">Home</a> 
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">Nuevo Formulario</a></li>
</ul>
<div class="row-fluid sortable">
    <div class="box span6">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Registrar Formulario</h2>
        </div>
        <div class="box-content">
            <form name="Form_formulario" class="form-horizontal" action="../controller/Instancia_formulario.php?func=insert" method="post">
                <fieldset>
                    <div class="control-group">
                        <h1><center>Jefe Equipo Tecnico</center></h1>
                        <h1><center><?php echo $_SESSION['nombre']; ?></h1></center>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="focusedInput">Grado</label>
                        <div class="controls">
                            <select id="grado" name="idGrado" selected="seleccionar">
                                <option value="Seleccionar" selected="">Seleccionar</option>
                                <?php
                                $grados_academicos = Formulario::getInstancia()->getListaGradosAcademicos();
                                foreach ($grados_academicos as $grado_academico) {
                                    print '<option value="' . $grado_academico['idGrado'] . '">';
                                    print $grado_academico['grado'];
                                    print '</option>';
                                };
                                ?>
                            </select>
                        </div>
                    </div> 
                     <div class="control-group">
                        <label class="control-label" for="focusedInput">Asignaturas</label>
                        <div class="controls">
                            <select id="asignatura" name="idAsignatura" selected="seleccionar">
                                <option value="Seleccionar" selected="">Seleccionar</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <input class="input-xlarge focused" id="focusedInput"  type="hidden" name="instructor" required="true" value="<?php echo $_SESSION['nombre']; ?>" >
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="focusedInput">Cantidad de Examenes</label>
                        <div class="controls">
                            <input class="input-xlarge focused" id="focusedInput" type="text" name="copias" required="true">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="focusedInput">Forma</label>
                        <div class="controls">
                            <select id="forma" name="forma" onclick="activa(this.value)">
                                <option value="Seleccionar" selected="">Seleccionar</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>                                
                            </select>
                        </div>
                    </div>                      
                    <div class="control-group">
                        <label class="control-label" for="focusedInput">Bimestre</label>
                        <div class="controls">
                            <select id="bimestre" name="bimestre" onclick="activa(this.value)">
                                <option value="Seleccionar" selected="">Seleccionar</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="6">6</option>                                
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="focusedInput">Jornada</label>
                        <div class="controls">
                            <select id="jornada" name="jornada" onclick="activa(this.value)">
                                <option value="Seleccionar" selected="">Seleccionar</option>
                                <option value="JM">Matutina</option>
                                <option value="JV">Vespertina</option> 
                                <option value="Ambas">Ambas</option>                               
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="focusedInput">Bachiller</label>
                        <div class="controls">
                            <select id="bachiller" name="bachiller" onclick="activa(this.value)">
                                <option value="Seleccionar" selected="">Seleccionar</option>
                                <option value="1">Si</option>
                                <option value="0">No</option>                              
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <input class="input-xlarge focused" id="focusedInput" type="hidden" name="fecha" required="true" value="<?php echo date("Y-m-d  G:i:s", $time);?>" >
                        </div>
                    </div>
                    <div class="form-actions modal-footer">
                        <button type="submit" class="btn btn-primary">Guardar Formulario</button>
                        <a href="home.php" class="btn" data-dismiss="modal">Cancelar</a>
                    </div>
                </fieldset>
            </form>
        </div>
    </div><!--/span-->
</div><!--/row-->
<?php
include_once 'footer.php';
?>
</script>
<script language="javascript">
$(document).ready(function(){
   $("#grado").change(function () {
           $("#grado option:selected").each(function () {
            idGrado = $(this).val();
            $.post("ajax/asignaturas.php", { idGrado: idGrado }, function(data){
                $("#asignatura").html(data);
            });            
        });
   })
});
</script>