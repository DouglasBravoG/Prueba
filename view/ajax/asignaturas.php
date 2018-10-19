<?php

require_once '../../conexion/conexion.class.php';
$conexion = Conexion::getInstancia();

$idGrado = $_POST['idGrado'];
try {
    $query = $conexion->prepare("SELECT a.idRegistro,a.idGrado,a.idAsignatura,s.asignatura
FROM asignatura_grado a INNER JOIN asignatura s ON a.idAsignatura=s.idAsignatura WHERE idGrado = ?");
    $query->bindParam(1, $idGrado);
    $query->execute();
    
    $result = $query->fetchAll();
} catch (Exception $ex) {
    echo "No hay departamentos";
}
foreach ($result as $temp) {
    $html .= '<option value="'.$temp['idAsignatura'].'">'.$temp['asignatura'].'</option>';
    print $temp['asignatura'];
}
echo $html;
?>
