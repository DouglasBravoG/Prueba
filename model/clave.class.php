<?php

/**
* Description of Usuario
*
* @author Douglas Bravo
*/
require_once '../conexion/conexion.class.php';

class Clave {

    private static $instancia;
    private $conn;


    private function __construct() {
        $this->conn = Conexion::getInstancia();
    }

    public static function getInstancia() {
        if (self::$instancia == null) {
            self::$instancia = new Clave();
        }
        return self::$instancia;
    }

    public function getListaClave() {
        try {
            $query = $this->conn->prepare('SELECT * FROM clave');
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $ex) {
            echo "No se pudo mostrar las Claves";
        }
    }

    public function getListaClavesF($idFormulario) {
        try {
            $query = $this->conn->prepare('SELECT * FROM clave WHERE idFormulario='. $idFormulario);
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $ex) {
            echo "No se pudo mostrar las Claves";
        }
    }

    public function getClaves($idFormulario) {
        try {
            $query = $this->conn->prepare('SELECT * FROM clave WHERE idFormulario = :idFormulario ORDER BY idClave ASC;');
            $query->bindParam(":idFormulario", $idFormulario);
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $ex) {
            echo "No se pudo mostrar las Claves";
        }
    }

    public function insertClave($idFormulario,$numeroPregunta,$valor,$respuesta) {
        try {
            $query = $this->conn->prepare('INSERT INTO clave(idFormulario, numeroPregunta, valor, respuesta, tipoPregunta)
            VALUES(:idFormulario, :numeroPregunta, :valor, :respuesta, 1);');
            $query->bindValue(':idFormulario', $idFormulario);
            $query->bindValue(':numeroPregunta', $numeroPregunta);
            $query->bindValue(':valor', $valor);
            $query->bindValue('respuesta', $respuesta);
            if ($query->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            echo "No se ingreso la clave";
        }
    }

    public function insertClaveU($idFormulario,$numeroPregunta,$valor,$respuesta) {
        try {
            $query = $this->conn->prepare('INSERT INTO clave(idFormulario, numeroPregunta, valor, respuesta, tipoPregunta)
            VALUES(:idFormulario, :numeroPregunta, :valor, :respuesta, 1);');
            $query->bindValue(':idFormulario', $idFormulario);
            $query->bindValue(':numeroPregunta', $numeroPregunta);
            $query->bindValue(':valor', $valor);
            $query->bindValue('respuesta', $respuesta);
            if ($query->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $ex) {
        echo "No se ingreso la clave";
        }
    }
}
?>
