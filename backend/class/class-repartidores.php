<?php
include_once ('class-empleados.php');
class Repartidores extends Empleados{
    private $codigoRepartidor;
    private $zona;
    private $transporte;
    
    public function __construct($codigoRepartidor,$nombre, $id, $correo, $celular,$zona,$transporte,$sueldo)
    {
        $this->codigoRepartidor = $codigoRepartidor;
        parent::__construct($nombre,$id,$correo,$celular,$sueldo);
        $this->zona = $zona;
        $this->transporte = $transporte;
    }

    public function crearRepartidor($db){

    }
    public static function obtenerRepartidor($db,$idRepartidores){

    }
    public static function obtenerRepartidores($db){
        $rep = $db->getReference('Repartidores')->getSnapshot()->getValue();
        echo json_encode($rep);
    }
    public function actualizarRepartidor($db,$idRepartidores){

    }
    public static function eliminarRepartidor($db,$idRepartidores){

    }

    public function getZona()
    {
        return $this->zona;
    }

    public function setZona($zona)
    {
        $this->zona = $zona;

        return $this;
    }

    public function getTransporte()
    {
        return $this->transporte;
    }

    public function setTransporte($transporte)
    {
        $this->transporte = $transporte;

        return $this;
    }

    public function getCliente()
    {
        return $this->cliente;
    }

    public function setCliente($cliente)
    {
        $this->cliente = $cliente;

        return $this;
    }

    public function getCodigoRepartidor()
    {
        return $this->codigoRepartidor;
    }

    public function setCodigoRepartidor($codigoRepartidor)
    {
        $this->codigoRepartidor = $codigoRepartidor;

        return $this;
    }
}
?>