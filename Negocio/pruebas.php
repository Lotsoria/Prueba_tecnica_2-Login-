<?php
session_start();
if (!empty($_POST["btnIngresar"])) {
    if (empty($_POST["userName"]) and empty($_POST["password"])) {
        echo "Los campos estan vacios";
    } else {
        $usuario = $_POST["userName"];
        $constraseña = $_POST["password"];
        $db = new Datos();
        $db->conectar();
        $cadena = "SELECT user_name, firstName, lastName, status FROM users WHERE user_name = '$usuario' AND password = '$constraseña'";
        $consulta = mysqli_query($db->objetoconexion, $cadena);
        $db->desconectar();
        if ($datos = $consulta->fetch_object()) {


            $typeUser = "SELECT roleId FROM users WHERE user_name ='$usuario'";
            $resultadoConsulta = mysqli_query($db->objetoconexion, $typeUser);
            $id = mysqli_fetch_assoc($resultadoConsulta);
            if ($id['roleId'] == 2) {
                $_SESSION["user_name"] = $datos -> user_name;
                $_SESSION["firstName"]= $datos -> firstName;
                $_SESSION["lastName"]= $datos -> lastName;
                header("location:../view/home.php");
            } else {
                $_SESSION["user_name"] = $datos -> user_name;
                $_SESSION["firstName"]= $datos -> firstName;
                $_SESSION["lastName"]= $datos -> lastName;
                header("location:../view/create-account.php");

            }
            

        } else {
            echo "Acceso denegado";
        }
    }
}

?>

