<?php
include_once('class-usuarios.php');
class Clientes extends Usuarios
{
    private $codigoCliente;
    private $targeta = array();

    public function __construct($codigoCliente,$nombre, $id, $correo, $celular,$targeta)
    {
        $this->codigoCliente = $codigoCliente;
        parent::__construct($nombre,$id,$correo,$celular);
        $this->targeta = $targeta;
    }
    public function crearCliente($db){
        $cliente = $this->getData();
        $key =$db->getReference('Clientes')->push($cliente);
        if($key->getKey()!= null){
            echo '{"mensaje":"Registro Almacenado","key":"'.$key->getKey().'"}';
        }else{
            echo '{"mensaje":"Error Al Guardar Registro"}';
        }
    }
    public static function obtenerClientes($db){
        $cli = $db->getReference('Clientes')->getSnapshot()->getValue();
        echo json_encode($cli);
    }
    public static function obtenerCliente($db,$idCliente){
        $Cliente = $db->getReference('Cliente')->getChild($idCliente)->getValue();
        echo json_encode($Cliente);
    }
    public function actualizarCliente($db,$idCliente){
        $key =$db->getReference('Clientes')->getChild($idCliente)->set($this->getData());
        if($key->getKey()!=null){
            echo '{"mensaje":"Registro Actualizado","key":"'.$key->getKey().'"}';
        }else{
            echo '{"mensaje":"Error Al Actualizar Registro"}';
        }
    }
    public static function eliminarCliente($db,$idCliente){
        $db->getReference('Clientes')->getChild($idCliente)->remove();
    }

    public function getData(){
        $cliente['codigoCliente'] = $this->getCodigoCliente();
        $cliente['nombre'] = $this->getNombre();
        $cliente['id'] = $this->getId();
        $cliente['correo'] = $this->getCorreo();
        $cliente['celular'] = $this->getCelular();
        $cliente['targeta'] = $this->getTargeta();
    return $cliente;
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