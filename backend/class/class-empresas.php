<?php
class Empresas{
    private $codigoCategoria;
    private $codigoEmpresa;
    private $nombreEmpresa;
    private $direccion;
    private $correo;
    private $telefono;

    public function __construct($codigoCategoria, $codigoEmpresa,$nombreEmpresa,$direccion,$correo,$telefono)
    {
        $this->codigoCategoria=$codigoCategoria;
        $this->codigoEmpresa=$codigoEmpresa; 
        $this->nombreEmpresa=$nombreEmpresa; 
        $this->direccion=$direccion;
        $this->correo=$correo;
        $this->telefono=$telefono;
    }
    //GRUD
    public function crearEmpresa($db){
            $empresa = $this->getData();
            $key =$db->getReference('Empresas')->push($empresa);
            if($key->getKey()!= null){
                echo '{"mensaje":"Registro Almacenado","key":"'.$key->getKey().'"}';
            }else{
                echo '{"mensaje":"Error Al Guardar Registro"}';
            }
    }
    public static function obtenerEmpresas($db){
        $emp = $db->getReference('Empresas')->getSnapshot()->getValue();
        echo json_encode($emp);
    }

    public static function obtenerEmpresa($db,$idEmpresa){
        $emp = $db->getReference('Empresas')->getChild($idEmpresa)->getValue();
        echo json_encode($emp);
    }

    public static function obtenerEmpresasPorCategoria($db,$idCategoria){
        $emp = $db->getReference('Empresas')->getSnapshot()->getValue();
        $cat = array();
        foreach ($emp as $clave => $valor) {
            if(in_array($idCategoria,$valor)){
                $cat[$clave] = $valor;
            }
        }
        echo json_encode($cat);
    }

    public function actualizarEmpresa($db,$idEmpresa){
        $key =$db->getReference('Empresas')->getChild($idEmpresa)->set($this->getData());
        if($key->getKey()!=null){
            echo '{"mensaje":"Registro Actualizado","key":"'.$key->getKey().'"}';
        }else{
            echo '{"mensaje":"Error Al Actualizar Registro"}';
        }
    }
    public static function eliminarEmpresa($db,$idEmpresa){ 
        $key =$db->getReference('Empresas')->getChild($idEmpresa)->remove();
        if($key->getKey()!=null){
            echo '{"mensaje":"Registro Eliminado","key":"'.$key->getKey().'"}';
        }else{
            echo '{"mensaje":"Error Al Eliminar Registro"}';
        }
    }
    //obtener array con los datos
    public function getData(){
        $empresa['codigoCategoria']=$this->codigoCategoria;
        $empresa['codigoEmpresa']=$this->codigoEmpresa;
        $empresa['nombreEmpresa']=$this->nombreEmpresa;
        $empresa['direccion']=$this->direccion;
        $empresa['correo']=$this->correo;
        $empresa['telefono']=$this->telefono;
        return $empresa;
    }
    //GET AND SET
    public function getCodigoCategoria()
    {
        return $this->codigoCategoria;
    }

    public function setCodigoCategoria($codigoCategoria)
    {
        $this->codigoCategoria = $codigoCategoria;

        return $this;
    }

    public function getCodigoEmpresa()
    {
        return $this->codigoEmpresa;
    }

    public function setCodigoEmpresa($codigoEmpresa)
    {
        $this->codigoEmpresa = $codigoEmpresa;

        return $this;
    }

    public function getNombreEmpresa()
    {
        return $this->nombreEmpresa;
    }

    public function setNombreEmpresa($nombreEmpresa)
    {
        $this->nombreEmpresa = $nombreEmpresa;

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

    public function getCorreo()
    {
        return $this->correo;
    }

    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }
}
?>