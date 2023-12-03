<?php
if (!empty($_POST["btnRegistrar"])) {
    if (!empty($_POST["userName"]) and !empty($_POST["firstName"]) and !empty($_POST["lastName"]) and !empty($_POST["password"])) {
        $userName = $_POST["userName"];
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $password = $_POST["password"];
        $db = new Datos();
        $db->conectar();

        $consultaUsuarioExistente = "SELECT COUNT(*) as count FROM users WHERE user_name = '$userName'";
        $resultadoConsulta = mysqli_query($db->objetoconexion, $consultaUsuarioExistente);
        $fila = mysqli_fetch_assoc($resultadoConsulta);

        if ($fila['count'] > 0) {
            echo "El nombre de usuario ya está en uso. Por favor, elija otro.";
        } else {
            $cadena = "CALL createUsuario('$userName', '$firstName', '$lastName','$password')";
            $consulta = mysqli_query($db->objetoconexion, $cadena);
            echo "<script type=\"text/javascript\">alert(\"Usuario creado.\");</script>";
            header("location:../view/login.php");
        }
        $db->desconectar();
    } else {
        echo ("ALGNO DE LOS CAMPOS ESTA VACIO");
    }
}
