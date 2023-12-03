<?php
class Datos
{
    private $servidor = 'localhost';
    private $usuario = "root";
    private $pass = "";
    private $bd = "pruebatecnica_2";
    public $objetoconexion;
    public function conectar(){
        $this -> objetoconexion = mysqli_connect($this -> servidor, $this -> usuario,
        $this -> pass, $this -> bd) or die ("Error de conección");
    }
    public function desconectar()
    {
        mysqli_close($this -> objetoconexion);
    }
}
?>