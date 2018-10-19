<?php

require_once '../conexion/conexion.class.php';
require_once '../model/usuarioClave.class.php';
session_start();

class Login {

    private static $instancia;
    private $conn;

    private function __construct() {
        $this->conn = Conexion::getInstancia();
    }

    public static function getInstancia() {
        if (self::$instancia == null) {
            self::$instancia = new Login();
        }
        return self::$instancia;
    }

    public function login_users($nick, $clave) {
        $claveSecure = UsuarioClave::getInstancia()->encriptar($clave);
        //$claveSecure = $clave;
        print $nick + $clave;
        try {
            $sql = "SELECT * FROM usuarioclave WHERE nick=? AND contrasena=?";
            $query = $this->conn->prepare($sql);
            $query->bindParam(1, $nick);
            $query->bindParam(2, $claveSecure);
            $query->execute();
            print "registros: " + $query->rowCount();
            if ($query->rowCount() == 1) {
                $fila = $query->fetch();
                $_SESSION['loggedin'] = true;
                $_SESSION['idUsuarioClave'] = $fila['idUsuarioClave'];
                $_SESSION['contrasena'] = $fila['contrasena'];
                $_SESSION['correo'] = $fila['correo'];
                $_SESSION['nick'] = $fila['nick'];
                $_SESSION['nombre'] = $fila['nombre'];
                $_SESSION['idRol'] = $fila['idRol'];
                $_SESSION['start'] = time();
                $_SESSION['expire'] = $_SESSION['start'] + (900);
                return true;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage();
        }
    }
    public function __clone() {
        trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
    }
}
?>
