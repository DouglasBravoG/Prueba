<?php
error_reporting(0);
include_once 'navbar.php';
include_once '../model/usuarioClave.class.php';

echo "<title>Lista Usuario</title>";
?>
<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="home.php">Home</a> 
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">Lista de Usuarios</a></li>
</ul>
<?php
$message = $_GET['e'];

switch ($message) {
    case 'ue':
    print " 
    <div class='box-content alerts'>
        <div class='alert alert-info'>
            <button type='button' class='close' data-dismiss='alert'>×</button>
            <strong>Correcto: </strong>El Usuario ha sido editado.
        </div>
    </div>
    ";
    break;
    case 'ud':
    print " 
    <div class='box-content alerts'>
        <div class='alert alert-success'>
            <button type='button' class='close' data-dismiss='alert'>×</button>
            <strong>Correcto: </strong> El usuario ha sido eliminado.
        </div>
    </div>
    ";
    break;
    }
?>
<div class="row-fluid sortable">
<div class="box span12">
<div class="box-header">
    <h2><i class="halflings-icon align-justify"></i><span class="break"></span>Lista de Usuarios</h2>

</div>
<div class="box-content">
<table class="table table-striped table-bordered datatable">
    <thead>
        <tr>
            <th>Codigo</th>
            <th>Nick</th>
            <th>Nombre</th>
            <th>Rol</th>
            <th>Acciones</th> 
        </tr>
    </thead>   
<tbody>

    <?php
    $usuariosClave = UsuarioClave::getInstancia()->getListaUsuarioClave();

    foreach ($usuariosClave as $usuarioClave) {
        ?>
        <tr>
        <td><?php echo $usuarioClave['idUsuarioClave']; ?></td>
        <td class="center"><?php echo $usuarioClave['nick']; ?></td>
        <td class="center"><?php echo $usuarioClave['nombre']; ?></td>
        <td class="center"><?php if ($usuarioClave['idRol']==1){
                echo "Aministrador";
            }else{
                echo "Usuario";
            }
            ?></td>
        <?php
        print "
        <td class='center'>
            <a data-rel='tooltip' title='Editar UsuarioClave' class='btn btn-info btn-form-usuarioClave-edit' href='formulario_usuarioClave_edit.php?id=" . $usuarioClave['idUsuarioClave'] . "'>
                <i class='halflings-icon white edit'></i>                                            
            </a>
            <a data-rel='tooltip' title='Ver Detalle Usuario' class='btn btn-warning' href='ver_perfil.php?ce=" . $usuarioClave['idUsuarioClave'] . "'>
                <i class='halflings-icon white search'></i>                                            
            </a>
            <a data-rel='tooltip' title='Eliminar Usuario' class='btn btn-danger' href='../controller/Instancia_usuarioClave.php?func=delete&idUsuarioClave=" . $usuarioClave['idUsuarioClave'] . "'>
                <i class='halflings-icon white trash'></i> 
            </a>
           </td>";
        ?>
        </tr>
        <?php } ?>
    </tbody>
    </table> 
</div>
</div><!--/span-->
<?php include_once 'footer.php'; ?>