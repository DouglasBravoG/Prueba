<?php
@session_start();
if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == false) {
    header("Location: ../index.php");
    exit();
}
$now = time();

$inactivo = 900;
if(isset($_SESSION['expire'])) {
    $vida_session = time() - $_SESSION['expire'];
    if($vida_session > $inactivo) {
        session_destroy();
        header("location: ../index.php");
    }
}
$_SESSION['expire'] = time() + (8100);
?>