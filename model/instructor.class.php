<?php

/**
 * Description of instructor
 *
 * @author Douglas Bravo
 */
require_once '../conexion/conexion.class.php';

class Instructor {

    private static $instancia;
    private $conn;

    private function __construct() {
        $this->conn = Conexion::getInstancia();
    }

    public static function getInstancia() {
        if (self::$instancia == null) {
            self::$instancia = new Instructor();
        }
        return self::$instancia;
    }
//Sirve para mandar a llamar la lista de instructores
    public function getListaInstructor() {
        try {
            $query = $this->conn->prepare('SELECT * FROM instructor ORDER BY idInstructor ASC');
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $ex) {
            echo "No se pudo mostrar los Instructores";
        }
    }

//Sirve para el encabezado del resultado por Instructor y Bimestre1
    public function getResultados1($idInstructor) {
        try {
            $query = $this->conn->prepare('SELECT a.nombreCompleto, a.idInstructor, b.idEnvio, b.idAsignatura, b.idGrado,
              b.seccion, b.tema, b.observador, b.salon, b.fecha, b.hora,b.numeroPregunta,b.idOpcionesEvaluacion, c.descripcion FROM
              instructor a INNER JOIN resultadoInstructor b ON a.idInstructor = b.idInstructor INNER JOIN opciones_evaluacion c
              ON b.idOpcionesEvaluacion=c.idOpcionesEvaluacion WHERE b.numeroPregunta BETWEEN 14 AND 23 AND b.idEnvio = 1 AND a.idInstructor='. $idInstructor);
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $ex) {
            echo "No se pudo mostrar los resultados solicitados.";
        }
    }


    //Sirve para el encabezado del resultado por Instructor y Bimestre2
        public function getResultados2($idInstructor) {
            try {
                $query = $this->conn->prepare('SELECT a.nombreCompleto, a.idInstructor, b.idEnvio, b.idAsignatura, b.idGrado,
                  b.seccion, b.tema, b.observador, b.salon, b.fecha, b.hora,b.numeroPregunta,b.idOpcionesEvaluacion, c.descripcion FROM
                  instructor a INNER JOIN resultadoInstructor b ON a.idInstructor = b.idInstructor INNER JOIN opciones_evaluacion c
                  ON b.idOpcionesEvaluacion=c.idOpcionesEvaluacion WHERE b.numeroPregunta BETWEEN 14 AND 23 AND b.idEnvio = 2 AND a.idInstructor='. $idInstructor);
                $query->execute();
                return $query->fetchAll();
            } catch (PDOException $ex) {
                echo "No se pudo mostrar los resultados solicitados.";
            }
        }

//Sirve para el encabezado del resultado por Instructor y Bimestre3
    public function getResultados3($idInstructor) {
        try {
            $query = $this->conn->prepare('SELECT a.nombreCompleto, a.idInstructor, b.idEnvio, b.idAsignatura, b.idGrado,
              b.seccion, b.tema, b.observador, b.salon, b.fecha, b.hora,b.numeroPregunta,b.idOpcionesEvaluacion, c.descripcion FROM
              instructor a INNER JOIN resultadoInstructor b ON a.idInstructor = b.idInstructor INNER JOIN opciones_evaluacion c
              ON b.idOpcionesEvaluacion=c.idOpcionesEvaluacion WHERE b.numeroPregunta BETWEEN 14 AND 23 AND b.idEnvio = 3 AND a.idInstructor='. $idInstructor);
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $ex) {
            echo "No se pudo mostrar los resultados solicitados.";
        }
    }

    //Sirve para el encabezado del resultado por Instructor y Bimestre4
        public function getResultados4($idInstructor) {
            try {
                $query = $this->conn->prepare('SELECT a.nombreCompleto, a.idInstructor, b.idEnvio, b.idAsignatura, b.idGrado,
                  b.seccion, b.tema, b.observador, b.salon, b.fecha, b.hora,b.numeroPregunta,b.idOpcionesEvaluacion, c.descripcion FROM
                  instructor a INNER JOIN resultadoInstructor b ON a.idInstructor = b.idInstructor INNER JOIN opciones_evaluacion c
                  ON b.idOpcionesEvaluacion=c.idOpcionesEvaluacion WHERE b.numeroPregunta BETWEEN 14 AND 23 AND b.idEnvio = 4 AND a.idInstructor='. $idInstructor);
                $query->execute();
                return $query->fetchAll();
            } catch (PDOException $ex) {
                echo "No se pudo mostrar los resultados solicitados.";
            }
        }
//Sirve para llamar al tipo de metodologia usada por el instructor
    public function getMetodologia1($idInstructor) {
        try {
            $query = $this->conn->prepare('SELECT * FROM resultadoInstructor WHERE numeroPregunta = 1 AND idEnvio = 1 AND idInstructor='.$idInstructor );
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $ex) {
            echo "No se pudo mostrar los resultados";
        }
    }

    //Sirve para llamar al tipo de metodologia usada por el instructor
        public function getMetodologia2($idInstructor) {
            try {
                $query = $this->conn->prepare('SELECT * FROM resultadoInstructor WHERE numeroPregunta = 1 AND idEnvio = 2 AND idInstructor='.$idInstructor );
                $query->execute();
                return $query->fetchAll();
            } catch (PDOException $ex) {
                echo "No se pudo mostrar los resultados";
            }
        }

        //Sirve para llamar al tipo de metodologia usada por el instructor
            public function getMetodologia3($idInstructor) {
                try {
                    $query = $this->conn->prepare('SELECT * FROM resultadoInstructor WHERE numeroPregunta = 1 AND idEnvio = 3 AND idInstructor='.$idInstructor );
                    $query->execute();
                    return $query->fetchAll();
                } catch (PDOException $ex) {
                    echo "No se pudo mostrar los resultados";
                }
            }

            //Sirve para llamar al tipo de metodologia usada por el instructor
                public function getMetodologia4($idInstructor) {
                    try {
                        $query = $this->conn->prepare('SELECT * FROM resultadoInstructor WHERE numeroPregunta = 1 AND idEnvio = 4 AND idInstructor='.$idInstructor );
                        $query->execute();
                        return $query->fetchAll();
                    } catch (PDOException $ex) {
                        echo "No se pudo mostrar los resultados";
                    }
                }

  // Siver para mandar a llamar la lista general de todos los instrctores
      public function getPregunta1(){
        try {
          $query = $this->conn->prepare('SELECT c.nombreCompleto, a.numeroPregunta, a.idOpcionesEvaluacion, a.idEnvio, b.descripcion FROM resultadoInstructor a
          INNER JOIN opciones_evaluacion b ON a.idOpcionesEvaluacion = b.idOpcionesEvaluacion
          INNER JOIN instructor c ON a.idInstructor = c.idInstructor WHERE a.numeroPregunta BETWEEN 14 AND 23
          ');
          $query->execute();
          return $query->fetchAll();
        } catch (PDOException $ex) {
          echo "No se puede mostrar esa informacion";
        }
      }

        //Sirve para llamar al nombre del instructor
            public function getNombre($idInstructor) {
                try {
                    $query = $this->conn->prepare('SELECT nombreCompleto FROM instructor WHERE idInstructor='.$idInstructor );
                    $query->execute();
                    return $query->fetchAll();
                } catch (PDOException $ex) {
                    echo "No se pudo mostrar los resultados";
                }
            }

            // Siver para mandar a llamar el total de preguntas contestadas en el bimestre
                public function getTotalPreguntas1(){
                  try {
                    $query = $this->conn->prepare('SELECT COUNT(numeroPregunta) FROM resultadoInstructor WHERE numeroPregunta BETWEEN 14 AND 23 AND idEnvio =1 GROUP BY numeroPregunta');
                    $query->execute();
                    return $query->fetchAll();
                  } catch (PDOException $ex) {
                    echo "No se puede mostrar esa informacion";
                  }
                }

                // Siver para mandar a llamar el total de puntos Obtenidos en el bimestre
                    public function getTotalPunteos1(){
                      try {
                        $query = $this->conn->prepare('SELECT SUM(idOpcionesEvaluacion) FROM resultadoInstructor WHERE numeroPregunta BETWEEN 14 AND 23 AND idEnvio =1 GROUP BY numeroPregunta');
                        $query->execute();
                        return $query->fetchAll();
                      } catch (PDOException $ex) {
                        echo "No se puede mostrar esa informacion";
                      }
                    }


                    // Siver para mandar a llamar el total de preguntas contestadas en el bimestre2
                        public function getTotalPreguntas2(){
                          try {
                            $query = $this->conn->prepare('SELECT COUNT(numeroPregunta) FROM resultadoInstructor WHERE numeroPregunta BETWEEN 14 AND 23 AND idEnvio =2 GROUP BY numeroPregunta');
                            $query->execute();
                            return $query->fetchAll();
                          } catch (PDOException $ex) {
                            echo "No se puede mostrar esa informacion";
                          }
                        }

                        // Siver para mandar a llamar el total de puntos Obtenidos en el bimestre2
                            public function getTotalPunteos2(){
                              try {
                                $query = $this->conn->prepare('SELECT SUM(idOpcionesEvaluacion) FROM resultadoInstructor WHERE numeroPregunta BETWEEN 14 AND 23 AND idEnvio =2 GROUP BY numeroPregunta');
                                $query->execute();
                                return $query->fetchAll();
                              } catch (PDOException $ex) {
                                echo "No se puede mostrar esa informacion";
                              }
                            }

                            // Siver para mandar a llamar el total de preguntas contestadas en el bimestre3
                                public function getTotalPreguntas3(){
                                  try {
                                    $query = $this->conn->prepare('SELECT COUNT(numeroPregunta) FROM resultadoInstructor WHERE numeroPregunta BETWEEN 14 AND 23 AND idEnvio =3 GROUP BY numeroPregunta');
                                    $query->execute();
                                    return $query->fetchAll();
                                  } catch (PDOException $ex) {
                                    echo "No se puede mostrar esa informacion";
                                  }
                                }

                                // Siver para mandar a llamar el total de puntos Obtenidos en el bimestre3
                                    public function getTotalPunteos3(){
                                      try {
                                        $query = $this->conn->prepare('SELECT SUM(idOpcionesEvaluacion) FROM resultadoInstructor WHERE numeroPregunta BETWEEN 14 AND 23 AND idEnvio =3 GROUP BY numeroPregunta');
                                        $query->execute();
                                        return $query->fetchAll();
                                      } catch (PDOException $ex) {
                                        echo "No se puede mostrar esa informacion";
                                      }
                                    }

                                    // Siver para mandar a llamar el total de preguntas contestadas en el bimestre4
                                        public function getTotalPreguntas4(){
                                          try {
                                            $query = $this->conn->prepare('SELECT COUNT(numeroPregunta) FROM resultadoInstructor WHERE numeroPregunta BETWEEN 14 AND 23 AND idEnvio =4 GROUP BY numeroPregunta');
                                            $query->execute();
                                            return $query->fetchAll();
                                          } catch (PDOException $ex) {
                                            echo "No se puede mostrar esa informacion";
                                          }
                                        }

                                        // Siver para mandar a llamar el total de puntos Obtenidos en el bimestre3
                                            public function getTotalPunteos4(){
                                              try {
                                                $query = $this->conn->prepare('SELECT SUM(idOpcionesEvaluacion) FROM resultadoInstructor WHERE numeroPregunta BETWEEN 14 AND 23 AND idEnvio = 4 GROUP BY numeroPregunta');
                                                $query->execute();
                                                return $query->fetchAll();
                                              } catch (PDOException $ex) {
                                                echo "No se puede mostrar esa informacion";
                                              }
                                            }
}
?>
