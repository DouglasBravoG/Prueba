<?php
include_once 'header.php';
include_once '../model/instructor.class.php';
echo "<title>Lista Resultados</title>";
?>

<section id="main-content" style="height:100%;background:red">
<article>

<div class="row-fluid sortable">
   <div class="box span12">
   <div class="box-header">
       <h2><i class="halflings-icon align-center"></i><span class="break"></span>Tabla de Resultados Generales</h2>
   </div>
       <div class="box-content">
       <table class="table table-striped table-bordered datatable">
           <thead>
             <center>
               <a data-rel='tooltip' title='Bimestre 1' class='btn btn-info btn-form-usuarioClave-edit' href='estadistica1.php'>
               Grafica Bim I
               </a>
               <a data-rel='tooltip' title='Bimestre 2' class='btn btn-warning' href='estadistica2.php'>
               Grafica Bim II
               </a>
               <a data-rel='tooltip' title='Bimestre 3' class='btn btn-info btn-form-usuarioClave-edit' href='estadistica3.php'>
               Grafica Bim III
               </a>
               <a data-rel='tooltip' title='Bimestre 4' class='btn btn-warning' href='estadistica4.php'>
               Grafica Bim IV
               </a>
               <br>
               <a data-rel='tooltip' title='Resultado Final' class='btn btn-danger' href='resultadoTotalFinal.php'>
               Grafica de Resultados Finales
               </a>
           </center>
           <tr>
             <th>Evaluacion</th>
             <th>Instructor</th>
             <th>Area Evaluada</th>
             <th>Resultado</th>
             <th>Resultado Porcentual</th>
           </tr>
           </thead>
           <tbody>
               <?php
               $preguntas1 = Instructor::getInstancia()->getPregunta1();
               foreach ($preguntas1 as $pregunta1) {
                   ?>
                   <tr>
                       <td class="center"><?php if ($pregunta1['idEnvio']==1){
                         echo 'Primera';
                       } elseif ($pregunta1['idEnvio']==2) {
                         echo "segunda";
                       }elseif ($pregunta1['idEnvio']==3) {
                         echo "tercera";
                       }elseif ($pregunta1['idEnvio']==4) {
                         echo "cuarta";
                       }else {
                         echo "Seleccione una Opcion Correcta";
                       }

                       ?></td>
                       <td class="center"><?php echo $pregunta1['nombreCompleto']; ?></td>
                       <td class="center"><?php
                            if ($pregunta1['numeroPregunta'] == 14) {
                              echo "Desarrollo de la Clase";
                            }elseif ($pregunta1['numeroPregunta'] == 15) {
                              echo "Comunicaci&oacute;n Asertiva";
                            }elseif ($pregunta1['numeroPregunta'] == 16) {
                              echo "Equidad";
                            }elseif ($pregunta1['numeroPregunta'] == 17) {
                              echo "Limpieza e Higiene";
                            }elseif ($pregunta1['numeroPregunta'] == 18) {
                              echo "Motivaci&oacute;n";
                            }elseif ($pregunta1['numeroPregunta'] == 19) {
                              echo "Evaluaci&oacute;n del Aprendizaje";
                            }elseif ($pregunta1['numeroPregunta'] == 20) {
                              echo "Dominio del Tema";
                            }elseif ($pregunta1['numeroPregunta'] == 21) {
                              echo "Retroalimentaci&oacute;n";
                            }elseif ($pregunta1['numeroPregunta'] == 22) {
                              echo "Valores";
                            }elseif ($pregunta1['numeroPregunta'] == 23) {
                              echo "Recursos Did&aacute;cticos";
                            }
                          ?>
                      </td>
                       <td class="center"><?php echo $pregunta1['descripcion']; ?></td>
                       <td class="center"><?php
                          if ($pregunta1['idOpcionesEvaluacion'] == 1) {
                            echo "20%";
                          }elseif ($pregunta1['idOpcionesEvaluacion']==2) {
                            echo "40%";
                          }elseif ($pregunta1['idOpcionesEvaluacion']==3) {
                            echo "60%";
                          }elseif ($pregunta1['idOpcionesEvaluacion']==4) {
                            echo "80%";
                          }elseif ($pregunta1['idOpcionesEvaluacion']==5) {
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
 </div><!--/Fin de la tabla-->
</article>
</section>
<?php include_once 'footer.php'; ?>
