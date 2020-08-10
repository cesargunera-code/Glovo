<?php
include_once('class-usuarios.php');
class Clientes extends Usuarios
{
    private $codigoCliente;
    private $targeta;
    private $ubicaciones = array();
    private $ordenes = array();

    public function __construct($codigoCliente,$nombre, $id, $correo, $celular,$targeta)
    {
        $this->codigoCliente = $codigoCliente;
        parent::__construct($nombre,$id,$correo,$celular);
        $this->targeta = $targeta;
        $this->ubicaciones = array();
        $this->ordenes = array();
    }
    public function crearCliente($db){

    }
    public static function obtenerClientes($db){
        $cli = $db->getReference('Clientes')->getSnapshot()->getValue();
        echo json_encode($cli);
    }
    public static function obtenerCliente($db){

    }
    public function actualizarCliente($db,$idCliente){

    }
    public static function eliminarCliente($db,$idCliente){

    }
    public function getCodigoCliente()
    {
        return $this->codigoCliente;
    }

    public function setCodigoCliente($codigoCliente)
    {
        $this->codigoCliente = $codigoCliente;

        return $this;
    }

    public function getTargeta()
    {
        return $this->targeta;
    }

    public function setTargeta($targeta)
    {
        $this->targeta = $targeta;

        return $this;
    }

    public function getUbicaciones()
    {
        return $this->ubicaciones;
    }

    public function setUbicaciones($ubicaciones)
    {
        $this->ubicaciones = $ubicaciones;

        return $this;
    }

    public function getOrdenes()
    {
        return $this->ordenes;
    }

    public function setOrdenes($ordenes)
    {
        $this->ordenes = $ordenes;

        return $this;
    }
}
?>