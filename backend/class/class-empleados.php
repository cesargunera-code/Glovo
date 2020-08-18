<?php
include_once ('class-usuarios.php');
abstract class Empleados extends Usuarios{
    private $sueldo;
    private $direccion;

    public function __construct($nombre,$correo,$password,$id,$direccion,$celular,$sueldo)
    {
        parent::__construct($nombre,$correo,$password,$id,$celular);
        $this->sueldo = $sueldo;
        $this->direccion= $direccion;
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
    public function getDireccion()
    {
        return $this->direccion;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
        return $this;
    }
}
?>