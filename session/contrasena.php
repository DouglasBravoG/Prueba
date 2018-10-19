<?php
require_once '../model/usuarioClave.class.php';

$var = UsuarioClave::getInstancia()->buscarUsuarioEspecifico($_POST['nick'], $_POST['correo']);
//$count = buscarUsuarioEspecifico();
if ($var != null) {
	if ($_POST['userpass1'] == $_POST['userpass2']) {
		$UsuarioTemporal = UsuarioClave::getInstancia()->update_contrasena($_POST['nick'], $_POST['userpass1'], $_POST['correo']);
		if ($UsuarioTemporal == true) {
			header('location: ../recuperar_contrasena.php?p=3');
		}		
	} else {
	header('location: ../recuperar_contrasena.php?p=4');
	}
} else {
	header('location: ../recuperar_contrasena.php?p=2');
}
?>

