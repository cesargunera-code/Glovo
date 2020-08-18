<?php
include_once ('class-empleados.php');
class Administradores extends Empleados{
    private $codigoAdministrador;
    private $cargo;

    public function __construct($codigoAdministrador,$nombre,$correo,$password,$id,$direccion,$celular,$cargo,$sueldo){
        $this->codigoAdministrador = $codigoAdministrador;
        parent::__construct($nombre,$correo,$password,$id,$direccion,$celular,$sueldo);
        $this->cargo = $cargo;
    }
    public function crearAdministrador($db){
        $administrador = $this->getData();
        $key =$db->getReference('Administradores')->push($administrador);
        if($key->getKey()!= null){
            echo '{"mensaje":"Registro Almacenado","key":"'.$key->getKey().'"}';
        }else{
            echo '{"mensaje":"Error Al Guardar Registro"}';
        }
    }
    public static function obtenerAdministrador($db,$idAdmi){
        $adm = $db->getReference('Administradores')->getChild($idAdmi)->getValue();
        echo json_encode($adm);
    }
    public static function obtenerAdministradores($db){
        $adm = $db->getReference('Administradores')->getSnapshot()->getValue();
        echo json_encode($adm);
    }
    public function actualizarAdministrador($db,$idAdmi){
        $key =$db->getReference('Administradores')->getChild($idAdmi)->set($this->getData());
        if($key->getKey()!=null){
            echo '{"mensaje":"Registro Actualizado","key":"'.$key->getKey().'"}';
        }else{
            echo '{"mensaje":"Error Al Actualizar Registro"}';
        }
    }
    public static function eliminarAdministrador($db,$idAdmi){
        $db->getReference('Administradores')->getChild($idAdmi)->remove();
    }

    
    public function getData(){
        $administrador['codigoAdministrador'] = $this->getCodigoAdministrador();
        $administrador['nombre'] = $this->getNombre();
        $administrador['id'] = $this->getId();
        $administrador['correo'] = $this->getCorreo();
        $administrador['password'] = password_hash($this->getPassword(),PASSWORD_DEFAULT);
        $administrador['direccion'] = $this->getDireccion();
        $administrador['celular'] = $this->getCelular();
        $administrador['sueldo'] = $this->getSueldo();
        $administrador['cargo'] = $this->getCargo();
        $administrador['privilegios']=3;
        return $administrador;
    }

    public function obtenerUltimoCodigo($db){
        $administradores= $db->getReference('Administradores')->getSnapshot()->getValue();
        $ultimoAdministrador = end($administradores);
        $ultimoCodigoAdministrador = (integer)$ultimoAdministrador['codigoAdministrador'];
        $ultimoCodigoAdministrador++;
        $this->setCodigoAdministrador($ultimoCodigoAdministrador);
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

    public function getCodigoAdministrador()
    {
        return $this->codigoAdministrador;
    }

    public function setCodigoAdministrador($codigoAdministrador)
    {
        $this->codigoAdministrador = $codigoAdministrador;

        return $this;
    }
}
?>