<?php

session_start();

if (!empty($_POST["btnIngresar"])) {
    if (empty($_POST["userName"]) || empty($_POST["password"])) {
        echo "Los campos están vacíos";
    } else {
        $usuario = $_POST["userName"];
        $contrasena = $_POST["password"];
        $db = new Datos();
        $db->conectar();


        $consulta = $db->objetoconexion->prepare("SELECT user_name, firstName, lastName, status, failedLoginAttempts FROM users WHERE user_name = ? AND password = ?");
        $consulta->bind_param("ss", $usuario, $contrasena);
        $consulta->execute();
        $consulta->store_result();

        if ($consulta->num_rows > 0) {
            $consulta->bind_result($user_name, $firstName, $lastName, $status, $failedLoginAttempts);
            $consulta->fetch();


            $_SESSION["user_name"] = $user_name;
            $_SESSION["firstName"] = $firstName;
            $_SESSION["lastName"] = $lastName;

            // $AttemptsU = "SELECT failedLoginAttempts FROM users WHERE user_name ='$usuario'";
            // $resultadoConsulta = mysqli_query($db->objetoconexion, $AttemptsU);
            // $Attempts = mysqli_fetch_assoc($resultadoConsulta);
            if ($failedLoginAttempts < 3 && $status == "Activo") {
                $db->objetoconexion->query("UPDATE users SET failedLoginAttempts = 0 WHERE user_name = '$usuario'");
                $typeUser = "SELECT roleId FROM users WHERE user_name ='$usuario'";
                $resultadoConsulta = mysqli_query($db->objetoconexion, $typeUser);
                $id = mysqli_fetch_assoc($resultadoConsulta);
                if ($id['roleId'] == 2) {
                    header("location:../view/panel-admin.php");
                } else {
                    header("location:../view/home.php");
                }
            } else {
                
                echo "Esta cuenta esta bloqueada";
            }
        } else {
            // Incrementar el contador de intentos fallidos
            $consultaFallida = $db->objetoconexion->prepare("SELECT failedLoginAttempts FROM users WHERE user_name = ?");
            $consultaFallida->bind_param("s", $usuario);
            $consultaFallida->execute();
            $consultaFallida->bind_result($failedLoginAttempts);
            $consultaFallida->fetch();
            $consultaFallida->close();

            $failedAttempts = $failedLoginAttempts + 1;
            $db->objetoconexion->query("CALL actualizarIntentos ($failedAttempts,'$usuario')");
            // $db->objetoconexion->query("UPDATE users SET failedLoginAttempts = $failedAttempts WHERE user_name = '$usuario'");

            if ($failedAttempts >= 3) {
                // Tercer intento fallido, bloquear la cuenta
                $db->objetoconexion->query("CALL bloquearUsuario('$usuario')");
                echo "Cuenta bloqueada. Por favor, contacta al administrador.";
            } else {
                echo "Contraseña incorrecta. Intento $failedAttempts de 3.";
            }
        }

        $db->desconectar();
    }
}
