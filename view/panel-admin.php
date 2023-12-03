<?php
session_start();
if (empty($_SESSION["user_name"])) {
    header("location: ../view/login.php");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="/bootstrap-5.3.1/css/bootstrap.css" rel="stylesheet" media="screen">

    <link rel="stylesheet" href="../css/styles.css">

    <script src="/bootstrap-5.3.1/js/bootstrap.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
     <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
     <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
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
        <div class="contentPanel">
            <h1>panel admin</h1>
            <div class="table-responsive">
                <?php
                require_once('../Negocio/usersLockedController.php');
                $user = new UserLock();
                $dt = $user->listar();
                ?>
                <table id="tabla_userLock" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>User</td>
                            <td>First Name</td>
                            <td>Last Name</td>
                            <td>Status</td>
                            <td>Attempts</td>
                        </tr>
                    </thead>
                    <?php
                    while ($row = mysqli_fetch_array($dt)) {
                        echo '<tr>';
                        echo '<td>' . $row['userId'] . '</td>';
                        echo '<td>' . $row['user_name'] . '</td>';
                        echo '<td>' . $row['firstName'] . '</td>';
                        echo '<td>' . $row['lastName'] . '</td>';
                        echo '<td>' . $row['status'] . '</td>';
                        echo '<td>' . $row['failedLoginAttempts'] . '</td>';
                        echo "<td><a  href=\"/Login/Negocio/unlock.php?userId=" . $row['userId'] . "\"  class=\"btnA\">Desbloquear</a></td>";
                        echo '</tr>';
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>

    <div class="contentF">
        <p>Footer prueba tecnica 2</p>
    </div>

</body>

</html>
<script>
    $(document).ready(function() {
        $('#tabla_userLock').DataTable();
    });
</script>