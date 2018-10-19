<?php
  include_once 'header.php';
  include_once '../model/instructor.class.php';
  echo "<title>Evaluacion Bimestre 1</title>";
 ?>
 <section id="main-content">
   <?php
   if(isset($_GET['idInstructor'])) {
       $resultados = Instructor::getInstancia()->getResultados1($_GET['idInstructor']);
   } else {
       $resultados = Instructor::getInstancia()->getResultados1();
   }
    ?>
 <article>

  <h1>Informaci&oacute;n al aplicar la prueba</h1>
  <?php
  $suma = 0;
  foreach ($resultados as $resultado) {
      //echo $resultado['idOpcionesEvaluacion'];
      $suma += $resultado['idOpcionesEvaluacion'];
      }
  $total = $suma * 2;
  ?>
  <section id="main-content">
    <?php
      $metodologias = Instructor::getInstancia()->getMetodologia1($_GET['idInstructor']);
      foreach ($metodologias as $metodologia) {
        $metodologia['idOpcionesEvaluacion'];
      }

    ?>
  <section id="main-content">
    <center><strong><font size=5>Tipo de Metodolog&iacute;a:
      <?php
      if ($metodologias == null) {
        echo "Sin Examen";
      }else {
        if ($metodologia['idOpcionesEvaluacion'] == 6) {
          echo "Pasivo";
        }elseif ($metodologia['idOpcionesEvaluacion']==7) {
          echo "Activo";
        }else {
          echo "Combinado";
        }
      }

      ?>
    </font></strong></center>
  </section>
  <center>
    <?php if ($resultados == null) {
      echo "No hay Resultados para Mostrar";
    }else{
      ?>
  <font size=4.8><strong>Bimestre:<?php echo $resultado['idEnvio']; ?></strong></font><br>
  <font size=4.8>Asignatura donde fue evaluado:<?php echo $resultado['idAsignatura']; ?></font><br>
  <font size=4.8>Grado:<?php echo $resultado['idGrado']; ?></font></br>
  <font size=4.8>Seccion:<?php echo $resultado['seccion']; ?></font><br>
  <font size=4.8>Tema:<?php echo $resultado['tema']; ?></font><br>
  <font size=4.8>Observador:<?php echo $resultado['observador']; ?></font><br>
  <font size=4.8>Salon:<?php echo $resultado['salon']; ?></font><br>
  <font size=4.8>Fecha:<?php echo $resultado['fecha']; ?></font><br>
  <font size=4.8>Hora:<?php echo $resultado['hora']; ?></font><br>
  <?php
  }
  ?>
</center>
  <section id="main-content">
      <h1 align = "rigth">Porcentaje Total de Prueba:<?php echo $total."%"; ?></h1>
  </section>
</section>
<section id="main-content"style="height:30%;background:red">
 <div class="row-fluid sortable">
 <div class="box span12">
 <div class="box-header">
     <h2><i class="halflings-icon align-justify"></i><span class="break"></span>Tabla de Resultados</h2>
 </div>
     <div class="box-content">
     <table class="table table-striped table-bordered datatable">
         <thead>
         <tr>
             <th>Area Evaluada</th>
             <th>Resultado</th>
             <th>Resultado Porcentual</th>
         </tr>
         </thead>
         <tbody>
             <?php
             foreach ($resultados as $resultado) {
                 ?>
                 <tr>
                     <td class="center"><?php
                          if ($resultado['numeroPregunta'] == 14) {
                            echo "Desarrollo de la Clase";
                          }elseif ($resultado['numeroPregunta'] == 15) {
                            echo "Comunicaci&oacute;n Asertiva";
                          }elseif ($resultado['numeroPregunta'] == 16) {
                            echo "Equidad";
                          }elseif ($resultado['numeroPregunta'] == 17) {
                            echo "Limpieza e Higiene";
                          }elseif ($resultado['numeroPregunta'] == 18) {
                            echo "Motivaci&oacute;n";
                          }elseif ($resultado['numeroPregunta'] == 19) {
                            echo "Evaluaci&oacute;n del Aprendizaje";
                          }elseif ($resultado['numeroPregunta'] == 20) {
                            echo "Dominio del Tema";
                          }elseif ($resultado['numeroPregunta'] == 21) {
                            echo "Retroalimentaci&oacute;n";
                          }elseif ($resultado['numeroPregunta'] == 22) {
                            echo "Valores";
                          }elseif ($resultado['numeroPregunta'] == 23) {
                            echo "Recursos Did&aacute;cticos";
                          }
                        ?>
                    </td>
                     <td class="center"><?php echo $resultado['descripcion']; ?></td>
                     <td class="center"><?php
                        if ($resultado['idOpcionesEvaluacion'] == 1) {
                          echo "20%";
                        }elseif ($resultado['idOpcionesEvaluacion']==2) {
                          echo "40%";
                        }elseif ($resultado['idOpcionesEvaluacion']==3) {
                          echo "60%";
                        }elseif ($resultado['idOpcionesEvaluacion']==4) {
                          echo "80%";
                        }elseif ($resultado['idOpcionesEvaluacion']==5) {
                          echo "100%";
                        }
                      ?></td>
                 </tr>
             <?php }
              ?>
         </tbody>
     </table>
     </div>
 </div><!--/span-->
 </div>
 </section>
</article> <!-- /article -->
</section>
 <?php
   include_once 'footer.php';
  ?>
