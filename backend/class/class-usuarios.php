<?php
//passwords clientes: 1234
//passwords repartidores: 12345
//passwords administradores: xxxx
abstract class Usuarios
{
        private $codigoUsuario='pendiente';
        private $nombre='pendiente';
        private $id='pendiente';
        private $correo='pendiente';
        private $password='pendiente';
        private $celular='pendiente';

        public function __construct($nombre, $correo,$password,$id,$celular)
        {
                $this->nombre = $nombre;
                $this->correo = $correo;
                $this->password = $password;
                $this->id = $id;
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

        public function getPassword()
        {
                return $this->password;
        }

        public function setPassword($password)
        {
                $this->password = $password;

                return $this;
        }
}
