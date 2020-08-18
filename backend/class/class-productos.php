<?php 
class Productos{
    private $codigoEmpresa;
    private $codigoProducto;
    private $nombreProducto;
    private $descripcion;
    private $imagen;
    private $precio;
    

    
    public function __construct($codigoProducto,$codigoEmpresa,$nombreProducto,$descripcion,$imagen,$precio){
        $this->codigoProducto = $codigoProducto;
        $this->codigoEmpresa = $codigoEmpresa;
        $this->nombreProducto =$nombreProducto; 
        $this->descripcion = $descripcion;
        $this->imagen = $imagen;
        $this->precio = $precio;
    }
    
    public function crearProducto($db){
        $this->obtenerUltimoCodigo($db);
        $key = $db->getReference('Productos')->push($this->getData());
        if($key->getKey()!= null){
            echo '{"mensaje":"Registro Almacenado","key":"'.$key->getKey().'"}';
        }else{
            echo '{"mensaje":"Error Al Guardar Registro"}';
        }
    }
    public static function obtenerProductos($db){
        $pro = $db->getReference('Productos')->getSnapShot()->getValue();
        echo json_encode($pro);
    }
    public static function obtenerProductosXEmpresa($db,$idEmpresa){
        $pro = $db->getReference('Productos')->getSnapShot()->getValue();
        $proFiltradado= array();
        foreach($pro as $clave => $valor){
            if($idEmpresa == $valor['codigoEmpresa']){
                $proFiltradado[$clave] = $valor;
            }
        }
        echo json_encode($proFiltradado);
    }

    public static function obtenerProducto($db,$idProducto){
        $pro = $db->getReference('Productos')->getChild($idProducto)->getValue();
        echo json_encode($pro);
    }

    public function actualizarProducto($db,$idProducto){
        $key =$db->getReference('Productos')->getChild($idProducto)->set($this->getData());
        if($key->getKey()!=null){
            echo '{"mensaje":"Registro Actualizado","key":"'.$key->getKey().'"}';
        }else{
            echo '{"mensaje":"Error Al Actualizar Registro"}';
        }
    }

    public static function eliminarProducto($db,$idProducto){
        $key =$db->getReference('Productos')->getChild($idProducto)->remove();
        if($key->getKey()!=null){
            echo '{"mensaje":"Registro Eliminado","key":"'.$key->getKey().'"}';
        }else{
            echo '{"mensaje":"Error Al Eliminar Registro"}';
        }
    }

    public function getData(){
        $producto['codigoProducto']=$this->codigoProducto;
        $producto['codigoEmpresa']=$this->codigoEmpresa;
        $producto['nombreProducto']=$this->nombreProducto;
        $producto['descripcion']=$this->descripcion;
        $producto['imagen']=$this->imagen;
        $producto['precio']=$this->precio;
        return $producto;
    }

    public function obtenerUltimoCodigo($db){
        $productos= $db->getReference('Productos')->getSnapshot()->getValue();
        $ultimoProducto = end($productos);
        $ultimoCodigoProducto = (integer)$ultimoProducto['codigoProducto'];
        $ultimoCodigoProducto++;
        $this->setCodigoProducto($ultimoCodigoProducto);
    }

    public function getCodigoProducto()
    {
        return $this->codigoProducto;
    }

    public function setCodigoProducto($codigoProducto)
    {
        $this->codigoProducto = $codigoProducto;

        return $this;
    }

    public function getNombreProducto()
    {
        return $this->nombreProducto;
    }

    public function setNombreProducto($nombreProducto)
    {
        $this->nombreProducto = $nombreProducto;

        return $this;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    public function getPromociones()
    {
        return $this->promociones;
    }

    public function setPromociones($promociones)
    {
        $this->promociones = $promociones;

        return $this;
    }

    public function getImagen()
    {
        return $this->imagen;
    }

    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

        return $this;
    }
}
?>