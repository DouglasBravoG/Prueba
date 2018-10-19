<?php

/**
* Description of Usuario
*
* @author Douglas Bravo
*/
require_once '../conexion/conexion.class.php';

class Asignatura {

    private static $instancia;
    private $conn;

    private function __construct() {
        $this->conn = Conexion::getInstancia();
    }

    public static function getInstancia() {
        if (self::$instancia == null) {
            self::$instancia = new Asignatura();
        }
        return self::$instancia;
    }

    public function getListaAsignatura() {
        try {
            $query = $this->conn->prepare('SELECT * FROM asignatura;');
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $ex) {
            echo "No se pudo mostrar las asignaturas";
        }
    }
}
?>