<?php
require_once '../model/usuarioClave.class.php';

$funcion = $_GET['func'];

switch ($funcion){

	case 'insert':
		$usuarioClave = UsuarioClave::getInstancia()->insertUsuarioClave($_POST['nick'],$_POST['contrasena'],$_POST['correo'],$_POST['nombre'],$_POST['idRol']);
			if($usuarioClave == true) {
			header("location: ../view/lista_usuariosClave.php");
		}
	break;

	case 'update':
		$usuarioClave = UsuarioClave::getInstancia()->updateUsuarioClave($_POST['idUsuarioClave'],$_POST['nick'],$_POST['contrasena'],$_POST['correo'],$_POST['nombre'],$_POST['idRol']);
		if($usuarioClave == true) {
			header("location: ../view/lista_usuariosClave.php?e=ue");
		}
	break;

	case 'update_contrasena':
		$usuarioClave = UsuarioClave::getInstancia()->updateContrasena( $_POST['nick'], $_POST['contrasena'], $_POST['correo']);
		if($usuarioClave== true){
			header("location:../index.php");
		}
	break;

	case 'buscarUsuarioClaveEspecifico':
		$usuarioClave =  UsuarioClave::getInstancia()->buscarUsuarioClaveEspecifico($_POST['nick'],$_POST['correo']);
		if($usuarioClave==true){
			header("location:../index.php");
		}
	break;

	case 'delete':
		$usuarioClave = UsuarioClave::getInstancia()->deleteUsuarioClave($_GET['idUsuarioClave']);
		if($usuarioClave==true){
			header("location:../view/lista_usuariosClave.php?e=ud");
		}
	break;

}
?>