<?php
include_once ('class-empleados.php');
class Administradores extends Empleados{
    private $codigoAdmnistrador;
    private $cargo;

    public function __construct($codigoAdmnistrador,$nombre, $id, $correo,$celular, $cargo,$sueldo)
    {
        $this->codigoAdmnistrador = $codigoAdmnistrador;
        parent::__construct($nombre,$id,$correo,$celular,$sueldo);
        $this->cargo = $cargo;
    }
    public function crearAdministrador($db){

    }
    public static function obtenerAdministrador($db,$idAdmi){

    }
    public static function obtenerAdministradores($db){
        $adm = $db->getReference('Administradores')->getSnapshot()->getValue();
        echo json_encode($adm);
    }
    public function actualizarAdministrador($db,$idAdmi){

    }
    public static function eliminarAdministrador($db,$idAdmi){

    }
    public function getCargo()
    {
        return $this->cargo;
    }

    public function setCargo($cargo)
    {
        $this->cargo = $cargo;

        return $this;
    }

    public function getCodigoAdmnistrador()
    {
        return $this->codigoAdmnistrador;
    }

    public function setCodigoAdmnistrador($codigoAdmnistrador)
    {
        $this->codigoAdmnistrador = $codigoAdmnistrador;

        return $this;
    }
}
?>