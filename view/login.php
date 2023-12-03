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
            <p><a href="../view/login.php">Prueba Tecnica</a></p>
        </div>
        <div class="menu">
            <ul>
            <?php
        // Verificar si el usuario está logeado
        $usuarioLogeado = false; // Esta variable debería ser true si el usuario está logeado
        if ($usuarioLogeado) {
            echo '<li>Nombre Usuario</li>';
        }
        ?>
          <?php
        // Verificar si el usuario está logeado
        $usuarioLogeado = false; // Esta variable debería ser true si el usuario está logeado
        if (!$usuarioLogeado) {
            echo '<li>Login</li>';
        }
        ?>
                <?php
        // Verificar si el usuario está logeado
        $usuarioLogeado = false; // Esta variable debería ser true si el usuario está logeado
        if ($usuarioLogeado) {
            echo '<li>Logout</li>';
        }
        ?>
            </ul>
        </div>
    </div>

    <div class="container-fluid">

        <form method="post" action="">
            <fieldset>
                <legend>Login</legend>
                <?php
                include("../Datos/Conexion.php");
                include("../Negocio/loginController.php");
                ?>
                <input type="text" name="userName" id="" placeholder="Ingresesu username">
                <input type="password" name="password" id="" placeholder="Ingrese su contaseña">
                <a href="../view/create-account.php">create account</a>
                <input class="button" type="submit" value="Login" name="btnIngresar">
            </fieldset>
        </form>
    </div>

    <div class="contentF">
        <p>Footer prueba tecnica 2</p>
    </div>

</body>

</html>