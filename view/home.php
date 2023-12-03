<?php
    session_start();
    if(empty($_SESSION["user_name"])){
        header("location: ../view/login.php");
    }
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body class="body">
    <div class="contentH">
        <div class="title">
            <p>Prueba Tecnica</p>
        </div>

        <div class="menu">
            <ul>
                <li> <?php echo $_SESSION["user_name"] ?></li>
                
                <?php
        // Verificar si el usuario está logeado
        $usuarioLogeado = true; // Esta variable debería ser true si el usuario está logeado
        if (!$usuarioLogeado) {
            echo '<li>Login</li>';
        }
        ?>
                <?php
        // Verificar si el usuario está logeado
        $usuarioLogeado = true; // Esta variable debería ser true si el usuario está logeado
        if ($usuarioLogeado) {
            echo '<li > <a href="../Negocio/logoutController.php"> Logout</a></li>';
        }
        ?>
            </ul>
        </div>
    </div>


    <div class="container-fluid">

        <h1>Hola este es el home </h1>
    </div>
    <div class="contentF">
        <p>Footer prueba tecnica 2</p>
    </div>
</body>

</html>