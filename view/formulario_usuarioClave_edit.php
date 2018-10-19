<?php
error_reporting(0);
include_once 'navbar.php';
require_once '../model/usuarioClave.class.php';

$idUsuarioClave = $_GET['id'];
$usuarioClave = UsuarioClave::getInstancia()->buscarUsuarioClave($idUsuarioClave);
$nick = '';
$contrasena = '';
$correo = '';
$nombre = '';
$rol = '';
echo "<title>Editar Usuario</title>";
foreach ($usuarioClave as $temp) {
    $nick = $temp['nick'];
    $contrasena = $temp['contrasena'];
    $correo = $temp['correo'];
    $nombre = $temp['nombre'];
    $rol = $temp['idRol'];
}
$contrasenaSegura = UsuarioClave::getInstancia()->desencriptar($contrasena);
?>
<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="home.php">Home</a> 
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">Editar Usuarios</a></li>
</ul>
<div class="row-fluid sortable">
    <div class="box span6">
    <div class="box-header" data-original-title>
        <h2><i class="halflings-icon edit"></i><span class="break"></span>Formulario Editar Usuario</h2>

    </div>
    <div class="box-content">
    <form class="form-horizontal" action="../controller/Instancia_usuarioClave.php?func=update" method="post">
        <fieldset>
            <div class="control-group">
                <label class="control-label" for="disabledInput">Codigo</label>
                <div class="controls">
                    <input name="idUsuarioClave" value="<?= $idUsuarioClave; ?>" class="input-xlarge disabled" id="disabledInput" type="text" disabled="">
                    <input name="idUsuarioClave" value="<?= $idUsuarioClave; ?>"class="input-xlarge disabled" id="disabledInput" type="hidden">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="focusedInput">Nick del Usuario</label>
                <div class="controls">
                    <input value="<?=$nick;?>" class="input-xlarge focused" id="focusedInput" type="text" name="nick" required="true">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="focusedInput">Contrase&ntilde;a</label>
                <div class="controls">
                    <input value="<?=$contrasenaSegura;?>"class="input-xlarge focused" id="focusedInput" type="text" name="contrasena" required="true">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="focusedInput">Correo</label>
                <div class="controls">
                    <input value="<?= $correo; ?>"class="input-xlarge focused" id="focusedInput" type="text" name="correo" required="true" value="@kinal.org.gt"  pattern=".+@[kK][iI][nN][aA][lL][.][oO][rR][gG][.][gG][tT]">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="focusedInput">Nombre</label>
                <div class="controls">
                    <input value="<?= $nombre; ?>"class="input-xlarge focused" id="focusedInput" type="text" name="nombre" required="true">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="focusedInput">Rol</label>
                <div class="controls">
               <select id="selectError3" name="idRol" selected="seleccionar">
                <?php
                $datosRol = UsuarioClave::getInstancia()->getListaRoles();
                foreach ($datosRol as $dato) {
                    print '<option value="' . $dato['idRol'] . '"';
                    if ($rol == $dato['idRol']) {
                        print ' selected="selected"';
                    }
                    print '>' . $dato['nombreRol'];
                    print '</option>';
                }
                ?>
               </select>
                </div>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                <button class="btn">Cancelar</button>
            </div>
        </fieldset>
    </form>
    </div>
    </div><!--/span-->
</div><!--/row-->

<?php
include_once 'footer.php';
?>