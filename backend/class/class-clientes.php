<?php
include_once('class-usuarios.php');
class Clientes extends Usuarios
{
    private $codigoCliente;
    private $targeta = array();

    public function __construct($nombre, $correo,$password, $id, $celular,$targeta)
    {
        parent::__construct($nombre,$correo,$password,$id,$celular);
        $this->targeta = $targeta;
    }
    public function registrarCliente($db){
        $this->obtenerUltimoCodigo($db);
        $key =$db->getReference('Clientes')->push($this->getData());
        if($key->getKey()!= null){
            echo '{"mensaje":"Registro Almacenado","key":"'.$key->getKey().'"}';
        }else{
            echo '{"mensaje":"Error Al Guardar Registro"}';
        }
    }
    public function crearCliente($db){
        $this->obtenerUltimoCodigo($db);
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
        $Cliente = $db->getReference('Clientes')->getChild($idCliente)->getValue();
        echo json_encode($Cliente);
    }

    public function actualizarCliente($db,$idCliente){
        $db->getReference('Clientes/'.$idCliente.'/nombre')->set($this->getNombre());
        $db->getReference('Clientes/'.$idCliente.'/correo')->set($this->getCorreo());
        $db->getReference('Clientes/'.$idCliente.'/id')->set($this->getId());
        $db->getReference('Clientes/'.$idCliente.'/celular')->set($this->getCelular());
    }

    public static function eliminarCliente($db,$idCliente){
        $db->getReference('Clientes')->getChild($idCliente)->remove();
    }
    public function getData(){
        $cliente['codigoCliente'] = (integer)$this->getCodigoCliente();
        $cliente['nombre'] = $this->getNombre();
        $cliente['correo'] = $this->getCorreo();
        $cliente['password'] = password_hash($this->getPassword(),PASSWORD_DEFAULT);
        $cliente['id'] = $this->getId();
        $cliente['celular'] = $this->getCelular();
        $cliente['targeta'] = $this->getTargeta();
        $cliente['privilegios'] = 1;
        return $cliente;
    }

    public function obtenerUltimoCodigo($db){
        $clientes= $db->getReference('Clientes')->getSnapshot()->getValue();
        $indice = array_key_last($clientes);
        $ultimoCodigoCliente = (integer)$clientes[$indice]['codigoCliente'];
        $ultimoCodigoCliente++;
        $this->setCodigoCliente($ultimoCodigoCliente);
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