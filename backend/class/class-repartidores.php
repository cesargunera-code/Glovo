<?php
include_once ('class-empleados.php');
class Repartidores extends Empleados{
    private $codigoRepartidor;
    private $zona;
    private $transporte;
    
    public function __construct($codigoRepartidor,$nombre,$correo,$password,$id,$direccion,$celular,$zona,$transporte,$sueldo)
    {
        $this->codigoRepartidor = $codigoRepartidor;
        parent::__construct($nombre,$correo,$password,$id,$direccion,$celular,$sueldo);
        $this->zona = $zona;
        $this->transporte = $transporte;
    }

    public function crearRepartidor($db){
        $this->obtenerUltimoCodigo($db);
        $key =$db->getReference('Repartidores')->push($this->getData());
        if($key->getKey()!= null){
            echo '{"mensaje":"Registro Almacenado","key":"'.$key->getKey().'"}';
        }else{
            echo '{"mensaje":"Error Al Guardar Registro"}';
        }
    }

    public static function obtenerRepartidor($db,$idRepartidor){
        $rep = $db->getReference('Repartidores')->getChild($idRepartidor)->getValue();
        echo json_encode($rep);
    }

    public static function obtenerRepartidores($db){
        $rep = $db->getReference('Repartidores')->getSnapshot()->getValue();
        echo json_encode($rep);
    }

    public function actualizarRepartidor($db,$idRepartidor){
        $key =$db->getReference('Repartidores')->getChild($idRepartidor)->set($this->getData());
        if($key->getKey()!=null){
            echo '{"mensaje":"Registro Actualizado","key":"'.$key->getKey().'"}';
        }else{
            echo '{"mensaje":"Error Al Actualizar Registro"}';
        }
    }

    public static function eliminarRepartidor($db,$idRepartidor){
        $db->getReference('Repartidores')->getChild($idRepartidor)->remove();
    }

    public function getData(){
            $repartidor['codigoRepartidor'] = $this->getCodigoRepartidor();
            $repartidor['nombre'] = $this->getNombre();
            $repartidor['id'] = $this->getId();
            $repartidor['correo'] = $this->getCorreo();
            $repartidor['password'] =password_hash($this->getPassword(),PASSWORD_DEFAULT);
            $repartidor['direccion'] = $this->getDireccion();
            $repartidor['celular'] = $this->getCelular();
            $repartidor['zona'] = $this->getZona();
            $repartidor['transporte'] = $this->getTransporte();
            $repartidor['sueldo'] = $this->getSueldo();
            $repartidor['privilegios'] = 2;
        return $repartidor;
    }

    public function obtenerUltimoCodigo($db){
        $repartidores= $db->getReference('Repartidores')->getSnapshot()->getValue();
        $ultimoRepartidor = end($repartidores);
        $ultimoCodigoRepartidor = (integer)$ultimoRepartidor['codigoRepartidor'];
        $ultimoCodigoRepartidor++;
        $this->setCodigoRepartidor($ultimoCodigoRepartidor);
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