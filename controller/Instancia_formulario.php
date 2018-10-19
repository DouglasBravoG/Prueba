<?php
require_once '../model/formulario.class.php';
require_once '../session/control_sesion.php';

$funcion = $_GET['func'];

switch ($funcion){

    case 'insert':
        $formulario = Formulario::getInstancia()->insertFormulario($_POST['idAsignatura'],$_POST['instructor'],$_POST['copias'],$_POST['forma'],$_POST['idGrado'],$_POST['bimestre'],$_POST['jornada'],$_POST['bachiller'],$_POST['fecha']);
        if($formulario == true) {
            $id = Formulario::getInstancia()->getLastIdFormulario();
            header("location: ../view/np.php?formulario=".$id);
        }
    break;

    case 'insertU':
        $formulario = Formulario::getInstancia()->insertFormularioU($_POST['idAsignatura'],$_POST['instructor'],$_POST['copias'],$_POST['forma'],$_POST['idGrado'],$_POST['bimestre'],$_POST['jornada'],$_POST['bachiller'],$_POST['fecha']);
        if($formulario == true) {
            $id = Formulario::getInstancia()->getLastIdFormulario();
            header("location: ../view/user/npU.php?formulario=".$id);
        }
    break;

    case 'update':
        $formulario = Formulario::getInstancia()->updateFormulario($_POST['idFormulario'],$_POST['idAsignatura'],$_POST['instructor'],$_POST['copias'],$_POST['forma'],$_POST['grado'],$_POST['bimestre'],$_POST['jornada'],$_POST['bachiller'],$_POST['fecha']);
        if($formulario == true) {
            header("location: ../view/lista_formularios.php");
        }
    break;

    case 'delete':
        $formulario = Formulario::getInstancia()->deleteFormulario($_POST['idFormulario']);
        if($formulario == true) {
            header("location: ../view/lista_formularios.php");
        }
    break;
}
?>