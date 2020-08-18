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
        public static function login($tipoUsuario,$correo, $password, $db){
                $result = $db->getReference($tipoUsuario)
                        ->orderByChild('correo')
                        ->equalTo($correo)
                        ->getSnapshot()
                        ->getValue();
                if(!empty($result)){
                        $key = array_key_first($result);
                        $valido = password_verify($password,$result[$key]['password']);
                        $r['valido'] = $valido == 1?true:false;
                        if($valido){
                                $r['key']= $key;
                                $r['token']= bin2hex(openssl_random_pseudo_bytes(16));
                                $r['correo'] = $result[$key]['correo'];
                                $r['privilegios'] = $result[$key]['privilegios'];
                                $r['tipoUsuario'] = $tipoUsuario;
                                setcookie('key',$r['key'],time()+(86400*1),"/");
                                setcookie('correo',$r['correo'],time()+(86400*1),"/");
                                setcookie('token',$r['token'],time()+(86400*1),"/");
                                setcookie('tipoUsuario',$r['tipoUsuario'],time()+(86400*1),"/");
                                $db->getReference($tipoUsuario.'/'.$key.'/token')->set($r['token']);
                        }       
                        echo json_encode($r);
                }else{
                        echo json_encode('{"informacion":"Correo Invalido"}');
                }
        }
        public static function verificarAutentificacion($db){
                if(!isset($_COOKIE['key'])){
                        return false;
                }else{
                        $result = $db->getReference($_COOKIE['tipoUsuario'])->getChild($_COOKIE['key'])->getValue();
                        return ($result['token']==$_COOKIE['token'])?true:false;
                }
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
