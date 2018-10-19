<?php
error_reporting(0);
include 'navbar.php';
require_once '../model/usuarioClave.class.php';
require_once '../session/control_sesion.php';

$idUsuarioClave = isset($_GET['ce']) ? $idUsuarioClave = $_GET['ce'] : $idUsuarioClave = $_SESSION['idUsuarioClave'];

$usuarioClave = UsuarioClave::getInstancia()->buscarUsuarioClave($idUsuarioClave);
foreach ($usuarioClave as $temp){
    $idUsuarioClave = $temp['idUsuarioClave'];
    $nick = $temp['nick'];
    $contrasena = $temp['contrasena'];
    $correo = $temp['correo'];
    $nombre = $temp['nombre'];
    $idRol = $temp['idRol'];
    $nombreRol = $temp['nombre_rol'];
}
$contrasena = UsuarioClave::getInstancia()->desencriptar($contrasena);
echo '<title>'.$nick.'</title>';
?>
<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="home.php">Home</a> 
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="ver_perfil.php">Yo</a></li>
</ul>
<div class="span5">
    <h1>Mi Perfil </h1>
     <div class="priority medium"><span>Informacion de Sesion</span></div>

    <div class="task medium">
        <div class="desc">
            <div class="title">Nick:</div>
            <div><?=$nick;?></div>
        </div>
        <div class="desc">
            <div class="title">Contase&ntilde;a:</div>
            <div><?=$contrasena;?></div>
        </div>
    </div>
     <div class="clearfix"></div>
    <div class="priority low"><span>Informacion Personal</span></div>
    <div class="task low last">
        <div class="desc">
            <div class="title">Correo:</div>
            <div><?=$correo;?></div>
        </div>
        <div class="desc">
            <div class="title">Nombre:</div>
            <div><?=$nombre;?></div>
        </div>
    </div>
    <div class="task low last">
        <div class="desc">
            <div class="title">Rol:</div>
            <div><?=$nombreRol;?></div>
        </div>
    </div>

    <div class="clearfix"></div>        
        <p>
            <?php
                print "<a href='formulario_usuarioClave_edit.php?id=$idUsuarioClave' class='btn btn-large btn-info'>Editar Informacion</a>";

            ?>
        </p>
</div>

<?php include_once 'footer.php'; ?>