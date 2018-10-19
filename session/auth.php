<?php

require_once '../class_login/login.class.php';
/*
  Accedemos al metodo singleton que es quien crea la instancia
 *  de nuestra clase y asi podemos acceder sin necesidad de crear
  nuevas instancias, lo que ahorra consumo de recursos
 */
if (isset($_POST['username']) != null AND isset($_POST['userpass']) != null) {
    $username = $_POST['username'];
    $userpass = $_POST['userpass'];
    limpiarInput($username, $userpass);
}

function limpiarInput($pUser, $pPass) {
    $safeUser = htmlentities($pUser, ENT_QUOTES);
    $safePass = htmlentities($pPass, ENT_QUOTES);
    /*
    Accedemos al metodo usuarios y los mostramos
    */
    $userStatic = Login::getInstancia();
    $usuarioClave = $userStatic->login_users($safeUser, $safePass);
    if ($usuarioClave == true AND $_SESSION['idRol'] == 1 ) {
        header("Location: ../view/home.php");
    } else{
        if ($usuarioClave == true AND $_SESSION['idRol'] == 2 ){
            header("Location: ../view/user/homeU.php");
        }else{
            if ($usuarioClave == true AND $_SESSION['idRol'] == 3 ){
              header("Location: ../pedagogia/home.php");
        }else{
            header("Location: ../index.php");
        }
      }
    }
}

?>
