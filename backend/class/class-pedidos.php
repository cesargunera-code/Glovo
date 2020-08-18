<?php
    class Pedidos {
        private $codigoPedido;
        private $codigoCliente; 
        private $codigoProducto;
        private $cantidad;
        private $total;
        
        /**
         * Get the value of codigoPedido
         */ 
        public function getCodigoPedido()
        {
                return $this->codigoPedido;
        }

        /**
         * Set the value of codigoPedido
         *
         * @return  self
         */ 
        public function setCodigoPedido($codigoPedido)
        {
                $this->codigoPedido = $codigoPedido;

                return $this;
        }

        /**
         * Get the value of codigoCliente
         */ 
        public function getCodigoCliente()
        {
                return $this->codigoCliente;
        }

        /**
         * Set the value of codigoCliente
         *
         * @return  self
         */ 
        public function setCodigoCliente($codigoCliente)
        {
                $this->codigoCliente = $codigoCliente;

                return $this;
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