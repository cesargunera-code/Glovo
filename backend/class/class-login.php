<?php

class Login
{
        public function __construct($tipoUsuario, $correo, $password, $db)
        {
                $result = $db->getReference($tipoUsuario)
                        ->orderByChild('correo')
                        ->equalTo($correo)
                        ->getSnapshot()
                        ->getValue();
                if (!empty($result)) {
                        $key = array_key_first($result);
                        $valido = password_verify($password, $result[$key]['password']);
                        $r['valido'] = $valido == 1 ? true : false;
                        if ($valido) {
                                $r['key'] = $key;
                                $r['token'] = bin2hex(openssl_random_pseudo_bytes(16));
                                $r['correo'] = $result[$key]['correo'];
                                $r['privilegios'] = $result[$key]['privilegios'];
                                $r['tipoUsuario'] = $tipoUsuario;
                                setcookie('key', $r['key'], time() + (86400 * 1), "/");
                                setcookie('correo', $r['correo'], time() + (86400 * 1), "/");
                                setcookie('token', $r['token'], time() + (86400 * 1), "/");
                                setcookie('tipoUsuario', $r['tipoUsuario'], time() + (86400 * 1), "/");
                                $db->getReference($tipoUsuario . '/' . $key . '/token')->set($r['token']);
                        }
                        echo json_encode($r);
                } else {
                        echo json_encode('{"informacion":"Correo Invalido"}');
                }
        }

        public static function verificarAutentificacion($db)
        {
                if (!isset($_COOKIE['key'])) {
                        return false;
                } else {
                        $result = $db->getReference($_COOKIE['tipoUsuario'])->getChild($_COOKIE['key'])->getValue();
                        return ($result['token'] == $_COOKIE['token']) ? true : false;
                }
        }

        public static function otorgarPrivilegios($db)
        {
                $usuario = $db->getReference($_COOKIE['tipoUsuario'])->getChild($_COOKIE['key'])->getValue();
                echo $usuario['privilegios'];
        }
        
        public static function logout(){
                setcookie('key',"",  3600, "/");
                setcookie('correo',"",  3600, "/");
                setcookie('token',"",  3600, "/");
                setcookie('tipoUsuario',"",  3600, "/");
                header("Location: ../../fronted/login.php");
                return 'cerrarsesion';
        }
}
