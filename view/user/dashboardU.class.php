<?php
    require_once '../../conexion/conexion.class.php';
    require_once '../../session/control_sesion.php';
    /**
    * Description of dashboardU
    *
    * @author Douglas Bravo
    */
    class dashboardU {
        private static $instancia;
        private $conn;
    
        private function __construct() {
            $this->conn = Conexion::getInstancia();
        }
    
        public static function getInstancia() {
            if (self::$instancia == null) {
                self::$instancia = new dashboardU();
            }
            return self::$instancia;
        }  
    function getTotalFormularios(){
            $total = '0';
            try{
                $query = $this->conn->prepare('SELECT COUNT(*) AS "totalFormularios" FROM formulario;');
        if ($query->execute()) {
                    $resultado = $query->fetchAll();
        } else {
                    echo "No se ejecuto";
        }

        foreach ($resultado as $value) {
                    $total = $value['totalFormularios'];
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
                $query = $this->conn->prepare('SELECT COUNT(*) AS "totalClaves" FROM clave;');
        if ($query->execute()) {
                    $resultado = $query->fetchAll();
        } else {
                    echo "No se ejecuto";
        }

        foreach ($resultado as $value) {
                    $total = $value['totalClaves'];
        }
                return $total;
            }catch(PDOException $e){
        echo $e->getMessage();
            }
            $conn = null;
        }

    }
?>