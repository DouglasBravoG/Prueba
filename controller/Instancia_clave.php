<?php
require_once '../model/clave.class.php';
require_once '../session/control_sesion.php';
require_once '../model/formulario.class.php';

$funcion = $_GET['func'];
switch ($funcion){

    case 'insert':
            $idFormulario = $_POST["idFormulario"];
            $notas = $_POST['notas'];
            $punteos = $_POST['punteo'];
            $aprobados = array();
            foreach ($notas as $nPregunta => $respuesta) {
                foreach($punteos as $id => $punteo) {
                    if($nPregunta == $id) {
                        array_push($aprobados, Clave::getInstancia()->insertClave($idFormulario, $nPregunta, $punteo, $respuesta));
                    }
                }
            }

            if(!in_array(false, $aprobados)) {
                header("location: ../view/nueva_clave.php?idFormulario=$idFormulario");
            }
            
            break;

    case 'insertU':
        $idFormulario = $_POST["idFormulario"];
        $notas = $_POST['notas'];
        $punteos = $_POST['punteo'];
        $aprobados = array();
        foreach ($notas as $nPregunta => $respuesta) {
            foreach($punteos as $id => $punteo) {
                if($nPregunta == $id) {
                    array_push($aprobados, Clave::getInstancia()->insertClaveU($idFormulario, $nPregunta, $punteo, $respuesta));
                }
            }
        }

        if(!in_array(false, $aprobados)) {
            header("location: ../view/user/nueva_claveU.php?idFormulario=$idFormulario");
        }
        
        break;
}
?>