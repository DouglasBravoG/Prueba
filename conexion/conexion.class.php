<?php
header('Content-Type: text/html; charset=ISO-8859-1');
class Conexion {

    private static $instancia;
    private $conn;

    private function __construct() {
        $archivo = 'config_ini.ini';
        if (!$ajustes = parse_ini_file($archivo, true))
            throw new Exception('No se puede abrir el archivo ' . $archivo . '.');
            $controlador = $ajustes["database"]["driver"];
            $servidor = $ajustes["database"]["host"];
            $puerto = $ajustes["database"]["port"];
            $basedatos = $ajustes["database"]["schema"];
            $username = $ajustes["database"]["username"];
            $password = $ajustes["database"]["password"];
        try {
            $this->conn = new PDO('mysql:host=' . $servidor . ';port=' . $puerto . ';dbname=' . $basedatos, $username, $password);
        } catch (PDOException $ex) {
            echo "Error! -- No se pudo conectar a la base de datos, revise su usuario y contraseña";
        }
    }

    public function prepare($query) {
        return $this->conn->prepare($query);
    }

    public function exec($query) {
        return $this->conn->exec($query);
    }

    public static function getInstancia() {
        if (self::$instancia == null) {
            self::$instancia = new Conexion();
        }
        return self::$instancia;
    }

    public function __clone() {
        trigger_error('la clonacion de este objeto no esta permitida', E_USER_ERROR);
    }
}

?>