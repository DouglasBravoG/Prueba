<?php
	error_reporting(0);
  include_once 'header.php';
  include_once '../model/instructor.class.php';
  echo "<title>Resultado de Evaluacion</title>";
 ?>
 <section id="main-content"style="height:30%;background:red">
 <article>
 <div class="row-fluid sortable">
 <div class="box span12">
 <div class="box-header">
     <h2><i class="halflings-icon align-justify"></i><span class="break"></span>Lista de Instructores</h2>
 </div>
     <div class="box-content">
     <table class="table table-striped table-bordered datatable">
         <thead>
         <tr>
					 	 <th>ID</th>
             <th>Nombre Completo</th>
						 <th>Telefono Casa</th>
             <th>Correo</th>
						 <th>Resultados por Bimestre</th>
						 <th>Resultado Final</th>
         </tr>
         </thead>
				 <tbody>
				 <?php
						$instructor = Instructor::getInstancia()->getListaInstructor();

				 foreach ($instructor as $instructor) {
						 ?>
						 <tr>
							 <td class="center"><?php echo $instructor['idInstructor']; ?></td>
								 <td class="center"><?php echo $instructor['nombreCompleto']; ?></td>
								 <td class="center"><?php echo $instructor['telefonoCasa']; ?></td>
								 <td class="center"><?php echo $instructor['correoElectronico']; ?></td>
								 <?php
								 print "
								 <td class='center'>
										 <a data-rel='tooltip' title='Bimestre 1' class='btn btn-info btn-form-usuarioClave-edit' href='resultado1.php?idInstructor=" . $instructor['idInstructor'] . "'>
										 1
										 </a>
				             <a data-rel='tooltip' title='Bimestre 2' class='btn btn-warning' href='resultado2.php?idInstructor=" . $instructor['idInstructor'] . "'>
										 2
				             </a>
										 <a data-rel='tooltip' title='Bimestre 3' class='btn btn-warning' href='resultado3.php?idInstructor=" . $instructor['idInstructor'] . "'>
										 3
				             </a
										 <a data-rel='tooltip' title='Bimestre 1' class='btn btn-info btn-form-usuarioClave-edit' href='resultado4.php?idInstructor=" . $instructor['idInstructor'] . "'>

										 </a>
										 <a data-rel='tooltip' title='Bimestre 4' class='btn btn-info btn-form-usuarioClave-edit' href='resultado4.php?idInstructor=" . $instructor['idInstructor'] . "'>
										 4
										 </a>
										</td>
										<td class = 'center'>
											<a data-rel='tooltip' title='Resultado Final' class='btn btn-danger' href='resultadoFinal.php?idInstructor=" . $instructor['idInstructor'] . "'>
												Estadistica
											</a>
										</td>
										";

								 ?>
						 </tr>
				 <?php } ?>
				 </tbody>
     </table>
     </div>
 </div><!--/span-->
</article> <!-- /article -->
</section>
 <?php
   include_once 'footer.php';
  ?>
