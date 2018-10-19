 <?php
 include_once 'navbar.php';
?>
<form action="nueva_clave.php" method="POST">
  <center>
    <div class="control-group">
        <label class="control-label" for="focusedInput"><h1>Cantidad de Preguntas</h1></label>
        <div class="controls">
            <input type="hidden" name="formulario" value="<?=$_GET['formulario']?>">
            <input class="input-xlarge focused" id="focusedInput" required="true" type="text" name="cantPreguntas">
        </div>
        <label class="control-label" for="focusedInput">Punteo</label>
        <div class="controls">
            <input type="hidden" name="formulario" value="<?=$_GET['formulario']?>">
            <input class="input-xlarge focused" id="focusedInput" required="true" type="text" name="valorP">
        </div>
    </div>
        <button type="submit" class="btn btn-primary">Aceptar</button>
  </center>
</form>
<?php
include_once 'footer.php';
?>