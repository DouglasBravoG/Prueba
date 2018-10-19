<?php
include_once 'navbar.php';
    
    if(!isset($_GET['idFormulario'])) {
        print '
        <div class="control-group">
            <button id="Random" class="btn btn-warning">Asignacion Aleatoria</button>
        </div>';
    }
?>
<center>
   <form class="form-inline" id="formClave" action="../controller/Instancia_clave.php?func=insert" method="post">
<?php
$valorP = (isset($_POST["valorP"])) ? $_POST["valorP"] : 0;
$cantidadPreguntas = (isset($_POST["cantPreguntas"])) ? $_POST["cantPreguntas"] : 0;
$formulario = (isset($_POST["formulario"])) ? $_POST["formulario"] : 0;
if($cantidadPreguntas != 0 && $formulario != 0) {
    print '<input name="idFormulario" value='.$formulario.' type="hidden">';
    for ($i = 1; $i <= $cantidadPreguntas; $i++) {
    print '
        <div style="margin-left: 15px" class="form-group radioOption" data-toggle="buttons">
            <span style="font-size: 24px; font-weight: 700;">'.$i.'</span>
            <label class="btn btn-success">
                <input ng-model="clave.respuesta"  type="radio" name="notas['.$i.']" value="A" required="true">
                <span class="glyphicon glyphicon-ok">A</span>
            </label>

            <label class="btn btn-primary">
                <input ng-model="clave.respuesta" type="radio" name="notas['.$i.']" value="B" required="true">
                <span class="glyphicon glyphicon-ok">B</span>
            </label>

            <label class="btn btn-info">
                <input ng-model="clave.respuesta" type="radio" name="notas['.$i.']" value="C" required="true">
                <span class="glyphicon glyphicon-ok">C</span>
            </label>

            <label class="btn btn-warning">
                <input ng-model="clave.respuesta" type="radio" name="notas['.$i.']" value="D" required="true">
                <span class="glyphicon glyphicon-ok">D</span>
            </label>

            <label class="btn btn-danger">
                <input ng-model="clave.respuesta" type="radio" name="notas['.$i.']" value="E" required="true">
                <span class="glyphicon glyphicon-ok">E</span>
            </label>
        </div>
        <div class="control-group">
            <div class="controls">
                <input class="input-xlarge focused punteo" id="focusedInput" type="text" name="punteo['.$i.']" value='.$valorP.' required="true">
            </div>
        </div>
        <hr/>';
    }//end For
} // end IF
?>
<div class="message hide">
    <center>
    <div class="alert  alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
        <strong>ERROR DE PUNTEO</strong> Favor verificar!.
    </div>
    </center>
</div>
    <?php
    $prueba=100;
        if(isset($_GET['idFormulario'])) {
            $id = $_GET['idFormulario'];
            print "<a class='btn btn-primary' target='_blank' href='../pdf/index.php?idFormulario=$id'>
                Abrir PDF
            </a>
            <div class='box-content alerts'>
                <div class='alert alert-success'>
                 <button type='button' class='close' data-dismiss='alert'>×</button>
                 <strong>CORRECTO: </strong> Su clave fue Ingresada Correctamente
                </div>
            </div>
             ";
        } else {
            print '<button id="Guardar"  type="submit" class="btn btn-primary">Guardar Clave</button>';
        }
    ?>
    </form>
</center>
<?php
include_once 'footer.php';
?>

<script type="text/javascript">
$(document).ready(function() {
    $("#Random").on('click', function() {
        $(".radioOption").each(function () {
            var radios = $(this).find("input[type=radio]");
            $(radios).parent().removeClass('checked');
            if (radios.length > 0) {
                var randomnumber = Math.floor(Math.random() * radios.length);
                radios[randomnumber].checked = true;
                $(radios[randomnumber]).parent().addClass('checked');
            }
        });
    });
    $("#Guardar").on('click', function() {
        var nota = 0;
        $(".punteo").each(function() {
            nota += parseFloat($(this).val());
        });
        nota = nota.toFixed();
        if(nota == 100) {
            $("#formClave").submit();
        } else {
            $(".message").removeClass('hide');
        }
        return false;
    });
});
</script>
