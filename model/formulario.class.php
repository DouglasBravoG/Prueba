<?php
error_reporting(0);
/**
 * Description of Usuario
 *
 * @author Douglas Bravo
 */
include_once'../conexion/conexion.class.php';

class Formulario {

    private static $instancia;
    private $conn;

    private function __construct() {
        $this->conn = Conexion::getInstancia();
    }

    public static function getInstancia() {
        if (self::$instancia == null) {
            self::$instancia = new Formulario();
        }
        return self::$instancia;
    }
  
    public function getListaFormulario() {
        try {
            $query = $this->conn->prepare('SELECT * FROM formulario');
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $ex) {
            echo "No se pudo mostrar los formularios";
        }
    }

    public function getListaFormularioU() {
        try {
            $query = $this->conn->prepare('SELECT * FROM formulario WHERE instructor = :instructor ORDER BY idFormulario DESC');
            $query->bindValue(':instructor', $_SESSION['nombre']);
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $ex) {
            echo "No se pudo mostrar los formularios";
        }
    }

    public function getUltimoFormulario($idFormulario) {
        try {
            $query = $this->conn->prepare('SELECT * FROM formulario WHERE idFormulario='. $idFormulario);
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $ex) {
            echo "No se pudo mostrar las Claves";
        }
    }

    public function getLastIdFormulario() {
        $query = $this->conn->prepare("SELECT idFormulario FROM formulario ORDER BY idFormulario DESC LIMIT 1;");
        if ($query->execute()) {
            $id = $query->fetch(PDO::FETCH_ASSOC);
            return $id["idFormulario"];
        }
    }

    public function getListaGradosAcademicos() {
        try {
            $query = $this->conn->prepare('SELECT * FROM grado_academico');
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $ex) {
            echo "No se pudo mostrar los grados";
        }
    }

    public function getListaAsignaturas() {
        try {
            $query = $this->conn->prepare('SELECT * FROM asignatura ');
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $ex) {
            echo "No se pudo mostrar las asignaturas";
        }
    }

    public function insertFormulario($idAsignatura, $instructor, $copias, $forma, $grado, $bimestre, $jornada, $bachiller, $fecha) {
        try {            
            $query = $this->conn->prepare("INSERT INTO formulario(idAsignatura, instructor, copias, forma, grado, bimestre, jornada, bachiller, fecha)
            VALUES(:idAsignatura, :instructor, :copias, :forma, :grado, :bimestre, :jornada, :bachiller, :fecha);");
            $query->bindValue(":idAsignatura", $idAsignatura);
            $query->bindValue(":instructor", $instructor);
            $query->bindValue(":copias", $copias);
            $query->bindValue(":forma", $forma);
            $query->bindValue(":grado", $grado);
            $query->bindValue(":bimestre", $bimestre);
            $query->bindValue(":jornada", $jornada);
            $query->bindValue(":bachiller", $bachiller);
            $query->bindValue(":fecha", $fecha);
            if ($query->execute()) {
                    return true;            
            } else {
                return false;
            }
        } catch (Exception $ex) {
            echo "No se ingreso el formulario";
        }
    }

    public function insertFormularioU($idAsignatura, $instructor, $copias, $forma, $grado, $bimestre, $jornada, $bachiller, $fecha) {
        try {
            $query = $this->conn->prepare("INSERT INTO formulario(idAsignatura, instructor, copias, forma, grado, bimestre, jornada, bachiller, fecha)
            VALUES(:idAsignatura, :instructor, :copias, :forma, :grado, :bimestre, :jornada, :bachiller, :fecha);");
            $query->bindValue(":idAsignatura", $idAsignatura);
            $query->bindValue(":instructor", $instructor);
            $query->bindValue(":copias", $copias);
            $query->bindValue(":forma", $forma);
            $query->bindValue(":grado", $grado);
            $query->bindValue(":bimestre", $bimestre);
            $query->bindValue(":jornada", $jornada);
            $query->bindValue(":bachiller", $bachiller);
            $query->bindValue(":fecha", $fecha);
            if ($query->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            echo "No se ingreso el formulario";
        }
    }
    public function updateFormulario($idFormulario, $idAsignatura, $instructor, $copias, $forma, $grado, $bimestre, $jornada, $bachiller, $fecha) {
        try {
            $query = $this->conn->prepare('CALL update_formulario(?, ?, ?, ?, ?, ?, ?, ?, ?, ?);');
            $query->bindParam(1, $idFormulario);
            $query->bindParam(2, $idAsignatura);
            $query->bindParam(3, $instructor);
            $query->bindParam(4, $copias);
            $query->bindParam(5, $forma);
            $query->bindParam(6, $grado);
            $query->bindParam(7, $bimestre);
            $query->bindParam(8, $jornada);
            $query->bindParam(9, $bachiller);
            $query->bindParam(10, $fecha); 
            if ($query->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            echo "No se actualizo el Formulario";
        }
    }

    public function deleteClaveCascade($idFormulario) {
        try {
            $query = "DELETE FROM clave WHERE idFormulario = " . $idFormulario;
            $count = $this->conn->exec($query);
        } catch (Exception $ex) {
            echo "No se elimino el formulario";
        }
    }

    public function deleteFormulario($idFormulario) {
        try {
            $this->deleteClaveCascade($idFormulario);
            $query = $this->conn->prepare("DELETE FROM formulario WHERE idFormulario = ?");
            $query->bindParam(1, $idFormulario);
            if($query->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            print $ex;
        }
    }
}
?>
