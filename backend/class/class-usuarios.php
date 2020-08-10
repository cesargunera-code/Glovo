<?php
abstract class Usuarios
{
        private $codigoUsuario;
        private $nombre;
        private $id;
        private $correo;
        private $celular;
        
        public function __construct($nombre, $id, $correo, $celular)
        {
                $this->nombre = $nombre;
                $this->id = $id;
                $this->correo = $correo;
                $this->celular = $celular;
        }

        public function getCodigoUsuario()
        {
                return $this->codigoUsuario;
        }

        public function setCodigoUsuario($codigoUsuario)
        {
                $this->codigoUsuario = $codigoUsuario;

                return $this;
        }

        public function getNombre()
        {
                return $this->nombre;
        }

        public function setNombre($nombre)
        {
                $this->nombre = $nombre;

                return $this;
        }

        public function getId()
        {
                return $this->id;
        }

        public function setId($id)
        {
                $this->id = $id;

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

        public function getCelular()
        {
                return $this->celular;
        }

        public function setCelular($celular)
        {
                $this->celular = $celular;

                return $this;
        }
}
