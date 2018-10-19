<?php
require_once '../conexion/conexion.class.php';
require_once '../session/control_sesion.php';
/**
* Description of dashboard
*
* @author Douglas Bravo
*/
class dashboard {

    private static $instancia;
    private $conn;

    private function __construct() {
        $this->conn = Conexion::getInstancia();
    }

    public static function getInstancia() {
        if (self::$instancia == null) {
            self::$instancia = new dashboard();
        }
        return self::$instancia;
    }  

    function getTotalUsuariosClave(){
        $total = '0';
        try{
            $query = $this->conn->prepare('SELECT COUNT(*) AS "totalusuariosclave" FROM usuarioclave;');
            if ($query->execute()) {
                $resultado = $query->fetchAll();
            } else {
                echo "No se ejecuto";
            }
            foreach ($resultado as $value) {
                $total = $value['totalusuariosclave'];
            }
            return $total;
        }catch(PDOException $e){
        echo $e->getMessage();
        }
        $conn = null;
    }

    function getTotalFormularios(){
        $total = '0';
        try{
            $query = $this->conn->prepare('SELECT COUNT(*) AS "totalformularios" FROM formulario;');
            if ($query->execute()) {
                $resultado = $query->fetchAll();
            } else {
                echo "No se ejecuto";
            }
            foreach ($resultado as $value) {
                $total = $value['totalformularios'];
            }
            return $total;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        $conn = null;
    }

    function getTotalClaves(){
        $total = '0';
        try{
            $query = $this->conn->prepare('SELECT COUNT(*) AS "totalclaves" FROM clave;');
            if ($query->execute()) {
                $resultado = $query->fetchAll();
            } else {
                echo "No se ejecuto";
            }
            foreach ($resultado as $value) {
                $total = $value['totalclaves'];
            }
            return $total;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        $conn = null;
    }

    function getTotalInstructores(){
        $total = '0';
        try{
            $query = $this->conn->prepare('SELECT COUNT(*) AS "totalinstructores" FROM instructor;');
            if ($query->execute()) {
                $resultado = $query->fetchAll();
            } else {
                echo "No se ejecuto";
            }
            foreach ($resultado as $value) {
                $total = $value['totalinstructores'];
            }
            return $total;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        $conn = null;
    }

    function getTotalAsignaturas(){
        $total = '0';
        try{
            $query = $this->conn->prepare('SELECT COUNT(*) AS "totalasignaturas" FROM asignatura;');
            if ($query->execute()) {
                $resultado = $query->fetchAll();
            } else {
                echo "No se ejecuto";
            }
            foreach ($resultado as $value) {
                $total = $value['totalasignaturas'];
            }
            return $total;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        $conn = null;
    }
}
?>