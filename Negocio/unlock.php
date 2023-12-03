<?php
require_once('/xampp/htdocs/Login/Datos/Conexion.php');
require_once('/xampp/htdocs/Login/Negocio/usersLockedController.php');

if (isset($_GET['userId'])) {
    $userId = $_GET['userId'];

    $lockManager = new UserLock();
    $lockManager->desbloquear($userId);

    echo "<script type=\"text/javascript\">alert(\"Usuario desbloqueado correctamente\");</script>";
    header("location:../view/panel-admin.php");
} else {
    echo "<script type=\"text/javascript\">alert(\"ID de usuario no proporcionado.\");</script>";
    header("location:../view/panel-admin.php");
}
?>
