<!DOCTYPE html>
<html lang="en">
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
   
        </div>
    </div>
    <div class="container-fluid">
    <section class="content">
        <form action="" method="post">
            <fieldset>
                <legend>Create account</legend>
                <?php
                    include "../Datos/Conexion.php";
                    include  "../Negocio/registroController.php"
                ?>
                <input type="text" name="userName" id="" placeholder="Ingrese userName">
                <input type="text" name="firstName" id="" placeholder="Ingrese firstName">
                <input type="text" name="lastName" id="" placeholder="Ingrese lastName">
                <input type="password" name="password" id="" placeholder="Ingrese password">
                <input class="button" type="submit" value="Registrar" name="btnRegistrar">          
            
            </fieldset>
        </form>
    </section>
</div>
<div class="contentF">
        <p>Footer prueba tecnica 2</p>
    </div>
</body>
</html>