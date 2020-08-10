<?php 
class Productos{
    private $codigoEmpresa;
    private $codigoProducto;
    private $nombreProducto;
    private $descripcion;
    private $precio;

    
    public function __construct($codigoProducto,$codigoEmpresa,$nombreProducto,$descripcion,$precio)
    {
        $this->codigoProducto =$codigoProducto;
        $this->codigoEmpresa = $codigoEmpresa;
        $this->nombreProducto =$nombreProducto; 
        $this->descripcion = $descripcion;
        $this->precio = $precio;
    }
    
    public function crearProducto($db){

    }

    public static function obtenerProductosXEmpresa($db,$idEmpresa){

    }

    public static function obtenerProductoXEmpresa($db,$idEmpresa,$idProducto){

    }

    public function actualizarProducto($db,$idProducto){

    }

    public static function eliminarProducto($db,$idProducto){

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
}
?>