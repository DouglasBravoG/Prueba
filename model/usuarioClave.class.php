<?php

/**
 * Description of UsuarioClave
 *
 * @author Douglas Bravo
 */
require_once '../conexion/conexion.class.php';

class UsuarioClave {

    private static $instancia;
    private $conn;

    private function __construct() {
        $this->conn = Conexion::getInstancia();
    }

    public static function getInstancia() {
        if (self::$instancia == null) {
            self::$instancia = new UsuarioClave();
        }
        return self::$instancia;
    }

    public function buscarUsuarioEspecifico($nick, $correo) {
        try {
            $query = $this->conn->prepare('SELECT * FROM usuarioclave WHERE nick =? AND correo=?');
            $query->bindParam(1, $nick);
            $query->bindParam(2, $correo);
            if ($query->execute()) {
                return $query->fetchAll();
            } else {
                return false;
            }
        } catch (Exception $ex) {
            echo "No se encontro el Usuario ";
        }
    }

    public function buscarUsuarioClave($idUsuarioClave) {
        try {
            $query = $this->conn->prepare('CALL buscar_usuarioclave(?);');
            $query->bindParam(1, $idUsuarioClave);
            if ($query->execute()) {
                return $query->fetchAll();
            } else {
                return false;
            }
        } catch (Exception $ex) {
            echo "No se encontro el Usuario deseado";
        }
    }

    public function getListaUsuarioClave() {
        try {
            $query = $this->conn->prepare('SELECT * FROM usuarioclave');
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $ex) {
            echo "No se pudo mostrar los usuarios";
        }
    }

    public function insertUsuarioClave($nick, $contrasena, $correo, $nombre, $idRol) {
        $contrasenaEncriptada = $this->encriptar($contrasena);
        try {
            $query = $this->conn->prepare('CALL insert_usuarioclave(?,?,?,?,?);');
            $query->bindParam(1, $nick);
            $query->bindParam(2, $contrasenaEncriptada);
            $query->bindParam(3, $correo);
            $query->bindParam(4, $nombre);
            $query->bindParam(5, $idRol);
            if ($query->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            echo "No se ingreso el usuario";
        }
    }

    public function getListaRoles() {
        try {
            $query = $this->conn->prepare('SELECT * FROM rol');
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $ex) {
            echo "No se pudo mostrar los roles";
        }
    }

    public function encriptar($contrasena) {
        $key = '';
        $encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $contrasena, MCRYPT_MODE_CBC, md5(md5($key))));
        return $encrypted;
    }

    public function desencriptar($cadena) {
        $key = '';  // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
        $decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($cadena), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
        return $decrypted;  //Devuelve el string desencriptado
    }

    public function updateUsuarioClave($idUsuarioClave, $nick, $contrasena, $correo, $nombre, $idRol) {
        $contrasenaEncriptada = $this->encriptar($contrasena);
        try {
            $query = $this->conn->prepare('CALL update_usuarioclave(?, ?, ?, ?,?,?);');
            $query->bindParam(1, $idUsuarioClave);
            $query->bindParam(2, $nick);
            $query->bindParam(3, $contrasenaEncriptada);
            $query->bindParam(4, $correo);
            $query->bindParam(5, $nombre);
            $query->bindParam(6, $idRol);

            if ($query->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            echo "No se actualizo el usuario";
        }
    }

    public function update_contrasena($nick, $contrasena, $correo) {
        $contrasenaEncriptada = $this->encriptar($contrasena);
        try {
            $query = $this->conn->prepare('SELECT * FROM usuarioclave WHERE nick=? AND correo=?');
            $query->bindParam(1, $nick);
            $query->bindParam(2, $correo);
            $query->execute();
            $resultado = $query->fetchAll();
            foreach ($resultado as $valor) {
                $idUsuarioClave = $valor['idUsuarioClave'];
            }
            $query = '';
            $query = $this->conn->prepare('UPDATE usuarioclave SET contrasena=? WHERE idUsuarioClave=? AND nick=? AND correo=?');
            $query->bindParam(1, $contrasenaEncriptada);
            $query->bindParam(2, $idUsuarioClave);
            $query->bindParam(3, $nick);
            $query->bindParam(4, $correo);

            if ($query->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            echo 'No se pudo modificar su contraseña';
        }
    }

    public function deleteUsuarioClave($idUsuarioClave) {
        try {
            $query = $this->conn->prepare("DELETE FROM usuarioclave WHERE idUsuarioClave = ?");
            $query->bindParam(1, $idUsuarioClave);
            if($query->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            echo "No se ingreso el Usuario";
        }
    }
}
?>
