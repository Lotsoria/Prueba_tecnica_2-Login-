<?php 
//require_once('../Datos/ClassDatos.php');
require_once('/xampp/htdocs/Login/Datos/Conexion.php');
class UserLock
{

    public function listar(){
        $bd = new Datos();
        $bd -> conectar();
        $consulta = "SELECT userId, user_name, firstName, lastName, status, failedLoginAttempts FROM users WHERE status = 'Bloqueado' or failedLoginAttempts > 0";
        $dt = mysqli_query($bd -> objetoconexion, $consulta);
        $bd -> desconectar();
        return $dt;
    }

    public function desbloquear($user ){
        $bd = new Datos();
        $bd -> conectar();
        $consulta = "CALL desbloquearUsuario ('$user')";
        $dt = mysqli_query($bd -> objetoconexion, $consulta);
        $bd -> desconectar();
        return $dt;

    }
}
?>