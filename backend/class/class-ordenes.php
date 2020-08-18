<?php
class Ordenes {
    private $codigoOrden;
    private $codigoUsuario;
    private $codigoRepartidor;
    private $productos = array();
    private $total;
    

    public function procesarOrden(){

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
     * Get the value of productos
     */ 
    public function getProductos()
    {
        return $this->productos;
    }

    /**
     * Set the value of productos
     *
     * @return  self
     */ 
    public function setProductos($productos)
    {
        $this->productos = $productos;

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
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }
}