<?php
include_once ('class-usuarios.php');
abstract class Empleados extends Usuarios{
    private $sueldo;

    public function __construct($nombre, $id, $correo, $celular,$sueldo)
    {
        parent::__construct($nombre,$id,$correo,$celular);
        $this->sueldo = $sueldo;
    }

    public function getSueldo()
    {
        return $this->sueldo;
    }

    public function setSueldo($sueldo)
    {
        $this->sueldo = $sueldo;

        return $this;
    }
}
?>