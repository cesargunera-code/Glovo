<?php
class Ordenes {
    private $codigoOrden;
    private $codigoUsuario;
    private $codigoRepartidor;
    private $codigoProducto;
    private $total;
    private $cantidad;
    private $procesada;
    private $entregada;

    public function __construct($codigoUsuario,$codigoProducto,$cantidad,$procesada,$entregada){
        $this->codigoUsuario = $codigoUsuario;
        $this->codigoProducto = $codigoProducto;
        $this->cantidad = $cantidad;
        $this->procesada = $procesada;
        $this->entregada = $entregada;
    }   
    
    public function crearOrden($db)
    {
        $this->setTotal($this->getCodigoProducto(),$this->getCantidad(),$db);
        $this->obtenerUltimoCodigo($db);
        $key = $db->getReference('Ordenes')->push($this->getData());
        if($key->getKey()!= null){
            echo '{"mensaje":"Registro Almacenado","key":"'.$key->getKey().'"}';
        }else{
            echo '{"mensaje":"Error Al Guardar Registro"}';
        }
    }

    public static function obtenerOrdenes($codigoUsuario,$db)
    {
        $ordenes = $db->getReference('Ordenes')
                    ->orderByChild('codigoUsuario')
                    ->equalTo($codigoUsuario)
                    ->getSnapshot()
                    ->getValue();
        $orden= array(); 
        foreach ($ordenes as $key => $value) {
            $idP = (integer) $value['codigoProducto'];
            $producto = $db->getReference('Productos')
                        ->orderByChild('codigoProducto')
                        ->equalTo($idP)
                        ->getSnapshot()
                        ->getValue();   
            $keyProducto = array_key_first($producto);
            $orden[$key]['codigoOrden'] = $value['codigoOrden'];
            $orden[$key]['nombreProducto'] = $producto[$keyProducto]['nombreProducto'];
            $orden[$key]['descripcion'] = $producto[$keyProducto]['descripcion'];
            $orden[$key]['cantidad'] = $value['cantidad'];
            $orden[$key]['precio'] = $producto[$keyProducto]['precio'];
            $c = (integer)$value['cantidad'];
            $p = (integer)$producto[$keyProducto]['precio'];
            $total = $c*$p;
            $orden[$key]['total'] = $total;
        }
        echo json_encode($orden);
    }
    
    public static function eliminarOrden($idOrden,$db)
    {
        $key = $db->getReference('Ordenes')->getChild($idOrden)->remove();
        if($key->getKey()!=null){
            echo '{"mensaje":"Registro Eliminado","key":"'.$key->getKey().'"}';
        }else{
            echo '{"mensaje":"Error Al Eliminar Registro"}';
        }
    }

    public function getData()
    {
        $orden['codigoOrden'] = (integer)$this->codigoOrden;
        $orden['codigoUsuario'] =$this->codigoUsuario;
        $orden['codigoProducto'] =(integer)$this->codigoProducto;
        $orden['codigoRepartidor'] =(integer)$this->codigoRepartidor;
        $orden['cantidad'] =(integer)$this->cantidad;
        $orden['total'] =(integer)$this->total;
        $orden['procesada'] =$this->procesada;
        $orden['entregada'] =$this->entregada;
        return $orden;
    }

    public function obtenerUltimoCodigo($db)
    {
        $ordenes= $db->getReference('Ordenes')->getSnapshot()->getValue();
        $ultimaOrden = end($ordenes);
        $ultimoCodigoOrden = (integer)$ultimaOrden['codigoOrden'];
        $ultimoCodigoOrden++;
        $this->setCodigoOrden($ultimoCodigoOrden);
    }
    /**
     * Get the value of codigoOrden
     */ 
    public function getCodigoOrden()
    {
        return $this->codigoOrden;
    }

    /**
     * Set the value of codigoOrden
     *
     * @return  self
     */ 
    public function setCodigoOrden($codigoOrden)
    {
        $this->codigoOrden = $codigoOrden;

        return $this;
    }

    /**
     * Get the value of codigoUsuario
     */ 
    public function getCodigoUsuario()
    {
        return $this->codigoUsuario;
    }

    /**
     * Set the value of codigoUsuario
     *
     * @return  self
     */ 
    public function setCodigoUsuario($codigoUsuario)
    {
        $this->codigoUsuario = $codigoUsuario;

        return $this;
    }

    /**
     * Get the value of codigoRepartidor
     */ 
    public function getCodigoRepartidor()
    {
        return $this->codigoRepartidor;
    }

    /**
     * Set the value of codigoRepartidor
     *
     * @return  self
     */ 
    public function setCodigoRepartidor($codigoRepartidor)
    {
        $this->codigoRepartidor = $codigoRepartidor;

        return $this;
    }

    /**
     * Get the value of total
     */ 
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set the value of total
     *
     * @return  self
     */ 
    public function setTotal($codigoProducto,$cantidad,$db)
    {
        $producto = $db->getReference('Productos')
                        ->orderByChild('codigoProducto')
                        ->equalTo($codigoProducto)
                        ->getSnapshot()
                        ->getValue();
        $key = array_key_first($producto);
        $precio = (integer) $producto[$key]['precio'];
        $this->total = $precio*$cantidad;
    }

    /**
     * Get the value of codigoProducto
     */ 
    public function getCodigoProducto()
    {
        return $this->codigoProducto;
    }

    /**
     * Set the value of codigoProducto
     *
     * @return  self
     */ 
    public function setCodigoProducto($codigoProducto)
    {
        $this->codigoProducto = $codigoProducto;

        return $this;
    }

    /**
     * Get the value of cantidad
     */ 
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set the value of cantidad
     *
     * @return  self
     */ 
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get the value of procesada
     */ 
    public function getProcesada()
    {
        return $this->procesada;
    }

    /**
     * Set the value of procesada
     *
     * @return  self
     */ 
    public function setProcesada($procesada)
    {
        $this->procesada = $procesada;

        return $this;
    }

    /**
     * Get the value of entregada
     */ 
    public function getEntregada()
    {
        return $this->entregada;
    }

    /**
     * Set the value of entregada
     *
     * @return  self
     */ 
    public function setEntregada($entregada)
    {
        $this->entregada = $entregada;

        return $this;
    }
}